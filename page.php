<?php
get_header();
?>
<?php
if (have_posts()) :
    while (have_posts()) :
        the_post();
        ?>
        <section class="section-content">
            <article>   
                <div class="container">
                    <section class="entry-content">
                        <?php the_content(); ?>
                    </section>
                </div>
            </article>  
        </section>
        <?php
    endwhile;
endif;
?>
<?php get_footer(); ?>