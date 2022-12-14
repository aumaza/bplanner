<?php 	session_start(); 
      
      	error_reporting(E_ALL ^ E_NOTICE);
      	ini_set('display_errors', 1);

		include "connection/connection.php";
		include "core/lib/lib_system.php";



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>BPlanner - Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php skeleton(); ?>

</head>
<body style = "background: #839192;">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <li class="navbar-brand" ><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> BPlanner</li>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="regestry/regestry.php"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Registrarse</a></li>
      <li><a href="password/password.php"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Olvidé mi Password</a></li>
    </ul>
    <?php
    	if($conn){
    		echo '<button class="btn btn-success navbar-btn" data-toggle="tooltip" data-placement="top" title="Database Connexion Succesfully!"><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span> Connexion</button>';
    	}else{
    		echo '<button class="btn btn-danger navbar-btn" data-toggle="tooltip" data-placement="top" title="Database Connexion Failure!"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> Connexion</button>';
    	}
    	
    ?>
  </div>
</nav>
<br>
	
	<?php

		if($conn){
			formLogIn();
		}else{
			flyerConnFailure();
		}


	?>

<script type="text/javascript" src="login.js"></script>

</body>
</html>
