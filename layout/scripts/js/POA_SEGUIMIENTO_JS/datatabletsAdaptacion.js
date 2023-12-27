/*=================================
=            Funciones            =
=================================*/

function datatabletsConfiguration(tabla,nombreDocumento){
    
    var table=$(tabla).DataTable({
    
        "language":{
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "No existen datos",
            "oPaginate":{
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excel',
                className: 'btn-excel',
                title: nombreDocumento,
                text: '<button  class="buttonD" ><i class="fas fa-file-excel" style="color: #277c41; font-size: 36px;" ></i></button>',
            },
        ],
        "bLengthChange": false,
        "pagingType": "full_numbers",
        "Paginate": true,
        "pagingType": "full_numbers",
        "retrieve": true, 
        "paging":false, 
        "pageLength":false,
        });
    
        return table;
    
    }
    
    /*=====  End of Funciones ======*/
    
    /*=============================================================
    =            Funcion tabla parametros distinguidos            =
    =============================================================*/
    
    function obtenerTrimestres(parametro5){
    
        var array=new Array();
    
        let valor1=0;
        let valor2=0;
        let valor3=0;
        let equiparable=" ";
    
    
        if (parametro5=="primerTrimestre") {
    
            valor1=z.enero;
            valor2=z.febrero;
            valor3=z.marzo;
            equiparable="Marzo";
    
        }else if (parametro5=="segundoTrimestre") {
    
            valor1=z.abril;
            valor2=z.mayo;
            valor3=z.junio;
            equiparable="Junio";
    
        }else if (parametro5=="tercerTrimestre") {
    
            valor1=z.julio;
            valor2=z.agosto;
            valor3=z.septiembre;
            equiparable="Septiembre";
    
        }else if (parametro5=="cuartoTrimestre") {
    
            valor1=z.octubre;
            valor2=z.noviembre;
            valor3=z.diciembre;
            equiparable="Diciembre";
    
        }
    
        array.push(valor1);	
        array.push(valor2);	
        array.push(valor3);	
        array.push(equiparable);	
    
        return array;
    
    }
    
    /*=====  End of Funcion tabla parametros distinguidos  ======*/
    


/*=====  End of Funcion tabla parametros distinguidos  ======*/

/*=============================================================
=        Funcion tabla parametros INDICADORSES       =
=============================================================*/

// function obtenerTrimestresIndicadores(parametro5){

// 	var array=new Array();

	
// 	let trimestresV="";

// 	if($("#trimestreEvaluador").val()=="primerTrimestre"){
// 		trimestresV=z.primertrimestre;
// 	}else if($("#trimestreEvaluador").val()=="segundoTrimestre"){
// 		trimestresV=z.segundotrimestre;
// 	}else if($("#trimestreEvaluador").val()=="tercerTrimestre"){
// 		trimestresV=z.tercertrimestre;
// 	}else if($("#trimestreEvaluador").val()=="cuartoTrimestre"){
// 		trimestresV=z.cuartotrimestre;
// 	}

	
// 	array.push(trimestresV);	

// 	return array;

// }

/*=====  End of Funcion tabla parametros distinguidos  ======*/

/*=============================================================
=        Funcion tabla parametros sueldos dsalalrios         =
=============================================================*/

function obtenerTrimestresSueldosSalarios(parametro5){

	var array=new Array();

	let valor1=0;
	let valor2=0;
	let valor3=0;

	let valor1__desahucio=0;
	let valor2__desahucio=0;
	let valor3__desahucio=0;

	let valor1__despido=0;
	let valor2__despido=0;
	let valor3__despido=0;

	let valor1__renuncia=0;
	let valor2__renuncia=0;
	let valor3__renuncia=0;

	let valor1__compensacion=0;
	let valor2__compensacion=0;
	let valor3__compensacion=0;

	let equiparable=" ";

	if (parametro5=="primerTrimestre") {
		valor1=z.enero;
		valor2=z.febrero;
		valor3=z.marzo;

		if (z.eneroDesahucio==null) {
			valor1__desahucio=0;
			valor2__desahucio=0;
			valor3__desahucio=0;	
		}else{
			valor1__desahucio=z.eneroDesahucio;
			valor2__desahucio=z.febreroDesahucio;
			valor3__desahucio=z.marzoDesahucio;
		}

		if (z.eneroDespido==null) {
			valor1__despido=0;
			valor2__despido=0;
			valor3__despido=0;	
		}else{
			valor1__despido=z.eneroDespido;
			valor2__despido=z.febreroDespido;
			valor3__despido=z.marzoDespido;	
		}

		if (z.eneroRenuncia==null) {
			valor1__renuncia=0;
			valor2__renuncia=0;
			valor3__renuncia=0;	
		}else{
			valor1__renuncia=z.eneroRenuncia;
			valor2__renuncia=z.febreroRenuncia;
			valor3__renuncia=z.marzoRenuncia;	
		}

		if (z.eneroCompensacion==null) {
			valor1__compensacion=0;
			valor2__compensacion=0;
			valor3__compensacion=0;	
		}else{
			valor1__compensacion=z.eneroCompensacion;
			valor2__compensacion=z.febreroCompensacion;
			valor3__compensacion=z.marzoCompensacion;
		}
		equiparable="Marzo";

	}else if (parametro5=="segundoTrimestre") {
		valor1=z.abril;
		valor2=z.mayo;
		valor3=z.junio;

		if (z.eneroDesahucio==null) {
			valor1__desahucio=0;
			valor2__desahucio=0;
			valor3__desahucio=0;	
		}else{
			valor1__desahucio=z.abrilDesahucio;
			valor2__desahucio=z.mayoDesahucio;
			valor3__desahucio=z.junioDesahucio;	
		}

		if (z.eneroDespido==null) {
			valor1__despido=0;
			valor2__despido=0;
			valor3__despido=0;	
		}else{
			valor1__despido=z.abrilDespido;
			valor2__despido=z.mayoDespido;
			valor3__despido=z.junioDespido;
		}

		if (z.eneroRenuncia==null) {
			valor1__renuncia=0;
			valor2__renuncia=0;
			valor3__renuncia=0;	
		}else{	
			valor1__renuncia=z.abrilRenuncia;
			valor2__renuncia=z.mayoRenuncia;
			valor3__renuncia=z.junioRenuncia;
		}

		if (z.eneroCompensacion==null) {
			valor1__compensacion=0;
			valor2__compensacion=0;
			valor3__compensacion=0;	
		}else{		
			valor1__compensacion=z.abrilCompensacion;
			valor2__compensacion=z.mayoCompensacion;
			valor3__compensacion=z.junioCompensacion;	
		}
		equiparable="Junio";

	}else if (parametro5=="tercerTrimestre") {
		valor1=z.julio;
		valor2=z.agosto;
		valor3=z.septiembre;

		if (z.eneroDesahucio==null) {
			valor1__desahucio=0;
			valor2__desahucio=0;
			valor3__desahucio=0;	
		}else{
			valor1__desahucio=z.julioDesahucio;
			valor2__desahucio=z.agostoDesahucio;
			valor3__desahucio=z.septiembreDesahucio;
		}

		if (z.eneroDespido==null) {
			valor1__despido=0;
			valor2__despido=0;
			valor3__despido=0;	
		}else{
			valor1__despido=z.julioDespido;
			valor2__despido=z.agostoDespido;
			valor3__despido=z.septiembreDespido;
		}

		if (z.eneroRenuncia==null) {
			valor1__renuncia=0;
			valor2__renuncia=0;
			valor3__renuncia=0;	
		}else{								
			valor1__renuncia=z.julioRenuncia;
			valor2__renuncia=z.agostoRenuncia;
			valor3__renuncia=z.septiembreRenuncia;	
		}

		if (z.eneroCompensacion==null) {
			valor1__compensacion=0;
			valor2__compensacion=0;
			valor3__compensacion=0;	
		}else{		
			valor1__compensacion=z.julioCompensacion;
			valor2__compensacion=z.agostoCompensacion;
			valor3__compensacion=z.septiembreCompensacion;	
		}
		equiparable="Septiembre";

	}else if (parametro5=="cuartoTrimestre") {
		valor1=z.octubre;
		valor2=z.noviembre;
		valor3=z.diciembre;

		if (z.eneroDesahucio==null) {
			valor1__desahucio=0;
			valor2__desahucio=0;
			valor3__desahucio=0;	
		}else{
			valor1__desahucio=z.octubreDesahucio;
			valor2__desahucio=z.noviembreDesahucio;
			valor3__desahucio=z.diciembreDesahucio;	
		}

		if (z.eneroDespido==null) {
			valor1__despido=0;
			valor2__despido=0;
			valor3__despido=0;	
		}else{
			valor1__despido=z.octubreDespido;
			valor2__despido=z.noviembreDespido;
			valor3__despido=z.diciembreDespido;	
		}

		if (z.eneroRenuncia==null) {
			valor1__renuncia=0;
			valor2__renuncia=0;
			valor3__renuncia=0;	
		}else{								
			valor1__renuncia=z.octubreRenuncia;
			valor2__renuncia=z.noviembreRenuncia;
			valor3__renuncia=z.diciembreRenuncia;	
		}

		if (z.eneroCompensacion==null) {
			valor1__compensacion=0;
			valor2__compensacion=0;
			valor3__compensacion=0;	
		}else{		
			valor1__compensacion=z.octubreCompensacion;
			valor2__compensacion=z.noviembreCompensacion;
			valor3__compensacion=z.diciembreCompensacion;	
		}
		equiparable="Diciembre";
	}

	
	array.push(valor1);	
	array.push(valor2);	
	array.push(valor3);	
	array.push(valor1__desahucio);	
	array.push(valor2__desahucio);	
	array.push(valor3__desahucio);	
	array.push(valor1__despido);	
	array.push(valor2__despido);	
	array.push(valor3__despido);	
	array.push(valor1__renuncia);	
	array.push(valor2__renuncia);	
	array.push(valor3__renuncia);	
	array.push(valor1__compensacion);	
	array.push(valor2__compensacion);	
	array.push(valor3__compensacion);	
	array.push(equiparable);	

	return array;

}

/*=====  End of Funcion tabla parametros distinguidos  ======*/


/*=========================================================
=            Funcion de armamento de la tablas            =
=========================================================*/

var visualizar__actividades__mantenimiento=function(informacionObtenida,table,parametro5,parametro1,parametro4){

    table.clear();
	for(z of informacionObtenida){

		var arrayRecibido=obtenerTrimestres(parametro5);

		/*===============================
		=            Destino            =
		===============================*/

		table.row.add([
				z.itemPreesupuestario,
				z.nombreItem,
				z.nombreInfras,
				z.tipoIntervencion,
				z.detallarTipoIn,
				z.tipoMantenimiento,
				z.materialesServicios,
				'<input type="checkbox" id="checked'+z.idMantenimiento+'" name="checked'+z.idMantenimiento+'" class="checkeds__dinamicos__mantenimiento"/>'
		]).draw(false);

		checkeds__recorridos__general_mantenimiento_presupuestario($(".checkeds__dinamicos__mantenimiento"),$("#checked"+z.idMantenimiento),$("#contadorIndicador2"),$("#trimestreEvaluador").val(),z.idMantenimiento,$(parametro1),$(parametro4),[z.idMantenimiento,z.totalTotales,arrayRecibido[0],arrayRecibido[1],arrayRecibido[2],z.totalTotales,z.esigef,z.totalCompletados,z.idItem],'mantenimiento__guardar','mantenimiento__guardar__facturas','mantenimiento__guardar__otros',false,125);	
					
	}

}


/*=====  End of Funcion de armamento de la tablas  ======*/

/*=========================================================
=           DATATABLES INDICADORES                  =
=========================================================*/

// var visualizar__actividades__indicadores=function(informacionObtenida,table,parametro5,parametro1,parametro4){

	
// 	let contador=1;
// 	for(z of informacionObtenida){

// 		let trimestresV="";

// 	if($("#trimestreEvaluador").val()=="primerTrimestre"){
// 		trimestresV=z.primertrimestre;
// 	}else if($("#trimestreEvaluador").val()=="segundoTrimestre"){
// 		trimestresV=z.segundotrimestre;
// 	}else if($("#trimestreEvaluador").val()=="tercerTrimestre"){
// 		trimestresV=z.tercertrimestre;
// 	}else if($("#trimestreEvaluador").val()=="cuartoTrimestre"){
// 		trimestresV=z.cuartotrimestre;
// 	}


// 		/*===============================
// 		=            Destino            =
// 		===============================*/

// 		table.row.add([
// 			z.idActividades,
// 			z.nombreActividades,				
// 			z.indicador,
// 			'<input type="text" id="totalProgramado'+z.idActividades+'" name="totalProgramado'+z.idActividades+'" value="'+arrayRecibido[0]+'" class="solo__numeros ancho__total__input text-center obligatorios" style="border:none;" disabled="disabled" />',
// 			'<input type="text" id="totalEjecutado'+z.idActividades+'" name="totalEjecutado'+z.idActividades+'" value="'+arrayRecibido[0]+'" class="solo__numeros ancho__total__input text-center obligatorios" />',
// 			'<div class="rotulo'+z.idActividades+'" style="text-align:center; widht:100%;"></div>',
// 			'<input type="file" accept="application/pdf" id="documentoSustento'+z.idActividades+'" name="documentoSustento'+z.idActividades+'" class="ancho__total__input obligatorios'+z.idActividades+'" />',
// 				'<a id="guardar'+z.idActividades+'" parametro7="'+parametro2+'" parametro8="'+$("#trimestreEvaluador").val()+'" name="guardar'+z.idActividades+'" idContador="'+z.idActividades+'" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i></a>'
// 		]).draw(false);
// 		contador++;

// 	}

// }


/*=====  End of Funcion de armamento de la tablas  ======*/


/*=========================================================
=           DATATABLES SUELDOS SALARIOS                  =
=========================================================*/
var visualizar__actividades__sueldos_salarios=function(informacionObtenida,table,parametro5,parametro1,parametro4){	
	
    //console.log("informacionObtenida")
    //console.log(informacionObtenida)
    let contador=1;
    table.clear();
	for(z of informacionObtenida){
		var arrayRecibido=obtenerTrimestresSueldosSalarios(parametro5);
		/*===============================
		=            Destino            =
		===============================*/
		table.row.add([
				//z.idSueldos,
				contador,				
				z.nombres,
				z.cedula,
				z.cargo,
				z.tipoCargo,
				z.tiempoTrabajo,
				'<input type="checkbox" id="checked'+z.idSueldos+'" name="checked'+z.idSueldos+'" class="checkeds__dinamicos__sueldos__salarios"/>'
		]).draw(false);

		checkeds__recorridos__sueldos__salarios2023($(".checkeds__dinamicos__sueldos__salarios"),$("#checked"+z.idSueldos),$("#contadorIndicador2"),$("#trimestreEvaluador").val(),z.idSueldos,$(parametro1),$(parametro4),[z.idSueldos,z.sueldoSalario,z.aportePatronal,z.decimoTercera,z.decimoCuarta,z.fondosReserva,arrayRecibido[0],arrayRecibido[1],arrayRecibido[2],z.total,arrayRecibido[3],arrayRecibido[4],arrayRecibido[5],arrayRecibido[6],arrayRecibido[7],arrayRecibido[8],arrayRecibido[9],arrayRecibido[10],arrayRecibido[11],arrayRecibido[12],arrayRecibido[13],arrayRecibido[14],z.mensualizaTercera,z.mensualizaCuarta,z.nombres,z.regimen]);		
		contador ++;
	}
}
/*=====  End of Funcion de armamento de la tablas  ======*/


/*================================================================================
    =            Funcion de armamento 001 Ejecucion presupuestaria 001           =
    ==============================================================================*/
    
    var visualizar__actividades__ejecucion__presupuestaria_001=function(informacionObtenida,table,parametro5,parametro1,parametro4){
        table.clear();
    
        for(z of informacionObtenida){
    
            var arrayRecibido=obtenerTrimestres(parametro5);
    
            /*===============================
            =            Destino            =
            ===============================*/
    
            table.row.add([
                    z.itemPreesupuestario,
                    z.nombreItem,
                    z.justificacionActividad,
                    z.cantidadBien,
                    '<input type="checkbox" id="checked'+z.idActividadAd+'" name="checked'+z.idActividadAd+'" class="checkeds__dinamicos__administrativos"/>'
            ]).draw(false);
    
            checkeds__recorridos__general_administrativo_presupuestario($(".checkeds__dinamicos__administrativos"),$("#checked"+z.idActividadAd),$("#contadorIndicador2"),$("#trimestreEvaluador").val(),z.idActividadAd,$(parametro1),$(parametro4),[z.idActividadAd,z.totalTotales,arrayRecibido[0],arrayRecibido[1],arrayRecibido[2],z.totalTotales,z.esigef,z.totalCompletados,z.idItem],'administrativos__seguimientos','facturas__administrativas','otros__administrativas');	        
            
            $(".filaIndicadora__administra"+z.idActividadAd).show();
        }
    
    }

/*================================================================================
    =            Funcion de armamento 001 Ejecucion presupuestaria 003           =
    ==============================================================================*/
    
    var visualizar__actividades__ejecucion__presupuestaria_003=function(informacionObtenida,table,parametro5,parametro1,parametro4){
    
        table.clear();
        for(z of informacionObtenida){
    
            var arrayRecibido=obtenerTrimestres(parametro5);
    
            /*===============================
            =            Destino            =
            ===============================*/
    
            table.row.add([
                z.itemPreesupuestario,
                z.nombreItem,
                z.tipoFinanciamiento,
                z.nombreEvento,
                z.detalleBien,
                z.justificacionAd,
                z.canitdarBie,
                '<input type="checkbox" id="checkeds__cpacitacion'+z.idPda+'" name="checkeds__cpacitacion'+z.idPda+'" class="checkeds__cpacitaciones"/>'
            ]).draw(false);
    
            checkeds__recorridos__general__capacitacion_presupuestaria($(".checkeds__cpacitaciones"),$("#checkeds__cpacitacion"+z.idPda),$("#contadorIndicador2"),$("#trimestreEvaluador").val(),z.idPda,$(parametro1),$(parametro4),[z.idPda,z.totalTotales,arrayRecibido[0],arrayRecibido[1],arrayRecibido[2],z.totalTotales,z.esigef,z.totalCompletados,z.idItem],'capacitacion__guardar','capacitacion__guardar__facturas','capacitacion__guardar__otros',1,158);        
            
            $(".filaIndicadora__mantenimiento__tecnicos"+z.idPda).show();
        }
    
    }

/*========================================================= =================
    =            Ejecucion presupuestaria 003 INFormCION TECNICA            =
    =========================================================================*/
    
    var visualizar__actividades__ejecucion__presupuestaria__informacion__tecnica__003=function(informacionObtenida,table,parametro5,parametro1,parametro4){
    
        table.clear();
        for(z of informacionObtenida){
    
            var arrayRecibido=obtenerTrimestres(parametro5);
    
            /*===============================
            =            Destino            =
            ===============================*/
    
            table.row.add([
                z.nombreEvento,
                z.nombreDeporte,
                z.nombreProvincia,
                z.paisNombre,
                z.genero,
                z.categoria,
                z.numeroEntreandores,
                z.numeroAtletas,
                z.total,
                z.mBenefici,
                z.hBenefici,
                '<input type="checkbox" id="checkeds__cpacitacion__tecnicas'+z.idPda+'" name="checkeds__cpacitacion__tecnicas'+z.idPda+'" class="checkeds__cpacitaciones__tecnicas"/>'
            ]).draw(false);
    
            checkeds__recorridos__general__tecnicos__matenimientos($(".checkeds__cpacitaciones__tecnicas"),$("#checkeds__cpacitacion__tecnicas"+z.idPda),$("#contadorIndicador2"),$("#trimestreEvaluador").val(),z.idPda,$(parametro1),$(parametro4),[z.idPda,z.totalTotales,arrayRecibido[0],arrayRecibido[1],arrayRecibido[3],z.totalTotales,z.esigef,z.totalCompletados,z.fechaInicio,z.fechaFin],'capacitacion__guardar','capacitacion__guardar__facturas','capacitacion__guardar__otros','otros__capacitacion__tecnicos','guardar__capacitacion__tecnicos',1);	      
            
            $(".filaIndicadora__mantenimiento__tecnicos"+z.idPda).show();
        }
    
    }

/*======================================
    =            HOnorarios            =
    ====================================*/
    
    var visualizar__actividades__honorarios=function(informacionObtenida,table,parametro5,parametro1,parametro4){
    
        let contador=1;
        table.clear();
        for(z of informacionObtenida){
    
            var arrayRecibido=obtenerTrimestres(parametro5);
    
            /*===============================
            =            Destino            =
            ===============================*/
    
            table.row.add([
                //z.idHonorarios,
                contador,
                z.nombreActividades,
                z.nombres,
                z.cedula,
                z.cargo,
                z.honorarioMensual,
                z.tipoCargo,
                '<input type="checkbox" id="checkedHonorarios'+z.idHonorarios+'" name="checkedHonorarios'+z.idHonorarios+'" class="checkeds__dinamicos__honorarios"/>'
            ]).draw(false);
    
            checkeds__recorridos__general__Honorarios($(".checkeds__dinamicos__honorarios"),$("#checkedHonorarios"+z.idHonorarios),$("#contadorIndicador2"),$("#trimestreEvaluador").val(),z.idHonorarios,$(parametro1),$(parametro4),[z.idHonorarios,z.totalTotales,arrayRecibido[0],arrayRecibido[1],arrayRecibido[2],z.totalTotales,z.esigef,z.totalCompletados],'honorarios__guardar','honorarios__guardar__facturas','honorarios__guardar__otros',false,126);      
            contador++;
            //$(".filaIndicadora__mantenimiento__tecnicos"+z.idPda).show();
        }
    
    }

/*==================================================================
    =            Eventos preparacion competencia EP 005            =
    ================================================================*/
    
    var visualizar__actividades__preparacion_competencia_EP_005=function(informacionObtenida,table,parametro5,parametro1,parametro4){
    
        let contador=0;
        table.clear();
        for(z of informacionObtenida){
    
            var arrayRecibido=obtenerTrimestres(parametro5);
    
            /*===============================
            =            Destino            =
            ===============================*/
    
            table.row.add([
                z.itemPreesupuestario,
                z.nombreItem,
                z.tipoFinanciamiento,
                z.nombreEvento,
                z.detalleBien,
                z.justificacionAd,
                z.canitdarBie,
                '<input type="checkbox" id="checkedsCompetencias'+z.idPda+'" name="checkedsCompetencias'+z.idPda+'" class="checkeds__Competencias"/>'
            ]).draw(false);
    
            checkeds__recorridos__general_competencia_presupuesto($(".checkeds__Competencias"),$("#checkedsCompetencias"+z.idPda),$("#contadorIndicador2"),$("#trimestreEvaluador").val(),z.idPda,$(parametro1),$(parametro4),[z.idPda,z.totalTotales,arrayRecibido[0],arrayRecibido[1],arrayRecibido[2],z.totalTotales,z.esigef,z.totalCompletados,z.idItem],'competencias__guardar','competencias__guardar__facturas','competencias__guardar__otros',1);

            $(".filaIndicadora__mantenimiento__tecnicos"+z.idPda).show();
        }
    
    }

/*==================================================================
    =            Eventos Alto rendimiento IT 005            =
    ================================================================*/
    
    var visualizar__actividades__alto__rendimiento_IT_005=function(informacionObtenida,table,parametro5,parametro1,parametro4){
    
        table.clear();
        for(z of informacionObtenida){
    
            var arrayRecibido=obtenerTrimestres(parametro5);
    
            /*===============================
            =            Destino            =
            ===============================*/
    
            table.row.add([
                z.nombreDeporte,
                z.tipoFinanciamiento,
                z.nombreEvento,
                z.paisNombre,
                z.nombreAlcanse,
                z.genero,
                z.categoria,
                z.numeroEntreandores,
                z.numeroAtletas,
                z.total,
                z.mBenefici,
                z.hBenefici,
                '<input type="checkbox" id="checkeds__competencia__alto'+z.idPda+'" name="checkeds__competencia__alto'+z.idPda+'" class="checkeds__competencia__alto"/>'
            ]).draw(false);
    
            checkeds__recorridos__general__tecnicos__matenimientos($(".checkeds__competencia__alto"),$("#checkeds__competencia__alto"+z.idPda),$("#contadorIndicador2"),$("#trimestreEvaluador").val(),z.idPda,$(parametro1),$(parametro4),[z.idPda,z.totalTotales,arrayRecibido[0],arrayRecibido[1],arrayRecibido[2],z.totalTotales,z.esigef,z.totalCompletados,z.fechaInicio,z.fechaFin,z.fechaInicio,z.fechaFin],'capacitacion__guardar','capacitacion__guardar__facturas','capacitacion__guardar__otros','otros__capacitacion__alto','guardar__capacitacion__alto',80);

            $(".filaIndicadora__mantenimiento__tecnicos"+z.idPda).show();
        }
    
    }

/*==================================================================
    =            Implementacion deportiva EP 007            =
    ================================================================*/
    
    var visualizar__actividades__aimplementacion_deportiva_EP_007=function(informacionObtenida,table,parametro5,parametro1,parametro4){
    
        table.clear();
        for(z of informacionObtenida){
    
            var arrayRecibido=obtenerTrimestres(parametro5);
    
            /*===============================
            =            Destino            =
            ===============================*/
    
            table.row.add([
                z.itemPreesupuestario,
                z.nombreItem,
                z.tipoFinanciamiento,
                z.nombreEvento,
                z.detalleBien,
                z.justificacionAd,
                z.canitdarBie,
                '<input type="checkbox" id="checkedsinstalaciones'+z.idPda+'" name="checkedsinstalaciones'+z.idPda+'" class="checkeds__instalaciones"/>'
            ]).draw(false);
    
            checkeds__recorridos__general_implementacion_deportiva($(".checkedsinstalaciones"),$("#checkedsinstalaciones"+z.idPda),$("#contadorIndicador2"),$("#trimestreEvaluador").val(),z.idPda,$(parametro1),$(parametro4),[z.idPda,z.totalTotales,arrayRecibido[0],arrayRecibido[1],arrayRecibido[2],z.totalTotales,z.esigef,z.totalCompletados,z.idItem],'implementacion__guardar','implementacion__guardar__facturas','implementacion__guardar__otros',1,425);

            $(".filaIndicadora__instalaciones__tecnicos"+z.idPda).show();
        }
    
    }

/*==================================================================
    =            MAntenimiento de escenarios EP 002            =
    ================================================================*/
    
    var visualizar__actividades__mantenimiento__escenarios__EP__002=function(informacionObtenida,table,parametro5,parametro1,parametro4){
    
        table.clear();
        for(z of informacionObtenida){
    
            var arrayRecibido=obtenerTrimestres(parametro5);
    
            /*===============================
            =            Destino            =
            ===============================*/
    
            table.row.add([
                //z.idMantenimiento,
                z.itemPreesupuestario,
                z.nombreItem,
                z.nombreInfras,
                z.tipoIntervencion,
                z.detallarTipoIn,
                z.tipoMantenimiento,
                z.materialesServicios,
                '<input type="checkbox" id="checked'+z.idMantenimiento+'" name="checked'+z.idMantenimiento+'" class="checkeds__dinamicos__mantenimiento"/>'
            ]).draw(false);
    
            checkeds__recorridos__general_mantenimiento_presupuestario($(".checkeds__dinamicos__mantenimiento"),$("#checked"+z.idMantenimiento),$("#contadorIndicador2"),$("#trimestreEvaluador").val(),z.idMantenimiento,$(parametro1),$(parametro4),[z.idMantenimiento,z.totalTotales,arrayRecibido[0],arrayRecibido[1],arrayRecibido[2],z.totalTotales,z.esigef,z.totalCompletados,z.idItem],'mantenimiento__guardar','mantenimiento__guardar__facturas','mantenimiento__guardar__otros',false,125);

            $(".filaIndicadora__mantenimiento"+z.idMantenimiento).show();
        }
    
    }

/*==================================================================
    =            MAntenimiento de escenarios IT 002            =
    ================================================================*/
    
    var visualizar__actividades__mantenimiento__escenarios__IT__002=function(informacionObtenida,table,parametro5,parametro1,parametro4){
    
        table.clear();
        for(z of informacionObtenida){
    
            var arrayRecibido=obtenerTrimestres(parametro5);
    
            /*===============================
            =            Destino            =
            ===============================*/
    
            table.row.add([
                //z.idMantenimiento,
                z.nombreInfras,
                z.provincia,
                z.direccionCompleta,
                z.estado,
                z.tipoRecursos,
                z.tipoIntervencion,
                z.detallarTipoIn,
                z.tipoMantenimiento,
                z.materialesServicios,
                z.fechaUltimo,
                '<input type="checkbox" id="checked__tecnicos'+z.idMantenimiento+'" name="checked__tecnicos'+z.idMantenimiento+'" class="checkeds__dinamicos__mantenimiento__checked"/>'
            ]).draw(false);
    
            checkeds__recorridos__general__tecnicos__matenimientos($(".checkeds__dinamicos__mantenimiento__checked"),$("#checked__tecnicos"+z.idMantenimiento),$("#contadorIndicador2"),$("#trimestreEvaluador").val(),z.idMantenimiento,$(parametro1),$(parametro4),[z.idMantenimiento,z.totalTotales,arrayRecibido[0],arrayRecibido[1],arrayRecibido[2],z.totalTotales,z.esigef,z.totalCompletados,z.fechaInicio,z.fechaFin],'mantenimiento__guardar','mantenimiento__guardar__facturas','mantenimiento__guardar__otros','otros__mantenimientos__tecnicos','filaIndicadora__administra',105);

            $(".filaIndicadora__mantenimiento__tecnicos"+z.idMantenimiento).show();
        }
    
    }

/*==================================================================
    =            Actividades Recreativas EP 006            =
    ================================================================*/
    
    var visualizar__actividades__actividades__recreativas__EP__006=function(informacionObtenida,table,parametro5,parametro1,parametro4){
    
        table.clear();
        for(z of informacionObtenida){
    
            var arrayRecibido=obtenerTrimestres(parametro5);
    
            /*===============================
            =            Destino            =
            ===============================*/
    
            table.row.add([
                //z.idPda,
                z.itemPreesupuestario,
                z.nombreItem,
                z.tipoFinanciamiento,
                z.nombreEvento,
                z.detalleBien,
                z.justificacionAd,
                z.canitdarBie,
                '<input type="checkbox" id="checkedsrecreativos'+z.idPda+'" name="checkedsrecreativos'+z.idPda+'" class="checkeds__recreativos"/>'
            ]).draw(false);
    
            checkeds__recorridos__general_recreativo_presupuestario($(".checkeds__recreativos"),$("#checkedsrecreativos"+z.idPda),$("#contadorIndicador2"),$("#trimestreEvaluador").val(),z.idPda,$(parametro1),$(parametro4),[z.idPda,z.totalTotales,arrayRecibido[0],arrayRecibido[1],arrayRecibido[2],z.totalTotales,z.esigef,z.totalCompletados,z.idItem],'recreativo__guardar','recreativo__guardar__facturas','recreativo__guardar__otros',1);

            $(".filaIndicadora__mantenimiento__tecnicos"+z.idPda).show();
        }
    
    }

/*==================================================================
    =            Actividades Recreativas IT 006            =
    ================================================================*/
    
    var visualizar__actividades__actividades__recreativas__IT__006=function(informacionObtenida,table,parametro5,parametro1,parametro4){
    
        table.clear();
        for(z of informacionObtenida){
    
            var arrayRecibido=obtenerTrimestres(parametro5);
    
            /*===============================
            =            Destino            =
            ===============================*/
    
            table.row.add([
                //z.idPda,
                z.nombreDeporte,
                z.tipoFinanciamiento,
                z.nombreEvento,
                z.nombreAlcanse,
                z.genero,
                z.categoria,
                z.numeroEntreandores,
                z.numeroAtletas,
                z.total,
                z.mBenefici,
                z.hBenefici,
                '<input type="checkbox" id="checkeds__recreativo__tecnico'+z.idPda+'" name="checkeds__recreativo__tecnico'+z.idPda+'" class="checkeds__recreativo__tecnico"/>'
            ]).draw(false);
    
            checkeds__recorridos__general__tecnicos__matenimientos__recreativo($(".checkeds__recreativo__tecnico"),$("#checkeds__recreativo__tecnico"+z.idPda),$("#contadorIndicador2"),$("#trimestreEvaluador").val(),z.idPda,$(parametro1),$(parametro4),[z.idPda,z.totalTotales,arrayRecibido[0],arrayRecibido[1],arrayRecibido[2],z.totalTotales,z.esigef,z.totalCompletados,z.fechaInicio,z.fechaFin,z.fechaInicio,z.fechaFin],'recreativo__guardar','recreativo__guardar__facturas','recreativo__guardar__otros','otros__recreativo__tecnicos','guardar__recreativo__tecnicos',4);

            $(".filaIndicadora__recreativos__tecnicos"+z.idPda).show();
        }
    
    }

    
/*==================================================================
    =            Eventos Deporte Formativo IT 005            =
    ================================================================*/
    
    var visualizar__actividades__deporte_formativo_IT_005=function(informacionObtenida,table,parametro5,parametro1,parametro4){
    
        table.clear();
        for(z of informacionObtenida){
    
            var arrayRecibido=obtenerTrimestres(parametro5);
    
            /*===============================
            =            Destino            =
            ===============================*/
    
            table.row.add([
                //z.idPda,
                z.nombreEvento,
                z.nombreDeporte,
                z.nombreProvincia,
                z.paisNombre,
                z.genero,
                z.categoria,
                z.numeroEntreandores,
                z.numeroAtletas,
                z.total,
                z.mBenefici,
                z.hBenefici,
                '<input type="checkbox" id="checkeds__competencia__formativas'+z.idPda+'" name="checkeds__competencia__formativas'+z.idPda+'" class="checkeds__competencia__formativas"/>'
            ]).draw(false);
    
            checkeds__recorridos__general__tecnicos__matenimientos($(".checkeds__competencia__formativas"),$("#checkeds__competencia__formativas"+z.idPda),$("#contadorIndicador2"),$("#trimestreEvaluador").val(),z.idPda,$(parametro1),$(parametro4),[z.idPda,z.totalTotales,arrayRecibido[0],arrayRecibido[1],arrayRecibido[2],z.totalTotales,z.esigef,z.totalCompletados,z.fechaInicio,z.fechaFin,z.fechaInicio,z.fechaFin],'capacitacion__guardar','capacitacion__guardar__facturas','capacitacion__guardar__otros','otros__capacitacion__formativos','guardar__capacitacion__formativos',2);

            $(".filaIndicadora__mantenimiento__tecnicos"+z.idPda).show();
        }
    
    }


/*==================================================================
    =            mantenimiento_presupuestario           =
    ================================================================*/

    var visualizar__actividades__mantenimiento_presupuestario=function(informacionObtenida,table,parametro5,parametro1,parametro4){

        table.clear();
        for(z of informacionObtenida){
    
            var arrayRecibido=obtenerTrimestres(parametro5);
    
            /*===============================
            =            Destino            =
            ===============================*/
    
            table.row.add([
                    z.itemPreesupuestario,
                    z.nombreItem,
                    z.nombreInfras,
                    z.tipoIntervencion,
                    z.detallarTipoIn,
                    z.tipoMantenimiento,
                    z.materialesServicios,
                    '<input type="checkbox" id="checked'+z.idMantenimiento+'" name="checked'+z.idMantenimiento+'" class="checkeds__dinamicos__mantenimiento"/>'
            ]).draw(false);
    
            checkeds__recorridos__general_mantenimiento_presupuestario($(".checkeds__dinamicos__mantenimiento"),$("#checked"+z.idMantenimiento),$("#contadorIndicador2"),$("#trimestreEvaluador").val(),z.idMantenimiento,$(parametro1),$(parametro4),[z.idMantenimiento,z.totalTotales,arrayRecibido[0],arrayRecibido[1],arrayRecibido[2],z.totalTotales,z.esigef,z.totalCompletados,z.idItem,z.idActividad],'mantenimiento__guardar','mantenimiento__guardar__facturas','mantenimiento__guardar__otros',false,125);	
                        
        }
    
    }

/*==================================================================
    =            capacitacion_PRESUPUESTARIO          =
    ================================================================*/

    var visualizar__actividades__mantenimiento__capacitacion_PRESUPUESTARIO=function(informacionObtenida,table,parametro5,parametro1,parametro4){

        table.clear();
        for(z of informacionObtenida){
    
            var arrayRecibido=obtenerTrimestres(parametro5);
    
            /*===============================
            =            Destino            =
            ===============================*/
    
            table.row.add([
                    z.itemPreesupuestario,
                    z.nombreItem,
                    z.tipoFinanciamiento,
                    z.nombreEvento,
                    z.detalleBien,
                    z.justificacionAd,
                    z.canitdarBie,
                    '<input type="checkbox" id="checkeds__cpacitacion'+z.idPda+'" name="checkeds__cpacitacion'+z.idPda+'" class="checkeds__cpacitaciones"/>'
            ]).draw(false);
    
           checkeds__recorridos__general__capacitacion_presupuestaria($(".checkeds__cpacitaciones"),$("#checkeds__cpacitacion"+z.idPda),$("#contadorIndicador2"),$("#trimestreEvaluador").val(),z.idPda,$(parametro1),$(parametro4),[z.idPda,z.totalTotales,arrayRecibido[0],arrayRecibido[1],arrayRecibido[2],z.totalTotales,z.esigef,z.totalCompletados,z.idItem, z.idActividad],'capacitacion__guardar','capacitacion__guardar__facturas','capacitacion__guardar__otros',1,158);		
                        
        }
    
    }

    /*==================================================================
    =            competencia_PRESUPUESTARIO        =
    ================================================================*/

    var visualizar__actividades__competencia_PRESUPUESTARIO=function(informacionObtenida,table,parametro5,parametro1,parametro4){

        table.clear();

        for(z of informacionObtenida){
    
            var arrayRecibido=obtenerTrimestres(parametro5);
    
            /*===============================
            =            Destino            =
            ===============================*/
    
            table.row.add([
                    z.itemPreesupuestario,
                    z.nombreItem,
                    z.tipoFinanciamiento,
                    z.nombreEvento,
                    z.detalleBien,
                    z.justificacionAd,
                    z.canitdarBie,
                    '<input type="checkbox" id="checkedsCompetencias'+z.idPda+'" name="checkedsCompetencias'+z.idPda+'" class="checkeds__Competencias"/>'
            ]).draw(false);
    
                        
           checkeds__recorridos__general_competencia_presupuesto($(".checkeds__Competencias"),$("#checkedsCompetencias"+z.idPda),$("#contadorIndicador2"),$("#trimestreEvaluador").val(),z.idPda,$(parametro1),$(parametro4),[z.idPda,z.totalTotales,arrayRecibido[0],arrayRecibido[1],arrayRecibido[2],z.totalTotales,z.esigef,z.totalCompletados,z.idItem,z.idActividad],'competencias__guardar','competencias__guardar__facturas','competencias__guardar__otros',1);	
        }
    
    }


        /*==================================================================
    =            recreativo_PRESUPUESTARIO     =
    ================================================================*/

    var visualizar__actividades__recreativo_PRESUPUESTARIO=function(informacionObtenida,table,parametro5,parametro1,parametro4){

        table.clear();
        for(z of informacionObtenida){
    
            var arrayRecibido=obtenerTrimestres(parametro5);
    
            /*===============================
            =            Destino            =
            ===============================*/
    
            table.row.add([
                    z.itemPreesupuestario,
                    z.nombreItem,
                    z.tipoFinanciamiento,
                    z.nombreEvento,
                    z.detalleBien,
                    z.justificacionAd,
                    z.canitdarBie,
                    '<input type="checkbox" id="checkedsrecreativos'+z.idPda+'" name="checkedsrecreativos'+z.idPda+'" class="checkeds__recreativos"/>'
            ]).draw(false);
    
                        

           checkeds__recorridos__general_recreativo_presupuestario($(".checkeds__recreativos"),$("#checkedsrecreativos"+z.idPda),$("#contadorIndicador2"),$("#trimestreEvaluador").val(),z.idPda,$(parametro1),$(parametro4),[z.idPda,z.totalTotales,arrayRecibido[0],arrayRecibido[1],arrayRecibido[2],z.totalTotales,z.esigef,z.totalCompletados,z.idItem, z.idActividad],'recreativo__guardar','recreativo__guardar__facturas','recreativo__guardar__otros',1);
        }
    
    }

    /*==================================================================
    =            administrativas_PRESUPUESTARIO     =
    ================================================================*/

    var visualizar__actividades__administrativas_PRESUPUESTARIO=function(informacionObtenida,table,parametro5,parametro1,parametro4){

        table.clear();

        for(z of informacionObtenida){
    
            var arrayRecibido=obtenerTrimestres(parametro5);
    
            /*===============================
            =            Destino            =
            ===============================*/
    
            table.row.add([
                    z.itemPreesupuestario,
                    z.nombreItem,
                    z.justificacionActividad,
                    z.cantidadBien,
                    '<input type="checkbox" id="checked'+z.idActividadAd+'" name="checked'+z.idActividadAd+'" class="checkeds__dinamicos__administrativos"/></center>'
            ]).draw(false);
    

           checkeds__recorridos__general_administrativo_presupuestario($(".checkeds__dinamicos__administrativos"),$("#checked"+z.idActividadAd),$("#contadorIndicador2"),$("#trimestreEvaluador").val(),z.idActividadAd,$(parametro1),$(parametro4),[z.idActividadAd,z.totalTotales,arrayRecibido[0],arrayRecibido[1],arrayRecibido[2],z.totalTotales,z.esigef,z.totalCompletados,z.idItem, z.idActividad],'administrativos__seguimientos','facturas__administrativas','otros__administrativas');	
        }
    
    }

        /*==================================================================
    =            honorarios__seguimientos_TECNICO     =
    ================================================================*/

    var visualizar__actividades__honorarios__seguimientos_TECNICO=function(informacionObtenida,table,parametro5,parametro1,parametro4){
        table.clear();
        var contador = 1;
        table.clear();
        for(z of informacionObtenida){
    
            var arrayRecibido=obtenerTrimestres(parametro5);
           
    
            /*===============================
            =            Destino            =
            ===============================*/
    
            table.row.add([
                    contador,
                    z.nombreActividades,
                    z.nombres,
                    z.cedula,
                    z.cargo,
                    z.honorarioMensual,
                    z.tipoCargo,
                    '<input type="checkbox" id="checkedHonorarios'+z.idHonorarios+'" name="checkedHonorarios'+z.idHonorarios+'" class="checkeds__dinamicos__honorarios"/>'
                    
            ]).draw(false);
    
	

           checkeds__recorridos__general__Honorarios($(".checkeds__dinamicos__honorarios"),$("#checkedHonorarios"+z.idHonorarios),$("#contadorIndicador2"),$("#trimestreEvaluador").val(),z.idHonorarios,$(parametro1),$(parametro4),[z.idHonorarios,z.totalTotales,arrayRecibido[0],arrayRecibido[1],arrayRecibido[2],z.totalTotales,z.esigef,z.totalCompletados,z.cedula, z.idActividad],'honorarios__guardar','honorarios__guardar__facturas','honorarios__guardar__otros',false,126);	

           contador++;
        }
    
    }

    
    /*==================================================================
    =            implementacion_TECNICO     =
    ================================================================*/

    var visualizar__actividades__implementacion_TECNICO=function(informacionObtenida,table,parametro5,parametro1,parametro4){



        table.clear();

        for(z of informacionObtenida){
    
            var arrayRecibido=obtenerTrimestres(parametro5);
           
    
            /*===============================
            =            Destino            =
            ===============================*/
    
            table.row.add([
                    z.itemPreesupuestario,
                    z.nombreItem,
                    z.tipoFinanciamiento,
                    z.nombreEvento,
                    z.detalleBien,
                    z.justificacionAd,
                    z.canitdarBie,
                    '<input type="checkbox" id="checkedsinstalaciones'+z.idPda+'" name="checkedsinstalaciones'+z.idPda+'" class="checkeds__instalaciones"/>'
                    
            ]).draw(false);
    
	

           checkeds__recorridos__general_implementacion_deportiva($(".checkedsinstalaciones"),$("#checkedsinstalaciones"+z.idPda),$("#contadorIndicador2"),$("#trimestreEvaluador").val(),z.idPda,$(parametro1),$(parametro4),[z.idPda,z.totalTotales,arrayRecibido[0],arrayRecibido[1],arrayRecibido[2],z.totalTotales,z.esigef,z.totalCompletados,z.idItem,z.idActividad],'implementacion__guardar','implementacion__guardar__facturas','implementacion__guardar__otros',1,425);

          
        }
    
    }

        /*==================================================================
    =            mantenimiento_TECNICO     =
    ================================================================*/

    var visualizar__actividades__mantenimiento_TECNICO=function(informacionObtenida,table,parametro5,parametro1,parametro4){



        table.clear();

        for(z of informacionObtenida){
    
            var arrayRecibido=obtenerTrimestres(parametro5);
           
    
            /*===============================
            =            Destino            =
            ===============================*/
    
            table.row.add([
                    z.nombreInfras,
                    z.provincia,
                    z.direccionCompleta,
                    z.estado,
                    z.tipoRecursos,
                    z.tipoIntervencion,
                    z.detallarTipoIn,
                    z.tipoMantenimiento,
                    z.materialesServicios,
                    z.fechaUltimo,
                    '<input type="checkbox" id="checked__tecnicos'+z.idMantenimiento+'" name="checked__tecnicos'+z.idMantenimiento+'" class="checkeds__dinamicos__mantenimiento__checked"/>'
                    
            ]).draw(false);

           checkeds__recorridos__general__tecnicos__matenimientos__escenarios($(".checkeds__dinamicos__mantenimiento__checked"),$("#checked__tecnicos"+z.idMantenimiento),$("#contadorIndicador2"),$("#trimestreEvaluador").val(),z.idMantenimiento,$(parametro1),$(parametro4),[z.idMantenimiento,z.totalTotales,arrayRecibido[0],arrayRecibido[1],arrayRecibido[3],z.totalTotales,z.esigef,z.totalCompletados,z.fechaInicio,z.fechaFin],'mantenimiento__guardar','mantenimiento__guardar__facturas','mantenimiento__guardar__otros','otros__mantenimientos__tecnicos','filaIndicadora__administra',105);

        }
    
    }

    /*==================================================================
    =            capacitacion__alto_TECNICO     =
    ================================================================*/

    var visualizar__actividades__capacitacion__alto_TECNICO1=function(informacionObtenida,table,parametro5,parametro1,parametro4){


        table.clear();


        for(z of informacionObtenida){
    
            var arrayRecibido=obtenerTrimestres(parametro5);
           
    
            /*===============================
            =            Destino            =
            ===============================*/
    
            table.row.add([
                    z.nombreDeporte,
                    z.tipoFinanciamiento,
                    z.nombreEvento,
                    z.paisNombre,
                    z.nombreAlcanse,
                    z.genero,
                    z.categoria,
                    z.numeroEntreandores,
                    z.numeroAtletas,
                    z.total,
                    z.mBenefici,
                    z.hBenefici,
                    z.fechaInicio,
                    z.fechaFin,
                    '<input type="checkbox" id="checkeds__competencia__alto'+z.idPda+'" name="checkeds__competencia__alto'+z.idPda+'" class="checkeds__competencia__alto"/>'
                    
            ]).draw(false);


           checkeds__recorridos__general__tecnicos__Alto($(".checkeds__competencia__alto"),$("#checkeds__competencia__alto"+z.idPda),$("#contadorIndicador2"),$("#trimestreEvaluador").val(),z.idPda,$(parametro1),$(parametro4),[z.idPda,z.totalTotales,arrayRecibido[0],arrayRecibido[1],arrayRecibido[3],z.totalTotales,z.esigef,z.totalCompletados,z.fechaInicio,z.fechaFin,z.fechaInicio,z.fechaFin],'capacitacion__guardar','capacitacion__guardar__facturas','capacitacion__guardar__otros','otros__capacitacion__alto','guardar__capacitacion__alto',80);


        
        }
    
    }


        /*==================================================================
    =            capacitacion__tecnico     =
    ================================================================*/

    var visualizar__actividades__capacitacion__tecnico=function(informacionObtenida,table,parametro5,parametro1,parametro4){



        table.clear();


        for(z of informacionObtenida){
    
            var arrayRecibido=obtenerTrimestres(parametro5);
           
    
            /*===============================
            =            Destino            =
            ===============================*/
    
            table.row.add([
                    z.nombreEvento,
                    z.nombreDeporte,
                    z.nombreProvincia,
                    z.paisNombre,
                    z.genero,
                    z.categoria,
                    z.numeroEntreandores,
                    z.numeroAtletas,
                    z.total,
                    z.mBenefici,
                    z.hBenefici,
                    '<input type="checkbox" id="checkeds__cpacitacion__tecnicas'+z.idPda+'" name="checkeds__cpacitacion__tecnicas'+z.idPda+'" class="checkeds__cpacitaciones__tecnicas"/>'
                    
            ]).draw(false);


           checkeds__recorridos__general__tecnicos__capacitaciones($(".checkeds__cpacitaciones__tecnicas"),$("#checkeds__cpacitacion__tecnicas"+z.idPda),$("#contadorIndicador2"),$("#trimestreEvaluador").val(),z.idPda,$(parametro1),$(parametro4),[z.idPda,z.totalTotales,arrayRecibido[0],arrayRecibido[1],arrayRecibido[3],z.totalTotales,z.esigef,z.totalCompletados,z.fechaInicio,z.fechaFin],'capacitacion__guardar','capacitacion__guardar__facturas','capacitacion__guardar__otros','otros__capacitacion__tecnicos','guardar__capacitacion__tecnicos',1);	



        
        }
    
    }

    /*==================================================================
    =            formativo_TECNICO     =
    ================================================================*/

    var visualizar__actividades__formativo_TECNICO=function(informacionObtenida,table,parametro5,parametro1,parametro4){



        table.clear();


        for(z of informacionObtenida){
    
            var arrayRecibido=obtenerTrimestres(parametro5);
           
    
            /*===============================
            =            Destino            =
            ===============================*/
    
            table.row.add([
                    z.nombreEvento,
                    z.nombreDeporte,
                    z.nombreProvincia,
                    z.paisNombre,
                    z.genero,
                    z.categoria,
                    z.numeroEntreandores,
                    z.numeroAtletas,
                    z.total,
                    z.mBenefici,
                    z.hBenefici,
                    z.fechaInicio,
                    z.fechaFin,
                    '<input type="checkbox" id="checkeds__competencia__formativas'+z.idPda+'" name="checkeds__competencia__formativas'+z.idPda+'" class="checkeds__competencia__formativas"/>'
                    
            ]).draw(false);



           checkeds__recorridos__general__tecnicos__Form($(".checkeds__competencia__formativas"),$("#checkeds__competencia__formativas"+z.idPda),$("#contadorIndicador2"),$("#trimestreEvaluador").val(),z.idPda,$(parametro1),$(parametro4),[z.idPda,z.totalTotales,arrayRecibido[0],arrayRecibido[1],arrayRecibido[3],z.totalTotales,z.esigef,z.totalCompletados,z.fechaInicio,z.fechaFin,z.fechaInicio,z.fechaFin],'capacitacion__guardar','capacitacion__guardar__facturas','capacitacion__guardar__otros','otros__capacitacion__formativos','guardar__capacitacion__formativos',2);	

        
        }
    
    }


        /*==================================================================
    =            recreativo__tecnicos     =
    ================================================================*/

    var visualizar__actividades__recreativo__tecnicos=function(informacionObtenida,table,parametro5,parametro1,parametro4){



        table.clear();

        for(z of informacionObtenida){
    
            var arrayRecibido=obtenerTrimestres(parametro5);
           
    
            /*===============================
            =            Destino            =
            ===============================*/
    
            table.row.add([
                    z.nombreDeporte,
                    z.tipoFinanciamiento,
                    z.nombreEvento,
                    z.paisNombre,
                    z.nombreAlcanse,
                    z.genero,
                    z.categoria,
                    z.numeroEntreandores,
                    z.numeroAtletas,
                    z.total,
                    z.mBenefici,
                    z.hBenefici,
                    '<input type="checkbox" id="checkeds__recreativo__tecnico'+z.idPda+'" name="checkeds__recreativo__tecnico'+z.idPda+'" class="checkeds__recreativo__tecnico"/>'
                    
            ]).draw(false);


           checkeds__recorridos__general__tecnicos__matenimientos__recreativo($(".checkeds__recreativo__tecnico"),$("#checkeds__recreativo__tecnico"+z.idPda),$("#contadorIndicador2"),$("#trimestreEvaluador").val(),z.idPda,$(parametro1),$(parametro4),[z.idPda,z.totalTotales,arrayRecibido[0],arrayRecibido[1],arrayRecibido[3],z.totalTotales,z.esigef,z.totalCompletados,z.fechaInicio,z.fechaFin,z.fechaInicio,z.fechaFin],'recreativo__guardar','recreativo__guardar__facturas','recreativo__guardar__otros','otros__recreativo__tecnicos','guardar__recreativo__tecnicos',4);	

        
        }
    
    }



    /*==================================================================
    =            visor admiistrativo presupuestario     =
    ================================================================*/

    var visor__actividades__administrativas__presupuestario=function(informacionObtenida,table){

        table.clear();

        for(z of informacionObtenida){
    
            /*===============================
            =            Destino            =
            ===============================*/

            table.row.add([
                    z.mes,
                    z.itemPreesupuestario,
                    z.nombreItem,
                    '<div style="display:none;">'+z.mensualProgramado+'</div><input type="text" id="totalProgramado'+z.idAdministrativoSegui+'" name="totalProgramado'+z.idAdministrativoSegui+'" value="'+z.mensualProgramado+'" class="solo__numeros ancho__total__input text-center obligatorios'+z.idAdministrativoSegui+'" style="border:none;" disabled="disabled" />',
                    '<div style="display:none;">'+z.mensualEjecutado+'</div><div class="celdas'+z.idAdministrativoSegui+'"><input type="text" id="totalEjecutado'+z.idAdministrativoSegui+'" name="totalEjecutado'+z.idAdministrativoSegui+'" value="'+z.mensualEjecutado+'" class="solo__numeros ancho__total__input text-center obligatorios'+z.idAdministrativoSegui+'" readonly=""/></div>',
                    z.observaciones,
                    '<center><button class="btnFacturas btn btn-warning pointer__botones" item="'+z.itemPreesupuestario+'" mes="'+z.mes+'" trimestre="'+z.trimestre+'" idAdministrativo="'+z.idAdministrativo+'" idOrganismo="'+z.idOrganismo+'"  data-bs-toggle="modal" data-bs-target="#modalFacturasDocumentos"><i class="fas fa-file-invoice"></i></button></center>',
                    '<center><button class="btnDocumentos btn btn-warning pointer__botones" item="'+z.itemPreesupuestario+'" mes="'+z.mes+'" trimestre="'+z.trimestre+'" idAdministrativo="'+z.idAdministrativo+'" idOrganismo="'+z.idOrganismo+'"  data-bs-toggle="modal" data-bs-target="#modalFacturasDocumentos"><i class="fas fa-file"></i></button></center>',
                    '<nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor'+z.idAdministrativoSegui+'" name="eliminarInfor'+z.idAdministrativoSegui+'" idPrincipal="'+z.idAdministrativoSegui+'" idContador="'+z.idAdministrativoSegui+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav>'

            ]).draw(false);

            
	
                funcion__cambio__de__numero($("#totalEjecutado"+z.idAdministrativoSegui));
                funcion__solo__numero($(".solo__numeros"));
               
                $("#eliminarInfor"+z.idAdministrativoSegui).click(function(e) {
        

                    let idContador=$(this).attr('idContador');
                    let idPrincipal=$(this).attr('idPrincipal');

                    

                    funcion__eliminar__general(idPrincipal,'eliminar__adminsitrativos__seguimiento');
                    table.row($(this).closest('tr').index()).remove().draw();
                });	

        }
    
    }

    /*==================================================================
    =            visor mantenimiento presupuestario    =
    ================================================================*/

    var visor__actividades__mantenimiento__presupuestario=function(informacionObtenida,table){

        table.clear();

        for(z of informacionObtenida){
		
    
            /*===============================
            =            Destino            =
            ===============================*/

            table.row.add([
                    z.mes,
                    z.itemPreesupuestario,
                    z.nombreItem,
                    z.detallarTipoIn,
                    '<div style="display:none;">'+z.mensualProgramado+'</div><input type="text" id="totalProgramado'+z.idMantenimiento+'" name="totalProgramado'+z.idMantenimiento+'" value="'+z.mensualProgramado+'" class="solo__numeros ancho__total__input text-center obligatorios'+z.idMantenimiento+'" style="border:none;" disabled="disabled" />',
                    '<div style="display:none;">'+z.mensualEjecutado+'</div><div class="celdas'+z.idMantenimiento+'"><input type="text" id="totalEjecutado'+z.idMantenimiento+'" name="totalEjecutado'+z.idMantenimiento+'" value="'+z.mensualEjecutado+'" class="solo__numeros ancho__total__input text-center obligatorios'+z.idMantenimiento+'" readonly=""/></div>',
                    z.observaciones,
                    z.registra_Contratacion,
                    z.justificacion,
                    '<center><a class="btnFacturas btn btn-warning pointer__botones" item="'+z.itemPreesupuestario+'" mes="'+z.mes+'" trimestre="'+z.trimestre+'" idMantenimiento="'+z.idMantenimiento+'" idOrganismo="'+z.idOrganismo+'"  data-bs-toggle="modal" data-bs-target="#modalFacturasDocumentos"><i class="fas fa-file-invoice"></i></a></center>',
                    '<center><a class="btnDocumentos btn btn-warning pointer__botones" item="'+z.itemPreesupuestario+'" mes="'+z.mes+'" trimestre="'+z.trimestre+'" idAdministrativo="'+z.idMantenimiento+'" idOrganismo="'+z.idOrganismo+'"  data-bs-toggle="modal" data-bs-target="#modalFacturasDocumentos"><i class="fas fa-file"></i></i></a></center>',
                    '<nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor'+z.idMantenimiento+'" name="eliminarInfor'+z.idMantenimiento+'" idPrincipal="'+z.idMantenimiento+'" idContador="'+z.idMantenimiento+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav>'

            ]).draw(false);


            funcion__cambio__de__numero($("#totalEjecutado"+z.idMantenimiento));

            funcion__solo__numero($(".solo__numeros"));


            $("#eliminarInfor"+z.idMantenimiento).click(function(e) {

                let idContador=$(this).attr('idContador');
                let idPrincipal=$(this).attr('idPrincipal');

                $(".fila__seguis"+idContador).remove();
                
                funcion__eliminar__general(idContador,'eliminar__poa__mantenenimientos__nuevo');
                table.row($(this).closest('tr').index()).remove().draw();
            }); 
            
	   
            

        }
    
    }

    /*==================================================================
    =            visor capacitacion presupuestario    =
    ================================================================*/

    var visor__actividades__capacitacion__presupuestario=function(informacionObtenida,table){

        table.clear();

        for(z of informacionObtenida){
		
    
            /*===============================
            =            Destino            =
            ===============================*/

            table.row.add([
                    z.mes,
                    z.itemPreesupuestario,
                    z.nombreItem,
                    '<div style="display:none;">'+z.mensualProgramado+'</div><input type="text" id="totalProgramado'+z.idCapacitacion+'" name="totalProgramado'+z.idCapacitacion+'" value="'+z.mensualProgramado+'" class="solo__numeros ancho__total__input text-center obligatorios'+z.idCapacitacion+'" style="border:none;" disabled="disabled" />',
                    '<div style="display:none;">'+z.mensualEjecutado+'</div><div class="celdas'+z.idCapacitacion+'"><input type="text" id="totalEjecutado'+z.idCapacitacion+'" name="totalEjecutado'+z.idCapacitacion+'" value="'+z.mensualEjecutado+'" class="solo__numeros ancho__total__input text-center obligatorios'+z.idCapacitacion+'" readonly=""/></div>',
                    z.observaciones,
                    z.cantidadBienes,
                    z.registra_Contratacion,
                    z.justificacion,
                    '<center><a class="btnFacturas btn btn-warning pointer__botones" item="'+z.itemPreesupuestario+'" mes="'+z.mes+'" trimestre="'+z.trimestre+'" idCapacitacion="'+z.idCapacitacion+'" idOrganismo="'+z.idOrganismo+'"  data-bs-toggle="modal" data-bs-target="#modalFacturasDocumentos"><i class="fas fa-file-invoice"></i></a></center>',
                    '<center><a class="btnDocumentos btn btn-warning pointer__botones" item="'+z.itemPreesupuestario+'" mes="'+z.mes+'" trimestre="'+z.trimestre+'" idCapacitacion="'+z.idCapacitacion+'" idOrganismo="'+z.idOrganismo+'"  data-bs-toggle="modal" data-bs-target="#modalFacturasDocumentos"><i class="fas fa-file"></i></a></center>',
                    '<nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor'+z.idCapacitacion+'" name="eliminarInfor'+z.idCapacitacion+'" idPrincipal="'+z.idCapacitacion+'" idContador="'+z.idCapacitacion+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav>'

            ]).draw(false);


            $("#eliminarInfor"+z.idCapacitacion).click(function(e) {

                let idContador=$(this).attr('idContador');
                let idPrincipal=$(this).attr('idPrincipal');
                
                funcion__eliminar__general(idPrincipal,'eliminar__capacitacion__seguimiento__2');
                table.row($(this).closest('tr').index()).remove().draw();
            }); 


            
	   
            

        }
    
    }

            /*==================================================================
    =            visor honorarios    =
    ================================================================*/

    var visor__actividades__honorarios=function(informacionObtenida,table){

        table.clear();

        for(z of informacionObtenida){
		
    
            /*===============================
            =            Destino            =
            ===============================*/

            table.row.add([
                    z.mes,
                    z.cedula,
                    z.cargo,
                    z.nombres,
                    '<div style="display:none;">'+z.mensualProgramado+'</div><input type="text" id="mensualProgramado'+z.idHonorariosSeguimientos+'" name="mensualProgramado'+z.idHonorariosSeguimientos+'" value="'+z.mensualProgramado+'" class="solo__numeros ancho__total__input text-center obligatorios'+z.idHonorariosSeguimientos+'" style="border:none;" disabled="disabled" />',
                    '<div style="display:none;">'+z.mensualEjecutado+'</div><div class="celdas'+z.idHonorariosSeguimientos+'"><input type="text" id="mensualEjecutado'+z.idHonorariosSeguimientos+'" name="mensualEjecutado'+z.idHonorariosSeguimientos+'" value="'+z.mensualEjecutado+'" class="solo__numeros ancho__total__input text-center obligatorios'+z.idHonorariosSeguimientos+'" readonly=""/><div class="rotulo'+z.idHonorariosSeguimientos+'" style="text-align:center; widht:100%;"></div></div>',
                    z.observaciones,
                    '<center><a class="btnFacturas btn btn-warning pointer__botones" cedula="'+z.cedula+'" mes="'+z.mes+'" trimestre="'+z.trimestre+'" idHonorariosSeguimientos="'+z.idHonorariosSeguimientos+'" idOrganismo="'+z.idOrganismo+'"  data-bs-toggle="modal" data-bs-target="#modalFacturasDocumentos"><i class="fas fa-file-invoice"></i></a></center>',
                    '<center><a class="btnDocumentos btn btn-warning pointer__botones" cedula="'+z.cedula+'" mes="'+z.mes+'" trimestre="'+z.trimestre+'" idHonorariosSeguimientos="'+z.idHonorariosSeguimientos+'" idOrganismo="'+z.idOrganismo+'"  data-bs-toggle="modal" data-bs-target="#modalFacturasDocumentos"><i class="fas fa-file"></i></a></center>',
                    '<nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor'+z.idHonorariosSeguimientos+'" name="eliminarInfor'+z.idHonorariosSeguimientos+'" idPrincipal="'+z.idHonorariosSeguimientos+'" idContador="'+z.idHonorariosSeguimientos+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav>'

            ]).draw(false);

            $("#eliminarInfor"+z.idHonorariosSeguimientos).click(function(e) {

                let idContador=$(this).attr('idContador');
                let idPrincipal=$(this).attr('idPrincipal');
                
                funcion__eliminar__general(idPrincipal,'eliminar__honorarios__seguimiento');
                table.row($(this).closest('tr').index()).remove().draw();
            }); 


        }
    
    }
    
    /*==================================================================
    =            visor Competencias Presupuestario    =
    ================================================================*/

    var visor__actividades__competencia_presupuestario=function(informacionObtenida,table){

        table.clear();

        for(z of informacionObtenida){
		
    
            /*===============================
            =            Destino            =
            ===============================*/

            table.row.add([
                    z.mes,
                    z.nombreEvento,
                    z.itemPreesupuestario,
                    z.nombreItem,
                    '<div style="display:none;">'+z.mensualProgramado+'</div><input type="text" id="totalProgramado'+z.idCompetencias+'" name="totalProgramado'+z.idCompetencias+'" value="'+z.mensualProgramado+'" class="solo__numeros ancho__total__input text-center obligatorios'+z.idCompetencias+'" style="border:none;" disabled="disabled" />',
                    '<div style="display:none;">'+z.mensualEjecutado+'</div><div class="celdas'+z.idCompetencias+'"><input type="text" id="totalEjecutado'+z.idCompetencias+'" name="totalEjecutado'+z.idCompetencias+'" value="'+z.mensualEjecutado+'" class="solo__numeros ancho__total__input text-center obligatorios'+z.idCompetencias+'" readonly=""/></div>',
                    z.observaciones,
                    z.cantidadBienes,
                    z.registra_Contratacion,
                    z.justificacion,
                    '<center><a class="btnFacturas btn btn-warning pointer__botones" item="'+z.itemPreesupuestario+'" mes="'+z.mes+'" trimestre="'+z.trimestre+'" idCompetencias="'+z.idCompetencias+'" idOrganismo="'+z.idOrganismo+'"  data-bs-toggle="modal" data-bs-target="#modalFacturasDocumentos"><i class="fas fa-file-invoice"></i></a></center>',
                    '<center><a class="btnDocumentos btn btn-warning pointer__botones" item="'+z.itemPreesupuestario+'" mes="'+z.mes+'" trimestre="'+z.trimestre+'" idCompetencias="'+z.idCompetencias+'" idOrganismo="'+z.idOrganismo+'"  data-bs-toggle="modal" data-bs-target="#modalFacturasDocumentos"><i class="fas fa-file"></i></a></center>',
                    '<nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor'+z.idCompetencias+'" name="eliminarInfor'+z.idCompetencias+'" idPrincipal="'+z.idCompetencias+'" idContador="'+z.idCompetencias+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav>'

            ]).draw(false);

         

            
            $("#eliminarInfor"+z.idCompetencias).click(function(e) {

                let idContador=$(this).attr('idContador');
                let idPrincipal=$(this).attr('idPrincipal');
                
                funcion__eliminar__general(idPrincipal,'eliminar__competencias__seguimiento');
                table.row($(this).closest('tr').index()).remove().draw();
            }); 

      


        }
    
    }

    /*==================================================================
    =            visor Recreativo Presupuestario    =
    ================================================================*/

    var visor__actividades__recreativo_presupuestario=function(informacionObtenida,table){

        table.clear();

        for(z of informacionObtenida){
		
    
            /*===============================
            =            Destino            =
            ===============================*/

            table.row.add([
                    z.mes,
                    z.itemPreesupuestario,
                    z.nombreItem,
                    '<div style="display:none;">'+z.mensualProgramado+'</div><input type="text" id="totalProgramado'+z.idRecreativos+'" name="totalProgramado'+z.idRecreativos+'" value="'+z.mensualProgramado+'" class="solo__numeros ancho__total__input text-center obligatorios'+z.idRecreativos+'" style="border:none;" disabled="disabled" />',
                    '<div style="display:none;">'+z.mensualEjecutado+'</div><div class="celdas'+z.idRecreativos+'"><input type="text" id="totalEjecutado'+z.idRecreativos+'" name="totalEjecutado'+z.idRecreativos+'" value="'+z.mensualEjecutado+'" class="solo__numeros ancho__total__input text-center obligatorios'+z.idRecreativos+'" readonly=""/></div>',
                    z.observaciones,
                    z.cantidadBienes,
                    z.registra_Contratacion,
                    z.justificacion,
                    '<center><a class="btnFacturas btn btn-warning pointer__botones" item="'+z.itemPreesupuestario+'" mes="'+z.mes+'" trimestre="'+z.trimestre+'" idRecreativos="'+z.idRecreativos+'" idOrganismo="'+z.idOrganismo+'"  data-bs-toggle="modal" data-bs-target="#modalFacturasDocumentos"><i class="fas fa-file-invoice"></i></a></center>',
                    '<center><a class="btnDocumentos btn btn-warning pointer__botones" item="'+z.itemPreesupuestario+'" mes="'+z.mes+'" trimestre="'+z.trimestre+'" idRecreativos="'+z.idRecreativos+'" idOrganismo="'+z.idOrganismo+'"  data-bs-toggle="modal" data-bs-target="#modalFacturasDocumentos"><i class="fas fa-file"></i></a></center>',
                    '<nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor'+z.idRecreativos+'" name="eliminarInfor'+z.idRecreativos+'" idPrincipal="'+z.idRecreativos+'" idContador="'+z.idRecreativos+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav>'

            ]).draw(false);

            

            
            $("#eliminarInfor"+z.idRecreativos).click(function(e) {

                let idContador=$(this).attr('idContador');
                let idPrincipal=$(this).attr('idPrincipal');
                
                funcion__eliminar__general(idPrincipal,'eliminar__recreacion__seguimiento__2');
                table.row($(this).closest('tr').index()).remove().draw();
            }); 
         

        }
    
    }


        /*==================================================================
    =            visor Implementacion Presupuestario    =
    ================================================================*/

    var visor__actividades__implementacion_presupuestario=function(informacionObtenida,table){

        table.clear();

        for(z of informacionObtenida){
		
    
            /*===============================
            =            Destino            =
            ===============================*/

            table.row.add([
                    z.mes,
                    z.itemPreesupuestario,
                    z.nombreItem,
                    '<div style="display:none;">'+z.mensualProgramado+'</div><input type="text" id="totalProgramado'+z.idImplementacion+'" name="totalProgramado'+z.idImplementacion+'" value="'+z.mensualProgramado+'" class="solo__numeros ancho__total__input text-center obligatorios'+z.idImplementacion+'" style="border:none;" disabled="disabled" />',
                    '<div style="display:none;">'+z.mensualEjecutado+'</div><div class="celdas'+z.idImplementacion+'"><input type="text" id="totalEjecutado'+z.idImplementacion+'" name="totalEjecutado'+z.idImplementacion+'" value="'+z.mensualEjecutado+'" class="solo__numeros ancho__total__input text-center obligatorios'+z.idImplementacion+'" readonly=""/></div>',
                    z.observaciones,
                    z.cantidadBienes,
                    z.registra_Contratacion,
                    z.justificacion,
                    '<center><a class="btnFacturas btn btn-warning pointer__botones" item="'+z.itemPreesupuestario+'" mes="'+z.mes+'" trimestre="'+z.trimestre+'" idImplementacion="'+z.idImplementacion+'" idOrganismo="'+z.idOrganismo+'"  data-bs-toggle="modal" data-bs-target="#modalFacturasDocumentos"><i class="fas fa-file-invoice"></i></a></center>',
                    '<center><a class="btnDocumentos btn btn-warning pointer__botones" item="'+z.itemPreesupuestario+'" mes="'+z.mes+'" trimestre="'+z.trimestre+'" idImplementacion="'+z.idImplementacion+'" idOrganismo="'+z.idOrganismo+'"  data-bs-toggle="modal" data-bs-target="#modalFacturasDocumentos"><i class="fas fa-file"></i></a></center>',
                    '<nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor'+z.idImplementacion+'" name="eliminarInfor'+z.idImplementacion+'" idPrincipal="'+z.idImplementacion+'" idContador="'+z.idImplementacion+'" idItem="'+z.idItem+'" idOrganismo="'+z.idOrganismo+'" trimestre="'+z.trimestre+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav>'

            ]).draw(false);

         
            
            $("#eliminarInfor"+z.idImplementacion).click(function(e) {

                let idContador=$(this).attr('idContador');
                let idPrincipal=$(this).attr('idPrincipal');
                let idItem=$(this).attr('idItem');
                let idOrganismo=$(this).attr('idOrganismo');
                let trimestre=$(this).attr('trimestre');
                
                funcion__eliminar__general(idPrincipal,'eliminar__implementacion__seguimiento');
                table.row($(this).closest('tr').index()).remove().draw();
            }); 

        }
    
    }



/*==================================================================
    =            visor Capacitacion Tecnico                    =
    ================================================================*/

    var visor__capacitacion_Tecnica=function(informacionObtenida,table){

        table.clear();

        

        for(z of informacionObtenida){
		
    
            /*===============================
            =            Destino            =
            ===============================*/

            table.row.add([
                    z.nombreEvento,
                    z.planificadoInicial,
                    z.ejecutadoInicial,
                    z.planificadoFinal,
                    z.ejectuadoFinal,
                    z.tipoOrganizacion,
                    z.ruc,
                    z.nombreOrganismo,
                    z.observacionesTecnicas,
                    z.beneficiariosHombres,
                    z.beneficiariosMujeres,
                    z.totalT,
                    z.capacitadores,
                    z.trimestre,
                    '<nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor__alto'+z.idCapacitacionTec+'" name="eliminarInfor__alto'+z.idCapacitacionTec+'" idPrincipal="'+z.idCapacitacionTec+'" idContador="'+z.idCapacitacionTec+'" idItem="'+z.idItem+'" idOrganismo="'+z.idOrganismo+'" trimestre="'+z.trimestre+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav>'

            ]).draw(false);


            $("#eliminarInfor__alto"+z.idCapacitacionTec).click(function(e) {

                let idContador=$(this).attr('idContador');
                let idPrincipal=$(this).attr('idPrincipal');
                
                funcion__eliminar__general(idPrincipal,'eliminar__capacitacion__seguimiento');
                table.row($(this).closest('tr').index()).remove().draw();
            }); 

         
           

        }
    
    }



    /*==================================================================
    =            visor Recreativo Tecnico                    =
    ================================================================*/

    var visor__recreativo_Tecnica=function(informacionObtenida,table){

        table.clear();

        

        for(z of informacionObtenida){
		
    
            /*===============================
            =            Destino            =
            ===============================*/

            table.row.add([
                    z.nombreEvento,
                    z.fechaInicioP,
                    z.fechaInicioEjecutado,
                    z.fechaFinP,
                    z.fechaFinEjecutado,
                    z.beneficiariosHombres,
                    z.beneficiariosMujeres,
                    z.totalT,
                    z.beneficiariosHombres18,
                    z.beneficiariosMujeres18,
                    z.totalT18,
                    z.tipoOrganizacion,
                    z.ruc,
                    z.nombreOrganismo,
                    z.observacionesTecnicas,
                    z.trimestre,
                    '<nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor__alto'+z.idCompetenciaSeguimiento+'" name="eliminarInfor__alto'+z.idCompetenciaSeguimiento+'" idPrincipal="'+z.idCompetenciaSeguimiento+'" idContador="'+z.idCompetenciaSeguimiento+'" idItem="'+z.idItem+'" idOrganismo="'+z.idOrganismo+'" trimestre="'+z.trimestre+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav>'

            ]).draw(false);

            $("#eliminarInfor__alto"+z.idCompetenciaSeguimiento).click(function(e) {

                let idContador=$(this).attr('idContador');
                let idPrincipal=$(this).attr('idPrincipal');
                
                funcion__eliminar__general(idPrincipal,'eliminar__recreacion__seguimiento');
                table.row($(this).closest('tr').index()).remove().draw();
            }); 



         
           

        }
    
    }


        /*==================================================================
    =            visor Mantenimeinto Tecnico                    =
    ================================================================*/

    var visor__mantenimiento_Tecnica=function(informacionObtenida,table){

        table.clear();

        

        for(z of informacionObtenida){
		
    
            /*===============================
            =            Destino            =
            ===============================*/

            table.row.add([
                    z.detallarTipoIn,
                    z.planificadoInicial,
                    z.ejecutadoInicial,
                    z.planificadoFinal,
                    z.ejectuadoFinal,
                    z.porcentaje,
                    z.trimestre,
                    '<nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor__alto'+z.idMantenimientoTec+'" name="eliminarInfor__alto'+z.idMantenimientoTec+'" idPrincipal="'+z.idMantenimientoTec+'" idContador="'+z.idMantenimientoTec+'" idItem="'+z.idItem+'" idOrganismo="'+z.idOrganismo+'" trimestre="'+z.trimestre+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav>'

            ]).draw(false);

            $("#eliminarInfor__alto"+z.idMantenimientoTec).click(function(e) {

                let idContador=$(this).attr('idContador');
                let idPrincipal=$(this).attr('idPrincipal');
                
                funcion__eliminar__general(idPrincipal,'eliminar__mantenimientos__tecnicos');
                table.row($(this).closest('tr').index()).remove().draw();
            }); 


        }
    
    }


        /*==================================================================
    =            visor Recreativo Formativo Tecnico                    =
    ================================================================*/

    var visor__recreativo_formativo_Tecnica=function(informacionObtenida,table){

        table.clear();

        

        for(z of informacionObtenida){
		
    
            /*===============================
            =            Destino            =
            ===============================*/

            table.row.add([
                    z.nombreEvento,
                    z.oro,
                    z.plata,
                    z.bronce,
                    z.total,
                    z.cuarOc,
                    z.analisis,
                    z.beneficiariosMujeres,
                    z.beneficiariosHombres,
                    z.totalT,
                    z.beneficiariosMujeres18,
                    z.beneficiariosHombres18,
                    z.totalT18,
                    z.tipoOrganizacion,
                    z.trimestre,
                    z.observacionesTecnicas,
                   
                    '<nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor__formativo'+z.idCompetenciaFormativo+'" name="eliminarInfor__formativo'+z.idCompetenciaFormativo+'" idPrincipal="'+z.idCompetenciaFormativo+'" idContador="'+z.idCompetenciaFormativo+'" idItem="'+z.idItem+'" idOrganismo="'+z.idOrganismo+'" trimestre="'+z.trimestre+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav>'

            ]).draw(false);

            $("#eliminarInfor__formativo"+z.idCompetenciaFormativo).click(function(e) {

                let idContador=$(this).attr('idContador');
                let idPrincipal=$(this).attr('idPrincipal');
                
                funcion__eliminar__general(idPrincipal,'eliminar__formativos__seguimiento');
                table.row($(this).closest('tr').index()).remove().draw();
            }); 


        }

       
    
    }


         /*==================================================================
    =            visor Recreativo Formativo Tecnico                    =
    ================================================================*/

    var visor__recreativo_alto_Tecnica=function(informacionObtenida,table){

        table.clear();

        

        for(z of informacionObtenida){
		
    
            /*===============================
            =            Destino            =
            ===============================*/

            table.row.add([
                    z.nombreEvento,
                    z.oro,
                    z.plata,
                    z.bronce,
                    z.total,
                    z.cuarOc,
                    z.analisis,
                    z.beneficiariosMujeres,
                    z.beneficiariosHombres,
                    z.totalT,
                    z.tipoOrganizacion,
                    z.observacionesTecnicas,
                    z.fecha1,
                    z.fecha2,
                    z.fecha3,
                    z.fecha4,
                    z.trimestre,
                   
                    '<nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor__alto'+z.idCompetenciaAltos+'" name="eliminarInfor__alto'+z.idCompetenciaAltos+'" idPrincipal="'+z.idCompetenciaAltos+'" idContador="'+z.idCompetenciaAltos+'" idItem="'+z.idItem+'" idOrganismo="'+z.idOrganismo+'" trimestre="'+z.trimestre+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav>'

            ]).draw(false);

            $("#eliminarInfor__alto"+z.idCompetenciaAltos).click(function(e) {

                let idContador=$(this).attr('idContador');
                let idPrincipal=$(this).attr('idPrincipal');
                
                funcion__eliminar__general(idPrincipal,'eliminar__altos__seguimiento');
                table.row($(this).closest('tr').index()).remove().draw();
            }); 


        }

      
       
    
    }



   

    


    

  


    /*=========================================================
    =           DATATABLES INDICADORES                  =
    =========================================================*/
    // var visualizar__actividades__indicadores=function(informacionObtenida,table,parametro5,parametro1,parametro4){	
    // 	let contador=1;
    //     table.clear();
    // 	for(z of informacionObtenida){
    // 		var arrayRecibido=obtenerTrimestresSueldosSalarios(parametro5);
    // 		/*===============================
    // 		=            Destino            =
    // 		===============================*/
    // 		table.row.add([
    // 				//z.idSueldos,
    // 				contador,				
    // 				z.nombres,
    // 				z.cedula,
    // 				z.cargo,
    // 				z.tipoCargo,
    // 				z.tiempoTrabajo,
    // 				'<input type="checkbox" id="checked'+z.idSueldos+'" name="checked'+z.idSueldos+'" class="checkeds__dinamicos__sueldos__salarios"/>'
    // 		]).draw(false);

    // 		checkeds__recorridos__sueldos__salarios2023($(".checkeds__dinamicos__sueldos__salarios"),$("#checked"+z.idSueldos),$("#contadorIndicador2"),$("#trimestreEvaluador").val(),z.idSueldos,$(parametro1),$(parametro4),[z.idSueldos,z.sueldoSalario,z.aportePatronal,z.decimoTercera,z.decimoCuarta,z.fondosReserva,arrayRecibido[0],arrayRecibido[1],arrayRecibido[2],z.total,arrayRecibido[3],arrayRecibido[4],arrayRecibido[5],arrayRecibido[6],arrayRecibido[7],arrayRecibido[8],arrayRecibido[9],arrayRecibido[10],arrayRecibido[11],arrayRecibido[12],arrayRecibido[13],arrayRecibido[14]]);			
    // 		contador ++;
    // 	}
    // }
    /*=====  End of Funcion de armamento de la tablas  ======*/
        
        
