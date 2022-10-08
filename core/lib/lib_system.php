<?php


/*
** Funcion que carga el skeleto del sistema
*/

function skeleton(){

  echo '<link rel="stylesheet" href="/bplanner/skeleton/css/bootstrap.min.css" >
		<link rel="stylesheet" href="/bplanner/skeleton/css/bootstrap-theme.css" >
		<link rel="stylesheet" href="/bplanner/skeleton/css/bootstrap-theme.min.css" >
		<link rel="stylesheet" href="/bplanner/skeleton/css/scrolling-nav.css" >
			
		<link rel="stylesheet" href="/bplanner/skeleton/Chart.js/Chart.min.css" >
		<link rel="stylesheet" href="/bplanner/skeleton/Chart.js/Chart.css" >
		
		<link rel="stylesheet" href="/bplanner/skeleton/css/jquery.dataTables.min.css" >
		<link rel="stylesheet" href="/bplanner/skeleton/dataTables/buttons.dataTables.min.css" >
		<link rel="stylesheet" href="/bplanner/skeleton/css/buttons.dataTables.min.css" >
		<link rel="stylesheet" href="/bplanner/skeleton/css/buttons.bootstrap.min.css" >
		<link rel="stylesheet" href="/bplanner/skeleton/css/jquery.dataTables-1.11.5.min.css" >
		<link rel="stylesheet" href="/bplanner/skeleton/dataTables/fixedColumns.dataTables.min.css" >
		
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
	    
	    <script src="/bplanner/skeleton/js/jquery-3.4.1.min.js"></script>
	    <script src="/bplanner/skeleton/js/jquery-3.5.1.min.js"></script>
		<script src="/bplanner/skeleton/js/bootstrap.min.js"></script>
		
		<script src="/bplanner/skeleton/js/jquery.dataTables.min.js"></script>
		<script src="/bplanner/skeleton/dataTables/DataTables/js/jquery.dataTables1.min.js"></script>
		<script src="/bplanner/skeleton/dataTables/DataTables/js/dataTables.fixedColumns.min.js"></script>
		
		<script src="/bplanner/skeleton/js/dataTables.editor.min.js"></script>
		<script src="/bplanner/skeleton/js/dataTables.select.min.js"></script>
		<script src="/bplanner/skeleton/js/dataTables.buttons.min.js"></script>
		<script src="/bplanner/skeleton/dataTables/DataTables/js/buttons.colVis.min.js"></script>
		
		<script src="/bplanner/skeleton/js/jszip.min.js"></script>
		<script src="/bplanner/skeleton/js/pdfmake.min.js"></script>
		<script src="/bplanner/skeleton/js/vfs_fonts.js"></script>
		<script src="/bplanner/skeleton/js/buttons.html5.min.js"></script>
		<script src="/bplanner/skeleton/js/buttons.bootstrap.min.js"></script>
		<script src="/bplanner/skeleton/js/buttons.print.min.js"></script>
		
		<script src="/bplanner/skeleton/js/bootbox/bootbox.all.js"></script>
		<script src="/bplanner/skeleton/js/bootbox/bootbox.all.min.js"></script>
		<script src="/bplanner/skeleton/js/bootbox/bootbox.js"></script>
		<script src="/bplanner/skeleton/js/bootbox/bootbox.locales.js"></script>
		<script src="/bplanner/skeleton/js/bootbox/bootbox.locales.min.js"></script>
		<script src="/bplanner/skeleton/js/bootbox/bootbox.min.js"></script>
		
		<script src="/bplanner/skeleton/Chart.js/Chart.min.js"></script>
		<script src="/bplanner/skeleton/Chart.js/Chart.bundle.min.js"></script>
		<script src="/bplanner/skeleton/Chart.js/Chart.bundle.js"></script>
		<script src="/bplanner/skeleton/Chart.js/Chart.js"></script>';
}


function formLogIn(){

		echo '<div class="container">
					<div class="jumbotron">
  
				   <form action="index.php" method="POST">
				    <div class="form-group">
				      <label for="email">Usuario:</label>
				      <input type="email" class="form-control" id="user" name="user" placeholder="Ingrese su email">
				    </div>
				    <div class="form-group">
				      <label for="pwd">Password:</label>
				      <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Ingrese su password">
				    </div>
				    
				    <button type="submit" class="btn btn-primary btn-block" name="login"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Ingresar</button>
				    <button type="reset" class="btn btn-warning btn-block"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Limpiar</button>
				  </form><hr>
				  
				</div>
				</div>';

}


function flyerConnFailure(){

		echo '<div class="container">
				  <div class="jumbotron">
				    <h1><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Atención</h1><hr>
				    <div class="alert alert-danger">    
				    	<p>Sin Conexión a la Base de Datos. Contactese con el Administrador.</p>
				    </div><hr>
				  </div>';

}


?>