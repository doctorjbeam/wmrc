<?php
if(!class_exists('EC_ManagementJS')) :

require_once(EVENTSCALENDARCLASSPATH.'/ec_db.class.php');

class EC_ManagementJS { // Dashboeard calendar management content
  var $db;

  function EC_ManagementJS() {
    $this->db = new EC_DB();
  }

  function calendarData($m, $y) { // Display Tooltip in EC Management
    $options = get_option('optionsEventsCalendar');
    $lastDay = date('t', mktime(0, 0, 0, $m, 1, $y));
    for($d = 1; $d <= $lastDay; $d++):
        $sqldate = date('Y-m-d', mktime(0, 0, 0, $m, $d, $y));
        foreach($this->db->getDaysEvents($sqldate) as $e) :
            $output = '';
            $id = "$d-$e->id";
            $title = $e->eventTitle;
            $description = preg_replace('#\r?\n#', '<br>', $e->eventDescription);
            $location = isset($e->eventLocation) ? $e->eventLocation : '';
            $linkout = isset($e->eventLinkout) ? $e->eventLinkout : '';
            $startDate = $e->eventStartDate;
            $endDate = $e->eventEndDate;
            $startTime = isset($e->eventStartTime) ? $e->eventStartTime : '';
            $endTime = isset($e->eventEndTime) ? $e->eventEndTime : '';
            $accessLevel = $e->accessLevel;
            $PostID = isset($e->postID) ? $e->postID : '';
            $output .= "<strong>"._c('Title','events-calendar').": </strong>$title<br />";
            $output .= "<strong>"._c('Location','events-calendar').": </strong>$location<br />";
            $output .= "<strong>"._c('Description','events-calendar').": </strong>$description<br />";
            $output .= "<strong>"._c('Start Date','events-calendar').": </strong>$startDate<br />";
            $output .= "<strong>"._c('Start Time','events-calendar').": </strong>$startTime<br />";
            $output .= "<strong>"._c('End Date','events-calendar').": </strong>$endDate<br />";
            $output .= "<strong>"._c('End Time','events-calendar').": </strong>$endTime<br />";
            $output .= "<strong>"._c('Visibility','events-calendar').": </strong>$accessLevel<br />";
            $asslink = '';
            if (!$linkout == '') {
              $output .= "<strong>"._c('Link out','events-calendar')."</strong> :".substr($linkout,0,19)."<br />";;
              $asslink ='<img id=\"events-calendar-link-' . $d . '-' . $e->id . '\" src=\"' . EVENTSCALENDARIMAGESURL . '/link.gif\" style=\"width:10px;height:10px;\" title=\"' . __("Associated link","events-calendar") . '\">&nbsp;';
            }
            $asspost = '';
            if (!$PostID == '') {
              $IDtmp = get_post($PostID);
              $ptitle = $IDtmp->post_title;
              // $ptitle = get_post($PostID)->post_title;
              $output .= "<strong>"._c('Post','events-calendar')." ($PostID)</strong> :".addslashes($ptitle)."<br />";;
              $asspost = '<img id=\"events-calendar-post-' . $d . '-' . $e->id . '\" src=\"' . EVENTSCALENDARIMAGESURL . '/post.gif\" style=\"width:10px;height:10px;\" title=\"' . __("Associated post","events-calendar") . '\">&nbsp;';
            }

            if($output != ''):
?>
                <script type="text/javascript">
                // <![CDATA[
                  jQuery.noConflict();
                  (function($) {
                    $(document).ready(function() {
                      $('#events-calendar-<?php echo $d;?>').append("<div id=\"events-calendar-container-<?php echo $id;?>\"><?php echo $asslink, $asspost;?><span id=\"events-calendar-<?php echo $id;?>\"><?php echo $title;?>&nbsp;</span><img id=\"events-calendar-delete-<?php echo $id;?>\" src=\"<?php echo EVENTSCALENDARIMAGESURL;?>/delete.gif\" style=\"width:12px;height:12px;\" title=\"<?php _e('Delete','events-calendar');?>\" /><\div>");
                      $('#events-calendar-<?php echo $id;?>').attr('title', '<?php echo $output;?>');
                      $('#events-calendar-<?php echo $id;?>').css('color', 'black');
                      $('#events-calendar-<?php echo $id;?>').css('font-size', '0.9em');
                      $('#events-calendar-<?php echo $id;?>').mouseover(function() {
                        $(this).css('cursor', 'pointer');
                      });
                      $('#events-calendar-delete-<?php echo $id;?>').mouseover(function() {
                        $(this).css('cursor', 'pointer');
                      });
                      $('#events-calendar-link-<?php echo $id;?>').mouseover(function() {
                        $(this).css('cursor', 'pointer');
                      });
                      $('#events-calendar-post-<?php echo $id;?>').mouseover(function() {
                        $(this).css('cursor', 'pointer');
                      });
                      $('#events-calendar-<?php echo $id;?>').click(function() {
                        top.location = "?page=events-calendar&EC_action=edit&EC_id=<?php echo $e->id;?>";
                      });
                      $('#events-calendar-link-<?php echo $id;?>').click(function() {
                        window.open('<?php echo $linkout;?>');
                      });
                      $('#events-calendar-post-<?php echo $id;?>').click(function() {
                        window.open('<?php echo get_permalink($PostID);?>');
                      });
                      $('#events-calendar-<?php echo $id;?>').tooltip({
                        delay:0,
                        track:true
                      });
                      $('#events-calendar-delete-<?php echo $id;?>').click(function() {
                        doDelete = confirm("<?php _e('Are you sure you want to delete the following event:\n','events-calendar');echo $e->eventTitle;?>");
                        if(doDelete) {
                          $.get("<?php bloginfo('siteurl');?>/wp-admin/admin.php?page=events-calendar",
                          {EC_action: "ajaxDelete", EC_id: <?php echo $e->id;?>},
                          function(data) {
                            for(d = 1; d <= <?php echo $lastDay;?>; d++) {
                              $('#events-calendar-container-' + d + '-<?php echo $e->id;?>').css('background', 'red');
                              $('#events-calendar-container-' + d + '-<?php echo $e->id;?>').fadeOut(1000);
                            }
                          });
                        }
                      });
                    });
                  })(jQuery);
                //]]>
                </script>
<?php
            endif;
        endforeach;
    endfor;
    $this->calendarjs();
  }
  function calendarjs() {
    global $loc_lang;
?>
    <script type="text/javascript">
    // <![CDATA[
      jQuery.noConflict();
      (function($) {
        $(document).ready(function() {
          $("#EC_startDate").datepicker($.extend({},
               $.datepicker.regional["<?php echo $loc_lang; ?>"], {
                  showOn: "button",
                  showStatus: true,
                  buttonImage: "<?php echo EVENTSCALENDARIMAGESURL."/calendar.gif";?>",
                  buttonImageOnly: true,
                  dateFormat: 'yy-mm-dd',
                  firstDay: <?php echo get_option('start_of_week');?>
              }
          ));
          $("#EC_endDate").datepicker($.extend({},
               $.datepicker.regional["<?php echo $loc_lang; ?>"], {
                  showOn: "button",
                  showStatus: true,
                  buttonImage: "<?php echo EVENTSCALENDARIMAGESURL."/calendar.gif";?>",
                  buttonImageOnly: true,
                  dateFormat: 'yy-mm-dd',
                  firstDay: <?php echo get_option('start_of_week');?>
              }
          ));
          $("#EC_start_clockpick").clockpick({
              military: true,
              useBgiframe: true,
              valuefield: 'EC_startTime',
              starthour: '0',
              endhour: '23',
              layout: 'horizontal'
          });
          $("#EC_end_clockpick").clockpick({
              military: true,
              useBgiframe: true,
              valuefield: 'EC_endTime',
              starthour: '0',
              endhour: '23',
              layout: 'horizontal'
          });
        });
      })(jQuery);
    //]]>
    </script>
<?php
  }
}
endif;
?>