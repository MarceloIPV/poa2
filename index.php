<?php

  /*======================================
  =            Página Inicial            =
  ======================================*/
  
   define('INCLUDES', 'config/');

   define('CONTROLADORINDEX', 'controladores/');

   define('INICIOSESIONINDEX', 'inicioSesion/');

   define('MODELOUSUARIO', 'modeloUsuario/');

    define('CONTROLADORCONTROLA', 'controlador/');


  require_once CONTROLADORINDEX.INICIOSESIONINDEX.'ingreso.controlador.php';

  require_once CONTROLADORINDEX.INICIOSESIONINDEX.'controladorSesion.php';


  if ($_GET["ruta"]!="ingreso" && $_GET["ruta"]!="capacitacion") {

    $ingresoDevuelto= new recuperandoLogeo();
    $ingresoDevuelto->ctrrecuperandoLogeo();

    require_once CONTROLADORINDEX.MODELOUSUARIO.'informacionUsuario.md.php';

    require_once CONTROLADORINDEX.CONTROLADORCONTROLA.'menusDasboardUsuarios.controlador.php';

    require_once CONTROLADORINDEX.CONTROLADORCONTROLA.'componentes.controlador.php';

    require_once CONTROLADORINDEX.CONTROLADORCONTROLA.'componentesTablas.controlador.php';

    require_once CONTROLADORINDEX.CONTROLADORCONTROLA.'modificaciones.controlador.php';

    require_once CONTROLADORINDEX.CONTROLADORCONTROLA.'paid.controlador.php';

    require_once CONTROLADORINDEX.CONTROLADORCONTROLA.'componentesControlador__modificaciones__revisor.php';

    require_once CONTROLADORINDEX.CONTROLADORCONTROLA.'indicador.controlador.php';

  }

   require_once INCLUDES.'config.php';


  /*=====  End of Página Inicial  ======*/
  