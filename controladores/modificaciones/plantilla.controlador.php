<?php

	class plantilla{


		// carpetas
		private static $nomenclatura='.view.php';

		private static $vista = 'vistas/'; 

		private static $vistaGeneral = 'vistasGenerales/'; 

		private static $contenidoVistas = 'contenidoVistas/'; 

		private static $menuSeccionales = 'menuSeccionales/'; 

		private static $dasboard = 'dasboard/'; 

		private static $componentes = 'componentes/'; 
		
		// nomenclaturas iniciales

		private $rutaInicial='ingreso';

		private static $header = 'header'; 
		private static $header2 = 'header2'; 

		private static $menu = 'menu'; 

		private static $footer = 'footer'; 

		
		/*====================================================
		=            Funciones principales clases            =
		====================================================*/
		
		public static function ctrPlantilla(){

			include "controladores/controladorPlantilla/plantilla.general.controlador.php";

		}


		public function plantillaHead(){

			if($_GET["ruta"]=="modificaciones") {

				require_once self::$vista.self::$vistaGeneral.self::$header2.self::$nomenclatura;

			}else{

				require_once self::$vista.self::$vistaGeneral.self::$header.self::$nomenclatura;

			}

			

		}	

		public function disparadorEstilosDasboards(){

			if (isset($_GET["ruta"])) {

				if($_GET["ruta"]!="ingreso") {

					require_once self::$vista.self::$vistaGeneral."estilosDasboards".self::$nomenclatura;

				}

			}

		}		
		
		public function plantillaMenu(){


			if (isset($_GET["ruta"])) {

				if($_GET["ruta"]!="ingreso") {

					require_once self::$vista.self::$vistaGeneral.self::$dasboard."menuDasboardPrincipal".self::$nomenclatura;

				}else{

					require_once self::$vista.self::$vistaGeneral.self::$menu.self::$nomenclatura;

				}

			}else{

				require_once self::$vista.self::$vistaGeneral.self::$menu.self::$nomenclatura;

			}

		}	


		public function disparadorMenu(){

			if (isset($_GET["ruta"])) {

				switch ($_GET["ruta"]) {

					case "ingreso":
						require_once self::$vista.self::$vistaGeneral.self::$menuSeccionales."ingresoMenu".self::$nomenclatura;
					break;

				}

			}else{

				require_once self::$vista.self::$vistaGeneral.self::$menuSeccionales."ingresoMenu".self::$nomenclatura;

			}

		}


		public function plantillaContenido(){

			if (isset($_GET["ruta"])) {
					
				switch ($_GET["ruta"]) {

					case "ingreso":
						require_once self::$vista.self::$contenidoVistas.$this->rutaInicial.self::$nomenclatura;
					break;

					case "datosGenerales":
						require_once self::$vista.self::$contenidoVistas."datosGenerales".self::$nomenclatura;
					break;

					case "administracion":
						require_once self::$vista.self::$contenidoVistas."administracion".self::$nomenclatura;
					break;

					case "ventanaObservaciones":
						require_once self::$vista.self::$contenidoVistas."ventanaObservaciones".self::$nomenclatura;
					break;

					case "administracionGeneral":
						require_once self::$vista.self::$contenidoVistas."administracionGeneral".self::$nomenclatura;
					break;

					case "administracionUsuarios":
						require_once self::$vista.self::$contenidoVistas."administracionUsuarios".self::$nomenclatura;
					break;			

					case "asignacionPresupuesto":
						require_once self::$vista.self::$contenidoVistas."asignacionPresupuesto".self::$nomenclatura;
					break;				
					
					case "planificacion":
						require_once self::$vista.self::$contenidoVistas."planificacion".self::$nomenclatura;
					break;	

					case "verificacionInformacion":
						require_once self::$vista.self::$contenidoVistas."verificacionInformacion".self::$nomenclatura;
					break;	

					case "modificacionPresupuestaria":
						require_once self::$vista.self::$contenidoVistas."modificacionPresupuestaria".self::$nomenclatura;
					break;	
					
					case "subsecretario":
						require_once self::$vista.self::$contenidoVistas."subsecretario".self::$nomenclatura;
					break;	

					case "poasRecomendados":
						require_once self::$vista.self::$contenidoVistas."poasRecomendados".self::$nomenclatura;
					break;	

					case "poasGlobalesRecibidos":
						require_once self::$vista.self::$contenidoVistas."poasGlobalesRecibidos".self::$nomenclatura;
					break;	

					case "subsecretarioCoordina":
						require_once self::$vista.self::$contenidoVistas."subsecretarioCoordina".self::$nomenclatura;
					break;	
					
					case "subecretariaFinanciero":
						require_once self::$vista.self::$contenidoVistas."subecretariaFinanciero".self::$nomenclatura;
					break;	
					
					case "recomiendaAdministrativo":
						require_once self::$vista.self::$contenidoVistas."recomiendaAdministrativo".self::$nomenclatura;
					break;	

					case "recomiendaTalentoHumano":
						require_once self::$vista.self::$contenidoVistas."recomiendaTalentoHumano".self::$nomenclatura;
					break;	

					case "recomiendaInfra":
						require_once self::$vista.self::$contenidoVistas."recomiendaInfra".self::$nomenclatura;
					break;	

					case "recomiendaInsta":
						require_once self::$vista.self::$contenidoVistas."recomiendaInsta".self::$nomenclatura;
					break;	

					case "recomendadoZonalesSubses":
						require_once self::$vista.self::$contenidoVistas."recomendadoZonalesSubses".self::$nomenclatura;
					break;	

					case "recomendadoZonalesF":
						require_once self::$vista.self::$contenidoVistas."recomendadoZonalesF".self::$nomenclatura;
					break;	

					case "recomendadosSV":
						require_once self::$vista.self::$contenidoVistas."recomendadosSV".self::$nomenclatura;
					break;	

					case "tramitesActivos":
						require_once self::$vista.self::$contenidoVistas."tramitesActivos".self::$nomenclatura;
					break;	

					case "coordinadorRe":
						require_once self::$vista.self::$contenidoVistas."coordinadorRe".self::$nomenclatura;
					break;	

					case "observadosP":
						require_once self::$vista.self::$contenidoVistas."observadosP".self::$nomenclatura;
					break;	

					case "poaResolucionFinal":
						require_once self::$vista.self::$contenidoVistas."poaResolucionFinal".self::$nomenclatura;
					break;	

					case "poasAprobadosf":
						require_once self::$vista.self::$contenidoVistas."poasAprobadosf".self::$nomenclatura;
					break;	

					case "registroTrasnferencia":
						require_once self::$vista.self::$contenidoVistas."registroTrasnferencia".self::$nomenclatura;
					break;	

					case "asignacionPoasRelativos":
						require_once self::$vista.self::$contenidoVistas."asignacionPoasRelativos".self::$nomenclatura;
					break;	

					case "reporteriaOrganismos":
						require_once self::$vista.self::$contenidoVistas."reporteriaOrganismos".self::$nomenclatura;
					break;	

					case "organismosRegistrados":
						require_once self::$vista.self::$contenidoVistas."organismosRegistrados".self::$nomenclatura;
					break;	


					case "suspencionAsignacion":
						require_once self::$vista.self::$contenidoVistas."suspencionAsignacion".self::$nomenclatura;
					break;	


					case "soliTrans":
						require_once self::$vista.self::$contenidoVistas."soliTrans".self::$nomenclatura;
					break;	


					case "reporteriaFinal":
						require_once self::$vista.self::$contenidoVistas."reporteriaFinal".self::$nomenclatura;
					break;

					case "rechazados":
						require_once self::$vista.self::$contenidoVistas."rechazados".self::$nomenclatura;
					break;

					case "aprobadosFinan":
						require_once self::$vista.self::$contenidoVistas."aprobadosFinan".self::$nomenclatura;
					break;

					case "modificaciones":
						require_once self::$vista.self::$contenidoVistas."modificaciones".self::$nomenclatura;
					break;

					case "paidproyectos":
						require_once self::$vista.self::$contenidoVistas."paidproyectos".self::$nomenclatura;
					break;

					case "paidproyectosasignacion":
						require_once self::$vista.self::$contenidoVistas."paidproyectosasignacion".self::$nomenclatura;
					break;

					case "paidasignacionreporterias":
						require_once self::$vista.self::$contenidoVistas."paidasignacionreporterias".self::$nomenclatura;
					break;

					case "paidproyectosactividades":
						require_once self::$vista.self::$contenidoVistas."paidproyectosactividades".self::$nomenclatura;
					break;

					case "seguimiento":
						require_once self::$vista.self::$contenidoVistas."seguimiento".self::$nomenclatura;
					break;

					case "reporteriaFinanciero":
						require_once self::$vista.self::$contenidoVistas."reporteriaFinanciero".self::$nomenclatura;
					break;

					case "esigef":
						require_once self::$vista.self::$contenidoVistas."esigef".self::$nomenclatura;
					break;

					case "administracionModificaciones":
						require_once self::$vista.self::$contenidoVistas."administracionModificaciones".self::$nomenclatura;
					break;

					case "modificacionesOrganismo":
						require_once self::$vista.self::$contenidoVistas."modificacionesOrganismo".self::$nomenclatura;
					break;

					case "modificaciones2022":
						require_once self::$vista.self::$contenidoVistas."modificaciones2022".self::$nomenclatura;
					break;

					case "poasGlobalesRecibidosM2022":
						require_once self::$vista.self::$contenidoVistas."poasGlobalesRecibidosM2022".self::$nomenclatura;
					break;

					case "seguimientosrecibidos":
						require_once self::$vista.self::$contenidoVistas."seguimientosrecibidos".self::$nomenclatura;
					break;

					case "seguimientosAltosRen":
						require_once self::$vista.self::$contenidoVistas."seguimientosAltosRen".self::$nomenclatura;
					break;

					case "seguimientosAcFisicasRen":
						require_once self::$vista.self::$contenidoVistas."seguimientosAcFisicasRen".self::$nomenclatura;
					break;

					case "seguimientosAltosRecomen":
						require_once self::$vista.self::$contenidoVistas."seguimientosAltosRecomen".self::$nomenclatura;
					break;

					case "seguimientosAcFisicasRecomen":
						require_once self::$vista.self::$contenidoVistas."seguimientosAcFisicasRecomen".self::$nomenclatura;
					break;


					case "seguimientosSeguimientoR":
						require_once self::$vista.self::$contenidoVistas."seguimientosSeguimientoR".self::$nomenclatura;
					break;



					case "seguimientosrecibidosIn":
						require_once self::$vista.self::$contenidoVistas."seguimientosrecibidosIn".self::$nomenclatura;
					break;



					case "seguimientosSeguimientoRIn":
						require_once self::$vista.self::$contenidoVistas."seguimientosSeguimientoRIn".self::$nomenclatura;
					break;


					//codigo CPI
					case "modificacionesSueldosSalarios":
					require_once self::$vista.self::$contenidoVistas."modificacionesSueldosSalarios".self::$nomenclatura;
					break;

					case "modificacionesMontos":
					require_once self::$vista.self::$contenidoVistas."modificacionesMontos".self::$nomenclatura;
					break;
					

					case "salir":
						require_once self::$vista.self::$contenidoVistas."salir".self::$nomenclatura;
					break;

				}

			}else{

				require_once self::$vista.self::$contenidoVistas.$this->rutaInicial.self::$nomenclatura;

			}


		}

		public function plantillaFooter(){

			if (isset($_GET["ruta"])) {

				if ($_GET["ruta"]=="ingreso") {
					require_once self::$vista.self::$vistaGeneral.self::$footer.self::$nomenclatura;
				}else{
					require_once self::$vista.self::$vistaGeneral."footerIngreso".self::$nomenclatura;
				}

			}else{

				require_once self::$vista.self::$vistaGeneral.self::$footer.self::$nomenclatura;

			}

		}	

		/*=====  End of Funciones principales clases  ======*/
		


	}