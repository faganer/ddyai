<!doctype html>
<html <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="renderer" content="webkit|ie-comp|ie-stand">
  <meta name="force-rendering" content="webkit|ie-comp|ie-stand">
  <meta name="applicable-device" content="pc,mobile">
  <meta http-equiv="Cache-Control" content="no-transform" />
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <meta http-equiv="x-dns-prefetch-control" content="on">
  <?php wp_head();?>
</head>

<body <?php body_class();?>>
  <div class="loading position-fixed bg-white d-flex justify-content-center align-items-center">
    <div class="loading-content d-flex justify-content-center align-items-center">
      <span class="spinner-border" role="status"></span>
      <span class="ml-2">Loading...</span>
    </div>
    <!-- .loading-content -->
  </div>
  <!-- .loading -->
  <div id="page">
    <header id="masthead" class="site-header" role="banner">
      <?php
      /**
       * 菜单
       */
      wp_nav_menu(array(
        'theme_location' => 'menu-1',
        'menu_class'     => 'd-none',
      ));
      ?>
      <?php
      if(is_single()){?>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <?php } else {?>
      <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
      <?php }?>
        <div class="container pt-lg-2 pb-lg-2">
          <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" rel="home" title="<?php bloginfo('name');?>"><?php bloginfo('name');?></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mr-lg-3">
            </ul>
            <div class="form-inline my-2 my-lg-0 d-lg-none">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-danger my-2 my-sm-0" type="submit"><span
                  class="fas fa-search fa-fw"></span></button>
            </div>
            <button class="btn btn-outline-success my-2 my-sm-0 d-none d-lg-block search-active" type="button"
              data-toggle="modal" data-target="#searchModal"><span class="fas fa-search fa-fw"></span></button>
          </div>
        </div>
        <!-- .container -->
      </nav>
      <!-- .navbar -->
    </header>
    <!-- #masthead -->
