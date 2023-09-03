
<?php
	include 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Problema 1
	</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<h1 align="center" >
	Trenuri
</h1>

<div align="center"> Statii De Plecare </div>
<select id="statiiDePlecare">
	<option value="0">- Selecteaza Statie De Plecare -</option>
		<?php  	
			$sqlStatiiDePlecare = "SELECT DISTINCT StatiePlecare FROM trenuri";
			$statii = mysqli_query($conn, $sqlStatiiDePlecare);
			$inc = 0;
			while($row = mysqli_fetch_assoc($statii) ){
				$statiePlecare = $row['StatiePlecare'];
				$inc = $inc + 1;
				echo "<option value='".$inc."' >".$statiePlecare."</option>";
			}
		?>
</select>

<div class="clear"></div>
<br>

<div align="center"> Statii De Sosire </div>
<select id="statiiDeSosire">
   <option value="0">- Selecteaza Statie De Sosire -</option>
</select>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
	$(document).ready(function(){
	    $("#statiiDePlecare").change(function(){
	    	var nume = $("#statiiDePlecare option:selected").text();
	    	//cu pur javascript
	  //   	function getSosire() {
			// 	var request = new XMLHttpRequest();
			// 	request.onreadystatechange = function() {
			// 	if (request.readyState == 4) { // cerere rezolvata
			// 		if (request.status == 200){ // raspuns Ok
			// 			var response = JSON.parse(request.responseText);
			// 			console.log(response);
			// 			// var len = response.length;
		 //    //             $("#statiiDeSosire").empty();
		 //    //             var inc = 0 ;
		 //    //             for( var i = 0; i<len; i++){
		 //    //             	inc = inc + 1;
		 //    //                 var name = response[i]['nume'];
		 //    //                 $("#statiiDeSosire").append("<option value='"+inc+"'>"+name+"</option>");
		 //    //             }
			// 		}
			// 		else
			// 			console.log('Eroare request.status: ' + request.status);
			// 		}
			// 	};
			// 	request.open('GET', 'getSosire.php',true);
			// 	request.send('');
			// }
			// getSosire();
			//cu jquery
	        $.ajax({
	            url: 'getSosire.php',
	            type: 'post',
	            data: {Nume:nume},
	            dataType: 'json',
	            success:function(response){
	                var len = response.length;
	                $("#statiiDeSosire").empty();
	                var inc = 0 ;
	                for( var i = 0; i<len; i++){
	                	inc = inc + 1;
	                    var name = response[i]['nume'];
	                    $("#statiiDeSosire").append("<option value='"+inc+"'>"+name+"</option>");
	                }
	            }
	        });
	        
    	});
	});
</script>
</html>