<?php
/**
 * The theme footer
 * 
 * @package bootstrap-basic
 */
?>

			</div><!--.site-content-->
	  </div>	<!--.container page-container-->

    <div class='separator'>
    </div>	
    <div class='container page-container'>
			<footer id="site-footer" role="contentinfo">
				<div id="footer-row" class="row site-footer">
					<div class="col-md-4">
            <a href="mailto:info@houndstoothproject.org">Email: info@houndstoothproject.org</a><br />
            <a href="http://twitter.com"><img src="<?php echo get_bloginfo('template_url') ?>/img/twitter-24.png" />The Houndstooth Project on Twitter</a>
          </div>

          <div class="col-md-4">
            Copyright &#169; The Houndstooth Project <?php echo date('Y'); ?>
          </div>

          <div class="col-md-4">
            <div class="search-box">
              <?php get_search_form(); ?>
            </div>
          </div>
          <div>
						<?php /* dynamic_sidebar('footer-right'); */ ?><?php /* <------ what's this for? */ ?> 
					</div>
				</div>
			</footer>
		</div><!--.container page-container-->
		
		
		<!--wordpress footer-->
		<?php wp_footer(); ?>

  <script type="text/javascript">
  
  //  jQuery("div.site-content-wrapper").fancy_scroll({
  //    animation: "bounce",
  //    innerWrapper: ".site-content"
  //  });
  </script>
 
	</body>
</html>
