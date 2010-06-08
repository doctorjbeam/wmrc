<?php /* Smarty version 2.6.20, created on 2010-03-31 21:18:28
         compiled from gallery:modules/permalinks/templates/PermalinksOption.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'gallery:modules/permalinks/templates/PermalinksOption.tpl', 20, false),)), $this); ?>
<div class="gbBlock">
<h3> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Permalinks'), $this);?>
 </h3>
<p class="giDescription">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Edit the permalinks that refer to this item. You can add or delete permalinks."), $this);?>

</p>
<?php if (empty ( $this->_tpl_vars['PermalinksOption']['aliases'] )): ?>
<p> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'You have no permalinks'), $this);?>
 </p>
<?php else: ?>
<p> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Existing permalinks'), $this);?>
 </p>
<table class="gbDataTable">
<tr>
<th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Delete'), $this);?>
 </th>
<th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Permalink name'), $this);?>
 </th>
</tr>
<?php $_from = $this->_tpl_vars['PermalinksOption']['aliases']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name']):
?>
<tr class="<?php echo smarty_function_cycle(array('values' => "gbEven,gbOdd"), $this);?>
">
<td><input type="checkbox"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[PermalinksOption][delete][".($this->_tpl_vars['name'])."]"), $this);?>
"></td>
<td><?php echo $this->_tpl_vars['name']; ?>
</td>
</tr>
<?php endforeach; endif; unset($_from); ?>
</table>
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['form']['error']['PermalinksOption']['exists'] )): ?>
<div class="giError">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Permalink '%s' already exists, possibly on another item",'arg1' => $this->_tpl_vars['form']['PermalinksOption']['aliasName']), $this);?>

</div>
<?php endif; ?>
<p><label for="Permalinks_aliasname"> <?php echo $this->_reg_objects['g'][0]->text(array('text' => "Add a new permalink:"), $this);?>
 </label>
<input type="text" name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[PermalinksOption][aliasName]"), $this);?>
"
id="Permalinks_aliasname" />
<a onclick="document.forms['itemAdminForm'].Permalinks_aliasname.value='<?php echo $this->_tpl_vars['ItemAdmin']['item']['pathComponent']; ?>
'">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Set to '%s'",'arg1' => ($this->_tpl_vars['ItemAdmin']['item']['pathComponent'])), $this);?>
</a>
</p>
</div>