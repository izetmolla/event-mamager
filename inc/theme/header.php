<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php get_title(); ?></title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
  <!-- Bootstrap CSS File -->
  <link href="<?php echo get_mainurl(); ?>/assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Libraries CSS Files -->
  <link href="<?php echo get_mainurl(); ?>/assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo get_mainurl(); ?>/assets/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <!-- Main Stylesheet File -->
  <link href="<?php echo get_mainurl(); ?>/assets/css/style.css" rel="stylesheet">
</head>
<body>
  <header id="header" class="fixed-top">
    <div class="container">

      <div class="logo float-left">
        <!-- Uncomment below if you prefer to use an image logo -->
        <h1 class="text-light"><a href="<?php echo get_mainurl(); ?>/"><span><?php echo getoptvalue('website_title'); ?></span></a></h1>
      </div>
        <?php the_navigation(); ?>
    </div>
  </header><!-- #header -->