<?php
	define( 'PTPATH', $_SERVER['DOCUMENT_ROOT'] . '/' );
	require_once( PTPATH . 'wp-load.php' );

	$response_array['status'] = 'success';

	header('Content-type: application/json');
	echo json_encode($response_array);