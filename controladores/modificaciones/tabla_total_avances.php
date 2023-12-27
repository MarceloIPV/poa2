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
				<TH COLSPAN=3>Ingreso de tramites</TH>
				<TH COLSPAN=3>Revisión, Aprobación, Observación</TH>					
				<TH COLSPAN=1>Emisión de la Resolución</TH>
			</TR>

			<TR>
				<TH COLSPAN=1>OD</TH>
				<TH COLSPAN=1>Subsecretaria de AR</TH>
				<TH COLSPAN=1>Dirección de DA</TH>					
				<TH COLSPAN=1>Analista DA </TH>
				<TH COLSPAN=1>Analista DA </TH>
				<TH COLSPAN=1>Dirección de DA</TH>
				<TH COLSPAN=1>Subsecretaria de AR</TH>
				<TH COLSPAN=1>Dirección de Planificación</TH>
			</TR>

			<TR>
					<TD>FEDERACION DEPORTIVA PROVINCIAL DE BOLIVAR</TD> 
					<TD>2022-10-07 16:13:33</TD> 
					<TD>2022-10-07 16:13:33</TD> 
					<TD>2022-10-07 16:13:33</TD>
					<TD>2022-10-07 16:13:33</TD> 
					<TD>2022-10-07 16:13:33</TD>
					<TD>2022-10-07 16:13:33</TD> 
					<TD>2022-10-07 16:13:33</TD>				
				</TR>
					

				

			</TABLE>

		
	</div>


