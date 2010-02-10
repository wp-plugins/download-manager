<?php
    
session_start(); 

if(is_array($_SESSION[$_GET[did]])){    
    
    $data = $_SESSION[$_GET[did]];
    $_SESSION[$_GET[did]] = '';
    unset($_SESSION[$_GET[did]]);
    
    //d$data = DB::getById('ahm_files',$_GET['download']);
    $fname = dirname(__FILE__).'/files/' . $data['file'];
    $mtype = mime_content_type($fname);  
     
    $asfname = basename($fname);

    $fsize = filesize($fname);

    header("Content-Description: File Transfer");
    header("Content-Type: $mtype");
    header("Content-Disposition: attachment; filename=\"$asfname\"");
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: " . $fsize);
    
    

// download

// @readfile($file_path);

    $file = @fopen($fname,"rb");

    if ($file) {

                                       
        print(fread($file, $fsize));

        flush();

        if (connection_status()!=0) {

          @fclose($file);

          die();

        }

     

      @fclose($file);

    }

}

?>