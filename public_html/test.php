<?php
	$link = mysql_connect('202.80.177.50', 'wmrc', 'wangcaster');
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	echo 'Connected successfully';
	mysql_close($link);
?>