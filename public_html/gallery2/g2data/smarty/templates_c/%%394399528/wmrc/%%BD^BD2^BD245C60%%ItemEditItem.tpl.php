<?php /* Smarty version 2.6.20, created on 2010-03-31 20:38:36
         compiled from gallery:modules/core/templates/ItemEditItem.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_select_date', 'gallery:modules/core/templates/ItemEditItem.tpl', 114, false),array('function', 'html_select_time', 'gallery:modules/core/templates/ItemEditItem.tpl', 119, false),array('modifier', 'utf8', 'gallery:modules/core/templates/ItemEditItem.tpl', 117, false),)), $this); ?>
<div class="gbBlock">
<?php if ($this->_tpl_vars['ItemEditItem']['can']['changePathComponent']): ?>
<div>
<h2>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Name'), $this);?>

<span class="giSubtitle">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "(required)"), $this);?>

</span>
</h2>
<p class="giDescription">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "The name of this item on your hard disk.  It must be unique in this album.  Only use alphanumeric characters, underscores or dashes."), $this);?>

</p>
<?php echo ''; ?><?php $_from = $this->_tpl_vars['ItemAdmin']['parents']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['parent']):
?><?php echo ''; ?><?php if (empty ( $this->_tpl_vars['parent']['parentId'] )): ?><?php echo '/'; ?><?php else: ?><?php echo ''; ?><?php echo $this->_tpl_vars['parent']['pathComponent']; ?><?php echo '/'; ?><?php endif; ?><?php echo ''; ?><?php endforeach; endif; unset($_from); ?><?php echo ''; ?>

<input type="text" size="40"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[pathComponent]"), $this);?>
" value="<?php echo $this->_tpl_vars['form']['pathComponent']; ?>
"/>
<?php if (isset ( $this->_tpl_vars['form']['error']['pathComponent']['invalid'] )): ?>
<div class="giError">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Your name contains invalid characters.  Please choose another."), $this);?>

</div>
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['form']['error']['pathComponent']['missing'] )): ?>
<div class="giError">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "You must enter a name for this item."), $this);?>

</div>
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['form']['error']['pathComponent']['collision'] )): ?>
<div class="giError">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "The name you entered is already in use.  Please choose another."), $this);?>

</div>
<?php endif; ?>
</div>
<?php endif; ?>
<div>
<h4> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Title'), $this);?>
 </h4>
<p class="giDescription">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "The title of this item."), $this);?>

</p>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "gallery:modules/core/templates/MarkupBar.tpl", 'smarty_include_vars' => array('viewL10domain' => 'modules_core','element' => 'title','firstMarkupBar' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<input type="text" id="title" size="60" maxlength="<?php echo $this->_tpl_vars['ItemEdit']['fieldLengths']['title']; ?>
"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[title]"), $this);?>
" value="<?php echo $this->_tpl_vars['form']['title']; ?>
"/>
<?php if (! empty ( $this->_tpl_vars['form']['error']['title']['missingRootTitle'] )): ?>
<div class="giError">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "The root album must have a title."), $this);?>

</div>
<?php endif; ?>
</div>
<div>
<h4> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Summary'), $this);?>
 </h4>
<p class="giDescription">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "The summary of this item."), $this);?>

</p>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "gallery:modules/core/templates/MarkupBar.tpl", 'smarty_include_vars' => array('viewL10domain' => 'modules_core','element' => 'summary')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<input type="text" id="summary" size="60"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[summary]"), $this);?>
" value="<?php echo $this->_tpl_vars['form']['summary']; ?>
"/>
</div>
<div>
<h4> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Keywords'), $this);?>
 </h4>
<p class="giDescription">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Keywords are not visible, but are searchable."), $this);?>

</p>
<textarea rows="2" cols="60"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[keywords]"), $this);?>
"><?php echo $this->_tpl_vars['form']['keywords']; ?>
</textarea>
</div>
<div>
<h4> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Description'), $this);?>
 </h4>
<p class="giDescription">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "This is the long description of the item."), $this);?>

</p>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "gallery:modules/core/templates/MarkupBar.tpl", 'smarty_include_vars' => array('viewL10domain' => 'modules_core','element' => 'description')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<textarea id="description" rows="4" cols="60"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[description]"), $this);?>
"><?php echo $this->_tpl_vars['form']['description']; ?>
</textarea>
</div>
</div>
<div class="gbBlock">
<h3> <?php echo $this->_reg_objects['g'][0]->text(array('text' => "%s Date and Time",'arg1' => $this->_tpl_vars['ItemEditItem']['typeName']['0'],'postSprintfArg1' => $this->_tpl_vars['ItemEditItem']['typeName']['2']), $this);?>
 </h3>
<p class="giDescription">
<?php if (! empty ( $this->_tpl_vars['ItemEditItem']['isItemPhoto'] )): ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Set the date and time when this image was captured."), $this);?>

<?php elseif (! empty ( $this->_tpl_vars['ItemEditItem']['isItemUnknown'] )): ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Set the date and time to be displayed for this item."), $this);?>

<?php else: ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Set the date and time to be displayed for this %s.",'arg1' => $this->_tpl_vars['ItemEditItem']['typeName']['1'],'postSprintfArg1' => $this->_tpl_vars['ItemEditItem']['typeName']['3']), $this);?>

<?php endif; ?>
</p>
<p>
<?php ob_start(); ?><?php echo ''; ?><?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[originationTimestampSplit]"), $this);?><?php echo ''; ?>
<?php $this->_smarty_vars['capture']['originationTimestampField'] = ob_get_contents(); ob_end_clean(); ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Date:"), $this);?>

<?php ob_start(); ?>
<?php echo smarty_function_html_select_date(array('time' => $this->_tpl_vars['form']['originationTimestamp'],'field_array' => $this->_smarty_vars['capture']['originationTimestampField'],'start_year' => '1970','end_year' => "+0"), $this);?>

<?php $this->_smarty_vars['capture']['htmlSelectDate'] = ob_get_contents(); ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_smarty_vars['capture']['htmlSelectDate'])) ? $this->_run_mod_handler('utf8', true, $_tmp) : smarty_modifier_utf8($_tmp)); ?>

<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Time:"), $this);?>

<?php echo smarty_function_html_select_time(array('time' => $this->_tpl_vars['form']['originationTimestamp'],'field_array' => $this->_smarty_vars['capture']['originationTimestampField']), $this);?>

<br/>
</p>
<?php if (! empty ( $this->_tpl_vars['ItemEditItem']['originationTimestamp'] )): ?>
<script type="text/javascript">
// <![CDATA[
function setOriginationTimestamp() {
var frm = document.getElementById('itemAdminForm');
frm.elements['<?php echo $this->_smarty_vars['capture']['originationTimestampField']; ?>
[Date_Month]'].value = '<?php echo $this->_tpl_vars['ItemEditItem']['originationTimestamp']['Date_Month']; ?>
';
frm.elements['<?php echo $this->_smarty_vars['capture']['originationTimestampField']; ?>
[Date_Day]'].value = '<?php echo $this->_tpl_vars['ItemEditItem']['originationTimestamp']['Date_Day']; ?>
';
frm.elements['<?php echo $this->_smarty_vars['capture']['originationTimestampField']; ?>
[Date_Year]'].value = '<?php echo $this->_tpl_vars['ItemEditItem']['originationTimestamp']['Date_Year']; ?>
';
frm.elements['<?php echo $this->_smarty_vars['capture']['originationTimestampField']; ?>
[Time_Hour]'].value = '<?php echo $this->_tpl_vars['ItemEditItem']['originationTimestamp']['Time_Hour']; ?>
';
frm.elements['<?php echo $this->_smarty_vars['capture']['originationTimestampField']; ?>
[Time_Minute]'].value = '<?php echo $this->_tpl_vars['ItemEditItem']['originationTimestamp']['Time_Minute']; ?>
';
frm.elements['<?php echo $this->_smarty_vars['capture']['originationTimestampField']; ?>
[Time_Second]'].value = '<?php echo $this->_tpl_vars['ItemEditItem']['originationTimestamp']['Time_Second']; ?>
';
}
// ]]>
</script>
<p>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Use the original capture date and time from file information (e.g. Exif tag):"), $this);?>

<br/>
<a href="#" onclick="setOriginationTimestamp();return false">
<?php echo $this->_reg_objects['g'][0]->date(array('timestamp' => $this->_tpl_vars['ItemEditItem']['originationTimestamp']['timestamp'],'style' => 'datetime'), $this);?>

</a>
</p>
<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['form']['error']['originationTimestamp']['invalid'] )): ?>
<div class="giError">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'You must enter a valid date and time'), $this);?>

</div>
<?php endif; ?>
</div>
<?php if ($this->_tpl_vars['ItemEditItem']['can']['editThumbnail']): ?>
<div class="gbBlock">
<h3> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Thumbnail'), $this);?>
 </h3>
<p class="giDescription">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Set the size of the thumbnail.  The largest side of the thumbnail will be no larger than this value. Leave this field blank if you don't want a thumbnail."), $this);?>

</p>
<?php if ($this->_tpl_vars['ItemEditItem']['can']['createThumbnail']): ?>
<input type="text" size="6"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[thumbnail][size]"), $this);?>
" value="<?php echo $this->_tpl_vars['form']['thumbnail']['size']; ?>
"/>
<?php else: ?>
<b>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "There are no graphics toolkits enabled that support this type of item, so we cannot create or modify a thumbnail."), $this);?>

<?php if ($this->_tpl_vars['user']['isAdmin']): ?>
<a href="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.SiteAdmin",'arg2' => "subView=core.AdminPlugins"), $this);?>
">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'site admin'), $this);?>

</a>
<?php endif; ?>
</b>
<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['form']['error']['thumbnail']['size']['invalid'] )): ?>
<div class="giError">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "You must enter a number (greater than zero)"), $this);?>

</div>
<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['form']['error']['thumbnail']['create'] )): ?>
<div class="giError">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Unable to create a thumbnail for this item'), $this);?>

</div>
<?php endif; ?>
</div>
<?php endif; ?>
<?php $_from = $this->_tpl_vars['ItemEdit']['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['option']):
?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "gallery:".($this->_tpl_vars['option']['file']), 'smarty_include_vars' => array('l10Domain' => $this->_tpl_vars['option']['l10Domain'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endforeach; endif; unset($_from); ?>
<div class="gbBlock gcBackground1">
<input type="submit" class="inputTypeSubmit"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][save]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Save'), $this);?>
"/>
<input type="submit" class="inputTypeSubmit"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][undo]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Reset'), $this);?>
"/>
</div>