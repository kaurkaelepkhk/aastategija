<?php
/**
 * The home content hook for our theme.
 *
 * This is the template that displays home content of the theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Edu_Care
 */

if ( ! function_exists( 'edu_care_home_content' ) ) :

  function edu_care_home_content(){

  ?>
      <div id="primary" class="content-area">
        <main id="main" class="site-main">
          <?php

          do_action( 'edu_care_slider' );
          do_action( 'edu_care_info' );
          do_action( 'edu_care_welcome' );
          if ( class_exists( 'WooCommerce' )) {
            do_action( 'edu_care_courses' );
          }
          do_action( 'edu_care_news' );
          do_action( 'edu_care_mailchimp' );
          do_action( 'edu_care_event_n_blog' );
          do_action( 'edu_care_contact' );

          ?>
        </main><!-- #main -->
      </div><!-- #primary -->
      <?php
  }

endif;

add_action( 'edu_care_action_home_content', 'edu_care_home_content', 10 );


// Slider section
if ( ! function_exists( 'edu_care_slider_section' ) ) :

  function edu_care_slider_section(){

    $theme_options  = edu_care_theme_options();
    if( 1 === $theme_options['slider_enable'] ){ 

    if( 'slider' === $theme_options['main_slider_type'] ){

    if(!empty( $theme_options['slider_cat'] )){

      $slider_args = array( 
        'cat'             => absint( $theme_options['slider_cat'] ), 
        'post_status'     => 'publish', 
        'posts_per_page'  => 4 
      );
    } else{

      $slider_args = array( 'post_status' => 'publish', 'posts_per_page' => 4 );
    }
     
    $slider_query = new WP_Query( $slider_args ); 

    if ( $slider_query->have_posts() ) :
    ?>

    <section class="main-slider">

      <div id="header-slider" class="owl-carousel owl-theme">

        <?php 
            while ( $slider_query->have_posts() ) : $slider_query->the_post(); 

         ?>

          <div class="item">
              <div class="overlay"></div>
              <?php 
                if ( has_post_thumbnail() ) {

                    the_post_thumbnail( 'edu-care-slider' ); 

                } ?>
              <div class="caption-wrapper v-center">
              <header class="entry-header">
                  <h3 class="entry-title"> <?php the_title(); ?> </h3>
              </header>
                  <?php if( 1 == $theme_options['slider_excerpt_enable'] ){ ?>
                      <div class="entry-content">
                        <p> <?php echo esc_html( edu_care_limit_words( get_the_excerpt(), 18 ) ); ?> </p>                          
                      </div>
                    <?php } ?>
                </div>
          </div><!-- .item -->

          <?php endwhile; ?>

      </div>

      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
          <polygon fill="#fff" points="0,100 100,0 100,100"/>
      </svg>
    </section><!-- .main-slider -->

    <?php wp_reset_postdata(); 
      endif; 
    } elseif ( 'banner-image' === $theme_options['main_slider_type'] ) { ?>

      <?php 
      $banner_img         = $theme_options['banner_image'];
      if( !empty( $banner_img )){ 
          $banner_img_args = array( 
              'p'             => absint( $banner_img ), 
              'post_status'     => 'publish'
          );

        $banner_img_query = new WP_Query( $banner_img_args ); 
        if ( $banner_img_query->have_posts() ) :
        while ( $banner_img_query->have_posts() ) : $banner_img_query->the_post();
        $banner_img_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
        if(!empty( $banner_img_url )) {
        ?>

      <section class="banner-bg bg-overlay" style="background:url(<?php echo esc_url($banner_img_url[0]); ?>) top center no-repeat; background-size:cover;">
      <?php } else { ?>

      <section class="banner-bg-color">
      
      <?php } ?>

      <div class="caption-wrapper">

        <header class="entry-header">
          <h3 class="entry-title"> <?php the_title(); ?> </h3>
        </header>
          <div class="entry-content">
            <p> <?php echo esc_html( edu_care_limit_words( get_the_excerpt(), 18 ) ); ?> </p>
          </div>

      </div>

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
          <polygon fill="#fff" points="0,100 100,0 100,100"/></polygon>
        </svg>

      </section>

      <?php
          endwhile;
        wp_reset_postdata();
      endif;
      ?>

    <?php
      } else {
      
      get_template_part( 'template-parts/page', 'header' );

    }
    }

    } else { 

      get_template_part( 'template-parts/page', 'header' );
    
    }

  }
endif;

add_action( 'edu_care_slider', 'edu_care_slider_section', 10 );


// Info section
if ( ! function_exists( 'edu_care_info_section' ) ) :

  function edu_care_info_section(){

    $theme_options  = edu_care_theme_options();
    
    $info         = $theme_options['ec_info'];

    if( !empty( $info ) ){

      $info_icon1 = $theme_options['info_icon_1'];
      $info_icon2 = $theme_options['info_icon_2'];
      $info_icon3 = $theme_options['info_icon_3'];

    ?>

    <section class="info-part">
      <div class="container">
          <div class="info-part-wrapper">

          <?php 
          $work_args = array( 
            'cat'             => absint( $info ), 
            'post_status'     => 'publish', 
            'posts_per_page'  => 3 
          );

          $work_query = new WP_Query( $work_args ); 

          if ( $work_query->have_posts() ) :

          $info_counter = 1;
          $info_icon = '';

          while ( $work_query->have_posts() ) : $work_query->the_post(); 
          if( 1 == $info_counter ) {
            $info_icon = $info_icon1;
          } elseif ( 2 == $info_counter ) {
            $info_icon = $info_icon2;
          } elseif ( 3 == $info_counter ) {
            $info_icon = $info_icon3;
          } else {
            $info_icon = $info_icon1;
          }

          ?>
              <div class="flex-wrapper">
                  <div class="flex-item">
                      <div class="info-content">
                          <div class="info-icon"><i class="fa <?php echo esc_attr( $info_icon ); ?>"></i></div><!-- .info-icon -->
                          <div class="info-title">
                              <h4 class="entry-title">
                                <a href="<?php the_permalink(); ?>">
                                  <?php the_title(); ?>
                                </a>
                              </h4>
                              <a href="<?php the_permalink(); ?>" > <?php esc_html_e('Learn more', 'edu-care'); ?> </a>
                          </div><!-- .info-title -->
                      </div><!-- .info-content -->
                  </div><!-- .flex-item -->
              </div><!-- .flex-wrapper -->

              <?php
              $info_counter++;
               endwhile; 
                wp_reset_postdata();

              endif; ?>

          </div><!-- .info-part-wrapper -->
      </div><!-- .container -->
    </section><!-- .info-part -->

  <?php
    }
  }

endif;

add_action( 'edu_care_info', 'edu_care_info_section', 10 );


// Welcome section
if ( ! function_exists( 'edu_care_welcome_section' ) ) :

  function edu_care_welcome_section(){

    $theme_options  = edu_care_theme_options();
    
    $welcome         = $theme_options['ec_welcome'];

    $welcome_page_design    = $theme_options['welcome_page_design'];

    $welcome_class = '';
    if( 'design_2' == $welcome_page_design){
      $welcome_class = 'welcome-section-2';
    }

    if( !empty( $welcome ) ){
    
    ?>

    <section class="welcome-text <?php echo esc_attr( $welcome_class);?>"> 
      <div class="container">
          <div class="welcome-text-wrapper">
            <div class="row">

          <?php 
            $welcome_args = array( 
              'page_id'         => absint( $welcome ), 
              'post_status'     => 'publish',
            );

            $welcome_query = new WP_Query( $welcome_args ); 

            if ( $welcome_query->have_posts() ) :

            while ( $welcome_query->have_posts() ) : $welcome_query->the_post(); 

            $wel_css = '';

            if ( has_post_thumbnail() ) {

                $wel_css = 'col-8';

              } else {

                $wel_css = 'col-12';

              }
            ?>
                
              <?php 
                if ( has_post_thumbnail() ) { ?>

                <figure class="welcome-img col-4">

                <?php

                  the_post_thumbnail( 'full' ); ?>

                    </figure>
                <?php

                  } ?>

                <div class="welcome-text-detail <?php echo esc_attr( $wel_css ); ?>">
                    <header class="entry-header">
                        <h3 class="entry-title"> <?php the_title(); ?> </h3>
                    </header>
                      <div class="entry-content">
                        <p> <?php echo esc_html( edu_care_limit_words( get_the_excerpt(), 25 ) ); ?> </p>
                      </div><!-- .entry-content -->
                  <a href="<?php the_permalink(); ?>" class="btn"> <?php esc_html_e('More', 'edu-care'); ?> </a>
              </div><!-- .welcome-text-detail -->

              <?php endwhile; 
                wp_reset_postdata();

              endif; ?>
            </div>
          </div><!-- .welcome-text-wrapper -->
      </div><!-- .container -->
    </section><!-- .welcome-text -->

<?php
    }
  }

endif;

add_action( 'edu_care_welcome', 'edu_care_welcome_section', 10 );


// Course section
if ( ! function_exists( 'edu_care_courses_section' ) ) :

  function edu_care_courses_section(){

    global $product, $post;

    $theme_options  = edu_care_theme_options();
    
    $courses         = $theme_options['course_content'];

    if( !empty( $courses ) ) :

    $course_title         = $theme_options['course_title'];
    $course_sub_title     = $theme_options['course_sub_title'];

    ?>

  <section class="courses top-bottom-space">
    <div class="container">
        <div class="courses-wrapper">
            <div class="section-intro">
                <header>
                    <h2 class="entry-title"> <?php echo esc_html( $course_title ); ?> </h2>
                </header><!-- /header -->

                <?php if( !empty( $course_sub_title ) ) { ?>
                <div class="entry-content para">
                    <p> <?php echo esc_html( $course_sub_title ); ?> </p>
                </div>
                <?php } ?>

            </div><!-- .section-intro -->

              <?php

                $course_args = array(
                  'post_type'       => 'product',
                  'post_status'     => 'publish',
                  'orderby'         => esc_html( $theme_options['course_order_by'] ),
                  'order'           => esc_html( $theme_options['course_order'] ),
                  'posts_per_page'  => absint( $theme_options['no_of_courses'] ) 
                );

                $course_query = new WP_Query( $course_args ); 

                if ( $course_query->have_posts() ) :

              ?>

            <div id="courses" class="owl-carousel owl-theme slider-padding">

            <?php while ( $course_query->have_posts() ) : $course_query->the_post(); ?>

                <div class="item">
                    <article class="item-wrapper">
                        <figure class="course-img-box">
                            <a href="<?php the_permalink(); ?>">

                            <?php if ( has_post_thumbnail() ) { 
                              the_post_thumbnail( 'edu-care-course' );
                            } else { 

                            ?>

                            <div class="course-placeholder" style="background-image: url(<?php echo esc_url(wc_placeholder_img_src('edu-care-course')); ?>);"></div>

                            <?php } ?>
                            </a>

                            <?php $sale = get_post_meta( get_the_ID(), '_sale_price', true);
                                
                              if( !empty( $sale ) ) {
                                 ?>

                            <span class="category">
                                <a href="<?php the_permalink(); ?>"> <?php echo esc_html( 'sale', 'edu-care' ); ?> </a>
                            </span>

                            <?php } ?>

                        </figure><!-- .course-img-box -->
                        <div class="slider-caption">

                        <?php
                                $product_cat = get_the_terms($post->ID,'product_cat');
                                if( !empty( $product_cat ) ) :
                                $count = count($product_cat); $i=0;
                                if ($count > 0) {
                                  $cat_list = '';
                                  foreach ($product_cat as $cat) {
                                    $i++;
                                    $cat_link = get_term_link($cat); 
                                    if ($cat->parent==0) {
                                      $cat_list .= '<a href="' . esc_url($cat_link) . '">' . esc_attr($cat->name) . '</a>';
                            if ($count != $i) $cat_list .= ', ';
                                      }
                                  }
                                  ?>
                                  <span class="category">
                                  <?php
                                    echo wp_kses_data($cat_list);
                                  ?>
                                  </span>
                                <?php
                                }
                                endif;
                          ?>
                             
                            <header class="entry-header">

                            <h5 class="entry-title"><a href="<?php the_permalink(); ?>"> <?php the_title( ); ?> </a></h5>
                            </header><!-- /header -->

                            <div class="course-info">

                            <a class="couses-detail"> 

                            <?php
                               global $product; 
                                $numleft  = $product->get_stock_quantity(); 
                                if($numleft > 0) {
                                   
                                  echo absint($numleft);
                                  esc_html_e( ' class', 'edu-care' );

                                } else {

                                    esc_html_e( 'Price', 'edu-care' );
                                }
                            ?>
                            </a>

                              <a class="course-prize"> 
                                <?php
                                $sale = get_post_meta( get_the_ID(), '_sale_price', true);
                                $price = get_post_meta( get_the_ID(), '_regular_price', true);

                                if( !empty( $sale ) ) {

                                echo esc_html(get_woocommerce_currency_symbol());
                                echo absint($sale);

                                } else {

                                if( 0 == $price) {
                                  esc_html_e( 'free', 'edu-care' );
                                } else {

                                echo esc_html(get_woocommerce_currency_symbol());
                                echo absint($price);

                              }

                              }

                              ?>

                                </a>
                            </div>
                            <div class="post-author">

                              <?php edu_care_posted_on(); ?>

                            </div>
                        </div><!-- .slider-caption -->
                    </article><!-- .item-wrapper -->
                </div><!-- .item -->

              <?php endwhile; ?>

        </div>  

        <?php
            wp_reset_postdata();
          endif;
        ?>

      </div><!-- .courses-wrapper -->
    </div><!-- .container -->
  </section><!-- .courses -->

<?php
  endif;
  }

endif;

add_action( 'edu_care_courses', 'edu_care_courses_section', 10 );


// News section
if ( ! function_exists( 'edu_care_news_section' ) ) :

  function edu_care_news_section(){

    $theme_options  = edu_care_theme_options();
    
    $news           = $theme_options['ec_news'];

    if( !empty( $news ) ){

      $news_short_info          = $theme_options['news_short_info'];

    ?>

    <section class="news-section  top-bottom-space">
      <div class="container">
          <div class="news-wrapper">

              <div class="section-intro">
                  <header class="entry-header">
                      <h2 class="entry-title"> <?php echo esc_html(get_the_category_by_ID( absint( $news ) )); ?> </h2>
                  </header>

                  <div class="entry-content para">
                    <p> <?php echo esc_html( $news_short_info ); ?> </p>
                </div>

              </div><!-- .section-intro -->

              <?php
                $news_args = array( 
                  'cat'             => absint( $news ),
                  'post_status'     => 'publish', 
                  'posts_per_page'  => 4
                );

                $news_query = new WP_Query( $news_args ); 

                if ( $news_query->have_posts() ) :

                $news_count= 1;

                ?>

              <div class="news-content-wrapper">

                <?php  while ( $news_query->have_posts() ) : $news_query->the_post();
                    if( $news_count == 1 ) { 
                    $news_class_v = '';
                      if( !has_post_thumbnail( ) ) {
                      $news_class_v = 'news-img-vrt';
                      }
                ?>

                  <div class="break-news <?php echo esc_attr( $news_class_v ); ?>">
                      <div class="overlay"></div>
                      <a href="<?php the_permalink(); ?>">
                        <?php
                            if( has_post_thumbnail( ) ) {
                                the_post_thumbnail( 'edu-care-news-v' );
                        } ?>
                      </a>
                      <div class="news-caption">
                          <div class="post-date">
                              <span class="date"> <?php echo esc_html( get_the_date( __( 'M j', 'edu-care' ) )); ?> </span>
                              <span class="year"> <?php echo esc_html( get_the_date( __( 'Y', 'edu-care' ) )); ?> </span>
                          </div>


                          <header class="entry-header">
                              <h5 class="entry-title"><a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h5>
                          </header>

                          <?php edu_care_posted_on(); ?>

                      </div><!-- .news-caption -->
                  </div><!-- .break-news -->

                  <?php }
                    if( $news_count == 2 || $news_count == 3 ) {
                        if( $news_count == 2 ) {
                   ?>

                  <div class="news-gallery">
                      <ul>

                      <?php } ?>

                          <li>
                          <?php
                            $news_class_hh = '';
                              if( !has_post_thumbnail( ) ) {
                              $news_class_hh = 'news-img-hrg';
                            }
                          ?>
                              <div class="new-top <?php echo esc_attr( $news_class_hh ); ?>">
                                  <div class="overlay"></div>
                                  <a href="<?php the_permalink(); ?>">
                                  <?php
                                        if( has_post_thumbnail( ) ) {
                                            the_post_thumbnail( 'edu-care-news-hh' );
                                        } ?>
                                </a>
                                  <div class="news-caption">
                                      <div class="post-date">
                                          <span class="date"> <?php echo esc_html( get_the_date( __( 'M j', 'edu-care' ) )); ?> </span>
                                          <span class="year"> <?php echo esc_html( get_the_date( __( 'Y', 'edu-care' ) )); ?> </span>
                                      </div>
                                      <header class="entry-header">
                                          <h5 class="entry-title"><a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h5>
                                      </header>
                                      
                                      <?php edu_care_posted_on(); ?>

                                  </div><!-- .news-caption -->
                              </div><!-- .new-top -->
                          </li>

                    <?php if( $news_count == 3 ) { ?>

                      </ul>
                  </div><!-- .news-gallery -->

                  <?php
                            }
                        }

                    if( $news_count == 4 ) {
                  ?>

                  <?php
                    $news_class_hf = '';
                      if( !has_post_thumbnail( ) ) {
                      $news_class_hf = 'news-img-hf';
                    }
                  ?>

                  <div class="main-news">
                      <div class="main-news-wrapper <?php echo esc_attr( $news_class_hf ); ?>">
                          <div class="overlay"></div>
                          <a href="<?php the_permalink(); ?>">

                            <?php
                                if( has_post_thumbnail( ) ) {
                                    the_post_thumbnail( 'edu-care-news-hf' );
                                } ?>

                          </a>
                          <div class="news-caption">
                              <div class="post-date">
                                  <span class="date"> <?php echo esc_html( get_the_date( __( 'M j', 'edu-care' ) )); ?> </span>
                                  <span class="year"> <?php echo esc_html( get_the_date( __( 'Y', 'edu-care' ) )); ?> </span>
                              </div>
                              <header class="entry-header">
                                  <h5 class="entry-title">
                                  <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h5>
                              </header>
                              
                              <?php edu_care_posted_on(); ?>
                              
                          </div><!-- .news-caption -->

                      </div><!-- .main-news-wrapper -->
                  </div><!-- .main-news -->

                <?php 
                    }

                    $news_count++;

                  endwhile;

                  ?>

              </div><!-- .news-content-wrapper -->

             <?php
                  wp_reset_postdata();

                endif; ?>

          </div><!-- .news-wrapper -->

      </div><!-- .container -->
    </section><!-- .news-section -->

<?php
    }
  }

endif;

add_action( 'edu_care_news', 'edu_care_news_section', 10 );


// Mailchimp section
if ( ! function_exists( 'edu_care_mailchimp_section' ) ) :

  function edu_care_mailchimp_section(){

    $theme_options  = edu_care_theme_options();

    $newsletter     = $theme_options['ec_newsletter'];

    if( !empty( $newsletter ) ){ 

      $newsletter_args = array( 
        'page_id'         => absint( $newsletter ), 
        'post_status'     => 'publish',
      );

      $newsletter_query = new WP_Query( $newsletter_args ); 

      if ( $newsletter_query->have_posts() ) : 

      while ( $newsletter_query->have_posts() ) : $newsletter_query->the_post();

      $subscribe_img_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
     ?>

    <section class="subscribe-part  top-bottom-space" style="background: url(<?php echo esc_url($subscribe_img_url[0]); ?>) top center no-repeat; background-size: cover;">
      <div class="overlay"></div>
      <div class="container">

          <div class="subscribe-part-wrapper">

            <?php  ?>

              <div class="section-intro">
                  <div class="entry-content">
                      <p> <?php the_title(); ?> </p>
                  </div>
              </div><!-- .section-intro -->

                <div class="subsrib-form-wrapper">
                    <?php the_content( ); ?>
                </div>

          </div><!-- .subscribe-part-wrapper -->

      </div><!-- .container -->

      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
          <polygon fill="white" points="100,100 0,100 0,0""/>
      </svg>
      
  </section><!-- .subscribe-part -->

<?php
      endwhile; 
      wp_reset_postdata();
      endif;
    }
  }

endif;

add_action( 'edu_care_mailchimp', 'edu_care_mailchimp_section', 10 );


// Blog N Event section
if ( ! function_exists( 'edu_care_event_n_blog_section' ) ) :

  function edu_care_event_n_blog_section(){

    $theme_options  = edu_care_theme_options();
    
    $events         = $theme_options['ec_events'];

    $blogs         = $theme_options['ec_blogs'];

    if( !empty( $events ) || !empty( $blogs ) ){

    ?>

    <section class="event-blog-part top-bottom-space">
        <div class="container">
          <div class="row">

          <?php 
            $enb_class = '';
            if( !empty( $events ) && !empty( $blogs ) ) {
              $enb_class = 'col-6';
            } elseif ( ( !empty( $events ) && empty( $blogs ) ) || ( empty( $events ) && !empty( $blogs ) )  ) {
              $enb_class = 'col-12';
            }

          ?>

          <?php if( !empty( $events ) ){

            $events_args = array( 
              'cat'             => absint( $events ), 
              'post_status'     => 'publish', 
              'posts_per_page'  => 6
            );

            $events_query = new WP_Query( $events_args ); 

            if ( $events_query->have_posts() ) :

            $events_count= 1;

          ?>

            <div class="event-wrapper <?php echo esc_attr( $enb_class ); ?>">
                <div class="event-intro">
                    <span class="category"><i class="fa fa-calendar"></i>
                    <a href="<?php echo esc_url(get_category_link( absint( $events ) )); ?>" > <?php echo esc_html(get_the_category_by_ID( absint( $events ) )); ?> </a></span>
                </div><!-- .blog-intro -->

                                
                <div id="event" class="owl-carousel owl-theme">

                <?php  while ( $events_query->have_posts() ) : $events_query->the_post();
                  if ($events_count % 2 != 0) {
                ?>

                    <div class="item">

                    <?php } ?>

                        <div class="event-first">
                            <div class="date-wrapper">
                                <div class="post-date">
                                    <span class="date"> <?php echo esc_html( get_the_date( __( 'M j', 'edu-care' ) )); ?> </span>
                                    <span class="year"> <?php echo esc_html( get_the_date( __( 'Y', 'edu-care' ) )); ?> </span>
                                </div>
                            </div><!-- .date-wrapper -->

                            <div class="event-content">
                                    <h5 class="entry-title"><a href="<?php the_permalink(); ?>"> 
                                      <?php the_title( ); ?> </a></h5>
                                    <div class="entry-content">
                                        <p> <?php echo esc_html( edu_care_limit_words( get_the_excerpt(), 18 ) ); ?> </p>
                                    </div>
                                </div><!-- .event-content -->
                            </div><!-- .event-first -->
                            
                        <?php if ( $events_count % 2 == 0 ) { ?>
                        </div>
                        <?php } ?>

                        <?php

                    $events_count++;

                  endwhile;

                  if ( $events_count % 2 == 0 ) { ?>
                    </div>
                  <?php } ?>

                </div>
                </div><!-- .event-wrapper -->

                <?php 
                    wp_reset_postdata();

                  endif;

                } if( !empty( $blogs ) ){ ?>

                <?php 
                $blogs_args = array( 
                  'cat'             => absint( $blogs ), 
                  'post_status'     => 'publish', 
                  'posts_per_page'  => 2 
                );

                $blogs_query = new WP_Query( $blogs_args ); 

                if ( $blogs_query->have_posts() ) :

                ?>

                <div class="blog-wrapper <?php echo esc_attr( $enb_class ); ?>">
                    <div class="blog-intro">
                        <span class="category"><i class="fa fa-file-text-o">
                        </i><a href="<?php echo esc_url(get_category_link( absint( $blogs ) )); ?>" >
                        <?php echo esc_html(get_the_category_by_ID( absint( $blogs ) )); ?>
                        </a></span>
                        <a href="<?php echo esc_url(get_category_link( absint( $blogs ) )); ?>" class="btn"> <?php esc_html_e( 'view all', 'edu-care' ); ?> </a>
                    </div><!-- .blog-intro -->

                  <?php while ( $blogs_query->have_posts() ) : $blogs_query->the_post();

                  $blog_class = '';
                  if(has_post_thumbnail( )) {
                    $blog_class = 'col-9';
                  } else {
                    $blog_class = 'col-12';
                  }
                   ?>

                    <div class="blog-content">

                    <?php if ( has_post_thumbnail() ) { ?>
                        <div class="blog-img col-3">
                            <a href="<?php the_permalink(); ?>">

                            <?php 

                              the_post_thumbnail( 'edu-care-blog' ); 

                            ?>

                            </a>
                        </div><!-- .blog-img -->

                        <?php } ?>

                        <div class="blog-caption <?php echo esc_attr( $blog_class ); ?>">
                            <h5 class="entry-title">
                            <a href="<?php the_permalink(); ?>" class="blog-title">
                              <?php the_title( ); ?> </a></h5>
                            <a href="<?php the_permalink(); ?>" class="post-meta-date">
                              <?php edu_care_posted_on(); ?> </a>
                            <a href="<?php the_permalink(); ?>" class="btn"> <?php esc_html_e( 'Read more', 'edu-care' ); ?> </a>
                        </div><!-- .blog-caption -->
                    </div><!-- .blog-content -->

                    <?php endwhile; 
                      wp_reset_postdata();
                    ?>

                </div><!-- .blog-wrapper -->

              <?php endif; ?>

                <?php } ?>

              </div>
            </div><!-- .contanier -->
        </section><!-- .event-blog-part -->
<?php
    }
  }

endif;

add_action( 'edu_care_event_n_blog', 'edu_care_event_n_blog_section', 10 );


// Contact section
if ( ! function_exists( 'edu_care_contact_section' ) ) :

  function edu_care_contact_section(){

    $theme_options  = edu_care_theme_options();
    
    $contact        = $theme_options['ec_contact'];

    if( !empty( $contact ) ){
    ?>

    <section class="registation-part">
        <div class="container">
            <div class="registation-wrapper">
              <div class="row">

          <?php 
            $contact = array( 
              'page_id'         => absint( $contact ), 
              'post_status'     => 'publish',
            );

            $contact_query = new WP_Query( $contact ); 

            if ( $contact_query->have_posts() ) :

            while ( $contact_query->have_posts() ) : $contact_query->the_post(); 

            $contact_cls = '';

            if ( has_post_thumbnail() ) {

              $contact_cls = 'col-6';

            } else {

              $contact_cls = 'col-12';

            }

              if ( has_post_thumbnail() ) { ?>

              <div class="registor-img-box <?php echo esc_attr( $contact_cls ); ?>">

              <?php
                the_post_thumbnail(); 
              ?>

                </div><!-- .registor-img-box -->

            <?php } ?>

                <div class="restation-from-wrapper <?php echo esc_attr( $contact_cls ); ?>">
                    <div class="form-title">
                        <header  class="entry-header">
                            <h4 class="entry-title"> <?php the_title( ); ?> </h4>
                        </header><!-- /header -->

                    </div><!-- .form-title -->

                    <?php the_content( ); ?>


                    </div><!-- .restation-from-wrapper -->

                <?php endwhile; 
                  wp_reset_postdata();

                endif; ?>

                </div>
            </div><!-- .registation-wrapper -->

        </div><!-- .container -->
    </section><!-- .registation-part -->

<?php
    }
  }

endif;

add_action( 'edu_care_contact', 'edu_care_contact_section', 10 );
