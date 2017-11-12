<?php
/**
 * Template Name: Programme
 */
get_header();?>

<section class="section">
    <h2 class="section__title"><?php the_title(); ?></h2>
    <div class="section__text"><?php the_content(); ?></div>

    <div class="buttons">
        <div class="buttons__single">Programme par jour</div>
        <div class="buttons__content hidden">
            <?php if( have_rows('jours') ):
                while ( have_rows('jours') ) : the_row(); ?>
                <div class="buttons__filter btn btn-1 btn-1e"><?php the_sub_field( 'jour' ); ?></div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>

        <div class="buttons__single">Expositions</div>
        <div class="buttons__content hidden">
            <?php $posts = new WP_Query( [ 'post_type' => 'lieu', 'orderby' => 'post_title' ] ); ?>
            <?php if ( $posts -> have_posts() ):
                while ( $posts -> have_posts() ):
                    $posts -> the_post();
                    $terms = get_the_terms( $post->ID, "art-type" ); ?>
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
                <?php endwhile; endif; ?>
            <?php wp_reset_query(); ?>
        </div>

        <div class="buttons__single">Concerts/spectacles</div>
        <div class="buttons__content hidden">coucou</div>

        <div class="buttons__single">Œuvres en espace urbain</div>
        <div class="buttons__content hidden">coucou</div>

        <div class="buttons__single">Les artistes</div>
        <div class="buttons__content hidden">
            <?php $posts = new WP_Query( [ 'post_type' => 'artistes', 'orderby' => 'post_title' ] ); ?>
            <?php if ( $posts -> have_posts() ):
                while ( $posts -> have_posts() ):
                    $posts -> the_post();
                    $terms = get_the_terms( $post->ID, "art-type" ); ?>
                    <div class="card">
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
                    </div>
                <?php endwhile; endif; ?>
            <?php wp_reset_query(); ?>
        </div>


    </div>
</section>
<?php get_footer();
