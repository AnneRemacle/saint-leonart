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

<section class="section team">
    <h2 class="section__title">L'équipe</h2>
    <div class="section__text"><?php the_field('intro_equipe'); ?></div>

    <?php
    if( have_rows('membres') ):
        while ( have_rows('membres') ) : the_row();?>
            <section class="member">
                <figure class="member__figure">
                    <?php $image = get_sub_field( 'photo' ); ?>
                    <img class="member__image" src="<?php echo $image['url']; ?>" alt="Portrait de <?php the_sub_field('nom'); ?>" />
                </figure>
                <h3 class="member__name"><?php the_sub_field( 'nom' ); ?> </h3>
                <p class="member__job"><?php the_sub_field( 'fonction' ); ?> </p>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>
</section>
