<?php

class Teams{
	
	// PROPERTIES
	// ================================================================================================ //

	private $id_project = '';
	private $member = '';
	private $function = '';

	// CONSTRUCTOR
	// ================================================================================================ //

	function __constructor(){
		$this->id_project = '';
		$this->member = '';
		$this->function = '';
	}

	// SETTERS
	// ================================================================================================ //

	private function setIdProject($var){
		$this->id_project = $var;
	}

	private function setMember($var){
		$this->member = $var;
	}

	private function setFunction($var){
		$this->function = $var;
	}


	// GETTERS
	// ================================================================================================ //

	private function getIdProject($var){
		return $this->id_project = $var;
	}

	private function getMember($var){
		return $this->member = $var;
	}

	private function getFunction($var){
		return $this->function = $var;
	}


	// METHODS
	// ================================================================================================ //

	/*
	*	LIST TEAM MEMBERS
	*	@oneTeam, @id_project, @conn, @db_basename
	*/
	public function listTeams($oneTeam,$id_project,$conn,$db_basename){

		$function_1 = 'Developer';
		$function_2 = 'Sys Admin';
		$function_3 = 'Functional';
		$function_4 = 'Tester';
		$function_5 = 'Designer';
		$function_6 = 'Data Analitics';
		
		if($conn){
            
	        //$sql = "SELECT * FROM bp_teams where id_project = '$id_project'";
			$sql = "select t.*, p.project from bp_teams as t left join bp_projects as p on t.id_project = '$id_project' and p.id = '$id_project'";
	        mysqli_select_db($conn,$db_basename);
	        $resultado = mysqli_query($conn,$sql);


            //mostramos fila x fila
            $count = 0;
   echo '<div class="container-fluid">
	      <div class="jumbotron">
	      <h2>
	      <footer class="container-fluid text-left">
	      		<span class="glyphicon glyphicon-user" aria-hidden="true"></span> Miembros del Equipo
	      </h2>
	      </footer>
	      <hr>

	      <form action="#" method="POST">
            <input type="hidden" id="id_project" name="id_project" value="'.$id_project.'">
            <button type="submit" class="btn btn-primary btn-sm" name="add_member" data-toggle="tooltip" data-placement="top" title="Agregar un Nuevo Miembro">
             <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Miembro</button>
                                
        </form><hr>';
          
   echo "<table class='table table-condensed table-hover' style='width:100%' id='teamsTable'>";
   echo "<thead>
         <th class='text-nowrap text-center'><span class='label label-default'>Proyecto</span></th>
         <th class='text-nowrap text-center'><span class='label label-default'>Miembro</span></th>
         <th class='text-nowrap text-center'><span class='label label-default'>Función</span></th>
         <th class='text-nowrap text-center'><span class='label label-warning'>Acciones</span></th>
         </thead>";


            while($fila = mysqli_fetch_array($resultado)){
                    // Listado normal
                    echo "<tr>";
                    
                    echo "<td align=center><span class='label label-info'>".$fila['project']."</span></td>";
                    echo "<td align=center><span class='label label-default'>".$oneTeam->getMember($fila['member'])."</span></td>";
                    if($oneTeam->getFunction($fila['function']) == "1"){
                    	echo "<td align=center><span class='label label-default'>".$oneTeam->getFunction($function_1)."</span></td>";
                	}else if($oneTeam->getFunction($fila['function']) == "2"){
                		echo "<td align=center><span class='label label-default'>".$oneTeam->getFunction($function_2)."</span></td>";
                	}else if($oneTeam->getFunction($fila['function']) == "3"){
                		echo "<td align=center><span class='label label-default'>".$oneTeam->getFunction($function_3)."</span></td>";
                	}else if($oneTeam->getFunction($fila['function']) == "4"){
                		echo "<td align=center><span class='label label-default'>".$oneTeam->getFunction($function_4)."</span></td>";
                	}else if($oneTeam->getFunction($fila['function']) == "5"){
                		echo "<td align=center><span class='label label-default'>".$oneTeam->getFunction($function_5)."</span></td>";
                	}else if($oneTeam->getFunction($fila['function']) == "6"){
                		echo "<td align=center><span class='label label-default'>".$oneTeam->getFunction($function_6)."</span></td>";
                	}
                    
                    echo "<td class='text-nowrap' align=center>";

                    echo '<form action="#" method="POST">
                    			<input type="hidden" id="id_project" name="id_project" value="'.$id_project.'">
                                <input type="hidden" id="id" name="id" value="'.$fila['id'].'" >

                                <a data-toggle="modal" data-target="#modalMemberErase" href="#" data-id="'.$fila['id'].'" data-toggle="tooltip" data-placement="top" title="Quitar miembro del Proyecto" class="btn btn-default btn-sm">
                                    <span class="glyphicon glyphicon-minus-sign"></span> Quitar</a>
                                
                                <button type="submit" class="btn btn-default btn-sm" name="change_function" data-toggle="tooltip" data-placement="top" title="Modificar Funciones en el equipo">
                                	<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Modificar Funciones</button>

                        </form>';
                    
                    
                    echo "</td>";
                    $count++;
                	}
                

                echo "</table>";
                echo "<hr>";
                echo '<footer class="container-fluid text-left"><span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span> <strong>Cantidad de Miembros:</strong>  <span class="badge">'.$count.'</span></footer><hr>';
                echo '</div></div>';
                }else{
                echo 'Connection Failure...' .mysqli_error($conn);
                }

            mysqli_close($conn);

    } // END OF METHOD


    // FORMULARIOS
	// ================================================================================================ //
    /*
    * FORMULARIO DE ALTA DE MIEMBRO DE PROYECTO
    *	@id_project, @conn, @db_basename
    */
    public function formAddMember($id_project,$conn,$db_basename){
    	

    	$sql = "select project from bp_projects where id = '$id_project'";
    	$qry = mysqli_query($conn,$sql);
    	$row = mysqli_fetch_assoc($qry);

		echo '<div class="container">
					<div class="jumbotron">
					<h2>
					<footer class="container-fluid text-left">
					<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Añadir Miembro al Proyecto <strong><i>'.$row['project'].'</i></strong></h2>
					</footer><hr>
  
				   <form id="fr_new_member_ajax" method="POST">
				    
				    <input type="hidden" id="id_project" name="id_project" value="'.$id_project.'">

				    <div class="form-group">
			                <label for="member"><span class="badge">Miembro</span></label>
			                <select class="form-control" id="member" name="member" readonly>
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
					  <label for="functions"><span class="badge">Tareas / Funciones</span></label>
					  <select class="form-control" id="functions" name="functions">
					    <option value="" selected disabled>Seleccionar</option>
					    <option value="1">Developer</option>
					    <option value="2">Sys Admin</option>
					    <option value="3">Functional</option>
					    <option value="4">Tester</option>
					    <option value="5">Designer</option>
					    <option value="6">Data Analitics</option>
					  </select>
					</div>

				    
				    <button type="submit" class="btn btn-default btn-block" id="new_member"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Guardar</button>
					
				  </form><hr>

				  <div id="messageNewMember"></div>
				  
				</div>
				</div>';

	} // END OF FUNCTION


	/*
    * FORMULARIO DE MODIFICACION DE FUNCIONES DE MIEMBRO DE PROYECTO
    *	@id_project, @conn, @db_basename
    */
    public function formEditMemberFunction($oneTeam,$id_project,$id,$conn,$db_basename){
    	
    	// SE CONSULTA EL PROYECTO
    	$sql = "select project from bp_projects where id = '$id_project'";
    	$qry = mysqli_query($conn,$sql);
    	$row = mysqli_fetch_assoc($qry);

    	// SE CONSULTA EL MIEMBRO DEL EQUIPO
    	$sql_1 = "select * from bp_teams where id = '$id'";
    	$qry_1 = mysqli_query($conn,$sql_1);
    	$row_1 = mysqli_fetch_assoc($qry_1);

		echo '<div class="container">
					<div class="jumbotron">
					<h2>
					<footer class="container-fluid text-left">
					<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar funciones del Miembro en Proyecto <strong><i>'.$row['project'].'</i></strong></h2>
					</footer><hr>
  
				   <form id="fr_update_member_ajax" method="POST">
				    
				    <input type="hidden" id="id_project" name="id_project" value="'.$id_project.'">
				    <input type="hidden" id="id" name="id" value="'.$id.'">

				    <div class="form-group">
			                <label for="member"><span class="badge">Miembro</span></label>
			                <select class="form-control" id="member" name="member" disabled>
			                <option value="" disabled selected>Seleccionar</option>';
			                    
			                    if($conn){
			                    $query = "SELECT nombre FROM bp_usuarios order by nombre ASC";
			                    mysqli_select_db($conn,$db_basename);
			                    $res = mysqli_query($conn,$query);

			                    if($res){
			                        while ($valores = mysqli_fetch_array($res)){
			                        	if($valores['nombre'] != 'Administrador'){
			                        		echo '<option value="'.$valores[nombre].'" '.("'$valores[nombre]'" == $oneTeam->getMember("'$row_1[member]'") ? "selected" : "").'>'.$valores[nombre].'</option>';
			                        	}
			                        }
			                        }
			                    }

			                    //mysqli_close($conn);
			                
			      	echo '</select>
			        </div>


				     <div class="form-group">
					  <label for="functions"><span class="badge">Tareas / Funciones</span></label>
					  <select class="form-control" id="functions" name="functions">
					    <option value="" selected disabled>Seleccionar</option>
					    <option value="1" '.("'1'" == $oneTeam->getFunction("'$row_1[function]'") ? "selected" : "").'>Developer</option>
					    <option value="2" '.("'2'" == $oneTeam->getFunction("'$row_1[function]'") ? "selected" : "").'>Sys Admin</option>
					    <option value="3" '.("'3'" == $oneTeam->getFunction("'$row_1[function]'") ? "selected" : "").'>Functional</option>
					    <option value="4" '.("'4'" == $oneTeam->getFunction("'$row_1[function]'") ? "selected" : "").'>Tester</option>
					    <option value="5" '.("'5'" == $oneTeam->getFunction("'$row_1[function]'") ? "selected" : "").'>Designer</option>
					    <option value="6" '.("'6'" == $oneTeam->getFunction("'$row_1[function]'") ? "selected" : "").'>Data Analitics</option>
					  </select>
					</div>

				    
				    <button type="submit" class="btn btn-default btn-block" id="update_member"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Actualizar</button>
					
				  </form><hr>

				  <div id="messageUpdateMember"></div>
				  
				</div>
				</div>';

	} // END OF FUNCTION


	// PERSISTENCIA
	// ================================================================================================ //
    /*
    * PERSISTENCIA A BASE DE MIEMBRO DE PROYECTO
    *	@oneTeam, @id_project, @member, @functions, @conn, @db_basename
    */
    public function addMember($oneTeam,$id_project,$member,$functions,$conn,$db_basename){

    	mysqli_select_db($conn,$db_basename);
    	
    	// SE VERIFICA QUE NO SE CARGUE EL MISMO MIEMBRO DOS VECES AL MISMO PROYECTO
    	$sql = "select * from bp_teams where id_project = '$id_project' and member = '$member'";
    	$query = mysqli_query($conn,$sql);
    	$rows = mysqli_num_rows($query);

    	if($rows == 0){

    		$sql_1 = "INSERT INTO bp_teams ".
    				 "(id_project, member, function) ".
    				 "VALUES ".
    				 "($oneTeam->setIdProject('$id_project'),
    				   $oneTeam->setMember('$member'),
    				   $oneTeam->setFunction('$functions'))";
    		$query_1 = mysqli_query($conn,$sql_1);

    		if($query_1){
    			echo 1; // insert success
    		}else{
    			echo -1; // insert error
    		}

    	}else if($rows > 0){
    		echo 9; // el proyecto ya cuenta con el miembro seleccionado
    	}
    } // END OF FUNCTION


    /*
    * PERSISTENCIA A BASE DE EDICION DE FUNCIONES DE MIEMBRO EN PROYECTO
    *	@oneTeam, @id, @id_project, @functions, @conn, @db_basename
    */
    public function updateMember($oneTeam,$id,$functions,$conn,$db_basename){

    	mysqli_select_db($conn,$db_basename);
    	// SE PREPARA EL SQL
    	$sql = "update bp_teams set function = $oneTeam->setFunction('$functions') where id = '$id'";
    	$query = mysqli_query($conn,$sql);

    	if($query){
    		echo 1; // insert success
    	}else{
    		echo -1; // error on insert
    	}

    } // END OF FUNCTION


    /*
    * PERSISTENCIA A BASE DE EDICION ELIMINAR MIEMBRO EN PROYECTO
    *	@id, @conn, @db_basename
    */
    public function deleteMember($id,$conn,$db_basename){

    	mysqli_select_db($conn,$db_basename);
    	// SE PREPARA EL SQL
    	$sql = "delete from bp_teams where id = '$id'";
    	$query = mysqli_query($conn,$sql);

    	if($query){
    		echo 1; // delete success
    	}else{
    		echo -1; // error on delete
    	}

    } // END OF FUNCTION



    public function modalMemberErase(){
    

    echo '<div id="modalMemberErase" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">
                        <span class="glyphicon glyphicon-minus-sign"></span> Quitar Miembro del Equipo</h4>
                </div>
                <div class="modal-body">
                    
                    <form id="frm_quitar_miembro_ajax" method="POST">
                    <input type="hidden" class="form-control" name="bookId" id="bookId" value="bookId">
                        
                        <div class="alert alert-danger">
						  <span class="glyphicon glyphicon-warning-sign"></span> <strong>Atención!</strong> Está por quitar un miembro del equipo
						</div>
                        <button type="submit" class="btn btn-success" id="quitar_miembro">
                            <span class="glyphicon glyphicon-ok"></span> Aceptar</button>
                    </form><br>

                    <div id="messageDeleteMember"></div>

                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remove-circle"></span> Cerrar</button>
                </div>
                </div>

            </div>
            </div>';

}


} // END OF CLASS



?>