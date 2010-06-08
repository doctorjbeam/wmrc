<?php /* Smarty version 2.6.20, created on 2010-03-31 20:38:36
         compiled from gallery:modules/core/templates/MarkupBar.tpl */ ?>
<?php if ($this->_tpl_vars['theme']['markupType'] == 'bbcode'): ?>
<?php if (! empty ( $this->_tpl_vars['firstMarkupBar'] )): ?>
<script type="text/javascript"><?php echo '
// <![CDATA[
function openOrCloseTextElement(elementId, bbCodeElement, button) {
var element = document.getElementById(elementId);
if (!button.g2ToggleMode) {
element.value = element.value + \'[\' + bbCodeElement + \']\';
button.value = \'*\' + button.value;
} else {
element.value = element.value + \'[/\' + bbCodeElement + \']\';
button.value = button.value.substring(1);
}
if (typeof(element.selectionStart) != "undefined") {
element.selectionStart = element.selectionEnd = element.value.length;
}
element.focus();
button.g2ToggleMode = !button.g2ToggleMode;
}
function appendTextElement(elementId, bbCodeElement, button) {
var element = document.getElementById(elementId);
element.value = element.value + \'[\' + bbCodeElement + \']\';
if (typeof(element.selectionStart) != "undefined") {
element.selectionStart = element.selectionEnd = element.value.length;
}
element.focus();
}
var isInit = false;
function appendColorElement(elementId, button) {
var colorChooser = document.getElementById(\'Markup_colorChooser\');
if (!button.g2ToggleMode) {
/* if we already have a popup, don\'t do anything */
if (colorChooser.style.display == \'block\') {
return;
}
button.value = \'*\' + button.value;
colorChooser.g2ElementId = elementId;
if (!isInit) {
init();
isInit = true;
}
if (colorChooser.style.display == \'block\') {
colorChooser.style.display = \'none\';
} else {
var pos = YAHOO.util.Dom.getXY(button);
colorChooser.style.display = \'block\';
YAHOO.util.Dom.setXY(colorChooser, [pos[0] + 30, pos[1] + button.offsetHeight + 10]);
}
} else {
button.value = button.value.substring(1);
/* if popup is on the screen just dismiss it */
if (colorChooser.style.display == \'block\') {
colorChooser.style.display=\'none\';
} else {
var element = document.getElementById(elementId);
element.value = element.value + \'[/color]\';
if (typeof(element.selectionStart) != "undefined") {
element.selectionStart = element.selectionEnd = element.value.length;
}
element.focus();
}
}
button.g2ToggleMode = !button.g2ToggleMode;
}
'; ?>

function appendUrlElement(elementId, bbCodeElement) {
var element = document.getElementById(elementId);
var url = prompt('<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Enter a URL','forJavascript' => true), $this);?>
', ''), text = null;
if (url != null) text = prompt('<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Enter some text describing the URL','forJavascript' => true), $this);?>
', '');
if (text != null) {
if (text.length) element.value = element.value + '[url=' + url + ']' + text + '[/url]';
else element.value = element.value + '[url]' + url + '[/url]';
}      
<?php echo '
if (typeof(element.selectionStart) != "undefined") {
element.selectionStart = element.selectionEnd = element.value.length;
}
'; ?>

element.focus();
}
function appendImageElement(elementId, bbCodeElement) {
var element = document.getElementById(elementId);
var url = prompt('<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Enter an image URL','forJavascript' => true), $this);?>
', '');
if (url != null) element.value = element.value + '[img]' + url + '[/img]';
<?php echo '
if (typeof(element.selectionStart) != "undefined") {
element.selectionStart = element.selectionEnd = element.value.length;
}
'; ?>

element.focus();
}
// ]]>
</script>
<script type="text/javascript" src="<?php echo $this->_reg_objects['g'][0]->url(array('href' => "lib/yui/utilities.js"), $this);?>
"></script>
<script type="text/javascript" src="<?php echo $this->_reg_objects['g'][0]->url(array('href' => "lib/yui/color.js"), $this);?>
"></script>
<script type="text/javascript" src="<?php echo $this->_reg_objects['g'][0]->url(array('href' => "lib/yui/slider-min.js"), $this);?>
"></script>
<script type="text/javascript" src="<?php echo $this->_reg_objects['g'][0]->url(array('href' => "lib/javascript/ColorChooser.js"), $this);?>
"></script>
<?php endif; ?>
<div class="gbMarkupBar">
<input type="button" class="inputTypeButton" tabindex="32767"
value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'B','hint' => 'Button label for Bold'), $this);?>
"
onclick="openOrCloseTextElement('<?php echo $this->_tpl_vars['element']; ?>
', 'b', this)"
style="font-weight: bold;"/>
<input type="button" class="inputTypeButton" tabindex="32767"
value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'i','hint' => 'Button label for italic'), $this);?>
"
onclick="openOrCloseTextElement('<?php echo $this->_tpl_vars['element']; ?>
', 'i', this)"
style="font-style: italic; padding-left: 1px; padding-right: 4px"/>
<input type="button" class="inputTypeButton" tabindex="32767"
value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'list'), $this);?>
"
onclick="openOrCloseTextElement('<?php echo $this->_tpl_vars['element']; ?>
', 'list', this)"/>
<input type="button" class="inputTypeButton" tabindex="32767"
value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'bullet'), $this);?>
"
onclick="appendTextElement('<?php echo $this->_tpl_vars['element']; ?>
', '*', this)"/>
<input type="button" class="inputTypeButton" tabindex="32767"
value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'url'), $this);?>
"
onclick="appendUrlElement('<?php echo $this->_tpl_vars['element']; ?>
', this)"/>
<input type="button" class="inputTypeButton" tabindex="32767"
value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'image'), $this);?>
"
onclick="appendImageElement('<?php echo $this->_tpl_vars['element']; ?>
', this)"/>
<input type="button" class="inputTypeButton" tabindex="32767"
value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'color'), $this);?>
" id="<?php echo $this->_tpl_vars['element']; ?>
_color"
onclick="appendColorElement('<?php echo $this->_tpl_vars['element']; ?>
', this)"/>
</div>
<?php if (! empty ( $this->_tpl_vars['firstMarkupBar'] )): ?>
<div id="Markup_colorChooser">
<div id="Markup_colorHandle">&nbsp;</div>
<div id="Markup_pickerDiv">
<img id="Markup_pickerBg" src="<?php echo $this->_reg_objects['g'][0]->url(array('href' => "modules/core/data/pickerbg.png"), $this);?>
" alt=""/>
<div id="Markup_selector"><img src="<?php echo $this->_reg_objects['g'][0]->url(array('href' => "modules/core/data/select.gif"), $this);?>
" alt=""/></div>
</div>
<div id="Markup_hueBg">
<div id="Markup_hueThumb"><img src="<?php echo $this->_reg_objects['g'][0]->url(array('href' => "modules/core/data/hline.png"), $this);?>
" alt=""/></div>
</div>
<div id="Markup_valdiv">
<br/>
R <input name="rval" id="Markup_rval" type="text" value="0" size="3" maxlength="3"/>
H <input name="hval" id="Markup_hval" type="text" value="0" size="3" maxlength="3"/>
<br/>
G <input name="gval" id="Markup_gval" type="text" value="0" size="3" maxlength="3"/>
S <input name="gsal" id="Markup_sval" type="text" value="0" size="3" maxlength="3"/>
<br/>
B <input name="bval" id="Markup_bval" type="text" value="0" size="3" maxlength="3"/>
V <input name="vval" id="Markup_vval" type="text" value="0" size="3" maxlength="3"/>
<br/>
<br/>
# <input name="hexval" id="Markup_hexval" type="text" value="0" size="6" maxlength="6"/>
<br/>
<input value="Done" class="yui-log-button" style="font-size: 11px;" type="button"
onclick="userUpdate()"/>
</div>
<div id="Markup_swatch">&nbsp;</div>
<div id="Markup_hint"><?php echo $this->_reg_objects['g'][0]->text(array('text' => "You can also use the %scolor name%s for example: %sYour Text%s",'arg1' => "<a href=\"http://www.w3.org/TR/2002/WD-css3-color-20020418/#html4\" target=\"_new\">",'arg2' => "</a>",'arg3' => "[color=red]",'arg4' => "[/color]"), $this);?>
</div>
</div>
<?php endif; ?>
<?php endif; ?>