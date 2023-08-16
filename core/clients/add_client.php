<?php include "../../connection/connection.php";
	  include "lib_client.php";

	  if($conn){

	  	$oneClient = new Clients();

	  	$razon_social = mysqli_real_escape_string($conn,$_POST['razon_social']);
	  	$responsable = mysqli_real_escape_string($conn,$_POST['responsable']);
	  	$direccion = mysqli_real_escape_string($conn,$_POST['direccion']);
	  	$localidad = mysqli_real_escape_string($conn,$_POST['localidad']);
	  	$provincia = mysqli_real_escape_string($conn,$_POST['provincia']);
	  	$pais = mysqli_real_escape_string($conn,$_POST['pais']);
	  	$cod_postal = mysqli_real_escape_string($conn,$_POST['cod_postal']);
	  	$telefono = mysqli_real_escape_string($conn,$_POST['telefono']);
	  	$email = mysqli_real_escape_string($conn,$_POST['email']);
	  	$cuit_cuil = mysqli_real_escape_string($conn,$_POST['cuil_cuit']);
	  	$file = basename($_FILES["myfile"]["name"]);

	  	if(($razon_social == '') ||
	  		($responsable == '') ||
	  			($direccion == '') ||
	  				($localidad == '') ||
	  					($provincia == '') ||
	  						($pais == '') ||
	  							($cod_postal == '') ||
	  								($telefono == '') ||
	  									($email == '') ||
	  										($cuit_cuil)){
	  		echo 5; // hay campos sin completar
	  	}else{
	  		$oneClient->addClient($oneClient,$razon_social,$responsable,$direccion,$localidad,$provincia,$pais,$cod_postal,$telefono,$email,$cuil_cuit,$file,$conn,$db_basename);
	  	}
 

	  }else{
	  	echo 11; // sin conexion
	  }






?>