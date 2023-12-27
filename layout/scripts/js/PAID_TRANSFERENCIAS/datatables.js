var datatabletsPaidTransferenciasVacio=function(tabla,tipo,nombreDocumento,enlaceDocumento,datos,reasignacion){


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
       
      "url":"modelosBd/PAID_TRANSFERENCIAS/datatablets.PD.md.php", 
      
      "data": { 
        "tipo": tipo,
        "datos": datos
        
      }
    
      },
    
  
        "aoColumnDefs":enlaceDocumento
      
    
        
    });


    if (reasignacion[0]=="funcion__datatabletsReasignarTra__finanPAID2023") {

         
 
        funcion__datatabletsReasignarTra__finanPAID2023("#"+tipo+" tbody",table);

    }

    if (reasignacion[0]=="funcion__datatabletsReasignarTra__finan__rechazasPAID2023") {

         
 
        funcion__datatabletsReasignarTra__finan__rechazasPAID2023("#"+tipo+" tbody",table);

    }

    if (reasignacion[0]=="funcion__datatabletsReasignarTra__finanPAIDAsignaciones2023") {

         
 
        funcion__datatabletsReasignarTra__finanPAIDAsignaciones2023("#"+tipo+" tbody",table);

    }


    

    

    

    
}


/*===============================================
=            Objetos Datatables            =
===============================================*/

var objetosPaidTransferencias2023=function(parametro1,parametro2,parametro3,parametro4,parametro5,parametro6){

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





/*============================================================
=            Acciones reasignar Trans financieros            =
============================================================*/

var funcion__datatabletsReasignarTra__finanPAID2023=function(tbody,table){

    $(tbody).on("click","a.reasignarTramitesPAIDTransferencias",function(e){
  
      e.preventDefault();
  
      var data=table.row($(this).parents("tr")).data();
  
      $(".idOrganismoM").val(data[8]);
  
  
      console.log(data);
  
    
      var idOrganismo=$(".idOrganismoM").val();
  
      var fisicamenteE=$("#fisicamenteE").val();
  
      var paqueteDeDatos = new FormData();
  
      paqueteDeDatos.append('tipo','informacioSubsess__finan');
  
      paqueteDeDatos.append('idOrganismo',idOrganismo);
  
      paqueteDeDatos.append('fisicamenteE',fisicamenteE);
  
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
                  var obtenerInformacion__docus=elementos['obtenerInformacion__docus'];
                  var obtenerInformacion__docus__negados=elementos['obtenerInformacion__docus__negados'];
  
                  $(".titulo__mS").text(data[2]);
  
                  $(".contenedor__bodyCMatriz").append(' ');
  
                  $(".elementosCreados__M").remove();
  
                  $(".creados__letter").remove();
  
  
                  $(".elementosCreados__M").hide();
  
  
                  for (c of obtenerInformacion) {
  
                      $(".tabla__itemsM").append('<tr><td>'+c.idActividades+"-"+c.nombreActividades+'</td><td>'+c.itemPreesupuestario+"-"+c.nombreItem+'</td><td><center>'+parseFloat(c.enero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.febrero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.marzo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.abril).toFixed(2)+'</center></td><td><center>'+parseFloat(c.mayo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.junio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.julio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.agosto).toFixed(2)+'</center></td><td><center>'+parseFloat(c.septiembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.octubre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.noviembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.diciembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.totalSumaItem).toFixed(2)+'</center></td></tr>');
  
  
                  }
  
                  execelGenerados($(".excelProyectos"),"tablaPoaPrincipal","poa");
  
                  verOjoContrasenas2($(".ver__Tabla"),$(".icono__boton"),$(".elementosCreados__M"),$(".letras__ver__poa"));
  
                  $(".contenedor__bodyCMatriz").append('<div class="col col-12 text-center" style="font-weight:bold;">Documentos a analizar</div>');
  
                  if($("#idRolAd").val()!=3){
  
                      for (d of obtenerInformacion__docus) {
  
                          $(".contenedor__bodyCMatriz").append('<a class="col col-12 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/polizaOriginal/'+d.polizaOriginal+'" target="_blank">1) Póliza original con vigencia de por lo menos 18 meses, garantizando mínimo el 10% del recurso aprobado;</a>');
  
                          $(".contenedor__bodyCMatriz").append('<a class="col col-12 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/caucionOrginal/'+d.caucionOrginal+'" target="_blank">2) Caución original con vigencia de por lo menos 18 meses, garantizando mínimo el 10% del recurso aprobado;</a>');
  
                          $(".contenedor__bodyCMatriz").append('<a class="col col-12 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/copiaCertificadoBancario/'+d.copiaCertificadoBancario+'" target="_blank">3) Copia del certificado bancario;</a>');
  
                          $(".contenedor__bodyCMatriz").append('<a class="col col-12 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/copiaRegistroD/'+d.copiaRegistroD+'" target="_blank">4) Copia de registro de Directorio actualizado y vigente;</a>');
  
                          if (d.copia_adminFinanciero!="" && d.copia_adminFinanciero!=null) {
                              $(".contenedor__bodyCMatriz").append('<a class="col col-12 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/copia_adminFinanciero/'+d.copia_adminFinanciero+'" target="_blank">5) Copia del registro de Administrador Financiero actualizado y vigente, solo si aplica;</a>');
                          }
  
                          if (d.copia_adminGeneral!="" && d.copia_adminGeneral!=null) {
                              $(".contenedor__bodyCMatriz").append('<a class="col col-12 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/copia_adminGeneral/'+d.copia_adminGeneral+'" target="_blank">6) Copia del registro de Administrador General actualizado y vigente; solo si aplica;</a>');
                          }
  
                          if (d.copia__registroIn!="" && d.copia__registroIn!=null) {
                              $(".contenedor__bodyCMatriz").append('<a class="col col-12 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/copia__registroIn/'+d.copia__registroIn+'" target="_blank">7) Copia del registro de Intervención actualizado y vigente, solo si aplica;</a>');
                          }
                          
                          $(".contenedor__bodyCMatriz").append('<a class="col col-12 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/copia_acuerdoRegistro/'+d.copia_acuerdoRegistro+'" target="_blank">8) Copia del Acuerdo de registro de estatutos vigente;</a>');
  
                          $(".contenedor__bodyCMatriz").append('<a class="col col-12 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/copia_ruc/'+d.copia_ruc+'" target="_blank">9) Copia del RUC actualizado, vigente y activo;</a>');
  
  
                      }
  
                  }else{
  
                      for (d of obtenerInformacion__docus) {
  
                          $(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/polizaOriginal/'+d.polizaOriginal+'" target="_blank">1) Póliza original con vigencia de por lo menos 18 meses, garantizando mínimo el 10% del recurso aprobado;</a><select class="col col-2" id="polizaOriginal" name="polizaOriginal"><option value="A">Aprobar</option><option value="r">Rechazar</option></select><textarea class="col col-4" id="observa__polizaOriginal" name="observa__polizaOriginal" placeholder="Ingrese observaciones en caso de rechazo o de requerirlo"></textarea></div>');
  
                          $(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/caucionOrginal/'+d.caucionOrginal+'" target="_blank">2) Caución original con vigencia de por lo menos 18 meses, garantizando mínimo el 10% del recurso aprobado;</a><select class="col col-2" id="caucionOrginal" name="caucionOrginal"><option value="A">Aprobar</option><option value="r">Rechazar</option></select><textarea class="col col-4" id="observa__caucionOrginal" name="observa__caucionOrginal" placeholder="Ingrese observaciones en caso de rechazo o de requerirlo"></textarea></div>');
  
                          $(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/copiaCertificadoBancario/'+d.copiaCertificadoBancario+'" target="_blank">3) Copia del certificado bancario;</a><select class="col col-2" id="copiaCertificadoBancario" name="copiaCertificadoBancario"><option value="A">Aprobar</option><option value="r">Rechazar</option></select><textarea class="col col-4" id="observa__copiaCertificadoBancario" name="observa__copiaCertificadoBancario" placeholder="Ingrese observaciones en caso de rechazo o de requerirlo"></textarea></div>');
  
                          $(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/copiaRegistroD/'+d.copiaRegistroD+'" target="_blank">4) Copia de registro de Directorio actualizado y vigente;</a><select class="col col-2" id="copiaRegistroD" name="copiaRegistroD"><option value="A">Aprobar</option><option value="r">Rechazar</option></select><textarea class="col col-4" id="observa__copiaRegistroD" name="observa__copiaRegistroD" placeholder="Ingrese observaciones en caso de rechazo o de requerirlo"></textarea></div>');
  
                          if (d.copia_adminFinanciero!="" && d.copia_adminFinanciero!=null) {
                              $(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/copia_adminFinanciero/'+d.copia_adminFinanciero+'" target="_blank">5) Copia del registro de Administrador Financiero actualizado y vigente, solo si aplica;</a><select class="col col-2" id="copia_adminFinanciero" name="copia_adminFinanciero"><option value="A">Aprobar</option><option value="r">Rechazar</option></select><textarea class="col col-4" id="observa__copia_adminFinanciero" name="observa__copia_adminFinanciero" placeholder="Ingrese observaciones en caso de rechazo o de requerirlo"></textarea></div>');
                          }
  
                          if (d.copia_adminGeneral!="" && d.copia_adminGeneral!=null) {
                              $(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/copia_adminGeneral/'+d.copia_adminGeneral+'" target="_blank">6) Copia del registro de Administrador General actualizado y vigente; solo si aplica;</a><select class="col col-2" id="copia_adminGeneral" name="copia_adminGeneral"><option value="A">Aprobar</option><option value="r">Rechazar</option></select><textarea class="col col-4" id="observa__copia_adminGeneral" name="observa__copia_adminGeneral" placeholder="Ingrese observaciones en caso de rechazo o de requerirlo"></textarea></div>');
                          }
  
                          if (d.copia__registroIn!="" && d.copia__registroIn!=null) {
                              $(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/copia__registroIn/'+d.copia__registroIn+'" target="_blank">7) Copia del registro de Intervención actualizado y vigente, solo si aplica;</a><select class="col col-2" id="copia__registroIn" name="copia__registroIn"><option value="A">Aprobar</option><option value="r">Rechazar</option></select><textarea class="col col-4" id="observa__copia__registroIn" name="observa__copia__registroIn" placeholder="Ingrese observaciones en caso de rechazo o de requerirlo"></textarea></div>');
                          }
                          
                          $(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/copia_acuerdoRegistro/'+d.copia_acuerdoRegistro+'" target="_blank">8) Copia del Acuerdo de registro de estatutos vigente;</a><select class="col col-2" id="copia_acuerdoRegistro" name="copia_acuerdoRegistro"><option value="A">Aprobar</option><option value="r">Rechazar</option></select><textarea class="col col-4" id="observa__copia_acuerdoRegistro" name="observa__copia_acuerdoRegistro" placeholder="Ingrese observaciones en caso de rechazo o de requerirlo"></textarea></div>');
  
                          $(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/copia_ruc/'+d.copia_ruc+'" target="_blank">9) Copia del RUC actualizado, vigente y activo;</a><select class="col col-2" id="copia_ruc" name="copia_ruc"><option value="A">Aprobar</option><option value="r">Rechazar</option></select><textarea class="col col-4" id="observa__copia_ruc" name="observa__copia_ruc" placeholder="Ingrese observaciones en caso de rechazo o de requerirlo"></textarea></div>');
  
  
                          if (obtenerInformacion__docus__negados!="no") {
  
                              for (w of obtenerInformacion__docus__negados) {
  
                                  if (w.polizaOriginal=="p") {
                                      $("#polizaOriginal").val("r");
                                  }else{
                                      $("#polizaOriginal").val(w.polizaOriginal);
                                  }
                                  $("#observa__polizaOriginal").val(w.observa__polizaOriginal);
  
                                  if (w.caucionOrginal=="p") {
                                      $("#caucionOrginal").val("r");
                                  }else{
                                      $("#caucionOrginal").val(w.caucionOrginal);
                                  }
                                  $("#observa__caucionOrginal").val(w.observa__caucionOrginal);
  
  
                                  if (w.copiaCertificadoBancario=="p") {
                                      $("#copiaCertificadoBancario").val("r");
                                  }else{
                                      $("#copiaCertificadoBancario").val(w.copiaCertificadoBancario);
                                  }
                                  $("#observa__copiaCertificadoBancario").val(w.observa__copiaCertificadoBancario);
  
                                  if (w.copiaRegistroD=="p") {
                                      $("#copiaRegistroD").val("r");
                                  }else{
                                      $("#copiaRegistroD").val(w.copiaRegistroD);
                                  }
                                  $("#observa__copiaRegistroD").val(w.observa__copiaRegistroD);
  
                                  if (w.copia_adminFinanciero=="p") {
                                      $("#copia_adminFinanciero").val("r");
                                  }else{
                                      $("#copia_adminFinanciero").val(w.copia_adminFinanciero);
                                  }
                                  $("#observa__copia_adminFinanciero").val(w.observa__copia_adminFinanciero);
  
                                  if (w.copia_adminGeneral=="p") {
                                      $("#copia_adminGeneral").val("r");
                                  }else{
                                      $("#copia_adminGeneral").val(w.copia_adminGeneral);
                                  }
                                  $("#observa__copia_adminGeneral").val(w.observa__copia_adminGeneral);
  
                                  if (w.copia__registroIn=="p") {
                                      $("#copia__registroIn").val("r");
                                  }else{
                                      $("#copia__registroIn").val(w.copia__registroIn);
                                  }
                                  $("#observa__copia__registroIn").val(w.observa__copia__registroIn);
  
  
                                  if (w.copia_acuerdoRegistro=="p") {
                                      $("#copia_acuerdoRegistro").val("r");
                                  }else{
                                      $("#copia_acuerdoRegistro").val(w.copia_acuerdoRegistro);
                                  }
                                  $("#observa__copia_acuerdoRegistro").val(w.observa__copia_acuerdoRegistro);
                                  
  
                                  if (w.copia_ruc=="p") {
                                      $("#copia_ruc").val("r");
                                  }else{
                                      $("#copia_ruc").val(w.copia_ruc);
                                  }
                                  $("#observa__copia_ruc").val(w.observa__copia_ruc);
  
  
                              }
  
                          }
  
  
                      }
  
  
                  }
  
  
                  var idRolE=$("#idRolAd").val();
  
                  if($("#idRolAd").val()==2){
  
                      $(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');
  
                      subsecretarias__finanA__c($(".alto__fisiR"),$("#idUsuarioC").val(),"insta");
  
                      var tipo__enviados="inserta__funcionario__finan";
  
                      enviarTramitesGenerados__financieros($("#enviarTramite__Financiero"),[$("#idOrganismoM").val(),$("#fisicamenteE").val(),$("#idUsuarioC").val(),variableF],variableF,tipo__enviados);
  
                  }else if($("#idRolAd").val()==4){
  
  
                      $(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');
  
                      subsecretarias__finanA__c__c($(".alto__fisiR"),$("#idUsuarioC").val(),"insta");
  
                      var tipo__enviados="inserta__funcionario__finan__coordinas";
  
  
  
                  }else if($("#idRolAd").val()==3){
  
                      $(".contenedor__bodyCMatriz").append('<br><br><div class="col col-8 text-center d d-flex justify-content-center align-items:center" style="font-weight:bold">Si desea devolver el trámite dar click en el check&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="checksDesicion" name="checksDesicion" style="width:20px; height:20px;"></div><br><br>');
  
                      $(".contenedor__bodyCMatriz").append('<div class="col col-12 row contenedor__reasignaciones"><div class="col col-4 text-center" style="font-weight:bold;">Regresar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div></div>');
  
                      $(".contenedor__reasignaciones").hide();
  
                      checkboxFunciones($("#checksDesicion"),$(".contenedor__reasignaciones"),$(".bloques__financieros__documentos"));
  
                      subsecretarias__finanA__c__a($(".alto__fisiR"),$("#idUsuarioC").val(),"insta");
  
                      var tipo__enviados="inserta__funcionario__finan__funcionarios";
  
                  }
  
                  $(".alto__fisiR").change(function (e){
  
                      $("#texto__finan").val($(this).val());
  
                  });
  
                  var variableF=$("#texto__finan").val();
  
                  enviarTramitesGenerados__financieros($("#enviarTramite__Financiero"),[$("#idOrganismoM").val(),$("#fisicamenteE").val(),$("#idUsuarioC").val(),variableF],variableF,tipo__enviados);
  
  
                  
              });
  
          },
          error:function(){
  
          }
                  
      });     
  
  
  
    });
  
  }
  
  /*=====  End of Acciones reasignar Trans financieros  ======*/

/*============================================================
=            Acciones reasignar Trans financieros            =
============================================================*/

var funcion__datatabletsReasignarTra__finanPAIDAsignaciones2023=function(tbody,table){

    $(tbody).on("click","a.reasignarTramitesPAIDTransferencias",function(e){
  
      e.preventDefault();
  
      var data=table.row($(this).parents("tr")).data();
  
      $(".idOrganismoM").val(data[10]);
  
  
      console.log(data);
  
    
      var idOrganismo=$(".idOrganismoM").val();
  
      var fisicamenteE=$("#fisicamenteE").val();
  
      var paqueteDeDatos = new FormData();
  
      paqueteDeDatos.append('tipo','informacioSubsess__finan');
  
      paqueteDeDatos.append('idOrganismo',idOrganismo);
  
      paqueteDeDatos.append('fisicamenteE',fisicamenteE);
  
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
                  var obtenerInformacion__docus=elementos['obtenerInformacion__docus'];
                  var obtenerInformacion__docus__negados=elementos['obtenerInformacion__docus__negados'];
  
                  $(".titulo__mS").text(data[2]);
  
                  $(".contenedor__bodyCMatriz").append(' ');
  
                  $(".elementosCreados__M").remove();
  
                  $(".creados__letter").remove();
  
  
                  $(".elementosCreados__M").hide();
  
  
                  for (c of obtenerInformacion) {
  
                      $(".tabla__itemsM").append('<tr><td>'+c.idActividades+"-"+c.nombreActividades+'</td><td>'+c.itemPreesupuestario+"-"+c.nombreItem+'</td><td><center>'+parseFloat(c.enero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.febrero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.marzo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.abril).toFixed(2)+'</center></td><td><center>'+parseFloat(c.mayo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.junio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.julio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.agosto).toFixed(2)+'</center></td><td><center>'+parseFloat(c.septiembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.octubre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.noviembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.diciembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.totalSumaItem).toFixed(2)+'</center></td></tr>');
  
  
                  }
  
                  execelGenerados($(".excelProyectos"),"tablaPoaPrincipal","poa");
  
                  verOjoContrasenas2($(".ver__Tabla"),$(".icono__boton"),$(".elementosCreados__M"),$(".letras__ver__poa"));
  
                  $(".contenedor__bodyCMatriz").append('<div class="col col-12 text-center" style="font-weight:bold;">Documentos a analizar</div>');
  
                  if($("#idRolAd").val()!=3){
  
                      for (d of obtenerInformacion__docus) {
  
                          $(".contenedor__bodyCMatriz").append('<a class="col col-12 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/polizaOriginal/'+d.polizaOriginal+'" target="_blank">1) Póliza original con vigencia de por lo menos 18 meses, garantizando mínimo el 10% del recurso aprobado;</a>');
  
                          $(".contenedor__bodyCMatriz").append('<a class="col col-12 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/caucionOrginal/'+d.caucionOrginal+'" target="_blank">2) Caución original con vigencia de por lo menos 18 meses, garantizando mínimo el 10% del recurso aprobado;</a>');
  
                          $(".contenedor__bodyCMatriz").append('<a class="col col-12 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/copiaCertificadoBancario/'+d.copiaCertificadoBancario+'" target="_blank">3) Copia del certificado bancario;</a>');
  
                          $(".contenedor__bodyCMatriz").append('<a class="col col-12 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/copiaRegistroD/'+d.copiaRegistroD+'" target="_blank">4) Copia de registro de Directorio actualizado y vigente;</a>');
  
                          if (d.copia_adminFinanciero!="" && d.copia_adminFinanciero!=null) {
                              $(".contenedor__bodyCMatriz").append('<a class="col col-12 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/copia_adminFinanciero/'+d.copia_adminFinanciero+'" target="_blank">5) Copia del registro de Administrador Financiero actualizado y vigente, solo si aplica;</a>');
                          }
  
                          if (d.copia_adminGeneral!="" && d.copia_adminGeneral!=null) {
                              $(".contenedor__bodyCMatriz").append('<a class="col col-12 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/copia_adminGeneral/'+d.copia_adminGeneral+'" target="_blank">6) Copia del registro de Administrador General actualizado y vigente; solo si aplica;</a>');
                          }
  
                          if (d.copia__registroIn!="" && d.copia__registroIn!=null) {
                              $(".contenedor__bodyCMatriz").append('<a class="col col-12 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/copia__registroIn/'+d.copia__registroIn+'" target="_blank">7) Copia del registro de Intervención actualizado y vigente, solo si aplica;</a>');
                          }
                          
                          $(".contenedor__bodyCMatriz").append('<a class="col col-12 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/copia_acuerdoRegistro/'+d.copia_acuerdoRegistro+'" target="_blank">8) Copia del Acuerdo de registro de estatutos vigente;</a>');
  
                          $(".contenedor__bodyCMatriz").append('<a class="col col-12 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/copia_ruc/'+d.copia_ruc+'" target="_blank">9) Copia del RUC actualizado, vigente y activo;</a>');
  
  
                      }
  
                  }else{
  
                      for (d of obtenerInformacion__docus) {
  
                          $(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/polizaOriginal/'+d.polizaOriginal+'" target="_blank">1) Póliza original con vigencia de por lo menos 18 meses, garantizando mínimo el 10% del recurso aprobado;</a><select class="col col-2" id="polizaOriginal" name="polizaOriginal"><option value="A">Aprobar</option><option value="r">Rechazar</option></select><textarea class="col col-4" id="observa__polizaOriginal" name="observa__polizaOriginal" placeholder="Ingrese observaciones en caso de rechazo o de requerirlo"></textarea></div>');
  
                          $(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/caucionOrginal/'+d.caucionOrginal+'" target="_blank">2) Caución original con vigencia de por lo menos 18 meses, garantizando mínimo el 10% del recurso aprobado;</a><select class="col col-2" id="caucionOrginal" name="caucionOrginal"><option value="A">Aprobar</option><option value="r">Rechazar</option></select><textarea class="col col-4" id="observa__caucionOrginal" name="observa__caucionOrginal" placeholder="Ingrese observaciones en caso de rechazo o de requerirlo"></textarea></div>');
  
                          $(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/copiaCertificadoBancario/'+d.copiaCertificadoBancario+'" target="_blank">3) Copia del certificado bancario;</a><select class="col col-2" id="copiaCertificadoBancario" name="copiaCertificadoBancario"><option value="A">Aprobar</option><option value="r">Rechazar</option></select><textarea class="col col-4" id="observa__copiaCertificadoBancario" name="observa__copiaCertificadoBancario" placeholder="Ingrese observaciones en caso de rechazo o de requerirlo"></textarea></div>');
  
                          $(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/copiaRegistroD/'+d.copiaRegistroD+'" target="_blank">4) Copia de registro de Directorio actualizado y vigente;</a><select class="col col-2" id="copiaRegistroD" name="copiaRegistroD"><option value="A">Aprobar</option><option value="r">Rechazar</option></select><textarea class="col col-4" id="observa__copiaRegistroD" name="observa__copiaRegistroD" placeholder="Ingrese observaciones en caso de rechazo o de requerirlo"></textarea></div>');
  
                          if (d.copia_adminFinanciero!="" && d.copia_adminFinanciero!=null) {
                              $(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/copia_adminFinanciero/'+d.copia_adminFinanciero+'" target="_blank">5) Copia del registro de Administrador Financiero actualizado y vigente, solo si aplica;</a><select class="col col-2" id="copia_adminFinanciero" name="copia_adminFinanciero"><option value="A">Aprobar</option><option value="r">Rechazar</option></select><textarea class="col col-4" id="observa__copia_adminFinanciero" name="observa__copia_adminFinanciero" placeholder="Ingrese observaciones en caso de rechazo o de requerirlo"></textarea></div>');
                          }
  
                          if (d.copia_adminGeneral!="" && d.copia_adminGeneral!=null) {
                              $(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/copia_adminGeneral/'+d.copia_adminGeneral+'" target="_blank">6) Copia del registro de Administrador General actualizado y vigente; solo si aplica;</a><select class="col col-2" id="copia_adminGeneral" name="copia_adminGeneral"><option value="A">Aprobar</option><option value="r">Rechazar</option></select><textarea class="col col-4" id="observa__copia_adminGeneral" name="observa__copia_adminGeneral" placeholder="Ingrese observaciones en caso de rechazo o de requerirlo"></textarea></div>');
                          }
  
                          if (d.copia__registroIn!="" && d.copia__registroIn!=null) {
                              $(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/copia__registroIn/'+d.copia__registroIn+'" target="_blank">7) Copia del registro de Intervención actualizado y vigente, solo si aplica;</a><select class="col col-2" id="copia__registroIn" name="copia__registroIn"><option value="A">Aprobar</option><option value="r">Rechazar</option></select><textarea class="col col-4" id="observa__copia__registroIn" name="observa__copia__registroIn" placeholder="Ingrese observaciones en caso de rechazo o de requerirlo"></textarea></div>');
                          }
                          
                          $(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/copia_acuerdoRegistro/'+d.copia_acuerdoRegistro+'" target="_blank">8) Copia del Acuerdo de registro de estatutos vigente;</a><select class="col col-2" id="copia_acuerdoRegistro" name="copia_acuerdoRegistro"><option value="A">Aprobar</option><option value="r">Rechazar</option></select><textarea class="col col-4" id="observa__copia_acuerdoRegistro" name="observa__copia_acuerdoRegistro" placeholder="Ingrese observaciones en caso de rechazo o de requerirlo"></textarea></div>');
  
                          $(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/copia_ruc/'+d.copia_ruc+'" target="_blank">9) Copia del RUC actualizado, vigente y activo;</a><select class="col col-2" id="copia_ruc" name="copia_ruc"><option value="A">Aprobar</option><option value="r">Rechazar</option></select><textarea class="col col-4" id="observa__copia_ruc" name="observa__copia_ruc" placeholder="Ingrese observaciones en caso de rechazo o de requerirlo"></textarea></div>');
  
  
                          if (obtenerInformacion__docus__negados!="no") {
  
                              for (w of obtenerInformacion__docus__negados) {
  
                                  if (w.polizaOriginal=="p") {
                                      $("#polizaOriginal").val("r");
                                  }else{
                                      $("#polizaOriginal").val(w.polizaOriginal);
                                  }
                                  $("#observa__polizaOriginal").val(w.observa__polizaOriginal);
  
                                  if (w.caucionOrginal=="p") {
                                      $("#caucionOrginal").val("r");
                                  }else{
                                      $("#caucionOrginal").val(w.caucionOrginal);
                                  }
                                  $("#observa__caucionOrginal").val(w.observa__caucionOrginal);
  
  
                                  if (w.copiaCertificadoBancario=="p") {
                                      $("#copiaCertificadoBancario").val("r");
                                  }else{
                                      $("#copiaCertificadoBancario").val(w.copiaCertificadoBancario);
                                  }
                                  $("#observa__copiaCertificadoBancario").val(w.observa__copiaCertificadoBancario);
  
                                  if (w.copiaRegistroD=="p") {
                                      $("#copiaRegistroD").val("r");
                                  }else{
                                      $("#copiaRegistroD").val(w.copiaRegistroD);
                                  }
                                  $("#observa__copiaRegistroD").val(w.observa__copiaRegistroD);
  
                                  if (w.copia_adminFinanciero=="p") {
                                      $("#copia_adminFinanciero").val("r");
                                  }else{
                                      $("#copia_adminFinanciero").val(w.copia_adminFinanciero);
                                  }
                                  $("#observa__copia_adminFinanciero").val(w.observa__copia_adminFinanciero);
  
                                  if (w.copia_adminGeneral=="p") {
                                      $("#copia_adminGeneral").val("r");
                                  }else{
                                      $("#copia_adminGeneral").val(w.copia_adminGeneral);
                                  }
                                  $("#observa__copia_adminGeneral").val(w.observa__copia_adminGeneral);
  
                                  if (w.copia__registroIn=="p") {
                                      $("#copia__registroIn").val("r");
                                  }else{
                                      $("#copia__registroIn").val(w.copia__registroIn);
                                  }
                                  $("#observa__copia__registroIn").val(w.observa__copia__registroIn);
  
  
                                  if (w.copia_acuerdoRegistro=="p") {
                                      $("#copia_acuerdoRegistro").val("r");
                                  }else{
                                      $("#copia_acuerdoRegistro").val(w.copia_acuerdoRegistro);
                                  }
                                  $("#observa__copia_acuerdoRegistro").val(w.observa__copia_acuerdoRegistro);
                                  
  
                                  if (w.copia_ruc=="p") {
                                      $("#copia_ruc").val("r");
                                  }else{
                                      $("#copia_ruc").val(w.copia_ruc);
                                  }
                                  $("#observa__copia_ruc").val(w.observa__copia_ruc);
  
  
                              }
  
                          }
  
  
                      }
  
  
                  }
  
  
                  var idRolE=$("#idRolAd").val();
  
                  if($("#idRolAd").val()==2){
  
                      $(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');
  
                      subsecretarias__finanA__c($(".alto__fisiR"),$("#idUsuarioC").val(),"insta");
  
                      var tipo__enviados="inserta__funcionario__finan";
  
                      enviarTramitesGenerados__financieros($("#enviarTramite__Financiero"),[$("#idOrganismoM").val(),$("#fisicamenteE").val(),$("#idUsuarioC").val(),variableF],variableF,tipo__enviados);
  
                  }else if($("#idRolAd").val()==4){
  
  
                      $(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');
  
                      subsecretarias__finanA__c__c($(".alto__fisiR"),$("#idUsuarioC").val(),"insta");
  
                      var tipo__enviados="inserta__funcionario__finan__coordinas";
  
  
  
                  }else if($("#idRolAd").val()==3){
  
                      $(".contenedor__bodyCMatriz").append('<br><br><div class="col col-8 text-center d d-flex justify-content-center align-items:center" style="font-weight:bold">Si desea devolver el trámite dar click en el check&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="checksDesicion" name="checksDesicion" style="width:20px; height:20px;"></div><br><br>');
  
                      $(".contenedor__bodyCMatriz").append('<div class="col col-12 row contenedor__reasignaciones"><div class="col col-4 text-center" style="font-weight:bold;">Regresar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div></div>');
  
                      $(".contenedor__reasignaciones").hide();
  
                      checkboxFunciones($("#checksDesicion"),$(".contenedor__reasignaciones"),$(".bloques__financieros__documentos"));
  
                      subsecretarias__finanA__c__a($(".alto__fisiR"),$("#idUsuarioC").val(),"insta");
  
                      var tipo__enviados="inserta__funcionario__finan__funcionarios";
  
                  }
  
                  $(".alto__fisiR").change(function (e){
  
                      $("#texto__finan").val($(this).val());
  
                  });
  
                  var variableF=$("#texto__finan").val();
  
                  enviarTramitesGenerados__financieros($("#enviarTramite__Financiero"),[$("#idOrganismoM").val(),$("#fisicamenteE").val(),$("#idUsuarioC").val(),variableF],variableF,tipo__enviados);
  
  
                  
              });
  
          },
          error:function(){
  
          }
                  
      });     
  
  
  
    });
  
  }
  
  /*=====  End of Acciones reasignar Trans financieros  ======*/
  
/*=====================================================
=            Acciones rechazar financieras            =
=====================================================*/

var funcion__datatabletsReasignarTra__finan__rechazasPAID2023=function(tbody,table,parametro3,parametro4,parametro5){

    $(tbody).on("click","a.reasignarTramitesPAIDTransferencias",function(e){
  
      e.preventDefault();
  
      var data=table.row($(this).parents("tr")).data();
  
      $(".idOrganismoM").val(data[8]);
  
      $("#enviarTramite__Financiero__rechazos").hide();
  
  
      console.log(data);
  
    
      var idOrganismo=$(".idOrganismoM").val();
  
      var fisicamenteE=$("#fisicamenteE").val();
  
      var paqueteDeDatos = new FormData();
  
      paqueteDeDatos.append('tipo','informacioSubsess__finan__rechazos');
  
      paqueteDeDatos.append('idOrganismo',idOrganismo);
  
      paqueteDeDatos.append('fisicamenteE',fisicamenteE);
  
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
                  var obtenerInformacion__docus=elementos['obtenerInformacion__docus'];
                  var obtenerInformacion__docus__observas=elementos['obtenerInformacion__docus__observas'];
  
                  $(".titulo__mS").text(data[2]);
  
                  $(".contenedor__bodyCMatriz").append(' ');
  
                  $(".elementosCreados__M").remove();
  
                  $(".creados__letter").remove();

                  $(".elementosCreados__M").hide();
  
  
                  for (c of obtenerInformacion) {
  
                      $(".tabla__itemsM").append('<tr><td>'+c.idActividades+"-"+c.nombreActividades+'</td><td>'+c.itemPreesupuestario+"-"+c.nombreItem+'</td><td><center>'+parseFloat(c.enero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.febrero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.marzo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.abril).toFixed(2)+'</center></td><td><center>'+parseFloat(c.mayo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.junio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.julio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.agosto).toFixed(2)+'</center></td><td><center>'+parseFloat(c.septiembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.octubre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.noviembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.diciembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.totalSumaItem).toFixed(2)+'</center></td></tr>');
  
  
                  }
  
                  execelGenerados($(".excelProyectos"),"tablaPoaPrincipal","poa");
  
                  verOjoContrasenas2($(".ver__Tabla"),$(".icono__boton"),$(".elementosCreados__M"),$(".letras__ver__poa"));
  
                  $(".contenedor__bodyCMatriz").append('<div class="col col-12 text-center" style="font-weight:bold;">Documentos</div>');
  
      
                  for (d of obtenerInformacion__docus) {
  
                      $(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/polizaOriginal/'+d.polizaOriginal+'" target="_blank">1) Póliza original con vigencia de por lo menos 18 meses, garantizando mínimo el 10% del recurso aprobado;</a><select style="border:none!important;" disabled="disabled" class="col col-2" id="polizaOriginal" name="polizaOriginal"><option value="A">Aprobado</option><option value="r">Rechazado</option><option value="p">Rechazado</option></select style="border:none!important;" disabled="disabled"><textarea style="border:none!important;" disabled="disabled" class="col col-4" id="observa__polizaOriginal" name="observa__polizaOriginal" ></textarea style="border:none!important;" disabled="disabled"></div>');
  
                      $(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/caucionOrginal/'+d.caucionOrginal+'" target="_blank">2) Caución original con vigencia de por lo menos 18 meses, garantizando mínimo el 10% del recurso aprobado;</a><select style="border:none!important;" disabled="disabled" class="col col-2" id="caucionOrginal" name="caucionOrginal"><option value="A">Aprobado</option><option value="r">Rechazado</option><option value="p">Rechazado</option></select style="border:none!important;" disabled="disabled"><textarea style="border:none!important;" disabled="disabled" class="col col-4" id="observa__caucionOrginal" name="observa__caucionOrginal" ></textarea style="border:none!important;" disabled="disabled"></div>');
  
                      $(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/copiaCertificadoBancario/'+d.copiaCertificadoBancario+'" target="_blank">3) Copia del certificado bancario;</a><select style="border:none!important;" disabled="disabled" class="col col-2" id="copiaCertificadoBancario" name="copiaCertificadoBancario"><option value="A">Aprobado</option><option value="r">Rechazado</option><option value="p">Rechazado</option></select style="border:none!important;" disabled="disabled"><textarea style="border:none!important;" disabled="disabled" class="col col-4" id="observa__copiaCertificadoBancario" name="observa__copiaCertificadoBancario" ></textarea style="border:none!important;" disabled="disabled"></div>');
  
                      $(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/copiaRegistroD/'+d.copiaRegistroD+'" target="_blank">4) Copia de registro de Directorio actualizado y vigente;</a><select style="border:none!important;" disabled="disabled" class="col col-2" id="copiaRegistroD" name="copiaRegistroD"><option value="A">Aprobado</option><option value="r">Rechazado</option><option value="p">Rechazado</option></select style="border:none!important;" disabled="disabled"><textarea style="border:none!important;" disabled="disabled" class="col col-4" id="observa__copiaRegistroD" name="observa__copiaRegistroD" ></textarea style="border:none!important;" disabled="disabled"></div>');
  
                      if (d.copia_adminFinanciero!="" && d.copia_adminFinanciero!=null) {
                          
                          $(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/copia_adminFinanciero/'+d.copia_adminFinanciero+'" target="_blank">5) Copia del registro de Administrador Financiero actualizado y vigente, solo si aplica;</a><select style="border:none!important;" disabled="disabled" class="col col-2" id="copia_adminFinanciero" name="copia_adminFinanciero"><option value="A">Aprobado</option><option value="r">Rechazado</option><option value="p">Rechazado</option></select style="border:none!important;" disabled="disabled"><textarea style="border:none!important;" disabled="disabled" class="col col-4" id="observa__copia_adminFinanciero" name="observa__copia_adminFinanciero" ></textarea style="border:none!important;" disabled="disabled"></div>');
                      }
  
                      if (d.copia_adminGeneral!="" && d.copia_adminGeneral!=null) {
                          
                          $(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/copia_adminGeneral/'+d.copia_adminGeneral+'" target="_blank">6) Copia del registro de Administrador General actualizado y vigente; solo si aplica;</a><select style="border:none!important;" disabled="disabled" class="col col-2" id="copia_adminGeneral" name="copia_adminGeneral"><option value="A">Aprobado</option><option value="r">Rechazado</option><option value="p">Rechazado</option></select style="border:none!important;" disabled="disabled"><textarea style="border:none!important;" disabled="disabled" class="col col-4" id="observa__copia_adminGeneral" name="observa__copia_adminGeneral" ></textarea style="border:none!important;" disabled="disabled"></div>');
                      }
  
                      if (d.copia__registroIn!="" && d.copia__registroIn!=null) {
                          
                          $(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/copia__registroIn/'+d.copia__registroIn+'" target="_blank">7) Copia del registro de Intervención actualizado y vigente, solo si aplica;</a><select style="border:none!important;" disabled="disabled" class="col col-2" id="copia__registroIn" name="copia__registroIn"><option value="A">Aprobado</option><option value="r">Rechazado</option><option value="p">Rechazado</option></select style="border:none!important;" disabled="disabled"><textarea style="border:none!important;" disabled="disabled" class="col col-4" id="observa__copia__registroIn" name="observa__copia__registroIn" ></textarea style="border:none!important;" disabled="disabled"></div>');
                      }
                          
                      $(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/copia_acuerdoRegistro/'+d.copia_acuerdoRegistro+'" target="_blank">8) Copia del Acuerdo de registro de estatutos vigente;</a><select style="border:none!important;" disabled="disabled" class="col col-2" id="copia_acuerdoRegistro" name="copia_acuerdoRegistro"><option value="A">Aprobado</option><option value="r">Rechazado</option><option value="p">Rechazado</option></select style="border:none!important;" disabled="disabled"><textarea style="border:none!important;" disabled="disabled" class="col col-4" id="observa__copia_acuerdoRegistro" name="observa__copia_acuerdoRegistro" ></textarea style="border:none!important;" disabled="disabled"></div>');
  
                      $(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="'+$("#filesFrontend").val()+'financiero/copia_ruc/'+d.copia_ruc+'" target="_blank">9) Copia del RUC actualizado, vigente y activo;</a><select style="border:none!important;" disabled="disabled" class="col col-2" id="copia_ruc" name="copia_ruc"><option value="A">Aprobado</option><option value="r">Rechazado</option><option value="p">Rechazado</option></select style="border:none!important;" disabled="disabled"><textarea style="border:none!important;" disabled="disabled" class="col col-4" id="observa__copia_ruc" name="observa__copia_ruc" ></textarea style="border:none!important;" disabled="disabled"></div>');
  
                  }
  
                  for (c of obtenerInformacion__docus__observas) {
  
                      $("#polizaOriginal").val(c.polizaOriginal);
                      $("#caucionOrginal").val(c.caucionOrginal);
                      $("#copiaCertificadoBancario").val(c.copiaCertificadoBancario);
                      $("#copiaRegistroD").val(c.copiaRegistroD);
                      $("#copia_adminFinanciero").val(c.copia_adminFinanciero);
                      $("#copia_adminGeneral").val(c.copia_adminGeneral);
                      $("#copia__registroIn").val(c.copia__registroIn);
                      $("#copia_acuerdoRegistro").val(c.copia_acuerdoRegistro);
                      $("#copia_ruc").val(c.copia_ruc);
  
  
                      $("#observa__polizaOriginal").val(c.observa__polizaOriginal);
                      $("#observa__caucionOrginal").val(c.observa__caucionOrginal);
                      $("#observa__copiaCertificadoBancario").val(c.observa__copiaCertificadoBancario);
                      $("#observa__copiaRegistroD").val(c.observa__copiaRegistroD);
                      $("#observa__copia_adminFinanciero").val(c.observa__copia_adminFinanciero);
                      $("#observa__copia_adminGeneral").val(c.observa__copia_adminGeneral);
                      $("#observa__copia__registroIn").val(c.observa__copia__registroIn);
                      $("#observa__copia_acuerdoRegistro").val(c.observa__copia_acuerdoRegistro);
                      $("#observa__copia_ruc").val(c.observa__copia_ruc);
  
  
  
  
                  }
              
              });
  
          },
          error:function(){
  
          }
                  
      });     
  
  
  
    });
  
  }
  
  /*=====  End of Acciones rechazar financieras  ======*/
  