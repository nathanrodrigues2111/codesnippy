<?php
/*
  =============================================================
  Index
  =============================================================

  1.0 - Theme Support

  2.0 - Enqueue Scripts and Styles

  3.0 - Register Menus

  4.0 - Register Widgets Areas

  5.0 - WP_Customize Fields

  -------------------------------------------------------------
  Index Ends
  -------------------------------------------------------------
 */
/*
  =============================================================
  1.0 - Theme Support
  =============================================================
 */
  add_action('after_setup_theme', 'theme_setup');

  function theme_setup() {
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('custom-header');
    add_image_size('thumb-300x200', 300, 200, true);
  }

/*
  -------------------------------------------------------------
  Theme Support Ends
  -------------------------------------------------------------
 */


/*
  =============================================================
  2.0 - Enqueue Scripts and Styles
  =============================================================
 */

  function theme_enqueue_scripts() {

    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css');

    wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css');

    wp_enqueue_style('select-css', get_template_directory_uri() . '/css/select2.min.css');

    wp_enqueue_style('simplebar-css', get_template_directory_uri() . '/css/simplebar.css');

    wp_enqueue_style('prism-css', get_template_directory_uri() . '/css/prism.css');
    
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/css/theme-style.css', '', '1.0.0');

    wp_enqueue_style('slick-awesome', '//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css');

    wp_enqueue_style('theme-root-style', get_stylesheet_uri());

    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '1.0.0', true);

    wp_enqueue_script('select-js', get_template_directory_uri() . '/js/select2.min.js', array('jquery'), '1.0.0', true);

    wp_enqueue_script('prism-js', get_template_directory_uri() . '/js/prism.js', array('jquery'), '1.0.0', true);

    wp_enqueue_script('simplebar-js', get_template_directory_uri() . '/js/simplebar.js', array('jquery'), '1.0.0', true);

    wp_register_script("theme-script", get_template_directory_uri() . '/js/theme-script.js', array('jquery'), '1.0.0');



    wp_enqueue_script('slick-js', '//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js');

    wp_localize_script('theme-script', 'myAjax', array('ajaxurl' => admin_url('admin-ajax.php')));

    wp_enqueue_script('theme-script');
  }

  add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');
/*
  -------------------------------------------------------------
  Enqueue Scripts and Styles Ends
  -------------------------------------------------------------
 */

/*
  =============================================================
  3.0 - Register Menus
  =============================================================
 */

  function register_menus() {
    register_nav_menus(
      array(
       'main-menu' => __('Main Menu'),
       'footer-menu' => ( 'footer Menu')
       )
      );
  }

  add_action('init', 'register_menus');

/*
  -------------------------------------------------------------
  Register Menus Ends
  -------------------------------------------------------------
 */

/*
  =============================================================
  4.0 - Register Widget Areas
  =============================================================
 */

  function custom_widgets() {
    register_sidebar(array(
      'id' => 'footer-widget-area-1',
      'name' => 'Footer Widget Area 1',
      'description' => 'The widget area in the footer. ***For shortcodes, images, maps etc. you MUST set the appropriate width.***',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h2 class="widget-title">',
      'after_title' => '</h2>',
      ));

    register_sidebar(array(
      'id' => 'footer-widget-area-2',
      'name' => 'Footer Widget Area 2',
      'description' => 'The widget area in the footer. ***For shortcodes, images, maps etc. you MUST set the appropriate width.***',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h2 class="widget-title">',
      'after_title' => '</h2>',
      ));

    register_sidebar(array(
      'id' => 'footer-widget-area-3',
      'name' => 'Footer Widget Area 3',
      'description' => 'The widget area in the footer. ***For shortcodes, images, maps etc. you MUST set the appropriate width.***',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h2 class="widget-title">',
      'after_title' => '</h2>',
      ));

    register_sidebar(array(
      'id' => 'sidebar-widget-1',
      'name' => 'Sidebar widget 1',
      'description' => 'The widget area in the footer. ***For shortcodes, images, maps etc. you MUST set the appropriate width.***',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h2 class="widget-title">',
      'after_title' => '</h2>',
      ));

    register_sidebar(array(
      'id' => 'header-widget-1',
      'name' => 'header widget left',
      'description' => 'The widget area in the footer. ***For shortcodes, images, maps etc. you MUST set the appropriate width.***',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h2 class="widget-title">',
      'after_title' => '</h2>',
      ));
  }

  add_action('widgets_init', 'custom_widgets');


/*
  -------------------------------------------------------------
  Register Widget Areas Ends
  -------------------------------------------------------------
 */
/*
  =============================================================
  5.0 - WP_Customize Fields

  => Site Logo
  =============================================================
 */

  add_action("customize_register", "security_customize_register");

  function security_customize_register($wp_customize) {
    /* Logo */
    $wp_customize->add_section("site_logo_box", array(
      "title" => __("Site Logo", "theme_name"),
      "priority" => 100,
      ));


    $wp_customize->add_setting("site_logo", array(
      "default" => "",
      ));

    $wp_customize->add_control(new WP_Customize_Image_Control(
      $wp_customize, "site_logo", array(
        'label' => __('Site Logo', 'theme_name'),
        'section' => 'site_logo_box',
        'settings' => 'site_logo'
        )
      ));

    $wp_customize->add_setting("footer_logo", array(
      "default" => "",
      ));

    $wp_customize->add_control(new WP_Customize_Image_Control(
      $wp_customize, "footer_logo", array(
        'label' => __('Footer Logo', 'theme_name'),
        'section' => 'site_logo_box',
        'settings' => 'footer_logo'
        )
      ));
    /* Logo Ends */  
  }

/*
  -------------------------------------------------------------
  WP_Customize Fields Ends
  -------------------------------------------------------------
 */


  function my_acf_google_map_api( $api ){	
   $api['key'] = 'AIzaSyD1Q8VtU9NODbegZxKwItpgTFoLf3vwRMY';	
   return $api;	
 }

 add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

 show_admin_bar( false );

// add the ajax fetch js
 add_action( 'wp_footer', 'ajax_fetch' );
 function ajax_fetch() {
  ?>
  <script type="text/javascript">
    function fetch(){

      jQuery.ajax({
        url: '<?php echo admin_url('admin-ajax.php'); ?>',
        type: 'post',
        data: { action: 'data_fetch', keyword: jQuery('#keyword').val() },
        success: function(data) {
          jQuery('#datafetch').html( data );
        }
      });

    }
  </script>

  <?php
}

// the ajax function
add_action('wp_ajax_data_fetch' , 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch','data_fetch'); ?>
<?php

function data_fetch(){
?>
<div class="snippy-container-ajax" data-simplebar>
<?php
  $the_query = new WP_Query( array( 'posts_per_page' => -1, 's' => esc_attr( $_POST['keyword'] ), 'post_type' => 'post' ) );
  if( $the_query->have_posts() ) :
    while( $the_query->have_posts() ): $the_query->the_post(); ?>
  <div class="main-code-snippy-content">
    <h2><?php the_title(); ?></h2>
    <div class="content-container">
      <pre><code class="language-php"><?php the_content(); ?></code></pre>
    </div>
  </div>
<script type="text/javascript">
  Prism.highlightAll();
</script>
<?php endwhile;
wp_reset_query();  
endif;
?>
</div>
<?php
die();
}