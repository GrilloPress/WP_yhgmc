<?php
/**
 * This template is used for displaying a call to action (CTA) at the bottom of all pages but the get involved page
 * 
 * 
 * @package sth
 */
if ( ! is_page( 'Getting involved' ) ) :?>
<section class="page-cta">
  <div class="container">
    <div class="col-md-12">
      <a href="<?php echo get_permalink( get_page_by_title( 'Getting involved' ) ) ; ?>" class="" title="Find out how to get involved">
        Find out how you can get involved
      </a>
    </div>
  </div>
</section>
<?php endif ;?>