<?php /* Smarty version 2.6.20, created on 2010-03-31 20:52:16
         compiled from gallery:modules/core/templates/AdminPlugins.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'gallery:modules/core/templates/AdminPlugins.tpl', 9, false),array('modifier', 'capitalize', 'gallery:modules/core/templates/AdminPlugins.tpl', 150, false),array('function', 'cycle', 'gallery:modules/core/templates/AdminPlugins.tpl', 145, false),)), $this); ?>
<script type="text/javascript">
//<![CDATA[
var pluginData = { "module" : { }, "theme" : { } };
<?php $_from = $this->_tpl_vars['AdminPlugins']['plugins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['names'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['names']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['plugin']):
        $this->_foreach['names']['iteration']++;
?>
pluginData["<?php echo $this->_tpl_vars['plugin']['type']; ?>
"]["<?php echo $this->_tpl_vars['plugin']['id']; ?>
"] = { "name" : "<?php echo ((is_array($_tmp=$this->_tpl_vars['plugin']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
", "deletable" : <?php echo $this->_tpl_vars['plugin']['deletable']; ?>
, "state" : "<?php echo $this->_tpl_vars['plugin']['state']; ?>
" };
<?php endforeach; endif; unset($_from); ?>
var stateData = {
"inactive" : {
"class" : "icon-plugin-inactive",
"text" : "<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Status: Inactive",'forJavascript' => true), $this);?>
",
"actions" : { "activate": 1, "uninstall" : 1, "delete" : 1 },
"callback": "copyVersionToInstalledVersion",
"message" : { "type" : "giSuccess", "text" : "<?php echo $this->_reg_objects['g'][0]->text(array('text' => '__PLUGIN__ deactivated','forJavascript' => true), $this);?>
" }
},
"active" : {
"class" : "icon-plugin-active",
"text" : "<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Status: Active",'forJavascript' => true), $this);?>
",
"actions" : { "deactivate": 1, "uninstall" : 1, "delete" : 1  },
"callback": "copyVersionToInstalledVersion",
"message" : { "type" : "giSuccess", "text" : "<?php echo $this->_reg_objects['g'][0]->text(array('text' => '__PLUGIN__ activated','forJavascript' => true), $this);?>
" }
},
"uninstalled" : {
"class" : "icon-plugin-uninstall",
"text" : "<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Status: Not Installed",'forJavascript' => true), $this);?>
",
"actions" : { "install": 1, "delete" : 1 },
"callback": "eraseInstalledVersion",
"message" : { "type" : "giSuccess", "text" : "<?php echo $this->_reg_objects['g'][0]->text(array('text' => '__PLUGIN__ uninstalled','forJavascript' => true), $this);?>
" }
},
"unupgraded" : {
"class" : "icon-plugin-upgrade",
"text" : "<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Status: Upgrade Required (Inactive)",'forJavascript' => true), $this);?>
",
"actions" : { "upgrade": 1 }
},
"incompatible" : {
"class" : "icon-plugin-incompatible",
"text" : "<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Status: Incompatible Plugin (Inactive)",'forJavascript' => true), $this);?>
",
"actions" : { }
},
"unconfigured" : {
"class" : "icon-plugin-inactive",
"text" : "<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Status: Inactive (Configuration Required)",'forJavascript' => true), $this);?>
",
"actions" : { "configure" : 1, "uninstall" : 1, "delete" : 1 },
"callback": "copyVersionToInstalledVersion",
"message" : { "type" : "giWarning", "text" : "<?php echo $this->_reg_objects['g'][0]->text(array('text' => '__PLUGIN__ needs configuration','forJavascript' => true), $this);?>
" }
},
"deleted" : {
"message" : { "type" : "giSuccess", "text" : "<?php echo $this->_reg_objects['g'][0]->text(array('text' => '__PLUGIN__ deleted','forJavascript' => true), $this);?>
" }
}
};
var errorPageUrl = '<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.ErrorPage",'htmlEntities' => 0), $this);?>
';
var uninstallPrompt = {
"header" : '<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Warning!",'forJavascript' => true), $this);?>
',
"body"   : '<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Do you really want to uninstall __PLUGIN__?",'forJavascript' => true), $this);?>
' +
'<br/>' +
'<b><?php echo $this->_reg_objects['g'][0]->text(array('text' => "This will also remove any permissions and clean up any data created by this module.",'forJavascript' => true), $this);?>
</b> ' +
'<?php echo $this->_reg_objects['g'][0]->text(array('text' => "This plugin will be uninstalled, but its files will be kept so that you can reinstall it.",'forJavascript' => true), $this);?>
',
"yes"    : '<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Yes','forJavascript' => true), $this);?>
',
"no"     : '<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'No','forJavascript' => true), $this);?>
'
};
var uninstallAndDeletePrompt = {
"header" : '<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Warning!",'forJavascript' => true), $this);?>
',
"body"   : '<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Do you really want to delete __PLUGIN__?",'forJavascript' => true), $this);?>
' +
'<br/>' +
'<b><?php echo $this->_reg_objects['g'][0]->text(array('text' => "This will also remove any permissions and clean up any data created by this module.",'forJavascript' => true), $this);?>
</b> ' +
'<?php echo $this->_reg_objects['g'][0]->text(array('text' => "This plugin will be uninstalled and its files will be deleted permanently.",'forJavascript' => true), $this);?>
',
"yes"    : '<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Yes','forJavascript' => true), $this);?>
',
"no"     : '<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'No','forJavascript' => true), $this);?>
'
};
var deletePrompt = {
"header" : '<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Warning!",'forJavascript' => true), $this);?>
',
"body"   : '<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Do you really want to delete __PLUGIN__?",'forJavascript' => true), $this);?>
' +
'<br/>' +
'<?php echo $this->_reg_objects['g'][0]->text(array('text' => "The files of this plugin will be deleted permanently.",'forJavascript' => true), $this);?>
',
"yes"    : '<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Yes','forJavascript' => true), $this);?>
',
"no"     : '<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'No','forJavascript' => true), $this);?>
'
};
var legendStrings = {
"inactive"     : '<?php echo $this->_reg_objects['g'][0]->text(array('text' => "disabled(__COUNT__)",'forJavascript' => true), $this);?>
',
"active"       : '<?php echo $this->_reg_objects['g'][0]->text(array('text' => "up to date(__COUNT__)",'forJavascript' => true), $this);?>
',
"uninstalled"  : '<?php echo $this->_reg_objects['g'][0]->text(array('text' => "not installed(__COUNT__)",'forJavascript' => true), $this);?>
',
"unupgraded"   : '<?php echo $this->_reg_objects['g'][0]->text(array('text' => "upgrade required(__COUNT__)",'forJavascript' => true), $this);?>
',
"incompatible" : '<?php echo $this->_reg_objects['g'][0]->text(array('text' => "incompatible(__COUNT__)",'forJavascript' => true), $this);?>
'
};
var failedToDeleteMessage = '<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Failed to completely delete __PLUGIN__','forJavascript' => true), $this);?>
';
<?php echo '
var contexts = {"module": {}, "theme": {}};
var allActions = ["install", "configure", "upgrade", "activate", "deactivate", "uninstall", "delete"];
YAHOO.util.Event.addListener(window, "scroll", updateStatusPosition, false);
'; ?>

//]]>
</script>
<div id="gbPluginStatusUpdates"></div>
<div class="gbBlock gcBackground1">
<h2> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Gallery Plugins'), $this);?>
 </h2>
</div>
<div class="gbTabBar">
<span class="giSelected o"><span>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Plugins'), $this);?>

</span></span>
<span class="o"><span>
<?php ob_start(); ?>
<a href="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.SiteAdmin",'arg2' => "subView=core.AdminRepository"), $this);?>
"><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Get More Plugins'), $this);?>
</a>
<?php $this->_smarty_vars['capture']['getMoreLink'] = ob_get_contents(); ob_end_clean(); ?>
<?php echo $this->_smarty_vars['capture']['getMoreLink']; ?>

</span></span>
</div>
<?php if ($this->_tpl_vars['AdminPlugins']['showGetMorePluginsTip']): ?>
<div class="gbBlock">
<p class="giDescription">
<h2>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Want more features?  New plugins are just a click away.  Just click the %s link to get started.",'arg1' => $this->_smarty_vars['capture']['getMoreLink']), $this);?>

</h2>
</p>
</div>
<?php endif; ?>
<div class="gbBlock">
<p class="giDescription">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Gallery features come as separate plugins.  You can download and install plugins to add more features to your Gallery, or you can disable features if you don't want to use them.  In order to use a feature, you must install, configure (if necessary) and activate it.  If you don't wish to use a feature, you can deactivate it."), $this);?>

</p>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "gallery:modules/core/templates/JavaScriptWarning.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "gallery:modules/core/templates/AdminPluginsLegend.tpl", 'smarty_include_vars' => array('legendId' => 'top')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<table class="gbDataTable">
<?php $this->assign('group', ""); ?>
<?php $_from = $this->_tpl_vars['AdminPlugins']['plugins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['plugin']):
?>
<?php if ($this->_tpl_vars['group'] != $this->_tpl_vars['plugin']['group']): ?>
<?php if (! empty ( $this->_tpl_vars['group'] )): ?>
<tr><td> &nbsp; </td></tr>
<?php endif; ?>
<tr>
<th colspan="6"><h2><?php echo $this->_tpl_vars['plugin']['groupLabel']; ?>
</h2></th>
</tr><tr>
<th> &nbsp; </th>
<th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Plugin Name'), $this);?>
 </th>
<th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Installed'), $this);?>
 </th>
<th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Version'), $this);?>
 </th>
<th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Description'), $this);?>
 </th>
<th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Actions'), $this);?>
 </th>
</tr>
<?php endif; ?>
<?php $this->assign('group', $this->_tpl_vars['plugin']['group']); ?>
<tr id="plugin-row-<?php echo $this->_tpl_vars['plugin']['type']; ?>
-<?php echo $this->_tpl_vars['plugin']['id']; ?>
" class="<?php echo smarty_function_cycle(array('values' => "gbEven,gbOdd"), $this);?>
">
<td style="position: relative;">
<div id="plugin-icon-<?php echo $this->_tpl_vars['plugin']['type']; ?>
-<?php echo $this->_tpl_vars['plugin']['id']; ?>
" style="height: 16px"></div>
</td>
<td id="plugin-<?php echo $this->_tpl_vars['plugin']['type']; ?>
-<?php echo $this->_tpl_vars['plugin']['id']; ?>
-name">
<div class="gbLink-Help" onclick="window.open('http://codex.gallery2.org/index.php/Gallery2:<?php echo ((is_array($_tmp=$this->_tpl_vars['plugin']['type'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
s:<?php echo $this->_tpl_vars['plugin']['id']; ?>
', 'Gallery2_Help')"><a href="javascript:window.open('http://codex.gallery2.org/index.php/Gallery2:<?php echo ((is_array($_tmp=$this->_tpl_vars['plugin']['type'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
s:<?php echo $this->_tpl_vars['plugin']['id']; ?>
', 'Gallery2_Help'); return false;">&nbsp;<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'help'), $this);?>
&nbsp;</a></div>
<?php if (empty ( $this->_tpl_vars['plugin']['screenshot'] )): ?>
<?php echo $this->_tpl_vars['plugin']['name']; ?>

<?php else: ?>
<span class="gTooltipTarget"><?php echo $this->_tpl_vars['plugin']['name']; ?>
</span>
<?php ob_start(); ?><?php echo $this->_reg_objects['g'][0]->text(array('text' => "Screenshot for %s",'arg1' => $this->_tpl_vars['plugin']['name']), $this);?>
<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('screenshotLabel', ob_get_contents());ob_end_clean(); ?>
<script type="text/javascript">
// <![CDATA[
new YAHOO.widget.Tooltip("gTooltip", {
context: "plugin-<?php echo $this->_tpl_vars['plugin']['type']; ?>
-<?php echo $this->_tpl_vars['plugin']['id']; ?>
-name",
text: '<img src="<?php echo $this->_reg_objects['g'][0]->url(array('href' => ($this->_tpl_vars['plugin']['screenshot'])), $this);?>
" alt="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['screenshotLabel'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html', "UTF-8") : smarty_modifier_escape($_tmp, 'html', "UTF-8")))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript', "UTF-8") : smarty_modifier_escape($_tmp, 'javascript', "UTF-8")); ?>
"/>',
showDelay: 250 });
// ]]>
</script>
<?php endif; ?>
</td>
<td id="plugin-<?php echo $this->_tpl_vars['plugin']['type']; ?>
-<?php echo $this->_tpl_vars['plugin']['id']; ?>
-installedVersion" align="center">
<?php echo $this->_tpl_vars['plugin']['installedVersion']; ?>

</td>
<td id="plugin-<?php echo $this->_tpl_vars['plugin']['type']; ?>
-<?php echo $this->_tpl_vars['plugin']['id']; ?>
-version" align="center">
<?php echo $this->_tpl_vars['plugin']['version']; ?>

</td>
<td>
<?php echo $this->_tpl_vars['plugin']['description']; ?>

<?php if ($this->_tpl_vars['plugin']['state'] == 'incompatible'): ?>
<br/>
<span class="giError">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Incompatible plugin!"), $this);?>

<?php if ($this->_tpl_vars['plugin']['api']['required']['core'] != $this->_tpl_vars['plugin']['api']['provided']['core']): ?>
<br/>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Core API Required: %s (available: %s)",'arg1' => $this->_tpl_vars['plugin']['api']['required']['core'],'arg2' => $this->_tpl_vars['plugin']['api']['provided']['core']), $this);?>

<?php endif; ?>
<?php if ($this->_tpl_vars['plugin']['api']['required']['plugin'] != $this->_tpl_vars['plugin']['api']['provided']['plugin']): ?>
<br/>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Plugin API Required: %s (available: %s)",'arg1' => $this->_tpl_vars['plugin']['api']['required']['plugin'],'arg2' => $this->_tpl_vars['plugin']['api']['provided']['plugin']), $this);?>

<?php endif; ?>
</span>
<?php endif; ?>
</td>
<td style="width: 150px">
<?php if (( $this->_tpl_vars['plugin']['type'] == 'module' && $this->_tpl_vars['plugin']['id'] == 'core' ) || $this->_tpl_vars['plugin']['state'] == 'incompatible'): ?>
&nbsp;
<?php else: ?>
<span id="action-install-<?php echo $this->_tpl_vars['plugin']['type']; ?>
-<?php echo $this->_tpl_vars['plugin']['id']; ?>
" style="display: none">
<a style="cursor: pointer" onclick="performPluginAction('<?php echo $this->_tpl_vars['plugin']['type']; ?>
', '<?php echo $this->_tpl_vars['plugin']['id']; ?>
', '<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.PluginCallback",'arg2' => "pluginId=".($this->_tpl_vars['plugin']['id']),'arg3' => "pluginType=".($this->_tpl_vars['plugin']['type']),'arg4' => "command=install",'useAuthToken' => 1), $this);?>
')">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'install'), $this);?>

</a>
</span>
<span id="action-upgrade-<?php echo $this->_tpl_vars['plugin']['type']; ?>
-<?php echo $this->_tpl_vars['plugin']['id']; ?>
" style="display: none">
<a style="cursor: pointer" onclick="performPluginAction('<?php echo $this->_tpl_vars['plugin']['type']; ?>
', '<?php echo $this->_tpl_vars['plugin']['id']; ?>
', '<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.PluginCallback",'arg2' => "pluginId=".($this->_tpl_vars['plugin']['id']),'arg3' => "pluginType=".($this->_tpl_vars['plugin']['type']),'arg4' => "command=upgrade",'useAuthToken' => 1), $this);?>
')">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'upgrade'), $this);?>

</a>
</span>
<span id="action-configure-<?php echo $this->_tpl_vars['plugin']['type']; ?>
-<?php echo $this->_tpl_vars['plugin']['id']; ?>
" style="display: none">
<a style="cursor: pointer" onclick="performPluginAction('<?php echo $this->_tpl_vars['plugin']['type']; ?>
', '<?php echo $this->_tpl_vars['plugin']['id']; ?>
', '<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.PluginCallback",'arg2' => "pluginId=".($this->_tpl_vars['plugin']['id']),'arg3' => "pluginType=".($this->_tpl_vars['plugin']['type']),'arg4' => "command=configure",'useAuthToken' => 1), $this);?>
')">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'configure'), $this);?>

</a> |
</span>
<span id="action-activate-<?php echo $this->_tpl_vars['plugin']['type']; ?>
-<?php echo $this->_tpl_vars['plugin']['id']; ?>
" style="display: none">
<a style="cursor: pointer" onclick="performPluginAction('<?php echo $this->_tpl_vars['plugin']['type']; ?>
', '<?php echo $this->_tpl_vars['plugin']['id']; ?>
', '<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.PluginCallback",'arg2' => "pluginId=".($this->_tpl_vars['plugin']['id']),'arg3' => "pluginType=".($this->_tpl_vars['plugin']['type']),'arg4' => "command=activate",'useAuthToken' => 1), $this);?>
')">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'activate'), $this);?>

</a> |
</span>
<?php if (! ( $this->_tpl_vars['plugin']['type'] == 'theme' && $this->_tpl_vars['plugin']['id'] == $this->_tpl_vars['AdminPlugins']['defaultTheme'] && $this->_tpl_vars['plugin']['state'] == 'active' )): ?>
<span id="action-deactivate-<?php echo $this->_tpl_vars['plugin']['type']; ?>
-<?php echo $this->_tpl_vars['plugin']['id']; ?>
" style="display: none">
<a style="cursor: pointer" onclick="performPluginAction('<?php echo $this->_tpl_vars['plugin']['type']; ?>
', '<?php echo $this->_tpl_vars['plugin']['id']; ?>
', '<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.PluginCallback",'arg2' => "pluginId=".($this->_tpl_vars['plugin']['id']),'arg3' => "pluginType=".($this->_tpl_vars['plugin']['type']),'arg4' => "command=deactivate",'useAuthToken' => 1), $this);?>
')">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'deactivate'), $this);?>

</a> |
</span>
<span id="action-uninstall-<?php echo $this->_tpl_vars['plugin']['type']; ?>
-<?php echo $this->_tpl_vars['plugin']['id']; ?>
" style="display: none">
<a style="cursor: pointer" onclick="verify(uninstallPrompt, '<?php echo $this->_tpl_vars['plugin']['type']; ?>
', '<?php echo $this->_tpl_vars['plugin']['id']; ?>
', '<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.PluginCallback",'arg2' => "pluginId=".($this->_tpl_vars['plugin']['id']),'arg3' => "pluginType=".($this->_tpl_vars['plugin']['type']),'arg4' => "command=uninstall",'useAuthToken' => 1), $this);?>
')">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'uninstall'), $this);?>

</a>
</span>
<?php if ($this->_tpl_vars['AdminPlugins']['canDeletePlugins']): ?>
<span id="action-delete-<?php echo $this->_tpl_vars['plugin']['type']; ?>
-<?php echo $this->_tpl_vars['plugin']['id']; ?>
" style="display: none">
| <a style="cursor: pointer" onclick="verify(pluginData['<?php echo $this->_tpl_vars['plugin']['type']; ?>
']['<?php echo $this->_tpl_vars['plugin']['id']; ?>
']['state'] == 'uninstalled' ? deletePrompt : uninstallAndDeletePrompt, '<?php echo $this->_tpl_vars['plugin']['type']; ?>
', '<?php echo $this->_tpl_vars['plugin']['id']; ?>
', '<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.PluginCallback",'arg2' => "pluginId=".($this->_tpl_vars['plugin']['id']),'arg3' => "pluginType=".($this->_tpl_vars['plugin']['type']),'arg4' => "command=delete",'useAuthToken' => 1), $this);?>
')">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'delete'), $this);?>

</a>
</span>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<script type="text/javascript"> updatePluginState('<?php echo $this->_tpl_vars['plugin']['type']; ?>
', '<?php echo $this->_tpl_vars['plugin']['id']; ?>
', '<?php echo $this->_tpl_vars['plugin']['state']; ?>
', false); </script>
</td>
</tr>
<?php endforeach; endif; unset($_from); ?>
</table>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "gallery:modules/core/templates/AdminPluginsLegend.tpl", 'smarty_include_vars' => array('legendId' => 'bottom')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript"> updateStateCounts(); </script>
</div>