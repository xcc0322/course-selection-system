
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
	<head>
  		<link href="../css/phpMM.css" rel="stylesheet" type="text/css" />
	</head>
<body>

	<div id="content">
	<h1>Student</h1>
	<ul>
<?php

require_once "../scripts/database_connection.php";


	$sid = $_SESSION['id'];
$sql = "select cid, info from notification where sid = '$sid';";
$res = mysql_query($sql);
		while($row=mysql_fetch_array($res)) {
			$temp = $row['info'];
			echo "<script>alert(\"{$temp}\");</script>";
			$temp = $row['cid'];
			$sql = "delete from notification where sid = '$sid' and cid = '$temp';";
			mysql_query($sql);
		}



   	echo '<li><a href="search.php">search</a> </li>';
        echo '<li><a href="update.php">Personal data update </a></li>';
        echo '<li><a href="course_p.php">Course result </a></li>';
        echo '<li><a href="course_p_pre.php">Chosen course </a></li>';
	echo '<li><a href="course_all.php">all course</a></li>';

        echo '<li><a href="course_choose.php">choose a course </a></li>';
        echo '<li><a href="course_drop.php">drop a course</a></li>';
        echo '<li><a href="course_add.php">add a course</a> </li>';
        echo '<li><a href="course_quit.php">quit a course</a> </li>';
	echo '<li><a href="logout.php">logout</a></li>';

?>
	</ul>
	</div>
</body>
</html>





