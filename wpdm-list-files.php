<?php
if(!defined('ABSPATH')) die('Direct Access is not Allowed!'); 
global $wpdb;
$limit = 10;

$cond = '';
$s = isset($_GET['s'])?explode(" ",$_GET['s']):array();
foreach($s as $p){
    $cond[] = "title like '%".mysql_escape_string($p)."%'";
    
}
if(isset($_GET['s'])) $cond = "where ".implode(" or ", $cond);
 
$start = isset($_GET['paged'])?(($_GET['paged']-1)*$limit):0;
$res = $wpdb->get_results("select * from ahm_files $cond order by id desc limit $start, $limit",ARRAY_A);
 
$row = $wpdb->get_row("select count(*) as total from ahm_files $cond",ARRAY_A);

?>
 

<div class="wrap">
    <div class="icon32" id="icon-upload"><br></div>
    
<h2>Manage Files 
<a class="button button-secondary add-new-h2" href="admin.php?page=file-manager/add-new-file">Add New</a> 
<a class="button button-secondary  add-new-h2" href="admin.php?page=file-manager&task=wpdm_import_download_monitor">Import from Download Monitor</a>
<a class="button  add-new-h2" style="font-weight: bold" href="http://wordpress.org/support/view/plugin-reviews/download-manager">A 5&#9733; rating will inspire me a lot :)</a>
<br />
 
</h2>
    <div style="border-radius: 3px;border: 2px solid #1E8CBE" class="updated">
        <p>
            <em><b>Download Manager Pro!</b><br>Social Locks/Share, Build a Shop or Even a Marketplace, Multi-Level Marketing Add-on to Boost Sales and many more... </em>

            <a target="_blank" href="http://www.wpdownloadmanager.com/?affid=admin&domain=<?php echo $_SERVER['HTTP_HOST']; ?>" class="button button-primary button-hero" style="float:right;margin-top: -23px;margin-right: -6px;border: 0 none;border-radius: 2px;box-shadow: none;">Checkout The Features Here →</a>
        </p>
    </div>

<?php if(get_option('hide_wpdm270n',0)==0){ ?>
    <div style="border-radius: 3px;border: 2px solid #D54E21;padding:12px" class="updated" id="wpdm270n">
        <em><b>WordPress Download Manager 2.7</b><a href="#" style="float: right;font-size: 16pt;color: #880000" onclick="return _close_notice('#wpdm270n')">&times;</a><br/>
    Custom Post Type version is available now, you can download <strong><a href="http://www.wpdownloadmanager.com/download/wordpress-download-manager-v2-7-0/">WPDM v2.7.0 here</a></strong>. This new version will be available at wp.org soon.
    </em>
</div>
 
 <script>
     function _close_notice(id){
        jQuery(id).fadeOut();
        jQuery.post('admin-ajax.php?action=hide_wpdm270n');
     }
 </script>
<?php } ?>
<div style="position: absolute;right:10px;margin-top: 5px;">
<form action="" method="get">
 <input type="hidden" name="page" value="file-manager" />
 <input type="text" name="s" id="s" value="<?php echo isset($_GET['s'])?$_GET['s']:''; ?>" />
 <input type="submit" class="button-primary action" id="doaction" name="doaction" value="Search">
 </form>
</div>
           
<form method="get" action="" id="posts-filter">
<div class="tablenav">

<div class="alignleft actions">
<select class="select-action" name="task">
<option selected="selected" value="-1">Bulk Actions</option>
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
    <th style="" class="manage-column column-parent" id="parent" scope="col">Counter</th>
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
    <th style="" class="manage-column column-parent" id="parent" scope="col">Counter</th>
    <th style="" class="manage-column column-parent" id="parent" scope="col">Downloads</th>
    </tr>
    </tfoot>

    <tbody class="list:post" id="the-list">
    <?php foreach($res as $media) { 
            $tmp = explode(".",$media['file']);
            switch(end($tmp)){
                case 'jpg':  case 'png':  case 'bmp':   case 'gif': 
                    $icon = 'img.png';
                break;
                case 'mp3':  $icon = 'mp3.png';  break;
                case 'mp4':  $icon = 'mp4.png';  break;
                case 'zip':  $icon = 'zip.png';  break;
                
                default:
                $icon = end($tmp).'.png';
                break;
                
                
            }
            if(!file_exists(dirname(__FILE__).'/file-type-icons/'.$icon)) $icon = "file.png";
        
        ?>
    <tr valign="top" class="alternate author-self status-inherit" id="post-8">

                <th class="check-column" scope="row"><input type="checkbox" value="<?php echo $media['id']?>" name="id[]"></th>
                <td class="column-icon media-icon">                
                    <a title="Edit" href="admin.php?page=file-manager&task=EditFile&id=<?php echo $media['id']?>">
                    <img title="<?php echo end(explode(".",$media['file']))?> file" alt="<?php echo end(explode(".",$media['file']))?> file" class="attachment-80x60" src="../wp-content/plugins/download-manager/file-type-icons/<?php echo $icon; ?>">
                    </a>
                </td>
                <td class="media column-media">
                    <strong><a title="Edit" href="admin.php?page=file-manager&task=wpdm_edit_file&id=<?php echo $media['id']?>"><?php echo stripslashes($media['title'])?></a></strong> <input style="text-align:center" type="text" onclick="this.select()" size="20" title="Simply Copy and Paste in post contents" value="[wpdm_file id=<?php echo $media['id'];?>]" /><br>
                    <code>File: <?php echo $media['file']; ?></code><Br>
                     
                    <div class="row-actions"><div class="button-group"><a class="button" href="admin.php?page=file-manager&task=wpdm_edit_file&id=<?php echo $media['id']?>">Edit</a><a href="admin.php?page=file-manager&task=DeleteFile&id=<?php echo $media['id']?>" onclick="return showNotice.warn();" class="button submitdelete" style="color: #aa0000;">Delete Permanently</a></div></div>
                </td>
                <td class="author column-author"><?php echo $media['password']; ?></td>
                <td class="parent column-parent"><?php echo $media['access']; ?></td>
                <td class="parent column-parent"><?php echo $media['show_counter']!=0?'Show':'Hide'; ?></td>
                <td class="parent column-parent"><?php echo $media['download_count']; ?></td>
     
     </tr>
     <?php } ?>
    </tbody>
</table>

<?php
$paged = isset($_GET['paged']) ?$_GET['paged'] :1;

$page_links = paginate_links( array(
    'base' => add_query_arg( 'paged', '%#%' ),
    'format' => '',
    'prev_text' => __('&laquo;'),
    'next_text' => __('&raquo;'),
    'total' => ceil($row['total']/$limit),
    'current' => $paged
));


?>

<div id="ajax-response"></div>

<div class="tablenav">

<?php 
if ( $page_links ) { 
                
    ?>
<div class="tablenav-pages"><?php $page_links_text = sprintf( '<span class="displaying-num">' . __( 'Displaying %s&#8211;%s of %s' ) . '</span>%s',
    number_format_i18n( ( $paged - 1 ) * $limit + 1 ),
    number_format_i18n( min( $paged * $limit, $row['total'] ) ),
    number_format_i18n( $row['total'] ),
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
   
</form>
<br class="clear">

</div>

 