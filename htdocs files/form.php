<?php
session_start();
$conn=mysql_connect("localhost", "root" , "");
$con=mysql_select_db("database",$conn);

if($con->connect_error)
	{die("Connection failed! <br>" . $con->connect_error);}

$coursename = $_POST['course'];
$_SESSION['course']=$_POST['course'];
$name=$_SESSION['webmail'];


$x=mysql_query("SELECT * from `$coursename` where `Username` = '$name'");

if($a=mysql_fetch_array($x)!=0)
	die(
		"YOU HAVE ALREADY SUBMITTED FEEDBACK FOR THIS COURSE <br><hr>
		<br><a href='profile.php'> Go back to profile </a>"
		);
echo "
<html>
	<head>
	</head>

		<body>
			

			<div id='header' style='height:150px;border:solid;background-color:yellow;'><center>HEADER</center></div>
			<div id='side-bar' style='float:left;width:125px;height:100%;background-color:red;'>SIDEBAR</div>
			<div id='content' style='float:left;width:89.5%;height:100%;'>
				<form action='give_feedback.php' method='POST'>
				<table style='border:solid;'>
					<tr>
						<th style='width:50px; border:solid;'>
						S.NO.	
						</th>
						<th style='width:600px; border:solid;'>
						QUESTION
						</th>
						<th style='width:100px; border:solid;'>
						1
						</th>
						<th style='width:100px; border:solid;'>
						2
						</th>
						<th style='width:100px; border:solid;'>
						3
						</th>
						<th style='width:100px; border:solid;'>
						4
						</th>
						<th style='width:100px; border:solid;'>
						5
						</th>
					</tr>";

				$y=mysql_fetch_array(mysql_query("SELECT COUNT(*) from questions"));
				$qno=$y[0];
				for($i=1;$i<=$qno;$i++)
				{
					$t=mysql_query("SELECT * FROM `questions` where `S.no` = $i");
					$temp=mysql_fetch_array($t);
					echo "
					<tr>
						<td style='width:50px; border:solid;'>
						".$i."	
						</td>
						<td style='width:600px; border:solid;'>
						".$temp['Ques']."
						</td>
						<td style='width:100px; border:solid;'>
						<input type='radio' name='".$i."' value='1'>
						</td>
						<td style='width:100px; border:solid;'>
						<input type='radio' name='".$i."' value='2'>
						</td>
						<td style='width:100px; border:solid;'>
						<input type='radio' name='".$i."' value='3'>
						</td>
						<td style='width:100px; border:solid;'>
						<input type='radio' name='".$i."' value='4'>
						</td>
						<td style='width:100px; border:solid;'>
						<input type='radio' name='".$i."' value='5'>
						</td>
					</tr>";
				}

			echo "
				</table>
				
				<center>
				<input type='reset' value='Reset'>
				<input type='submit' value='Submit'>
				</center>
				</form>
			</div>
		</body>
</html>";
?>