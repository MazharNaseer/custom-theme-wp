<?php

/*
Template Name: AJAX Endpoint Template
*/
?>
   <?php
get_header();
?>
<div style="height: 60vh; background-image: url(https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2850&q=80); background-size: cover; background-position: center;" class="position-relative w-100">
  <div class="position-absolute text-white d-flex flex-column align-items-center justify-content-center" style="top: 0; right: 0; bottom: 0; left: 0; background-color: rgba(0,0,0,.6);">
    
    <h1 class="mb-4 mt-2 font-weight-bold text-center">Architecture Projects</h1>
    <div class="text-center">

    </div>
  </div>
</div>
<section  class="section-padding">
      <div class="container" data-aos="zoom-in">

        <div class="row">
          <div class="col-lg-12 text-center ">
            <h3>Architecture Projects</h3>
            <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
          </div>
          
          <div class="text-center mt-5">
    <a id="fetch-project" style="border:none; padding-left:30px; padding-right:30px;  border-radius:30px; background-color:#37517e" class="btn btn-primary btn-get-started py-2">See architecure Projects List</a>
    </div>  
         
        </div>

      </div>
    </section>
    <div class="container mb-5">
    <div id="project-container" class="row"></div>
</div>

<script>
    jQuery(document).ready(function($) {
        $('#fetch-project').click(function() {
            console.log("clicked");
            $.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'POST',
                dataType: 'html', 
                data: {
                    action: 'my_custom_ajax_endpoint'
                },
                success: function(response) {
                    console.log(response); 
                    $('#project-container').html(response);

                    $('#fetch-project').hide();
                    $('#project-container .col-md-4').addClass('col-lg-4 col-md-6 mb-4');
                    
                   
                    $('#project-container .col-md-4').each(function(index) {
                        if (index % 3 === 0) {
                            $(this).prevAll('.col-md-4').andSelf().wrapAll('<div class="row"></div>');
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.log('Error occurred.');
                }
            });
        });
    });
</script>



<?php
get_footer();
?>
