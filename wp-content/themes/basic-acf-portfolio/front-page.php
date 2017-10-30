<!-- Create a new ACF Group named Front Page (you may already have one from the lecture). It should be applicable only when Page Type is Front Page. Also, don't forget to set the Group's Position and Style to High and Standard like we did in the class.

    The Front page also has a small welcome image on the side that you have put in the editor for now. Create an Image field for this image and name it Welcome Image.
    Create a slider by using a repeater field like we did in the class. The repeater field constraints should be set to min 3 and max 3. The fields that repeat should be Slide Image, Slide Title, Slide Description.
    Echo the fields in an appropriate manner on the front-end. The image shown should be Hero. We did this in class, and even tho this is hard, it should be understandably easy for you. Ping me on Slack if you have any trouble.
    In order to fill the Call to action section near the bottom of the front page, we need two fields: A text field and an URL field. Create them and echo the values in the frontend.
    BONUS TASK 1: (OPTIONAL) The last thing we need is a testimonials repeater. It needs A photo, name, quote and link. Try to solve it yourself, and ping me on Slack if you have any trouble. -->


<?php get_header(); ?>
<?php the_post(); ?>



<header>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
<!-- slajder ne radi najbolje, pogledati kod ponovo -->
      <?php 
      $slider = get_field('slider');
      foreach ($slider as $key => $slide) :
        if ($key === 0) {
          $class = 'active';
        } else {
          $class = '';
        }
        $image = $slide['slide_image']['sizes']['Hero'];
        $title = $slide['slide_title'];
        $description = $slide['slide_description'];
        ?>

        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item <?= $class ?>" style="background-image: url('<?= $image; ?>')">
          <div class="carousel-caption d-none d-md-block">
            <h3><?= $title ?></h3>
            <p><?= $description ?></p>
          </div>
        </div>

      <?php endforeach; ?>

    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</header>

 <!-- Page Content -->
    <div class="container">

      <h1 class="my-4"><?= get_bloginfo ('name'); ?></h1>


      <!-- Features Section -->
      <div class="row">
        <div class="col-lg-6">
          <?= the_content(); ?>
        </div>
        <div class="col-lg-6">
          <?php
            $img_url = get_field('welcome_image')['sizes']['Portfolio Featured'];
          ?>
          <img class="img-fluid rounded" src="<?= $img_url;?>" alt="">
        </div>
      </div>
      <!-- /.row -->

      <hr>

      <!-- Call to Action Section -->
      <div class="row mb-4">
        <?php
          $call_to_action = get_field('call_to_action');
          $text= $call_to_action['text'];
          $url = $call_to_action['url'];
          $url_text = $call_to_action['url_text'];
          
          
        ?>
        <div class="col-md-8">
          <p><?= $text;?></p>
        </div>
        <div class="col-md-4">
          <a class="btn btn-lg btn-secondary btn-block" href="<?= $url;?>"><?= $url_text;?></a>
        </div>
      </div>

      <!-- Portfolio Section -->
      <h2>Testimonials</h2>

       <div class="row">
    <?php 
    while ( have_rows('testimonials') ) : the_row();
      $photo = get_sub_field('photo')['sizes']['Portfolio Featured'];
      $quote = get_sub_field('quote');
      $link = get_sub_field('url');
      $name = get_sub_field('name');
      ?>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="<?= $link ?>"><img class="card-img-top" src="<?= $photo ?>" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="<?= $link ?>"><?= $name ?></a>
            </h4>
            <p class="card-text"><?= $quote ?></p>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
  <!-- /.row -->

</div>

<?php get_footer(); ?>