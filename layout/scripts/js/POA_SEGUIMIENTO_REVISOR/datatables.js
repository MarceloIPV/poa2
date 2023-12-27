var datatabletsSeguimientoRevisorVacio=function(tabla,tipo,nombreDocumento,enlaceDocumento,datos,reasignacion){


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
      "url":"modelosBd/POA_SEGUIMIENTO_REVISOR/datatablets.PD.md.php", 
      "data": { 
        "tipo": tipo,
        "datos": datos
        
      }
    
      },
    
  
        "aoColumnDefs":enlaceDocumento
      
    
        
    });


   
   //=====  End of Establecer datatablets  ======//
 
    
    if (reasignacion[0]=="funcion__reasignar__contratacion_publica__unidos__altos") {

         
 
        funcion__reasignar__contratacion_publica__unidos__altos2023("#"+tipo+" tbody",table);

    }
    if (reasignacion[0]=="funcion__reasignar__contratacion_publica__unidos__altos__recomendados") {

         
 
        funcion__reasignar__contratacion_publica__unidos__altos__recomendados2023("#"+tipo+" tbody",table);

    }
    if (reasignacion[0]=="funcion__reasignar__seguimientos__unidos__altos__recomendados__formaRe2023") {

         
 
        funcion__reasignar__seguimientos__unidos__altos__recomendados__formaRe2023("#"+tipo+" tbody",table);

    }

    

    if (reasignacion[0]=="funcion__reasignar__seguimientos__unidos__actividad__fisica1") {

        
        funcion__reasignar__seguimientos__unidos__actividad__fisica2023("#"+tipo+" tbody",table);

    }

    if (reasignacion[0]=="funcion__reasignar__seguimientos__unidos__seguimientos__seguimientos__recomendados__formaRe__ins") {

        funcion__reasignar__seguimientos__unidos__seguimientos__seguimientos__recomendados__formaRe__ins2023("#"+tipo+" tbody",table);

       

    }

    if (reasignacion[0]=="funcion__reasignar__seguimientos__unidos__seguimientos__seguimientos__recomendados__formaRe__instalaciones2023") {

        funcion__reasignar__seguimientos__unidos__seguimientos__seguimientos__recomendados__formaRe__instalaciones2023("#"+tipo+" tbody",table);

       }

    if (reasignacion[0]=="funcion__reasignar__seguimiento__presupuestario_recibidosd") {

        funcion__reasignar__seguimiento__presupuestario_recibidos2023("#"+tipo+" tbody",table);

    }

    if (reasignacion[0]=="funcion__reasignar__seguimientos__unidos__altos2023") {

        funcion__reasignar__seguimientos__unidos__altos2023("#"+tipo+" tbody",table);

    }

    if (reasignacion[0]=="funcion__reasignar__seguimientos__recorridos2023") {

        funcion__reasignar__seguimientos__recorridos2023("#"+tipo+" tbody",table);

    }
    if (reasignacion[0]=="funcion__bloqueos__seguimientos2023") {

        funcion__bloqueos__seguimientos2023("#"+tipo+" tbody",table);

    }
    if (reasignacion[0]=="funcion__reasignar__seguimientos__recorridos__anexos__reportes2023") {

        funcion__reasignar__seguimientos__recorridos__anexos__reportes2023("#"+tipo+" tbody",table);

    }
    if (reasignacion[0]=="funcion__reporte__seguimientos__anual__revisor") {

        funcion__reporte__seguimientos__anual__revisor2023("#"+tipo+" tbody",table);

    }
    if (reasignacion[0]=="funcion__remanentes__asignados2023") {

        funcion__remanentes__asignados2023("#"+tipo+" tbody",table);

    }
    if (reasignacion[0]=="funcionEditar__gestionados_s") {

        funcionEditar__gestionados_s2023("#"+tipo+" tbody",table);

    }   

    if (reasignacion[0]=="funcionEditar__gestionados") {

        funcion__gestionados__i2023("#"+tipo+" tbody",table);

    }  

    if (reasignacion[0]=="funcion__reasignar__seguimientos__unido2023") {

        

        funcion__reasignar__seguimientos__unidos2023("#"+tipo+" tbody",table);

       }

    if (reasignacion[0]=="funcion__reasignar__seguimientos__unidos__altos__recomendados2023") {

		funcion__reasignar__seguimientos__unidos__altos__recomendados2023("#"+tipo+" tbody",table);

	}
    

    if (reasignacion[0]=="funcion__reasignar__seguimientos__unidos__seguimientos__seguimientos__recomendados__formaRe2023") {

		funcion__reasignar__seguimientos__unidos__seguimientos__seguimientos__recomendados__formaRe2023("#"+tipo+" tbody",table);

	}

    if (reasignacion[0]=="funcion__control__de__cambios2023") {

		funcion__control__de__cambios2023("#"+tipo+" tbody",table);

	}


    


    

    

    
}

var datatabletsSeguimientoRevisorVacio2=function(tabla,tipo,nombreDocumento,enlaceDocumento,datos,reasignacion){


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
      "pageLength":20,

      fixedHeader: true,

      "initComplete": function (settings, json) {

       

        $(tabla).wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
      },
    
    
      "ajax":{
    
        "method":"POST",
      "url":"modelosBd/POA_SEGUIMIENTO_REVISOR/datatablets.PD.md.php", 
      "data": { 
        "tipo": tipo,
        "datos": datos
        
      }
    
      },
    
  
        "aoColumnDefs":enlaceDocumento
      
    
        
    });


}

/*====================================================
=            Funcion de seguimiento altos            =
====================================================*/

/*====================================================
=            Funcion de contratacion_publica           =
====================================================*/

var funcion__reasignar__contratacion_publica__unidos__altos2023=function(tbody,table){

    $(tbody).on("click","button.reasignarTramites__seguimientosAltos",function(e){
        
  
        e.preventDefault();
  
        var data=table.row($(this).parents("tr")).data();
  
  
        var paqueteDeDatos = new FormData();
  
        paqueteDeDatos.append('tipo','enviar__infor__data__seguimientos2');
  
        paqueteDeDatos.append("idOrganismo",data[18]);
  
        paqueteDeDatos.append("periodo",data[6]);
  
      
      $.ajax({
  
          type:"POST",
          url:"modelosBd/POA_SEGUIMIENTO_REVISOR/selector.md.php",
          contentType: false,
          data:paqueteDeDatos,
          processData: false,
          cache: false, 
          success:function(response){

          $.getScript("layout/scripts/js/validacionBasica.js",function(){
        
              var elementos=JSON.parse(response);
             
              var poa__invers=elementos['poa__invers'];
              
              var indicadores__altos=elementos['indicadores__altos'];

              var indicadores__administrativos=elementos['indicadores__administrativos'];

              console.log(elementos)
              
              /*==================================================
              =            Registrar datos necesarios            =
              ==================================================*/
            
            

              if (data[0]=="PLANTA CENTRAL" || data[0]=="ZONAL 2" || data[0]=="ZONAL 3") {
                
                $(".titulo__alto__rendimientos").append("<div class='col col-12 text-center'>COORDINACIÓN GENERAL ADMINISTRATIVA FINANCIERA</div><input type='hidden' id='subsecretarias__escritas' name='subsecretarias__escritas' value='COORDINACIÓN GENERAL ADMINISTRATIVA FINANCIERA'/>");

                $(".titulo__alto__rendimientos").append("<div class='col col-12 text-center mt-2'>DIRECCION ADMINISTRATIVA</div><input type='hidden' id='direccion__escritas' name='direccion__escritas' value='DIRECCION ADMINISTRATIVA'/>");

            }else{
                
                $(".titulo__alto__rendimientos").append("<div class='col col-12 text-center'>Coordinación "+data[0]+"</div><input type='hidden' id='subsecretarias__escritas' name='subsecretarias__escritas' value='Coordinación "+data[0]+"'/>");
                
            }
           

           
  
              /*====================================
              =            Sacar siglas            =
              ====================================*/
              
              let resultado = "";
              if(data[0] == "PLANTA CENTRAL" || data[0] == "ZONAL 3" || data[0] == "ZONAL 2" || data[0] == "ZONAL 1"){

                resultado="DA"+" - "+data[11]
              }else{
                let palabras = data[0];
                
                const regex = /\d+/g;
                const numbers = palabras.match(regex);

                resultado="CZ"+numbers+" - "+data[11]
              }
              
              
              $(".siglas__dinamicas").text(resultado);	
  
              $("#siglas__dinamicas__inputs").val(resultado);	
              
              /*=====  End of Sacar siglas  ======*/
  
              
              if (parseInt(data[10], 10)<10) {
  
                  $(".numerico__dinamicas").text(data[18]);
  
                  $("#numerico__dinamicas__inputs").val(data[18]);
  
              }else{
  
                  $(".numerico__dinamicas").text(data[10]);
  
                  $("#numerico__dinamicas__inputs").val(data[10]);
  
              }
  
  
              /*=====  End of Registrar datos necesarios  ======*/
  
  
              /*=====================================================
              =            Asignar datos del datatablets            =
              =====================================================*/
  
              $("#organismoOculto__modal").val(data[18]);
  
              $("#idOrganismo").val(data[18]);
            
              $(".periodo__evaluados__anuales1").text(data[22]);
  
              $("#periodo__evaluados__anuales1").val(data[22]);

              $(".periodo__evaluados__anualesContratacion1").text(data[22]);
  
              $("#periodo__evaluados__anualesContratacion1").val(data[22]);

              $(".areaAccion").text(data[16]);
              $("#areaAccion").val(data[16]);
  
              $(".objetivoS").text(data[17]);
              $("#objetivoS").val(data[17]);
  
              if (data[6]=="primerTrimestre") {
  
                $(".trimestre__evaluados__al").text("I TRIMESTRE");
                $("#trimestre__evaluados__al").val("I TRIMESTRE");

            }else if (data[6]=="segundoTrimestre") {


                $(".trimestre__evaluados__al").text("I SEMESTRE");
                $("#trimestre__evaluados__al").val("I SEMESTRE");
                $(".trimestre__evaluados__alContratacion").text("I SEMESTRE");
                $("#trimestre__evaluados__alContratacion").val("I SEMESTRE");

          
                $(".periodo__evaluado").text("ENERO - JUNIO");
                $("#periodo__evaluado").val("ENERO - JUNIO");

                $(".periodo__evaluadoContratacion").text("ENERO - JUNIO");
                $("#periodo__evaluadoContratacion").val("ENERO - JUNIO");

           
            }else if (data[6]=="tercerTrimestre") {

                $(".trimestre__evaluados__al").text("III TRIMESTRE");
                $("#trimestre__evaluados__al").val("III TRIMESTRE");

            }else if (data[6]=="cuartoTrimestre") {

                $(".trimestre__evaluados__al").text("II SEMESTRE");
                $("#trimestre__evaluados__al").val("II SEMESTRE");
                $(".trimestre__evaluados__alContratacion").text("II SEMESTRE");
                $("#trimestre__evaluados__alContratacion").val("II SEMESTRE");

                $(".periodo__evaluado").text("JULIO - DICIEMBRE");
                $("#periodo__evaluado").val("JULIO - DICIEMBRE");

                $(".periodo__evaluadoContratacion").text("JULIO - DICIEMBRE");
                $("#periodo__evaluadoContratacion").val("JULIO - DICIEMBRE");

            }

  
              $(".periodo__evaluados__anuales").text(data[11]);
  
              $("#periodo__evaluados__anuales").val(data[11]);
  
              $("#organismoOculto__modal").val(data[18]);
  
              $("#idOrganismo").val(data[18]);
  
              $("#periodo").val(data[6]);
  
              $(".nombre__organizacion__deportivas").text(data[2]);
  
              $("#nombre__organizacion__deportivas").val(data[2]);

              $(".nombre__organizacion__deportivasContratacion").text(data[2]);
  
              $("#nombre__organizacion__deportivasContratacion").val(data[2]);
  
              $(".ruc__organizacion__deportivas").text(data[1]);
  
              $("#ruc__organizacion__deportivas").val(data[1]);

              $(".ruc__organizacion__deportivasContratacion").text(data[1]);
  
              $("#ruc__organizacion__deportivasContratacion").val(data[1]);
  
              $(".presidente__organizacion__deportivas").text(data[12]);
  
              $("#presidente__organizacion__deportivas").val(data[12]);
  
              $(".correo__organizacion__deportivas").text(data[13]);
  
              $("#correo__organizacion__deportivas").val(data[13]);

              $(".correo__organizacion__deportivasContratacion").text(data[13]);
  
              $("#correo__organizacion__deportivasContratacion").val(data[13]);
              
  
              $(".direccion__organizacion__deportivas").text(data[14]);
  
              $("#direccion__organizacion__deportivas").val(data[14]);

              $(".direccion__organizacion__deportivasContratacion").text(data[14]);
  
              $("#direccion__organizacion__deportivasContratacion").val(data[14]);

              

              $(".provincia__organizacion__deportivasContratacion").text(data[3]);
  
              $("#provincia__organizacion__deportivasContratacion").val(data[3]);
  
              $(".provincia__organizacion__deportivas").text(data[3]);
  
              $("#provincia__organizacion__deportivas").val(data[3]);
  
              $(".canton__organizacion__deportivas").text(data[4]);
  
              $("#canton__organizacion__deportivas").val(data[4]);

              $(".canton__organizacion__deportivasContratacion").text(data[4]);
  
              $("#canton__organizacion__deportivasContratacion").val(data[4]);
              
              $(".parroquia__organizacion__deportivasContratacion").text(data[5]);
  
              $("#parroquia__organizacion__deportivasContratacion").val(data[5]);
              $(".parroquia__organizacion__deportivas").text(data[5]);
  
              $("#parroquia__organizacion__deportivas").val(data[5]);
  
              $(".barrio__organizacion__deportivas").text(data[15]);
  
              $("#barrio__organizacion__deportivas").val(data[15]);
              $(".barrio__organizacion__deportivasContratacion").text(data[15]);
  
              $("#barrio__organizacion__deportivasContratacion").val(data[15]);

              
  
              $(".presupuesto__asignado__pais__altos").text(poa__invers);
  
              $("#presupuesto__asignado__pais__altos").val(poa__invers);

              $(".presupuesto__asignado__pais__altosContratacion").text(poa__invers);
  
              $("#presupuesto__asignado__pais__altosContratacion").val(poa__invers);
  
              $("#idUSeguimientos").val($("#idUsuarioC").val());

              $(".ocultos__en__altos1").hide();

              $(".checkActividades").show();
              $(".checkContratacion").hide();
  
              if ($("#idRolAd").val()=="7" || $("#idRolAd").val()==7) {
  
                  $(".fila__reasignar").show();
                  $(".fila__regresar__a").hide();
  
              }else if( $("#idRolAd").val()=="4" || $("#idRolAd").val()==4){
  
                  $(".fila__reasignar").show();
                  $(".fila__regresar__a").hide();
  
                  $(".reasignar__solo").removeClass('col');
  
                  $(".reasignar__solo").removeClass('col-2');
  
                  $(".reasignar__solo").addClass('col');
  
                  $(".reasignar__solo").addClass('col-6');

                  $(".oculto_directivos").hide()
  
              }else{
  
                  $(".fila__reasignar").hide();
                  $(".fila__regresar__a").show();
                  $(".oculto_directivos").show()
              }
  
              if ($("#idRolAd").val()=="3" || $("#idRolAd").val()==3) {
  
                  $(".ocultos__en__altos").show();
                 
  
              }else if($("#idRolAd").val()=="2" || $("#idRolAd").val()==2 ){

                $(".fila__regresar__a").show();
                $(".fila__reasignar").show();
              

                $(".reasignar__solo").removeClass('col');

                $(".reasignar__solo").removeClass('col-2');

                $(".reasignar__solo").addClass('col');

                $(".reasignar__solo").addClass('col-6');

                $(".fila__reasignar").removeClass('col');

                $(".fila__reasignar").removeClass('col-2');

                $(".fila__reasignar").addClass('col');

                $(".fila__reasignar").addClass('col-4');
                $(".oculto_directivos").hide()
              }
              else{
  
                  $(".ocultos__en__altos").remove();
  
              }
  
              /*=====  End of Asignar datos del datatablets  ======*/
  
              /*=========================================================
              =            Construción tablas de indicadores            =
              =========================================================*/
  
              let porcentajesCumplimientos=0;
  
              let div="";
  
              let sumaProgramado=0;
              let sumaAlcanzado=0;
  
              let porcentajeFinalAl=0;
  
              for (w of indicadores__administrativos) {
  
                  sumaProgramado=parseFloat(sumaProgramado) + parseFloat(w.totalProgramado);
                  sumaAlcanzado=parseFloat(sumaAlcanzado) + parseFloat(w.totalEjecutado);
  
                  porcentajesCumplimientos=(parseFloat(w.totalEjecutado) / parseFloat(w.totalProgramado))*100;
  
                  if (parseFloat(porcentajesCumplimientos).toFixed(2)>=85) {
  
                       div="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";
  
                  }else if (parseFloat(porcentajesCumplimientos).toFixed(2)>=70 && parseFloat(porcentajesCumplimientos).toFixed(2)<85) {
  
                       div="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";
  
                  }else if (parseFloat(porcentajesCumplimientos).toFixed(2)<70) {
  
                       div="<div style='border-radius: 50%!important; margin-right:1em;  background:red; height:15px!important; width:15px!important;'></div>";
  
                  }
  
  
  
                  $(".cuerpo__items__alto__rendimientos").append('<tr><td>'+w.nombreActividades+'</td><td>'+w.nombreIndicador+'</td><td>'+w.totalProgramado+'</td><td>'+w.totalEjecutado+'</td><td><center><div style="display:flex!important;">'+div+" "+porcentajesCumplimientos+'%</div></center></td></tr>');
  
              }
              
  
              porcentajeFinalAl=(parseFloat(sumaAlcanzado)/parseFloat(sumaProgramado))*100;

                /*=========================================================
              =            Construción tablas de pagosSinContratacionPublica      =
              =========================================================*/
              
              let paqueteDeDatosContratacion1 = new FormData();
             

              paqueteDeDatosContratacion1.append("tipo", "selectorTablapagosSinContratacionPublica");
              paqueteDeDatosContratacion1.append("idOrganismo",  $("#idOrganismo").val());
              paqueteDeDatosContratacion1.append("semestre", $("#trimestre__evaluados__al").val());
              paqueteDeDatosContratacion1.append("anioEvaluadorr", $("#periodo__evaluados__anuales1").val());
              

              
              $.ajax({
            
                method: "post",
                url: "modelosBd/POA_SEGUIMIENTO_REVISOR/selector.md.php",
                data: paqueteDeDatosContratacion1,
                contentType: false,
                processData: false,
                cache: false, 
                async:false,
                success:function(response){

                    var elementos=JSON.parse(response);
            
                    var indicadorInformacion=elementos['indicadorInformacion'];
                    console.log(indicadorInformacion)

                    var tabla = document.getElementById('pagosSinContratacionPublica');

                    var contador = 0;


                    for (z of indicadorInformacion) {

                            contador++;
                            tabla.insertAdjacentHTML('beforeend','<tr> <td><center>'+z.nombreItem+'</center></td> <td><center>'+z.itemPreesupuestario+'</center></td><td> <center><select id="pagosSinContratacionPublicaSelector'+contador+'" name="pagosSinContratacionPublicaSelector'+contador+'" class="ancho__total__input__selects"><option value="0">--Seleccione--</option><option value="Cumple">Cumple</option><option value="No Cumple">No Cumple</option><option value="N/A">N/A</option><option value="Parcialmente">Parcialmente</option></select></center> </td><td><input type="tex" id="FacturaSinContratacionPublica'+contador+'" name="FacturaSinContratacionPublica'+contador+'" class="ancho__total__input" value="" /></td><td><input type="tex" id="ValorSinContratacionPublica'+contador+'" name="ValorSinContratacionPublica'+contador+'" class="ancho__total__input" value="" /></td><td><input type="tex" id="observacionSinContratacionPublica'+contador+'" name="observacionSinContratacionPublica'+contador+'" class="ancho__total__input" value="" /></td></tr>');

                    }
                
        
                },
                error:function(){
        
                }
                        
                });	

            /*=========================================================
              =            Construción tablas de pagos con ContratacionPublica          =
              =========================================================*/
              
              let paqueteDeDatosContratacion2 = new FormData();
             

              paqueteDeDatosContratacion2.append("tipo", "selectorTablapagosConContratacionPublica");
              paqueteDeDatosContratacion2.append("idOrganismo",  $("#idOrganismo").val());
              paqueteDeDatosContratacion2.append("semestre", $("#trimestre__evaluados__al").val());
              paqueteDeDatosContratacion2.append("anioEvaluadorr", $("#periodo__evaluados__anuales1").val());

              
              
              $.ajax({
            
                method: "post",
                url: "modelosBd/POA_SEGUIMIENTO_REVISOR/selector.md.php",
                data: paqueteDeDatosContratacion2,
                contentType: false,
                processData: false,
                cache: false, 
                async:false,
                success:function(response){

                    var elementos=JSON.parse(response);
            
                    var indicadorInformacion=elementos['indicadorInformacion'];
                    console.log(indicadorInformacion)

                    var tabla = document.getElementById('pagosConContratacionPublica');

                    var contador = 0;


                    for (z of indicadorInformacion) {

                        contador++;
                        tabla.insertAdjacentHTML('beforeend','<tr> <td><center>'+z.nombreItem+'</center></td> <td><center>'+z.itemPreesupuestario+'</center></td><td> <center><select id="pagosConContratacionPublicaSelector'+contador+'" name="pagosConContratacionPublicaSelector'+contador+'" class="ancho__total__input__selects"><option value="0">--Seleccione--</option><option value="Cumple">Cumple</option><option value="No Cumple">No Cumple</option><option value="N/A">N/A</option><option value="Parcialmente">Parcialmente</option></select></center> </td><td><input type="tex" id="FacturaConContratacionPublica'+contador+'" name="FacturaConContratacionPublica'+contador+'" class="ancho__total__input" value="" /></td><td><input type="tex" id="ValorConContratacionPublica'+contador+'" name="ValorConContratacionPublica'+contador+'" class="ancho__total__input" value="" /></td><td><input type="tex" id="observacionConContratacionPublica'+contador+'" name="observacionConContratacionPublica'+contador+'" class="ancho__total__input" value="" /></td></tr>');

                }
                
        
                },
                error:function(){
        
                }
                        
                });	

            /*=========================================================
              =            Construción tablas de Contratacion Publica           =
              =========================================================*/
              
              let paqueteDeDatosContratacion = new FormData();
             

              paqueteDeDatosContratacion.append("tipo", "selectorTablaContratacionPublica");
              paqueteDeDatosContratacion.append("idOrganismo",  $("#idOrganismo").val());
              paqueteDeDatosContratacion.append("semestre", $("#trimestre__evaluados__al").val());
              
              $.ajax({
            
                method: "post",
                url: "modelosBd/POA_SEGUIMIENTO_REVISOR/selector.md.php",
                data: paqueteDeDatosContratacion,
                contentType: false,
                processData: false,
                cache: false, 
                async:false,
                success:function(response){

                    var elementos=JSON.parse(response);
            
                    var indicadorInformacion=elementos['indicadorInformacion'];
                    console.log(indicadorInformacion)

                    var tabla = document.getElementById('tablaCalificacionContratacionPublica');

                    var contador = 0;


                    for (z of indicadorInformacion) {


                        if(z.catalogo__elect == "si" ){

                            contador++;
                            tabla.insertAdjacentHTML('beforeend','<tr> <td><center>'+z.idActividad+'</center></td> <td><center>'+z.itemPreesupuestario+'</center></td> <td><center>'+z.nombreItem+'</center></td> <td><center>'+z.planificado+'</center></td>  <td><center>Catalogo Electrónico</center></td> <td><center>'+z.catalogo__elect__objeto+'</center></td> <td><center>'+z.catalogo__elect__monto+'</center></td> <td><center>'+z.catalogo__elect__proveedor+'</center></td> <td><center>'+z.catalogo__elect__rucProveedor+'</center></td> <td><center>'+z.catalogo__elect__texto+'</center></td> <td> <center><select id="cumpleMontoVigenteCP'+contador+'" name="cumpleMontoVigenteCP'+contador+'" class="ancho__total__input__selects"><option value="0">--Seleccione--</option><option value="Cumple">Cumple</option><option value="No Cumple">No Cumple</option><option value="N/A">N/A</option><option value="Parcialmente">Parcialmente</option></select></center> </td> <td> <center><select id="evidenciaRecurrenciaInfima'+contador+'" name="evidenciaRecurrenciaInfima'+contador+'" class="ancho__total__input__selects"><option value="0">--Seleccione--</option><option value="Cumple">Cumple</option><option value="No Cumple">No Cumple</option><option value="N/A">N/A</option><option value="Parcialmente">Parcialmente</option></select></center> </td> <td> <center><select id="procedimientosContratacionVer'+contador+'" name="procedimientosContratacionVer'+contador+'" class="ancho__total__input__selects"><option value="0">--Seleccione--</option><option value="si">si</option><option value="No">No</option></select></center> </td><td><textarea id="observacionCP'+contador+'" name="observacionCP'+contador+'" class="ancho__total__input" value=""></textarea></td></tr>');
                    
                        } 
                        if(z.catalogo__subasta == "si" ){
                            contador++;
                            tabla.insertAdjacentHTML('beforeend','<tr> <td><center>'+z.idActividad+'</center></td> <td><center>'+z.itemPreesupuestario+'</center></td> <td><center>'+z.nombreItem+'</center></td> <td><center>'+z.planificado+'</center></td>  <td><center>Subasta Inversa Electrónica</center></td> <td><center>'+z.catalogo__subasta__objeto+'</center></td> <td><center>'+z.catalogo__subasta__monto+'</center></td> <td><center>'+z.catalogo__subasta__proveedor+'</center></td> <td><center>'+z.catalogo__subasta__rucProveedor+'</center></td> <td><center>'+z.catalogo__subasta__texto+'</center></td> <td> <center><select id="cumpleMontoVigenteCP'+contador+'" name="cumpleMontoVigenteCP'+contador+'" class="ancho__total__input__selects"><option value="0">--Seleccione--</option><option value="Cumple">Cumple</option><option value="No Cumple">No Cumple</option><option value="N/A">N/A</option><option value="Parcialmente">Parcialmente</option></select></center> </td> <td> <center><select id="evidenciaRecurrenciaInfima'+contador+'" name="evidenciaRecurrenciaInfima'+contador+'" class="ancho__total__input__selects"><option value="0">--Seleccione--</option><option value="Cumple">Cumple</option><option value="No Cumple">No Cumple</option><option value="N/A">N/A</option><option value="Parcialmente">Parcialmente</option></select></center> </td> <td> <center><select id="procedimientosContratacionVer'+contador+'" name="procedimientosContratacionVer'+contador+'" class="ancho__total__input__selects"><option value="0">--Seleccione--</option><option value="si">si</option><option value="No">No</option></select></center></td><td><textarea id="observacionCP'+contador+'" name="observacionCP'+contador+'" class="ancho__total__input" value=""></textarea></td></tr>');
                    
                        } 
                        if(z.catalogo__infima == "si"){
                            contador++;
                            tabla.insertAdjacentHTML('beforeend','<tr> <td><center>'+z.idActividad+'</center></td> <td><center>'+z.itemPreesupuestario+'</center></td> <td><center>'+z.nombreItem+'</center></td> <td><center>'+z.planificado+'</center></td>  <td><center>Ínfima Cuantía</center></td><td><center>'+z.catalogo__infima__objeto+'</center></td> <td><center>'+z.catalogo__infima__monto+'</center></td> <td><center>'+z.catalogo__infima__proveedor+'</center></td> <td><center>'+z.catalogo__infima__rucProveedor+'</center></td> <td><center>'+z.catalogo__infima__texto+'</center></td> <td> <center><select id="cumpleMontoVigenteCP'+contador+'" name="cumpleMontoVigenteCP'+contador+'" class="ancho__total__input__selects"><option value="0">--Seleccione--</option><option value="Cumple">Cumple</option><option value="No Cumple">No Cumple</option><option value="N/A">N/A</option><option value="Parcialmente">Parcialmente</option></select></center> </td> <td> <center><select id="evidenciaRecurrenciaInfima'+contador+'" name="evidenciaRecurrenciaInfima'+contador+'" class="ancho__total__input__selects"><option value="0">--Seleccione--</option><option value="Cumple">Cumple</option><option value="No Cumple">No Cumple</option><option value="N/A">N/A</option><option value="Parcialmente">Parcialmente</option></select></center> </td> <td> <center><select id="procedimientosContratacionVer'+contador+'" name="procedimientosContratacionVer'+contador+'" class="ancho__total__input__selects"><option value="0">--Seleccione--</option><option value="si">si</option><option value="No">No</option></select></center> </td><td><textarea id="observacionCP'+contador+'" name="observacionCP'+contador+'" class="ancho__total__input" value=""></textarea></td></tr>');
                    
                        } 
                        if(z.catalogo__menorCuantia == "si"){
                            contador++;
                            tabla.insertAdjacentHTML('beforeend','<tr> <td><center>'+z.idActividad+'</center></td> <td><center>'+z.itemPreesupuestario+'</center></td> <td><center>'+z.nombreItem+'</center></td> <td><center>'+z.planificado+'</center></td>  <td><center>Menor Cuantía Bienes</center></td> <td><center>'+z.catalogo__menorCuantia__objeto+'</center></td><td><center>'+z.catalogo__menorCuantia__monto+'</center></td> <td><center>'+z.catalogo__menorCuantia__proveedor+'</center></td> <td><center>'+z.catalogo__menorCuantia__rucProveedor+'</center></td> <td><center>'+z.catalogo__menorCuantia__texto+'</center></td> <td> <center><select id="cumpleMontoVigenteCP'+contador+'" name="cumpleMontoVigenteCP'+contador+'" class="ancho__total__input__selects"><option value="0">--Seleccione--</option><option value="Cumple">Cumple</option><option value="No Cumple">No Cumple</option><option value="N/A">N/A</option><option value="Parcialmente">Parcialmente</option></select></center> </td> <td> <center><select id="evidenciaRecurrenciaInfima'+contador+'" name="evidenciaRecurrenciaInfima'+contador+'" class="ancho__total__input__selects"><option value="0">--Seleccione--</option><option value="Cumple">Cumple</option><option value="No Cumple">No Cumple</option><option value="N/A">N/A</option><option value="Parcialmente">Parcialmente</option></select></center> </td> <td> <center><select id="procedimientosContratacionVer'+contador+'" name="procedimientosContratacionVer'+contador+'" class="ancho__total__input__selects"><option value="0">--Seleccione--</option><option value="si">si</option><option value="No">No</option></select></center> </td><td><textarea id="observacionCP'+contador+'" name="observacionCP'+contador+'" class="ancho__total__input" value=""></textarea></td></tr>');
                    
                        } 
                        if(z.catalogo__cotizacion == "si" ){
                            contador++;
                            tabla.insertAdjacentHTML('beforeend','<tr> <td><center>'+z.idActividad+'</center></td> <td><center>'+z.itemPreesupuestario+'</center></td> <td><center>'+z.nombreItem+'</center></td> <td><center>'+z.planificado+'</center></td>  <td><center>Cotización Bienes</center></td><td><center>'+z.catalogo__cotizacion__objeto+'</center></td> <td><center>'+z.catalogo__cotizacion__monto+'</center></td> <td><center>'+z.catalogo__cotizacion__proveedor+'</center></td> <td><center>'+z.catalogo__cotizacion__rucProveedor+'</center></td> <td><center>'+z.catalogo__cotizacion__texto+'</center></td> <td> <center><select id="cumpleMontoVigenteCP'+contador+'" name="cumpleMontoVigenteCP'+contador+'" class="ancho__total__input__selects"><option value="0">--Seleccione--</option><option value="Cumple">Cumple</option><option value="No Cumple">No Cumple</option><option value="N/A">N/A</option><option value="Parcialmente">Parcialmente</option></select></center> </td> <td> <center><select id="evidenciaRecurrenciaInfima'+contador+'" name="evidenciaRecurrenciaInfima'+contador+'" class="ancho__total__input__selects"><option value="0">--Seleccione--</option><option value="Cumple">Cumple</option><option value="No Cumple">No Cumple</option><option value="N/A">N/A</option><option value="Parcialmente">Parcialmente</option></select></center> </td> <td> <center><select id="procedimientosContratacionVer'+contador+'" name="procedimientosContratacionVer'+contador+'" class="ancho__total__input__selects"><option value="0">--Seleccione--</option><option value="si">si</option><option value="No">No</option></select></center> </td><td><textarea id="observacionCP'+contador+'" name="observacionCP'+contador+'" class="ancho__total__input" value=""></textarea></td></tr>');
                    
                        } 
                        if(z.catalogo__licitacion == "si" ){
                            contador++;
                            tabla.insertAdjacentHTML('beforeend','<tr> <td><center>'+z.idActividad+'</center></td> <td><center>'+z.itemPreesupuestario+'</center></td> <td><center>'+z.nombreItem+'</center></td> <td><center>'+z.planificado+'</center></td>  <td><center>Licitación Bienes</center></td> <td><center>'+z.catalogo__licitacion__objeto+'</center></td><td><center>'+z.catalogo__licitacion__monto+'</center></td> <td><center>'+z.catalogo__licitacion__proveedor+'</center></td> <td><center>'+z.catalogo__licitacion__rucProveedor+'</center></td> <td><center>'+z.catalogo__licitacion__texto+'</center></td> <td> <center><select id="cumpleMontoVigenteCP'+contador+'" name="cumpleMontoVigenteCP'+contador+'" class="ancho__total__input__selects"><option value="0">--Seleccione--</option><option value="Cumple">Cumple</option><option value="No Cumple">No Cumple</option><option value="N/A">N/A</option><option value="Parcialmente">Parcialmente</option></select></center> </td> <td> <center><select id="evidenciaRecurrenciaInfima'+contador+'" name="evidenciaRecurrenciaInfima'+contador+'" class="ancho__total__input__selects"><option value="0">--Seleccione--</option><option value="Cumple">Cumple</option><option value="No Cumple">No Cumple</option><option value="N/A">N/A</option><option value="Parcialmente">Parcialmente</option></select></center> </td> <td> <center><select id="procedimientosContratacionVer'+contador+'" name="procedimientosContratacionVer'+contador+'" class="ancho__total__input__selects"><option value="0">--Seleccione--</option><option value="si">si</option><option value="No">No</option></select></center> </td><td><textarea id="observacionCP'+contador+'" name="observacionCP'+contador+'" class="ancho__total__input" value=""></textarea></td></tr>');
                    
                        } 
                        if(z.catalogo__menorCuantiaObras == "si" ){
                            contador++;
                            tabla.insertAdjacentHTML('beforeend','<tr> <td><center>'+z.idActividad+'</center></td> <td><center>'+z.itemPreesupuestario+'</center></td> <td><center>'+z.nombreItem+'</center></td> <td><center>'+z.planificado+'</center></td>  <td><center>Menor Cuantía Obras</center></td> <td><center>'+z.catalogo__menorCuantiaObras__objeto+'</center></td><td><center>'+z.catalogo__menorCuantiaObras__monto+'</center></td> <td><center>'+z.catalogo__menorCuantiaObras__proveedor+'</center></td> <td><center>'+z.catalogo__menorCuantiaObras__rucProveedor+'</center></td> <td><center>'+z.catalogo__menorCuantiaObras__texto+'</center></td> <td> <center><select id="cumpleMontoVigenteCP'+contador+'" name="cumpleMontoVigenteCP'+contador+'" class="ancho__total__input__selects"><option value="0">--Seleccione--</option><option value="Cumple">Cumple</option><option value="No Cumple">No Cumple</option><option value="N/A">N/A</option><option value="Parcialmente">Parcialmente</option></select></center> </td> <td> <center><select id="evidenciaRecurrenciaInfima'+contador+'" name="evidenciaRecurrenciaInfima'+contador+'" class="ancho__total__input__selects"><option value="0">--Seleccione--</option><option value="Cumple">Cumple</option><option value="No Cumple">No Cumple</option><option value="N/A">N/A</option><option value="Parcialmente">Parcialmente</option></select></center> </td> <td> <center><select id="procedimientosContratacionVer'+contador+'" name="procedimientosContratacionVer'+contador+'" class="ancho__total__input__selects"><option value="0">--Seleccione--</option><option value="si">si</option><option value="No">No</option></select></center> </td><td><textarea id="observacionCP'+contador+'" name="observacionCP'+contador+'" class="ancho__total__input" value=""></textarea></td></tr>');
                    
                        } 
                        if(z.catalogo__cotizacionObras == "si" ){
                            contador++;
                            tabla.insertAdjacentHTML('beforeend','<tr> <td><center>'+z.idActividad+'</center></td> <td><center>'+z.itemPreesupuestario+'</center></td> <td><center>'+z.nombreItem+'</center></td> <td><center>'+z.planificado+'</center></td>  <td><center>Cotización Obras</center></td><td><center>'+z.catalogo__cotizacionObras__objeto+'</center></td> <td><center>'+z.catalogo__cotizacionObras__monto+'</center></td> <td><center>'+z.catalogo__cotizacionObras__proveedor+'</center></td> <td><center>'+z.catalogo__cotizacionObras__rucProveedor+'</center></td> <td><center>'+z.catalogo__cotizacionObras__texto+'</center></td> <td> <center><select id="cumpleMontoVigenteCP'+contador+'" name="cumpleMontoVigenteCP'+contador+'" class="ancho__total__input__selects"><option value="0">--Seleccione--</option><option value="Cumple">Cumple</option><option value="No Cumple">No Cumple</option><option value="N/A">N/A</option><option value="Parcialmente">Parcialmente</option></select></center> </td> <td> <center><select id="evidenciaRecurrenciaInfima'+contador+'" name="evidenciaRecurrenciaInfima'+contador+'" class="ancho__total__input__selects"><option value="0">--Seleccione--</option><option value="Cumple">Cumple</option><option value="No Cumple">No Cumple</option><option value="N/A">N/A</option><option value="Parcialmente">Parcialmente</option></select></center> </td><td> <center><select id="procedimientosContratacionVer'+contador+'" name="procedimientosContratacionVer'+contador+'" class="ancho__total__input__selects"><option value="0">--Seleccione--</option><option value="si">si</option><option value="No">No</option></select></center> </td> <td><textarea id="observacionCP'+contador+'" name="observacionCP'+contador+'" class="ancho__total__input" value=""></textarea></td></tr>');
                    
                        } 
                        if(z.catalogo__licitacionObras == "si" ){
                            contador++;
                            tabla.insertAdjacentHTML('beforeend','<tr> <td><center>'+z.idActividad+'</center></td> <td><center>'+z.itemPreesupuestario+'</center></td> <td><center>'+z.nombreItem+'</center></td> <td><center>'+z.planificado+'</center></td>  <td><center>Licitación Obras</center></td> <td><center>'+z.catalogo__licitacionObras__objeto+'</center></td><td><center>'+z.catalogo__licitacionObras__monto+'</center></td> <td><center>'+z.catalogo__licitacionObras__proveedor+'</center></td> <td><center>'+z.catalogo__licitacionObras__rucProveedor+'</center></td> <td><center>'+z.catalogo__licitacionObras__texto+'</center></td> <td> <center><select id="cumpleMontoVigenteCP'+contador+'" name="cumpleMontoVigenteCP'+contador+'" class="ancho__total__input__selects"><option value="0">--Seleccione--</option><option value="Cumple">Cumple</option><option value="No Cumple">No Cumple</option><option value="N/A">N/A</option><option value="Parcialmente">Parcialmente</option></select></center> </td> <td> <center><select id="evidenciaRecurrenciaInfima'+contador+'" name="evidenciaRecurrenciaInfima'+contador+'" class="ancho__total__input__selects"><option value="0">--Seleccione--</option><option value="Cumple">Cumple</option><option value="No Cumple">No Cumple</option><option value="N/A">N/A</option><option value="Parcialmente">Parcialmente</option></select></center> </td> <td> <center><select id="procedimientosContratacionVer'+contador+'" name="procedimientosContratacionVer'+contador+'" class="ancho__total__input__selects"><option value="0">--Seleccione--</option><option value="si">si</option><option value="No">No</option></select></center> </td><td><textarea id="observacionCP'+contador+'" name="observacionCP'+contador+'" class="ancho__total__input" value=""></textarea></td></tr>');
                    
                        } 
                        if(z.catalogo__precioObras == "si" ){
                            contador++;
                            tabla.insertAdjacentHTML('beforeend','<tr> <td><center>'+z.idActividad+'</center></td> <td><center>'+z.itemPreesupuestario+'</center></td> <td><center>'+z.nombreItem+'</center></td> <td><center>'+z.planificado+'</center></td>  <td><center>Precio Fijo Obras</center></td> <td><center>'+z.catalogo__precioObras__objeto+'</center></td><td><center>'+z.catalogo__precioObras__monto+'</center></td> <td><center>'+z.catalogo__precioObras__proveedor+'</center></td> <td><center>'+z.catalogo__precioObras__rucProveedor+'</center></td> <td><center>'+z.catalogo__precioObras__texto+'</center></td> <td> <center><select id="cumpleMontoVigenteCP'+contador+'" name="cumpleMontoVigenteCP'+contador+'" class="ancho__total__input__selects"><option value="0">--Seleccione--</option><option value="Cumple">Cumple</option><option value="No Cumple">No Cumple</option><option value="N/A">N/A</option><option value="Parcialmente">Parcialmente</option></select></center> </td> <td> <center><select id="evidenciaRecurrenciaInfima'+contador+'" name="evidenciaRecurrenciaInfima'+contador+'" class="ancho__total__input__selects"><option value="0">--Seleccione--</option><option value="Cumple">Cumple</option><option value="No Cumple">No Cumple</option><option value="N/A">N/A</option><option value="Parcialmente">Parcialmente</option></select></center> </td><td> <center><select id="procedimientosContratacionVer'+contador+'" name="procedimientosContratacionVer'+contador+'" class="ancho__total__input__selects"><option value="0">--Seleccione--</option><option value="si">si</option><option value="No">No</option></select></center> </td> <td><textarea id="observacionCP'+contador+'" name="observacionCP'+contador+'" class="ancho__total__input" value=""></textarea></td></tr>');
                    
                        } 
                        if(z.catalogo__contratacionDirecta == "si" ){
                            contador++;
                            tabla.insertAdjacentHTML('beforeend','<tr> <td><center>'+z.idActividad+'</center></td> <td><center>'+z.itemPreesupuestario+'</center></td> <td><center>'+z.nombreItem+'</center></td> <td><center>'+z.planificado+'</center></td>  <td><center>Contratación Directa</center></td> <td><center>'+z.catalogo__contratacionDirecta__objeto+'</center></td><td><center>'+z.catalogo__contratacionDirecta__monto+'</center></td> <td><center>'+z.catalogo__contratacionDirecta__proveedor+'</center></td> <td><center>'+z.catalogo__contratacionDirecta__rucProveedor+'</center></td> <td><center>'+z.catalogo__contratacionDirecta__texto+'</center></td> <td> <center><select id="cumpleMontoVigenteCP'+contador+'" name="cumpleMontoVigenteCP'+contador+'" class="ancho__total__input__selects"><option value="0">--Seleccione--</option><option value="Cumple">Cumple</option><option value="No Cumple">No Cumple</option><option value="N/A">N/A</option><option value="Parcialmente">Parcialmente</option></select></center> </td> <td> <center><select id="evidenciaRecurrenciaInfima'+contador+'" name="evidenciaRecurrenciaInfima'+contador+'" class="ancho__total__input__selects"><option value="0">--Seleccione--</option><option value="Cumple">Cumple</option><option value="No Cumple">No Cumple</option><option value="N/A">N/A</option><option value="Parcialmente">Parcialmente</option></select></center> </td><td> <center><select id="procedimientosContratacionVer'+contador+'" name="procedimientosContratacionVer'+contador+'" class="ancho__total__input__selects"><option value="0">--Seleccione--</option><option value="si">si</option><option value="No">No</option></select></center> </td> <td><textarea id="observacionCP'+contador+'" name="observacionCP'+contador+'" class="ancho__total__input" value=""></textarea></td></tr>');
                    
                        } 
                        if(z.catalogo__contratacionListaCorta == "si"){
                            contador++;
                            tabla.insertAdjacentHTML('beforeend','<tr> <td><center>'+z.idActividad+'</center></td> <td><center>'+z.itemPreesupuestario+'</center></td> <td><center>'+z.nombreItem+'</center></td> <td><center>'+z.planificado+'</center></td>  <td><center>Lista Corta</center></td> <td><center>'+z.catalogo__contratacionListaCorta__objeto+'</center></td><td><center>'+z.catalogo__contratacionListaCorta__monto+'</center></td> <td><center>'+z.catalogo__contratacionListaCorta__proveedor+'</center></td> <td><center>'+z.catalogo__contratacionListaCorta__rucProveedor+'</center></td> <td><center>'+z.catalogo__contratacionListaCorta__texto+'</center></td> <td> <center><select id="cumpleMontoVigenteCP'+contador+'" name="cumpleMontoVigenteCP'+contador+'" class="ancho__total__input__selects"><option value="0">--Seleccione--</option><option value="Cumple">Cumple</option><option value="No Cumple">No Cumple</option><option value="N/A">N/A</option><option value="Parcialmente">Parcialmente</option></select></center> </td> <td> <center><select id="evidenciaRecurrenciaInfima'+contador+'" name="evidenciaRecurrenciaInfima'+contador+'" class="ancho__total__input__selects"><option value="0">--Seleccione--</option><option value="Cumple">Cumple</option><option value="No Cumple">No Cumple</option><option value="N/A">N/A</option><option value="Parcialmente">Parcialmente</option></select></center> </td><td> <center><select id="procedimientosContratacionVer'+contador+'" name="procedimientosContratacionVer'+contador+'" class="ancho__total__input__selects"><option value="0">--Seleccione--</option><option value="si">si</option><option value="No">No</option></select></center> </td> <td><textarea id="observacionCP'+contador+'" name="observacionCP'+contador+'" class="ancho__total__input" value=""></textarea></td></tr>');
                    
                        } 
                        if(z.catalogo__contratacionConcursoPu == "si" ){
                            contador++;
                            tabla.insertAdjacentHTML('beforeend','<tr> <td><center>'+z.idActividad+'</center></td> <td><center>'+z.itemPreesupuestario+'</center></td> <td><center>'+z.nombreItem+'</center></td> <td><center>'+z.planificado+'</center></td>  <td><center>Concurso Público</center></td> <td><center>'+z.catalogo__contratacionConcursoPu__objeto+'</center></td><td><center>'+z.catalogo__contratacionConcursoPu__monto+'</center></td> <td><center>'+z.catalogo__contratacionConcursoPu__proveedor+'</center></td> <td><center>'+z.catalogo__contratacionConcursoPu__rucProveedor+'</center></td> <td><center>'+z.catalogo__contratacionConcursoPu__texto+'</center></td> <td> <center><select id="cumpleMontoVigenteCP'+contador+'" name="cumpleMontoVigenteCP'+contador+'" class="ancho__total__input__selects"><option value="0">--Seleccione--</option><option value="Cumple">Cumple</option><option value="No Cumple">No Cumple</option><option value="N/A">N/A</option><option value="Parcialmente">Parcialmente</option></select></center> </td> <td> <center><select id="evidenciaRecurrenciaInfima'+contador+'" name="evidenciaRecurrenciaInfima'+contador+'" class="ancho__total__input__selects"><option value="0">--Seleccione--</option><option value="Cumple">Cumple</option><option value="No Cumple">No Cumple</option><option value="N/A">N/A</option><option value="Parcialmente">Parcialmente</option></select></center> </td> <td> <center><select id="procedimientosContratacionVer'+contador+'" name="procedimientosContratacionVer'+contador+'" class="ancho__total__input__selects"><option value="0">--Seleccione--</option><option value="si">si</option><option value="No">No</option></select></center> </td><td><textarea id="observacionCP'+contador+'" name="observacionCP'+contador+'" class="ancho__total__input" value=""></textarea></td></tr>');
                    
                        }

                    }
                
        
                },
                error:function(){
        
                }
                        
                });	

             

                var tbody = document.getElementById('tablaCalificacionContratacionPublica'); // Replace 'yourTbodyId' with the actual id of your tbody element

                    // Get the number of rows in the tbody
                    var rowCount = tbody.rows.length;

                    console.log("Number of rows in tbody: " + rowCount);
                    
  
              $(".footer__altos__indicadores").append('<tr><th colspan="2"><center>Total</center></th><th><center>'+parseFloat(sumaProgramado).toFixed(2)+'</center></th><th><center>'+parseFloat(sumaAlcanzado).toFixed(2)+'</center></th><th><center>'+parseFloat(porcentajeFinalAl).toFixed(2)+'</center></th></tr>');
              
              /*=====  End of Construción tablas de indicadores  ======*/
              
  
              if($("#idRolAd").val()=="7" || $("#idRolAd").val()==7){
  
                  // $(".superior__sin").remove();
                  // $(".superior__con").show();
  
                  
                  $(".superior__sin").show();
                  $(".superior__con").remove();
  
              }else{
  
                  $(".superior__sin").show();
                  $(".superior__con").remove();
  
              }
  
              if($("#idRolAd").val()=="4" || $("#idRolAd").val()==4){
  
                  $(".regresar__superior__prin").remove();
                  $(".regresar__superior__con").show();
  
              }else{
  
                  $(".regresar__superior__prin").show();
                  $(".regresar__superior__con").remove();
  
              }
  
          });	
  
          },
          error:function(){
  
          }
                  
      });	  	
  
    });
  
}


/*=============================
=            Función recomendar altos            =
=============================*/

var funcion__reasignar__contratacion_publica__unidos__altos__recomendados2023=function(tbody,table){

    $(tbody).on("click","button.reasignarTramites__seguimientosAltos__recomendados",function(e){
  
        e.preventDefault();
  
        var data=table.row($(this).parents("tr")).data();
  
  
        var paqueteDeDatos = new FormData();
  
        paqueteDeDatos.append('tipo','enviar__infor__data__seguimientos');
  
        paqueteDeDatos.append("idOrganismo",data[8]);
  
        paqueteDeDatos.append("periodo",data[12]);
  
        let idUsuarioC=$("#idUsuarioC").val();
  
        paqueteDeDatos.append("idUsuarioC",idUsuarioC);
  
      $.ajax({
  
          type:"POST",
          url:"modelosBd/POA_SEGUIMIENTO_REVISOR/selector.md.php",
          contentType: false,
          data:paqueteDeDatos,
          processData: false,
          cache: false, 
          success:function(response){
  
          $.getScript("layout/scripts/js/validacionBasica.js",function(){
  
              let elementos=JSON.parse(response);
  
              let envio__tecnicos=elementos['envio__tecnicos'];
              let zonal__eu=elementos['zonal__eu'];
              let documentos__tecnicos_Contratacion=elementos['documentos__tecnicos_Contratacion'];
              let documentos__tecnicos_actividad1=elementos['documentos__tecnicos_actividad1'];
              
              $("#organismoOculto__modal").val(data[8]);
              
  
              if($("#idRolAd").val()==4){
  
                  $(".direccion__seguimientos__ocultos").show();
                  
  
                  $("#selects__superiores__regresar").remove();
                  $("#selects__superiores").show();
  
                  $("#selects__superiores__regresar__coors").remove();
                  $("#selects__superiores__subsess").remove();

                  

                  if(parseInt(zonal__eu) > 1 && parseInt(zonal__eu) < 10){

                    $(".direccion__seguimientos__ocultos").hide();

                    $(".ocultosZonalesCoordinadorRecomendar").show();
                    
                  }
  
  
              }else if (zonal__eu==1 || zonal__eu=="1") {
  
                  $("#selects__superiores__regresar").show();
                  $("#selects__superiores").show();
  
                  $("#selects__superiores__regresar__coors").remove();
                  $("#selects__superiores__subsess").remove();
  
              }else{
  
                  $("#selects__superiores__regresar").remove();
                  $("#selects__superiores__regresar__coors").show();
  
                  $("#selects__superiores").remove();
                  $("#selects__superiores__subsess").show();
  
              }
  
              for (w of envio__tecnicos) {
  
                  $(".funcionario__recomendaste").text(w.nombreCompleto);
                  $(".fecha__recomendaste").text(w.fecha);
  
              }
  
              for (z of documentos__tecnicos_actividad1) {
  
                  $("#informe__recomendados").attr('href',''+$("#filesFrontend").val()+'seguimiento/informes__contratacion/'+z.archivo);
  
                  $(".observaciones__recomendaste").text(z.observacion);
                  $("#nombreDocumento_actividad1").val(z.archivo);
                  $(".recomendaciones__recomendaste").text(z.recomendacion);
  
              }

              for (z of documentos__tecnicos_Contratacion) {
  
                $("#informe__recomendadosContratacion").attr('href',''+$("#filesFrontend").val()+'seguimiento/informes__contratacion/'+z.archivo);

                $(".observaciones__recomendaste").text(z.observacion);
                $("#nombreDocumento_Contratacion").val(z.archivo);
                $(".recomendaciones__recomendaste").text(z.recomendacion);

              }
  
              if ($("#idRolAd").val()==7) {
  
                  $(".oculto__subsess__deseados").attr('style','visibility: hidden!important;');
  
              }
  
              $("#periodo").val(data[12]);
  
          });	
  
          },
          error:function(){
  
          }
                  
      });	  	
  
    });
  
  }
  

 /*=====  End of Funcion de contratacion_publica  ======*/

 
/*====================================================
=            Funcion de formativo-recreativo          =
====================================================*/

var funcion__reasignar__seguimientos__unidos__actividad__fisica2023=function(tbody,table){

    $(tbody).on("click","button.reasignarTramites__seguimientosActividad2023",function(e){
  
        e.preventDefault();
  
        var data=table.row($(this).parents("tr")).data();
  
  
        var paqueteDeDatos = new FormData();
  
        paqueteDeDatos.append('tipo','enviar__infor__data__seguimientos2');
  
        paqueteDeDatos.append("idOrganismo",data[18]);
  
        paqueteDeDatos.append("periodo",data[6]);

        paqueteDeDatos.append("tipo__dos", data[20]);

       
  
        console.log(data);
  
      $.ajax({
  
          type:"POST",
          url:"modelosBd/POA_SEGUIMIENTO_REVISOR/selector.md.php",
          contentType: false,
          data:paqueteDeDatos,
          processData: false,
          cache: false, 
          success:function(response){
  
          $.getScript("layout/scripts/js/validacionBasica.js",function(){
  
              var elementos=JSON.parse(response);

              console.log(elementos)
  
              var poa__invers=elementos['poa__invers'];
  
              var indicadores__altos=elementos['indicadores__altos'];
  
              var autogestionesV=elementos['autogestionesV'];

              var benficiarios__altos__formativos=elementos['benficiarios__altos__formativos'];

              var medallas__altos__formativos=elementos['medallas__altos__formativos'];

              var indicadores__act3_7_for_recreativo_alto=elementos['indicadores__act3_7_for_recreativo_alto'];

              
  
  
              $(".presupuesto__autogestion__asignado__pais__altos").text(autogestionesV);
              $("#presupuesto__autogestion__asignado__pais__altos").val(autogestionesV);
  
              /*==================================================
              =            Registrar datos necesarios            =
              ==================================================*/

              let porcenjate =parseFloat((parseFloat(autogestionesV) * 100) / parseFloat(poa__invers))
              
              $("#porcentajeAutogestion").val(porcenjate);
              $(".porcentajeAutogestion").text(porcenjate+"%");
             
  
  
              if (data[20]=="FORMATIVO") {
  
                if (data[0]=="PLANTA CENTRAL" || data[0]=="ZONAL 2" || data[0]=="ZONAL 3") {
                    $(".titulo__alto__rendimientos").append("<div class='col col-12 text-center'>SUBSECRETARIA DE DESARROLLO DE LA ACTIVIDAD FISICA</div><input type='hidden' id='subsecretarias__escritas' name='subsecretarias__escritas' value='SUBSECRETARIA DE DESARROLLO DE LA ACTIVIDAD FISICA'/>");
  
                    $(".titulo__alto__rendimientos").append("<div class='col col-12 text-center mt-2'>DIRECCION DE DEPORTE FORMATIVO Y EDUCACION FISICA</div><input type='hidden' id='direccion__escritas' name='direccion__escritas' value='DIRECCION DE DEPORTE FORMATIVO Y EDUCACION FISICA'/>");
  
                    $(".tabla__formativo__1").show();
                    $(".tabla__recreativo__1").remove();
    
    
                    $(".foramtivo__enlaces__medalleros").show();
                    $(".recreativo__enlaces__medalleros").remove();
    
                    $("#tipoAct").val("Formativo");
    
                    $("#rotulo__recomendado").val("formativo");
                }else{
                    $(".titulo__alto__rendimientos").append("<div class='col col-12 text-center'></div><input type='hidden' id='subsecretarias__escritas' name='subsecretarias__escritas' value='SUBSECRETARIA DE DESARROLLO DE LA ACTIVIDAD FISICA'/>");
  
                    $(".titulo__alto__rendimientos").append("<div class='col col-12 text-center mt-2'>COORDINACIÓN "+data[0]+"</div><input type='hidden' id='direccion__escritas' name='direccion__escritas' value='COORDINACIÓN "+data[0]+"'/>");
  
                    $(".tabla__formativo__1").show();
                    $(".tabla__recreativo__1").remove();
    
    
                    $(".foramtivo__enlaces__medalleros").show();
                    $(".recreativo__enlaces__medalleros").remove();
    
                    $("#tipoAct").val("Formativo");
    
                    $("#rotulo__recomendado").val("formativo");
                }
                 
  
              }else{

                if (data[0]=="PLANTA CENTRAL" || data[0]=="ZONAL 2" || data[0]=="ZONAL 3") {
                    $(".titulo__alto__rendimientos").append("<div class='col col-12 text-center'>SUBSECRETARIA DE DESARROLLO DE LA ACTIVIDAD FISICA</div><input type='hidden' id='subsecretarias__escritas' name='subsecretarias__escritas' value='SUBSECRETARIA DE DESARROLLO DE LA ACTIVIDAD FISICA'/>");
  
                    $(".titulo__alto__rendimientos").append("<div class='col col-12 text-center mt-2'>DIRECCION DE RECREACION</div><input type='hidden' id='direccion__escritas' name='direccion__escritas' value='DIRECCION DE RECREACION'/>");
  
                    $(".tabla__formativo__1").remove();
                    $(".tabla__recreativo__1").show();
    
                    $(".foramtivo__enlaces__medalleros").remove();
                    $(".recreativo__enlaces__medalleros").show();
    
                    $(".ocultos__paid__documentos").remove();
    
                    $("#tipoAct").val("Recreativo");
    
                    $("#rotulo__recomendado").val("recreativo");
                }else{
                    $(".titulo__alto__rendimientos").append("<div class='col col-12 text-center'></div><input type='hidden' id='subsecretarias__escritas' name='subsecretarias__escritas' value='SUBSECRETARIA DE DESARROLLO DE LA ACTIVIDAD FISICA'/>");
  
                    $(".titulo__alto__rendimientos").append("<div class='col col-12 text-center mt-2'>COORDINACIÓN "+data[0]+"</div><input type='hidden' id='direccion__escritas' name='direccion__escritas' value='COORDINACIÓN "+data[0]+"'/>");
  
                    $(".tabla__formativo__1").remove();
                    $(".tabla__recreativo__1").show();
    
                    $(".foramtivo__enlaces__medalleros").remove();
                    $(".recreativo__enlaces__medalleros").show();
    
                    $(".ocultos__paid__documentos").remove();
    
                    $("#tipoAct").val("Recreativo");
    
                    $("#rotulo__recomendado").val("recreativo");
                }
                
              }
  
  
              /*====================================
              =            Sacar siglas            =
              ====================================*/
              
            let palabras = $("#direccion__escritas").val();
            let array = palabras.split(" ");
            let total = array.length;
            let resultado = "";
               
              for (var i = 0; i < total; i++){
  
                  if (array[i].length>2) {
  
                      resultado += array[i][0];
  
                  }
  
              }
              
              $(".siglas__dinamicas").text(resultado+" - " +data[11]);	
  
              $("#siglas__dinamicas__inputs").val(resultado+" - " +data[11]);	
              
              /*=====  End of Sacar siglas  ======*/
  
              
              if (parseInt(data[10], 10)<10) {
  
                  $(".numerico__dinamicas").text("0"+data[10]);
  
                  $("#numerico__dinamicas__inputs").val("0"+data[10]);
  
              }else{
  
                  $(".numerico__dinamicas").text(data[10]);
  
                  $("#numerico__dinamicas__inputs").val(data[10]);
  
              }
  
  
              /*=====  End of Registrar datos necesarios  ======*/
  
  
              /*=====================================================
              =            Asignar datos del datatablets            =
              =====================================================*/
  
              $("#organismoOculto__modal").val(data[18]);
  
              $("#idOrganismo").val(data[18]);
  
              $(".periodo__evaluados__anuales").text(data[11]);
  
              $("#periodo__evaluados__anuales").val(data[11]);
  
              if (data[6]=="primerTrimestre") {
  
                $(".trimestre__evaluados__al").text("I TRIMESTRE");
                $("#trimestre__evaluados__al").val("I TRIMESTRE");

            }else if (data[6]=="segundoTrimestre") {


                $(".trimestre__evaluados__al").text("I SEMESTRE");
                $("#trimestre__evaluados__al").val("I SEMESTRE");

                $(".periodo__evaluado").text("ENERO - JUNIO");
                $("#periodo__evaluado").val("ENERO - JUNIO");

            }else if (data[6]=="tercerTrimestre") {

                $(".trimestre__evaluados__al").text("III TRIMESTRE");
                $("#trimestre__evaluados__al").val("III TRIMESTRE");

            }else if (data[6]=="cuartoTrimestre") {

                $(".trimestre__evaluados__al").text("II SEMESTRE");
                $("#trimestre__evaluados__al").val("II SEMESTRE");

                $(".periodo__evaluado").text("JULIO - DICIEMBRE");
                $("#periodo__evaluado").val("JULIO - DICIEMBRE");
            }


            $(".areaAccion").text(data[16]);
            $("#areaAccion").val(data[16]);

            $(".objetivoS").text(data[17]);
            $("#objetivoS").val(data[17]);

  
              $(".periodo__evaluados__anuales").text(data[11]);
  
              $("#periodo__evaluados__anuales").val(data[11]);
  
              $("#organismoOculto__modal").val(data[18]);
  
              $("#idOrganismo").val(data[18]);
  
              $("#periodo").val(data[6]);
  
              $(".nombre__organizacion__deportivas").text(data[2]);
  
              $("#nombre__organizacion__deportivas").val(data[2]);
  
              $(".ruc__organizacion__deportivas").text(data[1]);
  
              $("#ruc__organizacion__deportivas").val(data[1]);
  
              $(".presidente__organizacion__deportivas").text(data[12]);
  
              $("#presidente__organizacion__deportivas").val(data[12]);
  
              $(".correo__organizacion__deportivas").text(data[13]);
  
              $("#correo__organizacion__deportivas").val(data[13]);
  
              $(".direccion__organizacion__deportivas").text(data[14]);
  
              $("#direccion__organizacion__deportivas").val(data[14]);
  
              $(".provincia__organizacion__deportivas").text(data[3]);
  
              $("#provincia__organizacion__deportivas").val(data[3]);
  
              $(".canton__organizacion__deportivas").text(data[4]);
  
              $("#canton__organizacion__deportivas").val(data[4]);
  
              $(".parroquia__organizacion__deportivas").text(data[5]);
  
              $("#parroquia__organizacion__deportivas").val(data[5]);
  
              $(".barrio__organizacion__deportivas").text(data[15]);
  
              $("#barrio__organizacion__deportivas").val(data[15]);
  
              $(".presupuesto__asignado__pais__altos").text(poa__invers);
  
              $("#presupuesto__asignado__pais__altos").val(poa__invers);
  
              $("#idUSeguimientos").val($("#idUsuarioC").val());
  
  
              if ($("#idRolAd").val()=="7" || $("#idRolAd").val()==7) {
  
                  $(".fila__reasignar").show();
                  $(".fila__regresar__a").hide();
  
              }else if($("#idRolAd").val()=="2" || $("#idRolAd").val()==2 || $("#idRolAd").val()=="4" || $("#idRolAd").val()==4){
  
                  $(".fila__reasignar").show();
                  $(".fila__regresar__a").hide();
  
                  $(".reasignar__solo").removeClass('col');
  
                  $(".reasignar__solo").removeClass('col-2');
  
                  $(".reasignar__solo").addClass('col');
  
                  $(".reasignar__solo").addClass('col-6');
  
              }else{
  
                  $(".fila__reasignar").hide();
                  $(".fila__regresar__a").show();
  
              }
  
              if ($("#idRolAd").val()=="3" || $("#idRolAd").val()==3) {
  
                  $(".ocultos__en__altos").show();
  
              }else{
  
                  $(".ocultos__en__altos").remove();
  
              }
  
              /*=====  End of Asignar datos del datatablets  ======*/
  
              /*=========================================================
              =            Construción tablas de indicadores            =
              =========================================================*/
  
              let porcentajesCumplimientos=0;
  
              let div="";
              let div2="";
              let div3="";
  
              let sumaProgramado=0;
              let sumaAlcanzado=0;
  
              let porcentajeFinalAl=0;

              

              for (w of indicadores__act3_7_for_recreativo_alto) {
  

                porcentajesCumplimientos=(parseFloat(w.actividad3Registrado) / parseFloat(w.actividad3))*100;

                if (parseFloat(porcentajesCumplimientos).toFixed(2)>=85) {

                     div="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

                }else if (parseFloat(porcentajesCumplimientos).toFixed(2)>=70 && parseFloat(porcentajesCumplimientos).toFixed(2)<85) {

                     div="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";

                }else if (parseFloat(porcentajesCumplimientos).toFixed(2)<70) {

                     div="<div style='border-radius: 50%!important; margin-right:1em;  background:red; height:15px!important; width:15px!important;'></div>";

                }

                porcentajesCumplimientos2=(parseFloat(w.actividad7Registrado) / parseFloat(w.actividad7))*100;

                if (parseFloat(porcentajesCumplimientos2).toFixed(2)>=85) {

                     div2="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

                }else if (parseFloat(porcentajesCumplimientos2).toFixed(2)>=70 && parseFloat(porcentajesCumplimientos2).toFixed(2)<85) {

                     div2="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";

                }else if (parseFloat(porcentajesCumplimientos2).toFixed(2)<70) {

                     div2="<div style='border-radius: 50%!important; margin-right:1em;  background:red; height:15px!important; width:15px!important;'></div>";

                }

                porcentajesCumplimientos3=(parseFloat(w.actividad6Registrado) / parseFloat(w.actividad6))*100;

                if (parseFloat(porcentajesCumplimientos3).toFixed(2)>=85) {

                     div3="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

                }else if (parseFloat(porcentajesCumplimientos3).toFixed(2)>=70 && parseFloat(porcentajesCumplimientos3).toFixed(2)<85) {

                     div3="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";

                }else if (parseFloat(porcentajesCumplimientos3).toFixed(2)<70) {

                     div3="<div style='border-radius: 50%!important; margin-right:1em;  background:red; height:15px!important; width:15px!important;'></div>";

                }



                
                  $(".cuerpo__formativo__1").append('<tr><td> Número de beneficiarios de capacitaciones deportivas:</td><td>'+w.actividad3+'</td><td>'+w.actividad3Registrado+'</td><td><center><div style="display:flex!important;">'+div+" "+porcentajesCumplimientos+'%</div></center></td></tr>           <tr><td>Cantidad de implementación deportiva adquirida:</td><td>'+w.actividad7+'</td><td>'+w.actividad7Registrado+'</td><td><center><div style="display:flex!important;">'+div2+" "+porcentajesCumplimientos2+'%</div></center></td></tr>');
                
                  $(".cuerpo__recreativo__1").append('<tr><td> Número de beneficiarios de capacitaciones deportivas:</td><td>'+w.actividad3+'</td><td>'+w.actividad3Registrado+'</td><td><center><div style="display:flex!important;">'+div+" "+porcentajesCumplimientos+'%</div></center></td></tr>           <tr><td> Cantidad de implementación deportiva adquirida:</td><td>'+w.actividad7+'</td><td>'+w.actividad7Registrado+'</td><td><center><div style="display:flex!important;">'+div2+" "+porcentajesCumplimientos2+'%</div></center></td></tr>          <tr><td> Número de beneficiarios atendidos en eventos recreativos:</td><td>'+w.actividad6+'</td><td>'+w.actividad6Registrado+'</td><td><center><div style="display:flex!important;">'+div3+" "+porcentajesCumplimientos3+'%</div></center></td></tr>');
                

            }
  
              for (w of indicadores__altos) {
  
                  sumaProgramado=parseFloat(sumaProgramado) + parseFloat(w.totalProgramado);
                  sumaAlcanzado=parseFloat(sumaAlcanzado) + parseFloat(w.totalEjecutado);
  
                  porcentajesCumplimientos=(parseFloat(w.totalEjecutado) / parseFloat(w.totalProgramado))*100;
  
                  if (parseFloat(porcentajesCumplimientos).toFixed(2)>=85) {
  
                       div="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";
  
                  }else if (parseFloat(porcentajesCumplimientos).toFixed(2)>=70 && parseFloat(porcentajesCumplimientos).toFixed(2)<85) {
  
                       div="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";
  
                  }else if (parseFloat(porcentajesCumplimientos).toFixed(2)<70) {
  
                       div="<div style='border-radius: 50%!important; margin-right:1em;  background:red; height:15px!important; width:15px!important;'></div>";
  
                  }
  
  
  
                  $(".cuerpo__items__alto__rendimientos").append('<tr><td> 0'+w.idActividad+' - '+w.nombreIndicador+'</td><td>'+w.nombreIndicador+'</td><td>'+w.totalProgramado+'</td><td>'+w.totalEjecutado+'</td><td><center><div style="display:flex!important;">'+div+" "+porcentajesCumplimientos+'%</div></center></td></tr>');

              }
  

            if (benficiarios__altos__formativos!=undefined && benficiarios__altos__formativos!=null && benficiarios__altos__formativos!="" && benficiarios__altos__formativos!=" ") {
  
                for( w of benficiarios__altos__formativos){
                    $("#hombresB").val(w.hombres);
                    $("#mujeresB").val(w.mujeres);
                    $("#totalB").val(w.total);
                    $("#hombresB18").val(w.hombres18);
                    $("#mujeresB18").val(w.mujeres18);
                    $("#totalB18").val(w.total18);
                  }

            }else{

                $("#hombresB").val(0);
                    $("#mujeresB").val(0);
                    $("#totalB").val(0);
                    $("#hombresB18").val(0);
                    $("#mujeresB18").val(0);
                    $("#totalB18").val(0);
            
            }

            if (medallas__altos__formativos!=undefined && medallas__altos__formativos!=null && medallas__altos__formativos!="" && medallas__altos__formativos!=" ") {
  
                for (w of medallas__altos__formativos) {
  
                    $("#oro__alto").val(w.oro);
                    $("#plata__alto").val(w.plata);
                    $("#bronce__alto").val(w.bronce);

                }

            }else{

                $("#oro__alto").val(0);
                $("#plata__alto").val(0);
                $("#bronce__alto").val(0);

            }



            
          

              porcentajeFinalAl=(parseFloat(sumaAlcanzado)/parseFloat(sumaProgramado))*100;
  
              $(".footer__altos__indicadores").append('<tr><th colspan="2"><center>Total</center></th><th><center>'+parseFloat(sumaProgramado).toFixed(2)+'</center></th><th><center>'+parseFloat(sumaAlcanzado).toFixed(2)+'</center></th><th><center>'+parseFloat(porcentajeFinalAl).toFixed(2)+'</center></th></tr>');
              
              /*=====  End of Construción tablas de indicadores  ======*/
              
  
              if($("#idRolAd").val()=="7" || $("#idRolAd").val()==7){
  
                  $(".superior__sin").remove();
                  $(".superior__con").show();
  
              }else{
  
                  $(".superior__sin").show();
                  $(".superior__con").remove();
  
              }
  
              if($("#idRolAd").val()=="4" || $("#idRolAd").val()==4){
  
                  $(".regresar__superior__prin").remove();
                  $(".regresar__superior__con").show();
  
              }else{
  
                  $(".regresar__superior__prin").show();
                  $(".regresar__superior__con").remove();
  
              }
  
          });	
  
          },
          error:function(){
  
          }
                  
      });	  	
  
    });
  
}
  
  
  /*=====  End of Funcion de seguimiento altos  ======*/


/*===============================================================
=             Infraestructura RECIBIDOS           =
===============================================================*/


var funcion__reasignar__seguimientos__unidos__seguimientos__seguimientos__recomendados__formaRe__ins=function(tbody,table){
  
    $(tbody).on("click","button.reasignarTramites__seguimientosSeguimientos__recomendados__insta",function(e){

              
        e.preventDefault();
        var rol_usuario = $("#idRolAd").val();
        
        var data=table.row($(this).parents("tr")).data();
        
        var paqueteDeDatos = new FormData();
  
        paqueteDeDatos.append('tipo','enviar__infor__data__seguimientos__infraestructura');
  
        paqueteDeDatos.append("idOrganismos",data[17]);
        paqueteDeDatos.append("periodo",data[6]);
  
        console.log(data);

        $.ajax({
  
            type:"POST",
            url:"modelosBd/POA_SEGUIMIENTO_REVISOR/selector.md.php",
            contentType: false,
            data:paqueteDeDatos,
            processData: false,
            cache: false, 
            success:function(response){
                           
                   var elementos=JSON.parse(response);
                   
                    var indicadorInformacion1=elementos['indicadorInformacion1'];
                    var indicadorInformacion2=elementos['indicadorInformacion2'];
                    var indicadores__infraestructura_existe=elementos['indicadores__infraestructura_existe'];
                    var indicadores__mantenimiento__monto=elementos['indicadores__mantenimiento__monto']; 
                    
                    console.log(indicadores__infraestructura_existe)
                
                    if(indicadorInformacion1!="" && indicadorInformacion1!=" " && indicadorInformacion1!=undefined && indicadorInformacion1!=null){  
                        for (z of indicadorInformacion1) {         
                            $("#valor_1Programado").text("I: "+z.totalProgramado);
                            $("#valor_1Ejecutado").text("I: "+z.totalEjecutado);
                        }
                        $(".primerTrimestreIndicadores").show();
                    }else{
                        $(".primerTrimestreIndicadores").hide();
                    }                        
    
                    if(indicadorInformacion2!="" && indicadorInformacion2!=" " && indicadorInformacion2!=undefined && indicadorInformacion2!=null){  
                        for (z of indicadorInformacion2) {         
                            $("#valor_2Programado").text("II: "+z.totalProgramado);
                            $("#valor_2Ejecutado").text("II: "+z.totalEjecutado);
                        }
                        $(".segundoTrimestreIndicadores").show();
                    }else{
                        $(".segundoTrimestreIndicadores").hide();
                    }

                    var sumaProgramado=0;
                    var sumaAlcanzado=0;

                    for (w of indicadores__infraestructura_existe) {
  
                        sumaProgramado=parseFloat(sumaProgramado) + parseFloat(w.totalProgramado);
                        sumaAlcanzado=parseFloat(sumaAlcanzado) + parseFloat(w.totalEjecutado);
        
                        porcentajesCumplimientos=(parseFloat(w.totalEjecutado) / parseFloat(w.totalProgramado))*100;
        
                        if (parseFloat(porcentajesCumplimientos).toFixed(2)>=85) {
        
                             div="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";
        
                        }else if (parseFloat(porcentajesCumplimientos).toFixed(2)>=70 && parseFloat(porcentajesCumplimientos).toFixed(2)<85) {
        
                             div="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";
        
                        }else if (parseFloat(porcentajesCumplimientos).toFixed(2)<70) {
        
                             div="<div style='border-radius: 50%!important; margin-right:1em;  background:red; height:15px!important; width:15px!important;'></div>";
        
                        }
        
        
        
                        $(".cuerpo__items__indicadores__infraestructura").append('<tr><td>0'+w.idActividad+' - '+w.nombreIndicador+'</td><td>'+w.totalProgramado+'</td><td>'+w.totalEjecutado+'</td><td><center><div style="display:flex!important;">'+div+" "+porcentajesCumplimientos+'%</div></center></td></tr>');
      
                       
                       
                       
        
                    }

                   
                    
            $("#poaInfraSeguimiento").attr("idOrganismo",data[17]);
            $("#idOrganismo").val(data[17]);
            $("#periodo").val(data[6]);
            $("#idUSeguimientos").val($("#idUsuarioC").val());
            $("#tipoAct").val(data[19]);
            console.log("QUIERO OCULTAR BOTONES");
            console.log(data[16],data[5],data[18]);
            console.log(data[17],data[6],data[19]);
    
            if ($("#idRolAd").val()==4) {
                $(".ocultar_boton_no_corresponde").hide();
                $(".ocultar_boton_no_corresponde_letras").hide();
                $(".oculto__file__recomendaciones").hide();
                $(".fila__reasignar").show();
                $(".fila__regresar__a").remove();
    
            }else if($("#idRolAd").val()==2){
                $(".ocultar_boton_no_corresponde").hide();
                $(".ocultar_boton_no_corresponde_letras").hide();
                $(".fila__regresar__a").show();
                $(".fila__reasignar").show();
                $(".oculto__file__recomendaciones").hide();
    
            }else if($("#idRolAd").val()==3){
    
                $(".fila__regresar__a").show();               
                $(".ocultar_boton_no_corresponde").hide();
                $(".ocultar_boton_no_corresponde_letras").hide();
                $(".observacionesReasignaciones").show();
                $(".fila__reasignar").remove();
    
            }
            $("#documentos__tecnicos__t__infras").text(" INFORME POA");

            $("#documentos__tecnicos__t__infras2").text(" INFORME AUXILIAR MANTENIMIENTO");


        },
        error:function(){

    }
    });
    
   // if(rol_usuario == 3){
        paqueteDeDatos.append('tipo','mostrar__infraestructura_indicadores');
        $.ajax({
    
            type:"POST",
            url:"modelosBd/POA_SEGUIMIENTO_REVISOR/selector.md.php",
            contentType: false,
            data:paqueteDeDatos,
            processData: false,
            cache: false, 
            success:function(response){
                var elementos=JSON.parse(response);
            console.log("RESPONSE")            
            console.log(response)     
            var indicadorInformacion=elementos['indicadorInformacion'];       
            var tabla = document.getElementById('infraestructura__intervenciones');   
            var datos = elementos.indicadorInformacion
            var contador = 1;
            var contadorIdOrganismo = data[17];

                for (z of indicadorInformacion) {
                    
                    
                        tabla.insertAdjacentHTML('beforeend','<tr><td>'+z.nombreInfras+'</td><td><center>'+z.tipoIntervencion+'</center></td><td><center>'+z.fecha+'</center></td><td><center>'+z.mensualEjecutado+'</center></td><td><center><a id="btn_doc_informe_ejecucion" class=" estilo__botonDatatablets btn btn-warning pointer__botones" data-bs-toggle="modal" data-bs-target="#doc_informe_ejecucion"><i class="fas fa-file"></i></a><center></td><td><center><a  id="btn_doc_res_infor" class=" estilo__botonDatatablets btn btn-warning pointer__botones" data-bs-toggle="modal" data-bs-target="#doc_res_infor"><i class="fas fa-file"></i></a><center></td><td><center><a id="btn_doc_Otros" class="  estilo__botonDatatablets btn btn-warning pointer__botones" data-bs-toggle="modal" data-bs-target="#doc_Otros"><i class="fas fa-file"></i></a><center></td><td><center><select id="selectInfra'+z.idMantenimiento+'" name="selectInfra'+z.idMantenimiento+'" class="ancho__total__input__selects"><option value="Cumple">Cumple</option><option value="Hallazgo">Hallazgo</option><option value="No Presenta">No Presenta</option><option value="Información">Información</option><option value="No Aplica">No Aplica</option></select></center></td><td><a id="guardarinfra'+z.idMantenimiento+'" name="guardarinfra'+z.idMantenimiento+'" idContador="'+z.idMantenimiento+'" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i></a></td></tr>');

                        funcion_click_boton_modal_docs_datatable_Infra("#btn_doc_informe_ejecucion","divInformeEjecucion","#idTituloModalInformeEjecucion","Documentos Informe Ejecución","tablaDocumentosInformeEjecucion","tbodyDocumentosInformeEjecucion",["Documento","Trimestre"], "mostrar__infraestructura_documentos",$("#filesFrontend").val()+"seguimiento/otrosMantenimiento__tecnicos/" );
                        funcion_click_boton_modal_docs_datatable_Infra("#btn_doc_res_infor","divRespaldoInforme","#idTituloModalRespaldoInforme","Documentos Respaldo Informe","tablaDocumentosRespaldoInforme","tbodyDocumentosRespaldoInforme",["Documento","Trimestre"], "mostrar__infraestructura_documentos",$("#filesFrontend").val()+"seguimiento/otrosMantenimiento__tecnicos/" );
                        funcion_click_boton_modal_docs_datatable_Infra("#btn_doc_Otros","divOtrosDoc","#idTituloModalOtrosDoc","Documentos Otros","tablaDocumentosOtros","tbodyDocumentosOtros",["Documento","Trimestre"], "mostrar__infraestructura_documentos",$("#filesFrontend").val()+"seguimiento/otrosMantenimiento__tecnicos/" );
                        
                    
                  
                        var selectElement = document.getElementById('selectInfra' + z.idMantenimiento);
                    
                        
                        console.log("DATOS ID ORGANISMOsss");  
                        console.log(contadorIdOrganismo);  

                

                        $("#guardarinfra"+z.idMantenimiento).click(function(e) {

                            let idContador=$(this).attr('idContador');
                
                            let selectInfra= "selectInfra"+idContador;                    
                        
                            // funcion__guardado__reporte_infraestructura($("#guardarinfra"+z.idMantenimiento),$(".obligatorios"+idContador),[$("#selectInfra"+idContador).val(),contadorIdOrganismo],"seguimiento__infraestructura_reporte",$(".filaIndicadora"+idContador),$(".oculto__trimestrales"));
                            funcion__guardado__reporte_infraestructura($("#guardarinfra"+z.idMantenimiento),[$("#selectInfra"+idContador).val(),contadorIdOrganismo,idContador,data[6]],"seguimiento__infraestructura_reporte");

                            });
                            contador++;
                }           
    
            },
                error:function(){
    
            }
        }); /* fin ajax insercion */  
   

});
  
}


  

  
  
  /*=====  End of  formatos relacionales infraestructuras  ======*/


var funcion__reasignar__seguimiento__presupuestario_recibidos2023=function(tbody,table){

    $(tbody).on("click","button.reasignarTramites__seguimientos__Preupuestario__recib",function(e){
  
        e.preventDefault();
  
        var data=table.row($(this).parents("tr")).data();
  
   
        console.log(data[17],data[6],data[19]);
        console.log(data[16],data[5],data[18]);
        var paqueteDeDatos = new FormData();
  
        paqueteDeDatos.append('tipo','enviar__infor__data__seguimientos');
  
        paqueteDeDatos.append("idOrganismo",data[17]);
  
        paqueteDeDatos.append("periodo",data[6]);
  
        paqueteDeDatos.append("tipo__dos",data[19]);
  
        console.log(data);
        console.log("RESPONSE");
      $.ajax({
  
          type:"POST",
          url:"modelosBd/inserta/seleccionaAcciones.md.php",
          contentType: false,
          data:paqueteDeDatos,
          processData: false,
          cache: false, 
          success:function(response){
  
  console.log(response);
              $.getScript("layout/scripts/js/validacionBasica.js",function(){
                  
              var elementos=JSON.parse(response);
  
              var poa__invers=elementos['poa__invers'];
  
              var sumas__programados=elementos['sumas__programados'];
  
              var primer__sumas__p=elementos['primer__sumas__p'];
              var primer__sumas__e=elementos['primer__sumas__e'];
              var segundo__sumas__p=elementos['segundo__sumas__p'];
              var segundo__sumas__e=elementos['segundo__sumas__e'];
              var tercero__sumas__p=elementos['tercero__sumas__p'];
              var tercero__sumas__e=elementos['tercero__sumas__e'];
              var cuarto__sumas__p=elementos['cuarto__sumas__p'];
              var cuarto__sumas__e=elementos['cuarto__sumas__e'];
  
              var varaible__culminados=elementos['varaible__culminados'];
              var documentos__tecnicos__2=elementos['documentos__tecnicos__2'];
  
              var variable__1__suma__programados=elementos['variable__1__suma__programados'];
              var variable__1__suma__ejecutado=elementos['variable__1__suma__ejecutado'];
              var variable__1__suma__planificado=elementos['variable__1__suma__planificado'];
  
              $("#presupuesto__segun__poas").val(poa__invers);
  
  
              if ($("#idRolAd").val()==2 && $("#fisicamenteE").val()==20) {
  
                  $(".fila__reasignar").show();
                  $(".fila__regresar__a").hide();
  
              }else if($("#idRolAd").val()==3 && $("#fisicamenteE").val()==20){
  
                  $(".fila__reasignar").hide();
                  $(".fila__regresar__a").show();
  
              }
  
              $("#tipos__nomenclaturas").val(data[18]);
  
              /*====================================
              =            Sacar siglas            =
              ====================================*/
              
                let palabras = data[2];
              let array = palabras.split(" ");
              let total = array.length;
              let resultado = "";
               
              for (var i = 0; i < total; i++){
  
                  if (array[i].length>2) {
  
                      resultado += array[i][0];
  
                  }
  
              }
              
              $(".siglas__dinamicas").text(resultado);	
  
              $("#siglas__dinamicas__inputs").val(resultado);	
              
              /*=====  End of Sacar siglas  ======*/
              
          /*=========================================
          =            Evaluar los datos            =
          =========================================*/
          
              
          if (parseInt(data[9], 10)<10) {
  
              $(".numerico__dinamicas").text("0"+data[9]);
  
              $("#numerico__dinamicas__inputs").val("0"+data[9]);
  
          }else{
  
              $(".numerico__dinamicas").text(data[9]);
  
              $("#numerico__dinamicas__inputs").val(data[9]);
  
          }
  
          $(".periodo__evaluados__anuales").text(data[10]);
  
          $("#periodo__evaluados__anuales").val(data[10]);
  
          $("#organismoOculto__modal").val(data[17]);
  
          $("#idOrganismo").val(data[18]);
  
          $(".nombre__organizacion__deportivas").text(data[2]);
  
          $("#nombre__organizacion__deportivas").val(data[2]);
  
          $(".ruc__organizacion__deportivas").text(data[1]);
  
          $("#ruc__organizacion__deportivas").val(data[1]);
  
          $(".presidente__organizacion__deportivas").text(data[11]);
  
          $("#presidente__organizacion__deportivas").val(data[11]);
  
          $(".correo__organizacion__deportivas").text(data[12]);
  
          $("#correo__organizacion__deportivas").val(data[12]);
  
          $(".direccion__organizacion__deportivas").text(data[13]);
  
          $("#direccion__organizacion__deportivas").val(data[13]);
  
          $(".provincia__organizacion__deportivas").text(data[3]);
  
          $("#provincia__organizacion__deportivas").val(data[3]);
  
          $(".canton__organizacion__deportivas").text(data[4]);
  
          $("#canton__organizacion__deportivas").val(data[4]);
  
          $(".parroquia__organizacion__deportivas").text(data[5]);
  
          $("#parroquia__organizacion__deportivas").val(data[5]);
  
          $(".barrio__organizacion__deportivas").text(data[14]);
  
          $("#barrio__organizacion__deportivas").val(data[14]);
  
          $(".area__de__accion__llamados").text(data[15]);
  
          $("#area__de__accion__llamados").val(data[15]);
  
          $(".objetivo__institucional__estrategicos").text(data[16]);
  
          $("#objetivo__institucional__estrategicos").val(data[16]);
  
          if (data[6]=="primerTrimestre") {
  
              $("#periodo__evaluado").val("ENERO - JUNIO");
  
          }else if (data[6]=="segundoTrimestre") {
  
              $("#periodo__evaluado").val("ENERO - JUNIO");
  
          }else if (data[6]=="tercerTrimestre") {
  
              $("#periodo__evaluado").val("JULIO - DICIEMBRE");
  
          }else if (data[6]=="cuartoTrimestre") {
  
              $("#periodo__evaluado").val("JULIO - DICIEMBRE");
  
          }
  
          if (data[18]=="si") {
  
              $(".con__sin__e").text("Con e-SIGEF2");
  
          }else{
  
              $(".con__sin__e").text("Sin e-SIGEF2");
  
          }
  
          $("#periodo").val(data[6]);
  
          let idUsuariosC=$("#idUsuarioC").val();
  
          $("#idUSeguimientos").val(idUsuariosC);
          
          /*=====  End of Evaluar los datos  ======*/
  
          if ($("#idRolAd").val()==3) {
  
              $(".observacionesReasignaciones").hide();
  
          }else{
  
              $(".observacionesReasignaciones").show();
  
          }
  
          /*======================================
          =            Armando tablas            =
          ======================================*/
  
          let porcentajes=0;
          let porcentajesExigefts=0;
  
          let planificadoA=0;
          let programadoA=0;
          let ejecuadoA=0;
          let exigeftA=0;
  
          let programadoAB=0;
  
          $.getScript("layout/scripts/js/validacionesGenerales.js",function(){
  
              for (w of sumas__programados) {
  
                  programadoAB=programadoAB+parseFloat(w.programado).toFixed(2);
  
              }
  
              let div="";
  
              let porcentajeA1 = new Array();
  
              let programado1=0;
              let programado2=0;
              let programado3=0;
              let programado4=0;
  
              let ejecutado1=0;
              let ejecutado2=0;	
              let ejecutado3=0;
              let ejecutado4=0;
  
  
              for (z of sumas__programados) {
  
                  planificadoA=parseFloat(planificadoA)+parseFloat(z.sumaPlanificacion);
                  programadoA=parseFloat(programadoA)+parseFloat(z.programado);
                  ejecuadoA=parseFloat(ejecuadoA)+parseFloat(z.ejecutado);
  
  
                  porcentajes=(parseFloat(z.ejecutado)/parseFloat(z.programado)) * 100;
  
                  porcentajeA1.push(parseFloat(porcentajes).toFixed(2));
  
                  if (parseFloat(porcentajes).toFixed(2)>=85) {
  
                       div="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";
  
                  }else if (parseFloat(porcentajes).toFixed(2)>=70 && parseFloat(porcentajes).toFixed(2)<85) {
  
                       div="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";
  
                  }else if (parseFloat(porcentajes).toFixed(2)<70) {
  
                       div="<div style='border-radius: 50%!important; margin-right:1em;  background:red; height:15px!important; width:15px!important;'></div>";
  
                  }
  
                  if (isNaN(porcentajes)) {
                      porcentajes=0;
                  }
  
  
                  if (data[18]=="si") {
  
                      $(".cuerpo__matricez__seguimientos").append('<tr><td><center>'+z.actividades+'</center></td><td style="display:none!important;"><center>'+parseFloat(z.sumaPlanificacion).toFixed(2)+'</center></td><td><center><input type="text" class="ancho__total__input solo__numero__montos porcs__esigeftes__iniciales__montos__programados" id="porcentajes__esigefts__nomenclaturas__programados'+z.idActividad+'"  value="'+parseFloat(z.programado).toFixed(2)+'"></center></td><td><center>'+parseFloat(z.ejecutado).toFixed(2)+'</center></td><td><center><div style="display:flex!important;">'+div+" "+'<input type="text" class="ancho__total__input solo__numero__montos porcs__esigeftes__iniciales__montos" id="porcentajes__esigefts__nomenclaturas'+z.idActividad+'"  value="'+parseFloat(porcentajes).toFixed(2)+'"><span>%</span></div></center></td><td><center><input type="text" class="ancho__total__input solo__numero__montos sumadores__exigets__ex" id="input__esigets'+z.idActividad+'" idEjecutados="'+parseFloat(z.programado).toFixed(2)+'" idContador="'+z.idActividad+'" value="0"/></center></td><td><center><div style="display:flex!important;"><span class="circulos__'+z.idActividad+'"></span><input type="text" class="ancho__total__input solo__numero__montos porcs__esigeftes" id="porcentajes__esigefts'+z.idActividad+'"  value="0"><span>%</span></div></center></td></tr>');
  
                  }else{
  
                      $(".cuerpo__matricez__seguimientos").append('<tr><td><center>'+z.actividades+'</center></td><td style="display:none!important;"><center>'+parseFloat(z.sumaPlanificacion).toFixed(2)+'</center></td><td><center><input type="text" class="ancho__total__input solo__numero__montos porcs__esigeftes__iniciales__montos__programados" id="porcentajes__esigefts__nomenclaturas__programados'+z.idActividad+'"  value="'+parseFloat(z.programado).toFixed(2)+'"></center></td><td><center>'+parseFloat(z.ejecutado).toFixed(2)+'</center></td><td><center><div style="display:flex!important;">'+div+" "+'<input type="text" class="ancho__total__input solo__numero__montos porcs__esigeftes__iniciales__montos" id="porcentajes__esigefts__nomenclaturas'+z.idActividad+'"  value="'+parseFloat(porcentajes).toFixed(2)+'"><span>%</span></div></center></td></tr>');
  
                      $(".oculto__sin__esiguefts").hide();
  
  
                  }
  
              
                  $("#porcentajes__esigefts__nomenclaturas__programados"+z.idActividad).on('input', function () {
  
                      let porcentajeExigefA1Programados = new Array();
  
   
                      $(".porcs__esigeftes__iniciales__montos__programados").each(function(){
  
                          porcentajeExigefA1Programados.push($(this).val());
  
                      });
  
                      $("#arrayPorcenEsigefts__programados").val(porcentajeExigefA1Programados);
  
                  });                
              
                  $("#porcentajes__esigefts"+z.idActividad).on('input', function () {
  
                      let porcentajeExigefA1 = new Array();
  
   
                      $(".porcs__esigeftes").each(function(){
  
                          porcentajeExigefA1.push($(this).val());
  
                      });
  
                      $("#arrayPorcenEsigefts").val(porcentajeExigefA1);
  
                  });
  
  
                  $("#procentajeSas").removeAttr('readonly');
                  $("#montosExig").removeAttr('readonly');
                  $("#procentajeExigefSas").removeAttr('readonly');
  
                  funcion__solo__numero__montos($(".solo__numero__montos"));
  
                  
  
                  funcion__cambio__de__numero($("#input__esigets"+z.idActividad));
  
                  $("#porcentajes__esigefts__nomenclaturas"+z.idActividad).on('input', function () {
  
                      let arrayAnadidosIniciales = new Array();
  
  
                      $(".porcs__esigeftes__iniciales__montos").each(function(){
  
                          arrayAnadidosIniciales.push($(this).val());
  
                      });
  
                      $("#arrayPorcen__inicializados").val(arrayAnadidosIniciales);
                      
  
  
                  });
  
                  $("#input__esigets"+z.idActividad).on('input', function () {
  
  
                      let esigefA1 = new Array();
                      let porcentajeExigefA1 = new Array();
  
   
  
                      let sum=0;
  
                      let idContador=$(this).attr('idContador');
                      let idEjecutados=$(this).attr('idEjecutados');
  
                      let per=0;
                      let per2=0;
  
                      per=(parseFloat($(this).val())/parseFloat(idEjecutados)) * 100;
  
                      $("#porcentajes__esigefts"+idContador).val(parseFloat(per).toFixed(2));
  
  
                      $(".porcs__esigeftes").each(function(){
  
                          porcentajeExigefA1.push($(this).val());
  
                      });
  
  
                      $(".sumadores__exigets__ex").each(function(){
  
                          sum += parseFloat($(this).val());
  
                          esigefA1.push($(this).val());
  
                      });
  
  
  
                      $("#montosExig").val(parseFloat(sum).toFixed(2));
  
                      per2=(parseFloat(sum)/parseFloat(programadoAB)) * 100;
  
                      $("#procentajeExigefSas").val(parseFloat(per2).toFixed(2));
  
                      $("#arrayEsigefts").val(esigefA1);
                      $("#arrayPorcenEsigefts").val(porcentajeExigefA1);
  
  
                      $(".circulos__"+idContador).html(" ");
  
                      $("#procentajeSas").removeAttr('readonly');
  
                      $("#montosExig").removeAttr('readonly');
  
                      $("#procentajeExigefSas").removeAttr('readonly');
  
                      let div="";
  
                      if (parseFloat(per).toFixed(2)>=85) {
  
                           div="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";
  
                      }else if (parseFloat(per).toFixed(2)>=70 && parseFloat(per).toFixed(2)<85) {
  
                           div="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";
  
                      }else if (parseFloat(per).toFixed(2)<70) {
  
                           div="<div style='border-radius: 50%!important; margin-right:1em;  background:red; height:15px!important; width:15px!important;'></div>";
  
                      }
  
                      $(".circulos__"+idContador).append(div);
  
  
                  });
  
              }
  
              $("#arrayPorcen").val(porcentajeA1);
  
              let porcentajesZA=0;
  
              porcentajesZA=(parseFloat(variable__1__suma__ejecutado)/parseFloat(variable__1__suma__programados)) * 100;
  
              $("#monto__ejecutado__trimestre").val(parseFloat(programadoA).toFixed(2));
  
              $("#monto__reportado__tri").val(parseFloat(ejecuadoA).toFixed(2));
  
              let porcentajesAdminRealizados=(parseFloat(ejecuadoA) / parseFloat(programadoA)) * 100;
  
              if (data[18]=="si") {
  
                  $(".footer__matricez__seguimientos").append('<tr><th><center>Total</center></th><th style="display:none!important;"><center><input type="text" id="planificadoSas" name="planificadoSas" value="'+parseFloat(planificadoA).toFixed(2)+'" style="border:none!important; color:black!important;" /></center></th><th ><center><input type="text" id="programadoSas" name="programadoSas" value="'+parseFloat(programadoA).toFixed(2)+'" style="border:none!important; color:black!important;" /></center></th><th><center><input type="text" id="ejecutadoSas" name="ejecutadoSas" value="'+parseFloat(ejecuadoA)+'" style="border:none!important;color:black!important;" /></center></th><th><center><input type="text" id="procentajeSas" name="procentajeSas" value="'+parseFloat(porcentajesAdminRealizados).toFixed(2)+'" style="border:none!important; color:black!important;" /></center></th><th class="exigeft__fila__holguras"><center><input type="text" id="montosExig" name="montosExig" style="border:none!important; color:black!important;" value="0"  /><center></center></th><th class="exigeft__fila__holguras__porcentajes"><input type="text" id="procentajeExigefSas" name="procentajeExigefSas"  reandoly="" style="border:none!important; color:black!important;" value="0"/><center></th></tr>');
              }else{
  
                  $(".footer__matricez__seguimientos").append('<tr><th><center>Total</center></th><th style="display:none!important;"><center><input type="text" id="planificadoSas" name="planificadoSas" value="'+parseFloat(planificadoA).toFixed(2)+'" style="border:none!important; color:black!important;" /></center></th ><th><center><input type="text" id="programadoSas" name="programadoSas" value="'+parseFloat(programadoA).toFixed(2)+'" style="border:none!important; color:black!important;" /></center></th><th><center><input type="text" id="ejecutadoSas" name="ejecutadoSas" value="'+parseFloat(ejecuadoA).toFixed(2)+'" style="border:none!important;color:black!important;"/></center></th><th><center><input type="text" id="procentajeSas" name="procentajeSas" value="'+parseFloat(porcentajesAdminRealizados).toFixed(2)+'" style="border:none!important; color:black!important;"/></center></th></tr>');
  
  
              }
              
              /*=====  End of Armando tablas  ======*/
  
              $("#avance__trimestre__porcentaje").val($("#procentajeSas").val()+"%");
  
  
              if (data[6]=="primerTrimestre" || data[6]=="segundoTrimestre") {
  
                  /*============================================
                  =            Calculos programados            =
                  ============================================*/
              
                  programado1=(parseFloat($("#programadoSas").val())/parseFloat($("#presupuesto__segun__poas").val())) * 100;
                  
                  $("#primer__esperado").val(parseFloat(programado1).toFixed(2)+" %");
  
  
                  programado2=(parseFloat($("#programadoSas").val())/parseFloat($("#presupuesto__segun__poas").val())) * 100;

                  $("#segundo__esperado").val(parseFloat(programado2).toFixed(2)+" %");
  
                  $("#tercero__esperado").val("-");
  
                  $("#cuarto__esperado").val("-");
                  
                  /*=====  End of Calculos programados  ======*/
              
  
              }else{
  
                  /*============================================
                  =            Calculos programados            =
                  ============================================*/
              
                  programado1=(parseFloat($("#programadoSas").val())/parseFloat($("#presupuesto__segun__poas").val())) * 100;
                  $("#primer__esperado").val(parseFloat(programado1).toFixed(2)+" %");
  
  
                  programado2=(parseFloat($("#programadoSas").val())/parseFloat($("#presupuesto__segun__poas").val())) * 100;
                  $("#segundo__esperado").val(parseFloat(programado2).toFixed(2)+" %");
  
                  programado3=(parseFloat($("#programadoSas").val())/parseFloat($("#presupuesto__segun__poas").val())) * 100;
                  $("#tercero__esperado").val(parseFloat(programado3).toFixed(2)+" %");
  
  
                  programado4=(parseFloat($("#programadoSas").val())/parseFloat($("#presupuesto__segun__poas").val())) * 100;
                  $("#cuarto__esperado").val(parseFloat(programado4).toFixed(2)+" %");
                  
                  /*=====  End of Calculos programados  ======*/				
  
              }
  
  
              
              let montoEjecutadoU=$("#presupuesto__segun__poas").val();
  
              let ejecutadoSasU=$("#ejecutadoSas").val();
  
  
              if (data[6]=="primerTrimestre" || data[5]=="segundoTrimestre") {
  
  
                  /*===========================================
                  =            Calculos ejecutados            =
                  ===========================================*/
                  
                  ejecutado1=(parseFloat(ejecutadoSasU)/parseFloat(montoEjecutadoU)) * 100;
                  $("#primer__ejecucion").val(parseFloat(ejecutado1).toFixed(2)+" %");
  
                  /*=====  End of Calculos ejecutados  ======*/
  
                  ejecutado2=(parseFloat(ejecutadoSasU)/parseFloat(montoEjecutadoU)) * 100;
                  $("#segundo__ejecucion").val(parseFloat(ejecutado2).toFixed(2)+" %");
  
                  $("#cuarto__ejecucion").val("-");
  
                  $(".ejecutados__al__segundo").show();
  
              }else{
  
                  /*===========================================
                  =            Calculos ejecutados            =
                  ===========================================*/
                  
                  ejecutado1=(parseFloat(ejecutadoSasU)/parseFloat(montoEjecutadoU)) * 100;
                  $("#primer__ejecucion").val(parseFloat(ejecutado1).toFixed(2)+" %");
  
                  /*=====  End of Calculos ejecutados  ======*/
  
                  ejecutado2=(parseFloat(ejecutadoSasU)/parseFloat(montoEjecutadoU)) * 100;
                  $("#segundo__ejecucion").val(parseFloat(ejecutado2).toFixed(2)+" %");
  
                  $("#cuarto__ejecucion").val(parseFloat(ejecutado2).toFixed(2)+" %");
  
                  $(".ejecutados__al__cuarto").show();
                  $(".ejecutados__al__segundo").show();
  
              }
  
  
  
              if (data[18]=="no") {
  
                  $(".oculto__sin__esiguefts").remove();
  
              }
              
  
              console.log(data);
  
          });
  
          });
  
          },
          error:function(){
  
          }
                  
      });	  	
  
    });
  
  }

/*====================================================
=            Funcion de seguimiento altos            =
====================================================*/

var funcion__reasignar__seguimientos__unidos__altos2023=function(tbody,table){

    $(tbody).on("click","button.reasignarTramites__seguimientosAltos",function(e){
      console.log("FUNCION ALTO RENDIMIENTO 2")
        e.preventDefault();
  
        var data=table.row($(this).parents("tr")).data();
  
        console.log("Estos son los datos");
        console.log(data[16]);
        console.log(data[5]);
        console.log(data[18]);
        console.log("Estos son los NUEVOS datos");
        console.log(data[17]);
        console.log(data[6]);
        console.log(data[19]);
  
        var paqueteDeDatos = new FormData();
  
        paqueteDeDatos.append('tipo','enviar__infor__data__seguimientos2');
  
        paqueteDeDatos.append("idOrganismo",data[17]);
  
        paqueteDeDatos.append("periodo",data[6]);
  
        paqueteDeDatos.append("tipo__dos",data[19]);
  
        console.log(data);
  
  
      $.ajax({
  
          type:"POST",
          url:"modelosBd/POA_SEGUIMIENTO_REVISOR/selector.md.php",
          contentType: false,
          data:paqueteDeDatos,
          processData: false,
          cache: false, 
          success:function(response){
  
          $.getScript("layout/scripts/js/validacionBasica.js",function(){
  
              var elementos=JSON.parse(response);

              console.log("dsssss")

              console.log(elementos)
  
              var poa__invers=elementos['poa__invers'];
  
              var indicadores__altos=elementos['indicadores__altos'];
  
              var medallas__altos__sumas=elementos['medallas__altos__sumas'];
              var capacitadores__altos__sumas=elementos['capacitadores__altos__sumas'];
              var sumas__altos__beneficiarios=elementos['sumas__altos__beneficiarios'];
              var autogestionesV=elementos['autogestionesV'];
              var indicadores__act3_7_for_recreativo_alto=elementos['indicadores__act3_7_for_recreativo_alto'];
              
              
              /*==================================================
              =            Registrar datos necesarios            =
              ==================================================*/
              
              $(".titulo__alto__rendimientos").append("<div class='col col-12 text-center'>SUBSECRETARÍA DE DEPORTE DE ALTO RENDIMIENTO</div><input type='hidden' id='subsecretarias__escritas' name='subsecretarias__escritas' value='SUBSECRETARÍA DE ALTO RENDIMIENTO'/>");
  
  
              if ($("#fisicamenteE").val()=="12" || $("#fisicamenteE").val()=="24") {
  
                  $(".titulo__alto__rendimientos").append("<div class='col col-12 text-center mt-2'>DIRECCION DE DEPORTE CONVENCIONAL PARA EL ALTO RENDIMIENTO</div><input type='hidden' id='direccion__escritas' name='direccion__escritas' value='DIRECCION DE DEPORTE CONVENCIONAL PARA EL ALTO RENDIMIENTO'/>");
  
              }else{
  
                  $(".titulo__alto__rendimientos").append("<div class='col col-12 text-center mt-2'>DIRECCION DE DEPORTE PARA PERSONAS CON DISCAPACIDAD</div><input type='hidden' id='direccion__escritas' name='direccion__escritas' value='DIRECCION DE DEPORTE PARA PERSONAS CON DISCAPACIDAD'/>");
  
              }
  
  
  
              if ($("#idRolAd").val()==3) {
  
                  $(".observacionesReasignaciones").hide();
  
              }else{
  
                  $(".observacionesReasignaciones").show();
  
              }			
  
              /*====================================
              =            Sacar siglas            =
              ====================================*/
              
                let palabras = $("#direccion__escritas").val();
              let array = palabras.split(" ");
              let total = array.length;
              let resultado = "";
               
              for (var i = 0; i < total; i++){
  
                  if (array[i].length>2) {
  
                      resultado += array[i][0];
  
                  }
  
              }
              
              $(".siglas__dinamicas").text(resultado);	
  
              $("#siglas__dinamicas__inputs").val(resultado);	
              
              /*=====  End of Sacar siglas  ======*/
  
         
              if (parseInt(data[9], 10)<10) {
  
                  $(".numerico__dinamicas").text(data[10]+" - 0"+data[9]);
  
                  $("#numerico__dinamicas__inputs").val(data[10]+" - 0"+data[9]);
  
              }else{
  
                  $(".numerico__dinamicas").text(data[9]);
  
                  $("#numerico__dinamicas__inputs").val(data[9]);
  
              }
  
  
              /*=====  End of Registrar datos necesarios  ======*/
  
  
              /*=====================================================
              =            Asignar datos del datatablets            =
              =====================================================*/
  
              $("#organismoOculto__modal").val(data[17]);
  
              $("#idOrganismo").val(data[17]);
  
              $(".periodo__evaluados__anuales").text(data[10]);
  
              $("#periodo__evaluados__anuales").val(data[10]);
  
              if (data[6]=="primerTrimestre") {
  
                  $(".trimestre__evaluados__al").text("I TRIMESTRE");
                  $("#trimestre__evaluados__al").val("I TRIMESTRE");
  
              }else if (data[6]=="segundoTrimestre") {
  
                $(".periodo__evaluado").text("ENERO - JUNIO");
                $("#periodo__evaluado").val("ENERO - JUNIO");

            }else if (data[6]=="tercerTrimestre") {

                $(".trimestre__evaluados__al").text("III TRIMESTRE");
                $("#trimestre__evaluados__al").val("III TRIMESTRE");

            }else if (data[6]=="cuartoTrimestre") {

                $(".trimestre__evaluados__al").text("II SEMESTRE");
                $("#trimestre__evaluados__al").val("II SEMESTRE");

                $(".periodo__evaluado").text("JULIO - DICIEMBRE");
                $("#periodo__evaluado").val("JULIO - DICIEMBRE");
            }

              
              $(".areaAccion").text(data[15]);
              $("#areaAccion").val(data[15]);

              $(".objetivoS").text(data[16]);
              $("#objetivoS").val(data[16]);

              $(".oro").text(data[21]);
              $("#oro").val(data[21]);

              $(".periodo__evaluados__anuales").text(data[10]);
  
              $("#periodo__evaluados__anuales").val(data[10]);
  
              $("#organismoOculto__modal").val(data[17]);
  
              $("#idOrganismo").val(data[17]);
  
              $("#periodo").val(data[6]);
  
              $(".nombre__organizacion__deportivas").text(data[2]);
  
              $("#nombre__organizacion__deportivas").val(data[2]);
  
              $(".ruc__organizacion__deportivas").text(data[1]);
  
              $("#ruc__organizacion__deportivas").val(data[1]);
  
              $(".presidente__organizacion__deportivas").text(data[11]);
  
              $("#presidente__organizacion__deportivas").val(data[11]);
  
              $(".correo__organizacion__deportivas").text(data[12]);
  
              $("#correo__organizacion__deportivas").val(data[12]);
  
              $(".direccion__organizacion__deportivas").text(data[13]);
  
              $("#direccion__organizacion__deportivas").val(data[13]);
  
              $(".provincia__organizacion__deportivas").text(data[3]);
  
              $("#provincia__organizacion__deportivas").val(data[3]);
  
              $(".canton__organizacion__deportivas").text(data[4]);
  
              $("#canton__organizacion__deportivas").val(data[4]);
  
              $(".parroquia__organizacion__deportivas").text(data[5]);
  
              $("#parroquia__organizacion__deportivas").val(data[5]);
  
              $(".barrio__organizacion__deportivas").text(data[14]);
  
              $("#barrio__organizacion__deportivas").val(data[14]);
  
              $(".presupuesto__asignado__pais__altos").text(poa__invers);
  
              $("#presupuesto__asignado__pais__altos").val(poa__invers);
  
              $("#idUSeguimientos").val($("#idUsuarioC").val());
  
              if ($("#idRolAd").val()=="7" || $("#idRolAd").val()==7) {
  
                  $(".fila__reasignar").show();
                  $(".fila__regresar__a").hide();
  
              }else if($("#idRolAd").val()=="2" || $("#idRolAd").val()==2 || $("#idRolAd").val()=="4" || $("#idRolAd").val()==4){
  
                  $(".fila__reasignar").show();
                  $(".fila__regresar__a").show();
  
                  $(".reasignar__solo").removeClass('col');
  
                  $(".reasignar__solo").removeClass('col-2');
  
                  $(".reasignar__solo").addClass('col');
  
                  $(".reasignar__solo").addClass('col-6');
  
              }else{
  
                  $(".fila__reasignar").hide();
                  $(".fila__regresar__a").show();
  
              }
  
              if ($("#idRolAd").val()=="3" || $("#idRolAd").val()==3) {
  
                  $(".ocultos__en__altos").show();
  
              }else{
  
                  $(".ocultos__en__altos").remove();
  
              }
  
              /*=====  End of Asignar datos del datatablets  ======*/
  
              if (medallas__altos__sumas!=undefined && medallas__altos__sumas!=null && medallas__altos__sumas!="" && medallas__altos__sumas!=" ") {
  
                  for (w of medallas__altos__sumas) {
  
                      $("#oro__alto").val(w.oro);
                      $("#plata__alto").val(w.plata);
                      $("#bronce__alto").val(w.bronce);
  
                  }
  
              }else{
  
                  $("#oro__alto").val(0);
                  $("#plata__alto").val(0);
                  $("#bronce__alto").val(0);
  
              }


            if (capacitadores__altos__sumas!=undefined && capacitadores__altos__sumas!=null && capacitadores__altos__sumas!="" && capacitadores__altos__sumas!=" ") {
  
                for( w of capacitadores__altos__sumas){
                    $("#capacitadores").val(w.capacitadores);
                  }

            }else{

                $("#capacitadores").val(0);
            
            }

            
            if (sumas__altos__beneficiarios!=undefined && sumas__altos__beneficiarios!=null && sumas__altos__beneficiarios!="" && sumas__altos__beneficiarios!=" ") {
  
                for( w of sumas__altos__beneficiarios){
                    $("#hombresB").val(w.hombres);
                    $("#mujeresB").val(w.mujeres);
                    $("#totalBeneficiarios").val(w.totalBeneficiarios);
                }

                 
                   
              

            }else{
                
                $("#hombresB").val(0);
                $("#mujeresB").val(0);
                $("#totalBeneficiarios").val(0);
            
            }

            if (autogestionesV!=undefined && autogestionesV!=null && autogestionesV!="" && autogestionesV!=" ") {
  
             
                $("#autogestion").val(autogestionesV);
                $(".autogestion").text(autogestionesV);


            let porcenjate =parseFloat((parseFloat(autogestionesV) * 100) / parseFloat(poa__invers))
              
              $("#porcentajeAutogestion").val(porcenjate);
              $(".porcentajeAutogestion").text(porcenjate+"%");

            }else{

           
                $("#porcentajeAutogestion").val(0);
                $(".porcentajeAutogestion").text("0%");
                
                $("#autogestion").val(0);
                $(".autogestion").text(0);
            
            }
              
  
              /*=========================================================
              =            Construción tablas de indicadores            =
              =========================================================*/
  
              let porcentajesCumplimientos=0;
  
              let div="";
  
              let sumaProgramado=0;
              let sumaAlcanzado=0;
  
              let porcentajeFinalAl=0;
  
              for (w of indicadores__altos) {
  
                  sumaProgramado=parseFloat(sumaProgramado) + parseFloat(w.totalProgramado);
                  sumaAlcanzado=parseFloat(sumaAlcanzado) + parseFloat(w.totalEjecutado);
  
                  porcentajesCumplimientos=(parseFloat(w.totalEjecutado) / parseFloat(w.totalProgramado))*100;
  
                  if (parseFloat(porcentajesCumplimientos).toFixed(2)>=85) {
  
                       div="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";
  
                  }else if (parseFloat(porcentajesCumplimientos).toFixed(2)>=70 && parseFloat(porcentajesCumplimientos).toFixed(2)<85) {
  
                       div="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";
  
                  }else if (parseFloat(porcentajesCumplimientos).toFixed(2)<70) {
  
                       div="<div style='border-radius: 50%!important; margin-right:1em;  background:red; height:15px!important; width:15px!important;'></div>";
  
                  }
  
  
  
                  $(".cuerpo__items__alto__rendimientos").append('<tr><td>0'+w.idActividad+' - '+w.nombreIndicador+'</td><td>'+w.nombreIndicador+'</td><td>'+w.totalProgramado+'</td><td>'+w.totalEjecutado+'</td><td><center><div style="display:flex!important;">'+div+" "+porcentajesCumplimientos+'%</div></center></td></tr>');

                 
                 
                 
  
              }

              for (w of indicadores__act3_7_for_recreativo_alto) {
  

                porcentajesCumplimientos=(parseFloat(w.actividad3Registrado) / parseFloat(w.actividad3))*100;

                if (parseFloat(porcentajesCumplimientos).toFixed(2)>=85) {

                     div="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

                }else if (parseFloat(porcentajesCumplimientos).toFixed(2)>=70 && parseFloat(porcentajesCumplimientos).toFixed(2)<85) {

                     div="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";

                }else if (parseFloat(porcentajesCumplimientos).toFixed(2)<70) {

                     div="<div style='border-radius: 50%!important; margin-right:1em;  background:red; height:15px!important; width:15px!important;'></div>";

                }

                porcentajesCumplimientos2=(parseFloat(w.actividad7Registrado) / parseFloat(w.actividad7))*100;

                if (parseFloat(porcentajesCumplimientos2).toFixed(2)>=85) {

                     div2="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

                }else if (parseFloat(porcentajesCumplimientos2).toFixed(2)>=70 && parseFloat(porcentajesCumplimientos2).toFixed(2)<85) {

                     div2="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";

                }else if (parseFloat(porcentajesCumplimientos2).toFixed(2)<70) {

                     div2="<div style='border-radius: 50%!important; margin-right:1em;  background:red; height:15px!important; width:15px!important;'></div>";

                }

                porcentajesCumplimientos3=(parseFloat(w.actividad6Registrado) / parseFloat(w.actividad6))*100;

                if (parseFloat(porcentajesCumplimientos3).toFixed(2)>=85) {

                     div3="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

                }else if (parseFloat(porcentajesCumplimientos3).toFixed(2)>=70 && parseFloat(porcentajesCumplimientos3).toFixed(2)<85) {

                     div3="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";

                }else if (parseFloat(porcentajesCumplimientos3).toFixed(2)<70) {

                     div3="<div style='border-radius: 50%!important; margin-right:1em;  background:red; height:15px!important; width:15px!important;'></div>";

                }

                
                    $(".cuerpo__items__alto__rendimientos__indicadores").append('<tr><td> Número de beneficiarios de capacitaciones deportivas:</td><td>'+w.actividad3+'</td><td>'+w.actividad3Registrado+'</td><td><center><div style="display:flex!important;">'+div+" "+porcentajesCumplimientos+'%</div></center></td></tr>           <tr><td>Cantidad de implementación deportiva adquirida:</td><td>'+w.actividad7+'</td><td>'+w.actividad7Registrado+'</td><td><center><div style="display:flex!important;">'+div2+" "+porcentajesCumplimientos2+'%</div></center></td></tr>');
                
                

                }
  
              porcentajeFinalAl=(parseFloat(sumaAlcanzado)/parseFloat(sumaProgramado))*100;
  
              $(".footer__altos__indicadores").append('<tr><th colspan="2"><center>Total</center></th><th><center>'+parseFloat(sumaProgramado).toFixed(2)+'</center></th><th><center>'+parseFloat(sumaAlcanzado).toFixed(2)+'</center></th><th><center>'+parseFloat(porcentajeFinalAl).toFixed(2)+'</center></th></tr>');
              
              /*=====  End of Construción tablas de indicadores  ======*/
              
  
              if($("#idRolAd").val()=="7" || $("#idRolAd").val()==7){
  
                  // $(".superior__sin").remove();
                  // $(".superior__con").show();
  
                  
                  $(".superior__sin").show();
                  $(".superior__con").remove();
  
              }else{
  
                  $(".superior__sin").show();
                  $(".superior__con").remove();
  
              }
  
              if($("#idRolAd").val()=="4" || $("#idRolAd").val()==4){
  
                  $(".regresar__superior__prin").remove();
                  $(".regresar__superior__con").show();
  
              }else{
  
                  $(".regresar__superior__prin").show();
                  $(".regresar__superior__con").remove();
  
              }
  
          });	
  
          },
          error:function(){
  
          }
                  
      });	  	
  
    });
  
  }

  /*===============================================
=            Seguimientos recorridos            =
===============================================*/

var funcion__reasignar__seguimientos__recorridos2023=function(tbody,table){

    $(tbody).on("click","button.reasignar__seguimientos__recorridos__boton",function(e){

        var data=table.row($(this).parents("tr")).data();

        $("#idOrganismo").val(data[9])
        $("#periodo").val(data[10])

        var someTabTriggerEl = document.querySelector('#general-tab')
        var tab = new bootstrap.Tab(someTabTriggerEl)

        tab.show()

        var activeTabContent = $('#general-tab').attr('area');

        $('#tabChange').val(activeTabContent);

        $(".cuerpo__contenedor__recorridos tr").remove();

        var paqueteDeDatos = new FormData();

        paqueteDeDatos.append('tipo','enviar__infor__data__seguimientos__recorridos');
  
        paqueteDeDatos.append("idOrganismo",$("#idOrganismo").val());
  
        paqueteDeDatos.append("periodo", $("#periodo").val());

        paqueteDeDatos.append("area",$('#tabChange').val());

        $.ajax({
    
            type:"POST",
            url:"modelosBd/POA_SEGUIMIENTO_REVISOR/selector.md.php",
            contentType: false,
            data:paqueteDeDatos,
            processData: false,
            cache: false, 
            async:false,
            success:function(response){
    
            $.getScript("layout/scripts/js/validacionBasica.js",function(){
                    
                var elementos=JSON.parse(response);
    
                var envio__informaciones=elementos['envio__informaciones'];
    
                for (w of envio__informaciones) {
    
                    $(".cuerpo__contenedor__recorridos").append('<tr><td>'+w.fecha+'</td><td>'+w.tipo+'</td><td>'+w.estructura+'</td><td>'+w.usuarioActual+'</td><td>'+w.observacionesTecnicas+'</td></tr>')
    
                }
    
            });
    
            },
            error:function(){
    
            }
                    
        });	


    });
}

/*=====  End of Seguimientos recorridos  ======*/

  /*==============================================================
  =          TABLA DE INFRAESTRUCTURA INDICADORES                =
  ================================================================*/ 
  var mostrar__datos__infraestructura__indicadores__reporte=function(parametro1,parametro2,parametro3,tipo){

    $(parametro3).click(function(e) {

        // $(parametro1).html(' ');
        // $(".oculto__trimestrales").hide();

        var paqueteDeDatos = new FormData();

        paqueteDeDatos.append('tipo',tipo);
        paqueteDeDatos.append('idOrganismos',parametro2);

        $.ajax({

            type:"POST",
            url:"modelosBd/POA_SEGUIMIENTO_REVISOR/selector.md.php",
            contentType: false,
            data:paqueteDeDatos,
            processData: false,
            cache: false, 
            success:function(response){

                    var elementos=JSON.parse(response);

                    var indicadorInformacion=elementos['indicadorInformacion'];

                    for (z of indicadorInformacion) {
                                  
                            $(parametro1).append('<tr class="filaIndicadora'+z.idActividades+'"><td style="font-weight:bold;"><center>'+z.nombreInfras+'</center></td><td>'+z.tipoIntervencion+'</td><td>'+z.fecha+'</td><td>'+z.mensualEjecutado+'</td></tr>');
  

                           // funcion__cambio__de__numero($("#totalEjecutado"+z.idActividades));
                           //  funcion__solo__numero($(".solo__numeros"));

                             //funcion_porcentajes__colores($("#totalEjecutado"+z.idActividades),$("#totalProgramado"+z.idActividades).val(),$(".celdas"+z.idActividades),$(".rotulo"+z.idActividades),z.metaindicador);
                            
                            //  $("#guardar"+z.idActividades).click(function(e) {

                            //     let idContador=$(this).attr('idContador');
                            //     let parametro7=$(this).attr('parametro7');
                            //     let parametro8=$(this).attr('parametro8');

                            //     console.log(idContador,parametro7,parametro8)
                                
                            //     funcion__guardado__general2023($("#guardar"+idContador),$(".obligatorios"+idContador),[$("#totalProgramado"+idContador).val(),$("#totalEjecutado"+idContador).val(),parametro7,idContador,parametro8],$("#documentoSustento"+idContador),"seguimiento__indicadores2023",$(".filaIndicadora"+idContador),$(".oculto__trimestrales"));

                            // }); 
                        // }
                 

                    }	

            },
            error:function(){

            }
                
        });		

    });			

}



   var funcion__reasignar__seguimientos__unidos__seguimientos__seguimientos__recomendados__formaRe__instalaciones2023=function(tbody,table){

	$(tbody).on("click","button.reasignarTramites__seguimientosSeguimientos__recomendados__instalaciones2023",function(e){
	   console.log("FUNCION DE DATATABLE INFRAESTRUCTURA RECOMENDADOS")
		 e.preventDefault();
   
		 var data=table.row($(this).parents("tr")).data();
   
   
		 var paqueteDeDatos = new FormData();
   
		 paqueteDeDatos.append('tipo','enviar__infor__data__seguimientos');
   
		 paqueteDeDatos.append("idOrganismo",data[9]);
   
		 paqueteDeDatos.append("periodo",data[6]);
   
		 let idUsuarioC=$("#idUsuarioC").val();
   
		 paqueteDeDatos.append("idUsuarioC",idUsuarioC);
   
		 console.log(data);
	   console.log("ANtiguos data[4] , data[2])");
	   console.log(data[4],data[2]);
	   console.log("idUsuarioC");
	   console.log(idUsuarioC);
   
	   if ($("#idRolAd").val()==4) {
   
		   $(".recomendar__final__ins").remove();
		   // $(".recomendar__ins__ins").remove();
   
		   $(".eliminados__al__de").remove();
   
			$(".acciones__recomendaciones__finales").hide();
   
	   }
   
 
	   $.ajax({
   
		   type:"POST",
		   url:"modelosBd/POA_SEGUIMIENTO_REVISOR/selector.md.php",
		   contentType: false,
		   data:paqueteDeDatos,
		   processData: false,
		   cache: false, 
		   success:function(response){
   
		   $.getScript("layout/scripts/js/validacionBasica.js",function(){
   
   
			   let elementos=JSON.parse(response);
   
			   let envio__tecnicos__seguimientos__infraestructuras=elementos['envio__tecnicos__seguimientos__infraestructuras'];
               let envio__tecnicos__seguimientos__instalaciones=elementos['envio__tecnicos__seguimientos__instalaciones'];				
               
			   let estadoIR__estados=elementos['estadoIR__estados'];
			   let estadoINR__estados=elementos['estadoINR__estados'];
               let estadoI__estados=elementos['estadoI__estados'];
			   let estadoIN__estados=elementos['estadoIN__estados'];
   
			   let bandera__instalaciones1=false;
			   let bandera__infraestructuras1=false;
   
                if ($("#idRolAd").val()==4) {
                    
                    $(".recomendar__ins__ins").remove();
                    $(".eliminados__al__coordinador").show();
                    $(".recomendar__ins__coordinador").show();

                    if($("#fisicamenteE").val()>26 && $("#fisicamenteE").val()<34){
                        
                        $(".selects__superiores__regresar").hide();
                        $(".ocultosZonalesCoordinadorRecomendar").show();
                    }

                    console.log(envio__tecnicos__seguimientos__instalaciones.length)

                    if(envio__tecnicos__seguimientos__instalaciones.length <=0){
                        if (estadoINR__estados==null && estadoIN__estados==null) {
        
                            $("#documentos__tecnicos__t__infras__instalaciones").text('NO CORRESPONDE');
    
                            bandera__instalaciones1=true;
                            $(".documento__insta__coordinador").hide();

                        }else if($("#idUsuarioC").val()==estadoINR__estados){
    
    
                            $("#documentos__tecnicos__t__infras__instalaciones").attr('href',''+$("#filesFrontend").val()+'seguimiento/informesInstalaciones/'+z.documentoInstalaciones);
    
                            $("#documentos__tecnicos__t__infras__instalaciones").text('INFORME INSTALACIONES');
    
                            bandera__instalaciones1=true;
    
                            
                        }else{
    
                            $("#documentos__tecnicos__t__infras__instalaciones").text("NO PRESENTA");
    
                            bandera__infraestructuras1=false;
                            $(".documento__insta__coordinador").hide();
    
                        }
                    }

                    if(envio__tecnicos__seguimientos__instalaciones.length <=0){
                        if (estadoINR__estados==null && estadoIN__estados==null) {
        
                            $("#documentos__tecnicos__t__infras__instalaciones").text('NO CORRESPONDE');
    
                            bandera__instalaciones1=true;
                            $(".documento__insta__coordinador").hide();

                        }else if($("#idUsuarioC").val()==estadoINR__estados){
    
    
                            $("#documentos__tecnicos__t__infras__instalaciones").attr('href',''+$("#filesFrontend").val()+'seguimiento/informesInstalaciones/'+z.documentoInstalaciones);
    
                            $("#documentos__tecnicos__t__infras__instalaciones").text('INFORME INSTALACIONES');
    
                            bandera__instalaciones1=true;
    
                            
                        }else{
    
                            $("#documentos__tecnicos__t__infras__instalaciones").text("NO PRESENTA");
    
                            bandera__infraestructuras1=false;
                            $(".documento__insta__coordinador").hide();
    
                        }
                    }
   
                    for (z of envio__tecnicos__seguimientos__instalaciones) {

                        if (estadoINR__estados==null && estadoIN__estados==null) {
        
                            $("#documentos__tecnicos__t__infras__instalaciones").text('NO CORRESPONDE');
    
                            bandera__instalaciones1=true;
                            $(".documento__insta__coordinador").hide();

                        }else if($("#idUsuarioC").val()==estadoINR__estados){
    
    
                            $("#documentos__tecnicos__t__infras__instalaciones").attr('href',''+$("#filesFrontend").val()+'seguimiento/informesInstalaciones/'+z.documentoInstalaciones);
    
                            $("#documentos__tecnicos__t__infras__instalaciones").text('INFORME INSTALACIONES');
    
                            bandera__instalaciones1=true;
    
                            
                        }else{
    
                            $("#documentos__tecnicos__t__infras__instalaciones").text("NO PRESENTA");
    
                            bandera__infraestructuras1=false;
                            $(".documento__insta__coordinador").hide();
    
                        }
                    }

                    for (z of envio__tecnicos__seguimientos__infraestructuras) {
    
                        if (estadoIR__estados==null && estadoI__estados==null) {
        
                                $("#documentos__tecnicos__t__infras").text('NO CORRESPONDE');
        
                                bandera__infraestructuras1=true;

                               
                                $(".documento__infra__coordinador").hide();

                                

        
                        }else if($("#idUsuarioC").val()==estadoIR__estados){
        
                            $("#documentos__tecnicos__t__infras").attr('href',''+$("#filesFrontend").val()+'seguimiento/informesInfraestructuras/'+z.documentoInfras);
        
                                $("#documentos__tecnicos__t__infras").text("INFORME INFRAESTRUCTURA");
        
                            bandera__infraestructuras1=true;
        
                        }else{
        
                                $("#documentos__tecnicos__t__infras").text("NO PRESENTA");
        
                                bandera__infraestructuras1=false;
                                $(".documento__infra__coordinador").hide();
                        }
        
        
                       
        
                    }
   
				   if (bandera__infraestructuras1==false) {
   
					   $(".acciones__recomendaciones__finales").remove();
   
				   }else{
						$(".acciones__recomendaciones__finales").show();
				   }
   
				   
   
				}else if($("#idRolAd").val()==2){
   
   
                    if ($("#fisicamenteE").val()==6) {

                        
                        $(".insfraestructuras__re").remove();
    
                        for (z of envio__tecnicos__seguimientos__infraestructuras) {
    
    
                            $("#documentos__tecnicos__t__infras").attr('href',''+$("#filesFrontend").val()+'seguimiento/informesInfraestructuras/'+z.documentoInfras);
    
                            $("#documentos__tecnicos__t__infras").text("INFORME INFRAESTRUCTURA");
    
                        }

                        for (z of envio__tecnicos__seguimientos__instalaciones) {

                         
        
                                $("#documentos__tecnicos__t__infras__instalaciones").attr('href',''+$("#filesFrontend").val()+'seguimiento/informesInstalaciones/'+z.documentoInstalaciones);
        
                                $("#documentos__tecnicos__t__infras__instalaciones").text('INFORME INSTALACIONES');
        
                                bandera__instalaciones1=true;
        
                          
                        }
    
    
                        // $(".insfraestructuras__re").remove(); 
    
                    }else{
    
                        $(".instalaciones__re").remove();
    
                        
                        
                        for (z of envio__tecnicos__seguimientos__infraestructuras) {
    
    
                            $("#documentos__tecnicos__t__infras").attr('href',''+$("#filesFrontend").val()+'seguimiento/informesInfraestructuras/'+z.documentoInfras);
    
                            $("#documentos__tecnicos__t__infras").text("INFORME INFRAESTRUCTURA");
    
                        }

                        for (z of envio__tecnicos__seguimientos__instalaciones) {

                         
        
                                $("#documentos__tecnicos__t__infras__instalaciones").attr('href',''+$("#filesFrontend").val()+'seguimiento/informesInstalaciones/'+z.documentoInstalaciones);
        
                                $("#documentos__tecnicos__t__infras__instalaciones").text('INFORME INSTALACIONES');
        
                                bandera__instalaciones1=true;
        
                          
                        }
    
    
    
                    }
   
					$(".eliminados__al__de").show();
   
                    $(".recomendar__ins__ins").show();
   
   
   
				}
   
			
   
   
			   $("#organismoOculto__modal").val(data[9]);
			   $("#periodo").val(data[6]);
   
			   if ($("#idRolAd").val()==4) {
   
				   $(".fila__regresar__a").show();
   
			   }
   
		   });	
   
		   },
		   error:function(){
   
		   }
				   
	   });	  	
   
	 });
   
   }


/*==========================================================
=            Seguimientos__recorridos__bloqueos            =
==========================================================*/


var funcion__bloqueos__seguimientos2023=function(tbody,table){

    $(tbody).on("change","select.selectores__bloqueos__seguimiento",function(e){
  
        e.preventDefault();
  
        var data=table.row($(this).parents("tr")).data();
  
        var paqueteDeDatos2 = new FormData();
  
        let dato=$(this).val();
  
      paqueteDeDatos2.append('tipo','seguimiento__bloqueos');
      paqueteDeDatos2.append("idOrganismo",data[5]);
      paqueteDeDatos2.append("dato",dato);
  
      let attr=$(this).attr('attr');
  
      paqueteDeDatos2.append("attr",attr);
  
      $.ajax({
  
          type:"POST",
          url:"modelosBd/inserta/insertaAcciones.md.php",
          contentType: false,
          data:paqueteDeDatos2,
          processData: false,
          cache: false, 
          success:function(response){
  
              let elementos=JSON.parse(response);
  
              let mensaje=elementos['mensaje'];
  
              if(mensaje==1){
  
                  alertify.set("notifier","position", "top-center");
                  alertify.notify("Acción realizada correctamente", "success", 5, function(){});
  
  
              }
  
          },
          error:function(){
  
          }
                          
      });	  		
  
        console.log(data[5]);
  
  
    });
  
  }
  
  /*=====  End of Seguimientos__recorridos__bloqueos  ======*/
  
  /*===================================================================
=            Funciones realaciones seguimientos levantar           =
===================================================================*/

var funcion__reasignar__seguimientos__recorridos__anexos__reportes2023=function(tbody,table){

    $(tbody).on("click","button.reasignar__seguimientos__recorridos__boton__anexos__reportes",function(e){
  
        e.preventDefault();
  
        var paqueteDeDatos = new FormData();
  
        var data=table.row($(this).parents("tr")).data();
  
        let variableTrimestral=$(this).attr('idTrimestres');
  
        if (variableTrimestral==1) {
            trimestreN="Primer Trimestre";
        }else if (variableTrimestral==2){
            trimestreN="Segundo Trimestre";
        }else if (variableTrimestral==3){
            trimestreN="Tercer Trimestre";
        }else if (variableTrimestral==4){
            trimestreN="Cuarto Trimestre";
        }
  
        if (variableTrimestral==1) {
            trimestreN__2="primerTrimestre";
        }else if (variableTrimestral==2){
            trimestreN__2="segundoTrimestre";
        }else if (variableTrimestral==3){
            trimestreN__2="tercerTrimestre";
        }else if (variableTrimestral==4){
            trimestreN__2="cuartoTrimestre";
        }

        $("#trimestreN").val(trimestreN__2)
        $("#idOrganismo").val(data[8])
  
        let selector__anios__se=$("#selector__anios__se").val();
  
      var paqueteDeDatos2 = new FormData();
  
      paqueteDeDatos2.append('tipo','seguimiento__global__interacciones');
  
      paqueteDeDatos2.append("idOrganismo",data[8]);
      paqueteDeDatos2.append("anio2",selector__anios__se);
      paqueteDeDatos2.append("trimestres",trimestreN__2);
  
      $("#idOrganismo").val(data[8]);
      $("#trimestreEvaluadorDos").val(trimestreN__2);
  console.log("DATAAA")
  console.log(data)
  
      $.ajax({
  
          type:"POST",
          url:"modelosBd/inserta/seleccionaAcciones.md.php",
          contentType: false,
          data:paqueteDeDatos2,
          processData: false,
          cache: false, 
          success:function(response){
  
          let elementos=JSON.parse(response);

  
          let envio__informaciones=elementos['envio__informaciones'];
          let envio__informaciones__documentos=elementos['envio__informaciones__documentos'];
  
          $(".contendor__bodys__entrantes").append('<form class="col col-12 text-center mt-4" action="modelosBd/pdf/pdf.modelo.php" method="post"><input type="hidden" name="idOrganismo" value="'+data[7]+'" /><input type="hidden" id="tipoPdf" name="tipoPdf" value="documento__seguimiento__final" /><input type="hidden" id="trimestreEvaluadorDos" name="trimestreEvaluadorDos" value="'+trimestreN__2+'"/><button class="btn btn-info"><i class="fa fa-cloud" aria-hidden="true"></i>&nbsp;&nbsp;GENERAR PDF</button></form>');
          
  
          for(z of envio__informaciones){
  
              if (z.autogestionT==null || z.autogestionT==undefined || z.autogestionT=="" || z.autogestionT==" ") {
  
                      $(".autogestion__verificables").hide();
  
              }else{
  
                      $(".autogestion__verificables").show();
  
              }
  
              if (z.indicadoresT==null || z.indicadoresT==undefined || z.indicadoresT=="" || z.indicadoresT==" ") {
  
                      $(".indicadores__verificables").hide();
  
              }else{
  
                      $(".indicadores__verificables").show();
  
              }
  
              if (z.sueldosT==null || z.sueldosT==undefined || z.sueldosT=="" || z.sueldosT==" ") {
  
                      $(".sueldos__verificables").hide();
  
              }else{
  
                      $(".sueldos__verificables").show();
  
              }
  
              if (z.honorariosT==null || z.honorariosT==undefined || z.honorariosT=="" || z.honorariosT==" ") {
  
                      $(".honorarios__verificables").hide();
  
              }else{
  
                      $(".honorarios__verificables").show();
  
              }
  
  
              if (z.administrativoT==null || z.administrativoT==undefined || z.administrativoT=="" || z.administrativoT==" ") {
  
                      $(".administrativos__verificables").hide();
  
              }else{
  
                      $(".administrativos__verificables").show();
  
              }
  
              if (z.mantenimientoT==null || z.mantenimientoT==undefined || z.mantenimientoT=="" || z.mantenimientoT==" ") {
  
                      $(".mantenimiento__verificables").hide();
  
              }else{
  
                      $(".mantenimiento__verificables").show();
  
              }
  
  
              if (z.mantenimientoTT==null || z.mantenimientoTT==undefined || z.mantenimientoTT=="" || z.mantenimientoTT==" ") {
  
                      $(".mantenimientoTEC__verificables").hide();
  
              }else{
  
                      $(".mantenimientoTEC__verificables").show();
  
              }
  
  
              if (z.capacitacionT==null || z.capacitacionT==undefined || z.capacitacionT=="" || z.capacitacionT==" ") {
  
                      $(".capacitacion__verificables").hide();
  
              }else{
  
                      $(".capacitacion__verificables").show();
  
              }
  
              if (z.capacitacionTT==null || z.capacitacionTT==undefined || z.capacitacionTT=="" || z.capacitacionTT==" ") {
  
                      $(".capacitacionTecnicos__verificables").hide();
  
              }else{
  
                      $(".capacitacionTecnicos__verificables").show();
  
              }
  
              if (z.competenciaT==null || z.competenciaT==undefined || z.competenciaT=="" || z.competenciaT==" ") {
  
                      $(".competencias__verificables").hide();
  
              }else{
  
                      $(".competencias__verificables").show();
  
              }
  
              if (z.competenciaFor==null || z.competenciaFor==undefined || z.competenciaFor=="" || z.competenciaFor==" ") {
  
                      $(".competenciasForma__verificables").hide();
  
              }else{
  
                      $(".competenciasForma__verificables").show();
  
              }
  
  
              if (z.altoT==null || z.altoT==undefined || z.altoT=="" || z.altoT==" ") {
  
                      $(".competenciasAlto__verificables").hide();
  
              }else{
  
                      $(".competenciasAlto__verificables").show();
  
              }
  
              if (z.recreacionT==null || z.recreacionT==undefined || z.recreacionT=="" || z.recreacionT==" ") {
  
                      $(".recreativo__verificables").hide();
  
              }else{
  
                      $(".recreativo__verificables").show();
  
              }
  
              if (z.recreativosTT==null || z.recreativosTT==undefined || z.recreativosTT=="" || z.recreativosTT==" ") {
  
                      $(".recreativoTecnicos__verificables").hide();
  
              }else{
  
                      $(".recreativoTecnicos__verificables").show();
                      $(".recreativo__verificables").show();
  
              }
  
  
              if (z.implementacionT==null || z.implementacionT==undefined || z.implementacionT=="" || z.implementacionT==" ") {
  
                      $(".implementacion__verificables").hide();
  
              }else{
  
                      $(".implementacion__verificables").show();
  
              }
  
  
          }							
  
          $(".texto__evidenciales").text(data[2]+" ("+trimestreN+")");

          },
          error:function(){
  
          }
                      
      });	  	
        
    });
  
  }
  
  /*=====  End of Funciones realaciones seguimientos levantar  ======*/

    /*===================================================================
    =            Funciones realaciones seguimientos Reporte Anual   Revisor        =
    ===================================================================*/

    var funcion__reporte__seguimientos__anual__revisor2023=function(tbody,table){

        $(tbody).on("click","button.seguimientos__reporteria__anual",function(e){
    
            e.preventDefault();
    
            var paqueteDeDatos = new FormData();
    
            var data=table.row($(this).parents("tr")).data();
    
        var paqueteDeDatos2 = new FormData();
    
        paqueteDeDatos2.append('tipo','actividadesPoa__seguimiento__reporteria__anual_revisor');
    
        paqueteDeDatos2.append("idOrganismo",data[8]);

        $("#nombreOrganismo").text(data[2]);

        $("#idOrganismoReporteriaAnual").val(data[8]);
        
        $.ajax({
    
            type:"POST",
            url:"modelosBd/POA_SEGUIMIENTO_REVISOR/selector.md.php",
            contentType: false,
            data:paqueteDeDatos2,
            processData: false,
            cache: false, 
            async: false,
            success:function(response){
    
            let elementos=JSON.parse(response);
    
            let administrativo=elementos['administrativo'];
            let mantenimiento=elementos['mantenimiento'];
            let capacitacion=elementos['capacitacion'];
            let sueldos=elementos['sueldos'];
            let honorarios=elementos['honorarios'];
            let competencia=elementos['competencia'];
            let formativo=elementos['formativo'];
            let recreativo=elementos['recreativo'];
            let implementacion=elementos['implementacion'];

        
            console.log(administrativo.length)

            if(administrativo.length > 0){

                $("#administrativo").show()

            }
            if(mantenimiento.length > 0){

                $("#mantenimiento").show()

            }
            if(capacitacion.length > 0){

                $("#capacitacion").show()

            }
            if(sueldos.length > 0){

                $("#sueldos").show()

            }
            if(honorarios.length > 0){

                $("#honorarios").show()

            }
            if(competencia.length > 0){

                $("#competencia").show()

                if(formativo.length > 0){

                    $("#formativo").show()
    
                }else{
                    $("#altoRen").show()
                }

            }
            
            if(recreativo.length > 0){

                $("#recreacion").show()

            }
            if(implementacion.length > 0){

                $("#implementacion").show()

            }

    
            },
            error:function(){
    
            }
                        
        });	  	
            
        });
    
    }
    
    /*=====  End of Funciones realaciones seguimientos levantar  ======*/

    /*============================================
    =            Función de reamentes            =
    ============================================*/

    var funcion__remanentes__asignados2023=function(tbody,table){
        
        $(tbody).on("click","button.remantes__asignados2023",function(e){
            
        e.preventDefault();
    
        var data=table.row($(this).parents("tr")).data();
    
        $(".titulos__remanentes").text(data[2]);
    
        $("#organismoIdPrin__realizados").val(data[6]);
    
        console.log(data);
    
        });
    
    }
    
    
    /*=====  End of Función de reamentes  ======*/
  
    /*====================================================
=             Visualizar poas gestionados            =
====================================================*/

var funcionEditar__gestionados_s2023=function(tbody,table,parametro3,parametro4,parametro5){

    $(tbody).on("click","button.generarVerG",function(e){
  
        e.preventDefault();
  
        var data=table.row($(this).parents("tr")).data();
       var paqueteDeDatos = new FormData();
  
        paqueteDeDatos.append('idOrganismo',data[9]);
        paqueteDeDatos.append('tipo','seleccionasCoordinas');
  
        console.log("DATA");
        console.log(data);
      $.ajax({
  
          type:"POST",
          url:"modelosBd/inserta/seleccionaAcciones.md.php",
          contentType: false,
          data:paqueteDeDatos,
          processData: false,
          cache: false, 
          success:function(response){
  
              $.getScript("layout/scripts/js/validacionBasica.js",function(){
  
                  var elementos=JSON.parse(response);
  
                  var obtenernombre__organismos=elementos['obtenernombre__organismos'];
  
                  var obtenerArchivoCoordinas__infras=elementos['obtenerArchivoCoordinas__infras'];
                  var obtenerArchivoCoordinas__administrativos=elementos['obtenerArchivoCoordinas__administrativos'];
                  var obtenerArchivoCoordinas__subcess=elementos['obtenerArchivoCoordinas__subcess'];
  
                  var obtenerInformacion=elementos['obtenerInformacion'];
                  var indicadorInformacion=elementos['indicadorInformacion'];
  
                  if (!$(".creado__indefinidamentes").length > 0 ) {
  
                  $("#idOrganismoM").val(data[5]);
  
                  for (w of obtenernombre__organismos) {
  
                      $(".titulo__mS").text(w.nombreOrganismo);
  
                  }
  
                  $(".contenedor__bodyCMatriz").append('<div class="col col-6 letras__ver__poa text-center creados__letter creado__indefinidamentes" style="font-weight:bold; font-size:15px;">Ver POA</div><div class="col col-6"><button class="ver__Tabla btn btn-primary creados__letter" style="cursor:pointer;"><i class="fas fa-eye icono__boton"></i></button></div>');
  
  
                  $(".contenedor__bodyCMatriz").append('<button type="button" class="btn btn-success excelProyectos col col-1 elementosCreados__M"><i class="fas fa-file-excel"></i>&nbsp;&nbsp;EXCEL</button><table class="tabla__itemsM elementosCreados__M" style="margin-top:2em;" id="tablaPoaPrincipal"><thead><tr><th align="center">Actividad</th><th align="center">Item</th><th align="center">Enero</th><th align="center">Febrero</th><th align="center">Marzo</th><th align="center">Abril</th><th align="center">Mayo</th><th align="center">Junio</th><th align="center">Julio</th><th align="center">Agosto</th><th align="center">Septiembre</th><th align="center">Octubre</th><th align="center">Noviembre</th><th align="center">Diciembre</th><th align="center">Total</th></tr></thead></table><br><br>');
  
                  $(".elementosCreados__M").hide();			
  
                  for (c of obtenerInformacion) {
  
                      $(".tabla__itemsM").append('<tr><td>'+c.idActividades+"-"+c.nombreActividades+'</td><td>'+c.itemPreesupuestario+"-"+c.nombreItem+'</td><td><center>'+parseFloat(c.enero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.febrero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.marzo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.abril).toFixed(2)+'</center></td><td><center>'+parseFloat(c.mayo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.junio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.julio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.agosto).toFixed(2)+'</center></td><td><center>'+parseFloat(c.septiembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.octubre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.noviembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.diciembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.totalSumaItem).toFixed(2)+'</center></td></tr>');
  
  
                  }
  
  
                  execelGenerados($(".excelProyectos"),"tablaPoaPrincipal","poa");
  
                  verOjoContrasenas2($(".ver__Tabla"),$(".icono__boton"),$(".elementosCreados__M"),$(".letras__ver__poa"));						
  
  
                  for (x of obtenerArchivoCoordinas__infras) {
  
                      $(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center"><a href="'+$("#filesFrontend").val()+'informesTecnicos/'+x.documento+'" target="_blank">Documento coordinación de Instalaciones deportivas</a></div>');
  
                  }
  
  
  
                  for (y of obtenerArchivoCoordinas__administrativos) {
  
                      $(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center"><a href="'+$("#filesFrontend").val()+'informesTecnicos/'+y.documento+'" target="_blank">Documento coordinación financiera</a></div>');
  
                  }
  
                  for (z of obtenerArchivoCoordinas__subcess) {
  
                      $(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center"><a href="'+$("#filesFrontend").val()+'informesTecnicos/'+z.documento+'" target="_blank">Documento subsecretaría</a></div>');
  
                  }
  
  
                  }
  
  
              });
  
          },
          error:function(){
  
          }
  
      });
  
  
    });
  
  }
  
  /*=====  End of  Visualizar poas gestionados  ======*/

  /*==========================================
=             Actualizar nuevos            =
==========================================*/

var funcion__gestionados__i2023=function(tbody,table,parametro3,parametro4,parametro5){

    $(tbody).on("click","button.editarGestionados ",function(e){
  
      e.preventDefault();
  
      var data=table.row($(this).parents("tr")).data();
  
        $.getScript("layout/scripts/js/validacionBasica.js",function(){
  
            $("#organismoId").val(data[9]);
  
            $("#fecha__poasE").val(data[7]);
  
            $("#numeroResolucion__ed").val(data[5]);
  
            $("#notificado__sin").val(data[8]);
  
            /*==================================
            =            Checkboxes            =
            ==================================*/
            
          checkboxFunciones($("#aceptarDocumentos__c"),$(".documento__ocultos")); 	
            
            /*=====  End of Checkboxes  ======*/
            
            // console.log(data);
  
        });
  
    });
  
  }
  
  /*=====  End of  Actualizar nuevos  ======*/

  /*====================================================
=             Visualizar poas gestionados            =
====================================================*/

var funcionEditar__gestionados_s=function(tbody,table,parametro3,parametro4,parametro5){

    $(tbody).on("click","button.generarVerG",function(e){
  
        e.preventDefault();
  
        var data=table.row($(this).parents("tr")).data();
       var paqueteDeDatos = new FormData();
  
        paqueteDeDatos.append('idOrganismo',data[9]);
        paqueteDeDatos.append('tipo','seleccionasCoordinas');
        console.log("data REVISOR");
        console.log(data);
      $.ajax({
  
          type:"POST",
          url:"modelosBd/inserta/seleccionaAcciones.md.php",
          contentType: false,
          data:paqueteDeDatos,
          processData: false,
          cache: false, 
          success:function(response){
  
              $.getScript("layout/scripts/js/validacionBasica.js",function(){
  
                  var elementos=JSON.parse(response);
  
                  var obtenernombre__organismos=elementos['obtenernombre__organismos'];
  
                  var obtenerArchivoCoordinas__infras=elementos['obtenerArchivoCoordinas__infras'];
                  var obtenerArchivoCoordinas__administrativos=elementos['obtenerArchivoCoordinas__administrativos'];
                  var obtenerArchivoCoordinas__subcess=elementos['obtenerArchivoCoordinas__subcess'];
  
                  var obtenerInformacion=elementos['obtenerInformacion'];
                  var indicadorInformacion=elementos['indicadorInformacion'];
  
                  if (!$(".creado__indefinidamentes").length > 0 ) {
  
                  $("#idOrganismoM").val(data[5]);
  
                  for (w of obtenernombre__organismos) {
  
                      $(".titulo__mS").text(w.nombreOrganismo);
  
                  }
  
                  $(".contenedor__bodyCMatriz").append('<div class="col col-6 letras__ver__poa text-center creados__letter creado__indefinidamentes" style="font-weight:bold; font-size:15px;">Ver POA</div><div class="col col-6"><button class="ver__Tabla btn btn-primary creados__letter" style="cursor:pointer;"><i class="fas fa-eye icono__boton"></i></button></div>');
  
  
                  $(".contenedor__bodyCMatriz").append('<button type="button" class="btn btn-success excelProyectos col col-1 elementosCreados__M"><i class="fas fa-file-excel"></i>&nbsp;&nbsp;EXCEL</button><table class="tabla__itemsM elementosCreados__M" style="margin-top:2em;" id="tablaPoaPrincipal"><thead><tr><th align="center">Actividad</th><th align="center">Item</th><th align="center">Enero</th><th align="center">Febrero</th><th align="center">Marzo</th><th align="center">Abril</th><th align="center">Mayo</th><th align="center">Junio</th><th align="center">Julio</th><th align="center">Agosto</th><th align="center">Septiembre</th><th align="center">Octubre</th><th align="center">Noviembre</th><th align="center">Diciembre</th><th align="center">Total</th></tr></thead></table><br><br>');
  
                  $(".elementosCreados__M").hide();			
  
                  for (c of obtenerInformacion) {
  
                      $(".tabla__itemsM").append('<tr><td>'+c.idActividades+"-"+c.nombreActividades+'</td><td>'+c.itemPreesupuestario+"-"+c.nombreItem+'</td><td><center>'+parseFloat(c.enero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.febrero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.marzo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.abril).toFixed(2)+'</center></td><td><center>'+parseFloat(c.mayo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.junio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.julio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.agosto).toFixed(2)+'</center></td><td><center>'+parseFloat(c.septiembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.octubre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.noviembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.diciembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.totalSumaItem).toFixed(2)+'</center></td></tr>');
  
  
                  }
  
  
                  execelGenerados($(".excelProyectos"),"tablaPoaPrincipal","poa");
  
                  verOjoContrasenas2($(".ver__Tabla"),$(".icono__boton"),$(".elementosCreados__M"),$(".letras__ver__poa"));						
  
  
                  for (x of obtenerArchivoCoordinas__infras) {
  
                      $(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center"><a href="'+$("#filesFrontend").val()+'informesTecnicos/'+x.documento+'" target="_blank">Documento coordinación de Instalaciones deportivas</a></div>');
  
                  }
  
  
  
                  for (y of obtenerArchivoCoordinas__administrativos) {
  
                      $(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center"><a href="'+$("#filesFrontend").val()+'informesTecnicos/'+y.documento+'" target="_blank">Documento coordinación financiera</a></div>');
  
                  }
  
                  for (z of obtenerArchivoCoordinas__subcess) {
  
                      $(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center"><a href="'+$("#filesFrontend").val()+'informesTecnicos/'+z.documento+'" target="_blank">Documento subsecretaría</a></div>');
  
                  }
  
  
                  }
  
  
              });
  
          },
          error:function(){
  
          }
  
      });
  
  
    });
  
  }
  

/*===============================================
=            Función de seguimientos            =
===============================================*/

var funcion__reasignar__seguimientos__unidos2023=function(tbody,table){

	$(tbody).on("click","button.reasignarTramites__seguimientos",function(e){
  
		e.preventDefault();
  
		var data=table.row($(this).parents("tr")).data();
  
		console.log("FUNCION2");
		console.log("HOILA response");
		console.log(data[17],data[6],data[19]);
		console.log(data[16],data[5],data[18]);
		var paqueteDeDatos = new FormData();
  
		paqueteDeDatos.append('tipo','enviar__infor__data__seguimientos');
  
		paqueteDeDatos.append("idOrganismo",data[17]);
  
		paqueteDeDatos.append("periodo",data[6]);
  
		paqueteDeDatos.append("tipo__dos",data[19]);
  
		console.log(data);
		console.log("RESPONSE");
	  $.ajax({
  
		  type:"POST",
          url:"modelosBd/POA_SEGUIMIENTO_REVISOR/selector.md.php",
		  contentType: false,
		  data:paqueteDeDatos,
		  processData: false,
		  cache: false, 
		  success:function(response){
  
  
			  $.getScript("layout/scripts/js/validacionBasica.js",function(){
				  
			  var elementos=JSON.parse(response);
  
			  var poa__invers=elementos['poa__invers'];
  
			  var sumas__programados=elementos['sumas__programados'];
  
			  var primer__sumas__p=elementos['primer__sumas__p'];
			  var primer__sumas__e=elementos['primer__sumas__e'];
			  var segundo__sumas__p=elementos['segundo__sumas__p'];
			  var segundo__sumas__e=elementos['segundo__sumas__e'];
			  var tercero__sumas__p=elementos['tercero__sumas__p'];
			  var tercero__sumas__e=elementos['tercero__sumas__e'];
			  var cuarto__sumas__p=elementos['cuarto__sumas__p'];
			  var cuarto__sumas__e=elementos['cuarto__sumas__e'];
  
			  var varaible__culminados=elementos['varaible__culminados'];
			  var documentos__tecnicos__2=elementos['documentos__tecnicos__2'];
  
			  var variable__1__suma__programados=elementos['variable__1__suma__programados'];
			  var variable__1__suma__ejecutado=elementos['variable__1__suma__ejecutado'];
			  var variable__1__suma__planificado=elementos['variable__1__suma__planificado'];
  
			  $("#presupuesto__segun__poas").val(poa__invers);
  
  
			  if ($("#idRolAd").val()==2 && $("#fisicamenteE").val()==20) {
  
				  $(".fila__reasignar").show();
				  $(".fila__regresar__a").hide(); 
				  $(".solo__numero__montos").prop("disabled", true);
				  $(".monto__ejecutado__trimestre").prop("disabled", true);
				  $(".avance__trimestre__porcentaje").prop("disabled", true);
				  $(".primer__esperado").prop("disabled", true);
				  $(".segundo__esperado").prop("disabled", true);
				  $(".tercero__esperado").prop("disabled", true);
				  $(".cuarto__esperado").prop("disabled", true);
				  $(".primer__ejecucion").prop("disabled", true);
				  $(".segundo__ejecucion").prop("disabled", true);
				  //$(".cuerpo__matricez__seguimientos").prop("disabled", true);
  
			  }else if($("#idRolAd").val()==3 && $("#fisicamenteE").val()==20){
  
				  $(".fila__reasignar").hide();
				  $(".fila__regresar__a").show();
  
			  }else if($("#idRolAd").val()==4 && $("#fisicamenteE").val()==33){
  
				  $(".fila__reasignar").show();
				  $(".fila__regresar__a").hide();
				  $(".solo__numero__montos").prop("disabled", true);
				  $(".monto__ejecutado__trimestre").prop("disabled", true);
				  $(".avance__trimestre__porcentaje").prop("disabled", true);
				  $(".primer__esperado").prop("disabled", true);
				  $(".segundo__esperado").prop("disabled", true);
				  $(".tercero__esperado").prop("disabled", true);
				  $(".cuarto__esperado").prop("disabled", true);
				  $(".primer__ejecucion").prop("disabled", true);
				  $(".segundo__ejecucion").prop("disabled", true);
  
			  }else if($("#idRolAd").val()==3 && $("#fisicamenteE").val()==33){
  
				  $(".fila__reasignar").hide();
				  $(".fila__regresar__a").show();
  
			  }
  
			  $("#tipos__nomenclaturas").val(data[19]);
  
			  /*====================================
			  =            Sacar siglas            =
			  ====================================*/
			  
                if (data[20] == "I SEMESTRE") {
  
                    resultado ="1SEM - "+data[10];

                }else{
                    resultado ="2SEM - "+data[10];
                }
			  
			  $(".siglas__dinamicas").text(resultado);	
  
			  $("#siglas__dinamicas__inputs").val(resultado);	
			  
			  /*=====  End of Sacar siglas  ======*/
			  
		  /*=========================================
		  =            Evaluar los datos            =
		  =========================================*/
		  
			  
		  if (parseInt(data[9], 10)<10) {
  
			  $(".numerico__dinamicas").text("0"+data[9]);
  
			  $("#numerico__dinamicas__inputs").val("0"+data[9]);
  
		  }else{
  
			  $(".numerico__dinamicas").text(data[9]);
  
			  $("#numerico__dinamicas__inputs").val(data[9]);
  
		  }
  
		  $(".periodo__evaluados__anuales").text(data[10]);
  
		  $("#periodo__evaluados__anuales").val(data[10]);
  
		  $("#organismoOculto__modal").val(data[17]);
  
		  $("#idOrganismo").val(data[17]);
  
		  $(".nombre__organizacion__deportivas").text(data[2]);
  
		  $("#nombre__organizacion__deportivas").val(data[2]);
  
		  $(".ruc__organizacion__deportivas").text(data[1]);
  
		  $("#ruc__organizacion__deportivas").val(data[1]);
  
		  $(".presidente__organizacion__deportivas").text(data[11]);
  
		  $("#presidente__organizacion__deportivas").val(data[11]);
  
		  $(".correo__organizacion__deportivas").text(data[12]);
  
		  $("#correo__organizacion__deportivas").val(data[12]);
  
		  $(".direccion__organizacion__deportivas").text(data[13]);
  
		  $("#direccion__organizacion__deportivas").val(data[13]);
  
		  $(".provincia__organizacion__deportivas").text(data[3]);
  
		  $("#provincia__organizacion__deportivas").val(data[3]);
  
		  $(".canton__organizacion__deportivas").text(data[4]);
  
		  $("#canton__organizacion__deportivas").val(data[4]);
  
		  $(".parroquia__organizacion__deportivas").text(data[5]);
  
		  $("#parroquia__organizacion__deportivas").val(data[5]);
  
		  $(".barrio__organizacion__deportivas").text(data[14]);
  
		  $("#barrio__organizacion__deportivas").val(data[14]);
  
		  $(".area__de__accion__llamados").text(data[15]);
  
		  $("#area__de__accion__llamados").val(data[15]);
  
		  $(".objetivo__institucional__estrategicos").text(data[16]);
  
		  $("#objetivo__institucional__estrategicos").val(data[16]);
  
		  if (data[6]=="primerTrimestre") {
  
			  $("#periodo__evaluado").val("ENERO - JUNIO");
  
		  }else if (data[6]=="segundoTrimestre") {
  
			  $("#periodo__evaluado").val("ENERO - JUNIO");
  
		  }else if (data[6]=="tercerTrimestre") {
  
			  $("#periodo__evaluado").val("JULIO - DICIEMBRE");
  
		  }else if (data[6]=="cuartoTrimestre") {
  
			  $("#periodo__evaluado").val("JULIO - DICIEMBRE");
  
		  }
  
		  if (data[18]=="si") {
  
			  $(".con__sin__e").text("Con e-SIGEF2");
  
		  }else{
  
			  $(".con__sin__e").text("Sin e-SIGEF2");
  
		  }
  
		  $("#periodo").val(data[6]);
  
		  let idUsuariosC=$("#idUsuarioC").val();
  
		  $("#idUSeguimientos").val(idUsuariosC);
		  
		  /*=====  End of Evaluar los datos  ======*/
  
		  if ($("#idRolAd").val()==3) {
  
			  $(".observacionesReasignaciones").hide();
  
		  }else{
  
			  $(".observacionesReasignaciones").show();
  
		  }
  
		  /*======================================
		  =            Armando tablas            =
		  ======================================*/
  
		  let porcentajes=0;
		  let porcentajesExigefts=0;
  
		  let planificadoA=0;
		  let programadoA=0;
		  let ejecuadoA=0;
		  let exigeftA=0;
  
		  let programadoAB=0;
  
		  $.getScript("layout/scripts/js/validacionesGenerales.js",function(){
  
			  for (w of sumas__programados) {
  
				  programadoAB=programadoAB+parseFloat(w.programado).toFixed(2);
  
			  }
  
			  let div="";
  
			  let porcentajeA1 = new Array();
  
			  let programado1=0;
			  let programado2=0;
			  let programado3=0;
			  let programado4=0;
  
			  let ejecutado1=0;
			  let ejecutado2=0;	
			  let ejecutado3=0;
			  let ejecutado4=0;
  
  
			  for (z of sumas__programados) {
  
				  planificadoA=parseFloat(planificadoA)+parseFloat(z.sumaPlanificacion);
				  programadoA=parseFloat(programadoA)+parseFloat(z.programado);
				  ejecuadoA=parseFloat(ejecuadoA)+parseFloat(z.ejecutado);
				  planificadoA=parseFloat(planificadoA)+parseFloat(z.sumaPlanificacion);
  
  
				  porcentajes=(parseFloat(z.ejecutado)/parseFloat(z.programado)) * 100;
  
				  porcentajeA1.push(parseFloat(porcentajes).toFixed(2));
  
				  if (parseFloat(porcentajes).toFixed(2)>=85) {
  
					   div="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";
  
				  }else if (parseFloat(porcentajes).toFixed(2)>=70 && parseFloat(porcentajes).toFixed(2)<85) {
  
					   div="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";
  
				  }else if (parseFloat(porcentajes).toFixed(2)<70) {
  
					   div="<div style='border-radius: 50%!important; margin-right:1em;  background:red; height:15px!important; width:15px!important;'></div>";
  
				  }
  
				  if (isNaN(porcentajes)) {
					  porcentajes=0;
				  }
  
				  $contador=0;
				  if (data[18]=="si") {
  
					  $(".cuerpo__matricez__seguimientos").append('<tr><td><center>'+z.actividades+'</center></td><td style="display:none!important;"><center>'+parseFloat(z.sumaPlanificacion).toFixed(2)+'</center></td><td><center><input readonly type="text" class="ancho__total__input solo__numero__montos porcs__esigeftes__iniciales__montos__programados" name="porcentajes__esigefts__nomenclaturas__programados[]" id="porcentajes__esigefts__nomenclaturas__programados'+z.idActividad+'"  value="'+parseFloat(z.programado).toFixed(2)+'"></center></td><td><center>'+parseFloat(z.ejecutado).toFixed(2)+'</center></td><td><center><div style="display:flex!important;">'+div+" "+'<input type="text" readonly class="ancho__total__input solo__numero__montos porcs__esigeftes__iniciales__montos" id="porcentajes__esigefts__nomenclaturas'+z.idActividad+'"  value="'+parseFloat(porcentajes).toFixed(2)+'"><span>%</span></div></center></td><td><center><input type="text" class="ancho__total__input solo__numero__montos sumadores__exigets__ex" id="input__esigets'+z.idActividad+'" idEjecutados="'+parseFloat(z.programado).toFixed(2)+'" idContador="'+z.idActividad+'" value="0"/></center></td><td><center><div style="display:flex!important;"><span class="circulos__'+z.idActividad+'"></span><input readonly type="text" class="ancho__total__input solo__numero__montos porcs__esigeftes" id="porcentajes__esigefts'+z.idActividad+'"  value="0"><span>%</span></div></center></td></tr>');
					  $contador++;
				  }else{
  
					  $(".cuerpo__matricez__seguimientos").append('<tr><td><center>'+z.actividades+'</center></td><td style="display:none!important;"><center>'+parseFloat(z.sumaPlanificacion).toFixed(2)+'</center></td><td><center><input readonly type="text" class="ancho__total__input solo__numero__montos porcs__esigeftes__iniciales__montos__programados" id="porcentajes__esigefts__nomenclaturas__programados'+z.idActividad+'"  value="'+parseFloat(z.programado).toFixed(2)+'"></center></td><td><center>'+parseFloat(z.ejecutado).toFixed(2)+'</center></td><td><center><div style="display:flex!important;">'+div+" "+'<input type="text" readonly class="ancho__total__input solo__numero__montos porcs__esigeftes__iniciales__montos" id="porcentajes__esigefts__nomenclaturas'+z.idActividad+'"  value="'+parseFloat(porcentajes).toFixed(2)+'"><span>%</span></div></center></td></tr>');
  
					  $(".oculto__sin__esiguefts").hide();
  
  
				  }
  
  
  
				  //***************************************** */
				  if ($("#idRolAd").val()==2 && $("#fisicamenteE").val()==20) {
  
				   
					  $(".porcs__esigeftes__iniciales__montos__programados").prop("disabled", true);
					  $(".porcs__esigeftes__iniciales__montos").prop("disabled", true);
					  $(".sumadores__exigets__ex").prop("disabled", true);
					  $(".porcs__esigeftes").prop("disabled", true);
					  
	  
				  }else if($("#idRolAd").val()==3 && $("#fisicamenteE").val()==20){
	  
	  
				  }else if($("#idRolAd").val()==4 && $("#fisicamenteE").val()==33){
	  
					  $(".porcs__esigeftes__iniciales__montos__programados").prop("disabled", true);
					  $(".porcs__esigeftes__iniciales__montos").prop("disabled", true);
					  $(".sumadores__exigets__ex").prop("disabled", true);
	  
				  }else if($("#idRolAd").val()==3 && $("#fisicamenteE").val()==33){
	  
				  }
				  
			  
				  $("#porcentajes__esigefts__nomenclaturas__programados"+z.idActividad).on('input', function () {
  
					  let porcentajeExigefA1Programados = new Array();
  
   
					  $(".porcs__esigeftes__iniciales__montos__programados").each(function(){
  
						  porcentajeExigefA1Programados.push($(this).val());
  
					  });
  
					  $("#arrayPorcenEsigefts__programados").val(porcentajeExigefA1Programados);
  
				  });                
			  
				  $("#porcentajes__esigefts"+z.idActividad).on('input', function () {
  
					  let porcentajeExigefA1 = new Array();
  
   
					  $(".porcs__esigeftes").each(function(){
  
						  porcentajeExigefA1.push($(this).val());
  
					  });
  
					  $("#arrayPorcenEsigefts").val(porcentajeExigefA1);
  
				  });
  
  
				  $("#procentajeSas").removeAttr('readonly');
				  $("#montosExig").removeAttr('readonly');
				  $("#procentajeExigefSas").removeAttr('readonly');
  
				  funcion__solo__numero__montos($(".solo__numero__montos"));
  
				  
  
				  funcion__cambio__de__numero($("#input__esigets"+z.idActividad));
  
				  $("#porcentajes__esigefts__nomenclaturas"+z.idActividad).on('input', function () {
  
					  let arrayAnadidosIniciales = new Array();
  
  
					  $(".porcs__esigeftes__iniciales__montos").each(function(){
  
						  arrayAnadidosIniciales.push($(this).val());
  
					  });
  
					  $("#arrayPorcen__inicializados").val(arrayAnadidosIniciales);
					  
  
  
				  });
  
				  $("#input__esigets"+z.idActividad).on('input', function () {
  
  
					  let esigefA1 = new Array();
					  let porcentajeExigefA1 = new Array();
  
   
  
					  let sum=0;
  
					  let idContador=$(this).attr('idContador');
					  let idEjecutados=$(this).attr('idEjecutados');
  
					  let per=0;
					  let per2=0;
  
					  per=(parseFloat($(this).val())/parseFloat(idEjecutados)) * 100;
  
					  $("#porcentajes__esigefts"+idContador).val(parseFloat(per).toFixed(2));
  
  
					  $(".porcs__esigeftes").each(function(){
  
						  porcentajeExigefA1.push($(this).val());
  
					  });
  
  
					  $(".sumadores__exigets__ex").each(function(){
  
						  sum += parseFloat($(this).val());
  
						  esigefA1.push($(this).val());
  
					  });
  
                      sumaPor=0;
                      contaPorcentaje=0;
                      $(".porcs__esigeftes").each(function () {
                        sumaPor += parseFloat($(this).val());
                        contaPorcentaje = contaPorcentaje+1
                      });
  
					  $("#montosExig").val(parseFloat(sum).toFixed(2));
  
					  per2=(parseFloat(sum)/parseFloat(programadoAB)) * 100;
  
					  $("#procentajeExigefSas").val(parseFloat(sumaPor/contaPorcentaje).toFixed(2));
  
					  $("#arrayEsigefts").val(esigefA1);
					  $("#arrayPorcenEsigefts").val(porcentajeExigefA1);
  
  
					  $(".circulos__"+idContador).html(" ");
  
					  $("#procentajeSas").removeAttr('readonly');
  
					  $("#montosExig").removeAttr('readonly');
  
					  $("#procentajeExigefSas").removeAttr('readonly');
  
					  let div="";
  
					  if (parseFloat(per).toFixed(2)>=85) {
  
						   div="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";
  
					  }else if (parseFloat(per).toFixed(2)>=70 && parseFloat(per).toFixed(2)<85) {
  
						   div="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";
  
					  }else if (parseFloat(per).toFixed(2)<70) {
  
						   div="<div style='border-radius: 50%!important; margin-right:1em;  background:red; height:15px!important; width:15px!important;'></div>";
  
					  }
  
					  $(".circulos__"+idContador).append(div);
  
  
				  });
  
			  }
  
			  $("#arrayPorcen").val(porcentajeA1);
  
			  let porcentajesZA=0;
  
			  porcentajesZA=(parseFloat(variable__1__suma__ejecutado)/parseFloat(variable__1__suma__programados)) * 100;
  
			  $("#monto__ejecutado__trimestre").val(parseFloat(programadoA).toFixed(2));
  
			  $("#monto__reportado__tri").val(parseFloat(ejecuadoA).toFixed(2));
  
			  let porcentajesAdminRealizados=(parseFloat(ejecuadoA) / parseFloat(programadoA)) * 100;
  
			  if (data[18]=="si") {
  
				  $(".footer__matricez__seguimientos").append('<tr><th><center>Total</center></th><th style="display:none!important;"><center><input readonly type="text" class="ancho__planificadoss" id="planificadoSas" name="planificadoSas" value="'+parseFloat(planificadoA).toFixed(2)+'" style="border:none!important; color:black!important;" /></center></th><th ><center><input readonly type="text" id="programadoSas" name="programadoSas" value="'+parseFloat(programadoA).toFixed(2)+'" style="border:none!important; color:black!important;" /></center></th><th><center><input readonly type="text" id="ejecutadoSas" name="ejecutadoSas" value="'+parseFloat(ejecuadoA)+'" style="border:none!important;color:black!important;" /></center></th><th><center><input readonly type="text" id="procentajeSas" name="procentajeSas" value="'+parseFloat(porcentajesAdminRealizados).toFixed(2)+'" style="border:none!important; color:black!important;" /></center></th><th class="exigeft__fila__holguras"><center><input readonly type="text" id="montosExig" name="montosExig" style="border:none!important; color:black!important;" value="0"  /><center></center></th><th class="exigeft__fila__holguras__porcentajes"><input readonly type="text" id="procentajeExigefSas" name="procentajeExigefSas"  reandoly="" style="border:none!important; color:black!important;" value="0"/><center></th></tr>');
			  }else{
  
				  $(".footer__matricez__seguimientos").append('<tr><th><center>Total</center></th><th style="display:none!important;"><center><input readonly type="text" id="planificadoSas" class="planificadoSas" name="planificadoSas" value="'+parseFloat(planificadoA).toFixed(2)+'" style="border:none!important; color:black!important;" /></center></th ><th><center><input readonly type="text" id="programadoSas" name="programadoSas" value="'+parseFloat(programadoA).toFixed(2)+'" style="border:none!important; color:black!important;" /></center></th><th><center><input readonly type="text" id="ejecutadoSas" name="ejecutadoSas" value="'+parseFloat(ejecuadoA).toFixed(2)+'" style="border:none!important;color:black!important;"/></center></th><th><center><input readonly type="text" id="procentajeSas" name="procentajeSas" value="'+parseFloat(porcentajesAdminRealizados).toFixed(2)+'" style="border:none!important; color:black!important;"/></center></th></tr>');
  
  
			  }
  
			  //***************************************** */
			  if ($("#idRolAd").val()==2 && $("#fisicamenteE").val()==20) {
				  // var id1 = "#planificadoSas";
				  // document.getElementById(id1).disabled = true;
				   $(".ancho__planificadoss").prop("disabled", true);
				  // $(".porcs__esigeftes__iniciales__montos").prop("disabled", true);
				  // $(".sumadores__exigets__ex").prop("disabled", true);
				  // $(".porcs__esigeftes").prop("disabled", true);
				  
  
			  }else if($("#idRolAd").val()==3 && $("#fisicamenteE").val()==20){
  
  
			  }else if($("#idRolAd").val()==4 && $("#fisicamenteE").val()==33){
  
				  $(".porcs__esigeftes__iniciales__montos__programados").prop("disabled", true);
				  $(".porcs__esigeftes__iniciales__montos").prop("disabled", true);
				  $(".sumadores__exigets__ex").prop("disabled", true);
  
			  }else if($("#idRolAd").val()==3 && $("#fisicamenteE").val()==33){
  
			  }
			  
			  /*=====  End of Armando tablas  ======*/
  
			  $("#avance__trimestre__porcentaje").val($("#procentajeSas").val()+"%");
  
  
			  if (data[6]=="primerTrimestre" || data[6]=="segundoTrimestre") {
  
				  /*============================================
				  =            Calculos programados            =
				  ============================================*/
                  
                  $('.cuarto__esperado__div').hide();
                  $('.segundo__esperado__div').show();
                  
			  
				  programado1=(parseFloat($("#programadoSas").val())/parseFloat($("#presupuesto__segun__poas").val())) * 100;
				  $("#primer__esperado").val(parseFloat(programado1).toFixed(2)+" %");
  
  
				  programado2=(parseFloat($("#programadoSas").val())/parseFloat($("#presupuesto__segun__poas").val())) * 100;
				  $("#segundo__esperado").val(parseFloat(programado2).toFixed(2)+" %");

				  
				  /*=====  End of Calculos programados  ======*/
			  
  
			  }else{
  
				  /*============================================
				  =            Calculos programados            =
				  ============================================*/
                  $('.segundo__esperado__div').hide();
                  $('.cuarto__esperado__div').show();
  
				  programado3=(parseFloat($("#programadoSas").val())/parseFloat($("#presupuesto__segun__poas").val())) * 100;
				  $("#tercero__esperado").val(parseFloat(programado3).toFixed(2)+" %");
  
  
				  programado4=(parseFloat($("#programadoSas").val())/parseFloat($("#presupuesto__segun__poas").val())) * 100;
				  $("#cuarto__esperado").val(parseFloat(programado4).toFixed(2)+" %");
				  
				  /*=====  End of Calculos programados  ======*/				
  
			  }
  
  
			  
			  let montoEjecutadoU=$("#presupuesto__segun__poas").val();
  
			  let ejecutadoSasU=$("#ejecutadoSas").val();
  
  
			  if (data[6]=="primerTrimestre" || data[6]=="segundoTrimestre") {
  
  
				  ejecutado2=(parseFloat(ejecutadoSasU)/parseFloat(montoEjecutadoU)) * 100;
				  $("#segundo__ejecucion").val(parseFloat(ejecutado2).toFixed(2)+" %");
  
                  $(".ejecutados__al__segundo").show();
                  $(".ejecutados__al__cuarto").hide();
				  
  
			  }else{
  
				  /*===========================================
				  =            Calculos ejecutados            =
				  ===========================================*/
  
				  $("#cuarto__ejecucion").val(parseFloat(ejecutado2).toFixed(2)+" %");
  
				  $(".ejecutados__al__cuarto").show();
				  $(".ejecutados__al__segundo").hide();
  
			  }
  
  
  
			  if (data[18]=="no") {
  
				  $(".oculto__sin__esiguefts").remove();
  
			  }
			  
  
			  console.log(data);
  
		  });
  
		  });
  
		  },
		  error:function(){
  
		  }
				  
	  });	  	
  
	});
  
  }



/*=====  End of Función de seguimientos  ======*/


/*===============================================
=            Objetos Datatables            =
===============================================*/

    var objetosSeguimiento2023=function(parametro1,parametro2,parametro3,parametro4,parametro5,parametro6){

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

                    }else if(parametro2[0]=="enlaces__enviado__documento"){

                        if (row[parametro3[0]]=="CUMPLE") {

                            if (row[parametro5[0]].indexOf('.pdf') > -1 ){
                                return "<a href='"+parametro4[0]+row[parametro5[0]]+"' target='_blank'>Enviado</a>";
                            }else{
                                return "<a href='"+parametro4[0]+row[parametro5[0]]+".pdf' target='_blank'>Enviado</a>";
                            }
                                
                        }else{
                            return "NO ENVIADO";
                        }

                    }else if(parametro2[0]=="boton"){

                        return parametro3[0];

                    }else if(parametro2[0]=="texto__separadores"){


                        if (row[parametro3[0]]!="" && row[parametro3[0]]!=null && row[parametro3[0]]!=undefined) {

                            let arr = row[parametro3[0]].split(';;;;');

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

                            // return "Notificado por no presentación de requisitos";

                            return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";


                        }else if (row[parametro3[0]]!="" && row[parametro3[0]]!=null) {

                            return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

                        }else{

                            return "Aún no presenta los documentos";

                        }


                    }else if(parametro2[0]=="texto__separadores__2"){

                        if (row[parametro3[0]]=="si") {

                            return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='si'>Si</option><option value='no'>No</option></select>";

                        }else{

                            return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='no'>No</option><option value='si'>Si</option></select>";

                        }

                        

                    }else if(parametro2[0]=="texto__fecha__selector"){

                        if (row[parametro3[0]]!=null) {

                            return "<input type='date' id='fechaPlazo1erTrimestre"+row[parametro3[4]]+"' value='"+row[parametro3[0]]+"'/>";

                        }else{

                            return "<input id='fechaPlazo1erTrimestre"+row[parametro3[4]]+"' type='date'/>";

                        }

                        

                    }else if(parametro2[0]=="texto__separadores__cierre__anio__fiscal"){

                        if (row[6]=="si") {

                            return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado' style='background:red;color:white;'><option value='si'>CERRADO</option></select>";

                        }else{

                            return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado' style='background:green;color:white;'><option value='no'>ABIERTO</option></select>";

                        }

                        

                    }else if(parametro2[0]=="texto__separadores__cierre__anio__fiscal__2"){

                        if (row[7]=="si") {

                            return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado' style='background:red;color:white;'><option value='si'>CERRADO</option></select>";

                        }else{

                            return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado' style='background:green;color:white;'><option value='no'>ABIERTO</option></select>";

                        }

                    }else if(parametro2[0]=="texto__separadores__jurisdiccionN"){

                            return "<nav id='colorNav' style='position: relative; top: -5em!important;'><tr><td><div class='col-md-12'><select class='form-select' id='idSelectJurisdiccion' aria-label='Default select example'><option value='0'>Selecciona una opción</option><option value='9'>Planta Central</option><option value='1'>Zonal1</option><option value='2'>Zonal2</option><option value='3'>Zonal3</option><option value='4'>Zonal4</option><option value='6'>Zonal6</option><option value='7'>Zonal7</option><option value='8'>Zonal8</option></select></div></td><td><a id=''   name='' class='btn btn-primary'><i class='fa fa-floppy-o' aria-hidden='true'></i></a></td></tr></nav>";

                    }else if(parametro2[0]=="radioSelectes__2"){

                        return "<div style='display:flex;'>Si&nbsp;&nbsp;<input type='radio'  class='radio__conjuntos radios_"+row[parametro3[0]]+"' name='radio__select__"+row[parametro3[0]]+"' value='A'/>&nbsp;&nbsp;No&nbsp;&nbsp;<input type='radio'  class='radio__conjuntos radios_"+row[parametro3[0]]+"' id='radioBotomNegacion' name='radio__select__"+row[parametro3[0]]+"' value='N'/></div><div style='display:flex; justify-content-center;'><button class='btn btn-primary guardar__informacion__conjuntos__radios mt-2'><i class='fa fa-floppy-o' aria-hidden='true'></i></button></div>";

                    }else if(parametro2[0]=="enlaces__definidos__2"){

                        if (row[parametro3[0]]=="CUMPLE") {

                            return "<a href='seguimientoRecorrido' target='_blank'>ENVIADO</a>";

                        }else{
                            return "NO ENVIADO";
                        }

                        

                    }else if(parametro2[0]=="formularioAbscritos"){

                        return '<center><form class="col col-12 enviador__seguiiento__refs text-center mt-4" action="modelosBd/pdf/pdf2.modelo.php" method="post"><input type="hidden" id="trimestreEvaluador" name="trimestreEvaluador" value="'+row[parametro3[0]]+'"/><input type="hidden" id="idOrganismo" name="idOrganismo" value="'+row[parametro3[2]]+'"/><input type="hidden" id="tipoPdf" name="tipoPdf" value="documento__declaracion__seguimientos" /><input type="hidden" id="fechaEnviare" name="fechaEnviare" value="'+row[parametro3[1]]+'"/><input type="hidden" id="idMaximo" name="idMaximo" value="'+row[parametro3[3]]+'"/><input type="hidden" id="nombreOrganismo" name="nombreOrganismo" value="'+row[parametro3[7]]+'"/><input type="hidden" id="rucOrganismo" name="rucOrganismo" value="'+row[parametro3[6]]+'"/><input type="hidden" id="emailOrganismo" name="emailOrganismo" value="'+row[parametro3[4]]+'"/><input type="hidden" id="nombreResponsable" name="nombreResponsable" value="'+row[parametro3[5]]+'"/><button style="background:#006064; border-radius:.5em; text-color:white; pading:.2em;">Documento</button></form></center>';

                    }else if(parametro2[0]=="chekeds__2__paids"){

                        return "<center><input type='checkbox' class='checkeds__seleccionables' attr='primerTrimestre' idOrganismos='"+row[parametro3[0]]+"'/></center>";

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

                    }else if(parametro2[1]=="enlaces__enviado__documento"){

                        if (row[parametro3[1]]=="CUMPLE") {

                            
                            if (row[parametro5[1]].indexOf('.pdf') > -1 ){
                                return "<a href='"+parametro4[1]+row[parametro5[1]]+"' target='_blank'>Enviado</a>";
                            }else{
                                return "<a href='"+parametro4[1]+row[parametro5[1]]+".pdf' target='_blank'>Enviado</a>";
                            }
                            
                        }else{
                            return "NO ENVIADO";
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

                    }else if(parametro2[1]=="boton__2"){

                        if(row[parametro4[0]]=="Notificado por no presentación de requisitos"){

                            return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

                        }else if (row[parametro3[0]]!="" && row[parametro3[0]]!=null) {

                            return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

                        }else{

                            return "Aún no presenta los documentos";

                        }


                    }else if(parametro2[1]=="texto__separadores__2"){

                        let arr = row[parametro3[1]].split('------');

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

                                segundo="<div><a href='"+$("#filesFrontend").val()+"seguimiento/informe__formativos/"+arr[1]+"' target='_blank'>Técnico</a></div><hr>";

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

                    }else if(parametro2[1]=="chekeds__2"){

                        return "<input type='checkbox' class='checkeds__seleccionables' attr='primerTrimestre' idOrganismos='"+row[parametro3[1]]+"'/>";

                    }else if(parametro2[1]=="guardar_plazos_personal"){

                        return "<center><button idOrganismos='"+row[parametro3[4]]+"' trimestre='primerTrimestre' data-bs-toggle='modal' data-bs-target='#modalSubirPlazosInicial' class='seguimiento_guardar_plazo_individual estilo__botonDatatablets btn btn-warning pointer__botones'><i class='fas fa-save'></i></button></center>";

                    }else if(parametro2[1]=="enlaces__definidos__2"){

                        if (row[parametro3[1]]=="CUMPLE") {

                            return "<a href='seguimientoRecorrido' target='_blank'>ENVIADO</a>";

                        }else{
                            return "NO ENVIADO";
                        }

                        

                    }else if(parametro2[1]=="texto__separadores__2"){

                        if (row[parametro3[1]]=="si") {

                            return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='si'>Si</option><option value='no'>No</option></select>";

                        }else{

                            return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='no'>No</option><option value='si'>Si</option></select>";

                        }

                        

                    }else if(parametro2[1]=="texto__separadores__cierre__anio__fiscal"){


                        if (row[7]=="si") {

                            return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado' style='background:red;color:white;'><option value='si'>CERRADO</option></select>";

                        }else{

                            return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado' style='background:green;color:white;'><option value='no'>ABIERTO</option></select>";

                        }


                    }else if(parametro2[1]=="motivo__adicional"){


                        if (row[8]=="" || row[8]==" " || row[8]==undefined || row[8]==null) {

                            return " ";

                        }else{

                            return row[8];

                        }

                    }else if(parametro2[1]=="radioSelectes__2"){

                        return "<div style='display:flex;'>Si&nbsp;&nbsp;<input type='radio'  class='radio__conjuntos radios_"+row[parametro3[1]]+"' name='radio__select__"+row[parametro3[1]]+"' value='A'/>&nbsp;&nbsp;No&nbsp;&nbsp;<input type='radio'  class='radio__conjuntos radios_"+row[parametro3[1]]+"' name='radio__select__"+row[parametro3[1]]+"' value='N'/></div><div style='display:flex; justify-content-center;'><button class='btn btn-primary guardar__informacion__conjuntos__radios mt-2'><i class='fa fa-floppy-o' aria-hidden='true'></i></button></div>";

                    }else if(parametro2[1]=="chekeds__2__paids"){

                        return "<center><input type='checkbox' class='checkeds__seleccionables' attr='primerTrimestre' idOrganismos='"+row[parametro3[1]]+"'/></center>";

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

                    }else if(parametro2[2]=="enlaces__enviado__documento"){

                        if (row[parametro3[2]]=="CUMPLE") {

                            if (row[parametro5[2]].indexOf('.pdf') > -1 ){
                                return "<a href='"+parametro4[2]+row[parametro5[2]]+"' target='_blank'>Enviado</a>";
                            }else{
                                return "<a href='"+parametro4[2]+row[parametro5[2]]+".pdf' target='_blank'>Enviado</a>";
                            }

                        }else{
                            return "NO ENVIADO";
                        }

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


                    }else if(parametro2[2]=="texto__fecha__selector"){

                        if (row[parametro3[1]]!=null) {

                            return "<input type='date' id='fechaPlazo2doTrimestre"+row[parametro3[4]]+"' value='"+row[parametro3[1]]+"'/>";

                        }else{

                            return "<input id='fechaPlazo2doTrimestre"+row[parametro3[4]]+"' type='date'/>";

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

                    }else if(parametro2[3]=="enlaces__enviado__documento"){

                        if (row[parametro3[3]]=="CUMPLE") {

                            if (row[parametro5[3]].indexOf('.pdf') > -1 ){
                                return "<a href='"+parametro4[3]+row[parametro5[3]]+"' target='_blank'>Enviado</a>";
                            }else{
                                return "<a href='"+parametro4[3]+row[parametro5[3]]+".pdf' target='_blank'>Enviado</a>";
                            }
                        }else{
                            return "NO ENVIADO";
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

                                segundo="<div><a href='"+$("#filesFrontend").val()+"seguimiento/informe__formativos/"+arr[1]+"' target='_blank'>Técnico</a></div><hr>";

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

                        

                    }else if(parametro2[3]=="guardar_plazos_personal"){

                        return "<center><button idOrganismos='"+row[parametro3[4]]+"' trimestre='segundoTrimestre' data-bs-toggle='modal' data-bs-target='#modalSubirPlazosInicial' class='seguimiento_guardar_plazo_individual estilo__botonDatatablets btn btn-warning pointer__botones'><i class='fas fa-save'></i></button></center>";

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

                    }else if(parametro2[4]=="enlaces__documentos__simples"){

                        if (row[parametro1[4]]!=null){
                            return "<a href='"+parametro5[0]+row[parametro1[4]]+"' target='_blank'>"+row[parametro1[4]]+"</a>";
                        }else{
                            return "<a href='"+parametro5[0]+row[parametro1[4]]+".pdf' target='_blank'></a>";
                        }

                    }else if(parametro2[4]=="texto__fecha__selector"){

                        if (row[parametro3[2]]!=null) {

                            return "<input type='date' id='fechaPlazo3erTrimestre"+row[parametro3[4]]+"' value='"+row[parametro3[2]]+"'/>";

                        }else{

                            return "<input id='fechaPlazo3erTrimestre"+row[parametro3[4]]+"' type='date'/>";

                        }

                        

                    }else if(parametro2[0]=="boton__2"){

                        if(row[parametro4[0]]=="Notificado por no presentación de requisitos"){

                            return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

                        }else if (row[parametro3[0]]!="" && row[parametro3[0]]!=null) {

                            return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

                        }else{

                            return "Aún no presenta los documentos";

                        }


                    }else if(parametro2[4]=="texto__separadores__2informesSeguimientos"){

                        // if (row[parametro3[4]]=="si") {

                        // 	return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado3'><option value='si'>Si</option><option value='no'>No</option></select>";

                        // }else{

                        // 	return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado3'><option value='no'>Noxxxx</option><option value='si'>Si</option></select>";

                        // }
                        let arr = row[parametro3[4]].split('------');

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

                                segundo="<div><a href='"+$("#filesFrontend").val()+"seguimiento/informe__formativos/"+arr[1]+"' target='_blank'>Técnico</a></div><hr>";

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

                        

                    }else if(parametro2[4]=="texto__separadores__2"){

                        if (row[parametro3[4]]=="si") {

                            return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado3'><option value='si'>Si</option><option value='no'>No</option></select>";

                        }else{

                            return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado3'><option value='no'>Noxxxx</option><option value='si'>Si</option></select>";

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

                    }else{
                        return row[parametro3[4]];
                    }

                })

            });

        }

        if (parametro1[5]!="" && parametro1[5]!=" ") {

            objeto.push({ 

                "aTargets":[parametro1[5]], 
                "mData": null,
                "mRender": (function (data, type, row) {

                    if (parametro2[5]=="enlace") {

                        if (row[parametro5[5]].indexOf('.pdf') > -1){
                            return "<center><a href='"+parametro4[5]+row[parametro5[5]]+"' target='_blank'>"+row[parametro3[5]]+"</a></center>";
                        }else{
                            return "<center><a href='"+parametro4[5]+row[parametro5[5]]+".pdf' target='_blank'>"+row[parametro3[5]]+"</a></center>";
                        }

                    }else if(parametro2[5]=="boton"){

                        return parametro3[5];

                    }else if(parametro2[5]=="texto__separadores"){


                        if (row[parametro3[5]]!="" && row[parametro3[5]]!=null && row[parametro3[5]]!=undefined) {

                            let arr = row[parametro3[5]].split(';;;;');

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

                    }else if(parametro2[5]=="enlaces__documentos__simples"){

                        if (row[parametro1[5]]!=null){
                            return "<a href='"+parametro5[0]+row[parametro1[5]]+"' target='_blank'>"+row[parametro1[5]]+"</a>";
                        }else{
                            return "<a href='"+parametro5[0]+row[parametro1[5]]+".pdf' target='_blank'></a>";
                        }

                    }else if(parametro2[0]=="boton__2"){

                        if(row[parametro4[0]]=="Notificado por no presentación de requisitos"){

                            return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

                        }else if (row[parametro3[0]]!="" && row[parametro3[0]]!=null) {

                            return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

                        }else{

                            return "Aún no presenta los documentos";

                        }


                    }else if(parametro2[5]=="texto__separadores__2"){

                        let arr = row[parametro3[5]].split('------');

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

                                segundo="<div><a href='"+$("#filesFrontend").val()+"seguimiento/informe__formativos/"+arr[1]+"' target='_blank'>Técnico</a></div><hr>";

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

                    }else if(parametro2[5]=="texto__separadores__2"){

                        if (row[parametro3[5]]=="si") {

                            return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='si'>Si</option><option value='no'>No</option></select>";

                        }else{

                            return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='no'>No</option><option value='si'>Si</option></select>";

                        }

                        

                    }else if(parametro2[5]=="guardar_plazos_personal"){

                        return "<center><button idOrganismos='"+row[parametro3[4]]+"' trimestre='tercerTrimestre' data-bs-toggle='modal' data-bs-target='#modalSubirPlazosInicial' class='seguimiento_guardar_plazo_individual estilo__botonDatatablets btn btn-warning pointer__botones'><i class='fas fa-save'></i></button></center>";

                    }else if(parametro2[5]=="texto__separadores__cierre__anio__fiscal"){

                        if (row[12]=="si") {

                            return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='si' style='background:red;color:white;'>CERRADO</option><option value='no'>No</option></select>";

                        }else{

                            return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='no' style='background:green;color:white;'>No</option><option value='si'>APERTURADO</option></select>";

                        }

                        

                    }else if(parametro2[5]=="motivo__adicional"){

                        if (row[12]=="" || row[12]==" " || row[12]==undefined || row[12]==null) {

                            return " ";

                        }else{

                            return row[12];

                        }

                    }else if(parametro2[5]=="chekeds__2"){

                        return "<input type='checkbox' class='checkeds__seleccionables' idOrganismos='"+row[parametro3[5]]+"' attr='tercerTrimestre'/>";

                    }else{
                        return row[parametro3[5]];
                    }

                })

            });

        }

        if (parametro1[6]!="" && parametro1[6]!=" ") {

            objeto.push({ 

                "aTargets":[parametro1[6]], 
                "mData": null,
                "mRender": (function (data, type, row) {

                    if (parametro2[6]=="enlace") {

                        if (row[parametro6[6]].indexOf('.pdf') > -1){
                            return "<center><a href='"+parametro4[6]+row[parametro6[6]]+"' target='_blank'>"+row[parametro3[6]]+"</a></center>";
                        }else{
                            return "<center><a href='"+parametro4[6]+row[parametro6[6]]+".pdf' target='_blank'>"+row[parametro3[6]]+"</a></center>";
                        }

                    }else if(parametro2[6]=="texto__fecha__selector"){

                        if (row[parametro3[3]]!=null) {

                            return "<input type='date' id='fechaPlazo4toTrimestre"+row[parametro3[4]]+"' value='"+row[parametro3[3]]+"'/>";

                        }else{

                            return "<input id='fechaPlazo4toTrimestre"+row[parametro3[4]]+"' type='date'/>";

                        }

                        

                    }else if(parametro2[6]=="boton"){

                        return parametro3[6];

                    }else if(parametro2[6]=="enlaces__documentos__simples"){

                        if (row[parametro1[6]]!=null){
                            return "<a href='"+parametro5[0]+row[parametro1[6]]+"' target='_blank'>"+row[parametro1[6]]+"</a>";
                        }else{
                            return "<a href='"+parametro5[0]+row[parametro1[6]]+".pdf' target='_blank'></a>";
                        }

                    }else if(parametro2[6]=="texto__separadores"){


                        if (row[parametro3[6]]!="" && row[parametro3[6]]!=null && row[parametro3[6]]!=undefined) {

                            let arr = row[parametro3[6]].split(';;;;');

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



                                if (arr[6]!=undefined && arr[6]!="undefined") {

                                    var sexto="<div>"+arr[6]+"</div>";

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


                    }else if(parametro2[6]=="texto__separadores__2"){

                        let arr = row[parametro3[6]].split('------');

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

                                segundo="<div><a href='"+$("#filesFrontend").val()+"seguimiento/informe__formativos/"+arr[1]+"' target='_blank'>Técnico</a></div><hr>";

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

                    }else if(parametro2[6]=="texto__separadores__2"){

                        if (row[parametro3[6]]=="si") {

                            return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado4'><option value='si'>Si</option><option value='no'>No</option></select>";

                        }else{

                            return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado4'><option value='no'>No</option><option value='si'>Si</option></select>";

                        }

                        

                    }else if(parametro2[6]=="texto__separadores__cierre__anio__fiscal"){

                        if (row[11]=="si") {

                            return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado' style='background:red;color:white;'><option value='si'>CERRADO</option></select>";

                        }else{

                            return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado' style='background:green;color:white;'><option value='no'>ABIERTO</option></select>";

                        }
                        

                    }else if(parametro2[6]=="texto__separadores__4"){

                        if (row[parametro3[6]]=="si") {

                            return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado4'><option value='si'>Si</option><option value='no'>No</option></select>";

                        }else{

                            return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado4'><option value='no'>No</option><option value='si'>Si</option></select>";

                        }

                        

                    }else if(parametro2[6]=="chekeds__2"){

                        return "<input type='checkbox' class='checkeds__seleccionables' idOrganismos='"+row[parametro3[6]]+"'/>";

                    }else{
                        return row[parametro3[6]];
                    }

                })

            });

        }

        if (parametro1[7]!="" && parametro1[7]!=" ") {

            objeto.push({ 

                "aTargets":[parametro1[7]], 
                "mData": null,
                "mRender": (function (data, type, row) {

                    if (parametro2[7]=="enlace") {

                        if (row[parametro7[7]].indexOf('.pdf') > -1){
                            return "<center><a href='"+parametro4[7]+row[parametro7[7]]+"' target='_blank'>"+row[parametro3[7]]+"</a></center>";
                        }else{
                            return "<center><a href='"+parametro4[7]+row[parametro7[7]]+".pdf' target='_blank'>"+row[parametro3[7]]+"</a></center>";
                        }

                    }else if(parametro2[7]=="boton"){

                        return parametro3[7];

                    }else if(parametro2[7]=="enlaces__documentos__simples"){

                        if (row[parametro1[7]]!=null){
                            return "<a href='"+parametro5[0]+row[parametro1[7]]+"' target='_blank'>"+row[parametro1[7]]+"</a>";
                        }else{
                            return "<a href='"+parametro5[0]+row[parametro1[7]]+".pdf' target='_blank'></a>";
                        }

                    }else if(parametro2[7]=="texto__separadores"){


                        if (row[parametro3[7]]!="" && row[parametro3[7]]!=null && row[parametro3[7]]!=undefined) {

                            let arr = row[parametro3[7]].split(';;;;');

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



                                if (arr[7]!=undefined && arr[7]!="undefined") {

                                    var sexto="<div>"+arr[7]+"</div>";

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


                    }else if(parametro2[7]=="texto__separadores__2"){

                        let arr = row[parametro3[7]].split('------');

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

                                segundo="<div><a href='"+$("#filesFrontend").val()+"seguimiento/informe__formativos/"+arr[1]+"' target='_blank'>Técnico</a></div><hr>";

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

                    }else if(parametro2[7]=="guardar_plazos_personal"){

                        return "<center><button idOrganismos='"+row[parametro3[4]]+"' trimestre='cuartoTrimestre' data-bs-toggle='modal' data-bs-target='#modalSubirPlazosInicial' class='seguimiento_guardar_plazo_individual estilo__botonDatatablets btn btn-warning pointer__botones'><i class='fas fa-save'></i></button></center>";

                    }else if(parametro2[7]=="texto__separadores__2"){

                        if (row[parametro3[7]]=="si") {

                            return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='si'>Si</option><option value='no'>No</option></select>";

                        }else{

                            return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='no'>No</option><option value='si'>Si</option></select>";

                        }

                        

                    }else if(parametro2[5]=="texto__separadores__cierre__anio__fiscal"){

                        if (row[parametro3[5]]=="si") {

                            return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='si' style='background:red;color:white;'>CERRADO</option><option value='no'>No</option></select>";

                        }else{

                            return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='no' style='background:green;color:white;'>No</option><option value='si'>APERTURADO</option></select>";

                        }

                        

                    }else if(parametro2[7]=="chekeds__2"){

                        return "<input type='checkbox' class='checkeds__seleccionables' idOrganismos='"+row[parametro3[7]]+"' attr='cuartoTrimestre'/>";

                    }else if(parametro2[7]=="chekeds__2__2"){

                        return "<input type='checkbox' class='checkeds__seleccionables__modificaciones' idOrganismos='"+row[5]+"'/>";

                    }else{
                        return row[parametro3[7]];
                    }

                })

            });

        }

        if (parametro1[8]!="" && parametro1[8]!=" ") {

            objeto.push({ 

                "aTargets":[parametro1[8]], 
                "mData": null,
                "mRender": (function (data, type, row) {

                    if (parametro2[8]=="enlace") {

                        if (row[parametro8[8]].indexOf('.pdf') > -1){
                            return "<center><a href='"+parametro4[8]+row[parametro8[8]]+"' target='_blank'>"+row[parametro3[8]]+"</a></center>";
                        }else{
                            return "<center><a href='"+parametro4[8]+row[parametro8[8]]+".pdf' target='_blank'>"+row[parametro3[8]]+"</a></center>";
                        }

                    }else if(parametro2[8]=="boton"){

                        return parametro3[8];

                    }else if(parametro2[8]=="texto__separadores"){


                        if (row[parametro3[8]]!="" && row[parametro3[8]]!=null && row[parametro3[8]]!=undefined) {

                            let arr = row[parametro3[8]].split(';;;;');

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



                                if (arr[8]!=undefined && arr[8]!="undefined") {

                                    var sexto="<div>"+arr[8]+"</div>";

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


                    }else if(parametro2[8]=="texto__separadores__2"){

                        if (row[parametro3[8]]=="si") {

                            return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='si'>Si</option><option value='no'>No</option></select>";

                        }else{

                            return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='no'>No</option><option value='si'>Si</option></select>";

                        }

                        
                    }else if(parametro2[5]=="texto__separadores__cierre__anio__fiscal"){

                        if (row[parametro3[5]]=="si") {

                            return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='si' style='background:red;color:white;'>CERRADO</option><option value='no'>No</option></select>";

                        }else{

                            return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='no' style='background:green;color:white;'>No</option><option value='si'>APERTURADO</option></select>";

                        }

                        

                    }else if(parametro2[8]=="motivo__adicional"){

                        if (row[13]=="" || row[13]==" " || row[13]==undefined || row[13]==null) {

                            return " ";

                        }else{

                            return row[13];

                        }

                    }else if(parametro2[8]=="enlaces__documentos__simples"){

                        if (row[parametro1[8]]!=null){
                            return "<a href='"+parametro5[0]+row[parametro1[8]]+"' target='_blank'>"+row[parametro1[8]]+"</a>";
                        }else{
                            return "<a href='"+parametro5[0]+row[parametro1[8]]+".pdf' target='_blank'></a>";
                        }

                    }else if(parametro2[8]=="chekeds__2"){

                        return "<input type='checkbox' class='checkeds__seleccionables' idOrganismos='"+row[parametro3[8]]+"' attr='cuartoTrimestre'/>";

                    }else if(parametro2[8]=="estado_plazo_suspenciones") {

                        //parametro 3 fecha de envio de poa
                        //parametro 4 fecha de registro plazo

                        const today = new Date();
                        
                        const fecha= new Date(row[parametro4[4]])

                        const timeDifference = fecha - today;

                        const daysDifference = Math.ceil(timeDifference / (1000 * 60 * 60 * 24));


                        if (row[parametro1[8]]!=null) {

                            return row[parametro1[8]];

                        }else if ((row[parametro3[4]]==null) && (row[parametro4[4]]!=null) && (daysDifference < 0)) {

                            return "SUSPENSION";

                        }else if ((row[parametro3[4]]!=null) && (row[parametro4[4]]!=null) && (row[parametro3[4]] > row[parametro4[4]])){

                            return "SUSPENSION";

                        }else if ((row[parametro3[4]]!=null) && (row[parametro4[4]]!=null) && (row[parametro3[4]] < row[parametro4[4]])){

                            return "------";

                        }else{
                            return "N/A";
                        }

                    }else{
                        return row[parametro3[8]];
                    }

                })

            });

        }

        if (parametro1[9]!="" && parametro1[9]!=" ") {

            objeto.push({ 

                "aTargets":[parametro1[9]], 
                "mData": null,
                "mRender": (function (data, type, row) {

                    if (parametro2[5]=="enlace") {

                        if (row[parametro5[5]].indexOf('.pdf') > -1){
                            return "<center><a href='"+parametro4[5]+row[parametro5[5]]+"' target='_blank'>"+row[parametro3[5]]+"</a></center>";
                        }else{
                            return "<center><a href='"+parametro4[5]+row[parametro5[5]]+".pdf' target='_blank'>"+row[parametro3[5]]+"</a></center>";
                        }

                    }else if(parametro2[5]=="boton"){

                        return parametro3[5];

                    }else if(parametro2[5]=="texto__separadores"){


                        if (row[parametro3[5]]!="" && row[parametro3[5]]!=null && row[parametro3[5]]!=undefined) {

                            let arr = row[parametro3[5]].split(';;;;');

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


                    }else if(parametro2[5]=="texto__separadores__cierre__anio__fiscal"){

                        if (row[parametro3[5]]=="si") {

                            return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='si' style='background:red;color:white;'>CERRADO</option><option value='no'>No</option></select>";

                        }else{

                            return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='no' style='background:green;color:white;'>No</option><option value='si'>APERTURADO</option></select>";

                        }

                        

                    }else if(parametro2[9]=="enlaces__documentos__simples"){

                        if (row[parametro1[9]]!=null){
                            return "<a href='"+parametro5[0]+row[parametro1[9]]+"' target='_blank'>"+row[parametro1[9]]+"</a>";
                        }else{
                            return "<a href='"+parametro5[0]+row[parametro1[9]]+".pdf' target='_blank'></a>";
                        }

                    }else if(parametro2[9]=="estado_plazo_suspenciones") {

                        //parametro 3 fecha de envio de poa
                        //parametro 4 fecha de registro plazo

                        const today = new Date();
                        
                        const fecha= new Date(row[parametro4[5]])

                        const timeDifference = fecha - today;

                        const daysDifference = Math.ceil(timeDifference / (1000 * 60 * 60 * 24));

                        if (row[parametro1[9]]!=null) {

                            return row[parametro1[9]];

                        }else if ((row[parametro3[5]]==null) && (row[parametro4[5]]!=null) && (daysDifference < 0)) {

                            return "SUSPENSION";

                        
                        }else if ((row[parametro3[5]]!=null) && (row[parametro4[5]]!=null) && (row[parametro3[5]] > row[parametro4[5]])) {

                            return "SUSPENSION";

                        }else if ((row[parametro3[5]]!=null) && (row[parametro4[5]]!=null) && (row[parametro3[5]] < row[parametro4[5]])){

                            return "------";

                        }else{
                            return "N/A";
                        }

                    }else{
                        return row[parametro3[5]];
                    }

                })

            });

        }

        if (parametro1[10]!="" && parametro1[10]!=" ") {

            objeto.push({ 

                "aTargets":[parametro1[10]], 
                "mData": null,
                "mRender": (function (data, type, row) {

                    if (parametro2[5]=="enlace") {

                        if (row[parametro5[5]].indexOf('.pdf') > -1){
                            return "<center><a href='"+parametro4[5]+row[parametro5[5]]+"' target='_blank'>"+row[parametro3[5]]+"</a></center>";
                        }else{
                            return "<center><a href='"+parametro4[5]+row[parametro5[5]]+".pdf' target='_blank'>"+row[parametro3[5]]+"</a></center>";
                        }

                    }else if(parametro2[5]=="boton"){

                        return parametro3[5];

                    }else if(parametro2[5]=="texto__separadores"){


                        if (row[parametro3[5]]!="" && row[parametro3[5]]!=null && row[parametro3[5]]!=undefined) {

                            let arr = row[parametro3[5]].split(';;;;');

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


                    }else if(parametro2[5]=="texto__separadores__cierre__anio__fiscal"){

                        if (row[parametro3[5]]=="si") {

                            return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='si' style='background:red;color:white;'>CERRADO</option><option value='no'>No</option></select>";

                        }else{

                            return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='no' style='background:green;color:white;'>No</option><option value='si'>APERTURADO</option></select>";

                        }

                        

                    }else if(parametro2[10]=="enlaces__documentos__simples"){

                        if (row[parametro1[10]]!=null){
                            return "<a href='"+parametro5[0]+row[parametro1[10]]+"' target='_blank'>"+row[parametro1[10]]+"</a>";
                        }else{
                            return "<a href='"+parametro5[0]+row[parametro1[10]]+".pdf' target='_blank'></a>";
                        }

                    }else if(parametro2[10]=="estado_plazo_suspenciones") {

                        //parametro 3 fecha de envio de poa
                        //parametro 4 fecha de registro plazo

                        const today = new Date();
                        
                        const fecha= new Date(row[parametro4[6]])

                        const timeDifference = fecha - today;

                        const daysDifference = Math.ceil(timeDifference / (1000 * 60 * 60 * 24));

                        if (row[parametro1[10]]!=null) {

                            return row[parametro1[10]];

                        }else if ((row[parametro3[6]]==null) && (row[parametro4[6]]!=null) && (daysDifference < 0)) {

                            return "SUSPENSION";

                        
                        }else if ((row[parametro3[6]]!=null) && (row[parametro4[6]]!=null) && (row[parametro3[6]] > row[parametro4[6]])) {

                            return "SUSPENSION";

                        }else if ((row[parametro3[6]]!=null) && (row[parametro4[6]]!=null) && (row[parametro3[6]] < row[parametro4[6]])){

                            return "------";

                        }else{
                            return "N/A";
                        }

                    }else{
                        return row[parametro3[5]];
                    }

                })

            });

        }	
        
        if (parametro1[11]!="" && parametro1[11]!=" ") {

            objeto.push({ 

                "aTargets":[parametro1[11]], 
                "mData": null,
                "mRender": (function (data, type, row) {

                    if (parametro2[11]=="estado_plazo_suspenciones") {

                        //parametro 3 fecha de envio de poa
                        //parametro 4 fecha de registro plazo

                        const today = new Date();
                        
                        const fecha= new Date(row[parametro4[7]])

                        const timeDifference = fecha - today;

                        const daysDifference = Math.ceil(timeDifference / (1000 * 60 * 60 * 24));

                        if (row[parametro1[11]]!=null) {

                            return row[parametro1[11]];

                        }else if ((row[parametro3[7]]==null) && (row[parametro4[7]]!=null) && (daysDifference < 0)) {

                            return "SUSPENSION";

                        
                        }else if ((row[parametro3[7]]!=null) && (row[parametro4[7]]!=null) && (row[parametro3[7]] > row[parametro4[7]])) {

                            return "SUSPENSION";

                        }else if ((row[parametro3[7]]!=null) && (row[parametro4[7]]!=null) && (row[parametro3[7]] < row[parametro4[7]])){

                            return "------";

                        }else{
                            return "N/A";
                        }

                    }else if(parametro2[11]=="enlaces__documentos__simples"){

                        if (row[parametro1[11]]!=null){
                            return "<a href='"+parametro5[0]+row[parametro1[11]]+"' target='_blank'>"+row[parametro1[11]]+"</a>";
                        }else{
                            return "<a href='"+parametro5[0]+row[parametro1[11]]+".pdf' target='_blank'></a>";
                        }

                    }else if(parametro2[5]=="boton"){

                        return parametro3[5];

                    }else{
                        return row[parametro3[5]];
                    }

                })

            });

        }

        if (parametro1[12]!="" && parametro1[12]!=" ") {

            objeto.push({ 

                "aTargets":[parametro1[12]], 
                "mData": null,
                "mRender": (function (data, type, row) {

                    if(parametro2[12]=="chekeds__2__plazos"){

                        return "<input type='checkbox' class='checkeds__seleccionables__estado__plazos' idOrganismos='"+row[parametro1[16]]+"' attr='primerTrimestre'/>";
            
                    }else if(parametro2[12]=="boton_plazos_suspenciones"){

                        var nombre ;
                        
                        if(row[parametro3[5]] =='SUSPENSION'){
                            nombre="SUSPENDIDO"
                        }else if(row[parametro3[5]] =='REACTIVACION'){
                            nombre="REACTIVADA"
                        }else{
                            return "";
                        }

                        return "<center><button idOrganismos='"+row[parametro3[4]]+"' estado='"+nombre+"' trimestre='primerTrimestre' data-bs-toggle='modal' data-bs-target='#modalSubirEstadoPlazos' class='seguimiento_notificar_plazos_planificacion_financiero estilo__botonDatatablets btn btn-warning pointer__botones'>"+nombre+"</button></center>";

                    }else if(parametro2[12]=="boton_plazos_ajuste"){

                        var nombre ;
                        
                        if(row[parametro3[5]] =='SUSPENSION'){
                            nombre="SUSPENDIDO"
                        }else if(row[parametro3[5]] =='REACTIVACION'){
                            nombre="REACTIVADA"
                        }else if(row[parametro3[5]] =='AJUSTE'){
                            nombre="AJUSTADO"
                        }else{
                            return "";
                        }

                        return "<center><button idOrganismos='"+row[parametro3[4]]+"' estado='"+nombre+"' trimestre='primerTrimestre' data-bs-toggle='modal' data-bs-target='#modalSubirEstadoPlazos' class='seguimiento_notificar_plazos_planificacion_financiero estilo__botonDatatablets btn btn-warning pointer__botones'>"+nombre+"</button></center>";

                    }else if(parametro2[12]=="enlaces__documentos__simples"){

                        if (row[parametro1[12]]!=null){
                            return "<a href='"+parametro5[0]+row[parametro1[12]]+"' target='_blank'>"+row[parametro1[12]]+"</a>";
                        }else{
                            return "<a href='"+parametro5[0]+row[parametro1[12]]+".pdf' target='_blank'></a>";
                        }

                    }else{
                        return row[parametro3[5]];
                    }

                })

            });

        }

        if (parametro1[13]!="" && parametro1[13]!=" ") {

            objeto.push({ 

                "aTargets":[parametro1[13]], 
                "mData": null,
                "mRender": (function (data, type, row) {

                    if(parametro2[13]=="chekeds__2__plazos"){

                        return "<input type='checkbox' class='checkeds__seleccionables__estado__plazos' idOrganismos='"+row[parametro1[16]]+"' attr='segundoTrimestre'/>";
                        
                    }else if(parametro2[13]=="boton_plazos_suspenciones"){

                        var nombre ;
                        
                        if(row[parametro3[6]] =='SUSPENSION'){
                            nombre="SUSPENDIDO"
                        }else if(row[parametro3[6]] =='REACTIVACION'){
                            nombre="REACTIVADA"
                        }else{
                            return "";
                        }

                        return "<center><button idOrganismos='"+row[parametro3[4]]+"' estado='"+nombre+"' trimestre='segundoTrimestre' data-bs-toggle='modal' data-bs-target='#modalSubirEstadoPlazos' class='seguimiento_notificar_plazos_planificacion_financiero estilo__botonDatatablets btn btn-warning pointer__botones'>"+nombre+"</button></center>";

                    }else if(parametro2[13]=="boton_plazos_ajuste"){

                        var nombre ;
                        
                        if(row[parametro3[6]] =='SUSPENSION'){
                            nombre="SUSPENDIDO"
                        }else if(row[parametro3[6]] =='REACTIVACION'){
                            nombre="REACTIVADA"
                        }else if(row[parametro3[6]] =='AJUSTE'){
                            nombre="AJUSTADO"
                        }else{
                            return "";
                        }

                        return "<center><button idOrganismos='"+row[parametro3[4]]+"' estado='"+nombre+"' trimestre='segundoTrimestre' data-bs-toggle='modal' data-bs-target='#modalSubirEstadoPlazos' class='seguimiento_notificar_plazos_planificacion_financiero estilo__botonDatatablets btn btn-warning pointer__botones'>"+nombre+"</button></center>";

                    }else if(parametro2[13]=="enlaces__documentos__simples"){

                        if (row[parametro1[13]]!=null){
                            return "<a href='"+parametro5[0]+row[parametro1[13]]+"' target='_blank'>"+row[parametro1[13]]+"</a>";
                        }else{
                            return "<a href='"+parametro5[0]+row[parametro1[13]]+".pdf' target='_blank'></a>";
                        }

                    }else{
                        return row[parametro3[5]];
                    }

                })

            });

        }

        if (parametro1[14]!="" && parametro1[14]!=" ") {

            objeto.push({ 

                "aTargets":[parametro1[14]], 
                "mData": null,
                "mRender": (function (data, type, row) {

                    if(parametro2[14]=="chekeds__2__plazos"){

                        return "<input type='checkbox' class='checkeds__seleccionables__estado__plazos' idOrganismos='"+row[parametro1[16]]+"' attr='tercerTrimestre'/>";
                        
                    }else if(parametro2[14]=="boton_plazos_suspenciones"){

                        var nombre ;
                        
                        if(row[parametro3[7]] =='SUSPENSION'){
                            nombre="SUSPENDIDO"
                        }else if(row[parametro3[7]] =='REACTIVACION'){
                            nombre="REACTIVADA"
                        }else{
                            return "";
                        }

                        return "<center><button idOrganismos='"+row[parametro3[4]]+"' estado='"+nombre+"' trimestre='tercerTrimestre' data-bs-toggle='modal' data-bs-target='#modalSubirEstadoPlazos' class='seguimiento_notificar_plazos_planificacion_financiero estilo__botonDatatablets btn btn-warning pointer__botones'>"+nombre+"</button></center>";

                    }else if(parametro2[14]=="boton_plazos_ajuste"){

                        var nombre ;
                        
                        if(row[parametro3[7]] =='SUSPENSION'){
                            nombre="SUSPENDIDO"
                        }else if(row[parametro3[7]] =='REACTIVACION'){
                            nombre="REACTIVADA"
                        }else if(row[parametro3[7]] =='AJUSTE'){
                            nombre="AJUSTADO"
                        }else if(row[parametro3[7]] =='AJUSTADO'){
                            nombre="AJUSTADO"
                        }else{
                            return "";
                        }

                        return "<center><button idOrganismos='"+row[parametro3[4]]+"' estado='"+nombre+"' trimestre='tercerTrimestre' data-bs-toggle='modal' data-bs-target='#modalSubirEstadoPlazos' class='seguimiento_notificar_plazos_planificacion_financiero estilo__botonDatatablets btn btn-warning pointer__botones'>"+nombre+"</button></center>";

                    }else if(parametro2[14]=="enlaces__documentos__simples"){

                        if (row[parametro1[14]]!=null){
                            return "<a href='"+parametro5[0]+row[parametro1[14]]+"' target='_blank'>"+row[parametro1[14]]+"</a>";
                        }else{
                            return "<a href='"+parametro5[0]+row[parametro1[14]]+".pdf' target='_blank'></a>";
                        }

                    }else{
                        return row[parametro3[5]];
                    }

                })

            });

        }

        if (parametro1[15]!="" && parametro1[15]!=" ") {

            objeto.push({ 

                "aTargets":[parametro1[15]], 
                "mData": null,
                "mRender": (function (data, type, row) {

                    if(parametro2[15]=="chekeds__2__plazos"){

                        return "<input type='checkbox'  class='checkeds__seleccionables__estado__plazos' idOrganismos='"+row[parametro1[16]]+"' attr='cuartoTrimestre'/>";
            
                    }else if(parametro2[15]=="boton_plazos_suspenciones"){

                        var nombre ;
                        
                        if(row[parametro3[8]] =='SUSPENSION'){
                            nombre="SUSPENDIDO"
                        }else if(row[parametro3[8]] =='REACTIVACION'){
                            nombre="REACTIVADA"
                        }else{
                            return "";
                        }

                        return "<center><button idOrganismos='"+row[parametro3[4]]+"' estado='"+nombre+"' trimestre='cuartoTrimestre' data-bs-toggle='modal' data-bs-target='#modalSubirEstadoPlazos' class='seguimiento_notificar_plazos_planificacion_financiero estilo__botonDatatablets btn btn-warning pointer__botones'>"+nombre+"</button></center>";

                    }else if(parametro2[15]=="boton_plazos_ajuste"){

                        var nombre ;
                        
                        if(row[parametro3[8]] =='SUSPENSION'){
                            nombre="SUSPENDIDO"
                        }else if(row[parametro3[8]] =='REACTIVACION'){
                            nombre="REACTIVADA"
                        }else if(row[parametro3[8]] =='AJUSTE'){
                            nombre="AJUSTADO"
                        }else if(row[parametro3[8]] =='AJUSTADO'){
                            nombre="AJUSTADO"
                        }else{
                            return "";
                        }

                        return "<center><button idOrganismos='"+row[parametro3[4]]+"' estado='"+nombre+"' trimestre='cuartoTrimestre' data-bs-toggle='modal' data-bs-target='#modalSubirEstadoPlazos' class='seguimiento_notificar_plazos_planificacion_financiero estilo__botonDatatablets btn btn-warning pointer__botones'>"+nombre+"</button></center>";

                    }else if(parametro2[15]=="enlaces__documentos__simples"){

                        if (row[parametro1[15]]!=null){
                            return "<a href='"+parametro5[0]+row[parametro1[15]]+"' target='_blank'>"+row[parametro1[15]]+"</a>";
                        }else{
                            return "<a href='"+parametro5[0]+row[parametro1[15]]+".pdf' target='_blank'></a>";
                        }

                    }else{
                        return row[parametro3[5]];
                    }

                })

            });

        }

        if (parametro1[16]!="" && parametro1[16]!=" ") {

            objeto.push({ 

                "aTargets":[parametro1[16]], 
                "mData": null,
                "mRender": (function (data, type, row) {

                    if(parametro2[16]=="enlaces__documentos__simples"){

                        if (row[parametro1[16]]!=null){
                            return "<a href='"+parametro5[0]+row[parametro1[16]]+"' target='_blank'>"+row[parametro1[16]]+"</a>";
                        }else{
                            return "<a href='"+parametro5[0]+row[parametro1[16]]+".pdf' target='_blank'></a>";
                        }

                    }else{
                        return row[parametro3[5]];
                    }

                })

            });

        }

        if (parametro1[17]!="" && parametro1[17]!=" ") {

            objeto.push({ 

                "aTargets":[parametro1[17]], 
                "mData": null,
                "mRender": (function (data, type, row) {

                    if(parametro2[17]=="enlaces__documentos__simples"){

                        if (row[parametro1[17]]!=null){
                            return "<a href='"+parametro5[0]+row[parametro1[17]]+"' target='_blank'>"+row[parametro1[17]]+"</a>";
                        }else{
                            return "<a href='"+parametro5[0]+row[parametro1[17]]+".pdf' target='_blank'></a>";
                        }

                    }else{
                        return row[parametro3[5]];
                    }

                })

            });

        }

        if (parametro1[18]!="" && parametro1[18]!=" ") {

            objeto.push({ 

                "aTargets":[parametro1[18]], 
                "mData": null,
                "mRender": (function (data, type, row) {

                    if(parametro2[18]=="enlaces__documentos__simples"){

                        if (row[parametro1[18]]!=null){
                            return "<a href='"+parametro5[0]+row[parametro1[18]]+"' target='_blank'>"+row[parametro1[18]]+"</a>";
                        }else{
                            return "<a href='"+parametro5[0]+row[parametro1[18]]+".pdf' target='_blank'></a>";
                        }

                    }else{
                        return row[parametro3[5]];
                    }

                })

            });

        }

        if (parametro1[19]!="" && parametro1[19]!=" ") {

            objeto.push({ 

                "aTargets":[parametro1[19]], 
                "mData": null,
                "mRender": (function (data, type, row) {

                    if(parametro2[19]=="enlaces__documentos__simples"){

                        if (row[parametro1[19]]!=null){
                            return "<a href='"+parametro5[0]+row[parametro1[19]]+"' target='_blank'>"+row[parametro1[19]]+"</a>";
                        }else{
                            return "<a href='"+parametro5[0]+row[parametro1[19]]+".pdf' target='_blank'></a>";
                        }

                    }else{
                        return row[parametro3[5]];
                    }

                })

            });

        }

        if (parametro1[20]!="" && parametro1[20]!=" ") {

            objeto.push({ 

                "aTargets":[parametro1[20]], 
                "mData": null,
                "mRender": (function (data, type, row) {

                     if(parametro2[20]=="enlaces__documentos__simples"){

                        if (row[parametro1[20]]!=null){
                            return "<a href='"+parametro5[0]+row[parametro1[20]]+"' target='_blank'>"+row[parametro1[20]]+"</a>";
                        }else{
                            return "<a href='"+parametro5[0]+row[parametro1[20]]+".pdf' target='_blank'></a>";
                        }

                    }else{
                        return row[parametro3[5]];
                    }

                })

            });

        }

        if (parametro1[21]!="" && parametro1[21]!=" ") {

            objeto.push({ 

                "aTargets":[parametro1[21]], 
                "mData": null,
                "mRender": (function (data, type, row) {

                     if(parametro2[21]=="enlaces__documentos__simples"){

                        if (row[parametro1[21]]!=null){
                            return "<a href='"+parametro5[0]+row[parametro1[21]]+"' target='_blank'>"+row[parametro1[21]]+"</a>";
                        }else{
                            return "<a href='"+parametro5[0]+row[parametro1[21]]+".pdf' target='_blank'></a>";
                        }

                    }else{
                        return row[parametro3[5]];
                    }

                })

            });

        }

        if (parametro1[22]!="" && parametro1[22]!=" ") {

            objeto.push({ 

                "aTargets":[parametro1[22]], 
                "mData": null,
                "mRender": (function (data, type, row) {

                     if(parametro2[22]=="enlaces__documentos__simples"){

                        if (row[parametro1[22]]!=null){
                            return "<a href='"+parametro5[0]+row[parametro1[22]]+"' target='_blank'>"+row[parametro1[22]]+"</a>";
                        }else{
                            return "<a href='"+parametro5[0]+row[parametro1[22]]+".pdf' target='_blank'></a>";
                        }

                    }else{
                        return row[parametro3[5]];
                    }

                })

            });

        }

        if (parametro1[23]!="" && parametro1[23]!=" ") {

            objeto.push({ 

                "aTargets":[parametro1[23]], 
                "mData": null,
                "mRender": (function (data, type, row) {

                    if(parametro2[23]=="enlaces__documentos__simples"){

                        if (row[parametro1[23]]!=null){
                            return "<a href='"+parametro5[0]+row[parametro1[23]]+"' target='_blank'>"+row[parametro1[23]]+"</a>";
                        }else{
                            return "<a href='"+parametro5[0]+row[parametro1[23]]+".pdf' target='_blank'></a>";
                        }

                    }else{
                        return row[parametro3[5]];
                    }

                })

            });

        }

        if (parametro1[24]!="" && parametro1[24]!=" ") {

            objeto.push({ 

                "aTargets":[parametro1[24]], 
                "mData": null,
                "mRender": (function (data, type, row) {

                    if(parametro2[24]=="enlaces__documentos__simples"){

                        if (row[parametro1[24]]!=null){
                            return "<a href='"+parametro5[0]+row[parametro1[24]]+"' target='_blank'>"+row[parametro1[24]]+"</a>";
                        }else{
                            return "<a href='"+parametro5[0]+row[parametro1[24]]+".pdf' target='_blank'></a>";
                        }

                    }else{
                        return row[parametro3[5]];
                    }

                })

            });

        }

        if (parametro1[25]!="" && parametro1[25]!=" ") {

            objeto.push({ 

                "aTargets":[parametro1[25]], 
                "mData": null,
                "mRender": (function (data, type, row) {

                    if(parametro2[25]=="enlaces__documentos__simples"){

                        if (row[parametro1[25]]!=null){
                            return "<a href='"+parametro5[0]+row[parametro1[25]]+"' target='_blank'>"+row[parametro1[25]]+"</a>";
                        }else{
                            return "<a href='"+parametro5[0]+row[parametro1[25]]+".pdf' target='_blank'></a>";
                        }

                    }else{
                        return row[parametro3[5]];
                    }

                })

            });

        }

        if (parametro1[26]!="" && parametro1[26]!=" ") {

            objeto.push({ 

                "aTargets":[parametro1[26]], 
                "mData": null,
                "mRender": (function (data, type, row) {

                    if(parametro2[26]=="enlaces__documentos__simples"){

                        if (row[parametro1[26]]!=null){
                            return "<a href='"+parametro5[0]+row[parametro1[26]]+"' target='_blank'>"+row[parametro1[26]]+"</a>";
                        }else{
                            return "<a href='"+parametro5[0]+row[parametro1[26]]+".pdf' target='_blank'></a>";
                        }

                    }else{
                        return row[parametro3[5]];
                    }

                })

            });

        }

        if (parametro1[27]!="" && parametro1[27]!=" ") {

            objeto.push({ 

                "aTargets":[parametro1[27]], 
                "mData": null,
                "mRender": (function (data, type, row) {

                    if(parametro2[27]=="enlaces__documentos__simples"){

                        if (row[parametro1[27]]!=null){
                            return "<a href='"+parametro5[0]+row[parametro1[27]]+"' target='_blank'>"+row[parametro1[27]]+"</a>";
                        }else{
                            return "<a href='"+parametro5[0]+row[parametro1[27]]+".pdf' target='_blank'></a>";
                        }

                    }else{
                        return row[parametro3[5]];
                    }

                })

            });

        }

        if (parametro1[28]!="" && parametro1[28]!=" ") {

            objeto.push({ 

                "aTargets":[parametro1[28]], 
                "mData": null,
                "mRender": (function (data, type, row) {

                    if(parametro2[28]=="enlaces__documentos__simples"){

                        if (row[parametro1[28]]!=null){
                            return "<a href='"+parametro5[0]+row[parametro1[28]]+"' target='_blank'>"+row[parametro1[28]]+"</a>";
                        }else{
                            return "<a href='"+parametro5[0]+row[parametro1[28]]+".pdf' target='_blank'></a>";
                        }

                    }else{
                        return row[parametro3[5]];
                    }

                })

            });

        }

        if (parametro1[29]!="" && parametro1[29]!=" ") {

            objeto.push({ 

                "aTargets":[parametro1[29]], 
                "mData": null,
                "mRender": (function (data, type, row) {

                    if(parametro2[29]=="enlaces__documentos__simples"){

                        if (row[parametro1[29]]!=null){
                            return "<a href='"+parametro5[0]+row[parametro1[29]]+"' target='_blank'>"+row[parametro1[29]]+"</a>";
                        }else{
                            return "<a href='"+parametro5[0]+row[parametro1[29]]+".pdf' target='_blank'></a>";
                        }

                    }else{
                        return row[parametro3[5]];
                    }

                })

            });

        }

        if (parametro1[30]!="" && parametro1[30]!=" ") {

            objeto.push({ 

                "aTargets":[parametro1[30]], 
                "mData": null,
                "mRender": (function (data, type, row) {

                    if(parametro2[30]=="enlaces__documentos__simples"){

                        if (row[parametro1[30]]!=null){
                            return "<a href='"+parametro5[0]+row[parametro1[30]]+"' target='_blank'>"+row[parametro1[30]]+"</a>";
                        }else{
                            return "<a href='"+parametro5[0]+row[parametro1[30]]+".pdf' target='_blank'></a>";
                        }

                    }else{
                        return row[parametro3[5]];
                    }

                })

            });

        }

        if (parametro1[31]!="" && parametro1[31]!=" ") {

            objeto.push({ 

                "aTargets":[parametro1[31]], 
                "mData": null,
                "mRender": (function (data, type, row) {

                    if(parametro2[31]=="enlaces__documentos__simples"){

                        if (row[parametro1[31]]!=null){
                            return "<a href='"+parametro5[0]+row[parametro1[31]]+"' target='_blank'>"+row[parametro1[31]]+"</a>";
                        }else{
                            return "<a href='"+parametro5[0]+row[parametro1[31]]+".pdf' target='_blank'></a>";
                        }

                    }else{
                        return row[parametro3[5]];
                    }

                })

            });

        }
        if (parametro1[32]!="" && parametro1[31]!=" ") {

            objeto.push({ 

                "aTargets":[parametro1[32]], 
                "mData": null,
                "mRender": (function (data, type, row) {

                    if(parametro2[32]=="enlaces__documentos__simples"){

                        if (row[parametro1[32]]!=null){
                            return "<a href='"+parametro5[0]+row[parametro1[32]]+"' target='_blank'>"+row[parametro1[32]]+"</a>";
                        }else{
                            return "<a href='"+parametro5[0]+row[parametro1[32]]+".pdf' target='_blank'></a>";
                        }

                    }else{
                        return row[parametro3[5]];
                    }

                })

            });

        }

        if (parametro1[33]!="" && parametro1[33]!=" ") {

            objeto.push({ 

                "aTargets":[parametro1[33]], 
                "mData": null,
                "mRender": (function (data, type, row) {

                    if(parametro2[33]=="enlaces__documentos__simples"){

                        if (row[parametro1[32]]!=null){
                            return "<a href='"+parametro5[0]+row[parametro1[33]]+"' target='_blank'>"+row[parametro1[33]]+"</a>";
                        }else{
                            return "<a href='"+parametro5[0]+row[parametro1[33]]+".pdf' target='_blank'></a>";
                        }

                    }else{
                        return row[parametro3[5]];
                    }

                })

            });

        }

        if (parametro1[34]!="" && parametro1[34]!=" ") {

            objeto.push({ 

                "aTargets":[parametro1[34]], 
                "mData": null,
                "mRender": (function (data, type, row) {

                    if(parametro2[34]=="enlaces__documentos__simples"){

                        if (row[parametro1[32]]!=null){
                            return "<a href='"+parametro5[0]+row[parametro1[34]]+"' target='_blank'>"+row[parametro1[34]]+"</a>";
                        }else{
                            return "<a href='"+parametro5[0]+row[parametro1[34]]+".pdf' target='_blank'></a>";
                        }

                    }else{
                        return row[parametro3[5]];
                    }

                })

            });

        }

        if (parametro1[35]!="" && parametro1[35]!=" ") {

            objeto.push({ 

                "aTargets":[parametro1[35]], 
                "mData": null,
                "mRender": (function (data, type, row) {

                    if(parametro2[35]=="enlaces__documentos__simples"){

                        if (row[parametro1[32]]!=null){
                            return "<a href='"+parametro5[0]+row[parametro1[35]]+"' target='_blank'>"+row[parametro1[35]]+"</a>";
                        }else{
                            return "<a href='"+parametro5[0]+row[parametro1[35]]+".pdf' target='_blank'></a>";
                        }

                    }else{
                        return row[parametro3[5]];
                    }

                })

            });

        }


        /*=====  End of Creación de elementos  ======*/

        return objeto;

    }

/*=====  End of Función de seguimientos  ======*/


/*=============================
=            Función recomendar altos            =
=============================*/

var funcion__reasignar__seguimientos__unidos__altos__recomendados2023=function(tbody,table){

	$(tbody).on("click","button.reasignarTramites__seguimientosAltos__recomendados",function(e){
	  console.log("FUNCION 000000000000002 ALTO RENDIMIENTO");
		e.preventDefault();
  
		var data=table.row($(this).parents("tr")).data();
  
  
		var paqueteDeDatos = new FormData();
  
		paqueteDeDatos.append('tipo','enviar__infor__data__seguimientos');
  
		paqueteDeDatos.append("idOrganismo",data[8]);
  
		paqueteDeDatos.append("periodo",data[6]);
  
		paqueteDeDatos.append("tipo__dos",data[9]);
  
		let idUsuarioC=$("#idUsuarioC").val();
  
		paqueteDeDatos.append("idUsuarioC",idUsuarioC);
	  console.log("3 , 2 , 4");
	  console.log(data[3],data[2],data[4]);
		console.log(data);
  
	  $.ajax({
  
		  type:"POST",
		  url:"modelosBd/inserta/seleccionaAcciones.md.php",
		  contentType: false,
		  data:paqueteDeDatos,
		  processData: false,
		  cache: false, 
		  success:function(response){
  
		  $.getScript("layout/scripts/js/validacionBasica.js",function(){
  
			  let elementos=JSON.parse(response);
  
			  let envio__tecnicos=elementos['envio__tecnicos'];
			  let zonal__eu=elementos['zonal__eu'];
			  let documentos__tecnicos=elementos['documentos__tecnicos'];
				console.log("zonal__eu");
				console.log(zonal__eu);
			  $("#organismoOculto__modal").val(data[8]);
  
			  if ($("#idRolAd").val()==3) {
  
				  $(".observacionesReasignaciones").hide();
  
			  }else{
  
				  $(".observacionesReasignaciones").show();
  
			  }
  
  
			  if($("#idRolAd").val()==7){
  
				  $(".direccion__seguimientos__ocultos").show();
  
				  $("#selects__superiores__regresar").remove();
				  $("#selects__superiores").show();
  
				  $("#selects__superiores__regresar__coors").remove();
				  $("#selects__superiores__subsess").remove();
  
  
			  }else if (zonal__eu==1 || zonal__eu=="1") {
  
				  $("#selects__superiores__regresar").show();
				  $("#selects__superiores").show();
  
				  $("#selects__superiores__regresar__coors").remove();
				  $("#selects__superiores__subsess").remove();
  
			  }else{
  
				  $("#selects__superiores__regresar").remove();
				  $("#selects__superiores__regresar__coors").show();
  
				  $("#selects__superiores").remove();
				  $("#selects__superiores__subsess").show();
  
			  }
  
			  for (w of envio__tecnicos) {
  
				  $(".funcionario__recomendaste").text(w.nombreCompleto);
				  $(".fecha__recomendaste").text(w.fecha);
  
			  }
  
			  for (z of documentos__tecnicos) {
  
				  $("#informe__recomendados").attr('href',$("#filesFrontend").val()+'seguimiento/informes__altos/'+z.archivo);
  
				  $(".observaciones__recomendaste").text(z.observacion);
				  $("#nombreDocumento").val(z.archivo);
				  $(".recomendaciones__recomendaste").text(z.recomendacion);
  
			  }
  
			  if ($("#idRolAd").val()==7) {
  
				//  $(".oculto__subsess__deseados").attr('style','visibility: hidden!important;');
				  $(".oculto__subsess__deseados").show();
			
  
			  }
  
			  $("#periodo").val(data[6]);
  
		  });	
  
		  },
		  error:function(){
  
		  }
				  
	  });	  	
  
	});
  
  }

  
  
  /*=====  End of Función recomendar altos  ======*/
  


 /*==================================================================
=            Funcion reasignar seguimientos segimientos            =
==================================================================*/

var funcion__reasignar__seguimientos__unidos__seguimientos__seguimientos__recomendados__formaRe2023=function(tbody,table){

    $(tbody).on("click","button.reasignarTramites__seguimientosSeguimientos__recomendados",function(e){
      //console.log("FUNACION 0000002  DSPPP");
        e.preventDefault();

        $(".boton__pdfs__financiero").hide();
        $(".faltantes_documentos_financieros").hide();
        $(".faltantes_documentos_tecnicos").hide();
        $(".faltantes_documentos_infraestructura").hide();
        
        
  
        var data=table.row($(this).parents("tr")).data();
  
  
        var paqueteDeDatos = new FormData();
  
        paqueteDeDatos.append('tipo','enviar__infor__data__seguimientos');
  
        paqueteDeDatos.append("idOrganismo",data[9]);
  
        paqueteDeDatos.append("periodo",data[6]);
  
        paqueteDeDatos.append("tipo__dos",data[8]);
  
        let idUsuarioC=$("#idUsuarioC").val();
  
        paqueteDeDatos.append("idUsuarioC",idUsuarioC);
  
      console.log("DATA 4 2 3")
      console.log(data[4],data[2],data[3])
      console.log("DATA 5 3 4")
      console.log(data[8],data[6],data[7])
  
        console.log(data);
  
      $.ajax({
  
          type:"POST",
          url:"modelosBd/POA_SEGUIMIENTO_REVISOR/selector.md.php",
          contentType: false,
          data:paqueteDeDatos,
          processData: false,
          cache: false, 
          success:function(response){
  
          $.getScript("layout/scripts/js/validacionBasica.js",function(){
  
              let elementos=JSON.parse(response);
  
              let documentos__tecnico__2__seguimientos=elementos['documentos__tecnico__2__seguimientos'];
              let envio__tecnicos__seguimientos=elementos['envio__tecnicos__seguimientos'];
              let varaible__culminados=elementos['varaible__culminados'];
              let documentos__tecnicos__2=elementos['documentos__tecnicos__2'];
              let var_n_se_in=elementos['var_n_se_in'];
              let var_n_se_financiero=elementos['var_n_se_financiero'];
              let documentos__tecnicos_Contratacion=elementos['documentos__tecnicos_Contratacion'];
              let documentos__tecnicos_actividad1=elementos['documentos__tecnicos_actividad1'];
              let nuevo__infras__seguimientos=elementos['nuevo__infras__seguimientos'];

              let indicadores__infraestructura_existe=elementos['indicadores__infraestructura_existe'];
              
              
              
              let envio__tecnicos__seguimientos__infraestructuras=elementos['envio__tecnicos__seguimientos__infraestructuras'];
  
              let var_n_se_in__45=elementos['var_n_se_in__45'];
  
              $("#organismoOculto__modal").val(data[9]);
  
              $("#periodo").val(data[6]);

              if(var_n_se_financiero==0){
                
                $(".faltantes_documentos_financieros").show();
            }
            
            if(varaible__culminados=="" && varaible__culminados==" " && varaible__culminados==undefined && varaible__culminados==null){
                
                $(".faltantes_documentos_tecnicos").show();
            }
           
  
              for (z of envio__tecnicos__seguimientos) {
  
                  $(".funcionario__recomendaste").text(z.nombreCompleto);
                  $(".fecha__recomendaste").text(z.fecha);
  
              }
  
              for (z of documentos__tecnico__2__seguimientos) {
  
                  $("#informe__recomendados").attr('href',$("#filesFrontend").val()+'seguimiento/informesSeguimientos/'+z.documentos);
  
                  $(".observaciones__recomendaste").text(z.observaciones);
                  $("#nombreDocumento").val(z.documentos);
                  $(".recomendaciones__recomendaste").text(z.recomendaciones);
  
              }
  
  
              if (var_n_se_in==1 && envio__tecnicos__seguimientos__infraestructuras!="" && envio__tecnicos__seguimientos__infraestructuras!=undefined && envio__tecnicos__seguimientos__infraestructuras!=" " && envio__tecnicos__seguimientos__infraestructuras!=null && var_n_se_in__45==1) {
  
                  for (z of envio__tecnicos__seguimientos__infraestructuras) {
  
                      $(".boton__pdfs__infraestructuras").show();
  
                      $("#documentos__tecnicos__i").attr('href',$("#filesFrontend").val()+'seguimiento/informesInfraestructuras/'+z.documentoInfras);
  
                  }
  
              }

           

            if (var_n_se_financiero==1 && documentos__tecnicos_Contratacion!="" && documentos__tecnicos_Contratacion!=undefined && documentos__tecnicos_Contratacion!=" " && documentos__tecnicos_Contratacion!=null ) {
  
                for (z of documentos__tecnicos_Contratacion) {

                    $(".boton__pdfs__financiero").show();

                    $("#documentos__tecnicos__contratacion_financiero").attr('href',$("#filesFrontend").val()+'seguimiento/informes__contratacion/'+z.archivo);

                }

            }

            if (var_n_se_financiero==1 && documentos__tecnicos_actividad1!="" && documentos__tecnicos_actividad1!=undefined && documentos__tecnicos_actividad1!=" " && documentos__tecnicos_actividad1!=null ) {
  
                for (z of documentos__tecnicos_actividad1) {

                    $(".boton__pdfs__financiero").show();

                    $("#documentos__tecnicos__actividad1_financiero").attr('href',$("#filesFrontend").val()+'seguimiento/informes__contratacion/'+z.archivo);

                }

            }
  
  
  
              if (varaible__culminados!="" && varaible__culminados!=" " && varaible__culminados!=undefined && varaible__culminados!=null) {
  
                  for (zC of documentos__tecnicos__2) {
  
                      if (data[8]=="FORMATIVO") {
  
                          $("#documentos__tecnicos__t").attr('href',$("#filesFrontend").val()+'seguimiento/informe__formativos/'+zC.archivo);
  
                      }else if (data[8]=="RECREACION" || data[8]=="RECREACIÓN") {
  
                          $("#documentos__tecnicos__t").attr('href',$("#filesFrontend").val()+'seguimiento/informe__recreativos/'+zC.archivo);
  
                      }else{
  
                          $("#documentos__tecnicos__t").attr('href',$("#filesFrontend").val()+'seguimiento/informes__altos/'+zC.archivo);
  
                      }
  
                  }
  
                  $(".boton__pdfs__tecnicas").show();
  
  
              }else{
  
                  $(".oculto__subsess__deseados").hide();
                  $(".faltantes_documentos_tecnicos").show();
                  $(".clases__puedes__recomendares").text("FALTA EL INFORME DEL ÁREA TÉCNICA");
  
  
              }
  
              if (var_n_se_in==1 && (envio__tecnicos__seguimientos__infraestructuras=="" || envio__tecnicos__seguimientos__infraestructuras==undefined && envio__tecnicos__seguimientos__infraestructuras==" " || envio__tecnicos__seguimientos__infraestructuras==null || var_n_se_in__45==0)) {
  
                 
                  $(".faltantes_documentos_infraestructura").show();
  
              }
  
              if (var_n_se_in==1 && envio__tecnicos__seguimientos__infraestructuras!="" && envio__tecnicos__seguimientos__infraestructuras!=undefined && envio__tecnicos__seguimientos__infraestructuras!=" " && envio__tecnicos__seguimientos__infraestructuras!=null && varaible__culminados!="" && varaible__culminados!=" " && varaible__culminados!=undefined && varaible__culminados!=null && var_n_se_in__45==1 && var_n_se_financiero==1) {
  
                  $("#enviar__orgnaismosDeportivos").show();
  
              }else if(var_n_se_in==0 && varaible__culminados!="" && varaible__culminados!=" " && varaible__culminados!=undefined && varaible__culminados!=null && var_n_se_financiero==1){
  
                  $("#enviar__orgnaismosDeportivos").show();                        
  
              }
  
  
  
          });	
  
          },
          error:function(){
  
          }
                  
      });	  	
  
    });


    
  
}
  
  /*=====  End of Funcion reasignar seguimientos segimientos  ======*/



  /*=============================================
=            Recomendar formativos            =
=============================================*/

var funcion__reasignar__seguimientos__unidos__altos__recomendados__formaRe2023=function(tbody,table){


    $(tbody).on("click","button.reasignarTramites__seguimientosAltos__recomendados",function(e){
        console.log("FUNCION 000000000000002 ALTO RENDIMIENTO");
          e.preventDefault();
    
          var data=table.row($(this).parents("tr")).data();

          $("#tipo").val(data[12]);
    
    
          var paqueteDeDatos = new FormData();
    
          paqueteDeDatos.append('tipo','enviar__infor__data__seguimientos');
    
          paqueteDeDatos.append("idOrganismo",data[8]);
    
          paqueteDeDatos.append("periodo",data[6]);
    
          paqueteDeDatos.append("tipo__dos",data[12]);
    
          let idUsuarioC=$("#idUsuarioC").val();
    
          paqueteDeDatos.append("idUsuarioC",idUsuarioC);
        console.log("3 , 2 , 4");
        console.log(data[3],data[2],data[4]);
          console.log(data);
    
        $.ajax({
    
            type:"POST",
            url:"modelosBd/POA_SEGUIMIENTO_REVISOR/selector.md.php",
            contentType: false,
            data:paqueteDeDatos,
            processData: false,
            cache: false, 
            success:function(response){
    
            $.getScript("layout/scripts/js/validacionBasica.js",function(){
    
                let elementos=JSON.parse(response);
    
                let envio__tecnicos=elementos['envio__tecnicos'];
                let zonal__eu=elementos['zonal__eu'];
                let documentos__tecnicos__2=elementos['documentos__tecnicos__2'];
                
                  console.log("zonal__eu");
                  console.log(zonal__eu);
                $("#organismoOculto__modal").val(data[8]);
    
                if ($("#idRolAd").val()==3) {
    
                    $(".observacionesReasignaciones").hide();
    
                }else{
    
                    $(".observacionesReasignaciones").show();
    
                }
    
    
                if($("#idRolAd").val()==7 || $("#idRolAd").val()==4){
    
                    $(".direccion__seguimientos__ocultos").show();
    
                    $("#selects__superiores__regresar").remove();
                    $("#selects__superiores").show();
    
                    $("#selects__superiores__regresar__coors").remove();
                    $("#selects__superiores__subsess").remove();

                    if(parseInt(zonal__eu)>1 && parseInt(zonal__eu)<10){
                        $(".direccion__seguimientos__ocultos").hide();
                        $(".ocultosZonalesCoordinadorRecomendar").show();
                    }
    
    
                }else if (zonal__eu==1 || zonal__eu=="1") {
    
                    $("#selects__superiores__regresar").show();
                    $("#selects__superiores").show();
    
                    $("#selects__superiores__regresar__coors").remove();
                    $("#selects__superiores__subsess").remove();
    
                }else{
    
                    $("#selects__superiores__regresar").remove();
                    $("#selects__superiores__regresar__coors").show();
    
                    $("#selects__superiores").remove();
                    $("#selects__superiores__subsess").show();
    
                }
    
                for (w of envio__tecnicos) {
    
                    $(".funcionario__recomendaste").text(w.nombreCompleto);
                    $(".fecha__recomendaste").text(w.fecha);
    
                }
    
                for (z of documentos__tecnicos__2) {
  
                    if (data[12]=="FORMATIVO") {
                        $("#informe__recomendados").attr('href',$("#filesFrontend").val()+'seguimiento/informe__formativos/'+z.archivo);
                    }else{
                        $("#informe__recomendados").attr('href',$("#filesFrontend").val()+'seguimiento/informe__recreativos/'+z.archivo);
                    }
    
                    
    
                    $(".observaciones__recomendaste").text(z.observacion);
                    $("#nombreDocumento").val(z.archivo);
                    $(".recomendaciones__recomendaste").text(z.recomendacion);
    
                }
    
                if ($("#idRolAd").val()==7) {
    
                  //  $(".oculto__subsess__deseados").attr('style','visibility: hidden!important;');
                    $(".oculto__subsess__deseados").show();
              
    
                }
    
                $("#periodo").val(data[6]);
    
            });	
    
            },
            error:function(){
    
            }
                    
        });	  	
    
      });
  
}
  
  /*=====  End of Recomendar formativos  ======*/

  /*=============================================
=            realizar seguimientos admin seguimientos           =
=============================================*/

  var funcion__control__de__cambios2023=function(tbody,table){

	$(tbody).on("click","button.guardar__informacion__conjuntos__radios",function(e){
  console.log("dentro de control cambios");
		e.preventDefault();
	
		let data=table.row($(this).parents("tr")).data();
  
		let radiosValues=$('input:radio[name=radio__select__'+data[5]+']:checked').val();
		let variableBandera = 0; 
	
		console.log("DATAS")
		console.log(data)
		console.log("RDIO")
		console.log(radiosValues)
	
		if (radiosValues==undefined || radiosValues==null || radiosValues=="" || radiosValues==" ") {
  
			alertify.set("notifier","position", "top-center");
		  alertify.notify("Obligatorio escoger una opción", "error", 5, function(){});
		  
  
		}else{	
		
		var confirm= alertify.prompt('Ingresar motivo en caso de requerirlo','',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});
  
		  confirm.set({transition:'slide'});    
  
		  confirm.set('onok', function(evt, value){ //callbak al pulsar botón positivo
  
			var paqueteDeDatos2 = new FormData();
  
		  paqueteDeDatos2.append('tipo','seguimiento__control__cambios');
		  paqueteDeDatos2.append("idSeguimientoCmabios",data[6]);
		  paqueteDeDatos2.append("radiosValues",radiosValues);
		  paqueteDeDatos2.append('motivo',value);
          paqueteDeDatos2.append('correo',data[7]);

		
			
		alert("Se ha enviado una notificación")
		
		  $.ajax({
          
			  type:"POST",
			  url:"modelosBd/POA_SEGUIMIENTO_REVISOR/inserta.md.php",
			  contentType: false,
			  data:paqueteDeDatos2,
			  processData: false,
			  cache: false, 
			  success:function(response){
  
				  let elementos=JSON.parse(response);
  
				  let mensaje=elementos['mensaje'];
  
				  if(mensaje==1){
  
					  alertify.set("notifier","position", "top-center");
					  alertify.notify("Acción realizada correctamente", "success", 5, function(){});
  
						  window.setTimeout(function(){ 
  
						 location.reload();
  
					  } ,3000); 
  
  
				  }
  
			  },
			  error:function(){
  
			  }
							  
		  });	  		
  
		  });
  
		  confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
			  alertify.set("notifier","position", "top-center");
			  alertify.notify("Acción cancelada", "error", 1, function(){
			  }); 
		  }); 
  
		}
  
  
	});
  
  }

  

/*=====  End of Funcion realizar seguimientos admin seguimientos  ======*/