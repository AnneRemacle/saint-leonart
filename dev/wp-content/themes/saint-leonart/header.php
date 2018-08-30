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

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri() . '/build/assets/favicons/apple-touch-icon.png' ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri() . '/build/assets/favicons/favicon-32x32.png' ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri() . '/build/assets/favicons/favicon-16x16.png' ?>">
    <link rel="manifest" href="<?php echo get_template_directory_uri() . '/build/assets/favicons/manifest.json' ?>">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri() . '/build/assets/favicons/safari-pinned-tab.svg" color="#5bbad5' ?>">
    <meta name="theme-color" content="#ffffff">

    <script
      src="https://code.jquery.com/jquery-2.2.4.min.js"
      integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
      crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js" crossorigin="anonymous"></script>
      <script src="<?php echo get_template_directory_uri() . '/build/js/script.js'; ?>"></script>
      <script src="<?php echo get_template_directory_uri() . '/build/js/map.js'; ?>"></script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1c-gdJQgeOSIJDmR9RqzSvGLWby8S0ug"
  type="text/javascript"></script>
      <script src="<?php echo get_template_directory_uri() . '/build/js/particles.js'; ?>"></script>


    <title><?php the_title(); ?> | <?php bloginfo( 'name' ); ?></title>
</head>
<body>
    <header class="header gradient" id="header">
        <div class="header__button header__open">Menu</div>
        <div class="header__button header__close">Fermer</div>
        <nav class="header__menu">
            <h2 class="sro">Navigation principale</h2>
            <?php foreach (b_get_menu_items('header') as $navItem): ?>
                <a href="<?php echo $navItem -> url ?> " class="header__menu--link">
                    <?php echo $navItem -> label ?>
                </a>
            <?php endforeach; ?>
            <?php wp_reset_query(); ?>
        </nav>
        <div id="particles-js"></div>
        <div class="header-typo">
            <div class="header__bg"></div>
            <div class="header__brand clearfix">
                <a href="<?php echo get_home_url(); ?>" class="header__logo" title="Retour à l'accueil">
                    <img src="<?php echo get_template_directory_uri() . '/build/assets/images/typogramme.svg';?>" alt="Retour à l'accueil" />
                </a>

                <h1 class="header__title"><?php bloginfo('name'); ?></h1>
            </div>
        </div>
    </header>
