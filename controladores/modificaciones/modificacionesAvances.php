	<?php 	
	
	extract($_POST);
	require_once "../../config/config2.php";
	session_start();
	$idOrganismoSession = $_SESSION["idOrganismoSession"];
	$objeto= new usuarioAcciones();

	?>

	<div style="height:500px; overflow: scroll;">
		<TABLE BORDER>
			<TR>
				<TH ROWSPAN=1></TH>
				<TH COLSPAN=2>Origen</TH>
				<TH COLSPAN=2>Destino</TH>					
				<TH COLSPAN=2></TH>
			</TR>
			<TR>
				<TH COLSPAN=1>No.</TH>
				<TH COLSPAN=1>Descripción</TH>
				<TH COLSPAN=1>Monto</TH>					
				<TH COLSPAN=1>Descripción</TH>
				<TH COLSPAN=1>Monto</TH>
				<TH COLSPAN=1>Justificación</TH>
			</TR>

			<TR>
				<TH COLSPAN=6>ACTIVIDAD 1</TH>				
			</TR>	

			<?php 

			$indicadorInformacion1=$objeto->getObtenerInformacionGeneral("SELECT * from poa_disminucion_sueldo_destino where idOrganismo='$idOrganismoSession'and estado='A' and estado_montos=1 and actividad=1");
			$jason['indicadorInformacion']=$indicadorInformacion1;
			?>
			<TR>
				<?php 
				foreach ($indicadorInformacion1 as $row1)
				{
					$c1=$c1+1;
					$nombre= $row1["actividad"];
				?>
					<TH><?php echo $c1; ?></TH>
					<TD>Item 9</TD> 
					<TD>Item 10</TD> 
					<TD>Item 3</TD> 
					<TD>Item 11</TD>
					<TD>Item 11</TD>

				<?php }
				?> 
				
				</TR>

				

			</TABLE>

		
	</div>


