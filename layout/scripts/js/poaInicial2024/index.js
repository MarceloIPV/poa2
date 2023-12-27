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

                    
                },
                error:function(){

                }

            });

        });
    
    }

    var construccion__modal__excel=function(boton,titulosArray,tipo){

        $(boton).click(function(e){

            let idActividad=$(this).attr("idActividad");

            $("#divcontratcionActividades").html(" ");

            $("#divcontratcionActividades").append("<div class='col col-4 font-bold'>Subir Archivo</div><input class='col col-4' type='file' id='cargar__archivo__"+idActividad+"' /> <div class='col col-4'><a class='btn btn-primary' id='visualizador__"+idActividad+"' idActividad='"+idActividad+"'>Visualizar</a></div>");

            visualizador__excel($("#visualizador__"+idActividad),titulosArray,tipo);

        });
    
    }

// });