$(document).ready(function () {

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

function concatenarValores(parametro1){
	
	var array = new Array(); 

    $(parametro1).each(function(index) {

        array.push($(this).val());

    });

    return array;

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




$("#enviarTramites__conjunto").click(function (e){

	if ($("#select__meses").val()=="0" ||$("#select__meses").val()==0) {
		alertify.set("notifier","position", "top-center");
		alertify.notify("Es necesario escoger el mes de la modificación", "error", 5, function(){});
	}else{
		let confirm= alertify.confirm('¿Está seguro de enviar las modificaciones para análisis?','¿Está seguro de enviar las modificaciones para análisis?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

		confirm.set({transition:'slide'});    

		confirm.set('onok', function(){ //callbak al pulsar botón positivo

		let paqueteDeDatos = new FormData();

		paqueteDeDatos.append('tipo','modificacion__conjunto__enviar');
		paqueteDeDatos.append('mes',$("#select__meses").val());

		/*=====  End of Destino  ======*/
				
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
					alertify.notify("Acción realizada satisfactoriamente", "success", 5, function(){});

					window.setTimeout(function(){ 
						location.reload();
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
			}); 
		}); 	

	}

});

$("#guardarModificaciones__enviadas").click(function (e){

	let validador= validacionRegistro($(".obligatorios__iniciales"));
	validacionRegistroMostrarErrores($(".obligatorios__iniciales"));

	$("#guardarModificaciones__enviadas").hide();

	if (validador==false){

		alertify.set("notifier","position", "top-center");
		alertify.notify("Campos obligatorios", "error", 5, function(){});

		$("#guardarModificaciones__enviadas").show();

	}else if(parseFloat($("#totalOrigen").val())!=parseFloat($("#totalDesvinculacion__sumar").val()) && $("#identificadorPaginaReal").val()=="desvinculacion"){

		alertify.set("notifier","position", "top-center");
		alertify.notify("El monto total del orígen debe ser igual al monto del destino", "error", 10, function(){}); 

		$("#guardarModificaciones__enviadas").show();	

	}else if (parseFloat($("#totalOrigen").val())==parseFloat($("#totalDestino").val()) || $("#identificadorPaginaReal").val()=="desvinculacion" || ($("#identificadorPaginaReal").val()=="sueldos" && $("#totalMesAsignados__destinos").val()==parseFloat($("#totalOrigen").val())) || ($("#identificadorPaginaReal").val()=="honorarios" && $("#totalMesAsignados__destinos").val()==parseFloat($("#totalOrigen").val())) || ($("#identificadorPaginaReal").val()=="diferentes" && $("#totalMesAsignados__destinos").val()==parseFloat($("#totalOrigen").val())) || $("#actividad__modificaciones__destino__modificaciones2__seleccion").val()=="desvinculacionD" || ($("#identificadorPaginaReal").val()=="origenDesvinculacion" && parseFloat($("#totalOrigen").val())==parseFloat($("#totalDestino__destinoD").val())) || $("#actividad__modificaciones__destino__modificaciones2__seleccion").val()=="desvinculacionOrigen"){


		let confirm= alertify.confirm('¿Está seguro de generar la modificación?','¿Está seguro de generar la modificación?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

		confirm.set({transition:'slide'});    

		confirm.set('onok', function(){ //callbak al pulsar botón positivo

			let paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','modificacion__unitaria');

			/*==============================
			=            Campos            =
			==============================*/
			
			let origen_justificacion=$("#origen_justificacion").val();

			let identificadorPaginaReal=$("#identificadorPaginaReal").val();

			if (identificadorPaginaReal=="honorarios") {
				let persona_honorarios_data=$("#persona_honorarios_data").val();
				paqueteDeDatos.append("persona_honorarios_data",persona_honorarios_data);
			}


			if (identificadorPaginaReal=="origenDesvinculacion") {

				paqueteDeDatos.append('persona_sueldos_data__origen__desvinculacion', $('#persona_sueldos_data__origen__desvinculacion').prop('value'));

				let enero__origen__desahucio=$("#enero__origen__desahucio").val();

				/*================================
				=            Desaucio            =
				================================*/
				
				paqueteDeDatos.append('enero__origen__desahucio', enero__origen__desahucio);
				paqueteDeDatos.append('febrero__origen__desahucio', $('#febrero__origen__desahucio').prop('value'));
				paqueteDeDatos.append('marzo__origen__desahucio', $('#marzo__origen__desahucio').prop('value'));
				paqueteDeDatos.append('abril__origen__desahucio', $('#abril__origen__desahucio').prop('value'));
				paqueteDeDatos.append('mayo__origen__desahucio', $('#mayo__origen__desahucio').prop('value'));
				paqueteDeDatos.append('junio__origen__desahucio', $('#junio__origen__desahucio').prop('value'));
				paqueteDeDatos.append('julio__origen__desahucio', $('#julio__origen__desahucio').prop('value'));
				paqueteDeDatos.append('agosto__origen__desahucio', $('#agosto__origen__desahucio').prop('value'));
				paqueteDeDatos.append('septiembre__origen__desahucio', $('#septiembre__origen__desahucio').prop('value'));
				paqueteDeDatos.append('octubre__origen__desahucio', $('#octubre__origen__desahucio').prop('value'));
				paqueteDeDatos.append('noviembre__origen__desahucio', $('#noviembre__origen__desahucio').prop('value'));
				paqueteDeDatos.append('diciembre__origen__desahucio', $('#diciembre__origen__desahucio').prop('value'));

				paqueteDeDatos.append('enero__origen__desahucio__restante', $('#enero__origen__desahucio__restante').prop('value'));
				paqueteDeDatos.append('febrero__origen__desahucio__restante', $('#febrero__origen__desahucio__restante').prop('value'));
				paqueteDeDatos.append('marzo__origen__desahucio__restante', $('#marzo__origen__desahucio__restante').prop('value'));
				paqueteDeDatos.append('abril__origen__desahucio__restante', $('#abril__origen__desahucio__restante').prop('value'));
				paqueteDeDatos.append('mayo__origen__desahucio__restante', $('#mayo__origen__desahucio__restante').prop('value'));
				paqueteDeDatos.append('junio__origen__desahucio__restante', $('#junio__origen__desahucio__restante').prop('value'));
				paqueteDeDatos.append('julio__origen__desahucio__restante', $('#julio__origen__desahucio__restante').prop('value'));
				paqueteDeDatos.append('agosto__origen__desahucio__restante', $('#agosto__origen__desahucio__restante').prop('value'));
				paqueteDeDatos.append('septiembre__origen__desahucio__restante', $('#septiembre__origen__desahucio__restante').prop('value'));
				paqueteDeDatos.append('octubre__origen__desahucio__restante', $('#octubre__origen__desahucio__restante').prop('value'));
				paqueteDeDatos.append('noviembre__origen__desahucio__restante', $('#noviembre__origen__desahucio__restante').prop('value'));
				paqueteDeDatos.append('diciembre__origen__desahucio__restante', $('#diciembre__origen__desahucio__restante').prop('value'));
				
				paqueteDeDatos.append('enero__origen__desahucio__ingresar', $('#enero__origen__desahucio__ingresar').prop('value'));
				paqueteDeDatos.append('febrero__origen__desahucio__ingresar', $('#febrero__origen__desahucio__ingresar').prop('value'));
				paqueteDeDatos.append('marzo__origen__desahucio__ingresar', $('#marzo__origen__desahucio__ingresar').prop('value'));
				paqueteDeDatos.append('abril__origen__desahucio__ingresar', $('#abril__origen__desahucio__ingresar').prop('value'));
				paqueteDeDatos.append('mayo__origen__desahucio__ingresar', $('#mayo__origen__desahucio__ingresar').prop('value'));
				paqueteDeDatos.append('junio__origen__desahucio__ingresar', $('#junio__origen__desahucio__ingresar').prop('value'));
				paqueteDeDatos.append('julio__origen__desahucio__ingresar', $('#julio__origen__desahucio__ingresar').prop('value'));
				paqueteDeDatos.append('agosto__origen__desahucio__ingresar', $('#agosto__origen__desahucio__ingresar').prop('value'));
				paqueteDeDatos.append('septiembre__origen__desahucio__ingresar', $('#septiembre__origen__desahucio__ingresar').prop('value'));
				paqueteDeDatos.append('octubre__origen__desahucio__ingresar', $('#octubre__origen__desahucio__ingresar').prop('value'));
				paqueteDeDatos.append('noviembre__origen__desahucio__ingresar', $('#noviembre__origen__desahucio__ingresar').prop('value'));
				paqueteDeDatos.append('diciembre__origen__desahucio__ingresar', $('#diciembre__origen__desahucio__ingresar').prop('value'));

				/*=====  End of Desaucio  ======*/
				
				/*===============================
				=            Despido            =
				===============================*/
				
				paqueteDeDatos.append('enero__origen__despido__intenpestivo', $('#enero__origen__despido__intenpestivo').prop('value'));
				paqueteDeDatos.append('febrero__origen__despido__intenpestivo', $('#febrero__origen__despido__intenpestivo').prop('value'));
				paqueteDeDatos.append('marzo__origen__despido__intenpestivo', $('#marzo__origen__despido__intenpestivo').prop('value'));
				paqueteDeDatos.append('abril__origen__despido__intenpestivo', $('#abril__origen__despido__intenpestivo').prop('value'));
				paqueteDeDatos.append('mayo__origen__despido__intenpestivo', $('#mayo__origen__despido__intenpestivo').prop('value'));
				paqueteDeDatos.append('junio__origen__despido__intenpestivo', $('#junio__origen__despido__intenpestivo').prop('value'));
				paqueteDeDatos.append('julio__origen__despido__intenpestivo', $('#julio__origen__despido__intenpestivo').prop('value'));
				paqueteDeDatos.append('agosto__origen__despido__intenpestivo', $('#agosto__origen__despido__intenpestivo').prop('value'));
				paqueteDeDatos.append('septiembre__origen__despido__intenpestivo', $('#septiembre__origen__despido__intenpestivo').prop('value'));
				paqueteDeDatos.append('octubre__origen__despido__intenpestivo', $('#octubre__origen__despido__intenpestivo').prop('value'));
				paqueteDeDatos.append('noviembre__origen__despido__intenpestivo', $('#noviembre__origen__despido__intenpestivo').prop('value'));
				paqueteDeDatos.append('diciembre__origen__despido__intenpestivo', $('#diciembre__origen__despido__intenpestivo').prop('value'));

				paqueteDeDatos.append('enero__origen__despido__intenpestivo__restante', $('#enero__origen__despido__intenpestivo__restante').prop('value'));
				paqueteDeDatos.append('febrero__origen__despido__intenpestivo__restante', $('#febrero__origen__despido__intenpestivo__restante').prop('value'));
				paqueteDeDatos.append('marzo__origen__despido__intenpestivo__restante', $('#marzo__origen__despido__intenpestivo__restante').prop('value'));
				paqueteDeDatos.append('abril__origen__despido__intenpestivo__restante', $('#abril__origen__despido__intenpestivo__restante').prop('value'));
				paqueteDeDatos.append('mayo__origen__despido__intenpestivo__restante', $('#mayo__origen__despido__intenpestivo__restante').prop('value'));
				paqueteDeDatos.append('junio__origen__despido__intenpestivo__restante', $('#junio__origen__despido__intenpestivo__restante').prop('value'));
				paqueteDeDatos.append('julio__origen__despido__intenpestivo__restante', $('#julio__origen__despido__intenpestivo__restante').prop('value'));
				paqueteDeDatos.append('agosto__origen__despido__intenpestivo__restante', $('#agosto__origen__despido__intenpestivo__restante').prop('value'));
				paqueteDeDatos.append('septiembre__origen__despido__intenpestivo__restante', $('#septiembre__origen__despido__intenpestivo__restante').prop('value'));
				paqueteDeDatos.append('octubre__origen__despido__intenpestivo__restante', $('#octubre__origen__despido__intenpestivo__restante').prop('value'));
				paqueteDeDatos.append('noviembre__origen__despido__intenpestivo__restante', $('#noviembre__origen__despido__intenpestivo__restante').prop('value'));
				paqueteDeDatos.append('diciembre__origen__despido__intenpestivo__restante', $('#diciembre__origen__despido__intenpestivo__restante').prop('value'));
				
				paqueteDeDatos.append('enero__origen__despido__intenpestivo__ingresar', $('#enero__origen__despido__intenpestivo__ingresar').prop('value'));
				paqueteDeDatos.append('febrero__origen__despido__intenpestivo__ingresar', $('#febrero__origen__despido__intenpestivo__ingresar').prop('value'));
				paqueteDeDatos.append('marzo__origen__despido__intenpestivo__ingresar', $('#marzo__origen__despido__intenpestivo__ingresar').prop('value'));
				paqueteDeDatos.append('abril__origen__despido__intenpestivo__ingresar', $('#abril__origen__despido__intenpestivo__ingresar').prop('value'));
				paqueteDeDatos.append('mayo__origen__despido__intenpestivo__ingresar', $('#mayo__origen__despido__intenpestivo__ingresar').prop('value'));
				paqueteDeDatos.append('junio__origen__despido__intenpestivo__ingresar', $('#junio__origen__despido__intenpestivo__ingresar').prop('value'));
				paqueteDeDatos.append('julio__origen__despido__intenpestivo__ingresar', $('#julio__origen__despido__intenpestivo__ingresar').prop('value'));
				paqueteDeDatos.append('agosto__origen__despido__intenpestivo__ingresar', $('#agosto__origen__despido__intenpestivo__ingresar').prop('value'));
				paqueteDeDatos.append('septiembre__origen__despido__intenpestivo__ingresar', $('#septiembre__origen__despido__intenpestivo__ingresar').prop('value'));
				paqueteDeDatos.append('octubre__origen__despido__intenpestivo__ingresar', $('#octubre__origen__despido__intenpestivo__ingresar').prop('value'));
				paqueteDeDatos.append('noviembre__origen__despido__intenpestivo__ingresar', $('#noviembre__origen__despido__intenpestivo__ingresar').prop('value'));
				paqueteDeDatos.append('diciembre__origen__despido__intenpestivo__ingresar', $('#diciembre__origen__despido__intenpestivo__ingresar').prop('value'));

				/*=====  End of Despido  ======*/
				
				
				/*===========================================
				=            Renuncia voluntaria            =
				===========================================*/
				
				paqueteDeDatos.append('enero__origen__renunia__voluntaria', $('#enero__origen__renunia__voluntaria').prop('value'));
				paqueteDeDatos.append('febrero__origen__renunia__voluntaria', $('#febrero__origen__renunia__voluntaria').prop('value'));
				paqueteDeDatos.append('marzo__origen__renunia__voluntaria', $('#marzo__origen__renunia__voluntaria').prop('value'));
				paqueteDeDatos.append('abril__origen__renunia__voluntaria', $('#abril__origen__renunia__voluntaria').prop('value'));
				paqueteDeDatos.append('mayo__origen__renunia__voluntaria', $('#mayo__origen__renunia__voluntaria').prop('value'));
				paqueteDeDatos.append('junio__origen__renunia__voluntaria', $('#junio__origen__renunia__voluntaria').prop('value'));
				paqueteDeDatos.append('julio__origen__renunia__voluntaria', $('#julio__origen__renunia__voluntaria').prop('value'));
				paqueteDeDatos.append('agosto__origen__renunia__voluntaria', $('#agosto__origen__renunia__voluntaria').prop('value'));
				paqueteDeDatos.append('septiembre__origen__renunia__voluntaria', $('#septiembre__origen__renunia__voluntaria').prop('value'));
				paqueteDeDatos.append('octubre__origen__renunia__voluntaria', $('#octubre__origen__renunia__voluntaria').prop('value'));
				paqueteDeDatos.append('noviembre__origen__renunia__voluntaria', $('#noviembre__origen__renunia__voluntaria').prop('value'));
				paqueteDeDatos.append('diciembre__origen__renunia__voluntaria', $('#diciembre__origen__renunia__voluntaria').prop('value'));

				paqueteDeDatos.append('enero__origen__renunia__voluntaria__restante', $('#enero__origen__renunia__voluntaria__restante').prop('value'));
				paqueteDeDatos.append('febrero__origen__renunia__voluntaria__restante', $('#febrero__origen__renunia__voluntaria__restante').prop('value'));
				paqueteDeDatos.append('marzo__origen__renunia__voluntaria__restante', $('#marzo__origen__renunia__voluntaria__restante').prop('value'));
				paqueteDeDatos.append('abril__origen__renunia__voluntaria__restante', $('#abril__origen__renunia__voluntaria__restante').prop('value'));
				paqueteDeDatos.append('mayo__origen__renunia__voluntaria__restante', $('#mayo__origen__renunia__voluntaria__restante').prop('value'));
				paqueteDeDatos.append('junio__origen__renunia__voluntaria__restante', $('#junio__origen__renunia__voluntaria__restante').prop('value'));
				paqueteDeDatos.append('julio__origen__renunia__voluntaria__restante', $('#julio__origen__renunia__voluntaria__restante').prop('value'));
				paqueteDeDatos.append('agosto__origen__renunia__voluntaria__restante', $('#agosto__origen__renunia__voluntaria__restante').prop('value'));
				paqueteDeDatos.append('septiembre__origen__renunia__voluntaria__restante', $('#septiembre__origen__renunia__voluntaria__restante').prop('value'));
				paqueteDeDatos.append('octubre__origen__renunia__voluntaria__restante', $('#octubre__origen__renunia__voluntaria__restante').prop('value'));
				paqueteDeDatos.append('noviembre__origen__renunia__voluntaria__restante', $('#noviembre__origen__renunia__voluntaria__restante').prop('value'));
				paqueteDeDatos.append('diciembre__origen__renunia__voluntaria__restante', $('#diciembre__origen__renunia__voluntaria__restante').prop('value'));
				
				paqueteDeDatos.append('enero__origen__renunia__voluntaria__ingresar', $('#enero__origen__renunia__voluntaria__ingresar').prop('value'));
				paqueteDeDatos.append('febrero__origen__renunia__voluntaria__ingresar', $('#febrero__origen__renunia__voluntaria__ingresar').prop('value'));
				paqueteDeDatos.append('marzo__origen__renunia__voluntaria__ingresar', $('#marzo__origen__renunia__voluntaria__ingresar').prop('value'));
				paqueteDeDatos.append('abril__origen__renunia__voluntaria__ingresar', $('#abril__origen__renunia__voluntaria__ingresar').prop('value'));
				paqueteDeDatos.append('mayo__origen__renunia__voluntaria__ingresar', $('#mayo__origen__renunia__voluntaria__ingresar').prop('value'));
				paqueteDeDatos.append('junio__origen__renunia__voluntaria__ingresar', $('#junio__origen__renunia__voluntaria__ingresar').prop('value'));
				paqueteDeDatos.append('julio__origen__renunia__voluntaria__ingresar', $('#julio__origen__renunia__voluntaria__ingresar').prop('value'));
				paqueteDeDatos.append('agosto__origen__renunia__voluntaria__ingresar', $('#agosto__origen__renunia__voluntaria__ingresar').prop('value'));
				paqueteDeDatos.append('septiembre__origen__renunia__voluntaria__ingresar', $('#septiembre__origen__renunia__voluntaria__ingresar').prop('value'));
				paqueteDeDatos.append('octubre__origen__renunia__voluntaria__ingresar', $('#octubre__origen__renunia__voluntaria__ingresar').prop('value'));
				paqueteDeDatos.append('noviembre__origen__renunia__voluntaria__ingresar', $('#noviembre__origen__renunia__voluntaria__ingresar').prop('value'));
				paqueteDeDatos.append('diciembre__origen__renunia__voluntaria__ingresar', $('#diciembre__origen__renunia__voluntaria__ingresar').prop('value'));
				
				/*=====  End of Renuncia voluntaria  ======*/
				
				/*=============================================
				=            Vacaciones no gozadas            =
				=============================================*/
				
				paqueteDeDatos.append('enero__origen__vacaciones__no__gozadas', $('#enero__origen__vacaciones__no__gozadas').prop('value'));
				paqueteDeDatos.append('febrero__origen__vacaciones__no__gozadas', $('#febrero__origen__vacaciones__no__gozadas').prop('value'));
				paqueteDeDatos.append('marzo__origen__vacaciones__no__gozadas', $('#marzo__origen__vacaciones__no__gozadas').prop('value'));
				paqueteDeDatos.append('abril__origen__vacaciones__no__gozadas', $('#abril__origen__vacaciones__no__gozadas').prop('value'));
				paqueteDeDatos.append('mayo__origen__vacaciones__no__gozadas', $('#mayo__origen__vacaciones__no__gozadas').prop('value'));
				paqueteDeDatos.append('junio__origen__vacaciones__no__gozadas', $('#junio__origen__vacaciones__no__gozadas').prop('value'));
				paqueteDeDatos.append('julio__origen__vacaciones__no__gozadas', $('#julio__origen__vacaciones__no__gozadas').prop('value'));
				paqueteDeDatos.append('agosto__origen__vacaciones__no__gozadas', $('#agosto__origen__vacaciones__no__gozadas').prop('value'));
				paqueteDeDatos.append('septiembre__origen__vacaciones__no__gozadas', $('#septiembre__origen__vacaciones__no__gozadas').prop('value'));
				paqueteDeDatos.append('octubre__origen__vacaciones__no__gozadas', $('#octubre__origen__vacaciones__no__gozadas').prop('value'));
				paqueteDeDatos.append('noviembre__origen__vacaciones__no__gozadas', $('#noviembre__origen__vacaciones__no__gozadas').prop('value'));
				paqueteDeDatos.append('diciembre__origen__vacaciones__no__gozadas', $('#diciembre__origen__vacaciones__no__gozadas').prop('value'));

				paqueteDeDatos.append('enero__origen__vacaciones__no__gozadas__restante', $('#enero__origen__vacaciones__no__gozadas__restante').prop('value'));
				paqueteDeDatos.append('febrero__origen__vacaciones__no__gozadas__restante', $('#febrero__origen__vacaciones__no__gozadas__restante').prop('value'));
				paqueteDeDatos.append('marzo__origen__vacaciones__no__gozadas__restante', $('#marzo__origen__vacaciones__no__gozadas__restante').prop('value'));
				paqueteDeDatos.append('abril__origen__vacaciones__no__gozadas__restante', $('#abril__origen__vacaciones__no__gozadas__restante').prop('value'));
				paqueteDeDatos.append('mayo__origen__vacaciones__no__gozadas__restante', $('#mayo__origen__vacaciones__no__gozadas__restante').prop('value'));
				paqueteDeDatos.append('junio__origen__vacaciones__no__gozadas__restante', $('#junio__origen__vacaciones__no__gozadas__restante').prop('value'));
				paqueteDeDatos.append('julio__origen__vacaciones__no__gozadas__restante', $('#julio__origen__vacaciones__no__gozadas__restante').prop('value'));
				paqueteDeDatos.append('agosto__origen__vacaciones__no__gozadas__restante', $('#agosto__origen__vacaciones__no__gozadas__restante').prop('value'));
				paqueteDeDatos.append('septiembre__origen__vacaciones__no__gozadas__restante', $('#septiembre__origen__vacaciones__no__gozadas__restante').prop('value'));
				paqueteDeDatos.append('octubre__origen__vacaciones__no__gozadas__restante', $('#octubre__origen__vacaciones__no__gozadas__restante').prop('value'));
				paqueteDeDatos.append('noviembre__origen__vacaciones__no__gozadas__restante', $('#noviembre__origen__vacaciones__no__gozadas__restante').prop('value'));
				paqueteDeDatos.append('diciembre__origen__vacaciones__no__gozadas__restante', $('#diciembre__origen__vacaciones__no__gozadas__restante').prop('value'));
				
				paqueteDeDatos.append('enero__origen__vacaciones__no__gozadas__ingresar', $('#enero__origen__vacaciones__no__gozadas__ingresar').prop('value'));
				paqueteDeDatos.append('febrero__origen__vacaciones__no__gozadas__ingresar', $('#febrero__origen__vacaciones__no__gozadas__ingresar').prop('value'));
				paqueteDeDatos.append('marzo__origen__vacaciones__no__gozadas__ingresar', $('#marzo__origen__vacaciones__no__gozadas__ingresar').prop('value'));
				paqueteDeDatos.append('abril__origen__vacaciones__no__gozadas__ingresar', $('#abril__origen__vacaciones__no__gozadas__ingresar').prop('value'));
				paqueteDeDatos.append('mayo__origen__vacaciones__no__gozadas__ingresar', $('#mayo__origen__vacaciones__no__gozadas__ingresar').prop('value'));
				paqueteDeDatos.append('junio__origen__vacaciones__no__gozadas__ingresar', $('#junio__origen__vacaciones__no__gozadas__ingresar').prop('value'));
				paqueteDeDatos.append('julio__origen__vacaciones__no__gozadas__ingresar', $('#julio__origen__vacaciones__no__gozadas__ingresar').prop('value'));
				paqueteDeDatos.append('agosto__origen__vacaciones__no__gozadas__ingresar', $('#agosto__origen__vacaciones__no__gozadas__ingresar').prop('value'));
				paqueteDeDatos.append('septiembre__origen__vacaciones__no__gozadas__ingresar', $('#septiembre__origen__vacaciones__no__gozadas__ingresar').prop('value'));
				paqueteDeDatos.append('octubre__origen__vacaciones__no__gozadas__ingresar', $('#octubre__origen__vacaciones__no__gozadas__ingresar').prop('value'));
				paqueteDeDatos.append('noviembre__origen__vacaciones__no__gozadas__ingresar', $('#noviembre__origen__vacaciones__no__gozadas__ingresar').prop('value'));
				paqueteDeDatos.append('diciembre__origen__vacaciones__no__gozadas__ingresar', $('#diciembre__origen__vacaciones__no__gozadas__ingresar').prop('value'));
				
				/*=====  End of Vacaciones no gozadas  ======*/
				

			}

			/*===============================
			=            Destino            =
			===============================*/
			

			if ($("#actividad__modificaciones__destino__modificaciones2__seleccion").val()=="desvinculacionOrigen") {

				let totalDestino__destinoD=$("#totalDestino__destinoD").val();

				paqueteDeDatos.append('eventos_intervencion__seleccion', $('#eventos_intervencion__seleccion').prop('value'));
				paqueteDeDatos.append('totalDestino__destinoD', totalDestino__destinoD);

				/*================================
				=            Desaucio            =
				================================*/
				
				paqueteDeDatos.append('enero__destino__desahucio', $('#enero__destino__desahucio').prop('value'));
				paqueteDeDatos.append('febrero__destino__desahucio', $('#febrero__destino__desahucio').prop('value'));
				paqueteDeDatos.append('marzo__destino__desahucio', $('#marzo__destino__desahucio').prop('value'));
				paqueteDeDatos.append('abril__destino__desahucio', $('#abril__destino__desahucio').prop('value'));
				paqueteDeDatos.append('mayo__destino__desahucio', $('#mayo__destino__desahucio').prop('value'));
				paqueteDeDatos.append('junio__destino__desahucio', $('#junio__destino__desahucio').prop('value'));
				paqueteDeDatos.append('julio__destino__desahucio', $('#julio__destino__desahucio').prop('value'));
				paqueteDeDatos.append('agosto__destino__desahucio', $('#agosto__destino__desahucio').prop('value'));
				paqueteDeDatos.append('septiembre__destino__desahucio', $('#septiembre__destino__desahucio').prop('value'));
				paqueteDeDatos.append('octubre__destino__desahucio', $('#octubre__destino__desahucio').prop('value'));
				paqueteDeDatos.append('noviembre__destino__desahucio', $('#noviembre__destino__desahucio').prop('value'));
				paqueteDeDatos.append('diciembre__destino__desahucio', $('#diciembre__destino__desahucio').prop('value'));

				paqueteDeDatos.append('enero__destino__desahucio__restante', $('#enero__destino__desahucio__restante').prop('value'));
				paqueteDeDatos.append('febrero__destino__desahucio__restante', $('#febrero__destino__desahucio__restante').prop('value'));
				paqueteDeDatos.append('marzo__destino__desahucio__restante', $('#marzo__destino__desahucio__restante').prop('value'));
				paqueteDeDatos.append('abril__destino__desahucio__restante', $('#abril__destino__desahucio__restante').prop('value'));
				paqueteDeDatos.append('mayo__destino__desahucio__restante', $('#mayo__destino__desahucio__restante').prop('value'));
				paqueteDeDatos.append('junio__destino__desahucio__restante', $('#junio__destino__desahucio__restante').prop('value'));
				paqueteDeDatos.append('julio__destino__desahucio__restante', $('#julio__destino__desahucio__restante').prop('value'));
				paqueteDeDatos.append('agosto__destino__desahucio__restante', $('#agosto__destino__desahucio__restante').prop('value'));
				paqueteDeDatos.append('septiembre__destino__desahucio__restante', $('#septiembre__destino__desahucio__restante').prop('value'));
				paqueteDeDatos.append('octubre__destino__desahucio__restante', $('#octubre__destino__desahucio__restante').prop('value'));
				paqueteDeDatos.append('noviembre__destino__desahucio__restante', $('#noviembre__destino__desahucio__restante').prop('value'));
				paqueteDeDatos.append('diciembre__destino__desahucio__restante', $('#diciembre__destino__desahucio__restante').prop('value'));
				
				paqueteDeDatos.append('enero__destino__desahucio__ingresar', $('#enero__destino__desahucio__ingresar').prop('value'));
				paqueteDeDatos.append('febrero__destino__desahucio__ingresar', $('#febrero__destino__desahucio__ingresar').prop('value'));
				paqueteDeDatos.append('marzo__destino__desahucio__ingresar', $('#marzo__destino__desahucio__ingresar').prop('value'));
				paqueteDeDatos.append('abril__destino__desahucio__ingresar', $('#abril__destino__desahucio__ingresar').prop('value'));
				paqueteDeDatos.append('mayo__destino__desahucio__ingresar', $('#mayo__destino__desahucio__ingresar').prop('value'));
				paqueteDeDatos.append('junio__destino__desahucio__ingresar', $('#junio__destino__desahucio__ingresar').prop('value'));
				paqueteDeDatos.append('julio__destino__desahucio__ingresar', $('#julio__destino__desahucio__ingresar').prop('value'));
				paqueteDeDatos.append('agosto__destino__desahucio__ingresar', $('#agosto__destino__desahucio__ingresar').prop('value'));
				paqueteDeDatos.append('septiembre__destino__desahucio__ingresar', $('#septiembre__destino__desahucio__ingresar').prop('value'));
				paqueteDeDatos.append('octubre__destino__desahucio__ingresar', $('#octubre__destino__desahucio__ingresar').prop('value'));
				paqueteDeDatos.append('noviembre__destino__desahucio__ingresar', $('#noviembre__destino__desahucio__ingresar').prop('value'));
				paqueteDeDatos.append('diciembre__destino__desahucio__ingresar', $('#diciembre__destino__desahucio__ingresar').prop('value'));

				/*=====  End of Desaucio  ======*/
				
				/*===============================
				=            Despido            =
				===============================*/
				
				paqueteDeDatos.append('enero__destino__despido__intenpestivo', $('#enero__destino__despido__intenpestivo').prop('value'));
				paqueteDeDatos.append('febrero__destino__despido__intenpestivo', $('#febrero__destino__despido__intenpestivo').prop('value'));
				paqueteDeDatos.append('marzo__destino__despido__intenpestivo', $('#marzo__destino__despido__intenpestivo').prop('value'));
				paqueteDeDatos.append('abril__destino__despido__intenpestivo', $('#abril__destino__despido__intenpestivo').prop('value'));
				paqueteDeDatos.append('mayo__destino__despido__intenpestivo', $('#mayo__destino__despido__intenpestivo').prop('value'));
				paqueteDeDatos.append('junio__destino__despido__intenpestivo', $('#junio__destino__despido__intenpestivo').prop('value'));
				paqueteDeDatos.append('julio__destino__despido__intenpestivo', $('#julio__destino__despido__intenpestivo').prop('value'));
				paqueteDeDatos.append('agosto__destino__despido__intenpestivo', $('#agosto__destino__despido__intenpestivo').prop('value'));
				paqueteDeDatos.append('septiembre__destino__despido__intenpestivo', $('#septiembre__destino__despido__intenpestivo').prop('value'));
				paqueteDeDatos.append('octubre__destino__despido__intenpestivo', $('#octubre__destino__despido__intenpestivo').prop('value'));
				paqueteDeDatos.append('noviembre__destino__despido__intenpestivo', $('#noviembre__destino__despido__intenpestivo').prop('value'));
				paqueteDeDatos.append('diciembre__destino__despido__intenpestivo', $('#diciembre__destino__despido__intenpestivo').prop('value'));

				paqueteDeDatos.append('enero__destino__despido__intenpestivo__restante', $('#enero__destino__despido__intenpestivo__restante').prop('value'));
				paqueteDeDatos.append('febrero__destino__despido__intenpestivo__restante', $('#febrero__destino__despido__intenpestivo__restante').prop('value'));
				paqueteDeDatos.append('marzo__destino__despido__intenpestivo__restante', $('#marzo__destino__despido__intenpestivo__restante').prop('value'));
				paqueteDeDatos.append('abril__destino__despido__intenpestivo__restante', $('#abril__destino__despido__intenpestivo__restante').prop('value'));
				paqueteDeDatos.append('mayo__destino__despido__intenpestivo__restante', $('#mayo__destino__despido__intenpestivo__restante').prop('value'));
				paqueteDeDatos.append('junio__destino__despido__intenpestivo__restante', $('#junio__destino__despido__intenpestivo__restante').prop('value'));
				paqueteDeDatos.append('julio__destino__despido__intenpestivo__restante', $('#julio__destino__despido__intenpestivo__restante').prop('value'));
				paqueteDeDatos.append('agosto__destino__despido__intenpestivo__restante', $('#agosto__destino__despido__intenpestivo__restante').prop('value'));
				paqueteDeDatos.append('septiembre__destino__despido__intenpestivo__restante', $('#septiembre__destino__despido__intenpestivo__restante').prop('value'));
				paqueteDeDatos.append('octubre__destino__despido__intenpestivo__restante', $('#octubre__destino__despido__intenpestivo__restante').prop('value'));
				paqueteDeDatos.append('noviembre__destino__despido__intenpestivo__restante', $('#noviembre__destino__despido__intenpestivo__restante').prop('value'));
				paqueteDeDatos.append('diciembre__destino__despido__intenpestivo__restante', $('#diciembre__destino__despido__intenpestivo__restante').prop('value'));
				
				paqueteDeDatos.append('enero__destino__despido__intenpestivo__ingresar', $('#enero__destino__despido__intenpestivo__ingresar').prop('value'));
				paqueteDeDatos.append('febrero__destino__despido__intenpestivo__ingresar', $('#febrero__destino__despido__intenpestivo__ingresar').prop('value'));
				paqueteDeDatos.append('marzo__destino__despido__intenpestivo__ingresar', $('#marzo__destino__despido__intenpestivo__ingresar').prop('value'));
				paqueteDeDatos.append('abril__destino__despido__intenpestivo__ingresar', $('#abril__destino__despido__intenpestivo__ingresar').prop('value'));
				paqueteDeDatos.append('mayo__destino__despido__intenpestivo__ingresar', $('#mayo__destino__despido__intenpestivo__ingresar').prop('value'));
				paqueteDeDatos.append('junio__destino__despido__intenpestivo__ingresar', $('#junio__destino__despido__intenpestivo__ingresar').prop('value'));
				paqueteDeDatos.append('julio__destino__despido__intenpestivo__ingresar', $('#julio__destino__despido__intenpestivo__ingresar').prop('value'));
				paqueteDeDatos.append('agosto__destino__despido__intenpestivo__ingresar', $('#agosto__destino__despido__intenpestivo__ingresar').prop('value'));
				paqueteDeDatos.append('septiembre__destino__despido__intenpestivo__ingresar', $('#septiembre__destino__despido__intenpestivo__ingresar').prop('value'));
				paqueteDeDatos.append('octubre__destino__despido__intenpestivo__ingresar', $('#octubre__destino__despido__intenpestivo__ingresar').prop('value'));
				paqueteDeDatos.append('noviembre__destino__despido__intenpestivo__ingresar', $('#noviembre__destino__despido__intenpestivo__ingresar').prop('value'));
				paqueteDeDatos.append('diciembre__destino__despido__intenpestivo__ingresar', $('#diciembre__destino__despido__intenpestivo__ingresar').prop('value'));

				/*=====  End of Despido  ======*/
				
				
				/*===========================================
				=            Renuncia voluntaria            =
				===========================================*/
				
				paqueteDeDatos.append('enero__destino__renunia__voluntaria', $('#enero__destino__renunia__voluntaria').prop('value'));
				paqueteDeDatos.append('febrero__destino__renunia__voluntaria', $('#febrero__destino__renunia__voluntaria').prop('value'));
				paqueteDeDatos.append('marzo__destino__renunia__voluntaria', $('#marzo__destino__renunia__voluntaria').prop('value'));
				paqueteDeDatos.append('abril__destino__renunia__voluntaria', $('#abril__destino__renunia__voluntaria').prop('value'));
				paqueteDeDatos.append('mayo__destino__renunia__voluntaria', $('#mayo__destino__renunia__voluntaria').prop('value'));
				paqueteDeDatos.append('junio__destino__renunia__voluntaria', $('#junio__destino__renunia__voluntaria').prop('value'));
				paqueteDeDatos.append('julio__destino__renunia__voluntaria', $('#julio__destino__renunia__voluntaria').prop('value'));
				paqueteDeDatos.append('agosto__destino__renunia__voluntaria', $('#agosto__destino__renunia__voluntaria').prop('value'));
				paqueteDeDatos.append('septiembre__destino__renunia__voluntaria', $('#septiembre__destino__renunia__voluntaria').prop('value'));
				paqueteDeDatos.append('octubre__destino__renunia__voluntaria', $('#octubre__destino__renunia__voluntaria').prop('value'));
				paqueteDeDatos.append('noviembre__destino__renunia__voluntaria', $('#noviembre__destino__renunia__voluntaria').prop('value'));
				paqueteDeDatos.append('diciembre__destino__renunia__voluntaria', $('#diciembre__destino__renunia__voluntaria').prop('value'));

				paqueteDeDatos.append('enero__destino__renunia__voluntaria__restante', $('#enero__destino__renunia__voluntaria__restante').prop('value'));
				paqueteDeDatos.append('febrero__destino__renunia__voluntaria__restante', $('#febrero__destino__renunia__voluntaria__restante').prop('value'));
				paqueteDeDatos.append('marzo__destino__renunia__voluntaria__restante', $('#marzo__destino__renunia__voluntaria__restante').prop('value'));
				paqueteDeDatos.append('abril__destino__renunia__voluntaria__restante', $('#abril__destino__renunia__voluntaria__restante').prop('value'));
				paqueteDeDatos.append('mayo__destino__renunia__voluntaria__restante', $('#mayo__destino__renunia__voluntaria__restante').prop('value'));
				paqueteDeDatos.append('junio__destino__renunia__voluntaria__restante', $('#junio__destino__renunia__voluntaria__restante').prop('value'));
				paqueteDeDatos.append('julio__destino__renunia__voluntaria__restante', $('#julio__destino__renunia__voluntaria__restante').prop('value'));
				paqueteDeDatos.append('agosto__destino__renunia__voluntaria__restante', $('#agosto__destino__renunia__voluntaria__restante').prop('value'));
				paqueteDeDatos.append('septiembre__destino__renunia__voluntaria__restante', $('#septiembre__destino__renunia__voluntaria__restante').prop('value'));
				paqueteDeDatos.append('octubre__destino__renunia__voluntaria__restante', $('#octubre__destino__renunia__voluntaria__restante').prop('value'));
				paqueteDeDatos.append('noviembre__destino__renunia__voluntaria__restante', $('#noviembre__destino__renunia__voluntaria__restante').prop('value'));
				paqueteDeDatos.append('diciembre__destino__renunia__voluntaria__restante', $('#diciembre__destino__renunia__voluntaria__restante').prop('value'));
				
				paqueteDeDatos.append('enero__destino__renunia__voluntaria__ingresar', $('#enero__destino__renunia__voluntaria__ingresar').prop('value'));
				paqueteDeDatos.append('febrero__destino__renunia__voluntaria__ingresar', $('#febrero__destino__renunia__voluntaria__ingresar').prop('value'));
				paqueteDeDatos.append('marzo__destino__renunia__voluntaria__ingresar', $('#marzo__destino__renunia__voluntaria__ingresar').prop('value'));
				paqueteDeDatos.append('abril__destino__renunia__voluntaria__ingresar', $('#abril__destino__renunia__voluntaria__ingresar').prop('value'));
				paqueteDeDatos.append('mayo__destino__renunia__voluntaria__ingresar', $('#mayo__destino__renunia__voluntaria__ingresar').prop('value'));
				paqueteDeDatos.append('junio__destino__renunia__voluntaria__ingresar', $('#junio__destino__renunia__voluntaria__ingresar').prop('value'));
				paqueteDeDatos.append('julio__destino__renunia__voluntaria__ingresar', $('#julio__destino__renunia__voluntaria__ingresar').prop('value'));
				paqueteDeDatos.append('agosto__destino__renunia__voluntaria__ingresar', $('#agosto__destino__renunia__voluntaria__ingresar').prop('value'));
				paqueteDeDatos.append('septiembre__destino__renunia__voluntaria__ingresar', $('#septiembre__destino__renunia__voluntaria__ingresar').prop('value'));
				paqueteDeDatos.append('octubre__destino__renunia__voluntaria__ingresar', $('#octubre__destino__renunia__voluntaria__ingresar').prop('value'));
				paqueteDeDatos.append('noviembre__destino__renunia__voluntaria__ingresar', $('#noviembre__destino__renunia__voluntaria__ingresar').prop('value'));
				paqueteDeDatos.append('diciembre__destino__renunia__voluntaria__ingresar', $('#diciembre__destino__renunia__voluntaria__ingresar').prop('value'));
				
				/*=====  End of Renuncia voluntaria  ======*/
				
				/*=============================================
				=            Vacaciones no gozadas            =
				=============================================*/
				
				paqueteDeDatos.append('enero__destino__vacaciones__no__gozadas', $('#enero__destino__vacaciones__no__gozadas').prop('value'));
				paqueteDeDatos.append('febrero__destino__vacaciones__no__gozadas', $('#febrero__destino__vacaciones__no__gozadas').prop('value'));
				paqueteDeDatos.append('marzo__destino__vacaciones__no__gozadas', $('#marzo__destino__vacaciones__no__gozadas').prop('value'));
				paqueteDeDatos.append('abril__destino__vacaciones__no__gozadas', $('#abril__destino__vacaciones__no__gozadas').prop('value'));
				paqueteDeDatos.append('mayo__destino__vacaciones__no__gozadas', $('#mayo__destino__vacaciones__no__gozadas').prop('value'));
				paqueteDeDatos.append('junio__destino__vacaciones__no__gozadas', $('#junio__destino__vacaciones__no__gozadas').prop('value'));
				paqueteDeDatos.append('julio__destino__vacaciones__no__gozadas', $('#julio__destino__vacaciones__no__gozadas').prop('value'));
				paqueteDeDatos.append('agosto__destino__vacaciones__no__gozadas', $('#agosto__destino__vacaciones__no__gozadas').prop('value'));
				paqueteDeDatos.append('septiembre__destino__vacaciones__no__gozadas', $('#septiembre__destino__vacaciones__no__gozadas').prop('value'));
				paqueteDeDatos.append('octubre__destino__vacaciones__no__gozadas', $('#octubre__destino__vacaciones__no__gozadas').prop('value'));
				paqueteDeDatos.append('noviembre__destino__vacaciones__no__gozadas', $('#noviembre__destino__vacaciones__no__gozadas').prop('value'));
				paqueteDeDatos.append('diciembre__destino__vacaciones__no__gozadas', $('#diciembre__destino__vacaciones__no__gozadas').prop('value'));

				paqueteDeDatos.append('enero__destino__vacaciones__no__gozadas__restante', $('#enero__destino__vacaciones__no__gozadas__restante').prop('value'));
				paqueteDeDatos.append('febrero__destino__vacaciones__no__gozadas__restante', $('#febrero__destino__vacaciones__no__gozadas__restante').prop('value'));
				paqueteDeDatos.append('marzo__destino__vacaciones__no__gozadas__restante', $('#marzo__destino__vacaciones__no__gozadas__restante').prop('value'));
				paqueteDeDatos.append('abril__destino__vacaciones__no__gozadas__restante', $('#abril__destino__vacaciones__no__gozadas__restante').prop('value'));
				paqueteDeDatos.append('mayo__destino__vacaciones__no__gozadas__restante', $('#mayo__destino__vacaciones__no__gozadas__restante').prop('value'));
				paqueteDeDatos.append('junio__destino__vacaciones__no__gozadas__restante', $('#junio__destino__vacaciones__no__gozadas__restante').prop('value'));
				paqueteDeDatos.append('julio__destino__vacaciones__no__gozadas__restante', $('#julio__destino__vacaciones__no__gozadas__restante').prop('value'));
				paqueteDeDatos.append('agosto__destino__vacaciones__no__gozadas__restante', $('#agosto__destino__vacaciones__no__gozadas__restante').prop('value'));
				paqueteDeDatos.append('septiembre__destino__vacaciones__no__gozadas__restante', $('#septiembre__destino__vacaciones__no__gozadas__restante').prop('value'));
				paqueteDeDatos.append('octubre__destino__vacaciones__no__gozadas__restante', $('#octubre__destino__vacaciones__no__gozadas__restante').prop('value'));
				paqueteDeDatos.append('noviembre__destino__vacaciones__no__gozadas__restante', $('#noviembre__destino__vacaciones__no__gozadas__restante').prop('value'));
				paqueteDeDatos.append('diciembre__destino__vacaciones__no__gozadas__restante', $('#diciembre__destino__vacaciones__no__gozadas__restante').prop('value'));
				
				paqueteDeDatos.append('enero__destino__vacaciones__no__gozadas__ingresar', $('#enero__destino__vacaciones__no__gozadas__ingresar').prop('value'));
				paqueteDeDatos.append('febrero__destino__vacaciones__no__gozadas__ingresar', $('#febrero__destino__vacaciones__no__gozadas__ingresar').prop('value'));
				paqueteDeDatos.append('marzo__destino__vacaciones__no__gozadas__ingresar', $('#marzo__destino__vacaciones__no__gozadas__ingresar').prop('value'));
				paqueteDeDatos.append('abril__destino__vacaciones__no__gozadas__ingresar', $('#abril__destino__vacaciones__no__gozadas__ingresar').prop('value'));
				paqueteDeDatos.append('mayo__destino__vacaciones__no__gozadas__ingresar', $('#mayo__destino__vacaciones__no__gozadas__ingresar').prop('value'));
				paqueteDeDatos.append('junio__destino__vacaciones__no__gozadas__ingresar', $('#junio__destino__vacaciones__no__gozadas__ingresar').prop('value'));
				paqueteDeDatos.append('julio__destino__vacaciones__no__gozadas__ingresar', $('#julio__destino__vacaciones__no__gozadas__ingresar').prop('value'));
				paqueteDeDatos.append('agosto__destino__vacaciones__no__gozadas__ingresar', $('#agosto__destino__vacaciones__no__gozadas__ingresar').prop('value'));
				paqueteDeDatos.append('septiembre__destino__vacaciones__no__gozadas__ingresar', $('#septiembre__destino__vacaciones__no__gozadas__ingresar').prop('value'));
				paqueteDeDatos.append('octubre__destino__vacaciones__no__gozadas__ingresar', $('#octubre__destino__vacaciones__no__gozadas__ingresar').prop('value'));
				paqueteDeDatos.append('noviembre__destino__vacaciones__no__gozadas__ingresar', $('#noviembre__destino__vacaciones__no__gozadas__ingresar').prop('value'));
				paqueteDeDatos.append('diciembre__destino__vacaciones__no__gozadas__ingresar', $('#diciembre__destino__vacaciones__no__gozadas__ingresar').prop('value'));
				
				/*=====  End of Vacaciones no gozadas  ======*/

			}
						
			
			/*=====  End of Destino  ======*/
			

			if (identificadorPaginaReal=="sueldos") {

				var recorrerResultadosPredefinidos=function(clase,texto){

					var sumadorAtributos=0;

					$(clase).each(function(index) {

						sumadorAtributos=sumadorAtributos + parseFloat($(this).val());
					  
					});

					paqueteDeDatos.append(texto,sumadorAtributos);

				}

				recorrerResultadosPredefinidos($(".enlace__enero__origen"),"eneroOrigen__sueldos");
				recorrerResultadosPredefinidos($(".enlace__febrero__origen"),"febreroOrigen__sueldos");
				recorrerResultadosPredefinidos($(".enlace__marzo__origen"),"marzoOrigen__sueldos");
				recorrerResultadosPredefinidos($(".enlace__abril__origen"),"abrilOrigen__sueldos");
				recorrerResultadosPredefinidos($(".enlace__mayo__origen"),"mayoOrigen__sueldos");
				recorrerResultadosPredefinidos($(".enlace__junio__origen"),"junioOrigen__sueldos");
				recorrerResultadosPredefinidos($(".enlace__julio__origen"),"julioOrigen__sueldos");
				recorrerResultadosPredefinidos($(".enlace__agosto__origen"),"agostoOrigen__sueldos");
				recorrerResultadosPredefinidos($(".enlace__septiembre__origen"),"septiembreOrigen__sueldos");
				recorrerResultadosPredefinidos($(".enlace__octubre__origen"),"octubreOrigen__sueldos");
				recorrerResultadosPredefinidos($(".enlace__noviembre__origen"),"noviembreOrigen__sueldos");
				recorrerResultadosPredefinidos($(".enlace__diciembre__origen"),"diciembreOrigen__sueldos");
				paqueteDeDatos.append('totalOrigen', $('#totalOrigen').prop('value'));

				recorrerResultadosPredefinidos($(".enlace__enero__destino"),"eneroDestino__sueldos");
				recorrerResultadosPredefinidos($(".enlace__febrero__destino"),"febreroDestino__sueldos");
				recorrerResultadosPredefinidos($(".enlace__marzo__destino"),"marzoDestino__sueldos");
				recorrerResultadosPredefinidos($(".enlace__abril__destino"),"abrilDestino__sueldos");
				recorrerResultadosPredefinidos($(".enlace__mayo__destino"),"mayoDestino__sueldos");
				recorrerResultadosPredefinidos($(".enlace__junio__destino"),"junioDestino__sueldos");
				recorrerResultadosPredefinidos($(".enlace__julio__destino"),"julioDestino__sueldos");
				recorrerResultadosPredefinidos($(".enlace__agosto__destino"),"agostoDestino__sueldos");
				recorrerResultadosPredefinidos($(".enlace__septiembre__destino"),"septiembreDestino__sueldos");
				recorrerResultadosPredefinidos($(".enlace__octubre__destino"),"octubreDestino__sueldos");
				recorrerResultadosPredefinidos($(".enlace__noviembre__destino"),"noviembreDestino__sueldos");
				recorrerResultadosPredefinidos($(".enlace__diciembre__destino"),"diciembreDestino__sueldos");
				paqueteDeDatos.append('totalMesAsignados__destinos', $('#totalMesAsignados__destinos').prop('value'));
				/*==============================
				=            Origen            =
				==============================*/

				paqueteDeDatos.append('enero__origen__aporte__patronal__ingresar', $('#enero__origen__aporte__patronal__ingresar').prop('value'));
				paqueteDeDatos.append('febrero__origen__aporte__patronal__ingresar', $('#febrero__origen__aporte__patronal__ingresar').prop('value'));
				paqueteDeDatos.append('marzo__origen__aporte__patronal__ingresar', $('#marzo__origen__aporte__patronal__ingresar').prop('value'));
				paqueteDeDatos.append('abril__origen__aporte__patronal__ingresar', $('#abril__origen__aporte__patronal__ingresar').prop('value'));
				paqueteDeDatos.append('mayo__origen__aporte__patronal__ingresar', $('#mayo__origen__aporte__patronal__ingresar').prop('value'));
				paqueteDeDatos.append('junio__origen__aporte__patronal__ingresar', $('#junio__origen__aporte__patronal__ingresar').prop('value'));
				paqueteDeDatos.append('julio__origen__aporte__patronal__ingresar', $('#julio__origen__aporte__patronal__ingresar').prop('value'));
				paqueteDeDatos.append('agosto__origen__aporte__patronal__ingresar', $('#agosto__origen__aporte__patronal__ingresar').prop('value'));
				paqueteDeDatos.append('septiembre__origen__aporte__patronal__ingresar', $('#septiembre__origen__aporte__patronal__ingresar').prop('value'));
				paqueteDeDatos.append('octubre__origen__aporte__patronal__ingresar', $('#octubre__origen__aporte__patronal__ingresar').prop('value'));
				paqueteDeDatos.append('noviembre__origen__aporte__patronal__ingresar', $('#noviembre__origen__aporte__patronal__ingresar').prop('value'));
				paqueteDeDatos.append('diciembre__origen__aporte__patronal__ingresar', $('#diciembre__origen__aporte__patronal__ingresar').prop('value'));

				paqueteDeDatos.append('enero__origen__decimo__tercero__ingresar', $('#enero__origen__decimo__tercero__ingresar').prop('value'));
				paqueteDeDatos.append('febrero__origen__decimo__tercero__ingresar', $('#febrero__origen__decimo__tercero__ingresar').prop('value'));
				paqueteDeDatos.append('marzo__origen__decimo__tercero__ingresar', $('#marzo__origen__decimo__tercero__ingresar').prop('value'));
				paqueteDeDatos.append('abril__origen__decimo__tercero__ingresar', $('#abril__origen__decimo__tercero__ingresar').prop('value'));
				paqueteDeDatos.append('mayo__origen__decimo__tercero__ingresar', $('#mayo__origen__decimo__tercero__ingresar').prop('value'));
				paqueteDeDatos.append('junio__origen__decimo__tercero__ingresar', $('#junio__origen__decimo__tercero__ingresar').prop('value'));
				paqueteDeDatos.append('julio__origen__decimo__tercero__ingresar', $('#julio__origen__decimo__tercero__ingresar').prop('value'));
				paqueteDeDatos.append('agosto__origen__decimo__tercero__ingresar', $('#agosto__origen__decimo__tercero__ingresar').prop('value'));
				paqueteDeDatos.append('septiembre__origen__decimo__tercero__ingresar', $('#septiembre__origen__decimo__tercero__ingresar').prop('value'));
				paqueteDeDatos.append('octubre__origen__decimo__tercero__ingresar', $('#octubre__origen__decimo__tercero__ingresar').prop('value'));
				paqueteDeDatos.append('noviembre__origen__decimo__tercero__ingresar', $('#noviembre__origen__decimo__tercero__ingresar').prop('value'));
				paqueteDeDatos.append('diciembre__origen__decimo__tercero__ingresar', $('#diciembre__origen__decimo__tercero__ingresar').prop('value'));

				paqueteDeDatos.append('enero__origen__decimo__cuarto__ingresar', $('#enero__origen__decimo__cuarto__ingresar').prop('value'));
				paqueteDeDatos.append('febrero__origen__decimo__cuarto__ingresar', $('#febrero__origen__decimo__cuarto__ingresar').prop('value'));
				paqueteDeDatos.append('marzo__origen__decimo__cuarto__ingresar', $('#marzo__origen__decimo__cuarto__ingresar').prop('value'));
				paqueteDeDatos.append('abril__origen__decimo__cuarto__ingresar', $('#abril__origen__decimo__cuarto__ingresar').prop('value'));
				paqueteDeDatos.append('mayo__origen__decimo__cuarto__ingresar', $('#mayo__origen__decimo__cuarto__ingresar').prop('value'));
				paqueteDeDatos.append('junio__origen__decimo__cuarto__ingresar', $('#junio__origen__decimo__cuarto__ingresar').prop('value'));
				paqueteDeDatos.append('julio__origen__decimo__cuarto__ingresar', $('#julio__origen__decimo__cuarto__ingresar').prop('value'));
				paqueteDeDatos.append('agosto__origen__decimo__cuarto__ingresar', $('#agosto__origen__decimo__cuarto__ingresar').prop('value'));
				paqueteDeDatos.append('septiembre__origen__decimo__cuarto__ingresar', $('#septiembre__origen__decimo__cuarto__ingresar').prop('value'));
				paqueteDeDatos.append('octubre__origen__decimo__cuarto__ingresar', $('#octubre__origen__decimo__cuarto__ingresar').prop('value'));
				paqueteDeDatos.append('noviembre__origen__decimo__cuarto__ingresar', $('#noviembre__origen__decimo__cuarto__ingresar').prop('value'));
				paqueteDeDatos.append('diciembre__origen__decimo__cuarto__ingresar', $('#diciembre__origen__decimo__cuarto__ingresar').prop('value'));

				paqueteDeDatos.append('enero__origen__fondos__de__reserva__ingresar', $('#enero__origen__fondos__de__reserva__ingresar').prop('value'));
				paqueteDeDatos.append('febrero__origen__fondos__de__reserva__ingresar', $('#febrero__origen__fondos__de__reserva__ingresar').prop('value'));
				paqueteDeDatos.append('marzo__origen__fondos__de__reserva__ingresar', $('#marzo__origen__fondos__de__reserva__ingresar').prop('value'));
				paqueteDeDatos.append('abril__origen__fondos__de__reserva__ingresar', $('#abril__origen__fondos__de__reserva__ingresar').prop('value'));
				paqueteDeDatos.append('mayo__origen__fondos__de__reserva__ingresar', $('#mayo__origen__fondos__de__reserva__ingresar').prop('value'));
				paqueteDeDatos.append('junio__origen__fondos__de__reserva__ingresar', $('#junio__origen__fondos__de__reserva__ingresar').prop('value'));
				paqueteDeDatos.append('julio__origen__fondos__de__reserva__ingresar', $('#julio__origen__fondos__de__reserva__ingresar').prop('value'));
				paqueteDeDatos.append('julio__origen__fondos__de__reserva__ingresar', $('#julio__origen__fondos__de__reserva__ingresar').prop('value'));
				paqueteDeDatos.append('agosto__origen__fondos__de__reserva__ingresar', $('#agosto__origen__fondos__de__reserva__ingresar').prop('value'));
				paqueteDeDatos.append('septiembre__origen__fondos__de__reserva__ingresar', $('#septiembre__origen__fondos__de__reserva__ingresar').prop('value'));
				paqueteDeDatos.append('octubre__origen__fondos__de__reserva__ingresar', $('#octubre__origen__fondos__de__reserva__ingresar').prop('value'));
				paqueteDeDatos.append('noviembre__origen__fondos__de__reserva__ingresar', $('#noviembre__origen__fondos__de__reserva__ingresar').prop('value'));
				paqueteDeDatos.append('diciembre__origen__fondos__de__reserva__ingresar', $('#diciembre__origen__fondos__de__reserva__ingresar').prop('value'));

				paqueteDeDatos.append('enero__origen__salarios__ingresar', $('#enero__origen__salarios__ingresar').prop('value'));
				paqueteDeDatos.append('febrero__origen__salarios__ingresar', $('#febrero__origen__salarios__ingresar').prop('value'));
				paqueteDeDatos.append('marzo__origen__salarios__ingresar', $('#marzo__origen__salarios__ingresar').prop('value'));
				paqueteDeDatos.append('abril__origen__salarios__ingresar', $('#abril__origen__salarios__ingresar').prop('value'));
				paqueteDeDatos.append('mayo__origen__salarios__ingresar', $('#mayo__origen__salarios__ingresar').prop('value'));
				paqueteDeDatos.append('junio__origen__salarios__ingresar', $('#junio__origen__salarios__ingresar').prop('value'));
				paqueteDeDatos.append('julio__origen__salarios__ingresar', $('#julio__origen__salarios__ingresar').prop('value'));
				paqueteDeDatos.append('agosto__origen__salarios__ingresar', $('#agosto__origen__salarios__ingresar').prop('value'));
				paqueteDeDatos.append('septiembre__origen__salarios__ingresar', $('#septiembre__origen__salarios__ingresar').prop('value'));
				paqueteDeDatos.append('octubre__origen__salarios__ingresar', $('#octubre__origen__salarios__ingresar').prop('value'));
				paqueteDeDatos.append('noviembre__origen__salarios__ingresar', $('#noviembre__origen__salarios__ingresar').prop('value'));
				paqueteDeDatos.append('diciembre__origen__salarios__ingresar', $('#diciembre__origen__salarios__ingresar').prop('value'));

				paqueteDeDatos.append('enero__origen__restante', $('#enero__origen__restante').prop('value'));
				paqueteDeDatos.append('febrero__origen__restante', $('#febrero__origen__restante').prop('value'));
				paqueteDeDatos.append('marzo__origen__restante', $('#marzo__origen__restante').prop('value'));
				paqueteDeDatos.append('abril__origen__restante', $('#abril__origen__restante').prop('value'));
				paqueteDeDatos.append('mayo__origen__restante', $('#mayo__origen__restante').prop('value'));
				paqueteDeDatos.append('junio__origen__restante', $('#junio__origen__restante').prop('value'));
				paqueteDeDatos.append('julio__origen__restante', $('#julio__origen__restante').prop('value'));
				paqueteDeDatos.append('agosto__origen__restante', $('#agosto__origen__restante').prop('value'));
				paqueteDeDatos.append('septiembre__origen__restante', $('#septiembre__origen__restante').prop('value'));
				paqueteDeDatos.append('octubre__origen__restante', $('#octubre__origen__restante').prop('value'));
				paqueteDeDatos.append('noviembre__origen__restante', $('#noviembre__origen__restante').prop('value'));
				paqueteDeDatos.append('diciembre__origen__restante', $('#diciembre__origen__restante').prop('value'));

				/*=====  End of Origen  ======*/
				
				/*===============================
				=            Destino            =
				===============================*/
								
				paqueteDeDatos.append('enero__origen__aporte__patronal__ingresar__destino', $('#enero__origen__aporte__patronal__ingresar__destino').prop('value'));
				paqueteDeDatos.append('febrero__origen__aporte__patronal__ingresar__destino', $('#febrero__origen__aporte__patronal__ingresar__destino').prop('value'));
				paqueteDeDatos.append('marzo__origen__aporte__patronal__ingresar__destino', $('#marzo__origen__aporte__patronal__ingresar__destino').prop('value'));
				paqueteDeDatos.append('abril__origen__aporte__patronal__ingresar__destino', $('#abril__origen__aporte__patronal__ingresar__destino').prop('value'));
				paqueteDeDatos.append('mayo__origen__aporte__patronal__ingresar__destino', $('#mayo__origen__aporte__patronal__ingresar__destino').prop('value'));
				paqueteDeDatos.append('junio__origen__aporte__patronal__ingresar__destino', $('#junio__origen__aporte__patronal__ingresar__destino').prop('value'));
				paqueteDeDatos.append('julio__origen__aporte__patronal__ingresar__destino', $('#julio__origen__aporte__patronal__ingresar__destino').prop('value'));
				paqueteDeDatos.append('agosto__origen__aporte__patronal__ingresar__destino', $('#agosto__origen__aporte__patronal__ingresar__destino').prop('value'));
				paqueteDeDatos.append('septiembre__origen__aporte__patronal__ingresar__destino', $('#septiembre__origen__aporte__patronal__ingresar__destino').prop('value'));
				paqueteDeDatos.append('octubre__origen__aporte__patronal__ingresar__destino', $('#octubre__origen__aporte__patronal__ingresar__destino').prop('value'));
				paqueteDeDatos.append('noviembre__origen__aporte__patronal__ingresar__destino', $('#noviembre__origen__aporte__patronal__ingresar__destino').prop('value'));
				paqueteDeDatos.append('diciembre__origen__aporte__patronal__ingresar__destino', $('#diciembre__origen__aporte__patronal__ingresar__destino').prop('value'));

				paqueteDeDatos.append('enero__origen__decimo__tercero__ingresar__destino', $('#enero__origen__decimo__tercero__ingresar__destino').prop('value'));
				paqueteDeDatos.append('febrero__origen__decimo__tercero__ingresar__destino', $('#febrero__origen__decimo__tercero__ingresar__destino').prop('value'));
				paqueteDeDatos.append('marzo__origen__decimo__tercero__ingresar__destino', $('#marzo__origen__decimo__tercero__ingresar__destino').prop('value'));
				paqueteDeDatos.append('abril__origen__decimo__tercero__ingresar__destino', $('#abril__origen__decimo__tercero__ingresar__destino').prop('value'));
				paqueteDeDatos.append('mayo__origen__decimo__tercero__ingresar__destino', $('#mayo__origen__decimo__tercero__ingresar__destino').prop('value'));
				paqueteDeDatos.append('junio__origen__decimo__tercero__ingresar__destino', $('#junio__origen__decimo__tercero__ingresar__destino').prop('value'));
				paqueteDeDatos.append('julio__origen__decimo__tercero__ingresar__destino', $('#julio__origen__decimo__tercero__ingresar__destino').prop('value'));
				paqueteDeDatos.append('agosto__origen__decimo__tercero__ingresar__destino', $('#agosto__origen__decimo__tercero__ingresar__destino').prop('value'));
				paqueteDeDatos.append('septiembre__origen__decimo__tercero__ingresar__destino', $('#septiembre__origen__decimo__tercero__ingresar__destino').prop('value'));
				paqueteDeDatos.append('octubre__origen__decimo__tercero__ingresar__destino', $('#octubre__origen__decimo__tercero__ingresar__destino').prop('value'));
				paqueteDeDatos.append('noviembre__origen__decimo__tercero__ingresar__destino', $('#noviembre__origen__decimo__tercero__ingresar__destino').prop('value'));
				paqueteDeDatos.append('diciembre__origen__decimo__tercero__ingresar__destino', $('#diciembre__origen__decimo__tercero__ingresar__destino').prop('value'));

				paqueteDeDatos.append('enero__origen__decimo__cuarto__ingresar__destino', $('#enero__origen__decimo__cuarto__ingresar__destino').prop('value'));
				paqueteDeDatos.append('febrero__origen__decimo__cuarto__ingresar__destino', $('#febrero__origen__decimo__cuarto__ingresar__destino').prop('value'));
				paqueteDeDatos.append('marzo__origen__decimo__cuarto__ingresar__destino', $('#marzo__origen__decimo__cuarto__ingresar__destino').prop('value'));
				paqueteDeDatos.append('abril__origen__decimo__cuarto__ingresar__destino', $('#abril__origen__decimo__cuarto__ingresar__destino').prop('value'));
				paqueteDeDatos.append('mayo__origen__decimo__cuarto__ingresar__destino', $('#mayo__origen__decimo__cuarto__ingresar__destino').prop('value'));
				paqueteDeDatos.append('junio__origen__decimo__cuarto__ingresar__destino', $('#junio__origen__decimo__cuarto__ingresar__destino').prop('value'));
				paqueteDeDatos.append('julio__origen__decimo__cuarto__ingresar__destino', $('#julio__origen__decimo__cuarto__ingresar__destino').prop('value'));
				paqueteDeDatos.append('agosto__origen__decimo__cuarto__ingresar__destino', $('#agosto__origen__decimo__cuarto__ingresar__destino').prop('value'));
				paqueteDeDatos.append('septiembre__origen__decimo__cuarto__ingresar__destino', $('#septiembre__origen__decimo__cuarto__ingresar__destino').prop('value'));
				paqueteDeDatos.append('octubre__origen__decimo__cuarto__ingresar__destino', $('#octubre__origen__decimo__cuarto__ingresar__destino').prop('value'));
				paqueteDeDatos.append('noviembre__origen__decimo__cuarto__ingresar__destino', $('#noviembre__origen__decimo__cuarto__ingresar__destino').prop('value'));
				paqueteDeDatos.append('diciembre__origen__decimo__cuarto__ingresar__destino', $('#diciembre__origen__decimo__cuarto__ingresar__destino').prop('value'));

				paqueteDeDatos.append('enero__origen__fondos__de__reserva__ingresar__destino', $('#enero__origen__fondos__de__reserva__ingresar__destino').prop('value'));
				paqueteDeDatos.append('febrero__origen__fondos__de__reserva__ingresar__destino', $('#febrero__origen__fondos__de__reserva__ingresar__destino').prop('value'));
				paqueteDeDatos.append('marzo__origen__fondos__de__reserva__ingresar__destino', $('#marzo__origen__fondos__de__reserva__ingresar__destino').prop('value'));
				paqueteDeDatos.append('abril__origen__fondos__de__reserva__ingresar__destino', $('#abril__origen__fondos__de__reserva__ingresar__destino').prop('value'));
				paqueteDeDatos.append('mayo__origen__fondos__de__reserva__ingresar__destino', $('#mayo__origen__fondos__de__reserva__ingresar__destino').prop('value'));
				paqueteDeDatos.append('junio__origen__fondos__de__reserva__ingresar__destino', $('#junio__origen__fondos__de__reserva__ingresar__destino').prop('value'));
				paqueteDeDatos.append('julio__origen__fondos__de__reserva__ingresar__destino', $('#julio__origen__fondos__de__reserva__ingresar__destino').prop('value'));
				paqueteDeDatos.append('julio__origen__fondos__de__reserva__ingresar__destino', $('#julio__origen__fondos__de__reserva__ingresar__destino').prop('value'));
				paqueteDeDatos.append('agosto__origen__fondos__de__reserva__ingresar__destino', $('#agosto__origen__fondos__de__reserva__ingresar__destino').prop('value'));
				paqueteDeDatos.append('septiembre__origen__fondos__de__reserva__ingresar__destino', $('#septiembre__origen__fondos__de__reserva__ingresar__destino').prop('value'));
				paqueteDeDatos.append('octubre__origen__fondos__de__reserva__ingresar__destino', $('#octubre__origen__fondos__de__reserva__ingresar__destino').prop('value'));
				paqueteDeDatos.append('noviembre__origen__fondos__de__reserva__ingresar__destino', $('#noviembre__origen__fondos__de__reserva__ingresar__destino').prop('value'));
				paqueteDeDatos.append('diciembre__origen__fondos__de__reserva__ingresar__destino', $('#diciembre__origen__fondos__de__reserva__ingresar__destino').prop('value'));

				paqueteDeDatos.append('enero__origen__salarios__ingresar__destino', $('#enero__origen__salarios__ingresar__destino').prop('value'));
				paqueteDeDatos.append('febrero__origen__salarios__ingresar__destino', $('#febrero__origen__salarios__ingresar__destino').prop('value'));
				paqueteDeDatos.append('marzo__origen__salarios__ingresar__destino', $('#marzo__origen__salarios__ingresar__destino').prop('value'));
				paqueteDeDatos.append('abril__origen__salarios__ingresar__destino', $('#abril__origen__salarios__ingresar__destino').prop('value'));
				paqueteDeDatos.append('mayo__origen__salarios__ingresar__destino', $('#mayo__origen__salarios__ingresar__destino').prop('value'));
				paqueteDeDatos.append('junio__origen__salarios__ingresar__destino', $('#junio__origen__salarios__ingresar__destino').prop('value'));
				paqueteDeDatos.append('julio__origen__salarios__ingresar__destino', $('#julio__origen__salarios__ingresar__destino').prop('value'));
				paqueteDeDatos.append('agosto__origen__salarios__ingresar__destino', $('#agosto__origen__salarios__ingresar__destino').prop('value'));
				paqueteDeDatos.append('septiembre__origen__salarios__ingresar__destino', $('#septiembre__origen__salarios__ingresar__destino').prop('value'));
				paqueteDeDatos.append('octubre__origen__salarios__ingresar__destino', $('#octubre__origen__salarios__ingresar__destino').prop('value'));
				paqueteDeDatos.append('noviembre__origen__salarios__ingresar__destino', $('#noviembre__origen__salarios__ingresar__destino').prop('value'));
				paqueteDeDatos.append('diciembre__origen__salarios__ingresar__destino', $('#diciembre__origen__salarios__ingresar__destino').prop('value'));

				paqueteDeDatos.append('enero__origen__restante__destino', $('#enero__origen__restante__destino').prop('value'));
				paqueteDeDatos.append('febrero__origen__restante__destino', $('#febrero__origen__restante__destino').prop('value'));
				paqueteDeDatos.append('marzo__origen__restante__destino', $('#marzo__origen__restante__destino').prop('value'));
				paqueteDeDatos.append('abril__origen__restante__destino', $('#abril__origen__restante__destino').prop('value'));
				paqueteDeDatos.append('mayo__origen__restante__destino', $('#mayo__origen__restante__destino').prop('value'));
				paqueteDeDatos.append('junio__origen__restante__destino', $('#junio__origen__restante__destino').prop('value'));
				paqueteDeDatos.append('julio__origen__restante__destino', $('#julio__origen__restante__destino').prop('value'));
				paqueteDeDatos.append('agosto__origen__restante__destino', $('#agosto__origen__restante__destino').prop('value'));
				paqueteDeDatos.append('septiembre__origen__restante__destino', $('#septiembre__origen__restante__destino').prop('value'));
				paqueteDeDatos.append('octubre__origen__restante__destino', $('#octubre__origen__restante__destino').prop('value'));
				paqueteDeDatos.append('noviembre__origen__restante__destino', $('#noviembre__origen__restante__destino').prop('value'));
				paqueteDeDatos.append('diciembre__origen__restante__destino', $('#diciembre__origen__restante__destino').prop('value'));
								
								
				/*=====  End of Destino  ======*/

				/*===============================
				=            Avaluos            =
				===============================*/
				
				paqueteDeDatos.append('total__origen__patronal__totales__ingresados__destino', $('#total__origen__patronal__totales__ingresados__destino').prop('value'));
				paqueteDeDatos.append('total__origen__decimo__tercero__totales__ingresados__destino', $('#total__origen__decimo__tercero__totales__ingresados__destino').prop('value'));
				paqueteDeDatos.append('total__origen__decimo__cuarto__totales__ingresados__destino', $('#total__origen__decimo__cuarto__totales__ingresados__destino').prop('value'));
				paqueteDeDatos.append('total__origen__fondos__de__reserva__totales__ingresados__destino', $('#total__origen__fondos__de__reserva__totales__ingresados__destino').prop('value'));
				paqueteDeDatos.append('total__origen__salarios__totales__ingresados__destino', $('#total__origen__salarios__totales__ingresados__destino').prop('value'));
				

				paqueteDeDatos.append('total__origen__patronal__totales__ingresados', $('#total__origen__patronal__totales__ingresados').prop('value'));
				paqueteDeDatos.append('total__origen__decimo__tercero__totales__ingresados', $('#total__origen__decimo__tercero__totales__ingresados').prop('value'));
				paqueteDeDatos.append('total__origen__decimo__cuarto__totales__ingresados', $('#total__origen__decimo__cuarto__totales__ingresados').prop('value'));
				paqueteDeDatos.append('total__origen__fondos__de__reserva__totales__ingresados', $('#total__origen__fondos__de__reserva__totales__ingresados').prop('value'));
				paqueteDeDatos.append('total__origen__salarios__totales__ingresados', $('#total__origen__salarios__totales__ingresados').prop('value'));

				/*=====  End of Avaluos  ======*/
				
				/*=========================================
				=            Sumando Sumatores            =
				=========================================*/
				
				let sumaOrigen1=0;
				let sumaDestino1=0;

				let sumaOrigen1Restante=0;
				let sumaDestino1Restante=0;

				sumaOrigen1=parseFloat($("#enero__origen").val()) + parseFloat($("#febrero__origen").val()) + parseFloat($("#marzo__origen").val()) + parseFloat($("#abril__origen").val()) + parseFloat($("#mayo__origen").val()) + parseFloat($("#junio__origen").val()) + parseFloat($("#julio__origen").val()) + parseFloat($("#agosto__origen").val()) + parseFloat($("#septiembre__origen").val()) + parseFloat($("#octubre__origen").val()) + parseFloat($("#noviembre__origen").val()) + parseFloat($("#diciembre__origen").val());
				sumaOrigen1Restante=parseFloat($("#enero__origen__restante").val()) + parseFloat($("#febrero__origen__restante").val()) + parseFloat($("#marzo__origen__restante").val()) + parseFloat($("#abril__origen__restante").val()) + parseFloat($("#mayo__origen__restante").val()) + parseFloat($("#junio__origen__restante").val()) + parseFloat($("#julio__origen__restante").val()) + parseFloat($("#agosto__origen__restante").val()) + parseFloat($("#septiembre__origen__restante").val()) + parseFloat($("#octubre__origen__restante").val()) + parseFloat($("#noviembre__origen__restante").val()) + parseFloat($("#diciembre__origen__restante").val());


				sumaDestino1=parseFloat($("#enero__origen__destino").val()) + parseFloat($("#febrero__origen__destino").val()) + parseFloat($("#marzo__origen__destino").val()) + parseFloat($("#abril__origen__destino").val()) + parseFloat($("#mayo__origen__destino").val()) + parseFloat($("#junio__origen__destino").val()) + parseFloat($("#julio__origen__destino").val()) + parseFloat($("#agosto__origen__destino").val()) + parseFloat($("#septiembre__origen__destino").val()) + parseFloat($("#octubre__origen__destino").val()) + parseFloat($("#noviembre__origen__destino").val()) + parseFloat($("#diciembre__origen__destino").val());
				sumaDestino1Restante=parseFloat($("#enero__origen__restante__destino").val()) + parseFloat($("#febrero__origen__restante__destino").val()) + parseFloat($("#marzo__origen__restante__destino").val()) + parseFloat($("#abril__origen__restante__destino").val()) + parseFloat($("#mayo__origen__restante__destino").val()) + parseFloat($("#junio__origen__restante__destino").val()) + parseFloat($("#julio__origen__restante__destino").val()) + parseFloat($("#agosto__origen__restante__destino").val()) + parseFloat($("#septiembre__origen__restante__destino").val()) + parseFloat($("#octubre__origen__restante__destino").val()) + parseFloat($("#noviembre__origen__restante__destino").val()) + parseFloat($("#diciembre__origen__restante__destino").val());

				paqueteDeDatos.append('sumaOrigen1', parseFloat(sumaOrigen1).toFixed(2));
				paqueteDeDatos.append('sumaOrigen1Restante', parseFloat(sumaOrigen1Restante).toFixed(2));
				paqueteDeDatos.append('sumaDestino1', parseFloat(sumaDestino1).toFixed(2));
				paqueteDeDatos.append('sumaDestino1Restante', parseFloat(sumaDestino1Restante).toFixed(2));

				
				/*=====  End of Sumando Sumatores  ======*/

				paqueteDeDatos.append('persona_sueldos_data', $('#persona_sueldos_data').prop('value'));
				
												

			}

			if (identificadorPaginaReal=="desvinculacion") {

				let persona_honorarios_data=$("#persona_sueldos_data").val();
				let persona_sueldos_data=$("#persona_sueldos_data").val();
				let eneroDesvinculacion__sumando=$("#eneroDesvinculacion__sumando").val();
				let febreroDesvinculacion__sumando=$("#febreroDesvinculacion__sumando").val();
				let marzoDesvinculacion__sumando=$("#marzoDesvinculacion__sumando").val();
				let abrilDesvinculacion__sumando=$("#abrilDesvinculacion__sumando").val();
				let mayoDesvinculacion__sumando=$("#mayoDesvinculacion__sumando").val();
				let junioDesvinculacion__sumando=$("#junioDesvinculacion__sumando").val();
				let julioDesvinculacion__sumando=$("#julioDesvinculacion__sumando").val();
				let agostoDesvinculacion__sumando=$("#agostoDesvinculacion__sumando").val();
				let septiembreDesvinculacion__sumando=$("#septiembreDesvinculacion__sumando").val();
				let octubreDesvinculacion__sumando=$("#octubreDesvinculacion__sumando").val();
				let noviembreDesvinculacion__sumando=$("#noviembreDesvinculacion__sumando").val();
				let diciembreDesvinculacion__sumando=$("#diciembreDesvinculacion__sumando").val();
				let desvinculacion__modificaciones=$("#desvinculacion__modificaciones").val();
				let totalDesvinculacion__sumar=$("#totalDesvinculacion__sumar").val();


				paqueteDeDatos.append("persona_honorarios_data",persona_honorarios_data);
				paqueteDeDatos.append("persona_sueldos_data",persona_sueldos_data);
				paqueteDeDatos.append("eneroDesvinculacion__sumando",eneroDesvinculacion__sumando);
				paqueteDeDatos.append("febreroDesvinculacion__sumando",febreroDesvinculacion__sumando);
				paqueteDeDatos.append("marzoDesvinculacion__sumando",marzoDesvinculacion__sumando);
				paqueteDeDatos.append("abrilDesvinculacion__sumando",abrilDesvinculacion__sumando);
				paqueteDeDatos.append("mayoDesvinculacion__sumando",mayoDesvinculacion__sumando);
				paqueteDeDatos.append("junioDesvinculacion__sumando",junioDesvinculacion__sumando);
				paqueteDeDatos.append("julioDesvinculacion__sumando",julioDesvinculacion__sumando);
				paqueteDeDatos.append("agostoDesvinculacion__sumando",agostoDesvinculacion__sumando);
				paqueteDeDatos.append("septiembreDesvinculacion__sumando",septiembreDesvinculacion__sumando);
				paqueteDeDatos.append("octubreDesvinculacion__sumando",octubreDesvinculacion__sumando);
				paqueteDeDatos.append("noviembreDesvinculacion__sumando",noviembreDesvinculacion__sumando);
				paqueteDeDatos.append("diciembreDesvinculacion__sumando",diciembreDesvinculacion__sumando);
				paqueteDeDatos.append("desvinculacion__modificaciones",desvinculacion__modificaciones);
				paqueteDeDatos.append("totalDesvinculacion__sumar",totalDesvinculacion__sumar);

		
				var recorrerResultadosPredefinidos=function(clase,texto){

					var sumadorAtributos=0;

					$(clase).each(function(index) {

						sumadorAtributos=sumadorAtributos + parseFloat($(this).val());
					  
					});

					paqueteDeDatos.append(texto,sumadorAtributos);

				}

				recorrerResultadosPredefinidos($(".enlace__enero__origen"),"eneroOrigen__sueldos");
				recorrerResultadosPredefinidos($(".enlace__febrero__origen"),"febreroOrigen__sueldos");
				recorrerResultadosPredefinidos($(".enlace__marzo__origen"),"marzoOrigen__sueldos");
				recorrerResultadosPredefinidos($(".enlace__abril__origen"),"abrilOrigen__sueldos");
				recorrerResultadosPredefinidos($(".enlace__mayo__origen"),"mayoOrigen__sueldos");
				recorrerResultadosPredefinidos($(".enlace__junio__origen"),"junioOrigen__sueldos");
				recorrerResultadosPredefinidos($(".enlace__julio__origen"),"julioOrigen__sueldos");
				recorrerResultadosPredefinidos($(".enlace__agosto__origen"),"agostoOrigen__sueldos");
				recorrerResultadosPredefinidos($(".enlace__septiembre__origen"),"septiembreOrigen__sueldos");
				recorrerResultadosPredefinidos($(".enlace__octubre__origen"),"octubreOrigen__sueldos");
				recorrerResultadosPredefinidos($(".enlace__noviembre__origen"),"noviembreOrigen__sueldos");
				recorrerResultadosPredefinidos($(".enlace__diciembre__origen"),"diciembreOrigen__sueldos");
				paqueteDeDatos.append('totalOrigen', $('#totalOrigen').prop('value'));

				paqueteDeDatos.append('documento__justificacion', $('#documento__justificacion')[0].files[0]);
				paqueteDeDatos.append("origen_justificacion",origen_justificacion);
				paqueteDeDatos.append("tipo__empaquetado",origen_justificacion);
				paqueteDeDatos.append("identificadorPaginaReal",identificadorPaginaReal);


		
			
				/*==============================
				=            Origen            =
				==============================*/

				paqueteDeDatos.append('enero__origen__aporte__patronal__ingresar', $('#enero__origen__aporte__patronal__ingresar').prop('value'));
				paqueteDeDatos.append('febrero__origen__aporte__patronal__ingresar', $('#febrero__origen__aporte__patronal__ingresar').prop('value'));
				paqueteDeDatos.append('marzo__origen__aporte__patronal__ingresar', $('#marzo__origen__aporte__patronal__ingresar').prop('value'));
				paqueteDeDatos.append('abril__origen__aporte__patronal__ingresar', $('#abril__origen__aporte__patronal__ingresar').prop('value'));
				paqueteDeDatos.append('mayo__origen__aporte__patronal__ingresar', $('#mayo__origen__aporte__patronal__ingresar').prop('value'));
				paqueteDeDatos.append('junio__origen__aporte__patronal__ingresar', $('#junio__origen__aporte__patronal__ingresar').prop('value'));
				paqueteDeDatos.append('julio__origen__aporte__patronal__ingresar', $('#julio__origen__aporte__patronal__ingresar').prop('value'));
				paqueteDeDatos.append('agosto__origen__aporte__patronal__ingresar', $('#agosto__origen__aporte__patronal__ingresar').prop('value'));
				paqueteDeDatos.append('septiembre__origen__aporte__patronal__ingresar', $('#septiembre__origen__aporte__patronal__ingresar').prop('value'));
				paqueteDeDatos.append('octubre__origen__aporte__patronal__ingresar', $('#octubre__origen__aporte__patronal__ingresar').prop('value'));
				paqueteDeDatos.append('noviembre__origen__aporte__patronal__ingresar', $('#noviembre__origen__aporte__patronal__ingresar').prop('value'));
				paqueteDeDatos.append('diciembre__origen__aporte__patronal__ingresar', $('#diciembre__origen__aporte__patronal__ingresar').prop('value'));

				paqueteDeDatos.append('enero__origen__decimo__tercero__ingresar', $('#enero__origen__decimo__tercero__ingresar').prop('value'));
				paqueteDeDatos.append('febrero__origen__decimo__tercero__ingresar', $('#febrero__origen__decimo__tercero__ingresar').prop('value'));
				paqueteDeDatos.append('marzo__origen__decimo__tercero__ingresar', $('#marzo__origen__decimo__tercero__ingresar').prop('value'));
				paqueteDeDatos.append('abril__origen__decimo__tercero__ingresar', $('#abril__origen__decimo__tercero__ingresar').prop('value'));
				paqueteDeDatos.append('mayo__origen__decimo__tercero__ingresar', $('#mayo__origen__decimo__tercero__ingresar').prop('value'));
				paqueteDeDatos.append('junio__origen__decimo__tercero__ingresar', $('#junio__origen__decimo__tercero__ingresar').prop('value'));
				paqueteDeDatos.append('julio__origen__decimo__tercero__ingresar', $('#julio__origen__decimo__tercero__ingresar').prop('value'));
				paqueteDeDatos.append('agosto__origen__decimo__tercero__ingresar', $('#agosto__origen__decimo__tercero__ingresar').prop('value'));
				paqueteDeDatos.append('septiembre__origen__decimo__tercero__ingresar', $('#septiembre__origen__decimo__tercero__ingresar').prop('value'));
				paqueteDeDatos.append('octubre__origen__decimo__tercero__ingresar', $('#octubre__origen__decimo__tercero__ingresar').prop('value'));
				paqueteDeDatos.append('noviembre__origen__decimo__tercero__ingresar', $('#noviembre__origen__decimo__tercero__ingresar').prop('value'));
				paqueteDeDatos.append('diciembre__origen__decimo__tercero__ingresar', $('#diciembre__origen__decimo__tercero__ingresar').prop('value'));

				paqueteDeDatos.append('enero__origen__decimo__cuarto__ingresar', $('#enero__origen__decimo__cuarto__ingresar').prop('value'));
				paqueteDeDatos.append('febrero__origen__decimo__cuarto__ingresar', $('#febrero__origen__decimo__cuarto__ingresar').prop('value'));
				paqueteDeDatos.append('marzo__origen__decimo__cuarto__ingresar', $('#marzo__origen__decimo__cuarto__ingresar').prop('value'));
				paqueteDeDatos.append('abril__origen__decimo__cuarto__ingresar', $('#abril__origen__decimo__cuarto__ingresar').prop('value'));
				paqueteDeDatos.append('mayo__origen__decimo__cuarto__ingresar', $('#mayo__origen__decimo__cuarto__ingresar').prop('value'));
				paqueteDeDatos.append('junio__origen__decimo__cuarto__ingresar', $('#junio__origen__decimo__cuarto__ingresar').prop('value'));
				paqueteDeDatos.append('julio__origen__decimo__cuarto__ingresar', $('#julio__origen__decimo__cuarto__ingresar').prop('value'));
				paqueteDeDatos.append('agosto__origen__decimo__cuarto__ingresar', $('#agosto__origen__decimo__cuarto__ingresar').prop('value'));
				paqueteDeDatos.append('septiembre__origen__decimo__cuarto__ingresar', $('#septiembre__origen__decimo__cuarto__ingresar').prop('value'));
				paqueteDeDatos.append('octubre__origen__decimo__cuarto__ingresar', $('#octubre__origen__decimo__cuarto__ingresar').prop('value'));
				paqueteDeDatos.append('noviembre__origen__decimo__cuarto__ingresar', $('#noviembre__origen__decimo__cuarto__ingresar').prop('value'));
				paqueteDeDatos.append('diciembre__origen__decimo__cuarto__ingresar', $('#diciembre__origen__decimo__cuarto__ingresar').prop('value'));

				paqueteDeDatos.append('enero__origen__fondos__de__reserva__ingresar', $('#enero__origen__fondos__de__reserva__ingresar').prop('value'));
				paqueteDeDatos.append('febrero__origen__fondos__de__reserva__ingresar', $('#febrero__origen__fondos__de__reserva__ingresar').prop('value'));
				paqueteDeDatos.append('marzo__origen__fondos__de__reserva__ingresar', $('#marzo__origen__fondos__de__reserva__ingresar').prop('value'));
				paqueteDeDatos.append('abril__origen__fondos__de__reserva__ingresar', $('#abril__origen__fondos__de__reserva__ingresar').prop('value'));
				paqueteDeDatos.append('mayo__origen__fondos__de__reserva__ingresar', $('#mayo__origen__fondos__de__reserva__ingresar').prop('value'));
				paqueteDeDatos.append('junio__origen__fondos__de__reserva__ingresar', $('#junio__origen__fondos__de__reserva__ingresar').prop('value'));
				paqueteDeDatos.append('julio__origen__fondos__de__reserva__ingresar', $('#julio__origen__fondos__de__reserva__ingresar').prop('value'));
				paqueteDeDatos.append('julio__origen__fondos__de__reserva__ingresar', $('#julio__origen__fondos__de__reserva__ingresar').prop('value'));
				paqueteDeDatos.append('agosto__origen__fondos__de__reserva__ingresar', $('#agosto__origen__fondos__de__reserva__ingresar').prop('value'));
				paqueteDeDatos.append('septiembre__origen__fondos__de__reserva__ingresar', $('#septiembre__origen__fondos__de__reserva__ingresar').prop('value'));
				paqueteDeDatos.append('octubre__origen__fondos__de__reserva__ingresar', $('#octubre__origen__fondos__de__reserva__ingresar').prop('value'));
				paqueteDeDatos.append('noviembre__origen__fondos__de__reserva__ingresar', $('#noviembre__origen__fondos__de__reserva__ingresar').prop('value'));
				paqueteDeDatos.append('diciembre__origen__fondos__de__reserva__ingresar', $('#diciembre__origen__fondos__de__reserva__ingresar').prop('value'));

				paqueteDeDatos.append('enero__origen__salarios__ingresar', $('#enero__origen__salarios__ingresar').prop('value'));
				paqueteDeDatos.append('febrero__origen__salarios__ingresar', $('#febrero__origen__salarios__ingresar').prop('value'));
				paqueteDeDatos.append('marzo__origen__salarios__ingresar', $('#marzo__origen__salarios__ingresar').prop('value'));
				paqueteDeDatos.append('abril__origen__salarios__ingresar', $('#abril__origen__salarios__ingresar').prop('value'));
				paqueteDeDatos.append('mayo__origen__salarios__ingresar', $('#mayo__origen__salarios__ingresar').prop('value'));
				paqueteDeDatos.append('junio__origen__salarios__ingresar', $('#junio__origen__salarios__ingresar').prop('value'));
				paqueteDeDatos.append('julio__origen__salarios__ingresar', $('#julio__origen__salarios__ingresar').prop('value'));
				paqueteDeDatos.append('agosto__origen__salarios__ingresar', $('#agosto__origen__salarios__ingresar').prop('value'));
				paqueteDeDatos.append('septiembre__origen__salarios__ingresar', $('#septiembre__origen__salarios__ingresar').prop('value'));
				paqueteDeDatos.append('octubre__origen__salarios__ingresar', $('#octubre__origen__salarios__ingresar').prop('value'));
				paqueteDeDatos.append('noviembre__origen__salarios__ingresar', $('#noviembre__origen__salarios__ingresar').prop('value'));
				paqueteDeDatos.append('diciembre__origen__salarios__ingresar', $('#diciembre__origen__salarios__ingresar').prop('value'));

				paqueteDeDatos.append('enero__origen__restante', $('#enero__origen__restante').prop('value'));
				paqueteDeDatos.append('febrero__origen__restante', $('#febrero__origen__restante').prop('value'));
				paqueteDeDatos.append('marzo__origen__restante', $('#marzo__origen__restante').prop('value'));
				paqueteDeDatos.append('abril__origen__restante', $('#abril__origen__restante').prop('value'));
				paqueteDeDatos.append('mayo__origen__restante', $('#mayo__origen__restante').prop('value'));
				paqueteDeDatos.append('junio__origen__restante', $('#junio__origen__restante').prop('value'));
				paqueteDeDatos.append('julio__origen__restante', $('#julio__origen__restante').prop('value'));
				paqueteDeDatos.append('agosto__origen__restante', $('#agosto__origen__restante').prop('value'));
				paqueteDeDatos.append('septiembre__origen__restante', $('#septiembre__origen__restante').prop('value'));
				paqueteDeDatos.append('octubre__origen__restante', $('#octubre__origen__restante').prop('value'));
				paqueteDeDatos.append('noviembre__origen__restante', $('#noviembre__origen__restante').prop('value'));
				paqueteDeDatos.append('diciembre__origen__restante', $('#diciembre__origen__restante').prop('value'));

				/*=====  End of Origen  ======*/
				
				/*===============================
				=            Avaluos            =
				===============================*/
				
				paqueteDeDatos.append('total__origen__patronal__totales__ingresados__destino', $('#total__origen__patronal__totales__ingresados__destino').prop('value'));
				paqueteDeDatos.append('total__origen__decimo__tercero__totales__ingresados__destino', $('#total__origen__decimo__tercero__totales__ingresados__destino').prop('value'));
				paqueteDeDatos.append('total__origen__decimo__cuarto__totales__ingresados__destino', $('#total__origen__decimo__cuarto__totales__ingresados__destino').prop('value'));
				paqueteDeDatos.append('total__origen__fondos__de__reserva__totales__ingresados__destino', $('#total__origen__fondos__de__reserva__totales__ingresados__destino').prop('value'));
				paqueteDeDatos.append('total__origen__salarios__totales__ingresados__destino', $('#total__origen__salarios__totales__ingresados__destino').prop('value'));
				

				paqueteDeDatos.append('total__origen__patronal__totales__ingresados', $('#total__origen__patronal__totales__ingresados').prop('value'));
				paqueteDeDatos.append('total__origen__decimo__tercero__totales__ingresados', $('#total__origen__decimo__tercero__totales__ingresados').prop('value'));
				paqueteDeDatos.append('total__origen__decimo__cuarto__totales__ingresados', $('#total__origen__decimo__cuarto__totales__ingresados').prop('value'));
				paqueteDeDatos.append('total__origen__fondos__de__reserva__totales__ingresados', $('#total__origen__fondos__de__reserva__totales__ingresados').prop('value'));
				paqueteDeDatos.append('total__origen__salarios__totales__ingresados', $('#total__origen__salarios__totales__ingresados').prop('value'));

				/*=====  End of Avaluos  ======*/
				
				/*=========================================
				=            Sumando Sumatores            =
				=========================================*/
				
				let sumaOrigen1=0;
				let sumaDestino1=0;

				let sumaOrigen1Restante=0;
				let sumaDestino1Restante=0;

				sumaOrigen1=parseFloat($("#enero__origen").val()) + parseFloat($("#febrero__origen").val()) + parseFloat($("#marzo__origen").val()) + parseFloat($("#abril__origen").val()) + parseFloat($("#mayo__origen").val()) + parseFloat($("#junio__origen").val()) + parseFloat($("#julio__origen").val()) + parseFloat($("#agosto__origen").val()) + parseFloat($("#septiembre__origen").val()) + parseFloat($("#octubre__origen").val()) + parseFloat($("#noviembre__origen").val()) + parseFloat($("#diciembre__origen").val());
				sumaOrigen1Restante=parseFloat($("#enero__origen__restante").val()) + parseFloat($("#febrero__origen__restante").val()) + parseFloat($("#marzo__origen__restante").val()) + parseFloat($("#abril__origen__restante").val()) + parseFloat($("#mayo__origen__restante").val()) + parseFloat($("#junio__origen__restante").val()) + parseFloat($("#julio__origen__restante").val()) + parseFloat($("#agosto__origen__restante").val()) + parseFloat($("#septiembre__origen__restante").val()) + parseFloat($("#octubre__origen__restante").val()) + parseFloat($("#noviembre__origen__restante").val()) + parseFloat($("#diciembre__origen__restante").val());


				sumaDestino1=parseFloat($("#enero__origen__destino").val()) + parseFloat($("#febrero__origen__destino").val()) + parseFloat($("#marzo__origen__destino").val()) + parseFloat($("#abril__origen__destino").val()) + parseFloat($("#mayo__origen__destino").val()) + parseFloat($("#junio__origen__destino").val()) + parseFloat($("#julio__origen__destino").val()) + parseFloat($("#agosto__origen__destino").val()) + parseFloat($("#septiembre__origen__destino").val()) + parseFloat($("#octubre__origen__destino").val()) + parseFloat($("#noviembre__origen__destino").val()) + parseFloat($("#diciembre__origen__destino").val());
				sumaDestino1Restante=parseFloat($("#enero__origen__restante__destino").val()) + parseFloat($("#febrero__origen__restante__destino").val()) + parseFloat($("#marzo__origen__restante__destino").val()) + parseFloat($("#abril__origen__restante__destino").val()) + parseFloat($("#mayo__origen__restante__destino").val()) + parseFloat($("#junio__origen__restante__destino").val()) + parseFloat($("#julio__origen__restante__destino").val()) + parseFloat($("#agosto__origen__restante__destino").val()) + parseFloat($("#septiembre__origen__restante__destino").val()) + parseFloat($("#octubre__origen__restante__destino").val()) + parseFloat($("#noviembre__origen__restante__destino").val()) + parseFloat($("#diciembre__origen__restante__destino").val());

				paqueteDeDatos.append('sumaOrigen1', parseFloat(sumaOrigen1).toFixed(2));
				paqueteDeDatos.append('sumaOrigen1Restante', parseFloat(sumaOrigen1Restante).toFixed(2));
				paqueteDeDatos.append('sumaDestino1', parseFloat(sumaDestino1).toFixed(2));
				paqueteDeDatos.append('sumaDestino1Restante', parseFloat(sumaDestino1Restante).toFixed(2));

				
				/*=====  End of Sumando Sumatores  ======*/

			}


			paqueteDeDatos.append('documento__justificacion', $('#documento__justificacion')[0].files[0]);
			paqueteDeDatos.append("origen_justificacion",origen_justificacion);
			paqueteDeDatos.append("tipo__empaquetado",origen_justificacion);
			paqueteDeDatos.append("identificadorPaginaReal",identificadorPaginaReal);
			
			/*=====  End of Campos  ======*/


			/*=======================================
			=            Destino sueldos            =
			=======================================*/

			if (identificadorPaginaReal!="sueldos" && identificadorPaginaReal!="desvinculacion") {

				var recorrerResultadosPredefinidos=function(clase,texto){

					var sumadorAtributos=0;

					$(clase).each(function(index) {

						sumadorAtributos=sumadorAtributos + parseFloat($(this).val());
							  
					});

					paqueteDeDatos.append(texto,sumadorAtributos);

				}

				recorrerResultadosPredefinidos($(".enlace__enero__destino"),"eneroDestino__sueldos");
				recorrerResultadosPredefinidos($(".enlace__febrero__destino"),"febreroDestino__sueldos");
				recorrerResultadosPredefinidos($(".enlace__marzo__destino"),"marzoDestino__sueldos");
				recorrerResultadosPredefinidos($(".enlace__abril__destino"),"abrilDestino__sueldos");
				recorrerResultadosPredefinidos($(".enlace__mayo__destino"),"mayoDestino__sueldos");
				recorrerResultadosPredefinidos($(".enlace__junio__destino"),"junioDestino__sueldos");
				recorrerResultadosPredefinidos($(".enlace__julio__destino"),"julioDestino__sueldos");
				recorrerResultadosPredefinidos($(".enlace__agosto__destino"),"agostoDestino__sueldos");
				recorrerResultadosPredefinidos($(".enlace__septiembre__destino"),"septiembreDestino__sueldos");
				recorrerResultadosPredefinidos($(".enlace__octubre__destino"),"octubreDestino__sueldos");
				recorrerResultadosPredefinidos($(".enlace__noviembre__destino"),"noviembreDestino__sueldos");
				recorrerResultadosPredefinidos($(".enlace__diciembre__destino"),"diciembreDestino__sueldos");
				paqueteDeDatos.append('totalMesAsignados__destinos', $('#totalMesAsignados__destinos').prop('value'));

				/*===============================
				=            Destino            =
				===============================*/
								
				paqueteDeDatos.append('enero__origen__aporte__patronal__ingresar__destino', $('#enero__origen__aporte__patronal__ingresar__destino').prop('value'));
				paqueteDeDatos.append('febrero__origen__aporte__patronal__ingresar__destino', $('#febrero__origen__aporte__patronal__ingresar__destino').prop('value'));
				paqueteDeDatos.append('marzo__origen__aporte__patronal__ingresar__destino', $('#marzo__origen__aporte__patronal__ingresar__destino').prop('value'));
				paqueteDeDatos.append('abril__origen__aporte__patronal__ingresar__destino', $('#abril__origen__aporte__patronal__ingresar__destino').prop('value'));
				paqueteDeDatos.append('mayo__origen__aporte__patronal__ingresar__destino', $('#mayo__origen__aporte__patronal__ingresar__destino').prop('value'));
				paqueteDeDatos.append('junio__origen__aporte__patronal__ingresar__destino', $('#junio__origen__aporte__patronal__ingresar__destino').prop('value'));
				paqueteDeDatos.append('julio__origen__aporte__patronal__ingresar__destino', $('#julio__origen__aporte__patronal__ingresar__destino').prop('value'));
				paqueteDeDatos.append('agosto__origen__aporte__patronal__ingresar__destino', $('#agosto__origen__aporte__patronal__ingresar__destino').prop('value'));
				paqueteDeDatos.append('septiembre__origen__aporte__patronal__ingresar__destino', $('#septiembre__origen__aporte__patronal__ingresar__destino').prop('value'));
				paqueteDeDatos.append('octubre__origen__aporte__patronal__ingresar__destino', $('#octubre__origen__aporte__patronal__ingresar__destino').prop('value'));
				paqueteDeDatos.append('noviembre__origen__aporte__patronal__ingresar__destino', $('#noviembre__origen__aporte__patronal__ingresar__destino').prop('value'));
				paqueteDeDatos.append('diciembre__origen__aporte__patronal__ingresar__destino', $('#diciembre__origen__aporte__patronal__ingresar__destino').prop('value'));

				paqueteDeDatos.append('enero__origen__decimo__tercero__ingresar__destino', $('#enero__origen__decimo__tercero__ingresar__destino').prop('value'));
				paqueteDeDatos.append('febrero__origen__decimo__tercero__ingresar__destino', $('#febrero__origen__decimo__tercero__ingresar__destino').prop('value'));
				paqueteDeDatos.append('marzo__origen__decimo__tercero__ingresar__destino', $('#marzo__origen__decimo__tercero__ingresar__destino').prop('value'));
				paqueteDeDatos.append('abril__origen__decimo__tercero__ingresar__destino', $('#abril__origen__decimo__tercero__ingresar__destino').prop('value'));
				paqueteDeDatos.append('mayo__origen__decimo__tercero__ingresar__destino', $('#mayo__origen__decimo__tercero__ingresar__destino').prop('value'));
				paqueteDeDatos.append('junio__origen__decimo__tercero__ingresar__destino', $('#junio__origen__decimo__tercero__ingresar__destino').prop('value'));
				paqueteDeDatos.append('julio__origen__decimo__tercero__ingresar__destino', $('#julio__origen__decimo__tercero__ingresar__destino').prop('value'));
				paqueteDeDatos.append('agosto__origen__decimo__tercero__ingresar__destino', $('#agosto__origen__decimo__tercero__ingresar__destino').prop('value'));
				paqueteDeDatos.append('septiembre__origen__decimo__tercero__ingresar__destino', $('#septiembre__origen__decimo__tercero__ingresar__destino').prop('value'));
				paqueteDeDatos.append('octubre__origen__decimo__tercero__ingresar__destino', $('#octubre__origen__decimo__tercero__ingresar__destino').prop('value'));
				paqueteDeDatos.append('noviembre__origen__decimo__tercero__ingresar__destino', $('#noviembre__origen__decimo__tercero__ingresar__destino').prop('value'));
				paqueteDeDatos.append('diciembre__origen__decimo__tercero__ingresar__destino', $('#diciembre__origen__decimo__tercero__ingresar__destino').prop('value'));

				paqueteDeDatos.append('enero__origen__decimo__cuarto__ingresar__destino', $('#enero__origen__decimo__cuarto__ingresar__destino').prop('value'));
				paqueteDeDatos.append('febrero__origen__decimo__cuarto__ingresar__destino', $('#febrero__origen__decimo__cuarto__ingresar__destino').prop('value'));
				paqueteDeDatos.append('marzo__origen__decimo__cuarto__ingresar__destino', $('#marzo__origen__decimo__cuarto__ingresar__destino').prop('value'));
				paqueteDeDatos.append('abril__origen__decimo__cuarto__ingresar__destino', $('#abril__origen__decimo__cuarto__ingresar__destino').prop('value'));
				paqueteDeDatos.append('mayo__origen__decimo__cuarto__ingresar__destino', $('#mayo__origen__decimo__cuarto__ingresar__destino').prop('value'));
				paqueteDeDatos.append('junio__origen__decimo__cuarto__ingresar__destino', $('#junio__origen__decimo__cuarto__ingresar__destino').prop('value'));
				paqueteDeDatos.append('julio__origen__decimo__cuarto__ingresar__destino', $('#julio__origen__decimo__cuarto__ingresar__destino').prop('value'));
				paqueteDeDatos.append('agosto__origen__decimo__cuarto__ingresar__destino', $('#agosto__origen__decimo__cuarto__ingresar__destino').prop('value'));
				paqueteDeDatos.append('septiembre__origen__decimo__cuarto__ingresar__destino', $('#septiembre__origen__decimo__cuarto__ingresar__destino').prop('value'));
				paqueteDeDatos.append('octubre__origen__decimo__cuarto__ingresar__destino', $('#octubre__origen__decimo__cuarto__ingresar__destino').prop('value'));
				paqueteDeDatos.append('noviembre__origen__decimo__cuarto__ingresar__destino', $('#noviembre__origen__decimo__cuarto__ingresar__destino').prop('value'));
				paqueteDeDatos.append('diciembre__origen__decimo__cuarto__ingresar__destino', $('#diciembre__origen__decimo__cuarto__ingresar__destino').prop('value'));

				paqueteDeDatos.append('enero__origen__fondos__de__reserva__ingresar__destino', $('#enero__origen__fondos__de__reserva__ingresar__destino').prop('value'));
				paqueteDeDatos.append('febrero__origen__fondos__de__reserva__ingresar__destino', $('#febrero__origen__fondos__de__reserva__ingresar__destino').prop('value'));
				paqueteDeDatos.append('marzo__origen__fondos__de__reserva__ingresar__destino', $('#marzo__origen__fondos__de__reserva__ingresar__destino').prop('value'));
				paqueteDeDatos.append('abril__origen__fondos__de__reserva__ingresar__destino', $('#abril__origen__fondos__de__reserva__ingresar__destino').prop('value'));
				paqueteDeDatos.append('mayo__origen__fondos__de__reserva__ingresar__destino', $('#mayo__origen__fondos__de__reserva__ingresar__destino').prop('value'));
				paqueteDeDatos.append('junio__origen__fondos__de__reserva__ingresar__destino', $('#junio__origen__fondos__de__reserva__ingresar__destino').prop('value'));
				paqueteDeDatos.append('julio__origen__fondos__de__reserva__ingresar__destino', $('#julio__origen__fondos__de__reserva__ingresar__destino').prop('value'));
				paqueteDeDatos.append('julio__origen__fondos__de__reserva__ingresar__destino', $('#julio__origen__fondos__de__reserva__ingresar__destino').prop('value'));
				paqueteDeDatos.append('agosto__origen__fondos__de__reserva__ingresar__destino', $('#agosto__origen__fondos__de__reserva__ingresar__destino').prop('value'));
				paqueteDeDatos.append('septiembre__origen__fondos__de__reserva__ingresar__destino', $('#septiembre__origen__fondos__de__reserva__ingresar__destino').prop('value'));
				paqueteDeDatos.append('octubre__origen__fondos__de__reserva__ingresar__destino', $('#octubre__origen__fondos__de__reserva__ingresar__destino').prop('value'));
				paqueteDeDatos.append('noviembre__origen__fondos__de__reserva__ingresar__destino', $('#noviembre__origen__fondos__de__reserva__ingresar__destino').prop('value'));
				paqueteDeDatos.append('diciembre__origen__fondos__de__reserva__ingresar__destino', $('#diciembre__origen__fondos__de__reserva__ingresar__destino').prop('value'));

				paqueteDeDatos.append('enero__origen__salarios__ingresar__destino', $('#enero__origen__salarios__ingresar__destino').prop('value'));
				paqueteDeDatos.append('febrero__origen__salarios__ingresar__destino', $('#febrero__origen__salarios__ingresar__destino').prop('value'));
				paqueteDeDatos.append('marzo__origen__salarios__ingresar__destino', $('#marzo__origen__salarios__ingresar__destino').prop('value'));
				paqueteDeDatos.append('abril__origen__salarios__ingresar__destino', $('#abril__origen__salarios__ingresar__destino').prop('value'));
				paqueteDeDatos.append('mayo__origen__salarios__ingresar__destino', $('#mayo__origen__salarios__ingresar__destino').prop('value'));
				paqueteDeDatos.append('junio__origen__salarios__ingresar__destino', $('#junio__origen__salarios__ingresar__destino').prop('value'));
				paqueteDeDatos.append('julio__origen__salarios__ingresar__destino', $('#julio__origen__salarios__ingresar__destino').prop('value'));
				paqueteDeDatos.append('agosto__origen__salarios__ingresar__destino', $('#agosto__origen__salarios__ingresar__destino').prop('value'));
				paqueteDeDatos.append('septiembre__origen__salarios__ingresar__destino', $('#septiembre__origen__salarios__ingresar__destino').prop('value'));
				paqueteDeDatos.append('octubre__origen__salarios__ingresar__destino', $('#octubre__origen__salarios__ingresar__destino').prop('value'));
				paqueteDeDatos.append('noviembre__origen__salarios__ingresar__destino', $('#noviembre__origen__salarios__ingresar__destino').prop('value'));
				paqueteDeDatos.append('diciembre__origen__salarios__ingresar__destino', $('#diciembre__origen__salarios__ingresar__destino').prop('value'));

				paqueteDeDatos.append('enero__origen__restante__destino', $('#enero__origen__restante__destino').prop('value'));
				paqueteDeDatos.append('febrero__origen__restante__destino', $('#febrero__origen__restante__destino').prop('value'));
				paqueteDeDatos.append('marzo__origen__restante__destino', $('#marzo__origen__restante__destino').prop('value'));
				paqueteDeDatos.append('abril__origen__restante__destino', $('#abril__origen__restante__destino').prop('value'));
				paqueteDeDatos.append('mayo__origen__restante__destino', $('#mayo__origen__restante__destino').prop('value'));
				paqueteDeDatos.append('junio__origen__restante__destino', $('#junio__origen__restante__destino').prop('value'));
				paqueteDeDatos.append('julio__origen__restante__destino', $('#julio__origen__restante__destino').prop('value'));
				paqueteDeDatos.append('agosto__origen__restante__destino', $('#agosto__origen__restante__destino').prop('value'));
				paqueteDeDatos.append('septiembre__origen__restante__destino', $('#septiembre__origen__restante__destino').prop('value'));
				paqueteDeDatos.append('octubre__origen__restante__destino', $('#octubre__origen__restante__destino').prop('value'));
				paqueteDeDatos.append('noviembre__origen__restante__destino', $('#noviembre__origen__restante__destino').prop('value'));
				paqueteDeDatos.append('diciembre__origen__restante__destino', $('#diciembre__origen__restante__destino').prop('value'));
								
								
				/*=====  End of Destino  ======*/

				/*===============================
				=            Avaluos            =
				===============================*/
				
				paqueteDeDatos.append('total__origen__patronal__totales__ingresados__destino', $('#total__origen__patronal__totales__ingresados__destino').prop('value'));
				paqueteDeDatos.append('total__origen__decimo__tercero__totales__ingresados__destino', $('#total__origen__decimo__tercero__totales__ingresados__destino').prop('value'));
				paqueteDeDatos.append('total__origen__decimo__cuarto__totales__ingresados__destino', $('#total__origen__decimo__cuarto__totales__ingresados__destino').prop('value'));
				paqueteDeDatos.append('total__origen__fondos__de__reserva__totales__ingresados__destino', $('#total__origen__fondos__de__reserva__totales__ingresados__destino').prop('value'));
				paqueteDeDatos.append('total__origen__salarios__totales__ingresados__destino', $('#total__origen__salarios__totales__ingresados__destino').prop('value'));
				

				paqueteDeDatos.append('total__origen__patronal__totales__ingresados', $('#total__origen__patronal__totales__ingresados').prop('value'));
				paqueteDeDatos.append('total__origen__decimo__tercero__totales__ingresados', $('#total__origen__decimo__tercero__totales__ingresados').prop('value'));
				paqueteDeDatos.append('total__origen__decimo__cuarto__totales__ingresados', $('#total__origen__decimo__cuarto__totales__ingresados').prop('value'));
				paqueteDeDatos.append('total__origen__fondos__de__reserva__totales__ingresados', $('#total__origen__fondos__de__reserva__totales__ingresados').prop('value'));
				paqueteDeDatos.append('total__origen__salarios__totales__ingresados', $('#total__origen__salarios__totales__ingresados').prop('value'));

				/*=====  End of Avaluos  ======*/
				
				/*=========================================
				=            Sumando Sumatores            =
				=========================================*/
				
				let sumaOrigen1=0;
				let sumaDestino1=0;

				let sumaOrigen1Restante=0;
				let sumaDestino1Restante=0;

				sumaOrigen1=parseFloat($("#enero__origen").val()) + parseFloat($("#febrero__origen").val()) + parseFloat($("#marzo__origen").val()) + parseFloat($("#abril__origen").val()) + parseFloat($("#mayo__origen").val()) + parseFloat($("#junio__origen").val()) + parseFloat($("#julio__origen").val()) + parseFloat($("#agosto__origen").val()) + parseFloat($("#septiembre__origen").val()) + parseFloat($("#octubre__origen").val()) + parseFloat($("#noviembre__origen").val()) + parseFloat($("#diciembre__origen").val());
				sumaOrigen1Restante=parseFloat($("#enero__origen__restante").val()) + parseFloat($("#febrero__origen__restante").val()) + parseFloat($("#marzo__origen__restante").val()) + parseFloat($("#abril__origen__restante").val()) + parseFloat($("#mayo__origen__restante").val()) + parseFloat($("#junio__origen__restante").val()) + parseFloat($("#julio__origen__restante").val()) + parseFloat($("#agosto__origen__restante").val()) + parseFloat($("#septiembre__origen__restante").val()) + parseFloat($("#octubre__origen__restante").val()) + parseFloat($("#noviembre__origen__restante").val()) + parseFloat($("#diciembre__origen__restante").val());


				sumaDestino1=parseFloat($("#enero__origen__destino").val()) + parseFloat($("#febrero__origen__destino").val()) + parseFloat($("#marzo__origen__destino").val()) + parseFloat($("#abril__origen__destino").val()) + parseFloat($("#mayo__origen__destino").val()) + parseFloat($("#junio__origen__destino").val()) + parseFloat($("#julio__origen__destino").val()) + parseFloat($("#agosto__origen__destino").val()) + parseFloat($("#septiembre__origen__destino").val()) + parseFloat($("#octubre__origen__destino").val()) + parseFloat($("#noviembre__origen__destino").val()) + parseFloat($("#diciembre__origen__destino").val());
				sumaDestino1Restante=parseFloat($("#enero__origen__restante__destino").val()) + parseFloat($("#febrero__origen__restante__destino").val()) + parseFloat($("#marzo__origen__restante__destino").val()) + parseFloat($("#abril__origen__restante__destino").val()) + parseFloat($("#mayo__origen__restante__destino").val()) + parseFloat($("#junio__origen__restante__destino").val()) + parseFloat($("#julio__origen__restante__destino").val()) + parseFloat($("#agosto__origen__restante__destino").val()) + parseFloat($("#septiembre__origen__restante__destino").val()) + parseFloat($("#octubre__origen__restante__destino").val()) + parseFloat($("#noviembre__origen__restante__destino").val()) + parseFloat($("#diciembre__origen__restante__destino").val());

				paqueteDeDatos.append('sumaOrigen1', parseFloat(sumaOrigen1).toFixed(2));
				paqueteDeDatos.append('sumaOrigen1Restante', parseFloat(sumaOrigen1Restante).toFixed(2));
				paqueteDeDatos.append('sumaDestino1', parseFloat(sumaDestino1).toFixed(2));
				paqueteDeDatos.append('sumaDestino1Restante', parseFloat(sumaDestino1Restante).toFixed(2));

				
				/*=====  End of Sumando Sumatores  ======*/

				if (identificadorPaginaReal=="honorarios") {
					paqueteDeDatos.append('persona_sueldos_data', $('#persona_honorarios_data').prop('value'));
				}else{
					paqueteDeDatos.append('persona_sueldos_data', $('#item__modificaciones__destino__modificaciones2_o').prop('value'));
				}

			}
			
			/*=====  End of Destino sueldos  ======*/
			
			if ($("#actividad__modificaciones__destino__modificaciones2__seleccion").val()=="desvinculacionD") {


				let eneroDesvinculacion__sumando=$("#eneroDesvinculacion__sumando").val();
				let febreroDesvinculacion__sumando=$("#febreroDesvinculacion__sumando").val();
				let marzoDesvinculacion__sumando=$("#marzoDesvinculacion__sumando").val();
				let abrilDesvinculacion__sumando=$("#abrilDesvinculacion__sumando").val();
				let mayoDesvinculacion__sumando=$("#mayoDesvinculacion__sumando").val();
				let junioDesvinculacion__sumando=$("#junioDesvinculacion__sumando").val();
				let julioDesvinculacion__sumando=$("#julioDesvinculacion__sumando").val();
				let agostoDesvinculacion__sumando=$("#agostoDesvinculacion__sumando").val();
				let septiembreDesvinculacion__sumando=$("#septiembreDesvinculacion__sumando").val();
				let octubreDesvinculacion__sumando=$("#octubreDesvinculacion__sumando").val();
				let noviembreDesvinculacion__sumando=$("#noviembreDesvinculacion__sumando").val();
				let diciembreDesvinculacion__sumando=$("#diciembreDesvinculacion__sumando").val();
				let desvinculacion__modificaciones=$("#desvinculacion__modificaciones").val();
				let totalDesvinculacion__sumar=$("#totalDesvinculacion__sumar").val();

				paqueteDeDatos.append("eneroDesvinculacion__sumando",eneroDesvinculacion__sumando);
				paqueteDeDatos.append("febreroDesvinculacion__sumando",febreroDesvinculacion__sumando);
				paqueteDeDatos.append("marzoDesvinculacion__sumando",marzoDesvinculacion__sumando);
				paqueteDeDatos.append("abrilDesvinculacion__sumando",abrilDesvinculacion__sumando);
				paqueteDeDatos.append("mayoDesvinculacion__sumando",mayoDesvinculacion__sumando);
				paqueteDeDatos.append("junioDesvinculacion__sumando",junioDesvinculacion__sumando);
				paqueteDeDatos.append("julioDesvinculacion__sumando",julioDesvinculacion__sumando);
				paqueteDeDatos.append("agostoDesvinculacion__sumando",agostoDesvinculacion__sumando);
				paqueteDeDatos.append("septiembreDesvinculacion__sumando",septiembreDesvinculacion__sumando);
				paqueteDeDatos.append("octubreDesvinculacion__sumando",octubreDesvinculacion__sumando);
				paqueteDeDatos.append("noviembreDesvinculacion__sumando",noviembreDesvinculacion__sumando);
				paqueteDeDatos.append("diciembreDesvinculacion__sumando",diciembreDesvinculacion__sumando);
				paqueteDeDatos.append("desvinculacion__modificaciones",desvinculacion__modificaciones);
				paqueteDeDatos.append("totalDesvinculacion__sumar",totalDesvinculacion__sumar);


			}

			/*==============================
			=            Orígen            =
			==============================*/
			
			let actividadOrigen=$("#actividad__modificaciones__destino__modificaciones2_o").val();
			let eventosOrigen=$("#eventos_intervencion_o").val();
			let idFinancierioOrigen=$("#item__modificaciones__destino__modificaciones2_o").val();
			let eneroOrigen=$("#eneroOrigen").val();
			let febreroOrigen=$("#febreroOrigen").val();
			let marzoOrigen=$("#marzoOrigen").val();
			let abrilOrigen=$("#abrilOrigen").val();
			let mayoOrigen=$("#mayoOrigen").val();
			let junioOrigen=$("#junioOrigen").val();
			let julioOrigen=$("#julioOrigen").val();
			let agostoOrigen=$("#agostoOrigen").val();
			let septiembreOrigen=$("#septiembreOrigen").val();
			let octubreOrigen=$("#octubreOrigen").val();
			let noviembreOrigen=$("#noviembreOrigen").val();
			let diciembreOrigen=$("#diciembreOrigen").val();
			let totalOrigen=$("#totalOrigen").val();

			let eneroOrigen__restando=$("#eneroOrigen__restando").val();
			let febreroOrigen__restando=$("#febreroOrigen__restando").val();
			let marzoOrigen__restando=$("#marzoOrigen__restando").val();
			let abrilOrigen__restando=$("#abrilOrigen__restando").val();
			let mayoOrigen__restando=$("#mayoOrigen__restando").val();
			let junioOrigen__restando=$("#junioOrigen__restando").val();
			let julioOrigen__restando=$("#julioOrigen__restando").val();
			let agostoOrigen__restando=$("#agostoOrigen__restando").val();
			let septiembreOrigen__restando=$("#septiembreOrigen__restando").val();
			let octubreOrigen__restando=$("#octubreOrigen__restando").val();
			let noviembreOrigen__restando=$("#noviembreOrigen__restando").val();
			let diciembreOrigen__restando=$("#diciembreOrigen__restando").val();

			paqueteDeDatos.append("actividadOrigen",actividadOrigen);
			paqueteDeDatos.append("eventosOrigen",eventosOrigen);
			paqueteDeDatos.append("idFinancierioOrigen",idFinancierioOrigen);
			paqueteDeDatos.append("eneroOrigen",eneroOrigen);
			paqueteDeDatos.append("febreroOrigen",febreroOrigen);
			paqueteDeDatos.append("marzoOrigen",marzoOrigen);
			paqueteDeDatos.append("abrilOrigen",abrilOrigen);
			paqueteDeDatos.append("mayoOrigen",mayoOrigen);
			paqueteDeDatos.append("junioOrigen",junioOrigen);
			paqueteDeDatos.append("julioOrigen",julioOrigen);
			paqueteDeDatos.append("agostoOrigen",agostoOrigen);
			paqueteDeDatos.append("septiembreOrigen",septiembreOrigen);
			paqueteDeDatos.append("octubreOrigen",octubreOrigen);
			paqueteDeDatos.append("noviembreOrigen",noviembreOrigen);
			paqueteDeDatos.append("diciembreOrigen",diciembreOrigen);
			paqueteDeDatos.append("totalOrigen",totalOrigen);
			paqueteDeDatos.append("eneroOrigen__restando",eneroOrigen__restando);
			paqueteDeDatos.append("febreroOrigen__restando",febreroOrigen__restando);
			paqueteDeDatos.append("marzoOrigen__restando",marzoOrigen__restando);
			paqueteDeDatos.append("abrilOrigen__restando",abrilOrigen__restando);
			paqueteDeDatos.append("mayoOrigen__restando",mayoOrigen__restando);
			paqueteDeDatos.append("junioOrigen__restando",junioOrigen__restando);
			paqueteDeDatos.append("julioOrigen__restando",julioOrigen__restando);
			paqueteDeDatos.append("agostoOrigen__restando",agostoOrigen__restando);
			paqueteDeDatos.append("septiembreOrigen__restando",septiembreOrigen__restando);
			paqueteDeDatos.append("octubreOrigen__restando",octubreOrigen__restando);
			paqueteDeDatos.append("noviembreOrigen__restando",noviembreOrigen__restando);
			paqueteDeDatos.append("diciembreOrigen__restando",diciembreOrigen__restando);
			
			/*=====  End of Orígen  ======*/
			
			/*===============================
			=            Destino            =
			===============================*/

			
			let actividadDestino=$("#actividad__modificaciones__destino__modificaciones2__seleccion").val();
			let eventosDestino=$("#eventos_intervencion__seleccion").val();
			let idFinancierioDestino=$("#item__modificaciones__destino__modificaciones2__seleccion").val();
			let eneroDestino=$("#eneroDestino").val();
			let febreroDestino=$("#febreroDestino").val();
			let marzoDestino=$("#marzoDestino").val();
			let abrilDestino=$("#abrilDestino").val();
			let mayoDestino=$("#mayoDestino").val();
			let junioDestino=$("#junioDestino").val();
			let julioDestino=$("#julioDestino").val();
			let agostoDestino=$("#agostoDestino").val();
			let septiembreDestino=$("#septiembreDestino").val();
			let octubreDestino=$("#octubreDestino").val();
			let noviembreDestino=$("#noviembreDestino").val();
			let diciembreDestino=$("#diciembreDestino").val();
			let totalDestino=$("#totalDestino").val();
			let eneroDestino__sumando=$("#eneroDestino__sumando").val();
			let febreroDestino__sumando=$("#febreroDestino__sumando").val();
			let marzoDestino__sumando=$("#marzoDestino__sumando").val();
			let abrilDestino__sumando=$("#abrilDestino__sumando").val();
			let mayoDestino__sumando=$("#mayoDestino__sumando").val();
			let junioDestino__sumando=$("#junioDestino__sumando").val();
			let julioDestino__sumando=$("#julioDestino__sumando").val();
			let agostoDestino__sumando=$("#agostoDestino__sumando").val();
			let septiembreDestino__sumando=$("#septiembreDestino__sumando").val();
			let octubreDestino__sumando=$("#octubreDestino__sumando").val();
			let noviembreDestino__sumando=$("#noviembreDestino__sumando").val();
			let diciembreDestino__sumando=$("#diciembreDestino__sumando").val();


			paqueteDeDatos.append("actividadDestino",actividadDestino);
			paqueteDeDatos.append("eventosDestino",eventosDestino);
			paqueteDeDatos.append("idFinancierioDestino",idFinancierioDestino);
			paqueteDeDatos.append("eneroDestino",eneroDestino);
			paqueteDeDatos.append("febreroDestino",febreroDestino);
			paqueteDeDatos.append("marzoDestino",marzoDestino);
			paqueteDeDatos.append("abrilDestino",abrilDestino);
			paqueteDeDatos.append("mayoDestino",mayoDestino);
			paqueteDeDatos.append("junioDestino",junioDestino);
			paqueteDeDatos.append("julioDestino",julioDestino);
			paqueteDeDatos.append("agostoDestino",agostoDestino);
			paqueteDeDatos.append("septiembreDestino",septiembreDestino);
			paqueteDeDatos.append("octubreDestino",octubreDestino);
			paqueteDeDatos.append("noviembreDestino",noviembreDestino);
			paqueteDeDatos.append("diciembreDestino",diciembreDestino);
			paqueteDeDatos.append("totalDestino",totalDestino);			
			paqueteDeDatos.append("eneroDestino__sumando",eneroDestino__sumando);
			paqueteDeDatos.append("febreroDestino__sumando",febreroDestino__sumando);
			paqueteDeDatos.append("marzoDestino__sumando",marzoDestino__sumando);
			paqueteDeDatos.append("abrilDestino__sumando",abrilDestino__sumando);
			paqueteDeDatos.append("mayoDestino__sumando",mayoDestino__sumando);
			paqueteDeDatos.append("junioDestino__sumando",junioDestino__sumando);
			paqueteDeDatos.append("julioDestino__sumando",julioDestino__sumando);
			paqueteDeDatos.append("agostoDestino__sumando",agostoDestino__sumando);
			paqueteDeDatos.append("septiembreDestino__sumando",septiembreDestino__sumando);
			paqueteDeDatos.append("octubreDestino__sumando",octubreDestino__sumando);
			paqueteDeDatos.append("noviembreDestino__sumando",noviembreDestino__sumando);
			paqueteDeDatos.append("diciembreDestino__sumando",diciembreDestino__sumando);			

			/*=====  End of Destino  ======*/
			
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
					alertify.notify("Acción realizada satisfactoriamente", "success", 5, function(){});

				    window.setTimeout(function(){ 

				    	location.reload();

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
				$("#guardarModificaciones__enviadas").show();
			}); 
		}); 		

	}else{

		alertify.set("notifier","position", "top-center");
		alertify.notify("El monto total del orígen debe ser igual al monto del destino", "error", 10, function(){}); 	

		$("#guardarModificaciones__enviadas").show();	

	}

});

});