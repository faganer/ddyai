<?php
$opt = get_option( 'csf' );
get_header();?>

    <div id="main" class="wrapper">
      <section class="banner home-banner d-flex justify-content-center text-center align-items-center">
        <div class="container">
          <div class="row justify-content-center text-center align-items-center">
            <div class="col-xl-8 col-lg-9 col-md-10 layer-3" data-aos="fade-up" data-aos-delay="500">
              <h1 class="text-white"><?php echo $opt['opt-home-1'];?></h1>
              <div class="mb-4  text-white">
                <p class="lead px-xl-5"><?php echo $opt['opt-home-2'];?></p>
                <p class="lead px-xl-5 d-flex align-items-center justify-content-center"><span>专属AI大师码：</span><span
                    id="code" class="code font-weight-bold">2222</span><span class="badge badge-danger ml-2">9折</span>
                </p>
              </div>
              <a href="javascript:;" rel="nofollow" data-clipboard-target="#code"
                class="btn btn-lg mx-1 btn-light code-clipboard">拷贝大师码</a>
            </div>
          </div>
          <!-- .row -->
        </div>
        <!-- .container -->
      </section>
      <!-- .home-banner -->

      <article class="home-mod-1" role="article">
        <div class="container">
          <div class="head row justify-content-center text-center">
            <div class="col-xl-9">
              <h2 class="h1"><?php echo $opt['opt-home-3'];?></h2>
            </div>
          </div>
          <!-- .head -->

          <div class="content">
            <div class="content-item row clearfix" data-aos="fade-up">
              <div class="col-md-12">
              <?php echo $opt['opt-home-4'];?>
              </div>
            </div>
            <!-- .row -->
          </div>
          <!-- .content -->

        </div>
        <!-- .container -->
      </article>
      <!-- .home-mod-1 -->

      <section class="home-mod-2">
        <div class="container">
          <div class="head row justify-content-center">
            <div class="col-xl-8 col-lg-9 text-center">
              <h2 class="mx-xl-6">最新文章</h2>
              <p class="lead">关于滴滴云优惠、折扣、代金券、AI大师码、资讯、教程、活动等最新消息。</p>
            </div>
          </div>
          <!-- .head -->

          <div class="content" data-aos="fade-up">
            <div class="row justify-content-center">
              <div class="col-xl-8 col-lg-9">
                <div class="mb-4">
                  <div class="list-group" role="list">
                    <?php
                    /**
                     * The Loop
                     * https://codex.wordpress.org/The_Loop
                     */
                    if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                      <a href="<?php the_permalink(); ?>" rel="bookmark" class="list-group-item list-group-item-action" role="listitem" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                    <?php endwhile; else : ?>
                      <p class="list-group-item list-group-item-action" role="listitem"><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
                    <?php endif; ?>
                  </div>
                  <!-- .list-group -->
                </div>
                <!-- .mb-4 -->
                <p class="pl-3 more"><a href="<?php echo $opt['opt-home-5'];?>" class="text-decoration-none" rel="nofollow"><span class="font-weight-bold">更多文章</span><span class="fas fa-arrow-right fa-fw ml-1"></span></a></p>
              </div>
              <!-- .col-xl-8 -->
            </div>
            <!-- .row -->
          </div>
          <!-- .content -->

        </div>
        <!-- .container -->
        <div class="divider">
          <svg class="w-100" viewBox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="none" class="injected-svg bg-primary"
            data-src="assets/images/divider-2.svg">
            <path d="M0,0 C16.6666667,66 33.3333333,99 50,99 C66.6666667,99 83.3333333,66 100,0 L100,100 L0,100 L0,0 Z">
            </path>
          </svg>
        </div>
        <!-- .divider -->
      </section>
      <!-- .home-mod-2 -->

    </div>
    <!-- #main.wrapper -->

<?php get_footer();?>
