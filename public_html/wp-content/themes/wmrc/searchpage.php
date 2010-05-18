<?php
/*
Template Name: Search Page
*/

get_header(); ?>

	<div class="fullPage"> 
		<h1>Search Results</h1>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>
	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	</div>
</div>

<?php get_footer(); ?>