<?php

require_once "../scripts/database_connection.php";
if($_SESSION['id'] != null)
{
	$id = $_SESSION['id'];


        $sql = "SELECT * FROM professor where pid='$id'";
        $result = mysql_query($sql);
	$row = mysql_fetch_row($result);
}
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<html>
	<head>
  		<link href="../css/phpMM.css" rel="stylesheet" type="text/css" />
	</head>
<body>
	<h1>Update Professor Info</h1>
	<form name = "form" action="update_finish.php" method="POST">
		<fieldset>
			<table border = "0" align = "left">
				<tr>
					<td>ID:</td>
					<td><?php echo "$row[0]";?></td>
				</tr>
				<tr>
					<td>Old password:</td>
					<td><?php echo "<input type=\"password\" name=\"pw_o\" value=\"\" /> <br>"; ?> </td>
				</tr>
				<tr>
					<td>New password:</td>
					<td><?php echo "<input type=\"password\" name=\"pw_n\" value=\"\" /> <br>"; ?> </td>
				</tr>
				<tr>
					<td>Repeat password:</td>
					<td><?php echo "<input type=\"password\" name=\"pw_n2\" value=\"\" /> <br>"; ?> </td>
				</tr>
				<tr>
					<td>Name:</td>
					<td><?php echo "<input type=\"text\" name=\"name\" value=\"$row[2]\" /> <br>"; ?> </td>
				</tr>
				<tr>
					<td>Department:</td>
					<td><?php echo "$row[3]";?></td>
				</tr>
			</table>
		</fieldset>

		<fieldset class="center">
		<input type="submit"  value="Update" />
		</fieldset>
	</form>
</body>
</html>
