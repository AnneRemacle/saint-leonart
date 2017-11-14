<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 */
?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/build/css/styles.css'; ?>?v=0.5" />
    <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">

    <script
      src="https://code.jquery.com/jquery-2.2.4.min.js"
      integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
      crossorigin="anonymous"></script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDeuwdU6TD7s_exoHvquyikKKVTFQiGC0"></script>
      <script src="<?php echo get_template_directory_uri() . '/build/js/script.js'; ?>"></script>
      <script src="<?php echo get_template_directory_uri() . '/build/js/map.js'; ?>"></script>
    <title><?php the_title(); ?> | <?php bloginfo( 'name' ); ?></title>
</head>
<body>
    <header class="header gradient" id="header">
        <div class="header__button header__open">Menu</div>
        <div class="header__button header__close">Fermer</div>
        <div class="header__brand clearfix">
            <a href="<?php echo get_home_url(); ?>" class="header__logo" title="Retour à l'accueil">
                <img src="<?php echo get_template_directory_uri() . '/build/assets/images/logo-light.png';?>" alt="Retour à l'accueil" />
            </a>
            <h1 class="header__title"><?php bloginfo('name'); ?></h1>
        </div>
        <nav class="header__menu">
            <h2 class="sro">Navigation principale</h2>
            <?php foreach (b_get_menu_items('header') as $navItem): ?>
                <a href="<?php echo $navItem -> url ?> " class="header__menu--link">
                    <?php echo $navItem -> label ?>
                </a>
            <?php endforeach; ?>
            <?php wp_reset_query(); ?>
        </nav>
        <?php if(is_front_page()): ?>
            <div class="hero">
                <figure class="hero__figure">
                    <?php $image = get_field('photo_header', 'options'); ?>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="hero__image" />
                </figure>
                <div class="hero__text">
                    <p class="hero__slogan"><?php the_field( 'slogan', 'options' ) ?></p>
                    <div class="hero__infos">
                        <p class="hero__infos--date"><?php the_field( 'dates', 'options' ) ?></p>
                        <p class="hero__infos--place"><?php the_field( 'information_supplementaire', 'options' ) ?></p>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="hero-small">
                <figure class="hero-small__figure">
                    <?php $image = get_field('photo_header', 'options'); ?>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="hero-small__image" />
                </figure>
            </div>
            <div class="breadcrumb">
                <?php
                if(function_exists('bcn_display'))
                {
                    bcn_display();
                }
                ?>
            </div>
        <?php endif; ?>



    </header>
