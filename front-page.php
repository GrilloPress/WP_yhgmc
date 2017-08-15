<?php
/**
 * The template for displaying the front page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package sth
 * 
 */
get_header(); ?>
<div class="container">
  <div class="col-md-12">
    <section class="jumbotron" 
             <?php if (!empty(CFS()->get( 'jumbotron_img' ))) :?>
             style="background-image: url('<?php echo CFS()->get( 'jumbotron_img' );?>')"
             <?php endif ;?>
             >
     
       <h1><?php echo CFS()->get( 'jumbotron_title' );?></h1>
       <p>
        <?php echo CFS()->get( 'jumbotron_subtitle' );?>
       </p>
       <p>
        <?php $jbo_link = CFS()->get( 'jumbotron_btn' );?>
        <a class="btn btn-warning btn-lg" href="<?php echo get_permalink( get_page_by_title( 'Getting involved' ) ) ; ?>" title="<?php echo $jbo_link["text"];?>" target="<?php echo $jbo_link["target"];?>" role="button"><?php echo $jbo_link["text"];?></a>
        <a href="<?php echo get_permalink( get_page_by_title( 'About us' ) ) ; ?>" title="Learn more about the YHGMC" class="btn btn-primary btn-lg">Learn more</a>
      </p>

    </section>
  </div>
</div>

<?php
$featured_pages_published = CFS()->get( 'feature_published' );
if ( $featured_pages_published ) {;?>
<section class="page-feature-container">
  <div class="container">
    <div class="row">
        
        <?php
        
      $featured_pages = array("one", "two", "three", "four");
      foreach ($featured_pages as $fp) { ;?>
      
      
      <div class="col-md-3">
        <div class="page-feature-block">
          
          <?php $image_id = CFS()->get( 'feature_image_' . $fp );
          echo wp_get_attachment_image( $image_id, 'thumbnail', "", array( "class" => "img-marketing" ) );?>
          
          <h4><?php echo CFS()->get('feature_title_' . $fp); ?></h4>

          <?php echo CFS()->get('feature_body_' . $fp); ?>

          <?php $fb_link = CFS()->get( 'feature_link_' . $fp );?>
          <p>
            <a class="btn btn-primary" href="<?php echo $fb_link["url"];?>" title="<?php echo $fb_link["text"];?>" target="<?php echo $fb_link["target"];?>" role="button"><?php echo $fb_link["text"];?></a>
          </p>
          
        </div>
      </div>
      
      <?php } reset($featured_pages);?>
      
      
    </div>
  </div>
</section>
<?php };?>

<?php // Section that publishes a loop of featurettes starting with a conditional if a conditional is set to published in the WP admin
$featurette_published = CFS()->get( 'featurette_published' );
if ( $featurette_published ) {
  $featurettes = CFS()->get( 'featurette_sections' );
  foreach ( $featurettes as $featurette ) { ?>

    <main class="page-featurette-section" role="main">
      <div class="container">

        <div class="row">
          <div class="col-md-offset-2 col-md-8">
            <h2><?php echo $featurette['featurette_header'];?></h2>
            <hr>
          </div>
        </div>

        <?php // Featurette inner loop start
        $featurette_inners = $featurette['featurette_inner'];
        foreach ( $featurette_inners as $featurette_inner ) { ?>

        <div class="col-md-12">
          <div class="page-featurette-section-inner">
            <div class="row">
              <div class="col-md-12">
                <h3><?php echo $featurette_inner['featurette_card_header'];?></h3>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <?php $featurette_image_id = $featurette_inner[ 'featurette_card_image' ];
                echo wp_get_attachment_image( $featurette_image_id, 'large', "", array( "class" => "img-marketing" ) );?>
              </div>
              <div class="col-md-8">
                <?php echo $featurette_inner['featurette_card_body'];?>
              </div>
            </div> 
          </div>
        </div>     
        <?php };?>

      </div>
    </main>
  <?php };
};?>

<section id="primary" class="page-service-marketing-container">
  <div class="container">
    <div class="row">
      <section id="main" class="col-md-12">

        <?php while ( have_posts() ) : the_post(); ?>

          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
              
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
        
        </section><!-- #main -->

    </div><!-- #primary -->
    

  </div>
</section>

<section class="page-category-post-list">
  <div class="container">
    <div class="row">
      
        <?php 
        // Patient story post item category
        
        // WP_Query arguments
        $col_args = array (
          
          'category_name' => 'patient-stories',
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
            
            <div class="category-label label-patient-story">
              Patient Story
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
    
    
    <div class="row">
      
        <?php 
        // News post item category
        
        // WP_Query arguments
        $col_args = array (
          
          'category_name' => 'news',
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

<?php get_footer(); ?>