<?php
	// Template Name: About us Template
	get_header();
	the_post();

?>

  <!-- Page Content -->
    <div class="container">

      <!-- Create a new ACF Group named About Page (you may already have one from the lecture). It should be applicable only when Page Template is About Template. Also, don't forget to set the Group's Position and Style to High and Standard like we did in the class.

    Create a custom field named My Portrait. Echo the image in the appropriate HTML section in the template. You should use the image that you have already prepared in the editor. Remove it from the editor and select it as the new Portrait. Verify that everything works. Image size used on the frontend should be Large.
    Create a repeater field named Customers which repeats a single image field named Logo. The counstraints should be min 0 and max 6. You will find the placeholder for these images on the bottom of the about template under the title Our Customers. Create a loop and output all logos there.
 -->

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">About
        <small>Subheading</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?= home_url( );?>">Home</a>
        </li>
        <li class="breadcrumb-item active">About</li>
      </ol>

      <!-- Intro Content -->
      <div class="row">
        <div class="col-lg-6">
          <img class="img-fluid rounded mb-4" src="<?=get_field('my_portrait')['sizes']['large'];?>" alt="">
        </div>
        <div class="col-lg-6">
          <?php the_content();?>
        </div>
      </div>
      <!-- /.row -->

      <!-- Our Customers -->
      <h2>Our Customers</h2>
      <div class="row">

        <?php
        while(have_rows('customers')):
          the_row();
          $url = get_sub_field('logo')['url'];
        ?>
        <div class="col-lg-2 col-sm-4 mb-4">
          <img class="img-fluid" src="<?= $url;?>" alt="">
        </div>
        <?php
        endwhile;
        ?>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

<?php
	get_footer();
?>