<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bellaworks
 */
$post_type = get_post_type();
$show_title = ($post_type=='tribe_events') ? false : true;
$bannerImage = get_field('banner_image');
$hasBanner = ( isset($bannerImage['image1']) && $bannerImage['image1'] ) ? 'hasBanner' : 'noBanner';
get_header(); 
?>

<div id="primary" class="content-area-full internalPage generic-layout <?php echo $hasBanner ?>">
	<?php while ( have_posts() ) : the_post(); ?>

      <?php if ($hasBanner=="noBanner") { ?>
      <div class="titlediv typical">
        <h1 class="page-title"><span><?php the_title(); ?></span></h1>
      </div>
      <?php } ?>

      <div class="entry-content">
        <?php the_content(); ?>
      </div>
		
	<?php endwhile; ?>
</div><!-- #primary -->

<?php
get_footer();
