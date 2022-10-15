<?php	include "../../connection/connection.php";
		include "lib_tasks.php";

		if($conn){

			$oneTask = new Tasks();

			$id = mysqli_real_escape_string($conn,$_POST['id']);
			$module = mysqli_real_escape_string($conn,$_POST['module']);
			$taker = mysqli_real_escape_string($conn,$_POST['taker']);
			$require = mysqli_real_escape_string($conn,$_POST['require']);
			$date_from = mysqli_real_escape_string($conn,$_POST['date_from']);
			$date_to = mysqli_real_escape_string($conn,$_POST['date_to']);

			if(($id == '') ||
			   	($module == '') ||
			   		($taker == '') ||
			   			($require == '') ||
			   				($date_from == '') ||
			   					($date_to == '')){
				echo 5; // there are empty fields
			}else{
				$oneTask->updateTicket($oneTask,$id,$module,$taker,$require,$date_from,$date_to,$conn,$db_basename);
			}



		}else{
			echo 7; //connection failure
		}





?>