<?php
/**
 * The template part for displaying Previous and Next links in Bootstrap pager style
 *
 * http://getbootstrap.com/components/#pagination-pager
 * 
 * @package sth
 */
?>
<nav>
  <ul class="pager">
    <?php previous_post_link( "<li class='previous'>%link</li>", " <span aria-hidden='true'>&larr;</span> Previous", TRUE); ?>
    <?php next_post_link( "<li class='next'>%link</li>", "Next <span aria-hidden='true'>&rarr;</span>", TRUE); ?>
  </ul>
</nav>