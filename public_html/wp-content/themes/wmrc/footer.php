		<div class="wrapper">
			<table width="100%" cellspacing="0" cellpadding="0">
				<tr>
					<td width="13"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/footerLeft.png" style="margin-left: 1px;"></td>
					<td class="footer" valign="bottom" align="left">
                    	<div>
							<p><a name="fb_share" type="button_count" href="http://www.facebook.com/sharer.php">Share</a><script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script></p>
                        	<p>&nbsp;&nbsp;<a href="<?php bloginfo('rss2_url'); ?>">RSS Feed</a> | <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds<br />
                        	&nbsp;&nbsp;Site created and maintaned by Michael Greenhill.<br />
							&nbsp;&nbsp;<a href="#" onclick="window.external.AddSearchProvider('http://www.waverleymrc.org.au/provider.xml')">Add Search Provider</a></p>
                        </div>
                    </td>
					<td class="footer" valign="bottom" align="right">
						<div>
							<p><?php wp_meta(); ?><br /><?php wp_loginout(); ?><br /><?php wp_register(); ?><a href="/stats" title="Usage Statistics">Stats</a></p>
						</div>
					</td>
					<td width="13"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/footerRight.png" style="margin-right: 1px" /></td>
				</tr>
			</table>
			&nbsp;
		</div>
	</center>
</body>
</html>