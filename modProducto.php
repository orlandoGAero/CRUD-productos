<html5>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<head>
		<title>Modificar Producto</title>
	</head>
	<body>
		<header>
			<center><h2><b>Actualizar Productos</b></h2></center>
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

			$productos->obtener($_GET['id'])
		?>
		<br>
		<br>
		<center>
			<table border = 0>
				<form name = 'formaltP' id = 'formaltP' action = 'modProducto2.php' method = 'POST' target = '_self'>
					<tr>	
						<td>
							<label>Producto:</label>
						</td>
						<td>
							<input type="hidden" name="txtidPr" value="<?php echo $productos->idPr ?>">
							<input type = 'text' name = 'txtproducto' value="<?php echo $productos->producto ?>">
						</td>
					</tr>
					<tr>
						<td>
							<label>Estado:</label>
						</td>
						<td>
						<?php
							if($productos->estado == 1)
							{
								echo "<input type = 'radio' name = 'rdEstado' value='1' checked='checked'>Activo";
								echo "<input type = 'radio' name = 'rdEstado' value='0'>Inactivo";
							} else {
									echo "<input type = 'radio' name = 'rdEstado' value='1'>Activo";
									echo "<input type = 'radio' name = 'rdEstado' value='0' checked='checked'>Inactivo";
									}
						?>
						</td>
					</tr>	
					<tr>
						<td align="center" colspan="2">
							<input type = 'submit' name = 'btnactualizar' value = 'ACTUALIZAR'>
						</td>
					</tr>
				</form>
			</table>
		</center>
	</body>
</html5>