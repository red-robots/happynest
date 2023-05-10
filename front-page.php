<?php 
get_header(); 
?>

<?php while ( have_posts() ) : the_post(); ?>

  <?php  
  $links = get_field('links_with_icon');
  ?>

  <?php if( have_rows('links_with_icon') ) { ?>
  <div class="links-with-icons">
    <div class="wrapper">
    <?php while( have_rows('links_with_icon') ): the_row(); ?>
      <?php 
      $icon = get_sub_field('icon');
      $title = get_sub_field('title');
      $iconTarget = (isset($title['target']) && $title['target']) ? $title['target'] : "_self";
      $iconText = (isset($title['title']) && $title['title']) ? $title['title'] : "";
      $iconLink = (isset($title['url']) && $title['url']) ? $title['url'] : "";
      $hasLink = ($iconLink && $iconLink!="#") ? true : false;
      ?>
      <div class="link-icon <?php echo ($hasLink) ? 'hasLink':'noLink' ?>">
        <?php if ($hasLink) { ?>
        <a href="<?php echo $iconLink ?>" target="<?php echo $iconTarget ?>" class="iconInner">
          <?php if ($icon) { ?><i class="<?php echo $icon ?>"></i><?php } ?>
          <span><?php echo $iconText ?></span>
        </a>  
        <?php } else { ?>
          <span class="iconInner">
            <?php if ($icon) { ?><i class="<?php echo $icon ?>"></i><?php } ?>
            <span><?php echo $iconText ?></span>
            <?php } ?>
          </span>
          
      </div>
     <?php endwhile; ?>
    </div>
  </div>  
  <?php } ?>

    <div class="titlediv">
      <h1 class="page-title"><span><?php the_title(); ?></span></h1>
    </div>
  
  <div class="entry-content">
    <?php the_content(); ?>
  </div>
</div>  

<?php endwhile; ?>

<?php
get_footer();