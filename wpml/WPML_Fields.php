<?php
defined( 'ABSPATH' ) || die();

require_once __DIR__ . '/widgets/Cheatsheet.php';
require_once __DIR__ . '/widgets/Counter.php';
require_once __DIR__ . '/widgets/data_table_header_cols_data.php';
require_once __DIR__ . '/widgets/data_table_content_rows.php';
require_once __DIR__ . '/widgets/Hero_keywords.php';
require_once __DIR__ . '/widgets/List_items.php';
require_once __DIR__ . '/widgets/Tab_items.php';
require_once __DIR__ . '/widgets/testimonials.php';

$widgets_map = [
    
    /**
     * Alert
     */
    'docly_alerts_box' => [
        'fields'     => [
            [
                'field' => 'alert_title',
                'type' => __('Alert Title', 'hovard-core'),
                'editor_type' => 'LINE'
            ],
            [
                'field' => 'alert_description',
                'type' => __('Alert Description', 'hovard-core'),
                'editor_type' => 'AREA'
            ],
        ],
    ],
    
    'hovard_accordion' => [
        'fields'     => [
            [
                'field' => 'title',
                'type' => __('Accordion Title', 'hovard-core'),
                'editor_type' => 'LINE'
            ],
            [
                'field' => 'subtitle',
                'type' => __('Accordion Subtitle', 'hovard-core'),
                'editor_type' => 'AREA'
            ],
        ],
    ],
    
    'hovard_button_icons' => [
        'fields'     => [
            [
                'field' => 'btn_label',
                'type' => __('Button Label', 'hovard-core'),
                'editor_type' => 'LINE'
            ],
        ],
    ],
    
    'Hovard_contact_banner' => [
        'fields'     => [
            [
                'field' => 'title',
                'type' => __('Call to Action :: Title', 'hovard-core'),
                'editor_type' => 'LINE'
            ],
            [
                'field' => 'content',
                'type' => __('Call to Action :: Subtitle', 'hovard-core'),
                'editor_type' => 'AREA'
            ],
            [
                'field' => 'btn_label',
                'type' => __('Call to Action :: Button Title', 'hovard-core'),
                'editor_type' => 'LINE'
            ],
        ],
    ],
    
    'docly_cheatsheet' => [
        'fields'     => [
            [
                'field' => 'title',
                'type' => __('Cheat Sheet :: Title', 'hovard-core'),
                'editor_type' => 'LINE'
            ],
            'integration-class' => 'HovardCore\WPML\Cheatsheet',
        ],
    ],
    
    'docly_counter' => [
        'fields' => [],
        'integration-class' => 'HovardCore\WPML\Counter',
    ],
    
    'docly-data-table' => [
        'fields'     => [],
        'integration-class' => ['HovardCore\WPML\data_table_header_cols_data', 'HovardCore\WPML\data_table_content_rows'],
    ],

    'hovard_hero' => [
        'fields'     => [
            [
                'field' => 'title',
                'type' => __('Hero :: Title', 'hovard-core'),
                'editor_type' => 'LINE'
            ],
            [
                'field' => 'subtitle',
                'type' => __('Hero :: Subtitle', 'hovard-core'),
                'editor_type' => 'AREA'
            ],
            [
                'field' => 'placeholder',
                'type' => __('Hero :: Placeholder', 'hovard-core'),
                'editor_type' => 'LINE'
            ],
            [
                'field' => 'submit_btn_label',
                'type' => __('Hero :: Submit Label', 'hovard-core'),
                'editor_type' => 'LINE'
            ],
            [
                'field' => 'keywords_label',
                'type' => __('Hero :: Keywords Label', 'hovard-core'),
                'editor_type' => 'LINE'
            ],
        ],
        'integration-class' => 'HovardCore\WPML\Hero_keywords',
    ],

    'hovard_info_box' => [
        'fields'     => [
            [
                'field' => 'title',
                'type' => __('Info Box :: Title', 'hovard-core'),
                'editor_type' => 'LINE'
            ],
            [
                'field' => 'link_title',
                'type' => __('Info Box :: Link Title', 'hovard-core'),
                'editor_type' => 'LINE'
            ],
        ],
    ],

    'docly_list_item' => [
        'fields' => [],
        'integration-class' => 'HovardCore\WPML\List_items',
    ],

    'hovard-subscribe' => [
        'fields'     => [
            [
                'field' => 'title',
                'type' => __('Mailchimp Form :: Title', 'hovard-core'),
                'editor_type' => 'LINE'
            ],
            [
                'field' => 'email_placeholder',
                'type' => __('Mailchimp Form :: Email Placeholder', 'hovard-core'),
                'editor_type' => 'LINE'
            ],
            [
                'field' => 'btn_label',
                'type' => __('Mailchimp Form :: Button Label', 'hovard-core'),
                'editor_type' => 'LINE'
            ],
        ],
    ],

    'hovard_tabs' => [
        'fields' => [],
        'integration-class' => 'HovardCore\WPML\Tab_items',
    ],

    'hovard_testimonial' => [
        'fields' => [],
        'integration-class' => 'HovardCore\WPML\testimonials',
    ],

    'hovard_videos_playlist' => [
        'fields'     => [
            [
                'field' => 'title',
                'type' => __('Video Playlist :: Title', 'hovard-core'),
                'editor_type' => 'LINE'
            ],
        ],
    ],
];