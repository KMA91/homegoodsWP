<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pasal-ecommerce
 */

get_header();
$upload_dir = wp_upload_dir();
?>
<div class="container-fluid" style='padding: 0;'>
  <div class="jumbotron">
    <div class="jumbotron--content">
      <img src="<?php echo $upload_dir['baseurl']?>/2019/03/homeAwayLogo-1.jpg" alt="HomeGoods Logo" class="img-responsive">
      <p>Get Inspired.</p>
      <p>Find Products.</p>
      <p>Save on Deals.</p>
      <div>
        <button class="btn btn-lg btn-primary button-fullwidth">SHOP NOW</button>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <h3>Shop By Department</h3>
  <?php echo do_shortcode("[product_categories]"); ?>
</div>

<div class="container">
  <h3>Featured Items</h3>
  <?php echo do_shortcode("[featured_products per_page='12' columns='4' orderby='date' order='ASC']"); ?>
</div>
<?php
get_footer();
