<?php
/**
 * Template Name: En pratique
 */
get_header();?>

<section class="section">
    <h2 class="section__title"><?php the_title(); ?></h2>
    <div class="section__text"><?php the_content(); ?></div>

    <div class="map" id="gmap">
        <?php $posts = new WP_Query( [ 'post_type' => 'lieu' ] ); ?>
		<?php if ( $posts -> have_posts() ):
			while ( $posts -> have_posts() ):
				$posts -> the_post(); ?>
                <?php $location = get_field('adresse'); ?>
            		<?php the_field('adresse'); ?>
            		<a href="" class="marker" id="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
            		</a>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
    <?php $posts = new WP_Query( [ 'post_type' => 'lieu' ] ); ?>
    <?php if ( $posts -> have_posts() ):
        while ( $posts -> have_posts() ):
            $posts -> the_post(); ?>
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
        <?php endwhile; ?>
    <?php endif; ?>
    <?php wp_reset_query(); ?>

    <a href="" class="cta">Voir le programme</a>
</section>

<section class="section-image newsletter">
    <?php $image = get_field( 'pratique_image', 'options' ); ?>
    <figure class="section-image__figure">
        <img src="<?php echo $image['url']; ?>" alt="<?php $image['alt'] ?>" class="section-image__image">
    </figure>
    <div class="section-image__content">
        <h2 class="section__title"><?php the_field( 'pratique_titre', 'options' ); ?></h2>
        <div class="section__text"><?php the_field( 'pratique_texte', 'options' ); ?></div>
        <!-- Begin MailChimp Signup Form -->

        <div id="mc_embed_signup">
        <form action="https://anne-remacle.us15.list-manage.com/subscribe/post?u=06e8994cfe5cc4d170a29846a&amp;id=afc5f477cd" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
            <div id="mc_embed_signup_scroll">
        <div class="indicates-required"><span class="asterisk">*</span> indique un champ requis</div>
        <div class="mc-field-group">
        	<label for="mce-EMAIL">Votre email  <span class="asterisk">*</span>
        </label>
        	<input type="email" value="" name="EMAIL" class="required email" placeholder="jean@dupont.be" id="mce-EMAIL">
        </div>
        	<div id="mce-responses" class="clear">
        		<div class="response" id="mce-error-response" style="display:none"></div>
        		<div class="response" id="mce-success-response" style="display:none"></div>
        	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_06e8994cfe5cc4d170a29846a_afc5f477cd" tabindex="-1" value=""></div>
            <div class="clear"><input type="submit" value="Je m'inscris!" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
            </div>
        </form>
        </div>
        <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
        <!--End mc_embed_signup-->
    </div>
</section>

<section class="section">
    <h2 class="section__title"><?php the_field( 'titre_acces' ); ?></h2>
    <div class="section__text"><?php the_field( 'texte_acces' ); ?></div>
</section>

<section class="section-light">
    <h2 class="section__title"><?php the_field( 'titre_parking' ); ?></h2>
    <div class="section__text"><?php the_field( 'texte_parking' ); ?></div>

    <div class="map" id="gmap">
        <?php if( have_rows('parkings') ):
            while ( have_rows('parkings') ) : the_row(); ?>
                <?php $location = get_sub_field('adresse_parking'); ?>
            		<?php the_sub_field('adresse_parking'); ?>
            		<a href="" class="marker" id="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
            		</a>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>

    <?php if( have_rows('parkings') ):
        while ( have_rows('parkings') ) : the_row(); ?>
            <div class="card">
                <p class="card__subtitle"><?php the_sub_field( 'nom_parking' ); ?></p>
                <?php $location = get_sub_field('adresse_parking'); ?>
                <p><?php echo $location[ 'address' ]; ?></p>
                <p><?php the_sub_field( 'fermeture_parking' ); ?></p>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>

</section>

<?php get_footer();
