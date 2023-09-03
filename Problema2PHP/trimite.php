<?php
	$numar = addslashes(htmlentities($_POST['numar'], ENT_COMPAT, "UTF-8"));
	$numarProduse = $numar[0];
	session_start();
	$_SESSION['numar'] = $numarProduse;
	$_SESSION['primul'] = 0;
	header("Location: afiseaza.php");
?>