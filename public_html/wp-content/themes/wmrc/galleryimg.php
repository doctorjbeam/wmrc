<?php
	// Gallery config
	
	$user	= "mgreenhill";
	$pass	= "xx5cn42f";
	$host	= "202.80.177.50";
	$name	= "wmrc";
	$path	= "/home/wmrc/gallery/g2data/albums/";
	$url	= "/main.php?g2_view=core.DownloadItem&g2_itemId=%1&g2_serialNumber=%2&g2_fileName=%3";
	$data	= array();
	$dom	= "http://www2.waverleymrc.org.au";
	
	$db = new mysqli($host, $user, $pass, $name);
	
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	
	
	// Get list of gallery items
	$query = "SELECT i.g_id, i.g_title, fs.g_pathComponent, e.g_serialNumber 
				FROM g2_Item i, g2_FileSystemEntity fs, g2_Entity e
				WHERE i.g_canContainChildren = 0 
				AND i.g_id = fs.g_id
				AND e.g_id = fs.g_id";
	
	if ($rs = $db->query($query)) {
		while ($row = $rs->fetch_assoc()) {
			$replace = array();
			$replace['g_id'] 			= $row['g_id'];
			$replace['g_serialNumber'] 	= $row['g_serialNumber'];
			$replace['g_pathComponent']	= $row['g_pathComponent'];
			
			$find = array("%1", "%2", "%3");
			
			$url1 = str_replace($find, $replace, $url);
			unset($find); unset($replace);
			
			$data[] = "http://gallery.waverleymrc.org.au" . $url1;
		}
		$rs->close();
	}
	
	$db->close();
	
	$rand = array();
	
	// Generate randoms from list
	for ($i = 0; $i < 4; $i++) {
		$num = mt_rand(0, count($data) - 1);
		
		if (in_array($num, $rand)) {
			$num = mt_rand(0, count($data) - 1);
		}
		
		$rand[] = $num;
	}
	
	$url = array();
	
	foreach ($rand as $id) {
		$url[] = "./showimage.php?image=" . base64_encode(htmlspecialchars($data[$id]));
		#var_dump(htmlspecialchars($data[$id]));
		
	}
	
	echo "<div id='galleryThumbs'>";
	echo "<p>Gallery Images</p>";
	
	foreach ($url as $link) {
		echo "<img src='".$link."'>";
	}
	
	echo "</div>";
?>
