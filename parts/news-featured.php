<?php
$featuredPosts = array();
$taxonomy = 'category';
$args = array(
  'posts_per_page' => 4,
  'post_type' => 'post',
  'orderby'   => 'date',
  'order'     => 'desc',
  'post_status' => 'publish',
  'meta_query' => array(
    array(
      'key'       => 'featured_article',
      'value'     => 'on',
    )
  )
);

$posts = new WP_Query($args);
if ( $posts->have_posts() ) {  
  $count = $posts->found_posts;
?>
<div class="featured-posts-block-outer">
  <div class="wrapper">
    <div class="titleDiv">
      <h2 class="section-title">Featured</h2>
    </div>

    <div class="featured-posts-block total-posts-<?php echo $count ?>">
      <?php 
        $fp = $posts->posts[0]; 
        $f_pid = $fp->ID;
        $f_postTitle = $fp->post_title;
        $f_content = $fp->post_content;
        $f_thumbId = get_post_thumbnail_id($f_pid);
        $f_imageSrc = wp_get_attachment_image_src($f_thumbId,'medium_large');
        $f_imageStyle = ($f_imageSrc) ? ' style="background-image:url('.$f_imageSrc[0].')"':'';
        $f_resizerImage = get_template_directory_uri() . '/images/resizer-rectangle-2.png';
        $f_categoryName = '';
        $f_categoryLink = '';
        $f_post_terms = get_the_terms($f_pid,$taxonomy);
        if( $f_post_terms ) {
          $singleCat = $f_post_terms[0];
          $f_categoryName = $singleCat->name;
          $f_categoryLink = get_term_link($singleCat,$taxonomy);
        }
        $f_post_date_text = get_the_date('m/d/Y',$f_pid);
        $featuredPosts[] = $f_pid;
      ?>

        <div class="firstCol">
          <article class="featPost" id="post-<?php echo $f_pid ?>">
            <div class="inner <?php echo ($f_imageSrc) ? 'has-image':'no-image';?>">
              
              <figure class="imageCol">
                <?php if ($f_imageSrc) { ?>
                <div class="hasImage" style="background-image:url('<?php echo $f_imageSrc[0]?>')">
                  <img src="<?php echo $f_resizerImage?>" alt="" />
                </div>
                <?php } else { ?>
                <div class="noImage">
                  <img src="<?php echo $f_resizerImage?>" alt="" />
                </div>
                <?php } ?>
              </figure>

              <div class="textCol">
                <div class="post-meta">
                  <?php if ($f_categoryName) { ?>
                    <a href="<?php echo $f_categoryLink ?>"><?php echo ucwords($f_categoryName) ?></a> | 
                  <?php } ?>
                  <span class="post-date"><?php echo $f_post_date_text ?></span>
                </div>
                <h3 class="postTitle"><a href="<?php echo get_permalink($f_pid); ?>"><?php echo $f_postTitle?></a></h3>
                <?php if($f_content) { ?>
                <div class="text">
                  <?php echo shortenText( strip_tags($f_content), 150, ' ', '...'); ?>
                </div>
                <?php } ?>
              </div>

            </div>
          </article>
        </div>  

      <?php if ($count>1) { ?>
      <div class="secondCol">
        <?php 
        unset($posts->posts[0]);
        $featPosts = $posts->posts;
        ?>
        <?php foreach ($featPosts as $p) { 
          $resizerImage = get_template_directory_uri() . '/images/resizer-rectangle.png';
          $postId   = $p->ID;
          $postTitle = $p->post_title;
          $content = $p->post_content;
          $thumbId = get_post_thumbnail_id($postId);
          $imageSrc = wp_get_attachment_image_src($thumbId,'medium_large');
          $hasImage = ($imageSrc) ? 'has-image':'no-image';
          $post_terms = get_the_terms($postId,$taxonomy);
          $categoryName = '';
          $categoryLink = '';
          if( $post_terms ) {
            $psingleCat = $post_terms[0];
            $categoryName = $psingleCat->name;
            $categoryLink = get_term_link($psingleCat,$taxonomy);
          }
          $post_date_text = get_the_date('m/d/Y',$postId);
          $featuredPosts[] = $postId;
        ?>
        <article class="featPost" id="post-<?php echo $postId; ?>">
          <div class="inner <?php echo $hasImage?>">
            <figure class="imageCol">
              <?php if ($imageSrc) { ?>
              <div class="hasImage" style="background-image:url('<?php echo $imageSrc[0]?>')">
                <img src="<?php echo $resizerImage?>" alt="" />
              </div>
              <?php } else { ?>
              <div class="noImage">
                <img src="<?php echo $resizerImage?>" alt="" />
              </div>
              <?php } ?>
            </figure>

            <div class="textCol">
              <div class="post-meta">
                <?php if ($categoryName) { ?>
                  <a href="<?php echo $categoryLink ?>"><?php echo ucwords($categoryName) ?></a> | 
                <?php } ?>
                <span class="post-date"><?php echo $post_date_text ?></span>
              </div>
              <h3 class="postTitle"><a href="<?php echo get_permalink($postId); ?>"><?php echo $postTitle?></a></h3>
              <?php if($content) { ?>
              <div class="text">
                <?php echo shortenText( strip_tags($content), 150, ' ', '...'); ?>
              </div>
              <?php } ?>
            </div>
          </div>
        </article>
        <?php } ?>
      </div>
      <?php } ?>
    </div>

  </div>
</div>
<?php } ?>