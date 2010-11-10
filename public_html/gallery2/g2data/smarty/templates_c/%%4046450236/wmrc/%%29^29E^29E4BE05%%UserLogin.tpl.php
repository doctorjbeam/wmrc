<?php /* Smarty version 2.6.20, created on 2010-06-13 19:23:33
         compiled from gallery:modules/core/templates/UserLogin.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'gallery:modules/core/templates/UserLogin.tpl', 52, false),array('modifier', 'default', 'gallery:modules/core/templates/UserLogin.tpl', 67, false),)), $this); ?>
<div class="gbBlock gcBackground1">
<h2> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Login to your account'), $this);?>
 </h2>
</div>
<?php ob_start(); ?><?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.UserAdmin",'arg2' => "subView=core.UserRecoverPassword",'arg3' => "return=1"), $this);?>
<?php $this->_smarty_vars['capture']['recoverUrl'] = ob_get_contents(); ob_end_clean(); ?>
<?php if ($this->_tpl_vars['user']['isGuest'] || ! empty ( $this->_tpl_vars['reauthenticate'] )): ?>
<div class="gbBlock">
<?php if (isset ( $this->_tpl_vars['status']['passwordRecovered'] )): ?>
<div class="gbBlock"><h2 class="giSuccess">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Your password has been recovered, please login."), $this);?>

</h2></div>
<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['reauthenticate'] )): ?>
<div class="giWarning">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "The administration session has expired, please re-authenticate to access the administration area."), $this);?>

</div>
<br/>
<?php endif; ?>
<h4> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Username'), $this);?>
 </h4>
<input type="text" id="giFormUsername" size="16"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[username]"), $this);?>
" value="<?php echo $this->_tpl_vars['form']['username']; ?>
"/>
<script type="text/javascript">
document.getElementById('userAdminForm')['<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[username]"), $this);?>
'].focus();
</script>
<?php if (isset ( $this->_tpl_vars['form']['error']['username']['missing'] )): ?>
<div class="giError">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'You must enter a username'), $this);?>

</div>
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['form']['error']['username']['disabled'] )): ?>
<div class="giError">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Logins to this account are temporarily disabled due to multiple failed login attempts.  Wait for access to be restored, or use the %srecover password%s page to re-enable this account.",'arg1' => "<a href=\"".($this->_smarty_vars['capture']['recoverUrl'])."\">",'arg2' => "</a>"), $this);?>

</div>
<?php endif; ?>
<h4> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Password'), $this);?>
 </h4>
<input type="password" id="giFormPassword" size="16" name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[password]"), $this);?>
"/>
<?php if (isset ( $this->_tpl_vars['form']['error']['password']['missing'] )): ?>
<div class="giError">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'You must enter a password'), $this);?>

</div>
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['form']['error']['invalidPassword'] )): ?>
<div class="giError">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Your login information is incorrect.  Please try again."), $this);?>

</div>
<?php endif; ?>
</div>
<?php echo $this->_reg_objects['g'][0]->callback(array('type' => "core.LoadValidationPlugins",'key' => ((is_array($_tmp="core.UserLogin.")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['form']['username']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['form']['username']))), $this);?>

<?php $_from = $this->_tpl_vars['block']['core']['ValidationPlugins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['plugin']):
?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "gallery:".($this->_tpl_vars['plugin']['file']), 'smarty_include_vars' => array('l10Domain' => $this->_tpl_vars['plugin']['l10Domain'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endforeach; endif; unset($_from); ?>
<div class="gbBlock">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Lost or forgotten passwords can be retrieved using the %srecover password%s page",'arg1' => "<a href=\"".($this->_smarty_vars['capture']['recoverUrl'])."\">",'arg2' => "</a>"), $this);?>

</div>
<div class="gbBlock gcBackground1">
<input type="submit" class="inputTypeSubmit"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][login]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Login'), $this);?>
"/>
<input type="submit" class="inputTypeSubmit"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][cancel]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Cancel'), $this);?>
"/>
</div>
<?php else: ?> <div class="gbBlock">
<h4> <?php echo $this->_reg_objects['g'][0]->text(array('text' => "Welcome, %s!",'arg1' => ((is_array($_tmp=@$this->_tpl_vars['user']['fullName'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['user']['userName']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['user']['userName']))), $this);?>
 </h4>
</div>
<?php endif; ?>