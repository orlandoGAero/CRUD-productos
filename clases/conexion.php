<?php
	
	/**
	*clase para la conexión al servidor y la base de datos
	*/
	class conexion
	{
		/* atributos de la clase conexion */
		public $servidor;
		public $usuario;
		public $contraseña;
		public $base;

		/* función para realizar la conexión al servidor y base de datos*/
		public function conn($servidor,$usuario,$contraseña,$base)
		{
			$conectar = mysql_connect("$servidor","$usuario","$contraseña") or die(mysql_error());
			$bd = mysql_select_db("$base",$conectar) or die(mysql_error());
		}
	}
?>