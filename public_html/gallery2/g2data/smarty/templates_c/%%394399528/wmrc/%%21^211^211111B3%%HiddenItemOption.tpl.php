<?php /* Smarty version 2.6.20, created on 2010-03-31 20:38:36
         compiled from gallery:modules/hidden/templates/HiddenItemOption.tpl */ ?>
<div class="gbBlock">
<h3> <?php echo $this->_tpl_vars['form']['HiddenItemOption']['heading']; ?>
 </h3>
<p class="giDescription">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Hidden items are not visible to guest users until the page for the item is accessed directly."), $this);?>

<?php if ($this->_tpl_vars['form']['HiddenItemOption']['isAlbum']): ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Contents of hidden albums are restricted until the URL for the album is visited."), $this);?>

<?php endif; ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Note that guests need permission to view resizes and/or original items, as visiting the direct URL grants only simple view permission; access to resizes/originals is still controlled by item permissions."), $this);?>

</p>
<input type="checkbox" id="HiddenItem_cb"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[HiddenItemOption][setHidden]"), $this);?>
"
<?php if (( $this->_tpl_vars['form']['HiddenItemOption']['isHidden'] )): ?>checked="checked"<?php endif; ?>/>
<label for="HiddenItem_cb">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Hidden'), $this);?>

</label>
<?php if ($this->_tpl_vars['form']['HiddenItemOption']['isAlbum']): ?>
<input type="hidden" name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[HiddenItemOption][progressBar]"), $this);?>
"
value="<?php if ($this->_tpl_vars['form']['HiddenItemOption']['isHidden']): ?>un<?php endif; ?>hide"/>
<?php endif; ?>
</div>