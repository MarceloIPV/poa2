var cerrarbtnDesarrollo = function (boton, tabla) {
  $(boton).click(function (e) {
    $(tabla + " tr").remove();
  });
};

var cerrarSelectorDesarrollo = function (boton, selector) {
  $(boton).click(function (e) {
    $(selector + " option").remove();
  });
};

var cerrarDivsDesarrollo = function (boton, div) {
  $(boton).click(function (e) {
    $(div + " div").remove();
  });
};

var cerrarbtnSelectorDesarrollo = function (boton, divSelector, selector, divTablaVer,tablaVer) {
  $(boton).click(function (e) {
    $(selector + " option").remove();
    $(tablaVer + " tr").remove();

    $(divSelector).hide();
    $(divTablaVer).hide();
  });
};

var ocultarVariables2Desarrollo = function (parametro1,parametro2,parametro3) {
  $(parametro1).click(function (e) {
    $(parametro2).hide();
    $(parametro3).show();
  });
};

var ocultarVariablesSinBtnDesarrollo = function (parametro1) {
	
	  $(parametro1).hide();
	  
};

var MostrarVariablesSinBtnDesarrollo = function (parametro1) {
	
	 
	  $(parametro1).show();
	
};

var sumarIndicadores = function (parametro1, parametro2) {
  $(parametro1).on("input", function () {
    console.log("cesar");

    var sum = 0;
    $(parametro1).each(function () {
      sum += parseFloat($(this).val());
      
    });

    $(parametro2).val(sum.toFixed(2));    
    
  });
};



var sumarIndicadoresTotal = function (parametro1, parametro2) {
  
    var sum = 0;
    $(parametro1).each(function () {
      sum += parseFloat($(this).val());
    });

    $(parametro2).val(sum.toFixed(2));    
    

};



var multiplicarIndicadoresConSumaD = function (parametro1, parametro2,parametro3,parametro4) {
  $(parametro1).on("input", function () {   
    var mul = 1;
    var suma=0;

    $(parametro1).each(function () {
      mul *= parseFloat($(this).val());      
    });

    $(parametro2).val(mul.toFixed(2));
    $(parametro4).val((parseFloat($("#id_valor_jueces_PTC").val()))+(parseFloat($("#id_valor_comisionado_PTC").val()))+(parseFloat($("#id_valor_p_apoyo_PTC").val())));
  });
};


var multiplicarIndicadoresConSumaDA = function (parametro1, parametro2,parametro3,parametro4) {
  $(parametro1).on("input", function () {   
    var mul = 1;
    var suma=0;

    $(parametro1).each(function () {
      mul *= parseFloat($(this).val());      
    });

    $(parametro2).val(mul.toFixed(2));
    $(parametro4).val((parseFloat($("#subTotalUniformesUA").val()))+(parseFloat($("#subTotalCamisetasUA").val())));
    
  });
};



var multiplicarIndicadoresD = function (parametro1, parametro2) {
  $(parametro1).on("input", function () {
    console.log("cesar");
    

    var mul = 1;

    $(parametro1).each(function () {
      mul *= parseFloat($(this).val());
      
    });

    $(parametro2).val(mul.toFixed(2));
  });
};



var actualizaDatabletPorID = function (tabla) {
  tabla.DataTable().ajax.reload();
};

var actualizaDatabletPorIDBoton = function (boton,tabla) {
  $(boton).click(function (e) {

    $(tabla).DataTable().ajax.reload();
  });
};






var actualizaDatabletPorID1 = function (tabla,callback) {
  tabla.DataTable().ajax.reload();
  
  callback();
};

var limitarInputDateaIngresoActual = function (input) {
  $(input).attr("min", anoIngreso + "-01-01");
  $(input).attr("max", anoIngreso + "-12-31");
};

var restarIndicadoresDesarrollo = function (parametro1, parametro2, parametro3) {
  var val = parseFloat(parametro1);

  var sum = 0;

  $(parametro2).each(function () {
    sum += parseFloat($(parametro2).attr("valor"));
  });

  var res = val - sum;

  $(parametro3).attr("valor", res.toFixed(2));

  $(parametro3).text("$ " + res.toFixed(2));

};


var deshabilitarBtnPaidGeneral = function (input,boton,idModal,idModalError) {

  $(boton).on("mouseover",function(e){

    if($(input).attr("valor") == 0){

			$(boton).attr('data-bs-target', idModal)

		}else{
			$(boton).attr('data-bs-target', idModalError)
		}

  });
		

};

var ocultarBtnDesarrollo = function(parametro1,parametro2){

	$(parametro1).click(function (e) {

		
		$(parametro2).hide();
		
	  });
	
};



var obtenerLenghtDatatable = function (parametro1) {

	$(parametro1).DataTable().ajax.reload();

 	 var table = $(parametro1).DataTable().data().rows().count(); 
  
  	return table;
};



var cerrarbtnNuevoJN = function (boton) {

  $(boton).click(function (e) {
    
        $("#nomEvento").val("");
        $("#sede").val("");
        $("#istParticipante").val("0");
        $("#fechaInicioJN").val("");
        $("#fechaFinJN").val("");
        $("#nDeporte").val("0");
        $("#categoriaDesarrolloJN").val("0");
        $("#nDMujeres").val("0");
        $("#nDVarones").val("0");
        $("#nEntrenadores").val("0");
        $("#valorTotal").val("0");
        $("#observaciones").val("");
  });

};

var mostrarbtnEnviarPaid = function (boton) {

  $(boton).click(function (e) {
    
        if($("#montoPorAsignarPaidGeneralDesarrollo").attr("valor") == 0){
          $("#btnEnviarPAIDdesarrollo").show();
        }
  });

};




var obtenerDatosDeBtnContratacion = function(parametro1,parametro2){

	$(parametro1).click(function (e) {

		$(parametro2).attr('idComponentes',$(parametro1).attr('idComponentes'));
    $(parametro2).attr('idRubros', $(parametro1).attr('idRubros'));
    $(parametro2).attr('idAsignacion',$(parametro1).attr('idAsignacion'));
    $(parametro2).attr('identificador',$(parametro1).attr('identificador'));
    $(parametro2).attr('idItem',$(parametro1).attr('idItem'));
	
		
	  });
	
};


function validacionRegistro__retornables(parametro1){

	var condicion = $(parametro1).is(":checked");

	if (condicion) {
		return "si";
	}else{
		return "no";
	}

}

function checkCatalogoContraloria__desdeBase(condicion,parametro1,parametro2){

	if (condicion=='si') {
    $(parametro1).prop("checked", true);
    $(parametro2).show();
	}else{
    $(parametro2).hide();
	}

}

var ocultarBtnyDivDesarrollo = function(parametro1,parametro2,parametro3,parametro4){

	$(parametro1).click(function (e) {

		
		$(parametro1).hide();
    $(parametro2).show();
    $(parametro3).hide();
    $(parametro4).show();

		
	  });
	
};


function mostrar_divs_por_selector(parametro1){


  $(parametro1).on("change", function() {  

    $(".contednedor").html(" ");
    $(".contedor").append("");

    let valor=$(parametro1).val();

    if (valor == "Adecentamiento") {

      

      $("#divAdecentamiento").show();
      $("#divBienes").hide();
      $("#divMedicinas").hide();
      $("#divAlqEquipos").hide();
      $("#divComEquipos").hide();
      $("#divLogEvento").hide();
      $("#divPublicidad").hide();
      $("#divAcreditaciones").hide();

      crear_DataTable("paidAdecentameintoJN",datatabletsDesarolloCompleto, ["Nro","Item","Nombre item","Descripción/Justificación","Valor Total","Evento"])

      funcion__editar_Matrices_Generales("#paidAdecentameintoJN tbody",$("#paidAdecentameintoJN"),"#modalMatricesGeneralesAdecentamiento","tablaMatrizGeneralAdecentamiento","#idTituloModalGeneralesAdecentamiento","#guardarEditorMatricesGeneralesAdecentamiento");
  
  
    }else if (valor == "Bienes") {


      

      $("#divAdecentamiento").hide();
      $("#divBienes").show();
      $("#divMedicinas").hide();
      $("#divAlqEquipos").hide();
      $("#divComEquipos").hide();
      $("#divLogEvento").hide();
      $("#divPublicidad").hide();
      $("#divAcreditaciones").hide();


      crear_DataTable("paidBienesJN",datatabletsDesarolloCompleto, ["Nro","Item","Nombre item","Descripción/Justificación","Valor Total","Evento"])

      funcion__editar_Matrices_Generales("#paidBienesJN tbody",$("#paidBienesJN"),"#modalMatricesGeneralesBienes","tablaMatrizGeneralBienes","#idTituloModalGeneralesBienes","#guardarEditorMatricesGeneralesBienes");
     
  
    }else if (valor == "Medicinas") {

      

      $("#divAdecentamiento").hide();
      $("#divBienes").hide();
      $("#divMedicinas").show();
      $("#divAlqEquipos").hide();
      $("#divComEquipos").hide();
      $("#divLogEvento").hide();
      $("#divPublicidad").hide();
      $("#divAcreditaciones").hide();

      crear_DataTable("paidMedicinasJN",datatabletsDesarolloCompleto, ["Nro","Item","Nombre item","Descripción/Justificación","Valor Total","Evento"])

      funcion__editar_Matrices_Generales("#paidMedicinasJN tbody",$("#paidMedicinasJN"),"#modalMatricesGeneralesMedicinas","tablaMatrizGeneralMedicinas","#idTituloModalGeneralesMedicinas","#guardarEditorMatricesGeneralesMedicinas");
      
    }else if (valor == "Alquiler de Equipos") {

      

      $("#divAdecentamiento").hide();
      $("#divBienes").hide();
      $("#divMedicinas").hide();
      $("#divAlqEquipos").show();
      $("#divComEquipos").hide();
      $("#divLogEvento").hide();
      $("#divPublicidad").hide();
      $("#divAcreditaciones").hide();

      crear_DataTable("paidAlqEquiposJN",datatabletsDesarolloCompleto, ["Nro","Item","Nombre item","Descripción/Justificación","Valor Total","Evento"])

      funcion__editar_Matrices_Generales("#paidAlqEquiposJN tbody",$("#paidAlqEquiposJN"),"#modalMatricesGeneralesAlqEquipos","tablaMatrizGeneralAlqEquipos","#idTituloModalGeneralesAlqEquipos","#guardarEditorMatricesGeneralesAlqEquipos");
      


      
  
    }else if (valor == "Compra de Equipos") {

      
      $("#divAdecentamiento").hide();
      $("#divBienes").hide();
      $("#divMedicinas").hide();
      $("#divAlqEquipos").hide();
      $("#divComEquipos").show();
      $("#divLogEvento").hide();
      $("#divPublicidad").hide();
      $("#divAcreditaciones").hide();

      crear_DataTable("paidComEquiposJN",datatabletsDesarolloCompleto, ["Nro","Item","Nombre item","Descripción/Justificación","Valor Total","Evento"])


      funcion__editar_Matrices_Generales("#paidComEquiposJN tbody",$("#paidComEquiposJN"),"#modalMatricesGeneralesComEquipos","tablaMatrizGeneralComEquipos","#idTituloModalGeneralesComEquipos","#guardarEditorMatricesGeneralesComEquipos");
      
      
  
    }else if (valor == "Logística Evento") {

      
      $("#divAdecentamiento").hide();
      $("#divBienes").hide();
      $("#divMedicinas").hide();
      $("#divAlqEquipos").hide();
      $("#divComEquipos").hide();
      $("#divLogEvento").show();
      $("#divPublicidad").hide();
      $("#divAcreditaciones").hide();

      crear_DataTable("paidLogEventosJN",datatabletsDesarolloCompleto, ["Nro","Item","Nombre item","Descripción/Justificación","Valor Total","Evento"])

      funcion__editar_Matrices_Generales("#paidLogEventosJN tbody",$("#paidLogEventosJN"),"#modalMatricesGeneralesLogEventos","tablaMatrizGeneralLogEventos","#idTituloModalGeneralesLogEventos","#guardarEditorMatricesGeneralesLogEventos");
      
  
  
    }else if (valor == "Publicidad") {

    
      $("#divAdecentamiento").hide();
      $("#divBienes").hide();
      $("#divMedicinas").hide();
      $("#divAlqEquipos").hide();
      $("#divComEquipos").hide();
      $("#divLogEvento").hide();
      $("#divPublicidad").show();
      $("#divAcreditaciones").hide();

      crear_DataTable("paidPublicidadJN",datatabletsDesarolloCompleto, ["Nro","Item","Nombre item","Descripción/Justificación","Valor Total","Evento"])

      funcion__editar_Matrices_Generales("#paidPublicidadJN tbody",$("#paidPublicidadJN"),"#modalMatricesGeneralesPublicidad","tablaMatrizGeneralPublicidad","#idTituloModalGeneralesPublicidad","#guardarEditorMatricesGeneralesPublicidad");

      

    }else if (valor == "Acreditaciones") {

      $("#divAdecentamiento").hide();
      $("#divBienes").hide();
      $("#divMedicinas").hide();
      $("#divAlqEquipos").hide();
      $("#divComEquipos").hide();
      $("#divLogEvento").hide();
      $("#divPublicidad").hide();
      $("#divAcreditaciones").show();

      crear_DataTable("paidAcreditacionesJN",datatabletsDesarolloCompleto, ["Nro","Item","Nombre item","Descripción/Justificación","Cantidad","Valor Unitario","Valor Total","Evento"])

      funcion__editar_Matrices_Generales_Acreditaciones("#paidAcreditacionesJN tbody",$("#paidAcreditacionesJN"),"#modalMatricesGeneralesAcreditaciones","tablaMatrizGeneralAcreditaciones","#idTituloModalGeneralesAcreditacionesAcreditaciones","#guardarEditorMatricesGeneralesAcreditaciones");
      
    }else{
      $("#divAdecentamiento").hide();
      $("#divBienes").hide();
      $("#divMedicinas").hide();
      $("#divAlqEquipos").hide();
      $("#divComEquipos").hide();
      $("#divLogEvento").hide();
      $("#divPublicidad").hide();
      $("#divAcreditaciones").hide();
  
    }

  });

	

}



function mostrar_divs_por_selector_Hosp_Alim_Hid(parametro1){

  $(parametro1).on("change", function() {  

    let valor=$(parametro1).val();

    if (valor == "Hospedaje y Alimentación") {
      $("#selectDIDCT").show();
      $("#selectDIDCTHI").hide();
      $("#divHospAlimDI").hide();
      $("#divHospAlimDC").hide();
      $("#divHidratacionDI").hide();
      $("#divHidratacionDC").hide();
      $("#divDeporteDelegacionHospAlimJA").hide(); 
      $("#divDeporteDelegacionHidrJA").hide(); 
  
    }else if (valor == "Hidratación") {
      $("#selectDIDCT").hide();
      $("#selectDIDCTHI").show();
      $("#divHospAlimDI").hide();
      $("#divHospAlimDC").hide();
      $("#divHidratacionDI").hide();
      $("#divHidratacionDC").hide();
      $("#divDeporteDelegacionHospAlimJA").hide(); 
      $("#divDeporteDelegacionHidrJA").hide(); 
  
    }else{
      $("#divHospAlimDI").hide();
      $("#divHospAlimDC").hide();
      $("#divHidratacionDI").hide();
      $("#divHidratacionDC").hide();
      $("#divDeporteDelegacionHospAlimJA").hide(); 
      $("#divDeporteDelegacionHidrJA").hide(); 

    }      
    
  });
}


function mostrar_matrices_DI_DC_HOSP_ALIM(parametro1){

  $(parametro1).on("change", function() {  

    let valor=$(parametro1).val();

    if (valor == "Deporte Individual") {
      $("#divHospAlimDI").show();
      $("#divHospAlimDC").hide();  
      $("#divDeporteDelegacionHospAlimJA").hide(); 
      crear_DataTable("paidHospAlimDI",datatabletsDesarollo, ["Nro", "Item 1", "Item 2", "Provincia", "Nro. Cupos", "HOSP-ALIM", "Días", "Total HOSP- ALIM","Evento"])
    }else if (valor == "Deporte en Conjunto") {
      $("#divHospAlimDI").hide();
      $("#divHospAlimDC").show();
      $("#divDeporteDelegacionHospAlimJA").hide();
      crear_DataTable("paidHospAlimDC",datatabletsDesarollo, ["Nro", "Item 1", "Item 2", "Deporte En Conjunto", "Nro. Cupos", "HOSP-ALIM", "Días", "Total HOSP- ALIM","Evento"])
    }else if (valor == "Deporte-Delegacion-Hosp-Alim-JA") {
      $("#divHospAlimDI").hide();
      $("#divHospAlimDC").hide();
      $("#divDeporteDelegacionHospAlimJA").show();
      crear_DataTable("paidDeporteDelegacionHospAlimJA",datatabletsDesarollo, ["NroDelegacion", "Item 1", "Item 2", "Deporte-Delegación", "Nro. Cupos", "HOSP-ALIM", "Días", "Total HOSP- ALIM","Evento"])
    }else{
      $("#divHospAlimDI").hide();
      $("#divHospAlimDC").hide();
      $("#divDeporteDelegacionHospAlimJA").hide();
    }
  });
}

function mostrar_matrices_DI_DC_HIDR(parametro1){

  $(parametro1).on("change", function() {  

    let valor=$(parametro1).val();

    if (valor == "Deportes Individual") {
      $("#divHidratacionDI").show();
      $("#divHidratacionDC").hide();  
      $("#divDeporteDelegacionHidrJA").hide();       
      crear_DataTable("paidHidratacionDI",datatabletsDesarollo, ["Nro", "Item", "Provincia", "Nro. Cupos", "HIDRATACION", "Días", "Total HIDRATACION","Evento"])

    }else if (valor == "Deportes en Conjunto") {
      $("#divHidratacionDI").hide();
      $("#divHidratacionDC").show();
      $("#divDeporteDelegacionHidrJA").hide();
      crear_DataTable("paidHidratacionDC",datatabletsDesarollo, ["Nro", "Item", "Deporte En Conjunto", "Nro. Cupos", "HIDRATACION", "Días", "Total HIDRATACION","Evento"])

    }else if (valor == "Deporte-Delegacion-Hidratacion-JA") {
      $("#divHidratacionDI").hide();
      $("#divHidratacionDC").hide();
      $("#divDeporteDelegacionHidrJA").show();
      crear_DataTable("paidDeporteDelegacionHidrJA",datatabletsDesarollo, ["Nro", "Item", "Deporte-Delegación", "Nro. Cupos", "HIDRATACION", "Días", "Total HIDRATACION","Evento"])

    }else{
      $("#divHidratacionDI").hide();
      $("#divHidratacionDC").hide();
      $("#divDeporteDelegacionHidrJA").hide();
    }
  });
  
}



function mostrar_divs_por_selector_Seguros(parametro1){


  $(parametro1).on("change", function() {  

    let valor=$(parametro1).val();

    if (valor == "1") {

      crear_DataTable("paidSeguroDeporte",datatabletsDesarollo,["Nro","Item","Nombre Item","Deporte","Cantidad","Nro. Cupos","Valor Unitario","Valor Total","Evento"])

      $("#divSeguroDeporte").show();
      $("#divSeguroProvincia").hide();
  
    }else if (valor == "2") {

      $("#divSeguroDeporte").hide();
      $("#divSeguroProvincia").show();

      crear_DataTable("paidSeguroProvincia",datatabletsDesarollo,["Nro","Item","Nombre Item","Provincia","Cantidad","Nro. Cupos","Valor Unitario","Valor Total","Evento"])

  
    }else{

      $("#divSeguroDeporte").hide();
      $("#divSeguroProvincia").hide();


    }

  });

	

}


function mostrar_divs_por_selector_Transporte(parametro1){


  $(parametro1).on("change", function() {  

    let valor=$(parametro1).val();

    if (valor == "1") {

      crear_DataTable("paidTransporteDeporte",datatabletsDesarollo,["Nro","Item","Nombre Item","Deporte","Cantidad","Nro. Cupos","Valor Unitario","Valor Total","Evento"])

      $("#divTransporteDeporte").show();
      $("#divTransporteProvincia").hide();
  
    }else if (valor == "2") {

      $("#divTransporteDeporte").hide();
      $("#divTransporteProvincia").show();

      crear_DataTable("paidTransporteProvincia",datatabletsDesarollo,["Nro","Item","Nombre Item","Provincia","Cantidad","Nro. Cupos","Valor Unitario","Valor Total","Evento"])

 
    }else{

      $("#divTransporteDeporte").hide();
      $("#divTransporteProvincia").hide();


    }

  });

	

}




function crear_DataTable(idDatatable,nombreDatatable,listaTitulos){

  $("#"+idDatatable + " thead").remove();

  const myTable = document.getElementById(idDatatable);

  const thead = document.createElement("thead");
  const tr = document.createElement("tr");

  // create table header cells
  for (let i = 0; i < listaTitulos.length; i++) {
    const th = document.createElement("th");
    th.textContent = listaTitulos[i];
    tr.appendChild(th);
  }

  thead.appendChild(tr);

  
  myTable.insertAdjacentElement("beforeend", thead);
  

	nombreDatatable($("#"+idDatatable+""), idDatatable);

}


var mostrarinfoBotones = function(){

  

	$('.paid a').click(function() {

    localStorage.clear();
    localStorage.removeItem('idcomponentepaid');
    localStorage.removeItem('idrubropaid');

    var idComponente=$(this).attr("idcomponentepaid")
    var idrubro=$(this).attr("idrubropaid")
    
    localStorage.setItem('idrubro', idrubro);
    localStorage.setItem('idComponente', idComponente);

    
    AsignarIdRubroJN("obtener_idRubro_JN",$("#identificador").val());   

  });


};




function mostrar_divs_por_selector_unifomres_adaptados(parametro1){

  $(parametro1).on("change", function() {  

    let valor=$(parametro1).val();

    if (valor == "Uniformes") {
      $("#divUniformes").show();
      $("#iddivUniformes").show();
      $("#divIndumentariaPApoyo").hide();
      $("#iddivIndumentariaPApoyo").hide();
      crear_DataTable("paidUniformes",datatabletsDesarollo, ["Nro","Item","Deporte","Delegación","Valor Unitario", "Valor Total","Evento"]);
  
    }else if (valor == "Indumentaria Personal Apoyo") {
      $("#divUniformes").hide();
      $("#iddivUniformes").hide();
      $("#divIndumentariaPApoyo").show();
      $("#iddivIndumentariaPApoyo").show();
      crear_DataTable("paidIndumentariaPApoyo",datatabletsDesarollo, ["Nro","Item","Deporte","P. Apoyo","Valor Unitario", "Valor Total","Evento"]);
  
    }else{
      $("#divUniformes").hide();
      $("#iddivUniformes").hide();
      $("#divIndumentariaPApoyo").hide();
      $("#iddivIndumentariaPApoyo").hide();

    }      
    
  });
}








