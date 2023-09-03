<?php

$servername = "localhost";

$username = "acir2447";
$password = "acir2447";
$dbname = "acir2447";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}