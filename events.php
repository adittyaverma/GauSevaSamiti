<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/main.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/cow_care.css" rel="stylesheet" type="text/css" media="all" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Events & Activities</title>
</head>
<body>
<div id="container">
<div id="wrapper">

<?php include "header.php"; ?>

<div class="main_left">
<div class="main_left_1">
<ul>
<li><img src="images/button.jpg" />&nbsp;&nbsp;<a href="cow_care.php">Cow Care</a></li><br />
<li><img src="images/button.jpg" />&nbsp;&nbsp;<a href="about_us.php">About Us</a></li><br />
<li><img src="images/button.jpg" />&nbsp;&nbsp;<a href="events.php">Events/ Activities</a></li><br />
<li><img src="images/button.jpg" />&nbsp;&nbsp;<a href="feedback.php">Feedback</a></li><br />
<li><img src="images/button.jpg" />&nbsp;&nbsp;<a href="about.php">Gaushala Members</a></li>

</ul>
</div>
<div class="main_left_2">
<img src="images/jaigaumata.jpg" />
</div>
</div>
<div class="main_right">
<pre><p>Events & Activities</p></pre>
<?php
include '../users_connectivity.php';
$query="select * from event where language='english'";
	$result=mysql_query($query);
	while($data=mysql_fetch_array($result))
	{
	$a=$data["title"];
	$b=$data["date"];
	$c=$data["des"];
?>
<p>	
<strong><?php echo $a; ?></strong><br /> 
Date: <?php echo $b; ?> <br />
<?php echo $c; ?><br /><br />
</p>
<?php
	}
	?>
</div>
<div style="clear:both"> </div>
<?php include "footer.php"; ?>
<div style="clear:both"> </div>
</div>
</div>

</body>
</html>
