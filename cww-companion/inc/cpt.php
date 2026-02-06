<?php
/**
* Custom post types for the theme
*
*/
add_action('init','cww_companion_ea_portfolio_init');
add_action('init','cww_companion_ea_portfolio_taxonomies');
add_action('add_meta_boxes','cww_companion_ea_add_metabox');
add_action('save_post', 'cww_companion_ea_pfolio_settings_save');

function cww_companion_ea_portfolio_init() {
	$labels = array(
		'name'               => _x( 'Portfolio', 'post type general name', 'cww-companion' ),
		'singular_name'      => _x( 'Portfolio', 'post type singular name', 'cww-companion' ),
		'menu_name'          => _x( 'Portfolio', 'admin menu', 'cww-companion' ),
		'name_admin_bar'     => _x( 'Portfolio', 'add new on admin bar', 'cww-companion' ),
		'add_new'            => _x( 'Add New', 'portfolio', 'cww-companion' ),
		'add_new_item'       => esc_html__( 'Add New Portfolio', 'cww-companion' ),
		'new_item'           => esc_html__( 'New Portfolio', 'cww-companion' ),
		'edit_item'          => esc_html__( 'Edit Portfolio', 'cww-companion' ),
		'view_item'          => esc_html__( 'View Portfolio', 'cww-companion' ),
		'all_items'          => esc_html__( 'All Portfolio', 'cww-companion' ),
		'search_items'       => esc_html__( 'Search Portfolio', 'cww-companion' ),
		'parent_item_colon'  => esc_html__( 'Parent Portfolio:', 'cww-companion' ),
		'not_found'          => esc_html__( 'No portfolio found.', 'cww-companion' ),
		'not_found_in_trash' => esc_html__( 'No portfolio found in Trash.', 'cww-companion' )
	);
	$args = array(
		'labels'             => $labels,
        'description'        => esc_html__( 'Description.', 'cww-companion' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
        'show_in_rest'       => true, // IMPORTANT for Gutenberg
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'portfolio' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 4,
		'menu_icon'          => 'dashicons-grid-view',
		'taxonomies'         => array( 'portfolio_categories', 'post_tag' ),
		'supports'           => array( 'title', 'editor', 'thumbnail','excerpt','custom-fields' )
	);

	register_post_type( 'portfolio', $args );
}

/*
* Register taxonomy category for portfolio
*/

function cww_companion_ea_portfolio_taxonomies() {
    $labels = array(
        'name'              => _x( 'Categories', 'taxonomy general name','cww-companion' ),
        'singular_name'     => _x( 'Category', 'taxonomy singular name','cww-companion' ),
        'search_items'      => esc_html__( 'Search Categories','cww-companion' ),
        'all_items'         => esc_html__( 'All Categories','cww-companion' ),
        'parent_item'       => esc_html__( 'Parent Category','cww-companion' ),
        'parent_item_colon' => esc_html__( 'Parent Category:','cww-companion' ),
        'edit_item'         => esc_html__( 'Edit Category','cww-companion' ),
        'update_item'       => esc_html__( 'Update Category','cww-companion' ),
        'add_new_item'      => esc_html__( 'Add New Category','cww-companion' ),
        'new_item_name'     => esc_html__( 'New Category Name','cww-companion' ),
        'menu_name'         => esc_html__( 'Categories','cww-companion' ),
    );
    $args = array(
        'hierarchical'      => true, // Set this to 'false' for non-hierarchical taxonomy (like tags)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'portfolio-category' ),
    );
    register_taxonomy( 'portfolio_categories', array( 'portfolio' ), $args );
}


function cww_companion_ea_add_metabox()
{
    
	add_meta_box(
           'cww_pp_ea_pfoio_meta_settings',
           esc_html__( 'Additional Settings', 'cww-companion' ),
           'cww_pp_ea_pfolio_settings_callback',
           'portfolio',
           'normal',
           'high'
         );
    
}



/*-------------------------------------------Portfolio Settings ---------------------------------------------------*/
function cww_pp_ea_pfolio_settings_callback(){
    global $post;
    wp_nonce_field( basename( __FILE__ ), 'cww_pp_ea_pfoio_meta_settings' );
    ?>
    <table>
        <tr>
            <td style="padding-right:30px"><?php esc_html_e('Client Name','cww-companion'); ?></td>
            <td><input style="width:400px;" name="portfolio_client_name" type="text"  value="<?php echo esc_attr(get_post_meta( $post->ID, 'portfolio_client_name', true ));?>" /></td>
        </tr>
        <tr>
            <td style="padding-right:30px"><?php esc_html_e('Tasks','cww-companion'); ?></td>
            <td><input style="width:400px;" name="portfolip_skills" type="text"  value="<?php echo esc_attr(get_post_meta( $post->ID, 'portfolip_skills', true ));?>" /></td>
        </tr>

        <tr>
            <td style="padding-right:30px"><?php esc_html_e('Client Website','cww-companion'); ?></td>
            <td><input style="width:400px;" name="portfolio_company_website" type="text"  value="<?php echo esc_url(get_post_meta( $post->ID, 'portfolio_company_website', true ));?>" /></td>
        </tr>

         <tr>
            <td style="padding-right:30px"><?php esc_html_e('Date','cww-companion'); ?></td>
            <td><input style="width:400px;" name="portfolio_date" type="date"  value="<?php echo esc_attr(get_post_meta( $post->ID, 'portfolio_date', true ));?>" /></td>
        </tr>
        
    </table>
    <?php
}

function cww_companion_ea_pfolio_settings_save($post_id){
    global $post;

    // Verify the nonce before proceeding.
    if ( !isset( $_POST[ 'cww_pp_ea_pfoio_meta_settings' ] ) || !wp_verify_nonce( $_POST[ 'cww_pp_ea_pfoio_meta_settings' ], basename( __FILE__ ) ) )
        return;

    // Stop WP from clearing custom fields on autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)
        return;

    $old_portfolio_client_name = get_post_meta( $post_id, 'portfolio_client_name', true);
    $new_portfolio_client_name = sanitize_text_field($_POST['portfolio_client_name']);

    $old_portfolip_skills = get_post_meta( $post_id, 'portfolip_skills', true);
    $new_portfolip_skills = sanitize_text_field($_POST['portfolip_skills']);

    $old_portfolio_company_website = get_post_meta( $post_id, 'portfolio_company_website', true);
    $new_portfolio_company_website = esc_url_raw($_POST['portfolio_company_website']);

    $old_portfolio_date = get_post_meta( $post_id, 'portfolio_date', true);
    $new_portfolio_date = esc_attr($_POST['portfolio_date']);

    
      if ($new_portfolio_client_name && $new_portfolio_client_name != $old_portfolio_client_name) {
                update_post_meta($post_id, 'portfolio_client_name', $new_portfolio_client_name);
        }

    if ($new_portfolip_skills && $new_portfolip_skills != $old_portfolip_skills) {
            update_post_meta($post_id, 'portfolip_skills', $new_portfolip_skills);
    }
   
    if ($new_portfolio_company_website && $new_portfolio_company_website != $old_portfolio_company_website) {
            update_post_meta($post_id, 'portfolio_company_website', $new_portfolio_company_website);
    }

    if ($new_portfolio_date && $new_portfolio_date != $old_portfolio_date) {
            update_post_meta($post_id, 'portfolio_date', $new_portfolio_date);
    }
    
}