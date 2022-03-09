<?php
// Require widget files
require plugin_dir_path(__FILE__) . 'Recent_posts.php';
require plugin_dir_path(__FILE__) . 'About.php';
require plugin_dir_path(__FILE__) . 'Docs.php';
require plugin_dir_path(__FILE__) . 'Forums_widget.php';
require plugin_dir_path(__FILE__) . 'Topic_details.php';

// Register Widgets
add_action( 'widgets_init', function() {
    register_widget( 'HovardCore\WpWidgets\Recent_Posts');
    register_widget('HovardCore\WpWidgets\About');
    //register_widget( 'HovardCore\WpWidgets\Docs');
    if ( class_exists('bbPress') ) {
	    register_widget( 'HovardCore\WpWidgets\Forums_Widget' );
	    //register_widget( 'HovardCore\WpWidgets\Topic_details' );
	    unregister_widget( 'BBP_Forums_Widget' );
    }
});
