<?php
session_start();
include('connection.php');

if (isset($_POST['submit']))
{	
$username=$_POST['email']; 
$password=$_POST['password']; 

if($username=="admin@gmail.com" && $password=="admin")
{
	$_SESSION['user']='admin';
	header("location:index.php");
}
else{

	$sel="SELECT * FROM user WHERE email='$username' and password='$password'";
	$result = mysqli_query($con,$sel) or die(mysql_error());
	$rows = mysqli_num_rows($result);
	$row=mysqli_fetch_array($result);
	
	if($rows==1)
	{	
		$_SESSION['uid']=$row['id'];
		$_SESSION['uname']=$row['name'];
		$_SESSION['user']='user';
		header("location:index.php");
		
	}
	else{
		
		$sel="SELECT * FROM company WHERE email='$username' and password='$password'";
		$result = mysqli_query($con,$sel) or die(mysql_error());
		$rows = mysqli_num_rows($result);
		$row=mysqli_fetch_array($result);
		echo $sel;
		if($rows==1)
		{	
		
			$_SESSION['cid']=$row['id'];
			$_SESSION['cname']=$row['cmpname'];
			$_SESSION['user']='company';
			header("location:index.php");
			
		}

		else{

			
		header("location:login.php?st=fail");
		}

		
		
		
	}
}

}
?>
 
 



