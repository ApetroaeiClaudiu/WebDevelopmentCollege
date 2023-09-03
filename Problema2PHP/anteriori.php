<?php
	require_once "config.php";
	session_start();
	$numarProduse = $_SESSION['numar'];
	$primul = $_SESSION['primul'];
	if($primul - $numarProduse < 0){
		header("Location: afiseaza.php");
	}
	else{	
		$_SESSION['primul'] = $primul - $numarProduse;
		header("Location: afiseaza.php");	
	}
?>