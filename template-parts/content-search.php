<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package sth
 */

?>

  <article id="post-<?php the_ID(); ?>" <?php post_class('sthft-search-result'); ?>>
    <header class="entry-header">
      <?php the_title( sprintf( '<h3 class="search-result-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

      <?php if ( 'post' == get_post_type() ) : ?>
      <div class="entry-meta">
        <?php sth_posted_on(); ?>
      </div><!-- .entry-meta -->
      <?php endif; ?>
    </header><!-- .entry-header -->

    <div class="entry-summary">
      <?php the_excerpt(); ?>
    </div><!-- .entry-summary -->

    <footer>
      <?php sth_entry_footer(); ?>
    </footer><!-- .entry-footer -->
  </article><!-- #post-## -->