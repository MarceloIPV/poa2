var guardar__incrementos = function(boton, tipo, array) {

    $(boton).click(function(e) {

        var paqueteDeDatos = new FormData();

        let idOrganismo = $(array[0]).val();
        let montoIngresadoModificacion__incrementos = $(array[1]).val();
        let montoTotalIncremento = $(array[2]).val();
        let montoPoaAprobado = $(array[3]).val().replace(/,/g, "");


        if (parseFloat(montoPoaAprobado) > parseFloat(montoTotalIncremento) || parseFloat(montoPoaAprobado) === parseFloat(montoTotalIncremento) || montoIngresadoModificacion__incrementos == 0) {
            alertify.set("notifier", "position", "top-center");
            alertify.notify("El monto Total debe ser mayor al Poa Aprobado y el Incremento mayor a Cero", "error", 5, function() {});

        } else {

            alertify.confirm("¿Está seguro de guardar el Trámite? Recuerde que posterior a esto debera subir el archivo de Notificación firmado", function(result) {
                if (result) {
                    $(boton).attr("type", "submit");
                    $(boton).click();
                    $(boton).hide();
                    $("#loader").show();

                    paqueteDeDatos.append('tipo', tipo);
                    paqueteDeDatos.append('idOrganismo', idOrganismo);
                    paqueteDeDatos.append('montoIngresadoModificacion__incrementos', montoIngresadoModificacion__incrementos);
                    paqueteDeDatos.append('montoTotalIncremento', montoTotalIncremento);


                    $.ajax({

                        type: "POST",
                        url: "modelosBd/incrementosDecrementos/inserta.md.php",
                        contentType: false,
                        data: paqueteDeDatos,
                        processData: false,
                        cache: false,
                        success: function(response) {

                            let elementos = JSON.parse(response);
                            let mensaje = elementos['mensaje'];

                            if (mensaje == 1) {

                                $("#loader").hide();

                                alertify.set("notifier", "position", "top-center");
                                alertify.notify("Registro realizado correctamente", "success", 5, function() {});

                                window.setTimeout(function() {
                                    window.location = "incrementos";
                                }, 3000);

                            }


                        },
                        error: function() {

                        }

                    });




                } else {

                    alertify.set("notifier", "position", "top-center");
                    alertify.notify("Acccion Cancelada", "error", 3, function() {});
                }
            });


        }



    });

};


var guardar__envioNotifica = function(boton, tipo, array) {

    $(boton).click(function(e) {

        if ($("#fileSubidaNotifica").val() == "" || $("#fileSubidaNotifica").val() == " ") {

            alertify.set("notifier", "position", "top-center");
            alertify.notify("Obligatorio cargar el documento de Notificación firmado", "error", 5, function() {});

        } else {

          alertify.confirm(
            `¿Está seguro de enviar la notificacion al Organismo?`,
            function (result) {
              if (result) {
                
                var paqueteDeDatos = new FormData();

                $(boton).hide();

                let idOrganismo = $(array[0]).val();
                let montoIncremento = $(array[2]).val();
                let montoNuevoTecho = $(array[3]).val();

                let tipoTramite = $("#tipoTramite").val();

                paqueteDeDatos.append('tipo', tipo);
                paqueteDeDatos.append('idOrganismo', idOrganismo);
                paqueteDeDatos.append('documentoNotifica', $(array[1])[0].files[0]);
                paqueteDeDatos.append('montoIncremento', montoIncremento);
                paqueteDeDatos.append('montoNuevoTecho', montoNuevoTecho);
                paqueteDeDatos.append('tipoTramite', tipoTramite);

                $.ajax({

                  type: "POST",
                  url: "modelosBd/incrementosDecrementos/inserta.md.php",
                  contentType: false,
                  data: paqueteDeDatos,
                  processData: false,
                  cache: false,
                  success: function(response) {
  
                      let elementos = JSON.parse(response);
                      let mensaje = elementos['mensaje'];
  
                      if (mensaje == 1) {
                          $("#loader").hide();
  
                          alertify.set("notifier", "position", "top-center");
                          alertify.notify("Registro realizado correctamente", "success", 5, function() {});
  
  
                          sweetAlert('Correo Enviado', 'Correo enviado a la Organización', 'success');
  
                          setTimeout(function() {
                              sweetAlert.close();
                              window.location = "incrementos";
                          }, 3000);
                                  
  
                      }
  
  
                  },
                  error: function() {
  
                  }
  
                });
                
              } else {
                alertify.set("notifier", "position", "top-center");
                alertify.notify("Acccion Cancelada", "error", 3, function () {});
              }
            }
          );
            
        }



    });

};

var guardar__decrementos = function(boton, tipo, array) {

    $(boton).click(function(e) {

        var paqueteDeDatos = new FormData();

        let idOrganismo = $(array[0]).val();
        let montoIngresadoModificacion__incrementos = $(array[1]).val();
        let montoTotalIncremento = $(array[2]).val();
        let montoPoaAprobado = $(array[3]).val().replace(/,/g, "");


        if (parseFloat(montoPoaAprobado) < parseFloat(montoTotalIncremento) || parseFloat(montoPoaAprobado) === parseFloat(montoTotalIncremento) || parseFloat(montoTotalIncremento) === 0 || parseFloat(montoTotalIncremento) < 0 || montoIngresadoModificacion__incrementos == 0) {
            alertify.set("notifier", "position", "top-center");
            alertify.notify("El monto Total debe ser menor al Poa Aprobado y mayor a cero ", "error", 5, function() {});

        } else {

            alertify.confirm("¿Está seguro de guardar el Trámite? Recuerde que posterior a esto debera subir el archivo de Notificación firmado", function(result) {
                if (result) {
                    $(boton).attr("type", "submit");
                    $(boton).click();
                    $(boton).hide();
                    $("#loader").show();

                    paqueteDeDatos.append('tipo', tipo);
                    paqueteDeDatos.append('idOrganismo', idOrganismo);
                    paqueteDeDatos.append('montoIngresadoModificacion__incrementos', montoIngresadoModificacion__incrementos);
                    paqueteDeDatos.append('montoTotalIncremento', montoTotalIncremento);


                    $.ajax({

                        type: "POST",
                        url: "modelosBd/incrementosDecrementos/inserta.md.php",
                        contentType: false,
                        data: paqueteDeDatos,
                        processData: false,
                        cache: false,
                        success: function(response) {

                            let elementos = JSON.parse(response);
                            let mensaje = elementos['mensaje'];

                            if (mensaje == 1) {

                                $("#loader").hide();

                                alertify.set("notifier", "position", "top-center");
                                alertify.notify("Registro realizado correctamente", "success", 5, function() {});

                                window.setTimeout(function() {
                                    window.location = "decrementos";
                                }, 5000);

                            }


                        },
                        error: function() {

                        }

                    });




                } else {

                    alertify.set("notifier", "position", "top-center");
                    alertify.notify("Acccion Cancelada", "error", 3, function() {});
                }
            });


        }



    });

};

var guardar__envioNotificaD = function(boton, tipo, array) {

    $(boton).click(function(e) {

        if ($("#fileSubidaNotifica").val() == "" || $("#fileSubidaNotifica").val() == " ") {

            alertify.set("notifier", "position", "top-center");
            alertify.notify("Obligatorio cargar el documento de Notificación firmado", "error", 5, function() {});

        } else {

            var paqueteDeDatos = new FormData();

            $(boton).hide();
            $("#loader").show();

            let idOrganismo = $(array[0]).val();
            let montoIncremento = $(array[2]).val();
            let montoNuevoTecho = $(array[3]).val();

            let tipoTramite = $("#tipoTramite").val();

            paqueteDeDatos.append('tipo', tipo);
            paqueteDeDatos.append('idOrganismo', idOrganismo);
            paqueteDeDatos.append('documentoNotifica', $(array[1])[0].files[0]);
            paqueteDeDatos.append('montoIncremento', montoIncremento);
            paqueteDeDatos.append('montoNuevoTecho', montoNuevoTecho);
            paqueteDeDatos.append('tipoTramite', tipoTramite);


            $.ajax({

                type: "POST",
                url: "modelosBd/incrementosDecrementos/inserta.md.php",
                contentType: false,
                data: paqueteDeDatos,
                processData: false,
                cache: false,
                success: function(response) {

                    let elementos = JSON.parse(response);
                    let mensaje = elementos['mensaje'];

                    if (mensaje == 1) {

                        $("#loader").hide();

                        alertify.set("notifier", "position", "top-center");
                        alertify.notify("Registro realizado correctamente y correo enviado a la Organización", "success", 5, function() {});

                        window.setTimeout(function() {
                            window.location = "decrementos";
                        }, 3000);

                    }


                },
                error: function() {

                }

            });


        }



    });

};

var guardar__incrementos__revisores = function (boton, tipo, array) {
  $(boton).click(function (e) {
    if (
      $("#archivoResolucionP").val() == "" ||
      $("#fechaIncrementoQuipux").val() == "" ||
      $("#archivoResolucionP").val() == " " ||
      $("#fechaIncrementoQuipux").val() == " "
    ) {
      alertify.set("notifier", "position", "top-center");
      alertify.notify(
        "Obligatorio cargar el documento y escoger la fecha de la resolución",
        "error",
        5,
        function () {}
      );
    } else {
      alertify.confirm(
        "¿Está seguro de realizar la Aprobación?",
        function (result) {
          if (result) {
            var paqueteDeDatos = new FormData();

            $(boton).hide();

            // let idOrganismo=$(array[0]).val();
            let idOrganismo = array[0];
            let fechaResolucion = $(array[2]).val();
            let idPreeliminar = array[3];
            let resolucion = $(array[4]).val();
            let valorTecho = $(array[5]).val();
            // let tipoTramite_=$("#tipoTramite_").val();

            //       let tipoTra = "";
            //       if(tipoTramite_ == "incremento"){
            //           tipoTra = "Incremento"
            //       }else{
            //           tipoTra = "Decremento"
            //       }

            // let idIncrementos=$("#idIncrementos").val();

            paqueteDeDatos.append("tipo", tipo);
            paqueteDeDatos.append("idOrganismo", idOrganismo);
            paqueteDeDatos.append("fechaResolucion", fechaResolucion);
            paqueteDeDatos.append("documentoFinal", $(array[1])[0].files[0]);
            paqueteDeDatos.append("tipoTramite", "Incremento");
            paqueteDeDatos.append("idPreeliminar", idPreeliminar);
            paqueteDeDatos.append("resolucion", resolucion);
            paqueteDeDatos.append("valorTecho", valorTecho);

            $.ajax({
              type: "POST",
              url: "modelosBd/incrementosDecrementos/inserta.md.php",
              contentType: false,
              data: paqueteDeDatos,
              processData: false,
              cache: false,
              success: function (response) {
                let elementos = JSON.parse(response);
                let mensaje = elementos["mensaje"];

                if (mensaje == 1) {

                  alertify.set("notifier", "position", "top-center");
                  alertify.notify(
                    "Registro realizado correctamente",
                    "success",
                    5,
                    function () {}
                  );

                  window.setTimeout(function () {
                    window.location = "incrementoRecomendadoCoordinador";
                  }, 3000);
                }
              },
              error: function () {},
            });
          } else {
            alertify.set("notifier", "position", "top-center");
            alertify.notify("Acccion Cancelada", "error", 3, function () {});
          }
        }
      );
    }
  });
};

var rechazar__incremento_Resolucion=function(boton, array){

  $(boton).click(function(e){
    e.preventDefault();


    alertify.confirm(
      "¿Está seguro de rechazar el incremento?",
      function (result) {
        if (result) {
          var paqueteDeDatos = new FormData();

          $(boton).hide();

          let idOrganismo = array[0];
          let idPreeliminar = array[1];
          let tipoTramite ="incremento";
          let tipo = "rechazarIncrementoOrganismo";

          paqueteDeDatos.append("tipo", tipo);
          paqueteDeDatos.append("idOrganismo", idOrganismo);
          paqueteDeDatos.append("idPoaIncremento", idPreeliminar);
          paqueteDeDatos.append("tipoTramite", tipoTramite);

          $.ajax({
            type: "POST",
            url: "modelosBd/incrementosDecrementos/inserta.md.php",
            contentType: false,
            data: paqueteDeDatos,
            processData: false,
            cache: false,
            success: function (response) {
              let elementos = JSON.parse(response);
              let mensaje = elementos["mensaje"];

              if (mensaje == 1) {

                alertify.set("notifier", "position", "top-center");
                alertify.notify(
                  "Rechazo realizado correctamente",
                  "success",
                  5,
                  function () {}
                );

                window.setTimeout(function () {
                  window.location = "incrementoRecomendadoCoordinador";
                }, 3000);
              }
            },
            error: function () {},
          });
        } else {
          alertify.set("notifier", "position", "top-center");
          alertify.notify("Acccion Cancelada", "error", 3, function () {});
        }
      }
    );
  });

}

var eliminarActividades = function (parametro1) {
  $(parametro1).click(function (e) {

    let idActividad = $(this).attr('idActividad');

    var confirm = alertify.confirm(null,`¿Está seguro de eliminar la actividad ${$(this).attr('idActividad')}?`, null, null).set('labels', { ok: 'Confirmar', cancel: 'Cancelar' });

    confirm.set({ transition: 'slide' });

    confirm.set('onok', function () {


        var paqueteDeDatos = new FormData();
    
        let indicador = "eliminar_Actividad_Tabla";

        let idOrganismo = $("#idOrganismoPrincipal").val();
    
        paqueteDeDatos.append("tipo", indicador);
        paqueteDeDatos.append("idActividad", idActividad);
        paqueteDeDatos.append("idOrganismo", idOrganismo);
    
        $.ajax({
          type: "POST",
          url: "modelosBd/incrementosDecrementos/elimina.md.php",
          contentType: false,
          data: paqueteDeDatos,
          processData: false,
          cache: false,
          success: function (response) {
            
            var elementos = JSON.parse(response);
    
            let mensaje=elementos['mensaje'];
    
            if (mensaje == 1) {

                alertify.set("notifier", "position", "top-center");
                alertify.notify(
                    "Registro eliminado correctamente",
                    "success",
                    5,
                    function () {}
                );
    
                window.setTimeout(function () {
                    window.location = "crearInformacionIncremento";
                }, 3000);
            }
    
            
          },
          error: function () {},
        });

    });

    confirm.set('oncancel', function () { //callbak al pulsar botón negativo
      alertify.set("notifier", "position", "top-center");
      alertify.notify("Acción cancelada", "error", 1, function () { });
    });

    
  });
};



var ocultarSeccionesModal = function(parametro1){
    $(parametro1).hide();
}

var envio__incrementos = function (boton, tipo, array) {
    $(boton).click(function (e) {
      alertify.confirm(
        "¿Está seguro de enviar el Trámite?",
        function (result) {
          if (result) {
            var paqueteDeDatos = new FormData();

            let idOrganismo = $(array[0]).val();
            let tipoTramite = $(array[1]).val();

            paqueteDeDatos.append("tipo", tipo);
            paqueteDeDatos.append("tipoTramite", tipoTramite);
            paqueteDeDatos.append("idOrganismo", idOrganismo);

            $.ajax({
              type: "POST",
              url: "modelosBd/incrementosDecrementos/inserta.md.php",
              contentType: false,
              data: paqueteDeDatos,
              processData: false,
              cache: false,
              success: function (response) {
                let elementos = JSON.parse(response);
                let mensaje = elementos["mensaje"];

                if (mensaje == 1) {

                  alertify.set("notifier", "position", "top-center");
                  alertify.notify(
                    "Envío realizado correctamente",
                    "success",
                    5,
                    function () {}
                  );

                  window.setTimeout(function () {
                    window.location = "incrementosOrganismo";
                  }, 3000);
                }
              },
              error: function () {},
            });
          } else {
            alertify.set("notifier", "position", "top-center");
            alertify.notify("Acccion Cancelada", "error", 3, function () {});
          }
        }
      );
    });
};


var reasignacionTramite_Coordinador_Sub = function (boton, array) {
    $(boton).click(function (e) {

        let valorBoton = e.target.id;
        let nombreUsuario;
        let idUsuario;
        let tipoEnvio;
        let idOrganismo = array[0];
        let idPoaIncremento= array[1];
        let identificador = array[2];
        let observacionesT = $(array[3]).val();
        let tipoObservacion;
        let tipo = "reasignar__Coordinadores__Directores";

        if(valorBoton == "reasignarIncremento__a"){
          nombreUsuario = $("#selects__superiores option:selected").text();
          tipoEnvio = "reasignar";
          tipoObservacion ="reasignado";
          idUsuario = $("#selects__superiores").val();
        }else{
          nombreUsuario = $("#selects__superiores__regresar option:selected").text();
          tipoEnvio = "regresar";
          tipoObservacion="regresado";
          idUsuario = $("#selects__superiores__regresar").val();
        }
        
      alertify.confirm(
        `¿Está seguro de ${tipoEnvio} el Trámite a ${nombreUsuario}?`,
        function (result) {
          if (result) {
            var paqueteDeDatos = new FormData();
            
            paqueteDeDatos.append("tipo", tipo);
            paqueteDeDatos.append("idUsuario", idUsuario);
            paqueteDeDatos.append('idPoaIncremento', idPoaIncremento);
            paqueteDeDatos.append("idOrganismo", idOrganismo);
            paqueteDeDatos.append('identificador', identificador);
            paqueteDeDatos.append('observacionesT', observacionesT);
            paqueteDeDatos.append('tipoObservacion', tipoObservacion);

            $.ajax({
              type: "POST",
              url: "modelosBd/incrementosDecrementos/inserta.md.php",
              contentType: false,
              data: paqueteDeDatos,
              processData: false,
              cache: false,
              success: function (response) {
                let elementos = JSON.parse(response);
                let mensaje = elementos["mensaje"];

                if (mensaje == 1) {
                  $("#loader").hide();

                  alertify.set("notifier", "position", "top-center");
                  alertify.notify(
                    "Envío realizado correctamente",
                    "success",
                    5,
                    function () {}
                  );

                  let identificador = $("#identificadorPaginaRevisor").val();

                  if(identificador == "Recomendado"){
                    window.setTimeout(function () {
                      window.location = "incrementosRevisorRecomendado";
                    }, 3000);
                  }else{
                    window.setTimeout(function () {
                      window.location = "incrementosRevisor";
                    }, 3000);
                  }
                 
                }
              },
              error: function () {},
            });
          } else {
            alertify.set("notifier", "position", "top-center");
            alertify.notify("Acccion Cancelada", "error", 3, function () {});
          }
        }
      );
    });
};

var recomendacionTramite_Coordinador_Sub = function (boton, array) {
    $(boton).click(function (e) {
        let nombreReasignación = $("#selects__superiores option:selected").text();
        let idReasignacion = $("#selects__superiores").val();

        let idOrganismo = array[0];
        let idPoaIncremento= array[1];
        let identificador = array[2];
        let observacionesT = $(array[3]).val();
        let tipoObservacion = array[4];
        let tipo = "reasignar__Coordinadores__Directores";

      alertify.confirm(
        `¿Está seguro de reasignar el Trámite a ${nombreReasignación}?`,
        function (result) {
          if (result) {
            var paqueteDeDatos = new FormData();
            
            paqueteDeDatos.append("tipo", tipo);
            paqueteDeDatos.append("idReasignacion", idReasignacion);
            paqueteDeDatos.append('idPoaIncremento', idPoaIncremento);
            paqueteDeDatos.append("idOrganismo", idOrganismo);
            paqueteDeDatos.append('identificador', identificador);
            paqueteDeDatos.append('observacionesT', observacionesT);
            paqueteDeDatos.append('tipoObservacion', tipoObservacion);

            $.ajax({
              type: "POST",
              url: "modelosBd/incrementosDecrementos/inserta.md.php",
              contentType: false,
              data: paqueteDeDatos,
              processData: false,
              cache: false,
              success: function (response) {
                let elementos = JSON.parse(response);
                let mensaje = elementos["mensaje"];

                if (mensaje == 1) {
                  $("#loader").hide();

                  alertify.set("notifier", "position", "top-center");
                  alertify.notify(
                    "Envío realizado correctamente",
                    "success",
                    5,
                    function () {}
                  );

                  window.setTimeout(function () {
                    window.location = "incrementosRevisor";
                  }, 3000);
                }
              },
              error: function () {},
            });
          } else {
            alertify.set("notifier", "position", "top-center");
            alertify.notify("Acccion Cancelada", "error", 3, function () {});
          }
        }
      );
    });
};


var envioInformeFuncionarios =  function (boton,array){
    $(boton).click(function(e) {

        var paqueteDeDatos = new FormData();

        let idOrganismo = array[0];
        let idPoaIncremento= array[1];
        let identificador = array[3];
        let observacionesT = $(array[4]).val();
        let tipoObservacion = array[5];
        let tipo = "guardarInformeAnalistas";
        let observaAnalista ="";
        if(array[6] == "observaciones"){
          observaAnalista = "si";
        }else{
          observaAnalista = "no";
        }
        

        if ($("#informeAnalista").val() == "" || $("#informeAnalista").val() == " ") {

            alertify.set("notifier", "position", "top-center");
            alertify.notify("Obligatorio cargar el  informe firmado", "error", 5, function() {});

        } else {

            alertify.confirm("¿Está seguro de enviar el Informe?", function(result) {
                if (result) {
                    

                    paqueteDeDatos.append('tipo', tipo);
                    paqueteDeDatos.append('idOrganismo', idOrganismo);
                    paqueteDeDatos.append('idPoaIncremento', idPoaIncremento);
                    paqueteDeDatos.append('documento', $(array[2])[0].files[0]);
                    paqueteDeDatos.append('identificador', identificador);
                    paqueteDeDatos.append('observacionesT', observacionesT);
                    paqueteDeDatos.append('tipoObservacion', tipoObservacion);
                    paqueteDeDatos.append('estadoObservacion', observaAnalista);


                    $.ajax({

                        type: "POST",
                        url: "modelosBd/incrementosDecrementos/inserta.md.php",
                        contentType: false,
                        data: paqueteDeDatos,
                        processData: false,
                        cache: false,
                        success: function(response) {

                            let elementos = JSON.parse(response);
                            let mensaje = elementos['mensaje'];

                            if (mensaje == 1) {

                                $("#loader").hide();

                                alertify.set("notifier", "position", "top-center");
                                alertify.notify("Registro realizado correctamente", "success", 5, function() {});

                                let paginaIdentificador = $("#identificadorPaginaRevisor").val();

                                if(paginaIdentificador == "Reasignado"){
                                  window.setTimeout(function() {
                                    window.location = "incrementosRevisor";
                                  }, 3000);
                                }else if(paginaIdentificador == "Recomendado"){
                                  window.setTimeout(function() {
                                    window.location = "incrementosRevisorRecomendado";
                                  }, 3000);
                                }
                                

                            }


                        },
                        error: function() {

                        }

                    });




                } else {

                    alertify.set("notifier", "position", "top-center");
                    alertify.notify("Acccion Cancelada", "error", 3, function() {});
                }
            });


        }



    });
}


var quitarBotonEnvio = function(boton){
    var estadoDecremento = $("#estadoEnvioTramites").val();
    var estadoIncremento = $("#estadoEnvioTramitesI").val();

    if (estadoDecremento === "" && estadoIncremento === "") {
        $(boton).show();
    } else {
        $(boton).hide();
    }
}


var activar_boton_envioTramite = function (parametro1){

    let botonEnvio = $("#MontoPorAsignar__Incremento").val();
    if(parseFloat(botonEnvio) == 0){
      $(parametro1).removeAttr("disabled");
    }
  }
  
  var bloquear_Guardar_Tramites = function(parametro1){
    let estadoTramite = $("#estadoEnvioTramites").val();
    let estadoEdicion = $("#estadoEdicionObservacion").val();
    
    if(estadoTramite != ""){
      $(parametro1).prop("disabled",true);
    }
    
    if(estadoEdicion != ""){
      $(parametro1).prop("disabled",false);
    }
  }

  var verificar__Pdf__Tamanio = function(parametro1){
    $(parametro1).change(function() {
  
      var file = this.files[0];
  
      if (file) {
          if (file.type === "application/pdf") {
              var maxSize = 2 * 1024 * 1024; 
  
              if (file.size <= maxSize) {
                  
              } else {
                  alertify.set("notifier", "position", "top-center");
                              alertify.notify("El tamaño maximo es de 2MB", "error", 5, function() {});
  
                  $(this).val('');
              }
          } else {
              alertify.set("notifier", "position", "top-center");
              alertify.notify("Solo puede subir archivos Pdf", "error", 5, function() {});
              $(this).val('');
          }
      }
  
    });
  }


  var seccion_Observaciones_Reasignaciones = function(idOrganismo,tipoE){

    var paqueteDeDatos = new FormData();

    var tipo = "observacionesReasignaciones";

    paqueteDeDatos.append("tipo",tipo);

    paqueteDeDatos.append("idOrganismo",idOrganismo);
    paqueteDeDatos.append("tipoE",tipoE);

    $.ajax({
        type: "POST",
        url: "modelosBd/incrementosDecrementos/selecciona.md.php",
        contentType: false,
        data: paqueteDeDatos,
        processData: false,
        cache: false,
        success: function (response) {
          let elementos = JSON.parse(response);
          let data = elementos["obtenerInformacion"];

          if(data != ""){
            $("#contenedorCalificacion").append(`<div class='col col-12 text-center' style='font-weight:bold !important;'>Sección de Observaciones:</div> <br>
            <div class="row justify-content-center" id='contenedorObservacion'></div>`);
          }

          for(x of data){

            if(x.observacionesTecnicas != ""){
                $("#contenedorObservacion").append(`<div class="col-12 d-flex">
                <div class="col-5">
                  <p>Observacion realizada por: ${x.nombre}</p>
                </div>
                &nbsp;&nbsp;&nbsp;
                <div class="col-7" style="border: 1px solid black;">
                  <p>${x.observacionesTecnicas}</p>
                </div>
              </div>&nbsp;`)
            }
          }
          
        },
        error: function () {},
      });
  }

  var verOcultar = function(boton){
    $(boton).click(function(e) {
        e.preventDefault();
        $(".elementosCreados__I").toggle();
      });
  }


  var agregar__Valores__Poa_Incrementos = function (boton,idOrg,fisicamente,rol,idIn) {
    $(boton).click(function (e) {
      e.preventDefault();

      let paqueteDeDatos = new FormData();

      let idOrganismo = idOrg;

      let idIncremento = idIn;

      let fisicamenteE = fisicamente;

      let idRolAd = rol;

      let nombreArchivo = idOrg+"__"+"poa"+"__"+"Incrementos";

      let nombreArchivo2 = idOrg+"__"+"poa"+"__"+"indicadores"+"__"+"Incrementos";

      paqueteDeDatos.append("tipo", "informacionPoaIncrementos");

      paqueteDeDatos.append("idOrganismo", idOrganismo);

      paqueteDeDatos.append("fisicamenteE", fisicamenteE);

      paqueteDeDatos.append("idRolAd", idRolAd);

      paqueteDeDatos.append("idRolAd", idIncremento);

      $.ajax({
        type: "POST",
        url: "modelosBd/incrementosDecrementos/selecciona.md.php",
        contentType: false,
        data: paqueteDeDatos,
        processData: false,
        cache: false,
        success: function (response) {
          $.getScript("layout/scripts/js/validaGlobal.js", function () {
            var elementos = JSON.parse(response);
            var obtenerInformacion = elementos["obtenerInformacion"];
            var obtenerAcCa = elementos["obtenerAcCa"];
            var indicadorInformacion = elementos["indicadorInformacion"];

            var obtenerAnexos = elementos["obtenerAnexos"];

            $(".contenedor__poaMatrizA").html(" ");

            $(".elementosCreados__I").remove();

            $(".creados__letter").remove();

            $(".contenedor__poaMatrizA").append(
                `<div class="col col-12 text-center sumado__indicadores" style="font-size:1em!important; font-weight:bold;">POA APROBADO + INCREMENTOS</div>`
            );

            if(obtenerAcCa != ""){
                $(".contenedor__poaMatrizA").append(
                    `
                    <div class='col col-12 text-center' style='padding-top:0.5em!important;padding-bottom:1em;font-weight:bold;'>

					<button class='btn btn-danger ver_Poa_Act'>VER&nbsp;&nbsp;<i class="fas fa-eye icono__boton" style="color:white!important;"></i></button>

					</div>`
                );
            
                $(".contenedor__poaMatrizA").append(
                    '<button type="button" class="btn btn-success excelProyectos col col-1 elementosCreados__I"><i class="fas fa-file-excel"></i>&nbsp;&nbsp;EXCEL</button><table class="tabla__itemsM elementosCreados__I" style="margin-top:2em;" id="tablaPoaPrincipal"><thead><tr><th align="center" style="widht:50%!important;">Actividad</th><th align="center">Item</th><th align="center">Enero</th><th align="center">Febrero</th><th align="center">Marzo</th><th align="center">Abril</th><th align="center">Mayo</th><th align="center">Junio</th><th align="center">Julio</th><th align="center">Agosto</th><th align="center">Septiembre</th><th align="center">Octubre</th><th align="center">Noviembre</th><th align="center">Diciembre</th><th align="center">Total</th></tr></thead></table><br>'
                );
            
                $(".elementosCreados__I").hide();

                for (c of obtenerInformacion) {
                    $(".tabla__itemsM").append(
                      "<tr><td>" +
                        c.idActividades +
                        "-" +
                        c.nombreActividades +
                        "</td><td>" +
                        c.itemPreesupuestario +
                        "-" +
                        c.nombreItem +
                        "</td><td><center>" +
                        parseFloat(c.enero).toFixed(2) +
                        "</center></td><td><center>" +
                        parseFloat(c.febrero).toFixed(2) +
                        "</center></td><td><center>" +
                        parseFloat(c.marzo).toFixed(2) +
                        "</center></td><td><center>" +
                        parseFloat(c.abril).toFixed(2) +
                        "</center></td><td><center>" +
                        parseFloat(c.mayo).toFixed(2) +
                        "</center></td><td><center>" +
                        parseFloat(c.junio).toFixed(2) +
                        "</center></td><td><center>" +
                        parseFloat(c.julio).toFixed(2) +
                        "</center></td><td><center>" +
                        parseFloat(c.agosto).toFixed(2) +
                        "</center></td><td><center>" +
                        parseFloat(c.septiembre).toFixed(2) +
                        "</center></td><td><center>" +
                        parseFloat(c.octubre).toFixed(2) +
                        "</center></td><td><center>" +
                        parseFloat(c.noviembre).toFixed(2) +
                        "</center></td><td><center>" +
                        parseFloat(c.diciembre).toFixed(2) +
                        "</center></td><td><center>" +
                        parseFloat(c.totalSumaItem).toFixed(2) +
                        "</center></td></tr>"
                    );
                }

                execelGenerados($(".excelProyectos"), "tablaPoaPrincipal", nombreArchivo);

                verOcultar($(".ver_Poa_Act"));

                $(".contenedor__poaMatrizA").append(`
                <div class='col col-12' style='font-weight:bold!important'><center>INDICADORES</center></div>`);

                $(".contenedor__poaMatrizA").append(`
                <button type="button" class="btn btn-success excelProyectos col col-1"><i class="fas fa-file-excel"></i>&nbsp;&nbsp;EXCEL</button>
                <table class="indicadores__Poa" style="margin-top:2em;" id="tablaindicadores_Poa"><thead><tr><th align="center">Actividad - indicador</th><th align="center">Primer trimestre</th><th align="center">Segundo Trimestre</th><th align="center">Tercer trimestre</th><th align="center">Cuarto trimestre</th><th align="center">Meta indicador</th></tr></thead></table>`);

                for (z of indicadorInformacion) {
                    $(".indicadores__Poa").append(

                        "<tr><td>" +
                        z.indicador +
                        "</td><td><center>" +
                        z.primertrimestre +
                        "</center></td><td><center>" +
                        z.segundotrimestre +
                        "</center></td><td><center>" +
                        z.tercertrimestre +
                        "</center></td><td><center>" +
                        z.cuartotrimestre +
                        "</center></td><td><center>" +
                        z.metaindicador +
                        "</center></td></tr>"
                    );
                }

                execelGenerados($(".excelProyectos"), "tablaindicadores_Poa", nombreArchivo2);

                $(".contenedor__poaMatrizA").append(`<div class="container-fluid"><div class="row"><div class="col-md-9 contenedor_Actividades"></div><div class="col-md-3 contendor_Anexos"></div></div></div>`);

                if(obtenerAnexos != ""){
                     
                    $(".contendor_Anexos").append(`<div class="col col-12 text-center" style="font-size:14px; font-weight:bold;" id="rotulo__ac">ANEXOS</div><br>`);

                    var ul = $("<ul></ul>");

                    for(a of obtenerAnexos){
                        
                        var variable = $("#filesFrontend").val();
                        ul.append($("<li></li>").append(`<a href="${variable}anexosPoa/${a.nombreAnexo}" target="_blank">
                        ${a.nombreAnexo}
                        </a>`));
                        
                        $(".contendor_Anexos").append(ul);     
                    }
                }

                if(obtenerAcCa != ""){
                    $(".contenedor_Actividades").append(`<div class="col col-12 text-center" style="font-size:14px; font-weight:bold;" id="rotulo__ac">ACTIVIDADES A ANALIZAR</div><br>`);

                    $(".contenedor_Actividades").append(`
                    <table class="actividades__Poa" id="tablaActividades"><thead><tr><th align="center" style="width:40%!important;">Actividad</th><th align="center" style="width:20%!important;">Ver</th><th align="center" style="width:40%!important;">Matrices</th></tr></thead></table>`);

                    for (d of obtenerAcCa) {
                        if (!$(".ver__matrices" + d.idActividades).length > 0) {
                          $(".actividades__Poa").append(`
                              <tr><td>
                              ${d.idActividades}-
                              ${d.nombreActividades}
                              </td><td><center><button class="ver__matrices${d.idActividades} btn btn-primary" attr="
                              ${d.idActividades}" style="cursor:pointer;"><i class="fas fa-eye icono__${d.idActividades}" style="color:white!important;"></i></button></center></td><td class='matrices__${d.idActividades}' align="center"></td></tr>"
                          `);
        
                          verOjoAjaxMatrices(
                            $(".ver__matrices" + d.idActividades),
                            $(".icono__" + d.idActividades),
                            $(".matrices__" + d.idActividades),
                            d.idActividades,
                            d.idOrganismo,
                            $("#idRolAd").val(),
                            $("#fisicamenteE").val()
                          );
                        }
                    }
                }
                
            }
          });
        },
        error: function () {},
      });
      
    });
  };

  var agregar__Valores__Poa_Aprobado = function (boton,idOrg,fisicamente,rol,idIn) {
    $(boton).click(function (e) {
      e.preventDefault();

      let paqueteDeDatos = new FormData();

      let idOrganismo = idOrg;

      let idIncremento = idIn;

      let fisicamenteE = fisicamente;

      let idRolAd = rol;

      let nombreArchivo = idOrg+"__"+"poa";

      let nombreArchivo2 = idOrg+"__"+"poa"+"__"+"indicadores";

      paqueteDeDatos.append("tipo", "informacionPoaAprobado");

      paqueteDeDatos.append("idOrganismo", idOrganismo);

      paqueteDeDatos.append("fisicamenteE", fisicamenteE);

      paqueteDeDatos.append("idRolAd", idRolAd);

      paqueteDeDatos.append("idRolAd", idIncremento);

      $.ajax({
        type: "POST",
        url: "modelosBd/incrementosDecrementos/selecciona.md.php",
        contentType: false,
        data: paqueteDeDatos,
        processData: false,
        cache: false,
        success: function (response) {
          $.getScript("layout/scripts/js/validaGlobal.js", function () {
            var elementos = JSON.parse(response);
            var obtenerInformacion = elementos["obtenerInformacion"];
            var obtenerAcCa = elementos["obtenerAcCa"];
            var indicadorInformacion = elementos["indicadorInformacion"];

            var obtenerAnexos = elementos["obtenerAnexos"];

            $(".contenedor__poaMatrizA").html(" ");

            $(".elementosCreados__I").remove();

            $(".creados__letter").remove();

            $(".contenedor__poaMatrizA").append(
                `<div class="col col-12 text-center sumado__indicadores" style="font-size:1em!important; font-weight:bold;">POA APROBADO</div>`
            );

            if(obtenerAcCa != ""){
                $(".contenedor__poaMatrizA").append(
                    `
                    <div class='col col-12 text-center' style='padding-top:0.5em!important;padding-bottom:1em;font-weight:bold;'>

					<button class='btn btn-danger ver_Poa_Act'>VER&nbsp;&nbsp;<i class="fas fa-eye icono__boton" style="color:white!important;"></i></button>

					</div>`
                );
            
                $(".contenedor__poaMatrizA").append(
                    '<button type="button" class="btn btn-success excelProyectos col col-1 elementosCreados__I"><i class="fas fa-file-excel"></i>&nbsp;&nbsp;EXCEL</button><table class="tabla__itemsM elementosCreados__I" style="margin-top:2em;" id="tablaPoaPrincipal"><thead><tr><th align="center" style="widht:50%!important;">Actividad</th><th align="center">Item</th><th align="center">Enero</th><th align="center">Febrero</th><th align="center">Marzo</th><th align="center">Abril</th><th align="center">Mayo</th><th align="center">Junio</th><th align="center">Julio</th><th align="center">Agosto</th><th align="center">Septiembre</th><th align="center">Octubre</th><th align="center">Noviembre</th><th align="center">Diciembre</th><th align="center">Total</th></tr></thead></table><br>'
                );
            
                $(".elementosCreados__I").hide();

                for (c of obtenerInformacion) {
                    $(".tabla__itemsM").append(
                      "<tr><td>" +
                        c.idActividades +
                        "-" +
                        c.nombreActividades +
                        "</td><td>" +
                        c.itemPreesupuestario +
                        "-" +
                        c.nombreItem +
                        "</td><td><center>" +
                        parseFloat(c.enero).toFixed(2) +
                        "</center></td><td><center>" +
                        parseFloat(c.febrero).toFixed(2) +
                        "</center></td><td><center>" +
                        parseFloat(c.marzo).toFixed(2) +
                        "</center></td><td><center>" +
                        parseFloat(c.abril).toFixed(2) +
                        "</center></td><td><center>" +
                        parseFloat(c.mayo).toFixed(2) +
                        "</center></td><td><center>" +
                        parseFloat(c.junio).toFixed(2) +
                        "</center></td><td><center>" +
                        parseFloat(c.julio).toFixed(2) +
                        "</center></td><td><center>" +
                        parseFloat(c.agosto).toFixed(2) +
                        "</center></td><td><center>" +
                        parseFloat(c.septiembre).toFixed(2) +
                        "</center></td><td><center>" +
                        parseFloat(c.octubre).toFixed(2) +
                        "</center></td><td><center>" +
                        parseFloat(c.noviembre).toFixed(2) +
                        "</center></td><td><center>" +
                        parseFloat(c.diciembre).toFixed(2) +
                        "</center></td><td><center>" +
                        parseFloat(c.totalSumaItem).toFixed(2) +
                        "</center></td></tr>"
                    );
                }

                execelGenerados($(".excelProyectos"), "tablaPoaPrincipal", nombreArchivo);

                verOcultar($(".ver_Poa_Act"));

                $(".contenedor__poaMatrizA").append(`
                <div class='col col-12' style='font-weight:bold!important'><center>INDICADORES</center></div>`);

                $(".contenedor__poaMatrizA").append(`
                <button type="button" class="btn btn-success excelProyectos col col-1"><i class="fas fa-file-excel"></i>&nbsp;&nbsp;EXCEL</button>
                <table class="indicadores__Poa" style="margin-top:2em;" id="tablaindicadores_Poa"><thead><tr><th align="center">Actividad - indicador</th><th align="center">Primer trimestre</th><th align="center">Segundo Trimestre</th><th align="center">Tercer trimestre</th><th align="center">Cuarto trimestre</th><th align="center">Meta indicador</th></tr></thead></table>`);

                for (z of indicadorInformacion) {
                    $(".indicadores__Poa").append(

                        "<tr><td>" +
                        z.indicador +
                        "</td><td><center>" +
                        z.primertrimestre +
                        "</center></td><td><center>" +
                        z.segundotrimestre +
                        "</center></td><td><center>" +
                        z.tercertrimestre +
                        "</center></td><td><center>" +
                        z.cuartotrimestre +
                        "</center></td><td><center>" +
                        z.metaindicador +
                        "</center></td></tr>"
                    );
                }

                execelGenerados($(".excelProyectos"), "tablaindicadores_Poa", nombreArchivo2);

                $(".contenedor__poaMatrizA").append(`<div class="container-fluid"><div class="row"><div class="col-md-9 contenedor_Actividades"></div><div class="col-md-3 contendor_Anexos"></div></div></div>`);

                // if(obtenerAnexos != ""){
                     
                //     $(".contendor_Anexos").append(`<div class="col col-12 text-center" style="font-size:14px; font-weight:bold;" id="rotulo__ac">ANEXOS</div><br>`);

                //     var ul = $("<ul></ul>");

                //     for(a of obtenerAnexos){
                        
                //         var variable = $("#filesFrontend").val();
                //         ul.append($("<li></li>").append(`<a href="${variable}anexosPoa/${a.nombreAnexo}" target="_blank">
                //         ${a.nombreAnexo}
                //         </a>`));
                        
                //         $(".contendor_Anexos").append(ul);     
                //     }
                // }

                if(obtenerAcCa != ""){
                    $(".contenedor_Actividades").append(`<div class="col col-12 text-center" style="font-size:14px; font-weight:bold;" id="rotulo__ac">ACTIVIDADES A ANALIZAR</div><br>`);

                    $(".contenedor_Actividades").append(`
                    <table class="actividades__Poa" id="tablaActividades"><thead><tr><th align="center" style="width:40%!important;">Actividad</th><th align="center" style="width:20%!important;">Ver</th><th align="center" style="width:40%!important;">Matrices</th></tr></thead></table>`);

                    for (d of obtenerAcCa) {
                        if (!$(".ver__matrices" + d.idActividades).length > 0) {
                          $(".actividades__Poa").append(`
                              <tr><td>
                              ${d.idActividades}-
                              ${d.nombreActividades}
                              </td><td><center><button class="ver__matrices${d.idActividades} btn btn-primary" attr="
                              ${d.idActividades}" style="cursor:pointer;"><i class="fas fa-eye icono__${d.idActividades}" style="color:white!important;"></i></button></center></td><td class='matrices__${d.idActividades}' align="center"></td></tr>"
                          `);
        
                          verOjoAjaxMatrices(
                            $(".ver__matrices" + d.idActividades),
                            $(".icono__" + d.idActividades),
                            $(".matrices__" + d.idActividades),
                            d.idActividades,
                            d.idOrganismo,
                            $("#idRolAd").val(),
                            $("#fisicamenteE").val()
                          );
                        }
                    }
                }
                
            }
          });
        },
        error: function () {},
      });
      
    });
  };

  var verificaExistenciaArchivo = function(idOrg,idIn,fisicamente){

    let paqueteDeDatos = new FormData();

      let idOrganismo = idOrg;

      let idIncremento = idIn;

      paqueteDeDatos.append("tipo", "verificaInformes_Areas");

      paqueteDeDatos.append("idOrganismo", idOrganismo);

      paqueteDeDatos.append("idPoaIncremento", idIncremento);

    $.ajax({
        type: "POST",
        url: "modelosBd/incrementosDecrementos/selecciona.md.php",
        contentType: false,
        data: paqueteDeDatos,
        processData: false,
        cache: false,
        success: function (response) {
          $.getScript("layout/scripts/js/validaGlobal.js", function () {
            var elementos = JSON.parse(response);
            var informe = elementos["informe"];

            $(".contenedorArchivos").html(" ");

            var rutaArchivo = "incrementosDecrementos/informeViabilidad/";
            var rutaEspecifica = "";

            for(m of informe){

                if($(fisicamente).val() == "5" ||
                $(fisicamente).val() == 5 || $(fisicamente).val() == "2" ||
                $(fisicamente).val() == 2){
                    if(m.documentoAdministrativo !== "" && m.documentoAdministrativo !== null){

                        rutaEspecifica = rutaArchivo+"administrativo/";
                        
                        var variable = $("#filesFrontend").val();
                        $(".contenedorArchivos").append(`<br><br><div class='col col-12' align="center"><a download='${m.documentoAdministrativo}' href="${variable}${rutaEspecifica}${m.documentoAdministrativo}" target="_blank" class='btn btn-warning' style="color:white!important;"><i class="fa fa-download" aria-hidden="true" style="color:white!important;"></i>&nbsp;&nbsp;Descargar el Informe Tecnico</a></div>`);
                            
                    }
                }

                if($(fisicamente).val() == "14" ||
                $(fisicamente).val() == 14 || $(fisicamente).val() == "24" ||
                $(fisicamente).val() == 24 || $(fisicamente).val() == "12" ||
                $(fisicamente).val() == 12){
                    if(m.documentoAlto !== "" &&  m.documentoAlto !== null){

                        rutaEspecifica = rutaArchivo+"altoRendimiento/";
                        
                        var variable = $("#filesFrontend").val();
                        $(".contenedorArchivos").append(`<br><br><div class='col col-12' align="center"><a download='${m.documentoAlto}' href="${variable}${rutaEspecifica}${m.documentoAlto}" target="_blank" class='btn btn-warning' style="color:white!important;"><i class="fa fa-download" aria-hidden="true" style="color:white!important;"></i>&nbsp;&nbsp;Descargar el Informe Tecnico</a></div>`);
                            
                     }
                }

                if($(fisicamente).val() == "1" ||
                $(fisicamente).val() == 1){
                    if(m.documentoInstalaciones !== null && m.documentoInstalaciones !== ""){

                        console.log(m.documentoInstalaciones);
                        rutaEspecifica = rutaArchivo+"instalaciones/";
                        
                        var variable = $("#filesFrontend").val();
                        $(".contenedorArchivos").append(`<br><br><div class='col col-12' align="center"><a download='${m.documentoInstalaciones}' href="${variable}${rutaEspecifica}${m.documentoInstalaciones}" target="_blank" class='btn btn-warning' style="color:white!important;"><i class="fa fa-download" aria-hidden="true" style="color:white!important;"></i>&nbsp;&nbsp;Descargar el Informe Tecnico Instalaciones</a></div>`);
                            
                     }


                     if(m.documentoInfraestructura !== "" && m.documentoInfraestructura !== null){

                        rutaEspecifica = rutaArchivo+"infraestructura/";
                        
                        var variable = $("#filesFrontend").val();
                        $(".contenedorArchivos").append(`<br><br><div class='col col-12' align="center"><a download='${m.documentoInfraestructura}' href="${variable}${rutaEspecifica}${m.documentoInfraestructura}" target="_blank" class='btn btn-primary' style="color:white!important;"><i class="fa fa-download" aria-hidden="true" style="color:white!important;"></i>&nbsp;&nbsp;Descargar el Informe Tecnico Infraestructura</a></div>`);
                            
                     }
                }

                if($(fisicamente).val() == "6" ||
                $(fisicamente).val() == 6){
                    if(m.documentoInstalaciones !== "" && m.documentoInstalaciones !== null){

                        rutaEspecifica = rutaArchivo+"instalaciones/";
                        
                        var variable = $("#filesFrontend").val();
                        $(".contenedorArchivos").append(`<br><br><div class='col col-12' align="center"><a download='${m.documentoInstalaciones}' href="${variable}${rutaEspecifica}${m.documentoInstalaciones}" target="_blank" class='btn btn-warning' style="color:white!important;"><i class="fa fa-download" aria-hidden="true" style="color:white!important;"></i>&nbsp;&nbsp;Descargar el Informe Tecnico Instalaciones</a></div>`);
                            
                     }
                }

                if($(fisicamente).val() == "15" ||
                $(fisicamente).val() == 15){
                    if(m.documentoInfraestructura !== "" && m.documentoInfraestructura !== null){

                        rutaEspecifica = rutaArchivo+"infraestructura/";
                        
                        var variable = $("#filesFrontend").val();
                        $(".contenedorArchivos").append(`<br><br><div class='col col-12' align="center"><a download='${m.documentoInfraestructura}' href="${variable}${rutaEspecifica}${m.documentoInfraestructura}" target="_blank" class='btn btn-warning' style="color:white!important;"><i class="fa fa-download" aria-hidden="true" style="color:white!important;"></i>&nbsp;&nbsp;Descargar el Informe Tecnico Infraestructura</a></div>`);
                            
                     }
                }
                
                if($(fisicamente).val() == "3" ||
                $(fisicamente).val() == 3 || $(fisicamente).val() == "18" ||
                $(fisicamente).val() == 18){
                    if(m.documentoPlanificacion !== "" && m.documentoPlanificacion !== null){

                        rutaEspecifica = rutaArchivo+"planificacion/";
                        
                        var variable = $("#filesFrontend").val();
                        $(".contenedorArchivos").append(`<br><br><div class='col col-12' align="center"><a download='${m.documentoPlanificacion}' href="${variable}${rutaEspecifica}${m.documentoPlanificacion}" target="_blank" class='btn btn-warning' style="color:white!important;"><i class="fa fa-download" aria-hidden="true" style="color:white!important;"></i>&nbsp;&nbsp;Descargar el Informe Tecnico</a></div>`);
                            
                     }
                }

                if($(fisicamente).val() == "26" ||
                $(fisicamente).val() == 26 || $(fisicamente).val() == "19" ||
                $(fisicamente).val() == 19 || $(fisicamente).val() == "13" ||
                $(fisicamente).val() == 13){
                    if(m.documentoDesarrollo !== "" && m.documentoDesarrollo !== null){

                        rutaEspecifica = rutaArchivo+"desarrollo/";
                        
                        var variable = $("#filesFrontend").val();
                        $(".contenedorArchivos").append(`<br><br><div class='col col-12' align="center"><a download='${m.documentoDesarrollo}' href="${variable}${rutaEspecifica}${m.documentoDesarrollo}" target="_blank" class='btn btn-warning' style="color:white!important;"><i class="fa fa-download" aria-hidden="true" style="color:white!important;"></i>&nbsp;&nbsp;Descargar el Informe Tecnico</a></div>`);
                            
                     }
                }
            }
            
          });
        },
        error: function () {},
      });
  }

  var verificaExistenciaArchivoCoordinacionP = function(idOrg,idIn){

    let paqueteDeDatos = new FormData();

      let idOrganismo = idOrg;

      let idIncremento = idIn;

      paqueteDeDatos.append("tipo", "verificaInformes_Areas");

      paqueteDeDatos.append("idOrganismo", idOrganismo);

      paqueteDeDatos.append("idPoaIncremento", idIncremento);

    $.ajax({
        type: "POST",
        url: "modelosBd/incrementosDecrementos/selecciona.md.php",
        contentType: false,
        data: paqueteDeDatos,
        processData: false,
        cache: false,
        success: function (response) {
          $.getScript("layout/scripts/js/validaGlobal.js", function () {
            var elementos = JSON.parse(response);
            var informe = elementos["informe"];

            $(".contenedorArchivos").html(" ");

            var rutaArchivo = "incrementosDecrementos/informeViabilidad/";
            var rutaEspecifica = "";

            for(m of informe){

                if(m.documentoAdministrativo !== "" && m.documentoAdministrativo !== null){

                    rutaEspecifica = rutaArchivo+"administrativo/";
                    
                    var variable = $("#filesFrontend").val();
                    $(".contenedorArchivos").append(`<br><div class='col col-12' align="center"><a download='${m.documentoAdministrativo}' href="${variable}${rutaEspecifica}${m.documentoAdministrativo}" target="_blank" class='btn btn-danger' style="color:white!important;"><i class="fa fa-download" aria-hidden="true" style="color:white!important;"></i>&nbsp;&nbsp;Descargar el Informe Financiero</a></div>`);
                        
                }

                if(m.documentoAlto !== "" &&  m.documentoAlto !== null){

                    rutaEspecifica = rutaArchivo+"altoRendimiento/";
                    
                    var variable = $("#filesFrontend").val();
                    $(".contenedorArchivos").append(`<br><div class='col col-12' align="center"><a download='${m.documentoAlto}' href="${variable}${rutaEspecifica}${m.documentoAlto}" target="_blank" class='btn btn-success' style="color:white!important;"><i class="fa fa-download" aria-hidden="true" style="color:white!important;"></i>&nbsp;&nbsp;Descargar el Informe Alto rendimiento</a></div>`);
                        
                 }

                 if(m.documentoInstalaciones !== null && m.documentoInstalaciones !== ""){

                    console.log(m.documentoInstalaciones);
                    rutaEspecifica = rutaArchivo+"instalaciones/";
                    
                    var variable = $("#filesFrontend").val();
                    $(".contenedorArchivos").append(`<br><div class='col col-12' align="center"><a download='${m.documentoInstalaciones}' href="${variable}${rutaEspecifica}${m.documentoInstalaciones}" target="_blank" class='btn btn-info' style="color:white!important;"><i class="fa fa-download" aria-hidden="true" style="color:white!important;"></i>&nbsp;&nbsp;Descargar el Informe Instalaciones</a></div>`);
                        
                 }

                 if(m.documentoInfraestructura !== "" && m.documentoInfraestructura !== null){

                    rutaEspecifica = rutaArchivo+"infraestructura/";
                    
                    var variable = $("#filesFrontend").val();
                    $(".contenedorArchivos").append(`<br><div class='col col-12' align="center"><a download='${m.documentoInfraestructura}' href="${variable}${rutaEspecifica}${m.documentoInfraestructura}" target="_blank" class='btn btn-primary' style="color:white!important;"><i class="fa fa-download" aria-hidden="true" style="color:white!important;"></i>&nbsp;&nbsp;Descargar el Informe Infraestructura</a></div>`);
                        
                 }

                
                 if(m.documentoPlanificacion !== "" && m.documentoPlanificacion !== null){

                    rutaEspecifica = rutaArchivo+"planificacion/";
                    
                    var variable = $("#filesFrontend").val();
                    $(".contenedorArchivos").append(`<br><div class='col col-12' align="center"><a download='${m.documentoPlanificacion}' href="${variable}${rutaEspecifica}${m.documentoPlanificacion}" target="_blank" class='btn btn-warning' style="color:white!important;"><i class="fa fa-download" aria-hidden="true" style="color:white!important;"></i>&nbsp;&nbsp;Descargar el Informe Planificacion</a></div>`);
                        
                 }

                 if(m.documentoDesarrollo !== "" && m.documentoDesarrollo !== null){

                    rutaEspecifica = rutaArchivo+"desarrollo/";
                    
                    var variable = $("#filesFrontend").val();
                    $(".contenedorArchivos").append(`<br><div class='col col-12' align="center"><a download='${m.documentoDesarrollo}' href="${variable}${rutaEspecifica}${m.documentoDesarrollo}" target="_blank" class='btn btn-danger' style="color:white!important;"><i class="fa fa-download" aria-hidden="true" style="color:white!important;"></i>&nbsp;&nbsp;Descargar el Informe Desarrollo</a></div>`);
                        
                 }
            }
            
          });
        },
        error: function () {},
      });
  }

  var variableSessionOrganismo = function(idOrganismo){
    let paqueteDeDatos = new FormData();

      paqueteDeDatos.append("tipo", "valorVariableSesion");

      paqueteDeDatos.append("idOrganismo", idOrganismo);


      $.ajax({

        type: "POST",
        url: "modelosBd/incrementosDecrementos/inserta.md.php",
        contentType: false,
        data: paqueteDeDatos,
        processData: false,
        cache: false,
        success: function(response) {

            let elementos = JSON.parse(response);
            let mensaje = elementos['mensaje'];

        },
        error: function() {

        }

    });
  }

 

  var contadorG = 0;

  var Agregar_Fila_Tablas = function(boton,cuerpoTabla,numeroCampos,arrayTipo,arrayName){
    $(boton).click(function (e) { 
      e.preventDefault();

      contadorG++;

      var fila = "<tr>";

        for (var i = 0; i <= numeroCampos; i++) {

          if(numeroCampos == 9){
            if((i == 2) || (i == 3)){
              fila += `<td><input type='text' class='form-control ${arrayTipo[i]} sumaBeneficiarios' name='${arrayName[i]}[]' id='${arrayName[i]}${contadorG}'/></td>`; 
            }else{
              fila += `<td><input type='text' class='form-control ${arrayTipo[i]}' name='${arrayName[i]}[]' id='${arrayName[i]}${contadorG}'/></td>`;
            }
          }else{
            fila += `<td><input type='text' class='form-control ${arrayTipo[i]}' name='${arrayName[i]}[]' id='${arrayName[i]}${contadorG}'/></td>`; 
          }
         
        }
      
        fila +=
        '<td><a class="btn btn-danger eliminarFila"><i class="fa fa-trash"></i></a></td>';
    
        $(cuerpoTabla).append(fila);
      
        $.getScript("layout/scripts/js/validacionBasica.js",function(){
          funcion__solo__numero__montos($(".solo__numero__montos"));
        });


        
        
        var  totalBeneficiarios = function(tabla){
          $(tabla).on("input",".sumaBeneficiarios", function () {
            
            var beneficiariarios =$("#masculino"+contadorG).val();
            var beneficiariarios2 =$("#femenino"+contadorG).val();
      
            let suma = 0;
              suma = parseFloat(beneficiariarios) +  parseFloat(beneficiariarios2);

              if(isNaN(suma)){
                $("#total"+contadorG).val();
              }else{
                $("#total"+contadorG).val(suma);
              }
             
          });
        }

        totalBeneficiarios($(cuerpoTabla));
    });
  }


  var EliminarFilaTabla = function(tabla){
    $(tabla).on("click", ".eliminarFila", function() {
      // Eliminar la fila actual
      $(this).closest("tr").remove();
    });
  }


  var verificaObservacionesPlanificacion = function(idOrg,idIn){
    let paqueteDeDatos = new FormData();

      let idOrganismo = idOrg;

      let idIncremento = idIn;

      paqueteDeDatos.append("tipo", "verificaObservacionPlanificacion");

      paqueteDeDatos.append("idOrganismo", idOrganismo);

      paqueteDeDatos.append("idPoaIncremento", idIncremento);

    $.ajax({
        type: "POST",
        url: "modelosBd/incrementosDecrementos/selecciona.md.php",
        contentType: false,
        data: paqueteDeDatos,
        processData: false,
        cache: false,
        success: function (response) {
          var elementos = JSON.parse(response);
            var observacion = elementos["observacion"];

            $(".contenedorObservaDirector").html(" ");

            for(x of observacion){
              if(x.observacion == "si"){

                if(x.idTramite != null){
                    $("#labelInforme").hide();
                    $("#informeAnalista").hide();
                    $("#enviarInformeAnalistas").hide();
                  if(x.estado == "A"){
                    
                    $(".contenedorObservaDirector").html(`<table id="tabla_Observaciones_DPI" class="col col-12"><thead><tr><th><center>Fecha de Envio Observación</center></th><th><center>Fecha máxima de Subsanación</center></th><th><center>Observaciones Adicionales</center></th><th><center>Documento Enviado</center></th><th><center>Fecha envío Subsanación Organismo</center></th><th><center>Rechazar Incremento</center></th></tr></thead></table>`);

                  }else if(x.estado == "S"){
                    $(".contenedorObservaDirector").html(`<table id="tabla_Observaciones_DPI" class="col col-12"><thead><tr><th><center>Fecha de Envio Observación</center></th><th><center>Fecha máxima de Subsanación</center></th><th><center>Observaciones Adicionales</center></th><th><center>Documento Enviado</center></th><th><center>Fecha envío Subsanación Organismo</center></th><th><center>Reenviar Areas</center></th></tr></thead></table>`);
                  }else if(x.estado =="I"){
                    $("#labelInforme").hide();
                  $("#informeAnalista").hide();
                  $("#enviarInformeAnalistas").hide();
                  $(".contenedorObservaDirector").html(`<a class='btn btn-primary ocultos_incrementosOb' id='registroPlanificacion'  data-toggle="modal" data-target="#modalObservacionesTra"><i class='fa fa-floppy-o' aria-hidden='true'></i>&nbsp;&nbsp;Registrar Observaciones</a>`);
                  }
                }else if(x.idTramite == null){
                  $("#labelInforme").hide();
                  $("#informeAnalista").hide();
                  $("#enviarInformeAnalistas").hide();
                  $(".contenedorObservaDirector").html(`<a class='btn btn-primary ocultos_incrementosOb' id='registroPlanificacion'  data-toggle="modal" data-target="#modalObservacionesTra"><i class='fa fa-floppy-o' aria-hidden='true'></i>&nbsp;&nbsp;Registrar Observaciones</a>`);
                }
              }else{
                $(".contenedorObservaDirector").html(" ");
                $("#labelInforme").show();
                $("#informeAnalista").show();
                $("#enviarInformeAnalistas").show();
              }
            }            
        },
        error: function () {},
      });
  }


  var envioObservacionesPlanificacionOrganismo = function(array){
    $(".botonEnviarObservacionOd").click(function (e) {
      if (
        $("#fechaLimiteIncremento").val() == "" ||
        $("#fechaLimiteIncremento").val() == " " ||
        $("#archivoResolucionP").val() == "" ||
        $("#archivoResolucionP").val() == " "
      ) {
        alertify.set("notifier", "position", "top-center");
        alertify.notify(
          "Obligatorio cargar el documento y escoger la fecha",
          "error",
          5,
          function () {}
        );
      } else {
        alertify.confirm(
          "¿Está seguro de enviar las observaciones?",
          function (result) {
            if (result) {
              var paqueteDeDatos = new FormData();
  
              let idOrganismo = array[1];
              let idTramite = array[2];
              let fechaFin = $(array[3]).val();
              let observacionA = $(array[4]).val();
              let tipo = "guardarObservacionPlanificacion";

              paqueteDeDatos.append("tipo", tipo);
              paqueteDeDatos.append("idOrganismo", idOrganismo);
              paqueteDeDatos.append("idTramite", idTramite);
              paqueteDeDatos.append("documento", $(array[0])[0].files[0]);
              paqueteDeDatos.append("fechaFin", fechaFin);
              paqueteDeDatos.append("observacionA", observacionA);

  
              $.ajax({
                type: "POST",
                url: "modelosBd/incrementosDecrementos/inserta.md.php",
                contentType: false,
                data: paqueteDeDatos,
                processData: false,
                cache: false,
                success: function (response) {
                  let elementos = JSON.parse(response);
                  let mensaje = elementos["mensaje"];
  
                  if (mensaje == 1) {
  
                    alertify.set("notifier", "position", "top-center");
                    alertify.notify(
                      "Envio realizado correctamente",
                      "success",
                      5,
                      function () {}
                    );
  
                    window.setTimeout(function () {
                      window.location = "incrementosRevisorRecomendado";
                    }, 5000);
                  }
                },
                error: function () {},
              });
            } else {
              alertify.set("notifier", "position", "top-center");
              alertify.notify("Acccion Cancelada", "error", 3, function () {});
            }
          }
        );
      }
    });
  }

  var traerDatatableObservaciones = function(tabla,identificador,idOrganismo,idPreeliminar){
    $.getScript("layout/scripts/js/incrementosDecrementos/datatablets.js",function(){
      
      var variableFront = $("#filesFrontend").val();

      datatablets__observaciones__DPI(tabla,identificador,idOrganismo,idPreeliminar,variableFront);

    });
  }

var verTablaIncrementosPoa = function (checkbox,elemento) {
  $(checkbox).change(function() {

    if ($(this).is(":checked")) {
      $(elemento).show();
    } else {
      $(elemento).hide();
    }
  });
}


var verArmadoMatrizIncrementos=function(boton,contenedor){

	$(boton).click(function(){

    let nombreBoton = $(this).text();

    $(".tituloModal_").text(nombreBoton);

		$(contenedor).html(" ");

		$(".valores__adicionales").remove();

		event.preventDefault();


		var idTramite=$(this).attr('idTramite');
		var idProgramacion=$(this).attr('idPro');
		var idActividad=$(this).attr('idActividad');

    let identificador;
    
    $.getScript("layout/scripts/js/incrementosDecrementos/datatablets.js",function(){

      
      if(idActividad == 1){

        $(contenedor).append('<div class="table-responsive"><table class="valores__adicionales" id="administrativas_tabla_incrementos"><thead><tr><th align="center">Ítem</th><th align="center">Nombre del Ítem</th><th align="center">Justificación</th><th align="center">Cantidad bien</th><th>Enero</th><th>Febrero</th><th>Marzo</th><th>Abril</th><th>Mayo</th><th>Junio</th><th>Julio</th><th>Agosto</th><th>Septiembre</th><th>Octubre</th><th>Noviembre</th><th>Diciembre</th><th>Total</th></tr></thead></table></div>');

        

        if(nombreBoton == "Matriz Inicial"){
          identificador = "administrativas_tabla_incrementos";
        }else{
          identificador = "administrativas_tabla_incrementos_D";
        }

        datatabletMatrizIncrementos($("#administrativas_tabla_incrementos"),identificador,[idTramite,idActividad,idProgramacion]);        

      }else if(idActividad == 2){

        $(contenedor).append('<div  class="table-responsive"><table class="valores__adicionales" id="mantenimiento__tabla_incrementos"><thead><tr><th align="center">ITEM</th><th align="center">Nombre<br>Infraestructura<br>deportiva</th><th align="center">Provincia</th><th>Dirección<br>completa</th><th>Estado</th><th>Tipo de recursos<br>con los que<br>se construyó</th><th>Tipo de Inversión</th><th>Detallar tipo<br>inversión que se planificó realizar</th><th>Tipo<br>de mantenimiento</th><th>Materiales<br>servicios a requerir<br>para el mantenimiento</th><th>Fecha<br>último mantenimiento<br>realizado</th><th>Enero</th><th>Febrero</th><th>Marzo</th><th>Abril</th><th>Mayo</th><th>Junio</th><th>Julio</th><th>Agosto</th><th>Septiembre</th><th>Octubre</th><th>Noviembre</th><th>Diciembre</th><th>Total</th></tr></thead></table></div>');

        if(nombreBoton == "Matriz Inicial"){
          identificador = "mantenimiento__tabla_incrementos";
        }else{
          identificador = "mantenimiento__tabla_incrementos_D";
        }

        datatabletMatrizIncrementos($("#mantenimiento__tabla_incrementos"),identificador,[idTramite,idActividad,idProgramacion]);

      }else if(idActividad == 3 || idActividad == 5 || idActividad == 6 || idActividad == 7){

        
          $(contenedor).append('<div  class="table-responsive"><table class="valores__adicionales" id="valores__actividades__Incrementos"><thead><tr><th align="center">ITEM</th><th align="center">Tipo<br>financiamiento</th><th align="center">Nombre<br>evento</th><th>Deporte</th><th>Provincia</th><th>Sede<br>Ciudad<br>País</th><th>Alcance</th><th>Fecha<br>inicio</th><th>Fecha<br>fin</th><th>Género</th><th>Categoría</th><th>No.<br>Entrenadores<br>oficiales</th><th>No.<br>atletas</th><th>Total</th><th>Mujeres<br>(Beneficiarios)</th><th>Hombres<br>(Beneficiarios)</th><th>Detalle lo que<br>el organismo<br>va a adquirir</th><th>Justificación<br>de la adquisición<br>del bien<br>o servicio</th><th>Cantidad<br>del bien<br>o servicio<br>a adquirir</th><th>Enero</th><th>Febrero</th><th>Marzo</th><th>Abril</th><th>Mayo</th><th>Junio</th><th>Julio</th><th>Agosto</th><th>Septiembre</th><th>Octubre</th><th>Noviembre</th><th>Diciembre</th><th>Total</th></tr></thead></table></div>');			
      

          if(nombreBoton == "Matriz Inicial"){
            identificador = "valores__actividades__Incrementos";
          }else if(nombreBoton == "Matriz Incremento"){
            identificador = "valores__actividades__Incrementos_D";
          }
          
          datatabletMatrizIncrementos($("#valores__actividades__Incrementos"),identificador,[idTramite,idActividad,idProgramacion]);
          
      }else if(idActividad == 4){

      }
    });

	});

}

var activarBotonObservacionesOrganismo = function (contenedor, contenedor2) {
  var paqueteDeDatos = new FormData();

  let tipo = "verificaObservacionOrganismo";

  paqueteDeDatos.append("tipo", tipo);

  $.ajax({
    type: "POST",
    url: "modelosBd/incrementosDecrementos/selecciona.md.php",
    contentType: false,
    data: paqueteDeDatos,
    processData: false,
    cache: false,
    success: function (response) {
      let elementos = JSON.parse(response);
      let observacionesOrganismo = elementos["observacionOrganismo"];

      for (x of observacionesOrganismo) {
        if (x.idObservacion != null || x.idObservacion != "") {
          $(contenedor).html(
            `<center><button class='btn btn-danger' id='observacionesSubOd' name='observacionesSubOd' type='button'>Observaciones Subsanadas</button></center>`
          );

          $(contenedor2).html(
            `<table class='col col-12 mt-2' id='tablaObservacionesOrganismo'><thead><tr><th style='font-size:0.9em!important;'>Fecha Envio Observaciones</th><th style='font-size:0.9em!important;'>Fecha Máxima de subsanación de Observaciones</th><th style='font-size:0.9em!important;'>Observaciones Adicionales</th><th style='font-size:0.9em!important;'>Documento de Observaciones</th></tr></thead><tbody><tr><td style='font-size:0.9em!important;'><center>${x.fechaEnvioObservacion}</center></td><td style='font-size:0.9em!important;'><center>${x.fechaFinObservacion}</center></td><td style='font-size:0.9em!important;'><center>${x.observacion}</center></td><td style='font-size:0.9em!important;'><center><a target='_blank' href='documentos/incrementosDecrementos/observacion/${x.documentoObservacion}'>${x.documentoObservacion}</a></center></td></tr></tbody></table>`
          );
        }
      }
    },
    error: function () {},
  });
};

var envioSubsanacionObservacionesOrganismo = function(boton){
  $(boton).click(function (e) {
    alertify.confirm(
      "¿Está seguro de enviar la subsanación de observaciones?",
      function (result) {
        if (result) {
          var paqueteDeDatos = new FormData();

          let tipo = "actualizarEstadoObservacionOrganismo";

          paqueteDeDatos.append("tipo", tipo);
          
          $.ajax({
            type: "POST",
            url: "modelosBd/incrementosDecrementos/inserta.md.php",
            contentType: false,
            data: paqueteDeDatos,
            processData: false,
            cache: false,
            success: function (response) {
              let elementos = JSON.parse(response);
              let mensaje = elementos["mensaje"];

              if (mensaje == 1) {

                alertify.set("notifier", "position", "top-center");
                alertify.notify(
                  "Envio realizado correctamente",
                  "success",
                  5,
                  function () {}
                );

                window.setTimeout(function () {
                  window.location = "incrementosOrganismo";
                }, 2000);
              }
            },
            error: function () {},
          });
        } else {
          alertify.set("notifier", "position", "top-center");
          alertify.notify("Acccion Cancelada", "error", 3, function () {});
        }
      }
    );
  });
}


var cerrarModales = function () {
  $("#btnCerrarModal").on("click", function() {
    $("#modalValoresPoa").modal("hide");
  });
};


var agregarValoresFormularioOrganismo = function(boton){
  $(boton).click(function (e) { 
    e.preventDefault();

      let paqueteDeDatos = new FormData();

      let tipo = "datosOrganismoInstalacionesIncrementos";

      paqueteDeDatos.append("tipo",tipo);

    $.ajax({
        type: "POST",
        url: "modelosBd/incrementosDecrementos/selecciona.md.php",
        contentType: false,
        data: paqueteDeDatos,
        processData: false,
        cache: false,
        success: function (response) {
          $.getScript("layout/scripts/js/validaGlobal.js", function () {
            var elementos = JSON.parse(response);
            var datosOrganismo = elementos["datosOrganismo"];
            var datosMatriz = elementos["datosMatriz"];
            var datosIndicador = elementos["datosIndicador"];

            
            for(d of datosOrganismo){

              $(".nombre__organizacion__deportivas").text(d.nombre);
              $(".ruc__organizacion__deportivas").text(d.ruc);
              $(".acuerdo__ministerial__organizacion__deportivas").text(`Numero: ${d.numeroDeAcuerdo}  Fecha: ${d.fecha}`);
              $(".presidente__organizacion__deportivas").text(d.representante);
              $(".direccion__organizacion__deportivas").text(d.direccionCompleta);
              $(".correo__organizacion__deportivas").text(d.correo);
              $("#idOrganismo__m").val(d.idOrganismo);
            }


            let contadorG = 0;

            for(m of datosMatriz){
              

              contadorG++;
              $(".cuerpo__tabla__Instalaciones").html(
              
              "<tr><td colspan='1' style='font-size:1em!important;'>" +
              contadorG +
              "</td><td colspan='3' style='font-size:1em!important;'><center>" +
              m.nombreInfras +
              "</center></td><td colspan='3' style='font-size:1em!important;'><center>" +
              m.nombreActividad +
              "</center></td><td colspan='1' style='font-size:1em!important;'><center>" +
              m.itemPreesupuestario +
              "</center></td><td colspan='3' style='font-size:1em!important;'><center>" +
              m.nombreItem +
              "</center></td><td colspan='1' style='font-size:1em!important;'><center>" +
              m.totalP +
              "</center></td><td colspan='1' style='font-size:1em!important;'><center>" +
              m.totalP +
              "</center></td></tr>"
              );

              $(".pie__tabla__Instalaciones").html(m.totalIncrementoEje);


              // for(i of datosIndicador){
              //   $(".cuerpo__Instalaciones__Indicadores").html(
  
              //     "<tr><td colspan='1' style='font-size:1em!important;'>" +
              //     contadorG +
              //     "</td><td colspan='3' style='font-size:1em!important;'><center>" +
              //     m.nombreInfras +
              //     "</center></td><td colspan='3' style='font-size:1em!important;'><center>" +
              //     m.nombreActividad +
              //     "</center></td><td colspan='1' style='font-size:1em!important;'><center>" +
              //     i.indicador +
              //     "</center></td><td colspan='3' style='font-size:1em!important;'><center>" +
              //     m.nombreItem +
              //     "</center></td><td colspan='1' style='font-size:1em!important;'><center>" +
              //     i.metaindicador +
              //     "</center></td></tr>"
                    
              //   );
              // }
            }
            
          });
        },
        error: function () {},
      });
    
  });
} 

var agregarSelectReasignacionRecomendacion = function(contenedor,identificador){

  if($(identificador).val() == "Recomendado"){
    $(contenedor).html(`<div class='fila__incrementos__reasignar col-3 text-center' style='font-weight:bold;' id='tipoEnvioText'>Devolver a</div><div class='fila__incrementos__reasignar col-4'><select class='ancho__total__input__selects' id='selects__superiores'></select></div><div class='fila__incrementos__reasignar col-3 text-center'><a class='btn btn-warning' id='reasignarIncremento__a'><i class='fa fa-floppy-o' aria-hidden='true'></i>&nbsp;&nbsp;Devolver</a></div><div class='col-3 text-center mt-3' style='font-weight:bold;'>Observaciones</div><div class='col-9 mt-3'><textarea id='observacionesUsuarios' name='observacionesUsuarios' class='ancho__total__textareas form-control'></textarea></div>`)

  }else if($(identificador).val() == "Reasignado"){

    if($("#idRolAd").val() == 3){
      $(contenedor).html(`<div class='fila__incrementos__regresar col-3 text-center mt-2' style='font-weight:bold;'>Regresar a</div><div class='fila__incrementos__regresar col-4 text-center mt-2'><select class='ancho__total__input__selects' id='selects__superiores__regresar'></select></div><div class='fila__incrementos__regresar col-3 text-center mt-2'><a class='btn btn-warning' id='regresarIncremento__a'><i class='fa fa-floppy-o' aria-hidden='true'></i>&nbsp;&nbsp;Regresar</a></div><div class='col-3 text-center mt-3' style='font-weight:bold;'>Observaciones</div><div class='col-9 mt-3'><textarea id='observacionesUsuarios' name='observacionesUsuarios' class='ancho__total__textareas form-control'></textarea></div>`);
    }else{
      $(contenedor).html(`<div class='fila__incrementos__reasignar col-3 text-center' style='font-weight:bold;' id='tipoEnvioText'>Reasignar a</div><div class='fila__incrementos__reasignar col-4'><select class='ancho__total__input__selects' id='selects__superiores'></select></div><div class='fila__incrementos__reasignar col-3 text-center'><a class='btn btn-primary' id='reasignarIncremento__a'><i class='fa fa-floppy-o' aria-hidden='true'></i>&nbsp;&nbsp;Reasignar</a></div><div class='fila__incrementos__regresar col-3 text-center mt-2' style='font-weight:bold;'>Regresar a</div><div class='fila__incrementos__regresar col-4 text-center mt-2'><select class='ancho__total__input__selects' id='selects__superiores__regresar'></select></div><div class='fila__incrementos__regresar col-3 text-center mt-2'><a class='btn btn-warning' id='regresarIncremento__a'><i class='fa fa-floppy-o' aria-hidden='true'></i>&nbsp;&nbsp;Regresar</a></div><div class='col-3 text-center mt-3' style='font-weight:bold;'>Observaciones</div><div class='col-9 mt-3'><textarea id='observacionesUsuarios' name='observacionesUsuarios' class='ancho__total__textareas form-control'></textarea></div>`);
    }
   
  }
 
  $.getScript("layout/scripts/js/validacionSelector.js", function () {
    superioresSelects($("#selects__superiores"));
    superioresSelects($("#selects__superiores__regresar"));
  });


}


var agregarSelectorObservacionDecremento = function(){
  $(".contenedorObservaDirector").html(" ");
  $(".contenedorSelectorObservacion").html(" ");
  $(".contenedorSelectorObservacion").html("<select class='form-control col-4' id='selectorObservacionesDcr' name='selectorObservacionesDcr'><option value=''>---Seleccione---</option><option value='registrarObservaciones'>Registrar Observaciones</option><option value='subirResolucionDecremento'>Subir Resolucion</option></select>");
}

var verificaSeleccionDecremento = function(selector){
  $().change(function (e) { 
    e.preventDefault();
    
  });
}

var verificaObservacionesDecrementos = function(idOrg,idIn){
  let paqueteDeDatos = new FormData();

      let idOrganismo = idOrg;

      let idIncremento = idIn;

      paqueteDeDatos.append("tipo", "verificaObservacionPlanificacion");

      paqueteDeDatos.append("idOrganismo", idOrganismo);

      paqueteDeDatos.append("idPoaIncremento", idIncremento);

    $.ajax({
        type: "POST",
        url: "modelosBd/incrementosDecrementos/selecciona.md.php",
        contentType: false,
        data: paqueteDeDatos,
        processData: false,
        cache: false,
        success: function (response) {
          var elementos = JSON.parse(response);
            var observacion = elementos["observacion"];

            $(".contenedorObservaDirector").html(" ");

            for(x of observacion){
              if(x.idTramite != null){
                $("#labelInforme").hide();
                $("#informeAnalista").hide();
                $("#enviarInformeAnalistas").hide();
              if(x.estado == "A"){
                
                $(".contenedorObservaDirector").html(`<table id="tabla_Observaciones_DPI" class="col col-12"><thead><tr><th><center>Fecha de Envio Observación</center></th><th><center>Fecha máxima de Subsanación</center></th><th><center>Observaciones Adicionales</center></th><th><center>Documento Enviado</center></th><th><center>Fecha envío Subsanación Organismo</center></th><th><center>Rechazar Incremento</center></th></tr></thead></table>`);

              }else if(x.estado == "S"){
                $(".contenedorObservaDirector").html(`<table id="tabla_Observaciones_DPI" class="col col-12"><thead><tr><th><center>Fecha de Envio Observación</center></th><th><center>Fecha máxima de Subsanación</center></th><th><center>Observaciones Adicionales</center></th><th><center>Documento Enviado</center></th><th><center>Fecha envío Subsanación Organismo</center></th><th><center>Reenviar Areas</center></th></tr></thead></table>`);
              }else if(x.estado =="I"){
                $("#labelInforme").hide();
              $("#informeAnalista").hide();
              $("#enviarInformeAnalistas").hide();
              $(".contenedorObservaDirector").html(`<a class='btn btn-primary ocultos_incrementosOb' id='registroPlanificacion'  data-toggle="modal" data-target="#modalObservacionesTra"><i class='fa fa-floppy-o' aria-hidden='true'></i>&nbsp;&nbsp;Registrar Observaciones</a>`);
              }
            }else if(x.idTramite == null){
              $("#labelInforme").hide();
              $("#informeAnalista").hide();
              $("#enviarInformeAnalistas").hide();
              $(".contenedorObservaDirector").html(`<a class='btn btn-primary ocultos_incrementosOb' id='registroPlanificacion'  data-toggle="modal" data-target="#modalObservacionesTra"><i class='fa fa-floppy-o' aria-hidden='true'></i>&nbsp;&nbsp;Registrar Observaciones</a>`);
            }
            }            
        },
        error: function () {},
      });
}

