<?php 	error_reporting(E_ALL ^ E_NOTICE);
      	ini_set('display_errors', 1);

		include "../connection/connection.php";
		include "../core/lib/lib_system.php";
    include "lib_password.php";



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>BPlanner - Cambio de Password</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php skeleton(); ?>

</head>
<body style = "background: #839192;">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> BPlanner</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="../#"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
      <li><a href="../regestry/regestry.php"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Registrarse</a></li>
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

    $onePassword = new Password();

		if($conn){
			$onePassword->formResetPassword();
		}else{
			flyerConnFailure();
		}


	?>

<script type="text/javascript" src="lib_password.js"></script>

</body>
</html>
