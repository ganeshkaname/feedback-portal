<!doctype html>
<html>
<head>
<style>
.error {color: #FF0000;}
p {
    padding-top: 2cm;
}

.fors {
    margin-left:auto;
    margin-right:auto;
    width: 343px;
    height: 600px;
    padding:30px;
    border: 1px solid rgba(0,0,0,.2);
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 5px;
    -moz-background-clip: padding;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    background: rgba(0, 0, 0, 0.5); 
    -moz-box-shadow: 0 0 13px 3px rgba(0,0,0,.5);
    -webkit-box-shadow: 0 0 13px 3px rgba(0,0,0,.5);
    box-shadow: 0 0 13px 3px rgba(0,0,0,.5);
    overflow: hidden; 
}
form{height: 800px;}
input {
    width: 250px;
    height: 30px;
    border: 1px solid rgba(255,255,255,.4);
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    border-radius: 4px;
    -moz-background-clip: padding;
    -webkit-background-clip: padding-box;
    background-clip: padding-box; 
    display:block;
    font-family: 'Source Sans Pro', sans-serif;
    font-size:18px;
    color:#fff;
    padding-left:20px;
    padding-right:20px;
    margin-bottom:20px;
}

input[type=submit] {
    cursor:pointer;
}

input.webmail {
	  background: rgba(255, 255, 255, 0.4) url(webmailicon.png) no-repeat scroll 16px 10px; 
	  padding-left:45px;
}

input.pass {
	  background: rgba(255, 255, 255, 0.4) url(passwordicon.png) no-repeat scroll 16px 10px;
	  padding-left:45px;
}
input.cap {
	  background: rgba(255, 255, 255, 0.4) url(messageicon.png) no-repeat scroll 16px 10px;
	  padding-left:45px;
}
input:focus, textarea:focus { 
	  background-color: rgba(0, 0, 0, 0.2);
    -moz-box-shadow: 0 0 5px 1px rgba(255,255,255,.5);
    -webkit-box-shadow: 0 0 5px 1px rgba(255,255,255,.5);
    box-shadow: 0 0 5px 1px rgba(255,255,255,.5);
	  overflow: hidden; 
}
.btn {
	  width: 138px;
	  height: 44px;
	  -moz-border-radius: 4px;
	  -webkit-border-radius: 4px;
	  border-radius: 4px;
	  float:center;
    border: 1px solid #253737;
    background: #416b68;
    background: -webkit-gradient(linear, left top, left bottom, from(#6da5a3), to(#416b68));
    background: -webkit-linear-gradient(top, #6da5a3, #416b68);
    background: -moz-linear-gradient(top, #6da5a3, #416b68);
    background: -ms-linear-gradient(top, #6da5a3, #416b68);
    background: -o-linear-gradient(top, #6da5a3, #416b68);
    background-image: -ms-linear-gradient(top, #6da5a3 0%, #416b68 100%);
    padding: 10.5px 21px;
    -webkit-border-radius: 6px;
    -moz-border-radius: 6px;
    border-radius: 6px;
    -webkit-box-shadow: rgba(255,255,255,0.1) 0 1px 0, inset rgba(255,255,255,0.7) 0 1px 0;
    -moz-box-shadow: rgba(255,255,255,0.1) 0 1px 0, inset rgba(255,255,255,0.7) 0 1px 0;
    box-shadow: rgba(255,255,255,0.1) 0 1px 0, inset rgba(255,255,255,0.7) 0 1px 0;
    text-shadow: #333333 0 1px 0;
    color: #e1e1e1;
}

.btn:hover {
    border: 1px solid #253737;
    text-shadow: #333333 0 1px 0;
    background: #416b68;
    background: -webkit-gradient(linear, left top, left bottom, from(#77b2b0), to(#416b68));
    background: -webkit-linear-gradient(top, #77b2b0, #416b68);
    background: -moz-linear-gradient(top, #77b2b0, #416b68);
    background: -ms-linear-gradient(top, #77b2b0, #416b68);
    background: -o-linear-gradient(top, #77b2b0, #416b68);
    background-image: -ms-linear-gradient(top, #77b2b0 0%, #416b68 100%);
    color: #fff;
 }

.btn:active {
    margin-top:1px;
    text-shadow: #333333 0 -1px 0;
    border: 1px solid #253737;
    background: #6da5a3;
    background: -webkit-gradient(linear, left top, left bottom, from(#416b68), to(#416b68));
    background: -webkit-linear-gradient(top, #416b68, #609391);
    background: -moz-linear-gradient(top, #416b68, #6da5a3);
    background: -ms-linear-gradient(top, #416b68, #6da5a3);
    background: -o-linear-gradient(top, #416b68, #6da5a3);
    background-image: -ms-linear-gradient(top, #416b68 0%, #6da5a3 100%);
    color: #fff;
    -webkit-box-shadow: rgba(255,255,255,0) 0 1px 0, inset rgba(255,255,255,0.7) 0 1px 0;
    -moz-box-shadow: rgba(255,255,255,0) 0 1px 0, inset rgba(255,255,255,0.7) 0 1px 0;
    box-shadow: rgba(255,255,255,0) 0 1px 0, inset rgba(255,255,255,0.7) 0 1px 0;
   }
body {


	background:url(back.jpeg);
}
</style>
</head>
<body
>
<?php 															//required field validation data
$webmailErr=$passErr="";
$webmail=$password="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["webmail"])) {
     $webmailErr = "webmail is required";
   } else {
     $webmail = test_input($_POST["webmail"]);
   }

   if (empty($_POST["password"])) {
     $passErr = "password is required";
   } else {
     $password = test_input($_POST["password"]);
   }
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>
<?php 														//connecting to the database
$user = 'root';
$pass = '';
//$db = 'ra07';
$connection = mysql_connect('localhost', $user, $pass) or die("Couldn't connect to the server!");
mysql_select_db('ganesh', $connection) or die("Couldn't connect to the database!");
error_reporting(0);
if($_POST['enter']){
	if($_POST['webmail'] && $_POST['password'] && $_POST['captcha']){
		$username = mysql_real_escape_string($_POST['webmail']);
		$password = mysql_real_escape_string($_POST['password']);
		$user = mysql_fetch_array(mysql_query("SELECT * FROM `webmail` WHERE `webmail` = '$username'"));
		if($user == '0'){
			die("That username dosen't exist!");
		}
		if($user['password'] != $password){
			die("Incorrect password! <a href='t.php'>Back</a>");
		}
		session_start();
		if($_POST['captcha'] != $_SESSION['digit']) die("Sorry, the CAPTCHA code entered was incorrect!");
		session_destroy();
		die("YOU ARE LOGGED IN");
	}
}
?>
<div style="padding-top:50px;padding-left:100px;padding-right:100px;">
<div style="box-shadow:1px 1px 10px;border-radius:15px;">
			<div id="header" style="box-shadow:1px 1px 10px;border-radius:5px;height:190px;background-color:#F0F0F0;">
			<table>
			<td style="padding-left: 15 px";><img src="logo-iitg.gif" width="200" height="180"></img></td>
			<td style="font-size:250%; font-family: sans-serif; text-shadow: 2px 2px #707070; text-align:left; color: #191970; padding-left: 30px;"><br>INDIAN INSTITUTE OF TECHNOLOGY<br>
			<img src="hindi-banner.gif" style="padding-bottom:30px;padding-left:0px;"></img></td>
			
			</table>
			</div>
			<br>
			<br>
<center>
<div>
<form action='' method='post'>
<div class="fors" style="box-shadow:1px 1px 10px;border-radius:15px;">
<h2 class="padding">LOGIN PAGE</h2>
<p style="padding-top:60px;"><span class="error">* required field.</span></p>
	<select id="type" style="border-radius:1px;">
	<optgroup>
	<option value="admin">Admin</option>
	<option value="student">Student</option>
	<option value="teacher">Teacher</option>
	</optgroup>
	</select><br><br>
	
	<input style="border-radius:2px;box-shadow:1px 1px 10px;"class="webmail" type="text" name="webmail" placeholder="Your Webmail">
	<span class="error">* <?php echo $webmailErr?></span>
	<br><br>
	
	<input style="border-radius:2px;box-shadow:1px 1px 10px;" class="pass" type="password" name="password" placeholder="Enter Password">
	<span class="error">* <?php echo $passErr?></span>
	<br><br>
	
	<img style="border-radius:2px;box-shadow:1px 1px 10px;" id="captcha" src="captcha.php" width="160" height="50" border="" alt="CAPTCHA">
	<a href="#" onclick="
	document.getElementById('captcha').src = 'captcha.php?' + Math.random();
	document.getElementById('captcha_code').value = '';
	return false;
	"><img src="refresh.jpeg" style="border-radius:10px;" border=0 height="20px" width="20px" id="imgRefresh" title="Refresh image"></a><br><br><br>
	
	<input style="border-radius:2px;box-shadow:1px 1px 10px;" id="captcha_code" onkeyup="this.value = this.value.replace(/[^\d]+/g, '');" class="cap" type="text" size="10" maxlength="5" name="captcha" value="" placeholder="Enter the number in the image">
	<div class="control-group" style="margin-top: 10px;">
	<br><input class="btn" type="button" name="enter" value="submit">
	<br>
	<br>
	</div>
</form>
</center>
</div>
</div>

</body>
</html>