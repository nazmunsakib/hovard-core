<?php

namespace HovardCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Schemes\Color;
use Elementor\Group_Control_Border;
use Elementor\Core\Schemes\Typography;
use Elementor\Group_Control_Typography;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Resume_History
 * @package HovardCore\Widgets
 */
class Resume_History extends \Elementor\Widget_Base {

	public function get_name() {
		return 'resume-history';
	}

	public function get_title() {
		return __( 'Resume History (Hovard)', 'hovard-core' );
	}

	public function get_icon() {
		return 'eicon-time-line';
	}

	public function get_categories() {
		return [ 'hovard-elements' ];
	}

	public function get_keywords() {
		return [ 'resume', 'history', 'timeline' ];
	}

	protected function register_controls() {

		// ------------------------------ Resume History ------------------------------ //
		$this->start_controls_section(
			'resume_sec', [
				'label' => __( 'Resume History', 'hovard-core' ),
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'institution', [
				'label'       => __( 'Company / Institution', 'hovard-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'st_en_year', [
				'label'       => __( 'Start and end Year', 'hovard-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => __( '2018 - 2021', 'hovard-core' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'designation', [
				'label'       => __( 'Course / Designation', 'hovard-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => __( 'Software Developer', 'hovard-core' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'description', [
				'label' => __( 'Description', 'hovard-core' ),
				'type'  => \Elementor\Controls_Manager::TEXTAREA,
			]
		);

		$this->add_control(
			'resume_histories',
			[
				'label'       => __( 'Resume Histories', 'hovard-core' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'title_field' => '{{{ designation }}}',
			]
		);

		$this->end_controls_section(); // End Resume history

		/**
		 * Style History
		 */
		$this->start_controls_section(
			'style_content_sec', [
				'label' => __( 'Style History', 'hovard-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'institution_color', [
				'label'     => __( 'Company / Institution Text Color', 'hovard-core' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .institution' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name'     => 'institution_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'selector' => '
                    {{WRAPPER}} .institution,
                ',
			]
		);

		$this->add_control(
			'st_en_year_color', [
				'label'     => __( 'Start and end Year Color', 'hovard-core' ),
				'type'      => Controls_Manager::COLOR,
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .st-en-year' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name'     => 'st_en_year_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'selector' => '
                    {{WRAPPER}} .st-en-year,
                ',
			]
		);

		$this->add_control(
			'designation_color', [
				'label'     => __( 'Course / Designation Color', 'hovard-core' ),
				'type'      => Controls_Manager::COLOR,
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .designation' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name'     => 'typography_designation',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'selector' => '
                    {{WRAPPER}} .designation,
                ',
			]
		);
		$this->add_control(
			'description_color', [
				'label'     => __( 'Description Color', 'hovard-core' ),
				'type'      => Controls_Manager::COLOR,
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .description' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name'     => 'description_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'selector' => '
                    {{WRAPPER}} .description,
                ',
			]
		);

		$this->end_controls_section();

		/**
		 * Bar Style
		 */
		$this->start_controls_section(
			'style_bar', [
				'label' => __( 'Bar Style', 'hovard-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'bar_color', [
				'label'     => __( 'History Bar Color', 'hovard-core' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .history-bar:before' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'circle_color', [
				'label'     => __( 'Circle Color', 'hovard-core' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .circle' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();


	}

	protected function render() {
		$settings         = $this->get_settings_for_display();
		$resume_histories = ! empty( $settings['resume_histories'] ) ? $settings['resume_histories'] : '';

		// Include Part
		include( "inc/resume/resume-history.php" );
	}
}