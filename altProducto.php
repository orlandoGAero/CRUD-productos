<html5>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<head>
		<title>Alta Producto</title>
	</head>
	<body>
		<header>
			<center><h2><b>PRODUCTOS</b></h2></center>
		</header>
		<nav>
			<center>
				<a href='altProducto.php'><button>Registrar Producto</button></a>
				<a href='busqProducto.php'><button>Buscar Producto</button></a>
			</center>
		</nav>
		<br>
		<br>
		<center>
			<form name = 'formaltP' id = 'formaltP' action = 'altProducto2.php' method = 'POST' target = '_self'>
				<label>Producto:</label>
				<input type = 'text' name = 'txtproducto' required>
				<input type = 'submit' name = 'btnguardar' value = 'GUARDAR'>
			</form>
		</center>
	</body>
</html5>