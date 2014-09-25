<?php
/**
 * Homepage template
 * 
 * @package bootstrap-basic

Template Name: Homepage 3 col

 */

get_header();

/**
 * determine main column size from actived sidebar
 */
$main_column_size = bootstrapBasicGetMainColumnSize();
?>
<div class="col-md-<?php echo $main_column_size; ?> content-area" id="main-column">
  <main id="main" class="site-main" role="main">
    <?php /* Would be good to make these configurable - i.e. choose title, which page to link to, what image, etc. */ ?>
    <div class='row'>
      <div class='col-md-4'>
        <div class='htcell htcellshort'>
          <h2>Houndstooth</h2>
          <?php echo page_teaser(HOUNDSTOOTH_PAGE_ID) ?>
        </div>
      </div>
      <div class='col-md-4'>
        <div class='htcell htcellshort'>
          <h2>Research Studio</h2>
          <?php echo page_teaser(RESEARCH_STUDIO_PAGE_ID) ?>
        </div>
      </div>
      <div class='col-md-4'>
        <div class='htcell htcellshort'>
          <h2>News</h2>
          <?php
            $news_id = NEWS_CATEGORY_ID; 
            $news_link = get_category_link($news_id);
            query_posts( array('cat' => $news_id, 'posts_per_page' => 3) );
            if(have_posts()) : while(have_posts()) : the_post();
          ?>
            <p><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></p>
          <?php
            endwhile;
            endif;
            wp_reset_query();
          ?>
          <p><a href='<?php echo esc_url($news_link); ?>'>More News</a></p>
        </div>
      </div>
    </div>
    <h2>Houndstooth Galleries</h2>
    <div class='row'>
      <div class='col-md-4'>
        <div class='htcell'>
          <h3>Latest Collection</h3>
          <div class="htimgcell">
            <img src="<?php echo get_bloginfo('template_url') ?>/img/placeholder1.jpg" />
          </div>
          <p class='text-right'><a href="<?php echo COLLECTIONS_PAGE ?>">Browse collections</a></p>
        </div>
      </div>
      <div class='col-md-4'>
        <div class='htcell'>
          <h3>Latest Upload</h3>
          <?php
          $cat_id = SUBMISSIONS_CATEGORY_ID; 
          $submissions = get_posts( array('category' => $cat_id) );
          $latest = end($submissions);
          $submissions_link = get_category_link($cat_id);
          ?>
          <div class="htimgcell">
            <a href='<?php echo get_permalink($latest->ID); ?>'><?php echo get_the_post_thumbnail($latest->ID, array(300,200)); ?></a>
          </div>
          <p class='text-right'><a href='<?php echo $submissions_link ?>'>Browse uploads</a></p>
        </div>
      </div>
      <div class='col-md-4'>
        <div class='htcell'>
          <h3>Random Highlight</h3>
          <div class="htimgcell">
            <img src="<?php echo get_bloginfo('template_url') ?>/img/placeholder3.jpg" />
          </div>
          <p class='text-right'><a href='#'>Browse all</a></p>
        </div>
      </div>
    </div>
    <h2>Research Studio Projects</h2>
    <div class='row'>
      <div class='col-md-4'>
        <div class='htcell'>
          <h3>Wallpaper Project</h3>
          <div class="htimgcell">
            <a href='<?= WALLPAPER_PROJECT_PAGE ?>'><img src="<?php echo get_bloginfo('template_url') ?>/img/placeholder4.jpg" /></a>
          </div>
          <p class='text-right'><a href='<?= WALLPAPER_PROJECT_PAGE ?>'>Learn more</a></p>
        </div>
      </div>
      <div class='col-md-4'>
        <div class='htcell'>
          <h3>Materials</h3>
          <div class="htimgcell">
            <a href='<?= MATERIALS_PAGE ?>'><img src="<?php echo get_bloginfo('template_url') ?>/img/placeholder5.jpg" /></a>
          </div>
          <p class='text-right'><a href='<?= MATERIALS_PAGE ?>'>Browse materials</a></p>
        </div>
      </div>
      <div class='col-md-4'>
        <div class='htcell'>
          <h3>Co-Design</h3>
          <div class="htimgcell">
            <a href='<?= CO_DESIGN_PAGE ?>'><img src="<?php echo get_bloginfo('template_url') ?>/img/placeholder6.jpg" /></a>
          </div>
          <p class='text-right'><a href='<?= CO_DESIGN_PAGE ?>'>Learn more</a></p>
        </div>
      </div>
    </div>

  </main>
</div>
<?php get_footer(); ?> 
