<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="../css/main.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/cow_care.css" rel="stylesheet" type="text/css" media="all" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload Pictures</title>
<SCRIPT type="text/javascript">
    window.history.forward();
    function noBack() { window.history.forward(); }
</SCRIPT>
</head>
<body onload="noBack();"
    onpageshow="if (event.persisted) noBack();" onunload="">
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
<?php
session_start();
$aa=$_SESSION['mem_name'];
$bb=$_SESSION['mem_id'];
include "../users_connectivity.php";
$xyz=$_SESSION['mem_id'];
$query="select id from member_detail where id='$xyz'";
	$result=mysql_query($query);
	$data=mysql_fetch_array($result);
	if($data)
	{
		if($_POST['submit']=='Submit')
	{
$a=$_POST['name'];
$b=$_POST['id'];
$d=basename( $_FILES['uploadedfile']['name']); 
$target_path = "../images/pics/";
$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 
move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path);
$query5="select pic from about_us where id='$xyz'";
	$result5=mysql_query($query5);
	$data5=mysql_fetch_array($result5);
$sql="update about_us set pic='$d' where id='$xyz' and pic='tinki'";
	$check=mysql_query($sql);
	
	$pi=$data5["pic"];
	if($pi=='tinki')
	{
		echo "<script>alert('your picture have been successfully uploaded...!!');</script>";	
	}
	else
	{
		echo "<script>alert('You have already submit your picture...!!');</script>";
	}
	}

	}
	else
	{ 
		echo "<script>alert('You must frist Login');</script>";
		echo "<script>window.location='member_signup.php';</script>";
	}

?>
<pre><p>Welcome &nbsp;<?php echo $aa; ?><br />Your Member ID is&nbsp;<?php echo $bb; ?> </p></pre>
<p>
<form action="#" method="post" enctype='multipart/form-data' >
<input type="text" placeholder="Name" name="name" value="<?php echo $aa; ?>" required="required"  ><br />
<input type="text" readonly="readonly" placeholder="Member Id" name="id" value="<?php echo $bb; ?>" required="required"  ><br />
<input type="file" name="uploadedfile" required="required"  ><br />
<input type="submit" name="submit" value="Submit"  >
</form>

</p>

</div>
<div style="clear:both"> </div>
<?php include "footer.php"; ?>
<div style="clear:both"> </div>
</div>
</div>

</body>
</html>
