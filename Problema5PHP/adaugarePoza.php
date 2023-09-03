<?php
	require_once "checkSession.php";
	session_start();
	$target_dir = "poze/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}

	<!-- -->
	//
	#
	/**/
	}
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {
  		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  		$uploadOk = 0;
	}
	$fileExt = explode('.', $target_file);
	$fileActualExtension = strtolower(end($fileExt));
	if (file_exists($target_file)) {
  		$fileNewName = uniqid("photo", true) . "." . $fileActualExtension;
        $target_file = "poze/" . $fileNewName;
	}
	if ($uploadOk == 0) {
  		echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
	} else {
  		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    		$dsn = "mysql:host=localhost;dbname=claudiu";
			$user = "root";
			$passwd = "";
			$pdo = new PDO($dsn, $user, $passwd);
			$sql = "INSERT INTO poze (Locatie,Emailutilizator) VALUES (:locatie,:email)";
			$stmt = $pdo->prepare($sql);
			$locatie = $target_file;
			$email = $_SESSION['email'];
			$stmt->bindParam(':locatie', $locatie);
			$stmt->bindParam(':email', $email);
			if (! $stmt->execute())
				print "Eroare!<br>";
			else{
    			//echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    			header("Location: cont.php");
    		}
  		} else {
    		echo "Sorry, there was an error uploading your file.";
  		}
	}
	echo "<br>";
	echo "<a href=\"cont.php\" >Intoarce-te la cont</a>";
?>