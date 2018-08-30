<?php
/*
  Template Name: Partenaires
 */
get_header();?>

<section class="section">
    <h2 class="section__title"><?php the_title(); ?></h2>
    <div class="section__text"><?php the_content(); ?></div>

    <ul class="partners">
    <?php $posts = new WP_Query( [ 'post_type' => 'partenaire' ] ); ?>
        <?php if ( $posts -> have_posts() ):
            while ( $posts -> have_posts() ):
                $posts -> the_post(); ?>
                <li class="partners__single">
                    <a href="<?php the_field( 'url_site' )?>" class="partners__single--link" title="aller sur le site de<?php the_title(); ?>">
                        <figure class="partners__single--logo">
                            <?php $image = get_field( 'logo' ); ?>
                            <img src="<?php echo $image['url']?>" alt="aller sur le site de <?php the_title(); ?>">
                        </figure>
                        <p class="partners__single--name"><?php the_title(); ?></p>
                    </a>
                </li>

            <?php endwhile; ?>
        <?php endif; ?>
    </ul>
    <a href="programme-complet" class="cta">Revoir le programme</a>
</section>

<?php get_footer();
