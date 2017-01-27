<?php if (!defined('ABSPATH')) { exit; } // Exit if accessed directly
/**
 * Neo_Bootstrap_Carousel_Shortcode Class
 *
 * This file contains shortcode of 'neo_carousel' post type. 
 * 
 * @link       http://pixelspress.com
 * @since      1.0.0
 *
 * @package    Neo_Bootstrap_Carousel
 * @subpackage Neo_Bootstrap_Carousel/includes
 * @author     PixelsPress <support@pixelspress.com>
 */

class Neo_Bootstrap_Carousel_Shortcode
{
    /**
     * Initialize the class and set it's properties.
     *
     * @since    1.0.0
     */
    public function __construct() {

        // Hook-> 'neo_carousel_shortcode' Shortcode
        add_shortcode('neo_carousel_shortcode', array($this, 'neo_carousel'));

        // Hook-> 'edit_form_after_title' Shortcode
        add_action('edit_form_after_title', array($this, 'neo_carousel_helper'));
        
        add_filter( 'the_content', array($this, 'neo_carousel_shortcode_empty_paragraph_fix'));
    }

    public function neo_carousel($atts, $content)
    {
        // Shortcode Default Array
        $shortcode_args = array(
            'id' => '',
            'interval' => 5000,
            'pause' => 'hover',
            'wrap' => 'true'
        );
        
        // Extract User Defined Shortcode Attributes
        $shortcode_args = shortcode_atts($shortcode_args, $atts);
        
        // Check If Caption is enabled
        $nbc_display_caption = ( get_option('_nbc_display_caption') != "" ) ? get_option('_nbc_display_caption') : "no";
        
        // Check If Indicators Navigation is enabled
        $nbc_display_navigation = ( get_option('_nbc_display_navigation') != "" ) ? get_option('_nbc_display_navigation') : "yes";
        
        // Check If Direction Navigation is enabled
        $nbc_display_direction_controls = ( get_option('_nbc_display_direction_controls') != "" ) ? get_option('_nbc_display_navigation') : "no";
        
        // Slide Data Array
        $slide_data = array();
        
        // Get Slider's Slides
        $nbc_slider = array_filter( explode(',', get_post_meta( intval($shortcode_args['id'] ), sanitize_key( '_neo_bootstrap_carousel' ), TRUE) ) );
        $first_active = 'active';
    
        if($nbc_slider) {
            foreach($nbc_slider as $slides) {
                $nbc_slides = array_filter(explode('|', $slides ));
                $slide_id = $nbc_slides[0];
                $slide_meta = get_post( (int) $slide_id ); // Get post by ID
                
                $slide_data[] = array(
                    'slide_url' => wp_get_attachment_url( (int) $slide_id, 'full'),
                    'slide_title' => $slide_meta->post_title,
                    'slide_excerpt' => $slide_meta->post_excerpt,
                    'slide_overlay' => $nbc_slides[1],
                    'slide_overlay_opacity' => $nbc_slides[2]
                );
            }
            $html = '<div id="neo-bootstrap-carousel-'.intval( $shortcode_args['id'] ).'" class="carousel slide">';
            
            // Indicators
            if( "yes" == $nbc_display_navigation ) {
                $html .= '<ol class="carousel-indicators">';
                for ($j=0; $j<sizeof($nbc_slider); $j++ ) {
                    $html .= '<li data-target="#neo-bootstrap-carousel-'.intval( $shortcode_args['id'] ).'" data-slide-to="'.intval( $j ).'" class="'. sanitize_html_class( $first_active ).'"></li>';
                    $first_active = '';
                }
                $html .= '</ol>';
            }
            $first_active = 'active'; // End Indicatores
    
    // Wrapper for slides
    $html .= '<div class="carousel-inner" role="listbox">';
    for ($i=0; $i < sizeof($slide_data); $i++) {
        $html .= '<div class="item '.$first_active.'" style="background-image: url('. esc_url( $slide_data[$i]['slide_url'] ).');">';
            
        if ($slide_data[$i]["slide_overlay"] != '') {
            $slide_overlay = ( $slide_data[$i]["slide_overlay"] == 'dark' ) ? 'rgba(0, 0, 0, '.$slide_data[$i]["slide_overlay_opacity"].')' : 'rgba(255, 255, 255, '.$slide_data[$i]["slide_overlay_opacity"].')';
            $html .= '<div class="slide-overlay" style="background: '.$slide_overlay.';"></div>';
        }
            
        // Carousel Caption
        if ( $nbc_display_caption == "yes" ) {
            $html .= '<div class="carousel-caption-wrapper">
                <div class="carousel-caption">
                    <h1 data-animation="animated '. esc_attr( get_option( "_nbc_caption_title_animation" ) ) .'" data-delay="1000" data-dur="1000">'. esc_attr( $slide_data[$i]["slide_title"] ).'</h1>
                    <p data-animation="animated '. esc_attr( get_option( "_nbc_caption_description_animation" ) ).'" data-delay="1300" data-dur="1000">'. esc_textarea( $slide_data[$i]["slide_excerpt"] ).'</p>
                </div>
            </div>';
        }
        $html .= '
         </div>'; // End Item
         $first_active = '';
        }
     $html .= '</div>';
     
     // Arrows
     if($nbc_display_direction_controls == "yes")
    {
        // Left and right controls
        $html .= '<a class="left carousel-control" href="#neo-bootstrap-carousel-'.intval( $shortcode_args['id'] ).'" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>';

        $html .= '<a class="right carousel-control" href="#neo-bootstrap-carousel-'.intval( $shortcode_args['id'] ).'" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>';
    }
    
$html .= '</div>';
ob_start();
 ?>
<!-- Script Adding Settings/Attributes of Shortcode -->
<script type="text/javascript">
    (function ($) {
        'use strict';

        //Function to animate slider captions 
        function doAnimations(elems)
        {
            //Cache the animationend event in a variable
            var animEndEv = 'webkitAnimationEnd animationend';

            elems.each(function () {
                var $this = $(this),
                    $animationType = $this.data('animation');
                
                // requires you add [data-delay] & [data-dur] in markup. values are in ms
                var $animDur = parseInt($this.data('dur'));
                var $animDelay = parseInt($this.data('delay'));

                $this.css({"animation-duration": $animDur + "ms", "animation-delay": $animDelay + "ms", "animation-fill-mode": "both"}).addClass($animationType).one(animEndEv, function () {
                    $this.removeClass($animationType);
                });
            });
        }

        $(window).load(function() {
            var $myCarousel = $('#neo-bootstrap-carousel-<?php echo intval( $shortcode_args['id'] ); ?>'),
                $firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animation ^= 'animated']");

            // Activate Carousel
            $myCarousel.carousel({
                interval: <?php echo intval( $shortcode_args['interval'] ); ?>,
                pause: "<?php echo esc_attr( $shortcode_args['pause'] ); ?>",
                wrap: <?php echo $shortcode_args['wrap']; ?>,
                keyboard: true
            });

            //Animate captions in first slide on page load 
            doAnimations($firstAnimatingElems);

            //Pause carousel  
            $myCarousel.carousel('pause');

            //Other slides to be animated on carousel slide event 
            $myCarousel.on('slide.bs.carousel', function (e) {
                var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
                doAnimations($animatingElems);
            });
        });
    })(jQuery);
</script>
        <?php
        return ob_get_clean() . $html;
        }
    }

    /**
     * SOC Helper Function
     * 
     * @since   1.0.0
     * 
     * @global  object  $post   Post Object
     * @return  void
     */
    function neo_carousel_helper() {

        global $post;
        if ($post->post_type != 'neo_carousel')
            return;
        echo '<p>' . __('Paste this shortcode into a post or a page: ', 'neo-bootstrap-carousel');
            echo ' <b> [neo_carousel_shortcode id="' . $post->ID . '"] </b>';
        echo '</p>';
    }
    
    /**
     * Filters the content to remove any extra paragraph or break tags
     * caused by shortcodes.
     *
     * @since 1.0.0
     *
     * @param string $content  String of HTML content.
     * @return string $content Amended string of HTML content.
     */
    function neo_carousel_shortcode_empty_paragraph_fix( $content ) {

       $array = array(
           '<p>['    => '[',
           ']</p>'   => ']',
           ']<br />' => ']'
       );
       return strtr( $content, $array );

    }
}
new Neo_Bootstrap_Carousel_Shortcode();