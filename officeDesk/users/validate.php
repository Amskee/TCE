<?php
require('../config.php');
echo "<style>h2, h1{width: 500px; background-color: cyan; margin: 15 auto; padding: 5px; border-radius: 12px; text-align: center;} .error{color: red;} .pass{color: green;}</style>";

if(!isset($_POST['submit'])) header('Location: register.php');

function valPhone($val) {
	$t1 = is_numeric($val);
	$t2 = strlen($val)==10;
	if(!$t1 && !$t2) {
		echo "<h2 class='error'>Invalid phone number</h2>";
		die();
	}
}

function valEmail($val) {
	$emailREG = "/^\w{2,}[@]\w{2,}[.]\w{2,}$/";
	if(!preg_match($emailREG, $val)) {
		echo "<h2 class='error'>Invalid E-mail</h2>";
		die();
	}
}

function valDob($val) {
	$dobREG = "/^\d{2}[.\-\/]\d{2}[.\-\/]\d{4}$/";
	if(!preg_match($dobREG, $val)) {
		echo "<h2 class='error'>Invalid DOB</h2>";
		die();
	}
}

foreach($_POST as $key=>$val) {
	if(strlen($val)<1)
		echo "<h2 class='error'>Empty value at $key</h2>";
	switch($key) {
		case 'phone': valPhone($val); break;
		case 'email': valEmail($val); break;
		case 'dob': valDob($val); break;
	}
}

extract($_POST);
$con=mysqli_connect($svr,$usr,$pwd,$db);
$sql = "select email from users where email='$email'";
$d=mysqli_query($con,$sql);
$password = md5($password);
if(mysqli_fetch_array($d) == true) { echo "<center><h1>email id already exists!</h1></center>"; }
else {
	$sql="INSERT INTO users VALUES (NULL, '$username', '$first_name', '$last_name', '$rollno', '$email', '$password', '$dept', '$phone', '$dob')";
    $d=mysqli_query($con,$sql);
    if($d){echo "<center><h1>SUCCESS!</h1></center>";}else{echo "Something went wrong in the middle!";}
}

//echo "<script>if(!document.querySelector('h2'))document.write('<h1 class=pass>All tests Passed!</h1>');</script>";

?>