<?php
/**
 * The template for displaying all single posts.
 *
 * @package sth
 */

get_header(); ?>

<section class="breadcrumb-container">
  <div class="container">
    <div class="col-md-12">
      <?php sth_breadcrumbs(); ?>
    </div>
  </div>
</section>

	<div id="primary" class="container">
    
    <div class="row">
      <main id="main" class="col-md-7 col-sm-8" role="main">

        <?php while ( have_posts() ) : the_post(); ?>

          <?php get_template_part( 'template-parts/content', 'single' ); ?>
          <?php get_template_part( 'template-parts/content', 'nav' ); ?>

        <?php endwhile; // End of the loop. ?>

        </main><!-- #main .container -->
      
      <aside class="col-md-4 col-md-offset-1 col-sm-4">
        <?php get_sidebar(); ?>
      </aside>
    </div>
	</div><!-- #primary-->

<?php get_footer(); ?>