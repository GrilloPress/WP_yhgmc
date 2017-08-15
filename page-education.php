<?php
/**
 * The template for displaying marketing, full-width pages
 *
 * @package sth
 * 
 * 
 * Template Name: Education page
 * 
 */
get_header(); ?>

<section class="breadcrumb-container">
  <div class="container">
    <div class="col-md-12">
      <?php sth_breadcrumbs(); ?>
    </div>
  </div>
</section>

<section id="primary" class="page-service-marketing-container">
  <div class="container">
    <div class="row">
      <main id="main" class="col-md-12" role="main">

        <?php while ( have_posts() ) : the_post(); ?>

          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
              <?php the_title( '<h1 class="marketing-title">', '</h1>' ); ?>
            </header><!-- .entry-header -->

            <div class="entry-content">
              <?php the_content(); ?>
              <?php
                wp_link_pages( array(
                  'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sth' ),
                  'after'  => '</div>',
                ) );
              ?>
            </div><!-- .entry-content -->

            <footer class="entry-footer">
              <?php edit_post_link( esc_html__( 'Edit', 'sth' ), '<span class="edit-link">', '</span>' ); ?>
            </footer><!-- .entry-footer -->
          </article><!-- #post-## -->

        <?php endwhile; // End of the loop. ?>

        <div class="page-service-marketing-columns">
          <div class="row">
            <div class="col-md-6">
              <div class="page-service-marketing-left">
                <?php echo CFS()->get('marketing_section_left'); ?>
              </div>
            </div>

            <div class="col-md-6">
              <div class="page-service-marketing-right">
                <?php echo CFS()->get('marketing_section_right'); ?>
              </div>
            </div>
          </div>
        </div>
        
        </main><!-- #main -->

    </div><!-- #primary -->
    
    <div class="row">
      
        <?php 
        // News post item category
        
        // WP_Query arguments
        $col_args = array (
          
          'category_name' => 'education',
          'posts_per_page' => 3
          
        );
   
        // the query
        $cat_query = new WP_Query( $col_args ); ?>

        <?php if ( $cat_query->have_posts() ) : ?>

          <!-- the loop -->
          <?php while ( $cat_query->have_posts() ) : $cat_query->the_post(); ?>
          
        <div class="col-md-4">
          <div class="page-category-card">
            <?php if ( has_post_thumbnail() ) :?>
                <a href="<?php the_permalink() ;?>">
                  <?php the_post_thumbnail('medium', array('class' => 'img-responsive img-full')); ?>
                </a>
              <?php else :?>
                <a href="<?php the_permalink() ;?>">
                  <img class="img-responsive" src="<?php echo get_template_directory_uri() . "/images/news.jpg"; ?>" alt="News">
                </a>
              <?php endif ;?>

            <div class="category-label">
              News
            </div>
              <?php the_title( sprintf( '<h3 class="category-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
              <?php the_excerpt(); ?>
          </div>
      </div>
        
          <?php endwhile; ?>
          <!-- end of the loop -->

          <?php wp_reset_postdata(); ?>
        
        
        <?php else : ?>
          <p><?php _e( 'Please write a post...' ); ?></p>
        <?php endif; ?>
        

      </div>
    

  </div>
</section>

<?php get_template_part( 'template-parts/content', 'marketing-columns' ); ?>

<?php get_footer(); ?>