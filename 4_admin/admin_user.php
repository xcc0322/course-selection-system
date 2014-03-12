

<?php
	require_once "../scripts/database_connection.php";
	if($_POST){
		$i = $_POST['del'];
		$table[0] = "student";
		$table[1] = "professor";
		$table[2] = "admin";
		$idname[0] = "sid";
		$idname[1] = "pid";
		$idname[2] = "aid";
		$id = substr($i,0,strpos($i," "));
		//echo $id;
		for ($i=2; $i>=0; $i--)
			if(foo($id, $i)) {
				//echo $i;
				$row = mysql_fetch_array(mysql_query("select count(*) from admin"));
				if ($i==2 && $row[0] == 1) back("Caution: the last administrator!!");
				else mysql_query("DELETE FROM {$table[$i]} WHERE {$idname[$i]}='$id';");
			}
	}
?>

<html>
	<head>
  		<link href="../css/phpMM.css" rel="stylesheet" type="text/css" />
	</head>
<script>
function sm2()
    {
    document.form1.action="user_pw.php";
    document.form1.submit();
    }
    
    function sm3()
    {
    document.form1.action="user_id.php";
    document.form1.submit();
    }
    function sm4()
    {
    document.form1.action="user_sus.php";
    document.form1.submit();
    }
</script> 

<body style = "text-align:center">
	<div id="content">
	<h1>User Management</h1>
	<form action = "admin_user.php" method = "post" name = "form1" id = "form1">
	<select size="10" name="del">
		<?php
			$result = mysql_query("select sid,name from student");
			while($row = mysql_fetch_array($result)){
				echo "<option>".$row['sid']."   ".$row['name']."(Student)";
				if (foo($row['sid'],2)) echo "(admin)"."</option>";
				else echo"</option>";
  		  	}

			$result = mysql_query("select pid,name from professor");
			while($row = mysql_fetch_array($result)){
				echo "<option>".$row['pid']."   ".$row['name']."(Professor)";
				if (foo($row['pid'],2)) echo "(admin)"."</option>";
				else echo"</option>";
			}

			$result = mysql_query("select aid from admin");
			while($row = mysql_fetch_array($result)){
				if(!foo($row['aid'],0) && !foo($row['aid'],1))
				echo "<option>".$row['aid']."  (Admin)"."</option>";
			}		
		?>
	</select>
	</br></br>
	<input type = "submit" value = "Delete this User"></input></br></br>
	<input type = "button" onClick = "sm2()" value = "Change the password to"></input>
	<input type = "text" name = "newpw" value = ""></input></br></br>
	<input type = "button" onClick = "sm3()" value = "Toggle the identity"></input></br></br>
	<input type = "button" onClick = "sm4()" value = "Suspend the user"></input></br></br>

	<p>Caution! A pure administrator would be deleted if toggled!</p>
	</form>
	</div>
</body>
</html>
