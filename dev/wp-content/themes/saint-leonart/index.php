<?php
/**
 * Template Name: Homepage
 */
get_header();?>

<section class="section intro">
    <h2 class="section__title"><?php the_title(); ?></h2>
    <div class="section__text">
        <?php the_content(); ?>
    </div>
</section>

<section class="section artistes">
    <h2 class="section__title">Quelques artistes</h2>
    <?php $posts = new WP_Query( [ 'post_type' => 'artistes', 'posts_per_page' => 3, 'orderby' => 'rand' ] ); ?>
		<?php if ( $posts -> have_posts() ):
			while ( $posts -> have_posts() ):
				$posts -> the_post();
                $terms = get_the_terms( $post->ID, "art-type" );
                ?>

                <section class="card">
                    <figure class="card__figure">
                        <?php the_post_thumbnail(); ?>
                    </figure>
                    <h3 class="card__title">
                        <svg width="45px" height="50px" class="card__title--shape <?php echo $terms[0]->name; ?>">
                            <path d="M0 0 L45 26 L45 50 L0 24 Z" />
                        </svg>
                        <span><?php the_title(); ?></span>
                    </h3>
                    <p class="card__category"><?php echo $terms[0]->name; ?></p>
                </section>

        <?php endwhile; endif; ?>
    <?php wp_reset_query(); ?>
</section>
