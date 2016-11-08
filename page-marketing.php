<?php
/**
 * The template for displaying marketing, full-width pages
 *
 * @package sth
 * 
 * 
 * Template Name: Full width marketing page
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
    

  </div>
</section>

<section class="page-marketing-four-columns-container">
  <div class="container">
    <div class="row">
      
      <h2></h2>
      
      <?php
      $marketing_blocks = array("one", "two", "three", "four");
      foreach ($marketing_blocks as $mb) { ;?>
      
      <div class="col-md-3 col-sm-6">
              
            <?php $marketing_image_id = CFS()->get( 'marketing_image_' . $mb );
            echo wp_get_attachment_image( $marketing_image_id, array('300', '9999'), "", array( "class" => "img-marketing" ) );?>
            
            <h4 class="media-heading"><?php echo CFS()->get('marketing_title_' . $mb); ?></h4>
            <?php echo CFS()->get('marketing_body_' . $mb); ?>

      </div>
      
      <?php } reset($marketing_blocks);?>
    </div>
    
    <div class="row">
      <?php
      $marketing_blocks = array("five", "six", "seven", "eight");
      foreach ($marketing_blocks as $mb) { ;?>
      
      <div class="col-md-3 col-sm-6">


            <?php $marketing_image_id = CFS()->get( 'marketing_image_' . $mb );
            echo wp_get_attachment_image( $marketing_image_id, array('300', '9999'), "", array( "class" => "img-marketing" ) );?>
        
            <h4 class="media-heading"><?php echo CFS()->get('marketing_title_' . $mb); ?></h4>
            <?php echo CFS()->get('marketing_body_' . $mb); ?>

      </div>
      <?php } reset($marketing_blocks);?>
    </div>
  </div>
</section>


<?php get_footer(); ?>