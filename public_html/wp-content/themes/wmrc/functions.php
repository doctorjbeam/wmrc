<?php
	function sidebarLogin() {
	
	}
	
	function showEvents() {
		/*
		$cn = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
		
		if (!$cn) {
			die("Could not connect to events database: ".mysql_error()); 
		}
		*/
		
		$currDate = strtotime(date("Y-m-d"));
		
		#$query	= "SELECT * FROM wp_eventscalendar_main WHERE eventEndDate >= ".$currDate." ORDER BY eventStartDate LIMIT 5";
		$query	= "SELECT * FROM wp_eventscalendar_main ORDER BY eventStartDate";
		$result	= mysql_query($query);
		$count	= mysql_num_rows($result);
		
		if (!$result || $count == 0) {
			echo "No events were found.";
		} else {
			$i = 0;
			while ($row = mysql_fetch_assoc($result)) {
				$start	= strtotime($row['eventStartDate']);
				$end	= strtotime($row['eventEndDate']);
				
				#echo "<p>$currDate | $end</p>";
				
				if ($end >= $currDate && $i < 4) {
					$i++;
					echo "<li class='eventTitle'>".$row['eventTitle']."</li>";
					echo '<li class="eventDesc">';
					
					if ($start == $end) {
						echo "<strong>Date: </strong><em>".date("D jS F Y", $start)."</em>";
					} else {
						echo "<strong>Date: </strong><em>".date("D jS F Y", $start)." - ".date("D jS F Y", $end)."</em>";
					}
					
					echo '<br><strong>Times: </strong><em>'.$row['eventDescription']."</em>";
					
					echo "<br><strong>Location: </strong><em>".$row['eventLocation']."</em>";
					
					echo "</li>";
				}
			}
			
			if ($i == 0) {
				echo "<p>No more events for the current year.</p><p>Email michael@waverleymrc.org.au to add your event!</p>";
			}
		}
	}
?>
