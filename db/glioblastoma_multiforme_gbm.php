<?php
  require 'connect.php';
	$dbConn = guestConnect();
	if( $result = mysqli_query($dbConn, "SELECT Censored, survival_time from clinical where histological_glioblastoma_multiforme_gbm = 1") ) {
		$jsonData = array();   //json   :    [  ,  ]
		while( $array = mysqli_fetch_row($result) ) {
			$obj = array();
			$obj[] = $array[0];
			$obj[] = $array[1];
			$jsonData[] = $obj;
		}
		mysqli_free_result($result);
		echo json_encode($jsonData);
	}
	mysqli_close($dbConn);
?>
