<?php
  $home_page_id = 2;
  $section6_title = get_field('section6_title',$home_page_id);
  $section6_image = get_field('section6_image',$home_page_id);
  $section6_steps = get_field('section6_steps',$home_page_id);
  $s6button = get_field('section6_button',$home_page_id);
  $s6Target = (isset($s6button['target']) && $s6button['target']) ? $s6button['target'] : "_self";
  $s6Text = (isset($s6button['title']) && $s6button['title']) ? $s6button['title'] : "";
  $s6Link = (isset($s6button['url']) && $s6button['url']) ? $s6button['url'] : "";

  if($section6_title || $section6_steps) { ?>
  <section class="section section-6 gblue">
    <div class="wrapper">
      <?php if ($section6_title) { ?>
        <h2 class="stitle"><?php echo $section6_title ?></h2>
      <?php } ?> 

      <div class="steps-wrapper">
      <?php if ($section6_steps) { ?>
        <div class="steps">
          <div class="flexwrap">
          <?php $ctr=1; foreach ($section6_steps as $s) { ?>
            <?php if ($s['title']) { ?>
            <div class="step" data-counter="<?php echo $ctr; ?>">
              <?php if ($s['icon']) { ?>
               <div class="icondiv"><i class="<?php echo $s['icon'] ?>"></i></div> 
              <?php } ?>

              <?php if ($s['title']) { ?>
               <div class="titlediv"><?php echo $s['title'] ?></div> 
              <?php } ?>
            </div>
            <?php $ctr++; } ?>
          <?php } ?>
          </div>  
        </div>
      <?php } ?> 

      <?php if ($s6Text && $s6Link) { ?>
      <div class="buttondiv button-center">
        <a href="<?php echo $s6Link ?>" target="<?php echo $s6Target ?>" class="button black"><?php echo $s6Text ?></a>
      </div>
      <?php } ?>
      </div>  


      <?php if ($section6_image) { ?>
      <figure class="imageblock">
        <img src="<?php echo $section6_image['url'] ?>" alt="<?php echo $section6_image['title'] ?>" />
      </figure>
      <?php } ?>

    </div>
  </section>
<?php } ?>