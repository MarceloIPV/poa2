
 

  var datatableSeguimiento1 = $(tabla).DataTable({

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
    'excel',
    {

      extend: 'pdf',
      text: 'PDF',
      orientation: 'landscape',
      customize:function(doc) {

          doc.defaultStyle.fontSize = 6;

            doc.styles.title = {
              color: 'black',
              fontSize: '8',
              alignment: 'left',
              margin:'0'                                                
            }

            doc.styles.tableHeader = {

              fillColor:'#311b92',
              fontSize: '8',
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
  "paging":10, 
  "pageLength":4,

});