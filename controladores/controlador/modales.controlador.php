<?php

	class modal{


		// carpetas
		private static $nomenclatura='.view.php';

		private static $vista = 'vistas/'; 

		private static $modales = 'modales/'; 


		/*====================================================
		=            Funciones principales clases            =
		====================================================*/

		public function getModales($parametro1){

			switch ($parametro1) {

				case 1:
					require_once self::$vista.self::$modales."modalRegistro".self::$nomenclatura;
				break;				

				case 2:
					require_once self::$vista.self::$modales."terminosCondiciones".self::$nomenclatura;
				break;	

			}

		}			
						
		/*=====  End of Funciones principales clases  ======*/
		


	}