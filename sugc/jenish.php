<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<?php
if(isset($_GET["action"]))
{
	$rollno=$_GET["rollno"];
	$cn=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($cn,"jekky");
	$sql="SELECT * FROM `student` WHERE `rollno`='$rollno'";
	$result=mysqli_query($cn,$sql);
	$row=mysqli_fetch_row($result);
	mysqli_close($cn);
}
?>
<body>
<form id="form1" name="form1" method="post" action="pjenish.php">
  <label>Roll No :-
  <input name="txtrollno" type="text" value="<?php if(isset($row[0])) echo $row[0];?>"/>
  </label>
  <p>
    <label>Name :-
    <input name="txtname" type="text" value="<?php if(isset($row[1])) echo $row[1];?>" />
    </label>
</p>
  <p>
    <label>City :-
    <input name="txtcity" type="text" value="<?php if(isset($row[2])) echo $row[2];?>" />
    </label>
</p>
  <p>
    <label>Email :-
    <input name="txtemail" type="text" value="<?php if(isset($row[3])) echo $row[3];?>" />
    </label>
</p>
  <p>
    <label>
    <input name="Submit" type="submit"  value="Insert" />
   
    <input name="Submit" type="submit" id="Submit" value="Update" />

    <input name="Submit" type="submit" id="btnDelete" value="Delete" />
</label>
  </p>
  <table width="504" height="41" border="1">
    <tr>
      <td width="87">Roll No </td>
      <td width="87">Name</td>
      <td width="87">City</td>
      <td width="87">Email</td>
      <td width="87">&nbsp;</td>
      <td width="87">&nbsp;</td>
    </tr>
	<?php
		$cn=mysqli_connect("localhost","root","");
		$db=mysqli_select_db($cn,"jekky");
		$sql="SELECT * FROM `student`";
		$result=mysqli_query($cn,$sql);
		
		while($row=mysqli_fetch_row($result))
		{
			echo "<tr>";
			echo "<td>$row[0]</td>";
			echo "<td>$row[1]</td>";
			echo "<td>$row[2]</td>";
			echo "<td>$row[3]</td>";
			echo "<td><a href='jenish.php?rollno=$row[0]&action=Select'>Select</a></td>";
			echo "<td><a href='pjenish.php?rollno=$row[0]&action=Delete'>Delete</a></td>";
			echo "</tr>";
		}
		mysqli_close($cn);
	?>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>
