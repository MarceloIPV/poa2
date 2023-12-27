/*=========================================
=            Creando segmentos            =
=========================================*/

var contadorGeneral=0;

var generador=0;

var informacionGlobal="";


var segmentosJs=function(parametro1,parametro2,parametro3,parametro4,parametro5,parametro6,tablaVerOcultar){


    $(parametro1).click(function(e){

        $(tablaVerOcultar).hide();

        e.preventDefault();

        contadorGeneral++;

      
        var contenedor="<form id='formAgregado"+contadorGeneral+"' class='row d d-flex col col-12 flex-wrap conjunto__validas justify-content-center formAgregado"+contadorGeneral+"'>";
        

       
        for (var i =0; i < parametro3.length; i++) {

            generador++;

            if (parametro3[i]=="input") {

                contenedor+="<div class='col col-"+parametro5+" row fila__agregado"+contadorGeneral+"'><input id='agregado"+generador+"' name='agregado"+generador+"' placeholder='"+parametro4[i]+"' class='col col-10 ancho__total__input mt-2 obligatorios__campos"+contadorGeneral+"' /></div>";

            }

        }

        contenedor+="<div class='col col-2 row botones__acciones"+contadorGeneral+" d d-flex justify-content-center'></div>";

        contenedor+="</form>";


        $(parametro2).append(contenedor);


        $(".botones__acciones"+contadorGeneral).append("<a class='btn btn-primary col col-4 mt-2 left__margen boton__enlacesOcultos' id='guardarGeneral"+contadorGeneral+"' name='guardarGeneral"+contadorGeneral+"' idContador='"+contadorGeneral+"' style='height:35px;'><i class='fas fa-save'></i></a>&nbsp;&nbsp;");
        

        $(".botones__acciones"+contadorGeneral).append("<a class='btn btn-danger col col-4 mt-2 eliminar"+contadorGeneral+"' id='eliminar"+contadorGeneral+"' name='eliminar"+contadorGeneral+"' idContador='"+contadorGeneral+"' style='height:35px;'><i class='fas fa-trash'></i></a><div class='col col-4 mt-2 reloadG__"+contadorGeneral+" reload__Enviosrealizados'></div>");

        /*==================================
        =            Eliminando            =
        ==================================*/
        switch (parametro6) {

            case "tipoInfraestructura":
        
                guardarElementos($("#guardarGeneral"+contadorGeneral),$("#formAgregado"+contadorGeneral),$(".reloadG__"+contadorGeneral),"tipoInfraestructuraInserta",contadorGeneral);

            break;
            case "tipoEstadoPropiedad":
        
                guardarElementos($("#guardarGeneral"+contadorGeneral),$("#formAgregado"+contadorGeneral),$(".reloadG__"+contadorGeneral),"tipoEstadoPropiedadInserta",contadorGeneral);

            break;
        
        }
        
        eliminarElementosCrea($(".eliminar"+contadorGeneral),$(".formAgregado"+contadorGeneral));

        /*=====  End of Eliminando  ======*/


    });

}

var guardarElementos=function(parametro1,parametro2,parametro3,parametro4,parametro5,parametro6,parametro7){

    $(parametro1).click(function(e){
    
        $(parametro1).hide();
    
        $(parametro3).html('<img src="images/reloadGit.webp" style="width:100%; height:30px; border-radius:1em;">');
    
        $(".reload__Enviosrealizados").html('<img src="images/reloadGit.webp" style="width:50%; height:30px; border-radius:1em;">');
    
      
    
        var validador= validacionRegistro($(".obligatorios__campos"+parametro5));
        validacionRegistroMostrarErrores($(".obligatorios__campos"+parametro5));
    
        
    
        var validadorInicial= validacionRegistro($("#agregado"+parametro5));
    
        var validadorInicialRubros= validacionRegistro($("#agregado"+(parametro5 + 1)));
        validacionRegistroMostrarErrores($("#agregado"+(parametro5 + 1)));
        var validadorInicialRubros2= validacionRegistro($("#agregado"+(parametro5 + 2)));
        validacionRegistroMostrarErrores($("#agregado"+(parametro5 + 2)));
    

    
        if (validadorInicial==false) {
    
    
            alertify.set("notifier","position", "top-center");
            alertify.notify("Campos obligatorios", "error", 5, function(){});
    
            $(parametro1).show();
    
            $(parametro3).html(' ');
    
        }else if(parametro4=="rubrosPaid"  && (validadorInicialRubros==false || validadorInicialRubros2==false)){
    
    
            alertify.set("notifier","position", "top-center");
            alertify.notify("Obligatorios los registros", "error", 5, function(){});
    
            $(parametro1).show();
    
            $(parametro3).html(' ');
    
    
        }else if (validador==false) {
    
            alertify.set("notifier","position", "top-center");
            alertify.notify("Campos obligatorios", "error", 5, function(){});
    
            $(parametro1).show();
    
            $(parametro3).html(' ');
    
        }else{
    
            var confirm= alertify.confirm('¿La información ingesada es la correcta?','¿La información ingesada es la correcta?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   
    
            confirm.set({transition:'slide'});    
    
            confirm.set('onok', function(){ //callbak al pulsar botón positivo
                  
    
                var paqueteDeDatos = new FormData();
    
                paqueteDeDatos.append('tipo',parametro4);		
    
                var other_data = $(parametro2).serializeArray();
    
                var array = new Array(); 
    
                $.each(other_data,function(key,input){
                    paqueteDeDatos.append(input.name,input.value);
                    array.push(input.value);
                });
    
                var idAtributoEscondido=$(".idAtributoEscondido").val();
    
                var emailPrincipal=$("#emailPrincipal").val();
                var nombrePrincipalU=$("#nombrePrincipalU").val();
                var idOrganismoPrincipal=$("#idOrganismoPrincipal").val();
                var fechaPrincipalJ=$("#fechaPrincipalJ").val();
                var idUsuarioPrincipal=$("#idUsuarioPrincipal").val();
    
                var agregado=$("#agregado"+parametro5).val();
    
                var elemento__escondidoI=$(".elemento__escondidoI").val();
    
                paqueteDeDatos.append("idAtributoEscondido",idAtributoEscondido);
    
                paqueteDeDatos.append("idUsuarioPrincipal",idUsuarioPrincipal);
                paqueteDeDatos.append("emailPrincipal",emailPrincipal);
                paqueteDeDatos.append("nombrePrincipalU",nombrePrincipalU);
                paqueteDeDatos.append("idOrganismoPrincipal",idOrganismoPrincipal);
                paqueteDeDatos.append("fechaPrincipalJ",fechaPrincipalJ);
                paqueteDeDatos.append("agregado",agregado);
                paqueteDeDatos.append("elemento__escondidoI",elemento__escondidoI);
    
                paqueteDeDatos.append("identificador",parametro7);
    
                let idUsados__items=$("#idUsados__items").val();
    
                paqueteDeDatos.append("idUsados__items",idUsados__items);
    
                paqueteDeDatos.append('arrayInformacion', JSON.stringify(array));
    
                $.ajax({
    
                    type:"POST",
                    url:"modelosBd/PAID_ADMINISTRADOR/inserta.md.php",
                    contentType: false,
                    data:paqueteDeDatos,
                    processData: false,
                    cache: false, 
                    success:function(response){
    
                        var elementos=JSON.parse(response);
    
                        var mensaje=elementos['mensaje'];
    
                        if(mensaje==1){
    
                            alertify.set("notifier","position", "top-center");
                            alertify.notify("Registro realizado correctamente", "success", 4, function(){});
    
                            $("#formAgregado"+parametro5).remove();
    
                        }
    
                    },
                    error:function(){
    
                    }
                    
                });	
    
            });
    
            confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
                alertify.set("notifier","position", "top-center");
                alertify.notify("Acción cancelada", "error", 1, function(){
    
                    $(".boton__enlacesOcultos").show();
                    $('.reload__Enviosrealizados').html(' ');
    
                }); 
            }); 
    
        }
    
    });
            
    
}

var eliminarElementosCrea=function(parametro1,parametro2,parametro3){

$(parametro1).click(function(e){

    $(parametro2).remove();

});
        

}

var ocultarVariables=function(parametro1,parametro2,parametro3){

	$(parametro1).click(function(e){

		$(parametro2).hide();
		$(parametro3).show();

		$(parametro3).modal('hide');

	});

}



var recargarTablaOnBtn = function(btn,datatable){

    $(btn).click(function(e){

        datatable.DataTable().ajax.reload();

	});
   
} 




var funcion__habilitar__memo__datable=function(tbody,table){

    $(tbody).on("click","button.asignar__boton__paid",function(e){
  
      e.preventDefault();
  
      let valorComparativo=$("#valorComparativo").val();

    
        if (valorComparativo=='2'){
        $(".divIngresoIndormacionMemoInfra").show();
      }
  
    });
  
  }

  var tipo__ubicaciones2023=function(parametro1,indicador){

        $.ajax({

        data: {indicador:indicador},
        dataType: 'html',
        type:'POST',
        url:'modelosBd/validaciones/selector.modelo.php'

        }).done(function(listar__lugar){

        $(parametro1).html(listar__lugar);

        }).fail(function(){

        

        });

    }

    let idContador__filares=0;

    var agregar__beneficiarios__paid__infraestructura=function(parametro1,parametro2){

        $(parametro1).click(function(e){

            $.getScript("layout/scripts/js/validacionBasica.js",function(){
            
                idContador__filares++;

                $("#beneficiariosDirectos").val(idContador__filares);

                $(parametro2).append('<tr class="fila__indicadores'+idContador__filares+'"> <td><input type="text" id="desdeEdad'+idContador__filares+'" name="desdeEdad'+idContador__filares+'" class="ancho__total__input metaProgramada__conjunto solo__numero cambio__de__numero__f" value="0"/></td> <td><input type="text" id="hastaEdad'+idContador__filares+'" name="hastaEdad'+idContador__filares+'" class="ancho__total__input metaResultado__conjunto solo__numero cambio__de__numero__f" value="0"/></td> <td><input type="text" id="masculino'+idContador__filares+'" name="masculino'+idContador__filares+'" idContador="'+idContador__filares+'" class="ancho__total__input masculinoValor solo__numero cambio__de__numero__f" value="0"/></td> <td><input type="text" id="femenino'+idContador__filares+'" name="femenino'+idContador__filares+'" class="ancho__total__input  solo__numero femeninoValor cambio__de__numero__f" idContador="'+idContador__filares+'" value="0"/></td>    <td><input type="text" id="mestizo'+idContador__filares+'" idContador="'+idContador__filares+'" name="mestizo'+idContador__filares+'" class="ancho__total__input sumaEtnias'+idContador__filares+'  metaResultado__conjunto solo__numero cambio__de__numero__f" value="0"/></td> <td><input type="text" id="montubio'+idContador__filares+'" idContador="'+idContador__filares+'" name="montubio'+idContador__filares+'" class="ancho__total__input sumaEtnias'+idContador__filares+' metaResultado__conjunto solo__numero cambio__de__numero__f" value="0"/></td> <td><input type="text" id="indigena'+idContador__filares+'" name="indigena'+idContador__filares+'" idContador="'+idContador__filares+'" class="ancho__total__input  metaResultado__conjunto sumaEtnias'+idContador__filares+' solo__numero cambio__de__numero__f" value="0"/></td> <td><input type="text" id="blanco'+idContador__filares+'" idContador="'+idContador__filares+'" name="blanco'+idContador__filares+'" class="ancho__total__input  metaResultado__conjunto sumaEtnias'+idContador__filares+' solo__numero cambio__de__numero__f" value="0"/></td> <td><input type="text" id="afro'+idContador__filares+'" idContador="'+idContador__filares+'" name="afro'+idContador__filares+'" class="ancho__total__input sumaEtnias'+idContador__filares+'   metaResultado__conjunto solo__numero cambio__de__numero__f" value="0" idContador="'+idContador__filares+'"/></td>  <td><input type="text" id="total'+idContador__filares+'" name="total'+idContador__filares+'" class="ancho__total__input procentajesNan__conjunto solo__numero cambio__de__numero__f" value="0" readonly/><a class="btn btn-danger" id="eliminarIndicadores'+idContador__filares+'" idContador="'+idContador__filares+'"><i class="fa fa-trash" aria-hidden="true"></i></a></td>   <td hidden><input type="hidden" id="totalOculto'+idContador__filares+'" idContador="'+idContador__filares+'" name="totalOculto'+idContador__filares+'" class="ancho__total__input   metaResultado__conjunto solo__numero cambio__de__numero__f" value="0" idContador="'+idContador__filares+'"/></td> <tr>');

                if((idContador__filares-1) == 0){

                }else{
                    let idContaAnte = idContador__filares-1
                    $("#eliminarIndicadores"+idContaAnte).hide();
                }


                $(".femeninoValor").on('input', function () {

                    let idContador=$(this).attr('idContador');

                    var suma1 = parseInt($("#masculino"+idContador).val()) + parseInt($("#femenino"+idContador).val())
                   
                    $("#total"+idContador).val(suma1);

                });

                $(".masculinoValor").on('input', function () {

                    let idContador=$(this).attr('idContador');

                    var suma = parseInt($("#masculino"+idContador).val()) + parseInt($("#femenino"+idContador).val())

                    $("#total"+idContador).val(suma);

                });


                $(".sumaEtnias"+idContador__filares).on('input', function () {

                    let idContador=$(this).attr('idContador');

                    var sum = 0;
                    $(".sumaEtnias"+idContador).each(function () {
                      sum += parseFloat($(this).val());
                      
                    });

                    $("#totalOculto"+idContador).val(sum);

                });

               

                $("#eliminarIndicadores"+idContador__filares).click(function(e){

                    let idContador=$(this).attr('idContador');

                    $(".fila__indicadores"+idContador).remove();

                    idContador__filares--;
                    $("#eliminarIndicadores"+idContador__filares).show();

                    $("#beneficiariosDirectos").val(idContador__filares);
                });

            });

        });

    }

    let idContador__adaptado=0;

    var agregar__beneficiariosAdaptado__paid__infraestructura=function(parametro1,parametro2){

        $(parametro1).click(function(e){

            $.getScript("layout/scripts/js/validacionBasica.js",function(){
            
                idContador__adaptado++;

                $("#beneficiariosAdaptado").val(idContador__adaptado);

                $(parametro2).append('<tr class="fila__indicadores'+idContador__adaptado+'">  <td><input type="text" id="desdeEdadAdaptado'+idContador__adaptado+'" name="desdeEdadAdaptado'+idContador__adaptado+'" class="ancho__total__input metaProgramada__conjunto solo__numero cambio__de__numero__f" value="0"/></td>         <td><input type="text" id="hastaEdadAdaptado'+idContador__adaptado+'" name="hastaEdadAdaptado'+idContador__adaptado+'" class="ancho__total__input metaResultado__conjunto solo__numero cambio__de__numero__f" value="0"/></td>    <td><input type="text" id="masculinoAdaptado'+idContador__adaptado+'" name="masculinoAdaptado'+idContador__adaptado+'" idContador="'+idContador__adaptado+'" class="ancho__total__input masculinoValorAdaptado solo__numero cambio__de__numero__f" value="0"/></td>    <td><input type="text" id="femeninoAdaptado'+idContador__adaptado+'" name="femeninoAdaptado'+idContador__adaptado+'" class="ancho__total__input femeninoValorAdaptado solo__numero cambio__de__numero__f" idContador="'+idContador__adaptado+'" value="0"/></td>   <td><input type="text" id="mestizoAdaptado'+idContador__adaptado+'" idContador="'+idContador__adaptado+'" name="mestizoAdaptado'+idContador__adaptado+'" class="ancho__total__input  sumaEtniasAdaptado'+idContador__adaptado+' metaResultado__conjunto solo__numero cambio__de__numero__f" value="0"/></td>    <td><input type="text" id="montubioAdaptado'+idContador__adaptado+'" idContador="'+idContador__adaptado+'" name="montubioAdaptado'+idContador__adaptado+'" class="ancho__total__input  sumaEtniasAdaptado'+idContador__adaptado+' metaResultado__conjunto solo__numero cambio__de__numero__f" value="0"/></td>      <td><input type="text" id="indigenaAdaptado'+idContador__adaptado+'" name="indigenaAdaptado'+idContador__adaptado+'" idContador="'+idContador__adaptado+'" class="ancho__total__input metaResultado__conjunto  sumaEtniasAdaptado'+idContador__adaptado+' solo__numero cambio__de__numero__f" value="0"/></td>      <td><input type="text" id="blancoAdaptado'+idContador__adaptado+'" idContador="'+idContador__adaptado+'" name="blancoAdaptado'+idContador__adaptado+'" class="ancho__total__input  sumaEtniasAdaptado'+idContador__adaptado+' metaResultado__conjunto solo__numero cambio__de__numero__f" value="0"/></td>      <td><input type="text" id="afroAdaptado'+idContador__adaptado+'" idContador="'+idContador__adaptado+'" name="afroAdaptado'+idContador__adaptado+'" class="ancho__total__input  sumaEtniasAdaptado'+idContador__adaptado+' metaResultado__conjunto solo__numero cambio__de__numero__f" value="0"/></td>              <td><input idContador="'+idContador__adaptado+'" type="text" id="visual'+idContador__adaptado+'" name="visual'+idContador__adaptado+'" class="ancho__total__input metaProgramada__conjunto solo__numero visualValor cambio__de__numero__f" value="0"/></td> <td><input idContador="'+idContador__adaptado+'" type="text" id="auditiva'+idContador__adaptado+'" name="auditiva'+idContador__adaptado+'" class="ancho__total__input metaResultado__conjunto auditivaValor solo__numero cambio__de__numero__f" value="0"/></td> <td><input type="text" id="multisensorial'+idContador__adaptado+'" name="multisensorial'+idContador__adaptado+'" idContador="'+idContador__adaptado+'" class="ancho__total__input multisensorialValor solo__numero cambio__de__numero__f" value="0"/></td> <td><input type="text" id="intelectual'+idContador__adaptado+'" name="intelectual'+idContador__adaptado+'" class="ancho__total__input intelectualValor solo__numero cambio__de__numero__f" idContador="'+idContador__adaptado+'" value="0"/></td> <td><input idContador="'+idContador__adaptado+'" type="text" id="fisica'+idContador__adaptado+'" name="fisica'+idContador__adaptado+'" class="ancho__total__input metaResultado__conjunto fisicaValor solo__numero cambio__de__numero__f" value="0"/></td> <td><input idContador="'+idContador__adaptado+'" type="text" id="psiquica'+idContador__adaptado+'" name="psiquica'+idContador__adaptado+'" class="ancho__total__input psiquicaValor metaResultado__conjunto solo__numero cambio__de__numero__f" value="0"/></td>  <td><input  type="text" id="totalAdaptado'+idContador__adaptado+'" name="totalAdaptado'+idContador__adaptado+'" class="ancho__total__input procentajesNan__conjunto solo__numero cambio__de__numero__f" value="0" readonly/><a class="btn btn-danger" id="eliminarIndicadores'+idContador__adaptado+'" idContador="'+idContador__adaptado+'"><i class="fa fa-trash" aria-hidden="true"></i></a></td>       <td hidden><input type="hidden" id="totalOcultoAdaptado'+idContador__adaptado+'" totalOcultoAdaptado="'+idContador__adaptado+'" name="totalOculto'+idContador__adaptado+'" class="ancho__total__input   metaResultado__conjunto solo__numero cambio__de__numero__f" value="0" idContador="'+idContador__adaptado+'"/></td>   <td hidden><input type="hidden" id="totalAdaptadoOcultoDisca'+idContador__adaptado+'" idContador="'+idContador__adaptado+'" name="totalAdaptadoOcultoDisca'+idContador__adaptado+'" class="ancho__total__input   metaResultado__conjunto solo__numero cambio__de__numero__f" value="0" idContador="'+idContador__adaptado+'"/></td><tr>');

                if((idContador__adaptado-1) == 0){

                }else{
                    let idContaAnte = idContador__adaptado-1
                    $("#eliminarIndicadores"+idContaAnte).hide();
                }

                $(".femeninoValorAdaptado").on('input', function () {

                    let idContador=$(this).attr('idContador');

                    var suma1 = parseInt($("#masculinoAdaptado"+idContador).val()) + parseInt($("#femeninoAdaptado"+idContador).val())
                   
                    $("#totalAdaptado"+idContador).val(suma1);

                });

                $(".masculinoValorAdaptado").on('input', function () {

                    let idContador=$(this).attr('idContador');

                    var suma = parseInt($("#masculinoAdaptado"+idContador).val()) + parseInt($("#femeninoAdaptado"+idContador).val())

                    $("#totalAdaptado"+idContador).val(suma);

                });
               

                $(".sumaEtniasAdaptado"+idContador__adaptado).on('input', function () {

                    let idContador=$(this).attr('idContador');

                    var sum = 0;
                    $(".sumaEtniasAdaptado"+idContador).each(function () {
                      sum += parseFloat($(this).val());
                      
                    });

                    $("#totalOcultoAdaptado"+idContador).val(sum);

                });


                $(".visualValor").on('input', function () {

                    let idContador=$(this).attr('idContador');

                    var suma1 = parseInt($("#visual"+idContador).val()) + parseInt($("#auditiva"+idContador).val()) + parseInt($("#multisensorial"+idContador).val()) + parseInt($("#intelectual"+idContador).val()) + parseInt($("#fisica"+idContador).val()) + parseInt($("#psiquica"+idContador).val())
                   
                    $("#totalAdaptadoOcultoDisca"+idContador).val(suma1);


                });

                $(".auditivaValor").on('input', function () {

                    let idContador=$(this).attr('idContador');

                    var suma = parseInt($("#visual"+idContador).val()) + parseInt($("#auditiva"+idContador).val()) + parseInt($("#multisensorial"+idContador).val()) + parseInt($("#intelectual"+idContador).val()) + parseInt($("#fisica"+idContador).val()) + parseInt($("#psiquica"+idContador).val())

                    $("#totalAdaptadoOcultoDisca"+idContador).val(suma);

                });

                $(".multisensorialValor").on('input', function () {

                    let idContador=$(this).attr('idContador');

                    var suma1 = parseInt($("#visual"+idContador).val()) + parseInt($("#auditiva"+idContador).val()) + parseInt($("#multisensorial"+idContador).val()) + parseInt($("#intelectual"+idContador).val()) + parseInt($("#fisica"+idContador).val()) + parseInt($("#psiquica"+idContador).val())
                   
                    $("#totalAdaptadoOcultoDisca"+idContador).val(suma1);


                });

                $(".intelectualValor").on('input', function () {

                    let idContador=$(this).attr('idContador');

                    var suma = parseInt($("#visual"+idContador).val()) + parseInt($("#auditiva"+idContador).val()) + parseInt($("#multisensorial"+idContador).val()) + parseInt($("#intelectual"+idContador).val()) + parseInt($("#fisica"+idContador).val()) + parseInt($("#psiquica"+idContador).val())

                    $("#totalAdaptadoOcultoDisca"+idContador).val(suma);

                });

                $(".fisicaValor").on('input', function () {

                    let idContador=$(this).attr('idContador');

                    var suma1 = parseInt($("#visual"+idContador).val()) + parseInt($("#auditiva"+idContador).val()) + parseInt($("#multisensorial"+idContador).val()) + parseInt($("#intelectual"+idContador).val()) + parseInt($("#fisica"+idContador).val()) + parseInt($("#psiquica"+idContador).val())
                   
                    $("#totalAdaptadoOcultoDisca"+idContador).val(suma1);


                });

                $(".psiquicaValor").on('input', function () {

                    let idContador=$(this).attr('idContador');

                    var suma = parseInt($("#visual"+idContador).val()) + parseInt($("#auditiva"+idContador).val()) + parseInt($("#multisensorial"+idContador).val()) + parseInt($("#intelectual"+idContador).val()) + parseInt($("#fisica"+idContador).val()) + parseInt($("#psiquica"+idContador).val())

                    $("#totalAdaptadoOcultoDisca"+idContador).val(suma);

                });

               

                $("#eliminarIndicadores"+idContador__adaptado).click(function(e){

                    let idContador=$(this).attr('idContador');

                    $(".fila__indicadores"+idContador).remove();

                    idContador__adaptado--;
                    $("#eliminarIndicadores"+idContador__adaptado).show();
                    $("#beneficiariosAdaptado").val(idContador__adaptado);
                });

            });

        });

    }

    let idContador__indirectos=0;
    var agregar__beneficiariosIndirectos__paid__infraestructura=function(parametro1,parametro2){

        $(parametro1).click(function(e){

            $.getScript("layout/scripts/js/validacionBasica.js",function(){
            
                idContador__indirectos++;

                $("#beneficiariosIndirectos").val(idContador__indirectos);

                $(parametro2).append('<tr class="fila__indicadores'+idContador__indirectos+'"><td><textarea  id="beneficiariosIndirectos__'+idContador__indirectos+'" idContador="'+idContador__indirectos+'" name="beneficiariosIndirectos__'+idContador__indirectos+'" class="ancho__total__input"></textarea></td>   <td><input idContador="'+idContador__indirectos+'" type="text" id="totalIndirectos'+idContador__indirectos+'" name="totalIndirectos'+idContador__indirectos+'" class="ancho__total__input psiquicaValor metaResultado__conjunto solo__numero cambio__de__numero__f" value="0"/></td>  <td><textarea  id="justificacionCuantitativa'+idContador__indirectos+'" idContador="'+idContador__indirectos+'" name="justificacionCuantitativa'+idContador__indirectos+'" class="ancho__total__input"></textarea><a class="btn btn-danger" id="eliminarIndicadores'+idContador__indirectos+'" idContador="'+idContador__indirectos+'"><i class="fa fa-trash" aria-hidden="true"></i></a></td><tr>');

                if((idContador__indirectos-1) == 0){

                }else{
                    let idContaAnte = idContador__indirectos-1
                    $("#eliminarIndicadores"+idContaAnte).hide();
                }


                $("#eliminarIndicadores"+idContador__indirectos).click(function(e){

                    let idContador=$(this).attr('idContador');

                    $(".fila__indicadores"+idContador).remove();

                    idContador__indirectos--;
                    $("#eliminarIndicadores"+idContador__indirectos).show();
                    $("#beneficiariosIndirectos").val(idContador__indirectos);
                });

            });

        });

    }

    var comprobar__checkbox__adaptado=function(btnCheck,divOcultar){

        $(btnCheck).change(function() {
            if (this.checked) {
                $(divOcultar).show()
                $(btnCheck).val("check")
            } else {
                $(divOcultar).hide()
                $(btnCheck).val("uncheck")
            }
          });

    }


    var validacionCamposObligatoriosFormulario=function(formularioClase){

    
            const forms = document.querySelectorAll(formularioClase)
            Array.from(forms)
              .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                  if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                    alertify.set("notifier","position", "top-center");
			        alertify.notify("Elementos obligatorios", "error", 5, function(){});
                  }
            
                  form.classList.add('was-validated')
                }, false)
              })
           
            
    }

    var controlArchivosInfra = function(inputArchivo){
  
 
        $(inputArchivo).change(function(e){
          
            
      
            if (e.target.files[0].size > 2097152) // 2 MiB for bytes.
            {
              alertify.set("notifier","position", "top-center");
              alertify.notify("Archivo no puede superar los 2MB!", "error", 5, function(){});
              $(inputArchivo).val("")
              return;
            }

            })
        
       
        
      
        
      };

    var validadorSoloNumeros = function(input){
        $(input).on('input', function() {

            var input = $(this);
            input.val(input.val().replace(/[^0-9]/g, ''));
            
          });
    }


    var AsignarPaisInfraestructura = function (boton,idSelector,tipo) {  
        $(boton).on("click", function() {      
            
            $(idSelector+" option").remove();
            
            let paqueteDeDatos = new FormData();
            paqueteDeDatos.append("tipo", tipo);
            
            $.ajax({
        
                type:"POST",
                url:"modelosBd/PAID_INFRAESTRUCTURA/selector.md.php",
                contentType: false,
                data:paqueteDeDatos,
                processData: false,
                cache: false, 
                success:function(response){
        
                    let elementos=JSON.parse(response);
        
                    let informacion=elementos['informacion'];

                    var opcion = document.createElement("option");
                        
                        opcion.text = "---Selecione Opción---";
                        $(idSelector).append(opcion); 
                    
                    
        
                    for (z of informacion) {
        
                        opcion = document.createElement("option");
                        opcion.value = z.nombre;
                        opcion.text = z.nombre;
                        opcion.setAttribute('identificador', z.id);
                        $(idSelector).append(opcion); 
                    
                    
                    }
        
                
        
                },
                error:function(){
        
                }
                        
            });	 
          
    
            
        });
    }



    var AsignarCantonProvinciaPaidInfra = function (idSelectoPadre,idSelectorHijo,tipo) {  
        $(idSelectoPadre).on("change", function() {      
            
            let id=$(idSelectoPadre).find("option:selected").attr('identificador');

            $(idSelectorHijo+" option").remove();
            
            let paqueteDeDatos = new FormData();
            paqueteDeDatos.append("tipo", tipo);
            paqueteDeDatos.append("id", id);  

            $.ajax({
        
                type:"POST",
                url:"modelosBd/PAID_INFRAESTRUCTURA/selector.md.php",
                contentType: false,
                data:paqueteDeDatos,
                processData: false,
                cache: false, 
                success:function(response){
        
                    let elementos=JSON.parse(response);
        
                    let informacion=elementos['informacion'];

                    var opcion = document.createElement("option");
                    opcion.value = "0";
                    opcion.text = "----Seleccione Opción----";
                    $(idSelectorHijo).append(opcion); 
                    
                    if(id == 25 || id == 99999){
                        opcion = document.createElement("option");
                        opcion.value = 'internacional';
                        opcion.text = 'Internacional';
                        opcion.setAttribute('identificador', 99999);
                        $(idSelectorHijo).append(opcion); 
                    }

                    for (z of informacion) {
        
                         opcion = document.createElement("option");
                        opcion.value = z.nombre;
                        opcion.text = z.nombre;
                        opcion.setAttribute('identificador', z.id);
                        $(idSelectorHijo).append(opcion); 
                    
                    
                    }
        
                
        
                },
                error:function(){
        
                }
                        
            });	 
          
    
            
        });
    }
