<?php /* Smarty version 2.6.20, created on 2010-03-31 20:50:51
         compiled from gallery:modules/randomhighlight/templates/RandomHighlightOption.tpl */ ?>
<div class="gbBlock">
<h3> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Random Highlight'), $this);?>
 </h3>
<input type="checkbox" id="RandomHighlight_cb"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[RandomHighlightOption][isRandomHighlight]"), $this);?>
"
<?php if ($this->_tpl_vars['form']['RandomHighlightOption']['isRandomHighlight']): ?> checked="checked"<?php endif; ?>/>
<label for="RandomHighlight_cb">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Activate random highlight for this album'), $this);?>

</label>
</div>