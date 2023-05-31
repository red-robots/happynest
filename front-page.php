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
      $intro_columns = get_field('intro_columns');
      $intro_text = get_field('intro_text');
      $intro_image = get_field('intro_feat_image');
      $intro_class = ($intro_text && $intro_image) ? "twocol":"onecol";
      ?>
      <?php if ($intro_text) { ?>
      <div class="intro-content <?php echo $intro_class ?>">
        <div class="col textcol animated animate-this" data-effect="fadeInUp">
          <?php echo anti_email_spam($intro_text) ?>
        </div>

        <?php if ($intro_image) { ?>
        <div class="col imagecol animated animate-this" data-effect="fadeInRight">
          <figure>
            <img src="<?php echo $intro_image['url'] ?>" alt="<?php echo $intro_image['title'] ?>">
          </figure>
        </div>  
        <?php } ?>
      </div>
      <?php } ?>
    </div>
  </section>      


  <?php  
    $columnButton = get_field('intro_column_button');
    $colTarget = (isset($columnButton['target']) && $columnButton['target']) ? $columnButton['target'] : "_self";
    $colText = (isset($columnButton['title']) && $columnButton['title']) ? $columnButton['title'] : "";
    $colLink = (isset($columnButton['url']) && $columnButton['url']) ? $columnButton['url'] : "";
  ?>

  <?php if ($intro_columns) { ?>
  <section class="section section-1 intro-columns columns-wrapper">
    <div class="wrapper">
      <div class="flexwrap fadeInUp wow animated animate-this" data-effect="fadeInUp">
      <?php foreach ($intro_columns as $col) { ?>
        <?php if ($col['content']) { ?>
          <div class="fcol">
            <div class="inner"><?php echo $col['content'] ?></div>
          </div>
        <?php } ?>
      <?php } ?>
      </div>

      <?php if ($colText && $colLink) { ?>
      <div class="buttondiv">
        <a href="<?php echo $colLink ?>" target="<?php echo $colTarget ?>" class="button"><?php echo $colText ?></a>
      </div>
      <?php } ?>
      </div>
  </section>
  <?php } ?>


  <?php  
  $section2_image = get_field('section2_image');
  $section2_button = get_field('section2_button');
  $section2_content = get_field('section2_content');
  $section2_class = ($section2_image && $section2_content) ? "twocol" : "onecol";

  $s2Target = (isset($section2_button['target']) && $section2_button['target']) ? $section2_button['target'] : "_self";
  $s2Text = (isset($section2_button['title']) && $section2_button['title']) ? $section2_button['title'] : "";
  $s2Link = (isset($section2_button['url']) && $section2_button['url']) ? $section2_button['url'] : "";

  if($section2_image || $section2_content) { ?>
  <section class="section section-2 <?php echo $section2_class ?>">
    <div class="flexwrap">
      <?php if ($section2_image) { ?>
      <figure class="fcol imagecol animate-this" data-effect="slowUp">
        <img src="<?php echo $section2_image['url'] ?>" alt="<?php echo $section2_image['title'] ?>" />
      </figure>  
      <?php } ?>

      <?php if ($section2_content) { ?>
      <div class="fcol textcol fadeInRight wow">
        <div class="inner">
          <div class="text"><?php echo anti_email_spam($section2_content) ?></div>
          <?php if ($s2Text && $s2Link) { ?>
          <div class="buttondiv">
            <a href="<?php echo $s2Link ?>" target="<?php echo $s2Target ?>" class="button"><?php echo $s2Text ?></a>
          </div>
          <?php } ?>
        </div>
      </div>  
      <?php } ?>
    </div>
  </section>
  <?php } ?>


  <?php
  $section3_title = get_field('section3_title');
  $section3_stats = get_field('section3_stats');
  if($section3_title || $section3_stats) { ?>
  <section class="section section-3">
    <div class="wrapper animate-this" data-effect="fadeInUp">
      <?php if ($section3_title) { ?>
        <h2 class="stitle"><?php echo $section3_title ?></h2>
      <?php } ?>
      <?php if ($section3_stats) { ?>
        <div class="status">
          <div class="inner">
          <?php foreach ($section3_stats as $s) { ?>
            
            <?php if ( $s['percent'] ) { ?>
            <div class="stat">
              <span class="percent"><b><?php echo $s['percent'] ?></b></span>
              <?php if ( $s['title'] ) { ?>
              <span class="title"><?php echo $s['title'] ?></span>
              <?php } ?>
            </div>
            <?php } ?>

          <?php } ?>
          </div>
        </div>
      <?php } ?>
    </div>
  </section>
  <?php } ?>


  <?php
  $section4_content = get_field('section4_content');
  $section4_image = get_field('section4_image');
  $section4_class = ($section4_content && $section4_image) ? "twocol" : "onecol";
  if($section4_content || $section4_image) { ?>
  <section class="section section-4 <?php echo $section4_class ?>">
    <div class="wrapper-fullwidth">
      <div class="flexwrap">
        <?php if ($section4_content) { ?>
        <div class="fcol textcol animate-this" data-effect="fadeInLeft">
          <div class="inner">
            <div class="text"><?php echo anti_email_spam($section4_content) ?></div>
          </div>
        </div>  
        <?php } ?>

        <?php if ($section4_image) { ?>
        <figure class="fcol imagecol animate-this" data-effect="fadeInUp" style="background-image:url('<?php echo $section4_image['url'] ?>')">
        </figure>  
        <?php } ?>
      </div>
    </div>
  </section>
  <?php } ?>


  <?php  
  $section5_content = get_field('section5_content');
  $s5button = get_field('section5_button');
  $s5Target = (isset($s5button['target']) && $s5button['target']) ? $s5button['target'] : "_self";
  $s5Text = (isset($s5button['title']) && $s5button['title']) ? $s5button['title'] : "";
  $s5Link = (isset($s5button['url']) && $s5button['url']) ? $s5button['url'] : "";

  if($section5_content) { ?>
  <section class="section section-5">
    <div class="wrapper">
      <div class="flexwrap">
        <div class="fcol textcol fadeInUp wow">
          <div class="inner">
            <div class="text"><?php echo anti_email_spam($section5_content) ?></div>
            <?php if ($s5Text && $s5Link) { ?>
            <div class="buttondiv">
              <a href="<?php echo $s5Link ?>" target="<?php echo $s5Target ?>" class="button"><?php echo $s5Text ?></a>
            </div>
            <?php } ?>
          </div>
        </div>  
      </div>
    </div>
  </section>
  <?php } ?>


  <?php get_template_part('parts/steps'); ?>

<?php endwhile; ?>

<?php
get_footer();