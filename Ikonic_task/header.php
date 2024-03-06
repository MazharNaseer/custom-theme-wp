<?php

?>
<head>

<?php

$theme_name = wp_get_theme()->get_template();

$assets_base_url = get_template_directory_uri() . '/assets';

$asset_paths = array(
    'vendor/bootstrap/css/bootstrap.min.css',
    'vendor/bootstrap-icons/bootstrap-icons.css',
    'vendor/boxicons/css/boxicons.min.css',
    'vendor/glightbox/css/glightbox.min.css',
    'vendor/remixicon/remixicon.css',
    'vendor/swiper/swiper-bundle.min.css',
    'css/style.css'
);

?>
<?php foreach ($asset_paths as $path) : ?>
    <link href="<?php echo $assets_base_url . '/' . $path; ?>" rel="stylesheet">
<?php endforeach; ?>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Ikonic Task</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


</head>

<body>
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
        <h1 class="logo me-auto">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <?php echo get_bloginfo('name'); ?>
            </a>
        </h1>
        <?php 
        $menu_locations = get_nav_menu_locations();
        $primary_menu_id = $menu_locations['primary']; 

        if ($primary_menu_id) :
            $menu_items = wp_get_nav_menu_items($primary_menu_id);
        ?>
        <nav id="navbar" class="navbar">
            <?php if (!empty($menu_items)) : ?>
                <ul>
                    <?php foreach ($menu_items as $menu_item) : ?>
                        <li>
                            <a class="nav-link scrollto <?php echo ($menu_item->current) ? 'active' : ''; ?>" href="<?php echo esc_url($menu_item->url); ?>">
                                <?php echo esc_html($menu_item->title); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
        <?php endif; ?>
    </div>
</header><!-- End Header -->



