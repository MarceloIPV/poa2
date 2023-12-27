var datatablets__funcio__repor__incrementos__v__1 = function (tabla, identificador, parametro3) {

  /*==============================================
  =            Establecer datatablets            =
  ==============================================*/

  var table2 = $(tabla).DataTable({

    "language": {

      "sProcessing": "Procesando...",
      "sLengthMenu": "Mostrar _MENU_ registros",
      "sZeroRecords": "No se encontraron resultados",
      "sEmptyTable": "Ningún dato disponible en esta tabla",
      "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
      "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
      "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix": "",
      "sSearch": "Buscar:",
      "sUrl": "",
      "sInfoThousands": ",",
      "sLoadingRecords": "No existen datos",
      "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    },

    dom: 'Bfrtip',
      buttons: [
        {
          
          extend: 'excel',
          className: 'btn-excel',
          title:'Incrementos',
          text: '<button  class="buttonD" ><i class="fas fa-file-excel" style="color: #277c41; font-size: 36px;" ></i></button>',
      },
    
      {
        extend: 'pdf',
        title: 'Incrementos',
        text: '<button  class="buttonD" ><i class="fas fa-file-pdf " style="color: #BF0D0D; font-size: 36px;"></i></button>',
      
        orientation: 'landscape',
        customize:function(doc) {

            doc.defaultStyle.fontSize = 6;

            doc.styles.title = {
                color: 'black',
                fontSize: '6',
                alignment: 'center',
                margin:'0'                                                
            }
            doc.styles.tableHeader = {

              fillColor:'#311b92',
              fontSize: '6',
              color:'white',
              alignment:'center',
                              
          }
          

          }

        }
    ],

    "bLengthChange": false,
    "pagingType": "full_numbers",
    "Paginate": true,
    "pagingType": "full_numbers",
    "retrieve": true,
    "paging": true,
    "pageLength": 20,

    scrollX: true,
    fixedHeader: true,

    "ajax": {

      "method": "POST",
      "url": "modelosBd/incrementosDecrementos/datatablets.md.php",
      "data": {
        "identificador": identificador
      }

    },

    "aoColumnDefs": [
      {

        "aTargets":6, 
        "mRender": (function (data, type, row) {

           return `<center>${row['cedula']}</center>`;

         }) 

      },
      {

        "aTargets":7, 
        "mRender": (function (data, type, row) {

          return `<center>${row['responsable']}</center>`;

         }) 

      },
      {

        "aTargets":8, 
        "mRender": (function (data, type, row) {

          return `<center>${row['nombreInversion']}</center>`;

         }) 

      },
      {

        "aTargets":9, 
        "mRender": (function (data, type, row) {

          if (row['incrementoValor'] == null) {
            return "<center><span> </span></center>";
          }else{
            return `<center><span>${row['incrementoValor']}</span></center>`;
          }

         }) 

      },
      {

        "aTargets": 10,
        "mRender": (function (data, type, row) {

          if (row['estadoIncre'] == "ENVIADO" || row['incrementoValor'] != null) {
            return "<center><button class='asignar__boton__incre__decre estilo__botonDatatablets btn btn-primary' data-toggle='modal' data-target='#modalAsignarPre' disabled='true'>Asignar</button></center>";
          } else {
            return "<center><button class='asignar__boton__incre__decre estilo__botonDatatablets btn btn-primary' data-toggle='modal' data-target='#modalAsignarPre'>Asignar</button></center>";
          }

        })

      },
      {

        "aTargets":11, 
        "mRender": (function (data, type, row) {

          return `<center>${row['increDecre']}</center>`;

         }) 

      },
      {

        "aTargets": 12,
        "mRender": (function (data, type, row) {

          if (row['increDecre'] == "N/A") {
            return "<center><span></span></center>";
          } else {

            if (row['estadoIncre'] == "ENVIADO") {
              return `<center>${row['estadoIncre']}</center>`;
            } else {
              return "<button class='asignar__boton__incre__decre__envio estilo__botonDatatablets btn btn-warning' data-toggle='modal' data-target='#modalEnvioOD'>Enviar</button>";
            }
          }
        })

      },
      {

        "aTargets": 13,
        "mRender": (function (data, type, row) {

          if (row['estadoIncre'] == "ENVIADO" || row['incrementoValor'] == null) {
            return "<button class='asignar__boton__incre__decre__eliminar estilo__botonDatatablets btn btn-danger' disabled='true'>Eliminar</button>";
          } else {
            return "<button class='asignar__boton__incre__decre__eliminar estilo__botonDatatablets btn btn-danger'>Eliminar</button>";
          }


        })

      },

    ]

  });

  /*=====  End of Establecer datatablets s ======*/

  funcion__incrementos__decrementos("#asignarPresupuestoMo__incrementos__v__1 tbody", table2);
  funcion__incrementos__decrementos__eliminar("#asignarPresupuestoMo__incrementos__v__1 tbody", table2);

  funcion__incrementos__decrementos__envio("#asignarPresupuestoMo__incrementos__v__1 tbody", table2);

}

var funcion__incrementos__decrementos = function (tbody, table) {

  $(tbody).on("click", "button.asignar__boton__incre__decre", function (e) {

    e.preventDefault();

    let data = table.row($(this).parents("tr")).data();

    $("#titulo__od__organismos").text(data[1]);

    $("#montoIngresadoModificacion__incrementos").val(data[7]);

    $("#idOrganismo__m").val(data[10]);

    $("#montoIngresadoModificacion__incrementos_N").val(data[7]);

    $("#total__Incrementos_M_N").val(data[6]);

    let montoFormat = data[6];
    let montoF = parseFloat(montoFormat).toLocaleString('en-US');
    $("#montoTotal__Modificacion__incrementos").val(montoF);

    console.log(data);

  });

}

var funcion__incrementos__decrementos__envio = function (tbody, table) {

  $(tbody).on("click", "button.asignar__boton__incre__decre__envio", function (e) {

    e.preventDefault();

    let data = table.row($(this).parents("tr")).data();

    $("#titulo__od__organismos__").text(data[1]);

    $("#idOrganismo__m__").val(data[10]);

    $("#montoIngresadoModificacion__incrementos_N").val(data[7]);

    $("#total__Incrementos_M_N").val(data[6]);

    console.log(data);

  });

}

var funcion__incrementos__decrementos__eliminar = function (tbody, table) {

  $(tbody).on("click", "button.asignar__boton__incre__decre__eliminar", function (e) {

    e.preventDefault();

    $(".asignar__boton__incre__decre__eliminar").hide();


    let data = table.row($(this).parents("tr")).data();

    var confirm = alertify.confirm('¿Está seguro de eliminar el registro?', '¿Está seguro de eliminar el registro?', null, null).set('labels', { ok: 'Confirmar', cancel: 'Cancelar' });

    confirm.set({ transition: 'slide' });

    confirm.set('onok', function () {


      let paqueteDeDatos = new FormData();

      let identificador__pagina = $("#identificador__pagina").val();

      paqueteDeDatos.append('tipo', 'eliminar__incre__decrementos');
      paqueteDeDatos.append('idOrganismo', data[10]);
      paqueteDeDatos.append('identificador__pagina', identificador__pagina);

      $.ajax({

        type: "POST",
        url: "modelosBd/incrementosDecrementos/elimina.md.php",
        contentType: false,
        data: paqueteDeDatos,
        processData: false,
        cache: false,
        success: function (response) {

          let elementos = JSON.parse(response);
          let mensaje = elementos['mensaje'];

          if (mensaje == 1) {

            alertify.set("notifier", "position", "top-center");
            alertify.notify("Registro eliminado correctamente", "success", 5, function () { });

            table.ajax.reload(null,false);
          }


        },
        error: function () {

        }

      });

    });

    confirm.set('oncancel', function () { //callbak al pulsar botón negativo
      alertify.set("notifier", "position", "top-center");
      alertify.notify("Acción cancelada", "error", 1, function () { });
      $(".asignar__boton__incre__decre__eliminar").show();
    });



  });

}



var datatablets__funcio__repor__incrementos__v__2 = function (tabla, identificador, parametro3) {

  /*==============================================
  =            Establecer datatablets            =
  ==============================================*/

  var table2 = $(tabla).DataTable({

    "language": {

      "sProcessing": "Procesando...",
      "sLengthMenu": "Mostrar _MENU_ registros",
      "sZeroRecords": "No se encontraron resultados",
      "sEmptyTable": "Ningún dato disponible en esta tabla",
      "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
      "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
      "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix": "",
      "sSearch": "Buscar:",
      "sUrl": "",
      "sInfoThousands": ",",
      "sLoadingRecords": "No existen datos",
      "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    },

    "bLengthChange": false,
    "pagingType": "full_numbers",
    "Paginate": false,
    "pagingType": "full_numbers",
    "retrieve": true,
    "paging": true,
    "pageLength": 10,


    "ajax": {

      "method": "POST",
      "url": "modelosBd/incrementosDecrementos/datatablets.md.php",
      "data": {
        "identificador": identificador
      }

    },

    "aoColumnDefs": [

      {

        "aTargets": 5,
        "mRender": (function (data, type, row) {

          return `<center>${row['representante']}</center>`;

        })

      },
      {

        "aTargets": 6,
        "mRender": (function (data, type, row) {

          return `<center>${row['tramite']}</center>`;

        })

      },
      {

        "aTargets": 7,
        "mRender": (function (data, type, row) {

          return `<center>${row['fecha']}</center>`;

        })

      },
      {

        "aTargets": 8,
        "mRender": (function (data, type, row) {

          return `<center>${row['valorIncremento']}</center>`;

        })

      },
      {

        "aTargets": 9,
        "mRender": (function (data, type, row) {

          return `<center>${row['valorTechoA']}</center>`;

        })

      },
      {

        "aTargets": 10,
        "mRender": (function (data, type, row) {

          return "<button class='reasignar__boton__incremento estilo__botonDatatablets btn btn-primary' data-toggle='modal' data-target='#modalAprobarD'>Aprobar</button>";

        })

      },
      
    ]

  });

  /*=====  End of Establecer datatablets s ======*/

  funcion__decrementos__Dpi("#asignarPresupuestoMo__revisor__v__1 tbody", table2);

}


var funcion__decrementos__Dpi = function(tbody,table){
  $(tbody).on("click","button.reasignar__boton__incremento",function(e){
        
    e.preventDefault();

    var data=table.row($(this).parents("tr")).data();

    $(".titulos_modal").text(data[1]);
    let idOrganismo = data[9];
    let idPreeliminar = data[10];

    var variableFront = $("#filesFrontend").val();

    datatablets__tramites__Incrementos__Analistas($("#tramites_Incrementos_Analistas"),"tramites_Incrementos_Analistas",idOrganismo,variableFront);

    $.getScript(
      "layout/scripts/js/incrementosDecrementos/metodos.js",
      function () {


        ocultarSeccionesModal($("#contenedorTablaTramitesIncrementos"));
        ocultarSeccionesModal($(".fila__incrementos__devolver"));

        agregar__Valores__Poa_Incrementos($(".poaIncrementosAbrir"),idOrganismo,$("#fisicamenteEstructura__na").val(),$("#idRolAd").val(),idPreeliminar);

        agregar__Valores__Poa_Aprobado($(".poaAprobadoAbrir"),idOrganismo,$("#fisicamenteEstructura__na").val(),$("#idRolAd").val(),idPreeliminar);

        envioObservacionesPlanificacionOrganismo([$("#archivoResolucionP"),idOrganismo,idPreeliminar,$("#fechaLimiteIncremento"),$("#observacionesTramite")]);

        verificaObservacionesDecrementos(idOrganismo,idPreeliminar);

        agregarSelectorObservacionDecremento();

      });
         

  });
}


var funcion__incrementos__decrementos__veras = function (tbody, table) {

  $(tbody).on("click", "button.asignar__boton__incre__decre__aprobar", function (e) {

    e.preventDefault();

    let data = table.row($(this).parents("tr")).data();

    

    $("#exampleModalLabel").text(data[1]);

    $("#idOrganismo__m__n").val(data[9]);

    var tramite = data[5];
    var signo ="";

    $("#tipoTramite_").val(tramite);

    if(tramite == "incremento"){
      signo = "+";
      $("#tramiteOd").text(`POA APROBADO ${signo} ${tramite.toUpperCase()}`);

    }else if(tramite == "decremento"){
      signo = "-";
      $("#tramiteOd").text(`POA APROBADO ${signo} ${tramite.toUpperCase()}`);
    }

    $("#idIncrementos").val(data[10]);



   

    let idOrganismo = $("#idOrganismo__m__n").val();

    let fisicamenteE = $("#fisicamenteE").val();

    let idRolAd = $("#idRolAd").val();

    

    $("#verPoaAprobado__").click(function (e) { 
      e.preventDefault();

      let paqueteDeDatos = new FormData();

      paqueteDeDatos.append('tipo', 'poa_aprobado_sin_cambios');

      paqueteDeDatos.append('idOrganismo', idOrganismo);

      paqueteDeDatos.append('fisicamenteE', fisicamenteE);

      paqueteDeDatos.append('idRolAd', idRolAd);

      $.ajax({

        type: "POST",
        url: "modelosBd/incrementosDecrementos/selecciona.md.php",
        contentType: false,
        data: paqueteDeDatos,
        processData: false,
        cache: false,
        success: function (response) {
  
          $.getScript("layout/scripts/js/incrementosDecrementos/validacionSegmentosIncrementos.js", function () {
  
            var elementos = JSON.parse(response);
            var obtenerInformacion = elementos['obtenerInformacion'];
            var obtenerAcCa = elementos['obtenerAcCa'];
            var indicadorInformacion = elementos['indicadorInformacion'];
  
  
            $(".contenedor__bodyCMatriz").append(' ');
  
            $(".elementosCreados__M").remove();
  
            $(".creados__letter").remove();
  
  
            if (!$(".sumado__indicadores").length > 0) {
  
              $(".contenedor__bodyCMatriz").append('<div class="col col-12 text-center sumado__indicadores" style="font-size:14px; font-weight:bold;">Indicadores</div><br><br>');
  
              $(".contenedor__bodyCMatriz").append('<div class="col col-12 text-center" style="font-weight:bold;">Actividad - indicador</div><div class="col col-2 text-center" style="font-weight:bold;">Primer trimestre</div><div class="col col-1 text-center" style="font-weight:bold;">Segundo Trimestre</div><div class="col col-1 text-center" style="font-weight:bold;">Tercer trimestre</div><div class="col col-2 text-center" style="font-weight:bold;">Cuarto trimestre</div><div class="col col-2 text-center" style="font-weight:bold;">Meta indicador</div>');
  
  
              for (z of indicadorInformacion) {
  
                $(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center">' + z.indicador + '</div><div class="col col-2 text-center">' + z.primertrimestre + '</div><div class="col col-1 text-center">' + z.segundotrimestre + '</div><div class="col col-1 text-center">' + z.tercertrimestre + '</div><div class="col col-2 text-center">' + z.cuartotrimestre + '</div><div class="col col-2 text-center">' + z.metaindicador + '</div>');
  
  
              }
  
  
              if (data[9] != null && data[9] != "") {
  
                $(".contenedor__bodyCMatriz").append('<div class="col col-12 text-center" style="font-size:14px; font-weight:bold;">Documentos anexos</div><br><br>');
  
                var arreglo = data[9].split("_________");
  
                for (var i = 0; i < arreglo.length; i++) {
  
  
                  $(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center"><a href="' + $("#filesFrontend").val() + 'anexosPoa/' + arreglo[i] + '" target="_blank">' + arreglo[i] + '</a></div>');
  
                }
  
  
              }
  
            }
  
            if (obtenerAcCa != "") {
  
  
  
              $(".contenedor__bodyCMatriz").append('<div class="col col-12"  style="width:100%;" style="display:flex; flex-direction:column; justify-content:center; align-items:center;"><button class="ver__Tabla btn btn-primary creados__letter" style="cursor:pointer; color:white!important;" data-toggle="modal" data-target="#modalVerValoresPoa" idTipo="1" >VER POA&nbsp;&nbsp;<i class="fas fa-eye icono__boton" style="color:white!important;"></i></button></div>');
  
  
              // $(".contenedor__bodyCMatriz").append('<button type="button" class="btn btn-success excelProyectos col col-1 elementosCreados__M"><i class="fas fa-file-excel"></i>&nbsp;&nbsp;EXCEL</button><br><br>');
  
              $(".elementosCreados__M").hide();
  
              for (c of obtenerInformacion) {
  
                $("#valoresPoaObservar").append('<tr><td>' + c.idActividades + "-" + c.nombreActividades + '</td><td>' + c.itemPreesupuestario + "-" + c.nombreItem + '</td><td><center>' + parseFloat(c.enero).toFixed(2) + '</center></td><td><center>' + parseFloat(c.febrero).toFixed(2) + '</center></td><td><center>' + parseFloat(c.marzo).toFixed(2) + '</center></td><td><center>' + parseFloat(c.abril).toFixed(2) + '</center></td><td><center>' + parseFloat(c.mayo).toFixed(2) + '</center></td><td><center>' + parseFloat(c.junio).toFixed(2) + '</center></td><td><center>' + parseFloat(c.julio).toFixed(2) + '</center></td><td><center>' + parseFloat(c.agosto).toFixed(2) + '</center></td><td><center>' + parseFloat(c.septiembre).toFixed(2) + '</center></td><td><center>' + parseFloat(c.octubre).toFixed(2) + '</center></td><td><center>' + parseFloat(c.noviembre).toFixed(2) + '</center></td><td><center>' + parseFloat(c.diciembre).toFixed(2) + '</center></td><td><center>' + parseFloat(c.totalSumaItem).toFixed(2) + '</center></td></tr>');
  
              }
  
              // execelGenerados($(".excelProyectos"), "tablaPoaPrincipal", "poa");
  
              verOjoContrasenas2($(".ver__Tabla"), $(".icono__boton"), $(".elementosCreados__M"), $(".letras__ver__poa"));
  
  
  
              if (!$("#rotulo__ac").length > 0) {
  
  
                $(".contenedor__bodyCMatriz").append('<div class="col col-12 text-center" style="font-size:14px; font-weight:bold;" id="rotulo__ac">ACTIVIDADES A ANALIZAR</div><br><br>');
  
              }
  
              for (d of obtenerAcCa) {
  
                if (!$(".ver__matrices" + d.idActividades).length > 0) {
  
                  $(".contenedor__bodyCMatriz").append('<div class="col col-6 letras__ver__poa text-center" style="font-weight:bold; font-size:12px; ; margin-bottom:2em;">' + d.idActividades + "-" + d.nombreActividades + '</div><div class="col col-6"><button class="ver__matrices' + d.idActividades + ' btn btn-info" attr="' + d.idActividades + '" style="cursor:pointer;"><i class="fas fa-eye icono__' + d.idActividades + '"></i></button></div><br><div class="col col-12 matrices__' + d.idActividades + ' row"></div>');
  
                  verOjoAjaxMatricesIncrementos($(".ver__matrices" + d.idActividades), $(".icono__" + d.idActividades), $(".matrices__" + d.idActividades), d.idActividades, d.idOrganismo, $("#idRolAd").val(), $("#fisicamenteE").val());
  
                }
  
              }
  
  
            }

          });
  
        },
        error: function () {
  
        }
  
      });
      
    });

    
    $("#verPoaAprobadoIncrementos__").click(function (e){
      e.preventDefault();

      let paqueteDeDatos = new FormData();

      paqueteDeDatos.append('tipo', 'informacioSubsess');

      paqueteDeDatos.append('idOrganismo', idOrganismo);

      paqueteDeDatos.append('fisicamenteE', fisicamenteE);

      paqueteDeDatos.append('idRolAd', idRolAd);

      $.ajax({
        type: "POST",
        url: "modelosBd/inserta/seleccionaAcciones.md.php",
        contentType: false,
        data: paqueteDeDatos,
        processData: false,
        cache: false,
        success: function (response) {
  
          $.getScript("layout/scripts/js/validaGlobal.js", function () {
  
            var elementos = JSON.parse(response);
            var obtenerAcCa = elementos['obtenerAcCa'];
            var obtenerInformacion = elementos['obtenerInformacion'];
            var indicadorInformacion = elementos['indicadorInformacion'];

            $(".contenedor__bodyCMatriz2").append(' ');
  
            $(".elementosCreados__M2").remove();
  
            $(".creados__letter2").remove();
  
  
            if (!$(".sumado__indicadores2").length > 0) {
  
              $(".contenedor__bodyCMatriz2").append('<div class="col col-12 text-center sumado__indicadores2" style="font-size:14px; font-weight:bold;">Indicadores</div><br><br>');
  
              $(".contenedor__bodyCMatriz2").append('<div class="col col-12 text-center" style="font-weight:bold;">Actividad - indicador</div><div class="col col-2 text-center" style="font-weight:bold;">Primer trimestre</div><div class="col col-1 text-center" style="font-weight:bold;">Segundo Trimestre</div><div class="col col-1 text-center" style="font-weight:bold;">Tercer trimestre</div><div class="col col-2 text-center" style="font-weight:bold;">Cuarto trimestre</div><div class="col col-2 text-center" style="font-weight:bold;">Meta indicador</div>');
  
  
              for (z of indicadorInformacion) {
  
                $(".contenedor__bodyCMatriz2").append('<div class="col col-4 text-center">' + z.indicador + '</div><div class="col col-2 text-center">' + z.primertrimestre + '</div><div class="col col-1 text-center">' + z.segundotrimestre + '</div><div class="col col-1 text-center">' + z.tercertrimestre + '</div><div class="col col-2 text-center">' + z.cuartotrimestre + '</div><div class="col col-2 text-center">' + z.metaindicador + '</div>');
  
  
              }
  
  
              if (data[9] != null && data[9] != "") {
  
                $(".contenedor__bodyCMatriz2").append('<div class="col col-12 text-center" style="font-size:14px; font-weight:bold;">Documentos anexos</div><br><br>');
  
                var arreglo = data[9].split("_________");
  
                for (var i = 0; i < arreglo.length; i++) {
  
  
                  $(".contenedor__bodyCMatriz2").append('<div class="col col-4 text-center"><a href="' + $("#filesFrontend").val() + 'anexosPoa/' + arreglo[i] + '" target="_blank">' + arreglo[i] + '</a></div>');
  
                }
  
  
              }
  
            }
  
            if (obtenerAcCa != "") {
  
  
  
              $(".contenedor__bodyCMatriz2").append('<div class="col col-12"  style="width:100%;" style="display:flex; flex-direction:column; justify-content:center; align-items:center;"><button class="ver__Tabla2 btn btn-primary creados__letter2" style="cursor:pointer; color:white!important;" data-toggle="modal" data-target="#modalVerValoresPoa2" idTipo="2">VER POA&nbsp;&nbsp;<i class="fas fa-eye icono__boton" style="color:white!important;"></i></button></div>');
  
  
              // $(".contenedor__bodyCMatriz2").append('<button type="button" class="btn btn-success excelProyectos col col-1 elementosCreados__M2"><i class="fas fa-file-excel"></i>&nbsp;&nbsp;EXCEL</button><br><br>');
  
              $(".elementosCreados__M2").hide();
  
              for (c of obtenerInformacion) {
  
                $("#valoresPoaObservar2").append('<tr><td>' + c.idActividades + "-" + c.nombreActividades + '</td><td>' + c.itemPreesupuestario + "-" + c.nombreItem + '</td><td><center>' + parseFloat(c.enero).toFixed(2) + '</center></td><td><center>' + parseFloat(c.febrero).toFixed(2) + '</center></td><td><center>' + parseFloat(c.marzo).toFixed(2) + '</center></td><td><center>' + parseFloat(c.abril).toFixed(2) + '</center></td><td><center>' + parseFloat(c.mayo).toFixed(2) + '</center></td><td><center>' + parseFloat(c.junio).toFixed(2) + '</center></td><td><center>' + parseFloat(c.julio).toFixed(2) + '</center></td><td><center>' + parseFloat(c.agosto).toFixed(2) + '</center></td><td><center>' + parseFloat(c.septiembre).toFixed(2) + '</center></td><td><center>' + parseFloat(c.octubre).toFixed(2) + '</center></td><td><center>' + parseFloat(c.noviembre).toFixed(2) + '</center></td><td><center>' + parseFloat(c.diciembre).toFixed(2) + '</center></td><td><center>' + parseFloat(c.totalSumaItem).toFixed(2) + '</center></td></tr>');
  
  
              }
                
              execelGenerados($(".excelProyectos"), "tablaPoaPrincipal2", "poa");
  
              verOjoContrasenas2($(".ver__Tabla2"), $(".icono__boton"), $(".elementosCreados__M2"), $(".letras__ver__poa2"));
  
  
  
              if (!$("#rotulo__ac2").length > 0) {
  
  
                $(".contenedor__bodyCMatriz2").append('<div class="col col-12 text-center" style="font-size:14px; font-weight:bold;" id="rotulo__ac">ACTIVIDADES A ANALIZAR</div><br><br>');
  
              }
  
              for (d of obtenerAcCa) {
  
                if (!$(".ver__matrices2" + d.idActividades).length > 0) {
  
                  $(".contenedor__bodyCMatriz2").append('<div class="col col-6 letras__ver__poa2 text-center" style="font-weight:bold; font-size:12px; ; margin-bottom:2em;">' + d.idActividades + "-" + d.nombreActividades + '</div><div class="col col-6"><button class="ver__matrices2' + d.idActividades + ' btn btn-info" attr="' + d.idActividades + '" style="cursor:pointer;"><i class="fas fa-eye icono__' + d.idActividades + '"></i></button></div><br><div class="col col-12 matrices__' + d.idActividades + ' row"></div>');
  
                  verOjoAjaxMatrices($(".ver__matrices2" + d.idActividades), $(".icono__2" + d.idActividades), $(".matrices__2" + d.idActividades), d.idActividades, d.idOrganismo, $("#idRolAd").val(), $("#fisicamenteE").val());
  
                }
  
              }
  
  
            }
  
            
  
          });
  
        },
        error: function () {
  
        }
      });
    });
    

  });

}

var funcion__incrementos__decrementos__eliminar__revisor = function (tbody, table) {

  $(tbody).on("click", "button.asignar__boton__incre__decre__eliminar__aprobar", function (e) {

    e.preventDefault();

    $(".asignar__boton__incre__decre__eliminar__aprobar").hide();


    let data = table.row($(this).parents("tr")).data();

    var confirm = alertify.prompt('¿Está seguro de observar el registro, ingresar comentario al organismo ' + data[1] + '?', '', null, null).set('labels', { ok: 'Confirmar', cancel: 'Cancelar' });

    confirm.set({ transition: 'slide' });

    confirm.set('onok', function (evt, value) {

      if (value != "" && value != " ") {

        let paqueteDeDatos = new FormData();

        paqueteDeDatos.append('tipo', 'observar__incrementos__decrementos');
        paqueteDeDatos.append('idIncrementos', data[10]);
        paqueteDeDatos.append('comentario', value);

        $.ajax({

          type: "POST",
          url: "modelosBd/incrementosDecrementos/inserta.md.php",
          contentType: false,
          data: paqueteDeDatos,
          processData: false,
          cache: false,
          success: function (response) {

            let elementos = JSON.parse(response);
            let mensaje = elementos['mensaje'];

            if (mensaje == 1) {

              alertify.set("notifier", "position", "top-center");
              alertify.notify("Registro observado correctamente", "success", 5, function () { });

              window.setTimeout(function () {
                window.location = "revision";
              }, 5000);

            }


          },
          error: function () {

          }

        });

      } else {

        alertify.set("notifier", "position", "top-center");
        alertify.notify("Obligatorio ingresar un comentario", "error", 1, function () { });

        $(".asignar__boton__incre__decre__eliminar__aprobar").show();

      }


    });

    confirm.set('oncancel', function () { //callbak al pulsar botón negativo
      alertify.set("notifier", "position", "top-center");
      alertify.notify("Acción cancelada", "error", 1, function () { });
      $(".asignar__boton__incre__decre__eliminar__aprobar").show();
    });



  });

}



var datatablets__funcio__repor__incrementos__v__2__aprobados = function (tabla, identificador, parametro3, variable) {

  /*==============================================
  =            Establecer datatablets            =
  ==============================================*/

  var table2 = $(tabla).DataTable({

    "language": {

      "sProcessing": "Procesando...",
      "sLengthMenu": "Mostrar _MENU_ registros",
      "sZeroRecords": "No se encontraron resultados",
      "sEmptyTable": "Ningún dato disponible en esta tabla",
      "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
      "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
      "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix": "",
      "sSearch": "Buscar:",
      "sUrl": "",
      "sInfoThousands": ",",
      "sLoadingRecords": "No existen datos",
      "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    },

    "bLengthChange": false,
    "pagingType": "full_numbers",
    "Paginate": false,
    "pagingType": "full_numbers",
    "retrieve": true,
    "paging": false,


    "ajax": {

      "method": "POST",
      "url": "modelosBd/incrementosDecrementos/datatablets.md.php",
      "data": {
        "identificador": identificador
      }

    },

    "aoColumnDefs": [

      {

        "aTargets": 7,
        "mRender": (function (data, type, row) {

          return "<a target='_blank' href='" + variable + "incrementosDecrementos/resolucionDirectorPlanificacion/" + row['documento'] + "'>" + row['documento'] + "</a>";

        })

      },

    ]

  });

  /*=====  End of Establecer datatablets s ======*/

}

var datatablets__notifica__incrementos__v__1 = function (tabla, identificador, parametro3, variable) {

  /*==============================================
  =            Establecer datatablets            =
  ==============================================*/

  var table2 = $(tabla).DataTable({

    "language": {

      "sProcessing": "Procesando...",
      "sLengthMenu": "Mostrar _MENU_ registros",
      "sZeroRecords": "No se encontraron resultados",
      "sEmptyTable": "Ningún dato disponible en esta tabla",
      "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
      "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
      "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix": "",
      "sSearch": "Buscar:",
      "sUrl": "",
      "sInfoThousands": ",",
      "sLoadingRecords": "No existen datos",
      "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    },

    "bLengthChange": false,
    "pagingType": "full_numbers",
    "Paginate": true,
    "pagingType": "full_numbers",
    "retrieve": true,
    "paging": true,
    "pageLength": 10,

    "ajax": {

      "method": "POST",
      "url": "modelosBd/incrementosDecrementos/datatablets.md.php",
      "data": {
        "identificador": identificador
      }

    },

    "aoColumnDefs": [
      {

        "aTargets": 8,
        "mRender": (function (data, type, row) {

          return "<a target='_blank' href='" + variable + "incrementosDecrementos/notificacion" + row['tramite'] + "/" + row['documento'] + "'>" + row['documento'] + "</a>";

        })

      },


    ]

  });


}


var datatablets__notifica__incrementos__OD = function (tabla, identificador, parametro3, idOrganismo, variable) {

  /*==============================================
  =            Establecer datatablets            =
  ==============================================*/

  var table2 = $(tabla).DataTable({

    "language": {

      "sProcessing": "Procesando...",
      "sLengthMenu": "Mostrar _MENU_ registros",
      "sZeroRecords": "No se encontraron resultados",
      "sEmptyTable": "Ningún dato disponible en esta tabla",
      "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
      "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
      "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix": "",
      "sSearch": "Buscar:",
      "sUrl": "",
      "sInfoThousands": ",",
      "sLoadingRecords": "No existen datos",
      "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    },

    "bLengthChange": false,
    "pagingType": "full_numbers",
    "Paginate": true,
    "pagingType": "full_numbers",
    "retrieve": true,
    "paging": true,
    "pageLength": 10,

    "ajax": {

      "method": "POST",
      "url": "modelosBd/incrementosDecrementos/datatablets.md.php",
      "data": {
        "identificador": identificador,
        "idOrganismo": idOrganismo,
      }

    },

    "aoColumnDefs": [
      {

        "aTargets": 6,
        "mRender": (function (data, type, row) {

          return "<a target='_blank' href='" + variable + "incrementosDecrementos/notificacion" + row['tramite'] + "/" + row['documento'] + "'>" + row['documento'] + "</a>";

        })

      },


    ]

  });


}


var sumarIncrementos = function (parametro1, parametro2, parametro3, parametro4) {

  $(parametro1).on('input', function () {

    var incremento = parseFloat($(parametro1).val());
    var valorTotalInicial = parseFloat($(parametro2).val().replace(/,/g, ""));

    if (incremento > 0) {
      sum = valorTotalInicial + incremento;
    } else {
      sum = valorTotalInicial;
    }


    var totalSum = parseFloat(sum.toFixed(2));

    $(parametro3).val(totalSum.toLocaleString('en-US'));

    $(parametro4).val(totalSum);

  });

}

var restarDecrementos = function (parametro1, parametro2, parametro3, parametro4) {

  $(parametro1).on('input', function () {

    var decremento = parseFloat($(parametro1).val());
    var valorTotalInicial = parseFloat($(parametro2).val().replace(/,/g, ""));

    if (decremento > 0) {
      res = valorTotalInicial - decremento;
    } else {
      res = valorTotalInicial;
    }


    var totalRes = parseFloat(res.toFixed(2));

    $(parametro3).val(totalRes.toLocaleString('en-US'));

    $(parametro4).val(totalRes);
  });

}


var datatablets__tramite__incrementos__v = function (tabla, identificador, variable) {


  /*==============================================
  =            Establecer datatablets            =
  ==============================================*/

  var table2 = $(tabla).DataTable({

    "language": {

      "sProcessing": "Procesando...",
      "sLengthMenu": "Mostrar _MENU_ registros",
      "sZeroRecords": "No se encontraron resultados",
      "sEmptyTable": "Ningún dato disponible en esta tabla",
      "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
      "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
      "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix": "",
      "sSearch": "Buscar:",
      "sUrl": "",
      "sInfoThousands": ",",
      "sLoadingRecords": "No existen datos",
      "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    },

    "bLengthChange": false,
    "pagingType": "full_numbers",
    "Paginate": true,
    "pagingType": "full_numbers",
    "retrieve": true,
    "paging": true,
    "pageLength": 2,

    scrollX: true,

    "ajax": {

      "method": "POST",
      "url": "modelosBd/incrementosDecrementos/datatablets.md.php",
      "data": {
        "identificador": identificador
      }

    },

    "aoColumnDefs": [
      
      {

        "aTargets": 8,
        "mRender": (function (data, type, row) {

          return "<a target='_blank' href='" + variable + "incrementosDecrementos/anexos/" + row['documento'] + "'>" + row['documento'] + "</a>";

        })

      },
      {

        "aTargets": 10,
        "mRender": (function (data, type, row) {

          return`<center><button class='matriz__Inicial__boton estilo__botonDatatablets btn btn-primary' data-bs-toggle='modal' data-bs-target='#modalMatrizIncremento' idTramite='${row['idTramite']}' idPro='${row['itemProgramacion']}' idActividad='${row['idActividad']}'>Matriz Inicial</button></center>`;

        })

      },
      {

        "aTargets": 11,
        "mRender": (function (data, type, row) {

          return `<center><button class='matriz__Incremento__boton estilo__botonDatatablets btn btn-danger'  data-bs-toggle='modal' data-bs-target='#modalMatrizIncremento'  idTramite='${row['idTramite']}' idPro='${row['itemProgramacion']}' idActividad='${row['idActividad']}'>Matriz Incremento</button></center>`;

        })

      },

      {

        "aTargets": 12,
        "mRender": (function (data, type, row) {

          if(row['estado'] == "Guardado"){
            return "<button idTramite='"+row['idTramite']+"' class='editar__valores__Tramite estilo__botonDatatablets btn btn-primary' data-toggle='tooltip' data-html='true' title='Editar'><i class='fa fa-file-signature'></i></button>&nbsp;<button idTramite='"+row['idTramite']+"' class='eliminar__Tramite__Guardado estilo__botonDatatablets btn btn-danger' data-toggle='tooltip' data-html='true' title='Eliminar'><i class='fa fa-trash'></i></button>";
          }else{
            return "<center><span>----</span></center>";
          }
          

        })

      },


    ]

  });

  funcion__incrementos__agregar_meses("#incrementos_Tramites_Guardados__OD tbody", table2);

  funcion__incrementos__editar("#incrementos_Tramites_Guardados__OD tbody", table2);

  funcion__incrementos__eliminar__tramites("#incrementos_Tramites_Guardados__OD tbody", table2);

  table2.on('draw.dt', function() {

    verArmadoMatrizIncrementos($(".matriz__Inicial__boton"),$(".body_matrices_incrementos"));
    verArmadoMatrizIncrementos($(".matriz__Incremento__boton"),$(".body_matrices_incrementos"));
  });
}

var datatablets__tramite__incrementos__meses = function (tabla, identificador, idTramite, idOrganismo) {

  /*==============================================
  =            Establecer datatablets            =
  ==============================================*/

  $(tabla).DataTable().destroy();

  var table2 = $(tabla).DataTable({

    "language": {

      "sProcessing": "Procesando...",
      "sLengthMenu": "Mostrar _MENU_ registros",
      "sZeroRecords": "No se encontraron resultados",
      "sEmptyTable": "Ningún dato disponible en esta tabla",
      "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
      "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
      "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix": "",
      "sSearch": "Buscar:",
      "sUrl": "",
      "sInfoThousands": ",",
      "sLoadingRecords": "No existen datos",
      "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    },

    "bLengthChange": false,
    "pagingType": "full_numbers",
    "Paginate": true,
    "pagingType": "full_numbers",
    "retrieve": true,
    "paging": true,
    "pageLength": 10,

    "ajax": {

      "method": "POST",
      "url": "modelosBd/incrementosDecrementos/datatablets.md.php",
      "data": {
        "identificador": identificador,
        "idTramite": idTramite,
        "idOrganismo": idOrganismo,
      }

    },

    "aoColumnDefs": [

    ]



  });


}

var funcion__incrementos__agregar_meses = function (tbody, table) {

  $(tbody).on("click", "button.ver_valores_meses_tramite", function (e) {

    e.preventDefault();

    let data = table.row($(this).parents("tr")).data();

    let idTramite = $(this).attr('idTramite');
      
    let tabla = $("#poa__incrementos");
    let identificador= "poa_incrementos_meses";
    let idOrganismo = $("#idOrganismo_S").val();
      
      datatablets__tramite__incrementos__meses(tabla,identificador,idTramite,idOrganismo);

  });
}

var funcion__incrementos__editar = function (tbody, table){
  $(tbody).on("click", "button.editar__valores__Tramite", function (e) {

    e.preventDefault();

    let idTramite = $(this).attr('idTramite');
    let indicador = 17;
    
    let paqueteDeDatos = new FormData();

        paqueteDeDatos.append('indicador',indicador);
        paqueteDeDatos.append('idTramite', idTramite);


        $.ajax({

          type: "POST",
          url: "modelosBd/incrementosDecrementos/selectores.md.php",
          contentType: false,
          data: paqueteDeDatos,
          processData: false,
          cache: false,
          success: function (response) {

            var elementos=JSON.parse(response);
            var data=elementos['informacionSeleccionada'];

            for(x of data){
              
              console.log(x.marzo);

              let enero = x.enero;
              let febrero = x.febrero;
              let marzo = x.marzo;
              let abril = x.abril;
              let mayo = x.mayo;
              let junio = x.junio;
              let julio = x.julio;
              let agosto = x.agosto;
              let septiembre = x.septiembre;
              let octubre = x.octubre;
              let noviembre = x.noviembre;
              let diciembre = x.diciembre;

              if(x.nombreEvento != ""){

                
                if($("#actividades__incremento__od").val(x.idActividad).trigger("change")){
                  setTimeout(function () {
                    
                    $("#eventos_intervencion_od").val(x.nombreEvento).trigger("change")

                    setTimeout(function () {
                      $("#items__incrementos__od").val(x.idItem).trigger("change");
                    }, 2000);

                    let totalAsignar = $('#MontoPorAsignar__Incremento').val();
                    let sumaTotal = parseFloat(totalAsignar)+ parseFloat(x.totalI);
                    $('#MontoPorAsignar__Incremento').val(parseFloat(sumaTotal).toFixed(2));

                    $("#incrementos_justificacion").val(x.justificacion);
                  }, 1000);
                  
                  setTimeout(function () {
                    $("#EneroItemMesValorIncremento").val(parseFloat(enero));
                    $("#FebreroItemMesValorIncremento").val(parseFloat(febrero));
                    $("#MarzoItemMesValorIncremento").val(parseFloat(marzo));
                    $("#AbrilItemMesValorIncremento").val(parseFloat(abril));
                    $("#MayoItemMesValorIncremento").val(parseFloat(mayo));
                    $("#JunioItemMesValorIncremento").val(parseFloat(junio));
                    $("#JulioItemMesValorIncremento").val(parseFloat(julio));
                    $("#AgostoItemMesValorIncremento").val(parseFloat(agosto));
                    $("#SeptiembreItemMesValorIncremento").val(parseFloat(septiembre));
                    $("#OctubreItemMesValorIncremento").val(parseFloat(octubre));
                    $("#NoviembreItemMesValorIncremento").val(parseFloat(noviembre));
                    $("#DiciembreItemMesValorIncremento").val(parseFloat(diciembre));
                  }, 4000);
                }
                
              }
              
              if(x.nombreEvento == "N/A"){
                if($("#actividades__incremento__od").val(x.idActividad).trigger("change")){
                  setTimeout(function () {
                    $("#items__incrementos__od").val(x.idItem).trigger("change");
                    let totalAsignar = $('#MontoPorAsignar__Incremento').val();
                    let sumaTotal = parseFloat(totalAsignar)+ parseFloat(x.totalI);
                    $('#MontoPorAsignar__Incremento').val(parseFloat(sumaTotal).toFixed(2));
                  }, 1000);
                  
                }
              }
              
            }
		   	
          },
          error: function () {

          }

        });


        let idOrganismo = $("#idOrganismoPrincipal").val(); 
        let tipo = "eliminar_Tramites_Organismo";
            
        let paqueteDeDatos2 = new FormData();
  
          paqueteDeDatos2.append('tipo',tipo);
          paqueteDeDatos2.append('idTramite', idTramite);
          paqueteDeDatos2.append('idOrganismo', idOrganismo);
  
  
          $.ajax({
  
            type: "POST",
            url: "modelosBd/incrementosDecrementos/elimina.md.php",
            contentType: false,
            data: paqueteDeDatos2,
            processData: false,
            cache: false,
            success: function (response) {
  
            },
            error: function () {
  
            }
  
          });
    

  });
}

var funcion__incrementos__eliminar__tramites = function (tbody, table){
  $(tbody).on("click", "button.eliminar__Tramite__Guardado", function (e) {

    e.preventDefault();

    let idTramite = $(this).attr('idTramite');
    let valor = 0;

    var confirm = alertify.confirm('¿Está seguro de eliminar el trámite?', '¿Está seguro de eliminar el trámite?', null, null).set('labels', { ok: 'Confirmar', cancel: 'Cancelar' });

    confirm.set({ transition: 'slide' });

    confirm.set('onok', function () {


      let idOrganismo = $("#idOrganismoPrincipal").val(); 
      let tipo = "eliminar_Tramites_Organismo";
          
      let paqueteDeDatos = new FormData();

        paqueteDeDatos.append('tipo',tipo);
        paqueteDeDatos.append('idTramite', idTramite);
        paqueteDeDatos.append('idOrganismo', idOrganismo);


        $.ajax({

          type: "POST",
          url: "modelosBd/incrementosDecrementos/elimina.md.php",
          contentType: false,
          data: paqueteDeDatos,
          processData: false,
          cache: false,
          success: function (response) {

            var elementos=JSON.parse(response);
            
            let mensaje = elementos['mensaje'];

            if (mensaje == 1) {

                alertify.set("notifier", "position", "top-center");
                alertify.notify("Registro eliminado correctamente", "success", 5, function() {});

                window.setTimeout(function() {
                  window.location = "incrementosOrganismo";
                }, 3000);
            }
		   	
          },
          error: function () {

          }

        });

    });
    
    confirm.set('oncancel', function () { //callbak al pulsar botón negativo
      alertify.set("notifier", "position", "top-center");
      alertify.notify("Acción cancelada", "error", 1, function () { });
      $(".asignar__boton__incre__decre__eliminar").show();
    });

    
    

  });
}

var dataTabletsCreacion = function(parametro1,parametro2,parametro3,parametro4){
  
}


var datatablets__tramite__incrementos__v__dt = function (tabla, identificador, idOrganismo, variable) {

  /*==============================================
  =            Establecer datatablets            =
  ==============================================*/
  $(tabla).DataTable().destroy();
  var table2 = $(tabla).DataTable({

    "language": {

      "sProcessing": "Procesando...",
      "sLengthMenu": "Mostrar _MENU_ registros",
      "sZeroRecords": "No se encontraron resultados",
      "sEmptyTable": "Ningún dato disponible en esta tabla",
      "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
      "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
      "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix": "",
      "sSearch": "Buscar:",
      "sUrl": "",
      "sInfoThousands": ",",
      "sLoadingRecords": "No existen datos",
      "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    },

    "bLengthChange": false,
    "pagingType": "full_numbers",
    "Paginate": true,
    "pagingType": "full_numbers",
    "retrieve": true,
    "paging": true,
    "pageLength": 10,



    "ajax": {

      "method": "POST",
      "url": "modelosBd/incrementosDecrementos/datatablets.md.php",
      "data": {
        "identificador": identificador,
        "idOrganismo": idOrganismo,
      }

    },

    "aoColumnDefs": [

      {

        "aTargets": 6,
        "mRender": (function (data, type, row) {

          return "<a target='_blank' href='" + variable + "incrementosDecrementos/anexos/" + row['documento'] + "'>" + row['documento'] + "</a>";

        })

      },
      {

        "aTargets": 8,
        "mRender": (function (data, type, row) {

          if(row['estado'] == "I"){
            return "<center><span> </span></center>";
          }else{
            return "<button class='ver_valores_meses_tramite estilo__botonDatatablets btn btn-primary' data-toggle='modal' data-target='#modalVerValoresMesesTramites' idTramite='"+row['idTramiteIncremento']+"' idOrganismo='"+row['idOrganismo']+"'>Valores</button>";
          }
          

        })

      },
      {

        "aTargets": 9,
        "mRender": (function (data, type, row) {

          

          if(row['estado'] == "I"){
            return "<center><span>APROBADO</span></center>";
          }else{
            return "<button class='acccion_aprobar_tramites estilo__botonDatatablets btn btn-success' idTramite='"+row['idTramiteIncremento']+"' idOrganismo='"+row['idOrganismo']+"'>Aprobar</button>";
          }

        })

      },
      {

        "aTargets": 10,
        "mRender": (function (data, type, row) {

          if(row['estado'] == "I"){
            return "<center><span> </span></center>";
          }else{
            if (row['valorObserva'] == null || row['valorObserva'] == "") {
              return "<button class='observacion_tramites  btn btn-danger estilo__botonDatatablets' idTramite='"+row['idTramiteIncremento']+"' nombre='"+row['nombreOrganismo']+"'>Observacion</button>";
            } else {
              return `<textarea rows="5" cols="40" readonly>${row['valorObserva']}</textarea>
              `;
            }
          }
          

          

        })

      },


    ]

  });

  funcion__tramites_observacion("#ver__Tramites__incrementos__v2_L tbody", table2);

  funcion__incrementos__ver__valores__meses("#ver__Tramites__incrementos__v2_L tbody", table2);

  function__aprobar__incremento("#ver__Tramites__incrementos__v2_L tbody", table2);
}


var funcion__tramites_observacion = function (tbody, table) {

  $(tbody).on("click", "button.observacion_tramites", function (e) {

    e.preventDefault();
    let idTramite = $(this).attr('idTramite');
    let organismo = $(this).attr('nombre');

    $(".observacion_tramites").hide();

    var confirm = alertify.prompt('Está seguro de enviar una observación al trámite del organismo?' + organismo + '?', '', null, null).set('labels', { ok: 'Confirmar', cancel: 'Cancelar' });

    confirm.set({ transition: 'slide' });

    confirm.set('onok', function (evt, value) {
  
      if (value != "" && value != " ") {

        let paqueteDeDatos = new FormData();

        paqueteDeDatos.append('tipo', 'observar__incrementos_tramite');
        paqueteDeDatos.append('observacion', value);
        paqueteDeDatos.append('idTramite', idTramite);


        $.ajax({

          type: "POST",
          url: "modelosBd/incrementosDecrementos/inserta.md.php",
          contentType: false,
          data: paqueteDeDatos,
          processData: false,
          cache: false,
          success: function (response) {

            let elementos = JSON.parse(response);
            let mensaje = elementos['mensaje'];

            if (mensaje == 1) {

              alertify.set("notifier", "position", "top-center");
              alertify.notify("Obsevación registrada correctamente", "success", 5, function () { });

              table.ajax.reload(null,false);

            }


          },
          error: function () {

          }

        });

      } else {

        alertify.set("notifier", "position", "top-center");
        alertify.notify("Obligatorio ingresar un comentario", "error", 1, function () { });

        $(".observacion_tramites").show();

      }


    });

    confirm.set('oncancel', function () {
      alertify.set("notifier", "position", "top-center");
      alertify.notify("Acción cancelada", "error", 1, function () { });
      $(".observacion_tramites").show();
    });



  });

}

var function__aprobar__incremento = function(tbody, table){
  $(tbody).on("click", "button.acccion_aprobar_tramites", function (e) {

    e.preventDefault();

    $(".acccion_aprobar_tramites").hide();

    let idTramite = $(this).attr('idTramite');
    let idOrganismo = $(this).attr('idOrganismo');

    var confirm = alertify.confirm('¿Está seguro de aprobar el trámite?','¿Está seguro de aprobar el trámite?', null, null).set('labels', { ok: 'Confirmar', cancel: 'Cancelar' });

    confirm.set({ transition: 'slide' });

    confirm.set('onok', function () {


      let paqueteDeDatos = new FormData();

      paqueteDeDatos.append('tipo', 'actualizar__Tramite__Aprobacion');
      paqueteDeDatos.append('idOrganismo', idOrganismo);
      paqueteDeDatos.append('idTramite', idTramite);

      $.ajax({

        type: "POST",
        url: "modelosBd/incrementosDecrementos/elimina.md.php",
        contentType: false,
        data: paqueteDeDatos,
        processData: false,
        cache: false,
        success: function (response) {

          let elementos = JSON.parse(response);
          let mensaje = elementos['mensaje'];

          if (mensaje == 1) {

            alertify.set("notifier", "position", "top-center");
            alertify.notify("Tramite aprobado correctamente", "success", 5, function () { });

            table.ajax.reload(null,false);
          }


        },
        error: function () {

        }

      });

    });

    confirm.set('oncancel', function () { //callbak al pulsar botón negativo
      alertify.set("notifier", "position", "top-center");
      alertify.notify("Acción cancelada", "error", 1, function () { });
      $(".acccion_aprobar_tramites").show();
    });



  });
}

var funcion__incrementos__ver__valores__meses = function (tbody,table) {

  $(tbody).on("click", "button.ver_valores_meses_tramite", function (e) {

    e.preventDefault();

    let idTramite = $(this).attr('idTramite');
    let idOrganismo = $(this).attr('idOrganismo'); 

    let tabla = $("#poa__incrementos");
    let identificador= "poa_incrementos_meses";
      
      datatablets__tramite__incrementos__meses(tabla,identificador,idTramite,idOrganismo);

  });
}


var funcion__Traer__Datatablets = function(tabla,identificador,organismo,variable){

  datatablets__tramite__incrementos__v__dt($(tabla), identificador,organismo,variable);
}

var datatablets__Incrementos__reasignacion = function (tabla, identificador) {

  var table2 = $(tabla).DataTable({

    "language": {

      "sProcessing": "Procesando...",
      "sLengthMenu": "Mostrar _MENU_ registros",
      "sZeroRecords": "No se encontraron resultados",
      "sEmptyTable": "Ningún dato disponible en esta tabla",
      "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
      "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
      "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix": "",
      "sSearch": "Buscar:",
      "sUrl": "",
      "sInfoThousands": ",",
      "sLoadingRecords": "No existen datos",
      "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    },

    dom: 'Bfrtip',
      buttons: [
        {
          
          extend: 'excel',
          className: 'btn-excel',
          title:'Incrementos',
          text: '<button  class="buttonD" ><i class="fas fa-file-excel" style="color: #277c41; font-size: 36px;" ></i></button>',
      },
    
      {
        extend: 'pdf',
        title: 'Incrementos',
        text: '<button  class="buttonD" ><i class="fas fa-file-pdf " style="color: #BF0D0D; font-size: 36px;"></i></button>',
      
        orientation: 'landscape',
        customize:function(doc) {

            doc.defaultStyle.fontSize = 6;

            doc.styles.title = {
                color: 'black',
                fontSize: '6',
                alignment: 'center',
                margin:'0'                                                
            }
            doc.styles.tableHeader = {

              fillColor:'#311b92',
              fontSize: '6',
              color:'white',
              alignment:'center',
                              
          }
          

          }

        }
    ],

    "bLengthChange": false,
    "pagingType": "full_numbers",
    "Paginate": true,
    "pagingType": "full_numbers",
    "retrieve": true,
    "paging": true,
    "pageLength": 20,

    "ajax": {

      "method": "POST",
      "url": "modelosBd/incrementosDecrementos/datatablets.md.php",
      "data": {
        "identificador": identificador
      }

    },

    "aoColumnDefs": [
      
      {

        "aTargets": 8,
        "mRender": (function (data, type, row) {

          return "<center><button class='reasignar__boton__incremento estilo__botonDatatablets btn btn-primary' data-toggle='modal' data-target='#modalAreasTecnicas'>Asignar</button></center>";

        })

      },
      {

        "aTargets": 9,
        "mRender": (function (data, type, row) {

          return "<center><span> </span></center>";

        })

      },
      
    ]

  });

  funcion__reasignar__Incrementos__Subsecretarias("#reasignacion__Incremento tbody", table2);
}


var funcion__reasignar__Incrementos__Subsecretarias=function(tbody,table){

  $(tbody).on("click","button.reasignar__boton__incremento",function(e){
      
    e.preventDefault();

    var data=table.row($(this).parents("tr")).data();

    $(".titulos_modal").text(data[1]);
    let idOrganismo = data[9];
    let idPreeliminar = data[8];
    var idRol = $("#idRolAd").val();
    let tipoObservacion = "";
    let tipoE = "";

    var variableFront = $("#filesFrontend").val();

    datatablets__tramites__Incrementos__Analistas($("#tramites_Incrementos_Analistas"),"tramites_Incrementos_Analistas",idOrganismo,variableFront);

    $.getScript("layout/scripts/js/incrementosDecrementos/selector.js",function(){
      verificar__Pdf__Tamanio($(".verificaPdf"));
    });

    $.getScript(
      "layout/scripts/js/incrementosDecrementos/metodos.js",
      function () {


        ocultarSeccionesModal($("#contenedorTablaTramitesIncrementos"));
        ocultarSeccionesModal($(".fila__incrementos__devolver"));

        agregar__Valores__Poa_Incrementos($(".poaIncrementosAbrir"),idOrganismo,$("#fisicamenteEstructura__na").val(),$("#idRolAd").val(),idPreeliminar);

        agregar__Valores__Poa_Aprobado($(".poaAprobadoAbrir"),idOrganismo,$("#fisicamenteEstructura__na").val(),$("#idRolAd").val(),idPreeliminar);

        

        if ($("#idRolAd").val() == "3" || $("#idRolAd").val() == 3) {

          variableSessionOrganismo(idOrganismo);

          var contenidoRequisitos = ["Solicitud de revisión de no duplicidad", "Emisión de Certificado de no duplicidad", "Reporte de convenios por liquidar", "Confirmación de disponibilidad de fondos", "Estatus legal vigente", "Certificación presupuestaria","Certificación POA"];


            for (var i = 0; i < contenidoRequisitos.length; i++) {
              $("#contenedorRequisitos").append(`<div class='col-md-4 mb-3'> <span class='badge badge-primary' style='font-size:1em!important;'>${
                contenidoRequisitos[i]
              }</span></div> 
                  <div class='col-md-4 mb-3'>
                    <input type='text' class='form-control' id='nombreMemo${
                      i + 1
                    }' name='nombreMemo${
                i + 1
              }' placeholder='Numero de Memorando'> 
                  </div> 
                  <div class='col-md-4 mb-3 text-center'>
                  <div class='form-check-inline'>
                  <label class='form-check-label'>
                    <input type='radio' class='form-check-input' name='memoCumple${
                      i + 1
                    }' value='cumple'>Cumple
                  </label>
                  </div>
                  <div class='form-check-inline'>
                  <label class='form-check-label'>
                    <input type='radio' class='form-check-input' name='memoCumple${
                      i + 1
                    }' value='no cumple'>No Cumple
                  </label>
                  </div>
                  </div>`);
            }

          // ocultarSeccionesModal(".fila__incrementos__reasignar");
          // ocultarSeccionesModal(".fila__incrementos__regresar");

          tipoObservacion = "reporteEnviado";
          //Recreativo
          if (
            $("#fisicamenteEstructura__na").val() == "19" ||
            $("#fisicamenteEstructura__na").val() == 19
          ) {
            let identificador = "desarrollo";
            tipoE = "recreativo";
            seccion_Observaciones_Reasignaciones(idOrganismo,tipoE);
            $("#idRol").val(idRol);
  
            $("#fisicamenteEn").val($("#fisicamenteEstructura__na").val());
  
            $("#idOrganismo__m2").val(idOrganismo);
  
            $("#tipoPdf2").val("Informe__Incremento__TecnicoRecreacion");
  
            $("#idUsuario").val($("#idUsuarioPrincipal").val());
  
            $("#contenedorCalificacion")
              .append(`<table class='' id='tablaRevisorIncremento'>
    
            <thead>
    
                <tr>
    
                    <th style="width:5%!important"><center>N</center></th>
                    <th style="width:45%!important"><center>CONDICIÓN</center></th>
                    <th  style="width:10%!important"><center>CUMPLE</center></th>
                    <th style="width:40%!important"><center>OBSERVACIONES PARA LA ORGANIZACIÓN DEPORTIVA</center></th>
    
                </tr>
    
            </thead>
    
            <tbody class='cuerpo__matricez__seguimientos'>
                <tr>
                    <td align="center" style="font-size:1em !important">1</td>
                    <td style="font-size:1em !important">Registra en las actividades recreativas correspondientes organización de campeonatos provinciales acorde a la prioridad de la disciplina deportiva.</td>
                    <td align="center" style="font-size:1em !important">
                        
                        <select name="selectCondicion1" id="selectCondicion1" class='selectCalifica'>
                            <option value="Cumple">Cumple</option>
                            <option value="No cumple">No Cumple</option>
                            <option value="No aplica">No Aplica</option>
                        </select>
                        
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones1' name='observacionesReasignaciones1' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">2</td>
                    <td style="font-size:1em !important">La planificación del indicador coincide con los eventos deportivos planificados.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion2" id="selectCondicion2" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones2' name='observacionesReasignaciones2' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">3</td>
                    <td style="font-size:1em !important">Utiliza la sintaxis clara para el registro de los eventos.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion3" id="selectCondicion3" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones3' name='observacionesReasignaciones3' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center"style="font-size:1em !important">4</td>
                    <td style="font-size:1em !important">Registra juzgamiento para el evento o campeonato provincial o nacional</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion4" id="selectCondicion4" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones4' name='observacionesReasignaciones4' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">5</td>
                    <td style="font-size:1em !important">Utiliza para la atención de delegados extranjeros y nacionales, deportistas, entrenadores, cuerpo técnico que representa al país.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion5" id="selectCondicion5" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones5' name='observacionesReasignaciones5' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">6</td>
                    <td style="font-size:1em !important">Utiliza recursos para cubrir gastos autorizados de: pasajes, alimentación, hospedaje, hidratación, medicinas, atención médica, honorarios de árbitros y jueces, uniformes, movilización interna de la delegación</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion6" id="selectCondicion6" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones6' name='observacionesReasignaciones6' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">7</td>
                    <td style="font-size:1em !important">Utiliza recursos para cubrir pagos por concepto de seguros en los campeonatos.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion7" id="selectCondicion7" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones7' name='observacionesReasignaciones7' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">8</td>
                    <td style="font-size:1em !important">La Planificación Operativa Anual del Organismo Deportivo se encuentra enmarcada en lo establecido en el Acuerdo Ministerial 456 y sus reformas.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion8" id="selectCondicion8" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones8' name='observacionesReasignaciones8'  class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
            </tbody>
    
            </table>`);
  
            $("#contenedorCalificacion").show();
  
            $("#calificarInforme").show();
  
            $("#calificarInforme").click(function (e) {
              e.preventDefault();
              if (
                $("#selectCondicion1").val() == "No cumple" ||
                $("#selectCondicion2").val() == "No cumple" ||
                $("#selectCondicion3").val() == "No cumple" ||
                $("#selectCondicion4").val() == "No cumple" ||
                $("#selectCondicion5").val() == "No cumple" ||
                $("#selectCondicion6").val() == "No cumple" ||
                $("#selectCondicion7").val() == "No cumple" ||
                $("#selectCondicion8").val() == "No cumple"
              ) {
                $(".ocultos_incrementosO").hide();
                $(".ocultos_incrementosOb").show();
                $("#informeVTipo").val("observaciones");

                observaAnalista = $("#informeVTipo").val();
                $("#tipoInformeArea").text(observaAnalista.toUpperCase());
              } else {
                $(".ocultos_incrementosO").hide();
                $(".ocultos_incrementosOb").show();
                
                $("#informeVTipo").val("viabilidad");

                observaAnalista = $("#informeVTipo").val();
                $("#tipoInformeArea").text(observaAnalista.toUpperCase());
  
                
              }

              envioInformeFuncionarios($("#enviarInformeAnalistas"), [
                idOrganismo,
                idPreeliminar,
                $("#informeAnalista"),
                identificador,$("#observacionesUsuarios"),tipoObservacion
              ]);
            });


            // reasignacionTramite_Coordinador_Sub($("#reasignarIncremento__a"),[idOrganismo,idPreeliminar,identificador,$("#observacionesUsuarios")]);

            reasignacionTramite_Coordinador_Sub($("#regresarIncremento__a"),[idOrganismo,idPreeliminar,identificador,$("#observacionesUsuarios")]);
          }
          //Discapacidad
          if (
            $("#fisicamenteEstructura__na").val() == "14" ||
            $("#fisicamenteEstructura__na").val() == 14
          ) {
            let identificador = "altoRendimiento";
            tipoE = "discapacidad";
            seccion_Observaciones_Reasignaciones(idOrganismo,tipoE);
            $("#idRol").val(idRol);
  
            $("#fisicamenteEn").val($("#fisicamenteEstructura__na").val());
  
            $("#idOrganismo__m2").val(idOrganismo);
  
            $("#tipoPdf2").val("Informe__Incremento__TecnicoDiscapacidad");
  
            $("#idUsuario").val($("#idUsuarioPrincipal").val());
  
            $("#contenedorCalificacion")
              .append(`<table class='cuerpo__matricez__incrementos' id='tablaRevisorIncremento'>
    
            <thead>
    
                <tr>
    
                    <th style="width:5%!important"><center>N</center></th>
                    <th style="width:45%!important"><center>CONDICIÓN</center></th>
                    <th  style="width:10%!important"><center>CUMPLE</center></th>
                    <th style="width:40%!important"><center>OBSERVACIONES PARA LA ORGANIZACIÓN DEPORTIVA</center></th>
    
                </tr>
    
            </thead>
    
            <tbody class='cuerpo__matricez__seguimientos'>
                <tr>
                    <td align="center" style="font-size:1em !important">1</td>
                    <td style="font-size:1em !important">Registra en las actividades deportivas correspondientes a la actividad concentrado, campamento, base de entrenamiento, evaluaciones y campeonato acorde a la prioridad de la disciplina deportiva en el incremento.</td>
                    <td align="center" style="font-size:1em !important">
                        
                        <select name="selectCondicion1" id="selectCondicion1" class='selectCalifica'>
                            <option value="Cumple">Cumple</option>
                            <option value="No cumple">No Cumple</option>
                            <option value="No aplica">No Aplica</option>
                        </select>
                        
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones1' name='observacionesReasignaciones1' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">2</td>
                    <td style="font-size:1em !important">La planificación del indicador coincide con los eventos deportivos planificados en el incremento.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion2" id="selectCondicion2" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones2' name='observacionesReasignaciones2' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">3</td>
                    <td style="font-size:1em !important">Utiliza la sintaxis clara para el registro de los eventos en el incremento.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion3" id="selectCondicion3" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones3' name='observacionesReasignaciones3' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center"style="font-size:1em !important">4</td>
                    <td style="font-size:1em !important">Registra concentrado, campamento, base de entrenamiento, evaluaciones y campeonato para la categoría menores, prejuveniles, juvenil y absoluto a nivel internacional en el incremento.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion4" id="selectCondicion4" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones4' name='observacionesReasignaciones4' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">5</td>
                    <td style="font-size:1em !important">Registra concentrado, campamento, base de entrenamiento, evaluaciones y campeonato para la categoría menores, prejuveniles, juvenil y absoluto a nivel nacional en el incremento.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion5" id="selectCondicion5" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones5' name='observacionesReasignaciones5' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">6</td>
                    <td style="font-size:1em !important">Utiliza recursos para cubrir gastos autorizados de: pasajes, alimentación, hospedaje, hidratación, medicinas, atención médica, honorarios de árbitros y jueces, uniformes, movilización interna y al exterior de la delegación en el incremento.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion6" id="selectCondicion6" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones6' name='observacionesReasignaciones6' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">7</td>
                    <td style="font-size:1em !important">Utiliza recursos para cubrir pagos por concepto de seguros y bono deportivo en concentrado, campamento, base de entrenamiento, evaluaciones y campeonato a nivel internacional en el incremento.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion7" id="selectCondicion7" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones7' name='observacionesReasignaciones7' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">8</td>
                    <td style="font-size:1em !important">La Planificación Operativa Anual del Organismo Deportivo se encuentra enmarcada en lo establecido en el Acuerdo Ministerial 456 y sus reformas en el incremento.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion8" id="selectCondicion8" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones8' name='observacionesReasignaciones8'  class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
            </tbody>
    
            </table>
            
            <table class='' id='tablaRevisorIncremento2'>
    
            <thead>
    
                <tr><th colspan="4">Condiciones  Generales</th></tr>
                <tr>
    
                    <th style="width:5%!important"><center>N</center></th>
                    <th style="width:45%!important"><center>CONDICIÓN</center></th>
                    <th  style="width:10%!important"><center>CUMPLE</center></th>
                    <th style="width:40%!important"><center>OBSERVACIONES PARA LA ORGANIZACIÓN DEPORTIVA</center></th>
    
                </tr>
    
            </thead>
    
            <tbody class='cuerpo__matricez__seguimientos'>
              <tr>
                <td align="center" style="font-size:1em !important">1</td>
                <td style="font-size:1em !important">La Planificación Operativa Anual del incremento, el Organismo Deportivo se encuentra enmarcada en lo establecido en el Acuerdo Ministerial 456 y sus reformas</td>
                <td align="center" style="font-size:1em !important">
                  <select name="selectCondicion9" id="selectCondicion9" class='selectCalifica'>
                      <option value="Cumple">Cumple</option>
                      <option value="No cumple">No Cumple</option>
                      <option value="No aplica">No Aplica</option>
                  </select>
                </td>
                <td style="font-size:1em !important">
                    <textarea id='observacionesReasignaciones9' name='observacionesReasignaciones9' class='ancho__total__textareas'></textarea>
                </td>
              </tr>
            </tbody>
    
            </table>`);
  
            $("#contenedorCalificacion").append(`<table><tr>
            <th colspan='2'>SEGUIMIENTO Y EVALUACIÓN AL INCREMENTO POA</th></tr><tr><td colspan='2' style="font-size:1em !important">(Detallar las acciones específicas tanto para el seguimiento como para la evaluación del objeto de financiamiento por parte de la entidad beneficiaria.)</td></tr><tr><th style="width:50%!important">Recomendaciones Seguimiento:</th><th style="width:50%!important">Recomendaciones Evaluación:</th></tr><tr><td style="font-size:1em !important">
            <textarea id='RecomendacionesSeguimiento' name='RecomendacionesSeguimiento' class='ancho__total__textareas'></textarea>
            </td><td style="font-size:1em !important">
            <textarea id='RecomendacionesEvaluacion' name='RecomendacionesEvaluacion' class='ancho__total__textareas'></textarea>
            </td></tr></table>`);
  
            $("#contenedorCalificacion").show();
  
            $("#calificarInforme").show();
  
            $("#calificarInforme").click(function (e) {
              e.preventDefault();
  
              if (
                $("#selectCondicion1").val() == "No cumple" ||
                $("#selectCondicion2").val() == "No cumple" ||
                $("#selectCondicion3").val() == "No cumple" ||
                $("#selectCondicion4").val() == "No cumple" ||
                $("#selectCondicion5").val() == "No cumple" ||
                $("#selectCondicion6").val() == "No cumple" ||
                $("#selectCondicion7").val() == "No cumple" ||
                $("#selectCondicion8").val() == "No cumple" ||
                $("#selectCondicion9").val() == "No cumple"
              ) {
                $(".ocultos_incrementosO").hide();
                $(".ocultos_incrementosOb").show();

                $("#informeVTipo").val("observaciones");

                observaAnalista = $("#informeVTipo").val();
                $("#tipoInformeArea").text(observaAnalista.toUpperCase());
              } else {
                $(".ocultos_incrementosO").hide();
                $(".ocultos_incrementosOb").show();

                $("#informeVTipo").val("viabilidad");

                observaAnalista = $("#informeVTipo").val();
                $("#tipoInformeArea").text(observaAnalista.toUpperCase());
  
              }

              envioInformeFuncionarios($("#enviarInformeAnalistas"), [
                idOrganismo,
                idPreeliminar,
                $("#informeAnalista"),
                identificador,$("#observacionesUsuarios"),tipoObservacion
              ]);
            });

            // reasignacionTramite_Coordinador_Sub($("#reasignarIncremento__a"),[idOrganismo,idPreeliminar,identificador,$("#observacionesUsuarios")]);

            reasignacionTramite_Coordinador_Sub($("#regresarIncremento__a"),[idOrganismo,idPreeliminar,identificador,$("#observacionesUsuarios")]);
          }
          //AltoRendimiento
          if (
            $("#fisicamenteEstructura__na").val() == "12" ||
            $("#fisicamenteEstructura__na").val() == 12
          ) {
            let identificador = "altoRendimiento";
            tipoE = "altoRendimiento"
            seccion_Observaciones_Reasignaciones(idOrganismo,tipoE);
            $("#idRol").val(idRol);
  
            $("#fisicamenteEn").val($("#fisicamenteEstructura__na").val());
  
            $("#idOrganismo__m2").val(idOrganismo);
  
            $("#tipoPdf2").val("Informe__Incremento__AltoRendimiento");
  
            $("#idUsuario").val($("#idUsuarioPrincipal").val());
  
            $("#contenedorCalificacion")
              .append(`<table class='' id='tablaRevisorIncremento'><thead><tr><th style="width:5%!important"><center>N</center></th><th style="width:45%!important"><center>CONDICIÓN</center></th><th style="width:10%!important"><center>CUMPLE</center></th><th style="width:40%!important"><center>OBSERVACIONES PARA LA ORGANIZACIÓN DEPORTIVA</center></th></tr></thead><tbody class='cuerpo__matricez__incrementos'><tr><td align="center" style="font-size:1em !important">1</td><td style="font-size:1em !important">Registra en las actividades deportivas correspondientes a la actividad concentrado, campamento, base de entrenamiento, evaluaciones y campeonato acorde a la prioridad de la disciplina deportiva.</td><td align="center" style="font-size:1em !important"><select name="selectCondicion1" id="selectCondicion1" class='selectCalifica'><option value="Cumple">Cumple</option><option value="No cumple">No Cumple</option><option value="No aplica">No Aplica</option></select></td><td style="font-size:1em !important"><textarea id='observacionesReasignaciones1' name='observacionesReasignaciones1' class='ancho__total__textareas'></textarea></td></tr><tr><td align="center" style="font-size:1em !important">2</td><td style="font-size:1em !important">La planificación del indicador coincide con los eventos deportivos planificados.</td><td align="center" style="font-size:1em !important"><select name="selectCondicion2" id="selectCondicion2" class='selectCalifica'><option value="Cumple">Cumple</option><option value="No cumple">No Cumple</option><option value="No aplica">No Aplica</option></select></td><td style="font-size:1em !important"><textarea id='observacionesReasignaciones2' name='observacionesReasignaciones2' class='ancho__total__textareas'></textarea></td></tr><tr><td align="center" style="font-size:1em !important">3</td><td style="font-size:1em !important">Utiliza la sintaxis clara para el registro de los eventos.</td><td align="center" style="font-size:1em !important"><select name="selectCondicion3" id="selectCondicion3" class='selectCalifica'><option value="Cumple">Cumple</option><option value="No cumple">No Cumple</option><option value="No aplica">No Aplica</option></select></td><td style="font-size:1em !important"><textarea id='observacionesReasignaciones3' name='observacionesReasignaciones3 class='ancho__total__textareas'></textarea></td></tr><tr><td align="center"style="font-size:1em !important">4</td><td style="font-size:1em !important">Registra concentrado, campamento, base de entrenamiento, evaluaciones y campeonato para la categoría menores, prejuveniles, juvenil y absoluto a nivel internacional.</td><td align="center" style="font-size:1em !important"><select name="selectCondicion4" id="selectCondicion4" class='selectCalifica'><option value="Cumple">Cumple</option><option value="No cumple">No Cumple</option><option value="No aplica">No Aplica</option></select></td><td style="font-size:1em !important"><textarea id='observacionesReasignaciones4' name='observacionesReasignaciones4' class='ancho__total__textareas'></textarea></td></tr><tr><td align="center" style="font-size:1em !important">5</td><td style="font-size:1em !important">Registra concentrado, campamento, base de entrenamiento, evaluaciones y campeonato para la categoría menores, prejuveniles, juvenil y absoluto a nivel nacional</td><td align="center" style="font-size:1em !important"><select name="selectCondicion5" id="selectCondicion5" class='selectCalifica'><option value="Cumple">Cumple</option><option value="No cumple">No Cumple</option><option value="No aplica">No Aplica</option></select></td><td style="font-size:1em !important"><textarea id='observacionesReasignaciones5' name='observacionesReasignaciones5' class='ancho__total__textareas'></textarea></td></tr><tr><td align="center" style="font-size:1em !important">6</td><td style="font-size:1em !important">Utiliza recursos para cubrir gastos autorizados de: pasajes, alimentación, hospedaje, hidratación, medicinas, atención médica, honorarios de árbitros y jueces, uniformes, movilización interna y al exterior de la delegación</td><td align="center" style="font-size:1em !important"><select name="selectCondicion6" id="selectCondicion6" class='selectCalifica'><option value="Cumple">Cumple</option><option value="No cumple">No Cumple</option><option value="No aplica">No Aplica</option></select></td><td style="font-size:1em !important"><textarea id='observacionesReasignaciones6' name='observacionesReasignaciones6' class='ancho__total__textareas'></textarea></td></tr><tr><td align="center" style="font-size:1em !important">7</td><td style="font-size:1em !important">Utiliza recursos para cubrir pagos por concepto de seguros y bono deportivo en concentrado, campamento, base de entrenamiento, evaluaciones y campeonato a nivel internacional</td><td align="center" style="font-size:1em !important"><select name="selectCondicion7" id="selectCondicion7" class='selectCalifica'><option value="Cumple">Cumple</option><option value="No cumple">No Cumple</option><option value="No aplica">No Aplica</option></select></td><td style="font-size:1em !important"><textarea id='observacionesReasignaciones7' name='observacionesReasignaciones7' class='ancho__total__textareas'></textarea></td></tr><tr><td align="center" style="font-size:1em !important">8</td><td style="font-size:1em !important">La Planificación Operativa Anual del Organismo Deportivo se encuentra enmarcada en lo establecido en el Acuerdo Ministerial 456 y sus reformas</td><td align="center" style="font-size:1em !important"><select name="selectCondicion8" id="selectCondicion8" class='selectCalifica'><option value="Cumple">Cumple</option><option value="No cumple">No Cumple</option><option value="No aplica">No Aplica</option></select></td><td style="font-size:1em !important"><textarea id='observacionesReasignaciones8' name='observacionesReasignaciones8'  class='ancho__total__textareas'></textarea></td></tr></tbody></table><table class='' id='tablaRevisorIncremento2'><thead><tr><th colspan="4">Condiciones  Generales</th></tr><tr><th style="width:5%!important"><center>N</center></th><th style="width:45%!important"><center>CONDICIÓN</center></th><th style="width:10%!important"><center>CUMPLE</center></th><th style="width:40%!important"><center>OBSERVACIONES PARA LA ORGANIZACIÓN DEPORTIVA</center></th></tr></thead><tbody class='cuerpo__matricez__seguimientos'><tr><td align="center" style="font-size:1em !important">1</td><td style="font-size:1em !important">La Planificación Operativa Anual del Organismo Deportivo se encuentra enmarcada en lo establecido en el Acuerdo Ministerial 456 y sus reformas.</td><td align="center" style="font-size:1em !important"><select name="selectCondicion9" id="selectCondicion9" class='selectCalifica'><option value="Cumple">Cumple</option><option value="No cumple">No Cumple</option><option value="No aplica">No Aplica</option></select></td><td style="font-size:1em !important"><textarea id='observacionesReasignaciones9' name='observacionesReasignaciones9' class='ancho__total__textareas'></textarea></td></tr></tbody></table>`);
  
            $("#contenedorCalificacion").show();
  
            $("#calificarInforme").show();
  
            $("#calificarInforme").click(function (e) {
              e.preventDefault();
  
              if (
                $("#selectCondicion1").val() == "No cumple" ||
                $("#selectCondicion2").val() == "No cumple" ||
                $("#selectCondicion3").val() == "No cumple" ||
                $("#selectCondicion4").val() == "No cumple" ||
                $("#selectCondicion5").val() == "No cumple" ||
                $("#selectCondicion6").val() == "No cumple" ||
                $("#selectCondicion7").val() == "No cumple" ||
                $("#selectCondicion8").val() == "No cumple" ||
                $("#selectCondicion9").val() == "No cumple"
              ) {
                $(".ocultos_incrementosO").hide();
                $(".ocultos_incrementosOb").show();

                $("#informeVTipo").val("observaciones");

                observaAnalista = $("#informeVTipo").val();
                $("#tipoInformeArea").text(observaAnalista.toUpperCase());
              } else {
                $(".ocultos_incrementosO").hide();
                $(".ocultos_incrementosOb").show();
  
                $("#informeVTipo").val("viabilidad");

                observaAnalista = $("#informeVTipo").val();
                $("#tipoInformeArea").text(observaAnalista.toUpperCase());
              }

              envioInformeFuncionarios($("#enviarInformeAnalistas"), [
                idOrganismo,
                idPreeliminar,
                $("#informeAnalista"),
                identificador,$("#observacionesUsuarios"),tipoObservacion
              ]);
            });


            // reasignacionTramite_Coordinador_Sub($("#reasignarIncremento__a"),[idOrganismo,idPreeliminar,identificador,$("#observacionesUsuarios")]);

            reasignacionTramite_Coordinador_Sub($("#regresarIncremento__a"),[idOrganismo,idPreeliminar,identificador,$("#observacionesUsuarios")]);
          }
          //Administrativo
          if (
            $("#fisicamenteEstructura__na").val() == "5" ||
            $("#fisicamenteEstructura__na").val() == 5
          ) {
            let identificador = "administrativo";
            tipoE = "financiero"
            seccion_Observaciones_Reasignaciones(idOrganismo,tipoE);
  
            $("#idRol").val(idRol);
  
            $("#fisicamenteEn").val($("#fisicamenteEstructura__na").val());
  
            $("#idOrganismo__m2").val(idOrganismo);
  
            $("#tipoPdf2").val("Informe__Incremento__Administrativo");
  
            $("#idUsuario").val($("#idUsuarioPrincipal").val());
  
            $("#contenedorCalificacion")
              .append(`<table class='' id='tablaRevisorIncremento'>
    
            <thead>
    
                <tr>
    
                    <th style="width:5%!important"><center>N</center></th>
                    <th style="width:45%!important"><center>CONDICIÓN</center></th>
                    <th  style="width:10%!important"><center>CUMPLE</center></th>
                    <th style="width:40%!important"><center>OBSERVACIONES PARA LA ORGANIZACIÓN DEPORTIVA</center></th>
    
                </tr>
    
            </thead>
    
            <tbody class='cuerpo__matricez__seguimientos'>
                <tr>
                    <td align="center" style="font-size:1em !important">1</td>
                    <td style="font-size:1em !important">Detalla satisfactoriamente el objeto de la adquisición de bienes o contratación de servicios.</td>
                    <td align="center" style="font-size:1em !important">
                        
                        <select name="selectCondicion1" id="selectCondicion1" class='selectCalifica'>
                            <option value="Cumple">Cumple</option>
                            <option value="No cumple">No Cumple</option>
                            <option value="No aplica">No Aplica</option>
                        </select>
                        
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones1' name='observacionesReasignaciones1' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">2</td>
                    <td style="font-size:1em !important">No se contempla financiamiento para pago de arreglos extrajudiciales, arrendamiento y licencias de uso de paquetes informáticos, Desarrollo, Actualización, Asistencia Técnica y Soporte de Sistemas Informáticos, dichos gastos deberán ser pagados con recursos de autogestión.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion2" id="selectCondicion2" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones2' name='observacionesReasignaciones2' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">3</td>
                    <td style="font-size:1em !important">Utiliza el ítem presupuestario acorde al objeto de la adquisición de bienes o contratación de servicios.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion3" id="selectCondicion3" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones3' name='observacionesReasignaciones3' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center"style="font-size:1em !important">4</td>
                    <td style="font-size:1em !important">Detalla satisfactoriamente la justificación para el pago de impuestos, tasas y contribuciones</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion4" id="selectCondicion4" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones4' name='observacionesReasignaciones4' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">5</td>
                    <td style="font-size:1em !important">El pago de cada suministro de servicios básicos descrito, se encuentra en el informe aprobado del Ministerio del Deporte remitido por la Dirección de Planificación e Inversión.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion5" id="selectCondicion5" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones5' name='observacionesReasignaciones5' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
               
            </tbody>
    
            </table>`);
  
            $("#contenedorCalificacion").show();
  
            $("#calificarInforme").show();
  
            $("#calificarInforme").click(function (e) {
              e.preventDefault();
  
              if (
                $("#selectCondicion1").val() == "No cumple" ||
                $("#selectCondicion2").val() == "No cumple" ||
                $("#selectCondicion3").val() == "No cumple" ||
                $("#selectCondicion4").val() == "No cumple" ||
                $("#selectCondicion5").val() == "No cumple"
              ) {
                $(".ocultos_incrementosO").hide();
                $(".ocultos_incrementosOb").show();
                $("#informeVTipo").val("observaciones");

                observaAnalista = $("#informeVTipo").val();
                $("#tipoInformeArea").text(observaAnalista.toUpperCase());

              } else {
                $("#contenedorConclusiones").html(" ");
                $(".ocultos_incrementosO").hide();
                $(".ocultos_incrementosOb").show();
                $("#informeVTipo").val("viabilidad");

                observaAnalista = $("#informeVTipo").val();
                $("#tipoInformeArea").text(observaAnalista.toUpperCase());

                $("#observacionesReasignaciones").val(
                  `La correcta ejecución de los recursos públicos financiados por parte del Ministerio del Deporte, para la adquisición de bienes, contratación de servicios, consultoría y obra; es de estricta responsabilidad del Organismo Deportivo conforme lo establecido en el artículo 1 literal b) de la Ley Orgánica del Sistema Nacional de Contratación Pública`
                );
  
                $("#conclusionesReasignaciones").remove();
  
                $("#contenedorConclusiones").append(`
                    <textarea name='conclusionesAd[]' class='ancho__total__textareas form-control' >Una vez que se ha revisado la información enviada por la Dirección de Planificación e Inversión del Ministerio del Deporte, se consigna el registro de información, en virtud de lo cual el presente documento podrá ser considerado como un elemento de opinión para la formación de la voluntad administrativa conforme lo determinado en el artículo 122 del Código Orgánico Administrativo.</textarea><br>`);
  
                $("#contenedorConclusiones").append(
                  `<textarea name='conclusionesAd[]' class='ancho__total__textareas form-control' >La correcta ejecución de los recursos públicos financiados por parte del Ministerio del Deporte, para la adquisición de bienes, contratación de servicios, consultoría y obra; es de estricta responsabilidad del Organismo Deportivo conforme lo establecido en el artículo 1 literal b) de la Ley Orgánica del Sistema Nacional de Contratación Pública.</textarea><br>`
                );
  
                $("#contenedorConclusiones").append(
                  `<textarea name='conclusionesAd[]' class='ancho__total__textareas form-control' >La Organización Deportiva deberá cumplir con lo establecido en las Normas de Control Interno, Reglamento General Sustitutivo para la Administración, Utilización, Manejo y Control de los Bienes e Inventarios del Sector Público, Reglamento Sustitutivo para el Control de los Vehículos del Sector Público y demás normas emitidas por la Contraloría General del Estado.</textarea><br>`
                );
  
                $("#contenedorConclusiones").append(
                  `<textarea name='conclusionesAd[]' class='ancho__total__textareas form-control' >Previo al inicio de un procedimiento de contratación pública, así como para la aceptación de cualquier obligación que genere la erogación de recursos públicos, el Organismo deportivo deberá observar lo dispuesto en el Art. 115 y 101 establecido en el Código Orgánico de Planificación y Finanzas Públicas y su reglamento respectivamente. </textarea>`
                );

              }

              envioInformeFuncionarios($("#enviarInformeAnalistas"), [
                idOrganismo,
                idPreeliminar,
                $("#informeAnalista"),
                identificador,$("#observacionesUsuarios"),tipoObservacion
              ]);

            });

            // reasignacionTramite_Coordinador_Sub($("#reasignarIncremento__a"),[idOrganismo,idPreeliminar,identificador,$("#observacionesUsuarios")]);

            reasignacionTramite_Coordinador_Sub($("#regresarIncremento__a"),[idOrganismo,idPreeliminar,"financiero",$("#observacionesUsuarios")]);
          }
          //Formativo
          if (
            $("#fisicamenteEstructura__na").val() == "13" ||
            $("#fisicamenteEstructura__na").val() == 13
          ) {
            let identificador = "desarrollo";
            tipoE = "formativo";
            seccion_Observaciones_Reasignaciones(idOrganismo,tipoE);
            $("#idRol").val(idRol);
  
            $("#fisicamenteEn").val($("#fisicamenteEstructura__na").val());
  
            $("#idOrganismo__m2").val(idOrganismo);
  
            $("#tipoPdf2").val("Informe__Incremento__TecnicoFormativo");
  
            $("#idUsuario").val($("#idUsuarioPrincipal").val());
  
            $("#contenedorCalificacion")
              .append(`<table class='' id='tablaRevisorIncremento'>
    
            <thead>
    
                <tr>
    
                    <th style="width:5%!important"><center>N</center></th>
                    <th style="width:45%!important"><center>CONDICIÓN</center></th>
                    <th  style="width:10%!important"><center>CUMPLE</center></th>
                    <th style="width:40%!important"><center>OBSERVACIONES PARA LA ORGANIZACIÓN DEPORTIVA</center></th>
    
                </tr>
    
            </thead>
    
            <tbody class='cuerpo__matricez__seguimientos'>
                <tr>
                    <td align="center" style="font-size:1em !important">1</td>
                    <td style="font-size:1em !important">Registra en las actividades correspondientes organización de campeonatos, eventos , participación en eventos nacionales e internacionales, implementación deportiva acorde a la prioridad de la disciplina deportiva.</td>
                    <td align="center" style="font-size:1em !important">
                        
                        <select name="selectCondicion1" id="selectCondicion1" class='selectCalifica'>
                            <option value="Cumple">Cumple</option>
                            <option value="No cumple">No Cumple</option>
                            <option value="No aplica">No Aplica</option>
                        </select>
                        
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones1' name='observacionesReasignaciones1' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">2</td>
                    <td style="font-size:1em !important">La planificación del indicador coincide con los eventos deportivos planificados</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion2" id="selectCondicion2" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones2' name='observacionesReasignaciones2' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">3</td>
                    <td style="font-size:1em !important">Utiliza la sintaxis clara para el registro de los eventos.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion3" id="selectCondicion3" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones3' name='observacionesReasignaciones3' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center"style="font-size:1em !important">4</td>
                    <td style="font-size:1em !important">Registra juzgamiento para el evento o campeonato provincial o naciona.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion4" id="selectCondicion4" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones4' name='observacionesReasignaciones4' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">5</td>
                    <td style="font-size:1em !important">Utiliza para la atención de delegados extranjeros y nacionales, deportistas, entrenadores, cuerpo técnico que representa al país.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion5" id="selectCondicion5" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones5' name='observacionesReasignaciones5' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">6</td>
                    <td style="font-size:1em !important">Utiliza recursos para cubrir gastos autorizados de: pasajes, alimentación, hospedaje, hidratación, medicinas, atención médica, honorarios de árbitros y jueces, uniformes, movilización interna de la delegación.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion6" id="selectCondicion6" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones6' name='observacionesReasignaciones6' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">7</td>
                    <td style="font-size:1em !important">Utiliza recursos para cubrir pagos por concepto de seguros en los campeonatos, bonos deportivos.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion7" id="selectCondicion7" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones7' name='observacionesReasignaciones7' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">8</td>
                    <td style="font-size:1em !important">La Planificación Operativa Anual del Organismo Deportivo se encuentra enmarcada en lo establecido en el Acuerdo Ministerial 456 y sus reformas.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion8" id="selectCondicion8" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones8' name='observacionesReasignaciones8' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
               
            </tbody>
    
            </table>`);
  
            $("#contenedorCalificacion").show();
  
            $("#calificarInforme").show();
  
            $("#calificarInforme").click(function (e) {
              e.preventDefault();
  
              if (
                $("#selectCondicion1").val() == "No cumple" ||
                $("#selectCondicion2").val() == "No cumple" ||
                $("#selectCondicion3").val() == "No cumple" ||
                $("#selectCondicion4").val() == "No cumple" ||
                $("#selectCondicion5").val() == "No cumple" ||
                $("#selectCondicion6").val() == "No cumple" ||
                $("#selectCondicion7").val() == "No cumple" ||
                $("#selectCondicion8").val() == "No cumple"
              ) {
                $(".ocultos_incrementosO").hide();
                $(".ocultos_incrementosOb").show();

                $("#informeVTipo").val("observaciones");

                observaAnalista = $("#informeVTipo").val();
                $("#tipoInformeArea").text(observaAnalista.toUpperCase());
              } else {
                $(".ocultos_incrementosO").hide();
                $(".ocultos_incrementosOb").show();
  
                $("#informeVTipo").val("viabilidad");

                observaAnalista = $("#informeVTipo").val();
                $("#tipoInformeArea").text(observaAnalista.toUpperCase());
              }

              envioInformeFuncionarios($("#enviarInformeAnalistas"), [
                idOrganismo,
                idPreeliminar,
                $("#informeAnalista"),
                identificador,$("#observacionesUsuarios"),tipoObservacion
              ]);

              
            });

            // reasignacionTramite_Coordinador_Sub($("#reasignarIncremento__a"),[idOrganismo,idPreeliminar,identificador,$("#observacionesUsuarios")]);

            reasignacionTramite_Coordinador_Sub($("#regresarIncremento__a"),[idOrganismo,idPreeliminar,identificador,$("#observacionesUsuarios")]);
          }
          //Infraestructura
          if (
            $("#fisicamenteEstructura__na").val() == "15" ||
            $("#fisicamenteEstructura__na").val() == 15
          ) {
            let identificador = "infraestructura";
            tipoE = "infraestructura";
            seccion_Observaciones_Reasignaciones(idOrganismo,tipoE);
            $("#idRol").val(idRol);
  
            $("#fisicamenteEn").val($("#fisicamenteEstructura__na").val());
  
            $("#idOrganismo__m2").val(idOrganismo);
  
            $("#tipoPdf2").val("Informe__Incremento__TecnicoInfraestructura");
  
            $("#idUsuario").val($("#idUsuarioPrincipal").val());
  
            $("#contenedorCalificacion")
              .append(`<table class='' id='tablaRevisorIncremento'>
    
            <thead>
    
                <tr>
    
                    <th style="width:5%!important"><center>N</center></th>
                    <th style="width:45%!important"><center>CONDICIÓN</center></th>
                    <th  style="width:10%!important"><center>CUMPLE</center></th>
                    <th style="width:40%!important"><center>OBSERVACIONES PARA LA ORGANIZACIÓN DEPORTIVA</center></th>
    
                </tr>
    
            </thead>
    
            <tbody class='cuerpo__matricez__seguimientos'>
                <tr>
                    <td align="center" style="font-size:1em !important">1</td>
                    <td style="font-size:1em !important">Declara toda la infraestructura deportiva a su cargo, adjuntando la legalidad  respectiva.</td>
                    <td align="center" style="font-size:1em !important">
                        
                        <select name="selectCondicion1" id="selectCondicion1" class='selectCalifica'>
                            <option value="Cumple">Cumple</option>
                            <option value="No cumple">No Cumple</option>
                            <option value="No aplica">No Aplica</option>
                        </select>
                        
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones1' name='observacionesReasignaciones1' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">2</td>
                    <td style="font-size:1em !important">La planificación del indicador tiene <br> coherencia con el nombre del indicador de <br> la actividad 002 y se encuentra redactado <br> con número entero</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion2" id="selectCondicion2" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones2' name='observacionesReasignaciones2' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">3</td>
                    <td style="font-size:1em !important">Planifican únicamente intervenciones de rehabilitación, y/o mantenimiento en aquellos escenarios deportivos que sean propiedad de la organización deportiva  
                    Anexo: Documentación de la legalidad del predio (escritura, certificado de propiedad, etc.).
                    Dentro de la planificación, destinan recursos para gastos de rehabilitación, y/o mantenimiento de los escenarios deportivos que son propiedad del  Ministerio del Deporte, precautelando su  correcto uso y funcionamiento. 
                    Anexo: Documentación de la legalidad del predio (escritura, certificado de propiedad, etc.).</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion3" id="selectCondicion3" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones3' name='observacionesReasignaciones3' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center"style="font-size:1em !important">4</td>
                    <td style="font-size:1em !important">Utiliza los ítems presupuestarios aprobados del anexo XX, para la contratación de bienes y servicios respecto al tipo de intervenciones propuestas para la rehabilitación, y/o mantenimiento</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion4" id="selectCondicion4" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones4' name='observacionesReasignaciones4' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">5</td>
                    <td style="font-size:1em !important">Mantiene concordancia el nombre de la intervención para rehabilitación, y/o <br> mantenimiento con el escenario deportivo a intervenir y, los bienes y servicios involucrados en la intervención.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion5" id="selectCondicion5" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones5' name='observacionesReasignaciones5' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">6.1</td>
                    <td style="font-size:1em !important">Presenta el Informe justificativo del gasto para la contratación o adquisición de bienes o servicios en escenarios deportivo respecto a <span style="font-weight:bold !important;">Rehabilitación (Corresponde al <br> área de Infraestructura)</span> incluye: <br>
                    -Análisis de precios unitarios <br>
                    -Presupuesto <br>
                    -Planos y anexos gráficos (debidamente suscritos por el profesional en la rama <br>
                    -Cronograma valorado. <br>
                    -Especificaciones técnicas. <br>
                    -Registro fotográfico de la intervención a subsanar. 
                    -Contemplar parámetros de accesibilidad universal; según corresponda al tipo de intervención aprobada en los lineamientos (fachadas exteriores, interiores,
                    cubierta, pisos interiores, pisos exteriores, <br> piscinas, instalaciones hidrosanitarias de las edificaciones deportivas, sistema eléctrico-electrónico). 
                    Para estudios y/o fiscalización: Certificado de no contar con técnicos afines a la contratación Justificación técnica. 
                    Justificación técnica indicando perfil profesional y experiencia requerida para la <br> contratación; alcance de los trabajos, <br> presupuesto estimado (Estudio de mercado), plazo.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion6" id="selectCondicion6" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones6' name='observacionesReasignaciones6' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">6.2</td>
                    <td style="font-size:1em !important">Presenta el Informe justificativo del gasto para la contratación o adquisición de bienes o servicios en escenarios deportivos respecto <span style="font-weight:bold!important;">Mantenimiento (Corresponde a la <br> Dirección de Administración de Instalaciones Deportivas)</span>incluye: 
                    -Cuadro comparativo como estudio de mercado con análisis de precios unitarios respaldado por 2 cotizaciones <br>
                    -Registro fotográfico de la intervención a subsanar 
                    -Documentación de la legalidad del predio; según corresponda al tipo de intervención aprobada en los lineamientos</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion7" id="selectCondicion7" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones7' name='observacionesReasignaciones7' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
            </tbody>
    
            </table>`);
  
            $("#contenedorCalificacion").show();
  
            $("#calificarInforme").show();
  
            $("#calificarInforme").click(function (e) {
              e.preventDefault();
  
              if (
                $("#selectCondicion1").val() == "No cumple" ||
                $("#selectCondicion2").val() == "No cumple" ||
                $("#selectCondicion3").val() == "No cumple" ||
                $("#selectCondicion4").val() == "No cumple" ||
                $("#selectCondicion5").val() == "No cumple" ||
                $("#selectCondicion6").val() == "No cumple" ||
                $("#selectCondicion7").val() == "No cumple"
              ) {
                $(".ocultos_incrementosO").hide();
                $(".ocultos_incrementosOb").show();

                $("#informeVTipo").val("observaciones");

                observaAnalista = $("#informeVTipo").val();
                $("#tipoInformeArea").text(observaAnalista.toUpperCase());
              } else {
                $("#contenedorConclusiones").html(" ");
                $(".ocultos_incrementosO").hide();
                $(".ocultos_incrementosOb").show();
  
                $("#informeVTipo").val("viabilidad");

                observaAnalista = $("#informeVTipo").val();
                $("#tipoInformeArea").text(observaAnalista.toUpperCase());
                
                $("#conclusionesReasignaciones").remove();
  
                $("#contenedorConclusiones").append(`
                    <textarea name='conclusionesAd[]' class='ancho__total__textareas form-control'>Se deja constancia, que los bienes y servicios con sus montos planificados para las intervenciones por rehabilitación y/o mantenimiento respecto a la actividad 002 señaladas por las entidades deportivas para el presente año, así como su ejecución y correcto uso de los recursos públicos es responsabilidad de los Organismos Deportivos.</textarea><br>`);
  
                $("#contenedorConclusiones").append(
                  `<textarea name='conclusionesAd[]' class='ancho__total__textareas form-control' >Finalmente, se recuerda que los Organismos Deportivos al administrar y ejecutar Recursos Públicos deben regirse en la normativa legal vigente y sujetarse a las normas de control, monitoreo y evaluación.</textarea><br>`
                );
  
                $("#contenedorConclusiones").append(
                  `<textarea name='conclusionesAd[]' class='ancho__total__textareas form-control' >Una vez que se ha procedido con el ANÁLISIS por parte de las Direcciones de Administración de Instalaciones Deportivas y/o Infraestructura Deportiva del Ministerio del Deporte, se ha verificado que el organismo deportivo CUMPLE/NO CUMPLE con los lineamientos vigentes aprobados mediante Acuerdo 0318 del 11 de diciembre de 2022.</textarea><br>`
                );
              }

              envioInformeFuncionarios($("#enviarInformeAnalistas"), [
                idOrganismo,
                idPreeliminar,
                $("#informeAnalista"),
                identificador,$("#observacionesUsuarios"),tipoObservacion
              ]);

              
            });

            // reasignacionTramite_Coordinador_Sub($("#reasignarIncremento__a"),[idOrganismo,idPreeliminar,identificador,$("#observacionesUsuarios")]);

            reasignacionTramite_Coordinador_Sub($("#regresarIncremento__a"),[idOrganismo,idPreeliminar,identificador,$("#observacionesUsuarios")]);
          }
  
          //Planificacion
          if (
            $("#fisicamenteEstructura__na").val() == "18" ||
            $("#fisicamenteEstructura__na").val() == 18
          ) {
            let identificador = "planificacion";
            tipoE = "planificacion";
            seccion_Observaciones_Reasignaciones(idOrganismo,tipoE);
            $("#idRol").val(idRol);
  
            $("#fisicamenteEn").val($("#fisicamenteEstructura__na").val());
  
            $("#idOrganismo__m2").val(idOrganismo);
  
            $("#tipoPdf2").val("Informe__Incremento__Planificacion");
  
            $("#idUsuario").val($("#idUsuarioPrincipal").val());
  
            $("#contenedorCalificacion")
              .append(`<table class='' id='tablaRevisorIncremento'>
    
            <thead>
    
                <tr>
    
                    <th style="width:5%!important"><center>N</center></th>
                    <th style="width:45%!important"><center>CONDICIÓN</center></th>
                    <th  style="width:10%!important"><center>CUMPLE</center></th>
                    <th style="width:40%!important"><center>OBSERVACIONES PARA LA ORGANIZACIÓN DEPORTIVA</center></th>
    
                </tr>
    
            </thead>
    
            <tbody class='cuerpo__matricez__seguimientos'>
                <tr>
                    <td align="center" style="font-size:1em !important">1</td>
                    <td style="font-size:1em !important">El POA de la OD esta alineada al Plan Decenal del Deporte Educación Física y Recreación, a la Planificación Estratégica Institucional del Ministerio del Deporte y al Plan Nacional de Desarrollo.</td>
                    <td align="center" style="font-size:1em !important">
                        
                        <select name="selectCondicion1" id="selectCondicion1" class='selectCalifica'>
                            <option value="Cumple">Cumple</option>
                            <option value="No cumple">No Cumple</option>
                            <option value="No aplica">No Aplica</option>
                        </select>
                        
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones1' name='observacionesReasignaciones1' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">2</td>
                    <td style="font-size:1em !important">Ejecuta la Planificación anual del personal administrativo, de mantenimiento y técnicos y de servicios amparado en el Código de Trabajo.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion2" id="selectCondicion2" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones2' name='observacionesReasignaciones2' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">3</td>
                    <td style="font-size:1em !important">Ejecuta la Planificación anual del personal administrativo y técnicos, relacionado a Contratos Civiles de servicios profesionales.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion3" id="selectCondicion3" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones3' name='observacionesReasignaciones3' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center"style="font-size:1em !important">4</td>
                    <td style="font-size:1em !important">La Organización Deportiva no ha creado nuevos puestos de trabajo administrativo, de mantenimiento y técnicos respecto del POA 2022</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion4" id="selectCondicion4" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones4' name='observacionesReasignaciones4' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">5</td>
                    <td style="font-size:1em !important">La Organización Deportiva no ha incrementado Contratos Civiles de servicios profesionales de personal administrativo y técnico respecto del POA 2022</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion5" id="selectCondicion5" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones5' name='observacionesReasignaciones5' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">6</td>
                    <td style="font-size:1em !important">La Organización Deportiva no incrementa la masa salarial relacionada al personal administrativo, de mantenimiento y técnicos de servicios respecto del POA 2022</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion6" id="selectCondicion6" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones6' name='observacionesReasignaciones6' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">7</td>
                    <td style="font-size:1em !important">La Organización Deportiva no incrementa presupuesto relacionado a honorarios para Contratos Civiles de servicios profesionales de personal administrativo y técnicos respecto del POA 2022</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion7" id="selectCondicion7" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones7' name='observacionesReasignaciones7' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">8</td>
                    <td style="font-size:1em !important">Si planificó servicios básicos verificar que en la matriz de suministro el número de suministro cuente con informe de aprobación del Ministerio del Deporte.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion8" id="selectCondicion8" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones8' name='observacionesReasignaciones8' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">9</td>
                    <td style="font-size:1em !important">En caso que planifique seguros de bienes y vehículos presenta el listado de bienes o vehículos con la respectiva cobertura.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion9" id="selectCondicion9" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones9' name='observacionesReasignaciones9' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
            </tbody>
    
            </table>`);
  
            $("#contenedorCalificacion").show();
  
            $("#calificarInforme").show();
  
            let observaAnalista ="";
            $("#calificarInforme").click(function (e) {
              e.preventDefault();
  
              if (
                $("#selectCondicion1").val() == "No cumple" ||
                $("#selectCondicion2").val() == "No cumple" ||
                $("#selectCondicion3").val() == "No cumple" ||
                $("#selectCondicion4").val() == "No cumple" ||
                $("#selectCondicion5").val() == "No cumple" ||
                $("#selectCondicion6").val() == "No cumple" ||
                $("#selectCondicion7").val() == "No cumple" ||
                $("#selectCondicion8").val() == "No cumple" ||
                $("#selectCondicion9").val() == "No cumple"
              ) {
                $("#conclusionesReasignaciones").val(" ");
                $("#observacionesReasignaciones").val(" ");
                $(".ocultos_incrementosO").hide();
                $(".ocultos_incrementosOb").show(); 
                $("#informeVTipo").val("observaciones");

                observaAnalista = $("#informeVTipo").val();
                $("#tipoInformeArea").text(observaAnalista.toUpperCase());
              } else {
                $("#conclusionesReasignaciones").val(" ");
                $("#observacionesReasignaciones").val(" ");
                $(".ocultos_incrementosO").hide();
                $(".ocultos_incrementosOb").show();                
                $("#informeVTipo").val("viabilidad");

                observaAnalista = $("#informeVTipo").val();
                $("#tipoInformeArea").text(observaAnalista.toUpperCase());  
              }

              envioInformeFuncionarios($("#enviarInformeAnalistas"), [
                idOrganismo,
                idPreeliminar,
                $("#informeAnalista"),
                identificador,$("#observacionesUsuarios"),tipoObservacion,observaAnalista]);
            });

            // reasignacionTramite_Coordinador_Sub($("#reasignarIncremento__a"),[idOrganismo,idPreeliminar,identificador,$("#observacionesUsuarios")]);

            reasignacionTramite_Coordinador_Sub($("#regresarIncremento__a"),[idOrganismo,idPreeliminar,identificador,$("#observacionesUsuarios")]);
          }
        }
        
        if(($("#idRolAd").val() == "4" || $("#idRolAd").val() == 4) || ($("#idRolAd").val() == "7" || $("#idRolAd").val() == 7) || ($("#idRolAd").val() == "2" || $("#idRolAd").val() == 2)){

          let identificador;
          let tipoE;

          if(($("#fisicamenteEstructura__na").val() == "1" ||
          $("#fisicamenteEstructura__na").val() == 1) || ($("#fisicamenteEstructura__na").val() == "15" ||
          $("#fisicamenteEstructura__na").val() == 15) || ($("#fisicamenteEstructura__na").val() == "6" ||
          $("#fisicamenteEstructura__na").val() == 6)){
            tipoE = "infraestructura";
            identificador = "infraestructura";

          }else if(($("#fisicamenteEstructura__na").val() == "2" ||
          $("#fisicamenteEstructura__na").val() == 2) || ($("#fisicamenteEstructura__na").val() == "5" ||
          $("#fisicamenteEstructura__na").val() == 5)){
            tipoE = "financiero";
            identificador = "financiero";

          }else if(($("#fisicamenteEstructura__na").val() == "3" ||
          $("#fisicamenteEstructura__na").val() == 3) || ($("#fisicamenteEstructura__na").val() == "18" ||
          $("#fisicamenteEstructura__na").val() == 18)){
            tipoE = "planificacion";
            identificador = "planificacion";
          }else if(($("#fisicamenteEstructura__na").val() == "24" ||
          $("#fisicamenteEstructura__na").val() == 24) || ($("#fisicamenteEstructura__na").val() == "12" ||
          $("#fisicamenteEstructura__na").val() == 12) || ($("#fisicamenteEstructura__na").val() == "14" ||
          $("#fisicamenteEstructura__na").val() == 14)){
            tipoE = "altoRendimiento";
            identificador = "altoRendimiento";

          }else if(($("#fisicamenteEstructura__na").val() == "26" ||
          $("#fisicamenteEstructura__na").val() == 26) || ($("#fisicamenteEstructura__na").val() == "13" ||
          $("#fisicamenteEstructura__na").val() == 13) || ($("#fisicamenteEstructura__na").val() == "19" ||
          $("#fisicamenteEstructura__na").val() == 19)){
            tipoE = "desarrollo";
            identificador = "desarrollo";

          }


          reasignacionTramite_Coordinador_Sub($("#reasignarIncremento__a"),[idOrganismo,idPreeliminar,identificador,$("#observacionesUsuarios")]);

          reasignacionTramite_Coordinador_Sub($("#regresarIncremento__a"),[idOrganismo,idPreeliminar,identificador,$("#observacionesUsuarios")]);

          seccion_Observaciones_Reasignaciones(idOrganismo,tipoE);

          // ocultarSeccionesModal(".fila__incrementos__regresar");

          verificaExistenciaArchivo(idOrganismo,idPreeliminar,$("#fisicamenteEstructura__na"));

          if($("#fisicamenteEstructura__na").val() == 18 || $("#fisicamenteEstructura__na").val() == 3){
            verificaExistenciaArchivoCoordinacionP(idOrganismo,idPreeliminar);
          }
        }


      });
       	

  });

}


var datatablets__Incrementos__recomendacion = function (tabla, identificador) {

  var table2 = $(tabla).DataTable({

    "language": {

      "sProcessing": "Procesando...",
      "sLengthMenu": "Mostrar _MENU_ registros",
      "sZeroRecords": "No se encontraron resultados",
      "sEmptyTable": "Ningún dato disponible en esta tabla",
      "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
      "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
      "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix": "",
      "sSearch": "Buscar:",
      "sUrl": "",
      "sInfoThousands": ",",
      "sLoadingRecords": "No existen datos",
      "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    },

    dom: 'Bfrtip',
      buttons: [
        {
          
          extend: 'excel',
          className: 'btn-excel',
          title:'Incrementos',
          text: '<button  class="buttonD" ><i class="fas fa-file-excel" style="color: #277c41; font-size: 36px;" ></i></button>',
      },
    
      {
        extend: 'pdf',
        title: 'Incrementos',
        text: '<button  class="buttonD" ><i class="fas fa-file-pdf " style="color: #BF0D0D; font-size: 36px;"></i></button>',
      
        orientation: 'landscape',
        customize:function(doc) {

            doc.defaultStyle.fontSize = 6;

            doc.styles.title = {
                color: 'black',
                fontSize: '6',
                alignment: 'center',
                margin:'0'                                                
            }
            doc.styles.tableHeader = {

              fillColor:'#311b92',
              fontSize: '6',
              color:'white',
              alignment:'center',
                              
          }
          

          }

        }
    ],

    "bLengthChange": false,
    "pagingType": "full_numbers",
    "Paginate": true,
    "pagingType": "full_numbers",
    "retrieve": true,
    "paging": true,
    "pageLength": 20,

    "ajax": {

      "method": "POST",
      "url": "modelosBd/incrementosDecrementos/datatablets.md.php",
      "data": {
        "identificador": identificador
      }

    },

    "aoColumnDefs": [
      
      {

        "aTargets": 8,
        "mRender": (function (data, type, row) {

          return "<center><button class='recomendar__boton__incremento estilo__botonDatatablets btn btn-primary' data-toggle='modal' data-target='#modalAreasTecnicas'>Asignar</button></center>";

        })

      },
      {

        "aTargets": 9,
        "mRender": (function (data, type, row) {

          return `<center><span>${row['observacionOrganismo']}</span></center>`;

        })

      },
      
    ]

  });

  funcion__recomendar__Incrementos__Subsecretarias("#recomendacion__Incremento__Revisores tbody", table2);
}

var funcion__recomendar__Incrementos__Subsecretarias=function(tbody,table){

  $(tbody).on("click","button.recomendar__boton__incremento",function(e){
      
    e.preventDefault();

    var data=table.row($(this).parents("tr")).data();

    $(".titulos_modal").text(data[1]);
    let idOrganismo = data[9];
    let idPreeliminar = data[8];
    var idRol = $("#idRolAd").val();
    let tipoObservacion = "";
    let tipoE = "";

    

    $.getScript("layout/scripts/js/incrementosDecrementos/selector.js",function(){
      verificar__Pdf__Tamanio($(".verificaPdf"));
    });

    $.getScript(
      "layout/scripts/js/incrementosDecrementos/metodos.js",
      function () {

        ocultarSeccionesModal($("#contenedorTablaTramitesIncrementos"));
        
        agregar__Valores__Poa_Incrementos($(".poaIncrementosAbrir"),idOrganismo,$("#fisicamenteEstructura__na").val(),$("#idRolAd").val(),idPreeliminar);

        agregar__Valores__Poa_Aprobado($(".poaAprobadoAbrir"),idOrganismo,$("#fisicamenteEstructura__na").val(),$("#idRolAd").val(),idPreeliminar);

        var variableFront = $("#filesFrontend").val();

          setTimeout(function() {
            datatablets__tramites__Incrementos__Analistas($("#tramites_Incrementos_Analistas"),"tramites_Incrementos_Analistas",idOrganismo,variableFront);
          }, 2000);
        
          let identificador;
        if ($("#idRolAd").val() == "3" || $("#idRolAd").val() == 3) {

          ocultarSeccionesModal(".fila__incrementos__reasignar");
          // ocultarSeccionesModal("#selects__superiores");

          tipoObservacion = "reporteEnviado";
          //Recreativo
          if (
            $("#fisicamenteEstructura__na").val() == "19" ||
            $("#fisicamenteEstructura__na").val() == 19
          ) {
            tipoE = "recreativo";
            seccion_Observaciones_Reasignaciones(idOrganismo,tipoE);
            $("#idRol").val(idRol);
  
            $("#fisicamenteEn").val($("#fisicamenteEstructura__na").val());
  
            $("#idOrganismo__m2").val(idOrganismo);
  
            $("#tipoPdf2").val("Informe__Incremento__TecnicoRecreacion");
  
            $("#idUsuario").val($("#idUsuarioPrincipal").val());
  
            $("#contenedorCalificacion")
              .append(`<table class='' id='tablaRevisorIncremento'>
    
            <thead>
    
                <tr>
    
                    <th style="width:5%!important"><center>N</center></th>
                    <th style="width:45%!important"><center>CONDICIÓN</center></th>
                    <th  style="width:10%!important"><center>CUMPLE</center></th>
                    <th style="width:40%!important"><center>OBSERVACIONES PARA LA ORGANIZACIÓN DEPORTIVA</center></th>
    
                </tr>
    
            </thead>
    
            <tbody class='cuerpo__matricez__seguimientos'>
                <tr>
                    <td align="center" style="font-size:1em !important">1</td>
                    <td style="font-size:1em !important">Registra en las actividades recreativas correspondientes organización de campeonatos provinciales acorde a la prioridad de la disciplina deportiva.</td>
                    <td align="center" style="font-size:1em !important">
                        
                        <select name="selectCondicion1" id="selectCondicion1" class='selectCalifica'>
                            <option value="Cumple">Cumple</option>
                            <option value="No cumple">No Cumple</option>
                            <option value="No aplica">No Aplica</option>
                        </select>
                        
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones1' name='observacionesReasignaciones1' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">2</td>
                    <td style="font-size:1em !important">La planificación del indicador coincide con los eventos deportivos planificados.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion2" id="selectCondicion2" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones2' name='observacionesReasignaciones2' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">3</td>
                    <td style="font-size:1em !important">Utiliza la sintaxis clara para el registro de los eventos.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion3" id="selectCondicion3" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones3' name='observacionesReasignaciones3' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center"style="font-size:1em !important">4</td>
                    <td style="font-size:1em !important">Registra juzgamiento para el evento o campeonato provincial o nacional</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion4" id="selectCondicion4" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones4' name='observacionesReasignaciones4' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">5</td>
                    <td style="font-size:1em !important">Utiliza para la atención de delegados extranjeros y nacionales, deportistas, entrenadores, cuerpo técnico que representa al país.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion5" id="selectCondicion5" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones5' name='observacionesReasignaciones5' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">6</td>
                    <td style="font-size:1em !important">Utiliza recursos para cubrir gastos autorizados de: pasajes, alimentación, hospedaje, hidratación, medicinas, atención médica, honorarios de árbitros y jueces, uniformes, movilización interna de la delegación</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion6" id="selectCondicion6" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones6' name='observacionesReasignaciones6' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">7</td>
                    <td style="font-size:1em !important">Utiliza recursos para cubrir pagos por concepto de seguros en los campeonatos.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion7" id="selectCondicion7" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones7' name='observacionesReasignaciones7' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">8</td>
                    <td style="font-size:1em !important">La Planificación Operativa Anual del Organismo Deportivo se encuentra enmarcada en lo establecido en el Acuerdo Ministerial 456 y sus reformas.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion8" id="selectCondicion8" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones8' name='observacionesReasignaciones8'  class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
            </tbody>
    
            </table>`);
  
            $("#contenedorCalificacion").show();
  
            $("#calificarInforme").show();
  
            $("#calificarInforme").click(function (e) {
              e.preventDefault();
              if (
                $("#selectCondicion1").val() == "No cumple" ||
                $("#selectCondicion2").val() == "No cumple" ||
                $("#selectCondicion3").val() == "No cumple" ||
                $("#selectCondicion4").val() == "No cumple" ||
                $("#selectCondicion5").val() == "No cumple" ||
                $("#selectCondicion6").val() == "No cumple" ||
                $("#selectCondicion7").val() == "No cumple" ||
                $("#selectCondicion8").val() == "No cumple"
              ) {
                $(".ocultos_incrementosOb").hide();
                $(".ocultos_incrementosO").show();
              } else {
                $(".ocultos_incrementosO").hide();
                $(".ocultos_incrementosOb").show();
  
                envioInformeFuncionarios($("#enviarInformeAnalistas"), [
                  idOrganismo,
                  idPreeliminar,
                  $("#informeAnalista"),
                  identificador,$("#observacionesReasignaciones"),tipoObservacion
                ]);
              }
            });
          }
          //Discapacidad
          if (
            $("#fisicamenteEstructura__na").val() == "14" ||
            $("#fisicamenteEstructura__na").val() == 14
          ) {
            let identificador = "alto";
            tipoE = "discapacidad";
            seccion_Observaciones_Reasignaciones(idOrganismo,tipoE);
            $("#idRol").val(idRol);
  
            $("#fisicamenteEn").val($("#fisicamenteEstructura__na").val());
  
            $("#idOrganismo__m2").val(idOrganismo);
  
            $("#tipoPdf2").val("Informe__Incremento__TecnicoDiscapacidad");
  
            $("#idUsuario").val($("#idUsuarioPrincipal").val());
  
            $("#contenedorCalificacion")
              .append(`<table class='' id='tablaRevisorIncremento'>
    
            <thead>
    
                <tr>
    
                    <th style="width:5%!important"><center>N</center></th>
                    <th style="width:45%!important"><center>CONDICIÓN</center></th>
                    <th  style="width:10%!important"><center>CUMPLE</center></th>
                    <th style="width:40%!important"><center>OBSERVACIONES PARA LA ORGANIZACIÓN DEPORTIVA</center></th>
    
                </tr>
    
            </thead>
    
            <tbody class='cuerpo__matricez__seguimientos'>
                <tr>
                    <td align="center" style="font-size:1em !important">1</td>
                    <td style="font-size:1em !important">Registra en las actividades deportivas correspondientes a la actividad concentrado, campamento, base de entrenamiento, evaluaciones y campeonato acorde a la prioridad de la disciplina deportiva en el incremento.</td>
                    <td align="center" style="font-size:1em !important">
                        
                        <select name="selectCondicion1" id="selectCondicion1" class='selectCalifica'>
                            <option value="Cumple">Cumple</option>
                            <option value="No cumple">No Cumple</option>
                            <option value="No aplica">No Aplica</option>
                        </select>
                        
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones1' name='observacionesReasignaciones1' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">2</td>
                    <td style="font-size:1em !important">La planificación del indicador coincide con los eventos deportivos planificados en el incremento.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion2" id="selectCondicion2" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones2' name='observacionesReasignaciones2' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">3</td>
                    <td style="font-size:1em !important">Utiliza la sintaxis clara para el registro de los eventos en el incremento.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion3" id="selectCondicion3" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones3' name='observacionesReasignaciones3' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center"style="font-size:1em !important">4</td>
                    <td style="font-size:1em !important">Registra concentrado, campamento, base de entrenamiento, evaluaciones y campeonato para la categoría menores, prejuveniles, juvenil y absoluto a nivel internacional en el incremento.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion4" id="selectCondicion4" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones4' name='observacionesReasignaciones4' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">5</td>
                    <td style="font-size:1em !important">Registra concentrado, campamento, base de entrenamiento, evaluaciones y campeonato para la categoría menores, prejuveniles, juvenil y absoluto a nivel nacional en el incremento.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion5" id="selectCondicion5" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones5' name='observacionesReasignaciones5' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">6</td>
                    <td style="font-size:1em !important">Utiliza recursos para cubrir gastos autorizados de: pasajes, alimentación, hospedaje, hidratación, medicinas, atención médica, honorarios de árbitros y jueces, uniformes, movilización interna y al exterior de la delegación en el incremento.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion6" id="selectCondicion6" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones6' name='observacionesReasignaciones6' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">7</td>
                    <td style="font-size:1em !important">Utiliza recursos para cubrir pagos por concepto de seguros y bono deportivo en concentrado, campamento, base de entrenamiento, evaluaciones y campeonato a nivel internacional en el incremento.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion7" id="selectCondicion7" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones7' name='observacionesReasignaciones7' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">8</td>
                    <td style="font-size:1em !important">La Planificación Operativa Anual del Organismo Deportivo se encuentra enmarcada en lo establecido en el Acuerdo Ministerial 456 y sus reformas en el incremento.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion8" id="selectCondicion8" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones8' name='observacionesReasignaciones8'  class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
            </tbody>
    
            </table>
            
            <table class='' id='tablaRevisorIncremento2'>
    
            <thead>
    
                <tr><th colspan="4">Condiciones  Generales</th></tr>
                <tr>
    
                    <th style="width:5%!important"><center>N</center></th>
                    <th style="width:45%!important"><center>CONDICIÓN</center></th>
                    <th  style="width:10%!important"><center>CUMPLE</center></th>
                    <th style="width:40%!important"><center>OBSERVACIONES PARA LA ORGANIZACIÓN DEPORTIVA</center></th>
    
                </tr>
    
            </thead>
    
            <tbody class='cuerpo__matricez__seguimientos'>
              <tr>
                <td align="center" style="font-size:1em !important">1</td>
                <td style="font-size:1em !important">La Planificación Operativa Anual del incremento, el Organismo Deportivo se encuentra enmarcada en lo establecido en el Acuerdo Ministerial 456 y sus reformas</td>
                <td align="center" style="font-size:1em !important">
                  <select name="selectCondicion9" id="selectCondicion9" class='selectCalifica'>
                      <option value="Cumple">Cumple</option>
                      <option value="No cumple">No Cumple</option>
                      <option value="No aplica">No Aplica</option>
                  </select>
                </td>
                <td style="font-size:1em !important">
                    <textarea id='observacionesReasignaciones9' name='observacionesReasignaciones9' class='ancho__total__textareas'></textarea>
                </td>
              </tr>
            </tbody>
    
            </table>`);
  
            $("#contenedorCalificacion").append(`<table><tr>
            <th colspan='2'>SEGUIMIENTO Y EVALUACIÓN AL INCREMENTO POA</th></tr><tr><td colspan='2' style="font-size:1em !important">(Detallar las acciones específicas tanto para el seguimiento como para la evaluación del objeto de financiamiento por parte de la entidad beneficiaria.)</td></tr><tr><th style="width:50%!important">Recomendaciones Seguimiento:</th><th style="width:50%!important">Recomendaciones Evaluación:</th></tr><tr><td style="font-size:1em !important">
            <textarea id='RecomendacionesSeguimiento' name='RecomendacionesSeguimiento' class='ancho__total__textareas'></textarea>
            </td><td style="font-size:1em !important">
            <textarea id='RecomendacionesEvaluacion' name='RecomendacionesEvaluacion' class='ancho__total__textareas'></textarea>
            </td></tr></table>`);
  
            $("#contenedorCalificacion").show();
  
            $("#calificarInforme").show();
  
            $("#calificarInforme").click(function (e) {
              e.preventDefault();
  
              if (
                $("#selectCondicion1").val() == "No cumple" ||
                $("#selectCondicion2").val() == "No cumple" ||
                $("#selectCondicion3").val() == "No cumple" ||
                $("#selectCondicion4").val() == "No cumple" ||
                $("#selectCondicion5").val() == "No cumple" ||
                $("#selectCondicion6").val() == "No cumple" ||
                $("#selectCondicion7").val() == "No cumple" ||
                $("#selectCondicion8").val() == "No cumple" ||
                $("#selectCondicion9").val() == "No cumple"
              ) {
                $(".ocultos_incrementosOb").hide();
                $(".ocultos_incrementosO").show();
              } else {
                $(".ocultos_incrementosO").hide();
                $(".ocultos_incrementosOb").show();
  
                envioInformeFuncionarios($("#enviarInformeAnalistas"), [
                  idOrganismo,
                  idPreeliminar,
                  $("#informeAnalista"),
                  identificador,$("#observacionesReasignaciones"),tipoObservacion
                ]);
              }
            });
          }
          //AltoRendimiento
          if (
            $("#fisicamenteEstructura__na").val() == "12" ||
            $("#fisicamenteEstructura__na").val() == 12
          ) {
            let identificador = "alto";
            tipoE = "altoRendimiento"
            seccion_Observaciones_Reasignaciones(idOrganismo,tipoE);
            $("#idRol").val(idRol);
  
            $("#fisicamenteEn").val($("#fisicamenteEstructura__na").val());
  
            $("#idOrganismo__m2").val(idOrganismo);
  
            $("#tipoPdf2").val("Informe__Incremento__AltoRendimiento");
  
            $("#idUsuario").val($("#idUsuarioPrincipal").val());
  
            $("#contenedorCalificacion")
              .append(`<table class='' id='tablaRevisorIncremento'>
    
            <thead>
    
                <tr>
    
                    <th style="width:5%!important"><center>N</center></th>
                    <th style="width:45%!important"><center>CONDICIÓN</center></th>
                    <th  style="width:10%!important"><center>CUMPLE</center></th>
                    <th style="width:40%!important"><center>OBSERVACIONES PARA LA ORGANIZACIÓN DEPORTIVA</center></th>
    
                </tr>
    
            </thead>
    
            <tbody class='cuerpo__matricez__seguimientos'>
                <tr>
                    <td align="center" style="font-size:1em !important">1</td>
                    <td style="font-size:1em !important">Registra en las actividades deportivas correspondientes a la actividad concentrado, campamento, base de entrenamiento, evaluaciones y campeonato acorde a la prioridad de la disciplina deportiva.</td>
                    <td align="center" style="font-size:1em !important">
                        
                        <select name="selectCondicion1" id="selectCondicion1" class='selectCalifica'>
                            <option value="Cumple">Cumple</option>
                            <option value="No cumple">No Cumple</option>
                            <option value="No aplica">No Aplica</option>
                        </select>
                        
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones1' name='observacionesReasignaciones1' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">2</td>
                    <td style="font-size:1em !important">La planificación del indicador coincide con los eventos deportivos planificados.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion2" id="selectCondicion2" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones2' name='observacionesReasignaciones2' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">3</td>
                    <td style="font-size:1em !important">Utiliza la sintaxis clara para el registro de los eventos.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion3" id="selectCondicion3" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones3' name='observacionesReasignaciones3' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center"style="font-size:1em !important">4</td>
                    <td style="font-size:1em !important">Registra concentrado, campamento, base de entrenamiento, evaluaciones y campeonato para la categoría menores, prejuveniles, juvenil y absoluto a nivel internacional.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion4" id="selectCondicion4" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones4' name='observacionesReasignaciones4' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">5</td>
                    <td style="font-size:1em !important">Registra concentrado, campamento, base de entrenamiento, evaluaciones y campeonato para la categoría menores, prejuveniles, juvenil y absoluto a nivel nacional</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion5" id="selectCondicion5" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones5' name='observacionesReasignaciones5' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">6</td>
                    <td style="font-size:1em !important">Utiliza recursos para cubrir gastos autorizados de: pasajes, alimentación, hospedaje, hidratación, medicinas, atención médica, honorarios de árbitros y jueces, uniformes, movilización interna y al exterior de la delegación</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion6" id="selectCondicion6" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones6' name='observacionesReasignaciones6' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">7</td>
                    <td style="font-size:1em !important">Utiliza recursos para cubrir pagos por concepto de seguros y bono deportivo en concentrado, campamento, base de entrenamiento, evaluaciones y campeonato a nivel internacional</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion7" id="selectCondicion7" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones7' name='observacionesReasignaciones7' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">8</td>
                    <td style="font-size:1em !important">La Planificación Operativa Anual del Organismo Deportivo se encuentra enmarcada en lo establecido en el Acuerdo Ministerial 456 y sus reformas</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion8" id="selectCondicion8" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones8' name='observacionesReasignaciones8'  class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
            </tbody>
    
            </table>
            
            <table class='' id='tablaRevisorIncremento2'>
    
            <thead>
    
                <tr><th colspan="4">Condiciones  Generales</th></tr>
                <tr>
    
                    <th style="width:5%!important"><center>N</center></th>
                    <th style="width:45%!important"><center>CONDICIÓN</center></th>
                    <th  style="width:10%!important"><center>CUMPLE</center></th>
                    <th style="width:40%!important"><center>OBSERVACIONES PARA LA ORGANIZACIÓN DEPORTIVA</center></th>
    
                </tr>
    
            </thead>
    
            <tbody class='cuerpo__matricez__seguimientos'>
              <tr>
                <td align="center" style="font-size:1em !important">1</td>
                <td style="font-size:1em !important">La Planificación Operativa Anual del Organismo Deportivo se encuentra enmarcada en lo establecido en el Acuerdo Ministerial 456 y sus reformas.</td>
                <td align="center" style="font-size:1em !important">
                  <select name="selectCondicion9" id="selectCondicion9" class='selectCalifica'>
                      <option value="Cumple">Cumple</option>
                      <option value="No cumple">No Cumple</option>
                      <option value="No aplica">No Aplica</option>
                  </select>
                </td>
                <td style="font-size:1em !important">
                    <textarea id='observacionesReasignaciones9' name='observacionesReasignaciones9' class='ancho__total__textareas'></textarea>
                </td>
              </tr>
            </tbody>
    
            </table>`);
  
            $("#contenedorCalificacion").show();
  
            $("#calificarInforme").show();
  
            $("#calificarInforme").click(function (e) {
              e.preventDefault();
  
              if (
                $("#selectCondicion1").val() == "No cumple" ||
                $("#selectCondicion2").val() == "No cumple" ||
                $("#selectCondicion3").val() == "No cumple" ||
                $("#selectCondicion4").val() == "No cumple" ||
                $("#selectCondicion5").val() == "No cumple" ||
                $("#selectCondicion6").val() == "No cumple" ||
                $("#selectCondicion7").val() == "No cumple" ||
                $("#selectCondicion8").val() == "No cumple" ||
                $("#selectCondicion9").val() == "No cumple"
              ) {
                $(".ocultos_incrementosOb").hide();
                $(".ocultos_incrementosO").show();
              } else {
                $(".ocultos_incrementosO").hide();
                $(".ocultos_incrementosOb").show();
  
                envioInformeFuncionarios($("#enviarInformeAnalistas"), [
                  idOrganismo,
                  idPreeliminar,
                  $("#informeAnalista"),
                  identificador,$("#observacionesReasignaciones"),tipoObservacion
                ]);
              }
            });
          }
          //Administrativo
          if (
            $("#fisicamenteEstructura__na").val() == "5" ||
            $("#fisicamenteEstructura__na").val() == 5
          ) {
            let identificador = "administrativo";
            tipoE = "financiero"
            seccion_Observaciones_Reasignaciones(idOrganismo,tipoE);
  
            $("#idRol").val(idRol);
  
            $("#fisicamenteEn").val($("#fisicamenteEstructura__na").val());
  
            $("#idOrganismo__m2").val(idOrganismo);
  
            $("#tipoPdf2").val("Informe__Incremento__Administrativo");
  
            $("#idUsuario").val($("#idUsuarioPrincipal").val());
  
            $("#contenedorCalificacion")
              .append(`<table class='' id='tablaRevisorIncremento'>
    
            <thead>
    
                <tr>
    
                    <th style="width:5%!important"><center>N</center></th>
                    <th style="width:45%!important"><center>CONDICIÓN</center></th>
                    <th  style="width:10%!important"><center>CUMPLE</center></th>
                    <th style="width:40%!important"><center>OBSERVACIONES PARA LA ORGANIZACIÓN DEPORTIVA</center></th>
    
                </tr>
    
            </thead>
    
            <tbody class='cuerpo__matricez__seguimientos'>
                <tr>
                    <td align="center" style="font-size:1em !important">1</td>
                    <td style="font-size:1em !important">Detalla satisfactoriamente el objeto de la adquisición de bienes o contratación de servicios.</td>
                    <td align="center" style="font-size:1em !important">
                        
                        <select name="selectCondicion1" id="selectCondicion1" class='selectCalifica'>
                            <option value="Cumple">Cumple</option>
                            <option value="No cumple">No Cumple</option>
                            <option value="No aplica">No Aplica</option>
                        </select>
                        
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones1' name='observacionesReasignaciones1' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">2</td>
                    <td style="font-size:1em !important">No se contempla financiamiento para pago de arreglos extrajudiciales, arrendamiento y licencias de uso de paquetes informáticos, Desarrollo, Actualización, Asistencia Técnica y Soporte de Sistemas Informáticos, dichos gastos deberán ser pagados con recursos de autogestión.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion2" id="selectCondicion2" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones2' name='observacionesReasignaciones2' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">3</td>
                    <td style="font-size:1em !important">Utiliza el ítem presupuestario acorde al objeto de la adquisición de bienes o contratación de servicios.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion3" id="selectCondicion3" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones3' name='observacionesReasignaciones3' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center"style="font-size:1em !important">4</td>
                    <td style="font-size:1em !important">Detalla satisfactoriamente la justificación para el pago de impuestos, tasas y contribuciones</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion4" id="selectCondicion4" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones4' name='observacionesReasignaciones4' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">5</td>
                    <td style="font-size:1em !important">El pago de cada suministro de servicios básicos descrito, se encuentra en el informe aprobado del Ministerio del Deporte remitido por la Dirección de Planificación e Inversión.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion5" id="selectCondicion5" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones5' name='observacionesReasignaciones5' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
               
            </tbody>
    
            </table>`);
  
            $("#contenedorCalificacion").show();
  
            $("#calificarInforme").show();
  
            $("#calificarInforme").click(function (e) {
              e.preventDefault();
  
              if (
                $("#selectCondicion1").val() == "No cumple" ||
                $("#selectCondicion2").val() == "No cumple" ||
                $("#selectCondicion3").val() == "No cumple" ||
                $("#selectCondicion4").val() == "No cumple" ||
                $("#selectCondicion5").val() == "No cumple"
              ) {
                $(".ocultos_incrementosOb").hide();
                $(".ocultos_incrementosO").show();
              } else {
                $("#contenedorConclusiones").html(" ");
                $("#contenedorRequisitos").html(" ");
                $(".ocultos_incrementosO").hide();
                $(".ocultos_incrementosOb").show();
  
                $("#observacionesReasignaciones").val(
                  `La correcta ejecución de los recursos públicos financiados por parte del Ministerio del Deporte, para la adquisición de bienes, contratación de servicios, consultoría y obra; es de estricta responsabilidad del Organismo Deportivo conforme lo establecido en el artículo 1 literal b) de la Ley Orgánica del Sistema Nacional de Contratación Pública`
                );
  
                $("#conclusionesReasignaciones").remove();
  
                $("#contenedorConclusiones").append(`
                    <textarea name='conclusionesAd[]' class='ancho__total__textareas form-control' >Una vez que se ha revisado la información enviada por la Dirección de Planificación e Inversión del Ministerio del Deporte, se consigna el registro de información, en virtud de lo cual el presente documento podrá ser considerado como un elemento de opinión para la formación de la voluntad administrativa conforme lo determinado en el artículo 122 del Código Orgánico Administrativo.</textarea><br>`);
  
                $("#contenedorConclusiones").append(
                  `<textarea name='conclusionesAd[]' class='ancho__total__textareas form-control' >La correcta ejecución de los recursos públicos financiados por parte del Ministerio del Deporte, para la adquisición de bienes, contratación de servicios, consultoría y obra; es de estricta responsabilidad del Organismo Deportivo conforme lo establecido en el artículo 1 literal b) de la Ley Orgánica del Sistema Nacional de Contratación Pública.</textarea><br>`
                );
  
                $("#contenedorConclusiones").append(
                  `<textarea name='conclusionesAd[]' class='ancho__total__textareas form-control' >La Organización Deportiva deberá cumplir con lo establecido en las Normas de Control Interno, Reglamento General Sustitutivo para la Administración, Utilización, Manejo y Control de los Bienes e Inventarios del Sector Público, Reglamento Sustitutivo para el Control de los Vehículos del Sector Público y demás normas emitidas por la Contraloría General del Estado.</textarea><br>`
                );
  
                $("#contenedorConclusiones").append(
                  `<textarea name='conclusionesAd[]' class='ancho__total__textareas form-control' >Previo al inicio de un procedimiento de contratación pública, así como para la aceptación de cualquier obligación que genere la erogación de recursos públicos, el Organismo deportivo deberá observar lo dispuesto en el Art. 115 y 101 establecido en el Código Orgánico de Planificación y Finanzas Públicas y su reglamento respectivamente. </textarea>`
                );
  
                var contenidoRequisitos = ["Solicitud de revisión de no duplicidad", "Emisión de Certificado de no duplicidad", "Reporte de convenios por liquidar", "Confirmación de disponibilidad de fondos", "Estatus legal vigente", "Certificación presupuestaria"];

                for(var i = 0; i < contenidoRequisitos.length; i++){
                  $("#contenedorRequisitos").append(`<div class='col-md-4 mb-3'> <span class='badge badge-primary' style='font-size:1em!important;'>${contenidoRequisitos[i]}</span></div> 
                  <div class='col-md-4 mb-3'>
                    <input type='text' class='form-control' id='nombreMemo${i+1}' name='nombreMemo${i+1}' placeholder='Numero de Memorando'> 
                  </div> 
                  <div class='col-md-4 mb-3 text-center'>
                  <div class='form-check-inline'>
                  <label class='form-check-label'>
                    <input type='radio' class='form-check-input' name='memoCumple${i+1}' value='cumple'>Cumple
                  </label>
                  </div>
                  <div class='form-check-inline'>
                  <label class='form-check-label'>
                    <input type='radio' class='form-check-input' name='memoCumple${i+1}' value='no cumple'>No Cumple
                  </label>
                  </div>
                  </div>`);
                }

                envioInformeFuncionarios($("#enviarInformeAnalistas"), [
                  idOrganismo,
                  idPreeliminar,
                  $("#informeAnalista"),
                  identificador,$("#observacionesReasignaciones"),tipoObservacion
                ]);
              }
            });
          }
          //Formativo
          if (
            $("#fisicamenteEstructura__na").val() == "13" ||
            $("#fisicamenteEstructura__na").val() == 13
          ) {
            let identificador = "desarrollo";
            tipoE = "formativo";
            seccion_Observaciones_Reasignaciones(idOrganismo,tipoE);
            $("#idRol").val(idRol);
  
            $("#fisicamenteEn").val($("#fisicamenteEstructura__na").val());
  
            $("#idOrganismo__m2").val(idOrganismo);
  
            $("#tipoPdf2").val("Informe__Incremento__TecnicoFormativo");
  
            $("#idUsuario").val($("#idUsuarioPrincipal").val());
  
            $("#contenedorCalificacion")
              .append(`<table class='' id='tablaRevisorIncremento'>
    
            <thead>
    
                <tr>
    
                    <th style="width:5%!important"><center>N</center></th>
                    <th style="width:45%!important"><center>CONDICIÓN</center></th>
                    <th  style="width:10%!important"><center>CUMPLE</center></th>
                    <th style="width:40%!important"><center>OBSERVACIONES PARA LA ORGANIZACIÓN DEPORTIVA</center></th>
    
                </tr>
    
            </thead>
    
            <tbody class='cuerpo__matricez__seguimientos'>
                <tr>
                    <td align="center" style="font-size:1em !important">1</td>
                    <td style="font-size:1em !important">Registra en las actividades correspondientes organización de campeonatos, eventos , participación en eventos nacionales e internacionales, implementación deportiva acorde a la prioridad de la disciplina deportiva.</td>
                    <td align="center" style="font-size:1em !important">
                        
                        <select name="selectCondicion1" id="selectCondicion1" class='selectCalifica'>
                            <option value="Cumple">Cumple</option>
                            <option value="No cumple">No Cumple</option>
                            <option value="No aplica">No Aplica</option>
                        </select>
                        
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones1' name='observacionesReasignaciones1' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">2</td>
                    <td style="font-size:1em !important">La planificación del indicador coincide con los eventos deportivos planificados</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion2" id="selectCondicion2" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones2' name='observacionesReasignaciones2' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">3</td>
                    <td style="font-size:1em !important">Utiliza la sintaxis clara para el registro de los eventos.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion3" id="selectCondicion3" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones3' name='observacionesReasignaciones3' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center"style="font-size:1em !important">4</td>
                    <td style="font-size:1em !important">Registra juzgamiento para el evento o campeonato provincial o naciona.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion4" id="selectCondicion4" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones4' name='observacionesReasignaciones4' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">5</td>
                    <td style="font-size:1em !important">Utiliza para la atención de delegados extranjeros y nacionales, deportistas, entrenadores, cuerpo técnico que representa al país.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion5" id="selectCondicion5" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones5' name='observacionesReasignaciones5' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">6</td>
                    <td style="font-size:1em !important">Utiliza recursos para cubrir gastos autorizados de: pasajes, alimentación, hospedaje, hidratación, medicinas, atención médica, honorarios de árbitros y jueces, uniformes, movilización interna de la delegación.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion6" id="selectCondicion6" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones6' name='observacionesReasignaciones6' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">7</td>
                    <td style="font-size:1em !important">Utiliza recursos para cubrir pagos por concepto de seguros en los campeonatos, bonos deportivos.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion7" id="selectCondicion7" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones7' name='observacionesReasignaciones7' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">8</td>
                    <td style="font-size:1em !important">La Planificación Operativa Anual del Organismo Deportivo se encuentra enmarcada en lo establecido en el Acuerdo Ministerial 456 y sus reformas.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion8" id="selectCondicion8" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones8' name='observacionesReasignaciones8' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
               
            </tbody>
    
            </table>`);
  
            $("#contenedorCalificacion").show();
  
            $("#calificarInforme").show();
  
            $("#calificarInforme").click(function (e) {
              e.preventDefault();
  
              if (
                $("#selectCondicion1").val() == "No cumple" ||
                $("#selectCondicion2").val() == "No cumple" ||
                $("#selectCondicion3").val() == "No cumple" ||
                $("#selectCondicion4").val() == "No cumple" ||
                $("#selectCondicion5").val() == "No cumple" ||
                $("#selectCondicion6").val() == "No cumple" ||
                $("#selectCondicion7").val() == "No cumple" ||
                $("#selectCondicion8").val() == "No cumple"
              ) {
                $(".ocultos_incrementosOb").hide();
                $(".ocultos_incrementosO").show();
              } else {
                $(".ocultos_incrementosO").hide();
                $(".ocultos_incrementosOb").show();
  
                envioInformeFuncionarios($("#enviarInformeAnalistas"), [
                  idOrganismo,
                  idPreeliminar,
                  $("#informeAnalista"),
                  identificador,$("#observacionesReasignaciones"),tipoObservacion
                ]);
              }
            });
          }
          //Infraestructura
          if (
            $("#fisicamenteEstructura__na").val() == "15" ||
            $("#fisicamenteEstructura__na").val() == 15
          ) {
            let identificador = "infraestructura";
            tipoE = "infraestructura";
            seccion_Observaciones_Reasignaciones(idOrganismo,tipoE);
            $("#idRol").val(idRol);
  
            $("#fisicamenteEn").val($("#fisicamenteEstructura__na").val());
  
            $("#idOrganismo__m2").val(idOrganismo);
  
            $("#tipoPdf2").val("Informe__Incremento__TecnicoInfraestructura");
  
            $("#idUsuario").val($("#idUsuarioPrincipal").val());
  
            $("#contenedorCalificacion")
              .append(`<table class='' id='tablaRevisorIncremento'>
    
            <thead>
    
                <tr>
    
                    <th style="width:5%!important"><center>N</center></th>
                    <th style="width:45%!important"><center>CONDICIÓN</center></th>
                    <th  style="width:10%!important"><center>CUMPLE</center></th>
                    <th style="width:40%!important"><center>OBSERVACIONES PARA LA ORGANIZACIÓN DEPORTIVA</center></th>
    
                </tr>
    
            </thead>
    
            <tbody class='cuerpo__matricez__seguimientos'>
                <tr>
                    <td align="center" style="font-size:1em !important">1</td>
                    <td style="font-size:1em !important">Declara toda la infraestructura deportiva a su cargo, adjuntando la legalidad  respectiva.</td>
                    <td align="center" style="font-size:1em !important">
                        
                        <select name="selectCondicion1" id="selectCondicion1" class='selectCalifica'>
                            <option value="Cumple">Cumple</option>
                            <option value="No cumple">No Cumple</option>
                            <option value="No aplica">No Aplica</option>
                        </select>
                        
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones1' name='observacionesReasignaciones1' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">2</td>
                    <td style="font-size:1em !important">La planificación del indicador tiene <br> coherencia con el nombre del indicador de <br> la actividad 002 y se encuentra redactado <br> con número entero</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion2" id="selectCondicion2" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones2' name='observacionesReasignaciones2' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">3</td>
                    <td style="font-size:1em !important">Planifican únicamente intervenciones de rehabilitación, y/o mantenimiento en aquellos escenarios deportivos que sean propiedad de la organización deportiva  
                    Anexo: Documentación de la legalidad del predio (escritura, certificado de propiedad, etc.).
                    Dentro de la planificación, destinan recursos para gastos de rehabilitación, y/o mantenimiento de los escenarios deportivos que son propiedad del  Ministerio del Deporte, precautelando su  correcto uso y funcionamiento. 
                    Anexo: Documentación de la legalidad del predio (escritura, certificado de propiedad, etc.).</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion3" id="selectCondicion3" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones3' name='observacionesReasignaciones3' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center"style="font-size:1em !important">4</td>
                    <td style="font-size:1em !important">Utiliza los ítems presupuestarios aprobados del anexo XX, para la contratación de bienes y servicios respecto al tipo de intervenciones propuestas para la rehabilitación, y/o mantenimiento</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion4" id="selectCondicion4" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones4' name='observacionesReasignaciones4' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">5</td>
                    <td style="font-size:1em !important">Mantiene concordancia el nombre de la intervención para rehabilitación, y/o <br> mantenimiento con el escenario deportivo a intervenir y, los bienes y servicios involucrados en la intervención.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion5" id="selectCondicion5" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones5' name='observacionesReasignaciones5' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">6.1</td>
                    <td style="font-size:1em !important">Presenta el Informe justificativo del gasto para la contratación o adquisición de bienes o servicios en escenarios deportivo respecto a <span style="font-weight:bold !important;">Rehabilitación (Corresponde al <br> área de Infraestructura)</span> incluye: <br>
                    -Análisis de precios unitarios <br>
                    -Presupuesto <br>
                    -Planos y anexos gráficos (debidamente suscritos por el profesional en la rama <br>
                    -Cronograma valorado. <br>
                    -Especificaciones técnicas. <br>
                    -Registro fotográfico de la intervención a subsanar. 
                    -Contemplar parámetros de accesibilidad universal; según corresponda al tipo de intervención aprobada en los lineamientos (fachadas exteriores, interiores,
                    cubierta, pisos interiores, pisos exteriores, <br> piscinas, instalaciones hidrosanitarias de las edificaciones deportivas, sistema eléctrico-electrónico). 
                    Para estudios y/o fiscalización: Certificado de no contar con técnicos afines a la contratación Justificación técnica. 
                    Justificación técnica indicando perfil profesional y experiencia requerida para la <br> contratación; alcance de los trabajos, <br> presupuesto estimado (Estudio de mercado), plazo.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion6" id="selectCondicion6" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones6' name='observacionesReasignaciones6' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">6.2</td>
                    <td style="font-size:1em !important">Presenta el Informe justificativo del gasto para la contratación o adquisición de bienes o servicios en escenarios deportivos respecto <span style="font-weight:bold!important;">Mantenimiento (Corresponde a la <br> Dirección de Administración de Instalaciones Deportivas)</span>incluye: 
                    -Cuadro comparativo como estudio de mercado con análisis de precios unitarios respaldado por 2 cotizaciones <br>
                    -Registro fotográfico de la intervención a subsanar 
                    -Documentación de la legalidad del predio; según corresponda al tipo de intervención aprobada en los lineamientos</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion7" id="selectCondicion7" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones7' name='observacionesReasignaciones7' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
            </tbody>
    
            </table>`);
  
            $("#contenedorCalificacion").show();
  
            $("#calificarInforme").show();
  
            $("#calificarInforme").click(function (e) {
              e.preventDefault();
  
              if (
                $("#selectCondicion1").val() == "No cumple" ||
                $("#selectCondicion2").val() == "No cumple" ||
                $("#selectCondicion3").val() == "No cumple" ||
                $("#selectCondicion4").val() == "No cumple" ||
                $("#selectCondicion5").val() == "No cumple" ||
                $("#selectCondicion6").val() == "No cumple" ||
                $("#selectCondicion7").val() == "No cumple"
              ) {
                $(".ocultos_incrementosOb").hide();
                $(".ocultos_incrementosO").show();
              } else {
                $("#contenedorConclusiones").html(" ");
                $(".ocultos_incrementosO").hide();
                $(".ocultos_incrementosOb").show();
  
                envioInformeFuncionarios($("#enviarInformeAnalistas"), [
                  idOrganismo,
                  idPreeliminar,
                  $("#informeAnalista"),
                  identificador,$("#observacionesReasignaciones"),tipoObservacion
                ]);
  
                $("#conclusionesReasignaciones").remove();
  
                $("#contenedorConclusiones").append(`
                    <textarea name='conclusionesAd[]' class='ancho__total__textareas form-control'>Se deja constancia, que los bienes y servicios con sus montos planificados para las intervenciones por rehabilitación y/o mantenimiento respecto a la actividad 002 señaladas por las entidades deportivas para el presente año, así como su ejecución y correcto uso de los recursos públicos es responsabilidad de los Organismos Deportivos.</textarea><br>`);
  
                $("#contenedorConclusiones").append(
                  `<textarea name='conclusionesAd[]' class='ancho__total__textareas form-control' >Finalmente, se recuerda que los Organismos Deportivos al administrar y ejecutar Recursos Públicos deben regirse en la normativa legal vigente y sujetarse a las normas de control, monitoreo y evaluación.</textarea><br>`
                );
  
                $("#contenedorConclusiones").append(
                  `<textarea name='conclusionesAd[]' class='ancho__total__textareas form-control' >Una vez que se ha procedido con el ANÁLISIS por parte de las Direcciones de Administración de Instalaciones Deportivas y/o Infraestructura Deportiva del Ministerio del Deporte, se ha verificado que el organismo deportivo CUMPLE/NO CUMPLE con los lineamientos vigentes aprobados mediante Acuerdo 0318 del 11 de diciembre de 2022.</textarea><br>`
                );
              }
            });
          }
  
          //Planificacion
          if (
            $("#fisicamenteEstructura__na").val() == "18" ||
            $("#fisicamenteEstructura__na").val() == 18
          ) {
            let identificador = "planificacion";
            tipoE = "planificacion";
            seccion_Observaciones_Reasignaciones(idOrganismo,tipoE);
            $("#idRol").val(idRol);
  
            $("#fisicamenteEn").val($("#fisicamenteEstructura__na").val());
  
            $("#idOrganismo__m2").val(idOrganismo);
  
            $("#tipoPdf2").val("Informe__Incremento__Planificacion");
  
            $("#idUsuario").val($("#idUsuarioPrincipal").val());
  
            $("#contenedorCalificacion")
              .append(`<table class='' id='tablaRevisorIncremento'>
    
            <thead>
    
                <tr>
    
                    <th style="width:5%!important"><center>N</center></th>
                    <th style="width:45%!important"><center>CONDICIÓN</center></th>
                    <th  style="width:10%!important"><center>CUMPLE</center></th>
                    <th style="width:40%!important"><center>OBSERVACIONES PARA LA ORGANIZACIÓN DEPORTIVA</center></th>
    
                </tr>
    
            </thead>
    
            <tbody class='cuerpo__matricez__seguimientos'>
                <tr>
                    <td align="center" style="font-size:1em !important">1</td>
                    <td style="font-size:1em !important">El POA de la OD esta alineada al Plan Decenal del Deporte Educación Física y Recreación, a la Planificación Estratégica Institucional del Ministerio del Deporte y al Plan Nacional de Desarrollo.</td>
                    <td align="center" style="font-size:1em !important">
                        
                        <select name="selectCondicion1" id="selectCondicion1" class='selectCalifica'>
                            <option value="Cumple">Cumple</option>
                            <option value="No cumple">No Cumple</option>
                            <option value="No aplica">No Aplica</option>
                        </select>
                        
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones1' name='observacionesReasignaciones1' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">2</td>
                    <td style="font-size:1em !important">Ejecuta la Planificación anual del personal administrativo, de mantenimiento y técnicos y de servicios amparado en el Código de Trabajo.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion2" id="selectCondicion2" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones2' name='observacionesReasignaciones2' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">3</td>
                    <td style="font-size:1em !important">Ejecuta la Planificación anual del personal administrativo y técnicos, relacionado a Contratos Civiles de servicios profesionales.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion3" id="selectCondicion3" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones3' name='observacionesReasignaciones3' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center"style="font-size:1em !important">4</td>
                    <td style="font-size:1em !important">La Organización Deportiva no ha creado nuevos puestos de trabajo administrativo, de mantenimiento y técnicos respecto del POA 2022</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion4" id="selectCondicion4" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones4' name='observacionesReasignaciones4' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">5</td>
                    <td style="font-size:1em !important">La Organización Deportiva no ha incrementado Contratos Civiles de servicios profesionales de personal administrativo y técnico respecto del POA 2022</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion5" id="selectCondicion5" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones5' name='observacionesReasignaciones5' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">6</td>
                    <td style="font-size:1em !important">La Organización Deportiva no incrementa la masa salarial relacionada al personal administrativo, de mantenimiento y técnicos de servicios respecto del POA 2022</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion6" id="selectCondicion6" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones6' name='observacionesReasignaciones6' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">7</td>
                    <td style="font-size:1em !important">La Organización Deportiva no incrementa presupuesto relacionado a honorarios para Contratos Civiles de servicios profesionales de personal administrativo y técnicos respecto del POA 2022</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion7" id="selectCondicion7" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones7' name='observacionesReasignaciones7' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">8</td>
                    <td style="font-size:1em !important">Si planificó servicios básicos verificar que en la matriz de suministro el número de suministro cuente con informe de aprobación del Ministerio del Deporte.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion8" id="selectCondicion8" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones8' name='observacionesReasignaciones8' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:1em !important">9</td>
                    <td style="font-size:1em !important">En caso que planifique seguros de bienes y vehículos presenta el listado de bienes o vehículos con la respectiva cobertura.</td>
                    <td align="center" style="font-size:1em !important">
                        <select name="selectCondicion9" id="selectCondicion9" class='selectCalifica'>
                          <option value="Cumple">Cumple</option>
                          <option value="No cumple">No Cumple</option>
                          <option value="No aplica">No Aplica</option>
                        </select>
                    </td>
                    <td style="font-size:1em !important">
                        <textarea id='observacionesReasignaciones9' name='observacionesReasignaciones9' class='ancho__total__textareas'></textarea>
                    </td>
                </tr>
            </tbody>
    
            </table>`);
  
            $("#contenedorCalificacion").show();
  
            $("#calificarInforme").show();
  
            $("#calificarInforme").click(function (e) {
              e.preventDefault();
  
              if (
                $("#selectCondicion1").val() == "No cumple" ||
                $("#selectCondicion2").val() == "No cumple" ||
                $("#selectCondicion3").val() == "No cumple" ||
                $("#selectCondicion4").val() == "No cumple" ||
                $("#selectCondicion5").val() == "No cumple" ||
                $("#selectCondicion6").val() == "No cumple" ||
                $("#selectCondicion7").val() == "No cumple" ||
                $("#selectCondicion8").val() == "No cumple" ||
                $("#selectCondicion9").val() == "No cumple"
              ) {
                $("#conclusionesReasignaciones").val(" ");
                $("#observacionesReasignaciones").val(" ");
                $(".ocultos_incrementosOb").hide();
                $(".ocultos_incrementosO").show();
              } else {
                $("#conclusionesReasignaciones").val(" ");
                $("#observacionesReasignaciones").val(" ");
                $(".ocultos_incrementosO").hide();
                $(".ocultos_incrementosOb").show();
  
                envioInformeFuncionarios($("#enviarInformeAnalistas"), [
                  idOrganismo,
                  idPreeliminar,
                  $("#informeAnalista"),
                  identificador,$("#observacionesReasignaciones"),tipoObservacion
                ]);
              }
            });
          }
        }
        
        // if($("#idRolAd").val() == "2" || $("#idRolAd").val() == 2){

        //   tipoObservacion = "recomendado";
        //   let tipoE = "";
        //   if(($("#fisicamenteEstructura__na").val() == "1" ||
        //   $("#fisicamenteEstructura__na").val() == 1) || ($("#fisicamenteEstructura__na").val() == "15" ||
        //   $("#fisicamenteEstructura__na").val() == 15)){
        //     tipoE = "infraestructura";
        //     identificador = "infraestructura";
        //     envioInformeFuncionarios($("#enviarInformeAnalistas"), [
        //       idOrganismo,
        //       idPreeliminar,
        //       $("#informeAnalista"),
        //       identificador,$("#observacionesUsuarios"),tipoObservacion
        //     ]);

        //     reasignacionTramite_Coordinador_Sub($("#reasignarIncremento__a"),[idOrganismo,idPreeliminar,identificador,$("#observacionesUsuarios")]);
            
        //   }else if(($("#fisicamenteEstructura__na").val() == "2" ||
        //   $("#fisicamenteEstructura__na").val() == 2)|| ($("#fisicamenteEstructura__na").val() == "5" ||
        //   $("#fisicamenteEstructura__na").val() == 5)){
        //     tipoE = "financiero";
        //     identificador = "administrativo";
        //     envioInformeFuncionarios($("#enviarInformeAnalistas"), [
        //       idOrganismo,
        //       idPreeliminar,
        //       $("#informeAnalista"),
        //       identificador,$("#observacionesUsuarios"),tipoObservacion
        //     ]);

        //     reasignacionTramite_Coordinador_Sub($("#reasignarIncremento__a"),[idOrganismo,idPreeliminar,"financiero",$("#observacionesUsuarios")]);

        //   }else if(($("#fisicamenteEstructura__na").val() == "3" ||
        //   $("#fisicamenteEstructura__na").val() == 3) || ($("#fisicamenteEstructura__na").val() == "18" ||
        //   $("#fisicamenteEstructura__na").val() == 18)){
        //     tipoE = "planificacion";
        //     identificador = "planificacion";

        //     console.log(34);
        //     envioInformeFuncionarios($("#enviarInformeAnalistas"), [
        //       idOrganismo,
        //       idPreeliminar,
        //       $("#informeAnalista"),
        //       identificador,$("#observacionesUsuarios"),tipoObservacion
        //     ]);

        //     reasignacionTramite_Coordinador_Sub($("#reasignarIncremento__a"),[idOrganismo,idPreeliminar,identificador,$("#observacionesUsuarios")]);

            
           
        //   }else if($("#fisicamenteEstructura__na").val() == "24" ||
        //   $("#fisicamenteEstructura__na").val() == 24){
        //     tipoE = "altoRendimiento";
        //     identificador = "altoRendimiento";
        //     envioInformeFuncionarios($("#enviarInformeAnalistas"), [
        //       idOrganismo,
        //       idPreeliminar,
        //       $("#informeAnalista"),
        //       identificador,$("#observacionesUsuarios"),tipoObservacion
        //     ]);

        //     reasignacionTramite_Coordinador_Sub($("#reasignarIncremento__a"),[idOrganismo,idPreeliminar,identificador,$("#observacionesUsuarios")]);

        //   }else if($("#fisicamenteEstructura__na").val() == "26" ||
        //   $("#fisicamenteEstructura__na").val() == 26){
        //     tipoE = "desarrollo";
        //     identificador = "desarrollo";
        //     envioInformeFuncionarios($("#enviarInformeAnalistas"), [
        //       idOrganismo,
        //       idPreeliminar,
        //       $("#informeAnalista"),
        //       identificador,$("#observacionesUsuarios"),tipoObservacion
        //     ]);

        //     reasignacionTramite_Coordinador_Sub($("#reasignarIncremento__a"),[idOrganismo,idPreeliminar,identificador,$("#observacionesUsuarios")]);

        //   }

          // $(".ocultos_incrementosOb").show();
          // $("#labelInforme").show();
          // $("#informeAnalista").show();
          // $("#enviarInformeAnalistas").show();

          // seccion_Observaciones_Reasignaciones(idOrganismo,tipoE);

          // ocultarSeccionesModal(".fila__incrementos__reasignar");

          // let identificador = "financiero";
          // let identificador = "administrativo";

          // reasignacionTramite_Coordinador_Sub($("#reasignarIncremento__a"),[idOrganismo,idPreeliminar,identificador,$("#observacionesUsuarios"),tipoObservacion]);

          // verificaExistenciaArchivo(idOrganismo,idPreeliminar,$("#fisicamenteEstructura__na"));



          // if($("#fisicamenteEstructura__na").val() == 18 || $("#fisicamenteEstructura__na").val() == "18"){
          //   verificaExistenciaArchivoCoordinacionP(idOrganismo,idPreeliminar);
          // }
        // }

        if(($("#idRolAd").val() == "4" || $("#idRolAd").val() == 4) || ($("#idRolAd").val() == "7" || $("#idRolAd").val() == 7) || ($("#idRolAd").val() == "2" || $("#idRolAd").val() == 2)){

          tipoObservacion = "recomendado";
          let tipoE;

          if(($("#fisicamenteEstructura__na").val() == "1" ||
          $("#fisicamenteEstructura__na").val() == 1) || ($("#fisicamenteEstructura__na").val() == "15" ||
          $("#fisicamenteEstructura__na").val() == 15) || ($("#fisicamenteEstructura__na").val() == "6" ||
          $("#fisicamenteEstructura__na").val() == 6)){
            tipoE = "infraestructura";
            identificador = "infraestructura";

            envioInformeFuncionarios($("#enviarInformeAnalistas"), [
              idOrganismo,
              idPreeliminar,
              $("#informeAnalista"),
              identificador,$("#observacionesUsuarios"),tipoObservacion
            ]);

            reasignacionTramite_Coordinador_Sub($("#reasignarIncremento__a"),[idOrganismo,idPreeliminar,identificador,$("#observacionesUsuarios")]);

          }else if(($("#fisicamenteEstructura__na").val() == "2" ||
          $("#fisicamenteEstructura__na").val() == 2) || ($("#fisicamenteEstructura__na").val() == "5" ||
          $("#fisicamenteEstructura__na").val() == 5)){
            tipoE = "financiero";
            identificador = "administrativo";

            envioInformeFuncionarios($("#enviarInformeAnalistas"), [
              idOrganismo,
              idPreeliminar,
              $("#informeAnalista"),
              identificador,$("#observacionesUsuarios"),tipoObservacion
            ]);

            reasignacionTramite_Coordinador_Sub($("#reasignarIncremento__a"),[idOrganismo,idPreeliminar,"financiero",$("#observacionesUsuarios")]);

          }else if(($("#fisicamenteEstructura__na").val() == "3" ||
          $("#fisicamenteEstructura__na").val() == 3) || ($("#fisicamenteEstructura__na").val() == "18" ||
          $("#fisicamenteEstructura__na").val() == 18)){
            tipoE = "planificacion";
            identificador = "planificacion";

            envioInformeFuncionarios($("#enviarInformeAnalistas"), [
              idOrganismo,
              idPreeliminar,
              $("#informeAnalista"),
              identificador,$("#observacionesUsuarios"),tipoObservacion
            ]);

            reasignacionTramite_Coordinador_Sub($("#reasignarIncremento__a"),[idOrganismo,idPreeliminar,identificador,$("#observacionesUsuarios")]);

          }else if(($("#fisicamenteEstructura__na").val() == "24" ||
          $("#fisicamenteEstructura__na").val() == 24) || ($("#fisicamenteEstructura__na").val() == "12" ||
          $("#fisicamenteEstructura__na").val() == 12) || ($("#fisicamenteEstructura__na").val() == "14" ||
          $("#fisicamenteEstructura__na").val() == 14)){
            tipoE = "altoRendimiento";
            identificador = "altoRendimiento";

            envioInformeFuncionarios($("#enviarInformeAnalistas"), [
              idOrganismo,
              idPreeliminar,
              $("#informeAnalista"),
              identificador,$("#observacionesUsuarios"),tipoObservacion
            ]);

            reasignacionTramite_Coordinador_Sub($("#reasignarIncremento__a"),[idOrganismo,idPreeliminar,identificador,$("#observacionesUsuarios")]);

          }else if(($("#fisicamenteEstructura__na").val() == "26" ||
          $("#fisicamenteEstructura__na").val() == 26) || ($("#fisicamenteEstructura__na").val() == "13" ||
          $("#fisicamenteEstructura__na").val() == 13) || ($("#fisicamenteEstructura__na").val() == "19" ||
          $("#fisicamenteEstructura__na").val() == 19)){
            tipoE = "desarrollo";
            identificador = "desarrollo";

            envioInformeFuncionarios($("#enviarInformeAnalistas"), [
              idOrganismo,
              idPreeliminar,
              $("#informeAnalista"),
              identificador,$("#observacionesUsuarios"),tipoObservacion
            ]);

            reasignacionTramite_Coordinador_Sub($("#reasignarIncremento__a"),[idOrganismo,idPreeliminar,identificador,$("#observacionesUsuarios")]);

          }


          // if($("#fisicamenteEstructura__na").val() == "1" ||
          // $("#fisicamenteEstructura__na").val() == 1){
          //   tipoE = "infraestructura";
          //   identificador = "infraestructura";
          //   envioInformeFuncionarios($("#enviarInformeAnalistas"), [
          //     idOrganismo,
          //     idPreeliminar,
          //     $("#informeAnalista"),
          //     identificador,$("#observacionesUsuarios"),tipoObservacion
          //   ]);

          //   reasignacionTramite_Coordinador_Sub($("#reasignarIncremento__a"),[idOrganismo,idPreeliminar,identificador,$("#observacionesUsuarios")]);


          // }else if($("#fisicamenteEstructura__na").val() == "2" ||
          // $("#fisicamenteEstructura__na").val() == 2){
          //   tipoE = "financiero";
          //   identificador = "administrativo";
          //   envioInformeFuncionarios($("#enviarInformeAnalistas"), [
          //     idOrganismo,
          //     idPreeliminar,
          //     $("#informeAnalista"),
          //     identificador,$("#observacionesUsuarios"),tipoObservacion
          //   ]);

          //   reasignacionTramite_Coordinador_Sub($("#reasignarIncremento__a"),[idOrganismo,idPreeliminar,"financiero",$("#observacionesUsuarios")]);

          // }else if($("#fisicamenteEstructura__na").val() == "3" ||
          // $("#fisicamenteEstructura__na").val() == 3){
          //   tipoE = "planificacion";
          //   identificador = "planificacion";
          //   envioInformeFuncionarios($("#enviarInformeAnalistas"), [
          //     idOrganismo,
          //     idPreeliminar,
          //     $("#informeAnalista"),
          //     identificador,$("#observacionesUsuarios"),tipoObservacion
          //   ]);

          //   reasignacionTramite_Coordinador_Sub($("#reasignarIncremento__a"),[idOrganismo,idPreeliminar,identificador,$("#observacionesUsuarios")]);


          // }else if($("#fisicamenteEstructura__na").val() == "24" ||
          // $("#fisicamenteEstructura__na").val() == 24){
          //   tipoE = "altoRendimiento";
          //   identificador = "altoRendimiento";
          //   envioInformeFuncionarios($("#enviarInformeAnalistas"), [
          //     idOrganismo,
          //     idPreeliminar,
          //     $("#informeAnalista"),
          //     identificador,$("#observacionesUsuarios"),tipoObservacion
          //   ]);

          //   reasignacionTramite_Coordinador_Sub($("#reasignarIncremento__a"),[idOrganismo,idPreeliminar,identificador,$("#observacionesUsuarios")]);

          // }else if(($("#fisicamenteEstructura__na").val() == "26" ||
          // $("#fisicamenteEstructura__na").val() == 26) || ($("#fisicamenteEstructura__na").val() == "13" ||
          // $("#fisicamenteEstructura__na").val() == 13)){
          //   tipoE = "desarrollo";
          //   identificador = "desarrollo";
          //   envioInformeFuncionarios($("#enviarInformeAnalistas"), [
          //     idOrganismo,
          //     idPreeliminar,
          //     $("#informeAnalista"),
          //     identificador,$("#observacionesUsuarios"),tipoObservacion
          //   ]);

          //   reasignacionTramite_Coordinador_Sub($("#reasignarIncremento__a"),[idOrganismo,idPreeliminar,identificador,$("#observacionesUsuarios")]);
          // }

          $("#labelInforme").show();
          $("#informeAnalista").show();
          $("#enviarInformeAnalistas").show();

          seccion_Observaciones_Reasignaciones(idOrganismo,tipoE);

          // ocultarSeccionesModal(".fila__incrementos__reasignar");
          // ocultarSeccionesModal(".fila__incrementos__regresar");

          verificaExistenciaArchivo(idOrganismo,idPreeliminar,$("#fisicamenteEstructura__na"));

          if(($("#fisicamenteEstructura__na").val() == 3 || $("#fisicamenteEstructura__na").val() == "3") || ($("#fisicamenteEstructura__na").val() == 18 || $("#fisicamenteEstructura__na").val() == "18")){
            verificaExistenciaArchivoCoordinacionP(idOrganismo,idPreeliminar);
          }

          if($("#fisicamenteEstructura__na").val() == "18" ||
            $("#fisicamenteEstructura__na").val() == 18){
              verificaObservacionesPlanificacion(idOrganismo,idPreeliminar);

              envioObservacionesPlanificacionOrganismo([$("#archivoResolucionP"),idOrganismo,idPreeliminar,$("#fechaLimiteIncremento"),$("#observacionesTramite")]);

              setTimeout(function () {
                traerDatatableObservaciones($("#tabla_Observaciones_DPI"),"observaciones_Dpi_Od",idOrganismo,idPreeliminar);
              }, 1000);

             
            }

        }

      });
  });

}

var datatablets__recomendados__CoordinacionDireccion__Planificacion = function (tabla, identificador) {

  /*==============================================
  =            Establecer datatablets            =
  ==============================================*/

  var table2 = $(tabla).DataTable({

    "language": {

      "sProcessing": "Procesando...",
      "sLengthMenu": "Mostrar _MENU_ registros",
      "sZeroRecords": "No se encontraron resultados",
      "sEmptyTable": "Ningún dato disponible en esta tabla",
      "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
      "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
      "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix": "",
      "sSearch": "Buscar:",
      "sUrl": "",
      "sInfoThousands": ",",
      "sLoadingRecords": "No existen datos",
      "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    },

    dom: 'Bfrtip',
      buttons: [
        {
          
          extend: 'excel',
          className: 'btn-excel',
          title:'IncrementosSubirResolucion',
          text: '<button  class="buttonD" ><i class="fas fa-file-excel" style="color: #277c41; font-size: 36px;" ></i></button>',
      },
    
      {
        extend: 'pdf',
        title: 'IncrementosSubirResolucion',
        text: '<button  class="buttonD" ><i class="fas fa-file-pdf " style="color: #BF0D0D; font-size: 36px;"></i></button>',
      
        orientation: 'landscape',
        customize:function(doc) {

            doc.defaultStyle.fontSize = 6;

            doc.styles.title = {
                color: 'black',
                fontSize: '6',
                alignment: 'center',
                margin:'0'                                                
            }
            doc.styles.tableHeader = {

              fillColor:'#311b92',
              fontSize: '6',
              color:'white',
              alignment:'center',
                              
          }
          

          }

        }
    ],

    "bLengthChange": false,
    "pagingType": "full_numbers",
    "Paginate": true,
    "pagingType": "full_numbers",
    "retrieve": true,
    "paging": true,
    "pageLength": 20,

    "ajax": {

      "method": "POST",
      "url": "modelosBd/incrementosDecrementos/datatablets.md.php",
      "data": {
        "identificador": identificador
      }

    },

    "aoColumnDefs": [
      
      {

        "aTargets": 8,
        "mRender": (function (data, type, row) {

          return "<center><button class='aprobar__boton__incremento estilo__botonDatatablets btn btn-primary' data-toggle='modal' data-target='#modalSubidaResolucionI'>Aprobar</button></center>";

        })

      },
      
    ]

  });

  funcion__verInformes__Planificacion($("#incrementos_Subir_Resolucion_Pla tbody"),table2);
}


var funcion__verInformes__Planificacion=function(tbody,table){

  $(tbody).on("click","button.aprobar__boton__incremento",function(e){
      
    e.preventDefault();

    var data=table.row($(this).parents("tr")).data();

    $(".titulos_modal").text(data[1]);
    let idOrganismo = data[9];
    let idPreeliminar = data[8];

    $(".contenedorArchivos").hide();

    $.getScript(
      "layout/scripts/js/incrementosDecrementos/metodos.js",
      function () {
        verificaExistenciaArchivoCoordinacionP(idOrganismo,idPreeliminar);

        verOcultar($(".botonVerInformes"));

        guardar__incrementos__revisores($(".botonAprobarIn"),"incrementos__guardar__resolucion",[idOrganismo,$("#archivoResolucionP"),$("#fechaIncrementoQuipux"),idPreeliminar,$("#resolucionIncrementoP"),$("#valorTechoIncremento")]);

        rechazar__incremento_Resolucion($(".botonNegarIn"),[idOrganismo,idPreeliminar]);
        
    })
  });

}

var datatablets__recorridoTramites__Incrementos = function (tabla, identificador) {

  /*==============================================
  =            Establecer datatablets            =
  ==============================================*/

  var table2 = $(tabla).DataTable({

    "language": {

      "sProcessing": "Procesando...",
      "sLengthMenu": "Mostrar _MENU_ registros",
      "sZeroRecords": "No se encontraron resultados",
      "sEmptyTable": "Ningún dato disponible en esta tabla",
      "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
      "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
      "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix": "",
      "sSearch": "Buscar:",
      "sUrl": "",
      "sInfoThousands": ",",
      "sLoadingRecords": "No existen datos",
      "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    },

    dom: 'Bfrtip',
      buttons: [
        {
          
          extend: 'excel',
          className: 'btn-excel',
          title:'IncrementosRecorrido',
          text: '<button  class="buttonD" ><i class="fas fa-file-excel" style="color: #277c41; font-size: 36px;" ></i></button>',
      },
    
      {
        extend: 'pdf',
        title: 'IncrementosRecorrido',
        text: '<button  class="buttonD" ><i class="fas fa-file-pdf " style="color: #BF0D0D; font-size: 36px;"></i></button>',
      
        orientation: 'landscape',
        customize:function(doc) {

            doc.defaultStyle.fontSize = 6;

            doc.styles.title = {
                color: 'black',
                fontSize: '6',
                alignment: 'center',
                margin:'0'                                                
            }
            doc.styles.tableHeader = {

              fillColor:'#311b92',
              fontSize: '6',
              color:'white',
              alignment:'center',
                              
          }
          

          }

        }
    ],

    "bLengthChange": false,
    "pagingType": "full_numbers",
    "Paginate": true,
    "pagingType": "full_numbers",
    "retrieve": true,
    "paging": true,
    "pageLength": 20,

    "ajax": {

      "method": "POST",
      "url": "modelosBd/incrementosDecrementos/datatablets.md.php",
      "data": {
        "identificador": identificador
      }

    },

    "aoColumnDefs": [
      
      
    ]

  });

}


var datatablets__observaciones__DPI = function (tabla,identificador,idOrganismo,idIncremento,variable){

  var table2 = $(tabla).DataTable({

    "language": {

      "sProcessing": "Procesando...",
      "sLengthMenu": "Mostrar _MENU_ registros",
      "sZeroRecords": "No se encontraron resultados",
      "sEmptyTable": "Ningún dato disponible en esta tabla",
      "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
      "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
      "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix": "",
      "sSearch": "Buscar:",
      "sUrl": "",
      "sInfoThousands": ",",
      "sLoadingRecords": "No existen datos",
      "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    },

    dom: 'Bfrtip',
      buttons: [
        {
          
          extend: 'excel',
          className: 'btn-excel',
          title:'Observacion_Planificacion_'+idOrganismo,
          text: '<button  class="buttonD" ><i class="fas fa-file-excel" style="color: #277c41; font-size: 36px;" ></i></button>',
      },
    
      {
        extend: 'pdf',
        title: 'Observacion_Planificacion_'+idOrganismo,
        text: '<button  class="buttonD" ><i class="fas fa-file-pdf " style="color: #BF0D0D; font-size: 36px;"></i></button>',
      
        orientation: 'landscape',
        customize:function(doc) {

            doc.defaultStyle.fontSize = 6;

            doc.styles.title = {
                color: 'black',
                fontSize: '6',
                alignment: 'center',
                margin:'0'                                                
            }
            doc.styles.tableHeader = {

              fillColor:'#311b92',
              fontSize: '6',
              color:'white',
              alignment:'center',
                              
          }
          

          }

        }
    ],

    "bLengthChange": false,
    "pagingType": "full_numbers",
    "Paginate": true,
    "pagingType": "full_numbers",
    "retrieve": true,
    "paging": true,
    "pageLength": 5,

    "ajax": {

      "method": "POST",
      "url": "modelosBd/incrementosDecrementos/datatablets.md.php",
      "data": {
        "identificador": identificador,
        "idOrganismo": idOrganismo,
        "idIncremento": idIncremento,
      }

    },

    "aoColumnDefs": [

      {

        "aTargets": 3,
        "mRender": (function (data, type, row) {

          return "<a target='_blank' href='" + variable + "incrementosDecrementos/observacion/" + row['documento'] + "'>" + row['documento'] + "</a>";

        })

      },
      {

        "aTargets": 5,
        "mRender": (function (data, type, row) {

          if(row['estado'] == "A"){
            return "<center><button class='rechazar__boton__incremento estilo__botonDatatablets btn btn-danger'>Rechazar</button></center>";
          }else if(row['estado'] == "S"){
            return "<center><button class='reasignar__Areas__boton__incremento estilo__botonDatatablets btn btn-success'>Enviar</button></center>";
          }

        })

      },
      
    ],

    "sDom": '<"table-responsive"t>'

  });

  funcion__reasignar_Observacion_DPI($("#tabla_Observaciones_DPI tbody"),table2);

  funcion__rechazar_Observacion_DPI($("#tabla_Observaciones_DPI tbody"),table2);
}

var funcion__reasignar_Observacion_DPI = function (tbody, table) {
  $(tbody).on("click","button.reasignar__Areas__boton__incremento",function (e) {
      e.preventDefault();

      var data = table.row($(this).parents("tr")).data();

      let idOrganismo = data[3];
      let idPreeliminar = data[4];
      let tipo = "reasignarIncrementoAreasSinObservaciones";

      var paqueteDeDatos = new FormData();

      alertify.confirm("¿Está seguro de reasignar el Incremento?", function (result) {
        if (result) {
          paqueteDeDatos.append("tipo", tipo);
          paqueteDeDatos.append("idOrganismo", idOrganismo);
          paqueteDeDatos.append("idPoaIncremento", idPreeliminar);

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
                  "Reasignación realizada correctamente",
                  "success",
                  5,
                  function () {}
                );

                window.setTimeout(function () {
                  window.location = "incrementosRevisorRecomendado";
                }, 3000);

              }
            },
            error: function () {},
          });
        } else {
          alertify.set("notifier", "position", "top-center");
          alertify.notify("Acccion Cancelada", "error", 3, function () {});
        }
      });
    }
  );
};


var funcion__rechazar_Observacion_DPI=function(tbody,table){

  $(tbody).on("click","button.rechazar__boton__incremento",function(e){
      
    e.preventDefault();

    var data = table.row($(this).parents("tr")).data();

      let idOrganismo = data[3];
      let idPreeliminar = data[4];
      let tipo = "rechazarIncrementoOrganismo";
      let tipoTramite ="incremento";

      var paqueteDeDatos = new FormData();

      alertify.confirm("¿Está seguro de rechazar el Incremento?", function (result) {
        if (result) {
          paqueteDeDatos.append("tipo", tipo);
          paqueteDeDatos.append("idOrganismo", idOrganismo);
          paqueteDeDatos.append("idPoaIncremento", idPreeliminar);
          paqueteDeDatos.append("tipoTramite", tipoTramite);

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
                  "Rechazo realizado correctamente",
                  "success",
                  5,
                  function () {}
                );

                window.setTimeout(function () {
                  window.location = "incrementosRevisorRecomendado";
                }, 3000);

              }
            },
            error: function () {},
          });
        } else {
          alertify.set("notifier", "position", "top-center");
          alertify.notify("Acccion Cancelada", "error", 3, function () {});
        }
      });

  });

}


var datatablets__tramites__Incrementos__Analistas = function (tabla,identificador,idOrganismo,variable){

  var table2 = $(tabla).DataTable({

    "language": {

      "sProcessing": "Procesando...",
      "sLengthMenu": "Mostrar _MENU_ registros",
      "sZeroRecords": "No se encontraron resultados",
      "sEmptyTable": "Ningún dato disponible en esta tabla",
      "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
      "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
      "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix": "",
      "sSearch": "Buscar:",
      "sUrl": "",
      "sInfoThousands": ",",
      "sLoadingRecords": "No existen datos",
      "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    },

    dom: 'Bfrtip',
      buttons: [
        {
          
          extend: 'excel',
          className: 'btn-excel',
          title:'tramites_incrementos'+idOrganismo,
          text: '<button  class="buttonD" ><i class="fas fa-file-excel" style="color: #277c41; font-size: 36px;" ></i></button>',
      },
    
      {
        extend: 'pdf',
        title: 'tramites_incrementos'+idOrganismo,
        text: '<button  class="buttonD" ><i class="fas fa-file-pdf " style="color: #BF0D0D; font-size: 36px;"></i></button>',
      
        orientation: 'landscape',
        customize:function(doc) {

            doc.defaultStyle.fontSize = 6;

            doc.styles.title = {
                color: 'black',
                fontSize: '6',
                alignment: 'center',
                margin:'0'                                                
            }
            doc.styles.tableHeader = {

              fillColor:'#311b92',
              fontSize: '6',
              color:'white',
              alignment:'center',
                              
          }
          

          }

        }
    ],

    "bLengthChange": false,
    "pagingType": "full_numbers",
    "Paginate": true,
    "pagingType": "full_numbers",
    "retrieve": true,
    "paging": true,
    "pageLength": 5,

    "ajax": {

      "method": "POST",
      "url": "modelosBd/incrementosDecrementos/datatablets.md.php",
      "data": {
        "identificador": identificador,
        "idOrganismo": idOrganismo
      }

    },

    "aoColumnDefs": [

      {

        "aTargets": 8,
        "mRender": (function (data, type, row) {

          return "<a target='_blank' href='" + variable + "incrementosDecrementos/anexos/" + row['documento'] + "'>" + row['documento'] + "</a>";

        })

      },
      {

        "aTargets": 9,
        "mRender": (function (data, type, row) {

          return`<center><button class='matriz__Inicial__boton estilo__botonDatatablets btn btn-primary' data-bs-toggle='modal' data-bs-target='#modalMatrizIncremento' idTramite='${row['idTramite']}' idPro='${row['itemProgramacion']}' idActividad='${row['idActividad']}'>Matriz Inicial</button></center>`;

        })

      },
      {

        "aTargets": 10,
        "mRender": (function (data, type, row) {

          return `<center><button class='matriz__Incremento__boton estilo__botonDatatablets btn btn-danger'  data-bs-toggle='modal' data-bs-target='#modalMatrizIncremento'  idTramite='${row['idTramite']}' idPro='${row['itemProgramacion']}' idActividad='${row['idActividad']}'>Matriz Incremento</button></center>`;

        })

      },
      
    ],

    "sDom": '<"table-responsive"t>'

  });

  funcion__reasignar_Observacion_DPI($("#tabla_Observaciones_DPI tbody"),table2);

  funcion__rechazar_Observacion_DPI($("#tabla_Observaciones_DPI tbody"),table2);

  table2.on('draw.dt', function() {

    verArmadoMatrizIncrementos($(".matriz__Inicial__boton"),$(".body_matrices_incrementos"));
    verArmadoMatrizIncrementos($(".matriz__Incremento__boton"),$(".body_matrices_incrementos"));
  });
}

var datatabletMatrizIncrementos = function(tabla,identificador,arrayValores){
  var table2 = $(tabla).DataTable({

    "language": {

      "sProcessing": "Procesando...",
      "sLengthMenu": "Mostrar _MENU_ registros",
      "sZeroRecords": "No se encontraron resultados",
      "sEmptyTable": "Ningún dato disponible en esta tabla",
      "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
      "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
      "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix": "",
      "sSearch": "Buscar:",
      "sUrl": "",
      "sInfoThousands": ",",
      "sLoadingRecords": "No existen datos",
      "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    },

    dom: 'Bfrtip',
      buttons: [
        {
          
          extend: 'excel',
          className: 'btn-excel',
          title:'tramites_incrementos',
          text: '<button  class="buttonD" ><i class="fas fa-file-excel" style="color: #277c41; font-size: 36px;" ></i></button>',
      },
    
      {
        extend: 'pdf',
        title: 'tramites_incrementos',
        text: '<button  class="buttonD" ><i class="fas fa-file-pdf " style="color: #BF0D0D; font-size: 36px;"></i></button>',
      
        orientation: 'landscape',
        customize:function(doc) {

            doc.defaultStyle.fontSize = 6;

            doc.styles.title = {
                color: 'black',
                fontSize: '6',
                alignment: 'center',
                margin:'0'                                                
            }
            doc.styles.tableHeader = {

              fillColor:'#311b92',
              fontSize: '6',
              color:'white',
              alignment:'center',
                              
          }
          

          }

        }
    ],

    "bLengthChange": false,
    "pagingType": "full_numbers",
    "Paginate": true,
    "pagingType": "full_numbers",
    "retrieve": true,
    "paging": true,
    "pageLength": 5,

    "ajax": {

      "method": "POST",
      "url": "modelosBd/incrementosDecrementos/datatablets.md.php",
      "data": {
        "identificador": identificador,
        "arrayValores": arrayValores
      }

    },

    "aoColumnDefs": [
    ],

    "sDom": '<"table-responsive"t>'

  });
} 

