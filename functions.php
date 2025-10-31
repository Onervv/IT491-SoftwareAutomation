<?php
/**
 * YWCC Capstone Theme Functions
 *
 * @package YWCC_Capstone
 */

// Include Bootstrap Navwalker
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

// Theme Setup
function ywcc_capstone_setup() {
    // add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');
    
    // Let WordPress manage the document title
    add_theme_support('title-tag');
    
    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'ywcc-capstone'),
        'footer' => __('Footer Menu', 'ywcc-capstone'),
    ));
    
    // Add support for core custom logo
    add_theme_support('custom-logo', array(
        'height'      => 50,
        'width'       => 200,
        'flex-width'  => true,
        'flex-height' => true,
    ));
}
add_action('after_setup_theme', 'ywcc_capstone_setup');

// Enqueue scripts and styles
function ywcc_capstone_scripts() {
    // Enqueue styles
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7');
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array(), '4.7.0');
    wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.css', array(), '1.0');
    wp_enqueue_style('flexslider', get_template_directory_uri() . '/css/flexslider.css', array(), '2.7.2');
    wp_enqueue_style('fancybox', get_template_directory_uri() . '/css/fancybox/jquery.fancybox.css', array(), '2.1.5');
    wp_enqueue_style('ywcc-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Enqueue scripts
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.7', true);
    wp_enqueue_script('jquery-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array('jquery'), '1.3', true);
    wp_enqueue_script('fancybox', get_template_directory_uri() . '/js/jquery.fancybox.pack.js', array('jquery'), '2.1.5', true);
    wp_enqueue_script('flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array('jquery'), '2.7.2', true);
    wp_enqueue_script('quicksand', get_template_directory_uri() . '/js/portfolio/jquery.quicksand.js', array('jquery'), '1.4', true);
    wp_enqueue_script('animate-js', get_template_directory_uri() . '/js/animate.js', array('jquery'), '1.0', true);
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'ywcc_capstone_scripts');

// Register Custom Post Types

// 1. Projects CPT
function register_projects_cpt() {
    $labels = array(
        'name'                  => _x('Projects', 'Post Type General Name', 'ywcc-capstone'),
        'singular_name'         => _x('Project', 'Post Type Singular Name', 'ywcc-capstone'),
        'menu_name'             => __('Projects', 'ywcc-capstone'),
        'name_admin_bar'        => __('Project', 'ywcc-capstone'),
        'archives'              => __('Project Archives', 'ywcc-capstone'),
        'attributes'            => __('Project Attributes', 'ywcc-capstone'),
        'parent_item_colon'     => __('Parent Project:', 'ywcc-capstone'),
        'all_items'             => __('All Projects', 'ywcc-capstone'),
        'add_new_item'          => __('Add New Project', 'ywcc-capstone'),
        'add_new'               => __('Add New', 'ywcc-capstone'),
        'new_item'              => __('New Project', 'ywcc-capstone'),
        'edit_item'             => __('Edit Project', 'ywcc-capstone'),
        'update_item'           => __('Update Project', 'ywcc-capstone'),
        'view_item'             => __('View Project', 'ywcc-capstone'),
        'view_items'            => __('View Projects', 'ywcc-capstone'),
        'search_items'          => __('Search Project', 'ywcc-capstone'),
        'not_found'             => __('Not found', 'ywcc-capstone'),
        'not_found_in_trash'    => __('Not found in Trash', 'ywcc-capstone'),
        'featured_image'        => __('Featured Image', 'ywcc-capstone'),
        'set_featured_image'    => __('Set featured image', 'ywcc-capstone'),
        'remove_featured_image' => __('Remove featured image', 'ywcc-capstone'),
        'use_featured_image'    => __('Use as featured image', 'ywcc-capstone'),
        'insert_into_item'      => __('Insert into project', 'ywcc-capstone'),
        'uploaded_to_this_item' => __('Uploaded to this project', 'ywcc-capstone'),
        'items_list'            => __('Projects list', 'ywcc-capstone'),
        'items_list_navigation' => __('Projects list navigation', 'ywcc-capstone'),
        'filter_items_list'     => __('Filter projects list', 'ywcc-capstone'),
    );
    
    $args = array(
        'label'                 => __('Project', 'ywcc-capstone'),
        'description'           => __('Capstone Projects', 'ywcc-capstone'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'taxonomies'            => array('project_category', 'project_technology'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-portfolio',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );
    
    register_post_type('project', $args);
}
add_action('init', 'register_projects_cpt', 0);

// Register Project Taxonomies
function register_project_taxonomies() {
    // Project Categories
    register_taxonomy('project_category', 'project', array(
        'labels' => array(
            'name'              => _x('Project Categories', 'taxonomy general name', 'ywcc-capstone'),
            'singular_name'     => _x('Project Category', 'taxonomy singular name', 'ywcc-capstone'),
            'search_items'      => __('Search Categories', 'ywcc-capstone'),
            'all_items'         => __('All Categories', 'ywcc-capstone'),
            'parent_item'       => __('Parent Category', 'ywcc-capstone'),
            'parent_item_colon' => __('Parent Category:', 'ywcc-capstone'),
            'edit_item'         => __('Edit Category', 'ywcc-capstone'),
            'update_item'       => __('Update Category', 'ywcc-capstone'),
            'add_new_item'      => __('Add New Category', 'ywcc-capstone'),
            'new_item_name'     => __('New Category Name', 'ywcc-capstone'),
            'menu_name'         => __('Categories', 'ywcc-capstone'),
        ),
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'project-category'),
        'show_in_rest' => true,
    ));
    
    // Project Technologies
    register_taxonomy('project_technology', 'project', array(
        'labels' => array(
            'name'              => _x('Technologies', 'taxonomy general name', 'ywcc-capstone'),
            'singular_name'     => _x('Technology', 'taxonomy singular name', 'ywcc-capstone'),
            'search_items'      => __('Search Technologies', 'ywcc-capstone'),
            'all_items'         => __('All Technologies', 'ywcc-capstone'),
            'edit_item'         => __('Edit Technology', 'ywcc-capstone'),
            'update_item'       => __('Update Technology', 'ywcc-capstone'),
            'add_new_item'      => __('Add New Technology', 'ywcc-capstone'),
            'new_item_name'     => __('New Technology Name', 'ywcc-capstone'),
            'menu_name'         => __('Technologies', 'ywcc-capstone'),
        ),
        'hierarchical' => false,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'technology'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'register_project_taxonomies');

// 2. Sponsors CPT
function register_sponsors_cpt() {
    $labels = array(
        'name'                  => _x('Sponsors', 'Post Type General Name', 'ywcc-capstone'),
        'singular_name'         => _x('Sponsor', 'Post Type Singular Name', 'ywcc-capstone'),
        'menu_name'             => __('Sponsors', 'ywcc-capstone'),
        'name_admin_bar'        => __('Sponsor', 'ywcc-capstone'),
        'archives'              => __('Sponsor Archives', 'ywcc-capstone'),
        'all_items'             => __('All Sponsors', 'ywcc-capstone'),
        'add_new_item'          => __('Add New Sponsor', 'ywcc-capstone'),
        'add_new'               => __('Add New', 'ywcc-capstone'),
        'new_item'              => __('New Sponsor', 'ywcc-capstone'),
        'edit_item'             => __('Edit Sponsor', 'ywcc-capstone'),
        'update_item'           => __('Update Sponsor', 'ywcc-capstone'),
        'view_item'             => __('View Sponsor', 'ywcc-capstone'),
        'search_items'          => __('Search Sponsor', 'ywcc-capstone'),
    );
    
    $args = array(
        'label'                 => __('Sponsor', 'ywcc-capstone'),
        'description'           => __('Industry Sponsors', 'ywcc-capstone'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-businessman',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );
    
    register_post_type('sponsor', $args);
}
add_action('init', 'register_sponsors_cpt', 0);

// Register Sponsor Level Taxonomy
function register_sponsor_level_taxonomy() {
    register_taxonomy('sponsor_level', 'sponsor', array(
        'labels' => array(
            'name'              => _x('Sponsor Levels', 'taxonomy general name', 'ywcc-capstone'),
            'singular_name'     => _x('Sponsor Level', 'taxonomy singular name', 'ywcc-capstone'),
            'search_items'      => __('Search Sponsor Levels', 'ywcc-capstone'),
            'all_items'         => __('All Sponsor Levels', 'ywcc-capstone'),
            'edit_item'         => __('Edit Sponsor Level', 'ywcc-capstone'),
            'update_item'       => __('Update Sponsor Level', 'ywcc-capstone'),
            'add_new_item'      => __('Add New Sponsor Level', 'ywcc-capstone'),
            'new_item_name'     => __('New Sponsor Level Name', 'ywcc-capstone'),
            'menu_name'         => __('Sponsor Levels', 'ywcc-capstone'),
        ),
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'sponsor-level'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'register_sponsor_level_taxonomy');

// 3. Events CPT
function register_events_cpt() {
    $labels = array(
        'name'                  => _x('Events', 'Post Type General Name', 'ywcc-capstone'),
        'singular_name'         => _x('Event', 'Post Type Singular Name', 'ywcc-capstone'),
        'menu_name'             => __('Events', 'ywcc-capstone'),

        'name_admin_bar'        => __('Event', 'ywcc-capstone'),
        'archives'              => __('Event Archives', 'ywcc-capstone'),
        'all_items'             => __('All Events', 'ywcc-capstone'),
        'add_new_item'          => __('Add New Event', 'ywcc-capstone'),
        'add_new'               => __('Add New', 'ywcc-capstone'),
        'new_item'              => __('New Event', 'ywcc-capstone'),
        'edit_item'             => __('Edit Event', 'ywcc-capstone'),
        'update_item'           => __('Update Event', 'ywcc-capstone'),
        'view_item'             => __('View Event', 'ywcc-capstone'),
        'search_items'          => __('Search Event', 'ywcc-capstone'),
    );
    
    $args = array(
        'label'                 => __('Event', 'ywcc-capstone'),
        'description'           => __('Capstone Events', 'ywcc-capstone'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 7,
        'menu_icon'             => 'dashicons-calendar-alt',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );
    
    register_post_type('event', $args);
}
add_action('init', 'register_events_cpt', 0);

// 4. Testimonials CPT
function register_testimonials_cpt() {
    $labels = array(
        'name'                  => _x('Testimonials', 'Post Type General Name', 'ywcc-capstone'),
        'singular_name'         => _x('Testimonial', 'Post Type Singular Name', 'ywcc-capstone'),
        'menu_name'             => __('Testimonials', 'ywcc-capstone'),
        'name_admin_bar'        => __('Testimonial', 'ywcc-capstone'),
        'archives'              => __('Testimonial Archives', 'ywcc-capstone'),
        'all_items'             => __('All Testimonials', 'ywcc-capstone'),
        'add_new_item'          => __('Add New Testimonial', 'ywcc-capstone'),
        'add_new'               => __('Add New', 'ywcc-capstone'),
        'new_item'              => __('New Testimonial', 'ywcc-capstone'),
        'edit_item'             => __('Edit Testimonial', 'ywcc-capstone'),
        'update_item'           => __('Update Testimonial', 'ywcc-capstone'),
        'view_item'             => __('View Testimonial', 'ywcc-capstone'),
        'search_items'          => __('Search Testimonial', 'ywcc-capstone'),
    );
    
    $args = array(
        'label'                 => __('Testimonial', 'ywcc-capstone'),
        'description'           => __('Sponsor and Student Testimonials', 'ywcc-capstone'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 8,
        'menu_icon'             => 'dashicons-testimonial',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );
    
    register_post_type('testimonial', $args);
}
add_action('init', 'register_testimonials_cpt', 0);

// Register Testimonial Type Taxonomy
function register_testimonial_type_taxonomy() {
    register_taxonomy('testimonial_type', 'testimonial', array(
        'labels' => array(
            'name'              => _x('Testimonial Types', 'taxonomy general name', 'ywcc-capstone'),
            'singular_name'     => _x('Testimonial Type', 'taxonomy singular name', 'ywcc-capstone'),
            'search_items'      => __('Search Types', 'ywcc-capstone'),
            'all_items'         => __('All Types', 'ywcc-capstone'),

            'edit_item'         => __('Edit Type', 'ywcc-capstone'),
            'update_item'       => __('Update Type', 'ywcc-capstone'),
            'add_new_item'      => __('Add New Type', 'ywcc-capstone'),
            'new_item_name'     => __('New Type Name', 'ywcc-capstone'),
            'menu_name'         => __('Types', 'ywcc-capstone'),
        ),
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'testimonial-type'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'register_testimonial_type_taxonomy');

// Add custom meta boxes for additional fields
function ywcc_add_custom_meta_boxes() {
    // Project Meta Box
    add_meta_box(
        'project_details',
        'Project Details',
        'ywcc_project_details_callback',
        'project',
        'normal',
        'high'
    );
    
    // Event Meta Box
    add_meta_box(
        'event_details',
        'Event Details',
        'ywcc_event_details_callback',
        'event',
        'normal',
        'high'
    );
    
    // Sponsor Meta Box
    add_meta_box(
        'sponsor_details',
        'Sponsor Details',
        'ywcc_sponsor_details_callback',
        'sponsor',
        'normal',
        'high'
    );
    
    // Testimonial Meta Box
    add_meta_box(
        'testimonial_details',
        'Testimonial Details',
        'ywcc_testimonial_details_callback',
        'testimonial',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'ywcc_add_custom_meta_boxes');

// Project Details Meta Box Callback
function ywcc_project_details_callback($post) {
    wp_nonce_field('ywcc_save_project_details', 'ywcc_project_details_nonce');
    
    $sponsor = get_post_meta($post->ID, '_project_sponsor', true);
    $team_members = get_post_meta($post->ID, '_project_team_members', true);
    $mentor = get_post_meta($post->ID, '_project_mentor', true);
    $outcome = get_post_meta($post->ID, '_project_outcome', true);
    $impact = get_post_meta($post->ID, '_project_impact', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="project_sponsor">Sponsor</label></th>
            <td>
                <select name="project_sponsor" id="project_sponsor">
                    <option value="">Select Sponsor</option>
                    <?php
                    $sponsors = get_posts(array('post_type' => 'sponsor', 'posts_per_page' => -1));
                    foreach ($sponsors as $s) {
                        echo '<option value="' . $s->ID . '" ' . selected($sponsor, $s->ID, false) . '>' . $s->post_title . '</option>';
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <th><label for="project_team_members">Team Members</label></th>
            <td><textarea name="project_team_members" id="project_team_members" rows="3" cols="50"><?php echo esc_textarea($team_members); ?></textarea></td>
        </tr>
        <tr>
            <th><label for="project_mentor">Mentor</label></th>
            <td><input type="text" name="project_mentor" id="project_mentor" value="<?php echo esc_attr($mentor); ?>" size="50" /></td>
        </tr>
        <tr>
            <th><label for="project_outcome">Outcome</label></th>
            <td><textarea name="project_outcome" id="project_outcome" rows="3" cols="50"><?php echo esc_textarea($outcome); ?></textarea></td>
        </tr>
        <tr>
            <th><label for="project_impact">Impact</label></th>
            <td><textarea name="project_impact" id="project_impact" rows="3" cols="50"><?php echo esc_textarea($impact); ?></textarea></td>
        </tr>
    </table>
    <?php
}

// Event Details Meta Box Callback
function ywcc_event_details_callback($post) {
    wp_nonce_field('ywcc_save_event_details', 'ywcc_event_details_nonce');
    
    $event_date = get_post_meta($post->ID, '_event_date', true);
    $event_time = get_post_meta($post->ID, '_event_time', true);
    $event_location = get_post_meta($post->ID, '_event_location', true);
    $registration_link = get_post_meta($post->ID, '_event_registration_link', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="event_date">Event Date</label></th>
            <td><input type="date" name="event_date" id="event_date" value="<?php echo esc_attr($event_date); ?>" /></td>
        </tr>
        <tr>
            <th><label for="event_time">Event Time</label></th>
            <td><input type="time" name="event_time" id="event_time" value="<?php echo esc_attr($event_time); ?>" /></td>
        </tr>
        <tr>
            <th><label for="event_location">Location</label></th>
            <td><input type="text" name="event_location" id="event_location" value="<?php echo esc_attr($event_location); ?>" size="50" /></td>
        </tr>
        <tr>
            <th><label for="event_registration_link">Registration Link</label></th>
            <td><input type="url" name="event_registration_link" id="event_registration_link" value="<?php echo esc_url($registration_link); ?>" size="50" /></td>
        </tr>
    </table>
    <?php
}

// Sponsor Details Meta Box Callback
function ywcc_sponsor_details_callback($post) {
    wp_nonce_field('ywcc_save_sponsor_details', 'ywcc_sponsor_details_nonce');
    
    $website = get_post_meta($post->ID, '_sponsor_website', true);
    $contact_name = get_post_meta($post->ID, '_sponsor_contact_name', true);
    $contact_email = get_post_meta($post->ID, '_sponsor_contact_email', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="sponsor_website">Website</label></th>
            <td><input type="url" name="sponsor_website" id="sponsor_website" value="<?php echo esc_url($website); ?>" size="50" /></td>
        </tr>
        <tr>
            <th><label for="sponsor_contact_name">Contact Name</label></th>
            <td><input type="text" name="sponsor_contact_name" id="sponsor_contact_name" value="<?php echo esc_attr($contact_name); ?>" size="50" /></td>
        </tr>
        <tr>
            <th><label for="sponsor_contact_email">Contact Email</label></th>
            <td><input type="email" name="sponsor_contact_email" id="sponsor_contact_email" value="<?php echo esc_attr($contact_email); ?>" size="50" /></td>
        </tr>
    </table>
    <?php
}

// Testimonial Details Meta Box Callback
function ywcc_testimonial_details_callback($post) {
    wp_nonce_field('ywcc_save_testimonial_details', 'ywcc_testimonial_details_nonce');
    
    $author_name = get_post_meta($post->ID, '_testimonial_author_name', true);
    $author_position = get_post_meta($post->ID, '_testimonial_author_position', true);
    $author_company = get_post_meta($post->ID, '_testimonial_author_company', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="testimonial_author_name">Author Name</label></th>
            <td><input type="text" name="testimonial_author_name" id="testimonial_author_name" value="<?php echo esc_attr($author_name); ?>" size="50" /></td>
        </tr>
        <tr>
            <th><label for="testimonial_author_position">Position</label></th>
            <td><input type="text" name="testimonial_author_position" id="testimonial_author_position" value="<?php echo esc_attr($author_position); ?>" size="50" /></td>
        </tr>
        <tr>
            <th><label for="testimonial_author_company">Company/Organization</label></th>
            <td><input type="text" name="testimonial_author_company" id="testimonial_author_company" value="<?php echo esc_attr($author_company); ?>" size="50" /></td>
        </tr>
    </table>
    <?php
}

// Save Meta Box Data
function ywcc_save_meta_box_data($post_id) {
    // Save Project Details
    if (isset($_POST['ywcc_project_details_nonce']) && wp_verify_nonce($_POST['ywcc_project_details_nonce'], 'ywcc_save_project_details')) {
        if (isset($_POST['project_sponsor'])) {
            update_post_meta($post_id, '_project_sponsor', sanitize_text_field($_POST['project_sponsor']));
        }
        if (isset($_POST['project_team_members'])) {
            update_post_meta($post_id, '_project_team_members', sanitize_textarea_field($_POST['project_team_members']));
        }
        if (isset($_POST['project_mentor'])) {
            update_post_meta($post_id, '_project_mentor', sanitize_text_field($_POST['project_mentor']));
        }
        if (isset($_POST['project_outcome'])) {
            update_post_meta($post_id, '_project_outcome', sanitize_textarea_field($_POST['project_outcome']));
        }
        if (isset($_POST['project_impact'])) {
            update_post_meta($post_id, '_project_impact', sanitize_textarea_field($_POST['project_impact']));
        }
    }
    
    // Save Event Details
    if (isset($_POST['ywcc_event_details_nonce']) && wp_verify_nonce($_POST['ywcc_event_details_nonce'], 'ywcc_save_event_details')) {
        if (isset($_POST['event_date'])) {
            update_post_meta($post_id, '_event_date', sanitize_text_field($_POST['event_date']));
        }
        if (isset($_POST['event_time'])) {
            update_post_meta($post_id, '_event_time', sanitize_text_field($_POST['event_time']));
        }
        if (isset($_POST['event_location'])) {
            update_post_meta($post_id, '_event_location', sanitize_text_field($_POST['event_location']));
        }
        if (isset($_POST['event_registration_link'])) {
            update_post_meta($post_id, '_event_registration_link', esc_url_raw($_POST['event_registration_link']));
        }
    }
    
    // save Sponsor Details
    if (isset($_POST['ywcc_sponsor_details_nonce']) && wp_verify_nonce($_POST['ywcc_sponsor_details_nonce'], 'ywcc_save_sponsor_details')) {
        if (isset($_POST['sponsor_website'])) {
            update_post_meta($post_id, '_sponsor_website', esc_url_raw($_POST['sponsor_website']));
        }
        if (isset($_POST['sponsor_contact_name'])) {
            update_post_meta($post_id, '_sponsor_contact_name', sanitize_text_field($_POST['sponsor_contact_name']));
        }
        if (isset($_POST['sponsor_contact_email'])) {
            update_post_meta($post_id, '_sponsor_contact_email', sanitize_email($_POST['sponsor_contact_email']));
        }
    }
    
    // Save Testimonial Details
    if (isset($_POST['ywcc_testimonial_details_nonce']) && wp_verify_nonce($_POST['ywcc_testimonial_details_nonce'], 'ywcc_save_testimonial_details')) {
        if (isset($_POST['testimonial_author_name'])) {
            update_post_meta($post_id, '_testimonial_author_name', sanitize_text_field($_POST['testimonial_author_name']));
        }
        if (isset($_POST['testimonial_author_position'])) {
            update_post_meta($post_id, '_testimonial_author_position', sanitize_text_field($_POST['testimonial_author_position']));
        }
        if (isset($_POST['testimonial_author_company'])) {
            update_post_meta($post_id, '_testimonial_author_company', sanitize_text_field($_POST['testimonial_author_company']));
        }
    }
}
add_action('save_post', 'ywcc_save_meta_box_data');

// Widget Areas
function ywcc_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'ywcc-capstone'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here to appear in your sidebar.', 'ywcc-capstone'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="widgetheading">',
        'after_title'   => '</h5>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer 1', 'ywcc-capstone'),
        'id'            => 'footer-1',
        'description'   => __('Add widgets here to appear in your footer.', 'ywcc-capstone'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="widgetheading">',
        'after_title'   => '</h5>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer 2', 'ywcc-capstone'),
        'id'            => 'footer-2',
        'description'   => __('Add widgets here to appear in your footer.', 'ywcc-capstone'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="widgetheading">',
        'after_title'   => '</h5>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer 3', 'ywcc-capstone'),
        'id'            => 'footer-3',
        'description'   => __('Add widgets here to appear in your footer.', 'ywcc-capstone'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="widgetheading">',
        'after_title'   => '</h5>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer 4', 'ywcc-capstone'),
        'id'            => 'footer-4',
        'description'   => __('Add widgets here to appear in your footer.', 'ywcc-capstone'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="widgetheading">',
        'after_title'   => '</h5>',
    ));
}
add_action('widgets_init', 'ywcc_widgets_init');
