<?php if (!defined('ABSPATH')) { exit; } // Exit if accessed directly
/**
 * Neo_Bootstrap_Carousel_Meta_Box Class
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 * 
 * @link       http://pixelspress.com
 * @since      1.0.0
 *
 * @package    Neo_Bootstrap_Carousel
 * @subpackage Neo_Bootstrap_Carousel/includes
 * @author     PixelsPress <support@pixelspress.com>
 */

class Neo_Bootstrap_Carousel_Meta_Box {
    
    /**
     * The ID of this plugin.
     *
     * @since   1.0.0
     * @access  protected
     * @var     array   $neo_carousel_postmeta
     */
    protected $neo_carousel_postmeta;

    /**
     * Initialize the class and set it's properties.
     *
     * @since   1.0.0
     */
    public function __construct()
    {
        // Creating Meta Box on Add New NEO Bootstrap Carousel Page
        $this->neo_carousel_postmeta = array(
            'id' => 'neo_bootstrap_carousel_metabox_section',
            'title' => __('Slides', 'neo-bootstrap-carousel'),
            'context' => 'normal',
            'screen' => 'neo_carousel',
            'priority' => 'high',
            'context' => 'normal',
            'callback' => 'neo_carousel_output',
            'show_names' => TRUE,
            'closed' => FALSE,
        );
        
        // Add Hook into the 'admin_menu' Action
        add_action('add_meta_boxes', array($this, 'nbc_create_meta_box'));

        // Add Hook into the 'save_post()' Action
        add_action('save_post_neo_carousel', array($this, 'nbc_save_meta_box'));
    }
    
    /**
     * Getter of neo_carousel meta box.
     *
     * @since   1.0.0
     */
    public function get_nbc_postmeta() {
        return $this->neo_carousel_postmeta;
    }
    
    /**
     * Create Meta Box
     *
     * @since   1.0.0 
     */
    public function nbc_create_meta_box() {
        $neo_carousel_postmeta = self::get_nbc_postmeta();
        add_meta_box($neo_carousel_postmeta['id'], $neo_carousel_postmeta['title'], array($this, $neo_carousel_postmeta['callback']), $neo_carousel_postmeta['screen'], $neo_carousel_postmeta['context'], $neo_carousel_postmeta['priority']);
    }
    
    /**
     * Meta Box Output
     *
     * @since   1.0.0 
     * 
     * @param   object  $post   Post Object
     */
    public static function neo_carousel_output($post)
    {
        // Add a nonce field so we can check it for later.
        wp_nonce_field('nbc_meta_box_field', 'nbc_carousel_meta_box_nonce');
        ?>
        <!-- Slider's slides -->
        <div id="nbc-slider-container">
            <ul class="nbc-slides">
                <?php
                $nbc_slides_meta = get_post_meta( (int) $post->ID, sanitize_key( '_neo_bootstrap_carousel' ), TRUE);
                $nbc_slides = array_filter( explode(',', $nbc_slides_meta) );
                $update_meta = FALSE;
                $updated_gallery_ids = array();

                if (!empty($nbc_slides)) {
                    foreach ($nbc_slides as $nbc_slide) {
                        $nbc_slide_array = explode("|", $nbc_slide);
                        $attachment_id = $nbc_slide_array[0];
                        $attachment_overlay = (isset($nbc_slide_array[1])) ? $nbc_slide_array[1] : '';
                        $attachment_overlay_opacity = (isset($nbc_slide_array[2])) ? $nbc_slide_array[2] : '';
                        
                        $attachment = wp_get_attachment_image( $attachment_id, 'thumbnail' );
                        $attachment_meta = get_post( $attachment_id ); // Get post by ID

                        // Skip Empty Attachment
                        if (empty($attachment)) {
                            $update_meta = TRUE;
                            continue;
                        }
                        $row = ''; 
                        $row .= '<li class="slide" data-attachment_id="' . intval( $attachment_id ) . '">';
                            $row .= '<table>';
                                $row .= '<tbody>';
                                    $row .= '<tr>';
                                        $row .= '<td>'.$attachment.'</td>';
                                        $row .= '<td>';
                                            $row .= '<table>';
                                                $row .= '<tr>';
                                                    $row .= '
                                                    <td><label for="slide_title_' . intval( $attachment_id ) . '">'.__('Title', 'neo-bootstrap-carousel').'</label></td>
                                                    <td><input type="text" name="slide_title_' . intval( $attachment_id ) . '" id="slide_title_'. intval( $attachment_id ) .'" value="'. esc_attr( $attachment_meta->post_title ) .'" class="form-control"></td>
                                                    ';
                                                $row .= '</tr>';
                                                $row .= '<tr>';
                                                    $row .= '
                                                    <td style="vertical-align: top;"><label for="slide_description_' . intval( $attachment_id ) . '">'.__('Description', 'neo-bootstrap-carousel').'</label></td>
                                                    <td><textarea name="slide_description_' . intval( $attachment_id ) . '" id="slide_description_'. intval( $attachment_id ) .'" class="form-control" rows="3">'. esc_textarea( $attachment_meta->post_excerpt ) .'</textarea></td>
                                                    ';
                                                $row .= '</tr>';
                                                $row .= '<tr>';
                                                    $row .= '
                                                    <td style="vertical-align: top;"><label for="overlay_' . intval( $attachment_id ) . '">'.__('Overlay', 'neo-bootstrap-carousel').'</label></td>
                                                    <td>
                                                        <select name="overlay_' . intval( $attachment_id ) . '" id="overlay_' . intval( $attachment_id ) . '" class="form-control">
                                                    ';
                                                    
                                                    $row .= '
                                                            <option value="" '. (($attachment_overlay == "") ? "selected=\"selected\"" : "") .'>'.__( 'None', 'neo-bootstrap-carousel' ).'</option>
                                                            <option value="dark" '. (($attachment_overlay == "dark") ? "selected=\"selected\"" : "") .'>'.__( 'Dark', 'neo-bootstrap-carousel' ).'</option>
                                                            <option value="light" '. (($attachment_overlay == "light") ? "selected=\"selected\"" : "") .'>'.__( 'Light', 'neo-bootstrap-carousel' ).'</option>
                                                    ';
                                                    $row .= '
                                                        </select>
                                                    </td>
                                                    ';
                                                $row .= '</tr>';
                                                $row .= '<tr>';
                                                    $row .= '
                                                    <td style="vertical-align: top;"><label for="overlay_opacity_' . intval( $attachment_id ) . '">'.__('Overlay Opacity', 'neo-bootstrap-carousel').'</label></td>
                                                    <td>
                                                        <select name="overlay_opacity_' . intval( $attachment_id ) . '" id="overlay_opacity_' . intval( $attachment_id ) . '" class="form-control">
                                                            <option value="0.05" '. (($attachment_overlay_opacity == "0.05") ? "selected=\"selected\"" : "") .'>5%</option>
                                                            <option value="0.10" '. (($attachment_overlay_opacity == "0.10") ? "selected=\"selected\"" : "") .'>10%</option>
                                                            <option value="0.15" '. (($attachment_overlay_opacity == "0.15") ? "selected=\"selected\"" : "") .'>15%</option>
                                                            <option value="0.20" '. (($attachment_overlay_opacity == "0.20") ? "selected=\"selected\"" : "") .'>20%</option>
                                                            <option value="0.25" '. (($attachment_overlay_opacity == "0.25") ? "selected=\"selected\"" : "") .'>25%</option>
                                                            <option value="0.30" '. (($attachment_overlay_opacity == "0.30") ? "selected=\"selected\"" : "") .'>30%</option>
                                                            <option value="0.35" '. (($attachment_overlay_opacity == "0.35") ? "selected=\"selected\"" : "") .'>35%</option>
                                                            <option value="0.40" '. (($attachment_overlay_opacity == "0.40") ? "selected=\"selected\"" : "") .'>40%</option>
                                                            <option value="0.45" '. (($attachment_overlay_opacity == "0.45") ? "selected=\"selected\"" : "") .'>45%</option>
                                                            <option value="0.50" '. (($attachment_overlay_opacity == "0.50") ? "selected=\"selected\"" : "") .'>50%</option>
                                                            <option value="0.55" '. (($attachment_overlay_opacity == "0.55") ? "selected=\"selected\"" : "") .'>55%</option>
                                                            <option value="0.60" '. (($attachment_overlay_opacity == "0.60") ? "selected=\"selected\"" : "") .'>60%</option>
                                                            <option value="0.65" '. (($attachment_overlay_opacity == "0.65") ? "selected=\"selected\"" : "") .'>65%</option>
                                                            <option value="0.70" '. (($attachment_overlay_opacity == "0.70") ? "selected=\"selected\"" : "") .'>70%</option>
                                                            <option value="0.75" '. (($attachment_overlay_opacity == "0.75") ? "selected=\"selected\"" : "") .'>75%</option>
                                                            <option value="0.80" '. (($attachment_overlay_opacity == "0.80") ? "selected=\"selected\"" : "") .'>80%</option>
                                                            <option value="0.85" '. (($attachment_overlay_opacity == "0.85") ? "selected=\"selected\"" : "") .'>85%</option>
                                                            <option value="0.90" '. (($attachment_overlay_opacity == "0.90") ? "selected=\"selected\"" : "") .'>90%</option>
                                                            <option value="0.95" '. (($attachment_overlay_opacity == "0.95") ? "selected=\"selected\"" : "") .'>95%</option>
                                                            <option value="1" '. (($attachment_overlay_opacity == "1") ? "selected=\"selected\"" : "") .'>100%</option>
                                                        </select>
                                                    </td>
                                                    ';
                                                $row .= '</tr>';
                                            $row .= '</table>';
                                        $row .= '</td>';
                                    $row .= '</tr>';    
                                $row .= '</tbody>';
                            $row .= '</table>';
                            $row .= '<a href="javascript:void(0);" class="delete" title="' . esc_attr__('Delete Slide', 'neo-bootstrap-carousel') . '">' . esc_attr__('X', 'neo-bootstrap-carousel') . '</a>';
                        $row .= '</li>';
                        echo $row;
                        
                        // Rebuild IDs to be Saved
                        $updated_gallery_ids[] = $attachment_id;
                    }
                }
                ?>
            </ul>
            <input type="hidden" id="nbc_slides" name="nbc_slides" value="<?php echo esc_attr(implode(',', $updated_gallery_ids)); ?>" />
        </div>
        <p class="add-slide hide-if-no-js">
            <a href="javascript:void(0);" data-choose="<?php esc_attr_e('Add Slide to Slider', 'neo-bootstrap-carousel'); ?>" data-update="<?php esc_attr_e('Add to Slider', 'neo-bootstrap-carousel'); ?>" data-delete="<?php esc_attr_e('Delete Slide', 'neo-bootstrap-carousel'); ?>" data-text="<?php esc_attr_e('Delete', 'neo-bootstrap-carousel'); ?>"><?php _e('Add Slide to Slider', 'neo-bootstrap-carousel'); ?></a>
        </p>
        <?php
    }
    
    /**
     * Save Meta Box.
     *
     * @since   1.0.0
     * @global object $post
     */
    public static function nbc_save_meta_box() {
        global $post;

        // Check Nonce Field
        if (!isset($_POST['nbc_carousel_meta_box_nonce'])) {
            return;
        }

        // Verify that the nonce is valid.
        if (!wp_verify_nonce( $_POST['nbc_carousel_meta_box_nonce'], 'nbc_meta_box_field')) {
            return;
        }

        // If this is an autosave, our form has not been submitted, so we don't want to do anything.
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        // Check the user's permissions.
        if (isset($_POST['post_type']) && 'page' == $_POST['post_type']) {
            if (!current_user_can('edit_page', (int) $post->ID)) {
                return;
            }
        } else {
            if (!current_user_can('edit_post', (int) $post->ID)) {
                return;
            }
        }
        
        //Slide Detail
        $slide_details = array();
        
        // Get Attachment's/Slide's IDs
        $attachment_ids = isset($_POST['nbc_slides']) ? array_filter(explode(',', $_POST['nbc_slides'])) : array();
        
            
        //if(is_array($attachment_ids) && count($attachment_ids) > 0) {
            foreach ($attachment_ids as $id) {
                $slide_details[] = $id. "|" .$_POST["overlay_".$id]. "|" .$_POST["overlay_opacity_".$id];

                $carousel_post = array(
                    'ID'           => $id,
                    'post_title'   => sanitize_text_field( $_POST["slide_title_".$id] ),
                    'post_excerpt' => sanitize_textarea_field( $_POST["slide_description_".$id] ),
                );
                
                // Update the post into the database
                wp_update_post( $carousel_post );
            }
            //update_post_meta($post->ID, '_neo_bootstrap_carousel', implode(',', $attachment_ids));
//            echo '<pre>';
//            print_r($slide_details);
//            echo '</pre>';
//            wp_die();
            
            update_post_meta( (int) $post->ID, sanitize_key( '_neo_bootstrap_carousel' ), implode(',', $slide_details) );
        //}
    }
}
new Neo_Bootstrap_Carousel_Meta_Box();