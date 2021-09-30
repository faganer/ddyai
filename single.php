<?php get_header();?>

    <div id="main" class="wrapper">
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
        <div class="container">
          <div class="row mb-4 justify-content-center">
            <div class="col-lg-10 col-xl-8 overflow-overflow">
              <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
              <?php
              if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb( '<nav id="breadcrumbs" aria-label="breadcrumb" class="d-inline-block mt-3 mt-lg-0 mb-lg-3"><div class="breadcrumb">','</div></nav>' );
              }
              ?>
                <header class="entry-header mb-5 overflow-overflow">
                  <h1 class="entry-title mb-3"><?php the_title();?></h1>
                </header>
                <!-- .entry-header -->
                <section class="entry-body invisible"><?php the_content();?></section>
                <!-- .entry-body -->

              <?php endwhile; else : ?>
                <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
              <?php endif; ?>
            </div>
            <!-- .col-lg-10 -->
          </div>
          <!-- .row -->
        </div>
        <!-- .container -->
      </section>
      <!-- section -->

    </div>
    <!-- #main.wrapper -->

<?php get_footer();?>
