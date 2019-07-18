<?php
   /*
   Plugin Name: Jobs
   Plugin URI: https://github.com/dylan-k/job-postings
   description: Add a post type for Jobs
   Version: 1.0
   Author: Dylan Kinnett
   Author URI: https://github.com/dylan-k/
   License: MIT License
   */


//-----------------------------------------------------------------------------
// POST TYPE
// ----------------------------------------------------------------------------


// Register Post Type for "Jobs" ----------------------------------------------
function jobs() {

   $labels = array(
      'name'                  => 'Jobs',
      'singular_name'         => 'Job',
      'menu_name'             => 'Jobs',
      'name_admin_bar'        => 'Jobs',
      'archives'              => 'Jobs Archives',
      'attributes'            => 'Job Attributes',
      'parent_item_colon'     => 'Parent Item:',
      'all_items'             => 'All Jobs',
      'add_new_item'          => 'Add New Item',
      'add_new'               => 'Add Job',
      'new_item'              => 'New Job',
      'edit_item'             => 'Edit Job',
      'update_item'           => 'Update Job',
      'view_item'             => 'View Job',
      'view_items'            => 'View Jobs',
      'search_items'          => 'Search Jobs',
      'not_found'             => 'Not found',
      'not_found_in_trash'    => 'Not found in Trash',
      'featured_image'        => 'Featured Image',
      'set_featured_image'    => 'Set featured image',
      'remove_featured_image' => 'Remove featured image',
      'use_featured_image'    => 'Use as featured image',
      'insert_into_item'      => 'Insert into Job',
      'uploaded_to_this_item' => 'Uploaded to this Job',
      'items_list'            => 'Job list',
      'items_list_navigation' => 'Job list navigation',
      'filter_items_list'     => 'Filter Job list',
   );
   $args = array(
      'label'                 => 'Job',
      'description'           => 'Job openings',
      'labels'                => $labels,
      'supports'              => array( 'title', 'editor', 'revisions', 'custom-fields', 'excerpt' ),
      'taxonomies'            => array( 'post_tag' ),
      'hierarchical'          => false,
      'public'                => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'menu_position'         => 5,
      'menu_icon'             => 'dashicons-universal-access',
      'show_in_admin_bar'     => true,
      'show_in_nav_menus'     => true,
      'can_export'            => true,
      'has_archive'           => true,
      'exclude_from_search'   => false,
      'publicly_queryable'    => true,
      'capability_type'       => 'page',
   );
   register_post_type( 'job', $args );

}
add_action( 'init', 'jobs', 0 );


//-----------------------------------------------------------------------------
// TAXONOMY
// ----------------------------------------------------------------------------

// Register Custom Taxonomy: "Job Type" ---------------------------------------
function job_type() {

   $labels = array(
      'name'                       => _x( 'Job Types', 'Taxonomy General Name', 'text_domain' ),
      'singular_name'              => _x( 'Job Type', 'Taxonomy Singular Name', 'text_domain' ),
      'menu_name'                  => __( 'Types', 'text_domain' ),
      'all_items'                  => __( 'All Items', 'text_domain' ),
      'parent_item'                => __( 'Parent Item', 'text_domain' ),
      'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
      'new_item_name'              => __( 'New Item Name', 'text_domain' ),
      'add_new_item'               => __( 'Add New Type', 'text_domain' ),
      'edit_item'                  => __( 'Edit Item', 'text_domain' ),
      'update_item'                => __( 'Update Item', 'text_domain' ),
      'view_item'                  => __( 'View Item', 'text_domain' ),
      'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
      'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
      'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
      'popular_items'              => __( 'Popular Items', 'text_domain' ),
      'search_items'               => __( 'Search Items', 'text_domain' ),
      'not_found'                  => __( 'Not Found', 'text_domain' ),
      'no_terms'                   => __( 'No items', 'text_domain' ),
      'items_list'                 => __( 'Items list', 'text_domain' ),
      'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
   );
   $args = array(
      'labels'                     => $labels,
      'hierarchical'               => true,
      'public'                     => true,
      'show_ui'                    => true,
      'show_admin_column'          => true,
      'show_in_nav_menus'          => true,
      'show_tagcloud'              => true,
   );
   register_taxonomy( 'jobtype', array( 'job' ), $args );

}
add_action( 'init', 'job_type', 0 );


// Register Custom Taxonomy: "Job Department" ---------------------------------
function job_dept() {

   $labels = array(
      'name'                       => _x( 'Departments', 'Taxonomy General Name', 'text_domain' ),
      'singular_name'              => _x( 'Department', 'Taxonomy Singular Name', 'text_domain' ),
      'menu_name'                  => __( 'Departments', 'text_domain' ),
      'all_items'                  => __( 'All Departments', 'text_domain' ),
      'parent_item'                => __( 'Parent Department', 'text_domain' ),
      'parent_item_colon'          => __( 'Parent Department:', 'text_domain' ),
      'new_item_name'              => __( 'New Department Name', 'text_domain' ),
      'add_new_item'               => __( 'Add New Department', 'text_domain' ),
      'edit_item'                  => __( 'Edit Department', 'text_domain' ),
      'update_item'                => __( 'Update Department', 'text_domain' ),
      'view_item'                  => __( 'View Department', 'text_domain' ),
      'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
      'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
      'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
      'popular_items'              => __( 'Popular Departments', 'text_domain' ),
      'search_items'               => __( 'Search Items', 'text_domain' ),
      'not_found'                  => __( 'Not Found', 'text_domain' ),
      'no_terms'                   => __( 'No items', 'text_domain' ),
      'items_list'                 => __( 'Items list', 'text_domain' ),
      'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
   );
   $args = array(
      'labels'                     => $labels,
      'hierarchical'               => true,
      'public'                     => true,
      'show_ui'                    => true,
      'show_admin_column'          => true,
      'show_in_nav_menus'          => true,
      'show_tagcloud'              => true,
   );
   register_taxonomy( 'jobdept', array( 'job' ), $args );

}
add_action( 'init', 'job_dept', 0 );




// Custom Field: jobs_manager -------------------------------------------------

// input custom meta
function jobs_manager(){
  global $post;
  $custom = get_post_custom($post->ID);
  $jobs_manager = $custom["jobs_manager"][0];
  ?>
  <label>Manager's Email:</label>
  <input type="email" required name="jobs_manager" value="<?php echo $jobs_manager; ?>" />
  <?php
}
function jobs_manager_init(){
  add_meta_box("jobs_manager", "Job Manager", "jobs_manager", "job", "side", "low");
}
add_action("admin_init", "jobs_manager_init");

// save custom meta
function save_job_meta(){
  global $post;
  update_post_meta($post->ID, "jobs_manager", $_POST["jobs_manager"]);
  // copy line above to add any additional metafields
}
add_action('save_post', 'save_job_meta');


?>
