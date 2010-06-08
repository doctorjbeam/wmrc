<?php /* Smarty version 2.6.20, created on 2010-03-31 20:40:03
         compiled from gallery:modules/core/templates/AutoComplete.tpl */ ?>
<?php if ($this->_tpl_vars['callCount'] == 1): ?>
<script type="text/javascript" src="<?php echo $this->_reg_objects['g'][0]->url(array('href' => "lib/yui/utilities.js"), $this);?>
"></script>
<script type="text/javascript" src="<?php echo $this->_reg_objects['g'][0]->url(array('href' => "lib/yui/autocomplete-min.js"), $this);?>
"></script>
<script type="text/javascript" src="<?php echo $this->_reg_objects['g'][0]->url(array('href' => "lib/javascript/AutoComplete.js"), $this);?>
"></script>
<?php endif; ?>
<script type="text/javascript">
// <![CDATA[
YAHOO.util.Event.addListener(
this, 'load',
function(e, data) { autoCompleteAttach(data[0], data[1]); },
['<?php echo $this->_tpl_vars['element']; ?>
', '<?php echo $this->_tpl_vars['url']; ?>
']);
// ]]>
</script>