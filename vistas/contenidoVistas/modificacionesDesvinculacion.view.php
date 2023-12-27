<?php $componentes= new componentes();?>
<?php $componentes__modificaciones= new componentes__modificaciones();?> 

<div class="content-wrapper d d-flex flex-column align-items-center"> 
  <div class="col-md-12">


  </div>

  <div class="col-md-12">

    <section class="content row mt-4 borde__separacion__mo" style="padding: 0.5em;">
      <div class="col col-12 text-center textos__titulos__2d"><OBJECT>DESVINCULACIÓN</OBJECT></div>



      <div class="col-md-12">

        <section class="content row mt-4 borde__separacion__mo" style="padding: 0.5em;">
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
                <select id='personal1' onclick="ver1()" class='ancho__total__input obligatorios'></select>
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
              <th class="vertical__aign">
                <center>Total</center>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <input id="enero__origen" class="ancho__total__input obligatorios__2 form-control" readonly >
              </td>
              <td>
                <input id="febrero__origen" class="ancho__total__input obligatorios__2 form-control" readonly >
              </td>
              <td>
                <input id="marzo__origen" class="ancho__total__input obligatorios__2 form-control" readonly >
              </td>
              <td>
                <input id="abril__origen" class="ancho__total__input obligatorios__2 form-control" readonly >
              </td>
              <td>
                <input id="mayo__origen" class="ancho__total__input obligatorios__2 form-control" readonly >
              </td>
              <td>
                <input id="junio__origen" class="ancho__total__input obligatorios__2 form-control" readonly >
              </td>
              <td>
                <input id="julio__origen" class="ancho__total__input obligatorios__2 form-control" readonly >
              </td>
              <td>
                <input id="agosto__origen" class="ancho__total__input obligatorios__2 form-control" readonly>
              </td>
              <td>
                <input id="septiembre__origen" class="ancho__total__input obligatorios__2 form-control" readonly >
              </td>
              <td>
                <input id="octubre__origen" class="ancho__total__input obligatorios__2 form-control" readonly >
              </td>
              <td>
                <input id="noviembre__origen" class="ancho__total__input obligatorios__2 form-control" readonly >
              </td>
              <td>
                <input id="diciembre__origen" class="ancho__total__input obligatorios__2 form-control" readonly>
              </td>
              <td>
                <input id="total__origen" class="ancho__total__input obligatorios__2 form-control" readonly>
              </td>
            </tr>
          </tbody>
        </table>

      </section>



    </div>
  </section>

  <table class="col col-12 table__bordes__ejecutados">
    <thead>
      <tr>
       <th class="vertical__aign">
        <center>Tipo</center>
      </th>
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
      <th class="vertical__aign">
        <center>Total</center>
      </th>
      <th class="vertical__aign">
        <center>Acción</center>
      </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <select id="tipo_desvinculacion" class='ancho__total__input '>
   <option value="desahucio">Compensación por Desahucio </option>
         <option value="despido" >Despido Intempestivo</option>
         <option value="renuncia">Por Renuncia Voluntaria</option>
         <option value="compensación">Compensación por Vacaciones no Gozadas por Cesación de Funciones</option>
       </select>

     </td>
     <td>
      <input id="enero__despido" class="ancho__total__input obligatorios__2 form-control" type="number" value="0" />
    </td>
    <td>
      <input id="febrero__despido" class="ancho__total__input obligatorios__2 form-control" type="number" value="0" />
    </td>
    <td>
      <input id="marzo__despido" class="ancho__total__input obligatorios__2 form-control" type="number" value="0" />
    </td>
    <td>
      <input id="abril__despido" class="ancho__total__input obligatorios__2 form-control" type="number" value="0" />
    </td>
    <td>
      <input id="mayo__despido" class="ancho__total__input obligatorios__2 form-control"  type="number" value="0" />
    </td>
    <td>
      <input id="junio__despido" class="ancho__total__input obligatorios__2 form-control" type="number" value="0" />
    </td>
    <td>
      <input id="julio__despido" class="ancho__total__input obligatorios__2 form-control" type="number" value="0" />
    </td>
    <td>
      <input id="agosto__despido" class="ancho__total__input obligatorios__2 form-control"  type="number" value="0" />
    </td>
    <td>
      <input id="septiembre__despido" class="ancho__total__input obligatorios__2 form-control" type="number" value="0" />
    </td>
    <td>
      <input id="octubre__despido" class="ancho__total__input obligatorios__2 form-control" type="number" value="0" />
    </td>
    <td>
      <input id="noviembre__despido" class="ancho__total__input obligatorios__2 form-control" type="number" value="0" />
    </td>
    <td>
      <input id="diciembre__despido" class="ancho__total__input obligatorios__2 form-control" type="number" value="0" />
    </td>
    <td>
      <input id="total__despido" class="ancho__total__input obligatorios__2 form-control" type="number" value="0" />
    </td>
    <td><button type="button" class="btn btn-primary" onclick="guardar_desvinculacion()">Guardar</button></td>
  </tr>
</tbody>
</table>

</div>
<p/>


<div id="data"></div>
<div id="mnensaje"></div>
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
