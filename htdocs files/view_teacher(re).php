<?php
echo"
<html>
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
	echo"<center>";
	echo "<table style='box-shadow:1px 1px 10px;border-radius:15px;'><form action='view_feedback.php' method='POST'>";
	
	for($i=1;$i<=3;$i++)
	{
		$y=mysql_fetch_array(mysql_query("SELECT * from `courses` where `semester` = '$i'"));
		$j=1;

		echo "<tr style='background-color:#ADD8E6'><td>SEMESTER $i :</td>";
		while($y['course'.$j.'']!='')
		{
			$t=$y['course'.$j.''];
			echo "<td><button name='course' type='submit' value='$t'>$t</button></td>";
			$j++;
		}
		echo "</tr>";
	}

	echo"</form></table>";
	echo"</center>";

?>
