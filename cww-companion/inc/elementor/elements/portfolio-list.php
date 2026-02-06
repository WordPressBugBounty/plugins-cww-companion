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
class Cww_Companion_Pfolio_list extends Widget_Base {

    /**
     * Retrieve  widget name.
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'portfolio-list';
    }

    /**
     * Retrieve  widget title.
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('Portfolio List', 'cww-companion');
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
        return 'eicon-post-list';
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
                'label' => esc_html__('Portfolio Settings', 'cww-companion'),
            ]
        );

       
         $this->add_control(
			'pfolio_count',
			[
				'label'       => esc_html__( 'No of Portfolios', 'cww-companion' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => '3'
			]
		);

		  $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name'              => 'image_size',
                'label'             => esc_html__( 'Image Size', 'cww-companion' ),
                'default'           => 'medium_large',
                
            ]
        );		

		$this->add_control(
			'pfolio_link_text',
			[
				'label'       => esc_html__( 'Button Text', 'cww-companion' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'View Case Study', 'cww-companion' ),
			]
		);

        $this->end_controls_section();


         /**
         * Style Tab
         */
        $this->start_controls_section(
                'floating_subtitle', [
                    'label' => esc_html__('Available In Premium Version', 'cww-companion'),
                    'tab' => Controls_Manager::TAB_STYLE,
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
		
        
        $this->add_render_attribute('code-wrapp', 'class', 'code-wrapp cww-portfolio-lists');
        
        
        ?>

        <div <?php echo $this->get_render_attribute_string('code-wrapp'); ?>>

            <div class="pfolio-inner">
                <?php 
                $portfolio_args = array(
                                    'post_type' 		=> 'portfolio',
                                    'order' 			=> 'DESC',
                                    'posts_per_page' 	=> $settings['pfolio_count'],
                                    'post_status' 		=> 'publish'
                                );
                $portfolio_query = new \WP_Query($portfolio_args);
                if($portfolio_query->have_posts()):
                    $counter =  1;
                    
                    while($portfolio_query->have_posts()): $portfolio_query->the_post();

                        $terms 		= wp_get_post_terms(get_the_ID(), 'portfolio_categories'); // Get all terms of a taxonomy
                        $tags       = get_the_terms(get_the_ID(), 'post_tag');
                        $image_id 	= get_post_thumbnail_id( get_the_ID() );
                        $thumb_url 	= Group_Control_Image_Size::get_attachment_image_src( $image_id, 'image_size', $settings );
                        $image_alt 	= get_post_meta( $image_id, '_wp_attachment_image_alt', true );

                        $this->add_render_attribute( 'img-alt', 'alt', esc_attr($image_alt) );

                        if( $counter > 9 ){
                            $final_counter = $counter;
                        }else{
                            $final_counter = '0' . $counter;
                        }

                        $class = '';
                        if( $counter % 2 == 0 ){
                            $class = 'reverse-card';
                        } 

                        ?>
                        <div class="inner-wrapp inner-wrap-pfolio <?php echo esc_attr($class)?>" style="z-index: <?php echo esc_attr($counter)?>;">
                            <?php if( has_post_thumbnail() ){ ?>
                                    <div class="img-wrapp cww-img-hover">				
                                        <a href="<?php the_permalink()?>">
                                            <img src="<?php echo esc_url($thumb_url);?>" <?php echo $this->get_render_attribute_string('img-alt'); ?>>
                                        </a>
                                    </div>
                                <?php } ?>

                                <div class="content-wrappp">
                                    <span class="pfolio-counting"><?php echo esc_html($final_counter); ?></span>
                                    <div class="inner-content">
                                        <div class="pfolio-cat-wrapp">
                                            <div class="counter"><?php echo esc_html($final_counter); ?></div>
                                            <span class="sep"></span>
                                            <div class="pfolio-cat">
                                                <?php if ( $terms && !is_wp_error( $terms ) ) : 
                                                        $term = $terms[0];
                                                        while ($term->parent != 0) {
                                                            $term = get_term($term->parent, 'portfolio_categories');
                                                        }
                                                        echo esc_html($term->name);
                                                endif; ?>
                                            </div>
                                        </div>
                                        <h4 class="pfolio-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h4>
                                        <p><?php echo code_elements_custom_excerpt(140); ?></p>
                                            
                                        <?php if (!empty($tags) && !is_wp_error($tags)) {
                                            echo '<ul>';
                                            foreach ($tags as $tag) {
                                                echo '<li>';
                                                echo '<a href="' . esc_url(get_term_link($tag)) . '">'
                                                    . esc_html($tag->name) .
                                                '</a> ';
                                                echo '</li>';
                                            }
                                            echo '</ul>';
                                        } ?>

                                        <div class="pfolio-btn">
                                            <a href="<?php the_permalink(); ?>" class="pfolio-link">
                                                <?php echo esc_html( $settings['pfolio_link_text'] ); ?>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-up-right w-5 h-5 transform group-hover/link:translate-x-1 group-hover/link:-translate-y-1 transition-transform duration-300" aria-hidden="true"><path d="M7 7h10v10"></path><path d="M7 17 17 7"></path></svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    <?php
                    $counter++;
                    endwhile;
                    wp_reset_postdata();
                endif; ?>
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
    Plugin::instance()->widgets_manager->register_widget_type( new Cww_Companion_Pfolio_list() );