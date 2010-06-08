<?php /* Smarty version 2.6.20, created on 2010-03-31 20:53:38
         compiled from gallery:modules/useralbum/templates/UserAlbumSiteAdmin.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gallery:modules/useralbum/templates/UserAlbumSiteAdmin.tpl', 21, false),array('modifier', 'repeat', 'gallery:modules/useralbum/templates/UserAlbumSiteAdmin.tpl', 44, false),array('modifier', 'markup', 'gallery:modules/useralbum/templates/UserAlbumSiteAdmin.tpl', 45, false),array('modifier', 'default', 'gallery:modules/useralbum/templates/UserAlbumSiteAdmin.tpl', 45, false),)), $this); ?>
<div class="gbBlock gcBackground1">
<h2> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'User Album Settings'), $this);?>
 </h2>
</div>
<?php if (isset ( $this->_tpl_vars['status']['saved'] )): ?>
<div class="gbBlock"><h2 class="giSuccess">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Settings saved successfully'), $this);?>

</h2></div>
<?php endif; ?>
<div class="gbBlock">
<p class="giDescription">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "An album will be created for each user.  The user will have full permissions on the album."), $this);?>

</p>
<table class="gbDataTable"><tr>
<td> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Create albums'), $this);?>
 </td>
<td>
<select name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[create]"), $this);?>
">
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['UserAlbumSiteAdmin']['createList'],'selected' => $this->_tpl_vars['form']['create']), $this);?>

</select>
</td>
</tr><tr>
<td> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Albums viewable by'), $this);?>
 </td>
<td>
<select name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[view]"), $this);?>
">
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['UserAlbumSiteAdmin']['viewList'],'selected' => $this->_tpl_vars['form']['view']), $this);?>

</select>
</td>
</tr><tr>
<td> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Full size images viewable'), $this);?>
 </td>
<td>
<select name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[fullSize]"), $this);?>
">
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['UserAlbumSiteAdmin']['sizeList'],'selected' => $this->_tpl_vars['form']['fullSize']), $this);?>

</select>
</td>
</tr><tr>
<td> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Location for new user albums'), $this);?>
 </td>
<td>
<select name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[targetLocation]"), $this);?>
">
<?php $_from = $this->_tpl_vars['UserAlbumSiteAdmin']['targetLocation']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['album']):
?>
<option value="<?php echo $this->_tpl_vars['album']['data']['id']; ?>
"<?php if ($this->_tpl_vars['album']['data']['id'] == $this->_tpl_vars['form']['targetLocation']): ?> selected="selected"<?php endif; ?>>
<?php echo ((is_array($_tmp="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;")) ? $this->_run_mod_handler('repeat', true, $_tmp, $this->_tpl_vars['album']['depth']) : smarty_modifier_repeat($_tmp, $this->_tpl_vars['album']['depth'])); ?>
--
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['album']['data']['title'])) ? $this->_run_mod_handler('markup', true, $_tmp, 'strip') : smarty_modifier_markup($_tmp, 'strip')))) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['album']['data']['pathComponent']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['album']['data']['pathComponent'])); ?>

</option>
<?php endforeach; endif; unset($_from); ?>
</select>
</td>
</tr><tr>
<td> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Login page'), $this);?>
 </td>
<td> <input type="checkbox" id="cbLoginRedirect" name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[loginRedirect]"), $this);?>
"
<?php if (! empty ( $this->_tpl_vars['form']['loginRedirect'] )): ?> checked="checked"<?php endif; ?>/>
<label for="cbLoginRedirect"> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Jump to user album after login'), $this);?>
 </label>
</td>
</tr><tr>
<td> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Link to user album'), $this);?>
 </td>
<td> <input type="checkbox" id="cbHomeLink" name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[homeLink]"), $this);?>
"
<?php if (! empty ( $this->_tpl_vars['form']['homeLink'] )): ?> checked="checked"<?php endif; ?>/>
<label for="cbHomeLink"> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Show link'), $this);?>
 </label>
</td>
</tr></table>
</div>
<div class="gbBlock gcBackground1">
<input type="submit" class="inputTypeSubmit"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][save]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Save'), $this);?>
"/>
<input type="submit" class="inputTypeSubmit"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][reset]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Reset'), $this);?>
"/>
</div>