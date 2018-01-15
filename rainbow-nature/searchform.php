<?php
/**
 * The template for displaying search in all pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package rainbow_nature
 */
?>

	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'twentyeleven' ); ?>" />
        <a id="searchsubmit" class="rn-search-menu" href=""><i class="fa fa-search" aria-hidden="true"></i></a>
	</form>
