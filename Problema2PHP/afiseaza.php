
<?php
	require_once "config.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Afisare Produse
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
		</tr>
		<?php
			session_start();
			error_reporting(E_ERROR | E_PARSE);
			$con->set_charset("utf8");
			$numar = $_SESSION['numar'];
			$primul = $_SESSION['primul'];
			$sql = "SELECT * FROM notebooks ORDER BY Id LIMIT ".$primul.",".$numar;
			$result = mysqli_query($con,$sql);
			while ($row = mysqli_fetch_assoc($result)) {
				$id = $row['Id'];
				$producator = $row['Producator'];
				$procesor = $row['Procesor'];
				$memorie = $row['Memorie'];
				$capacitate = $row['CapacitateHDD'];
				$placavideo = $row['PlacaVideo'];
				print "\t<tr><td>$id</td><td>$producator</td><td>$procesor</td><td>$memorie</td><td>$capacitate</td><td>$placavideo</td></tr>\n";
			}
		?>
	</table>
	<br>
	<a class="btn btn-primary" href="anteriori.php" id="prev" class='enablingPrev' >Arata Clientii anteriori</a>
	<a class="btn btn-primary" href="urmatori.php" id="next" class='enablingNext' >Arata Clientii urmatori</a>
	<br>
	Click <a href="index.php">aici</a> ca sa modifici numarul de produse per pagina

</body>
</html>



