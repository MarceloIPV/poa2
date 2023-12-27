<?php $componentes= new componentes();?>
<?php $componentes__modificaciones= new componentes__modificaciones();?>

<div class="content-wrapper d d-flex flex-column align-items-start row">

	<div class="d d-flex flex-column align-items-center row">

		<?=$componentes->getComponentes(1,"ACTIVIDADES DE MODIFICACIONES");?>

		<input type="hidden" id="tipoModificacion__administrador" name="tipoModificacion__administrador" />
		<br>

		<div class="row">
				
			<div class="col col-4">
				Seleccionar tipo de bloqueo
			</div>

			<div class="col col-8">
				<select id="tipo__bloqueo__modificaciones" name="tipo__bloqueo__modificaciones" class="ancho__total__input__selects obligatorio__elementos obligatorios__necesarios">
					<option value="0">--Seleccionar tipo de bloqueo--</option>
					<option value="actividad">Por actividad</option>
					<option value="actividadItem">Por actividad Ítem</option>
					<option value="item">Por ítem</option>
				</select>
			</div>

			<div class="col col-4 actividades__ocultas__modificaciones">
				Seleccionar actividad orígen
			</div>

			<div class="col col-8 actividades__ocultas__modificaciones">
				<select id="actividad__origen__modificaciones" name="actividad__origen__modificaciones" class="ancho__total__input__selects obligatorio__elementos obligatorios__necesarios"></select>
			</div>

			<div class="col col-4 item__ocultas__modificaciones item__solitario__origen">
				Seleccionar ítem orígen
			</div>

			<div class="col col-8 item__ocultas__modificaciones item__solitario__origen">
				<select id="item__origen__modificaciones" name="item__origen__modificaciones" class="ancho__total__input__selects obligatorio__elementos obligatorios__necesarios"></select>
			</div>

			<div class="col col-4 actividades__ocultas__modificaciones">
				Seleccionar actividad destino
			</div>

			<div class="col col-8 actividades__ocultas__modificaciones">
				<select id="actividad__destino__modificaciones" name="actividad__destino__modificaciones" class="ancho__total__input__selects obligatorio__elementos obligatorios__necesarios"></select>
			</div>

			<div class="col col-4 item__ocultas__modificaciones">
				Seleccionar ítem destino
			</div>

			<div class="col col-8 item__ocultas__modificaciones">
				<select id="item__destino__modificaciones" name="item__destino__modificaciones" class="ancho__total__input__selects obligatorio__elementos obligatorios__necesarios"></select>
			</div>

			<br>

		</div>

		<br>

		<div class="d d-flex justify-content-center">
			<button  id="guardar__modifiAdministrador" name="guardar__modifiAdministrador" class="btn btn-primary" style="width:10%;">GUARDAR</button>
		</div>

	</div>

	<br>

	<div class="row">

		<div class="col col-6 origen__items__actividades">
			
			<div class="col col-12 origen__act__dep" style="font-weight: bold; text-align: center; text-transform: uppercase;"></div>
			<div class="col col-12 origen__act__dep__nombre__act" style="font-weight: bold; text-align: center; text-transform: uppercase;"></div>

			<br>
			<br>

		</div>

		<div class="col col-6 destino__items__actividades">
			
			<div class="col col-12 destino__act__dep" style="font-weight: bold; text-align: center; text-transform: uppercase;"></div>
			<div class="col col-12 destino__act__dep__nombre__act" style="font-weight: bold; text-align: center; text-transform: uppercase;"></div>

			<br>
			<br>

		</div>

	</div>


</div>

<script>
	
$("#guardar__modifiAdministrador").click(function (e){

	let confirm= alertify.confirm('¿Está seguro de guardar la información?','¿Está seguro de guardar la información?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

	confirm.set({transition:'slide'});    

	confirm.set('onok', function(){ //callbak al pulsar botón positivo

	let paqueteDeDatos = new FormData();

	paqueteDeDatos.append('tipo','modificacion__informacion__administracion');
	let tipo__bloqueo__modificaciones=$("#tipo__bloqueo__modificaciones").val();
	let actividad__origen__modificaciones=$("#actividad__origen__modificaciones").val();
	let item__origen__modificaciones=$("#item__origen__modificaciones").val();
	let actividad__destino__modificaciones=$("#actividad__destino__modificaciones").val();
	let item__destino__modificaciones=$("#item__destino__modificaciones").val();
	paqueteDeDatos.append('tipo__bloqueo__modificaciones',tipo__bloqueo__modificaciones);
	paqueteDeDatos.append('actividad__origen__modificaciones',actividad__origen__modificaciones);
	paqueteDeDatos.append('item__origen__modificaciones',item__origen__modificaciones);
	paqueteDeDatos.append('actividad__destino__modificaciones',actividad__destino__modificaciones);
	paqueteDeDatos.append('item__destino__modificaciones',item__destino__modificaciones);

	/*=====  End of Destino  ======*/
			
		$.ajax({

			type:"POST",
			url:"modelosBd/POA_MODIFICACIONES_REVISOR/insertar.md.php",
			contentType: false,
			data:paqueteDeDatos,
			processData: false,
			cache: false, 
			success:function(response){

			var elementos=JSON.parse(response);
			var mensaje=elementos['mensaje'];

			if(mensaje==1){

				alertify.set("notifier","position", "top-center");
				alertify.notify("Acción realizada satisfactoriamente", "success", 5, function(){});

				window.setTimeout(function(){ 
					location.reload();
				} ,5000); 

			}	

			},
			error:function(){

			}		
		});	

	});

	confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
		alertify.set("notifier","position", "top-center");
		alertify.notify("Acción cancelada", "error", 1, function(){
		}); 
	}); 	

});

</script>