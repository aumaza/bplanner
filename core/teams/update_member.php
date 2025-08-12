<?php	include "../../connection/connection.php";
		include "lib_teams.php";

		if($conn){

			$oneTeam = new Teams();

			$id = mysqli_real_escape_string($conn,$_POST['id']);
			$functions = mysqli_real_escape_string($conn,$_POST['functions']);
						
				if(($id == '') ||
					($functions == '')){
					echo 5; // HAY CAMPOS SIN COMPLETAR
				}else{
					$oneTeam->updateMember($oneTeam,$id,$functions,$conn,$db_basename);
				}

		}else{
			echo 7; // CONECTION FAILURE
		}



?>