<?php

/*
Template Name: Kanya Template
*/
?>
   <?php
get_header();
?>
<div style="height: 60vh; background-image: url(https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2850&q=80); background-size: cover; background-position: center;" class="position-relative w-100">
  <div class="position-absolute text-white d-flex flex-column align-items-center justify-content-center" style="top: 0; right: 0; bottom: 0; left: 0; background-color: rgba(0,0,0,.6);">
    
    <h1 class="mb-4 mt-2 font-weight-bold text-center">Kanye Quotes</h1>
   
  </div>
</div>
<?php

echo do_shortcode('[kanye_quotes]');
?>


<?php
get_footer();
?>
