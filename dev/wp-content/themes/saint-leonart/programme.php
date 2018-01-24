<?php
/**
 * Template Name: Programme
 */
get_header();?>

<section class="section">
    <h2 class="section__title"><?php the_title(); ?></h2>
    <div class="section__intro"><?php the_content(); ?></div>

    <div class="buttons">
        <div class="buttons__single">Programme par jour</div>
        <div class="buttons__content hidden">
            <?php if( have_rows('jours') ):
                while ( have_rows('jours') ) : the_row(); ?>
                <?php $title = get_sub_field( 'jour' ) ?>
                <div class="buttons__filter btn btn-1 btn-1e <?php echo sanitize_title( $title ); ?>"><?php the_sub_field( 'jour' ); ?></div>
                <?php endwhile; ?>
            <?php endif; ?>

            <div class="program">
                <?php $args = array(
                    'meta_key'     => 'heure_debut',
                    'post_type'    => 'programme',
                    'order' => 'ASC',
                    'orderby' => 'heure_debut'
                );
                ?>

                <?php $items = new WP_Query( $args ); ?>
                <?php if ( $items -> have_posts() ):
                    while ( $items -> have_posts() ):
                        $items -> the_post();
                        $terms = get_the_terms( $post->ID, "programme" ); ?>
                        <?php $project_date = get_post_meta ( $post->ID , 'heure_debut' , true ) ; ?>

                        <div class="program-item hidden <?php echo $terms[0]->slug ?>">
                            <p class="program-item__title"><?php the_title(); ?></p>

                            <?php $posts = get_field('lieu'); ?>
                            <p class="program-item__place"><?php echo $posts->post_title ?></p>

                            <div class="program-item__hours">
                                <span><?php the_field( 'heure_debut' ); ?></span>
                                -
                                <span><?php the_field( 'heure_fin' ); ?></span>
                            </div>
                        </div>

                    <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
            </div>
        </div>

        <div class="buttons__single" id="expositions">Expositions</div>
        <div class="buttons__content hidden">
            <div class="program">
                <p class="sro">Expositions</p>
                <?php $posts = new WP_Query( [ 'post_type' => 'lieu', 'orderby' => 'title', 'order' => 'ASC' ] ); ?>
                <?php if ( $posts -> have_posts() ):
                    while ( $posts -> have_posts() ):
                        $posts -> the_post();
                        $terms = get_the_terms( $post->ID, "art-type" ); ?>
                        <a href="<?php the_permalink(); ?>" class="card">
                            <div class="card__subtitle">
                                <svg width="45px" height="50px" class="card__title--shape lieu">
                                    <path d="M0 0 L45 26 L45 50 L0 24 Z" />
                                </svg>
                                <span><?php the_title(); ?></span>
                            </div>
                            <div style="line-height:1.5:word-wrap:break-word">
                                <?php the_custom_excerpt(); ?>…
                            </div>
                        </a>
                    <?php endwhile; endif; ?>
                <?php wp_reset_query(); ?>
            </div>

        </div>

        <div class="buttons__single">Concerts/spectacles</div>
        <div class="buttons__content hidden">
            <?php $args = array(
                'post_type'    => 'programme',
                'order' => 'ASC',
                'orderby' => 'heure_debut',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'programme',
                        'field' => 'slug',
                        'terms' => 'concertspectacle',
                    ),
                )
            );
            ?>

            <div class="program">
                <?php $items = new WP_Query( $args ); ?>
                <?php if ( $items -> have_posts() ):
                    while ( $items -> have_posts() ):
                        $items -> the_post();
                        $terms = get_the_terms( $post->ID, "programme" ); ?>

                        <div class="program-item">
                            <p class="program-item__title"><?php the_title(); ?></p>

                            <?php $posts = get_field('lieu'); ?>
                            <p class="program-item__place"><?php echo $posts->post_title ?></p>

                            <div class="program-item__hours">
                                <span><?php the_field( 'heure_debut' ); ?></span>
                                -
                                <span><?php the_field( 'heure_fin' ); ?></span>
                            </div>
                        </div>

                    <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
            </div>

        </div>

        <div class="buttons__single" id="artistes">Les artistes</div>
        <div class="buttons__content hidden">
            <div class="program">

                <?php $posts = new WP_Query( [ 'post_type' => 'artistes', 'orderby' => 'title', 'order' => 'ASC' ] ); ?>
                <?php if ( $posts -> have_posts() ):
                    while ( $posts -> have_posts() ):
                        $posts -> the_post();
                        $terms = get_the_terms( $post->ID, "art-type" ); ?>
                        <a href="<?php the_permalink(); ?>" class="card">
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

        </div>


    </div>
</section>
<?php get_footer();
