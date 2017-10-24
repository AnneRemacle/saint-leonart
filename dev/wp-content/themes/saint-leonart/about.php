<?php
/**
 * Template Name: À propos
 */
get_header();?>

<section class="section">
    <h2 class="section__title"><?php the_title(); ?></h2>
    <div class="section__text">
        <?php the_content(); ?>
    </div>
</section>

<section class="section-image newsletter">
        <?php $image = get_field( 'about_image', 'options' ); ?>
    <figure class="section-image__figure">
        <img src="<?php echo $image['url']; ?>" alt="<?php $image['alt'] ?>" class="section-image__image" />
    </figure>
    <div class="section-image__content">
        <h2 class="section__title"><?php the_field( 'about_titre', 'options' ); ?></h2>
        <div class="section__text"><?php the_field( 'about_texte', 'options' ); ?></div>
        <!-- TODO: add newsletter form -->
    </div>
</section>

