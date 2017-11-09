<?php
/**
 * Template Name: En pratique
 */
get_header();?>

<section class="section">
    <h2 class="section__title"><?php the_title(); ?></h2>
    <div class="section__text"><?php the_content(); ?></div>

    <div class="map" id="gmap">
        <?php $posts = new WP_Query( [ 'post_type' => 'lieu' ] ); ?>
		<?php if ( $posts -> have_posts() ):
			while ( $posts -> have_posts() ):
				$posts -> the_post(); ?>
                <?php $location = get_field('adresse'); ?>
            		<?php the_field('adresse'); ?>
            		<a href="" class="marker" id="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
            		</a>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
    <?php $posts = new WP_Query( [ 'post_type' => 'lieu' ] ); ?>
    <?php if ( $posts -> have_posts() ):
        while ( $posts -> have_posts() ):
            $posts -> the_post(); ?>
            <div class="card">
                <div class="card__subtitle">
                    <svg width="45px" height="50px" class="card__title--shape lieu">
                        <path d="M0 0 L45 26 L45 50 L0 24 Z" />
                    </svg>
                    <span><?php the_title(); ?></span>
                </div>
                <div class="section__text">
                    <?php the_custom_excerpt(); ?>…
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
    <?php wp_reset_query(); ?>

    <a href="" class="cta">Voir le programme</a>
</section>

<section class="section-image newsletter">
    <?php $image = get_field( 'pratique_image', 'options' ); ?>
    <figure class="section-image__figure">
        <img src="<?php echo $image['url']; ?>" alt="<?php $image['alt'] ?>" class="section-image__image">
    </figure>
    <div class="section-image__content">
        <h2 class="section__title"><?php the_field( 'pratique_titre', 'options' ); ?></h2>
        <div class="section__text"><?php the_field( 'pratique_texte', 'options' ); ?></div>
        <!-- TODO: add newsletter form -->
    </div>
</section>

<section class="section">
    <h2 class="section__title"><?php the_field( 'titre_acces' ); ?></h2>
    <div class="section__text"><?php the_field( 'texte_acces' ); ?></div>
</section>

<section class="section-light">
    <h2 class="section__title"><?php the_field( 'titre_parking' ); ?></h2>
    <div class="section__text"><?php the_field( 'texte_parking' ); ?></div>

    <div class="map" id="gmap">
        <?php if( have_rows('parkings') ):
            while ( have_rows('parkings') ) : the_row(); ?>
                <?php $location = get_sub_field('adresse_parking'); ?>
            		<?php the_sub_field('adresse_parking'); ?>
            		<a href="" class="marker" id="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
            		</a>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>

    <?php if( have_rows('parkings') ):
        while ( have_rows('parkings') ) : the_row(); ?>
            <div class="card">
                <p class="card__subtitle"><?php the_sub_field( 'nom_parking' ); ?></p>
                <?php $location = get_sub_field('adresse_parking'); ?>
                <p><?php echo $location[ 'address' ]; ?></p>
                <p><?php the_sub_field( 'fermeture_parking' ); ?></p>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>

</section>

<?php get_footer();
