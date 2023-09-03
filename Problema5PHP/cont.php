
<!DOCTYPE html>
<html>
<head>
	<title>
		Cont
	</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
	<form align="center" method="post" action="adaugarePoza.php" enctype="multipart/form-data">
		<?php
			require_once "checkSession.php";
			session_start();
			$email = $_SESSION['email'];
			print "<p> Contul lui : ".$email."</p>";
		?>
		Select image to upload:
  		<input type="file" name="fileToUpload" id="fileToUpload">
  		<br>
  		<input type="submit" value="Adauga o Imagine" name="submit">
  		<br>
  		
	Apasa <a href="index.php">aici</a> ca sa te intorci la pagina principala
	</form>
	<div>
		<table align="center">
			<tr>
			<th></th>
			<th></th>
			<th></th>
		</tr>
			<?php
				$contor = 1;
				$email = $_SESSION['email'];
				$dsn = "mysql:host=localhost;dbname=claudiu";
				$user = "root";
				$passwd = "";
				$pdo = new PDO($dsn, $user, $passwd);
				$sql = $pdo->query("SELECT * FROM  poze");
				$rows = $sql->fetchAll(PDO::FETCH_ASSOC);
				foreach($rows as $row){
					$nume = $row['Emailutilizator'];
					$poza = $row['Locatie'];
					$id = $row['Id'];
					if($nume === $email){
						$ok = 0;
						if($contor === 1 && $ok === 0){
							print 
							"\t<tr><td>
							<p>Poza lui ".$nume."</p>
							<img src=".$poza." width=\"300\" height=\" 300 \">
							<form method=\"POST\" action=\"stergerePoza.php\" enctype=\"multipart/form-data\">
								<input type=\"hidden\" value=".$poza." name=\"deleted\">
								<input type=\"hidden\" value=".$id." name=\"idpoza\">
								<br>
								<input type=\"Submit\" value=\"Sterge\">
								<br>
							</form>
							</td>";
							$contor = 2;
							$ok = 1;
						}
						if($contor === 2 && $ok === 0){
							print 
							"\t<td>
							<p>Poza lui ".$nume."</p>
							<img src=".$poza." width=\"300\" height=\" 300 \">
							<form method=\"POST\" action=\"stergerePoza.php\" enctype=\"multipart/form-data\">
								<input type=\"hidden\" value=".$poza." name=\"deleted\">
								<input type=\"hidden\" value=".$id." name=\"idpoza\">
								<br>
								<input type=\"Submit\" value=\"Sterge\">
								<br>
							</form>
							</td>";
							$contor = 3;
							$ok = 1;
						}
						if($contor === 3 && $ok === 0){
							print 
							"\t<td>
							<p>Poza lui ".$nume."</p>
							<img src=".$poza." width=\"300\" height=\" 300 \">
							<form method=\"POST\" action=\"stergerePoza.php\" enctype=\"multipart/form-data\">
								<input type=\"hidden\" value=".$poza." name=\"deleted\">
								<input type=\"hidden\" value=".$id." name=\"idpoza\">
								<br>
								<input type=\"Submit\" value=\"Sterge\">
								<br>
							</form>
							</td>
							</tr>";
							$contor = 1;
							$ok = 1;
						}
					}
				}
				foreach($rows as $row){
					$nume = $row['Emailutilizator'];
					$poza = $row['Locatie'];
					$id = $row['Id'];
					if($nume !== $email){
						$ok = 0;
						if($contor === 1 && $ok === 0){
							print 
								"\t<tr><td>
								<p>Poza lui ".$nume."</p>
								<img src=".$poza." width=\"300\" height=\" 300 \">
								</td>";
							$contor = 2;
							$ok = 1;
						}
						if($contor === 2 && $ok === 0){
							print 
								"\t<td>
								<p>Poza lui ".$nume."</p>
								<img src=".$poza." width=\"300\" height=\" 300 \">
								</td>";
							$contor = 3;
							$ok = 1;
						}
						if($contor === 3 && $ok === 0){
							print 
								"\t<td>
								<p>Poza lui ".$nume."</p>
								<img src=".$poza." width=\"300\" height=\" 300 \">
								</td>
								</tr>";
							$contor = 1;
							$ok = 1;
						}
					}
				}
				if($contor === 2 || $contor === 3){
					print "</tr>";
				}
			?>
	</div>
</body>
</html>