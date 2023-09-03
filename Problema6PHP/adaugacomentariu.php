<?php
	if (array_key_exists('idnotebook', $_POST)) {
		$id = $_POST["idnotebook"];
		$nume = $_POST["nume"];
		$comentariu = $_POST["comentariu"];
		$dsn = "mysql:host=localhost;dbname=claudiu";
		$user = "root";
		$passwd = "";
		$pdo = new PDO($dsn, $user, $passwd);
		$sql = "INSERT INTO tabelaintermediara (Idnotebook,Nume,Comentariu) VALUES (:id,:nume,:com)";
		$stmt = $pdo->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':nume', $nume);
		$stmt->bindParam(':com', $comentariu);
		if (! $stmt->execute()){
			print "Eroare!<br>";
			print "<a href=\"vizitator.php\" >Intoarce-te la produse</a>";
		}
		else{
			print "<a href=\"vizitator.php\" >Am adaugat comentariul dumneavoastra, asteptam sa fie confirmat de catre un administrator. Va puteti intoarce la pagina principala !</a>";
		}
	}
?>