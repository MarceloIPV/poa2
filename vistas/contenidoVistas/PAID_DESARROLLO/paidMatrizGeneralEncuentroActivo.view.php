
<?php $componentes= new componentes();
$componentesPaid= new componentesPaid();

session_start();


$tipoProyecto=1;

$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];

$idOrganismoSession = $_SESSION["idOrganismoSession"];

$json_variable = json_encode($aniosPeriodos__ingesos, JSON_HEX_TAG);



$objeto= new usuarioAcciones();?>





<input type="hidden" style="width:10%" id="JuegosNacionalesIDAsignacion" name="JuegosNacionalesIDComponentes">
<input type="hidden" style="width:10%" id="JuegosNacionalesIDComponentes" name="JuegosNacionalesIDComponentes">
<input type="hidden" style="width:10%" id="JuegosNacionalesIDRubro" name="JuegosNacionales">
<input type="hidden" id="identificador" name="identificador" value="1">


<div class="content-wrapper">

    <input type="hidden" style="width:10%" id="JuegosNacionalesIDRUBRO" name="JuegosNacionalesIDComponentes">
	<input type="hidden" style="width:10%" id="JuegosNacionalesIDCOMPONENTE" name="JuegosNacionalesIDComponentes">

	<section class="content row d d-flex justify-content-center">

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
                        	<p class="mb-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Total Invertido <font id="TotalInvertidoMatricesAuxiliaresJN"></font></font></font></p>
                    		</div>
                    	</div>
                	</div>
				</div>

				</div>
            </div>


            <div class="select" align="center">
                <select id="selectPersonalizado">
                    <option value="0" selected>--Seleccione Una Opcion--</option>
                    <option value="Adecentamiento">Adecentamiento</option>
                    <option value="Bienes">Bienes</option>
                    <option value="Medicinas">Medicinas</option>
                    <option value="Alquiler de Equipos">Alquiler de Equipos</option>
                    <option value="Compra de Equipos">Compra de Equipos</option>
                    <option value="Logística Evento">Logística Evento</option>
                    <option value="Publicidad">Publicidad</option>
                    <option value="Acreditaciones">Acreditaciones</option>
                </select>
            </div>


            <?= $componentesPaid->get_matrices_generales_paid_desarrollo("divAdecentamiento","btnNuevoAdecentamiento","modalAdecentamiento","paidAdecentameintoJN"); ?>

            <?= $componentesPaid->get_matrices_generales_paid_desarrollo("divBienes","btnNuevoBienes",'ModalBienes',"paidBienesJN"); ?>
       
            <?= $componentesPaid->get_matrices_generales_paid_desarrollo("divMedicinas","btnNuevoMedicinas","ModalMedicinas","paidMedicinasJN"); ?>
      
            <?= $componentesPaid->get_matrices_generales_paid_desarrollo("divAlqEquipos","btnNuevoAlqEquipos",'ModalAlqEquipos',"paidAlqEquiposJN"); ?>
      
            <?= $componentesPaid->get_matrices_generales_paid_desarrollo("divComEquipos","btnNuevoCompEquipos",'ModalComEquipos',"paidComEquiposJN"); ?>
            
            <?= $componentesPaid->get_matrices_generales_paid_desarrollo("divLogEvento","btnNuevoLogEventos",'ModalLogEvnetos',"paidLogEventosJN"); ?>
            
            <?= $componentesPaid->get_matrices_generales_paid_desarrollo("divPublicidad","btnNuevoPublicidad",'ModalPublicidad',"paidPublicidadJN"); ?>
           
            <?= $componentesPaid->get_matrices_generales_paid_desarrollo("divAcreditaciones","btnNuevoAcreiditaciones",'ModalAcreditaciones',"paidAcreditacionesJN"); ?>


		</div>




	</section>

</div>


<?= $componentesPaid->getModal_matrices_general__paid("modalAdecentamiento","Adecentamiento",'cerrarAdecentamiento',"itemAdecentamiento","descripcionAdecentamiento","valorTotalAdecentamiento","guardarAdecentamiento","selectEventoAdecentamiento"); ?>
<?= $componentesPaid->getModal_matrices_general__paid("ModalBienes","Bienes",'cerrarBienes',"itemBienes","descripcionBienes","valorTotalBienes","guardarBienes","selectEventoBienes"); ?>
<?= $componentesPaid->getModal_matrices_general_Item_estatico_paid("ModalMedicinas","Medicinas",'cerrarMedicinas',"itemMedicinas","(530809) - Medicinas y Productos de farmacia ","210","descripcionMedicinas","valorTotalMedicinas","guardarMedicinas","selectEventoMedicinas"); ?>
<?= $componentesPaid->getModal_matrices_general__paid("ModalAlqEquipos","Alquiler de Equipos",'cerrarAlqEquipos',"itemAlqEquipos","descripcionAlqEquipos","valorTotalAlqEquipos","guardarAlqEquipos","selectEventoAlqEquipos"); ?>
<?= $componentesPaid->getModal_matrices_general__paid("ModalComEquipos","Compra de Equipos",'cerrarComEquipos',"itemComEquipos","descripcionComEquipos","valorTotalComEquipos","guardarComEquipos","selectEventoComEquipos"); ?>
<?= $componentesPaid->getModal_matrices_general__paid("ModalLogEvnetos","Logística de Eventos",'cerrarLogEventos',"itemLogEventos","descripcionLogEventos","valorTotalLogEventos","guardarLogEventos","selectEventoLogEvento"); ?>
<?= $componentesPaid->getModal_matrices_general_Item_estatico_paid("ModalPublicidad","Publicidad",'cerrarPublicidad',"itemPublicidad","(530204) - Edición, Impresión, Reproducción, Publicaciones, Suscripciones, Fotocopiado, Traducción, Empastado, Enmarcación, Serigrafía, Fotografía, Carnetización, Filmación e Imágenes Satelitales.","191","descripcionPublicidad","valorTotalPublicidad","guardarPublicidad","selectEventoPublicidad"); ?>   
<?= $componentesPaid->getModal_acreditaciones__paid("ModalAcreditaciones","Acreditaciones",'cerrarAcreditaciones',"itemAcreditaciones","(530204) - Edición, Impresión, Reproducción, Publicaciones, Suscripciones, Fotocopiado, Traducción, Empastado, Enmarcación, Serigrafía, Fotografía, Carnetización, Filmación e Imágenes Satelitales.","191","descripcionAcreditaciones","cantidadAcreditaciones","valorUnitarioAcreditaciones","valorTotalAcreditaciones","guardarAcreditaciones","selectEventoAcreditaciones"); ?>       


<?= $componentesPaid->getModalEditarMatricesGeneralesJN("modalMatricesGeneralesAdecentamiento", "formModalMatricesGeneralesAdecentamiento", "idTituloModalGeneralesAdecentamiento", "tablaMatrizGeneralAdecentamiento", "guardarEditorMatricesGeneralesAdecentamiento", "btnCerrarMatricesGeneralesAdecentamiento"); ?>
<?= $componentesPaid->getModalEditarMatricesGeneralesJN("modalMatricesGeneralesBienes", "formModalMatricesGeneralesBienes", "idTituloModalGeneralesBienes", "tablaMatrizGeneralBienes", "guardarEditorMatricesGeneralesBienes", "btnCerrarMatricesGeneralesBienes"); ?>
<?= $componentesPaid->getModalEditarMatricesGeneralesJN("modalMatricesGeneralesMedicinas", "formModalMatricesGeneralesMedicinas", "idTituloModalGeneralesMedicinas", "tablaMatrizGeneralMedicinas", "guardarEditorMatricesGeneralesMedicinas", "btnCerrarMatricesGeneralesMedicinas"); ?>
<?= $componentesPaid->getModalEditarMatricesGeneralesJN("modalMatricesGeneralesAlqEquipos", "formModalMatricesGeneralesAlqEquipos", "idTituloModalGeneralesAlqEquipos", "tablaMatrizGeneralAlqEquipos", "guardarEditorMatricesGeneralesAlqEquipos", "btnCerrarMatricesGeneralesAlqEquipos"); ?>
<?= $componentesPaid->getModalEditarMatricesGeneralesJN("modalMatricesGeneralesComEquipos", "formModalMatricesGeneralesComEquipos", "idTituloModalGeneralesComEquipos", "tablaMatrizGeneralComEquipos", "guardarEditorMatricesGeneralesComEquipos", "btnCerrarMatricesGeneralesComEquipos"); ?>
<?= $componentesPaid->getModalEditarMatricesGeneralesJN("modalMatricesGeneralesLogEventos", "formModalMatricesGeneralesLogEventos", "idTituloModalGeneralesLogEventos", "tablaMatrizGeneralLogEventos", "guardarEditorMatricesGeneralesLogEventos", "btnCerrarMatricesGeneralesLogEventos"); ?>
<?= $componentesPaid->getModalEditarMatricesGeneralesJN("modalMatricesGeneralesPublicidad", "formModalMatricesGeneralesPublicidad", "idTituloModalGeneralesPublicidad", "tablaMatrizGeneralPublicidad", "guardarEditorMatricesGeneralesPublicidad", "btnCerrarMatricesGeneralesPublicidad"); ?>
<?= $componentesPaid->getModalEditarMatricesGeneralesJN("modalMatricesGeneralesAcreditaciones", "formModalMatricesGeneralesAcreditaciones", "idTituloModalGeneralesAcreditacionesAcreditaciones", "tablaMatrizGeneralAcreditaciones", "guardarEditorMatricesGeneralesAcreditaciones", "btnCerrarMatricesGeneralesAcreditaciones"); ?>

<script>

    $("#JuegosNacionalesIDRUBRO").val(localStorage.getItem('idrubro'));
	$("#JuegosNacionalesIDCOMPONENTE").val(localStorage.getItem('idComponente'));
   
    $.getScript("layout/scripts/js/PAID_DESARROLLO_JS/selector.js",function(){

    AsignarIdRubroJN("obtener_idRubro_JN",$("#identificador").val());  

    AsignarMontoPlanificadosDesarrollo("obtener_valor_total_matrices_desarrollo")

    });	

</script>