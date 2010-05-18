	<div id="metaSidebar">
		<ul>
			<?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>

				<li><h2>Meta</h2>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
				</li>
			<?php } ?>
		</ul>
	</div>

