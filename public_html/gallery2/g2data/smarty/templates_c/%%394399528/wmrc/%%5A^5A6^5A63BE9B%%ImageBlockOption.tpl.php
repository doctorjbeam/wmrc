<?php /* Smarty version 2.6.20, created on 2010-03-31 20:38:52
         compiled from gallery:modules/imageblock/templates/ImageBlockOption.tpl */ ?>
<div class="gbBlock">
<h3> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Image Block'), $this);?>
 </h3>
<input type="checkbox" id="ImageBlockOption_setDisabled"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[ImageBlockOption][setDisabled]"), $this);?>
"
<?php if ($this->_tpl_vars['form']['ImageBlockOption']['setDisabled']): ?> checked="checked"<?php endif; ?>/>
<label for="ImageBlockOption_setDisabled">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Prevent this album from being displayed in the Image Block'), $this);?>

</label>
<br/>
<input type="checkbox" id="ImageBlockOption_setRecursive" checked="checked"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[ImageBlockOption][setRecursive]"), $this);?>
"/>
<label for="ImageBlockOption_setRecursive">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Apply ImageBlock settings to sub-albums"), $this);?>

</label>
</div>