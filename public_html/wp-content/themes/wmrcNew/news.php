<?php
/*
Template Name: News
*/
?>
<?php get_header(); ?>
		<div id="body">
			<div class="fullPage">
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
				<div class="clear clearfix">&nbsp;</div>
			</div>
			<div class="grid_12 fullPage">
				<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
			</div>
		</div>
<?php get_footer(); ?>