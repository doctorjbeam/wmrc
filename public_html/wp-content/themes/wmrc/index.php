<?php
	header ('Cache-Control: public, max-age=' . (60 * 60 * 24 * 7));
	header ('Expires: ' . gmdate("D, d M Y H:i:s", time() + (60 * 60 * 24 * 7)) . " GMT");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="verify-v1" content="LrDVNdEmfbnluoEGLobgpCm2eEhpTvr1wrYRB7mVptY=" />
    <title>Waverley Model Railway Club</title>
    <link href="<?php bloginfo('stylesheet_directory'); ?>/style.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="<?php bloginfo('stylesheet_directory'); ?>/favico.ico" type="image/x-icon">
    <link rel="icon" href="<?php bloginfo('stylesheet_directory'); ?>/favico.ico" type="image/ico">
    <link rel="shortcut icon" href="favico.ico"> 
    <meta name="keywords" content="wmrc waverley waverleymrc melbourne model railway victoria train ho n scale exhibition models">
    <meta name="description" content="Waverley Model Railway Club, established 1970. Based in the south-east suburbs of Melbourne, Australia, we have a number of N, HO and OO scale layouts which make appearances at a number of exhibitions each year. We also host our own annual exhibition on the Queens Birthday long weekend in June. ">
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/scripts.js"></script>
	<link title="Waverley Model Railway Club" rel="search" type="application/opensearchdescription+xml"  href="http://www.waverleymrc.org.au/provider.xml">
</head>

<body>
	<center>
		<div class="wrapper">
			<img class="floatLeft" src="<?php bloginfo('stylesheet_directory'); ?>/img/wrapperLeftBg.png">
			<img class="floatRight" src="<?php bloginfo('stylesheet_directory'); ?>/img/wrapperRightBg.png">
			<div id="content">
				<div id="sinasucks">&nbsp;</div>
				<div id="header">
					<img src="<?php bloginfo('stylesheet_directory'); ?>/img/wmrcLogo.png" alt="Waverley Model Railway Club">
					<img src="<?php bloginfo('stylesheet_directory'); ?>/img/wmrcText.png" alt="Waverley Model Railway Club">
				</div>
                
				<div id="sidebar">
					<div class="itemHeader">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/img/itemBgLeftTrans.png" class="floatLeft">
						<div class="itemHeaderBackground alignCentre itemHeaderLeftMargin">events</div>
					</div>
					<div class="sidebarTop">
						<ul class="events">
							<?php showEvents(); ?>
						</ul>
					</div>
					<div class="sidebarBottom">
						<?php include("./wp-content/themes/wmrc/galleryimg.php"); ?>
					</div>
				</div>
                
				<div class="sidebarMargin">
					<div id="menu">
						<div>
							<img src="<?php bloginfo('stylesheet_directory'); ?>/img/menuEnd.png" class="floatRight">
							<ul>
								<li class="menuMain">MENU</li>
								<li><a href="/">Home</a></li>
								<li><a href="/gallery2/">Gallery</a></li>
                                <?php
									$pages = get_pages();
									
									foreach ($pages as $pagg) {
										echo "<li><a href='".get_page_link($pagg->ID)."'>".$pagg->post_title."</a></li>";
									}
								?>
							</ul>
						</div>
					</div>
				</div>
                
				<p class="sidebarMargin" style="margin: 0px; ">&nbsp;</p>
				<div class="sidebarMargin newsBg">
					<div id="focus" style="position: relative; top: -14px;">
						<a href="/exhibition.php"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/banner-WMRC2010.jpg" alt="WMRC 2010 Exhibition"></a>
					</div>
					<div class="newsContent">
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
					<img src="<?php bloginfo('stylesheet_directory'); ?>/img/newsFooter.png" style="margin-bottom: -4px;">
				</div>
                
			</div>
		</div>

		<?php get_footer(); ?>
