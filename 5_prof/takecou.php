<html><head>
<meta http-equi="content-type" content="text/
html;charset=utf-8">
<title>takecou</title></head>
<body>
<h1> student list</h1>
<?php
require_once "../scripts/database_connection.php";
$trncode=$_GET['trncid'];
//echo "is".$trncode."??";
?>

<TABLE border=3>
<?php
$sqlAA="select * from take where cid='$trncode'";
$sql2AA=mysql_query($sqlAA);
echo "<table border='3'>";
echo "<tr><td><b>cid</b></td>";
echo "<td><b>pid</b></td></tr>";

while($list3AA=mysql_fetch_array($sql2AA))
{
echo "<tr><td>".$list3AA['cid']."</td>";
echo "<td>".$list3AA['sid']."</td>";
} 
echo "</table>";
?>

<?
//echo "cid=".$trncode;
//$trncid=$list3['cid'];

?>


</body></html>

