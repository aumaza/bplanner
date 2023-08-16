<?php

class Projects{

	// PROPERTIES
	// ================================================================================================ //	
	private $project = '';
	private $client = '';
	private $project_leader = '';
	private $functional = '';
	private $technologies = '';
	private $requeriments = '';
	private $status = '';

	// CONSTRUCTOR
	// ================================================================================================ //
	
	function __construct(){
		$this->project = '';
		$this->cliente = '';
		$this->project_leader = '';
		$this->functional = '';
		$this->technologies = '';
		$this->requeriments = '';
		$this->status = '';
	} 

	// SETTERS
	// ================================================================================================ //

	private function setProject($var){
		$this->project = $var;
	}

	private function setClient($var){
		$this->client = $var;
	}

	private function setProjectLeader($var){
		$this->project_leader = $var;
	}

	private function setFunctional($var){
		$this->functional = $var;
	}

	private function setTechnologies($var){
		$this->technologies = $var;
	}

	private function setRequeriments($var){
		$this->requeriments = $var;
	}

	private function setStatus($var){
		$this->status = $var;
	}

	// GETTERS
	// ================================================================================================ //

	private function getProject($var){
		return $this->project = $var;
	}

	private function getClient($var){
		return $this->client = $var;
	}

	private function getProjectLeader($var){
		return $this->project_leader = $var;
	}

	private function getFunctional($var){
		return $this->functional = $var;
	}

	private function getTechnologies($var){
		return $this->technologies = $var;
	}

	private function getRequeriments($var){
		return $this->requeriments = $var;
	}

	private function getStatus($var){
		return $this->status = $var;
	}

	// METHODS
	// ================================================================================================ //

	/*
	* LIST ALL PROJECTS
	* @oneProject, @conn, @db_basename
	*/
	public function listProjects($oneProject,$conn,$db_basename){

		$status_cero = 'Suspendido';
		$status_uno = 'Inactivo';
		$status_dos = 'Activo';
		$status_tres = 'Mantenimiento';
		$status_cuatro = 'Entregado';

		if($conn)
        {
            
	        $sql = "SELECT * FROM bp_projects";
	        mysqli_select_db($conn,$db_basename);
	        $resultado = mysqli_query($conn,$sql);

            

            //mostramos fila x fila
            $count = 0;
   echo '<div class="container-fluid">
	      <div class="jumbotron">
	      <h2>
	      <footer class="container-fluid text-left">
	      		<span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Proyectos
	      </h2>
	      </footer>
	      <hr>

	      <form action="#" method="POST">
                    
            <button type="submit" class="btn btn-primary btn-sm" name="new_project" data-toggle="tooltip" data-placement="top" title="Agregar un Nuevo Proyecto">
             <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Proyecto</button>
                                
        </form><hr>';
          
   echo "<table class='table table-condensed table-hover' style='width:100%' id='projectsTable'>";
   echo "<thead>
         <th class='text-nowrap text-center'><span class='label label-default'>Proyecto</span></th>
         <th class='text-nowrap text-center'><span class='label label-default'>Cliente</span></th>
         <th class='text-nowrap text-center'><span class='label label-default'>Project Leader</span></th>
         <th class='text-nowrap text-center'><span class='label label-default'>Funcional</span></th>
         <th class='text-nowrap text-center'><span class='label label-default'>Tecnologías</span></th>
         <th class='text-nowrap text-center'><span class='label label-default'>Estado</span></th>
         <th class='text-nowrap text-center'><span class='label label-warning'>Acciones</span></th>
         </thead>";


            while($fila = mysqli_fetch_array($resultado)){
                    // Listado normal
                    echo "<tr>";
                    
                    echo "<td align=center><span class='label label-info'>".$oneProject->getProject($fila['project'])."</span></td>";
                    echo "<td align=center><span class='label label-default'>".$oneProject->getClient($fila['client'])."</span></td>";
                    echo "<td align=center><span class='label label-default'>".$oneProject->getProjectLeader($fila['project_leader'])."</span></td>";
                    echo "<td align=center><span class='label label-default'>".$oneProject->getFunctional($fila['functional'])."</span></td>";
                    echo "<td align=center>".$oneProject->getTechnologies($fila['technologies'])."</td>";
                    
                    if($oneProject->getStatus($fila['status']) == '0'){
                    	echo "<td align=center><span class='label label-danger'>".$status_cero."</span></td>";
                	}
                	if($oneProject->getStatus($fila['status']) == '1'){
                		echo "<td align=center><span class='label label-warning'>".$status_uno."</span></td>";
                	}
                	if($oneProject->getStatus($fila['status']) == '2'){
                		echo "<td align=center><span class='label label-info'>".$status_dos."</span></td>";
                	}
                	if($oneProject->getStatus($fila['status']) == '3'){
                		echo "<td align=center><span class='label label-primary'>".$status_tres."</span></td>";
                	}
                	if($oneProject->getStatus($fila['status']) == '4'){
                		echo "<td align=center><span class='label label-success'>".$status_cuatro."</span></td>";
                	}
                    
                    echo "<td class='text-nowrap' align=center>";

                    echo '<form action="#" method="POST">
                                <input type="hidden" id="id" name="id" value="'.$fila['id'].'" >
                                
                                <button type="submit" class="btn btn-default btn-sm" name="edit_project" data-toggle="tooltip" data-placement="top" title="Editar datos del Proyecto">
                                	<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar</button>

                                <button type="submit" class="btn btn-default btn-sm" name="team" data-toggle="tooltip" data-placement="top" title="Ver y/o agregar Miembros al Equipo">
                                	<span class="glyphicon glyphicon-tags" aria-hidden="true"></span> Team</button>
                                
                                <button type="submit" class="btn btn-default btn-sm" name="extended_info_project" data-toggle="tooltip" data-placement="top" title="Ver Información Extendida del Proyecto">
                                	<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Información Extendida</button>

                        </form>';
                    
                    
                    echo "</td>";
                    $count++;
                	}
                

                echo "</table>";
                echo "<hr>";
                echo '<footer class="container-fluid text-left"><span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span> <strong>Cantidad de Proyectos:</strong>  <span class="badge">'.$count.'</span></footer><hr>';
                echo '</div></div>';
                }else{
                echo 'Connection Failure...' .mysqli_error($conn);
                }

            mysqli_close($conn);

    } // END OF METHOD


    // FORMULARIOS
	// ================================================================================================ //


    public function formAddProject($conn,$db_basename){

    	echo '<div class="container">
				  <div class="jumbotron">
				    
				    <footer class="container-fluid text-left">
				    <h2>
				    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Proyecto
				    </h2>
				    </footer><hr>
				        
				         <form id="form_add_project_ajax" method="POST">
				            <div class="form-group">
				              <label for="project"><span class="badge">Proyecto</span></label>
				              <input type="text" class="form-control" id="project" name="project">
				            </div>

				            <div class="form-group">
			                <label for="client"><span class="badge">Cliente</span></label>
			                <select class="form-control" id="client" name="client">
			                <option value="" disabled selected>Seleccionar</option>';
			                    
			                    if($conn){
			                    $query = "SELECT * FROM bp_clients";
			                    mysqli_select_db($conn,$db_basename);
			                    $res = mysqli_query($conn,$query);

			                    if($res){
			                        while ($valores = mysqli_fetch_array($res)){
			                        	echo '<option value="'.$valores[razon_social].'">'.$valores[razon_social].'</option>';
			                        	
			                        }
			                        }
			                    }

			                    //mysqli_close($conn);
			                
			      	echo '</select>
			        </div>
				            
				           <div class="form-group">
			                <label for="project_leader"><span class="badge">Project Leader</span></label>
			                <select class="form-control" id="project_leader" name="project_leader">
			                <option value="" disabled selected>Seleccionar</option>';
			                    
			                    if($conn){
			                    $query = "SELECT * FROM bp_usuarios order by nombre ASC";
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
			                      </div>';

			        echo'<div class="form-group">
			                <label for="functional"><span class="badge">Funcional</span></label>
			                <select class="form-control" id="functional" name="functional">
			                <option value="" disabled selected>Seleccionar</option>';
			                    
			                    if($conn){
			                    $query = "SELECT * FROM bp_usuarios order by nombre ASC";
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

			                <div class="alert alert-info" align=center>
							  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <strong>Importante!</strong> Esta sección es de vital importancia. Servirá posteriormente a los desarrolladores como consulta de las directivas principales del proyecto. Por favor, la información debe ser clara y específica.
							</div>

				             <div class="form-group">
				              <label for="technologies"><span class="badge">Describa las tecnologías en las que se basa el proyecto</span></label>
				              <textarea class="form-control" rows="5" id="technologies" name="technologies"></textarea>
				            </div>

				            <div class="form-group">
				              <label for="requeriments"><span class="badge">Análisis Funcional / Requerimientos</span></label>
				              <textarea class="form-control" rows="5" id="requeriments" name="requeriments"></textarea>
				            </div>
				            
				            <button type="submit" class="btn btn-default btn-block" id="add_project"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Guardar</button>
				          
				          </form></hr> 
				  			
				  			<div id="messageNewProject"></div>
				  </div>        
				</div>';

    } // END OF FUNCTION


    public function formEditProject($oneProject,$id,$conn,$db_basename){

    	mysqli_select_db($conn,$db_basename);
    	// SE REALIZA LA CONSULTA
    	$sql = "select * from bp_projects where id = '$id'";
    	$query = mysqli_query($conn,$sql);
    	$row = mysqli_fetch_assoc($query);

    	echo '<div class="container">
				  <div class="jumbotron">
				    
				    <footer class="container-fluid text-left">
				    <h2>
				    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar Proyecto
				    </h2>
				    </footer><hr>
				        
				         <form id="form_edit_project_ajax" method="POST">
				         <input type="hidden" id="id" name="id" value="'.$id.'">

				            <div class="form-group">
				              <label for="project"><span class="badge">Proyecto</span></label>
				              <input type="text" class="form-control" id="project" name="project" value="'.$oneProject->getProject($row['project']).'">
				            </div>
				            
				            <div class="form-group">
				              <label for="cliente"><span class="badge">Cliente</span></label>
				              <input type="text" class="form-control" id="client" name="client" value="'.$oneProject->getClient($row['client']).'">
				            </div>';

				    echo'<div class="form-group">
			                <label for="project_leader"><span class="badge">Project Leader</span></label>
			                <select class="form-control" id="project_leader" name="project_leader">
			                <option value="" disabled selected>Seleccionar</option>';
			                    
			                    if($conn){
			                    $query = "SELECT * FROM bp_usuarios order by nombre ASC";
			                    mysqli_select_db($conn,$db_basename);
			                    $res = mysqli_query($conn,$query);

			                    if($res){
			                        while ($valores = mysqli_fetch_array($res)){
			                        	if($valores['nombre'] != 'Administrador'){
			                        		echo '<option value="'.$valores[nombre].'" '.( "'$valores[nombre]'" == $oneProject->getProjectLeader("'$row[project_leader]'") ? "selected" : "").'>'.$valores[nombre].'</option>';
			                        	}
			                        }
			                        }
			                    }

			                    //mysqli_close($conn);
			                
			                echo '</select>
			                      </div>';

			        echo'<div class="form-group">
			                <label for="functional"><span class="badge">Funcional</span></label>
			                <select class="form-control" id="functional" name="functional">
			                <option value="" disabled selected>Seleccionar</option>';
			                    
			                    if($conn){
			                    $query = "SELECT * FROM bp_usuarios order by nombre ASC";
			                    mysqli_select_db($conn,$db_basename);
			                    $res = mysqli_query($conn,$query);

			                    if($res){
			                        while ($valores = mysqli_fetch_array($res)){
			                        	if($valores['nombre'] != 'Administrador'){
			                        		echo '<option value="'.$valores[nombre].'" '.( "'$valores[nombre]'" == $oneProject->getFunctional("'$row[functional]'") ? "selected" : "").'>'.$valores[nombre].'</option>';
			                        	}
			                        }
			                    }
			                    }

			                    //mysqli_close($conn);
			                
			                echo '</select>
			                      </div>

			                <div class="alert alert-info" align=center>
							  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <strong>Importante!</strong> Esta sección es de vital importancia. Servirá posteriormente a los desarrolladores como consulta de las directivas principales del proyecto. Por favor, la información debe ser clara y específica.
							</div>

				             <div class="form-group">
				              <label for="technologies"><span class="badge">Describa las tecnologías en las que se basa el proyecto</span></label>
				              <textarea class="form-control" rows="5" id="technologies" name="technologies">'.$oneProject->getTechnologies($row['technologies']).'</textarea>
				            </div>

				            <div class="form-group">
				              <label for="requeriments"><span class="badge">Análisis Funcional / Requerimientos</span></label>
				              <textarea class="form-control" rows="5" id="requeriments" name="requeriments">'.$oneProject->getRequeriments($row['requeriments']).'</textarea>
				            </div>

				             <div class="form-group">
							  <label for="status"><span class="badge">Estado</span></label>
							  <select class="form-control" id="status" name="status">
							    <option value="" selected disabled>Seleccionar</option>
							    <option value="0" '.("0" == $oneProject->getStatus($row['status']) ? "selected" : "").'>Suspendido</option>
							    <option value="1" '.("1" == $oneProject->getStatus($row['status']) ? "selected" : "").'>Inactivo</option>
							    <option value="2" '.("2" == $oneProject->getStatus($row['status']) ? "selected" : "").'>Activo</option>
							    <option value="3" '.("3" == $oneProject->getStatus($row['status']) ? "selected" : "").'>Mantenimiento</option>
							    <option value="4" '.("4" == $oneProject->getStatus($row['status']) ? "selected" : "").'>Entregado</option>
							  </select>
							</div> 
				            
				            <button type="submit" class="btn btn-default btn-block" id="edit_project"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Actualizar</button>
				          
				          </form></hr> 
				  			
				  			<div id="messageEditProject"></div>
				  </div>        
				</div>';

    } // END OF FUNCTION


    // PERSISTECIA
	// ================================================================================================ //

	/*
	** PERSISTENCIA A BASE DE REGISTRO NUEVO PROYECTO
	** @oneProject, @project, @client, @project_leader, @functional, @technologies, @requeriments, @conn, @db_basename 
	*/
	public function addProject($oneProject,$project,$client,$project_leader,$functional,$technologies,$requeriments,$conn,$db_basename){

		$status = '2';
		mysqli_select_db($conn,$db_basename);

		// SE CREA EL SQL
		$sql = "INSERT INTO bp_projects ".
			   "(project,
			   	 client,
			   	 project_leader,
			   	 functional,
			   	 technologies,
			   	 requeriments,
			   	 status
			   	 )".
			   	 "VALUES ".
			   	 "($oneProject->setProject('$project'),
			   	   $oneProject->setClient('$client'),
			   	   $oneProject->setProjectLeader('$project_leader'),
			   	   $oneProject->setFunctional('$functional'),
			   	   $oneProject->setTechnologies('$technologies'),
			   	   $oneProject->setRequeriments('$requeriments'),
			   	   $oneProject->setStatus('$status'))";

		$query = mysqli_query($conn,$sql);

		if($query){
			echo 1; // insert successfylly
		}else{
			echo -1; // error on insert
		}

	} // END OF FUNCTION





	/*
	** PERSISTENCIA A BASE DE REGISTRO EDITAR PROYECTO
	** @oneProject, @id, @project, @client, @project_leader, @functional, @technologies, @requeriments, @status, @conn, @db_basename 
	*/
	public function updateProject($oneProject,$id,$project,$client,$project_leader,$functional,$technologies,$requeriments,$status,$conn,$db_basename){

		mysqli_select_db($conn,$db_basename);

		// SE CREA EL SQL
		$sql = "update bp_projects set 
				project = $oneProject->setProject('$project'),
			   	client = $oneProject->setClient('$client'),
			   	project_leader = $oneProject->setProjectLeader('$project_leader'),
			   	functional = $oneProject->setFunctional('$functional'),
			   	technologies = $oneProject->setTechnologies('$technologies'),
			   	requeriments = $oneProject->setRequeriments('$requeriments'),
			   	status = $oneProject->setStatus('$status') where id = '$id'";
			   	
		$query = mysqli_query($conn,$sql);

		if($query){
			echo 1; // insert successfylly
		}else{
			echo -1; // error on insert
		}

	} // END OF FUNCTION


} // END OF CLASS



?>