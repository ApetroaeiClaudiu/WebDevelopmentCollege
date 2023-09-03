<?php
	include 'config.php';
	

	$sql = "SELECT * FROM clienti";
	$result =  mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) > 0 ){
		$ceva = 0 ;
		while ($row = mysqli_fetch_assoc($result)) {
			$ceva = $ceva + 1;
		}
		echo $ceva;
	}else{
		echo "Nu sunt clienti";
	}
?>
