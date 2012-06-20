<?php 
/*
Plugin Name: Download Manager
Plugin URI: http://www.wpdownloadmanager.com/
Description: Manage, track and controll file download from your wordpress site
Author: Shaon
Version: 2.2.5
Author URI: http://www.wpdownloadmanager.com/
*/

error_reporting(E_ALL&~E_NOTICE);

$d = str_replace('\\','/',dirname(__FILE__));
$d = explode("/", $d);
array_pop($d);
array_pop($d);
$d = implode('/', $d);

define('UPLOAD_DIR',$d.'/uploads/download-manager-files/');  
define('UPLOAD_BASE',$d.'/uploads/');  

function wpdm_process(){
    if($_GET['wpdmact']=='process')
    include("process.php");
}

include(dirname(__FILE__)."/functions.php");
include(dirname(__FILE__)."/class.wpdmpagination.php");
include(dirname(__FILE__)."/wpdm-server-file-browser.php");
include(dirname(__FILE__)."/wpdm-free-mce-button.php");
  
if(!$_POST)    $_SESSION['download'] = 0;

function wpdm_download_info(){
    include("download.php");
}

function wpdm_free_install(){
    global $wpdb;
 
      $sql = "CREATE TABLE IF NOT EXISTS `ahm_files` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `title` varchar(255) NOT NULL,
              `description` text NOT NULL,
              `category` text NOT NULL,
              `file` varchar(255) NOT NULL,
              `password` varchar(40) NOT NULL,
              `download_count` int(11) NOT NULL,
              `access` enum('guest','member') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
              `show_counter` tinyint(1) NOT NULL,
              `quota` INT NOT NULL,
              `link_label` varchar(255) NOT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=MyISAM  DEFAULT CHARSET=utf8";

      require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
      
      $wpdb->query($sql);
      //$wpdb->query("ALTER TABLE `ahm_files` ADD `` varchar(255) NOT NULL");
      $wpdb->query("ALTER TABLE `ahm_files` ADD `link_label` varchar(255) NOT NULL");
      $wpdb->query("ALTER TABLE `ahm_files` ADD `show_counter` tinyint(1) NOT NULL");      
      $wpdb->query("ALTER TABLE `ahm_files` ADD `download_count` INT NOT NULL");
      $wpdb->query("ALTER TABLE `ahm_files` ADD `quota` INT NOT NULL");
      $wpdb->query("ALTER TABLE `ahm_files` ADD `category` TEXT NOT NULL");
      
   update_option('wpdm_access_level','administrator');
   wpdm_create_dir();
      
}

function wpdm_new_packages($show=5, $show_count=true){
    global $wpdb;
     
    $data = $wpdb->get_results("select * from ahm_files order by id desc limit 0, $show",ARRAY_A);
    foreach($data as $d){
        
        $key = $d['id'];
        if($show_count) $sc = "<br/><i>$d[download_count] downloads</i>";         
        $url = home_url("/?download={$d[id]}");  
        echo "<li><div class='wpdm_link'><a  class='wpdm-popup' title='$d[title]' href='$url'>{$d[title]}</a> $sc</div></li>\r\n";
    }
}

function wpdm_import_download_monitor(){
    global $wpdb;
    $data = $wpdb->get_results("select * from {$wpdb->prefix}download_monitor_files");    
    if($data){
    foreach($data as $d){
        $tdata = $wpdb->get_results("select t.name from {$wpdb->prefix}download_monitor_taxonomies t,{$wpdb->prefix}download_monitor_relationships r where t.taxonomy='category' and t.id=r.taxonomy_id and r.download_id={$d->id}");
        $ct = array();
        foreach($tdata as $c){
            $ctu = strtolower(preg_replace("/([^a-zA-Z0-9\-]+)/","-", $c->name));
            $ct[] = $ctu;
            $allc["$ctu"] = array('title'=>$c->name);
        }
        $wpdm = array(
            'title'=>$d->title,
            'description'=>$d->file_description,
            'file'=>$d->filename,
            'password'=>'',
            'download_count'=>$d->hits,
            'access'=> ($d->member?'member':'guest'),
            'show_counter'=>'1',
            'quota'=>'0',
            'category' => serialize($ct),
            'link_label'=>'Download'
        );
        $wpdb->insert('ahm_files', $wpdm);
    }
    $tpldata = maybe_unserialize(get_option('_fm_categories'));
    if(!$tpldata)  $tpldata = array();
    $tpldata = $tpldata + $allc;
    update_option('_fm_categories',@serialize($tpldata)); 
    }
    echo "
    <script>
    location.href='admin.php?page=file-manager';
    </script>
    ";
    die();
    
    
}

   

function wpdm_downloadable_nsc($params){
    global $wpdb; 
    extract($params); 
    
    
    $home = home_url('/');
    
    $sap = count($_GET)>0?'&':'?';
        
    $data = $wpdb->get_row("select * from ahm_files where id='$id'",ARRAY_A);      
    if($title=='true') $title = "<h3>".$data['title']."</h3>";
    else  $title = '';
    if($desc=='true') $desc = $data['description']."</br>";
    else  $desc = '';
    $desc = stripslashes($desc);
    if($data['show_counter']!=0)  $hc= 'has-counter';
    if($template=='') $template = 'wpdm-only-button';
    $wpdm_login_msg = get_option('wpdm_login_msg')?get_option('wpdm_login_msg'):'Login Required';
    $link_label = $data['link_label']?$data['link_label']:'Download';
    if($data['access']=='member'&&!is_user_logged_in()){    
    $url = get_option('siteurl')."/wp-login.php?redirect_to=".$_SERVER['REQUEST_URI'];
    $uuid = uniqid();
    /*$args = array(
        'echo' => false,
        'redirect' => $_SERVER['REQUEST_URI'], 
        'form_id' => 'loginform_'.$id,
        'label_username' => __( 'Username' ),
        'label_password' => __( 'Password' ),
        'label_remember' => __( 'Remember Me' ),
        'label_log_in' => __( 'Log In' ),
        'id_username' => 'user_login',
        'id_password' => 'user_pass',
        'id_remember' => 'rememberme_'.$id,
        'id_submit' => 'wp-submit_'.$id,
        'remember' => true,
        'value_username' => NULL,
        'value_remember' => false );
    $loginform = "<div id='wpdm-login-form' class='wpdm-login-form'>".wp_login_form( $args ).'</div>';*/
    
    //"<div class=passit>Login Required<br/><input placeholder='Username' type=text id='username_{$id}' size=15 class='inf' /> <input placeholder='Password' class='inf' type=password id='password_{$id}' size=15 /><span class='perror'></span></div>";    
    $html = "<div id='wpdm_file_{$id}' class='wpdm_file $template'>{$title}<div class='cont'>{$desc}{$loginform}<div class='btn_outer'><div class='btn_outer_c'><a class='btn_left $classrel $hc login-please' rel='{$id}' title='{$data[title]}' href='$url'  >$link_label</a>";    
    //if($data['show_counter']!=0)
    //$html .= "<span class='btn_right counter'>$data[download_count] downloads</span>";    
    //else
    $html .= "<span class='btn_right counter'>Login Required</span>";                 
    $html .= "</div></div><div class='clear'></div></div></div>";
    }
    else {
    if($data['password']=='') { $url = home_url('/?wpdmact=process&did='.base64_encode($id.'.hotlink')); $classrel = ""; }
    else { $classrel='haspass'; /*$url = home_url('/?download='.$id);*/ $url = home_url('/');  $password_field = "<div class=passit>Enter password<br/><input type=password id='pass_{$id}' size=15 /><span class='perror'></span></div>"; }
    $html = "<div id='wpdm_file_{$id}' class='wpdm_file $template'>{$title}<div class='cont'>{$desc}{$password_field}<div class='btn_outer'><div class='btn_outer_c'><a class='btn_left $classrel $hc' rel='{$id}' title='{$data[title]}' href='$url'  >$link_label</a>";
    if($data['show_counter']!=0)
    $html .= "<span class='btn_right counter'>$data[download_count] downloads</span>";    
    else
    $html .= "<span class='btn_right'>&nbsp;</span>";             
    $html .= "</div></div><div class='clear'></div></div></div>";
    }        
    return $html;    
}

function wpdm_downloadable($content){
    global $wpdb; 
     
    preg_match_all("/\{filelink\=([^\}]+)\}/", $content, $matches);
     
    $home = home_url('/');
    
    $sap = count($_GET)>0?'&':'?';
    for($i=0;$i<count($matches[1]);$i++){        
    $id = $matches[1][$i];       
    $data = $wpdb->get_row("select * from ahm_files where id='$id'",ARRAY_A);      
    $wpdm_login_msg = get_option('wpdm_login_msg')?get_option('wpdm_login_msg'):'Login Required';
    $link_label = $data['link_label']?$data['link_label']:'Download';
    if($data['access']=='member'&&!is_user_logged_in())
    $matches[1][$i] = "<a href='".get_option('siteurl')."/wp-login.php?redirect_to=".$_SERVER['REQUEST_URI']."'  style=\"background:url('".get_option('siteurl')."/wp-content/plugins/download-manager/l24.png') no-repeat;padding:3px 12px 12px 28px;font:bold 10pt verdana;\">".$wpdm_login_msg."</a>";
    else {
    if($data['password']=='') { $url = home_url('/?wpdmact=process&did='.base64_encode($id.'.hotlink')); $classrel = ""; }
    else { $url = home_url('/?download='.$id);  $classrel = " class='wpdm-popup' rel='colorbox' "; }
    $matches[1][$i] = "<a $classrel title='{$data[title]}' href='$url' style=\"background:url('".get_option('siteurl')."/wp-content/plugins/download-manager/icon/download.png') no-repeat;padding:3px 12px 12px 28px;font:bold 10pt verdana;\">$link_label</a>";
    if($data['show_counter']!=0)
    $matches[1][$i] .= "<br><small style='margin-left:30px;'>Downloaded $data[download_count] times</small>";
    }
    }
    
    preg_match_all("/\{wpdm_category\=([^\}]+)\}/", $content, $cmatches);
    for($i=0;$i<count($cmatches[1]);$i++){         
    $cmatches[1][$i] = wpdm_embed_category($cmatches[1][$i]);
    }
    $content = str_replace($cmatches[0],$cmatches[1], $content);    
    return str_replace($matches[0],$matches[1], $content);    
    
}

function wpdm_cblist_categories($parent="", $level = 0, $sel = array()){
   $cats = maybe_unserialize(get_option('_fm_categories')); 
   if(is_array($cats)){
   if($parent!='') echo "<ul>";   
   foreach($cats as $id=>$cat){
       $pres = str_repeat("&mdash;", $level);
       if($cat['parent']==$parent){
       if(in_array($id,$sel))    
       $checked = 'checked=checked';
       else
       $checked = '';
       echo "<li><input type='checkbox' name='file[category][]' value='$id' $checked /> $cat[title]</li>\n";
       wpdm_cblist_categories($id,$level+1, $sel);}
   }
   if($parent!='') echo "</ul>";
   }
}

function wpdm_dropdown_categories($parent="", $level = 0, $sel='',$cid='',$class=array()){
   $cats = maybe_unserialize(get_option('_fm_categories')); 
   if(!is_array($cats)) $cats = array();   
   foreach($cats as $id=>$cat){
       $pres = str_repeat("&mdash;", $level);
       array_push($class,$parent);
       if($parent=='') $class = array();
       $class = array_unique($class);
       $cssclass = implode(" ",$class);
       if($cat['parent']==$parent){
       if($sel==$id)    
       echo "<option class='level_{$level} $id $cssclass' selected=selected value='$id'>{$pres} $cat[title]</option>\n";
       else
       echo "<option class='level_{$level} $id $cssclass' value='$id'>{$pres} $cat[title]</option>\n";  
       wpdm_dropdown_categories($id,$level+1, $sel, $cid, $class);}
   }
   
} 

function wpdm_admin_options(){
    
    if(!file_exists(UPLOAD_DIR)&&$_GET[task]!='wpdm_create_dir'){
        
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
    wpdm_set_htaccess();
    
    if($_GET[task]!='')
    return call_user_func($_GET['task']);        
    else
    include('wpdm-list-files.php');
}

function wpdm_delete_file(){
    global $wpdb;
    if(is_array($_GET[id])){
        foreach($_GET[id] as $id){
            $qry[] = "id='".(int)$id."'";
        }
        $cond = implode(" and ", $qry);
    } else
    $cond = "id='".(int)$_GET[id]."'";
    $wpdb->query("delete from ahm_files where ". $cond);
    echo "<script>
        location.href='admin.php?page=file-manager';
        </script>";
    die();
}

function wpdm_create_dir(){
    if(!file_exists(UPLOAD_BASE)){
       @mkdir(UPLOAD_BASE,0777);       
   }
   @chmod(UPLOAD_BASE,0777);
   @mkdir(UPLOAD_DIR,0777);
   @chmod(UPLOAD_DIR,0777);
   @chmod(dir(__FILE__).'/cache/',0777);
   wpdm_set_htaccess();
   if($_GET[re]==1) {
   if(file_exists(UPLOAD_DIR)) $s=1;
   else $s = 0;   
   echo "<script>
        location.href='{$_SERVER[HTTP_REFERER]}&success={$s}';
        </script>";
    die();
   }
}

function wpdm_settings(){
    if($_POST){
        update_option('wpdm_access_level',$_POST[access]);
        update_option('wpdm_login_msg',$_POST[wpdm_login_msg]);
    }
    if(is_uploaded_file($_FILES['icon']['tmp_name'])){
        ///print_r(dirname(__FILE__).'/icon/download.png');
        move_uploaded_file($_FILES['icon']['tmp_name'],dirname(__FILE__).'/icon/download.png');
    }
    $access = get_option('wpdm_access_level');
    include('wpdm-settings.php'); 
}

function wpdm_add_new_file(){
    global $wpdb; 
    if(!file_exists(UPLOAD_DIR)){
        
        echo "    
        <div id=\"warning\" class=\"error fade\"><p>
        Automatic dir creation failed! [ <a href='admin.php?page=file-manager&task=wpdm_create_dir&re=1'>Try again to create dir automatically</a> ]<br><br>
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
    extract($_POST);
    if(is_uploaded_file($_FILES['media']['tmp_name'])){
        $info = pathinfo($_FILES['media']['name']);        
        //echo dirname(__FILE__).'/files/'.$_FILES['media']['name'];
        
        $name = file_exists(dirname(__FILE__).'/files/'.$_FILES['media']['name'])?str_replace('.'.$info['extension'],'_'.uniqid().'.'.$info['extension'],$info['basename']):$_FILES['media']['name'];        
        move_uploaded_file($_FILES['media']['tmp_name'], UPLOAD_DIR . $name);
        $file['file'] = $name;
        
    }
                      
        $file['show_counter'] = 0;
        $file['quota'] = $file['quota']?$file['quota']:0;
        $file['category'] = serialize($file['category']);
        $wpdb->insert("ahm_files", $file); 
        if(!$wpdb->insert_id){
            $wpdb->show_errors();
            $wpdb->print_error();
            die();               
        }
        echo "<script>
        location.href='admin.php?page=file-manager';
        </script>";
    
   }

    
    include('wpdm-add-new-file.php');
}

function wpdm_edit_file(){
     global $wpdb;
    if($_POST){
    extract($_POST);
    if(is_uploaded_file($_FILES['media']['tmp_name'])){
        $info = pathinfo($_FILES['media']['name']);        
        //echo dirname(__FILE__).'/files/'.$_FILES['media']['name'];
    
        $name = file_exists(UPLOAD_DIR . $_FILES['media']['name'])?str_replace('.'.$info['extension'],'_'.uniqid().'.'.$info['extension'],$info['basename']):$_FILES['media']['name'];        
        move_uploaded_file($_FILES['media']['tmp_name'], UPLOAD_DIR . $name);        
        $file['file'] = $name;
    }        
         
        $file['category'] = serialize($file['category']);        
       
        $wpdb->update("ahm_files", $file, array("id"=>$_POST[id])); 
       
        echo "<script>
        location.href='admin.php?page=file-manager';
        </script>";
    
   }

    $file = $wpdb->get_row("select * from ahm_files where id='$_GET[id]'",ARRAY_A);    
    
    include('wpdm-add-new-file.php');
} 

function wpdm_categories(){
   $cid = addslashes($_GET['cid']); 
   if($_GET['task']=='DeleteCategory'){
        $tpldata = maybe_unserialize(get_option('_fm_categories'));
        unset($tpldata[$cid]);         
        update_option('_fm_categories',@serialize($tpldata)); 
        echo "<script>
        location.href='{$_SERVER[HTTP_REFERER]}';
        </script>";   
    die();
    } 
     if($_POST['cat']){
        $tpldata = maybe_unserialize(get_option('_fm_categories'));
        if(!is_array($tpldata)) $tpldata =array();
        $tcid = $_POST['cid']?$_POST['cid']:strtolower(preg_replace("/([^a-zA-Z0-9\-]+)/","-", $_POST['cat']['title']));
        $cid = $tcid;
        while(array_key_exists($cid, $tpldata)&&$_POST['cid']==''){
            $cid = $tcid."-".(++$postfx);
        }
        
        if($_POST['cat']['title']!=''){
        $tpldata[$cid] = $_POST['cat'];        
        update_option('_fm_categories',@serialize($tpldata)); }
         echo "<script>
        location.href='{$_SERVER[HTTP_REFERER]}';
        </script>";
        die();
    }
   include("wpdm-categories.php");
}

function wpdm_cat_dropdown_tree($parent="", $level = 0){
   $cats = maybe_unserialize(get_option('_fm_categories')); 
   foreach($cats as $id=>$cat){
       $pres = str_repeat("&mdash;", $level);
       if($cat['parent']==$parent){
       echo "<option value='$id'>{$pres} $cat[title]</option>\n";
       wpdm_cat_dropdown_tree($id,$level+1);}
   }
}

function wpdm_embed_category($id){
    global $wpdb, $current_user, $post, $wp_query;
    $postlink = get_permalink($post->ID);
    get_currentuserinfo();
    
    $user = new WP_User(null);
    $categories = maybe_unserialize(get_option("_fm_categories",true));
    $category = $categories[$id];
    $total = $wpdb->get_var("select count(*) from ahm_files where category like '%\"$id\"%'");
     
    $item_per_page =  10;
    $pages = ceil($total/$item_per_page);
    $page = $_GET['cp']?$_GET['cp']:1;
    $start = ($page-1)*$item_per_page;
    $pag = new wpdmpagination();             
    $pag->items($total);
    $pag->limit($item_per_page);
    $pag->currentPage($page);
    $url = strpos($_SERVER['REQUEST_URI'],'?')?$_SERVER['REQUEST_URI'].'&':$_SERVER['REQUEST_URI'].'?';
    $pag->urlTemplate($url."cp=[%PAGENO%]");

    $ndata = $wpdb->get_results("select * from ahm_files where category like '%\"$id\"%' limit $start, $item_per_page",ARRAY_A);
     

$sap = count($_GET)>0?'&':'?';
$html = '';
foreach($ndata as $data){
  
    $link_label = $data['title']?$data['title']:'Download';  
    $data['page_link'] = "<a class='wpdm-popup' href='{$postlink}{$sap}download={$data[id]}'>$link_label</a>";
    if($data[preview]!='')
    $data['thumb'] = "<img class='wpdm_icon' align='left' src='".plugins_url()."/{$data[preview]}' />";
    else
    $data['thumb'] = '';
    if($data[icon]!='')
    $data['icon'] = "<img class='wpdm_icon' align='left' src='".plugins_url()."/{$data[icon]}' />";
    else
    $data['icon'] = '';
    
    
            if($data['show_counter']==1){
                $counter = "{$data[download_count]} downloads<br/>";
                $data['counter'] = $counter;
            }
            
            //foreach( $data as $ind=>$val ) $reps["[".$ind."]"] = $val;
            //$repeater =  stripslashes( strtr( $category['template_repeater'],   $reps ));  
            $template = "<li><div class='wpdm_clink'><b>$data[page_link]</b><br/><small>$data[counter]</small></div></li>";
            if($data['access']=='member'&&!is_user_logged_in())
            $template = "<li><div class='wpdm_clink'><a href='".get_option('siteurl')."/wp-login.php?redirect_to=".$_SERVER['REQUEST_URI']."' >$data[title]</a></b><br/><small>login to download</small></div></li>";
            $html .= $template;
          
            
END;
            
        
        
   
        
 
        
}
 

return "<ul class='wpdm-category $id'>".$html."</div><div style='clear:both'></ul>";
}

 

function wpdm_tinymce()
{
  wp_enqueue_script('common');
  wp_enqueue_script('jquery-color');
  wp_admin_css('thickbox');
  wp_print_scripts('post');
  wp_print_scripts('media-upload');
  wp_print_scripts('jquery');
  wp_print_scripts('jquery-ui-core');
  wp_print_scripts('jquery-ui-tabs');
  wp_print_scripts('tiny_mce');
  wp_print_scripts('editor');
  wp_print_scripts('editor-functions');
  add_thickbox();
  //wp_tiny_mce();
  //wp_admin_css();
  wp_enqueue_script('utils');
  do_action("admin_print_styles-post-php");
  do_action('admin_print_styles');
  remove_all_filters('mce_external_plugins');
}

function wpdm_set_htaccess(){    
    $cont = 'RewriteEngine On
    <Files *>
    Deny from all
    </Files> 
       ';
       @file_put_contents(UPLOAD_DIR.'.htaccess',$cont);
}


function wpdm_front_js(){
    ?>
    <script language="JavaScript">
    <!--
      jQuery(function(){
          
          jQuery('.wpdm-popup').click(function(){
              tb_show(jQuery(this).html(),this.href+'&modal=1&width=600&height=400');
              return false;
          });
          
          jQuery('.haspass').click(function(){
              var url = jQuery(this).attr('href');
              var id = jQuery(this).attr('rel');
              var password = jQuery('#pass_'+id).val();
              jQuery.post('<?php echo home_url('/'); ?>',{download:id,password:password},function(res){
                  
                  if(res=='error') {
                    
                      jQuery('#wpdm_file_'+id+' .perror').html('Wrong Password');
                      setTimeout("jQuery('#wpdm_file_"+id+" .perror').html('');",3000);
                      return false;
                  } else {
                      location.href = '<?php echo home_url('/?wpdmact=process&did='); ?>'+res;
                  }
                  //if(res.url!='undefined') location.href=res.url;
                                           
              });
               
              return false;
          });
      })
    //-->
    </script>
    <?php
}

function wpdm_copyold(){
    global $wpdb;
    $ids = get_option('wpdmc2p_ids',true);
    if($_POST['task']=='wpdm_copy_files'){        
        if(!is_array($ids)) $ids = array();
        if(!is_array($_POST[id])) $_POST[id] = array();
        foreach($_POST[id] as $fid){
            //if(!in_array($fid, $ids)){
            $file = $wpdb->get_row("select * from ahm_files where id='$fid'", ARRAY_A);                        
            unset($file[id]);
            //print_r($file);
            //$wpdb->show_errors();
            $wpdb->insert("ahm_files",$file);
            //$wpdb->print_error();die() ;
            //}
        }
        if(is_array($ids))
        $ids = array_unique(array_merge($ids, $_POST['id']));
        else
        $ids = $_POST['id'];
        /*foreach($_POST as $optn=>$optv){
            update_option($optn, $optv);
        }                                      */
       
        update_option('wpdmc2p_ids',$ids);
        die('Copied successfully');
    }
  
    $res = mysql_query("select * from ahm_files");
    
    ?>

 
<div class="wrap">
    <div class="icon32" id="icon-upload"><br></div>
    
<h2>Copy from Download Manager</h2>  <br>

<div class="clear"></div>
<form action="" method="post">
<input type="hidden" name="task" value="wpdm_copy_files" />

<table cellspacing="0" class="widefat fixed">
    <thead>
    <tr>
    <th style="" class="manage-column column-cb check-column" id="cb" scope="col"><input class="call m" type="checkbox"></th>    
    <th style="" class="manage-column column-media" id="media" scope="col">File</th>    
    <th style="" class="manage-column column-parent" id="parent" scope="col">Copied</th>
    </tr>
    </thead>

    <tfoot>
    <tr>
    <th style="" class="manage-column column-cb check-column" id="cb" scope="col"><input class="call m" type="checkbox"></th>    
    <th style="" class="manage-column column-media" id="media" scope="col">File</th>
    <th style="" class="manage-column column-parent" id="parent" scope="col">Copied</th>
    </tr>
    </tfoot>

    <tbody class="list:post" id="the-list">
    <?php while($media = mysql_fetch_assoc($res)) {   $media['copied'] = @in_array($media[id],$ids)?'Yes':'No'; ?>
    <tr valign="top" class="alternate author-self status-inherit" id="post-8">

                <th class="check-column" scope="row"><input type="checkbox" value="<?php echo $media[id];?>" class="m" name="id[]"></th>
                
                <td class="media column-media">
                    <strong><a title="Edit" href="admin.php?page=file-manager&task=EditFile&id=<?php echo $media['id']?>"><?php echo $media['title']?></a></strong>                     
                </td>
                <td class="parent column-parent"><b><?php echo $media['copied']; ?></b></td>
     
     </tr>
     <?php } ?>
    </tbody>
</table>
                     <br>
                     
<input type="submit" value="Copy Selected Files" class="button-primary">
</form>
 <script language="JavaScript">
 <!--
   jQuery('.call').click(function(){
       if(this.checked)
       jQuery('.m').attr('checked','checked');
       else
       jQuery('.m').removeAttr('checked');
   });
 //-->
 </script>
    </div>
    <?php
}

function wpdm_hotlink($params){
    global $wpdb;
    extract($params);
    if($id=='') return;
    $data = $wpdb->get_row("select * from ahm_files where id='$id'",ARRAY_A);
    if($data['id']=='') return;
    $link_label = $link_label?$link_label:$data['link_label'];
    $url = home_url('/?wpdmact=process&did='.base64_encode($id.'.hotlink')); 
    return "<a href='$url'>$link_label</a>";
    
}

function delete_all_cats(){
    if($_GET['page']=='file-manager/categories'&&$_GET['task']=='delete-all'){
        delete_option('_fm_categories');
        header('location: '.$_SERVER['HTTP_REFERER']);
        die();
    }
}

function wpdm_menu(){
    add_menu_page("File Manager","File Manager",get_option('wpdm_access_level'),'file-manager','wpdm_admin_options');
    $access = get_option('wpdm_access_level')?get_option('wpdm_access_level'):'administrator';
    add_submenu_page( 'file-manager', 'File Manager', 'Manage', $access, 'file-manager', 'wpdm_admin_options');    
    add_submenu_page( 'file-manager', 'Add New File &lsaquo; File Manager', 'Add New File', $access, 'file-manager/add-new-file', 'wpdm_add_new_file');    
    add_submenu_page( 'file-manager', 'Categories &lsaquo; File Manager', 'Categories', 'administrator', 'file-manager/categories', 'wpdm_categories');        
    add_submenu_page( 'file-manager', 'Settings &lsaquo; File Manager', 'Settings', 'administrator', 'file-manager/settings', 'wpdm_settings');    
    
}


function wpdm_admin_enque_scripts(){
    wp_enqueue_style('icons',plugins_url().'/download-manager/css/icons.css');        
    wp_enqueue_script('jquery');
    wp_enqueue_script('file-tree-js',plugins_url().'/download-manager/js/jqueryFileTree.js');    
    add_action("init","wpdm_file_browser");
    add_action("init","wpdm_dir_tree");
     
}

function wpdm_enque_scripts(){
   wp_enqueue_script('jquery');  
   wp_enqueue_script('thickbox');  
   wp_enqueue_style('thickbox');  
   wp_enqueue_style('wpdm-front',plugins_url().'/download-manager/css/front.css'); 
}


add_action("admin_menu","wpdm_menu");
add_action("init","delete_all_cats");

add_action('admin_enqueue_scripts','wpdm_admin_enque_scripts');
add_action('wp_enqueue_scripts','wpdm_enque_scripts');
add_action('wp_head','wpdm_front_js');

if(isset($_GET['page'])&&$_GET['page']=='file-manager/add-new-file')
add_filter('admin_head','wpdm_tinymce');

add_action("wp","wpdm_download_info");

add_filter( 'the_content', 'wpdm_downloadable');

add_shortcode('wpdm_hotlink','wpdm_hotlink');
add_shortcode('wpdm_file','wpdm_downloadable_nsc');

add_action('init','wpdm_process');

include("wpdm-widgets.php");

register_activation_hook(__FILE__,'wpdm_free_install');
