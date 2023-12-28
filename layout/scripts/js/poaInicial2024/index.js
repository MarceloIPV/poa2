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

                            let nombreItem__array=elementos['tipo__array'];
                            let justificacion__array=elementos['nombre__array'];
                       

                            var cuerpo = document.getElementById('contenedorTabla__'+idActividad);

                            cuerpo.insertAdjacentHTML('beforeend','<div><centre><table><thead><tr id="theadTabla"></tr></thead><tbody id="tbody'+idActividad+'"+></tbody></table></centre></div>');
                          
                            var cuerpo1 = document.getElementById("theadTabla");
                            for(let i=0;i<titulosArray.length;i++){
                              cuerpo1.insertAdjacentHTML('beforeend','<th><center>'+titulosArray[i]+'</center></th>');
                            }



                            for (let i =0; i<nombreItem__array.length; i++) {

                                $("#tbody"+idActividad).append('<tr><td><center>'+nombreItem__array[i]+'</center></td><td><center>'+justificacion__array[i]+'</center></td></tr>');
                                
                            }

                            cuerpo.insertAdjacentHTML('beforeend','<div><center><a class="btn btn-success">Enviar</a></center></div>');
                           
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

            visualizador__excel($("#visualizador__"+idActividad),titulosArray,tipo);

        });
    
    }

// });