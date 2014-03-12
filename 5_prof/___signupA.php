<? session_start(); ?>
<html>
	<head>
	<meta http-equi="content-type" content="text/html;charset=utf-8">
  		<link href="../css/phpMM.css" rel="stylesheet" type="text/css" />
	</head>

<body>
	<div id="content">
	<h1>Log In</h1>
	<form id="login_form" action="professor-class.php" method="POST">
		<fieldset>
			<label for="username">Name:</label>    
			<input type="text"  name="username" id="username" size="20"/>
		        <br />
		        <label for="password">Password:</label>
		        <input type="password"  name="password" id="password" size="20" />
		        <br />
			<label for="dept">Student or not:</label>
			<select size="2" name="user_list">
				<option selected>Yes</option>
				<option>No</option>
			</select>
		        <br />
			<label for="dept">Your Deparment:</label>
			<input type="text"  name="dept" id="dept" size="20"/>


		</fieldset>
			
		<br />
		<?
		$_SESSION['id'] = $username;
		?>
		
		<fieldset class="center">
		<input type="submit"   value="Sign up"  />
		</fieldset>
	</div>
</body>
</html>
