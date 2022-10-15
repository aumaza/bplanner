<?php	include "../../connection/connection.php";
		include "lib_user.php";

		if($conn){

			$oneUser = new User();

			$id = mysqli_real_escape_string($conn,$_POST['id']);
			$celular = mysqli_real_escape_string($conn,$_POST['celular']);
			$task = mysqli_real_escape_string($conn,$_POST['tasks']);
			$file = basename($_FILES["my_file"]["name"]);

			if(($id == '') || ($celular == '')){
				echo 5; // there are fields empty
			}else{
				$oneUser->updateUserInfo($oneUser,$id,$celular,$task,$file,$conn,$db_basename);
			}

		}else{
			echo 7; // connection failure
		}




?>