
<!--�W��y�k���ҥ�session�A���y�k�n��b�����̫e��-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//�s����Ʈw
//�u�n�������W���Ψ�s��MySQL�N�ninclude��
	require_once "database_connection.php";

//�N��Ʈw�̦ۤv���ҵ{�����ܦb�e���W
$result = mysql_query("select *   from take  where sid='$ID' ");
$row = mysql_fetch_row($result);

$result2 = mysql_query("select *   from course  where cid='$row[1]' ");


echo "�Ҧ��ҵ{��Ʀp�U�G<br>";

while($row2 = mysql_fetch_row($result2))
    {
  echo "$row[0] - year : $row[1], " . 
 "course : $row[2], credit : $row[3],hours : $row[4],type: $row[5],size_limit :  $row[6],"
"class_time :  $row[7],  classroom :   $row[8],      department_id  : $row[9], grade : $row[10]"<br>";                                           
    }
?>

<form name="form">
<a href="login_stu.php">back</a>
</form>
