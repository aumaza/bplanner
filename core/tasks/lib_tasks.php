<?php

class Tasks{

	// PROPERTIES
		private $nro_ticket = '';
		private $date_ticket = '';
		private $module = '';
		private $taker = '';
		private $require = '';
		private $date_from = '';
		private $date_to = '';
		private $state = '';

	// CONSTRUCTOR
		function __contruct(){
			$this->nro_ticket = '';
			$this->date_ticket = '';
			$this->module = '';
			$this->taker = '';
			$this->require = '';
			$this->date_from = '';
			$this->date_to = '';
			$this->state = '';
		}

	// SETTERS
		private function setNroTicket($var){
			$this->nro_ticket = $var;
		}

		private function setDateTicket($var){
			$this->date_ticket = $var;
		}

		private function setModule($var){
			$this->module = $var;
		}

		private function setTaker($var){
			$this->taker = $var;
		}

		private function setRequire($var){
			$this->require = $var;
		}

		private function setDateFrom($var){
			$this->date_from = $var;
		}

		private function setDateTo($var){
			$this->date_to = $var;
		}

		private function setState($var){
			$this->state = $var;
		}

	// GETTERS
		private function getNroTicket($var){
			return $this->nro_ticket = $var;
		}

		private function getDateTicket($var){
			return $this->date_ticket = $var;
		}

		private function getModule($var){
			return $this->module = $var;
		}

		private function getTaker($var){
			return $this->taker = $var;
		}

		private function getRequire($var){
			return $this->require = $var;
		}

		private function getDateFrom($var){
			return $this->date_from = $var;
		}

		private function getDateTo($var){
			return $this->date_to = $var;
		}

		private function getState($var){
			return $this->state = $var;
		}


	// METHODS

	/*
	** LIST OF TASKS
	*/
	public function listTaks($oneTask,$conn,$db_basename){

		if($conn)
        {
            $sql = "SELECT * FROM bp_ticket";
                mysqli_select_db($conn,$db_basename);
                $resultado = mysqli_query($conn,$sql);
            //mostramos fila x fila
            $count = 0;
   echo '<div class="container-fluid">
	      <div class="jumbotron">
	      <h2><span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span> Tickets</h2><hr>

	      <form action="#" method="POST">
                    
            <button type="submit" class="btn btn-primary btn-sm" name="new_ticket" data-toggle="tooltip" data-placement="top" title="Agregar un Nuevo Ticket">
             <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Ticket</button>
                                
        </form><hr>';
          
   echo "<table class='table table-condensed table-hover' style='width:100%' id='ticketsTable'>";
   echo "<thead>
         <th class='text-nowrap text-center'>Nro. Ticket</th>
         <th class='text-nowrap text-center'>Fecha Solicitud</th>
         <th class='text-nowrap text-center'>Modulo</th>
         <th class='text-nowrap text-center'>Tomador</th>
         <th class='text-nowrap text-center'>Requerimiento</th>
         <th class='text-nowrap text-center'>Fecha Desde</th>
         <th class='text-nowrap text-center'>Fecha Hasta</th>
         <th class='text-nowrap text-center'>Estado</th>
         <th class='text-nowrap text-center'>Acciones</th>
         </thead>";


            while($fila = mysqli_fetch_array($resultado)){
                    // Listado normal
                    echo "<tr>";
                    
                    echo "<td align=center>".$oneTask->getNroTicket($fila['nro_ticket'])."</td>";
                    echo "<td align=center>".$oneTask->getDateTicket($fila['f_income'])."</td>";
                    echo "<td align=center>".$oneTask->getModule($fila['module'])."</td>";
                    echo "<td align=center>".$oneTask->getTaker($fila['owner'])."</td>";
                    echo "<td align=center>".$oneTask->getRequire($fila['request'])."</td>";
                    echo "<td align=center>".$oneTask->getDateFrom($fila['f_from'])."</td>";
                    echo "<td align=center>".$oneTask->getDateTo($fila['f_to'])."</td>";
                    
                    if($oneTask->getState($fila['status']) == 'Ingresado'){
                    	echo "<td align=center style='background-color: #aed6f1'>".$oneTask->getState($fila['status'])."</td>";
                	}
                	if($oneTask->getState($fila['status']) == 'Desarrollo'){
                		echo "<td align=center style='background-color: #d2b4de'>".$oneTask->getState($fila['status'])."</td>";
                	}
                	if($oneTask->getState($fila['status']) == 'Testing'){
                		echo "<td align=center style='background-color: #f7dc6f'>".$oneTask->getState($fila['status'])."</td>";
                	}
                	if($oneTask->getState($fila['status']) == 'Rechazado'){
                		echo "<td align=center style='background-color: #c0392b'>".$oneTask->getState($fila['status'])."</td>";
                	}
                	if($oneTask->getState($fila['status']) == 'Aprobado'){
                		echo "<td align=center style='background-color: #52be80'>".$oneTask->getState($fila['status'])."</td>";
                	}
                    
                    echo "<td class='text-nowrap' align=center>";

                    echo '<form action="#" method="POST">
                                <input type="hidden" id="id" name="id" value="'.$fila['id'].'" >
                                
                                <button type="submit" class="btn btn-default btn-sm" name="edit_ticket" data-toggle="tooltip" data-placement="top" title="Editar datos del Ticket">
                                	<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar</button>

                                <button type="submit" class="btn btn-default btn-sm" name="erase_ticket" data-toggle="tooltip" data-placement="top" title="Eliminar Ticket">
                                	<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</button>
                                
                                <button type="submit" class="btn btn-default btn-sm" name="forwards" data-toggle="tooltip" data-placement="top" title="Ver y agregar avances al Ticket">
                                	<span class="glyphicon glyphicon-tags" aria-hidden="true"></span> Avances</button>
                                
                                <button type="submit" class="btn btn-default btn-sm" name="extended_info" data-toggle="tooltip" data-placement="top" title="Ver Información Extendida del Ticket">
                                	<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Información Extendida</button>

                        </form>';
                    
                    
                    echo "</td>";
                    $count++;
                	}
                

                echo "</table>";
                echo "<hr>";
                echo '<div class="alert alert-info"><span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span> <strong>Cantidad de Tickets:</strong>  ' .$count.'</div><hr>';
                echo '</div></div>';
                }else{
                echo 'Connection Failure...' .mysqli_error($conn);
                }

            mysqli_close($conn);


	}


// =================================================================================================================================== //
// FORMS

/*
** FORM NEW TICKET
*/ 
public function formNewTicket($conn,$db_basename){

	echo '<div class="container">
			  <div class="jumbotron">
			    <h1><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar Nuevo Ticket</h1>      
			    <p>Aquí se cargarán los datos principales de un Ticket.</p><hr>
			    
			     <form id="fr_new_ticket_ajax" method="POST">
			     
			      <div class="form-group">
			        <label for="nro_ticket">Nro. Ticket:</label>
			        <input type="text" class="form-control" id="nro_ticket" name="nro_ticket">
			      </div>
			      <div class="form-group">
			        <label for="date_ticket">Fecha Ingreso:</label>
			        <input type="date" class="form-control" id="date_ticket" name="date_ticket">
			      </div>
			      <div class="form-group">
			        <label for="module">Modulo:</label>
			        <input type="text" class="form-control" id="module" name="module" placeholder="Ingrese aquí el nombre del Módulo al que referencia el ticket en cuestión">
			      </div>

			      <div class="form-group">
                            <label for="taker">Tomador:</label>
                            <select class="form-control" id="taker" name="taker" required>
                            <option value="" disabled selected>Seleccionar</option>';
                                
                                if($conn){
                                $query = "SELECT nombre FROM bp_usuarios order by nombre ASC";
                                mysqli_select_db($conn,$db_basename);
                                $res = mysqli_query($conn,$query);

                                if($res){
                                    while ($valores = mysqli_fetch_array($res)){
                                    	if($valores['nombre'] != 'Administrador'){
                                    		echo '<option value="'.$valores[nombre].'">'.$valores[nombre].'</option>';
                                    	}
                                    }
                                    }
                                }

                                //mysqli_close($conn);
                            
                            echo '</select>
                            </div>

			      <div class="form-group">
			        <label for="require">Requerimientos:</label>
			        	<textarea class="form-control" rows="5" id="require" name="require"></textarea>
			      </div>
			      <div class="form-group">
			        <label for="date_from">Fecha Desde:</label>
			        <input type="date" class="form-control" id="date_from" name="date_from">
			      </div>
			      <div class="form-group">
			        <label for="date_to">Fecha Hasta:</label>
			        <input type="date" class="form-control" id="date_to" name="date_to">
			      </div><br>

			      
			      <div class="alert alert-info">
			      	<button type="submit" class="btn btn-default btn-block" id="new_ticket"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Guardar</button>
			      </div>
			    </form><hr>

			    <div id="messageNewTicket"></div>
			    
			  </div>        
			</div>';

} // END OF FUNCTION


/*
** FORM EDIT TICKET
*/ 
public function formEditTicket($oneTask,$id,$conn,$db_basename){

	mysqli_select_db($conn,$db_basename);
	$sql = "select * from bp_ticket where id = '$id'";
	$qry = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($qry);

	echo '<div class="container">
			  <div class="jumbotron">
			    <h1><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edición de Ticket</h1>      
			    <p>Puede editar los datos del ticket en cuestión.</p><hr>
			    
			     <form id="fr_update_ticket_ajax" method="POST">
			     <input type="hidden" id="id" name="id" value="'.$id.'">
			     
			      <div class="form-group">
			        <label for="nro_ticket">Nro. Ticket:</label>
			        <input type="text" class="form-control" id="nro_ticket" name="nro_ticket" value="'.$oneTask->getNroTicket($row['nro_ticket']).'" readonly>
			      </div>
			      <div class="form-group">
			        <label for="date_ticket">Fecha Ingreso:</label>
			        <input type="date" class="form-control" id="date_ticket" name="date_ticket" value="'.$oneTask->getDateTicket($row['f_income']).'" readonly>
			      </div>
			      <div class="form-group">
			        <label for="module">Modulo:</label>
			        <input type="text" class="form-control" id="module" name="module" placeholder="Ingrese aquí el nombre del Módulo al que referencia el ticket en cuestión" value="'.$oneTask->getModule($row['module']).'">
			      </div>

			      <div class="form-group">
                            <label for="taker">Tomador:</label>
                            <select class="form-control" id="taker" name="taker" required>
                            <option value="" disabled selected>Seleccionar</option>';
                                
                                if($conn){
                                $query = "SELECT nombre FROM bp_usuarios order by nombre ASC";
                                mysqli_select_db($conn,$db_basename);
                                $res = mysqli_query($conn,$query);

                                if($res){
                                    while ($valores = mysqli_fetch_array($res)){
                                    	if($valores['nombre'] != 'Administrador'){
                                    		echo '<option value="'.$valores[nombre].'" '.("'$valores[nombre]'" == $oneTask->getTaker("'$row[owner]'") ? "selected" : "").'>'.$valores[nombre].'</option>';
                                    	}
                                    }
                                    }
                                }

                                //mysqli_close($conn);
                            
                            echo '</select>
                            </div>

			      <div class="form-group">
			        <label for="require">Requerimientos:</label>
			        	<textarea class="form-control" rows="5" id="require" name="require">'.$oneTask->getRequire($row['request']).'</textarea>
			      </div>
			      <div class="form-group">
			        <label for="date_from">Fecha Desde:</label>
			        <input type="date" class="form-control" id="date_from" name="date_from" value="'.$oneTask->getDateFrom($row['f_from']).'">
			      </div>
			      <div class="form-group">
			        <label for="date_to">Fecha Hasta:</label>
			        <input type="date" class="form-control" id="date_to" name="date_to" value="'.$oneTask->getDateTo($row['f_to']).'">
			      </div>

			      <div class="form-group">
			        <label for="state">Estado:</label>
			        <input type="text" class="form-control" id="state" name="state" value="'.$oneTask->getState($row['status']).'" readonly>
			      </div><br>
			      
			      <div class="alert alert-info">
			      	<button type="submit" class="btn btn-default btn-block" id="update_ticket"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Actualizar</button>
			      </div>
			    </form><hr>

			    <div id="messageUpdateTicket"></div>
			    
			  </div>        
			</div>';

} // END OF FUNCTION


/*
** FORM FOR TICKET DELETE
*/
public function formDeleteTicket($oneTask,$id,$conn,$db_basename){

	mysqli_select_db($conn,$db_basename);
	$sql = "select * from bp_ticket where id = '$id'";
	$query = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($query);

	echo '<div class="container">
			  <div class="jumbotron">
			    <h1><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar Ticket</h1>      
			    <div class="alert alert-info">
			    	<p><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Atención. Está por eliminar el registro del Ticket Nro.: '.$oneTask->getNroTicket($row['nro_ticket']).'</p>
			    </div><hr>';

			    if($oneTask->getState($row['status']) === 'Ingresado'){
			    
				  echo '<ul class="list-group">
						    <li class="list-group-item active">Fecha Ticket: <span class="badge">'.$oneTask->getDateTicket($row['f_income']).'</span></li>
						    <li class="list-group-item">Moludo: <span class="badge">'.$oneTask->getModule($row['module']).'</span></li>
						    <li class="list-group-item">Tomador: <span class="badge">'.$oneTask->getTaker($row['owner']).'</span></li>
						    <li class="list-group-item">Requerimientos: <span class="badge">'.$oneTask->getRequire($row['request']).'</span></li>
						    <li class="list-group-item">Fecha Desde: <span class="badge">'.$oneTask->getDateFrom($row['f_from']).'</span></li>
						    <li class="list-group-item">Fecha Hasta: <span class="badge">'.$oneTask->getDateTo($row['f_to']).'</span></li>
						    <li class="list-group-item">Estado: <span class="badge">'.$oneTask->getState($row['status']).'</span></li>
					  	</ul>

					  	<hr>
			  
						  <form id="fr_delete_ticket_ajax" method="POST">
						  	<input type="hidden" id="id" name="id" value="'.$id.'">
						  	 <button type="submit" class="btn btn-default btn-block" id="delete_ticket"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Aceptar</button>
						  </form><hr>
						    
						    <div id="messageDeleteTicket"></div>';

			    }else{

			    	echo '<div class="alert alert-warning">
						  	<strong><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Atención!</strong> El Ticket ya se encuentra en proceso de trabajo y no puede ser eliminado.
						 </div>';
			    }

		echo '</div>
			  </div>';

} // END OF FUNCTION


/*
** FORM EXTENDED INFO
*/
public function formExtendedInfo($oneTask,$id,$conn,$db_basename){

	mysqli_select_db($conn,$db_basename);
	// DATOS PRINCIPALES DEL TICKET
	$sql = "select * from bp_ticket where id = '$id'";
	$query = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($query);

	// DATOS DE LOS AVANCES
	$sql_1 = "select * from bp_ticket_track where id_ticket = '$id'";
	$query_1 = mysqli_query($conn,$sql_1);

	// SE OBTIENE EL DIRECTORIO DEL TICKET
	$sql_2 = "select files_path from bp_ticket_track where id_ticket = '$id'";
	$query_2 = mysqli_query($conn,$sql_2);
	$row_2 = mysqli_fetch_assoc($query_2);

	$path = $row_2['files_path'];

	if($filehandle = opendir($path)){

        $list = array();
        $count = 0;
    
        while($file = readdir($filehandle)){

            if($file != "." && $file != ".."){
            
                $list[] = $file;
                $count++;
            }
        }
    }
	

	echo '<div class="container">
			<div class="jumbotron">
			  <h2><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Información Extendida del Ticket Nro.: 
			  		<span class="badge">'.$oneTask->getNroTicket($row['nro_ticket']).'</span></h2><hr>
			  <ul class="list-group">
			    <li class="list-group-item active">Fecha Solicitud <span class="badge">'.$oneTask->getDateTicket($row['f_income']).'</span></li>
			    <li class="list-group-item">Modulo <span class="badge">'.$oneTask->getModule($row['module']).'</span></li>
			    <li class="list-group-item">Tomador <span class="badge">'.$oneTask->getTaker($row['owner']).'</span></li>
			    <li class="list-group-item">Requerimiento <span class="badge">'.$oneTask->getRequire($row['request']).'</span></li>
			    <li class="list-group-item">Fecha Entrega <span class="badge">'.$oneTask->getDateTo($row['f_to']).'</span></li>
			    <li class="list-group-item">Estado <span class="badge">'.$oneTask->getState($row['status']).'</span></li>
			  </ul><hr><br>

			  <h2><span class="glyphicon glyphicon-duplicate" aria-hidden="true"></span> Archivos Suplementarios </h2><hr>

			  	<div class="list-group">';
                        
                        for($i = 0; $i < $count; $i++){
                            echo '<a class="list-group-item" href="../tasks/download_file.php?file_name='.$list[$i].'&path='.$path.'" >'.($i+1). ' - ' .$list[$i].'</a>';
                        }       
                        
          echo '</div>
          		<div class="panel-footer"><strong>Cantidad de Archivos Suplementarios:</strong> <span class="badge">'.$count.'</span></div><hr><br>


			  
			  <h2><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> Avances del Ticket</h2><hr>';
			  

			  while($row_1 = mysqli_fetch_array($query_1)){
			  
			  echo '<div class="list-group">
			    
					    <li class="list-group-item active">Fecha Avance <span class="badge">'.$row_1['f_commit'].'</span></li>
					    <li class="list-group-item">Descripción Avance <span class="badge">'.$row_1['commit'].'</span></li>
					    <li class="list-group-item">Cantidad Horas <span class="badge">'.$row_1['cant_hours'].'</span></li>

					</div>';
			}
			  
			  
  echo '</div>
		</div>';

} // END OF FUNCTION

// =================================================================================================================================== //
// PERSISTENCE

/*
** FUNCTION ADD TASK TO DATABASE
*/
public function addTicket($oneTask,$nro_ticket,$date_ticket,$module,$taker,$require,$date_from,$date_to,$conn,$db_basename){

	mysqli_select_db($conn,$db_basename);
	$sql = "select * from bp_ticket where nro_ticket = '$nro_ticket'";
	$query = mysqli_query($conn,$sql);
	$rows = mysqli_num_rows($query);

	if($rows == 0){

		$state = 1;

		$sql_1 = "insert into bp_ticket".
					"(nro_ticket,f_income,module,owner,request,f_from,f_to,status)".
					"values ".
					"($oneTask->setNroTicket('$nro_ticket'),
					  $oneTask->setDateTicket('$date_ticket'),
					  $oneTask->setModule('$module'),
					  $oneTask->setTaker('$taker'),
					  $oneTask->setRequire('$require'),
					  $oneTask->setDateFrom('$date_from'),
					  $oneTask->setDateTo('$date_to'),
					  $oneTask->setState('$state'))";
		$query_1 = mysqli_query($conn,$sql_1);

		if($query_1){
			echo 1; //insert successfully
		}else{
			echo -1; // something go wrong
		}

	}

	if($rows > 0){
		echo 4; // ticket existente
	}

} // END OF FUNCTION


/*
** UPDATE INFO OF TICKET ON DATABASE
*/ 
public function updateTicket($oneTask,$id,$module,$taker,$require,$date_from,$date_to,$conn,$db_basename){

	mysqli_select_db($conn,$db_basename);
	$sql = "update bp_ticket set 
			module = $oneTask->setModule('$module'), 
			owner = $oneTask->setTaker('$taker'), 
			request = $oneTask->setRequire('$require'), 
			f_from = $oneTask->setDateFrom('$date_from'),
			f_to = $oneTask->setDateTo('$date_to')
			where id = '$id'";
	$query = mysqli_query($conn,$sql);

	if($query){
		echo 1; // update successfully
	}else{
		echo -1; // something go wrong
	}

} // END OF FUNCTION 


/*
** FUNCTION TO DELETE TICKET FROM DATABASE
*/
public function deleteTicket($id,$conn,$db_basename){

	mysqli_select_db($conn,$db_basename);
	$sql = "delete from bp_ticket where id = '$id'";
	$query = mysqli_query($conn,$sql);

	if($query){
		echo 1; // query ok
	}else{
		echo -1; // something go wrong
	}

} // END OF FUNCTION



} // END OF CLASS




?>
