<?php /* Smarty version 2.6.20, created on 2010-03-31 21:12:22
         compiled from gallery:modules/core/templates/AdminPerformance.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gallery:modules/core/templates/AdminPerformance.tpl', 57, false),)), $this); ?>
<div class="gbBlock gcBackground1">
<h2> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Performance Tuning'), $this);?>
 </h2>
</div>
<?php if (! empty ( $this->_tpl_vars['status'] )): ?>
<div class="gbBlock">
<h3 class="giSuccess">
<?php if (isset ( $this->_tpl_vars['status']['saved'] )): ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Updated performance settings successfully'), $this);?>

<?php else: ?>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Deleted all saved pages'), $this);?>

<?php endif; ?>
</h3>
</div>
<?php endif; ?>
<div class="gbBlock">
<h3 class="giTitle">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Acceleration'), $this);?>

</h3>
<p class="giDescription">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Improve your Gallery performance by storing entire web pages in the database.  This can considerably reduce the amount of webserver and database resources required to display a web page.  The tradeoff is that the web page you see may be a little bit out of date, however you can always get the most recent version of the page by forcing a refresh in your browser (typically by holding down the shift key and clicking the reload button)."), $this);?>

</p>
<dl class="giDescription">
<dt style="font-weight: bold"> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Partial Acceleration'), $this);?>
 </dt>
<dd>
<p>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Partial acceleration gives you roughly 10-25% performance increase, but some forms of dynamic data (like view counts) will not get updated right away.  All content that appears in blocks (like the random image block, any sidebar blocks, etc) will always be updated.",'cFormat' => false), $this);?>

</p>
</dd>
<dt style="font-weight: bold"> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Full Acceleration'), $this);?>
 </dt>
<dd>
<p>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Full acceleration gives roughly a 90% performance increase, but no dynamic data (random image block, other sidebar blocks, number of items in your shopping cart, view counts, etc) will get updated until the saved page expires.",'cFormat' => false), $this);?>

</p>
</dd>
</dl>
<p class="giDescription">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "You can additionally specify when saved pages expire.  Setting a longer expiration time will reduce the load on your server, but will increase the interval before users see changes.  Lower expiration times mean that users will see more current data, but they will place a higher load on your server."), $this);?>

</p>
<p class="giDescription">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Here are some standard acceleration profiles:"), $this);?>

<br/>
<a href="javascript:setNoAcceleration()"><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'No acceleration'), $this);?>
</a> &mdash;
<a href="javascript:setLowTraffic()"><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Medium acceleration'), $this);?>
</a> &mdash;
<a href="javascript:setHighTraffic()"><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'High acceleration'), $this);?>
</a>
</p>
<table class="gbDataTable">
<tr>
<td>
<b> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Guest Users'), $this);?>
 </b>
</td>
<td>
<select id="guestType" name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[acceleration][guest][type]"), $this);?>
" onchange="toggleEnabled()">
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['AdminPerformance']['typeList'],'selected' => $this->_tpl_vars['form']['acceleration']['guest']['type']), $this);?>

</select>
</td>
<td>
<b><?php echo $this->_reg_objects['g'][0]->text(array('text' => "Expires after:"), $this);?>
</b>
<select id="guestExpire" name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[acceleration][guest][expiration]"), $this);?>
">
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['AdminPerformance']['expirationTimeList'],'selected' => $this->_tpl_vars['form']['acceleration']['guest']['expiration']), $this);?>

</select>
</td>
</tr>
<tr class="gbOdd">
<td>
<b> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Registered Users'), $this);?>
 </b>
</td>
<td>
<select id="userType" name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[acceleration][user][type]"), $this);?>
" onchange="toggleEnabled()">
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['AdminPerformance']['typeList'],'selected' => $this->_tpl_vars['form']['acceleration']['user']['type']), $this);?>

</select>
</td>
<td>
<b><?php echo $this->_reg_objects['g'][0]->text(array('text' => "Expires after:"), $this);?>
</b>
<select id="userExpire" name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[acceleration][user][expiration]"), $this);?>
">
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['AdminPerformance']['expirationTimeList'],'selected' => $this->_tpl_vars['form']['acceleration']['user']['expiration']), $this);?>

</select>
</td>
</tr>
</table>
</div>
<div class="gbBlock">
<h3 class="giTitle">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Template Cache'), $this);?>

</h3>
<p class="giDescription">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "For optimal performance, Gallery caches all templates.  If you would like to %scustomize your template files%s, you should disable template caching temporarily so that changes take effect immediately without clearing the template cache.",'arg1' => "<a href=\"http://codex.gallery2.org/Gallery2:Editing_Templates\">",'arg2' => "</a>"), $this);?>

</p>
<table class="gbDataTable">
<tr>
<td>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Enable template caching'), $this);?>

</td>
<td>
<input type="checkbox" <?php if ($this->_tpl_vars['form']['disableCompileCheck']): ?>checked="checked" <?php endif; ?>
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[disableCompileCheck]"), $this);?>
"/>
</td>
</tr>
</table>
</div>
<div class="gbBlock gcBackground1">
<input type="submit" class="inputTypeSubmit"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][save]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Save'), $this);?>
"/>
<input type="submit" class="inputTypeSubmit"
name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][clear]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Clear Saved Pages'), $this);?>
"/>
</div>
<script type="text/javascript">
var guestType = document.getElementById("guestType");
var guestExpire = document.getElementById("guestExpire");
var userType = document.getElementById("userType");
var userExpire = document.getElementById("userExpire");
<?php echo '
function setNoAcceleration() {
guestType.value="none";
userType.value="none";
toggleEnabled();
}
function setLowTraffic() {
guestType.value="partial";
guestExpire.value="21600";
userType.value="partial";
userExpire.value="21600";
toggleEnabled();
}
function setHighTraffic() {
guestType.value="full";
guestExpire.value="86400";
userType.value="full";
userExpire.value="86400";
toggleEnabled();
}
function toggleEnabled() {
guestExpire.disabled = (guestType.value == "none");
userExpire.disabled = (userType.value == "none");
}
toggleEnabled();
'; ?>

</script>