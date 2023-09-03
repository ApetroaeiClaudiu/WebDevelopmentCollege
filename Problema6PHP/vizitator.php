
<!DOCTYPE html>
<html>
<head>
	<title>
		Afisare Produse Si Adaugare De Comentarii
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
	<h1 align="center">Produse Paginate </h1>
	<table>
		<tr>
			<th>Id</th>
			<th>Producator</th>
			<th>Procesor</th>
			<th>Memorie</th>
			<th>Capacitate HDD</th>
			<th>Placa Video</th>
			<th>Adauga Comentariu</th>
			<th>Afiseaza Comentarii</th>
		</tr>
		<?php
			session_start();
			error_reporting(E_ERROR | E_PARSE);
			$dsn = "mysql:host=localhost;dbname=claudiu";
			$user = "root";
			$passwd = "";
			$pdo = new PDO($dsn, $user, $passwd);
			$sql = $pdo->query("SELECT * FROM  notebooks");
			$rows = $sql->fetchAll(PDO::FETCH_ASSOC);
			foreach($rows as $row){
				$id = $row['Id'];
				$producator = $row['Producator'];
				$procesor = $row['Procesor'];
				$memorie = $row['Memorie'];
				$capacitate = $row['CapacitateHDD'];
				$placavideo = $row['PlacaVideo'];
				print 
					"\t<tr>
					<td>$id</td>
					<td>$producator</td>
					<td>$procesor</td>
					<td>$memorie</td>
					<td>$capacitate</td>
					<td>$placavideo</td>
					<td>
					<form method=\"POST\" action=\"adaugacomentariu.php\" enctype=\"multipart/form-data\">
						Comentariu: <input type=\"textArea\" name=\"comentariu\"/>
						<br>
						Nume Vizitator: <input type=\"text\" name=\"nume\"/>
						<br>
						<input type=\"hidden\" value=".$id." name=\"idnotebook\">
						<br>
						<input type=\"Submit\" value=\"Adauga Comentariu\">
						<br>
					</form>
					</td>
					<td>
					<form method=\"POST\" action=\"afiseazacomentarii.php\" enctype=\"multipart/form-data\">
						<input type=\"hidden\" value=".$id." name=\"idnotebook\">
						<br>
						<input type=\"Submit\" value=\"Afiseaza Comentarii\">
						<br>
					</form>
					</td>
					</tr>";
			}
		?>
	</table>
	<br>
	<a href="index.php" >Intoarce-te la inregistrare !</a>

</body>
</html>



