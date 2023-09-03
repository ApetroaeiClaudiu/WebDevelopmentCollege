<?php
	$dsn = "mysql:host=localhost;dbname=claudiu";
	$user = "root";
	$passwd = "";
	$pdo = new PDO($dsn, $user, $passwd);

	$email = addslashes(htmlentities($_POST["email"], ENT_COMPAT, "UTF-8"));
	$username = addslashes(htmlentities($_POST["username"], ENT_COMPAT, "UTF-8"));
	$pass = addslashes(htmlentities($_POST["pass"], ENT_COMPAT, "UTF-8"));
	$pass2 = addslashes(htmlentities($_POST["pass2"], ENT_COMPAT, "UTF-8"));
	if(($pass != $pass2) || (strlen($username )){
		print "Eroare! Parolele nu sunt aceleasi !<br>
		Apasa <a href=\"inregistrare.php\">aici</a> ca sa incerci din nou";
	} 
	else
	{
		$ok = 0;
		$sqlcont = $pdo->query("SELECT * FROM  utilizatori");
		$rows = $sqlcont->fetchAll(PDO::FETCH_ASSOC);
		foreach($rows as $row){
			$numeutiz = $row['Email'];
			if($numeutiz === $email){
				print "Eroare! Adresa de email este deja utilizata !<br>";
				print "Apasa <a href=\"inregistrare.php\">aici</a> ca sa incerci din nou";
				$ok = 1;
			}
		}
		if($ok === 0 ){
			$sql = "INSERT INTO utilizatori (Email, Username, Password) VALUES (:email, :user, :pass)";
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':user', $username);
			$stmt->bindParam(':pass', $pass);
			if (! $stmt->execute()){
				print "Eroare!<br>";
				print "Apasa <a href=\"inregistrare.php\">aici</a> ca sa incerci din nou ";
			}
			else{
				print "Utilizatorul a fost adaugat cu succes.<br>";
				print "Apasa <a href=\"index.php\">aici</a> ca sa te intorci la pagina principala";
			}
		}
	}
?>
