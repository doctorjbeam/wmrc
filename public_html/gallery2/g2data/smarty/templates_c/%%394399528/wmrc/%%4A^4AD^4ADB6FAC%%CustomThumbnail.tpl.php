<?php /* Smarty version 2.6.20, created on 2010-03-31 20:38:36
         compiled from gallery:modules/thumbnail/templates/CustomThumbnail.tpl */ ?>
<div class="gbBlock">
<h3> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Custom Thumbnail'), $this);?>
 </h3>
<p class="giDescription">
<?php if (isset ( $this->_tpl_vars['CustomThumbnailOption']['thumbnail'] )): ?>
<input type="checkbox" id="CustomThumbnailOption_delete"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[CustomThumbnailOption][delete]"), $this);?>
"/>
<label for="CustomThumbnailOption_delete">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Remove custom thumbnail for this item'), $this);?>

</label>
</p>
<?php else: ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Upload a JPEG image to use as the thumbnail for this item."), $this);?>
 <br/>
<?php if ($this->_tpl_vars['CustomThumbnailOption']['canResize']): ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Image does not need to be thumbnail size; it will be resized as needed."), $this);?>

<?php else: ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "No toolkit available for resizing so uploaded image must be thumbnail sized."), $this);?>

<?php endif; ?>
</p>
<input type="file" size="45" name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[1]"), $this);?>
"/>
<?php if (! empty ( $this->_tpl_vars['form']['CustomThumbnailOption']['error']['missingFile'] )): ?>
<div class="giError">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Missing image file'), $this);?>

</div>
<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['form']['CustomThumbnailOption']['error']['imageMime'] )): ?>
<div class="giError">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Thumbnail image must be a JPEG'), $this);?>

</div>
<?php endif; ?>
<?php endif; ?>
</div>