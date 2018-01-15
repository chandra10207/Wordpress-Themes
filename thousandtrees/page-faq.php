<?php
 /* Template Name: Faq */
	get_header(); 
?>


<div class="clearfix"></div>

<!-- inner-banner  --> 
<?php 
    $banner_image = get_field('banner_image',get_the_ID());
?>
<?php  
include('inc/slider.php');
?>

<div class="clearfix"></div>
<!-- call stripe start -->
<div class="intro-stripe">
	<div class="container">
    	<div class="row">
    		<div class="col-md-8 col-sm-8">
				<p><?php the_field('tagline',get_the_ID());?></p>
    		</div>
    		<div class="col-md-4 col-sm-4 pull-right">
    			<a href="tel:<?php the_field('button_link',get_the_ID());?>" class="btn btn-call"><?php the_field('button-text', get_the_ID()); ?></a>
    		</div>
    	</div>
	</div>
</div>
 <!-- content-wrapper   -->  

<section id="content-wrapper" class="inner-section faqs">
    <div class="container">
        <div class="row">
            <div class="col-md-3"><h2>FAQs: Vendors</h2></div>
            <div class="col-md-9">
                <div class="panel-group" id="accordion">
                <?php
                $custom_terms = get_terms('faq_category_trees');
                $count = 1;
                foreach($custom_terms as $custom_term) {
                if( $custom_term->slug == 'faq-vendors' ){
                    $custom_args = array(
                        'post_type' => '1000tree-faq',
                        'order' => 'ASC',
                        'tax_query' => array( 
                            array(
                                'taxonomy' => 'faq_category_trees', 
                                'field' => 'slug', 
                                'terms' => $custom_term->slug
                            )
                        )
                    );
                    $custom_query = new WP_Query( $custom_args ); 
                    while ( $custom_query->have_posts() ) : $custom_query->the_post(); 
        ?> 
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><?php if ($count == 1) {?>
                                <a data-toggle="collapse" data-parent="#accordion" href="#help<?php echo $count ?>"><?php }
                                else{?>
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#help<?php echo $count ?>">
                                <?php }?>
                                    <?php the_title();?>

                                </a>
                            </h4>
                        </div>
                        <div id="help<?php echo $count ?>" class="panel-collapse <?php if ($count == 1) {echo 'collapse in';} else {echo 'collapse';} ?>">
                            <div class="panel-body">
                                <div class="panne-subcatagory">
                                    <?php the_content();?>
                                </div>
                            </div>
                        </div>
                    </div>
                       <?php
                     $count++;
                     endwhile;
                        wp_reset_postdata();
                    }
                }
                ?>

          
                    <!-- .panel -->
                </div> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"><h2>FAQs: Customers</h2></div>
            <div class="col-md-9">
                <div class="panel-group" id="accordion1">
                <?php
                $custom_terms = get_terms('faq_category_trees');
                $count = 1;
                foreach($custom_terms as $custom_term) {
                if( $custom_term->slug == 'faq-customers' ){
                    $custom_args = array(
                        'post_type' => '1000tree-faq',
                        'order' => 'ASC',
                        'tax_query' => array( 
                            array(
                                'taxonomy' => 'faq_category_trees', 
                                'field' => 'slug', 
                                'terms' => $custom_term->slug
                            )
                        )
                    );
                    $custom_query = new WP_Query( $custom_args ); 
                    while ( $custom_query->have_posts() ) : $custom_query->the_post(); 
        ?> 
                     <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><?php if ($count == 1) {?>
                             <a data-toggle="collapse" data-parent="#accordion1" href="#faq<?php echo $count ?>"><?php }
                                else{?>
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion1" href="#faq<?php echo $count ?>">
                                <?php }?>
                            
                                    <?php the_title();?>
                                </a>
                            </h4>
                        </div>
                        
                        <div id="faq<?php echo $count ?>" class="panel-collapse <?php if ($count == 1) {echo 'collapse in';} else {echo 'collapse';} ?>">
                            <div class="panel-body">
                                <div class="panne-subcatagory">
                                   <?php the_content();?>
                                </div>
                            </div>
                        </div>
                    </div>
                     <?php
                     $count++;
                     endwhile;
                        wp_reset_postdata();
                    }
                }
                ?>
                    <!-- .panel -->
            
                <!--     <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion1" href="#faq2">
                                    Where does it come from?
                                </a>
                            </h4>
                        </div>
                        <div id="faq2" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="panne-subcatagory">
                                    Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorfaqpsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.
                                </div>
                            </div>
                        </div>
                    </div>  -->
                    <!-- .panel -->
            <!-- 
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion1" href="#faq3">
                                    Why do we use it?
                                </a>
                            </h4>
                        </div>
                        <div id="faq3" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="panne-subcatagory">
                                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
                                </div>
                            </div>
                        </div>
                    </div>  -->
                    <!-- .panel -->
                    
                  <!--   <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion1" href="#faq4">
                                    Where can I get some?
                                </a>
                            </h4>
                        </div>
                        <div id="faq4" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="panne-subcatagory">
                                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.
                                </div>
                            </div>
                        </div>
                    </div>  -->
            </div>
        </div>
    </div>
</div>
</section><!-- /content-wrapper   --> 

<?php get_footer(); ?>         		           