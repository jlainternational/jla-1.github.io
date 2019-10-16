<?php


if (!class_exists("Redux_Framework_sample_config")) {

    class Redux_Framework_sample_config {

        public $args = array();
        public $sections = array();
        public $theme;
        public $ReduxFramework;

        public function __construct() {
            // This is needed. Bah WordPress bugs.  ;)
            if ( defined('TEMPLATEPATH') && strpos( Redux_Helpers::cleanFilePath( __FILE__ ), Redux_Helpers::cleanFilePath( TEMPLATEPATH ) ) !== false) {
                $this->initSettings();
            } else {
                add_action('plugins_loaded', array($this, 'initSettings'), 10);    
            }
        }

        public function initSettings() {

            if ( !class_exists("ReduxFramework" ) ) {
                return;
            }       
            
            // Just for demo purposes. Not needed per say.
            $this->theme = wp_get_theme();

            // Set the default arguments
            $this->setArguments();

            // Set a few help tabs so you can see how it's done
            $this->setHelpTabs();

            // Create the sections and fields
            $this->setSections();

            if (!isset($this->args['opt_name'])) { // No errors please
                return;
            }

            // If Redux is running as a plugin, this will remove the demo notice and links
            //add_action( 'redux/plugin/hooks', array( $this, 'remove_demo' ) );
            // Function to test the compiler hook and demo CSS output.
            //add_filter('redux/options/'.$this->args['opt_name'].'/compiler', array( $this, 'compiler_action' ), 10, 2); 
            // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
            // Change the arguments after they've been declared, but before the panel is created
            //add_filter('redux/options/'.$this->args['opt_name'].'/args', array( $this, 'change_arguments' ) );
            // Change the default value of a field after it's been set, but before it's been useds
            //add_filter('redux/options/'.$this->args['opt_name'].'/defaults', array( $this,'change_defaults' ) );
            // Dynamically add a section. Can be also used to modify sections/fields
            add_filter('redux/options/' . $this->args['opt_name'] . '/sections', array($this, 'dynamic_section'));

            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
        }

        function compiler_action($options, $css) {
            //echo "<h1>The compiler hook has run!";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )

            /*
              // Demo of how to use the dynamic CSS and write your own static CSS file
              $filename = dirname(__FILE__) . '/style' . '.css';
              global $wp_filesystem;
              if( empty( $wp_filesystem ) ) {
              require_once( ABSPATH .'/wp-admin/includes/file.php' );
              WP_Filesystem();
              }

              if( $wp_filesystem ) {
              $wp_filesystem->put_contents(
              $filename,
              $css,
              FS_CHMOD_FILE // predefined mode settings for WP files
              );
              }
             */
          }

          function dynamic_section($sections) {
            //$sections = array();
            $sections[] = array(
                'title' => esc_html__('Section via hook', 'redux-framework-demo'),
                'desc' => esc_html__('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework-demo'),
                'icon' => 'el-icon-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }

        function change_arguments($args) {
            //$args['dev_mode'] = true;

            return $args;
        }


        function change_defaults($defaults) {
            $defaults['str_replace'] = "Testing filter hook!";

            return $defaults;
        }

        // Remove the demo link and the notice of integrated demo from the redux-framework plugin
        function remove_demo() {

            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if (class_exists('ReduxFrameworkPlugin')) {
                remove_filter('plugin_row_meta', array(ReduxFrameworkPlugin::get_instance(), 'plugin_meta_demo_mode_link'), null, 2);
            }

            // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
            remove_action('admin_notices', array(ReduxFrameworkPlugin::get_instance(), 'admin_notices'));
        }

        public function setSections() {

            // Background Patterns Reader
            $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
            $sample_patterns_url = ReduxFramework::$_url . '../sample/patterns/';
            $sample_patterns = array();

            if (is_dir($sample_patterns_path)) :

                if ($sample_patterns_dir = opendir($sample_patterns_path)) :
                    $sample_patterns = array();

                    while (( $sample_patterns_file = readdir($sample_patterns_dir) ) !== false) {

                        if (stristr($sample_patterns_file, '.png') !== false || stristr($sample_patterns_file, '.jpg') !== false) {
                            $name = explode(".", $sample_patterns_file);
                            $name = str_replace('.' . end($name), '', $sample_patterns_file);
                            $sample_patterns[] = array('alt' => $name, 'img' => $sample_patterns_url . $sample_patterns_file);
                        }
                    }
                endif;
            endif;

            ob_start();

            $ct = wp_get_theme();
            $this->theme = $ct;
            $item_name = $this->theme->get('Name');
            $tags = $this->theme->Tags;
            $screenshot = $this->theme->get_screenshot();
            $class = $screenshot ? 'has-screenshot' : '';

            $customize_title = sprintf(__('Customize &#8220;%s&#8221;', 'redux-framework-demo'), $this->theme->display('Name'));
            ?>
            <div id="current-theme" class="<?php echo esc_attr($class); ?>">
                <?php if ($screenshot) : ?>
                    <?php if (current_user_can('edit_theme_options')) : ?>
                        <a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr($customize_title); ?>">
                            <img src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_html_e('Current theme preview', 'tatee'); ?>" />
                        </a>
                    <?php endif; ?>
                    <img class="hide-if-customize" src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_html_e('Current theme preview', 'tatee'); ?>" />
                <?php endif; ?>

                <h4>
                    <?php echo $this->theme->display('Name'); ?>
                </h4>

                <div>
                    <ul class="theme-info">
                        <li><?php printf(__('By %s', 'redux-framework-demo'), $this->theme->display('Author')); ?></li>
                        <li><?php printf(__('Version %s', 'redux-framework-demo'), $this->theme->display('Version')); ?></li>
                        <li><?php echo '<strong>' . esc_html__('Tags', 'redux-framework-demo') . ':</strong> '; ?><?php printf($this->theme->display('Tags')); ?></li>
                    </ul>
                    <p class="theme-description"><?php echo $this->theme->display('Description'); ?></p>
                    <?php
                    if ($this->theme->parent()) {
                        printf(' <p class="howto">' . esc_html__('This <a href="%1$s">child theme</a> requires its parent theme, %2$s.', 'tatee') . '</p>', esc_html__('http://codex.wordpress.org/Child_Themes', 'redux-framework-demo'), $this->theme->parent()->display('Name'));
                    }
                    ?>

                </div>

            </div>

            <?php
            $item_info = ob_get_contents();

            ob_end_clean();

            $sampleHTML = '';
            if (file_exists(dirname(__FILE__) . '/info-html.html')) {
                /** @global WP_Filesystem_Direct $wp_filesystem  */
                global $wp_filesystem;
                if (empty($wp_filesystem)) {
                    require_once(ABSPATH . '/wp-admin/includes/file.php');
                    WP_Filesystem();
                }
                $sampleHTML = $wp_filesystem->get_contents(dirname(__FILE__) . '/info-html.html');
            }
            
            // ACTUAL DECLARATION OF SECTIONS          
            $this->sections[] = array(
                'title'      => esc_html__( 'Share', 'tatee' ),
                'id'         => 'option_share',
                'icon' => 'el-icon-edit',        
                'fields'     => array(
                    array(
                        'id'       => 'share_blog',
                        'type'     => 'radio',
                        'title'    => __('Show Function Share', 'tatee'), 
                        'subtitle' => __('Please choose your choose', 'tatee'),
                        'options'  => array(
                            '1' => 'Off', 
                            '2' => 'On', 
                        ),
                        'default' => '1'
                    ),

                )
            );
            $this->sections[] = array(
                'icon' => 'el el-car',
                'title'      => esc_html__( 'API Key Google Map', 'tatee' ),
                'id'         => 'api_google_map',
                'icon' => 'el-icon-map-marker',
                'fields'     => array(
                 array(
                    'id'       => 'api_google_map_1',
                    'type'     => 'text',
                    'title'    => esc_html__( 'API Google Map 1', 'tatee' ),
                    'subtitle' => esc_html__( '', 'tatee' ),
                    'desc'     => esc_html__( 'Get by https://console.developers.google.com/', 'tatee' ),
                    'default'  => '',
                ),

             )
            );
             $this->sections[] = array(
                'icon' => ' el-icon-picture',
                'title'      => esc_html__( 'Link Page For Some Page', 'tatee' ),
                'id'         => 'page_option',
                'fields'     => array(
                    array(
                        'id'       => 'option_project',
                        'type'     => 'select',
                        'multi'     => false,
                        'data'      => 'posts',
                        'args'          =>  array( 'post_type' => 'page', 'posts_per_page'=> -1),
                        'title'    => esc_html__( 'Choose Project Page', 'tatee' ),
                        'subtitle' => esc_html__( '', 'tatee' ),
                        'desc'     => esc_html__( 'Link to Project Page', 'tatee' ),
                        'default'  => '',
                    ),
                  

                )
);
            $this->sections[] = array(
                'icon' => 'el el-car',
                'title'      => esc_html__( 'Image Play Button For Video', 'tatee' ),
                'id'         => 'play_button_img',
                'icon' => 'el-icon-play',
                'fields'     => array(
                 array(
                    'id' => 'play_button',
                    'type' => 'media',
                    'url' => true,
                    'title' => esc_html__('Image Play Button For Video', 'tatee'),
                    'compiler' => 'true',
                    'default' => array('url' => get_template_directory_uri().'/images/icon/video.png'),
                    'desc' => esc_html__('Upload Images.Ex: images/icon/video.png', 'tatee'),
                ),

             )
            );
            $this->sections[] = array(
                'icon' => 'el el-car',
                'title'      => esc_html__( 'Header', 'tatee' ),
                'id'         => 'header_option',
                'icon' => 'el-icon-edit',
                'fields'     => array(
                 array(
                    'id'       => 'media_logo',
                    'type'     => 'media',
                    'url' => true,
                    'title'    => __( 'Upload logo BLack', 'tatee' ),
                    'desc'     => __( 'This represents the minimalistic view. It does not have the preview box or the display URL in an input box. ', 'tatee' ),
                    'subtitle' => __( 'Upload Logo ', 'tatee' ),
                    'default' => array('url' => get_template_directory_uri().'/images/icon/logo-black.png'),
                    'hint'     => array(
                        'title'   => 'Test',
                        'content' => 'This is a <b>hint</b> tool-tip for the webFonts field.<br/><br/>Add any HTML based text you like here.',
                    )
                ),
                 array(
                    'id'       => 'media_logo_2',
                    'type'     => 'media',
                    'url' => true,
                    'title'    => __( 'Upload logo White', 'tatee' ),
                    'desc'     => __( 'This represents the minimalistic view. It does not have the preview box or the display URL in an input box. ', 'tatee' ),
                    'subtitle' => __( 'Upload Logo ', 'tatee' ),
                    'default' => array('url' => get_template_directory_uri().'/images/icon/logo-white.png'),
                    'hint'     => array(
                        'title'   => 'Test',
                        'content' => 'This is a <b>hint</b> tool-tip for the webFonts field.<br/><br/>Add any HTML based text you like here.',
                    )
                ),
                 array(
                    'id'       => 'contact',
                    'type'     => 'multi_text',
                    'title'    => esc_html__( 'Link contact', 'tatee' ),
                    'subtitle' => esc_html__( '', 'tatee' ),
                    'desc'     => esc_html__( 'Enter: Link, Class Icon, Type Color Hover(Ex: #, zmdi zmdi-facebook, ic-fb). Note: Class Icon You can find at http://zavoloklom.github.io/material-design-iconic-font/icons.htm. Type Color Hover: You choice from ( ic-fb, ic-insta, ic-twi, ic-pinterest, ic-google )', 'tatee' ),
                    'default'  => '',
                ),
                 array(
                    'id'       => 'header_info_1',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Info 1', 'tatee' ),
                    'subtitle' => esc_html__( '', 'tatee' ),
                    'desc'     => esc_html__( 'EX: Call us : + (898) 784 -7217', 'tatee' ),
                    'default'  => '',
                ),
                 array(
                    'id'       => 'header_info_2',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Info 2', 'tatee' ),
                    'subtitle' => esc_html__( '', 'tatee' ),
                    'desc'     => esc_html__( 'EX: Tatee.architecture@gmail.com', 'tatee' ),
                    'default'  => '',
                ),
             )
            );
            $this->sections[] = array(
                'icon' => 'el el-car',
                'title'      => esc_html__( 'Footer', 'tatee' ),
                'id'         => 'footer_option',
                'icon' => 'el-icon-edit',
                'fields'     => array(
                 array(
                    'id'       => 'footer_logo',
                    'type'     => 'media',
                    'url' => true,
                    'title'    => __( 'Upload logo Black', 'tatee' ),
                    'desc'     => __( 'This represents the minimalistic view. It does not have the preview box or the display URL in an input box. ', 'tatee' ),
                    'subtitle' => __( 'Upload Logo ', 'tatee' ),
                    'default' => array('url' => get_template_directory_uri().'/images/icon/logo-black.png'),
                    'hint'     => array(
                        'title'   => 'Test',
                        'content' => 'This is a <b>hint</b> tool-tip for the webFonts field.<br/><br/>Add any HTML based text you like here.',
                    )
                ),
                 array(
                    'id'       => 'footer_logo_2',
                    'type'     => 'media',
                    'url' => true,
                    'title'    => __( 'Upload logo White', 'tatee' ),
                    'desc'     => __( 'This represents the minimalistic view. It does not have the preview box or the display URL in an input box. ', 'tatee' ),
                    'subtitle' => __( 'Upload Logo ', 'tatee' ),
                    'default' => array('url' => get_template_directory_uri().'/images/icon/logo-white.png'),
                    'hint'     => array(
                        'title'   => 'Test',
                        'content' => 'This is a <b>hint</b> tool-tip for the webFonts field.<br/><br/>Add any HTML based text you like here.',
                    )
                ),
                 array(
                    'id' => 'footer_image_bg',
                    'type' => 'media',
                    'url' => true,
                    'title' => esc_html__('Image Background for Footer.', 'tatee'),
                    'compiler' => 'true',
                    'desc' => esc_html__('Upload Images.', 'tatee'),
                ),
                 array(
                    'id'       => 'footer_contact',
                    'type'     => 'multi_text',
                    'title'    => esc_html__( 'Info contact', 'tatee' ),
                    'subtitle' => esc_html__( '', 'tatee' ),
                    'desc'     => esc_html__( 'Enter: Title| Value(Ex: Address| 991 White St . Dawsonville, GA 30534 , New York)', 'tatee' ),
                    'default'  => '',
                ),
                 array(
                    'id'       => 'footer_link',
                    'type'     => 'multi_text',
                    'title'    => esc_html__( 'Link page introduce', 'tatee' ),
                    'subtitle' => esc_html__( '', 'tatee' ),
                    'desc'     => esc_html__( 'Enter: Name Page, Link(Ex: About Us, # )', 'tatee' ),
                    'default'  => '',
                ),
                 array(
                    'id'       => 'footer_social',
                    'type'     => 'multi_text',
                    'title'    => esc_html__( 'Link social', 'tatee' ),
                    'subtitle' => esc_html__( '', 'tatee' ),
                    'desc'     => esc_html__( 'Enter: Link, Class Icon, Type Color Hover(Ex: #, zmdi zmdi-facebook, ic-fb). Note: Class Icon You can find at http://zavoloklom.github.io/material-design-iconic-font/icons.htm. Type Color Hover: You choice from ( ic-fb, ic-insta, ic-twi, ic-pinterest, ic-google )', 'tatee' ),
                    'default'  => '',
                ),

                 array(
                    'id'       => 'footer_content_1',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Content 1', 'tatee' ),
                    'subtitle' => esc_html__( '', 'tatee' ),
                    'desc'     => esc_html__( 'EX:  Designed by Authemes', 'tatee' ),
                    'default'  => '',
                ),
                 array(
                    'id'       => 'footer_content_2',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Content 2', 'tatee' ),
                    'subtitle' => esc_html__( '', 'tatee' ),
                    'desc'     => esc_html__( 'EX: © 2018 TATEE . All rights reserved', 'tatee' ),
                    'default'  => '',
                ),

             )
);
$this->sections[] = array(
    'icon' => 'el el-car',
    'title'      => esc_html__( 'Content Copyright', 'tatee' ),
    'id'         => 'content_copyright',
    'icon' => 'el-icon-edit',
    'fields'     => array(
     array(
        'id'       => 'footer_copyright',
        'type'     => 'text',
        'title'    => esc_html__( 'Content Copyright', 'tatee' ),
        'subtitle' => esc_html__( '', 'tatee' ),
        'desc'     => esc_html__( 'Enter on Copyright.EX: © 2018 TATEE . Designed by Authemes', 'tatee' ),
        'default'  => '',
    ),

 )
);
            $this->sections[] = array(
                'icon' => 'el-icon-website',
                'title' => esc_html__('Styling Options', 'tatee'),
                'fields' => array(
                    
                    array(
                        'id' => 'body-font',
                        'type' => 'typography',
                        'output' => array('body'),
                        'title' => esc_html__('Body Font', 'tatee'),
                        'subtitle' => esc_html__('Specify the body font properties.', 'tatee'),
                        'line-height'   => false,
                        'google' => true,
                        'default' => array(
                            'color' => '#000',
                            'font-size' => '12px',
                            'font-family' => "",
                        ),
                    ),
                     array(
                        'id' => 'custom-css',
                        'type' => 'ace_editor',
                        'title' => esc_html__('CSS Code', 'tatee'),
                        'subtitle' => esc_html__('Paste your CSS code here.', 'tatee'),
                        'mode' => 'css',
                        'theme' => 'monokai',
                        'desc' => 'Possible modes can be found at <a href="http://ace.c9.io" target="_blank">http://ace.c9.io/</a>.',
                        'default' => ""
                    ),
                
            ) );


}

public function setHelpTabs() {

            // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
    $this->args['help_tabs'][] = array(
        'id' => 'redux-opts-1',
        'title' => esc_html__('Theme Information 1', 'tatee'),
        'content' => esc_html__('<p>This is the tab content, HTML is allowed.</p>', 'tatee')
    );

    $this->args['help_tabs'][] = array(
        'id' => 'redux-opts-2',
        'title' => esc_html__('Theme Information 2', 'tatee'),
        'content' => esc_html__('<p>This is the tab content, HTML is allowed.</p>', 'tatee')
    );

            // Set the help sidebar
    $this->args['help_sidebar'] = esc_html__('<p>This is the sidebar content, HTML is allowed.</p>', 'tatee');
}

public function setArguments() {

            $theme = wp_get_theme(); // For use with some settings. Not necessary.

            $this->args = array(
                // TYPICAL -> Change these values as you need/desire
                'opt_name' => 'tatee_option', // This is where your data is stored in the database and also becomes your global variable name.
                'display_name' => $theme->get('Name'), // Name that appears at the top of your panel
                'display_version' => $theme->get('Version'), // Version that appears at the top of your panel
                'menu_type' => 'menu', //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                'allow_sub_menu' => true, // Show the sections below the admin menu item or not
                'menu_title' => esc_html__('Tatee Options', 'tatee'),
                'page' => esc_html__('Tatee Options', 'tatee'),
                // You will need to generate a Google API key to use this feature.
                // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                'google_api_key' => 'AIzaSyBM9vxebWLN3bq4Urobnr6tEtn7zM06rEw', // Must be defined to add google fonts to the typography module
                //'admin_bar' => false, // Show the panel pages on the admin bar
                'global_variable' => '', // Set a different name for your global variable other than the opt_name
                'dev_mode' => true, // Show the time the page took to load, etc
                'customizer' => true, // Enable basic customizer support
                // OPTIONAL -> Give you extra features
                'page_priority' => null, // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                'page_parent' => 'themes.php', // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                'page_permissions' => 'manage_options', // Permissions needed to access the options panel.
                'menu_icon' => '', // Specify a custom URL to an icon
                'last_tab' => '', // Force your panel to always open to a specific tab (by id)
                'page_icon' => 'icon-themes', // Icon displayed in the admin panel next to your menu_title
                'page_slug' => '_options', // Page slug used to denote the panel
                'save_defaults' => true, // On load save the defaults to DB before user clicks save or not
                'default_show' => false, // If true, shows the default value next to each field that is not the default value.
                'default_mark' => '', // What to print by the field's title if the value shown is default. Suggested: *
                // CAREFUL -> These options are for advanced use only
                'transient_time' => 60 * MINUTE_IN_SECONDS,
                'output' => true, // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                'output_tag' => true, // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                //'domain'              => 'redux-framework', // Translation domain key. Don't change this unless you want to retranslate all of Redux.
                //'footer_credit'       => '', // Disable the footer credit of Redux. Please leave if you can help it.
                // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                'database' => '', // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                'show_import_export' => true, // REMOVE
                'system_info' => false, // REMOVE
                'help_tabs' => array(),
                'help_sidebar' => '', // esc_html__( '', $this->args['domain'] );            
            );


            // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.     
            $this->args['share_icons'][] = array(
                'url' => 'https://github.com/ReduxFramework/ReduxFramework',
                'title' => 'Visit us on GitHub',
                'icon' => 'el-icon-github'
                    // 'img' => '', // You can use icon OR img. IMG needs to be a full URL.
            );
            $this->args['share_icons'][] = array(
                'url' => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
                'title' => 'Like us on Facebook',
                'icon' => 'el-icon-facebook'
            );
            $this->args['share_icons'][] = array(
                'url' => 'http://twitter.com/reduxframework',
                'title' => 'Follow us on Twitter',
                'icon' => 'el-icon-twitter'
            );
            $this->args['share_icons'][] = array(
                'url' => 'http://www.linkedin.com/company/redux-framework',
                'title' => 'Find us on LinkedIn',
                'icon' => 'el-icon-linkedin'
            );



            // Panel Intro text -> before the form
            if (!isset($this->args['global_variable']) || $this->args['global_variable'] !== false) {
                if (!empty($this->args['global_variable'])) {
                    $v = $this->args['global_variable'];
                } else {
                    $v = str_replace("-", "_", $this->args['opt_name']);
                }
                $this->args['intro_text'] = sprintf(__('<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'tatee'), $v);
            } else {
                $this->args['intro_text'] = esc_html__('<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'tatee');
            }

            // Add content after the form.
            $this->args['footer_text'] = esc_html__('<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'tatee');
        }

    }

    new Redux_Framework_sample_config();
}


if (!function_exists('redux_my_custom_field')):

    function redux_my_custom_field($field, $value) {
        print_r($field);
        print_r($value);
    }

endif;

if (!function_exists('redux_validate_callback_function')):

    function redux_validate_callback_function($field, $value, $existing_value) {
        $error = false;
        $value = 'just testing';
        /*
          do your validation

          if(something) {
          $value = $value;
          } elseif(something else) {
          $error = true;
          $value = $existing_value;
          $field['msg'] = 'your custom error message';
          }
         */

          $return['value'] = $value;
          if ($error == true) {
            $return['error'] = $field;
        }
        return $return;
    }


endif;
