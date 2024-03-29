<?php

class Clients{
	
	// PROPERTIES
	// ================================================================================================ //
	private $razon_social = '';
	private $responsable = '';
	private $direccion = '';
	private $localidad = '';
	private $provincia = '';
	private $pais = '';
	private $cod_postal = '';
	private $telefono = '';
	private $email = '';
	private $cuit_cuil = '';
	private $logo = '';
	private $file_path = '';

	// CONSTRUCTOR
	// ================================================================================================ //
	function __constructor(){
		$this->razon_social = '';
		$this->responsable = '';
		$this->direccion = '';
		$this->localidad = '';
		$this->provincia = '';
		$this->pais = '';
		$this->cod_postal = '';
		$this->telefono = '';
		$this->email = '';
		$this->cuit_cuil = '';
		$this->logo = '';
		$this->file_path = '';
	}


	// SETTERS
	// ================================================================================================ //
	private function setRazonSocial($var){
		$this->razon_social = $var;
	}

	private function setResponsable($var){
		$this->responsable = $var;
	}

	private function setDireccion($var){
		$this->direccion = $var;
	}

	private function setLocalidad($var){
		$this->localidad = $var;
	}

	private function setProvincia($var){
		$this->provincia = $var;
	}

	private function setPais($var){
		$this->pais = $var;
	}

	private function setCodPostal($var){
		$this->cod_postal = $var;
	}

	private function setTelefono($var){
		$this->telefono = $var;
	}

	private function setEmail($var){
		$this->email = $var;
	}

	private function setCuitCuil($var){
		$this->cuit_cuil = $var;
	}

	private function setLogo($var){
		$this->logo = $var;
	}

	private function setFilePath($var){
		$this->file_path = $var;
	}



	// GETTERS
	// ================================================================================================ //
	private function getRazonSocial($var){
		return $this->razon_social = $var;
	}

	private function getResponsable($var){
		return $this->responsable = $var;
	}

	private function getDireccion($var){
		return $this->direccion = $var;
	}

	private function getLocalidad($var){
		return $this->localidad = $var;
	}

	private function getProvincia($var){
		return $this->provincia = $var;
	}

	private function getPais($var){
		return $this->pais = $var;
	}

	private function getCodPostal($var){
		return $this->cod_postal = $var;
	}

	private function getTelefono($var){
		return $this->telefono = $var;
	}

	private function getEmail($var){
		return $this->email = $var;
	}

	private function getCuitCuil($var){
		return $this->cuit_cuil = $var;
	}

	private function getLogo($var){
		return $this->logo = $var;
	}

	private function getFilePath($var){
		return $this->file_path = $var;
	}


	// METODOS
	// ================================================================================================ //

	/*
	*	LIST CLIENTS
	*	@oneTeam, @conn, @db_basename
	*/
	public function listClients($oneClient,$conn,$db_basename){

		
		if($conn){
            
	        $sql = "SELECT * FROM bp_clients";
			mysqli_select_db($conn,$db_basename);
	        $resultado = mysqli_query($conn,$sql);


            //mostramos fila x fila
            $count = 0;
   echo '<div class="container-fluid">
	      <div class="jumbotron">
	      <h2>
	      <footer class="container-fluid text-left">
	      		<span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> Clientes
	      </h2>
	      </footer>
	      <hr>

	      <form action="#" method="POST">
            <button type="submit" class="btn btn-primary btn-sm" name="add_client" data-toggle="tooltip" data-placement="top" title="Agregar un Nuevo Cliente">
             <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Cliente</button>
                                
        </form><hr>';
          
   echo "<table class='table table-condensed table-hover' style='width:100%' id='clientsTable'>";
   echo "<thead>
         <th class='text-nowrap text-center'><span class='label label-default'>Razón Social</span></th>
         <th class='text-nowrap text-center'><span class='label label-default'>Responsable</span></th>
         <th class='text-nowrap text-center'><span class='label label-default'>Dirección</span></th>
         <th class='text-nowrap text-center'><span class='label label-default'>Localidad</span></th>
         <th class='text-nowrap text-center'><span class='label label-default'>Provincia</span></th>
         <th class='text-nowrap text-center'><span class='label label-default'>País</span></th>
         <th class='text-nowrap text-center'><span class='label label-default'>Cod. Postal</span></th>
         <th class='text-nowrap text-center'><span class='label label-default'>Teléfono</span></th>
         <th class='text-nowrap text-center'><span class='label label-default'>Email</span></th>
         <th class='text-nowrap text-center'><span class='label label-default'>Cuil / Cuit</span></th>
         <th class='text-nowrap text-center'><span class='label label-warning'>Acciones</span></th>
         </thead>";


            while($fila = mysqli_fetch_array($resultado)){
                    // Listado normal
                    echo "<tr>";
                    
                    echo "<td align=center><span class='label label-info'>".$oneClient->getRazonSocial($fila['razon_social'])."</span></td>";
                    echo "<td align=center><span class='label label-default'>".$oneClient->getResponsable($fila['responsable'])."</span></td>";
                    echo "<td align=center><span class='label label-default'>".$oneClient->getDireccion($fila['direccion'])."</span></td>";
                    echo "<td align=center><span class='label label-default'>".$oneClient->getLocalidad($fila['localidad'])."</span></td>";
                    echo "<td align=center><span class='label label-default'>".$oneClient->getProvincia($fila['provincia'])."</span></td>";
                    echo "<td align=center><span class='label label-default'>".$oneClient->getPais($fila['pais'])."</span></td>";
                    echo "<td align=center><span class='label label-default'>".$oneClient->getCodPostal($fila['cod_postal'])."</span></td>";
                    echo "<td align=center><span class='label label-default'>".$oneClient->getTelefono($fila['telefono'])."</span></td>";
                    echo "<td align=center><span class='label label-default'>".$oneClient->getEmail($fila['email'])."</span></td>";
                    echo "<td align=center><span class='label label-default'>".$oneClient->getCuitCuil($fila['cuit_cuil'])."</span></td>";
                    
                    echo "<td class='text-nowrap' align=center>";

                    echo '<form action="#" method="POST">
                    			<input type="hidden" id="id" name="id" value="'.$fila['id'].'" >

                                <button type="submit" class="btn btn-default btn-sm" name="edit_client" data-toggle="tooltip" data-placement="top" title="Editar datos del cliente">
                                	<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar</button>
                                
                        </form>';
                    
                    
                    echo "</td>";
                    $count++;
                	}
                

                echo "</table>";
                echo "<hr>";
                echo '<footer class="container-fluid text-left"><span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span> <strong>Cantidad de Clientes:</strong>  <span class="badge">'.$count.'</span></footer><hr>';
                echo '</div></div>';
                }else{
                echo 'Connection Failure...' .mysqli_error($conn);
                }

            mysqli_close($conn);

    } // END OF METHOD


    // FORMULARIOS
	// ================================================================================================ //

    /*
    * FORMULARIO ALTA CLIENTE
    * @conn, @db_basename
    */
    public function formAddClient($conn,$db_basename){

    	echo '<div class="container">
				  <div class="jumbotron">
				    <h2>
				    <footer class="container-fluid text-left">
				    	<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Cliente</h2><hr>      
				    </footer>
				    
				    
				         <form id="form_add_client_ajax" method="POST" enctype="multipart/form-data">
				          
				          <div class="form-group">
				            <label for="razon_social"><span class="label label-default">Razón Social</span></label>
				            <input type="text" class="form-control" id="razon_social" name="razon_social">
				          </div>
				          
				          <div class="form-group">
				            <label for="responsable"><span class="label label-default">Responsable</span></label>
				            <input type="text" class="form-control" id="responsable" name="responsable">
				          </div>
				          
				           <div class="form-group">
				            <label for="direccion"><span class="label label-default">Dirección</span></label>
				            <input type="text" class="form-control" id="direccion" name="direccion">
				          </div>
				          
				           <div class="form-group">
				            <label for="localidad"><span class="label label-default">Localidad</span></label>
				            <input type="text" class="form-control" id="localidad" name="localidad">
				          </div>
				          
				          <div class="form-group">
				            <label for="provincia"><span class="label label-default">Provincia</span></label>
				            <input type="text" class="form-control" id="provincia" name="provincia">
				          </div>
				          
				          <div class="form-group">
			                <label for="pais"><span class="label label-default">País</span></label>
			                <select class="form-control" id="pais" name="pais">
			                <option value="" disabled selected>Seleccionar</option>';
			                    
			                    if($conn){
			                    $query = "SELECT * FROM bp_countries order by spanish_name ASC";
			                    mysqli_select_db($conn,$db_basename);
			                    $res = mysqli_query($conn,$query);

			                    if($res){
			                        while ($valores = mysqli_fetch_array($res)){
			                        	echo '<option value="'.$valores[iso_3].'">'.$valores[spanish_name].'</option>';
			                        	
			                        }
			                        }
			                    }

			                    //mysqli_close($conn);
			                
			      	echo '</select>
			        </div>
				          
				          <div class="form-group">
				            <label for="cod_postal"><span class="label label-default">Código Postal</span></label>
				            <input type="text" class="form-control" id="cod_postal" name="cod_postal">
				          </div>
				          
				          <div class="form-group">
				            <label for="telefono"><span class="label label-default">Teléfono</span></label>
				            <input type="text" class="form-control" id="telefono" name="telefono">
				          </div>
				          
				          <div class="form-group">
				            <label for="email"><span class="label label-default">Email</span></label>
				            <input type="email" class="form-control" id="email" name="email">
				          </div>
				          
				          <div class="form-group">
				            <label for="cuil_cuit"><span class="label label-default">Cuil / Cuit</span></label>
				            <input type="text" class="form-control" id="cuil_cuit" name="cuil_cuit">
				          </div>
				          
				           <footer class="container-fluid text-left">
				            <label for="my_file"><span class="label label-default">LOGO Empresa</span></label>
				            <input type="file" id="myfile" name="myfile">
				          </footer><br>
				                              
				          <button type="submit" class="btn btn-default btn-block" id="add_client"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Guardar</button>
				    	</form><hr> 
				  	
				  	<div id="messageAddClient"></div>

				  </div>
				        
				</div>';

    } // END OF FUNCTION


    /*
    * FORMULARIO EDITAR CLIENTE
    * @oneClient, @id, @conn, @db_basename
    */
    public function formEditClient($oneClient,$id,$conn,$db_basename){

    	mysqli_select_db($conn,$db_basename);

    	// SE PREPARA EL SQL
    	$sql = "select * from bp_clients where id = '$id'";
    	$query = mysqli_query($conn,$sql);
    	$row = mysqli_fetch_assoc($query);

    	echo '<div class="container">
				  <div class="jumbotron">
				    <h2>
				    <footer class="container-fluid text-left">
				    	<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar Cliente</h2><hr>      
				    </footer>
				    
				    
				         <form id="form_edit_client_ajax" method="POST" enctype="multipart/form-data">

				         <input type="hidden" id="id" name="id" value="'.$id.'">
				          
				          <div class="form-group">
				            <label for="razon_social"><span class="label label-default">Razón Social</span></label>
				            <input type="text" class="form-control" id="razon_social" name="razon_social" value="'.$oneClient->getRazonSocial($row['razon_social']).'">
				          </div>
				          
				          <div class="form-group">
				            <label for="responsable"><span class="label label-default">Responsable</span></label>
				            <input type="text" class="form-control" id="responsable" name="responsable" value="'.$oneClient->getResponsable($row['responsable']).'">
				          </div>
				          
				           <div class="form-group">
				            <label for="direccion"><span class="label label-default">Dirección</span></label>
				            <input type="text" class="form-control" id="direccion" name="direccion" value="'.$oneClient->getDireccion($row['direccion']).'">
				          </div>
				          
				           <div class="form-group">
				            <label for="localidad"><span class="label label-default">Localidad</span></label>
				            <input type="text" class="form-control" id="localidad" name="localidad" value="'.$oneClient->getLocalidad($row['localidad']).'">
				          </div>
				          
				          <div class="form-group">
				            <label for="provincia"><span class="label label-default">Provincia</span></label>
				            <input type="text" class="form-control" id="provincia" name="provincia" value="'.$oneClient->getProvincia($row['provincia']).'">
				          </div>
				          
				          <div class="form-group">
			                <label for="pais"><span class="label label-default">País</span></label>
			                <select class="form-control" id="pais" name="pais">
			                <option value="" disabled selected>Seleccionar</option>';
			                    
			                    if($conn){
			                    $query = "SELECT * FROM bp_countries order by spanish_name ASC";
			                    mysqli_select_db($conn,$db_basename);
			                    $res = mysqli_query($conn,$query);

			                    if($res){
			                        while ($valores = mysqli_fetch_array($res)){
			                        	echo '<option value="'.$valores[iso_3].'" '.( "'$valores[iso_3]'" == $oneClient->getPais("'$row[pais]'") ? "selected" : "").'>'.$valores[spanish_name].'</option>';
			                        	
			                        }
			                        }
			                    }

			                    //mysqli_close($conn);
			                
			      	echo '</select>
			        </div>
				          
				          <div class="form-group">
				            <label for="cod_postal"><span class="label label-default">Código Postal</span></label>
				            <input type="text" class="form-control" id="cod_postal" name="cod_postal" value="'.$oneClient->getCodPostal($row['cod_postal']).'">
				          </div>
				          
				          <div class="form-group">
				            <label for="telefono"><span class="label label-default">Teléfono</span></label>
				            <input type="text" class="form-control" id="telefono" name="telefono" value="'.$oneClient->getTelefono($row['telefono']).'">
				          </div>
				          
				          <div class="form-group">
				            <label for="email"><span class="label label-default">Email</span></label>
				            <input type="email" class="form-control" id="email" name="email" value="'.$oneClient->getEmail($row['email']).'">
				          </div>
				          
				          <div class="form-group">
				            <label for="cuil_cuit"><span class="label label-default">Cuil / Cuit</span></label>
				            <input type="text" class="form-control" id="cuil_cuit" name="cuil_cuit" value="'.$oneClient->getCuitCuil($row['cuit_cuil']).'">
				          </div>
				          
				           <footer class="container-fluid text-left">
				            <label for="my_file"><span class="label label-default">LOGO Empresa</span></label>
				            <input type="file" id="myfile" name="myfile">
				          </footer><br>
				                              
				          <button type="submit" class="btn btn-default btn-block" id="edit_client"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Guardar</button>
				    	</form><hr> 
				  	
				  	<div id="messageUpdateClient"></div>

				  </div>
				        
				</div>';

    } // END OF FUNCTION

    // PERSISTENCIA
	// ================================================================================================ //

    /*
    *	GUARDAR EN BASE DE DATOS REGISTRO DE NUEVLO CLIENTE 
    *	@oneClient, @razon_social, @responsable, @direccion, @localidad, @provincia, @pais, @cod_postal, @telefono, @email, @cuil_cuit, @file, @conn, @db_basename
    */
    public function addClient($oneClient,$razon_social,$responsable,$direccion,$localidad,$provincia,$pais,$cod_postal,$telefono,$email,$cuit_cuil,$file,$conn,$db_basename){

    	if ($conn) {

			$targetDir = '../logos/';
			$fileName  = $file;
			//$fileName = basename($_FILES["file"]["name"]);
			$dir            = opendir($targetDir);// SE ABRE EL DIECTORIO
			$targetFilePath = $targetDir.$fileName;

			$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

			if (!empty($_FILES["myfile"]["name"])) {
				// Allow certain file formats
				$allowTypes = array('jpg','png');

				if (in_array($fileType, $allowTypes)) {

					// Upload file to server
					if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $targetFilePath)) {

						closedir($dir);// SE CIERRA EL DIRECTORIO

						mysqli_select_db($conn, $db_basename);

						$sql = "INSERT INTO bp_clients ".
								"(razon_social,
		                          responsable,
		                          direccion,
		                          localidad,
		                          provincia,
		                          pais,
		                          cod_postal,
		                          telefono,
		                          email,
		                          cuit_cuil,
		                          logo,
		                          file_path
		                      	)".
								"VALUES ".
								"($oneClient->setRazonSocial('$razon_social'),
								  $oneClient->setResponsable('$responsable'),
								  $oneClient->setDireccion('$direccion'),
								  $oneClient->setLocalidad('$localidad'),
								  $oneClient->setProvincia('$provincia'),
								  $oneClient->setPais('$pais'),
								  $oneClient->setCodPostal('$cod_postal'),
								  $oneClient->setTelefono('$telefono'),
								  $oneClient->setEmail('$email'),
								  $oneClient->setCuitCuil('$cuit_cuil'),
								  $oneClient->setLogo('$file'),
								  $oneClient->setFilePath('$targetFilePath'))";

						$query = mysqli_query($conn, $sql);

						if ($query) {
							echo 1; // registro insertado correctamente
							//$success = '[Se ha guardado de manera exitosa resitro en la tabla Representación Paritarias]';
                			//mysqlSuccessLogs($success);
							
						} else {
							echo -1; // hubo un problema al insertar el registro
							//$myError = mysql_error($conn);
				            //$error = '[Se ha producido el error: ' .$myError. ' al intentar guardar en la tabla Representación Paritarias]';
				            //mysqlErrorLogs($error);
						}
					} else {
						echo 3; // no se ha podido subir el archivo
					}
				} else {
					echo 9; // solo se permiten archivos JPG, PNG
				}
			} else {
						
						mysqli_select_db($conn, $db_basename);

						$sql = "INSERT INTO bp_clients ".
								"(razon_social,
		                          responsable,
		                          direccion,
		                          localidad,
		                          provincia,
		                          pais,
		                          cod_postal,
		                          telefono,
		                          email,
		                          cuit_cuil
		                          )".
								"VALUES ".
								"($oneClient->setRazonSocial('$razon_social'),
								  $oneClient->setResponsable('$responsable'),
								  $oneClient->setDireccion('$direccion'),
								  $oneClient->setLocalidad('$localidad'),
								  $oneClient->setProvincia('$provincia'),
								  $oneClient->setPais('$pais'),
								  $oneClient->setCodPostal('$cod_postal'),
								  $oneClient->setTelefono('$telefono'),
								  $oneClient->setEmail('$email'),
								  $oneClient->setCuitCuil('$cuit_cuil'))";

						$query = mysqli_query($conn, $sql);

						if ($query) {
							echo 1; // registro insertado correctamente
							//$success = '[Se ha guardado de manera exitosa resitro en la tabla Representación Paritarias]';
                			//mysqlSuccessLogs($success);
							
						} else {
							echo -1; // hubo un problema al insertar el registro
							//$myError = mysql_error($conn);
				            //$error = '[Se ha producido el error: ' .$myError. ' al intentar guardar en la tabla Representación Paritarias]';
				            //mysqlErrorLogs($error);
						}
			}

		} else {
			echo 7; // no hay conexion
		}

    } // END OF FUNCTION


    /*
    *	ACTUALIZAR EN BASE DE DATOS REGISTRO DE NUEVLO CLIENTE 
    *	@oneClient, $id, @razon_social, @responsable, @direccion, @localidad, @provincia, @pais, @cod_postal, @telefono, @email, @cuil_cuit, @file, @conn, @db_basename
    */
    public function updateClient($oneClient,$id,$razon_social,$responsable,$direccion,$localidad,$provincia,$pais,$cod_postal,$telefono,$email,$cuit_cuil,$file,$conn,$db_basename){

    	if ($conn) {

			$targetDir = '../logos/';
			$fileName  = $file;
			//$fileName = basename($_FILES["file"]["name"]);
			$dir            = opendir($targetDir);// SE ABRE EL DIECTORIO
			$targetFilePath = $targetDir.$fileName;

			$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

			if (!empty($_FILES["myfile"]["name"])) {
				// Allow certain file formats
				$allowTypes = array('jpg','png');

				if (in_array($fileType, $allowTypes)) {

					// Upload file to server
					if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $targetFilePath)) {

						closedir($dir);// SE CIERRA EL DIRECTORIO

						mysqli_select_db($conn, $db_basename);

						// SE PREPARA EL SQL
						$sql = "update bp_clients set 
								razon_social = $oneClient->setRazonSocial('$razon_social'),
								responsable = $oneClient->setResponsable('$responsable'),
								direccion = $oneClient->setDireccion('$direccion'),
								localidad = $oneClient->setLocalidad('$localidad'),
								provincia = $oneClient->setProvincia('$provincia'),
								pais = $oneClient->setPais('$pais'),
								cod_postal = $oneClient->setCodPostal('$cod_postal'),
								telefono = $oneClient->setTelefono('$telefono'),
								email = $oneClient->setEmail('$email'),
								cuit_cuil = $oneClient->setCuitCuil('$cuit_cuil'),
								logo = $oneClient->setLogo('$file'),
								file_path = $oneClient->setFilePath('$targetFilePath')
								where id = '$id'";

						$query = mysqli_query($conn, $sql);

						if ($query) {
							echo 1; // registro insertado correctamente
							//$success = '[Se ha guardado de manera exitosa resitro en la tabla Representación Paritarias]';
                			//mysqlSuccessLogs($success);
							
						} else {
							echo -1; // hubo un problema al insertar el registro
							//$myError = mysql_error($conn);
				            //$error = '[Se ha producido el error: ' .$myError. ' al intentar guardar en la tabla Representación Paritarias]';
				            //mysqlErrorLogs($error);
						}
					} else {
						echo 3; // no se ha podido subir el archivo
					}
				} else {
					echo 9; // solo se permiten archivos JPG, PNG
				}
			} else {
						
						mysqli_select_db($conn, $db_basename);

						// SE PREPARA EL SQL
						$sql = "update bp_clients set 
								razon_social = $oneClient->setRazonSocial('$razon_social'),
								responsable = $oneClient->setResponsable('$responsable'),
								direccion = $oneClient->setDireccion('$direccion'),
								localidad = $oneClient->setLocalidad('$localidad'),
								provincia = $oneClient->setProvincia('$provincia'),
								pais = $oneClient->setPais('$pais'),
								cod_postal = $oneClient->setCodPostal('$cod_postal'),
								telefono = $oneClient->setTelefono('$telefono'),
								email = $oneClient->setEmail('$email'),
								cuit_cuil = $oneClient->setCuitCuil('$cuit_cuil')
								where id = '$id'";

						$query = mysqli_query($conn, $sql);

						if ($query) {
							echo 1; // registro insertado correctamente
							//$success = '[Se ha guardado de manera exitosa resitro en la tabla Representación Paritarias]';
                			//mysqlSuccessLogs($success);
							
						} else {
							echo -1; // hubo un problema al insertar el registro
							//$myError = mysql_error($conn);
				            //$error = '[Se ha producido el error: ' .$myError. ' al intentar guardar en la tabla Representación Paritarias]';
				            //mysqlErrorLogs($error);
						}
			}

		} else {
			echo 7; // no hay conexion
		}

    } // END OF FUNCTION

} // END OF CLASS




?>