<?php	include "../../connection/connection.php";
		include "lib_teams.php";

		if($conn){

			$oneTeam = new Teams();

			$id = mysqli_real_escape_string($conn,$_POST['bookId']);
						
				if(($id == '')){
					echo 5; // HAY CAMPOS SIN COMPLETAR
				}else{
					$oneTeam->deleteMember($id,$conn,$db_basename);
				}

		}else{
			echo 7; // CONECTION FAILURE
		}



?>