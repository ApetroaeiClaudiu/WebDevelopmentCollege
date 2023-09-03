<?php
	$email = $_POST["email"];
	$password = $_POST["pass"];
	$password2 = $_POST["pass2"];

	$dsn = "mysql:host=localhost;dbname=claudiu";
	$user = "root";
	$passwd = "";
	$pdo = new PDO($dsn, $user, $passwd);

	if($password != $password2){
		header("Location: index.php");
	} 
	$ok = 1;
	$sqlcont = $pdo->query("SELECT * FROM  utilizatori");
	$rows = $sqlcont->fetchAll(PDO::FETCH_ASSOC);
	foreach($rows as $row){
		$nume = $row['Email'];
		$pass = $row['Password'];
		if($email === $nume && $pass === $password){
			$ok = 0;
			session_start();
			$_SESSION['email'] = $email;
			header("Location: aprobare.php");
		}
	}
	if($ok == 1){
		header("Location: index.php");
	}
?>
