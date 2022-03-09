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
 * Class Testimonial
 * @package HovardCore\Widgets
 */
class Testimonial extends \Elementor\Widget_Base {

    public function get_name() {
        return 'hovard_testimonial';
    }

    public function get_title() {
        return __( 'Testimonial (Hovard)', 'hovard-core' );
    }

    public function get_icon() {
        return 'eicon-testimonial-carousel';
    }

    public function get_categories() {
        return [ 'hovard-elements' ];
    }

    protected function register_controls() {

        // ------------------------------ Testimonials 01 ------------------------------ //
        $this->start_controls_section(
            'testimonials_sec', [
                'label' => __( 'Testimonials', 'hovard-core' ),
            ]
        );

        $repeater = new \Elementor\Repeater();

	    $repeater->add_control(
		    'author_image', [
			    'label' => __( 'Author Image', 'hovard-core' ),
			    'type' => \Elementor\Controls_Manager::MEDIA,
			    'separator' => 'before'
		    ]
	    );

        $repeater->add_control(
            'name', [
                'label' => __( 'Name', 'hovard-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Mark Tony' , 'hovard-core' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'designation', [
                'label' => __( 'Designation', 'hovard-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Software Developer' , 'hovard-core' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'content', [
                'label' => __( 'Testimonial Text', 'hovard-core' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $repeater->add_control(
            'quote_icon', [
                'label' => __( 'Quote Icon', 'hovard-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'separator' => 'before'
            ]
        );


        $this->add_control(
            'testimonials',
            [
                'label' => __( 'Testimonials', 'hovard-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ name }}}',
            ]
        );

        $this->end_controls_section(); // End Testimonials 01

        /**
         * Style Content
         */
        $this->start_controls_section(
            'style_content_sec', [
                'label' => __( 'Style Content', 'hovard-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'content_color', [
                'label' => __( 'Feedback Text Color', 'hovard-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feedback' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_contents',
                'scheme' => Typography::TYPOGRAPHY_1,
                'selector' => '
                    {{WRAPPER}} .feedback,
                ',
            ]
        );

        $this->add_control(
            'author_color', [
                'label' => __( 'Author Name Color', 'hovard-core' ),
                'type' => Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .author-name' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_author',
                'scheme' => Typography::TYPOGRAPHY_1,
                'selector' => '
                    {{WRAPPER}} .author-name,
                ',
            ]
        );

        $this->add_control(
            'designation_color', [
                'label' => __( 'Author Designation Color', 'hovard-core' ),
                'type' => Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .author-designation' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_designation',
                'scheme' => Typography::TYPOGRAPHY_1,
                'selector' => '
                    {{WRAPPER}} .author-designation,
                ',
            ]
        );

        $this->end_controls_section();


        // ------------------------------------- Style Section ---------------------------//
        $this->start_controls_section(
            'style_section', [
                'label' => __( 'Testimonial style', 'hovard-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

	    $this->add_group_control(
		    \Elementor\Group_Control_Background::get_type(),
		    [
			    'name' => 'fdb-background',
			    'label' => __( 'Background', 'hovard-core' ),
			    'types' => [ 'classic', 'gradient'],
			    'selector' => '{{WRAPPER}} .testimonial-bg',
		    ]
	    );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $testimonials = !empty( $settings['testimonials'] ) ? $settings['testimonials'] : '';

        // Include Part
        include("inc/testimonials/testimonials-1.php");
    }
}