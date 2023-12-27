<?php $componentes= new componentes();?>
<?php $componentes__modificaciones= new componentes__modificaciones();?> 
<?php $objetoInformacion= new usuarioAcciones();?>
<?php $informacionObjeto=$objetoInformacion->getInformacionGeneral();?>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<body onload="vacantes(<?php echo $informacionObjeto[0]; ?>),recursos_sobrantes(),cumplimiento()" ></body>
<div class="content-wrapper d d-flex flex-column align-items-center"> 
  <?=$componentes->getComponentes(1,"DASHBOAD");?> 
  <hr>
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-4">   
        <?php   $mesActual=date("m") * 1;
        if ($mesActual == 7) {
         ?>

         <h5 class="textos__titulos__dash" style="text-align: center" >Vacantes</h5>
         <div class="col-md-12">
          <div class="row">
           <div id="vacantes"></div>
         </div>    
       </div> 
     <?php }else{
      echo '

         <h5 class="textos__titulos__dash" style="text-align: center" >Sin novedades</h5>';
     } ?>     
   </div>
   <div class="col-md-4">
    <h5 class="textos__titulos__dash" style="text-align: center"></h5>

    <div id="recursos_sobrantes"></div>
  </div>
  <div class="col-md-4">
    <h5 class="textos__titulos__dash" style="text-align: center">Cumplimiento</h5>






    <figure class="highcharts-figure">
      <div id="container"></div>
      <p class="highcharts-description">

      </p>
    </figure>

    <div id="graficas"></div>
  </div>
</div>
</div> 

<script type="text/javascript">
  // Data retrieved from https://netmarketshare.com
  Highcharts.chart('container', {
    chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false,
      type: 'pie'
    },
    title: {
      text: ''
    },
    tooltip: {
      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
      point: {
        valueSuffix: '%'
      }
    },
    plotOptions: {
      pie: {
        allowPointSelect: true,
        cursor: 'pointer',
        dataLabels: {
          enabled: true,
          format: '<b>{point.name}</b>: {point.percentage:.1f} %'
        }
      }
    },
    series: [{
      name: 'Brands',
      colorByPoint: true,
      data: [{
        name: 'Por cumplir',
        y: 60,
        sliced: true,
        selected: true
      }, {
        name: 'Cumplidos',
        y: 40
      }]
    }]
  });

</script>
<style type="text/css">
  .highcharts-figure,
  .highcharts-data-table table {
    min-width: 320px;
    max-width: 800px;
    margin: 1em auto;
  }

  .highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
  }

  .highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
  }

  .highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
  }

  .highcharts-data-table td,
  .highcharts-data-table th,
  .highcharts-data-table caption {
    padding: 0.5em;
  }

  .highcharts-data-table thead tr,
  .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
  }

  .highcharts-data-table tr:hover {
    background: #f1f7ff;
  }

  input[type="number"] {
    min-width: 50px;
  }

</style>