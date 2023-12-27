<?php $componentes= new componentes();?>
<?php $componentes__modificaciones= new componentes__modificaciones();?> 
<body onload="origen_sueldo(),destino_sueldo()"></body>
<div class="content-wrapper d d-flex flex-column align-items-center"> 
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-7">
        <?=$componentes->getComponentes(1,"SUELDOS Y SALARIOS");?> 
      </div>      
      <div class="col-md-5">
        <div class="row">
         <div class="col-md-3">
          <button class="btn btn-default form-control" data-toggle="modal" data-target="#nuevoPersonal" onclick="nuevo_personal()">Personal</button>
        </div> 

        <div class="col-md-3">
         <button class="btn btn-default form-control" data-toggle="modal" data-target="#nuevoItem" onclick="nuevo_item()">Evento</button>
       </div>
       <div class="col-md-3">
         <button class="btn btn-default form-control" data-toggle="modal" data-target="#nuevoItem" onclick="historial_sueldos_salarios()">Historial</button>
       </div>   
     </div>        
   </div>
 </div>    
</div>

<div class="col-md-12">

  <section class="content row mt-4 borde__separacion__mo" style="padding: 0.5em;">
    <div class="col col-12 text-center textos__titulos__2d"><OBJECT>Orígen</OBJECT></div>
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
            <center> Tiempo de trabajo <br /> en meses </center>
          </th>
          <th class="vertical__aign">
            <center> Mensualización decimo <br /> tercera remuneración </center>
          </th>
          <th class="vertical__aign">
            <center> Mensualización décimo <br /> cuarta remuneración </center>
          </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <select id="empleado__origen" class="ancho__total__input obligatorios__2 form-control"></select>
          </td>
          <td>
            <input id="cedula__origen" class="ancho__total__input obligatorios__2 form-control" readonly />
            <input type="hidden" id="idSueldos" class="ancho__total__input obligatorios__2 form-control" readonly />
          </td>
          <td>
            <input id="cargo__origen" class="ancho__total__input obligatorios__2 form-control" readonly />
          </td>
          <td>
            <input id="tipo__cargo__origen" class="ancho__total__input obligatorios__2 form-control" readonly />
          </td>
          <td>
            <input id="tiempo__trabajo__meses__origen" class="ancho__total__input obligatorios__2 form-control" readonly />
          </td>
          <td>
            <input id="mensualiza__tercero__origen" class="ancho__total__input obligatorios__2 form-control" readonly />
          </td>
          <td>
            <input id="mensualiza__cuarto__origen" class="ancho__total__input obligatorios__2 form-control" readonly />
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
            onclick="obtener_valor_mes('enero')"  data-toggle="modal" data-target=".bd-example-modal-lg"/>
          </td>
          <td>
            <input id="febrero__origen" class="ancho__total__input obligatorios__2 form-control" readonly 
            onclick="obtener_valor_mes('febrero')"  data-toggle="modal" data-target=".bd-example-modal-lg"/>
          </td>
          <td>
            <input id="marzo__origen" class="ancho__total__input obligatorios__2 form-control" readonly 
            onclick="obtener_valor_mes('marzo')"  data-toggle="modal" data-target=".bd-example-modal-lg"/>
          </td>
          <td>
            <input id="abril__origen" class="ancho__total__input obligatorios__2 form-control" readonly 
            onclick="obtener_valor_mes('abril')"  data-toggle="modal" data-target=".bd-example-modal-lg"/>
          </td>
          <td>
            <input id="mayo__origen" class="ancho__total__input obligatorios__2 form-control" readonly 
            onclick="obtener_valor_mes('mayo')"  data-toggle="modal" data-target=".bd-example-modal-lg"/>
          </td>
          <td>
            <input id="junio__origen" class="ancho__total__input obligatorios__2 form-control" readonly 
            onclick="obtener_valor_mes('junio')"  data-toggle="modal" data-target=".bd-example-modal-lg"/>
          </td>
          <td>
            <input id="julio__origen" class="ancho__total__input obligatorios__2 form-control" readonly 
            onclick="obtener_valor_mes('julio')"  data-toggle="modal" data-target=".bd-example-modal-lg"/>
          </td>
          <td>
            <input id="agosto__origen" class="ancho__total__input obligatorios__2 form-control" readonly 
            onclick="obtener_valor_mes('agosto')"  data-toggle="modal" data-target=".bd-example-modal-lg"/>
          </td>
          <td>
            <input id="septiembre__origen" class="ancho__total__input obligatorios__2 form-control" readonly 
            onclick="obtener_valor_mes('septiembre')"  data-toggle="modal" data-target=".bd-example-modal-lg"/>
          </td>
          <td>
            <input id="octubre__origen" class="ancho__total__input obligatorios__2 form-control" readonly 
            onclick="obtener_valor_mes('octubre')"  data-toggle="modal" data-target=".bd-example-modal-lg"/>
          </td>
          <td>
            <input id="noviembre__origen" class="ancho__total__input obligatorios__2 form-control" readonly 
            onclick="obtener_valor_mes('noviembre')"  data-toggle="modal" data-target=".bd-example-modal-lg"/>
          </td>
          <td>
            <input id="diciembre__origen" class="ancho__total__input obligatorios__2 form-control" readonly 
            onclick="obtener_valor_mes('diciembre')"  data-toggle="modal" data-target=".bd-example-modal-lg"/>
          </td>
        </tr>
      </tbody>
    </table>
    <table class="col col-12 table__bordes__ejecutados">
      <thead>
        <tr>

        </tr>
      </thead>
      <tbody>
        <tr>

        </tr>
      </tbody>
    </table>
  </section>



</div>
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
        <th class='vertical__aign'><center>Ítem</center></th>
        <th class='vertical__aign'><center></center></th>
        <th class='vertical__aign'><center>Código item presupuestario</center></th>
        <th class='vertical__aign'><center>Mes</center></th>
        <th class='vertical__aign'><center>Monto</center></th>
        <th class='vertical__aign'><center>Acción</center></th>

      </tr>

    </thead>

    <tbody>

      <tr>

        <td>
          <select id='actividad__modificaciones__destino__new'  class='ancho__total__input obligatorios'></select>
        </td>

        <td>
          <select id='item__modificaciones__destino__new' onclick="obtener_items()" class='ancho__total__input obligatorios'></select>
        </td>
        <td>
          <div class="ancho__total__input obligatorios" id="personal"></div>
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
          <input type="hidden" id="idModificacionOrigen" class="ancho__total__input obligatorios__2 form-control" readonly />
        </td>
        <td>
         <button class="form-control btn btn-primary" onclick="modificacion_sueldo_Salario_disminuyer_destino()" >Guardar</button>
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
    <div class="col-md-6">

     <div id="origen_sueldo"></div>
   </div>
   <div class="col-md-6">

    <div id="destino_sueldo"></div>
  </div>    
</div>   
</div>
</div>
</div> 








------------------
obtener_items