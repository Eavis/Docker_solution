<?php
  require 'connect.php';
	$dbConn = guestConnect();
  if( $result = mysqli_query($dbConn, "select Censored, survival_time from clinical where age_at_initial (select AVG(age_at_initial) from clinical)")) {
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
