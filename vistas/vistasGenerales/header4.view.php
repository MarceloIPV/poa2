<!DOCTYPE html>

	<html lang="es">

		<head>

		<!--=====================================
		=            Sección Inicial            =
		======================================-->	

		<meta charset="utf-8">

		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title>POA</title>

		<!-- para el ico de inicio -->
		<link rel="shortcut icon" type="image/png" href="images/FaviCon1.png" />

		<!-- para dispositvos móviles -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">	


		<!--====  End of Sección Inicial  ====-->

		<!--====================================
		=            Sección de CSS            =
		=====================================-->
			
		<!-- estilo plantilla secretaría del deporte	 -->
		<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">

		<!-- estilos datatablets -->
		<link href="layout/datatablets/datatables.min.css" rel="stylesheet" type="text/css">

		<!-- estilos jquery ui -->
		<link href="layout/jquery/jquery-ui.min.css" rel="stylesheet" type="text/css">
		
		<!-- datapickers -->
		<link rel="stylesheet" href="layout/styles/datepicker.min.css">

		<!-- Alertify CSS -->
	    <link rel="stylesheet" href="layout/alertifyjs/css/alertify.min.css">  

		<!-- Alertify theme default -->  
		<link rel="stylesheet" href="layout/alertifyjs/css/themes/default.min.css"/> 

		<!-- font-awesome -->
		<link rel="stylesheet" href="layout/fontawesome/css/all.css">

		<!--================================
		=            CDN De CSS            =
		=================================-->

			<!-- estilos boostrap -->
		 	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

			<!-- font-awesome -->
			<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

		
			<!-- datatablets -->
			<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>

			<!-- datablets responsive -->
			<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/1.0.7/css/responsive.bootstrap.min.css">


			<!-- datatablets -->
			<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>

			<!-- font -->
			<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>

			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/css/multi-select.min.css" integrity="sha512-3lMc9rpZbcRPiC3OeFM3Xey51i0p5ty5V8jkdlNGZLttjj6tleviLJfHli6p8EpXZkCklkqNt8ddSroB3bvhrQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


			<!-- select con buscador -->
			<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>

		<!--====  End of CDN De CSS  ====-->

		<!--=====================================
		=            Estilos propios            =
		======================================-->
			
		<!-- estilos principales	 -->
		<link href='layout/styles/css/style.css?v=1.0.1' rel='stylesheet' type='text/css'>

		<!-- estilos documentos -->
		<link href='layout/styles/css/styleDocumentos.css?v=1.0.2' rel='stylesheet' type='text/css'>

		<link href='layout/styles/css/styleRegistro.css?v=1.0.5' rel='stylesheet' type='text/css'>
		
		<!--====  End of Estilos propios  ====-->
		

		<!--====  End of Sección de CSS  ====-->
		

		<!--============================================
		=            Sección de Java Script            =
		=============================================-->


		<!-- Jquery -->
		<script src="layout/jquery/jquery.min.js"></script>

		<!-- Jquery ui -->
		<script src="layout/jquery/jquery-ui.min.js"></script>	

		<!-- Plugins Alertify -->  
    	<script src="layout/alertifyjs/js/alertify.min.js"></script> 

    	<!-- cloudflare -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>

		<!-- Sweet alert -->
		<script src="layout/scripts/sweetalert2.all.js"></script>

		<!-- datapickers -->
		<script rel="stylesheet" href="layout/scripts/datepicker.min.js"></script>

		<!-- lenguaje del datapicker -->
		<script rel="stylesheet" href="layout/scripts/datepicker.en.js"></script>

		<!-- datatablets -->
		<script type="text/javascript" src="layout/datatablets/datatables.min.js"></script>

		<!--=========================
		=            CDN            =
		==========================-->
		
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.4/axios.min.js" integrity="sha512-Th6RhKVKcUO1NdowoioG5HrNgi4JzStsjpwheSR+nWcDIVO4Wv6E6D14o/46EqqDsLSca/rcMD1a3OLyPkexAw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		

			<!--==============================================================
			=            Botones exportadores para el DATATABLETS            =
			===============================================================-->

			<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>

			<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>

			<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

			<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>

			<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
			
			<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>

			<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>

			<script src="https://cdnjs.cloudflare.com/ajax/libs/node-uuid/1.4.7/uuid.min.js"></script>

			<script src="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/js/jquery.multi-select.min.js"></script>

			<script src="https://momentjs.com/downloads/moment.min.js"></script>

			<!--====  End of Botones exportadores para el DATATABLETS  ====-->

			<!-- select con buscador -->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

		<!--====  End of CDN  ====-->
	
		<!--============================================
		=            Scripts personalizados            =
		=============================================-->
			
		<!-- estilo principal -->
		<script type="text/javascript" src="layout/scripts/js/validacion.js?v=1.0.1"></script>

		<!-- validaciones globales -->
		<script type="text/javascript" src="layout/scripts/js/validacionesGenerales.js?v=1.0.45"></script>

		<!-- validación aspectos básicos teléfonos, números, etc -->
		<script type="text/javascript" src="layout/scripts/js/validacionBasica.js?v=1.0.15"></script>
		
		<!-- inserción javascript -->
		<script type="text/javascript" src="layout/scripts/js/ajax/inserta.js?v=1.0.1"></script>

		<!-- acciones datatablets -->
		<script type="text/javascript" src="layout/scripts/js/ajax/acciones.js?v=1.0.1"></script>

		<!-- datablets -->
		<script type="text/javascript" src="layout/scripts/js/ajax/datatablet.js?v=1.0.71"></script>

		<!-- validacion global del proyecto -->
		<script type="text/javascript" src="layout/scripts/js/validaGlobal.js?v=1.1.55"></script>
			

		<!-- elementos ocultos -->
		<script type="text/javascript" src="layout/scripts/js/elementosOcultos.js?v=1.0.1"></script>
			

		<!-- modificaciones -->
		<script type="text/javascript" src="layout/scripts/js/modificacion/modificacion.js?v=1.0.15"></script>

		<script type="text/javascript" src="layout/scripts/js/disminucion/modificacionDisminucion.js?v=1.0.1"></script>
		
		<script type="text/javascript" src="layout/scripts/js/disminucion/modificacionesSueldosSalarios.js?v=1.0.1"></script>

		<script type="text/javascript" src="layout/scripts/js/modificacion/modificacionGlobal.js?v=1.0.1"></script>

		<script type="text/javascript" src="layout/scripts/js/modificacion/insertaModificaciones.js?v=1.0.5"></script>
			
		<!--====  End of Scripts personalizados  ====-->
				
	</head>
