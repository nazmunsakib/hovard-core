<?php
namespace HovardCore\Widgets;

use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Schemes\Color;
use Elementor\Core\Schemes\Typography;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor icon widget.
 *
 * Elementor widget that displays an icon from over 600+ icons.
 *
 * @since 1.0.0
 */
class Button extends Widget_Base {
    public function get_name() {
        return 'hovard_button_icons';
    }

    public function get_title() {
        return __( 'Hovard Button', 'hovard-core' );
    }

    public function get_icon() {
        return 'eicon-favorite';
    }

    public function get_categories() {
        return [ 'hovard-elements' ];
    }

    public function get_keywords() {
        return [ 'icon' ];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'section_icon',
            [
                'label' => __( 'Icon', 'hovard-core' ),
            ]
        );

        $this->add_control(
            'btn_label',
            [
                'label' => esc_html__( 'Button Label', 'hovard-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Learn More'
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label' => __( 'Alignment', 'hovard-core' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left'    => [
                        'title' => __( 'Left', 'hovard-core' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'hovard-core' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'hovard-core' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => __( 'Justified', 'hovard-core' ),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'prefix_class' => 'elementor%s-align-',
                'default' => '',
            ]
        );

        $this->add_control(
            'btn_style',
            [
                'label' => __( 'Button Style', 'hovard-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'text' => esc_html__( 'Text with Icon Button', 'hovard-core' ),
                    'normal' => esc_html__( 'Normal Button', 'hovard-core' ),
                ],
                'default' => 'text',
            ]
        );

        $this->add_control(
            'icon_type',
            [
                'label' => __( 'Icon Type', 'hovard-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'fontawesome' => esc_html__( ' Font-Awesome', 'hovard-core' ),
                    'eicon' => esc_html__( 'Elegant Icon', 'hovard-core' ),
                    'flaticon' => esc_html__( 'Flaticon', 'hovard-core' ),
                ],
                'default' => 'eicon',
            ]
        );

        $this->add_control(
            'fontawesome',
            [
                'label' => __( 'Font-Awesome', 'hovard-core' ),
                'type' => Controls_Manager::ICONS,
                'condition' => [
                    'icon_type' => 'fontawesome'
                ]
            ]
        );

        $this->add_control(
            'eicon',
            [
                'label' => __( 'Elegant Icon', 'hovard-core' ),
                'type' => Controls_Manager::ICON,
                'options' => hovard_elegant_icons(),
                'include' => hovard_include_elegant_icons(),
                'default' => 'arrow_right',
                'condition' => [
                    'icon_type' => 'eicon'
                ]
            ]
        );

        $this->add_control(
            'ticon',
            [
                'label' => __( 'Themify Icon', 'hovard-core' ),
                'type' => Controls_Manager::ICON,
                'options' => hovard_themify_icons(),
                'include' => hovard_include_themify_icons(),
                'default' => 'ti-panel',
                'condition' => [
                    'icon_type' => 'ticon'
                ]
            ]
        );

        $this->add_control(
            'flaticon',
            [
                'label'      => __( 'Flaticon', 'hovard-core' ),
                'type'       => Controls_Manager::ICON,
                'options'    => hovard_flaticons(),
                'include'    => hovard_include_flaticons(),
                'default'    => 'flaticon-mortarboard',
                'condition'  => [
                    'icon_type' => 'flaticon'
                ]
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => __( 'Link', 'hovard-core' ),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => __( 'https://your-link.com', 'hovard-core' ),
                'default' => [
                    'url' => '#'
                ]
            ]
        );

        $this->end_controls_section();

        /**
         * Button Style
         */
        $this->start_controls_section(
            'style_title', [
                'label' => __( 'Button Style', 'hovard-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_btn',
                'scheme' => Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .hovard_btn_w_icon .hovard-btn',
            ]
        );

        $this->start_controls_tabs( 'tabs_button_style' );

        $this->start_controls_tab(
            'tab_button_normal',
            [
                'label' => __( 'Normal', 'elementor' ),
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label' => __( 'Text Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .hovard_btn_w_icon .hovard-btn' => 'fill: {{VALUE}}; color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'background_color',
            [
                'label' => __( 'Background Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hovard_btn_w_icon .hovard-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_button_hover',
            [
                'label' => __( 'Hover', 'elementor' ),
            ]
        );

        $this->add_control(
            'hover_color',
            [
                'label' => __( 'Text Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hovard_btn_w_icon .hovard-btn:hover, {{WRAPPER}} .hovard_btn_w_icon .hovard-btn:focus' => 'color: {{VALUE}};'
                ],
            ]
        );

        $this->add_control(
            'button_background_hover_color',
            [
                'label' => __( 'Background Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hovard_btn_w_icon .hovard-btn:hover, {{WRAPPER}} .hovard_btn_w_icon .hovard-btn:focus' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_border_color',
            [
                'label' => __( 'Border Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .hovard_btn_w_icon .hovard-btn:hover, {{WRAPPER}} .hovard_btn_w_icon .hovard-btn:focus' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'selector' => '{{WRAPPER}} .hovard_btn_w_icon .hovard-btn',
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'border_radius',
            [
                'label' => __( 'Border Radius', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .hovard_btn_w_icon .hovard-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'selector' => '{{WRAPPER}} .hovard_btn_w_icon .hovard-btn',
            ]
        );

        $this->add_responsive_control(
            'text_padding',
            [
                'label' => __( 'Padding', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .hovard_btn_w_icon .hovard-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();

        /**
         * Icon Style
         */
        $this->start_controls_section(
            'style_btn_icon', [
                'label' => __( 'Button Icon', 'hovard-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_size',
            [
                'label' => __( 'Icon Size', 'hovard-core' ),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .hovard_btn_w_icon .hovard-btn i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                ],
            ]
        );

        $this->add_control(
            'icon_padding_i',
            [
                'label' => __( 'Icon Spacing', 'hovard-core' ),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .hovard_btn_w_icon .hovard-btn i' => 'padding-left: {{SIZE}}{{UNIT}};',
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render icon widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'wrapper', 'class', "hovard_btn_w_icon hovard-btn-{$settings['align']}" );

        if ( !empty($settings['link']['url']) ) {
            $this->add_link_attributes( 'button', $settings['link'] );
        }

        $btn_style = $settings['btn_style'] == 'normal' ? 'action_btn' : 'learn_btn';
        $this->add_render_attribute( 'button', 'class', 'hovard-btn '.$btn_style );

        switch ( $settings['icon_type'] ) {
            case 'eicon':
                $icon = !empty($settings['eicon']) ? $settings['eicon'] : '';
                break;
            case 'ticon':
                $icon = !empty($settings['ticon']) ? $settings['ticon'] : '';
                break;
            case 'slicon':
                wp_enqueue_style( 'simple-line-icon' );
                $icon = !empty($settings['slicon']) ? $settings['slicon'] : '';
                break;
            case 'flaticon':
                $icon = !empty($settings['flaticon']) ? $settings['flaticon'] : '';
                break;
        }
        ?>
        <div <?php echo $this->get_render_attribute_string('wrapper') ?>>
            <a <?php echo $this->get_render_attribute_string('button') ?>>
                <?php echo !empty($settings['btn_label']) ? wp_kses_post( $settings['btn_label'] ) : ''; ?>
                <?php if ( $settings['icon_type'] == 'fontawesome' ) {
                    \Elementor\Icons_Manager::render_icon( $settings['fontawesome'], [ 'aria-hidden' => 'true' ] );
                } else { ?>
                    <i class="<?php echo esc_attr( $icon ) ?>"></i>
                <?php } ?>
            </a>
        </div>
        <?php
    }
}
