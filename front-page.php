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

    <div class="titlediv hidden-title">
      <h1 class="page-title"><span><?php the_title(); ?></span></h1>
    </div>


  <section class="intro">
    <div class="wrapper">
      <?php if (get_the_content()) { ?>
      <div class="entry-content-default">
        <?php the_content(); ?>
      </div>
      <?php } ?>

      <?php 
        $intro_text = get_field('intro_text');
        $intro_image = get_field('intro_feat_image');
        $intro_class = ($intro_text && $intro_image) ? "twocol":"onecol";
        ?>
        <?php if ($intro_text) { ?>
        <div class="intro-content <?php echo $intro_class ?>">
          <div class="col textcol">
            <?php echo $intro_text ?>
          </div>

          <?php if ($intro_image) { ?>
          <div class="col imagecol">
            <figure>
              <img src="<?php echo $intro_image['url'] ?>" alt="<?php echo $intro_image['title'] ?>">
            </figure>
          </div>  
          <?php } ?>
        </div>
        <?php } ?>
    </div>
  </section>
    
</div>  

<?php endwhile; ?>

<?php
get_footer();