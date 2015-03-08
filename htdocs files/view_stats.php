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
	echo "<center>TOTAL STUDENTS ENROLLED IN ALL COURSES: $total </center>";
	echo "<center>TOTAL FEEDBACKS GIVEN IN ALL COURSES:".($count[1] + $count[2] + $count[3])." </center>";
	echo "<center>NUMBER OF FEEDBACKS GIVEN, SEMESTER-WISE: <br> SEMESTER 1: $count[1] <br> SEMESTER 2: $count[2]<br> SEMESTER 3: $count[3] </center>";

?>