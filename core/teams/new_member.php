<?php	include "../../connection/connection.php";
		include "lib_teams.php";

		if($conn){

			$oneTeam = new Teams();

			$id_project = mysqli_real_escape_string($conn,$_POST['id_project']);
			$member = mysqli_real_escape_string($conn,$_POST['member']);
			$functions = mysqli_real_escape_string($conn,$_POST['functions']);
						
				if(($id_project == '') ||
					($member == '') ||
						($functions == '')){
					echo 5; // HAY CAMPOS SIN COMPLETAR
				}else{
					$oneTeam->addMember($oneTeam,$id_project,$member,$functions,$conn,$db_basename);
				}

		}else{
			echo 7; // CONECTION FAILURE
		}



?>