<html>
	<head>
  		<link href="../css/phpMM.css" rel="stylesheet" type="text/css" />
	</head>

<body>

<?php
//signup_admin
	require_once "../scripts/_database_connection.php";
	$ID = $_REQUEST['ID'];
	$pw = $_REQUEST['pw1'];
	$pw2 = $_REQUEST['pw2'];

	for ($i=2; $i>=0; $i--)
        	if(foo($ID, $i)) 
			back("ID has been signed.");
		

	if($ID != null && $pw != null && $pw2 != null && $pw == $pw2)
	{
        $sql = "insert into admin (aid,password) values ('$ID',  ENCODE('$pw', 'godisagirl'))";
        	if(mysql_query($sql)) back("Success");
		else back("Failure");
	}
	else if($ID != null && $pw != null && $pw2 != null ) back("Typed different passwords");
	else back("Incomplete Information");
?>
</body>
</html>
