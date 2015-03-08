<?php
echo"
<html>
<head>
<head>
	<style>
		body{
		
				background:url(back.jpeg); 
 
				}
	</style>
</head>
<body>
	<div style='padding-top:50px;padding-left:100px;padding-right:100px;'>
	<div style='box-shadow:1px 1px 10px;border-radius:15px;'>
			<div id='header' style='box-shadow:1px 1px 10px;border-radius:5px;height:190px;background-color:#F0F0F0;'>
			<table>
			<td style='padding-left: 15 px';><img src='logo-iitg.gif' width='200' height='180'></img></td>
			<td style='font-size:250%; font-family: sans-serif; text-shadow: 2px 2px #707070; text-align:left; color: #191970; padding-left: 30px;'><br>INDIAN INSTITUTE OF TECHNOLOGY<br>
			<img src='hindi-banner.gif' style='padding-bottom:30px;padding-left:0px;'></img></td>
			
			</table>
			</div>
			<br>
			<br>
			</body>
			</html>
			";
	session_start();
	$conn=mysql_connect("localhost", "root" , "");
	$con=mysql_select_db("database",$conn);

	if($con->connect_error)
		{die("Connection failed! <br>" . $con->connect_error);}

	if(isset($_SESSION)==0)
		die ("YOU ARE NOT LOGGED IN!");
	
	echo "Hi ".$_SESSION['webmail']."!<br><br>";
	echo "<a href='t.php'><small>log-out</small></a> <br><hr>";
	$sem=mysql_query("SELECT Course from credentials where Username = '" .$_SESSION['webmail']. "'");
	$b=mysql_fetch_array($sem);
	
	echo "You are currently enrolled in Semester ";
	echo $b['Course'];
	echo "<br>";

	$x=mysql_query("SELECT * from courses where semester='" .$b['Course']. "'");
	$a=mysql_fetch_array($x);

	echo "<center><table style='box-shadow:1px 1px 10px;border-radius:15px;'>
	<tr>
	<th><b>COURSE NAME</b></th>
	</tr>";
	
	echo "<form action='form.php' method='POST'>";
	
	
	for($i=1;;$i++)
	{
	$temp=$a['course'.$i.''];
	if($temp!='')
	 {
		echo "<tr style='background-color:#ADD8E6'>";
		echo "<td ><button name='course' type='submit' value='$temp'>$temp</button></th>";
		echo "</tr>";
	 }
	else break;
	}
?>