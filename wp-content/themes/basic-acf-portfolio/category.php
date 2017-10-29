  <?php
    get_header();
    the_post();
  ?>
  <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3"><?=get_bloginfo('name');?>
        <small><?=get_bloginfo('description');?></small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?= home_url();?>">Home</a>
        </li>
        <li class="breadcrumb-item active">Portfolio 1</li>
      </ol>

<!-- 

Write a query that outputs all posts from current category in the category.php template. The order should be by descending created date, so that we always have the newest post on top.

For this query you will need the slug, id or the name of the current category and you can easily get that via $wp_query->get_queried_object() method.
 
Each post should be shown as a row-card, which contains the post name, 180char excerpt and a permalink on the button. We did this same thing in class, so it should be pretty easy by now. Leave the picture the gray default as is for now, as we do not yet have custom fields.
 -->

      <!-- Project One -->
      <div class="row">
        <?php
         $curent_category = $wp_query->get_queried_object();

         $curent_category_slug = $curent_category->slug;
          $args =[
            'post_type'=>'post',
            'category_name'=>$curent_category_slug,
            'order'=>'DESC'

          ];
          $projects = new WP_Query($args);
          while($projects->have_posts()):
            $projects->the_post();
          ?>
        <div class="col-md-7">
          <?php dump(get_field('hero_image'));?>
          <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="<?= get_field('hero_image')['sizes']['thumbnail'];?>" alt="">
          </a>
        </div>
        <div class="col-md-5">
          <h3><?php the_title();?></h3>
          <p><?= excerpt(get_the_content());?></p>
          <a class="btn btn-primary" href="<?= get_permalink() ?>">View Project
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
        </div>
      <?php endwhile;?>
      </div>
      <!-- /.row -->

      <hr>

      

      <!-- Pagination -->
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">1</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">3</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>

    </div>
    <!-- /.container -->

 <?php
  get_footer();
  ?>   