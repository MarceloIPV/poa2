
var execelGenerados=function(parametro1,parametro2,parametro3){

$(parametro1).click(function (e){

  var table = document.getElementById(parametro2); // id of table
  var tableHTML = table.outerHTML;
  var fileName = parametro3;

  var msie = window.navigator.userAgent.indexOf("MSIE ");

  // If Internet Explorer
  if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {

    dummyFrame.document.open('txt/html', 'replace');
    dummyFrame.document.write(tableHTML);
    dummyFrame.document.close();
    dummyFrame.focus();
    return dummyFrame.document.execCommand('SaveAs', true, fileName);

  }else {

    var a = document.createElement('a');
    tableHTML = tableHTML.replace(/  /g, '').replace(/ /g, '%20'); // replaces spaces
    a.href = 'data:application/vnd.ms-excel,' + tableHTML;
    a.setAttribute('download', fileName);
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);

  }  

});

}



var datatablets=function(tabla,identificador,parametro3){

/*==============================================
=            Establecer datatablets            =
==============================================*/

var table =$(tabla).DataTable({

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

  "bLengthChange": false,
  "pagingType": "full_numbers",
  "Paginate": true,
  "pagingType": "full_numbers",
  "retrieve": true, 
  "paging": true, 
  "pageLength":4,


  "ajax":{

    "method":"POST",
    "url":"modelosBd/POA_MODIFICACIONES_REVISOR/datatablets.md.php", 
    "data": { 
      "identificador": identificador
    }  

  },

  "aoColumnDefs":[

    {
      
      "aTargets":4, 
      "mRender": (function (data, type, row) {

      	let variable=" ";

      	if (parametro3==1) {
      		variable="reasignar__modificaciones";
      	}else if (parametro3==2){
      		variable="recomendar__modificaciones";
      	}else if (parametro3==3){
      		variable="recomendar__modificaciones__planificacion";
      	}else if (parametro3==4){
      		variable="recomendar__modificaciones__planificacion__recomendacion";
      	}else if (parametro3==5){
      		variable="reasignacionModificaciones__recomendaciones__planificacion__recomendacion__quipux";
      	}

        return "<center><button class='"+variable+" estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#modalModificaciones__reasignaciones'>Reasignar</button><center>";

       }) 

    },

  ]

});

/*=====  End of Establecer datatablets  ======*/

funcion__asignar("#"+identificador+" tbody",table);
funcion__recomendar("#"+identificador+" tbody",table);
funcion__recomendar__planificacion("#"+identificador+" tbody",table);
funcion__recomendar__planificacion__recomendar("#"+identificador+" tbody",table);
funcion__recomendar__planificacion__recomendar__quipux("#"+identificador+" tbody",table);


}

var funcion__recomendar__planificacion__recomendar__quipux=function(tbody,table){

$(tbody).on("click","button.reasignacionModificaciones__recomendaciones__planificacion__recomendacion__quipux",function(e){

	let data=table.row($(this).parents("tr")).data();

	$(".textos__titulos").text(data[1]);

	$("#idTramite").val(data[4]);
	$("#idOrganismo").val(data[5]);

	let paqueteDeDatos = new FormData();

	paqueteDeDatos.append('tipo','lineas__modificaciones');
	paqueteDeDatos.append('idLinea',data[4]);
	$(".idOrganismo__lineas").val(data[5]);


	$.ajax({

		type:"POST",
		url:"modelosBd/inserta/seleccionaAcciones.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

		$.getScript("layout/scripts/js/modificacionRevisor/selector.js",function(){
        
			let elementos=JSON.parse(response);
			let informacionObtenida=elementos['informacionObtenida'];
			let informacionObtenida__honorarios=elementos['informacionObtenida__honorarios'];
			let informacionObtenida__honorarios__items=elementos['informacionObtenida__honorarios__items'];
			let informacionObtenida__sueldos__salarios=elementos['informacionObtenida__sueldos__salarios'];
			let informacionObtenida__sueldos__items=elementos['informacionObtenida__sueldos__items'];
			let informacionObtenida__desvinculaciones=elementos['informacionObtenida__desvinculaciones'];

			let contador=0;

			let eventoOrigen="";
			let eventosDestino="";
			let tipoTramite="";		

			$(".contenedor__lineas__modificaciones0").html(" ");
			$(".contenedor__lineas__modificaciones1").html(" ");
			$(".contenedor__lineas__modificaciones2").html(" ");
			$(".contenedor__lineas__modificaciones3").html(" ");
			$(".contenedor__lineas__modificaciones4").html(" ");
			$(".contenedor__lineas__modificaciones5").html(" ");	



			if (informacionObtenida__desvinculaciones!="" && informacionObtenida__desvinculaciones!=" " && informacionObtenida__desvinculaciones!=undefined && informacionObtenida__desvinculaciones!=null && informacionObtenida__desvinculaciones!="N/A") {

				let origenTotalInicial__5=0;
				let origenTotalVigente__5=0;
				let destinoTotalInicial__5=0;

				for(x of informacionObtenida__desvinculaciones){

					contador++;


					let color__origen__destino__enero;
					let color__origen__destino__febrero;
					let color__origen__destino__marzo;
					let color__origen__destino__abril;
					let color__origen__destino__mayo;
					let color__origen__destino__junio;
					let color__origen__destino__julio;
					let color__origen__destino__agosto;
					let color__origen__destino__septiembre;
					let color__origen__destino__octubre;
					let color__origen__destino__noviembre;
					let color__origen__destino__diciembre;


					let color__destino__origen__enero;
					let color__destino__origen__febrero;
					let color__destino__origen__marzo;
					let color__destino__origen__abril;
					let color__destino__origen__mayo;
					let color__destino__origen__junio;
					let color__destino__origen__julio;
					let color__destino__origen__agosto;
					let color__destino__origen__septiembre;
					let color__destino__origen__octubre;
					let color__destino__origen__noviembre;
					let color__destino__origen__diciembre;



					if (x.eventosOrigen=="null" || x.eventosOrigen==null) {
						eventoOrigen='N/A';
					}else{
						eventoOrigen=x.eventosOrigen;
					}

					if (x.eventosDestino=="null" || x.eventosDestino==null) {
						eventosDestino='N/A';
					}else{
						eventosDestino=x.eventosDestino;
					}

					if (x.tipoTramite==1) {
						tipoTramite="TRÁMITE DE DESVINCULACIÓN";
					}else if(x.tipoTramite==2){
						tipoTramite="TRÁMITE DE DESVINCULACIÓN";
					}else if(x.tipoTramite==3){
						tipoTramite="TRÁMITE DE DESVINCULACIÓN";
					}

					origenTotalInicial__5=parseFloat(x.enero) + parseFloat(x.febrero) + parseFloat(x.marzo) + parseFloat(x.abril) + parseFloat(x.mayo) + parseFloat(x.junio) + parseFloat(x.julio) + parseFloat(x.agosto) + parseFloat(x.septiembre) + parseFloat(x.octubre) + parseFloat(x.noviembre) + parseFloat(x.diciembre);

					origenTotalVigente__5=(parseFloat(x.enero)-parseFloat(x.eneroOrigen)) + (parseFloat(x.febrero)-parseFloat(x.febreroOrigen)) + (parseFloat(x.marzo)-parseFloat(x.marzoOrigen)) + (parseFloat(x.abril)-parseFloat(x.abrilOrigen)) + (parseFloat(x.mayo)-parseFloat(x.mayoOrigen)) + (parseFloat(x.junio)-parseFloat(x.junioOrigen)) + (parseFloat(x.julio)-parseFloat(x.julioOrigen)) + (parseFloat(x.agosto)-parseFloat(x.agostoOrigen)) + (parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)) + (parseFloat(x.octubre)-parseFloat(x.octubreOrigen)) + (parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)) + (parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen));


					destinoTotalInicial__5=parseFloat(x.eneroDestino) + parseFloat(x.febreroDestino) + parseFloat(x.marzoDestino) + parseFloat(x.abrilDestino) + parseFloat(x.mayoDestino) + parseFloat(x.junioDestino) + parseFloat(x.julioDestino) + parseFloat(x.agostoDestino) + parseFloat(x.septiembreDestino) + parseFloat(x.octubreDestino) + parseFloat(x.noviembreDestino) + parseFloat(x.diciembreDestino);

					$(".contenedor__lineas__modificaciones0").append('<tr><th colspan="32" align="center" style="border-left:1px solid black; border-right:1px solid black;">Caso 1 (Actividades e items iguales en orígen y destino)</th></tr><tr class="fila__modificaciones__califica__analistas"><th colspan="30" align="center" style="border-left:1px solid black; border-right:1px solid black;"><div class="row"><div class="col col-8" style="text-align:left!important;">'+x.modificacionEstado+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Observación:&nbsp;&nbsp;'+x.observaciones+'</div></div></th></tr><<tr><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-bottom:1px solid black!important;border-left:1px solid black!important;">'+contador+'</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Cédula</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombre</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+eventoOrigen+'</td><td align="center">'+x.idFinancierioOrigen+'</td><td align="center" '+color__origen__destino__enero+'>'+x.enero+'</td><td align="center" '+color__origen__destino__enero+'>'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__febrero+'>'+x.febrero+'</td><td align="center" '+color__origen__destino__febrero+'>'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__marzo+'>'+x.marzo+'</td><td align="center" '+color__origen__destino__marzo+'>'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__abril+'>'+x.abril+'</td><td align="center" '+color__origen__destino__abril+'>'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__mayo+'>'+x.mayo+'</td><td align="center" '+color__origen__destino__mayo+'>'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__junio+'>'+x.junio+'</td><td align="center" '+color__origen__destino__junio+'>'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__julio+'>'+x.julio+'</td><td align="center" '+color__origen__destino__julio+'>'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__agosto+'>'+x.agosto+'</td><td align="center" '+color__origen__destino__agosto+'>'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__septiembre+'>'+x.septiembre+'</td><td align="center" '+color__origen__destino__septiembre+'>'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__octubre+'>'+x.octubre+'</td><td align="center" '+color__origen__destino__octubre+'>'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__noviembre+'>'+x.noviembre+'</td><td align="center" '+color__origen__destino__noviembre+'>'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__diciembre+'>'+x.diciembre+'</td><td align="center" '+color__origen__destino__diciembre+'>'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__5+'</td><td align="center">'+origenTotalVigente__5+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold;">Enero</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero</td> <td rowspan="1" align="center" style="font-weight:bold;">Marzo</td> <td rowspan="1" align="center" style="font-weight:bold;">Abril</td> <td rowspan="1" align="center" style="font-weight:bold;">Mayo</td> <td rowspan="1" align="center" style="font-weight:bold;">Junio</td> <td rowspan="1" align="center" style="font-weight:bold;">Julio</td> <td rowspan="1" align="center" style="font-weight:bold;">Agosto</td> <td rowspan="1" align="center" style="font-weight:bold;">Septiembre</td> <td rowspan="1" align="center" style="font-weight:bold;">Octubre</td> <td rowspan="1" align="center" style="font-weight:bold;">Noviembre</td> <td rowspan="1" align="center" style="font-weight:bold;">Diciembre</td><td style="font-weight:bold;">Total Inicial</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.nombreItem+'</td><td style="border-bottom:1px solid black!important;">'+x.eneroDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.febreroDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.marzoDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.abrilDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.mayoDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.junioDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.julioDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.agostoDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.septiembreDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.octubreDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.noviembreDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.diciembreDestino+'</td><td align="center">'+destinoTotalInicial__5+'</td></tr>');

					$(".contenedor__lineas__modificaciones0__editar").append('<tr><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Cédula</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombre</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+eventoOrigen+'</td><td align="center">'+x.idFinancierioOrigen+'</td><td align="center" '+color__origen__destino__enero+'>'+x.enero+'</td><td align="center" '+color__origen__destino__enero+'>'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__febrero+'>'+x.febrero+'</td><td align="center" '+color__origen__destino__febrero+'>'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__marzo+'>'+x.marzo+'</td><td align="center" '+color__origen__destino__marzo+'>'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__abril+'>'+x.abril+'</td><td align="center" '+color__origen__destino__abril+'>'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__mayo+'>'+x.mayo+'</td><td align="center" '+color__origen__destino__mayo+'>'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__junio+'>'+x.junio+'</td><td align="center" '+color__origen__destino__junio+'>'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__julio+'>'+x.julio+'</td><td align="center" '+color__origen__destino__julio+'>'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__agosto+'>'+x.agosto+'</td><td align="center" '+color__origen__destino__agosto+'>'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__septiembre+'>'+x.septiembre+'</td><td align="center" '+color__origen__destino__septiembre+'>'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__octubre+'>'+x.octubre+'</td><td align="center" '+color__origen__destino__octubre+'>'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__noviembre+'>'+x.noviembre+'</td><td align="center" '+color__origen__destino__noviembre+'>'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__diciembre+'>'+x.diciembre+'</td><td align="center" '+color__origen__destino__diciembre+'>'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__5+'</td><td align="center">'+origenTotalVigente__5+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold;">Enero</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero</td> <td rowspan="1" align="center" style="font-weight:bold;">Marzo</td> <td rowspan="1" align="center" style="font-weight:bold;">Abril</td> <td rowspan="1" align="center" style="font-weight:bold;">Mayo</td> <td rowspan="1" align="center" style="font-weight:bold;">Junio</td> <td rowspan="1" align="center" style="font-weight:bold;">Julio</td> <td rowspan="1" align="center" style="font-weight:bold;">Agosto</td> <td rowspan="1" align="center" style="font-weight:bold;">Septiembre</td> <td rowspan="1" align="center" style="font-weight:bold;">Octubre</td> <td rowspan="1" align="center" style="font-weight:bold;">Noviembre</td> <td rowspan="1" align="center" style="font-weight:bold;">Diciembre</td><td style="font-weight:bold;">Total Inicial</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.nombreItem+'</td><td style="border-bottom:1px solid black!important;">'+x.eneroDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.febreroDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.marzoDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.abrilDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.mayoDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.junioDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.julioDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.agostoDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.septiembreDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.octubreDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.noviembreDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.diciembreDestino+'</td><td align="center">'+destinoTotalInicial__5+'</td></tr>');


					$("#aprobar__linea"+x.idOrigenDestino).val(x.modificacionEstado);

				}				

			}else{
				$("#tabla__0").remove();
			}

			if (informacionObtenida__sueldos__items!="" && informacionObtenida__sueldos__items!=" " && informacionObtenida__sueldos__items!=undefined && informacionObtenida__sueldos__items!=null && informacionObtenida__sueldos__items!="N/A") {

			let origenTotalInicial__4=0;
			let origenTotalVigente__4=0;
			let destinoTotalInicial__4=0;
			let destinoTotalVigente__4=0;

			for(x of informacionObtenida__sueldos__items){

				contador++;


				let color__origen__destino__enero;
				let color__origen__destino__febrero;
				let color__origen__destino__marzo;
				let color__origen__destino__abril;
				let color__origen__destino__mayo;
				let color__origen__destino__junio;
				let color__origen__destino__julio;
				let color__origen__destino__agosto;
				let color__origen__destino__septiembre;
				let color__origen__destino__octubre;
				let color__origen__destino__noviembre;
				let color__origen__destino__diciembre;


				let color__destino__origen__enero;
				let color__destino__origen__febrero;
				let color__destino__origen__marzo;
				let color__destino__origen__abril;
				let color__destino__origen__mayo;
				let color__destino__origen__junio;
				let color__destino__origen__julio;
				let color__destino__origen__agosto;
				let color__destino__origen__septiembre;
				let color__destino__origen__octubre;
				let color__destino__origen__noviembre;
				let color__destino__origen__diciembre;



				if (x.eventosOrigen=="null" || x.eventosOrigen==null) {
					eventoOrigen='N/A';
				}else{
					eventoOrigen=x.eventosOrigen;
				}

				if (x.eventosDestino=="null" || x.eventosDestino==null) {
					eventosDestino='N/A';
				}else{
					eventosDestino=x.eventosDestino;
				}

				if (x.tipoTramite==1) {
					tipoTramite="Caso 1 (Actividades e items iguales en orígen y destino)";
				}else if(x.tipoTramite==2){
					tipoTramite="Caso 2 (Actividades iguales en orígen y destino)";
				}else if(x.tipoTramite==3){
					tipoTramite="Caso 3 (Actividades diferentes en orígen y destino)";
				}


				origenTotalInicial__4=parseFloat(x.enero) + parseFloat(x.febrero) + parseFloat(x.marzo) + parseFloat(x.abril) + parseFloat(x.mayo) + parseFloat(x.junio) + parseFloat(x.julio) + parseFloat(x.agosto) + parseFloat(x.septiembre) + parseFloat(x.octubre) + parseFloat(x.noviembre) + parseFloat(x.diciembre);

				origenTotalVigente__4=(parseFloat(x.enero)-parseFloat(x.eneroOrigen)) + (parseFloat(x.febrero)-parseFloat(x.febreroOrigen)) + (parseFloat(x.marzo)-parseFloat(x.marzoOrigen)) + (parseFloat(x.abril)-parseFloat(x.abrilOrigen)) + (parseFloat(x.mayo)-parseFloat(x.mayoOrigen)) + (parseFloat(x.junio)-parseFloat(x.junioOrigen)) + (parseFloat(x.julio)-parseFloat(x.julioOrigen)) + (parseFloat(x.agosto)-parseFloat(x.agostoOrigen)) + (parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)) + (parseFloat(x.octubre)-parseFloat(x.octubreOrigen)) + (parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)) + (parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen));



				destinoTotalInicial__4=parseFloat(x.eneroDestino__destino) + parseFloat(x.febreroDestino__destino) + parseFloat(x.marzoDestino__destino) + parseFloat(x.abrilDestino__destino) + parseFloat(x.mayoDestino__destino) + parseFloat(x.junioDestino__destino) + parseFloat(x.julioDestino__destino) + parseFloat(x.agostoDestino__destino) + parseFloat(x.septiembreDestino__destino) + parseFloat(x.octubreDestino__destino) + parseFloat(x.noviembreDestino__destino) + parseFloat(x.diciembreDestino__destino);

				destinoTotalVigente__4=(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)) + (parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)) + (parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)) +(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)) + (parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)) + (parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)) +(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)) + (parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)) + (parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)) + (parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)) + (parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)) + (parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino));	

				if (parseFloat(x.eneroOrigen)>0) {
					color__origen__destino__enero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.febreroOrigen)>0) {
					color__origen__destino__febrero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.marzoOrigen)>0) {
					color__origen__destino__marzo='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.abrilOrigen)>0) {
					color__origen__destino__abril='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.mayoOrigen)>0) {
					color__origen__destino__mayo='style="background:blue!important; color:white!important;"';
				}				

				if (parseFloat(x.junioOrigen)>0) {
					color__origen__destino__junio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.julioOrigen)>0) {
					color__origen__destino__julio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.agostoOrigen)>0) {
					color__origen__destino__agosto='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.septiembreOrigen)>0) {
					color__origen__destino__septiembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.octubreOrigen)>0) {
					color__origen__destino__octubre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.noviembreOrigen)>0) {
					color__origen__destino__noviembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.diciembreOrigen)>0) {
					color__origen__destino__diciembre='style="background:blue!important; color:white!important;"';
				}


				if (parseFloat(x.eneroDestino)>0) {
					color__destino__origen__enero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.febreroDestino)>0) {
					color__destino__origen__febrero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.marzoDestino)>0) {
					color__destino__origen__marzo='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.abrilDestino)>0) {
					color__destino__origen__abril='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.mayoDestino)>0) {
					color__destino__origen__mayo='background:cyan!important; color:black!important;';
				}				

				if (parseFloat(x.junioDestino)>0) {
					color__destino__origen__junio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.julioDestino)>0) {
					color__destino__origen__julio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.agostoDestino)>0) {
					color__destino__origen__agosto='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.septiembreDestino)>0) {
					color__destino__origen__septiembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.octubreDestino)>0) {
					color__destino__origen__octubre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.noviembreDestino)>0) {
					color__destino__origen__noviembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.diciembreDestino)>0) {
					color__destino__origen__diciembre='background:cyan!important; color:black!important;';
				}


				$(".contenedor__lineas__modificaciones1").append('<tr><th colspan="32" align="center" style="border-left:1px solid black; border-right:1px solid black;">'+tipoTramite+'</th></tr><tr class="fila__modificaciones__califica__analistas"><th colspan="30" align="center" style="border-left:1px solid black; border-right:1px solid black;"><div class="row"><div class="col col-8" style="text-align:left!important;">'+x.modificacionEstado+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Observación:&nbsp;&nbsp;'+x.observaciones+'</div></div></th></tr><tr><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-bottom:1px solid black!important;border-left:1px solid black!important;">'+contador+'</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Cédula</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombre</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+eventoOrigen+'</td><td align="center">'+x.idFinancierioOrigen+'</td><td align="center" '+color__origen__destino__enero+'>'+x.enero+'</td><td align="center" '+color__origen__destino__enero+'>'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__febrero+'>'+x.febrero+'</td><td align="center" '+color__origen__destino__febrero+'>'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__marzo+'>'+x.marzo+'</td><td align="center" '+color__origen__destino__marzo+'>'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__abril+'>'+x.abril+'</td><td align="center" '+color__origen__destino__abril+'>'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__mayo+'>'+x.mayo+'</td><td align="center" '+color__origen__destino__mayo+'>'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__junio+'>'+x.junio+'</td><td align="center" '+color__origen__destino__junio+'>'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__julio+'>'+x.julio+'</td><td align="center" '+color__origen__destino__julio+'>'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__agosto+'>'+x.agosto+'</td><td align="center" '+color__origen__destino__agosto+'>'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__septiembre+'>'+x.septiembre+'</td><td align="center" '+color__origen__destino__septiembre+'>'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__octubre+'>'+x.octubre+'</td><td align="center" '+color__origen__destino__octubre+'>'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__noviembre+'>'+x.noviembre+'</td><td align="center" '+color__origen__destino__noviembre+'>'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__diciembre+'>'+x.diciembre+'</td><td align="center" '+color__origen__destino__diciembre+'>'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__4+'</td><td align="center">'+origenTotalVigente__4+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Evento</td><td rowspan="1" align="center" style="font-weight:bold;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+eventosDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.idFinancierioDestino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__4+'</td><td align="center">'+destinoTotalVigente__4+'</td></tr>');

				$(".contenedor__lineas__modificaciones1__editar").append('<tr><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Cédula</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombre</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+eventoOrigen+'</td><td align="center">'+x.idFinancierioOrigen+'</td><td align="center">'+x.enero+'</td><td align="center">'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center">'+x.febrero+'</td><td align="center">'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center">'+x.marzo+'</td><td align="center">'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center">'+x.abril+'</td><td align="center">'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center">'+x.mayo+'</td><td align="center">'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center">'+x.junio+'</td><td align="center">'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center">'+x.julio+'</td><td align="center">'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center">'+x.agosto+'</td><td align="center">'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center">'+x.septiembre+'</td><td align="center">'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center">'+x.octubre+'</td><td align="center">'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center">'+x.noviembre+'</td><td align="center">'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center">'+x.diciembre+'</td><td align="center">'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__4+'</td><td align="center">'+origenTotalVigente__4+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Evento</td><td rowspan="1" align="center" style="font-weight:bold;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+eventosDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.idFinancierioDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__4+'</td><td align="center">'+destinoTotalVigente__4+'</td></tr>');

				$("#aprobar__linea"+x.idOrigenDestino).val(x.modificacionEstado);

			}				

			}else{
				$("#tabla__1").remove();
			}

			if (informacionObtenida__sueldos__salarios!="" && informacionObtenida__sueldos__salarios!=" " && informacionObtenida__sueldos__salarios!=undefined && informacionObtenida__sueldos__salarios!=null & informacionObtenida__sueldos__salarios!="N/A") {


			let origenTotalInicial__3=0;
			let origenTotalVigente__3=0;
			let destinoTotalInicial__3=0;
			let destinoTotalVigente__3=0;


			for(x of informacionObtenida__sueldos__salarios){

				contador++;

				let color__origen__destino__enero;
				let color__origen__destino__febrero;
				let color__origen__destino__marzo;
				let color__origen__destino__abril;
				let color__origen__destino__mayo;
				let color__origen__destino__junio;
				let color__origen__destino__julio;
				let color__origen__destino__agosto;
				let color__origen__destino__septiembre;
				let color__origen__destino__octubre;
				let color__origen__destino__noviembre;
				let color__origen__destino__diciembre;


				let color__destino__origen__enero;
				let color__destino__origen__febrero;
				let color__destino__origen__marzo;
				let color__destino__origen__abril;
				let color__destino__origen__mayo;
				let color__destino__origen__junio;
				let color__destino__origen__julio;
				let color__destino__origen__agosto;
				let color__destino__origen__septiembre;
				let color__destino__origen__octubre;
				let color__destino__origen__noviembre;
				let color__destino__origen__diciembre;


				if (x.tipoTramite==1) {
					tipoTramite="Caso 1 (Actividades e items iguales en orígen y destino)";
				}else if(x.tipoTramite==2){
					tipoTramite="Caso 2 (Actividades iguales en orígen y destino)";
				}else if(x.tipoTramite==3){
					tipoTramite="Caso 3 (Actividades diferentes en orígen y destino)";
				}



				origenTotalInicial__3=parseFloat(x.enero) + parseFloat(x.febrero) + parseFloat(x.marzo) + parseFloat(x.abril) + parseFloat(x.mayo) + parseFloat(x.junio) + parseFloat(x.julio) + parseFloat(x.agosto) + parseFloat(x.septiembre) + parseFloat(x.octubre) + parseFloat(x.noviembre) + parseFloat(x.diciembre);

				origenTotalVigente__3=(parseFloat(x.enero)-parseFloat(x.eneroOrigen)) + (parseFloat(x.febrero)-parseFloat(x.febreroOrigen)) + (parseFloat(x.marzo)-parseFloat(x.marzoOrigen)) + (parseFloat(x.abril)-parseFloat(x.abrilOrigen)) + (parseFloat(x.mayo)-parseFloat(x.mayoOrigen)) + (parseFloat(x.junio)-parseFloat(x.junioOrigen)) + (parseFloat(x.julio)-parseFloat(x.julioOrigen)) + (parseFloat(x.agosto)-parseFloat(x.agostoOrigen)) + (parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)) + (parseFloat(x.octubre)-parseFloat(x.octubreOrigen)) + (parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)) + (parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen));



				destinoTotalInicial__3=parseFloat(x.eneroDestino__destino) + parseFloat(x.febreroDestino__destino) + parseFloat(x.marzoDestino__destino) + parseFloat(x.abrilDestino__destino) + parseFloat(x.mayoDestino__destino) + parseFloat(x.junioDestino__destino) + parseFloat(x.julioDestino__destino) + parseFloat(x.agostoDestino__destino) + parseFloat(x.septiembreDestino__destino) + parseFloat(x.octubreDestino__destino) + parseFloat(x.noviembreDestino__destino) + parseFloat(x.diciembreDestino__destino);

				destinoTotalVigente__3=(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)) + (parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)) + (parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)) +(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)) + (parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)) + (parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)) +(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)) + (parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)) + (parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)) + (parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)) + (parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)) + (parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino));

				if (parseFloat(x.eneroOrigen)>0) {
					color__origen__destino__enero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.febreroOrigen)>0) {
					color__origen__destino__febrero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.marzoOrigen)>0) {
					color__origen__destino__marzo='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.abrilOrigen)>0) {
					color__origen__destino__abril='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.mayoOrigen)>0) {
					color__origen__destino__mayo='style="background:blue!important; color:white!important;"';
				}				

				if (parseFloat(x.junioOrigen)>0) {
					color__origen__destino__junio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.julioOrigen)>0) {
					color__origen__destino__julio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.agostoOrigen)>0) {
					color__origen__destino__agosto='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.septiembreOrigen)>0) {
					color__origen__destino__septiembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.octubreOrigen)>0) {
					color__origen__destino__octubre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.noviembreOrigen)>0) {
					color__origen__destino__noviembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.diciembreOrigen)>0) {
					color__origen__destino__diciembre='style="background:blue!important; color:white!important;"';
				}


				if (parseFloat(x.eneroDestino)>0) {
					color__destino__origen__enero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.febreroDestino)>0) {
					color__destino__origen__febrero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.marzoDestino)>0) {
					color__destino__origen__marzo='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.abrilDestino)>0) {
					color__destino__origen__abril='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.mayoDestino)>0) {
					color__destino__origen__mayo='background:cyan!important; color:black!important;';
				}				

				if (parseFloat(x.junioDestino)>0) {
					color__destino__origen__junio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.julioDestino)>0) {
					color__destino__origen__julio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.agostoDestino)>0) {
					color__destino__origen__agosto='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.septiembreDestino)>0) {
					color__destino__origen__septiembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.octubreDestino)>0) {
					color__destino__origen__octubre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.noviembreDestino)>0) {
					color__destino__origen__noviembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.diciembreDestino)>0) {
					color__destino__origen__diciembre='background:cyan!important; color:black!important;';
				}



				$(".contenedor__lineas__modificaciones2").append('<tr><th colspan="32" align="center" style="border-left:1px solid black; border-right:1px solid black;">'+tipoTramite+'</th></tr><tr class="fila__modificaciones__califica__analistas"><th colspan="30" align="center" style="border-left:1px solid black; border-right:1px solid black;"><div class="row"><div class="col col-8" style="text-align:left!important;">'+x.modificacionEstado+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Observación:&nbsp;&nbsp;'+x.observaciones+'</div></div></th></tr><tr><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-bottom:1px solid black!important;border-left:1px solid black!important;">'+contador+'</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombres</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+x.eventosOrigen+'</td><td align="center" '+color__origen__destino__enero+'>'+x.enero+'</td><td align="center" '+color__origen__destino__enero+'>'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__febrero+'>'+x.febrero+'</td><td align="center" '+color__origen__destino__febrero+'>'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__marzo+'>'+x.marzo+'</td><td align="center" '+color__origen__destino__marzo+'>'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__abril+'>'+x.abril+'</td><td align="center" '+color__origen__destino__abril+'>'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__mayo+'>'+x.mayo+'</td><td align="center" '+color__origen__destino__mayo+'>'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__junio+'>'+x.junio+'</td><td align="center" '+color__origen__destino__junio+'>'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__julio+'>'+x.julio+'</td><td align="center" '+color__origen__destino__julio+'>'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__agosto+'>'+x.agosto+'</td><td align="center" '+color__origen__destino__agosto+'>'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__septiembre+'>'+x.septiembre+'</td><td align="center" '+color__origen__destino__septiembre+'>'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__octubre+'>'+x.octubre+'</td><td align="center" '+color__origen__destino__octubre+'>'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__noviembre+'>'+x.noviembre+'</td><td align="center" '+color__origen__destino__noviembre+'>'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__diciembre+'>'+x.diciembre+'</td><td align="center" '+color__origen__destino__diciembre+'>'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__3+'</td><td align="center">'+origenTotalVigente__3+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Nombres</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eventosDestino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__3+'</td><td align="center">'+destinoTotalVigente__3+'</td></tr>');

				$(".contenedor__lineas__modificaciones2__editar").append('<tr><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombres</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+x.eventosOrigen+'</td><td align="center">'+x.enero+'</td><td align="center">'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center">'+x.febrero+'</td><td align="center">'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center">'+x.marzo+'</td><td align="center">'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center">'+x.abril+'</td><td align="center">'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center">'+x.mayo+'</td><td align="center">'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center">'+x.junio+'</td><td align="center">'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center">'+x.julio+'</td><td align="center">'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center">'+x.agosto+'</td><td align="center">'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center">'+x.septiembre+'</td><td align="center">'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center">'+x.octubre+'</td><td align="center">'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center">'+x.noviembre+'</td><td align="center">'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center">'+x.diciembre+'</td><td align="center">'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__3+'</td><td align="center">'+origenTotalVigente__3+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Nombres</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eventosDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__3+'</td><td align="center">'+destinoTotalVigente__3+'</td></tr>');


				$("#aprobar__linea"+x.idOrigenDestino).val(x.modificacionEstado);

			}		

			}else{
				$("#tabla__2").remove();
			}

			if (informacionObtenida__honorarios__items!="" && informacionObtenida__honorarios__items!=" " && informacionObtenida__honorarios__items!=undefined && informacionObtenida__honorarios__items!=null && informacionObtenida__honorarios__items!="N/A") {

			let origenTotalInicial__2=0;
			let origenTotalVigente__2=0;
			let destinoTotalInicial__2=0;
			let destinoTotalVigente__2=0;

			for(x of informacionObtenida__honorarios__items){

				contador++;

				let color__origen__destino__enero;
				let color__origen__destino__febrero;
				let color__origen__destino__marzo;
				let color__origen__destino__abril;
				let color__origen__destino__mayo;
				let color__origen__destino__junio;
				let color__origen__destino__julio;
				let color__origen__destino__agosto;
				let color__origen__destino__septiembre;
				let color__origen__destino__octubre;
				let color__origen__destino__noviembre;
				let color__origen__destino__diciembre;


				let color__destino__origen__enero;
				let color__destino__origen__febrero;
				let color__destino__origen__marzo;
				let color__destino__origen__abril;
				let color__destino__origen__mayo;
				let color__destino__origen__junio;
				let color__destino__origen__julio;
				let color__destino__origen__agosto;
				let color__destino__origen__septiembre;
				let color__destino__origen__octubre;
				let color__destino__origen__noviembre;
				let color__destino__origen__diciembre;



				if (x.eventosOrigen=="null" || x.eventosOrigen==null) {
					eventoOrigen='N/A';
				}else{
					eventoOrigen=x.eventosOrigen;
				}

				if (x.eventosDestino=="null" || x.eventosDestino==null) {
					eventosDestino='N/A';
				}else{
					eventosDestino=x.eventosDestino;
				}

				if (x.tipoTramite==1) {
					tipoTramite="Caso 1 (Actividades e items iguales en orígen y destino)";
				}else if(x.tipoTramite==2){
					tipoTramite="Caso 2 (Actividades iguales en orígen y destino)";
				}else if(x.tipoTramite==3){
					tipoTramite="Caso 3 (Actividades diferentes en orígen y destino)";
				}

				if (parseFloat(x.eneroOrigen)>0) {
					color__origen__destino__enero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.febreroOrigen)>0) {
					color__origen__destino__febrero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.marzoOrigen)>0) {
					color__origen__destino__marzo='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.abrilOrigen)>0) {
					color__origen__destino__abril='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.mayoOrigen)>0) {
					color__origen__destino__mayo='style="background:blue!important; color:white!important;"';
				}				

				if (parseFloat(x.junioOrigen)>0) {
					color__origen__destino__junio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.julioOrigen)>0) {
					color__origen__destino__julio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.agostoOrigen)>0) {
					color__origen__destino__agosto='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.septiembreOrigen)>0) {
					color__origen__destino__septiembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.octubreOrigen)>0) {
					color__origen__destino__octubre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.noviembreOrigen)>0) {
					color__origen__destino__noviembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.diciembreOrigen)>0) {
					color__origen__destino__diciembre='style="background:blue!important; color:white!important;"';
				}


				if (parseFloat(x.eneroDestino)>0) {
					color__destino__origen__enero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.febreroDestino)>0) {
					color__destino__origen__febrero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.marzoDestino)>0) {
					color__destino__origen__marzo='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.abrilDestino)>0) {
					color__destino__origen__abril='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.mayoDestino)>0) {
					color__destino__origen__mayo='background:cyan!important; color:black!important;';
				}				

				if (parseFloat(x.junioDestino)>0) {
					color__destino__origen__junio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.julioDestino)>0) {
					color__destino__origen__julio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.agostoDestino)>0) {
					color__destino__origen__agosto='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.septiembreDestino)>0) {
					color__destino__origen__septiembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.octubreDestino)>0) {
					color__destino__origen__octubre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.noviembreDestino)>0) {
					color__destino__origen__noviembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.diciembreDestino)>0) {
					color__destino__origen__diciembre='background:cyan!important; color:black!important;';
				}


				origenTotalInicial__2=parseFloat(x.enero) + parseFloat(x.febrero) + parseFloat(x.marzo) + parseFloat(x.abril) + parseFloat(x.mayo) + parseFloat(x.junio) + parseFloat(x.julio) + parseFloat(x.agosto) + parseFloat(x.septiembre) + parseFloat(x.octubre) + parseFloat(x.noviembre) + parseFloat(x.diciembre);

				origenTotalVigente__2=(parseFloat(x.enero)-parseFloat(x.eneroOrigen)) + (parseFloat(x.febrero)-parseFloat(x.febreroOrigen)) + (parseFloat(x.marzo)-parseFloat(x.marzoOrigen)) + (parseFloat(x.abril)-parseFloat(x.abrilOrigen)) + (parseFloat(x.mayo)-parseFloat(x.mayoOrigen)) + (parseFloat(x.junio)-parseFloat(x.junioOrigen)) + (parseFloat(x.julio)-parseFloat(x.julioOrigen)) + (parseFloat(x.agosto)-parseFloat(x.agostoOrigen)) + (parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)) + (parseFloat(x.octubre)-parseFloat(x.octubreOrigen)) + (parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)) + (parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen));



				destinoTotalInicial__2=parseFloat(x.eneroDestino__destino) + parseFloat(x.febreroDestino__destino) + parseFloat(x.marzoDestino__destino) + parseFloat(x.abrilDestino__destino) + parseFloat(x.mayoDestino__destino) + parseFloat(x.junioDestino__destino) + parseFloat(x.julioDestino__destino) + parseFloat(x.agostoDestino__destino) + parseFloat(x.septiembreDestino__destino) + parseFloat(x.octubreDestino__destino) + parseFloat(x.noviembreDestino__destino) + parseFloat(x.diciembreDestino__destino);

				destinoTotalVigente__2=(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)) + (parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)) + (parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)) +(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)) + (parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)) + (parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)) +(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)) + (parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)) + (parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)) + (parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)) + (parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)) + (parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino));			



				$(".contenedor__lineas__modificaciones3").append('<tr><th colspan="32" align="center" style="border-left:1px solid black; border-right:1px solid black;">'+tipoTramite+'</th></tr><tr class="fila__modificaciones__califica__analistas"><th colspan="30" align="center" style="border-left:1px solid black; border-right:1px solid black;"><div class="row"><div class="col col-8" style="text-align:left!important;">'+x.modificacionEstado+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Observación:&nbsp;&nbsp;'+x.observaciones+'</div></div></th></tr><tr><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-bottom:1px solid black!important;border-left:1px solid black!important;">'+contador+'</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Cédula</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombre</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+eventoOrigen+'</td><td align="center">'+x.idFinancierioOrigen+'</td><td align="center" '+color__origen__destino__enero+'>'+x.enero+'</td><td align="center" '+color__origen__destino__enero+'>'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__febrero+'>'+x.febrero+'</td><td align="center" '+color__origen__destino__febrero+'>'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__marzo+'>'+x.marzo+'</td><td align="center" '+color__origen__destino__marzo+'>'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__abril+'>'+x.abril+'</td><td align="center" '+color__origen__destino__abril+'>'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__mayo+'>'+x.mayo+'</td><td align="center" '+color__origen__destino__mayo+'>'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__junio+'>'+x.junio+'</td><td align="center" '+color__origen__destino__junio+'>'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__julio+'>'+x.julio+'</td><td align="center" '+color__origen__destino__julio+'>'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__agosto+'>'+x.agosto+'</td><td align="center" '+color__origen__destino__agosto+'>'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__septiembre+'>'+x.septiembre+'</td><td align="center" '+color__origen__destino__septiembre+'>'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__octubre+'>'+x.octubre+'</td><td align="center" '+color__origen__destino__octubre+'>'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__noviembre+'>'+x.noviembre+'</td><td align="center" '+color__origen__destino__noviembre+'>'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__diciembre+'>'+x.diciembre+'</td><td align="center" '+color__origen__destino__diciembre+'>'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__2+'</td><td align="center">'+origenTotalVigente__2+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Evento</td><td rowspan="1" align="center" style="font-weight:bold;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+eventosDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.idFinancierioDestino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__2+'</td><td align="center">'+destinoTotalVigente__2+'</td></tr>');

				$(".contenedor__lineas__modificaciones3__editar").append('<tr><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Cédula</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombre</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+eventoOrigen+'</td><td align="center">'+x.idFinancierioOrigen+'</td><td align="center">'+x.enero+'</td><td align="center">'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center">'+x.febrero+'</td><td align="center">'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center">'+x.marzo+'</td><td align="center">'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center">'+x.abril+'</td><td align="center">'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center">'+x.mayo+'</td><td align="center">'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center">'+x.junio+'</td><td align="center">'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center">'+x.julio+'</td><td align="center">'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center">'+x.agosto+'</td><td align="center">'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center">'+x.septiembre+'</td><td align="center">'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center">'+x.octubre+'</td><td align="center">'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center">'+x.noviembre+'</td><td align="center">'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center">'+x.diciembre+'</td><td align="center">'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__2+'</td><td align="center">'+origenTotalVigente__2+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Evento</td><td rowspan="1" align="center" style="font-weight:bold;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+eventosDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.idFinancierioDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__2+'</td><td align="center">'+destinoTotalVigente__2+'</td></tr>');


				$("#aprobar__linea"+x.idOrigenDestino).val(x.modificacionEstado);

			}				

			}else{
				$("#tabla__3").remove();
			}

			if (informacionObtenida__honorarios!="" && informacionObtenida__honorarios!=" " && informacionObtenida__honorarios!=undefined && informacionObtenida__honorarios!=null && informacionObtenida__honorarios!="N/A") {


			let origenTotalInicial__1=0;
			let origenTotalVigente__1=0;
			let destinoTotalInicial__1=0;
			let destinoTotalVigente__1=0;

			for(x of informacionObtenida__honorarios){


				let color__origen__destino__enero;
				let color__origen__destino__febrero;
				let color__origen__destino__marzo;
				let color__origen__destino__abril;
				let color__origen__destino__mayo;
				let color__origen__destino__junio;
				let color__origen__destino__julio;
				let color__origen__destino__agosto;
				let color__origen__destino__septiembre;
				let color__origen__destino__octubre;
				let color__origen__destino__noviembre;
				let color__origen__destino__diciembre;


				let color__destino__origen__enero;
				let color__destino__origen__febrero;
				let color__destino__origen__marzo;
				let color__destino__origen__abril;
				let color__destino__origen__mayo;
				let color__destino__origen__junio;
				let color__destino__origen__julio;
				let color__destino__origen__agosto;
				let color__destino__origen__septiembre;
				let color__destino__origen__octubre;
				let color__destino__origen__noviembre;
				let color__destino__origen__diciembre;

				contador++;

				if (x.tipoTramite==1) {
					tipoTramite="Caso 1 (Actividades e items iguales en orígen y destino)";
				}else if(x.tipoTramite==2){
					tipoTramite="Caso 2 (Actividades iguales en orígen y destino)";
				}else if(x.tipoTramite==3){
					tipoTramite="Caso 3 (Actividades diferentes en orígen y destino)";
				}


				origenTotalInicial__1=parseFloat(x.enero) + parseFloat(x.febrero) + parseFloat(x.marzo) + parseFloat(x.abril) + parseFloat(x.mayo) + parseFloat(x.junio) + parseFloat(x.julio) + parseFloat(x.agosto) + parseFloat(x.septiembre) + parseFloat(x.octubre) + parseFloat(x.noviembre) + parseFloat(x.diciembre);

				origenTotalVigente__1=(parseFloat(x.enero)-parseFloat(x.eneroOrigen)) + (parseFloat(x.febrero)-parseFloat(x.febreroOrigen)) + (parseFloat(x.marzo)-parseFloat(x.marzoOrigen)) + (parseFloat(x.abril)-parseFloat(x.abrilOrigen)) + (parseFloat(x.mayo)-parseFloat(x.mayoOrigen)) + (parseFloat(x.junio)-parseFloat(x.junioOrigen)) + (parseFloat(x.julio)-parseFloat(x.julioOrigen)) + (parseFloat(x.agosto)-parseFloat(x.agostoOrigen)) + (parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)) + (parseFloat(x.octubre)-parseFloat(x.octubreOrigen)) + (parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)) + (parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen));



				destinoTotalInicial__1=parseFloat(x.eneroDestino__destino) + parseFloat(x.febreroDestino__destino) + parseFloat(x.marzoDestino__destino) + parseFloat(x.abrilDestino__destino) + parseFloat(x.mayoDestino__destino) + parseFloat(x.junioDestino__destino) + parseFloat(x.julioDestino__destino) + parseFloat(x.agostoDestino__destino) + parseFloat(x.septiembreDestino__destino) + parseFloat(x.octubreDestino__destino) + parseFloat(x.noviembreDestino__destino) + parseFloat(x.diciembreDestino__destino);

				destinoTotalVigente__1=(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)) + (parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)) + (parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)) +(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)) + (parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)) + (parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)) +(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)) + (parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)) + (parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)) + (parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)) + (parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)) + (parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino));

				if (parseFloat(x.eneroOrigen)>0) {
					color__origen__destino__enero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.febreroOrigen)>0) {
					color__origen__destino__febrero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.marzoOrigen)>0) {
					color__origen__destino__marzo='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.abrilOrigen)>0) {
					color__origen__destino__abril='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.mayoOrigen)>0) {
					color__origen__destino__mayo='style="background:blue!important; color:white!important;"';
				}				

				if (parseFloat(x.junioOrigen)>0) {
					color__origen__destino__junio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.julioOrigen)>0) {
					color__origen__destino__julio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.agostoOrigen)>0) {
					color__origen__destino__agosto='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.septiembreOrigen)>0) {
					color__origen__destino__septiembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.octubreOrigen)>0) {
					color__origen__destino__octubre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.noviembreOrigen)>0) {
					color__origen__destino__noviembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.diciembreOrigen)>0) {
					color__origen__destino__diciembre='style="background:blue!important; color:white!important;"';
				}


				if (parseFloat(x.eneroDestino)>0) {
					color__destino__origen__enero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.febreroDestino)>0) {
					color__destino__origen__febrero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.marzoDestino)>0) {
					color__destino__origen__marzo='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.abrilDestino)>0) {
					color__destino__origen__abril='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.mayoDestino)>0) {
					color__destino__origen__mayo='background:cyan!important; color:black!important;';
				}				

				if (parseFloat(x.junioDestino)>0) {
					color__destino__origen__junio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.julioDestino)>0) {
					color__destino__origen__julio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.agostoDestino)>0) {
					color__destino__origen__agosto='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.septiembreDestino)>0) {
					color__destino__origen__septiembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.octubreDestino)>0) {
					color__destino__origen__octubre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.noviembreDestino)>0) {
					color__destino__origen__noviembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.diciembreDestino)>0) {
					color__destino__origen__diciembre='background:cyan!important; color:black!important;';
				}



				$(".contenedor__lineas__modificaciones4").append('<tr><th colspan="32" align="center" style="border-left:1px solid black; border-right:1px solid black;">'+tipoTramite+'</th></tr><tr class="fila__modificaciones__califica__analistas"><th colspan="30" align="center" style="border-left:1px solid black; border-right:1px solid black;"><div class="row"><div class="col col-8" style="text-align:left!important;">'+x.modificacionEstado+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Observación:&nbsp;&nbsp;'+x.observaciones+'</div></div></th></tr><tr><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-bottom:1px solid black!important;border-left:1px solid black!important;">'+contador+'</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombres</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+x.eventosOrigen+'</td><td align="center" '+color__origen__destino__enero+'>'+x.enero+'</td><td align="center" '+color__origen__destino__enero+'>'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__febrero+'>'+x.febrero+'</td><td align="center" '+color__origen__destino__febrero+'>'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__marzo+'>'+x.marzo+'</td><td align="center" '+color__origen__destino__marzo+'>'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__abril+'>'+x.abril+'</td><td align="center" '+color__origen__destino__abril+'>'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__mayo+'>'+x.mayo+'</td><td align="center" '+color__origen__destino__mayo+'>'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__junio+'>'+x.junio+'</td><td align="center" '+color__origen__destino__junio+'>'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__julio+'>'+x.julio+'</td><td align="center" '+color__origen__destino__julio+'>'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__agosto+'>'+x.agosto+'</td><td align="center" '+color__origen__destino__agosto+'>'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__septiembre+'>'+x.septiembre+'</td><td align="center" '+color__origen__destino__septiembre+'>'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__octubre+'>'+x.octubre+'</td><td align="center" '+color__origen__destino__octubre+'>'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__noviembre+'>'+x.noviembre+'</td><td align="center" '+color__origen__destino__noviembre+'>'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__diciembre+'>'+x.diciembre+'</td><td align="center" '+color__origen__destino__diciembre+'>'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__1+'</td><td align="center">'+origenTotalVigente__1+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Nombres</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eventosDestino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__1+'</td><td align="center">'+destinoTotalVigente__1+'</td></tr>');

				$(".contenedor__lineas__modificaciones4__editar").append('<tr><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombres</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+x.eventosOrigen+'</td><td align="center">'+x.enero+'</td><td align="center">'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center">'+x.febrero+'</td><td align="center">'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center">'+x.marzo+'</td><td align="center">'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center">'+x.abril+'</td><td align="center">'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center">'+x.mayo+'</td><td align="center">'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center">'+x.junio+'</td><td align="center">'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center">'+x.julio+'</td><td align="center">'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center">'+x.agosto+'</td><td align="center">'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center">'+x.septiembre+'</td><td align="center">'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center">'+x.octubre+'</td><td align="center">'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center">'+x.noviembre+'</td><td align="center">'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center">'+x.diciembre+'</td><td align="center">'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__1+'</td><td align="center">'+origenTotalVigente__1+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Nombres</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eventosDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__1+'</td><td align="center">'+destinoTotalVigente__1+'</td></tr>');


				$("#aprobar__linea"+x.idOrigenDestino).val(x.modificacionEstado);

			}			

			}else{
				$("#tabla__4").remove();
			}	


			let origenTotalInicial__0=0;
			let origenTotalVigente__0=0;
			let destinoTotalInicial__0=0;
			let destinoTotalVigente__0=0;

			for(x of informacionObtenida){

				contador++;

				let color__origen__destino__enero;
				let color__origen__destino__febrero;
				let color__origen__destino__marzo;
				let color__origen__destino__abril;
				let color__origen__destino__mayo;
				let color__origen__destino__junio;
				let color__origen__destino__julio;
				let color__origen__destino__agosto;
				let color__origen__destino__septiembre;
				let color__origen__destino__octubre;
				let color__origen__destino__noviembre;
				let color__origen__destino__diciembre;


				let color__destino__origen__enero;
				let color__destino__origen__febrero;
				let color__destino__origen__marzo;
				let color__destino__origen__abril;
				let color__destino__origen__mayo;
				let color__destino__origen__junio;
				let color__destino__origen__julio;
				let color__destino__origen__agosto;
				let color__destino__origen__septiembre;
				let color__destino__origen__octubre;
				let color__destino__origen__noviembre;
				let color__destino__origen__diciembre;

				if (x.eventosOrigen=="null" || x.eventosOrigen==null) {
					eventoOrigen='N/A';
				}else{
					eventoOrigen=x.eventosOrigen;
				}

				if (x.eventosDestino=="null" || x.eventosDestino==null) {
					eventosDestino='N/A';
				}else{
					eventosDestino=x.eventosDestino;
				}

				if (x.tipoTramite==1) {
					tipoTramite="Caso 1 (Actividades e items iguales en orígen y destino)";
				}else if(x.tipoTramite==2){
					tipoTramite="Caso 2 (Actividades iguales en orígen y destino)";
				}else if(x.tipoTramite==3){
					tipoTramite="Caso 3 (Actividades diferentes en orígen y destino)";
				}



				origenTotalInicial__0=parseFloat(x.enero) + parseFloat(x.febrero) + parseFloat(x.marzo) + parseFloat(x.abril) + parseFloat(x.mayo) + parseFloat(x.junio) + parseFloat(x.julio) + parseFloat(x.agosto) + parseFloat(x.septiembre) + parseFloat(x.octubre) + parseFloat(x.noviembre) + parseFloat(x.diciembre);

				origenTotalVigente__0=(parseFloat(x.enero)-parseFloat(x.eneroOrigen)) + (parseFloat(x.febrero)-parseFloat(x.febreroOrigen)) + (parseFloat(x.marzo)-parseFloat(x.marzoOrigen)) + (parseFloat(x.abril)-parseFloat(x.abrilOrigen)) + (parseFloat(x.mayo)-parseFloat(x.mayoOrigen)) + (parseFloat(x.junio)-parseFloat(x.junioOrigen)) + (parseFloat(x.julio)-parseFloat(x.julioOrigen)) + (parseFloat(x.agosto)-parseFloat(x.agostoOrigen)) + (parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)) + (parseFloat(x.octubre)-parseFloat(x.octubreOrigen)) + (parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)) + (parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen));



				destinoTotalInicial__0=parseFloat(x.eneroDestino__destino) + parseFloat(x.febreroDestino__destino) + parseFloat(x.marzoDestino__destino) + parseFloat(x.abrilDestino__destino) + parseFloat(x.mayoDestino__destino) + parseFloat(x.junioDestino__destino) + parseFloat(x.julioDestino__destino) + parseFloat(x.agostoDestino__destino) + parseFloat(x.septiembreDestino__destino) + parseFloat(x.octubreDestino__destino) + parseFloat(x.noviembreDestino__destino) + parseFloat(x.diciembreDestino__destino);

				destinoTotalVigente__0=(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)) + (parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)) + (parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)) +(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)) + (parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)) + (parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)) +(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)) + (parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)) + (parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)) + (parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)) + (parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)) + (parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino));

				if (parseFloat(x.eneroOrigen)>0) {
					color__origen__destino__enero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.febreroOrigen)>0) {
					color__origen__destino__febrero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.marzoOrigen)>0) {
					color__origen__destino__marzo='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.abrilOrigen)>0) {
					color__origen__destino__abril='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.mayoOrigen)>0) {
					color__origen__destino__mayo='style="background:blue!important; color:white!important;"';
				}				

				if (parseFloat(x.junioOrigen)>0) {
					color__origen__destino__junio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.julioOrigen)>0) {
					color__origen__destino__julio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.agostoOrigen)>0) {
					color__origen__destino__agosto='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.septiembreOrigen)>0) {
					color__origen__destino__septiembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.octubreOrigen)>0) {
					color__origen__destino__octubre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.noviembreOrigen)>0) {
					color__origen__destino__noviembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.diciembreOrigen)>0) {
					color__origen__destino__diciembre='style="background:blue!important; color:white!important;"';
				}


				if (parseFloat(x.eneroDestino)>0) {
					color__destino__origen__enero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.febreroDestino)>0) {
					color__destino__origen__febrero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.marzoDestino)>0) {
					color__destino__origen__marzo='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.abrilDestino)>0) {
					color__destino__origen__abril='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.mayoDestino)>0) {
					color__destino__origen__mayo='background:cyan!important; color:black!important;';
				}				

				if (parseFloat(x.junioDestino)>0) {
					color__destino__origen__junio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.julioDestino)>0) {
					color__destino__origen__julio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.agostoDestino)>0) {
					color__destino__origen__agosto='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.septiembreDestino)>0) {
					color__destino__origen__septiembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.octubreDestino)>0) {
					color__destino__origen__octubre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.noviembreDestino)>0) {
					color__destino__origen__noviembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.diciembreDestino)>0) {
					color__destino__origen__diciembre='background:cyan!important; color:black!important;';
				}


				$(".contenedor__lineas__modificaciones5").append('<tr><th colspan="32" align="center" style="border-left:1px solid black; border-right:1px solid black;">'+tipoTramite+'</th></tr><tr class="fila__modificaciones__califica__analistas"><th colspan="30" align="center" style="border-left:1px solid black; border-right:1px solid black;"><div class="row"><div class="col col-8" style="text-align:left!important;">'+x.modificacionEstado+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Observación:&nbsp;&nbsp;'+x.observaciones+'</div></div></th></tr><tr><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-bottom:1px solid black!important;border-left:1px solid black!important;">'+contador+'</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Evento</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+eventoOrigen+'</td><td align="center">'+x.idFinancierioOrigen+'</td><td align="center" '+color__origen__destino__enero+'>'+x.enero+'</td><td align="center" '+color__origen__destino__enero+'>'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__febrero+'>'+x.febrero+'</td><td align="center" '+color__origen__destino__febrero+'>'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__marzo+'>'+x.marzo+'</td><td align="center" '+color__origen__destino__marzo+'>'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__abril+'>'+x.abril+'</td><td align="center" '+color__origen__destino__abril+'>'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__mayo+'>'+x.mayo+'</td><td align="center" '+color__origen__destino__mayo+'>'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__junio+'>'+x.junio+'</td><td align="center" '+color__origen__destino__junio+'>'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__julio+'>'+x.julio+'</td><td align="center" '+color__origen__destino__julio+'>'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__agosto+'>'+x.agosto+'</td><td align="center" '+color__origen__destino__agosto+'>'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__septiembre+'>'+x.septiembre+'</td><td align="center" '+color__origen__destino__septiembre+'>'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__octubre+'>'+x.octubre+'</td><td align="center" '+color__origen__destino__octubre+'>'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__noviembre+'>'+x.noviembre+'</td><td align="center" '+color__origen__destino__noviembre+'>'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__diciembre+'>'+x.diciembre+'</td><td align="center" '+color__origen__destino__diciembre+'>'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__0+'</td><td align="center">'+origenTotalVigente__0+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Evento</td><td rowspan="1" align="center" style="font-weight:bold;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+eventosDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.idFinancierioDestino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__0+'</td><td align="center">'+destinoTotalVigente__0+'</td></tr>');

				$(".contenedor__lineas__modificaciones5__editar").append('<tr><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Evento</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+eventoOrigen+'</td><td align="center">'+x.idFinancierioOrigen+'</td><td align="center">'+x.enero+'</td><td align="center">'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center">'+x.febrero+'</td><td align="center">'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center">'+x.marzo+'</td><td align="center">'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center">'+x.abril+'</td><td align="center">'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center">'+x.mayo+'</td><td align="center">'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center">'+x.junio+'</td><td align="center">'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center">'+x.julio+'</td><td align="center">'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center">'+x.agosto+'</td><td align="center">'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center">'+x.septiembre+'</td><td align="center">'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center">'+x.octubre+'</td><td align="center">'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center">'+x.noviembre+'</td><td align="center">'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center">'+x.diciembre+'</td><td align="center">'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__0+'</td><td align="center">'+origenTotalVigente__0+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Evento</td><td rowspan="1" align="center" style="font-weight:bold;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+eventosDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.idFinancierioDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__0+'</td><td align="center">'+destinoTotalVigente__0+'</td></tr>');


				$("#aprobar__linea"+x.idOrigenDestino).val(x.modificacionEstado);

			}

			execelGenerados($(".excelProyectosMatricez__0"),"tabla__0__modificaciones__editar","Modificación");
			execelGenerados($(".excelProyectosMatricez__1"),"tabla__1__modificaciones__editar","Modificación");
			execelGenerados($(".excelProyectosMatricez__2"),"tabla__2__modificaciones__editar","Modificación");
			execelGenerados($(".excelProyectosMatricez__3"),"tabla__3__modificaciones__editar","Modificación");
			execelGenerados($(".excelProyectosMatricez__4"),"tabla__4__modificaciones__editar","Modificación");
			execelGenerados($(".excelProyectosMatricez__5"),"tabla__5__modificaciones__editar","Modificación");

			if ($("#idRolAd").val()==4) {

				selector__recomendar__analista__planificacion__modificaciones__coordinadores($(".selector__modificacion__lineas"));

			}else if ($("#idRolAd").val()==2) {

				selector__recomendar__analista__planificacion__modificaciones__diectores__quipux($(".selector__modificacion__lineas"));

			}

			let informacionObtenida__documentos=elementos['informacionObtenida__documentos'];

			for(x of informacionObtenida__documentos){

				if(x.documentoPlanificacion!="" && x.documentoPlanificacion!=" " && x.documentoPlanificacion!=undefined && x.documentoPlanificacion!=null){

					$("#documentoPlanificacion").attr('href','documentos/modificacion/informe/planificacion/'+x.documentoPlanificacion);

				}

			}	

		});

		},
		error:function(){

		}
				
	});		

});

}


var funcion__recomendar__planificacion__recomendar=function(tbody,table){

$(tbody).on("click","button.recomendar__modificaciones__planificacion__recomendacion",function(e){

	let data=table.row($(this).parents("tr")).data();

	$(".textos__titulos").text(data[1]);

	$("#idTramite").val(data[4]);
	$("#idOrganismo").val(data[5]);

	let paqueteDeDatos = new FormData();

	paqueteDeDatos.append('tipo','lineas__modificaciones');
	paqueteDeDatos.append('idLinea',data[4]);
	$(".idOrganismo__lineas").val(data[5]);


	$.ajax({

		type:"POST",
		url:"modelosBd/inserta/seleccionaAcciones.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

		$.getScript("layout/scripts/js/modificacionRevisor/selector.js",function(){
        
			let elementos=JSON.parse(response);
			let informacionObtenida=elementos['informacionObtenida'];
			let informacionObtenida__honorarios=elementos['informacionObtenida__honorarios'];
			let informacionObtenida__honorarios__items=elementos['informacionObtenida__honorarios__items'];
			let informacionObtenida__sueldos__salarios=elementos['informacionObtenida__sueldos__salarios'];
			let informacionObtenida__sueldos__items=elementos['informacionObtenida__sueldos__items'];
			let informacionObtenida__desvinculaciones=elementos['informacionObtenida__desvinculaciones'];

			let contador=0;

			let eventoOrigen="";
			let eventosDestino="";
			let tipoTramite="";		

			$(".contenedor__lineas__modificaciones0").html(" ");
			$(".contenedor__lineas__modificaciones1").html(" ");
			$(".contenedor__lineas__modificaciones2").html(" ");
			$(".contenedor__lineas__modificaciones3").html(" ");
			$(".contenedor__lineas__modificaciones4").html(" ");
			$(".contenedor__lineas__modificaciones5").html(" ");	



			if (informacionObtenida__desvinculaciones!="" && informacionObtenida__desvinculaciones!=" " && informacionObtenida__desvinculaciones!=undefined && informacionObtenida__desvinculaciones!=null && informacionObtenida__desvinculaciones!="N/A") {

				let origenTotalInicial__5=0;
				let origenTotalVigente__5=0;
				let destinoTotalInicial__5=0;

				for(x of informacionObtenida__desvinculaciones){

					contador++;


					let color__origen__destino__enero;
					let color__origen__destino__febrero;
					let color__origen__destino__marzo;
					let color__origen__destino__abril;
					let color__origen__destino__mayo;
					let color__origen__destino__junio;
					let color__origen__destino__julio;
					let color__origen__destino__agosto;
					let color__origen__destino__septiembre;
					let color__origen__destino__octubre;
					let color__origen__destino__noviembre;
					let color__origen__destino__diciembre;


					let color__destino__origen__enero;
					let color__destino__origen__febrero;
					let color__destino__origen__marzo;
					let color__destino__origen__abril;
					let color__destino__origen__mayo;
					let color__destino__origen__junio;
					let color__destino__origen__julio;
					let color__destino__origen__agosto;
					let color__destino__origen__septiembre;
					let color__destino__origen__octubre;
					let color__destino__origen__noviembre;
					let color__destino__origen__diciembre;



					if (x.eventosOrigen=="null" || x.eventosOrigen==null) {
						eventoOrigen='N/A';
					}else{
						eventoOrigen=x.eventosOrigen;
					}

					if (x.eventosDestino=="null" || x.eventosDestino==null) {
						eventosDestino='N/A';
					}else{
						eventosDestino=x.eventosDestino;
					}

					if (x.tipoTramite==1) {
						tipoTramite="TRÁMITE DE DESVINCULACIÓN";
					}else if(x.tipoTramite==2){
						tipoTramite="TRÁMITE DE DESVINCULACIÓN";
					}else if(x.tipoTramite==3){
						tipoTramite="TRÁMITE DE DESVINCULACIÓN";
					}

					origenTotalInicial__5=parseFloat(x.enero) + parseFloat(x.febrero) + parseFloat(x.marzo) + parseFloat(x.abril) + parseFloat(x.mayo) + parseFloat(x.junio) + parseFloat(x.julio) + parseFloat(x.agosto) + parseFloat(x.septiembre) + parseFloat(x.octubre) + parseFloat(x.noviembre) + parseFloat(x.diciembre);

					origenTotalVigente__5=(parseFloat(x.enero)-parseFloat(x.eneroOrigen)) + (parseFloat(x.febrero)-parseFloat(x.febreroOrigen)) + (parseFloat(x.marzo)-parseFloat(x.marzoOrigen)) + (parseFloat(x.abril)-parseFloat(x.abrilOrigen)) + (parseFloat(x.mayo)-parseFloat(x.mayoOrigen)) + (parseFloat(x.junio)-parseFloat(x.junioOrigen)) + (parseFloat(x.julio)-parseFloat(x.julioOrigen)) + (parseFloat(x.agosto)-parseFloat(x.agostoOrigen)) + (parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)) + (parseFloat(x.octubre)-parseFloat(x.octubreOrigen)) + (parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)) + (parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen));


					destinoTotalInicial__5=parseFloat(x.eneroDestino) + parseFloat(x.febreroDestino) + parseFloat(x.marzoDestino) + parseFloat(x.abrilDestino) + parseFloat(x.mayoDestino) + parseFloat(x.junioDestino) + parseFloat(x.julioDestino) + parseFloat(x.agostoDestino) + parseFloat(x.septiembreDestino) + parseFloat(x.octubreDestino) + parseFloat(x.noviembreDestino) + parseFloat(x.diciembreDestino);

					$(".contenedor__lineas__modificaciones0").append('<tr><th colspan="32" align="center" style="border-left:1px solid black; border-right:1px solid black;">Caso 1 (Actividades e items iguales en orígen y destino)</th></tr><tr class="fila__modificaciones__califica__analistas"><th colspan="30" align="center" style="border-left:1px solid black; border-right:1px solid black;"><div class="row"><div class="col col-8" style="text-align:left!important;">'+x.modificacionEstado+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Observación:&nbsp;&nbsp;'+x.observaciones+'</div></div></th></tr><<tr><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-bottom:1px solid black!important;border-left:1px solid black!important;">'+contador+'</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Cédula</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombre</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+eventoOrigen+'</td><td align="center">'+x.idFinancierioOrigen+'</td><td align="center" '+color__origen__destino__enero+'>'+x.enero+'</td><td align="center" '+color__origen__destino__enero+'>'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__febrero+'>'+x.febrero+'</td><td align="center" '+color__origen__destino__febrero+'>'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__marzo+'>'+x.marzo+'</td><td align="center" '+color__origen__destino__marzo+'>'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__abril+'>'+x.abril+'</td><td align="center" '+color__origen__destino__abril+'>'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__mayo+'>'+x.mayo+'</td><td align="center" '+color__origen__destino__mayo+'>'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__junio+'>'+x.junio+'</td><td align="center" '+color__origen__destino__junio+'>'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__julio+'>'+x.julio+'</td><td align="center" '+color__origen__destino__julio+'>'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__agosto+'>'+x.agosto+'</td><td align="center" '+color__origen__destino__agosto+'>'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__septiembre+'>'+x.septiembre+'</td><td align="center" '+color__origen__destino__septiembre+'>'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__octubre+'>'+x.octubre+'</td><td align="center" '+color__origen__destino__octubre+'>'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__noviembre+'>'+x.noviembre+'</td><td align="center" '+color__origen__destino__noviembre+'>'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__diciembre+'>'+x.diciembre+'</td><td align="center" '+color__origen__destino__diciembre+'>'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__5+'</td><td align="center">'+origenTotalVigente__5+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold;">Enero</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero</td> <td rowspan="1" align="center" style="font-weight:bold;">Marzo</td> <td rowspan="1" align="center" style="font-weight:bold;">Abril</td> <td rowspan="1" align="center" style="font-weight:bold;">Mayo</td> <td rowspan="1" align="center" style="font-weight:bold;">Junio</td> <td rowspan="1" align="center" style="font-weight:bold;">Julio</td> <td rowspan="1" align="center" style="font-weight:bold;">Agosto</td> <td rowspan="1" align="center" style="font-weight:bold;">Septiembre</td> <td rowspan="1" align="center" style="font-weight:bold;">Octubre</td> <td rowspan="1" align="center" style="font-weight:bold;">Noviembre</td> <td rowspan="1" align="center" style="font-weight:bold;">Diciembre</td><td style="font-weight:bold;">Total Inicial</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.nombreItem+'</td><td style="border-bottom:1px solid black!important;">'+x.eneroDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.febreroDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.marzoDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.abrilDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.mayoDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.junioDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.julioDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.agostoDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.septiembreDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.octubreDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.noviembreDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.diciembreDestino+'</td><td align="center">'+destinoTotalInicial__5+'</td></tr>');

					$(".contenedor__lineas__modificaciones0__editar").append('<tr><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Cédula</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombre</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+eventoOrigen+'</td><td align="center">'+x.idFinancierioOrigen+'</td><td align="center" '+color__origen__destino__enero+'>'+x.enero+'</td><td align="center" '+color__origen__destino__enero+'>'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__febrero+'>'+x.febrero+'</td><td align="center" '+color__origen__destino__febrero+'>'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__marzo+'>'+x.marzo+'</td><td align="center" '+color__origen__destino__marzo+'>'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__abril+'>'+x.abril+'</td><td align="center" '+color__origen__destino__abril+'>'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__mayo+'>'+x.mayo+'</td><td align="center" '+color__origen__destino__mayo+'>'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__junio+'>'+x.junio+'</td><td align="center" '+color__origen__destino__junio+'>'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__julio+'>'+x.julio+'</td><td align="center" '+color__origen__destino__julio+'>'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__agosto+'>'+x.agosto+'</td><td align="center" '+color__origen__destino__agosto+'>'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__septiembre+'>'+x.septiembre+'</td><td align="center" '+color__origen__destino__septiembre+'>'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__octubre+'>'+x.octubre+'</td><td align="center" '+color__origen__destino__octubre+'>'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__noviembre+'>'+x.noviembre+'</td><td align="center" '+color__origen__destino__noviembre+'>'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__diciembre+'>'+x.diciembre+'</td><td align="center" '+color__origen__destino__diciembre+'>'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__5+'</td><td align="center">'+origenTotalVigente__5+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold;">Enero</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero</td> <td rowspan="1" align="center" style="font-weight:bold;">Marzo</td> <td rowspan="1" align="center" style="font-weight:bold;">Abril</td> <td rowspan="1" align="center" style="font-weight:bold;">Mayo</td> <td rowspan="1" align="center" style="font-weight:bold;">Junio</td> <td rowspan="1" align="center" style="font-weight:bold;">Julio</td> <td rowspan="1" align="center" style="font-weight:bold;">Agosto</td> <td rowspan="1" align="center" style="font-weight:bold;">Septiembre</td> <td rowspan="1" align="center" style="font-weight:bold;">Octubre</td> <td rowspan="1" align="center" style="font-weight:bold;">Noviembre</td> <td rowspan="1" align="center" style="font-weight:bold;">Diciembre</td><td style="font-weight:bold;">Total Inicial</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.nombreItem+'</td><td style="border-bottom:1px solid black!important;">'+x.eneroDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.febreroDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.marzoDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.abrilDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.mayoDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.junioDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.julioDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.agostoDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.septiembreDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.octubreDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.noviembreDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.diciembreDestino+'</td><td align="center">'+destinoTotalInicial__5+'</td></tr>');


					$("#aprobar__linea"+x.idOrigenDestino).val(x.modificacionEstado);

				}				

			}else{
				$("#tabla__0").remove();
			}

			if (informacionObtenida__sueldos__items!="" && informacionObtenida__sueldos__items!=" " && informacionObtenida__sueldos__items!=undefined && informacionObtenida__sueldos__items!=null && informacionObtenida__sueldos__items!="N/A") {

			let origenTotalInicial__4=0;
			let origenTotalVigente__4=0;
			let destinoTotalInicial__4=0;
			let destinoTotalVigente__4=0;

			for(x of informacionObtenida__sueldos__items){

				contador++;


				let color__origen__destino__enero;
				let color__origen__destino__febrero;
				let color__origen__destino__marzo;
				let color__origen__destino__abril;
				let color__origen__destino__mayo;
				let color__origen__destino__junio;
				let color__origen__destino__julio;
				let color__origen__destino__agosto;
				let color__origen__destino__septiembre;
				let color__origen__destino__octubre;
				let color__origen__destino__noviembre;
				let color__origen__destino__diciembre;


				let color__destino__origen__enero;
				let color__destino__origen__febrero;
				let color__destino__origen__marzo;
				let color__destino__origen__abril;
				let color__destino__origen__mayo;
				let color__destino__origen__junio;
				let color__destino__origen__julio;
				let color__destino__origen__agosto;
				let color__destino__origen__septiembre;
				let color__destino__origen__octubre;
				let color__destino__origen__noviembre;
				let color__destino__origen__diciembre;



				if (x.eventosOrigen=="null" || x.eventosOrigen==null) {
					eventoOrigen='N/A';
				}else{
					eventoOrigen=x.eventosOrigen;
				}

				if (x.eventosDestino=="null" || x.eventosDestino==null) {
					eventosDestino='N/A';
				}else{
					eventosDestino=x.eventosDestino;
				}

				if (x.tipoTramite==1) {
					tipoTramite="Caso 1 (Actividades e items iguales en orígen y destino)";
				}else if(x.tipoTramite==2){
					tipoTramite="Caso 2 (Actividades iguales en orígen y destino)";
				}else if(x.tipoTramite==3){
					tipoTramite="Caso 3 (Actividades diferentes en orígen y destino)";
				}


				origenTotalInicial__4=parseFloat(x.enero) + parseFloat(x.febrero) + parseFloat(x.marzo) + parseFloat(x.abril) + parseFloat(x.mayo) + parseFloat(x.junio) + parseFloat(x.julio) + parseFloat(x.agosto) + parseFloat(x.septiembre) + parseFloat(x.octubre) + parseFloat(x.noviembre) + parseFloat(x.diciembre);

				origenTotalVigente__4=(parseFloat(x.enero)-parseFloat(x.eneroOrigen)) + (parseFloat(x.febrero)-parseFloat(x.febreroOrigen)) + (parseFloat(x.marzo)-parseFloat(x.marzoOrigen)) + (parseFloat(x.abril)-parseFloat(x.abrilOrigen)) + (parseFloat(x.mayo)-parseFloat(x.mayoOrigen)) + (parseFloat(x.junio)-parseFloat(x.junioOrigen)) + (parseFloat(x.julio)-parseFloat(x.julioOrigen)) + (parseFloat(x.agosto)-parseFloat(x.agostoOrigen)) + (parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)) + (parseFloat(x.octubre)-parseFloat(x.octubreOrigen)) + (parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)) + (parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen));



				destinoTotalInicial__4=parseFloat(x.eneroDestino__destino) + parseFloat(x.febreroDestino__destino) + parseFloat(x.marzoDestino__destino) + parseFloat(x.abrilDestino__destino) + parseFloat(x.mayoDestino__destino) + parseFloat(x.junioDestino__destino) + parseFloat(x.julioDestino__destino) + parseFloat(x.agostoDestino__destino) + parseFloat(x.septiembreDestino__destino) + parseFloat(x.octubreDestino__destino) + parseFloat(x.noviembreDestino__destino) + parseFloat(x.diciembreDestino__destino);

				destinoTotalVigente__4=(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)) + (parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)) + (parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)) +(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)) + (parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)) + (parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)) +(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)) + (parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)) + (parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)) + (parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)) + (parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)) + (parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino));	

				if (parseFloat(x.eneroOrigen)>0) {
					color__origen__destino__enero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.febreroOrigen)>0) {
					color__origen__destino__febrero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.marzoOrigen)>0) {
					color__origen__destino__marzo='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.abrilOrigen)>0) {
					color__origen__destino__abril='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.mayoOrigen)>0) {
					color__origen__destino__mayo='style="background:blue!important; color:white!important;"';
				}				

				if (parseFloat(x.junioOrigen)>0) {
					color__origen__destino__junio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.julioOrigen)>0) {
					color__origen__destino__julio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.agostoOrigen)>0) {
					color__origen__destino__agosto='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.septiembreOrigen)>0) {
					color__origen__destino__septiembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.octubreOrigen)>0) {
					color__origen__destino__octubre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.noviembreOrigen)>0) {
					color__origen__destino__noviembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.diciembreOrigen)>0) {
					color__origen__destino__diciembre='style="background:blue!important; color:white!important;"';
				}


				if (parseFloat(x.eneroDestino)>0) {
					color__destino__origen__enero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.febreroDestino)>0) {
					color__destino__origen__febrero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.marzoDestino)>0) {
					color__destino__origen__marzo='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.abrilDestino)>0) {
					color__destino__origen__abril='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.mayoDestino)>0) {
					color__destino__origen__mayo='background:cyan!important; color:black!important;';
				}				

				if (parseFloat(x.junioDestino)>0) {
					color__destino__origen__junio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.julioDestino)>0) {
					color__destino__origen__julio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.agostoDestino)>0) {
					color__destino__origen__agosto='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.septiembreDestino)>0) {
					color__destino__origen__septiembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.octubreDestino)>0) {
					color__destino__origen__octubre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.noviembreDestino)>0) {
					color__destino__origen__noviembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.diciembreDestino)>0) {
					color__destino__origen__diciembre='background:cyan!important; color:black!important;';
				}


				$(".contenedor__lineas__modificaciones1").append('<tr><th colspan="32" align="center" style="border-left:1px solid black; border-right:1px solid black;">'+tipoTramite+'</th></tr><tr class="fila__modificaciones__califica__analistas"><th colspan="30" align="center" style="border-left:1px solid black; border-right:1px solid black;"><div class="row"><div class="col col-8" style="text-align:left!important;">'+x.modificacionEstado+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Observación:&nbsp;&nbsp;'+x.observaciones+'</div></div></th></tr><tr><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-bottom:1px solid black!important;border-left:1px solid black!important;">'+contador+'</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Cédula</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombre</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+eventoOrigen+'</td><td align="center">'+x.idFinancierioOrigen+'</td><td align="center" '+color__origen__destino__enero+'>'+x.enero+'</td><td align="center" '+color__origen__destino__enero+'>'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__febrero+'>'+x.febrero+'</td><td align="center" '+color__origen__destino__febrero+'>'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__marzo+'>'+x.marzo+'</td><td align="center" '+color__origen__destino__marzo+'>'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__abril+'>'+x.abril+'</td><td align="center" '+color__origen__destino__abril+'>'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__mayo+'>'+x.mayo+'</td><td align="center" '+color__origen__destino__mayo+'>'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__junio+'>'+x.junio+'</td><td align="center" '+color__origen__destino__junio+'>'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__julio+'>'+x.julio+'</td><td align="center" '+color__origen__destino__julio+'>'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__agosto+'>'+x.agosto+'</td><td align="center" '+color__origen__destino__agosto+'>'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__septiembre+'>'+x.septiembre+'</td><td align="center" '+color__origen__destino__septiembre+'>'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__octubre+'>'+x.octubre+'</td><td align="center" '+color__origen__destino__octubre+'>'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__noviembre+'>'+x.noviembre+'</td><td align="center" '+color__origen__destino__noviembre+'>'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__diciembre+'>'+x.diciembre+'</td><td align="center" '+color__origen__destino__diciembre+'>'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__4+'</td><td align="center">'+origenTotalVigente__4+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Evento</td><td rowspan="1" align="center" style="font-weight:bold;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+eventosDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.idFinancierioDestino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__4+'</td><td align="center">'+destinoTotalVigente__4+'</td></tr>');

				$(".contenedor__lineas__modificaciones1__editar").append('<tr><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Cédula</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombre</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+eventoOrigen+'</td><td align="center">'+x.idFinancierioOrigen+'</td><td align="center">'+x.enero+'</td><td align="center">'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center">'+x.febrero+'</td><td align="center">'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center">'+x.marzo+'</td><td align="center">'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center">'+x.abril+'</td><td align="center">'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center">'+x.mayo+'</td><td align="center">'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center">'+x.junio+'</td><td align="center">'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center">'+x.julio+'</td><td align="center">'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center">'+x.agosto+'</td><td align="center">'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center">'+x.septiembre+'</td><td align="center">'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center">'+x.octubre+'</td><td align="center">'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center">'+x.noviembre+'</td><td align="center">'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center">'+x.diciembre+'</td><td align="center">'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__4+'</td><td align="center">'+origenTotalVigente__4+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Evento</td><td rowspan="1" align="center" style="font-weight:bold;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+eventosDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.idFinancierioDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__4+'</td><td align="center">'+destinoTotalVigente__4+'</td></tr>');

				$("#aprobar__linea"+x.idOrigenDestino).val(x.modificacionEstado);

			}				

			}else{
				$("#tabla__1").remove();
			}

			if (informacionObtenida__sueldos__salarios!="" && informacionObtenida__sueldos__salarios!=" " && informacionObtenida__sueldos__salarios!=undefined && informacionObtenida__sueldos__salarios!=null & informacionObtenida__sueldos__salarios!="N/A") {


			let origenTotalInicial__3=0;
			let origenTotalVigente__3=0;
			let destinoTotalInicial__3=0;
			let destinoTotalVigente__3=0;


			for(x of informacionObtenida__sueldos__salarios){

				contador++;

				let color__origen__destino__enero;
				let color__origen__destino__febrero;
				let color__origen__destino__marzo;
				let color__origen__destino__abril;
				let color__origen__destino__mayo;
				let color__origen__destino__junio;
				let color__origen__destino__julio;
				let color__origen__destino__agosto;
				let color__origen__destino__septiembre;
				let color__origen__destino__octubre;
				let color__origen__destino__noviembre;
				let color__origen__destino__diciembre;


				let color__destino__origen__enero;
				let color__destino__origen__febrero;
				let color__destino__origen__marzo;
				let color__destino__origen__abril;
				let color__destino__origen__mayo;
				let color__destino__origen__junio;
				let color__destino__origen__julio;
				let color__destino__origen__agosto;
				let color__destino__origen__septiembre;
				let color__destino__origen__octubre;
				let color__destino__origen__noviembre;
				let color__destino__origen__diciembre;


				if (x.tipoTramite==1) {
					tipoTramite="Caso 1 (Actividades e items iguales en orígen y destino)";
				}else if(x.tipoTramite==2){
					tipoTramite="Caso 2 (Actividades iguales en orígen y destino)";
				}else if(x.tipoTramite==3){
					tipoTramite="Caso 3 (Actividades diferentes en orígen y destino)";
				}



				origenTotalInicial__3=parseFloat(x.enero) + parseFloat(x.febrero) + parseFloat(x.marzo) + parseFloat(x.abril) + parseFloat(x.mayo) + parseFloat(x.junio) + parseFloat(x.julio) + parseFloat(x.agosto) + parseFloat(x.septiembre) + parseFloat(x.octubre) + parseFloat(x.noviembre) + parseFloat(x.diciembre);

				origenTotalVigente__3=(parseFloat(x.enero)-parseFloat(x.eneroOrigen)) + (parseFloat(x.febrero)-parseFloat(x.febreroOrigen)) + (parseFloat(x.marzo)-parseFloat(x.marzoOrigen)) + (parseFloat(x.abril)-parseFloat(x.abrilOrigen)) + (parseFloat(x.mayo)-parseFloat(x.mayoOrigen)) + (parseFloat(x.junio)-parseFloat(x.junioOrigen)) + (parseFloat(x.julio)-parseFloat(x.julioOrigen)) + (parseFloat(x.agosto)-parseFloat(x.agostoOrigen)) + (parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)) + (parseFloat(x.octubre)-parseFloat(x.octubreOrigen)) + (parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)) + (parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen));



				destinoTotalInicial__3=parseFloat(x.eneroDestino__destino) + parseFloat(x.febreroDestino__destino) + parseFloat(x.marzoDestino__destino) + parseFloat(x.abrilDestino__destino) + parseFloat(x.mayoDestino__destino) + parseFloat(x.junioDestino__destino) + parseFloat(x.julioDestino__destino) + parseFloat(x.agostoDestino__destino) + parseFloat(x.septiembreDestino__destino) + parseFloat(x.octubreDestino__destino) + parseFloat(x.noviembreDestino__destino) + parseFloat(x.diciembreDestino__destino);

				destinoTotalVigente__3=(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)) + (parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)) + (parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)) +(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)) + (parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)) + (parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)) +(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)) + (parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)) + (parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)) + (parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)) + (parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)) + (parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino));

				if (parseFloat(x.eneroOrigen)>0) {
					color__origen__destino__enero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.febreroOrigen)>0) {
					color__origen__destino__febrero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.marzoOrigen)>0) {
					color__origen__destino__marzo='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.abrilOrigen)>0) {
					color__origen__destino__abril='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.mayoOrigen)>0) {
					color__origen__destino__mayo='style="background:blue!important; color:white!important;"';
				}				

				if (parseFloat(x.junioOrigen)>0) {
					color__origen__destino__junio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.julioOrigen)>0) {
					color__origen__destino__julio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.agostoOrigen)>0) {
					color__origen__destino__agosto='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.septiembreOrigen)>0) {
					color__origen__destino__septiembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.octubreOrigen)>0) {
					color__origen__destino__octubre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.noviembreOrigen)>0) {
					color__origen__destino__noviembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.diciembreOrigen)>0) {
					color__origen__destino__diciembre='style="background:blue!important; color:white!important;"';
				}


				if (parseFloat(x.eneroDestino)>0) {
					color__destino__origen__enero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.febreroDestino)>0) {
					color__destino__origen__febrero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.marzoDestino)>0) {
					color__destino__origen__marzo='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.abrilDestino)>0) {
					color__destino__origen__abril='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.mayoDestino)>0) {
					color__destino__origen__mayo='background:cyan!important; color:black!important;';
				}				

				if (parseFloat(x.junioDestino)>0) {
					color__destino__origen__junio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.julioDestino)>0) {
					color__destino__origen__julio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.agostoDestino)>0) {
					color__destino__origen__agosto='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.septiembreDestino)>0) {
					color__destino__origen__septiembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.octubreDestino)>0) {
					color__destino__origen__octubre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.noviembreDestino)>0) {
					color__destino__origen__noviembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.diciembreDestino)>0) {
					color__destino__origen__diciembre='background:cyan!important; color:black!important;';
				}



				$(".contenedor__lineas__modificaciones2").append('<tr><th colspan="32" align="center" style="border-left:1px solid black; border-right:1px solid black;">'+tipoTramite+'</th></tr><tr class="fila__modificaciones__califica__analistas"><th colspan="30" align="center" style="border-left:1px solid black; border-right:1px solid black;"><div class="row"><div class="col col-8" style="text-align:left!important;">'+x.modificacionEstado+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Observación:&nbsp;&nbsp;'+x.observaciones+'</div></div></th></tr><tr><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-bottom:1px solid black!important;border-left:1px solid black!important;">'+contador+'</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombres</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+x.eventosOrigen+'</td><td align="center" '+color__origen__destino__enero+'>'+x.enero+'</td><td align="center" '+color__origen__destino__enero+'>'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__febrero+'>'+x.febrero+'</td><td align="center" '+color__origen__destino__febrero+'>'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__marzo+'>'+x.marzo+'</td><td align="center" '+color__origen__destino__marzo+'>'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__abril+'>'+x.abril+'</td><td align="center" '+color__origen__destino__abril+'>'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__mayo+'>'+x.mayo+'</td><td align="center" '+color__origen__destino__mayo+'>'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__junio+'>'+x.junio+'</td><td align="center" '+color__origen__destino__junio+'>'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__julio+'>'+x.julio+'</td><td align="center" '+color__origen__destino__julio+'>'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__agosto+'>'+x.agosto+'</td><td align="center" '+color__origen__destino__agosto+'>'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__septiembre+'>'+x.septiembre+'</td><td align="center" '+color__origen__destino__septiembre+'>'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__octubre+'>'+x.octubre+'</td><td align="center" '+color__origen__destino__octubre+'>'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__noviembre+'>'+x.noviembre+'</td><td align="center" '+color__origen__destino__noviembre+'>'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__diciembre+'>'+x.diciembre+'</td><td align="center" '+color__origen__destino__diciembre+'>'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__3+'</td><td align="center">'+origenTotalVigente__3+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Nombres</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eventosDestino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__3+'</td><td align="center">'+destinoTotalVigente__3+'</td></tr>');

				$(".contenedor__lineas__modificaciones2__editar").append('<tr><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombres</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+x.eventosOrigen+'</td><td align="center">'+x.enero+'</td><td align="center">'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center">'+x.febrero+'</td><td align="center">'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center">'+x.marzo+'</td><td align="center">'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center">'+x.abril+'</td><td align="center">'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center">'+x.mayo+'</td><td align="center">'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center">'+x.junio+'</td><td align="center">'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center">'+x.julio+'</td><td align="center">'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center">'+x.agosto+'</td><td align="center">'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center">'+x.septiembre+'</td><td align="center">'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center">'+x.octubre+'</td><td align="center">'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center">'+x.noviembre+'</td><td align="center">'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center">'+x.diciembre+'</td><td align="center">'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__3+'</td><td align="center">'+origenTotalVigente__3+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Nombres</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eventosDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__3+'</td><td align="center">'+destinoTotalVigente__3+'</td></tr>');


				$("#aprobar__linea"+x.idOrigenDestino).val(x.modificacionEstado);

			}		

			}else{
				$("#tabla__2").remove();
			}

			if (informacionObtenida__honorarios__items!="" && informacionObtenida__honorarios__items!=" " && informacionObtenida__honorarios__items!=undefined && informacionObtenida__honorarios__items!=null && informacionObtenida__honorarios__items!="N/A") {

			let origenTotalInicial__2=0;
			let origenTotalVigente__2=0;
			let destinoTotalInicial__2=0;
			let destinoTotalVigente__2=0;

			for(x of informacionObtenida__honorarios__items){

				contador++;

				let color__origen__destino__enero;
				let color__origen__destino__febrero;
				let color__origen__destino__marzo;
				let color__origen__destino__abril;
				let color__origen__destino__mayo;
				let color__origen__destino__junio;
				let color__origen__destino__julio;
				let color__origen__destino__agosto;
				let color__origen__destino__septiembre;
				let color__origen__destino__octubre;
				let color__origen__destino__noviembre;
				let color__origen__destino__diciembre;


				let color__destino__origen__enero;
				let color__destino__origen__febrero;
				let color__destino__origen__marzo;
				let color__destino__origen__abril;
				let color__destino__origen__mayo;
				let color__destino__origen__junio;
				let color__destino__origen__julio;
				let color__destino__origen__agosto;
				let color__destino__origen__septiembre;
				let color__destino__origen__octubre;
				let color__destino__origen__noviembre;
				let color__destino__origen__diciembre;



				if (x.eventosOrigen=="null" || x.eventosOrigen==null) {
					eventoOrigen='N/A';
				}else{
					eventoOrigen=x.eventosOrigen;
				}

				if (x.eventosDestino=="null" || x.eventosDestino==null) {
					eventosDestino='N/A';
				}else{
					eventosDestino=x.eventosDestino;
				}

				if (x.tipoTramite==1) {
					tipoTramite="Caso 1 (Actividades e items iguales en orígen y destino)";
				}else if(x.tipoTramite==2){
					tipoTramite="Caso 2 (Actividades iguales en orígen y destino)";
				}else if(x.tipoTramite==3){
					tipoTramite="Caso 3 (Actividades diferentes en orígen y destino)";
				}

				if (parseFloat(x.eneroOrigen)>0) {
					color__origen__destino__enero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.febreroOrigen)>0) {
					color__origen__destino__febrero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.marzoOrigen)>0) {
					color__origen__destino__marzo='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.abrilOrigen)>0) {
					color__origen__destino__abril='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.mayoOrigen)>0) {
					color__origen__destino__mayo='style="background:blue!important; color:white!important;"';
				}				

				if (parseFloat(x.junioOrigen)>0) {
					color__origen__destino__junio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.julioOrigen)>0) {
					color__origen__destino__julio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.agostoOrigen)>0) {
					color__origen__destino__agosto='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.septiembreOrigen)>0) {
					color__origen__destino__septiembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.octubreOrigen)>0) {
					color__origen__destino__octubre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.noviembreOrigen)>0) {
					color__origen__destino__noviembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.diciembreOrigen)>0) {
					color__origen__destino__diciembre='style="background:blue!important; color:white!important;"';
				}


				if (parseFloat(x.eneroDestino)>0) {
					color__destino__origen__enero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.febreroDestino)>0) {
					color__destino__origen__febrero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.marzoDestino)>0) {
					color__destino__origen__marzo='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.abrilDestino)>0) {
					color__destino__origen__abril='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.mayoDestino)>0) {
					color__destino__origen__mayo='background:cyan!important; color:black!important;';
				}				

				if (parseFloat(x.junioDestino)>0) {
					color__destino__origen__junio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.julioDestino)>0) {
					color__destino__origen__julio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.agostoDestino)>0) {
					color__destino__origen__agosto='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.septiembreDestino)>0) {
					color__destino__origen__septiembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.octubreDestino)>0) {
					color__destino__origen__octubre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.noviembreDestino)>0) {
					color__destino__origen__noviembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.diciembreDestino)>0) {
					color__destino__origen__diciembre='background:cyan!important; color:black!important;';
				}


				origenTotalInicial__2=parseFloat(x.enero) + parseFloat(x.febrero) + parseFloat(x.marzo) + parseFloat(x.abril) + parseFloat(x.mayo) + parseFloat(x.junio) + parseFloat(x.julio) + parseFloat(x.agosto) + parseFloat(x.septiembre) + parseFloat(x.octubre) + parseFloat(x.noviembre) + parseFloat(x.diciembre);

				origenTotalVigente__2=(parseFloat(x.enero)-parseFloat(x.eneroOrigen)) + (parseFloat(x.febrero)-parseFloat(x.febreroOrigen)) + (parseFloat(x.marzo)-parseFloat(x.marzoOrigen)) + (parseFloat(x.abril)-parseFloat(x.abrilOrigen)) + (parseFloat(x.mayo)-parseFloat(x.mayoOrigen)) + (parseFloat(x.junio)-parseFloat(x.junioOrigen)) + (parseFloat(x.julio)-parseFloat(x.julioOrigen)) + (parseFloat(x.agosto)-parseFloat(x.agostoOrigen)) + (parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)) + (parseFloat(x.octubre)-parseFloat(x.octubreOrigen)) + (parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)) + (parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen));



				destinoTotalInicial__2=parseFloat(x.eneroDestino__destino) + parseFloat(x.febreroDestino__destino) + parseFloat(x.marzoDestino__destino) + parseFloat(x.abrilDestino__destino) + parseFloat(x.mayoDestino__destino) + parseFloat(x.junioDestino__destino) + parseFloat(x.julioDestino__destino) + parseFloat(x.agostoDestino__destino) + parseFloat(x.septiembreDestino__destino) + parseFloat(x.octubreDestino__destino) + parseFloat(x.noviembreDestino__destino) + parseFloat(x.diciembreDestino__destino);

				destinoTotalVigente__2=(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)) + (parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)) + (parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)) +(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)) + (parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)) + (parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)) +(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)) + (parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)) + (parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)) + (parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)) + (parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)) + (parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino));			



				$(".contenedor__lineas__modificaciones3").append('<tr><th colspan="32" align="center" style="border-left:1px solid black; border-right:1px solid black;">'+tipoTramite+'</th></tr><tr class="fila__modificaciones__califica__analistas"><th colspan="30" align="center" style="border-left:1px solid black; border-right:1px solid black;"><div class="row"><div class="col col-8" style="text-align:left!important;">'+x.modificacionEstado+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Observación:&nbsp;&nbsp;'+x.observaciones+'</div></div></th></tr><tr><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-bottom:1px solid black!important;border-left:1px solid black!important;">'+contador+'</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Cédula</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombre</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+eventoOrigen+'</td><td align="center">'+x.idFinancierioOrigen+'</td><td align="center" '+color__origen__destino__enero+'>'+x.enero+'</td><td align="center" '+color__origen__destino__enero+'>'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__febrero+'>'+x.febrero+'</td><td align="center" '+color__origen__destino__febrero+'>'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__marzo+'>'+x.marzo+'</td><td align="center" '+color__origen__destino__marzo+'>'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__abril+'>'+x.abril+'</td><td align="center" '+color__origen__destino__abril+'>'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__mayo+'>'+x.mayo+'</td><td align="center" '+color__origen__destino__mayo+'>'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__junio+'>'+x.junio+'</td><td align="center" '+color__origen__destino__junio+'>'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__julio+'>'+x.julio+'</td><td align="center" '+color__origen__destino__julio+'>'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__agosto+'>'+x.agosto+'</td><td align="center" '+color__origen__destino__agosto+'>'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__septiembre+'>'+x.septiembre+'</td><td align="center" '+color__origen__destino__septiembre+'>'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__octubre+'>'+x.octubre+'</td><td align="center" '+color__origen__destino__octubre+'>'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__noviembre+'>'+x.noviembre+'</td><td align="center" '+color__origen__destino__noviembre+'>'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__diciembre+'>'+x.diciembre+'</td><td align="center" '+color__origen__destino__diciembre+'>'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__2+'</td><td align="center">'+origenTotalVigente__2+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Evento</td><td rowspan="1" align="center" style="font-weight:bold;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+eventosDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.idFinancierioDestino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__2+'</td><td align="center">'+destinoTotalVigente__2+'</td></tr>');

				$(".contenedor__lineas__modificaciones3__editar").append('<tr><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Cédula</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombre</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+eventoOrigen+'</td><td align="center">'+x.idFinancierioOrigen+'</td><td align="center">'+x.enero+'</td><td align="center">'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center">'+x.febrero+'</td><td align="center">'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center">'+x.marzo+'</td><td align="center">'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center">'+x.abril+'</td><td align="center">'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center">'+x.mayo+'</td><td align="center">'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center">'+x.junio+'</td><td align="center">'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center">'+x.julio+'</td><td align="center">'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center">'+x.agosto+'</td><td align="center">'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center">'+x.septiembre+'</td><td align="center">'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center">'+x.octubre+'</td><td align="center">'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center">'+x.noviembre+'</td><td align="center">'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center">'+x.diciembre+'</td><td align="center">'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__2+'</td><td align="center">'+origenTotalVigente__2+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Evento</td><td rowspan="1" align="center" style="font-weight:bold;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+eventosDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.idFinancierioDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__2+'</td><td align="center">'+destinoTotalVigente__2+'</td></tr>');


				$("#aprobar__linea"+x.idOrigenDestino).val(x.modificacionEstado);

			}				

			}else{
				$("#tabla__3").remove();
			}

			if (informacionObtenida__honorarios!="" && informacionObtenida__honorarios!=" " && informacionObtenida__honorarios!=undefined && informacionObtenida__honorarios!=null && informacionObtenida__honorarios!="N/A") {


			let origenTotalInicial__1=0;
			let origenTotalVigente__1=0;
			let destinoTotalInicial__1=0;
			let destinoTotalVigente__1=0;

			for(x of informacionObtenida__honorarios){


				let color__origen__destino__enero;
				let color__origen__destino__febrero;
				let color__origen__destino__marzo;
				let color__origen__destino__abril;
				let color__origen__destino__mayo;
				let color__origen__destino__junio;
				let color__origen__destino__julio;
				let color__origen__destino__agosto;
				let color__origen__destino__septiembre;
				let color__origen__destino__octubre;
				let color__origen__destino__noviembre;
				let color__origen__destino__diciembre;


				let color__destino__origen__enero;
				let color__destino__origen__febrero;
				let color__destino__origen__marzo;
				let color__destino__origen__abril;
				let color__destino__origen__mayo;
				let color__destino__origen__junio;
				let color__destino__origen__julio;
				let color__destino__origen__agosto;
				let color__destino__origen__septiembre;
				let color__destino__origen__octubre;
				let color__destino__origen__noviembre;
				let color__destino__origen__diciembre;

				contador++;

				if (x.tipoTramite==1) {
					tipoTramite="Caso 1 (Actividades e items iguales en orígen y destino)";
				}else if(x.tipoTramite==2){
					tipoTramite="Caso 2 (Actividades iguales en orígen y destino)";
				}else if(x.tipoTramite==3){
					tipoTramite="Caso 3 (Actividades diferentes en orígen y destino)";
				}


				origenTotalInicial__1=parseFloat(x.enero) + parseFloat(x.febrero) + parseFloat(x.marzo) + parseFloat(x.abril) + parseFloat(x.mayo) + parseFloat(x.junio) + parseFloat(x.julio) + parseFloat(x.agosto) + parseFloat(x.septiembre) + parseFloat(x.octubre) + parseFloat(x.noviembre) + parseFloat(x.diciembre);

				origenTotalVigente__1=(parseFloat(x.enero)-parseFloat(x.eneroOrigen)) + (parseFloat(x.febrero)-parseFloat(x.febreroOrigen)) + (parseFloat(x.marzo)-parseFloat(x.marzoOrigen)) + (parseFloat(x.abril)-parseFloat(x.abrilOrigen)) + (parseFloat(x.mayo)-parseFloat(x.mayoOrigen)) + (parseFloat(x.junio)-parseFloat(x.junioOrigen)) + (parseFloat(x.julio)-parseFloat(x.julioOrigen)) + (parseFloat(x.agosto)-parseFloat(x.agostoOrigen)) + (parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)) + (parseFloat(x.octubre)-parseFloat(x.octubreOrigen)) + (parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)) + (parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen));



				destinoTotalInicial__1=parseFloat(x.eneroDestino__destino) + parseFloat(x.febreroDestino__destino) + parseFloat(x.marzoDestino__destino) + parseFloat(x.abrilDestino__destino) + parseFloat(x.mayoDestino__destino) + parseFloat(x.junioDestino__destino) + parseFloat(x.julioDestino__destino) + parseFloat(x.agostoDestino__destino) + parseFloat(x.septiembreDestino__destino) + parseFloat(x.octubreDestino__destino) + parseFloat(x.noviembreDestino__destino) + parseFloat(x.diciembreDestino__destino);

				destinoTotalVigente__1=(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)) + (parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)) + (parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)) +(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)) + (parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)) + (parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)) +(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)) + (parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)) + (parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)) + (parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)) + (parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)) + (parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino));

				if (parseFloat(x.eneroOrigen)>0) {
					color__origen__destino__enero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.febreroOrigen)>0) {
					color__origen__destino__febrero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.marzoOrigen)>0) {
					color__origen__destino__marzo='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.abrilOrigen)>0) {
					color__origen__destino__abril='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.mayoOrigen)>0) {
					color__origen__destino__mayo='style="background:blue!important; color:white!important;"';
				}				

				if (parseFloat(x.junioOrigen)>0) {
					color__origen__destino__junio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.julioOrigen)>0) {
					color__origen__destino__julio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.agostoOrigen)>0) {
					color__origen__destino__agosto='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.septiembreOrigen)>0) {
					color__origen__destino__septiembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.octubreOrigen)>0) {
					color__origen__destino__octubre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.noviembreOrigen)>0) {
					color__origen__destino__noviembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.diciembreOrigen)>0) {
					color__origen__destino__diciembre='style="background:blue!important; color:white!important;"';
				}


				if (parseFloat(x.eneroDestino)>0) {
					color__destino__origen__enero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.febreroDestino)>0) {
					color__destino__origen__febrero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.marzoDestino)>0) {
					color__destino__origen__marzo='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.abrilDestino)>0) {
					color__destino__origen__abril='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.mayoDestino)>0) {
					color__destino__origen__mayo='background:cyan!important; color:black!important;';
				}				

				if (parseFloat(x.junioDestino)>0) {
					color__destino__origen__junio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.julioDestino)>0) {
					color__destino__origen__julio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.agostoDestino)>0) {
					color__destino__origen__agosto='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.septiembreDestino)>0) {
					color__destino__origen__septiembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.octubreDestino)>0) {
					color__destino__origen__octubre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.noviembreDestino)>0) {
					color__destino__origen__noviembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.diciembreDestino)>0) {
					color__destino__origen__diciembre='background:cyan!important; color:black!important;';
				}



				$(".contenedor__lineas__modificaciones4").append('<tr><th colspan="32" align="center" style="border-left:1px solid black; border-right:1px solid black;">'+tipoTramite+'</th></tr><tr class="fila__modificaciones__califica__analistas"><th colspan="30" align="center" style="border-left:1px solid black; border-right:1px solid black;"><div class="row"><div class="col col-8" style="text-align:left!important;">'+x.modificacionEstado+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Observación:&nbsp;&nbsp;'+x.observaciones+'</div></div></th></tr><tr><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-bottom:1px solid black!important;border-left:1px solid black!important;">'+contador+'</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombres</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+x.eventosOrigen+'</td><td align="center" '+color__origen__destino__enero+'>'+x.enero+'</td><td align="center" '+color__origen__destino__enero+'>'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__febrero+'>'+x.febrero+'</td><td align="center" '+color__origen__destino__febrero+'>'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__marzo+'>'+x.marzo+'</td><td align="center" '+color__origen__destino__marzo+'>'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__abril+'>'+x.abril+'</td><td align="center" '+color__origen__destino__abril+'>'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__mayo+'>'+x.mayo+'</td><td align="center" '+color__origen__destino__mayo+'>'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__junio+'>'+x.junio+'</td><td align="center" '+color__origen__destino__junio+'>'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__julio+'>'+x.julio+'</td><td align="center" '+color__origen__destino__julio+'>'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__agosto+'>'+x.agosto+'</td><td align="center" '+color__origen__destino__agosto+'>'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__septiembre+'>'+x.septiembre+'</td><td align="center" '+color__origen__destino__septiembre+'>'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__octubre+'>'+x.octubre+'</td><td align="center" '+color__origen__destino__octubre+'>'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__noviembre+'>'+x.noviembre+'</td><td align="center" '+color__origen__destino__noviembre+'>'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__diciembre+'>'+x.diciembre+'</td><td align="center" '+color__origen__destino__diciembre+'>'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__1+'</td><td align="center">'+origenTotalVigente__1+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Nombres</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eventosDestino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__1+'</td><td align="center">'+destinoTotalVigente__1+'</td></tr>');

				$(".contenedor__lineas__modificaciones4__editar").append('<tr><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombres</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+x.eventosOrigen+'</td><td align="center">'+x.enero+'</td><td align="center">'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center">'+x.febrero+'</td><td align="center">'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center">'+x.marzo+'</td><td align="center">'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center">'+x.abril+'</td><td align="center">'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center">'+x.mayo+'</td><td align="center">'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center">'+x.junio+'</td><td align="center">'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center">'+x.julio+'</td><td align="center">'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center">'+x.agosto+'</td><td align="center">'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center">'+x.septiembre+'</td><td align="center">'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center">'+x.octubre+'</td><td align="center">'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center">'+x.noviembre+'</td><td align="center">'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center">'+x.diciembre+'</td><td align="center">'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__1+'</td><td align="center">'+origenTotalVigente__1+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Nombres</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eventosDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__1+'</td><td align="center">'+destinoTotalVigente__1+'</td></tr>');


				$("#aprobar__linea"+x.idOrigenDestino).val(x.modificacionEstado);

			}			

			}else{
				$("#tabla__4").remove();
			}	


			let origenTotalInicial__0=0;
			let origenTotalVigente__0=0;
			let destinoTotalInicial__0=0;
			let destinoTotalVigente__0=0;

			for(x of informacionObtenida){

				contador++;

				let color__origen__destino__enero;
				let color__origen__destino__febrero;
				let color__origen__destino__marzo;
				let color__origen__destino__abril;
				let color__origen__destino__mayo;
				let color__origen__destino__junio;
				let color__origen__destino__julio;
				let color__origen__destino__agosto;
				let color__origen__destino__septiembre;
				let color__origen__destino__octubre;
				let color__origen__destino__noviembre;
				let color__origen__destino__diciembre;


				let color__destino__origen__enero;
				let color__destino__origen__febrero;
				let color__destino__origen__marzo;
				let color__destino__origen__abril;
				let color__destino__origen__mayo;
				let color__destino__origen__junio;
				let color__destino__origen__julio;
				let color__destino__origen__agosto;
				let color__destino__origen__septiembre;
				let color__destino__origen__octubre;
				let color__destino__origen__noviembre;
				let color__destino__origen__diciembre;

				if (x.eventosOrigen=="null" || x.eventosOrigen==null) {
					eventoOrigen='N/A';
				}else{
					eventoOrigen=x.eventosOrigen;
				}

				if (x.eventosDestino=="null" || x.eventosDestino==null) {
					eventosDestino='N/A';
				}else{
					eventosDestino=x.eventosDestino;
				}

				if (x.tipoTramite==1) {
					tipoTramite="Caso 1 (Actividades e items iguales en orígen y destino)";
				}else if(x.tipoTramite==2){
					tipoTramite="Caso 2 (Actividades iguales en orígen y destino)";
				}else if(x.tipoTramite==3){
					tipoTramite="Caso 3 (Actividades diferentes en orígen y destino)";
				}



				origenTotalInicial__0=parseFloat(x.enero) + parseFloat(x.febrero) + parseFloat(x.marzo) + parseFloat(x.abril) + parseFloat(x.mayo) + parseFloat(x.junio) + parseFloat(x.julio) + parseFloat(x.agosto) + parseFloat(x.septiembre) + parseFloat(x.octubre) + parseFloat(x.noviembre) + parseFloat(x.diciembre);

				origenTotalVigente__0=(parseFloat(x.enero)-parseFloat(x.eneroOrigen)) + (parseFloat(x.febrero)-parseFloat(x.febreroOrigen)) + (parseFloat(x.marzo)-parseFloat(x.marzoOrigen)) + (parseFloat(x.abril)-parseFloat(x.abrilOrigen)) + (parseFloat(x.mayo)-parseFloat(x.mayoOrigen)) + (parseFloat(x.junio)-parseFloat(x.junioOrigen)) + (parseFloat(x.julio)-parseFloat(x.julioOrigen)) + (parseFloat(x.agosto)-parseFloat(x.agostoOrigen)) + (parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)) + (parseFloat(x.octubre)-parseFloat(x.octubreOrigen)) + (parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)) + (parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen));



				destinoTotalInicial__0=parseFloat(x.eneroDestino__destino) + parseFloat(x.febreroDestino__destino) + parseFloat(x.marzoDestino__destino) + parseFloat(x.abrilDestino__destino) + parseFloat(x.mayoDestino__destino) + parseFloat(x.junioDestino__destino) + parseFloat(x.julioDestino__destino) + parseFloat(x.agostoDestino__destino) + parseFloat(x.septiembreDestino__destino) + parseFloat(x.octubreDestino__destino) + parseFloat(x.noviembreDestino__destino) + parseFloat(x.diciembreDestino__destino);

				destinoTotalVigente__0=(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)) + (parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)) + (parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)) +(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)) + (parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)) + (parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)) +(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)) + (parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)) + (parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)) + (parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)) + (parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)) + (parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino));

				if (parseFloat(x.eneroOrigen)>0) {
					color__origen__destino__enero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.febreroOrigen)>0) {
					color__origen__destino__febrero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.marzoOrigen)>0) {
					color__origen__destino__marzo='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.abrilOrigen)>0) {
					color__origen__destino__abril='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.mayoOrigen)>0) {
					color__origen__destino__mayo='style="background:blue!important; color:white!important;"';
				}				

				if (parseFloat(x.junioOrigen)>0) {
					color__origen__destino__junio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.julioOrigen)>0) {
					color__origen__destino__julio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.agostoOrigen)>0) {
					color__origen__destino__agosto='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.septiembreOrigen)>0) {
					color__origen__destino__septiembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.octubreOrigen)>0) {
					color__origen__destino__octubre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.noviembreOrigen)>0) {
					color__origen__destino__noviembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.diciembreOrigen)>0) {
					color__origen__destino__diciembre='style="background:blue!important; color:white!important;"';
				}


				if (parseFloat(x.eneroDestino)>0) {
					color__destino__origen__enero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.febreroDestino)>0) {
					color__destino__origen__febrero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.marzoDestino)>0) {
					color__destino__origen__marzo='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.abrilDestino)>0) {
					color__destino__origen__abril='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.mayoDestino)>0) {
					color__destino__origen__mayo='background:cyan!important; color:black!important;';
				}				

				if (parseFloat(x.junioDestino)>0) {
					color__destino__origen__junio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.julioDestino)>0) {
					color__destino__origen__julio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.agostoDestino)>0) {
					color__destino__origen__agosto='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.septiembreDestino)>0) {
					color__destino__origen__septiembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.octubreDestino)>0) {
					color__destino__origen__octubre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.noviembreDestino)>0) {
					color__destino__origen__noviembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.diciembreDestino)>0) {
					color__destino__origen__diciembre='background:cyan!important; color:black!important;';
				}


				$(".contenedor__lineas__modificaciones5").append('<tr><th colspan="32" align="center" style="border-left:1px solid black; border-right:1px solid black;">'+tipoTramite+'</th></tr><tr class="fila__modificaciones__califica__analistas"><th colspan="30" align="center" style="border-left:1px solid black; border-right:1px solid black;"><div class="row"><div class="col col-8" style="text-align:left!important;">'+x.modificacionEstado+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Observación:&nbsp;&nbsp;'+x.observaciones+'</div></div></th></tr><tr><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-bottom:1px solid black!important;border-left:1px solid black!important;">'+contador+'</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Evento</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+eventoOrigen+'</td><td align="center">'+x.idFinancierioOrigen+'</td><td align="center" '+color__origen__destino__enero+'>'+x.enero+'</td><td align="center" '+color__origen__destino__enero+'>'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__febrero+'>'+x.febrero+'</td><td align="center" '+color__origen__destino__febrero+'>'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__marzo+'>'+x.marzo+'</td><td align="center" '+color__origen__destino__marzo+'>'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__abril+'>'+x.abril+'</td><td align="center" '+color__origen__destino__abril+'>'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__mayo+'>'+x.mayo+'</td><td align="center" '+color__origen__destino__mayo+'>'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__junio+'>'+x.junio+'</td><td align="center" '+color__origen__destino__junio+'>'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__julio+'>'+x.julio+'</td><td align="center" '+color__origen__destino__julio+'>'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__agosto+'>'+x.agosto+'</td><td align="center" '+color__origen__destino__agosto+'>'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__septiembre+'>'+x.septiembre+'</td><td align="center" '+color__origen__destino__septiembre+'>'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__octubre+'>'+x.octubre+'</td><td align="center" '+color__origen__destino__octubre+'>'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__noviembre+'>'+x.noviembre+'</td><td align="center" '+color__origen__destino__noviembre+'>'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__diciembre+'>'+x.diciembre+'</td><td align="center" '+color__origen__destino__diciembre+'>'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__0+'</td><td align="center">'+origenTotalVigente__0+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Evento</td><td rowspan="1" align="center" style="font-weight:bold;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+eventosDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.idFinancierioDestino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__0+'</td><td align="center">'+destinoTotalVigente__0+'</td></tr>');

				$(".contenedor__lineas__modificaciones5__editar").append('<tr><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Evento</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+eventoOrigen+'</td><td align="center">'+x.idFinancierioOrigen+'</td><td align="center">'+x.enero+'</td><td align="center">'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center">'+x.febrero+'</td><td align="center">'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center">'+x.marzo+'</td><td align="center">'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center">'+x.abril+'</td><td align="center">'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center">'+x.mayo+'</td><td align="center">'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center">'+x.junio+'</td><td align="center">'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center">'+x.julio+'</td><td align="center">'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center">'+x.agosto+'</td><td align="center">'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center">'+x.septiembre+'</td><td align="center">'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center">'+x.octubre+'</td><td align="center">'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center">'+x.noviembre+'</td><td align="center">'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center">'+x.diciembre+'</td><td align="center">'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__0+'</td><td align="center">'+origenTotalVigente__0+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Evento</td><td rowspan="1" align="center" style="font-weight:bold;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+eventosDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.idFinancierioDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__0+'</td><td align="center">'+destinoTotalVigente__0+'</td></tr>');


				$("#aprobar__linea"+x.idOrigenDestino).val(x.modificacionEstado);

			}
			execelGenerados($(".excelProyectosMatricez__0"),"tabla__0__modificaciones__editar","Modificación");
			execelGenerados($(".excelProyectosMatricez__1"),"tabla__1__modificaciones__editar","Modificación");
			execelGenerados($(".excelProyectosMatricez__2"),"tabla__2__modificaciones__editar","Modificación");
			execelGenerados($(".excelProyectosMatricez__3"),"tabla__3__modificaciones__editar","Modificación");
			execelGenerados($(".excelProyectosMatricez__4"),"tabla__4__modificaciones__editar","Modificación");
			execelGenerados($(".excelProyectosMatricez__5"),"tabla__5__modificaciones__editar","Modificación");



			if ($("#idRolAd").val()==4) {

				selector__recomendar__analista__planificacion__modificaciones__coordinadores($(".selector__modificacion__lineas"));

			}else if ($("#idRolAd").val()==2) {

				selector__recomendar__analista__planificacion__modificaciones__diectores($(".selector__modificacion__lineas"));

			}

			let informacionObtenida__documentos=elementos['informacionObtenida__documentos'];

			for(x of informacionObtenida__documentos){

				if(x.documentoPlanificacion!="" && x.documentoPlanificacion!=" " && x.documentoPlanificacion!=undefined && x.documentoPlanificacion!=null){

					$("#documentoPlanificacion").attr('href','documentos/modificacion/informe/planificacion/'+x.documentoPlanificacion);

				}

			}	

		});

		},
		error:function(){

		}
				
	});		

});

}

var funcion__recomendar__planificacion=function(tbody,table){

$(tbody).on("click","button.recomendar__modificaciones__planificacion",function(e){

	let data=table.row($(this).parents("tr")).data();

	$(".textos__titulos").text(data[1]);

	$("#idTramite").val(data[4]);
	$("#idOrganismo").val(data[5]);
	$(".idOrganismo__lineas").val(data[5]);

	let paqueteDeDatos = new FormData();

	paqueteDeDatos.append('tipo','lineas__modificaciones');
	paqueteDeDatos.append('idLinea',data[4]);
	$("#tipoDocumento__D").val("planificacion");

	$.ajax({

		type:"POST",
		url:"modelosBd/inserta/seleccionaAcciones.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

		$.getScript("layout/scripts/js/modificacionRevisor/selector.js",function(){

			let elementos=JSON.parse(response);
			let informacionObtenida=elementos['informacionObtenida'];
			let informacionObtenida__honorarios=elementos['informacionObtenida__honorarios'];
			let informacionObtenida__honorarios__items=elementos['informacionObtenida__honorarios__items'];
			let informacionObtenida__sueldos__salarios=elementos['informacionObtenida__sueldos__salarios'];
			let informacionObtenida__sueldos__items=elementos['informacionObtenida__sueldos__items'];
			let informacionObtenida__desvinculaciones=elementos['informacionObtenida__desvinculaciones'];

			let contador=0;

			let eventoOrigen="";
			let eventosDestino="";
			let tipoTramite="";		

			$(".contenedor__lineas__modificaciones0").html(" ");
			$(".contenedor__lineas__modificaciones1").html(" ");
			$(".contenedor__lineas__modificaciones2").html(" ");
			$(".contenedor__lineas__modificaciones3").html(" ");
			$(".contenedor__lineas__modificaciones4").html(" ");
			$(".contenedor__lineas__modificaciones5").html(" ");	



			if (informacionObtenida__desvinculaciones!="" && informacionObtenida__desvinculaciones!=" " && informacionObtenida__desvinculaciones!=undefined && informacionObtenida__desvinculaciones!=null && informacionObtenida__desvinculaciones!="N/A") {

				let origenTotalInicial__5=0;
				let origenTotalVigente__5=0;
				let destinoTotalInicial__5=0;

				for(x of informacionObtenida__desvinculaciones){

					contador++;


					let color__origen__destino__enero;
					let color__origen__destino__febrero;
					let color__origen__destino__marzo;
					let color__origen__destino__abril;
					let color__origen__destino__mayo;
					let color__origen__destino__junio;
					let color__origen__destino__julio;
					let color__origen__destino__agosto;
					let color__origen__destino__septiembre;
					let color__origen__destino__octubre;
					let color__origen__destino__noviembre;
					let color__origen__destino__diciembre;


					let color__destino__origen__enero;
					let color__destino__origen__febrero;
					let color__destino__origen__marzo;
					let color__destino__origen__abril;
					let color__destino__origen__mayo;
					let color__destino__origen__junio;
					let color__destino__origen__julio;
					let color__destino__origen__agosto;
					let color__destino__origen__septiembre;
					let color__destino__origen__octubre;
					let color__destino__origen__noviembre;
					let color__destino__origen__diciembre;



					if (x.eventosOrigen=="null" || x.eventosOrigen==null) {
						eventoOrigen='N/A';
					}else{
						eventoOrigen=x.eventosOrigen;
					}

					if (x.eventosDestino=="null" || x.eventosDestino==null) {
						eventosDestino='N/A';
					}else{
						eventosDestino=x.eventosDestino;
					}

					if (x.tipoTramite==1) {
						tipoTramite="TRÁMITE DE DESVINCULACIÓN";
					}else if(x.tipoTramite==2){
						tipoTramite="TRÁMITE DE DESVINCULACIÓN";
					}else if(x.tipoTramite==3){
						tipoTramite="TRÁMITE DE DESVINCULACIÓN";
					}

					origenTotalInicial__5=parseFloat(x.enero) + parseFloat(x.febrero) + parseFloat(x.marzo) + parseFloat(x.abril) + parseFloat(x.mayo) + parseFloat(x.junio) + parseFloat(x.julio) + parseFloat(x.agosto) + parseFloat(x.septiembre) + parseFloat(x.octubre) + parseFloat(x.noviembre) + parseFloat(x.diciembre);

					origenTotalVigente__5=(parseFloat(x.enero)-parseFloat(x.eneroOrigen)) + (parseFloat(x.febrero)-parseFloat(x.febreroOrigen)) + (parseFloat(x.marzo)-parseFloat(x.marzoOrigen)) + (parseFloat(x.abril)-parseFloat(x.abrilOrigen)) + (parseFloat(x.mayo)-parseFloat(x.mayoOrigen)) + (parseFloat(x.junio)-parseFloat(x.junioOrigen)) + (parseFloat(x.julio)-parseFloat(x.julioOrigen)) + (parseFloat(x.agosto)-parseFloat(x.agostoOrigen)) + (parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)) + (parseFloat(x.octubre)-parseFloat(x.octubreOrigen)) + (parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)) + (parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen));


					destinoTotalInicial__5=parseFloat(x.eneroDestino) + parseFloat(x.febreroDestino) + parseFloat(x.marzoDestino) + parseFloat(x.abrilDestino) + parseFloat(x.mayoDestino) + parseFloat(x.junioDestino) + parseFloat(x.julioDestino) + parseFloat(x.agostoDestino) + parseFloat(x.septiembreDestino) + parseFloat(x.octubreDestino) + parseFloat(x.noviembreDestino) + parseFloat(x.diciembreDestino);

					$(".contenedor__lineas__modificaciones0").append('<tr><th colspan="32" align="center" style="border-left:1px solid black; border-right:1px solid black;">Caso 1 (Actividades e items iguales en orígen y destino)</th></tr><tr class="fila__modificaciones__califica__analistas"><th colspan="30" align="center" style="border-left:1px solid black; border-right:1px solid black;"><div class="row"><div class="col col-8" style="text-align:left!important;">'+x.modificacionEstado+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Observación:&nbsp;&nbsp;'+x.observaciones+'</div></div></th></tr><<tr><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-bottom:1px solid black!important;border-left:1px solid black!important;">'+contador+'</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Cédula</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombre</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+eventoOrigen+'</td><td align="center">'+x.idFinancierioOrigen+'</td><td align="center" '+color__origen__destino__enero+'>'+x.enero+'</td><td align="center" '+color__origen__destino__enero+'>'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__febrero+'>'+x.febrero+'</td><td align="center" '+color__origen__destino__febrero+'>'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__marzo+'>'+x.marzo+'</td><td align="center" '+color__origen__destino__marzo+'>'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__abril+'>'+x.abril+'</td><td align="center" '+color__origen__destino__abril+'>'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__mayo+'>'+x.mayo+'</td><td align="center" '+color__origen__destino__mayo+'>'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__junio+'>'+x.junio+'</td><td align="center" '+color__origen__destino__junio+'>'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__julio+'>'+x.julio+'</td><td align="center" '+color__origen__destino__julio+'>'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__agosto+'>'+x.agosto+'</td><td align="center" '+color__origen__destino__agosto+'>'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__septiembre+'>'+x.septiembre+'</td><td align="center" '+color__origen__destino__septiembre+'>'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__octubre+'>'+x.octubre+'</td><td align="center" '+color__origen__destino__octubre+'>'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__noviembre+'>'+x.noviembre+'</td><td align="center" '+color__origen__destino__noviembre+'>'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__diciembre+'>'+x.diciembre+'</td><td align="center" '+color__origen__destino__diciembre+'>'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__5+'</td><td align="center">'+origenTotalVigente__5+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold;">Enero</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero</td> <td rowspan="1" align="center" style="font-weight:bold;">Marzo</td> <td rowspan="1" align="center" style="font-weight:bold;">Abril</td> <td rowspan="1" align="center" style="font-weight:bold;">Mayo</td> <td rowspan="1" align="center" style="font-weight:bold;">Junio</td> <td rowspan="1" align="center" style="font-weight:bold;">Julio</td> <td rowspan="1" align="center" style="font-weight:bold;">Agosto</td> <td rowspan="1" align="center" style="font-weight:bold;">Septiembre</td> <td rowspan="1" align="center" style="font-weight:bold;">Octubre</td> <td rowspan="1" align="center" style="font-weight:bold;">Noviembre</td> <td rowspan="1" align="center" style="font-weight:bold;">Diciembre</td><td style="font-weight:bold;">Total Inicial</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.nombreItem+'</td><td style="border-bottom:1px solid black!important;">'+x.eneroDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.febreroDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.marzoDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.abrilDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.mayoDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.junioDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.julioDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.agostoDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.septiembreDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.octubreDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.noviembreDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.diciembreDestino+'</td><td align="center">'+destinoTotalInicial__5+'</td></tr>');

					$(".contenedor__lineas__modificaciones0__editar").append('<tr><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Cédula</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombre</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+eventoOrigen+'</td><td align="center">'+x.idFinancierioOrigen+'</td><td align="center" '+color__origen__destino__enero+'>'+x.enero+'</td><td align="center" '+color__origen__destino__enero+'>'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__febrero+'>'+x.febrero+'</td><td align="center" '+color__origen__destino__febrero+'>'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__marzo+'>'+x.marzo+'</td><td align="center" '+color__origen__destino__marzo+'>'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__abril+'>'+x.abril+'</td><td align="center" '+color__origen__destino__abril+'>'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__mayo+'>'+x.mayo+'</td><td align="center" '+color__origen__destino__mayo+'>'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__junio+'>'+x.junio+'</td><td align="center" '+color__origen__destino__junio+'>'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__julio+'>'+x.julio+'</td><td align="center" '+color__origen__destino__julio+'>'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__agosto+'>'+x.agosto+'</td><td align="center" '+color__origen__destino__agosto+'>'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__septiembre+'>'+x.septiembre+'</td><td align="center" '+color__origen__destino__septiembre+'>'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__octubre+'>'+x.octubre+'</td><td align="center" '+color__origen__destino__octubre+'>'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__noviembre+'>'+x.noviembre+'</td><td align="center" '+color__origen__destino__noviembre+'>'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__diciembre+'>'+x.diciembre+'</td><td align="center" '+color__origen__destino__diciembre+'>'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__5+'</td><td align="center">'+origenTotalVigente__5+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold;">Enero</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero</td> <td rowspan="1" align="center" style="font-weight:bold;">Marzo</td> <td rowspan="1" align="center" style="font-weight:bold;">Abril</td> <td rowspan="1" align="center" style="font-weight:bold;">Mayo</td> <td rowspan="1" align="center" style="font-weight:bold;">Junio</td> <td rowspan="1" align="center" style="font-weight:bold;">Julio</td> <td rowspan="1" align="center" style="font-weight:bold;">Agosto</td> <td rowspan="1" align="center" style="font-weight:bold;">Septiembre</td> <td rowspan="1" align="center" style="font-weight:bold;">Octubre</td> <td rowspan="1" align="center" style="font-weight:bold;">Noviembre</td> <td rowspan="1" align="center" style="font-weight:bold;">Diciembre</td><td style="font-weight:bold;">Total Inicial</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.nombreItem+'</td><td style="border-bottom:1px solid black!important;">'+x.eneroDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.febreroDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.marzoDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.abrilDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.mayoDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.junioDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.julioDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.agostoDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.septiembreDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.octubreDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.noviembreDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.diciembreDestino+'</td><td align="center">'+destinoTotalInicial__5+'</td></tr>');


					$("#aprobar__linea"+x.idOrigenDestino).val(x.modificacionEstado);

				}				

			}else{
				$("#tabla__0").remove();
			}

			if (informacionObtenida__sueldos__items!="" && informacionObtenida__sueldos__items!=" " && informacionObtenida__sueldos__items!=undefined && informacionObtenida__sueldos__items!=null && informacionObtenida__sueldos__items!="N/A") {

			let origenTotalInicial__4=0;
			let origenTotalVigente__4=0;
			let destinoTotalInicial__4=0;
			let destinoTotalVigente__4=0;

			for(x of informacionObtenida__sueldos__items){

				contador++;


				let color__origen__destino__enero;
				let color__origen__destino__febrero;
				let color__origen__destino__marzo;
				let color__origen__destino__abril;
				let color__origen__destino__mayo;
				let color__origen__destino__junio;
				let color__origen__destino__julio;
				let color__origen__destino__agosto;
				let color__origen__destino__septiembre;
				let color__origen__destino__octubre;
				let color__origen__destino__noviembre;
				let color__origen__destino__diciembre;


				let color__destino__origen__enero;
				let color__destino__origen__febrero;
				let color__destino__origen__marzo;
				let color__destino__origen__abril;
				let color__destino__origen__mayo;
				let color__destino__origen__junio;
				let color__destino__origen__julio;
				let color__destino__origen__agosto;
				let color__destino__origen__septiembre;
				let color__destino__origen__octubre;
				let color__destino__origen__noviembre;
				let color__destino__origen__diciembre;



				if (x.eventosOrigen=="null" || x.eventosOrigen==null) {
					eventoOrigen='N/A';
				}else{
					eventoOrigen=x.eventosOrigen;
				}

				if (x.eventosDestino=="null" || x.eventosDestino==null) {
					eventosDestino='N/A';
				}else{
					eventosDestino=x.eventosDestino;
				}

				if (x.tipoTramite==1) {
					tipoTramite="Caso 1 (Actividades e items iguales en orígen y destino)";
				}else if(x.tipoTramite==2){
					tipoTramite="Caso 2 (Actividades iguales en orígen y destino)";
				}else if(x.tipoTramite==3){
					tipoTramite="Caso 3 (Actividades diferentes en orígen y destino)";
				}


				origenTotalInicial__4=parseFloat(x.enero) + parseFloat(x.febrero) + parseFloat(x.marzo) + parseFloat(x.abril) + parseFloat(x.mayo) + parseFloat(x.junio) + parseFloat(x.julio) + parseFloat(x.agosto) + parseFloat(x.septiembre) + parseFloat(x.octubre) + parseFloat(x.noviembre) + parseFloat(x.diciembre);

				origenTotalVigente__4=(parseFloat(x.enero)-parseFloat(x.eneroOrigen)) + (parseFloat(x.febrero)-parseFloat(x.febreroOrigen)) + (parseFloat(x.marzo)-parseFloat(x.marzoOrigen)) + (parseFloat(x.abril)-parseFloat(x.abrilOrigen)) + (parseFloat(x.mayo)-parseFloat(x.mayoOrigen)) + (parseFloat(x.junio)-parseFloat(x.junioOrigen)) + (parseFloat(x.julio)-parseFloat(x.julioOrigen)) + (parseFloat(x.agosto)-parseFloat(x.agostoOrigen)) + (parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)) + (parseFloat(x.octubre)-parseFloat(x.octubreOrigen)) + (parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)) + (parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen));



				destinoTotalInicial__4=parseFloat(x.eneroDestino__destino) + parseFloat(x.febreroDestino__destino) + parseFloat(x.marzoDestino__destino) + parseFloat(x.abrilDestino__destino) + parseFloat(x.mayoDestino__destino) + parseFloat(x.junioDestino__destino) + parseFloat(x.julioDestino__destino) + parseFloat(x.agostoDestino__destino) + parseFloat(x.septiembreDestino__destino) + parseFloat(x.octubreDestino__destino) + parseFloat(x.noviembreDestino__destino) + parseFloat(x.diciembreDestino__destino);

				destinoTotalVigente__4=(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)) + (parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)) + (parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)) +(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)) + (parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)) + (parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)) +(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)) + (parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)) + (parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)) + (parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)) + (parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)) + (parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino));	

				if (parseFloat(x.eneroOrigen)>0) {
					color__origen__destino__enero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.febreroOrigen)>0) {
					color__origen__destino__febrero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.marzoOrigen)>0) {
					color__origen__destino__marzo='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.abrilOrigen)>0) {
					color__origen__destino__abril='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.mayoOrigen)>0) {
					color__origen__destino__mayo='style="background:blue!important; color:white!important;"';
				}				

				if (parseFloat(x.junioOrigen)>0) {
					color__origen__destino__junio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.julioOrigen)>0) {
					color__origen__destino__julio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.agostoOrigen)>0) {
					color__origen__destino__agosto='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.septiembreOrigen)>0) {
					color__origen__destino__septiembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.octubreOrigen)>0) {
					color__origen__destino__octubre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.noviembreOrigen)>0) {
					color__origen__destino__noviembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.diciembreOrigen)>0) {
					color__origen__destino__diciembre='style="background:blue!important; color:white!important;"';
				}


				if (parseFloat(x.eneroDestino)>0) {
					color__destino__origen__enero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.febreroDestino)>0) {
					color__destino__origen__febrero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.marzoDestino)>0) {
					color__destino__origen__marzo='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.abrilDestino)>0) {
					color__destino__origen__abril='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.mayoDestino)>0) {
					color__destino__origen__mayo='background:cyan!important; color:black!important;';
				}				

				if (parseFloat(x.junioDestino)>0) {
					color__destino__origen__junio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.julioDestino)>0) {
					color__destino__origen__julio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.agostoDestino)>0) {
					color__destino__origen__agosto='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.septiembreDestino)>0) {
					color__destino__origen__septiembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.octubreDestino)>0) {
					color__destino__origen__octubre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.noviembreDestino)>0) {
					color__destino__origen__noviembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.diciembreDestino)>0) {
					color__destino__origen__diciembre='background:cyan!important; color:black!important;';
				}


				$(".contenedor__lineas__modificaciones1").append('<tr><th colspan="32" align="center" style="border-left:1px solid black; border-right:1px solid black;">'+tipoTramite+'</th></tr><tr class="fila__modificaciones__califica__analistas"><th colspan="30" align="center" style="border-left:1px solid black; border-right:1px solid black;"><div class="row"><div class="col col-8" style="text-align:left!important;">'+x.modificacionEstado+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Observación:&nbsp;&nbsp;'+x.observaciones+'</div></div></th></tr><tr><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-bottom:1px solid black!important;border-left:1px solid black!important;">'+contador+'</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Cédula</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombre</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+eventoOrigen+'</td><td align="center">'+x.idFinancierioOrigen+'</td><td align="center" '+color__origen__destino__enero+'>'+x.enero+'</td><td align="center" '+color__origen__destino__enero+'>'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__febrero+'>'+x.febrero+'</td><td align="center" '+color__origen__destino__febrero+'>'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__marzo+'>'+x.marzo+'</td><td align="center" '+color__origen__destino__marzo+'>'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__abril+'>'+x.abril+'</td><td align="center" '+color__origen__destino__abril+'>'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__mayo+'>'+x.mayo+'</td><td align="center" '+color__origen__destino__mayo+'>'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__junio+'>'+x.junio+'</td><td align="center" '+color__origen__destino__junio+'>'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__julio+'>'+x.julio+'</td><td align="center" '+color__origen__destino__julio+'>'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__agosto+'>'+x.agosto+'</td><td align="center" '+color__origen__destino__agosto+'>'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__septiembre+'>'+x.septiembre+'</td><td align="center" '+color__origen__destino__septiembre+'>'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__octubre+'>'+x.octubre+'</td><td align="center" '+color__origen__destino__octubre+'>'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__noviembre+'>'+x.noviembre+'</td><td align="center" '+color__origen__destino__noviembre+'>'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__diciembre+'>'+x.diciembre+'</td><td align="center" '+color__origen__destino__diciembre+'>'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__4+'</td><td align="center">'+origenTotalVigente__4+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Evento</td><td rowspan="1" align="center" style="font-weight:bold;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+eventosDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.idFinancierioDestino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__4+'</td><td align="center">'+destinoTotalVigente__4+'</td></tr>');

				$(".contenedor__lineas__modificaciones1__editar").append('<tr><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Cédula</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombre</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+eventoOrigen+'</td><td align="center">'+x.idFinancierioOrigen+'</td><td align="center">'+x.enero+'</td><td align="center">'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center">'+x.febrero+'</td><td align="center">'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center">'+x.marzo+'</td><td align="center">'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center">'+x.abril+'</td><td align="center">'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center">'+x.mayo+'</td><td align="center">'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center">'+x.junio+'</td><td align="center">'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center">'+x.julio+'</td><td align="center">'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center">'+x.agosto+'</td><td align="center">'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center">'+x.septiembre+'</td><td align="center">'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center">'+x.octubre+'</td><td align="center">'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center">'+x.noviembre+'</td><td align="center">'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center">'+x.diciembre+'</td><td align="center">'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__4+'</td><td align="center">'+origenTotalVigente__4+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Evento</td><td rowspan="1" align="center" style="font-weight:bold;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+eventosDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.idFinancierioDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__4+'</td><td align="center">'+destinoTotalVigente__4+'</td></tr>');

				$("#aprobar__linea"+x.idOrigenDestino).val(x.modificacionEstado);

			}				

			}else{
				$("#tabla__1").remove();
			}

			if (informacionObtenida__sueldos__salarios!="" && informacionObtenida__sueldos__salarios!=" " && informacionObtenida__sueldos__salarios!=undefined && informacionObtenida__sueldos__salarios!=null & informacionObtenida__sueldos__salarios!="N/A") {


			let origenTotalInicial__3=0;
			let origenTotalVigente__3=0;
			let destinoTotalInicial__3=0;
			let destinoTotalVigente__3=0;


			for(x of informacionObtenida__sueldos__salarios){

				contador++;

				let color__origen__destino__enero;
				let color__origen__destino__febrero;
				let color__origen__destino__marzo;
				let color__origen__destino__abril;
				let color__origen__destino__mayo;
				let color__origen__destino__junio;
				let color__origen__destino__julio;
				let color__origen__destino__agosto;
				let color__origen__destino__septiembre;
				let color__origen__destino__octubre;
				let color__origen__destino__noviembre;
				let color__origen__destino__diciembre;


				let color__destino__origen__enero;
				let color__destino__origen__febrero;
				let color__destino__origen__marzo;
				let color__destino__origen__abril;
				let color__destino__origen__mayo;
				let color__destino__origen__junio;
				let color__destino__origen__julio;
				let color__destino__origen__agosto;
				let color__destino__origen__septiembre;
				let color__destino__origen__octubre;
				let color__destino__origen__noviembre;
				let color__destino__origen__diciembre;


				if (x.tipoTramite==1) {
					tipoTramite="Caso 1 (Actividades e items iguales en orígen y destino)";
				}else if(x.tipoTramite==2){
					tipoTramite="Caso 2 (Actividades iguales en orígen y destino)";
				}else if(x.tipoTramite==3){
					tipoTramite="Caso 3 (Actividades diferentes en orígen y destino)";
				}



				origenTotalInicial__3=parseFloat(x.enero) + parseFloat(x.febrero) + parseFloat(x.marzo) + parseFloat(x.abril) + parseFloat(x.mayo) + parseFloat(x.junio) + parseFloat(x.julio) + parseFloat(x.agosto) + parseFloat(x.septiembre) + parseFloat(x.octubre) + parseFloat(x.noviembre) + parseFloat(x.diciembre);

				origenTotalVigente__3=(parseFloat(x.enero)-parseFloat(x.eneroOrigen)) + (parseFloat(x.febrero)-parseFloat(x.febreroOrigen)) + (parseFloat(x.marzo)-parseFloat(x.marzoOrigen)) + (parseFloat(x.abril)-parseFloat(x.abrilOrigen)) + (parseFloat(x.mayo)-parseFloat(x.mayoOrigen)) + (parseFloat(x.junio)-parseFloat(x.junioOrigen)) + (parseFloat(x.julio)-parseFloat(x.julioOrigen)) + (parseFloat(x.agosto)-parseFloat(x.agostoOrigen)) + (parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)) + (parseFloat(x.octubre)-parseFloat(x.octubreOrigen)) + (parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)) + (parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen));



				destinoTotalInicial__3=parseFloat(x.eneroDestino__destino) + parseFloat(x.febreroDestino__destino) + parseFloat(x.marzoDestino__destino) + parseFloat(x.abrilDestino__destino) + parseFloat(x.mayoDestino__destino) + parseFloat(x.junioDestino__destino) + parseFloat(x.julioDestino__destino) + parseFloat(x.agostoDestino__destino) + parseFloat(x.septiembreDestino__destino) + parseFloat(x.octubreDestino__destino) + parseFloat(x.noviembreDestino__destino) + parseFloat(x.diciembreDestino__destino);

				destinoTotalVigente__3=(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)) + (parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)) + (parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)) +(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)) + (parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)) + (parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)) +(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)) + (parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)) + (parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)) + (parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)) + (parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)) + (parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino));

				if (parseFloat(x.eneroOrigen)>0) {
					color__origen__destino__enero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.febreroOrigen)>0) {
					color__origen__destino__febrero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.marzoOrigen)>0) {
					color__origen__destino__marzo='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.abrilOrigen)>0) {
					color__origen__destino__abril='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.mayoOrigen)>0) {
					color__origen__destino__mayo='style="background:blue!important; color:white!important;"';
				}				

				if (parseFloat(x.junioOrigen)>0) {
					color__origen__destino__junio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.julioOrigen)>0) {
					color__origen__destino__julio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.agostoOrigen)>0) {
					color__origen__destino__agosto='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.septiembreOrigen)>0) {
					color__origen__destino__septiembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.octubreOrigen)>0) {
					color__origen__destino__octubre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.noviembreOrigen)>0) {
					color__origen__destino__noviembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.diciembreOrigen)>0) {
					color__origen__destino__diciembre='style="background:blue!important; color:white!important;"';
				}


				if (parseFloat(x.eneroDestino)>0) {
					color__destino__origen__enero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.febreroDestino)>0) {
					color__destino__origen__febrero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.marzoDestino)>0) {
					color__destino__origen__marzo='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.abrilDestino)>0) {
					color__destino__origen__abril='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.mayoDestino)>0) {
					color__destino__origen__mayo='background:cyan!important; color:black!important;';
				}				

				if (parseFloat(x.junioDestino)>0) {
					color__destino__origen__junio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.julioDestino)>0) {
					color__destino__origen__julio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.agostoDestino)>0) {
					color__destino__origen__agosto='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.septiembreDestino)>0) {
					color__destino__origen__septiembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.octubreDestino)>0) {
					color__destino__origen__octubre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.noviembreDestino)>0) {
					color__destino__origen__noviembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.diciembreDestino)>0) {
					color__destino__origen__diciembre='background:cyan!important; color:black!important;';
				}



				$(".contenedor__lineas__modificaciones2").append('<tr><th colspan="32" align="center" style="border-left:1px solid black; border-right:1px solid black;">'+tipoTramite+'</th></tr><tr class="fila__modificaciones__califica__analistas"><th colspan="30" align="center" style="border-left:1px solid black; border-right:1px solid black;"><div class="row"><div class="col col-8" style="text-align:left!important;">'+x.modificacionEstado+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Observación:&nbsp;&nbsp;'+x.observaciones+'</div></div></th></tr><tr><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-bottom:1px solid black!important;border-left:1px solid black!important;">'+contador+'</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombres</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+x.eventosOrigen+'</td><td align="center" '+color__origen__destino__enero+'>'+x.enero+'</td><td align="center" '+color__origen__destino__enero+'>'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__febrero+'>'+x.febrero+'</td><td align="center" '+color__origen__destino__febrero+'>'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__marzo+'>'+x.marzo+'</td><td align="center" '+color__origen__destino__marzo+'>'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__abril+'>'+x.abril+'</td><td align="center" '+color__origen__destino__abril+'>'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__mayo+'>'+x.mayo+'</td><td align="center" '+color__origen__destino__mayo+'>'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__junio+'>'+x.junio+'</td><td align="center" '+color__origen__destino__junio+'>'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__julio+'>'+x.julio+'</td><td align="center" '+color__origen__destino__julio+'>'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__agosto+'>'+x.agosto+'</td><td align="center" '+color__origen__destino__agosto+'>'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__septiembre+'>'+x.septiembre+'</td><td align="center" '+color__origen__destino__septiembre+'>'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__octubre+'>'+x.octubre+'</td><td align="center" '+color__origen__destino__octubre+'>'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__noviembre+'>'+x.noviembre+'</td><td align="center" '+color__origen__destino__noviembre+'>'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__diciembre+'>'+x.diciembre+'</td><td align="center" '+color__origen__destino__diciembre+'>'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__3+'</td><td align="center">'+origenTotalVigente__3+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Nombres</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eventosDestino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__3+'</td><td align="center">'+destinoTotalVigente__3+'</td></tr>');

				$(".contenedor__lineas__modificaciones2__editar").append('<tr><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombres</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+x.eventosOrigen+'</td><td align="center">'+x.enero+'</td><td align="center">'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center">'+x.febrero+'</td><td align="center">'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center">'+x.marzo+'</td><td align="center">'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center">'+x.abril+'</td><td align="center">'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center">'+x.mayo+'</td><td align="center">'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center">'+x.junio+'</td><td align="center">'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center">'+x.julio+'</td><td align="center">'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center">'+x.agosto+'</td><td align="center">'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center">'+x.septiembre+'</td><td align="center">'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center">'+x.octubre+'</td><td align="center">'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center">'+x.noviembre+'</td><td align="center">'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center">'+x.diciembre+'</td><td align="center">'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__3+'</td><td align="center">'+origenTotalVigente__3+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Nombres</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eventosDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__3+'</td><td align="center">'+destinoTotalVigente__3+'</td></tr>');


				$("#aprobar__linea"+x.idOrigenDestino).val(x.modificacionEstado);

			}		

			}else{
				$("#tabla__2").remove();
			}

			if (informacionObtenida__honorarios__items!="" && informacionObtenida__honorarios__items!=" " && informacionObtenida__honorarios__items!=undefined && informacionObtenida__honorarios__items!=null && informacionObtenida__honorarios__items!="N/A") {

			let origenTotalInicial__2=0;
			let origenTotalVigente__2=0;
			let destinoTotalInicial__2=0;
			let destinoTotalVigente__2=0;

			for(x of informacionObtenida__honorarios__items){

				contador++;

				let color__origen__destino__enero;
				let color__origen__destino__febrero;
				let color__origen__destino__marzo;
				let color__origen__destino__abril;
				let color__origen__destino__mayo;
				let color__origen__destino__junio;
				let color__origen__destino__julio;
				let color__origen__destino__agosto;
				let color__origen__destino__septiembre;
				let color__origen__destino__octubre;
				let color__origen__destino__noviembre;
				let color__origen__destino__diciembre;


				let color__destino__origen__enero;
				let color__destino__origen__febrero;
				let color__destino__origen__marzo;
				let color__destino__origen__abril;
				let color__destino__origen__mayo;
				let color__destino__origen__junio;
				let color__destino__origen__julio;
				let color__destino__origen__agosto;
				let color__destino__origen__septiembre;
				let color__destino__origen__octubre;
				let color__destino__origen__noviembre;
				let color__destino__origen__diciembre;



				if (x.eventosOrigen=="null" || x.eventosOrigen==null) {
					eventoOrigen='N/A';
				}else{
					eventoOrigen=x.eventosOrigen;
				}

				if (x.eventosDestino=="null" || x.eventosDestino==null) {
					eventosDestino='N/A';
				}else{
					eventosDestino=x.eventosDestino;
				}

				if (x.tipoTramite==1) {
					tipoTramite="Caso 1 (Actividades e items iguales en orígen y destino)";
				}else if(x.tipoTramite==2){
					tipoTramite="Caso 2 (Actividades iguales en orígen y destino)";
				}else if(x.tipoTramite==3){
					tipoTramite="Caso 3 (Actividades diferentes en orígen y destino)";
				}

				if (parseFloat(x.eneroOrigen)>0) {
					color__origen__destino__enero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.febreroOrigen)>0) {
					color__origen__destino__febrero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.marzoOrigen)>0) {
					color__origen__destino__marzo='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.abrilOrigen)>0) {
					color__origen__destino__abril='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.mayoOrigen)>0) {
					color__origen__destino__mayo='style="background:blue!important; color:white!important;"';
				}				

				if (parseFloat(x.junioOrigen)>0) {
					color__origen__destino__junio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.julioOrigen)>0) {
					color__origen__destino__julio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.agostoOrigen)>0) {
					color__origen__destino__agosto='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.septiembreOrigen)>0) {
					color__origen__destino__septiembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.octubreOrigen)>0) {
					color__origen__destino__octubre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.noviembreOrigen)>0) {
					color__origen__destino__noviembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.diciembreOrigen)>0) {
					color__origen__destino__diciembre='style="background:blue!important; color:white!important;"';
				}


				if (parseFloat(x.eneroDestino)>0) {
					color__destino__origen__enero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.febreroDestino)>0) {
					color__destino__origen__febrero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.marzoDestino)>0) {
					color__destino__origen__marzo='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.abrilDestino)>0) {
					color__destino__origen__abril='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.mayoDestino)>0) {
					color__destino__origen__mayo='background:cyan!important; color:black!important;';
				}				

				if (parseFloat(x.junioDestino)>0) {
					color__destino__origen__junio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.julioDestino)>0) {
					color__destino__origen__julio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.agostoDestino)>0) {
					color__destino__origen__agosto='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.septiembreDestino)>0) {
					color__destino__origen__septiembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.octubreDestino)>0) {
					color__destino__origen__octubre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.noviembreDestino)>0) {
					color__destino__origen__noviembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.diciembreDestino)>0) {
					color__destino__origen__diciembre='background:cyan!important; color:black!important;';
				}


				origenTotalInicial__2=parseFloat(x.enero) + parseFloat(x.febrero) + parseFloat(x.marzo) + parseFloat(x.abril) + parseFloat(x.mayo) + parseFloat(x.junio) + parseFloat(x.julio) + parseFloat(x.agosto) + parseFloat(x.septiembre) + parseFloat(x.octubre) + parseFloat(x.noviembre) + parseFloat(x.diciembre);

				origenTotalVigente__2=(parseFloat(x.enero)-parseFloat(x.eneroOrigen)) + (parseFloat(x.febrero)-parseFloat(x.febreroOrigen)) + (parseFloat(x.marzo)-parseFloat(x.marzoOrigen)) + (parseFloat(x.abril)-parseFloat(x.abrilOrigen)) + (parseFloat(x.mayo)-parseFloat(x.mayoOrigen)) + (parseFloat(x.junio)-parseFloat(x.junioOrigen)) + (parseFloat(x.julio)-parseFloat(x.julioOrigen)) + (parseFloat(x.agosto)-parseFloat(x.agostoOrigen)) + (parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)) + (parseFloat(x.octubre)-parseFloat(x.octubreOrigen)) + (parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)) + (parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen));



				destinoTotalInicial__2=parseFloat(x.eneroDestino__destino) + parseFloat(x.febreroDestino__destino) + parseFloat(x.marzoDestino__destino) + parseFloat(x.abrilDestino__destino) + parseFloat(x.mayoDestino__destino) + parseFloat(x.junioDestino__destino) + parseFloat(x.julioDestino__destino) + parseFloat(x.agostoDestino__destino) + parseFloat(x.septiembreDestino__destino) + parseFloat(x.octubreDestino__destino) + parseFloat(x.noviembreDestino__destino) + parseFloat(x.diciembreDestino__destino);

				destinoTotalVigente__2=(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)) + (parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)) + (parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)) +(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)) + (parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)) + (parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)) +(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)) + (parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)) + (parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)) + (parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)) + (parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)) + (parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino));			



				$(".contenedor__lineas__modificaciones3").append('<tr><th colspan="32" align="center" style="border-left:1px solid black; border-right:1px solid black;">'+tipoTramite+'</th></tr><tr class="fila__modificaciones__califica__analistas"><th colspan="30" align="center" style="border-left:1px solid black; border-right:1px solid black;"><div class="row"><div class="col col-8" style="text-align:left!important;">'+x.modificacionEstado+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Observación:&nbsp;&nbsp;'+x.observaciones+'</div></div></th></tr><tr><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-bottom:1px solid black!important;border-left:1px solid black!important;">'+contador+'</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Cédula</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombre</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+eventoOrigen+'</td><td align="center">'+x.idFinancierioOrigen+'</td><td align="center" '+color__origen__destino__enero+'>'+x.enero+'</td><td align="center" '+color__origen__destino__enero+'>'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__febrero+'>'+x.febrero+'</td><td align="center" '+color__origen__destino__febrero+'>'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__marzo+'>'+x.marzo+'</td><td align="center" '+color__origen__destino__marzo+'>'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__abril+'>'+x.abril+'</td><td align="center" '+color__origen__destino__abril+'>'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__mayo+'>'+x.mayo+'</td><td align="center" '+color__origen__destino__mayo+'>'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__junio+'>'+x.junio+'</td><td align="center" '+color__origen__destino__junio+'>'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__julio+'>'+x.julio+'</td><td align="center" '+color__origen__destino__julio+'>'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__agosto+'>'+x.agosto+'</td><td align="center" '+color__origen__destino__agosto+'>'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__septiembre+'>'+x.septiembre+'</td><td align="center" '+color__origen__destino__septiembre+'>'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__octubre+'>'+x.octubre+'</td><td align="center" '+color__origen__destino__octubre+'>'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__noviembre+'>'+x.noviembre+'</td><td align="center" '+color__origen__destino__noviembre+'>'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__diciembre+'>'+x.diciembre+'</td><td align="center" '+color__origen__destino__diciembre+'>'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__2+'</td><td align="center">'+origenTotalVigente__2+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Evento</td><td rowspan="1" align="center" style="font-weight:bold;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+eventosDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.idFinancierioDestino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__2+'</td><td align="center">'+destinoTotalVigente__2+'</td></tr>');

				$(".contenedor__lineas__modificaciones3__editar").append('<tr><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Cédula</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombre</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+eventoOrigen+'</td><td align="center">'+x.idFinancierioOrigen+'</td><td align="center">'+x.enero+'</td><td align="center">'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center">'+x.febrero+'</td><td align="center">'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center">'+x.marzo+'</td><td align="center">'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center">'+x.abril+'</td><td align="center">'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center">'+x.mayo+'</td><td align="center">'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center">'+x.junio+'</td><td align="center">'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center">'+x.julio+'</td><td align="center">'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center">'+x.agosto+'</td><td align="center">'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center">'+x.septiembre+'</td><td align="center">'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center">'+x.octubre+'</td><td align="center">'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center">'+x.noviembre+'</td><td align="center">'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center">'+x.diciembre+'</td><td align="center">'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__2+'</td><td align="center">'+origenTotalVigente__2+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Evento</td><td rowspan="1" align="center" style="font-weight:bold;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+eventosDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.idFinancierioDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__2+'</td><td align="center">'+destinoTotalVigente__2+'</td></tr>');


				$("#aprobar__linea"+x.idOrigenDestino).val(x.modificacionEstado);

			}				

			}else{
				$("#tabla__3").remove();
			}

			if (informacionObtenida__honorarios!="" && informacionObtenida__honorarios!=" " && informacionObtenida__honorarios!=undefined && informacionObtenida__honorarios!=null && informacionObtenida__honorarios!="N/A") {


			let origenTotalInicial__1=0;
			let origenTotalVigente__1=0;
			let destinoTotalInicial__1=0;
			let destinoTotalVigente__1=0;

			for(x of informacionObtenida__honorarios){


				let color__origen__destino__enero;
				let color__origen__destino__febrero;
				let color__origen__destino__marzo;
				let color__origen__destino__abril;
				let color__origen__destino__mayo;
				let color__origen__destino__junio;
				let color__origen__destino__julio;
				let color__origen__destino__agosto;
				let color__origen__destino__septiembre;
				let color__origen__destino__octubre;
				let color__origen__destino__noviembre;
				let color__origen__destino__diciembre;


				let color__destino__origen__enero;
				let color__destino__origen__febrero;
				let color__destino__origen__marzo;
				let color__destino__origen__abril;
				let color__destino__origen__mayo;
				let color__destino__origen__junio;
				let color__destino__origen__julio;
				let color__destino__origen__agosto;
				let color__destino__origen__septiembre;
				let color__destino__origen__octubre;
				let color__destino__origen__noviembre;
				let color__destino__origen__diciembre;

				contador++;

				if (x.tipoTramite==1) {
					tipoTramite="Caso 1 (Actividades e items iguales en orígen y destino)";
				}else if(x.tipoTramite==2){
					tipoTramite="Caso 2 (Actividades iguales en orígen y destino)";
				}else if(x.tipoTramite==3){
					tipoTramite="Caso 3 (Actividades diferentes en orígen y destino)";
				}


				origenTotalInicial__1=parseFloat(x.enero) + parseFloat(x.febrero) + parseFloat(x.marzo) + parseFloat(x.abril) + parseFloat(x.mayo) + parseFloat(x.junio) + parseFloat(x.julio) + parseFloat(x.agosto) + parseFloat(x.septiembre) + parseFloat(x.octubre) + parseFloat(x.noviembre) + parseFloat(x.diciembre);

				origenTotalVigente__1=(parseFloat(x.enero)-parseFloat(x.eneroOrigen)) + (parseFloat(x.febrero)-parseFloat(x.febreroOrigen)) + (parseFloat(x.marzo)-parseFloat(x.marzoOrigen)) + (parseFloat(x.abril)-parseFloat(x.abrilOrigen)) + (parseFloat(x.mayo)-parseFloat(x.mayoOrigen)) + (parseFloat(x.junio)-parseFloat(x.junioOrigen)) + (parseFloat(x.julio)-parseFloat(x.julioOrigen)) + (parseFloat(x.agosto)-parseFloat(x.agostoOrigen)) + (parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)) + (parseFloat(x.octubre)-parseFloat(x.octubreOrigen)) + (parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)) + (parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen));



				destinoTotalInicial__1=parseFloat(x.eneroDestino__destino) + parseFloat(x.febreroDestino__destino) + parseFloat(x.marzoDestino__destino) + parseFloat(x.abrilDestino__destino) + parseFloat(x.mayoDestino__destino) + parseFloat(x.junioDestino__destino) + parseFloat(x.julioDestino__destino) + parseFloat(x.agostoDestino__destino) + parseFloat(x.septiembreDestino__destino) + parseFloat(x.octubreDestino__destino) + parseFloat(x.noviembreDestino__destino) + parseFloat(x.diciembreDestino__destino);

				destinoTotalVigente__1=(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)) + (parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)) + (parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)) +(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)) + (parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)) + (parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)) +(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)) + (parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)) + (parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)) + (parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)) + (parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)) + (parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino));

				if (parseFloat(x.eneroOrigen)>0) {
					color__origen__destino__enero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.febreroOrigen)>0) {
					color__origen__destino__febrero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.marzoOrigen)>0) {
					color__origen__destino__marzo='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.abrilOrigen)>0) {
					color__origen__destino__abril='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.mayoOrigen)>0) {
					color__origen__destino__mayo='style="background:blue!important; color:white!important;"';
				}				

				if (parseFloat(x.junioOrigen)>0) {
					color__origen__destino__junio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.julioOrigen)>0) {
					color__origen__destino__julio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.agostoOrigen)>0) {
					color__origen__destino__agosto='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.septiembreOrigen)>0) {
					color__origen__destino__septiembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.octubreOrigen)>0) {
					color__origen__destino__octubre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.noviembreOrigen)>0) {
					color__origen__destino__noviembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.diciembreOrigen)>0) {
					color__origen__destino__diciembre='style="background:blue!important; color:white!important;"';
				}


				if (parseFloat(x.eneroDestino)>0) {
					color__destino__origen__enero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.febreroDestino)>0) {
					color__destino__origen__febrero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.marzoDestino)>0) {
					color__destino__origen__marzo='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.abrilDestino)>0) {
					color__destino__origen__abril='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.mayoDestino)>0) {
					color__destino__origen__mayo='background:cyan!important; color:black!important;';
				}				

				if (parseFloat(x.junioDestino)>0) {
					color__destino__origen__junio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.julioDestino)>0) {
					color__destino__origen__julio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.agostoDestino)>0) {
					color__destino__origen__agosto='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.septiembreDestino)>0) {
					color__destino__origen__septiembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.octubreDestino)>0) {
					color__destino__origen__octubre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.noviembreDestino)>0) {
					color__destino__origen__noviembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.diciembreDestino)>0) {
					color__destino__origen__diciembre='background:cyan!important; color:black!important;';
				}



				$(".contenedor__lineas__modificaciones4").append('<tr><th colspan="32" align="center" style="border-left:1px solid black; border-right:1px solid black;">'+tipoTramite+'</th></tr><tr class="fila__modificaciones__califica__analistas"><th colspan="30" align="center" style="border-left:1px solid black; border-right:1px solid black;"><div class="row"><div class="col col-8" style="text-align:left!important;">'+x.modificacionEstado+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Observación:&nbsp;&nbsp;'+x.observaciones+'</div></div></th></tr><tr><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-bottom:1px solid black!important;border-left:1px solid black!important;">'+contador+'</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombres</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+x.eventosOrigen+'</td><td align="center" '+color__origen__destino__enero+'>'+x.enero+'</td><td align="center" '+color__origen__destino__enero+'>'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__febrero+'>'+x.febrero+'</td><td align="center" '+color__origen__destino__febrero+'>'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__marzo+'>'+x.marzo+'</td><td align="center" '+color__origen__destino__marzo+'>'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__abril+'>'+x.abril+'</td><td align="center" '+color__origen__destino__abril+'>'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__mayo+'>'+x.mayo+'</td><td align="center" '+color__origen__destino__mayo+'>'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__junio+'>'+x.junio+'</td><td align="center" '+color__origen__destino__junio+'>'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__julio+'>'+x.julio+'</td><td align="center" '+color__origen__destino__julio+'>'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__agosto+'>'+x.agosto+'</td><td align="center" '+color__origen__destino__agosto+'>'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__septiembre+'>'+x.septiembre+'</td><td align="center" '+color__origen__destino__septiembre+'>'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__octubre+'>'+x.octubre+'</td><td align="center" '+color__origen__destino__octubre+'>'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__noviembre+'>'+x.noviembre+'</td><td align="center" '+color__origen__destino__noviembre+'>'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__diciembre+'>'+x.diciembre+'</td><td align="center" '+color__origen__destino__diciembre+'>'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__1+'</td><td align="center">'+origenTotalVigente__1+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Nombres</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eventosDestino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__1+'</td><td align="center">'+destinoTotalVigente__1+'</td></tr>');

				$(".contenedor__lineas__modificaciones4__editar").append('<tr><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombres</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+x.eventosOrigen+'</td><td align="center">'+x.enero+'</td><td align="center">'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center">'+x.febrero+'</td><td align="center">'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center">'+x.marzo+'</td><td align="center">'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center">'+x.abril+'</td><td align="center">'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center">'+x.mayo+'</td><td align="center">'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center">'+x.junio+'</td><td align="center">'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center">'+x.julio+'</td><td align="center">'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center">'+x.agosto+'</td><td align="center">'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center">'+x.septiembre+'</td><td align="center">'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center">'+x.octubre+'</td><td align="center">'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center">'+x.noviembre+'</td><td align="center">'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center">'+x.diciembre+'</td><td align="center">'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__1+'</td><td align="center">'+origenTotalVigente__1+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Nombres</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eventosDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__1+'</td><td align="center">'+destinoTotalVigente__1+'</td></tr>');


				$("#aprobar__linea"+x.idOrigenDestino).val(x.modificacionEstado);

			}			

			}else{
				$("#tabla__4").remove();
			}	


			let origenTotalInicial__0=0;
			let origenTotalVigente__0=0;
			let destinoTotalInicial__0=0;
			let destinoTotalVigente__0=0;

			for(x of informacionObtenida){

				contador++;

				let color__origen__destino__enero;
				let color__origen__destino__febrero;
				let color__origen__destino__marzo;
				let color__origen__destino__abril;
				let color__origen__destino__mayo;
				let color__origen__destino__junio;
				let color__origen__destino__julio;
				let color__origen__destino__agosto;
				let color__origen__destino__septiembre;
				let color__origen__destino__octubre;
				let color__origen__destino__noviembre;
				let color__origen__destino__diciembre;


				let color__destino__origen__enero;
				let color__destino__origen__febrero;
				let color__destino__origen__marzo;
				let color__destino__origen__abril;
				let color__destino__origen__mayo;
				let color__destino__origen__junio;
				let color__destino__origen__julio;
				let color__destino__origen__agosto;
				let color__destino__origen__septiembre;
				let color__destino__origen__octubre;
				let color__destino__origen__noviembre;
				let color__destino__origen__diciembre;

				if (x.eventosOrigen=="null" || x.eventosOrigen==null) {
					eventoOrigen='N/A';
				}else{
					eventoOrigen=x.eventosOrigen;
				}

				if (x.eventosDestino=="null" || x.eventosDestino==null) {
					eventosDestino='N/A';
				}else{
					eventosDestino=x.eventosDestino;
				}

				if (x.tipoTramite==1) {
					tipoTramite="Caso 1 (Actividades e items iguales en orígen y destino)";
				}else if(x.tipoTramite==2){
					tipoTramite="Caso 2 (Actividades iguales en orígen y destino)";
				}else if(x.tipoTramite==3){
					tipoTramite="Caso 3 (Actividades diferentes en orígen y destino)";
				}



				origenTotalInicial__0=parseFloat(x.enero) + parseFloat(x.febrero) + parseFloat(x.marzo) + parseFloat(x.abril) + parseFloat(x.mayo) + parseFloat(x.junio) + parseFloat(x.julio) + parseFloat(x.agosto) + parseFloat(x.septiembre) + parseFloat(x.octubre) + parseFloat(x.noviembre) + parseFloat(x.diciembre);

				origenTotalVigente__0=(parseFloat(x.enero)-parseFloat(x.eneroOrigen)) + (parseFloat(x.febrero)-parseFloat(x.febreroOrigen)) + (parseFloat(x.marzo)-parseFloat(x.marzoOrigen)) + (parseFloat(x.abril)-parseFloat(x.abrilOrigen)) + (parseFloat(x.mayo)-parseFloat(x.mayoOrigen)) + (parseFloat(x.junio)-parseFloat(x.junioOrigen)) + (parseFloat(x.julio)-parseFloat(x.julioOrigen)) + (parseFloat(x.agosto)-parseFloat(x.agostoOrigen)) + (parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)) + (parseFloat(x.octubre)-parseFloat(x.octubreOrigen)) + (parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)) + (parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen));



				destinoTotalInicial__0=parseFloat(x.eneroDestino__destino) + parseFloat(x.febreroDestino__destino) + parseFloat(x.marzoDestino__destino) + parseFloat(x.abrilDestino__destino) + parseFloat(x.mayoDestino__destino) + parseFloat(x.junioDestino__destino) + parseFloat(x.julioDestino__destino) + parseFloat(x.agostoDestino__destino) + parseFloat(x.septiembreDestino__destino) + parseFloat(x.octubreDestino__destino) + parseFloat(x.noviembreDestino__destino) + parseFloat(x.diciembreDestino__destino);

				destinoTotalVigente__0=(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)) + (parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)) + (parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)) +(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)) + (parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)) + (parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)) +(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)) + (parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)) + (parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)) + (parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)) + (parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)) + (parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino));

				if (parseFloat(x.eneroOrigen)>0) {
					color__origen__destino__enero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.febreroOrigen)>0) {
					color__origen__destino__febrero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.marzoOrigen)>0) {
					color__origen__destino__marzo='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.abrilOrigen)>0) {
					color__origen__destino__abril='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.mayoOrigen)>0) {
					color__origen__destino__mayo='style="background:blue!important; color:white!important;"';
				}				

				if (parseFloat(x.junioOrigen)>0) {
					color__origen__destino__junio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.julioOrigen)>0) {
					color__origen__destino__julio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.agostoOrigen)>0) {
					color__origen__destino__agosto='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.septiembreOrigen)>0) {
					color__origen__destino__septiembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.octubreOrigen)>0) {
					color__origen__destino__octubre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.noviembreOrigen)>0) {
					color__origen__destino__noviembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.diciembreOrigen)>0) {
					color__origen__destino__diciembre='style="background:blue!important; color:white!important;"';
				}


				if (parseFloat(x.eneroDestino)>0) {
					color__destino__origen__enero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.febreroDestino)>0) {
					color__destino__origen__febrero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.marzoDestino)>0) {
					color__destino__origen__marzo='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.abrilDestino)>0) {
					color__destino__origen__abril='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.mayoDestino)>0) {
					color__destino__origen__mayo='background:cyan!important; color:black!important;';
				}				

				if (parseFloat(x.junioDestino)>0) {
					color__destino__origen__junio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.julioDestino)>0) {
					color__destino__origen__julio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.agostoDestino)>0) {
					color__destino__origen__agosto='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.septiembreDestino)>0) {
					color__destino__origen__septiembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.octubreDestino)>0) {
					color__destino__origen__octubre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.noviembreDestino)>0) {
					color__destino__origen__noviembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.diciembreDestino)>0) {
					color__destino__origen__diciembre='background:cyan!important; color:black!important;';
				}


				$(".contenedor__lineas__modificaciones5").append('<tr><th colspan="32" align="center" style="border-left:1px solid black; border-right:1px solid black;">'+tipoTramite+'</th></tr><tr class="fila__modificaciones__califica__analistas"><th colspan="30" align="center" style="border-left:1px solid black; border-right:1px solid black;"><div class="row"><div class="col col-8" style="text-align:left!important;">'+x.modificacionEstado+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Observación:&nbsp;&nbsp;'+x.observaciones+'</div></div></th></tr><tr><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-bottom:1px solid black!important;border-left:1px solid black!important;">'+contador+'</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Evento</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+eventoOrigen+'</td><td align="center">'+x.idFinancierioOrigen+'</td><td align="center" '+color__origen__destino__enero+'>'+x.enero+'</td><td align="center" '+color__origen__destino__enero+'>'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__febrero+'>'+x.febrero+'</td><td align="center" '+color__origen__destino__febrero+'>'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__marzo+'>'+x.marzo+'</td><td align="center" '+color__origen__destino__marzo+'>'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__abril+'>'+x.abril+'</td><td align="center" '+color__origen__destino__abril+'>'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__mayo+'>'+x.mayo+'</td><td align="center" '+color__origen__destino__mayo+'>'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__junio+'>'+x.junio+'</td><td align="center" '+color__origen__destino__junio+'>'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__julio+'>'+x.julio+'</td><td align="center" '+color__origen__destino__julio+'>'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__agosto+'>'+x.agosto+'</td><td align="center" '+color__origen__destino__agosto+'>'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__septiembre+'>'+x.septiembre+'</td><td align="center" '+color__origen__destino__septiembre+'>'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__octubre+'>'+x.octubre+'</td><td align="center" '+color__origen__destino__octubre+'>'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__noviembre+'>'+x.noviembre+'</td><td align="center" '+color__origen__destino__noviembre+'>'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__diciembre+'>'+x.diciembre+'</td><td align="center" '+color__origen__destino__diciembre+'>'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__0+'</td><td align="center">'+origenTotalVigente__0+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Evento</td><td rowspan="1" align="center" style="font-weight:bold;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+eventosDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.idFinancierioDestino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__0+'</td><td align="center">'+destinoTotalVigente__0+'</td></tr>');

				$(".contenedor__lineas__modificaciones5__editar").append('<tr><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Evento</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+eventoOrigen+'</td><td align="center">'+x.idFinancierioOrigen+'</td><td align="center">'+x.enero+'</td><td align="center">'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center">'+x.febrero+'</td><td align="center">'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center">'+x.marzo+'</td><td align="center">'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center">'+x.abril+'</td><td align="center">'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center">'+x.mayo+'</td><td align="center">'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center">'+x.junio+'</td><td align="center">'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center">'+x.julio+'</td><td align="center">'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center">'+x.agosto+'</td><td align="center">'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center">'+x.septiembre+'</td><td align="center">'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center">'+x.octubre+'</td><td align="center">'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center">'+x.noviembre+'</td><td align="center">'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center">'+x.diciembre+'</td><td align="center">'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__0+'</td><td align="center">'+origenTotalVigente__0+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Evento</td><td rowspan="1" align="center" style="font-weight:bold;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+eventosDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.idFinancierioDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__0+'</td><td align="center">'+destinoTotalVigente__0+'</td></tr>');


				$("#aprobar__linea"+x.idOrigenDestino).val(x.modificacionEstado);

			}
			execelGenerados($(".excelProyectosMatricez__0"),"tabla__0__modificaciones__editar","Modificación");
			execelGenerados($(".excelProyectosMatricez__1"),"tabla__1__modificaciones__editar","Modificación");
			execelGenerados($(".excelProyectosMatricez__2"),"tabla__2__modificaciones__editar","Modificación");
			execelGenerados($(".excelProyectosMatricez__3"),"tabla__3__modificaciones__editar","Modificación");
			execelGenerados($(".excelProyectosMatricez__4"),"tabla__4__modificaciones__editar","Modificación");
			execelGenerados($(".excelProyectosMatricez__5"),"tabla__5__modificaciones__editar","Modificación");


			if ($("#idRolAd").val()==4) {

				selector__recomendar__cor__planificacion__modificaciones($(".selector__modificacion__lineas"));

			}else if ($("#idRolAd").val()==2) {

				selector__recomendar__dir__planificacion__modificaciones($(".selector__modificacion__lineas"));

			}else{

				$(".modal__modificaciones__revisor__enviar__planifiacion").remove();
				$(".modal__modificaciones__analistas__enviar__planifiacion").show();

				selector__recomendar__analista__planificacion__modificaciones($(".selector__modificacion__lineas"));

			}

			if ($("#idRolAd").val()==3) {

				$(".ocultos__generar__pdf__planifiacion__modificaciones").show();

				let listado__actividades__totales=elementos['listado__actividades__totales'];

				let actividadSuma__m1=elementos['actividadSuma__m1'];
				let actividadSuma__m2=elementos['actividadSuma__m2'];
				let actividadSuma__m3=elementos['actividadSuma__m3'];
				let actividadSuma__m4=elementos['actividadSuma__m4'];
				let actividadSuma__m5=elementos['actividadSuma__m5'];
				let actividadSuma__m6=elementos['actividadSuma__m6'];
				let actividadSuma__m7=elementos['actividadSuma__m7'];

				let contador=0;

				for(x of listado__actividades__totales){

					if (contador==0 && actividadSuma__m1!=null && actividadSuma__m1!=undefined && actividadSuma__m1!="" && actividadSuma__m1!=" ") {
						$(".contenedor__matriz__analista").append("<tr><td>"+x.idActividades+" "+x.nombreActividades+"</td><td>"+actividadSuma__m1+"</td><td><select id='select__1' name='select__1' style='width:100%; height:30px;'><option value='aprobar'>Aprobar</option><option value='rechazar'>Rechazar</option></select><td><textarea id='texttarea__1' name='texttarea__1' style='width:100%; height:45px!important;'></textarea></td></tr>")

					}

					if (contador==1 && actividadSuma__m2!=null && actividadSuma__m2!=undefined && actividadSuma__m2!="" && actividadSuma__m2!=" ") {
						$(".contenedor__matriz__analista").append("<tr><td>"+x.idActividades+" "+x.nombreActividades+"</td><td>"+actividadSuma__m2+"</td><td><select id='select__2' name='select__2' style='width:100%; height:30px;'><option value='aprobar'>Aprobar</option><option value='rechazar'>Rechazar</option></select><td><textarea id='texttarea__2' name='texttarea__2' style='width:100%; height:45px!important;'></textarea></td></tr>")

					}

					if (contador==2 && actividadSuma__m3!=null && actividadSuma__m3!=undefined && actividadSuma__m3!="" && actividadSuma__m3!=" ") {
						$(".contenedor__matriz__analista").append("<tr><td>"+x.idActividades+" "+x.nombreActividades+"</td><td>"+actividadSuma__m3+"</td><td><select id='select__3' name='select__3' style='width:100%; height:30px;'><option value='aprobar'>Aprobar</option><option value='rechazar'>Rechazar</option></select><td><textarea id='texttarea__3' name='texttarea__3' style='width:100%; height:45px!important;'></textarea></td></tr>")

					}

					if (contador==3 && actividadSuma__m4!=null && actividadSuma__m4!=undefined && actividadSuma__m4!="" && actividadSuma__m4!=" ") {
						$(".contenedor__matriz__analista").append("<tr><td>"+x.idActividades+" "+x.nombreActividades+"</td><td>"+actividadSuma__m4+"</td><td><select id='select__4' name='select__4' style='width:100%; height:30px;'><option value='aprobar'>Aprobar</option><option value='rechazar'>Rechazar</option></select><td><textarea id='texttarea__4' name='texttarea__4' style='width:100%; height:45px!important;'></textarea></td></tr>")

					}

					if (contador==4 && actividadSuma__m5!=null && actividadSuma__m5!=undefined && actividadSuma__m5!="" && actividadSuma__m5!=" ") {
						$(".contenedor__matriz__analista").append("<tr><td>"+x.idActividades+" "+x.nombreActividades+"</td><td>"+actividadSuma__m5+"</td><td><select id='select__5' name='select__5' style='width:100%; height:30px;'><option value='aprobar'>Aprobar</option><option value='rechazar'>Rechazar</option></select><td><textarea id='texttarea__5' name='texttarea__5' style='width:100%; height:45px!important;'></textarea></td></tr>")

					}

					if (contador==5 && actividadSuma__m6!=null && actividadSuma__m6!=undefined && actividadSuma__m6!="" && actividadSuma__m6!=" ") {
						$(".contenedor__matriz__analista").append("<tr><td>"+x.idActividades+" "+x.nombreActividades+"</td><td>"+actividadSuma__m6+"</td><td><select id='select__6' name='select__6' style='width:100%; height:30px;'><option value='aprobar'>Aprobar</option><option value='rechazar'>Rechazar</option></select><td><textarea id='texttarea__6' name='texttarea__6' style='width:100%; height:45px!important;'></textarea></td></tr>")

					}

					if (contador==6 && actividadSuma__m7!=null && actividadSuma__m7!=undefined && actividadSuma__m7!="" && actividadSuma__m7!=" ") {
						$(".contenedor__matriz__analista").append("<tr><td>"+x.idActividades+" "+x.nombreActividades+"</td><td>"+actividadSuma__m7+"</td><td><select id='select__7' name='select__7' style='width:100%; height:30px;'><option value='aprobar'>Aprobar</option><option value='rechazar'>Rechazar</option></select><td><textarea id='texttarea__7' name='texttarea__7' style='width:100%; height:45px!important;'></textarea></td></tr>")

					}

					contador++;

				}


			}

			let informacionObtenida__documentos=elementos['informacionObtenida__documentos'];

			for(x of informacionObtenida__documentos){

				if(x.documentoInfraestructura!="" && x.documentoInfraestructura!=" " && x.documentoInfraestructura!=undefined && x.documentoInfraestructura!=null){

					$("#documentoInfraestructura").attr('href','documentos/modificacion/informe/infraestructura/'+x.documentoInfraestructura);
					$(".ver__infraestructura__modificaciones").show();

				}

				if (x.documentoInstalaciones!="" && x.documentoInstalaciones!=" " && x.documentoInstalaciones!=undefined && x.documentoInstalaciones!=null) {

					$("#documentoInstalaciones").attr('href','documentos/modificacion/informe/instalaciones/'+x.documentoInstalaciones);
					$(".ver__instalaciones__modificaciones").show();

				}

				if (x.documentoAdministrativo!="" && x.documentoAdministrativo!=" " && x.documentoAdministrativo!=undefined && x.documentoAdministrativo!=null) {

					$("#documentoAdministrativo").attr('href','documentos/modificacion/informe/administrativo/'+x.documentoAdministrativo);
					$(".ver__administrativo__modificaciones").show();

				}

				if (x.documentoAlto!="" && x.documentoAlto!=" " && x.documentoAlto!=undefined && x.documentoAlto!=null) {

					$("#documentoSubsecretaria").attr('href','documentos/modificacion/informe/altoRendimiento/'+x.documentoAlto);
					$(".ver__subsecretaria__modificaciones").show();

				}

				if(x.documentoDesarrollo!="" && x.documentoDesarrollo!=" " && x.documentoDesarrollo!=undefined && x.documentoDesarrollo!=null){

					$("#documentoSubsecretaria").attr('href','documentos/modificacion/informe/desarrollo/'+x.documentoDesarrollo);
					$(".ver__subsecretaria__modificaciones").show();

				}

			}			

		});

		},
		error:function(){

		}
				
	});		

});

}


var funcion__recomendar=function(tbody,table){

$(tbody).on("click","button.recomendar__modificaciones",function(e){

	let data=table.row($(this).parents("tr")).data();

	$(".textos__titulos").text(data[1]);

	$("#idTramite").val(data[4]);
	$("#idOrganismo").val(data[5]);
	$(".idOrganismo__lineas").val(data[5]);

	let paqueteDeDatos = new FormData();

	paqueteDeDatos.append('tipo','lineas__modificaciones');
	paqueteDeDatos.append('idLinea',data[4]);


	$.ajax({

		type:"POST",
		url:"modelosBd/inserta/seleccionaAcciones.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

		$.getScript("layout/scripts/js/modificacionRevisor/selector.js",function(){
        
			let elementos=JSON.parse(response);
			let informacionObtenida=elementos['informacionObtenida'];
			let informacionObtenida__honorarios=elementos['informacionObtenida__honorarios'];
			let informacionObtenida__honorarios__items=elementos['informacionObtenida__honorarios__items'];
			let informacionObtenida__sueldos__salarios=elementos['informacionObtenida__sueldos__salarios'];
			let informacionObtenida__sueldos__items=elementos['informacionObtenida__sueldos__items'];
			let informacionObtenida__desvinculaciones=elementos['informacionObtenida__desvinculaciones'];

			let informacionObtenida__documentos=elementos['informacionObtenida__documentos'];

			for(x of informacionObtenida__documentos){

				if($("#idRolAd").val()==2 && $("#fisicamenteE").val()==6){

					$("#descargarInformeM").attr('href','documentos/modificacion/informe/instalaciones/'+x.documentoInstalaciones);

				}else if ($("#fisicamenteE").val()==1 || $("#fisicamenteE").val()==15) {

					$("#descargarInformeM").attr('href','documentos/modificacion/informe/infraestructura/'+x.documentoInfraestructura);

				}else if ($("#fisicamenteE").val()==2 || $("#fisicamenteE").val()==5) {

					$("#descargarInformeM").attr('href','documentos/modificacion/informe/administrativo/'+x.documentoAdministrativo);

				}else if ($("#fisicamenteE").val()==24 || $("#fisicamenteE").val()==12 || $("#fisicamenteE").val()==14) {

					$("#descargarInformeM").attr('href','documentos/modificacion/informe/altoRendimiento/'+x.documentoAlto);

				}else{

					$("#descargarInformeM").attr('href','documentos/modificacion/informe/desarrollo/'+x.documentoDesarrollo);

				}

				if($("#idRolAd").val()==4 && $("#fisicamenteE").val()==1){

					$("#descargarInformeM2").attr('href','documentos/modificacion/informe/instalaciones/'+x.documentoInstalaciones);

				}

			}

			if($("#idRolAd").val()==4 && $("#fisicamenteE").val()==1){

				$(".nombre__infraestructura").text("Descargar pdf infraestructura");
				$(".cargar__infraestructura").text("Cargar pdf infraestructura");
				$(".oculto__solo__instalaciones__modificaciones").show();
				
			}


			let contador=0;

			let eventoOrigen="";
			let eventosDestino="";
			let tipoTramite="";		

			$(".contenedor__lineas__modificaciones0").html(" ");
			$(".contenedor__lineas__modificaciones1").html(" ");
			$(".contenedor__lineas__modificaciones2").html(" ");
			$(".contenedor__lineas__modificaciones3").html(" ");
			$(".contenedor__lineas__modificaciones4").html(" ");
			$(".contenedor__lineas__modificaciones5").html(" ");	


			if (informacionObtenida__desvinculaciones!="" && informacionObtenida__desvinculaciones!=" " && informacionObtenida__desvinculaciones!=undefined && informacionObtenida__desvinculaciones!=null && informacionObtenida__desvinculaciones!="N/A") {

				let origenTotalInicial__5=0;
				let origenTotalVigente__5=0;
				let destinoTotalInicial__5=0;

				for(x of informacionObtenida__desvinculaciones){

					contador++;


					let color__origen__destino__enero;
					let color__origen__destino__febrero;
					let color__origen__destino__marzo;
					let color__origen__destino__abril;
					let color__origen__destino__mayo;
					let color__origen__destino__junio;
					let color__origen__destino__julio;
					let color__origen__destino__agosto;
					let color__origen__destino__septiembre;
					let color__origen__destino__octubre;
					let color__origen__destino__noviembre;
					let color__origen__destino__diciembre;


					let color__destino__origen__enero;
					let color__destino__origen__febrero;
					let color__destino__origen__marzo;
					let color__destino__origen__abril;
					let color__destino__origen__mayo;
					let color__destino__origen__junio;
					let color__destino__origen__julio;
					let color__destino__origen__agosto;
					let color__destino__origen__septiembre;
					let color__destino__origen__octubre;
					let color__destino__origen__noviembre;
					let color__destino__origen__diciembre;



					if (x.eventosOrigen=="null" || x.eventosOrigen==null) {
						eventoOrigen='N/A';
					}else{
						eventoOrigen=x.eventosOrigen;
					}

					if (x.eventosDestino=="null" || x.eventosDestino==null) {
						eventosDestino='N/A';
					}else{
						eventosDestino=x.eventosDestino;
					}

					if (x.tipoTramite==1) {
						tipoTramite="TRÁMITE DE DESVINCULACIÓN";
					}else if(x.tipoTramite==2){
						tipoTramite="TRÁMITE DE DESVINCULACIÓN";
					}else if(x.tipoTramite==3){
						tipoTramite="TRÁMITE DE DESVINCULACIÓN";
					}

					origenTotalInicial__5=parseFloat(x.enero) + parseFloat(x.febrero) + parseFloat(x.marzo) + parseFloat(x.abril) + parseFloat(x.mayo) + parseFloat(x.junio) + parseFloat(x.julio) + parseFloat(x.agosto) + parseFloat(x.septiembre) + parseFloat(x.octubre) + parseFloat(x.noviembre) + parseFloat(x.diciembre);

					origenTotalVigente__5=(parseFloat(x.enero)-parseFloat(x.eneroOrigen)) + (parseFloat(x.febrero)-parseFloat(x.febreroOrigen)) + (parseFloat(x.marzo)-parseFloat(x.marzoOrigen)) + (parseFloat(x.abril)-parseFloat(x.abrilOrigen)) + (parseFloat(x.mayo)-parseFloat(x.mayoOrigen)) + (parseFloat(x.junio)-parseFloat(x.junioOrigen)) + (parseFloat(x.julio)-parseFloat(x.julioOrigen)) + (parseFloat(x.agosto)-parseFloat(x.agostoOrigen)) + (parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)) + (parseFloat(x.octubre)-parseFloat(x.octubreOrigen)) + (parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)) + (parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen));


					destinoTotalInicial__5=parseFloat(x.eneroDestino) + parseFloat(x.febreroDestino) + parseFloat(x.marzoDestino) + parseFloat(x.abrilDestino) + parseFloat(x.mayoDestino) + parseFloat(x.junioDestino) + parseFloat(x.julioDestino) + parseFloat(x.agostoDestino) + parseFloat(x.septiembreDestino) + parseFloat(x.octubreDestino) + parseFloat(x.noviembreDestino) + parseFloat(x.diciembreDestino);

					$(".contenedor__lineas__modificaciones0").append('<tr><th colspan="32" align="center" style="border-left:1px solid black; border-right:1px solid black;">Caso 1 (Actividades e items iguales en orígen y destino)</th></tr><tr class="fila__modificaciones__califica__analistas"><th colspan="30" align="center" style="border-left:1px solid black; border-right:1px solid black;"><div class="row"><div class="col col-8" style="text-align:left!important;">'+x.modificacionEstado+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Observación:&nbsp;&nbsp;'+x.observaciones+'</div></div></th></tr><<tr><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-bottom:1px solid black!important;border-left:1px solid black!important;">'+contador+'</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Cédula</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombre</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+eventoOrigen+'</td><td align="center">'+x.idFinancierioOrigen+'</td><td align="center" '+color__origen__destino__enero+'>'+x.enero+'</td><td align="center" '+color__origen__destino__enero+'>'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__febrero+'>'+x.febrero+'</td><td align="center" '+color__origen__destino__febrero+'>'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__marzo+'>'+x.marzo+'</td><td align="center" '+color__origen__destino__marzo+'>'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__abril+'>'+x.abril+'</td><td align="center" '+color__origen__destino__abril+'>'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__mayo+'>'+x.mayo+'</td><td align="center" '+color__origen__destino__mayo+'>'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__junio+'>'+x.junio+'</td><td align="center" '+color__origen__destino__junio+'>'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__julio+'>'+x.julio+'</td><td align="center" '+color__origen__destino__julio+'>'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__agosto+'>'+x.agosto+'</td><td align="center" '+color__origen__destino__agosto+'>'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__septiembre+'>'+x.septiembre+'</td><td align="center" '+color__origen__destino__septiembre+'>'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__octubre+'>'+x.octubre+'</td><td align="center" '+color__origen__destino__octubre+'>'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__noviembre+'>'+x.noviembre+'</td><td align="center" '+color__origen__destino__noviembre+'>'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__diciembre+'>'+x.diciembre+'</td><td align="center" '+color__origen__destino__diciembre+'>'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__5+'</td><td align="center">'+origenTotalVigente__5+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold;">Enero</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero</td> <td rowspan="1" align="center" style="font-weight:bold;">Marzo</td> <td rowspan="1" align="center" style="font-weight:bold;">Abril</td> <td rowspan="1" align="center" style="font-weight:bold;">Mayo</td> <td rowspan="1" align="center" style="font-weight:bold;">Junio</td> <td rowspan="1" align="center" style="font-weight:bold;">Julio</td> <td rowspan="1" align="center" style="font-weight:bold;">Agosto</td> <td rowspan="1" align="center" style="font-weight:bold;">Septiembre</td> <td rowspan="1" align="center" style="font-weight:bold;">Octubre</td> <td rowspan="1" align="center" style="font-weight:bold;">Noviembre</td> <td rowspan="1" align="center" style="font-weight:bold;">Diciembre</td><td style="font-weight:bold;">Total Inicial</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.nombreItem+'</td><td style="border-bottom:1px solid black!important;">'+x.eneroDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.febreroDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.marzoDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.abrilDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.mayoDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.junioDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.julioDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.agostoDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.septiembreDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.octubreDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.noviembreDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.diciembreDestino+'</td><td align="center">'+destinoTotalInicial__5+'</td></tr>');

					$(".contenedor__lineas__modificaciones0__editar").append('<tr><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Cédula</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombre</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+eventoOrigen+'</td><td align="center">'+x.idFinancierioOrigen+'</td><td align="center" '+color__origen__destino__enero+'>'+x.enero+'</td><td align="center" '+color__origen__destino__enero+'>'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__febrero+'>'+x.febrero+'</td><td align="center" '+color__origen__destino__febrero+'>'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__marzo+'>'+x.marzo+'</td><td align="center" '+color__origen__destino__marzo+'>'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__abril+'>'+x.abril+'</td><td align="center" '+color__origen__destino__abril+'>'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__mayo+'>'+x.mayo+'</td><td align="center" '+color__origen__destino__mayo+'>'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__junio+'>'+x.junio+'</td><td align="center" '+color__origen__destino__junio+'>'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__julio+'>'+x.julio+'</td><td align="center" '+color__origen__destino__julio+'>'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__agosto+'>'+x.agosto+'</td><td align="center" '+color__origen__destino__agosto+'>'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__septiembre+'>'+x.septiembre+'</td><td align="center" '+color__origen__destino__septiembre+'>'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__octubre+'>'+x.octubre+'</td><td align="center" '+color__origen__destino__octubre+'>'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__noviembre+'>'+x.noviembre+'</td><td align="center" '+color__origen__destino__noviembre+'>'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__diciembre+'>'+x.diciembre+'</td><td align="center" '+color__origen__destino__diciembre+'>'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__5+'</td><td align="center">'+origenTotalVigente__5+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold;">Enero</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero</td> <td rowspan="1" align="center" style="font-weight:bold;">Marzo</td> <td rowspan="1" align="center" style="font-weight:bold;">Abril</td> <td rowspan="1" align="center" style="font-weight:bold;">Mayo</td> <td rowspan="1" align="center" style="font-weight:bold;">Junio</td> <td rowspan="1" align="center" style="font-weight:bold;">Julio</td> <td rowspan="1" align="center" style="font-weight:bold;">Agosto</td> <td rowspan="1" align="center" style="font-weight:bold;">Septiembre</td> <td rowspan="1" align="center" style="font-weight:bold;">Octubre</td> <td rowspan="1" align="center" style="font-weight:bold;">Noviembre</td> <td rowspan="1" align="center" style="font-weight:bold;">Diciembre</td><td style="font-weight:bold;">Total Inicial</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.nombreItem+'</td><td style="border-bottom:1px solid black!important;">'+x.eneroDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.febreroDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.marzoDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.abrilDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.mayoDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.junioDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.julioDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.agostoDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.septiembreDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.octubreDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.noviembreDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.diciembreDestino+'</td><td align="center">'+destinoTotalInicial__5+'</td></tr>');


					$("#aprobar__linea"+x.idOrigenDestino).val(x.modificacionEstado);

				}				

			}else{
				$("#tabla__0").remove();
			}

			if (informacionObtenida__sueldos__items!="" && informacionObtenida__sueldos__items!=" " && informacionObtenida__sueldos__items!=undefined && informacionObtenida__sueldos__items!=null && informacionObtenida__sueldos__items!="N/A") {

			let origenTotalInicial__4=0;
			let origenTotalVigente__4=0;
			let destinoTotalInicial__4=0;
			let destinoTotalVigente__4=0;

			for(x of informacionObtenida__sueldos__items){

				contador++;


				let color__origen__destino__enero;
				let color__origen__destino__febrero;
				let color__origen__destino__marzo;
				let color__origen__destino__abril;
				let color__origen__destino__mayo;
				let color__origen__destino__junio;
				let color__origen__destino__julio;
				let color__origen__destino__agosto;
				let color__origen__destino__septiembre;
				let color__origen__destino__octubre;
				let color__origen__destino__noviembre;
				let color__origen__destino__diciembre;


				let color__destino__origen__enero;
				let color__destino__origen__febrero;
				let color__destino__origen__marzo;
				let color__destino__origen__abril;
				let color__destino__origen__mayo;
				let color__destino__origen__junio;
				let color__destino__origen__julio;
				let color__destino__origen__agosto;
				let color__destino__origen__septiembre;
				let color__destino__origen__octubre;
				let color__destino__origen__noviembre;
				let color__destino__origen__diciembre;



				if (x.eventosOrigen=="null" || x.eventosOrigen==null) {
					eventoOrigen='N/A';
				}else{
					eventoOrigen=x.eventosOrigen;
				}

				if (x.eventosDestino=="null" || x.eventosDestino==null) {
					eventosDestino='N/A';
				}else{
					eventosDestino=x.eventosDestino;
				}

				if (x.tipoTramite==1) {
					tipoTramite="Caso 1 (Actividades e items iguales en orígen y destino)";
				}else if(x.tipoTramite==2){
					tipoTramite="Caso 2 (Actividades iguales en orígen y destino)";
				}else if(x.tipoTramite==3){
					tipoTramite="Caso 3 (Actividades diferentes en orígen y destino)";
				}


				origenTotalInicial__4=parseFloat(x.enero) + parseFloat(x.febrero) + parseFloat(x.marzo) + parseFloat(x.abril) + parseFloat(x.mayo) + parseFloat(x.junio) + parseFloat(x.julio) + parseFloat(x.agosto) + parseFloat(x.septiembre) + parseFloat(x.octubre) + parseFloat(x.noviembre) + parseFloat(x.diciembre);

				origenTotalVigente__4=(parseFloat(x.enero)-parseFloat(x.eneroOrigen)) + (parseFloat(x.febrero)-parseFloat(x.febreroOrigen)) + (parseFloat(x.marzo)-parseFloat(x.marzoOrigen)) + (parseFloat(x.abril)-parseFloat(x.abrilOrigen)) + (parseFloat(x.mayo)-parseFloat(x.mayoOrigen)) + (parseFloat(x.junio)-parseFloat(x.junioOrigen)) + (parseFloat(x.julio)-parseFloat(x.julioOrigen)) + (parseFloat(x.agosto)-parseFloat(x.agostoOrigen)) + (parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)) + (parseFloat(x.octubre)-parseFloat(x.octubreOrigen)) + (parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)) + (parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen));



				destinoTotalInicial__4=parseFloat(x.eneroDestino__destino) + parseFloat(x.febreroDestino__destino) + parseFloat(x.marzoDestino__destino) + parseFloat(x.abrilDestino__destino) + parseFloat(x.mayoDestino__destino) + parseFloat(x.junioDestino__destino) + parseFloat(x.julioDestino__destino) + parseFloat(x.agostoDestino__destino) + parseFloat(x.septiembreDestino__destino) + parseFloat(x.octubreDestino__destino) + parseFloat(x.noviembreDestino__destino) + parseFloat(x.diciembreDestino__destino);

				destinoTotalVigente__4=(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)) + (parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)) + (parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)) +(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)) + (parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)) + (parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)) +(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)) + (parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)) + (parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)) + (parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)) + (parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)) + (parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino));	

				if (parseFloat(x.eneroOrigen)>0) {
					color__origen__destino__enero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.febreroOrigen)>0) {
					color__origen__destino__febrero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.marzoOrigen)>0) {
					color__origen__destino__marzo='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.abrilOrigen)>0) {
					color__origen__destino__abril='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.mayoOrigen)>0) {
					color__origen__destino__mayo='style="background:blue!important; color:white!important;"';
				}				

				if (parseFloat(x.junioOrigen)>0) {
					color__origen__destino__junio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.julioOrigen)>0) {
					color__origen__destino__julio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.agostoOrigen)>0) {
					color__origen__destino__agosto='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.septiembreOrigen)>0) {
					color__origen__destino__septiembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.octubreOrigen)>0) {
					color__origen__destino__octubre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.noviembreOrigen)>0) {
					color__origen__destino__noviembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.diciembreOrigen)>0) {
					color__origen__destino__diciembre='style="background:blue!important; color:white!important;"';
				}


				if (parseFloat(x.eneroDestino)>0) {
					color__destino__origen__enero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.febreroDestino)>0) {
					color__destino__origen__febrero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.marzoDestino)>0) {
					color__destino__origen__marzo='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.abrilDestino)>0) {
					color__destino__origen__abril='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.mayoDestino)>0) {
					color__destino__origen__mayo='background:cyan!important; color:black!important;';
				}				

				if (parseFloat(x.junioDestino)>0) {
					color__destino__origen__junio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.julioDestino)>0) {
					color__destino__origen__julio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.agostoDestino)>0) {
					color__destino__origen__agosto='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.septiembreDestino)>0) {
					color__destino__origen__septiembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.octubreDestino)>0) {
					color__destino__origen__octubre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.noviembreDestino)>0) {
					color__destino__origen__noviembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.diciembreDestino)>0) {
					color__destino__origen__diciembre='background:cyan!important; color:black!important;';
				}


				$(".contenedor__lineas__modificaciones1").append('<tr><th colspan="32" align="center" style="border-left:1px solid black; border-right:1px solid black;">'+tipoTramite+'</th></tr><tr class="fila__modificaciones__califica__analistas"><th colspan="30" align="center" style="border-left:1px solid black; border-right:1px solid black;"><div class="row"><div class="col col-8" style="text-align:left!important;">'+x.modificacionEstado+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Observación:&nbsp;&nbsp;'+x.observaciones+'</div></div></th></tr><tr><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-bottom:1px solid black!important;border-left:1px solid black!important;">'+contador+'</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Cédula</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombre</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+eventoOrigen+'</td><td align="center">'+x.idFinancierioOrigen+'</td><td align="center" '+color__origen__destino__enero+'>'+x.enero+'</td><td align="center" '+color__origen__destino__enero+'>'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__febrero+'>'+x.febrero+'</td><td align="center" '+color__origen__destino__febrero+'>'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__marzo+'>'+x.marzo+'</td><td align="center" '+color__origen__destino__marzo+'>'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__abril+'>'+x.abril+'</td><td align="center" '+color__origen__destino__abril+'>'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__mayo+'>'+x.mayo+'</td><td align="center" '+color__origen__destino__mayo+'>'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__junio+'>'+x.junio+'</td><td align="center" '+color__origen__destino__junio+'>'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__julio+'>'+x.julio+'</td><td align="center" '+color__origen__destino__julio+'>'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__agosto+'>'+x.agosto+'</td><td align="center" '+color__origen__destino__agosto+'>'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__septiembre+'>'+x.septiembre+'</td><td align="center" '+color__origen__destino__septiembre+'>'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__octubre+'>'+x.octubre+'</td><td align="center" '+color__origen__destino__octubre+'>'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__noviembre+'>'+x.noviembre+'</td><td align="center" '+color__origen__destino__noviembre+'>'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__diciembre+'>'+x.diciembre+'</td><td align="center" '+color__origen__destino__diciembre+'>'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__4+'</td><td align="center">'+origenTotalVigente__4+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Evento</td><td rowspan="1" align="center" style="font-weight:bold;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+eventosDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.idFinancierioDestino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__4+'</td><td align="center">'+destinoTotalVigente__4+'</td></tr>');

				$(".contenedor__lineas__modificaciones1__editar").append('<tr><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Cédula</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombre</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+eventoOrigen+'</td><td align="center">'+x.idFinancierioOrigen+'</td><td align="center">'+x.enero+'</td><td align="center">'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center">'+x.febrero+'</td><td align="center">'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center">'+x.marzo+'</td><td align="center">'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center">'+x.abril+'</td><td align="center">'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center">'+x.mayo+'</td><td align="center">'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center">'+x.junio+'</td><td align="center">'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center">'+x.julio+'</td><td align="center">'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center">'+x.agosto+'</td><td align="center">'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center">'+x.septiembre+'</td><td align="center">'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center">'+x.octubre+'</td><td align="center">'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center">'+x.noviembre+'</td><td align="center">'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center">'+x.diciembre+'</td><td align="center">'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__4+'</td><td align="center">'+origenTotalVigente__4+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Evento</td><td rowspan="1" align="center" style="font-weight:bold;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+eventosDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.idFinancierioDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__4+'</td><td align="center">'+destinoTotalVigente__4+'</td></tr>');

				$("#aprobar__linea"+x.idOrigenDestino).val(x.modificacionEstado);

			}				

			}else{
				$("#tabla__1").remove();
			}

			if (informacionObtenida__sueldos__salarios!="" && informacionObtenida__sueldos__salarios!=" " && informacionObtenida__sueldos__salarios!=undefined && informacionObtenida__sueldos__salarios!=null & informacionObtenida__sueldos__salarios!="N/A") {


			let origenTotalInicial__3=0;
			let origenTotalVigente__3=0;
			let destinoTotalInicial__3=0;
			let destinoTotalVigente__3=0;


			for(x of informacionObtenida__sueldos__salarios){

				contador++;

				let color__origen__destino__enero;
				let color__origen__destino__febrero;
				let color__origen__destino__marzo;
				let color__origen__destino__abril;
				let color__origen__destino__mayo;
				let color__origen__destino__junio;
				let color__origen__destino__julio;
				let color__origen__destino__agosto;
				let color__origen__destino__septiembre;
				let color__origen__destino__octubre;
				let color__origen__destino__noviembre;
				let color__origen__destino__diciembre;


				let color__destino__origen__enero;
				let color__destino__origen__febrero;
				let color__destino__origen__marzo;
				let color__destino__origen__abril;
				let color__destino__origen__mayo;
				let color__destino__origen__junio;
				let color__destino__origen__julio;
				let color__destino__origen__agosto;
				let color__destino__origen__septiembre;
				let color__destino__origen__octubre;
				let color__destino__origen__noviembre;
				let color__destino__origen__diciembre;


				if (x.tipoTramite==1) {
					tipoTramite="Caso 1 (Actividades e items iguales en orígen y destino)";
				}else if(x.tipoTramite==2){
					tipoTramite="Caso 2 (Actividades iguales en orígen y destino)";
				}else if(x.tipoTramite==3){
					tipoTramite="Caso 3 (Actividades diferentes en orígen y destino)";
				}



				origenTotalInicial__3=parseFloat(x.enero) + parseFloat(x.febrero) + parseFloat(x.marzo) + parseFloat(x.abril) + parseFloat(x.mayo) + parseFloat(x.junio) + parseFloat(x.julio) + parseFloat(x.agosto) + parseFloat(x.septiembre) + parseFloat(x.octubre) + parseFloat(x.noviembre) + parseFloat(x.diciembre);

				origenTotalVigente__3=(parseFloat(x.enero)-parseFloat(x.eneroOrigen)) + (parseFloat(x.febrero)-parseFloat(x.febreroOrigen)) + (parseFloat(x.marzo)-parseFloat(x.marzoOrigen)) + (parseFloat(x.abril)-parseFloat(x.abrilOrigen)) + (parseFloat(x.mayo)-parseFloat(x.mayoOrigen)) + (parseFloat(x.junio)-parseFloat(x.junioOrigen)) + (parseFloat(x.julio)-parseFloat(x.julioOrigen)) + (parseFloat(x.agosto)-parseFloat(x.agostoOrigen)) + (parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)) + (parseFloat(x.octubre)-parseFloat(x.octubreOrigen)) + (parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)) + (parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen));



				destinoTotalInicial__3=parseFloat(x.eneroDestino__destino) + parseFloat(x.febreroDestino__destino) + parseFloat(x.marzoDestino__destino) + parseFloat(x.abrilDestino__destino) + parseFloat(x.mayoDestino__destino) + parseFloat(x.junioDestino__destino) + parseFloat(x.julioDestino__destino) + parseFloat(x.agostoDestino__destino) + parseFloat(x.septiembreDestino__destino) + parseFloat(x.octubreDestino__destino) + parseFloat(x.noviembreDestino__destino) + parseFloat(x.diciembreDestino__destino);

				destinoTotalVigente__3=(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)) + (parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)) + (parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)) +(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)) + (parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)) + (parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)) +(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)) + (parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)) + (parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)) + (parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)) + (parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)) + (parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino));

				if (parseFloat(x.eneroOrigen)>0) {
					color__origen__destino__enero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.febreroOrigen)>0) {
					color__origen__destino__febrero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.marzoOrigen)>0) {
					color__origen__destino__marzo='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.abrilOrigen)>0) {
					color__origen__destino__abril='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.mayoOrigen)>0) {
					color__origen__destino__mayo='style="background:blue!important; color:white!important;"';
				}				

				if (parseFloat(x.junioOrigen)>0) {
					color__origen__destino__junio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.julioOrigen)>0) {
					color__origen__destino__julio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.agostoOrigen)>0) {
					color__origen__destino__agosto='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.septiembreOrigen)>0) {
					color__origen__destino__septiembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.octubreOrigen)>0) {
					color__origen__destino__octubre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.noviembreOrigen)>0) {
					color__origen__destino__noviembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.diciembreOrigen)>0) {
					color__origen__destino__diciembre='style="background:blue!important; color:white!important;"';
				}


				if (parseFloat(x.eneroDestino)>0) {
					color__destino__origen__enero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.febreroDestino)>0) {
					color__destino__origen__febrero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.marzoDestino)>0) {
					color__destino__origen__marzo='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.abrilDestino)>0) {
					color__destino__origen__abril='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.mayoDestino)>0) {
					color__destino__origen__mayo='background:cyan!important; color:black!important;';
				}				

				if (parseFloat(x.junioDestino)>0) {
					color__destino__origen__junio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.julioDestino)>0) {
					color__destino__origen__julio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.agostoDestino)>0) {
					color__destino__origen__agosto='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.septiembreDestino)>0) {
					color__destino__origen__septiembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.octubreDestino)>0) {
					color__destino__origen__octubre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.noviembreDestino)>0) {
					color__destino__origen__noviembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.diciembreDestino)>0) {
					color__destino__origen__diciembre='background:cyan!important; color:black!important;';
				}



				$(".contenedor__lineas__modificaciones2").append('<tr><th colspan="32" align="center" style="border-left:1px solid black; border-right:1px solid black;">'+tipoTramite+'</th></tr><tr class="fila__modificaciones__califica__analistas"><th colspan="30" align="center" style="border-left:1px solid black; border-right:1px solid black;"><div class="row"><div class="col col-8" style="text-align:left!important;">'+x.modificacionEstado+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Observación:&nbsp;&nbsp;'+x.observaciones+'</div></div></th></tr><tr><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-bottom:1px solid black!important;border-left:1px solid black!important;">'+contador+'</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombres</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+x.eventosOrigen+'</td><td align="center" '+color__origen__destino__enero+'>'+x.enero+'</td><td align="center" '+color__origen__destino__enero+'>'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__febrero+'>'+x.febrero+'</td><td align="center" '+color__origen__destino__febrero+'>'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__marzo+'>'+x.marzo+'</td><td align="center" '+color__origen__destino__marzo+'>'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__abril+'>'+x.abril+'</td><td align="center" '+color__origen__destino__abril+'>'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__mayo+'>'+x.mayo+'</td><td align="center" '+color__origen__destino__mayo+'>'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__junio+'>'+x.junio+'</td><td align="center" '+color__origen__destino__junio+'>'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__julio+'>'+x.julio+'</td><td align="center" '+color__origen__destino__julio+'>'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__agosto+'>'+x.agosto+'</td><td align="center" '+color__origen__destino__agosto+'>'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__septiembre+'>'+x.septiembre+'</td><td align="center" '+color__origen__destino__septiembre+'>'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__octubre+'>'+x.octubre+'</td><td align="center" '+color__origen__destino__octubre+'>'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__noviembre+'>'+x.noviembre+'</td><td align="center" '+color__origen__destino__noviembre+'>'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__diciembre+'>'+x.diciembre+'</td><td align="center" '+color__origen__destino__diciembre+'>'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__3+'</td><td align="center">'+origenTotalVigente__3+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Nombres</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eventosDestino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__3+'</td><td align="center">'+destinoTotalVigente__3+'</td></tr>');

				$(".contenedor__lineas__modificaciones2__editar").append('<tr><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombres</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+x.eventosOrigen+'</td><td align="center">'+x.enero+'</td><td align="center">'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center">'+x.febrero+'</td><td align="center">'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center">'+x.marzo+'</td><td align="center">'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center">'+x.abril+'</td><td align="center">'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center">'+x.mayo+'</td><td align="center">'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center">'+x.junio+'</td><td align="center">'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center">'+x.julio+'</td><td align="center">'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center">'+x.agosto+'</td><td align="center">'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center">'+x.septiembre+'</td><td align="center">'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center">'+x.octubre+'</td><td align="center">'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center">'+x.noviembre+'</td><td align="center">'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center">'+x.diciembre+'</td><td align="center">'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__3+'</td><td align="center">'+origenTotalVigente__3+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Nombres</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eventosDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__3+'</td><td align="center">'+destinoTotalVigente__3+'</td></tr>');


				$("#aprobar__linea"+x.idOrigenDestino).val(x.modificacionEstado);

			}		

			}else{
				$("#tabla__2").remove();
			}

			if (informacionObtenida__honorarios__items!="" && informacionObtenida__honorarios__items!=" " && informacionObtenida__honorarios__items!=undefined && informacionObtenida__honorarios__items!=null && informacionObtenida__honorarios__items!="N/A") {

			let origenTotalInicial__2=0;
			let origenTotalVigente__2=0;
			let destinoTotalInicial__2=0;
			let destinoTotalVigente__2=0;

			for(x of informacionObtenida__honorarios__items){

				contador++;

				let color__origen__destino__enero;
				let color__origen__destino__febrero;
				let color__origen__destino__marzo;
				let color__origen__destino__abril;
				let color__origen__destino__mayo;
				let color__origen__destino__junio;
				let color__origen__destino__julio;
				let color__origen__destino__agosto;
				let color__origen__destino__septiembre;
				let color__origen__destino__octubre;
				let color__origen__destino__noviembre;
				let color__origen__destino__diciembre;


				let color__destino__origen__enero;
				let color__destino__origen__febrero;
				let color__destino__origen__marzo;
				let color__destino__origen__abril;
				let color__destino__origen__mayo;
				let color__destino__origen__junio;
				let color__destino__origen__julio;
				let color__destino__origen__agosto;
				let color__destino__origen__septiembre;
				let color__destino__origen__octubre;
				let color__destino__origen__noviembre;
				let color__destino__origen__diciembre;



				if (x.eventosOrigen=="null" || x.eventosOrigen==null) {
					eventoOrigen='N/A';
				}else{
					eventoOrigen=x.eventosOrigen;
				}

				if (x.eventosDestino=="null" || x.eventosDestino==null) {
					eventosDestino='N/A';
				}else{
					eventosDestino=x.eventosDestino;
				}

				if (x.tipoTramite==1) {
					tipoTramite="Caso 1 (Actividades e items iguales en orígen y destino)";
				}else if(x.tipoTramite==2){
					tipoTramite="Caso 2 (Actividades iguales en orígen y destino)";
				}else if(x.tipoTramite==3){
					tipoTramite="Caso 3 (Actividades diferentes en orígen y destino)";
				}

				if (parseFloat(x.eneroOrigen)>0) {
					color__origen__destino__enero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.febreroOrigen)>0) {
					color__origen__destino__febrero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.marzoOrigen)>0) {
					color__origen__destino__marzo='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.abrilOrigen)>0) {
					color__origen__destino__abril='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.mayoOrigen)>0) {
					color__origen__destino__mayo='style="background:blue!important; color:white!important;"';
				}				

				if (parseFloat(x.junioOrigen)>0) {
					color__origen__destino__junio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.julioOrigen)>0) {
					color__origen__destino__julio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.agostoOrigen)>0) {
					color__origen__destino__agosto='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.septiembreOrigen)>0) {
					color__origen__destino__septiembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.octubreOrigen)>0) {
					color__origen__destino__octubre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.noviembreOrigen)>0) {
					color__origen__destino__noviembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.diciembreOrigen)>0) {
					color__origen__destino__diciembre='style="background:blue!important; color:white!important;"';
				}


				if (parseFloat(x.eneroDestino)>0) {
					color__destino__origen__enero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.febreroDestino)>0) {
					color__destino__origen__febrero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.marzoDestino)>0) {
					color__destino__origen__marzo='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.abrilDestino)>0) {
					color__destino__origen__abril='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.mayoDestino)>0) {
					color__destino__origen__mayo='background:cyan!important; color:black!important;';
				}				

				if (parseFloat(x.junioDestino)>0) {
					color__destino__origen__junio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.julioDestino)>0) {
					color__destino__origen__julio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.agostoDestino)>0) {
					color__destino__origen__agosto='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.septiembreDestino)>0) {
					color__destino__origen__septiembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.octubreDestino)>0) {
					color__destino__origen__octubre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.noviembreDestino)>0) {
					color__destino__origen__noviembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.diciembreDestino)>0) {
					color__destino__origen__diciembre='background:cyan!important; color:black!important;';
				}


				origenTotalInicial__2=parseFloat(x.enero) + parseFloat(x.febrero) + parseFloat(x.marzo) + parseFloat(x.abril) + parseFloat(x.mayo) + parseFloat(x.junio) + parseFloat(x.julio) + parseFloat(x.agosto) + parseFloat(x.septiembre) + parseFloat(x.octubre) + parseFloat(x.noviembre) + parseFloat(x.diciembre);

				origenTotalVigente__2=(parseFloat(x.enero)-parseFloat(x.eneroOrigen)) + (parseFloat(x.febrero)-parseFloat(x.febreroOrigen)) + (parseFloat(x.marzo)-parseFloat(x.marzoOrigen)) + (parseFloat(x.abril)-parseFloat(x.abrilOrigen)) + (parseFloat(x.mayo)-parseFloat(x.mayoOrigen)) + (parseFloat(x.junio)-parseFloat(x.junioOrigen)) + (parseFloat(x.julio)-parseFloat(x.julioOrigen)) + (parseFloat(x.agosto)-parseFloat(x.agostoOrigen)) + (parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)) + (parseFloat(x.octubre)-parseFloat(x.octubreOrigen)) + (parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)) + (parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen));



				destinoTotalInicial__2=parseFloat(x.eneroDestino__destino) + parseFloat(x.febreroDestino__destino) + parseFloat(x.marzoDestino__destino) + parseFloat(x.abrilDestino__destino) + parseFloat(x.mayoDestino__destino) + parseFloat(x.junioDestino__destino) + parseFloat(x.julioDestino__destino) + parseFloat(x.agostoDestino__destino) + parseFloat(x.septiembreDestino__destino) + parseFloat(x.octubreDestino__destino) + parseFloat(x.noviembreDestino__destino) + parseFloat(x.diciembreDestino__destino);

				destinoTotalVigente__2=(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)) + (parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)) + (parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)) +(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)) + (parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)) + (parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)) +(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)) + (parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)) + (parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)) + (parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)) + (parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)) + (parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino));			



				$(".contenedor__lineas__modificaciones3").append('<tr><th colspan="32" align="center" style="border-left:1px solid black; border-right:1px solid black;">'+tipoTramite+'</th></tr><tr class="fila__modificaciones__califica__analistas"><th colspan="30" align="center" style="border-left:1px solid black; border-right:1px solid black;"><div class="row"><div class="col col-8" style="text-align:left!important;">'+x.modificacionEstado+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Observación:&nbsp;&nbsp;'+x.observaciones+'</div></div></th></tr><tr><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-bottom:1px solid black!important;border-left:1px solid black!important;">'+contador+'</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Cédula</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombre</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+eventoOrigen+'</td><td align="center">'+x.idFinancierioOrigen+'</td><td align="center" '+color__origen__destino__enero+'>'+x.enero+'</td><td align="center" '+color__origen__destino__enero+'>'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__febrero+'>'+x.febrero+'</td><td align="center" '+color__origen__destino__febrero+'>'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__marzo+'>'+x.marzo+'</td><td align="center" '+color__origen__destino__marzo+'>'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__abril+'>'+x.abril+'</td><td align="center" '+color__origen__destino__abril+'>'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__mayo+'>'+x.mayo+'</td><td align="center" '+color__origen__destino__mayo+'>'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__junio+'>'+x.junio+'</td><td align="center" '+color__origen__destino__junio+'>'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__julio+'>'+x.julio+'</td><td align="center" '+color__origen__destino__julio+'>'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__agosto+'>'+x.agosto+'</td><td align="center" '+color__origen__destino__agosto+'>'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__septiembre+'>'+x.septiembre+'</td><td align="center" '+color__origen__destino__septiembre+'>'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__octubre+'>'+x.octubre+'</td><td align="center" '+color__origen__destino__octubre+'>'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__noviembre+'>'+x.noviembre+'</td><td align="center" '+color__origen__destino__noviembre+'>'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__diciembre+'>'+x.diciembre+'</td><td align="center" '+color__origen__destino__diciembre+'>'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__2+'</td><td align="center">'+origenTotalVigente__2+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Evento</td><td rowspan="1" align="center" style="font-weight:bold;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+eventosDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.idFinancierioDestino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__2+'</td><td align="center">'+destinoTotalVigente__2+'</td></tr>');

				$(".contenedor__lineas__modificaciones3__editar").append('<tr><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Cédula</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombre</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+eventoOrigen+'</td><td align="center">'+x.idFinancierioOrigen+'</td><td align="center">'+x.enero+'</td><td align="center">'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center">'+x.febrero+'</td><td align="center">'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center">'+x.marzo+'</td><td align="center">'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center">'+x.abril+'</td><td align="center">'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center">'+x.mayo+'</td><td align="center">'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center">'+x.junio+'</td><td align="center">'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center">'+x.julio+'</td><td align="center">'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center">'+x.agosto+'</td><td align="center">'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center">'+x.septiembre+'</td><td align="center">'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center">'+x.octubre+'</td><td align="center">'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center">'+x.noviembre+'</td><td align="center">'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center">'+x.diciembre+'</td><td align="center">'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__2+'</td><td align="center">'+origenTotalVigente__2+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Evento</td><td rowspan="1" align="center" style="font-weight:bold;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+eventosDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.idFinancierioDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__2+'</td><td align="center">'+destinoTotalVigente__2+'</td></tr>');


				$("#aprobar__linea"+x.idOrigenDestino).val(x.modificacionEstado);

			}				

			}else{
				$("#tabla__3").remove();
			}

			if (informacionObtenida__honorarios!="" && informacionObtenida__honorarios!=" " && informacionObtenida__honorarios!=undefined && informacionObtenida__honorarios!=null && informacionObtenida__honorarios!="N/A") {


			let origenTotalInicial__1=0;
			let origenTotalVigente__1=0;
			let destinoTotalInicial__1=0;
			let destinoTotalVigente__1=0;

			for(x of informacionObtenida__honorarios){


				let color__origen__destino__enero;
				let color__origen__destino__febrero;
				let color__origen__destino__marzo;
				let color__origen__destino__abril;
				let color__origen__destino__mayo;
				let color__origen__destino__junio;
				let color__origen__destino__julio;
				let color__origen__destino__agosto;
				let color__origen__destino__septiembre;
				let color__origen__destino__octubre;
				let color__origen__destino__noviembre;
				let color__origen__destino__diciembre;


				let color__destino__origen__enero;
				let color__destino__origen__febrero;
				let color__destino__origen__marzo;
				let color__destino__origen__abril;
				let color__destino__origen__mayo;
				let color__destino__origen__junio;
				let color__destino__origen__julio;
				let color__destino__origen__agosto;
				let color__destino__origen__septiembre;
				let color__destino__origen__octubre;
				let color__destino__origen__noviembre;
				let color__destino__origen__diciembre;

				contador++;

				if (x.tipoTramite==1) {
					tipoTramite="Caso 1 (Actividades e items iguales en orígen y destino)";
				}else if(x.tipoTramite==2){
					tipoTramite="Caso 2 (Actividades iguales en orígen y destino)";
				}else if(x.tipoTramite==3){
					tipoTramite="Caso 3 (Actividades diferentes en orígen y destino)";
				}


				origenTotalInicial__1=parseFloat(x.enero) + parseFloat(x.febrero) + parseFloat(x.marzo) + parseFloat(x.abril) + parseFloat(x.mayo) + parseFloat(x.junio) + parseFloat(x.julio) + parseFloat(x.agosto) + parseFloat(x.septiembre) + parseFloat(x.octubre) + parseFloat(x.noviembre) + parseFloat(x.diciembre);

				origenTotalVigente__1=(parseFloat(x.enero)-parseFloat(x.eneroOrigen)) + (parseFloat(x.febrero)-parseFloat(x.febreroOrigen)) + (parseFloat(x.marzo)-parseFloat(x.marzoOrigen)) + (parseFloat(x.abril)-parseFloat(x.abrilOrigen)) + (parseFloat(x.mayo)-parseFloat(x.mayoOrigen)) + (parseFloat(x.junio)-parseFloat(x.junioOrigen)) + (parseFloat(x.julio)-parseFloat(x.julioOrigen)) + (parseFloat(x.agosto)-parseFloat(x.agostoOrigen)) + (parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)) + (parseFloat(x.octubre)-parseFloat(x.octubreOrigen)) + (parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)) + (parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen));



				destinoTotalInicial__1=parseFloat(x.eneroDestino__destino) + parseFloat(x.febreroDestino__destino) + parseFloat(x.marzoDestino__destino) + parseFloat(x.abrilDestino__destino) + parseFloat(x.mayoDestino__destino) + parseFloat(x.junioDestino__destino) + parseFloat(x.julioDestino__destino) + parseFloat(x.agostoDestino__destino) + parseFloat(x.septiembreDestino__destino) + parseFloat(x.octubreDestino__destino) + parseFloat(x.noviembreDestino__destino) + parseFloat(x.diciembreDestino__destino);

				destinoTotalVigente__1=(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)) + (parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)) + (parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)) +(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)) + (parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)) + (parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)) +(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)) + (parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)) + (parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)) + (parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)) + (parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)) + (parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino));

				if (parseFloat(x.eneroOrigen)>0) {
					color__origen__destino__enero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.febreroOrigen)>0) {
					color__origen__destino__febrero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.marzoOrigen)>0) {
					color__origen__destino__marzo='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.abrilOrigen)>0) {
					color__origen__destino__abril='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.mayoOrigen)>0) {
					color__origen__destino__mayo='style="background:blue!important; color:white!important;"';
				}				

				if (parseFloat(x.junioOrigen)>0) {
					color__origen__destino__junio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.julioOrigen)>0) {
					color__origen__destino__julio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.agostoOrigen)>0) {
					color__origen__destino__agosto='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.septiembreOrigen)>0) {
					color__origen__destino__septiembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.octubreOrigen)>0) {
					color__origen__destino__octubre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.noviembreOrigen)>0) {
					color__origen__destino__noviembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.diciembreOrigen)>0) {
					color__origen__destino__diciembre='style="background:blue!important; color:white!important;"';
				}


				if (parseFloat(x.eneroDestino)>0) {
					color__destino__origen__enero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.febreroDestino)>0) {
					color__destino__origen__febrero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.marzoDestino)>0) {
					color__destino__origen__marzo='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.abrilDestino)>0) {
					color__destino__origen__abril='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.mayoDestino)>0) {
					color__destino__origen__mayo='background:cyan!important; color:black!important;';
				}				

				if (parseFloat(x.junioDestino)>0) {
					color__destino__origen__junio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.julioDestino)>0) {
					color__destino__origen__julio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.agostoDestino)>0) {
					color__destino__origen__agosto='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.septiembreDestino)>0) {
					color__destino__origen__septiembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.octubreDestino)>0) {
					color__destino__origen__octubre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.noviembreDestino)>0) {
					color__destino__origen__noviembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.diciembreDestino)>0) {
					color__destino__origen__diciembre='background:cyan!important; color:black!important;';
				}



				$(".contenedor__lineas__modificaciones4").append('<tr><th colspan="32" align="center" style="border-left:1px solid black; border-right:1px solid black;">'+tipoTramite+'</th></tr><tr class="fila__modificaciones__califica__analistas"><th colspan="30" align="center" style="border-left:1px solid black; border-right:1px solid black;"><div class="row"><div class="col col-8" style="text-align:left!important;">'+x.modificacionEstado+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Observación:&nbsp;&nbsp;'+x.observaciones+'</div></div></th></tr><tr><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-bottom:1px solid black!important;border-left:1px solid black!important;">'+contador+'</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombres</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+x.eventosOrigen+'</td><td align="center" '+color__origen__destino__enero+'>'+x.enero+'</td><td align="center" '+color__origen__destino__enero+'>'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__febrero+'>'+x.febrero+'</td><td align="center" '+color__origen__destino__febrero+'>'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__marzo+'>'+x.marzo+'</td><td align="center" '+color__origen__destino__marzo+'>'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__abril+'>'+x.abril+'</td><td align="center" '+color__origen__destino__abril+'>'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__mayo+'>'+x.mayo+'</td><td align="center" '+color__origen__destino__mayo+'>'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__junio+'>'+x.junio+'</td><td align="center" '+color__origen__destino__junio+'>'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__julio+'>'+x.julio+'</td><td align="center" '+color__origen__destino__julio+'>'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__agosto+'>'+x.agosto+'</td><td align="center" '+color__origen__destino__agosto+'>'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__septiembre+'>'+x.septiembre+'</td><td align="center" '+color__origen__destino__septiembre+'>'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__octubre+'>'+x.octubre+'</td><td align="center" '+color__origen__destino__octubre+'>'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__noviembre+'>'+x.noviembre+'</td><td align="center" '+color__origen__destino__noviembre+'>'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__diciembre+'>'+x.diciembre+'</td><td align="center" '+color__origen__destino__diciembre+'>'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__1+'</td><td align="center">'+origenTotalVigente__1+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Nombres</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eventosDestino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__1+'</td><td align="center">'+destinoTotalVigente__1+'</td></tr>');

				$(".contenedor__lineas__modificaciones4__editar").append('<tr><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombres</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+x.eventosOrigen+'</td><td align="center">'+x.enero+'</td><td align="center">'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center">'+x.febrero+'</td><td align="center">'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center">'+x.marzo+'</td><td align="center">'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center">'+x.abril+'</td><td align="center">'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center">'+x.mayo+'</td><td align="center">'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center">'+x.junio+'</td><td align="center">'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center">'+x.julio+'</td><td align="center">'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center">'+x.agosto+'</td><td align="center">'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center">'+x.septiembre+'</td><td align="center">'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center">'+x.octubre+'</td><td align="center">'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center">'+x.noviembre+'</td><td align="center">'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center">'+x.diciembre+'</td><td align="center">'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__1+'</td><td align="center">'+origenTotalVigente__1+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Nombres</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eventosDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__1+'</td><td align="center">'+destinoTotalVigente__1+'</td></tr>');


				$("#aprobar__linea"+x.idOrigenDestino).val(x.modificacionEstado);

			}			

			}else{
				$("#tabla__4").remove();
			}	


			let origenTotalInicial__0=0;
			let origenTotalVigente__0=0;
			let destinoTotalInicial__0=0;
			let destinoTotalVigente__0=0;

			for(x of informacionObtenida){

				contador++;

				let color__origen__destino__enero;
				let color__origen__destino__febrero;
				let color__origen__destino__marzo;
				let color__origen__destino__abril;
				let color__origen__destino__mayo;
				let color__origen__destino__junio;
				let color__origen__destino__julio;
				let color__origen__destino__agosto;
				let color__origen__destino__septiembre;
				let color__origen__destino__octubre;
				let color__origen__destino__noviembre;
				let color__origen__destino__diciembre;


				let color__destino__origen__enero;
				let color__destino__origen__febrero;
				let color__destino__origen__marzo;
				let color__destino__origen__abril;
				let color__destino__origen__mayo;
				let color__destino__origen__junio;
				let color__destino__origen__julio;
				let color__destino__origen__agosto;
				let color__destino__origen__septiembre;
				let color__destino__origen__octubre;
				let color__destino__origen__noviembre;
				let color__destino__origen__diciembre;

				if (x.eventosOrigen=="null" || x.eventosOrigen==null) {
					eventoOrigen='N/A';
				}else{
					eventoOrigen=x.eventosOrigen;
				}

				if (x.eventosDestino=="null" || x.eventosDestino==null) {
					eventosDestino='N/A';
				}else{
					eventosDestino=x.eventosDestino;
				}

				if (x.tipoTramite==1) {
					tipoTramite="Caso 1 (Actividades e items iguales en orígen y destino)";
				}else if(x.tipoTramite==2){
					tipoTramite="Caso 2 (Actividades iguales en orígen y destino)";
				}else if(x.tipoTramite==3){
					tipoTramite="Caso 3 (Actividades diferentes en orígen y destino)";
				}



				origenTotalInicial__0=parseFloat(x.enero) + parseFloat(x.febrero) + parseFloat(x.marzo) + parseFloat(x.abril) + parseFloat(x.mayo) + parseFloat(x.junio) + parseFloat(x.julio) + parseFloat(x.agosto) + parseFloat(x.septiembre) + parseFloat(x.octubre) + parseFloat(x.noviembre) + parseFloat(x.diciembre);

				origenTotalVigente__0=(parseFloat(x.enero)-parseFloat(x.eneroOrigen)) + (parseFloat(x.febrero)-parseFloat(x.febreroOrigen)) + (parseFloat(x.marzo)-parseFloat(x.marzoOrigen)) + (parseFloat(x.abril)-parseFloat(x.abrilOrigen)) + (parseFloat(x.mayo)-parseFloat(x.mayoOrigen)) + (parseFloat(x.junio)-parseFloat(x.junioOrigen)) + (parseFloat(x.julio)-parseFloat(x.julioOrigen)) + (parseFloat(x.agosto)-parseFloat(x.agostoOrigen)) + (parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)) + (parseFloat(x.octubre)-parseFloat(x.octubreOrigen)) + (parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)) + (parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen));



				destinoTotalInicial__0=parseFloat(x.eneroDestino__destino) + parseFloat(x.febreroDestino__destino) + parseFloat(x.marzoDestino__destino) + parseFloat(x.abrilDestino__destino) + parseFloat(x.mayoDestino__destino) + parseFloat(x.junioDestino__destino) + parseFloat(x.julioDestino__destino) + parseFloat(x.agostoDestino__destino) + parseFloat(x.septiembreDestino__destino) + parseFloat(x.octubreDestino__destino) + parseFloat(x.noviembreDestino__destino) + parseFloat(x.diciembreDestino__destino);

				destinoTotalVigente__0=(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)) + (parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)) + (parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)) +(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)) + (parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)) + (parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)) +(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)) + (parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)) + (parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)) + (parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)) + (parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)) + (parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino));

				if (parseFloat(x.eneroOrigen)>0) {
					color__origen__destino__enero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.febreroOrigen)>0) {
					color__origen__destino__febrero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.marzoOrigen)>0) {
					color__origen__destino__marzo='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.abrilOrigen)>0) {
					color__origen__destino__abril='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.mayoOrigen)>0) {
					color__origen__destino__mayo='style="background:blue!important; color:white!important;"';
				}				

				if (parseFloat(x.junioOrigen)>0) {
					color__origen__destino__junio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.julioOrigen)>0) {
					color__origen__destino__julio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.agostoOrigen)>0) {
					color__origen__destino__agosto='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.septiembreOrigen)>0) {
					color__origen__destino__septiembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.octubreOrigen)>0) {
					color__origen__destino__octubre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.noviembreOrigen)>0) {
					color__origen__destino__noviembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.diciembreOrigen)>0) {
					color__origen__destino__diciembre='style="background:blue!important; color:white!important;"';
				}


				if (parseFloat(x.eneroDestino)>0) {
					color__destino__origen__enero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.febreroDestino)>0) {
					color__destino__origen__febrero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.marzoDestino)>0) {
					color__destino__origen__marzo='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.abrilDestino)>0) {
					color__destino__origen__abril='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.mayoDestino)>0) {
					color__destino__origen__mayo='background:cyan!important; color:black!important;';
				}				

				if (parseFloat(x.junioDestino)>0) {
					color__destino__origen__junio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.julioDestino)>0) {
					color__destino__origen__julio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.agostoDestino)>0) {
					color__destino__origen__agosto='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.septiembreDestino)>0) {
					color__destino__origen__septiembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.octubreDestino)>0) {
					color__destino__origen__octubre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.noviembreDestino)>0) {
					color__destino__origen__noviembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.diciembreDestino)>0) {
					color__destino__origen__diciembre='background:cyan!important; color:black!important;';
				}


				$(".contenedor__lineas__modificaciones5").append('<tr><th colspan="32" align="center" style="border-left:1px solid black; border-right:1px solid black;">'+tipoTramite+'</th></tr><tr class="fila__modificaciones__califica__analistas"><th colspan="30" align="center" style="border-left:1px solid black; border-right:1px solid black;"><div class="row"><div class="col col-8" style="text-align:left!important;">'+x.modificacionEstado+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Observación:&nbsp;&nbsp;'+x.observaciones+'</div></div></th></tr><tr><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-bottom:1px solid black!important;border-left:1px solid black!important;">'+contador+'</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Evento</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+eventoOrigen+'</td><td align="center">'+x.idFinancierioOrigen+'</td><td align="center" '+color__origen__destino__enero+'>'+x.enero+'</td><td align="center" '+color__origen__destino__enero+'>'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__febrero+'>'+x.febrero+'</td><td align="center" '+color__origen__destino__febrero+'>'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__marzo+'>'+x.marzo+'</td><td align="center" '+color__origen__destino__marzo+'>'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__abril+'>'+x.abril+'</td><td align="center" '+color__origen__destino__abril+'>'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__mayo+'>'+x.mayo+'</td><td align="center" '+color__origen__destino__mayo+'>'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__junio+'>'+x.junio+'</td><td align="center" '+color__origen__destino__junio+'>'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__julio+'>'+x.julio+'</td><td align="center" '+color__origen__destino__julio+'>'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__agosto+'>'+x.agosto+'</td><td align="center" '+color__origen__destino__agosto+'>'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__septiembre+'>'+x.septiembre+'</td><td align="center" '+color__origen__destino__septiembre+'>'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__octubre+'>'+x.octubre+'</td><td align="center" '+color__origen__destino__octubre+'>'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__noviembre+'>'+x.noviembre+'</td><td align="center" '+color__origen__destino__noviembre+'>'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__diciembre+'>'+x.diciembre+'</td><td align="center" '+color__origen__destino__diciembre+'>'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__0+'</td><td align="center">'+origenTotalVigente__0+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Evento</td><td rowspan="1" align="center" style="font-weight:bold;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+eventosDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.idFinancierioDestino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__0+'</td><td align="center">'+destinoTotalVigente__0+'</td></tr>');

				$(".contenedor__lineas__modificaciones5__editar").append('<tr><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Evento</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+eventoOrigen+'</td><td align="center">'+x.idFinancierioOrigen+'</td><td align="center">'+x.enero+'</td><td align="center">'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center">'+x.febrero+'</td><td align="center">'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center">'+x.marzo+'</td><td align="center">'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center">'+x.abril+'</td><td align="center">'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center">'+x.mayo+'</td><td align="center">'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center">'+x.junio+'</td><td align="center">'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center">'+x.julio+'</td><td align="center">'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center">'+x.agosto+'</td><td align="center">'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center">'+x.septiembre+'</td><td align="center">'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center">'+x.octubre+'</td><td align="center">'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center">'+x.noviembre+'</td><td align="center">'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center">'+x.diciembre+'</td><td align="center">'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__0+'</td><td align="center">'+origenTotalVigente__0+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Evento</td><td rowspan="1" align="center" style="font-weight:bold;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+eventosDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.idFinancierioDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__0+'</td><td align="center">'+destinoTotalVigente__0+'</td></tr>');


				$("#aprobar__linea"+x.idOrigenDestino).val(x.modificacionEstado);

			}

			execelGenerados($(".excelProyectosMatricez__0"),"tabla__0__modificaciones__editar","Modificación");
			execelGenerados($(".excelProyectosMatricez__1"),"tabla__1__modificaciones__editar","Modificación");
			execelGenerados($(".excelProyectosMatricez__2"),"tabla__2__modificaciones__editar","Modificación");
			execelGenerados($(".excelProyectosMatricez__3"),"tabla__3__modificaciones__editar","Modificación");
			execelGenerados($(".excelProyectosMatricez__4"),"tabla__4__modificaciones__editar","Modificación");
			execelGenerados($(".excelProyectosMatricez__5"),"tabla__5__modificaciones__editar","Modificación");

			if ($("#idRolAd").val()==4 && $("#fisicamenteE").val()==1) {

				let idUsuarioInfraRObtenido=elementos['idUsuarioInfraRObtenido'];
				let idInstalacionesRObtenido=elementos['idInstalacionesRObtenido'];

				selector__planificacion__recomendar__instalaciones($(".selector__modificacion__lineas"));

				if (idUsuarioInfraRObtenido=="2" || idUsuarioInfraRObtenido==2) {
					$(".bloque__1__inicial").hide();
					$(".texto__no__corespponde__infra").text("NO CORRESPONDE INFRAESTRUCTURA");
					$("#noCorresponde__infra__var").val(1);
				}


				if (idInstalacionesRObtenido=="2" || idInstalacionesRObtenido==2) {
					$(".oculto__solo__instalaciones__modificaciones").hide();
					$(".texto__no__corespponde__instalaciones").text("NO CORRESPONDE INSTALACIONES DEPORTIVAS");
					$("#noCorresponde__instalaciones__var").val(1);
				}


			}else if ($("#idRolAd").val()==4 && $("#fisicamenteE").val()==2) {

				selector__planificacion__recomendar($(".selector__modificacion__lineas"));

			}else if ($("#idRolAd").val()==7 && $("#fisicamenteE").val()==24) {

				selector__planificacion__recomendar($(".selector__modificacion__lineas"));

			}else if ($("#idRolAd").val()==7 && $("#fisicamenteE").val()==26) {

				selector__planificacion__recomendar($(".selector__modificacion__lineas"));

			}else if(($("#idRolAd").val()==2)){

				selector__general__modificar__recomendar($(".selector__modificacion__lineas"));

			}

			 if ($("#idRolAd").val()==4 || $("#idRolAd").val()==7) {

			 	$("#enviarModificacionesCRecomienda").text("VALIDAR");

			 }


		});

		},
		error:function(){

		}
				
	});		

});

}

var funcion__asignar=function(tbody,table){

$(tbody).on("click","button.reasignar__modificaciones",function(e){

	let data=table.row($(this).parents("tr")).data();

	$(".textos__titulos").text(data[1]);

	$("#idTramite").val(data[4]);
	$("#idOrganismo").val(data[5]);
	$(".idOrganismo__lineas").val(data[5]);

	let paqueteDeDatos = new FormData();

	paqueteDeDatos.append('tipo','lineas__modificaciones');
	paqueteDeDatos.append('idLinea',data[4]);


	$.ajax({

		type:"POST",
		url:"modelosBd/inserta/seleccionaAcciones.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

		$.getScript("layout/scripts/js/modificacionRevisor/selector.js",function(){
        
			let elementos=JSON.parse(response);
			let informacionObtenida=elementos['informacionObtenida'];
			let informacionObtenida__honorarios=elementos['informacionObtenida__honorarios'];
			let informacionObtenida__honorarios__items=elementos['informacionObtenida__honorarios__items'];
			let informacionObtenida__sueldos__salarios=elementos['informacionObtenida__sueldos__salarios'];
			let informacionObtenida__sueldos__items=elementos['informacionObtenida__sueldos__items'];
			let informacionObtenida__desvinculaciones=elementos['informacionObtenida__desvinculaciones'];

			let contador=0;

			let eventoOrigen="";
			let eventosDestino="";
			let tipoTramite="";		

			$(".contenedor__lineas__modificaciones0").html(" ");
			$(".contenedor__lineas__modificaciones1").html(" ");
			$(".contenedor__lineas__modificaciones2").html(" ");
			$(".contenedor__lineas__modificaciones3").html(" ");
			$(".contenedor__lineas__modificaciones4").html(" ");
			$(".contenedor__lineas__modificaciones5").html(" ");	

			if (informacionObtenida__desvinculaciones!="" && informacionObtenida__desvinculaciones!=" " && informacionObtenida__desvinculaciones!=undefined && informacionObtenida__desvinculaciones!=null && informacionObtenida__desvinculaciones!="N/A") {

				let origenTotalInicial__5=0;
				let origenTotalVigente__5=0;
				let destinoTotalInicial__5=0;

				for(x of informacionObtenida__desvinculaciones){

					contador++;

					let color__origen__destino__enero;
					let color__origen__destino__febrero;
					let color__origen__destino__marzo;
					let color__origen__destino__abril;
					let color__origen__destino__mayo;
					let color__origen__destino__junio;
					let color__origen__destino__julio;
					let color__origen__destino__agosto;
					let color__origen__destino__septiembre;
					let color__origen__destino__octubre;
					let color__origen__destino__noviembre;
					let color__origen__destino__diciembre;


					let color__destino__origen__enero;
					let color__destino__origen__febrero;
					let color__destino__origen__marzo;
					let color__destino__origen__abril;
					let color__destino__origen__mayo;
					let color__destino__origen__junio;
					let color__destino__origen__julio;
					let color__destino__origen__agosto;
					let color__destino__origen__septiembre;
					let color__destino__origen__octubre;
					let color__destino__origen__noviembre;
					let color__destino__origen__diciembre;


					if (x.eventosOrigen=="null" || x.eventosOrigen==null) {
						eventoOrigen='N/A';
					}else{
						eventoOrigen=x.eventosOrigen;
					}

					if (x.eventosDestino=="null" || x.eventosDestino==null) {
						eventosDestino='N/A';
					}else{
						eventosDestino=x.eventosDestino;
					}

					if (x.tipoTramite==1) {
						tipoTramite="TRÁMITE DE DESVINCULACIÓN";
					}else if(x.tipoTramite==2){
						tipoTramite="TRÁMITE DE DESVINCULACIÓN";
					}else if(x.tipoTramite==3){
						tipoTramite="TRÁMITE DE DESVINCULACIÓN";
					}


					

					origenTotalInicial__5=parseFloat(x.enero) + parseFloat(x.febrero) + parseFloat(x.marzo) + parseFloat(x.abril) + parseFloat(x.mayo) + parseFloat(x.junio) + parseFloat(x.julio) + parseFloat(x.agosto) + parseFloat(x.septiembre) + parseFloat(x.octubre) + parseFloat(x.noviembre) + parseFloat(x.diciembre);

					origenTotalVigente__5=(parseFloat(x.enero)-parseFloat(x.eneroOrigen)) + (parseFloat(x.febrero)-parseFloat(x.febreroOrigen)) + (parseFloat(x.marzo)-parseFloat(x.marzoOrigen)) + (parseFloat(x.abril)-parseFloat(x.abrilOrigen)) + (parseFloat(x.mayo)-parseFloat(x.mayoOrigen)) + (parseFloat(x.junio)-parseFloat(x.junioOrigen)) + (parseFloat(x.julio)-parseFloat(x.julioOrigen)) + (parseFloat(x.agosto)-parseFloat(x.agostoOrigen)) + (parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)) + (parseFloat(x.octubre)-parseFloat(x.octubreOrigen)) + (parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)) + (parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen));


					destinoTotalInicial__5=parseFloat(x.eneroDestino) + parseFloat(x.febreroDestino) + parseFloat(x.marzoDestino) + parseFloat(x.abrilDestino) + parseFloat(x.mayoDestino) + parseFloat(x.junioDestino) + parseFloat(x.julioDestino) + parseFloat(x.agostoDestino) + parseFloat(x.septiembreDestino) + parseFloat(x.octubreDestino) + parseFloat(x.noviembreDestino) + parseFloat(x.diciembreDestino);


					$(".contenedor__lineas__modificaciones0").append('<tr><th colspan="32" align="center" style="border-left:1px solid black; border-right:1px solid black;">Caso 1 (Actividades e items iguales en orígen y destino)</th></tr><tr class="fila__modificaciones__califica__analistas"><th colspan="30" align="center" style="border-left:1px solid black; border-right:1px solid black;"><div class="row"><div class="col col-2">VALIDAR</div><div class="col col-2" style="text-align:left!important; heigth:25px;"><select class="selectores__calificaciones__analistas" attr="'+x.idOrigenDestino+'" id="aprobar__linea'+x.idOrigenDestino+'" name="aprobar__linea__5[]" style="color:black; width:100%"><option value="VALIDADO">VALIDADO</option><option value="NO VALIDADO">NO VALIDADO</option></select></div><div class="col col-4" style="text-align:left!important;"><textarea style="width:100%; font-weight:bold; color:black;" class="observaciones__generales__realizadas" id="observaciones'+x.idOrigenDestino+'" name="observaciones__modificaciones__asignadas__5[]"></textarea></div></th></tr><<tr><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-bottom:1px solid black!important;border-left:1px solid black!important;">'+contador+'</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Cédula</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombre</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+eventoOrigen+'</td><td align="center">'+x.idFinancierioOrigen+'</td><td align="center" '+color__origen__destino__enero+'>'+x.enero+'</td><td align="center" '+color__origen__destino__enero+'>'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__febrero+'>'+x.febrero+'</td><td align="center" '+color__origen__destino__febrero+'>'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__marzo+'>'+x.marzo+'</td><td align="center" '+color__origen__destino__marzo+'>'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__abril+'>'+x.abril+'</td><td align="center" '+color__origen__destino__abril+'>'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__mayo+'>'+x.mayo+'</td><td align="center" '+color__origen__destino__mayo+'>'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__junio+'>'+x.junio+'</td><td align="center" '+color__origen__destino__junio+'>'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__julio+'>'+x.julio+'</td><td align="center" '+color__origen__destino__julio+'>'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__agosto+'>'+x.agosto+'</td><td align="center" '+color__origen__destino__agosto+'>'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__septiembre+'>'+x.septiembre+'</td><td align="center" '+color__origen__destino__septiembre+'>'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__octubre+'>'+x.octubre+'</td><td align="center" '+color__origen__destino__octubre+'>'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__noviembre+'>'+x.noviembre+'</td><td align="center" '+color__origen__destino__noviembre+'>'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__diciembre+'>'+x.diciembre+'</td><td align="center" '+color__origen__destino__diciembre+'>'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__5+'</td><td align="center">'+origenTotalVigente__5+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold;">Enero</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero</td> <td rowspan="1" align="center" style="font-weight:bold;">Marzo</td> <td rowspan="1" align="center" style="font-weight:bold;">Abril</td> <td rowspan="1" align="center" style="font-weight:bold;">Mayo</td> <td rowspan="1" align="center" style="font-weight:bold;">Junio</td> <td rowspan="1" align="center" style="font-weight:bold;">Julio</td> <td rowspan="1" align="center" style="font-weight:bold;">Agosto</td> <td rowspan="1" align="center" style="font-weight:bold;">Septiembre</td> <td rowspan="1" align="center" style="font-weight:bold;">Octubre</td> <td rowspan="1" align="center" style="font-weight:bold;">Noviembre</td> <td rowspan="1" align="center" style="font-weight:bold;">Diciembre</td><td style="font-weight:bold;">Total Inicial</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.nombreItem+'</td><td style="border-bottom:1px solid black!important;">'+x.eneroDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.febreroDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.marzoDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.abrilDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.mayoDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.junioDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.julioDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.agostoDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.septiembreDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.octubreDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.noviembreDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.diciembreDestino+'</td><td align="center">'+destinoTotalInicial__5+'</td></tr>');

					$(".contenedor__lineas__modificaciones0__editar").append('<tr><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Cédula</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombre</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+eventoOrigen+'</td><td align="center">'+x.idFinancierioOrigen+'</td><td align="center" '+color__origen__destino__enero+'>'+x.enero+'</td><td align="center" '+color__origen__destino__enero+'>'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__febrero+'>'+x.febrero+'</td><td align="center" '+color__origen__destino__febrero+'>'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__marzo+'>'+x.marzo+'</td><td align="center" '+color__origen__destino__marzo+'>'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__abril+'>'+x.abril+'</td><td align="center" '+color__origen__destino__abril+'>'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__mayo+'>'+x.mayo+'</td><td align="center" '+color__origen__destino__mayo+'>'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__junio+'>'+x.junio+'</td><td align="center" '+color__origen__destino__junio+'>'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__julio+'>'+x.julio+'</td><td align="center" '+color__origen__destino__julio+'>'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__agosto+'>'+x.agosto+'</td><td align="center" '+color__origen__destino__agosto+'>'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__septiembre+'>'+x.septiembre+'</td><td align="center" '+color__origen__destino__septiembre+'>'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__octubre+'>'+x.octubre+'</td><td align="center" '+color__origen__destino__octubre+'>'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__noviembre+'>'+x.noviembre+'</td><td align="center" '+color__origen__destino__noviembre+'>'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__diciembre+'>'+x.diciembre+'</td><td align="center" '+color__origen__destino__diciembre+'>'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__5+'</td><td align="center">'+origenTotalVigente__5+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold;">Enero</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero</td> <td rowspan="1" align="center" style="font-weight:bold;">Marzo</td> <td rowspan="1" align="center" style="font-weight:bold;">Abril</td> <td rowspan="1" align="center" style="font-weight:bold;">Mayo</td> <td rowspan="1" align="center" style="font-weight:bold;">Junio</td> <td rowspan="1" align="center" style="font-weight:bold;">Julio</td> <td rowspan="1" align="center" style="font-weight:bold;">Agosto</td> <td rowspan="1" align="center" style="font-weight:bold;">Septiembre</td> <td rowspan="1" align="center" style="font-weight:bold;">Octubre</td> <td rowspan="1" align="center" style="font-weight:bold;">Noviembre</td> <td rowspan="1" align="center" style="font-weight:bold;">Diciembre</td><td style="font-weight:bold;">Total Inicial</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.nombreItem+'</td><td style="border-bottom:1px solid black!important;">'+x.eneroDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.febreroDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.marzoDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.abrilDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.mayoDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.junioDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.julioDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.agostoDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.septiembreDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.octubreDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.noviembreDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.diciembreDestino+'</td><td align="center">'+destinoTotalInicial__5+'</td></tr>');


					$("#aprobar__linea"+x.idOrigenDestino).val(x.modificacionEstado);

				}				

			}else{
				$("#tabla__0").remove();
			}

			if (informacionObtenida__sueldos__items!="" && informacionObtenida__sueldos__items!=" " && informacionObtenida__sueldos__items!=undefined && informacionObtenida__sueldos__items!=null && informacionObtenida__sueldos__items!="N/A") {

			let origenTotalInicial__4=0;
			let origenTotalVigente__4=0;
			let destinoTotalInicial__4=0;
			let destinoTotalVigente__4=0;

			for(x of informacionObtenida__sueldos__items){

				contador++;


				let color__origen__destino__enero;
				let color__origen__destino__febrero;
				let color__origen__destino__marzo;
				let color__origen__destino__abril;
				let color__origen__destino__mayo;
				let color__origen__destino__junio;
				let color__origen__destino__julio;
				let color__origen__destino__agosto;
				let color__origen__destino__septiembre;
				let color__origen__destino__octubre;
				let color__origen__destino__noviembre;
				let color__origen__destino__diciembre;


				let color__destino__origen__enero;
				let color__destino__origen__febrero;
				let color__destino__origen__marzo;
				let color__destino__origen__abril;
				let color__destino__origen__mayo;
				let color__destino__origen__junio;
				let color__destino__origen__julio;
				let color__destino__origen__agosto;
				let color__destino__origen__septiembre;
				let color__destino__origen__octubre;
				let color__destino__origen__noviembre;
				let color__destino__origen__diciembre;


				if (x.eventosOrigen=="null" || x.eventosOrigen==null) {
					eventoOrigen='N/A';
				}else{
					eventoOrigen=x.eventosOrigen;
				}

				if (x.eventosDestino=="null" || x.eventosDestino==null) {
					eventosDestino='N/A';
				}else{
					eventosDestino=x.eventosDestino;
				}

				if (x.tipoTramite==1) {
					tipoTramite="Caso 1 (Actividades e items iguales en orígen y destino)";
				}else if(x.tipoTramite==2){
					tipoTramite="Caso 2 (Actividades iguales en orígen y destino)";
				}else if(x.tipoTramite==3){
					tipoTramite="Caso 3 (Actividades diferentes en orígen y destino)";
				}




				origenTotalInicial__4=parseFloat(x.enero) + parseFloat(x.febrero) + parseFloat(x.marzo) + parseFloat(x.abril) + parseFloat(x.mayo) + parseFloat(x.junio) + parseFloat(x.julio) + parseFloat(x.agosto) + parseFloat(x.septiembre) + parseFloat(x.octubre) + parseFloat(x.noviembre) + parseFloat(x.diciembre);

				origenTotalVigente__4=(parseFloat(x.enero)-parseFloat(x.eneroOrigen)) + (parseFloat(x.febrero)-parseFloat(x.febreroOrigen)) + (parseFloat(x.marzo)-parseFloat(x.marzoOrigen)) + (parseFloat(x.abril)-parseFloat(x.abrilOrigen)) + (parseFloat(x.mayo)-parseFloat(x.mayoOrigen)) + (parseFloat(x.junio)-parseFloat(x.junioOrigen)) + (parseFloat(x.julio)-parseFloat(x.julioOrigen)) + (parseFloat(x.agosto)-parseFloat(x.agostoOrigen)) + (parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)) + (parseFloat(x.octubre)-parseFloat(x.octubreOrigen)) + (parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)) + (parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen));



				destinoTotalInicial__4=parseFloat(x.eneroDestino__destino) + parseFloat(x.febreroDestino__destino) + parseFloat(x.marzoDestino__destino) + parseFloat(x.abrilDestino__destino) + parseFloat(x.mayoDestino__destino) + parseFloat(x.junioDestino__destino) + parseFloat(x.julioDestino__destino) + parseFloat(x.agostoDestino__destino) + parseFloat(x.septiembreDestino__destino) + parseFloat(x.octubreDestino__destino) + parseFloat(x.noviembreDestino__destino) + parseFloat(x.diciembreDestino__destino);

				destinoTotalVigente__4=(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)) + (parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)) + (parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)) +(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)) + (parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)) + (parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)) +(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)) + (parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)) + (parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)) + (parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)) + (parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)) + (parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino));	

				if (parseFloat(x.eneroOrigen)>0) {
					color__origen__destino__enero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.febreroOrigen)>0) {
					color__origen__destino__febrero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.marzoOrigen)>0) {
					color__origen__destino__marzo='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.abrilOrigen)>0) {
					color__origen__destino__abril='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.mayoOrigen)>0) {
					color__origen__destino__mayo='style="background:blue!important; color:white!important;"';
				}				

				if (parseFloat(x.junioOrigen)>0) {
					color__origen__destino__junio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.julioOrigen)>0) {
					color__origen__destino__julio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.agostoOrigen)>0) {
					color__origen__destino__agosto='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.septiembreOrigen)>0) {
					color__origen__destino__septiembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.octubreOrigen)>0) {
					color__origen__destino__octubre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.noviembreOrigen)>0) {
					color__origen__destino__noviembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.diciembreOrigen)>0) {
					color__origen__destino__diciembre='style="background:blue!important; color:white!important;"';
				}


				if (parseFloat(x.eneroDestino)>0) {
					color__destino__origen__enero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.febreroDestino)>0) {
					color__destino__origen__febrero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.marzoDestino)>0) {
					color__destino__origen__marzo='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.abrilDestino)>0) {
					color__destino__origen__abril='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.mayoDestino)>0) {
					color__destino__origen__mayo='background:cyan!important; color:black!important;';
				}				

				if (parseFloat(x.junioDestino)>0) {
					color__destino__origen__junio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.julioDestino)>0) {
					color__destino__origen__julio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.agostoDestino)>0) {
					color__destino__origen__agosto='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.septiembreDestino)>0) {
					color__destino__origen__septiembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.octubreDestino)>0) {
					color__destino__origen__octubre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.noviembreDestino)>0) {
					color__destino__origen__noviembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.diciembreDestino)>0) {
					color__destino__origen__diciembre='background:cyan!important; color:black!important;';
				}


				$(".contenedor__lineas__modificaciones1").append('<tr><th colspan="32" align="center" style="border-left:1px solid black; border-right:1px solid black;">'+tipoTramite+'</th></tr><tr class="fila__modificaciones__califica__analistas"><th colspan="30" align="center" style="border-left:1px solid black; border-right:1px solid black;"><div class="row"><div class="col col-2">VALIDAR</div><div class="col col-2" style="text-align:left!important; heigth:25px;"><select class="selectores__calificaciones__analistas" attr="'+x.idOrigenDestino+'" id="aprobar__linea'+x.idOrigenDestino+'" name="aprobar__linea__4[]" style="color:black; width:100%"><option value="VALIDADO">VALIDADO</option><option value="NO VALIDADO">NO VALIDADO</option></select></div><div class="col col-4" style="text-align:left!important;"><textarea style="width:100%; font-weight:bold; color:black;" class="observaciones__generales__realizadas" id="observaciones'+x.idOrigenDestino+'" name="observaciones__modificaciones__asignadas__4[]"></textarea></div></th></tr><tr><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-bottom:1px solid black!important;border-left:1px solid black!important;">'+contador+'</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Cédula</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombre</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+eventoOrigen+'</td><td align="center">'+x.idFinancierioOrigen+'</td><td align="center" '+color__origen__destino__enero+'>'+x.enero+'</td><td align="center" '+color__origen__destino__enero+'>'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__febrero+'>'+x.febrero+'</td><td align="center" '+color__origen__destino__febrero+'>'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__marzo+'>'+x.marzo+'</td><td align="center" '+color__origen__destino__marzo+'>'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__abril+'>'+x.abril+'</td><td align="center" '+color__origen__destino__abril+'>'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__mayo+'>'+x.mayo+'</td><td align="center" '+color__origen__destino__mayo+'>'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__junio+'>'+x.junio+'</td><td align="center" '+color__origen__destino__junio+'>'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__julio+'>'+x.julio+'</td><td align="center" '+color__origen__destino__julio+'>'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__agosto+'>'+x.agosto+'</td><td align="center" '+color__origen__destino__agosto+'>'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__septiembre+'>'+x.septiembre+'</td><td align="center" '+color__origen__destino__septiembre+'>'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__octubre+'>'+x.octubre+'</td><td align="center" '+color__origen__destino__octubre+'>'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__noviembre+'>'+x.noviembre+'</td><td align="center" '+color__origen__destino__noviembre+'>'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__diciembre+'>'+x.diciembre+'</td><td align="center" '+color__origen__destino__diciembre+'>'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__4+'</td><td align="center">'+origenTotalVigente__4+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Evento</td><td rowspan="1" align="center" style="font-weight:bold;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+eventosDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.idFinancierioDestino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__4+'</td><td align="center">'+destinoTotalVigente__4+'</td></tr>');

				$(".contenedor__lineas__modificaciones1__editar").append('<tr><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Cédula</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombre</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+eventoOrigen+'</td><td align="center">'+x.idFinancierioOrigen+'</td><td align="center">'+x.enero+'</td><td align="center">'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center">'+x.febrero+'</td><td align="center">'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center">'+x.marzo+'</td><td align="center">'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center">'+x.abril+'</td><td align="center">'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center">'+x.mayo+'</td><td align="center">'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center">'+x.junio+'</td><td align="center">'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center">'+x.julio+'</td><td align="center">'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center">'+x.agosto+'</td><td align="center">'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center">'+x.septiembre+'</td><td align="center">'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center">'+x.octubre+'</td><td align="center">'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center">'+x.noviembre+'</td><td align="center">'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center">'+x.diciembre+'</td><td align="center">'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__4+'</td><td align="center">'+origenTotalVigente__4+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Evento</td><td rowspan="1" align="center" style="font-weight:bold;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+eventosDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.idFinancierioDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__4+'</td><td align="center">'+destinoTotalVigente__4+'</td></tr>');

				$("#aprobar__linea"+x.idOrigenDestino).val(x.modificacionEstado);

			}				

			}else{
				$("#tabla__1").remove();
			}

			if (informacionObtenida__sueldos__salarios!="" && informacionObtenida__sueldos__salarios!=" " && informacionObtenida__sueldos__salarios!=undefined && informacionObtenida__sueldos__salarios!=null & informacionObtenida__sueldos__salarios!="N/A") {


			let origenTotalInicial__3=0;
			let origenTotalVigente__3=0;
			let destinoTotalInicial__3=0;
			let destinoTotalVigente__3=0;


			for(x of informacionObtenida__sueldos__salarios){

				contador++;

				let color__origen__destino__enero;
				let color__origen__destino__febrero;
				let color__origen__destino__marzo;
				let color__origen__destino__abril;
				let color__origen__destino__mayo;
				let color__origen__destino__junio;
				let color__origen__destino__julio;
				let color__origen__destino__agosto;
				let color__origen__destino__septiembre;
				let color__origen__destino__octubre;
				let color__origen__destino__noviembre;
				let color__origen__destino__diciembre;


				let color__destino__origen__enero;
				let color__destino__origen__febrero;
				let color__destino__origen__marzo;
				let color__destino__origen__abril;
				let color__destino__origen__mayo;
				let color__destino__origen__junio;
				let color__destino__origen__julio;
				let color__destino__origen__agosto;
				let color__destino__origen__septiembre;
				let color__destino__origen__octubre;
				let color__destino__origen__noviembre;
				let color__destino__origen__diciembre;



				if (x.tipoTramite==1) {
					tipoTramite="Caso 1 (Actividades e items iguales en orígen y destino)";
				}else if(x.tipoTramite==2){
					tipoTramite="Caso 2 (Actividades iguales en orígen y destino)";
				}else if(x.tipoTramite==3){
					tipoTramite="Caso 3 (Actividades diferentes en orígen y destino)";
				}



				origenTotalInicial__3=parseFloat(x.enero) + parseFloat(x.febrero) + parseFloat(x.marzo) + parseFloat(x.abril) + parseFloat(x.mayo) + parseFloat(x.junio) + parseFloat(x.julio) + parseFloat(x.agosto) + parseFloat(x.septiembre) + parseFloat(x.octubre) + parseFloat(x.noviembre) + parseFloat(x.diciembre);

				origenTotalVigente__3=(parseFloat(x.enero)-parseFloat(x.eneroOrigen)) + (parseFloat(x.febrero)-parseFloat(x.febreroOrigen)) + (parseFloat(x.marzo)-parseFloat(x.marzoOrigen)) + (parseFloat(x.abril)-parseFloat(x.abrilOrigen)) + (parseFloat(x.mayo)-parseFloat(x.mayoOrigen)) + (parseFloat(x.junio)-parseFloat(x.junioOrigen)) + (parseFloat(x.julio)-parseFloat(x.julioOrigen)) + (parseFloat(x.agosto)-parseFloat(x.agostoOrigen)) + (parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)) + (parseFloat(x.octubre)-parseFloat(x.octubreOrigen)) + (parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)) + (parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen));



				destinoTotalInicial__3=parseFloat(x.eneroDestino__destino) + parseFloat(x.febreroDestino__destino) + parseFloat(x.marzoDestino__destino) + parseFloat(x.abrilDestino__destino) + parseFloat(x.mayoDestino__destino) + parseFloat(x.junioDestino__destino) + parseFloat(x.julioDestino__destino) + parseFloat(x.agostoDestino__destino) + parseFloat(x.septiembreDestino__destino) + parseFloat(x.octubreDestino__destino) + parseFloat(x.noviembreDestino__destino) + parseFloat(x.diciembreDestino__destino);

				destinoTotalVigente__3=(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)) + (parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)) + (parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)) +(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)) + (parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)) + (parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)) +(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)) + (parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)) + (parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)) + (parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)) + (parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)) + (parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino));

				if (parseFloat(x.eneroOrigen)>0) {
					color__origen__destino__enero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.febreroOrigen)>0) {
					color__origen__destino__febrero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.marzoOrigen)>0) {
					color__origen__destino__marzo='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.abrilOrigen)>0) {
					color__origen__destino__abril='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.mayoOrigen)>0) {
					color__origen__destino__mayo='style="background:blue!important; color:white!important;"';
				}				

				if (parseFloat(x.junioOrigen)>0) {
					color__origen__destino__junio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.julioOrigen)>0) {
					color__origen__destino__julio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.agostoOrigen)>0) {
					color__origen__destino__agosto='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.septiembreOrigen)>0) {
					color__origen__destino__septiembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.octubreOrigen)>0) {
					color__origen__destino__octubre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.noviembreOrigen)>0) {
					color__origen__destino__noviembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.diciembreOrigen)>0) {
					color__origen__destino__diciembre='style="background:blue!important; color:white!important;"';
				}


				if (parseFloat(x.eneroDestino)>0) {
					color__destino__origen__enero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.febreroDestino)>0) {
					color__destino__origen__febrero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.marzoDestino)>0) {
					color__destino__origen__marzo='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.abrilDestino)>0) {
					color__destino__origen__abril='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.mayoDestino)>0) {
					color__destino__origen__mayo='background:cyan!important; color:black!important;';
				}				

				if (parseFloat(x.junioDestino)>0) {
					color__destino__origen__junio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.julioDestino)>0) {
					color__destino__origen__julio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.agostoDestino)>0) {
					color__destino__origen__agosto='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.septiembreDestino)>0) {
					color__destino__origen__septiembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.octubreDestino)>0) {
					color__destino__origen__octubre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.noviembreDestino)>0) {
					color__destino__origen__noviembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.diciembreDestino)>0) {
					color__destino__origen__diciembre='background:cyan!important; color:black!important;';
				}


				$(".contenedor__lineas__modificaciones2").append('<tr><th colspan="32" align="center" style="border-left:1px solid black; border-right:1px solid black;">'+tipoTramite+'</th></tr><tr class="fila__modificaciones__califica__analistas"><th colspan="30" align="center" style="border-left:1px solid black; border-right:1px solid black;"><div class="row"><div class="col col-2">VALIDAR</div><div class="col col-2" style="text-align:left!important; heigth:25px;"><select class="selectores__calificaciones__analistas" attr="'+x.idOrigenDestino+'" id="aprobar__linea'+x.idOrigenDestino+'" name="aprobar__linea__3[]" style="color:black; width:100%"><option value="VALIDADO">VALIDADO</option><option value="NO VALIDADO">NO VALIDADO</option></select></div><div class="col col-4" style="text-align:left!important;"><textarea style="width:100%; font-weight:bold; color:black;" class="observaciones__generales__realizadas" id="observaciones'+x.idOrigenDestino+'" name="observaciones__modificaciones__asignadas__3[]"></textarea></div></th></tr><tr><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-bottom:1px solid black!important;border-left:1px solid black!important;">'+contador+'</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombres</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+x.eventosOrigen+'</td><td align="center" '+color__origen__destino__enero+'>'+x.enero+'</td><td align="center" '+color__origen__destino__enero+'>'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__febrero+'>'+x.febrero+'</td><td align="center" '+color__origen__destino__febrero+'>'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__marzo+'>'+x.marzo+'</td><td align="center" '+color__origen__destino__marzo+'>'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__abril+'>'+x.abril+'</td><td align="center" '+color__origen__destino__abril+'>'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__mayo+'>'+x.mayo+'</td><td align="center" '+color__origen__destino__mayo+'>'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__junio+'>'+x.junio+'</td><td align="center" '+color__origen__destino__junio+'>'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__julio+'>'+x.julio+'</td><td align="center" '+color__origen__destino__julio+'>'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__agosto+'>'+x.agosto+'</td><td align="center" '+color__origen__destino__agosto+'>'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__septiembre+'>'+x.septiembre+'</td><td align="center" '+color__origen__destino__septiembre+'>'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__octubre+'>'+x.octubre+'</td><td align="center" '+color__origen__destino__octubre+'>'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__noviembre+'>'+x.noviembre+'</td><td align="center" '+color__origen__destino__noviembre+'>'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__diciembre+'>'+x.diciembre+'</td><td align="center" '+color__origen__destino__diciembre+'>'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__3+'</td><td align="center">'+origenTotalVigente__3+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Nombres</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eventosDestino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__3+'</td><td align="center">'+destinoTotalVigente__3+'</td></tr>');

				$(".contenedor__lineas__modificaciones2__editar").append('<tr><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombres</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+x.eventosOrigen+'</td><td align="center">'+x.enero+'</td><td align="center">'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center">'+x.febrero+'</td><td align="center">'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center">'+x.marzo+'</td><td align="center">'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center">'+x.abril+'</td><td align="center">'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center">'+x.mayo+'</td><td align="center">'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center">'+x.junio+'</td><td align="center">'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center">'+x.julio+'</td><td align="center">'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center">'+x.agosto+'</td><td align="center">'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center">'+x.septiembre+'</td><td align="center">'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center">'+x.octubre+'</td><td align="center">'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center">'+x.noviembre+'</td><td align="center">'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center">'+x.diciembre+'</td><td align="center">'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__3+'</td><td align="center">'+origenTotalVigente__3+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Nombres</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eventosDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__3+'</td><td align="center">'+destinoTotalVigente__3+'</td></tr>');

				$("#aprobar__linea"+x.idOrigenDestino).val(x.modificacionEstado);

			}		

			}else{
				$("#tabla__2").remove();
			}

			if (informacionObtenida__honorarios__items!="" && informacionObtenida__honorarios__items!=" " && informacionObtenida__honorarios__items!=undefined && informacionObtenida__honorarios__items!=null && informacionObtenida__honorarios__items!="N/A") {

			let origenTotalInicial__2=0;
			let origenTotalVigente__2=0;
			let destinoTotalInicial__2=0;
			let destinoTotalVigente__2=0;

			for(x of informacionObtenida__honorarios__items){

			let color__origen__destino__enero;
			let color__origen__destino__febrero;
			let color__origen__destino__marzo;
			let color__origen__destino__abril;
			let color__origen__destino__mayo;
			let color__origen__destino__junio;
			let color__origen__destino__julio;
			let color__origen__destino__agosto;
			let color__origen__destino__septiembre;
			let color__origen__destino__octubre;
			let color__origen__destino__noviembre;
			let color__origen__destino__diciembre;


			let color__destino__origen__enero;
			let color__destino__origen__febrero;
			let color__destino__origen__marzo;
			let color__destino__origen__abril;
			let color__destino__origen__mayo;
			let color__destino__origen__junio;
			let color__destino__origen__julio;
			let color__destino__origen__agosto;
			let color__destino__origen__septiembre;
			let color__destino__origen__octubre;
			let color__destino__origen__noviembre;
			let color__destino__origen__diciembre;



				contador++;

				if (x.eventosOrigen=="null" || x.eventosOrigen==null) {
					eventoOrigen='N/A';
				}else{
					eventoOrigen=x.eventosOrigen;
				}

				if (x.eventosDestino=="null" || x.eventosDestino==null) {
					eventosDestino='N/A';
				}else{
					eventosDestino=x.eventosDestino;
				}

				if (x.tipoTramite==1) {
					tipoTramite="Caso 1 (Actividades e items iguales en orígen y destino)";
				}else if(x.tipoTramite==2){
					tipoTramite="Caso 2 (Actividades iguales en orígen y destino)";
				}else if(x.tipoTramite==3){
					tipoTramite="Caso 3 (Actividades diferentes en orígen y destino)";
				}

				if (parseFloat(x.eneroOrigen)>0) {
					color__origen__destino__enero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.febreroOrigen)>0) {
					color__origen__destino__febrero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.marzoOrigen)>0) {
					color__origen__destino__marzo='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.abrilOrigen)>0) {
					color__origen__destino__abril='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.mayoOrigen)>0) {
					color__origen__destino__mayo='style="background:blue!important; color:white!important;"';
				}				

				if (parseFloat(x.junioOrigen)>0) {
					color__origen__destino__junio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.julioOrigen)>0) {
					color__origen__destino__julio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.agostoOrigen)>0) {
					color__origen__destino__agosto='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.septiembreOrigen)>0) {
					color__origen__destino__septiembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.octubreOrigen)>0) {
					color__origen__destino__octubre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.noviembreOrigen)>0) {
					color__origen__destino__noviembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.diciembreOrigen)>0) {
					color__origen__destino__diciembre='style="background:blue!important; color:white!important;"';
				}


				if (parseFloat(x.eneroDestino)>0) {
					color__destino__origen__enero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.febreroDestino)>0) {
					color__destino__origen__febrero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.marzoDestino)>0) {
					color__destino__origen__marzo='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.abrilDestino)>0) {
					color__destino__origen__abril='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.mayoDestino)>0) {
					color__destino__origen__mayo='background:cyan!important; color:black!important;';
				}				

				if (parseFloat(x.junioDestino)>0) {
					color__destino__origen__junio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.julioDestino)>0) {
					color__destino__origen__julio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.agostoDestino)>0) {
					color__destino__origen__agosto='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.septiembreDestino)>0) {
					color__destino__origen__septiembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.octubreDestino)>0) {
					color__destino__origen__octubre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.noviembreDestino)>0) {
					color__destino__origen__noviembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.diciembreDestino)>0) {
					color__destino__origen__diciembre='background:cyan!important; color:black!important;';
				}


				origenTotalInicial__2=parseFloat(x.enero) + parseFloat(x.febrero) + parseFloat(x.marzo) + parseFloat(x.abril) + parseFloat(x.mayo) + parseFloat(x.junio) + parseFloat(x.julio) + parseFloat(x.agosto) + parseFloat(x.septiembre) + parseFloat(x.octubre) + parseFloat(x.noviembre) + parseFloat(x.diciembre);

				origenTotalVigente__2=(parseFloat(x.enero)-parseFloat(x.eneroOrigen)) + (parseFloat(x.febrero)-parseFloat(x.febreroOrigen)) + (parseFloat(x.marzo)-parseFloat(x.marzoOrigen)) + (parseFloat(x.abril)-parseFloat(x.abrilOrigen)) + (parseFloat(x.mayo)-parseFloat(x.mayoOrigen)) + (parseFloat(x.junio)-parseFloat(x.junioOrigen)) + (parseFloat(x.julio)-parseFloat(x.julioOrigen)) + (parseFloat(x.agosto)-parseFloat(x.agostoOrigen)) + (parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)) + (parseFloat(x.octubre)-parseFloat(x.octubreOrigen)) + (parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)) + (parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen));



				destinoTotalInicial__2=parseFloat(x.eneroDestino__destino) + parseFloat(x.febreroDestino__destino) + parseFloat(x.marzoDestino__destino) + parseFloat(x.abrilDestino__destino) + parseFloat(x.mayoDestino__destino) + parseFloat(x.junioDestino__destino) + parseFloat(x.julioDestino__destino) + parseFloat(x.agostoDestino__destino) + parseFloat(x.septiembreDestino__destino) + parseFloat(x.octubreDestino__destino) + parseFloat(x.noviembreDestino__destino) + parseFloat(x.diciembreDestino__destino);

				destinoTotalVigente__2=(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)) + (parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)) + (parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)) +(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)) + (parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)) + (parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)) +(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)) + (parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)) + (parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)) + (parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)) + (parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)) + (parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino));			


				$(".contenedor__lineas__modificaciones3").append('<tr><th colspan="32" align="center" style="border-left:1px solid black; border-right:1px solid black;">'+tipoTramite+'</th></tr><tr class="fila__modificaciones__califica__analistas"><th colspan="30" align="center" style="border-left:1px solid black; border-right:1px solid black;"><div class="row"><div class="col col-2">VALIDAR</div><div class="col col-2" style="text-align:left!important; heigth:25px;"><select class="selectores__calificaciones__analistas" attr="'+x.idOrigenDestino+'" id="aprobar__linea'+x.idOrigenDestino+'" name="aprobar__linea__2[]" style="color:black; width:100%"><option value="VALIDADO">VALIDADO</option><option value="NO VALIDADO">NO VALIDADO</option></select></div><div class="col col-4" style="text-align:left!important;"><textarea style="width:100%; font-weight:bold; color:black;" class="observaciones__generales__realizadas" id="observaciones'+x.idOrigenDestino+'" name="observaciones__modificaciones__asignadas__2[]"></textarea></div></th></tr><tr><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-bottom:1px solid black!important;border-left:1px solid black!important;">'+contador+'</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Cédula</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombre</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+eventoOrigen+'</td><td align="center">'+x.idFinancierioOrigen+'</td><td align="center" '+color__origen__destino__enero+'>'+x.enero+'</td><td align="center" '+color__origen__destino__enero+'>'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__febrero+'>'+x.febrero+'</td><td align="center" '+color__origen__destino__febrero+'>'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__marzo+'>'+x.marzo+'</td><td align="center" '+color__origen__destino__marzo+'>'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__abril+'>'+x.abril+'</td><td align="center" '+color__origen__destino__abril+'>'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__mayo+'>'+x.mayo+'</td><td align="center" '+color__origen__destino__mayo+'>'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__junio+'>'+x.junio+'</td><td align="center" '+color__origen__destino__junio+'>'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__julio+'>'+x.julio+'</td><td align="center" '+color__origen__destino__julio+'>'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__agosto+'>'+x.agosto+'</td><td align="center" '+color__origen__destino__agosto+'>'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__septiembre+'>'+x.septiembre+'</td><td align="center" '+color__origen__destino__septiembre+'>'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__octubre+'>'+x.octubre+'</td><td align="center" '+color__origen__destino__octubre+'>'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__noviembre+'>'+x.noviembre+'</td><td align="center" '+color__origen__destino__noviembre+'>'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__diciembre+'>'+x.diciembre+'</td><td align="center" '+color__origen__destino__diciembre+'>'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__2+'</td><td align="center">'+origenTotalVigente__2+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Evento</td><td rowspan="1" align="center" style="font-weight:bold;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+eventosDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.idFinancierioDestino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__2+'</td><td align="center">'+destinoTotalVigente__2+'</td></tr>');

				$(".contenedor__lineas__modificaciones3__editar").append('<tr><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Cédula</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombre</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+eventoOrigen+'</td><td align="center">'+x.idFinancierioOrigen+'</td><td align="center">'+x.enero+'</td><td align="center">'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center">'+x.febrero+'</td><td align="center">'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center">'+x.marzo+'</td><td align="center">'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center">'+x.abril+'</td><td align="center">'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center">'+x.mayo+'</td><td align="center">'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center">'+x.junio+'</td><td align="center">'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center">'+x.julio+'</td><td align="center">'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center">'+x.agosto+'</td><td align="center">'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center">'+x.septiembre+'</td><td align="center">'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center">'+x.octubre+'</td><td align="center">'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center">'+x.noviembre+'</td><td align="center">'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center">'+x.diciembre+'</td><td align="center">'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__2+'</td><td align="center">'+origenTotalVigente__2+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Evento</td><td rowspan="1" align="center" style="font-weight:bold;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+eventosDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.idFinancierioDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__2+'</td><td align="center">'+destinoTotalVigente__2+'</td></tr>');


				$("#aprobar__linea"+x.idOrigenDestino).val(x.modificacionEstado);

			}				

			}else{
				$("#tabla__3").remove();
			}

			if (informacionObtenida__honorarios!="" && informacionObtenida__honorarios!=" " && informacionObtenida__honorarios!=undefined && informacionObtenida__honorarios!=null && informacionObtenida__honorarios!="N/A") {


			let origenTotalInicial__1=0;
			let origenTotalVigente__1=0;
			let destinoTotalInicial__1=0;
			let destinoTotalVigente__1=0;

			for(x of informacionObtenida__honorarios){

				let color__origen__destino__enero;
				let color__origen__destino__febrero;
				let color__origen__destino__marzo;
				let color__origen__destino__abril;
				let color__origen__destino__mayo;
				let color__origen__destino__junio;
				let color__origen__destino__julio;
				let color__origen__destino__agosto;
				let color__origen__destino__septiembre;
				let color__origen__destino__octubre;
				let color__origen__destino__noviembre;
				let color__origen__destino__diciembre;


				let color__destino__origen__enero;
				let color__destino__origen__febrero;
				let color__destino__origen__marzo;
				let color__destino__origen__abril;
				let color__destino__origen__mayo;
				let color__destino__origen__junio;
				let color__destino__origen__julio;
				let color__destino__origen__agosto;
				let color__destino__origen__septiembre;
				let color__destino__origen__octubre;
				let color__destino__origen__noviembre;
				let color__destino__origen__diciembre;

				contador++;

				if (x.tipoTramite==1) {
					tipoTramite="Caso 1 (Actividades e items iguales en orígen y destino)";
				}else if(x.tipoTramite==2){
					tipoTramite="Caso 2 (Actividades iguales en orígen y destino)";
				}else if(x.tipoTramite==3){
					tipoTramite="Caso 3 (Actividades diferentes en orígen y destino)";
				}



				origenTotalInicial__1=parseFloat(x.enero) + parseFloat(x.febrero) + parseFloat(x.marzo) + parseFloat(x.abril) + parseFloat(x.mayo) + parseFloat(x.junio) + parseFloat(x.julio) + parseFloat(x.agosto) + parseFloat(x.septiembre) + parseFloat(x.octubre) + parseFloat(x.noviembre) + parseFloat(x.diciembre);

				origenTotalVigente__1=(parseFloat(x.enero)-parseFloat(x.eneroOrigen)) + (parseFloat(x.febrero)-parseFloat(x.febreroOrigen)) + (parseFloat(x.marzo)-parseFloat(x.marzoOrigen)) + (parseFloat(x.abril)-parseFloat(x.abrilOrigen)) + (parseFloat(x.mayo)-parseFloat(x.mayoOrigen)) + (parseFloat(x.junio)-parseFloat(x.junioOrigen)) + (parseFloat(x.julio)-parseFloat(x.julioOrigen)) + (parseFloat(x.agosto)-parseFloat(x.agostoOrigen)) + (parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)) + (parseFloat(x.octubre)-parseFloat(x.octubreOrigen)) + (parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)) + (parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen));



				destinoTotalInicial__1=parseFloat(x.eneroDestino__destino) + parseFloat(x.febreroDestino__destino) + parseFloat(x.marzoDestino__destino) + parseFloat(x.abrilDestino__destino) + parseFloat(x.mayoDestino__destino) + parseFloat(x.junioDestino__destino) + parseFloat(x.julioDestino__destino) + parseFloat(x.agostoDestino__destino) + parseFloat(x.septiembreDestino__destino) + parseFloat(x.octubreDestino__destino) + parseFloat(x.noviembreDestino__destino) + parseFloat(x.diciembreDestino__destino);

				destinoTotalVigente__1=(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)) + (parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)) + (parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)) +(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)) + (parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)) + (parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)) +(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)) + (parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)) + (parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)) + (parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)) + (parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)) + (parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino));

				if (parseFloat(x.eneroOrigen)>0) {
					color__origen__destino__enero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.febreroOrigen)>0) {
					color__origen__destino__febrero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.marzoOrigen)>0) {
					color__origen__destino__marzo='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.abrilOrigen)>0) {
					color__origen__destino__abril='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.mayoOrigen)>0) {
					color__origen__destino__mayo='style="background:blue!important; color:white!important;"';
				}				

				if (parseFloat(x.junioOrigen)>0) {
					color__origen__destino__junio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.julioOrigen)>0) {
					color__origen__destino__julio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.agostoOrigen)>0) {
					color__origen__destino__agosto='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.septiembreOrigen)>0) {
					color__origen__destino__septiembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.octubreOrigen)>0) {
					color__origen__destino__octubre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.noviembreOrigen)>0) {
					color__origen__destino__noviembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.diciembreOrigen)>0) {
					color__origen__destino__diciembre='style="background:blue!important; color:white!important;"';
				}


				if (parseFloat(x.eneroDestino)>0) {
					color__destino__origen__enero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.febreroDestino)>0) {
					color__destino__origen__febrero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.marzoDestino)>0) {
					color__destino__origen__marzo='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.abrilDestino)>0) {
					color__destino__origen__abril='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.mayoDestino)>0) {
					color__destino__origen__mayo='background:cyan!important; color:black!important;';
				}				

				if (parseFloat(x.junioDestino)>0) {
					color__destino__origen__junio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.julioDestino)>0) {
					color__destino__origen__julio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.agostoDestino)>0) {
					color__destino__origen__agosto='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.septiembreDestino)>0) {
					color__destino__origen__septiembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.octubreDestino)>0) {
					color__destino__origen__octubre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.noviembreDestino)>0) {
					color__destino__origen__noviembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.diciembreDestino)>0) {
					color__destino__origen__diciembre='background:cyan!important; color:black!important;';
				}


				$(".contenedor__lineas__modificaciones4").append('<tr><th colspan="32" align="center" style="border-left:1px solid black; border-right:1px solid black;">'+tipoTramite+'</th></tr><tr class="fila__modificaciones__califica__analistas"><th colspan="30" align="center" style="border-left:1px solid black; border-right:1px solid black;"><div class="row"><div class="col col-2">VALIDAR</div><div class="col col-2" style="text-align:left!important; heigth:25px;"><select class="selectores__calificaciones__analistas" attr="'+x.idOrigenDestino+'" id="aprobar__linea'+x.idOrigenDestino+'" name="aprobar__linea__1[]" style="color:black; width:100%"><option value="VALIDADO">VALIDADO</option><option value="NO VALIDADO">NO VALIDADO</option></select></div><div class="col col-4" style="text-align:left!important;"><textarea style="width:100%; font-weight:bold; color:black;" class="observaciones__generales__realizadas" id="observaciones'+x.idOrigenDestino+'" name="observaciones__modificaciones__asignadas__1[]"></textarea></div></th></tr><tr><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-bottom:1px solid black!important;border-left:1px solid black!important;">'+contador+'</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombres</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+x.eventosOrigen+'</td><td align="center" '+color__origen__destino__enero+'>'+x.enero+'</td><td align="center" '+color__origen__destino__enero+'>'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__febrero+'>'+x.febrero+'</td><td align="center" '+color__origen__destino__febrero+'>'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__marzo+'>'+x.marzo+'</td><td align="center" '+color__origen__destino__marzo+'>'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__abril+'>'+x.abril+'</td><td align="center" '+color__origen__destino__abril+'>'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__mayo+'>'+x.mayo+'</td><td align="center" '+color__origen__destino__mayo+'>'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__junio+'>'+x.junio+'</td><td align="center" '+color__origen__destino__junio+'>'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__julio+'>'+x.julio+'</td><td align="center" '+color__origen__destino__julio+'>'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__agosto+'>'+x.agosto+'</td><td align="center" '+color__origen__destino__agosto+'>'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__septiembre+'>'+x.septiembre+'</td><td align="center" '+color__origen__destino__septiembre+'>'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__octubre+'>'+x.octubre+'</td><td align="center" '+color__origen__destino__octubre+'>'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__noviembre+'>'+x.noviembre+'</td><td align="center" '+color__origen__destino__noviembre+'>'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__diciembre+'>'+x.diciembre+'</td><td align="center" '+color__origen__destino__diciembre+'>'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__1+'</td><td align="center">'+origenTotalVigente__1+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Nombres</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eventosDestino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__1+'</td><td align="center">'+destinoTotalVigente__1+'</td></tr>');


				$(".contenedor__lineas__modificaciones4__editar").append('<tr><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombres</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+x.eventosOrigen+'</td><td align="center">'+x.enero+'</td><td align="center">'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center">'+x.febrero+'</td><td align="center">'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center">'+x.marzo+'</td><td align="center">'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center">'+x.abril+'</td><td align="center">'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center">'+x.mayo+'</td><td align="center">'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center">'+x.junio+'</td><td align="center">'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center">'+x.julio+'</td><td align="center">'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center">'+x.agosto+'</td><td align="center">'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center">'+x.septiembre+'</td><td align="center">'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center">'+x.octubre+'</td><td align="center">'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center">'+x.noviembre+'</td><td align="center">'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center">'+x.diciembre+'</td><td align="center">'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__1+'</td><td align="center">'+origenTotalVigente__1+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Nombres</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eventosDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__1+'</td><td align="center">'+destinoTotalVigente__1+'</td></tr>');

				$("#aprobar__linea"+x.idOrigenDestino).val(x.modificacionEstado);

			}			

			}else{
				$("#tabla__4").remove();
			}	


			let origenTotalInicial__0=0;
			let origenTotalVigente__0=0;
			let destinoTotalInicial__0=0;
			let destinoTotalVigente__0=0;



			for(x of informacionObtenida){

			let color__origen__destino__enero;
			let color__origen__destino__febrero;
			let color__origen__destino__marzo;
			let color__origen__destino__abril;
			let color__origen__destino__mayo;
			let color__origen__destino__junio;
			let color__origen__destino__julio;
			let color__origen__destino__agosto;
			let color__origen__destino__septiembre;
			let color__origen__destino__octubre;
			let color__origen__destino__noviembre;
			let color__origen__destino__diciembre;


			let color__destino__origen__enero;
			let color__destino__origen__febrero;
			let color__destino__origen__marzo;
			let color__destino__origen__abril;
			let color__destino__origen__mayo;
			let color__destino__origen__junio;
			let color__destino__origen__julio;
			let color__destino__origen__agosto;
			let color__destino__origen__septiembre;
			let color__destino__origen__octubre;
			let color__destino__origen__noviembre;
			let color__destino__origen__diciembre;


				contador++;

				if (x.eventosOrigen=="null" || x.eventosOrigen==null) {
					eventoOrigen='N/A';
				}else{
					eventoOrigen=x.eventosOrigen;
				}

				if (x.eventosDestino=="null" || x.eventosDestino==null) {
					eventosDestino='N/A';
				}else{
					eventosDestino=x.eventosDestino;
				}

				if (x.tipoTramite==1) {
					tipoTramite="Caso 1 (Actividades e items iguales en orígen y destino)";
				}else if(x.tipoTramite==2){
					tipoTramite="Caso 2 (Actividades iguales en orígen y destino)";
				}else if(x.tipoTramite==3){
					tipoTramite="Caso 3 (Actividades diferentes en orígen y destino)";
				}


				origenTotalInicial__0=parseFloat(x.enero) + parseFloat(x.febrero) + parseFloat(x.marzo) + parseFloat(x.abril) + parseFloat(x.mayo) + parseFloat(x.junio) + parseFloat(x.julio) + parseFloat(x.agosto) + parseFloat(x.septiembre) + parseFloat(x.octubre) + parseFloat(x.noviembre) + parseFloat(x.diciembre);

				origenTotalVigente__0=(parseFloat(x.enero)-parseFloat(x.eneroOrigen)) + (parseFloat(x.febrero)-parseFloat(x.febreroOrigen)) + (parseFloat(x.marzo)-parseFloat(x.marzoOrigen)) + (parseFloat(x.abril)-parseFloat(x.abrilOrigen)) + (parseFloat(x.mayo)-parseFloat(x.mayoOrigen)) + (parseFloat(x.junio)-parseFloat(x.junioOrigen)) + (parseFloat(x.julio)-parseFloat(x.julioOrigen)) + (parseFloat(x.agosto)-parseFloat(x.agostoOrigen)) + (parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)) + (parseFloat(x.octubre)-parseFloat(x.octubreOrigen)) + (parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)) + (parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen));



				destinoTotalInicial__0=parseFloat(x.eneroDestino__destino) + parseFloat(x.febreroDestino__destino) + parseFloat(x.marzoDestino__destino) + parseFloat(x.abrilDestino__destino) + parseFloat(x.mayoDestino__destino) + parseFloat(x.junioDestino__destino) + parseFloat(x.julioDestino__destino) + parseFloat(x.agostoDestino__destino) + parseFloat(x.septiembreDestino__destino) + parseFloat(x.octubreDestino__destino) + parseFloat(x.noviembreDestino__destino) + parseFloat(x.diciembreDestino__destino);

				destinoTotalVigente__0=(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)) + (parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)) + (parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)) +(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)) + (parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)) + (parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)) +(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)) + (parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)) + (parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)) + (parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)) + (parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)) + (parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino));

				if (parseFloat(x.eneroOrigen)>0) {
					color__origen__destino__enero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.febreroOrigen)>0) {
					color__origen__destino__febrero='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.marzoOrigen)>0) {
					color__origen__destino__marzo='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.abrilOrigen)>0) {
					color__origen__destino__abril='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.mayoOrigen)>0) {
					color__origen__destino__mayo='style="background:blue!important; color:white!important;"';
				}				

				if (parseFloat(x.junioOrigen)>0) {
					color__origen__destino__junio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.julioOrigen)>0) {
					color__origen__destino__julio='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.agostoOrigen)>0) {
					color__origen__destino__agosto='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.septiembreOrigen)>0) {
					color__origen__destino__septiembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.octubreOrigen)>0) {
					color__origen__destino__octubre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.noviembreOrigen)>0) {
					color__origen__destino__noviembre='style="background:blue!important; color:white!important;"';
				}

				if (parseFloat(x.diciembreOrigen)>0) {
					color__origen__destino__diciembre='style="background:blue!important; color:white!important;"';
				}


				if (parseFloat(x.eneroDestino)>0) {
					color__destino__origen__enero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.febreroDestino)>0) {
					color__destino__origen__febrero='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.marzoDestino)>0) {
					color__destino__origen__marzo='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.abrilDestino)>0) {
					color__destino__origen__abril='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.mayoDestino)>0) {
					color__destino__origen__mayo='background:cyan!important; color:black!important;';
				}				

				if (parseFloat(x.junioDestino)>0) {
					color__destino__origen__junio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.julioDestino)>0) {
					color__destino__origen__julio='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.agostoDestino)>0) {
					color__destino__origen__agosto='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.septiembreDestino)>0) {
					color__destino__origen__septiembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.octubreDestino)>0) {
					color__destino__origen__octubre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.noviembreDestino)>0) {
					color__destino__origen__noviembre='background:cyan!important; color:black!important;';
				}

				if (parseFloat(x.diciembreDestino)>0) {
					color__destino__origen__diciembre='background:cyan!important; color:black!important;';
				}

				$(".contenedor__lineas__modificaciones5").append('<tr><th colspan="32" align="center" style="border-left:1px solid black; border-right:1px solid black;">'+tipoTramite+'</th></tr><tr class="fila__modificaciones__califica__analistas"><th colspan="30" align="center" style="border-left:1px solid black; border-right:1px solid black;"><div class="row"><div class="col col-2">VALIDAR</div><div class="col col-2" style="text-align:left!important; heigth:25px;"><select class="selectores__calificaciones__analistas" attr="'+x.idOrigenDestino+'" id="aprobar__linea'+x.idOrigenDestino+'" name="aprobar__linea__0[]" style="color:black; width:100%"><option value="VALIDADO">VALIDADO</option><option value="NO VALIDADO">NO VALIDADO</option></select></div><div class="col col-4" style="text-align:left!important;"><textarea style="width:100%; font-weight:bold; color:black;" class="observaciones__generales__realizadas" id="observaciones'+x.idOrigenDestino+'" name="observaciones__modificaciones__asignadas__0[]"></textarea></div></th></tr><tr><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-bottom:1px solid black!important;border-left:1px solid black!important;">'+contador+'</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Evento</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+eventoOrigen+'</td><td align="center">'+x.idFinancierioOrigen+'</td><td align="center" '+color__origen__destino__enero+'>'+x.enero+'</td><td align="center" '+color__origen__destino__enero+'>'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__febrero+'>'+x.febrero+'</td><td align="center" '+color__origen__destino__febrero+'>'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__marzo+'>'+x.marzo+'</td><td align="center" '+color__origen__destino__marzo+'>'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__abril+'>'+x.abril+'</td><td align="center" '+color__origen__destino__abril+'>'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__mayo+'>'+x.mayo+'</td><td align="center" '+color__origen__destino__mayo+'>'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__junio+'>'+x.junio+'</td><td align="center" '+color__origen__destino__junio+'>'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__julio+'>'+x.julio+'</td><td align="center" '+color__origen__destino__julio+'>'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__agosto+'>'+x.agosto+'</td><td align="center" '+color__origen__destino__agosto+'>'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__septiembre+'>'+x.septiembre+'</td><td align="center" '+color__origen__destino__septiembre+'>'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__octubre+'>'+x.octubre+'</td><td align="center" '+color__origen__destino__octubre+'>'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__noviembre+'>'+x.noviembre+'</td><td align="center" '+color__origen__destino__noviembre+'>'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__diciembre+'>'+x.diciembre+'</td><td align="center" '+color__origen__destino__diciembre+'>'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__0+'</td><td align="center">'+origenTotalVigente__0+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Evento</td><td rowspan="1" align="center" style="font-weight:bold;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+eventosDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.idFinancierioDestino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__0+'</td><td align="center">'+destinoTotalVigente__0+'</td></tr>');


				$(".contenedor__lineas__modificaciones5__editar").append('<tr><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Evento</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+eventoOrigen+'</td><td align="center">'+x.idFinancierioOrigen+'</td><td align="center">'+x.enero+'</td><td align="center">'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center">'+x.febrero+'</td><td align="center">'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center">'+x.marzo+'</td><td align="center">'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center">'+x.abril+'</td><td align="center">'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center">'+x.mayo+'</td><td align="center">'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center">'+x.junio+'</td><td align="center">'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center">'+x.julio+'</td><td align="center">'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center">'+x.agosto+'</td><td align="center">'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center">'+x.septiembre+'</td><td align="center">'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center">'+x.octubre+'</td><td align="center">'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center">'+x.noviembre+'</td><td align="center">'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center">'+x.diciembre+'</td><td align="center">'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td><td align="center">'+origenTotalInicial__0+'</td><td align="center">'+origenTotalVigente__0+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Evento</td><td rowspan="1" align="center" style="font-weight:bold;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bol-d;">Diciembre Vigente</td><td style="font-weight:bold;">Total Inicial</td><td style="font-weight:bold;">Total Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+eventosDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.idFinancierioDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important;">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important;">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td><td align="center">'+destinoTotalInicial__0+'</td><td align="center">'+destinoTotalVigente__0+'</td></tr>');

				$("#aprobar__linea"+x.idOrigenDestino).val(x.modificacionEstado);

			}

			execelGenerados($(".excelProyectosMatricez__0"),"tabla__0__modificaciones__editar","Modificación");
			execelGenerados($(".excelProyectosMatricez__1"),"tabla__1__modificaciones__editar","Modificación");
			execelGenerados($(".excelProyectosMatricez__2"),"tabla__2__modificaciones__editar","Modificación");
			execelGenerados($(".excelProyectosMatricez__3"),"tabla__3__modificaciones__editar","Modificación");
			execelGenerados($(".excelProyectosMatricez__4"),"tabla__4__modificaciones__editar","Modificación");
			execelGenerados($(".excelProyectosMatricez__5"),"tabla__5__modificaciones__editar","Modificación");

			$("#idUsuarioEn").val($("#idUsuarioC").val());

			if ($("#idRolAd").val()==4 && $("#fisicamenteE").val()==1) {

				selector__coordinacion__infraestructura($(".selector__modificacion__lineas"));

				$(".selector__modificacion__lineas").attr('multiple','multiple[]');

				$(".selector__modificacion__lineas").attr('style','height:100px!important;');

			}else if ($("#idRolAd").val()==4 && $("#fisicamenteE").val()==2) {

				selector__coordinacion__administracion($(".selector__modificacion__lineas"));

			}else if ($("#idRolAd").val()==7 && $("#fisicamenteE").val()==24) {

				selector__subsecretaria__alto__rendimiento($(".selector__modificacion__lineas"));

			}else if ($("#idRolAd").val()==7 && $("#fisicamenteE").val()==26) {

				selector__subsecretaria__desarrollo($(".selector__modificacion__lineas"));

			}else if(($("#idRolAd").val()==2)){

				selector__general($(".selector__modificacion__lineas"));

			}else if(($("#idRolAd").val()==3)){

				selector__general__analistas($(".selector__modificacion__lineas"));

				$(".rotulo__devolver__a").text("Devolver a");

				$(".modal__modificaciones__revisor__enviar").remove();
				$(".modal__modificaciones__analistas__enviar").show();

				$(".nombre__visualizador").text("Dar click en el check para evaluar las modificaciones");

			}

			if ($("#idRolAd").val()!="3" && $("#idRolAd").val()!=3) {

				$(".fila__modificaciones__califica__analistas").remove();


			}else{

				// $("#visualizar__informacionModificaciones").attr('checked','checked');

				// $(".no__visible__modificaciones").show();

				if ($("#fisicamenteE").val()==12 || $("#fisicamenteE").val()==24 || $("#fisicamenteE").val()==14) {

					$("#tipoDocumento__D").val("alto");
					$(".modal__body__alto__rendimiento").show();

				}else if($("#fisicamenteE").val()==26 || $("#fisicamenteE").val()==13){
					$("#tipoDocumento__D").val("formativo");
					$(".modal__body__alto__rendimiento__desarrollo__conclusiones").show();
				}else if($("#fisicamenteE").val()==25 || $("#fisicamenteE").val()==19){
					$("#tipoDocumento__D").val("recreativo");
					$(".modal__body__alto__rendimiento__desarrollo__conclusiones").show();
				}else if($("#fisicamenteE").val()==15 || $("#fisicamenteE").val()==6 || $("#fisicamenteE").val()==27 || $("#fisicamenteE").val()==28 || $("#fisicamenteE").val()==29 || $("#fisicamenteE").val()==30 || $("#fisicamenteE").val()==31 || $("#fisicamenteE").val()==32 || $("#fisicamenteE").val()==33){
					$("#tipoDocumento__D").val("infraestructura");
					$(".tabla__instalaciones__calificacion").show();
				}else if($("#fisicamenteE").val()==3 || $("#fisicamenteE").val()==18){
					$("#tipoDocumento__D").val("planificacion");
				}else if($("#fisicamenteE").val()==5){
					$("#tipoDocumento__D").val("administrativo");
					$(".tabla__administrativo__calificacion").show();
				}

				$("#enviarModificacionesArecomienda").text("REGISTRAR");

			}
    

		});

		},
		error:function(){

		}
				
	});		

});

}