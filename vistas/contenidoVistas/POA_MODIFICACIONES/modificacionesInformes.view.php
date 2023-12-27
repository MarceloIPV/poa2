<?php $componentes= new componentes();?>
<?php $componentes__modificaciones= new componentes__modificaciones();?> 
<?php  session_start();
 
$nombreOD = $_SESSION["nombreOD"];

?>
<body onload="tabla_total()"></body>
<div class="content-wrapper d d-flex flex-column align-items-center"> 
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-7">
      
      </div>      
     </div>    
</div>
<div class="col-md-12">
	<div class="row">
		<p>
		<h5 align="center">Informe Técnico de Modificación al Plan Anual 2022 de " <?php echo $nombreOD;  ?>"</h5>
		</p>
		<div class="col-md-12">
			<div class="row">
				<div class="3">
					
				</div>
				<div class="col-md-2">
					<h5 ></h5>
				</div>
				<div class="col-md-7">
					<h5> Nombre: <?php echo $nombreOD;  ?></h5>
				</div>
				
			</div>
			
		</div>	


		<div class="col-md-12">
			<div class="row">
				<div class="3">
					
				</div>
				<div class="col-md-2">
					<h5 ></h5>
				</div>
				<div class="col-md-7">
					<h5> Fecha: <?php 
                    $DateAndTime = date('d-m-Y'); 
					echo $DateAndTime; 

					 ?></h5>
				</div>
				
			</div>
			
		</div>



		<div class="col-md-12">
			<div class="row">
				<div class="3">
					
				</div>
				<div class="col-md-2">
					<h5 ></h5>
				</div>
				<div class="col-md-7">
					<h5> Antecedentes:</h5>
				</div>
				
			</div>
			
		</div>	
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-7">
					
				</div>
				
				<div class="col-md-3">
					<!--<h5> <a href="/msppoa/php/prueba3.pdf" target="_blank">Descargar informe  [PDF]</a></h5>-->
				</div>
				
			</div>
			
		</div>	


		<div class="col-md-12">
			<div class="row">
				<div class="3">
					
				</div>
				<div class="col-md-2">
					<h5 ></h5>
				</div>
				<div class="col-md-7">
				<div id="tabla_total"></div>
				</div>
				
			</div>
			
		</div>	




		<div class="col-md-12">
				<div class="row">
					<div class="col-md-3">
					</div>
					<div class="col-md-1">
						<input type="checkbox" id="cbox1"  value="first_checkbox"> 
					</div>
					<div class="col-md-4">
						<h6>Declaro que las modificaciones aqui planteadas corresponden a las necesidades de la gestión de organismo deportivo las cuales estan en pleno conocimiento de las autoridades de las misma.</h6>
					</div>
					<div class="col-md-1">
						<button type="button" class="btn btn-success" onclick="envio()">Enviar</button>
					</div>
					
				</div>
				</div>




<div id="mensaje"></div>

	</div>	
</div>
