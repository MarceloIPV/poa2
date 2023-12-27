var eliminar_tabla_rubos_item = function (boton) {


    $(boton).click(function (e) {

        let idProgramacionFinanciera = $(this).attr('idProbramacionFinanciera');
        let idComponentes = $(this).attr('idComponentes');
        let idAsignacion = $(this).attr('idAsignacion');
        let idRubros = $(this).attr('idRubros');
        let identificador = $(this).attr('identificador');

       
   
        let paqueteDeDatos = new FormData();
        
        paqueteDeDatos.append("tipo","eliminar__items__financieros");
        paqueteDeDatos.append("idProgramacionFinanciera", idProgramacionFinanciera);
       
        axios({
            method: "post",
            url: "modelosBd/paid-alto-rendimiento-modelos/delete.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {
            
            mensaje =response.data.mensaje;

             if (mensaje==1) {

                alertify.set("notifier","position", "top-center");
				alertify.notify("Registro Eliminado Correctamente", "warning", 5, function(){});

            }

        }).catch((error) => {

        });


        $("#SelectorItemRubro option").remove(); 

        RecargarRubros__items("obtener__rubros__items__inversion",idComponentes,idAsignacion,idRubros,identificador);

    });

}


var eliminar_tabla_CatalogoCcontraloria_Paid_AR = function (boton) {


    $(boton).click(function (e) {

       
        let idComponentes = $(this).attr('idComponentes');
        let idAsignacion = $(this).attr('idAsignacion');
        let idRubros = $(this).attr('idRubros');
        let identificador = $(this).attr('identificador');
        var idItem = $(this).attr('idItem');

        let paqueteDeDatos = new FormData();
        
        paqueteDeDatos.append("tipo","eliminar_catalogo_Contraloria_PaidAR");
        paqueteDeDatos.append("idComponentes",idComponentes);
        paqueteDeDatos.append("idRubros",idRubros);
        paqueteDeDatos.append("idAsignacion",idAsignacion);
        paqueteDeDatos.append("identificador",identificador);
        paqueteDeDatos.append("idItem",idItem);
       
        axios({
            method: "post",
            url: "modelosBd/paid-alto-rendimiento-modelos/delete.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {
            
            mensaje =response.data.mensaje;

             if (mensaje==1) {

                alertify.set("notifier","position", "top-center");
				alertify.notify("Registro Eliminado Correctamente", "warning", 2, function(){});

            }

        }).catch((error) => {

        });

    });

}