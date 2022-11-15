<?php
if(isset($_GET["action"]))
{
	$rollno=$_GET["rollno"];
	$action=$_GET["action"];
}
else
{
	$rollno=$_POST["txtrollno"];
	$name=$_POST["txtname"];
	$city=$_POST["txtcity"];
	$email=$_POST["txtemail"];
	$action=$_POST["Submit"];
	echo $action;
}

$cn=mysqli_connect("localhost","root","");
if($cn)
{
	echo "Connecrtion Successfully...<br>";
	$db=mysqli_select_db($cn,"jekky");
	if($db)
	{
		echo "DB Connected....<br>";
		if($action=="Insert")
		{
			$sql="INSERT INTO `student`(`rollno`, `name`, `city`, `email`) VALUES ('$rollno','$name','$city','$email')";
		}
		
		else if($action=="Update")
		{
			$sql="UPDATE `student` SET `name`='$name',`city`='$city',`email`='$email' WHERE `rollno`='$rollno'";
		}
		else if($action=="Delete")
		{
			$sql="DELETE FROM `student` WHERE `rollno`='$rollno'";
		}
		
		echo $sql."<br>";
		$result=mysqli_query($cn,$sql);
		if($result)
		{
			echo "$action Successfullt.....<br>";
			header('location:./jenish.php');
		}
		else
		{
			echo "$action Not Successfully.....<br>";
		}
		
	}
	else
	{
		echo "DB Not Connected...<br>";
	}
}
else
{
	echo "Connectio not successfully...<br>";
}
mysqli_close($cn)
?>