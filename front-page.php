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

<section class="jumbotron" style="background-image: url('<?php echo CFS()->get( 'jumbotron_img' );?>')">
   <div class="container">
     <div class="col-md-12">
       <h1><?php echo CFS()->get( 'jumbotron_title' );?></h1>
       <p>
        <?php echo CFS()->get( 'jumbotron_subtitle' );?>
       </p>
       <p>
         <?php $jbo_link = CFS()->get( 'jumbotron_btn' );?>
         <a class="btn btn-warning btn-lg" href="<?php echo $jbo_link["url"];?>" title="<?php echo $jbo_link["text"];?>" target="<?php echo $jbo_link["target"];?>" role="button"><?php echo $jbo_link["text"];?></a>
      </p>
     </div>  
  </div>
</section>

<section class="page-feature-container gray under-jumbotron">
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

<?php
$featurettes = CFS()->get( 'featurette_sections' );
foreach ( $featurettes as $featurette ) { ?>


  <section class="page-featurette-section">
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
  </section>
<?php };?>

<section id="primary" class="page-service-marketing-container">
  <div class="container">
    <div class="row">
      <main id="main" class="col-md-12" role="main">

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
        
        </main><!-- #main -->

    </div><!-- #primary -->
    

  </div>
</section>

<section class="page-category-post-list">
  <div class="container">
    <div class="row">
      
      <div class="col-md-6">
        <?php 
        // News post item category
        
        // WP_Query arguments
        $left_col_args = array (
          
          'category_name' => 'news',
          'posts_per_page' => 3
          
        );
   
        // the query
        $cat_query_left = new WP_Query( $left_col_args ); ?>

        <?php if ( $cat_query_left->have_posts() ) : ?>

          <!-- the loop -->
          <?php while ( $cat_query_left->have_posts() ) : $cat_query_left->the_post(); ?>
          <div class="row">
            
            <div class="col-md-4 col-sm-4 col-xs-4">
              <?php if ( has_post_thumbnail() ) :?>
                <a href="<?php the_permalink() ;?>">
                  <?php the_post_thumbnail('thumbnail', array('class' => 'img-responsive img-full')); ?>
                </a>
              <?php else :?>
                <a href="<?php the_permalink() ;?>">
                  <img class="img-responsive img-full" src="<?php echo get_template_directory_uri() . "/images/hex_info_small.png"; ?>" alt="News">
                </a>
              <?php endif ;?>
            </div>
            
            <div class="col-md-8">
              <?php the_title( sprintf( '<h3 class="category-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
              <?php the_excerpt(); ?>
            </div>
            
          </div>
          <?php endwhile; ?>
          <!-- end of the loop -->

          <?php wp_reset_postdata(); ?>
        
        <?php
          $category_id = get_cat_ID( 'news' );
          $category_link = get_category_link( $category_id );
        ?>
        
        <a class="btn btn-block btn-wire" href="<?php echo esc_url( $category_link ); ?>" title="News Category">Read more ...</a>

        
        <?php else : ?>
          <p><?php _e( 'Please write a post...' ); ?></p>
        <?php endif; ?>
        
      </div>
      
      <div class="col-md-6">
        <?php 
        // Right hand column that takes user submitted category to fill the front page feed
        // 
        // If no category is provided this posts everything
        $user_submitted_category = CFS()->get( 'right_column_category' );
        $user_submitted_category = strtolower( $user_submitted_category );
        $user_submitted_category = str_replace(' ', '-', $user_submitted_category );
        

        // WP_Query arguments
        $right_col_args = array (
          
          'category_name' => $user_submitted_category,
          'posts_per_page' => 3
          
        );
   
        // the query
        $cat_query_right = new WP_Query( $right_col_args ); ?>

        <?php if ( $cat_query_right->have_posts() ) : ?>

          <!-- the loop -->
          <?php while ( $cat_query_right->have_posts() ) : $cat_query_right->the_post(); ?>
          <div class="row">
            
            <div class="col-md-4 col-sm-4 col-xs-4">
              <?php if ( has_post_thumbnail() ) :?>
                <a href="<?php the_permalink() ;?>">
                  <?php the_post_thumbnail('thumbnail', array('class' => 'img-responsive img-full')); ?>
                </a>
              <?php else :?>
                <a href="<?php the_permalink() ;?>">
                  <img class="img-responsive img-full" src="<?php echo get_template_directory_uri() . "/images/hex_info_small.png"; ?>" alt="News">
                </a>
              <?php endif ;?>
            </div>
            
            <div class="col-md-8">
              <?php the_title( sprintf( '<h3 class="category-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
              <?php the_excerpt(); ?>
            </div>
            
          </div>
          <?php endwhile; ?>
          <!-- end of the loop -->

          <?php wp_reset_postdata(); ?>
        
         <?php
          $category_id = get_cat_ID( $user_submitted_category );
          $category_link = get_category_link( $category_id );
        ?>

        <a role="button" class="btn btn-block btn-wire" href="<?php echo esc_url( $category_link ); ?>" title="<?php echo $user_submitted_category;?> Category">Read more ...</a>


        <?php else : ?>
          <p><?php _e( 'Please write a post...' ); ?></p>
        <?php endif; ?>
        
      </div>
      
    </div>
  </div>
</section>

<section class="page-marketing-four-columns-container">
  <div class="container">
    
    <div class="row">      
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