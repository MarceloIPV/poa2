var funcion__eliminar_tabla_paid_administrador=function(tbody,classBtn,tabla,tipo){

    
    $(tbody).on("click","a."+classBtn,function(e){

        e.preventDefault();

        let data=tabla.DataTable().row($(this).parents("tr")).data();
        var size=tabla.DataTable().rows().count();
        
		
        var confirm = alertify.confirm('¿Está seguro de eliminar la información seleccionada?', '¿Está seguro de eliminar la información seleccionada?', null, null).set('labels', { ok: 'Confirmar', cancel: 'Cancelar' });
        
        confirm.set({ transition: 'slide' });

        confirm.set('onok', function () {

            var paqueteDeDatos = new FormData();

            paqueteDeDatos.append("tipo", tipo);
            paqueteDeDatos.append("idtabla", data[1]);

            $.ajax({

                type: "POST",
                url: "modelosBd/PAID_ADMINISTRADOR/eliminar.md.php",
                contentType: false,
                data: paqueteDeDatos,
                async: false,
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
                    if(size >  1){
                        tabla.DataTable().ajax.reload(); 
                    }else{
                        tabla.DataTable().clear();
                        tabla.DataTable().draw();
                    }
                    

                },
                error: function () {

                }



            });

           

            
        });

        
    });
        
}