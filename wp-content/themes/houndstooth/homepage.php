<?php
/**
 * Homepage template
 * 
 * @package bootstrap-basic

Template Name: Homepage

 */

get_header();

/**
 * determine main column size from actived sidebar
 */
$main_column_size = bootstrapBasicGetMainColumnSize();
?>
<div class="col-md-<?php echo $main_column_size; ?> content-area" id="main-column">
  <main id="main" class="site-main" role="main">
    <h2>Houndstooth</h2>
    <div class='row'>
      <div class='col-md-8'>
        <div class='htimgcell_large'>
          <a href='<?php echo get_permalink(HOUNDSTOOTH_PAGE_ID); ?>'><?php echo get_the_post_thumbnail(HOUNDSTOOTH_PAGE_ID, array(630,420)); ?></a>
        </div>
      </div>
      <div class='col-md-4'>
        <div class='htcell'>
          <?php echo page_teaser(HOUNDSTOOTH_PAGE_ID) ?><br />
            <a href="<?php echo get_category_link(SUBMISSIONS_CATEGORY_ID) ?>">Browse</a><br />
            <a href="<?php echo get_page_link(SUBMIT_PAGE_ID) ?>">Submit</a>
        </div>
      </div>
    </div>

    <h2>Research Studio</h2>
    <div class='row'>
      <div class='col-md-8'>
        <div class='htimgcell_large'>
          <a href='<?php echo get_permalink(RESEARCH_STUDIO_PAGE_ID); ?>'><?php echo get_the_post_thumbnail(RESEARCH_STUDIO_PAGE_ID, array(630,420)); ?></a>
        </div>
      </div>
      <div class='col-md-4'>
        <div class='htcell htcellshort'>
          <?php echo page_teaser(RESEARCH_STUDIO_PAGE_ID) ?><br />
            <a href="<?php echo get_page_link(PROFILES_PAGE_ID) ?>">Profiles</a><br />
            <a href="<?php echo get_page_link(PROJECTS_PAGE_ID) ?>">Projects</a>
        </div>
      </div>
    </div>

    <h2>News</h2>
    <div class='row'>
      <?php
      $news_id = NEWS_CATEGORY_ID; 
      $news_link = get_category_link($news_id);
      query_posts( array('cat' => $news_id, 'posts_per_page' => 6) );

      if (have_posts()) { 
        $count = 0;
        while (have_posts()) {
          $count+=1;
          the_post();
          ?> 
            <div class='col-md-4'>
              <div class='htcell'>
                <div class='news_title'><?php the_title(); ?></div>
                <div class='htimgcell'>
                  <a href='<?php the_permalink(); ?>'><?php echo get_the_post_thumbnail(null,array(300,200)); ?></a>
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
        
      } else {
        get_template_part('no-results', 'index');
      } // endif; 
      ?>
    </div>

  </main>
</div>
<?php get_footer(); ?> 
