<?php
get_header();
?>
<div style="height: 60vh; background-image: url(https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2850&q=80); background-size: cover; background-position: center;" class="position-relative w-100">
  <div class="position-absolute text-white d-flex flex-column align-items-center justify-content-center" style="top: 0; right: 0; bottom: 0; left: 0; background-color: rgba(0,0,0,.6);">
    
    <h1 class="mb-4 mt-2 font-weight-bold text-center">Single Project Detail</h1>
    <div class="text-center">

    </div>
  </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-4 text-center">
            <?php if ( have_posts() ) : ?>
                <?php the_post(); ?>
                <?php
                $post_title = get_the_title();
                $post_description = get_the_content();
                $post_image_url = get_the_post_thumbnail_url( get_the_ID(), 'large' );
                ?>
                <section class="border-bottom mb-4 ">
                    <div class="row mt-5">
               <div class="col-4">
                    <?php if ( ! empty( $post_image_url ) ) : ?>
                        <img src="<?php echo $post_image_url; ?>" class="img-fluid shadow-2-strong rounded mb-4" alt="<?php echo esc_attr( $post_title ); ?>" />
                    <?php endif; ?>
                    </div>
                    <div class="col-8 text-start">
                    <h1><?php echo $post_title; ?></h1>
                    <?php echo $post_description; ?>
                    </div>
                    </div>
                </section>
                <section>
                   
                </section>
            <?php else : ?>
                <p>No post found.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
get_footer();
?>
