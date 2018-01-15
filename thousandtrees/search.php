<?php
/**
 * Template Name: Search Page
 */

get_header();

//query bulider
$args = ['post_type' => 'product',
    'meta_query'         => array(
        // 'relation' => 'AND',
        array(
            'key'     => 'np_booking_location',
            'value'   => $_POST['destination'],
            'compare' => 'LIKE',
        ),
        // array(
        //     'key' => 'wcv_expiry_date',
        //     'value' => $_POST['date'],
        //     'type'  => 'DATE',
        //     'compare' => '>='
        //     ),
        // array(
        //     'key'     => 'wcv_number_of_adult',
        //     'value'   => $_POST['guest'],
        //     'compare' => '>=',
        // ),
    ),
];

$searchPosts = new WP_Query($args);
$found = 0;
// echo count($searchPosts);
// echo '<pre>';
// print_r($searchPosts);
?>

<div class="shop-page" id="special-offer">
    <div class="container">
        <!--        --><?php //if(empty($_POST['destination']) || empty($_POST['from-date']) || empty($_POST['to-date'])){?>
        <!--            <h2>No Results Found. Please select all the required fields</h2>-->
        <!--            --><?php
        //        } else{?>

        <h2>Search Results
            <span>Location: <?php echo $_POST['destination']; ?></span>
            <span> From: <?php echo $_POST['from-date']; ?></span>
            <span> To: <?php echo $_POST['to-date']; ?></span>
            <span> Hopping: <?php echo $_POST['hopping']; ?></span>
        </h2>

        <ul class="products a" >
            <?php if ($searchPosts->have_posts()): while ($searchPosts->have_posts()): $searchPosts->the_post();

                ?>




                <?php

                $expiry_date = get_post_meta(get_the_ID(), 'wcv_expiry_date', true);
                $start_date  = get_post_meta(get_the_ID(), 'wcv_start_date', true);
                $number_of_days = get_post_meta(get_the_ID(), 'wcv_number_of_days', true);

                $from_date   = str_replace('/', '-', $_POST['from-date']);
                $to_date     = str_replace('/', '-', $_POST['to-date']);

                $first_date  = new DateTime($expiry_date);
                $second_date = new DateTime($start_date);
                $difference  = $first_date->diff($second_date);
                
                if($_POST['from-date'] && $_POST['to-date']) {

                    if ($_POST['hopping'] == 'no' && strtotime($from_date) == strtotime($start_date) && strtotime($to_date) == strtotime($expiry_date)):

                        ?>
                        <h2>22a</h2>

                        <?php $found = 1; ?>
                        <li <?php post_class(); ?>>
                            <!-- <div class="search-days"><?php echo $difference->d . ' days'; ?></div> -->
                            <div class="search-days"><?php echo $number_of_days . ' days'; ?></div>
                            <div class="thumbnail wow fadeInUp animated">
                                <a href="<?php the_permalink(); ?>">
                                    <div class="image">
                                        <?php the_post_thumbnail('large', array('alt' => get_the_title())); ?>
                                    </div>
                                    <?php
                                    $discount_tag = get_post_meta($post->ID, 'wcv_discount_tagline', false);
                                    $expiry_date = get_post_meta($post->ID, 'wcv_expiry_date', false);
                                    $adults = get_post_meta($post->ID, 'wcv_number_of_adult', true);
                                    $kids = get_post_meta($post->ID, 'wcv_number_of_kids', true);
                                    $location = get_post_meta($post->ID, 'np_booking_location', true);
                                    $exp_date = date("F j, Y", strtotime($expiry_date[0]));
                                    ?>

                                    <!-- <span>
                  <?php //echo $discount_tag[0]; 
                                    ?>% Discount  -  offer ends: <?php //echo $exp_date; 
                                    ?>
                  </span>
                  <h2> <?php //the_title();
                                    ?></a></h2> -->
                                </a>
                                <div class="offer">
                                    <span class="offer-price">-<?php echo $discount_tag[0]; ?>%</span> <span
                                            class="offer-end">offer ends: <?php echo $exp_date; ?></span>
                                </div>
                                <div class="info">
                                    <a href="<?php the_permalink(); ?>"><h2> <?php the_title(); ?></h2></a>
                                    <span class="location"><i class="fa fa-map-marker"
                                                              aria-hidden="true"></i> <?php echo $location; ?></span>
                                    <span class="people br-btm"><i class="fa fa-user"
                                                                   aria-hidden="true"></i><?php echo $adults; ?> Adults - <?php echo $kids; ?>
                                        Kids </span>
                                    <div class="book-wrapper">
                                        <a href="<?php the_permalink(); ?>" class="btn btn-book">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </li>


                        <?php

                    elseif ($_POST['hopping'] == 'yes'):

                        $first_to_date = new DateTime($to_date);
                        $second_from_date = new DateTime($from_date);
                        $diff = $first_to_date->diff($second_from_date);

                        if ($difference->d <= $diff->d && strtotime($from_date) >= strtotime($start_date) && strtotime($to_date) <= strtotime($expiry_date)) {
                            ?>                           

                            <?php $found = 1; ?>
                            <li <?php post_class(); ?>>
                                <!-- <div class="search-days"><?php echo $difference->d . ' days'; ?></div> -->
                                <div class="search-days"><?php echo $number_of_days . ' days'; ?></div>
                                <div class="thumbnail wow fadeInUp animated">
                                    <a href="<?php the_permalink(); ?>">
                                        <div class="image">
                                            <?php the_post_thumbnail('large', array('alt' => get_the_title())); ?>
                                        </div>
                                        <?php
                                        $discount_tag = get_post_meta($post->ID, 'wcv_discount_tagline', false);
                                        $expiry_date = get_post_meta($post->ID, 'wcv_expiry_date', false);
                                        $adults = get_post_meta($post->ID, 'wcv_number_of_adult', true);
                                        $kids = get_post_meta($post->ID, 'wcv_number_of_kids', true);
                                        $location = get_post_meta($post->ID, 'np_booking_location', true);
                                        $exp_date = date("F j, Y", strtotime($expiry_date[0]));
                                        ?>

                                        <!-- <span>
        <?php //echo $discount_tag[0]; 
                                        ?>% Discount  -  offer ends: <?php //echo $exp_date; 
                                        ?>
      </span>
      <h2> <?php //the_title();
                                        ?></a></h2> -->
                                    </a>
                                    <div class="offer">
                                        <span class="offer-price">-<?php echo $discount_tag[0]; ?>%</span> <span
                                                class="offer-end">offer ends: <?php echo $exp_date; ?></span>
                                    </div>
                                    <div class="info">
                                        <a href="<?php the_permalink(); ?>"><h2> <?php the_title(); ?></h2></a>
                                        <span class="location"><i class="fa fa-map-marker"
                                                                  aria-hidden="true"></i> <?php echo $location; ?></span>
                                        <span class="people br-btm"><i class="fa fa-user"
                                                                       aria-hidden="true"></i><?php echo $adults; ?>
                                            Adults - <?php echo $kids; ?> Kids </span>
                                        <div class="book-wrapper">
                                            <a href="<?php the_permalink(); ?>" class="btn btn-book">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php
                        }

                    endif;
                }
                else{
                    
                    
                    ?>

                    <li <?php post_class(); ?>>
                        <!-- <div class="search-days"><?php echo $difference->d . ' days'; ?></div> -->
                        <div class="search-days"><?php echo $number_of_days . ' days'; ?></div>
                        <div class="thumbnail wow fadeInUp animated">
                            <a href="<?php the_permalink();?>">
                                <div class="image">
                                    <?php the_post_thumbnail('large', array('alt' => get_the_title()));?>
                                </div>
                                <?php
                                $discount_tag = get_post_meta( $post->ID, 'wcv_discount_tagline', false );
                                $expiry_date = get_post_meta( $post->ID, 'wcv_expiry_date', false );
                                $adults = get_post_meta($post->ID, 'wcv_number_of_adult', true);
                                $kids = get_post_meta($post->ID, 'wcv_number_of_kids', true);
                                $location = get_post_meta($post->ID, 'np_booking_location', true);
                                $exp_date = date("F j, Y" , strtotime($expiry_date[0]) );
                                ?>

                                <!-- <span>
        <?php //echo $discount_tag[0]; ?>% Discount  -  offer ends: <?php //echo $exp_date; ?>
      </span>
      <h2> <?php //the_title();?></a></h2> -->
                            </a>
                            <div class="offer">
                                <span class="offer-price">-<?php echo $discount_tag[0]; ?>%</span> <span class="offer-end">offer ends: <?php echo $exp_date; ?></span>
                            </div>
                            <div class="info">
                                <a href="<?php the_permalink();?>"><h2> <?php the_title();?></h2></a>
                                <span class="location"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $location; ?></span>
                                <span class="people br-btm"><i class="fa fa-user" aria-hidden="true"></i><?php echo $adults; ?> Adults - <?php echo $kids; ?> Kids </span>
                                <div class="book-wrapper">
                                    <a href="<?php the_permalink(); ?>" class="btn btn-book">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </li>
            
            <?php
                    
                }
            endwhile;endif;
            
            ?>

        </ul>
        <!--        --><?php //}?>

        <?php/*
        if($found == 0){

            // echo '<h2>Search Result for '.$_POST['destination'].'</h1>';

            ?>
            <ul class="products b" >
                <h2>22</h2>
                <?php if ($searchPosts->have_posts()): while ($searchPosts->have_posts()): $searchPosts->the_post();

                    $expiry_date = get_post_meta(get_the_ID(), 'wcv_expiry_date', true);
                    $start_date  = get_post_meta(get_the_ID(), 'wcv_start_date', true);

                    $from_date   = str_replace('/', '-', $_POST['from-date']);
                    $to_date     = str_replace('/', '-', $_POST['to-date']);

                    $first_date  = new DateTime($expiry_date);
                    $second_date = new DateTime($start_date);
                    $difference  = $first_date->diff($second_date);



                    ?>



                    <li <?php post_class(); ?>>
                        <div class="search-days"><?php echo $difference->d . ' days'; ?></div>
                        <div class="thumbnail wow fadeInUp animated">
                            <a href="<?php the_permalink();?>">
                                <div class="image">
                                    <?php the_post_thumbnail('large', array('alt' => get_the_title()));?>
                                </div>
                                <?php
                                $discount_tag = get_post_meta( $post->ID, 'wcv_discount_tagline', false );
                                $expiry_date = get_post_meta( $post->ID, 'wcv_expiry_date', false );
                                $adults = get_post_meta($post->ID, 'wcv_number_of_adult', true);
                                $kids = get_post_meta($post->ID, 'wcv_number_of_kids', true);
                                $location = get_post_meta($post->ID, 'np_booking_location', true);
                                $exp_date = date("F j, Y" , strtotime($expiry_date[0]) );
                                ?>

                                <!-- <span>
        <?php //echo $discount_tag[0]; ?>% Discount  -  offer ends: <?php //echo $exp_date; ?>
      </span>
      <h2> <?php //the_title();?></a></h2> -->
                            </a>
                            <div class="offer">
                                <span class="offer-price">-<?php echo $discount_tag[0]; ?>%</span> <span class="offer-end">offer ends: <?php echo $exp_date; ?></span>
                            </div>
                            <div class="info">
                                <a href="<?php the_permalink();?>"><h2> <?php the_title();?></h2></a>
                                <span class="location"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $location; ?></span>
                                <span class="people br-btm"><i class="fa fa-user" aria-hidden="true"></i><?php echo $adults; ?> Adults - <?php echo $kids; ?> Kids </span>
                                <div class="book-wrapper">
                                    <a href="<?php the_permalink(); ?>" class="btn btn-book">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </li>







                    <?php
                endwhile;endif;?>

            </ul>

            <?php



//            echo '<h2>No Result Found!!</h1>';
        }
        echo $found;*/


        ?>

    </div>
</div>

<?php get_footer();?>
