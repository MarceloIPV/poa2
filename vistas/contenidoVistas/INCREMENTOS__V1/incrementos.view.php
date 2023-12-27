
<?php $componentes= new componentes();?>

<?php $componentes__indicadores= new componentes__incrementos__v1();?>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"ASIGNACIÓN DE PRESUPUESTO");?>

		<div class="row">

		<input type='hidden' id="identificador__pagina" name="identificador__pagina" value="incremento" />

		<table id="asignarPresupuestoMo__incrementos__v__1" class="col col-12 cell-border">

			<thead>

				<tr>

					<th><center>RUC</center></th>
					<th><center>Organismo deportivo</center></th>
					<th><center>Provincia</center></th>
					<th><center>Teléfonos</center></th>
					<th><center>Monto</center></th>
					<th><center>Incrementar</center></th>
					<th><center>Estado</center></th>
					<th><center>Eliminar</center></th>

				</tr>

			</thead>

		</table>

		</div>

	</section>

</div>

<!--=============================
=            Modales            =
==============================-->

<?=$componentes__indicadores->getModalAtributosPdfs("modalAsignarPre","Incremento del presupuesto","incremento");?>


<!--====  End of Modales  ====-->

<script type="text/javascript" src="layout/scripts/js/incrementosDecrementos__v1/datatablets.js"></script>

<script type="text/javascript">
	datatablets__funcio__repor__incrementos__v__1($("#asignarPresupuestoMo__incrementos__v__1"),"asignarPresupuestoMo__incrementos__v__1","seguimiento");


	var guardar__incrementos=function(boton,tipo,array){

	$(boton).click(function(e){

		var paqueteDeDatos = new FormData();

		$(boton).hide();

		let idOrganismo=$(array[0]).val();
		let montoIngresadoModificacion__incrementos=$(array[1]).val();

		paqueteDeDatos.append('tipo',tipo);
		paqueteDeDatos.append('idOrganismo',idOrganismo);
		paqueteDeDatos.append('montoIngresadoModificacion__incrementos',montoIngresadoModificacion__incrementos);

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
				    	window.location ="incrementos";
				    } ,5000); 

				}


		    },
		    error:function(){
		    	
		    } 

		});

	});

	}

	guardar__incrementos($("#ingrementarValoGuardar"),"incrementos__guardar",[$("#idOrganismo__m"),$("#montoIngresadoModificacion__incrementos")]);

</script>


