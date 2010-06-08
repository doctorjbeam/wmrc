<?php /* Smarty version 2.6.20, created on 2010-03-31 22:23:07
         compiled from gallery:modules/core/templates/ItemReorder.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'gallery:modules/core/templates/ItemReorder.tpl', 31, false),)), $this); ?>
<div class="gbBlock gcBackground1">
<h2> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Reorder Album'), $this);?>
 </h2>
</div>
<?php if (isset ( $this->_tpl_vars['status']['saved'] )): ?>
<div class="gbBlock"><h2 class="giSuccess">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Order saved successfully'), $this);?>

</h2></div>
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['ItemReorder']['show']['automaticOrderMessage'] )): ?>
<div class="gbBlock">
<p class="giDescription">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "This album has an automatic sort order specified, so you cannot change the order of items manually.  You must remove the automatic sort order to continue."), $this);?>

<a href="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.ItemAdmin",'arg2' => "subView=core.ItemEdit",'arg3' => "itemEditPlugin=core.ItemEditAlbum",'arg4' => "itemId=".($this->_tpl_vars['ItemAdmin']['item']['id'])), $this);?>
">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'change'), $this);?>

</a>
</p>
</div>
<?php else: ?>
<div class="gbBlock">
<p class="giDescription">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Change the order of the items in this album."), $this);?>

</p>
<h4> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Move this item'), $this);?>
 </h4>
<select name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[selectedId]"), $this);?>
">
<?php $_from = $this->_tpl_vars['ItemReorder']['peers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['peer']):
?>
<option value="<?php echo $this->_tpl_vars['peer']['id']; ?>
"> <?php echo ((is_array($_tmp=@$this->_tpl_vars['peer']['title'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['peer']['pathComponent']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['peer']['pathComponent'])); ?>
 </option>
<?php endforeach; endif; unset($_from); ?>
</select>
<select name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[placement]"), $this);?>
">
<option value="before"> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'before'), $this);?>
 </option>
<option value="after"> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'after'), $this);?>
 </option>
</select>
<select name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[targetId]"), $this);?>
">
<?php $_from = $this->_tpl_vars['ItemReorder']['peers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['peer']):
?>
<option value="<?php echo $this->_tpl_vars['peer']['id']; ?>
"> <?php echo ((is_array($_tmp=@$this->_tpl_vars['peer']['title'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['peer']['pathComponent']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['peer']['pathComponent'])); ?>
 </option>
<?php endforeach; endif; unset($_from); ?>
</select>
</div>
<div class="gbBlock gcBackground1">
<input type="submit" class="inputTypeSubmit"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][reorder]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Reorder'), $this);?>
"/>
<input type="submit" class="inputTypeSubmit"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][cancel]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Cancel'), $this);?>
"/>
</div>
<?php endif; ?>