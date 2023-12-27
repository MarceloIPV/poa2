$(document).ready(function () {

    /*==================================================
    =            Remanentes activar botones            =
    ==================================================*/
    
    let ocultarBoton__remanentes=function(parametro1,parametro2){

        $("#"+parametro1).click(function (e){

            if($('#'+parametro2).is(":visible")){
                $("#"+parametro1).find("i").remove();
                $("#"+parametro1).append('<i class="fas fa-plus enlaces__blancos enlace__mas"></i>');
            }else{
                $("#"+parametro1).find("i").remove();
                $("#"+parametro1).append('<i class="fas fa-minus enlaces__blancos enlace__menos"></i>');
            }

            $('#'+parametro2).toggle();

        });


    }


    ocultarBoton__remanentes("mas","monto");
    ocultarBoton__remanentes("mas2","cuentas");
    ocultarBoton__remanentes("mas3","añosAnteriores");
    ocultarBoton__remanentes("mas2Paid","cuentasPaid");
    ocultarBoton__remanentes("mas3PaidResumen","cuentasResumen");
    ocultarBoton__remanentes("mas3PaidFuturas","cuentasFuturas");
    
    
    /*=====  End of Remanentes activar botones  ======*/
    
    /*==================================================
    =           Resumen Remanentes DataTable           =
    ==================================================*/

    $.getScript("layout/scripts/js/ajax/datatablet.js",function(){

        datatablets($("#tablaResumenRemanente"),"tablaResumenRemanente",[$("#idOrganismoPrincipal").val()],objetos([11],["enlace"],['documento'],["documentos/remanentes/organismoRemanentes/"],["documento"]),1,false,false,false,false);

        datatablets($("#tablaResumenRemanente__2"),"tablaResumenRemanente__2",[$("#idOrganismoPrincipal").val()],objetos([11,12],["enlace","enlace"],['documento','documento2'],["documentos/remanentes/organismoRemanentes/","documentos/remanentes/estadosRemanentes/"],["documento","documento2"]),1,false,false,false,false);

        var cambiarDatatablets=function(parametro1,parametro2,parametro3,parametro4){

        $(parametro1).change(function (e){

            datatablets($("#tablaResumenRemanente"),"tablaResumenRemanente",[$("#idOrganismoPrincipal").val()],false,false,false,false,false,false);

        });

        }

        cambiarDatatablets($("#aniosResumen"),$("#tablaResumenRemanente"),"tablaResumenRemanente",$("#idOrganismoPrincipal").val());

    });

    /*=====  End of Resumen Remanentes DataTable  ======*/

    function validacionRegistro__numeros(parametro1){

        var sumadorErrores=0;

        $(parametro1).each(function(index) {

            if(parseFloat($(this).val())<=0){
                sumadorErrores++;
            }

        });

        if (sumadorErrores==0) {
            return true;
        }else{
            return false;
        }

    }

    var validacionRegistroMostrarErrores__numeros=function(parametro1){

        var sumadorErrores=0;

        $(parametro1).each(function(index) {

            if(parseFloat($(this).val())<=0){
                $(this).addClass('error');
            }else{
                $(this).removeClass('error');
            }
          
        });

    }


    function concatenarValores(parametro1){
        
        var array = new Array(); 

        $(parametro1).each(function(index) {

            array.push($(this).val());

        });

        return array;

    }

    function concatenarValores__2(parametro1){
        
        var array = new Array(); 

        $(parametro1).each(function(index) {

            let valor=$(this).attr('idprogramacionfinanciera');

            array.push(valor);

        });

        return array;

    }

    /*==========================================
    =            habilitar ingresos            =
    ==========================================*/

    
    var habilitacion__remanentes=function(parametro1,parametro2){

        $(parametro1).click(function (e){

            $(parametro2).show();

        });

    }

    habilitacion__remanentes($("#generadorPdfRemanentes"),$("#guardarInformacion__remanentes"));
    
    /*=====  End of habilitar ingresos  ======*/


    function validacionRegistro(parametro1){

        var sumadorErrores=0;

        $(parametro1).each(function(index) {

            if($(this).val()=="" || $(this).val()=="0" || $(this).val()==0){
                sumadorErrores++;
            }

        });

        if (sumadorErrores==0) {
            return true;
        }else{
            return false;
        }

    }

    var validacionRegistroMostrarErrores=function(parametro1){

        var sumadorErrores=0;

        $(parametro1).each(function(index) {

            if($(this).val()=="" || $(this).val()=="0" || $(this).val()==0){
                $(this).addClass('error');
            }else{
                $(this).removeClass('error');
            }
          
        });

    }
        

    /*=======================================
    =            Insertar montos            =
    =======================================*/
    
    var insertar__remanentes__creados=function(parametro1){

    $(parametro1).click(function (e){

        let errores=validacionRegistro__numeros($(".numeros__mayor__cero"));

        let valorError=validacionRegistro($(".errores__obligados"));
        validacionRegistroMostrarErrores($(".errores__obligados"));

        if (valorError==false) {

            alertify.set("notifier","position", "top-center");
            alertify.notify("Todos los campos creados son oblitagorios, y en el caso de valores deben ser mayores a 0, verificar los campos sombreados con rojo", "error", 10, function(){});


        }else if (parseFloat($("#remanentes__resumen").val())!=parseFloat($("#remanentes__poa__resumen__2").val())) {

            alertify.set("notifier","position", "top-center");
            alertify.notify("El monto Remanente POA de verificación 1 debe ser igual al monto Remanente POA de verificación 2 referente a la sección resumen", "error", 10, function(){});

        }else if ($("#examinar__documen_to").val()=="" || $("#examinar__documen_to").val()==" ") {

            alertify.set("notifier","position", "top-center");
            alertify.notify("Es obligatorio el documento", "error", 5, function(){});

        }else{


            var confirm= alertify.confirm('¿Está seguro de guardar la información ingresada?','¿Está seguro de guardar la información ingresada?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

            confirm.set({transition:'slide'});    

            confirm.set('onok', function(){ //callbak al pulsar botón positivo

                var paqueteDeDatos = new FormData();

                paqueteDeDatos.append('tipo','insertar__remanentes__organismos__Deportivos');       

                var other_data = $('#formulario__remanentes').serializeArray();

                $.each(other_data,function(key,input){
                    paqueteDeDatos.append(input.name,input.value);
                });

                /*==========================================
                =            Documento generado            =
                ==========================================*/
                
                paqueteDeDatos.append('archivo', $("#examinar__documen_to")[0].files[0]);
                
                let anios__anteriores=$("#anios__anteriores").val();

                paqueteDeDatos.append('anios__anteriores',anios__anteriores);

                /*=====  End of Documento generado  ======*/
                

                /*===============================================
                =            Array cuentas por pagar            =
                ===============================================*/
                
                let montosCuentasPagar = concatenarValores($(".enlazados__cuentas__por__pagar"));

                let idProgramacionFinancieraCuentasPagar = concatenarValores__2($(".enlazados__cuentas__por__pagar"));

                paqueteDeDatos.append("montosCuentasPagar",JSON.stringify(montosCuentasPagar));
                paqueteDeDatos.append("idProgramacionFinancieraCuentasPagar",JSON.stringify(idProgramacionFinancieraCuentasPagar));
                
                /*=====  End of Array cuentas por pagar  ======*/
                
                /*==============================================
                =            Montos años anteriores            =
                ==============================================*/

                let aniosAniosAnteriores = concatenarValores($(".atados__anios__anteriores"));

                let montosAniosAnteriores = concatenarValores($(".atados__anios__anteriores__montos"));   

                paqueteDeDatos.append("aniosAniosAnteriores",JSON.stringify(aniosAniosAnteriores));
                paqueteDeDatos.append("montosAniosAnteriores",JSON.stringify(montosAniosAnteriores));        
                
                /*=====  End of Montos años anteriores  ======*/
                
                /*==============================
                =            Paind             =
                ==============================*/
                
                
                let aniosPaid = concatenarValores($(".atados__anios__paid"));

                let convenioPaid = concatenarValores($(".atados__convenio")); 

                let nombreProyectoPaid = concatenarValores($(".atados__nombreProyecto")); 

                let montoPaid = concatenarValores($(".sumar__clases__remanentes__anteriores__paid")); 
                
                paqueteDeDatos.append("aniosPaid",JSON.stringify(aniosPaid));
                paqueteDeDatos.append("convenioPaid",JSON.stringify(convenioPaid));   
                paqueteDeDatos.append("nombreProyectoPaid",JSON.stringify(nombreProyectoPaid));
                paqueteDeDatos.append("montoPaid",JSON.stringify(montoPaid));   

                /*=====  End of Paind   ======*/


                $.ajax({

                    type:"POST",
                    url:"modelosBd/inserta/insertaAcciones.md.php",
                    contentType: false,
                    data:paqueteDeDatos,
                    processData: false,
                    cache: false, 
                    success:function(response){

   
                        var elementos=JSON.parse(response);

                        var mensaje=elementos['mensaje'];

                        if(mensaje==1){

                            alertify.set("notifier","position", "top-center");
                            alertify.notify("Registro realizado correctamente", "success", 5, function(){});


                            window.setTimeout(function(){ 
                                window.location = "resumenRemanente";
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
            });             

        }

    });

    }
    insertar__remanentes__creados($("#guardarInformacion__remanentes"));    
    
    /*=====  End of Insertar montos  ======*/

    let sumasRemanentes=0;


    restasRemanentes=parseFloat($("#inp1").val())  - parseFloat($("#montoEje__remanentes").val())  - parseFloat($("#cuentasPagar__remanentes").val());

    $("#remanentePoa__remanentes").val(restasRemanentes.toFixed(2));
    $("#remanentes__resumen").val(restasRemanentes.toFixed(2));

    $("#remanentes__poa__resumen__futuro").val(restasRemanentes.toFixed(2));

    let totalFuturas=0;

    totalFuturas=parseFloat($("#remanentes__resumen").val())  +  parseFloat($("#anios__anteriores").val());

    $("#asignaciones__futuras").val(totalFuturas);   



    var input__asignados__remanentes__en__totales=function(parametro1){

        $(parametro1).on('input', function () {


            restasRemanentes=parseFloat($("#inp1").val())  - parseFloat($("#montoEje__remanentes").val())  - parseFloat($("#cuentasPagar__remanentes").val()) ;

            $("#remanentePoa__remanentes").val(restasRemanentes.toFixed(2));     
            $("#remanentes__resumen").val(restasRemanentes.toFixed(2));     

            $("#remanentes__poa__resumen__futuro").val(restasRemanentes.toFixed(2));   

             let totalFuturas=0;

            totalFuturas=parseFloat($("#remanentes__resumen").val())  +  parseFloat($("#anios__anteriores").val());

            $("#asignaciones__futuras").val(totalFuturas);   


        });

    }

    input__asignados__remanentes__en__totales($(".nuevos__enlazados__realizados"));

    var input__asignados__remanentes__en__totales__2=function(parametro1){

        restasRemanentes=parseFloat($("#inp1").val())  - parseFloat($("#montoEje__remanentes").val())  - parseFloat($("#cuentasPagar__remanentes").val()) ;;

        $("#remanentePoa__remanentes").val(restasRemanentes.toFixed(2));     
        $("#remanentes__resumen").val(restasRemanentes.toFixed(2));     

         $("#remanentes__poa__resumen__futuro").val(restasRemanentes.toFixed(2));   

             let totalFuturas=0;

            totalFuturas=parseFloat($("#remanentes__resumen").val())  +  parseFloat($("#anios__anteriores").val());

            $("#asignaciones__futuras").val(totalFuturas);             

    }


    /*========================================================
    =            Actividades escogidas organismos            =
    ========================================================*/
    
     var organismo__actividades__relacionados=function(parametro1){

        let indicador=1000;
        let idOrganismoPrincipal=$("#idOrganismoPrincipal").val();

        $.ajax({

          data: {indicador:indicador,idOrganismoPrincipal:idOrganismoPrincipal},
          dataType: 'html',
          type:'POST',
          url:'modelosBd/validaciones/selector.modelo.php'

        }).done(function(listar__lugar){

          $(parametro1).html(listar__lugar);

        }).fail(function(){

          

        });


    }   

    organismo__actividades__relacionados($("#actividades__seleccionadas"));
    
    /*=====  End of Actividades escogidas organismos  ======*/
    
    /*=========================================
    =            Selecciones items           =
    =========================================*/
    
 
    var items__seleccionas__remantentes=function(parametro1,parametro2){

        $(parametro2).change(function(){

            indicador=1001;

            let idOrganismoPrincipal=$("#idOrganismoPrincipal").val();

            let idActividad=$(this).val();

            $.ajax({

              data: {indicador:indicador,idActividad:idActividad, idOrganismoPrincipal:idOrganismoPrincipal},
              dataType: 'html',
              type:'POST',
              url:'modelosBd/validaciones/selector.modelo.php'

            }).done(function(listar__lugar){

              $(parametro1).html(" ");

              $(parametro1).html(listar__lugar);

            }).fail(function(){

              

            });


        });

    }

    items__seleccionas__remantentes($("#items__seleccionados"),$("#actividades__seleccionadas"));   
        
    /*=====  End of Selecciones items  ======*/



    var replicas__valor=function(parametro1,parametro2){

        $(parametro1).on('input', function () {

            $("#autogestion__resumen__2").val($(this).val());

             let totalRemanentesPoas=0;


            totalRemanentesPoas=parseFloat($("#cuenta__31__resumen__2").val())  - parseFloat($("#cuentas__por__pagar__resumen__2").val())  - parseFloat($("#autogestion__resumen__2").val()) - parseFloat($("#paid__resumen__2").val()) - parseFloat($("#remanentes__anios__anteriores__resumen__2").val());

            $("#remanentes__poa__resumen__2").val(totalRemanentesPoas.toFixed(2));           

        });

    }

    replicas__valor($("#monto__autogestion__cuentas"));


    var replicas__valor__2=function(parametro1,parametro2){

        $(parametro1).on('input', function () {

            $("#cuenta__31__resumen__2").val($(this).val());

            let totalRemanentesPoas=0;


            totalRemanentesPoas=parseFloat($("#cuenta__31__resumen__2").val())  - parseFloat($("#cuentas__por__pagar__resumen__2").val())  - parseFloat($("#autogestion__resumen__2").val()) - parseFloat($("#paid__resumen__2").val()) - parseFloat($("#remanentes__anios__anteriores__resumen__2").val());

            $("#remanentes__poa__resumen__2").val(totalRemanentesPoas.toFixed(2));

        });

    }

    replicas__valor__2($("#saldo__cuenta31"));


    var incrementar__items__anios__anteriores=function(parametro1){

        let contadorA=1;

        $(parametro1).click(function(){

            $.getScript("layout/scripts/js/validacionBasica.js",function(){

                contadorA++;

                $(".agregar__anios__anteriores").append('<tr class="fila__decorada'+contadorA+'"><td align="center"><select id="selecionados__anios__montos__0'+contadorA+'" name="selecionados__anios__montos[]" class="ancho__total__input__selects atados__anios__anteriores errores__obligados"><option value="0">--Seleccione un año--</option><option value="2000">2000</option><option value="2001">2001</option><option value="2002">2002</option><option value="2003">2003</option><option value="2004">2004</option><option value="2005">2005</option><option value="2006">2006</option><option value="2007">2007</option><option value="2008">2008</option><option value="2009">2009</option><option value="2010">2010</option><option value="2011">2011</option><option value="2012">2012</option><option value="2013">2013</option><option value="2014">2014</option><option value="2015">2015</option><option value="2016">2016</option><option value="2017">2017</option><option value="2018">2018</option><option value="2019">2019</option><option value="2020">2020</option><option value="2021">2021</option></select></td><td style="display: flex;" align="center">$&nbsp;&nbsp;<input type="text" class="solo__numero__montos ancho__total__input atados__anios__anteriores__montos cambio__de__numero__f sumar__clases__remanentes__anteriores errores__obligados" id="monto__soloNumerosMontos__'+contadorA+'" name="monto__soloNumerosMontos[]" value="0"/></td><td align="center"><button id="eliminantes__'+contadorA+'" name="eliminantes__'+contadorA+'" attr="'+contadorA+'" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>');


                let eliminantes__remanentes__nuevos=function(parametro1,parametro2){

                    $(parametro1).on('click', function () {

                        let attr=$(this).attr('attr');

                        let valorObtenidos=$("#monto__soloNumerosMontos__"+attr).val();

                         let restados=parseFloat($("#anios__anteriores").val()) - parseFloat(valorObtenidos);

                         $("#anios__anteriores").val(restados.toFixed(2));

                         $("#remanentes__anios__anteriores__resumen__2").val(restados);

                         $("#pendientes__descontar__anios__anteriores").val(restados.toFixed(2));

                         let totalFuturas=0;

                        totalFuturas=parseFloat($("#remanentes__resumen").val())  +  parseFloat($("#anios__anteriores").val());

                        $("#asignaciones__futuras").val(totalFuturas);   

                        let totalRemanentesPoas=0;

                        totalRemanentesPoas=parseFloat($("#cuenta__31__resumen__2").val())  - parseFloat($("#cuentas__por__pagar__resumen__2").val())  - parseFloat($("#autogestion__resumen__2").val()) - parseFloat($("#paid__resumen__2").val()) - parseFloat($("#remanentes__anios__anteriores__resumen__2").val());

                        $("#remanentes__poa__resumen__2").val(totalRemanentesPoas.toFixed(2));                       

                        $(".fila__decorada"+attr).remove();

                    });

                }

                eliminantes__remanentes__nuevos($("#eliminantes__"+contadorA));


                funcion__solo__numero__montos($(".solo__numero__montos"));
                funcion__cambio__de__numero($(".cambio__de__numero__f"));

                var sumarIndicadoresGlobal__principal=function(parametro1,parametro2){

                    $(parametro1).on('input', function () {

                         var sum = 0;

                         $(parametro1).each(function(){
                            sum += parseFloat($(this).val());
                        });

                        $(parametro2).val(sum.toFixed(2));

                        let totalRemanentesPoas=0;


                        totalRemanentesPoas=parseFloat($("#cuenta__31__resumen__2").val())  - parseFloat($("#cuentas__por__pagar__resumen__2").val())  - parseFloat($("#autogestion__resumen__2").val()) - parseFloat($("#paid__resumen__2").val()) - parseFloat($("#remanentes__anios__anteriores__resumen__2").val());

                        $("#remanentes__poa__resumen__2").val(totalRemanentesPoas.toFixed(2));

                         let totalFuturas=0;
                        totalFuturas=parseFloat($("#remanentes__resumen").val())  +  parseFloat($("#anios__anteriores").val());
                        $("#asignaciones__futuras").val(totalFuturas);   


                    });

                }

                sumarIndicadoresGlobal__principal($(".sumar__clases__remanentes__anteriores"),$("#anios__anteriores"));
                sumarIndicadoresGlobal__principal($(".sumar__clases__remanentes__anteriores"),$("#pendientes__descontar__anios__anteriores"));
                sumarIndicadoresGlobal__principal($(".sumar__clases__remanentes__anteriores"),$("#remanentes__anios__anteriores__resumen__2"));


            });


        });

    }

    incrementar__items__anios__anteriores($("#agregar__anios__anteriores__agregados"));       

    var incrementar__items=function(parametro1){

        let contadorA=0;

        $(parametro1).click(function(){

            $.getScript("layout/scripts/js/validacionBasica.js",function(){

                if ($("#actividades__seleccionadas").val()==0 || $("#items__seleccionados").val()==0) {

                    alertify.set("notifier","position", "top-center");
                    alertify.notify("Debe seleccionar actividad e ítem para agregar una nueva fila", "error", 10, function(){});

                }else{

                    contadorA++;

                    var nombreActividades = $('#items__seleccionados option:selected').attr('nombreActividades');
                    var itemPresupuestario = $('#items__seleccionados option:selected').attr('itemPresupuestario');
                    var item = $('#items__seleccionados').val();
                    var montoTotal = $('#items__seleccionados option:selected').attr('montoTotal');
                    var nombreItem = $('#items__seleccionados option:selected').attr('nombreItem');
                    var idProgramacionFinanciera = $('#items__seleccionados option:selected').attr('idProgramacionFinanciera');

                    $(".body__remanentes__pagar").append('<tr class="filas__attr__'+contadorA+'"><td align="center">'+nombreActividades+'<input type="hidden" name="nombreAct[]" value="'+nombreActividades+'"/></td><td align="center">'+itemPresupuestario+'<input type="hidden" name="itemPresupuestarios[]" value="'+itemPresupuestario+'"/></td><td>'+nombreItem+'<input type="hidden" name="nombreItems[]" value="'+nombreItem+'"/></td><td style="display:none!important;" align="center" class="montoTotal__v__'+montoTotal+'">'+montoTotal+'<input type="hidden" name="monto__totales[]" value="'+montoTotal+'"/></td><td><input type="text" id="monto'+contadorA+'" name="monto[]" class="enlazados__cuentas__por__pagar ancho__total__input solo__numero__montos cambio__de__numero__f sumar__clases__remanentes__por__pagar nuevos__enlazados__realizados" value="0" montoComparador="'+montoTotal+'" idProgramacionFinanciera="'+idProgramacionFinanciera+'"/></td><td><button class="btn btn-danger" id="eliminar__'+contadorA+'" attr="'+contadorA+'"><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>');

                    funcion__solo__numero__montos($(".solo__numero__montos")); 
                    funcion__cambio__de__numero($(".cambio__de__numero__f"));




                    var eliminantes__remanentes=function(parametro1,parametro2){

                        $(parametro1).on('click', function () {

                            let attr=$(this).attr('attr');

                            let valorObtenidos=$("#monto"+attr).val();

                            let restados=parseFloat($("#cuentasPagar__remanentes").val()) - parseFloat(valorObtenidos);

                            $(".filas__attr__"+attr).remove();

                            $("#cuentasPagar__remanentes").val(restados);

                            $("#cuentas__pagar__resumen").val(restados);

                            $("#cuentas__por__pagar__resumen__2").val(restados);

                            input__asignados__remanentes__en__totales__2($(".nuevos__enlazados__realizados"));

                             let totalRemanentesPoas=0;


                            totalRemanentesPoas=parseFloat($("#cuenta__31__resumen__2").val())  - parseFloat($("#cuentas__por__pagar__resumen__2").val())  - parseFloat($("#autogestion__resumen__2").val()) - parseFloat($("#paid__resumen__2").val()) - parseFloat($("#remanentes__anios__anteriores__resumen__2").val());

                            $("#remanentes__poa__resumen__2").val(totalRemanentesPoas.toFixed(2));                           


                        });

                    }

                    eliminantes__remanentes($("#eliminar__"+contadorA));



                    var monto__comparadores=function(parametro1){

                        $(parametro1).on('input', function () {

                            let montoComparador=$(this).attr('montoComparador');

                            let sum2 = 0;

                            $(parametro1).each(function(){
                                sum2 += parseFloat($(this).val());
                            });

                             $("#cuentasPagar__remanentes").val(sum2.toFixed(2));

                             restasRemanentes=parseFloat($("#inp1").val())  - parseFloat($("#montoEje__remanentes").val())  - parseFloat($("#cuentasPagar__remanentes").val()) ;

                            if (parseFloat(restasRemanentes)<0) {

                                alertify.set("notifier","position", "top-center");
                                alertify.notify("El monto de remanentes es negativo", "error", 10, function(){});

                                $(this).val(0);

                                let sum = 0;

                                $(parametro1).each(function(){
                                    sum += parseFloat($(this).val());
                                });

                                $("#cuentasPagar__remanentes").val(sum.toFixed(2));

                                $("#cuentas__pagar__resumen").val(sum.toFixed(2));

                                $("#cuentas__por__pagar__resumen__2").val(sum.toFixed(2));

                                 input__asignados__remanentes__en__totales($(".nuevos__enlazados__realizados"));

                                let totalRemanentesPoas=0;


                                totalRemanentesPoas=parseFloat($("#cuenta__31__resumen__2").val())  - parseFloat($("#cuentas__por__pagar__resumen__2").val())  - parseFloat($("#autogestion__resumen__2").val()) - parseFloat($("#paid__resumen__2").val()) - parseFloat($("#remanentes__anios__anteriores__resumen__2").val());

                                $("#remanentes__poa__resumen__2").val(totalRemanentesPoas.toFixed(2));

                            }else if (parseFloat($(this).val())>parseFloat(montoComparador) && 4>5) {

                                alertify.set("notifier","position", "top-center");
                                alertify.notify("El monto ingresado supera al monto total que es "+montoComparador, "error", 10, function(){});

                                $(this).val(0);

                                let sum = 0;

                                $(parametro1).each(function(){
                                    sum += parseFloat($(this).val());
                                });

                                $("#cuentasPagar__remanentes").val(sum.toFixed(2));

                                $("#cuentas__pagar__resumen").val(sum.toFixed(2));

                                $("#cuentas__por__pagar__resumen__2").val(sum.toFixed(2));

                                 input__asignados__remanentes__en__totales($(".nuevos__enlazados__realizados"));

                                let totalRemanentesPoas=0;


                                totalRemanentesPoas=parseFloat($("#cuenta__31__resumen__2").val())  - parseFloat($("#cuentas__por__pagar__resumen__2").val())  - parseFloat($("#autogestion__resumen__2").val()) - parseFloat($("#paid__resumen__2").val()) - parseFloat($("#remanentes__anios__anteriores__resumen__2").val());

                                $("#remanentes__poa__resumen__2").val(totalRemanentesPoas.toFixed(2));

                            }else{

                                 input__asignados__remanentes__en__totales($(".nuevos__enlazados__realizados"));

                            }

                        });

                    }

                    monto__comparadores($("#monto"+contadorA));

                    var sumarIndicadoresGlobal__principal=function(parametro1,parametro2){

                        $(parametro1).on('input', function () {

                            var sum = 0;

                            $(parametro1).each(function(){
                                sum += parseFloat($(this).val());
                            });

                            $(parametro2).val(sum.toFixed(2));

                            let totalRemanentesPoas=0;


                            totalRemanentesPoas=parseFloat($("#cuenta__31__resumen__2").val())  - parseFloat($("#cuentas__por__pagar__resumen__2").val())  - parseFloat($("#autogestion__resumen__2").val()) - parseFloat($("#paid__resumen__2").val()) - parseFloat($("#remanentes__anios__anteriores__resumen__2").val());

                            $("#remanentes__poa__resumen__2").val(totalRemanentesPoas.toFixed(2));

                        });

                    }

                    sumarIndicadoresGlobal__principal($(".sumar__clases__remanentes__por__pagar"),$("#cuentasPagar__remanentes"));
                    sumarIndicadoresGlobal__principal($(".sumar__clases__remanentes__por__pagar"),$("#cuentas__pagar__resumen"));
                    sumarIndicadoresGlobal__principal($(".sumar__clases__remanentes__por__pagar"),$("#cuentas__por__pagar__resumen__2"));


                    $("#actividades__seleccionadas").val(0);
                    $("#items__seleccionados").val(" ");

                }


            });


        });

    }

    incrementar__items($("#agregar__nuevosAc"));    


    var incrementar__items__paid=function(parametro1){

        let contadorA=0;

        $(parametro1).click(function(){

            $.getScript("layout/scripts/js/validacionBasica.js",function(){

                    contadorA++;

                    var nombreActividades = $('#items__seleccionados option:selected').attr('nombreActividades');
                    var itemPresupuestario = $('#items__seleccionados option:selected').attr('itemPresupuestario');
                    var item = $('#items__seleccionados').val();
                    var montoTotal = $('#items__seleccionados option:selected').attr('montoTotal');
                    var nombreItem = $('#items__seleccionados option:selected').attr('nombreItem');
                    var idProgramacionFinanciera = $('#items__seleccionados option:selected').attr('idProgramacionFinanciera');

                    $(".body__remanentes__paid").append('<tr class="filas__attr__paid__'+contadorA+'"> <td align="center"> <select id="selecionados__anios__montos__paid__'+contadorA+'" name="selecionados__anios__montos__paid[]" class="ancho__total__input__selects atados__anios__paid errores__obligados"> <option value="0">--Seleccione un año--</option> <option value="2000">2000</option> <option value="2001">2001</option> <option value="2002">2002</option> <option value="2003">2003</option> <option value="2004">2004</option> <option value="2005">2005</option> <option value="2006">2006</option> <option value="2007">2007</option> <option value="2008">2008</option> <option value="2009">2009</option> <option value="2010">2010</option> <option value="2011">2011</option> <option value="2012">2012</option> <option value="2013">2013</option> <option value="2014">2014</option> <option value="2015">2015</option> <option value="2016">2016</option> <option value="2017">2017</option> <option value="2018">2018</option> <option value="2019">2019</option> <option value="2020">2020</option> <option value="2021">2021</option> <option value="2022">2022</option></select> </td> <td align="center"> <input type="text" class="errores__obligados ancho__total__input atados__convenio" id="convenios__'+contadorA+'" name="convenios[]" /> </td> <td align="center"> <input type="text" class="errores__obligados atados__nombreProyecto" id="nombreProyectos__'+contadorA+'" name="nombreProyectos[]" /> </td> <td align="center"> <input type="text" class="errores__obligados solo__numero__montos ancho__total__input sumar__clases__remanentes__anteriores__paid cambio__de__numero__f" id="montos__paid__'+contadorA+'" name="montos__paid[]" value="0" /> </td> <td align="center"> <button id="eliminar__anios__anteriores__agregados__paids'+contadorA+'" attr="'+contadorA+'" name="eliminar__anios__anteriores__agregados__paids'+contadorA+'" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button> </td> </tr> ');

                    funcion__solo__numero__montos($(".solo__numero__montos"));
                    funcion__cambio__de__numero($(".cambio__de__numero__f"));


                    var eliminantes__remanentes=function(parametro1,parametro2){

                        $(parametro1).on('click', function () {

                            let attr=$(this).attr('attr');

                            let valorObtenidos=$("#montos__paid__"+attr).val();

                            let restados=parseFloat($("#remanentesPaid").val()) - parseFloat(valorObtenidos);

                            $(".filas__attr__paid__"+attr).remove();

                            $("#remanentesPaid").val(restados);

                            $("#paid__resumen__2").val(restados);

                            let totalRemanentesPoas=0;


                            totalRemanentesPoas=parseFloat($("#cuenta__31__resumen__2").val())  - parseFloat($("#cuentas__por__pagar__resumen__2").val())  - parseFloat($("#autogestion__resumen__2").val()) - parseFloat($("#paid__resumen__2").val()) - parseFloat($("#remanentes__anios__anteriores__resumen__2").val());

                            $("#remanentes__poa__resumen__2").val(totalRemanentesPoas.toFixed(2));


                        });

                    }

                    eliminantes__remanentes($("#eliminar__anios__anteriores__agregados__paids"+contadorA));

                    var sumarIndicadoresGlobal__principal=function(parametro1,parametro2){

                        $(parametro1).on('input', function () {

                            var sum = 0;

                            $(parametro1).each(function(){
                                sum += parseFloat($(this).val());
                            });

                            $(parametro2).val(sum.toFixed(2));

                            let totalRemanentesPoas=0;


                            totalRemanentesPoas=parseFloat($("#cuenta__31__resumen__2").val())  - parseFloat($("#cuentas__por__pagar__resumen__2").val())  - parseFloat($("#autogestion__resumen__2").val()) - parseFloat($("#paid__resumen__2").val()) - parseFloat($("#remanentes__anios__anteriores__resumen__2").val());

                            $("#remanentes__poa__resumen__2").val(totalRemanentesPoas.toFixed(2));

                        });

                    }

                    sumarIndicadoresGlobal__principal($(".sumar__clases__remanentes__anteriores__paid"),$("#remanentesPaid"));
                    sumarIndicadoresGlobal__principal($(".sumar__clases__remanentes__anteriores__paid"),$("#paid__resumen__2"));


            });


        });

    }

    incrementar__items__paid($("#agregar__anios__anteriores__agregados__paids"));    


});