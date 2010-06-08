<?php /* Smarty version 2.6.20, created on 2010-03-31 22:23:12
         compiled from gallery:modules/rearrange/templates/RearrangeItems.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'gallery:modules/rearrange/templates/RearrangeItems.tpl', 35, false),)), $this); ?>
<div class="gbBlock gcBackground1">
<h2> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Rearrange Album'), $this);?>
 </h2>
</div>
<?php if (isset ( $this->_tpl_vars['RearrangeItems']['automaticOrderMessage'] )): ?>
<div class="gbBlock">
<p class="giDescription">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "This album has an automatic sort order specified, so you cannot change the order of items manually.  You must remove the automatic sort order to continue."), $this);?>

<a href="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.ItemAdmin",'arg2' => "subView=core.ItemEdit",'arg3' => "editPlugin=ItemEditAlbum",'arg4' => "itemId=".($this->_tpl_vars['ItemAdmin']['item']['id'])), $this);?>
">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'change'), $this);?>

</a>
</p>
</div>
<?php else: ?>
<script type="text/javascript">
// <![CDATA[
var sel = -1, list = new Array();
var html = new Array();
<?php $_from = $this->_tpl_vars['RearrangeItems']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['idx'] => $this->_tpl_vars['child']):
?>
<?php ob_start(); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "gallery:modules/rearrange/templates/RearrangeItemsCell.tpl", 'smarty_include_vars' => array('child' => $this->_tpl_vars['child'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $this->_smarty_vars['capture']['html'] = ob_get_contents(); ob_end_clean(); ?>
html[<?php echo $this->_tpl_vars['idx']; ?>
] = '<?php echo ((is_array($_tmp=$this->_smarty_vars['capture']['html'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
';
<?php endforeach; endif; unset($_from); ?>
for (var i = 0; i < <?php echo $this->_tpl_vars['RearrangeItems']['count']; ?>
; i++) <?php echo ' {
list[i] = i;
}
function save() {
var s = \'\';
for (var i = 0; i < list.length; i++) {
if (i > 0) s += \',\';
s += list[i];
}
document.getElementById(\'riList\').value = s;
}
function doclick(idx) {
if (sel < 0) {
sel = idx;
document.getElementById(\'item_\'+sel).getElementsByTagName(\'*\')[0].style.borderColor = \'#ff3333\';
document.getElementById(\'item_\'+sel).parentNode.style.backgroundColor = \'#ff3333\';
} else {
var a = document.getElementById(\'item_\'+sel);
a.getElementsByTagName(\'*\')[0].style.borderColor = \'black\';
a.parentNode.style.backgroundColor = \'transparent\';
if (idx != sel) {
var dir = (sel < idx) ? 1 : -1, tt, ti, i, b;
ti = list[sel];
tt = html[sel];
for (i = sel; i != idx; a = b, i += dir) {
b = document.getElementById(\'item_\' + (i+dir));
a.innerHTML = html[i] = html[i+dir];
list[i] = list[i+dir];
}
a.innerHTML = html[i] = tt;
list[idx] = ti;
}
sel = -1;
}
}
// ]]>
'; ?>
</script>
<?php if (isset ( $this->_tpl_vars['status']['saved'] )): ?>
<div class="gbBlock"><h2 class="giSuccess">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Order saved successfully'), $this);?>

</h2></div>
<?php endif; ?>
<div class="gbBlock">
<p class="giDescription">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Change the order of the items in this album.%s Click an item to move, then click the new location.",'arg1' => "<br/>"), $this);?>

</p>
<?php if ($this->_tpl_vars['RearrangeItems']['columns'] > 0): ?>
<table class="rearrangeTable">
<?php else: ?>
<div class="rearrangeTable">
<?php endif; ?>
<?php $this->assign('row', 0); ?>
<?php $this->assign('column', 0); ?>
<?php $_from = $this->_tpl_vars['RearrangeItems']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['childList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['childList']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['idx'] => $this->_tpl_vars['child']):
        $this->_foreach['childList']['iteration']++;
?>
<?php if ($this->_tpl_vars['RearrangeItems']['columns'] > 0): ?>
<?php if ($this->_tpl_vars['column'] == 0): ?> <tr> <?php endif; ?>
<td>
<?php else: ?>
<div class="riFloat"
style="width:<?php echo $this->_tpl_vars['RearrangeItems']['maxWidth']; ?>
px;height:<?php echo $this->_tpl_vars['RearrangeItems']['maxHeight']; ?>
px">
<?php endif; ?>
<a href="#" id="item_<?php echo $this->_tpl_vars['idx']; ?>
" onclick="doclick(<?php echo $this->_tpl_vars['idx']; ?>
);return false">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "gallery:modules/rearrange/templates/RearrangeItemsCell.tpl", 'smarty_include_vars' => array('child' => $this->_tpl_vars['child'],'l10Domain' => 'modules_rearrange')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</a>
<?php if ($this->_tpl_vars['RearrangeItems']['columns'] > 0): ?>
</td>
<?php $this->assign('column', $this->_tpl_vars['column']+1); ?>
<?php if ($this->_tpl_vars['column'] == $this->_tpl_vars['RearrangeItems']['columns'] || ($this->_foreach['childList']['iteration'] == $this->_foreach['childList']['total'])): ?>
</tr>
<?php $this->assign('column', 0); ?>
<?php $this->assign('row', $this->_tpl_vars['row']+1); ?>
<?php if ($this->_tpl_vars['row'] == $this->_tpl_vars['RearrangeItems']['rows']): ?>
<tr><td colspan="<?php echo $this->_tpl_vars['RearrangeItems']['columns']; ?>
"><hr/></td></tr>
<?php $this->assign('row', 0); ?>
<?php endif; ?>
<?php endif; ?>
<?php else: ?>
</div>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<?php if ($this->_tpl_vars['RearrangeItems']['columns'] > 0): ?>
</table>
<?php else: ?>
</div>
<?php endif; ?>
</div>
<div class="gbBlock gcBackground1">
<input type="hidden" id="riList" name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[list]"), $this);?>
" value=""/>
<input type="submit" class="inputTypeSubmit" onclick="save()"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][save]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Save'), $this);?>
"/>
<input type="submit" class="inputTypeSubmit"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][reset]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Reset'), $this);?>
"/>
</div>
<?php endif; ?>