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
 include '../users_connectivity.php';
 $query="select * from photo_gallery";
	$result=mysql_query($query);
	?>
    <div class="text">
<h2>Photo Gallery</h2><br />
<table>
<?php
	while($data=mysql_fetch_array($result))
	{
	$a=$data[0];
	?>
<p>

<tr>
<td style="width:50%; margin-left:5%"><img style="margin-left:31%;width: 100px;height: 65px;" src="../images/photos/<?php echo $a; ?>"  /></td>
<td style="border-right:none; width:20%">
<form style="margin-left:62px; margin-top:13%; float:left;" action="#" method="post">
<input type="submit" name="delete" value="Delete" >
<input type="hidden" name="edit_hide1" value="<?php echo @$data[0]; ?>" >
</form>
</td>
</tr>
<?php
if($_POST['delete']=='Delete')
{
	
	$pq=$_POST['edit_hide1'];
	$query="select * from photo_gallery where name='$pq'";
	$result=mysql_query($query);
	while($data=mysql_fetch_array($result))
	{	
	echo "<script>window.location='gallery.php';</script>";
	mysql_query("DELETE FROM photo_gallery WHERE name='$pq'");	
	}
}
	}
	?>
</table>
</p>

</div>
<div class="text">
<h2 style="margin-top:5%;">Update New Photo</h2><br />

<p>
<form action="#" method="post" enctype='multipart/form-data'>
<input type="file" name="uploadedfile"  style="background-color:teal;" required="required"  ><br /><br />
<input type="submit" name="submit" value="Submit"  >
</form>
<?php
if($_POST['submit']=='Submit')
{
	$d=basename( $_FILES['uploadedfile']['name']); 
$target_path = "../images/photos/";
$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 
move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path);
	$sql="insert into photo_gallery values('$d')";
$check=mysql_query($sql);

	if($check)
	{
		echo "<script>alert('Picture has been Successfully Updated..!! ');</script>";
		echo "<script>window.location='gallery.php';</script>"; 
	}
	else
	{
		echo "<script>alert('Picture not updated yet..!!');</script>";
	}
}
?>

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
