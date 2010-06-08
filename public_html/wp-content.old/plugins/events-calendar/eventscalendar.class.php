<?php
if(!class_exists('EventsCalendar')) :
require_once(EVENTSCALENDARCLASSPATH . '/ec_widget.class.php');
require_once(EVENTSCALENDARCLASSPATH . '/ec_management.class.php');

class EventsCalendar {
  var $widget;
  var $management;

  function EventsCalendar() {
    $this->widget = new EC_Widget();
    $this->management = new EC_Management();
  }

  function displayWidget($args) {
    $this->widget->display($args);
  }

  function displayManagementPage() {
    $this->management->display();
  }

  function displayOptionsPage() {
    $this->management->calendarOptions();
  }
}
endif;
?>