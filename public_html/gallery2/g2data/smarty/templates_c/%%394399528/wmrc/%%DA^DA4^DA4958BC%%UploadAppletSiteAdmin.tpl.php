<?php /* Smarty version 2.6.20, created on 2010-03-31 20:40:12
         compiled from gallery:modules/uploadapplet/templates/UploadAppletSiteAdmin.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'gallery:modules/uploadapplet/templates/UploadAppletSiteAdmin.tpl', 22, false),array('modifier', 'regex_replace', 'gallery:modules/uploadapplet/templates/UploadAppletSiteAdmin.tpl', 24, false),)), $this); ?>
<div class="gbBlock gcBackground1">
<h2> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Upload Applet Settings'), $this);?>
 </h2>
</div>
<input type="hidden" name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[variable][type]"), $this);?>
" />
<table><tr valign="top"><td>
<div class="gbBlock">
<h3><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Defaults'), $this);?>
</h3>
<p><?php echo $this->_reg_objects['g'][0]->text(array('text' => "These variables provide default values for applets users execute on your site. Users will be able to override these defaults by making changes in the user interface of the applets, or by changing their local defaults file."), $this);?>
</p>
<?php if (empty ( $this->_tpl_vars['form']['uploaddefaultVariables'] )): ?>
<p><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'You have no default variables'), $this);?>
</p>
<?php else: ?>
<table class="gbDataTable">
<tr>
<th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Variable'), $this);?>
 </th>
<th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Action'), $this);?>
 </th>
</tr>
<?php $_from = $this->_tpl_vars['form']['uploaddefaultVariables']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['variable']):
?>
<tr class="<?php echo smarty_function_cycle(array('values' => "gbEven,gbOdd"), $this);?>
">
<td><?php echo $this->_tpl_vars['variable']; ?>
</td>
<td><a href="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "controller=uploadapplet.UploadAppletSiteAdmin",'arg2' => "form[action][delete]=1",'arg3' => ((is_array($_tmp=$this->_tpl_vars['variable'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/^(.*?)=.*$/", "form[delete][variable]=\\1") : smarty_modifier_regex_replace($_tmp, "/^(.*?)=.*$/", "form[delete][variable]=\\1")),'arg4' => "form[variable][type]=default",'arg5' => "mode=variables"), $this);?>
">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Delete'), $this);?>
</a></td>
</tr>
<?php endforeach; endif; unset($_from); ?>
</table>
<?php endif; ?>
</div>
<div class="gbBlock">
<h4> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Add a new default variable'), $this);?>
 </h4>
<?php if (isset ( $this->_tpl_vars['form']['error']['default'] )): ?>
<div class="giError">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'You must enter a variable name and value'), $this);?>

</div>
<?php endif; ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'New variable'), $this);?>
<br/>
<input type="text" name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[default][name]"), $this);?>
" /> =
<input type="text" name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[default][value]"), $this);?>
" />
</div>
<div class="gbBlock gcBackground1">
<input type="submit" class="inputTypeSubmit"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][add]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Add variable'), $this);?>
"
onclick="javascript:this.form['<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[variable][type]"), $this);?>
'].value='default';this.form.submit();" />
</div>
<div class="gbBlock">
<h3><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Overrides'), $this);?>
</h3>
<p><?php echo $this->_reg_objects['g'][0]->text(array('text' => "These variables override any other values for applets users execute on your site. Users will not be able to change these values."), $this);?>
</p>
<?php if (empty ( $this->_tpl_vars['form']['uploadoverrideVariables'] )): ?>
<p><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'You have no override variables'), $this);?>
</p>
<?php else: ?>
<table class="gbDataTable">
<tr>
<th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Variable'), $this);?>
 </th>
<th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Action'), $this);?>
 </th>
</tr>
<?php $_from = $this->_tpl_vars['form']['uploadoverrideVariables']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['variable']):
?>
<tr class="<?php echo smarty_function_cycle(array('values' => "gbEven,gbOdd"), $this);?>
">
<td><?php echo $this->_tpl_vars['variable']; ?>
</td>
<td><a href="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "controller=uploadapplet.UploadAppletSiteAdmin",'arg2' => "form[action][delete]=1",'arg3' => ((is_array($_tmp=$this->_tpl_vars['variable'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/^(.*?)=.*$/", "form[delete][variable]=\\1") : smarty_modifier_regex_replace($_tmp, "/^(.*?)=.*$/", "form[delete][variable]=\\1")),'arg4' => "form[variable][type]=override",'arg5' => "mode=variables"), $this);?>
">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Delete'), $this);?>
</a></td>
</tr>
<?php endforeach; endif; unset($_from); ?>
</table>
<?php endif; ?>
</div>
<div class="gbBlock">
<h4> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Add a new override variable'), $this);?>
 </h4>
<?php if (isset ( $this->_tpl_vars['form']['error']['override'] )): ?>
<div class="giError">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'You must enter a variable name and value'), $this);?>

</div>
<?php endif; ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'New variable'), $this);?>
<br/>
<input type="text" name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[override][name]"), $this);?>
" /> =
<input type="text" name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[override][value]"), $this);?>
" />
</div>
<div class="gbBlock gcBackground1">
<input type="submit" class="inputTypeSubmit"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][add]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Add variable'), $this);?>
"
onclick="javascript:this.form['<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[variable][type]"), $this);?>
'].value='override';this.form.submit();" />
</div>
</td><td>
<div class="gbBlock">
<h3><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Help'), $this);?>
</h3>
<p><?php echo $this->_reg_objects['g'][0]->text(array('text' => "Here is a selection of variables that affect uploads."), $this);?>
</p>
<table class="gbDataTable">
<tr><th><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'variable'), $this);?>
</th><th><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'values'), $this);?>
</th><th><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'help'), $this);?>
</th></tr>
<tr class="gbEven"><td>resizeBeforeUpload</td><td>true/false</td>
<td><?php echo $this->_reg_objects['g'][0]->text(array('text' => "instructs the applet to resize pictures before uploading to the album; by default, resizes to the album's intermediate image size"), $this);?>
</td></tr>
<tr class="gbOdd"><td>resizeTo1</td><td>600</td>
<td><?php echo $this->_reg_objects['g'][0]->text(array('text' => "dimension the images will be resized to; this overrides album settings"), $this);?>
</td></tr>
<tr class="gbEven"><td>setCaptionsNone</td><td>true/false</td>
<td><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'no automatic captions'), $this);?>
</td></tr>
<tr class="gbOdd"><td>setCaptionsWithFilenames</td><td>true/false</td>
<td><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'use filenames for captions'), $this);?>
</td></tr>
<tr class="gbEven"><td>captionStripExtension</td><td>true/false</td>
<td><?php echo $this->_reg_objects['g'][0]->text(array('text' => "if using the filename for captions, strip the extension"), $this);?>
</td></tr>
<tr class="gbOdd"><td>setCaptionsWithMetadataComment</td><td>true/false</td>
<td><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'use EXIF extension for caption'), $this);?>
</td></tr>
<tr class="gbOdd"><td>htmlEscapeCaptions</td><td>true/false</td>
<td><?php echo $this->_reg_objects['g'][0]->text(array('text' => "if false, the upload applet will use UTF-8 to send image meta-data to Gallery, rather than escaping it with HTML entities"), $this);?>
</td></tr>
<tr class="gbEven"><td>useJavaResize</td><td>true/false</td>
<td><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'set to false if you want to avoid losing EXIF data when the image is resized and ImageMagick is not found'), $this);?>
</td></tr>
<tr class="gbOdd"><td>suppressWarningIM</td><td>true/false</td>
<td><?php echo $this->_reg_objects['g'][0]->text(array('text' => "if true, the applet will not complain if it can't find ImageMagick"), $this);?>
</td></tr>
<tr class="gbEven"><td>suppressWarningJpegtran</td><td>true/false</td>
<td><?php echo $this->_reg_objects['g'][0]->text(array('text' => "if true, the applet will not complain if it can't find Jpegtran"), $this);?>
</td></tr>
<tr class="gbOdd"><td>im.jpegQuality</td><td>0-99</td>
<td><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'quality of JPEG compression when resizing with ImageMagick'), $this);?>
</td></tr>
</table>
<p><a href="https://gallery.svn.sourceforge.net/svnroot/gallery/trunk/gallery_remote/defaults.properties" target="other">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Complete list of variables'), $this);?>
</a></p>
</div>
</td></tr></table>