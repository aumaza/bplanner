<?php	session_start(); 
      
      	error_reporting(E_ALL ^ E_NOTICE);
      	ini_set('display_errors', 1);
		
		include "../../connection/connection.php";
		include "../lib/lib_system.php";
		include "../users/lib_user.php";
		include "../tasks/lib_tasks.php";
		include "lib_main.php";

		$varsession = $_SESSION['user'];
			
			if($conn){

	            $sql = "select id, nombre, avatar from bp_usuarios where user = '$varsession'";
	            mysqli_select_db($conn,$db_basename);
	            $query = mysqli_query($conn,$sql);
	            while($row = mysqli_fetch_array($query)){
	                $nombre = $row['nombre'];
	                $user_id = $row['id'];
	                $avatar = $row['avatar'];
	            }
           	}else{
           		echo 'CONNECTION FAILURE';
           	}
	
   
    
	if($varsession == null || $varsession == ''){
        echo '<!DOCTYPE html>
                <html lang="es">
                <head>
                <title>BPlanner - Main</title>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">';
                skeleton();
                echo '</head><body style = "background: #839192;">';
                echo '<br><div class="container">
                        <div class="alert alert-danger" role="alert">';
                echo '<p align="center"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Su sesión ha caducado. Por favor, inicie sesión nuevamente</p>';
                echo '<a href="../../logout.php"><hr><button type="buton" class="btn btn-default btn-block"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> Iniciar</button></a>';	
                echo "</div></div>";
                die();
                echo '</body></html>';
	}

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>BPlanner - Main</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php skeleton(); ?>

</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50" style = "background: #839192;" onload="nobackbutton();">

<?php mainNavBar($nombre,$avatar); ?>
  
<!-- main space -->

<div class="container-fluid">

	<?php

		// SYSTEM LOGOUT
			if(isset($_POST['logout'])){
				logOut($nombre);
			}
		// SYSTEM HOME
			if(isset($_POST['home'])){
				echo '<meta http-equiv="refresh" content="URL=main.php "/>';
			}

		// ========================================================== //
		// USERS SPACE //

			$oneUser = new User();

			if(isset($_POST['users'])){
				$oneUser->usersList($oneUser,$conn,$db_basename);
			}
			if(isset($_POST['user_edit'])){
				$oneUser->formUserInfo($oneUser,$user_id,$conn,$db_basename);
			}
			if(isset($_POST['change_password'])){
				$oneUser->changeUserPass($user_id);
			}

			$oneUser->modalChangeAllow();

		// ========================================================== //
		// TASKS SPACE //
			$oneTask = new Tasks();

			if(isset($_POST['tickets'])){
				$oneTask->listTaks($oneTask,$conn,$db_basename);
			}
			if(isset($_POST['new_ticket'])){
				$oneTask->formNewTicket($conn,$db_basename);
			}
			if(isset($_POST['edit_ticket'])){
				$id = mysqli_real_escape_string($conn,$_POST['id']);
				$oneTask->formEditTicket($oneTask,$id,$conn,$db_basename);
			}
			if(isset($_POST['erase_ticket'])){
				$id = mysqli_real_escape_string($conn,$_POST['id']);
				$oneTask->formDeleteTicket($oneTask,$id,$conn,$db_basename);
			}





	?>

  
</div>

<!-- end main space -->

<script type="text/javascript" src="lib_main.js"></script>
<script type="text/javascript" src="../users/lib_user.js"></script>
<script type="text/javascript" src="../tasks/lib_tasks.js"></script>

</body>
</html>