<?php
get_header();
?>
<div style="height: 60vh; background-image: url(https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2850&q=80); background-size: cover; background-position: center;" class="position-relative w-100">
  <div class="position-absolute text-white d-flex flex-column align-items-center justify-content-center" style="top: 0; right: 0; bottom: 0; left: 0; background-color: rgba(0,0,0,.6);">
    
    <h1 class="mb-4 mt-2 font-weight-bold text-center">Custom Post Type Projects</h1>
    <div class="text-center">
 
      <a href="#" id="filled" class="btn px-4 py-2 text-white mt-3 mt-sm-0 mx-1" style="border-radius: 30px; background-color: #37517e;">Get Quote</a>
     
    </div>
  </div>
</div>

<div class="container py-5">
  <div class="row">
    <?php

    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

    $args = array(
        'post_type'      => 'projects',
        'posts_per_page' => 6,
        'paged'          => $paged,
    );
    $query = new WP_Query( $args );

    $count = 0; 

    if ( $query->have_posts() ) :
        while ( $query->have_posts() ) : $query->the_post();
          
            $count++;

        
            ?>
            <div class="col-md-4">
                <div class="card mb-3">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <img src="<?php the_post_thumbnail_url( 'large' ); ?>" class="card-img-top" alt="<?php the_title_attribute(); ?>">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php the_title(); ?></h5>
                        <p class="card-text"><?php the_excerpt(); ?></p>
                        <a href="<?php the_permalink(); ?>" style="border-none; background-color:#37517e" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>

            <?php
       
            if ( $count % 3 == 0 ) {
                echo '</div><div class="row">'; 
            }
        endwhile;
        ?>
    </div> 
 
    <div class="pagination">
    <?php
    previous_posts_link('<span style="color: #37517e;">&laquo; Previous</span>');
    next_posts_link('<span style="color: #37517e;">Next &raquo;</span>', $query->max_num_pages);
    ?>
</div>

</div> 


<?php

wp_reset_postdata();
else :
    echo 'No projects found.';
endif;

get_footer();
?>
