<?php
/**
 * Custom CSS and JS
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * CustomCSSandJS_Admin
 */
class CustomCSSandJS_Admin {

    /**
     * Default options for a new page
     */
    private $default_options = array(
        'type'  => 'header',
        'linking'   => 'internal',
        'side'      => 'frontend',
        'priority'  => 5,
        'language'  => 'css',
    );

    /**
     * Array with the options for a specific custom-css-js post
     */
    private $options = array();

    /**
     * Constructor
     */
    public function __construct() {

        $this->add_functions();
    }

    /**
     * Add actions and filters
     */
    function add_functions() {

        // Add filters
        $filters = array(
            'manage_custom-css-js_posts_columns' => 'manage_custom_posts_columns',
        );
        foreach( $filters as $_key => $_value ) {
            add_filter( $_key, array( $this, $_value ) );
        }

        // Add actions
        $actions = array(
            'admin_menu'                => 'admin_menu',
            'admin_enqueue_scripts'     => 'admin_enqueue_scripts',
            'current_screen'            => 'current_screen',
            'admin_notices'             => 'create_uploads_directory',
            'edit_form_after_title'     => 'codemirror_editor',
            'add_meta_boxes'            => 'add_meta_boxes',
            'save_post'                 => 'options_save_meta_box_data',
            'trashed_post'              => 'trash_post',
            'untrashed_post'            => 'trash_post',
            'wp_loaded'                 => 'compatibility_shortcoder',
            'wp_ajax_ccj_active_code'   => 'wp_ajax_ccj_active_code',
            'post_submitbox_start'      => 'post_submitbox_start',
        );
        foreach( $actions as $_key => $_value ) {
            add_action( $_key, array( $this, $_value ) );
        }


        // Add some custom actions/filters
        add_action( 'manage_custom-css-js_posts_custom_column', array( $this, 'manage_posts_columns' ), 10, 2 );
        add_filter( 'post_row_actions', array( $this, 'post_row_actions' ), 10, 2 );
    }


    /**
     * Add submenu pages
     */
    function admin_menu() {
        $menu_slug = 'edit.php?post_type=custom-css-js';
        $submenu_slug = 'post-new.php?post_type=custom-css-js';

        remove_submenu_page( $menu_slug, $submenu_slug);

        $title = __('Add Custom CSS', 'custom-css-js');
        add_submenu_page( $menu_slug, $title, $title, 'publish_custom_csss', $submenu_slug .'&language=css');

        $title = __('Add Custom JS', 'custom-css-js');
        add_submenu_page( $menu_slug, $title, $title, 'publish_custom_csss', $submenu_slug . '&language=js');

        $title = __('Add Custom HTML', 'custom-css-js');
        add_submenu_page( $menu_slug, $title, $title, 'publish_custom_csss', $submenu_slug . '&language=html');

    }


    /**
     * Enqueue the scripts and styles
     */
    public function admin_enqueue_scripts( $hook ) {

        $screen = get_current_screen();

        // Only for custom-css-js post type
        if ( $screen->post_type != 'custom-css-js' )
            return false;

        // Some handy variables
        $a = plugins_url( '/', CCJ_PLUGIN_FILE). 'assets';
        $cm = $a . '/codemirror';
        $v = CCJ_VERSION;

        wp_register_script( 'ccj-admin', $a . '/ccj_admin.js', array('jquery', 'jquery-ui-resizable'), $v, false );
        wp_localize_script( 'ccj-admin', 'CCJ', $this->cm_localize() );
        wp_enqueue_script( 'ccj-admin' );
        wp_enqueue_style( 'ccj-admin', $a . '/ccj_admin.css', array(), $v );


        // Only for the new/edit Code's page
        if ( $hook == 'post-new.php' || $hook == 'post.php' ) {
            wp_enqueue_style( 'jquery-ui', 'https://code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css', array(), $v );
            wp_enqueue_script( 'ccj-codemirror', $cm . '/lib/codemirror.js', array( 'jquery' ), $v, false);
            wp_enqueue_style( 'ccj-codemirror', $cm . '/lib/codemirror.css', array(), $v );
            wp_enqueue_script( 'ccj-admin_url_rules', $a . '/ccj_admin-url_rules.js', array('jquery'), $v, false );
            wp_enqueue_script( 'ccj-scrollbars', $cm . '/addon/scroll/simplescrollbars.js', array('ccj-codemirror'), $v, false );
            wp_enqueue_style( 'ccj-scrollbars', $cm . '/addon/scroll/simplescrollbars.css', array(), $v );

            // Add the language modes
            $cmm = $cm . '/mode/';
            wp_enqueue_script('cm-xml', $cmm . 'xml/xml.js',               array('ccj-codemirror'), $v, false);
            wp_enqueue_script('cm-js', $cmm . 'javascript/javascript.js',  array('ccj-codemirror'), $v, false);
            wp_enqueue_script('cm-css', $cmm . 'css/css.js',               array('ccj-codemirror'), $v, false);
            wp_enqueue_script('cm-htmlmixed', $cmm . 'htmlmixed/htmlmixed.js', array('ccj-codemirror'), $v, false);

            $cma = $cm . '/addon/';
            wp_enqueue_script('cm-dialog', $cma . 'dialog/dialog.js', array('ccj-codemirror'), $v, false);
            wp_enqueue_script('cm-search', $cma . 'search/search.js', array('ccj-codemirror'), $v, false);
            wp_enqueue_script('cm-searchcursor', $cma . 'search/searchcursor.js',array('ccj-codemirror'), $v, false);
            wp_enqueue_script('cm-jump-to-line', $cma . 'search/jump-to-line.js', array('ccj-codemirror'), $v, false);
            wp_enqueue_style('cm-dialog', $cma . 'dialog/dialog.css', array(), $v );

            // remove the assets from other plugins so it doesn't interfere with CodeMirror
            global $wp_scripts;
            if (is_array($wp_scripts->registered) && count($wp_scripts->registered) != 0) {
              foreach($wp_scripts->registered as $_key => $_value) {
                if (!isset($_value->src)) continue;

                if (strstr($_value->src, 'wp-content/plugins') !== false && strstr($_value->src, 'plugins/custom-css-js/assets') === false) {
                  unset($wp_scripts->registered[$_key]);
                }
              }
            }

        }
    }


    /**
     * Send variables to the ccj_admin.js script
     */
    public function cm_localize() {

        $vars = array(
            'scroll' => '1',
            'active' => __('Active', 'custom-css-js'),
            'inactive' => __('Inactive', 'custom-css-js'),
            'activate' => __('Activate', 'custom-css-js'),
            'deactivate' => __('Deactivate', 'custom-css-js'),
            'active_title' => __('The code is active. Click to deactivate it', 'custom-css-js'),
            'deactive_title' => __('The code is inactive. Click to activate it', 'custom-css-js'),
        );

        if ( ! function_exists( 'is_plugin_active' ) ) {
            require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
        }

        // Plugins which conflict with the CodeMirror editor
        $conflicting_plugins = array(
            'types/wpcf.php',
            'advanced-ads-code-highlighter/advanced-ads-code-highlighter.php',
            'wp-custom-backend-css/wp-custom-backend-css.php',
            'custom-css-whole-site-and-per-post/h5ab-custom-styling.php',
            'html-editor-syntax-highlighter/html-editor-syntax-highlighter.php',
        );

        foreach( $conflicting_plugins as $_plugin ) {
            if ( is_plugin_active( $_plugin ) ) {
                $vars['scroll'] = '0';
            }
        }

        return $vars;
    }

    public function add_meta_boxes() {
        add_meta_box('custom-code-options', __('Options', 'custom-css-js'), array( $this, 'custom_code_options_meta_box_callback'), 'custom-css-js', 'side', 'low');

        remove_meta_box( 'slugdiv', 'custom-css-js', 'normal' );
    }



    /**
     * Get options for a specific custom-css-js post
     */
    private function get_options( $post_id ) {
        if ( isset( $this->options[ $post_id ] ) ) {
            return $this->options[ $post_id ];
        }

        $options = get_post_meta( $post_id );
        if ( empty( $options ) || ! isset ( $options['options'][0] ) ) {
            $this->options[ $post_id ] = $this->default_options;
            return $this->default_options;
        }

        $options = unserialize( $options['options'][0] );
        $this->options[ $post_id ] = $options;
        return $options;
    }


    /**
     * Reformat the `edit` or the `post` screens
     */
    function current_screen( $current_screen ) {

        if ( $current_screen->post_type != 'custom-css-js' ) {
            return false;
        }

        if ( $current_screen->base == 'post' ) {
            add_action( 'admin_head', array( $this, 'current_screen_post' ) );
        }

        if ( $current_screen->base == 'edit' ) {
            add_action( 'admin_head', array( $this, 'current_screen_edit' ) );
        }

        wp_deregister_script( 'autosave' );
    }



    /**
     * Add the buttons in the `edit` screen
     */
    function add_new_buttons() {
        $current_screen = get_current_screen();

        if ( (isset($current_screen->action ) && $current_screen->action == 'add') || $current_screen->post_type != 'custom-css-js' ) {
            return false;
        }
?>
    <div class="updated buttons">
    <a href="post-new.php?post_type=custom-css-js&language=css" class="custom-btn custom-css-btn"><?php _e('Add CSS code', 'custom-css-js'); ?></a>
    <a href="post-new.php?post_type=custom-css-js&language=js" class="custom-btn custom-js-btn"><?php _e('Add JS code', 'custom-css-js'); ?></a>
    <a href="post-new.php?post_type=custom-css-js&language=html" class="custom-btn custom-js-btn"><?php _e('Add HTML code', 'custom-css-js'); ?></a>
        <!-- a href="post-new.php?post_type=custom-css-js&language=php" class="custom-btn custom-php-btn">Add PHP code</a -->
    </div>
<?php
    }



    /**
     * Add new columns in the `edit` screen
     */
    function manage_custom_posts_columns( $columns ) {
        return array(
            'cb'        => '<input type="checkbox" />',
            'active'    => '<span class="ccj-dashicons dashicons dashicons-star-empty" title="'.__('Active', 'custom-css-js') .'"></span>',
            'type'      => __('Type', 'custom-css-js'),
            'title'     => __('Title', 'custom-css-js'),
            'author'    => __('Author', 'custom-css-js'),
            'date'      => __('Date', 'custom-css-js'),
            'modified'  => __('Modified', 'custom-css-js'),
        );
    }


    /**
     * Fill the data for the new added columns in the `edit` screen
     */
    function manage_posts_columns( $column, $post_id ) {

        if ( $column == 'type' ) {
            $options = $this->get_options( $post_id );
            echo '<span class="language language-'.$options['language'].'">' . $options['language'] . '</span>';
        }

        if ( $column == 'modified' ) {
            if ( ! isset( $wp_version ) ) {
                include( ABSPATH . WPINC . '/version.php' );
            }

            if ( version_compare( $wp_version, '4.6', '>=' ) ) {
                $m_time = get_the_modified_time( 'G', $post_id );
            } else {
                $m_time = get_the_modified_time( 'G', false, $post_id );
            }

            $time_diff = time() - $m_time;

            if ( $time_diff > 0 && $time_diff < DAY_IN_SECONDS ) {
                $h_time = sprintf( __( '%s ago' ), human_time_diff( $m_time ) );
            } else {
                $h_time = mysql2date( __( 'Y/m/d' ), $m_time );
            }

            echo $h_time;
        }

        if ( $column == 'active' ) {
            $url = wp_nonce_url( admin_url( 'admin-ajax.php?action=ccj_active_code&code_id=' . $post_id ), 'ccj-active-code-' .$post_id );
            if ( $this->is_active( $post_id ) ) {
                $active_title = __('The code is active. Click to deactivate it', 'custom-css-js');
                $active_icon = 'dashicons-star-filled';
            } else {
                $active_title = __('The code is inactive. Click to activate it', 'custom-css-js');
                $active_icon = 'dashicons-star-empty ccj_row';
            }
            echo '<a href="' . esc_url( $url ) . '" class="ccj_activate_deactivate" data-code-id="'.$post_id.'" title="'.$active_title . '">' .
                '<span class="dashicons '.$active_icon.'"></span>'.
                '</a>';
        }
    }

    /**
     * Activate/deactivate a code
     *
     * @return void
     */
    function wp_ajax_ccj_active_code() {
        if ( ! isset( $_GET['code_id'] ) ) die();

        $code_id = absint( $_GET['code_id'] );

        $response = 'error';
		if ( check_admin_referer( 'ccj-active-code-' . $code_id) ) {

			if ( 'custom-css-js' === get_post_type( $code_id ) ) {
                $active = get_post_meta($code_id, '_active', true );
                if ( $active === false || $active === '' ) {
                    $active = 'yes';
                }
                $response = $active;
				update_post_meta( $code_id, '_active', $active === 'yes' ? 'no' : 'yes' );

                $this->build_search_tree();
			}
		}
        echo $response;

		die();
    }

    /**
     * Check if a code is active
     *
     * @return bool
     */
    function is_active( $post_id ) {
        return get_post_meta( $post_id, '_active', true ) !== 'no';
    }

    /**
     * Reformat the `edit` screen
     */
    function current_screen_edit() {
        ?>
        <script type="text/javascript">
             /* <![CDATA[ */
            jQuery(window).ready(function($){
                var h1 = '<?php _e('Custom Code', 'custom-css-js'); ?> ';
                h1 += '<a href="post-new.php?post_type=custom-css-js&language=css" class="page-title-action"><?php _e('Add CSS Code', 'custom-css-js'); ?></a>';
                h1 += '<a href="post-new.php?post_type=custom-css-js&language=js" class="page-title-action"><?php _e('Add JS Code', 'custom-css-js'); ?></a>';
                h1 += '<a href="post-new.php?post_type=custom-css-js&language=html" class="page-title-action"><?php _e('Add HTML Code', 'custom-css-js'); ?></a>';
                $("#wpbody-content h1").html(h1);
            });

        </script>
        <?php
    }


    /**
     * Reformat the `post` screen
     */
    function current_screen_post() {

        $this->remove_unallowed_metaboxes();

        $strings = array(
            'Add CSS Code' => __('Add CSS Code', 'custom-css-js'),
            'Add JS Code' => __('Add JS Code', 'custom-css-js'),
            'Add HTML Code' => __('Add HTML Code', 'custom-css-js'),
            'Edit CSS Code' => __('Edit CSS Code', 'custom-css-js'),
            'Edit JS Code' => __('Edit JS Code', 'custom-css-js'),
            'Edit HTML Code' => __('Edit HTML Code', 'custom-css-js'),
        );

        if ( isset( $_GET['post'] ) ) {
            $action = 'Edit';
            $post_id = esc_attr($_GET['post']);
        } else {
            $action = 'Add';
            $post_id = false;
        }
        $language = $this->get_language($post_id);

        $title = $action . ' ' . strtoupper( $language ) . ' Code';
        $title = (isset($strings[$title])) ? $strings[$title] : $strings['Add CSS Code'];

        if ( $action == 'Edit' ) {
            $title .= ' <a href="post-new.php?post_type=custom-css-js&language=css" class="page-title-action">'.__('Add CSS Code', 'custom-css-js') .'</a> ';
            $title .= '<a href="post-new.php?post_type=custom-css-js&language=js" class="page-title-action">'.__('Add JS Code', 'custom-css-js') .'</a>';
            $title .= '<a href="post-new.php?post_type=custom-css-js&language=html" class="page-title-action">'.__('Add HTML Code', 'custom-css-js') .'</a>';
        }

        ?>
        <script type="text/javascript">
             /* <![CDATA[ */
            jQuery(window).ready(function($){
                $("#wpbody-content h1").html('<?php echo $title; ?>');
                $("#message.updated.notice").html('<p><?php _e('Code updated', 'custom-css-js'); ?></p>');

                var from_top = -$("#normal-sortables").height();
                if ( from_top != 0 ) {
                    $(".ccj_only_premium-first").css('margin-top', from_top.toString() + 'px' );
                } else {
                    $(".ccj_only_premium-first").hide();
                }

                /*
                $("#normal-sortables").mouseenter(function() {
                    $(".ccj_only_premium-first div").css('display', 'block');
                }).mouseleave(function() {
                    $(".ccj_only_premium-first div").css('display', 'none');
                });
                */
            });
            /* ]]> */
        </script>
        <?php
    }


    /**
     * Remove unallowed metaboxes from custom-css-js edit page
     *
     * Use the custom-css-js-meta-boxes filter to add/remove allowed metaboxdes on the page
     */
    function remove_unallowed_metaboxes() {
        global $wp_meta_boxes;

        // Side boxes
        $allowed = array( 'submitdiv', 'custom-code-options' );

        $allowed = apply_filters( 'custom-css-js-meta-boxes', $allowed );

        foreach( $wp_meta_boxes['custom-css-js']['side'] as $_priority => $_boxes ) {
            foreach( $_boxes as $_key => $_value ) {
            if ( ! in_array( $_key, $allowed ) ) {
                unset( $wp_meta_boxes['custom-css-js']['side'][$_priority][$_key] );
            }
            }
        }

        // Normal boxes
        $allowed = array( 'slugdiv', 'previewdiv', 'url-rules', 'revisionsdiv' );

        $allowed = apply_filters( 'custom-css-js-meta-boxes-normal', $allowed );

        foreach( $wp_meta_boxes['custom-css-js']['normal'] as $_priority => $_boxes ) {
            foreach( $_boxes as $_key => $_value ) {
            if ( ! in_array( $_key, $allowed ) ) {
                unset( $wp_meta_boxes['custom-css-js']['normal'][$_priority][$_key] );
            }
            }
        }


        unset($wp_meta_boxes['custom-css-js']['advanced']);
    }



    /**
     * Add the codemirror editor in the `post` screen
     */
    public function codemirror_editor( $post ) {
        $current_screen = get_current_screen();

        if ( $current_screen->post_type != 'custom-css-js' ) {
            return false;
        }

        if ( empty( $post->title ) && empty( $post->post_content ) ) {
            $new_post = true;
            $post_id = false;
        } else {
            $new_post = false;
            if ( ! isset( $_GET['post'] ) ) $_GET['post'] = $post->id;
            $post_id = esc_attr($_GET['post']);
        }
        $language = $this->get_language($post_id);

        switch ( $language ) {
            case 'js' :
                if ( $new_post ) {
                    $post->post_content = __('/* Add your JavaScript code here.

If you are using the jQuery library, then don\'t forget to wrap your code inside jQuery.ready() as follows:

jQuery(document).ready(function( $ ){
    // Your code in here
});

--

If you want to link a JavaScript file that resides on another server (similar to
<script src="https://example.com/your-js-file.js"></script>), then please use
the "Add HTML Code" page, as this is a HTML code that links a JavaScript file.

End of comment */ ', 'custom-css-js') . PHP_EOL . PHP_EOL;
                }
                $code_mirror_mode = 'text/javascript';
                $code_mirror_before = '<script type="text/javascript">';
                $code_mirror_after = '</script>';
                break;
            case 'html' :
                if ( $new_post ) {
                    $post->post_content = __('<!-- Add HTML code to the header or the footer.

For example, you can use the following code for loading the jQuery library from Google CDN:
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

or the following one for loading the Bootstrap library from MaxCDN:
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

-- End of the comment --> ', 'custom-css-js') . PHP_EOL . PHP_EOL;
                }
                $code_mirror_mode = 'html';
                $code_mirror_before = '';
                $code_mirror_after = '';
                break;

            case 'php' :
                if ( $new_post ) {
                    $post->post_content = '/* The following will be executed as if it were written in functions.php. */' . PHP_EOL . PHP_EOL;
                }
                $code_mirror_mode = 'php';
                $code_mirror_before = '<?php';
                $code_mirror_after = '?>';

                break;
            default :
                if ( $new_post ) {
                    $post->post_content = __('/* Add your CSS code here.

For example:
.example {
    color: red;
}

For brushing up on your CSS knowledge, check out http://www.w3schools.com/css/css_syntax.asp

End of comment */ ', 'custom-css-js') . PHP_EOL . PHP_EOL;

                }
                $code_mirror_mode = 'text/css';
                $code_mirror_before = '<style type="text/css">';
                $code_mirror_after = '</style>';

        }

            ?>
              <form style="position: relative; margin-top: .5em;">

                <div class="code-mirror-before"><div><?php echo htmlentities( $code_mirror_before );?></div></div>
                <textarea class="wp-editor-area" id="content" mode="<?php echo htmlentities($code_mirror_mode); ?>" name="content"><?php echo $post->post_content; ?></textarea>
                <div class="code-mirror-after"><div><?php echo htmlentities( $code_mirror_after );?></div></div>

                <table id="post-status-info"><tbody><tr>
                    <td class="autosave-info">
                    <span class="autosave-message">&nbsp;</span>
                <?php
                    if ( 'auto-draft' != $post->post_status ) {
                        echo '<span id="last-edit">';
                    if ( $last_user = get_userdata( get_post_meta( $post->ID, '_edit_last', true ) ) ) {
                        printf(__('Last edited by %1$s on %2$s at %3$s', 'custom-css-js-pro'), esc_html( $last_user->display_name ), mysql2date(get_option('date_format'), $post->post_modified), mysql2date(get_option('time_format'), $post->post_modified));
                    } else {
                        printf(__('Last edited on %1$s at %2$s', 'custom-css-js-pro'), mysql2date(get_option('date_format'),      $post->post_modified), mysql2date(get_option('time_format'), $post->post_modified));
                    }
                    echo '</span>';
                } ?>
                    </td>
                </tr></tbody></table>


                <input type="hidden" id="update-post_<?php echo $post->ID ?>" value="<?php echo wp_create_nonce('update-post_'. $post->ID ); ?>" />
              </form>
    <?php

    }



    /**
     * Show the options form in the `post` screen
     */
    function custom_code_options_meta_box_callback( $post ) {

            $options = $this->get_options( $post->ID );
            if ( ! isset($options['preprocessor'] ) )
                $options['preprocessor'] = 'none';


            if ( isset( $_GET['language'] ) ) {
                $options['language'] = $this->get_language();
            }

            $meta = $this->get_options_meta();
            if ( $options['language'] == 'html' ) {
                $meta = $this->get_options_meta_html();
            }


            wp_nonce_field( 'options_save_meta_box_data', 'custom-css-js_meta_box_nonce' );

            ?>
            <div class="options_meta_box">
            <?php

            $output = '';

            foreach( $meta as $_key => $a ) {
                $close_div = false;

                if ( ($_key == 'preprocessor' && $options['language'] == 'css') ||
                    ($_key == 'linking' && $options['language'] == 'html') ||
                    $_key == 'priority' ||
                    $_key == 'minify' ) {
                    $close_div = true;
                    $output .= '<div class="ccj_opaque">';
                }

                // Don't show Pre-processors for JavaScript Codes
                if ( $options['language'] == 'js' && $_key == 'preprocessor' ) {
                    continue;
                }

                $output .= '<h3>' . $a['title'] . '</h3>' . PHP_EOL;

                $output .= $this->render_input( $_key, $a, $options );

                if ( $close_div ) {
                    $output .= '</div>';
                }

            }

            echo $output;

            ?>

            <input type="hidden" name="custom_code_language" value="<?php echo $options['language']; ?>" />

            <div style="clear: both;"></div>

            </div>

            <div class="ccj_only_premium ccj_only_premium-right">
                <div>
                <a href="https://www.silkypress.com/simple-custom-css-js-pro/?utm_source=wordpress&utm_campaign=ccj_free&utm_medium=banner" target="_blank"><?php _e('Available only in <br />Simple Custom CSS and JS Pro', 'custom-css-js'); ?></a>
                </div>
            </div>


            <?php
    }


    /**
     * Get an array with all the information for building the code's options
     */
    function get_options_meta() {
        $options = array(
            'linking' => array(
                'title' => __('Linking type', 'custom-css-js'),
                'type' => 'radio',
                'default' => 'internal',
                'values' => array(
                    'external' => array(
                        'title' => __('External File', 'custom-css-js'),
                        'dashicon' => 'media-code',
                    ),
                    'internal' => array(
                        'title' => __('Internal', 'custom-css-js'),
                        'dashicon' => 'editor-alignleft',
                    ),
                ),
            ),
            'type' => array(
                'title' => __('Where on page', 'custom-css-js'),
                'type' => 'radio',
                'default' => 'header',
                'values' => array(
                    'header' => array(
                        'title' => __('Header', 'custom-css-js'),
                        'dashicon' => 'arrow-up-alt2',
                    ),
                    'footer' => array(
                        'title' => __('Footer', 'custom-css-js'),
                        'dashicon' => 'arrow-down-alt2',
                    ),
                ),
            ),
            'side' => array(
                'title' => __('Where in site', 'custom-css-js'),
                'type' => 'radio',
                'default' => 'frontend',
                'values' => array(
                    'frontend' => array(
                        'title' => __('In Frontend', 'custom-css-js'),
                        'dashicon' => 'tagcloud',
                    ),
                    'admin' => array(
                        'title' => __('In Admin', 'custom-css-js'),
                        'dashicon' => 'id',
                    ),
                    'login' => array(
                        'title' => __('On Login Page', 'custom-css-js'),
                        'dashicon' => 'admin-network',
                    ),
                ),
            ),
            'preprocessor' => array(
                'title' => __('CSS Preprocessor', 'custom-css-js'),
                'type' => 'radio',
                'default' => 'none',
                'values' => array(
                    'none' => array(
                        'title' => __('None', 'custom-css-js'),
                    ),
                    'less' => array(
                        'title' => __('Less', 'custom-css-js'),
                    ),
                    'sass' => array(
                        'title' => __('SASS (only SCSS syntax)', 'custom-css-js'),
                    ),
                ),
                'disabled' => true,
            ),
            'minify' => array(
                'title' => __('Minify the code', 'custom-css-js'),
                'type' => 'checkbox',
                'default' => false,
                'dashicon' => 'editor-contract',
                'disabled' => true,
            ),
            'priority' => array(
                'title' => __('Priority', 'custom-css-js'),
                'type' => 'select',
                'default' => 5,
                'dashicon' => 'sort',
                'values' => array(
                    1 => _x('1 (highest)', '1 is the highest priority', 'custom-css-js'),
                    2 => '2',
                    3 => '3',
                    4 => '4',
                    5 => '5',
                    6 => '6',
                    7 => '7',
                    8 => '8',
                    9 => '9',
                    10 => _x('10 (lowest)', '10 is the lowest priority', 'custom-css-js'),
                ),
                'disabled' => true,
            ),
        );

        return $options;
    }


    /**
     * Get an array with all the information for building the code's options
     */
    function get_options_meta_html() {
        $options = array(
            'type' => array(
                'title' => __('Where on page', 'custom-css-js'),
                'type' => 'radio',
                'default' => 'header',
                'values' => array(
                    'header' => array(
                        'title' => __('Header', 'custom-css-js'),
                        'dashicon' => 'arrow-up-alt2',
                    ),
                    'footer' => array(
                        'title' => __('Footer', 'custom-css-js'),
                        'dashicon' => 'arrow-down-alt2',
                    ),
                ),
            ),
            'side' => array(
                'title' => __('Where in site', 'custom-css-js'),
                'type' => 'radio',
                'default' => 'frontend',
                'values' => array(
                    'frontend' => array(
                        'title' => __('In Frontend', 'custom-css-js'),
                        'dashicon' => 'tagcloud',
                    ),
                    'admin' => array(
                        'title' => __('In Admin', 'custom-css-js'),
                        'dashicon' => 'id',
                    ),
                ),
            ),
            'linking' => array(
                'title' => __('On which device', 'custom-css-js'),
                'type' => 'radio',
                'default' => 'both',
                'dashicon' => '',
                'values' => array(
                    'desktop' => array(
                        'title' => __('Desktop', 'custom-css-js'),
                        'dashicon' => 'desktop',
                    ),
                    'mobile' => array(
                        'title' => __('Mobile', 'custom-css-js'),
                        'dashicon' => 'smartphone',
                    ),
                    'both' => array(
                        'title' => __('Both', 'custom-css-js'),
                        'dashicon' => 'tablet',
                    ),
                ),
                'disabled' => true,
            ),
            'priority' => array(
                'title' => __('Priority', 'custom-css-js'),
                'type' => 'select',
                'default' => 5,
                'dashicon' => 'sort',
                'values' => array(
                    1 => _x('1 (highest)', '1 is the highest priority', 'custom-css-js'),
                    2 => '2',
                    3 => '3',
                    4 => '4',
                    5 => '5',
                    6 => '6',
                    7 => '7',
                    8 => '8',
                    9 => '9',
                    10 => _x('10 (lowest)', '10 is the lowest priority', 'custom-css-js'),
                ),
                'disabled' => true,
            ),

        );

        return $options;
    }


    /**
     * Save the post and the metadata
     */
    function options_save_meta_box_data( $post_id ) {

        // The usual checks
        if ( ! isset( $_POST['custom-css-js_meta_box_nonce'] ) ) {
            return;
        }

        if ( ! wp_verify_nonce( $_POST['custom-css-js_meta_box_nonce'], 'options_save_meta_box_data' ) ) {
            return;
        }

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }

        if ( isset( $_POST['post_type'] ) && 'custom-css-js' != $_POST['post_type'] ) {
            return;
        }

        // Update the post's meta
        $defaults = array(
            'type'  => 'header',
            'linking'   => 'internal',
            'priority'  => 5,
            'side'  => 'frontend',
            'language' => 'css',
        );

        if ( $_POST['custom_code_language'] == 'html' ) {
            $defaults = array(
                'type'  => 'header',
                'linking'   => 'both',
                'side'  => 'frontend',
                'language' => 'html',
                'priority'  => 5,
            );
        }

        foreach( $defaults as $_field => $_default ) {
            $options[ $_field ] = isset( $_POST['custom_code_'.$_field] ) ? esc_attr($_POST['custom_code_'.$_field]) : $_default;
        }

        update_post_meta( $post_id, 'options', $options );

        if ( $options['language'] == 'html' ) {
            $this->build_search_tree();
            return;
        }


        // Save the Custom Code in a file in `wp-content/uploads/custom-css-js`
        if ( $options['linking'] == 'internal' ) {

            $before = '<!-- start Simple Custom CSS and JS -->' . PHP_EOL;
            $after = '<!-- end Simple Custom CSS and JS -->' . PHP_EOL;
            if ( $options['language'] == 'css' ) {
                $before .= '<style type="text/css">' . PHP_EOL;
                $after = '</style>' . PHP_EOL . $after;
            }
            if ( $options['language'] == 'js' ) {
                if ( ! preg_match( '/<script\b[^>]*>([\s\S]*?)<\/script>/im', $_POST['content'] ) ) {
                $before .= '<script type="text/javascript">' . PHP_EOL;
                $after = '</script>' . PHP_EOL . $after;
                }
            }
        }

        if ( $options['linking'] == 'external' ) {
            $before = '/******* Do not edit this file *******' . PHP_EOL .
            'Simple Custom CSS and JS - by Silkypress.com' . PHP_EOL .
            'Saved: '.date('M d Y | H:i:s').' */' . PHP_EOL;
        }

        if ( wp_is_writable( CCJ_UPLOAD_DIR ) ) {
            $file_name = $post_id . '.' . $options['language'];
            $file_content = $before . stripslashes($_POST['content']) . $after;
            @file_put_contents( CCJ_UPLOAD_DIR . '/' . $file_name , $file_content );
        }


        $this->build_search_tree();
    }

    /**
     * Create the custom-css-js dir in uploads directory
     *
     * Show a message if the directory is not writable
     *
     * Create an empty index.php file inside
     */
    function create_uploads_directory() {
        $current_screen = get_current_screen();

        // Check if we are editing a custom-css-js post
        if ( $current_screen->base != 'post' || $current_screen->post_type != 'custom-css-js' ) {
            return false;
        }

        $dir = CCJ_UPLOAD_DIR;

        // Create the dir if it doesn't exist
        if ( ! file_exists( $dir ) ) {
            wp_mkdir_p( $dir );
        }

        // Show a message if it couldn't create the dir
        if ( ! file_exists( $dir ) ) : ?>
             <div class="notice notice-error is-dismissible">
             <p><?php printf(__('The %s directory could not be created', 'custom-css-js'), '<b>custom-css-js</b>'); ?></p>
             <p><?php _e('Please run the following commands in order to make the directory', 'custom-css-js'); ?>: <br /><strong>mkdir <?php echo $dir; ?>; </strong><br /><strong>chmod 777 <?php echo $dir; ?>;</strong></p>
            </div>
        <?php return; endif;


        // Show a message if the dir is not writable
        if ( ! wp_is_writable( $dir ) ) : ?>
             <div class="notice notice-error is-dismissible">
             <p><?php printf(__('The %s directory is not writable, therefore the CSS and JS files cannot be saved.', 'custom-css-js'), '<b>'.$dir.'</b>'); ?></p>
             <p><?php _e('Please run the following command to make the directory writable', 'custom-css-js'); ?>:<br /><strong>chmod 777 <?php echo $dir; ?> </strong></p>
            </div>
        <?php return; endif;


        // Write a blank index.php
        if ( ! file_exists( $dir. '/index.php' ) ) {
            $content = '<?php' . PHP_EOL . '// Silence is golden.';
            @file_put_contents( $dir. '/index.php', $content );
        }
    }


    /**
     * Build a tree where you can quickly find the needed custom-css-js posts
     *
     * @return void
     */
    private function build_search_tree() {

        // Retrieve all the custom-css-js codes
        $posts = query_posts( 'post_type=custom-css-js&post_status=publish&nopaging=true' );

        $tree = array();
        foreach ( $posts as $_post ) {
            if ( ! $this->is_active( $_post->ID ) ) {
                continue;
            }

            $options = $this->get_options( $_post->ID );

            // Get the branch name, example: frontend-css-header-external
            $tree_branch = $options['side'] . '-' .$options['language'] . '-' . $options['type'] . '-' . $options['linking'];

            $filename = $_post->ID . '.' . $options['language'];

            if ( $options['linking'] == 'external' ) {
                $filename .= '?v=' . rand(1, 10000);
            }

            // Add the code file to the tree branch
            $tree[ $tree_branch ][] = $filename;

        }

        // Save the tree in the database
        update_option( 'custom-css-js-tree', $tree );
    }

    /**
     * Rebuilt the tree when you trash or restore a custom code
     */
    function trash_post( $post_id ) {
        $this->build_search_tree( );
    }


    /**
     * Compatibility with `shortcoder` plugin
     */
    function compatibility_shortcoder() {
        ob_start( array( $this, 'compatibility_shortcoder_html' ) );
    }
    function compatibility_shortcoder_html( $html ) {
        if ( strpos( $html, 'QTags.addButton' ) === false ) return $html;
        if ( strpos( $html, 'codemirror/codemirror-compressed.js' ) === false ) return $html;

        return str_replace( 'QTags.addButton', '// QTags.addButton', $html );
    }

    /**
     * Render the checkboxes, radios, selects and inputs
     */
    function render_input( $_key, $a, $options ) {
        $name = 'custom_code_' . $_key;
        $output = '';

        // Show radio type options
        if ( $a['type'] === 'radio' ) {
            $output .= '<div class="radio-group">' . PHP_EOL;
            foreach( $a['values'] as $__key => $__value ) {
                $selected = '';
                $id = $name . '-' . $__key;
                $dashicons = isset($__value['dashicon'] ) ? 'dashicons-before dashicons-' . $__value['dashicon'] : '';
                if ( isset( $a['disabled'] ) && $a['disabled'] ) {
                    $selected = ' disabled="disabled"';
                }
                $selected .= ( $__key == $options[$_key] ) ? ' checked="checked" ' : '';
                $output .= '<input type="radio" '. $selected.'value="'.$__key.'" name="'.$name.'" id="'.$id.'">' . PHP_EOL;
                $output .= '<label class="'.$dashicons.'" for="'.$id.'"> '.$__value['title'].'</label><br />' . PHP_EOL;
            }
            $output .= '</div>' . PHP_EOL;
        }

        // Show checkbox type options
        if ( $a['type'] == 'checkbox' ) {
            $dashicons = isset($a['dashicon'] ) ? 'dashicons-before dashicons-' . $a['dashicon'] : '';
            $selected = ( isset($options[$_key]) && $options[$_key] == '1') ? ' checked="checked" ' : '';
            if ( isset( $a['disabled'] ) && $a['disabled'] ) {
                $selected .= ' disabled="disabled"';
            }
            $output .= '<div class="radio-group">' . PHP_EOL;
            $output .= '<input type="checkbox" '.$selected.' value="1" name="'.$name.'" id="'.$name.'">' . PHP_EOL;
            $output .= '<label class="'.$dashicons.'" for="'.$name.'"> '.$a['title'].'</label>';
            $output .= '</div>' . PHP_EOL;
        }


        // Show select type options
        if ( $a['type'] == 'select' ) {
            $output .= '<div class="radio-group">' . PHP_EOL;
            $output .= '<select name="'.$name.'" id="'.$name.'">' . PHP_EOL;
            foreach( $a['values'] as $__key => $__value ) {
                $selected = ( isset($options[$_key]) && $options[$_key] == $__key) ? ' selected="selected"' : '';
                $output .= '<option value="'.$__key.'"'.$selected.'>' . $__value . '</option>' . PHP_EOL;
            }
            $output .= '</select>' . PHP_EOL;
            $output .= '</div>' . PHP_EOL;
        }


        return $output;

    }


    /**
     * Get the language for the current post
     */
    function get_language( $post_id = false ) {
        if( $post_id !== false ) {
            $options = $this->get_options( $post_id );
            $language = $options['language'];
        } else {
            $language = isset( $_GET['language'] ) ? esc_attr(strtolower($_GET['language'])) : 'css';
        }
        if ( !in_array($language, array('css', 'js', 'html'))) $language = 'css';

        return $language;
    }


    /**
     * Show the activate/deactivate link in the row's action area
     */
    function post_row_actions($actions, $post) {
        if ( 'custom-css-js' !== $post->post_type ) {
            return $actions;
        }

        $url = wp_nonce_url( admin_url( 'admin-ajax.php?action=ccj_active_code&code_id=' . $post->ID), 'ccj-active-code-'. $post->ID );
        if ( $this->is_active( $post->ID) ) {
            $active_title = __('The code is active. Click to deactivate it', 'custom-css-js');
            $active_text = __('Deactivate', 'custom-css-js');
        } else {
            $active_title = __('The code is inactive. Click to activate it', 'custom-css-js');
            $active_text = __('Activate', 'custom-css-js');
        }
        $actions['activate'] = '<a href="' . esc_url( $url ) . '" title="'. $active_title . '" class="ccj_activate_deactivate" data-code-id="'.$post->ID.'">' . $active_text . '</a>';

        return $actions;
    }


    /**
    * Show the activate/deactivate link in admin.
    */
    public function post_submitbox_start() {
        global $post;

        if ( ! is_object( $post ) ) return;

        if ( 'custom-css-js' !== $post->post_type ) return;

        if ( !isset( $_GET['post'] ) ) return;

        $url = wp_nonce_url( admin_url( 'admin-ajax.php?action=ccj_active_code&code_id=' . $post->ID), 'ccj-active-code-'. $post->ID );


        if ( $this->is_active( $post->ID) ) {
            $text = __('Active', 'custom-css-js');
            $action = __('Deactivate', 'custom-css-js');
        } else {
            $text = __('Inactive', 'custom-css-js');
            $action = __('Activate', 'custom-css-js');
        }
        ?>
        <div id="activate-action"><span style="font-weight: bold;"><?php echo $text; ?></span>
        (<a class="ccj_activate_deactivate" data-code-id="<?php echo $post->ID; ?>" href="<?php echo esc_url( $url ); ?>"><?php echo $action ?></a>)
        </div>
    <?php
    }




}

return new CustomCSSandJS_Admin();