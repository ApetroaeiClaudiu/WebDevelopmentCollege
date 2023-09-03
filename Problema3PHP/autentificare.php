<?php
	require_once "config.php";
	$email = $_POST["email"];
	$username = $_POST["username"];
	$password = $_POST["pass"];

	$con->set_charset("utf8");  	
	$sql = "SELECT * FROM profesor";
	$profesori = mysqli_query($con, $sql);
	$ok = 0;
	while($row = mysqli_fetch_assoc($profesori) ){
		$nume = $row['Username'];
		$pass = $row['Password'];
		if($nume === $username && $pass === $password){
			$ok = 1;
			session_start();
			$_SESSION['email'] = $email;
			$_SESSION['nume'] = $username;
			header("Location: profesor.php");
		}
	}
	if( $ok === 0){
		header("Location: index.php");
	}
?>
