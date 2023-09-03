
<?php
	include 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Problema 3
	</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
	<form method="POST" action="autentificare.php">
		<?php
			session_start();
			session_destroy();
		?>
		Nume de utilizator profesor: <input type="text" name="username">
		<br>
		E-mail: <input type="text" name="email"/>
		<br>
		Parola: <input type="password" name="pass"/>
		<br>
		<input type="Submit" value="Autentificare ca Profesor">
		<br>
	</form>
	<br>
	<a class="btn btn-primary" href="student.php">Autentificare ca Student</a>
	
</body>
</html>