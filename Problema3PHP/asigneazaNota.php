<?php
	require_once "config.php";
	session_start();
	error_reporting(E_ERROR | E_PARSE);
	$con->set_charset("utf8");

	$sid = addslashes(htmlentities($_POST['student'], ENT_COMPAT, "UTF-8"));
	$student = $sid[0];
	$mid = addslashes(htmlentities($_POST['materie'], ENT_COMPAT, "UTF-8"));
	$materie = $mid[0];
	$nota = addslashes(htmlentities($_POST['nota'], ENT_COMPAT, "UTF-8"));
	$sql = "INSERT INTO notestudenti (Nota,Mid,Sid) VALUES ( {$nota}, {$materie}, {$student} );";
	if(mysqli_query($con, $sql)){
		header("Location: profesor.php");
	}
	else {
  		print mysqli_error($con);
	}
?>
