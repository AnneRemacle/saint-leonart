<?php
/**
 * Template Name: À propos
 */
get_header();?>

<section class="section large">
    <h2 class="section__title"><?php the_title(); ?></h2>
    <div class="section__text">
        <?php the_content(); ?>
    </div>
</section>

<section class="section-image newsletter">
        <?php $image = get_field( 'about_image', 'options' ); ?>
    <figure class="section-image__figure">
        <img src="<?php echo $image['url']; ?>" alt="<?php $image['alt'] ?>" class="section-image__image" />
    </figure>
    <div class="section-image__content">
        <h2 class="section__title"><?php the_field( 'about_titre', 'options' ); ?></h2>
        <div class="section__text"><?php the_field( 'about_texte', 'options' ); ?></div>
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

<section class="section  large team">
    <h2 class="section__title">L'équipe</h2>
    <div class="section__text"><?php the_field('intro_equipe'); ?></div>

    <div class="members-container">
        <?php
        if( have_rows('membres') ):
            while ( have_rows('membres') ) : the_row();?>
                <div class="member">
                    <figure class="member__figure">
                        <?php $image = get_sub_field( 'photo' ); ?>
                        <?php if( $image[ 'url' ] != "" ): ?>
                            <img class="member__image" src="<?php echo $image['url']; ?>" alt="Portrait de <?php the_sub_field('nom'); ?>" />
                        <?php else: ?>
                            <img src="<?php echo get_template_directory_uri() . '/build/assets/images/placeholder.png';?>" alt="" class="member__image" />
                        <?php endif; ?>
                    </figure>
                    <h3 class="member__name"><?php the_sub_field( 'nom' ); ?> </h3>
                    <p class="member__job"><?php the_sub_field( 'fonction' ); ?> </p>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>

<section class="section-light presse">
    <div class="section large">
        <h2 class="section__title">Espace Presse</h2>
        <div class="section__text"><?php the_field( 'intro_fichiers' ); ?></div>
        <div class="files">
            <?php if( have_rows('fichiers') ):
                while ( have_rows('fichiers') ) : the_row();?>
                    <div class="files__single">
                        <h3 class="files__single--name"><?php the_sub_field( 'nom_du_fichier' ); ?></h3>
                        <div class="files__single--description"><?php the_sub_field('description'); ?></div>
                        <?php $file = get_sub_field( 'fichier' ); ?>
                        <a href="<?php echo $file['url'] ?>" class="files__single--link" target="_blank">
                            Télécharger le fichier
                        </a>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>

        <a href="/tous-les-artistes" class="cta">Voir les artistes</a>
    </div>

</section>

<section class="section chiffres">
    <h2 class="section__title">Quelques chiffres</h2>
    <div class="section__text"><?php the_field( 'intro_chiffres' ); ?></div>
    <div class="timeline" id="accordion">
        <div class="timeline__dates">
            <?php $i = 0;?>
            <?php if( have_rows('chiffres') ):
                while ( have_rows('chiffres') ) : the_row();?>
                    <div data-edition="<?php the_sub_field( 'edition' )?>" class="timeline__dates--edition <?php echo $i ?: "active";?>"><?php the_sub_field( 'edition' ); ?></div>
                    <?php $i++;?>
                <?php endwhile; ?>
            <?php endif; ?>
            <div class="timeline__line"></div>
        </div>
        <div class="timeline__chiffres">
            <?php $i = 0;?>
            <?php if( have_rows('chiffres') ):
                while ( have_rows('chiffres') ) : the_row();?>
                    <div data-edition="<?php the_sub_field( 'edition' )?>" class="timeline__infos ">
                        <div class="timeline__single">
                            <img src="<?php echo get_template_directory_uri() . '/build/assets/images/palette.svg';?>" alt="" class="timeline__single--image" />
                            <span class="timeline__single--number"><?php the_sub_field( 'artistes' ); ?></span>
                            <span class="timeline__single--text">artistes lors de cette édition</span>
                        </div>
                        <div class="timeline__single">
                            <img src="<?php echo get_template_directory_uri() . '/build/assets/images/artist.svg';?>" alt="" class="timeline__single--image" />
                            <span class="timeline__single--number"><?php the_sub_field( 'visiteurs' ); ?></span>
                            <span class="timeline__single--text">visiteurs ont parcouru le quartier</span>
                        </div>
                        <div class="timeline__single">
                            <img src="<?php echo get_template_directory_uri() . '/build/assets/images/painting.svg';?>" alt="" class="timeline__single--image" />
                            <span class="timeline__single--number"><?php the_sub_field( 'oeuvres' ); ?></span>
                            <span class="timeline__single--text">œuvres ont été exposées</span>
                        </div>
                    </div>
                    <?php $i++;?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php
get_footer();
