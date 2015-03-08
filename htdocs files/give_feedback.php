<?php
session_start();
$conn=mysql_connect("localhost", "root" , "");
	$con=mysql_select_db("database",$conn);

	if($con->connect_error)
		{die("Connection failed! <br>" . $con->connect_error);}

$course=$_SESSION['course'];
$name=$_SESSION['webmail'];

$y=mysql_fetch_array(mysql_query("SELECT COUNT(*) from questions"));
$qno=$y[0];
$x = "INSERT INTO $course (Username) VALUES ('$name')";
mysql_query($x);
for($i=1;$i<=$qno;$i++)
{
	$y = "UPDATE $course SET Q$i = '$_POST[$i]' WHERE Username = '$name'";
	mysql_query($y);
}

echo "YOUR RECORD HAS BEEN UPLOADED! <a href='profile.php'>Go back to profile</a>";
?>