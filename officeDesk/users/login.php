<!DOCTYPE html>
<html>
<head>
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="../js/regApp.js"></script>
    <script src="../js/validateApp.js"></script>
</head>
<body bgcolor="#f9fbe7" onload="regWelcome();" onunload="regClose();">
	<header id="head1">
		<div class="row">
			<div class="col s8">
				<img src="../img/Image1.png" style="margin-top: 10px"/>
			</div>
			<div class="col s2" style="margin-top: 40px; color: white;font-size: 20px;">
				<div onmouseover="expandText(this);" onmouseout="normText(this);" class="anim">Login</div>
			</div>
			<div class="col s2" style="margin-top: 40px; color: white;font-size: 20px">
				<a href="register.html">Register</a>
			</div>
		</div>
	</header>
	<main class="reg-form">
	<div class="row">
    	<form class="col s12" id="register-form" action="validateLogin.php" method="POST">
    		<div class="row form-head" onmousedown="MOD(this);" onmouseup="MOU(this);">
    			Student Login
    		</div>
    		

      	<div class="row">
        	<div class="input-field col s12">
         			<input id="email" name="email" type="text" class="validate">
         			<label for="email">E-mail</label>
        	</div>
      	</div>
     		<div class="row">
       		<div class="input-field col s12">
       			<input id="password" name="password" type="password" class="validate">
       			<label for="password">Password</label>
      		</div>
     		</div>

        

        <div class="row">
      	 <!--div class="dum-btn" onclick="regSubmit(this);">Validate JS</div-->
         <input name="submit" type="submit" value="Login" />
         <?php 
        session_start();
        if(isset($_SESSION['error'])) {
          echo $_SESSION['error'];
          unset($_SESSION['error']);
        } 
      ?>
        </div>
    	</form>
	</div>
	</main>
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
    $('select').material_select();
});
  </script>
</body>
</html>