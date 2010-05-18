<div class="hr dotted clearfix">&nbsp;</div>
<div class="grid_4">
	<p><a href="<?php bloginfo('rss2_url'); ?>">RSS Feed</a> | <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds<br />
	Site created and maintaned by Michael Greenhill.<br />
	<a href="#" onclick="window.external.AddSearchProvider('http://www.waverleymrc.org.au/provider.xml')">Add Search Provider</a></p>
	<p>&nbsp;</p>
</div>
<div class="grid_4">
	<p><center><a name="fb_share" type="button_count" href="http://www.facebook.com/sharer.php">Share</a><script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script></center></p>
</div>
<div class="grid_4 align_right" style="margin-top: -1.2em;">
	<p><?php wp_meta(); ?><br /><?php wp_loginout(); ?><br /><?php wp_register(); ?><a href="/stats" title="Usage Statistics">Stats</a></p>
</div>