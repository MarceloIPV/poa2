
<!--=====================================
=            Modales estados            =
======================================-->

<?php if ($informacionObjeto[0][activado]=="I"): ?>
			
	<?php $informacionAsuntos=$objetoInformacion->getObtenerInformacionGeneral("SELECT email,CONCAT(' ',a.nombre,a.apellido) AS nombreCompleto,c.descripcionFisicamenteEstructura,d.nombre AS nombreRol FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_fisicamenteestructura AS c ON c.id_FisicamenteEstructura=a.fisicamenteEstructura INNER JOIN th_roles AS d ON d.id_rol=b.id_rol WHERE a.fisicamenteEstructura='9' AND b.id_rol='2';");?>

<?php endif ?>

<?=$componentes->getModalEstados("modalInformacionOrganismos","formInforOrganismos","<div class='col col-5 titulo__enfasis'>Dirección ubicación</div><div class='col col-7'>".$informacionAsuntos[0][descripcionFisicamenteEstructura]."</div><div class='col col-5 titulo__enfasis'>".$informacionAsuntos[0][nombreRol]."</div><div class='col col-7'>".$informacionAsuntos[0][nombreCompleto]."</div><div class='col col-5 titulo__enfasis'>Email de contacto</div><div class='col col-7'>".$informacionAsuntos[0][email]."</div><div class'col col-12'><textarea id='observacionOnrganismos' name='observacionOnrganismos' class='ancho__total__textareas mt-4 campos__obligatorios' placeholder='Ingrese mensaje del organismo deportivo'></textarea></div><div class='col col-12 d d-flex justify-content-center align-items-center'><input type='hidden' id='emailOrganismo' name='emailOrganismo' value='".$informacionObjeto[0][correo]."'/><input type='hidden' id='nombreOrganismo' name='nombreOrganismo' value='".$informacionObjeto[0][nombreOrganismo]."'/><input type='hidden' id='idOrganismo' name='idOrganismo' value='".$informacionObjeto[0][idOrganismo]."'/><input type='hidden' id='correoResponsable' name='correoResponsable' value='".$informacionAsuntos[0][email]."'/><button id='enviarMensajeCon' name='enviarMensajeCon' class='btn btn-primary mt-4 boton__enlacesOcultos'><i class='fas fa-envelope-open-text'></i>&nbsp;&nbsp;Enviar</button><div class='reload__Enviosrealizados'></div></div>");?>

<!--====  End of Modales estados  ====-->


