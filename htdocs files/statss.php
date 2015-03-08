<!Doctype html>
<html>
<head>
<style>
body {
	background:url(back.jpeg);
}
</style>
</head>
<body>
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

<?php
	
	session_start();
	$conn=mysql_connect("localhost", "root" , "");
	$con=mysql_select_db("database",$conn);

	if($con->connect_error)
		{die("Connection failed! <br>" . $con->connect_error);}

	echo "<a href='t.php'><small>log-out</small></a> <br><hr>";

	$x=mysql_fetch_array(mysql_query("SELECT COUNT(*) from credentials where 'Type'=''"));
	$total=$x[0];

	$count=array(3);
	for($i=1;$i<=3;$i++)
	{
		$y=mysql_fetch_array(mysql_query("SELECT * from courses where 'semester'='$i'"));
		$j=1;
		$count[$i]=0;
		while($y['course$j']!='')
		{
			$t=$y['course$j'];
			$z=mysql_fetch_array(mysql_query("SELECT COUNT(*) from '$t'"));
			$count[$i]+=$z[0];
			$j++;
		}
		

	}
	echo "
	<table style='box-shadow:1px 1px 10px;border-radius:15px;'>
				<center>
					<tr style='background-color:#20B2AA'>
						<th style='width:50px;'>
						S.NO.	
						</th>
						<th style='width:650px;'>
						about
						</th>
						<th style='width:100px;'>
						stats
						</th>
					</tr>
					<tr style='background-color:#20B2AA'>
						<th style='width:50px;'>
						1.	
						</th>
						<th style='width:650px;'>
						TOTAL STUDENTS ENROLLED IN ALL COURSES
						</th>
						<th style='width:100px;'>
						$total
						</th>
					</tr>
					<tr style='background-color:#20B2AA'>
						<th style='width:50px;'>
						2.	
						</th>
						<th style='width:650px;'>
						TOTAL FEEDBACKS GIVEN IN ALL COURSES
						</th>
						<th style='width:100px;'>
						".($count[1] + $count[2] + $count[3])."
						</th>
					</tr>
					<tr style='background-color:#20B2AA'>
						<th style='width:50px;'>
						3.	
						</th>
						<th style='width:650px;'>
						NUMBER OF FEEDBACKS GIVEN, SEMESTER-WISE
						</th>
						<th style='width:100px;'>
						
						</th>
					</tr>
					<tr style='background-color:#20B2AA'>
						<th style='width:50px;'>
						A.	
						</th>
						<th style='width:650px;'>
						SEMESTER 1
						</th>
						<th style='width:100px;'>
						$count[1]
						</th>
					</tr>
					<tr style='background-color:#20B2AA'>
						<th style='width:50px;'>
						B.	
						</th>
						<th style='width:650px;'>
						SEMESTER 2
						</th>
						<th style='width:100px;'>
						$count[1]
						</th>
					</tr>
					<tr style='background-color:#20B2AA'>
						<th style='width:50px;'>
						C.	
						</th>
						<th style='width:650px;'>
						SEMESTER 3
						</th>
						<th style='width:100px;'>
						$count[1]
						</th>
					</tr>
					
				</center>
	";
	

?>
</body>
</html>