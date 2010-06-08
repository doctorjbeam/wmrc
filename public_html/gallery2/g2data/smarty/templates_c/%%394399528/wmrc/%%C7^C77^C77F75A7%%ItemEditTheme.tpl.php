<?php /* Smarty version 2.6.20, created on 2010-03-31 22:22:19
         compiled from gallery:modules/core/templates/ItemEditTheme.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gallery:modules/core/templates/ItemEditTheme.tpl', 18, false),)), $this); ?>
<div class="gbBlock">
<h3><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Choose a theme'), $this);?>
</h3>
<?php if (empty ( $this->_tpl_vars['ThemeSettingsForm'] )): ?>
<div class="giWarning">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "This album is configured to use the %s theme which is either incompatible with this Gallery version or no longer available.  Please upgrade the %s theme or use another theme for this album.",'arg1' => $this->_tpl_vars['ItemEditTheme']['theme'],'arg2' => $this->_tpl_vars['ItemEditTheme']['theme']), $this);?>

</div>
<?php else: ?>
<p class="giDescription">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Themes control the look and feel of the album.  You can choose a different theme for each album.  If you don't choose a theme, we'll use the %s theme by default.",'arg1' => "<b>".($this->_tpl_vars['ThemeSettingsForm']['theme']['name'])."</b>"), $this);?>

</p>
<?php endif; ?>
<b><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Theme'), $this);?>
</b>
<select name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[theme]"), $this);?>
">
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ItemEditTheme']['themeList'],'selected' => $this->_tpl_vars['form']['theme']), $this);?>

</select><br/>
<?php echo $this->_reg_objects['g'][0]->changeInDescendents(array('module' => 'theme','text' => 'Use this theme in all subalbums'), $this);?>

</div>
<div class="gbBlock gcBackground1">
<input type="submit" class="inputTypeSubmit"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][chooseTheme]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Choose Theme'), $this);?>
"/>
</div>
<?php if (! empty ( $this->_tpl_vars['ThemeSettingsForm'] )): ?>
<?php ob_start(); ?><h3><?php echo $this->_reg_objects['g'][0]->text(array('text' => "Configure the %s theme",'arg1' => "<b>".($this->_tpl_vars['ThemeSettingsForm']['theme']['name'])."</b>"), $this);?>
</h3>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "These settings only apply to the theme for this album."), $this);?>
<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('message', ob_get_contents());ob_end_clean(); ?>
<?php echo $this->_reg_objects['g'][0]->block(array('type' => "core.ThemeSettingsForm",'class' => 'gbBlock','message' => $this->_tpl_vars['message'],'formId' => 'itemAdminForm'), $this);?>

<?php if (! empty ( $this->_tpl_vars['ThemeSettingsForm']['settings'] )): ?>
<div>
<?php echo $this->_reg_objects['g'][0]->changeInDescendents(array('module' => 'theme','text' => "Use these settings in all subalbums that use the %s theme",'arg1' => $this->_tpl_vars['ThemeSettingsForm']['theme']['name']), $this);?>

</div>
<?php endif; ?>
<div class="gbBlock gcBackground1">
<input type="submit" class="inputTypeSubmit"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][save]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Save Theme Settings'), $this);?>
"/>
<input type="submit" class="inputTypeSubmit"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][undo]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Reset'), $this);?>
"/>
</div>
<?php endif; ?>