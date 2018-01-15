<?php /* <div class="container"> 
    <div class="rn-banner rn-blog-banner">
       <?php the_post_thumbnail('full') ?>
        <div class="rn-banner-caption rn-page-banner-caption">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 wow rnfadeInUp">
                        <h1><?php the_title(); ?></h1>                       
                    </div>

                </div>

            </div>
        </div>
        <div class="rn-overlay"></div>
    </div>
    </div> 
<?php */ ?>
<?php if (get_the_post_thumbnail('full')){ ?>
<div class="container"> 
    <div class="flexslider blog-single loading">
                        <ul class="slides">                           
                                <li class="item">



                                    <div class="rn-banner">
       <?php the_post_thumbnail('full') ?>
        <div class="rn-banner-caption rn-page-banner-caption">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 wow rnfadeInUp">
                        <h1><?php the_title(); ?></h1>                       
                    </div>

                </div>

            </div>
        </div>
        <div class="rn-overlay"></div>
    </div>

                                   
                                </li>
                          
                        </ul>
                    </div>
                    </div> 
<?php } ?>