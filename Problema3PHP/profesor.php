
<?php
	require_once "config.php";
	require_once "checkSession.php";

?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Afisare Produse
	</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
	<form method="POST" action="asigneazaNota.php">
		Selecteaza Studentul ;
		<select name="student">
			<?php
				$con->set_charset("utf8");  	
				$sql = "SELECT * FROM studenti";
				$students = mysqli_query($con, $sql);
				$inc = 0;
				while($row = mysqli_fetch_assoc($students) ){
					$id = $row['Sid'];
					$nume = $row['Nume'];
					$prenume = $row['Prenume'];
					echo "<option value=".$id."' >".$nume." ".$prenume."</option>";
				}
			?>
		</select>
		<br>
		Selecteaza Materia :
		<select name="materie">
			<?php
				$con->set_charset("utf8");  	
				$sql = "SELECT * FROM materii";
				$materii = mysqli_query($con, $sql);
				$inc = 0;
				while($row = mysqli_fetch_assoc($materii) ){
					$id = $row['Mid'];
					$nume = $row['Nume'];
					echo "<option value=".$id."' >".$nume."</option>";
				}
			?>
		</select>
		<br>
		Nota: <input type="text" name="nota">
		<br>
		<input type="Submit" value="Asigneaza Nota">
	</form>
	<br>
	Apasa <a href="index.php">aici</a> ca sa te intorci la pagina principala
</body>
</html>



