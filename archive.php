<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package sth
 */

get_header(); ?>

<section class="breadcrumb-container">
  <div class="container">
    <div class="col-md-12">
      <?php // sth_breadcrumbs(); ?>
      <ul id="breadcrumbs" class="breadcrumb"><li class="item-home"><a class="bread-link bread-home" href="<?php echo home_url(); ?>" title="Home">Home</a></li><li class="separator separator-home"> &gt; </li><li class="item-current item-19"><span class="bread-current bread-19"> Archive</span></li></ul>
    </div>
  </div>
</section>

	<div id="primary" class="container">
    
    <div class="row">
      <main id="main" class="col-md-7 col-sm-8" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'archive' );
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
      
      <aside class="col-md-4 col-md-offset-1 col-sm-4">
        <?php get_sidebar(); ?>
      </aside>
      
    </div>
	</div><!-- #primary -->


<?php get_footer(); ?>
