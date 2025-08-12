<?php	include "../../connection/connection.php";
		include "lib_projects.php";

		if($conn){

			$oneProject = new Projects();

			$id = mysqli_real_escape_string($conn,$_POST['id']);
			$project = mysqli_real_escape_string($conn,$_POST['project']);
			$client = mysqli_real_escape_string($conn,$_POST['client']);
			$project_leader = mysqli_real_escape_string($conn,$_POST['project_leader']);
			$functional = mysqli_real_escape_string($conn,$_POST['functional']);
			$technologies = mysqli_real_escape_string($conn,$_POST['technologies']);
			$requeriments = mysqli_real_escape_string($conn,$_POST['requeriments']);
			$status = mysqli_real_escape_string($conn,$_POST['status']);
						
				if(($id == '') ||
					($project == '') ||
						($client == '') ||
							($project_leader == '') ||
								($functional == '') ||
									($technologies == '') ||
										($requeriments == '') ||
											($status == '')){
					echo 5; // HAY CAMPOS SIN COMPLETAR
				}else{
					$oneProject->updateProject($oneProject,$id,$project,$client,$project_leader,$functional,$technologies,$requeriments,$status,$conn,$db_basename);
				}

		}else{
			echo 7; // CONECTION FAILURE
		}



?>