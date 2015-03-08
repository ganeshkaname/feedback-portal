<?php
$user = 'root';
$pass = '';
//$db = 'ra07';
$connection = mysql_connect('localhost', $user, $pass) or die("Couldn't connect to the server!");
mysql_select_db('ra07', $connection) or die("Couldn't connect to the database!");
error_reporting(0);
if($_POST['Login']){
	if($_POST['username'] && $_POST['password']){
		$username = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string($_POST['password']);
		//$password = mysql_real_escape_string(hash("sha512",$_POST['password']));
		$user = mysql_fetch_array(mysql_query("SELECT * FROM `users1` WHERE `Username` = '$username'"));
		if($user == '0'){
			die("That username dosen't exist!");
		}
		if($user['Password'] != $password){
			die("Incorrect password! <a href='student.php'>Back</a>");
		}
		
		die("YOU ARE LOGGED IN");
	}
}
		
echo "
<body style='font-family: verdana, sans-serif;'>
	<div style='width: 80%; padding: 5px 15px 5px; border: 1px solid #e3e3e3; background-color: #fff; color: #000;' >
		<h1>Login</h1>
		<br />
		<form action='' method='post'>
			<table>
				<tr>
					<td>
						<b>Username:</b>
					</td>
					<td>
						<input type='text' name='username' style='padding: 4px;' />
					</td>
				</tr>
				<tr>
					<td>
						<b>Password:</b>
					</td>
					<td>
						<input type='password' name='password' style='padding: 4px;' />
					</td>
					</tr>
					<tr>
						<td>
							<input type='submit' name='Login'
							value='Login' />
						</td>
					</tr>
				</table>
			</form>
			<br />
			<h6>
				No Account? <a href='register.php'>Register!</a>
			</h6>
		</div>
	</body>


";

?>