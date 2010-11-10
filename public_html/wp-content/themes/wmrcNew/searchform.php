<form method="get" id="searchforms" action="<?php bloginfo('url'); ?>/" name="searchforms">
	<label class="hidden" for="s"><?php _e('Search for:'); ?></label>
	<div>
		<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
		<input type="submit" id="searchsubmit" value="Search" class="button" />
	</div>
</form>
