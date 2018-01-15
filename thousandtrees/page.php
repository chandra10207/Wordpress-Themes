<?php 
          $page_id = get_the_ID();
          
          $user = $user ? new WP_User( $user ) : wp_get_current_user();
          $user_role = $user->roles[0];
            if ( strcasecmp( $user_role, 'vendor' ) == 0 && $page_id == 197 )  {

              require_once( 'header_vendor.php' );

            }
            else {

            
          
      ?> 

<?php get_header(); ?>

<?php } ?>
  <!-- search-bar-section --> 

<div class="common-page">
  <div class="container">
    <?php 
    while(have_posts()) : the_post();
      the_content(); 
    endwhile;
    ?>
  </div>
</div>

<?php get_footer(); ?>