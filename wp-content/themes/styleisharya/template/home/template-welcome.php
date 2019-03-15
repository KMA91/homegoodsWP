<?php 
$welcome_section_variable = array();
$weclomeid = absint(get_theme_mod('welcome_section',true));
$welcomequery = new WP_query('page_id='.$weclomeid); ?>
  <?php if ($welcomequery->have_posts() && $weclomeid>0) : 
  while( $welcomequery->have_posts() ) : $welcomequery->the_post();
    //$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID,'home-banner-size'));
   $thumbnail_id = get_post_thumbnail_id( $post->ID );
   $alt = esc_html(get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true));
   $image = esc_url(get_the_post_thumbnail_url( $post->ID, 'styleisharya-welcomehome-banner'));
   $title = esc_html(get_the_title( $post->ID ));
   $my_postid = $post->ID;
 $content = esc_html(styleisharya_get_excerpt($my_postid,'250'));
  $url = esc_url(get_the_permalink($my_postid));
  $welcome_section_variable[] = array('boxid'=>$post->ID,'boximage'=>$image,'alt'=>$alt,'box_title'=>$title,'box_content'=>$content,'url'=>$url);
  endwhile;
  wp_reset_postdata();
   endif;
  ?>
 <?php if($weclomeid>0){?>   
  <!--welcome to home page section query end -->
<div class="col-md-12">
  <div class="row">
  <div class="panel panel-default">
    <?php foreach($welcome_section_variable as $welcome_section_variables){?>
    <div class="col-sm-6">
      <div class="row">
        <img src="<?php echo esc_url($welcome_section_variables['boximage']);?>" alt="<?php echo esc_attr($welcome_section_variables['alt']);?>" class="img-responsive img-thumbnail">
    </div><!--row-->
  </div><!--col-sm-6-->
  <div class="col-sm-6">
    <div class="panel-heading"><h2 class="text-left h2heading"><?php echo esc_html($welcome_section_variables['box_title']);?></h2></div>
    <div class="panel-body">
      <p class="text-left"><?php echo esc_html($welcome_section_variables['box_content']); ?></p>
    </div>
  </div><!--col-sm-6-->
  <div class="clearfix"></div>  
    <?php }?>
  </div><!--panel panel-default-->
  </div><!--row-->
</div><!--col-md-12-->
<?php }?>
<div class="clearfix"></div>
</div><!-- site-aligner -->