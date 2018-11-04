<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/*
function custom_fields_init()
{
return 	$term_metas=array('motivar_functions_prior'=>array('Select Priority', ' type="number" aria-required="true"',''));
}

add_action( 'portfolio_category_add_form_fields', 'add_custom_field', 10, 2 );
add_action( 'portfolio_category_edit_form_fields', 'edit_custom_field', 10, 2 );

function edit_custom_field( $term, $taxonomy ){
$msg='';
	$term_metas=custom_fields_init();
	foreach ($term_metas as $k=>$v)
		{
		$val = get_term_meta( $term->term_id, $k, true ) ?: '';
		$msg.='<tr class="form-field term-group-wrap form-required"><th scope="row"><label for="'.$k.'">'.$v[0].'</label></th><td>';
		if (!is_array($v[1]))
			{
				$chk='';
				if (strpos($v[2], 'chkbx')!=='false')
				{
					if ($val==1)
					{
						$chk=' checked';
					}
				}
			$msg.='<input '.$v[1].' class="postform '.$v[2].'" value="'.$val.'" name="'.$k.'"'.$chk.'/>';
			}
		else
			{
			$msg.='<select aria-required="true" class="postform '.$v[2].'" id="'.$k.'" name="'.$k.'">';
			foreach ($v[1] as $key=>$value)
				{
				$slc='';
				if ($key==$val)
					{
					$slc='selected';
					}
				$msg.='<option value="'.$key.'" '.$slc.'>'.$value.'</option>';
				}
			$msg.='</select>';
			}
        $msg.='</td></tr>';
		}
	echo $msg;
}


function add_custom_field($taxonomy) {
	$msg='';
	$term_metas=custom_fields_init();
	foreach ($term_metas as $k=>$v)
		{
		$msg.='<div class="form-field term-group form-required"><label for="'.$k.'">'.$v[0].'</label>';
		if (!is_array($v[1]))
			{
			$msg.='<input '.$v[1]. ' class="postform '.$v[2].'" name="'.$k.'" />';
			}
		else
			{
			$msg.='<select id="'.$k.'" name="'.$k.'" aria-required="true" class="postform '.$v[2].'">';
			foreach ($v[1] as $key=>$value)
				{
				$msg.='<option value="'.$key.'" class="'.$v[2].'">'.$value.'</option>';
				}
			$msg.='</select>';
			}
        $msg.='</div>';
		}
	echo $msg;
	}


/*add my columns style*/
/*add_filter("manage_edit-portfolio_category_columns", 'pc_custom_columns');

function pc_custom_columns($theme_columns) {
	$theme_columns['motivar_functions_prior']=__('Priority');
	return $theme_columns;
}

//make it sortable
add_filter( 'manage_edit-portfolio_category_sortable_columns', 'pc_custom_columns_sortable' );

function pc_custom_columns_sortable( $sortable ){
    $sortable[ 'motivar_functions_prior' ] = 'motivar_functions_prior';
    return $sortable;
}


//add data to column
add_filter('manage_portfolio_category_custom_column', 'pc_custom_columns_content', 10, 3 );

function pc_custom_columns_content( $content, $column_name, $term_id ){

    if( $column_name == 'motivar_functions_prior')
    	{	$term_id = absint( $term_id );
			$motivar_functions_prior = get_term_meta( $term_id, 'motivar_functions_prior', true );

			if( !empty( $motivar_functions_prior ) ){
			$content .= esc_attr( $motivar_functions_prior );
			}
    	}
    	return $content;
}


function sort_term_meta_columns($pieces, $taxonomies, $args) {
  global $pagenow,$wpdb;
  if(!is_admin()) {
    return $pieces;
  }
  if(is_admin() && $pagenow == 'edit-tags.php' && isset($_GET['taxonomy']) && $_GET['taxonomy']=='portfolio_category') {
    if(isset($_REQUEST['orderby']) && trim(wp_unslash($_REQUEST['orderby'])) == 'motivar_functions_prior') {
    	    $order   = isset($_REQUEST['order'])   ? trim(wp_unslash($_REQUEST['order']))   : 'DESC';
      $pieces['join']   .= " LEFT OUTER JOIN $wpdb->termmeta AS opt ON (opt.term_id = t.term_id AND opt.meta_key='motivar_functions_prior')";
      $pieces['orderby'] = "ORDER BY opt.meta_value";
      $pieces['order']   = $order;
    }
  }
  return $pieces;
}
add_filter('terms_clauses', 'sort_term_meta_columns', 10, 3);*/