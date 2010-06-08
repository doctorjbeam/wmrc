<?php /* Smarty version 2.6.20, created on 2010-03-31 21:15:05
         compiled from gallery:modules/squarethumb/templates/SquareThumbSiteAdmin.tpl */ ?>
<div class="gbBlock gcBackground1">
<h2> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Square Thumbnails'), $this);?>
 </h2>
</div>
<?php if (isset ( $this->_tpl_vars['status']['saved'] )): ?>
<div class="gbBlock"><h2 class="giSuccess">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Settings saved successfully'), $this);?>

</h2></div>
<?php endif; ?>
<div class="gbBlock">
<table class="gbDataTable"><tr>
<td>
<input type="radio" id="rbCrop" name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[mode]"), $this);?>
" value="crop"
<?php if ($this->_tpl_vars['form']['mode'] == 'crop'): ?>checked="checked"<?php endif; ?>/>
</td>
<td>
<label for="rbCrop">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Crop images to square'), $this);?>

</label>
</td>
</tr><tr>
<td>
<input type="radio" id="rbFit" name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[mode]"), $this);?>
" value="fit"
<?php if ($this->_tpl_vars['form']['mode'] == 'fit'): ?>checked="checked"<?php endif; ?>
<?php if (! $this->_tpl_vars['form']['allowFitToSquareMode']): ?> disabled="disabled"<?php endif; ?>/>
</td>
<td>
<?php if (! $this->_tpl_vars['form']['allowFitToSquareMode']): ?>
<div class="giWarning">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "You need to enable a graphics toolkit module with PPM support to use the \"fit images to square\" mode."), $this);?>

</div>
<?php endif; ?>
<label for="rbFit">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Fit images to square, padding with background color:"), $this);?>

</label>
<input type="text" size="6" name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[color]"), $this);?>
" value="<?php echo $this->_tpl_vars['form']['color']; ?>
"
<?php if (! $this->_tpl_vars['form']['allowFitToSquareMode']): ?> disabled="disabled"<?php endif; ?>/>
<?php if (isset ( $this->_tpl_vars['form']['error']['color']['missing'] )): ?>
<div class="giError">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Color value missing'), $this);?>

</div>
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['form']['error']['color']['invalid'] )): ?>
<span class="giError">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Color value invalid'), $this);?>

</span>
<?php endif; ?>
</td>
</tr></table>
<p class="giDescription">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Background color is in RGB hex format; 000000 is black, FFFFFF is white."), $this);?>

</p>
</div>
<div class="gbBlock gcBackground1">
<input type="submit" class="inputTypeSubmit"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][save]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Save'), $this);?>
"/>
<input type="submit" class="inputTypeSubmit"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][reset]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Reset'), $this);?>
"/>
</div>