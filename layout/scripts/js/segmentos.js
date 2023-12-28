$(document).ready(function () {

/*====================================
=            Validaciones            =
====================================*/

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

/*=====  End of Validaciones  ======*/


/*==================================================
=            Arry de checkeds escogidos            =
==================================================*/

function arrayChekeds__nombresItem(parametro1){

	var array = new Array(); 

    $(parametro1).each(function(index) {

    	var condicion = $(this).is(":checked");

    	if (condicion) {

    		array.push($(this).attr('nombreItems'));

    	}

    });

    return array;

}

function arrayChekeds__idProgramacion__financieras(parametro1){

	var array = new Array(); 

    $(parametro1).each(function(index) {

    	var condicion = $(this).is(":checked");

    	if (condicion) {

    		array.push($(this).attr('idProgramacionFinanciera'));

    	}

    });

    return array;

}

function arrayChekeds__idProgramacion__financieras__tablas(parametro1){

	var array = new Array(); 

    $(parametro1).each(function(index) {

    	var condicion = $(this).is(":checked");

    	if (condicion) {

    		array.push($(this).attr('attr'));

    	}

    });

    return array;

}

function array__modificas(parametro1){

	var array = new Array(); 

    $(parametro1).each(function(index) {

		array.push($(this).val());

    });

    return array;

}

/*=====  End of Arry de checkeds escogidos  ======*/


/*=========================================
=            Eliminar agrgados            =
=========================================*/

var eliminarElementosCrea=function(parametro1,parametro2,parametro3){

$(parametro1).click(function(e){

	$(parametro2).remove();

});
		

}

var soloMontos=function(parametro1){

$(parametro1).keypress(function(event) {

var $this = $(this);
										    
if ((event.which != 46 || $this.val().indexOf('.') != -1) && ((event.which < 48 || event.which > 57) && (event.which != 0 && event.which != 8))) {
	event.preventDefault();
}

var text = $(this).val();

if ((event.which == 46) && (text.indexOf('.') == -1)) {

	setTimeout(function() {
		
		if ($this.val().substring($this.val().indexOf('.')).length > 3) {

			$this.val($this.val().substring(0, $this.val().indexOf('.') + 3));
		}

	}, 1);
}

if ((text.indexOf('.') != -1) && (text.substring(text.indexOf('.')).length > 2) && (event.which != 0 && event.which != 8) && ($(this)[0].selectionStart >= text.length - 2)) {
	event.preventDefault();
}
										          
});

$(parametro1).on('input', function () {

	this.value = this.value.replace(/[^0-9,.]/g, '').replace(',','.');

});			

}

var cambiantesInputs=function(parametro1){

$(parametro1).click(function(event) {

	if ($(this).val()=="0.00") {

		$(this).val(" ");

	}
										          
});	

$(parametro1).blur(function(event) {

	if ($(this).val()==" ") {

		$(this).val("0.00");

	}
										          
});	

}


/*=================================
=            Sumadores            =
=================================*/

var sumarIndicadores=function(parametro1,parametro2){

	$(parametro1).on('input', function () {

		var sum = 0;

		$(parametro1).each(function(){
		    sum += parseFloat($(this).val());
		});

		$(parametro2).val(sum);

	});

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



/*=====  End of Sumadores  ======*/

var crearFilasItemsPre=function(parametro1,parametro2,parametro3,parametro4,parametro5){

$(parametro1).change(function(e){

	$(".tabla"+parametro3).remove();

	$(".formAgregado"+parametro3).append('<div class="tabla'+parametro3+' col col-12 mt-4" style="overflow:scroll; width:100%; position:relative;"><table><tr><th>Enero</th><th>Febrero</th><th>Marzo</th><th>Abril</th><th>Mayo</th><th>Junio</th><th>Julio</th><th>Agosto</th><th>Septiembre</th><th>Octubre</th><th>Noviembre</th><th>Diciembre</th><th>Total</th></tr><tr><td><input type="text" class="enero'+parametro3+' solo__numero__montos numero_control'+parametro3+' sumador__montos__i'+parametro3+'" value="0.00" style="width:100%;" /></td><td><input type="text" class="febrero'+parametro3+' solo__numero__montos numero_control'+parametro3+' sumador__montos__i'+parametro3+'" value="0.00" style="width:100%;" /></td><td><input type="text" class="marzo'+parametro3+' solo__numero__montos numero_control'+parametro3+' sumador__montos__i'+parametro3+'" value="0.00" style="width:100%;" /></td><td><input type="text" class="abril'+parametro3+' solo__numero__montos numero_control'+parametro3+' sumador__montos__i'+parametro3+'" value="0.00" style="width:100%;" /></td><td><input type="text" class="mayo'+parametro3+' solo__numero__montos numero_control'+parametro3+' sumador__montos__i'+parametro3+'" value="0.00" style="width:100%;" /></td><td><input type="text" class="junio'+parametro3+' solo__numero__montos numero_control'+parametro3+' sumador__montos__i'+parametro3+'" value="0.00" style="width:100%;" /></td><td><input type="text" class="julio'+parametro3+' solo__numero__montos numero_control'+parametro3+' sumador__montos__i'+parametro3+'" value="0.00" style="width:100%;" /></td><td><input type="text" class="agosto'+parametro3+' solo__numero__montos numero_control'+parametro3+' sumador__montos__i'+parametro3+'" value="0.00" style="width:100%;" /></td><td><input type="text" class="septiembre'+parametro3+' solo__numero__montos numero_control'+parametro3+' sumador__montos__i'+parametro3+'" value="0.00" style="width:100%;" /></td><td><input type="text" class="octubre'+parametro3+' solo__numero__montos numero_control'+parametro3+' sumador__montos__i'+parametro3+'" value="0.00" style="width:100%;" /></td><td><input type="text" class="noviembre'+parametro3+' solo__numero__montos numero_control'+parametro3+' sumador__montos__i'+parametro3+'" value="0.00" style="width:100%;" /></td><td><input type="text" class="diciembre'+parametro3+' solo__numero__montos numero_control'+parametro3+' sumador__montos__i'+parametro3+'" value="0.00" style="width:100%;" /></td><td><input type="text" class="totalItemsPre'+parametro3+' solo__numero__montos numero_control'+parametro3+'" value="0.00" style="width:100%;" readonly=""/></td></tr></table></div>');

	sumarIndicadores($(".sumador__montos__i"+parametro3),$(".totalItemsPre"+parametro3));

	soloMontos($(".solo__numero__montos"));

	cambiantesInputs($(".numero_control"+parametro3));

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

			if (parametro4=="itemsCiudadanosPre") {

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

		        	if (parametro4=="itemsCiudadanosPre" && mensaje==20) {

		        		var sumar=elementos['sumar'];

		        		alertify.set("notifier","position", "top-center");
				    	alertify.notify("No se puede registrar su monto el cual suma con el valor asignado "+parseFloat(sumar).toFixed(2), "error", 10, function(){});

				    	$(".boton__enlacesOcultos").show();
				    	$(".reload__Enviosrealizados").html(' ');

		        	}else if(parametro4=="itemsCiudadanosPre" && mensaje==21){


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

/*=====  End of Eliminar agrgados  ======*/



/*=========================================
=            Creando segmentos            =
=========================================*/

var contadorGeneral=0;

var generador=0;

var informacionGlobal="";



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

		}else if (parametro3[i]=="inputSoloNumeros") {

			contenedor+="<div class='col col-"+parametro5+" row fila__agregado"+contadorGeneral+"'><input id='agregado"+generador+"' name='agregado"+generador+"' type='number' placeholder='"+parametro4[i]+"' class='solo_numeros_items col-10 ancho__total__input mt-2 obligatorios__campos"+contadorGeneral+"' /></div>";
			
			$.getScript("layout/scripts/js/PAID_INFRAESTRUCTURA/metodos.js",function(){

				validadorSoloNumeros(".solo_numeros_items");
		
			});
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


							$(".contenedor__checkeds").append("<div style='margin-top: 1em;' class='col col-4 d-flex row justify-content-center align-items-center'><input type='checkbox' id='agregado"+generador+"' name='agregado"+generador+"'  attr='"+x.idItem+"' class='col col-2 conjunto__checkeds'/>&nbsp;&nbsp;<span class='col col-8'>"+x.nombreItem+"</div></div>");


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

	  	guardarElementos($("#guardarGeneral"+contadorGeneral),$("#formAgregado"+contadorGeneral),$(".reloadG__"+contadorGeneral),"itemsCiudadanosPre",contadorGeneral,parametro7);

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

segmentosJs($("#agregarLineaP"),$(".lineaPoliticaContent"),["input"],["Ingrese línea política"],10,"linea");

segmentosJs($("#agregarPrograma"),$(".programasModalContent"),["input"],["Ingrese programa"],10,"programa");

segmentosJs($("#agregarIndicadores"),$(".indicadoresModalContent"),["input"],["Ingrese indicador"],10,"indicadores");

segmentosJs($("#agregarDeportes"),$(".deportesModalContent"),["input"],["Ingrese deporte"],10,"deportes");

segmentosJs($("#agregarAlcance"),$(".alcanceModalContent"),["input"],["Ingrese alcance"],10,"alcance");

segmentosJs($("#agregarFinanciamiento"),$(".financiamientoModalContent"),["input"],["Ingrese tipo financiamiento"],10,"financiamiento");

segmentosJs($("#agregarCargo"),$(".tipoCargoModalContent"),["input"],["Ingrese cargo"],10,"cargo");

segmentosJs($("#agregarObjetivo"),$(".objetivoodalContent"),["input","select"],["Ingrese objetivo",15],5,"objetivo");


segmentosJs($("#agregarTipoOrganismo"),$(".tipoOrganismoModalContent"),["input","select","select","select"],["Ingrese tipo",8,9,10],3,"tipoOrganismo");


segmentosJs($("#agregarAreaAccion"),$(".areaAccionModalContent"),["input"],["Ingrese area acción"],10,"areaAccion");

segmentosJs($("#agregarAreaEncargada"),$(".areaEncargadaModalContent"),["input"],["Ingrese area encargada"],10,"areaEncargada");

segmentosJs($("#agregarGrupoGasto"),$(".grupoGastoContent"),["input"],["Ingrese grupo gasto"],10,"grupoGasto");


segmentosJs($("#agregarActividades"),$(".actividadesContent"),["input","select","select","cheboxMultiple"],["Ingrese nombre de actividad",13,20,"multiple"],4,"actividadIngresada");

segmentosJs($("#agregarItemsAc"),$(".itemsModalContentAc"),["select"],[14],10,"itemAgregaActividad");

segmentosJs($("#agregarItems"),$(".itemsContent"),["input","input"],["Ingrese el nombre del item","Ingrese el código del Ítem"],5,"agregarItemsInserta");


segmentosJs($("#agregarProgramas"),$(".programaContent"),["input"],["Ingrese programa"],10,"programaPaid");

segmentosJs($("#agregarItem"),$(".itemContent"),["input","inputSoloNumeros"],["Ingrese nombre del Ítem","Ingrese código del Ítem"],5,"itemPaid");

segmentosJs($("#agregarEstrategicos"),$(".estrategicosContent"),["input"],["Ingrese Objetivo Estratégico"],10,"estrategicoPaid");

segmentosJs($("#agregarEncargada"),$(".encargadaContent"),["input"],["Ingrese Área encargada"],10,"areaEncargadaPaid");

segmentosJs($("#agregarAccion"),$(".accionContent"),["input"],["Ingrese Área de acción"],10,"areaAccionPaid");

segmentosJs($("#agregarTipoOrganizacion"),$(".tipoOrganizacionContent"),["input","select","select"],["Ingrese tipo de organización",100,101],3,"tipoOrganiPaid");

segmentosJs($("#agregarIndicadores"),$(".indicadoresContent"),["input"],["Ingrese indicador"],10,"indicadorPaid");

// segmentosJs($("#agregarRubros"),$(".rubrosContent"),["input","select","select","cheboxMultiple__2"],["Ingrese Rubro",102,103,"multiple"],4,"rubrosPaid");

segmentosJs($("#agregarRubros"),$(".rubrosContent"),["input","cheboxMultiple__2"],["Ingrese nombre del rubro","multiple"],12,"rubrosPaid");

segmentosJs($("#agregarRubros__ec"),$(".rubrosContent"),["input","cheboxMultiple__3"],["Ingrese nombre del rubro","multiple"],12,"rubrosPaid");

segmentosJs($("#agregarComponente"),$(".componenteContent"),["input","select","select__rubros__multiples"],["Ingrese Componentes",103,1006],5,"componentesPaid");

segmentosJs($("#agregardeporte"),$(".deporteContent"),["input"],["Ingrese deporte"],10,"deportePaid");

segmentosJs($("#agregarModalidad"),$(".modalidadContent"),["input"],["Ingrese modalidad"],10,"modalidadPaid");

segmentosJs($("#agregarPrueba"),$(".pruebaContent"),["input"],["Ingrese prueba"],10,"pruebaPaid");

segmentosJs($("#agregarCategoria"),$(".categoriaContent"),["input"],["Ingrese categoría"],10,"categoriaPaid");

segmentosJs($("#agregarItemsRubros"),$(".itemsRubrosContent"),["select"],[106],10,"itemRubrosPaid");

segmentosJs($("#agregarItemsRubrosContentPrincipal"),$(".rubrosContentPrincipal"),["select"],[1006],10,"componentesRubrosPaid");

/*=====  End of Creando segmentos  ======*/

/*========================================================
=            Segmentos  Ajax          =
========================================================*/

var obteniendoInputEscondido=function(parametro1,parametro2,parametro3){

	$(parametro1).click(function (e){

		$(parametro3).val(parametro2);

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


/*===========================================================
=            Función de tabla principal del poas            =
===========================================================*/

var segmentosJsAjax=function(parametro1,parametro2){

	var paqueteDeDatos = new FormData();

	paqueteDeDatos.append("tipo",parametro2);
	var idOrganismoPrincipal=$("#idOrganismoPrincipal").val();
	paqueteDeDatos.append('idOrganismoPrincipal', idOrganismoPrincipal);

	$.ajax({

		type:"POST",
		url:"modelosBd/inserta/seleccionaAcciones.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

		   	var elementos=JSON.parse(response);

		   	/*=================================================
		   	=            Llamar variables del json            =
		   	=================================================*/
		   	
		   	var informacionSeleccionada=elementos['informacionSeleccionada'];
		   	var obtenerInformacion2=elementos['obtenerInformacion2'];
		   	var obtenerInformacion3=elementos['obtenerInformacion3'];	

		   	var obtenerInformacionItems=elementos['obtenerInformacionItems'];

		   	/*=====  End of Llamar variables del json  ======*/
		   	
		   	/*==========================================================================
		   	=            declararcion de array y asingacion de valores json            =
		   	==========================================================================*/
		   	
		   	var array = new Array(); 
		   	var array2 = new Array(); 


		   	for (z of obtenerInformacion2) {

		   		array.push(z.idActividad);

		   	}

		   	for (y of obtenerInformacion3) {

		   		array2.push(y.idActividad);

		   	}
		   	
		   	var idAc1 = array2.indexOf("1");
		   	var idAc2 = array2.indexOf("4");

		   	if (idAc1 != -1) {

		   		array2.push("4");

		   	}


		   	if (idAc2 != -1) {

		   		array2.push("1");

		   	}


		   	/*=====  End of declararcion de array y asingacion de valores json  ======*/
		   	

		   	var bandera=false;
		   	var bandera2=false;

		   	/*=========================================================
		   	=            recorriendo y creando los modales            =
		   	=========================================================*/
		   	
		   	for (x of informacionSeleccionada) {

		   		/*==============================================
		   		=            Ocultar tabla de items            =
		   		==============================================*/
		   		
		   		$(".contenedorItemsC"+x.idActividades).hide();
		   		
		   		/*=====  End of Ocultar tabla de items  ======*/
		   		
		   		/*=====================================================================
		   		=            Buscar indice de array para abir los checkeds            =
		   		=====================================================================*/

		   		//esto se realiza con la finalidad de activar o no el chequed dependiendo si la actividad coincide con el valor resultante
		   		
		   		var idx = array.indexOf(x.idActividades);
				var idx2 = array2.indexOf(x.idActividades);
		   		
		   		/*=====  End of Buscar indice de array para abir los checkeds  ======*/

		   		/*============================================================================
		   		=            creación de las filas de la tabla por cada actividad            =
		   		============================================================================*/
		   		
		   		
		   		$(parametro1).append('<tr class="fila__ac'+x.idActividades+' checkeds__indicadores"><td style="font-weight:bold;"><center>0'+x.idActividades+'</center></td><td><center>'+x.nombreActividades+'</center></td><td><center>'+x.indicador+'</center></td><td class="filaIn__'+x.idActividades+'"><center><input type="checkbox" data-bs-toggle="modal"  data-bs-target="#modalActividad'+x.idActividades+'" id="crear'+x.idActividades+'" /></center></td></tr>');	

		   		if (($("#estadoFinal").val()!="" &&  $("#estadoFinal").val()!=undefined && $("#estadoFinal").val()!=null  && $("#estadoFinal").val()!=" " && $("#organismoIdPrin").val()!="1158" && $("#organismoIdPrin").val()!="1353" && $("#organismoIdPrin").val()!="1539" && $("#organismoIdPrin").val()!="1641" && $("#organismoIdPrin").val()!="1276" && $("#organismoIdPrin").val()!="1346" && $("#organismoIdPrin").val()!="1168" && $("#organismoIdPrin").val()!="1574" && $("#organismoIdPrin").val()!="1524" && $("#organismoIdPrin").val()!="1169" )) {

		   			//$(".filaIn__"+x.idActividades).append('Puede visualizar la información en su reportería');

		   			//$("#crear"+x.idActividades).remove();

		   		}

		   		
		   		/*=====  End of creación de las filas de la tabla por cada actividad  ======*/
		   		

		   		/*==========================================
		   		=            Asignar el checked            =
		   		==========================================*/
		   		
				if(idx != -1) {
					
					$("#crear"+x.idActividades).attr('checked','checked');

					$(".fila__ac"+x.idActividades).append('<td class="filaAc_'+x.idActividades+'"><center><input type="checkbox" data-bs-toggle="modal" data-bs-target="#modalActividadItem'+x.idActividades+'" id="crearItemAc'+x.idActividades+'"/></center></td>');

					$(".itemsContents"+x.idActividades).append('<input type="hidden" id="idActividad'+x.idActividades+'" name="idActividad'+x.idActividades+'" value="'+x.idActividades+'">');


			   		if (($("#estadoFinal").val()!="" &&  $("#estadoFinal").val()!=undefined && $("#estadoFinal").val()!=null  && $("#estadoFinal").val()!=" " && $("#organismoIdPrin").val()!="1158" && $("#organismoIdPrin").val()!="1353" && $("#organismoIdPrin").val()!="1539" && $("#organismoIdPrin").val()!="1641" && $("#organismoIdPrin").val()!="1276" && $("#organismoIdPrin").val()!="1346" && $("#organismoIdPrin").val()!="1168" && $("#organismoIdPrin").val()!="1574" && $("#organismoIdPrin").val()!="1524" && $("#organismoIdPrin").val()!="1169" )) {

			   			//$(".filaAc_"+x.idActividades).append('Puede visualizar la información en su reportería');

			   			//$("#crearItemAc"+x.idActividades).remove();

			   		}


					bandera=true;

					if (idx2 != -1) {

						$("#crearItemAc"+x.idActividades).attr('checked','checked');

						var paqueteDeDatos = new FormData();

						var idOrganismo=$("#organismoIdPrin").val();

						paqueteDeDatos.append("tipo","gruposItems");
						paqueteDeDatos.append("idActividades",x.idActividades);
						paqueteDeDatos.append("idOrganismoPrincipal",idOrganismo);
					
						$.ajax({

						    type:"POST",
						    url:"modelosBd/inserta/seleccionaAcciones.md.php",
						    contentType: false,
						    data:paqueteDeDatos,
						    processData: false,
						    cache: false, 
					    	success:function(response){

				            	var elementos=JSON.parse(response);

				            	var idActividades=elementos['idActividades'];

				            	var arrayGrupo51=elementos['arrayGrupo51'];
				            	var arrayGrupo53=elementos['arrayGrupo53'];
				            	var arrayGrupo57=elementos['arrayGrupo57'];
				            	var arrayGrupo58=elementos['arrayGrupo58'];
				            	var arrayGrupo84=elementos['arrayGrupo84'];

				            	var arrayAguaLuz=elementos['arrayAguaLuz'];

				            	var arrayGrupoHonorarios=elementos['arrayGrupoHonorarios'];

				            	var obtenerInformacionItems=elementos['obtenerInformacionItems'];


				            	/*=====================================
				            	=            Items totales            =
				            	=====================================*/
				            	var array3 = new Array(); 

				            	for (xcl of obtenerInformacionItems) {

							   		array3.push(xcl.idItem);

							   	}
				            	/*=====  End of Items totales  ======*/

				            	var headMeses=['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];


				            	if (idActividades==1 || idActividades==4) {

				            		$(".fila__ac"+idActividades).append('<td><center class="fila__actividad1'+idActividades+'"></div>');
				            		
				            	}


				            	if (idActividades==1 && (arrayGrupo53.length>0 || arrayGrupo58.length>0 || arrayGrupo57.length>0)) {
									

				            		var arrayMatriz = arrayGrupo53.concat(arrayGrupo57);

									$.getScript("layout/scripts/js/poaInicial2024/index.js",function(){

										$(".fila__actividad1"+idActividades).append('<br><div class="row d d-flex justify-content-center;"><select class="form-select" id="select__actAdm"><option value="0">--Seleccione una opcion--</option><option value="manual">Manual</option><option value="excel">Excel</option></select></div>');



										$(".fila__actividad1"+idActividades).append('<br><div class="cargaManual__actAdm"><div class="row d d-flex justify-content-center;"><a class="col-12" style="color:white; cursor:pointer; text-transform:uppercase;" attr="'+arrayMatriz+'" idOrganismo="'+$("#organismoIdPrin").val()+'" idActividad="'+idActividades+'" data-bs-toggle="modal" data-bs-target="#modalMatriz'+idActividades+'" id="enlaceMatriz'+idActividades+'">Actividad Administrativa (Carga Manual)</a></div></div>');

										$(".fila__actividad1"+idActividades).append('<br><div class="cargarExcel__actAdm"><div class="d d-flex justify-content-center;"><a class="col-12" style="color:white; cursor:pointer; text-transform:uppercase;" attr="'+arrayMatriz+'" idOrganismo="'+$("#organismoIdPrin").val()+'" idActividad="'+idActividades+'" data-bs-toggle="modal" data-bs-target="#subirArchivoExcelPOA" id="enlaceMatriz__excel'+idActividades+'">Actividad Administrativa (Carga Excel)</a></div></div>');

										$(".cargaManual__actAdm").hide();
										$(".cargarExcel__actAdm").hide();


										selectorExcel__poa__inicial($("#select__actAdm"),$(".cargarExcel__actAdm"),$(".cargaManual__actAdm"));

										construccion__modal__excel($("#enlaceMatriz__excel"+idActividades),["Titulo","TITULO2"],"act__administrativas");

									});

				            		/*================================================================
				            		=            Añadir valores a modal y construir tabla            =
				            		================================================================*/

				            		$.getScript("layout/scripts/js/poaConstruccion/matrizConstruccion.js",function(){
				            		
										enlacesMatriz($("#enlaceMatriz"+idActividades),['CÓDIGO ÍTEM','ÍTEM','Justificación de la adquisición del bien o servicio','Cantidad del bien o servicio a adquirir','Tipo de Contratación (Campo obligatorio para ingresar la información)'],headMeses,'Total Programación Financiera',idActividades,"actividad__administrativa",true);

									});

												            		
				            		/*=====  End of Añadir valores a modal y construir tabla  ======*/
				            		
				            	}


				            	if ((idActividades==4) && (arrayGrupo51.length>0)) {

				            		var arrayMatriz = arrayGrupo51;

				            		$(".fila__actividad1"+idActividades).append('<br><div class="row d d-flex justify-content-center;"><a class="col-12" style="color:white; cursor:pointer; text-transform:uppercase;" attr="'+arrayMatriz+'" idOrganismo="'+$("#organismoIdPrin").val()+'" idActividad="'+idActividades+'" data-bs-toggle="modal" data-bs-target="#modalMatriz'+idActividades+'" id="enlaceMatriz__SueldosSalarios'+idActividades+'">SUELDOS Y SALARIOS</a></div>');

				            		/*================================================================
				            		=            Añadir valores a modal y construir tabla            =
				            		================================================================*/

				            		$.getScript("layout/scripts/js/poaConstruccion/matrizConstruccion.js",function(){
				            		
										enlacesMatriz($("#enlaceMatriz__SueldosSalarios"+idActividades),['No. Cédula de ciudadanía / pasaporte','Apellidos y Nombres','Cargo','Tipo de cargo','Tiempo de trabajo (en meses)','Sueldo / Salario mensual','Aporte Patronal al IESS Mensual','Decimotercera remuneración','Mensualización Decimotercera remuneración','Decimocuarta remuneración','Mensualización Decimocuarta remuneración','Fondos de Reserva',"Compensación por Desahucio","Despido Intempestivo","Por Renuncia Voluntaria","Compensación por Vacaciones no Gozadas por Cesación de Funciones"],headMeses,'TOTAL',idActividades,"sueldos__salarios",true);

									});

												            		
				            		/*=====  End of Añadir valores a modal y construir tabla  ======*/

				            	}


				            	if ((idActividades==4) && (arrayGrupoHonorarios.length>0)) {

				            		var arrayMatriz = arrayGrupoHonorarios;

				            		$(".fila__actividad1"+idActividades).append('<br><div class="row d d-flex justify-content-center;"><a class="col-12" style="color:white; cursor:pointer; text-transform:uppercase;" attr="'+arrayMatriz+'" idOrganismo="'+$("#organismoIdPrin").val()+'" idActividad="'+idActividades+'" data-bs-toggle="modal" data-bs-target="#modalMatriz'+idActividades+'" id="enlaceMatriz__honorarios'+idActividades+'">HONORARIOS</a></div>');

				            		/*================================================================
				            		=            Añadir valores a modal y construir tabla            =
				            		================================================================*/

				            		$.getScript("layout/scripts/js/poaConstruccion/matrizConstruccion.js",function(){
				            		
										enlacesMatriz($("#enlaceMatriz__honorarios"+idActividades),['No. Cédula de ciudadanía / pasaporte','Apellidos y Nombres','Cargo','Tipo de cargo','Honorario mensual (Incluido el IVA)'],headMeses,'TOTAL',idActividades,"honorarios__s",true);

									});

												            		
				            		/*=====  End of Añadir valores a modal y construir tabla  ======*/

				            	}



			            		if (idActividades==1 && arrayAguaLuz.length>0) {


									$(".fila__actividad1"+idActividades).append('<br><div class="row d d-flex justify-content-center;"><a class="col-12" style="color:white; cursor:pointer; text-transform:uppercase;" attr="'+arrayMatriz+'" idOrganismo="'+$("#organismoIdPrin").val()+'" idActividad="'+idActividades+'" data-bs-toggle="modal" data-bs-target="#modalMatriz'+idActividades+'" id="enlaceMatrizSuministro'+idActividades+'">Suministros</a></div>');

				            		/*================================================================
				            		=            Añadir valores a modal y construir tabla            =
				            		================================================================*/

				            		$.getScript("layout/scripts/js/poaConstruccion/matrizConstruccion.js",function(){
				            		
										enlacesMatriz($("#enlaceMatrizSuministro"+idActividades),['Tipo','Nombre del escenario deportivo o Residencia para Fomento Deportivo','Suministro energía','Suministro agua'],false,false,idActividades,"suministros",false);

									});

												            		
				            		/*=====  End of Añadir valores a modal y construir tabla  ======*/
				            		
				            	}

				            	/*==================================================
				            	=            Cuando el poa esta enviado            =
				            	==================================================*/

						   		if (($("#estadoFinal").val()!="" &&  $("#estadoFinal").val()!=undefined && $("#estadoFinal").val()!=null  && $("#estadoFinal").val()!=" " && $("#organismoIdPrin").val()!="1158" && $("#organismoIdPrin").val()!="1353" && $("#organismoIdPrin").val()!="1539" && $("#organismoIdPrin").val()!="1641" && $("#organismoIdPrin").val()!="1276" && $("#organismoIdPrin").val()!="1346" && $("#organismoIdPrin").val()!="1168" && $("#organismoIdPrin").val()!="1574" && $("#organismoIdPrin").val()!="1524" && $("#organismoIdPrin").val()!="1169" )) {

						   			//$(".fila__actividad1"+idActividades).empty();

						   			//$(".fila__actividad1"+idActividades).append('Puede visualizar la información en su reportería');

						   			
						   		}				            	
							            	
				            	
				            	/*=====  End of Cuando el poa esta enviado  ======*/
				            	



				            	if (idActividades==3 || idActividades==5 || idActividades==6 || idActividades==7) {

				            		$(".fila__ac"+idActividades).append('<td class="act3__'+idActividades+'"><center><div class="row d d-flex justify-content-center;"><a class="col-12" style="color:white; cursor:pointer; text-transform:uppercase;" attr="'+array3+'" idOrganismo="'+$("#organismoIdPrin").val()+'" idActividad="'+idActividades+'" data-bs-toggle="modal" data-bs-target="#modalMatriz'+idActividades+'" id="enlaceMatriz'+idActividades+'">Actividades Deportivas</a></div></center></td>');

				            		/*================================================================
				            		=            Añadir valores a modal y construir tabla            =
				            		================================================================*/

				            		$.getScript("layout/scripts/js/poaConstruccion/matrizConstruccion.js",function(){
				            		
										enlacesMatriz($("#enlaceMatriz"+idActividades),['CÓDIGO ÍTEM','ÍTEM','TIPO DE FINANCIAMIENTO','NOMBRE DEL EVENTO','DEPORTE','PROVINCIA','SEDE CIUDAD -  PAIS','ALCANCE','FECHA INICIO','FECHA FIN','GÉNERO','CATEGORÍA','No.<br>ENTRENADORES OFICIALES','No. ATLETAS','TOTAL','MUJERES (BENEFICIARIOS)','HOMBRES (BENEFICIARIOS)','Detalle lo que el organismo va a adquirir','Justificación de la adquisición del bien o servicio','Cantidad del bien o servicio a adquirir'],headMeses,'Total Programación Financiera',idActividades,"poa__actividadesDeportivas",true);

									});

												            		
				            		/*=====  End of Añadir valores a modal y construir tabla  ======*/

							   		if (($("#estadoFinal").val()!="" &&  $("#estadoFinal").val()!=undefined && $("#estadoFinal").val()!=null  && $("#estadoFinal").val()!=" " && $("#organismoIdPrin").val()!="1158" && $("#organismoIdPrin").val()!="1353" && $("#organismoIdPrin").val()!="1539" && $("#organismoIdPrin").val()!="1641" && $("#organismoIdPrin").val()!="1276" && $("#organismoIdPrin").val()!="1346" && $("#organismoIdPrin").val()!="1168" && $("#organismoIdPrin").val()!="1574" && $("#organismoIdPrin").val()!="1524" && $("#organismoIdPrin").val()!="1169" )) {

							   			//$(".act3__"+idActividades).empty();

							   			//$(".act3__"+idActividades).append('<center>Puede visualizar la información en su reportería</center>');

							   			
							   		}				            	
								            	


				            	}


				            	if (idActividades==2) {


				            		$(".fila__ac"+idActividades).append('<td class="filaA2__'+idActividades+'"><center><div class="row d d-flex justify-content-center;"><a class="col-12" style="color:white; cursor:pointer; text-transform:uppercase;" attr="'+array3+'" idOrganismo="'+$("#organismoIdPrin").val()+'" idActividad="'+idActividades+'" data-bs-toggle="modal" data-bs-target="#modalMatriz'+idActividades+'" id="enlaceMatriz'+idActividades+'">MANTENIMIENTO</a></div></center></td>');

				            		/*================================================================
				            		=            Añadir valores a modal y construir tabla            =
				            		================================================================*/

				            		$.getScript("layout/scripts/js/poaConstruccion/matrizConstruccion.js",function(){
				            		
										enlacesMatriz($("#enlaceMatriz"+idActividades),['Nombre de la infraestructura o escenario deportivo','Provincia','Dirección completa','Estado','Tipo de recursos con los que se construyó','Tipo de Intervención','Detallar el tipo de intervención que se ha planificado realizar','Tipo de Mantenimiento','Materiales o Servicios a requerir para el mantenimiento','Fecha de últipo mantenimiento realizado'],false,'',idActividades,"poa__mantenimiento",true);

									});

												            		
				            		/*=====  End of Añadir valores a modal y construir tabla  ======*/
							   		if (($("#estadoFinal").val()!="" &&  $("#estadoFinal").val()!=undefined && $("#estadoFinal").val()!=null  && $("#estadoFinal").val()!=" " && $("#organismoIdPrin").val()!="1158" && $("#organismoIdPrin").val()!="1353" && $("#organismoIdPrin").val()!="1539" && $("#organismoIdPrin").val()!="1641" && $("#organismoIdPrin").val()!="1276" && $("#organismoIdPrin").val()!="1346" && $("#organismoIdPrin").val()!="1168" && $("#organismoIdPrin").val()!="1574" && $("#organismoIdPrin").val()!="1524" && $("#organismoIdPrin").val()!="1169" )) {

							   			//$(".filaA2__"+idActividades).empty();

							   			//$(".filaA2__"+idActividades).append('<center>Puede visualizar la información en su reportería</center>');

							   			
							   		}				            	
								            	


				            	}



	
							},
							error:function(){

							}
						
						});	

						bandera2=true;

					}

									
				}   		
		   		
		   		/*=====  End of Asignar el checked  ======*/

		   		/*======================================================================================================
		   		=            Añadiendo clases para despues sumar en la parte de programación de indicadores            =
		   		======================================================================================================*/

				$(".primerTrimestre"+x.idActividades).addClass('unanimes__clases'+x.idActividades);
				$(".segundoTrimestre"+x.idActividades).addClass('unanimes__clases'+x.idActividades);
				$(".tercerTrimestre"+x.idActividades).addClass('unanimes__clases'+x.idActividades);
				$(".cuartoTrimestre"+x.idActividades).addClass('unanimes__clases'+x.idActividades);		   		
		   		
		   		
		   		/*=====  End of Añadiendo clases para despues sumar en la parte de programación de indicadores  ======*/
		   		
		   		/*===============================================
		   		=            Añadiendo incluir ceros            =
		   		===============================================*/
		   		

				incluirCeros($(".primerTrimestre"+x.idActividades));
				incluirCeros($(".segundoTrimestre"+x.idActividades));
				incluirCeros($(".tercerTrimestre"+x.idActividades));
				incluirCeros($(".cuartoTrimestre"+x.idActividades));		   		
		   		
		   		/*=====  End of Añadiendo incluir ceros  ======*/
		   		
		   		/*=========================================
		   		=            Sumar indicadores            =
		   		=========================================*/
		   		
		   		sumarIndicadores($(".unanimes__clases"+x.idActividades),$(".metaAnualIndicador"+x.idActividades));
		   		
		   		/*=====  End of Sumar indicadores  ======*/
		   		
		   		/*==============================================
		   		=            Actualizar información            =
		   		==============================================*/
		   		

		   		selectObjetivosEstrategicos($("#crear"+x.idActividades),$(".objetivoEstaregicoSelect"+x.idActividades),x.idActividades,$(".idAtributoEscondido"));

				obteniendoInputEscondido($(".botonAcbotonItems"+x.idActividades),x.idActividades,$(".idAtributoEscondido"));

		   		selectObjetivosPrincipal($("#crear"+x.idActividades),$(".objetivoPrincipalSelect"+x.idActividades));
		   		programasPrincipal($("#crear"+x.idActividades),$(".programaSelect"+x.idActividades));


		   		selectPrograma($(".objetivoPrincipalSelect"+x.idActividades),$(".programaSelect"+x.idActividades));
		   		

		   		guardarElementos($("#insertar"+x.idActividades),$(".formModalActividades"+x.idActividades),$(".reload__EnviosrealizadosAc"),"poaOrganismo",x.idActividades);

		   		actualizaInfor($("#crear"+x.idActividades),"actividadesUso",$(".idOrganismo"),x.idActividades,$(".formModalActividades"+x.idActividades),[$(".primerTrimestre"+x.idActividades),$(".segundoTrimestre"+x.idActividades),$(".tercerTrimestre"+x.idActividades),$(".cuartoTrimestre"+x.idActividades),$(".metaAnualIndicador"+x.idActividades)]);
		   		
		   		
		   		/*=====  End of Actualizar información  ======*/

		   		/*=========================================
		   		=            Información items            =
		   		=========================================*/

		   		// crear items
		   		
		   		segmentosJs($("#agregarItems"+x.idActividades),$(".itemsContents"+x.idActividades),["select"],[19],10,"agregarItesOrganismosPre",x.idActividades);	

		   		// ver items

		   		// tablasJs($("#verItemsActividades"+x.idActividades));


		   		if ($("#envioPreliminar").val()=="A") {

		   			// $("#agregarItems"+x.idActividades).hide();
		   			
		   		}

		   		
		   		/*=====  End of Información items  ======*/
		   		
		   		/*=======================================
		   		=            Ocultar mostrar            =
		   		=======================================*/

				var ocultarVariables=function(parametro1,parametro2,parametro3,parametro4){

					$(parametro1).click(function(e){

						$(parametro2).hide();
						$(parametro3).show();

					});

				}

				ocultarVariables($("#verItemsActividades"+x.idActividades),$(".unanimeEl__"+x.idActividades),$(".contenedorItemsC"+x.idActividades),true);
				ocultarVariables($("#agregarItems"+x.idActividades),$(".contenedorItemsC"+x.idActividades),$(".unanimeEl__"+x.idActividades),false);
		   		
		   		
		   		
		   		/*=====  End of Ocultar mostrar  ======*/

		   		/*=====================================================
		   		=            Eviatar el cambio del checked            =
		   		=====================================================*/
		   		
		   		var evitarCambioChecked=function(parametro1,parametro2){

					$(parametro1).click(function(e){

						e.preventDefault();

					});

				}

				evitarCambioChecked($("#crearItemAc"+x.idActividades));	
				evitarCambioChecked($("#crear"+x.idActividades));			   		
		   		
		   		/*=====  End of Eviatar el cambio del checked  ======*/
		   		
		   		/*==================================================
		   		=            Datatablets items anidados            =
		   		==================================================*/


		   		var presionarItemsFuncion=function(parametro1,parametro2){

					$(parametro1).click(function(e){

						$.getScript("layout/scripts/js/ajax/datatablet.js",function(){

							$("#tablaItemsAc"+parametro2).dataTable().fnDestroy();


					   		if ($("#envioPreliminar").val()=="A") {

					   			// datatablets($("#tablaItemsAc"+parametro2),"tablaItemsAc"+parametro2,[$("#organismoIdPrin").val(),parametro2],objetos([15,16],["boton","boton"],["<center><a class='itemsEscogidosEliminar estilo__botonDatatablets btn btn-danger pointer__botones' style='display:none;'><i class='fas fa-trash'></i></a><center>"," "],[false],[false]),-1,["funcion__datatabletsEliminar"],["itemsEscogidosEliminar"],["itemsPoaEliminas"],["elimina"]);

					   			datatablets($("#tablaItemsAc"+parametro2),"tablaItemsAc"+parametro2,[$("#organismoIdPrin").val(),parametro2],objetos([15,16],["boton","boton"],["<center><a class='itemsEscogidosEliminar estilo__botonDatatablets btn btn-danger pointer__botones'><i class='fas fa-trash'></i></a><center>","<center><a class='itemsEscogidosEditar estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#editarMesesItems'><i class='fas fa-user-edit'></i></a><center>"],[false],[false]),-1,["funcion__datatabletsEliminar","funcion__editarNue"],["itemsEscogidosEliminar","itemsEscogidosEditar"],["itemsPoaEliminas","itemsPoaEditas"],["elimina","edita"]);

					   			
					   		}else{

					   			datatablets($("#tablaItemsAc"+parametro2),"tablaItemsAc"+parametro2,[$("#organismoIdPrin").val(),parametro2],objetos([15,16],["boton","boton"],["<center><a class='itemsEscogidosEliminar estilo__botonDatatablets btn btn-danger pointer__botones'><i class='fas fa-trash'></i></a><center>","<center><a class='itemsEscogidosEditar estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#editarMesesItems'><i class='fas fa-user-edit'></i></a><center>"],[false],[false]),-1,["funcion__datatabletsEliminar","funcion__editarNue"],["itemsEscogidosEliminar","itemsEscogidosEditar"],["itemsPoaEliminas","itemsPoaEditas"],["elimina","edita"]);


					   		}

						
						});

					});

				}

				presionarItemsFuncion($("#verItemsActividades"+x.idActividades),x.idActividades);
		   		
		   		/*=====  End of Datatablets items anidados  ======*/
		   		

			}	

			if(bandera==false){

				$(".columna__item").hide();

			}else{

				$(".columna__item").show();

			}		

			if (bandera2==false) {

				$(".columna__matricez").hide();

			}else{

				$(".columna__matricez").show();

			}
		   	
		   	
		   	/*=====  End of recorriendo y creando los modales  ======*/


		   	/*===============================
		   	=            Ocultar            =
		   	===============================*/
		   	
		   	// $.getScript("layout/scripts/js/validaGlobal.js",function(){
		   	// 	ocultar__enPreliminar($("#envioPreliminar"));

		   	// });	
		   	
		   	/*=====  End of Ocultar  ======*/
		   	
		   	

		},
		error:function(){

		}
				
	});	

}

segmentosJsAjax($(".body__actividadesEs"),"actividadesPoas");

/*=====  End of Función de tabla principal del poas  ======*/



/*=====  End of Segmentos Ajax ======*/

/*=================================================
=            Valores que no se repiten            =
=================================================*/

let data__noRepetir = new Array();

function no__repetir(){

 	let numero = Math.floor((Math.random() * 50) + 1);	

 	if (data__noRepetir.indexOf(numero)  === -1) {

 		data__noRepetir.push(numero);

 	}

 	return numero;

}

/*=====  End of Valores que no se repiten  ======*/


/*=====================================================
=            Generar tablas modificaciones            =
=====================================================*/

var generarBotones=function(parametro1){

	$(parametro1).click(function (e){

		$(".ocultos__origenesD").show();

		let paqueteDeDatos = new FormData();

		let check_modificaciones=arrayChekeds__idProgramacion__financieras__tablas($(".check_modificaciones"));

		paqueteDeDatos.append('tipo','seleccionExcel');
		paqueteDeDatos.append('check_modificaciones',JSON.stringify(check_modificaciones));

		$.ajax({

		    type:"POST",
		    url:"modelosBd/inserta/seleccionaAcciones.md.php",
		    contentType: false,
		    data:paqueteDeDatos,
		    processData: false,
		    cache: false, 
	    	success:function(response){

            	var elementos=JSON.parse(response);

            	var idProgramacionFinanciera=elementos['idProgramacionFinanciera'];
            	var nombreItem=elementos['nombreItem'];
            	var enero=elementos['enero'];
            	var febrero=elementos['febrero'];
            	var marzo=elementos['marzo'];
            	var abril=elementos['abril'];
            	var mayo=elementos['mayo'];
            	var junio=elementos['junio'];
            	var julio=elementos['julio'];
            	var agosto=elementos['agosto'];
            	var septiembre=elementos['septiembre'];
            	var octubre=elementos['octubre'];
            	var noviembre=elementos['noviembre'];
            	var diciembre=elementos['diciembre'];
            	var totalTotales=elementos['totalTotales'];

	            var data = new Array();

	            $("#excel__modificaciones").html(" ");

	            let verificador_excel=1;

            	for (let i =0 ; i < idProgramacionFinanciera.length; i++) {

            		var array ={"idProgramacion":idProgramacionFinanciera[i],"items":nombreItem[i],"enero":enero[i],"febrero":febrero[i],"marzo":marzo[i],"abril":abril[i],"mayo":mayo[i],"junio":junio[i],"julio":julio[i],"agosto":agosto[i],"septiembre":septiembre[i],"octubre":octubre[i],"noviembre":noviembre[i],"diciembre":diciembre[i],"total":'=SUM(C'+verificador_excel+':N'+verificador_excel+')'}; 

            		
            		data.push(array);

            		verificador_excel++;

            	}


				const container = document.querySelector('#excel__modificaciones');


				const hyperformulaInstance = HyperFormula.buildEmpty({
				  licenseKey: 'internal-use-in-handsontable',
				});

				configuraciones={

				  data: data,
				  width: '100%',
				  height: 'auto',
				  colHeaders: ["Programación Financiera","Ítems","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre","Total"],
				  colWidths: [1,200,80,80,80,80,80,80,80,80,80,80,80,80,80],

				  language: 'es-MX',

				  columns:[

				  		{
				  			data:'idProgramacion',
				  			type:'text',
				  			visible: true,
				  			readOnly: true
						},

				  		{
				  			data:'items',
				  			type:'text',
				  			visible: true,
				  			readOnly: true
						},

						{
							data:'enero',
				  			type:'text',
							visible: true,
							type:'numeric',
							format: "0.00"
						},

						{
							data:'febrero',
				  			type:'text',
							visible: true,
							type:'numeric',
							format: "0.00"
						},

						{
							data:'marzo',
				  			type:'text',
							visible: true,
							type:'numeric',
							format: "0.00"
						},

						{
							data:'abril',
				  			type:'text',
							visible: true,
							type:'numeric',
							format: "0.00"
						},
						
						{
							data:'mayo',
				  			type:'text',
							visible: true,
							type:'numeric',
							format: "0.00"
						},

						{
							data:'junio',
				  			type:'text',
							visible: true,
							type:'numeric',
							format: "0.00"
						},


						{
							data:'julio',
				  			type:'text',
							visible: true,
							type:'numeric',
							format: "0.00"
						},


						{
							data:'agosto',
				  			type:'text',
							visible: true,
							type:'numeric',
							format: "0.00"
						},


						{
							data:'septiembre',
				  			type:'text',
						 	visible: true,
							type:'numeric',
							format: "0.00"
						},


						{
							data:'octubre',
				  			type:'text',
						 	visible: true,
							type:'numeric',
							format: "0.00"
						},


						{
							data:'noviembre',
				  			type:'text',
						 	visible: true,
							type:'numeric',
							format: "0.00"
						},


						{
							data:'diciembre',
				  			type:'text',
						 	visible: true,
							type:'numeric',
							format: "0.00"
						},

						{
							data:'total',
				  			type:'text',
						 	visible: true,
							type:'numeric',
							format: "0.00",
							readOnly: true
						},

					],

					formulas: {
					    engine: hyperformulaInstance,
					    sheetName: 'Sheet1'
  					}

				  
				};


				/*===================================
				=     Configuración de exportacïón =
				===================================*/


				
				const hot = new Handsontable(container, configuraciones);

				let htContents = hot.getData();

				hot.updateSettings({

					afterChange:function(registrosModificados,accionesHandsontable){

						let financiero__recogidos=$("#financiero__recogidos").val();

						// if (financiero__recogidos=="si") {

							let dataJson = new Array();

							let restador=0;

							let noVariable=no__repetir();

							registrosModificados.forEach(function(elemento){

							let asignador="";

							asignador=htContents[elemento[0]][0];
							items=htContents[elemento[0]][1];

							elemento.push(asignador);
							elemento.push(items);


							if (parseFloat(elemento[2])!=parseFloat(elemento[3])) {

								$(".body__tablas__anexos").append('<tr id="'+noVariable+'"><td>'+elemento[4]+'</td><td>'+elemento[5]+'</td><td>'+elemento[1]+'</td><td>'+parseFloat(elemento[2]).toFixed(2)+'</td><td>'+parseFloat(elemento[3]).toFixed(2)+'</td><td><button class="btn btn-warning" id="destinoU'+noVariable+'">Destino</button></td></tr>');

								$("#financiero__recogidos").val(asignador);

								restador=parseFloat(elemento[2])-parseFloat(elemento[3]);

								$("#financiero__recogidos").val(asignador);
								$("#valor__recogidos").val(restador);

								$("#cogido__letras").val(noVariable);

								$("#financiero__recogidos").val("no");

							}


							});

						// }


					},

				    afterOnCellMouseDown: function (registrosModificados,accionesHandsontable) {

						// $('#editarArchivoCon').click(function (e){

						// 	alert("hola mundos");

						// });	 
				    	
				    }

				});

				
				/*=====  End of Configuración de exportacïón  ======*/
				
				$(".hot-controls").addClass('d d-flex justify-content-center');
			
				$(".hot-controls-excel").addClass('btn btn-warning');

				$("#hot-display-license-info").hide();

				$("#hot-controls-export-selector").text('Exportar a excel');


				$("#hot-display-license-info").hide();



  			},

			error:function(){

			}
		
		});	    

	});	

}

generarBotones($("#generarTablas__items"));

/*=====  End of Generar tablas modificaciones  ======*/



});

