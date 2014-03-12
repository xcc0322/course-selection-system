<html>
	<head>
  		<link href="../css/phpMM.css" rel="stylesheet" type="text/css" />
	</head>

<body>

<?php
//signup_prof
	require_once "../scripts/_database_connection.php";
	$ID = $_REQUEST['ID'];
	$pw = $_REQUEST['pw1'];
	$pw2 = $_REQUEST['pw2'];
	$name = $_REQUEST['name'];
	$dept_id = $_REQUEST['dept'];
	
	for ($i=2; $i>=0; $i--)
        	if(foo($ID, $i)) 
			back("ID has been signed.");


	if($ID != null && $pw != null && $name != null && $dept_id != null && $pw2 != null && $pw == $pw2)
	{
		$result = mysql_fetch_array(mysql_query("select count(*) from department where did = {$dept_id};"));
		if ($result[0] == 0)
		back("Sorry, your department doesn't exist in the system!");
        	$sql = "insert into professor (pid,password,name,did) values ('$ID',ENCODE('$pw', 'godisagirl'), '$name', '$dept_id')";
        	if(mysql_query($sql)) back("Success");
		else back("Failure");
	}
	else if($ID != null && $pw != null && $name != null && $dept_id != null && $pw2 != null) back("Typed different passwords");
	else back("Incomplete Information");
?>
</body>
</html>
