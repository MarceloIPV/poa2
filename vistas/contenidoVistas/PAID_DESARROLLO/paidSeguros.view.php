
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
                        	<p class="mb-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Total Invertido <font id="TotalInvertidoSeguro"></font></font></font></p>
                    		</div>
                    	</div>
                	</div>
				</div>

				</div>
            </div>



            <div class="select" align="center">
                <select id="selectSeguros" class="selectPersonalizado">
                    <option value="0" selected>--Seleccione Una Opcion--</option>
                    <option value="1">Por Deporte</option>
                    <option value="2">Por Provincia</option>
                    
                </select>
            </div>


            <?= $componentesPaid->get_matrices_generales_paid_desarrollo("divSeguroDeporte","btnNuevoSeguroDeporte","modalSeguroDeporte","paidSeguroDeporte"); ?>
       
            <?= $componentesPaid->get_matrices_generales_paid_desarrollo("divSeguroProvincia","btnNuevoSeguroProvincia",'modalSeguroProvincia',"paidSeguroProvincia"); ?>
  



		
		</div>

	</section>

</div>


<?= $componentesPaid->getModal_matrices_seguros_paid("modalSeguroDeporte","Seguro Por Deporte",'cerrarSeguroDeporte',"itemSeguroDeporte","(530204) - Edición, Impresión, Reproducción, Publicaciones, Suscripciones, Fotocopiado, Traducción, Empastado, Enmarcación, Serigrafía, Fotografía, Carnetización, Filmación e Imágenes Satelitales.","191","Deporte","selectorSeguroDeporte","valorUnitarioSeguroDeporte","cantidadSeguroDeporte","nroCuposSeguroDeporte","valorTotalSeguroDeporte","guardarSeguroDeporte","eventoSeguroDeporte"); ?>
<?= $componentesPaid->getModal_matrices_seguros_paid("modalSeguroProvincia","Seguro Por Provincia",'cerrarSeguroProvincia',"itemSeguroProvincia","(530204) - Edición, Impresión, Reproducción, Publicaciones, Suscripciones, Fotocopiado, Traducción, Empastado, Enmarcación, Serigrafía, Fotografía, Carnetización, Filmación e Imágenes Satelitales.","191","Provincia","selectorSeguroProvincia","valorUnitarioSeguroProvincia","cantidadSeguroProvincia","nroCuposSeguroProvincia","valorTotalSeguroProvincia","guardarSeguroProvincia","eventoSeguroProvincia"); ?>



<script>

    $("#JuegosNacionalesIDRUBRO").val(localStorage.getItem('idrubro'));
	$("#JuegosNacionalesIDCOMPONENTE").val(localStorage.getItem('idComponente'));

    $.getScript("layout/scripts/js/PAID_DESARROLLO_JS/selector.js",function(){

    AsignarIdRubroJN("obtener_idRubro_JN",$("#identificador").val());  

    AsignarMontoPlanificadosDesarrollo("obtener_valor_total_matrices_desarrollo")

    });	

	$.getScript("layout/scripts/js/PAID_DESARROLLO_JS/datatablets.js",function(){

		datatabletsDesarollo($("#paidMedallasJuegosNacionales"), "paidMedallasJuegosNacionales");

	});	

</script>


