<?php
/**
 * The template used for displaying page content in category.php feed
 *
 * @package sth
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('category-article'); ?>>
  <div class="row">
  
    <div class="col-md-4 col-sm-4 col-xs-4">
      <?php if ( has_post_thumbnail() ) :?>
            <a href="<?php the_permalink() ;?>">
              <?php the_post_thumbnail('thumbnail', array('class' => 'img-responsive img-full')); ?>
            </a>
          <?php else :?>
          <a href="<?php the_permalink() ;?>">
            <img class="img-responsive img-full" src="<?php echo get_template_directory_uri() . "/images/news-square.jpg"; ?>" alt="News">
          </a>
          <?php endif ;?>
    </div>

    <div class="col-md-8 col-sm-8">
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