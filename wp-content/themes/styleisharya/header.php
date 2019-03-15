<?php
/**
 * @package styleisharya
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<?php 
get_template_part('template/header/template', 'header_top');
get_template_part('template/header/template', 'slider');
?>
<?php if ( is_front_page() && !is_home() ) {?>
<section id="hompagecontent">
<div class="container">
<?php 
get_template_part('template/home/template', 'boxes');
?>
</div>
</section>
<?php }?>

<?php if ( is_front_page() && !is_home() ) {?>
<section id="homewelcome">
<div class="container">
  <div class="row">
<?php 
get_template_part('template/home/template', 'welcome');
?>
  </div><!--row-->
</div><!--container-->
</section>
<?php }?>
