
var datatabletsAR = function (tabla, identificador) {

  // alert("Datatables");
  /*==================================================
  =            Obtener número de columnas            =
  ==================================================*/
  let contadorCol = $('#' + identificador + ' > thead > tr > th').length;
  let contadorRestar = contadorCol - 1;
  //=====  End of Obtener número de columnas  ======//

  /*=================================================================
  =            Construir columnas para editar y eliminar            =
  =================================================================*/
  //$('#'+identificador).find('th').eq(contadorRestar).after('<th>Editar</th>');
  $('#' + identificador).find('th').eq(contadorRestar).after('<th>Eliminar</th>');
  //=====  End of Construir columnas para editar y eliminar  ======//

  /*==============================================
  =            Establecer datatablets            =
  ==============================================*/

  var table = $(tabla).DataTable({

    "language": {

      "sProcessing": "Procesando...",
      "sLengthMenu": "Mostrar MENU registros",
      "sZeroRecords": "No se encontraron resultados",
      "sEmptyTable": "Ningún dato disponible en esta tabla",
      "sInfo": "Mostrando registros del START al END de un total de TOTAL",
      "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
      "sInfoFiltered": "(filtrado de un total de MAX registros)",
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
          text: '<button  class="buttonD" ><i class="fas fa-file-excel" style="color: #277c41; font-size: 36px;" ></i></button>',

      
          

      },
    
      {
        extend: 'pdf',
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
    "pageLength": 4,
    "scrollX": true,


    "ajax": {

      "method": "POST",
      "url": "modelosBd/paid-alto-rendimiento-modelos/datatables.md.php",
      "data": {
        "identificador": identificador,
        "idRubro": $("#JuegosNacionalesIDRUBRO").val(),
        "idComponente": $("#JuegosNacionalesIDCOMPONENTE").val()
      }

    },

    "aoColumnDefs": [


      /*{
          
        "aTargets":contadorCol, 
        "mRender": (function (data, type, row) {
  
          return '<div class="w-full flex justify-center" align="center"><button class="btn btn-success dt-editar"><i class="fas fa-pen"></i></button></div>';
  
         }) 
  
      },*/

      {

        "aTargets": (contadorCol),
        "mRender": (function (data, type, row) {

          return '<div class="w-full flex justify-center" align="center"><button class="btn btn-warning dt-delete"><i class="fas fa-trash"></i></button></div>';

        })

      }

    ]

  });

  //=====  End of Establecer datatablets  ======//

  funcion__eliminar("#" + identificador + " tbody", table, contadorCol, identificador);
  
}

/*====================================
=            Editar datos            =
====================================*/



//=====  End of Editar datos  ======//


/*======================================
=            Eliminar datos            =
======================================*/
var funcion__eliminar = function (tbody, table, contadorCol, identificador) {

  $(tbody).on("click", "button.dt-delete", function (e) {

    e.preventDefault();

    let data = table.row($(this).parents("tr")).data();
    $this = $(this);
    let dtRow = $this.parents('tr');

    alertify.confirm('¿Está seguro de eliminar?', '', function () {

      let paqueteDeDatos = new FormData();
      paqueteDeDatos.append("tipo", identificador);
      paqueteDeDatos.append("id", data[contadorCol]);

      axios({
        method: "post",
        url: "modelosBd/paid-alto-rendimiento-modelos/delete.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
      }).then((response) => {

        if (response.data.mensaje == true) {
          alertify.set("notifier", "position", "top-center");
          alertify.notify("Registro realizado correctamente", "success", 5, function () { });
          table.row(dtRow[0].rowIndex - 1).remove().draw(false);
          
          sumaRestaMontosRubrosAR("obtener_suma_valorTotal_nece_Individuales","#MontoAsignadoNecesidadesIndividuales",".restaDeMontosNecesidadesInd","#MontoPorAsignarNecesidadesIndividuales");
          sumaRestaMontosRubrosAR("obtener_suma_valorTotal_nece_generales","#MontoAsignadoNecesidadesGenerales",".restaDeMontosNecesidadesGenerales","#MontoPorAsignarNecesidadesGenerales");
          sumaRestaMontosRubrosAR("obtener_suma_valorTotal_Eventos", "#MontoAsignadoEventos", ".restaDeMontos", "#montoPorAsignarEventos");
          sumaRestaMontosRubrosAR("obtener_suma_valorTotal_Interdisciplinario", "#MontoAsignadoInterdisciplinario", ".restaDeMontosInter", "#montoPorAsignarInterdisciplinario");

        }

      }).catch((error) => {
        alertify.set("notifier", "position", "top-center");
        alertify.notify("No se puede realizar la acción", "error", 5, function () { });
      });

    },
      function () {
        alertify.set("notifier", "position", "top-center");
        alertify.notify("Acción cancelada", "error", 5, function () { });
      });

  });

}

//=====  End of Eliminar datos  ======//



var datatabletsNormalAR = function (tabla, identificador) {

  // alert("Datatables");
  /*==================================================
  =            Obtener número de columnas            =
  ==================================================*/
  let contadorCol = $('#' + identificador + ' > thead > tr > th').length;
  let contadorRestar = contadorCol - 1;
  //=====  End of Obtener número de columnas  ======//

  /*=================================================================
  =            Construir columnas para editar y eliminar            =
  =================================================================*/
  //$('#'+identificador).find('th').eq(contadorRestar).after('<th>Editar</th>');
  //$('#'+identificador).find('th').eq(contadorRestar).after('<th>Eliminar</th>');
  //=====  End of Construir columnas para editar y eliminar  ======//

  /*==============================================
  =            Establecer datatablets            =
  ==============================================*/

  var table = $(tabla).DataTable({

    "language": {

      "sProcessing": "Procesando...",
      "sLengthMenu": "Mostrar MENU registros",
      "sZeroRecords": "No se encontraron resultados",
      "sEmptyTable": "Ningún dato disponible en esta tabla",
      "sInfo": "Mostrando registros del START al END de un total de TOTAL",
      "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
      "sInfoFiltered": "(filtrado de un total de MAX registros)",
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
          text: '<button  class="buttonD" ><i class="fas fa-file-excel" style="color: #277c41; font-size: 36px;" ></i></button>',

      
          

      },
    
      {
        extend: 'pdf',
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
    "pageLength": 4,
    "scrollX": true,


    "ajax": {

      "method": "POST",
      "url": "modelosBd/paid-alto-rendimiento-modelos/datatables.md.php",
      "data": {
        "identificador": identificador
      }

    },

    /* "aoColumnDefs":[
       
   
       {
           
         "aTargets":contadorCol, 
         "mRender": (function (data, type, row) {
   
           return '<div class="w-full flex justify-center" align="center"><button class="btn btn-success dt-editar"><i class="fas fa-pen"></i></button></div>';
   
          }) 
   
       },
   
       {
         
         "aTargets":(contadorCol), 
         "mRender": (function (data, type, row) {
   
           return '<div class="w-full flex justify-center" align="center"><button class="btn btn-warning dt-delete"><i class="fas fa-trash"></i></button></div>';
   
          }) 
   
       }  
   
     ]*/

  });

  //=====  End of Establecer datatablets  ======//

  funcion__eliminar("#" + identificador + " tbody", table, contadorCol, identificador);
  funcion__editar("#" + identificador + " tbody", table, contadorCol, identificador, posicionElemento, tipoElemento, selector, identificador, llave);

}


