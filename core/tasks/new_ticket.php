<?php	include "../../connection/connection.php";
		include "lib_tasks.php";

		if($conn){

			$oneTask = new Tasks();

			$nro_ticket = mysqli_real_escape_string($conn,$_POST['nro_ticket']);
			$date_ticket = mysqli_real_escape_string($conn,$_POST['date_ticket']);
			$module = mysqli_real_escape_string($conn,$_POST['module']);
			$taker = mysqli_real_escape_string($conn,$_POST['taker']);
			$require = mysqli_real_escape_string($conn,$_POST['require']);
			$date_from = mysqli_real_escape_string($conn,$_POST['date_from']);
			$date_to = mysqli_real_escape_string($conn,$_POST['date_to']);
			$state = mysqli_real_escape_string($conn,$_POST['state']);

				if(($nro_ticket == '') ||
					($date_ticket == '') ||
						($module == '') ||
							($taker == '') ||
								($require == '') ||
									($date_from == '') ||
										($date_to == '') ||
											($state == '')){
					echo 5; // HAY CAMPOS SIN COMPLETAR
				}else{
					$oneTask->addTicket($oneTask,$nro_ticket,$date_ticket,$module,$taker,$require,$date_from,$date_to,$state,$conn,$db_basename);
				}

		}else{
			echo 7; // CONECTION FAILURE
		}



?>