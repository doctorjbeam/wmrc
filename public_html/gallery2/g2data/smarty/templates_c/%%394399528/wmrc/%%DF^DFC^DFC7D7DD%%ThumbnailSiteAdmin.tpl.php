<?php /* Smarty version 2.6.20, created on 2010-03-31 21:15:00
         compiled from gallery:modules/thumbnail/templates/ThumbnailSiteAdmin.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'gallery:modules/thumbnail/templates/ThumbnailSiteAdmin.tpl', 56, false),)), $this); ?>
<div class="gbBlock gcBackground1">
<h2> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Thumbnail Manager'), $this);?>
 </h2>
</div>
<?php if (! empty ( $this->_tpl_vars['status'] )): ?>
<div class="gbBlock"><h2 class="giSuccess">
<?php if (isset ( $this->_tpl_vars['status']['add'] )): ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'New image added successfully'), $this);?>

<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['status']['addMime'] )): ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'New setting added successfully'), $this);?>

<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['status']['delete'] )): ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Image deleted successfully'), $this);?>

<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['status']['deleteMime'] )): ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Setting deleted successfully'), $this);?>

<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['status']['mime_duplicate'] )): ?>
<span class="giError"><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Mime type already assigned'), $this);?>
</span>
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['status']['mime_error'] )): ?>
<span class="giError"><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Missing mime type'), $this);?>
</span>
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['status']['file_error'] )): ?>
<span class="giError"><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Missing image file'), $this);?>
</span>
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['status']['imagemime_error'] )): ?>
<span class="giError"><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Thumbnail image must be a JPEG'), $this);?>
</span>
<?php endif; ?>
</h2></div>
<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['form']['badMime'] )): ?>
<div class="gbBlock">
<p class="giError">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Warning: Other modules provide thumbnail support for some types.  Remove settings below for these mime types to ensure other modules are used:"), $this);?>

<?php $_from = $this->_tpl_vars['form']['badMime']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['mime']):
?><?php echo $this->_tpl_vars['mime']; ?>
 <?php endforeach; endif; unset($_from); ?>
</p>
</div>
<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['form']['list'] )): ?>
<div class="gbBlock">
<p class="giDescription">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "The thumbnail images shown below will be used for new items added to Gallery with the listed mime types."), $this);?>

</p>
<table class="gbDataTable"><tr>
<th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Mime Types'), $this);?>
 </th>
<th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'File'), $this);?>
 </th>
<th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Image'), $this);?>
 </th>
<th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Action'), $this);?>
 </th>
</tr>
<?php $_from = $this->_tpl_vars['form']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<tr class="<?php echo smarty_function_cycle(array('values' => "gbEven,gbOdd"), $this);?>
">
<td>
<?php if (count ( $this->_tpl_vars['item']['itemMimeTypesList'] ) > 1): ?>
<table cellspacing="0">
<?php $_from = $this->_tpl_vars['item']['itemMimeTypesList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['mime']):
?>
<tr class="<?php echo smarty_function_cycle(array('values' => "gbEven,gbOdd"), $this);?>
">
<td>
<?php echo $this->_tpl_vars['mime']; ?>
<?php if (isset ( $this->_tpl_vars['form']['mimeMap'][$this->_tpl_vars['mime']] )): ?> (<?php echo $this->_tpl_vars['form']['mimeMap'][$this->_tpl_vars['mime']]; ?>
)<?php endif; ?>
</td><td>
<a href="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "controller=thumbnail.ThumbnailSiteAdmin",'arg2' => "form[action][delete]=1",'arg3' => "form[delete][itemId]=".($this->_tpl_vars['item']['id']),'arg4' => "form[delete][mimeType]=".($this->_tpl_vars['mime'])), $this);?>
"><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'delete'), $this);?>
</a>
</td>
</tr>
<?php endforeach; endif; unset($_from); ?>
</table>
<?php else: ?>
<?php echo $this->_tpl_vars['item']['itemMimeTypesList']['0']; ?>

<?php endif; ?>
</td><td>
<?php echo $this->_tpl_vars['item']['fileName']; ?>

</td><td>
<?php echo $this->_reg_objects['g'][0]->image(array('item' => $this->_tpl_vars['item'],'image' => $this->_tpl_vars['item'],'maxSize' => 150), $this);?>

</td><td>
<a href="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "controller=thumbnail.ThumbnailSiteAdmin",'arg2' => "form[action][delete]=1",'arg3' => "form[delete][itemId]=".($this->_tpl_vars['item']['id'])), $this);?>
"
onclick="return confirm('<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Delete this image?"), $this);?>
\n<?php echo $this->_reg_objects['g'][0]->text(array('text' => "(Will not remove thumbnails from existing items using this image, but those items will be unable to rebuild thumbs)"), $this);?>
')">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'delete'), $this);?>

</a>
</td>
</tr>
<?php endforeach; endif; unset($_from); ?>
<?php $_from = $this->_tpl_vars['form']['operationSupport']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['module'] => $this->_tpl_vars['mimeTypes']):
?>
<tr>
<td>
<?php $_from = $this->_tpl_vars['mimeTypes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['mime']):
?>
<?php echo $this->_tpl_vars['mime']; ?>
<?php if (isset ( $this->_tpl_vars['form']['mimeMap'][$this->_tpl_vars['mime']] )): ?> (<?php echo $this->_tpl_vars['form']['mimeMap'][$this->_tpl_vars['mime']]; ?>
)<?php endif; ?><br/>
<?php endforeach; endif; unset($_from); ?>
</td><td colspan="3">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Thumbnail support provided by module:"), $this);?>
 <?php echo $this->_tpl_vars['module']; ?>

</td>
</tr>
<?php endforeach; endif; unset($_from); ?>
</table>
</div>
<?php endif; ?>
<div class="gbBlock">
<h3> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'New Setting'), $this);?>
 </h3>
<p class="giDescription" style="margin-bottom:10px">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Images do not need to be thumbnail size; they will be resized as needed."), $this);?>

</p>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Default thumbnail for mime type:"), $this);?>

<input type="text" size="30" name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[mimeType]"), $this);?>
"/>
<br/>
<select name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[blah]"), $this);?>
"
onchange="this.form['<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[mimeType]"), $this);?>
'].value=this.value;this.selectedIndex=0;this.blur()">
<option value=""><?php echo $this->_reg_objects['g'][0]->text(array('text' => "&laquo; Choose type or enter above &raquo;"), $this);?>
</option>
<?php $_from = $this->_tpl_vars['form']['mimeMap']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['mime'] => $this->_tpl_vars['extlist']):
?>
<option value="<?php echo $this->_tpl_vars['mime']; ?>
"><?php echo $this->_tpl_vars['mime']; ?>
 (<?php echo $this->_tpl_vars['extlist']; ?>
)</option>
<?php endforeach; endif; unset($_from); ?>
</select>
<br/>
<table><tr>
<td style="padding-left:10px">
<input type="<?php if (! empty ( $this->_tpl_vars['form']['list'] )): ?>radio<?php else: ?>hidden<?php endif; ?>" id="rbNew"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[image]"), $this);?>
" value="new"/>
<label for="rbNew">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "New jpeg file:"), $this);?>

</label>
</td><td>
<input type="file" size="45" name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[1]"), $this);?>
"/>
</td>
</tr>
<?php if (! empty ( $this->_tpl_vars['form']['list'] )): ?>
<tr>
<td style="padding-left:10px">
<input type="radio" id="rbOld" checked="checked"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[image]"), $this);?>
" value="old"/>
<label for="rbOld">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Existing image:"), $this);?>

</label>
</td><td>
<select name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[oldimage]"), $this);?>
">
<?php $_from = $this->_tpl_vars['form']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<option value="<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['item']['fileName']; ?>
</option>
<?php endforeach; endif; unset($_from); ?>
</select>
</td>
</tr>
<?php endif; ?>
</table>
</div>
<div class="gbBlock gcBackground1">
<input type="submit" class="inputTypeSubmit"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][add]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Save'), $this);?>
"/>
</div>