<?php
/*
Template Name: Home Page
*/
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
    <link href="/wp-content/themes/wmrcNew/css/styles.css" rel="stylesheet" type="text/css">
    <link href="/wp-content/themes/wmrcNew/css/reset.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="/wp-content/themes/wmrcNew/favico.ico" type="image/x-icon">
    <link rel="icon" href="/wp-content/themes/wmrcNew/favico.ico" type="image/ico">
    <link rel="shortcut icon" href="favico.ico">
	<link title="Waverley Model Railway Club" rel="search" type="application/opensearchdescription+xml"  href="http://www.waverleymrc.org.au/provider.xml">

	<?php if (is_front_page()) : ?>
	<!-- Scripts -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script type="text/javascript" src="/wp-content/themes/wmrcNew/js/jquery.roundabout-1.0.min.js"></script> 
	<script type="text/javascript" src="/wp-content/themes/wmrcNew/js/jquery.easing.1.3.js"></script>
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
				<img src="/wp-content/themes/wmrcNew/img/wmrctext-new.png" />
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
			<?php if (is_front_page()) : ?>

			<!-- Featured Image Slider -->
			<div id="featured" class="clearfix grid_12">
				<ul>
					<?php
						$dir	= dirname(__FILE__)."/featureimg/";
						$files	= glob($dir."*.jpg");
						
						shuffle($files);
						$files	= array_slice($files, 0, 3);
						
						foreach ($files as $val) {
							$val = str_replace(dirname(__FILE__), "http://".$_SERVER['SERVER_NAME']."/wp-content/themes/wmrcNew", $val);
							echo "<li><img src=\"".$val."\"></li>";
						}
					?> 
				</ul> 
			</div>
				
			<!-- Caption Line -->
			<h2 class="grid_12 caption clearfix">Welcome to the <span>Waverley Model Railway Club</span> website</h2><p class="clearfix">&nbsp;</p>&nbsp;
			<p class="caption">Established 1970</p>&nbsp;
			
			<div class="hr grid_12 clearfix">&nbsp;</div>
			<div id="quicknav" class="grid_12">
				<a class="quicknavgrid_3 quicknav alpha" href="/news">
					<h4 class="title ">News</h4>
					<p>Read the latest news from the Club.</p>
				</a>
				<a class="quicknavgrid_3 quicknav" href="/about-the-club">
					<h4 class="title ">About the club</h4>
					<p>Explore the history of the club, and see what our future plans are.</p>
				</a>
				<a class="quicknavgrid_3 quicknav" href="/exhibitions">
					<h4 class="title ">Our exhibitions</h4>
					<p>Take a look at the plans for our annual Queen's Birthday weekend exhibition.</p>
				</a>
				<a class="quicknavgrid_3 quicknav" href="/gallery2">
					<h4 class="title ">Photo Gallery</h4>
					<p>Photos from our exhibitions and others we have been invited to, submitted by members of the Club.</p>
				</a>
			</div>
			<div class="hr grid_12 clearfix">&nbsp;</div>
			<?php else: ?>
			<div class="newsContent grid_8 fullPage">
				<h2>Latest news</h2>
				<div class="hr dotted clearfix">&nbsp;</div>
				<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
					<div class="post" id="post-<?php the_ID(); ?>">
						<h3 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>&nbsp;
						<p class="sub"><?php the_time('F jS, Y') ?> by <?php the_author() ?></p>
						<div class="hr dotted clearfix">&nbsp;</div> 
						<p><?php the_content('Read more...'); ?></p>
						<div class="hr clearfix">&nbsp;</div>
					</div>
					<?php endwhile; ?>
					<div class="navigation">
						<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
						<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
					</div>
					&nbsp;
				<?php else : ?>
				<h2 class="center">Not Found</h2>
				<p class="center">Sorry, but you are looking for something that isn't here.</p>
				<?php endif; ?>
			</div>
			<div class="grid_4 fullPage sidebar">
				<ul class="events">
					<?php showEvents(); ?>
				</ul>
			</div>
			<?php endif; ?>
		</div>
		<div id="footer">
			<!-- Footer -->
			<?php get_footer(); ?>
		</div>
	</div><!--end wrapper-->
</body>
</html>