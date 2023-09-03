<?php
	error_reporting(0);
	session_start();
	// daca pe sesiune nu e setat un e-mail de utilizator autentificat
	// inseamna ca nu s-a trecut prin formularul de login sau
	// login.php nu a setat pe sesiune un e-mail de utilizator autentificat
	if (! isset($_SESSION['email']) || ($_SESSION['email'] == ""))
		header("Location: index.php");
