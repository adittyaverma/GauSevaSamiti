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
<h2>Dear Admin</h2><br />
<p>
This id Admin section, Where you are Admin. Here giva a navigation bar, where you can see some lables. You can use these lables by clicking on them. <br />
<b>1.</b> Here you can upload any upcoming Events/Activity. <br />
<b>2.</b> You can also upload member photo that directly show on Website. These member first must sighup.<br />

</p>
</div>
<div class="main_img">
<img src="images/jaigaumata.jpg"  />
<img src="images/krishna.jpg"  />
</div>
</div>
</div>
</body>
</html>
