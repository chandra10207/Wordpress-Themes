
<!--footer section-->
 
 <footer id="footer">
     <div class="container">
    	<div class="row">
  
		  <div class="col-md-7 copyright">
                   
                     <?php 
                     $footer_copy_right = get_theme_mod( 'thtrs_footer_copyright' );
                     if( !empty( $footer_copy_right ) ):
                      ?>
                      <p> <?php echo $footer_copy_right; ?> </p>
                    <?php endif; ?>                            
       </div>

         <div class="col-md-5 footer-menu-items list-footer ">
         <ul>
         <?php
         wp_nav_menu( array(
            'theme_location'  => 'footer',
            'container'       => false,
            'items_wrap'      => '%3$s'
          ) );
          ?>
          <?php $facebook_link = get_theme_mod( 'thtrs_footer_facebook_link' );
          if( !empty( $facebook_link ) ):
           ?>
          <li><a href="<?php echo $facebook_link; ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
        <?php endif; ?>
          </ul>
       </div>
		
	</div>
</div>
        
</footer><!--/#footer-->

<?php wp_footer(); ?>

  <!-- <script type="text/javascript">
     $(document).ready(function() {

        $('#menu-item-16').find('a').attr('data-toggle', 'modal');
        $('#menu-item-16').find('a').attr('data-target', '#at-login');

         $('#menu-item-17').find('a').attr('data-toggle', 'modal');
        $('#menu-item-17').find('a').attr('data-target', '#at-signup-filling');

        
    });

     $(".forgot-password").click(function(){
        $(".test").show();
      });

   $("button.info-toggle").hide();
   $(document).ready(function(){
    $(document).on('mouseover','.thumbnail',function(){
      $(this).find('.info-toggle').toggle();
    });
    $(document).on('mouseout','.thumbnail',function(){
      $(this).find('.info-toggle').toggle();
    });
    
    });

  

</script>



<script type="text/javascript">
  //Adding plus minus in quantity and increment/decrement functionality
  jQuery( function( $ ) {

  if ( ! String.prototype.getDecimals ) {
    String.prototype.getDecimals = function() {
      var num = this,
        match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
      if ( ! match ) {
        return 0;
      }
      return Math.max( 0, ( match[1] ? match[1].length : 0 ) - ( match[2] ? +match[2] : 0 ) );
    }
  }

  function wcqi_refresh_quantity_increments(){
    $( 'div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)' ).addClass( 'buttons_added' ).append( '<input type="button" value="+" class="plus" />' ).prepend( '<input type="button" value="-" class="minus" />' );
  }

  $( document ).on( 'updated_wc_div', function() {
    wcqi_refresh_quantity_increments();
  } );

  $( document ).on( 'click', '.plus, .minus', function() {
    // Get values
    var $qty    = $( this ).closest( '.quantity' ).find( '.qty'),
      currentVal  = parseFloat( $qty.val() ),
      max     = parseFloat( $qty.attr( 'max' ) ),
      min     = parseFloat( $qty.attr( 'min' ) ),
      step    = $qty.attr( 'step' );

    // Format values
    if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
    if ( max === '' || max === 'NaN' ) max = '';
    if ( min === '' || min === 'NaN' ) min = 0;
    if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

    // Change the value
    if ( $( this ).is( '.plus' ) ) {
      if ( max && ( currentVal >= max ) ) {
        $qty.val( max );
      } else {
        $qty.val( ( currentVal + parseFloat( step )).toFixed( step.getDecimals() ) );
      }
    } else {
      if ( min && ( currentVal <= min ) ) {
        $qty.val( min );
      } else if ( currentVal > 0 ) {
        $qty.val( ( currentVal - parseFloat( step )).toFixed( step.getDecimals() ) );
      }
    }

    // Trigger change event
    $qty.trigger( 'change' );
  });

  wcqi_refresh_quantity_increments();
});
</script> -->
<?php global $current_user;

    $user_roles = $current_user->roles;
    $user_role = array_shift($user_roles);
     ?>

 <script>
  var user_role_1000trees = '<?php echo $user_role; ?>';
  console.log(user_role_1000trees);


/*if(user_role_1000trees == 'customer'){
  jQuery(".plan-a-trip-home").attr('href', '/shop/');
}
if(user_role_1000trees == 'vendor'){
  jQuery(".plan-a-trip-home").attr('href', '/vendor_dashboard/');

}
else{
jQuery(".plan-a-trip-home").attr('href', '/shop/');
}*/



</script>

</body>
</html>