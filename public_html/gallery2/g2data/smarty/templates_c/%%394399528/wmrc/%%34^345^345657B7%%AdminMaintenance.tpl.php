<?php /* Smarty version 2.6.20, created on 2010-04-19 07:11:36
         compiled from gallery:modules/core/templates/AdminMaintenance.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'gallery:modules/core/templates/AdminMaintenance.tpl', 85, false),)), $this); ?>
<div class="gbBlock gcBackground1">
<h2> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'System Maintenance'), $this);?>
 </h2>
</div>
<?php if (isset ( $this->_tpl_vars['form']['error']['maintenanceModeRequired'] )): ?>
<div class="gbBlock">
<h2 class="giError">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Gallery must be in maintenance mode before the task can be run."), $this);?>

</h2>
</div>
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['status']['run'] )): ?>
<div class="gbBlock">
<?php ob_start(); ?><b><?php echo $this->_reg_objects['g'][0]->text(array('text' => $this->_tpl_vars['AdminMaintenance']['tasks'][$this->_tpl_vars['status']['run']['taskId']]['title'],'l10Domain' => $this->_tpl_vars['AdminMaintenance']['tasks'][$this->_tpl_vars['status']['run']['taskId']]['l10Domain']), $this);?>
</b><?php $this->_smarty_vars['capture']['taskTitle'] = ob_get_contents(); ob_end_clean(); ?>
<?php if (( $this->_tpl_vars['status']['run']['success'] )): ?>
<h2 class="giSuccess">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Completed %s task successfully.",'arg1' => $this->_smarty_vars['capture']['taskTitle']), $this);?>

</h2>
<?php else: ?>
<h2 class="giError">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "The %s task failed to complete successfully.",'arg1' => $this->_smarty_vars['capture']['taskTitle']), $this);?>

</h2>
<?php endif; ?>
</div>
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['status']['setMode'] )): ?>
<div class="gbBlock">
<h2 class="giSuccess">
<?php if (isset ( $this->_tpl_vars['status']['setMode']['setOn'] )): ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Maintenance Mode has been turned on."), $this);?>

<?php elseif (isset ( $this->_tpl_vars['status']['setMode']['setOff'] )): ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Maintenance Mode has been turned off."), $this);?>

<?php endif; ?>
</h2>
</div>
<?php endif; ?>
<div class="gbBlock">
<table class="gbDataTable" width="100%">
<tr>
<td>
<h4><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Maintenance Mode'), $this);?>
</h4>
</td><td align="left" valign="bottom">
<input type="checkbox" <?php if ($this->_tpl_vars['AdminMaintenance']['setMode']['mode']): ?>checked="checked" <?php endif; ?>
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[setMode][mode]"), $this);?>
"
onclick="BlockToggle('setMode-maintenance-url', 'not needed', 'table-row')"/>
</td>
<td>
<p class="giDescription">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Restrict user access to the system while maintenance is being performed."), $this);?>

</p>
</td>
</tr>
<tr id="setMode-maintenance-url" <?php if (! $this->_tpl_vars['AdminMaintenance']['setMode']['mode']): ?>style="display: none"<?php endif; ?>>
<td colspan="3">
<h4><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Maintenance Mode Url'), $this);?>
</h4>
<p class="giDescription">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "The Maintenance Mode Url specifies where requests will be redirected when access to the site has been restricted by the administrator."), $this);?>

<?php echo $this->_reg_objects['g'][0]->text(array('text' => "If left blank Gallery will display a default page with an administrator login link. This page will be themed when the code base is up to date, otherwise it will display a plain unstyled page."), $this);?>

<br/>
<i><?php echo $this->_reg_objects['g'][0]->text(array('text' => "For example: /maintenance.html"), $this);?>
</i>
</p>
<input type="text" size="60"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[setMode][url]"), $this);?>
" value="<?php echo $this->_tpl_vars['AdminMaintenance']['setMode']['url']; ?>
"
id="giFormPath"/>
</td>
</tr></table>
</div>
<div class="gbBlock gcBackground1">
<input type="submit" class="inputTypeSubmit"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][setMode]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Set'), $this);?>
"/>
</div>
<div class="gbBlock">
<table class="gbDataTable" width="100%">
<tr>
<th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Task name'), $this);?>
 </th>
<th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Last run'), $this);?>
 </th>
<th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => "Success/Fail"), $this);?>
 </th>
<th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Action'), $this);?>
 </th>
</tr>
<?php $_from = $this->_tpl_vars['AdminMaintenance']['tasks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['taskId'] => $this->_tpl_vars['info']):
?>
<?php echo smarty_function_cycle(array('values' => "gbEven,gbOdd",'assign' => 'rowClass'), $this);?>

<tr class="<?php echo $this->_tpl_vars['rowClass']; ?>
">
<td>
<span id="task-<?php echo $this->_tpl_vars['taskId']; ?>
-toggle"
class="giBlockToggle gcBackground1 gcBorder2"
style="border-width: 1px"
onclick="BlockToggle('task-<?php echo $this->_tpl_vars['taskId']; ?>
-description', 'task-<?php echo $this->_tpl_vars['taskId']; ?>
-toggle', 'table-row')">
<?php if (! isset ( $this->_tpl_vars['status']['run'] ) || $this->_tpl_vars['status']['run']['taskId'] != $this->_tpl_vars['taskId']): ?>+<?php else: ?>-<?php endif; ?>
</span>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => $this->_tpl_vars['info']['title'],'l10Domain' => $this->_tpl_vars['info']['l10Domain']), $this);?>

</td><td>
<?php if (isset ( $this->_tpl_vars['info']['timestamp'] )): ?>
<?php echo $this->_reg_objects['g'][0]->date(array('timestamp' => $this->_tpl_vars['info']['timestamp'],'style' => 'datetime'), $this);?>

<?php else: ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Not run yet'), $this);?>

<?php endif; ?>
</td><td>
<?php if (isset ( $this->_tpl_vars['info']['success'] )): ?>
<?php if ($this->_tpl_vars['info']['success']): ?>
<div class="giSuccess">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Success'), $this);?>

</div>
<?php else: ?>
<div class="giError">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Failed'), $this);?>

</div>
<?php endif; ?>
<?php else: ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Not run yet'), $this);?>

<?php endif; ?>
</td><td>
<a href="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "controller=core.AdminMaintenance",'arg2' => "form[action][runTask]=1",'arg3' => "taskId=".($this->_tpl_vars['taskId'])), $this);?>
"<?php if (isset ( $this->_tpl_vars['info']['confirmRun'] )): ?> onclick="return confirm('<?php echo $this->_reg_objects['g'][0]->text(array('text' => $this->_tpl_vars['info']['title'],'forJavascript' => 1), $this);?>
: <?php echo $this->_reg_objects['g'][0]->text(array('text' => "Are you sure?",'forJavascript' => 1), $this);?>
')"
<?php endif; ?>><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'run now'), $this);?>
</a>
</td>
</tr>
<tr class="<?php echo $this->_tpl_vars['rowClass']; ?>
" id="task-<?php echo $this->_tpl_vars['taskId']; ?>
-description"
<?php if (! isset ( $this->_tpl_vars['status']['run'] ) || $this->_tpl_vars['status']['run']['taskId'] != $this->_tpl_vars['taskId']): ?>style="display: none"<?php endif; ?>>
<td colspan="4">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => $this->_tpl_vars['info']['description'],'l10Domain' => $this->_tpl_vars['info']['l10Domain']), $this);?>

<?php if (! empty ( $this->_tpl_vars['info']['details'] )): ?>
<p class="giDescription"> <?php echo $this->_reg_objects['g'][0]->text(array('text' => "Last Run Details:"), $this);?>
 </p>
<p class="giInfo">
<?php $_from = $this->_tpl_vars['info']['details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['text']):
?>
<?php echo $this->_tpl_vars['text']; ?>
 <br/>
<?php endforeach; endif; unset($_from); ?>
</p>
<?php endif; ?>
</td>
</tr>
<?php endforeach; endif; unset($_from); ?>
</table>
</div>