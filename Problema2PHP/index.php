<?php
	include 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Problema 2 
	</title>
</head>
<body>
	<form method="POST" action="trimite.php">
		<p>Selecteaza numarul de produse per pagina </p>
		<select name="numar">
			<?php
				session_start();
				session_destroy();
				$con->set_charset("utf8");  	
				$sql = "SELECT * FROM notebooks";
				$notebooksId = mysqli_query($con, $sql);
				$inc = 0;
				while($row = mysqli_fetch_assoc($notebooksId) ){
					$inc = $inc + 1;
					echo "<option value='".$inc."' >".$inc."</option>";
				}
			?>
		</select>
		<input type="Submit" value="Afiseaza Produse">
	</form>
	
</body>
</html>