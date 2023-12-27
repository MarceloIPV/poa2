var agregarDatatablets__paid__administrativo__2023=function(parametro1,parametro3,parametro5,objetos,classBtnEditar,classBtnEliminar){
  
    $(parametro1).click(function (e){

        $("#"+parametro3).DataTable().destroy();

        datatabletsSeguimientoPaidAdminstradorVacio($("#"+parametro3),parametro3,parametro5,objetos,[$("#idOrganismo").val(),$("#trimestreN").val(),parametro5],false);

        funcion__editar_tabla_paid_administrador("#"+parametro3+" tbody",classBtnEditar,$("#"+parametro3));
        funcion__eliminar_tabla_paid_administrador("#"+parametro3+" tbody",classBtnEliminar, $("#"+parametro3),classBtnEliminar);
    });

}