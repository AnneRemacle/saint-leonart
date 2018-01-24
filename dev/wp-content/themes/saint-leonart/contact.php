<?php
/**
 * Template Name: Contact
 */
get_header();?>

<section class="section">
    <h2 class="section__title"><?php the_title(); ?></h2>
    <div class="section__intro">
        <?php the_content(); ?>
    </div>
    <ul class="coordonnees">
        <?php if( get_field( 'nom' ) != null): ?>
            <li class="coordonnees__item nom">
                <a href="mailto:<?php the_field( 'nom' ); ?>"><?php the_field( 'nom' ); ?></a>
            </li>
        <?php endif; ?>
        <?php if( get_field( 'telephone' ) != null): ?>
            <li class="coordonnees__item telephone">
                <a href="tel:<?php the_field( 'telephone' ); ?>"><?php the_field( 'telephone' ); ?></a>
            </li>
        <?php endif; ?>
        <?php if( get_field( 'facebook', 'options' ) != null): ?>
            <li class="coordonnees__item facebook">
                <a href="<?php the_field( 'facebook', 'options' ); ?>">Saint Léon'Art</a>
            </li>
        <?php endif; ?>
    </ul>
</section>

<section class="section-light form">
    <h2 class="section__title">Écrivez-nous!</h2>
    <?php the_field( 'formulaire' ); ?>

    <a href="/accueil/programme" class="cta">Revoir le programme</a>
</section>

<?php get_footer();
