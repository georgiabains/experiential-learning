<?php

    function modules_theme_style() {
        // Theme stylesheet
        wp_enqueue_style( 'modules_theme-style', get_stylesheet_uri() );  
    }

    add_action( 'wp_enqueue_scripts', 'modules_theme_style' );

    function modules_theme_scripts() {
        
        wp_register_script(
            'modules_theme_scripts',
            get_template_directory_uri() . '/js/scripts.js',
            array( 'jquery' ),
            false,
            false
        );

        // For either a plugin or a theme, you can then enqueue the script:
        wp_enqueue_script( 'modules_theme_scripts' );
    }
    add_action( 'wp_enqueue_scripts', 'modules_theme_scripts' );

    function wmpudev_enqueue_icon_stylesheet() {
        wp_register_style( 'fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' );
        wp_enqueue_style( 'fontawesome' );
    }

    add_action( 'wp_enqueue_scripts', 'wmpudev_enqueue_icon_stylesheet' );

    function register_my_menus() {
        register_nav_menus(
            array(
                'header-menu' => __( 'Header Menu' )
            )
        );
    }

    add_action( 'init', 'register_my_menus' );

    function modules_theme_features() {
        $header_args = array(
            'default-image'          => '',
            'width'                  => 2000,
            'height'                 => 600,
            'flex-width'             => true,
            'flex-height'            => true,
            'uploads'                => true,
            'random-default'         => false,
            'header-text'            => false,
            'default-text-color'     => '',
            'wp-head-callback'       => '',
            'admin-head-callback'    => '',
            'admin-preview-callback' => '',
            'video'                  => true,
            'video-active-callback'  => '',
        );
        add_theme_support( 'custom-header', $header_args);
    }

    add_action( 'after_setup_theme', 'modules_theme_features');

	// adds the search box to the header menu
	function add_search_box( $items, $args ) {
		if( $args->theme_location == 'header-menu' ){
			$items .= '' . get_search_form( false ) . '';
		}
		return $items;
	}

	add_filter( 'wp_nav_menu_items','add_search_box', 10, 2 );

	function my_deregister_scripts(){
	  wp_deregister_script( 'wp-embed' );
	}
	add_action( 'wp_footer', 'my_deregister_scripts' );

	// generates breadcrumbs, from http://wp-functions.com/seo-functions/seo-breadcrumb-function/
	function the_breadcrumb() {
		global $post;
		echo '<p class="breadcrumbs">';
		if (!is_home()) {
			echo '<a href="';
			echo home_url();
			echo '" title="Homepage">';
			echo 'Home';
			echo '</a> <i class="fa fa-angle-right"></i> ';
			if (is_category() || is_single()) {
				echo '';
				the_category(' <i class="fa fa-angle-right"></i> ');
				if (is_single()) {
					echo ' <i class="fa fa-angle-right"></i> ';
					the_title();
					echo '';
				}
			} elseif (is_page()) {
				if($post->post_parent){
					$anc = get_post_ancestors( $post->ID );
					$title = get_the_title();
					foreach ( $anc as $ancestor ) {
						$output = '<a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a> ';
					}
					echo $output;
					echo '<span title="'.$title.'"> <i class="fa fa-angle-right"></i> '.$title.'</span>';
				} else {
					echo get_the_title();
				}
			}
		}
		elseif (is_tag()) {single_tag_title();}
		elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
		elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
		elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
		elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
		elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
		elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
		echo '</p>';
	}

	remove_filter( 'the_content', 'wpautop' );
	remove_filter( 'the_excerpt', 'wpautop' );

	remove_filter( 'the_content', 'wpautop' ); remove_filter( 'the_excerpt', 'wpautop' );

	add_post_type_support( 'page', 'excerpt' );
    
?>
