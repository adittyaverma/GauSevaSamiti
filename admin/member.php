<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/login.css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/welcome.css" media="all"/>
<title>Welcome Admin</title>
</head>
<body> 
<div id="container">
<div id="container1">
<?php 
session_start();
include 'admin_header.php';
?>
<div class="text">
<h2>GauShala Members's List(Not Approved)</h2><br />

<p>
<table>
<tr>
<td>Name</td>
<td>Member ID</td>
<td>Approve</td>
<td style="border-right:none;">Delete</td>
</tr>

</p>
<?php
include '../users_connectivity.php';
$query1="select * from member_detail where status='Not Approved'";
	$result1=mysql_query($query1);
	while($row1=mysql_fetch_array($result1))
	{
		?>
		<tr>
<td><?php echo $row1["1"]; ?></td>
<td><?php echo $row1["0"]; ?></td>
<td>
<form action="#" method="post">
<input type="submit" style="margin-left:40px; margin-top:30%;" value="Approve" name="approve" >
<input type="hidden" name="edit_hide2" value="<?php echo @$row1[0]; ?>" >
</form>
</td>
<td style="border-right:none;">
<form action="#" method="post">
<input style="margin-left:40px; margin-top:30%;" type="submit" value="Delete" name="delete" >
<input type="hidden" name="edit_hide4" value="<?php echo @$row1[0]; ?>" >
</form>
</td>
</tr>
<?php
if($_POST['approve']=='Approve')
{
	
	$pp=$_POST['edit_hide2'];
	$query="select * from member_detail where id='$pp'";
	$result=mysql_query($query);
	if($data=mysql_fetch_array($result))
	{	
	$check=mysql_query("UPDATE member_detail SET status='Approved' where id='$pp' ");
	$b=$data["name"];
	$c=$data["id"];
	$a="tinki";
	$xps=$data["email"];
	require ('../class.phpmailer.php');
require ('../class.smtp.php');
require ('../PHPMailerAutoload.php');

$mail  = new PHPMailer();

$mail->IsSMTP();                    
$mail->Host = 'smtp.gmail.com';  // Specify main and backup server
 // debugging: 1 = errors and messages, 2 = messages only

    $mail->SMTPAuth   = true;                            // Enable SMTP authentication
$mail->Username = 'www.testmywebsite@gmail.com';                            // SMTP username
$mail->Password = '9509701824';                           // SMTP password
$mail->SMTPSecure = 'ssl';  
$mail->Port = 465;


$mail->From = 'www.testmywebsite@gmail.com';
$mail->FromName = 'Gau Seva Samiti';
$mail->addAddress($xps);  // Add a recipient

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters

$mail->IsHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Congratulation';
$mail->Body    = 'Dear Member, Admin approve you for Login<br /> Now you can add other information with your account' ;
$mail->AltBody = '';

if(!$mail->send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}
	$check1=mysql_query("insert into about_us values('$c','$b','$a')");
	if($check1)
	{
		echo "<script>window.location='member.php';</script>";
	}
	}
	
}
if($_POST['delete']=='Delete')
{
	$pp1=$_POST['edit_hide4'];
	$query="select * from member_detail where id='$pp1'";
	$result=mysql_query($query);
	while($data=mysql_fetch_array($result))
	{	
	$check2=mysql_query("DELETE FROM about_us WHERE id='$pp1' ");
	$check1=mysql_query("DELETE FROM member_detail WHERE id='$pp1' ");
	if($check1 || $check2)
	{
		echo "<script>window.location='member.php';</script>";
	}
	}
}

	}
?>
</table>
</div>
<div class="text">
<h2 style="margin-top:7%">GauShala Members's List(Approved)</h2><br />

<p>
<table>
<tr>
<td>Name</td>
<td>Member ID</td>
<td style="border-right:none;">Operations</td>
</tr>

</p>
<?php
include '../users_connectivity.php';
$query2="select * from about_us where pic!='tinki'";
	$result2=mysql_query($query2);
	while($row2=mysql_fetch_array($result2))
	{
		?>
		<tr>
<td><?php echo $row2["0"]; ?></td>
<td><?php echo $row2["1"]; ?></td>

<td style="border-right:none;">
<form action="#" method="post"><br /><br />
<input type="submit" value="Upload" name="upload" />
<input type="hidden" name="edit_hide" value="<?php echo @$row2[0]; ?>" />
</form>
</td>
</tr>
<?php
	}
if($_POST['upload']=='Upload')
{
	$pp=$_POST['edit_hide'];
	$query="select * from about_us where id='$pp'";
	$result=mysql_query($query);
	while($data=mysql_fetch_array($result))
	{	
	$a=$data["pic"];
	$b=$data["name"];
	$c=$data["id"];
	$sql="insert into uploaded_pics values('$c','$b','$a')";
	$check=mysql_query($sql);
	if($check)
	{
		mysql_query("DELETE FROM about_us WHERE id='$pp'");	
		echo "<script>alert('This picture has been successfully updated..!!');</script>";
		echo "<script>window.location='member.php';</script>";
	}
	else
	{
		echo "<script>alert('You have alredy update this picture..!!');</script>";
	}
	}
}
	
?>
</table>
</div>
<div class="main_img">
<img src="images/jaigaumata.jpg"  />
<img src="images/krishna.jpg"  />
</div>
</div>
</div>
</body>
</html>
