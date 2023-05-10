<?php if( have_rows('hero') ) { ?>
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
            <div class="buttondiv">
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