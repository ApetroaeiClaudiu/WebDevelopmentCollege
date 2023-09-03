

<?php
	include 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Problema 2
	</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script>
			function verificare(PrimulClient,UltimulClient,len){
				if(PrimulClient - 3 < 1){
					$(".enablingPrev").prop('disabled',true);
				}
				else{
					$(".enablingPrev").prop('disabled',false);
				}
				if(PrimulClient + 3 > len){
					$(".enablingNext").prop('disabled',true);
				}
				else{
					$(".enablingNext").prop('disabled',false);
				}
			}
			var len = 0 ;
			$(document).ready(function(){
				// cu pur javascript
				function getMax() {
					var request = new XMLHttpRequest();
					request.onreadystatechange = function() {
					if (request.readyState == 4) { // cerere rezolvata
						if (request.status == 200){ // raspuns Ok
							var ceva = request.responseText;
							len = ceva;
			                console.log(len);
			                var PrimulClient = 1;
							var UltimulClient = 3;
							verificare(PrimulClient,UltimulClient,len);
							$("#prev").click(function(){
								PrimulClient = PrimulClient - 3;
								UltimulClient = UltimulClient - 3;
								$("#clienti").load("aduClienti.php", {
									prim: PrimulClient,
									ultim: UltimulClient
								})
								verificare(PrimulClient,UltimulClient,len);
							})
							$("#next").click(function(){
								PrimulClient = PrimulClient + 3;
								UltimulClient = UltimulClient + 3;
								$("#clienti").load("aduClienti.php", {
									prim: PrimulClient,
									ultim: UltimulClient
								})
								verificare(PrimulClient,UltimulClient,len);
							})
						}
						else
							console.log('Eroare request.status: ' + request.status);
						}
					};
					request.open('GET', 'getMax.php',false);
					request.send('');
				}
				getMax();
				/*
				//cu jquery
				$.ajax({
		            url: 'getMax.php',
		            type: 'post',
		            success:function(response){
		                var len = response;
		                console.log(len);
		                var PrimulClient = 1;
						var UltimulClient = 3;
						verificare(PrimulClient,UltimulClient,len);
						$("#prev").click(function(){
							PrimulClient = PrimulClient - 3;
							UltimulClient = UltimulClient - 3;
							$("#clienti").load("aduClienti.php", {
								prim: PrimulClient,
								ultim: UltimulClient
							})
							verificare(PrimulClient,UltimulClient,len);
						})
						$("#next").click(function(){
							PrimulClient = PrimulClient + 3;
							UltimulClient = UltimulClient + 3;
							$("#clienti").load("aduClienti.php", {
								prim: PrimulClient,
								ultim: UltimulClient
							})
							verificare(PrimulClient,UltimulClient,len);
						})
				    }

		        });
		        */
				
			})
		</script>
	</script>
</head>
<body>
	<div align="center">
		<div id="clienti">
			<?php
				$sql = "SELECT * FROM clienti";
				$result =  mysqli_query($conn, $sql);
				if(mysqli_num_rows($result) > 0 ){
					while ($row = mysqli_fetch_assoc($result)) {
						if($row['Id']>=1 && $row['Id']<=3){
							echo "<p>".$row['Nume']." / ".$row['Prenume']." / ".$row['Telefon']." / ".$row['Email']."</p>";
						}
					}
				}else{
					echo "Nu sunt clienti";
				}
			?>
		</div>
		<button id="prev" class='enablingPrev' disabled='disabled'>Arata Clientii anteriori</button>
		<button id="next" class='enablingNext' disabled='disabled'>Arata Clientii urmatori</button>
</div>
</body>
</html>