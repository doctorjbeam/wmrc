<?php /* Smarty version 2.6.20, created on 2010-06-13 19:23:38
         compiled from modules/slideshow/templates/SlideshowMediaRss.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'markup', 'modules/slideshow/templates/SlideshowMediaRss.tpl', 22, false),array('modifier', 'escape', 'modules/slideshow/templates/SlideshowMediaRss.tpl', 22, false),)), $this); ?>
<?php echo '<?xml'; ?>
 version="1.0" encoding="UTF-8" standalone="yes"<?php echo '?>'; ?>

<rss version="2.0" xmlns:media="http://search.yahoo.com/mrss" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
<title>  </title>
<link><?php echo $this->_reg_objects['g'][0]->url(array('forceFullUrl' => true), $this);?>
</link>
<description>  </description>
<language>  </language>
<?php if (isset ( $this->_tpl_vars['SlideshowMediaRss']['prevOffset'] )): ?>
<atom:link rel="previous" href="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=slideshow.SlideshowMediaRss",'arg2' => "itemId=".($this->_tpl_vars['SlideshowMediaRss']['itemId']),'arg3' => "offset=".($this->_tpl_vars['SlideshowMediaRss']['prevOffset']),'forceFullUrl' => true), $this);?>
"/>
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['SlideshowMediaRss']['nextOffset'] )): ?>
<atom:link rel="next" href="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=slideshow.SlideshowMediaRss",'arg2' => "itemId=".($this->_tpl_vars['SlideshowMediaRss']['itemId']),'arg3' => "offset=".($this->_tpl_vars['SlideshowMediaRss']['nextOffset']),'forceFullUrl' => true), $this);?>
"/>
<?php endif; ?>    
<?php $_from = $this->_tpl_vars['SlideshowMediaRss']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i']):
?>
<item>
<title type="html"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['i']['item']['title'])) ? $this->_run_mod_handler('markup', true, $_tmp) : smarty_modifier_markup($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</title>
<link><?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.ShowItem",'arg2' => "itemId=".($this->_tpl_vars['i']['item']['id']),'forceFullUrl' => true), $this);?>
</link>
<guid><?php echo $this->_tpl_vars['i']['item']['id']; ?>
</guid>
<media:thumbnail url="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.DownloadItem",'arg2' => "itemId=".($this->_tpl_vars['i']['thumbnail']['id']),'arg3' => "serialNumber=".($this->_tpl_vars['i']['thumbnail']['serialNumber']),'forceFullUrl' => true), $this);?>
" <?php if (! empty ( $this->_tpl_vars['i']['thumbnail']['height'] )): ?>height="<?php echo $this->_tpl_vars['i']['thumbnail']['height']; ?>
" width="<?php echo $this->_tpl_vars['i']['thumbnail']['width']; ?>
"<?php endif; ?> type="<?php echo $this->_tpl_vars['i']['thumbnail']['mimeType']; ?>
"/>
<?php if (! empty ( $this->_tpl_vars['i']['image']['mimeType'] )): ?>
<media:content url="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.DownloadItem",'arg2' => "itemId=".($this->_tpl_vars['i']['image']['id']),'arg3' => "serialNumber=".($this->_tpl_vars['i']['image']['serialNumber']),'forceFullUrl' => true), $this);?>
" <?php if (! empty ( $this->_tpl_vars['i']['image']['height'] )): ?>height="<?php echo $this->_tpl_vars['i']['image']['height']; ?>
" width="<?php echo $this->_tpl_vars['i']['image']['width']; ?>
"<?php endif; ?> type="<?php echo $this->_tpl_vars['i']['image']['mimeType']; ?>
"/>
<?php endif; ?>
<description type="html"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['i']['item']['summary'])) ? $this->_run_mod_handler('markup', true, $_tmp) : smarty_modifier_markup($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</description>
</item>
<?php endforeach; endif; unset($_from); ?>
</channel>
</rss>