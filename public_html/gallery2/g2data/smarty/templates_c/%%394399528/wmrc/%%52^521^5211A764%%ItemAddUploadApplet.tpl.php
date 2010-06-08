<?php /* Smarty version 2.6.20, created on 2010-03-31 20:40:46
         compiled from gallery:modules/uploadapplet/templates/ItemAddUploadApplet.tpl */ ?>
<div class="gbBlock">
<?php if (! empty ( $this->_tpl_vars['ItemAddUploadApplet']['NoProtocolError'] )): ?>
<div class="giError">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "The upload applet relies on a G2 module that is not currently enabled.  Please ask an administrator to enable the 'remote' module."), $this);?>

</div>
<?php else: ?>
<form name="form1">
<object classid="clsid:8AD9C840-044E-11D1-B3E9-00805F499D93"
codebase="http://java.sun.com/products/plugin/autodl/jinstall-1_4-windows-i586.cab#Version=1,4,0,0"
width="600" height="400" mayscript="true" id="applet_object">
<param name="code" value="com.gallery.GalleryRemote.GRAppletMini"/>
<param name="archive" value="<?php echo $this->_reg_objects['g'][0]->url(array('href' => "modules/uploadapplet/applets/GalleryRemoteAppletMini.jar"), $this);?>
,<?php echo $this->_reg_objects['g'][0]->url(array('href' => "modules/uploadapplet/applets/GalleryRemoteHTTPClient.jar"), $this);?>
,<?php echo $this->_reg_objects['g'][0]->url(array('href' => "modules/uploadapplet/applets/applet_img.jar"), $this);?>
"/>
<param name="type" value="application/x-java-applet;version=1.4"/>
<param name="scriptable" value="false"/>
<param name="mayscript" value="false"/>
<param name="progressbar" value="true"/>
<param name="boxmessage" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Downloading the Gallery Remote Applet'), $this);?>
"/>
<param name="gr_url" value="<?php echo $this->_tpl_vars['ItemAddUploadApplet']['g2BaseUrl']; ?>
"/>
<param name="gr_cookie_name" value="<?php echo $this->_tpl_vars['ItemAddUploadApplet']['cookieName']; ?>
"/>
<param name="gr_cookie_value" value="<?php echo $this->_tpl_vars['ItemAddUploadApplet']['cookieValue']; ?>
"/>
<param name="gr_cookie_domain" value="<?php echo $this->_tpl_vars['ItemAddUploadApplet']['cookieDomain']; ?>
"/>
<param name="gr_cookie_path" value="<?php echo $this->_tpl_vars['ItemAddUploadApplet']['cookiePath']; ?>
"/>
<param name="gr_album" value="<?php echo $this->_tpl_vars['ItemAddUploadApplet']['album']; ?>
"/>
<param name="gr_user_agent" value="<?php echo $this->_tpl_vars['ItemAddUploadApplet']['userAgent']; ?>
"/>
<param name="gr_gallery_version" value="<?php echo $this->_tpl_vars['ItemAddUploadApplet']['galleryVersion']; ?>
"/>
<param name="gr_locale" value="<?php echo $this->_tpl_vars['ItemAddUploadApplet']['locale']; ?>
"/>
<?php $_from = $this->_tpl_vars['ItemAddUploadApplet']['default']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
<param name="GRDefault_<?php echo $this->_tpl_vars['key']; ?>
" value="<?php echo $this->_tpl_vars['value']; ?>
"/>
<?php endforeach; endif; unset($_from); ?>
<?php $_from = $this->_tpl_vars['ItemAddUploadApplet']['override']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
<param name="GROverride_<?php echo $this->_tpl_vars['key']; ?>
" value="<?php echo $this->_tpl_vars['value']; ?>
"/>
<?php endforeach; endif; unset($_from); ?>
<param name="codebase_lookup" value="false"/>
<param name="image" value="<?php echo $this->_reg_objects['g'][0]->url(array('href' => "modules/slideshowapplet/applets/splash.gif"), $this);?>
"/>
<comment>
<embed
type="application/x-java-applet;version=1.4"
code="com.gallery.GalleryRemote.GRAppletMini"
id="applet_embed"
archive="<?php echo $this->_reg_objects['g'][0]->url(array('href' => "modules/uploadapplet/applets/GalleryRemoteAppletMini.jar"), $this);?>
,<?php echo $this->_reg_objects['g'][0]->url(array('href' => "modules/uploadapplet/applets/GalleryRemoteHTTPClient.jar"), $this);?>
,<?php echo $this->_reg_objects['g'][0]->url(array('href' => "modules/uploadapplet/applets/applet_img.jar"), $this);?>
"
width="600"
height="400"
mayscript="true"
progressbar="true"
boxmessage="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Downloading the Gallery Remote Applet'), $this);?>
"
pluginspage="http://java.sun.com/j2se/1.4.2/download.html"
gr_url="<?php echo $this->_tpl_vars['ItemAddUploadApplet']['g2BaseUrl']; ?>
"
gr_cookie_name="<?php echo $this->_tpl_vars['ItemAddUploadApplet']['cookieName']; ?>
"
gr_cookie_value="<?php echo $this->_tpl_vars['ItemAddUploadApplet']['cookieValue']; ?>
"
gr_cookie_domain="<?php echo $this->_tpl_vars['ItemAddUploadApplet']['cookieDomain']; ?>
"
gr_cookie_path="<?php echo $this->_tpl_vars['ItemAddUploadApplet']['cookiePath']; ?>
"
gr_album="<?php echo $this->_tpl_vars['ItemAddUploadApplet']['album']; ?>
"
gr_user_agent="<?php echo $this->_tpl_vars['ItemAddUploadApplet']['userAgent']; ?>
"
gr_gallery_version="<?php echo $this->_tpl_vars['ItemAddUploadApplet']['galleryVersion']; ?>
"
gr_locale="<?php echo $this->_tpl_vars['ItemAddUploadApplet']['locale']; ?>
"
<?php $_from = $this->_tpl_vars['ItemAddUploadApplet']['default']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
GRDefault_<?php echo $this->_tpl_vars['key']; ?>
="<?php echo $this->_tpl_vars['value']; ?>
"
<?php endforeach; endif; unset($_from); ?>
<?php $_from = $this->_tpl_vars['ItemAddUploadApplet']['override']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
GROverride_<?php echo $this->_tpl_vars['key']; ?>
="<?php echo $this->_tpl_vars['value']; ?>
"
<?php endforeach; endif; unset($_from); ?>
codebase_lookup="false"
image="<?php echo $this->_reg_objects['g'][0]->url(array('href' => "modules/slideshowapplet/applets/splash.gif"), $this);?>
"
>
<noembed alt="<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Your browser doesn't support applets; you should use one of the other upload methods."), $this);?>
">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Your browser doesn't support applets; you should use one of the other upload methods."), $this);?>

</noembed>
</embed>
</comment>
</object>
</form>
<?php endif; ?>
</div>
<div id="uploadapplet_Feedback">
</div>
<?php $this->_tag_stack[] = array('addToTrailer', array(), $this); $_block_repeat=true; $this->_reg_objects['g'][0]->addToTrailer($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>
<script type="text/javascript">
// <![CDATA[
var text = '', textUrls = '', apphead = '', appfoot = '';
function startingUpload() {
text = textUrls = '';
apphead = '<h2><?php echo $this->_reg_objects['g'][0]->text(array('text' => "Uploading files...",'forJavascript' => true), $this);?>
</h2><ul>';
appfoot = '</ul>';
addText('');
}
function uploadedOne(itemId, itemName) {
addTextUrls('<li>' + itemName + '</li>',
'<li><a href="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.ShowItem",'arg2' => "itemId=",'forceSessionId' => false), $this);?>
'
+ itemId + '">' + itemName + '</a></li>');
}
function doneUploading() {
apphead = '<h2><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Upload complete','forJavascript' => true), $this);?>
</h2><ul>';
appfoot = '</ul><p><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'You can keep uploading or go to some of the pictures you uploaded by clicking on the links above','forJavascript' => true), $this);?>
</p>';
showUrls();
}
<?php echo '
function addTextUrls(s, s1) {
text = text + s;
textUrls = textUrls + s1;
getRef().innerHTML = \'<div class="gbBlock gcBackground1">\' + apphead
+ text + appfoot + \'</div>\';
}
function addText(s) {
text = text + s;
textUrls = textUrls + s;
getRef().innerHTML = \'<div class="gbBlock gcBackground1">\' + apphead
+ text + appfoot + \'</div>\';
}
function showUrls() {
getRef().innerHTML = \'<div class="gbBlock gcBackground1">\' + apphead
+ textUrls + appfoot + \'</div>\';
}
function getRef() {
if (document.getElementById) {
return document.getElementById("uploadapplet_Feedback");
} else if (document.all) {
return document.all["uploadapplet_Feedback"];
}
}
// Something is buggy in firefox, it tries to call "nullFindProxyForURL" and
// all js calls after that do nothing.. define the function so our js works.
function nullFindProxyForURL() { }
'; ?>

// ]]>
</script>
<?php $_obj_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo $this->_reg_objects['g'][0]->addToTrailer($this->_tag_stack[count($this->_tag_stack)-1][1], $_obj_block_content, $this, $_block_repeat);} array_pop($this->_tag_stack);?>
