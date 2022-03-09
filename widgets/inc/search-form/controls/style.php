<?php
/** ============ Content Styling ============ **/

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;

$this->start_controls_section(
	'style_form', [
		'label' => esc_html__( 'Form', 'hovard-core' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	]
);

$this->add_responsive_control(
    'input-padding', [
        'label'      => __( 'Padding', 'hovard-core' ),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%', 'em' ],
        'separator'  => 'before',
        'selectors'  => [
            '{{WRAPPER}} .search_field_wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Border::get_type(),
    [
        'name' => 'input-border',
        'label' => esc_html__( 'Border', 'hovard-core' ),
        'selector' => '{{WRAPPER}} .search_field_wrap',
    ]
);

$this->add_responsive_control(
    'border-radius', [
        'label'      => __( 'Border Radius', 'hovard-core' ),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%', 'em' ],
        'selectors'  => [
            '{{WRAPPER}} .search_field_wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

$this->add_control(
	'color_placeholder', [
		'label'     => esc_html__( 'Placeholder Color', 'hovard-core' ),
		'type'      => Controls_Manager::COLOR,
        'separator'  => 'before',
		'selectors' => [
			'{{WRAPPER}} .search_form_wrap .search_field_wrap::placeholder' => 'color: {{VALUE}};',
		],
	]
);

$this->add_group_control(
	Group_Control_Typography::get_type(), [
		'name'     => 'typography_placeholder',
		'label'    => esc_html__( 'Typography', 'hovard-core' ),
		'scheme'   => Typography::TYPOGRAPHY_1,
		'selector' => '{{WRAPPER}} .search_form_wrap .search_field_wrap::placeholder',
	]
);

$this->add_control(
	'color_text', [
		'label'     => esc_html__( 'Text Color', 'hovard-core' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => [
			'{{WRAPPER}} .search_form_wrap .search_field_wrap' => 'color: {{VALUE}};',
		],
		'separator' => 'before'
	]
);

$this->add_control(
    'btn-style-divider',
    [
        'label' => esc_html__( 'Button', 'hovard-core' ),
        'type'      => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

$this->add_responsive_control(
    'btn-padding', [
        'label'      => __( 'Padding', 'hovard-core' ),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%', 'em' ],
        'separator'  => 'before',
        'selectors'  => [
            '{{WRAPPER}} .search_form_wrap .search_submit_btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

$this->add_control(
	'color_icon', [
		'label'     => esc_html__( 'Icon/Label Color', 'hovard-core' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => [
			'{{WRAPPER}} .search_submit_btn > i' => 'color: {{VALUE}} !important;',
		],
	]
);

$this->add_control(
	'search_bg',
	[
		'label'     => __( 'Background Color', 'hovard-core' ),
		'type'      => \Elementor\Controls_Manager::COLOR,
		'separator' => 'before',
		'selectors' => [
			'{{WRAPPER}} .search_form_wrap .search_submit_btn' => 'background: {{VALUE}}',
		],
	]
);

$this->end_controls_section();


$this->start_controls_section(
	'style_keywords', [
		'label' => esc_html__( 'Keywords', 'hovard-core' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	]
);

$this->add_control(
	'margin_keywords', [
		'label'       => __( 'Margin', 'hovard-core' ),
		'description' => __( 'Margin around the keywords block', 'hovard-core' ),
		'type'        => Controls_Manager::DIMENSIONS,
		'size_units'  => [ 'px', '%', 'em' ],
		'selectors'   => [ '{{WRAPPER}} .header_search_keyword' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};' ],
		'separator'   => 'before',
		'default'     => [
			'unit' => 'px', // The selected CSS Unit. 'px', '%', 'em',
		],
	]
);

$this->add_control(
	'color_keywords_label', [
		'label'     => esc_html__( 'Label Color', 'hovard-core' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => [
			'{{WRAPPER}} .header_search_keyword .header-search-form__keywords-label' => 'color: {{VALUE}};',
		],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name'     => 'keyword_label_typography',
		'label'    => __( 'Label Typography', 'hovard-core' ),
		'scheme'   => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
		'selector' => '{{WRAPPER}} .search_keyword_label',
	]
);

$this->add_control(
	'color_keywords', [
		'label'     => esc_html__( 'Keyword Color', 'hovard-core' ),
		'type'      => Controls_Manager::COLOR,
		'separator' => 'before',
		'selectors' => [
			'{{WRAPPER}} .header_search_keyword ul li a' => 'color: {{VALUE}};',
		],
	]
);

$this->add_control(
	'color_keywords_bg', [
		'label'     => esc_html__( 'Background Color', 'hovard-core' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => [
			'{{WRAPPER}} .header_search_keyword ul li a' => 'background: {{VALUE}};',
		],
	]
);

$this->add_group_control(
	Group_Control_Typography::get_type(), [
		'name'     => 'typography_keywords',
		'label'    => esc_html__( 'Typography', 'hovard-core' ),
		'scheme'   => Typography::TYPOGRAPHY_1,
		'selector' => '{{WRAPPER}} .header_search_keyword ul li a',
	]
);

$this->add_control(
	'keywords_padding', [
		'label'      => __( 'Padding', 'hovard-core' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => [ 'px', '%', 'em' ],
		'selectors'  => [ '{{WRAPPER}} .header_search_keyword ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};' ],
		'default'    => [
			'unit' => 'px', // The selected CSS Unit. 'px', '%', 'em',
		],
	]
);

$this->add_control(
	'border_radius', [
		'label'      => __( 'Border Radius', 'hovard-core' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => [ 'px', '%', 'em' ],
		'selectors'  => [ '{{WRAPPER}} .header_search_keyword ul li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};' ],
		'default'    => [
			'unit' => 'px', // The selected CSS Unit. 'px', '%', 'em',
		],
	]
);

$this->end_controls_section();