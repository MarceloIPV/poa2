/*=========================================
=            Creando segmentos            =
=========================================*/



    var controlArchivosInfra = function(inputArchivo){
  
 
        $(inputArchivo).change(function(e){
          
            
      
            if (e.target.files[0].size > 2097152) // 2 MiB for bytes.
            {
              alertify.set("notifier","position", "top-center");
              alertify.notify("Archivo no puede superar los 2MB!", "error", 5, function(){});
              $(inputArchivo).val("")
              return;
            }

            })
        
       
        
      
        
      };

