<?php
include '../config.php';
session_start();	
	

	if(!empty($_POST))
	{	
		if(empty($_POST["email"]) || empty($_POST["password"]))
		{
			$_SESSION['error']="Username or Password is empty !";
			header("location: login.php");
		}else
		{
			
			
			$con=mysqli_connect($svr,$usr,$pwd,$db);
			$username=$_POST['email'];
			$password=$_POST['password'];
			
			
			$username = stripslashes($username);
			$password = stripslashes($password);
			$username = mysqli_real_escape_string($con, $username);
			$password = mysqli_real_escape_string($con, $password);
			$password = md5($password);
			//echo "comparing $username $password";
			$sql="SELECT * FROM users WHERE email='$username' and password='$password'";
			$result=mysqli_query($con,$sql);
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			
			
			
			if(mysqli_num_rows($result) == 1)
			{				
				$uo = $row["uid"];
				$_SESSION['uo'] = $uo;
				header("location: ../userPortal/index.php"); 
			}else
			{
				$_SESSION['error']="Username or Password is wrong ";
				header("location: login.php");
			}

		}
	}
	else{$_SESSION['error']="you have to login first ! ";header("location:login.php");}

?>