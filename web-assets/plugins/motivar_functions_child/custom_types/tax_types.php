<?php
if ( ! defined( 'ABSPATH' ) ) exit;
add_action( 'init', 'my_bsn_register_my_taxes' );
function my_bsn_register_my_taxes() {
$actions=array(array('Industries','Industry','mr_industry',array('mr_contacts')),array('Contact Types','Contact Type','mr_contact_type',array('mr_contacts')));

foreach ($actions as $i)
{
$labels=$args=array();
$labels = array( 'name' => $i[0], 'label' => $i[0], 'all_items' => 'All '.$i[0], 'edit_item' => 'Edit '.$i[1], 'update_item' => 'Update '.$i[1], 'add_new_item' => 'New '.$i[1], 'new_item_name' => 'New '.$i[1], 'parent_item' => $i[1].' Parent', 'parent_item_colon' => $i[1].'Parent:)', 'search_items' => 'Search '.$i[0], 'popular_items' => 'Popular '.$i[0], 'separate_items_with_commas' => 'Split '.$i[0].' with comma', 'add_or_remove_items' => 'Insert / Delete '.$i[1], 'choose_from_most_used' => 'Select '.$i[0]);
$args = array( 'labels' => $labels, 'hierarchical' => true, 'label' => $i[2], 'show_ui' => true, 'query_var' => true, 'rewrite' => array( 'slug' => $i[2] ), 'show_admin_column' => false);
register_taxonomy( $i[2], $i[3], $args );
}

}