<?php
	
	ob_start(); 

	extract($_POST);

	
	date_default_timezone_set("America/Guayaquil");

	$fecha_actual = date('Y-m-d');

	$hora_actual= date('H:i:s');	
	
	/*=====  End of Parametros Iniciales  ======*/
	

	session_start();

	$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];


	switch ($tipoPdf) {

		case  "documento__declaracion__seguimientos":


			/*===================================
			=            Generar pdf          =
			===================================*/

			$parametro1="../../documentos/declaracionTerminos/";
			$parametro2="declaracion";	
			$parametro3=$idOrganismo."__".$fecha_actual;
			
			/*=====  End of Generar pdf  ======*/

			if (isset($fechaEnviare)) {
				$fecha_actual=$fechaEnviare;
			}

			$documentoCuerpo='<br><br><table><thead><tr><th><center>DECLARACIÓN DE RESPONSABILIDAD DEL CORRECTO USO DEL RECURSO PÚBLICO Y ENTREGA DE INFORMACIÓN PARA EL SEGUIMIENTO Y EVALUACIÓN</center></th></tr></thead></table>';


			$documentoCuerpo.='<br><br><table><thead>tr><th align="right"><div style="text-align:left!important;">Fecha: '.$fecha_actual.'</div></th></tr><tr><th align="right"><div style="text-align:right!important;  position:relative; left:400%!important;">Declaración Nro. '.$idMaximo.'</div></th></tr></thead></table><br><br>';

			$documentoCuerpo.='<table><tr><th>Aplicativo de Seguimiento y Evaluación al POA</th></tr></table><br><br>';

			$documentoCuerpo.='<table><tr><th style="width:30%!important;">Organización Deportiva:</th><td>'.$nombreOrganismo.'</td></tr><tr><th style="width:30%!important;">Número de RUC:</th><td>'.$rucOrganismo.'</td></tr><tr><th style="width:30%!important;">Correo Electrónico:</th><td>'.$emailOrganismo.'</td></tr></table><br><br>';

			if($trimestreEvaluador=="primerTrimestre") {
				$variableTrimestral="Primer Trimestre";
			}else if($trimestreEvaluador=="segundoTrimestre"){
				$variableTrimestral="Segundo Trimestre";
			}else if($trimestreEvaluador=="tercerTrimestre"){
				$variableTrimestral="Tercer Trimestre";
			}else if($trimestreEvaluador=="cuartoTrimestre"){
				$variableTrimestral="Cuarto Trimestre";
			}


			$documentoCuerpo.='<table><tr><td style="text-align:justify!important;"><span style="font-weight:bold!important;">'.$nombreOrganismo.'</span> en el marco del Ciclo de Planificación de las organizaciones deportivas, realiza la entrega de la información de seguimiento y evaluación del Período <span style="font-weight:bold!important;">'.$variableTrimestral.' '.$aniosPeriodos__ingesos.' </span>; y, en cumplimiento a los principios de ética, probidad, buena fe, respeto al ordenamiento jurídico y a la autoridad legítima, entre otros, que rigen los deberes de las personas y la relación entre éstas y la administración pública; así como a lo establecido en el artículo 10 de la Ley Orgánica para la Optimización y Eficiencia de Trámites Administrativos respecto a la veracidad de la información: “Las entidades reguladas por esta Ley presumirán que las declaraciones, documentos y actuaciones de las personas efectuadas en virtud de trámites administrativos son verdaderas, bajo aviso a la o al administrado de que, en caso de verificarse lo contrario, el trámite y resultado final de la gestión podrán ser negados y archivados, o los documentos emitidos carecerán de validez alguna, sin perjuicio de las sanciones y otros efectos jurídicos establecidos en la ley. El listado de actuaciones anuladas por la entidad en virtud de lo establecido en este inciso estará disponible para las demás entidades del Estado (...)”, DECLARA que realizó el correcto uso del recurso púbico, cumplió con los lineamientos establecidos por esta cartera de Estado, y que la información y documentación proporcionada como respaldo del gasto conforme el presupuesto entregado por el MINISTERIO DEL DEPORTE, es veraz, auténtica, legítima, fidedigna y apegada a la normativa legal vigente, información que podrá ser verificada por los entes de control, sin perjuicio de la responsabilidad penal prevista en el artículo 328 del Código Orgánico Integral Penal y sobre la base de esta declaración.</td></tr></table><br><br>';

				$documentoCuerpo.='<table><tr><td style="text-align:justify!important;">En ese sentido, reconoce y acepta que el MINISTERIO DEL DEPORTE realizará los reportes de seguimiento y evaluación trimestral e informe de evaluación anual sobre la base de la información presentada y cuyo contenido son de su exclusiva responsabilidad. Razón por la cual la DECLARANTE libra y exonera de toda responsabilidad al MINISTERIO DEL DEPORTE y a sus funcionarios por los actos que ejecuten con sustento en la información y documentación proporcionadas por ella, y personalmente asume toda aquella responsabilidad y consecuencias derivadas de esta. Las obligaciones establecidas en este párrafo se mantendrán vigentes aún después de terminado el acto requerido por la Declarante y prescribirán con sujeción a las normas aplicables.</td></tr></table><br><br>';

				$documentoCuerpo.='<table><tr><th style="text-align:justify!important;">Atentamente,</th></tr></table><br><br>';

				$documentoCuerpo.='<table><tr><th style="text-align:justify!important;">'.$nombreResponsable.' DE LA ORGANIZACIÓN DEPORTIVA '.$nombreOrganismo.'</th></tr></table><br><br>';


		

		break;

	}


?>

<html>

   <head>

      <link href="../../layout/styles/css/estilosPdf.css" rel="stylesheet" type="text/css" media="all">

   </head>

   <body>


     <div id="" style="position: relative; left: 10%;">

       <img src="../../images/headerPdf.png" />

     </div>

     <div id="footer">

       <img src="../../images/footer.png"/>

     </div>  	

     <div id="content">

		<?=$documentoCuerpo?>

	</div>

	</body>

</html>

<?php

include_once "../../dompdf/autoload.inc.php";

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$dompdf->loadHtml(ob_get_clean());

$dompdf->render();

$canvas = $dompdf->get_canvas(); 
$canvas->page_text(510, 12, "Página {PAGE_NUM} de {PAGE_COUNT}","helvetica", 8, array(0,0,0)); //header//header
$canvas->page_text(54, 778, "", "helvetica", 8, array(0,0,0)); //footer

$contenido = $dompdf->output();

$nombreDelDocumento =$parametro1.$parametro3.".pdf";

$bytes = file_put_contents($nombreDelDocumento, $contenido);

$dompdf->stream($parametro2);	

