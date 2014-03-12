<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
require_once "../scripts/database_connection.php";
$ID = $_SESSION['id'];
$pw_o =isset( $_POST['pw_o']) ? $_POST['pw_o']  : '';
$pw_n =isset( $_POST['pw_n']) ? $_POST['pw_n']  : '';
$pw_n2 =isset( $_POST['pw_n2']) ? $_POST['pw_n2']  : '';
$name =isset( $_POST['name']) ? $_POST['name']  : '';


if($_SESSION['id'] != null )
{
        $ID = $_SESSION['id'];
        if($pw_o!= null&& $pw_n!= null) {
		$result = mysql_query("select decode(password,'godisagirl')   from student where sid='$ID';");
       		$row = @mysql_fetch_row($result);
		if($row[0]==$pw_o&&$pw_n ==$pw_n2){
	if (foo($ID,2))	$sql = mysql_query("update admin set password=encode('$pw_n','godisagirl') where aid='$ID';");
        		$sql = "update student set password=encode('$pw_n','godisagirl'),name = '$name' where sid='$ID';";
        		if(mysql_query($sql)) {                 
               	 		echo 'Successfully revised your Info!';
				echo '<meta http-equiv=REFRESH CONTENT=2;url=login_stu.php>';
				exit;
			}
			else {
				echo 'Failure!';
				echo '<meta http-equiv=REFRESH CONTENT=2;url=login_stu.php>';
				exit;
			}
		}
		else if ($row[0]!=$pw_o) {
				echo 'Wrong old password!';
				echo '<meta http-equiv=REFRESH CONTENT=2;url=login_stu.php>';
				exit;
		}
		else {
				echo 'Different typing!';
				echo '<meta http-equiv=REFRESH CONTENT=2;url=login_stu.php>';
				exit;
		}
	}
        $sql = "update student set name='$name' where sid='$ID' ";
        if(mysql_query($sql))
        {                      
               echo 'Successfully revised your name!';
               echo '<meta http-equiv=REFRESH CONTENT=2;url=login_stu.php>';
		exit;
        }
        else
        {        
	       echo 'Failure!';
               echo '<meta http-equiv=REFRESH CONTENT=2;url=login_stu.php>';
		exit;
        }
}
else
{
        echo "You can't see the system !";
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.html>';
	exit;
}
?>
