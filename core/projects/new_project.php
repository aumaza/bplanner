<?php	include "../../connection/connection.php";
		include "lib_projects.php";

		if($conn){

			$oneProject = new Projects();

			$project = mysqli_real_escape_string($conn,$_POST['project']);
			$client = mysqli_real_escape_string($conn,$_POST['client']);
			$project_leader = mysqli_real_escape_string($conn,$_POST['project_leader']);
			$functional = mysqli_real_escape_string($conn,$_POST['functional']);
			$technologies = mysqli_real_escape_string($conn,$_POST['technologies']);
			$requeriments = mysqli_real_escape_string($conn,$_POST['requeriments']);
						
				if(($project == '') ||
					($client == '') ||
						($project_leader == '') ||
							($functional == '') ||
								($technologies == '') ||
									($requeriments == '')){
					echo 5; // HAY CAMPOS SIN COMPLETAR
				}else{
					$oneProject->addProject($oneProject,$project,$client,$project_leader,$functional,$technologies,$requeriments,$conn,$db_basename);
				}

		}else{
			echo 7; // CONECTION FAILURE
		}



?>