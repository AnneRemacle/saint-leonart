<?php
/**
 * Template Name: Single Artistes
 */
get_header();?>
<?php $terms = get_the_terms( $post->ID, "art-type" ); ?>
<section class="section artiste">
    <h2 class="artiste__name">
        <svg width="60px" height="68px" class="artiste__name--shape <?php echo $terms[0]->slug; ?>">
            <path d="M0 0 L60 35 L60 68 L0 31 Z" />
        </svg>
        <span><?php the_title(); ?></span>
    </h2>
    <p class="artiste__domaine"><?php the_field( 'domaine' ); ?></p>
    <figure class="artiste__portrait">
        <?php $image = get_field( 'portrait' ); ?>
        <img src="<?php echo $image[ 'url' ] ?>" alt=" Portrait de <?php the_title(); ?>" class="artiste__image" />
    </figure>
    <div class="section__text">
        <?php the_field( 'presentation' ); ?>
    </div>

    <ul class="coordonnees">
        <?php if( get_field( 'email' ) != null): ?>
            <li class="coordonnees__item email">
                <a href="mailto:<?php the_field( 'email' ); ?>"><?php the_field( 'email' ); ?></a>
            </li>
        <?php endif; ?>
        <?php if( get_field( 'telephone' ) != null): ?>
            <li class="coordonnees__item telephone">
                <a href="tel:<?php the_field( 'telephone' ); ?>"><?php the_field( 'telephone' ); ?></a>
            </li>
        <?php endif; ?>
        <?php if( get_field( 'site' ) != null): ?>
            <li class="coordonnees__item site">
                <a href="<?php the_field( 'site' ); ?>"><?php the_field( 'site' ); ?></a>
            </li>
        <?php endif; ?>
        <?php if( get_field( 'facebook' ) != null): ?>
            <li class="coordonnees__item facebook">
                <a href="<?php the_field( 'facebook' ); ?>"><?php the_title(); ?></a>
            </li>
        <?php endif; ?>
    </ul>
</section>

<section class="section-light where">
    <h2 class="section__title">Où voir ses œuvres?</h2>
    <div class="section__text">
        <?php the_field( 'lieu' ); ?>
    </div>
    <a href="" class="cta">En savoir plus sur ce lieu</a>
</section>

<section class="section work">
    <h2 class="section__title">Son travail</h2>
    <?php if( have_rows('oeuvres') ):
        while ( have_rows('oeuvres') ) : the_row();?>
        <figure class="artiste__work">
            <?php $image = get_sub_field( 'oeuvre' ); ?>
            <img src="<?php echo $image['url'] ?>" alt="Oeuvre de <?php the_title(); ?>" class="artiste__oeuvre">
        </figure>
        <?php endwhile; ?>
    <?php endif; ?>
</section>

<?php get_footer();
