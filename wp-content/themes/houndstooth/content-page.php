<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
    <div class='row'>
      <div class='col-md-8'>
  		  <?php 
          // search the content for key
          // if found replace the opening key with closing divs
          // all that follows is then 
          $content = get_the_content(); 
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
	
	<footer class="entry-meta">
		<?php bootstrapBasicEditPostLink(); ?> 
	</footer>
</article><!-- #post-## -->
