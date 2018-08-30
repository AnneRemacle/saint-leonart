<?php
/**
 * Template Name: Liste
 */
get_header();?>

<section class="section">
    <h2 class="section__title"><?php the_title(); ?></h2>

    <section class="artistes-container">

        <?php $posts = new WP_Query( [ 'post_type' => 'artistes', 'orderby' => 'name', 'order' => 'ASC' ] ); ?>
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
    </section>
</section>





<?php get_footer();
