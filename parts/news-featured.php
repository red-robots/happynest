<?php
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
<div class="featured-posts-block total-posts-<?php echo $count ?>">
  <?php $i=1; while ( $posts->have_posts() ) : $posts->the_post();  ?>
    <?php
      $first_open = '';
      $first_close = '';
      if($i==1) {
        $first_open = '<div class="firstCol">';
        $first_close = '</div><div class="secondCol">';
      }
    ?>
  <?php echo $first_open; ?>
  <article class="featPost" id="post-<?php the_ID() ?>">
    <?php
    $postId 	= get_the_ID();
    $postTitle = get_the_title();
    $content = get_the_content();
    $thumbId = get_post_thumbnail_id($postId);
    $imageSrc = wp_get_attachment_image_src($thumbId,'medium_large');
    $hasImage = ($imageSrc) ? 'has-image':'no-image';
    //$imageURL = ($imageSrc) ? $imageSrc[0] : get_template_directory_uri() . '/images/resizer-square.png';
    $imageStyle = ($imageSrc) ? ' style="background-image:url('.$imageSrc[0].')"':'';
    $resizerImage = get_template_directory_uri() . '/images/resizer-rectangle.png';
    ?>
    <div class="inner <?php echo $hasImage?>">
    
      <figure class="imageCol">
        <div<?php echo $imageStyle?>>
          <img src="<?php echo $resizerImage?>" alt="" />
        </div>
      </figure>

      <div class="textCol">
        <h3 class="postTitle"><a href="<?php echo get_permalink(); ?>"><?php echo $postTitle?></a></h3>
        <?php if($content) { ?>
        <div class="text">
          <?php echo shortenText( strip_tags($content), 150, ' ', '...'); ?>
        </div>
        <?php } ?>
      </div>
    </div>
  </article> 
  <?php echo $first_close; ?>
  <?php if( $i==$count ) {  echo '</div>'; }?>
  <?php $i++; endwhile; wp_reset_postdata(); ?>
</div>
<?php } ?>