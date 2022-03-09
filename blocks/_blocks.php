<?php

add_action('acf/init', function() {

    // check function exists
    if( function_exists('acf_register_block') ) {

        // Tab
        acf_register_block( array (
            'name'				=> 'hovard-tab',
            'title'				=> esc_html__('Tab', 'hovard-core'),
            'description'		=> esc_html__('A custom testimonial block by Hovard.', 'hovard-core'),
            'render_callback'	=> 'hovard_acf_block_tab',
            'category'			=> 'formatting',
            'icon'				=> 'editor-table',
            'keywords'			=> array( 'tab', 'tabs' ),
        ));

        // Accordion
        acf_register_block( array (
            'name'				=> 'hovard-accordion',
            'title'				=> esc_html__('Accordion', 'hovard-core'),
            'description'		=> esc_html__('A custom accordion block by Hovard.', 'hovard-core'),
            'render_callback'	=> 'hovard_acf_block_accordion',
            'category'			=> 'formatting',
            'icon'				=> 'menu-alt3',
            'keywords'			=> array( 'accordion', 'toggle' ),
        ));

        // Notice
        acf_register_block( array (
            'name'				=> 'hovard-notice',
            'title'				=> esc_html__('Notice/Message', 'hovard-core'),
            'description'		=> esc_html__('A custom notice/message block by Hovard.', 'hovard-core'),
            'render_callback'	=> 'hovard_acf_block_notice',
            'category'			=> 'formatting',
            'icon'				=> 'info',
            'keywords'			=> array( 'notice', 'message', 'info', 'explanation', 'alert' ),
        ));

        // Changelogs
        acf_register_block( array (
            'name'				=> 'hovard-changelogs',
            'title'				=> esc_html__('Changelogs', 'hovard-core'),
            'description'		=> esc_html__('A custom changelog block by Hovard.', 'hovard-core'),
            'render_callback'	=> 'hovard_acf_block_changelogs',
            'category'			=> 'formatting',
            'icon'				=> 'info',
            'keywords'			=> array( 'notice', 'message', 'info', 'explanation', 'alert' ),
        ));
    }
});

require_once __DIR__.'/tab.php';
require_once __DIR__.'/accordion.php';
require_once __DIR__.'/changelogs.php';