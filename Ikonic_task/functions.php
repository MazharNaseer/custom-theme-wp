<?php

//code for register CPT Project Start
function my_custom_post_type() {
    register_post_type('projects',
        array(
            'labels'      => array(
                'name'          => __('Projects', 'textdomain'),
                'singular_name' => __('Product', 'textdomain'),
            ),
            'public'      => true,
            'has_archive' => true,
            'supports'    => array('title', 'editor', 'thumbnail', 'page-attributes'),
        )
    );

    register_taxonomy(
        'project_type',  
        'projects',     
        array(
            'label'        => __('Project Type', 'textdomain'),
            'rewrite'      => array('slug' => 'project-type'),
            'hierarchical' => true,
        )
    );
}
add_action('init', 'my_custom_post_type');

//code for register CPT Project End

add_theme_support( 'post-thumbnails' );


//code for enque styale and script start

function enqueue_custom_css() {
  
    wp_enqueue_style('custom-style', get_theme_file_uri('/asset/custom.css'));
}
add_action('wp_enqueue_scripts', 'enqueue_custom_css');

function custom_theme_enqueue_scripts() {
    wp_enqueue_script( 'my-custom-theme-script', get_theme_file_uri('/asset/script.js'));
}
add_action( 'wp_enqueue_scripts', 'custom_theme_enqueue_scripts' );

//code for enque styale and script end

function custom_posts_per_page( $query ) {

    if ( $query->is_archive('project') ) {
        set_query_var('posts_per_page', -1);
    }
    }
    add_action( 'pre_get_posts', 'custom_posts_per_page' );

//code for Rwdirect user if ip start from
function ip_based_login() {
    $visitor = $_SERVER['REMOTE_ADDR'];
    $redirectTo = 'https://ikonicsolution.com/'; 

    if (strpos($visitor, '77.29') === 0) { 
        wp_redirect($redirectTo);
        exit; 
    }
}
add_action('template_redirect', 'ip_based_login'); 
//code for Rwdirect user if ip start from  end

//code for Register menu here
function register_custom_menus() {
    register_nav_menus(
        array(
            'primary' => __( 'Primary Menu', 'task_theme' ),
            
        )
    );
}
add_action( 'init', 'register_custom_menus' );

//code for Register menu end here
function allow_svg_upload( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'allow_svg_upload' );

add_action('wp_ajax_my_custom_ajax_endpoint', 'my_custom_ajax_callback');
add_action('wp_ajax_nopriv_my_custom_ajax_endpoint', 'my_custom_ajax_callback');

function my_custom_ajax_callback() {
   
    $is_logged_in = is_user_logged_in();

    $count = $is_logged_in ? 6 : 3;
    $args = array(
        'post_type'      => 'projects',
        'posts_per_page' => $count,
        'tax_query'      => array(
            array(
                'taxonomy' => 'project_type',
                'field'    => 'slug',
                'terms'    => 'architecture',
            ),
        ),
    );
    
    $projects_query = new WP_Query($args);
   
    if ($projects_query->have_posts()) {
        while ($projects_query->have_posts()) {
            $projects_query->the_post();

            $id    = get_the_ID();
            $title = get_the_title();
            $link  = get_permalink();
?>
<div class="col-md-4 mb-3">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?php echo $title; ?></h5>
            <p class="card-text">ID: <?php echo $id; ?></p>
            <a href="<?php echo $link; ?>" class="btn btn-primary">View Details</a>
        </div>
    </div>
</div>
<?php
        }
        wp_reset_postdata();
    }

    wp_die();
}


