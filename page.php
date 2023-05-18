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

      <?php if (get_the_content()) { ?>
      <div class="entry-content">
        <?php the_content(); ?>
      </div>
      <?php } ?>
		
      <?php  
      /* SECTION 1 */
      $section1_text = get_field('section1_text');
      $section1_icon = get_field('section1_icon');
      if($section1_text) { ?>
      <section class="section section1">
        <div class="wrapper">
          <div class="text-center">
            <?php if ($section1_icon) { ?>
            <figure class="topIcon">
              <img src="<?php echo $section1_icon['url'] ?>" alt="" />
            </figure>  
            <?php } ?>
            <div class="textwrap">
              <?php echo $section1_text ?>
            </div>
          </div>
        </div>
      </section>
      <?php } ?>



      <?php  
      /* SECTION 2 */
      $section2_text = get_field('section2_text');
      $section2_img = get_field('section2_img');
      if($section2_text) { ?>
      <section class="section section2">
        <div class="wrapper">
          <div class="text-center">
            <div class="textwrap">
              <?php echo $section2_text ?>
            </div>
          </div>
        </div>
        <?php if ($section2_img) { ?>
        <div class="sectionBg" style="background-image:url('<?php echo $section2_img['url'] ?>');"></div>  
        <?php } ?>
      </section>
      <?php } ?>

	<?php endwhile; ?>
</div><!-- #primary -->

<?php
get_footer();
