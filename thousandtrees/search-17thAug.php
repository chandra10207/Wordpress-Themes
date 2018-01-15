<?php
/**
 * Template Name: Search Page
 */

get_header();

//query bulider
$args = ['post_type' => 'product',
    'meta_query'         => array(
        'relation' => 'AND',
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
        array(
            'key'     => 'wcv_number_of_adult',
            'value'   => $_POST['guest'],
            'compare' => '>=',
        ),
    ),
];

$searchPosts = new WP_Query($args);
// print_r($posts);
?>
<div class="shop-page" id="special-offer">
  <div class="container">
  <h2>Search Results 
  <span>Location: <?php echo $_POST['destination']; ?></span>
  <span> Date: <?php echo $_POST['date']; ?></span>
  <span> Number Of People: <?php echo $_POST['guest']; ?></span>
  </h2>

  <ul class="products" >
  <?php if ($searchPosts->have_posts()): while ($searchPosts->have_posts()): $searchPosts->the_post();

        $expiry_date = get_post_meta(get_the_ID(), 'wcv_expiry_date', true);

        $date = str_replace('/', '-', $_POST['date']);

        if (strtotime($date) <= strtotime($expiry_date)):
        ?>
            <li <?php post_class();?>>
           <div class="thumbnail wow fadeInUp animated">

            <a href="<?php the_permalink();?>">
              <div class="image">
              <?php the_post_thumbnail('large', array('alt' => get_the_title()));?>
              </div>
              <?php
        $discount_tag = get_post_meta(get_the_ID(), 'wcv_discount_tagline', false);
        $expiry_date  = get_post_meta(get_the_ID(), 'wcv_expiry_date', false);
        $exp_date     = date("d/n/y", strtotime($expiry_date[0]));
        ?>

              <!-- <span>
                <?php //echo $discount_tag[0]; ?>% Discount  -  offer ends: <?php //echo $exp_date; ?>
              </span>
              <h2> <?php //the_title();?></a></h2> -->
            </a>

            <div class="info">
              <a href="<?php the_permalink();?>"><span>
                <?php echo $discount_tag[0]; ?>% Discount  -  offer ends: <?php echo $exp_date; ?>
              </span></a>
              <h2> <?php the_title();?></a></h2>
              <p id="treeinfo" class="info-toggle">
              <?php //the_excerpt();?>
              <?php echo word_count(get_the_excerpt(), '10'); ?>
              </p>
              <a href="<?php the_permalink();?>"><button id="treehover" class="view-btn info-toggle">Book Now</button></a>
            </div>
            </div>
        </li>
        <?php
    endif;
endwhile;endif;?>

  </ul>
  </div>
  </div>

  <?php get_footer();?>
