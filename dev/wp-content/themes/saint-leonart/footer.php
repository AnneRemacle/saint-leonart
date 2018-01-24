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
            <div class="footer__menu">
                <?php foreach (b_get_menu_items('footer') as $navItem): ?>
                    <a href="<?php echo $navItem -> url ?> " class="footer__menu--link">
                        <?php echo $navItem -> label ?>
                    </a>
                <?php endforeach; ?>
                <?php wp_reset_query(); ?>
            </div>

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
            <ul class="partners-small">
                <?php $posts = new WP_Query( [ 'post_type' => 'partenaire' ] ); ?>
                    <?php if ( $posts -> have_posts() ):
                        while ( $posts -> have_posts() ):
                            $posts -> the_post(); ?>
                            <li class="partners-small__single">
                                <a href="<?php the_field( 'url_site' )?>" class="partners-small__single--link" title="aller sur le site de<?php the_title(); ?>">
                                    <figure class="partners-small__single--logo">
                                        <?php $image = get_field( 'logo_blanc' ); ?>
                                        <img src="<?php echo $image['url']?>" alt="aller sur le site de <?php the_title(); ?>">
                                    </figure>
                                </a>
                            </li>

                        <?php endwhile; ?>
                    <?php endif; ?>
                </ul>
        </div>
    </footer>

</body>
</html>
