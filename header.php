<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" integrity="sha384-/frq1SRXYH/bSyou/HUp/hib7RVN1TawQYja658FEOodR/FQBKVqT9Ol+Oz3Olq5" crossorigin="anonymous"/>

  <?php wp_head(  ); ?>

</head>

<body <?php body_class(); ?>>
  <div hidden>
    <!-- svg sprite here -->
  </div>

  <div id="sidr">
    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloribus nulla labore facilis, eligendi optio modi dicta. Architecto in culpa fugit dolores quod, non nesciunt saepe eveniet, impedit omnis assumenda dolorem.</p>    
  </div>

  <header class="banner" role="banner">

    <div class="container banner__container">
      
      <div class="logo__container">
        <a href="<?php bloginfo('url'); ?>" class="logo__anchor" title="<?php bloginfo('name') ?>">
          <h1 class="sr-only">Super Simple Skincare</h1>
          <img src="<?php bloginfo('stylesheet_directory'); ?>/images/ssc-logo.svg" alt="<?php bloginfo('name'); ?> logo">
        </a>
      </div>
      
      <div class="navcontainer">
        
        <nav class="mainmenu">
          <ul>
            <li><a href="#">Skin Concerns</a></li>
            <li><a href="#">Skin Routine</a></li>
            <li><a href="#">Body Care</a></li>
            <li><a href="#">Product Reviews</a></li>
            <li><a href="#">Lifestyle</a></li>
            <li><a href="#">Sales &amp; Discounts</a></li>
          </ul>
        </nav>

        <form role="search" method="get" class="searchform" id="searchform" action="/">
          <div><label class="screen-reader-text" for="s">Search for:</label>
              <input type="text" value="" name="s" id="s" />
              <input type="submit" id="searchsubmit" value="Search" />
          </div>
        </form>

      </div>

      <a id="menu-toggle" href="#sidr" class="menu-toggle"><i class="fas fa-bars"></i></a>

    </div>

  </header>