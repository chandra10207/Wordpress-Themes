<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' );  ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo bloginfo('title');?> | <?php the_title(''); ?>
    </title>
    <!--[if lt IE 9]>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5shiv.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="<?php echo get_theme_mod( 'thtrs_favicon' );?>" type="image/x-icon">
    <?php wp_head(); ?>
</head>

<!--/head-->

<body <?php body_class(); ?>>
<!--   <?php $user=  wp_get_current_user(); 
  print_r($user);?> -->
    <!--header --> 
    <header
     <?php if (is_front_page()) {?>
    class="home" style="
    "
<?php } else echo "class='inner-page'" ;?>
    >
    
      <div class="container">
                                
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


                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                           <!-- nav  --> 
                        <?php wp_nav_menu( array(
                            'theme_location'   => 'primary',
                            'container'        => false,
                            'items_wrap'       => '<ul class="nav navbar-nav navbar-right">%3$s</ul>'
                        ) ); ?>   

                    </div><!-- /.navbar-collapse -->
                    
          </nav>
  <?php if(is_front_page()){
    include('inc/slider.php');
    } ?>                 
      </div> 

   </div>

</header><!--/.header --> 

<!-- login-section  --> 
<div class="container this">
    <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
  
      <div class="at-login-form">

        <!-- MODAL LOGIN -->
        <div class="modal fade" id="at-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
               <!-- <h2>Login</h2>  -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body"> 
                    
                    

              <?php do_action( 'woocommerce_before_customer_login_form' ); ?>

              <!-- Login form -->
              <div class="col2-set" id="customer_login">

                        
      
                      <h2><?php _e( 'Login', 'woocommerce' ); ?></h2>
                      <div id="login-msg-error"></div>
                      <div id="login-msg-success"></div>

                      <form method="post" class="tt-login">

                          <?php do_action( 'woocommerce_login_form_start' ); ?>

                          <p class="form-row form-row-wide">
                              <!-- <label for="username"><?php _e( 'Username or email address', 'woocommerce' ); ?> <span class="required">*</span></label> -->
                              <input type="text" placeholder="Username or email address" class="input-text" name="username" id="username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
                          </p>
                          <p class="form-row form-row-wide">
                              <!-- <label for="password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label> -->
                              <input class="input-text" placeholder="Password" type="password" name="password" id="password" />
                          </p>

                          <?php do_action( 'woocommerce_login_form' ); ?>

                          <p class="form-row">
                              <?php wp_nonce_field( 'woocommerce-login' ); ?>
                              <input type="submit" id="thou_login1" class="button1" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>" />
                              <label for="rememberme" class="inline">
                                  <input name="rememberme" type="checkbox" id="rememberme" value="false" /> <?php _e( 'Remember me', 'woocommerce' ); ?>
                              </label>
                          </p>
                          <p class="lost_password">
                              <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php _e( 'Lost your password?', 'woocommerce' ); ?></a>
                          </p>

                          <?php do_action( 'woocommerce_login_form_end' ); ?>

                      </form>
                       

              </div>
              <!-- Login form end -->

              <?php do_action( 'woocommerce_after_customer_login_form' ); ?>
                      
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
                        <!-- <h2>Register</h2>  -->
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                      </div>
                      <div id="thousand_register" class="modal-body">           
                       

               

                

                <?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>


                   <!-- Registration form  -->
                <div class="col2-set" id="customer_registration">

                      <div>

                        <h2><?php _e( 'Register', 'woocommerce' ); ?></h2>
                        <div class="register_error_msg"></div>
                        <div class="register_success_msg"></div>

                        <form method="post" class="register">

                            <?php do_action( 'woocommerce_register_form_start' ); ?>

                            <?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

                                <p class="form-row form-row-wide">
                                    // <!-- <label for="reg_username"><?php _e( 'Username', 'woocommerce' ); ?> <span class="required">*</span></label> -->
                                    <input type="text" placeholder="Username" class="input-text" name="username" id="reg_username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
                                </p>

                            <?php endif; ?>

                            <p class="form-row form-row-wide">
                                <!-- <label for="reg_email"><?php _e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label> -->
                                <input type="email" placeholder="Email address" class="input-text hehe" name="email" id="reg_email" required value="<?php if ( ! empty( $_POST['email'] ) ) echo esc_attr( $_POST['email'] ); ?>" />
                            </p>

                             <?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

                                <p class="form-row form-row-wide">
                                    <!-- <label for="reg_password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label> -->
                                    <input type="password" placeholder="Password" class="input-text" name="password" id="reg_password" />
                                </p>

                            <?php endif; ?>

                            <!-- Spam Trap -->
                            <div style="<?php echo ( ( is_rtl() ) ? 'right' : 'left' ); ?>: -999em; position: absolute;"><label for="trap"><?php _e( 'Anti-spam', 'woocommerce' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" /></div>


                            <?php do_action( 'woocommerce_register_form' ); ?>
                            <?php do_action( 'register_form' ); ?>

                            <div class="clear"></div>

                            <p class="form-row">
                                <?php wp_nonce_field( 'woocommerce-register' ); ?>
                                <input type="submit" placeholder="Register" id="reg_thousandtree" class="button" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>" />
                            </p>

                            <?php do_action( 'woocommerce_register_form_end' ); ?>

                        </form>

                    </div>

                </div>

                <!-- Registration form end -->
                <?php endif; ?>

               <?php do_action( 'woocommerce_after_customer_login_form' ); ?>

                

                      </div>

                      <div class="modal-footer">

                          <div class="row"> 

                                  <div class="col-md-12">
                                    
                                        <ul class="list-inline">
                                          <li class="ta-l">Already a Member?</li>
                                          
                                          <li><span class="frgt-pswd"   data-toggle="modal" data-dismiss="modal"  data-target="#at-login">Login</span> </li>

                                          <li><span class="lost_password"> 

                                           <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php _e( 'Lost your password?', 'woocommerce' ); ?>

                                             
                                           </a></span>
                                           </li>

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
                <!-- <div class="modal fade" id="at-reset-pswd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h2>Reset Password</h2> 
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                      </div>
                      <div class="modal-body">
                        
                        <?php //echo do_shortcode('[lost_password_form]'); ?>
                        
                      
                    </div>
                  </div>
                </div>
              
            </div> -->
      </div>
    </div>
  </div><!-- /. login-section  --> 
  </div>


  <?php 
     if(  function_exists ( "is_woocommerce" ) && is_woocommerce()){
  ?>
  <section id="breadcrumb-wrapper">
    <div class="container ">
      <div class="row">
        <?php woocommerce_breadcrumb(); ?>
      </div>
    </div>
  </section>

   <?php } ?>
