$(document).ready(function () {
  $.getScript(
    "layout/scripts/js/incrementosDecrementos/validacionSegmentosIncrementos.js",
    function () {
      var segmentosJsAjax__modificaciones = function (parametro1, parametro2) {
        var paqueteDeDatos = new FormData();

        paqueteDeDatos.append("tipo", parametro2);
        var idOrganismoPrincipal = $("#idOrganismoPrincipal").val();
        paqueteDeDatos.append("idOrganismoPrincipal", idOrganismoPrincipal);

        $.ajax({
          type: "POST",
          url: "modelosBd/incrementosDecrementos/selecciona.md.php",
          contentType: false,
          data: paqueteDeDatos,
          processData: false,
          cache: false,
          success: function (response) {
            var elementos = JSON.parse(response);

            /*=================================================
                   =            Llamar variables del json            =
                   =================================================*/

            var informacionSeleccionada = elementos["informacionSeleccionada"];
            var obtenerInformacion2 = elementos["obtenerInformacion2"];
            var obtenerInformacion3 = elementos["obtenerInformacion3"];

            var obtenerInformacionItems = elementos["obtenerInformacionItems"];

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

            var bandera = false;
            var bandera2 = false;

            /*=========================================================
                   =            recorriendo y creando los modales            =
                   =========================================================*/

            for (x of informacionSeleccionada) {
              /*==============================================
                       =            Ocultar tabla de items            =
                       ==============================================*/

              $(".contenedorItemsC" + x.idActividades).hide();

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

              $(parametro1).append(
                '<tr class="fila__acC' +
                  x.idActividades +
                  ' checkeds__indicadores"><td style="font-weight:bold;"><center>0' +
                  x.idActividades +
                  "</center></td><td><center>" +
                  x.nombreActividades +
                  "</center></td><td><center>" +
                  x.indicador +
                  "</center></td></tr>"
              );

              $("#crear" + x.idActividades).click(function (e) {
                let today = new Date();
                let day = today.getDate();

                let dayEntero = parseInt(day, 10);

                if (dayEntero > 15) {
                  $(".ocultos__evidencias").show();

                  let variableR = "no";

                  $(".evidenciaCargadas").val(variableR);
                }
              });

              if (
                $("#estadoFinal").val() != "" &&
                $("#estadoFinal").val() != undefined &&
                $("#estadoFinal").val() != null &&
                $("#estadoFinal").val() != " " &&
                $("#organismoIdPrin").val() != "1158" &&
                $("#organismoIdPrin").val() != "1353" &&
                $("#organismoIdPrin").val() != "1539" &&
                $("#organismoIdPrin").val() != "1641" &&
                $("#organismoIdPrin").val() != "1276" &&
                $("#organismoIdPrin").val() != "1346" &&
                $("#organismoIdPrin").val() != "1168" &&
                $("#organismoIdPrin").val() != "1574" &&
                $("#organismoIdPrin").val() != "1524" &&
                $("#organismoIdPrin").val() != "1169"
              ) {
              }

              /*=====  End of creación de las filas de la tabla por cada actividad  ======*/

              /*==========================================
                       =            Asignar el checked            =
                       ==========================================*/

              if (idx != -1) {
                $("#crear" + x.idActividades).attr("checked", "checked");

                // $(".fila__ac"+x.idActividades).append('<td class="filaAc_'+x.idActividades+'"><center><input type="checkbox" data-bs-toggle="modal" data-bs-target="#modalActividadItem'+x.idActividades+'" id="crearItemAc'+x.idActividades+'"/></center></td>');

                $(".itemsContents" + x.idActividades).append(
                  '<input type="hidden" id="idActividad' +
                    x.idActividades +
                    '" name="idActividad' +
                    x.idActividades +
                    '" value="' +
                    x.idActividades +
                    '">'
                );

                if (
                  $("#estadoFinal").val() != "" &&
                  $("#estadoFinal").val() != undefined &&
                  $("#estadoFinal").val() != null &&
                  $("#estadoFinal").val() != " " &&
                  $("#organismoIdPrin").val() != "1158" &&
                  $("#organismoIdPrin").val() != "1353" &&
                  $("#organismoIdPrin").val() != "1539" &&
                  $("#organismoIdPrin").val() != "1641" &&
                  $("#organismoIdPrin").val() != "1276" &&
                  $("#organismoIdPrin").val() != "1346" &&
                  $("#organismoIdPrin").val() != "1168" &&
                  $("#organismoIdPrin").val() != "1574" &&
                  $("#organismoIdPrin").val() != "1524" &&
                  $("#organismoIdPrin").val() != "1169"
                ) {
                  //$(".filaAc_"+x.idActividades).append('Puede visualizar la información en su reportería');
                  //$("#crearItemAc"+x.idActividades).remove();
                }

                bandera = true;

                if (idx2 != -1) {
                  $("#crearItemAc" + x.idActividades).attr(
                    "checked",
                    "checked"
                  );

                  var paqueteDeDatos = new FormData();

                  var idOrganismo = $("#organismoIdPrin").val();

                  paqueteDeDatos.append("tipo", "gruposItems");
                  paqueteDeDatos.append("idActividades", x.idActividades);
                  paqueteDeDatos.append("idOrganismoPrincipal", idOrganismo);

                  $.ajax({
                    type: "POST",
                    url: "modelosBd/inserta/seleccionaAcciones.md.php",
                    contentType: false,
                    data: paqueteDeDatos,
                    processData: false,
                    cache: false,
                    success: function (response) {
                      var elementos = JSON.parse(response);

                      var idActividades = elementos["idActividades"];

                      var arrayGrupo51 = elementos["arrayGrupo51"];
                      var arrayGrupo53 = elementos["arrayGrupo53"];
                      var arrayGrupo57 = elementos["arrayGrupo57"];
                      var arrayGrupo58 = elementos["arrayGrupo58"];
                      var arrayGrupo84 = elementos["arrayGrupo84"];

                      var arrayAguaLuz = elementos["arrayAguaLuz"];

                      var arrayGrupoHonorarios =
                        elementos["arrayGrupoHonorarios"];

                      var obtenerInformacionItems =
                        elementos["obtenerInformacionItems"];

                      /*=====================================
                                    =            Items totales            =
                                    =====================================*/
                      var array3 = new Array();

                      for (xcl of obtenerInformacionItems) {
                        array3.push(xcl.idItem);
                      }
                      /*=====  End of Items totales  ======*/

                      var headMeses = [
                        "Enero",
                        "Febrero",
                        "Marzo",
                        "Abril",
                        "Mayo",
                        "Junio",
                        "Julio",
                        "Agosto",
                        "Septiembre",
                        "Octubre",
                        "Noviembre",
                        "Diciembre",
                      ];

                      if (
                        idActividades == 3 ||
                        idActividades == 5 ||
                        idActividades == 6 ||
                        idActividades == 7
                      ) {
                        if (!$(".act3__" + idActividades).length > 0) {
                          $(".fila__acC" + idActividades).append(
                            '<td class="act3__' +
                              idActividades +
                              '"><center><div class="row d d-flex justify-content-center;"><a class="col-12" style="color:black!important; cursor:pointer; text-transform:uppercase;" attr="' +
                              array3 +
                              '" idOrganismo="' +
                              $("#organismoIdPrin").val() +
                              '" idActividad="' +
                              idActividades +
                              '" data-bs-toggle="modal" data-bs-target="#modal__editarEventos" id="enlaceMatriz' +
                              idActividades +
                              '">Actividades Deportivas</a></div></center></td>'
                          );
                        }

                        /*================================================================
                                        =            Añadir valores a modal y construir tabla            =
                                        ================================================================*/

                        $.getScript(
                          "layout/scripts/js/modificacion/modificacionPoaConstruccion.js",
                          function () {
                            enlacesMatriz(
                              $("#enlaceMatriz" + idActividades),
                              [
                                "CÓDIGO ÍTEM",
                                "ÍTEM",
                                "TIPO DE FINANCIAMIENTO",
                                "NOMBRE DEL EVENTO",
                                "DEPORTE",
                                "PROVINCIA",
                                "SEDE CIUDAD -  PAIS",
                                "ALCANCE",
                                "FECHA INICIO",
                                "FECHA FIN",
                                "GÉNERO",
                                "CATEGORÍA",
                                "No.<br>ENTRENADORES OFICIALES",
                                "No. ATLETAS",
                                "TOTAL",
                                "MUJERES (BENEFICIARIOS)",
                                "HOMBRES (BENEFICIARIOS)",
                                "Detalle lo que el organismo va a adquirir",
                                "Justificación de la adquisición del bien o servicio",
                                "Cantidad del bien o servicio a adquirir",
                              ],
                              headMeses,
                              "Total Programación Financiera",
                              idActividades,
                              "poa__actividadesDeportivas",
                              true
                            );
                          }
                        );

                        /*=====  End of Añadir valores a modal y construir tabla  ======*/

                        if (
                          $("#estadoFinal").val() != "" &&
                          $("#estadoFinal").val() != undefined &&
                          $("#estadoFinal").val() != null &&
                          $("#estadoFinal").val() != " " &&
                          $("#organismoIdPrin").val() != "1158" &&
                          $("#organismoIdPrin").val() != "1353" &&
                          $("#organismoIdPrin").val() != "1539" &&
                          $("#organismoIdPrin").val() != "1641" &&
                          $("#organismoIdPrin").val() != "1276" &&
                          $("#organismoIdPrin").val() != "1346" &&
                          $("#organismoIdPrin").val() != "1168" &&
                          $("#organismoIdPrin").val() != "1574" &&
                          $("#organismoIdPrin").val() != "1524" &&
                          $("#organismoIdPrin").val() != "1169"
                        ) {
                          // $(".act3__"+idActividades).empty();
                          //$(".act3__"+idActividades).append('<center>Puede visualizar la información en su reportería</center>');
                        }
                      }
                    },
                    error: function () {},
                  });

                  bandera2 = true;
                }
              }

              /*=====  End of Asignar el checked  ======*/

              /*======================================================================================================
                       =            Añadiendo clases para despues sumar en la parte de programación de indicadores            =
                       ======================================================================================================*/

              $(".primerTrimestre" + x.idActividades).addClass(
                "unanimes__clases" + x.idActividades
              );
              $(".segundoTrimestre" + x.idActividades).addClass(
                "unanimes__clases" + x.idActividades
              );
              $(".tercerTrimestre" + x.idActividades).addClass(
                "unanimes__clases" + x.idActividades
              );
              $(".cuartoTrimestre" + x.idActividades).addClass(
                "unanimes__clases" + x.idActividades
              );

              /*=====  End of Añadiendo clases para despues sumar en la parte de programación de indicadores  ======*/

              /*===============================================
                       =            Añadiendo incluir ceros            =
                       ===============================================*/

              incluirCeros($(".primerTrimestre" + x.idActividades));
              incluirCeros($(".segundoTrimestre" + x.idActividades));
              incluirCeros($(".tercerTrimestre" + x.idActividades));
              incluirCeros($(".cuartoTrimestre" + x.idActividades));

              /*=====  End of Añadiendo incluir ceros  ======*/

              /*=========================================
                       =            Sumar indicadores            =
                       =========================================*/

              sumarIndicadores(
                $(".unanimes__clases" + x.idActividades),
                $(".metaAnualIndicador" + x.idActividades)
              );

              /*=====  End of Sumar indicadores  ======*/

              /*==============================================
                       =            Actualizar información            =
                       ==============================================*/

              selectObjetivosEstrategicos(
                $("#crear" + x.idActividades),
                $(".objetivoEstaregicoSelect" + x.idActividades),
                x.idActividades,
                $(".idAtributoEscondido")
              );

              obteniendoInputEscondido(
                $(".botonAcbotonItems" + x.idActividades),
                x.idActividades,
                $(".idAtributoEscondido")
              );

              selectObjetivosPrincipal(
                $("#crear" + x.idActividades),
                $(".objetivoPrincipalSelect" + x.idActividades)
              );
              programasPrincipal(
                $("#crear" + x.idActividades),
                $(".programaSelect" + x.idActividades)
              );

              selectPrograma(
                $(".objetivoPrincipalSelect" + x.idActividades),
                $(".programaSelect" + x.idActividades)
              );

              guardarElementos__modificaciones(
                $("#insertar" + x.idActividades),
                $(".formModalActividades" + x.idActividades),
                $(".reload__EnviosrealizadosAc"),
                "poaOrganismo__actualiza",
                x.idActividades
              );

              actualizaInfor(
                $("#crear" + x.idActividades),
                "actividadesUso",
                $(".idOrganismo"),
                x.idActividades,
                $(".formModalActividades" + x.idActividades),
                [
                  $(".primerTrimestre" + x.idActividades),
                  $(".segundoTrimestre" + x.idActividades),
                  $(".tercerTrimestre" + x.idActividades),
                  $(".cuartoTrimestre" + x.idActividades),
                  $(".metaAnualIndicador" + x.idActividades),
                ]
              );

              /*=====  End of Actualizar información  ======*/

              /*=========================================
                       =            Información items            =
                       =========================================*/

              // crear items

              segmentosJs(
                $("#agregarItems" + x.idActividades),
                $(".itemsContents" + x.idActividades),
                ["select"],
                [19],
                10,
                "agregarItesOrganismosPre",
                x.idActividades
              );

              // ver items

              // tablasJs($("#verItemsActividades"+x.idActividades));

              if ($("#envioPreliminar").val() == "A") {
                // $("#agregarItems"+x.idActividades).hide();
              }

              /*=====  End of Información items  ======*/

              /*=======================================
                       =            Ocultar mostrar            =
                       =======================================*/

              var ocultarVariables = function (
                parametro1,
                parametro2,
                parametro3,
                parametro4
              ) {
                $(parametro1).click(function (e) {
                  $(parametro2).hide();
                  $(parametro3).show();
                });
              };

              ocultarVariables(
                $("#verItemsActividades" + x.idActividades),
                $(".unanimeEl__" + x.idActividades),
                $(".contenedorItemsC" + x.idActividades),
                true
              );
              ocultarVariables(
                $("#agregarItems" + x.idActividades),
                $(".contenedorItemsC" + x.idActividades),
                $(".unanimeEl__" + x.idActividades),
                false
              );

              /*=====  End of Ocultar mostrar  ======*/

              /*=====================================================
                       =            Eviatar el cambio del checked            =
                       =====================================================*/

              var evitarCambioChecked = function (parametro1, parametro2) {
                $(parametro1).click(function (e) {
                  e.preventDefault();
                });
              };

              evitarCambioChecked($("#crearItemAc" + x.idActividades));
              evitarCambioChecked($("#crear" + x.idActividades));

              /*=====  End of Eviatar el cambio del checked  ======*/

              /*==================================================
                       =            Datatablets items anidados            =
                       ==================================================*/

              var presionarItemsFuncion = function (parametro1, parametro2) {
                $(parametro1).click(function (e) {
                  $.getScript(
                    "layout/scripts/js/ajax/datatablet.js",
                    function () {
                      $("#tablaItemsAc" + parametro2)
                        .dataTable()
                        .fnDestroy();

                      if ($("#envioPreliminar").val() == "A") {
                        datatablets(
                          $("#tablaItemsAc" + parametro2),
                          "tablaItemsAc" + parametro2,
                          [$("#organismoIdPrin").val(), parametro2],
                          objetos(
                            [15, 16],
                            ["boton", "boton"],
                            [
                              "<center><a class='itemsEscogidosEliminar estilo__botonDatatablets btn btn-danger pointer__botones'><i class='fas fa-trash'></i></a><center>",
                              "<center><a class='itemsEscogidosEditar estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#editarMesesItems'><i class='fas fa-user-edit'></i></a><center>",
                            ],
                            [false],
                            [false]
                          ),
                          -1,
                          [
                            "funcion__datatabletsEliminar",
                            "funcion__editarNue",
                          ],
                          ["itemsEscogidosEliminar", "itemsEscogidosEditar"],
                          ["itemsPoaEliminas", "itemsPoaEditas"],
                          ["elimina", "edita"]
                        );
                      } else {
                        datatablets(
                          $("#tablaItemsAc" + parametro2),
                          "tablaItemsAc" + parametro2,
                          [$("#organismoIdPrin").val(), parametro2],
                          objetos(
                            [15, 16],
                            ["boton", "boton"],
                            [
                              "<center><a class='itemsEscogidosEliminar estilo__botonDatatablets btn btn-danger pointer__botones'><i class='fas fa-trash'></i></a><center>",
                              "<center><a class='itemsEscogidosEditar estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#editarMesesItems'><i class='fas fa-user-edit'></i></a><center>",
                            ],
                            [false],
                            [false]
                          ),
                          -1,
                          [
                            "funcion__datatabletsEliminar",
                            "funcion__editarNue",
                          ],
                          ["itemsEscogidosEliminar", "itemsEscogidosEditar"],
                          ["itemsPoaEliminas", "itemsPoaEditas"],
                          ["elimina", "edita"]
                        );
                      }
                    }
                  );
                });
              };

              presionarItemsFuncion(
                $("#verItemsActividades" + x.idActividades),
                x.idActividades
              );

              /*=====  End of Datatablets items anidados  ======*/
            }

            if (bandera == false) {
              $(".columna__item").hide();
            } else {
              $(".columna__item").show();
            }

            if (bandera2 == false) {
              $(".columna__matricez").hide();
            } else {
              $(".columna__matricez").show();
            }

            /*=====  End of recorriendo y creando los modales  ======*/
          },
          error: function () {},
        });
      };

      segmentosJsAjax__modificaciones(
        $(".body__actividades__incrementos__editar"),
        "actividadesPoa__incrementos"
      );
    }
  );
});
