var datatabletsPaidInfraestructuraVacio=function(tabla,tipo,nombreDocumento,enlaceDocumento,datos,reasignacion){


    /*==================================================
    =            Obtener número de columnas            =
    ==================================================*/
    let contadorCol=$('#'+tipo+' > thead > tr > th').length;
    let contadorRestar=contadorCol - 1;

    //=====  End of Obtener número de columnas  ======/
    
    /*=================================================================
    =            Construir columnas para editar y eliminar            =
    =================================================================*/
    //$('#'+tipo).find('th').eq(contadorRestar).after('<th COLSPAN=1><center>Editar</center></th>');
    //$('#'+tipo).find('th').eq(contadorRestar).after('<th COLSPAN=1><center>Eliminar</center></th>');
    //=====  End of Construir columnas para editar y eliminar  ======/
    
    /*==============================================
    =            Establecer datatablets            =
    ==============================================*/
    
    var table =$(tabla).DataTable({
    
      "language":{
    
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar MENU registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del START al END de un total de TOTAL",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered":   "(filtrado de un total de MAX registros)",
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
        {
          
          extend: 'excel',
          className: 'btn-excel',
          title:nombreDocumento,
          text: '<button  class="buttonD" ><i class="fas fa-file-excel" style="color: #277c41; font-size: 36px;" ></i></button>',
      },
    
      {
        extend: 'pdf',
        title:nombreDocumento,
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
      "pageLength":10,

      fixedHeader: true,

      "initComplete": function (settings, json) {  
        $(tabla).wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
      },
    
    
      "ajax":{
    
        "method":"POST",
      "url":"modelosBd/PAID_INFRAESTRUCTURA/datatablets.PD.md.php", 
      
      "data": { 
        "tipo": tipo,
        "datos": datos
        
      }
    
      },
    
  
        "aoColumnDefs":enlaceDocumento
      
    
        
    });




    

    
}


/*===============================================
=            Objetos Datatables            =
===============================================*/

var objetosPaidInfraestructura2023=function(parametro1,parametro2,parametro3,parametro4,parametro5,parametro6){

  var objeto = [];

  /*=============================================
  =            Creación de elementos            =
  =============================================*/
  

  if (parametro1[0]!="" && parametro1[0]!=" ") {

      objeto.push({ 

          "aTargets":[parametro1[0]], 
          "mData": null,
          "mRender": (function (data, type, row) {

              if (parametro2[0]=="enlace" && row[parametro5[0]]!=null && row[parametro5[0]]!=undefined && row[parametro5[0]]!="" && row[parametro5[0]]!=" ") {

                  if (row[parametro5[0]].indexOf('.pdf') > -1 ){
                      return "<center><a href='"+parametro4[0]+row[parametro5[0]]+"' target='_blank'>"+row[parametro3[0]]+"</a></center>";
                  }else{
                      return "<center><a href='"+parametro4[0]+row[parametro5[0]]+".pdf' target='_blank'>"+row[parametro3[0]]+"</a></center>";
                  }

              }else if (parametro2[0]=="enlace") {

                if (row[parametro5[0]].indexOf('.pdf') > -1){
                    return "<center><a href='"+parametro4[0]+row[parametro5[0]]+"' target='_blank'>"+row[parametro3[0]]+"</a></center>";
                }else{
                    return "<center><a href='"+parametro4[0]+row[parametro5[0]]+".pdf' target='_blank'>"+row[parametro3[0]]+"</a></center>";
                }

            }else if(parametro2[0]=="boton"){

                  return parametro3[0];

              }else{
                  return row[parametro3[0]];
              }

          })

      });     

  }

  if (parametro1[1]!="" && parametro1[1]!=" ") {

      objeto.push({ 

          "aTargets":[parametro1[1]], 
          "mData": null,
          "mRender": (function (data, type, row) {

              if (parametro2[1]=="enlace" && row[parametro5[1]]!=null && row[parametro5[1]]!=undefined && row[parametro5[1]]!="" && row[parametro5[1]]!=" ") {

                  if (row[parametro5[1]].indexOf('.pdf') > -1 ){
                      return "<center><a href='"+parametro4[1]+row[parametro5[1]]+"' target='_blank'>"+row[parametro3[1]]+"</a></center>";
                  }else{
                      return "<center><a href='"+parametro4[1]+row[parametro5[1]]+".pdf' target='_blank'>"+row[parametro3[1]]+"</a></center>";
                  }

              }else if(parametro2[1]=="boton"){

                  return parametro3[1];

              }else if(parametro2[1]=="texto__separadores"){


                  if (row[parametro3[1]]!="" && row[parametro3[1]]!=null && row[parametro3[1]]!=undefined) {

                      let arr = row[parametro3[1]].split(';;;;');

                  if (arr.length>0) {

                          if (arr[0]!=undefined && arr[0]!="undefined") {

                              var primero="<div>"+arr[0]+"</div>";

                          }else{
                              primero="<div></div>";
                          }



                          if (arr[1]!=undefined && arr[1]!="undefined") {

                              var segundo="<div>"+arr[1]+"</div>";

                          }else{
                              segundo="<div></div>";
                          }



                          if (arr[2]!=undefined && arr[2]!="undefined") {

                              var tercero="<div>"+arr[2]+"</div>";

                          }else{
                              tercero="<div></div>";
                          }



                          if (arr[3]!=undefined && arr[3]!="undefined") {

                              var cuarto="<div>"+arr[3]+"</div>";

                          }else{
                              cuarto="<div></div>";
                          }



                          if (arr[4]!=undefined && arr[4]!="undefined") {

                              var quinto="<div>"+arr[4]+"</div>";

                          }else{
                              quinto="<div></div>";
                          }



                          if (arr[5]!=undefined && arr[5]!="undefined") {

                              var sexto="<div>"+arr[5]+"</div>";

                          }else{
                              sexto="<div></div>";
                          }



                          return primero+"<br>"+segundo+"<br>"+tercero+"<br>"+cuarto+"<br>"+quinto+"<br>"+sexto;

                      }else{

                          return "No asignado";

                      }                       

                  }else{

                      return "No asignado";


                  }

              }else{
                  return row[parametro3[1]];
              }

          })

      });
  
  }

  if (parametro1[2]!="" && parametro1[2]!=" ") {

      objeto.push({ 

          "aTargets":[parametro1[2]], 
          "mData": null,
          "mRender": (function (data, type, row) {

              if (parametro2[2]=="enlace") {

                  if (row[parametro5[2]].indexOf('.pdf') > -1){
                      return "<center><a href='"+parametro4[2]+row[parametro5[2]]+"' target='_blank'>"+row[parametro3[2]]+"</a></center>";
                  }else{
                      return "<center><a href='"+parametro4[2]+row[parametro5[2]]+".pdf' target='_blank'>"+row[parametro3[2]]+"</a></center>";
                  }

              }else if(parametro2[2]=="boton"){

                  return parametro3[2];

              }else if(parametro2[2]=="texto__separadores"){


                  if (row[parametro3[2]]!="" && row[parametro3[2]]!=null && row[parametro3[2]]!=undefined) {

                      let arr = row[parametro3[2]].split(';;;;');
                  if (arr.length>0) {

                          if (arr[0]!=undefined && arr[0]!="undefined") {

                              var primero="<div>"+arr[0]+"</div>";

                          }else{
                              primero="<div></div>";
                          }



                          if (arr[1]!=undefined && arr[1]!="undefined") {

                              var segundo="<div>"+arr[1]+"</div>";

                          }else{
                              segundo="<div></div>";
                          }



                          if (arr[2]!=undefined && arr[2]!="undefined") {

                              var tercero="<div>"+arr[2]+"</div>";

                          }else{
                              tercero="<div></div>";
                          }



                          if (arr[3]!=undefined && arr[3]!="undefined") {

                              var cuarto="<div>"+arr[3]+"</div>";

                          }else{
                              cuarto="<div></div>";
                          }



                          if (arr[4]!=undefined && arr[4]!="undefined") {

                              var quinto="<div>"+arr[4]+"</div>";

                          }else{
                              quinto="<div></div>";
                          }



                          if (arr[5]!=undefined && arr[5]!="undefined") {

                              var sexto="<div>"+arr[5]+"</div>";

                          }else{
                              sexto="<div></div>";
                          }



                          return primero+"<br>"+segundo+"<br>"+tercero+"<br>"+cuarto+"<br>"+quinto+"<br>"+sexto;

                      }else{

                          return "No asignado";

                      }           
                  }else{

                      return "No asignado";


                  }

              }else if(parametro2[0]=="boton__2"){

                  if(row[parametro4[0]]=="Notificado por no presentación de requisitos"){

                      return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

                  }else if (row[parametro3[0]]!="" && row[parametro3[0]]!=null) {

                      return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

                  }else{

                      return "Aún no presenta los documentos";

                  }


              }else if(parametro2[2]=="enlaces__definidos__2"){

                  if (row[parametro3[2]]=="CUMPLE") {

                      return "<a href='seguimientoRecorrido' target='_blank'>ENVIADO</a>";

                  }else{
                      return "NO ENVIADO";
                  }

                  

              }else if(parametro2[2]=="texto__separadores__2"){

                  if (row[parametro3[2]]=="si") {

                      return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado2'><option value='si'>Si</option><option value='no'>No</option></select>";

                  }else{

                      return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado2'><option value='no'>No</option><option value='si'>Si</option></select>";

                  }

                  

              }else if(parametro2[2]=="texto__separadores__cierre__anio__fiscal"){


                  if (row[7]=="si") {

                      return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado' style='background:red;color:white;'><option value='si'>CERRADO</option></select>";

                  }else{

                      return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado' style='background:green;color:white;'><option value='no'>ABIERTO</option></select>";

                  }
                  

              }else if(parametro2[2]=="radioSelectes__2"){

                  return "<div style='display:flex;'>Si&nbsp;&nbsp;<input type='radio'  class='radio__conjuntos radios_"+row[parametro3[2]]+"' name='radio__select__"+row[parametro3[2]]+"' value='A'/>&nbsp;&nbsp;No&nbsp;&nbsp;<input type='radio'  class='radio__conjuntos radios_"+row[parametro3[2]]+"' name='radio__select__"+row[parametro3[2]]+"' value='N'/></div><div style='display:flex; justify-content-center;'><button class='btn btn-primary guardar__informacion__conjuntos__radios mt-2'><i class='fa fa-floppy-o' aria-hidden='true'></i></button></div>";

              }else if(parametro2[2]=="texto__separadores__2"){

                  if (row[parametro3[2]]=="si") {

                      return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado2'><option value='si'>Si</option><option value='no'>No</option></select>";

                  }else{

                      return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado2'><option value='no'>No</option><option value='si'>Si</option></select>";

                  }

                  

              }else if(parametro2[2]=="chekeds__2"){

                  return "<input type='checkbox' class='checkeds__seleccionables' idOrganismos='"+row[parametro3[2]]+"'/>";

              }else if(parametro2[2]=="motivo__adicional"){


                  if (row[8]=="" || row[8]==" " || row[8]==undefined || row[8]==null) {

                      return " ";

                  }else{

                      return row[8];

                  }

              }else if(parametro2[4]=="chekeds__2__1"){

                  return "<input type='checkbox' class='checkeds__seleccionables__transferencias' idOrganismos='"+row[5]+"'/>";

              }else if(parametro2[2]=="motivo__adicional__2"){


                  if (row[9]=="" || row[9]==" " || row[9]==undefined || row[9]==null) {

                      return " ";

                  }else{

                      return row[9];

                  }

              }else{
                  return row[parametro3[2]];
              }

          })

      });

  }

  if (parametro1[3]!="" && parametro1[3]!=" ") {

      objeto.push({ 

          "aTargets":[parametro1[3]], 
          "mData": null,
          "mRender": (function (data, type, row) {

              if (parametro2[3]=="enlace") {

                  if (row[parametro5[3]].indexOf('.pdf') > -1){
                      return "<center><a href='"+parametro4[3]+row[parametro5[3]]+"' target='_blank'>"+row[parametro3[3]]+"</a></center>";
                  }else{
                      return "<center><a href='"+parametro4[3]+row[parametro5[3]]+".pdf' target='_blank'>"+row[parametro3[3]]+"</a></center>";
                  }

              }else if(parametro2[3]=="boton"){

                  return parametro3[3];

              }else if(parametro2[3]=="texto__separadores"){


                  if (row[parametro3[3]]!="" && row[parametro3[3]]!=null && row[parametro3[3]]!=undefined) {

                      let arr = row[parametro3[3]].split(';;;;');

                  if (arr.length>0) {

                          if (arr[0]!=undefined && arr[0]!="undefined") {

                              var primero="<div>"+arr[0]+"</div>";

                          }else{
                              primero="<div></div>";
                          }



                          if (arr[1]!=undefined && arr[1]!="undefined") {

                              var segundo="<div>"+arr[1]+"</div>";

                          }else{
                              segundo="<div></div>";
                          }



                          if (arr[2]!=undefined && arr[2]!="undefined") {

                              var tercero="<div>"+arr[2]+"</div>";

                          }else{
                              tercero="<div></div>";
                          }



                          if (arr[3]!=undefined && arr[3]!="undefined") {

                              var cuarto="<div>"+arr[3]+"</div>";

                          }else{
                              cuarto="<div></div>";
                          }



                          if (arr[4]!=undefined && arr[4]!="undefined") {

                              var quinto="<div>"+arr[4]+"</div>";

                          }else{
                              quinto="<div></div>";
                          }



                          if (arr[5]!=undefined && arr[5]!="undefined") {

                              var sexto="<div>"+arr[5]+"</div>";

                          }else{
                              sexto="<div></div>";
                          }



                          return primero+"<br>"+segundo+"<br>"+tercero+"<br>"+cuarto+"<br>"+quinto+"<br>"+sexto;

                      }else{

                          return "No asignado";

                      }                       

                  }else{

                      return "No asignado";


                  }

              }else if(parametro2[3]=="boton__2"){

                  if(row[parametro4[0]]=="Notificado por no presentación de requisitos"){

                      return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

                  }else if (row[parametro3[0]]!="" && row[parametro3[0]]!=null) {

                      return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

                  }else{

                      return "Aún no presenta los documentos";

                  }


              }else if(parametro2[3]=="texto__separadores__2"){

                  let arr = row[parametro3[3]].split('------');

                  let primero="";
                  let segundo="";
                  let tercero="";

                  if (arr[0]=="N/A"){

                       primero="";

                  }else{

                       primero="<div><a href='"+$("#filesFrontend").val()+"seguimiento/informesSeguimientos/"+arr[0]+"' target='_blank'>Presupuestario</a></div><hr>";
                      
                  }

                  if (arr[1]=="N/A"){

                       segundo="";

                  }else{

                      if (row[parametro6]=="FORMATIVO") {

                          segundo="<div><a href='"+$("#filesFrontend").val()+"seguimiento/informes__altos/"+arr[1]+"' target='_blank'>Técnico</a></div><hr>";

                      }else if(row[parametro6]=="RECREACION"){

                          segundo="<div><a href='"+$("#filesFrontend").val()+"seguimiento/informe__recreativos/"+arr[1]+"' target='_blank'>Técnico</a></div><hr>";

                      }else{

                          segundo="<div><a href='"+$("#filesFrontend").val()+"seguimiento/informes__altos/"+arr[1]+"' target='_blank'>Técnico</a></div><hr>";

                      }
                      
                  }

                  if (arr[2]=="N/A"){

                       tercero="";

                  }else{

                       tercero="<div><a href='"+$("#filesFrontend").val()+"seguimiento/informesInfraestructuras/"+arr[2]+"' target='_blank'>Infraestructura y/o mantenimiento</a></div><hr>";
                      
                  }


                  return primero+segundo+tercero;

              }else if(parametro2[3]=="enlaces__definidos__2"){

                  if (row[parametro3[3]]=="CUMPLE") {

                      return "<a href='seguimientoRecorrido' target='_blank'>ENVIADO</a>";

                  }else{
                      return "NO ENVIADO";
                  }

                  

              }else if(parametro2[3]=="texto__separadores__2"){

                  if (row[parametro3[3]]=="si") {

                      return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='si'>Si</option><option value='no'>No</option></select>";

                  }else{

                      return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='no'>No</option><option value='si'>Si</option></select>";

                  }

                  

              }else if(parametro2[3]=="texto__separadores__cierre__anio__fiscal"){


                  if (row[10]=="si") {

                      return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado' style='background:red;color:white;'><option value='si'>CERRADO</option></select>";

                  }else{

                      return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado' style='background:green;color:white;'><option value='no'>ABIERTO</option></select>";

                  }
                  

              }else if(parametro2[3]=="radioSelectes__2"){

                  return "<div style='display:flex;'>Si&nbsp;&nbsp;<input type='radio'  class='radio__conjuntos radios_"+row[parametro3[3]]+"' name='radio__select__"+row[parametro3[3]]+"' value='A'/>&nbsp;&nbsp;No&nbsp;&nbsp;<input type='radio'  class='radio__conjuntos radios_"+row[parametro3[3]]+"' name='radio__select__"+row[parametro3[3]]+"' value='N'/></div><div style='display:flex; justify-content-center;'><button class='btn btn-primary guardar__informacion__conjuntos__radios mt-2'><i class='fa fa-floppy-o' aria-hidden='true'></i></button></div>";

              }else if(parametro2[3]=="texto__separadores__2"){

                  if (row[parametro3[3]]=="si") {

                      return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='si'>Si</option><option value='no'>No</option></select>";

                  }else{

                      return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='no'>No</option><option value='si'>Si</option></select>";

                  }

                  

              }else if(parametro2[3]=="radioSelectes__2"){

                  return "<div style='display:flex;'>Si&nbsp;&nbsp;<input type='radio'  class='radio__conjuntos radios_"+row[parametro3[3]]+"' name='radio__select__"+row[parametro3[3]]+"' value='A'/>&nbsp;&nbsp;No&nbsp;&nbsp;<input type='radio'  class='radio__conjuntos radios_"+row[parametro3[3]]+"' name='radio__select__"+row[parametro3[3]]+"' value='N'/></div><div style='display:flex; justify-content-center;'><button class='btn btn-primary guardar__informacion__conjuntos__radios mt-2'><i class='fa fa-floppy-o' aria-hidden='true'></i></button></div>";

              }else if(parametro2[3]=="texto__separadores__2"){

                  if (row[parametro3[3]]=="si") {

                      return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='si'>Si</option><option value='no'>No</option></select>";

                  }else{

                      return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='no'>No</option><option value='si'>Si</option></select>";

                  }

                  

              }else if(parametro2[3]=="chekeds__2"){

                  return "<input type='checkbox' class='checkeds__seleccionables' idOrganismos='"+row[parametro3[3]]+"' attr='segundoTrimestre'/>";

              }else{
                  return row[parametro3[3]];
              }

          })

      });

  }

  
  if (parametro1[4]!="" && parametro1[4]!=" ") {

      objeto.push({ 

          "aTargets":[parametro1[4]], 
          "mData": null,
          "mRender": (function (data, type, row) {

              if (parametro2[4]=="enlace") {

                  if (row[parametro5[4]].indexOf('.pdf') > -1){
                      return "<center><a href='"+parametro4[4]+row[parametro5[4]]+"' target='_blank'>"+row[parametro3[4]]+"</a></center>";
                  }else{
                      return "<center><a href='"+parametro4[4]+row[parametro5[4]]+".pdf' target='_blank'>"+row[parametro3[4]]+"</a></center>";
                  }

              }else if(parametro2[4]=="boton"){

                  return parametro3[4];

              }else if(parametro2[4]=="texto__separadores"){


                  if (row[parametro3[4]]!="" && row[parametro3[4]]!=null && row[parametro3[4]]!=undefined) {

                      let arr = row[parametro3[4]].split(';;;;');

                  if (arr.length>0) {

                          if (arr[0]!=undefined && arr[0]!="undefined") {

                              var primero="<div>"+arr[0]+"</div>";

                          }else{
                              primero="<div></div>";
                          }



                          if (arr[1]!=undefined && arr[1]!="undefined") {

                              var segundo="<div>"+arr[1]+"</div>";

                          }else{
                              segundo="<div></div>";
                          }



                          if (arr[2]!=undefined && arr[2]!="undefined") {

                              var tercero="<div>"+arr[2]+"</div>";

                          }else{
                              tercero="<div></div>";
                          }



                          if (arr[3]!=undefined && arr[3]!="undefined") {

                              var cuarto="<div>"+arr[3]+"</div>";

                          }else{
                              cuarto="<div></div>";
                          }



                          if (arr[4]!=undefined && arr[4]!="undefined") {

                              var quinto="<div>"+arr[4]+"</div>";

                          }else{
                              quinto="<div></div>";
                          }



                          if (arr[5]!=undefined && arr[5]!="undefined") {

                              var sexto="<div>"+arr[5]+"</div>";

                          }else{
                              sexto="<div></div>";
                          }



                          return primero+"<br>"+segundo+"<br>"+tercero+"<br>"+cuarto+"<br>"+quinto+"<br>"+sexto;

                      }else{

                          return "No asignado";

                      }           
                  }else{

                      return "No asignado";


                  }

              }else if(parametro2[0]=="boton__2"){

                  if(row[parametro4[0]]=="Notificado por no presentación de requisitos"){

                      return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

                  }else if (row[parametro3[0]]!="" && row[parametro3[0]]!=null) {

                      return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

                  }else{

                      return "Aún no presenta los documentos";

                  }


              }else if(parametro2[4]=="texto__separadores__2"){

                  if (row[parametro3[4]]=="si") {

                      return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado3'><option value='si'>Si</option><option value='no'>No</option></select>";

                  }else{

                      return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado3'><option value='no'>No</option><option value='si'>Si</option></select>";

                  }

                  

              }else if(parametro2[4]=="texto__separadores__cierre__anio__fiscal"){

                  if (row[parametro3[4]]=="si") {

                      return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='si' style='background:red;color:white;'>CERRADO</option><option value='no'>No</option></select>";

                  }else{

                      return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='no' style='background:green;color:white;'>No</option><option value='si'>APERTURADO</option></select>";

                  }

                  

              }else if(parametro2[4]=="radioSelectes__2"){

                  return "<div style='display:flex;'>Si&nbsp;&nbsp;<input type='radio'  class='radio__conjuntos radios_"+row[parametro3[4]]+"' name='radio__select__"+row[parametro3[4]]+"' value='A'/>&nbsp;&nbsp;No&nbsp;&nbsp;<input type='radio'  class='radio__conjuntos radios_"+row[parametro3[4]]+"' name='radio__select__"+row[parametro3[4]]+"' value='N'/></div><div style='display:flex; justify-content-center;'><button class='btn btn-primary guardar__informacion__conjuntos__radios mt-2'><i class='fa fa-floppy-o' aria-hidden='true'></i></button></div>";

              }else if(parametro2[4]=="texto__separadores__2"){

                  if (row[parametro3[4]]=="si") {

                      return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado3'><option value='si'>Si</option><option value='no'>No</option></select>";

                  }else{

                      return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado3'><option value='no'>No</option><option value='si'>Si</option></select>";

                  }

                  

              }else if(parametro2[4]=="motivo__adicional"){

                  if (row[8]=="" || row[8]==" " || row[8]==undefined || row[8]==null) {

                      return " ";

                  }else{

                      return row[8];

                  }

                  

              }else if(parametro2[4]=="chekeds__2"){

                  return "<input type='checkbox' class='checkeds__seleccionables' idOrganismos='"+row[parametro3[4]]+"'/>";

              }else if(parametro2[4]=="chekeds__2__1"){

                  return "<input type='checkbox' class='checkeds__seleccionables__transferencias' idOrganismos='"+row[5]+"'/>";

              }else if(parametro2[4]=="chekeds__2__2"){

                  return "<input type='checkbox' class='checkeds__seleccionables__modificaciones' idOrganismos='"+row[5]+"' namesa='beck'/>";

              }else{
                  return row[parametro3[4]];
              }

          })

      });

  }



  /*=====  End of Creación de elementos  ======*/

  return objeto;

}

/*=====  End of Función de seguimientos  ======*/
