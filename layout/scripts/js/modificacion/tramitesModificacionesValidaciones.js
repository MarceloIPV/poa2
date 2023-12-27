function datatabletsConfiguration(tabla,columnDefs){

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
		'excel'
	],
	columnDefs:columnDefs,
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

let contadorXcontador=0;

var visualizar__actividades__admin__items=function(informacionObtenida,table,tipologia){

	$("#tabla__origen__datatablets tbody").html(" ");

	for(x of informacionObtenida){

		table.row.add([

			 "<div>"+x.actividadOrigen+"</div>",
			 "<div>"+x.nombreItemOrigen+"</div>",
			 "<div>"+x.actividadDestino+"</div>",
			 "<div>"+x.nombreItemDestino+"</div>",
			 '<button class="delete__cargador" style="padding:.5em;background:red;color:white; width:100%;" id="eliminar'+x.idBloqueo+'" name="eliminar'+x.idBloqueo+'" idContador="'+x.idBloqueo+'"><i class="fa fa-trash" aria-hidden="true"></i></button>'

		]).draw(false);

					
		/*================================
		=            Eliminar            =
		================================*/


		$('.delete__cargador').on('click',function(){

			var tablename = $(this).closest('table').DataTable();  
			tablename.row($(this).parents('tr')).remove().draw();

			let paqueteDeDatos2 = new FormData();
			let idEnvio=$(this).attr('idContador');
			paqueteDeDatos2.append("tipo","eliminar__modificacion__linea__adminsitradores");
			paqueteDeDatos2.append("idEnvio",idEnvio);
			$.ajax({
				type:"POST",
				url:"modelosBd/inserta/eliminaAcciones.md.php",
				contentType: false,
				data:paqueteDeDatos2,
				processData: false,
				cache: false, 
				success:function(response){
					$.getScript("layout/scripts/js/modificacion/modificacionGlobal.js",function(){
						alertify.set("notifier","position", "top-center");
						alertify.notify("Eliminación realizada correctamente", "success", 5, function(){});
					});	

				},
				error:function(){
				}
			});	

		});

		/*=====  End of Eliminar  ======*/		

	}

}

var visualizar__actividades__admin__items__2=function(informacionObtenida,table,tipologia){

	$("#tabla__destino__datatablets tbody").html(" ");

	for(x of informacionObtenida){

		table.row.add([

			 "<div>"+x.actividadOrigen+"</div>",
			 "<div>"+x.nombreItemOrigen+"</div>",
			 "<div>"+x.actividadDestino+"</div>",
			 "<div>"+x.nombreItemDestino+"</div>",
			 '<button class="delete__cargador" style="padding:.5em;background:red;color:white; width:100%;" id="eliminar'+x.idBloqueo+'" name="eliminar'+x.idBloqueo+'" idContador="'+x.idBloqueo+'"><i class="fa fa-trash" aria-hidden="true"></i></button>'

		]).draw(false);

					
		/*================================
		=            Eliminar            =
		================================*/


		$('.delete__cargador').on('click',function(){

			var tablename = $(this).closest('table').DataTable();  
			tablename.row($(this).parents('tr')).remove().draw();

			let paqueteDeDatos2 = new FormData();
			let idEnvio=$(this).attr('idContador');
			paqueteDeDatos2.append("tipo","eliminar__modificacion__linea__adminsitradores");
			paqueteDeDatos2.append("idEnvio",idEnvio);
			$.ajax({
				type:"POST",
				url:"modelosBd/inserta/eliminaAcciones.md.php",
				contentType: false,
				data:paqueteDeDatos2,
				processData: false,
				cache: false, 
				success:function(response){
					$.getScript("layout/scripts/js/modificacion/modificacionGlobal.js",function(){
						alertify.set("notifier","position", "top-center");
						alertify.notify("Eliminación realizada correctamente", "success", 5, function(){});
					});	

				},
				error:function(){
				}
			});	

		});

		/*=====  End of Eliminar  ======*/		

	}

}

var visualizar__actividades=function(informacionObtenida,table,identificadorSueldos){

	let contador=0;

	let eventoOrigen="";
	let eventosDestino="";
	let tipoTramite="";

	let rotulo1;
	let rotulo2;

	let rotulo3;
	let rotulo4;


	for(x of informacionObtenida){

		contadorXcontador++;

		if (x.idOrigenActividad==1) {
			rotulo1="N/A";
			rotulo2="N/A";
		}else if(x.idOrigenActividad==2){
			rotulo1="N/A";
			rotulo2=x.eventosOrigen;
		}else{
			rotulo1=x.eventosOrigen;
			rotulo2="N/A";
		}

		if (x.idDestinoActividad==1) {
			rotulo3="N/A";
			rotulo4="N/A";
		}else if(x.idDestinoActividad==2){
			rotulo3="N/A";
			rotulo4=x.eventosDestino;
		}else{
			rotulo3=x.eventosDestino;
			rotulo4="N/A";
		}



		/*==============================
		=            Orígen            =
		==============================*/
					
		let contadorOrigen=0;
		let valorOrigen=0;
		let totalFuncion=0;
		let acumulador=0;				
					
		valorOrigen=aumentarValor([x.eneroOrigen,x.febreroOrigen,x.marzoOrigen,x.abrilOrigen,x.mayoOrigen,x.junioOrigen,x.julioOrigen,x.agostoOrigen,x.septiembreOrigen,x.octubreOrigen,x.noviembreOrigen,x.diciembreOrigen],contadorOrigen);
		let mesOrigen=mesesAutenticados([x.eneroOrigen,x.febreroOrigen,x.marzoOrigen,x.abrilOrigen,x.mayoOrigen,x.junioOrigen,x.julioOrigen,x.agostoOrigen,x.septiembreOrigen,x.octubreOrigen,x.noviembreOrigen,x.diciembreOrigen]);
		totalFuncion=valorTotal([x.eneroOrigen,x.febreroOrigen,x.marzoOrigen,x.abrilOrigen,x.mayoOrigen,x.junioOrigen,x.julioOrigen,x.agostoOrigen,x.septiembreOrigen,x.octubreOrigen,x.noviembreOrigen,x.diciembreOrigen],acumulador);

		let resultOrigen = mesOrigen.filter((item,index)=>{
			return mesOrigen.indexOf(item) === index;
		})
							
		/*=====  End of Orígen  ======*/
					
		/*===============================
		=            Destino            =
		===============================*/
					
		let contadorDestino=0;
		let mitadBuscadaDestino=0;
		let valorDestino=0;
		let totalFuncionDestino=0;
		let acumulador2=0;				
					
		valorDestino=aumentarValor([x.eneroDestino,x.febreroDestino,x.marzoDestino,x.abrilDestino,x.mayoDestino,x.junioDestino,x.julioDestino,x.agostoDestino,x.septiembreDestino,x.octubreDestino,x.noviembreDestino,x.diciembreDestino],contadorDestino);
		let mesDestino=mesesAutenticados([x.eneroDestino,x.febreroDestino,x.marzoDestino,x.abrilDestino,x.mayoDestino,x.junioDestino,x.julioDestino,x.agostoDestino,x.septiembreDestino,x.octubreDestino,x.noviembreDestino,x.diciembreDestino]);
		totalFuncionDestino=valorTotal([x.eneroDestino,x.febreroDestino,x.marzoDestino,x.abrilDestino,x.mayoDestino,x.junioDestino,x.julioDestino,x.agostoDestino,x.septiembreDestino,x.octubreDestino,x.noviembreDestino,x.diciembreDestino],acumulador2);

		let resultDestino = mesDestino.filter((item,index)=>{
			return mesDestino.indexOf(item) === index;
		})				
		
		/*=====  End of Destino  ======*/
					
		let acumuladorFinal=0;
		let destuidor=0;
		let mitadBuscada=0;
		let idoFor=0;

		if (parseFloat(valorOrigen)>parseFloat(valorDestino)) {
			destuidor=parseFloat(valorOrigen);
			idoFor=valorOrigen;
		}else{
			destuidor=parseFloat(valorDestino);
			idoFor=valorDestino;
		}

		if (idoFor==1) {
			mitadBuscada=0;
		}else{
			mitadBuscada=parseFloat(destuidor)%2;
		}


		for (let i = 0; i<idoFor; i++) {

			var arrayMesOrigen = i<resultOrigen.length ? mesOrigen[i].split("__") : ["__","__"];
			var arrayMesDestino = i<resultDestino.length ? mesDestino[i].split("__") : ["__","__"];

			table.row.add([
				// i == 0 ? contadorXcontador : "<div style='display:none;'>"+contadorXcontador+"</div>",
				i == 0 ? x.actividadOrigen : "<div style='display:none;'>"+x.actividadOrigen+"</div>",
				i == 0 ? rotulo1 : "<div style='display:none;'>"+rotulo1+"</div>",
				i == 0 ? rotulo2 : "<div style='display:none;'>"+rotulo2+"</div>",
				i == 0 ? x.itemPreesupuestarioOrigen : "<div style='display:none;'>"+x.itemPreesupuestarioOrigen+"</div>",
				i == 0 ? x.idFinancierioOrigen : "<div style='display:none;'>"+x.idFinancierioOrigen+"</div>",
				identificadorSueldos==1 || identificadorSueldos==2 || identificadorSueldos==15 || identificadorSueldos==5 || identificadorSueldos==6 ? i == 0 ? '<button  style="padding:.5em;background:#004d40;color:white;width:100%;" id="resumidosOrigen__boton'+x.idOrigenDestino+'" identificadorPaginaReal="'+x.identificadorPaginaReal+'" data-toggle="modal" data-target="#modal__bonificaciones__meses__sueldos" enero__salariosOrigen="'+x.enero__salariosOrigen+'" febrero__salariosOrigen="'+x.febrero__salariosOrigen+'" marzo__salariosOrigen="'+x.marzo__salariosOrigen+'" abril__salariosOrigen="'+x.abril__salariosOrigen+'" mayo__salariosOrigen="'+x.mayo__salariosOrigen+'" junio__salariosOrigen="'+x.junio__salariosOrigen+'" julio__salariosOrigen="'+x.julio__salariosOrigen+'" agosto__salariosOrigen="'+x.agosto__salariosOrigen+'" septiembre__salariosOrigen="'+x.septiembre__salariosOrigen+'" octubre__salariosOrigen="'+x.octubre__salariosOrigen+'" noviembre__salariosOrigen="'+x.noviembre__salariosOrigen+'" diciembre__salariosOrigen="'+x.diciembre__salariosOrigen+'" enero__aporteOrigen="'+x.enero__aporteOrigen+'" febrero__aporteOrigen="'+x.febrero__aporteOrigen+'" marzo__aporteOrigen="'+x.marzo__aporteOrigen+'" abril__aporteOrigen="'+x.abril__aporteOrigen+'" mayo__aporteOrigen="'+x.mayo__aporteOrigen+'" junio__aporteOrigen="'+x.junio__aporteOrigen+'" julio__aporteOrigen="'+x.julio__aporteOrigen+'" agosto__aporteOrigen="'+x.agosto__aporteOrigen+'" septiembre__aporteOrigen="'+x.septiembre__aporteOrigen+'" octubre__aporteOrigen="'+x.octubre__aporteOrigen+'" noviembre__aporteOrigen="'+x.noviembre__aporteOrigen+'" diciembre__aporteOrigen="'+x.diciembre__aporteOrigen+'" enero__decimoCuartoOrigen="'+x.enero__decimoCuartoOrigen+'" febrero__decimoCuartoOrigen="'+x.febrero__decimoCuartoOrigen+'" marzo__decimoCuartoOrigen="'+x.marzo__decimoCuartoOrigen+'" abril__decimoCuartoOrigen="'+x.abril__decimoCuartoOrigen+'" mayo__decimoCuartoOrigen="'+x.mayo__decimoCuartoOrigen+'" junio__decimoCuartoOrigen="'+x.junio__decimoCuartoOrigen+'" julio__decimoCuartoOrigen="'+x.julio__decimoCuartoOrigen+'" agosto__decimoCuartoOrigen="'+x.agosto__decimoCuartoOrigen+'" septiembre__decimoCuartoOrigen="'+x.septiembre__decimoCuartoOrigen+'" octubre__decimoCuartoOrigen="'+x.octubre__decimoCuartoOrigen+'" noviembre__decimoCuartoOrigen="'+x.noviembre__decimoCuartoOrigen+'" diciembre__decimoCuartoOrigen="'+x.diciembre__decimoCuartoOrigen+'" enero__decimoTercerOrigen="'+x.enero__decimoTercerOrigen+'" febrero__decimoTercerOrigen="'+x.febrero__decimoTercerOrigen+'" marzo__decimoTercerOrigen="'+x.marzo__decimoTercerOrigen+'" abril__decimoTercerOrigen="'+x.abril__decimoTercerOrigen+'" mayo__decimoTercerOrigen="'+x.mayo__decimoTercerOrigen+'" junio__decimoTercerOrigen="'+x.junio__decimoTercerOrigen+'" julio__decimoTercerOrigen="'+x.julio__decimoTercerOrigen+'" agosto__decimoTercerOrigen="'+x.agosto__decimoTercerOrigen+'" septiembre__decimoTercerOrigen="'+x.septiembre__decimoTercerOrigen+'" octubre__decimoTercerOrigen="'+x.octubre__decimoTercerOrigen+'" noviembre__decimoTercerOrigen="'+x.noviembre__decimoTercerOrigen+'" diciembre__decimoTercerOrigen="'+x.diciembre__decimoTercerOrigen+'" enero__fondosReservaOrigen="'+x.enero__fondosReservaOrigen+'" febrero__fondosReservaOrigen="'+x.febrero__fondosReservaOrigen+'" marzo__fondosReservaOrigen="'+x.marzo__fondosReservaOrigen+'" abril__fondosReservaOrigen="'+x.abril__fondosReservaOrigen+'" mayo__fondosReservaOrigen="'+x.mayo__fondosReservaOrigen+'" junio__fondosReservaOrigen="'+x.junio__fondosReservaOrigen+'" julio__fondosReservaOrigen="'+x.julio__fondosReservaOrigen+'" agosto__fondosReservaOrigen="'+x.agosto__fondosReservaOrigen+'" septiembre__fondosReservaOrigen="'+x.septiembre__fondosReservaOrigen+'" octubre__fondosReservaOrigen="'+x.octubre__fondosReservaOrigen+'" noviembre__fondosReservaOrigen="'+x.noviembre__fondosReservaOrigen+'" diciembre__fondosReservaOrigen="'+x.diciembre__fondosReservaOrigen+'">VER</button>' : " " : arrayMesOrigen[0],
				identificadorSueldos==1 || identificadorSueldos==2 || identificadorSueldos==5 || identificadorSueldos==15 || identificadorSueldos==6 ? i == 0 ? '<button  style="padding:.5em;background:#004d40;color:white;width:100%;" id="resumidosOrigen__boton'+x.idOrigenDestino+'" identificadorPaginaReal="'+x.identificadorPaginaReal+'" data-toggle="modal" data-target="#modal__bonificaciones__meses__sueldos" enero__salariosOrigen="'+x.enero__salariosOrigen+'" febrero__salariosOrigen="'+x.febrero__salariosOrigen+'" marzo__salariosOrigen="'+x.marzo__salariosOrigen+'" abril__salariosOrigen="'+x.abril__salariosOrigen+'" mayo__salariosOrigen="'+x.mayo__salariosOrigen+'" junio__salariosOrigen="'+x.junio__salariosOrigen+'" julio__salariosOrigen="'+x.julio__salariosOrigen+'" agosto__salariosOrigen="'+x.agosto__salariosOrigen+'" septiembre__salariosOrigen="'+x.septiembre__salariosOrigen+'" octubre__salariosOrigen="'+x.octubre__salariosOrigen+'" noviembre__salariosOrigen="'+x.noviembre__salariosOrigen+'" diciembre__salariosOrigen="'+x.diciembre__salariosOrigen+'" enero__aporteOrigen="'+x.enero__aporteOrigen+'" febrero__aporteOrigen="'+x.febrero__aporteOrigen+'" marzo__aporteOrigen="'+x.marzo__aporteOrigen+'" abril__aporteOrigen="'+x.abril__aporteOrigen+'" mayo__aporteOrigen="'+x.mayo__aporteOrigen+'" junio__aporteOrigen="'+x.junio__aporteOrigen+'" julio__aporteOrigen="'+x.julio__aporteOrigen+'" agosto__aporteOrigen="'+x.agosto__aporteOrigen+'" septiembre__aporteOrigen="'+x.septiembre__aporteOrigen+'" octubre__aporteOrigen="'+x.octubre__aporteOrigen+'" noviembre__aporteOrigen="'+x.noviembre__aporteOrigen+'" diciembre__aporteOrigen="'+x.diciembre__aporteOrigen+'" enero__decimoCuartoOrigen="'+x.enero__decimoCuartoOrigen+'" febrero__decimoCuartoOrigen="'+x.febrero__decimoCuartoOrigen+'" marzo__decimoCuartoOrigen="'+x.marzo__decimoCuartoOrigen+'" abril__decimoCuartoOrigen="'+x.abril__decimoCuartoOrigen+'" mayo__decimoCuartoOrigen="'+x.mayo__decimoCuartoOrigen+'" junio__decimoCuartoOrigen="'+x.junio__decimoCuartoOrigen+'" julio__decimoCuartoOrigen="'+x.julio__decimoCuartoOrigen+'" agosto__decimoCuartoOrigen="'+x.agosto__decimoCuartoOrigen+'" septiembre__decimoCuartoOrigen="'+x.septiembre__decimoCuartoOrigen+'" octubre__decimoCuartoOrigen="'+x.octubre__decimoCuartoOrigen+'" noviembre__decimoCuartoOrigen="'+x.noviembre__decimoCuartoOrigen+'" diciembre__decimoCuartoOrigen="'+x.diciembre__decimoCuartoOrigen+'" enero__decimoTercerOrigen="'+x.enero__decimoTercerOrigen+'" febrero__decimoTercerOrigen="'+x.febrero__decimoTercerOrigen+'" marzo__decimoTercerOrigen="'+x.marzo__decimoTercerOrigen+'" abril__decimoTercerOrigen="'+x.abril__decimoTercerOrigen+'" mayo__decimoTercerOrigen="'+x.mayo__decimoTercerOrigen+'" junio__decimoTercerOrigen="'+x.junio__decimoTercerOrigen+'" julio__decimoTercerOrigen="'+x.julio__decimoTercerOrigen+'" agosto__decimoTercerOrigen="'+x.agosto__decimoTercerOrigen+'" septiembre__decimoTercerOrigen="'+x.septiembre__decimoTercerOrigen+'" octubre__decimoTercerOrigen="'+x.octubre__decimoTercerOrigen+'" noviembre__decimoTercerOrigen="'+x.noviembre__decimoTercerOrigen+'" diciembre__decimoTercerOrigen="'+x.diciembre__decimoTercerOrigen+'" enero__fondosReservaOrigen="'+x.enero__fondosReservaOrigen+'" febrero__fondosReservaOrigen="'+x.febrero__fondosReservaOrigen+'" marzo__fondosReservaOrigen="'+x.marzo__fondosReservaOrigen+'" abril__fondosReservaOrigen="'+x.abril__fondosReservaOrigen+'" mayo__fondosReservaOrigen="'+x.mayo__fondosReservaOrigen+'" junio__fondosReservaOrigen="'+x.junio__fondosReservaOrigen+'" julio__fondosReservaOrigen="'+x.julio__fondosReservaOrigen+'" agosto__fondosReservaOrigen="'+x.agosto__fondosReservaOrigen+'" septiembre__fondosReservaOrigen="'+x.septiembre__fondosReservaOrigen+'" octubre__fondosReservaOrigen="'+x.octubre__fondosReservaOrigen+'" noviembre__fondosReservaOrigen="'+x.noviembre__fondosReservaOrigen+'" diciembre__fondosReservaOrigen="'+x.diciembre__fondosReservaOrigen+'">VER</button>' : " " : arrayMesOrigen[1]=="__" ? "__" : parseFloat(arrayMesOrigen[1]).toFixed(2),
				i == 0 ? "<div style='font-weight:bold;'>"+parseFloat(totalFuncion).toFixed(2)+"</div>" : "<div style='display:none;'></div>",
				i == 0 ? x.actividadDestino : "<div style='display:none;'>"+x.actividadDestino+"</div>",
				i == 0 ? rotulo3 : "<div style='display:none;'>"+rotulo3+"</div>",
				i == 0 ? rotulo4 : "<div style='display:none;'>"+rotulo4+"</div>",
				i == 0 ? x.itemPreesupuestarioDestino : "<div style='display:none;'>"+x.itemPreesupuestarioDestino+"</div>",
				i == 0 ? x.idFinancierioDestino : "<div style='display:none;'>"+x.idFinancierioDestino+"</div>",
				identificadorSueldos==0 || identificadorSueldos==1 || identificadorSueldos==5 || identificadorSueldos==15 ? i == 0 ? '<button  style="padding:.5em;background:#004d40;color:white;width:100%;" id="resumidosDestino__boton'+x.idOrigenDestino+'" identificadorPaginaReal="'+x.identificadorPaginaReal+'" data-toggle="modal" data-target="#modal__bonificaciones__meses__sueldos" enero__salarios="'+x.enero__salarios+'" febrero__salarios="'+x.febrero__salarios+'" marzo__salarios="'+x.marzo__salarios+'" abril__salarios="'+x.abril__salarios+'" mayo__salarios="'+x.mayo__salarios+'" junio__salarios="'+x.junio__salarios+'" julio__salarios="'+x.julio__salarios+'" agosto__salarios="'+x.agosto__salarios+'" septiembre__salarios="'+x.septiembre__salarios+'" octubre__salarios="'+x.octubre__salarios+'" noviembre__salarios="'+x.noviembre__salarios+'" diciembre__salarios="'+x.diciembre__salarios+'" enero__aporte="'+x.enero__aporte+'" febrero__aporte="'+x.febrero__aporte+'" marzo__aporte="'+x.marzo__aporte+'" abril__aporte="'+x.abril__aporte+'" mayo__aporte="'+x.mayo__aporte+'" junio__aporte="'+x.junio__aporte+'" julio__aporte="'+x.julio__aporte+'" agosto__aporte="'+x.agosto__aporte+'" septiembre__aporte="'+x.septiembre__aporte+'" octubre__aporte="'+x.octubre__aporte+'" noviembre__aporte="'+x.noviembre__aporte+'" diciembre__aporte="'+x.diciembre__aporte+'" enero__decimoCuarto="'+x.enero__decimoCuarto+'" febrero__decimoCuarto="'+x.febrero__decimoCuarto+'" marzo__decimoCuarto="'+x.marzo__decimoCuarto+'" abril__decimoCuarto="'+x.abril__decimoCuarto+'" mayo__decimoCuarto="'+x.mayo__decimoCuarto+'" junio__decimoCuarto="'+x.junio__decimoCuarto+'" julio__decimoCuarto="'+x.julio__decimoCuarto+'" agosto__decimoCuarto="'+x.agosto__decimoCuarto+'" septiembre__decimoCuarto="'+x.septiembre__decimoCuarto+'" octubre__decimoCuarto="'+x.octubre__decimoCuarto+'" noviembre__decimoCuarto="'+x.noviembre__decimoCuarto+'" diciembre__decimoCuarto="'+x.diciembre__decimoCuarto+'" enero__decimoTercer="'+x.enero__decimoTercer+'" febrero__decimoTercer="'+x.febrero__decimoTercer+'" marzo__decimoTercer="'+x.marzo__decimoTercer+'" abril__decimoTercer="'+x.abril__decimoTercer+'" mayo__decimoTercer="'+x.mayo__decimoTercer+'" junio__decimoTercer="'+x.junio__decimoTercer+'" julio__decimoTercer="'+x.julio__decimoTercer+'" agosto__decimoTercer="'+x.agosto__decimoTercer+'" septiembre__decimoTercer="'+x.septiembre__decimoTercer+'" octubre__decimoTercer="'+x.octubre__decimoTercer+'" noviembre__decimoTercer="'+x.noviembre__decimoTercer+'" diciembre__decimoTercer="'+x.diciembre__decimoTercer+'" enero__fondosReserva="'+x.enero__fondosReserva+'" febrero__fondosReserva="'+x.febrero__fondosReserva+'" marzo__fondosReserva="'+x.marzo__fondosReserva+'" abril__fondosReserva="'+x.abril__fondosReserva+'" mayo__fondosReserva="'+x.mayo__fondosReserva+'" junio__fondosReserva="'+x.junio__fondosReserva+'" julio__fondosReserva="'+x.julio__fondosReserva+'" agosto__fondosReserva="'+x.agosto__fondosReserva+'" septiembre__fondosReserva="'+x.septiembre__fondosReserva+'" octubre__fondosReserva="'+x.octubre__fondosReserva+'" noviembre__fondosReserva="'+x.noviembre__fondosReserva+'" diciembre__fondosReserva="'+x.diciembre__fondosReserva+'">VER</button>' : " " : arrayMesDestino[0],
				identificadorSueldos==0 || identificadorSueldos==1 || identificadorSueldos==5 || identificadorSueldos==15 ? i == 0 ? '<button  style="padding:.5em;background:#004d40;color:white;width:100%;" id="resumidosDestino__boton'+x.idOrigenDestino+'" identificadorPaginaReal="'+x.identificadorPaginaReal+'" data-toggle="modal" data-target="#modal__bonificaciones__meses__sueldos" enero__salarios="'+x.enero__salarios+'" febrero__salarios="'+x.febrero__salarios+'" marzo__salarios="'+x.marzo__salarios+'" abril__salarios="'+x.abril__salarios+'" mayo__salarios="'+x.mayo__salarios+'" junio__salarios="'+x.junio__salarios+'" julio__salarios="'+x.julio__salarios+'" agosto__salarios="'+x.agosto__salarios+'" septiembre__salarios="'+x.septiembre__salarios+'" octubre__salarios="'+x.octubre__salarios+'" noviembre__salarios="'+x.noviembre__salarios+'" diciembre__salarios="'+x.diciembre__salarios+'" enero__aporte="'+x.enero__aporte+'" febrero__aporte="'+x.febrero__aporte+'" marzo__aporte="'+x.marzo__aporte+'" abril__aporte="'+x.abril__aporte+'" mayo__aporte="'+x.mayo__aporte+'" junio__aporte="'+x.junio__aporte+'" julio__aporte="'+x.julio__aporte+'" agosto__aporte="'+x.agosto__aporte+'" septiembre__aporte="'+x.septiembre__aporte+'" octubre__aporte="'+x.octubre__aporte+'" noviembre__aporte="'+x.noviembre__aporte+'" diciembre__aporte="'+x.diciembre__aporte+'" enero__decimoCuarto="'+x.enero__decimoCuarto+'" febrero__decimoCuarto="'+x.febrero__decimoCuarto+'" marzo__decimoCuarto="'+x.marzo__decimoCuarto+'" abril__decimoCuarto="'+x.abril__decimoCuarto+'" mayo__decimoCuarto="'+x.mayo__decimoCuarto+'" junio__decimoCuarto="'+x.junio__decimoCuarto+'" julio__decimoCuarto="'+x.julio__decimoCuarto+'" agosto__decimoCuarto="'+x.agosto__decimoCuarto+'" septiembre__decimoCuarto="'+x.septiembre__decimoCuarto+'" octubre__decimoCuarto="'+x.octubre__decimoCuarto+'" noviembre__decimoCuarto="'+x.noviembre__decimoCuarto+'" diciembre__decimoCuarto="'+x.diciembre__decimoCuarto+'" enero__decimoTercer="'+x.enero__decimoTercer+'" febrero__decimoTercer="'+x.febrero__decimoTercer+'" marzo__decimoTercer="'+x.marzo__decimoTercer+'" abril__decimoTercer="'+x.abril__decimoTercer+'" mayo__decimoTercer="'+x.mayo__decimoTercer+'" junio__decimoTercer="'+x.junio__decimoTercer+'" julio__decimoTercer="'+x.julio__decimoTercer+'" agosto__decimoTercer="'+x.agosto__decimoTercer+'" septiembre__decimoTercer="'+x.septiembre__decimoTercer+'" octubre__decimoTercer="'+x.octubre__decimoTercer+'" noviembre__decimoTercer="'+x.noviembre__decimoTercer+'" diciembre__decimoTercer="'+x.diciembre__decimoTercer+'" enero__fondosReserva="'+x.enero__fondosReserva+'" febrero__fondosReserva="'+x.febrero__fondosReserva+'" marzo__fondosReserva="'+x.marzo__fondosReserva+'" abril__fondosReserva="'+x.abril__fondosReserva+'" mayo__fondosReserva="'+x.mayo__fondosReserva+'" junio__fondosReserva="'+x.junio__fondosReserva+'" julio__fondosReserva="'+x.julio__fondosReserva+'" agosto__fondosReserva="'+x.agosto__fondosReserva+'" septiembre__fondosReserva="'+x.septiembre__fondosReserva+'" octubre__fondosReserva="'+x.octubre__fondosReserva+'" noviembre__fondosReserva="'+x.noviembre__fondosReserva+'" diciembre__fondosReserva="'+x.diciembre__fondosReserva+'">VER</button>' : " " : arrayMesDestino[1]=="__" ? "<div style='display:none;'>"+parseFloat(arrayMesDestino[1]).toFixed(2)+"</div>" : parseFloat(arrayMesDestino[1]).toFixed(2),
				i == 0 ? "<div style='font-weight:bold;'>"+parseFloat(totalFuncionDestino).toFixed(2)+"</div>" : "<div style='display:none;'></div>",
				i == 0 ? '<nav id="colorNav"><ul><li class="green"> <a href="#" class="fa fa-windows" style="text-align: center!important; display: flex; justify-content: center!important; padding: .5em;"><div style="position: relative;left: -7px; font-weight: bold; color: white; width: 100%;">+</div></a><ul class="vertice__seguimiento__top"><li id="li__eliminar'+x.idOrigenDestino+'"><button class="eliminacion__eliminar" style="padding:.5em;background:red;color:white; width:100%;" id="eliminar'+x.idOrigenDestino+'" name="eliminar'+x.idOrigenDestino+'" idContador="'+x.idOrigenDestino+'"><i class="fa fa-trash" aria-hidden="true"></i></button></li><li><button  style="padding:.5em;background:#004d40;color:white;width:100%;" id="matrizOrigen'+x.idOrigenDestino+'" name="matrizOrigen'+x.idOrigenDestino+'" idContador="'+x.idOrigenDestino+'" data-toggle="modal" data-target="#modalOrigenDestinoMatricez">Mátriz Orígen</button></li><li id="li_des__'+x.idOrigenDestino+'"><button style="padding:.5em;background:#424242;color:white;width:100%;" id="matrizDestino'+x.idOrigenDestino+'" name="matrizDestino'+x.idOrigenDestino+'" idContador="'+x.idOrigenDestino+'" data-toggle="modal" data-target="#modalOrigenDestinoMatricez">Mátriz Destino</button></li></ul></li></ul></nav>' : "<div></div>",
			]).draw(false);


			$("#resumidosOrigen__boton"+x.idOrigenDestino).click(function(e){

				let identificadorPaginaRealDos=$(this).attr('identificadorPaginaReal');


				if(identificadorPaginaRealDos=="sueldos" || identificadorPaginaRealDos=="sueldos__item" || identificadorPaginaRealDos=="desvinculacion"){

					$(".oculto__en__des").show();
					$(".nombre__1").text('SUELDOS');
					$(".nombre__2").text('APORTE PATRONAL');
					$(".nombre__4").text('DÉCIMO TERCER SUELDO');
					$(".nombre__3").text('DÉCIMO CUARTO SUELDO');
					$(".nombre__5").text('FONDOS DE RESERVA');

				}else{

					$(".oculto__en__des").hide();
					$(".nombre__1").text('COMPENSACIÓN POR DESHAUCIO');
					$(".nombre__2").text('DESPIDO');
					$(".nombre__3").text('COMPENSACIÓN POR VACACIONES NO GOZADAS');
					$(".nombre__4").text('RENUNCIA VOLUNTARIA');

				}

				$("#eneroSueldos__b").text(parseFloat($(this).attr('enero__salariosOrigen')).toFixed(2));
				$("#febreroSueldos__b").text(parseFloat($(this).attr('febrero__salariosOrigen')).toFixed(2));
				$("#marzoSueldos__b").text(parseFloat($(this).attr('marzo__salariosOrigen')).toFixed(2));
				$("#abrilSueldos__b").text(parseFloat($(this).attr('abril__salariosOrigen')).toFixed(2));
				$("#mayoSueldos__b").text(parseFloat($(this).attr('mayo__salariosOrigen')).toFixed(2));
				$("#junioSueldos__b").text(parseFloat($(this).attr('junio__salariosOrigen')).toFixed(2));
				$("#julioSueldos__b").text(parseFloat($(this).attr('julio__salariosOrigen')).toFixed(2));
				$("#agostoSueldos__b").text(parseFloat($(this).attr('agosto__salariosOrigen')).toFixed(2));
				$("#septiembreSueldos__b").text(parseFloat($(this).attr('septiembre__salariosOrigen')).toFixed(2));
				$("#octubreSueldos__b").text(parseFloat($(this).attr('octubre__salariosOrigen')).toFixed(2));
				$("#noviembreSueldos__b").text(parseFloat($(this).attr('noviembre__salariosOrigen')).toFixed(2));
				$("#diciembreSueldos__b").text(parseFloat($(this).attr('diciembre__salariosOrigen')).toFixed(2));

				$("#eneroAporte__b").text(parseFloat($(this).attr('enero__aporteOrigen')).toFixed(2));
				$("#febreroAporte__b").text(parseFloat($(this).attr('febrero__aporteOrigen')).toFixed(2));
				$("#marzoAporte__b").text(parseFloat($(this).attr('marzo__aporteOrigen')).toFixed(2));
				$("#abrilAporte__b").text(parseFloat($(this).attr('abril__aporteOrigen')).toFixed(2));
				$("#mayoAporte__b").text(parseFloat($(this).attr('mayo__aporteOrigen')).toFixed(2));
				$("#junioAporte__b").text(parseFloat($(this).attr('junio__aporteOrigen')).toFixed(2));
				$("#julioAporte__b").text(parseFloat($(this).attr('julio__aporteOrigen')).toFixed(2));
				$("#agostoAporte__b").text(parseFloat($(this).attr('agosto__aporteOrigen')).toFixed(2));
				$("#septiembreAporte__b").text(parseFloat($(this).attr('septiembre__aporteOrigen')).toFixed(2));
				$("#octubreAporte__b").text(parseFloat($(this).attr('octubre__aporteOrigen')).toFixed(2));
				$("#noviembreAporte__b").text(parseFloat($(this).attr('noviembre__aporteOrigen')).toFixed(2));
				$("#diciembreAporte__b").text(parseFloat($(this).attr('diciembre__aporteOrigen')).toFixed(2));


				$("#eneroTercero__b").text(parseFloat($(this).attr('enero__decimoCuartoOrigen')).toFixed(2));
				$("#febreroTercero__b").text(parseFloat($(this).attr('febrero__decimoCuartoOrigen')).toFixed(2));
				$("#marzoTercero__b").text(parseFloat($(this).attr('marzo__decimoCuartoOrigen')).toFixed(2));
				$("#abrilTercero__b").text(parseFloat($(this).attr('abril__decimoCuartoOrigen')).toFixed(2));
				$("#mayoTercero__b").text(parseFloat($(this).attr('mayo__decimoCuartoOrigen')).toFixed(2));
				$("#junioTercero__b").text(parseFloat($(this).attr('junio__decimoCuartoOrigen')).toFixed(2));
				$("#julioTercero__b").text(parseFloat($(this).attr('julio__decimoCuartoOrigen')).toFixed(2));
				$("#agostoTercero__b").text(parseFloat($(this).attr('agosto__decimoCuartoOrigen')).toFixed(2));
				$("#septiembreTercero__b").text(parseFloat($(this).attr('septiembre__decimoCuartoOrigen')).toFixed(2));
				$("#octubreTercero__b").text(parseFloat($(this).attr('octubre__decimoCuartoOrigen')).toFixed(2));
				$("#noviembreTercero__b").text(parseFloat($(this).attr('noviembre__decimoCuartoOrigen')).toFixed(2));
				$("#diciembreTercero__b").text(parseFloat($(this).attr('diciembre__decimoCuartoOrigen')).toFixed(2));

				$("#eneroCuarto__b").text(parseFloat($(this).attr('enero__decimoTercerOrigen')).toFixed(2));
				$("#febreroCuarto__b").text(parseFloat($(this).attr('febrero__decimoTercerOrigen')).toFixed(2));
				$("#marzoCuarto__b").text(parseFloat($(this).attr('marzo__decimoTercerOrigen')).toFixed(2));
				$("#abrilCuarto__b").text(parseFloat($(this).attr('abril__decimoTercerOrigen')).toFixed(2));
				$("#mayoCuarto__b").text(parseFloat($(this).attr('mayo__decimoTercerOrigen')).toFixed(2));
				$("#junioCuarto__b").text(parseFloat($(this).attr('junio__decimoTercerOrigen')).toFixed(2));
				$("#julioCuarto__b").text(parseFloat($(this).attr('julio__decimoTercerOrigen')).toFixed(2));
				$("#agostoCuarto__b").text(parseFloat($(this).attr('agosto__decimoTercerOrigen')).toFixed(2));
				$("#septiembreCuarto__b").text(parseFloat($(this).attr('septiembre__decimoTercerOrigen')).toFixed(2));
				$("#octubreCuarto__b").text(parseFloat($(this).attr('octubre__decimoTercerOrigen')).toFixed(2));
				$("#noviembreCuarto__b").text(parseFloat($(this).attr('noviembre__decimoTercerOrigen')).toFixed(2));
				$("#diciembreCuarto__b").text(parseFloat($(this).attr('diciembre__decimoTercerOrigen')).toFixed(2));
				
				$("#eneroFondosReserva__b").text(parseFloat($(this).attr('enero__fondosReservaOrigen')).toFixed(2));
				$("#febreroFondosReserva__b").text(parseFloat($(this).attr('febrero__fondosReservaOrigen')).toFixed(2));
				$("#marzoFondosReserva__b").text(parseFloat($(this).attr('marzo__fondosReservaOrigen')).toFixed(2));
				$("#abrilFondosReserva__b").text(parseFloat($(this).attr('abril__fondosReservaOrigen')).toFixed(2));
				$("#mayoFondosReserva__b").text(parseFloat($(this).attr('mayo__fondosReservaOrigen')).toFixed(2));
				$("#junioFondosReserva__b").text(parseFloat($(this).attr('junio__fondosReservaOrigen')).toFixed(2));
				$("#julioFondosReserva__b").text(parseFloat($(this).attr('julio__fondosReservaOrigen')).toFixed(2));
				$("#agostoFondosReserva__b").text(parseFloat($(this).attr('agosto__fondosReservaOrigen')).toFixed(2));
				$("#septiembreFondosReserva__b").text(parseFloat($(this).attr('septiembre__fondosReservaOrigen')).toFixed(2));
				$("#octubreFondosReserva__b").text(parseFloat($(this).attr('octubre__fondosReservaOrigen')).toFixed(2));
				$("#noviembreFondosReserva__b").text(parseFloat($(this).attr('noviembre__fondosReservaOrigen')).toFixed(2));
				$("#diciembreFondosReserva__b").text(parseFloat($(this).attr('diciembre__fondosReservaOrigen')).toFixed(2));

			});

			$("#resumidosDestino__boton"+x.idOrigenDestino).click(function(e){


				let identificadorPaginaRealDos=$(this).attr('identificadorPaginaReal');

				if(identificadorPaginaRealDos=="sueldos" || identificadorPaginaRealDos=="sueldos__item"){

					$(".oculto__en__des").show();
					$(".nombre__1").text('SUELDOS');
					$(".nombre__2").text('APORTE PATRONAL');
					$(".nombre__3").text('DÉCIMO TERCER SUELDO');
					$(".nombre__4").text('DÉCIMO CUARTO SUELDO');
					$(".nombre__5").text('FONDOS DE RESERVA');

				}else{

					$(".oculto__en__des").hide();
					$(".nombre__1").text('COMPENSACIÓN POR DESHAUCIO');
					$(".nombre__2").text('DESPIDO');
					$(".nombre__3").text('COMPENSACIÓN POR VACACIONES NO GOZADAS');
					$(".nombre__4").text('RENUNCIA VOLUNTARIA');

				}


				if ($(this).attr('enero__salarios')!=null && $(this).attr('enero__salarios')!="" && $(this).attr('enero__salarios')!=" " && $(this).attr('enero__salarios')!="null") {

					$("#eneroSueldos__b").text(parseFloat($(this).attr('enero__salarios')).toFixed(2));
					$("#febreroSueldos__b").text(parseFloat($(this).attr('febrero__salarios')).toFixed(2));
					$("#marzoSueldos__b").text(parseFloat($(this).attr('marzo__salarios')).toFixed(2));
					$("#abrilSueldos__b").text(parseFloat($(this).attr('abril__salarios')).toFixed(2));
					$("#mayoSueldos__b").text(parseFloat($(this).attr('mayo__salarios')).toFixed(2));
					$("#junioSueldos__b").text(parseFloat($(this).attr('junio__salarios')).toFixed(2));
					$("#julioSueldos__b").text(parseFloat($(this).attr('julio__salarios')).toFixed(2));
					$("#agostoSueldos__b").text(parseFloat($(this).attr('agosto__salarios')).toFixed(2));
					$("#septiembreSueldos__b").text(parseFloat($(this).attr('septiembre__salarios')).toFixed(2));
					$("#octubreSueldos__b").text(parseFloat($(this).attr('octubre__salarios')).toFixed(2));
					$("#noviembreSueldos__b").text(parseFloat($(this).attr('noviembre__salarios')).toFixed(2));
					$("#diciembreSueldos__b").text(parseFloat($(this).attr('diciembre__salarios')).toFixed(2));
				

				}else{

					$("#eneroSueldos__b").text(0);
					$("#febreroSueldos__b").text(0);
					$("#marzoSueldos__b").text(0);
					$("#abrilSueldos__b").text(0);
					$("#mayoSueldos__b").text(0);
					$("#junioSueldos__b").text(0);
					$("#julioSueldos__b").text(0);
					$("#agostoSueldos__b").text(0);
					$("#septiembreSueldos__b").text(0);
					$("#octubreSueldos__b").text(0);
					$("#noviembreSueldos__b").text(0);
					$("#diciembreSueldos__b").text(0);

				}


				if ($(this).attr('enero__aporte')!=null && $(this).attr('enero__aporte')!="" && $(this).attr('enero__aporte')!=" " && $(this).attr('enero__aporte')!="null") {

					$("#eneroAporte__b").text(parseFloat($(this).attr('enero__aporte')).toFixed(2));
					$("#febreroAporte__b").text(parseFloat($(this).attr('febrero__aporte')).toFixed(2));
					$("#marzoAporte__b").text(parseFloat($(this).attr('marzo__aporte')).toFixed(2));
					$("#abrilAporte__b").text(parseFloat($(this).attr('abril__aporte')).toFixed(2));
					$("#mayoAporte__b").text(parseFloat($(this).attr('mayo__aporte')).toFixed(2));
					$("#junioAporte__b").text(parseFloat($(this).attr('junio__aporte')).toFixed(2));
					$("#julioAporte__b").text(parseFloat($(this).attr('julio__aporte')).toFixed(2));
					$("#agostoAporte__b").text(parseFloat($(this).attr('agosto__aporte')).toFixed(2));
					$("#septiembreAporte__b").text(parseFloat($(this).attr('septiembre__aporte')).toFixed(2));
					$("#octubreAporte__b").text(parseFloat($(this).attr('octubre__aporte')).toFixed(2));
					$("#noviembreAporte__b").text(parseFloat($(this).attr('noviembre__aporte')).toFixed(2));
					$("#diciembreAporte__b").text(parseFloat($(this).attr('diciembre__aporte')).toFixed(2));


				}else{

					$("#eneroAporte__b").text(0);
					$("#febreroAporte__b").text(0);
					$("#marzoAporte__b").text(0);
					$("#abrilAporte__b").text(0);
					$("#mayoAporte__b").text(0);
					$("#junioAporte__b").text(0);
					$("#julioAporte__b").text(0);
					$("#agostoAporte__b").text(0);
					$("#septiembreAporte__b").text(0);
					$("#octubreAporte__b").text(0);
					$("#noviembreAporte__b").text(0);
					$("#diciembreAporte__b").text(0);

				}

				if ($(this).attr('enero__decimoTercer')!=null && $(this).attr('enero__decimoTercer')!="" && $(this).attr('enero__decimoTercer')!=" " && $(this).attr('enero__decimoTercer')!="null") {

					$("#eneroTercero__b").text(parseFloat($(this).attr('enero__decimoTercer')).toFixed(2));
					$("#febreroTercero__b").text(parseFloat($(this).attr('febrero__decimoTercer')).toFixed(2));
					$("#marzoTercero__b").text(parseFloat($(this).attr('marzo__decimoTercer')).toFixed(2));
					$("#abrilTercero__b").text(parseFloat($(this).attr('abril__decimoTercer')).toFixed(2));
					$("#mayoTercero__b").text(parseFloat($(this).attr('mayo__decimoTercer')).toFixed(2));
					$("#junioTercero__b").text(parseFloat($(this).attr('junio__decimoTercer')).toFixed(2));
					$("#julioTercero__b").text(parseFloat($(this).attr('julio__decimoTercer')).toFixed(2));
					$("#agostoTercero__b").text(parseFloat($(this).attr('agosto__decimoTercer')).toFixed(2));
					$("#septiembreTercero__b").text(parseFloat($(this).attr('septiembre__decimoTercer')).toFixed(2));
					$("#octubreTercero__b").text(parseFloat($(this).attr('octubre__decimoTercer')).toFixed(2));
					$("#noviembreTercero__b").text(parseFloat($(this).attr('noviembre__decimoTercer')).toFixed(2));
					$("#diciembreTercero__b").text(parseFloat($(this).attr('diciembre__decimoTercer')).toFixed(2));

				}else{

					$("#eneroTercero__b").text(0);
					$("#febreroTercero__b").text(0);
					$("#marzoTercero__b").text(0);
					$("#abrilTercero__b").text(0);
					$("#mayoTercero__b").text(0);
					$("#junioTercero__b").text(0);
					$("#julioTercero__b").text(0);
					$("#agostoTercero__b").text(0);
					$("#septiembreTercero__b").text(0);
					$("#octubreTercero__b").text(0);
					$("#noviembreTercero__b").text(0);
					$("#diciembreTercero__b").text(0);

				}


				if ($(this).attr('enero__decimoCuarto')!=null && $(this).attr('enero__decimoCuarto')!="" && $(this).attr('enero__decimoCuarto')!=" " && $(this).attr('enero__decimoCuarto')!="null") {


					$("#eneroCuarto__b").text(parseFloat($(this).attr('enero__decimoCuarto')).toFixed(2));
					$("#febreroCuarto__b").text(parseFloat($(this).attr('febrero__decimoCuarto')).toFixed(2));
					$("#marzoCuarto__b").text(parseFloat($(this).attr('marzo__decimoCuarto')).toFixed(2));
					$("#abrilCuarto__b").text(parseFloat($(this).attr('abril__decimoCuarto')).toFixed(2));
					$("#mayoCuarto__b").text(parseFloat($(this).attr('mayo__decimoCuarto')).toFixed(2));
					$("#junioCuarto__b").text(parseFloat($(this).attr('junio__decimoCuarto')).toFixed(2));
					$("#julioCuarto__b").text(parseFloat($(this).attr('julio__decimoCuarto')).toFixed(2));
					$("#agostoCuarto__b").text(parseFloat($(this).attr('agosto__decimoCuarto')).toFixed(2));
					$("#septiembreCuarto__b").text(parseFloat($(this).attr('septiembre__decimoCuarto')).toFixed(2));
					$("#octubreCuarto__b").text(parseFloat($(this).attr('octubre__decimoCuarto')).toFixed(2));
					$("#noviembreCuarto__b").text(parseFloat($(this).attr('noviembre__decimoCuarto')).toFixed(2));
					$("#diciembreCuarto__b").text(parseFloat($(this).attr('diciembre__decimoCuarto')).toFixed(2));


				}else{


					$("#eneroCuarto__b").text(0);
					$("#febreroCuarto__b").text(0);
					$("#marzoCuarto__b").text(0);
					$("#abrilCuarto__b").text(0);
					$("#mayoCuarto__b").text(0);
					$("#junioCuarto__b").text(0);
					$("#julioCuarto__b").text(0);
					$("#agostoCuarto__b").text(0);
					$("#septiembreCuarto__b").text(0);
					$("#octubreCuarto__b").text(0);
					$("#noviembreCuarto__b").text(0);
					$("#diciembreCuarto__b").text(0);


				}


				$("#eneroFondosReserva__b").text(parseFloat($(this).attr('enero__fondosReserva')).toFixed(2));
				$("#febreroFondosReserva__b").text(parseFloat($(this).attr('febrero__fondosReserva')).toFixed(2));
				$("#marzoFondosReserva__b").text(parseFloat($(this).attr('marzo__fondosReserva')).toFixed(2));
				$("#abrilFondosReserva__b").text(parseFloat($(this).attr('abril__fondosReserva')).toFixed(2));
				$("#mayoFondosReserva__b").text(parseFloat($(this).attr('mayo__fondosReserva')).toFixed(2));
				$("#junioFondosReserva__b").text(parseFloat($(this).attr('junio__fondosReserva')).toFixed(2));
				$("#julioFondosReserva__b").text(parseFloat($(this).attr('julio__fondosReserva')).toFixed(2));
				$("#agostoFondosReserva__b").text(parseFloat($(this).attr('agosto__fondosReserva')).toFixed(2));
				$("#septiembreFondosReserva__b").text(parseFloat($(this).attr('septiembre__fondosReserva')).toFixed(2));
				$("#octubreFondosReserva__b").text(parseFloat($(this).attr('octubre__fondosReserva')).toFixed(2));
				$("#noviembreFondosReserva__b").text(parseFloat($(this).attr('noviembre__fondosReserva')).toFixed(2));
				$("#diciembreFondosReserva__b").text(parseFloat($(this).attr('diciembre__fondosReserva')).toFixed(2));

			});

		}

		if (x.identificadorPaginaReal=="desvinculacion") {
			$("#li_des__"+x.idOrigenDestino).remove();
		}


		if ($("#identificadorModificaciones").val()=="1") {
			$("#li__eliminar"+x.idOrigenDestino).remove();
		}

		/*===============================================
		=            Mátriz Orígen y destino            =
		===============================================*/

		if (x.identificadorPaginaReal=="desvinculacion" || x.identificadorPaginaReal=="sueldos__item" || x.identificadorPaginaReal=="sueldos") {

			matrizOrigenDestino($('#matrizOrigen'+x.idOrigenDestino),$(".body__origen__destino__inicial"),x.idOrigenActividad,x.idMatrizOrigen,[x.actividadOrigen,x.idFinancierioOrigen,x.idSueldosOrigen],x.identificadorPaginaReal);

			matrizOrigenDestino($('#matrizDestino'+x.idOrigenDestino),$(".body__origen__destino__inicial"),x.idDestinoActividad,x.idMatrizDestino,[x.actividadDestino,x.idFinancierioDestino,x.idSueldosDestino],x.identificadorPaginaReal);

		}else if(x.identificadorPaginaReal=="honorarios" || x.identificadorPaginaReal=="honorarios__item"){

			matrizOrigenDestino($('#matrizOrigen'+x.idOrigenDestino),$(".body__origen__destino__inicial"),x.idOrigenActividad,x.idMatrizOrigen,[x.actividadOrigen,x.idFinancierioOrigen,x.idHonorariosOrigen],x.identificadorPaginaReal);

			matrizOrigenDestino($('#matrizDestino'+x.idOrigenDestino),$(".body__origen__destino__inicial"),x.idDestinoActividad,x.idMatrizDestino,[x.actividadDestino,x.idFinancierioDestino,x.idHonorariosDestino],x.identificadorPaginaReal);

		}else{

			if (x.idActividadesOrigen=="3" || x.idActividadesOrigen=="5" || x.idActividadesOrigen=="6" || x.idActividadesOrigen=="7") {

				matrizOrigenDestino($('#matrizOrigen'+x.idOrigenDestino),$(".body__origen__destino__inicial"),x.idOrigenActividad,x.idEventoOrigen,[x.actividadOrigen,x.idFinancierioOrigen],x.identificadorPaginaReal);


			}else{

				matrizOrigenDestino($('#matrizOrigen'+x.idOrigenDestino),$(".body__origen__destino__inicial"),x.idOrigenActividad,x.idMatrizOrigen,[x.actividadOrigen,x.idFinancierioOrigen],x.identificadorPaginaReal);

	
			}



			if (x.idActividadesDestino=="3" || x.idActividadesDestino=="5" || x.idActividadesDestino=="6" || x.idActividadesDestino=="7") {

				matrizOrigenDestino($('#matrizDestino'+x.idOrigenDestino),$(".body__origen__destino__inicial"),x.idDestinoActividad,x.idEventoDestino,[x.actividadDestino,x.idFinancierioDestino],x.identificadorPaginaReal);


			}else{

				matrizOrigenDestino($('#matrizDestino'+x.idOrigenDestino),$(".body__origen__destino__inicial"),x.idDestinoActividad,x.idMatrizDestino,[x.actividadDestino,x.idFinancierioDestino],x.identificadorPaginaReal);
	
			}

		}
					
		
					
		/*=====  End of Mátriz Orígen y destino  ======*/
					
		/*================================
		=            Eliminar            =
		================================*/
		$("#eliminar"+x.idOrigenDestino).click(function(e){
			let paqueteDeDatos2 = new FormData();
			let idEnvio=$(this).attr('idContador');
			paqueteDeDatos2.append("tipo","eliminar__modificacion__linea");
			paqueteDeDatos2.append("idEnvio",idEnvio);
			$.ajax({
				type:"POST",
				url:"modelosBd/inserta/eliminaAcciones.md.php",
				contentType: false,
				data:paqueteDeDatos2,
				processData: false,
				cache: false, 
				success:function(response){
					alertify.set("notifier","position", "top-center");
					alertify.notify("Eliminación realizada correctamente", "success", 5, function(){});
					window.setTimeout(function(){ 
						location.reload();
					} ,1000); 
				},
				error:function(){
				}
			});	
		});
		/*=====  End of Eliminar  ======*/
					
	}

}


function aumentarValor(parametro1,parametro2){

	for (let i =0; i < parametro1.length; i++) {

		if (parametro1[i]>0) {
			parametro2++;
		}

	}

	if (parametro2==0) {
		parametro2=1;
	}

	return parametro2;

}

function valorTotal(parametro1,parametro2){

	for (let i =0; i < parametro1.length; i++) {

		parametro2=parseFloat(parametro1[i])+parseFloat(parametro2);

	}

	return parametro2;

}


function mesesAutenticados(parametro1){

	let array=new Array();

	for (let i =0; i < parametro1.length; i++) {

		if (parseFloat(parametro1[0])>0) {
			array.push('Enero'+"__"+parametro1[0]);
		}

		if (parseFloat(parametro1[1])>0) {
			array.push('Febrero'+"__"+parametro1[1]);
		}

		if (parseFloat(parametro1[2])>0) {
			array.push('Marzo'+"__"+parametro1[2]);
		}

		if (parseFloat(parametro1[3])>0) {
			array.push('Abril'+"__"+parametro1[3]);
		}

		if (parseFloat(parametro1[4])>0) {
			array.push('Mayo'+"__"+parametro1[4]);
		}

		if (parseFloat(parametro1[5])>0) {
			array.push('Junio'+"__"+parametro1[5]);
		}

		if (parseFloat(parametro1[6])>0) {
			array.push('Julio'+"__"+parametro1[6]);
		}

		if (parseFloat(parametro1[7])>0) {
			array.push('Agosto'+"__"+parametro1[7]);
		}

		if (parseFloat(parametro1[8])>0) {
			array.push('Septiembre'+"__"+parametro1[8]);
		}

		if (parseFloat(parametro1[9])>0) {
			array.push('Octubre'+"__"+parametro1[9]);
		}

		if (parseFloat(parametro1[10])>0) {
			array.push('Noviembre'+"__"+parametro1[10]);
		}

		if (parseFloat(parametro1[11])>0) {
			array.push('Diciembre'+"__"+parametro1[11]);
		}

	}


	return array;


}

var mostrarOcultarFilas=function(boton,arreglo,table){

$(boton).on('click', function (e){

	for(i=0;i<arreglo.length;i++){

		var column = table.column(arreglo[i]);

		if(column.visible()==false){
			$(this).html(" ");
			$(this).append('ENCOGER <i class="fa fa-eye-slash" aria-hidden="true"></i>');
		}else{
			$(this).html(" ");
			$(this).append('DESPLEGAR <i class="fa fa-eye" aria-hidden="true"></i>');
		}
		// Toggle the visibility
		column.visible(!column.visible());

	}

});

}


var matrizActividadesAdminsitrativas=function(idFinanciero,cuerpo){

	let paqueteDeDatos = new FormData();
	paqueteDeDatos.append("tipo","actividades__administrativas");
	paqueteDeDatos.append("idProgramacionFinanciera",idFinanciero);

	$.ajax({

		type:"POST",
		url:"modelosBd/POA_MODIFICACIONES/seleccionaModificaciones.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

			let elementos=JSON.parse(response);
			let informacioInicial=elementos['informacioInicial'];

			$(cuerpo).append("<div class='div__scroll'><table id='tablaGeneral'><thead><tr><th>Nombre Ítem</th><th>Justificación Actividad</th><th>Cantidad bien</th><th>Enero</th><th>Febrero</th><th>Marzo</th><th>Abril</th><th>Mayo</th><th>Junio</th><th>Julio</th><th>Agosto</th><th>Septiembre</th><th>Octubre</th><th>Noviembre</th><th>Diciembre</th><th>Total</th></tr></thead></table></div>");

			var table = datatabletsConfiguration($("#tablaGeneral"),false);

			for(x of informacioInicial){

				table.row.add([

					x.nombreItem,
					x.justificacionActividad,
					x.cantidadBien,
					x.enero,
					x.febrero,
					x.marzo,
					x.abril,
					x.mayo,
					x.junio,
					x.julio,
					x.agosto,
					x.septiembre,
					x.octubre,
					x.noviembre,
					x.diciembre,
					x.totalTotales

				]).draw(false);

			}


		},
		error:function(){

		}

	});	

}

var matrizActividadesDeportivas=function(idFinanciero,cuerpo){

	let paqueteDeDatos = new FormData();
	paqueteDeDatos.append("tipo","actividades__deportivas");
	paqueteDeDatos.append("idProgramacionFinanciera",idFinanciero);

	$.ajax({

		type:"POST",
		url:"modelosBd/POA_MODIFICACIONES/seleccionaModificaciones.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

			let elementos=JSON.parse(response);
			let informacioInicial=elementos['informacioInicial'];

			$(cuerpo).append("<div class='div__scroll'><table id='tablaGeneral'><thead><tr><th>Nombre Ítem</th><th>Evento</th><th>Deporte</th><th>Provincia</th><th>País</th><th>Alcance</th><th>Fecha inicio</th><th>Fecha fin</th><th>Género</th><th>Categoría</th><th>Número<br>Entrenadores</th><th>Número<br>Atletas</th><th>Total</th><th>Mujeres<br>beneficiarios</th><th>Hombres<br>Beneficiarios</th><th>Justificación</th><th>Cantidad</th><th>Detalle</th><th>Enero</th><th>Febrero</th><th>Marzo</th><th>Abril</th><th>Mayo</th><th>Junio</th><th>Julio</th><th>Agosto</th><th>Septiembre</th><th>Octubre</th><th>Noviembre</th><th>Diciembre</th><th>Total</th></tr></thead></table></div>");

			var table = datatabletsConfiguration($("#tablaGeneral"),false);

			for(x of informacioInicial){

				table.row.add([

					x.nombreItem,
					x.nombreEvento,
					x.nombreDeporte,
					x.nombreProvincia,
					x.paisNombre,
					x.alcance,
					x.fechaInicio,
					x.fechaFin,
					x.genero,
					x.categoria,
					x.numeroEntreandores,
					x.numeroAtletas,
					x.total,
					x.mBenefici,
					x.hBenefici,
					x.justificacionAd,
					x.canitdarBie,
					x.detalleBien,
					x.enero,
					x.febrero,
					x.marzo,
					x.abril,
					x.mayo,
					x.junio,
					x.julio,
					x.agosto,
					x.septiembre,
					x.octubre,
					x.noviembre,
					x.diciembre,
					x.totalElem

				]).draw(false);

			}


		},
		error:function(){

		}

	});	

}

var matrizActividadesDeMantenimiento=function(idFinanciero,cuerpo){

	let paqueteDeDatos = new FormData();
	paqueteDeDatos.append("tipo","actividades__de__mantenimiento");
	paqueteDeDatos.append("idProgramacionFinanciera",idFinanciero);

	$.ajax({

		type:"POST",
		url:"modelosBd/POA_MODIFICACIONES/seleccionaModificaciones.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

			let elementos=JSON.parse(response);
			let informacioInicial=elementos['informacioInicial'];

			$(cuerpo).append("<div class='div__scroll'><table id='tablaGeneral'><thead><tr><th>Nombre Ítem</th><th>Infraestructura</th><th>Provincia</th><th>Dirección</th><th>Estado</th><th>Tipo<br>de<br>Recursos</th><th>Tipo<br>de<br>intervención</th><th>Detallar<br>tipo de<br>intervención</th><th>Tipo<br>de<br>mantenimiento</th><th>Materiales<br>Servicios</th><th>Fecha de<br>último mantenimiento</th><th>Enero</th><th>Febrero</th><th>Marzo</th><th>Abril</th><th>Mayo</th><th>Junio</th><th>Julio</th><th>Agosto</th><th>Septiembre</th><th>Octubre</th><th>Noviembre</th><th>Diciembre</th><th>Total</th></tr></thead></table></div>");

			var table = datatabletsConfiguration($("#tablaGeneral"),false);

			for(x of informacioInicial){

				table.row.add([

					x.nombreItem,
					x.nombreInfras,
					x.nombreProvincia,
					x.direccionCompleta,
					x.estado,
					x.tipoRecursos,
					x.tipoIntervencion,
					x.detallarTipoIn,
					x.tipoMantenimiento,
					x.materialesServicios,
					x.fechaUltimo,
					x.enero,
					x.febrero,
					x.marzo,
					x.abril,
					x.mayo,
					x.junio,
					x.julio,
					x.agosto,
					x.septiembre,
					x.octubre,
					x.noviembre,
					x.diciembre,
					x.totalTotales

				]).draw(false);

			}


		},
		error:function(){

		}

	});	

}

var matrizActividadesHonorarios=function(idFinanciero,cuerpo){

	let paqueteDeDatos = new FormData();
	paqueteDeDatos.append("tipo","actividades__de__honorarios");
	paqueteDeDatos.append("idProgramacionFinanciera",idFinanciero);

	$.ajax({

		type:"POST",
		url:"modelosBd/POA_MODIFICACIONES/seleccionaModificaciones.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

			let elementos=JSON.parse(response);
			let informacioInicial=elementos['informacioInicial'];

			$(cuerpo).append("<div class='div__scroll'><table id='tablaGeneral'><thead><tr><th>Cédula</th><th>Nombres</th><th>Cargo</th><th>Tipo cargo</th><th>Honorario mensual</th><th>Enero</th><th>Febrero</th><th>Marzo</th><th>Abril</th><th>Mayo</th><th>Junio</th><th>Julio</th><th>Agosto</th><th>Septiembre</th><th>Octubre</th><th>Noviembre</th><th>Diciembre</th><th>Total</th></tr></thead></table></div>");

			var table = datatabletsConfiguration($("#tablaGeneral"),false);

			for(x of informacioInicial){

				table.row.add([

					x.cedula,
					x.nombres,
					x.cargo,
					x.tipoCargo,
					x.honorarioMensual,
					x.enero,
					x.febrero,
					x.marzo,
					x.abril,
					x.mayo,
					x.junio,
					x.julio,
					x.agosto,
					x.septiembre,
					x.octubre,
					x.noviembre,
					x.diciembre,
					x.total

				]).draw(false);

			}


		},
		error:function(){

		}

	});	

}

var matrizActividadesSueldos=function(idFinanciero,cuerpo){

	let paqueteDeDatos = new FormData();
	paqueteDeDatos.append("tipo","actividades__de__sueldos");
	paqueteDeDatos.append("idProgramacionFinanciera",idFinanciero);

	$.ajax({

		type:"POST",
		url:"modelosBd/POA_MODIFICACIONES/seleccionaModificaciones.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

			let elementos=JSON.parse(response);
			let informacioInicial=elementos['informacioInicial'];

			$(cuerpo).append("<div class='div__scroll'><table id='tablaGeneral'><thead><tr><th>Cédula</th><th>Nombres</th><th>Cargo</th><th>Tipo cargo</th><th>Tiempo trabajo</th><th>Sueldo</th><th>Aporte<br>patronal</th><th>Décimo<br>terecero</th><th>Acumula<br>décimo tercero</th><th>Décimo<br>cuarto</th><th>Acumula<br>décimo cuarto</th><th>Fondos<br>de<br>reserva</th><th>Enero</th><th>Febrero</th><th>Marzo</th><th>Abril</th><th>Mayo</th><th>Junio</th><th>Julio</th><th>Agosto</th><th>Septiembre</th><th>Octubre</th><th>Noviembre</th><th>Diciembre</th><th>Total</th></tr></thead></table></div>");

			var table = datatabletsConfiguration($("#tablaGeneral"),false);

			for(x of informacioInicial){

				table.row.add([

					x.cedula,
					x.nombres,
					x.cargo,
					x.tipoCargo,
					x.tiempoTrabajo,
					x.sueldoSalario,
					x.aportePatronal,
					x.decimoTercera,
					x.mensualizaTercera,
					x.decimoCuarta,
					x.menusalizaCuarta,
					x.fondosReserva,
					x.enero,
					x.febrero,
					x.marzo,
					x.abril,
					x.mayo,
					x.junio,
					x.julio,
					x.agosto,
					x.septiembre,
					x.octubre,
					x.noviembre,
					x.diciembre,
					x.total

				]).draw(false);

			}


		},
		error:function(){

		}

	});	

}

var matrizOrigenDestino=function(boton,cuerpo,actividad,financiero,parametros,identificadorPaginaReal){

$(boton).on('click', function (e){

	$(cuerpo).html(" ");
	$(".texto__titulos__mátriz").html(" ");

	$(".texto__titulos__mátriz").append("<div style='font-weight:bold;'> ACTIVIDAD "+parametros[0]+"</div>"+"<div style='font-weight:bold; text-transform:uppercase;'>ÍTEM "+parametros[1]+"</div>");

	if (actividad==1) {

		matrizActividadesAdminsitrativas(financiero,$(cuerpo));

		$(".modal-dialog").removeAttr('style');
		$(".modal-dialog").attr('style','min-width:70%!important;');

	}else if(actividad==3 || actividad==5 || actividad==6 || actividad==7){

		matrizActividadesDeportivas(financiero,$(cuerpo));
		$(".modal-dialog").removeAttr('style');
		$(".modal-dialog").attr('style','min-width:100%!important;');

	}else if(actividad==2){

		matrizActividadesDeMantenimiento(financiero,$(cuerpo));
		$(".modal-dialog").removeAttr('style');
		$(".modal-dialog").attr('style','min-width:100%!important;');

	}else if(actividad==4 && (identificadorPaginaReal=="honorarios" || identificadorPaginaReal=="honorarios__item")){

		matrizActividadesHonorarios(parametros[2],$(cuerpo));
		$(".modal-dialog").removeAttr('style');
		$(".modal-dialog").attr('style','min-width:100%!important;');

	}else if(actividad==4 && (identificadorPaginaReal=="sueldos" || identificadorPaginaReal=="sueldos__item" || identificadorPaginaReal=="desvinculacion")){

		matrizActividadesSueldos(parametros[2],$(cuerpo));
		$(".modal-dialog").removeAttr('style');
		$(".modal-dialog").attr('style','min-width:100%!important;');

	}


});

}