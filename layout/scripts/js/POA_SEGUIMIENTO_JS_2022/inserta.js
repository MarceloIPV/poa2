$(document).ready(function () {


/*=======================================================
=            Validación de campos a insertar            =
=======================================================*/

function validacionRegistro(parametro1){

	var sumadorErrores=0;

	$(parametro1).each(function(index) {

		if($(this).val()==""){
	     	sumadorErrores++;
		}

	});

	if (sumadorErrores==0) {
		return true;
	}else{
		return false;
	}

}

var validacionRegistroMostrarErrores=function(parametro1){

	var sumadorErrores=0;

	$(parametro1).each(function(index) {

		if($(this).val()==""){
	    	$(this).addClass('error');
		}else{
	    	$(this).removeClass('error');
		}
	  
	});

}

function validacionRegistroMuestras(parametro1){

	var sumadorErrores=0;

	$(parametro1).each(function(index) {

		if($(this).text()!=""){
	     	sumadorErrores++;
		}

	});

	if (sumadorErrores==0) {
		return true;
	}else{
		return false;
	}

}

var validacionRegistroMostrarErroresMuestras=function(parametro1){

	var sumadorErrores=0;

	$(parametro1).each(function(index) {

		if($(this).text()!=""){
	    	$(this).addClass('error2');
		}else{
	    	$(this).removeClass('error2');
		}
	  
	});

}

var validacionRecorrerChekeds=function(parametro1){

	var condicion = $(parametro1).is(":checked");

	if (condicion) {
		return "si";
	}else{
		return "no";
	}

}


function concatenarValores(parametro1){
	
	var array = new Array(); 

    $(parametro1).each(function(index) {

        array.push($(this).val());

    });

    return array;

}


/*=====  End of Validación de campos a insertar  ======*/

/*============================================
=            Mensajes de alertify            =
============================================*/

var mensajeAlertify=function(parametro1,parametro2,parametro3,parametro4){

	switch (parametro2) {

	 	case 0:

			alertify.set("notifier","position", "top-center");
			alertify.notify("Campos obligatorios", "error", 5, function(){});

			$(parametro1).show();

			$(parametro3).html(' ');

	 	break;

	 	case 1:

			alertify.set("notifier","position", "top-center");
			alertify.notify("Obligatorio ingresar los campos con la información correcta fijarse los textos subrayados en azul", "error", 5, function(){});

			$(parametro1).show();

			$(parametro3).html(' ');

	 	break;

	 	case 2:

			alertify.set("notifier","position", "top-center");
			alertify.notify("Obligatorio ingresar el documento", "error", 5, function(){});

			$(parametro1).show();

			$(parametro3).html(' ');

	 	break;

	 	case 3:

			alertify.set("notifier","position", "top-center");
			alertify.notify("El documento pdf es obligatorio", "error", 5, function(){});

			$(parametro1).show();

			$(parametro3).html(' ');

	 	break;

	 	case 4:

			alertify.set("notifier","position", "top-center");
			alertify.notify("El documento no es pdf", "error", 5, function(){});

			$(parametro1).show();

			$(parametro3).html(' ');

	 	break;

	 	case 5:

			alertify.set("notifier","position", "top-center");
			alertify.notify("Datos del presidente ya se encuentran registrados", "error", 5, function(){});

			$(parametro1).show();

			$(parametro3).html(' ');

	 	break;

	 	case 6:

			alertify.set("notifier","position", "top-center");
			alertify.notify("Datos del organismo deportivo ya se encuentran registrados", "error", 5, function(){});

			$(parametro1).show();

			$(parametro3).html(' ');

	 	break;

	 	case 7:

            alertify.set("notifier","position", "top-center");
            alertify.notify("Registro realizado correctamente, debe revisar su correo e ingresar el código de verificación que le llegará al mismo", "success", 8, function(){});


            window.setTimeout(function(){ 

	            $(parametro3).html(' ');

	            $(".bloques__eliminados").html(' ');

	            $(".documentos__confidenciales").show();

	            $(".cerrar__modalRegistros").hide();

	            $("#tituloModal").text(" ");

	            $("#tituloModal").html("Registrar contraseña");

	            $(".contenedor__documentosConfidenciales").addClass('d d-flex justify-content-center align-items-center');

            } ,8000); 

	 	break;

	 	case 8:

            alertify.set("notifier","position", "top-center");
            alertify.notify("Registro realizado correctamente", "success", 5, function(){});


            window.setTimeout(function(){ 

            	window.location =parametro4;

            } ,5000); 

	 	break;

	 	case 9:

            alertify.set("notifier","position", "top-center");
            alertify.notify("Acción realizada correctamente", "success", 5, function(){});

            $(parametro1).show();

			$(parametro3).html(' ');

	 	break;

	}

}


/*=====  End of Mensajes de alertify  ======*/


/*==================================================================================================
=            Generar archivo de acuerdo  de confidencialidad de terminos y conidiciones            =
==================================================================================================*/

var mostrarDocumentoTerminosCondiciones=function(cedula,nombre,apellido,sexo,fechaNacimiento,email,telefono,nombreOrganismo,ruc,presidente,correoOrganismo,direccion,referenciaDireccion,telefonoOficina,cedulaResponsable,nombreResponsablePoa,nombreProvincia,nombreCanton,nombreParroquia){

	var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

    var f=new Date();
                                       
    var doc = new jsPDF('p','mm','letter');

    doc.setFontSize(10);

    doc.setFontType("bold");

    doc.text(17,10, 'Acuerdo de Responsabilidad, Uso de Medios Electrónicos y Espacio de Almacenamiento');

    doc.text(10,18, 'Aplicativo del Plan Operativo Anual del Ministerio del Deporte');

    doc.setFontSize(8);

    doc.setFontType("bold");

    doc.text(10,27, f.getDate()+" de "+ meses[f.getMonth()]+" del "+ f.getFullYear());

    doc.setFontType("normal");

    doc.setFontSize(8);

    doc.text('El Ministerio del Deporte emite las condiciones generales relacionadas a la responsabilidad, uso de medios electrónicos y espacio de almacenamiento.', 10, 35,{maxWidth: 195, align: "justify"});

    doc.text('Con este antecedente, '+nombre+" "+apellido+', con número de cédula de ciudadanía: '+cedula+', en calidad de Representante Legal del organismo deportivo '+nombreOrganismo+' con RUC número: '+ruc+', acuerda las siguientes condiciones a las que se someterá, con relación a la utilización de la “Clave” y “Usuario”,para el consentimiento del uso de medios electrónicos, y acceso a los servicios que la Secretaría del Deporte ponga a su disposición a través del uso de un espacio de almacenamiento.', 10, 40,{maxWidth: 195, align: "justify"});

    doc.setFontSize(8);

    doc.setFontType("bold");

    doc.text('Responsabilidad del Representante Legal o representante del organismo deportivo.', 10, 59);

    doc.setFontSize(8);

    doc.setFontType("normal");

    doc.text('El Representante Legal o representante del organismo deportivo asume la responsabilidad total del uso, tanto de la clave de usuario, así como de la veracidad de la información y documentación ingresada al momento de usar el Aplicativo POA en cada uno de sus módulos, y la utilización de los servicios que la Secretaríadel Deporte ponga a su disposición a través de la Internet.', 10, 65,{maxWidth: 195, align: "justify"});

    doc.text('El Representante Legal o representante del organismo deportivo que hoy se desprenden de la firma autógrafa, según señala la “Ley de Comercio Electrónico, Firmas Electrónicas y Mensajes de Datos”, y en base al principio de libertad tecnológica estipulado en el mismo cuerpo legal, las partes acuerdan que la clave provisional proporcionada por la Dirección de Planificación e Inversión de la Secretaría del Deporte al Representante Legal del organismo deportivo y este último genre su propia clave, surtirá los mismos efectos que una firma electrónica, por lo que, tanto su funcionamiento como su aplicación se entenderán como una completa equivalencia funcional, técnica y jurídica.', 10, 76,{maxWidth: 195, align: "justify"});

    doc.setFontSize(8);

    doc.setFontType("bold");

    doc.text('Restricción del Representante Legal del organismo deportivo:', 10, 97);

    doc.setFontSize(8);

    doc.setFontType("normal");

    doc.text('El Representante Legal del organismo deportivo será el único responsable de las decisiones que se adopten durante el trámite del aplicativo y módulos que contiene el mismo; por lo tanto, el cumplimiento o incumplimiento compete exclusivamente a su autoría.', 10, 102,{maxWidth: 195, align: "justify"});

    doc.setFontSize(8);

    doc.setFontType("bold");

    doc.text('Restricción de responsabilidad de Dirección de Planificación e Inversión de la Secretaría del Deporte', 10, 112);


    doc.setFontSize(8);

    doc.setFontType("normal");

    doc.text('La Dirección de Planificación e Inversión de la Secretaría del Deporte no será responsable por las pérdidas o daños sufridos por el Representante Legal del organismo deportivo por causa de terceros o fallas tecnológicas bajo responsabilidad del mismo o de terceros.', 10, 118,{maxWidth: 195, align: "justify"});

    doc.text('La Dirección de Planificación e Inversión de la Secretaría del Deporte no tiene responsabilidad por la exactitud, veracidad, contenido o por cualquier error en la información proporcionada por el Representante Legal del organismo deportivo, sea que se trate de errores humanos o tecnológicos.', 10, 128,{maxWidth: 195, align: "justify"});

     doc.setFontSize(8);

     doc.setFontType("bold");

     doc.text('Restricción de responsabilidad de la Dirección de Tecnologías de la Información y Comunicación', 10, 137);

     doc.setFontSize(8);

     doc.setFontType("normal");

     doc.text('En la aplicación se visualizará información a disposición del Representante Legal del organismo deportivo y/o permitirá la realización del POA para cada móduloen particular. La Dirección de Tecnologías de la Información y Comunicación podrá modificar las funcionalidades en cualquier momento, lo cual acepta el usuario mediante el uso de la aplicación. En todo caso, al momento de realizar dichas modificaciones que la Dirección de Tecnologías considere informar se notificarán al usuario a través del correo electrónico institucional.', 10, 142,{maxWidth: 195, align: "justify"});

     doc.text('El usuario acepta y autoriza que los registros ingresados en el aplicativo por el organismo deportivo previamente autorizados por su inmediato superior que realice en la aplicación constituyen plena prueba de los mismos. La Dirección de Tecnologías de la Información no se responsabiliza por terceros ajenos a usted usen el del Aplicativo del Plan Operativo Anual con su clave;', 10, 157,{maxWidth: 195, align: "justify"});

     doc.text('La Dirección de Tecnologías de la Información y Comunicación no se responsabiliza por utilizar la aplicación y los contenidos con fines lícitos y/o ilícitos, contrarios a lo establecido en este acuerdo de responsabilidad, o al uso mismo de la aplicación, que sean lesivos de los derechos e intereses de terceros, o que de cualquier forma puedan dañar, inutilizar, sobrecargar o deteriorar el aplicativo y los contenidos o impedir la normal utilización o disfrute de esta y de los contenidos por parte del Representante Legal del organismo deportivo.', 10, 169,{maxWidth: 195, align: "justify"});


     doc.setFontSize(8);

     doc.setFontType("bold");

     doc.text('Aceptación', 10, 185);

     doc.setFontSize(8);

     doc.setFontType("normal");

     doc.text('Autorizo a la Secretaría del Deporte a través de las unidades correspondientes a realizar cuanto análisis y verificación se consideren necesarias.', 10, 190,{maxWidth: 195, align: "justify"});

     doc.text('Los términos y condiciones están sujetos a las disposiciones contenidas en la Ley de Comercio Electrónico, Firmas Electrónicas y Mensajes de Datos.', 10, 195,{maxWidth: 195, align: "justify"});

     doc.text('El Representante Legal del organismo deportivo, acepta la validez de este acuerdo, así como la información que anexe en cualquiera de los módulos del Aplicativo del Plan Operativo Anual. La suscripción del presente acuerdo implicará la aceptación de todas y cada una de las disposiciones establecidas antes mencionadas, que se entienden incorporadas a este texto. Los términos y condiciones están sujetos a las disposiciones contenidas en la Ley de Comercio Electrónico, firmas electrónicas y mensajes de datos y las normas laborales vigentes en el Ecuador.', 10, 200,{maxWidth: 195, align: "justify"});

     doc.text('El Representante Legal del organismo deportivo suscribe este acuerdo por su propia iniciativa y se somete voluntariamente a lo aquí estipulado.', 10, 215,{maxWidth: 195, align: "justify"});

     doc.text('El Representante Legal del organismo deportivo acepta la validez de este acuerdo, de la clave provisional de usuario que se le proporciona, la clave que el Representante Legal del organismo deportivo establezca, así como de otra información que envíe a la Dirección de Planificación de la Secretaria del Deporte haciendo uso de los aplicativos o medios electrónicos que la Secretaría del Deporte ponga a su disposición.', 10, 220,{maxWidth: 195, align: "justify"});

     doc.text('Me responsabilizo actual y permanentemente por el buen uso de la clave registrada para acceder al Aplicativo de Planificación.', 10, 232,{maxWidth: 195, align: "justify"});

     doc.text('En tal virtud del presente renuncio a instaurar por este motivo cualquier tipo de acción civil o administrativa en contra de la Secretaría del Deporte, de sus repretsenantes legales y demás servidores por el contenido erróneo de la información, emitida o receptada a través del Aplicativo de Planificación.', 10, 238,{maxWidth: 195, align: "justify"});

     doc.setFontSize(8);

     doc.setFontType("bold");

     doc.text('\r\r_______________________________________________________\r'+nombre+" "+apellido+'\rREPRESENTANTE LEGAL', 10,255);

     doc.save('documentoDeAprobacion.pdf');            		
            		
     /*==========================================================
     =            Guardando documento en el servidor            =
     ==========================================================*/
     
     var paqueteDeDatos = new FormData();

     var blob = doc.output('blob');

     var nombreArchivo=cedula+"__"+ruc;

     var rucBuscador=ruc;

     paqueteDeDatos.append('tipo','documento');
     paqueteDeDatos.append('nombreArchivo',nombreArchivo);
     paqueteDeDatos.append('pdf', blob);
     

  	$.ajax({

		type:"POST",
		url:"modelosBd/inserta/inserta.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false, 
	   	success:function(response){

        	var elementos=JSON.parse(response);

        	var nombreArchivo=elementos['nombreArchivo'];

        	$("#acuerdoConfidencialidadEnlace").attr('href','documentos/acuerdosResponsabilidad/'+nombreArchivo+".pdf");

        	$("#acuerdoConfidencialidadEnlace").attr('nombreArchivo',nombreArchivo);

        	$("#acuerdoConfidencialidadEnlace").attr('rucBuscador',rucBuscador);

	   	},
		error:function(){}
	});	   

    /*=====  End of Guardando documento en el servidor  ======*/
     


}


/*=====  End of Generar archivo de acuerdo  de confidencialidad de terminos y conidiciones  ======*/


/*==================================================================================
=            Generar documento de acuerdo de resposnabilidad nuevamente            =
==================================================================================*/

$('#editarArchivoCon').click(function (e){

	e.preventDefault();	

	$(this).hide();

	$('.reloadConfi').html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

	var confirm= alertify.confirm('','¿Está seguro de volver a generar el acuerdo de confidencialidad, el mismo se reemplazará con el actual y tendrá que volver a subirlo con la firma de responsabilidad pertinente?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

	confirm.set({transition:'slide'});    

	confirm.set('onok', function(){ //callbak al pulsar botón positivo

		nombreArchivo=$("#cedulaPresidenteOrganismoDeportivo").val()+"__"+$("#organismoEnviado").val()+".pdf";
		                     
		var idOrganismo=$("#idOrganismo").val();

		var paqueteDeDatos = new FormData();

		paqueteDeDatos.append('tipo','edicionDocumentoAprobacion');
		paqueteDeDatos.append('nombreArchivo',nombreArchivo);
		paqueteDeDatos.append('idOrganismo',idOrganismo);

		$.ajax({

			type:"POST",
			url:"modelosBd/inserta/inserta.md.php",
			contentType: false,
			data:paqueteDeDatos,
			processData: false,
			cache: false, 
			success:function(response){

	            var elementos=JSON.parse(response);
	            var mensaje=elementos['mensaje'];

          		if (mensaje==1) {

            		mensajeAlertify($("#editarArchivoCon"),9,$(".reloadConfi"));

            	
					mostrarDocumentoTerminosCondiciones($("#cedulaPresidenteOrganismoDeportivo").val(),$("#presidenteOrganismoDeportivo").val(),$("#presidenteOrganismoDeportivoApe").val(),$("#generoPresidente").val(),$("#fechaNacimientoPresidente").val(),$("#correoPresidente").val(),$("#celularPresidente").val(),$("#organismoRucEnviado").val(),$("#organismoEnviado").val(),$("#presidenteOrganismoDeportivo").val()+" "+$("#presidenteOrganismoDeportivoApe").val(),$("#emailOrganismo").val(),$("#direccionOrganismo").val(),$("#referenciaDireccionOrganismo").val(),$("#celularRepresentante").val(),$("#cedulaRepresentanteOrganismoDeportivo").val(),$("#representanteOrganismoDeportivo").val(),$("#nombreProvincia").val(),$("#nombreCanton").val(),$("#nombreParroquia").val());

					$('.reloadConfi').html(' ');
					$("#editarArchivoCon").show();

					$(".acuerdo__responsabilidad__oculto__2").show();

				}

			},
			error:function(){}
			
		});	


	});

	confirm.set('oncancel', function(){
	 //callbak al pulsar botón negativo
		alertify.set("notifier","position", "top-center");
		alertify.notify("Canceló el envío", "success", 1, function(){
			$('.reloadConfi').html(' ');
			$("#editarArchivoCon").show();
		}); 

	}); 

});


/*=====  End of Generar documento de acuerdo de resposnabilidad nuevamente  ======*/


/*===================================================
=            Edición información inicial            =
===================================================*/

$('#guardarInformacion').click(function (e){

	e.preventDefault();	

	$(this).hide();

	$('.reload__registroOrganismos').html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

	var validador= validacionRegistro($(".campos__obligatorios"));
	validacionRegistroMostrarErrores($(".campos__obligatorios"));

	if (validador==false && 3>4) {

		mensajeAlertify($("#guardarInformacion"),0,$(".reload__registroOrganismos"));

	}else{

	  	var confirm= alertify.confirm('','¿Está seguro de actualizar la información de su organismo deportivo?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

		confirm.set({transition:'slide'});    

		confirm.set('onok', function(){ //callbak al pulsar botón positivo
		                
		    var paqueteDeDatos = new FormData();

		    paqueteDeDatos.append('tipo','edicion');

		    var other_data = $('#informacionBasicaOrganismo').serializeArray();

		    $.each(other_data,function(key,input){
		        paqueteDeDatos.append(input.name,input.value);
		    });

			$.ajax({

			    type:"POST",
			    url:"modelosBd/inserta/inserta.md.php",
			    contentType: false,
			    data:paqueteDeDatos,
			    processData: false,
			    cache: false, 
		    	success:function(response){

	            	var elementos=JSON.parse(response);
	            	var mensaje=elementos['mensaje'];

          			if (mensaje==1) {

            			mensajeAlertify($("#guardarInformacion"),8,$(".reload__registroOrganismos"),'datosGenerales');

            		}

				},
				error:function(){

				}
			
			});	

		});

		confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
			alertify.set("notifier","position", "top-center");
			alertify.notify("Canceló el envío", "success", 1, function(){
				$('.reload__registroOrganismos').html(' ');
				$("#guardarInformacion").show();
			}); 
		}); 


	}

});


/*=====  End of Edición información inicial  ======*/


/*======================================================================
=            Enviar documento de acuerdo de responsabilidad            =
======================================================================*/

$('#guardarAcuerdoConfidencialidad').click(function (e){

	$(this).hide();

	$('.reload__registroOrganismos').html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

  	var confirm= alertify.confirm('','¿Está seguro de la contraseña ingresada?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

	confirm.set({transition:'slide'});    

	confirm.set('onok', function(){ //callbak al pulsar botón positivo
	                
	    var paqueteDeDatos = new FormData();

	    var codigoVerificacion=$("#codigoVerificacion").val();

	    var passwordOrganismoReset=$("#passwordOrganismoReset").val();

	    var usuarioOrganismos=$("#usuarioOrganismos").val();

	    paqueteDeDatos.append('tipo','documentoRegistro');

 		paqueteDeDatos.append('codigoVerificacion',codigoVerificacion);

 		paqueteDeDatos.append('passwordOrganismoReset',passwordOrganismoReset);

 		paqueteDeDatos.append('usuarioOrganismos',usuarioOrganismos);


 		if ($(".visualizar__error__password").text()!="") {

            alertify.set("notifier","position", "top-center");
            alertify.notify("Debe ingresar una contraseña válida según los criterios establecidos", "error", 5, function(){});

			$('.reload__registroOrganismos').html(' ');
			$("#guardarAcuerdoConfidencialidad").show();


 		}else if($("#codigoVerificacion").val()=="" || $("#passwordOrganismoReset").val()=="" || $("#usuarioOrganismos").val()==""){

            alertify.set("notifier","position", "top-center");
            alertify.notify("Es obligatorio el código y la contraseña", "error", 5, function(){});

			$('.reload__registroOrganismos').html(' ');
			$("#guardarAcuerdoConfidencialidad").show();


		}else{

			$.ajax({

			    type:"POST",
			    url:"modelosBd/inserta/inserta.md.php",
			    contentType: false,
			    data:paqueteDeDatos,
			    processData: false,
			    cache: false, 
		    	success:function(response){

	            	var elementos=JSON.parse(response);

	            	var mensaje=elementos['mensaje'];

	            	if (mensaje==2) {

			            alertify.set("notifier","position", "top-center");
			            alertify.notify("El código o usuario no existen", "error", 5, function(){});

			            $('.reload__registroOrganismos').html(' ');
						$("#guardarAcuerdoConfidencialidad").show();

	            	}else if(mensaje==1){

	            		mensajeAlertify($("#guardarAcuerdoConfidencialidad"),8,$(".reload__registroOrganismos"),'ingreso');

	            	}

				},
				error:function(){

				}
			
			});	

		}


	});

	confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
		alertify.set("notifier","position", "top-center");
		alertify.notify("Canceló el envío", "success", 1, function(){
			$('.reload__registroOrganismos').html(' ');
			$("#guardarAcuerdoConfidencialidad").show();
		}); 
	}); 

});


/*=====  End of Enviar documento de acuerdo de responsabilidad  ======*/


/*====================================
=            Registro POA            =
====================================*/

$('#guardarRegistroPoa').click(function (e){

	$(this).hide();

	$('.reload__registroOrganismos').html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

	var validador= validacionRegistro($(".campos__obligatorios"));
	validacionRegistroMostrarErrores($(".campos__obligatorios"));

	var validador2= validacionRegistroMuestras($(".valida__erroresEscritura"));
	validacionRegistroMostrarErroresMuestras($(".valida__erroresEscritura"));


	var area__encargadaRotulo=$(".area__encargadaRotulo").text();
	
	var checkeds=validacionRecorrerChekeds($("#terminosCondiciones"));

	if(checkeds=="no"){

        alertify.set("notifier","position", "top-center");
        alertify.notify("Es obligatorio aceptar los términos y condiciones", "error", 8, function(){});

        $(this).show();

        $(".reload__registroOrganismos").html(" ");

	}else{

	    var paqueteDeDatos = new FormData();

	    paqueteDeDatos.append('tipo','registro');

		paqueteDeDatos.append('acuerdoMinisterial', $('#acuerdoMinisterial')[0].files[0]);

		paqueteDeDatos.append('registroDirectorio', $('#registroDirectorio')[0].files[0]);

		paqueteDeDatos.append('registroNombramiento', $('#registroNombramiento')[0].files[0]);

		if($("#tiposOrganimosDeportivos").val()==57){

			paqueteDeDatos.append('registroVigenteN', $('#registroVigenteN')[0].files[0]);

			paqueteDeDatos.append('registrosRotulos', 'si');

		}else{

			paqueteDeDatos.append('registrosRotulos', 'no');

		}

		paqueteDeDatos.append('resolucionInterveciones', $('#resolucionInterveciones')[0].files[0]);

	    var other_data = $('#formularioRegistro').serializeArray();

	    $.each(other_data,function(key,input){
	        paqueteDeDatos.append(input.name,input.value);
	    });

	    paqueteDeDatos.append('area__encargadaRotulo',area__encargadaRotulo);
			
		$.ajax({

		    type:"POST",
		    url:"modelosBd/inserta/inserta.md.php",
		    contentType: false,
		    data:paqueteDeDatos,
		    processData: false,
		    cache: false, 
	    	success:function(response){

            	var elementos=JSON.parse(response);

            	var mensaje=elementos['mensaje'];


            	// if (mensaje==2) {

            	// 	mensajeAlertify($("#guardarRegistroPoa"),3,$(".reload__registroOrganismos"));

            	// }else if(mensaje==3){

            	// 	mensajeAlertify($("#guardarRegistroPoa"),4,$(".reload__registroOrganismos"));

            	// }else if(mensaje==4){

            	// 	mensajeAlertify($("#guardarRegistroPoa"),5,$(".reload__registroOrganismos"));

            	// }else if(mensaje==5){

            	// 	mensajeAlertify($("#guardarRegistroPoa"),6,$(".reload__registroOrganismos"));

            	// }else{

            		mensajeAlertify($("#guardarRegistroPoa"),7,$(".reload__registroOrganismos"));
            		
            	// }

            	$(".bloques__registros").remove();

			},
			error:function(){

			}
		
		});	    

	}

});

/*=====  End of Registro POA  ======*/


/*==========================================
=            Registro proyectos            =
==========================================*/

var guardarElementosGeneral=function(parametro1){

$(parametro1).click(function(e){

	e.preventDefault();	

		var objetivo__especificos = concatenarValores($(".objetivo__especificos"));
		var actividades__rubros = concatenarValores($(".actividades__rubros"));
		var matriz__auxiliar = concatenarValores($(".matriz__auxiliar"));
		var campo__columna = concatenarValores($(".campo__columna"));
		var items__proyecto = concatenarValores($(".items__proyecto"));
		var codigo__proyecto = concatenarValores($(".codigo__proyecto"));
		var indicador__proyecto = concatenarValores($(".indicador__proyecto"));

		var validador= validacionRegistro($(".obligatorios"));
		validacionRegistroMostrarErrores($(".obligatorios"));

		$(parametro1).hide();

		if (validador==false) {


			alertify.set("notifier","position", "top-center");
			alertify.notify("Campos obligatorios", "error", 5, function(){});

			$(parametro1).show();

		}else{

			var confirm= alertify.confirm('¿Está seguro de la información ingresada?','¿Está seguro de la información ingresada?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

			confirm.set({transition:'slide'});    

			confirm.set('onok', function(){ //callbak al pulsar botón positivo


				var paqueteDeDatos = new FormData();

				var other_data = $('#formulario__proyecto').serializeArray();

			    $.each(other_data,function(key,input){
			        paqueteDeDatos.append(input.name,input.value);
			    });

			     paqueteDeDatos.append('tipo','proyecto__paid');

			    let idUsuarioPrincipal=$("#idUsuarioPrincipal").val();

			    paqueteDeDatos.append("idUsuarioPrincipal",idUsuarioPrincipal);

				paqueteDeDatos.append("objetivo__especificos",JSON.stringify(objetivo__especificos));

				paqueteDeDatos.append("items__proyecto",JSON.stringify(items__proyecto));
				paqueteDeDatos.append("codigo__proyecto",JSON.stringify(codigo__proyecto));
				paqueteDeDatos.append("indicador__proyecto",JSON.stringify(indicador__proyecto));


				$.ajax({

					type:"POST",
					url:"modelosBd/inserta/insertaAcciones.md.php",
					contentType: false,
					data:paqueteDeDatos,
					processData: false,
					cache: false, 
					success:function(response){

						var elementos=JSON.parse(response);

            			var mensaje=elementos['mensaje'];

		            	if (mensaje==1) {

				            alertify.set("notifier","position", "top-center");
				            alertify.notify("Registro realizado correctamente", "success", 5, function(){});


				            window.setTimeout(function(){ 

				            	window.location ="paidproyectos";

				            } ,5000); 


		            	}

					},
					error:function(){

					}
						
				});	


			});

			confirm.set('oncancel', function(){ //callbak al pulsar botón negativo

				alertify.set("notifier","position", "top-center");

				alertify.notify("Acción cancelada", "error", 1, function(){

					$(parametro1).show();

				}); 

			});			

		}


 	

});
		

}

guardarElementosGeneral($("#guardarRegistro__proyectos"));


/*=====  End of Registro proyectos  ======*/


});