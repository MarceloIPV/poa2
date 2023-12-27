

						<div class='fila__reasignar col col-12 d d-flex justify-content-center' style='font-weight:bold;'>

							<a class='btn btn-warning' id='regresar__areas__tecnicas__seguimientos' target='_blank'>REGRESAR AL ÁREA TÉCNICA</a>

						</div>



						<div class='fila__reasignar col col-2' style='font-weight:bold;'>

							Documento del área técnica

						</div>


						<div class='fila__reasignar col col-10' style='font-weight:bold;'>

							<a id='documentos__areas__tecnicas' target='_blank'>Descargar documento área técnica (dar click aquí)</a>

						</div>



			if (varaible__culminados!="" && varaible__culminados!=" " && varaible__culminados!=undefined && varaible__culminados!=null) {

				for (zC of documentos__tecnicos__2) {

					if (data[18]=="FORMATIVO") {

						$("#documentos__areas__tecnicas").attr('href','documentos/seguimiento/informe__formativos/'+zC.archivo);

					}else if (data[18]=="RECREACION") {

						$("#documentos__areas__tecnicas").attr('href','documentos/seguimiento/informe__recreativos/'+zC.archivo);

					}else{

						$("#documentos__areas__tecnicas").attr('href','documentos/seguimiento/informes__altos/'+zC.archivo);

					}

				}

				$("#regresar__areas__tecnicas__seguimientos").hide();


			}else{

				// $(".fila__reasignar").attr('style','visibility:hidden;');

				// $(".elemento__refutables__corregidos").text('FALTA LA PARTE TÉCNICA DE '+data[18]);

			}