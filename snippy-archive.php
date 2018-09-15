<?php 
/* Template Name: Snippy archive */ 
get_header(); ?>

<?php 
$wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1, 'order' => 'DESC')); ?>

<div class="snippy-archive">
	<div class="container">
	   	<h1 class="main-page-title">
            <span class=""><?php the_title(); ?></span>
        </h1>
        <div class="snippy-container" data-simplebar>
		<?php if ( $wpb_all_query->have_posts() ) : ?>

			<?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
			  <div class="main-code-snippy-content">
			    <h2><?php the_title(); ?></h2>
			    <div class="content-container">
			      <pre><code class="language-php"><?php the_content(); ?></code></pre>
			    </div>
			  </div>

			<?php endwhile; ?>

			<?php wp_reset_postdata(); ?>

		<?php else : ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php endif; ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
