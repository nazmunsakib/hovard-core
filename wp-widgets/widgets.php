<?php
// Require widget files
require plugin_dir_path( __FILE__ ) . 'Recent_posts.php';
require plugin_dir_path( __FILE__ ) . 'About.php';

// Register Widgets
add_action( 'widgets_init', function () {
	register_widget( 'HovardCore\WpWidgets\Recent_Posts' );
	register_widget( 'HovardCore\WpWidgets\About' );

} );
