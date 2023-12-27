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

function validacionRegistroChecks(parametro1){

	var sumadorCheked=0;

	$(parametro1).each(function(index) {
		var condicion = $(parametro1).is(":checked");
		if (condicion) {
	    	sumadorCheked++;
		}
	});

	if (sumadorCheked>0) {
		return true;
	}else{
		return false;
	}

}


var checkedsArrays=function(parametro1){

	var array = new Array(); 

    $(parametro1).each(function(index) {

    	var condicion = $(this).is(":checked");

    	if (condicion) {

    		array.push($(this).attr('attr'));

    	}

    });

    var stringArray=array.join(",");

    return array;

}

var incluirCeros=function(parametro1){

	$(parametro1).click(function (e){

		if($(this).val()=="0"){

			$(this).val(" ");

		}

	});


	$(parametro1).blur(function (e){

		if($(this).val()==" "){

			$(this).val("0");

		}

	});

}

var sumarIndicadores=function(parametro1,parametro2){

	$(parametro1).on('input', function () {

		var sum = 0;

		$(parametro1).each(function(){
		    sum += parseFloat($(this).val());
		});

		$(parametro2).val(sum);

	});

}

function validacionRegistroChecks(parametro1){

	var sumadorCheked=0;

	$(parametro1).each(function(index) {
		var condicion = $(parametro1).is(":checked");
		if (condicion) {
	    	sumadorCheked++;
		}
	});

	if (sumadorCheked>0) {
		return true;
	}else{
		return false;
	}

}

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

var selectObjetivosEstrategicos=function(parametro1,parametro2,parametro3,parametro4){

	$(parametro1).click(function (e){

		$(".idOrganismo").val($("#idOrganismoPrincipal").val());

		$(parametro4).val(parametro3);

		indicador=16;

		$.ajax({

			data: {indicador:indicador},
			dataType: 'html',
			type:'POST',
			url:'modelosBd/validaciones/selector.modelo.php'

		}).done(function(listar__lugar){

			$(parametro2).html(listar__lugar);

		}).fail(function(){});

	});	

}

var obteniendoInputEscondido=function(parametro1,parametro2,parametro3){

	$(parametro1).click(function (e){

		$(parametro3).val(parametro2);

	});	

}

var selectObjetivosPrincipal=function(parametro1,parametro2){

	$(parametro1).click(function (e){

		indicador=9;

		$.ajax({

			data: {indicador:indicador},
			dataType: 'html',
			type:'POST',
			url:'modelosBd/validaciones/selector.modelo.php'

		}).done(function(listar__lugar){

			$(parametro2).html(listar__lugar);

		}).fail(function(){});

	});	

}

var programasPrincipal=function(parametro1,parametro2){

	$(parametro1).click(function (e){

		indicador=18;

		$.ajax({

			data: {indicador:indicador},
			dataType: 'html',
			type:'POST',
			url:'modelosBd/validaciones/selector.modelo.php'

		}).done(function(listar__lugar){

			$(parametro2).html(listar__lugar);

		}).fail(function(){});

	});	

}

var selectPrograma=function(parametro1,parametro2){

	$(parametro1).change(function (e){

		indicador=17;

		var valor=$(this).val();


		$.ajax({

			data: {indicador:indicador,parametro2:valor},
			dataType: 'html',
			type:'POST',
			url:'modelosBd/validaciones/selector.modelo.php'

		}).done(function(listar__lugar){

			$(parametro2).html(listar__lugar);

		}).fail(function(){});

	});	

}

var guardarElementos=function(parametro1,parametro2,parametro3,parametro4,parametro5,parametro6,parametro7){

$(parametro1).click(function(e){

	$(parametro1).hide();

	$(parametro3).html('<img src="images/reloadGit.webp" style="width:100%; height:30px; border-radius:1em;">');

	$(".reload__Enviosrealizados").html('<img src="images/reloadGit.webp" style="width:50%; height:30px; border-radius:1em;">');

	if (parametro4=="poaOrganismo") {

		var validador= validacionRegistro($(".campos__obligatorios"));
		validacionRegistroMostrarErrores($(".campos__obligatorios"));

	}else{

		var validador= validacionRegistro($(".obligatorios__campos"+parametro5));
		validacionRegistroMostrarErrores($(".obligatorios__campos"+parametro5));

	}

	var validadorInicial= validacionRegistro($("#agregado"+parametro5));

	var validadorInicialRubros= validacionRegistro($("#agregado"+(parametro5 + 1)));
	validacionRegistroMostrarErrores($("#agregado"+(parametro5 + 1)));
	var validadorInicialRubros2= validacionRegistro($("#agregado"+(parametro5 + 2)));
	validacionRegistroMostrarErrores($("#agregado"+(parametro5 + 2)));

	var validadorCheckeds=validacionRegistroChecks($(".conjunto__checkeds"));

	var arrayCheckeds=checkedsArrays($(".conjunto__checkeds"));

	if (validadorInicial==false) {


		alertify.set("notifier","position", "top-center");
		alertify.notify("Campos obligatorios", "error", 5, function(){});

		$(parametro1).show();

		$(parametro3).html(' ');

	}else if(parametro4=="rubrosPaid"  && (validadorInicialRubros==false || validadorInicialRubros2==false)){


		alertify.set("notifier","position", "top-center");
		alertify.notify("Obligatorios los registros", "error", 5, function(){});

		$(parametro1).show();

		$(parametro3).html(' ');


	}else if(parametro4=="rubrosPaid"  && validadorCheckeds==false){


		alertify.set("notifier","position", "top-center");
		alertify.notify("Obligatorio seleccionar un item", "error", 5, function(){});

		$(parametro1).show();

		$(parametro3).html(' ');


	}else if(validadorCheckeds==false && parametro4=="actividadInserta"){

		alertify.set("notifier","position", "top-center");
		alertify.notify("Obligatorio seleccionar un item", "error", 5, function(){});

		$(parametro1).show();

		$(parametro3).html(' ');

	}else if (validador==false) {

		alertify.set("notifier","position", "top-center");
		alertify.notify("Campos obligatorios", "error", 5, function(){});

		$(parametro1).show();

		$(parametro3).html(' ');

	}else{

		var confirm= alertify.confirm('¿La información ingesada es la correcta?','¿La información ingesada es la correcta?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

		confirm.set({transition:'slide'});    

		confirm.set('onok', function(){ //callbak al pulsar botón positivo
			  

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo',parametro4);		

			var other_data = $(parametro2).serializeArray();

			var array = new Array(); 

			$.each(other_data,function(key,input){
				paqueteDeDatos.append(input.name,input.value);
				array.push(input.value);
			});

			if (parametro4=="itemsCiudadanosPre__modificaciones") {

			    var actividadEnvidada=$("#idActividad"+parametro6).val();

			     paqueteDeDatos.append('actividadEnvidada', actividadEnvidada);

			}

			var idAtributoEscondido=$(".idAtributoEscondido").val();


			var emailPrincipal=$("#emailPrincipal").val();
			var nombrePrincipalU=$("#nombrePrincipalU").val();
			var idOrganismoPrincipal=$("#idOrganismoPrincipal").val();
			var fechaPrincipalJ=$("#fechaPrincipalJ").val();
			var idUsuarioPrincipal=$("#idUsuarioPrincipal").val();

			var agregado=$("#agregado"+parametro5).val();

			if(parametro4=="actividadInserta"){

				paqueteDeDatos.append('arrayCheckeds', JSON.stringify(arrayCheckeds));

			}


			var elemento__escondidoI=$(".elemento__escondidoI").val();

			paqueteDeDatos.append("idAtributoEscondido",idAtributoEscondido);

			paqueteDeDatos.append("idUsuarioPrincipal",idUsuarioPrincipal);
			paqueteDeDatos.append("emailPrincipal",emailPrincipal);
			paqueteDeDatos.append("nombrePrincipalU",nombrePrincipalU);
			paqueteDeDatos.append("idOrganismoPrincipal",idOrganismoPrincipal);
			paqueteDeDatos.append("fechaPrincipalJ",fechaPrincipalJ);
			paqueteDeDatos.append("agregado",agregado);
			paqueteDeDatos.append("elemento__escondidoI",elemento__escondidoI);

			paqueteDeDatos.append("identificador",parametro7);

			let idUsados__items=$("#idUsados__items").val();

			paqueteDeDatos.append("idUsados__items",idUsados__items);

			paqueteDeDatos.append('arrayInformacion', JSON.stringify(array));

			if(parametro4=="rubrosPaid"){

				paqueteDeDatos.append('arrayCheckeds', JSON.stringify(arrayCheckeds));

			}

			if(parametro4=="rubrosPaid__2"){

				paqueteDeDatos.append('arrayCheckeds', JSON.stringify(arrayCheckeds));

			}

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

					if(mensaje==1){

				    	alertify.set("notifier","position", "top-center");
				    	alertify.notify("Registro realizado correctamente", "success", 4, function(){});

				    	$("#formAgregado"+parametro5).remove();

				    	if (parametro4=="poaOrganismo") {

				    		$(".boton__enlacesOcultos").show();
				    		$(".reload__Enviosrealizados").html(' ');

				    	}

		        	}

		        	if (parametro4=="itemsCiudadanosPre__modificaciones" && mensaje==20) {

		        		var sumar=elementos['sumar'];

		        		alertify.set("notifier","position", "top-center");
				    	alertify.notify("No se puede registrar su monto el cual suma con el valor asignado "+parseFloat(sumar).toFixed(2), "error", 10, function(){});

				    	$(".boton__enlacesOcultos").show();
				    	$(".reload__Enviosrealizados").html(' ');

		        	}else if(parametro4=="itemsCiudadanosPre__modificaciones" && mensaje==21){


		        		var sumar=elementos['sumar'];

		        		alertify.set("notifier","position", "top-center");
				    	alertify.notify("El monto total del ítem no puede ser cero", "error", 10, function(){});

				    	$(".boton__enlacesOcultos").show();
				    	$(".reload__Enviosrealizados").html(' ');

		        	}



				},
				error:function(){

				}
				
			});	

		});

		confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
			alertify.set("notifier","position", "top-center");
			alertify.notify("Acción cancelada", "error", 1, function(){

				$(".boton__enlacesOcultos").show();
				$('.reload__Enviosrealizados').html(' ');

			}); 
		}); 

	}

});
		
}

var guardarElementos__modificaciones=function(parametro1,parametro2,parametro3,parametro4,parametro5,parametro6,parametro7){

$(parametro1).click(function(e){

	$(parametro1).hide();

	$(parametro3).html('<img src="images/reloadGit.webp" style="width:100%; height:30px; border-radius:1em;">');

	$(".reload__Enviosrealizados").html('<img src="images/reloadGit.webp" style="width:50%; height:30px; border-radius:1em;">');

	if (parametro4=="poaOrganismo") {

		var validador= validacionRegistro($(".campos__obligatorios"));
		validacionRegistroMostrarErrores($(".campos__obligatorios"));

	}else{

		var validador= validacionRegistro($(".obligatorios__campos"+parametro5));
		validacionRegistroMostrarErrores($(".obligatorios__campos"+parametro5));

	}

	var validadorInicial= validacionRegistro($("#agregado"+parametro5));

	var validadorInicialRubros= validacionRegistro($("#agregado"+(parametro5 + 1)));
	validacionRegistroMostrarErrores($("#agregado"+(parametro5 + 1)));
	var validadorInicialRubros2= validacionRegistro($("#agregado"+(parametro5 + 2)));
	validacionRegistroMostrarErrores($("#agregado"+(parametro5 + 2)));

	var validadorCheckeds=validacionRegistroChecks($(".conjunto__checkeds"));

	var arrayCheckeds=checkedsArrays($(".conjunto__checkeds"));

	let evidenciaCargadas=$(".evidenciaCargadas").val();

	if(($('.evidencia'+parametro5).val()=="" || $('.evidencia'+parametro5).val()==" ") && evidenciaCargadas==="si"){

		alertify.set("notifier","position", "top-center");
		alertify.notify("Documento de evidencia obligatorio", "error", 5, function(){});

		$(parametro1).show();

		$(parametro3).html(' ');

		$(".reload__Enviosrealizados").html(' ');

	}else if (validadorInicial==false) {


		alertify.set("notifier","position", "top-center");
		alertify.notify("Campos obligatorios", "error", 5, function(){});

		$(parametro1).show();

		$(parametro3).html(' ');

		$(".reload__Enviosrealizados").html(' ');

	}else if(parametro4=="rubrosPaid"  && (validadorInicialRubros==false || validadorInicialRubros2==false)){


		alertify.set("notifier","position", "top-center");
		alertify.notify("Obligatorios los registros", "error", 5, function(){});

		$(parametro1).show();

		$(parametro3).html(' ');

		$(".reload__Enviosrealizados").html(' ');


	}else if(parametro4=="rubrosPaid"  && validadorCheckeds==false){


		alertify.set("notifier","position", "top-center");
		alertify.notify("Obligatorio seleccionar un item", "error", 5, function(){});

		$(parametro1).show();

		$(parametro3).html(' ');

		$(".reload__Enviosrealizados").html(' ');

	}else if(validadorCheckeds==false && parametro4=="actividadInserta"){

		alertify.set("notifier","position", "top-center");
		alertify.notify("Obligatorio seleccionar un item", "error", 5, function(){});

		$(parametro1).show();

		$(parametro3).html(' ');

		$(".reload__Enviosrealizados").html(' ');

	}else if (validador==false) {

		alertify.set("notifier","position", "top-center");
		alertify.notify("Campos obligatorios", "error", 5, function(){});

		$(parametro1).show();

		$(parametro3).html(' ');

		$(".reload__Enviosrealizados").html(' ');

	}else{

		var confirm= alertify.confirm('¿La información ingesada es la correcta?','¿La información ingesada es la correcta?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

		confirm.set({transition:'slide'});    

		confirm.set('onok', function(){ //callbak al pulsar botón positivo
			  

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo',parametro4);		

			var other_data = $(parametro2).serializeArray();

			var array = new Array(); 

			$.each(other_data,function(key,input){
				paqueteDeDatos.append(input.name,input.value);
				array.push(input.value);
			});

			if (parametro4=="itemsCiudadanosPre__modificaciones") {

			    var actividadEnvidada=$("#idActividad"+parametro6).val();

			     paqueteDeDatos.append('actividadEnvidada', actividadEnvidada);

			}

			var idAtributoEscondido=$(".idAtributoEscondido").val();


			if (evidenciaCargadas=="si") {
				paqueteDeDatos.append('fileArchivoEvidencias', $('.evidencia'+parametro5)[0].files[0]);
			}else{
				paqueteDeDatos.append('fileArchivoEvidencias',"no");
			}

			
			paqueteDeDatos.append("evidenciaCargadas",evidenciaCargadas);

			var emailPrincipal=$("#emailPrincipal").val();
			var nombrePrincipalU=$("#nombrePrincipalU").val();
			var idOrganismoPrincipal=$("#idOrganismoPrincipal").val();
			var fechaPrincipalJ=$("#fechaPrincipalJ").val();
			var idUsuarioPrincipal=$("#idUsuarioPrincipal").val();

			var agregado=$("#agregado"+parametro5).val();

			if(parametro4=="actividadInserta"){

				paqueteDeDatos.append('arrayCheckeds', JSON.stringify(arrayCheckeds));

			}


			var elemento__escondidoI=$(".elemento__escondidoI").val();

			paqueteDeDatos.append("idAtributoEscondido",idAtributoEscondido);

			paqueteDeDatos.append("idUsuarioPrincipal",idUsuarioPrincipal);
			paqueteDeDatos.append("emailPrincipal",emailPrincipal);
			paqueteDeDatos.append("nombrePrincipalU",nombrePrincipalU);
			paqueteDeDatos.append("idOrganismoPrincipal",idOrganismoPrincipal);
			paqueteDeDatos.append("fechaPrincipalJ",fechaPrincipalJ);
			paqueteDeDatos.append("agregado",agregado);
			paqueteDeDatos.append("elemento__escondidoI",elemento__escondidoI);

			paqueteDeDatos.append("identificador",parametro7);

			let idUsados__items=$("#idUsados__items").val();

			paqueteDeDatos.append("idUsados__items",idUsados__items);

			paqueteDeDatos.append('arrayInformacion', JSON.stringify(array));

			if(parametro4=="rubrosPaid"){

				paqueteDeDatos.append('arrayCheckeds', JSON.stringify(arrayCheckeds));

			}

			if(parametro4=="rubrosPaid__2"){

				paqueteDeDatos.append('arrayCheckeds', JSON.stringify(arrayCheckeds));

			}

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

					if(mensaje==1){

				    	alertify.set("notifier","position", "top-center");
				    	alertify.notify("Registro realizado correctamente", "success", 4, function(){});

				    	$("#formAgregado"+parametro5).remove();

				    	if (parametro4=="poaOrganismo") {

				    		$(".boton__enlacesOcultos").show();
				    		$(".reload__Enviosrealizados").html(' ');
				    		$(".reload__Enviosrealizados").html(' ');
				    		$(parametro1).show();

				    	}

		        	}

		        	if (parametro4=="itemsCiudadanosPre__modificaciones" && mensaje==20) {

		        		var sumar=elementos['sumar'];

		        		alertify.set("notifier","position", "top-center");
				    	alertify.notify("No se puede registrar su monto el cual suma con el valor asignado "+parseFloat(sumar).toFixed(2), "error", 10, function(){});

				    	$(".boton__enlacesOcultos").show();
				    	$(".reload__Enviosrealizados").html(' ');

		        	}else if(parametro4=="itemsCiudadanosPre__modificaciones" && mensaje==21){


		        		var sumar=elementos['sumar'];

		        		alertify.set("notifier","position", "top-center");
				    	alertify.notify("El monto total del ítem no puede ser cero", "error", 10, function(){});

				    	$(".boton__enlacesOcultos").show();
				    	$(".reload__Enviosrealizados").html(' ');

		        	}

		        	$(".reload__Enviosrealizados").html(' ');
		        	$(parametro1).show();

				},
				error:function(){

				}
				
			});	

		});

		confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
			alertify.set("notifier","position", "top-center");
			alertify.notify("Acción cancelada", "error", 1, function(){

				$(".boton__enlacesOcultos").show();
				$('.reload__Enviosrealizados').html(' ');

			}); 
		}); 

	}

});
		
}


var actualizaInfor=function(parametro1,parametro2,parametro3,parametro4,parametro5,parametro6){

	$(parametro1).click(function (e){

		var paqueteDeDatos = new FormData();

		var array = new Array(); 

		paqueteDeDatos.append("tipo",parametro2);

		var other_data = $(parametro5).serializeArray();

		$.each(other_data,function(key,input){
			paqueteDeDatos.append(input.name,input.value);
			array.push(input.value);
		});

		paqueteDeDatos.append('arrayInformacion', JSON.stringify(array));

		$.ajax({

			type:"POST",
			url:"modelosBd/inserta/seleccionaAcciones.md.php",
			contentType: false,
			data:paqueteDeDatos,
			processData: false,
			cache: false, 
			success:function(response){

			   	var elementos=JSON.parse(response);

			   	var informacionSeleccionada=elementos['informacionSeleccionada'];

			   	for (x of informacionSeleccionada) {

			   		if (parametro2=="actividadesUso") {

			   			$(parametro6[0]).val(parseFloat(x.primertrimestre));
			   			$(parametro6[1]).val(parseFloat(x.segundotrimestre));
			   			$(parametro6[2]).val(parseFloat(x.tercertrimestre));
			   			$(parametro6[3]).val(parseFloat(x.cuartotrimestre));
			   			$(parametro6[4]).val(parseFloat(x.metaindicador));

			   		}

				}			


			},
			error:function(){

			}
					
		});	

	});	

}

var contadorGeneral=0;

var generador=0;

var informacionGlobal="";



	var eliminarElementosCrea=function(parametro1,parametro2,parametro3){

	$(parametro1).click(function(e){

		$(parametro2).remove();

	});
			

	}

var segmentosJs=function(parametro1,parametro2,parametro3,parametro4,parametro5,parametro6,parametro7){


$(parametro1).click(function(e){

	e.preventDefault();

	contadorGeneral++;

	if (parametro6=="agregarItesOrganismosPre") {
		var contenedor="<form id='formAgregado"+contadorGeneral+"' class='d d-flex conjunto__validas justify-content-center formAgregado"+contadorGeneral+" unanimeEl__"+parametro7+"'>";
	}else{
		var contenedor="<form id='formAgregado"+contadorGeneral+"' class='row d d-flex col col-12 flex-wrap conjunto__validas justify-content-center formAgregado"+contadorGeneral+"'>";
	}

	
	for (var i =0; i < parametro3.length; i++) {

		generador++;

		if (parametro3[i]=="select__rubros__multiples") {

			contenedor+="<div class='col col-12 row fila__agregado"+contadorGeneral+"'><select id='agregado"+generador+"' name='agregado"+generador+"[]' class='col col-10 ancho__total__input mt-2 obligatorios__campos"+contadorGeneral+" agregado"+generador+" cambiarSelectIt"+generador+"' multiple='multiple' style='height:80px!important;font-size:10px!important;'></select></div>";

			$('#agregado'+generador).multiSelect()

			var selectLineaPolitica=function(parametro1,parametro2){

				indicador=parametro2;

				let valorComparativo=$("#valorComparativo").val();

				$.ajax({

					data: {indicador:1006,evaluador:valorComparativo},
				  	dataType: 'html',
				  	type:'POST',
					url:'modelosBd/validaciones/selector.modelo.php'

				}).done(function(listar__lugar){

					$("#agregado"+parametro1).html(listar__lugar);

				}).fail(function(){});

			}

			selectLineaPolitica(generador,parametro4[i]);	

		}else if (parametro3[i]=="input") {

			contenedor+="<div class='col col-"+parametro5+" row fila__agregado"+contadorGeneral+"'><input id='agregado"+generador+"' name='agregado"+generador+"' placeholder='"+parametro4[i]+"' class='col col-10 ancho__total__input mt-2 obligatorios__campos"+contadorGeneral+"' /></div>";

		}else if(parametro3[i]=="select"){

			if (parametro6=="agregarItesOrganismosPre") {

				contenedor+="<div class='col col-"+parametro5+" row fila__agregado"+contadorGeneral+"'><select id='agregado"+generador+"' name='agregado"+generador+"' class='col col-10 ancho__total__input mt-2 obligatorios__campos"+contadorGeneral+" agregado"+generador+" cambiarSelectIt"+generador+"'></select></div>";

			}else{

				contenedor+="<div class='col col-"+parametro5+" row fila__agregado"+contadorGeneral+"'><select id='agregado"+generador+"' name='agregado"+generador+"' class='col col-10 ancho__total__input mt-2 obligatorios__campos"+i+" agregado"+generador+"'></select></div>";

			}

			switch (parametro6) {

			  case "componentesPaid":
			  
				var selectLineaPolitica=function(parametro1,parametro2){

					indicador=parametro2;

					let valorComparativo=$("#valorComparativo").val();

					$.ajax({

					  data: {indicador:indicador,evaluador:valorComparativo},
				      dataType: 'html',
				      type:'POST',
					  url:'modelosBd/validaciones/selector.modelo.php'

					}).done(function(listar__lugar){

					  $("#agregado"+parametro1).html(listar__lugar);

					}).fail(function(){});

				}

				selectLineaPolitica(generador,parametro4[i]);	

			  break;	 

			  case "itemRubrosPaid":
			  
				var selectLineaPolitica=function(parametro1,parametro2){

					indicador=parametro2;

					let idUsados__items= $("#idUsados__items").val();

					$.ajax({

					  data: {indicador:indicador,evaluador:idUsados__items},
				      dataType: 'html',
				      type:'POST',
					  url:'modelosBd/validaciones/selector.modelo.php'

					}).done(function(listar__lugar){

					  $("#agregado"+parametro1).html(listar__lugar);

					}).fail(function(){});

				}

				selectLineaPolitica(generador,parametro4[i]);	

			  break;	 

			  case "componentesRubrosPaid":
			  
				var selectLineaPolitica=function(parametro1,parametro2){

					indicador=parametro2;

					let idUsados__items= $("#valorComparativo").val();

					$.ajax({

					  data: {indicador:1007,evaluador:idUsados__items},
				      dataType: 'html',
				      type:'POST',
					  url:'modelosBd/validaciones/selector.modelo.php'

					}).done(function(listar__lugar){

					  $("#agregado"+parametro1).html(listar__lugar);

					}).fail(function(){});

				}

				selectLineaPolitica(generador,parametro4[i]);	

			  break;	


			  case "tipoOrganiPaid":
			  
				var selectLineaPolitica=function(parametro1,parametro2){

					indicador=parametro2;

					let valorComparativo=$("#valorComparativo").val();

					$.ajax({

					  data: {indicador:indicador,evaluador:valorComparativo},
				      dataType: 'html',
				      type:'POST',
					  url:'modelosBd/validaciones/selector.modelo.php'

					}).done(function(listar__lugar){

					  $("#agregado"+parametro1).html(listar__lugar);

					}).fail(function(){});

				}

				selectLineaPolitica(generador,parametro4[i]);	

			  break;	 

			  case "tipoOrganiPaid__2":
			  
				var selectLineaPolitica=function(parametro1,parametro2){

					indicador=parametro2;

					let valorComparativo=$("#valorComparativo").val();

					$.ajax({

					  data: {indicador:indicador,evaluador:valorComparativo},
				      dataType: 'html',
				      type:'POST',
					  url:'modelosBd/validaciones/selector.modelo.php'

					}).done(function(listar__lugar){

					  $("#agregado"+parametro1).html(listar__lugar);

					}).fail(function(){});

				}

				selectLineaPolitica(generador,parametro4[i]);	

			  break;

			  case "objetivo":
			  
				var selectLineaPolitica=function(parametro1,parametro2){

					indicador=parametro2;

					$.ajax({

					  data: {indicador:indicador},
				      dataType: 'html',
				      type:'POST',
					  url:'modelosBd/validaciones/selector.modelo.php'

					}).done(function(listar__lugar){

					  $("#agregado"+parametro1).html(listar__lugar);

					}).fail(function(){});

				}

				selectLineaPolitica(generador,parametro4[i]);	

			  break;	 

			  case "tipoOrganismo":
			  
				var selectAreaAccion=function(parametro1,parametro2){

					indicador=parametro2;

					$.ajax({

					  data: {indicador:indicador},
				      dataType: 'html',
				      type:'POST',
					  url:'modelosBd/validaciones/selector.modelo.php'

					}).done(function(listar__lugar){

					  $("#agregado"+parametro1).html(listar__lugar);

					}).fail(function(){});

				}

				selectAreaAccion(generador,parametro4[i]);	

				var selectObjetivos=function(parametro1,parametro2){

					indicador=parametro2;

					$.ajax({

					  data: {indicador:indicador},
				      dataType: 'html',
				      type:'POST',
					  url:'modelosBd/validaciones/selector.modelo.php'

					}).done(function(listar__lugar){

					  $("#agregado"+parametro1).html(listar__lugar);

					}).fail(function(){});

				}

				selectObjetivos(generador,parametro4[i]);	


				var selectAreaEncargada=function(parametro1,parametro2){

					indicador=parametro2;

					$.ajax({

					  data: {indicador:indicador},
				      dataType: 'html',
				      type:'POST',
					  url:'modelosBd/validaciones/selector.modelo.php'

					}).done(function(listar__lugar){

					  $("#agregado"+parametro1).html(listar__lugar);

					}).fail(function(){});

				}

				selectAreaEncargada(generador,parametro4[i]);	



			  break;	 

			  case "actividadIngresada":

				var selectorActividadIngre=function(parametro1,parametro2){

					indicador=parametro2;

					$.ajax({

					  data: {indicador:indicador},
				      dataType: 'html',
				      type:'POST',
					  url:'modelosBd/validaciones/selector.modelo.php'

					}).done(function(listar__lugar){

					  $("#agregado"+parametro1).html(listar__lugar);

					}).fail(function(){});

				}

				selectorActividadIngre(generador,parametro4[i]);				  	



			  break;

			  case "itemAgregaActividad":

				var selectorActividadItem=function(parametro1,parametro2,parametro3){

					indicador=parametro2;
					elementos=$(parametro3).val();

					$.ajax({

					  data: {indicador:indicador,elementos:elementos},
				      dataType: 'html',
				      type:'POST',
					  url:'modelosBd/validaciones/selector.modelo.php'

					}).done(function(listar__lugar){

					  $("#agregado"+parametro1).html(listar__lugar);

					}).fail(function(){});

				}

				selectorActividadItem(generador,parametro4[i],$(".elemento__escondidoI"));				  	


			  break;

			  case "agregarItesOrganismosPre":

				var selectorActividadItem=function(parametro1,parametro2,parametro3){

					indicador=19;

					$.ajax({

					  data: {indicador:indicador,elementos:parametro2,idOrganismo:parametro3},
				      dataType: 'html',
				      type:'POST',
					  url:'modelosBd/validaciones/selector.modelo.php'

					}).done(function(listar__lugar){

					  $(".agregado"+parametro1).html(listar__lugar);

					}).fail(function(){});

				}

				selectorActividadItem(generador,parametro7,$("#organismoIdPrin").val());

			  break;

			}			

		

		}else if(parametro3[i]=="cheboxMultiple"){

			var obtenerInformacionReferente=function(parametro1,parametro2){

					contenedor+="<div style='font-weight:bold;' class='mt-4 col col-12 text-center'>ITEMS</div><div class='contenedor__checkeds col col-12 row fila__agregado"+contadorGeneral+" d d-flex mt-4'></div>"
   

					$.ajax({

					  data: {tipo:parametro1},
				      dataType: 'html',
				      type:'POST',
					  url:'modelosBd/validaciones/seleccionaInformacion.modelo.php'

					}).done(function(objeto){

			        	var elementos=JSON.parse(objeto);

			        	var obtenerInformacion=elementos['obtenerInformacion'];

						for (x of obtenerInformacion) {


						 	$(".contenedor__checkeds").append("<div  class='col col-4 d-flex row justify-content-center align-items-center'><input type='checkbox' id='agregado"+generador+"' name='agregado"+generador+"'  attr='"+x.idItem+"' class='col col-2 conjunto__checkeds'/>&nbsp;&nbsp;<span class='col col-8'>"+x.nombreItem+"</div></div>");

						}

					}).fail(function(){});

			}

			obtenerInformacionReferente("itemsSelect");	

		}else if(parametro3[i]=="cheboxMultiple__2"){

			var obtenerInformacionReferente=function(parametro1,parametro2){

					contenedor+="<div style='font-weight:bold;' class='mt-4 col col-12 text-center'>ITEMS</div><div class='contenedor__checkeds col col-12 row fila__agregado"+contadorGeneral+" d d-flex mt-4'></div>"
   

					$.ajax({

					  data: {tipo:parametro1},
				      dataType: 'html',
				      type:'POST',
					  url:'modelosBd/validaciones/seleccionaInformacion.modelo.php'

					}).done(function(objeto){

			        	var elementos=JSON.parse(objeto);

			        	var obtenerInformacion=elementos['obtenerInformacion'];

						for (x of obtenerInformacion) {


						 	$(".contenedor__checkeds").append("<div  class='col col-4 d-flex row justify-content-center align-items-center'><input type='checkbox' id='agregado"+generador+"' name='agregado"+generador+"'  attr='"+x.idItem+"' class='col col-2 conjunto__checkeds'/>&nbsp;&nbsp;<span class='col col-8'>"+x.nombreItem+"</div></div>");

						}

					}).fail(function(){});

			}

			obtenerInformacionReferente("itemsSelect__2");	

		}else if(parametro3[i]=="cheboxMultiple__3"){

			var obtenerInformacionReferente=function(parametro1,parametro2){

					contenedor+="<div style='font-weight:bold;' class='mt-4 col col-12 text-center'>ITEMS</div><div class='contenedor__checkeds col col-12 row fila__agregado"+contadorGeneral+" d d-flex mt-4'></div>"
   

					$.ajax({

					  data: {tipo:parametro1},
				      dataType: 'html',
				      type:'POST',
					  url:'modelosBd/validaciones/seleccionaInformacion.modelo.php'

					}).done(function(objeto){

			        	var elementos=JSON.parse(objeto);

			        	var obtenerInformacion=elementos['obtenerInformacion'];

						for (x of obtenerInformacion) {


						 	$(".contenedor__checkeds").append("<div  class='col col-4 d-flex row justify-content-center align-items-center'><input type='checkbox' id='agregado"+generador+"' name='agregado"+generador+"'  attr='"+x.idItem+"' class='col col-2 conjunto__checkeds'/>&nbsp;&nbsp;<span class='col col-8'>"+x.nombreItem+"</div></div>");

						}

					}).fail(function(){});

			}

			obtenerInformacionReferente("itemsSelect__3");	

		}

	}

	contenedor+="<div class='col col-2 row botones__acciones"+contadorGeneral+" d d-flex justify-content-center'></div>";

	contenedor+="</form>";


	$(parametro2).append(contenedor);


	$(".botones__acciones"+contadorGeneral).append("<a class='btn btn-primary col col-4 mt-2 left__margen boton__enlacesOcultos' id='guardarGeneral"+contadorGeneral+"' name='guardarGeneral"+contadorGeneral+"' idContador='"+contadorGeneral+"' style='height:35px;'><i class='fas fa-save'></i></a>&nbsp;&nbsp;");
	

	$(".botones__acciones"+contadorGeneral).append("<a class='btn btn-danger col col-4 mt-2 eliminar"+contadorGeneral+"' id='eliminar"+contadorGeneral+"' name='eliminar"+contadorGeneral+"' idContador='"+contadorGeneral+"' style='height:35px;'><i class='fas fa-trash'></i></a><div class='col col-4 mt-2 reloadG__"+contadorGeneral+" reload__Enviosrealizados'></div>");

	/*==================================
	=            Eliminando            =
	==================================*/
	switch (parametro6) {

	 case "agregarItesOrganismosPre":

	  	guardarElementos($("#guardarGeneral"+contadorGeneral),$("#formAgregado"+contadorGeneral),$(".reloadG__"+contadorGeneral),"itemsCiudadanosPre__modificaciones",contadorGeneral,parametro7);

	  break;	

	  case "agregarItemsInserta":

	  	guardarElementos($("#guardarGeneral"+contadorGeneral),$("#formAgregado"+contadorGeneral),$(".reloadG__"+contadorGeneral),"agregarItemsInserta",contadorGeneral);

	  break;

	  case "actividadIngresada":

	  	guardarElementos($("#guardarGeneral"+contadorGeneral),$("#formAgregado"+contadorGeneral),$(".reloadG__"+contadorGeneral),"actividadInserta",contadorGeneral);

	  break;


	  case "linea":

	  	guardarElementos($("#guardarGeneral"+contadorGeneral),$("#formAgregado"+contadorGeneral),$(".reloadG__"+contadorGeneral),"lineaPolitica",contadorGeneral);

	  break;

	  case "programa":
	  
	  	guardarElementos($("#guardarGeneral"+contadorGeneral),$("#formAgregado"+contadorGeneral),$(".reloadG__"+contadorGeneral),"programaInserta",contadorGeneral);

	  break;

	  case "indicadores":
	  
	  	guardarElementos($("#guardarGeneral"+contadorGeneral),$("#formAgregado"+contadorGeneral),$(".reloadG__"+contadorGeneral),"indicadoresInserta",contadorGeneral);

	  break;


	  case "deportes":
	  
	  	guardarElementos($("#guardarGeneral"+contadorGeneral),$("#formAgregado"+contadorGeneral),$(".reloadG__"+contadorGeneral),"deportesInserta",contadorGeneral);

	  break;


	  case "alcance":
	  
	  	guardarElementos($("#guardarGeneral"+contadorGeneral),$("#formAgregado"+contadorGeneral),$(".reloadG__"+contadorGeneral),"alcanseInserta",contadorGeneral);

	  break;


	  case "financiamiento":
	  
	  	guardarElementos($("#guardarGeneral"+contadorGeneral),$("#formAgregado"+contadorGeneral),$(".reloadG__"+contadorGeneral),"financiamientoInserta",contadorGeneral);

	  break;


	  case "cargo":
	  
	  	guardarElementos($("#guardarGeneral"+contadorGeneral),$("#formAgregado"+contadorGeneral),$(".reloadG__"+contadorGeneral),"cargoInserta",contadorGeneral);

	  break;	  	  

	  case "objetivo":
	  
	  	guardarElementos($("#guardarGeneral"+contadorGeneral),$("#formAgregado"+contadorGeneral),$(".reloadG__"+contadorGeneral),"objetivoInserta",contadorGeneral);

	  break;	 


	  case "tipoOrganismo":
	  
	  	guardarElementos($("#guardarGeneral"+contadorGeneral),$("#formAgregado"+contadorGeneral),$(".reloadG__"+contadorGeneral),"tipoOrganismoInserta",contadorGeneral);

	  break;	 


	  case "areaAccion":
	  
	  	guardarElementos($("#guardarGeneral"+contadorGeneral),$("#formAgregado"+contadorGeneral),$(".reloadG__"+contadorGeneral),"areaAccionInserta",contadorGeneral);

	  break;	 

	  case "areaEncargada":
	  
	  	guardarElementos($("#guardarGeneral"+contadorGeneral),$("#formAgregado"+contadorGeneral),$(".reloadG__"+contadorGeneral),"areaEncargadaInserta",contadorGeneral);

	  break;	

	  case "grupoGasto":
	  
	  	guardarElementos($("#guardarGeneral"+contadorGeneral),$("#formAgregado"+contadorGeneral),$(".reloadG__"+contadorGeneral),"grupoGastoInserta",contadorGeneral);

	  break; 

	  case "itemAgregaActividad":
	  
	  	guardarElementos($("#guardarGeneral"+contadorGeneral),$("#formAgregado"+contadorGeneral),$(".reloadG__"+contadorGeneral),"itemActividadInserta",contadorGeneral);

	  break; 

	  case "programaPaid":
	  
	  	guardarElementos($("#guardarGeneral"+contadorGeneral),$("#formAgregado"+contadorGeneral),$(".reloadG__"+contadorGeneral),"programaPaid",contadorGeneral,false,$("#valorComparativo").val());

	  break; 

	  case "componentesPaid":
	  
	  	guardarElementos($("#guardarGeneral"+contadorGeneral),$("#formAgregado"+contadorGeneral),$(".reloadG__"+contadorGeneral),"componentesPaid",contadorGeneral,false,$("#valorComparativo").val());

	  break; 


	  case "itemPaid":
	  
	  	guardarElementos($("#guardarGeneral"+contadorGeneral),$("#formAgregado"+contadorGeneral),$(".reloadG__"+contadorGeneral),"itemPaid",contadorGeneral,false,$("#valorComparativo").val());

	  break; 

	  case "estrategicoPaid":
	  
	  	guardarElementos($("#guardarGeneral"+contadorGeneral),$("#formAgregado"+contadorGeneral),$(".reloadG__"+contadorGeneral),"estrategicoPaid",contadorGeneral,false,$("#valorComparativo").val());

	  break; 


	  case "areaEncargadaPaid":
	  
	  	guardarElementos($("#guardarGeneral"+contadorGeneral),$("#formAgregado"+contadorGeneral),$(".reloadG__"+contadorGeneral),"areaEncargadaPaid",contadorGeneral,false,$("#valorComparativo").val());

	  break; 


	  case "areaAccionPaid":
	  
	  	guardarElementos($("#guardarGeneral"+contadorGeneral),$("#formAgregado"+contadorGeneral),$(".reloadG__"+contadorGeneral),"areaAccionPaid",contadorGeneral,false,$("#valorComparativo").val());

	  break; 

	  case "tipoOrganiPaid":
	  
	  	guardarElementos($("#guardarGeneral"+contadorGeneral),$("#formAgregado"+contadorGeneral),$(".reloadG__"+contadorGeneral),"tipoOrganiPaid",contadorGeneral,false,$("#valorComparativo").val());

	  break; 

	  case "indicadorPaid":
	  
	  	guardarElementos($("#guardarGeneral"+contadorGeneral),$("#formAgregado"+contadorGeneral),$(".reloadG__"+contadorGeneral),"indicadorPaid",contadorGeneral,false,$("#valorComparativo").val());

	  break; 

	  case "rubrosPaid":
	  
	  	guardarElementos($("#guardarGeneral"+contadorGeneral),$("#formAgregado"+contadorGeneral),$(".reloadG__"+contadorGeneral),"rubrosPaid",contadorGeneral,false,$("#valorComparativo").val());

	  break; 

	  case "deportePaid":
	  
	  	guardarElementos($("#guardarGeneral"+contadorGeneral),$("#formAgregado"+contadorGeneral),$(".reloadG__"+contadorGeneral),"deportePaid",contadorGeneral,false,$("#valorComparativo").val());

	  break; 

	  case "modalidadPaid":
	  
	  	guardarElementos($("#guardarGeneral"+contadorGeneral),$("#formAgregado"+contadorGeneral),$(".reloadG__"+contadorGeneral),"modalidadPaid",contadorGeneral,false,$("#valorComparativo").val());

	  break; 


	  case "pruebaPaid":
	  
	  	guardarElementos($("#guardarGeneral"+contadorGeneral),$("#formAgregado"+contadorGeneral),$(".reloadG__"+contadorGeneral),"pruebaPaid",contadorGeneral,false,$("#valorComparativo").val());

	  break; 


	  case "categoriaPaid":
	  
	  	guardarElementos($("#guardarGeneral"+contadorGeneral),$("#formAgregado"+contadorGeneral),$(".reloadG__"+contadorGeneral),"categoriaPaid",contadorGeneral,false,$("#valorComparativo").val());

	  break; 

	  case "itemRubrosPaid":
	  
	  	guardarElementos($("#guardarGeneral"+contadorGeneral),$("#formAgregado"+contadorGeneral),$(".reloadG__"+contadorGeneral),"itemRubrosPaid",contadorGeneral,false,$("#valorComparativo").val());

	  break; 

	  case "componentesRubrosPaid":
	  
	  	guardarElementos($("#guardarGeneral"+contadorGeneral),$("#formAgregado"+contadorGeneral),$(".reloadG__"+contadorGeneral),"componentesRubrosPaid",contadorGeneral,false,$("#valorComparativo").val());

	  break; 

	}
	
	eliminarElementosCrea($(".eliminar"+contadorGeneral),$(".formAgregado"+contadorGeneral));

	/*=====  End of Eliminando  ======*/


});

}