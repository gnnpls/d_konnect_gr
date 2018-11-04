<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/*
add_action('create_term','custom_functions_update');
add_action('edit_term', 'custom_functions_update');
add_action('delete_term', 'custom_functions_delete');

function custom_functions_update($term_id)
{

if (isset($_POST['taxonomy']))
	{
		if ($_POST['taxonomy'] == 'portfolio_category')
		{
			update_term_meta( $term_id, 'motivar_functions_prior',(int)$_POST['motivar_functions_prior']);
		}

	}
}
function custom_functions_delete($term_id)
{

}
*/




/*make meta in taxonomies*/


/*
$columns_array = array(
    array('sbp_review_ota',
        array(
                'grade/Grade',
                'max_grade/Max Grade',
                'priority/Priority'
        )
    ),
    array('sbp_map_point_category',
        array(

        )
    )
);

foreach ($columns_array as $post_array) {
    add_action( 'manage_edit-'.$post_array[0].'_columns', function ($columns) use ($post_array){

        if(!empty($post_array[1])){
        	foreach ($post_array[1] as $s) {
            	$data = explode("/", $s);
            	$columns[$data[0]] = $data[1];
        	}
        }
        unset($columns['slug']);
        unset($columns['description']);
        unset($columns['date']);
        return $columns;
});
}
*/
