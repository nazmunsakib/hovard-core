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
 * Class Section_Title
 * @package HovardCore\Widgets
 */
class Section_Title extends Widget_Base {

	public function get_name() {
		return 'section_title';
	}

	public function get_title() {
		return __( 'Section Title', 'hovard-core' );
	}

	public function get_icon() {
		return 'eicon-site-title';
	}

	public function get_keywords() {
		return [ 'hovard', 'title' ];
	}

	public function get_categories() {
		return [ 'hovard-elements' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'hovard_title',
			[
				'label' => __( 'Section Title', 'hovard-core' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'hovard-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		/**
		 *  Style Title
		 */
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => __( 'Style Title', 'hovard-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'color_title', [
				'label' => esc_html__( 'Text Color', 'hovard-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hovard-section-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'typography_title',
				'label' => esc_html__( 'Typography', 'hovard-core' ),
				'scheme' => Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .hovard-section-title',
			]
		);

		$this->add_control(
			'bottom_shape_color', [
				'label' => esc_html__( 'Bottom shape Color', 'hovard-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-btm-shape' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bottom_border_color', [
				'label' => esc_html__( 'Bottom Border Color', 'hovard-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-btm-border' => 'background: {{VALUE}};',
				],
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
		if (!empty($settings['title'])){

		?>
            <h4 class="hovard-section-title font-rufina font-bold text-title7 text-shaft mb-2"><?php echo esc_html($settings['title']); ?></h4>

            <div class="section-btm-border bg-iron h-0.5 relative mb-9">
                <span class="section-btm-shape bg-oceangreen w-15 h-1 absolute left-0 top-1/2 -translate-y-1/2"></span>
            </div>
		<?php
		}
	}
}
