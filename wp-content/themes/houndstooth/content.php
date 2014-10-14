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
          $content = str_replace( '<htthumbs>', '<htthumbs></div></div>', $content);
          $content = str_replace( '</htthumbs>', '<div class="row"><div class="col-md-8"></htthumbs>', $content);
        
          echo $content;

        ?> 
      </div>
    </div>
		<div class="clearfix"></div>
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
