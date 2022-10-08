<?php	include "../connection/connection.php";
		include "../core/lib/li_system.php";
		include "lib_regestry.php";

		if($conn){

			$oneRegestry = new Regestry();

			$name = mysqli_real_escape_string($conn,$_POST['name']);
			$email = mysqli_real_escape_string($conn,$_POST['email']);
			$celular = mysqli_real_escape_string($conn,$_POST['celular']);
			$task = mysqli_real_escape_string($conn,$_POST['tasks']);
			$file = $file = basename($_FILES["my_file"]["name"]);
			$password_1 = mysqli_real_escape_string($conn,$_POST['pwd_1']);
			$password_2 = mysqli_real_escape_string($conn,$_POST['pwd_2']);

				if(($name == '') ||
					($email == '') ||
						($celular == '') ||
							($task == '') ||
								($password_1 == '') ||
									($password_2 == '')){
					echo 15; // HAY CAMPOS SIN COMPLETAR
				}else{
					$oneRegestry->addRegestry($oneRegestry,$name,$email,$celular,$password_1,$password_2,$file,$task,$dbname,$conn);
				}

		}else{
			echo 5; // CONECTION FAILURE
		}



?>