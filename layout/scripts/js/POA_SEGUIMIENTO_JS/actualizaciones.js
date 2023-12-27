var insertar__contrataciones__publicas_seguimiento=function(boton){

    $(boton).click(function (e) {

         
            var idCatalogo = $(this).attr('idCatalogo');
          

            var paqueteDeDatos = new FormData();
    
            paqueteDeDatos.append('tipo','actualiza__catalogoContraloria__seguimiento');		
    
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
                $("#catalogo__elect__objeto").val(" ");
                $("#catalogo__elect__texto").val(" ");
                $("#catalogo__elect__cantidad").val(0);
                $("#catalogo__elect__monto").val(0);
                $("#catalogo__elect__proveedor").val(" ");
                $("#catalogo__elect__rucProveedor").val(0);
                
            }if(catalogo__subasta == "no"){
                $("#catalogo__subasta__objeto").val(" ");
                $("#catalogo__subasta__texto").val(" ");
                $("#catalogo__subasta__cantidad").val(0);
                $("#catalogo__subasta__monto").val(0);
                $("#catalogo__subasta__proveedor").val(" ");
                $("#catalogo__subasta__rucProveedor").val(0);

            } if(catalogo__infima == "no"){
                $("#catalogo__infima__objeto").val(" ");
                $("#catalogo__infima__texto").val(" ");
                $("#catalogo__infima__cantidad").val(0);
                $("#catalogo__infima__monto").val(0);
                $("#catalogo__infima__proveedor").val(" ");
                $("#catalogo__infima__rucProveedor").val(0);
            } if(catalogo__menorCuantia == "no"){
                $("#catalogo__menorCuantia__objeto").val(" ");
                $("#catalogo__menorCuantia__texto").val(" ");
                $("#catalogo__menorCuantia__cantidad").val(0);
                $("#catalogo__menorCuantia__monto").val(0);
                $("#catalogo__menorCuantia__proveedor").val(" ");
                $("#catalogo__menorCuantia__rucProveedor").val(0);
            } if(catalogo__cotizacion == "no"){
                $("#catalogo__cotizacion__objeto").val(" ");
                $("#catalogo__cotizacion__texto").val(" ");
                $("#catalogo__cotizacion__cantidad").val(0);
                $("#catalogo__cotizacion__monto").val(0);
                $("#catalogo__cotizacion__proveedor").val(" ");
                $("#catalogo__cotizacion__rucProveedor").val(0);
            } if(catalogo__licitacion == "no"){
                $("#catalogo__licitacion__objeto").val(" ");
                $("#catalogo__licitacion__texto").val(" ");
                $("#catalogo__licitacion__cantidad").val(0);
                $("#catalogo__licitacion__monto").val(0);
                $("#catalogo__licitacion__proveedor").val(" ");
                $("#catalogo__licitacion__rucProveedor").val(0);

            } if(catalogo__menorCuantiaObras == "no"){
                $("#catalogo__menorCuantiaObras__objeto").val(" ");
                $("#catalogo__menorCuantiaObras__texto").val(" ");
                $("#catalogo__menorCuantiaObras__cantidad").val(0);
                $("#catalogo__menorCuantiaObras__monto").val(0);
                $("#catalogo__menorCuantiaObras__proveedor").val(" ");
                $("#catalogo__menorCuantiaObras__rucProveedor").val(0);
            } if(catalogo__cotizacionObras == "no"){
                $("#catalogo__cotizacionObras__objeto").val(" ");
                $("#catalogo__cotizacionObras__texto").val(" ");
                $("#catalogo__cotizacionObras__cantidad").val(0);
                $("#catalogo__cotizacionObras__monto").val(0);
                $("#catalogo__cotizacionObras__proveedor").val(" ");
                $("#catalogo__cotizacionObras__rucProveedor").val(0);
            } if(catalogo__licitacionObras == "no"){
                $("#catalogo__licitacionObras__objeto").val(" ");
                $("#catalogo__licitacionObras__texto").val(" ");
                $("#catalogo__licitacionObras__cantidad").val(0);
                $("#catalogo__licitacionObras__monto").val(0);
                $("#catalogo__licitacionObras__proveedor").val(" ");

                $("#catalogo__licitacionObras__rucProveedor").val(0);

            } if(catalogo__precioObras == "no"){
                $("#catalogo__precioObras__objeto").val(" ");
                $("#catalogo__precioObras__texto").val(" ");
                $("#catalogo__precioObras__cantidad").val(0);
                $("#catalogo__precioObras__monto").val(0);
                $("#catalogo__precioObras__proveedor").val(" ");
                $("#catalogo__precioObras__rucProveedor").val(0);

            } if(catalogo__contratacionDirecta == "no"){
                $("#catalogo__contratacionDirecta__objeto").val(" ");
                $("#catalogo__contratacionDirecta__texto").val(" ");
                $("#catalogo__contratacionDirecta__cantidad").val(0);
                $("#catalogo__contratacionDirecta__monto").val(0);
                $("#catalogo__contratacionDirecta__proveedor").val(" ");
                $("#catalogo__contratacionDirecta__rucProveedor").val(0);
                
            } if(catalogo__contratacionListaCorta == "no"){
                $("#catalogo__contratacionListaCorta__objeto").val(" ");
                $("#catalogo__contratacionListaCorta__texto").val(" ");
                $("#catalogo__contratacionListaCorta__cantidad").val(0);
                $("#catalogo__contratacionListaCorta__monto").val(0);
                $("#catalogo__contratacionListaCorta__proveedor").val(" ");
                $("#catalogo__contratacionListaCorta__rucProveedor").val(0);

            } if(catalogo__contratacionConcursoPu == "no"){
                $("#catalogo__contratacionConcursoPu__objeto").val(" ");
                $("#catalogo__contratacionConcursoPu__texto").val(" ");
                $("#catalogo__contratacionConcursoPu__cantidad").val(0);
                $("#catalogo__contratacionConcursoPu__monto").val(0);
                $("#catalogo__contratacionConcursoPu__proveedor").val(" ");
                $("#catalogo__contratacionConcursoPu__rucProveedor").val(0);

            }


            let catalogo__elect__cantidad=$("#catalogo__elect__cantidad").val();
            let catalogo__elect__monto=$("#catalogo__elect__monto").val();
            let catalogo__subasta__cantidad=$("#catalogo__subasta__cantidad").val();
            let catalogo__subasta__monto=$("#catalogo__subasta__monto").val();
            let catalogo__infima__cantidad=$("#catalogo__infima__cantidad").val();
            let catalogo__infima__monto=$("#catalogo__infima__monto").val();
            let catalogo__menorCuantia__cantidad=$("#catalogo__menorCuantia__cantidad").val();
            let catalogo__menorCuantia__monto=$("#catalogo__menorCuantia__monto").val();
            let catalogo__cotizacion__cantidad=$("#catalogo__cotizacion__cantidad").val();
            let catalogo__cotizacion__monto=$("#catalogo__cotizacion__monto").val();
            let catalogo__licitacion__cantidad=$("#catalogo__licitacion__cantidad").val();
            let catalogo__licitacion__monto=$("#catalogo__licitacion__monto").val();
            let catalogo__menorCuantiaObras__cantidad=$("#catalogo__menorCuantiaObras__cantidad").val();

            let catalogo__menorCuantiaObras__monto=$("#catalogo__menorCuantiaObras__monto").val();
            let catalogo__cotizacionObras__cantidad=$("#catalogo__cotizacionObras__cantidad").val();
            let catalogo__cotizacionObras__monto=$("#catalogo__cotizacionObras__monto").val();
            let catalogo__licitacionObras__cantidad=$("#catalogo__licitacionObras__cantidad").val();
            let catalogo__licitacionObras__monto=$("#catalogo__licitacionObras__monto").val();
            let catalogo__precioObras__cantidad=$("#catalogo__precioObras__cantidad").val();
            let catalogo__precioObras__monto=$("#catalogo__precioObras__monto").val();
            let catalogo__contratacionDirecta__cantidad=$("#catalogo__contratacionDirecta__cantidad").val();
            let catalogo__contratacionDirecta__monto=$("#catalogo__contratacionDirecta__monto").val();
            let catalogo__contratacionListaCorta__cantidad=$("#catalogo__contratacionListaCorta__cantidad").val();
            let catalogo__contratacionListaCorta__monto=$("#catalogo__contratacionListaCorta__monto").val();
            let catalogo__contratacionConcursoPu__cantidad=$("#catalogo__contratacionConcursoPu__cantidad").val();
            let catalogo__contratacionConcursoPu__monto=$("#catalogo__contratacionConcursoPu__monto").val();

            let catalogo__elect__objeto=$("#catalogo__elect__objeto").val();
            let catalogo__subasta__objeto=$("#catalogo__subasta__objeto").val();
            let catalogo__infima__objeto=$("#catalogo__infima__objeto").val();
            let catalogo__menorCuantia__objeto=$("#catalogo__menorCuantia__objeto").val();
            let catalogo__cotizacion__objeto=$("#catalogo__cotizacion__objeto").val();
            let catalogo__licitacion__objeto=$("#catalogo__licitacion__objeto").val();
            let catalogo__menorCuantiaObras__objeto=$("#catalogo__menorCuantiaObras__objeto").val();
            let catalogo__cotizacionObras__objeto=$("#catalogo__cotizacionObras__objeto").val();
            let catalogo__licitacionObras__objeto=$("#catalogo__licitacionObras__objeto").val();
            let catalogo__precioObras__objeto=$("#catalogo__precioObras__objeto").val();
            let catalogo__contratacionDirecta__objeto=$("#catalogo__contratacionDirecta__objeto").val();
            let catalogo__contratacionListaCorta__objeto=$("#catalogo__contratacionListaCorta__objeto").val();
            let catalogo__contratacionConcursoPu__objeto=$("#catalogo__contratacionConcursoPu__objeto").val();

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

            let catalogo__elect__proveedor=$("#catalogo__elect__proveedor").val();
            let catalogo__subasta__proveedor=$("#catalogo__subasta__proveedor").val();
            let catalogo__infima__proveedor=$("#catalogo__infima__proveedor").val();
            let catalogo__menorCuantia__proveedor=$("#catalogo__menorCuantia__proveedor").val();
            let catalogo__cotizacion__proveedor=$("#catalogo__cotizacion__proveedor").val();
            let catalogo__licitacion__proveedor=$("#catalogo__licitacion__proveedor").val();
            let catalogo__menorCuantiaObras__proveedor=$("#catalogo__menorCuantiaObras__proveedor").val();
            let catalogo__cotizacionObras__proveedor=$("#catalogo__cotizacionObras__proveedor").val();
            let catalogo__licitacionObras__proveedor=$("#catalogo__licitacionObras__proveedor").val();
            let catalogo__precioObras__proveedor=$("#catalogo__precioObras__proveedor").val();
            let catalogo__contratacionDirecta__proveedor=$("#catalogo__contratacionDirecta__proveedor").val();
            let catalogo__contratacionListaCorta__proveedor=$("#catalogo__contratacionListaCorta__proveedor").val();
            let catalogo__contratacionConcursoPu__proveedor=$("#catalogo__contratacionConcursoPu__proveedor").val();

            let catalogo__elect__rucProveedor=$("#catalogo__elect__rucProveedor").val();
            let catalogo__subasta__rucProveedor=$("#catalogo__subasta__rucProveedor").val();
            let catalogo__infima__rucProveedor=$("#catalogo__infima__rucProveedor").val();
            let catalogo__menorCuantia__rucProveedor=$("#catalogo__menorCuantia__rucProveedor").val();
            let catalogo__cotizacion__rucProveedor=$("#catalogo__cotizacion__rucProveedor").val();
            let catalogo__licitacion__rucProveedor=$("#catalogo__licitacion__rucProveedor").val();
            let catalogo__menorCuantiaObras__rucProveedor=$("#catalogo__menorCuantiaObras__rucProveedor").val();
            let catalogo__cotizacionObras__rucProveedor=$("#catalogo__cotizacionObras__rucProveedor").val();
            let catalogo__licitacionObras__rucProveedor=$("#catalogo__licitacionObras__rucProveedor").val();
            let catalogo__precioObras__rucProveedor=$("#catalogo__precioObras__rucProveedor").val();
            let catalogo__contratacionDirecta__rucProveedor=$("#catalogo__contratacionDirecta__rucProveedor").val();
            let catalogo__contratacionListaCorta__rucProveedor=$("#catalogo__contratacionListaCorta__rucProveedor").val();
            let catalogo__contratacionConcursoPu__rucProveedor=$("#catalogo__contratacionConcursoPu__rucProveedor").val();

           

            paqueteDeDatos.append("catalogo__elect__cantidad",catalogo__elect__cantidad);
            paqueteDeDatos.append("catalogo__elect__monto",catalogo__elect__monto);
            paqueteDeDatos.append("catalogo__subasta__cantidad",catalogo__subasta__cantidad);
            paqueteDeDatos.append("catalogo__subasta__monto",catalogo__subasta__monto);
            paqueteDeDatos.append("catalogo__infima__cantidad",catalogo__infima__cantidad);
            paqueteDeDatos.append("catalogo__infima__monto",catalogo__infima__monto);
            paqueteDeDatos.append("catalogo__menorCuantia__cantidad",catalogo__menorCuantia__cantidad);
            paqueteDeDatos.append("catalogo__menorCuantia__monto",catalogo__menorCuantia__monto);
            paqueteDeDatos.append("catalogo__cotizacion__cantidad",catalogo__cotizacion__cantidad);
            paqueteDeDatos.append("catalogo__cotizacion__monto",catalogo__cotizacion__monto);
            paqueteDeDatos.append("catalogo__licitacion__cantidad",catalogo__licitacion__cantidad);
            paqueteDeDatos.append("catalogo__licitacion__monto",catalogo__licitacion__monto);
            paqueteDeDatos.append("catalogo__menorCuantiaObras__cantidad",catalogo__menorCuantiaObras__cantidad);
            
            paqueteDeDatos.append("catalogo__elect__objeto",catalogo__elect__objeto);
            paqueteDeDatos.append("catalogo__subasta__objeto",catalogo__subasta__objeto);
            paqueteDeDatos.append("catalogo__infima__objeto",catalogo__infima__objeto);
            paqueteDeDatos.append("catalogo__menorCuantia__objeto",catalogo__menorCuantia__objeto);
            paqueteDeDatos.append("catalogo__cotizacion__objeto",catalogo__cotizacion__objeto);
            paqueteDeDatos.append("catalogo__licitacion__objeto",catalogo__licitacion__objeto);
            paqueteDeDatos.append("catalogo__menorCuantiaObras__objeto",catalogo__menorCuantiaObras__objeto);
            paqueteDeDatos.append("catalogo__cotizacionObras__objeto",catalogo__cotizacionObras__objeto);
            paqueteDeDatos.append("catalogo__licitacionObras__objeto",catalogo__licitacionObras__objeto);
            paqueteDeDatos.append("catalogo__precioObras__objeto",catalogo__precioObras__objeto);
            paqueteDeDatos.append("catalogo__contratacionDirecta__objeto",catalogo__contratacionDirecta__objeto);
            paqueteDeDatos.append("catalogo__contratacionListaCorta__objeto",catalogo__contratacionListaCorta__objeto);
            paqueteDeDatos.append("catalogo__contratacionConcursoPu__objeto",catalogo__contratacionConcursoPu__objeto);
          
            paqueteDeDatos.append("catalogo__menorCuantiaObras__monto",catalogo__menorCuantiaObras__monto);
            paqueteDeDatos.append("catalogo__cotizacionObras__cantidad",catalogo__cotizacionObras__cantidad);
            paqueteDeDatos.append("catalogo__cotizacionObras__monto",catalogo__cotizacionObras__monto);
            paqueteDeDatos.append("catalogo__licitacionObras__cantidad",catalogo__licitacionObras__cantidad);
            paqueteDeDatos.append("catalogo__licitacionObras__monto",catalogo__licitacionObras__monto);
            paqueteDeDatos.append("catalogo__precioObras__cantidad",catalogo__precioObras__cantidad);
            paqueteDeDatos.append("catalogo__precioObras__monto",catalogo__precioObras__monto);
            paqueteDeDatos.append("catalogo__contratacionDirecta__cantidad",catalogo__contratacionDirecta__cantidad);
            paqueteDeDatos.append("catalogo__contratacionDirecta__monto",catalogo__contratacionDirecta__monto);
            paqueteDeDatos.append("catalogo__contratacionListaCorta__cantidad",catalogo__contratacionListaCorta__cantidad);
            paqueteDeDatos.append("catalogo__contratacionListaCorta__monto",catalogo__contratacionListaCorta__monto);
            paqueteDeDatos.append("catalogo__contratacionConcursoPu__cantidad",catalogo__contratacionConcursoPu__cantidad);
            paqueteDeDatos.append("catalogo__contratacionConcursoPu__monto",catalogo__contratacionConcursoPu__monto);

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

            paqueteDeDatos.append("catalogo__elect__proveedor",catalogo__elect__proveedor);
            paqueteDeDatos.append("catalogo__subasta__proveedor",catalogo__subasta__proveedor);
            paqueteDeDatos.append("catalogo__infima__proveedor",catalogo__infima__proveedor);
            paqueteDeDatos.append("catalogo__menorCuantia__proveedor",catalogo__menorCuantia__proveedor);
            paqueteDeDatos.append("catalogo__cotizacion__proveedor",catalogo__cotizacion__proveedor);
            paqueteDeDatos.append("catalogo__licitacion__proveedor",catalogo__licitacion__proveedor);
            paqueteDeDatos.append("catalogo__menorCuantiaObras__proveedor",catalogo__menorCuantiaObras__proveedor);
            paqueteDeDatos.append("catalogo__cotizacionObras__proveedor",catalogo__cotizacionObras__proveedor);
            paqueteDeDatos.append("catalogo__licitacionObras__proveedor",catalogo__licitacionObras__proveedor);
            paqueteDeDatos.append("catalogo__precioObras__proveedor",catalogo__precioObras__proveedor);
            paqueteDeDatos.append("catalogo__contratacionDirecta__proveedor",catalogo__contratacionDirecta__proveedor);
            paqueteDeDatos.append("catalogo__contratacionListaCorta__proveedor",catalogo__contratacionListaCorta__proveedor);
            paqueteDeDatos.append("catalogo__contratacionConcursoPu__proveedor",catalogo__contratacionConcursoPu__proveedor);

            paqueteDeDatos.append("catalogo__elect__rucProveedor",catalogo__elect__rucProveedor);
            paqueteDeDatos.append("catalogo__subasta__rucProveedor",catalogo__subasta__rucProveedor);
            paqueteDeDatos.append("catalogo__infima__rucProveedor",catalogo__infima__rucProveedor);
            paqueteDeDatos.append("catalogo__menorCuantia__rucProveedor",catalogo__menorCuantia__rucProveedor);
            paqueteDeDatos.append("catalogo__cotizacion__rucProveedor",catalogo__cotizacion__rucProveedor);
            paqueteDeDatos.append("catalogo__licitacion__rucProveedor",catalogo__licitacion__rucProveedor);
            paqueteDeDatos.append("catalogo__menorCuantiaObras__rucProveedor",catalogo__menorCuantiaObras__rucProveedor);
            paqueteDeDatos.append("catalogo__cotizacionObras__rucProveedor",catalogo__cotizacionObras__rucProveedor);
            paqueteDeDatos.append("catalogo__licitacionObras__rucProveedor",catalogo__licitacionObras__rucProveedor);
            paqueteDeDatos.append("catalogo__precioObras__rucProveedor",catalogo__precioObras__rucProveedor);
            paqueteDeDatos.append("catalogo__contratacionDirecta__rucProveedor",catalogo__contratacionDirecta__rucProveedor);
            paqueteDeDatos.append("catalogo__contratacionListaCorta__rucProveedor",catalogo__contratacionListaCorta__rucProveedor);
            paqueteDeDatos.append("catalogo__contratacionConcursoPu__rucProveedor",catalogo__contratacionConcursoPu__rucProveedor);


            var contador = 0;
    
            if(catalogo__elect == "si" && (catalogo__elect__cantidad == 0 || catalogo__elect__monto == 0 || catalogo__elect__proveedor == " " || catalogo__elect__objeto == " " || catalogo__elect__rucProveedor < 100000000000)){
                contador ++;
            }else if(catalogo__subasta == "si" && (catalogo__subasta__cantidad == 0 || catalogo__subasta__monto == 0 || catalogo__subasta__proveedor == " " || catalogo__subasta__objeto == " " || catalogo__subasta__rucProveedor < 100000000000)){
                contador ++;
            }else if(catalogo__infima == "si" && (catalogo__infima__cantidad == 0 || catalogo__infima__monto == 0 || catalogo__infima__proveedor == " " || catalogo__infima__objeto == " " || catalogo__infima__rucProveedor < 100000000000)){
                contador ++;
            }else if(catalogo__menorCuantia == "si" && (catalogo__menorCuantia__cantidad == 0 || catalogo__menorCuantia__monto == 0|| catalogo__menorCuantia__proveedor == " " || catalogo__menorCuantia__objeto == " " || catalogo__menorCuantia__rucProveedor < 100000000000)){
                contador ++;
            }else if(catalogo__cotizacion == "si"  && (catalogo__cotizacion__cantidad == 0 || catalogo__cotizacion__monto == 0|| catalogo__cotizacion__proveedor == " " || catalogo__cotizacion__objeto == " " || catalogo__cotizacion__rucProveedor < 100000000000)){
                contador ++;
            }else if(catalogo__licitacion == "si" && (catalogo__licitacion__cantidad == 0 || catalogo__licitacion__monto == 0|| catalogo__licitacion__proveedor == " " || catalogo__licitacion__objeto == " " || catalogo__licitacion__rucProveedor < 100000000000)){
                contador ++;
            }else if(catalogo__menorCuantiaObras == "si" && (catalogo__menorCuantiaObras__cantidad == 0 || catalogo__menorCuantiaObras__monto == 0|| catalogo__menorCuantiaObras__proveedor == " " || catalogo__menorCuantiaObras__objeto == " " || catalogo__menorCuantiaObras__rucProveedor < 100000000000)){
                contador ++;
            }else if(catalogo__cotizacionObras == "si" && (catalogo__cotizacionObras__cantidad == 0 || catalogo__cotizacionObras__monto == 0|| catalogo__cotizacionObras__proveedor == " " || catalogo__cotizacionObras__objeto == " " || catalogo__cotizacionObras__rucProveedor < 100000000000)){
                contador ++;
            }else if(catalogo__licitacionObras == "si" && (catalogo__licitacionObras__cantidad == 0 || catalogo__licitacionObras__monto == 0|| catalogo__licitacionObras__proveedor == " " || catalogo__licitacionObras__objeto == " " || catalogo__licitacionObras__rucProveedor < 100000000000)){
                contador ++;
            }else if(catalogo__precioObras == "si" && (catalogo__precioObras__cantidad == 0 || catalogo__precioObras__monto == 0|| catalogo__precioObras__proveedor == " " || catalogo__precioObras__objeto == " " || catalogo__precioObras__rucProveedor < 100000000000)){
                contador ++;
            }else if(catalogo__contratacionDirecta == "si" && (catalogo__contratacionDirecta__cantidad == 0 || catalogo__contratacionDirecta__monto == 0|| catalogo__contratacionDirecta__proveedor == " " || catalogo__contratacionDirecta__objeto == " " || catalogo__contratacionDirecta__rucProveedor < 100000000000)){
                contador ++;
            }else if(catalogo__contratacionListaCorta == "si" && (catalogo__contratacionListaCorta__cantidad == 0 || catalogo__contratacionListaCorta__monto == 0|| catalogo__contratacionListaCorta__proveedor == " " || catalogo__contratacionListaCorta__objeto == " " ||  catalogo__contratacionListaCorta__rucProveedor < 100000000000)){
                contador ++;
            }else if(catalogo__contratacionConcursoPu == "si" && (catalogo__contratacionConcursoPu__cantidad == 0 || catalogo__contratacionConcursoPu__monto == 0|| catalogo__contratacionConcursoPu__proveedor == " " || catalogo__contratacionConcursoPu__objeto == " " || catalogo__contratacionConcursoPu__rucProveedor < 100000000000)){
                contador ++;
            }

            if(catalogo__elect == "no" && catalogo__subasta == "no" && catalogo__infima == "no" && catalogo__menorCuantia == "no" && catalogo__cotizacion == "no" && catalogo__licitacion == "no" && catalogo__menorCuantiaObras == "no" && catalogo__cotizacionObras == "no" && catalogo__licitacionObras == "no" && catalogo__precioObras == "no" && catalogo__contratacionDirecta == "no" && catalogo__contratacionListaCorta == "no"&& catalogo__contratacionConcursoPu == "no"){
                contador ++;
            }
            

            if(contador<1){
                axios({
                    method: "post",
                    url: "modelosBd/POA_SEGUIMIENTO/actualizacion.md.php",
                    data: paqueteDeDatos,
                    headers: { "Content-Type": "multipart/form-data" },
                }).then((response) => {
                    
                    mensaje =response.data.mensaje;
    
                    console.log(response.data)
        
                    if (mensaje==1) {
        
                        alertify.set("notifier","position", "top-center");
                        alertify.notify("Registro realizado correctamente", "success", 3, function(){});
        
                    }
        
                }).catch((error) => {
                
                });

                $('#divContratacionPublicaSeguimiento div').remove();
                $('#contrataciones__itemsSeguimiento').modal('hide');
                
                
            }else{
            
                alertify.set("notifier", "position", "top-center");
                alertify.notify("Debe agregar Cantidad/Monto/Proveedor A las Contrataciones", "error", 5, function () { });

            }

           

    });

}


/*==============================================
=            Funciones de ediciones            =
==============================================*/

var funcion__editar__general__seguimiento__2023 = function (parametro1, parametro2, parametro3, parametro4, parametro5, parametro6, parametro7, parametro8) {


	var validador = validacionRegistro(parametro2);
	validacionRegistroMostrarErrores(parametro2);


	if (validador == false) {

		alertify.set("notifier", "position", "top-center");
		alertify.notify("Campos obligatorios", "error", 5, function () { });

		$(parametro1).show();

	} else {

		var confirm = alertify.confirm('¿Está seguro de guardar la información ingresada?', '¿Está seguro de guardar la información ingresada?', null, null).set('labels', { ok: 'Confirmar', cancel: 'Cancelar' });

		confirm.set({ transition: 'slide' });

		confirm.set('onok', function () {

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append("tipo", parametro3);

			paqueteDeDatos.append("parametros", JSON.stringify(parametro4));

			if (parametro3 == "editar__indicadores") {

				if ($(parametro5).val() != "" && $(parametro5).val() != undefined) {
					paqueteDeDatos.append('archivo', $(parametro5)[0].files[0]);
					paqueteDeDatos.append('archivo2', 'si');
				} else {
					paqueteDeDatos.append('archivo2', 'no');
				}

			}


			if (parametro3 == "editar__honorarios") {


				if ($(parametro5).val() != "" && $(parametro5).val() != undefined) {
					paqueteDeDatos.append('archivo', $(parametro5)[0].files[0]);
					paqueteDeDatos.append('archivo2', 'si');
				} else {
					paqueteDeDatos.append('archivo2', 'no');
				}



				if ($(parametro6).val() != "" && $(parametro6).val() != undefined) {
					paqueteDeDatos.append('archivo3', $(parametro6)[0].files[0]);
					paqueteDeDatos.append('archivo4', 'si');
				} else {
					paqueteDeDatos.append('archivo4', 'no');
				}


				if ($(parametro7).val() != "" && $(parametro7).val() != undefined) {
					paqueteDeDatos.append('archivo5', $(parametro7)[0].files[0]);
					paqueteDeDatos.append('archivo6', 'si');
				} else {
					paqueteDeDatos.append('archivo6', 'no');
				}


				if ($(parametro8).val() != "" && $(parametro8).val() != undefined) {
					paqueteDeDatos.append('archivo7', $(parametro8)[0].files[0]);
					paqueteDeDatos.append('archivo8', 'si');
				} else {
					paqueteDeDatos.append('archivo8', 'no');
				}

			}



			if (parametro3 == "editar__indicadores") {


				if ($(parametro5).val() != "" && $(parametro5).val() != undefined) {
					paqueteDeDatos.append('archivo', $(parametro5)[0].files[0]);
					paqueteDeDatos.append('archivo2', 'si');
				} else {
					paqueteDeDatos.append('archivo2', 'no');
				}



				if ($(parametro6).val() != "" && $(parametro6).val() != undefined) {
					paqueteDeDatos.append('archivo3', $(parametro6)[0].files[0]);
					paqueteDeDatos.append('archivo4', 'si');
				} else {
					paqueteDeDatos.append('archivo4', 'no');
				}


			}


			$.ajax({

				type: "POST",
				url: "modelosBd/POA_SEGUIMIENTO/actualizacion.md.php",
				contentType: false,
				data: paqueteDeDatos,
				processData: false,
				cache: false,
				success: function (response) {

					var elementos = JSON.parse(response);

					var mensaje = elementos['mensaje'];

					if (mensaje == 1) {

						alertify.set("notifier", "position", "top-center");
						alertify.notify("Registro actualizado correctamente", "success", 5, function () { });

					}

				},
				error: function () {

				}

			});

		});


		confirm.set('oncancel', function () { //callbak al pulsar botón negativo
			alertify.set("notifier", "position", "top-center");
			alertify.notify("Acción cancelada", "error", 1, function () {

				$(parametro1).show();

			});
		});

	}


}


/*=====  End of Funciones de ediciones  ======*/



