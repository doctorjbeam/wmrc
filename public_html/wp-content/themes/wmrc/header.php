<?php
	header ('Cache-Control: public, max-age=' . (60 * 60 * 24 * 7));
	header ('Expires: ' . gmdate("D, d M Y H:i:s", time() + (60 * 60 * 24 * 7)) . " GMT");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="keywords" content="wmrc waverley model railway club waverley mrc model railway model railroad glen waverley wheelers hill dandenong ho oo n scale">
    <title>Waverley Model Railway Club</title>
    <link href="<?php bloginfo('stylesheet_directory'); ?>/style.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="<?php bloginfo('stylesheet_directory'); ?>/favico.ico" type="image/x-icon">
    <link rel="icon" href="<?php bloginfo('stylesheet_directory'); ?>/favico.ico" type="image/ico">
    <link rel="shortcut icon" href="favico.ico"> 
    <meta name="keywords" content="wmrc waverley waverleymrc melbourne model railway victoria train ho n scale exhibition models"> 
    <meta name="description" content="Waverley Model Railway Club, established 1970. Based in the south-east suburbs of Melbourne, Australia, we have a number of N, HO and OO scale layouts which make appearances at a number of exhibitions each year. We also host our own annual exhibition on the Queens Birthday long weekend in June. ">
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/scripts.js"></script>
	<link title="Waverley Model Railway Club" rel="search" type="application/opensearchdescription+xml"  href="http://www.waverleymrc.org.au/provider.xml">
</head>

<body>
	<center>
		<div class="wrapper">
			<img class="floatLeft" src="<?php bloginfo('stylesheet_directory'); ?>/img/wrapperLeftBg.png">
			<img class="floatRight" src="<?php bloginfo('stylesheet_directory'); ?>/img/wrapperRightBg.png">
			<div id="content">
				<div id="sinasucks">&nbsp;</div>
				<div id="header">
					<img src="<?php bloginfo('stylesheet_directory'); ?>/img/wmrcLogo.png" alt="Waverley Model Railway Club">
					<img src="<?php bloginfo('stylesheet_directory'); ?>/img/wmrcText.png" alt="Waverley Model Railway Club">
				</div>
                
				<div class="sidebarMargin">
					<div id="menu">
						<div>
							<img src="<?php bloginfo('stylesheet_directory'); ?>/img/menuEnd.png" class="floatRight">
							<ul>
								<li class="menuMain">MENU</li>
								<li><a href="/">Home</a></li>
								<li><a href="/gallery2/">Gallery</a></li>
                                <?php
									$pages = get_pages();
									
									foreach ($pages as $pagg) {
										echo "<li><a href='".get_page_link($pagg->ID)."'>".$pagg->post_title."</a></li>";
									}
								?>
							</ul>
						</div>
					</div>
				</div>
