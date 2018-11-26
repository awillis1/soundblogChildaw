<?php
/*
Plugin Name: Concerts Custom Post
Plugin URI:  
Description: A Plugin For Creating Custom Concert Posts
Version:     20160911
Author:      Alyssa Willis
Author URI:  
Text Domain: 
Domain Path: 
License:     
 
{Plugin Name} is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
{Plugin Name} is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with {Plugin Name}. If not, see {License URI}.
*/

function my_custom_posttypes() {
$labels = array(
       'name'               => 'Concerts ',
       'singular_name'      => 'Concert',
       'menu_name'          => 'Concerts',
       'name_admin_bar'     => 'Concerts',
       'add_new'            => 'Add New',
       'add_new_item'       => 'Add New Concert',
       'new_item'           => 'New Concert',
       'edit_item'          => 'Edit Concert',
       'view_item'          => 'View Concert',
       'all_items'          => 'All Concerts',
       'search_items'       => 'Search Concerts',
       'parent_item_colon'  => 'Parent Concerts:',
       'not_found'          => 'No Concerts found.',
       'not_found_in_trash' => 'No Concerts found in Trash.',
   );

   $args = array(
       'labels'             => $labels,
       'public'             => true,
       'publicly_queryable' => true,
       'show_ui'            => true,
       'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-format-gallery',
       'query_var'          => true,
       'rewrite'            => array( 'slug' => 'concerts' ),
       'capability_type'    => 'post',
       'has_archive'        => true,
       'hierarchical'       => false,
       'menu_position'      => 5,
       'supports'           => array( 'title', 'editor', 'thumbnail' )
   );

   register_post_type( 'concerts', $args);

}
add_action ( 'init', 'my_custom_posttypes' );

function my_rewrite_flush() {
    // First, we "add" the custom post type via the above written function.
    // Note: "add" is written with quotes, as CPTs don't get added to the DB,
    // They are only referenced in the post_type column with a post entry, 
    // when you add a post of this CPT.
    my_custom_posttypes();

    // ATTENTION: This is *only* done during plugin activation hook in this example!
    // You should *NEVER EVER* do this on every page load!!
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'my_rewrite_flush' );
