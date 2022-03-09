<?php
/** ============ Featured Images Light  ============ **/

use Elementor\Controls_Manager;

$this->start_controls_section(
    'f_images_sec2',
    [
        'label' => esc_html__( 'Featured Images', 'hovard-core' ),
        'condition' => [
            'style' => ['5']
        ]
    ]
);

$this->add_control(
    'light_f_img1', [
        'label' => esc_html__( 'Featured Image 01', 'hovard-core' ),
        'type' => Controls_Manager::MEDIA,
        'default' => [
            'url' => plugins_url('images/building.png', __FILE__)
        ]
    ]
);


$this->add_control(
    'light_f_img3', [
        'label' => esc_html__( 'Featured Image 03', 'hovard-core' ),
        'type' => Controls_Manager::MEDIA,
        'default' => [
            'url' => plugins_url('images/table.svg', __FILE__)
        ]
    ]
);

$this->add_control(
    'light_f_img4', [
        'label' => esc_html__( 'Featured Image 04', 'hovard-core' ),
        'type' => Controls_Manager::MEDIA,
        'default' => [
            'url' => plugins_url('images/bord.png', __FILE__)
        ]
    ]
);

$this->add_control(
    'light_f_img5', [
        'label' => esc_html__( 'Featured Image 05', 'hovard-core' ),
        'type' => Controls_Manager::MEDIA,
        'default' => [
            'url' => plugins_url('images/girl.png', __FILE__)
        ]
    ]
);

$this->end_controls_section();