<?php
	include "config.php";
	//numele statiei de plecare
	$input = $_POST['Nume'];
	$sql = "SELECT * FROM trenuri";
	//rezultatul select-ului
	$result = mysqli_query($conn,$sql);
	//unde vom stoca rezultatul (array-ul de orase de sosire)
	$output = array();
	while( $row = mysqli_fetch_array($result) ){
		if( $row['StatiePlecare'] == $input){
			$name = $row['StatieSosire'];
			$output[] = array("nume" => $name);
		}
	}
echo json_encode($output);