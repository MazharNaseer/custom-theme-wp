<footer>
        <div class="footer-top" > 
            <div class="container">
                <div class="footer-day-time">
                    <div class="row">
                        <div class="col-md-8">
                            <ul>
                                <li>Opening Hours: Mon - Friday: 8AM - 5PM</li>
                                <li>Sunday: 8:00 AM - 12:00 PM</li>
                            </ul>
                        </div>
                        <div class="col-lg-4">
                            <div class="phone-no">
                                <a href="tel:+12 34 56 78 90"><i class="fa fa-mobile" aria-hidden="true"></i>Call +12 34 56 78 90</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        
                        <h4>About us</h4>
                        <p>Lorem Ipsum ist einfach Dummy-Text der Druck- und Satzindustrie. Lorem Ipsum war der Standard der Branche Lorem Ipsum ist einfach Dummy-Text der Druck- und Satzindustrie. Lorem Ipsum war der Standard der Branche  </p>

                    </div>
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <h4>Information</h4>
                        <ul class="address1">
                            <li><i class="fa fa-map-marker"></i>Lorem Ipsum 132 xyz Lorem Ipsum</li>
                            <li><i class="fa fa-envelope"></i><a href="mailto:#">info@test.com</a></li>
                            <li><i class="fa fa-mobile" aria-hidden="true"></i> <a href="tel:12 34 56 78 90">12 34 56 78 90</a></li>
                        </ul>
                    </div>

                 

                </div>
            </div>
        </div>
        <div class="footer-bottom" style="background-color:#37517e">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5">
                        <p class="copyright ">Copyright © 2024
                        </p>
                    </div>
                    <div class="col-sm-7">
                     
                    </div>
                </div>
            </div>
        </div>
    </footer>


<?php

$theme_name = wp_get_theme()->get_template();

$assets_base_url = get_template_directory_uri() . '/assets';

$script_paths = array(
    'vendor/aos/aos.js',
    'vendor/bootstrap/js/bootstrap.bundle.min.js',
    'vendor/glightbox/js/glightbox.min.js',
    'vendor/isotope-layout/isotope.pkgd.min.js',
    'vendor/swiper/swiper-bundle.min.js',
    'vendor/waypoints/noframework.waypoints.js',
    'vendor/php-email-form/validate.js',
    'js/main.js'
);
?>

<?php foreach ($script_paths as $path) : ?>
    <script src="<?php echo $assets_base_url . '/' . $path; ?>"></script>
<?php endforeach; ?>
