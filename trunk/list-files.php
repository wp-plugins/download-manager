<?php

$limit = 10;
 
$start = $_GET['paged']?(($_GET['paged']-1)*$limit):0;
$res = mysql_query("select * from ahm_files limit $start, $limit");
 
$row = mysql_fetch_assoc(mysql_query("select count(*) as total from ahm_files"));

?>
<style>
.wrap *{
    font-family: Tahoma;
    letter-spacing: 1px;
}
</style>

<div class="wrap">
    <div class="icon32" id="icon-upload"><br></div>
<h2>Manage Files <a class="button add-new-h2" href="admin.php?page=file-manager/add-new-file">Add New</a> </h2>
 <i><b style="font-family:Georgia">Simply Copy and Paste the embed code at anywhere in post contents</b></i><br><br>

 

           
<form method="get" action="" id="posts-filter">
<div class="tablenav">

<div class="alignleft actions">
<select class="select-action" name="task">
<option selected="selected" value="">Bulk Actions</option>
<option value="DeleteFile">Delete Permanently</option>
</select>
<input type="submit" class="button-secondary action" id="doaction" name="doaction" value="Apply">
 



</div>

<br class="clear">
</div>

<div class="clear"></div>

<table cellspacing="0" class="widefat fixed">
    <thead>
    <tr>
    <th style="" class="manage-column column-cb check-column" id="cb" scope="col"><input type="checkbox"></th>
    <th style="" class="manage-column column-icon" id="icon" scope="col"></th>
    <th style="" class="manage-column column-media" id="media" scope="col">File</th>
    <th style="" class="manage-column column-author" id="author" scope="col">Password</th>
    <th style="" class="manage-column column-parent" id="parent" scope="col">Access</th>
    <th style="" class="manage-column column-parent" id="parent" scope="col">Downloads</th>
    </tr>
    </thead>

    <tfoot>
    <tr>
    <th style="" class="manage-column column-cb check-column" id="cb" scope="col"><input type="checkbox"></th>
    <th style="" class="manage-column column-icon" id="icon" scope="col"></th>
    <th style="" class="manage-column column-media" id="media" scope="col">File</th>
    <th style="" class="manage-column column-author" id="author" scope="col">Password</th>
    <th style="" class="manage-column column-parent" id="parent" scope="col">Access</th>
    <th style="" class="manage-column column-parent" id="parent" scope="col">Downloads</th>
    </tr>
    </tfoot>

    <tbody class="list:post" id="the-list">
    <?php while($media = mysql_fetch_assoc($res)) { 
        
            switch(end(explode(".",$media[file]))){
                case 'jpg':  case 'png':  case 'bmp':   case 'gif': 
                    $icon = 'img.png';
                break;
                case 'mp3':  $icon = 'mp3.png';  break;
                case 'mp4':  $icon = 'mp4.png';  break;
                case 'zip':  $icon = 'zip.png';  break;
                
                default:
                break;
                
            }
        
        ?>
    <tr valign="top" class="alternate author-self status-inherit" id="post-8">

                <th class="check-column" scope="row"><input type="checkbox" value="8" name="id[]"></th>
                <td class="column-icon media-icon">                
                    <a title="Edit" href="admin.php?page=file-manager&task=EditFile&id=<?php echo $media[id]?>">
                    <img title="<?php echo end(explode(".",$media[file]))?> file" alt="<?php echo end(explode(".",$media[file]))?> file" class="attachment-80x60" src="../wp-content/plugins/download-manager/file-type-icons/<?php echo $icon; ?>">
                    </a>
                </td>
                <td class="media column-media">
                    <strong><a title="Edit" href="admin.php?page=file-manager&task=EditFile&id=<?php echo $media[id]?>"><?php echo $media[title]?></a></strong> | Embed Code: <input style="text-align:center" type="text" onclick="this.select()" size="20" title="Simply Copy and Paste in post contents" value="{filelink=<?php echo $media[id];?>}" /><br>
                    <code>File: <?php echo $media[file]; ?></code><Br>
                    <?php echo $media['description']?>
                    <div class="row-actions"><span class="edit"><a href="admin.php?page=file-manager&task=EditFile&id=<?php echo $media[id]?>">Edit</a> | </span><span class="delete"><a href="admin.php?page=file-manager&task=DeleteFile&id=<?php echo $media[id]?>" onclick="return showNotice.warn();" class="submitdelete">Delete Permanently</a></div>
                </td>
                <td class="author column-author"><?php echo $media[password]; ?></td>
                <td class="parent column-parent"><?php echo $media[access]; ?></td>
                <td class="parent column-parent"><?php echo $media[download_count]; ?></td>
     
     </tr>
     <?php } ?>
    </tbody>
</table>

<?php
$page_links = paginate_links( array(
    'base' => add_query_arg( 'paged', '%#%' ),
    'format' => '',
    'prev_text' => __('&laquo;'),
    'next_text' => __('&raquo;'),
    'total' => ceil($row[total]/$limit),
    'current' => $_GET['paged']
));


?>

<div id="ajax-response"></div>

<div class="tablenav">

<?php if ( $page_links ) { ?>
<div class="tablenav-pages"><?php $page_links_text = sprintf( '<span class="displaying-num">' . __( 'Displaying %s&#8211;%s of %s' ) . '</span>%s',
    number_format_i18n( ( $_GET['paged'] - 1 ) * $limit + 1 ),
    number_format_i18n( min( $_GET['paged'] * $limit, $row[total] ) ),
    number_format_i18n( $row[total] ),
    $page_links
); echo $page_links_text; ?></div>
<?php } ?>

<div class="alignleft actions">
<select class="select-action" name="action2">
<option selected="selected" value="-1">Bulk Actions</option>
<option value="delete">Delete Permanently</option>
</select>
<input type="submit" class="button-secondary action" id="doaction2" name="doaction2" value="Apply">

</div>

<br class="clear">
</div>
    <div style="display: none;" class="find-box" id="find-posts">
        <div class="find-box-head" id="find-posts-head">Find Posts or Pages</div>
        <div class="find-box-inside">
            <div class="find-box-search">
                
                <input type="hidden" value="" id="affected" name="affected">
                <input type="hidden" value="3a4edcbda3" name="_ajax_nonce" id="_ajax_nonce">                <label for="find-posts-input" class="screen-reader-text">Search</label>
                <input type="text" value="" name="ps" id="find-posts-input">
                <input type="button" class="button" value="Search" onclick="findPosts.send();"><br>

                <input type="radio" value="posts" checked="checked" id="find-posts-posts" name="find-posts-what">
                <label for="find-posts-posts">Posts</label>
                <input type="radio" value="pages" id="find-posts-pages" name="find-posts-what">
                <label for="find-posts-pages">Pages</label>
            </div>
            <div id="find-posts-response"></div>
        </div>
        <div class="find-box-buttons">
            <input type="button" value="Close" onclick="findPosts.close();" class="button alignleft">
            <input type="submit" value="Select" class="button-primary alignright" id="find-posts-submit">
        </div>
    </div>
</form>
<br class="clear">

</div>

 