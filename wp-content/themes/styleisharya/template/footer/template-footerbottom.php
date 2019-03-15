<?php
 $styleisharya_copyright = get_theme_mod('styleisharya_copyright');
 $styleisharya_design = get_theme_mod('styleisharya_design');  
?>
<?php if($styleisharya_copyright || $styleisharya_design){?>
<div class="footer-bottom">

  <div class="container">

    <div class="row">

      <div class="col-sm-12 col-xs-12">

        <div class="copyright text-center">

          
            <?php if(get_theme_mod('styleisharya_copyright')){?>
              <?php echo esc_html($styleisharya_copyright);?>
            <?php }?>         
        </div><!--copyright-->

      </div>

      <div class="col-sm-12 col-xs-12">

        <div class="design text-center">
          
            <?php if(get_theme_mod('styleisharya_design')){?>
              <?php echo esc_html($styleisharya_design);?>
            <?php }?>

        </div><!--design-->

      </div><!--col-sm-6-->

    </div><!--row-->

  </div><!--container-->

</div><!--footer-bottom-->
<?php }?>