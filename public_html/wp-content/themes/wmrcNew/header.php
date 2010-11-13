<?php
	#header ('Cache-Control: public, max-age=' . (60 * 60 * 24 * 7));
	#header ('Expires: ' . gmdate("D, d M Y H:i:s", time() + (60 * 60 * 24 * 7)) . " GMT");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="verify-v1" content="LrDVNdEmfbnluoEGLobgpCm2eEhpTvr1wrYRB7mVptY=" />
    <meta name="verify-v1" content="LrDVNdEmfbnluoEGLobgpCm2eEhpTvr1wrYRB7mVptY=" >
    <title>Waverley Model Railway Club</title>
    <link href="/wp-content/themes/wmrcNew/css/styles.css" rel="stylesheet" type="text/css">
    <link href="/wp-content/themes/wmrcNew/css/reset.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="/wp-content/themes/wmrcNew/favico.ico" type="image/x-icon">
    <link rel="icon" href="/wp-content/themes/wmrcNew/favico.ico" type="image/ico">
    <link rel="shortcut icon" href="favico.ico">
	<link title="Waverley Model Railway Club" rel="search" type="application/opensearchdescription+xml"  href="http://www.waverleymrc.org.au/provider.xml">

	<?php if (is_front_page()) : ?>
	<!-- Scripts -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.roundabout-1.0.min.js"></script> 
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.easing.1.3.js"></script>
	<script type="text/javascript">		
		$(document).ready(function() { //Start up our Featured Project Carosuel
			var interval; 
			
			$('#featured ul').roundabout({
				easing: 'easeOutInCirc',
				duration: 600
			});
			
			$('#featured ul').hover(
				function() {
					clearInterval(interval);
				},
				function() {
					interval = startAutoPlay();
				}
			);
			
			interval = startAutoPlay();
		});
		function startAutoPlay() {
			return setInterval(function() {
				$('#featured ul').roundabout_animateToNextChild();
			}, 3000);
		}
	</script>  

	<!--[if IE 6]>
	<script src="js/DD_belatedPNG_0.0.8a-min.js"></script>
	<script>
	  /* EXAMPLE */
	  DD_belatedPNG.fix('.button');
	  
	  /* string argument can be any CSS selector */
	  /* .png_bg example is unnecessary */
	  /* change it to what suits you! */
	</script>
	<![endif]-->
	<?php endif; ?>
</head>
<body>
	<div id="topBar">&nbsp;</div>
	<div id="wrapper" class="container_12 clearfix">
		<div id="header">
			<!-- Text Logo -->
			<div class="wmrclogo grid_5">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/img/wmrctext-new.png" />
			</div>
			
			<!-- Navigation Menu -->
			<?php wp_nav_menu(array("container" => "ul", "container_id" => "navigation")); ?>
		</div>
		<div class="clear"></div>
		&nbsp;

