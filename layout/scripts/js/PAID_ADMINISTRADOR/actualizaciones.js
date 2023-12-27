var funcion__editar_tabla_paid_administrador=function(tbody,classBtn,tabla){

    
    $(tbody).on("click","a."+classBtn,function(e){

        e.preventDefault();

        let data=tabla.DataTable().row($(this).parents("tr")).data();

        console.log(data);

        $(".input__1").val(data[0]);
        $(".enviado").val(data[1]);
		

    });
        
}

var funcion__editar__paid__administrador=function(boton,tipo,input){

    $(boton).click(function (e) {

            var confirm = alertify.confirm('¿Está seguro de guardar la información ingresada?', '¿Está seguro de guardar la información ingresada?', null, null).set('labels', { ok: 'Confirmar', cancel: 'Cancelar' });
        
            confirm.set({ transition: 'slide' });
    
            confirm.set('onok', function () {
    
                var paqueteDeDatos = new FormData();
    
                paqueteDeDatos.append("tipo", tipo);
                
                paqueteDeDatos.append("detalle", $(input).val());
                paqueteDeDatos.append("idtabla", $(".enviado").val());

                $.ajax({
    
                    type: "POST",
                    url: "modelosBd/PAID_ADMINISTRADOR/actualizacion.md.php",
                    contentType: false,
                    data: paqueteDeDatos,
                    processData: false,
                    cache: false,
                    success: function (response) {			
                        
                        var elementos = JSON.parse(response);
                        var mensaje = elementos['mensaje'];
                        console.log("mensaje")
                        console.log(mensaje)
    
                        if (mensaje == 1) {
                            alertify.set("notifier", "position", "top-center");
                            alertify.notify("Registro realizado correctamente", "success", 5, function () { });
    
                        
    
                        }
    
                    },
                    error: function () {
    
                    }
    
                });
    
                
            });
        
    });
    
}


