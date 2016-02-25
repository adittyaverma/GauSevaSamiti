
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/login.css" media="all"/>
<title> Admin | Login Box</title>
</head>

<body> 
<div id="wrapper" >
<div class="top">
	<img src="images/cooltext1098585713 (1).png"/>
   </div>
  
    <div class="inner">
    	 <div class="middle">
         <img src="images/cooltext1083050185.png"/>
	</div>
    
    	<form action="#" method="post">
        <table border="4px" bordercolor="#EDEDED";>
        	<tr>
            <td>
			<input type="email"  name="mail" placeholder="exapmle@mail.com" style="width:330px; height:45px;" required /><br/>
            </td>
            </tr>
            <tr><td>
			<input type="password" name="pass" placeholder="Password"  style="width:330px; height:45px;" required /><br /></td></tr>
            </table>
            <table>
			<tr>
            <td><input type="submit" name="login" value="Login" style="width:150px; height:35px;" /></td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            </table>
            
		</form>
        <?php
include '../users_connectivity.php';
session_start();


$ps=$_SESSION['id'];

$query="select id from admin where id = '$ps'";
	$result=mysql_query($query);	
	$data=mysql_fetch_array($result);
	if($data)
	{
		echo "<script>window.location='welcome_admin.php';</script>";
	}
	else
	{
		if($_POST['login']=='Login')
{  
	$a=$_POST['mail'];
	$b=$_POST['pass'];
	$query="select * from admin";
	$result=mysql_query($query);	
	while($data=mysql_fetch_array($result))
	{
		$xy=$data[0];
		$yz=$data[1];
		
		if($a==$xy  && $b==$yz)
		{
		$_SESSION['id']=$a;	
		echo "<script> window.location='welcome_admin.php'</script>";
		}
		else
		{
			echo "<script>alert('Incorrect Email or Password, Try Again..!!');</script>";
		
		}
	}
	
}
	}
	
?>
        
    </div>
</div>
</body>
</html>
