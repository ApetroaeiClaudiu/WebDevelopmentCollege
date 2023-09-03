<?php
	include 'config.php';
	
	$primul = $_POST['prim'];
	$ultimul = $_POST['ultim'];

	$sql = "SELECT * FROM clienti";
	$result =  mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) > 0 ){
		while ($row = mysqli_fetch_assoc($result)) {
			if($row['Id']>=$primul && $row['Id']<=$ultimul){
				echo "<p>".$row['Nume']." / ".$row['Prenume']." / ".$row['Telefon']." / ".$row['Email']."</p>";
			}
		}
	}else{
		echo "Nu sunt clienti";
	}
?>
