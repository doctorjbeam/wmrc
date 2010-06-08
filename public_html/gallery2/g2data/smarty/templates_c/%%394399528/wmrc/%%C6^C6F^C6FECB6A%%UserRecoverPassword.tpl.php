<?php /* Smarty version 2.6.20, created on 2010-04-04 02:08:36
         compiled from gallery:modules/core/templates/UserRecoverPassword.tpl */ ?>
<div class="gbBlock gcBackground1">
<h2> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Recover a lost or forgotten password'), $this);?>
 </h2>
</div>
<div class="gbBlock">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Recovering your password requires that your user account has an email address assigned, and that you have access to the listed email address.  A confirmation will be emailed to you containing a URL which you must visit to set a new password for your account.  To prevent abuse, password recovery requests can not be attempted more than once in a 20 minute period.  A recovery confirmation is valid for seven days.  If it is not used during that time, it will be purged from the system and a new request will have to be made."), $this);?>

</div>
<?php if (isset ( $this->_tpl_vars['status']['requestSent'] )): ?>
<div class="gbBlock">
<?php ob_start(); ?>
<a href='<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.UserAdmin",'arg2' => "subView=core.UserRecoverPasswordAdmin"), $this);?>
'>
<?php $this->_smarty_vars['capture']['adminResetUrl'] = ob_get_contents(); ob_end_clean(); ?>
<div class="gbBlock">
<h2 class="giSuccess">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Your recovery request has been sent!"), $this);?>

</h2>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Note that if the account does not have an email address, you may not receive the email and you should contact your system administrator for help."), $this);?>

<br/><br/>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Administrators can use the %sEmergency Password Recovery%s page to recover the admin account if they fail to receive recovery email due to server problems, or lack of a working email address.",'arg1' => $this->_smarty_vars['capture']['adminResetUrl'],'arg2' => "</a>"), $this);?>

</div>
</div>
<?php else: ?>
<div class="gbBlock">
<h4><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Username'), $this);?>
</h4>
<input type="text" id="giFormUsername" size="16"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[userName]"), $this);?>
" value="<?php echo $this->_tpl_vars['form']['userName']; ?>
"/>
<script type="text/javascript">
document.getElementById('userAdminForm')['<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[userName]"), $this);?>
'].focus();
</script>
<?php if (isset ( $this->_tpl_vars['form']['error']['userName']['missing'] )): ?>
<div class="giError">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'You must enter a username'), $this);?>

</div>
<?php endif; ?>
</div>
<?php $_from = $this->_tpl_vars['UserRecoverPassword']['plugins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['plugin']):
?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "gallery:".($this->_tpl_vars['plugin']['file']), 'smarty_include_vars' => array('l10Domain' => $this->_tpl_vars['plugin']['l10Domain'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endforeach; endif; unset($_from); ?>
<div class="gbBlock gcBackground1">
<input type="submit" class="inputTypeSubmit"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][recover]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Recover'), $this);?>
"/>
<input type="submit" class="inputTypeSubmit"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][cancel]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Cancel'), $this);?>
"/>
</div>
<?php endif; ?>