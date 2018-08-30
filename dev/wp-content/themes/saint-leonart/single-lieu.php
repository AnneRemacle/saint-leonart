<?php
/**
 * Template Name: Single Lieu
 */
get_header();?>

<section class="section lieu large">
    <h2 class="lieu__name section__text">
        <svg width="60px" height="68px" class="lieu__name--shape lieu">
            <path d="M0 0 L60 35 L60 68 L0 31 Z" />
        </svg>
        <span><?php the_title(); ?></span>
    </h2>
    <div class="section__text">
        <?php the_content(); ?>
    </div>
    <?php $location = get_field('adresse'); ?>
	<div class="map" id="gmap">
		<?php the_field('adresse'); ?>
		<div class="marker" id="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
		</div>
	</div>
    <ul class="coordonnees">
        <?php $adresse = get_field('adresse'); ?>
        <?php if( get_field( 'adresse' ) != null): ?>
            <li class="coordonnees__item adresse">
                <?php echo $adresse['address']; ?>
            </li>
        <?php endif; ?>
        <?php if( get_field( 'telephone' ) != null): ?>
            <li class="coordonnees__item telephone">
                <a href="tel:<?php the_field( 'telephone' ); ?>"><?php the_field( 'telephone' ); ?></a>
            </li>
        <?php endif; ?>
        <?php if( get_field( 'site_web' ) != null): ?>
            <li class="coordonnees__item site">
                <a href="<?php the_field( 'site_web' ); ?>"><?php the_field( 'site_web' ); ?></a>
            </li>
        <?php endif; ?>
    </ul>
</section>

<section class="section-light">
    <section class="section">
        <h2 class="section__title">Quelques photos</h2>
        <?php $posts = get_field('artistes');
        if( $posts ): ?>
            <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
                <?php setup_postdata($post); ?>
                <?php $terms = get_the_terms( $post->ID, "art-type" ); ?>
                <a href="<?php the_permalink();?>" class="card">
                    <figure class="card__figure">
                        <?php the_post_thumbnail(); ?>
                    </figure>
                    <h3 class="card__title">
                        <svg width="45px" height="50px" class="card__title--shape <?php echo $terms[0]->slug; ?>">
                            <path d="M0 0 L45 26 L45 50 L0 24 Z" />
                        </svg>
                        <span><?php the_title(); ?></span>
                    </h3>
                    <p class="card__category"><?php echo $terms[0]->name; ?></p>
                </a>
            <?php endforeach; ?>
            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
        <?php endif; ?>
    </section>

</section>

<?php get_footer();
