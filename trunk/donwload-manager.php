<?php 
/**
 * @package Downlodable File Manager
 * @author Shaon
 * @version 1.2
 */
/*
Plugin Name: Downlodable File Manager
Plugin URI: http://www.intelisoftbd.com
Description: Manage Downloadable Files
Author: Shaon
Version: 1.2
Author URI: http://www.intelisoftbd.com
*/

session_start();

include("class.db.php");
  
//include("process.php");

include("download.php");
  
if(!$_POST)    $_SESSION['download'] = 0;

function Install(){
    global $wpdb;
    global $jal_db_version;

    $table_name = "ahm_files";
    if($wpdb->get_var("show tables like '$table_name'") != $table_name) {
      
      $sql = "CREATE TABLE IF NOT EXISTS `ahm_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `file` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(40) CHARACTER SET utf8 NOT NULL,
  `access` enum('guest','member') NOT NULL,
  PRIMARY KEY (`id`)
    )";

      require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
      dbDelta($sql);

      add_option("fm_db_version", $jal_db_version);

   }

}

function UnInstall(){
    global $wpdb;
    global $jal_db_version;

    $table_name = $wpdb->prefix . "file_manager";
    if($wpdb->get_var("show tables like '$table_name'") != $table_name) {
      
      $sql = "DROP TABLE " . $table_name ;

      require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
      dbDelta($sql);

      remove_option("fm_db_version");

    }

}

function Downloadable($content){
     
    //$id = 2;
    preg_match_all("/\{filelink\=([^\}]+)\}/", $content, $matches);
    //
    
    $sap = count($_GET)>0?'&':'?';
    for($i=0;$i<count($matches[1]);$i++){
    $id = $matches[1][$i];    
    $data = DB::getById('ahm_files',$id);
    if($data['access']=='member'&&!is_user_logged_in())
    $matches[1][$i] = "<a href='".get_option('siteurl')."/wp-login.php'  style=\"background:url('".get_option('siteurl')."/wp-content/plugins/donwload-manager/l24.png') no-repeat;padding:3px 12px 12px 28px;font:bold 10pt verdana;\">Please login to access downloadables</a>";
    else
    $matches[1][$i] = "<a href='#' onclick='javascript:window.open(\"{$_SERVER[REQUEST_URI]}{$sap}download={$id}\",\"Window1\",\"menubar=no,width=400,height=200,toolbar=no, left=\"+((screen.width/2)-200)+\", top=\"+((screen.height/2)-100));return false;' style=\"background:url('".get_option('siteurl')."/wp-content/plugins/donwload-manager/d24.png') no-repeat;padding:3px 12px 12px 28px;font:bold 10pt verdana;\">Download</a>";
    }
    echo str_replace($matches[0],$matches[1], $content);    
    
}

 

function AdminOptions(){
    if($_GET[task]!='')
    return call_user_func($_GET['task']);        
    else
    include('list-files.php');
}

function DeleteFile(){
    if(is_array($_GET[id])){
        foreach($_GET[id] as $id){
            $qry[] = "id='".(int)$id."'";
        }
        $cond = implode(" and ", $qry);
    } else
    $cond = "id='".(int)$_GET[id]."'";
    DB::Delete('ahm_files', $cond);
    echo "<script>
        location.href='admin.php?page=file-manager';
        </script>";
    die();
}

function AddNewFile(){
    
    if($_POST){
    
    if(is_uploaded_file($_FILES['media']['tmp_name'])){
        $info = pathinfo($_FILES['media']['name']);        
        //echo dirname(__FILE__).'/files/'.$_FILES['media']['name'];
        extract($_POST);
        $name = file_exists(dirname(__FILE__).'/files/'.$_FILES['media']['name'])?str_replace('.'.$info['extension'],'_'.uniqid().'.'.$info['extension'],$info['basename']):$_FILES['media']['name'];        
        move_uploaded_file($_FILES['media']['tmp_name'],dirname(__FILE__).'/files/'.$name);
        $file['file'] = $name;
        DB::AddNew("ahm_files", $file); 
        echo "<script>
        location.href='admin.php?page=file-manager';
        </script>";
    }
    
   }

    
    include('add-new-file.php');
}

function EditFile(){
    
    if($_POST){
    extract($_POST);
    if(is_uploaded_file($_FILES['media']['tmp_name'])){
        $info = pathinfo($_FILES['media']['name']);        
        //echo dirname(__FILE__).'/files/'.$_FILES['media']['name'];
    
        $name = file_exists(dirname(__FILE__).'/files/'.$_FILES['media']['name'])?str_replace('.'.$info['extension'],'_'.uniqid().'.'.$info['extension'],$info['basename']):$_FILES['media']['name'];        
        move_uploaded_file($_FILES['media']['tmp_name'],dirname(__FILE__).'/files/'.$name);        
        $file = ",file='$name'";
    }
    
        DB::Update("ahm_files", $file, "id='$_POST[id]'"); 
        echo "<script>
        location.href='admin.php?page=file-manager';
        </script>";
    
   }

    $file = DB::getById('ahm_files',$_GET[id]);
    include('add-new-file.php');
}


function fmmenu(){
    add_menu_page("File Manager","File Manager","administrator",'file-manager','AdminOptions');
    add_submenu_page( 'file-manager', 'File Manager', 'Manage', 'administrator', 'file-manager', 'AdminOptions');    
    add_submenu_page( 'file-manager', 'Add New File &lsaquo; File Manager', 'Add New File', 'administrator', 'file-manager/add-new-file', 'AddNewFile');    
}

if(is_admin()){
    add_Action("admin_menu","fmmenu");
}

add_filter( 'the_content', 'Downloadable');

register_activation_hook(__FILE__,'Install');
