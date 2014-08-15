<?php
	/* se incluyen las clases de conexión y productos */
	include 'clases/conexion.php';
	include 'clases/productos.php';

	/* se instancian los objetos las clases conexion y productos*/
	$conectar = new conexion();

	$productos = new productos();

	/* se manda llamar la función conn con los parametros*/
	$conectar->conn('127.0.0.1','root','','productos-act1');
	/* se manda llamar la función buscar de la clase productos con los parametros de dicha función */
	$productos->buscar($_REQUEST['txtcrit']);
	/* se obtiene el resultado de la variable table*/
	echo $table = $productos->mensaje;
?>