<?php

/**
 * Registers an editor stylesheet for the theme.
 */
function tapko_add_editor_styles() {
	add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'tapko_add_editor_styles' );
