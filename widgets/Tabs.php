<?php

namespace HovardCore\Widgets;

use Elementor\Plugin;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Essential_Addons_Elementor\Classes\Helper;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Hovard Tabs
 */
class Tabs extends Widget_Base {

	public function get_name() {
		return 'hovard_tabs';
	}

	public function get_title() {
		return esc_html__( 'Hovard Tabs', 'hovard-core' );
	}

	public function get_icon() {
		return 'eicon-tabs';
	}

	public function get_categories() {
		return [ 'hovard-elements' ];
	}

	protected function register_controls() {

		// ------------------------------ Feature list ------------------------------
		$this->start_controls_section(
			'section_tabs',
			[
				'label' => __( 'Hovard Tabs', 'hovard-core' ),
			]
		);


		$repeater = new Repeater();

		$repeater->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'essential-addons-for-elementor-lite' ),
				'type'  => Controls_Manager::ICONS,
			]
		);

		$repeater->add_control(
			'tab_title',
			[
				'label'       => __( 'Tab Title', 'hovard-core' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Tab Title', 'hovard-core' ),
				'placeholder' => __( 'Tab Title', 'hovard-core' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'tabs_content_type',
			[
				'label'   => __( 'Content Type', 'hovard-core' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'content'  => __( 'Content', 'hovard-core' ),
					'template' => __( 'Saved Templates', 'hovard-core' ),
				],
				'default' => 'content',
			]
		);

		$repeater->add_control(
			'primary_templates',
			[
				'label'     => __( 'Choose Template', 'hovard-core' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => hovard_get_el_templates(),
				'condition' => [
					'tabs_content_type' => 'template',
				],
			]
		);

		$repeater->add_control(
			'tab_content',
			[
				'label'       => __( 'Content', 'hovard-core' ),
				'default'     => __( 'Tab Content', 'hovard-core' ),
				'placeholder' => __( 'Tab Content', 'hovard-core' ),
				'type'        => Controls_Manager::WYSIWYG,
				'show_label'  => false,
				'condition'   => [
					'tabs_content_type' => 'content',
				],
			]
		);

		$repeater->end_controls_tab();

		$this->add_control(
			'tabs',
			[
				'label'       => __( 'Tabs Items', 'hovard-core' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'title_field' => '{{{ tab_title }}}',
			]
		);

		$this->end_controls_section();


		//--------------------- Section Color-----------------------------------//
		$this->start_controls_section(
			'style_tabs_sec',
			[
				'label' => __( 'Tabs Style', 'hovard-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'tab-typo',
				'label'    => __( 'Typography', 'hovard-core' ),
				'scheme'   => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .tab_shortcode .nav-tabs .nav-item .nav-link, {{WRAPPER}} .header_tab_items .nav.nav-tabs li a',
			]
		);

		$this->add_control(
			'icon-size',
			[
				'label'      => esc_html__( 'Icon Size', 'hovard-core' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					],
					'%'  => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default'    => [
					'unit' => 'px',
				],
				'selectors'  => [
					'{{WRAPPER}} .header_tab_items .nav.nav-tabs li a i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);


		$this->start_controls_tabs(
			'style_tabs'
		);

		/// Normal  Style
		$this->start_controls_tab(
			'style_normal',
			[
				'label' => __( 'Normal', 'hovard-core' ),
			]
		);

		$this->add_control(
			'normal_title_font_color', [
				'label'     => __( 'Title Font Color', 'hovard-core' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .tab-item-title, {{WRAPPER}} .header_tab_items .nav.nav-tabs li a' => 'color: {{VALUE}}',
				)
			]
		);

		$this->add_control(
			'normal_bg_color', [
				'label'     => __( 'Background Color', 'hovard-core' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .tab-item-title, {{WRAPPER}} .header_tab_items' => 'background: {{VALUE}};',
				)
			]
		);

		$this->end_controls_tab();

		/// ----------------------------- Active Style--------------------------//
		$this->start_controls_tab(
			'style_active_btn',
			[
				'label' => __( 'Active', 'hovard-core' ),
			]
		);

		$this->add_control(
			'active_title_font_color', [
				'label'     => __( 'Title Font Color', 'hovard-core' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .tab-item-title.active, {{WRAPPER}} .header_tab_items .nav.nav-tabs li a.active' => 'color: {{VALUE}};',
				)
			]
		);

		$this->add_control(
			'active_bg_color', [
				'label'     => __( 'Border Top Color', 'hovard-core' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .tab-item-title::before' => 'background: {{VALUE}};',
				),
				'condition' => [
					'style' => [ '1' ]
				]
			]
		);

		$this->end_controls_tab();

		$this->end_controls_section();


		//------------------------------------ Tab Border Radius -------------------------------------------//
		$this->start_controls_section(
			'sec_style', [
				'label' => __( 'Content', 'hovard-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'border',
				'label'    => esc_html__( 'Border', 'hovard-core' ),
				'selector' => '{{WRAPPER}} .tab_shortcode .tab-content, {{WRAPPER}} .tab_shortcode .nav-tabs .nav-item .nav-link',
			]
		);

		$this->add_responsive_control(
			'content-pad', [
				'label'      => __( 'Padding', 'hovard-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .tab_shortcode .tab-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$tabs     = ! empty( $settings['tabs'] ) ? $settings['tabs'] : '';

		include( "inc/tabs/tabs-1.php" );
	}
}