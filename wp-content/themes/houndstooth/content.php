<!-- content.php -->

<header class="entry-header">
  <?php 
    if ( is_single() ) {
      echo '<h2 class="entry-title">' . get_the_title() . '</h2>';
    } else {
      echo '<h3 class="entry-title"><a href="' . get_the_permalink() .'" rel="bookmark">' . get_the_title() . '</a></h3>';
    }
  ?>

	</header><!-- .entry-header -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php if (is_search()) { // Only display Excerpts for Search ?> 
	<div class="entry-summary">
		<?php the_excerpt(); ?> 
		<div class="clearfix"></div>
	</div><!-- .entry-summary -->
	<?php } else { ?> 
	<div class="entry-content">
        <div class='row'>
          <div class='col-md-8'>
            <?php 
              $content= get_the_content(bootstrapBasicMoreLinkText()); 
              $content = apply_filters ('the_content', $content);
              // This creates a new full-width row to allow the thumbnail design, if the [htthumbs] shorttag is used:
              $content = str_replace( '<htthumbs>', '<htthumbs></div></div>', $content);
              $content = str_replace( '</htthumbs>', '<div class="row"><div class="col-md-8"></htthumbs>', $content);
            
              echo $content;

            ?> 
          </div>
          <?php /* Note - show the categories in the right column for the first post only. It would
                   seem like a better idea to do this column layout in the parent template and stick
                   the category list in there, but this leads to trouble with the gallery & thumbs
                   hacks (i.e. where we want insert full width content into a 2/3 width content area)
                 */ ?>
          <?php if ($wp_query->current_post < 1 && !is_single() ) { ?>
            <div class='col-md-4'>
              <?php wp_list_categories( array('child_of'=>NEWS_CATEGORY_ID, 'show_count'=>1) ); ?>
            </div>
          <?php } ?>
        </div>
		<?php 
		/**
		 * This wp_link_pages option adapt to use bootstrap pagination style.
		 * The other part of this pager is in inc/template-tags.php function name bootstrapBasicLinkPagesLink() which is called by wp_link_pages_link filter.
		 */
		wp_link_pages(array(
			'before' => '<div class="page-links">' . __('Pages:', 'bootstrap-basic') . ' <ul class="pagination">',
			'after'  => '</ul></div>',
			'separator' => ''
		));
		?> 
	</div><!-- .entry-content -->
	<?php } //endif; ?> 

	
</article><!-- #post-## -->
