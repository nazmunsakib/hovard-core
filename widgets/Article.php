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
 * Class Article
 * @package HovardCore\Widgets
 */
class Article extends \Elementor\Widget_Base {

	public function get_name() {
		return 'hovard_article';
	}

	public function get_title() {
		return __( 'Article (Hovard)', 'hovard-core' );
	}

	public function get_icon() {
		return ' eicon-posts-grid';
	}

	public function get_categories() {
		return [ 'hovard-elements' ];
	}

	public function get_keywords() {
		['blog', 'article'];
	}

	protected function register_controls() {

		// ------------------------------ Portfolios ------------------------------ //
		$this->start_controls_section(
			'article_sec', [
				'label' => __( 'Article', 'hovard-core' ),
			]
		);

		$this->add_control(
			'posts_per_page', [
				'label'       => esc_html__( 'Show Number of posts', 'hovard-core' ),
				'description' => esc_html__( 'Maximum number of posts.', 'hovard-core' ),
				'type'        => Controls_Manager::NUMBER,
				'label_block' => true,
				'default'     => 6
			]
		);

		$this->end_controls_section(); // End Portfolios

		/**
		 * Style Button
		 */
		$this->start_controls_section(
			'style_article_content', [
				'label' => __( 'Style Filter BUtton', 'hovard-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'article_title_color', [
				'label' => __( 'Title color', 'hovard-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .article-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'article_title_typography',
				'scheme' => Typography::TYPOGRAPHY_1,
				'selector' => '
                    {{WRAPPER}} .article-title,
                ',
			]
		);

		$this->add_control(
			'article_cat_list_color', [
				'label' => __( 'Categories Background', 'hovard-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hbcat-list' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'article_cat_typography',
				'scheme' => Typography::TYPOGRAPHY_1,
				'selector' => '
                    {{WRAPPER}} .hbcat-list,
                ',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings  = $this->get_settings();

		// Include Part
		include("inc/article/article-1.php");
	}
}