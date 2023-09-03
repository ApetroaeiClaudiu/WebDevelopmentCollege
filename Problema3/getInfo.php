<?php
	include "config.php";
	$id = $_POST['id'];
	$sql = "SELECT * FROM clienti ";
	$result = mysqli_query($conn,$sql);
	$output = array();
	while( $row = mysqli_fetch_array($result) ){
		if( $row['Id'] == $id){
			$nume = $row['Nume'];
			$prenume = $row['Prenume'];
			$telefon = $row['Telefon'];
			$email = $row['Email'];
			$output[] = array("nume" => $nume, "prenume" => $prenume, "telefon" => $telefon, "email" => $email);
		}
	}
echo json_encode($output);