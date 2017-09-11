<?php
session_start();
if(isset($_SESSION['uo'])){
	unset($_SESSION['uo']);
	echo "Logged out successfuly";
} else {
	echo "you need to login to logout.";
}
?>