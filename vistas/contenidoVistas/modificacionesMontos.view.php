<?php $componentes= new componentes();?>
<?php $componentes__modificaciones= new componentes__modificaciones();?> 
<?php $objetoInformacion= new usuarioAcciones();?>
<?php $informacionObjeto=$objetoInformacion->getInformacionGeneral();?>
<body onload="honorarios()" ></body>
<div class="content-wrapper d d-flex flex-column align-items-center"> 
  <?=$componentes->getComponentes(1,"HONORARIOS PROFESIONALES");?> 
  <div class="col-md-12">

    <section class="content row mt-4 borde__separacion__mo" style="padding: 0.5em;">
     <div class="col-md-12">
<div class="row">
  <div class="col-md-10"  >
     <div class="col col-12 text-center textos__titulos__2d">Origen</div> 
  </div> 
   <div class="col-md-2" id="error">
    
  </div> 
</div>  
</div>
      <table class="col col-12 table__bordes__ejecutados">
        <thead>
          <tr>
            <th class="vertical__aign">
              <center>Apellidos y nombres</center>
            </th>
            <th class="vertical__aign">
              <center> Nro.cédula <br /> ciudadanía / pasaporte </center>
            </th>
            <th class="vertical__aign">
              <center>Cargo</center>
            </th>
            <th class="vertical__aign">
              <center>Tipo de cargo</center>
            </th>
            <th class="vertical__aign">
              <center>Honorario mensual<br />  (Incluido el IVA)</center>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <select id="persona_honorarios_data" class="ancho__total__input obligatorios__2 form-control"></select>
            </td>
            <td>
              <input id="cedula" onclick="ver()" class="ancho__total__input obligatorios__2 form-control" readonly />
              <input type="hidden" id="idHonorarios" class="ancho__total__input obligatorios__2 form-control" readonly />
            </td>
            <td>
              <input id="cargo" class="ancho__total__input obligatorios__2 form-control" readonly />
            </td>
            <td>
              <input id="tipo__cargo" class="ancho__total__input obligatorios__2 form-control" readonly />
            </td>
            <td>
              <input id="honorarioMensual" class="ancho__total__input obligatorios__2 form-control" readonly />
            </td>          
          </tr>
        </tbody>
      </table>
      <table class="col col-12 table__bordes__ejecutados">
        <thead>
          <tr>
            <th class="vertical__aign">
              <center>Enero</center>
            </th>
            <th class="vertical__aign">
              <center>Febrero</center>
            </th>
            <th class="vertical__aign">
              <center>Marzo</center>
            </th>
            <th class="vertical__aign">
              <center>Abril</center>
            </th>
            <th class="vertical__aign">
              <center>Mayo</center>
            </th>
            <th class="vertical__aign">
              <center>Junio</center>
            </th>
            <th class="vertical__aign">
              <center>Julio</center>
            </th>
            <th class="vertical__aign">
              <center>Agosto</center>
            </th>
            <th class="vertical__aign">
              <center>Septiembre</center>
            </th>
            <th class="vertical__aign">
              <center>Octubre</center>
            </th>
            <th class="vertical__aign">
              <center>Noviembre</center>
            </th>
            <th class="vertical__aign">
              <center>Diciembre</center>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <input id="enero__origen" class="ancho__total__input obligatorios__2 form-control" readonly 
              onclick="obtener_valor_mes_honorarios('enero')"  data-toggle="modal" data-target=".bd-example-modal-lg"/>
            </td>
            <td>
              <input id="febrero__origen" class="ancho__total__input obligatorios__2 form-control" readonly 
              onclick="obtener_valor_mes_honorarios('febrero')"  data-toggle="modal" data-target=".bd-example-modal-lg"/>
            </td>
            <td>
              <input id="marzo__origen" class="ancho__total__input obligatorios__2 form-control" readonly 
              onclick="obtener_valor_mes_honorarios('marzo')"  data-toggle="modal" data-target=".bd-example-modal-lg"/>
            </td>
            <td>
              <input id="abril__origen" class="ancho__total__input obligatorios__2 form-control" readonly 
              onclick="obtener_valor_mes_honorarios('abril')"  data-toggle="modal" data-target=".bd-example-modal-lg"/>
            </td>
            <td>
              <input id="mayo__origen" class="ancho__total__input obligatorios__2 form-control" readonly 
              onclick="obtener_valor_mes_honorarios('mayo')"  data-toggle="modal" data-target=".bd-example-modal-lg"/>
            </td>
            <td>
              <input id="junio__origen" class="ancho__total__input obligatorios__2 form-control" readonly 
              onclick="obtener_valor_mes_honorarios('junio')"  data-toggle="modal" data-target=".bd-example-modal-lg"/>
            </td>
            <td>
              <input id="julio__origen" class="ancho__total__input obligatorios__2 form-control" readonly 
              onclick="obtener_valor_mes_honorarios('julio')"  data-toggle="modal" data-target=".bd-example-modal-lg"/>
            </td>
            <td>
              <input id="agosto__origen" class="ancho__total__input obligatorios__2 form-control" readonly 
              onclick="obtener_valor_mes_honorarios('agosto')"  data-toggle="modal" data-target=".bd-example-modal-lg"/>
            </td>
            <td>
              <input id="septiembre__origen" class="ancho__total__input obligatorios__2 form-control" readonly 
              onclick="obtener_valor_mes_honorarios('septiembre')"  data-toggle="modal" data-target=".bd-example-modal-lg"/>
            </td>
            <td>
              <input id="octubre__origen" class="ancho__total__input obligatorios__2 form-control" readonly 
              onclick="obtener_valor_mes_honorarios('octubre')"  data-toggle="modal" data-target=".bd-example-modal-lg"/>
            </td>
            <td>
              <input id="noviembre__origen" class="ancho__total__input obligatorios__2 form-control" readonly 
              onclick="obtener_valor_mes_honorarios('noviembre')"  data-toggle="modal" data-target=".bd-example-modal-lg"/>
            </td>
            <td>
              <input id="diciembre__origen" class="ancho__total__input obligatorios__2 form-control" readonly 
              onclick="obtener_valor_mes_honorarios('diciembre')"  data-toggle="modal" data-target=".bd-example-modal-lg"/>
            </td>
          </tr>
        </tbody>
      </table>

    </section>
  </p>
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-2">

      </div>
      <div class="col-md-2">       
        <button class="form-control" onclick="verHonorarios()" data-toggle="modal" data-target="#ver_historial">Historial </button>
      </div>
      <div class="col-md-2">  
        <button class="form-control" onclick="nuevo_personal_dos()" data-toggle="modal" data-target="#nuevo_personal">Nuevo personal</button>
     </div>
     <div class="col-md-2">  
       <button class="form-control" onclick="reemplazo()" data-toggle="modal" data-target="#reemplazo">Reemplazo </button>
     </div>        

   </div>

 </div>

 <div id="honorarios"></div>
 <div id="honorarios1"></div>
 <div class="col col-12 text-center textos__titulos__2d">Destino</div> 
 <div id="origen"></div> 
</center>

<section class='content row mt-4 borde__separacion__mo' style='padding:.5em;'>




  <table class='col col-12 table__bordes__ejecutados mt-4'>

    <thead>



      <tr class=''>

        <th class='vertical__aign'><center>Actividad</center></th> 
        <th class='vertical__aign'><center>Ítem</center></th>
        <th class='vertical__aign'><center></center></th>
        <th class='vertical__aign'><center>Código item presupuestario</center></th>
        <th class='vertical__aign'><center>Mes</center></th>
        <th class='vertical__aign'><center>Monto</center></th>

      </tr>

    </thead>

    <tbody>

      <tr>

        <td>
          <select id='actividad__modificaciones__destino__new' class='ancho__total__input obligatorios'></select>
        </td>

        <td>
          <select id='item__modificaciones__destino__new' onclick="ver_items(<?php echo $informacionObjeto[0]; ?>)" class='ancho__total__input obligatorios'></select>
        </td>

        <td>
          <input id='codigo__presupuestarios__destino__new' class='ancho__total__input obligatorios' readonly='' />
        </td>
        <?php

        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");     
        $mesActual=date("m") * 1;


        ?>
        <td>
          <select id='meses' class='ancho__total__input obligatorios'>
            <option >--Seleccione--</option>
            <?php  
            for ($i=($mesActual-1); $i < 12 ; $i++) { 
              echo "  <option value=".$meses[$i]." >".$meses[$i]."</option>";
            } 

            ?>

          </select>
        </td>

        <td>
          <input id='monto__seleccionados__destino__new' class='ancho__total__input obligatorios' />
        </td>
        <td>
         <button class="form-control btn btn-primary" onclick="modificacion_item_presupuestario()">Guardar</button>
       </td>


     </tr>

   </tbody>



 </table>


</section>
</div>
<div id="data"></div>
<div id="destino"></div>
<div id="suministros"></div>

<div id="mensaje"></div>
</div>
</div> 

