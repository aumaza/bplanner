<?php

/*
** CARGADOR DE MAIN NAV-BAR
*/
function mainNavBar($nombre,$avatar){
	
	$find = 'c';
	$pos = strpos($avatar, $find);

	
	switch($pos){

		case 3: $imagen = '..'.substr($avatar, 7); break;

		case 6: $imagen = '..'.substr($avatar, 10); break;
	}

	echo '<nav class="navbar navbar-inverse">
			  <div class="container-fluid">
			    <div class="navbar-header">
			      <li><button class="btn btn-success navbar-btn" data-toggle="tooltip" data-placement="top" title="BPlanner development tracker"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> BPlanner</button></li>
			    </div>
			    
			    <div class="btn-group navbar-btn">
				     <form action="#" method="POST">
				        <button type="submit" class="btn btn-default" name="home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</button>
				    
				        <div class="btn-group">
				          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" data-toggle="tooltip" title="Menú Inicio">
				          	<span class="glyphicon glyphicon-flash" aria-hidden="true"></span> Menú <span class="caret"></span></button>
				          <ul class="dropdown-menu" role="menu">
				            
				          	<li><button type="submit" class="btn btn-default btn-block" name="projects"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Proyectos</button></li>

				            <li><button type="submit" class="btn btn-default btn-block" name="tickets"><span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span> Tickets</button></li>
							
							<li><button type="submit" class="btn btn-default btn-block" name="calcular_horas_mes">
								<span class="glyphicon glyphicon-usd" aria-hidden="true"></span> Calcular Horas Mes</button></li>';

							    if($nombre === 'Administrador'){
							        echo '<li><button type="submit" class="btn btn-default btn-block" name="users"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Usuarios</button></li>';
							    }
				    echo '</ul>
				        </div>
				       </form>
				      </div> 
			    
			    <ul class="nav navbar-nav navbar-right">';
			    if($imagen != '..'){
			      echo '<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><img src="'.$imagen.'" lt="Avatar" class="avatar" > '.$nombre.' <span class="caret"></span></a>';
			    }else if($imagen === '..'){
			      echo '<li class="dropdown">
			      			<a class="dropdown-toggle" data-toggle="dropdown" href="#"><img src="../avatars/tools-report-bug.png" lt="Avatar" class="avatar" > '.$nombre.' <span class="caret"></span></a>';
			    }
			        
		  echo '<ul class="dropdown-menu">
			        <form action="#" method="POST">
			          <li><button type="submit" class="btn btn-default btn-block" name="user_edit"><span class="glyphicon glyphicon-flash" aria-hidden="true"></span> Mis Datos</button></li>
			          <li><button type="submit" class="btn btn-default btn-block" name="change_password"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Cambiar Password</button></li>
			          <li><button type="submit" class="btn btn-danger btn-block" name="logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Salir</button></li>
			        </form>
			        </ul>
			      </li>
			    </ul>
			    
			  </div>
			</nav>';

}


?>