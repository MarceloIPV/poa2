var funcion__cambio__de__numero=function(parametro1){

    $(parametro1).on('click', function () {
    
        if ($(this).val()=="0") {
    
            $(this).val(" ");
    
        }
    
    });

}

var actividades__selector__incrementos = function (parametro1) {
    $(".creacionEventoBoton").remove();
    $(".body__actividadesEs__modificaciones__insertar").html(" ");
    var paqueteDeDatos = new FormData();

    var indicador = 1;

	paqueteDeDatos.append("indicador",indicador);

    $.ajax({

		type:"POST",
		url:"modelosBd/incrementosDecrementos/selectores.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

		   	var elementos=JSON.parse(response);
		   	
		   	var data=elementos['informacionSeleccionada'];

            $(parametro1).append(`<option value="0" class="text-center" >---Seleccione una Actividad---</option>`);
		   	
		   	$.each(data, function (index, option) {
          if(option.idActividades < 4){
            $(parametro1).append(`<option value="${option.idActividades}">${option.idActividades}.-${option.nombreActividades}</option>`);
          }
        });

        // for(x of data){

        //   if(x.idActividades == 4){
        //     $(parametro1).append(`<option value="sueldos">4.-OPERACIÓN DEPORTIVA(SUELDOS Y SALARIOS)</option><option value="sueldosH">4.-OPERACIÓN DEPORTIVA(HONORARIOS)</option><option value="sueldosD">4.-OPERACIÓN DEPORTIVA(DESVINCULACIÓN)</option>`);
        //   }
        // }

        $.each(data, function (index, option) {
          if(option.idActividades > 4){
            $(parametro1).append(`<option value="${option.idActividades}">${option.idActividades}.-${option.nombreActividades}</option>`);
          }
                
        });
		   	

		},
		error:function(){

		}
				
	});	


}


var items__selector__incrementos = function (parametro1, parametro2,parametro3,parametro4) {

	$(parametro1).change(function () {
        $("#fila_sueldos_od").hide();
        $("#sueldos_od_c").hide();
        $("#valores__Incrementos__Meses tbody").html(" ");
        $("#valores__Incrementos__Meses").hide();
        $("#sueldosCampos").html(" ");        
        $("#tablaSueldos__ tbody").html(" ");     
        $("#tablaSueldos__").hide();        
        $("#fila_honorarios_od").hide();        
        $("#honorarios_od_c").hide();        
        $("#honorarios_od").html(" ");
        $("#botonFlotanteIncremento").hide();
        $("#botonFlotanteIncremento").html(" ");
        $("#tablaPoaHonorarios").hide();
        $("#body__actividadesEs__incrementos__honorarios").html(" ");
        $("#eventos_intervencion_od").html(" ");
        $("#infraestructura_od").html(" ");

		let idActividad = $(this).val();

		$("#idActividad_Env").val(idActividad);
		$("#actividad__modificaciones__destino__modificaciones2__seleccion").val(idActividad);

        $("#sectionTablaIncrementos").hide();

        if (idActividad == 1) {

          $("#contedorProyectoInfra").html(" "); 
          $(".body__actividadesEs__modificaciones__insertar").html(" ");
          var paqueteDeDatos = new FormData();

          var indicador = 2;

          paqueteDeDatos.append("indicador", indicador);
          paqueteDeDatos.append("idActividad", idActividad);

          $("#fila_eventos_od").hide();
          $("#eventos_intervencion_od_c").hide();
          $("#fila_infraestructura_od").hide();
          $("#infraestructura_od_c").hide();
          $("#fila_item_od").show();
          $("#items_od_c").show();
          $("#fila_presupuestario").show();
          $("#codigo_presupuestario_od_c").show();
          $(parametro2).html(" ");
          $("#codigo__presupuestarios__incrementos").val(" ");

          $.ajax({
            type: "POST",
            url: "modelosBd/incrementosDecrementos/selectores.md.php",
            contentType: false,
            data: paqueteDeDatos,
            processData: false,
            cache: false,
            success: function (response) {
              var elementos = JSON.parse(response);

              var data = elementos["informacionSeleccionada"];

              $(parametro2).append(
                `<option value="0" class="text-center" >---Seleccione un Item---</option>`
              );

              $.each(data, function (index, option) {
                $(parametro2).append(
                  `<option value="${option.idProgramacionFinanciera}">${option.nombreItem}</option>`
                );
              });
            },
            error: function () {},
          });
        }else if(idActividad == 2){
          $("#contedorProyectoInfra").html(" "); 
          $(".body__actividadesEs__modificaciones__insertar").html(" ");
          $("#fila_eventos_od").hide();
          $("#eventos_intervencion_od_c").hide();

          $('#contedorProyectoInfra').html(`<br><button name="formularioProyecto" id="formularioProyecto" style="width:100%!important;" data-toggle="modal" data-target="#modalInstalacionesProyecto" class="btn btn-danger" type="button">Formulario Proyecto</button>`);
          
          $.getScript("layout/scripts/js/incrementosDecrementos/metodos.js", function () {
            agregarValoresFormularioOrganismo($("#formularioProyecto"));            
          });
          
          var paqueteDeDatos = new FormData();

          var indicador = 6;

          paqueteDeDatos.append("indicador", indicador);
          paqueteDeDatos.append("idActividad", idActividad);

          $("#fila_infraestructura_od").show();
          $("#infraestructura_od_c").show();
          $("#fila_item_od").show();
          $("#items_od_c").show();
          $("#fila_presupuestario").show();
          $("#codigo_presupuestario_od_c").show();
          $(parametro2).html(" ");
          $(parametro4).html(" ");
          $("#codigo__presupuestarios__incrementos").val(" ");

          $.ajax({
            type: "POST",
            url: "modelosBd/incrementosDecrementos/selectores.md.php",
            contentType: false,
            data: paqueteDeDatos,
            processData: false,
            cache: false,
            success: function (response) {
              var elementos = JSON.parse(response);

              var data = elementos["informacionSeleccionada"];

              $(parametro4).append(
                `<option value="0" class="text-center" >---Seleccione Infraestructura---</option>`
              );

              $.each(data, function (index, option) {
                $(parametro4).append(
                  `<option value="${option.nombreInfras}">${option.nombreInfras}</option>`
                );
              });
            },
            error: function () {},
          });

          $(parametro4).change(function () {
            $("#sectionTablaIncrementos").hide();
            $("#valores__Incrementos__Meses tbody").html(" ");
            $("#valores__Incrementos__Meses").hide();
            $("#fila_eventos_od").hide();
            $("#eventos_intervencion_od_c").hide();

            var paqueteDeDatos = new FormData();
            var idActividad = $(parametro1).val();
            var evento = $(this).val();

            var indicador = 8;

            paqueteDeDatos.append("indicador", indicador);
            paqueteDeDatos.append("idActividad", idActividad);
            paqueteDeDatos.append("evento", evento);

            $.ajax({
              type: "POST",
              url: "modelosBd/incrementosDecrementos/selectores.md.php",
              contentType: false,
              data: paqueteDeDatos,
              processData: false,
              cache: false,
              success: function (response) {
                $(parametro2).html(" ");
                $("#codigo__presupuestarios__incrementos").val(" ");
                var elementos = JSON.parse(response);

                var data = elementos["informacionSeleccionada"];

                $(parametro2).append(
                  `<option value="0" class="text-center" >---Seleccione un Item---</option>`
                );

                $.each(data, function (index, option) {
                  $(parametro2).append(
                    `<option value="${option.idProgramacionFinanciera}">${option.nombreItem}</option>`
                  );
                });
              },
              error: function () {},
            });
          });
        }else if(idActividad == "sueldos"){
          $("#contedorProyectoInfra").html(" "); 
          $(".body__actividadesEs__modificaciones__insertar").html(" ");
          $("#fila_eventos_od").hide();
          $("#eventos_intervencion_od_c").hide();
          $("#fila_infraestructura_od").hide();
          $("#infraestructura_od_c").hide();
          $("#fila_honorarios_od").hide();
          $("#honorarios_od_c").hide();
          $("#fila_desvinculación_od").hide();
          $("#desvinculacion_od_c").hide();
          $("#fila_item_od").hide();
          $("#items_od_c").hide();
          $("#fila_presupuestario").hide();
          $("#codigo_presupuestario_od_c").hide();
          $(parametro2).html(" ");
          $(parametro3).html(" ");
          $(parametro4).html(" ");
          $("#honorarios_od").html(" ");
          $("#desvinculacion_od").html(" ");
          $("#codigo__presupuestarios__incrementos").val(" ");

          var indicador = 13;

          var paqueteDeDatos = new FormData();
          paqueteDeDatos.append("indicador", indicador);

      
          $.ajax({
            type: "POST",
            url: "modelosBd/incrementosDecrementos/selectores.md.php",
            contentType: false,
            data: paqueteDeDatos,
            processData: false,
            cache: false,
            success: function (response) {
              $("#fila_sueldos_od").show();
              $("#sueldos_od_c").show();
              $("#sueldos_od").html(" ");
              var elementos = JSON.parse(response);

              var data = elementos["informacionSeleccionada"];

              $("#sueldos_od").append(
                `<option value="0" class="text-center" >---Seleccione Personal Sueldos y Salarios--</option>`
              );

              $.each(data, function (index, option) {
                $("#sueldos_od").append(
                  `<option value="${option.idSueldos}">${option.nombres}</option>`
                );
              });
            },
            error: function () {},
          });

          $("#sueldos_od").change(function (e) {
            $("#botonFlotanteIncremento").hide();
            $("#botonFlotanteIncremento").html(" ");
            var tipoTramite = $("#tipoTramite").val(); 
            $("#sueldosCampos").html(" ");
            var paqueteDatos = new FormData();
            var indicador = 14;
            var idSueldos = $(this).val();

            paqueteDatos.append("indicador", indicador);
            paqueteDatos.append("idSueldos", idSueldos);

            if($("#sueldos_od").val() != 0){
              $("#sueldosCampos").append(`
                <table>
                  <tr>
                    <td>
                      <span style="font-size: 13px;"><strong>Cédula</strong></span>
                      <input type="text" readonly id='cedula' class="form-control" />
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <span style="font-size: 13px;"><strong>Cargo</strong></span>
                      <input type="text" readonly id='cargo' class="form-control" />
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <span style="font-size: 13px;"><strong>Tipo de cargo</strong></span>
                      <input type="text" readonly id='tipo' class="form-control" />
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <span style="font-size: 13px;"><strong>Tiempo de trabajo en meses</strong></span>
                      <input type="text" readonly id='tiempo' class="form-control" />
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <span style="font-size: 13px;"><strong>Mensualiza décimo tercer sueldo</strong></span>
                      <input type="text" readonly id='decimoTercer' class="form-control" />
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <span style="font-size: 13px;"><strong>Mensualiza décimo cuarto sueldo</strong></span>
                      <input type="text" readonly id='decimoCuarto' class="form-control" />
                    </td>
                  </tr>
                </table>
              `);
            }

            $.ajax({
              type: "POST",
              url: "modelosBd/incrementosDecrementos/selectores.md.php",
              contentType: false,
              data: paqueteDatos,
              processData: false,
              cache: false,
              success: function (response) {
                $("#tablaSueldos__ tbody").html(" ");
                $("#fila_sueldos_od").show();
                $("#sueldos_od_c").show();
                var elementos = JSON.parse(response);

                var data = elementos["informacionSeleccionada"];
                var data2 = elementos["meses"];
                
                var tramite = $("#tipoTramiteF").val();
                var signo = "";
                if(tramite == "Incremento"){
                  signo = "+";
                }else{
                  signo = "-";
                }

                for(x of data){
                  $("#cedula").val(x.cedula);
                  $("#cargo").val(x.cargo);
                  $("#tipo").val(x.tipoCargo);
                  $("#tiempo").val(x.tiempoTrabajo);
                  $("#decimoTercer").val(x.mensualizaTercera);
                  $("#decimoCuarto").val(x.mensualizaCuarta);
                  

                  let divididosTercero=parseFloat(x.decimoTercera)/12;
                  let divididosCuarto=parseFloat(x.decimoCuarta)/12;
                  
                  $.each(data2, function (indiceFila, fila) {

                    $.each(fila, function (indiceColumna, valor) {
                      let valorMeses = asignacionMeses(indiceFila, indiceColumna);

                      let valorCuarto = mesesDecimoCuarto(valorMeses,x.regimen,x.decimoCuarta,divididosCuarto,x.mensualizaCuarta);

                      let valorTercero = mesesDecimoTercero(valorMeses,x.decimoTercera,divididosTercero,x.mensualizaTercera);

                      var fila = $("<tr>");
                      var fila2 = $("<tr>");
                      var fila3 = $("<tr>");
                      var celda = $("<td align='center' style='font-weight:bold!important;'>").text(`${valorMeses} (Monto inicial)`);
                      fila.append(celda);

                      var celda2 = $("<td>").append(
                        `<input type='text' id='${valorMeses
                        }aportePatronal' style='width:100%!important; border:none!important;text-align:center!important;' value='${x.aportePatronal}' readonly='readonly' class='form-control'/>`
                      );
                      fila.append(celda2);
                      var celda3 = $("<td align='center'>").append(
                        `<input type='text' id='${valorMeses
                        }decimoTercero' value='${parseFloat(valorTercero).toFixed(2)}' style="width:100%!important; text-align:center!important;border:none!important;" readonly='readonly' class='form-control'/>`
                      );
                      fila.append(celda3);

                      var celda4 = $("<td align='center'>").append(
                        `<input type='text' class='form-control' id='${valorMeses}decimoCuarto' value='${parseFloat(valorCuarto).toFixed(2)}' style='width:100%!important;text-align:center!important;border:none!important;' readonly='readonly' attr='${valorMeses}'/>`
                      );

                      fila.append(celda4);

                      var celda5 = $("<td>").append(
                        `<input type='text' id='${valorMeses
                        }fondosReserva' style='width:100%!important; border:none!important;text-align:center!important;' value='${x.fondosReserva}' readonly='readonly' class='form-control'/>`
                      );

                      fila.append(celda5);

                      var celda6 = $("<td>").append(
                        `<input type='text' id='${valorMeses
                        }salario' style='width:100%!important; border:none!important;text-align:center!important;' value='${x.sueldoSalario}' readonly='readonly' class='form-control'/>`
                      );

                      fila.append(celda6);

                      var celda7 = $("<td>").append(
                        `<input type='text' id='${valorMeses
                        }salarioBonificaciones' style='width:100%!important; border:none!important;text-align:center!important;' value='${valor}' readonly='readonly' class='form-control'/>`
                      );

                      fila.append(celda7);

                      var celda8 = $("<td align='center'>").text(`${valorMeses} (Monto ${signo} ${tramite}`);
                      fila2.append(celda8);

                      var celda9 = $("<td>").append(
                        `<input type='text' id='${valorMeses
                        }aportePatronalResultado' style='width:100%!important; border:none!important;text-align:center!important;' value='${x.aportePatronal}' readonly='readonly' class='form-control'/>`
                      );
                      fila2.append(celda9);
                      var celda10 = $("<td align='center'>").append(
                        `<input type='text' id='${valorMeses
                        }decimoTerceroResultado' value='${parseFloat(valorTercero).toFixed(2)}' style="width:100%!important; text-align:center!important;border:none!important;"  readonly='readonly' class='form-control'/>`
                      );
                      fila2.append(celda10);

                      var celda11 = $("<td align='center'>").append(
                        `<input type='text' class='form-control' id='${valorMeses}decimoCuartoResultado' value='${parseFloat(valorCuarto).toFixed(2)}' style='width:100%!important;text-align:center!important; border:none!important;' readonly='readonly' attr='${valorMeses}'/>`
                      );

                      fila2.append(celda11);

                      var celda12 = $("<td>").append(
                        `<input type='text' id='${valorMeses
                        }fondosReservaResultado' style='width:100%!important; border:none!important;text-align:center!important;' value='${x.fondosReserva}' readonly='readonly' class='form-control'/>`
                      );

                      fila2.append(celda12);

                      var celda13 = $("<td>").append(
                        `<input type='text' id='${valorMeses
                        }salarioResultado' style='width:100%!important; border:none!important;text-align:center!important;' value='${x.sueldoSalario}' readonly='readonly' class='form-control'/>`
                      );

                      fila2.append(celda13);

                      var celda14 = $("<td>").append(
                        `<input type='text' id='${valorMeses
                        }salarioBonificacionesResultado' style='width:100%!important; border:none!important;text-align:center!important;' value='${valor}' readonly='readonly' class='form-control'/>`
                      );

                      fila2.append(celda14);

                      var celda15 = $("<td align='center'>").text(`${valorMeses} (${tipoTramite})`);
                      fila3.append(celda15);

                      if(tipoTramite == "incremento"){

                        if(parseFloat(valor) == 0){
                          var celda16 = $("<td align='center'>");
                          var celda17 = $("<td align='center'>");
                          var celda18 = $("<td align='center'>");
                          var celda19 = $("<td align='center'>");
                          var celda20 = $("<td align='center'>");
                        }else{
                          var celda16 = $("<td>").append(
                            `<input type='text' id='${valorMeses
                            }aportePatronalIncremento' class='solo__numero__montos form-control solo__numero__${indiceColumna}' style='width:100%!important; text-align:center!important;' value='0'/>`
                          );
  
                          var celda17 = $("<td align='center'>").append(
                            `<input type='text' id='${valorMeses
                            }decimoTerceroIncremento' value='0' class='solo__numero__montos form-control solo__numero__${indiceColumna}' style="width:100%!important; text-align:center!important;"/>`
                          );
  
                          var celda18 = $("<td align='center'>").append(
                            `<input type='text' class='solo__numero__montos form-control solo__numero__${indiceColumna}' id='${valorMeses}decimoCuartoIncremento' value='0' style='width:100%!important;text-align:center!important;' attr='${valorMeses}'/>`
                          );
  
                          var celda19 = $("<td>").append(
                            `<input type='text' id='${valorMeses
                            }fondosReservaIncremento' class='solo__numero__montos form-control solo__numero__${indiceColumna}' style='width:100%!important; text-align:center!important;' value='0'/>`
                          );
  
                          var celda20 = $("<td>").append(
                            `<input type='text' id='${valorMeses
                            }salarioIncremento' class='solo__numero__montos form-control solo__numero__${indiceColumna}' style='width:100%!important;text-align:center!important;' value='0'/>`
                          );
                        }

                      }else if(tipoTramite == "decremento"){

                        if(parseFloat(valor) == 0){
                          var celda16 = $("<td align='center'>");
                          var celda17 = $("<td align='center'>");
                          var celda18 = $("<td align='center'>");
                          var celda19 = $("<td align='center'>");
                          var celda20 = $("<td align='center'>");
                        }else{
                          if(parseFloat(x.aportePatronal) > 0){
                            var celda16 = $("<td>").append(
                              `<input type='text' id='${valorMeses
                              }aportePatronalIncremento' class='solo__numero__montos form-control solo__numero__${indiceColumna}' style='width:100%!important; text-align:center!important;' value='0'/>`
                            );
                          }else if(parseFloat(x.aportePatronal) == 0){
                            var celda16 = $("<td align='center'>");
                          }
  
                          if(parseFloat(valorTercero) > 0){
                            var celda17 = $("<td align='center'>").append(
                              `<input type='text' id='${valorMeses
                              }decimoTerceroIncremento' value='0' class='solo__numero__montos form-control solo__numero__${indiceColumna}' style="width:100%!important; text-align:center!important;"/>`
                            );
                          }else if(parseFloat(valorTercero) == 0){
                            var celda17 = $("<td align='center'>");
                          }
                            
  
  
                          if(parseFloat(valorCuarto) > 0){
                            var celda18 = $("<td align='center'>").append(
                              `<input type='text' class='solo__numero__montos form-control solo__numero__${indiceColumna}' id='${valorMeses}decimoCuartoIncremento' value='0' style='width:100%!important;text-align:center!important;' attr='${valorMeses}'/>`
                            );
                          }else if(parseFloat(valorCuarto) == 0){
                            var celda18 = $("<td align='center'>");
                          }
    
  
                          if(parseFloat(x.fondosReserva) > 0){
                            var celda19 = $("<td>").append(
                              `<input type='text' id='${valorMeses
                              }fondosReservaIncremento' class='solo__numero__montos form-control solo__numero__${indiceColumna}' style='width:100%!important; text-align:center!important;' value='0'/>`
                            );
                          }else if(parseFloat(x.fondosReserva) == 0){
                            var celda19 = $("<td align='center'>");
                          }
  
  
                          if(parseFloat(x.sueldoSalario) > 0){
                            var celda20 = $("<td>").append(
                              `<input type='text' id='${valorMeses
                              }salarioIncremento' class='solo__numero__montos form-control solo__numero__${indiceColumna}' style='width:100%!important;text-align:center!important;' value='0'/>`
                            );
                          }else if(parseFloat(x.sueldoSalario) == 0){
                            var celda20 = $("<td align='center'>");
                          }
                        }
                        
                      }

                      
                      fila3.append(celda16);
                      
                      fila3.append(celda17);

                      fila3.append(celda18);

                      fila3.append(celda19);

                      fila3.append(celda20);

                      var celda21 = $("<td>").append(
                        `<span> </span>`
                      );

                      fila3.append(celda21);
                      // sumaTotal = parseFloat(valor) + sumaTotal;

                      $("#tablaSueldos__ tbody").append(fila);
                      $("#tablaSueldos__ tbody").append(fila2);
                      $("#tablaSueldos__ tbody").append(fila3);
                      
                      var idInputEvaluadoPatronal = `${valorMeses}aportePatronalIncremento`;

                      var idInputEvaluadoTercero = `${valorMeses}decimoTerceroIncremento`;

                      var idInputEvaluadoCuarto = `${valorMeses}decimoCuartoIncremento`;

                      var idInputEvaluadoFondos = `${valorMeses}fondosReservaIncremento`;

                      var idInputEvaluadoSalario = `${valorMeses}salarioIncremento`;
                        
                      verificaMesActualSueldos(valorMeses,$("#"+idInputEvaluadoPatronal),$("#"+idInputEvaluadoTercero),$("#"+idInputEvaluadoCuarto),$("#"+idInputEvaluadoFondos),$("#"+idInputEvaluadoSalario));
                    });
                  });

                  var fila4 = $("<tr>");
                  var fila5 = $("<tr>");


                  fila4.append(`<th></th> <th>Aporte patronal</th> <th>Décimo tercero</th> <th>Décimo cuarto</th> <th>Fondos de reserva</th> <th>Sueldo</th> <th>Total ${tramite}</th>`);

                  
                  // fila5.append(`<td><span></span></td><td><input type="text" readonly value="0" style="text-aling: center;" id="totalAporte" class="form-control"/></td><td><input type="text" readonly value="0" style="text-aling: center;" id="totalDecimoTercero" class="form-control"/></td><td><input type="text" readonly value="0" style="text-aling: center;" id="totalDecimoCuarto" class="form-control"/></td><td><input type="text" readonly value="0" style="text-aling: center;" id="totalFondos" class="form-control"/></td><td><input type="text" readonly value="0" style="text-aling: center;" id="totalSueldo" class="form-control"/></td><td><input type="text" readonly value="0" style="text-aling: center;" id="totalIncremento" class="form-control"s/> <br><button type="button" id="calcularTotalesSueldos" name="calcularTotalesSueldos" class="btn btn-primary" style="width:100%!important;">Calcular</button></td>`);

                  // $("#tablaSueldos__ tbody").append(fila4);
                  // $("#tablaSueldos__ tbody").append(fila5);
              
                  $("#tablaSueldos__").show();

                  $("#valores__Incrementos__Meses__script").html(`<script>
                  
                    $.getScript("layout/scripts/js/validacionBasica.js",function(){
                      funcion__solo__numero__montos($(".solo__numero__montos"));
                    });


                    var validador__monto__superior=function(parametro1,parametro2,parametro3,parametro5){
                      $("#botonFlotanteIncremento").show();
                      $(parametro1).on("input",function () {

                        let suma2 = 0;
                          $(".solo__numero__montos").each(function(){
                            if(isNaN(parseFloat($(this).val()))){
                                  
                            }else{
                              suma2 += parseFloat($(this).val());
                            }

                          if(parametro5 == "incremento"){
                            $("#botonFlotanteIncremento").text("Total Incremento: " + suma2.toFixed(2))
                            $("#botonFlotanteIncremento").val(suma2.toFixed(2));
                          }else if(parametro5 == "decremento"){
                            $("#botonFlotanteIncremento").text("Total Decremento: " + suma2.toFixed(2))
                            $("#botonFlotanteIncremento").val(suma2.toFixed(2));
                          }
                          
                  
                        });

                          if(parametro5 == "incremento"){

                              let suma = 0;
                              let valorAnterior = 0;

                              if(parseFloat($(this).val())>parseFloat($("#MontoPorAsignar__Incremento").val()) || parseFloat(suma2)>parseFloat($("#MontoPorAsignar__Incremento").val())){

                                valorAnterior = parseFloat($(this).val());
                                suma2 = suma2 - valorAnterior;
                                $("#botonFlotanteIncremento").text("Total Incremento: " + suma2.toFixed(2));
                                $("#botonFlotanteIncremento").val(suma2.toFixed(2));

                                alertify.set("notifier", "position", "top-center");
                                alertify.notify("Valor supera al monto total asignado", "error", 5, function () { });
                                $(this).val("");
                                $(parametro3).val($(parametro2).val());
                              }else{
              
                                if(!isNaN(parseFloat($(parametro1).val()))){
                                  suma=parseFloat($(parametro2).val()) + parseFloat($(this).val());
    
                                    $(parametro3).val(suma.toFixed(2));
                                }else{
                                  $(parametro3).val(parseFloat($(parametro2).val()));
                                }
              
                              }

                              
                          }else if(parametro5 == "decremento"){

                              let resta=0;
                              let valorAnterior = 0;

                              if(parseFloat($(this).val())>parseFloat($("#MontoPorAsignar__Incremento").val()) || parseFloat(suma2)>parseFloat($("#MontoPorAsignar__Incremento").val())){

                                valorAnterior = parseFloat($(this).val());
                                suma2 = suma2 - valorAnterior;

                                $("#botonFlotanteIncremento").text("Total Decremento: " + suma2.toFixed(2));
                                $("#botonFlotanteIncremento").val(suma2.toFixed(2));

                                alertify.set("notifier", "position", "top-center");
                                alertify.notify("Valor supera al monto total asignado", "error", 5, function () { });
                                $(this).val("");
                                $(parametro3).val($(parametro2).val());
                              
                              }else if(parseFloat($(this).val())>parseFloat($(parametro2).val())){
                                  valorAnterior = parseFloat($(this).val());
                                  suma2 = suma2 - valorAnterior;

                                  $("#botonFlotanteIncremento").text("Total Decremento: " + suma2.toFixed(2));
                                  $("#botonFlotanteIncremento").val(suma2.toFixed(2));

                                  alertify.set("notifier", "position", "top-center");
                                  alertify.notify("Valor supera al monto del mes", "error", 5, function () { });
                                  $(this).val("");
                                  $(parametro3).val($(parametro2).val());
                              }else{

                                  if(!isNaN(parseFloat($(parametro1).val()))){
                                    resta=parseFloat($(parametro2).val()) - parseFloat($(this).val());
  
                                    $(parametro3).val(resta.toFixed(2));

                                  }else{
                                    $(parametro3).val(parseFloat($(parametro2).val()));
                                  }

                              }
                          }

                      

                      });

                    }

                    // Enero
                    validador__monto__superior($("#EneroaportePatronalIncremento"),$("#EneroaportePatronal"),$("#EneroaportePatronalResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#EnerodecimoTerceroIncremento"),$("#EnerodecimoTercero"),$("#EnerodecimoTerceroResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#EnerodecimoCuartoIncremento"),$("#EnerodecimoCuarto"),$("#EnerodecimoCuartoResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#EnerofondosReservaIncremento"),$("#EnerofondosReserva"),$("#EnerofondosReservaResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#EnerosalarioIncremento"),$("#Enerosalario"),$("#EnerosalarioResultado"),$("#tipoTramite").val());

                    //Febrero

                    validador__monto__superior($("#FebreroaportePatronalIncremento"),$("#FebreroaportePatronal"),$("#FebreroaportePatronalResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#FebrerodecimoTerceroIncremento"),$("#FebrerodecimoTercero"),$("#FebrerodecimoTerceroResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#FebrerodecimoCuartoIncremento"),$("#FebrerodecimoCuarto"),$("#FebrerodecimoCuartoResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#FebrerofondosReservaIncremento"),$("#FebrerofondosReserva"),$("#FebrerofondosReservaResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#FebrerosalarioIncremento"),$("#Febrerosalario"),$("#FebrerosalarioResultado"),$("#tipoTramite").val());

                    //Marzo

                    validador__monto__superior($("#MarzoaportePatronalIncremento"),$("#MarzoaportePatronal"),$("#MarzoaportePatronalResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#MarzodecimoTerceroIncremento"),$("#MarzodecimoTercero"),$("#MarzodecimoTerceroResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#MarzodecimoCuartoIncremento"),$("#MarzodecimoCuarto"),$("#MarzodecimoCuartoResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#MarzofondosReservaIncremento"),$("#MarzofondosReserva"),$("#MarzofondosReservaResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#MarzosalarioIncremento"),$("#Marzosalario"),$("#MarzosalarioResultado"),$("#tipoTramite").val());

                    //Abril

                    validador__monto__superior($("#AbrilaportePatronalIncremento"),$("#AbrilaportePatronal"),$("#AbrilaportePatronalResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#AbrildecimoTerceroIncremento"),$("#AbrildecimoTercero"),$("#AbrildecimoTerceroResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#AbrildecimoCuartoIncremento"),$("#AbrildecimoCuarto"),$("#AbrildecimoCuartoResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#AbrilfondosReservaIncremento"),$("#AbrilfondosReserva"),$("#AbrilfondosReservaResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#AbrilsalarioIncremento"),$("#Abrilsalario"),$("#AbrilsalarioResultado"),$("#tipoTramite").val());

                    //Mayo

                    validador__monto__superior($("#MayoaportePatronalIncremento"),$("#MayoaportePatronal"),$("#MayoaportePatronalResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#MayodecimoTerceroIncremento"),$("#MayodecimoTercero"),$("#MayodecimoTerceroResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#MayodecimoCuartoIncremento"),$("#MayodecimoCuarto"),$("#MayodecimoCuartoResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#MayofondosReservaIncremento"),$("#MayofondosReserva"),$("#MayofondosReservaResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#MayosalarioIncremento"),$("#Mayosalario"),$("#MayosalarioResultado"),$("#tipoTramite").val());
                    
                    //Junio

                    validador__monto__superior($("#JunioaportePatronalIncremento"),$("#JunioaportePatronal"),$("#JunioaportePatronalResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#JuniodecimoTerceroIncremento"),$("#JuniodecimoTercero"),$("#JuniodecimoTerceroResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#JuniodecimoCuartoIncremento"),$("#JuniodecimoCuarto"),$("#JuniodecimoCuartoResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#JuniofondosReservaIncremento"),$("#JuniofondosReserva"),$("#JuniofondosReservaResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#JuniosalarioIncremento"),$("#Juniosalario"),$("#JuniosalarioResultado"),$("#tipoTramite").val());

                    //Julio

                    validador__monto__superior($("#JulioaportePatronalIncremento"),$("#JulioaportePatronal"),$("#JulioaportePatronalResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#JuliodecimoTerceroIncremento"),$("#JuliodecimoTercero"),$("#JuliodecimoTerceroResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#JuliodecimoCuartoIncremento"),$("#JuliodecimoCuarto"),$("#JuliodecimoCuartoResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#JuliofondosReservaIncremento"),$("#JuliofondosReserva"),$("#JuliofondosReservaResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#JuliosalarioIncremento"),$("#Juliosalario"),$("#JuliosalarioResultado"),$("#tipoTramite").val());

                    //Agosto

                    validador__monto__superior($("#AgostoaportePatronalIncremento"),$("#AgostoaportePatronal"),$("#AgostoaportePatronalResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#AgostodecimoTerceroIncremento"),$("#AgostodecimoTercero"),$("#AgostodecimoTerceroResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#AgostodecimoCuartoIncremento"),$("#AgostodecimoCuarto"),$("#AgostodecimoCuartoResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#AgostofondosReservaIncremento"),$("#AgostofondosReserva"),$("#AgostofondosReservaResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#AgostosalarioIncremento"),$("#Agostosalario"),$("#AgostosalarioResultado"),$("#tipoTramite").val());

                    //Septiembre

                    validador__monto__superior($("#SeptiembreaportePatronalIncremento"),$("#SeptiembreaportePatronal"),$("#SeptiembreaportePatronalResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#SeptiembredecimoTerceroIncremento"),$("#SeptiembredecimoTercero"),$("#SeptiembredecimoTerceroResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#SeptiembredecimoCuartoIncremento"),$("#SeptiembredecimoCuarto"),$("#SeptiembredecimoCuartoResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#SeptiembrefondosReservaIncremento"),$("#SeptiembrefondosReserva"),$("#SeptiembrefondosReservaResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#SeptiembresalarioIncremento"),$("#Septiembresalario"),$("#SeptiembresalarioResultado"),$("#tipoTramite").val());

                    //Octubre

                    validador__monto__superior($("#OctubreaportePatronalIncremento"),$("#OctubreaportePatronal"),$("#OctubreaportePatronalResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#OctubredecimoTerceroIncremento"),$("#OctubredecimoTercero"),$("#OctubredecimoTerceroResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#OctubredecimoCuartoIncremento"),$("#OctubredecimoCuarto"),$("#OctubredecimoCuartoResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#OctubrefondosReservaIncremento"),$("#OctubrefondosReserva"),$("#OctubrefondosReservaResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#OctubresalarioIncremento"),$("#Octubresalario"),$("#OctubresalarioResultado"),$("#tipoTramite").val());

                    //Noviembre

                    validador__monto__superior($("#NoviembreaportePatronalIncremento"),$("#NoviembreaportePatronal"),$("#NoviembreaportePatronalResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#NoviembredecimoTerceroIncremento"),$("#NoviembredecimoTercero"),$("#NoviembredecimoTerceroResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#NoviembredecimoCuartoIncremento"),$("#NoviembredecimoCuarto"),$("#NoviembredecimoCuartoResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#NoviembrefondosReservaIncremento"),$("#NoviembrefondosReserva"),$("#NoviembrefondosReservaResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#NoviembresalarioIncremento"),$("#Noviembresalario"),$("#NoviembresalarioResultado"),$("#tipoTramite").val());

                    //Diciembre
                  
                    validador__monto__superior($("#DiciembreaportePatronalIncremento"),$("#DiciembreaportePatronal"),$("#DiciembreaportePatronalResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#DiciembredecimoTerceroIncremento"),$("#DiciembredecimoTercero"),$("#DiciembredecimoTerceroResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#DiciembredecimoCuartoIncremento"),$("#DiciembredecimoCuarto"),$("#DiciembredecimoCuartoResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#DiciembrefondosReservaIncremento"),$("#DiciembrefondosReserva"),$("#DiciembrefondosReservaResultado"),$("#tipoTramite").val());

                    validador__monto__superior($("#DiciembresalarioIncremento"),$("#Diciembresalario"),$("#DiciembresalarioResultado"),$("#tipoTramite").val());


                    var sumaBonificaciones = function(parametro1,parametro2,parametro3,parametro4){
                      $(parametro1).on("input",function () {

                        var valorTotalInicial = parseFloat(parametro2.val());

                        $(parametro3).val(valorTotalInicial);

                        let suma = valorTotalInicial;
                        let resta = valorTotalInicial;

                        if(parametro4 == "incremento"){

                          $(parametro1).each(function(){
                            if(!isNaN(parseFloat($(this).val()))){
                              var valor = parseFloat($(this).val());
                                suma += valor;
                            }              
                          });

                          $(parametro3).val(suma.toFixed(2));
                        }else if(parametro4 == "decremento"){
                          $(parametro1).each(function(){
                            if(!isNaN(parseFloat($(this).val()))){
                              var valor = parseFloat($(this).val());
                                resta -= valor;
                            }              
                          });

                          $(parametro3).val(resta.toFixed(2));
                        }

                        
                      });
                    };

                    //Enero
                    sumaBonificaciones($(".solo__numero__0"),$("#EnerosalarioBonificaciones"),$("#EnerosalarioBonificacionesResultado"),$("#tipoTramite").val());

                    //Febrero
                    sumaBonificaciones($(".solo__numero__1"),$("#FebrerosalarioBonificaciones"),$("#FebrerosalarioBonificacionesResultado"),$("#tipoTramite").val());

                    //Marzo
                    sumaBonificaciones($(".solo__numero__2"),$("#MarzosalarioBonificaciones"),$("#MarzosalarioBonificacionesResultado"),$("#tipoTramite").val());

                    //Abril
                    sumaBonificaciones($(".solo__numero__3"),$("#AbrilsalarioBonificaciones"),$("#AbrilsalarioBonificacionesResultado"),$("#tipoTramite").val());

                    //Mayo
                    sumaBonificaciones($(".solo__numero__4"),$("#MayosalarioBonificaciones"),$("#MayosalarioBonificacionesResultado"),$("#tipoTramite").val());

                    //Junio
                    sumaBonificaciones($(".solo__numero__5"),$("#JuniosalarioBonificaciones"),$("#JuniosalarioBonificacionesResultado"),$("#tipoTramite").val());

                    //Julio
                    sumaBonificaciones($(".solo__numero_6"),$("#JuliosalarioBonificaciones"),$("#JuliosalarioBonificacionesResultado"),$("#tipoTramite").val());

                    //Agosto
                    sumaBonificaciones($(".solo__numero__7"),$("#AgostosalarioBonificaciones"),$("#AgostosalarioBonificacionesResultado"),$("#tipoTramite").val());

                    //Septiembre
                    sumaBonificaciones($(".solo__numero__8"),$("#SeptiembresalarioBonificaciones"),$("#SeptiembresalarioBonificacionesResultado"),$("#tipoTramite").val());

                    //Octubre
                    sumaBonificaciones($(".solo__numero__9"),$("#OctubresalarioBonificaciones"),$("#OctubresalarioBonificacionesResultado"),$("#tipoTramite").val());

                    //Noviembre
                    sumaBonificaciones($(".solo__numero__10"),$("#NoviembresalarioBonificaciones"),$("#NoviembresalarioBonificacionesResultado"),$("#tipoTramite").val());

                    //Diciembre
                    sumaBonificaciones($(".solo__numero__11"),$("#DiciembresalarioBonificaciones"),$("#DiciembresalarioBonificacionesResultado"),$("#tipoTramite").val());

                  </script>`);
                }                
              },
              error: function () {},
            });

            
            
          });

        }else if(idActividad == "sueldosH"){
          $("#contedorProyectoInfra").html(" "); 
          $(".body__actividadesEs__modificaciones__insertar").html(" ");
          $("#fila_eventos_od").hide();
          $("#eventos_intervencion_od_c").hide();
          $("#fila_infraestructura_od").hide();
          $("#fila_item_od").show();
          $("#items_od_c").show();
          $("#items__incrementos__od").show();
          $("#infraestructura_od_c").hide();
          $("#fila_sueldos_od").hide();
          $("#sueldos_od_c").hide();
          $("#fila_desvinculación_od").hide();
          $("#desvinculacion_od_c").hide();
          $(parametro2).html(" ");
          $("#sueldos_od").html(" ");
          $("#desvinculacion_od").html(" ");
          $("#codigo__presupuestarios__incrementos").val(" ");

          var indicador = 15;

          var paqueteDeDatos = new FormData();
          paqueteDeDatos.append("indicador", indicador);

      
          $.ajax({
            type: "POST",
            url: "modelosBd/incrementosDecrementos/selectores.md.php",
            contentType: false,
            data: paqueteDeDatos,
            processData: false,
            cache: false,
            success: function (response) {
              $("#fila_honorarios_od").show();
              $("#honorarios_od_c").show();
              $("#honorarios_od").html(" ");
              var elementos = JSON.parse(response);

              var data = elementos["informacionSeleccionada"];

              $("#honorarios_od").append(
                `<option value="0" class="text-center" >---Seleccione Personal Honorarios--</option>`
              );
              $("#honorarios_od").append(
                `<option value="vacante">Crear Personal Honorarios</option>`
              );

              $.each(data, function (index, option) {
                $("#honorarios_od").append(
                  `<option value="${option.idHonorarios}">${option.nombres}</option>`
                );
              });
            },
            error: function () {},
          });

        }else if(idActividad == "sueldosD"){
          $("#contedorProyectoInfra").html(" "); 
          $(".body__actividadesEs__modificaciones__insertar").html(" ");
          $("#fila_eventos_od").hide();
          $("#eventos_intervencion_od_c").hide();
          $("#fila_infraestructura_od").hide();
          $("#infraestructura_od_c").hide();
          $("#fila_sueldos_od").hide();
          $("#sueldos_od_c").hide();
          $("#fila_honorarios_od").hide();
          $("#honorarios_od_c").hide();
          $(parametro2).html(" ");
          $("#sueldos_od").html(" ");
          $("#honorarios_od").html(" ");
          $("#codigo__presupuestarios__incrementos").val(" ");

        }else{
          $("#contedorProyectoInfra").html(" "); 
          $(".body__actividadesEs__modificaciones__insertar").html(" ");
          $("#sectionTablaIncrementos").hide();

          $("#fila_item_od").show();
          $("#items_od_c").show();
          $("#fila_presupuestario").show();
          $("#codigo_presupuestario_od_c").show();
          $("#fila_infraestructura_od").hide();
          $("#infraestructura_od_c").hide();

          let tipoTramite = $("#tipoTramite").val();

           var paqueteDeDatos = new FormData();

          var indicador = 5;

          paqueteDeDatos.append("indicador", indicador);
          paqueteDeDatos.append("idActividad", idActividad);


          $("#fila_eventos_od").show();
          $("#eventos_intervencion_od_c").show();
          $(parametro2).html(" ");
          $(parametro3).html(" ");
          $("#codigo__presupuestarios__incrementos").val(" ");

          $.ajax({
            type: "POST",
            url: "modelosBd/incrementosDecrementos/selectores.md.php",
            contentType: false,
            data: paqueteDeDatos,
            processData: false,
            cache: false,
            success: function (response) {
              var elementos = JSON.parse(response);

              var data = elementos["informacionSeleccionada"];

              $(parametro3).append(
                `<option value="0" class="text-center" >---Seleccione un Evento---</option>`
              );

              if (tipoTramite == "incremento") {
                $(parametro3).append('<option value="eventoCrear">Crear Evento</option>');
              }
            
              
              $.each(data, function (index, option) {
                $(parametro3).append(
                  `<option value="${option.nombreEvento}">${option.nombreEvento2}</option>`
                );
              });
            },
            error: function () {},
          });
        }

        


	});


}

var valoresEventos__select = function(parametro1){
  $(parametro1).change(function () {
    $("#valores__Incrementos__Meses tbody").html(" ");
    $("#sectionTablaIncrementos").hide();
    $("#valores__Incrementos__Meses").hide();  
    $("#fila_infraestructura_od").hide();
    $("#infraestructura_od_c").hide();
    $(".body__actividadesEs__modificaciones__insertar").html(" ");
    
    let valorEventoNormal = $("#eventos_intervencion_od option:selected").text();;

    $("#nombreEventoNormal").val(valorEventoNormal);
    
    var idActividad = $("#actividades__incremento__od").val();
    var idOrganismo = $("#idOrganismo_S").val();
    var evento = $(this).val();
    
    if($(this).val() === "eventoCrear"){
      $("#items__incrementos__od").html(" ");
      $(".body__actividadesEs__modificaciones__insertar").html(" ");
      $("#codigo__presupuestarios__incrementos").val(" ");

      $("#tablaPoaInicial").show();
 
      $.getScript("layout/scripts/js/modificacion/modificacionEdicionInsercion.js",function(){
        //Sueldos
        // segmentosJsAjax($(".body__actividadesEs__modificaciones__insertar"),"actividadesPoas__modificaciones",4,"sueldos","crear",$(parametro1).val());


        segmentosJsAjax($(".body__actividadesEs__modificaciones__insertar"),"actividadesPoas__modificaciones",idActividad,"sueldos","crear",$(parametro1).val());
        // segmentosJsAjax($(".body__actividadesEs__modificaciones__insertar"),"actividadesPoas__modificaciones",4,"sueldos","modificar",$(parametro1).val());

        // segmentosJsAjax($(".body__actividadesEs__modificaciones__insertar"),"actividadesPoas__modificaciones",4,"honorarios","modificar",$(parametro1).val());

        // segmentosJsAjax($(".body__actividadesEs__modificaciones__insertar"),"actividadesPoas__modificaciones",$("#actividad__modificaciones__destino__modificaciones2__seleccion").val());
        
      });
      
    }else{

      $(".body__actividadesEs__modificaciones__insertar").html(" ");

      var indicador = 7;
      var paqueteDeDatos = new FormData();
      paqueteDeDatos.append("indicador", indicador);
      paqueteDeDatos.append("idActividad", idActividad);
      paqueteDeDatos.append("evento", evento);

      $.ajax({
        type: "POST",
        url: "modelosBd/incrementosDecrementos/selectores.md.php",
        contentType: false,
        data: paqueteDeDatos,
        processData: false,
        cache: false,
        success: function (response) {
          $("#items__incrementos__od").html(" ");
          $("#codigo__presupuestarios__incrementos").val(" ");
          var elementos = JSON.parse(response);

          var data = elementos["informacionSeleccionada"];

          $("#items__incrementos__od").append(
            `<option value="0" class="text-center" >---Seleccione un Item---</option>`
          );

          $.each(data, function (index, option) {
            $("#items__incrementos__od").append(
              `<option value="${option.idProgramacionFinanciera}">${option.nombreItem}</option>`
            );
          });
        },
        error: function () {},
      });
    }
  });
}

var valoresHonorarios__select = function(parametro1){
  $(parametro1).change(function (e) { 
    $("#sectionTablaIncrementos").hide();
    $("#valores__Incrementos__Meses tbody").html(" ");
    $("#valores__Incrementos__Meses").hide();
    $("#tablaPoaHonorarios").hide();
    $("#body__actividadesEs__incrementos__honorarios").html(" ");

    if($(parametro1).val() == "vacante"){

      $("#items__incrementos__od").html(" ");
      $(".body__actividadesEs__incrementos__honorarios").html(" ");
      $("#codigo__presupuestarios__incrementos").val(" ");

      $("#tablaPoaHonorarios").show();

      $.getScript("layout/scripts/js/modificacion/modificacionEdicionInsercion.js",function(){

        segmentosJsAjax($(".body__actividadesEs__incrementos__honorarios"),"actividadesPoas__modificaciones",4,"honorarios","crear",$(parametro1).val());

      });
    }else{
      var paqueteDeDatos = new FormData();

    let idHonorarios = $(parametro1).val();

    let indicador = 16;

    let idActividad = 4;
    
    paqueteDeDatos.append("indicador", indicador);
    paqueteDeDatos.append("idHonorarios", idHonorarios);
    paqueteDeDatos.append("idActividad", idActividad);


    $.ajax({
      type: "POST",
      url: "modelosBd/incrementosDecrementos/selectores.md.php",
      contentType: false,
      data: paqueteDeDatos,
      processData: false,
      cache: false,
      success: function (response) {
        $("#items__incrementos__od").html(" ");
      
        var elementos = JSON.parse(response);

        var data = elementos["informacionSeleccionada"];

        $("#items__incrementos__od").append(
          `<option value="0" class="text-center" >---Seleccione un Item--</option>`
        );

        $.each(data, function (index, option) {
          $("#items__incrementos__od").append(
            `<option value="${option.idProgramacionFinanciera}">${option.nombreItem}</option>`
          );
        });
      },
      error: function () {},
    });
    }

    

  });
}

var agregarValores__Tabla__incrementos = function(parametro1,parametro2){
    $(parametro1).change(function () {

        $("#crearNuevoEvento").remove();
        $(".body__actividadesEs__modificaciones__insertar").html(" ");

        $("#valores__Incrementos__Meses tbody").html(" ");
        $("#valores__Incrementos__Meses").hide();  

        var idActividad = $("#idActividad_Env").val();

        var idProgramacion = $(this).val();

        $("#idProgramacion_Guardar_Incremento").val(idProgramacion);

        var nombreInfra = $("#infraestructura_od").val();

        var nombreEvento = $("#eventos_intervencion_od").val();

        var tipoTramite = $("#tipoTramite").val();

        var paqueteDeDatos = new FormData();

          var indicador = 9;

          paqueteDeDatos.append("indicador", indicador);
          paqueteDeDatos.append("idProgramacion", idProgramacion);
          paqueteDeDatos.append("idActividad", idActividad);
          paqueteDeDatos.append("nombreInfra", nombreInfra);
          paqueteDeDatos.append("nombreEvento", nombreEvento);

          $("#sectionTablaIncrementos").show();
          $("#valores__Incrementos__Meses").show();
    
          $.ajax({
            type: "POST",
            url: "modelosBd/incrementosDecrementos/selectores.md.php",
            contentType: false,
            data: paqueteDeDatos,
            processData: false,
            cache: false,
            success: function (response) {
              var elementos = JSON.parse(response);

              var data = elementos["informacionSeleccionada"];

              var sumaTotal = 0;

              
                $.each(data, function (indiceFila, fila) {

                    $.each(fila, function (indiceColumna, valor) {
                      let valorMeses = asignacionMeses(indiceFila, indiceColumna);
      
                      var fila = $("<tr>");
                      var celda = $("<td align='center'>").text(valorMeses);
                      fila.append(celda);
      
                      var celda2 = $("<td>").append(
                        `<input type='text' id='${valorMeses
                        }ItemMesInicial' style='width:100%!important; border:none!important;text-align:center!important;' value='${valor}' readonly style='border:none!important' class='form-control'/>`
                      );
                      fila.append(celda2);
                      var celda3 = $("<td align='center'>").append(
                        `<input type='text' id='${valorMeses
                        }ItemMesResultado' value='${valor}' style="width:100%!important; text-align:center!important;" readonly class='solo__numero__montos2 form-control'/>`
                      );
                      fila.append(celda3);
                      if(tipoTramite == "incremento"){
                        var celda4 = $("<td align='center'>").append(
                            `<input type='text' class='solo__numero__montos cambio__de__numero__f form-control' id='${valorMeses}ItemMesValorIncremento' value='0' style='width:100%!important;' attr='${valorMeses}'/>`
                          );
                      }else if(tipoTramite == "decremento"){

                        if(parseFloat(valor) > 0){
                            var celda4 = $("<td align='center'>").append(
                                `<input type='text' class='solo__numero__montos cambio__de__numero__f form-control' id='${valorMeses}ItemMesValorIncremento' value='0'  style='width:100%!important;' attr='${valorMeses}'/>`
                              );
                        }else if(parseFloat(valor) == 0){
                            var celda4 = $("<td align='center'>");
                        }
                        
                      }
                      
                      fila.append(celda4);
                      
                      sumaTotal = parseFloat(valor) + sumaTotal;
      
                      $("#valores__Incrementos__Meses tbody").append(fila);

                      var idInputEvaluado = `${valorMeses}ItemMesValorIncremento`;
                        
                      verificaMesActual(valorMeses,$("#"+idInputEvaluado));

                    });
                  });
      
                    
                    var filaTotal = $("<tr>");
                    var celdaT = $("<td>").text("Total:")
                    filaTotal.append(celdaT);
                    var celdaT2 = $("<td align='center'>").append(`<input type='text' id='totalBase' name='totalBase' style='width:100%!important;text-align:center!important;' readonly value='${parseFloat(sumaTotal).toFixed(2)}' class='form-control'/>`);
                    filaTotal.append(celdaT2);
                    var celdaT3 = $("<td>").append(`<input type='hidden' class='form-control' id='totalMesesIncrementosBase' name='totalMesesIncrementosBase' value='0' style='width:100%!important;' />`);
                    filaTotal.append(celdaT3);
                    var celdaT4 = $("<td>").append(`<input type='text' class='form-control' id='totalMesesIncrementos' name='totalMesesIncrementos' value='0' style='width:100%!important;' disabled="disabled"/>`);
                    filaTotal.append(celdaT4);
                    $("#valores__Incrementos__Meses tbody").append(filaTotal);
            
                $(parametro2).html(`<script>

                var contador = 0;
                $.getScript("layout/scripts/js/validacionBasica.js",function(){
                  funcion__solo__numero__montos($(".solo__numero__montos"));
                });

                $.getScript("layout/scripts/js/incrementosDecrementos/selector.js",function(){

                    var sumarIndicadoresIncrementos__Global=function(parametro1,parametro2,parametro3){

                        $(parametro1).keyup(function () {

                            var sum = 0;
                            $(parametro1).each(function(){
                                if(isNaN(parseFloat($(this).val()))){
                                  
                                }else{
                                  sum += parseFloat($(this).val());
                                }
                  
                            });

                            $(parametro2).val(sum.toFixed(2));
                            $("#totalOrigen").val(sum.toFixed(2));

                            
                        });

                    }
                    sumarIndicadoresIncrementos__Global($(".solo__numero__montos"),$("#totalMesesIncrementos"));

                });

                $.getScript("layout/scripts/js/incrementosDecrementos/selector.js",function(){
                  cambio__Numero_Incremento($(".cambio__de__numero__f"));
                });

                    var validador__monto__superior=function(parametro1,parametro2,parametro3,parametro4,parametro5){

                        $(parametro1).on("input",function () {

                            if(parametro5 == "incremento"){

                                let suma = 0;
                                let suma2 = 0;
                                $(".solo__numero__montos").each(function(){
                                  if(isNaN(parseFloat($(this).val()))){
                                    
                                  }else{
                                    suma2 += parseFloat($(this).val());
                                  }
                    
                                });


                                if(parseFloat($(this).val())>parseFloat($("#MontoPorAsignar__Incremento").val()) || parseFloat(suma2)>parseFloat($("#MontoPorAsignar__Incremento").val())){

                                  alertify.set("notifier", "position", "top-center");
                                  alertify.notify("Valor supera al monto total asignado a incrementar", "error", 5, function () { });
                                  $(this).val("");
                                  $(parametro3).val($(parametro2).val());
                                }else{
                
                                  if(!isNaN(parseFloat($(parametro1).val()))){
                                    suma=parseFloat($(parametro2).val()) + parseFloat($(this).val());
      
                                      $(parametro3).val(suma.toFixed(2));
                                      $(parametro4).val(suma.toFixed(2));
  
                                  }else{
                                    $(parametro3).val(parseFloat($(parametro2).val()));
                                  }
                
                                }

                                
                            }else if(parametro5 == "decremento"){

                                let resta=0;
                                let suma2 = 0;
                                $(".solo__numero__montos").each(function(){
                                  if(isNaN(parseFloat($(this).val()))){
                                    
                                  }else{
                                    suma2 += parseFloat($(this).val());
                                  }
                    
                                });

                                if(parseFloat($(this).val())>parseFloat($("#MontoPorAsignar__Incremento").val()) || parseFloat(suma2)>parseFloat($("#MontoPorAsignar__Incremento").val())){

                                  alertify.set("notifier", "position", "top-center");
                                  alertify.notify("Valor supera al monto total asignado a decrementar", "error", 5, function () { });
                                  $(this).val("");
                                  $(parametro3).val($(parametro2).val());
                                }

                                if(parseFloat($(this).val())>parseFloat($(parametro2).val())){

                                    alertify.set("notifier", "position", "top-center");
                                    alertify.notify("Valor supera al monto del mes", "error", 5, function () { });
                                    $(this).val("");
                                    $(parametro3).val($(parametro2).val());
                                }else{
    
                                    if(!isNaN(parseFloat($(parametro1).val()))){
                                      resta=parseFloat($(parametro2).val()) - parseFloat($(this).val());
    
                                      $(parametro3).val(resta.toFixed(2));
  
                                    }else{
                                      $(parametro3).val(parseFloat($(parametro2).val()));
                                    }

                                }
                            }

                        

                        });

                    }
                    validador__monto__superior($("#EneroItemMesValorIncremento"),$("#EneroItemMesInicial"),$("#EneroItemMesResultado"),$("#eneroOrigen__restando"),$("#tipoTramite").val(),$(".solo__numero__montos"));

                    validador__monto__superior($("#FebreroItemMesValorIncremento"),$("#FebreroItemMesInicial"),$("#FebreroItemMesResultado"),$("#febreroOrigen__restando"),$("#tipoTramite").val());

                    validador__monto__superior($("#MarzoItemMesValorIncremento"),$("#MarzoItemMesInicial"),$("#MarzoItemMesResultado"),$("#marzoOrigen__restando"),$("#tipoTramite").val());
                    
                    validador__monto__superior($("#AbrilItemMesValorIncremento"),$("#AbrilItemMesInicial"),$("#AbrilItemMesResultado"),$("#abrilOrigen__restando"),$("#tipoTramite").val());

                    validador__monto__superior($("#MayoItemMesValorIncremento"),$("#MayoItemMesInicial"),$("#MayoItemMesResultado"),$("#mayoOrigen__restando"),$("#tipoTramite").val());

                    validador__monto__superior($("#JunioItemMesValorIncremento"),$("#JunioItemMesInicial"),$("#JunioItemMesResultado"),$
                    ("#junioOrigen__restando"),$("#tipoTramite").val());

                    validador__monto__superior($("#JulioItemMesValorIncremento"),$("#JulioItemMesInicial"),$("#JulioItemMesResultado"),$("#julioOrigen__restando"),$("#tipoTramite").val());

                    validador__monto__superior($("#AgostoItemMesValorIncremento"),$("#AgostoItemMesInicial"),$("#AgostoItemMesResultado"),$("#agostoOrigen__restando"),$("#tipoTramite").val());

                    validador__monto__superior($("#SeptiembreItemMesValorIncremento"),$("#SeptiembreItemMesInicial"),$("#SeptiembreItemMesResultado"),$("#septiembreOrigen__restando"),$("#tipoTramite").val());

                    validador__monto__superior($("#OctubreItemMesValorIncremento"),$("#OctubreItemMesInicial"),$("#OctubreItemMesResultado"),$("#octubreOrigen__restando"),$("#tipoTramite").val());

                    validador__monto__superior($("#NoviembreItemMesValorIncremento"),$("#NoviembreItemMesInicial"),$("#NoviembreItemMesResultado"),$("#noviembreOrigen__restando"),$("#tipoTramite").val());

                    validador__monto__superior($("#DiciembreItemMesValorIncremento"),$("#DiciembreItemMesInicial"),$("#DiciembreItemMesResultado"),$("#diciembreOrigen__restando"),$("#tipoTramite").val());

                  
                    var suma__Total__Base=function(valor1,parametro1,parametro2,parametro3,parametro5){
                        $(valor1).on("input", function () {

                            if(parametro5 == "incremento"){

                                let suma = 0;
                                

                                $(".solo__numero__montos2").each(function(){
                                  let valorInicial = parseFloat($(this).val());
                                  if(isNaN(parseFloat($(this).val()))){
                                    $(this).val(valorInicial);
                                  }else{
                                    suma +=parseFloat($(this).val());
                                    $(parametro3).val(suma.toFixed(2));
                                  }
                    
                              });


                            }else if(parametro5 == "decremento"){

                                let resta=0;

                                if(parseFloat($(parametro1).val())>parseFloat($(parametro2).val())){

                                    alertify.set("notifier", "position", "top-center");
                                    alertify.notify("Valor supera al monto", "error", 5, function () { });
                                    $(this).val(0);
                                    $(parametro3).val($(parametro2).val());
                                }else{
    
                                    resta -=parseFloat($(parametro2).val()) - parseFloat($(parametro1).val());
    
                                    $(parametro3).val(resta.toFixed(2));
   
                                }
                            }

                        

                        });
                    }

                    suma__Total__Base($(".solo__numero__montos"),$("#totalMesesIncrementos"),$("#totalBase"),("#totalMesesIncrementosBase"),$("#tipoTramite").val());
                    
                    
            </script>`);
            },
            error: function () {},
          });

          

    });
}

var asignacionMeses = function(parametro,parametro2){
  if(parametro == 0 && parametro2 == 0){
      return "Enero";
  }else if(parametro == 0 && parametro2 == 1){
      return "Febrero";
  }else if(parametro == 0 && parametro2 == 2){
      return "Marzo";
  }else if(parametro == 0 && parametro2 == 3){
      return "Abril";
  }else if(parametro == 0 && parametro2 == 4){
      return "Mayo";
  }else if(parametro == 0 && parametro2 == 5){
      return "Junio";
  }else if(parametro == 0 && parametro2 == 6){
      return "Julio";
  }else if(parametro == 0 && parametro2 == 7){
      return "Agosto";
  }else if(parametro == 0 && parametro2 == 8){
      return "Septiembre";
  }else if(parametro == 0 && parametro2 == 9){
      return "Octubre";
  }else if(parametro == 0 && parametro2 == 10){
      return "Noviembre";
  }else if(parametro == 0 && parametro2 == 11){
      return "Diciembre";
  }
};

var mesesDecimoCuarto = function(mes,region,decimoC,divididosC,mensualizaC){
   let dCuarta = 0; 
  if(mensualizaC =="si"){
    dCuarta = divididosC;
  }else{
    if(mes == "Marzo" && region == "Costa"){
      dCuarta = decimoC
    }else if(mes == "Agosto" && region != "Costa"){
      dCuarta = decimoC;
    }else{
      dCuarta = 0;
    }
  }

  return dCuarta;
}

var mesesDecimoTercero = function(mes,decimoT,divididosT,mensualizaT){
  let dTercero = 0; 
 if(mensualizaT =="si"){
  dTercero = divididosT;
 }else{
   if(mes == "Diciembre"){
    dTercero = decimoT
   }else{
    dTercero = 0;
   }
 }

 return dTercero;
}

var verificaMesActual = function(mesLetras,idInput){
  var meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

  var posicion = meses.indexOf(mesLetras);
  var fecha = new Date();
  var valorMes = fecha.getMonth();

  if(valorMes > posicion){
    $(idInput).prop("readonly", true);
    $(idInput).css("pointer-events", "none");
  }
}

var verificaMesActualSueldos = function(mesLetras,idInputPatronal,inputTercero,inputCuarto,inputFondo,inputSalario){
  var meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

  var posicion = meses.indexOf(mesLetras);
  var fecha = new Date();
  var valorMes = fecha.getMonth();

  if(valorMes > posicion){
    $(idInputPatronal).prop("readonly", true);
    $(idInputPatronal).css("pointer-events", "none");
    $(inputTercero).prop("readonly", true);
    $(inputTercero).css("pointer-events", "none");
    $(inputCuarto).prop("readonly", true);
    $(inputCuarto).css("pointer-events", "none");
    $(inputFondo).prop("readonly", true);
    $(inputFondo).css("pointer-events", "none");
    $(inputSalario).prop("readonly", true);
    $(inputSalario).css("pointer-events", "none");
  }
}

var item_presupuestario_o__meses__autocompletados__incrementos = function (
  selector,
  meses,
  idOrganismo,
  parametro4
) {
  $(selector).change(function () {
    $(".body__actividadesEs__modificaciones__insertar").html(" ");
    var idItem = $(this).val();
    var idActividad = $("#actividades__incremento__od").val();

    var paqueteDeDatos = new FormData();

    var indicador = 3;

    paqueteDeDatos.append("indicador", indicador);
    paqueteDeDatos.append("idItem", idItem);
    paqueteDeDatos.append("idActividad", idActividad);

    $.ajax({
      type: "POST",
      url: "modelosBd/incrementosDecrementos/selectores.md.php",
      contentType: false,
      data: paqueteDeDatos,
      processData: false,
      cache: false,
      success: function (response) {
        var elementos = JSON.parse(response);

        var data = elementos["informacionSeleccionada"];

        for (x of data) {
          $("#codigo__presupuestarios__incrementos").val(x.itemPreesupuestario);
        }
      },
      error: function () {},
    });
  });
};

var sumaTotalDatos__Base = function (parametro1) {
  var sumaTotal = 0;

  $(parametro1).each(function () {
    sumaTotal += parseFloat($(this).val()) || 0;
    console.log(sumaTotal);
    // $("#totalBase").value(sumaTotal);
  });
};


var sumarIndicadoresGlobal__principal=function(parametro1,parametro2){

    $(parametro1).on("input", function () {

        var suma = 0;
        $(parametro1).each(function(){
            var valor = parseFloat($(this).val()) || 0;
            suma = valor + suma;
        });
        $(parametro2).val(suma.toFixed(2));

    });

}


var guardar__incrementos__tramites = function(boton, tipo, array) {

    $(boton).click(function(e) {

      let idActividad = 0;
      let nombreEvento = 0;
      let nombreInfra = 0;
      let idItemProF = 0;
      let idItemPresupuestario = 0;
      let justificacion = 0;
      let documento = 0;
      let documentoVerfica = 0;
      //Valores mensuales antes del incremento
      let eneroP = 0;
      let febreroP = 0;
      let marzoP = 0;
      let abrilP = 0;
      let mayoP = 0;
      let junioP = 0;
      let julioP = 0;
      let agostoP = 0;
      let septiembreP = 0;
      let octubreP = 0;
      let noviembreP = 0;
      let diciembreP = 0;
      let totalP = 0;
      //Valores mensuales, suma de los incrementos + los valores iniciales  
      let eneroR = 0;
      let febreroR = 0;
      let marzoR = 0;
      let abrilR = 0;
      let mayoR = 0;
      let junioR = 0;
      let julioR = 0;
      let agostoR = 0;
      let septiembreR = 0;
      let octubreR = 0;
      let noviembreR = 0;
      let diciembreR = 0;
      let totalR = 0;
      //Valores mensuales, de los incrementos
      let enero = 0;
      let febrero = 0;
      let marzo = 0;
      let abril = 0;
      let mayo = 0;
      let junio = 0;
      let julio = 0;
      let agosto = 0;
      let septiembre = 0;
      let octubre = 0;
      let noviembre = 0;
      let diciembre = 0;
      let tramite = 0;
      let totalEjecutado = 0;


      let eneroI= 0;
      let febreroI= 0;
      let marzoI= 0;
      let abrilI= 0;
      let mayoI= 0;
      let junioI= 0;
      let julioI= 0;
      let agostoI= 0;
      let septiembreI= 0;
      let octubreI= 0;
      let noviembreI= 0;
      let diciembreI= 0;
      let tipoP = "";

        var paqueteDeDatos = new FormData();

        if($(array[0]).val() == "sueldos"){
          idActividad = 4;
          nombreEvento = $("#sueldos_od").val();
          nombreInfra = " ";
          idItemProF = $("#sueldos_od").val();
          idItemPresupuestario = $("#sueldos_od").val();
          justificacion = $(array[5]).val();
          documento = $(array[6])[0].files[0];
          documentoVerfica = $(array[6])[0];
          enero = $("#EnerosalarioBonificacionesResultado").val();
          febrero = $("#FebrerosalarioBonificacionesResultado").val();
          marzo = $("#MarzosalarioBonificacionesResultado").val();
          abril = $("#AbrilsalarioBonificacionesResultado").val();
          mayo = $("#MayosalarioBonificacionesResultado").val();
          junio = $("#JuniosalarioBonificacionesResultado").val();
          julio = $("#JuliosalarioBonificacionesResultado").val();
          agosto = $("#AgostosalarioBonificacionesResultado").val();
          septiembre = $("#SeptiembresalarioBonificacionesResultado").val();
          octubre = $("#OctubresalarioBonificacionesResultado").val();
          noviembre = $("#NoviembresalarioBonificacionesResultado").val();
          diciembre = $("#DiciembresalarioBonificacionesResultado").val();

          let sumaTotalSueldo = parseFloat(enero) + parseFloat(febrero) + parseFloat(marzo) + parseFloat(abril) + parseFloat(mayo) + parseFloat(junio) + parseFloat(julio) + parseFloat(agosto) + parseFloat(septiembre) + parseFloat(octubre) + parseFloat(noviembre) + parseFloat(diciembre);

          tramite = $(array[7]).val();
          totalEjecutado = $("#botonFlotanteIncremento").val();
          totalTotales = sumaTotalSueldo.toFixed(2);

          // let arrayG = [];
          // let arrayAporte = [];
          // let arraydecimoTercer = [];
          // let arraydecimoCuarto = [];
          // let arrayFondos = [];
          // let arraySalarios = [];


          eneroI= $("#EneroaportePatronalIncremento").val();
          febreroI= $("#FebreroaportePatronalIncremento").val();
          marzoI= $("#MarzoaportePatronalIncremento").val();
          abrilI= $("#AbrilaportePatronalIncremento").val();
          mayoI= $("#MayoaportePatronalIncremento").val();
          junioI= $("#JunioaportePatronalIncremento").val();
          julioI= $("#JulioaportePatronalIncremento").val();
          agostoI= $("#AgostoaportePatronalIncremento").val();
          septiembreI= $("#SeptiembreaportePatronalIncremento").val();
          octubreI= $("#OctubreaportePatronalIncremento").val();
          noviembreI= $("#NoviembreaportePatronalIncremento").val();
          diciembreI= $("#DiciembreaportePatronalIncremento").val();
          tipoP = "aporte";
          

        }else if($(array[0]).val() == "sueldosH"){
          idActividad = 4;
          nombreEvento = $("#honorarios_od").val();
          nombreInfra = " ";
          idItemProF = $("#honorarios_od").val();
          idItemPresupuestario = $(array[4]).val();
          justificacion = $(array[5]).val();
          documento = $(array[6])[0].files[0];
          documentoVerfica = $(array[6])[0];
          enero = $("#EneroItemMesResultado").val();
          febrero = $("#FebreroItemMesResultado").val();
          marzo = $("#MarzoItemMesResultado").val();
          abril = $("#AbrilItemMesResultado").val();
          mayo = $("#MayoItemMesResultado").val();
          junio = $("#JunioItemMesResultado").val();
          julio = $("#JulioItemMesResultado").val();
          agosto = $("#AgostoItemMesResultado").val();
          septiembre = $("#SeptiembreItemMesResultado").val();
          octubre = $("#OctubreItemMesResultado").val();
          noviembre = $("#NoviembreItemMesResultado").val();
          diciembre = $("#DiciembreItemMesResultado").val();
          tramite = $(array[7]).val();
          totalEjecutado = $("#totalMesesIncrementos").val();
          totalTotales = $("#totalMesesIncrementosBase").val();
        }else{

          idActividad = $(array[0]).val();
          nombreEvento = $(array[1]).val();
          nombreInfra = $(array[2]).val();
          idItemProF = $(array[3]).val();
          idItemPresupuestario = $(array[4]).val();
          justificacion = $(array[5]).val();
          documento = $(array[6])[0].files[0];
          documentoVerfica = $(array[6])[0];
 
          eneroP = $("#EneroItemMesInicial").val();
          febreroP = $("#FebreroItemMesInicial").val();
          marzoP = $("#MarzoItemMesInicial").val();
          abrilP = $("#AbrilItemMesInicial").val();
          mayoP = $("#MayoItemMesInicial").val();
          junioP = $("#JunioItemMesInicial").val();
          julioP = $("#JulioItemMesInicial").val();
          agostoP = $("#AgostoItemMesInicial").val();
          septiembreP = $("#SeptiembreItemMesInicial").val();
          octubreP = $("#OctubreItemMesInicial").val();
          noviembreP = $("#NoviembreItemMesInicial").val();
          diciembreP = $("#DiciembreItemMesInicial").val();

          totalP = parseFloat(eneroP)+parseFloat(febreroP)+parseFloat(marzoP)+parseFloat(abrilP)+parseFloat(mayoP)+parseFloat(junioP)+parseFloat(julioP)+parseFloat(agostoP)+parseFloat(septiembreP)+parseFloat(octubreP)+parseFloat(noviembreP)+parseFloat(diciembreP);

          eneroR = $("#EneroItemMesResultado").val();
          febreroR = $("#FebreroItemMesResultado").val();
          marzoR = $("#MarzoItemMesResultado").val();
          abrilR = $("#AbrilItemMesResultado").val();
          mayoR = $("#MayoItemMesResultado").val();
          junioR = $("#JunioItemMesResultado").val();
          julioR = $("#JulioItemMesResultado").val();
          agostoR = $("#AgostoItemMesResultado").val();
          septiembreR = $("#SeptiembreItemMesResultado").val();
          octubreR = $("#OctubreItemMesResultado").val();
          noviembreR = $("#NoviembreItemMesResultado").val();
          diciembreR = $("#DiciembreItemMesResultado").val();

          totalR = parseFloat(eneroR)+parseFloat(febreroR)+parseFloat(marzoR)+parseFloat(abrilR)+parseFloat(mayoR)+parseFloat(junioR)+parseFloat(julioR)+parseFloat(agostoR)+parseFloat(septiembreR)+parseFloat(octubreR)+parseFloat(noviembreR)+parseFloat(diciembreR);
        }



          let valorEventoNormal =  $("#nombreEventoNormal").val();
        
          if($("#EneroItemMesValorIncremento").length){
            enero = $("#EneroItemMesValorIncremento").val();
          }else{
            enero = 0;
          }
          if($("#FebreroItemMesValorIncremento").length){
            febrero = $("#FebreroItemMesValorIncremento").val();
          }else{
            febrero = 0;
          }
          if($("#MarzoItemMesValorIncremento").length){
            marzo = $("#MarzoItemMesValorIncremento").val();
          }else{
            marzo = 0;
          }
          if($("#AbrilItemMesValorIncremento").length){
            abril = $("#AbrilItemMesValorIncremento").val();
          }else{
            abril = 0;
          }
          if($("#MayoItemMesValorIncremento").length){
            mayo = $("#MayoItemMesValorIncremento").val();
          }else{
            mayo = 0;
          }
          if($("#JunioItemMesValorIncremento").length){
            junio = $("#JunioItemMesValorIncremento").val();
          }else{
            junio = 0;
          }
          if($("#JulioItemMesValorIncremento").length){
            julio = $("#JulioItemMesValorIncremento").val();
          }else{
            julio = 0;
          }
          if($("#AgostoItemMesValorIncremento").length){
            agosto = $("#AgostoItemMesValorIncremento").val();
          }else{
            agosto = 0;
          }
          if($("#SeptiembreItemMesValorIncremento").length){
            septiembre = $("#SeptiembreItemMesValorIncremento").val();
          }else{
            septiembre = 0;
          }
          if($("#OctubreItemMesValorIncremento").length){
            octubre = $("#OctubreItemMesValorIncremento").val();
          }else{
            octubre = 0;
          }
          if($("#NoviembreItemMesValorIncremento").length){
            noviembre = $("#NoviembreItemMesValorIncremento").val();
          }else{
            noviembre = 0;
          }
          if($("#DiciembreItemMesValorIncremento").length){
            diciembre = $("#DiciembreItemMesValorIncremento").val();
          }else{
            diciembre = 0;
          }

          tramite = $(array[7]).val();
          totalEjecutado = $("#totalMesesIncrementos").val();

          if(parseFloat(totalEjecutado) <= 0){
            alertify.set("notifier", "position", "top-center");
            alertify.notify(
              `El monto total de la asignación del ${tramite} no puede ser cero`,
              "error",
              3,
              function () {}
            );
          } else {
            alertify.confirm(
              "¿Está seguro de guardar el Trámite? ",
              function (result) {
                if (result) {
                  $(boton).hide();
  
                  if (nombreEvento == null) {
                    nombreEvento = "N/A";
                  }
                  if (nombreInfra == null) {
                    nombreInfra = "N/A";
                  }
  
                  paqueteDeDatos.append("tipo", tipo);
                  paqueteDeDatos.append("idActividad", idActividad);
                  paqueteDeDatos.append("nombreEvento", nombreEvento);
                  paqueteDeDatos.append("nombreInfra", nombreInfra);
                  paqueteDeDatos.append("idItemProF", idItemProF);
                  paqueteDeDatos.append(
                    "idItemPresupuestario",
                    idItemPresupuestario
                  );
                  paqueteDeDatos.append("justificacion", justificacion);
                  paqueteDeDatos.append("documento", documento);
                  paqueteDeDatos.append("enero", enero);
                  paqueteDeDatos.append("febrero", febrero);
                  paqueteDeDatos.append("marzo", marzo);
                  paqueteDeDatos.append("abril", abril);
                  paqueteDeDatos.append("mayo", mayo);
                  paqueteDeDatos.append("junio", junio);
                  paqueteDeDatos.append("julio", julio);
                  paqueteDeDatos.append("agosto", agosto);
                  paqueteDeDatos.append("septiembre", septiembre);
                  paqueteDeDatos.append("octubre", octubre);
                  paqueteDeDatos.append("noviembre", noviembre);
                  paqueteDeDatos.append("diciembre", diciembre);
                  paqueteDeDatos.append("tramite", tramite);
                  paqueteDeDatos.append("totalEjecutado", totalEjecutado);
  
                  paqueteDeDatos.append("eneroP", eneroP);
                  paqueteDeDatos.append("febreroP", febreroP);
                  paqueteDeDatos.append("marzoP", marzoP);
                  paqueteDeDatos.append("abrilP", abrilP);
                  paqueteDeDatos.append("mayoP", mayoP);
                  paqueteDeDatos.append("junioP", junioP);
                  paqueteDeDatos.append("julioP", julioP);
                  paqueteDeDatos.append("agostoP", agostoP);
                  paqueteDeDatos.append("septiembreP", septiembreP);
                  paqueteDeDatos.append("octubreP", octubreP);
                  paqueteDeDatos.append("noviembreP", noviembreP);
                  paqueteDeDatos.append("diciembreP", diciembreP);
                  paqueteDeDatos.append("totalP", totalP);
  
                  paqueteDeDatos.append("eneroR", eneroR);
                  paqueteDeDatos.append("febreroR", febreroR);
                  paqueteDeDatos.append("marzoR", marzoR);
                  paqueteDeDatos.append("abrilR", abrilR);
                  paqueteDeDatos.append("mayoR", mayoR);
                  paqueteDeDatos.append("junioR", junioR);
                  paqueteDeDatos.append("julioR", julioR);
                  paqueteDeDatos.append("agostoR", agostoR);
                  paqueteDeDatos.append("septiembreR", septiembreR);
                  paqueteDeDatos.append("octubreR", octubreR);
                  paqueteDeDatos.append("noviembreR", noviembreR);
                  paqueteDeDatos.append("diciembreR", diciembreR);
                  paqueteDeDatos.append("totalR", totalR);
                 
  
                  paqueteDeDatos.append("eneroI", parseFloat(eneroI));
                  paqueteDeDatos.append("febreroI", parseFloat(febreroI));
                  paqueteDeDatos.append("marzoI", parseFloat(marzoI));
                  paqueteDeDatos.append("abrilI", parseFloat(abrilI));
                  paqueteDeDatos.append("mayoI", parseFloat(mayoI));
                  paqueteDeDatos.append("junioI", parseFloat(junioI));
                  paqueteDeDatos.append("julioI", parseFloat(julioI));
                  paqueteDeDatos.append("agostoI", parseFloat(agostoI));
                  paqueteDeDatos.append("septiembreI", parseFloat(septiembreI));
                  paqueteDeDatos.append("octubreI", parseFloat(octubreI));
                  paqueteDeDatos.append("noviembreI", parseFloat(noviembreI));
                  paqueteDeDatos.append("diciembreI", parseFloat(diciembreI));
                  paqueteDeDatos.append("tipoP", tipoP);
                  paqueteDeDatos.append("valorEventoNormal", valorEventoNormal);
  
  
  
                  for (const entry of paqueteDeDatos.entries()) {
                    console.log(entry[0] + ": " + entry[1]);
                  }
  
                  $.ajax({
                    type: "POST",
                    url: "modelosBd/incrementosDecrementos/inserta.md.php",
                    contentType: false,
                    data: paqueteDeDatos,
                    processData: false,
                    cache: false,
                    success: function (response) {
                      let elementos = JSON.parse(response);
                      let mensaje = elementos["mensaje"];
  
                      if (mensaje == 1) {
  
                        alertify.set("notifier", "position", "top-center");
                        alertify.notify(
                          "Registro realizado correctamente",
                          "success",
                          5,
                          function () {}
                        );
  
                        window.setTimeout(function () {
                          window.location = "incrementosOrganismo";
                        }, 3000);
                      }
                    },
                    error: function () {},
                  });
                } else {
                  alertify.set("notifier", "position", "top-center");
                  alertify.notify(
                    "Acccion Cancelada",
                    "error",
                    3,
                    function () {}
                  );
                }
              }
            );
          }
      });
        
        
};


var cambio__Numero_Incremento=function(parametro1){

  $(parametro1).on('click', function () {

    if ($(this).val()==0) {
  
      $(this).val(" ");
  
    }
  
  });
  
  $(parametro1).on('blur', function () {
  
    if ($(this).val()==" " || $(this).val()=="") {
  
      $(this).val(0);
  
    }
  
  });

}
