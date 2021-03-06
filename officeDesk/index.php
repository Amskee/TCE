<?php
	$t=mktime(date('h')+5,date('i')+30,date('s'));
	$d = date("Y-m-d h:i:sa",$t);
	if (isset($_COOKIE["time"]))  {
			echo "Last Visited On : ";
			echo $_COOKIE["time"];
			setcookie('time',$d,time()+60*60*24*365,"/");
		}
	else
	{
		echo "Haven't Visited";
		setcookie('time',$d,time()+60*60*24*365,"/");
	}
?>
<!DOCTYPE html>
<html>
<head>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body bgcolor="#f9fbe7">
	<header id="head1">
		<div class="row">
			<div class="col s8">
				<img src="./img/Image1.png" style="margin-top: 10px"/>
			</div>
			<div class="col s2" style="margin-top: 40px; color: white;font-size: 20px">
				Login
			</div>
			<div class="col s2" style="margin-top: 40px; color: white;font-size: 20px">
				<a href="./users/register.html">Register</a>
			</div>
		</div>
	</header>
	<div class="row">
		<div class="col s3">
			<div class="col s10" id="sidenav">
				<div class="row" style="margin-bottom: 10px">
					<div class="col s1">
						 <i class="medium material-icons" style="margin-top: 10px">list</i>
					</div>
				</div>
				<div class="row" style="margin-bottom: 5px">
					<a href="#"><div id="navcon">
						Bonafide
					</div></a>
				</div>
				<div class="row" style="margin-bottom: 5px">
					<a href="#"><div id="navcon">
						On-Duty
					</div></a>
				</div>
				<div class="row" style="margin-bottom: 5px">
					<a href="#"><div id="navcon">
						Fees Structure
					</div></a>
				</div>
				<div class="row" style="margin-bottom: 5px">
					<a href="#"><div id="navcon">
						Mark Sheet
					</div></a>
				</div>
				<div class="row" style="margin-bottom: 5px">
					<a href="#"><div  id="navcon">
						IV Application
					</div></a>
				</div>
				<div class="row" style="margin-bottom: 5px">
					<a href="#"><div id="navcon">
						Reimbursement
					</div></a>
				</div>
				<div class="row" style="margin-bottom: 5px">
					<a href="#"><div  id="navcon">
						Bus-Pass
					</div></a>
				</div>
				<div class="row">
					<a href="./files/officeTimings.xml"><div id="navcon" class="highlighted">
						Office timings
					</div></a>
				</div>
			</div>
		</div>
		<div class="col s8">
			<div class="row" style="margin-bottom: 10px"id="titles">
				OFFICE DESK
			</div>
			<div class="row" style="margin-top: 0px" id="titles">
				<b><hr style="border-top: 4px solid ; "></b>
			</div>
			<div class="row" style="margin-top: 0px">
				<div class="col s2">
					<img src="./img/Image2.jpg" id="offimg"/>
				</div>
				<div class="col s8 offset-s2">
					<article>
						<p id="desc">        This Application aims at reducing the paper work in the process of applying for Bonafide, Fees structure, On-Duty etc in the college office.</p>
						<p id="desc">        With this application students can apply for all the documents online and monitor their approval process.</p>
					</article>
				</div>
			</div>
			<div class="row" style="margin-left: 200px">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/vE5r7qSImv8" frameborder="0" allowfullscreen></iframe>
			</div>
		</div>
	</div>
	<footer id="foot">
	<div class="row">
		<div class="col s6">
			<div class="row" id="copy"> Copyright@ Thiagarajar College Of Engineering. All rights reserved.</div> 
			<div class="row" style="color: white; margin-bottom: 0px"><i class="small material-icons">phone</i> 0452-2482430</div>
		</div>
		<div class="col s3 offset-s3">
			<img src="./img/Image3.png" id="icons" usemap="icon"/>
			<map name="icon">
				<area shape="poly" coords="3,6,42,6,42,39,8,37" href="http://www.twitter.com/tceofficialpage">
				<area shape="poly" coords="97,4,132,5,134,35,98,36" href="http://www.facebook.com/TheOfficialTCEPage">
				<area shape="poly" coords="142,3,178,5,178,35,145,36" href="http://www.linkedin.com/in/tcemadurai">
			</map>
		</div>
	</div>
	</footer>
</body>
</html>