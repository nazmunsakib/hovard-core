<?php

namespace HovardCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Schemes\Color;
use Elementor\Core\Schemes\Typography;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class Working_Process
 * @package HovardCore\Widgets
 */
class Working_Process extends Widget_Base {

	public function get_name() {
		return 'working-process';
	}

	public function get_title() {
		return __( 'Working Process', 'hovard-core' );
	}

	public function get_icon() {
		return ' eicon-order-end';
	}

	public function get_keywords() {
		return [ 'working', 'process', 'title', 'history' ];
	}

	public function get_categories() {
		return [ 'hovard-elements' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'working_process',
			[
				'label' => __( 'Working Process', 'hovard-core' ),
			]
		);

		$this->add_control(
			'wp_icon',
			[
				'label'       => __( 'Icon', 'hovard-core' ),
				'type'        => Controls_Manager::MEDIA,
				'label_block' => true,
			]
		);

		$this->add_control(
			'wp_title',
			[
				'label'       => __( 'Title', 'hovard-core' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => __( 'Research', 'hovard-core' )
			]
		);

		$this->add_control(
			'wp_desc',
			[
				'label'       => __( 'Description', 'hovard-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default'     => __( 'Heaven greater fish Midst fly us green over beginning make.', 'hovard-core' )
			]
		);

		$this->end_controls_section();

		/**
		 *  Style Working Process
		 */
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => __( 'Style Title', 'hovard-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'color_wp_title', [
				'label'     => esc_html__( 'Title color', 'hovard-core' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .workp-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name'     => 'typography_title',
				'label'    => esc_html__( 'Typography', 'hovard-core' ),
				'scheme'   => Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .workp-title',
			]
		);

		$this->add_control(
			'color_wp_desc', [
				'label'     => esc_html__( 'Description color', 'hovard-core' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .workp-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name'     => 'typography_desc',
				'label'    => esc_html__( 'Typography', 'hovard-core' ),
				'scheme'   => Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .workp-desc',
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render alert widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings();

		// Include Part
		include( "inc/working-process/working-process.php" );
	}
}
