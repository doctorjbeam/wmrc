<?php /* Smarty version 2.6.20, created on 2010-03-31 20:53:59
         compiled from gallery:modules/register/templates/AdminSelfRegistration.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gallery:modules/register/templates/AdminSelfRegistration.tpl', 28, false),array('function', 'cycle', 'gallery:modules/register/templates/AdminSelfRegistration.tpl', 121, false),)), $this); ?>
<div class="gbBlock gcBackground1">
<h2> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Registration Settings'), $this);?>
 </h2>
</div>
<?php if (! empty ( $this->_tpl_vars['status'] )): ?>
<div class="gbBlock"><h2 class="giSuccess">
<?php if (isset ( $this->_tpl_vars['status']['saved'] )): ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Settings saved successfully'), $this);?>

<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['status']['activated'] )): ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Activated user %s",'arg1' => $this->_tpl_vars['status']['activated']), $this);?>

<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['status']['deleted'] )): ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Deleted user %s",'arg1' => $this->_tpl_vars['status']['deleted']), $this);?>

<?php endif; ?>
</h2></div>
<?php endif; ?>
<div class="gbBlock">
<h3> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Confirmation Policy'), $this);?>
 </h3>
<p class="giDescription">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "The Registration module can accept new user registrations instantly, require the user to click a confirmation link in an email that is sent by the module, or require account activation by a site administrator."), $this);?>

</p>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Choose policy:"), $this);?>

<select name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[confirmation]"), $this);?>
">
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['SelfRegistration']['emailConfirmationList'],'selected' => $this->_tpl_vars['form']['confirmation']), $this);?>

</select>
</div>
<div class="gbBlock">
<h3> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Email details'), $this);?>
 </h3>
<table class="gbDataTable"><tr>
<td>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Sender(From) Email Address:"), $this);?>

</td><td>
<input type="text"  size="30"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[from]"), $this);?>
" value="<?php echo $this->_tpl_vars['form']['from']; ?>
"/>
</td>
</tr><tr>
<td>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Confirmation Email Subject:"), $this);?>

</td><td>
<input type="text" size="30"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[subject]"), $this);?>
" value="<?php echo $this->_tpl_vars['form']['subject']; ?>
"/>
</td>
</tr><tr>
<td colspan="2">
<input type="checkbox" id="cbEmailAdmins" <?php if ($this->_tpl_vars['form']['emailadmins']): ?>checked="checked" <?php endif; ?>
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[emailadmins]"), $this);?>
"/>
<label for="cbEmailAdmins">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Email Site Administrators for all new registrations'), $this);?>

</label>
</td>
</tr><tr>
<td>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Admin Email Subject:"), $this);?>

</td><td>
<input type="text" size="30"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[adminsubject]"), $this);?>
" value="<?php echo $this->_tpl_vars['form']['adminsubject']; ?>
"/>
</td>
</tr><tr>
<td colspan="2">
<input type="checkbox" id="cbEmailUsers" <?php if ($this->_tpl_vars['form']['emailusers']): ?>checked="checked" <?php endif; ?>
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[emailusers]"), $this);?>
"/>
<label for="cbEmailUsers">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Email new users upon account activation'), $this);?>

</label>
</td>
</tr><tr>
<td>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Welcome Email Subject:"), $this);?>

</td><td>
<input type="text" size="30"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[usersubject]"), $this);?>
" value="<?php echo $this->_tpl_vars['form']['usersubject']; ?>
"/>
</td>
</tr></table>
</div>
<div class="gbBlock gcBackground1">
<input type="submit" class="inputTypeSubmit"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][save]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Save'), $this);?>
"/>
<input type="submit" class="inputTypeSubmit"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][cancel]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Reset'), $this);?>
"/>
</div>
<?php if ($this->_tpl_vars['form']['list']['count'] > 0): ?>
<div class="gbBlock">
<h3> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Pending Registrations'), $this);?>
 </h3>
<?php if (( $this->_tpl_vars['form']['list']['maxPages'] > 1 )): ?>
<div style="margin-bottom: 10px"><span class="gcBackground1" style="padding: 5px">
<input type="hidden"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[list][page]"), $this);?>
" value="<?php echo $this->_tpl_vars['form']['list']['page']; ?>
"/>
<input type="hidden"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[list][maxPages]"), $this);?>
" value="<?php echo $this->_tpl_vars['form']['list']['maxPages']; ?>
"/>
<?php if (( $this->_tpl_vars['form']['list']['page'] > 1 )): ?>
<a href="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.SiteAdmin",'arg2' => "subView=register.AdminSelfRegistration",'arg3' => "form[list][page]=1"), $this);?>
"><?php echo $this->_reg_objects['g'][0]->text(array('text' => "&laquo; first"), $this);?>
</a>
&nbsp;
<a href="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.SiteAdmin",'arg2' => "subView=register.AdminSelfRegistration",'arg3' => "form[list][page]=".($this->_tpl_vars['form']['list']['backPage'])), $this);?>
"><?php echo $this->_reg_objects['g'][0]->text(array('text' => "&laquo; back"), $this);?>
</a>
<?php endif; ?>
&nbsp;
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Viewing page %d of %d",'arg1' => $this->_tpl_vars['form']['list']['page'],'arg2' => $this->_tpl_vars['form']['list']['maxPages']), $this);?>

&nbsp;
<?php if (( $this->_tpl_vars['form']['list']['page'] < $this->_tpl_vars['form']['list']['maxPages'] )): ?>
<a href="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.SiteAdmin",'arg2' => "subView=register.AdminSelfRegistration",'arg3' => "form[list][page]=".($this->_tpl_vars['form']['list']['nextPage'])), $this);?>
"><?php echo $this->_reg_objects['g'][0]->text(array('text' => "next &raquo;"), $this);?>
</a>
&nbsp;
<a href="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.SiteAdmin",'arg2' => "subView=register.AdminSelfRegistration",'arg3' => "form[list][page]=".($this->_tpl_vars['form']['list']['maxPages'])), $this);?>
"><?php echo $this->_reg_objects['g'][0]->text(array('text' => "last &raquo;"), $this);?>
</a>
<?php endif; ?>
</span></div>
<?php endif; ?>
<table class="gbDataTable"><tr>
<th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Username'), $this);?>
 </th>
<th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Full Name'), $this);?>
 </th>
<th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Email'), $this);?>
 </th>
<th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Date'), $this);?>
 </th>
<th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Action'), $this);?>
 </th>
</tr>
<?php $_from = $this->_tpl_vars['form']['list']['userNames']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['userId'] => $this->_tpl_vars['user']):
?>
<tr class="<?php echo smarty_function_cycle(array('values' => "gbEven,gbOdd"), $this);?>
">
<td> <?php echo $this->_tpl_vars['user']['userName']; ?>
 </td>
<td> <?php echo $this->_tpl_vars['user']['fullName']; ?>
 </td>
<td> <?php echo $this->_tpl_vars['user']['email']; ?>
 </td>
<td> <?php echo $this->_reg_objects['g'][0]->date(array('timestamp' => $this->_tpl_vars['user']['creationTimestamp']), $this);?>
 </td>
<td>
<a href="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "controller=register.AdminSelfRegistration",'arg2' => "form[action][activate]=1",'arg3' => "form[userId]=".($this->_tpl_vars['userId'])), $this);?>
"><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'activate'), $this);?>
</a>
&nbsp;
<a href="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "controller=register.AdminSelfRegistration",'arg2' => "form[action][delete]=1",'arg3' => "form[userId]=".($this->_tpl_vars['userId'])), $this);?>
"><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'delete'), $this);?>
</a>
</td>
</tr>
<?php endforeach; endif; unset($_from); ?>
</table>
</div>
<?php endif; ?>