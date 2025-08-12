<?php	include "../../connection/connection.php";
		include "lib_ticket_track.php";

		if($conn){

			$oneTicketTrack = new TicketTrack();

			$id_ticket = mysqli_real_escape_string($conn,$_POST['id_ticket']);
			$nro_ticket = mysqli_real_escape_string($conn,$_POST['nro_ticket']);
			$advance = mysqli_real_escape_string($conn,$_POST['advance']);
			$cant_hours = mysqli_real_escape_string($conn,$_POST['cant_hours']);
			$state = mysqli_real_escape_string($conn,$_POST['state']);
			$files[] = array($_FILES["files"]["name"]);

			if(($id_ticket == '') || ($nro_ticket == '') || ($advance == '') || ($cant_hours == '') || ($state == '')){
				echo 5; // there is fields empty
			}else{
				$oneTicketTrack->addTicketTrack($oneTicketTrack,$id_ticket,$nro_ticket,$advance,$cant_hours,$files,$state,$conn,$db_basename);
			}



		}else{
			echo 7; // CONNECTION FAILURE
		}


?>