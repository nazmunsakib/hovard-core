<?php
/**
 * Background Shapes
 * Style 02 (classic)
 */

use Elementor\Controls_Manager;

$this->start_controls_section(
    'bg_obj_classic', [
        'label' => esc_html__( 'Floating Objects', 'hovard-core' ),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'style' => '2'
        ]
    ]
);

$this->add_control(
    'classic_obj1', [
        'label' => esc_html__( 'Object 01', 'hovard-core' ),
        'type' => Controls_Manager::MEDIA,
        'default' => [
            'url' => plugins_url('images/icon/plus-1.png', __FILE__)
        ],
    ]
);

$this->add_control(
    'classic_obj2', [
        'label' => esc_html__( 'Object 02', 'hovard-core' ),
        'type' => Controls_Manager::MEDIA,
        'default' => [
            'url' => plugins_url('images/icon/slide-2.png', __FILE__)
        ],
    ]
);

$this->add_control(
    'classic_obj3', [
        'label' => esc_html__( 'Object 03', 'hovard-core' ),
        'type' => Controls_Manager::MEDIA,
        'default' => [
            'url' => plugins_url('images/icon/slide-3.png', __FILE__)
        ],
    ]
);

$this->add_control(
    'classic_obj4', [
        'label' => esc_html__( 'Object 04', 'hovard-core' ),
        'type' => Controls_Manager::MEDIA,
        'default' => [
            'url' => plugins_url('images/icon/slide-4.png', __FILE__)
        ],
    ]
);

$this->add_control(
    'classic_obj5', [
        'label' => esc_html__( 'Object 05', 'hovard-core' ),
        'type' => Controls_Manager::MEDIA,
        'default' => [
            'url' => plugins_url('images/icon/slide-5.png', __FILE__)
        ],
    ]
);

$this->add_control(
    'classic_obj6', [
        'label' => esc_html__( 'Object 06', 'hovard-core' ),
        'type' => Controls_Manager::MEDIA,
        'default' => [
            'url' => plugins_url('images/icon/slide-6.png', __FILE__)
        ],
    ]
);

$this->add_control(
    'classic_obj7', [
        'label' => esc_html__( 'Object 07', 'hovard-core' ),
        'type' => Controls_Manager::MEDIA,
        'default' => [
            'url' => plugins_url('images/icon/slide-7.png', __FILE__)
        ],
    ]
);

$this->add_control(
    'classic_obj8', [
        'label' => esc_html__( 'Object 08', 'hovard-core' ),
        'type' => Controls_Manager::MEDIA,
        'default' => [
            'url' => plugins_url('images/icon/slide-8.png', __FILE__)
        ],
    ]
);

$this->end_controls_section();