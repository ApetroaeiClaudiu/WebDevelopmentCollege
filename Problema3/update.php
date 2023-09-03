<?php
	include "config.php";
	$id = $_POST['id'];
	$nume = $_POST['nume'];
	$prenume = $_POST['prenume'];
	$telefon = $_POST['telefon'];
	$email = $_POST['email'];
	$sql = "UPDATE clienti SET Nume='{$nume}', Prenume = '{$prenume}', Telefon = '{$telefon}', Email = '{$email}' WHERE Id = {$id}";
	$result = mysqli_query($conn,$sql);
	if(mysqli_query($conn, $sql)){
		echo "succes";
	}
	else {
  		echo "Error updating record: " . mysqli_error($conn);
	}