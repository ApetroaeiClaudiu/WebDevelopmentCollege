<?php
	require_once "config.php";
	session_start();
	$numarProduse = $_SESSION['numar'];
	$primul = $_SESSION['primul'];
	$con->set_charset("utf8");  	
	$sql = "SELECT COUNT(Id) AS maxim FROM notebooks";
	$result = mysqli_query($con, $sql);
	while($row = mysqli_fetch_assoc($result)){
		$maxim = $row['maxim'];
	}
	if($primul + $numarProduse + 1 > $maxim ){
		header("Location: afiseaza.php");
	}
	else{	
		$_SESSION['primul'] = $primul + $numarProduse;
		header("Location: afiseaza.php");
	}
?>