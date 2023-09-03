<?php
	$board = $_POST['board'];
	$index = 0;
	$liber = 0;
	$verif = 0;
	//trecem prin toate locurile din board
	for ($x = 0; $x <= 8; $x++) {
		//daca locul e liber si nu am returnat deja ceva 
  		if($board[$x] === '' && $verif === 0){
  			//retinem ultimul loc liber
  			$liber = $x;
  			$ceva = rand(0,1);
  			//daca valoarea aleasa random e 0 , returnam indexul
  			if($ceva === 0){
  				echo $x;
  				//setam verif pe 1 , adica am returnat deja ceva
  				$verif = 1;
  			}
  		}
	}
	// foreach ($board as $loc) {
	// 	echo "$board[1]";
	// 	//daca locul e liber 
 //    	if($loc === ''){
 //    		//tinem minte ultimul loc liber;
 //    		$liber = $index;
 //    		//daca valoarea random e 0 , punem acolo 
 //    		if(rand(0,1) === 0){
 //    			echo $index;
 //    		}
 //    	}
 //    	//incrementam 
 //    	$index = $index + 1;
 //    }
    //returnam ultimul loc liber daca random ul nu si a facut treaba 
    if($verif === 0){
    	echo $liber;	
    }