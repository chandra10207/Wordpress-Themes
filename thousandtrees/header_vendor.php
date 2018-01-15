<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' );  ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        1000Trees | <?php the_title(''); ?>
    </title>
    <!--[if lt IE 9]>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5shiv.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/respond.min.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
</head>

<!--/head-->

<body <?php body_class(); ?>>
    <!--header --> 
    <header <?php if (is_front_page()) {?> class="home" style="background-image:url(<?php echo get_theme_mod('thtrs_home_header_banner')?>);" <?php } else echo "class='inner-page';"?> style="display: none;">
      <div class="container-dashboard vendor-header">
        <div class="row">                           
              <nav class = "navbar navbar-default" role = "navigation">
                     <div class = "navbar-header">
                                <!-- logo -->
                                <?php
                                if ( is_front_page ()) {
                                $image = get_theme_mod( 'thtrs_home_header_logo' );
                                $custom_logo_id = attachment_url_to_postid($image);
                                $logo_alt = get_post_meta($custom_logo_id, '_wp_attachment_image_alt', true);

                                if( !empty( $image ) ): ?>
                                 <div class="logo">
                                            <a href="<?php echo site_url();?>">
                                                <img src="<?php echo $image; ?>" alt="<?php echo $logo_alt; ?>" class="img-responsive">
                                            </a>
                                  </div>

                                <?php endif; 

                                } else {
                               
                                $inner_page_image = get_theme_mod( 'thtrs_inner_logo' );
                                $custom_inner_logo_id = attachment_url_to_postid($inner_page_image);
                                $inner_logo_alt = get_post_meta($custom_inner_logo_id, '_wp_attachment_image_alt', true);
                                if( !empty( $inner_page_image ) ): ?>
                                 <div class="logo">
                                            <a href="<?php echo site_url();?>">
                                                <img src="<?php echo $inner_page_image; ?>" alt="<?php echo $inner_logo_alt; ?>" class="img-responsive">
                                            </a>
                                  </div>
                                <?php endif; 
                                }
                                ?>

                                  <!-- toogle button --> 
                                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                      <span class="sr-only">Toggle navigation</span>
                                      <span class="icon-bar"></span>
                                      <span class="icon-bar"></span>
                                      <span class="icon-bar"></span>
                                  </button>
                                  <!-- /.toogle button --> 
                     </div>

                     <!-- to get the vendor dashboard menu -->
                   <ul id="vendor-dash" class="nav navbar-nav navbar-right">
                   </ul>

          </nav>
           </div>
   


          <!-- banner-intro -->
          <?php 
          if(is_front_page()){
          $home_banner_text =  get_theme_mod( 'thtrs_home_header_banner_text' );
          if( !empty($home_banner_text) ):
           ?>
          <div class="intro-text">
          <?php echo $home_banner_text; ?>
          </div>
        <?php endif; }?>
           <!-- /.banner-intro -->
      </div> 

   </div>

</header><!--/.header --> 

<!-- login-section  --> 
<div class=" login-vc-header">
    <div class="container">
    <div class="">
  
      <div class="at-login-form">
        <!-- MODAL LOGIN -->
        <div class="modal fade" id="at-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
               <h2>Login</h2> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body"> 
                    
                      <?php echo do_shortcode('[profilepress-login id="1"]'); ?>
                      
                 </div>
                
                </div>
              </div>
               
            </div>
            <!-- MODAL LOGIN ENDS -->

            
                <!-- MODAL SIGNUP FORM FILLING -->
                <div class="modal fade" id="at-signup-filling" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      
                      <div class="modal-header">
                        <h2>Register</h2> 
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                      </div>
                      <div class="modal-body">                        
                        
 <?php do_action( 'wcvendors_login_apply_for_vendor_before' ); ?> 

                        <?php echo do_shortcode('[profilepress-registration id="1"]'); ?>


   
  


   <!--  <p class="forgetmenot">
  <label for="apply_for_vendor"> 
    <input class="input-checkbox" id="apply_for_vendor" <?php checked( isset( $_POST[ 'apply_for_vendor' ] ), true ) ?> type="checkbox" name="apply_for_vendor" value="1"/>
      <?php echo apply_filters('wcvendors_vendor_registration_checkbox', __( 'Apply to become a vendor? ', 'wcvendors' )); ?>
      </label>  
   </p> -->

          <?php do_action( 'wcvendors_login_apply_for_vendor_after' ); ?> 

                      </div>

                      <div class="modal-footer">

                          <div class="row"> 

                                  <div class="col-md-12">
                                    
                                        <ul class="list-inline">
                                          <li class="ta-l">Already a Member?</li>
                                          
                                          <li><span class="frgt-pswd"   data-toggle="modal" data-dismiss="modal"  data-target="#at-login">Login</span> </li>

                                          <li><span class="frgt-pswd"   data-toggle="modal" data-dismiss="modal"  data-target="#at-reset-pswd">  Forgot Password ?</span></li>

                                       </ul>
                                  
                                  </div>
                          </div>

                          <div class="terms-conditions">
                          <p>By signing up, you agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>, including <a href="#">Cookie Use</a>. Others will be able to find you by email or phone number when provided.</p>

                          </div>

                      </div>

                    </div>
                  </div>
                </div>
                <!-- MODAL SIGNUP FORM FILLING -->


                <!-- MODAL FORGOT PASSWORD -->
                <div class="modal fade" id="at-reset-pswd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h2>Reset Password</h2> 
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                      </div>
                      <div class="modal-body">
                        
                        <?php echo do_shortcode('[profilepress-password-reset id="1"]'); ?>
                        
                      
                    </div>
                  </div>
                </div>
              
            </div>
      </div>
    </div>
  </div><!-- /. login-section  --> 