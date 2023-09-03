<?php
	require_once "config.php";
	$email = $_POST["email"];
	$password = $_POST["pass"];
	$password2 = $_POST["pass2"];

	$con->set_charset("utf8"); 

	if($password != $password2){
		header("Location: index.php");
	} 
	$sql = "SELECT * FROM utilizatori";

	$utilizatori = mysqli_query($con, $sql);

	while($row = mysqli_fetch_assoc($utilizatori) ){
		$nume = $row['Email'];
		$pass = $row['Password'];
		if($email === $nume && $pass === $password){
			session_start();
			$_SESSION['email'] = $email;
			header("Location: cont.php");
		}
	}
?>
