<?php $objetoInformacion= new usuarioAcciones();?>

<?php $informacionObjeto=$objetoInformacion->getInformacionGeneral();?>

<?php $zonalVariable=$objetoInformacion->getObtenerInformacionGeneral("SELECT zonal,fisicamenteEstructura FROM th_usuario WHERE id_usuario='$informacionObjeto[0]';");?>

<input type="hidden" id="fechaPrincipalJ" name="fechaPrincipalJ" />

<input type="hidden" id="zonalUsuario" name="zonalUsuario" value="<?=$zonalVariable[0][zonal]?>" />

<input type="hidden" id="idRolAd" name="idRolAd" value="<?=$informacionObjeto[1]?>" />

<input type="hidden" id="fisicamenteE" name="fisicamenteE" value="<?=$zonalVariable[0][fisicamenteEstructura]?>" />

<input type="hidden" id="idUsuarioC" name="idUsuarioC" value="<?=$informacionObjeto[0]?>" />


<li class="nav-item <?=$objetoInformacion->getUrlDinamicaUna('poa2/',$_SERVER['REQUEST_URI'],array("coordinadorRe","reporteriaFinal","poaResolucionFinal","","coordinadorRecomendados"));?>">

	<a href="#" class="nav-link">
		<i class="fa fa-hand-holding-usd"></i>
		&nbsp;
		<p>
	    	POA
	    	<i class="fa fa-angle-left right"></i>
	    	<span class="badge badge-info right"></span>
		</p>
	</a>

	<ul class="nav nav-treeview">
			
		<li class="nav-item">

		<a href="coordinadorRe" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/',$_SERVER['REQUEST_URI'],'coordinadorRe');?>">
			<i class="fa fa-envelope-open"></i>
			<p>Trámites recibidos</p>

		</a>

		</li>	

		<li class="nav-item">

		<a href="coordinadorRecomendados" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/',$_SERVER['REQUEST_URI'],'coordinadorRecomendados');?>">
			<i class="fa fa-check-circle"></i>
			&nbsp;
			<p>Trámites recomendados</p>

		</a>

		</li>

					
		<li class="nav-item">

		<a href="reporteriaFinal" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/',$_SERVER['REQUEST_URI'],'reporteriaFinal');?>">
			<i class="fa fa-file-alt"></i>
			<p>Trámites</p>

		</a>

		</li>

		<li class="nav-item">

		<a href="poaResolucionFinal" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/',$_SERVER['REQUEST_URI'],'poaResolucionFinal');?>">
			<i class="fa fa-file-signature"></i>
			&nbsp;
			<p>Poas gestionados</p>

		</a>

		</li>	

	</ul>

</li>

<li class="nav-item <?=$objetoInformacion->getUrlDinamicaUna('poa2/',$_SERVER['REQUEST_URI'],array("paidRecomendadosPlani"));?>">

<a href="#" class="nav-link">
	<i class="fa fa-money"></i>
	&nbsp;
	<p>
    	PAID
    	<i class="fa fa-angle-left right"></i>
    	<span class="badge badge-info right"></span>
	</p>
</a>

<ul class="nav nav-treeview">

<li class="nav-item">

<a href="paidRecomendadosPlani" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/',$_SERVER['REQUEST_URI'],'paidRecomendadosPlani');?>">
	<i class="fa fa-check-circle"></i>
	&nbsp;
	<p>Recomendados</p>

</a>

</li>

</ul>

</li>

<li class="nav-item <?=$objetoInformacion->getUrlDinamicaUna('poa2/',$_SERVER['REQUEST_URI'],array("modificacionesRecibidosPlanificacion","directorMd2","modificacionesRevisor","modificacionesRevisorRecomendados","modificacionesRecibidosPlanificacionRecomendados"));?>">

	<a href="#" class="nav-link">
		<p>
			<i class="fa fa-check-circle"></i>
			&nbsp;			
			Modificaciones
			<i class="fas fa-angle-left right"></i>
			<span class="badge badge-info right"></span>
		</p>
	</a>

	<ul class="nav nav-treeview">
			
		<li class="nav-item">

			<a href="modificacionesRecibidosPlanificacion" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/',$_SERVER['REQUEST_URI'],'modificacionesRecibidosPlanificacion');?>">
				<i class="fa fa-check-circle"></i>
				&nbsp;
				<p>Trámites recibidos</p>

			</a>

		</li>

		<?php if ($informacionObjeto[1]==4): ?>
			
		<li class="nav-item">

			<a href="modificacionesRecibidosPlanificacionRecomendados" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/',$_SERVER['REQUEST_URI'],'modificacionesRecibidosPlanificacionRecomendados');?>">
				<i class="fa fa-check-circle"></i>
				&nbsp;
				<p>Trámites Recomendados</p>

			</a>

		</li>

		<?php endif ?>
			
	</ul>

	<ul class="nav nav-treeview">
		<li class="nav-item <?= $objetoInformacion->getUrlDinamicaUna('poa2/', $_SERVER['REQUEST_URI'], array("incrementos","decrementos","reporteriaFinalIncrementos","revision")); ?>">

			<a href="#" class="nav-link">
				<i class="fa fa-dollar-sign"></i>
				&nbsp;
				<p>
					Incrementos
					<i class="fa fa-angle-left right"></i>
					<span class="badge badge-info right"></span>
				</p>
			</a>

			<ul class="nav nav-treeview">

			<li class="nav-item">

				<a href="incrementosRevisor" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'incrementosRevisor'); ?>">
						<i class="fa fa-tasks"></i>
						&nbsp;
						<p>Tramites Incrementos</p>
            
            	</a>

			</li>

			<?php if ($informacionObjeto[1] == 4) : ?>

				<li class="nav-item">

					<a href="incrementosRevisorRecomendado" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], ''); ?>">
						<i class="fa fa-tasks"></i>
						&nbsp;
						<p>Tramites Incrementos Recomendados</p>
            
            		</a>

				</li>

				<li class="nav-item">

					<a href="recorridoIncrementos" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'recorridoIncrementos'); ?>">
						<i class="fa fa-tasks"></i>
						&nbsp;
						<p>Recorrido</p>
            
            		</a>

				</li>

			<?php endif ?>

			</ul>

		</li>
	</ul>

</li> 



<!-- 
<li class="nav-item <?=$objetoInformacion->getUrlDinamicaUna('poa2/',$_SERVER['REQUEST_URI'],array("directorMd","directorMd2"));?>">
	<a href="#" class="nav-link">
		<p>
			Modificaciones
			<i class="fas fa-angle-left right"></i>
			<span class="badge badge-info right"></span>
		</p>
	</a>
	<ul class="nav nav-treeview">
			
		<li class="nav-item">
			<a href="directorMd" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/',$_SERVER['REQUEST_URI'],'directorMd');?>">
				<p>Trámite</p>
			</a>
		</li>
			
		<li class="nav-item">
			<a href="directorMd2" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/',$_SERVER['REQUEST_URI'],'directorMd2');?>">
				<p>Reasignado</p>
			</a>
		</li>
	</ul>
</li> -->