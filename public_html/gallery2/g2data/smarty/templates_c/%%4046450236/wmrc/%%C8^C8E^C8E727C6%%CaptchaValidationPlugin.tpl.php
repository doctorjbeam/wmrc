<?php /* Smarty version 2.6.20, created on 2010-06-10 06:06:25
         compiled from gallery:modules/captcha/templates/CaptchaValidationPlugin.tpl */ ?>
<div class="gbBlock">
<h3>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Type the letters appearing in the picture."), $this);?>

</h3>
<div>
<img src="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=captcha.CaptchaImage"), $this);?>
" width="100" height="100" alt=""/>
</div>
<input type="text" size="12"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[CaptchaValidationPlugin][word]"), $this);?>
" value=""/>
<?php if (isset ( $this->_tpl_vars['form']['error']['CaptchaValidationPlugin'] )): ?>
<div class="giError">
<?php if (isset ( $this->_tpl_vars['form']['error']['CaptchaValidationPlugin']['missing'] )): ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "You must enter the letters appearing in the picture."), $this);?>

<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['form']['error']['CaptchaValidationPlugin']['invalid'] )): ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Incorrect letters."), $this);?>

<?php endif; ?>
</div>
<?php endif; ?>
</div>