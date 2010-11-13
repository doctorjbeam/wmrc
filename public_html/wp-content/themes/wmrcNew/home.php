<?php
/*
Template Name: Home Page
*/
?>
<?php get_header(); ?>
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
	<?php endif; ?>
</div>
<?php get_footer(); ?>