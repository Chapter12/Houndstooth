<?php 
/**
 * Displaying archive page (category, tag, archives post, author's post)
 * 
 * @package bootstrap-basic
 */

get_header(); 

?> 

<!-- archive.php -->

<?php get_sidebar('left'); ?> 
				<div class="col-md-12 content-area" id="main-column">
					<main id="main" class="site-main" role="main">
            <?php if (have_posts()) { ?> 

            <header class="page-header">
              <h2 class="page-title">
                <?php
                if (is_category()) :
                  single_cat_title();

                elseif (is_tag()) :
                  single_tag_title();

                elseif (is_author()) :
                  /* Queue the first post, that way we know
                   * what author we're dealing with (if that is the case).
                   */
                  the_post();
                  printf(__('Author: %s', 'bootstrap-basic'), '<span class="vcard">' . get_the_author() . '</span>');
                  /* Since we called the_post() above, we need to
                   * rewind the loop back to the beginning that way
                   * we can run the loop properly, in full.
                   */
                  rewind_posts();

                elseif (is_day()) :
                  printf(__('Day: %s', 'bootstrap-basic'), '<span>' . get_the_date() . '</span>');

                elseif (is_month()) :
                  printf(__('Month: %s', 'bootstrap-basic'), '<span>' . get_the_date('F Y') . '</span>');

                elseif (is_year()) :
                  printf(__('Year: %s', 'bootstrap-basic'), '<span>' . get_the_date('Y') . '</span>');

                elseif (is_tax('post_format', 'post-format-aside')) :
                  _e('Asides', 'bootstrap-basic');

                elseif (is_tax('post_format', 'post-format-image')) :
                  _e('Images', 'bootstrap-basic');

                elseif (is_tax('post_format', 'post-format-video')) :
                  _e('Videos', 'bootstrap-basic');

                elseif (is_tax('post_format', 'post-format-quote')) :
                  _e('Quotes', 'bootstrap-basic');

                elseif (is_tax('post_format', 'post-format-link')) :
                  _e('Links', 'bootstrap-basic');

                else :
                  _e('Archives', 'bootstrap-basic');

                endif;
                ?> 
              </h2>
              
            </header><!-- .page-header -->

            <?php
              // TODO: caption, and link back to main submissions page? 
            if (category_id_is_in_categories(SUBMISSIONS_CATEGORY_ID, get_the_category()) ) { 
            ?>

              <div class='tag_list'>
                <span class='tags_title'>Tags: </span><?php wp_tag_cloud( array('smallest' => 11, 'largest' => 11, 'unit' => 'pt', 'separator' => ' | ')  ); ?>
              </div>
            <?php } ?>          
            <div class='row'> 
            <?php 
            $count = 0;
            /* Start the Loop */
            while (have_posts()) {
              $count +=1;
              the_post();
              ?> 
                <div class='col-md-4'>
                  <div class='htcell'>
                    <div class='news_title'>
                      <a href='<?php the_permalink(); ?>'><?php echo get_the_title(); ?></a>
                    </div>
                    <div class='htimgcell'>
                      <a href='<?php the_permalink(); ?>'>
                        <?php
                          $image_id = get_post_thumbnail_id( );
                        ?>
                        <img src="<?php echo get_image_src( $image_id ); ?>" />
                      </a>
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

            bootstrapBasicPagination(); ?> 

            <?php } else { ?> 

            <?php get_template_part('no-results', 'archive'); ?> 

            <?php } //endif; ?> 
					</main>
        </div>
<?php get_footer(); ?> 


<?php get_footer(); ?> 
