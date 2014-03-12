<?php

	require_once "../scripts/database_connection.php";
	if($_POST){
		if (isset($_GET['editcou']))
			$cid=$_GET['editcou'];

	if($_POST && gettype($_POST["del"])=='array'){
		foreach($_POST["del"] as $i){
			$id = substr($i,0,strpos($i," "));
		note($id,$cid,"Sorry, you have been deleted by the professor from $cid!");
    		}
	}
	}
	echo "<script>history.back();</script>";

?>
