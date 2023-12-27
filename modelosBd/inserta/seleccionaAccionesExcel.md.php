<?php
	
	extract($_POST);

	
	define('CONTROLADOR7', '../../conexion/');

	require_once CONTROLADOR7.'conexion.php';

	require_once "../../config/config2.php";

	require_once '../../PHPExcel/Classes/PHPExcel.php';

	/*============================================
	=            Parametros Iniciales            =
	============================================*/
	
	date_default_timezone_set("America/Guayaquil");

	$anio = date('Y');

	$fecha_actual = date('Y-m-d');

	$hora_actual= date('H:i:s');	
	
	/*=====  End of Parametros Iniciales  ======*/

	
	/*========================================
	=            Objetos usuarios            =
	========================================*/
	
	$objeto= new usuarioAcciones();
	
	/*=====  End of Objetos usuarios  ======*/
	

	/*=======================================
	=            Excel generados            =
	=======================================*/
	
	$archivo = $_FILES['documentoExcel']['tmp_name'];

	$inputFileType = PHPExcel_IOFactory::identify($archivo);

	$objReader = PHPExcel_IOFactory::createReader($inputFileType);

	$objPHPExcel = $objReader->load($archivo);

	$sheet = $objPHPExcel->getSheet(0); 

	$highestRow = $sheet->getHighestRow(); 

	$highestColumn = $sheet->getHighestColumn();	
	
	/*=====  End of Excel generados  ======*/

	/*====================================
	=            Obligatorios            =
	====================================*/
	
	$banderaObligatorios=false;
	$obligatorios__exceles=array();

	
	/*=====  End of Obligatorios  ======*/
	
	/*====================================
	=            Código items            =
	====================================*/
	
	function getObtener__codigoItem($parametro1){

		$varaible="0";

		$parametro1 = strtolower($parametro1);
		
		if(strpos($parametro1,'el interio')!==false){

		$varaible="143";
			
		}else if(strpos($parametro1,'Edificios, Locales, Residencias y Cableado Estructurado (Instala')!==false){

		$varaible="152";
			
		}else if(strpos($parametro1,'culos (bienes')!==false){

		$varaible="172";
			
		}else if(strpos($parametro1,'servicios de au')!==false){

		$varaible="169";
			
		}else if(strpos($parametro1,'accesorios e insumos')!==false){

		$varaible="30";
			
		}else if(strpos($parametro1,'privado no financiero')!==false){

		$varaible="34";
			
		}else if(strpos($parametro1,'alimentos y b')!==false){

		$varaible="35";
			
		}else if(strpos($parametro1,'alimentos, medicinas,')!==false){
			
		$varaible="36";

		}else if(strpos($parametro1,'almacenamiento, embalaje,')!==false){
			
		$varaible="37";

		}else if(strpos($parametro1,'aporte patronal')!==false){
			
		$varaible="38";

		}else if(strpos($parametro1,'licencias de uso de paquetes i')!==false){
			
		$varaible="40";	

		}else if(strpos($parametro1,'becas y ayudas e')!==false){
			
		$varaible="41";

		}else if(strpos($parametro1,'culturales, bienes deportivos')!==false){
			
		$varaible="42";

		}else if(strpos($parametro1,'bienes deportivos (')!==false){
			
		$varaible="43";

		}else if(strpos($parametro1,'bono deportivo')!==false){
			
		$varaible="44";

		}else if(strpos($parametro1,'para los actores del sistema deportivo')!==false){
			
		$varaible="46";

		}else if(strpos($parametro1,'combustibles y lubricantes')!==false){
			
		$varaible="47";

		}else if(strpos($parametro1,'bustibles')!==false){
			
		$varaible="47";

		}else if(strpos($parametro1,'lubrica')!==false){
			
		$varaible="47";

		}else if(strpos($parametro1,'comisiones bancarias')!==false){
			
		$varaible="48";

		}else if(strpos($parametro1,'desahucio')!==false){
			
		$varaible="49";

		}else if(strpos($parametro1,'vacaciones no gozadas')!==false){
			
		$varaible="50";

		}else if(strpos($parametro1,'costas')!==false){
			
		$varaible="51";

		}else if(strpos($parametro1,'rto sueldo')!==false){
			
		$varaible="52";

		}else if(strpos($parametro1,'tercer sueldo')!==false){
			
		$varaible="53";

		}else if(strpos($parametro1,'empastado')!==false){
			
		$varaible="55";

		}else if(strpos($parametro1,'locales')!==false){
			
		$varaible="56";

		}else if(strpos($parametro1,'energ')!==false){
			
		$varaible="58";

		}else if(strpos($parametro1,'as y paquetes')!==false){
			
		$varaible="60";

		}else if(strpos($parametro1,'los culturales y sociales')!==false){
			
		$varaible="62";

		}else if(strpos($parametro1,'fletes')!==false){
			
		$varaible="64";

		}else if(strpos($parametro1,'reserva')!==false){
			
		$varaible="65";

		}else if(strpos($parametro1,'herramientas')!==false){
			
		$varaible="69";

		}else if(strpos($parametro1,'honorarios')!==false){
			
		$varaible="71";

		}else if(strpos($parametro1,'resultados de')!==false){
			
		$varaible="74";

		}else if(strpos($parametro1,'infraestructura')!==false){
			
		$varaible="75";

		}else if(strpos($parametro1,'insumos y accesorios')!==false){
			
		$varaible="76";

		}else if(strpos($parametro1,'mantenimiento de')!==false){
			
		$varaible="78";

		}else if(strpos($parametro1,'mobiliarios')!==false){
			
		$varaible="90";

		}else if(strpos($parametro1,'equipos y sistemas')!==false){
			
		$varaible="79";

		}else if(strpos($parametro1,'maquinarias y equipos (arrendamiento)')!==false){
			
		$varaible="80";

		}else if(strpos($parametro1,'maquinarias y equipos (bienes de larga')!==false){
			
		$varaible="81";

		}else if(strpos($parametro1,'maquinarias y equipos (instal')!==false){
			
		$varaible="82";

		}else if(strpos($parametro1,'iales de aseo')!==false){
			
		$varaible="83";

		}else if(strpos($parametro1,'materiales de oficina')!==false){
			
		$varaible="85";

		}else if(strpos($parametro1,'os de farmacia')!==false){
			
		$varaible="86";

		}else if(strpos($parametro1,'membrec')!==false){
			
		$varaible="87";

		}else if(strpos($parametro1,'hogar y accesorios')!==false){
			
		$varaible="88";

		}else if(strpos($parametro1,'mobiliario (arren')!==false){
			
		$varaible="89";

		}else if(strpos($parametro1,'mantenimiento y re')!==false){
			
		$varaible="114";

		}else if(strpos($parametro1,'pasajes al exterior')!==false){
			
		$varaible="92";

		}else if(strpos($parametro1,'al exterior')!==false){
			
		$varaible="92";

		}else if(strpos($parametro1,'al interior')!==false){
			
		$varaible="93";

		}else if(strpos($parametro1,'pasajes al interior')!==false){
			
		$varaible="93";

		}else if(strpos($parametro1,'renuncia voluntaria')!==false){
			
		$varaible="94";

		}else if(strpos($parametro1,'repuestos y acces')!==false){
			
		$varaible="96";

		}else if(strpos($parametro1,'unificados')!==false){
			
		$varaible="97";

		}else if(strpos($parametro1,'seguros')!==false){
			
		$varaible="98";

		}else if(strpos($parametro1,'semovientes')!==false){
			
		$varaible="99";

		}else if(strpos($parametro1,'servicio de alimentac')!==false){
			
		$varaible="100";

		}else if(strpos($parametro1,'servicio de aud')!==false){
			
		$varaible="101";

		}else if(strpos($parametro1,'servicio de corr')!==false){
			
		$varaible="102";

		}else if(strpos($parametro1,'servicio de implemen')!==false){
			
		$varaible="103";

		}else if(strpos($parametro1,'servicio de seguridad y vi')!==false){
			
		$varaible="104";

		}else if(strpos($parametro1,'aseo;')!==false){
			
		$varaible="105";

		}else if(strpos($parametro1,'hospitalarios y comple')!==false){
			
		$varaible="106";

		}else if(strpos($parametro1,'suplementos v')!==false){
			
		$varaible="108";

		}else if(strpos($parametro1,'patentes')!==false){
			
		$varaible="109";

		}else if(strpos($parametro1,'telecomunicaciones')!==false){
			
		$varaible="110";

		}else if(strpos($parametro1,'transporte')!==false){
			
		$varaible="111";

		}else if(strpos($parametro1,'uniforme')!==false){
			
		$varaible="112";

		}else if(strpos($parametro1,'culos (arrendamiento)')!==false){
			
		$varaible="113";

		}else if(strpos($parametro1,'culos (man')!==false){
			
		$varaible="114";

		}else if(strpos($parametro1,'condecoraciones')!==false){
			
		$varaible="130";

		}else if(strpos($parametro1,'implementos deportivos y recreativos no')!==false){
			
		$varaible="131";

		}else if(strpos($parametro1,'implementos deportivos y recreativos')!==false){
			
		$varaible="148";

		}else if(strpos($parametro1,'potable')!==false){
			
		$varaible="141";

		}else if(strpos($parametro1,'productos culturales')!==false){
			
		$varaible="142";

		}else if(strpos($parametro1,'viaje en el interior')!==false){
			
		$varaible="143";

		}else if(strpos($parametro1,'delegados')!==false){
			
		$varaible="144";

		}else if(strpos($parametro1,'fiscalizac')!==false){
			
		$varaible="145";

		}else if(strpos($parametro1,'publicaciones')!==false){
			
		$varaible="146";

		}else if(strpos($parametro1,'placas')!==false){
			
		$varaible="147";

		}else if(strpos($parametro1,'implementos deportivos y recreativos no depreciables')!==false){
			
		$varaible="131";

		}else if(strpos($parametro1,'larga')!==false){
			
		$varaible="149";

		}else if(strpos($parametro1,'locales')!==false){
			
		$varaible="152";

		}else if(strpos($parametro1,'equipos in')!==false){
			
		$varaible="153";

		}else if(strpos($parametro1,'exterior')!==false){
			
		$varaible="154";

		}else if(strpos($parametro1,'endopr')!==false){
			
		$varaible="155";

		}else if(strpos($parametro1,'intempestivo')!==false){
			
		$varaible="156";

		}else if(strpos($parametro1,'personal')!==false){
			
		$varaible="157";

		}else if(strpos($parametro1,'difusi')!==false){
			
		$varaible="164";

		}else if(strpos($parametro1,'equipos deportivos y recreativos')!==false){
			
		$varaible="171";

		}else{

		$varaible="62";	

		}

		return $varaible;

	}


	
	/*=====  End of Código items  ======*/
	

	switch ($tipo) {


		case "suministros__excel":

			$tipo__array=array();
			$nombre__array=array();
			$luz__array=array();
			$agua__array=array();

			for ($row = 2; $row <= $highestRow; $row++){ 

				array_push($tipo__array, trim($sheet->getCell("A".$row)->getValue()));
				array_push($nombre__array, trim($sheet->getCell("B".$row)->getValue()));
				array_push($luz__array, trim($sheet->getCell("C".$row)->getValue()));
				array_push($agua__array, trim($sheet->getCell("D".$row)->getValue()));

			}


			$jason['tipo__array']=$tipo__array;
			$jason['nombre__array']=$nombre__array;
			$jason['luz__array']=$luz__array;
			$jason['agua__array']=$agua__array;

		break;

		case "indicadores__excel":

		$idActividad__array=array();
		$idActividad__array__codigo=array();
		$primer__trimestre__array=array();
		$segundo__trimestre__array=array();
		$tercer__trimestre__array=array();
		$cuarto__trimestre__array=array();
		$meta__trimestre__array=array();	

		for ($row = 2; $row <= $highestRow; $row++){ 

			if (empty($sheet->getCell("A".$row)->getValue())) {

				$banderaObligatorios=true;

				if (empty($sheet->getCell("A".$row)->getValue())) {
					array_push($obligatorios__exceles,"Columna A Fila ".$row." está vacía");
				}
				$obligatorios__fallas = implode(" ; ", $obligatorios__exceles);

				$jason['obligatorios__falla']=$obligatorios__fallas;

			}else{



				if ($sheet->getCell("A".$row)->getValue()) {

					$parametro1Act = strtolower($sheet->getCell("A".$row)->getValue());

					if (strpos($parametro1Act,'administrativa')!==false || strpos($parametro1Act,'escenarios deportivos')!==false) {
						$valorActividad=1;
					}else if(strpos($parametro1Act,'mantenimiento')!==false) {
						$valorActividad=2;
					}else if(strpos($parametro1Act,'capaci')!==false) {
						$valorActividad=3;
					}else if(strpos($parametro1Act,'operaci')!==false ) {
						$valorActividad=4;
					}else if(strpos($parametro1Act,'competencia')!==false) {
						$valorActividad=5;
					}else if(strpos($parametro1Act,'recreativas')!==false) {
						$valorActividad=6;
					}else{
						$valorActividad=7;
					}

					array_push($idActividad__array__codigo,$valorActividad);
					array_push($idActividad__array,trim($sheet->getCell("A".$row)->getValue()));
				}



				array_push($primer__trimestre__array, trim($sheet->getCell("B".$row)->getValue()));
				array_push($segundo__trimestre__array, trim($sheet->getCell("C".$row)->getValue()));
				array_push($tercer__trimestre__array, trim($sheet->getCell("D".$row)->getValue()));
				array_push($cuarto__trimestre__array, trim($sheet->getCell("E".$row)->getValue()));
				array_push($meta__trimestre__array, trim($sheet->getCell("F".$row)->getValue()));

			}

		
		}

		$jason['idActividad__array']=$idActividad__array;
		$jason['idActividad__array__codigo']=$idActividad__array__codigo;
		$jason['primer__trimestre__array']=$primer__trimestre__array;
		$jason['segundo__trimestre__array']=$segundo__trimestre__array;
		$jason['tercer__trimestre__array']=$tercer__trimestre__array;
		$jason['cuarto__trimestre__array']=$cuarto__trimestre__array;
		$jason['meta__trimestre__array']=$meta__trimestre__array;


		break;			



		case "actividades__deportivas__excel":

		$codigo__financiero__array=array();
		$itemPalabra__array=array();
		$idActividad__array=array();
		$tipo__financiamiento_array=array();
		$evento__array=array();
		$deporte__array=array();
		$provincia__array=array();
		$pais__array=array();
		$alcance__array=array();
		$fecha__inicio__array=array();
		$fecha__fin__array=array();
		$genero__array=array();
		$categoria__array=array();
		$numero__entrenadores__array=array();
		$numero__atletas__array=array();
		$total__array__beneficiarios=array();
		$beneficiarios__array=array();
		$beneficiarios2__array=array();
		$justificacion__array=array();
		$cantidad__bienes__array=array();
		$detalle__adquisicion__array=array();
		$enero__array=array();
		$febrero__array=array();
		$marzo__array=array();
		$abril__array=array();
		$mayo__array=array();
		$junio__array=array();
		$julio__array=array();
		$agosto__array=array();
		$septiembre__array=array();
		$octubre__array=array();
		$noviembre__array=array();
		$diciembre__array=array();
		$total__array=array();		
		$total__array__beneficiarios__2=array();		

		

		for ($row = 2; $row <= $highestRow; $row++){ 

			if ($sheet->getCell("A".$row)->getValue()=="") {

				$banderaObligatorios=true;

				if (empty($sheet->getCell("A".$row)->getValue())) {
					array_push($obligatorios__exceles,"Columna A Fila ".$row." está vacía");
				}


				$obligatorios__fallas = implode(" ; ", $obligatorios__exceles);

				$jason['obligatorios__falla']=$obligatorios__fallas;

			}else{

				if ($sheet->getCell("A".$row)->getValue()) {

					$codigoItem=getObtener__codigoItem(trim($sheet->getCell("A".$row)->getValue()));

					array_push($codigo__financiero__array,$codigoItem);

					array_push($itemPalabra__array,trim($sheet->getCell("A".$row)->getValue()));

				}


				array_push($tipo__financiamiento_array, trim($sheet->getCell("B".$row)->getValue()));

				array_push($evento__array, trim($sheet->getCell("C".$row)->getValue()));

				$deporte=0;

				if ($sheet->getCell("D".$row)->getValue()) {

					$parametro2 = strtolower($sheet->getCell("D".$row)->getValue());

					if (strpos($parametro2,'multi')!==false || $sheet->getCell("D".$row)->getValue()=="MULTIDEPORTIVOS" || $sheet->getCell("D".$row)->getValue()=="MULTI DEPORTIVOS") {
						$deporte=149;
					}else if (strpos($parametro2,'jedrez')!==false) {
						$deporte=25;
					}else if (strpos($parametro2,'lucha')!==false) {
						$deporte=53;
					}else if (strpos($parametro2,'tismo')!==false) {
						$deporte=27;
					}else if (strpos($parametro2,'xeo')!==false) {
						$deporte=36;
					}else if (strpos($parametro2,'tbol')!==false) {
						$deporte=46;
					}else if ($sheet->getCell("D".$row)->getValue()=="AJEDREZ") {
						$deporte=46;
					}else if ($sheet->getCell("D".$row)->getValue()=="FUTBOL") {
						$deporte=46;
					}else if ($sheet->getCell("D".$row)->getValue()=="JUDO") {
						$deporte=50;
					}else if ($sheet->getCell("D".$row)->getValue()=="KARATE" || $sheet->getCell("D".$row)->getValue()=="KARATE DO") {
						$deporte=51;
					}else if ($sheet->getCell("D".$row)->getValue()=="LEVANTAMIENTO DE PESAS") {
						$deporte=52;
					}else if ($sheet->getCell("D".$row)->getValue()=="LUCHA") {
						$deporte=53;
					}else if ($sheet->getCell("D".$row)->getValue()=="TAEKWONDO" || $sheet->getCell("D".$row)->getValue()=="TKD PORTOVIEJO" || $sheet->getCell("D".$row)->getValue()=="TKD PORTOVIEJO") {
						$deporte=65;
					}else if ($sheet->getCell("D".$row)->getValue()=="ANDINISMO Y ESCALADA") {
						$deporte=108;
					}else if ($sheet->getCell("D".$row)->getValue()=="AUTOMOVILISMO") {
						$deporte=109;
					}else if ($sheet->getCell("D".$row)->getValue()=="BADMINTON") {
						$deporte=110;
					}else if ($sheet->getCell("D".$row)->getValue()=="BAILE DEPORTIVO") {
						$deporte=111;
					}else if ($sheet->getCell("D".$row)->getValue()=="BALONCESTO") {
						$deporte=112;
					}else if ($sheet->getCell("D".$row)->getValue()=="BALONMANO") {
						$deporte=113;
					}else if ($sheet->getCell("D".$row)->getValue()=="BEISBOL") {
						$deporte=114;
					}else if ($sheet->getCell("D".$row)->getValue()=="BILLAR") {
						$deporte=115;
					}else if ($sheet->getCell("D".$row)->getValue()=="BOLOS") {
						$deporte=116;
					}else if ($sheet->getCell("D".$row)->getValue()=="BUCEO Y ACTIVIDADES SUBACUATICAS") {
						$deporte=117;
					}else if ($sheet->getCell("D".$row)->getValue()=="CANOTAJE") {
						$deporte=118;
					}else if ($sheet->getCell("D".$row)->getValue()=="CICLISMO") {
						$deporte=119;
					}else if ($sheet->getCell("D".$row)->getValue()=="DEPORTES AEREOS") {
						$deporte=120;
					}else if ($sheet->getCell("D".$row)->getValue()=="ECUESTRES") {
						$deporte=121;
					}else if ($sheet->getCell("D".$row)->getValue()=="ESGRIMA") {
						$deporte=122;
					}else if ($sheet->getCell("D".$row)->getValue()=="ESQUI NAUTICO") {
						$deporte=123;
					}else if ($sheet->getCell("D".$row)->getValue()=="FISICOCULTURISMO Y POTENCIA") {
						$deporte=124;
					}else if ($sheet->getCell("D".$row)->getValue()=="GIMNASIA") {
						$deporte=125;
					}else if ($sheet->getCell("D".$row)->getValue()=="GOLF") {
						$deporte=126;
					}else if ($sheet->getCell("D".$row)->getValue()=="HOCKEY CESPED") {
						$deporte=127;
					}else if ($sheet->getCell("D".$row)->getValue()=="JUDO") {
						$deporte=128;
					}else if ($sheet->getCell("D".$row)->getValue()=="MOTOCICLISMO") {
						$deporte=129;
					}else if ($sheet->getCell("D".$row)->getValue()=="NATACION") {
						$deporte=130;
					}else if ($sheet->getCell("D".$row)->getValue()=="PATINAJE") {
						$deporte=131;
					}else if ($sheet->getCell("D".$row)->getValue()=="PELOTA NACIONAL") {
						$deporte=132;
					}else if ($sheet->getCell("D".$row)->getValue()=="PENTATLON MODERNO") {
						$deporte=133;
					}else if ($sheet->getCell("D".$row)->getValue()=="RAQUETBOL") {
						$deporte=134;
					}else if ($sheet->getCell("D".$row)->getValue()=="REMO") {
						$deporte=135;
					}else if ($sheet->getCell("D".$row)->getValue()=="RUGBY") {
						$deporte=136;
					}else if ($sheet->getCell("D".$row)->getValue()=="SOFBOL") {
						$deporte=137;
					}else if ($sheet->getCell("D".$row)->getValue()=="SQUASH") {
						$deporte=138;
					}else if ($sheet->getCell("D".$row)->getValue()=="SURF") {
						$deporte=139;
					}else if ($sheet->getCell("D".$row)->getValue()=="TENIS") {
						$deporte=140;
					}else if ($sheet->getCell("D".$row)->getValue()=="TENIS DE MESA") {
						$deporte=141;
					}else if ($sheet->getCell("D".$row)->getValue()=="TIRO CON ARCO") {
						$deporte=142;
					}else if ($sheet->getCell("D".$row)->getValue()=="TIRO OLÍMPICO") {
						$deporte=143;
					}else if ($sheet->getCell("D".$row)->getValue()=="TRIATLON") {
						$deporte=144;
					}else if ($sheet->getCell("D".$row)->getValue()=="VELA") {
						$deporte=145;
					}else if ($sheet->getCell("D".$row)->getValue()=="VOLEIBOL") {
						$deporte=146;
					}else if ($sheet->getCell("D".$row)->getValue()=="WUSHU") {
						$deporte=147;
					}else if ($sheet->getCell("D".$row)->getValue()=="MULTI DEPORTIVOS" || $sheet->getCell("D".$row)->getValue()=="MULTIDEPORTIVOS") {
						$deporte=149;
					}else if ($sheet->getCell("D".$row)->getValue()=="MUAYTHAI") {
						$deporte=150;
					}else if ($sheet->getCell("D".$row)->getValue()=="JIUJITSU") {
						$deporte=151;
					}else if ($sheet->getCell("D".$row)->getValue()=="KICKBOXING") {
						$deporte=152;
					}else if ($sheet->getCell("D".$row)->getValue()=="ESQUI ALPINO") {
						$deporte=153;
					}else if ($sheet->getCell("D".$row)->getValue()=="BOCCIAS") {
						$deporte=154;
					}else if ($sheet->getCell("D".$row)->getValue()=="ECUAVOLEY") {
						$deporte=155;
					}else if ($sheet->getCell("D".$row)->getValue()=="ACTIVIDADES RECREATIVAS") {
						$deporte=156;
					}else if ($sheet->getCell("D".$row)->getValue()=="Voleibol playa") {
						$deporte=157;
					}else if(strpos($parametro2,'ibol')!==false){
						$deporte=146;
					}else if(strpos($parametro2,'nata')!==false){
						$deporte=130;
					}else{
						$deporte=146;
					}



					array_push($deporte__array,$deporte);
				}

				$codigoProvincia=0;

				$parametroConversion = strtolower($sheet->getCell("E".$row)->getValue());

				if ($sheet->getCell("E".$row)->getValue()) {

					if (strpos($parametroConversion,'zuay')!==false) {
						$codigoProvincia=20;
					}else if (strpos($parametroConversion,'esme')!==false) {
						$codigoProvincia=1;
					}else if(strpos($parametroConversion,'imborazo')!==false){
						$codigoProvincia=15;
					}else if(strpos($parametroConversion,'car')!==false){
						$codigoProvincia=2;
					}else if(strpos($parametroConversion,'imb')!==false){
						$codigoProvincia=3;
					}else if(strpos($parametroConversion,'sucu')!==false){
						$codigoProvincia=4;
					}else if(strpos($parametroConversion,'mana')!==false){
						$codigoProvincia=5;
					}else if(strpos($parametroConversion,'domingo')!==false){
						$codigoProvincia=6;
					}else if(strpos($parametroConversion,'pich')!==false){
						$codigoProvincia=7;
					}else if(strpos($parametroConversion,'nap')!==false){
						$codigoProvincia=8;
					}else if(strpos($parametroConversion,'ore')!==false){
						$codigoProvincia=9;
					}else if(strpos($parametroConversion,'pasta')!==false){
						$codigoProvincia=10;
					}else if(strpos($parametroConversion,'los')!==false){
						$codigoProvincia=11;
					}else if(strpos($parametroConversion,'coto')!==false){
						$codigoProvincia=12;
					}else if(strpos($parametroConversion,'bo')!==false){
						$codigoProvincia=13;
					}else if(strpos($parametroConversion,'tun')!==false){
						$codigoProvincia=14;
					}else if(strpos($parametroConversion,'chim')!==false){
						$codigoProvincia=15;
					}else if(strpos($parametroConversion,'san')!==false){
						$codigoProvincia=16;
					}else if(strpos($parametroConversion,'gua')!==false){
						$codigoProvincia=17;
					}else if(strpos($parametroConversion,'elena')!==false){
						$codigoProvincia=18;
					}else if(strpos($parametroConversion,'ca')!==false){
						$codigoProvincia=19;
					}else if(strpos($parametroConversion,'suay')!==false){
						$codigoProvincia=20;
					}else if(strpos($parametroConversion,'oro')!==false){
						$codigoProvincia=21;
					}else if(strpos($parametroConversion,'loja')!==false){
						$codigoProvincia=22;
					}else if(strpos($parametroConversion,'chipe')!==false){
						$codigoProvincia=23;
					}else if(strpos($parametroConversion,'gos')!==false){
						$codigoProvincia=24;
					}else{
						$codigoProvincia=25;
					}



					array_push($provincia__array,$codigoProvincia);

				}

				array_push($pais__array, trim($sheet->getCell("F".$row)->getValue()));

				$codigoAlcanses=0;

				if ($sheet->getCell("G".$row)->getValue()) {

					if ($sheet->getCell("G".$row)->getValue()=="INT") {
						$codigoAlcanses=18;
					}else if($sheet->getCell("G".$row)->getValue()=="PRO"){
						$codigoAlcanses=20;
					}else if($sheet->getCell("G".$row)->getValue()=="CAN"){
						$codigoAlcanses=21;
					}else if($sheet->getCell("G".$row)->getValue()=="PAR"){
						$codigoAlcanses=22;
					}else if($sheet->getCell("G".$row)->getValue()=="BAR/PAR"){
						$codigoAlcanses=24;
					}else if($sheet->getCell("G".$row)->getValue()=="BAR"){
						$codigoAlcanses=26;
					}else if($sheet->getCell("G".$row)->getValue()=="NAC"){
						$codigoAlcanses=27;
					}else if($sheet->getCell("G".$row)->getValue()=="PROV"){
						$codigoAlcanses=28;
					}else if($sheet->getCell("G".$row)->getValue()=="NAC"){
						$codigoAlcanses=30;
					}

					array_push($alcance__array,$codigoAlcanses);

				}


				
				$mifecha = date("Y-m-d", PHPExcel_Shared_Date::ExcelToPHP(trim($sheet->getCell("H".$row)->getValue()) + 1 ) );

				array_push($fecha__inicio__array, $mifecha);

				// array_push($fecha__inicio__array,trim($sheet->getCell("H".$row)->getValue()));

				$mifecha2 = date("Y-m-d", PHPExcel_Shared_Date::ExcelToPHP(trim($sheet->getCell("I".$row)->getValue()) + 1 ) );

				array_push($fecha__fin__array, $mifecha2);

				// array_push($fecha__fin__array, trim($sheet->getCell("I".$row)->getValue()));

				array_push($genero__array, trim($sheet->getCell("J".$row)->getValue()));

				array_push($categoria__array, trim($sheet->getCell("K".$row)->getValue()));

				array_push($numero__entrenadores__array, trim($sheet->getCell("L".$row)->getValue()));
 
				array_push($numero__atletas__array, trim($sheet->getCell("M".$row)->getValue()));
				array_push($total__array__beneficiarios, trim($sheet->getCell("N".$row)->getValue()));
				array_push($total__array__beneficiarios__2, trim($sheet->getCell("N".$row)->getValue()));
				array_push($beneficiarios__array, trim($sheet->getCell("O".$row)->getValue()));
				array_push($beneficiarios2__array, trim($sheet->getCell("P".$row)->getValue()));
				array_push($detalle__adquisicion__array, trim($sheet->getCell("Q".$row)->getValue()));
				array_push($justificacion__array, trim($sheet->getCell("R".$row)->getValue()));
				array_push($cantidad__bienes__array, trim($sheet->getCell("S".$row)->getValue()));
				array_push($enero__array, trim($sheet->getCell("T".$row)->getValue()));
				array_push($febrero__array, trim($sheet->getCell("U".$row)->getValue()));
				array_push($marzo__array, trim($sheet->getCell("V".$row)->getValue()));
				array_push($abril__array, trim($sheet->getCell("W".$row)->getValue()));
				array_push($mayo__array, trim($sheet->getCell("X".$row)->getValue()));
				array_push($junio__array, trim($sheet->getCell("Y".$row)->getValue()));
				array_push($julio__array, trim($sheet->getCell("Z".$row)->getValue()));
				array_push($agosto__array, trim($sheet->getCell("AA".$row)->getValue()));
				array_push($septiembre__array, trim($sheet->getCell("AB".$row)->getValue()));
				array_push($octubre__array, trim($sheet->getCell("AC".$row)->getValue()));
				array_push($noviembre__array, trim($sheet->getCell("AD".$row)->getValue()));
				array_push($diciembre__array, trim($sheet->getCell("AE".$row)->getValue()));
				array_push($total__array, trim($sheet->getCell("AF".$row)->getValue()));


			}

		
		}

		$jason['total__array__beneficiarios__2']=$total__array__beneficiarios__2;
		$jason['itemPalabra__array']=$itemPalabra__array;
		$jason['codigo__financiero__array']=$codigo__financiero__array;
		$jason['idActividad__array']=$idActividad__array;
		$jason['tipo__financiamiento_array']=$tipo__financiamiento_array;
		$jason['evento__array']=$evento__array;
		$jason['deporte__array']=$deporte__array;
		$jason['provincia__array']=$provincia__array;
		$jason['pais__array']=$pais__array;
		$jason['alcance__array']=$alcance__array;
		$jason['fecha__inicio__array']=$fecha__inicio__array;
		$jason['fecha__fin__array']=$fecha__fin__array;
		$jason['genero__array']=$genero__array;
		$jason['categoria__array']=$categoria__array;
		$jason['numero__entrenadores__array']=$numero__entrenadores__array;
		$jason['numero__atletas__array']=$numero__atletas__array;
		$jason['total__array__beneficiarios']=$total__array__beneficiarios;
		$jason['beneficiarios__array']=$beneficiarios__array;
		$jason['beneficiarios2__array']=$beneficiarios2__array;
		$jason['justificacion__array']=$justificacion__array;
		$jason['cantidad__bienes__array']=$cantidad__bienes__array;
		$jason['detalle__adquisicion__array']=$detalle__adquisicion__array;

		$jason['enero__array']=$enero__array;
		$jason['febrero__array']=$febrero__array;
		$jason['marzo__array']=$marzo__array;
		$jason['abril__array']=$abril__array;
		$jason['mayo__array']=$mayo__array;
		$jason['junio__array']=$junio__array;
		$jason['julio__array']=$julio__array;
		$jason['agosto__array']=$agosto__array;
		$jason['septiembre__array']=$septiembre__array;
		$jason['octubre__array']=$octubre__array;
		$jason['noviembre__array']=$noviembre__array;
		$jason['diciembre__array']=$diciembre__array;
		$jason['total__array']=$total__array;


		break;			

		case "poa__general__excel":

		$idActividad__array=array();
		$nombreActividad__array=array();
		$idItem__array=array();
		$nombreItem__array=array();
		$codigo__presupues_array=array();
		$enero__array=array();
		$febrero__array=array();
		$marzo__array=array();
		$abril__array=array();
		$mayo__array=array();
		$junio__array=array();
		$julio__array=array();
		$agosto__array=array();
		$septiembre__array=array();
		$octubre__array=array();
		$noviembre__array=array();
		$diciembre__array=array();
		$total__array=array();		

		for ($row = 2; $row <= $highestRow; $row++){ 

			if (4>5) {

				$banderaObligatorios=true;
	
				$obligatorios__fallas = implode(" ; ", $obligatorios__exceles);

				$jason['obligatorios__falla']=$obligatorios__fallas;

			}else{

				if ($sheet->getCell("A".$row)->getValue()) {

					if (strpos($sheet->getCell("A".$row)->getValue(),'ADMINISTRATIVA')!==false) {
						$valorActividad=1;
					}else if(strpos($sheet->getCell("A".$row)->getValue(),'MANTENIMIENTO')!==false) {
						$valorActividad=2;
					}else if(strpos($sheet->getCell("A".$row)->getValue(),'CAPACITAC')!==false) {
						$valorActividad=3;
					}else if(strpos($sheet->getCell("A".$row)->getValue(),'OPERACION DEPORTIVA')!==false || strpos($sheet->getCell("A".$row)->getValue(),'OPERACIÓN DEPORTIVA')!==false || strpos($sheet->getCell("A".$row)->getValue(),'OPERA')!==false) {
						$valorActividad=4;
					}else if(strpos($sheet->getCell("A".$row)->getValue(),'EVENTOS DE PREPARACION Y COMPETENCIA')!==false || strpos($sheet->getCell("A".$row)->getValue(),'N Y COMPETENCIA')!==false || strpos($sheet->getCell("A".$row)->getValue(),'EVENTOS DE PREPARACIÓN  Y COMPETENCIA')!==false || $sheet->getCell("A".$row)->getValue()=="EVENTOS DE PREPARACIÓN  Y COMPETENCIA") {
						$valorActividad=5;
					}else if(strpos($sheet->getCell("A".$row)->getValue(),'RECREATIVAS')!==false) {
						$valorActividad=6;
					}else{
						$valorActividad=7;
					}

					array_push($idActividad__array,$valorActividad);
					array_push($nombreActividad__array,trim($sheet->getCell("A".$row)->getValue()));
				}

				if ($sheet->getCell("B".$row)->getValue()) {

					$codigoItem=getObtener__codigoItem(trim($sheet->getCell("B".$row)->getValue()));

					array_push($idItem__array,$codigoItem);

					array_push($nombreItem__array, trim($sheet->getCell("B".$row)->getValue()));

				}

				// array_push($codigo__presupues_array, trim($sheet->getCell("C".$row)->getValue()));
				array_push($enero__array, trim($sheet->getCell("C".$row)->getValue()));
				array_push($febrero__array, trim($sheet->getCell("D".$row)->getValue()));
				array_push($marzo__array, trim($sheet->getCell("E".$row)->getValue()));
				array_push($abril__array, trim($sheet->getCell("F".$row)->getValue()));
				array_push($mayo__array, trim($sheet->getCell("G".$row)->getValue()));
				array_push($junio__array, trim($sheet->getCell("H".$row)->getValue()));
				array_push($julio__array, trim($sheet->getCell("I".$row)->getValue()));
				array_push($agosto__array, trim($sheet->getCell("J".$row)->getValue()));
				array_push($septiembre__array, trim($sheet->getCell("K".$row)->getValue()));
				array_push($octubre__array, trim($sheet->getCell("L".$row)->getValue()));
				array_push($noviembre__array, trim($sheet->getCell("M".$row)->getValue()));
				array_push($diciembre__array, trim($sheet->getCell("N".$row)->getValue()));
				array_push($total__array, trim($sheet->getCell("O".$row)->getValue()));

			}

		
		}		

		$jason['idActividad__array']=$idActividad__array;
		$jason['nombreActividad__array']=$nombreActividad__array;
		$jason['idItem__array']=$idItem__array;
		$jason['nombreItem__array']=$nombreItem__array;
		$jason['codigo__presupues_array']=$codigo__presupues_array;
		$jason['enero__array']=$enero__array;
		$jason['febrero__array']=$febrero__array;
		$jason['marzo__array']=$marzo__array;
		$jason['abril__array']=$abril__array;
		$jason['mayo__array']=$mayo__array;
		$jason['junio__array']=$junio__array;
		$jason['julio__array']=$julio__array;
		$jason['agosto__array']=$agosto__array;
		$jason['septiembre__array']=$septiembre__array;
		$jason['octubre__array']=$octubre__array;
		$jason['noviembre__array']=$noviembre__array;
		$jason['diciembre__array']=$diciembre__array;
		$jason['total__array']=$total__array;


		break;			


		case "administrativos__excel":

		$idActividad__array=array();
		$nombreItem__array=array();
		$justificacion__array=array();
		$cantidad__array=array();
		$enero__array=array();
		$febrero__array=array();
		$marzo__array=array();
		$abril__array=array();
		$mayo__array=array();
		$junio__array=array();
		$julio__array=array();
		$agosto__array=array();
		$septiembre__array=array();
		$octubre__array=array();
		$noviembre__array=array();
		$diciembre__array=array();
		$total__array=array();		

		for ($row = 2; $row <= $highestRow; $row++){ 

			if (empty($sheet->getCell("A".$row)->getValue())) {

				$banderaObligatorios=true;

				if (empty($sheet->getCell("A".$row)->getValue())) {
					array_push($obligatorios__exceles,"Columna A Fila ".$row." está vacía");
				}

				if (empty($sheet->getCell("B".$row)->getValue())) {
					array_push($obligatorios__exceles,"Columna B Fila ".$row." está vacía");
				}

				if (empty($sheet->getCell("C".$row)->getValue())) {
					array_push($obligatorios__exceles,"Columna C Fila ".$row." está vacía");
				}

	
				$obligatorios__fallas = implode(" ; ", $obligatorios__exceles);

				$jason['obligatorios__falla']=$obligatorios__fallas;

			}else{

				if ($sheet->getCell("A".$row)->getValue()) {

					$codigoItem=getObtener__codigoItem(trim($sheet->getCell("A".$row)->getValue()));

					array_push($idActividad__array,$codigoItem);

					array_push($nombreItem__array, trim($sheet->getCell("A".$row)->getValue()));

				}

				array_push($justificacion__array, trim($sheet->getCell("B".$row)->getValue()));
				array_push($cantidad__array, trim($sheet->getCell("C".$row)->getValue()));
				array_push($enero__array, trim($sheet->getCell("D".$row)->getValue()));
				array_push($febrero__array, trim($sheet->getCell("E".$row)->getValue()));
				array_push($marzo__array, trim($sheet->getCell("F".$row)->getValue()));
				array_push($abril__array, trim($sheet->getCell("G".$row)->getValue()));
				array_push($mayo__array, trim($sheet->getCell("H".$row)->getValue()));
				array_push($junio__array, trim($sheet->getCell("I".$row)->getValue()));
				array_push($julio__array, trim($sheet->getCell("J".$row)->getValue()));
				array_push($agosto__array, trim($sheet->getCell("K".$row)->getValue()));
				array_push($septiembre__array, trim($sheet->getCell("L".$row)->getValue()));
				array_push($octubre__array, trim($sheet->getCell("M".$row)->getValue()));
				array_push($noviembre__array, trim($sheet->getCell("N".$row)->getValue()));
				array_push($diciembre__array, trim($sheet->getCell("O".$row)->getValue()));
				array_push($total__array, trim($sheet->getCell("P".$row)->getValue()));

			}

		
		}

		$jason['nombreItem__array']=$nombreItem__array;
		$jason['idActividad__array']=$idActividad__array;
		$jason['justificacion__array']=$justificacion__array;
		$jason['cantidad__array']=$cantidad__array;;
		$jason['enero__array']=$enero__array;
		$jason['febrero__array']=$febrero__array;
		$jason['marzo__array']=$marzo__array;
		$jason['abril__array']=$abril__array;
		$jason['mayo__array']=$mayo__array;
		$jason['junio__array']=$junio__array;
		$jason['julio__array']=$julio__array;
		$jason['agosto__array']=$agosto__array;
		$jason['septiembre__array']=$septiembre__array;
		$jason['octubre__array']=$octubre__array;
		$jason['noviembre__array']=$noviembre__array;
		$jason['diciembre__array']=$diciembre__array;
		$jason['total__array']=$total__array;


		break;			


		case "mantenimiento__excel":

		$idActividad__array=array();
		$nombreItem__array=array();
		$nombreInfra__array=array();
		$provincia__array=array();
		$provincia__codigo__array=array();
		$direccion__array=array();
		$estado__array=array();
		$tipoRecursos__array=array();
		$tipoIntervencion__array=array();
		$detallarTipo__intervencion__array=array();
		$tipoMantenimiento__array=array();
		$materiales__servicios__array=array();
		$enero__array=array();
		$febrero__array=array();
		$marzo__array=array();
		$abril__array=array();
		$mayo__array=array();
		$junio__array=array();
		$julio__array=array();
		$agosto__array=array();
		$septiembre__array=array();
		$octubre__array=array();
		$noviembre__array=array();
		$diciembre__array=array();
		$total__array=array();		
		$ultimoFecha__servicios__array=array();	


		for ($row = 2; $row <= $highestRow; $row++){ 

			if (4>5){

				$banderaObligatorios=true;

				if (empty($sheet->getCell("A".$row)->getValue())) {
					array_push($obligatorios__exceles,"Columna A Fila ".$row." está vacía");
				}


				$obligatorios__fallas = implode(" ; ", $obligatorios__exceles);

				$jason['obligatorios__falla']=$obligatorios__fallas;

			}else{

				if ($sheet->getCell("A".$row)->getValue()) {

					$codigoItem=getObtener__codigoItem(trim($sheet->getCell("A".$row)->getValue()));

					array_push($idActividad__array,$codigoItem);

					array_push($nombreItem__array, trim($sheet->getCell("A".$row)->getValue()));

				}

				array_push($nombreInfra__array, trim($sheet->getCell("B".$row)->getValue()));

				if ($sheet->getCell("C".$row)->getValue()) {

					if ($sheet->getCell("C".$row)->getValue()=="Esmeraldas" || $sheet->getCell("C".$row)->getValue()=="ESMERALDAS") {
						$valorActividad=1;
					}else if($sheet->getCell("C".$row)->getValue()=="Carchi" || $sheet->getCell("C".$row)->getValue()=="CARCHI"){
						$valorActividad=2;
					}else if($sheet->getCell("C".$row)->getValue()=="Imbabura" || $sheet->getCell("C".$row)->getValue()=="IMBABURA"){
						$valorActividad=3;
					}else if($sheet->getCell("C".$row)->getValue()=="Sucumbios" || $sheet->getCell("C".$row)->getValue()=="SUCUMBIOS"){
						$valorActividad=4;
					}else if($sheet->getCell("C".$row)->getValue()=="Manabi" || $sheet->getCell("C".$row)->getValue()=="MANABI"){
						$valorActividad=5;
					}else if($sheet->getCell("C".$row)->getValue()=="Santo Domingo de los Tsachilas" || $sheet->getCell("C".$row)->getValue()=="SANTO DOMINGO DE LOS TSACHILAS"){
						$valorActividad=6;
					}else if($sheet->getCell("C".$row)->getValue()=="Pichincha" || $sheet->getCell("C".$row)->getValue()=="PICHINCHA"){
						$valorActividad=7;
					}else if($sheet->getCell("C".$row)->getValue()=="Napo" || $sheet->getCell("C".$row)->getValue()=="NAPO"){
						$valorActividad=8;
					}else if($sheet->getCell("C".$row)->getValue()=="Orellana" || $sheet->getCell("C".$row)->getValue()=="ORELLANA"){
						$valorActividad=9;
					}else if($sheet->getCell("C".$row)->getValue()=="Pastaza" || $sheet->getCell("C".$row)->getValue()=="PASTAZA"){
						$valorActividad=10;
					}else if($sheet->getCell("C".$row)->getValue()=="Los Rios" || $sheet->getCell("C".$row)->getValue()=="LOS RIOS"){
						$valorActividad=11;
					}else if($sheet->getCell("C".$row)->getValue()=="Cotopaxi" || $sheet->getCell("C".$row)->getValue()=="COTOPAXI"){
						$valorActividad=12;
					}else if($sheet->getCell("C".$row)->getValue()=="Bolivar" || $sheet->getCell("C".$row)->getValue()=="BOLIVAR"){
						$valorActividad=13;
					}else if($sheet->getCell("C".$row)->getValue()=="Tungurahua" || $sheet->getCell("C".$row)->getValue()=="TUNGURAHUA"){
						$valorActividad=14;
					}else if($sheet->getCell("C".$row)->getValue()=="Chimborazo" || $sheet->getCell("C".$row)->getValue()=="CHIMBORAZO"){
						$valorActividad=15;
					}else if($sheet->getCell("C".$row)->getValue()=="Morona Santiago" || $sheet->getCell("C".$row)->getValue()=="MORONA SANTIAGO"){
						$valorActividad=16;
					}else if($sheet->getCell("C".$row)->getValue()=="Guayas" || $sheet->getCell("C".$row)->getValue()=="GUAYAS"){
						$valorActividad=17;
					}else if($sheet->getCell("C".$row)->getValue()=="Santa Elena" || $sheet->getCell("C".$row)->getValue()=="SANTA ELENA"){
						$valorActividad=18;
					}else if($sheet->getCell("C".$row)->getValue()=="Canar" || $sheet->getCell("C".$row)->getValue()=="CANAR"){
						$valorActividad=19;
					}else if($sheet->getCell("C".$row)->getValue()=="Azuay" || $sheet->getCell("C".$row)->getValue()=="ASUAY"){
						$valorActividad=20;
					}else if($sheet->getCell("C".$row)->getValue()=="El Oro" || $sheet->getCell("C".$row)->getValue()=="EL ORO"){
						$valorActividad=21;
					}else if($sheet->getCell("C".$row)->getValue()=="Loja" || $sheet->getCell("C".$row)->getValue()=="LOJA"){
						$valorActividad=22;
					}else if($sheet->getCell("C".$row)->getValue()=="Zamora Chinchipe" || $sheet->getCell("C".$row)->getValue()=="ZAMORA CHINCHIPE"){
						$valorActividad=23;
					}else if($sheet->getCell("C".$row)->getValue()=="Galapagos" || $sheet->getCell("C".$row)->getValue()=="GALAPAGOS"){
						$valorActividad=24;
					}else if($sheet->getCell("C".$row)->getValue()=="Internacional" || $sheet->getCell("C".$row)->getValue()=="INTERNACIONAL"){
						$valorActividad=25;
					}

					array_push($provincia__codigo__array,$valorActividad);
					array_push($provincia__array,trim($sheet->getCell("C".$row)->getValue()));
				}

				array_push($direccion__array, trim($sheet->getCell("D".$row)->getValue()));
				array_push($estado__array, trim($sheet->getCell("E".$row)->getValue()));
				array_push($tipoRecursos__array, trim($sheet->getCell("F".$row)->getValue()));
				array_push($tipoIntervencion__array, trim($sheet->getCell("G".$row)->getValue()));
				array_push($detallarTipo__intervencion__array, trim($sheet->getCell("H".$row)->getValue()));
				array_push($tipoMantenimiento__array, trim($sheet->getCell("I".$row)->getValue()));
				array_push($materiales__servicios__array, trim($sheet->getCell("J".$row)->getValue()));
				$mifecha2 = date("Y-m-d", PHPExcel_Shared_Date::ExcelToPHP(trim($sheet->getCell("K".$row)->getValue()) + 1 ) );
				array_push($ultimoFecha__servicios__array, $mifecha2);
				array_push($enero__array, trim($sheet->getCell("L".$row)->getValue()));
				array_push($febrero__array, trim($sheet->getCell("M".$row)->getValue()));
				array_push($marzo__array, trim($sheet->getCell("N".$row)->getValue()));
				array_push($abril__array, trim($sheet->getCell("O".$row)->getValue()));
				array_push($mayo__array, trim($sheet->getCell("P".$row)->getValue()));
				array_push($junio__array, trim($sheet->getCell("Q".$row)->getValue()));
				array_push($julio__array, trim($sheet->getCell("R".$row)->getValue()));
				array_push($agosto__array, trim($sheet->getCell("S".$row)->getValue()));
				array_push($septiembre__array, trim($sheet->getCell("T".$row)->getValue()));
				array_push($octubre__array, trim($sheet->getCell("U".$row)->getValue()));
				array_push($noviembre__array, trim($sheet->getCell("V".$row)->getValue()));
				array_push($diciembre__array, trim($sheet->getCell("W".$row)->getValue()));
				array_push($total__array, trim($sheet->getCell("X".$row)->getValue()));

			}

		
		}

		$jason['nombreItem__array']=$nombreItem__array;
		$jason['idActividad__array']=$idActividad__array;
		$jason['nombreInfra__array']=$nombreInfra__array;
		$jason['provincia__array']=$provincia__array;
		$jason['provincia__codigo__array']=$provincia__codigo__array;
		$jason['direccion__array']=$direccion__array;
		$jason['estado__array']=$estado__array;
		$jason['tipoRecursos__array']=$tipoRecursos__array;
		$jason['tipoIntervencion__array']=$tipoIntervencion__array;
		$jason['detallarTipo__intervencion__array']=$detallarTipo__intervencion__array;
		$jason['tipoMantenimiento__array']=$tipoMantenimiento__array;
		$jason['materiales__servicios__array']=$materiales__servicios__array;
		$jason['enero__array']=$enero__array;
		$jason['febrero__array']=$febrero__array;
		$jason['marzo__array']=$marzo__array;
		$jason['abril__array']=$abril__array;
		$jason['mayo__array']=$mayo__array;
		$jason['junio__array']=$junio__array;
		$jason['julio__array']=$julio__array;
		$jason['agosto__array']=$agosto__array;
		$jason['septiembre__array']=$septiembre__array;
		$jason['octubre__array']=$octubre__array;
		$jason['noviembre__array']=$noviembre__array;
		$jason['diciembre__array']=$diciembre__array;
		$jason['total__array']=$total__array;
		$jason['ultimoFecha__servicios__array']=$ultimoFecha__servicios__array;


		break;			


		case "sueldos__salarios__excel":

		$idActividad__array=array();
		$cedula__array=array();
		$cargo__array=array();
		$nombres__array=array();
		$tipoCargo__array=array();
		$tiempoTrabajo__array=array();
		$sueldoSalario__array=array();
		$aportePatronal__array=array();
		$decimoTercer__array=array();
		$mensualizaDecimoT__array=array();
		$decimoCuarto__array=array();
		$mensualizaDecimoC__array=array();
		$fondosRe__array=array();
		$enero__array=array();
		$febrero__array=array();
		$marzo__array=array();
		$abril__array=array();
		$mayo__array=array();
		$junio__array=array();
		$julio__array=array();
		$agosto__array=array();
		$septiembre__array=array();
		$octubre__array=array();
		$noviembre__array=array();
		$diciembre__array=array();
		$total__array=array();		

		for ($row = 3; $row <= $highestRow; $row++){ 

			if ($sheet->getCell("A".$row)->getValue()=="") {

				$banderaObligatorios=true;

				if (empty($sheet->getCell("A".$row)->getValue())) {
					array_push($obligatorios__exceles,"Columna A Fila ".$row." está vacía");
				}


				$obligatorios__fallas = implode(" ; ", $obligatorios__exceles);

				$jason['obligatorios__falla']=$obligatorios__fallas;

			}else{

				if ($sheet->getCell("A".$row)->getValue()) {

					if ($sheet->getCell("A".$row)->getValue()=="Actividad 1") {
						$valorActividad=1;
					}else{
						$valorActividad=4;
					}

					array_push($idActividad__array,$valorActividad);
				}

				array_push($cedula__array, trim($sheet->getCell("B".$row)->getValue()));
				array_push($nombres__array, trim($sheet->getCell("C".$row)->getValue()));
				array_push($cargo__array, trim($sheet->getCell("D".$row)->getValue()));
				array_push($tipoCargo__array, trim($sheet->getCell("E".$row)->getValue()));
				array_push($tiempoTrabajo__array, trim($sheet->getCell("F".$row)->getValue()));
				array_push($sueldoSalario__array, trim($sheet->getCell("G".$row)->getValue()));
				array_push($aportePatronal__array, trim($sheet->getCell("H".$row)->getValue()));
				array_push($decimoTercer__array, trim($sheet->getCell("I".$row)->getValue()));
				array_push($mensualizaDecimoT__array, trim($sheet->getCell("J".$row)->getValue()));
				array_push($decimoCuarto__array, trim($sheet->getCell("K".$row)->getValue()));
				array_push($mensualizaDecimoC__array, trim($sheet->getCell("L".$row)->getValue()));
				array_push($fondosRe__array, trim($sheet->getCell("M".$row)->getValue()));
				array_push($enero__array, trim($sheet->getCell("N".$row)->getValue()));
				array_push($febrero__array, trim($sheet->getCell("O".$row)->getValue()));
				array_push($marzo__array, trim($sheet->getCell("P".$row)->getValue()));
				array_push($abril__array, trim($sheet->getCell("Q".$row)->getValue()));
				array_push($mayo__array, trim($sheet->getCell("R".$row)->getValue()));
				array_push($junio__array, trim($sheet->getCell("S".$row)->getValue()));
				array_push($julio__array, trim($sheet->getCell("T".$row)->getValue()));
				array_push($agosto__array, trim($sheet->getCell("U".$row)->getValue()));
				array_push($septiembre__array, trim($sheet->getCell("V".$row)->getValue()));
				array_push($octubre__array, trim($sheet->getCell("W".$row)->getValue()));
				array_push($noviembre__array, trim($sheet->getCell("X".$row)->getValue()));
				array_push($diciembre__array, trim($sheet->getCell("Y".$row)->getValue()));
				array_push($total__array, trim($sheet->getCell("Z".$row)->getValue()));

			}

		
		}

		$jason['idActividad__array']=$idActividad__array;
		$jason['cedula__array']=$cedula__array;
		$jason['cargo__array']=$cargo__array;
		$jason['nombres__array']=$nombres__array;
		$jason['tipoCargo__array']=$tipoCargo__array;
		$jason['tiempoTrabajo__array']=$tiempoTrabajo__array;
		$jason['sueldoSalario__array']=$sueldoSalario__array;
		$jason['aportePatronal__array']=$aportePatronal__array;
		$jason['decimoTercer__array']=$decimoTercer__array;
		$jason['mensualizaDecimoT__array']=$mensualizaDecimoT__array;
		$jason['decimoCuarto__array']=$decimoCuarto__array;
		$jason['mensualizaDecimoC__array']=$mensualizaDecimoC__array;
		$jason['fondosRe__array']=$fondosRe__array;
		$jason['enero__array']=$enero__array;
		$jason['febrero__array']=$febrero__array;
		$jason['marzo__array']=$marzo__array;
		$jason['abril__array']=$abril__array;
		$jason['mayo__array']=$mayo__array;
		$jason['junio__array']=$junio__array;
		$jason['julio__array']=$julio__array;
		$jason['agosto__array']=$agosto__array;
		$jason['septiembre__array']=$septiembre__array;
		$jason['octubre__array']=$octubre__array;
		$jason['noviembre__array']=$noviembre__array;
		$jason['diciembre__array']=$diciembre__array;
		$jason['total__array']=$total__array;


		break;			

		case "sueldos__salarios__desvinculaciones__excel":

		$idActividad__array=array();
		$cedula__array=array();
		$cargo__array=array();
		$nombres__array=array();
		$tipoCargo__array=array();
		$compensacionDesaucio__array=array();
		$despidoIntes__array=array();
		$reunciaVoluntaria__array=array();
		$vacacionesNoGozadas__array=array();
		$enero__array=array();
		$febrero__array=array();
		$marzo__array=array();
		$abril__array=array();
		$mayo__array=array();
		$junio__array=array();
		$julio__array=array();
		$agosto__array=array();
		$septiembre__array=array();
		$octubre__array=array();
		$noviembre__array=array();
		$diciembre__array=array();
		$total__array=array();	

		$arrayErroresSumas=array();	

		for ($row = 2; $row <= $highestRow; $row++){ 

			if ($sheet->getCell("A".$row)->getValue()=="") {

				$banderaObligatorios=true;

				if (empty($sheet->getCell("A".$row)->getValue())) {
					array_push($obligatorios__exceles,"Columna A Fila ".$row." está vacía");
				}


				$obligatorios__fallas = implode(" ; ", $obligatorios__exceles);

				$jason['obligatorios__falla']=$obligatorios__fallas;

			}else{

				if ($sheet->getCell("A".$row)->getValue()) {

					if ($sheet->getCell("A".$row)->getValue()=="Actividad 1" || strpos($sheet->getCell("A".$row)->getValue(),'ADMINISTRATIVA')!==false || strpos($sheet->getCell("A".$row)->getValue(),'1')!==false) {
						$valorActividad=1;
					}else{
						$valorActividad=4;
					}

					array_push($idActividad__array,$valorActividad);
				}

				array_push($cedula__array, trim($sheet->getCell("B".$row)->getValue()));

				$cedula__encubiertas=filter_var($sheet->getCell("B".$row)->getValue(), FILTER_SANITIZE_MAGIC_QUOTES);
				
				$envio__informaciones__cedulas=$objeto->getObtenerInformacionGeneral("SELECT cedula FROM poa_sueldossalarios2022 WHERE cedula='$cedula__encubiertas';");

				if (empty($envio__informaciones__cedulas[0][cedula])) {
					array_push($arrayErroresSumas,$cedula__encubiertas);
				}



				array_push($cargo__array, trim($sheet->getCell("C".$row)->getValue()));
				array_push($nombres__array, trim($sheet->getCell("D".$row)->getValue()));
				array_push($tipoCargo__array, trim($sheet->getCell("E".$row)->getValue()));

				$varaible="0";
				$parametro1 = strtolower(trim($sheet->getCell("F".$row)->getValue()));
				
				if(strpos($parametro1,'desahucio')!==false){

					array_push($compensacionDesaucio__array,'desahucio');
					
				}else if(strpos($parametro1,'despido')!==false){

					array_push($compensacionDesaucio__array,'despido');

				}else if(strpos($parametro1,'compensac')!==false){

					array_push($compensacionDesaucio__array,'compensación');

				}else{

					array_push($compensacionDesaucio__array,'renuncia');

				}


				array_push($despidoIntes__array, trim($sheet->getCell("G".$row)->getValue()));
				array_push($enero__array, trim($sheet->getCell("H".$row)->getValue()));
				array_push($febrero__array, trim($sheet->getCell("I".$row)->getValue()));
				array_push($marzo__array, trim($sheet->getCell("J".$row)->getValue()));
				array_push($abril__array, trim($sheet->getCell("K".$row)->getValue()));
				array_push($mayo__array, trim($sheet->getCell("L".$row)->getValue()));
				array_push($junio__array, trim($sheet->getCell("M".$row)->getValue()));
				array_push($julio__array, trim($sheet->getCell("N".$row)->getValue()));
				array_push($agosto__array, trim($sheet->getCell("O".$row)->getValue()));
				array_push($septiembre__array, trim($sheet->getCell("P".$row)->getValue()));
				array_push($octubre__array, trim($sheet->getCell("Q".$row)->getValue()));
				array_push($noviembre__array, trim($sheet->getCell("R".$row)->getValue()));
				array_push($diciembre__array, trim($sheet->getCell("S".$row)->getValue()));
				array_push($total__array, trim($sheet->getCell("T".$row)->getValue()));

			}

		
		}

		$jason['idActividad__array']=$idActividad__array;
		$jason['cedula__array']=$cedula__array;
		$jason['cargo__array']=$cargo__array;
		$jason['nombres__array']=$nombres__array;
		$jason['tipoCargo__array']=$tipoCargo__array;
		$jason['enero__array']=$enero__array;
		$jason['febrero__array']=$febrero__array;
		$jason['marzo__array']=$marzo__array;
		$jason['abril__array']=$abril__array;
		$jason['mayo__array']=$mayo__array;
		$jason['junio__array']=$junio__array;
		$jason['julio__array']=$julio__array;
		$jason['agosto__array']=$agosto__array;
		$jason['septiembre__array']=$septiembre__array;
		$jason['octubre__array']=$octubre__array;
		$jason['noviembre__array']=$noviembre__array;
		$jason['diciembre__array']=$diciembre__array;
		$jason['total__array']=$total__array;
		$jason['arrayErroresSumas']=$arrayErroresSumas;

		$jason['compensacionDesaucio__array']=$compensacionDesaucio__array;
		$jason['despidoIntes__array']=$despidoIntes__array;

		break;			



		case "honorarios__excel":

		$idActividad__array=array();
		$cedula__array=array();
		$nombres__array=array();
		$tipo__array=array();
		$cargo__array=array();
		$honorarioMensual__array=array();
		$enero__array=array();
		$febrero__array=array();
		$marzo__array=array();
		$abril__array=array();
		$mayo__array=array();
		$junio__array=array();
		$julio__array=array();
		$agosto__array=array();
		$septiembre__array=array();
		$octubre__array=array();
		$noviembre__array=array();
		$diciembre__array=array();
		$total__array=array();		

		for ($row = 3; $row <= $highestRow; $row++){ 

			if (4<3) {

				$banderaObligatorios=true;

				if (empty($sheet->getCell("A".$row)->getValue())) {
					array_push($obligatorios__exceles,"Columna A Fila ".$row." está vacía");
				}

				$obligatorios__fallas = implode(" ; ", $obligatorios__exceles);

				$jason['obligatorios__falla']=$obligatorios__fallas;

			}else{


				$parametro1__HONORARIOS = strtolower(trim($sheet->getCell("D".$row)->getValue()));

				if(strpos($parametro1__HONORARIOS,'nico')!==false){
			
					$valorActividad=4;

				}else{

					$valorActividad=1;

				}

				array_push($idActividad__array,$valorActividad);

				array_push($cedula__array, trim($sheet->getCell("A".$row)->getValue()));
				array_push($nombres__array, trim($sheet->getCell("B".$row)->getValue()));
				array_push($cargo__array, trim($sheet->getCell("C".$row)->getValue()));
				array_push($tipo__array, trim($sheet->getCell("D".$row)->getValue()));
				array_push($honorarioMensual__array, trim($sheet->getCell("E".$row)->getValue()));
				array_push($enero__array, trim($sheet->getCell("F".$row)->getValue()));
				array_push($febrero__array, trim($sheet->getCell("G".$row)->getValue()));
				array_push($marzo__array, trim($sheet->getCell("H".$row)->getValue()));
				array_push($abril__array, trim($sheet->getCell("I".$row)->getValue()));
				array_push($mayo__array, trim($sheet->getCell("J".$row)->getValue()));
				array_push($junio__array, trim($sheet->getCell("K".$row)->getValue()));
				array_push($julio__array, trim($sheet->getCell("L".$row)->getValue()));
				array_push($agosto__array, trim($sheet->getCell("M".$row)->getValue()));
				array_push($septiembre__array, trim($sheet->getCell("N".$row)->getValue()));
				array_push($octubre__array, trim($sheet->getCell("O".$row)->getValue()));
				array_push($noviembre__array, trim($sheet->getCell("P".$row)->getValue()));
				array_push($diciembre__array, trim($sheet->getCell("Q".$row)->getValue()));
				array_push($total__array, trim($sheet->getCell("R".$row)->getValue()));


			}

		
		}

		$jason['idActividad__array']=$idActividad__array;
		$jason['cedula__array']=$cedula__array;
		$jason['nombres__array']=$nombres__array;
		$jason['cargo__array']=$cargo__array;
		$jason['honorarioMensual__array']=$honorarioMensual__array;
		$jason['enero__array']=$enero__array;
		$jason['febrero__array']=$febrero__array;
		$jason['marzo__array']=$marzo__array;
		$jason['abril__array']=$abril__array;
		$jason['mayo__array']=$mayo__array;
		$jason['junio__array']=$junio__array;
		$jason['julio__array']=$julio__array;
		$jason['agosto__array']=$agosto__array;
		$jason['septiembre__array']=$septiembre__array;
		$jason['octubre__array']=$octubre__array;
		$jason['noviembre__array']=$noviembre__array;
		$jason['diciembre__array']=$diciembre__array;
		$jason['total__array']=$total__array;
		$jason['tipo__array']=$tipo__array;

		break;		


	}

	$jason['banderaObligatorios']=$banderaObligatorios;

	echo json_encode($jason);
