<?php $componentes= new componentes();?>
<?php $componentes__modificaciones= new componentes__modificaciones();?> 
<?php  session_start();
 
$nombreOD = $_SESSION["nombreOD"];

?>
<body onload="tabla_total_avances()"></body>
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
		<h5 align="center">Informe de avances </h5>
		</p>
	


		<div class="col-md-12">
			<div class="row">
				<div class="1">
					
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
			
			
				<div class="col-md-12">
				<div id="tabla_total_avances"></div>
				</div>
				

				
			</div>
			
		</div>	






	</div>	
</div>
