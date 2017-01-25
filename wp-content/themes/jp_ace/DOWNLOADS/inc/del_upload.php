<?php
	define( 'PTPATH', $_SERVER['DOCUMENT_ROOT'] . '/' );
	require_once( PTPATH . 'wp-load.php' );
	
	if (isset($_GET['fid'])) {

		$id = $_GET['fid'];
		
		$mySQL = "SELECT * FROM jp_uploads WHERE id = " .$id;
	
		$result = $wpdb->get_results( $mySQL, ARRAY_A);
			
		if ($result)
		{
			// Record was found, could be deleted
			
			$wpdb->delete('jp_uploads', array('id' => $id), array('%d'));
			
			echo true;
	
		}
		
		// If the record was not found just return true to commit the remove row
	
		echo false;
	
	} else {
		
		echo false;
	}