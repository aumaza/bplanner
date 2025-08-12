<?php	include "../../connection/connection.php";


	$archivo = basename($_GET['file_name']);
	$path = $_GET['path'];
	$source = $path.'/'.$archivo;

	if (is_file($source)){

        header('Content-Type: application/force-download');
        header('Content-Disposition: attachment; filename='.$archivo);
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: '.filesize($source));
        readfile($source);
    }




?>