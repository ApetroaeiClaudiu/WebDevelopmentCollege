<?php
	require_once "checkSession.php";
	session_start();
	if (array_key_exists('deleted', $_POST)) {
		$poza = $_POST["deleted"];
		$idpoza = $_POST["idpoza"];
		$dsn = "mysql:host=localhost;dbname=claudiu";
		$user = "root";
		$passwd = "";
		$pdo = new PDO($dsn, $user, $passwd);
		$sql = "DELETE FROM  poze WHERE Id = :idpoza";
		$stmt = $pdo->prepare($sql);
		$stmt->bindParam(':idpoza', $idpoza);
		if (! $stmt->execute())
			print "Eroare!<br>";
		else{
			print $poza;
			unlink($poza);
			header("Location: cont.php");
		}
	}else
		print "nu";
?>