<?php
if ( !defined( 'ABSPATH' ) )
	exit;
/*
function service_hero_img($form_fields, $post){
	$check = get_post_meta( $post->ID, 'service_img', true );
	if ( $check == 'true'){ $active = 'checked';}
	else { $active = '';}
	$form_fields['service_img'] = array(
		'label' => 'Set as services hero image',
		'input' => 'html',
		'html'  => '<input type="checkbox" id="hero_img" name="hero_img" '.$active.'/>',
		'value' =>  'false',
		);
	return $form_fields;
}
add_filter( 'attachment_fields_to_edit', 'service_hero_img', 10, 2 );
*/
