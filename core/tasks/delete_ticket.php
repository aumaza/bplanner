<?php	include "../../connection/connection.php";
		include "lib_tasks.php";


		if($conn){

			$oneTask = new Tasks();

			$id = mysqli_real_escape_string($conn,$_POST['id']);

			if($id == ''){
				echo 5; // ID IS EMPTY
			}else{
				$oneTask->deleteTicket($id,$conn,$db_basename);
			}

		}else{
			echo 7; // CONNECTION FAILURE
		}





?>