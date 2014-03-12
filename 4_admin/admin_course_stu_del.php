<?php

	require_once "../scripts/database_connection.php";

?><html>
	<head>
  		<link href="../css/phpMM.css" rel="stylesheet" type="text/css" />
	</head>

<body style = "text-align:center">
	<div id="content">
	<h1>Student List of  <?php echo $_SESSION['course_id'];?></h1>
			<table border = "0" align = "center">
				<td><td>
	<p>Students in this class:</p>
	<form action="admin_course_stu_del.php" method="post">
		<select size="10" name="crs[]" multiple>
<?php

	if($_POST){
		$cid = $_SESSION['course_id'];

	if($_POST && gettype($_POST["del"])=='array'){
		foreach($_POST["del"] as $i){
		$id = substr($i,0,strpos($i," "));
		$sql2 = "DELETE FROM take WHERE cid='$cid' and sid = '$id';";
		$result = mysql_query($sql2);
    		}
	}

    		$sql = "SELECT S.sid,S.name,S.did from student S,take T where S.sid = T.sid and T.cid='{$cid}';";
		$result = mysql_query($sql);
		while($row = mysql_fetch_array($result)){
			echo "<option>".$row['sid']."   ".$row['name']."   ".$row['grade']."</option>";
  		  }
	}
?>
		</select>
				</td>
				<td>
	</form>

	<p>Students out of this class:</p>
	<form action="admin_course_stu_add.php" method="post">
		<select size="10" name="crs[]" multiple>
<?php
	if($_POST){
		$sql = " SELECT SS.sid,SS.name,SS.did from student SS where 0 = 
			(SELECT count(*) from student S,take T where S.sid = T.sid and T.cid='{$cid}' and S.sid = SS.sid) ";
		$result = mysql_query($sql);
		while($row = mysql_fetch_array($result)){
			echo "<option>".$row['sid']."   ".$row['name']."   ".$row['grade']."</option>";
  		  }
	}
?>
		</select>
				</td></tr>
			
	</form>
	</div>

<form name="form">
<a href="admin.php">back</a>
</form>
</body>
</html>
