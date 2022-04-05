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
 * Class Pricing_Table
 * @package HovardCore\Widgets
 */
class Pricing_Table extends Widget_Base {

	public function get_name() {
		return 'pricing-table';
	}

	public function get_title() {
		return __( 'Pricing Table (Hovard)', 'hovard-core' );
	}

	public function get_icon() {
		return 'eicon-price-table';
	}

	public function get_keywords() {
		return [ 'pricing', 'table' ];
	}

	public function get_categories() {
		return [ 'hovard-elements' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'pricing_table',
			[
				'label' => __( 'Pricing Table', 'hovard-core' ),
			]
		);

		$this->add_control(
			'table_price',
			[
				'label'       => __( 'Price', 'hovard-core' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => __( '$10', 'hovard-core' )
			]
		);

		$this->add_control(
			'table_title',
			[
				'label'       => __( 'Title', 'hovard-core' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => __( 'Standard', 'hovard-core' )
			]
		);

		$this->add_control(
			'table_features',
			[
				'label'       => __( 'Pricing Features', 'hovard-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'description' => __( 'Each line consider your feature ', 'hovard-core' ),
			]
		);

		$this->add_control(
			'table_btn_text',
			[
				'label'       => __( 'Button Text', 'hovard-core' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => __( 'Purchase Now', 'hovard-core' )
			]
		);

		$this->add_control(
			'table_btn_url',
			[
				'label'       => __( 'Button Url', 'hovard-core' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		/**
		 *  Style Pricing table
		 */
		$this->start_controls_section(
			'table_style',
			[
				'label' => __( 'Style Pricing', 'hovard-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'price_color', [
				'label'     => esc_html__( 'Price color', 'hovard-core' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pricing-table p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name'     => 'typography_price',
				'label'    => esc_html__( 'Typography', 'hovard-core' ),
				'scheme'   => Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .pricing-table p',
			]
		);

		$this->add_control(
			'title_bg', [
				'label'     => esc_html__( 'Title Background color', 'hovard-core' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .title-bg' => 'background: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'title_color', [
				'label'     => esc_html__( 'Title color', 'hovard-core' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pricing-table h4' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name'      => 'typography_title',
				'label'     => esc_html__( 'Typography', 'hovard-core' ),
				'scheme'    => Typography::TYPOGRAPHY_1,
				'separator' => 'after',
				'selector'  => '{{WRAPPER}} .pricing-table h4',
			]
		);

		$this->add_control(
			'features_color', [
				'label'     => esc_html__( 'Features Color', 'hovard-core' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pricing-table ul li' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name'      => 'typography_features',
				'label'     => esc_html__( 'Typography', 'hovard-core' ),
				'scheme'    => Typography::TYPOGRAPHY_1,
				'selector'  => '{{WRAPPER}} .pricing-table ul li',
				'separator' => 'after',
			]
		);

		$this->add_control(
			'btn_text_color', [
				'label'     => esc_html__( 'Button Text Color', 'hovard-core' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pricing-table a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'btn_background', [
				'label'     => esc_html__( 'Button Background', 'hovard-core' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pricing-table a' => 'background: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name'     => 'typography_btn',
				'label'    => esc_html__( 'Typography', 'hovard-core' ),
				'scheme'   => Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .pricing-table a',
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
		include( "inc/pricing-table/pricing-1.php" );
	}
}
