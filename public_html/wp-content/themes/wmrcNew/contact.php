<?php
/*
Template Name: Contact page
*/
	header ('Cache-Control: public, max-age=' . (60 * 60 * 24 * 7));
	header ('Expires: ' . gmdate("D, d M Y H:i:s", time() + (60 * 60 * 24 * 7)) . " GMT");
	
	include("functions-new.php"); 
	
	$position	= isset($_REQUEST['position']) ? htmlspecialchars($_REQUEST['position']) : false; 
	$title		= isset($_REQUEST['title']) ? htmlspecialchars($_REQUEST['title']) : false; 
	$message	= isset($_REQUEST['message']) ? htmlspecialchars($_REQUEST['message']) : false; 
	$submitted	= isset($_REQUEST['submitted']) ? htmlspecialchars($_REQUEST['submitted']) : false; 
	
	if ($submitted == true && ($position == false || $title == false || $message == false)) {
		$fail = "You did not complete all required fields.";
	} elseif ($submitted == true && $position != false && $title != false && $message != false) {
		$fail = "Thankyou for your inquiry."; 
		
		// Do something with the data. Email it, maybe...?
		$headers = "From: inquiries@waverleymrc.org.au"."\r\n"."Reply-to: do-not-reply@waverleymrc.org.au"."\r\n". 'X-Mailer: PHP/' . phpversion();
		mail($position, $title, $message, $headers); 
	} else {
		$fail = false; 
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="verify-v1" content="LrDVNdEmfbnluoEGLobgpCm2eEhpTvr1wrYRB7mVptY=" />
    <meta name="verify-v1" content="LrDVNdEmfbnluoEGLobgpCm2eEhpTvr1wrYRB7mVptY=" >
    <title>Waverley Model Railway Club</title>
    <link href="<?php bloginfo('stylesheet_directory'); ?>/css/styles.css" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('stylesheet_directory'); ?>/css/reset.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="<?php bloginfo('stylesheet_directory'); ?>/favico.ico" type="image/x-icon">
    <link rel="icon" href="<?php bloginfo('stylesheet_directory'); ?>/favico.ico" type="image/ico">
    <link rel="shortcut icon" href="favico.ico">
	<link title="Waverley Model Railway Club" rel="search" type="application/opensearchdescription+xml"  href="http://www.waverleymrc.org.au/provider.xml">
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
			<div class="grid_7 right" style="width: 420px">
			<ul id="navigation">
				<?php
					wp_list_pages('title_li=');
				?>
				<li><a href="/gallery2/">Gallery</a></li>
			</ul>
			</div>
		</div>
		<div class="clear"></div>
		&nbsp;
		<div id="body">
			<div class="grid_7 fullPage" id="contact_form">
				<h2>Contact the Club</h2>
				<div class="hr dotted clearfix nohide">&nbsp;</div>
				<p>We welcome all sorts of enquiries. Please use the form below to contact one of our Club Officers, or contact them directly using the email addresses provided opposite.</p>
				<?php if ($fail != false) : ?>
				<p class="message"><?php echo $fail; ?></p>
				<?php endif; ?>
				<div class="hr dotted clearfix nohide">&nbsp;</div>
				<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="contact" name="contact" method="post">
					<input type="hidden" name="submitted" id="submitted" value="true">
 					<table width="100%" cellspacing="0" cellpadding="0">
						<tr>
							<td valign="top"><label for="position">Position</label></td>
							<td>
								<select name="position" id="position">
									<option value="president@waverleymrc.org.au">President</option>
									<option value="secretary@waverleymrc.org.au">Secretary</option>
									<option value="membership@waverleymrc.org.au">Membership</option>
									<option value="exhibitions@waverleymrc.org.au">Exhibitions</option>
									<option value="webmaster@waverleymrc.org.au">Webmaster</option>
								</select>
							</td>
						</tr>
						<tr>
							<td valign="top"><label for="title">Title</label></td>
							<td><input type="text" name="title" id="title" class="fancy subject"></td>
						</tr>
						<tr>
							<td valign="top"><label for="message">Message</label></td>
							<td><textarea name="message" id="message"></textarea></td>
						</tr>
					</table>
					<div class="hr dotted clearfix nohide">&nbsp;</div>
					<p><input class="button" type="submit" name="submit" id="submit" value="Submit"><input class="button" type="reset" name="reset" id="reset" value="Cancel"></p>
				</form>
			</div>
			<div class="grid_5 fullPage sidebar">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="post" id="post-<?php the_ID(); ?>">
					<div class="entry">
						<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
		
						<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
		
					</div>
				</div>
				<?php endwhile; endif; ?>
				<div class="clear clearfix">&nbsp;</div>
			</div>
			<div class="grid_12 fullPage">
				<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
			</div>
		</div>
		<div id="footer">
			<!-- Footer -->
			<?php get_footer(); ?>
		</div>
	</div><!--end wrapper-->
</body>
</html>