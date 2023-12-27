<?php $componentes= new componentes();?>
<?php $componentes__modificaciones= new componentes__modificaciones();?> 
<?php $objetoInformacion= new usuarioAcciones();?>
<?php $informacionObjeto=$objetoInformacion->getInformacionGeneral();?>
<body ></body>
<div class="content-wrapper d d-flex flex-column align-items-center"> 
  <?=$componentes->getComponentes(1,"INFRAESTRUCTURA");?> 
  <div class="col-md-12">

 

 <div id="honorarios"></div>
 <div id="honorarios1"></div>
 <div class="col col-12 text-center "></div> 
 <div class="col-md-12">
<div class="row">
  <div class="col-md-10"  >
     <div class="col col-12 text-center textos__titulos__2d">Origen</div> 
  </div> 
   <div class="col-md-2" id="error">
    
  </div> 
</div>  
</div>
 <div id="origen"></div> 


<section class='content row mt-4 borde__separacion__mo' style='padding:.5em;'>




  <table class='col col-12 table__bordes__ejecutados mt-4'>

    <thead>



      <tr class=''>

        <th class='vertical__aign'><center>Actividad</center></th> 
        <th class='vertical__aign'><center>Ítem</center></th>
        <th class='vertical__aign'><center>Código item presupuestario</center></th>
        <th class='vertical__aign'><center>Mes</center></th>
        <th class='vertical__aign'><center>Monto</center></th>		
        <th class='vertical__aign'><center>Acción</center></th>

      </tr>

    </thead>

    <tbody>

      <tr>

        <td>
          <select id='actividad__modificaciones__destino__infraestructura' class='ancho__total__input obligatorios'></select>
        </td>

        <td>
          <select id='item__modificaciones__destino__infraestructura'  class='ancho__total__input obligatorios' onclick="ver_item_trae()"></select>
          <input id='item2' class='ancho__total__input obligatorios' type="hidden" />
        </td>

        <td>
          <input id='codigo__presupuestarios__destino__infraestructura' class='ancho__total__input obligatorios' readonly='' />
        </td>
        <?php

        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");     
        $mesActual=date("m") * 1;


        ?>
        <td>

          <select id='meses' class='ancho__total__input obligatorios'>
            <option >--Seleccione--</option>
            <?php  
            for ($i=0; $i < 12 ; $i++) { 
             




$objeto1= new usuarioAcciones();
  $texto = strtolower($meses[$i]);
  $cantidad=$objeto1->getObtenerInformacionGeneral("SELECT $texto  as num FROM poa_programacion_financiera where idOrganismo=1085 and idItem=35");
  $var = $_POST['item2'];
  foreach ($cantidad as $row)
  {
    $numero= $row["num"];
  }


 echo "  <option value=".$meses[$i]." onclick='pasar_valor($numero)'>".$meses[$i]." - ".$numero."</option>";
           } 

            ?>

          </select>
        </td>

        <td>
          <input id='monto__seleccionados__destino__infraestructura' class='ancho__total__input obligatorios' />
        </td>
        <td>
         <button class="form-control btn btn-primary" onclick="modificacion_origen()">Guardar</button>
       </td>


     </tr>

   </tbody>



 </table>


</section>

<br>
<div class="col-md-12">
<div class="row">
  <div class="col-md-10"  >
     <div class="col col-12 text-center textos__titulos__2d">Destino</div> 
  </div> 
   <div class="col-md-1" >
    <button class="form-control btn btn-primary" onclick="ver_todo()">Historial</button>
  </div> 
</div>  
</div>


<section class='content row mt-4 borde__separacion__mo' style='padding:.5em;'>




  <table class='col col-12 table__bordes__ejecutados mt-4'>

    <thead>



      <tr class=''>

        <th class='vertical__aign'><center>Actividad</center></th> 
        <th class='vertical__aign'><center>Ítem</center></th>
        <th class='vertical__aign'><center>Código item presupuestario</center></th>
        <th class='vertical__aign'><center>Mes</center></th>
        <th class='vertical__aign'><center>Monto</center></th>
		
        <th class='vertical__aign'><center>Acción</center></th>

      </tr>

    </thead>

    <tbody>

      <tr>

        <td>
          <select id='actividad__modificaciones__destino__modificaciones2' class='ancho__total__input obligatorios'></select>
        </td>

        <td>
          <select id='item__modificaciones__destino__modificaciones2' onclick="ver_items(<?php echo $informacionObjeto[0]; ?>)" class='ancho__total__input obligatorios'></select>
        </td>

        <td>
          <input id='codigo__presupuestarios__destino__new2' class='ancho__total__input obligatorios' readonly='' />
        </td>
        <?php

        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");     
        $mesActual=date("m") * 1;


        ?>
        <td>
          <select id='meses2' class='ancho__total__input obligatorios'>
            <option >--Seleccione--</option>
            <?php  
            for ($i=($mesActual-1); $i < 12 ; $i++) { 
              echo "  <option value=".$meses[$i]." >".$meses[$i]."</option>";
            } 

            ?>

          </select>
        </td>

        <td>
          <input id='monto__seleccionados__destino__new2' class='ancho__total__input obligatorios' />
        </td>
        <td>
         <button class="form-control btn btn-primary" onclick="modificacion_destino()">Guardar</button>
       </td>


     </tr>

   </tbody>



 </table>


</section>
</div>
<div id="data"></div>
<div id="destino"></div>
<div id="suministros"></div>
<div class="col-md-12">
<dir class="row">
  <div class="col-md-6"  id="mensajeOrigen">
    
  </div> 
   <div class="col-md-6"  id="mensajeDestino">
    
  </div> 
</dir>  
</div>
<div id="mensaje"></div>
</div>
</div> 

