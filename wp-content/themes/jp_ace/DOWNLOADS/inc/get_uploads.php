<?php
	define( 'PTPATH', $_SERVER['DOCUMENT_ROOT'] . '/' );
	require_once( PTPATH . 'wp-load.php' );
	require_once( PTPATH . 'wp-includes/post.php' );
	
	/* Getting Variables */
	
		global $current_user;
		$current_user 	= wp_get_current_user();
		$userID			= $current_user->ID;
		$userRole 		= ($current_user->roles[0]);
	
		$mySQL = 'SELECT * FROM jp_uploads ORDER BY id';
		
		// echo '<script>console.log("MySQL Command: '.$mySQL.'");</script>';
		
		$result = $wpdb->get_results( $mySQL, ARRAY_A);
		
		$data = Array();
	
			
		if ($result) {
	
			foreach ($result as $row) {
				
				$filename = basename( get_attached_file( $row['attachment_id'] ) );

				$filepath = wp_get_attachment_url( $row['attachment_id'] ); 
				
				$r = array();
	
					$r['id']			= $row['id'];
					$r['title']			= stripslashes($row['title']);
					$r['message_date']	= $row['message_date'];
					$r['description']	= stripslashes($row['description']);
					$r['filename']		= $filename;
				
				$data[] = $r;
			
			}
	
		}
		
		
		header('Content-Type: application/json');
		echo json_encode($data);

