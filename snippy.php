<?php
/* Template Name: Snippy post */ 
get_header();
?>
<?php
if (have_posts()) :
    while (have_posts()) :
        the_post();
        ?>
		<div class="container">
			<h1 class="main-page-title">
				<?php the_title(); ?>
			</h1>
			<div class="note">
				<p>please click on the code button [<>] before typing your code</p>
			</div>
			<div class="sub-container">
				<?php the_content(); ?>
			</div>
        <?php
    endwhile;
endif;
?>
<?php get_footer(); ?>