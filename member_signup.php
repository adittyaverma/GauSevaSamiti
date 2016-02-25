<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/main.css" rel="stylesheet" type="text/css" media="all" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Member's Detail</title>



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
<div class="main_right_left">
<p>New Member Signup</p>
<form action="#" method="post">
<input type="text" name="name" placeholder="  Full Name" /><br /><br />
<input type="tel" name="mob" placeholder="  Mobile Number" /><br /><br />
<input type="email" name="email" placeholder="  example@mail.com" /><br /><br />
<input type="password" name="pass" placeholder="  Password" /><br /><br />
<textarea placeholder=" Address" name="add"></textarea><br /><br />
<textarea placeholder=" Message" name="msg"></textarea><br /><br />
<input type="reset" value="Reset" name="reset" />
<input type="submit" value="Signup" name="signup" />
</form>
</div>
<div class="main_right_middle">
<h1>OR</h1>
</div>
<div class="main_right_right">
<p>Already Registered</p>
<form action="#" method="post">
<input type="text" name="m_id" placeholder="  Member ID" /><br /><br />
<input type="password" name="pass" placeholder="  Password" /><br /><br />
<input type="submit" value="Login" name="login" />
</form>
</div>
</div>
<?php

include 'users_connectivity.php';
session_start();
$xyz=$_SESSION['mem_id'];
$query1="select id from member_detail where id='$xyz'";
	$result1=mysql_query($query1);
	$data1=mysql_fetch_array($result1);
	if($data1)
	{
		echo "<script>window.location='upload_pic.php';</script>";
	}
	else
	{
if($_POST['signup']=='Signup')
{
	$a=$_POST['name'];
	$b=$_POST['mob'];
	$c=$_POST['email'];
	$d=$_POST['pass'];
	$e=$_POST['add'];
	$f=$_POST['msg'];
	$g="Not Approved";
	$sql2="insert into member_detail values('','$a','$b','$c','$d','$e','$f','$g')";
	$check=mysql_query($sql2);
	$query2="select * from member_detail where mobile='$b'";
	$result2=mysql_query($query2);
	$data2=mysql_fetch_array($result2);	
	if($check)
	{
		$p=$data2["id"];
		$q=$data2["name"];
		echo "<script>alert('you have Successfully Signup...!! Welcome $q Your Member ID is $p. A mail has send to your Email. You can not login without Admin approval, First Admin approve you than you can add other information with your account. Thank You Member');</script>"; 
		require ('class.phpmailer.php');
require ('class.smtp.php');
require ('PHPMailerAutoload.php');

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
$mail->addAddress($c);  // Add a recipient

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters

$mail->IsHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Your Regisration ID and Password here';
$mail->Body    = 'Dear Member, <br> <br> your Member ID is = '.$p.'<br> Your Password is='.$d ;
$mail->AltBody = '';

if(!$mail->send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}
	}
	else
	{
		echo "<script>alert('You are not Signup Yet...!!');</script>";
	}
	}
if($_POST['login']=='Login')
{
	$x=$_POST['m_id'];
	$y=$_POST['pass'];
	$query="select * from member_detail where id='$x'";
	$result=mysql_query($query);
	while($data=mysql_fetch_array($result))
	{
		$p=$data["id"];
		$q=$data["password"];
		$r=$data["name"];
		$s=$data["status"];
		if($p==$x && $q==$y && $s=="Approved")
		{
			$_SESSION['mem_id'] = $x;
			$_SESSION['mem_name']=$r;
			echo "<script>window.location='upload_pic.php';</script>";
		}
		else if($s=="Not Approved")
		{
			echo "<script>alert('Admin didnot Approve you...!! Contact to Admin'); </script>";
		}
		else
		{ 
			echo "<script>alert('Incorrect Member ID or Password'); </script>";
			echo "<script>window.location='member_signup.php';</script>";
			
		}		
	}
	}
	}
?>
<div style="clear:both"> </div>
<?php include "footer.php"; ?>
<div style="clear:both"> </div>
</div>
</div>

</body>
</html>
