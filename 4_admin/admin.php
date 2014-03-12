<html>
	<head>
  		<link href="../css/phpMM.css" rel="stylesheet" type="text/css" />
	</head>

<body>
	<div id="content">
	<h1>Admin</h1>
	<li><a href = "admin_user.php">User Management</a></li>
	<li><a href = "admin_course.php">Course Management</a></li>
<?php
	include "../scripts/database_connection.php";

	$table[0] = "student";
	$table[1] = "professor";
	$table[2] = "admin";
	$idname[0] = "sid";
	$idname[1] = "pid";
	$idname[2] = "aid";
	$ID = $_SESSION['id'];
	if(foo($ID, 0)) echo"<li><a href = \"../6_stu/login_stu.php\">Log as a Student</a></li>";
	else if (foo($ID, 1)) echo"<li><a href = \"../5_prof/professor-class.php\">Log as a Professor</a></li>";
?>
	</div>
</body>
</html>
