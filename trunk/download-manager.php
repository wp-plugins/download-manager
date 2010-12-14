<?php 
/**
 * @package Downlodable File Manager
 * @author Shaon
 * @version 2.0.0
 */
/*
Plugin Name: Downlodable File Manager
Plugin URI: http://www.intelisoftbd.com/open-source-projects/download-manager-wordpress-plugin.html
Description: Manage Downloadable Files
Author: Shaon
Version: 2.0.0
Author URI: http://www.intelisoftbd.com/open-source-projects/download-manager-wordpress-plugin.html
*/
        
session_start();

include("class.db.php");

$d = str_replace('\\','/',dirname(__FILE__));
$d = explode("/", $d);
array_pop($d);
array_pop($d);
$d = implode('/', $d);

define('UPLOAD_DIR',$d.'/uploads/download-manager-files/');  
define('UPLOAD_BASE',$d.'/uploads/');  
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
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `password` varchar(40) NOT NULL,
  `download_count` int(11) NOT NULL,
  `access` enum('guest','member') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `show_counter` tinyint(1) NOT NULL,
  `link_label` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";

      require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
      dbDelta($sql);
      dbDelta("ALTER TABLE `ahm_files` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci");      
      dbDelta("ALTER TABLE `ahm_files` ADD `show_counter` BOOL NOT NULL");      
      dbDelta("ALTER TABLE `ahm_files` ADD `link_label` VARCHAR( 255 ) NOT NULL");      
      add_option("fm_db_version", $jal_db_version);

   }
   update_option('access_level','level_10');
   CreateDir();
      
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
    $link_label = $data['link_label']?$data['link_label']:'Download';
    if($data['access']=='member'&&!is_user_logged_in())
    $matches[1][$i] = "<a href='".get_option('siteurl')."/wp-login.php'  style=\"background:url('".get_option('siteurl')."/wp-content/plugins/download-manager/l24.png') no-repeat;padding:3px 12px 12px 28px;font:bold 10pt verdana;\">Please login to access downloadables</a>";
    else {
    $matches[1][$i] = "<a href='#' onclick='javascript:window.open(\"{$_SERVER[REQUEST_URI]}{$sap}download={$id}\",\"Window1\",\"menubar=no,width=400,height=200,toolbar=no, left=\"+((screen.width/2)-200)+\", top=\"+((screen.height/2)-100));return false;' style=\"background:url('".get_option('siteurl')."/wp-content/plugins/download-manager/d24.png') no-repeat;padding:3px 12px 12px 28px;font:bold 10pt verdana;\">$link_label</a>";
    if($data['show_counter']!=0)
    $matches[1][$i] .= "<br><small style='margin-left:30px;'>Downloaded $data[download_count] times</small>";
    }
    }
    return str_replace($matches[0],$matches[1], $content);    
    
}

 

function AdminOptions(){
    
    if(!file_exists(UPLOAD_DIR)&&$_GET[task]!='CreateDir'){
        
        echo "    
        <div id=\"warning\" class=\"error fade\"><p>
        Automatic dir creation failed! [ <a href='admin.php?page=file-manager&task=CreateDir&re=1'>Try again to create dir automatically</a> ]<br><br>
        Please create dir <strong>" . UPLOAD_DIR . "</strong> manualy and set permision to <strong>777</strong><br><br>
        Otherwise you will not be able to upload files.</p></div>";        
    }
    
    if($_GET[success]==1){
        echo "
        <div id=\"message\" class=\"updated fade\"><p>
        Congratulation! Plugin is ready to use now.
        </div>
        ";
    }
    
    
    if(!file_exists(UPLOAD_DIR.'.htaccess'))
    setHtaccess();
    
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

function CreateDir(){
    if(!file_exists(UPLOAD_BASE)){
       @mkdir(UPLOAD_BASE,0777);       
   }
   @chmod(UPLOAD_BASE,0777);
   @mkdir(UPLOAD_DIR,0777);
   @chmod(UPLOAD_DIR,0777);
   setHtaccess();
   if($_GET[re]==1) {
   if(file_exists(UPLOAD_DIR)) $s=1;
   else $s = 0;   
   echo "<script>
        location.href='{$_SERVER[HTTP_REFERER]}&success={$s}';
        </script>";
    die();
   }
}

function FMSettings(){
    if($_POST){
        update_option('access_level',$_POST[access]);
    }
    $access = get_option('access_level');
    include('fm-settings.php'); 
}

function AddNewFile(){
     if(!file_exists(UPLOAD_DIR)){
        
        echo "    
        <div id=\"warning\" class=\"error fade\"><p>
        Automatic dir creation failed! [ <a href='admin.php?page=file-manager&task=CreateDir&re=1'>Try again to create dir automatically</a> ]<br><br>
        Please create dir <strong>" . UPLOAD_DIR . "</strong> manualy and set permision to <strong>777</strong><br><br>
        Otherwise you will not be able to upload files.
        </p></div>";        
    }
    
    if($_GET[success]==1){
        echo "
        <div id=\"message\" class=\"updated fade\"><p>
        Congratulation! Plugin is ready to use now.
        </div>
        ";
    }
    
    if($_POST){
    
    if(is_uploaded_file($_FILES['media']['tmp_name'])){
        $info = pathinfo($_FILES['media']['name']);        
        //echo dirname(__FILE__).'/files/'.$_FILES['media']['name'];
        extract($_POST);
        $name = file_exists(dirname(__FILE__).'/files/'.$_FILES['media']['name'])?str_replace('.'.$info['extension'],'_'.uniqid().'.'.$info['extension'],$info['basename']):$_FILES['media']['name'];        
        move_uploaded_file($_FILES['media']['tmp_name'], UPLOAD_DIR . $name);
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
    
        $name = file_exists(UPLOAD_DIR . $_FILES['media']['name'])?str_replace('.'.$info['extension'],'_'.uniqid().'.'.$info['extension'],$info['basename']):$_FILES['media']['name'];        
        move_uploaded_file($_FILES['media']['tmp_name'], UPLOAD_DIR . $name);        
        $file['file'] = $name;
    }
    
        DB::Update("ahm_files", $file, "id='$_POST[id]'"); 
        echo "<script>
        location.href='admin.php?page=file-manager';
        </script>";
    
   }

    $file = DB::getById('ahm_files',$_GET[id]);
    include('add-new-file.php');
}

function setHtaccess(){    
    $cont = 'RewriteEngine On
    <Files *>
    Deny from all
    </Files> 
       ';
       @file_put_contents(UPLOAD_DIR.'.htaccess',$cont);
}


function fmmenu(){
    add_menu_page("File Manager","File Manager",get_option('access_level'),'file-manager','AdminOptions');
    add_submenu_page( 'file-manager', 'File Manager', 'Manage', get_option('access_level'), 'file-manager', 'AdminOptions');    
    add_submenu_page( 'file-manager', 'Add New File &lsaquo; File Manager', 'Add New File', get_option('access_level'), 'file-manager/add-new-file', 'AddNewFile');    
    add_submenu_page( 'file-manager', 'Settings &lsaquo; File Manager', 'Settings', 'administrator', 'file-manager/settings', 'FMSettings');    
    
}

if(is_admin()){
    add_Action("admin_menu","fmmenu");
}

add_filter( 'the_content', 'Downloadable');

register_activation_hook(__FILE__,'Install');
