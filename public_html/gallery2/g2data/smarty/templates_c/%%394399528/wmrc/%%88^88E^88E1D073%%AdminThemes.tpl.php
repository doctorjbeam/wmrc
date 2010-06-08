<?php /* Smarty version 2.6.20, created on 2010-03-31 20:37:11
         compiled from gallery:modules/core/templates/AdminThemes.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gallery:modules/core/templates/AdminThemes.tpl', 46, false),array('function', 'cycle', 'gallery:modules/core/templates/AdminThemes.tpl', 138, false),array('modifier', 'default', 'gallery:modules/core/templates/AdminThemes.tpl', 144, false),array('modifier', 'replace', 'gallery:modules/core/templates/AdminThemes.tpl', 215, false),)), $this); ?>
<div class="gbBlock gcBackground1">
<h2> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Gallery Themes'), $this);?>
 </h2>
</div>
<?php if (! empty ( $this->_tpl_vars['status'] )): ?>
<div class="gbBlock"><h2 class="giSuccess">
<?php if (isset ( $this->_tpl_vars['status']['activated'] )): ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Successfully activated theme %s",'arg1' => $this->_tpl_vars['status']['activated']), $this);?>

<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['status']['deactivated'] )): ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Successfully deactivated theme %s",'arg1' => $this->_tpl_vars['status']['deactivated']), $this);?>

<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['status']['installed'] )): ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Successfully installed theme %s",'arg1' => $this->_tpl_vars['status']['installed']), $this);?>

<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['status']['uninstalled'] )): ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Successfully uninstalled theme %s",'arg1' => $this->_tpl_vars['status']['uninstalled']), $this);?>

<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['status']['upgraded'] )): ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Successfully upgraded theme %s",'arg1' => $this->_tpl_vars['status']['upgraded']), $this);?>

<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['status']['savedTheme'] )): ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Successfully saved theme settings'), $this);?>

<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['status']['savedDefaults'] )): ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Successfully saved default album settings'), $this);?>

<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['status']['restoredTheme'] )): ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Restored theme settings'), $this);?>

<?php endif; ?>
</h2></div>
<?php endif; ?>
<div class="gbBlock">
<h3> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Defaults'), $this);?>
 </h3>
<p class="giDescription">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "These are default display settings for albums in your gallery.  They can be overridden in each album."), $this);?>

</p>
<table class="gbDataTable"><tr>
<td>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Default sort order'), $this);?>

</td><td>
<select name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[default][orderBy]"), $this);?>
" onchange="pickOrder()">
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['AdminThemes']['orderByList'],'selected' => $this->_tpl_vars['form']['default']['orderBy']), $this);?>

</select>
<select name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[default][orderDirection]"), $this);?>
">
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['AdminThemes']['orderDirectionList'],'selected' => $this->_tpl_vars['form']['default']['orderDirection']), $this);?>

</select>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'with'), $this);?>

<select name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[default][presort]"), $this);?>
">
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['AdminThemes']['presortList'],'selected' => $this->_tpl_vars['form']['default']['presort']), $this);?>

</select>
<script type="text/javascript">
// <![CDATA[
function pickOrder() {
var list = '<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[default][orderBy]"), $this);?>
';
var frm = document.getElementById('siteAdminForm');
var index = frm.elements[list].selectedIndex;
list = '<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[default][orderDirection]"), $this);?>
';
frm.elements[list].disabled = (index == 0) ?1:0;
list = '<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[default][presort]"), $this);?>
';
frm.elements[list].disabled = (index == 0) ?1:0;
}
pickOrder();
// ]]>
</script>
</td>
</tr>
<tr>
<td>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Default theme'), $this);?>

</td><td>
<select name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[default][theme]"), $this);?>
">
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['AdminThemes']['themeList'],'selected' => $this->_tpl_vars['form']['default']['theme']), $this);?>

</select>
<?php if (isset ( $this->_tpl_vars['form']['error']['themeUnavailable'] )): ?>
<div class="giError">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "The %s theme is incompatible with your Gallery version or no longer available.  Please upgrade the %s theme or pick another default theme.",'arg1' => $this->_tpl_vars['AdminThemes']['themeId'],'arg2' => $this->_tpl_vars['AdminThemes']['themeId']), $this);?>

</div>
<?php endif; ?>
</td>
</tr>
<tr>
<td>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'New albums'), $this);?>

</td><td>
<select name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[default][newAlbumsUseDefaults]"), $this);?>
">
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['AdminThemes']['newAlbumsUseDefaultsList'],'selected' => $this->_tpl_vars['form']['default']['newAlbumsUseDefaults']), $this);?>

</select>
</td>
</tr></table>
<p class="giDescription">
<?php ob_start(); ?><a href="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.SiteAdmin",'arg2' => "subView=core.AdminPlugins"), $this);?>
"><?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('pluginsLink', ob_get_contents());ob_end_clean(); ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "To activate more themes visit the %sPlugins%s page.",'arg1' => $this->_tpl_vars['pluginsLink'],'arg2' => "</a>"), $this);?>

</p>
</div>
<div class="gbBlock gcBackground1">
<input type="submit" class="inputTypeSubmit"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][saveDefaults]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Save Defaults'), $this);?>
"/>
</div>
<div class="gbTabBar">
<?php $_from = $this->_tpl_vars['AdminThemes']['themes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['themeId'] => $this->_tpl_vars['theme']):
?>
<?php if ($this->_tpl_vars['theme']['active']): ?>
<?php if ($this->_tpl_vars['AdminThemes']['themeId'] == $this->_tpl_vars['themeId']): ?>
<span class="giSelected o"><span>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => $this->_tpl_vars['theme']['name'],'l10Domain' => $this->_tpl_vars['theme']['l10Domain']), $this);?>

</span></span>
<?php else: ?>
<span class="o"><span>
<a href="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.SiteAdmin",'arg2' => "subView=core.AdminThemes",'arg3' => "themeId=".($this->_tpl_vars['themeId'])), $this);?>
"><?php echo $this->_reg_objects['g'][0]->text(array('text' => $this->_tpl_vars['theme']['name'],'l10Domain' => $this->_tpl_vars['theme']['l10Domain']), $this);?>
</a>
</span></span>
<?php endif; ?>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
</div>
<div class="gbBlock">
<h3>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "%s Theme Settings",'arg1' => $this->_tpl_vars['AdminThemes']['themes'][$this->_tpl_vars['AdminThemes']['themeId']]['name']), $this);?>

</h3>
<p class="giDescription">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "These are the global settings for the theme.  They can be overridden at the album level."), $this);?>

</p>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "gallery:modules/core/templates/JavaScriptWarning.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php if (isset ( $this->_tpl_vars['AdminThemes']['customTemplate'] )): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "gallery:".($this->_tpl_vars['AdminThemes']['customTemplate']), 'smarty_include_vars' => array('l10Domain' => $this->_tpl_vars['AdminThemes']['themes'][$this->_tpl_vars['AdminThemes']['themeId']]['l10Domain'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['AdminThemes']['settings'] )): ?>
<table class="gbDataTable">
<?php $_from = $this->_tpl_vars['AdminThemes']['settings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['setting']):
?>
<tr class="<?php echo smarty_function_cycle(array('values' => "gbEven,gbOdd"), $this);?>
">
<td>
<?php echo $this->_tpl_vars['setting']['name']; ?>

</td>
<td>
<?php if (( $this->_tpl_vars['setting']['type'] == 'text-field' )): ?>
<input type="text" size="<?php echo ((is_array($_tmp=@$this->_tpl_vars['setting']['typeParams']['size'])) ? $this->_run_mod_handler('default', true, $_tmp, 6) : smarty_modifier_default($_tmp, 6)); ?>
"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[key][".($this->_tpl_vars['setting']['key'])."]"), $this);?>
"
value="<?php echo $this->_tpl_vars['form']['key'][$this->_tpl_vars['setting']['key']]; ?>
"/>
<?php elseif (( $this->_tpl_vars['setting']['type'] == 'textarea' )): ?>
<textarea style="width:<?php echo ((is_array($_tmp=@$this->_tpl_vars['setting']['typeParams']['width'])) ? $this->_run_mod_handler('default', true, $_tmp, '400px') : smarty_modifier_default($_tmp, '400px')); ?>
;height:<?php echo ((is_array($_tmp=@$this->_tpl_vars['setting']['typeParams']['height'])) ? $this->_run_mod_handler('default', true, $_tmp, '75px') : smarty_modifier_default($_tmp, '75px')); ?>
;"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[key][".($this->_tpl_vars['setting']['key'])."]"), $this);?>
"><?php echo $this->_tpl_vars['form']['key'][$this->_tpl_vars['setting']['key']]; ?>
</textarea>
<?php elseif (( $this->_tpl_vars['setting']['type'] == 'single-select' )): ?>
<select name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[key][".($this->_tpl_vars['setting']['key'])."]"), $this);?>
">
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['setting']['choices'],'selected' => $this->_tpl_vars['form']['key'][$this->_tpl_vars['setting']['key']]), $this);?>

</select>
<?php elseif (( $this->_tpl_vars['setting']['type'] == 'checkbox' )): ?>
<input type="checkbox" <?php if (! empty ( $this->_tpl_vars['setting']['value'] )): ?>checked="checked" <?php endif; ?>
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[key][".($this->_tpl_vars['setting']['key'])."]"), $this);?>
" />
<?php elseif (( $this->_tpl_vars['setting']['type'] == 'block-list' )): ?>
<table>
<tr>
<td style="text-align: right;">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Available'), $this);?>

</td>
<td>
<select id="blocksAvailableList_<?php echo $this->_tpl_vars['setting']['key']; ?>
"
onchange="bsw_selectToUse('<?php echo $this->_tpl_vars['setting']['key']; ?>
');">
<option value=""><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Choose a block'), $this);?>
</option>
</select>
</td>
<td class="bsw_BlockCommands">
<span id="bsw_AddButton_<?php echo $this->_tpl_vars['setting']['key']; ?>
"
onclick="bsw_addBlock('<?php echo $this->_tpl_vars['setting']['key']; ?>
');" class="bsw_ButtonDisabled">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Add'), $this);?>

</span>
</td>
</tr>
<tr>
<td style="text-align: right; vertical-align: top;">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Selected'), $this);?>

</td>
<td id="bsw_UsedBlockList_<?php echo $this->_tpl_vars['setting']['key']; ?>
">
<select id="blocksUsedList_<?php echo $this->_tpl_vars['setting']['key']; ?>
" size="10"
onchange="bsw_selectToChange('<?php echo $this->_tpl_vars['setting']['key']; ?>
');">
<option value=""></option> </select>
</td>
<td class="bsw_BlockCommands">
<span style="display: block"
id="bsw_RemoveButton_<?php echo $this->_tpl_vars['setting']['key']; ?>
"
onclick="bsw_removeBlock('<?php echo $this->_tpl_vars['setting']['key']; ?>
');"
class="bsw_ButtonDisabled">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Remove'), $this);?>

</span>
<span style="display: block"
id="bsw_MoveUpButton_<?php echo $this->_tpl_vars['setting']['key']; ?>
"
onclick="bsw_moveUp('<?php echo $this->_tpl_vars['setting']['key']; ?>
');"
class="bsw_ButtonDisabled">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Move Up'), $this);?>

</span>
<span style="display: block"
id="bsw_MoveDownButton_<?php echo $this->_tpl_vars['setting']['key']; ?>
"
onclick="bsw_moveDown('<?php echo $this->_tpl_vars['setting']['key']; ?>
');"
class="bsw_ButtonDisabled">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Move Down'), $this);?>

</span>
</td>
</tr>
<tr>
<td id="bsw_BlockOptions_<?php echo $this->_tpl_vars['setting']['key']; ?>
" colspan="3">
</td>
</tr>
</table>
<input type="hidden"
id="albumBlockValue_<?php echo $this->_tpl_vars['setting']['key']; ?>
" size="60"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[key][".($this->_tpl_vars['setting']['key'])."]"), $this);?>
"
value="<?php echo ((is_array($_tmp=$this->_tpl_vars['form']['key'][$this->_tpl_vars['setting']['key']])) ? $this->_run_mod_handler('replace', true, $_tmp, '"', '&quot;') : smarty_modifier_replace($_tmp, '"', '&quot;')); ?>
"/>
<script type="text/javascript">
// <![CDATA[
var block;
var tmp;
<?php $_from = $this->_tpl_vars['AdminThemes']['availableBlocks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['moduleId'] => $this->_tpl_vars['blocks']):
?>
<?php $_from = $this->_tpl_vars['blocks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['blockName'] => $this->_tpl_vars['block']):
?>
block = bsw_addAvailableBlock("<?php echo $this->_tpl_vars['setting']['key']; ?>
", "<?php echo $this->_tpl_vars['moduleId']; ?>
.<?php echo $this->_tpl_vars['blockName']; ?>
",
"<?php echo $this->_reg_objects['g'][0]->text(array('text' => $this->_tpl_vars['block']['description'],'l10Domain' => "modules_".($this->_tpl_vars['moduleId']),'forJavascript' => true), $this);?>
");
<?php if (! empty ( $this->_tpl_vars['block']['vars'] )): ?>
<?php $_from = $this->_tpl_vars['block']['vars']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['varKey'] => $this->_tpl_vars['varInfo']):
?>
tmp = new Array();
<?php if (( $this->_tpl_vars['varInfo']['type'] == 'choice' )): ?>
<?php $_from = $this->_tpl_vars['varInfo']['choices']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['choiceKey'] => $this->_tpl_vars['choiceValue']):
?>
tmp["<?php echo $this->_tpl_vars['choiceKey']; ?>
"] = "<?php echo $this->_reg_objects['g'][0]->text(array('text' => $this->_tpl_vars['choiceValue'],'l10Domain' => "modules_".($this->_tpl_vars['moduleId']),'forJavascript' => true), $this);?>
";
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
block.addVariable("<?php echo $this->_tpl_vars['varKey']; ?>
", "<?php echo $this->_tpl_vars['varInfo']['default']; ?>
",
"<?php echo $this->_reg_objects['g'][0]->text(array('text' => $this->_tpl_vars['varInfo']['description'],'l10Domain' => "modules_".($this->_tpl_vars['moduleId']),'forJavascript' => true), $this);?>
",
"<?php echo $this->_tpl_vars['varInfo']['type']; ?>
", tmp);
<?php if (! empty ( $this->_tpl_vars['varInfo']['overrides'] )): ?>
<?php $_from = $this->_tpl_vars['varInfo']['overrides']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['override']):
?>
block.addVariableOverride("<?php echo $this->_tpl_vars['varKey']; ?>
", "<?php echo $this->_tpl_vars['override']; ?>
");
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<?php endforeach; endif; unset($_from); ?>
bsw_initAdminForm("<?php echo $this->_tpl_vars['setting']['key']; ?>
", "<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Parameter','forJavascript' => true), $this);?>
",
"<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Value','forJavascript' => true), $this);?>
");
// ]]>
</script>
<?php endif; ?>
</td>
</tr>
<?php if (isset ( $this->_tpl_vars['form']['error']['key'][$this->_tpl_vars['setting']['key']]['invalid'] )): ?>
<tr>
<td colspan="2" class="giError">
<?php echo $this->_tpl_vars['form']['errorMessage'][$this->_tpl_vars['setting']['key']]; ?>

</td>
</tr>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
</table>
<?php elseif (! isset ( $this->_tpl_vars['AdminThemes']['customTemplate'] )): ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'There are no settings for this theme'), $this);?>

<?php endif; ?>
</div>
<?php if (isset ( $this->_tpl_vars['AdminThemes']['customTemplate'] ) || ! empty ( $this->_tpl_vars['AdminThemes']['settings'] )): ?>
<div class="gbBlock gcBackground1">
<input type="hidden" name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => 'themeId'), $this);?>
" value="<?php echo $this->_tpl_vars['AdminThemes']['themeId']; ?>
"/>
<input type="submit" class="inputTypeSubmit"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][saveTheme]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Save Theme Settings'), $this);?>
"/>
<input type="submit" class="inputTypeSubmit"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][undoTheme]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Reset'), $this);?>
"/>
</div>
<?php endif; ?>