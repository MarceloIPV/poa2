let tablaConstruccion=function(parametro1,parametro2,tabla){

	let paqueteDeDatos = new FormData();
	paqueteDeDatos.append("tipo",parametro2);

	$.ajax({

		type:"POST",
		url:"modelosBd/inserta/seleccionaAcciones.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

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


			if (informacionObtenida__desvinculaciones!="" && informacionObtenida__desvinculaciones!=" " && informacionObtenida__desvinculaciones!=undefined && informacionObtenida__desvinculaciones!=null) {

			for(x of informacionObtenida__desvinculaciones){

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




				$(parametro1).append('<tr><th colspan="30" align="center" style="border-left:1px solid black; border-right:1px solid black;">'+tipoTramite+'&nbsp;&nbsp;<button class="btn btn-danger eliminacion__eliminar" id="eliminar'+x.idOrigenDestino+'" name="eliminar'+x.idOrigenDestino+'" idContador="'+x.idOrigenDestino+'"><i class="fa fa-trash" aria-hidden="true"></i></button></th></tr><tr><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-bottom:1px solid black!important;border-left:1px solid black!important;">'+contador+'</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Cédula</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombre</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+eventoOrigen+'</td><td align="center">'+x.idFinancierioOrigen+'</td><td align="center" '+color__origen__destino__enero+'>'+x.enero+'</td><td align="center" '+color__origen__destino__enero+'>'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__febrero+'>'+x.febrero+'</td><td align="center" '+color__origen__destino__febrero+'>'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__marzo+'>'+x.marzo+'</td><td align="center" '+color__origen__destino__marzo+'>'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__abril+'>'+x.abril+'</td><td align="center" '+color__origen__destino__abril+'>'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__mayo+'>'+x.mayo+'</td><td align="center" '+color__origen__destino__mayo+'>'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__junio+'>'+x.junio+'</td><td align="center" '+color__origen__destino__junio+'>'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__julio+'>'+x.julio+'</td><td align="center" '+color__origen__destino__julio+'>'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__agosto+'>'+x.agosto+'</td><td align="center" '+color__origen__destino__agosto+'>'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__septiembre+'>'+x.septiembre+'</td><td align="center" '+color__origen__destino__septiembre+'>'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__octubre+'>'+x.octubre+'</td><td align="center" '+color__origen__destino__octubre+'>'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__noviembre+'>'+x.noviembre+'</td><td align="center" '+color__origen__destino__noviembre+'>'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__diciembre+'>'+x.diciembre+'</td><td align="center" '+color__origen__destino__diciembre+'>'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold;">Enero</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero</td> <td rowspan="1" align="center" style="font-weight:bold;">Marzo</td> <td rowspan="1" align="center" style="font-weight:bold;">Abril</td> <td rowspan="1" align="center" style="font-weight:bold;">Mayo</td> <td rowspan="1" align="center" style="font-weight:bold;">Junio</td> <td rowspan="1" align="center" style="font-weight:bold;">Julio</td> <td rowspan="1" align="center" style="font-weight:bold;">Agosto</td> <td rowspan="1" align="center" style="font-weight:bold;">Septiembre</td> <td rowspan="1" align="center" style="font-weight:bold;">Octubre</td> <td rowspan="1" align="center" style="font-weight:bold;">Noviembre</td> <td rowspan="1" align="center" style="font-weight:bold;">Diciembre</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.nombreItem+'</td><td style="border-bottom:1px solid black!important;">'+x.eneroDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.febreroDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.marzoDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.abrilDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.mayoDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.junioDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.julioDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.agostoDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.septiembreDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.octubreDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.noviembreDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.diciembreDestino+'</td></tr>');

				if($("#identificadorModificaciones").val()=="1"){
					$(".eliminacion__eliminar").remove();
				}

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
				            } ,5000); 


						},
						error:function(){

						}

					});	


				});

			}				

			}

			if (informacionObtenida__sueldos__items!="" && informacionObtenida__sueldos__items!=" " && informacionObtenida__sueldos__items!=undefined && informacionObtenida__sueldos__items!=null) {

			for(x of informacionObtenida__sueldos__items){

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



				$(parametro1).append('<tr><th colspan="30" align="center" style="border-left:1px solid black; border-right:1px solid black;">'+tipoTramite+'&nbsp;&nbsp;<button class="btn btn-danger eliminacion__eliminar" id="eliminar'+x.idOrigenDestino+'" name="eliminar'+x.idOrigenDestino+'" idContador="'+x.idOrigenDestino+'"><i class="fa fa-trash" aria-hidden="true"></i></button></th></tr><tr><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-bottom:1px solid black!important;border-left:1px solid black!important;">'+contador+'</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Cédula</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombre</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+eventoOrigen+'</td><td align="center">'+x.idFinancierioOrigen+'</td><td align="center" '+color__origen__destino__enero+'>'+x.enero+'</td><td align="center" '+color__origen__destino__enero+'>'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__febrero+'>'+x.febrero+'</td><td align="center" '+color__origen__destino__febrero+'>'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__marzo+'>'+x.marzo+'</td><td align="center" '+color__origen__destino__marzo+'>'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__abril+'>'+x.abril+'</td><td align="center" '+color__origen__destino__abril+'>'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__mayo+'>'+x.mayo+'</td><td align="center" '+color__origen__destino__mayo+'>'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__junio+'>'+x.junio+'</td><td align="center" '+color__origen__destino__junio+'>'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__julio+'>'+x.julio+'</td><td align="center" '+color__origen__destino__julio+'>'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__agosto+'>'+x.agosto+'</td><td align="center" '+color__origen__destino__agosto+'>'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__septiembre+'>'+x.septiembre+'</td><td align="center" '+color__origen__destino__septiembre+'>'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__octubre+'>'+x.octubre+'</td><td align="center" '+color__origen__destino__octubre+'>'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__noviembre+'>'+x.noviembre+'</td><td align="center" '+color__origen__destino__noviembre+'>'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__diciembre+'>'+x.diciembre+'</td><td align="center" '+color__origen__destino__diciembre+'>'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Evento</td><td rowspan="1" align="center" style="font-weight:bold;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+eventosDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.idFinancierioDestino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td></tr>');

				if($("#identificadorModificaciones").val()=="1"){
					$(".eliminacion__eliminar").remove();
				}

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
				            } ,5000); 


						},
						error:function(){

						}

					});	


				});

			}				

			}


			if (informacionObtenida__sueldos__salarios!="" && informacionObtenida__sueldos__salarios!=" " && informacionObtenida__sueldos__salarios!=undefined && informacionObtenida__sueldos__salarios!=null) {


			for(x of informacionObtenida__sueldos__salarios){

				contador++;

				if (x.tipoTramite==1) {
					tipoTramite="Caso 1 (Actividades e items iguales en orígen y destino)";
				}else if(x.tipoTramite==2){
					tipoTramite="Caso 2 (Actividades iguales en orígen y destino)";
				}else if(x.tipoTramite==3){
					tipoTramite="Caso 3 (Actividades diferentes en orígen y destino)";
				}


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



				$(parametro1).append('<tr><th colspan="30" align="center" style="border-left:1px solid black; border-right:1px solid black;">'+tipoTramite+'&nbsp;&nbsp;<button class="btn btn-danger eliminacion__eliminar" id="eliminar'+x.idOrigenDestino+'" name="eliminar'+x.idOrigenDestino+'" idContador="'+x.idOrigenDestino+'"><i class="fa fa-trash" aria-hidden="true"></i></button></th></tr><tr><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-bottom:1px solid black!important;border-left:1px solid black!important;">'+contador+'</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombres</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+x.eventosOrigen+'</td><td align="center" '+color__origen__destino__enero+'>'+x.enero+'</td><td align="center" '+color__origen__destino__enero+'>'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__febrero+'>'+x.febrero+'</td><td align="center" '+color__origen__destino__febrero+'>'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__marzo+'>'+x.marzo+'</td><td align="center" '+color__origen__destino__marzo+'>'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__abril+'>'+x.abril+'</td><td align="center" '+color__origen__destino__abril+'>'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__mayo+'>'+x.mayo+'</td><td align="center" '+color__origen__destino__mayo+'>'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__junio+'>'+x.junio+'</td><td align="center" '+color__origen__destino__junio+'>'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__julio+'>'+x.julio+'</td><td align="center" '+color__origen__destino__julio+'>'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__agosto+'>'+x.agosto+'</td><td align="center" '+color__origen__destino__agosto+'>'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__septiembre+'>'+x.septiembre+'</td><td align="center" '+color__origen__destino__septiembre+'>'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__octubre+'>'+x.octubre+'</td><td align="center" '+color__origen__destino__octubre+'>'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__noviembre+'>'+x.noviembre+'</td><td align="center" '+color__origen__destino__noviembre+'>'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__diciembre+'>'+x.diciembre+'</td><td align="center" '+color__origen__destino__diciembre+'>'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Nombres</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eventosDestino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td></tr>');

				if($("#identificadorModificaciones").val()=="1"){
					$(".eliminacion__eliminar").remove();
				}

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
				            } ,5000); 


						},
						error:function(){

						}

					});	


				});

			}		

			}

			if (informacionObtenida__honorarios__items!="" && informacionObtenida__honorarios__items!=" " && informacionObtenida__honorarios__items!=undefined && informacionObtenida__honorarios__items!=null) {

			for(x of informacionObtenida__honorarios__items){

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


				$(parametro1).append('<tr><th colspan="30" align="center" style="border-left:1px solid black; border-right:1px solid black;">'+tipoTramite+'&nbsp;&nbsp;<button class="btn btn-danger eliminacion__eliminar" id="eliminar'+x.idOrigenDestino+'" name="eliminar'+x.idOrigenDestino+'" idContador="'+x.idOrigenDestino+'"><i class="fa fa-trash" aria-hidden="true"></i></button></th></tr><tr><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-bottom:1px solid black!important;border-left:1px solid black!important;">'+contador+'</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Cédula</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombre</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+eventoOrigen+'</td><td align="center">'+x.idFinancierioOrigen+'</td><td align="center" '+color__origen__destino__enero+'>'+x.enero+'</td><td align="center" '+color__origen__destino__enero+'>'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__febrero+'>'+x.febrero+'</td><td align="center" '+color__origen__destino__febrero+'>'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__marzo+'>'+x.marzo+'</td><td align="center" '+color__origen__destino__marzo+'>'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__abril+'>'+x.abril+'</td><td align="center" '+color__origen__destino__abril+'>'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__mayo+'>'+x.mayo+'</td><td align="center" '+color__origen__destino__mayo+'>'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__junio+'>'+x.junio+'</td><td align="center" '+color__origen__destino__junio+'>'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__julio+'>'+x.julio+'</td><td align="center" '+color__origen__destino__julio+'>'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__agosto+'>'+x.agosto+'</td><td align="center" '+color__origen__destino__agosto+'>'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__septiembre+'>'+x.septiembre+'</td><td align="center" '+color__origen__destino__septiembre+'>'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__octubre+'>'+x.octubre+'</td><td align="center" '+color__origen__destino__octubre+'>'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__noviembre+'>'+x.noviembre+'</td><td align="center" '+color__origen__destino__noviembre+'>'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__diciembre+'>'+x.diciembre+'</td><td align="center" '+color__origen__destino__diciembre+'>'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Evento</td><td rowspan="1" align="center" style="font-weight:bold;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+eventosDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.idFinancierioDestino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td></tr>');

				if($("#identificadorModificaciones").val()=="1"){
					$(".eliminacion__eliminar").remove();
				}

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
				            } ,5000); 


						},
						error:function(){

						}

					});	


				});

			}				

			}

			if (informacionObtenida__honorarios!="" && informacionObtenida__honorarios!=" " && informacionObtenida__honorarios!=undefined && informacionObtenida__honorarios!=null) {


			for(x of informacionObtenida__honorarios){

				contador++;

				if (x.tipoTramite==1) {
					tipoTramite="Caso 1 (Actividades e items iguales en orígen y destino)";
				}else if(x.tipoTramite==2){
					tipoTramite="Caso 2 (Actividades iguales en orígen y destino)";
				}else if(x.tipoTramite==3){
					tipoTramite="Caso 3 (Actividades diferentes en orígen y destino)";
				}

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

				$(parametro1).append('<tr><th colspan="30" align="center" style="border-left:1px solid black; border-right:1px solid black;">'+tipoTramite+'&nbsp;&nbsp;<button class="btn btn-danger eliminacion__eliminar" id="eliminar'+x.idOrigenDestino+'" name="eliminar'+x.idOrigenDestino+'" idContador="'+x.idOrigenDestino+'"><i class="fa fa-trash" aria-hidden="true"></i></button></th></tr><tr><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-bottom:1px solid black!important;border-left:1px solid black!important;">'+contador+'</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Nombres</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+x.eventosOrigen+'</td><td align="center" '+color__origen__destino__enero+'>'+x.enero+'</td><td align="center" '+color__origen__destino__enero+'>'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__febrero+'>'+x.febrero+'</td><td align="center" '+color__origen__destino__febrero+'>'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__marzo+'>'+x.marzo+'</td><td align="center" '+color__origen__destino__marzo+'>'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__abril+'>'+x.abril+'</td><td align="center" '+color__origen__destino__abril+'>'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__mayo+'>'+x.mayo+'</td><td align="center" '+color__origen__destino__mayo+'>'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__junio+'>'+x.junio+'</td><td align="center" '+color__origen__destino__junio+'>'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__julio+'>'+x.julio+'</td><td align="center" '+color__origen__destino__julio+'>'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__agosto+'>'+x.agosto+'</td><td align="center" '+color__origen__destino__agosto+'>'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__septiembre+'>'+x.septiembre+'</td><td align="center" '+color__origen__destino__septiembre+'>'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__octubre+'>'+x.octubre+'</td><td align="center" '+color__origen__destino__octubre+'>'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__noviembre+'>'+x.noviembre+'</td><td align="center" '+color__origen__destino__noviembre+'>'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__diciembre+'>'+x.diciembre+'</td><td align="center" '+color__origen__destino__diciembre+'>'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Nombres</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.eventosDestino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td></tr>');

				if($("#identificadorModificaciones").val()=="1"){
					$(".eliminacion__eliminar").remove();
				}

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
				            } ,5000); 


						},
						error:function(){

						}

					});	


				});

			}			

			}


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


				$(parametro1).append('<tr><th colspan="30" align="center" style="border-left:1px solid black; border-right:1px solid black;">'+tipoTramite+'&nbsp;&nbsp;<button class="btn btn-danger eliminacion__eliminar" id="eliminar'+x.idOrigenDestino+'" name="eliminar'+x.idOrigenDestino+'" idContador="'+x.idOrigenDestino+'"><i class="fa fa-trash" aria-hidden="true"></i></button></th></tr><tr><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-bottom:1px solid black!important;border-left:1px solid black!important;">'+contador+'</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Actividad Orígen</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Evento</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold; border-top:1px solid black!important;">Diciembre Vigente</td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important; border-bottom:1px solid black;"><a target="_blank" href="documentos/modificacion/justificacionModificacion/'+x.documento+'">Documento</a></td><td rowspan="4" style="font-weight:bold;font-size:12px!important; vertical-align:middle!important; border-top:1px solid black!important;border-right:1px solid black;border-bottom:1px solid black;">'+x.justificacion+'</td></tr><tr><td align="center">'+x.actividadOrigen+'</td><td align="center">'+eventoOrigen+'</td><td align="center">'+x.idFinancierioOrigen+'</td><td align="center" '+color__origen__destino__enero+'>'+x.enero+'</td><td align="center" '+color__origen__destino__enero+'>'+(parseFloat(x.enero)-parseFloat(x.eneroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__febrero+'>'+x.febrero+'</td><td align="center" '+color__origen__destino__febrero+'>'+(parseFloat(x.febrero)-parseFloat(x.febreroOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__marzo+'>'+x.marzo+'</td><td align="center" '+color__origen__destino__marzo+'>'+(parseFloat(x.marzo)-parseFloat(x.marzoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__abril+'>'+x.abril+'</td><td align="center" '+color__origen__destino__abril+'>'+(parseFloat(x.abril)-parseFloat(x.abrilOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__mayo+'>'+x.mayo+'</td><td align="center" '+color__origen__destino__mayo+'>'+(parseFloat(x.mayo)-parseFloat(x.mayoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__junio+'>'+x.junio+'</td><td align="center" '+color__origen__destino__junio+'>'+(parseFloat(x.junio)-parseFloat(x.junioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__julio+'>'+x.julio+'</td><td align="center" '+color__origen__destino__julio+'>'+(parseFloat(x.julio)-parseFloat(x.julioOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__agosto+'>'+x.agosto+'</td><td align="center" '+color__origen__destino__agosto+'>'+(parseFloat(x.agosto)-parseFloat(x.agostoOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__septiembre+'>'+x.septiembre+'</td><td align="center" '+color__origen__destino__septiembre+'>'+(parseFloat(x.septiembre)-parseFloat(x.septiembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__octubre+'>'+x.octubre+'</td><td align="center" '+color__origen__destino__octubre+'>'+(parseFloat(x.octubre)-parseFloat(x.octubreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__noviembre+'>'+x.noviembre+'</td><td align="center" '+color__origen__destino__noviembre+'>'+(parseFloat(x.noviembre)-parseFloat(x.noviembreOrigen)).toFixed(2)+'</td><td align="center" '+color__origen__destino__diciembre+'>'+x.diciembre+'</td><td align="center" '+color__origen__destino__diciembre+'>'+(parseFloat(x.diciembre)-parseFloat(x.diciembreOrigen)).toFixed(2)+'</td></tr><tr><td rowspan="1" align="center" style="font-weight:bold;">Actividad Destino</td><td rowspan="1" align="center" style="font-weight:bold;">Evento</td><td rowspan="1" align="center" style="font-weight:bold;">Ítem</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Enero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Febrero Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Marzo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Abril Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Mayo Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Junio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Julio Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Agosto Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Septiembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Octubre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Noviembre Vigente</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Inicial</td><td rowspan="1" align="center" style="font-weight:bold;">Diciembre Vigente</td></tr><tr><td style="border-bottom:1px solid black!important;">'+x.actividadDestino+'</td><td style="border-bottom:1px solid black!important;">'+eventosDestino+'</td><td style="border-bottom:1px solid black!important;">'+x.idFinancierioDestino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+x.eneroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__enero+'">'+(parseFloat(x.eneroDestino__destino)+parseFloat(x.eneroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+x.febreroDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__febrero+'">'+(parseFloat(x.febreroDestino__destino)+parseFloat(x.febreroDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+x.marzoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__marzo+'">'+(parseFloat(x.marzoDestino__destino)+parseFloat(x.marzoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+x.abrilDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__abril+'">'+(parseFloat(x.abrilDestino__destino)+parseFloat(x.abrilDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+x.mayoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__mayo+'">'+(parseFloat(x.mayoDestino__destino)+parseFloat(x.mayoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+x.junioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__junio+'">'+(parseFloat(x.junioDestino__destino)+parseFloat(x.junioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+x.julioDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__julio+'">'+(parseFloat(x.julioDestino__destino)+parseFloat(x.julioDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+x.agostoDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__agosto+'">'+(parseFloat(x.agostoDestino__destino)+parseFloat(x.agostoDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+x.septiembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__septiembre+'">'+(parseFloat(x.septiembreDestino__destino)+parseFloat(x.septiembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+x.octubreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__octubre+'">'+(parseFloat(x.octubreDestino__destino)+parseFloat(x.octubreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+x.noviembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__noviembre+'">'+(parseFloat(x.noviembreDestino__destino)+parseFloat(x.noviembreDestino)).toFixed(2)+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+x.diciembreDestino__destino+'</td><td style="border-bottom:1px solid black!important; '+color__destino__origen__diciembre+'">'+(parseFloat(x.diciembreDestino__destino)+parseFloat(x.diciembreDestino)).toFixed(2)+'</td></tr>');

				if($("#identificadorModificaciones").val()=="1"){
					$(".eliminacion__eliminar").remove();
				}

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
				            } ,5000); 


						},
						error:function(){

						}

					});	


				});

			}

		},
		error:function(){

		}

	});	

}