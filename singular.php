<?php get_header(); ?>  

  <main>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
      
      <article class="singular__articlewrapper">

        <header class="singular__header" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat center center; background-size: cover;">
          <div class="container">
            <div class="singular__headertextcontainer">
              <h1 class="title"><?php the_title(); ?></h1>
            </div>
          </div>
        </header>

        <div class="container singular__bodycontainer">
          <div class="singular__contentcontainer">
            <?php the_content(); ?>
          </div>

    <?php endwhile; endif; ?>

          <aside class="singular__sidebar">
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequuntur, aliquam? Ex quas repellat illo dolorem atque aperiam nulla iusto architecto quaerat iste, dolores, nostrum eveniet, impedit quisquam eligendi eos eaque a. Vitae, aliquam, tempora accusamus illo quod, autem rem reiciendis in culpa omnis vel? Illum fugiat veritatis ducimus atque iure aliquam sint beatae aperiam quibusdam.</p>
          </aside>
          
        </div>
      </article>
      
    

  </main>

<?php get_footer(); ?>