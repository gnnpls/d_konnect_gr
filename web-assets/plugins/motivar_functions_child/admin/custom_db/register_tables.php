<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/*
jal_install();
function jal_install() {
global $wpdb;
if (!get_option('hd_no_results_version'))
	{
	$table_name = $wpdb->prefix . 'hd_no_results';
	$charset_collate = $wpdb->get_charset_collate();
	$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		date_hd date DEFAULT '0000-00-00' NOT NULL,
		time_hd time DEFAULT '00:00' NOT NULL,
		search_phrase text NOT NULL,
		page varchar(1) DEFAULT '' NOT NULL,
		possible_results text DEFAULT '' NOT NULL,
		page_next varchar(55) DEFAULT '' NOT NULL,
		UNIQUE KEY id (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
	add_option('hd_no_results_version', 1.0 );
	}
}
*/
