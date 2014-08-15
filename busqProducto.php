<html5>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<head>
		<title>Búsqueda Producto</title>
		<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
	</head>
	<body>
		<header>
			<center><h2><b>Búsqueda de productos</b></h2></center>
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
			<form name = 'fcrit' id = 'fcrit' action = '' method = 'POST' target = '_self'>
				<label>Teclea un Producto:</label>
				<input type = 'text' name = 'txtcrit' required>
				<input type = 'submit' name = 'btnbuscar' value = 'BUSCAR'>
			</form>
		</center>

		<div id = "ajax"></div>
					
		<script type="text/javascript">
			$(function (e) {
				$('#fcrit').submit(function (e) {
					e.preventDefault()
					$('#ajax').load('busqProducto2.php?' + $('#fcrit').serialize())
				})
			})
		</script>
	</body>
</html5>