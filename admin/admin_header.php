<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/admin_header.css" media="all"/>
<title> </title>
</head>
<body> 
<div class="right">
<div class="admin_img">
<img src="images/admin.png" />
</div>
<div class="admin_txt">
<h1>Welcome Admin</h1>
</div>
<?php
include '../users_connectivity.php';
session_start();

$ps=$_SESSION['id'];

$query="select id from admin where id = '$ps'";
	$result=mysql_query($query);	
	$data=mysql_fetch_array($result);
	if($data)
	{
?>
<ul>
<li><a href="welcome_admin.php" >Home</a></li>
<li><a href="event.php" >Events</a></li>
<li><a href="member.php" >Members</a></li>
<li><a href="gallery.php" >Photo Gallery</a></li>
<li><a href="logout1.php" >Logout</a></li>
</ul>
<?php
	}
	else
	{
		echo "<script>alert('You must first login as Admin..!!');</script>";
		echo "<script>window.location='admin.php'</script>";
	}
	?>
</div>	

</body>
</html>
