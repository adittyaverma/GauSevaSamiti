<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/main.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/cow_care.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/feedback.css" rel="stylesheet" type="text/css" media="all" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Feedback</title>

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
<pre><p>Feedback</p></pre>
<p>	
<FORM name="contactfrm" action="#" method="post">
                          <table width="80%"  border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td colspan="3"> </td>
                            </tr>
                            <tr> 
                              <td width="23%" height="30" align="left" > Name 
                              </td>
                              <td width="14%" height="30">:</td>
                              <td width="63%" height="30" align="left"><INPUT size="25" style="background-color:#9CC" type="text" name="name" required="required" ></td>
                            </tr>
                            <tr> 
                              <td height="30" align="left">Address </td>
                              <td height="30">:</td>
                              <td height="30" align="left"><textarea style="background-color:#9CC" name="address" rows=2 required="required" ></textarea></td>
                            </tr>
                            <tr> 
                              <td height="30" align="left">City</td>
                              <td height="30">:</td>
                              <td height="30" align="left"> <input size="25" style="background-color:#9CC" type="text" name="city" required="required"  > 
                              </td>
                            </tr>
                            <tr> 
                              <td height="30" align="left">Country</td>
                              <td height="30">:</td>
                              <td height="30" align="left"> <input size="25" style="background-color:#9CC" type="text" name="country" required="required"  > 
                              </td>
                            </tr>
                            <tr> 
                              <td height="30" align="left"> Email </td>
                              <td height="30">:</td>
                              <td height="30" align="left"><INPUT size="25" style="background-color:#9CC" type="text"  name="email" required="required" ></td>
                            </tr>
                            <tr> 
                              <td height="30" align="left"> Phone </td>
                              <td height="30">:</td>
                              <td height="30" align="left"><INPUT size="25" style="background-color:#9CC" type="text" name="phone" required="required"></td>
                            </tr>
                            <tr> 
                              <td height="30" align="left"> Fax </td>
                              <td height="30">:</td>
                              <td height="30" align="left"><INPUT size="25" style="background-color:#9CC" type="text" name="fax" required="required"></td>
                            </tr>
                            <tr> 
                              <td height="30" align="left"> Feedback </td>
                              <td height="30">:</td>
                              <td height="30" align="left"> <TEXTAREA style="background-color:#9CC"  name="query" rows=2 required="required" ></TEXTAREA></td>
                            </tr>
                            <tr> 
                              <td>&nbsp; </td>
                            </tr>
                            <tr> 
                              <td align="center" colspan="4" > <input style="background-color:#9CC" name="submit" type="submit" value="Submit" > 
                                &nbsp;&nbsp; <INPUT style="background-color:#9CC" name="reset" type="reset"  value="Reset" ></td>
                            </tr>
                          </table>
                        </form>

</p>

</div>
<?php
 include 'users_connectivity.php';
if($_POST['submit']=='Submit')
	{
	$a=$_POST['name'];
	$b=$_POST['address'];
	$c=$_POST['city'];
	$d=$_POST['country'];
	$e=$_POST['email'];
	$f=$_POST['phone'];
	$g=$_POST['query'];
	$sql="insert into feedback values('$a','$b','$c','$d','$e','$f','$g')";
	$check=mysql_query($sql);
	if($check)
	{
		echo "<script>alert('your feedback have successfully Submit...!!');</script>";
		
	}
	else
	{
		echo "<script>alert('you have not submit feedback yet...!!');</script>";
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
