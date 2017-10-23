<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 */
?>
    <footer class="footer gradient">
        <div class="footer__section">
            <p class="footer__section--title">
                <?php bloginfo( 'name' ); ?>
            </p>
            <p class="footer__section--text"><?php the_field( 'dates', 'options' ); ?></p>
        </div>
        <div class="footer__section">
            <p class="footer__section--title">Informations</p>
            <?php foreach (b_get_menu_items('footer') as $navItem): ?>
                <a href="<?php echo $navItem -> url ?> " class="header__menu--link">
                    <?php echo $navItem -> label ?>
                </a>
            <?php endforeach; ?>
            <?php wp_reset_query(); ?>
        </div>
        <div class="footer__section">
            <p class="footer__section--title">Suivez-nous</p>
            <ul class="footer-socials__list">
                <li class="footer-socials__list--facebook">
                    <a href="<?php the_field( 'facebook', 'options');?> ">Facebook</a>
                </li>
                <li class="footer-socials__list--twitter">
                    <a href="<?php the_field( 'twitter', 'options');?> ">Twitter</a>
                </li>
                <li class="footer-socials__list--instagram">
                    <a href="<?php the_field( 'instagram', 'options');?> ">Instagram</a>
                </li>
            </ul>
        </div>
        <div class="footer__section">
            <p class="footer__section--title">Nos partenaires</p>
            <!-- TODO: add partners logo -->
        </div>
    </footer>

</body>
</html>
