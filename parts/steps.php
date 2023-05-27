<?php
  $steps = get_field('footglobal_steps','option');
  $section_title = ( isset($steps['section_title']) && $steps['section_title'] ) ? $steps['section_title'] : '';
  $content_steps = ( isset($steps['steps']) && $steps['steps'] ) ? $steps['steps'] : '';
  $feat_image = ( isset($steps['feat_image']) && $steps['feat_image'] ) ? $steps['feat_image'] : '';
  $button = ( isset($steps['button']) && $steps['button'] ) ? $steps['button'] : '';
  $btnTarget = ( isset($button['target']) && $button['target'] ) ? $button['target'] : '_self';
  $btnText = ( isset($button['title']) && $button['title'] ) ? $button['title'] : '';
  $btnLink = ( isset($button['url']) && $button['url'] ) ? $button['url'] : '';

  if($section_title || $content_steps) { ?>
  <section class="section section-6 gblue">
    <div class="wrapper">
      <?php if ($section_title) { ?>
        <h2 class="stitle"><?php echo $section_title ?></h2>
      <?php } ?> 

      <div class="steps-wrapper">
      <?php if ($content_steps) { ?>
        <div class="steps">
          <div class="flexwrap">
          <?php $ctr=1; foreach ($content_steps as $s) { 
              $item = $s['title_link'];
              $itemTarget = ( isset($item['target']) && $item['target'] ) ? $item['target'] : '_self';
              $itemText = ( isset($item['title']) && $item['title'] ) ? $item['title'] : '';
              $itemLink = ( isset($item['url']) && $item['url'] ) ? $item['url'] : '';
              $link_start = '';
              $link_end = '';
              if($itemText && $itemLink) {
                if($itemLink=='#') {
                  $itemLink='javascript:void(0)';
                }
                $link_start = '<a href="'.$itemLink.'" target="'.$itemTarget.'">';
                $link_end = '</a>';
              }
            ?>
            <?php if ($itemText) { ?>
            <div class="step animate-this" data-effect="fadeInUp" data-counter="<?php echo $ctr; ?>" style="animation-delay:0.<?php echo $ctr?>s">
              <?php echo $link_start; ?>
              <?php if ($s['icon_img']) { ?>
               <div class="icondiv">
                  <img src="<?php echo $s['icon_img']['url'] ?>" alt="">
               </div> 
              <?php } ?>
              <div class="titlediv"><?php echo $itemText ?></div> 
              <?php echo $link_end; ?>
            </div>
            <?php $ctr++; } ?>
          <?php } ?>
          </div>  
        </div>
      <?php } ?> 

      <?php if ($btnText && $btnLink) { ?>
      <div class="buttondiv button-center">
        <a href="<?php echo $btnLink ?>" target="<?php echo $btnTarget ?>" class="button black"><?php echo $btnText ?></a>
      </div>
      <?php } ?>
      </div>  


      <?php if ($feat_image) { ?>
      <figure class="imageblock phoneImage">
        <img src="<?php echo $feat_image['url'] ?>" alt="<?php echo $feat_image['title'] ?>" class="animate-this" data-effect="fadeInRight"/>
      </figure>
      <?php } ?>

    </div>
  </section>
<?php } ?>