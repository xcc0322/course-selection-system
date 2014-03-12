
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
		$result = mysql_query("select decode(password,'godisagirl')   from professor where pid='$ID';");
       		$row = @mysql_fetch_row($result);
		if($row[0]==$pw_o&&$pw_n ==$pw_n2){
			if (foo($ID,2))	$sql = mysql_query("update admin set password=encode('$pw_n','godisagirl') where aid='$ID';");

        		$sql = "update professor set password=encode('$pw_n','godisagirl'),name = '$name' where pid='$ID';";
        		if(mysql_query($sql)) {                 
               	 		back('Successfully revised your Info!');
			}
			else {
				back('Failure!');
			}
		}
		else if ($row[0]!=$pw_o) {
				back('Wrong old password!');
		}
		else {
				back('Different typing!');
		}
	}
        $sql = "update professor set name='$name' where pid='$ID' ";
        if(mysql_query($sql))
        {                      
               back('Successfully revised your name!');
        }
        else
        {        
	       back('Failure!');
        }
}
else
{
        back("You can't see the system !");
}
?>
