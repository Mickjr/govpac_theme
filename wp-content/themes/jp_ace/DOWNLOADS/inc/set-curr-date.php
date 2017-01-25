<?php
	
	// Set Current Date in Format 'mm-dd-yyyy'
	
	$endDate 	= date('m/d/Y');
	$days7 		= strtotime ( '-1 week', strtotime( $endDate ) ); 
	$strDate 	= date( 'm/d/Y', $days7 );
	
	
	$dataArr['aaData'][] = array(
		'start'		=> $strDate,
		'ending'	=> $endDate
	);
	
	
/*
	echo '<pre>';
	print_r( $dateRange );
	echo '</pre>'; 
*/

	header('Content-Type: application/json');
	echo json_encode( $dataArr );

	
?>