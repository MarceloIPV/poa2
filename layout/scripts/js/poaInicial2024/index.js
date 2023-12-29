// $(document).ready(function () {

    var selectorExcel__poa__inicial=function(selector,contenedorExcel,contedorManual){

        $(selector).change(function(e){

            if($(this).val()=="manual"){
                $(contedorManual).show();
                $(contenedorExcel).hide();
            }else if($(this).val()=="excel"){
                $(contedorManual).hide();
                $(contenedorExcel).show();
            }else{
                $(contedorManual).hide();
                $(contenedorExcel).hide();
            }

        });
    
    }

    var visualizador__excel=function(boton,titulosArray,tipo){

        $(boton).click(function(e){

            let idActividad=$(this).attr("idActividad");

            var paqueteDeDatos = new FormData();
            paqueteDeDatos.append('tipo',tipo);
            paqueteDeDatos.append('documentoExcel', $("#cargar__archivo__"+idActividad)[0].files[0]); 

            $.ajax({

                type:"POST",
                url:"modelosBd/poaInicial2024/cargaExcel.md.php",
                contentType: false,
                data:paqueteDeDatos,
                processData: false,
                cache: false, 
                success:function(response){

                    let elementos=JSON.parse(response);

                    let banderaObligatorios=elementos['banderaObligatorios'];

                    if (banderaObligatorios==true) {

                        let obligatorios__falla=elementos['obligatorios__falla'];

                        alertify.set("notifier","position", "top-center");
                        alertify.notify(obligatorios__falla, "error", 15, function(){});
                        $(parametro5).val("");
                        $(parametro1).show();

                    }else{

                       

                        if (tipo=="act__administrativas") {

                            $("#contenedorTabla__"+idActividad).html(" ");

                            let item__array=elementos['item__array'];
                            let justificacion__array=elementos['justificacion__array'];
                            let cantidad__array=elementos['cantidad__array'];
                            let enero__array=elementos['enero__array'];
                            let febrero__array=elementos['febrero__array'];
                            let marzo__array=elementos['marzo__array'];
                            let abril__array=elementos['abril__array'];
                            let mayo__array=elementos['mayo__array'];
                            let junio__array=elementos['junio__array'];
                            let julio__array=elementos['julio__array'];
                            let agosto__array=elementos['agosto__array'];
                            let septiembre__array=elementos['septiembre__array'];
                            let octubre__array=elementos['octubre__array'];
                            let noviembre__array=elementos['noviembre__array'];
                            let diciembre__array=elementos['diciembre__array'];
                            let total__array=elementos['total__array'];
                        
                            var cuerpo = document.getElementById('contenedorTabla__'+idActividad);

                            cuerpo.insertAdjacentHTML('beforeend','<div><centre><table><thead><tr id="theadTabla"></tr></thead><tbody id="tbody'+idActividad+'"+></tbody></table></centre></div>');
                          
                            var cuerpo1 = document.getElementById("theadTabla");
                            for(let i=0;i<titulosArray.length;i++){
                              cuerpo1.insertAdjacentHTML('beforeend','<th><center>'+titulosArray[i]+'</center></th>');
                            }



                            for (let i =0; i<item__array.length; i++) {

                                $("#tbody"+idActividad).append('<tr><td><center>'+item__array[i]+'</center></td> <td><center><a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#contrataciones__variables" id="tipoContratacion__Guardar">Contratación</a></center></td> <td><center>'+justificacion__array[i]+'</center></td><td><center>'+cantidad__array[i]+'</center></td><td><center>'+enero__array[i]+'</center></td><td><center>'+febrero__array[i]+'</center></td><td><center>'+marzo__array[i]+'</center></td><td><center>'+abril__array[i]+'</center></td><td><center>'+mayo__array[i]+'</center></td><td><center>'+junio__array[i]+'</center></td><td><center>'+julio__array[i]+'</center></td><td><center>'+agosto__array[i]+'</center></td><td><center>'+septiembre__array[i]+'</center></td><td><center>'+octubre__array[i]+'</center></td><td><center>'+noviembre__array[i]+'</center></td><td><center>'+diciembre__array[i]+'</center></td><td><center>'+total__array[i]+'</center></td></tr>');
                                
                            }

                            cuerpo.insertAdjacentHTML('beforeend','<div><center><a class="btn btn-success">Enviar</a></center></div>');
                           
                        }

                        if (tipo=="suminis__administrativas") {

                            $("#contenedorTabla__"+idActividad).html(" ");

                            let item__array=elementos['item__array'];
                            let tipo__array=elementos['tipo__array'];
                            let nombre__array=elementos['nombre__array'];
                            let luz__array=elementos['luz__array'];
                            let agua__array=elementos['agua__array'];
                         

                            var cuerpo = document.getElementById('contenedorTabla__'+idActividad);

                            cuerpo.insertAdjacentHTML('beforeend','<div><centre><table><thead><tr id="theadTabla"></tr></thead><tbody id="tbody'+idActividad+'"+></tbody></table></centre></div>');
                          
                            var cuerpo1 = document.getElementById("theadTabla");
                            for(let i=0;i<titulosArray.length;i++){
                              cuerpo1.insertAdjacentHTML('beforeend','<th><center>'+titulosArray[i]+'</center></th>');
                            }



                            for (let i =0; i<item__array.length; i++) {

                                $("#tbody"+idActividad).append('<tr><td><center>'+item__array[i]+'</center></td><td><center><a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#contrataciones__variables" id="tipoContratacion__Guardar">Contratación</a></center></td><td><center>'+tipo__array[i]+'</center></td><td><center>'+nombre__array[i]+'</center></td><td><center>'+luz__array[i]+'</center></td><td><center>'+agua__array[i]+'</center></td></tr>');
                                
                            }

                            cuerpo.insertAdjacentHTML('beforeend','<div><center><a class="btn btn-success">Enviar</a></center></div>');
                           
                        }

                        if(tipo=="mantenimiento"){

                            $("#contenedorTabla__"+idActividad).html(" ");

                            let idActividad__array=elementos['idActividad__array'];
                            let Item__array=elementos['Item__array'];
                            let nombreItem__array=elementos['nombreItem__array'];
                            let nombreInfra__array=elementos['nombreInfra__array'];
                            let provincia__array=elementos['provincia__array'];
                            let direccion__array=elementos['direccion__array'];
                            let estado__array=elementos['estado__array'];
                            let tipoRecursos__array=elementos['tipoRecursos__array'];
                            let tipoIntervencion__array=elementos['tipoIntervencion__array'];
                            let detallarTipo__intervencion__array=elementos['detallarTipo__intervencion__array'];
                            let tipoMantenimiento__array=elementos['tipoMantenimiento__array'];
                            let materiales__servicios__array=elementos['materiales__servicios__array'];
                            let ultimoFecha__servicios__array=elementos['ultimoFecha__servicios__array'];
                            let enero__array=elementos['enero__array'];
                            let febrero__array=elementos['febrero__array'];
                            let marzo__array=elementos['marzo__array'];
                            let abril__array=elementos['abril__array'];
                            let mayo__array=elementos['mayo__array'];
                            let junio__array=elementos['junio__array'];
                            let julio__array=elementos['julio__array'];
                            let agosto__array=elementos['agosto__array'];
                            let septiembre__array=elementos['septiembre__array'];
                            let octubre__array=elementos['octubre__array'];
                            let noviembre__array=elementos['noviembre__array'];
                            let diciembre__array=elementos['diciembre__array'];
                            let total__array=elementos['total__array'];
                       

                            var cuerpo = document.getElementById('contenedorTabla__'+idActividad);

                            cuerpo.insertAdjacentHTML('beforeend','<div><centre><table><thead><tr id="theadTabla"></tr></thead><tbody id="tbody'+idActividad+'"+></tbody></table></centre></div>');
                          
                            var cuerpo1 = document.getElementById("theadTabla");
                            for(let i=0;i<titulosArray.length;i++){
                              cuerpo1.insertAdjacentHTML('beforeend','<th><center>'+titulosArray[i]+'</center></th>');
                            }



                            for (let i =0; i<nombreInfra__array.length; i++) {

                                $("#tbody"+idActividad).append('<tr><td><center>'+Item__array[i]+'</center></td><td><center><a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#contrataciones_variables" id="tipoContratacion_Guardar">Contratación</a></center></td><td><center>'+nombreItem__array[i]+'</center></td><td><center>'+nombreInfra__array[i]+'</center></td><td><center>'+provincia__array[i]+'</center></td><td><center>'+direccion__array[i]+'</center></td><td><center>'+estado__array[i]+'</center></td><td><center>'+tipoRecursos__array[i]+'</center></td><td><center>'+tipoIntervencion__array[i]+'</center></td><td><center>'+detallarTipo__intervencion__array[i]+'</center></td><td><center>'+tipoMantenimiento__array[i]+'</center></td><td><center>'+materiales__servicios__array[i]+'</center></td><td><center>'+ultimoFecha__servicios__array[i]+'</center></td><td><center>'+enero__array[i]+'</center></td><td><center>'+febrero__array[i]+'</center></td><td><center>'+marzo__array[i]+'</center></td><td><center>'+abril__array[i]+'</center></td><td><center>'+mayo__array[i]+'</center></td><td><center>'+junio__array[i]+'</center></td><td><center>'+julio__array[i]+'</center></td><td><center>'+agosto__array[i]+'</center></td><td><center>'+septiembre__array[i]+'</center></td><td><center>'+octubre__array[i]+'</center></td><td><center>'+noviembre__array[i]+'</center></td><td><center>'+diciembre__array[i]+'</center></td><td><center>'+total__array[i]+'</center></td></tr>');
                                
                            }

                            cuerpo.insertAdjacentHTML('beforeend','<div><center><a class="btn btn-success">Enviar</a></center></div>');
                        }

                        if(tipo=="act_deportivas"){

                        }



                    }

                    
                },
                error:function(){

                }

            });

        });
    
    }



    var construccion__modal__excel=function(boton,titulosArray,tipo){

        $(boton).click(function(e){

            let idActividad=$(this).attr("idActividad");

            $("#idTituloModalContratacion").text('Carga de Archivo Excel');

            $("#divcontratcionActividades").html(" ");

            $("#divcontratcionActividades").append("<div class='col col-3'><a class='btn btn-success' id='formatoDescarga__"+idActividad+"' download='formatoMatriz__"+idActividad+"'>Descargar Formato</a></div><div class='col col-3 font-bold'>Subir Archivo</div><input class='col col-3' type='file' id='cargar__archivo__"+idActividad+"' /> <div class='col col-3'><a class='btn btn-primary' id='visualizador__"+idActividad+"' idActividad='"+idActividad+"'>Visualizar</a></div><div class='col col-12' id='contenedorTabla__"+idActividad+"'></div>");

       
            if (tipo=="act__administrativas") {

                $("#formatoDescarga__"+idActividad).attr("href","documentos/POAINICIAL_MATRICES/MATRIZ1.xlsx")
                
            }

            if (tipo=="suminis__administrativas") {

                $("#formatoDescarga__"+idActividad).attr("href","documentos/POAINICIAL_MATRICES/MATRIZ1SUMINISTROS.xlsx")
                
            }

            if (tipo=="mantenimiento") {

                $("#formatoDescarga__"+idActividad).attr("href","documentos/POAINICIAL_MATRICES/MATRIZ_ACTIVIDAD_002.xlsx")
                
            }

            if (tipo=="act_deportivas") {

                $("#formatoDescarga__"+idActividad).attr("href","documentos/POAINICIAL_MATRICES/MATRIZ_ACTIVIDADES_DEPORTIVAS.xlsx")
                
            }

            visualizador__excel($("#visualizador__"+idActividad),titulosArray,tipo);

        });
    
    }

// });