<?php
/*
Template Name: Search Page
*/

#get_header(); ?>
<?php
	header ('Cache-Control: public, max-age=' . (60 * 60 * 24 * 7));
	header ('Expires: ' . gmdate("D, d M Y H:i:s", time() + (60 * 60 * 24 * 7)) . " GMT");
	
	include("functions-new.php"); 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="verify-v1" content="LrDVNdEmfbnluoEGLobgpCm2eEhpTvr1wrYRB7mVptY=" />
    <meta name="verify-v1" content="LrDVNdEmfbnluoEGLobgpCm2eEhpTvr1wrYRB7mVptY=" >
    <title>Waverley Model Railway Club</title>
    <link href="<?php bloginfo('stylesheet_directory'); ?>/css/styles.css" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('stylesheet_directory'); ?>/css/reset.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="<?php bloginfo('stylesheet_directory'); ?>/favico.ico" type="image/x-icon">
    <link rel="icon" href="<?php bloginfo('stylesheet_directory'); ?>/favico.ico" type="image/ico">
    <link rel="shortcut icon" href="favico.ico">
	<link title="Waverley Model Railway Club" rel="search" type="application/opensearchdescription+xml"  href="http://www.waverleymrc.org.au/provider.xml">
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
			<div class="grid_7 right" style="width: 420px">
			<ul id="navigation">
				<?php
					wp_list_pages('title_li=');
				?>
				<li><a href="/gallery2/">Gallery</a></li>
			</ul>
			</div>
		</div>
		<div class="clear"></div>
		&nbsp;
		<div id="body">
			<div class="grid_12 fullPage">
				<h2>Search Results</h2>
				<div id="searchform">
					<?php include (TEMPLATEPATH . '/searchform.php'); ?>
				</div>
				<div class="clear clearfix">&nbsp;</div>
			</div>
			<div class="grid_12 fullPage">
				<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
			</div>
		</div>
		<div id="footer">
			<!-- Footer -->
			<?php get_footer(); ?>
		</div>
	</div><!--end wrapper-->
</body>
</html>