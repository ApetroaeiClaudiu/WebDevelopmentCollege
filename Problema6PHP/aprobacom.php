<?php
	session_start();
	if (array_key_exists('id', $_POST)) {
		$id = $_POST["id"];
		$nume = $_POST["nume"];
		$idnote = $_POST["idnote"];
		//$comentariu = addslashes(htmlentities($_POST["com"], ENT_COMPAT, "UTF-8"));
		$comentariu = $_POST['com'];
		$dsn = "mysql:host=localhost;dbname=claudiu";
		$user = "root";
		$passwd = "";
		$pdo = new PDO($dsn, $user, $passwd);

		$sql = "DELETE FROM  tabelaintermediara WHERE Id = :id";
		$stmt1 = $pdo->prepare($sql);
		$stmt1->bindParam(':id', $id);

		$sqladd = "INSERT INTO magazin (Idnotebook,Numeutilizator,Comentariu) VALUES (:idnote,:numeut,:comm)";
		$stmt2 = $pdo->prepare($sqladd);
		$stmt2->bindParam(':idnote', $idnote);
		$stmt2->bindParam(':numeut', $nume);
		$stmt2->bindParam(':comm', $comentariu);

		if ( ! $stmt1->execute()) {
			print "Eroare la stergere!<br>";
			print "<a href=\"aprobare.php\" >Intoarce-te la comentarii</a>";
		}
		else{
			if(! $stmt2->execute() ){
				print "Eroare la adaugare!<br>";
				print "<a href=\"aprobare.php\" >Intoarce-te la comentarii</a>";
			}
			else{
				print "<a href=\"aprobare.php\" >Am aprobat comentariul !</a>";
			}
		}
	}
	else{
		print "Eroare!<br>";
		print "<a href=\"aprobare.php\" >Intoarce-te la comentarii</a>";
	}
?>