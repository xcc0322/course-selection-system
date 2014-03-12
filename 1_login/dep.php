<?php
//dept list
?>
<html>
	<head>
  		<link href="../css/phpMM.css" rel="stylesheet" type="text/css" />
	</head>
<body>
	<div id="content">
	<h1>Department ID List</h1>

<table border = "1" align = "left">
    <tr>
        <th>Name</th>
        <th>Deparment ID</th>
    </tr>

<?php
	require_once "../scripts/database_connection.php";
    	$sql = 'SELECT * from department';
	$result = mysql_query($sql);
	$test = "123";

	while($row = mysql_fetch_array($result)){
		echo "<tr>";
           	echo "<td>".$row['name']."</td>";
            	echo "<td>".$row['did']."</td>";
    		echo "</tr>";
    	}
?>
</table>
</div></body></html>

