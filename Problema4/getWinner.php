<?php
	$winningCombos = $_POST['winningCombos'];
	$board = $_POST['board'];
	$winner = null;
    foreach ($winningCombos as $var) {
    	if($board[$var[0]] && $board[$var[0]] === $board[$var[1]] && $board[$var[0]] === $board[$var[2]]){
    		$winner = $board[$var[0]];
    	}
    }
    $ceva = "nu";
    if ($winner) {
        echo $winner; 
    }
    else
    	{foreach ($board as $something) {
    		if($something === ''){
    			$ceva = "da";
    		}
	    }
	    if($ceva === "da"){
	    	echo null;
	    } else {
	    	echo "T"; 
	    }
	}