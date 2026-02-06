<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use NewzzElements\Group_Control_Query;
use Elementor\Controls_Stack;


if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 *  Widget
 */
class Cww_Companion_Banner extends Widget_Base {

    /**
     * Retrieve  widget name.
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'animated-banner';
    }

    /**
     * Retrieve  widget title.
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('Animated Banner', 'cww-companion');
    }


    /**
     * Retrieve the list of categories the  widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories() {
        return ['portfolio-elements'];
    }



    /**
     * Retrieve  widget icon.
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-form-horizontal';
    }

    /**
     * Register  widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @access protected
     */
    protected function register_controls() {

        $this->start_controls_section(
            'header', [
                'label' => esc_html__('Image Settings', 'cww-companion'),
            ]
        );

       
         $this->add_control(
			'image',
			[
				'label'   => esc_html__( 'Choose Image', 'cww-companion' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				
				'dynamic'     => [ 'active' => true ],
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name'      => 'image',
				'label'     => esc_html__( 'Image Size', 'cww-companion' ),
				'default'   => 'full',
				
			]
		);

		$this->add_control(
			'post_heading',
			[
				'label'       => esc_html__( 'Floating Content Title', 'cww-companion' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter title for floating content.', 'cww-companion' ),
				'default'     => esc_html__( 'New Clients', 'cww-companion' ),
			]
		);

		$this->add_control(
			'post_sub_heading',
			[
				'label'       => esc_html__( 'Floating Content', 'cww-companion' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter content for floating text.', 'cww-companion' ),
				'default'     => esc_html__( '+128%', 'cww-companion' ),
			]
		);

        $this->end_controls_section();

        

       



         /**
         * Style Tab: Floating Content
         */
        $this->start_controls_section(
                'title_style', [
                    'label' => esc_html__('Floating Content - Title', 'cww-companion'),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'title_typography',
                'label' => esc_html__('Typography', 'cww-companion'),
                'selector' => 
                    '{{WRAPPER}} .aea-animated-banner.two .content-wrapp p.title',
            ]
        );


        $this->add_control(
            'title_color', [
                'label'     => __('Text Color', 'cww-companion'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .aea-animated-banner.two .content-wrapp p.title' => 'color: {{VALUE}}',
                ],
            ]
        );
       
        $this->end_controls_section();


         /**
         * Style Tab: Floating Content
         */
        $this->start_controls_section(
                'floating_subtitle', [
                    'label' => esc_html__('Floating Content - Subtitle', 'cww-companion'),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'subtitle_typography',
                'label' => esc_html__('Typography', 'cww-companion'),
                'selector' => 
                    '{{WRAPPER}} .aea-animated-banner.two .content-wrapp p.sub-title',
            ]
        );


        $this->add_control(
            'subtitle_color', [
                'label'     => __('Text Color', 'cww-companion'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .aea-animated-banner.two .content-wrapp p.sub-title' => 'color: {{VALUE}}',
                ],
            ]
        );
       
        $this->end_controls_section();

        
      

    }

    /**
     * Render widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * 
     */
    public function render() {

        $settings           = $this->get_settings();
		$post_heading 	    = $settings['post_heading'];
		$post_sub_heading 	= $settings['post_sub_heading'];
        
        $this->add_render_attribute('code-wrapp', 'class', 'code-wrapp aea-animated-banner two');
        
        
        ?>

        <div <?php echo $this->get_render_attribute_string('code-wrapp'); ?>>

            <div class="animated-banner-image">
                <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings ); ?>
                <?php if( $post_heading || $post_sub_heading ): ?>
                <div class="floating-stat-card">
                    <div class="content-wrapp">
                        <div class="icon-wrapp">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user" aria-hidden="true"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                        </div>
                        <div class="text-wrapp">
                            <p class="title"><?php echo esc_html($post_heading); ?></p>
                            <p class="sub-title"><?php echo esc_html($post_sub_heading); ?></p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <?php }

        /**
         * Render posts widget output in the editor.
         *
         * Written as a Backbone JavaScript template and used to generate the live preview.
         *
         * @access protected
         */
        protected function content_template() {
            
        }

    }
    Plugin::instance()->widgets_manager->register_widget_type( new Cww_Companion_Banner() );