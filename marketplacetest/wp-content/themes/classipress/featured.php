<?php
/**
 * The featured slider on the home page
 *
 */
?>

<script type="text/javascript">
// <![CDATA[
    /* featured listings slider */
    jQuery(document).ready(function($) {
        $('.slider').jCarouselLite({
            btnNext: '.next',
            btnPrev: '.prev',
            visible: 5,
            hoverPause: true,
            auto: 2800,
            speed: 1100,
            easing: 'easeOutQuint' // for different types of easing, see easing.js
        });
    });
// ]]>
</script>

    <?php query_posts( array('post__in' => get_option('sticky_posts'), 'post_type' => APP_POST_TYPE, 'post_status' => 'publish', 'orderby' => 'rand') ); ?>

        <?php if ( have_posts() ) : ?>

        <!-- Featured Ads Slider Commented Out - Remove "//" in all PHP lines below (Yellow Text) as well as the HTML comment code to activate this feature again. -->
                        
        <!-- featured listings -->
        <!-- <div class="shadowblock_out">

            <div class="shadowblockdir">

                <h2 class="dotted"><?php // _e('Featured Listings', 'appthemes')?></h2>

                <div class="sliderblockdir">

                    <div id="list">

                        <div class="prev"><img src="<?php // bloginfo('template_url'); ?>/images/prev.jpg" alt="" /></div>
						
                        <div class="slider">

                            <ul>
								
                                <?php // while ( have_posts() ) : the_post(); ?>

                                    <li>
                                        <span class="feat_left">

											<?php // if ( get_option('cp_ad_images') == 'yes' ) cp_ad_featured_thumbnail(); ?>
											
											<div class="clr"></div>

											<span class="price_sm"><?php // if ( get_post_meta($post->ID, 'price', true) ) cp_get_price_legacy($post->ID); else cp_get_price($post->ID, 'cp_price'); ?></span>

										</span>

                                        <p><a href="<?php // the_permalink() ?>#nav2"><?php // if ( mb_strlen( get_the_title() ) >= get_option('cp_featured_trim') ) echo mb_substr( get_the_title(), 0, get_option('cp_featured_trim') ).'...'; else the_title(); ?></a></p>
                                    </li>

                                <?php // endwhile; ?>

                            </ul>

                        </div>

                        <div class="next"><img src="<?php // bloginfo('template_url'); ?>/images/next.jpg" alt="" /></div>

                    </div><!-- /slider -->

                    <!-- <div class="clr"></div>

                </div><!-- /sliderblock -->

            <!-- </div><!-- /shadowblock -->

        <!-- </div> --> <!-- /shadowblock_out -->

        <?php endif; ?>

        <?php wp_reset_query(); ?>

				