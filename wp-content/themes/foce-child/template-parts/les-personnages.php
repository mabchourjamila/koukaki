
<?php
        $args = array(
            'post_type' => 'characters',
            'posts_per_page' => -1,
            'meta_key'  => '_main_char_field',
            'orderby'   => 'meta_value_num',

        );
        $characters_query = new WP_Query($args);
        ?>
        <article id="characters" class="animated-section">
            <div class="main-character">
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