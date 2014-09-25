<?php

get_header();

/**
 * determine main column size from actived sidebar
 */
$main_column_size = bootstrapBasicGetMainColumnSize();
?>
<div class="col-md-<?php echo $main_column_size; ?> content-area" id="main-column">
  <main id="main" class="site-main" role="main">
    <div class='row'>
						<?php if (have_posts()) { 
            $count = 0;
						// start the loop
						while (have_posts()) {
              $count+=1;
							the_post();
						  ?> 
                <div class='col-md-4'>
                  <div class='htcell'>
                    <div class='htimgcell'>
                      <a href='<?php the_permalink(); ?>'><?php echo get_the_post_thumbnail(null,array(300,200)); ?></a>
                    </div>
                    <div class="text-right entry-meta">
                      <?php bootstrapBasicPostOn(); ?> 
                    </div>
                  </div>
                </div>
          
              <?php
              if ($count % 3 == 0) {
                $count = 0;
              ?>
                </div>
                <div class='row'>
              <?php
              }
						}// end while
						
						bootstrapBasicPagination();
						?> 
						<?php } else { ?> 
						<?php get_template_part('no-results', 'index'); ?>
						<?php } // endif; ?> 
    </div>
  </main>

</div>
<?php get_footer(); ?> 
