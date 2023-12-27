var datatablets__funcio__repor__incrementos__v__1=function(tabla,identificador,parametro3){

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
    "url":"modelosBd/incrementosDecrementos/datatablets.md.php", 
    "data": { 
      "identificador": identificador
    }  

  },

  "aoColumnDefs":[

    {
      
      "aTargets":5, 
      "mRender": (function (data, type, row) {

         return "<button class='asignar__boton__incre__decre estilo__botonDatatablets btn btn-primary' data-toggle='modal' data-target='#modalAsignarPre'>Modificar</button>";
      	
       }) 

    },
    {
      
      "aTargets":7, 
      "mRender": (function (data, type, row) {

         return "<button class='asignar__boton__incre__decre__eliminar estilo__botonDatatablets btn btn-danger'>Eliminar</button>";
        
       }) 

    },

  ]

});

/*=====  End of Establecer datatablets s ======*/

funcion__incrementos__decrementos("#asignarPresupuestoMo__incrementos__v__1 tbody",table2);
funcion__incrementos__decrementos__eliminar("#asignarPresupuestoMo__incrementos__v__1 tbody",table2);

}

var funcion__incrementos__decrementos=function(tbody,table){

  $(tbody).on("click","button.asignar__boton__incre__decre",function(e){

    e.preventDefault();

    let data=table.row($(this).parents("tr")).data();

    $("#titulo__od__organismos").text(data[1]);

    $("#idOrganismo__m").val(data[7]);


    console.log(data);

  });

}


var funcion__incrementos__decrementos__eliminar=function(tbody,table){

  $(tbody).on("click","button.asignar__boton__incre__decre__eliminar",function(e){

  e.preventDefault();

  $(".asignar__boton__incre__decre__eliminar").hide();


  let data=table.row($(this).parents("tr")).data();

  var confirm= alertify.confirm('¿Está seguro de eliminar el registro?','¿Está seguro de eliminar el registro?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

  confirm.set({transition:'slide'});    

  confirm.set('onok', function(){


    let paqueteDeDatos = new FormData();

    let identificador__pagina=$("#identificador__pagina").val();

    paqueteDeDatos.append('tipo','eliminar__incre__decrementos');
    paqueteDeDatos.append('idOrganismo',data[7]);
    paqueteDeDatos.append('identificador__pagina',identificador__pagina);

    $.ajax({

      type:"POST",
      url:"modelosBd/incrementosDecrementos/elimina.md.php",
      contentType: false,
      data:paqueteDeDatos,
      processData: false,
      cache: false,  
      success:function(response){

        let elementos=JSON.parse(response);
        let mensaje=elementos['mensaje'];

        if (mensaje==1) {

          alertify.set("notifier","position", "top-center");
          alertify.notify("Registro eliminado correctamente", "success", 5, function(){});

              window.setTimeout(function(){ 
                location.reload();
            } ,5000); 

        }


        },
        error:function(){
          
        } 

    });

  });

  confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
      alertify.set("notifier","position", "top-center");
      alertify.notify("Acción cancelada", "error", 1, function(){}); 
      $(".asignar__boton__incre__decre__eliminar").show();
  }); 



  });

}

/*=================================
=            Version 2            =
=================================*/

var datatablets__funcio__repor__incrementos__v__2=function(tabla,identificador,parametro3){

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
    "url":"modelosBd/incrementosDecrementos/datatablets.md.php", 
    "data": { 
      "identificador": identificador
    }  

  },

  "aoColumnDefs":[

    {
      
      "aTargets":4, 
      "mRender": (function (data, type, row) {

         return "<button class='asignar__boton__incre__decre__aprobar estilo__botonDatatablets btn btn-primary' data-toggle='modal' data-target='#modalAprobarD'>Aprobar</button>";
        
       }) 

    },
    {
      
      "aTargets":5, 
      "mRender": (function (data, type, row) {

         return "<button class='asignar__boton__incre__decre__eliminar__aprobar estilo__botonDatatablets btn btn-danger'>Observación</button>";
        
       }) 

    },

  ]

});

/*=====  End of Establecer datatablets s ======*/

funcion__incrementos__decrementos__eliminar__revisor("#asignarPresupuestoMo__revisor__v__1 tbody",table2);
funcion__incrementos__decrementos__veras("#asignarPresupuestoMo__revisor__v__1 tbody",table2);


}


var funcion__incrementos__decrementos__veras=function(tbody,table){

  $(tbody).on("click","button.asignar__boton__incre__decre__aprobar",function(e){

    e.preventDefault();

    let data=table.row($(this).parents("tr")).data();

    let paqueteDeDatos = new FormData();

    $("#exampleModalLabel").text(data[1]);

    $("#idOrganismo__m__n").val(data[4]);

    $("#tipo__organismos__m__n").val(data[3]);

    $("#idIncrementos").val(data[5]);

    let idOrganismo=$("#idOrganismo__m__n").val();

    let fisicamenteE=$("#fisicamenteE").val();

    let idRolAd=$("#idRolAd").val();

    paqueteDeDatos.append('tipo','informacioSubsess');

    paqueteDeDatos.append('idOrganismo',idOrganismo);

    paqueteDeDatos.append('fisicamenteE',fisicamenteE);

    paqueteDeDatos.append('idRolAd',idRolAd);

    $.ajax({

      type:"POST",
      url:"modelosBd/inserta/seleccionaAcciones.md.php",
      contentType: false,
      data:paqueteDeDatos,
      processData: false,
      cache: false, 
      success:function(response){

      $.getScript("layout/scripts/js/validaGlobal.js",function(){

        var elementos=JSON.parse(response);
        var obtenerInformacion=elementos['obtenerInformacion'];
        var obtenerAcCa=elementos['obtenerAcCa'];
        var indicadorInformacion=elementos['indicadorInformacion'];


        $(".contenedor__bodyCMatriz").append(' ');

        $(".elementosCreados__M").remove();

        $(".creados__letter").remove();


        if (!$(".sumado__indicadores").length > 0 ) {

                    $(".contenedor__bodyCMatriz").append('<div class="col col-12 text-center sumado__indicadores" style="font-size:14px; font-weight:bold;">Indicadores</div><br><br>');

                    $(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Actividad - indicador</div><div class="col col-2 text-center" style="font-weight:bold;">Primer trimestre</div><div class="col col-1 text-center" style="font-weight:bold;">Segundo Trimestre</div><div class="col col-1 text-center" style="font-weight:bold;">Tercer trimestre</div><div class="col col-2 text-center" style="font-weight:bold;">Cuarto trimestre</div><div class="col col-2 text-center" style="font-weight:bold;">Meta indicador</div>');


                    for (z of indicadorInformacion) {

                        $(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center">'+z.indicador+'</div><div class="col col-2 text-center">'+z.primertrimestre+'</div><div class="col col-1 text-center">'+z.segundotrimestre+'</div><div class="col col-1 text-center">'+z.tercertrimestre+'</div><div class="col col-2 text-center">'+z.cuartotrimestre+'</div><div class="col col-2 text-center">'+z.metaindicador+'</div>');


                    }               


                    if (data[9]!=null && data[9]!="") {

                        $(".contenedor__bodyCMatriz").append('<div class="col col-12 text-center" style="font-size:14px; font-weight:bold;">Documentos anexos</div><br><br>');

                        var arreglo = data[9].split("_________");

                        for (var i = 0 ; i<arreglo.length; i++) {
                            

                            $(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center"><a href="'+$("#filesFrontend").val()+'anexosPoa/'+arreglo[i]+'" target="_blank">'+arreglo[i]+'</a></div>');

                        }


                    }

                }

                if (obtenerAcCa!="") {



                    $(".contenedor__bodyCMatriz").append('<div class="col col-12"  style="width:100%;" style="display:flex; flex-direction:column; justify-content:center; align-items:center;"><button class="ver__Tabla btn btn-primary creados__letter" style="cursor:pointer; color:white!important;">VER POA&nbsp;&nbsp;<i class="fas fa-eye icono__boton" style="color:white!important;"></i></button></div>');


                    $(".contenedor__bodyCMatriz").append('<button type="button" class="btn btn-success excelProyectos col col-1 elementosCreados__M"><i class="fas fa-file-excel"></i>&nbsp;&nbsp;EXCEL</button><table class="tabla__itemsM elementosCreados__M" style="margin-top:2em;" id="tablaPoaPrincipal"><thead><tr><th align="center">Actividad</th><th align="center">Item</th><th align="center">Enero</th><th align="center">Febrero</th><th align="center">Marzo</th><th align="center">Abril</th><th align="center">Mayo</th><th align="center">Junio</th><th align="center">Julio</th><th align="center">Agosto</th><th align="center">Septiembre</th><th align="center">Octubre</th><th align="center">Noviembre</th><th align="center">Diciembre</th><th align="center">Total</th></tr></thead></table><br><br>');

                    $(".elementosCreados__M").hide();

                    for (c of obtenerInformacion) {

                      $(".tabla__itemsM").append('<tr><td>'+c.idActividades+"-"+c.nombreActividades+'</td><td>'+c.itemPreesupuestario+"-"+c.nombreItem+'</td><td><center>'+parseFloat(c.enero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.febrero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.marzo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.abril).toFixed(2)+'</center></td><td><center>'+parseFloat(c.mayo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.junio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.julio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.agosto).toFixed(2)+'</center></td><td><center>'+parseFloat(c.septiembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.octubre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.noviembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.diciembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.totalSumaItem).toFixed(2)+'</center></td></tr>');


                    }

                    execelGenerados($(".excelProyectos"),"tablaPoaPrincipal","poa");

                    verOjoContrasenas2($(".ver__Tabla"),$(".icono__boton"),$(".elementosCreados__M"),$(".letras__ver__poa"));

                  

                    if (!$("#rotulo__ac").length > 0 ) {


                        $(".contenedor__bodyCMatriz").append('<div class="col col-12 text-center" style="font-size:14px; font-weight:bold;" id="rotulo__ac">ACTIVIDADES A ANALIZAR</div><br><br>');

                    }

                    for (d of obtenerAcCa) {

                        if (!$(".ver__matrices"+d.idActividades).length > 0 ) {

                            $(".contenedor__bodyCMatriz").append('<div class="col col-6 letras__ver__poa text-center" style="font-weight:bold; font-size:12px; ; margin-bottom:2em;">'+d.idActividades+"-"+d.nombreActividades+'</div><div class="col col-6"><button class="ver__matrices'+d.idActividades+' btn btn-info" attr="'+d.idActividades+'" style="cursor:pointer;"><i class="fas fa-eye icono__'+d.idActividades+'"></i></button></div><br><div class="col col-12 matrices__'+d.idActividades+' row"></div>');

                            verOjoAjaxMatrices($(".ver__matrices"+d.idActividades),$(".icono__"+d.idActividades),$(".matrices__"+d.idActividades),d.idActividades,d.idOrganismo,$("#idRolAd").val(),$("#fisicamenteE").val());

                        }

                    }


                }


      });  

      },
      error:function(){

      }
                
    });     



    console.log(data);

  });

}

var funcion__incrementos__decrementos__eliminar__revisor=function(tbody,table){

  $(tbody).on("click","button.asignar__boton__incre__decre__eliminar__aprobar",function(e){

  e.preventDefault();

  $(".asignar__boton__incre__decre__eliminar__aprobar").hide();


  let data=table.row($(this).parents("tr")).data();

  var confirm= alertify.prompt('¿Está seguro de observar el registro, ingresar comentario al organismo '+data[1]+'?','',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

  confirm.set({transition:'slide'});    

  confirm.set('onok', function(evt, value){

    if (value!="" && value!=" ") {

     let paqueteDeDatos = new FormData();

     paqueteDeDatos.append('tipo','observar__incrementos__decrementos');
     paqueteDeDatos.append('idIncrementos',data[5]);
     paqueteDeDatos.append('comentario',value);

    $.ajax({

      type:"POST",
      url:"modelosBd/incrementosDecrementos/inserta.md.php",
      contentType: false,
      data:paqueteDeDatos,
      processData: false,
      cache: false,  
      success:function(response){

        let elementos=JSON.parse(response);
        let mensaje=elementos['mensaje'];

        if (mensaje==1) {

          alertify.set("notifier","position", "top-center");
          alertify.notify("Registro observado correctamente", "success", 5, function(){});

              window.setTimeout(function(){ 
              window.location ="revision";
            } ,5000); 

        }


        },
        error:function(){
          
        } 

    });

    }else{

      alertify.set("notifier","position", "top-center");
      alertify.notify("Obligatorio ingresar un comentario", "error", 1, function(){}); 

      $(".asignar__boton__incre__decre__eliminar__aprobar").show();

    }


  });

  confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
      alertify.set("notifier","position", "top-center");
      alertify.notify("Acción cancelada", "error", 1, function(){}); 
      $(".asignar__boton__incre__decre__eliminar__aprobar").show();
  }); 



  });

}


/*=====  End of Version 2  ======*/


/*=================================
=            Versión 3            =
=================================*/


var datatablets__funcio__repor__incrementos__v__2__aprobados=function(tabla,identificador,parametro3){

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
    "url":"modelosBd/incrementosDecrementos/datatablets.md.php", 
    "data": { 
      "identificador": identificador
    }  

  },

  "aoColumnDefs":[

    {
      
      "aTargets":4, 
      "mRender": (function (data, type, row) {

         return "<a target='_blank' href='documentos/incrementos/resolucionDirectorPlanificacion/"+row['documento']+"'>Documento de aprobación</a>";
        
       }) 

    },

  ]

});

/*=====  End of Establecer datatablets s ======*/

}


/*=====  End of Versión 3  ======*/
