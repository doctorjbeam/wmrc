<?php
if(!class_exists('EC_JS')) :

require_once(ABSWPINCLUDE.'/capabilities.php');
// require_once(ABSPATH . 'wp-includes/pluggable.php'); Moved in the class for Role Scoper compatibility at least (Thanx Maida ;) )
require_once(EVENTSCALENDARCLASSPATH.'/ec_db.class.php');

class EC_JS { // Display the calendars content
  var $db;

  function EC_JS() {
    require_once(ABSWPINCLUDE.'/pluggable.php');
    $this->db = new EC_DB();
  }

  function get_incrMonth($m) { // Managing the transition year-end in the calendars
    $wp_locale = new WP_Locale();
    if ($m > 12) $m=1;
    if ($m < 1) $m=12;
    return $wp_locale->get_month($m);
  }

  function calendarData($m, $y) {
    /* Localisation ------------------------------------------------***/
    load_default_textdomain();
    require_once(ABSWPINCLUDE.'/locale.php');
    $wp_locale = new WP_Locale();
    /* -------------------------------------------------------------***/
    global $current_user;
    $adaptedCSS = $options['adaptedCSS'];
    $options = get_option('optionsEventsCalendar');
    // Option : Is the CSS adapted for your site ?
    $dayHasEventCSS = '';
    if(!$adaptedCSS) $dayHasEventCSS = isset($options['dayHasEventCSS']) && !empty($options['dayHasEventCSS']) ? $options['dayHasEventCSS'] : 'color:red;';
    $lastDay = date('t', mktime(0, 0, 0, $m, 1, $y));
    for($d = 1; $d <= $lastDay; $d++):
      $sqldate = date('Y-m-d', mktime(0, 0, 0, $m, $d, $y));
      $output = '<ul>';
      foreach($this->db->getDaysEvents($sqldate) as $e) :
        if(($e->accessLevel == 'public') || (current_user_can($e->accessLevel))) {
          $title = $e->eventTitle;
// $description = $e->eventDescription;
          $location = isset($e->eventLocation) ? $e->eventLocation : '';
          $startDate = $e->eventStartDate;
          $endDate = $e->eventEndDate;
          $startTime = isset($e->eventStartTime) ? $e->eventStartTime : '';
          $endTime = isset($e->eventEndTime) ? $e->eventEndTime : '';
          $output .= '<li><strong>'.$title.'</strong></li>';
          $output .= '<dd>'.$location.'</dd>';
          list($ec_startyear, $ec_startmonth, $ec_startday) = explode("-", $startDate);
          list($ec_endyear, $ec_endmonth, $ec_endday) = explode("-", $endDate);
          if (($startDate != $endDate) && ($endDate > $sqldate)) {
            $output .= '<dd>'.__('Until','events-calendar').': '.date($options['dateFormatWidget'], mktime(0, 0, 0, $ec_endmonth, $ec_endday, $ec_endyear)).'</dd>';
          }
          if (!is_null($startTime) && ($startTime!='')) {
            list($ec_starthour, $ec_startminute, $ec_startsecond) = explode(":", $startTime);
            $startTime = date($options['timeFormatWidget'], mktime($ec_starthour, $ec_startminute, $ec_startsecond, $ec_startmonth, $ec_startday, $ec_startyear));
            if (!is_null($endTime) && ($endTime!='')) {
              list($ec_endhour, $ec_endminute, $ec_endsecond) = explode(":", $endTime);
              $output .= '<dd>'.$startTime.' '.__('to','events-calendar').' '.date($options['timeFormatWidget'], mktime($ec_endhour, $ec_endminute, $ec_endsecond, $ec_endmonth, $ec_endday, $ec_endyear)).'</dd>';
            } else $output .= '<dd>'.__('at','events-calendar').' '.$startTime.'</dd>';
          }
        }
      endforeach;
      $output .= '</ul>';
      $clickdate = __('Click date for more details','events-calendar');
      if($output != '<ul></ul>'):
        $output .= '<span style="font-size:10px;font-weight:normal;">'.$clickdate.'</span>';

        $format = $options['dateFormatLarge'];
        $elemnts_date = explode(' ', $format);
        if ($format == $elemnts_date[0])
          $elemnts_date = explode('-', $format);
          if ($format == $elemnts_date[0])
            $elemnts_date = explode('/', $format);
            if ($format == $elemnts_date[0])
              $elemnts_date = explode("\\", $format);
              if ($format == $elemnts_date[0])
                $elemnts_date = explode(',', $format);
                if ($format == $elemnts_date[0]) //added by pepawo
                  $elemnts_date = explode('.', $format); //addeed by pepawo
                  if (($format == $elemnts_date[0]) | ($elemnts_date[2] == Null )) : echo "<script LANGUAGE='JavaScript'>alert('" . __("Review your Large Calendar Date Format in the Events-Calendars options ;-)","events-calendar") . "');</SCRIPT>"; exit;
        endif;

        $date_show = '';
        foreach ( $elemnts_date as $elem_dt ) {
          // Find the DAY in the format string
          if (substr_count('dDjlNSwz', $elem_dt))
            $date_show .= ucfirst($wp_locale->get_weekday(gmdate('w', mktime(0,0,0,$m,$d,$y)))) . ' ' . $d . ' ';
         // Find the MONTH in the format string
          if (substr_count('FmMnt', $elem_dt))
            $date_show .= ucfirst($wp_locale->get_month($m)) . ' ';
         // Attrib the YEAR
          if (substr_count('0Yy', $elem_dt))
            $date_show .= $y;
        }
// For tests
// <script type="text/javascript">
// // <![CDATA[
// jQuery.noConflict();
// (function($) {
// ecd.jq(document).ready(function() {
?>
      ecd.jq('#events-calendar-<?php echo $d;?>').attr('title', '<?php echo $output;?>');
      ecd.jq('#events-calendar-<?php echo $d;?>').attr('style', '<?php echo $dayHasEventCSS;?>');
      ecd.jq('#events-calendar-<?php echo $d;?>').mouseover(function() {
        ecd.jq(this).css('cursor', 'pointer');
      });
      ecd.jq('#events-calendar-<?php echo $d;?>').click(function() {
        tb_show("<?php echo $date_show; ?>", "<?php bloginfo('siteurl');?>?EC_view=day&EC_month=<?php echo $m;?>&EC_day=<?php echo $d;?>&EC_year=<?php echo $y;?>&TB_iframe=true&width=220&height=250", false);
      });
      ecd.jq('#events-calendar-<?php echo $d;?>').tooltip({
        track: true,
        delay: 0,
        showURL: false,
        opacity: 1,
        fixPNG: true,
        showBody: " - ",
        // extraClass: "pretty fancy",
        top: -15,
        left: 10
      });
<?php
// });
// })(jQuery);
// //]]>
//</script>
      endif;
    endfor;
// For tests
// <script type="text/javascript">
// // <![CDATA[
// jQuery.noConflict();
// (function($) {
// ecd.jq(document).ready(function() {
?>
      ecd.jq('#EC_previousMonth').append('&#171;<?php echo ucfirst($wp_locale->get_month_abbrev($this->get_incrMonth($m-1)));?>');
      ecd.jq('#EC_nextMonth').prepend("<?php echo ucfirst($wp_locale->get_month_abbrev($this->get_incrMonth($m+1)));?>&#187;");
      ecd.jq('#EC_previousMonth').mouseover(function() {
        ecd.jq(this).css('cursor', 'pointer');
      });
      ecd.jq('#EC_nextMonth').mouseover(function() {
        ecd.jq(this).css('cursor', 'pointer');
      });
      ecd.jq('#EC_previousMonth').click(function() {
        ecd.jq('#EC_loadingPane').append('<img src="<?php echo EVENTSCALENDARIMAGESURL . '/loading.gif';?>" style="width:50px;" />');
        ecd.jq.get("<?php bloginfo('siteurl');?>/index.php",
        {EC_action: "switchMonth", EC_month: <?php echo $m-1;?>, EC_year: <?php echo $y;?>},
        function(ecdata) {
          ecd.jq('#calendar_wrap').empty();
          //ecd.jq('#calendar_wrap').append(ecdata);
          ecd.jq('#calendar_wrap').append(ecd.jq(ecdata).html());
        });
      });
      ecd.jq('#EC_nextMonth').click(function() {
        ecd.jq('#EC_loadingPane').append('<img src="<?php echo EVENTSCALENDARIMAGESURL . '/loading.gif';?>" style="width:50px;" />');
        ecd.jq.get("<?php bloginfo('siteurl');?>/index.php",
        {EC_action: "switchMonth", EC_month: <?php echo $m+1;?>, EC_year: <?php echo $y;?>},
        function(ecdata) {
          ecd.jq('#calendar_wrap').empty();
          //ecd.jq('#calendar_wrap').append(ecdata);
          ecd.jq('#calendar_wrap').append(ecd.jq(ecdata).html());
        });
      });
      ecd.jq.preloadImages = function() {
        for(var i = 0; i<arguments.length; i++){
          jQuery("<img>").attr("src", arguments[i]);
        }
      }
      ecd.jq.preloadImages("<?php echo EVENTSCALENDARIMAGESURL . '/loading.gif';?>");
<?php
// });
// })(jQuery);
// //]]>
//</script>
  }

  function calendarDataLarge($m, $y) {
    /* Localisation ------------------------------------------------***/
    load_default_textdomain();
    require_once(ABSWPINCLUDE.'/locale.php');
    $wp_locale = new WP_Locale();
    /* -------------------------------------------------------------***/
    global $current_user;
    $options = get_option('optionsEventsCalendar');
    $lastDay = date('t', mktime(0, 0, 0, $m, 1, $y));
    for($d = 1; $d <= $lastDay; $d++):
      $sqldate = date('Y-m-d', mktime(0, 0, 0, $m, $d, $y));
      foreach($this->db->getDaysEvents($sqldate) as $e) :
          // Change: Output has to be after foreach and before the if statement.
          $output = '';
          if (($e->accessLevel == 'public') || (current_user_can($e->accessLevel))) {
            // $output = '';
            $id = "$d-$e->id";
            $title = $e->eventTitle;
            $description = preg_replace('#\r?\n#', '<br />', $e->eventDescription);
            $location = isset($e->eventLocation) && !empty($e->eventLocation) ? $e->eventLocation : '';
            $linkout = isset($e->eventLinkout) && !empty($e->eventLinkout) ? $e->eventLinkout : '';
            $startDate = $e->eventStartDate; $startTime = $e->eventStartTime;
            $endTime = $e->eventEndTime; $endDate = $e->eventEndDate;
            $PostID = isset($e->postID) ? $e->postID : '';
// if ((!is_null($startDate) && !empty($startDate))) {
              list($ec_startyear, $ec_startmonth, $ec_startday) = explode("-", $startDate);
              $startDate = date($options['dateFormatLarge'], mktime($ec_starthour, $ec_startminute, $ec_startsecond, $ec_startmonth, $ec_startday, $ec_startyear));
// }
// if (($endDate != null) && (!empty($endDate))) {
              list($ec_endyear, $ec_endmonth, $ec_endday) = explode("-", $endDate);
              $endDate = date($options['dateFormatLarge'], mktime($ec_endhour, $ec_endminute, $ec_endsecond, $ec_endmonth, $ec_endday, $ec_endyear));
// }
            if ((!is_null($startTime) && !empty($startTime))) {
              list($ec_starthour, $ec_startminute, $ec_startsecond) = explode(":", $startTime);
              $startTime = date($options['timeFormatLarge'], mktime($ec_starthour, $ec_startminute, $ec_startsecond, $ec_startmonth, $ec_startday, $ec_startyear));
            }
            if (($endTime != null) && (!empty($endTime))) {
              list($ec_endhour, $ec_endminute, $ec_endsecond) = explode(":", $endTime);
              $endTime = date($options['timeFormatLarge'], mktime($ec_endhour, $ec_endminute, $ec_endsecond, $ec_endmonth, $ec_endday, $ec_endyear));
            }
            if (!empty($title) && !is_null($title))
              $output .= '<strong><center><span style="margin:1px;padding:1px;">'.$title.'</span></center></strong>';
            if (!empty($location) && !is_null($location))
              $output .= "<strong>"._c('Location','events-calendar')."</strong>: $location<br />";
            if (!empty($description) && !is_null($description))
              $output .= "<strong>"._c('Description','events-calendar')."</strong>: $description<br />";
            if ($startDate != $endDate) // && (!is_null($startDate) || !empty($startDate)) && (!is_null($endDate) || !empty($endDate)))
              $output .= "<strong>"._c('Start Date','events-calendar')."</strong>: $startDate<br />";
            if (!empty($startTime) || !is_null($startTime))
              $output .= "<strong>"._c('Start Time','events-calendar')."</strong>: $startTime<br />";
            if ($startDate != $endDate) // && (!is_null($endDate) || !empty($endDate)))
              $output .= "<strong>"._c('End Date','events-calendar')."</strong>: $endDate<br />";
            if (!empty($endTime) && !empty($startTime) || !is_null($endTime) && !is_null($startTime))
              $output .= "<strong>"._c('End Time','events-calendar')."</strong>: $endTime<br />";
            // Link outside the site if the link exist : priority on the PostID link
            if ($linkout != '') {
              $output .= "<strong>"._c('Link out','events-calendar')."</strong>: ".substr($linkout,0,19)."<br />";;
              $titlinked = "<a href=\"".$linkout."\" target=\"_blanck\"><strong>$title</strong></a>";
            } elseif ($PostID != '') { // Link to a post when exist
              $titlinked = "<a href=\"" . get_permalink($PostID) . "\"><strong>$title</strong></a>";
            } else {
              $titlinked = "<strong>$title</strong>";
            }
            $cursor = (($PostID != '') OR ($linkout != '')) ? 'pointer' : 'default';
          }
          if($output != ''):
// For tests
// <script type="text/javascript">
// // <![CDATA[
// jQuery.noConflict();
// (function($) {
// ecd.jq(document).ready(function() {
?>
      ecd.jq('#events-calendar-<?php echo $d;?>Large').append('<span class="event-block" id="events-calendar-<?php echo $id;?>Large"><?php echo $titlinked;?></span>');
      ecd.jq('#events-calendar-<?php echo $id;?>Large').attr('title', '<?php echo $output;?>');
        ecd.jq('#events-calendar-<?php echo $id;?>Large').mouseover(function() {
          ecd.jq(this).css('cursor', '<?php echo $cursor; ?>');
        });
      ecd.jq('#events-calendar-<?php echo $id;?>Large').tooltip({
        track: true,
        delay: 0,
        showURL: false,
        opacity: 1,
        fixPNG: true,
        showBody: " - ",
        // extraClass: "pretty",
        top: -15,
        left: 15
      });
<?php
// });
// })(jQuery);
// //]]>
//</script>
        endif;
      endforeach;
    endfor;
// For tests
// <script type="text/javascript">
// // <![CDATA[
// jQuery.noConflict();
// (function($) {
// ecd.jq(document).ready(function() {
?>
      ecd.jq('#EC_ajaxLoader').append(' <img src="<?php echo EVENTSCALENDARIMAGESURL . '/space.gif';?>" />');
      ecd.jq('#EC_previousMonthLarge').append("&#171;&nbsp;<?php echo ucfirst($this->get_incrMonth($m-1));?>");
      ecd.jq('#EC_nextMonthLarge').prepend("<?php echo ucfirst($this->get_incrMonth($m+1));?>&nbsp;&#187;");
      ecd.jq('#EC_previousMonthLarge').mouseover(function() {
        ecd.jq(this).css('cursor', 'pointer');
      });
      ecd.jq('#EC_nextMonthLarge').mouseover(function() {
        ecd.jq(this).css('cursor', 'pointer');
      });
      ecd.jq('#EC_previousMonthLarge').click(function() {
        ecd.jq('#EC_ajaxLoader').empty();
        ecd.jq('#EC_ajaxLoader').append(' <img src="<?php echo EVENTSCALENDARIMAGESURL . '/ajax-loader.gif';?>" />');
        ecd.jq.get("<?php bloginfo('siteurl');?>/index.php",
        {EC_action: "switchMonthLarge", EC_month: "<?php echo $m-1;?>", EC_year: "<?php echo $y;?>"},
        function(ecdata) {
          ecd.jq('#calendar_wrapLarge').empty();
          //ecd.jq('#calendar_wrapLarge').append(ecdata);
          ecd.jq('#calendar_wrapLarge').append(ecd.jq(ecdata).html());
        });
      });
      ecd.jq('#EC_nextMonthLarge').click(function() {
        ecd.jq('#EC_ajaxLoader').empty();
        ecd.jq('#EC_ajaxLoader').append(' <img src="<?php echo EVENTSCALENDARIMAGESURL . '/ajax-loader.gif';?>" />');
        ecd.jq.get("<?php bloginfo('siteurl');?>/index.php",
        {EC_action: "switchMonthLarge", EC_month: "<?php echo $m+1;?>", EC_year: "<?php echo $y;?>"},
        function(ecdata) {
          ecd.jq('#calendar_wrapLarge').empty();
          //ecd.jq('#calendar_wrapLarge').append(ecdata);
          ecd.jq('#calendar_wrapLarge').append(ecd.jq(ecdata).html());
        });
      });
<?php
// });
// })(jQuery);
// //]]>
//</script>
  }

  function listData($events) {
    /* Localisation ------------------------------------------------***/
    load_default_textdomain();
    require_once(ABSWPINCLUDE.'/locale.php');
    $wp_locale = new WP_Locale();
    /* -------------------------------------------------------------***/
    global $current_user;
    $options = get_option('optionsEventsCalendar');
    $format = $options['dateFormatLarge'];
    foreach($events as $e):
    $output = '';
    if($e->accessLevel == 'public' || $current_user->has_cap($e->accessLevel)) {
      $id = "$e->id";
      $title = $e->eventTitle;
      $description = preg_replace('#\r?\n#', '<br />', $e->eventDescription);
      $location = isset($e->eventLocation) && !empty($e->eventLocation) ? $e->eventLocation : '';
      list($ec_startyear, $ec_startmonth, $ec_startday) = explode("-", $e->eventStartDate);
        if(!is_null($e->eventStartTime) && !empty($e->eventStartTime)) {
          list($ec_starthour, $ec_startminute, $ec_startsecond) = explode(":", $e->eventStartTime);
          $startTime = date($options['timeFormatLarge'], mktime($ec_starthour, $ec_startminute, $ec_startsecond, $ec_startmonth, $ec_startday, $ec_startyear));
        } else $startTime = null;
        $startDate = date($options['dateFormatLarge'], mktime($ec_starthour, $ec_startminute, $ec_startsecond, $ec_startmonth, $ec_startday, $ec_startyear));
        list($ec_endyear, $ec_endmonth, $ec_endday) = split("-", $e->eventEndDate);
        if($e->eventEndTime != null && !empty($e->eventEndTime)) {
          list($ec_endhour, $ec_endminute, $ec_endsecond) = split(":", $e->eventEndTime);
          $endTime = date($options['timeFormatLarge'], mktime($ec_endhour, $ec_endminute, $ec_endsecond, $ec_endmonth, $ec_endday, $ec_endyear));
        } else $endTime = null;
        $endDate = date($options['dateFormatLarge'], mktime($ec_endhour, $ec_endminute, $ec_endsecond, $ec_endmonth, $ec_endday, $ec_endyear));
      $accessLevel = $e->accessLevel;
      $output .= "<strong>"._c('Title','events-calendar').": </strong>$title<br />";
      if(!empty($location) && !is_null($location))
        $output .= "<strong>"._c('Location','events-calendar').": </strong>$location<br />";
      if(!empty($description) && !is_null($description))
        $output .= "<strong>"._c('Description','events-calendar').": </strong>$description<br />";
      if($startDate != $endDate )
        $output .= "<strong>"._c('Start Date','events-calendar').": </strong>$startDate<br />";
      if(!empty($startTime) || !is_null($startTime))
        $output .= "<strong>"._c('Start Time','events-calendar').": </strong>$startTime<br />";
      if($startDate != $endDate)
        $output .= "<strong>"._c('End Date','events-calendar').": </strong>$endDate<br />";
      if(!empty($endTime) && !empty($startTime) || !is_null($endTime) && !is_null($startTime))
        $output .= "<strong>"._c('End Time','events-calendar').": </strong>$endTime<br />";
    }
    if($output != ''):
?>
<script type="text/javascript">
// <![CDATA[
  jQuery.noConflict();
  (function($) {
    ecd.jq(document).ready(function() {
      ecd.jq('#events-calendar-list-<?php echo $id;?>').attr('title', '<?php echo $output;?>');
      ecd.jq('#events-calendar-list-<?php echo $id;?>').mouseover(function() {
        ecd.jq(this).css('cursor', 'pointer');
      });
      ecd.jq('#events-calendar-list-<?php echo $e->id;?>').tooltip({
        delay:0,
        track:true
      });
    });
  })(jQuery);
//]]>
</script>
<?php
    endif;
    endforeach;
  }
}
endif;
?>