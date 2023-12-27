var datatablets__funcio__repor__modificaciones=function(tabla,identificador,parametro3){

/*==============================================
=            Establecer datatablets            =
==============================================*/

var table2 =$(tabla).DataTable({

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
  "Paginate": false,
  "pagingType": "full_numbers",
  "retrieve": true, 
  "paging": false, 


  "ajax":{

    "method":"POST",
    "url":"modelosBd/DOCUMENTOS2022/datatblets.md.php", 
    "data": { 
      "identificador": identificador
    }  

  },

  "aoColumnDefs":[

    {
      
      "aTargets":7, 
      "mRender": (function (data, type, row) {

        let posicion = row["codigoCompuesto"].indexOf("poa");
        if (posicion !== -1){
           return "<a href='repositorio/documentosPOA2022/MODIFICACION/"+row["codigoCompuesto"]+".xlsx' target='_blank'>"+row["codigoCompuesto"]+"</a>";
        }else{
           return "<a href='repositorio/documentosPOA2022/MODIFICACION/"+row["codigoCompuesto"]+".pdf' target='_blank'>"+row["codigoCompuesto"]+"</a>";
        }

       }) 

    },

  ]

});

/*=====  End of Establecer datatablets s ======*/


}


var datatablets__funcio__repor=function(tabla,identificador,parametro3){

/*==============================================
=            Establecer datatablets            =
==============================================*/

var table2 =$(tabla).DataTable({

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
  "Paginate": false,
  "pagingType": "full_numbers",
  "retrieve": true, 
  "paging": false, 


  "ajax":{

    "method":"POST",
    "url":"modelosBd/DOCUMENTOS2022/datatblets.md.php", 
    "data": { 
      "identificador": identificador
    }  

  },

  "aoColumnDefs":[

    {
      
      "aTargets":7, 
      "mRender": (function (data, type, row) {
		    if (parametro3=="seguimiento"){
         return "<a href='repositorio/documentosPOA2022/SEGUIMIENTO/Repositorio Aplicativo PAAD/"+row["codigoCompuesto"]+".pdf' target='_blank'>"+row["codigoCompuesto"]+"</a>";
      	}else{
          return "<a href='repositorio/documentosPOA2022/MODIFICACION/"+row["codigoCompuesto"]+".pdf' target='_blank'>"+row["codigoCompuesto"]+"</a>";
        }

       }) 

    },

  ]

});

/*=====  End of Establecer datatablets s ======*/


}

var datatablets__funcio__repor__12=function(boton,tabla,identificador,parametro3){

$(boton).click(function (e){

/*==============================================
=            Establecer datatablets            =
==============================================*/

var table2 =$(tabla).DataTable({

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
  "Paginate": false,
  "pagingType": "full_numbers",
  "retrieve": true, 
  "paging": false, 


  "ajax":{

    "method":"POST",
    "url":"modelosBd/DOCUMENTOS2022/datatblets.md.php", 
    "data": { 
      "identificador": identificador
    }  

  },

  "aoColumnDefs":[

    {
      
      "aTargets":2, 
      "mRender": (function (data, type, row) {
        if (parametro3=="seguimiento"){
         return "<a href='repositorio/documentosPOA2022/SEGUIMIENTO/Repositorio Aplicativo PAAD/"+row["codigoCompuesto"]+".pdf' target='_blank'>"+row["rucOrganismo"]+"</a>";
        }

       }) 

    },

  ]

});

/*=====  End of Establecer datatablets s ======*/
});

}

var datatablets__funcio__repor__12__modificacion=function(boton,tabla,identificador,parametro3){

$(boton).click(function (e){

/*==============================================
=            Establecer datatablets            =
==============================================*/

var table2 =$(tabla).DataTable({

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
  "Paginate": false,
  "pagingType": "full_numbers",
  "retrieve": true, 
  "paging": false, 


  "ajax":{

    "method":"POST",
    "url":"modelosBd/DOCUMENTOS2022/datatblets.md.php", 
    "data": { 
      "identificador": identificador
    }  

  },

  "aoColumnDefs":[

    {
      
      "aTargets":2, 
      "mRender": (function (data, type, row) {

        let posicion = row["codigoCompuesto"].indexOf("poa");
        if (posicion !== -1){
           return "<a href='repositorio/documentosPOA2022/MODIFICACION/"+row["codigoCompuesto"]+".xlsx' target='_blank'>"+row["codigoCompuesto"]+"</a>";
        }else{
           return "<a href='repositorio/documentosPOA2022/MODIFICACION/"+row["codigoCompuesto"]+".pdf' target='_blank'>"+row["codigoCompuesto"]+"</a>";
        }
        
       }) 

    },

  ]

});

/*=====  End of Establecer datatablets s ======*/
});

}
