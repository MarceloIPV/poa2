
var cerrartablaSeguimientoModal = function (boton, tabla,modal) {
    $(boton).click(function (e) {
      $(tabla + " tr").remove();
      $(modal).modal('dispose');
    });
  };

  var cerrartablaSeguimiento = function (boton, tabla) {
    $(boton).click(function (e) {
      $(tabla + " tr").remove();
    });
  };

var deshabilitarUnCheck = function (checkbox1, checkbox2) {


    
     $(checkbox1).click(function (e) {
      $(".checkActividades").show();
      $(".checkContratacion").hide();
      $("#tipoInforme").val("actividades")
      if ($(checkbox1).is(":checked")) {
        
        $(checkbox2).prop("disabled", true);
      } else {
        $(checkbox2).prop("disabled", false);
      }
    });

    $(checkbox2).click(function (e) {
      $(".checkActividades").hide();
      $(".checkContratacion").show();
      $("#tipoInforme").val("contratacion")
      if ($(checkbox2).is(":checked")) {
       
        $(checkbox1).prop("disabled", true);
      } else {
        $(checkbox1).prop("disabled", false);
        
      }
    });
};

var cerrarModalReporteriaAnualRevisor = function (boton) {
  $(boton).click(function (e) {
    
    $("#administrativo").hide()
    $("#mantenimiento").hide()
    $("#capacitacion").hide()     
    $("#sueldos").hide()
    $("#honorarios").hide()
    $("#competencia").hide()
    $("#formativo").hide()
    $("#altoRen").hide()
    $("#recreacion").hide()
    $("#implementacion").hide()

  });
};

var agregarDatatabletsRefrescar=function(btnAccion,idDatatable,nombreArchivo,archivo,datos){

  $(btnAccion).click(function (e){

    idOrganismo=$(datos).val()

    datatabletsSeguimientoRevisorVacio($("#"+idDatatable+""), idDatatable,nombreArchivo,archivo,idOrganismo,false);
  });

};


var cerrarModalDatatable=function(btnCerrar,tabla){

  $(btnCerrar).click(function (e){
    var table = $(tabla).DataTable();
    table.destroy()
  });

};


var  descargarPorZipArchivos = function(boton, arrayArchivosConPath,nombreZip){

  $(boton).click(function (e){
    
    const zip = new JSZip();

  // Add files to the zip archive
  const promises = arrayArchivosConPath.map(path => {
    return fetch(path)
      .then(response => response.blob())
      .then(blob => {
        const filename = path.substring(path.lastIndexOf('/') + 1);
        zip.file(filename, blob);
      })
      .catch(error => {
        console.error(`Error fetching ${path}:`, error);
      });
  });

  // Wait for all fetch operations to complete
  Promise.all(promises).then(() => {
    // Generate the zip asynchronously
    zip.generateAsync({ type: 'blob' }).then(blob => {
      // Use the downloadjs library to trigger the download
      saveAs(blob, nombreZip+".zip");
    });
  });

    

  });
  

}

var subirArchivos = function(boton,inputArchivo,tituloArchivo){
  
 
  $(boton).click(function (e){
    
    input = document.getElementById(inputArchivo);
    input.click(); 

    input.addEventListener("change",function(e){
      var fileName = e.target.files[0].name;

      if (e.target.files[0].size > 2097152) // 2 MiB for bytes.
      {
        alertify.set("notifier","position", "top-center");
        alertify.notify("Archivo no puede superar los 2MB!", "error", 5, function(){});
        return;
      }

      $(tituloArchivo).show()
      
      $(tituloArchivo).text(fileName)

    })
    
  })
  

  
};


var regresarEstadoOriginalSubirArchivo=function(btnCerrar,div,tituloArchivo){
  $(btnCerrar).click(function (e){
    
    const dropArea = document.querySelector(div),
    
    input = dropArea.querySelector("input");
    input.value = "";
    $(tituloArchivo).hide()
    
  });

};


function getFileNameFromUrl(url) {
  const parts = url.split('/');
  return parts[parts.length - 1];
};


var buscarFiltradoDataTable = function(input1,input2,datatable){
  $(input2).on('change', function() {
        startDate = $(input1).val();
        endDate = $(input2).val();
        
        if(startDate == '' || endDate == ''){
      
          datatable.DataTable().ajax.reload();
           
         }else{
            
          var table = datatable.DataTable();
          if((endDate >= startDate)&&(startDate != '' && endDate != '')){
            var table = datatable.DataTable();
        
            $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
              let min = startDate
              let max = endDate
              let age = data[9] 

              if (
                  (min <= age && age <= max)
              ) {
                
                  return true;
              }
            
              return false;
          });

          
            table.draw();
        }else if((endDate < startDate) &&(startDate != '' && endDate != '')){
          alertify.set("notifier","position", "top-center");
          alertify.notify("Fecha de Inicial no puede ser Mayor a la Fecha de Final", "error", 5, function(){});
          
        }
        
      }
   
    });



};



/*=======================================
=            Enviar correos             =
=======================================*/

var enviarCorreosPlazos=function(boton,parametro2){

  $(boton).click(function (e){
  
    e.preventDefault();	

      var confirm= alertify.confirm('¿Está seguro de '+parametro2+'?','¿Está seguro de '+parametro2+'?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   
  
      confirm.set({transition:'slide'});    
  
      confirm.set('onok', function(){ //callbak al pulsar botón positivo
          
        var paqueteDeDatos = new FormData();
  
        paqueteDeDatos.append('tipo',"correoPlazos");		
  
        
  
        $.ajax({
  
          type:"POST",
          url:"modelosBd/POA_SEGUIMIENTO_REVISOR/selector.md.php",
          contentType: false,
          data:paqueteDeDatos,
          processData: false,
          cache: false, 
          success:function(response){
  
                  var elementos=JSON.parse(response);
  
                  var mensaje=elementos['mensaje'];
  
            if(mensaje==1){
  
                alertify.set("notifier","position", "top-center");
                alertify.notify("Acción realizada satisfactoriamente", "success", 5, function(){});
  
                  window.setTimeout(function(){ 
  
                    location.reload();
  
                } ,5000); 
  
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
  
    
  
  });
  
  }


  var buscarPaginaDataTable = function(input2,datatable){
    $(input2).on('change', function() {
      var dataTable =  datatable.DataTable()
        if($(input2).val()==""){
          dataTable.page(0).draw(false);
        }else{
          dataTable.page($(input2).val()-1).draw(false);
        }
      });

  };

