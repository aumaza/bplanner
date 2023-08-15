<?php	include "../../connection/connection.php";
		include "lib_ticket_track.php";

		if($conn){

			$oneTicketTrack = new TicketTrack();

			$id = mysqli_real_escape_string($conn,$_POST['id']);
			$id_ticket = mysqli_real_escape_string($conn,$_POST['id_ticket']);
			$nro_ticket = mysqli_real_escape_string($conn,$_POST['nro_ticket']);
			$advance = mysqli_real_escape_string($conn,$_POST['advance']);
			$cant_hours = mysqli_real_escape_string($conn,$_POST['cant_hours']);
			$state = mysqli_real_escape_string($conn,$_POST['state']);
			$files[] = array($_FILES["files"]["name"]);

			if(($id == '') || ($id_ticket == '') || ($nro_ticket == '') || ($advance == '') || ($cant_hours == '') || ($state == '')){
				echo 5; // there is fields empty
			}else{
				$oneTicketTrack->updateTicketTrack($oneTicketTrack,$id_ticket,$id,$nro_ticket,$advance,$cant_hours,$files,$state,$conn,$db_basename);
			}



		}else{
			echo 7; // CONNECTION FAILURE
		}


?>