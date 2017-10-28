<?php 
	get_header();
	the_post(); 
?>
 <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Full Width
        <small>Subheading</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=home_url();?>">Home</a>
        </li>
        <li class="breadcrumb-item active">Full Width</li>
      </ol>

      <div class="content">
        <?php the_content();?>
      </div>
      

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>


<?php get_footer();?>