<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package tapko
 */
get_header();
?>
<section class="common-block ">
    <div class="container">
        <?php
        if ( have_posts() ) : ?>
        <div class="heading">
            <h2 class="cat-block">
                <?php
                printf( esc_html__( 'Search Results for: %s', 'tapko' ), '<span>' . get_search_query() . '</span>' );
                ?>
            </h2>
        </div>
        <div class="block__elem clearfix">
            <?php
            /* Start the Loop */
            while ( have_posts() ) : the_post();
                /**
                 * Run the loop for the search to output the results.
                 * If you want to overload this in a child theme then include a file
                 * called content-search.php and that will be used instead.
                 */
                get_template_part( 'template-parts/content', 'search' );
            endwhile;
            the_posts_navigation();
            else :
                get_template_part( 'template-parts/content', 'none' );
            endif; ?>
        </div>
    </div>
</section>
<?php
get_sidebar();
get_footer();