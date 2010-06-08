<?php
/*
Plugin Name: Events Calendar
Plugin URI: http://www.wp-eventscalendar.com
Description: There are options under the widget options to specify the view of the calendar in the sidebar. The widget can be a list for upcoming events or a calendar. If you do not have a widget ready theme then you can place '&lt;?php SidebarEventsCalendar();?&gt;'?, or '&lt;?php SidebarEventsList();?&gt;' for an event list, in the sidebar.php file of your theme. If you want to display a large calendar in a post or a page, simply place "[[EventsCalendarLarge]]" in the html of the post or page. Make sure to leave off the quotes.
Version: 6.5.2.1
Author: Luke Howell, Rene Malka, Louis Lapointe, Coe Gwathney
Author URI: http://www.lukehowell.com

---------------------------------------------------------------------
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You can see a copy of GPL at <http://www.gnu.org/licenses/>
---------------------------------------------------------------------
*/
/* Events-Calendar version */
define('EVENTSCALENDARVERS', 'Version: 6.5.2 beta 7');

define('EVENTSCALENDARPATH', ABSPATH.'wp-content/plugins/events-calendar');
define('EVENTSCALENDARCLASSPATH', EVENTSCALENDARPATH);
define('EVENTSCALENDARURL', get_option('siteurl').'/wp-content/plugins/events-calendar');
define('EVENTSCALENDARJSURL', EVENTSCALENDARURL.'/js');
define('EVENTSCALENDARCSSURL', EVENTSCALENDARURL.'/css');
define('EVENTSCALENDARIMAGESURL', EVENTSCALENDARURL.'/images');
define('ABSWPINCLUDE', ABSPATH.WPINC);

require_once(EVENTSCALENDARCLASSPATH.'/ec_day.class.php');
require_once(EVENTSCALENDARCLASSPATH.'/ec_calendar.class.php');
require_once(EVENTSCALENDARCLASSPATH.'/ec_db.class.php');
require_once(EVENTSCALENDARCLASSPATH.'/ec_widget.class.php');
require_once(EVENTSCALENDARCLASSPATH.'/ec_management.class.php');

/* Init Localisation ----------------------------------------------------------***/
load_default_textdomain();
require_once(ABSWPINCLUDE.'/locale.php');
load_plugin_textdomain('events-calendar',PLUGINDIR.'/'.dirname(plugin_basename(__FILE__)).'/lang');
// DatePicker localisation
$locale = get_locale();
if (in_array($locale, array('pt_BR','zh_TW','zh_CN'))) {
  $loc_lang=str_replace('_','-',$locale);
} else {
  $loc_lang = explode("_",$locale); $loc_lang = $loc_lang[0];
  if (!in_array($loc_lang, array('ar','bg','ca','cs','da','de','es','fi','fr','he','hu','hy','id','is','it','ja','ko','lt','lv','nl','no','pl','ro','ru','sk','sv','th','tr','uk'))) $loc_lang='en';
}
/***---------------------------------------------------------------------------***/

if(isset($_GET['EC_view']) && $_GET['EC_view'] == 'day') {
  $EC_date = date('Y-m-d', mktime(0, 0, 0, $_GET['EC_month'], $_GET['EC_day'], $_GET['EC_year']));
  $day = new EC_Day();
  $day->display($EC_date);
  exit();
}

if(isset($_GET['EC_action']) && $_GET['EC_action'] == 'switchMonth') {
  $calendar = new EC_Calendar();
  $calendar->displayWidget($_GET['EC_year'], $_GET['EC_month']);
  exit();
}

if(isset($_GET['EC_action']) && $_GET['EC_action'] == 'switchMonthLarge') {
  $calendar = new EC_Calendar();
  $calendar->displayLarge($_GET['EC_year'], $_GET['EC_month']);
  exit();
}

if(isset($_GET['EC_action']) && $_GET['EC_action'] == 'ajaxDelete') {
  $db = new EC_DB();
  $db->deleteEvent($_GET['EC_id']);
  exit();
}

function EventsCalendarINIT() {
  $svr_uri = $_SERVER['REQUEST_URI'];
  $inadmin = strstr($svr_uri, 'wp-admin');
  if (!$inadmin) {
    wp_enqueue_script('jquerybgiframe', '/wp-content/plugins/events-calendar/js/jquery.bgiframe.js', array('jquery'), '2.1');
    wp_enqueue_script('jquerydimensions', '/wp-content/plugins/events-calendar/js/jquery.dimensions.js', array('jquery'), '1.0b2');
    wp_enqueue_script('jquerytooltip', '/wp-content/plugins/events-calendar/js/jquery.tooltip.min.js', array('jquery'), '1.3');
    wp_enqueue_script('thickbox');
  }
  if ((!$inadmin) OR (($inadmin) && ((strstr($svr_uri, 'widget'))))) {
    $widget = new EC_Widget();
    $management = new EC_Management();
    if(!function_exists('register_sidebar_widget')) return;
    register_sidebar_widget(__('Events Calendar','events-calendar'), array(&$widget, 'display'));
    register_widget_control(__('Events Calendar','events-calendar'), array(&$management, 'widgetControl'));
  }
}

function EventsCalendarManagementINIT() {
  $options = get_option('optionsEventsCalendar');
  $EC_userLevel = isset($options['accessLevel']) && !empty($options['accessLevel']) ? $options['accessLevel'] : 'level_10';
  $management = new EC_Management();
  add_menu_page(__('Events Calendar','events-calendar'), __('Events Calendar','events-calendar'), $EC_userLevel, 'events-calendar', array(&$management, 'display'));
  if(isset($_GET['page']) && strstr($_GET['page'], 'events-calendar')) {
    global $loc_lang;
    wp_enqueue_script('jquerybgiframe', '/wp-content/plugins/events-calendar/js/jquery.bgiframe.js', array('jquery'), '2.1');
    wp_enqueue_script('jquerydimensions', '/wp-content/plugins/events-calendar/js/jquery.dimensions.js', array('jquery'), '1.0b2');
    wp_enqueue_script('jquerytooltip', '/wp-content/plugins/events-calendar/js/jquery.tooltip.min.js', array('jquery'), '1.3');
    wp_enqueue_script('jqueryuicore', '/wp-content/plugins/events-calendar/js/ui.core.min.js', array('jquery'), '1.5.2');
    wp_enqueue_script('jqueryuidatepicker', '/wp-content/plugins/events-calendar/js/ui.datepicker.js', array('jquery'), '1.5.2');
    if ($loc_lang != 'en') wp_enqueue_script('jqueryuidatepickerlang', '/wp-content/plugins/events-calendar/js/i18n/ui.datepicker-'.$loc_lang.'.js', array('jquery'), '1.5.2');
    wp_enqueue_script('jqueryclockpicker', '/wp-content/plugins/events-calendar/js/jquery.clockpick.min.js', array('jquery'), '1.2.4');
    add_submenu_page('events-calendar', __('Events Calendar','events-calendar'), __('Calendar','events-calendar'), $EC_userLevel, 'events-calendar', array(&$management, 'calendarOptions'));
    add_submenu_page('events-calendar', __('Events Calendar Options','events-calendar'), __('Options','events-calendar'), $EC_userLevel, 'events-calendar-options', array(&$management, 'calendarOptions'));
    add_submenu_page('events-calendar', __('Events Calendar','events-calendar'), __('Add Event','events-calendar'), $EC_userLevel, '#addEventform', '');
  }
}

function EventsCalendarHeaderScript() {
?>
<!-- Start Of Script Generated By Events-Calendar [Luke Howell | www.lukehowell.com] and [R. MALKA | www.heirem.fr] -->
  <link type="text/css" rel="stylesheet" href="<?php bloginfo('siteurl');?>/wp-includes/js/thickbox/thickbox.css" />
  <link type="text/css" rel="stylesheet" href="<?php echo EVENTSCALENDARCSSURL;?>/events-calendar.css" />
<?php
  require_once(ABSPATH . 'wp-admin/admin-functions.php');
  // jQuery Dom Extrem protection management
  $options = get_option('optionsEventsCalendar');
    echo ' <script type="text/javascript">',"\n\t";
    echo '// <![CDATA[',"\n\t";
      echo 'var ecd = {};',"\n\t";
      echo 'ecd.jq= jQuery.noConflict('.$options['jqueryextremstatus'].');',"\n\t";
      echo '//]]>',"\n";
    echo ' </script>',"\n";
  // ---------------------------------------
  echo "<!-- End Of Script Generated By Events-Calendar - ".EVENTSCALENDARVERS." -->\n";
}

function EventsCalendarAdminHeaderScript() {
  if(isset($_GET['page']) && $_GET['page'] == 'events-calendar') {
?>
  <link type="text/css" rel="stylesheet" href="<?php echo EVENTSCALENDARCSSURL;?>/events-calendar-management.css" />
  <link type="text/css" rel="stylesheet" href="<?php echo EVENTSCALENDARCSSURL;?>/ui.datepicker.css" />
  <link type="text/css" rel="stylesheet" href="<?php echo EVENTSCALENDARCSSURL;?>/clockpick.css" />
<?php
  }
}

function EventsCalendarActivated() {
  $db = new EC_DB();
  $db->createTable();
  $db->initOptions();
}

function ec_strstr($haystack, $needle, $before_needle=FALSE) {
 if(($pos=strpos($haystack,$needle))===FALSE) return FALSE;
 if($before_needle) return substr($haystack,0,$pos);
  else return substr($haystack,$pos+strlen($needle));
}

function filterEventsCalendarLarge($content) {
  if(preg_match("[EventsCalendarLarge]",$content)) {
    $calendar = new EC_Calendar();
    $ec_match_filter = '[[EventsCalendarLarge]]';
    $before_large_calendar = ec_strstr($content, $ec_match_filter, TRUE);
    $content = ec_strstr($content, $ec_match_filter, FALSE);
    $calendar->displayLarge(date('Y'), date('m'), $before_large_calendar);
  }
  return $content;
}

function SidebarEventsCalendar() {
  $calendar = new EC_Calendar();
  $calendar->displayWidget(date('Y'), date('m'));
}

function SidebarEventsList($d){
  $calendar= new EC_Calendar();
  $calendar->displayEventList($d);
}

add_action('activate_events-calendar/events-calendar.php', 'EventsCalendarActivated');
add_action('plugins_loaded', 'EventsCalendarINIT');
add_action('admin_menu', 'EventsCalendarManagementINIT');
add_action('wp_head', 'EventsCalendarHeaderScript');
add_action('admin_head', 'EventsCalendarAdminHeaderScript');
add_filter('the_content', 'filterEventsCalendarLarge');
?>
