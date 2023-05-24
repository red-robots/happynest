<?php  
if( is_home() || is_front_page() ) {
  if( have_rows('hero') ) { ?>
  <div class="swiper hero slideshow">
    <div class="swiper-wrapper">
      <?php while( have_rows('hero') ): the_row(); ?>
        <?php 
        $hero_text = get_sub_field('hero_text');
        $hero_image = get_sub_field('hero_image');
        $hero_button = get_sub_field('hero_button');
        $buttonTarget = (isset($hero_button['target']) && $hero_button['target']) ? $hero_button['target'] : "_self";
        $buttonText = (isset($hero_button['title']) && $hero_button['title']) ? $hero_button['title'] : "";
        $buttonLink = (isset($hero_button['url']) && $hero_button['url']) ? $hero_button['url'] : "";
        ?>
        <div class="swiper-slide <?php echo ($hero_image) ? 'has-image':'no-image' ?>">
          <?php if ($hero_text) { ?>
          <div class="hero-text">
            <div class="inner">

              <div class="text"><?php echo $hero_text ?></div>
              <?php if ($buttonText && $buttonLink) { ?>
              <div class="buttondiv fadeInUp wow">
                <a href="<?php echo $buttonLink ?>" target="<?php echo $buttonTarget ?>" class="button"><?php echo $buttonText ?></a>
              </div>
              <?php } ?>
            </div>  
          </div>  
          <?php } ?>
          <?php if ($hero_image) { ?>
          <div class="hero-image" style="background-image:url('<?php echo $hero_image['url'] ?>')"></div>  
          <?php } ?>
        </div>
      <?php endwhile; ?>
    </div>
    <div class="swiper-pagination"></div>
  </div>
  <?php } ?>
<?php } else { ?>

  <?php if( is_page() ) {
    $bannerImage = get_field('banner_image');
    $layer1 = ( isset($bannerImage['image1']) && $bannerImage['image1'] ) ? $bannerImage['image1'] : '';
    $layer2 = ( isset($bannerImage['image2']) && $bannerImage['image2'] ) ? $bannerImage['image2'] : '';
    $bannerText = ( isset($bannerImage['text']) && $bannerImage['text'] ) ? $bannerImage['text'] : '';
    $bannerText = ($bannerText) ? $bannerText : get_the_title();
    if($layer1) { ?>
    <h1 class="pageTitleHidden"><?php echo get_the_title(); ?></h1>
    <div class="subpageBanner">
        <div class="layer1" style="background-image:url('<?php echo $layer1['url'] ?>')"></div>
        <?php if($layer2) { ?>
        <div class="layer2" style="background-image:url('<?php echo $layer2['url'] ?>')"></div>
        <?php } ?>

        <?php if($bannerText) { ?>
        <div class="bannerText"><div class="text"><?php echo $bannerText ?></div></div>
        <?php } ?>
    </div>
    <?php } ?>
  <?php } ?>

<?php } ?>