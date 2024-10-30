<?php
class CTMFE_Widget extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'ctmfe_name';
    }

    public function get_title()
    {
        return __('Click to map', 'ctmfe_name');
    }

    public function get_icon()
    {
        return 'eicon-google-maps';
    }

    public function get_categories()
    {
        return [ 'general' ];
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
              'label' => __('Content', 'ctmfe_name'),
              'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'website_link',
            [
                'label' => esc_html__('Google Map Link', 'ctmfe_name'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'ctmfe_name'),
                'description' => 'Link from the Google Maps shared iframe.',
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
            ]
        );


        $this->add_control(
            'widget_text',
            [
                'label' => esc_html__('Infotext', 'ctmfe_name'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => esc_html__('The content is provided by Google. If you active it, some data might be transfered or it will set cookies. More information can be found in our privacy page.', 'ctmfe_name'),
                'placeholder' => esc_html__('Text', 'ctmfe_name'),
            ]
        );

        $this->add_control(
            'widget_button_text',
            [
                'label' => esc_html__('Button text', 'ctmfe_name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Accept', 'ctmfe_name'),
                'placeholder' => esc_html__('Type the button text here', 'ctmfe_name'),
            ]
        );

        $this->add_control(
        			'bg_image',
        			[
        				'label' => esc_html__( 'Background image', 'ctmfe_name' ),
        				'type' => \Elementor\Controls_Manager::MEDIA,
        				'default' => [
        					'url' => \Elementor\Utils::get_placeholder_image_src(),
        				],
        			]
        		);

        $this->end_controls_section();

        $this->start_controls_section(
            'image_section',
            [
                'label' => __('Frame', 'ctmfe_name'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );



        $this->add_responsive_control(
            'height',
            [
                'label' => esc_html__('Height', 'ctmfe_name'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ,'vh' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'vh' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                  'desktop_default' => [
                    'unit' => 'px',
                    'size' => "400",
                  ],
                  'tablet_default' => [
                    'unit' => 'px',
                    'size' => "300",
                  ],
                  'mobile_default' => [
                    'unit' => 'px',
                    'size' => "200",
                  ],
                'selectors' => [
                    '{{WRAPPER}} .click__map' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .click__map iframe' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'label' => esc_html__('Map border', 'ctmfe_name'),
                'selector' => '{{WRAPPER}} .click__map',
            ]
        );

        $this->add_responsive_control(
            'inner_width',
            [
                'label' => esc_html__('Text width', 'ctmfe_name'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ,'vh' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'vh' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                  'desktop_default' => [
                    'unit' => 'px',
                    'size' => "600",
                  ],
                  'tablet_default' => [
                    'unit' => 'px',
                    'size' => "400",
                  ],
                  'mobile_default' => [
                    'unit' => 'px',
                    'size' => "200",
                  ],
                'selectors' => [
                    '{{WRAPPER}} .click__map .click__map__text__content' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->add_control(
            'margin',
            [
                'label' => esc_html__('Text padding', 'ctmfe_name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .click__map .click__map__text__content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'selector' => '{{WRAPPER}} .click__map__text__content',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'frame_background',
                'label' => esc_html__('Background', 'ctmfe_name'),
                'types' => [ 'classic', 'gradient'],
                'selector' => '{{WRAPPER}} .click__map__text__content',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'button_section',
            [
                'label' => __('Button', 'ctmfe_name'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
              'label' => esc_html__('Button Font', 'ctmfe_name'),
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .click__map__text__content button',
            ]
        );
        $this->add_control(
            'button_color',
            [
                'label' => esc_html__('Button Color', 'ctmfe_name'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .click__map__text__content button' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'button_background',
                'label' => esc_html__('Button Background', 'ctmfe_name'),
                'types' => [ 'classic', 'gradient'],
                'selector' => '{{WRAPPER}} .click__map__text__content button',
            ]
        );
        $this->end_controls_section();
    }


    protected function render()
    {
        $isEditor = \Elementor\Plugin::$instance->editor->is_edit_mode();
        $settings = $this->get_settings_for_display();
        $url = $settings['website_link']['url'];
        $text = $settings['widget_text'];
        $buttonText = $settings['widget_button_text'];

        wp_register_script('ctmfe_script', plugins_url('../scripts/main.js', __FILE__), '', '', true);
        wp_enqueue_script('ctmfe_script');

        echo '<div class="click__map">';
        echo '<iframe src="" data-url="'.esc_url($url).'" style="border:0;" allowfullscreen="" loading="lazy"></iframe>';
        echo '<div class="click__map__text" style="background-image:url(\''.$settings['bg_image']['url'].'\')"><div class="click__map__text__content"><p>'.wp_kses_post($text).'</p><button onclick="ctmfeAccept();">'.esc_attr($buttonText).'</button></div></div>';
        echo '</div>';
    }

    protected function _content_template()
    {
    }
}
