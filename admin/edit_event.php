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
<?php
include '../users_connectivity.php';
$pq=$_SESSION['p'];
$query="select * from event where title='$pq'";
	$result=mysql_query($query);
	while($data=mysql_fetch_array($result))
	{
?>
<p>
<form action="#" method="post">
<input type="text" value="<?php echo $data[0]; ?>" name="title" placeholder="  Event Title" /><br /><br />
<input type="text" value="<?php echo $data[1]; ?>" name="date" placeholder="  Event Date" /><br /><br />
<textarea style="height:auto; width:auto;" cols="35" rows="10" name="des" ><?php echo $data[2]; ?></textarea><br /><br />
<input type="submit" value="Update" name="update" />
</form>
</p>
<?php
	}
if($_POST['update']=='Update')
{
	$a=$_POST['title'];
	$b=$_POST['date'];
	$c=$_POST['des'];
	$check=mysql_query("UPDATE event SET title='$a', date='$b', des='$c' WHERE title='$pq'");
	if($check)
	{
		echo "<script>alert('Event has been Successfully Updated..!! ');</script>";
		echo "<script>window.location='event.php'</script>";
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
