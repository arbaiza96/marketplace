<?php 

	// session_start();

	require 'link/conexion.php';
	require 'class/class.php';

	$class = $_REQUEST["modelo"];
	$function = $_REQUEST["accion"];

	$instance = new $class();
	$data = $instance->$function();
	
	print_r($data);

?>