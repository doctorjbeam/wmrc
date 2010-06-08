<?php
if(!class_exists("EC_Calendar")) :
require_once(EVENTSCALENDARCLASSPATH . '/ec_db.class.php');

class EC_Calendar { // Displays events list and calendars
  /**
   * In some languages day of the week display poorly on two or three characters. This function to correct the problem.
   */
	function utf8_substr($str,$start,$end)	{ // added by pepawo & heirem
			if (DB_CHARSET == 'utf8') {
				preg_match_all('/./u', $str, $ar);
				return join("",array_slice($ar[0],$start,$end));
			} else {
				return substr($str,$start,$end);
			}
	}
  /**
   * Displays the Event List Widget
   */
  function displayEventList($num) {
		/* Localisation ------------------------------------------------***/
		load_default_textdomain();
		require_once(ABSWPINCLUDE.'/locale.php');
		$wp_locale = new WP_Locale();
		/* -------------------------------------------------------------***/
    global $current_user;
    $db = new EC_DB();
    $js = new EC_JS();
    $options = get_option('optionsEventsCalendar');
    $format = $options['dateFormatLarge'];
		$day_name_length = $options['daynamelength'];
    $events = $db->getUpcomingEvents($num);
    $output = '<ul id="events-calendar-list">';
    foreach($events as $event) {
      if($event->accessLevel == 'public' || $current_user->has_cap($event->accessLevel)) {
        $splitDate = explode("-", $event->eventStartDate);
        $month = $splitDate[1];
        $day = $splitDate[2];
        $year = $splitDate[0];
				$timeStp = mktime(0, 0, 0, $month, $day, $year);
        $startDate = date("$format", $timeStp );
				$day_names = ucfirst($wp_locale->get_weekday(date('w', $timeStp )));
				if($day_name_length) $day_names = $day_name_length < 4 ? $this->utf8_substr($day_names,0,$day_name_length) : $day_names;
				$PostID = isset($event->postID) ? $event->postID : '';
				if ($PostID == '') {
					$titlinked = '<strong>'.$day_names.' '.$startDate.'</strong>: '.stripslashes($event->eventTitle);
				} else {
					$titlinked = '<strong><a href="'.get_permalink($PostID).'">'.$day_names.' '.$startDate.'</strong>: '.stripslashes($event->eventTitle).'</a>';
				}
        //$startDate = $startDate < date("$format") ? date("$format") : $startDate;
        $output .= '<li id="events-calendar-list-'.$event->id.'">'.$titlinked.'</li>';
      }
    }
    $output .= "</ul>";
		// $output='<ul id="events-calendar-list"></ul>'; // for tests
		if ($output=='<ul id="events-calendar-list"></ul>') {
			echo '<ul><li id="no-events-in-list"><strong>', __('Events are coming soon, stay tuned!','events-calendar') , '</strong></li></ul>';
		} else {
		  echo $output;
			$js->listData($events);
		}
  }
  /**
   * Displays the Widget Calendar
   */
	 function displayWidget($year, $month, $days = array(), $day_name_length = 2) {
		/* Localisation ------------------------------------------------***/
		load_default_textdomain();
		require_once(ABSWPINCLUDE.'/locale.php');
		$wp_locale = new WP_Locale();
		/* -------------------------------------------------------------***/
    // The following two lines are to get the length of day names - Ron
    $options = get_option('optionsEventsCalendar');
    $day_name_length = $options['daynamelength'];
		// Option : Is the CSS adapted for your site ?
		$adaptedCSS = $options['adaptedCSS'];
		// If not we prepare the CSS style for ToDay
		$todayCSS = '';
		if(!$adaptedCSS) $todayCSS= isset($options['todayCSS']) && !empty($options['todayCSS']) ? $options['todayCSS'] : 'border:thin solid blue;font-weight: bold;background-color: #a8c3d6;';
    $js = new EC_JS();
    $first_day = get_option('start_of_week');
    $first_of_month = gmmktime(0,0,0,$month,1,$year);
	  $day_names = array();
	  for($n=0,$t=(3+$first_day)*86400; $n<7; $n++,$t+=86400) //January 4, 1970 was a Sunday
			$day_names[$n] = ucfirst($wp_locale->get_weekday(gmdate('w',$t)));
	  list($month, $year, $month_name, $weekday) = explode(',',gmstrftime('%m,%Y,%B,%w',$first_of_month));
	  $weekday = ($weekday + 7 - $first_day) % 7; //adjust for $first_day
		$title = ucfirst($wp_locale->get_month($month)).'&nbsp;'.$year;
		$calendar = '<div id="calendar_wrap">'."\n".'<table summary="Event Calendar" id="wp-calendar">'."\n".'<caption id="calendar-month" class="calendar-month">'.$title.'</caption><thead><tr>';
	  if($day_name_length){ //if the day names should be shown ($day_name_length > 0)
		  //if day_name_length is >3, the full name of the day will be printed
		  foreach($day_names as $d)
			  $calendar .= '<th abbr="'.$d.'" scope="col" title="'.$d.'">'.($day_name_length < 4 ? $this->utf8_substr($d,0,$day_name_length) : $d).'</th>';
		  $calendar .= '</tr></thead><tfoot><tr><td class="pad" style="text-align:left" colspan="2">&nbsp;<span id="EC_previousMonth"></span></td><td class="pad" colspan="3" id="EC_loadingPane" style="text-align:center;"></td><td class="pad" style="text-align:right;" colspan="2"><span id="EC_nextMonth"></span>&nbsp;</td></tr></tfoot><tbody><tr>';
	  }
	  if($weekday > 0) $calendar .= '<td colspan="'.$weekday.'" class="padday">&nbsp;</td>'; //initial \"empty\" days
	  for($day=1,$days_in_month=gmdate('t',$first_of_month); $day<=$days_in_month; $day++,$weekday++){
		  if($weekday == 7){
			  $weekday = 0; //start a new week
			  $calendar .= "</tr>\n<tr>";
		  }
			$dayID = '';
			if ("$month/$day/$year" == date('m/j/Y'))
				$dayID = !$adaptedCSS ? ' id="todayWidget" style="'.$todayCSS.'" ' : ' id="today" ';
		  $calendar .= '<td'.$dayID.'><span id="events-calendar-'.$day.'">'.$day.'</span></td>'."\n";
	  }
	  if($weekday != 7) $calendar .= "\n\t\t<td colspan=\"".(7-$weekday)."\" class=\"padday\">&nbsp;</td>"; //remaining "empty" days
	  $calendar .= "\n</tr></tbody></table>\n".'<script type="text/javascript">'."\n".'// <![CDATA['."\n";
		$calendar .= ' tb_pathToImage ="'.get_option('siteurl').'/wp-includes/js/thickbox/loadingAnimation.gif";'."\n";
		$calendar .= ' tb_closeImage = "'.get_option('siteurl').'/wp-includes/js/thickbox/tb-close.png";'."\n";
		$calendar .= ' jQuery.noConflict();'."\n".' (function($) {'."\n".' ecd.jq(document).ready(function() {'."\n";
		echo $calendar;
    $js->calendarData($month, $year);
	  echo ' });'."\n".' })(jQuery);'."\n".'//]]>'."\n".'</script>'."\n".'</div>';
  }

  /**
   * Displays the Large Calendar
   */
  function displayLarge($year, $month, $before_large_calendar = "", $days = array(), $day_name_length = 7 ) {
		/* Localisation ------------------------------------------------***/
		load_default_textdomain();
		require_once(ABSWPINCLUDE.'/locale.php');
		$wp_locale = new WP_Locale();
		/* -------------------------------------------------------------***/
		// Option : Is the CSS adapted for your site ?
		$adaptedCSS = $options['adaptedCSS'];
		// If not we prepare the CSS style for ToDay
		$todayCSS = '';
		if (!$adaptedCSS) $todayCSS = isset($options['todayCSS']) && !empty($options['todayCSS']) ? $options['todayCSS'] : 'background-color:#9BA9CF; color:#FFF;';
    $js = new EC_JS();
    $first_day = get_option('start_of_week');
    $first_of_month = gmmktime(0,0,0,$month,1,$year);
	  $day_names = array();
	  for($n=0,$t=(3+$first_day)*86400; $n<7; $n++,$t+=86400) //January 4, 1970 was a Sunday
			$day_names[$n] = ucfirst($wp_locale->get_weekday(gmdate('w',$t)));
	  list($month, $year, $month_name, $weekday) = explode(',',gmstrftime('%m,%Y,%B,%w',$first_of_month));
	  $weekday = ($weekday + 7 - $first_day) % 7; //adjust for $first_day
		//$title = ucfirst($wp_locale->get_month($month)).'&nbsp;<span id="EC_ajaxLoader"></span>&nbsp;&nbsp;'.$year;
		$titMonth = ucfirst($wp_locale->get_month($month));
	  // $calendar = '<div id="calendar_wrapLarge"><h2 style="text-align:center;"><span id="EC_previousMonthLarge"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$title.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="EC_nextMonthLarge"></span></h2><br />';
		$calendar = '<div id="calendar_wrapLarge">'."\n".'<h2 style="text-align:center;">'."\n\t".'<table id="CalendarLarge-Header" cellspacing="0" cellpadding="0" width="100%" border="0">'."\n\t";
		$calendar .='<tr>'."\n\t\t".'<td width="25%"><div align="left"><span id="EC_previousMonthLarge"></span></div></td>'."\n\t\t";
		$calendar .='<td width="23%"><div align="right">'.$titMonth.'</div></td>'."\n\t\t".'<td width="18"><div align="center"><span id="EC_ajaxLoader"></span></div></td>'."\n\t\t";
		$calendar .='<td width="55" align="left">'.$year.'</td>'."\n\t\t".'<td width="25%" align="right"><span id="EC_nextMonthLarge"></span></td>'."\n\t".'</tr>'."\n\t".'</table>'."\n".'</h2>';
    $calendar .= "\n".'<table summary="Large Event Calendar" id="wp-calendarLarge">'."\n".'<thead><tr>'."\n";
    // Following two lines will get the length of day names - Ron
    $options = get_option('optionsEventsCalendar');
    $day_name_length = $options['daynamelengthLarge'];
	  if($day_name_length){ //if the day names should be shown ($day_name_length > 0)
		  //if day_name_length is >3, the full name of the day will be printed
		  foreach($day_names as $d)
			  $calendar .= '<th abbr="'.$d.'" scope="col" title="'.$d.'">'.($day_name_length < 4 ? $this->utf8_substr($d,0,$day_name_length) : $d).'</th>'."\n";
	  }
	  $calendar .= '</tr></thead>'."\n".'<tbody><tr>'."\n";
	  if($weekday > 0) $calendar .= '<tbody><tr><td colspan="'.$weekday.'" class="pad">&nbsp;</td>';
	  for($day=1,$days_in_month=gmdate('t',$first_of_month); $day<=$days_in_month; $day++,$weekday++){
		  if($weekday == 7){
			  $weekday = 0; //start a new week
			  $calendar .= "</tr>\n<tr>";
		  }
			$dayID = '';
			if ("$month/$day/$year" == date('m/j/Y'))
        $dayID = (!$adaptedCSS) ? ' id="todayLarge" style="'.$todayCSS.'" ' : ' id="todayLarge" ';
		  $calendar .= '<td'.$dayID.'><div class="dayHead">'.$day.'</div><div id="events-calendar-'.$day.'Large"></div></td>'."\n";
	  }
	  if($weekday != 7) $calendar .= '<td colspan="'.(7-$weekday).'" class="pad">&nbsp;</td>'; //remaining "empty" days
	  $calendar .= "\n</tr></tbody></table>\n".'<script type="text/javascript">'."\n".'// <![CDATA['."\n";
		$calendar .= ' jQuery.noConflict();'."\n".' (function($) {'."\n".' ecd.jq(document).ready(function() {'."\n";
		echo $before_large_calendar;
		echo $calendar;
	  $js->calendarDataLarge($month, $year);
	  echo ' });'."\n".' })(jQuery);'."\n".'//]]>'."\n".'</script>'."\n".'</div>';
	}
		/**
	   * Displays the Admin Calendar
	   */
	function displayAdmin($year, $month, $days = array(), $day_name_length = 7) {
		/* Localisation ------------------------------------------------***/
		load_default_textdomain();
		require_once(ABSWPINCLUDE.'/locale.php');
		$wp_locale = new WP_Locale();
		/* -------------------------------------------------------------***/
		// Option : Is the CSS adapted for your site ?
		$adaptedCSS = $options['adaptedCSS'];
		// If not we prepare the CSS style for ToDay
		$todayCSS = '';
		if (!$adaptedCSS) $todayCSS = isset($options['todayCSS']) && !empty($options['todayCSS']) ? $options['todayCSS'] : 'background-color:#9BA9CF; color:#FFF;';
		$first_day = get_option('start_of_week');
    $first_of_month = gmmktime(0,0,0,$month,1,$year);
	  $day_names = array();
	  for($n=0,$t=(3+$first_day)*86400; $n<7; $n++,$t+=86400) //January 4, 1970 was a Sunday
			$day_names[$n] = ucfirst($wp_locale->get_weekday(gmdate('w',$t)));
	  list($month, $year, $month_name, $weekday) = explode(',',gmstrftime('%m,%Y,%B,%w',$first_of_month));
	  $weekday = ($weekday + 7 - $first_day) % 7; //adjust for $first_day
		$title = ucfirst($wp_locale->get_month($month)).'&nbsp;'.$year;
		$previousMonth = $wp_locale->get_month(date('n', mktime(0, 0, 0, $month-1, 1, $year)));
		$nextMonth = $wp_locale->get_month(date('n', mktime(0, 0, 0, $month+1, 1, $year)));
		$calendar = '<div class="ec-wrap">'."\n";
		$calendar .= '<h2 style="padding-right:0;text-align:center;"><a href="?page=events-calendar&amp;EC_action=switchMonthAdmin&amp;EC_month='.($month-1).'&amp;EC_year='.($year).'">&#171; '.$previousMonth.'</a> '. __('Events','events-calendar') .' ('.$title.') <a href="?page=events-calendar&amp;EC_action=switchMonthAdmin&amp;EC_month='.($month+1).'&amp;EC_year='.($year).'">'.$nextMonth.' &#187;</a></h2><hr />';
    $calendar .= '<table width="98%" summary="Admin Event Calendar" id="wp-calendar"><thead><tr>';
	  if($day_name_length){ //if the day names should be shown ($day_name_length > 0)
		  //if day_name_length is >3, the full name of the day will be printed
		  foreach($day_names as $d)
			  $calendar .= '<th width="14%" abbr="'.$d.'" scope="col" title="'.$d.'">'.($day_name_length < 4 ? $this->utf8_substr($d,0,$day_name_length) : $d).'</th>';
		  $calendar .= '</tr></thead>';
	  }
	  if($weekday > 0) $calendar .= '<td colspan="'.$weekday.'" class="pad">&nbsp;</td>'; //initial \"empty\" days
	  for($day=1,$days_in_month=gmdate('t',$first_of_month); $day<=$days_in_month; $day++,$weekday++){
		  if($weekday == 7){
			  $weekday = 0; //start a new week
			  $calendar .= '</tr><tr>';
		  }
			$dayID = '';
			if ("$month/$day/$year" == date('m/j/Y'))
				$dayID = (!$adaptedCSS) ? ' id="todayAdmin" style="'.$todayCSS.'" ' : ' id="todayAdmin" ';
		  $calendar .= '<td'.$dayID.'><div class="dayHead">'.$day.'</div><div id="events-calendar-'.$day.'"></div></td>';
	  }
	  if($weekday != 7) $calendar .= '<td colspan="'.(7-$weekday).'" class="pad">&nbsp;</td>'; //remaining "empty" days
	  echo $calendar.'</tr></tbody></table>'."\n";
	}
}
endif;
?>