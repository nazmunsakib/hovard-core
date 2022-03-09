<?php
namespace amaCore\Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use WP_Query;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Single_forum extends Widget_Base {

	public function get_name() {
		return 'ama_single_forum';
	}

	public function get_title() {
		return __( 'Single Forum', 'ama-core' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_categories() {
		return [ 'ama-elements' ];
	}

	protected function register_controls() {

		//-------- Select Style ---------- //
		$this->start_controls_section(
			'style_sec',
			[
				'label' => esc_html__( 'Preset Skins', 'ama-core' ),
			]
		);

		$this->add_control(
			'style',
			[
				'label'   => esc_html__( 'Forums Style', 'ama-core' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'1' => [
						'icon'  => 'single_forum_1',
						'title' => esc_html__( '01 : Single Forum With Topics', 'ama-core' ),
					],
					'2' => [
						'icon'  => 'single_forum_2',
						'title' => esc_html__( '02 : Single Forum', 'ama-core' ),
					],
				],

				'default' => '1',
			]
		);

		$this->end_controls_section(); // End Style

		$this->start_controls_section(
			'forum_thumb', [
				'label' => __( 'Thumbnail', 'ama-core' ),
			]
		);

		$this->add_control(
			'cover_image', [
				'label'       => __( 'Custom Cover Image', 'ama-core' ),
				'type'        => \Elementor\Controls_Manager::MEDIA,
				'description' => __( 'If this is not set, the featured image will be used by default', 'ama-core' )
			]
		);

		$this->end_controls_section();

		// --- Filter Options
		$this->start_controls_section(
			'filter_opt', [
				'label' => __( 'Filter Options', 'ama-core' ),
			]
		);

		$this->add_control(
			'forum_id', [
				'label'   => esc_html__( 'Select Forum', 'ama-core' ),
				'type'    => Controls_Manager::SELECT,
				'options' => ama_get_posts( 'forum' )
			]
		);

		$this->add_control(
			'ppp', [
				'label'       => esc_html__( 'Topics', 'ama-core' ),
				'description' => esc_html__( 'Maximum number of topics.', 'ama-core' ),
				'type'        => Controls_Manager::NUMBER,
				'label_block' => true,
				'default'     => 3
			]
		);

		$this->add_control(
			'order', [
				'label'   => esc_html__( 'Order', 'ama-core' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'ASC'  => 'ASC',
					'DESC' => 'DESC'
				],
				'default' => 'ASC'
			]
		);

		$this->add_control(
			'word_length',
			[
				'label'       => __( 'Number of Words', 'ama-core' ),
				'type'        => \Elementor\Controls_Manager::NUMBER,
				'description' => __( 'Number of words to show as forum content', 'ama-core' ),
				'default'     => 12
			]
		);

		$this->add_control(
			'read_more',
			[
				'label'       => esc_html__( 'Read More Text', 'ama-core' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => __( 'View All', 'ama-core' ),
			]
		);

		$this->end_controls_section();

		/**============== Background shape Image =====================**/
		$this->start_controls_section(
			'single_forum_style', [
				'label' => __( 'Single Forum Style', 'ama-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'border',
				'selector' => '{{WRAPPER}} .forum-card, {{WRAPPER}} .forum-with-topics .topic-table .topic-heading, {{WRAPPER}} .forum-with-topics .topic-table .topic-contents',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'label'    => __( 'Title Typography', 'ama-core' ),
				'scheme'   => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'separator' => 'before',
				'selector' => '{{WRAPPER}} .forum-with-topics .topic-table .topic-contents .title h3, {{WRAPPER}} .forum-card .card-title h3',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'     => __( 'Title Color', 'ama-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'separator'=>'after',
				'selectors' => [
					'{{WRAPPER}} .forum-with-topics .topic-table .topic-contents .title h3' => 'color: {{VALUE}}',
					'{{WRAPPER}} .forum-card .card-title h3' => 'color: {{VALUE}}'
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'excerpt_typography',
				'label'    => __( 'Excerpt Typography', 'ama-core' ),
				'scheme'   => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .forum-with-topics .topic-table .topic-contents .title p, {{WRAPPER}} .forum-card .card-body',
			]
		);

		$this->add_control(
			'excerpt_color',
			[
				'label'     => __( 'Excerpt Color', 'ama-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .forum-with-topics .topic-table .topic-contents .title p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .forum-card .card-body' => 'color: {{VALUE}}'
				],
			]
		);

		$this->add_control(
			'box-shadow-heading',
			[
				'label'     => esc_html__( 'Box Shadow', 'ama-core' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'item_box_shadow',
			[
				'label'     => esc_html__( 'Item Box Shadow', 'ama-core' ),
				'type'      => \Elementor\Controls_Manager::BOX_SHADOW,
				'selectors' => [
					'{{WRAPPER}} .forum-with-topics .topic-table .topic-contents' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}};',
					'{{WRAPPER}} .card.forum-card' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings           = $this->get_settings();
		$forum_id           = $settings['forum_id'] ? $settings['forum_id'] : '';
		$cover_image        = $settings['cover_image'];
		$post_thumbnail_url = ! empty( $cover_image['url'] ) ? $cover_image['url'] : get_the_post_thumbnail_url( $forum_id );

		$topics = new WP_Query( array(
			'post_type'      => bbp_get_topic_post_type(),
			'order'          => $settings['order'] ? $settings['order'] : 'DESC',
			'posts_per_page' => $settings['ppp'] ? $settings['ppp'] : 3,
			'post_parent'    => $forum_id,
		) );

		if ( $forum_id ) {
			include "inc/single-forum/single-forum-{$settings['style']}.php";
		} else {
			?>
            <div class="alert alert-warning" role="alert">
				<?php _e( 'Please select a forum.', 'ama-core' ); ?>
            </div>
			<?php
		}
	}
}