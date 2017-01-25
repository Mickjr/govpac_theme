<?php

    /**
     * ReduxFramework Barebones Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "jpbs_options";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Theme Options', 'redux-framework-demo' ),
        'page_title'           => __( 'Theme Options', 'redux-framework-demo' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    
        // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => false,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '_options',
        // Page slug used to denote the panel
        'page_type'			=> 'submenu',
        // Enable page_type only if you need one level
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!

        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        //'compiler'             => true,

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'light',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }

    } else {
    }



	/* ********************************* FUNCTIONS START HERE *********************************** */

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*
     *  As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for
     */

    Redux::setSection( $opt_name, array(
        'title'            => __( 'General Settings', 'redux-framework-demo' ),
        'id'               => 'general',
        'desc'             => __( 'General Settings', 'redux-framework-demo' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-home'
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Site Appearance', 'redux-framework-demo' ),
        'id'               => 'site-appearance',
        'subsection'       => true,
        'customizer_width' => '500px',
        'desc'             => __( 'Upload logo, choose theme colors, etc.', 'redux-framework-demo' ),
        'fields'           => array(
            array(
                'id'       => 'site-logo',
                'type'     => 'media',
                'title'    => __( 'Site Icon Logo', 'redux-framework-demo' ),
                'desc'     => __( 'Click button to upload your image. Please upload an image 24 x 24px max', 'redux-framework-demo' ),
                'subtitle' => __( 'Please upload the site icon logo.', 'redux-framework-demo' ),
            ),

			$fields = array(
			    'id'       => 'site-icon',
			    'type'     => 'text',
			    'title'    => __('Site FontAwesome Icon', 'redux-framework-demo'),
			    'desc'     => __('Alternative Site/Icon (blank = Default Leaf Icon)', 'redux-framework-demo')
			),

			$fields = array(
			    'id'       => 'site-title',
			    'type'     => 'text',
			    'title'    => __('Site title', 'redux-framework-demo'),
			    'desc'     => __('Alternative Site/App Title (blank Site Name)', 'redux-framework-demo')			),

            array(
                'id'       => 'header-bg',
                'type'     => 'color',
                'output'   => array( 'background-color' => '#navbar' ),
                'title'    => __( 'Header Background Color', 'redux-framework-demo' ),
                'subtitle' => __( 'Pick a title color for the Header (default: #438eb9).', 'redux-framework-demo' ),
                'default'  => '#438eb9',
            ),

			$fields = array(
			    'id'       => 'userbox-bg',
			    'type'     => 'select',
			    'title'    => __('Select background class', 'redux-framework-demo'),			    					'desc'     => __('This is the welcome box background color', 'redux-framework-demo'),
			    // Must provide key => value pairs for select options
			    'options'  => array(
			        'blue' 			=> 'Blue',
			        'grey' 			=> 'Grey',
			        'purple'		=> 'Purple',
			        'green'			=> 'Green',
			        'red'			=> 'Red',
			        'light-blue'	=> 'Light Blue',
			        'light-blue2'	=> 'Light Blue Alt',
			        'light-green'	=> 'Light Green',
			        'light-purple'	=> 'Light Purple',
			        'light-orange'	=> 'Light Orange',
			        'light-pink'	=> 'Light Pink',
			        'dark'			=> 'Black',
			        'white-opaque'	=> 'White Opaque',
			        'dark-opaque'	=> 'Dark Opaque',
			        'light-10'		=> 'Light 10',
			        'dark-10'		=> 'Dark 10',
			        'transparent'	=> 'Transparent'
			    ),
			    'default'  => 'light-blue',
			),

            array(
                'id'          => 'header-title',
                'type'        => 'typography',
                'title'       => __( 'Site Name', 'redux-framework-demo' ),
                'font-backup' => true,
                'all_styles'  => true,
                'output'      => array( '.navbar .navbar-brand' ),
                'units'       => 'px',
                'subtitle'    => __( 'Set Font for Site Name', 'redux-framework-demo' ),
                'default'     => array(
                    'color'       => '#fff',
                    'font-style'  => '400',
                    'font-family' => 'Abel',
                    'google'      => true,
                    'font-size'   => '24px',
                    'line-height' => '20px'
                ),
            ),

            array(
                'id'        => 'body-class',
                'type'      => 'text',
                'title'     => __( 'Body css class', 'redux-framework-demo' ),
                'subtitle'  => __( 'Enter Body CSS Class', 'redux-framework-demo' ),
                'desc'      => __( 'This class is needed by the template', 'redux-framework-demo' ),
                'default'	=> 'no-skin'
            ),

            array(
                'id'          => 'body-font',
                'type'        => 'typography',
                'title'       => __( 'Site Font', 'redux-framework-demo' ),
                'font-backup' => true,
                'all_styles'  => true,
                'output'      => array( 'body' ),
                'compiler'    => array( 'body' ),
                'units'       => 'px',
                'subtitle'    => __( 'Set Content Font, size and color', 'redux-framework-demo' ),
                'default'     => array(
                    'color'       => '#333',
                    'font-style'  => '200',
                    'font-family' => 'Abel',
                    'google'      => true,
                    'font-size'   => '14px',
                    'line-height' => '20px'
                ),
            ),
            
            array(
                'id'       => 'body-link-color',
                'type'     => 'link_color',
                'title'    => __( 'Links Color Option', 'redux-framework-demo' ),
                'subtitle' => __( 'Please select the color for the links in all stages', 'redux-framework-demo' ),
                'desc'     => __( 'Will affect all body links', 'redux-framework-demo' ),
                'output'      => array( 'a' ),
                'visited'   => true,  // Enable Visited Color
                'default'  => array(
                    'regular' => '#aaa',
                    'hover'   => '#bbb',
                    'active'  => '#ccc',
                    'visited' => '#ccc'
                )
            ),

        )

	) );


    Redux::setSection( $opt_name, array(
        'title'            => __( 'Layout Options', 'redux-framework-demo' ),
        'id'               => 'site-layout',
        'subsection'       => true,
        'customizer_width' => '500px',
        'desc'             => __( 'Fixed Options: nav, breadcrumbs, compact sidebar, main container, etc.', 'redux-framework-demo' ),
        'fields'           => array(

			$fields = array(
			    'id'       => 'main-container',
			    'type'     => 'switch', 
			    'title'    => __('Container Page', 'redux-framework-demo'),
			    'subtitle' => __('Setup No, for full width site', 'redux-framework-demo'),
			    'default'  => false,
			),
			$fields = array(
			    'id'       => 'navbar-fixed',
			    'type'     => 'switch', 
			    'title'    => __('Fixed Navbar', 'redux-framework-demo'),
			    'subtitle' => __('Yes if you want navbar to stick', 'redux-framework-demo'),
			    'default'  => false,
			),
			$fields = array(
			    'id'       => 'breadcrumbs-fixed',
			    'type'     => 'switch', 
			    'title'    => __('Fixed Breadcrumbs bar', 'redux-framework-demo'),
			    'subtitle' => __('Yes if you want the breadcrumbs bar to stick', 'redux-framework-demo'),
			    'default'  => false,
			),
			$fields = array(
			    'id'       => 'compact-sidebar',
			    'type'     => 'switch', 
			    'title'    => __('Compact Sidebar', 'redux-framework-demo'),
			    'subtitle' => __('Yes if you want a smaller sidebar', 'redux-framework-demo'),
			    'default'  => false,
			),

		)
		
		
	) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Sidebar Buttons', 'redux-framework-demo' ),
        'id'               => 'sidebar-buttons',
        'desc'             => __( 'Sidebar top 4 buttons', 'redux-framework-demo' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-website'
    ) );



   Redux::setSection( $opt_name, array(
        'title'            => __( 'Button 1', 'redux-framework-demo' ),
        'id'               => 'button1',
        'subsection'       => true,
        'customizer_width' => '500px',
        'desc'             => __( 'Setup the first button', 'redux-framework-demo' ),
        'fields'           => array(
			
			$fields = array(
			    'id'       => 'btn1-link',
			    'type'     => 'text',
			    'title'    => __('Green Button link', 'redux-framework-demo'),
			    'desc'     => __('Enter button link (blank if not apply)', 'redux-framework-demo')					),

			$fields = array(
			    'id'       => 'btn1-icon',
			    'type'     => 'text',
			    'title'    => __('Button Icon ', 'redux-framework-demo'),
			    'desc'     => __('Please enter the Font Awesome Icon (ex: fa fa-icon)', 'redux-framework-demo'),
			    'default'  => 'fa fa-signal'
			),

		)
		
	) );

   Redux::setSection( $opt_name, array(
        'title'            => __( 'Button 2', 'redux-framework-demo' ),
        'id'               => 'button2',
        'subsection'       => true,
        'customizer_width' => '500px',
        'desc'             => __( 'Setup the second button', 'redux-framework-demo' ),
        'fields'           => array(
			
			$fields = array(
			    'id'       => 'btn2-link',
			    'type'     => 'text',
			    'title'    => __('Blue Button link', 'redux-framework-demo'),
			    'desc'     => __('Enter button link (blank if not apply)', 'redux-framework-demo')					),

			$fields = array(
			    'id'       => 'btn2-icon',
			    'type'     => 'text',
			    'title'    => __('Button Icon ', 'redux-framework-demo'),
			    'desc'     => __('Please enter the Font Awesome Icon (ex: fa fa-icon)', 'redux-framework-demo'),
			    'default'  => 'fa fa-pencil'
			),


		)
		
	) );

   Redux::setSection( $opt_name, array(
        'title'            => __( 'Button 3', 'redux-framework-demo' ),
        'id'               => 'button3',
        'subsection'       => true,
        'customizer_width' => '500px',
        'desc'             => __( 'Setup the third button', 'redux-framework-demo' ),
        'fields'           => array(
			
			$fields = array(
			    'id'       => 'btn3-link',
			    'type'     => 'text',
			    'title'    => __('Orange Button link', 'redux-framework-demo'),
			    'desc'     => __('Enter button link (blank if not apply)', 'redux-framework-demo')					),

			$fields = array(
			    'id'       => 'btn3-icon',
			    'type'     => 'text',
			    'title'    => __('Button Icon ', 'redux-framework-demo'),
			    'desc'     => __('Please enter the Font Awesome Icon (ex: fa fa-icon)', 'redux-framework-demo'),
			    'default'  => 'fa fa-users'
			),


		)
		
	) );

   Redux::setSection( $opt_name, array(
        'title'            => __( 'Button 4', 'redux-framework-demo' ),
        'id'               => 'button4',
        'subsection'       => true,
        'customizer_width' => '500px',
        'desc'             => __( 'Setup the fourth button', 'redux-framework-demo' ),
        'fields'           => array(
			
			$fields = array(
			    'id'       => 'btn4-link',
			    'type'     => 'text',
			    'title'    => __('Red Button link', 'redux-framework-demo'),
			    'desc'     => __('Enter button link (blank if not apply)', 'redux-framework-demo')					),

			$fields = array(
			    'id'       => 'btn4-icon',
			    'type'     => 'text',
			    'title'    => __('Button Icon ', 'redux-framework-demo'),
			    'desc'     => __('Please enter the Font Awesome Icon (ex: fa fa-icon)', 'redux-framework-demo'),
			    'default'  => 'fa fa-cogs'
			),


		)
		
	) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Footer Options', 'redux-framework-demo' ),
        'id'               => 'footer-options',
        'desc'             => __( 'Copyright & social links', 'redux-framework-demo' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-link'
    ) );

   Redux::setSection( $opt_name, array(
        'title'            => __( 'Copyright', 'redux-framework-demo' ),
        'id'               => 'copyright',
        'subsection'       => true,
        'customizer_width' => '500px',
        'desc'             => __( 'Setup the footer copyright text', 'redux-framework-demo' ),
        'fields'           => array(

			$fields = array(
			    'id'       => 'footer-copy',
			    'type'     => 'text',
			    'title'    => __('Copyright Text', 'redux-framework-demo'),
			    'desc'     => __('Please enter text', 'redux-framework-demo'),
			    'default'  => '<a href="http://harvest4life.net" target="_blank">Harvest4Life App</a> &copy; 2015-2016'
			),

            array(
                'id'       => 'copy-link-color',
                'type'     => 'link_color',
                'title'    => __( 'Copyright Link Color', 'redux-framework-demo' ),
                'desc'     => __( 'Optional: choose this only if you have a link in the Copyright text', 'redux-framework-demo' ),
                'output'      => array( '.footer-content .bigger-120 a' ),
                'active'    => false, // Disable Active Color
                'visited'   => true,  // Enable Visited Color
                'default'  => array(
                    'regular' => '#478fca',
                    'hover'   => '#6AA9CF',
                    'visited' => '#478fca'
                )
            ),

		)

	) );

   Redux::setSection( $opt_name, array(
        'title'            => __( 'Social Links', 'redux-framework-demo' ),
        'id'               => 'social-links',
        'subsection'       => true,
        'customizer_width' => '500px',
        'desc'             => __( 'Setup site social links', 'redux-framework-demo' ),
        'fields'           => array(

			$fields = array(
			    'id'       => 'facebook-link',
			    'type'     => 'text',
			    'title'    => __('Facebook link', 'redux-framework-demo'),
			    'desc'     => __('Please enter your Facebook link (blank if not apply)', 'redux-framework-demo'),
			    'default'  => 'https://facebook.com/'
			),

            $fields = array(
                'id'       => 'facebook-link-color',
                'type'     => 'link_color',
                'title'    => __( 'Facebook Icon Color', 'redux-framework-demo' ),
                'desc'     => __( 'Optional: change if default value is not what you want', 'redux-framework-demo' ),
                'output'      => array( '.footer-content a#facebook' ),
                'active'    => false, // Disable Active Color
                'visited'   => true,  // Enable Visited Color
                'default'  => array(
                    'regular' => '#337ab7',
                    'hover'   => '#337ab7',
                    'visited' => '#337ab7'
                )
            ),

			$fields = array(
			    'id'       => 'facebook-icon',
			    'type'     => 'text',
			    'title'    => __('Facebook Icon class', 'redux-framework-demo'),
			    'desc'     => __('Please enter Fontawesome Icon (ex: fa fa-facebook', 'redux-framework-demo'),
			    'default'  => 'fa fa-facebook-square'
			),

			$fields = array(
			    'id'   =>'social-divider1',
			    'type' => 'divide'
			),

			$fields = array(
			    'id'       => 'twitter-link',
			    'type'     => 'text',
			    'title'    => __('Twitter link', 'redux-framework-demo'),
			    'desc'     => __('Please enter your Twitter link (blank if not apply)', 'redux-framework-demo'),
			    'default'  => 'https://twitter.com/'
			),

            $fields = array(
                'id'       => 'twitter-link-color',
                'type'     => 'link_color',
                'title'    => __( 'Twitter Icon Color', 'redux-framework-demo' ),
                'desc'     => __( 'Optional: change if default value is not what you want', 'redux-framework-demo' ),
                'output'      => array( '.footer-content a#twitter' ),
                'active'    => false, // Disable Active Color
                'visited'   => true,  // Enable Visited Color
                'default'  => array(
                    'regular' => '#93cbf9',
                    'hover'   => '#93cbf9',
                    'visited' => '#93cbf9'
                )
            ),

			$fields = array(
			    'id'       => 'twitter-icon',
			    'type'     => 'text',
			    'title'    => __('Twitter Icon class', 'redux-framework-demo'),
			    'desc'     => __('Please enter Fontawesome Icon (ex: fa fa-twitter', 'redux-framework-demo'),
			    'default'  => 'fa fa-twitter-square'
			),

			$fields = array(
			    'id'   =>'social-divider2',
			    'type' => 'divide'
			),

			$fields = array(
			    'id'       => 'linkedin-link',
			    'type'     => 'text',
			    'title'    => __('Linkedin link', 'redux-framework-demo'),
			    'desc'     => __('Please enter your Linkedin link (blank if not apply)', 'redux-framework-demo'),
			    'default'  => 'https://www.linkedin.com/'
			),

            $fields = array(
                'id'       => 'linkedin-link-color',
                'type'     => 'link_color',
                'title'    => __( 'Linkedin Icon Color', 'redux-framework-demo' ),
                'desc'     => __( 'Optional: change if default value is not what you want', 'redux-framework-demo' ),
                'output'      => array( '.footer-content a#linkedin' ),
                'active'    => false, // Disable Active Color
                'visited'   => true,  // Enable Visited Color
                'default'  => array(
                    'regular' => '#0077B5',
                    'hover'   => '#0077B5',
                    'visited' => '#0077B5'
                )
            ),

			$fields = array(
			    'id'       => 'linkedin-icon',
			    'type'     => 'text',
			    'title'    => __('Linkedin Icon class', 'redux-framework-demo'),
			    'desc'     => __('Please enter Fontawesome Icon (ex: fa fa-linkedin', 'redux-framework-demo'),
			    'default'  => 'fa fa-linkedin-square'
			),

			$fields = array(
			    'id'   =>'social-divider3',
			    'type' => 'divide'
			),

			$fields = array(
			    'id'       => 'instagram-link',
			    'type'     => 'text',
			    'title'    => __('Instagram link', 'redux-framework-demo'),
			    'desc'     => __('Please enter your Instagram link (blank if not apply)', 'redux-framework-demo'),
			    'default'  => 'https://www.instagram.com/'
			),

            $fields = array(
                'id'       => 'instagram-link-color',
                'type'     => 'link_color',
                'title'    => __( 'Instagram Icon Color', 'redux-framework-demo' ),
                'desc'     => __( 'Optional: change if default value is not what you want', 'redux-framework-demo' ),
                'output'      => array( '.footer-content a#instagram' ),
                'active'    => false, // Disable Active Color
                'visited'   => true,  // Enable Visited Color
                'default'  => array(
                    'regular' => '#222222',
                    'hover'   => '#222222',
                    'visited' => '#222222'
                )
            ),

			$fields = array(
			    'id'       => 'instagram-icon',
			    'type'     => 'text',
			    'title'    => __('Instagram Icon class', 'redux-framework-demo'),
			    'desc'     => __('Please enter Fontawesome Icon (ex: fa fa-instagram', 'redux-framework-demo'),
			    'default'  => 'fa fa-instagram'
			),

			$fields = array(
			    'id'   =>'social-divider4',
			    'type' => 'divide'
			),

			$fields = array(
			    'id'       => 'pinterest-link',
			    'type'     => 'text',
			    'title'    => __('Pinterest link', 'redux-framework-demo'),
			    'desc'     => __('Please enter your Pinterest link (blank if not apply)', 'redux-framework-demo'),
			    'default'  => 'https://www.pinterest.com/'
			),

            $fields = array(
                'id'       => 'pinterest-link-color',
                'type'     => 'link_color',
                'title'    => __( 'Pinterest Icon Color', 'redux-framework-demo' ),
                'desc'     => __( 'Optional: change if default value is not what you want', 'redux-framework-demo' ),
                'output'      => array( '.footer-content a#pinterest' ),
                'active'    => false, // Disable Active Color
                'visited'   => true,  // Enable Visited Color
                'default'  => array(
                    'regular' => '#CD2128',
                    'hover'   => '#CD2128',
                    'visited' => '#CD2128'
                )
            ),

			$fields = array(
			    'id'       => 'pinterest-icon',
			    'type'     => 'text',
			    'title'    => __('Pinterest Icon class', 'redux-framework-demo'),
			    'desc'     => __('Please enter Fontawesome Icon (ex: fa fa-pinterest', 'redux-framework-demo'),
			    'default'  => 'fa fa-pinterest-square'
			),

			$fields = array(
			    'id'   =>'social-divider5',
			    'type' => 'divide'
			),

			$fields = array(
			    'id'       => 'vimeo-link',
			    'type'     => 'text',
			    'title'    => __('Vimeo link', 'redux-framework-demo'),
			    'desc'     => __('Please enter your Vimeo link (blank if not apply)', 'redux-framework-demo'),
			    'default'  => 'https://vimeo.com/'
			),

            $fields = array(
                'id'       => 'vimeo-link-color',
                'type'     => 'link_color',
                'title'    => __( 'Vimeo Icon Color', 'redux-framework-demo' ),
                'desc'     => __( 'Optional: change if default value is not what you want', 'redux-framework-demo' ),
                'output'      => array( '.footer-content a#vimeo' ),
                'active'    => false, // Disable Active Color
                'visited'   => true,  // Enable Visited Color
                'default'  => array(
                    'regular' => '#17B3E8',
                    'hover'   => '#17B3E8',
                    'visited' => '#17B3E8'
                )
            ),

			$fields = array(
			    'id'       => 'vimeo-icon',
			    'type'     => 'text',
			    'title'    => __('Vimeo Icon class', 'redux-framework-demo'),
			    'desc'     => __('Please enter Fontawesome Icon (ex: fa fa-vimeo', 'redux-framework-demo'),
			    'default'  => 'fa fa-vimeo-square'
			),

			$fields = array(
			    'id'   =>'social-divider6',
			    'type' => 'divide'
			),

			$fields = array(
			    'id'       => 'youtube-link',
			    'type'     => 'text',
			    'title'    => __('YouTube link', 'redux-framework-demo'),
			    'desc'     => __('Please enter your YouTube link (blank if not apply)', 'redux-framework-demo'),
			    'default'  => 'https://www.youtube.com/'
			),

            $fields = array(
                'id'       => 'youtube-link-color',
                'type'     => 'link_color',
                'title'    => __( 'YouTube Icon Color', 'redux-framework-demo' ),
                'desc'     => __( 'Optional: change if default value is not what you want', 'redux-framework-demo' ),
                'output'      => array( '.footer-content a#youtube' ),
                'active'    => false, // Disable Active Color
                'visited'   => true,  // Enable Visited Color
                'default'  => array(
                    'regular' => '#E62B24',
                    'hover'   => '#E62B24',
                    'visited' => '#E62B24'
                )
            ),

			$fields = array(
			    'id'       => 'youtube-icon',
			    'type'     => 'text',
			    'title'    => __('YouTube Icon class', 'redux-framework-demo'),
			    'desc'     => __('Please enter Fontawesome Icon (ex: fa fa-youtube', 'redux-framework-demo'),
			    'default'  => 'fa fa-youtube-square'
			),

			$fields = array(
			    'id'   =>'social-divider7',
			    'type' => 'divide'
			),

			$fields = array(
			    'id'       => 'rss-link',
			    'type'     => 'text',
			    'title'    => __('RSS link', 'redux-framework-demo'),
			    'desc'     => __('Please enter your RSS link (blank if not apply)', 'redux-framework-demo'),
			    'default'  => get_bloginfo('url')
			),

            $fields = array(
                'id'       => 'rss-link-color',
                'type'     => 'link_color',
                'title'    => __( 'RSS Icon Color', 'redux-framework-demo' ),
                'desc'     => __( 'Optional: change if default value is not what you want', 'redux-framework-demo' ),
                'output'      => array( '.footer-content a#rss' ),
                'active'    => false, // Disable Active Color
                'visited'   => true,  // Enable Visited Color
                'default'  => array(
                    'regular' => '#FB7A02',
                    'hover'   => '#FB7A02',
                    'visited' => '#FB7A02'
                )
            ),

			$fields = array(
			    'id'       => 'rss-icon',
			    'type'     => 'text',
			    'title'    => __('RSS Icon class', 'redux-framework-demo'),
			    'desc'     => __('Please enter Fontawesome Icon (ex: fa fa-rss', 'redux-framework-demo'),
			    'default'  => 'fa fa-rss-square'
			),

		)

	) );

    /*
     * <--- END SECTIONS
     */
