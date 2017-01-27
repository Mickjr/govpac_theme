<?php if (!defined('ABSPATH')) { exit; } // Exit if accessed directly
/**
 * Neo_Bootstrap_Carousel_Settings Class
 * 
 * This is used to define NEO Bootstrap Carousel setting.
 * 
 * @link       http://pixelspress.com
 * @since      1.0.0
 *
 * @package    Neo_Bootstrap_Carousel
 * @subpackage Neo_Bootstrap_Carousel/admin
 * @author     PixelsPress <support@pixelspress.com>
 */
class Neo_Bootstrap_Carousel_Settings
{
    
    /**
     * The css animations that's responsible for keeping the values of animations
     * the plugin.
     *
     * @since   1.1.1
     * @access  private
     * @var     Neo_Bootstrap_Carousel_Settings_Css_Animations  $css_animations keep all the animations for the plugin.
     */
    private $css_animations;
    
    /**
     * Initialize the class and set its properties.
     *
     * @since   1.0.0
     */
    public function __construct()
    {
        $this->css_animations = array(
            __('Attention Seekers', 'neo-bootstrap-carousel') => array(
                "bounce" => __('Bounce', 'neo-bootstrap-carousel'),
                "flash" => __('Flash', 'neo-bootstrap-carousel'),
                "pulse" => __('Pulse', 'neo-bootstrap-carousel'),
                "rubberBand" => __('Rubber Band', 'neo-bootstrap-carousel'),
                "shake" => __('Shake', 'neo-bootstrap-carousel'),
                "swing" => __('Swing', 'neo-bootstrap-carousel'),
                "tada" => __('Tada', 'neo-bootstrap-carousel'),
                "wobble" => __('Wobble', 'neo-bootstrap-carousel'),
                "jello" => __('Jello', 'neo-bootstrap-carousel'),
            ),
            "Bouncing Entrances" => array(
                "bounceIn" => __('bounceIn', 'neo-bootstrap-carousel'),
                "bounceInDown" => __('bounceInDown', 'neo-bootstrap-carousel'),
                "bounceInLeft" => __('bounceInLeft', 'neo-bootstrap-carousel'),
                "bounceInRight" => __('bounceInRight', 'neo-bootstrap-carousel'),
                "bounceInUp" => __('bounceInUp', 'neo-bootstrap-carousel')
            ),
            "Fading Entrances" => array(
                "fadeIn" => __('fadeIn', 'neo-bootstrap-carousel'),
                "fadeInDown" => __('fadeInDown', 'neo-bootstrap-carousel'),
                "fadeInDownBig" => __('fadeInDownBig', 'neo-bootstrap-carousel'),
                "fadeInLeft" => __('fadeInLeft', 'neo-bootstrap-carousel'),
                "fadeInLeftBig" => __('fadeInLeftBig', 'neo-bootstrap-carousel'),
                "fadeInRight" => __('fadeInRight', 'neo-bootstrap-carousel'),
                "fadeInRightBig" => __('fadeInRightBig', 'neo-bootstrap-carousel'),
                "fadeInUp" => __('fadeInUp', 'neo-bootstrap-carousel'),
                "fadeInUpBig" => __('fadeInUpBig', 'neo-bootstrap-carousel')
            ),
        );
        
        // Action - Add Settings Menu
        add_action( 'admin_menu', array($this, 'admin_menu'), 12 );

        // Action - Save Settings
        add_action( 'admin_notices', array($this, 'nbc_save_settings' ) );
    }

    /**
     * Add Setting Page Under NEO Bootstrap Carousel Menu.
     * 
     * @since   2.0.0
     */
    public function admin_menu()
    {
        add_submenu_page('edit.php?post_type=neo_carousel', __('Settings', 'neo-bootstrap-carousel'), __('Settings', 'neo-bootstrap-carousel'), 'manage_options', 'neo-bootstrap-carousel-settings', array($this, 'neo_bootstrap_carousel_settings'));
    }

    /**
     * Add Settings Page.
     * 
     * @Since   2.0.0
     */
    public function neo_bootstrap_carousel_settings()
    {
?>
        <div class="wrap">
            <h1><?php _e('Settings', 'neo-bootstrap-carousel'); ?></h1>
            <form id="neo_bootstrap_carousel_setting_form" action="" method="post">
                <input type="hidden" value="1" name="admin_notices">
                <table class="form-table setting-table">
                    <tbody>
                        <tr>
                            <th scope="row"><label for="display_navigation"><?php _e('Display Navigation', 'neo-bootstrap-carousel'); ?></label></th>
                            <td>
                                <select id="display_navigation" name="display_navigation">
                                    <option value="yes" <?php if( get_option('_nbc_display_navigation') == "yes" ) { echo 'selected="selected"';} ?>><?php _e('Yes', 'neo-bootstrap-carousel'); ?></option>
                                    <option value="no" <?php if( get_option('_nbc_display_navigation') == "no" ) { echo 'selected="selected"';} ?>><?php _e('No', 'neo-bootstrap-carousel'); ?></option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="display_direction_controls"><?php _e('Display Direction Arrows', 'neo-bootstrap-carousel'); ?></label></th>
                            <td>
                                <select id="display_direction_controls" name="display_direction_controls">
                                    <option value="yes" <?php if( get_option('_nbc_display_direction_controls') == "yes" ) { echo 'selected="selected"';} ?>><?php _e('Yes', 'neo-bootstrap-carousel'); ?></option>
                                    <option value="no" <?php if( get_option('_nbc_display_direction_controls') == "no" ) { echo 'selected="selected"';} ?>><?php _e('No', 'neo-bootstrap-carousel'); ?></option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="display_caption"><?php _e('Display Caption', 'neo-bootstrap-carousel'); ?></label></th>
                            <td>
                                <select id="display_caption" name="display_caption">
                                    <option value="yes" <?php if( get_option('_nbc_display_caption') == "yes" ) { echo 'selected="selected"';} ?>><?php _e('Yes', 'neo-bootstrap-carousel'); ?></option>
                                    <option value="no" <?php if( get_option('_nbc_display_caption') == "no" ) { echo 'selected="selected"';} ?>><?php _e('No', 'neo-bootstrap-carousel'); ?></option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="caption_title_animation"><?php _e('Caption Title Animation', 'neo-bootstrap-carousel'); ?></label></th>
                            <td>
                                <?php $select_title_dom = ''; ?>
                                <select id="caption_title_animation" name="caption_title_animation">
                                    <?php
                                    foreach( $this->css_animations as $animation_group => $animation_group_value ) {
                                        $select_title_dom .= '<optgroup label="'. $animation_group .'">';
                                            foreach( $animation_group_value as $animation_value => $animation_value_label ) {
                                                $selected = '';
                                                if( get_option('_nbc_caption_title_animation') == $animation_value ) {
                                                    $selected = 'selected="selected"';
                                                }
                                                $select_title_dom .= '<option value="'. $animation_value .'" '. $selected .' >'. $animation_value_label .'</option>';
                                            }
                                        $select_title_dom .= '</optgroup>';
                                    }
                                    echo $select_title_dom;
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="caption_description_animation"><?php _e('Caption Description Animation', 'neo-bootstrap-carousel'); ?></label></th>
                            <td>
                                <?php $select_description_dom = ''; ?>
                                <select id="caption_description_animation" name="caption_description_animation">
                                    <?php
                                    foreach( $this->css_animations as $animation_group => $animation_group_value ) {
                                        $select_description_dom .= '<optgroup label="'. $animation_group .'">';
                                            foreach( $animation_group_value as $animation_value => $animation_value_label ) {
                                                $selected = '';
                                                if( get_option('_nbc_caption_description_animation') == $animation_value ) {
                                                    $selected = 'selected="selected"';
                                                }
                                                $select_description_dom .= '<option value="'. $animation_value .'" '. $selected .' >'. $animation_value_label .'</option>';
                                            }
                                        $select_description_dom .= '</optgroup>';
                                    }
                                    echo $select_description_dom;
                                    ?>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p class="submit"><input type="submit" value="<?php _e('Save Changes', 'neo-bootstrap-carousel'); ?>" class="button button-primary" id="submit" name="submit"></p>
            </form>
            <div id="copyright"><a href="http://www.pixelspress.com/" target="_blank"><?php _e('Powered by', 'neo-bootstrap-carousel'); ?> <img src="<?php echo esc_url('http://1.gravatar.com/avatar/1424752acdbce820f4c1eb13c907f164?s=96&d=mm&r=g'); ?>" alt="<?php _e('PixelsPress', 'neo-bootstrap-carousel'); ?>"></a></div>
        </div>
        <?php
    }

    /**
     * Save Settings.
     * 
     * @since   1.0.0
     */
    public function nbc_save_settings() {
        
        // Admin Notices
        if (isset($_POST['admin_notices'])) {
            
            // Save Navigation Option in WP Option
            ( !empty( $_POST['display_navigation'] ) ) ? update_option( '_nbc_display_navigation', esc_attr( $_POST['display_navigation'] ) ) : '';

            // Save Direction Control Option in WP Option
            ( !empty( $_POST['display_direction_controls'] ) ) ? update_option( '_nbc_display_direction_controls', esc_attr( $_POST['display_direction_controls'] ) ) : '';

            // Save Caption Option in WP Option
            ( !empty( $_POST['display_caption'] ) ) ? update_option( '_nbc_display_caption', esc_attr( $_POST['display_caption'] ) ) : '';
            
            // Save Caption Option in WP Option
            ( !empty( $_POST['caption_title_animation'] ) ) ? update_option( '_nbc_caption_title_animation', esc_attr( $_POST['caption_title_animation'] ) ) : '';
            
            // Save Caption Option in WP Option
            ( !empty( $_POST['caption_description_animation'] ) ) ? update_option( '_nbc_caption_description_animation', esc_attr( $_POST['caption_description_animation'] ) ) : '';
?>
        <div class="updated">
            <p><?php echo __('Settings have been saved.', 'neo-bootstrap-carousel'); ?></p>
        </div>
<?php
        }
    }
}
new Neo_Bootstrap_Carousel_Settings();