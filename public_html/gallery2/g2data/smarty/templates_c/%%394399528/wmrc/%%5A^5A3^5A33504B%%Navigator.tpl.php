<?php /* Smarty version 2.6.20, created on 2010-03-31 20:50:25
         compiled from gallery:modules/core/templates/blocks/Navigator.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'gallery:modules/core/templates/blocks/Navigator.tpl', 10, false),array('modifier', 'split', 'gallery:modules/core/templates/blocks/Navigator.tpl', 17, false),)), $this); ?>
<?php if (isset ( $this->_tpl_vars['reverseOrder'] ) && $this->_tpl_vars['reverseOrder']): ?>
<?php $this->assign('order', "next-and-last current first-and-previous"); ?>
<?php else: ?>
<?php $this->assign('order', "first-and-previous current next-and-last"); ?>
<?php endif; ?>
<?php $this->assign('prefix', ((is_array($_tmp=@$this->_tpl_vars['prefix'])) ? $this->_run_mod_handler('default', true, $_tmp, "") : smarty_modifier_default($_tmp, ""))); ?>
<?php $this->assign('suffix', ((is_array($_tmp=@$this->_tpl_vars['suffix'])) ? $this->_run_mod_handler('default', true, $_tmp, "") : smarty_modifier_default($_tmp, ""))); ?>
<div class="<?php echo $this->_tpl_vars['class']; ?>
">
<?php $_from = ((is_array($_tmp=$this->_tpl_vars['order'])) ? $this->_run_mod_handler('split', true, $_tmp) : smarty_modifier_split($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['which']):
?>
<?php if ($this->_tpl_vars['which'] == "next-and-last"): ?>
<div class="next-and-last<?php if (! isset ( $this->_tpl_vars['navigator']['first'] ) && ! isset ( $this->_tpl_vars['navigator']['back'] )): ?> no-previous<?php endif; ?>">
<?php echo ''; ?><?php if (isset ( $this->_tpl_vars['navigator']['next'] )): ?><?php echo '    '; ?><?php echo '<a href="'; ?><?php echo $this->_reg_objects['g'][0]->url(array('params' => $this->_tpl_vars['navigator']['next']['urlParams']), $this);?><?php echo '" class="next">'; ?><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'next'), $this);?><?php echo ''; ?><?php echo $this->_tpl_vars['suffix']; ?><?php echo ''; ?><?php if (isset ( $this->_tpl_vars['navigator']['next']['thumbnail'] )): ?><?php echo ''; ?><?php echo $this->_reg_objects['g'][0]->image(array('item' => $this->_tpl_vars['navigator']['next']['item'],'image' => $this->_tpl_vars['navigator']['next']['thumbnail'],'maxSize' => 40,'class' => 'next'), $this);?><?php echo ''; ?><?php endif; ?><?php echo '</a>'; ?><?php endif; ?><?php echo ''; ?><?php if (isset ( $this->_tpl_vars['navigator']['last'] )): ?><?php echo '<a href="'; ?><?php echo $this->_reg_objects['g'][0]->url(array('params' => $this->_tpl_vars['navigator']['last']['urlParams']), $this);?><?php echo '" class="last">'; ?><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'last'), $this);?><?php echo ''; ?><?php echo $this->_tpl_vars['suffix']; ?><?php echo ''; ?><?php if (isset ( $this->_tpl_vars['navigator']['last']['thumbnail'] )): ?><?php echo ''; ?><?php echo $this->_reg_objects['g'][0]->image(array('item' => $this->_tpl_vars['navigator']['last']['item'],'image' => $this->_tpl_vars['navigator']['last']['thumbnail'],'maxSize' => 40,'class' => 'last'), $this);?><?php echo ''; ?><?php endif; ?><?php echo '</a>'; ?><?php endif; ?><?php echo ''; ?>

</div>
<?php elseif ($this->_tpl_vars['which'] == 'current'): ?>
<?php if (( isset ( $this->_tpl_vars['currentPage'] ) && isset ( $this->_tpl_vars['totalPages'] ) ) || ( isset ( $this->_tpl_vars['currentItem'] ) && isset ( $this->_tpl_vars['totalItems'] ) )): ?>
<span class="current">
<?php if (isset ( $this->_tpl_vars['currentPage'] )): ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Page %d of %d",'arg1' => $this->_tpl_vars['currentPage'],'arg2' => $this->_tpl_vars['totalPages']), $this);?>

<?php else: ?>
<?php if (isset ( $this->_tpl_vars['currentItem'] )): ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "%d of %d",'arg1' => $this->_tpl_vars['currentItem'],'arg2' => $this->_tpl_vars['totalItems']), $this);?>

<?php endif; ?>
<?php endif; ?>
</span>
<?php endif; ?>
<?php else: ?>
<div class="first-and-previous">
<?php echo ''; ?><?php if (isset ( $this->_tpl_vars['navigator']['first'] )): ?><?php echo '<a href="'; ?><?php echo $this->_reg_objects['g'][0]->url(array('params' => $this->_tpl_vars['navigator']['first']['urlParams']), $this);?><?php echo '" class="first">'; ?><?php if (isset ( $this->_tpl_vars['navigator']['first']['thumbnail'] )): ?><?php echo ''; ?><?php echo $this->_reg_objects['g'][0]->image(array('item' => $this->_tpl_vars['navigator']['first']['item'],'image' => $this->_tpl_vars['navigator']['first']['thumbnail'],'maxSize' => '40','class' => 'first'), $this);?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php echo $this->_tpl_vars['prefix']; ?><?php echo ''; ?><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'first'), $this);?><?php echo '</a>'; ?><?php endif; ?><?php echo ''; ?><?php if (isset ( $this->_tpl_vars['navigator']['back'] )): ?><?php echo '    '; ?><?php echo '<a href="'; ?><?php echo $this->_reg_objects['g'][0]->url(array('params' => $this->_tpl_vars['navigator']['back']['urlParams']), $this);?><?php echo '" class="previous">'; ?><?php if (isset ( $this->_tpl_vars['navigator']['back']['thumbnail'] )): ?><?php echo ''; ?><?php echo $this->_reg_objects['g'][0]->image(array('item' => $this->_tpl_vars['navigator']['back']['item'],'image' => $this->_tpl_vars['navigator']['back']['thumbnail'],'maxSize' => '40','class' => 'previous'), $this);?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php echo $this->_tpl_vars['prefix']; ?><?php echo ''; ?><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'previous'), $this);?><?php echo '</a>'; ?><?php endif; ?><?php echo ''; ?>

</div>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
</div>