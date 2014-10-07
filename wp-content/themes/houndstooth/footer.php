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
            <a href="http://twitter.com">The Houndstooth Project on Twitter</a>
          </div>

          <div class="col-md-4">
            <p><a href="#">Copyright information for users</a></p>
            <p>Copyright &#169; The Houndstooth Project <?php echo date('Y'); ?></p>
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
