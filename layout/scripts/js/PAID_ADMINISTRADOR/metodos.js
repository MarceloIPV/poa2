/*=========================================
=            Creando segmentos            =
=========================================*/

var contadorGeneral=0;

var generador=0;

var informacionGlobal="";


var segmentosJsPaidInfraestructura=function(parametro1,parametro2,parametro3,parametro4,parametro5,parametro6,tablaVerOcultar){


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