var actualizacion_tabla_rubos_itemDesarrollo = function (boton) {


    $(boton).click(function (e) {

        let idProgramacionFinanciera = $(this).attr('idProbramacionFinanciera');


        var enero = $("#input_enero"+idProgramacionFinanciera ).val()
        var febrero = $("#input_febrero"+idProgramacionFinanciera ).val()
        var marzo = $("#input_marzo"+idProgramacionFinanciera ).val()
        var abril = $("#input_abril"+idProgramacionFinanciera ).val()
        var mayo = $("#input_mayo"+idProgramacionFinanciera ).val()
        var junio = $("#input_junio"+idProgramacionFinanciera ).val()
        var julio = $("#input_julio"+idProgramacionFinanciera ).val()
        var agosto = $("#input_agosto"+idProgramacionFinanciera ).val()
        var septiembre = $("#input_septiembre"+idProgramacionFinanciera ).val()
        var octubre = $("#input_octubre"+idProgramacionFinanciera ).val()
        var noviembre = $("#input_noviembre"+idProgramacionFinanciera ).val()
        var diciembre = $("#input_diciembre"+idProgramacionFinanciera ).val()
        var total = $("#input_total"+idProgramacionFinanciera ).val()

        var paqueteDeDatos = new FormData();
        
        paqueteDeDatos.append("tipo","actualiza__items__financieros");
        paqueteDeDatos.append("enero", enero);
        paqueteDeDatos.append("febrero", febrero);
        paqueteDeDatos.append("marzo", marzo);
        paqueteDeDatos.append("abril", abril);
        paqueteDeDatos.append("mayo", mayo);
        paqueteDeDatos.append("junio", junio);
        paqueteDeDatos.append("julio", julio);
        paqueteDeDatos.append("agosto", agosto);
        paqueteDeDatos.append("septiembre", septiembre);
        paqueteDeDatos.append("octubre", octubre);
        paqueteDeDatos.append("noviembre", noviembre);
        paqueteDeDatos.append("diciembre", diciembre);
        paqueteDeDatos.append("total", total);
        paqueteDeDatos.append("idProgramacionFinanciera", idProgramacionFinanciera);
       
        axios({
            method: "post",
            url: "modelosBd/PAID_DESARROLLO/actualiza.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {
            
            mensaje =response.data.mensaje;

             if (mensaje==1) {

                alertify.set("notifier","position", "top-center");
				alertify.notify("Registro realizado correctamente", "success", 5, function(){});

            }

        }).catch((error) => {
           
        });



     


    });

}


var actualizacion_indicadores_organismos_paid = function (boton) {

    $(boton).click(function (e) {

        let idPaidIndicador = $(this).attr('idPaidIndicador');

        var primerTrimestre = $("#primerTrimestre"+idPaidIndicador).val()
        var segundoTrimestre = $("#segundoTrimestre"+idPaidIndicador).val()
        var tercerTrimestre = $("#tercerTrimestre"+idPaidIndicador).val()
        var cuartoTrimestre = $("#cuartoTrimestre"+idPaidIndicador).val()
        var totalIndicador = $("#totalIndicador"+idPaidIndicador).val()


        var paqueteDeDatos = new FormData();
        
        paqueteDeDatos.append("tipo","actualiza__indicadores__paid");
        paqueteDeDatos.append("idPaidIndicador", idPaidIndicador);
        paqueteDeDatos.append("primerTrimestre", primerTrimestre);
        paqueteDeDatos.append("segundoTrimestre", segundoTrimestre);
        paqueteDeDatos.append("tercerTrimestre", tercerTrimestre);
        paqueteDeDatos.append("cuartoTrimestre", cuartoTrimestre);
        paqueteDeDatos.append("totalIndicador", totalIndicador);

        axios({
            method: "post",
            url: "modelosBd/PAID_DESARROLLO/actualiza.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {
            
            mensaje =response.data.mensaje;

             if (mensaje==1) {

                alertify.set("notifier","position", "top-center");
				alertify.notify("Registro realizado correctamente", "success", 5, function(){});

            }

        }).catch((error) => {
           
        });



     


    });

}


var insertar__contrataciones__publicas_paid=function(boton){

    $(boton).click(function (e) {


         
            var idCatalogo = $(this).attr('idCatalogo');
          

            var paqueteDeDatos = new FormData();
    
            paqueteDeDatos.append('tipo','actualiza__catalogoContraloria__paid');		
    
            var other_data = $('#formulario__tipo__contrataciones').serializeArray();
    
            $.each(other_data,function(key,input){
                paqueteDeDatos.append(input.name,input.value);
            });
    
        
            paqueteDeDatos.append("idCatalogo",idCatalogo);
          
            
    
            let catalogo__elect=validacionRegistro__retornables($("#catalogo__elect"));
            paqueteDeDatos.append("catalogo__elect",catalogo__elect);
    
            let catalogo__subasta=validacionRegistro__retornables($("#catalogo__subasta"));
            paqueteDeDatos.append("catalogo__subasta",catalogo__subasta);
    
            let catalogo__infima=validacionRegistro__retornables($("#catalogo__infima"));
            paqueteDeDatos.append("catalogo__infima",catalogo__infima);
    
            let catalogo__menorCuantia=validacionRegistro__retornables($("#catalogo__menorCuantia"));
            paqueteDeDatos.append("catalogo__menorCuantia",catalogo__menorCuantia);
    
            let catalogo__cotizacion=validacionRegistro__retornables($("#catalogo__cotizacion"));
            paqueteDeDatos.append("catalogo__cotizacion",catalogo__cotizacion);
    
            let catalogo__licitacion=validacionRegistro__retornables($("#catalogo__licitacion"));
            paqueteDeDatos.append("catalogo__licitacion",catalogo__licitacion);
    
            let catalogo__menorCuantiaObras=validacionRegistro__retornables($("#catalogo__menorCuantiaObras"));
            paqueteDeDatos.append("catalogo__menorCuantiaObras",catalogo__menorCuantiaObras);
    
            let catalogo__cotizacionObras=validacionRegistro__retornables($("#catalogo__cotizacionObras"));
            paqueteDeDatos.append("catalogo__cotizacionObras",catalogo__cotizacionObras);
    
            let catalogo__licitacionObras=validacionRegistro__retornables($("#catalogo__licitacionObras"));
            paqueteDeDatos.append("catalogo__licitacionObras",catalogo__licitacionObras);
    
            let catalogo__precioObras=validacionRegistro__retornables($("#catalogo__precioObras"));
            paqueteDeDatos.append("catalogo__precioObras",catalogo__precioObras);
    
            let catalogo__contratacionDirecta=validacionRegistro__retornables($("#catalogo__contratacionDirecta"));
            paqueteDeDatos.append("catalogo__contratacionDirecta",catalogo__contratacionDirecta);
    
            let catalogo__contratacionListaCorta=validacionRegistro__retornables($("#catalogo__contratacionListaCorta"));
            paqueteDeDatos.append("catalogo__contratacionListaCorta",catalogo__contratacionListaCorta);
    
            let catalogo__contratacionConcursoPu=validacionRegistro__retornables($("#catalogo__contratacionConcursoPu"));
            paqueteDeDatos.append("catalogo__contratacionConcursoPu",catalogo__contratacionConcursoPu);
    
            let noAplica__3=validacionRegistro__retornables($("#noAplica__3"));
            paqueteDeDatos.append("noAplica__3",noAplica__3);

            

            if(catalogo__elect == "no"){
                $("#catalogo__elect__texto").val(" ");
                
            }else if(catalogo__subasta == "no"){
                $("#catalogo__subasta__texto").val(" ");
            }else if(catalogo__infima == "no"){
                $("#catalogo__infima__texto").val(" ");
            }else if(catalogo__menorCuantia == "no"){
                $("#catalogo__menorCuantia__texto").val(" ");
            }else if(catalogo__cotizacion == "no"){
                $("#catalogo__cotizacion__texto").val(" ");
            }else if(catalogo__licitacion == "no"){
                $("#catalogo__licitacion__texto").val(" ");
            }else if(catalogo__menorCuantiaObras == "no"){
                $("#catalogo__menorCuantiaObras__texto").val(" ");
            }else if(catalogo__cotizacionObras == "no"){
                $("#catalogo__cotizacionObras__texto").val(" ");
            }else if(catalogo__licitacionObras == "no"){
                $("#catalogo__licitacionObras__texto").val(" ");
            }else if(catalogo__precioObras == "no"){
                $("#catalogo__precioObras__texto").val(" ");
            }else if(catalogo__contratacionDirecta == "no"){
                $("#catalogo__contratacionDirecta__texto").val(" ");
            }else if(catalogo__contratacionListaCorta == "no"){
                $("#catalogo__contratacionListaCorta__texto").val(" ");
            }else if(catalogo__contratacionConcursoPu == "no"){
                $("#catalogo__contratacionConcursoPu__texto").val(" ");
            }


            let catalogo__elect__texto=$("#catalogo__elect__texto").val();
            let catalogo__subasta__texto=$("#catalogo__subasta__texto").val();
            let catalogo__infima__texto=$("#catalogo__infima__texto").val();
            let catalogo__menorCuantia__texto=$("#catalogo__menorCuantia__texto").val();
            let catalogo__cotizacion__texto=$("#catalogo__cotizacion__texto").val();
            let catalogo__licitacion__texto=$("#catalogo__licitacion__texto").val();
            let catalogo__menorCuantiaObras__texto=$("#catalogo__menorCuantiaObras__texto").val();
            let catalogo__cotizacionObras__texto=$("#catalogo__cotizacionObras__texto").val();
            let catalogo__licitacionObras__texto=$("#catalogo__licitacionObras__texto").val();
            let catalogo__precioObras__texto=$("#catalogo__precioObras__texto").val();
            let catalogo__contratacionDirecta__texto=$("#catalogo__contratacionDirecta__texto").val();
            let catalogo__contratacionListaCorta__texto=$("#catalogo__contratacionListaCorta__texto").val();
            let catalogo__contratacionConcursoPu__texto=$("#catalogo__contratacionConcursoPu__texto").val();

          
            paqueteDeDatos.append("catalogo__elect__texto",catalogo__elect__texto);
            paqueteDeDatos.append("catalogo__subasta__texto",catalogo__subasta__texto);
            paqueteDeDatos.append("catalogo__infima__texto",catalogo__infima__texto);
            paqueteDeDatos.append("catalogo__menorCuantia__texto",catalogo__menorCuantia__texto);
            paqueteDeDatos.append("catalogo__cotizacion__texto",catalogo__cotizacion__texto);
            paqueteDeDatos.append("catalogo__licitacion__texto",catalogo__licitacion__texto);
            paqueteDeDatos.append("catalogo__menorCuantiaObras__texto",catalogo__menorCuantiaObras__texto);
            paqueteDeDatos.append("catalogo__cotizacionObras__texto",catalogo__cotizacionObras__texto);
            paqueteDeDatos.append("catalogo__licitacionObras__texto",catalogo__licitacionObras__texto);
            paqueteDeDatos.append("catalogo__precioObras__texto",catalogo__precioObras__texto);
            paqueteDeDatos.append("catalogo__contratacionDirecta__texto",catalogo__contratacionDirecta__texto);
            paqueteDeDatos.append("catalogo__contratacionListaCorta__texto",catalogo__contratacionListaCorta__texto);
            paqueteDeDatos.append("catalogo__contratacionConcursoPu__texto",catalogo__contratacionConcursoPu__texto);
   


    
            axios({
                method: "post",
                url: "modelosBd/PAID_DESARROLLO/actualiza.md.php",
                data: paqueteDeDatos,
                headers: { "Content-Type": "multipart/form-data" },
            }).then((response) => {
                
                mensaje =response.data.mensaje;
    
                if (mensaje==1) {
    
                    alertify.set("notifier","position", "top-center");
                    alertify.notify("Registro realizado correctamente", "success", 3, function(){});
    
                }
    
            }).catch((error) => {
            
            });

    });

}


/*====================================
=            Editar datos            =
====================================*/
    
var funcion__editar_Matrices_Generales=function(tbody,tabla,idModal,idDivModal,idtituloModal,idBotonGuardar){

    $(tbody).on("mouseover","button.dt-editar",function(e){

        $('.dt-editar').attr('data-bs-target', idModal)

    });
    
    $(tbody).on("click","button.dt-editar",function(e){

        e.preventDefault();
        
        let data=tabla.DataTable().row($(this).parents("tr")).data();

        console.log(data);

        $(idtituloModal).text("Editar: "+ data[5]);

        var cuerpo = document.getElementById(idDivModal);

        $("#"+idDivModal + " div").remove();


        cuerpo.insertAdjacentHTML('beforeend','<div  class="col col-4 titulo__enfasis mt-2">Descripción</div>');
        cuerpo.insertAdjacentHTML('beforeend','<div  class="col col-8 mt-2"><input id="editarDescripcion" type="text" class=" ancho__total__input  text-center"  value="'+data[3]+'"></div>');
        
        cuerpo.insertAdjacentHTML('beforeend','<div class="col col-4 titulo__enfasis mt-2">Valor Total</div>');
        cuerpo.insertAdjacentHTML('beforeend','<div class="col col-8 mt-2"><input type="text" id="editarValorTotal" class="ancho__total__input solo__numero__montos  text-center" value="'+data[4]+'"></div>');
    
        $(idBotonGuardar).attr("idMatriz", data[5]);

        funcion__solo__numero__montos($(".solo__numero__montos"));
      
        
    });
        
}


        
var funcion__editar_Matrices_Generales_Acreditaciones=function(tbody,tabla,idModal,idDivModal,idtituloModal,idBotonGuardar){

    $(tbody).on("mouseover","button.dt-editar",function(e){

        $('.dt-editar').attr('data-bs-target', idModal)

    });
    
    $(tbody).on("click","button.dt-editar",function(e){

        e.preventDefault();
        
        let data=tabla.DataTable().row($(this).parents("tr")).data();

        console.log(data);

        $(idtituloModal).text("Editar: "+ data[5]);

        var cuerpo = document.getElementById(idDivModal);

        $("#"+idDivModal + " div").remove();

        cuerpo.insertAdjacentHTML('beforeend','<div  class="col col-4 titulo__enfasis mt-2">Descripción</div>');
        cuerpo.insertAdjacentHTML('beforeend','<div  class="col col-8 mt-2"><input id="editarDescripcion" type="text" class=" ancho__total__input  text-center"  value="'+data[3]+'"></div>');
        
        cuerpo.insertAdjacentHTML('beforeend','<div class="col col-4 titulo__enfasis mt-2">Cantidad</div>');
        cuerpo.insertAdjacentHTML('beforeend','<div class="col col-8 mt-2"><input type="text" id="editarCantidad" class="ancho__total__input solo__numero__montos multiplicar__montosEditarAcreditaciones text-center" value="'+data[4]+'"></div>');
    
        cuerpo.insertAdjacentHTML('beforeend','<div class="col col-4 titulo__enfasis mt-2">Valor Unitario</div>');
        cuerpo.insertAdjacentHTML('beforeend','<div class="col col-8 mt-2"><input type="text" id="editarValorUnitario" class="ancho__total__input solo__numero__montos multiplicar__montosEditarAcreditaciones text-center" value="'+data[5]+'"></div>');
    
        cuerpo.insertAdjacentHTML('beforeend','<div class="col col-4 titulo__enfasis mt-2">Valor Total</div>');
        cuerpo.insertAdjacentHTML('beforeend','<div class="col col-8 mt-2"><input type="text" readonly="true" id="editarValorTotal" class="ancho__total__input solo__numero__montos  text-center" value="'+data[6]+'"></div>');
    
        $(idBotonGuardar).attr("idMatriz", data[7]);

        multiplicarIndicadoresD($(".multiplicar__montosEditarAcreditaciones"),$("#editarValorTotal"));
        funcion__solo__numero__montos($(".solo__numero__montos"));
        
    });
}
//=====  End of Editar datos  ======//


        

var actualizacion_Matrices_Generales_JN = function (boton, tipo,tabla) {
  $(boton).click(function (e) {

    let idMatriz= $(this).attr("idMatriz");

    var paqueteDeDatos = new FormData();

    if(tipo=="actualizar_matrices_generales_auxiliares_JN"){

        paqueteDeDatos.append("tipo", tipo);
        paqueteDeDatos.append("idMatriz", idMatriz);
        paqueteDeDatos.append("descripcion", $("#editarDescripcion").val());
        paqueteDeDatos.append("valorTotal", $("#editarValorTotal").val());

    }else{

        paqueteDeDatos.append("tipo", tipo);
        paqueteDeDatos.append("idMatriz", idMatriz);
        paqueteDeDatos.append("descripcion", $("#editarDescripcion").val());
        paqueteDeDatos.append("cantidad", $("#editarCantidad").val());
        paqueteDeDatos.append("valorUnitario", $("#editarValorUnitario").val());
        paqueteDeDatos.append("valorTotal", $("#editarValorTotal").val());

    }

    axios({
      method: "post",
      url: "modelosBd/PAID_DESARROLLO/actualiza.md.php",
      data: paqueteDeDatos,
      headers: { "Content-Type": "multipart/form-data" },
    })
      .then((response) => {
        mensaje = response.data.mensaje;

        if (mensaje == 1) {
          alertify.set("notifier", "position", "top-center");
          alertify.notify(
            "Registro realizado correctamente",
            "success",
            5,
            function () {}
          );
        }

        actualizaDatabletPorID($(tabla))
      })
      .catch((error) => {
        
      });
  });
};