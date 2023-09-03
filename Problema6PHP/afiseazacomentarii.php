
<!DOCTYPE html>
<html>
<head>
	<title>
		Comentarii Produs
	</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<style>
		table {
		  font-family: arial, sans-serif;
		  border-collapse: collapse;
		  width: 100%;
		}

		td, th {
		  border: 1px solid #dddddd;
		  text-align: left;
		  padding: 8px;
		}

		tr:nth-child(even) {
		  background-color: #dddddd;
		}
	</style>
</head>
<body>
	<?php
		error_reporting(E_ERROR | E_PARSE);
		$id = $_POST["idnotebook"];
		print "<h1 align=\"center\">Produse Paginate pentru notebook-ul ".$id."</h1>";
		$dsn = "mysql:host=localhost;dbname=claudiu";
		$user = "root";
		$passwd = "";
		$pdo = new PDO($dsn, $user, $passwd);
		$sql = $pdo->query("SELECT * FROM  magazin");
		$rows = $sql->fetchAll(PDO::FETCH_ASSOC);
		foreach($rows as $row){
			$idactuala = $row['Idnotebook'];
			$nume = $row['Numeutilizator'];
			$com = $row['Comentariu'];
			if($idactuala === $id){
				print "<div align=\"center\">";
				print "--------------------<br>";
				print "Nume Utilizator : ".$nume."<br>";
				print "Comentariu : ".$com."<br>";
				print "</div>";
			}
		}
	?>
	<br>
	<div align="center">
		<a href="vizitator.php" >Intoarce-te la pagina principala !</a>
	</div>

</body>
</html>



