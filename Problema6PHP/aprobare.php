
<!DOCTYPE html>
<html>
<head>
	<title>
		Aprobare Comentarii
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
	<h1 align="center">Comentarii in asteptare de confirmare</h1>
	<table>
		<tr>
			<th>Id Notebook</th>
			<th>Nume Vizitator</th>
			<th>Comentariu</th>
			<th>Aprobare</th>
		</tr>
		<?php
			session_start();
			error_reporting(E_ERROR | E_PARSE);
			$dsn = "mysql:host=localhost;dbname=claudiu";
			$user = "root";
			$passwd = "";
			$pdo = new PDO($dsn, $user, $passwd);
			$sql = $pdo->query("SELECT * FROM tabelaintermediara");
			$rows = $sql->fetchAll(PDO::FETCH_ASSOC);
			foreach($rows as $row){
				$id = $row['Id'];
				$idnote = $row['Idnotebook'];
				$nume = $row['Nume'];
				$com = $row['Comentariu'];
				print 
					"\t<tr>
					<td>$idnote</td>
					<td>$nume</td>
					<td>$com</td>
					<td>
					<form method=\"POST\" action=\"aprobacom.php\" enctype=\"multipart/form-data\">
						<input type=\"hidden\" value=".$id." name=\"id\">
						<br>
						<input type=\"hidden\" value=".$idnote." name=\"idnote\">
						<br>
						<input type=\"hidden\" value=".$nume." name=\"nume\">
						<br>
						<input type=\"hidden\" value=\".$com.\" name=\"com\">
						<br>
						<input type=\"Submit\" value=\"Aproba Comentariu\">
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



