<?php /* Smarty version 2.6.20, created on 2010-04-19 07:12:00
         compiled from gallery:modules/permalinks/templates/PermalinksSiteAdmin.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'gallery:modules/permalinks/templates/PermalinksSiteAdmin.tpl', 33, false),)), $this); ?>
<div class="gbBlock gcBackground1">
<h3> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Permalinks'), $this);?>
 </h3>
</div>
<?php if (isset ( $this->_tpl_vars['status']['PermalinksSiteAdmin']['success'] )): ?>
<div class="gbBlock">
<h2 class="giSuccess"><?php echo $this->_tpl_vars['status']['PermalinksSiteAdmin']['success']; ?>
</h2>
</div>
<?php endif; ?>
<div class="gbBlock">
<h3> <?php echo $this->_reg_objects['g'][0]->text(array('text' => "Auto-permalink"), $this);?>
 </h3>
<p class="giDescription">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "If you use this feature, any time a new album is created, a permalink to it with the name of the album will be created, unless a permalink by the same name already exists. You will be able to remove the permalink if you wish."), $this);?>

</p>
<p><input type="checkbox" name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[PermalinksSiteAdmin][autoPermalink]"), $this);?>
"
id="Permalinks_autoPermalink" <?php if ($this->_tpl_vars['PermalinksSiteAdmin']['autoPermalink']): ?> checked=true <?php endif; ?>/>
<label for="Permalinks_autoPermalink"> <?php echo $this->_reg_objects['g'][0]->text(array('text' => "Enable auto-permalink"), $this);?>
 </label></p>
</div>
<div class="gbBlock">
<h3> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Global list of permalinks'), $this);?>
 </h3>
<?php if (empty ( $this->_tpl_vars['PermalinksSiteAdmin']['aliases'] )): ?>
<p> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'You have no permalinks'), $this);?>
 </p>
<?php else: ?>
<table class="gbDataTable">
<tr>
<th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Delete'), $this);?>
 </th>
<th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Permalink name'), $this);?>
 </th>
</tr>
<?php $_from = $this->_tpl_vars['PermalinksSiteAdmin']['aliases']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name']):
?>
<tr class="<?php echo smarty_function_cycle(array('values' => "gbEven,gbOdd"), $this);?>
">
<td><input type="checkbox" name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[PermalinksSiteAdmin][delete][".($this->_tpl_vars['name'])."]"), $this);?>
"></td>
<td><?php echo $this->_tpl_vars['name']; ?>
</td>
</tr>
<?php endforeach; endif; unset($_from); ?>
</table>
<?php endif; ?>
</div>
<div class="gbBlock gcBackground1">
<input type="submit" class="inputTypeSubmit"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][submit]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Save'), $this);?>
" />
</div>