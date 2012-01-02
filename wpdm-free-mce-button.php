<?php


 
add_filter('mce_external_plugins', "wpdm_tinyplugin_register");
add_filter('mce_buttons', 'wpdm_tinyplugin_add_button', 0);
 
function wpdm_tinyplugin_add_button($buttons)
{
    array_push($buttons, "separator", "wpdm_tinyplugin");
    return $buttons;
}

function wpdm_tinyplugin_register($plugin_array)
{
    $url = plugins_url("download-manager/editor_plugin.js");

    $plugin_array['wpdm_tinyplugin'] = $url;
    return $plugin_array;
}


function wpdm_free_tinymce(){
    global $wpdb;
    if($_GET['wpdm_action']!='wpdm_tinymce_button') return false;
    ?>
<html>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" />
<title>Download Contrller &#187; Insert Package or Category</title>
<style type="text/css">
*{font-family: Tahoma !important; font-size: 9pt; letter-spacing: 1px;}
select,input{padding:5px;font-size: 9pt !important;font-family: Tahoma !important; letter-spacing: 1px;margin:5px;}
.button{
    background: #7abcff; /* old browsers */

background: -moz-linear-gradient(top, #7abcff 0%, #60abf8 44%, #4096ee 100%); /* firefox */

background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#7abcff), color-stop(44%,#60abf8), color-stop(100%,#4096ee)); /* webkit */

filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#7abcff', endColorstr='#4096ee',GradientType=0 ); /* ie */
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
border-radius: 4px;
border:1px solid #FFF;
color: #FFF;
}
 
.input{
 width: 340px;   
 background: #EDEDED; /* old browsers */

background: -moz-linear-gradient(top, #EDEDED 24%, #fefefe 81%); /* firefox */

background: -webkit-gradient(linear, left top, left bottom, color-stop(24%,#EDEDED), color-stop(81%,#fefefe)); /* webkit */

filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#EDEDED', endColorstr='#fefefe',GradientType=0 ); /* ie */
border:1px solid #aaa; 
color: #000;
}
.button-primary{cursor: pointer;}
fieldset{padding: 10px;}
</style> 
</head>
<body>    <br>

<fieldset><legend>Embed File</legend>
    <select class="button input" id="fl">
    <?php
    $res = $wpdb->get_results("select * from ahm_files", ARRAY_A); 
    foreach($res as $row){
    ?>
    
    <option value="<?php echo $row['id']; ?>"><?php echo $row['title']; ?></option>
    
    
    <?php    
        
    }
?>
    </select>
    <input type="submit" id="addtopost" class="button button-primary" name="addtopost" value="Insert into post" />
</fieldset>   <br>
<fieldset><legend>Embed Category</legend>
    <select class="button input" id="flc">
    <?php
    wpdm_dropdown_categories();
    ?>
    </select>
    <input type="submit" id="addtopostc" class="button button-primary" name="addtopost" value="Insert into post" />
</fieldset>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo home_url('/wp-includes/js/tinymce/tiny_mce_popup.js'); ?>"></script>
                <script type="text/javascript">
                    /* <![CDATA[ */                    
                    jQuery('#addtopost').click(function(){
                    var win = window.dialogArguments || opener || parent || top;                
                    win.send_to_editor('{filelink='+$('#fl').val()+'}');
                    tinyMCEPopup.close();
                    return false;                   
                    });
                    jQuery('#addtopostc').click(function(){
                    var win = window.dialogArguments || opener || parent || top;                
                    win.send_to_editor('{wpdm_category='+jQuery('#flc').val()+'}');
                    tinyMCEPopup.close();
                    return false;                   
                    });  
                              
                    /* ]]> */
                </script>

</body>    
</html>
    
    <?php
    
    die();
}
 

add_action('init', 'wpdm_free_tinymce');

