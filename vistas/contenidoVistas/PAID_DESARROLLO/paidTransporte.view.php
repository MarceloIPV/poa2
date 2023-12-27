
<?php $componentes= new componentes();
$componentesPaid= new componentesPaid();

session_start();


$tipoProyecto=1;

$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];

$idOrganismoSession = $_SESSION["idOrganismoSession"];



$objeto= new usuarioAcciones();?>

<input type="hidden" style="width:10%" id="JuegosNacionalesIDComponentes" name="JuegosNacionalesIDComponentes">
<input type="hidden" style="width:10%" id="JuegosNacionalesIDRubro" name="JuegosNacionales">
<input type="hidden" id="identificador" name="identificador" value="1">


<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

    <input type="hidden" style="width:10%" id="JuegosNacionalesIDRUBRO" name="JuegosNacionalesIDComponentes">
	<input type="hidden" style="width:10%" id="JuegosNacionalesIDCOMPONENTE" name="JuegosNacionalesIDComponentes">

    <h3 id='tituloComponenteJN' align='center'></h3>
		
		<h3 id='tituloJN' align='center'></h3> 

		

		<div class="row">

			<div class="container-fluid pt-2 px-2">
                <div class="row g-2">
					<div class="col-sm-4">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
							<h4 class="mb-0">Monto Rubro:</h4>
                            <div class="ms-3">
                                <h4 id='MontoJN' class="mb-0"></h4>
                            </div>
                        </div>
                    </div>
					

                    <div class="col-sm-4">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
							<h4 class="mb-0">Monto Planificado:</h4>
                            <div class="ms-3">
                                <h4 id='MontoAsignadoJN' class="mb-0 restar__montos"></h4>
                            </div>
                        </div>
                    </div>
					
                    <div class="col-sm-4">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
							<h4 class="mb-0">Monto Por Planificar:</h4>
                            <div class="ms-3">
                                <h4 id='MontoPorAsignarJN'  class="mb-0"></h4>
                            </div>
                        </div>
                    </div>
                  
                </div>
            </div>

			<div class="container-fluid pt-2 px-2 " >
                <div class="row g-2 justify-content-center align-items-center" >
				<div class="col-sm-6">
					<div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    	<div class="d-flex align-items-center"><i class="fas fa-dollar-sign" style="color: #057f46;"></i>
                    		<div class="ms-3">
                        	<p class="mb-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Total Invertido <font id="TotalInvertidoTransporte"></font></font></font></p>
                    		</div>
                    	</div>
                	</div>
				</div>

				</div>
            </div>



            <div class="select" align="center">
                <select id="selectTransporte" class="selectPersonalizado">
                    <option value="0" selected>--Seleccione Una Opcion--</option>
                    <option value="1">Por Deporte</option>
                    <option value="2">Por Provincia</option>
                    
                </select>
            </div>


            <?= $componentesPaid->get_matrices_generales_paid_desarrollo("divTransporteDeporte","btnNuevoTransporteDeporte","modalTransporteDeporte","paidTransporteDeporte"); ?>
       
            <?= $componentesPaid->get_matrices_generales_paid_desarrollo("divTransporteProvincia","btnNuevoTransporteProvincia",'modalTransporteProvincia',"paidTransporteProvincia"); ?>
  



		
		</div>

	</section>

</div>


<?= $componentesPaid->getModal_matrices_seguros_paid("modalTransporteDeporte","Transporte Por Deporte",'cerrarTransporteDeporte',"itemTransporteDeporte","(530204) - Edición, Impresión, Reproducción, Publicaciones, Suscripciones, Fotocopiado, Traducción, Empastado, Enmarcación, Serigrafía, Fotografía, Carnetización, Filmación e Imágenes Satelitales.","191","Deporte","selectorTransporteDeporte","valorUnitarioTransporteDeporte","cantidadTransporteDeporte","nroCuposTransporteDeporte","valorTotalTransporteDeporte","guardarTransporteDeporte","eventoTransporteDeporte"); ?>
<?= $componentesPaid->getModal_matrices_seguros_paid("modalTransporteProvincia","Transporte Por Provincia",'cerrarTransporteProvincia',"itemTransporteProvincia","(530204) - Edición, Impresión, Reproducción, Publicaciones, Suscripciones, Fotocopiado, Traducción, Empastado, Enmarcación, Serigrafía, Fotografía, Carnetización, Filmación e Imágenes Satelitales.","191","Provincia","selectorTransporteProvincia","valorUnitarioTransporteProvincia","cantidadTransporteProvincia","nroCuposTransporteProvincia","valorTotalTransporteProvincia","guardarTransporteProvincia","eventoTransporteProvincia"); ?>



<script>
	

    $("#JuegosNacionalesIDRUBRO").val(localStorage.getItem('idrubro'));
	$("#JuegosNacionalesIDCOMPONENTE").val(localStorage.getItem('idComponente'));

    $.getScript("layout/scripts/js/PAID_DESARROLLO_JS/selector.js",function(){

    AsignarIdRubroJN("obtener_idRubro_JN",$("#identificador").val());  

    AsignarMontoPlanificadosDesarrollo("obtener_valor_total_matrices_desarrollo")

    });	

</script>


