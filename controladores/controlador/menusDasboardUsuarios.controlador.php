<?php

	class menuPlantilla{


		// carpetas
		private static $nomenclatura='.view.php';

		private static $vista = 'vistas/'; 

		private static $vistaGeneral = 'vistasGenerales/'; 

		private static $contenidoVistas = 'contenidoVistas/'; 

		private static $menuSeccionales = 'menuSeccionales/'; 

		private static $dasboard = 'dasboard/'; 
		
		// nomenclaturas iniciales

		private $rutaInicial='ingreso';

		private static $header = 'header'; 

		private static $menu = 'menu'; 

		private static $footer = 'footer'; 

		
		/*====================================================
		=            Funciones principales clases            =
		====================================================*/
		
		public function getMenuUbicacion($parametro1){

			if (isset($parametro1)) {
					
				switch ($parametro1) {
					
					case 1:
						require_once self::$vista.self::$vistaGeneral.$vista.self::$menuSeccionales."menuAdmin".self::$nomenclatura;
					break;

					case 2:
						require_once self::$vista.self::$vistaGeneral.$vista.self::$menuSeccionales."menuAdmin".self::$nomenclatura;
					break;

					case 3:
						require_once self::$vista.self::$vistaGeneral.$vista.self::$menuSeccionales."menuOrganismo".self::$nomenclatura;
					break;

					case 4:
						require_once self::$vista.self::$vistaGeneral.$vista.self::$menuSeccionales."menuSubsecretario".self::$nomenclatura;
					break;

					case 5:
						require_once self::$vista.self::$vistaGeneral.$vista.self::$menuSeccionales."menuDirector".self::$nomenclatura;
					break;

					case 7:
						require_once self::$vista.self::$vistaGeneral.$vista.self::$menuSeccionales."menuSubsecretario".self::$nomenclatura;
					break;
		
					case 10:
						require_once self::$vista.self::$vistaGeneral.$vista.self::$menuSeccionales."menuSubsecretario".self::$nomenclatura;
					break;



				}

			}

		}


		/*=====  End of Funciones principales clases  ======*/
		

	}