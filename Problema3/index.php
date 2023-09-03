
<?php
	include 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Problema 3
	</title>
</head>
<body>
	<div class="thing">
		<h1>Formular</h1>
		<br><br>
		<select id="iduri">
			<option value="0">- Selecteaza ID-ul -</option>
				<?php  	
					$sqlclienti = "SELECT * FROM clienti";
					$clienti = mysqli_query($conn, $sqlclienti);
					$inc = 0;
					while($row = mysqli_fetch_assoc($clienti) ){
						$id = $row['Id'];
						$inc = $inc + 1;
						echo "<option value='".$inc."' >".$id."</option>";
					}
				?>
		</select>
		<br></br>
        Nume :
        <input class="input" id="nume"type="text" name="Nume" required/><br><br>

        Prenume :
        <input class="input" id="prenume" type="text" name="Prenume" required/><br><br>

        Numar De Telefon :
        <input class="input"  id="telefon" type="text" name="Telefon" required/><br><br>

        E-Mail :
        <input class="input"  id="email" type="text" name="Email" required/><br><br>

        <button class="input" id="save" disabled="disabled">Save</button>
	</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
	var idGlobal = - 1;
	function disabling(){
		if($("#iduri option:selected").text() != '- Selecteaza ID-ul -'){
			$("#save").prop('disabled',false);
		}
	}
	$(document).ready(function(){
		$("#nume,#prenume,#telefon,#email").on("keyup",function(){
			disabling();
		});
    	$("#save").on("click",save);
	    $("#iduri").change(function(){
	    	var id = $("#iduri option:selected").text();
	    	if($("#save").prop('disabled') == false){
	    		if(confirm("Nu ati modificat datele, doriti sa le modificati ?")){
	    			save();
	    		}
	    		update(id);
	    	}
	    	else{
	    		update(id);
	    	}
    	});
	});
	function update(id){
		idGlobal = id;
		//jquery
		$.ajax({
            url: 'getInfo.php',
            type: 'post',
            data: {id:id},
            dataType: 'json',
            success:function(response){
                var len = response.length;
                var inc = 0 ;
                for( var i = 0; i<len; i++){
                    var nume = response[i]['nume'];
                    var prenume = response[i]['prenume'];
                    var telefon = response[i]['telefon'];
                    var email = response[i]['email'];
                    let nume1 = $('input[name$="Nume"]').first();
                    nume1.val(nume);
                    let prenume1 = $('input[name$="Prenume"]').first();
                    prenume1.val(prenume);
                    let telefon1 = $('input[name$="Telefon"]').first();
                    telefon1.val(telefon);
                    let email1 = $('input[name$="Email"]').first();
                    email1.val(email);
                    $("#save").prop('disabled',true);
                }
            }
    	});
    	//pur javascript
    	// getInfo(id);
	}
	function getInfo(id){
		var request = new XMLHttpRequest();
		request.onreadystatechange = function() {
		if (request.readyState == 4) { // cerere rezolvata
			if (request.status == 200){ // raspuns Ok
				var response = JSON.parse(request.responseText);
				var len = response.length;
                var inc = 0 ;
                for( var i = 0; i<len; i++){
                    var nume = response[i]['nume'];
                    var prenume = response[i]['prenume'];
                    var telefon = response[i]['telefon'];
                    var email = response[i]['email'];
                    let nume1 = $('input[name$="Nume"]').first();
                    nume1.val(nume);
                    let prenume1 = $('input[name$="Prenume"]').first();
                    prenume1.val(prenume);
                    let telefon1 = $('input[name$="Telefon"]').first();
                    telefon1.val(telefon);
                    let email1 = $('input[name$="Email"]').first();
                    email1.val(email);
                    $("#save").prop('disabled',true);
                }
			}
			else
				console.log('Eroare request.status: ' + request.status);
			}
		};
		request.open('GET', 'getInfo.php?id='+id,true);
		request.send('');
	}

	function save(){
		//jquery
		let id = idGlobal;
		let nume = $('input[name$="Nume"]').first().val();
		let prenume = $('input[name$="Prenume"]').first().val();
		let telefon = $('input[name$="Telefon"]').first().val();
		let email = $('input[name$="Email"]').first().val();
		console.log(id,nume,prenume,email,telefon);
		$.ajax({
			url: 'update.php',
			type: 'post',
			data: {id: id,
				nume: nume,
				prenume: prenume,
				telefon: telefon,
				email: email},
			success:function(response){
				$("#save").prop('disabled',true);
			},
		});
		//pur js 
		// let id = idGlobal;
		// let nume = $('input[name$="Nume"]').first().val();
		// let prenume = $('input[name$="Prenume"]').first().val();
		// let telefon = $('input[name$="Telefon"]').first().val();
		// let email = $('input[name$="Email"]').first().val();
		// var request = new XMLHttpRequest();
		// request.onreadystatechange = function() {
		// if (request.readyState == 4) { // cerere rezolvata
		// 	if (request.status == 200){ // raspuns Ok
		// 		$("#save").prop('disabled',true);
		// 	}
		// 	else
		// 		console.log('Eroare request.status: ' + request.status);
		// 	}
		// };
		// request.open('GET', 'update.php?id='+id+'nume='+nume+'&prenume='+prenume+'&telefon='+telefon+'&email='+email,true);
		// request.send('');
	}
</script>
</html>