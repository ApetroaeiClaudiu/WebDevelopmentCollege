
<?php
	include 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Problema 6
	</title>
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
	<div id="thing" class="thing">
		<h1 align="center">Filtrare Notebook-uri</h1>
		<br><br>
		<div id="selecturi" align="center">
			<select id="producator">
				<option value="0">- Selecteaza Producatorul -</option>
					<?php  	
						$sqlProducator = "SELECT DISTINCT Producator FROM notebooks";
						$producatori = mysqli_query($conn, $sqlProducator);
						$inc = 0;
						while($row = mysqli_fetch_assoc($producatori) ){
							$prod = $row['Producator'];
							$inc = $inc + 1;
							echo "<option value='".$inc."' >".$prod."</option>";
						}
					?>
			</select>
			<select id="procesor">
				<option value="0">- Selecteaza Procesorul -</option>
					<?php  	
						$sqlProducator = "SELECT DISTINCT Procesor FROM notebooks";
						$producatori = mysqli_query($conn, $sqlProducator);
						$inc = 0;
						while($row = mysqli_fetch_assoc($producatori) ){
							$prod = $row['Procesor'];
							$inc = $inc + 1;
							echo "<option value='".$inc."' >".$prod."</option>";
						}
					?>
			</select>
			<select id="memorie">
				<option value="0">- Selecteaza Memoria -</option>
					<?php  	
						$sqlProducator = "SELECT DISTINCT Memorie FROM notebooks";
						$producatori = mysqli_query($conn, $sqlProducator);
						$inc = 0;
						while($row = mysqli_fetch_assoc($producatori) ){
							$prod = $row['Memorie'];
							$inc = $inc + 1;
							echo "<option value='".$inc."' >".$prod."</option>";
						}
					?>
			</select>
			<select id="capacitatehdd">
				<option value="0">- Selecteaza Capacitatea HDD -</option>
					<?php  	
						$sqlProducator = "SELECT DISTINCT CapacitateHDD FROM notebooks";
						$producatori = mysqli_query($conn, $sqlProducator);
						$inc = 0;
						while($row = mysqli_fetch_assoc($producatori) ){
							$prod = $row['CapacitateHDD'];
							$inc = $inc + 1;
							echo "<option value='".$inc."' >".$prod."</option>";
						}
					?>
			</select>
			<select id="placavideo">
				<option value="0">- Selecteaza Placa Video -</option>
					<?php  	
						$sqlProducator = "SELECT DISTINCT PlacaVideo FROM notebooks";
						$producatori = mysqli_query($conn, $sqlProducator);
						$inc = 0;
						while($row = mysqli_fetch_assoc($producatori) ){
							$prod = $row['PlacaVideo'];
							$inc = $inc + 1;
							echo "<option value='".$inc."' >".$prod."</option>";
						}
					?>
			</select>
		</div>
		<br></br>
	</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
	var header = ["Producator","Procesor","Memorie","Capacitate HDD","Placa Video"];
	$(document).ready(function(){
		createTable();
		showItems(
			$("#producator option:selected").text(),
			$("#procesor option:selected").text(),
			$("#memorie option:selected").text(),
			$("#capacitatehdd option:selected").text(),
			$("#placavideo option:selected").text()
		);
	    $("#producator,#procesor,#memorie,#capacitatehdd,#placavideo").change(function(){
	    	var producator = $("#producator option:selected").text();
	    	var procesor = $("#procesor option:selected").text();
	    	var memorie = $("#memorie option:selected").text();
	    	var capacitatehdd = $("#capacitatehdd option:selected").text();
	    	var placavideo = $("#placavideo option:selected").text();
	    	showItems(producator,procesor,memorie,capacitatehdd,placavideo);
    	});
	});

	function createTable(){
		var notebooks = document.createElement('table');
        notebooks.setAttribute('id', 'tabelNotebooks');
        var tr = notebooks.insertRow(-1);
        for (var h = 0; h < header.length; h++) {
            var th = document.createElement('th'); 
            th.innerHTML = header[h];
            tr.appendChild(th);
        }
        var div = document.getElementById('thing');
        div.appendChild(notebooks); 
	}

	function showItems(producator,procesor,memorie,capacitatehdd,placavideo){
		removeRows();
		if(producator === "- Selecteaza Producatorul -"){
			producator = "default";
		}
		if(procesor === "- Selecteaza Procesorul -"){
			procesor = "default";
		}
		if(memorie === "- Selecteaza Memoria -"){
			memorie = "default";
		}
		if(capacitatehdd === "- Selecteaza Capacitatea HDD -"){
			capacitatehdd = "default";
		}
		if(placavideo === "- Selecteaza Placa Video -"){
			placavideo = "default";
		}
		//jquery
		$.ajax({
            url: 'filter.php',
            type: 'post',
            data: {producator:producator,
            	procesor:procesor,
            	memorie:memorie,
            	capacitatehdd:capacitatehdd,
            	placavideo:placavideo},
            dataType: 'json',
            success:function(response){
                var len = response.length;
                var inc = 0 ;
                for( var i = 0; i<len; i++){
                	var noulProducator = response[i]['producator'];
                	var noulProcesor = response[i]['procesor'];
                	var nouaMemorie = response[i]['memorie'];
                	var nouaCapacitate = response[i]['capacitate'];
                	var nouaPlaca = response[i]['placa'];
                	addRow(noulProducator,noulProcesor,nouaMemorie,nouaCapacitate,nouaPlaca);
                }
            }
    	});
	}
	function addRow(noulProducator,noulProcesor,nouaMemorie,nouaCapacitate,nouaPlaca){
		var notebooks = document.getElementById('tabelNotebooks');
		
		var inputs = [noulProducator,noulProcesor,nouaMemorie,nouaCapacitate,nouaPlaca]; 

        var rowCnt = notebooks.rows.length;
        var tr = notebooks.insertRow(rowCnt);
        tr = notebooks.insertRow(rowCnt);

        for (var c = 0; c < header.length; c++) {
            var td = document.createElement('td');
            td = tr.insertCell(c);
            var ele = document.createElement('input');
            ele.setAttribute('type', 'text');
            ele.setAttribute('value', inputs[c]);
            ele.setAttribute('readonly',true);
            td.appendChild(ele);
        }
	}
	function removeRows(){
		var notebooks = document.getElementById('tabelNotebooks');
		var lungime = notebooks.rows.length- 1;
        for (var row = 1; row <=lungime; row++) {
        	notebooks.deleteRow(1);
        }
	}
</script>
</html>

