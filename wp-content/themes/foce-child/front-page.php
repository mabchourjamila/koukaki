<?php

get_header();
?>
<main id="primary" class="site-main">
    <section class="banner">
        <img class="banner-bg" src="<?php echo get_template_directory_uri() . '/assets/images/banner.png'; ?> " alt="Banniere Fleurs d'oranger & chats errants">
        <video class="video" autoplay muted loop>
            <source src="<?php echo get_stylesheet_directory_uri() . '/assets/videos/StudioKoukaki-videoheadersansson.mp4'; ?>" type="video/mp4">
            Votre navigateur ne prend pas en charge les vidéos HTML5.
        </video>
        <img class="logo" src="<?php echo get_template_directory_uri() . '/assets/images/logo.png'; ?> " alt="logo Fleurs d'oranger & chats errants">
    </section>
    <section id="story" class="story animated-section">
        <h2><span class="animation-title">L'histoire</span></h2>
        <article class="story__article">
            <p><?php echo get_theme_mod('story'); ?></p>
        </article>

        <?php get_template_part( 'template-parts/les-personnages' ); ?>

        <article id="place" class="animated-section">
            <img id="big-cloud" class="cloud" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/big-cloud.png'; ?>" alt="Grand nuage">
            <img id="little-cloud" class="cloud" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/little-cloud.png'; ?>" alt="Petit nuage">
            <div>
                <h3><span class="animation-title">Le Lieu</span></h3>
                <p><?php echo get_theme_mod('place'); ?></p>
            </div>

        </article>
    </section>


    <section id="studio" class="animated-section">
        <h2><span class="animation-title">Studio Koukaki</span></h2>
        <div>
            <p>Acteur majeur de l’animation, Koukaki est un studio intégré fondé en 2012 qui créé, produit et distribue des programmes originaux dans plus de 190 pays pour les enfants et les adultes. Nous avons deux sections en activité : le long métrage et le court métrage. Nous développons des films fantastiques, principalement autour de la culture de notre pays natal, le Japon.</p>
            <p>Avec une créativité et une capacité d’innovation mondialement reconnues, une expertise éditoriale et commerciale à la pointe de son industrie, le Studio Koukaki se positionne comme un acteur incontournable dans un marché en forte croissance. Koukaki construit chaque année de véritables succès et capitalise sur de puissantes marques historiques. Cette année, il vous présente “Fleurs d’oranger et chats errants”.</p>
        </div>
    </section>
    <?php get_template_part( 'template-parts/nomination-festival' ); ?>

</main><!-- #main -->

<?php
get_footer();
