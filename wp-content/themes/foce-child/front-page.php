<?php

get_header();
?>
<main id="primary" class="site-main">
    <section class="banner">
        <video class="video" autoplay muted loop>
            <source src="<?php echo get_stylesheet_directory_uri() . '/assets/videos/StudioKoukaki-videoheadersansson.mp4'; ?>" type="video/mp4">
            Votre navigateur ne prend pas en charge les vidéos HTML5.
        </video>
        <img class="logo" src="<?php echo get_template_directory_uri() . '/assets/images/logo.png'; ?> " alt="logo Fleurs d'oranger & chats errants">
    </section>
    <section id="#story" class="story">
        <h2 class="animated-section"><span class="animation-title">L'histoire</span></h2>
        <article id="" class="story__article">
            <p><?php echo get_theme_mod('story'); ?></p>
        </article>
        <?php
        $args = array(
            'post_type' => 'characters',
            'posts_per_page' => -1,
            'meta_key'  => '_main_char_field',
            'orderby'   => 'meta_value_num',

        );
        $characters_query = new WP_Query($args);
        ?>
        <article id="characters">
            <div class="main-character animated-section">
                <h3><span class="animation-title">Les personnages</span></h3>
            </div>
            <!-- Slider main container -->
            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <?php
                    while ($characters_query->have_posts()) {
                        $characters_query->the_post();
                        echo '<div class="swiper-slide"><figure>';
                        echo get_the_post_thumbnail(get_the_ID(), 'full');
                        echo '<figcaption>';
                        the_title();
                        echo '</figcaption>';
                        echo '</figure></div>';
                    }
                    ?>
                </div>
                <!-- If we need pagination -->
                <!--<div class="swiper-pagination"></div>-->

                <!-- If we need navigation buttons -->
                <!--<div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>-->

                <!-- If we need scrollbar -->
                <!--<div class="swiper-scrollbar"></div>-->
            </div>
        </article>
        <article id="place">
            <img id="big-cloud" class="cloud" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/big-cloud.png'; ?>" alt="Grand nuage">
            <img id="little-cloud" class="cloud" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/little-cloud.png'; ?>" alt="Petit nuage">
            <div class="animated-section">
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

  <section id="nomination" class="nomination animated-section">
      <h3><span class="animation-title">Fleurs d’oranger & chats errants est nominé aux Oscars Short Film Animated de 2022 !</span></h3>
      <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/logo-oscars-2022.png'; ?>" alt="Nomination aux Oscars Short Film 2022">
  </section>

</main><!-- #main -->

<?php
get_footer();
