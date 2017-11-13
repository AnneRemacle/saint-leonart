<?php
/**
 * Template Name: Single Lieu
 */
get_header();?>

<section class="section">
    <h2 class="section__title"><?php the_title(); ?></h2>
    <figure class="section__figure">
        <?php the_post_thumbnail(); ?>
    </figure>
    <div class="section__text">
        <?php the_content(); ?>
    </div>

</section>

<?php get_footer();
