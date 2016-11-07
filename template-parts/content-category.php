<?php
/**
 * The template used for displaying page content in category.php feed
 *
 * @package sth
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('category-article'); ?>>
  <div class="row">
  
    <div class="col-md-3 col-sm-3 col-xs-12">
      <?php if ( has_post_thumbnail() ) :?>
        <a href="<?php the_permalink() ;?>">
          <?php the_post_thumbnail('medium', array('class' => 'img-responsive img-full')); ?>
        </a>
      <?php else :?>
        <a href="<?php the_permalink() ;?>">
          
          <?php if ( in_category( 'patient-story' ) ) :?>
            <img class="img-responsive img-full" src="<?php echo get_template_directory_uri() . "/images/hex_info_small.png"; ?>" alt="Patient Story">
          <?php else :?>
            <img class="img-responsive" src="<?php echo get_template_directory_uri() . "/images/news.jpg"; ?>" alt="News">
          <?php endif ;?>
          
        </a>
      <?php endif ;?>
    </div>

    <div class="col-md-9 col-sm-9">
      <header class="entry-header">
          <?php the_title( sprintf( '<h2 class="category-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
        </header><!-- .entry-header -->

      <div class="entry-summary">
          <?php the_excerpt(); ?>
        </div><!-- .entry-summary -->

        <footer class="entry-footer">
          <div class="entry-meta">
            <?php sth_posted_on(); ?>
          </div><!-- .entry-meta -->
        </footer><!-- .entry-footer -->
    </div>

  </div>
</article><!-- #post-## -->