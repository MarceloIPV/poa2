
<?php $componentes= new componentes();?>

<?php $componentes__indicadores= new componentes__incrementos__v1();?>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"TRÁMITES DE INCREMENTOS Y DECREMENTOS");?>

		<div class="row">

		<input type='hidden' id="identificador__pagina" name="identificador__pagina" value="incremento" />

		<table id="asignarPresupuestoMo__revisor__v__1" class="col col-12 cell-border">

			<thead>

				<tr>

					<th><center>RUC</center></th>
					<th><center>Organismo deportivo</center></th>
					<th><center>Provincia</center></th>
					<th><center>Trámite</center></th>
					<th><center>Aprobar</center></th>
					<th><center>Observar</center></th>

				</tr>

			</thead>

		</table>

		</div>

	</section>

</div>

<!--=============================
=            Modales            =
==============================-->

<?=$componentes__indicadores->getModalAtributosPdfs__aprobar("modalAprobarD");?>

<?=$componentes->getModalMatricezObserva2("modalVisualizaMatrices","formVisualizaM");?>

<script type="text/javascript" src="layout/scripts/js/incrementosDecrementos__v1/datatablets.js"></script>


<!--====  End of Modales  ====-->

<script type="text/javascript">
datatablets__funcio__repor__incrementos__v__2($("#asignarPresupuestoMo__revisor__v__1"),"asignarPresupuestoMo__revisor__v__1","seguimiento");

	var guardar__incrementos__revisores=function(boton,tipo,array){

	$(boton).click(function(e){

		if ($("#resolucionSubidas").val()=="" || $("#resolucionSubidas__fecha").val()=="" || $("#resolucionSubidas").val()==" " || $("#resolucionSubidas__fecha").val()==" ") {

			alertify.set("notifier","position", "top-center");
			alertify.notify("Obligatorio cargar el documento y escoger la fecha de la resolución", "error", 5, function(){});

		}else{

			var paqueteDeDatos = new FormData();

			$(boton).hide();

			let idOrganismo=$(array[0]).val();
			let fechaResolucion=$(array[2]).val();

			let tipo__organismos__m__n=$("#tipo__organismos__m__n").val();


			let idIncrementos=$("#idIncrementos").val();

			paqueteDeDatos.append('tipo',tipo);
			paqueteDeDatos.append('idOrganismo',idOrganismo);
			paqueteDeDatos.append('fechaResolucion',fechaResolucion);
			paqueteDeDatos.append('documentoFinal', $(array[1])[0].files[0]);
			paqueteDeDatos.append('tipoTramite',tipo__organismos__m__n);
			paqueteDeDatos.append('idIncrementos',idIncrementos);

			$.ajax({

				type:"POST",
				url:"modelosBd/incrementosDecrementos/inserta.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false,  
				success:function(response){

					let elementos=JSON.parse(response);
					let mensaje=elementos['mensaje'];

					if (mensaje==1) {

						alertify.set("notifier","position", "top-center");
					 	alertify.notify("Registro realizado correctamente", "success", 5, function(){});

				        window.setTimeout(function(){ 
					    	window.location ="revision";
					    } ,5000); 

					}


			    },
			    error:function(){
			    	
			    } 

			});


		}


	});

	}

	guardar__incrementos__revisores($("#guardarResolucion__incrementos"),"incrementos__guardar__resolucion",[$("#idOrganismo__m__n"),$("#resolucionSubidas"),$("#resolucionSubidas__fecha")]);

</script>


