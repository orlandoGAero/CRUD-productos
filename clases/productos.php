<?php
	/**
	* clase productos que realiza las operaciones básicas de altas,bajas,modificacion y consulta
	*/
	class productos
	{
		/* atributos de la clase productos */
		public $idPr;
		public $producto;
		public $fecha_creacion;
		public $fecha_actualizacion;
		public $estado;

		/* función para insertar en la tabla de productos */
		public function insertar($producto,$estado)
		{
			/* consulta para insertar en la tabla de productos */
			$queryI = "  INSERT INTO productos (producto,fecha_creacion,estado)
						VALUES ('$producto',NOW(),$estado) ";
			/*se ejecuta el query con la función mysql_query */
			$ejecutar = mysql_query($queryI) or die(mysql_error());

			$this->mensaje = "El producto se ha registrado exitosamente";
		}

		/* función para buscar en la tabla de productos */
		public function buscar($crit)
		{
			/* consulta para buscar en la tabla de producto de acuerdo al criterio*/
			$queryB = "  SELECT * 
						FROM productos
						WHERE producto LIKE '%$crit%'";
			/*se ejecuta el query con la función mysql_query */
			$ejecutar = mysql_query($queryB) or die(mysql_error());
			/* contar las filas */
			$filas = mysql_num_rows($ejecutar);
			/* si hay registros que muestre resultados en la tabla */
			if ($filas != 0) {
				
				/* se crea la tabla para mostrar los resultados de la búsqueda */
				$table = "<center>
							<table border = 1>
								<tr align = 'center'>
									<th>
										Clave
									</th>
									<th>
										Producto
									</th>
									<th>
										Fecha de Creacion
									</th>
									<th>
										Fecha de Actualizacion
									</th>
									<th>
										Estado
									</th>
									<th>
										Acciones
									</th>
								</tr>";
							/* se crea un ciclo con for por si existen más de un registro */
							for ($i=0; $i < $filas; $i++) { 
								
								/*se optienen los resultados de la consulta con la función de php mysql_result */
								$idPr = mysql_result($ejecutar, $i, 'id');
								$nomPr = mysql_result($ejecutar, $i, 'producto');
								$fechaCPr = mysql_result($ejecutar, $i, 'fecha_creacion');
								$fechaAPr = mysql_result($ejecutar, $i, 'fecha_actualizacion');
								$statusPr = mysql_result($ejecutar, $i, 'estado');
							
								$table = $table. "<tr align = 'center'>
													<td>
														$idPr
													</td>
													<td>
														$nomPr
													</td>
													<td>
														$fechaCPr
													</td>
													<td>
														$fechaAPr
													</td>
													<td>
														$statusPr
													</td>
													<td>
														<a href='modProducto.php?id=$idPr'><button>Modificar</button></a>
														<a href='delProducto.php?id=$idPr'><button>Eliminar</button></a>
													</td>
												  </tr>";
							}
					$table = $table. "</table></center>";

					$this->mensaje = $table;
			} else {
						/* muestra un mensaje si no encuentra registros */
						$this->mensaje = "No se encontraron registros con el criterio solicitado";
					}
		}

		/* función para modificar en la tabla de productos */
		public function modificar($idPr,$producto,$estado)
		{
			/* consulta para modificar en la tabla de productos */
			$queryM = " UPDATE productos
						SET producto = '$producto',fecha_actualizacion = NOW(),estado = $estado
						WHERE id = $idPr ";
			/*se ejecuta el query con la función mysql_query */
			$ejecutar = mysql_query($queryM) or die(mysql_error());

			$this->mensaje = "El producto se ha actualizado exitosamente";
		}
		/* función para eliminar de forma lógica en la tabla de productos */
		public function eliminar($idPr)
		{
			/* consulta para seleccionar los productos según el id */	
			$queryS = "SELECT *
					  FROM productos
					  WHERE id = $idPr";
			/*se ejecuta el query con la función mysql_query */
			$ejecutar = mysql_query($queryS) or die(mysql_error());
			/* se muestra el resultado de la búsqueda */
			$estado = mysql_result($ejecutar, 0, 'estado');
			/* condición para qu en caso de que ya se haya desactivado el registro le muestre un mensaje*/
			if ($estado==0) {
				$this->mensaje = "El producto ya fue desactivado";
			/* si no es el caso de que este desactivado actualiza el registro */
			}else{
					$queryU = "	UPDATE productos
								SET estado = 0
								WHERE id = $idPr";
					/*se ejecuta el query con la función mysql_query */
					$ejecutar2 = mysql_query($queryU) or die(mysql_error());
					$this->mensaje = "El producto no se elimina solo se desactiva";
				}
		}

		/* función para obtener datos de la tabla productos*/
		public function obtener($idPr)
		{
			/* consulta para obtener datos de la tabla productos segú el id */
			$queryS = "	SELECT *
						FROM productos
						WHERE id = $idPr";
			/*se ejecuta el query con la función mysql_query */
			$ejecutar = mysql_query($queryS) or die(mysql_error());
			/* contar las filas */
			$filas = mysql_num_rows($ejecutar);
			/* se obtienen los resultados de la búsqueda*/
			$this->idPr = mysql_result($ejecutar,0,'id');
			$this->producto = mysql_result($ejecutar, 0,'producto');
			$this->estado = mysql_result($ejecutar, 0, 'estado');
		}
	}
?>