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
    <h2><a href='<?php echo get_permalink(HOUNDSTOOTH_PAGE_ID); ?>'>Houndstooth</a></h2>
    <div class='row'>
      <div class='col-md-8'>
        <div class='htimgcell_large'>
          <a href='<?php echo get_permalink(HOUNDSTOOTH_PAGE_ID); ?>'>
            <?php 
              $image_id = get_post_thumbnail_id( HOUNDSTOOTH_PAGE_ID );
            ?>
            <img src="<?php echo get_image_src( $image_id, 'large' ); ?>" />
          </a>
        </div>
      </div>
      <div class='col-md-4'>
        <div class='htcell'>
          <?php echo page_teaser(HOUNDSTOOTH_PAGE_ID) ?> | 
            <a href="<?php echo get_category_link(SUBMISSIONS_CATEGORY_ID) ?>">Browse</a> | 
            <a href="<?php echo get_page_link(UPLOAD_PAGE_ID) ?>">Upload</a>
        </div>
      </div>
    </div>

    <h2><a href='<?php echo get_permalink(RESEARCH_STUDIO_PAGE_ID); ?>'>Research Studio</a></h2>
    <div class='row'>
      <div class='col-md-8'>
        <div class='htimgcell_large'>
          <a href='<?php echo get_permalink(RESEARCH_STUDIO_PAGE_ID); ?>'>
            <?php
              $image_id = get_post_thumbnail_id( RESEARCH_STUDIO_PAGE_ID );
            ?>
            <img src="<?php echo get_image_src( $image_id ); ?>" />
          </a>
        </div>
      </div>
      <div class='col-md-4'>
        <div class='htcell htcellshort'>
          <?php echo page_teaser(RESEARCH_STUDIO_PAGE_ID) ?> | Link 2 | Link 3 
    <!-- 
            <a href="<?php echo get_page_link(PROFILES_PAGE_ID) ?>">Profiles</a><br />
            <a href="<?php echo get_page_link(PROJECTS_PAGE_ID) ?>">Projects</a>
    -->
        </div>
      </div>
    </div>

    <?php
    $news_id = NEWS_CATEGORY_ID; 
    $news_link = get_category_link($news_id);
    ?>
    <h2><a href="<?php echo $news_link ?>">News</a></h2>
    <div class='row'>
      <?php 
      query_posts( array('cat' => $news_id, 'posts_per_page' => 6) );

      if (have_posts()) { 
        $count = 0;
        while (have_posts()) {
          $count+=1;
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
        
      } else {
        get_template_part('no-results', 'index');
      } // endif; 
      ?>
    </div>
    <div class="row">
      <div class="col-md-12 text-right">
        <a href="<?php echo $news_link ?>">All news</a>
      </div>
    </div>

  </main>
</div>
<?php get_footer(); ?> 
