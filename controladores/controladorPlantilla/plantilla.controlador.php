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
		private static $header3 = 'header3';
		private static $header4 = 'header4';
		private static $header5 = 'header5';
		private static $header6 = 'header6';

		private static $menu = 'menu'; 

		private static $footer = 'footer'; 

		
		/*====================================================
		=            Funciones principales clases          =
		====================================================*/
		
		public static function ctrPlantilla(){

			include "controladores/controladorPlantilla/plantilla.general.controlador.php";

		}


		public function plantillaHead(){

			if($_GET["ruta"]=="modificaciones") {

				require_once self::$vista.self::$vistaGeneral.self::$header2.self::$nomenclatura;

			}else if($_GET["ruta"]=="dashboard" || $_GET["ruta"]=="infraestructuraOrganismo"  || $_GET["ruta"]=="modificacionesInformes" || $_GET["ruta"]=="modificacionesCuadroAvances" || $_GET["ruta"]=="estadoTramitesModificaciones"){

				require_once self::$vista.self::$vistaGeneral.self::$header3.self::$nomenclatura;

			}else if($_GET["ruta"]=="crearInformacion" || $_GET["ruta"]=="modificacionesOrganismo"  || $_GET["ruta"]=="modificacionesMontos" || $_GET["ruta"]=="modificacionesSueldosSalarios" || $_GET["ruta"]=="modificacionesDesvinculacion" || $_GET["ruta"]=="modificacionOrigenDesvinculacion"){

				require_once self::$vista.self::$vistaGeneral.self::$header4.self::$nomenclatura;

			}else if($_GET["ruta"]=="modificarInformacion"){

				require_once self::$vista.self::$vistaGeneral.self::$header5.self::$nomenclatura;

			}else if($_GET["ruta"]=="modificacionesRevisor" || $_GET["ruta"]=="modificacionesRevisorRecomendados" || $_GET["ruta"]=="modificacionesRecibidosPlanificacion" || $_GET["ruta"]=="modificacionesRecibidosPlanificacionRecomendados" || $_GET["ruta"]=="modificacionesRecibidosPlanificacionRecomendadosNotificacion"  || $_GET["ruta"]=="reporteriaModi" || $_GET["ruta"]=="modificacionesRevisorInfra" || $_GET["ruta"]=="modificacionesRevisorInfraRecomendados" || $_GET["ruta"]=="modificacionesRevisorSubsecretaria" || $_GET["ruta"]=="modificacionesRevisorSubsecretariaRecomendados" || $_GET["ruta"]=="tramitesModificaciones" || $_GET["ruta"]=="aprobacionGeneralDeTramitesM" || $_GET["ruta"]=="modificacionesEnviadasDirector" || $_GET["ruta"]=="tramitesModificacionesAdministrador" || $_GET["ruta"]=="matrizOrigenDestinoAdministrador"){

				require_once self::$vista.self::$vistaGeneral.self::$header6.self::$nomenclatura;

			}else{

				require_once self::$vista.self::$vistaGeneral.self::$header.self::$nomenclatura;

			}

			

		}	

		public function disparadorEstilosDasboards(){

			if (isset($_GET["ruta"])) {

				if($_GET["ruta"]!="ingreso" || $_GET["ruta"]!="capacitacion") {

					require_once self::$vista.self::$vistaGeneral."estilosDasboards".self::$nomenclatura;

				}

			}

		}		
		
		public function plantillaMenu(){


			if (isset($_GET["ruta"])) {

				if($_GET["ruta"]!="ingreso" && $_GET["ruta"]!="capacitacion" && $_GET["ruta"]!="paidPoaSeleccion" && $_GET["ruta"]!="inicioPerfilObservador" && $_GET["ruta"]!="matrizOrigenDestinoAdministrador") {

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
				
				if($_GET["ruta"]=="generalDeporteEA" || $_GET["ruta"]=="paidRubrosEncuentroActivo" || $_GET["ruta"]=="paidMedallasEncuentroActivo" || $_GET["ruta"]=="paidMatrizGeneralEncuentroActivo"|| $_GET["ruta"]=="paidSeleccionJuegosNacionales" || $_GET["ruta"]=="paidPersonaTecnicoConvencional" || $_GET["ruta"]=="paidUniformesAdaptado" ||  $_GET["ruta"]=="paidBonoDeportivo"||  $_GET["ruta"]=="paidSeguros"||  $_GET["ruta"]=="paidTransporte" ||  $_GET["ruta"]=="paidPasajesAereos" ||  $_GET["ruta"]=="paidEventosDesarrollo"){
					require_once self::$vista.self::$contenidoVistas."PAID_DESARROLLO/".$_GET["ruta"].self::$nomenclatura;
				}else if($_GET["ruta"]=="generalDeporteAR" || $_GET["ruta"]=="paidRubrosEventos" || $_GET["ruta"]=="paidRubrosInterdisciplinario" || $_GET["ruta"]=="paidRubrosNecesidadesGenerales" || $_GET["ruta"]=="paidRubrosNecesidadesIndividuales"){
					require_once self::$vista.self::$contenidoVistas."paid-alto-rendimiento/".$_GET["ruta"].self::$nomenclatura;
				}else if($_GET["ruta"]=="paidencuentroactivo" || $_GET["ruta"]=="paidAsignacion" || $_GET["ruta"]=="paidAsignacionDesarrollo" || $_GET["ruta"]=="paidfortalecimiento" || $_GET["ruta"]=="reporteriaAsignacion" || $_GET["ruta"]=="reporteriaAsignacionDesarrollo"|| $_GET["ruta"]=="paidAsignacionInfraestructura"|| $_GET["ruta"]=="paidInfraestructura"|| $_GET["ruta"]=="reporteriaAsignacionInfraestructura"){
					require_once self::$vista.self::$contenidoVistas."PAID-ADMINISTRACION/".$_GET["ruta"].self::$nomenclatura;
				}else if($_GET["ruta"]=="modificacionesOrganismo" || $_GET["ruta"]=="dashboard" || $_GET["ruta"]=="infraestructuraOrganismo" || $_GET["ruta"]=="modificacionesMontos" || $_GET["ruta"]=="modificacionesSueldosSalarios" || $_GET["ruta"]=="modificacionesDesvinculacion" || $_GET["ruta"]=="modificacionesInformes" || $_GET["ruta"]=="modificacionesCuadroAvances" || $_GET["ruta"]=="modificarInformacion" || $_GET["ruta"]=="crearInformacion" || $_GET["ruta"]=="estadoTramitesModificaciones" || $_GET["ruta"]=="reporteriaModi" || $_GET["ruta"]=="modificacionOrigenDesvinculacion"){
					require_once self::$vista.self::$contenidoVistas."POA_MODIFICACIONES/".$_GET["ruta"].self::$nomenclatura;
				}else if($_GET["ruta"]=="modificacionesRevisor" || $_GET["ruta"]=="modificacionesRevisorRecomendados" || $_GET["ruta"]=="modificacionesRecibidosPlanificacion" || $_GET["ruta"]=="modificacionesRecibidosPlanificacionRecomendados" || $_GET["ruta"]=="modificacionesRecibidosPlanificacionRecomendadosNotificacion" || $_GET["ruta"]=="reporteriaModificacionesA" || $_GET["ruta"]=="modificacionesRevisorInfra" || $_GET["ruta"]=="modificacionesRevisorInfraRecomendados" || $_GET["ruta"]=="modificacionesRevisorSubsecretaria" || $_GET["ruta"]=="modificacionesRevisorSubsecretariaRecomendados" || $_GET["ruta"]=="tramitesModificaciones"  || $_GET["ruta"]=="aprobacionGeneralDeTramitesM" || $_GET["ruta"]=="modificacionesEnviadasDirector" || $_GET["ruta"]=="tramitesModificacionesAdministrador" || $_GET["ruta"]=="matrizOrigenDestinoAdministrador"){
					require_once self::$vista.self::$contenidoVistas."POA_MODIFICACIONES_REVISOR/".$_GET["ruta"].self::$nomenclatura;
				}else if($_GET["ruta"]=="seguimientoAnexos" || $_GET["ruta"]=="mantenimientoAnexos"){
					require_once self::$vista.self::$contenidoVistas."DOCUMENTOS_ANEXOS2022/".$_GET["ruta"].self::$nomenclatura;
				}else if($_GET["ruta"]=="administracionModificaciones"){
					require_once self::$vista.self::$contenidoVistas."ADMINISTRACION_MODIFICACIONES/".$_GET["ruta"].self::$nomenclatura;
				}else if($_GET["ruta"]=="bloqueador" || $_GET["ruta"]=="bloqueador2" || $_GET["ruta"]=="bloqueadorFinancieros"){
					require_once self::$vista.self::$contenidoVistas."BLOQUEADOR/".$_GET["ruta"].self::$nomenclatura;
				}else if($_GET["ruta"]=="reporteAnexosOD" || $_GET["ruta"]=="seguimientoControlC" || $_GET["ruta"]=="reportesSeguimientos" || $_GET["ruta"]=="jurisdicciones" || $_GET["ruta"]=="seguimientoRE" || $_GET["ruta"]=="seguimientoRE" || $_GET["ruta"]=="seguimiento" || $_GET["ruta"]=="seguimientoRecomendadosPresupuestario" || $_GET["ruta"]=="seguimientoRe" ){

					if(isset($_SESSION["selectorAniosA"])){
						if(intval($_SESSION["selectorAniosA"])>=2023){
							require_once self::$vista.self::$contenidoVistas."POA_SEGUIMIENTO/".$_GET["ruta"].self::$nomenclatura;
						}else{
							require_once self::$vista.self::$contenidoVistas.$_GET["ruta"].self::$nomenclatura;
						}

						
					}else{
						require_once self::$vista.self::$contenidoVistas.$_GET["ruta"].self::$nomenclatura;
					}
					
				}else if($_GET["ruta"]=="segumientosProgramacionRen" || $_GET["ruta"]=="seguimientoRecibidos" || $_GET["ruta"]=="seguimientosAcFisicasRen" || $_GET["ruta"]=="seguimientosrecibidosIn" || $_GET["ruta"]=="seguimientosAltosRen" || $_GET["ruta"]=="seguimientoRecorrido" || $_GET["ruta"]=="remananentesRepors" || $_GET["ruta"]=="seguimientoBloqueo" || $_GET["ruta"]=="seguimientoReporOrganismos" || $_GET["ruta"]=="reporteAnexosSe" || $_GET["ruta"]=="seguimientoReporContratacionPublica" || $_GET["ruta"]=="reporteAnualSeRe" || $_GET["ruta"]=="seguimientosFinancieroRecomen"  || $_GET["ruta"]=="documentosSustentacion" || $_GET["ruta"]=="registroRemanentesA" || $_GET["ruta"]=="poaResolucionFinal"|| $_GET["ruta"]=="transferencias"|| $_GET["ruta"]=="resumenTransferencias" || $_GET["ruta"]=="seguimientosrecibidos" || $_GET["ruta"]=="seguimientoPlazos"|| $_GET["ruta"]=="seguimientoSuspencionReactivacion" || $_GET["ruta"]=="seguimientoResumenSuspenciones"|| $_GET["ruta"]=="seguimientoSuspencionRe" || $_GET["ruta"]=="seguimientoAjuste" || $_GET["ruta"]=="seguimientosAltosRecomen"|| $_GET["ruta"]=="seguimientosSeguimientoR" || $_GET["ruta"]=="seguimientosAcFisicasRecomen" || $_GET["ruta"]=="seguimientoControlAdmin" || $_GET["ruta"]=="seguimientosSeguimientoRIn" ){

					if(isset($_SESSION["selectorAniosA"])){
						if(intval($_SESSION["selectorAniosA"])>=2023){
							require_once self::$vista.self::$contenidoVistas."POA_SEGUIMIENTO_REVISOR/".$_GET["ruta"].self::$nomenclatura;
						}else{
							require_once self::$vista.self::$contenidoVistas.$_GET["ruta"].self::$nomenclatura;
						}

						
					}else{
						require_once self::$vista.self::$contenidoVistas.$_GET["ruta"].self::$nomenclatura;
					}
					
				}else if($_GET["ruta"]=="planificacion"){

					require_once self::$vista.self::$contenidoVistas."POA__INICIAL/".$_GET["ruta"].self::$nomenclatura;
				
				}else if($_GET["ruta"]=="paidEjecucionObraInfraestructura" || $_GET["ruta"]=="paidFiscalizacionInfraestructura" || $_GET["ruta"]=="generalDeporteInfra"){

					require_once self::$vista.self::$contenidoVistas."PAID_INFRAESTRUCTURA/".$_GET["ruta"].self::$nomenclatura;
				
				}else if($_GET["ruta"]=="paidEnviados" || $_GET["ruta"]=="paidRecomendados" || $_GET["ruta"]=="reporteriaPaidF"){
					require_once self::$vista.self::$contenidoVistas."PAID_REVISOR/".$_GET["ruta"].self::$nomenclatura;

				}else if($_GET["ruta"]=="decrementos" || $_GET["ruta"]=="incrementos" || $_GET["ruta"]=="revision" || $_GET["ruta"]=="reporteriaFinalIncrementos" || $_GET["ruta"] == "incrementosRevisor" || $_GET["ruta"] == "incrementosRevisorCoordinacionRecomendado" || $_GET["ruta"] == "incrementosRevisorCoordinacion" || $_GET["ruta"] == "incrementosRevisorRecomendado" || $_GET["ruta"] == "incrementoRecomendadoCoordinador" || $_GET["ruta"] == "recorridoIncrementos" || $_GET["ruta"] == "incrementosRevisorInfra" || $_GET["ruta"] == "incrementosRevisorInfraRecomendado"){

					require_once self::$vista.self::$contenidoVistas."INCREMENTOS_REVISORES/".$_GET["ruta"].self::$nomenclatura;
				
				}else if($_GET["ruta"]=="reporteriaIncreDecreOrganismo" || $_GET["ruta"] == "modificarInformacionIncremento"|| $_GET["ruta"] == "crearInformacionIncremento" || $_GET["ruta"] == "incrementosOrganismo" ){

					require_once self::$vista.self::$contenidoVistas."INCREMENTOS_OD/".$_GET["ruta"].self::$nomenclatura;
					
				}else{
					require_once self::$vista.self::$contenidoVistas.$_GET["ruta"].self::$nomenclatura;
				}

			}else{

				require_once self::$vista.self::$contenidoVistas.$this->rutaInicial.self::$nomenclatura;

			}


		}

		public function plantillaFooter(){

			if (isset($_GET["ruta"])) {

				if ($_GET["ruta"]=="ingreso" || $_GET["ruta"]=="capacitacion") {
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