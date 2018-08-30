<?php
/**
 * Template Name: Homepage
 */
get_header();?>

<div class="hero">
    <figure class="hero__figure">
        <?php $image = get_field('photo_header', 'options'); ?>
        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="hero__image" />
    </figure>
    <div class="hero__text">
        <p class="hero__slogan"><?php the_field( 'slogan', 'options' ) ?></p>
        <div class="hero__infos">
            <p class="hero__infos--date"><?php the_field( 'dates', 'options' ) ?></p>
            <p class="hero__infos--place"><?php the_field( 'information_supplementaire', 'options' ) ?></p>
        </div>
    </div>
</div>
<?php if(!is_front_page()): ?>
    <div class="breadcrumb">
        <?php
        if(function_exists('bcn_display'))
        {
            bcn_display();
        }
        ?>
    </div>
<?php endif; ?>

<section class="section intro">
    <h2 class="section__title"><?php the_title(); ?></h2>
    <div class="section__text">
        <?php the_content(); ?>
    </div>
</section>

<div class="section-light">
    <section class="section artistes">
        <h2 class="section__title">Quelques artistes</h2>
        <div class="artistes-container">
            <?php $posts = new WP_Query( [ 'post_type' => 'artistes', 'posts_per_page' => 4, 'orderby' => 'rand' ] ); ?>
        		<?php if ( $posts -> have_posts() ):
        			while ( $posts -> have_posts() ):
        				$posts -> the_post();
                        $terms = get_the_terms( $post->ID, "art-type" );
                        ?>

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

                <?php endwhile; endif; ?>
            <?php wp_reset_query(); ?>
        </div>
        <a href="/tous-les-artistes" class="cta">Voir tous les artistes</a>
    </section>
</div>

<section class="section-image newsletter">
    <?php $image = get_field( 'homepage_image', 'options' ); ?>
    <figure class="section-image__figure">
        <img src="<?php echo $image['url']; ?>" alt="<?php $image['alt'] ?>" class="section-image__image">
    </figure>
    <div class="section-image__content">
        <h2 class="section__title"><?php the_field( 'homepage_titre', 'options' ); ?></h2>
        <div class="section__text"><?php the_field( 'homepage_texte', 'options' ); ?></div>

        <div id="mc_embed_signup">
            <?php the_field( 'formulaire_newsletter', 'options');?>
        </div>
    </div>
</section>

<section class="section actus">
    <h2 class="section__title">Dernières news</h2>
    <div class="news-container">
        <?php $posts = new WP_Query( [ 'post_type' => 'news', 'posts_per_page' => 2, 'order' => 'DESC' ] ); ?>
    	<?php if ( $posts -> have_posts() ):
    		while ( $posts -> have_posts() ):
    			$posts -> the_post(); ?>
                <section class="news">
                    <a href="<?php the_permalink(); ?>" class="news__link">
                        <div class="news__image">
                            <figure class="news__figure">
                                <?php $image = get_field( 'image' ); ?>
                                <img src="<?php echo $image['url']; ?>" alt="<?php $image['alt'] ?>">
                            </figure>
                            <div class="news__date">
                                <?php $date = new DateTime($post->post_date);
                                $new_date = date_i18n("j F", $date->getTimestamp());
                                $day = explode( " ", $new_date );?>
                                <span class="news__date--day"><?php echo $day[0]; ?></span>
                                <span class="news__date--month"><?php echo substr($day[1], 0, 3)?></span>
                            </div>
                        </div>
                        <div class="news__infos">
                            <h3 class="news__title">
                                <?php the_title(); ?>
                            </h3>
                            <div class="news__content">
                                <?php the_custom_excerpt(100); ?>…
                            </div>
                            <span class="news__more">Lire la suite <span class="sro">de l'article <?php the_title(); ?></span></span>
                        </div>
                    </a>
                </section>
            <?php endwhile; endif; ?>
        <?php wp_reset_query(); ?>
    </div>

    <a href="/actualites" class="cta">Voir toutes les news</a>
</section>

<section class="section-light socials">
    <div class="section">
        <h2 class="section__title">Suivez-nous sur les réseaux sociaux&nbsp;!</h2>
        <nav class="socials__list">
            <h3 class="sro">Navigation pour les réseaux sociaux</h3>
            <div class="socials-container">
                <div class="socials__list--facebook">
                    <a href="<?php the_field( 'facebook', 'options');?> ">Facebook</a>
                </div>
                <div class="socials__list--twitter">
                    <a href="<?php the_field( 'twitter', 'options');?> ">Twitter</a>
                </div>
                <div class="socials__list--instagram">
                    <a href="<?php the_field( 'instagram', 'options');?> ">Instagram</a>
                </div>
            </div>

        </nav>
    </div>
</section>

<?php
    get_footer();
