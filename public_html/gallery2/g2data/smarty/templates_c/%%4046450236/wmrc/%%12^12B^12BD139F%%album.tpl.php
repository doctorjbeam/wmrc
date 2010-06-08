<?php /* Smarty version 2.6.20, created on 2010-06-08 05:00:38
         compiled from gallery:themes/wmrc/templates/album.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'markup', 'gallery:themes/wmrc/templates/album.tpl', 7, false),array('modifier', 'default', 'gallery:themes/wmrc/templates/album.tpl', 44, false),array('modifier', 'entitytruncate', 'gallery:themes/wmrc/templates/album.tpl', 53, false),)), $this); ?>
<h2><?php echo ((is_array($_tmp=$this->_tpl_vars['theme']['item']['title'])) ? $this->_run_mod_handler('markup', true, $_tmp) : smarty_modifier_markup($_tmp)); ?>
</h2>
<?php if (! count ( $this->_tpl_vars['theme']['children'] )): ?>
<div class="gallery-empty">
<p><strong><?php echo $this->_reg_objects['g'][0]->text(array('text' => "This album is empty."), $this);?>
</strong></p>
<?php if (isset ( $this->_tpl_vars['theme']['permissions']['core_addDataItem'] )): ?>
<p><a href="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.ItemAdmin",'arg2' => "subView=core.ItemAdd",'arg3' => "itemId=".($this->_tpl_vars['theme']['item']['id'])), $this);?>
"><?php echo $this->_reg_objects['g'][0]->text(array('text' => "Add a photo!"), $this);?>
</a></p>
<?php endif; ?>
</div>
<?php else: ?>
<?php $this->assign('firstAlbum', true); ?>
<?php $this->assign('currentYear', ""); ?>
<?php $_from = $this->_tpl_vars['theme']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['child']):
?>
<?php if ($this->_tpl_vars['child']['canContainChildren']): ?>
<?php if ($this->_tpl_vars['firstAlbum']): ?>
<div class="gallery-albums">
<?php $this->assign('firstAlbum', false); ?>
<?php endif; ?>
<?php if ($this->_tpl_vars['theme']['params']['groupByYear']): ?>
<?php ob_start(); ?><?php echo $this->_reg_objects['g'][0]->date(array('format' => "%Y",'timestamp' => $this->_tpl_vars['child']['originationTimestamp']), $this);?>
<?php $this->_smarty_vars['capture']['year'] = ob_get_contents(); ob_end_clean(); ?>
<?php if ($this->_smarty_vars['capture']['year'] != $this->_tpl_vars['currentYear']): ?>
<h3 style="clear: both;"><?php echo $this->_smarty_vars['capture']['year']; ?>
</h3>
<?php $this->assign('currentYear', $this->_smarty_vars['capture']['year']); ?>
<?php endif; ?>
<?php endif; ?>
<div class="gallery-album">
<div class="gallery-thumb">
<a href="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.ShowItem",'arg2' => "itemId=".($this->_tpl_vars['child']['id'])), $this);?>
">
<?php if (isset ( $this->_tpl_vars['child']['thumbnail'] )): ?>
<?php echo $this->_reg_objects['g'][0]->image(array('item' => $this->_tpl_vars['child'],'image' => $this->_tpl_vars['child']['thumbnail']), $this);?>

<?php else: ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'no thumbnail'), $this);?>

<?php endif; ?>
</a>
</div>
<h4><a href="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.ShowItem",'arg2' => "itemId=".($this->_tpl_vars['child']['id'])), $this);?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['child']['title'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['child']['pathComponent']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['child']['pathComponent'])))) ? $this->_run_mod_handler('markup', true, $_tmp) : smarty_modifier_markup($_tmp)); ?>
</a></h4>
<div class="meta">
<?php if (( $this->_tpl_vars['child']['descendentCount'] > 0 )): ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "%d Images",'arg1' => $this->_tpl_vars['child']['descendentCount']), $this);?>

<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['child']['itemSummaries']['newitems'] )): ?>
<span class="summary-newitems summary"><?php echo $this->_tpl_vars['child']['itemSummaries']['newitems']; ?>
</span>
<?php endif; ?>
</div>
<p><?php if (isset ( $this->_tpl_vars['child']['summary'] )): ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['child']['summary'])) ? $this->_run_mod_handler('entitytruncate', true, $_tmp, 256) : smarty_modifier_entitytruncate($_tmp, 256)))) ? $this->_run_mod_handler('markup', true, $_tmp) : smarty_modifier_markup($_tmp)); ?>
<?php endif; ?></p>
</div>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<?php if (! $this->_tpl_vars['firstAlbum']): ?>
<div class="clear"></div>
</div>
<?php endif; ?>
<?php $this->assign('firstItem', true); ?>
<?php $_from = $this->_tpl_vars['theme']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['child']):
?>
<?php if (! $this->_tpl_vars['child']['canContainChildren']): ?>
<?php if ($this->_tpl_vars['firstItem']): ?>
<div class="gallery-items">
<?php $this->assign('firstItem', false); ?>
<?php endif; ?>
<div class="gallery-thumb">
<a href="<?php echo $this->_reg_objects['g'][0]->url(array('params' => $this->_tpl_vars['theme']['pageUrl'],'arg1' => "itemId=".($this->_tpl_vars['child']['id'])), $this);?>
">
<?php if (isset ( $this->_tpl_vars['child']['thumbnail'] )): ?>
<?php echo $this->_reg_objects['g'][0]->image(array('item' => $this->_tpl_vars['child'],'image' => $this->_tpl_vars['child']['thumbnail']), $this);?>

<?php else: ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'no thumbnail'), $this);?>

<?php endif; ?>
</a>
</div>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<?php if (! $this->_tpl_vars['firstItem']): ?>
<div class="clear"></div>
</div>
<?php endif; ?>
<?php endif; ?>
<?php if ($this->_tpl_vars['theme']['totalPages'] > 1): ?>
<p style="clear: both;">
<?php echo $this->_reg_objects['g'][0]->block(array('type' => "core.Navigator",'navigator' => $this->_tpl_vars['theme']['navigator'],'prefix' => "&laquo; ",'suffix' => " &raquo;",'currentPage' => $this->_tpl_vars['theme']['currentPage'],'totalPages' => $this->_tpl_vars['theme']['totalPages']), $this);?>

</p>
<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['theme']['item']['description'] )): ?>
<hr />
<p><?php echo ((is_array($_tmp=$this->_tpl_vars['theme']['item']['description'])) ? $this->_run_mod_handler('markup', true, $_tmp) : smarty_modifier_markup($_tmp)); ?>
</p>
<?php endif; ?>
<?php $_from = $this->_tpl_vars['theme']['params']['albumBlocks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['block']):
?>
<?php echo $this->_reg_objects['g'][0]->block(array('type' => $this->_tpl_vars['block']['0'],'params' => $this->_tpl_vars['block']['1']), $this);?>

<?php endforeach; endif; unset($_from); ?>
<?php if (empty ( $this->_tpl_vars['theme']['parents'] )): ?>
<div class="gbSystemLinks">
<?php echo $this->_reg_objects['g'][0]->block(array('type' => "core.SystemLinks",'order' => "core.SiteAdmin core.YourAccount core.Login core.Logout",'othersAt' => 4), $this);?>

</div>
<?php endif; ?>
<?php echo $this->_reg_objects['g'][0]->block(array('type' => "core.GuestPreview",'class' => 'gbBlock'), $this);?>

<?php echo $this->_reg_objects['g'][0]->block(array('type' => "core.EmergencyEditItemLink",'class' => 'gbBlock','checkBlocks' => 'album'), $this);?>
