<?php
	header ('Cache-Control: public, max-age=' . (60 * 60 * 24 * 7));
	header ('Expires: ' . gmdate("D, d M Y H:i:s", time() + (60 * 60 * 24 * 7)) . " GMT");
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
			<ul id="navigation" class="grid_7">
				<?php
					wp_list_pages('title_li=');
				?>
				<li><a href="/gallery2/">Gallery</a></li>
			</ul>
		</div>
		<div class="clear"></div>
		&nbsp;
		<div id="body">
			<?php if (is_front_page()) : ?>
			<!-- Featured Image Slider -->
			<div id="featured" class="clearfix grid_12">
				<ul> 
					<li>
						<a href="portfolio_single.html">
							<img src="<?php bloginfo('stylesheet_directory'); ?>/featureimg/IMG_5854.jpg" alt="" />
						</a>
					</li>  
					<li>
						<a href="portfolio_single.html">
							<span>Read about this project</span>
							<img src="<?php bloginfo('stylesheet_directory'); ?>/featureimg/IMG_1457.jpg" alt="" />
						</a>	
					</li>  
					<li>
						<a href="portfolio_single.html">
							<span>Read about this project</span>
							<img src="<?php bloginfo('stylesheet_directory'); ?>/featureimg/IMG_1522.jpg" alt="" />
						</a>
					</li>  
				</ul> 
			</div>
				
			<!-- Caption Line -->
			<h2 class="grid_12 caption clearfix">Welcome to the <span>Waverley Model Railway Club</span> website</h2>
			<p class="caption">Established 1970</p>
			
			<div class="hr grid_12 clearfix quicknavhr">&nbsp;</div>
			<div id="quicknav" class="grid_12">
				<a class="quicknavgrid_3 quicknav alpha" href="/news">
					<h4 class="title ">News</h4>
					<p>Read the latest news from the Club.</p>
				</a>
				<a class="quicknavgrid_3 quicknav" href="/about">
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
			<div class="newsContent grid_8">
				<img style="position: relative; left: 1px;" alt="Latest News" src="<?php bloginfo('stylesheet_directory'); ?>/img/newsTitle.png"/>
				<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
					<div class="post" id="post-<?php the_ID(); ?>">
						<p class="newsTitle">
							<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
							<small><?php the_time('F jS, Y') ?> by <?php the_author() ?></small>
						</p>
						<p><?php the_content('Read the rest of this entry &raquo;'); ?></p>
					</div>
					<?php endwhile; ?>
					<div class="navigation">
						<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
						<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
					</div>
				<?php else : ?>
				<h2 class="center">Not Found</h2>
				<p class="center">Sorry, but you are looking for something that isn't here.</p>
				<?php endif; ?>
			</div>
			<div class="grid_4">&nbsp;</div>
			<?php endif; ?>
		</div>
		<div id="footer">
			<!-- Footer -->
			<?php get_footer(); ?>
		</div>
	</div><!--end wrapper-->
</body>
</html>