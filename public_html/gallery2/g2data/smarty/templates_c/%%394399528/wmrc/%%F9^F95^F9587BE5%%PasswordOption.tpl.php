<?php /* Smarty version 2.6.20, created on 2010-03-31 20:38:36
         compiled from gallery:modules/password/templates/PasswordOption.tpl */ ?>
<div class="gbBlock">
<h3> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Password Protection'), $this);?>
 </h3>
<p class="giDescription">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Assign a password that is required for guests or other users without view permission. Ensure guests have permission to view resizes and/or original items before assigning a password."), $this);?>

</p>
<?php if (( $this->_tpl_vars['form']['PasswordOption']['hasPassword'] )): ?>
<p class="giDescription">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "This item is already password protected."), $this);?>

</p>
<input type="checkbox" id="RemovePassword_cb"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[PasswordOption][remove]"), $this);?>
"
onclick="passwordFieldToggle(this.checked)"/>
<label for="RemovePassword_cb">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Remove Password'), $this);?>

</label>
<script type="text/javascript"><?php echo '
// <![CDATA[
function passwordFieldToggle(off) {
document.getElementById(\'Password1_tb\').disabled = off;
document.getElementById(\'Password2_tb\').disabled = off;
}
// ]]>
</script>'; ?>

<?php endif; ?>
<table class="gbDataTable"><tr>
<td><label for="Password1_tb">
<?php if (( $this->_tpl_vars['form']['PasswordOption']['hasPassword'] )): ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "New Password:"), $this);?>

<?php else: ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Password:"), $this);?>

<?php endif; ?>
</label></td>
<td>
<input type="password" size="20" id="Password1_tb"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[PasswordOption][password1]"), $this);?>
"/>
</td>
</tr><tr>
<td><label for="Password2_tb">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Confirm Password:"), $this);?>

</label></td>
<td>
<input type="password" size="20" id="Password2_tb"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[PasswordOption][password2]"), $this);?>
"/>
</td>
</tr></table>
<?php if (isset ( $this->_tpl_vars['form']['error']['PasswordOption']['mismatch'] )): ?>
<div class="giError">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'The passwords you entered did not match'), $this);?>

</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['form']['PasswordOption']['isAlbum']): ?>
<input type="hidden" name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[PasswordOption][progressBar]"), $this);?>
"
value="<?php if ($this->_tpl_vars['form']['PasswordOption']['hasPassword']): ?>remove<?php else: ?>add<?php endif; ?>"/>
<?php endif; ?>
</div>