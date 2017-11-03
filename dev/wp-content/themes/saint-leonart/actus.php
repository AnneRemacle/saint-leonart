<?php
/**
 * Template Name: Actualités
 */
get_header();?>

<section class="section">
    <h2 class="section__title"><?php the_title(); ?></h2>
    <div class="section__text"><?php the_content(); ?></div>

    <section>
        <h3 class="section__subtitle">Trier par catégorie</h3>
        <ul class="categories">
            <?php foreach( get_terms(array('taxonomy' => 'event','hide_empty' => false)) as $term ): ?>
                <li class="categories__term <?php echo $term->slug?> btn btn-1 btn-1e">
                    <?php echo $term->name; ?>
                </li>
            <?php endforeach; ?>
        </ul>


        <?php $posts = new WP_Query( [ 'post_type' => 'news', 'order' => 'DESC' ] ); ?>
            <?php if ( $posts -> have_posts() ):
                while ( $posts -> have_posts() ):
                    $posts -> the_post();
                    $terms = get_the_terms( $post->ID, "event" );?>

                    <section class="news">
                        <a href="<?php the_permalink(); ?>" class="news__link">
                            <figure class="news__figure">
                                <?php the_post_thumbnail(); ?>
                            </figure>
                            <h3 class="news__title">
                                <?php the_title(); ?>
                            </h3>
                            <div class="news__content">
                                <?php the_custom_excerpt(); ?>…
                            </div>
                            <span class="news__more">Lire la suite <span class="sro">de l'article <?php the_title(); ?></span></span>
                        </a>
                    </section>
                <?php endwhile; ?>
            <?php endif; ?>

    </section>
</section>





<?php get_footer();
