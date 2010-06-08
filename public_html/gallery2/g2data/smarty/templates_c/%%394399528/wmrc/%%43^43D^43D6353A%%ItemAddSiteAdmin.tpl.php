<?php /* Smarty version 2.6.20, created on 2010-03-31 20:40:19
         compiled from gallery:modules/itemadd/templates/ItemAddSiteAdmin.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gallery:modules/itemadd/templates/ItemAddSiteAdmin.tpl', 19, false),array('function', 'cycle', 'gallery:modules/itemadd/templates/ItemAddSiteAdmin.tpl', 45, false),array('modifier', 'escape', 'gallery:modules/itemadd/templates/ItemAddSiteAdmin.tpl', 47, false),)), $this); ?>
<div class="gbBlock gcBackground1">
<h2> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Add Item Settings'), $this);?>
 </h2>
</div>
<?php if (isset ( $this->_tpl_vars['status']['saved'] )): ?>
<div class="gbBlock"><h2 class="giSuccess">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Settings saved successfully'), $this);?>

</h2></div>
<?php endif; ?>
<div class="gbBlock">
<h3> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Enable'), $this);?>
 </h3>
<table class="gbDataTable"><tr>
<td> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Add From Web'), $this);?>
 </td>
<td>
<select name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[fromweb]"), $this);?>
">
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ItemAddSiteAdmin']['optionList'],'selected' => $this->_tpl_vars['form']['fromweb']), $this);?>

</select>
</td>
</tr><tr>
<td> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Add From Server'), $this);?>
 </td>
<td>
<select name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[fromserver]"), $this);?>
">
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ItemAddSiteAdmin']['optionList'],'selected' => $this->_tpl_vars['form']['fromserver']), $this);?>

</select>
</td>
</tr></table>
<h4 class="giWarning"> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Security Warning'), $this);?>
 </h4>
<div>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => '"Add From Web" can be abused to attack other websites in your name.  For the attacked party it would seem as if you, the administrator of this Gallery, deliberately attacked their website because your Gallery acts on behalf of your users.  Therefore it is recommended to enable "Add From Web" only for trusted users.'), $this);?>

</div>
</div>
<div class="gbBlock">
<h3> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Local Server Upload Paths'), $this);?>
 </h3>
<p class="giDescription">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Specify the legal directories on the local server where a user can store files and then upload them into Gallery using the <i>Upload from Local Server</i> feature.  The paths you enter here and all the files and directories under those paths will be available to any Gallery user who has upload privileges, so you should limit this to directories that won't contain sensitive data (eg. /tmp or /usr/ftp/incoming)"), $this);?>

</p>
<table class="gbDataTable"><tr>
<th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Path'), $this);?>
 </th>
<th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Action'), $this);?>
 </th>
</tr>
<?php $_from = $this->_tpl_vars['ItemAddSiteAdmin']['localServerDirList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['index'] => $this->_tpl_vars['dir']):
?>
<tr class="<?php echo smarty_function_cycle(array('values' => "gbEven,gbOdd"), $this);?>
">
<td>
<?php echo ((is_array($_tmp=$this->_tpl_vars['dir'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

</td><td>
<a href="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "controller=itemadd.ItemAddSiteAdmin",'arg2' => "form[action][removeUploadLocalServerDir]=1",'arg3' => "form[uploadLocalServer][selectedDir]=".($this->_tpl_vars['index'])), $this);?>
">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'remove'), $this);?>

</a>
</td>
</tr>
<?php endforeach; endif; unset($_from); ?>
<tr>
<td>
<input type="text" size="40" id="newDir" autocomplete="off"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[uploadLocalServer][newDir]"), $this);?>
"
value="<?php echo $this->_tpl_vars['form']['uploadLocalServer']['newDir']; ?>
"/>
<?php $this->_tag_stack[] = array('autoComplete', array('element' => 'newDir'), $this); $_block_repeat=true; $this->_reg_objects['g'][0]->autoComplete($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>
<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.SimpleCallback",'arg2' => "command=lookupDirectories",'arg3' => "prefix=__VALUE__",'htmlEntities' => false), $this);?>

<?php $_obj_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo $this->_reg_objects['g'][0]->autoComplete($this->_tag_stack[count($this->_tag_stack)-1][1], $_obj_block_content, $this, $_block_repeat);} array_pop($this->_tag_stack);?>

</td><td>
<input type="submit" class="inputTypeSubmit"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][addUploadLocalServerDir]"), $this);?>
"
value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Add'), $this);?>
"/>
</td>
</tr></table>
<?php if (isset ( $this->_tpl_vars['form']['error']['uploadLocalServer']['newDir']['missing'] )): ?>
<div class="giError">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "You must enter a directory to add."), $this);?>

</div>
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['form']['error']['uploadLocalServer']['newDir']['restrictedByOpenBaseDir'] )): ?>
<div class="giError">
<?php ob_start(); ?>
<a href="http://php.net/ini_set"><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'open_basedir documentation'), $this);?>
</a>
<?php $this->_smarty_vars['capture']['open_basedir'] = ob_get_contents(); ob_end_clean(); ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Your webserver is configured to prevent you from accessing that directory.  Please refer to the %s and consult your webserver administrator.",'arg1' => $this->_smarty_vars['capture']['open_basedir']), $this);?>

</div>
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['form']['error']['uploadLocalServer']['newDir']['notReadable'] )): ?>
<div class="giError">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "The webserver does not have permissions to read that directory."), $this);?>

</div>
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['form']['error']['uploadLocalServer']['newDir']['notADirectory'] )): ?>
<div class="giError">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "The path you specified is not a valid directory."), $this);?>

</div>
<?php endif; ?>
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