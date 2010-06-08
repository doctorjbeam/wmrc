<?php /* Smarty version 2.6.20, created on 2010-04-15 01:02:50
         compiled from gallery:modules/core/templates/ItemPermissions.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'gallery:modules/core/templates/ItemPermissions.tpl', 98, false),array('function', 'html_options', 'gallery:modules/core/templates/ItemPermissions.tpl', 135, false),)), $this); ?>
<div class="gbBlock gcBackground1">
<h2> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Permissions'), $this);?>
 </h2>
</div>
<?php if (! empty ( $this->_tpl_vars['status'] )): ?>
<div class="gbBlock"><h2 class="giSuccess">
<?php if (isset ( $this->_tpl_vars['status']['changedOwner'] )): ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Owner changed successfully'), $this);?>

<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['status']['addedGroupPermission'] )): ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Group permission added successfully'), $this);?>

<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['status']['addedUserPermission'] )): ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'User permission added successfully'), $this);?>

<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['status']['deletedGroupPermission'] )): ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Group permission removed successfully'), $this);?>

<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['status']['deletedUserPermission'] )): ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'User permission removed successfully'), $this);?>

<?php endif; ?>
</h2></div>
<?php endif; ?>
<?php if ($this->_tpl_vars['ItemPermissions']['can']['changePermissions']): ?>
<div class="gbBlock">
<p class="giDescription">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Each item has its own independent set of permissions.  Changing the parent's permissions has no effect on the permissions of the child.  This allows you to restrict access to the parent of this item, but still grant full access to this item, or vice versa.  The most efficient way to use this permission system is to create groups and assign permissions to them.  Then if you want to grant permissions to a specific user, you can add (or remove) the user from the appropriate group."), $this);?>

</p>
</div>
<?php endif; ?>
<div class="gbBlock">
<h3> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Owner'), $this);?>
 </h3>
<p class="giDescription">
<?php if (empty ( $this->_tpl_vars['ItemPermissions']['owner']['fullName'] )): ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "This item is owned by user: %s",'arg1' => $this->_tpl_vars['ItemPermissions']['owner']['userName']), $this);?>

<?php else: ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "This item is owned by user: %s (%s)",'arg1' => $this->_tpl_vars['ItemPermissions']['owner']['userName'],'arg2' => $this->_tpl_vars['ItemPermissions']['owner']['fullName']), $this);?>

<?php endif; ?>
</p>
<?php if ($this->_tpl_vars['ItemPermissions']['can']['changeOwner']): ?>
<h4> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'New owner'), $this);?>
 </h4>
<input type="text" id="giFormUsername" autocomplete="off"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[owner][ownerName]"), $this);?>
" value="<?php echo $this->_tpl_vars['form']['owner']['ownerName']; ?>
"/>
<?php $this->_tag_stack[] = array('autoComplete', array('element' => 'giFormUsername'), $this); $_block_repeat=true; $this->_reg_objects['g'][0]->autoComplete($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>
<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.SimpleCallback",'arg2' => "command=lookupUsername",'arg3' => "prefix=__VALUE__",'htmlEntities' => false), $this);?>

<?php $_obj_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo $this->_reg_objects['g'][0]->autoComplete($this->_tag_stack[count($this->_tag_stack)-1][1], $_obj_block_content, $this, $_block_repeat);} array_pop($this->_tag_stack);?>

<input type="hidden" name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[serialNumber]"), $this);?>
" value="<?php echo $this->_tpl_vars['form']['serialNumber']; ?>
"/>
<input type="submit" class="inputTypeSubmit"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][changeOwner]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Change'), $this);?>
"/>
<?php if ($this->_tpl_vars['ItemPermissions']['can']['applyToSubItems']): ?>
<p class="giDescription">
<input type="checkbox" checked="checked"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[applyOwnerToSubItems]"), $this);?>
"
value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Apply new owner to sub-items"), $this);?>
"/>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Apply new owner to sub-items"), $this);?>

</p>
<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['form']['error']['owner']['missingUser'] )): ?>
<div class="giError">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'You must enter a user name'), $this);?>

</div>
<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['form']['error']['owner']['invalidUser'] )): ?>
<div class="giError">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'The user name you entered is invalid'), $this);?>

</div>
<?php endif; ?>
<?php endif; ?>
</div>
<?php if ($this->_tpl_vars['ItemPermissions']['can']['changePermissions'] && $this->_tpl_vars['ItemPermissions']['can']['applyToSubItems']): ?>
<div class="gbBlock">
<h3> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Apply changes'), $this);?>
 </h3>
<p class="giDescription">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "This item has sub-items.  The changes you make here can be applied to just this item, or you can apply them to all sub-items.  Note that applying changes to sub-items will merge your change into the existing permissions of the sub-items and may be very time consuming if you have many sub-items.  It's more efficient to grant permissions to groups and then add and remove users from groups whenever possible. Changes are applied to sub-items by default."), $this);?>

</p>
<input type="checkbox" checked="checked"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[applyToSubItems]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Apply to sub-items"), $this);?>
"/>
</div>
<?php endif; ?>
<div class="gbBlock">
<h3> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Group Permissions'), $this);?>
 </h3>
<table class="gbDataTable"><tr>
<th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Group name'), $this);?>
 </th>
<th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Permission'), $this);?>
 </th>
<?php if ($this->_tpl_vars['ItemPermissions']['can']['changePermissions']): ?>
<th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Action'), $this);?>
 </th>
<?php endif; ?>
</tr>
<?php if ($this->_tpl_vars['ItemPermissions']['groupPermissions']): ?>
<?php unset($this->_sections['group']);
$this->_sections['group']['name'] = 'group';
$this->_sections['group']['loop'] = is_array($_loop=$this->_tpl_vars['ItemPermissions']['groupPermissions']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['group']['show'] = true;
$this->_sections['group']['max'] = $this->_sections['group']['loop'];
$this->_sections['group']['step'] = 1;
$this->_sections['group']['start'] = $this->_sections['group']['step'] > 0 ? 0 : $this->_sections['group']['loop']-1;
if ($this->_sections['group']['show']) {
    $this->_sections['group']['total'] = $this->_sections['group']['loop'];
    if ($this->_sections['group']['total'] == 0)
        $this->_sections['group']['show'] = false;
} else
    $this->_sections['group']['total'] = 0;
if ($this->_sections['group']['show']):

            for ($this->_sections['group']['index'] = $this->_sections['group']['start'], $this->_sections['group']['iteration'] = 1;
                 $this->_sections['group']['iteration'] <= $this->_sections['group']['total'];
                 $this->_sections['group']['index'] += $this->_sections['group']['step'], $this->_sections['group']['iteration']++):
$this->_sections['group']['rownum'] = $this->_sections['group']['iteration'];
$this->_sections['group']['index_prev'] = $this->_sections['group']['index'] - $this->_sections['group']['step'];
$this->_sections['group']['index_next'] = $this->_sections['group']['index'] + $this->_sections['group']['step'];
$this->_sections['group']['first']      = ($this->_sections['group']['iteration'] == 1);
$this->_sections['group']['last']       = ($this->_sections['group']['iteration'] == $this->_sections['group']['total']);
?>
<?php $this->assign('entry', $this->_tpl_vars['ItemPermissions']['groupPermissions'][$this->_sections['group']['index']]); ?>
<?php $this->assign('index', $this->_sections['group']['iteration']); ?>
<tr class="<?php echo smarty_function_cycle(array('values' => "gbEven,gbOdd"), $this);?>
">
<td>
<?php echo $this->_tpl_vars['entry']['group']['groupName']; ?>

</td><td>
<?php echo $this->_tpl_vars['entry']['permission']['description']; ?>

</td>
<?php if ($this->_tpl_vars['ItemPermissions']['can']['changePermissions']): ?>
<td>
<?php if (! empty ( $this->_tpl_vars['entry']['deleteList'] )): ?>
<select name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[group][delete][".($this->_tpl_vars['index'])."]"), $this);?>
" size="1">
<?php $_from = $this->_tpl_vars['entry']['deleteList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['deleteEntry']):
?>
<option value="<?php echo $this->_tpl_vars['entry']['group']['id']; ?>
,<?php echo $this->_tpl_vars['deleteEntry']['id']; ?>
"<?php if (( $this->_tpl_vars['deleteEntry']['id'] == $this->_tpl_vars['entry']['permission']['id'] )): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['deleteEntry']['description']; ?>
</option>
<?php endforeach; endif; unset($_from); ?>
</select>
<input type="submit" class="inputTypeSubmit"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][deleteGroupPermission][".($this->_tpl_vars['index'])."]"), $this);?>
"
value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Remove'), $this);?>
"/>
<?php else: ?>
&nbsp;
<?php endif; ?>
</td>
<?php endif; ?>
</tr>
<?php endfor; endif; ?>
<?php endif; ?>
</table>
</div>
<?php if ($this->_tpl_vars['ItemPermissions']['can']['changePermissions']): ?>
<div class="gbBlock">
<h3> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'New Group Permission'), $this);?>
 </h3>
<input type="text" id="giFormGroupname" autocomplete="off"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[group][groupName]"), $this);?>
" value="<?php echo $this->_tpl_vars['form']['group']['groupName']; ?>
"/>
<?php $this->_tag_stack[] = array('autoComplete', array('element' => 'giFormGroupname'), $this); $_block_repeat=true; $this->_reg_objects['g'][0]->autoComplete($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>
<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.SimpleCallback",'arg2' => "command=lookupGroupname",'arg3' => "prefix=__VALUE__",'htmlEntities' => false), $this);?>

<?php $_obj_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo $this->_reg_objects['g'][0]->autoComplete($this->_tag_stack[count($this->_tag_stack)-1][1], $_obj_block_content, $this, $_block_repeat);} array_pop($this->_tag_stack);?>

<select name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[group][permission]"), $this);?>
" size="1">
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ItemPermissions']['allPermissions'],'selected' => $this->_tpl_vars['form']['group']['permission']), $this);?>

</select>
<input type="submit" class="inputTypeSubmit"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][addGroupPermission]"), $this);?>
"
value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Add Permission'), $this);?>
"/>
<?php if (! empty ( $this->_tpl_vars['form']['error']['group']['invalidPermission'] )): ?>
<div class="giError">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'The permission you chose is invalid'), $this);?>

</div>
<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['form']['error']['group']['missingGroup'] )): ?>
<div class="giError">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'You must enter a group name'), $this);?>

</div>
<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['form']['error']['group']['invalidGroup'] )): ?>
<div class="giError">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'The group name you entered is invalid'), $this);?>

</div>
<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['form']['error']['group']['alreadyHadPermission'] )): ?>
<div class="giError">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Group already has this permission (check sub-permissions)"), $this);?>

</div>
<?php endif; ?>
</div>
<?php endif; ?>
<div class="gbBlock">
<h3> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'User Permissions'), $this);?>
 </h3>
<table class="gbDataTable"><tr>
<th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'User name'), $this);?>
 </th>
<th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Permission'), $this);?>
 </th>
<?php if ($this->_tpl_vars['ItemPermissions']['can']['changePermissions']): ?>
<th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Action'), $this);?>
 </th>
<?php endif; ?>
</tr>
<?php if ($this->_tpl_vars['ItemPermissions']['userPermissions']): ?>
<?php unset($this->_sections['user']);
$this->_sections['user']['name'] = 'user';
$this->_sections['user']['loop'] = is_array($_loop=$this->_tpl_vars['ItemPermissions']['userPermissions']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['user']['show'] = true;
$this->_sections['user']['max'] = $this->_sections['user']['loop'];
$this->_sections['user']['step'] = 1;
$this->_sections['user']['start'] = $this->_sections['user']['step'] > 0 ? 0 : $this->_sections['user']['loop']-1;
if ($this->_sections['user']['show']) {
    $this->_sections['user']['total'] = $this->_sections['user']['loop'];
    if ($this->_sections['user']['total'] == 0)
        $this->_sections['user']['show'] = false;
} else
    $this->_sections['user']['total'] = 0;
if ($this->_sections['user']['show']):

            for ($this->_sections['user']['index'] = $this->_sections['user']['start'], $this->_sections['user']['iteration'] = 1;
                 $this->_sections['user']['iteration'] <= $this->_sections['user']['total'];
                 $this->_sections['user']['index'] += $this->_sections['user']['step'], $this->_sections['user']['iteration']++):
$this->_sections['user']['rownum'] = $this->_sections['user']['iteration'];
$this->_sections['user']['index_prev'] = $this->_sections['user']['index'] - $this->_sections['user']['step'];
$this->_sections['user']['index_next'] = $this->_sections['user']['index'] + $this->_sections['user']['step'];
$this->_sections['user']['first']      = ($this->_sections['user']['iteration'] == 1);
$this->_sections['user']['last']       = ($this->_sections['user']['iteration'] == $this->_sections['user']['total']);
?>
<?php $this->assign('entry', $this->_tpl_vars['ItemPermissions']['userPermissions'][$this->_sections['user']['index']]); ?>
<?php $this->assign('index', $this->_sections['user']['iteration']); ?>
<tr class="<?php echo smarty_function_cycle(array('values' => "gbEven,gbOdd"), $this);?>
">
<td>
<?php echo $this->_tpl_vars['entry']['user']['userName']; ?>

</td><td>
<?php echo $this->_tpl_vars['entry']['permission']['description']; ?>

</td>
<?php if ($this->_tpl_vars['ItemPermissions']['can']['changePermissions']): ?>
<td>
<?php if (! empty ( $this->_tpl_vars['entry']['deleteList'] )): ?>
<select name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[user][delete][".($this->_tpl_vars['index'])."]"), $this);?>
" size="1">
<?php $_from = $this->_tpl_vars['entry']['deleteList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['deleteEntry']):
?>
<option value="<?php echo $this->_tpl_vars['entry']['user']['id']; ?>
,<?php echo $this->_tpl_vars['deleteEntry']['id']; ?>
"<?php if (( $this->_tpl_vars['deleteEntry']['id'] == $this->_tpl_vars['entry']['permission']['id'] )): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['deleteEntry']['description']; ?>
</option>
<?php endforeach; endif; unset($_from); ?>
</select>
<input type="submit" class="inputTypeSubmit"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][deleteUserPermission][".($this->_tpl_vars['index'])."]"), $this);?>
"
value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Remove'), $this);?>
"/>
<?php else: ?>
&nbsp;
<?php endif; ?>
</td>
<?php endif; ?>
</tr>
<?php endfor; endif; ?>
<?php endif; ?>
</table>
</div>
<?php if ($this->_tpl_vars['ItemPermissions']['can']['changePermissions']): ?>
<div class="gbBlock">
<h3> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'New User Permission'), $this);?>
 </h3>
<input type="text" id="giFormUsername2" class="giFormUsername" autocomplete="off"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[user][userName]"), $this);?>
" value="<?php echo $this->_tpl_vars['form']['user']['userName']; ?>
"/>
<?php $this->_tag_stack[] = array('autoComplete', array('element' => 'giFormUsername2'), $this); $_block_repeat=true; $this->_reg_objects['g'][0]->autoComplete($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>
<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.SimpleCallback",'arg2' => "command=lookupUsername",'arg3' => "prefix=__VALUE__",'htmlEntities' => false), $this);?>

<?php $_obj_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo $this->_reg_objects['g'][0]->autoComplete($this->_tag_stack[count($this->_tag_stack)-1][1], $_obj_block_content, $this, $_block_repeat);} array_pop($this->_tag_stack);?>

<select name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[user][permission]"), $this);?>
" size="1">
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ItemPermissions']['allPermissions'],'selected' => $this->_tpl_vars['form']['user']['permission']), $this);?>

</select>
<input type="submit" class="inputTypeSubmit"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][addUserPermission]"), $this);?>
"
value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Add Permission'), $this);?>
"/>
<?php if (! empty ( $this->_tpl_vars['form']['error']['user']['invalidPermission'] )): ?>
<div class="giError">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'The permission you chose is invalid'), $this);?>

</div>
<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['form']['error']['user']['missingUser'] )): ?>
<div class="giError">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'You must enter a user name'), $this);?>

</div>
<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['form']['error']['user']['invalidUser'] )): ?>
<div class="giError">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'The user name you entered is invalid'), $this);?>

</div>
<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['form']['error']['user']['alreadyHadPermission'] )): ?>
<div class="giError">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "The user already has this permission (check sub-permissions)"), $this);?>

</div>
<?php endif; ?>
</div>
<?php endif; ?>