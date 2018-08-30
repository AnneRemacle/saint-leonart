<?php
/**
 * Template Name: Actualités
 */
get_header();?>

<section class="section">
    <h2 class="section__title"><?php the_title(); ?></h2>

    <section class="news-container">

        <?php $posts = new WP_Query( [ 'post_type' => 'news', 'order' => 'DESC' ] ); ?>
            <?php if ( $posts -> have_posts() ):
                while ( $posts -> have_posts() ):
                    $posts -> the_post();
                    $terms = get_the_terms( $post->ID, "event" );?>

                    <article class="news <?php echo $terms[0]->slug ?>">
                        <a href="<?php the_permalink(); ?>" class="news__link">
                            <div class="news__image">
                                <figure class="news__figure">
                                    <?php $image = get_field( 'image' ); ?>
                                    <img src="<?php echo $image['url']; ?>" alt="<?php $image['alt'] ?>">
                                </figure>
                            </div>
                            <div class="news__infos">
                                <h3 class="news__title">
                                    <?php the_title(); ?>
                                </h3>
                                <div class="news__content">
                                    <?php the_custom_excerpt(); ?>…
                                </div>
                                <span class="news__more">Lire la suite <span class="sro">de l'article <?php the_title(); ?></span></span>
                            </div>
                        </a>
                    </article>
                <?php endwhile; ?>
            <?php endif; ?>
    </section>
</section>





<?php get_footer();
