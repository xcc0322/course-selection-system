<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	unset($_SESSION['id']);
	echo 'logout......';
	echo '<meta http-equiv=REFRESH CONTENT=1;url=../index.html>';
?>
