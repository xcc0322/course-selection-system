<?php
//signup_prof

	include "../scripts/_database_connection.php";

	session_start();

	$table[0] = "student";
	$table[1] = "professor";
	$table[2] = "admin";
	$idname[0] = "sid";
	$idname[1] = "pid";
	$idname[2] = "aid";
	$ID = $_REQUEST['ID'];
	$pw = $_REQUEST['password'];
	$i = 0;
		for ($i=2; $i>=0; $i--)
        		if(foo($ID, $i)) {
				$result = mysql_query("select decode(password,'godisagirl'),suspended from {$table[$i]} where {$idname[$i]} = '$ID';");
				$row = mysql_fetch_array($result);
				$pw2 = $row['decode(password,\'godisagirl\')'];
				$sus = $row['suspended'];
				break;
			}
		
		$_SESSION['id']=$ID;
		if ($i == -1) back("Wrong ID! It's not signed!");
		else if ($pw != $pw2) back("Wrong Password!");
		else if ($sus == 1) back("You have logged in successfully but you have been suspended!");
		else if ($i == 0) linkto("../6_stu/login_stu.php");//stu
		else if ($i == 1) linkto("../5_prof/professor-class.php");//prof
		else {linkto("../4_admin/admin.php");}//admin
?>
