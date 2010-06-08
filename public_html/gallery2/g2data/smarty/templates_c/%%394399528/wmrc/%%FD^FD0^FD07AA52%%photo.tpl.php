<?php /* Smarty version 2.6.20, created on 2010-03-31 20:50:31
         compiled from gallery:themes/wmrc/templates/photo.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'markup', 'gallery:themes/wmrc/templates/photo.tpl', 10, false),array('modifier', 'default', 'gallery:themes/wmrc/templates/photo.tpl', 60, false),array('function', 'math', 'gallery:themes/wmrc/templates/photo.tpl', 58, false),)), $this); ?>
<?php if (! empty ( $this->_tpl_vars['theme']['imageViews'] )): ?>
<?php $this->assign('image', $this->_tpl_vars['theme']['imageViews'][$this->_tpl_vars['theme']['imageViewsIndex']]); ?>
<?php endif; ?>
<h2><?php echo ((is_array($_tmp=$this->_tpl_vars['theme']['item']['title'])) ? $this->_run_mod_handler('markup', true, $_tmp) : smarty_modifier_markup($_tmp)); ?>
</h2>
<?php if (! empty ( $this->_tpl_vars['theme']['imageViews'] )): ?>
<?php ob_start(); ?>
<a href="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.DownloadItem",'arg2' => "itemId=".($this->_tpl_vars['theme']['item']['id']),'forceFullUrl' => true,'forceSessionId' => true), $this);?>
">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Download %s",'arg1' => $this->_tpl_vars['theme']['sourceImage']['itemTypeName']['1']), $this);?>

</a>
<?php $this->_smarty_vars['capture']['fallback'] = ob_get_contents(); ob_end_clean(); ?>
<?php if (( $this->_tpl_vars['image']['viewInline'] )): ?>
<div class="gallery-photo">
<?php if ($this->_tpl_vars['theme']['params']['enableImageMap']): ?><?php echo ''; ?><?php if (isset ( $this->_tpl_vars['theme']['navigator']['back'] )): ?><?php echo '<a href="'; ?><?php echo $this->_reg_objects['g'][0]->url(array('params' => $this->_tpl_vars['theme']['navigator']['back']['urlParams']), $this);?><?php echo '"id="prevArrow" style="position: absolute; margin: 30px 0 0 30px; visibility: hidden"onmouseover="document.getElementById(\'prevArrow\').style.visibility=\'visible\'"onmouseout="document.getElementById(\'prevArrow\').style.visibility=\'hidden\'"><img src="'; ?><?php echo $this->_reg_objects['g'][0]->theme(array('url' => "images/arrow-left.gif"), $this);?><?php echo '" alt="" width="20" height="17"/></a>'; ?><?php endif; ?><?php echo ''; ?><?php echo $this->_reg_objects['g'][0]->image(array('item' => $this->_tpl_vars['theme']['item'],'image' => $this->_tpl_vars['image'],'class' => "gallery-photo",'fallback' => $this->_smarty_vars['capture']['fallback'],'usemap' => "#prevnext"), $this);?><?php echo ''; ?><?php if (isset ( $this->_tpl_vars['theme']['navigator']['next'] )): ?><?php echo '<a href="'; ?><?php echo $this->_reg_objects['g'][0]->url(array('params' => $this->_tpl_vars['theme']['navigator']['next']['urlParams']), $this);?><?php echo '"id="nextArrow" style="position:absolute; margin: 30px 0 0 -50px; visibility: hidden"onmouseover="document.getElementById(\'nextArrow\').style.visibility=\'visible\'"onmouseout="document.getElementById(\'nextArrow\').style.visibility=\'hidden\'"><img src="'; ?><?php echo $this->_reg_objects['g'][0]->theme(array('url' => "images/arrow-right.gif"), $this);?><?php echo '" alt="" width="20" height="17"/></a>'; ?><?php endif; ?><?php echo ''; ?>
<?php else: ?>
<?php echo $this->_reg_objects['g'][0]->image(array('item' => $this->_tpl_vars['theme']['item'],'image' => $this->_tpl_vars['image'],'class' => "gallery-photo",'fallback' => $this->_smarty_vars['capture']['fallback']), $this);?>

<?php endif; ?>
</div>
<p style="text-align: center;">
<a href="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.DownloadItem",'arg2' => "itemId=".($this->_tpl_vars['theme']['item']['id']),'forceFullUrl' => true,'forceSessionId' => true), $this);?>
">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Download %s",'arg1' => $this->_tpl_vars['theme']['sourceImage']['itemTypeName']['1']), $this);?>

</a>
</p>
<?php else: ?>
<?php echo $this->_smarty_vars['capture']['fallback']; ?>

<?php endif; ?>
<?php else: ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "There is nothing to view for this item."), $this);?>

<?php endif; ?>
<?php if ($this->_tpl_vars['theme']['params']['enableImageMap'] && ! empty ( $this->_tpl_vars['image']['width'] ) && ! empty ( $this->_tpl_vars['image']['height'] )): ?>
<map id="prevnext" name="prevnext">
<?php if (isset ( $this->_tpl_vars['theme']['navigator']['back'] )): ?>
<area shape="rect" coords="0,0,<?php echo smarty_function_math(array('equation' => "round(x/2-1)",'x' => $this->_tpl_vars['image']['width']), $this);?>
,<?php echo $this->_tpl_vars['image']['height']; ?>
"
href="<?php echo $this->_reg_objects['g'][0]->url(array('params' => $this->_tpl_vars['theme']['navigator']['back']['urlParams']), $this);?>
"
alt="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['theme']['item']['title'])) ? $this->_run_mod_handler('markup', true, $_tmp, 'strip') : smarty_modifier_markup($_tmp, 'strip')))) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['theme']['item']['pathComponent']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['theme']['item']['pathComponent'])); ?>
"
onmouseover="document.getElementById('prevArrow').style.visibility='visible'"
onmouseout="document.getElementById('prevArrow').style.visibility='hidden'"/>
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['theme']['navigator']['next'] )): ?>
<area shape="rect" coords="<?php echo smarty_function_math(array('equation' => "round(x/2)",'x' => $this->_tpl_vars['image']['width']), $this);?>
,0,<?php echo $this->_tpl_vars['image']['width']; ?>
,<?php echo $this->_tpl_vars['image']['height']; ?>
"
href="<?php echo $this->_reg_objects['g'][0]->url(array('params' => $this->_tpl_vars['theme']['navigator']['next']['urlParams']), $this);?>
"
alt="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['theme']['item']['title'])) ? $this->_run_mod_handler('markup', true, $_tmp, 'strip') : smarty_modifier_markup($_tmp, 'strip')))) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['theme']['item']['pathComponent']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['theme']['item']['pathComponent'])); ?>
"
onmouseover="document.getElementById('nextArrow').style.visibility='visible'"
onmouseout="document.getElementById('nextArrow').style.visibility='hidden'"/>
<?php endif; ?>
</map>
<?php endif; ?>
<br style="clear: both;" />
<?php if (! empty ( $this->_tpl_vars['theme']['navigator'] )): ?>
<?php echo $this->_reg_objects['g'][0]->callback(array('type' => "core.LoadPeers",'item' => $this->_tpl_vars['theme']['item'],'windowSize' => 1), $this);?>

<?php echo $this->_reg_objects['g'][0]->block(array('type' => "core.Navigator",'navigator' => $this->_tpl_vars['theme']['navigator'],'prefix' => "&laquo; ",'suffix' => " &raquo;",'currentItem' => $this->_tpl_vars['block']['core']['LoadPeers']['thisPeerIndex'],'totalItems' => $this->_tpl_vars['block']['core']['LoadPeers']['peerCount']), $this);?>

<?php endif; ?>
<hr/>
<?php if (! empty ( $this->_tpl_vars['theme']['item']['description'] ) && ( $this->_tpl_vars['theme']['item']['description'] != $this->_tpl_vars['theme']['item']['title'] )): ?>
<p><?php echo ((is_array($_tmp=$this->_tpl_vars['theme']['item']['description'])) ? $this->_run_mod_handler('markup', true, $_tmp) : smarty_modifier_markup($_tmp)); ?>
</p>
<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['theme']['sourceImage'] ) && ( count ( $this->_tpl_vars['theme']['imageViews'] ) > 1 || $this->_tpl_vars['theme']['sourceImage']['mimeType'] != $this->_tpl_vars['theme']['item']['mimeType'] )): ?>
<p>
<?php if ($this->_tpl_vars['theme']['sourceImage']['mimeType'] != $this->_tpl_vars['theme']['item']['mimeType']): ?>
<a href="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.DownloadItem",'arg2' => "itemId=".($this->_tpl_vars['theme']['item']['id'])), $this);?>
">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Download %s in original format",'arg1' => $this->_tpl_vars['theme']['sourceImage']['itemTypeName']['1']), $this);?>

<?php else: ?>
<a href="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.DownloadItem",'arg2' => "itemId=".($this->_tpl_vars['theme']['sourceImage']['id'])), $this);?>
">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Download %s",'arg1' => $this->_tpl_vars['theme']['sourceImage']['itemTypeName']['1']), $this);?>

<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['theme']['sourceImage']['width'] )): ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "(%dx%d)",'arg1' => $this->_tpl_vars['theme']['sourceImage']['width'],'arg2' => $this->_tpl_vars['theme']['sourceImage']['height']), $this);?>

<?php endif; ?>
</a>
</p>
<?php endif; ?>
<?php $_from = $this->_tpl_vars['theme']['params']['photoBlocks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['block']):
?>
<?php echo $this->_reg_objects['g'][0]->block(array('type' => $this->_tpl_vars['block']['0'],'params' => $this->_tpl_vars['block']['1']), $this);?>

<?php endforeach; endif; unset($_from); ?>
<?php echo $this->_reg_objects['g'][0]->block(array('type' => "core.GuestPreview",'class' => 'gbBlock'), $this);?>

<?php echo $this->_reg_objects['g'][0]->block(array('type' => "core.EmergencyEditItemLink",'class' => 'gbBlock','checkBlocks' => 'photo'), $this);?>
