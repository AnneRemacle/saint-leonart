<?php
/**
 * Template Name: Expositions
 */
get_header();?>

<section class="section">
    <h2 class="section__title"><?php the_title(); ?></h2>

    <section class="expositions-container">

        <?php $posts = new WP_Query( [ 'post_type' => 'lieu', 'meta_key' => 'numero', 'orderby' => 'meta_value_num', 'order' => 'ASC' ] ); ?>
        <?php if ( $posts -> have_posts() ):
            while ( $posts -> have_posts() ):
               $posts -> the_post(); ?>

                <a href="<?php the_permalink(); ?>"  class="expositions-item" id="<?php echo $post->post_name;?>">
                    <div class="card__subtitle">
                        <svg width="45px" height="50px" class="card__subtitle--shape lieu">
                            <path d="M0 0 L45 26 L45 50 L0 24 Z" />
                        </svg>
                        <span><?php the_title();?></span>
                    </div>
                    <p class="expositions-item__address">Où: <?php the_field('adresse'); ?></p>
                    <div class='wp-content'>
                        <p class="expositions-item__list-title">Qui peut-on y voir?</p>
                        <ul>
                            <?php $artists = get_field('artistes');
                            if( $artists ): ?>
                                <?php foreach( $artists as $post): // variable must be called $post (IMPORTANT) ?>
                                    <?php setup_postdata($post); ?>
                                    <?php $terms = get_the_terms( $post->ID, "art-type" ); ?>
                                    <li class="expositions-item__list-item">
                                        <?php the_title() ?>
                                    </li>
                                <?php endforeach; ?>
                                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                            <?php endif; ?>
                        </ul>

                    </div>
                </a>
            <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
    </section>
</section>

<div class="section-light">
    <div class="section">
        <a href="/tous les artistes" class="cta">Revoir les artistes</a>
    </div>
</div>





<?php get_footer();
