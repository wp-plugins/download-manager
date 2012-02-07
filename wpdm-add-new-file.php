<style>
.wrap *{
   
    letter-spacing: 1px;
}

input[type=text],textarea{
 
    
}

input{
   padding: 4px 7px;
}
.cfile{margin: 2px;border:1px solid #008000;background: #F3FFF2;overflow:hidden;padding:5px;} 
.dfile{margin: 2px;border:1px solid #800;background: #ffdfdf;overflow:hidden;padding:5px;} 
.cfile img, .dfile img{cursor: pointer;}
.inside{padding:10px !important;}
#editorcontainer textarea{border:0px;width:99.9%;}
#file_uploadUploader {background: transparent url('<?php echo plugins_url(); ?>/download-manager/images/browse.png') left top no-repeat; }
#file_uploadUploader:hover {background-position: left bottom; }
.frm td{line-height: 30px; border-bottom: 1px solid #EEEEEE; padding:5px; font-size:9pt;font-family: Tahoma;}
 
</style>
 
<div class="wrap metabox-holder has-right-sidebar">
<?php if($_GET['task']=='wpdm_edit_file'){ ?>
    <div class="icon32" id="icon-add-new-file"><br></div>
<h2>Edit Download Package</h2>
<?php } else { ?>
    <div class="icon32" id="icon-add-new-file"><br></div>
<h2>Add New Download Package</h2>

<?php }?>
<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $file['id']; ?>" />
<div  style="width: 75%;float:left;">
    
<table cellpadding="5" cellspacing="5" width="100%">
<tr>
 
<td><input style="font-size:16pt;width:100%;color:<?php echo $file['title']?'#000':'#ccc'; ?>" onfocus="if(this.value=='Enter title here') {this.value=''; jQuery(this).css('color','#000'); }" onblur="if(this.value==''||this.value=='Enter title here') {this.value='Enter title here'; jQuery(this).css('color','#ccc');}" type="text" value="<?php echo $file['title']?$file['title']:'Enter title here'; ?>" name="file[title]" /></td>
</tr>

<tr>
<td valign="top"> 
<div id="poststuff" class="postarea">
                <?php the_editor(stripslashes($file['description']),'file[description]','file[description]', true); ?>
                <?php wp_nonce_field( 'closedpostboxes', 'closedpostboxesnonce', false ); ?>
                <?php wp_nonce_field( 'meta-box-order', 'meta-box-order-nonce', false ); ?>
                </div>
 
</td>
</tr>

 
<tr>
<td> <br>
 
<div  style="width: 48%;float: left;"> 
<div class="postbox " id="file_settings">
<div title="Click to toggle" class="handlediv"><br></div><h3 class="hndle"><span>Package Settings</span></h3>
<div class="inside">
<table cellpadding="5" id="file_settings_table" cellspacing="0" width="100%" class="frm">
<tr id="link_label_row">    
<td width="110px">Link Label:</td>
<td><input size="10" type="text" style="width: 200px" value="<?php echo $file[link_label]?$file[link_label]:'Download'; ?>" name="file[link_label]" />
</td></tr>
<tr id="password_row">
<td>Password:</td>  
<td><input size="10" style="width: 200px" type="text" name="file[password]" value="<?php echo $file[password]; ?>" /></td>
</tr>
<tr id="download_limit_row">
<td>Stock&nbsp;Limit:</td>  
<td><input size="10" style="width: 80px" type="text" name="file[quota]" value="<?php echo $file[quota]; ?>" /></td>
</tr>
 <tr>
<td>Download Count: </td>
<td><input type="text" name="file[download_count]" value="<?php echo $file[download_count]?$file[download_count]:0; ?>" /></td>
</tr>

<tr>
<td>Counter: </td>
<td><select name="file[show_counter]">
<option value="0">Hide</option>
<option value="1" <?php if($file['show_counter']!=0) echo 'selected="selected"'; ?> >Show</option>
</select></td>
</tr>
<tr>
<td width="70">Access:</td>
<td><select name="file[access]">
    <option value="guest">All Visitors</option>
    <option value="member" <?php if($file[access]=='memder') echo 'selected'; ?>>Members Only</option>    
    </select>
</td>
</tr>
</table>
<div class="clear"></div>
</div>
</div>


</div> 

<div  style="width: 48%;float: right;height: inherit;">
 <div class="postbox " id="categories_meta_box">
<div title="Click to toggle" class="handlediv"><br></div><h3 class="hndle"><span>Categories</span></h3>
<div class="inside">
<ul>
<?php
 $currentAccesss = maybe_unserialize( $file['category'] );
 if(!is_array($currentAccesss)) $currentAccesss = array();
 wpdm_cblist_categories('',0,$currentAccesss);   
?>
</ul> 

<div class="clear"></div>
</div>
</div>  


</div> 

 
</td>
</tr>
 

<tr>
 
<td align="right">

</td>
</tr>

</table>
</div>
<div style="float: right;width:23%">

<div class="postbox " id="upload_meta_box">
<div title="Click to toggle" class="handlediv"><br></div><h3 class="hndle"><span>Upload file from PC</span></h3>
<div class="inside">
  
<div id="currentfiles">
<?php if($file['file']!=''){ ?>
<div class="cfile"> 
<nobr>
<b style="float: left"><?php echo  basename($file['file']); ?></b> <a href='#' id="dcf" title="Delete Current File" style="float: right;">delete</a>
</nobr>
<div style="clear: both;"></div>
</div>
<?php } ?> 


<?php if($files):  ?>
<script type="text/javascript">


jQuery('#dcf').click(function(){

     return false;
});



</script>


<?php endif; ?>



</div>
<input type="file" id="file_upload" name="media"/>

 <div class="clear"></div>
</div>
</div>

<div class="postbox " id="action">
<div title="Click to toggle" class="handlediv"><br></div><h3 class="hndle"><span>Add file from server</span></h3>
<div class="inside">


<ul id="serverfiles">



<?php  
/*  
$path = "wp-content/plugins/download-manager/imports/";
$scan = scandir( '../'.$path );
$k = 0;
foreach( $scan as $v )
{
if( $v=='.' or $v=='..' or is_dir('../'.$path.$v) ) continue;

$fileinfo[$k]['file'] = 'download-manager/imports/'.$v;
$fileinfo[$k]['name'] = $v;
$k++;
}


if( !empty($fileinfo) )
{

 include dirname(__FILE__).'/imports.php';
?>
<div id="major-publishing-actions">
<div id="delete-action">

What do you want:<select name="whatido">
<option value="move"> Move files </option>
<option value="copy"> Copy files </option>
</select>



</div>


<div class="clear"></div>
</div>

 
<?php
} else {

?>
<div style="padding: 5px;line-height: 1.5;font-family: Tahoma; letter-spacing: 1px;">
    upload your files on <code>/wp-content/plugins/download-manager/imports/</code> using ftp, file list will show here.</div>

<?php } */ ?>



</ul>   <br>

<a href="admin.php?page=file-manager&task=wpdm_file_browser" class="thickbox button-secondary">Open File Browser</a>








 <div class="clear"></div>
</div>
</div>


<!--download icon-->











 <div class="clear"></div>
 



<!--end downlaod icon-->



 









<div class="postbox " id="action">
<div title="Click to toggle" class="handlediv"><br></div><h3 class="hndle"><span>Actions</span></h3>
<div class="inside">



 <input type="button" value="&#171; Back" tabindex="9" class="button-secondary" onclick="location.href='admin.php?page=file-manager'" class="add:the-list:newmeta" name="addmeta" id="addmetasub">

<input  type="reset" value="Reset" tabindex="9" class="button-secondary" class="add:the-list:newmeta" name="addmeta" id="addmetasub">

<input type="submit" value="<?php echo $_GET['task']=='wpdm_edit_file'?'Update Package':'Create Package'; ?>" accesskey="p" tabindex="5" id="publish" class="button-primary" name="publish">
 <div class="clear"></div>
</div>
</div>

<div class="postbox " id="action">
<h3><span>My Other Plugins</span></h3>
<div class="inside">
   <a href="http://wpeden.com/" style="width:97%;overflow:hidden;margin:5px;background: #fafafa;border: 1px solid #ccc;display: block;float: left;text-align: center;-webkit-border-radius: 6px;-moz-border-radius: 6px;border-radius: 6px;" ><h3 style="margin: 0px;background: #ccc;-webkit-border-top-left-radius: 5px;-webkit-border-top-right-radius: 5px;-moz-border-radius-topleft: 5px;-moz-border-radius-topright: 5px;border-top-left-radius: 5px;border-top-right-radius: 5px;padding:5px;text-decoration: none;color:#333">WordPress Themes & Plugins Collection</h3><img src="http://wpeden.com/wp-content/themes/wp-eden/img/logo.png" /></a>
   <a href="http://www.wpdownloadmanager.com/" style="width:97%;overflow:hidden;margin:5px;background: #fafafa;border: 1px solid #ccc;display: block;float: left;text-align: center;-webkit-border-radius: 6px;-moz-border-radius: 6px;border-radius: 6px;" ><h3 style="margin: 0px;background: #ccc;-webkit-border-top-left-radius: 5px;-webkit-border-top-right-radius: 5px;-moz-border-radius-topleft: 5px;-moz-border-radius-topright: 5px;border-top-left-radius: 5px;border-top-right-radius: 5px;padding:5px;text-decoration: none;color:#333">WordPress Download Manager Pro</h3><img src="http://www.wpdownloadmanager.com/wp-content/themes/wpdm/images/icon.png" /></a>
   <a href="http://www.wpmarketplaceplugin.com/" style="width:97%;overflow:hidden;margin:5px;background: #fafafa;border: 1px solid #ccc;display: block;float: left;text-align: center;-webkit-border-radius: 6px;-moz-border-radius: 6px;border-radius: 6px;" ><h3 style="margin: 0px;background: #ccc;-webkit-border-top-left-radius: 5px;-webkit-border-top-right-radius: 5px;-moz-border-radius-topleft: 5px;-moz-border-radius-topright: 5px;border-top-left-radius: 5px;border-top-right-radius: 5px;padding:5px;text-decoration: none;color:#333">WordPress Marketplace Plugin</h3><img vspace="12" src="http://wpmarketplaceplugin.com/wp-content/uploads/2011/06/logo2.png" /></a>
   <div style="clear: both;"></div>
   </div>
</div>   

</div>
 
</form>

</div>

 
       
       
