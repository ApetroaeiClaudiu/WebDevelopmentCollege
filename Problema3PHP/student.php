
<?php
	require_once "config.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Student 
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
	<h1 align="center">Note </h1>
	<table>
		<tr>
			<th>Student</th>
			<th>Materie</th>
			<th>Nota</th>
		</tr>
		<?php
			session_start();
			error_reporting(E_ERROR | E_PARSE);
			$con->set_charset("utf8");

			$sql = "SELECT * FROM notestudenti";
			$note = mysqli_query($con,$sql);
			$arrayNote = array();
			while($row = mysqli_fetch_assoc($note)){
				$sid = $row['Sid'];
				$mid = $row['Mid'];
				$nota = $row['Nota'];
				$ok = 0;
				$sqlMaterii = "SELECT * FROM materii";
				$materii = mysqli_query($con,$sqlMaterii);
				while($row = mysqli_fetch_assoc($materii)){
					$ceva = $row['Mid'];
					if($mid === $ceva){
						$ok = 1;
						$numematerie = $row['Nume'];
					}
				}
				$sqlStudenti = "SELECT * FROM studenti";
				$studenti = mysqli_query($con,$sqlStudenti);
				$arrayStudenti = array();
				while($row = mysqli_fetch_assoc($studenti)){
					$ceva2 = $row['Sid'];
					if($sid === $ceva2){
						$ok = 2;
						$numestudent = $row['Nume'];
						$prenumestudent = $row['Prenume'];
					}
				}
				if($ok == 2)
					print "\t<tr><td>$numestudent $prenumestudent</td><td>$numematerie</td><td>$nota</td></tr>\n";
			}
		?>
	</table>
	<br>
	Apasa <a href="index.php">aici</a> ca sa te intorci la pagina principala

</body>
</html>



