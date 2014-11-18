
 <style>
 .frm td{
     padding:5px;
     border-bottom: 1px solid #eeeeee;
    
     font-size:10pt;
     
 }
 h4{
     color: #336699;
     margin-bottom: 0px;
 }
 em{
     color: #888;
 }
 </style>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">



                <div class="panel panel-default">
                    <div class="panel-heading"><?php echo __('Messages','wpdmpro'); ?></div>
                    <div class="panel-body">


                        <div class="form-group">
                            <label><?php echo __('Permission Denied Message for Packages:','wpdmpro'); ?></label>
                                <input type=text class="form-control" name="wpdm_permission_msg" value="<?php echo htmlspecialchars(stripslashes(get_option('wpdm_permission_msg','Access Denied'))); ?>" />
                         </div>





                 <div class="form-group">
                            <label><?php echo __('Login Required Message <em>( use short-code [loginform] inside message box to integrate login form )</em>:','wpdmpro'); ?></label>
                     <textarea class="form-control" cols="70" rows="6" name="wpdm_login_msg"><?php echo get_option('wpdm_login_msg')?stripslashes(get_option('wpdm_login_msg')):"<a href='".get_option('siteurl')."/wp-login.php'  style=\"background:url('".get_option('siteurl')."/wp-content/plugins/download-manager/images/lock.png') no-repeat;padding:3px 12px 12px 28px;font:bold 10pt verdana;\">Please login to access downloadables</a>"; ?></textarea><br>
                     <input  type="checkbox" name="__wpdm_login_form" value="1" <?php echo get_option('__wpdm_login_form',0)==1?'checked=checked':'';?> > <?php echo __('Show Only Login Button Instead of Login Required Message','wpdmpro'); ?>

                 </div>

                        <div class="form-group">
                            <label><?php echo __('Server File Browser Base Dir:','wpdmpro'); ?></label>
                            <input type=text class="form-control" name="_wpdm_file_browser_root" value="<?php echo htmlspecialchars(stripslashes(get_option('_wpdm_file_browser_root',ABSPATH))); ?>" />
                        </div>

                    </div>
                </div>


                <div class="panel panel-default">
                    <div class="panel-heading">Misc Settings</div>
                    <div class="panel-body">

                        <table cellpadding="5" cellspacing="0" class="frm" width="100%">

                            <tr>
                                <td>
                                    Twitter Bootstrap</td><td>
                                    <select name="__wpdm_twitter_bootstrap">
                                        <option value="active">Active</option>
                                        <option value="djs">Disable JS</option>
                                        <option value="dcss">Disable CSS</option>
                                        <option value="dall">Disable Both</option>
                                    </select>

                                </td>
                            </tr>

                            <?php do_action('basic_settings'); ?>

                        </table>

                    </div>
                    <div class="panel-footer">

                    </div>
                </div>



            </div>
        </div>
    </div>



