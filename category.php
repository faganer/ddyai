<?php
$opt = get_option( 'csf' );
get_header();?>

    <div id="main" class="wrapper">
      <section class="banner category-banner text-light">
        <div class="container">
          <div class="row">
            <div class="col-xl-5 col-lg-6 col-md-8">
              <h1 class="display-4 font-weight-bold"><?php single_cat_title(); ?></h1>
              <?php
              /**
               * 分类描述
               */
              if( !empty( category_description() )){?>
                <div class="lead mb-0"><?php echo category_description(); ?></div>
              <?php }?>
            </div>
          </div>
        </div>
        <!-- .container -->
        <div class="divider">
          <svg class="w-100" viewBox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="none"
            data-src="assets/images/divider-2.svg">
            <path d="M0,0 C16.6666667,66 33.3333333,99 50,99 C66.6666667,99 83.3333333,66 100,0 L100,100 L0,100 L0,0 Z">
            </path>
          </svg>
        </div>
        <!-- .divider -->
      </section>
      <!-- .home-banner -->

      <section class="post-list">
        <div class="container">
          <div class="row mb-4" role="list">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
              <div class="col-md-6 col-lg-4 d-flex mb-5" data-aos="fade-up" data-aos-delay="100" role="listitem">
                <div class="card w-100">
                  <?php
                  /**
                   * 特色图像
                   */
                  $thumbnail=get_template_directory_uri().'/assets/images/thumbnail.png';
                  if ( has_post_thumbnail() ) {
                    $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
                    $thumbnail=$large_image_url[0].'?x-oss-process=image/auto-orient,1/resize,m_fill,w_354,h_236/quality,q_100';
                  }?>
                  <img src="<?php echo $thumbnail;?>" class="card-img-top" alt="<?php the_title();echo '的封面图'; ?>">
                  <div class="card-body">
                    <h5 class="card-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" class="text-dark"><?php the_title(); ?></a></h5>
                    <p class="card-text">
                      <?php
                      /**
                       * 文章简介
                       */
                      $content = get_the_content();
                      $content = wp_strip_all_tags(str_replace(array('[', ']'), array('<', '>'), $content));
                      echo mb_strimwidth(strip_tags($content), 0, 120, '...');?>
                    </p>
                    <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" class="card-link" rel="nofollow">阅读全文</a>
                  </div>
                  <!-- .card-body -->
                </div>
                <!-- .card -->
              </div>
              <!-- .col-md-6 -->
              <?php endwhile; else : ?>
                <div class="card w-100">
                  <div class="card-body">
                    <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
                  </div>
                </div>
            <?php endif; ?>

            <div class="col-12 text-center">
              <?php wp_pagenavi(); ?>
            </div>
            <!-- .col-12 -->
            
          </div>
          <!-- .row -->
        </div>
        <!-- .container -->
      </section>
      <!-- section -->

    </div>
    <!-- #main.wrapper -->

<?php get_footer();?>
