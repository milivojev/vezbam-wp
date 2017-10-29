<?php
get_header();
the_post();
?>


    <!-- Navigation -->
    <!-- <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.html">Start Bootstrap</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="about.html">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="services.html">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact</a>
            </li>
            <li class="nav-item active dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Portfolio
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="portfolio-1-col.html">1 Column Portfolio</a>
                <a class="dropdown-item" href="portfolio-2-col.html">2 Column Portfolio</a>
                <a class="dropdown-item" href="portfolio-3-col.html">3 Column Portfolio</a>
                <a class="dropdown-item" href="portfolio-4-col.html">4 Column Portfolio</a>
                <a class="dropdown-item active" href="portfolio-item.html">Single Portfolio Item</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Blog
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                <a class="dropdown-item" href="blog-home-1.html">Blog Home 1</a>
                <a class="dropdown-item" href="blog-home-2.html">Blog Home 2</a>
                <a class="dropdown-item" href="blog-post.html">Blog Post</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Other Pages
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                <a class="dropdown-item" href="full-width.html">Full Width Page</a>
                <a class="dropdown-item" href="sidebar.html">Sidebar Page</a>
                <a class="dropdown-item" href="faq.html">FAQ</a>
                <a class="dropdown-item" href="404.html">404</a>
                <a class="dropdown-item" href="pricing.html">Pricing Table</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav> --> 


    <!-- 

Open your Single Portfolio Item template (single.php)(its the default post template). If you visit any of your portfolio pages that you outputted in the last query, you will notice they have a related projects section in the bottom.

Create a WP Query that returns 3 random posts from the same category.

You will notice that since we only have three posts in each category (courtesy of homework #3), it will always show the same three posts, including the current page. Find a way to remove the current post from the results, so that we only show 2 posts. It is a pretty common procedure, google it.
 -->

    <!-- Page Content -->
    <div class="container">
    

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3"><?= get_bloginfo( 'name' );?>
        <small><?= get_the_title();?></small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?= home_url();?>">Home</a>
        </li>
        <li class="breadcrumb-item active">Portfolio Item</li>
      </ol>

      <!-- Portfolio Item Row -->
      <div class="row">

        <div class="col-md-8">
          <img class="img-fluid" src="http://placehold.it/750x500" alt="">
        </div>

        <div class="col-md-4">
          <h3 class="my-3">Project Description</h3>
          <p><?= get_the_content();?></p>
          <h3 class="my-3">Project Details</h3>
          <ul>
            <li>Lorem Ipsum</li>
            <li>Dolor Sit Amet</li>
            <li>Consectetur</li>
            <li>Adipiscing Elit</li>
          </ul>
        </div>

      </div>
      <!-- /.row -->

      <!-- Related Projects Row -->
      <h3 class="my-4">Related Projects</h3>

      <div class="row">
        <?php
        $curent_category_ID = wp_get_post_categories($post->ID);
       $postid = get_the_ID();

        

          $args = [
            'post_type'=>'post',
            'cat'=>$curent_category_ID,
            'posts_per_page' => 3,
             'post__not_in' => [$postid]
          ];
          $related_projects = new WP_Query($args);
          while($related_projects->have_posts()):
          $related_projects->the_post();
?>
        <div class="col-md-3 col-sm-6 mb-4">
          <a href="<?=get_permalink(); ?>">
            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
            <?php echo "<h6>".the_title()."</h6>"; ?>
          </a>
        </div>
<?php endwhile;?>
        

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->


<?php
get_footer();
?>