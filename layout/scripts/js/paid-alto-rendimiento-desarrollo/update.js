var actualizacion_tabla_rubos_item = function (boton) {


    $(boton).click(function (e) {

        let idProgramacionFinanciera = $(this).attr('idProbramacionFinanciera');



        let enero = $("#input_enero" + idProgramacionFinanciera).val()
        let febrero = $("#input_febrero" + idProgramacionFinanciera).val()
        let marzo = $("#input_marzo" + idProgramacionFinanciera).val()
        let abril = $("#input_abril" + idProgramacionFinanciera).val()
        let mayo = $("#input_mayo" + idProgramacionFinanciera).val()
        let junio = $("#input_junio" + idProgramacionFinanciera).val()
        let julio = $("#input_julio" + idProgramacionFinanciera).val()
        let agosto = $("#input_agosto" + idProgramacionFinanciera).val()
        let septiembre = $("#input_septiembre" + idProgramacionFinanciera).val()
        let octubre = $("#input_octubre" + idProgramacionFinanciera).val()
        let noviembre = $("#input_noviembre" + idProgramacionFinanciera).val()
        let diciembre = $("#input_diciembre" + idProgramacionFinanciera).val()
        let total = $("#input_total" + idProgramacionFinanciera).val()



        let paqueteDeDatos = new FormData();

        paqueteDeDatos.append("tipo", "actualiza__items__financieros");
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
            url: "modelosBd/paid-alto-rendimiento-modelos/update.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {

            mensaje = response.data.mensaje;

            if (mensaje == 1) {

                alertify.set("notifier", "position", "top-center");
                alertify.notify("Registro realizado correctamente", "success", 5, function () { });

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
            url: "modelosBd/paid-alto-rendimiento-modelos/update.md.php",
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


var insertar__contrataciones__publicas_paidAR=function(boton){

    $(boton).click(function (e) {


         
            var idCatalogo = $(this).attr('idCatalogo');
          

            var paqueteDeDatos = new FormData();
    
            paqueteDeDatos.append('tipo','actualiza__catalogoContraloria__paidAR');		
    
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
                url: "modelosBd/paid-alto-rendimiento-modelos/update.md.php",
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
