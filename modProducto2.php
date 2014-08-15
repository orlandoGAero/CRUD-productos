<?php
	/* se incluyen las clases de conexión y productos */
	include 'clases/conexion.php';
	include 'clases/productos.php';

	/* se instancian los objetos las clases conexion y productos*/
	$conectar = new conexion();

	$productos = new productos();

	/* condición para que si recibe los del formulario realice las funciones de las clases */
	if (isset($_POST['btnactualizar'])) {
		/* se manda llamar la función conn con los parametros*/
		$conectar->conn('127.0.0.1','root','','productos-act1');
		/* se manda llamar la función insertar de la clase productos con los parametros de dicha función */
		$productos->modificar($_POST['txtidPr'],$_POST['txtproducto'],$_POST['rdEstado']);
		echo $productos->mensaje;
	}			
?>
<a href='busqProducto.php'><button>Buscar Producto</button></a>