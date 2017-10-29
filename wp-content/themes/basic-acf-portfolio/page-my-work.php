<?php
	// Template Name: Portfolio expose Template
	get_header();
	the_post();
?>
 <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Services
        <small>Subheading</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?= home_url();?>">Home</a>
        </li>
        <li class="breadcrumb-item active">Services</li>
      </ol>

      <!-- Image Header -->
      <img class="img-fluid rounded mb-4" src="http://placehold.it/1200x300" alt="">

      <!-- Marketing Icons Section -->
      <div class="row">
        <?php

          $myworks = new WP_Query([
            'post_type'=>'post',
            
          ]);

          while($myworks->have_posts()):
            $myworks->the_post();
            

        ?>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header"><?=the_title();?></h4>
            <div class="card-body">
              <p class="card-text"><?= excerpt(get_the_content());?></p>
            </div>
            <div class="card-footer">
              <a href="<?= get_permalink( );?>" class="btn btn-primary">Learn More</a>
            </div>
          </div>
        </div>
        <?php
      endwhile;
      wp_reset_postdata();
        ?>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
<?php
	get_footer();
?>		