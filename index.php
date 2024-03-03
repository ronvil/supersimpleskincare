<?php get_header(); ?>  

  <main>

    <section class="hero twocolgrid homesection">

      <?php
      $the_query = new WP_Query( array(
        'posts_per_page'      => 1,
        'post__in'            => get_option( 'sticky_posts' ),
        'ignore_sticky_posts' => 1
      ) ); ?>
      <?php if ( $the_query->have_posts() ) : ?>
              
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        
          <div class="hero__thumb twocolgrid__thumb">
            <?php the_post_thumbnail('full'); ?>
          </div>

          <div class="hero__text twocolgrid__text">
            <div class="hero__innertextcontainer twocolgrid__textinner">
              <h1 class="homesection__head"><?php the_title(); ?></h1>
              <?php the_excerpt(); ?>
              <div class="button__container">
                <a href="<?php the_permalink(); ?>" class="button">Take the quiz!</a>
              </div>
            </div>
          </div>
        
        <?php endwhile; wp_reset_postdata(); ?>
        
      <?php endif; ?>
    
    </section><!-- end .hero -->

    <section class="catcards homesection">
      <div class="cardcards__container container">

        <h1 class="homesection__head">Your best skin without the effort.</h1>

        <div class="catcards__wrapper threecolgrid">
          
          <div class="catcards__card card card-screen">
            <a href="<?php bloginfo('url'); ?>/category/skin-concerns">
              <img src="<?php bloginfo('stylesheet_directory'); ?>/images/square-thumb.jpg" alt="Skin Concerns">
              <h2>Skin concerns</h2>
            </a>
          </div>

          <div class="catcards__card card card-screen">
            <a href="<?php bloginfo('url'); ?>/category/skin-concerns">
              <img src="<?php bloginfo('stylesheet_directory'); ?>/images/square-thumb.jpg" alt="Skin Concerns">
              <h2>Skin concerns</h2>
            </a>
          </div>

          <div class="catcards__card card card-screen">
            <a href="<?php bloginfo('url'); ?>/category/skin-concerns">
              <img src="<?php bloginfo('stylesheet_directory'); ?>/images/square-thumb.jpg" alt="Skin Concerns">
              <h2>Skin concerns</h2>
            </a>
          </div>

          <div class="catcards__card card card-screen">
            <a href="<?php bloginfo('url'); ?>/category/skin-concerns">
              <img src="<?php bloginfo('stylesheet_directory'); ?>/images/square-thumb.jpg" alt="Skin Concerns">
              <h2>Skin concerns</h2>
            </a>
          </div>

          <div class="catcards__card card card-screen">
            <a href="<?php bloginfo('url'); ?>/category/skin-concerns">
              <img src="<?php bloginfo('stylesheet_directory'); ?>/images/square-thumb.jpg" alt="Skin Concerns">
              <h2>Skin concerns</h2>
            </a>
          </div>

          <div class="catcards__card card card-screen">
            <a href="<?php bloginfo('url'); ?>/category/skin-concerns">
              <img src="<?php bloginfo('stylesheet_directory'); ?>/images/square-thumb.jpg" alt="Skin Concerns">
              <h2>Skin concerns</h2>
            </a>
          </div>

        </div>

      </div>
    </section><!-- end .catcards -->

    <section class="cheatsheet twocolgrid homesection">

      <?php
      $the_query = new WP_Query( array(
        'post_type' => 'page',
        'pagename' => 'cheatsheet'
      ) ); ?>
      <?php if ( $the_query->have_posts() ) :  while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        
        <div class="cheatsheet__text twocolgrid__text">
          <div class="twocolgrid__textinner">
            <p class="cheatsheet__sub">SKINCARE MADE EASY</p>
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
          </div>
        </div>
        
        <div class="cheatsheet__thumb twocolgrid__thumb">
          <?php the_post_thumbnail('full'); ?>
        </div>
        
      <?php endwhile;  endif; ?>

    </section><!-- end .cheatsheet -->

    <section class="latest homesection">

      <?php
      $the_query = new WP_Query( array(
        'posts_per_page' => 6
      ) ); ?>
      <?php if ( $the_query->have_posts() ) : ?>
        
        <div class="latest__container container">

          <h1 class="homesection__head">Latest skincare tips and advice</h1>

          <div class="latest__wrapper threecolgrid">
        
          <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        
            <?php get_template_part( 'inc/card', 'article' ); ?>
        
          <?php endwhile; ?>
        
          </div>

          <div class="button__container">
            <a href="#" class="button button-2">Load more</a>
          </div>

        </div>
        
        <?php wp_reset_postdata();  endif; ?>
    
    </section><!-- end .latest -->

  </main>

<?php get_footer(); ?>