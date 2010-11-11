<?php
/*
Template Name: Contact page
*/
?>
<?php get_header(); ?>
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
<?php get_footer(); ?>