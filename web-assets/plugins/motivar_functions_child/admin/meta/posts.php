<?php
if (!defined('ABSPATH')) exit;
/*
<?php
if (!defined('ABSPATH')) exit;
add_action( 'add_meta_boxes', 'anywdhere_calendars_main' );
function anywdhere_calendars_main() {

$screens = array('sbp_room' );
    foreach ( $screens as $screen )
        {
          add_meta_box(
        'my_map', // $id
        'Map Activity', // $title
        'my_map_function1', // $callback
        $screen, // $page
        'normal', // $context
        'low'); // $priority
}
}

function my_map_function1($post)
{
$msg='<div id="mapdiv"';
$tracks=get_post_meta($post->ID,'tracks',true) ?: array();
if (!empty($tracks))
{
wp_deregister_script('googlemapsapi3');
wp_enqueue_script('googlemapsapi3', 'http://maps.google.com/maps/api/js?sensor=false', false, '3', false);
$msg.=' data-markers="'.htmlspecialchars(json_encode($tracks)).'"';
}
$msg.='></div>';
echo $msg;
}


add_filter('manage_edit-sbp_room_columns', 'my_extra_cake_columns1');
function my_extra_cake_columns1($columns) {
    $columns['act'] ='Latest Activity';
$columns['commits'] ='Commits';
    return $columns;
}


add_action( 'manage_sbp_room_posts_custom_column', 'my_cake_column_content', 10, 2 );
function my_cake_column_content( $column_name, $post_id ) {
 if ($column_name=='act')
    {
    $timee=get_post_meta($post_id,'activity',true) ?: '';
    if ($timee!='')
        {
            echo date('d-m-Y, H:i',$timee);
        }
    else
        {
            echo '';
        }

    }
else if ($column_name=='commits')
        {
            $map=get_post_meta($post_id,'tracks',true) ?:array() ;
            if (!empty($map))
            {
                $commits=get_post_meta($post_id,'commits',true) ?: 0;
                if ($commits==0)
                        {
                        update_post_meta($post_id,'commits',1);
                        }
                else
                        {
                        echo $commits;
                        }
            }
            else
                {
                    echo 0;
                }
        }
    else
        {
            return ;
        }
}

add_filter( 'manage_edit-sbp_room_sortable_columns', 'my_sortable_cake_column' );
function my_sortable_cake_column( $columns ) {
    $columns['act'] = 'act';
    $columns['commits'] = 'commits';

    //To make a column 'un-sortable' remove it from the array
    //unset($columns['date']);

    return $columns;
}


add_action( 'pre_get_posts', 'my_slice_orderby' );
function my_slice_orderby( $query ) {
    if( ! is_admin() )
        return;

    $orderby = $query->get( 'orderby');

    if( 'act' == $orderby ) {
        $query->set('meta_key','activity');
        $query->set('orderby','meta_value_num');
    }
if( 'commits' == $orderby ) {
        $query->set('meta_key','commits');
        $query->set('orderby','meta_value_num');
    }
}




*/




/*bulk import data for admin columns
SOSSOSSOS NEVER use '/' inside names
*/
$columns_array = array(
    array('post',
        /*columns to insert*/
        array(),
        /*columns to delete*/
        array('date','tags','comments'),
        )
    );
foreach ($columns_array as $post_array) {
    add_action( 'manage_edit-'.$post_array[0].'_columns', function ($columns) use ($post_array){
        /*global actions*/
        /*insert columns*/
        if (!empty($post_array[1])){
            foreach ($post_array[1] as $s) {
                $data = explode("/", $s);
                $columns[$data[0]] = $data[1];
            }
        }
        /*empty columns*/
        if (!empty($post_array[2])){
            foreach ($post_array[2] as $s) {
        unset($columns[$s]);
            }
        }
        return $columns;
});
}
/*make it sortable
SOSSOSSOS NEVER use '/' inside names
*/











