var cerrarbtn = function (boton,tabla) {

    $(boton).click(function (e){
        $(tabla+" tr").remove(); 
    });
}

var cerrarSelector = function (boton,selector) {

	

    $(boton).click(function (e){
		
		$(selector+" option").remove(); 
		
    });
}


var cerrarDivs = function (boton,div) {

    $(boton).click(function (e){
		$(div+" div").remove(); 
    });
}


var cerrarbtnSelector = function (boton,divSelector,selector,divTablaVer,tablaVer) {

    $(boton).click(function (e){
        $(selector+" option").remove(); 
		$(tablaVer+" tr").remove(); 
		
        $(divSelector).hide();
        $(divTablaVer).hide();
    });
}


var ocultarVariables2=function(parametro1,parametro2, parametro3){

	$(parametro1).click(function(e){

		$(parametro2).hide();
        $(parametro3).show();
	});
}

var sumarIndicadoresGlobal__principal=function(parametro1,parametro2){

	$(parametro1).on('input', function () {

		console.log("cesar");

		var sum = 0;

		$(parametro1).each(function(){
		    sum += parseFloat($(this).val());
		});

		$(parametro2).val(sum.toFixed(2));

	});

}

var sumarIndicadoresAR=function(parametro1,parametro2){

	$(parametro1).on('input', function () {


		var sum = 0;

		$(parametro1).each(function(){
		    sum += parseFloat($(this).val());
		});

		$(parametro2).val(sum.toFixed(2));

	});

}



var multiplicarIndicadoresAR=function(parametro1,parametro2){

	$(parametro1).on('input', function () {

		console.log("cesar");

		var mul = 1;

		$(parametro1).each(function(){
		    mul *= parseFloat($(this).val());
		});

		$(parametro2).val(mul.toFixed(2));

	});

}



var limitarInputDateaIngresoActualAR=function(input){

	$(input).attr('min', anoIngreso+"-01-01");
	$(input).attr('max', anoIngreso+"-12-31");
    

}


var actualizarDatablePorIdAR=function(tabla){
    tabla.DataTable().ajax.reload();
}


var restarIndicadoresMontosEventosAR=function(parametro1,parametro2,parametro3){
	
	var val = parseFloat($(parametro1).attr("valor"));
	var sum=0;
	$(parametro2).each(function(){		
		sum += parseFloat($(parametro2).attr("valor"));		
	});
	var res= val - sum;	
	$(parametro3).attr("valor", res.toFixed(2));
	$(parametro3).text("$ " + res.toFixed(2));
}


var restarIndicadoresMontosInterdisciplinarioAR=function(parametro1,parametro2,parametro3){
	
	var val = parseFloat($(parametro1).attr("valor"));
	var sum=0;
	$(parametro2).each(function(){		
		sum += parseFloat($(parametro2).attr("valor"));		
	});
	var res= val - sum;	
	$(parametro3).attr("valor", res.toFixed(2));
	$(parametro3).text("$ " + $(parametro3).attr("valor"));
}



var restarIndicadoresGeneralAR=function(parametro1,parametro2,parametro3){
	
	var val = parseFloat(parametro1);
	var sum=0;
	$(parametro2).each(function(){		
		sum += parseFloat($(parametro2).attr("valor"));		
	});
	var res= val - sum;	
	$(parametro3).attr("valor", res.toFixed(2));
	$(parametro3).text("$ " + res.toFixed(2));
	$(parametro3).val(res.toFixed(2));

}

var deshabilitarBtnPaidGeneralAR = function (input,boton,idModal,idModalError) {

	$(boton).on("mouseover",function(e){

		if($(input).attr("valor") == 0){
	
				$(boton).attr('data-bs-target', idModal)
	
			}else{
				$(boton).attr('data-bs-target', idModalError)
			}
	
	  });
			

};

var sumarIndicadoresRubrosAR=function(parametro1,parametro2, parametro3){

	var sum = 0;

	$(parametro1).each(function(){
		sum += parseFloat($(this).val());
	
	});

	
	var tituloMonto = document.getElementById(parametro2);

	tituloMonto.setAttribute("valor",  sum.toFixed(2));

	tituloMonto.textContent= parametro3 + sum.toFixed(2);



}

var ocultarBtnyDivAR = function(parametro1,parametro2,parametro3,parametro4){

	$(parametro1).click(function (e) {

		
		$(parametro1).hide();
    $(parametro2).show();
    $(parametro3).hide();
    $(parametro4).show();

		
	  });
	
};


function checkCatalogoContraloria__desdeBase(condicion,parametro1,parametro2){

	if (condicion=='si') {
    $(parametro1).prop("checked", true);
    $(parametro2).show();
	}else{
    $(parametro2).hide();
	}

}

function validacionRegistro__retornables(parametro1){

	var condicion = $(parametro1).is(":checked");

	if (condicion) {
		return "si";
	}else{
		return "no";
	}

}


var mostrarbtnEnviarPaidAR = function (boton) {

	$(boton).click(function (e) {

		actualizarDatablePorIdAR($("#paidReporteGeneralAR"));

	  
		  if($("#montos_por_asignar_rubros").attr("valor") == 0){
			$("#btnEnviarPAIDAR").show();
		  }


	});
  
  };