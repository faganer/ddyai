<?php get_header();?>

    <div id="main" class="wrapper d-flex align-items-center justify-content-center text-white">
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
        <div class="container text-center">
          <h1 class="display-1">404</h1>
          <h2 class="h1">Page not found</h2>
          <div class="lead mb-4">It appears the page you were looking for couldn’t be found.</div>
          <a class="btn btn-primary btn-lg" href="<?php echo esc_url(home_url('/')); ?>" rel="home nofollow">Go back to home</a>
        </div>
        <!-- .container -->
      </section>
      <!-- section -->

    </div>
    <!-- #main.wrapper -->

<?php get_footer();?>
