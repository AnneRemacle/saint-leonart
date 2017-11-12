<?php
/**
 * Template Name: Programme
 */
get_header();?>

<section class="section">
    <h2 class="section__title"><?php the_title(); ?></h2>
    <div class="section__text"><?php the_content(); ?></div>

    <div class="buttons">
        <a href="" class="buttons__single">Programme par jour</a>
        <?php if( have_rows('jours') ):
            while ( have_rows('jours') ) : the_row(); ?>
            <a href="" class="buttons__filter btn btn-1 btn-1e"><?php the_sub_field( 'jour' ); ?></a>
            <?php endwhile; ?>
        <?php endif; ?>
        <a href="" class="buttons__single">Expositions</a>
        <a href="" class="buttons__single">Concerts/spectacles</a>
        <a href="" class="buttons__single">Œuvres en espace urbain</a>
        <a href="" class="buttons__single">Les artistes</a>

    </div>
</section>
<?php get_footer();
