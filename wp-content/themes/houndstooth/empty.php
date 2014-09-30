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
    He's in the main content area.
  </main>
</div>
<?php get_footer(); ?> 
