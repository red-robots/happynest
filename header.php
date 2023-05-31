<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="stylesheet" href="<?php bloginfo("template_url") ?>/css/jquery.fancybox.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php bloginfo("template_url") ?>/css/select2.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Anton&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Libre+Caslon+Text:ital,wght@0,400;0,700;1,400&family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap">

<?php if ( is_singular(array('post')) ) { 
global $post;
$post_id = $post->ID;
$thumbId = get_post_thumbnail_id($post_id); 
$featImg = wp_get_attachment_image_src($thumbId,'full'); ?>
<!-- SOCIAL MEDIA META TAGS -->
<meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>
<meta property="og:url"		content="<?php echo get_permalink(); ?>" />
<meta property="og:type"	content="article" />
<meta property="og:title"	content="<?php echo get_the_title(); ?>" />
<meta property="og:description"	content="<?php echo (get_the_excerpt()) ? strip_tags(get_the_excerpt()):''; ?>" />
<?php if ($featImg) { ?>
<meta property="og:image"	content="<?php echo $featImg[0] ?>" />
<?php } ?>
<!-- end of SOCIAL MEDIA META TAGS -->
<?php } ?>
<script>
var siteURL = '<?php echo get_site_url();?>';
var currentURL = '<?php echo get_permalink();?>';
var params={};location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi,function(s,k,v){params[k]=v});
</script>

<?php wp_head(); ?>
</head>
<?php
$headerCTA = get_field('header_cta_button','option'); 
$hctaTarget = (isset($headerCTA['target']) && $headerCTA['target']) ? $headerCTA['target'] : "_self";
$hctaText = (isset($headerCTA['title']) && $headerCTA['title']) ? $headerCTA['title'] : "";
$hctaLink = (isset($headerCTA['url']) && $headerCTA['url']) ? $headerCTA['url'] : "";
?>
<body <?php body_class(); ?>>
<div id="page" class="site cf">
	<div id="overlay"></div>
	<a class="skip-link sr" href="#content"><?php esc_html_e( 'Skip to content', 'bellaworks' ); ?></a>
	<header id="masthead" class="site-header">
		<div class="wrapper cf">
      <div class="head-inner">
        <?php if( get_custom_logo() ) { ?>
          <span class="site-logo"><?php the_custom_logo(); ?></span>
        <?php } else { ?>
          <h1 class="site-logo"><a hef="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
        <?php } ?>

        <nav id="site-navigation" class="main-navigation" role="navigation">
          <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu','container_class'=>'menu-wrapper') ); ?>
          <?php if( $hctaText &&  $hctaLink ) { ?>
          <a href="<?php echo $hctaLink ?>" target="<?php echo $hctaTarget ?>" class="topCta button getStarted"><?php echo $hctaText ?></a>
          <?php } ?>
        </nav><!-- #site-navigation -->

        <span id="menu-toggle" class="menu-toggle" aria-label="Menu Toggle"><span class="sr">Menu</span><span class="bar"></span></span>
		</div>
	</header>

	<?php get_template_part('parts/hero'); ?>

	<div id="content" class="site-content">
