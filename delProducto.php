<html5>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<head>
		<title>Eliminar Producto</title>
	</head>
	<body>
		<header>
			<center><h2><b>Eliminación de Productos</b></h2></center>
		</header>
		<nav>
			<center>
				<a href='altProducto.php'><button>Registrar Producto</button></a>
				<a href='busqProducto.php'><button>Buscar Producto</button></a>
			</center>
		</nav>
			<?php
				/* se incluyen las clases de conexión y productos */
				include 'clases/conexion.php';
				include 'clases/productos.php';

				/* se instancian los objetos las clases conexion y productos*/
				$conectar = new conexion();

				$productos = new productos();
				/* se manda llamar la función conn con los parametros*/
				$conectar->conn('127.0.0.1','root','','productos-act1');
				/* se obtiene el id del registro a eliminar*/
				$productos->eliminar($_GET['id']);
				echo $productos->mensaje;
			?>
	</body>
</html5>