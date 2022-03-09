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
 * Class Hovard_Title
 * @package HovardCore\Widgets
 */
class Hovard_Title extends Widget_Base {

	public function get_name() {
		return 'hovard_title';
	}

	public function get_title() {
		return __( 'Hovard Title', 'hovard-core' );
	}

	public function get_icon() {
		return 'eicon-site-title';
	}

	public function get_keywords() {
		return [ 'hovard', 'info', 'title' ];
	}

	public function get_categories() {
		return [ 'hovard-elements' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'hovard_title',
			[
				'label' => __( 'Hovard Title', 'hovard-core' ),
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
					'{{WRAPPER}} .section-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'typography_title',
				'label' => esc_html__( 'Typography', 'hovard-core' ),
				'scheme' => Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .section-title',
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
        $title = '';
        if (!empty($settings['title'])){
	        $title = $settings['title'];
        }

		?>
			<div class="pt-17.5" x-data="{ sectionTitle: '<?php echo esc_html($title); ?>'}">
				<h2
					class="section-title font-ibmplexmono font-medium text-subtitle2 text-sienna tracking-l1 mb-2.5 pl-12.5 relative before:absolute before:left-0 before:top-1/2 before:-translate-y-1/2 before:w-7.5 before:h-0.5 before:bg-oceangreen before:inline-block"
					x-text="sectionTitle"
					x-intersect="$el.classList.add('animate__animated', 'animate__fadeInUp')"
				></h2>
			</div>
		<?php
	}
}
