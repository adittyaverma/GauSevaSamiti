<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/footer.css" rel="stylesheet" type="text/css" media="all" />

</head>
<body>
<div id="footer">
<div class="left">
<p>Follow us on</p>
<ul>
<li><img src="images/download (5).jpg" /><a href="#">&nbsp;&nbsp;Facebook</a></li>
<li><img src="images/download (3).jpg" /><a href="#">&nbsp;&nbsp;Google</a></li>
<li><img src="images/download (1).jpg" /><a href="#">&nbsp;&nbsp;Twitter</a></li>
</ul>
</div>
<div class="middle">
<img src="images/jaigaumata1.jpg" />
</div>
<div class="right1">
<img src="images/englishbanner.jpg" />
</div>
<div class="right">
<p>Subscribe Us</p>
<form action="#" method="post" >
<input type="text" name="subscribe1" placeholder="exapmle@mail.com" required="required"  />
<input type="submit" name="btn" value="Subscribe" />
</form>
</div>
<?php

 include 'users_connectivity.php';
if($_POST['btn']=='Subscribe')
	{
	$aa=$_POST['subscribe1'];
	$sql="insert into subscribe values('$aa')";
	$check=mysql_query($sql);
	if($check)
	{
		echo "<script>alert('you have successfully Subscribe Us');</script>";
		
	}
	else
	{
		echo "<script>alert('you have not Subscribe Us');</script>";
	}
	}
?>
<div style="clear:both"></div>
<div class="last">
<p align="center">© 2014 All Rights Reserved, Gau Seva Samiti ®</p>
</div>
<div style="padding-bottom:5px;"> </div>
</div>
</body>
</html>
