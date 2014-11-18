<script type="text/javascript">
jQuery(document).ready(function() {          
    jQuery("#wpdm-files tbody").sortable();
    jQuery("#adpcon").sortable({placeholder: "adp-ui-state-highlight"});
     
});
</script>
            
<style>
#wpdm-files_length{
    display: none;
}
#wpdm-files_filter{
    margin-bottom:10px !important;
}
.adp-ui-state-highlight{
    width:50px;
    height:50px;
    background: #fff;
    float:left;
    padding: 4px;
    border:1px solid #aaa;
} 
#wpdm-files tbody .ui-sortable-helper{
    width:100%;
    background: #444444;
    
}
#wpdm-files tbody .ui-sortable-helper td{
    color: #fff;
    vertical-align: middle; 
}
input{
   padding: 4px 7px;
}
 
.dfile{background: #ffdfdf;} 
.cfile{
    cursor: move;
}
.cfile img, .dfile img{cursor: pointer;}
.inside{padding:10px !important;}
#editorcontainer textarea{border:0px;width:99.9%;}
#icon_uploadUploader,#file_uploadUploader {background: transparent url('<?php echo plugins_url(); ?>/download-manager/images/browse.png') left top no-repeat; }
#icon_uploadUploader:hover,#file_uploadUploader:hover {background-position: left bottom; }
.frm td{line-height: 30px; border-bottom: 1px solid #EEEEEE; padding:5px; font-size:9pt;font-family: Tahoma;}
.fwpdmlock{
    background: #fff;
    border-bottom: 1px solid #eee;
}
.fwpdmlock td{
    border:0px !important;
} 
#filelist {
    margin-top: 10px;
}
#filelist .file{
    margin-top: 5px;
    padding: 0px 10px;   
    color:#444;
    display: block;
    margin-bottom: 5px;
    font-weight: normal;
}

table.widefat{
    border-bottom:0px;
}

.genpass{
    cursor: pointer;
}
 
h3,
h3.handle{
    cursor: default !important;
}


@-webkit-keyframes progress-bar-stripes {
  from {
    background-position: 40px 0;
  }
  to {
    background-position: 0 0;
  }
}

@-moz-keyframes progress-bar-stripes {
  from {
    background-position: 40px 0;
  }
  to {
    background-position: 0 0;
  }
}

@-ms-keyframes progress-bar-stripes {
  from {
    background-position: 40px 0;
  }
  to {
    background-position: 0 0;
  }
}

@-o-keyframes progress-bar-stripes {
  from {
    background-position: 0 0;
  }
  to {
    background-position: 40px 0;
  }
}

@keyframes progress-bar-stripes {
  from {
    background-position: 40px 0;
  }
  to {
    background-position: 0 0;
  }
}

.progress {
  height: 15px;
  margin-bottom: 10px;
  overflow: hidden;
  background-color: #f7f7f7;
  background-image: -moz-linear-gradient(top, #f5f5f5, #f9f9f9);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#f5f5f5), to(#f9f9f9));
  background-image: -webkit-linear-gradient(top, #f5f5f5, #f9f9f9);
  background-image: -o-linear-gradient(top, #f5f5f5, #f9f9f9);
  background-image: linear-gradient(to bottom, #f5f5f5, #f9f9f9);
  background-repeat: repeat-x;
  -webkit-border-radius: 4px;
     -moz-border-radius: 4px;
          border-radius: 4px;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#fff5f5f5', endColorstr='#fff9f9f9', GradientType=0);
  -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
     -moz-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
          box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
}

.progress .bar {
  float: left;
  width: 0;
  height: 100%;
  font-size: 12px;
  color: #ffffff;
  text-align: center;
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
  background-color: #0e90d2;
  background-image: -moz-linear-gradient(top, #149bdf, #0480be);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#149bdf), to(#0480be));
  background-image: -webkit-linear-gradient(top, #149bdf, #0480be);
  background-image: -o-linear-gradient(top, #149bdf, #0480be);
  background-image: linear-gradient(to bottom, #149bdf, #0480be);
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff149bdf', endColorstr='#ff0480be', GradientType=0);
  -webkit-box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.15);
     -moz-box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.15);
          box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.15);
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  -webkit-transition: width 0.6s ease;
     -moz-transition: width 0.6s ease;
       -o-transition: width 0.6s ease;
          transition: width 0.6s ease;
}

.progress .bar + .bar {
  -webkit-box-shadow: inset 1px 0 0 rgba(0, 0, 0, 0.15), inset 0 -1px 0 rgba(0, 0, 0, 0.15);
     -moz-box-shadow: inset 1px 0 0 rgba(0, 0, 0, 0.15), inset 0 -1px 0 rgba(0, 0, 0, 0.15);
          box-shadow: inset 1px 0 0 rgba(0, 0, 0, 0.15), inset 0 -1px 0 rgba(0, 0, 0, 0.15);
}

.progress-striped .bar {
  background-color: #149bdf;
  background-image: -webkit-gradient(linear, 0 100%, 100% 0, color-stop(0.25, rgba(255, 255, 255, 0.15)), color-stop(0.25, transparent), color-stop(0.5, transparent), color-stop(0.5, rgba(255, 255, 255, 0.15)), color-stop(0.75, rgba(255, 255, 255, 0.15)), color-stop(0.75, transparent), to(transparent));
  background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: -moz-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  -webkit-background-size: 40px 40px;
     -moz-background-size: 40px 40px;
       -o-background-size: 40px 40px;
          background-size: 40px 40px;
}

.progress.active .bar {
  -webkit-animation: progress-bar-stripes 2s linear infinite;
     -moz-animation: progress-bar-stripes 2s linear infinite;
      -ms-animation: progress-bar-stripes 2s linear infinite;
       -o-animation: progress-bar-stripes 2s linear infinite;
          animation: progress-bar-stripes 2s linear infinite;
}

.progress-danger .bar,
.progress .bar-danger {
  background-color: #dd514c;
  background-image: -moz-linear-gradient(top, #ee5f5b, #c43c35);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ee5f5b), to(#c43c35));
  background-image: -webkit-linear-gradient(top, #ee5f5b, #c43c35);
  background-image: -o-linear-gradient(top, #ee5f5b, #c43c35);
  background-image: linear-gradient(to bottom, #ee5f5b, #c43c35);
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffee5f5b', endColorstr='#ffc43c35', GradientType=0);
}

.progress-danger.progress-striped .bar,
.progress-striped .bar-danger {
  background-color: #ee5f5b;
  background-image: -webkit-gradient(linear, 0 100%, 100% 0, color-stop(0.25, rgba(255, 255, 255, 0.15)), color-stop(0.25, transparent), color-stop(0.5, transparent), color-stop(0.5, rgba(255, 255, 255, 0.15)), color-stop(0.75, rgba(255, 255, 255, 0.15)), color-stop(0.75, transparent), to(transparent));
  background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: -moz-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
}

.progress-success .bar,
.progress .bar-success {
  background-color: #5eb95e;
  background-image: -moz-linear-gradient(top, #62c462, #57a957);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#62c462), to(#57a957));
  background-image: -webkit-linear-gradient(top, #62c462, #57a957);
  background-image: -o-linear-gradient(top, #62c462, #57a957);
  background-image: linear-gradient(to bottom, #62c462, #57a957);
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff62c462', endColorstr='#ff57a957', GradientType=0);
}

.progress-success.progress-striped .bar,
.progress-striped .bar-success {
  background-color: #62c462;
  background-image: -webkit-gradient(linear, 0 100%, 100% 0, color-stop(0.25, rgba(255, 255, 255, 0.15)), color-stop(0.25, transparent), color-stop(0.5, transparent), color-stop(0.5, rgba(255, 255, 255, 0.15)), color-stop(0.75, rgba(255, 255, 255, 0.15)), color-stop(0.75, transparent), to(transparent));
  background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: -moz-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
}

.progress-info .bar,
.progress .bar-info {
  background-color: #4bb1cf;
  background-image: -moz-linear-gradient(top, #5bc0de, #339bb9);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#5bc0de), to(#339bb9));
  background-image: -webkit-linear-gradient(top, #5bc0de, #339bb9);
  background-image: -o-linear-gradient(top, #5bc0de, #339bb9);
  background-image: linear-gradient(to bottom, #5bc0de, #339bb9);
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff5bc0de', endColorstr='#ff339bb9', GradientType=0);
}

.progress-info.progress-striped .bar,
.progress-striped .bar-info {
  background-color: #5bc0de;
  background-image: -webkit-gradient(linear, 0 100%, 100% 0, color-stop(0.25, rgba(255, 255, 255, 0.15)), color-stop(0.25, transparent), color-stop(0.5, transparent), color-stop(0.5, rgba(255, 255, 255, 0.15)), color-stop(0.75, rgba(255, 255, 255, 0.15)), color-stop(0.75, transparent), to(transparent));
  background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: -moz-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
}

.progress-warning .bar,
.progress .bar-warning {
  background-color: #faa732;
  background-image: -moz-linear-gradient(top, #fbb450, #f89406);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#fbb450), to(#f89406));
  background-image: -webkit-linear-gradient(top, #fbb450, #f89406);
  background-image: -o-linear-gradient(top, #fbb450, #f89406);
  background-image: linear-gradient(to bottom, #fbb450, #f89406);
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#fffbb450', endColorstr='#fff89406', GradientType=0);
}

.progress-warning.progress-striped .bar,
.progress-striped .bar-warning {
  background-color: #fbb450;
  background-image: -webkit-gradient(linear, 0 100%, 100% 0, color-stop(0.25, rgba(255, 255, 255, 0.15)), color-stop(0.25, transparent), color-stop(0.5, transparent), color-stop(0.5, rgba(255, 255, 255, 0.15)), color-stop(0.75, rgba(255, 255, 255, 0.15)), color-stop(0.75, transparent), to(transparent));
  background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: -moz-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
}
#access{
    width: 250px;
}

#nxt{
  background-color: #C1F4C1;
  background-image: -webkit-gradient(linear, 0 100%, 100% 0, color-stop(0.25, rgba(255, 255, 255, 0.15)), color-stop(0.25, transparent), color-stop(0.5, transparent), color-stop(0.5, rgba(255, 255, 255, 0.15)), color-stop(0.75, rgba(255, 255, 255, 0.15)), color-stop(0.75, transparent), to(transparent));
  background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: -moz-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  -webkit-background-size: 40px 40px;
     -moz-background-size: 40px 40px;
       -o-background-size: 40px 40px;
          background-size: 40px 40px;
  display: none;
  border-bottom:1px solid #008000;   
  color: #0C490C;font-family:'Courier New';padding:5px 10px;text-align: center;
}

#serr{
    display: none;margin-top: 5px;border:1px solid #800000;background: #FFEDED;color: #000;font-family:'Courier New';padding:5px 10px;text-align: left;
}
.action #nxt{
  width:100%;
  position: fixed;  
  top:0px;left:0px;z-index:999999;  
}
#nxt a{
    font-weight: bold;
    color:#0C490C;
}
 
.action-float{
    position:fixed;top:-33px;left:0px;width:100%;z-index:999999;text-align:right;
    background: rgba(0,0,0,0.9);   
}

.action .inside,
.action-float .inside{
    margin: 0px;
}

.action-float #serr{
   width:500px;   
   float: left;
   margin: 4px;
   z-index:999999; 
   margin-top:-50px;
   border:1px solid #800000;    
}
.action-float #nxt{
   width:500px;   
   float: left;
   margin: 4px;
   z-index:999999; 
   margin-top:-40px;
   border:1px solid #008000;   
}

.wpdm-accordion > div{
    padding:10px;
}

.wpdmlock {
  opacity:0;  
}
.wpdmlock+label {
   
    width:16px;
    height:16px;
    vertical-align:middle;
}

.wpdm-unchecked{
    display: inline-block;
    float: left;
    width: 21px;
    height: 21px;
    padding: 0px;
    margin: 0px;
    cursor: hand;
    padding: 3px;
    margin-top: -4px !important;
    background-image: url('<?php echo plugins_url('/download-manager/images/CheckBox.png'); ?>');
    background-position: -21px 0px;
}
.wpdm-checked{
    display: inline-block;
    float: left;
    width: 21px;
    height: 21px;
    padding: 0px;
    margin: 0px;
    cursor: hand;
    padding: 3px;
    margin-top: -4px !important;
    background-image: url('<?php echo plugins_url('/download-manager/images/CheckBox.png'); ?>');
    background-position: 0px 0px;
}
.cb-enable, .cb-disable, .cb-enable span, .cb-disable span { background: url(<?php echo plugins_url('/download-manager/images/switch.gif'); ?>) repeat-x; display: block; float: left; }
    .cb-enable span, .cb-disable span { line-height: 30px; display: block; background-repeat: no-repeat; font-weight: bold; }
    .cb-enable span { background-position: left -90px; padding: 0 10px; }
    .cb-disable span { background-position: right -180px;padding: 0 10px; }
    .cb-disable.selected { background-position: 0 -30px; }
    .cb-disable.selected span { background-position: right -210px; color: #fff; }
    .cb-enable.selected { background-position: 0 -60px; }
    .cb-enable.selected span { background-position: left -150px; color: #fff; }
    .switch label { cursor: pointer; }
    .switch input { display: none; }
p.field.switch{
    margin:0px;display:block;float:left;
}    
</style>     
<link rel="stylesheet" href="<?php echo plugins_url('/download-manager/css/aristo.css'); ?>" />
<link rel="stylesheet" href="<?php echo plugins_url('/download-manager/css/chosen.css'); ?>" />
<link rel="stylesheet" href="<?php echo plugins_url('/download-manager/css/demo_table.css'); ?>" /> 
<script language="JavaScript" src="<?php echo plugins_url('/download-manager/js/chosen.jquery.min.js'); ?>"></script> 
<script language="JavaScript" src="<?php echo plugins_url('/download-manager/js/jquery.dataTables.min.js'); ?>"></script> 
<!--<script language="JavaScript" src="https://raw.github.com/isocra/TableDnD/master/js/jquery.tablednd.js"></script> -->
<script type="text/javascript">
function filelist_dt(){
    jQuery("#wpdm-files").dataTable({
    "iDisplayLength": -1, 
    "aLengthMenu": [[-1], ["All"]],   
    "aoColumns": [
      { "bSortable": false },
      null,
      null,
      { "bSortable": false }
      
    ] });
}
jQuery(document).ready(function() {          
     filelist_dt();
});
</script>
<div class="wrap metabox-holder has-right-sidebar">
<?php if($_GET['task']=='EditPackage'){ ?>
    <div class="icon32" id="icon-add-new-file"><br></div>
<h2><?php echo __('Edit Download Package','wpdmpro'); ?> <input id="vp" style="display: none;" type="button" class="button-secondary" value="<?php echo __('View Package','wpdmpro'); ?>"></h2>
<?php } else { ?>
    <div class="icon32" id="icon-add-new-file"><br></div>
<h2><?php echo __('Add New Download Package','wpdmpro'); ?></h2>

<?php }?>
<form id="wpdm-pf" action="" method="post">
 
<input type="hidden" id="act" name="act" value="<?php echo $_GET['task']=='EditPackage'?'_ep_wpdm':'_ap_wpdm'; ?>" />

<input type="hidden" id="id" name="id" value="<?php echo $_GET['id']; ?>" />
<div  style="width: 75%;float:left;">
    
<table cellpadding="5" cellspacing="5" width="100%">
<tr>
 
<td>
 
<input id="title" onchange="jQuery('#terr').remove();" style="font-size:16pt;width:100%;" <?php if($_GET['task']!='EditPackage'): ?>onkeyup="jQuery('#urlkey').val(this.value.replace(/[\s|\#|\.]+/g,'-').toLowerCase());jQuery('#urlkey_v').html(jQuery('#urlkey').val())"<?php endif; ?> placeholder="Enter title here" type="text" value="<?php echo htmlspecialchars(stripcslashes($file['title'])); ?>" name="file[title]" /><br/>
<div style="float: left;font-style:italic;line-height: 25px">Custom package url: <?php if(get_option('permalink_structure')!=''){ ?><span style="cursor: pointer" onclick="jQuery('#ked').show();jQuery('#urlkey_v').hide();"><?php echo home_url('/'.get_option('__wpdm_purl_base','download').'/'); ;?></span><span id="urlkey_v" style="color: #0000dd;cursor: pointer" onclick="jQuery('#ked').show();jQuery(this).hide();"><?php echo urldecode(get_wpdm_meta($file[id],'url_key')); ?></span><?php } else { ?><a target="_blank" href='<?php echo admin_url('options-permalink.php'); ?>'><?php echo __('Enable permalink structure','wpdmpro'); ?></a><?php } ?></div>
<div id='ked' style="float: left;display: none"><input style="padding-left: 0px;font-style:italic;" type="text" name="url_key" size="60" value="<?php echo get_wpdm_meta($file[id],'url_key'); ?>" id="urlkey" ><input type="button" class="button-secondary" value="Ok" onclick="jQuery('#ked').hide();jQuery('#urlkey_v').html(jQuery('#urlkey').val()).show(); if(jQuery('#urlkey').val()=='') {jQuery('#urlkey').val(jQuery('#title').val().replace(/[\s|\#|\.]+/g,'-').toLowerCase()); jQuery('#urlkey_v').html(jQuery('#urlkey').val());}"></div>
<?php if(get_option('permalink_structure')!=''){ ?><a base="<?php echo home_url('/'.get_option('__wpdm_purl_base','download').'/');  ?>" href="<?php echo home_url('/'.get_option('__wpdm_purl_base','download').'/'.get_wpdm_meta($file['id'],'url_key'));  ?>/" target="_blank" class="button" id="wview" style="font-weight:200;margin-left: 15px;margin-top: 5px;font-style: italic;"> View Package</a><?php } ?>
</td>
</tr>

<tr>
<td valign="top"> 
<div id="poststuff" class="postarea">
<?php wp_editor(stripslashes($file['description']),'file[description]','title', true, true); ?>
</div>
 
</td>
</tr>

<tr>
<td>
<div class="postbox">
<h3 class="hndle"><span><?php echo __("Attached Files","wpdmpro"); ?></span></h3>
<div class="inside">

<table width="100%">
<tr>
<td width="80%" valign="top"><div id="currentfiles">

<?php

$files = unserialize( $file['files']  );

if( empty($files)  ) $files = array();
 
?>

<table class="widefat" id="wpdm-files">
<thead>
<tr>
<th style="width: 50px;background: transparent;"><?php echo __("Action","wpdmpro"); ?></th>
<th style="width: 40%;"><?php echo __("Filename","wpdmpro"); ?></th>
<th style="width: 40%;"><?php echo __("Title","wpdmpro"); ?></th>
<th style="width: 130px;background: transparent;"><?php echo __("Password","wpdmpro"); ?></th>
</tr>
</thead>
<?php $fileinfo = get_wpdm_meta($file['id'],'fileinfo'); if(!$fileinfo) $fileinfo = array(); foreach($files as $value): ++$file_index; if(!@is_array($fileinfo[$value])) $fileinfo[$value] = array();  ?>
<tr class="cfile">
<td style="width: 50px;">
<input class="fa" type="hidden" value="<?php echo $value; ?>" name="files[]">
<img align="left" rel="del" src="<?php echo plugins_url('download-manager/images/minus.png'); ?>">
</td>
<td style="width: 40%;"><?php echo $value; ?></td>
<td style="width: 40%;"><textarea style="width:99%;height:25px;max-width:99%;min-width:99%;max-height:25px;min-height:25px" name='wpdm_meta[fileinfo][<?php echo $value; ?>][title]'><?php echo $fileinfo[$value]['title'];?></textarea></td>
<td style="width: 130px;"><input size="10" type="text" id="indpass_<?php echo $file_index;?>" name='wpdm_meta[fileinfo][<?php echo $value; ?>][password]' value="<?php echo $fileinfo[$value]['password'];?>"> <img style="cursor: pointer;float: right;margin-top: -3px" class="genpass"  title='Generate Password' onclick="return generatepass('indpass_<?php echo $file_index;?>')" src="<?php echo plugins_url('download-manager/images/generate-pass.png'); ?>" alt="" /></td>
</tr>
<?php
endforeach;
?>
</table>


<?php if($files):  ?>
<script type="text/javascript">


jQuery('img[rel=del], img[rel=undo]').click(function(){

     if(jQuery(this).attr('rel')=='del')
     {
     
     jQuery(this).parents('tr.cfile').removeClass('cfile').addClass('dfile').find('input.fa').attr('name','del[]');
     jQuery(this).attr('rel','undo').attr('src','<?php echo plugins_url(); ?>/download-manager/images/add.png').attr('title','Undo Delete');
     
     } else {
     
     
            jQuery(this).parents('tr.dfile').removeClass('dfile').addClass('cfile').find('input.fa').attr('name','files[]');
            jQuery(this).attr('rel','del').attr('src','<?php echo plugins_url(); ?>/download-manager/images/minus.png').attr('title','Delete File');

     
     
     }



});


</script>


<?php endif; ?>



</div></td>
 
</tr>
</table>

</div>
</div>

</td>
</tr>

 
<tr>
<td> &nbsp;<br/>
 
<div  style="width: 48%;float: left;"> 
<div class="postbox " id="file_settings">
<div title="Click to toggle" class="handlediv"><br></div><h3 class="hndle"><span><?php echo __('Package Settings','wpdmpro'); ?></span></h3>
<div class="inside">
<table cellpadding="5" id="file_settings_table" cellspacing="0" width="100%" class="frm">
<tr id="link_label_row">    
<td width="90px"><?php echo __('Link Label:','wpdmpro'); ?></td>
<td><input size="10" type="text" style="width: 200px" value="<?php echo $file[link_label]?$file[link_label]:'Download'; ?>" name="file[link_label]" />
</td></tr>

<tr id="downliad_limit_row">
<td><?php echo __('Stock&nbsp;Limit:','wpdmpro'); ?></td>  
<td><input size="10" style="width: 80px" type="text" name="file[quota]" value="<?php echo $file[quota]; ?>" /></td>
</tr>
 
<tr id="downliad_limit_row">
<td><?php echo __('Download&nbsp;Limit:','wpdmpro'); ?></td>  
<td><input size="10" style="width: 80px" type="text" name="wpdm_download_limit_per_user" value="<?php echo get_wpdm_meta($file['id'],'wpdm_download_limit_per_user'); ?>" /> / user <span class="info infoicon" title="For non-registered members IP will be taken as ID">&nbsp;</span></td>
</tr>
<tr id="download_count_row">
<td><?php echo __('Download&nbsp;Count:','wpdmpro'); ?></td>  
<td><input size="10" style="width: 80px" type="text" name="file[download_count]" value="<?php echo $file['download_count']; ?>" /> <span class="info infoicon" title="Set/Reset Download Count for this package">&nbsp;</span></td>
</tr>
 
<tr id="access_row">
<td valign="top"><?php echo __('Allow Access:','wpdmpro'); ?></td>
<td>   
    <select name="file[access][]" class="chzn-select role" multiple="multiple" id="access">
	<?php
	
	$currentAccess = unserialize( $file['access'] );
	if(  $currentAccess ) $selz = (in_array('guest',$currentAccess))?'selected=selected':'';
    if(!intval($_GET['id'])) $selz = 'selected=selected';
	?>
	
    <option value="guest" <?php echo $selz  ?>> All Visitors</option>
    <?php
    global $wp_roles;
    $roles = array_reverse($wp_roles->role_names);
    foreach( $roles as $role => $name ) { 
	
	
	
	if(  $currentAccess ) $sel = (in_array($role,$currentAccess))?'selected=selected':'';
	
	
	
	?>
    <option value="<?php echo $role; ?>" <?php echo $sel  ?>> <?php echo $name; ?></option>
    <?php } ?>
    </select>
</td></tr>
 
<tr id="templates_row">
<td><?php echo __('Individual File:','wpdmpro'); ?></td>  
<td>
<p class="field switch">
        <label class="cb-enable <?php echo get_wpdm_meta($_GET['id'],'individual_download')==1?'selected':''; ?>"><span>Enable</span></label>
        <label class="cb-disable <?php echo !get_wpdm_meta($_GET['id'],'individual_download')?'selected':''; ?>"><span>Disable</span></label>         
        <input class="checkbox" id="eid" <?php echo get_wpdm_meta($_GET['id'],'individual_download')==1?'checked=checked':''; ?> type="checkbox" name="wpdm_individual_download" value="1">  
</p>
<label for="eid" style="line-height: 30px;float:left;margin-left:5px;"><?php echo __('Individual File Download','wpdmpro'); ?></label>
</td>
</tr>

<tr id="templates_row">
<td><?php echo __('Link Template:','wpdmpro'); ?></td>
<td><?php

 

?>
<select name="file[template]" id="lnk_tpl" onchange="jQuery('#lerr').remove();"> 
<?php
$ctpls = scandir(WPDM_BASE_DIR.'/templates/');
                  array_shift($ctpls);
                  array_shift($ctpls);
                  $ptpls = $ctpls;
                  foreach($ctpls as $ctpl){
                      $tmpdata = file_get_contents(WPDM_BASE_DIR.'/templates/'.$ctpl);
                      if(preg_match("/WPDM[\s]+Link[\s]+Template[\s]*:([^\-\->]+)/",$tmpdata, $matches)){                                 
    
?>
<option value="<?php echo $ctpl; ?>"  <?php echo $file['template']==$ctpl?'selected=selected':''; ?>><?php echo $matches[1]; ?></option>
<?php    
}  
} 
if($templates = unserialize(get_option("_fm_link_templates",true))){ 
  foreach($templates as $id=>$template) {  
?>
<option value="<?php echo $id; ?>"  <?php echo ( $file['template']==$id )?' selected ':'';  ?>><?php echo $template['title']; ?></option>
<?php } } ?>
</select> 
</td>
</tr>


<tr id="templates_row">
<td><?php echo __('Page Template:','wpdmpro'); ?></td>
<td><?php
  
//print_r(  unserialize(get_option("_fm_link_templates",true)) );
?>
<select name="file[page_template]" id="pge_tpl" onchange="jQuery('#perr').remove();"> 
<?php
                   
                  
                      foreach($ptpls as $ctpl){
                      $tmpdata = file_get_contents(WPDM_BASE_DIR.'/templates/'.$ctpl);
                      if(preg_match("/WPDM[\s]+Template[\s]*:([^\-\->]+)/",$tmpdata, $matches)){       
    
?>
<option value="<?php echo $ctpl; ?>"  <?php echo $file['page_template']==$ctpl?'selected=selected':''; ?>><?php echo $matches[1]; ?></option>
<?php    
}  
} 

if($templates = unserialize(get_option("_fm_page_templates",true))){ 
  foreach($templates as $id=>$template) {  
?>
<option value="<?php echo $id; ?>"  <?php echo ( $file['page_template']==$id )?' selected=selected ':'';  ?>><?php echo $template['title']; ?></option>
<?php } } ?>
</select>
 </td>
</tr><?php if($_GET['id']!=''){ ?>
<tr>
<td><?php echo __('Reset Key','wpdmpro'); ?></td>
<td><input type="checkbox" value="1" name="reset_key" /> <?php echo __('Regenerate Master Key for Download','wpdmpro'); ?> <span class="info infoicon" title="<?php echo __('This key can be used for direct download','wpdmpro'); ?>"> </span></td>
</tr>
<?php } ?>
</table>
<div class="clear"></div>
</div>
</div>


<div class="postbox " id="wpdm-lock-setting">
<div title="Click to toggle" class="handlediv"><br></div><h3 class="hndle"><span><?php echo __('Package Lock Settings','wpdmpro'); ?> </span> <span class="info infoicon" title="<?php echo __('This section will allow you to lock your download link using password, facebook like or google +1','wpdmpro'); ?>">&nbsp;</span></h3>
<div class="inside">
<?php echo __('You can use one or more of following methods to lock your package download:','wpdmpro'); ?>
<br/>   
<br/>   
<div class="wpdm-accordion" style="border: 1px solid #ccc;padding-bottom:1px">
 
<h3><input type="checkbox" class="wpdmlock" rel='password' name="wpdm_meta[password_lock]" <?php if(get_wpdm_meta($file['id'],'password_lock')=='1') echo "checked=checked"; ?> value="1"><?php echo __('Enable Password Lock','wpdmpro'); ?></h3>
<div  id="password" class="fwpdmlock" <?php if(get_wpdm_meta($file['id'],'password_lock')!='1') echo "style='display:none'"; ?> >
<table width="100%"  cellpadding="0" cellspacing="0">
<tr id="password_row">
<td><?php echo __('Password:','wpdmpro'); ?></td>  
<td><input size="10" style="width: 200px" type="text" name="file[password]" id="pps_z" value="<?php echo $file[password]; ?>" /><span class="info infoicon" title="You can use single or multiple password<br/>for a package. If you are using multiple password then<br/>separate each password by []. example [password1][password2]">&nbsp;</span> <img style="float: right;margin-top: -3px" class="genpass"  title='Generate Password' onclick="return generatepass('pps_z')" src="<?php echo plugins_url('download-manager/images/generate-pass.png'); ?>" alt="" /></td>
</tr>
<tr id="password_usage_row">
<td><?php echo __('PW Usage Limit:','wpdmpro'); ?></td>  
<td><input size="10" style="width: 80px" type="text" name="wpdm_meta[password_usage_limit]" value="<?php echo get_wpdm_meta($file['id'],'password_usage_limit', true); ?>" /> / <?php echo __('password','wpdmpro'); ?> <span class="info infoicon" title="<?php echo __('Password will expire after it exceed this usage limit','wpdmpro'); ?>">&nbsp;</span></td>
</tr>
</table>
</div>
<h3><input type="checkbox" rel="linkedin" class="wpdmlock" name="wpdm_meta[linkedin_lock]" <?php if(get_wpdm_meta($file['id'],'linkedin_lock')=='1') echo "checked=checked"; ?> value="1"><?php echo __('LinkedIn Share Lock','wpdmpro'); ?></h3>
<div id="linkedin" class="frm fwpdmlock" <?php if(get_wpdm_meta($file['id'],'linkedin_lock')!='1') echo "style='display:none'"; ?> >
<table width="100%"  cellpadding="0" cellspacing="0" >
<tr>
<td><?php echo __('Custom linkedin share message:','wpdmpro'); ?>
</br><textarea style="width: 100%" name="wpdm_meta[linkedin_message]"><?php echo get_wpdm_meta($file['id'],'linkedin_message') ?></textarea>
URL to share (keep empty for current page url):
</br><input style="width: 100%" type="text" name="wpdm_meta[linkedin_url]" value="<?php echo get_wpdm_meta($file['id'],'linkedin_url') ?>" />
</td>
</tr>
</table>
</div>
<h3><input type="checkbox" rel="tweeter" class="wpdmlock" name="wpdm_meta[tweet_lock]" <?php if(get_wpdm_meta($file['id'],'tweet_lock')=='1') echo "checked=checked"; ?> value="1"><?php echo __('Tweet Lock','wpdmpro'); ?></h3>
<div id="tweeter" class="frm fwpdmlock" <?php if(get_wpdm_meta($file['id'],'tweet_lock')!='1') echo "style='display:none'"; ?> >
<table width="100%"  cellpadding="0" cellspacing="0" >
<tr>
<td><?php echo __('Custom tweet message:','wpdmpro'); ?>
</br><textarea style="width: 100%" type="text" name="wpdm_meta[tweet_message]"><?php echo get_wpdm_meta($file['id'],'tweet_message') ?></textarea></td>
</tr>
</table>
</div>
<h3><input type="checkbox" rel="gplusone" class="wpdmlock" name="wpdm_meta[gplusone_lock]" <?php if(get_wpdm_meta($file['id'],'gplusone_lock')=='1') echo "checked=checked"; ?> value="1"><?php echo __('Enable Google +1 Lock','wpdmpro'); ?></h3>
<div id="gplusone" class="frm fwpdmlock" <?php if(get_wpdm_meta($file['id'],'gplusone_lock')!='1') echo "style='display:none'"; ?> >
<table width="100%"  cellpadding="0" cellspacing="0" >
<tr>
<td width="90px"><?php echo __('URL for +1:','wpdmpro'); ?></td>  
<td><input size="10" style="width: 200px" type="text" name="wpdm_meta[google_plus_1]" value="<?php echo get_wpdm_meta($file['id'],'google_plus_1') ?>" /></td>
</tr>
</table>
</div>
<h3><input type="checkbox" rel="facebooklike" class="wpdmlock" name="wpdm_meta[facebooklike_lock]" <?php if(get_wpdm_meta($file['id'],'facebooklike_lock')=='1') echo "checked=checked"; ?> value="1"><?php echo __('Enable Facebook Like Lock','wpdmpro'); ?></h3>
<div id="facebooklike" class="frm fwpdmlock" <?php if(get_wpdm_meta($file['id'],'facebooklike_lock')!=1) echo "style='display:none;'"; ?> >
<table  width="100%" cellpadding="0" cellspacing="0">
<?php if(get_option('_wpdm_facebook_app_id')=='') echo "<tr><td colspan=2>You have to add a Facebook appID <a href='admin.php?page=file-manager/settings#fbappid'>here</a></td></tr>"; ?>
<tr>
<td width="90px"><?php echo __('URL to Like:','wpdmpro'); ?></td>  
<td><input size="10" style="width: 200px" type="text" name="wpdm_meta[facebook_like]" value="<?php echo get_wpdm_meta($file['id'],'facebook_like') ?>" /></td>
</tr>
</table>
</div>
<h3><input type="checkbox" rel="email" class="wpdmlock" name="wpdm_meta[email_lock]" <?php if(get_wpdm_meta($file['id'],'email_lock')=='1') echo "checked=checked"; ?> value="1"><?php echo __('Enable Email Lock','wpdmpro'); ?> </h3>
<div id="email" class="frm fwpdmlock"  <?php if(get_wpdm_meta($file['id'],'email_lock')!='1') echo "style='display:none'"; ?> >
<table  cellpadding="0" cellspacing="0" width="100%">
<tr><td>    
<?php do_action('wpdm_custom_form_field',$file['id']); ?> 
</td>
</tr>
<tr><td>

<?php echo __('Will ask for email (and checked custom data) before download','wpdmpro'); ?>
</td></tr>
</table>
</div>
<?php do_action('wpdm_download_lock_option',$file); ?> 
</div>
<div class="clear"></div>
</div>
</div>




<?php do_action("add_new_file_body_left", $file); ?>
</div> 

<div  style="width: 48%;float: right;height: inherit;">
<div class="postbox " id="wpdm-version-dates">
<div title="Click to toggle" class="handlediv"><br></div><h3 class="hndle"><span><?php echo __('Version & Dates','wpdmpro'); ?></span></h3>
<div class="inside">
<table class="frm" width="100%">
<tr><td width="180"><?php echo __('Current Package Version:','wpdmpro'); ?></td><td><input pattern="[0-9\.]+" type="text" size="20" name="wpdm_meta[version]" value="<?php echo get_wpdm_meta($file['id'],'version'); ?>" /></td></tr>
<tr><td><?php echo __('Create Date:','wpdmpro'); ?></td><td><input id="cdate" type="text" size="20" name="wpdm_meta[create_date]" value="<?php $cd = get_wpdm_meta($file['id'],'create_date'); $cd=$cd?$cd:time(); echo date("Y-m-d",$cd); ?>" /><span class="info infoicon" title="<?php echo __('Date format yyyy-mm-dd , If you keep empty, system will set current date','wpdmpro'); ?>">&nbsp;</span></td></tr>
<tr><td><?php echo __('Update Date:','wpdmpro'); ?></td><td><input id="udate" type="text" size="20" name="wpdm_meta[update_date]" value="<?php $ud = get_wpdm_meta($file['id'],'update_date'); $ud=$ud?$ud:time(); echo date("Y-m-d",$ud); ?>" /><span class="info infoicon" title="<?php echo __('Date format yyyy-mm-dd , If you keep empty, system will set current date','wpdmpro'); ?>">&nbsp;</span></td></tr>
<tr><td><?php echo __('Publish Date:','wpdmpro'); ?></td><td><input id="pdate" type="text" size="20" name="wpdm_meta[publish_date]" value="<?php $ed = get_wpdm_meta($file['id'],'publish_date'); if($ed) echo date("Y-m-d",$ed); ?>" /> <input type="text" value="<?php echo get_wpdm_meta($file['id'],'publish_time'); ?>" name="wpdm_meta[publish_time]" placeholder="hh:mm" style="width:60px"><span class="info infoicon" title="<?php echo __('Date format yyyy-mm-dd , Time format hh:mm , Empty means, immediately','wpdmpro'); ?>">&nbsp;</span></td></tr>
<tr><td><?php echo __('Expire Date:','wpdmpro'); ?></td><td><input id="edate" type="text" size="20" name="wpdm_meta[expire_date]" value="<?php $ed = get_wpdm_meta($file['id'],'expire_date'); if($ed) echo date("Y-m-d",$ed); ?>" /><span class="info infoicon" title="<?php echo __('Date format yyyy-mm-dd , Empty means, never expire','wpdmpro'); ?>">&nbsp;</span></td></tr>
</table>

<div class="clear"></div>
</div>
</div>

 
<div class="postbox " id="wpdm-remote-url">
<div title="Click to toggle" class="handlediv"><br></div><h3 class="hndle"><span><?php echo __('Remote File URL','wpdmpro'); ?></span><span class="info infoicon" title="<?php echo __('Here you can use a file url for your download package<br/>like, http://www.domain.com/myfiles.zip<br/><b>If you use this option uploaded files for same package will be skipped.</b>','wpdmpro'); ?>">&nbsp;</span></h3>
<div class="inside">
<?php echo __('Use Direct Link to download file','wpdmpro'); ?>
<input type="text" style="width: 98%" name="file[sourceurl]" id="file_source_url" value="<?php echo $file[sourceurl]; ?>" />                    <br />
<label for="url_protect"><?php echo __('Enable url protection','wpdmpro'); ?> <input type="checkbox" <?php echo get_wpdm_meta($file[id],'url_protect')?'checked=checked':''; ?> value="1" name="wpdm_url_protect" id="url_protect"></label> <span class="info infoicon" title="<?php echo __('If checked users will not know the actual download url.<br/><b>Important! </b>enabling this option may occur memory overflow error if you server cache memory size is smaller than file size','wpdmpro'); ?>">&nbsp;</span>
<label for="url_size"><?php echo __('Size','wpdmpro'); ?> <input type="text" value="<?php echo get_wpdm_meta($file[id],'url_size'); ?>" name="wpdm_meta[url_size]" placeholder="i.e.: 10 MB" id="url_size"></label> <span class="info infoicon" title="<?php echo __('Enter the size of remote file','wpdmpro'); ?>">&nbsp;</span>
<div class="clear"></div>
</div>
</div>

<div class="postbox " id="categories_meta_box">
<div title="Click to toggle" class="handlediv"><br></div><h3 class="hndle"><span><?php echo __('Categories','wpdmpro'); ?></span></h3>
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

<?php do_action("add_new_file_body_right", $file); ?>
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
<div class="postbox action" id="action">
<h3 class="hndle"><span><?php echo __('Actions','wpdmpro'); ?></span> <img src="images/wpspin_light.gif" id="sving" style="position: absolute;margin: 0px 0 0 5px;top:5px;right:5px;display: none;"/></h3>
<div class="inside">

<input type="button" value="&#171; Back" tabindex="9" class="button button-secondary button-large" onclick="location.href='admin.php?page=file-manager'" class="add:the-list:newmeta" name="addmeta" id="addmetasub">

<input  type="reset" value="<?php echo __('Reset','wpdmpro'); ?>" tabindex="9" class="button button-secondary  button-large" class="add:the-list:newmeta" name="addmeta" id="addmetasub">

<input type="submit" value="<?php echo $_GET['task']=='EditPackage'?__('Update Package','wpdmpro'):__('Create Package','wpdmpro'); ?>" label="<?php echo $_GET['task']=='EditPackage'?__('Update Package','wpdmpro'):__('Create Package','wpdmpro'); ?>" accesskey="p" tabindex="5" id="publish" class="button button-primary button-large" name="publish">
 <div class="clear"></div>
 <div id="serr" >
 </div>
 <div id="nxt">
 <?php echo __('Package Data Saved Successfully, Now:','wpdmpro'); ?> <br/>
 <a href="admin.php?page=file-manager"><?php echo __('Manage Packages','wpdmpro'); ?></a> | <a href="admin.php?page=file-manager/add-new-package"><?php echo __('Add Another','wpdmpro'); ?></a> | <a href="#" target="_blank" id="dview"><?php echo __('View Pacakge','wpdmpro'); ?></a> | <a href='#' onclick="jQuery('#nxt').slideUp();return false;"><?php echo __('Hide this message','wpdmpro'); ?></a>
 </div>
 <div class="clear"></div>
</div>
</div>
 




<?php    
$path = dirname(__FILE__)."/file-type-icons/";
$scan = scandir( $path );
$k = 0;
foreach( $scan as $v )
{
if( $v=='.' or $v=='..' or is_dir($path.$v) ) continue;

$fileinfo[$k]['file'] = 'download-manager/file-type-icons/'.$v;
$fileinfo[$k]['name'] = $v;
$k++;
}


if( !empty($fileinfo) )
{
          
 include dirname(__FILE__).'/file-icon.php';

} else {

?>
<div class="updated" style="padding: 5px;">
    <?php __("upload your icons on '/wp-content/plugins/download-manager/file-type-icons/' using ftp",'wpdmpro'); ?></div>

<?php } ?>





 <div class="clear"></div>
 
 <div class="postbox " id="upload_meta_box">
<h3><?php echo __('Upload file(s) from PC','wpdmpro'); ?></h3>
<div class="inside">
  

<div id="plupload-upload-ui" class="hide-if-no-js">
     <div id="drag-drop-area">
       <div class="drag-drop-inside">
        <p class="drag-drop-info"><?php _e('Drop files here'); ?></p>
        <p><?php _ex('or', 'Uploader: Drop files here - or - Select Files'); ?></p>
        <p class="drag-drop-buttons"><input id="plupload-browse-button" type="button" value="<?php esc_attr_e('Select Files'); ?>" class="button" /></p>
      </div>
     </div>
  </div>
  
  <?php

  $plupload_init = array(
    'runtimes'            => 'html5,silverlight,flash,html4',
    'browse_button'       => 'plupload-browse-button',
    'container'           => 'plupload-upload-ui',
    'drop_element'        => 'drag-drop-area',
    'file_data_name'      => 'async-upload',            
    'multiple_queues'     => true,
    'max_file_size'       => wp_max_upload_size().'b',
    'url'                 => admin_url('admin-ajax.php'),
    'flash_swf_url'       => includes_url('js/plupload/plupload.flash.swf'),
    'silverlight_xap_url' => includes_url('js/plupload/plupload.silverlight.xap'),
    'filters'             => array(array('title' => __('Allowed Files'), 'extensions' => '*')),
    'multipart'           => true,
    'urlstream_upload'    => true,

    // additional post data to send to our ajax hook
    'multipart_params'    => array(
      '_ajax_nonce' => wp_create_nonce('photo-upload'),
      'action'      => 'photo_gallery_upload',            // the ajax action name
    ),
  );

  // we should probably not apply this filter, plugins may expect wp's media uploader...
  $plupload_init = apply_filters('plupload_init', $plupload_init); ?>

  <script type="text/javascript">

    jQuery(document).ready(function($){

      // create the uploader and pass the config from above
      var uploader = new plupload.Uploader(<?php echo json_encode($plupload_init); ?>);

      // checks if browser supports drag and drop upload, makes some css adjustments if necessary
      uploader.bind('Init', function(up){
        var uploaddiv = jQuery('#plupload-upload-ui');

        if(up.features.dragdrop){
          uploaddiv.addClass('drag-drop');
            jQuery('#drag-drop-area')
              .bind('dragover.wp-uploader', function(){ uploaddiv.addClass('drag-over'); })
              .bind('dragleave.wp-uploader, drop.wp-uploader', function(){ uploaddiv.removeClass('drag-over'); });

        }else{
          uploaddiv.removeClass('drag-drop');
          jQuery('#drag-drop-area').unbind('.wp-uploader');
        }
      });

      uploader.init();

      // a file was added in the queue
      uploader.bind('FilesAdded', function(up, files){
        //var hundredmb = 100 * 1024 * 1024, max = parseInt(up.settings.max_file_size, 10);
        
           

        plupload.each(files, function(file){
          jQuery('#filelist').append(
                        '<div class="file" id="' + file.id + '"><b>' +
 
                        file.name + '</b> (<span>' + plupload.formatSize(0) + '</span>/' + plupload.formatSize(file.size) + ') ' +
                        '<div class="progress progress-success progress-striped active"><div class="bar fileprogress"></div></div></div>');
        });

        up.refresh();
        up.start();
      });
      
      uploader.bind('UploadProgress', function(up, file) {
                      
                jQuery('#' + file.id + " .fileprogress").width(file.percent + "%");
                jQuery('#' + file.id + " span").html(plupload.formatSize(parseInt(file.size * file.percent / 100)));
            });
 

      // a file was uploaded 
      uploader.bind('FileUploaded', function(up, file, response) {

        // this is your ajax response, update the DOM with it or something...
        //console.log(response);
        //response
        jQuery('#' + file.id ).remove();
        var d = new Date();
        var ID = d.getTime();
        response = response.response;
        var nm = response;
                            if(response.length>20) nm = response.substring(0,7)+'...'+response.substring(response.length-10);                             
                            //jQuery('#currentfiles table.widefat').append("<tr id='"+ID+"' class='cfile'><td><input type='hidden' id='in_"+ID+"' name='files[]' value='"+response+"' /><img id='del_"+ID+"' src='<?php echo plugins_url(); ?>/download-manager/images/minus.png' rel='del' align=left /></td><td>"+response+"</td><td width='40%'><input style='width:99%' type='text' name='wpdm_meta[fileinfo]["+response+"][title]' value='"+response+"' onclick='this.select()'></td><td><input size='10' type='text' id='indpass_"+ID+"' name='wpdm_meta[fileinfo]["+response+"][password]' value=''> <img style='cursor: pointer;float: right;margin-top: -3px' class='genpass' onclick=\"return generatepass('indpass_"+ID+"')\" title='Generate Password' src=\"<?php echo plugins_url('download-manager/images/generate-pass.png'); ?>\" /></td></tr>");                            
                            jQuery('#wpdm-files').dataTable().fnAddData( [
                                                        "<input type='hidden' id='in_"+ID+"' name='files[]' value='"+response+"' /><img id='del_"+ID+"' src='<?php echo plugins_url(); ?>/download-manager/images/minus.png' rel='del' align=left />",
                                                        response,
                                                        "<input style='width:99%' type='text' name='wpdm_meta[fileinfo]["+response+"][title]' value='"+response+"' onclick='this.select()'>",                                                        
                                                        "<input size='10' type='text' id='indpass_"+ID+"' name='wpdm_meta[fileinfo]["+response+"][password]' value=''> <img style='cursor: pointer;float: right;margin-top: -3px' class='genpass' onclick=\"return generatepass('indpass_"+ID+"')\" title='Generate Password' src=\"<?php echo plugins_url('download-manager/images/generate-pass.png'); ?>\" />"
                                                        ] );
                            jQuery('#wpdm-files tbody tr:last-child').attr('id',ID).addClass('cfile');
                            
                            jQuery("#wpdm-files tbody").sortable();                             
                            
                            jQuery('#'+ID).fadeIn();
                            jQuery('#del_'+ID).click(function(){
                                if(jQuery(this).attr('rel')=='del'){
                                jQuery('#'+ID).removeClass('cfile').addClass('dfile');
                                jQuery('#in_'+ID).attr('name','del[]');
                                jQuery(this).attr('rel','undo').attr('src','<?php echo plugins_url(); ?>/download-manager/images/add.png').attr('title','Undo Delete');
                                } else if(jQuery(this).attr('rel')=='undo'){
                                jQuery('#'+ID).removeClass('dfile').addClass('cfile');
                                jQuery('#in_'+ID).attr('name','files[]');
                                jQuery(this).attr('rel','del').attr('src','<?php echo plugins_url(); ?>/download-manager/images/minus.png').attr('title','Delete File');
                                }
                                
                                
                            });
                            
                           

      });

    });   

  </script>
  <div id="filelist"></div>

 <div class="clear"></div>
</div>
</div>
 
 <div class="clear"></div>
 
 

 



<div class="postbox " id="action">
<div title="Click to toggle" class="handlediv"><br></div><h3 class="hndle"><span><?php echo __('Preview image','wpdmpro'); ?></span></h3>
<div class="inside">
 
<a onclick="return false;" id="img" href="#">
<?php if(!empty($file['preview'])): ?>
<img src="<?php  echo plugins_url().'/download-manager/timthumb.php?w=500&h=0&zc=1&src='.$file['preview'] ?>" style="max-width:100%;" alt="preview" id="mpim" />
<input type="hidden" id="fpvw" name="file[preview]" value="<?php echo $file['preview']; ?>" >
<?php else: ?>
<img src='<?php echo plugins_url('/download-manager/images/add-image.gif'); ?>' /> Add Main Preview Image
<?php endif; ?>
</a>
<?php if(!empty($file['preview'])): ?>
<a href="#"  id="rmvp"> <img align="left" src='<?php echo plugins_url('/download-manager/images/minus.png'); ?>' /> Remove Preview Image</a>
<?php endif; ?>
 
<!-- <input type="file" name="preview" /> -->
 <div class="clear"></div>
</div>
</div>
 

<?php do_action("add_new_file_sidebar"); ?> 




</div>
 
</form>

</div>

 
       
<script type="text/javascript">
      
      jQuery(document).ready(function() {
          
            // Uploading files
var file_frame;

  jQuery('#img').live('click', function( event ){
     
    event.preventDefault();

    // If the media frame already exists, reopen it.
    if ( file_frame ) {
      file_frame.open();
      return;
    }

    // Create the media frame.
    file_frame = wp.media.frames.file_frame = wp.media({
      title: jQuery( this ).data( 'uploader_title' ),
      button: {
        text: jQuery( this ).data( 'uploader_button_text' ),
      },
      multiple: false  // Set to true to allow multiple files to be selected
    });

    // When an image is selected, run a callback.
    file_frame.on( 'select', function() {
      // We set multiple to false so only get one image from the uploader
      attachment = file_frame.state().get('selection').first().toJSON();
      jQuery('#fpvw').val(attachment.url);
      jQuery('#rmvp').remove();
      jQuery('#img').html("<img src='"+attachment.url+"' style='max-width:100%'/><input type='hidden' name='file[preview]' value='"+attachment.url+"' >");
      jQuery('#img').after('<a href="#"  id="rmvp"> <img align="left" src="<?php echo plugins_url('/download-manager/images/minus.png'); ?>" /> Remove Preview Image</a>');
      file_frame.close();       
      // Do something with attachment.id and/or attachment.url here
    });

    // Finally, open the modal
    file_frame.open();
  });
 
    
           jQuery(".cb-enable").live('click',function(){
                var parent = jQuery(this).parents('.switch');
                jQuery('.cb-disable',parent).removeClass('selected');
                jQuery(this).addClass('selected');
                jQuery('.checkbox',parent).attr('checked', true);
            });
           jQuery(".cb-disable").live('click',function(){
                var parent = jQuery(this).parents('.switch');
                jQuery('.cb-enable',parent).removeClass('selected');
                jQuery(this).addClass('selected');
                jQuery('.checkbox',parent).attr('checked', false);
            });
    
          var n = 0;
          jQuery(".wpdmlock").each(function(i) { 
            n++; 
            jQuery(this).attr('id','wpdmlock-'+n).css('opacity',0).css('position','absolute').css('z-index',-100);
            if(jQuery(this).attr('checked'))
            jQuery(this).after('<label class="wpdm-label wpdm-checked" for="wpdmlock-'+n+'" ></label> ');
            else
            jQuery(this).after('<label class="wpdm-label wpdm-unchecked" for="wpdmlock-'+n+'" ></label> ');
            
        });
        
        jQuery('#rmvp').live('click',function(){
            jQuery('#fpvw').val('');
            jQuery('#mpim').slideUp().remove();
            jQuery(this).fadeOut();
            jQuery('#img').html('<img src="<?php echo plugins_url("/download-manager/images/add-image.gif"); ?>\" /> Add Main Preview Image<input type="hidden" name="file[preview]" value="" id="fpvw" />');
            return false;
        });
        jQuery('.wpdm-label').live('click',function(){                         
           //alert(jQuery(this).attr('class'));
           if(jQuery(this).hasClass('wpdm-checked')) jQuery(this).addClass('wpdm-unchecked').removeClass('wpdm-checked');
           else jQuery(this).addClass('wpdm-checked').removeClass('wpdm-unchecked');
            
        });
         
      
      jQuery(window).scroll(function(){
          if(jQuery(window).scrollTop()>100)
          jQuery('#action').addClass('action-float').removeClass('action');
          else
          jQuery('#action').removeClass('action-float').addClass('action');
      })
          
      jQuery("select").chosen({no_results_text: ""});
          
          jQuery('.handlediv').click(function(){
            jQuery(this).parent().find('.inside').slideToggle();
        });
         
        jQuery('.handle').click(function(){
            alert(2);
            jQuery(this).parent().find('.inside').slideToggle();
        });
         
          
        jQuery('.nopro').click(function(){
            if(this.checked) jQuery('.wpdmlock').removeAttr('checked');
        });
        
        jQuery('.wpdmlock').click(function(){            
            if(this.checked) {   
            jQuery('#'+jQuery(this).attr('rel')).slideDown();
            jQuery('.nopro').removeAttr('checked');
            } else {
            jQuery('#'+jQuery(this).attr('rel')).slideUp();    
            }
        });
          
        jQuery( "#cdate" ).datepicker({dateFormat:'yy-mm-dd'});
        jQuery( "#udate" ).datepicker({dateFormat:'yy-mm-dd'});
        jQuery( "#edate" ).datepicker({dateFormat:'yy-mm-dd'});
        jQuery( "#pdate" ).datepicker({dateFormat:'yy-mm-dd'});
        
        jQuery('#wpdm-pf').submit(function(){
            jQuery('#serr').hide();
            jQuery('#nxt').hide();
             var error = "";
             if(jQuery('#title').val()=='') { error += '<li id="terr"><?php echo __('Must Enter a Package Title','wpdmpro'); ?></li>'; }
             if(jQuery('#lnk_tpl').val()=='') { error += '<li id="lerr"><?php echo __('Must Select a Link Template','wpdmpro'); ?></li>'; }
             if(jQuery('#pge_tpl').val()=='') { error += '<li id="perr"><?php echo __('Must Select a Page Template','wpdmpro'); ?></li>'; }
             
             if(error!=''){
                 jQuery('#serr').html("<b><?php echo __('Submission Errors:','wpdmpro'); ?></b><br/><ul>"+error+"</ul>").slideDown();
                 return false;
             }
             
             jQuery('#publish').attr('disabled','disabled').val('Please Wait...');
             jQuery('#wpdm-pf').ajaxSubmit({               
                 beforeSubmit: function() { jQuery('#sving').fadeIn(); },
                 success: function(res) {  
                     jQuery('#sving').fadeOut();                     
                     jQuery('#nxt').slideDown();                                             
                     jQuery('#wview').attr('href','<?php echo home_url('/'.get_option('__wpdm_purl_base','download').'/');  ?>'+jQuery('#urlkey').val()+'/');
                     jQuery('#dview').attr('href','<?php echo home_url('/'.get_option('__wpdm_purl_base','download').'/');  ?>'+jQuery('#urlkey').val()+'/');
                     setTimeout("jQuery('#nxt').slideUp();",6000)
                     jQuery('#publish').removeAttr('disabled').val(jQuery('#publish').attr('label'));
                     jQuery('.dfile').hide();
                     if(res.id!=undefined){                        
                        location.href='admin.php?page=file-manager&task=EditPackage&id='+res.id;
                     }
                 },
                 dataType: 'json'
                 
                 
             });
             return false;
        });
  
    
        
       
      });    
      
      /*jQuery('#img').click(function() {           
            tb_show('', 'media-upload.php?type=image&TB_iframe=1&width=640&height=551');
            window.send_to_editor = function(html) {           
              var imgurl = jQuery('img',"<p>"+html+"</p>").attr('src');   
              jQuery('#rmvp').remove();
              jQuery('#img').html("<img src='"+imgurl+"' style='max-width:100%'/><input type='hidden' name='file[preview]' value='"+imgurl+"' >");
              jQuery('#img').after('<a href="#"  id="rmvp"> <img align="left" src="<?php echo plugins_url('/download-manager/images/minus.png'); ?>" /> Remove Preview Image</a>');
              tb_remove();
              }
            return false;
        });*/   

     function generatepass(id){
         tb_show('Generate Password',ajaxurl+'?action=wpdm_generate_password&w=300&h=500&id='+id);
     }
    
    function wpdm_view_package(){
        
    }
    
     
    
  
  <?php if(get_wpdm_meta($file['id'],'lock',true)!='') { ?>   
     jQuery('#<?php echo get_wpdm_meta($file['id'],'lock',true); ?>').show();
  <?php } ?>
      </script>
      
      <?php
 
?>
 