<?php
/**
 * Template Name: Programme
 */
get_header();?>

<section class="section program-container">
    <h2 class="section__title"><?php the_title(); ?></h2>

    <div class="program">
        <?php $args = array(
            'meta_key'     => 'heure_debut',
            'post_type'    => 'programme',
            'order' => 'ASC',
            'groupby' => 'heure_debut'
        );
        ?>

        <?php $items = new WP_Query( $args ); ?>
        <?php if ( $items -> have_posts() ):
                foreach ( $items->posts as $post_object ) {
                    $post_date = new DateTime(get_post_meta( $post_object->ID, 'heure_debut', true));
                    $new_array[date_i18n("j F", $post_date->getTimestamp())][] = $post_object;
                }

                foreach( $new_array as $date => $dategroup): ?>
                    <div class="program-day">
                        <h3 class="program-day__title">
                            <span><?php echo $date; ?></span>
                        </h3>
                        <?php foreach($dategroup as $event):
                            $start_event = new DateTime(get_post_meta( $event->ID, 'heure_debut', true));
                            $end_event = new DateTime(get_post_meta( $event->ID, 'heure_fin', true));?>
                            <div class="program-day__item">
                                <p class="program-day__hours">
                                    <time datetime="<?php echo date_i18n($start_event->getTimestamp()) ?>">
                                        <?php echo date_i18n("G:i", $start_event->getTimestamp()) ?>
                                    </time> -
                                    <time datetime="<?php echo date_i18n($end_event->getTimestamp()) ?>">
                                        <?php echo date_i18n("G:i", $end_event->getTimestamp()) ?>
                                    </time>
                                </p>
                                <p class="program-day__name"><?php echo $event->post_title ?></p>
                            </div>
                        <?php endforeach;?>
                    </div>
                <?php endforeach; ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
    </div>
    <a href="/tous-les-artistes" class="cta">Découvrir les artistes</a>
</section>
<?php get_footer();
