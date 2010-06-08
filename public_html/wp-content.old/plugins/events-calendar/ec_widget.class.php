<?php
if(!class_exists('EC_Widget')) :
require_once(EVENTSCALENDARCLASSPATH . '/ec_calendar.class.php');
require_once(EVENTSCALENDARCLASSPATH . '/ec_js.class.php');

class EC_Widget { // Display widget calendar
  var $month;
  var $year;
  var $calendar;

  function EC_Widget() {
    $this->calendar = new EC_Calendar();
    $this->month = $_GET['EC_action'] == 'switchMonth' ? $_GET['EC_month'] : date('m');
    $this->year = $_GET['EC_action'] == 'switchMonth' ? $_GET['EC_year'] : date('Y');
  }

  function display($args) {
    $js = new EC_JS();
    extract($args);
    echo $before_widget;
    $options = get_option('widgetEventsCalendar');
    if(isset($options['title']) && !empty($options['title']))
      echo $before_title . $options['title'] . $after_title;
    if($options['type'] == 'calendar')
      $this->calendar->displayWidget($this->year, $this->month);
    else
      $this->calendar->displayEventList($options['listCount']);
    echo $after_widget;
  }
}
endif;
?>