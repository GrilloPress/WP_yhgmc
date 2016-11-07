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
      <a href="<?php echo home_url('get-involved'); ?>" class="" title="">
        Find out how you can get involved
      </a>
    </div>
  </div>
</section>
<?php endif ;?>