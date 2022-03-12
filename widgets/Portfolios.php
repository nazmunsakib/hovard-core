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
 * Class Portfolios
 * @package HovardCore\Widgets
 */
class Portfolios extends \Elementor\Widget_Base {

	public function get_name() {
		return 'hovard_portfolios';
	}

	public function get_title() {
		return __( 'Portfolios (Hovard)', 'hovard-core' );
	}

	public function get_icon() {
		return ' eicon-posts-grid';
	}

	public function get_categories() {
		return [ 'hovard-elements' ];
	}

	public function get_keywords() {
		['portfolio', 'project'];
	}

	protected function register_controls() {

		// ------------------------------ Portfolios ------------------------------ //
		$this->start_controls_section(
			'testimonials_sec', [
				'label' => __( 'Portfolios', 'hovard-core' ),
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'project_id', [
				'label' => __('Select Project', 'hovard-core'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => hovard_get_posts('portfolio')
			]
		);

		$repeater->add_control(
			'image_size', [
				'label' => __('Select Image Type', 'hovard-core'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'6' => 'Big',
					'3' => 'Small'
				],
				'default' => '3'
			]
		);

		$this->add_control(
			'portfolios', [
				'label' => __( 'Portfolios', 'hovard-core' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '',
			]
		);

		$this->end_controls_section(); // End Portfolios

		/**
		 * Style Button
		 */
		$this->start_controls_section(
			'style_portfolio_btn', [
				'label' => __( 'Style Filter BUtton', 'hovard-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'pbtn_text_color', [
				'label' => __( 'Button Text Color', 'hovard-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .p-tab-btn .button' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'pbtn_bg_color', [
				'label' => __( 'Button Background', 'hovard-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .p-tab-btn .button' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'pbtn_typography',
				'scheme' => Typography::TYPOGRAPHY_1,
				'selector' => '
                    {{WRAPPER}} .p-tab-btn .button,
                ',
			]
		);

		$this->end_controls_section();

		/**
		 * Style Content
		 */
		$this->start_controls_section(
			'style_portfolio_content', [
				'label' => __( 'Style Content', 'hovard-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color', [
				'label' => __( 'Title Color', 'hovard-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .project-item h4' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'title_typography',
				'scheme' => Typography::TYPOGRAPHY_1,
				'selector' => '
                    {{WRAPPER}} .project-item h4,
                ',
			]
		);

		$this->add_control(
			'cat_color', [
				'label' => __( 'Category name color', 'hovard-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .project-item p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'cat_typography',
				'scheme' => Typography::TYPOGRAPHY_1,
				'selector' => '
                    {{WRAPPER}} .project-item p,
                ',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$portfolios = !empty( $settings['portfolios'] ) ? $settings['portfolios'] : '';

		// Include Part
		include("inc/portfolio/portfolio-1.php");
	}
}