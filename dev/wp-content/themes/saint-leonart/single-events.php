<?php
/**
 * Template Name: Single Event
 */
get_header();?>

<section class="section">
    <h2 class="section__title"><?php the_title(); ?></h2>
    <div class="section__text">
        <?php the_content(); ?>
    </div>

</section>

<?php get_footer();
