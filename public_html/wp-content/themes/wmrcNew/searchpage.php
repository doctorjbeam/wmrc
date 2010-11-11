<?php
/*
Template Name: Search Page
*/
?>
<?php get_header(); ?>
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
<?php get_footer(); ?>