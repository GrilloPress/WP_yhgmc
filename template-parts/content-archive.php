<?php
/**
 * The template used for displaying content in archive.php feed
 *
 * @package sth
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('archive-article'); ?>>


    <header class="entry-header">
        <?php the_title( sprintf( '<h2 class="archive-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
      </header><!-- .entry-header -->
    
    <div class="entry-summary">
        <?php the_excerpt(); ?>
      </div><!-- .entry-summary -->

      <footer class="entry-footer">
        <div class="entry-meta">
			    <?php sth_posted_on(); ?>
		    </div><!-- .entry-meta -->
      </footer><!-- .entry-footer -->


</article><!-- #post-## -->