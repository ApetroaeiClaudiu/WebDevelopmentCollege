<?php
	include "config.php";

	$producator = $_POST['producator'];
	$procesor = $_POST['procesor'];
	$memorie = $_POST['memorie'];
	$capacitatehdd = $_POST['capacitatehdd'];
	$placavideo = $_POST['placavideo'];

	$sql = "SELECT * FROM notebooks ";
	$result = mysqli_query($conn,$sql);
	$output = array();

	while( $row = mysqli_fetch_array($result) ){
		//daca atributul e egal cu inputul sau daca nu exista input , il luam
		if( (($row['Producator'] == $producator) || ($producator==="default"))
		 && (($row['Procesor'] == $procesor) || ($procesor==="default"))
		  && (($row['Memorie'] == $memorie) || ($memorie==="default"))
		   && (($row['CapacitateHDD'] == $capacitatehdd) || ($capacitatehdd==="default"))
		    && (($row['PlacaVideo'] == $placavideo) || ($placavideo==="default")) ){

			$output1 = $row['Producator'];
			$output2 = $row['Procesor'];
			$output3 = $row['Memorie'];
			$output4 = $row['CapacitateHDD'];
			$output5 = $row['PlacaVideo'];
			$output[] = array(
				"producator"=>$output1, 
				"procesor"=>$output2, 
				"memorie"=>$output3, 
				"capacitate"=>$output4, 
				"placa"=>$output5
			);
		}
	}
echo json_encode($output);