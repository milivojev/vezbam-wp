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

        <!-- 

On the My Work page, don't actually want to show posts, we want to show categories.

Use the get_categories() method to get all your categories into a variable. Open up the My Work page that we used as an example in class, and replace the WP_Query of posts that we did in class with foreach loop showing all categories in these boxes. It should be really easy and straightforward.
 -->
        <?php

          $categories = get_categories( );

         foreach($categories as $category):
          // echo "<pre>";
          // var_dump($category);
          // echo "</pre>";

        ?>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header"><?=$category->name;?></h4>
            <div class="card-body">
              <p class="card-text"><?= $category->description;?></p>
            </div>
            <div class="card-footer">
              <a href="<?= get_category_link($category->cat_ID );?>" class="btn btn-primary">Learn More</a>
            </div>
          </div>
        </div>
        <?php
      endforeach;
      wp_reset_postdata();
        ?>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
<?php
	get_footer();
?>		