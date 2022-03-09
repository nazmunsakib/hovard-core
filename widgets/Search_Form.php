<?php
namespace HovardCore\Widgets;

use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Core\Schemes\Color;
use Elementor\Core\Schemes\Typography;
use WP_Query;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Class Search_Form
 * @package HovardCore\Widgets
 */
class Search_Form extends Widget_Base {

    public function get_name() {
        return 'hovard_search_form';
    }

    public function get_title() {
        return esc_html__( 'Hovard Search Form', 'hovard-core' );
    }

    public function get_icon() {
        return 'eicon-device-desktop';
    }

    public function get_categories() {
        return [ 'hovard-elements' ];
    }

    public function get_style_depends() {
        return [ 'nice-select' ];
    }

    public function get_script_depends() {
        return [ 'nice-select' ];
    }

    protected function register_controls() {

        /** ============ Search Form ============ **/
        $this->start_controls_section(
            'search_form_sec',
            [
                'label' => esc_html__( 'Form', 'hovard-core' ),
            ]
        );

        $this->add_control(
            'placeholder',
            [
                'label' => esc_html__( 'Placeholder', 'hovard-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Search for Topics....',
            ]
        );

        $this->add_control(
            'btn-divider',
            [
                'label' => esc_html__( 'Button', 'hovard-core' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

	    $this->add_control(
		    'submit_btn_icon',
		    [
			    'label' => esc_html__( 'Submit Button Icon', 'hovard-core' ),
			    'type' => \Elementor\Controls_Manager::ICONS,
			    'default' => [
				    'value' => 'fas fa-search',
				    'library' => 'solid',
			    ],
		    ]
	    );

        $this->add_control(
            'btn-position',
            [
                'label' => esc_html__( 'Position', 'hovard-core' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .search_form_wrap .search_submit_btn' => 'right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'keywords_sec',
            [
                'label' => esc_html__( 'Keywords', 'hovard-core' ),
            ]
        );

        $this->add_control(
            'is_keywords', [
                'label' => esc_html__( 'Keywords', 'hovard-core' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'keywords_label',
            [
                'label' => esc_html__( 'Keywords Label', 'hovard-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Popular:',
                'condition' => [
                    'is_keywords' => 'yes'
                ]
            ]
        );

        $keywords = new \Elementor\Repeater();

        $keywords->add_control(
            'title', [
                'label' => __( 'Title', 'hovard-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'keywords',
            [
                'label' => __( 'Repeater List', 'hovard-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $keywords->get_controls(),
                'default' => [
                    [
                        'title' => __( 'Keyword #1', 'hovard-core' ),
                    ],
                    [
                        'title' => __( 'Keyword #2', 'hovard-core' ),
                    ],
                ],
                'title_field' => '{{{ title }}}',
                'prevent_empty' => false,
                'condition' => [
                    'is_keywords' => 'yes'
                ]
            ]
        );

        $this->end_controls_section();

        /**
         * Style Keywords
         * Global
         */
        include ('inc/search-form/controls/style.php');

    }

    protected function render() {
        $settings = $this->get_settings();
        $title_tag = !empty($settings['title_tag']) ? $settings['title_tag'] : 'h2';

        include( "inc/search-form/search-form.php" );
    }
}