<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/login.css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/welcome.css" media="all"/>
<title> Welcome Admin</title>
</head>
<body> 
<div id="container">
<div id="container1">
<?php 
session_start();
include 'admin_header.php';
?>
<div class="text">
<h2>List of all Events</h2><br />
<p>
<table style="width:90%; margin-left:5%">
<tr>
<td>Title</td>
<td>Date</td>
<td>Description</td>
<td>Edit</td>
<td style="border-right:none;">Delete</td>
</tr>
<?php
include '../users_connectivity.php';
$query="select * from event";
	$result=mysql_query($query);
	while($data=mysql_fetch_array($result))
	{
	$j=$data["title"];
	$k=$data["date"];
	$l=$data["des"];
	?>
	<tr>
<td><?php echo $j; ?></td>
<td><?php echo $k; ?></td>
<td style="width:50%"><?php echo $l; ?></td>
<td>
<form action="#" method="post">
<input style="margin-left:20px; margin-top:40%;" type="submit" name="edit" value="Edit" >
<input type="hidden" name="edit_hide" value="<?php echo @$data[0]; ?>" >
</form>
</td>
<td style="border-right:none;">
<form  action="#" method="post"><br />
<input style="margin-left:20px; margin-top:19%;" type="submit" name="delete" value="Delete" >
<input type="hidden" name="edit_hide1" value="<?php echo @$data[0]; ?>" >
</form>
</td>
</tr>
<?php
if($_POST['delete']=='Delete')
{
	
	$pq=$_POST['edit_hide1'];
	$query="select * from event where title='$pq'";
	$result=mysql_query($query);
	while($data=mysql_fetch_array($result))
	{	
	echo "<script>window.location='event.php';</script>";
	mysql_query("DELETE FROM event WHERE title='$pq'");	
	}
}
if($_POST['edit']=='Edit')
{
	
	$pq=$_POST['edit_hide'];
	$_SESSION['p']=$pq;
	echo "<script>window.location='edit_event.php';</script>";	
	}
	}
?>
</table>
</p>
<h2 style="margin-top:7%">Upcoming Events/Activities</h2><br />
<p>
<form action="#" method="post">
<input type="text" name="title" placeholder="  Event Title" /><br /><br />
<input type="text" name="date" placeholder="  Event Date" /><br /><br />
<select style="background-color: beige;width: 16%;height: 22px;border-radius: 6px;margin-bottom: -11px;margin-left: 2px;" name="lang" required> 
 <option value="">Language</option>
 <option value="hindi">Hindi</option>
 <option value="english">English</option>   
 </select><br /><br />
<textarea style="height:auto; width:auto;" cols="35" rows="10" name="des" placeholder=" Description"></textarea><br /><br />
<input type="submit" value="Update" name="update" />
</form>
</p>
<?php
include '../users_connectivity.php';
if($_POST['update']=='Update')
{
	$a=$_POST['title'];
	$b=$_POST['date'];
	$c=$_POST['des'];
	$de=$_POST['lang'];
	$sql="insert into event values('$a','$b','$c','$de')";
	$check=mysql_query($sql);
	if($check)
	{
		echo "<script>alert('Event has been Successfully Updated..!! ');</script>";
		echo "<script>window.location='event.php';</script>"; 
	}
	else
	{
		echo "<script>alert('Event not updated yet..!!');</script>";
	}
}
?>
</div>
<div class="main_img">
<img src="images/jaigaumata.jpg"  />
<img src="images/krishna.jpg"  />
</div>
</div>
</div>
</body>
</html>
