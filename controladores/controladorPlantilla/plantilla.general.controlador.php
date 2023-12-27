<?php

	/*=======================================================
	=            Llamando la plantilla principal            =
	=======================================================*/
	
	 $plantilla= new plantilla();

	 $plantilla->plantillaHead();

	 $plantilla->disparadorEstilosDasboards();

	 $plantilla->plantillaMenu();

	 $plantilla->plantillaContenido();

	 $plantilla->plantillaFooter();

	/*=====  End of Llamando la plantilla principal  ======*/
