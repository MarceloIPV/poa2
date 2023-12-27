/*=============================================
=            Funciones de eliminar            =
=============================================*/


var funcion__eliminar__general__RegistroContratacion__Seguimiento = function (tipo,idItem,idOrganismo,trimestre,actividad) {


    var paqueteDeDatos = new FormData();

    paqueteDeDatos.append("tipo", tipo);

    paqueteDeDatos.append("idItem", idItem);
    paqueteDeDatos.append("idOrganismo",idOrganismo);
    paqueteDeDatos.append("trimestre",trimestre);
    paqueteDeDatos.append("actividad",actividad)

    $.ajax({

        type: "POST",
        url: "modelosBd/POA_SEGUIMIENTO/eliminaciones.md.php",
        contentType: false,
        data: paqueteDeDatos,
        processData: false,
        cache: false,
        success: function (response) {

            var elementos = JSON.parse(response);

            var mensaje = elementos['mensaje'];

            if (mensaje == 1) {

                alertify.set("notifier", "position", "top-center");
                alertify.notify("Registro eliminado correctamente", "success", 5, function () { });

            }

        },
        error: function () {

        }

    });

}

var funcion__eliminar__general__contratacion__Seguimiento = function (idItem,idOrganismo,trimestre,actividad, idRegistro) {

var confirm = alertify.confirm('¿Está seguro de eliminar el registro?', null, null).set('labels', { ok: 'Confirmar', cancel: 'Cancelar' });

confirm.set({ transition: 'slide' });

confirm.set('onok', function () {

    
    funcion__eliminar__general__RegistroContratacion__Seguimiento("eliminar__contratacion_publica_seguimiento",idItem,idOrganismo,trimestre,actividad);
    funcion__eliminar__general__RegistroContratacion__Seguimiento("eliminar_registro_contratacion_publica",idItem,idOrganismo,trimestre,actividad);

	$(".fila__fac__" + idRegistro).remove();

});

confirm.set('oncancel', function () { //callbak al pulsar botón negativo
    alertify.set("notifier", "position", "top-center");
    alertify.notify("Acción cancelada", "error", 1, function () { });
});

}
