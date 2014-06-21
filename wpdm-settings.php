 <style>

input[type=text],textarea{
    width:500px;
    padding:5px;
}

input{
   padding: 7px; 
}
</style>
 
<div class="wrap">
    <div class="icon32" id="icon-options-general"><br></div>
<h2>Settings</h2>

<form action="" method="post" enctype="multipart/form-data">
 
<table cellpadding="5" cellspacing="5">

<tr>
<td>Minimum User Access Level:</td>
<td><select name="access">
    <option value="manage_options">Administrator</option>    
    <option value="manage_categories" <?php echo $access=='manage_categories'?'selected':''?>>Editor</option>    
    <option value="publish_posts" <?php echo $access=='publish_posts'?'selected':''?>>Author</option>    
    </select>
</td>
</tr>
    <tr>
        <td>Minimum User Level to Use TinyMce Button with Editor:</td>
        <td><select name="edtbtn">
                <option value="manage_options">Administrator</option>
                <option value="manage_categories" <?php echo $edtbtn=='manage_categories'?'selected':''?>>Editor</option>
                <option value="publish_posts" <?php echo $edtbtn=='publish_posts'?'selected':''?>>Author</option>
            </select>
        </td>
    </tr>
<tr>
<td>Show category info with short-code:</td>
<td><select name="wpdm_show_cinfo">
    <option value="no">No</option>    
    <option value="yes" <?php echo $wpdm_show_cinfo=='yes'?'selected':''?>>Yes</option>    
       
    </select>
</td>
</tr>

<tr>
<td>Login Required Message:</td>
<td>
<input type="text" name="wpdm_login_msg" value="<?php echo stripcslashes(htmlspecialchars(get_option('wpdm_login_msg','Login Required!'))); ?>" size="40">
</td>
</tr>

<?php if(current_user_can("manage_options")){ ?>
<tr>
<td>Server File Borwser Root:</td>
<td>
<input type="text" name="_wpdm_file_browser_root" value="<?php echo get_option('_wpdm_file_browser_root',$_SERVER['DOCUMENT_ROOT']); ?>" size="90">
</td>
</tr>
<?php } ?>


<tr>
<td>Download Link Icon:</td>
<td>
    <table><tr><td><img src="<?php echo plugins_url(); ?>/download-manager/icon/download.png" /></td><td><input type="file" name="icon"></td></tr></table>

</td>
</tr>

 

<tr>
<td valign="top"></td>
<td align="left">
               <br>


<input type="submit" value="save" accesskey="p" tabindex="5" id="publish" class="button button-primary button-large" name="publish">
    <input type="button" value="&#171; back" tabindex="9" class="button button-secondary button-large" onclick="location.href='admin.php?page=file-manager'" class="add:the-list:newmeta" name="addmeta" id="addmetasub">

    <input type="reset" value="reset" tabindex="9" class="button button-secondary button-large" class="add:the-list:newmeta" name="addmeta" id="addmetasub">
</td>
</tr>

</table>


</form>

</div>