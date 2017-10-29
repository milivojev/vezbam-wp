<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
<!-- sve ovo menja wp head -->
    <title><?=custom_title();?> </title>

       <!-- Bootstrap core CSS -->
<!--   <link href="/wp-content/themes/basic-acf-portfolio/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 -->
    <!-- Custom styles for this template -->
<!--     <link href="/wp-content/themes/basic-acf-portfolio/css/modern-business.css" rel="stylesheet"> -->
  <?php wp_head(); ?>



  
</head>

  <body>

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="<?= home_url();?>"><?=get_bloginfo('name');?></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          
          <?php
            wp_nav_menu([
            'menu_class'=>'navbar-nav ml-auto',
            'theme_location'=>'main-menu'
          ]);
          ?>

        </div>
      </div>
    </nav>

   