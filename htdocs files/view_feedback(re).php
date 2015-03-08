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

	echo "<a href='t.php'><small>log-out</small></a> <br><hr>";
	$a=$_POST['course'];
	$x=mysql_query("SELECT * FROM $a");
	
	$y=mysql_fetch_array(mysql_query("SELECT COUNT(*) from questions"));
	$qno=$y[0];
	echo"<center>";
	echo"<table style='box-shadow:1px 1px 10px;border-radius:15px;'>";
	while($t=mysql_fetch_array($x))
	{
		echo "<tr style='background-color:#ADD8E6'><td>$t[Username]</td>";
		for($j=1;$j<=$qno;$j++)
			{
				$f=$t['Q'.$j.''];
				echo"<td>".$f."</td>";}
		echo"</tr>";
	}
	echo"</table>";
	echo"</center>";
?>
