<?php

use Elementor\Controls_Manager;

/** ============ Featured Images ============ **/
$this->start_controls_section(
    'f_images_sec',
    [
        'label' => esc_html__( 'Featured Images', 'hovard-core' ),
        'condition' => [
            'style' => ['4']
        ]
    ]
);

$this->add_control(
    'left_img', [
        'label' => esc_html__( 'Left Image', 'hovard-core' ),
        'type' => Controls_Manager::MEDIA,
        'default' => [
            'url' => plugins_url('images/v.svg', __FILE__)
        ]
    ]
);

$this->add_control(
    'right_img', [
        'label' => esc_html__( 'Right Image', 'hovard-core' ),
        'type' => Controls_Manager::MEDIA,
        'default' => [
            'url' => plugins_url('images/b_leaf.svg', __FILE__)
        ]
    ]
);

$this->end_controls_section();


/**
 * Style Background
 * Style 04 (Cool)
 */
$this->start_controls_section(
    '4_bg_obj', [
        'label' => esc_html__( 'Style Background', 'hovard-core' ),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'style' => ['4']
        ]
    ]
);

$this->add_control(
    'background_image', [
        'label' => esc_html__( 'Background Image', 'hovard-core' ),
        'type' => Controls_Manager::MEDIA,
        'default' => [
            'url' => plugins_url('images/banner_bg_two.png', __FILE__)
        ]
    ]
);

$this->add_control(
    'star_1', [
        'label' => esc_html__( 'Star 01', 'hovard-core' ),
        'type' => Controls_Manager::MEDIA,
        'default' => [
            'url' => plugins_url('images/star.png', __FILE__)
        ]
    ]
);

$this->add_control(
    'star_2', [
        'label' => esc_html__( 'Star 02', 'hovard-core' ),
        'type' => Controls_Manager::MEDIA,
        'default' => [
            'url' => plugins_url('images/star.png', __FILE__)
        ]
    ]
);

$this->add_control(
    'star_3', [
        'label' => esc_html__( 'Star 03', 'hovard-core' ),
        'type' => Controls_Manager::MEDIA,
        'default' => [
            'url' => plugins_url('images/star.png', __FILE__)
        ]
    ]
);

$this->end_controls_section();