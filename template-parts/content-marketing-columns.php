<?php

/*
 * To change this template use Tools | Templates.
 */
$marketing_blocks_published = CFS()->get( 'marketing_block_published' );
if ( $marketing_blocks_published ) {;?>
<section class="page-marketing-four-columns-container">
  <div class="container">
    <div class="row">
      
      <h2></h2>
      
      <?php
      $marketing_blocks = array("one", "two", "three", "four");
      foreach ($marketing_blocks as $mb) { ;?>
      
      <div class="col-md-3 col-sm-6">
        <div class="card-marketing">
          <?php $marketing_image_id = CFS()->get( 'marketing_image_' . $mb );
            echo wp_get_attachment_image( $marketing_image_id, array('300', '9999'), "", array( "class" => "img-marketing" ) );?>
            
            <h4 class="media-heading"><?php echo CFS()->get('marketing_title_' . $mb); ?></h4>
            <?php echo CFS()->get('marketing_body_' . $mb); ?>
        </div>
      </div>
      
      <?php } reset($marketing_blocks);?>
    </div>
    
    <div class="row">
      <?php
      $marketing_blocks = array("five", "six", "seven", "eight");
      foreach ($marketing_blocks as $mb) { ;?>
      
      <div class="col-md-3 col-sm-6">
        <div class="card-marketing">
          <?php $marketing_image_id = CFS()->get( 'marketing_image_' . $mb );
            echo wp_get_attachment_image( $marketing_image_id, array('300', '9999'), "", array( "class" => "img-marketing" ) );?>
        
            <h4 class="media-heading"><?php echo CFS()->get('marketing_title_' . $mb); ?></h4>
            <?php echo CFS()->get('marketing_body_' . $mb); ?>
        </div>
      </div>
      <?php } reset($marketing_blocks);?>
    </div>
  </div>
</section>
<?php };?>