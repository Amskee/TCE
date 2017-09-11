<?php
include '../config.php';

session_start();
if(!isset($_SESSION['uo'])){
	header("Location: ../users/login.php");
}

$con=mysqli_connect($svr,$usr,$pwd,$db);
$uo = $_SESSION['uo'];
$search= mysqli_query($con,"SELECT * FROM users WHERE uid=$uo");
$row=mysqli_fetch_array($search,MYSQLI_ASSOC);
if($row == NULL ) { header("Location: ../users/login.php"); }

?>


<html>


<head><title>Eva</title>



<script src="https://code.jquery.com/jquery-2.1.4.js"></script>

<script src="./js/core.js"></script>

<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

<link href="./css/paint.css" rel='stylesheet' type='text/css'>


</head>


<body>

<?php
echo "<h1>Welcome ".$row["usn"]."</h1>";
echo "<h2><a href='logout.php'>logout</a></h2>";
//echo "<center><table border=2 cellpadding=20 cellspacing=20><tr><th><a href='manageReq2.php'>Manage</th><th><a href='requestUser.php'>New Appointment</th></tr></table></center>";
?>

</body>

</html>
