<?php
require('config.php');
session_start();
if (isset($_SESSION['uo'])) {
	echo "You need to logout your current Eco session to Reset database  , <a href='users/login.php'>Go to Eco0</a>";
}
echo "<script type=\"text/javascript\">alert('Click OK for New or reset installation. Ctrl+w to exit without reset.');</script>";
$con=mysqli_connect($svr,$usr,$pwd);
$sql="drop database tce";
$x=mysqli_query($con,$sql);

$sql="create database tce";
$y=mysqli_query($con,$sql);

$con=mysqli_connect($svr,$usr,$pwd,$db);

$sql = "drop table users";
$dt = mysqli_query($con, $sql);

$sql="create table users( uid int(11) auto_increment, usn varchar(300), fn varchar(300), ln varchar(300), roll varchar(300), email varchar(300), password varchar(300), dept varchar(300), phone varchar(300), DOB varchar(300), primary key(uid) );";
$a=mysqli_query($con,$sql);

//$sql = "drop table applications";
//$dt2 = mysqli_query($con, $sql);

//$sql = "create table applications ( aid int(11) auto_increment, name varchar(300), email varchar(300), phone varchar(300), gender varchar(300), type varchar(300), age varchar(300), area varchar(300), city varchar(300),  primary key(aid) );";
//$b = mysqli_query($con, $sql);

/*$sql = "drop table workers";
$dt2 = mysqli_query($con, $sql);

$sql = "create table workers ( wid int(11) auto_increment, name varchar(300), email varchar(300), phone varchar(300), gender varchar(300), type varchar(300), age varchar(300), area varchar(300), city varchar(300),  assigned varchar(5), uid int(11), primary key(wid) );";
$c = mysqli_query($con, $sql);

$sql = "drop table requests";
$dt3 = mysqli_query($con, $sql);

$sql = "create table requests (rid int(11) auto_increment, wtype varchar(300), gender varchar(300), datex varchar(300), timex varchar(300), descp varchar(300), pack varchar(300), assg varchar(5), wid int(11), fsh varchar(5) uid int(11), primary key(rid));";
$d = mysqli_query($con, $sql);
*/
if($y) {
echo "<br>Initialized Database <br>";
} 
if($a) {
echo "<br>Initialized Tables ...<br>";
echo "<br>We are all set now you can use Eco" ;
}
else {
echo "Please configure config.php , Installation FAILED :( ";
}
