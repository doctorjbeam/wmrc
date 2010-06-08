<?php /* Smarty version 2.6.20, created on 2010-03-31 20:37:07
         compiled from modules/core/templates/ItemDeleteJs.tpl */ ?>
var prompts = {
"header" : '<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Warning!",'forJavascript' => true), $this);?>
',
"body"   : '<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Do you really want to delete %s?",'forJavascript' => true), $this);?>
',
"yes"    : '<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Yes','forJavascript' => true), $this);?>
',
"no"     : '<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'No','forJavascript' => true), $this);?>
',
"more"   : '<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Delete more items...",'forJavascript' => true), $this);?>
'
};
<?php echo '
function core_confirmDelete(url, moreUrl, title) {
var pageItemId = this.pageItemId;
var dialog = new YAHOO.widget.SimpleDialog("gDialog", { width: "20em",
effect: { effect:YAHOO.widget.ContainerEffect.FADE, duration:0.25 },
fixedcenter: true,
modal: true,
draggable: false });
dialog.setHeader(prompts[\'header\']);
var bodyText = prompts[\'body\'].replace(\'%s\', title);
if (moreUrl) {
bodyText += \'<br /><br /><a href="" onclick="document.location.href=\\\'\'
+ moreUrl + \'\\\';return false">\' + prompts[\'more\'] + \'</a>\';
}
dialog.setBody(bodyText);
dialog.cfg.setProperty("icon", YAHOO.widget.SimpleDialog.ICON_WARN);
var handleYes = function() {
document.location.href = url;
}
var handleNo = function() {
this.hide();
}
var myButtons = [ { text: prompts[\'yes\'], handler:handleYes },
{ text: prompts[\'no\'], handler:handleNo, isDefault:true } ];
dialog.cfg.queueProperty("buttons", myButtons);
dialog.render(document.body);
}
'; ?>
