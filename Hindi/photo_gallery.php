<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="../css/main.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/cow_care.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/photo_gallery.css" rel="stylesheet" type="text/css" media="all" />
<script src="../js/image.js" type="text/javascript"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Photo Gallery</title>
</head>
<body>
<div id="container">
<div id="wrapper">

<?php include "header.php"; ?>

<div class="main_left">
<div class="main_left_1">
<ul>
<li><img src="../images/button.jpg" />&nbsp;&nbsp;<a href="cow_care.php">गौ पालन</a></li><br />
<li><img src="../images/button.jpg" />&nbsp;&nbsp;<a href="about_us.php">परिचय</a></li><br />
<li><img src="../images/button.jpg" />&nbsp;&nbsp;<a href="events.php">कार्यक्रम सूचना</a></li><br />
<li><img src="../images/button.jpg" />&nbsp;&nbsp;<a href="feedback.php">सुझाव</a></li><br />
<li><img src="../images/button.jpg" />&nbsp;&nbsp;<a href="about.php">गौशाला सदस्य</a></li>

</ul>
</div>
<div class="main_left_2">
<img src="../images/jaigaumata.jpg" />
</div>
</div>
<div class="main_right">
<pre><p>फोटौ गैलेरी</p></pre>
<div class="pic1">
<?php
$query2="select * from photo_gallery";
	$result2=mysql_query($query2);
	while($data2=mysql_fetch_array($result2))
	{
		$a=$data2[0];
		?>
    

<img class="magnify" style="height: 155PX;width: 225PX;" src="../images/photos/<?php echo $a; ?>" />


<?php
	}
	?>
</div>
</div>
<div style="clear:both"> </div>
<?php include "footer.php"; ?>
<div style="clear:both"> </div>
</div>
</div>

</body>
</html>
