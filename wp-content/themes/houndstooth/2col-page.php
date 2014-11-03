<?php
/**

Template Name: 2 column content page

 */

get_header();

/**
 * determine main column size from actived sidebar
 */
$main_column_size = bootstrapBasicGetMainColumnSize();
?> 


<?php get_sidebar('left'); ?> 
				<div class="col-md-<?php echo $main_column_size; ?> content-area" id="main-column">

          <header class="entry-header">
            <h2 class="entry-title"><?php the_title() ?></h2>
          </header><!-- .entry-header -->

					<main id="main" class="site-main" role="main">
						<?php 
						while (have_posts()) {
							the_post();
              ?>
                <div class="entry-content">
                  <div class="row">
                    <div class="col-md-6">
                      <?php 
                        $content = get_the_content();
                        $content = apply_filters('the_content', $content);
                        $content = str_replace ('<p>[split]</p>', '</div><div class="col-md-6">', $content);
                        echo $content; 
                      ?>
                    </div>
                  </div>
                </div>
              <?php              

						} //endwhile;
						?> 
					</main>
				</div>
<?php get_footer(); ?> 
