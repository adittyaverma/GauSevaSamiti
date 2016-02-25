<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/header.css" rel="stylesheet" type="text/css" media="all"  />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body style="padding-top:0px !important">
<div id="header">
<h1 align="center"><img src="images/gaushala_02.jpg" />Gau Seva Samiti</h1>
<a href="Hindi/index.php" style="text-decoration: none;
color: black;
font-size: x-large;
float: right;
margin-top: -7%;
margin-right: 9%;">Hindi</a>
<?php

include 'users_connectivity.php';

session_start();
$a=$_SESSION['mem_id'];
$b=$_SESSION['mem_name'];
$query="select id from member_detail where id='$a'";
	$result=mysql_query($query);
	$data=mysql_fetch_array($result);
	?>

<ul>
<li><a href="index.php" >Home</a></li>
<li><a href="gau_history.php" >Gau History</a></li>
<li><a href="our_aim.php" >Our Aim</a></li>
<li><a href="cow_protection.php" >Cow Protection</a></li>
<li><a href="photo_gallery.php" >Photo Gallery</a></li>
<li><a href="contact_us.php" >Contact us</a></li>
<?php
if(empty($data))
{
?>
<li><a href="member_signup.php" >Signup/Login</a></li>
<?php
}
else if($data)
{
?>
<li><a href="upload_pic.php" >Profile</a></li>
<li><a href="logout.php" >Logout</a></li>
<?php
}
?>
</ul>
</div>

<div id="abcd">

</div>
</body>
</html>
