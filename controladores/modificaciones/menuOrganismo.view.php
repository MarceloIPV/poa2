<?php $objetoInformacion= new usuarioAcciones();?>                                          

<?php $anioActual = date('Y');?>

<?php $informacionObjeto=$objetoInformacion->getInformacionCompletaOrganismoDeportivo();?>

<?php $observaciones=$objetoInformacion->getObservacionesAprobacionUsuarios($informacionObjeto[0][idOrganismo]);?>

<?php $observacionOrganismo=$objetoInformacion->getObtenerInformacionGeneral("SELECT estado FROM poa_conclusion_observacion WHERE idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND estado='A';");?>

<?php $estadoFinal=$objetoInformacion->getObtenerInformacionGeneral("SELECT idOrganismo FROM poa_documentofinal WHERE idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND  YEAR(NOW())='$anioActual';");?>


<input type="hidden" id="fechaPrincipalJ" name="fechaPrincipalJ" />

<input type="hidden" id="organismoIdPrin" name="organismoIdPrin" value="<?=$informacionObjeto[0][idOrganismo]?>">


<li class="nav-item">

<a href="dashboard" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa5/',$_SERVER['REQUEST_URI'],'dashboard');?>">

	<p>Dashboard</p>

</a>

</li>

<li class="nav-item">

<a href="datosGenerales" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa5/',$_SERVER['REQUEST_URI'],'datosGenerales');?>">

	<p>Datos generales</p>

</a>

</li>

<?php if ($informacionObjeto[0][activado]=="A" && !empty($informacionObjeto[0][periodo]) && $informacionObjeto[0][periodo]!=null): ?>
	
<li class="nav-item">

<a href="planificacion" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa5/',$_SERVER['REQUEST_URI'],'planificacion');?>">

	<p>Registro de presupuesto</p>

</a>

</li>

<?php endif ?>

<?php if (!empty($observacionOrganismo[0][estado]) && $observacionOrganismo[0][estado]!=null && $observacionOrganismo[0][estado]=="A"): ?>

<li class="nav-item">

<a href="ventanaObservaciones" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa5/',$_SERVER['REQUEST_URI'],'ventanaObservaciones');?>">

	<p>Ventana de observaciones</p>

</a>

</li>

<?php endif ?>

<?php if (!empty($estadoFinal[0][idOrganismo]) && $estadoFinal[0][idOrganismo]!=null): ?>

<li class="nav-item">

<a href="registroTrasnferencia" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa5/',$_SERVER['REQUEST_URI'],'registroTrasnferencia');?>">

	<p>Registro de transferencia</p>

</a>

</li> 

<li class="nav-item">

<a href="seguimiento" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa5/',$_SERVER['REQUEST_URI'],'seguimiento');?>">

	<p>Seguimiento</p>

</a>

</li> 


<li class="nav-item">

<a href="modificacionesOrganismo" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa5/',$_SERVER['REQUEST_URI'],'modificacionesOrganismo');?>">

	<p>Modificaciones</p>

</a>
<ul>


<a href="modificacionesMontos" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa5/',$_SERVER['REQUEST_URI'],'modificacionesMontos');?>">

	<p> Montos</p>

</a>
<a href="modificacionesSueldosSalarios" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa5/',$_SERVER['REQUEST_URI'],'modificacionesSueldosSalarios');?>">

	<p> Sueldos y salarios</p>

</a>
</ul>
</li> 

<li class="nav-item">

<a href="modificaciones2022" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa5/',$_SERVER['REQUEST_URI'],'modificaciones2022');?>">

	<p>Modificaciones 2022</p>

</a>

</li> 

<!-- <li class="nav-item">

<a href="modificaciones" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa5/',$_SERVER['REQUEST_URI'],'modificaciones');?>">

	<p>Sección de modificaciones</p>

</a>

</li> 
 -->

<?php endif ?>

<li class="nav-item">

<a href="reporteriaOrganismos" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa5/',$_SERVER['REQUEST_URI'],'reporteriaOrganismos');?>">

	<p>Reportería</p>

</a>

</li>

