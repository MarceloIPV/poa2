<?php $componentes= new componentes();?>
<?php $componentes__modificaciones= new componentes__modificaciones();
session_start();
$idOrganismoSession = $_SESSION["idOrganismoSession"];?> 
<body onload="origen_sueldo(2),destino_sueldo()"></body>
<div class="content-wrapper d d-flex flex-column align-items-center"> 
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-7">
        <?=$componentes->getComponentes(1,"INFRAESTRUCCTURA");?> 
      </div>      
      <div class="col-md-5">
        <div class="row">
       
     
     </div>        
   </div>
 </div>    
</div>

<div class="col-md-12">

  <div class="col col-12 text-center textos__titulos__2d">Origen</div> 
  
</center>

<section class='content row mt-4 borde__separacion__mo' style='padding:.5em;'>




  <table class='col col-12 table__bordes__ejecutados mt-4'>

    <thead>



      <tr class=''>

        <th class='vertical__aign'><center>Actividad</center></th> 

        <th class='vertical__aign'><center>Eventos/ Intervención</center></th>
        <th class='vertical__aign'><center>Ítem</center></th>
        <th class='vertical__aign'><center>Código item presupuestario</center></th>
        <th class='vertical__aign'><center>Mes</center></th>
        <th class='vertical__aign'><center>Monto</center></th>
        

      </tr>

    </thead>

    <tbody>

      <tr>

        <td>
          <select id='actividad__modificaciones__destino__modificaciones2_o_i' class='ancho__total__input obligatorios'></select>
        </td>

         <td>
          <select id='eventos_intervencion_o_i'  class='ancho__total__input obligatorios'></select>
        </td>

        <td>
          <select id='item__modificaciones__destino__modificaciones2_o_i'  class='ancho__total__input obligatorios'></select>
        </td>

        <td>
          <input id='codigo__presupuestarios__destino__new2_o_i' class='ancho__total__input obligatorios' readonly='' />
        </td>
        <?php

        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");     
        $mesActual=date("m") * 1;


        ?>
       
         <td>

          <select id='meses2_o_i' class='ancho__total__input obligatorios'>
            <option >--Seleccione--</option>
            <?php  
            for ($i=0; $i < 12 ; $i++) { 
             




      $objeto1= new usuarioAcciones();
        $texto = strtolower($meses[$i]);
        $cantidad=$objeto1->getObtenerInformacionGeneral("SELECT $texto  as num FROM poa_programacion_financiera where idOrganismo=$idOrganismoSession and idItem=110");
        $var = $_POST['item2'];
        foreach ($cantidad as $row)
        {
          $numero= $row["num"];
        }


 echo "  <option value=".$meses[$i]." onclick='pasar_valor2($numero)'>".$meses[$i]." - ".$numero."</option>";
           } 

            ?>

          </select>
        </td>

        <td>
          <input id='monto__seleccionados__destino__new2_o_i' oninput="valorCambio2(),valorSuperior2()" class='ancho__total__input obligatorios' />
          <input  type="hidden" id='monto__seleccionados__destino__new2_o1' class='ancho__total__input obligatorios' />
        </td>
     


     </tr>

   </tbody>



 </table>


</section>
<p/>
<div class="col-md-12">

  <div class="col col-12 text-center textos__titulos__2d">Destino</div> 
  <div id="origen"></div> 
</center>

<section class='content row mt-4 borde__separacion__mo' style='padding:.5em;'>




  <table class='col col-12 table__bordes__ejecutados mt-4'>

    <thead>



      <tr class=''>

        <th class='vertical__aign'><center>Actividad</center></th> 

        <th class='vertical__aign'><center>Eventos/ Intervención</center></th>
        <th class='vertical__aign'><center>Ítem</center></th>
        <th class='vertical__aign'><center>Código item presupuestario</center></th>
        <th class='vertical__aign'><center>Mes</center></th>
        <th class='vertical__aign'><center>Monto</center></th>
          <th class='vertical__aign'><center>Justificación</center></th>

        <th class='vertical__aign'><center>Acción</center></th>

      </tr>

    </thead>

    <tbody>

      <tr>

        <td>
          <select id='actividad__modificaciones__destino__modificaciones2' class='ancho__total__input obligatorios'></select>
        </td>

         <td>
          <select id='eventos_intervencion'  class='ancho__total__input obligatorios'></select>
        </td>

        <td>
          <select id='item__modificaciones__destino__modificaciones2'  class='ancho__total__input obligatorios'></select>
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
          <input id='origen_justificacion' class='ancho__total__input obligatorios' />
        </td>
        <td>
         <button class="form-control btn btn-primary" onclick="modificacion_destino_o()">Guardar</button>
       </td>


     </tr>

   </tbody>



 </table>


</section>

<div id="data"></div>
<div id="destino"></div>
<div id="origen"></div>


<div id="mensaje"></div>
<div class="col-md-12">
  <div class="row">
    <div class="col-md-12">

     <div id="origen_sueldo"></div>
   </div>
   <div class="col-md-6">

    <div id="destino_sueldo"></div>
  </div>    
</div>   
</div>
</div>
</div> 
