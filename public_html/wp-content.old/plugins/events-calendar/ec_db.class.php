<?php
if(!class_exists('EC_DB')):

class EC_DB { // Access to the database
  var $db;
  var $mainTable;
  var $dbVersion;

  function EC_DB() {
    global $wpdb;
    $this->dbVersion = "108";
    $this->db = $wpdb;    $this->mainTable = $this->db->prefix . 'eventscalendar_main';
    $this->mainTableCaps = $this->db->prefix . 'EventsCalendar_main';
    $this->postsTable = $this->db->prefix . 'posts';
    if($this->db->get_var("show tables like '$this->mainTableCaps'") == $this->mainTableCaps )
      $this->mainTable = $this->mainTableCaps;
  }

  function createTable() {
    if($this->db->get_var("show tables like '$this->mainTable'") != $this->mainTable ) {
      $sql = "CREATE TABLE " . $this->mainTable . " (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            eventTitle varchar(255) CHARACTER SET utf8 NOT NULL,
            eventDescription text CHARACTER SET utf8 NOT NULL,
            eventLocation varchar(255) CHARACTER SET utf8 default NULL,
            eventLinkout varchar(255) CHARACTER SET utf8 default NULL,
            eventStartDate date NOT NULL,
            eventStartTime time default NULL,
            eventEndDate date NOT NULL,
            eventEndTime time default NULL,
            accessLevel varchar(255) CHARACTER SET utf8 NOT NULL default 'public',
            postID mediumint(9) NULL DEFAULT NULL,
            PRIMARY KEY  id (id)
            );";
      require_once(ABSPATH . "wp-admin/upgrade-functions.php");
      dbDelta($sql);
      // Request whithout CHARACTER SET utf8 if the CREATE TABLE failed
      if($this->db->get_var("show tables like '$this->mainTable'") != $this->mainTable ) {
        $sql = str_replace("CHARACTER SET utf8 ","",$sql);
        dbDelta($sql);
      }
      add_option("events_calendar_db_version", $this->dbVersion);
    }

    $installed_ver = get_option( "eventscalendar_db_version" );

    if($installed_ver != $this->dbVersion) {
      $sql = "CREATE TABLE " . $this->mainTable . " (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            eventTitle varchar(255) CHARACTER SET utf8 NOT NULL,
            eventDescription text CHARACTER SET utf8 NOT NULL,
            eventLocation varchar(255) CHARACTER SET utf8 default NULL,
            eventLinkout varchar(255) CHARACTER SET utf8 default NULL,
            eventStartDate date NOT NULL,
            eventStartTime time default NULL,
            eventEndDate date NOT NULL,
            eventEndTime time default NULL,
            accessLevel varchar(255) CHARACTER SET utf8 NOT NULL default 'public',
            postID mediumint(9) NULL DEFAULT NULL,
            PRIMARY KEY  id (id)
            );";
      require_once(ABSPATH . 'wp-admin/upgrade-functions.php');
      dbDelta($sql);

      $this->db->query("UPDATE " . $this->mainTable . " SET `eventLocation` = REPLACE(`eventLocation`,' ','');");
      $this->db->query("UPDATE " . $this->mainTable . " SET `eventLocation` = REPLACE(`eventLocation`,'',NULL);");
      $this->db->query("UPDATE " . $this->mainTable . " SET `eventStartTime` = REPLACE(`eventStartTime`,'00:00:00',NULL);");
      $this->db->query("UPDATE " . $this->mainTable . " SET `eventEndTime` = REPLACE(`eventEndTime`,'00:00:00',NULL);");

      update_option( "events_calendar_db_version", $this->dbVersion);
    }
  }

  function initOptions() {
    $options = get_option('optionsEventsCalendar');
    if(!is_array($options)) $options = array();
    if (!isset($options['dateFormatWidget'])) $options['dateFormatWidget'] = 'm-d';
    if (!isset($options['timeFormatWidget'])) $options['timeFormatWidget'] = 'g:i a';
    if (!isset($options['dateFormatLarge'])) $options['dateFormatLarge'] = 'n/j/Y';
    if (!isset($options['timeFormatLarge'])) $options['timeFormatLarge'] = 'g:i a';
    if (!isset($options['timeStep'])) $options['timeStep'] = '30';
    if (!isset($options['adaptedCSS'])) $options['adaptedCSS'] = '';
    if (!isset($options['jqueryextremstatus'])) $options['jqueryextremstatus'] = 'false';
    if (!isset($options['todayCSS'])) $options['todayCSS'] = 'border:thin solid blue;font-weight: bold;';
    if (!isset($options['dayHasEventCSS'])) $options['dayHasEventCSS'] = 'color:red;';
    if (!isset($options['daynamelength'])) $options['daynamelength'] = '3';
    if (!isset($options['daynamelengthLarge'])) $options['daynamelengthLarge'] = '3';
    if (!isset($options['accessLevel'])) $options['accessLevel'] = 'level_10';
    update_option('optionsEventsCalendar', $options);
  }

  function addEvent($title, $location, $linkout, $description, $startDate, $startTime, $endDate, $endTime, $accessLevel, $postID) {
    $postID = is_null($postID) ? "NULL" : "'$postID'";
    $location = is_null($location) ? "NULL" : "'$location'";
    $description = is_null($description) ? "NULL" : "'$description'";
    $startDate = is_null($startDate) ? "NULL" : "'$startDate'";
    $endDate = is_null($endDate) ? "NULL" : "'$endDate'";
    $linkout = is_null($linkout) ? "NULL" : "'$linkout'";
    $startTime = is_null($startTime) ? "NULL" : "'$startTime'";
    $accessLevel = is_null($accessLevel) ? "NULL" : "'$accessLevel'";
    $endTime = is_null($endTime) ? "NULL" : "'$endTime'";
    $sql = "INSERT INTO `$this->mainTable` ("
          ."`id`, `eventTitle`, `eventDescription`, `eventLocation`, `eventLinkout`,`eventStartDate`, `eventStartTime`, `eventEndDate`, `eventEndTime`, `accessLevel`, `postID`) "
          ."VALUES ("
          ."NULL , '$title', $description, $location, $linkout, $startDate, $startTime, $endDate, $endTime , $accessLevel, $postID);";
    $this->db->query($sql);
  }

  function editEvent($id, $title, $location, $linkout, $description, $startDate, $startTime, $endDate, $endTime, $accessLevel, $postID) {
    $postID = is_null($postID) ? "NULL" : "'$postID'";
    $location = is_null($location) ? "NULL" : "'$location'";
    $description = is_null($description) ? "NULL" : "'$description'";
    $startDate = is_null($startDate) ? "NULL" : "'$startDate'";
    $endDate = is_null($endDate) ? "NULL" : "'$endDate'";
    $linkout = is_null($linkout) ? "NULL" : "'$linkout'";
    $startTime = is_null($startTime) ? "NULL" : "'$startTime'";
    $accessLevel = is_null($accessLevel) ? "NULL" : "'$accessLevel'";
    $endTime = is_null($endTime) ? "NULL" : "'$endTime'";
    $sql = "UPDATE `$this->mainTable` SET "
          ."`eventTitle` = '$title', "
          ."`eventDescription` = $description, "
          ."`eventLocation` = $location, "
          ."`eventLinkout` = $linkout, "
          ."`eventStartDate` = $startDate, "
          ."`eventStartTime` = $startTime, "
          ."`eventEndDate` = $endDate, "
          ."`eventEndTime` = $endTime, "
          ."`postID` = $postID, "
          ."`accessLevel` = $accessLevel WHERE `id` = $id LIMIT 1;";
    $this->db->query($sql);
  }

  function deleteEvent($id) {
    $sql = "DELETE FROM `$this->mainTable` WHERE `id` = $id LIMIT 1;";
    $this->db->query($sql);
  }

  function getDaysEvents($d) {
    $sql = "SELECT * FROM `$this->mainTable` WHERE `eventStartDate` <= '$d' AND `eventEndDate` >= '$d' ORDER BY `eventStartTime`, `eventEndTime`;";
    return $this->db->get_results($sql);
  }

  function getEvent($id) {
    $sql = "SELECT * FROM `$this->mainTable` WHERE `id` = $id LIMIT 1;";
    return $this->db->get_results($sql);
  }

  function getUpcomingEvents($num) {
    $sql = "SELECT * FROM `$this->mainTable` WHERE `eventStartDate` >= '" . date('Y-m-d') . "' OR `eventEndDate` >= '" . date('Y-m-d') . "' ORDER BY eventStartDate, eventStartTime LIMIT $num";
    return $this->db->get_results($sql);
  }

  function getLatestPost() {
    $sql = "SELECT `id` FROM `$this->postsTable` ORDER BY `id` DESC LIMIT 1;";
    return $this->db->get_results($sql);
  }
}
endif;
?>