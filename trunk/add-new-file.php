 <style>
.wrap *{
    font-family: Tahoma;
    letter-spacing: 1px;
}

input[type=text],textarea{
    width:500px;
    padding:5px;
}

input{
   padding: 7px; 
}
</style>
 
<div class="wrap">
    <div class="icon32" id="icon-edit"><br></div>
<h2>Add New File</h2>

<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $file[id]; ?>" />
<table cellpadding="5" cellspacing="5">
<tr>
<td width="70">Title:</td>
<td><input size="90" type="text" value="<?php echo $file[title]; ?>" name="file[title]" /></td>
</tr>

<tr>
<td width="70" valign="top">Description:</td>
<td><textarea name="file[description]" rows="4" cols="90"><?php echo $file[description]; ?></textarea></td>
</tr>

<tr>
<td width="70">Password:</td>
<td><input size="90" type="text" name="file[password]" value="<?php echo $file[password]; ?>" /></td>
</tr>

<tr>
<td width="70">Counter: </td>
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


<tr>
<td width="70" valign="top">Upload:</td>
<td><input type="file" name="media"/></td>
</tr>

<tr>
<td width="70" valign="top"></td>
<td align="right">

<input type="button" value="&#171; Back" tabindex="9" class="button-secondary" onclick="location.href='admin.php?page=file-manager'" class="add:the-list:newmeta" name="addmeta" id="addmetasub">

<input type="reset" value="Reset" tabindex="9" class="button-secondary" class="add:the-list:newmeta" name="addmeta" id="addmetasub">

<input type="submit" value="Upload File" accesskey="p" tabindex="5" id="publish" class="button-primary" name="publish">
</td>
</tr>

</table>


</form>

</div>