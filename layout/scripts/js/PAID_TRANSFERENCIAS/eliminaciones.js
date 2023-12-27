var funcion__eliminar_tabla_informes_paid_infraestructura=function(tbody,classBtn,tabla,tipo,tipoDocumento){

    
    $(tbody).on("click","a."+classBtn,function(e){

        e.preventDefault();

        let data=tabla.DataTable().row($(this).parents("tr")).data();
        var size=tabla.DataTable().rows().count();

        var confirm = alertify.confirm('¿Está seguro de eliminar la información seleccionada?', '¿Está seguro de eliminar la información seleccionada?', null, null).set('labels', { ok: 'Confirmar', cancel: 'Cancelar' });
        
        confirm.set({ transition: 'slide' });

        confirm.set('onok', function () {

            var paqueteDeDatos = new FormData();

            paqueteDeDatos.append("tipo", tipo);
            paqueteDeDatos.append("tipoDocumento", tipoDocumento);
           
            if(tipoDocumento=="Obra"){
                paqueteDeDatos.append("idtabla", data[5]);
            }else{
                paqueteDeDatos.append("idtabla", data[3]);
            }
            paqueteDeDatos.append("documento", data[1]);
            paqueteDeDatos.append('idComponente', $("#JuegosNacionalesIDCOMPONENTE").val());
            paqueteDeDatos.append('idRubro', $("#JuegosNacionalesIDRUBRO").val());

            $.ajax({

                type: "POST",
                url: "modelosBd/PAID_INFRAESTRUCTURA/eliminar.md.php",
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
                        alertify.notify("Registro eliminado correctamente", "success", 5, function () { });

                        
                        

                    }
                    if(size >  1){
                        tabla.DataTable().ajax.reload(); 
                    }else{
                        tabla.DataTable().clear();
                        tabla.DataTable().draw();
                    }

                    AsignarMontoPAIDInfraestructura("obtener_valor_total_paid_infraestructura");

                },
                error: function () {

                }



            });

           

            
        });

        
    });
        
}

