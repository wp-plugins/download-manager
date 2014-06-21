<?php
if(!defined('ABSPATH')) die('Error!');

global $wpdb; 
 if(!file_exists(dirname(__FILE__).'/cache/'))
    die("<code>".dirname(__FILE__).'/cache/</code> is missing!' );
    
    if(!is_writable(dirname(__FILE__).'/cache/'))
    die("<code>".dirname(__FILE__).'/cache/</code> must have to be writable!' );
$did = explode('.',base64_decode($_GET['did']));
$id = array_shift($did);
if(!is_numeric($id)){   
    $_GET['did'] =  esc_attr($_GET['did']); 
    $data = @unserialize(file_get_contents(dirname(__FILE__).'/cache/'.$_GET['did']));
    
   
}
else {    
    
    $id = (int)$id;
    $data = $wpdb->get_row("select * from ahm_files where id='$id'",ARRAY_A);
}

if(is_array($data)){   
    if($data['access']=='member'&&!is_user_logged_in()) {
        header("location: wp-login.php?redirect_to=".urlencode($_SERVER['REQUEST_URI']));
        die();
    }
    $_GET['did'] = sanitize_file_name($_GET['did']);
    @unlink(dirname(__FILE__).'/cache/'.$_GET['did']);
    
    
    if($data['download_count']>=$data['quota']&&$data['quota']>0) die('Download Limit Excedded!');
        
    //added for download monitor import feature
    $data['file'] = str_replace(site_url('/'),ABSPATH, $data['file']);
     
    if(strpos($data['file'],'ttp://')){
        header("location: ".$data['file']);
        die();
    }
    $data['file'] = trim($data['file']);
    if(file_exists($data['file']) && $data['file']!= "")
    $fname = $data['file'];    
    else if(file_exists(UPLOAD_DIR . $data['file']) && $data['file']!= "")
    $fname = UPLOAD_DIR . $data['file'];
    else if( $data['file']== "")
        wp_die("No file attached yet.");
    else 
    wp_die('File not found!');
    
    $wpdb->query("update ahm_files set download_count=download_count+1 where id='$data[id]'");

     
    $filetype = wp_check_filetype($fname);
                       
    $mtype = $filetype['type'];
    
    $asfname = basename($fname);

    $fsize = filesize($fname);

    header("Content-Description: File Transfer");
    header("Content-Type: $mtype");
    header("Content-Disposition: attachment; filename=\"$asfname\"");
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: " . $fsize);
    
 
    $wpdm_tsize = 0;
    $wpdm_chunk = 8192;
    $file = @fopen($fname,"rb");
    $wpdm_rest = $fsize;
    if ($file) {

                                       
       while (!feof($file)) {
            if($wpdm_rest<$wpdm_chunk&&$wpdm_rest>0) $wpdm_chunk = $wpdm_rest;
            echo fread($file, $wpdm_chunk);
            if(function_exists('ob_flush')) @ob_flush();
            $wpdm_tsize += $wpdm_chunk;
            $wpdm_rest = $fsize - $wpdm_tsize;
        }
      fclose($file);

        if (connection_status()!=0) {

          @fclose($file);

          die();

        }

     

      @fclose($file);
      

    }

}  else {
    die('File not found or Downlaoad Link Expired!');
}

die();
?>