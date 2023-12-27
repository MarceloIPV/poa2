<?php
	
	/*=====================================
	=            Controladores           =
	=====================================*/

	/*=================================
	=            Generales            =
	=================================*/
	define('CONEXION', 'conexion/');

	define('CONTROLADOR', 'controladores/');

	define('CONTROLADORPLANTILLA', 'controladorPlantilla/');

	define('CONTROLADORGENERAL', 'controlador/');

	define('INICIOSESION', 'inicioSesion/');

	require_once CONEXION.'conexion.php';

	require_once CONTROLADOR.CONTROLADORPLANTILLA.'plantilla.controlador.php';

	require_once CONTROLADOR.CONTROLADORGENERAL.'modales.controlador.php';

	require_once CONTROLADOR.CONTROLADORPLANTILLA.'plantilla.general.controlador.php';



	/*=====  End of Generales  ======*/
	
	
	/*=====  End of Controladores  ======*/
	
