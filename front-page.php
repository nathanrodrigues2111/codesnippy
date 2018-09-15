<?php get_header(); ?>
<?php
if (have_posts()):
	while (have_posts()):
		the_post();
	?>
	<div class="container">
		<div class="top-section">
		<a href="<?php echo bloginfo('url'); ?>">
			<h1>Code snippy</h1>
		</a>
		</div>
		<input class="form-control" type="text" name="keyword" placeholder="" id="keyword" onkeyup="fetch()"></input>
			<div id="datafetch"></div>
		<?php
		endwhile;
		endif;
		?>
		<?php get_footer(); ?>