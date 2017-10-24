<?php
/**
 * Template Name: À propos
 */
get_header();?>

<section class="section">
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
        <!-- TODO: add newsletter form -->
    </div>
</section>

<section class="section team">
    <h2 class="section__title">L'équipe</h2>
    <div class="section__text"><?php the_field('intro_equipe'); ?></div>

    <?php
    if( have_rows('membres') ):
        while ( have_rows('membres') ) : the_row();?>
            <section class="member">
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
            </section>
        <?php endwhile; ?>
    <?php endif; ?>
</section>

<section class="section-light presse">
    <h2 class="section__title">Espace Presse</h2>
    <div class="section__text"><?php the_field( 'intro_fichiers' ); ?></div>
    <ul class="files">
        <?php if( have_rows('fichiers') ):
            while ( have_rows('fichiers') ) : the_row();?>
                <li class="files__single">
                    <?php $file = get_sub_field( 'fichier' ); ?>
                    <a href="<?php echo $file['url'] ?>" class="files__single--link" target="_blank">
                        <img src="<?php echo get_template_directory_uri() . '/build/assets/images/pdf-logo.png';?>" alt="Télécharger le fichier <?php the_sub_field( 'nom_du_fichier' ); ?>" class="files__single--logo" />
                        <span class="files__single--name">
                            <?php the_sub_field( 'nom_du_fichier' ); ?>
                        </span>
                    </a>
                </li>
            <?php endwhile; ?>
        <?php endif; ?>
    </ul>
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
        </div>
        <div class="timeline__line"></div>
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
</section>

<?php
get_footer();
