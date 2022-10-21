<?php 


class TicketTrack{
	
// PROPERTIES
	private $id_ticket = '';
	private $date_commit = '';
	private $commit = '';
	private $cant_hours = '';
	private $file_path = '';
	private $amount = '';

// CONSTRUCTOR 
	function __construct(){
		$this->id_ticket = '';
		$this->date_commit = '';
		$this->commit = '';
		$this->cant_hours = '';
		$this->file_path = '';
		$this->amount = '';
	}

// SETTERS
	private function setIdTicket($var){
		$this->id_ticket = $var;
	}

	private function setDateCommit($var){
		$this->date_commit = $var;
	}

	private function setCommit($var){
		$this->commit = $var;
	}

	private function setCantHours($var){
		$this->cant_hours = $var;
	}

	private function setAmount($var){
		$this->amount = $var;
	}

	private function setFilePath($var){
		$this->file_path = $var;
	}

// GETTERS
	private function getIdTicket($var){
		return $this->id_ticket = $var;
	}

	private function getDateCommit($var){
		return $this->date_commit = $var;
	}

	private function getCommit($var){
		return $this->commit = $var;
	}

	private function getCantHours($var){
		return $this->cant_hours = $var;
	}

	private function getAmount($var){
		return $this->amount = $var;
	}

	private function getFilePath($var){
		return $this->file_path = $var;
	}


// METHODS

/*
** LIST OF TICKET TRACK
*/
public function listTicketTrack($oneTicketTrack,$id_ticket,$conn,$db_basename){

	$message_1 = 'Aún no se han cargado Archivos';
	$message_2 = 'Contiene Archivos de Referencia';

	if($conn)
        {
            // SE BUSCAN LOS DATOS DEL TICKET
            $sql = "SELECT * FROM bp_ticket where id = '$id_ticket'";
            mysqli_select_db($conn,$db_basename);
            $query = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($query);

            // SE LISTAN LOS AVANCEN DE DICHO TICKET
            $sql_1 = "select * from bp_ticket_track where id_ticket = '$id_ticket'";
            $query_1 = mysqli_query($conn,$sql_1);

            //mostramos fila x fila
            $count = 0;
   echo '<div class="container-fluid">
	      <div class="jumbotron">
	      <h2><span class="glyphicon glyphicon-tags" aria-hidden="true"></span> Avances del Ticket '.$row['nro_ticket'].'</h2><hr>

	      <form action="#" method="POST">
            <input type="hidden" id="id_ticket" name="id_ticket" value="'.$id_ticket.'">

            <button type="submit" class="btn btn-primary btn-sm" name="new_track" data-toggle="tooltip" data-placement="top" title="Agregar Avance Ticket">
             <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Avance</button>
                                
        </form><hr>';
          
   echo "<table class='table table-condensed table-hover' style='width:100%' id='trackTable'>";
   echo "<thead>
         <th class='text-nowrap text-center'>Fecha Avance</th>
         <th class='text-nowrap text-center'>Avance</th>
         <th class='text-nowrap text-center'>Cantidad Horas</th>
         <th class='text-nowrap text-center'>Monto Parcial</th>
         <th class='text-nowrap text-center'>Acciones</th>
         </thead>";


            while($fila = mysqli_fetch_array($query_1)){
                    // Listado normal
                    echo "<tr>";
                    
                    echo "<td align=center>".$oneTicketTrack->getDateCommit($fila['f_commit'])."</td>";
                    echo "<td align=center>".$oneTicketTrack->getCommit($fila['commit'])."</td>";
                    echo "<td align=center>".$oneTicketTrack->getCantHours($fila['cant_hours'])."</td>";
                    echo "<td align=center>$".$oneTicketTrack->getAmount($fila['amount'])."</td>";
                                       
                    echo "<td class='text-nowrap' align=center>";

                    echo '<form action="#" method="POST">
                                <input type="hidden" id="id" name="id" value="'.$fila['id'].'" >
                                
                                <button type="submit" class="btn btn-default btn-sm" name="edit_ticket_track" data-toggle="tooltip" data-placement="top" title="Editar Datos del Avance">
                                	<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar</button>

                                <button type="submit" class="btn btn-default btn-sm" name="erase_ticket_track" data-toggle="tooltip" data-placement="top" title="Eliminar Avance">
                                	<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</button>
                                                                
                        </form>';
                    
                    
                    echo "</td>";
                    $count++;
                	}
                

                echo "</table>";
                echo "<hr>";
                echo '<div class="alert alert-info"><span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span> <strong>Cantidad de Avances:</strong>  ' .$count.'</div><hr>';
                echo '</div></div>';
                }else{
                echo 'Connection Failure...' .mysqli_error($conn);
                }

            mysqli_close($conn);

} // END OF FUNCTION


// ==================================================================================================================================================== //
// FORMS

/*
** FORM FOR NEW TRACK
*/
public function formNewTrack($id_ticket,$conn,$db_basename){

	// CAPTURAMOS LOS DATOS DEL TICKET
	mysqli_select_db($conn,$db_basename);
	$sql = "select * from bp_ticket where id = '$id_ticket'";
	$query = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($query);
	$nro_ticket = $row['nro_ticket'];

	// SE BUSCA SI ES EL PRIMER AVANCE A GENERAR
	$sql_1 = "select max(f_commit) as fecha from bp_ticket_track where id_ticket = '$id_ticket'";
	$query_1 = mysqli_query($conn,$sql_1);
	$row_1 = mysqli_fetch_assoc($query_1);

	echo '<div class="container">
		  <div class="jumbotron">
		    <h2><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Avance para el Ticket Nro.: <span class="badge">'.$nro_ticket.'</span></h2>      
		    <p>Agregue los avances que considere necesarios a dicho ticket.</p><hr>';

		    if($row_1['fecha'] == ''){

			    echo '<div class="alert alert-success">
				  		<marquee><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Aún no se han cargado avances para este Ticket.</marquee>
					 </div><hr>';
			}else if($row_1['fecha'] != ''){
				echo '<div class="alert alert-warning">
				  		<marquee><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> El último avance fué cargado la fecha: '.$row_1['fecha'].'</marquee>
					 </div><hr>';
			}
		    
	echo '<form id="fr_new_advance_ticket_ajax" method="POST" enctype="multipart/form-data">
		     <input type="hidden" id="id_ticket" name="id_ticket" value="'.$id_ticket.'">
		     <input type="hidden" id="nro_ticket" name="nro_ticket" value="'.$nro_ticket.'">
		      
		     <div class="form-group">
				 <label for="advance">Descripción Avance / Commit:</label>
				  	<textarea class="form-control" rows="5" id="advance" name="advance" placeholder="Ingrese una explicación de los ajustes realizados"></textarea>
			</div>
		      
		      <div class="form-group">
		        <label for="cant_hours">Cantidad de Horas:</label>
		        <input type="number" class="form-control" id="cant_hours" name="cant_hours" min="1">
		      </div><br>

		      <div class="alert alert-info">
				  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <strong>Importante</strong> Si posee archivos de imégenes como capturas de pantalla o documentación puede agregarlos al contenido, para facilitar la comprensión del avance en cuestión. Recuerde que esta información será de utilidad en el futuro.-
			  </div>

		      <div class="form-group">
				<label for="my_file">Seleccione archivo:</label>
	  			<input type="file" id="files" name="files[]" multiple="">
  			  </div><br>

  			  <div class="alert alert-info">
				  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <strong>Información:</strong> El estado actual es: <span class="badge">'.$row['status'].'</span>
			  </div>
		      
		      <div class="form-group">
				<label for="state">Estado:</label>
				<select class="form-control" id="state" name="state">
				  <option value="" disabled selected>Seleccionar</option>
				  <option value="1" '.($row['status'] == 'Ingresado' ? 'hidden' : '').'>Ingresado</option>
				  <option value="2" '.($row['status'] == 'Desarrollo' ? 'hidden' : '').'>Desarrollo</option>
				  <option value="3" '.($row['status'] == 'Testing' ? 'hidden' : '').'>Testing</option>
				  <option value="4" '.($row['status'] == 'Rechazado' ? 'hidden' : '').'>Rechazado</option>
				  <option value="5" '.($row['status'] == 'Aprobado' ? 'hidden' : '').'>Aprobado</option>
				</select>
			 </div><br>
		      
		      
			<div class="alert alert-info">
		      <button type="submit" class="btn btn-default btn-block" id="new_advance"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Guardar</button>
		    </div>
		    </form><hr>
		    
		    <div id="messageNewTrack"></div>
		    
		  </div>
		        
		</div>';

} // END OF FUNCTION


// ==================================================================================================================================================== //
// PERSINTENCE

/*
** ADD ADVANCE TO DATABASE
*/
public function addTicketTrack($oneTicketTrack,$id_ticket,$nro_ticket,$advance,$cant_hours,$files,$state,$conn,$db_basename){

	$actual_date = date("Y-m-d");
	$valor_hora = 1300;

	
		$targetDir = '../trackers/'.$nro_ticket;
		//$fileName = $file;
		

		if(!file_exists($targetDir)){

			mkdir($targetDir);
			chmod($targetDir,0777);

			
				foreach($_FILES['files']['tmp_name'] as $key => $tmp_name){

					if($_FILES["files"]["name"][$key]){

						$fileName = $_FILES['files']['name'][$key];
						$source = $_FILES['files']['tmp_name'][$key];
						$dir = opendir($targetDir);
						$targetFilePath = $targetDir.'/'.$fileName;

						$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

						// Allow certain file formats
						$allowTypes = array('png','jpg','doc','docx','odt','xls','xlsx','pdf');
											    
						    if(in_array($fileType, $allowTypes)){
								
						    	// Upload file to server
						        move_uploaded_file($source, $targetFilePath);
						        closedir($dir);
		                            
								
							}else{
								echo 4; // wrong format
								break;
							}
					}
				}

				$cant_hours = intVal($cant_hours);
				$amount = $cant_hours * $valor_hora;
				$amount = floatVal($amount);

				mysqli_select_db($conn,$db_basename);
				$sql = "insert into bp_ticket_track ".
				    	"(id_ticket,f_commit,cant_hours,amount,commit,files_path)".
						"values ".
						"($oneTicketTrack->setIdTicket('$id_ticket'),
						  $oneTicketTrack->setDateCommit('$actual_date'),
						  $oneTicketTrack->setCantHours('$cant_hours'),
						  $oneTicketTrack->setAmount('$amount'),
						  $oneTicketTrack->setCommit('$advance'),
						  $oneTicketTrack->setFilePath('$targetDir'))";
				$query = mysqli_query($conn,$sql);

					if($query){
		                                    
		                $sql_1 = "update bp_ticket set status = '$state' where id = '$id_ticket'";
		                $query_1 = mysqli_query($conn,$sql_1);
		                                    
						if($query_1){
							echo 1; // insert and update successfully
						}else{
							echo -2; // error when attemp udapte
						}
					}else{
						echo -1; // there is an error when attempt insert
					}
				
			

		}else{
			
			//echo 10; // estoy aca
			foreach($_FILES['files']['tmp_name'] as $key => $tmp_name){

					if($_FILES["files"]["name"][$key]){

						$fileName = $_FILES['files']['name'][$key];
						$source = $_FILES['files']['tmp_name'][$key];
						$dir = opendir($targetDir);
						$targetFilePath = $targetDir.'/'.$fileName;

						$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

						// Allow certain file formats
						$allowTypes = array('png','jpg','doc','docx','odt','xls','xlsx','pdf');
											    
						    if(in_array($fileType, $allowTypes)){
								
						    	// Upload file to server
						        move_uploaded_file($source, $targetFilePath);
						        closedir($dir);
		                            
								
							}else{
								echo 4; // wrong format
								break;
							}
					}
				}

				$cant_hours = intVal($cant_hours);
				$amount = $cant_hours * $valor_hora;
				$amount = floatVal($amount);

				mysqli_select_db($conn,$db_basename);
				$sql = "insert into bp_ticket_track ".
				    	"(id_ticket,f_commit,cant_hours,amount,commit,files_path)".
						"values ".
						"($oneTicketTrack->setIdTicket('$id_ticket'),
						  $oneTicketTrack->setDateCommit('$actual_date'),
						  $oneTicketTrack->setCantHours('$cant_hours'),
						  $oneTicketTrack->setAmount('$amount'),
						  $oneTicketTrack->setCommit('$advance'),
						  $oneTicketTrack->setFilePath('$targetDir'))";
				$query = mysqli_query($conn,$sql);

					if($query){
		                                    
		                $sql_1 = "update bp_ticket set status = '$state' where id = '$id_ticket'";
		                $query_1 = mysqli_query($conn,$sql_1);
		                                    
						if($query_1){
							echo 1; // insert and update successfully
						}else{
							echo -2; // error when attemp udapte
						}
					}else{
						echo -1; // there is an error when attempt insert
					}
			
		}

	

} // END OF FUNCTION




} // END OF CLASS



?>
