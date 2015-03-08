<?php
	
	session_start();
	$conn=mysql_connect("localhost", "root" , "");
	$con=mysql_select_db("database",$conn);

	if($con->connect_error)
		{die("Connection failed! <br>" . $con->connect_error);}

	echo "Hi ".$_SESSION['webmail']."!<br><br>";
	echo "<a href='t.php'><small>log-out</small></a> <br><hr>";


	echo"<center><h1><a href=''>VIEW ALL COURSE FEEDBACKS</a></h1>
		 <h1><a href=''>MODIFY QUESTIONNAIRE</a></h1>
		 <h1><a href=''>ADD COURSE</a></h1>
		 <h1><a href='view_stats.php'>VIEW STATISTICS</a></h1>
		 </center>";


?>