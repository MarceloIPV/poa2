$(document).ready(function () {


datatablets($("#reporteriaDefinitiva__c"),"reporteriaDefinitiva__c",false,false,false,false,false,false,false);

datatablets($("#asignaciones__realizadas__finan__trazabilidad"),"asignaciones__realizadas__finan__trazabilidad",false,false,false,false,false,false,false);

datatablets($("#paid__poas__asignaciones"),"paid__poas__asignaciones",false,objetos([4],["enlace"],['documento'],["documentos/presupuestoPaidOrganismos/"],["documento"]),1,[false],false,false,false);

datatablets($("#aprobacionUsuarios"),"aprobacionUsuarios",[$("#idUsuarioPrincipal").val()],objetos([4],["boton"],["<center><button class='aprobacionUsuariosBoton estilo__botonDatatablets btn btn-primary' data-toggle='modal' data-target='#modalAprobar'><i class='fas fa-eye'></i>&nbsp;&nbsp;Ver</button><center>"],[false],[false]),1,["funcionObtener"],["nomprePresidente","emailPresidente","celularPresidente","nombreProvincia","nombreCanton","nombreParroquia","nombreResponsablePoa","correoResponsablePoa","telefonoOficina"],[4,22,23,5,6,7,25,26,3],30);


datatablets($("#intervencionesAsuntos"),"intervencionesAsuntos",[$("#idUsuarioPrincipal").val(),$("#zonalUsuario").val(),$("#idRolAd").val()],objetos([9],["boton"],["<center><button class='eliminar__boton estilo__botonDatatablets btn btn-danger' data-toggle='modal' data-target='#modalEliminarIntervencio'>Eliminar</button><center>"],false,false),1,[false,"funcion__eliminar"],[9],["idOrganismo"],"eliminar__boton");


datatablets($("#esigef"),"esigef",[$("#idUsuarioPrincipal").val(),$("#zonalUsuario").val(),$("#idRolAd").val()],objetos([4],["boton"],["<center><button class='eliminar__boton estilo__botonDatatablets btn btn-danger' data-toggle='modal' data-target='#modalEliminarIntervencio'>Eliminar</button><center>"],false,false),1,[false,"funcion__eliminar__esigef"],[6],["idOrganismo"],"eliminar__boton");

datatablets($("#asignarPresupuesto"),"asignarPresupuesto",[$("#idUsuarioPrincipal").val(),$("#zonalUsuario").val(),$("#idRolAd").val()],objetos([5,6,7,8,9],["texto","texto","texto","boton","boton"],[7,8,9,"<center><button class='asignar__boton estilo__botonDatatablets btn btn-primary' data-toggle='modal' data-target='#modalAsignarPre'>Asignar</button><center>","<center><button class='botonEditarOr estilo__botonDatatablets btn btn-info' data-toggle='modal' data-target='#orgaModalOrga'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]),1,["funcionObtenerOrganismos","funcionEditarOrga"],[4,5],["idOrganismo","idOrganismo"],"asignar__boton");

datatablets($("#asignarPresupuestoMo"),"asignarPresupuestoMo",[$("#idUsuarioPrincipal").val(),$("#zonalUsuario").val(),$("#idRolAd").val()],objetos([4,5,6],["enlace","boton","boton"],['nombreInversion',"<center><button class='asignar__boton estilo__botonDatatablets btn btn-primary' data-toggle='modal' data-target='#modalAsignarPre'>Modificar</button><center>","<center><button class='botonEditarOr estilo__botonDatatablets btn btn-info' data-toggle='modal' data-target='#orgaModalOrga'><i class='fas fa-user-edit'></i></button><center>"],["documentos/asignacionRecursos/",false,false],["idInversion",false,false]),1,[false,"funcionObtenerOrganismosM","funcionEditarOrgaM"],[4,5,6],[false,"idOrganismo","idOrganismo"],"asignar__boton");


datatablets($("#aprobadosTecnicos__enviados"),"aprobadosTecnicos__enviados",[$("#idUsuarioPrincipal").val(),$("#zonalUsuario").val(),$("#idRolAd").val()],objetos([4],["boton"],["<center><button class='asignarBoton__coor estilo__botonDatatablets btn btn-primary' data-toggle='modal' data-target='#modalMatrizCoordinadores'>Asignar</button><center>"],false,false),1,[false,"funcionCoordinasOb"],[4],["idOrganismo"],"asignfuncionCoordinasObarBoton__coor");

datatablets($("#observciones__enviados"),"observciones__enviados",[$("#idUsuarioPrincipal").val(),$("#zonalUsuario").val(),$("#idRolAd").val()],objetos([4],["boton"],["<center><button class='asignarBoton__coor estilo__botonDatatablets btn btn-primary' data-toggle='modal' data-target='#modalMatrizCoordinadores'>Asignar</button><center>"],false,false),1,[false,"funcionCoordinasObservacion"],[4],["idOrganismo"],"asignarBoton__coor");

datatablets($("#organismosActivosPre"),"organismosActivosPre",[$("#idUsuarioPrincipal").val(),$("#zonalUsuario").val(),$("#idRolAd").val()],objetos([2,3],["texto__separadores","texto__separadores"],[2,3],false,false),false,false,false,false,false);

if ($("#usuarioP").val()=="si") {
	datatablets($("#poasGestionados"),"poasGestionados",false,objetos([6,9,10],["enlace","boton","boton"],['documento',"<center><button class='editarGestionados estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#editarInfor__gestionados'><i class='fas fa-user-edit'></i></button><center>","<center><button class='generarVerG btn btn-warning pointer__botones' data-toggle='modal' data-target='#verPoaGe'><i class='fas icono__boton fa-eye'></i></button><center>"],["documentos/aprobacion/",false,false],["documento",false,false]),1,[false,"funcionEditar__gestionados","funcionEditar__gestionados_s"],false,false,false);
}else{
	datatablets($("#poasGestionados"),"poasGestionados",false,objetos([6,9],["enlace","boton"],['documento',"<center><button class='generarVerG btn btn-warning pointer__botones' data-toggle='modal' data-target='#verPoaGe'><i class='fas icono__boton fa-eye'></i></button><center>"],["documentos/aprobacion/",false],["documento",false]),1,[false,"funcionEditar__gestionados_s"],false,false,false);
}




datatablets($("#organismosRegistrados_i"),"organismosRegistrados_i",false,false,false,false,false,false,false);

datatablets($("#usuariosAplicativo"),"usuariosAplicativo",[$("#idUsuarioPrincipal").val()],objetos([2,3],["boton","boton"],["<center><button class='editarUsuarios estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#editarUsuariosModal'><i class='fas fa-user-edit'></i></button><center>","<center><button class='eliminarUsuarios estilo__botonDatatablets btn btn-danger pointer__botones'><i class='fas fa-trash'></i></button><center>"],[false],[false]),1,["funcionObtener"],[false],[false],false);


datatablets($("#organismoSubses"),"organismoSubses",[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],objetos([7,8,9],["texto","boton","texto"],[11,"<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center>",10],[false],[false]),1,["funcionReasingarTra"],[false],[false],false);


datatablets($("#poasGestionados__finan"),"poasGestionados__finan",[$("#idUsuarioPrincipal").val(),$("#fisicamenteE").val(),$("#idRolAd").val()],objetos([7],["boton__2"],[8],[5],[9],false),1,["funcionReasingarTra__finan"],[false],[false],false);

datatablets($("#poasGestionados__finan__rechado"),"poasGestionados__finan__rechado",[$("#idUsuarioPrincipal").val(),$("#fisicamenteE").val(),$("#idRolAd").val()],objetos([7],["boton__2"],[8],[5],[false],false),1,["funcionReasingarTra__finan__rechazar"],[false],[false],false);

datatablets($("#poasGestionados__finan__suspencion"),"poasGestionados__finan__suspencion",[$("#idUsuarioPrincipal").val(),$("#zonalUsuario").val(),$("#idRolAd").val()],false,1,false,[false],[false],false);


/*===============================================
=            Aprobados para tecnicos            =
===============================================*/

datatablets($("#poasGestionados__finan__aprobado__dos"),"poasGestionados__finan__aprobado__dos",[$("#idUsuarioPrincipal").val(),$("#zonalUsuario").val(),$("#idRolAd").val()],objetos([5],["boton"],["<center><button class='reasignarTramites__dos estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra__dos'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]),1,["funcionReasingar__aprobados__dos"],[false],[false],false);

/*=====  End of Aprobados para tecnicos  ======*/


datatablets($("#poasGestionados__finan__aprobado"),"poasGestionados__finan__aprobado",[$("#idUsuarioPrincipal").val(),$("#zonalUsuario").val(),$("#idRolAd").val()],false,1,false,[false],[false],false);

datatablets($("#asignaciones__realizadas__finan"),"asignaciones__realizadas__finan",[$("#idUsuarioPrincipal").val(),$("#zonalUsuario").val(),$("#idRolAd").val()],objetos([7],["boton"],["<center><button class='terminarBoton__financieros estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#terminarFinanciero'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]),1,["funcion___termina__financiero"],[false],[false],false);


datatablets($("#organismoSubsesCoordinas"),"organismoSubsesCoordinas",[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],objetos([7,8],["boton","texto"],["<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center>",10],[false],[false]),1,["funcionReasingarTraCoordinas"],[false],[false],false);


datatablets($("#organismoSubsesCoordinasReco"),"organismoSubsesCoordinasReco",[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],objetos([7],["boton"],["<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]),1,["funcionReasingarTraCoordinas__subsess"],[false],[false],false);


datatablets($("#organismoSubsesCoordinasFinanRe"),"organismoSubsesCoordinasFinanRe",[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],objetos([7],["boton"],["<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]),1,["funcionReasingarTraCoordinas__financs"],[false],[false],false);



datatablets($("#organismoSubsesRecomen"),"organismoSubsesRecomen",[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],objetos([7],["boton"],["<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]),1,["funcionReasingarTraCoordinas__instalaciones"],[false],[false],false);



datatablets($("#organismoSubsesCoordinasFinan"),"organismoSubsesCoordinasFinan",[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],objetos([7,8],["boton","texto"],["<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center>",10],[false],[false]),1,["funcionReasingarTraCoordinasFinan"],[false],[false],false);


datatablets($("#organismoSubsesRe"),"organismoSubsesRe",[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],objetos([7],["boton"],["<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]),1,["funcionReasingarTraRe"],[false],[false],false);

datatablets($("#organismoSubsesReAdminis"),"organismoSubsesReAdminis",[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val(),"administrativo"],objetos([7],["boton"],["<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]),1,["funcionReasingarTraReAdminis"],[false],[false],false);

datatablets($("#organismoSubsesReTalentoHu"),"organismoSubsesReTalentoHu",[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val(),"humano"],objetos([7],["boton"],["<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]),1,["funcionReasingarTraRe_talento"],[false],[false],false);


datatablets($("#organismoSubsesReInsta"),"organismoSubsesReInsta",[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val(),"humano"],objetos([7],["boton"],["<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]),1,["funcionReasingarTraReInstala"],[false],[false],false);


datatablets($("#organismoSubsesReInfra"),"organismoSubsesReInfra",[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val(),"humano"],objetos([7],["boton"],["<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]),1,["funcionReasingarTraReInfran"],[false],[false],false);


datatablets($("#organismoGeneralEn"),"organismoGeneralEn",[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],objetos([7],["boton"],["<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]),1,["funcionReasingarTraGe"],[false],[false],false);


datatablets($("#organismoGeneralEn__modificaciones"),"organismoGeneralEn__modificaciones",[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],objetos([7],["boton"],["<center><button class='reasignarTramites__modificaciones estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]),1,["funcionReasingarTraGe__modificaciones"],[false],[false],false);


/*=========================================
=            Admnistración poa            =
=========================================*/

datatablets($("#tablaLineaP"),"tablaLineaP",[$("#idUsuarioPrincipal").val()],objetos([1,2],["boton","boton"],["<center><button class='editarLinea estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#lineaPoliticaEdita'><i class='fas fa-user-edit'></i></button><center>","<center><button class='eliminarLinea estilo__botonDatatablets btn btn-danger pointer__botones'><i class='fas fa-trash'></i></button><center>"],[false],[false]),-1,["funcion__editar","funcion__datatabletsEliminar"],["editarLinea","eliminarLinea"],["lineaEdita","lineaElimina"],["edita","elimina"],[1,0],['enviado','input__1']);



datatablets($("#tablaPrograma"),"tablaPrograma",[$("#idUsuarioPrincipal").val()],objetos([1,2],["boton","boton"],["<center><button class='editarPrograma estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#programaEditaModal'><i class='fas fa-user-edit'></i></button><center>","<center><button class='eliminarPrograma estilo__botonDatatablets btn btn-danger pointer__botones'><i class='fas fa-trash'></i></button><center>"],[false],[false]),-1,["funcion__editar","funcion__datatabletsEliminar"],["editarPrograma","eliminarPrograma"],["programaEdita","programaElimina"],["edita","elimina"],[1,0],['enviado','input__1']);


datatablets($("#tablaIndicadores"),"tablaIndicadores",[$("#idUsuarioPrincipal").val()],objetos([1,2],["boton","boton"],["<center><button class='editarIndicadores estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#indicadoresEditaModal'><i class='fas fa-user-edit'></i></button><center>","<center><button class='eliminarIndicadores estilo__botonDatatablets btn btn-danger pointer__botones'><i class='fas fa-trash'></i></button><center>"],[false],[false]),-1,["funcion__editar","funcion__datatabletsEliminar"],["editarIndicadores","eliminarIndicadores"],["indicadoresEdita","indicadoresElimina"],["edita","elimina"],[1,0],['enviado','input__1']);


datatablets($("#tablaDeportes"),"tablaDeportes",[$("#idUsuarioPrincipal").val()],objetos([1,2],["boton","boton"],["<center><button class='editarDeportes estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#deportesEditaModal'><i class='fas fa-user-edit'></i></button><center>","<center><button class='eliminarDeportes estilo__botonDatatablets btn btn-danger pointer__botones'><i class='fas fa-trash'></i></button><center>"],[false],[false]),-1,["funcion__editar","funcion__datatabletsEliminar"],["editarDeportes","eliminarDeportes"],["deportesEdita","deportesElimina"],["edita","elimina"],[1,0],['enviado','input__1']);



datatablets($("#tablaAlcance"),"tablaAlcance",[$("#idUsuarioPrincipal").val()],objetos([1,2],["boton","boton"],["<center><button class='editarAlcance estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#alcanceEditaModal'><i class='fas fa-user-edit'></i></button><center>","<center><button class='eliminarAlcance estilo__botonDatatablets btn btn-danger pointer__botones'><i class='fas fa-trash'></i></button><center>"],[false],[false]),-1,["funcion__editar","funcion__datatabletsEliminar"],["editarAlcance","eliminarAlcance"],["alcanceEdita","alcanceElimina"],["edita","elimina"],[1,0],['enviado','input__1']);


datatablets($("#tablaFinanciamiento"),"tablaFinanciamiento",[$("#idUsuarioPrincipal").val()],objetos([1,2],["boton","boton"],["<center><button class='editarFinanciamiento estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#fianncimientoEditaModal'><i class='fas fa-user-edit'></i></button><center>","<center><button class='eliminarFinanciamiento estilo__botonDatatablets btn btn-danger pointer__botones'><i class='fas fa-trash'></i></button><center>"],[false],[false]),-1,["funcion__editar","funcion__datatabletsEliminar"],["editarFinanciamiento","eliminarFinanciamiento"],["tipoFiEdita","tipoFiElimina"],["edita","elimina"],[1,0],['enviado','input__1']);

datatablets($("#tablaCargo"),"tablaCargo",[$("#idUsuarioPrincipal").val()],objetos([1,2],["boton","boton"],["<center><button class='editarcargo estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#cargoEdita'><i class='fas fa-user-edit'></i></button><center>","<center><button class='eliminarcargo estilo__botonDatatablets btn btn-danger pointer__botones'><i class='fas fa-trash'></i></button><center>"],[false],[false]),-1,["funcion__editar","funcion__datatabletsEliminar"],["editarcargo","eliminarcargo"],["cargoEdita","cargoElimina"],["edita","elimina"],[1,0],['enviado','input__1']);


datatablets($("#tablaObjetivo"),"tablaObjetivo",[$("#idUsuarioPrincipal").val()],objetos([1,2,3],["texto","boton","boton"],[2,"<center><button class='editarObjetivos estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#objetivoEditaModal'><i class='fas fa-user-edit'></i></button><center>","<center><button class='eliminarObjetivos estilo__botonDatatablets btn btn-danger pointer__botones'><i class='fas fa-trash'></i></button><center>"],[false],[false]),-1,["funcion__editar","funcion__datatabletsEliminar"],["editarObjetivos","eliminarObjetivos"],["objetivosEdita","objetivosElimina"],["edita","elimina"],[1,0,4],['enviado','input__1','select__2Objetivos']);



datatablets($("#tablaTipoOrganismo"),"tablaTipoOrganismo",[$("#idUsuarioPrincipal").val()],objetos([1,2,3,4,5],["texto","texto","texto","boton","boton"],[2,3,4,"<center><button class='editarTipoOrganismo estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#tipoOrganismoEditaModal'><i class='fas fa-user-edit'></i></button><center>","<center><button class='eliminarTipoOrganismos estilo__botonDatatablets btn btn-danger pointer__botones'><i class='fas fa-trash'></i></button><center>"],[false],[false]),-1,["funcion__editar","funcion__datatabletsEliminares"],["editarTipoOrganismo","eliminarTipoOrganismos"],["tipoOrganismoEdita","tipoOrganismoElimina"],["edita","elimina"],[1,0,5,6,7],['enviado','input__1','select__1','select__2','select__3']);


datatablets($("#tablaAreaAccion"),"tablaAreaAccion",[$("#idUsuarioPrincipal").val()],objetos([1,2],["boton","boton"],["<center><button class='editarAccion estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#areaAccionEdita'><i class='fas fa-user-edit'></i></button><center>","<center><button class='eliminarAccion estilo__botonDatatablets btn btn-danger pointer__botones'><i class='fas fa-trash'></i></button><center>"],[false],[false]),-1,["funcion__editar","funcion__datatabletsEliminar"],["editarAccion","eliminarAccion"],["accionEdita","accionElimina"],["edita","elimina"],[1,0],['enviado','input__1']);

datatablets($("#tablaAreaEncargada"),"tablaAreaEncargada",[$("#idUsuarioPrincipal").val()],objetos([1,2],["boton","boton"],["<center><button class='editarAreaEn estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#areaEncargadaEdita'><i class='fas fa-user-edit'></i></button><center>","<center><button class='eliminarAreaEn estilo__botonDatatablets btn btn-danger pointer__botones'><i class='fas fa-trash'></i></button><center>"],[false],[false]),-1,["funcion__editar","funcion__datatabletsEliminar"],["editarAreaEn","eliminarAreaEn"],["areaEnEdita","areaEnElimina"],["edita","elimina"],[1,0],['enviado','input__1']);

datatablets($("#tablaGrupoGasto"),"tablaGrupoGasto",[$("#idUsuarioPrincipal").val()],objetos([1,2],["boton","boton"],["<center><button class='editarGrupoGastos estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#grupoGastoEdita'><i class='fas fa-user-edit'></i></button><center>","<center><button class='eliminarGrupoGastos estilo__botonDatatablets btn btn-danger pointer__botones'><i class='fas fa-trash'></i></button><center>"],[false],[false]),-1,["funcion__editar","funcion__datatabletsEliminar"],["editarGrupoGastos","eliminarGrupoGastos"],["gastoEdita","gastosElimina"],["edita","elimina"],[1,0],['enviado','input__1']);

datatablets($("#tablaItems"),"tablaItems",[$("#idUsuarioPrincipal").val()],objetos([1,2,3],["texto","boton","boton"],[8,"<center><button class='editarItems estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#itemsEditaModal'><i class='fas fa-user-edit'></i></button><center>","<center><button class='eliminarItems estilo__botonDatatablets btn btn-danger pointer__botones'><i class='fas fa-trash'></i></button><center>"],[false],[false]),-1,["funcion__editar","funcion__datatabletsEliminar"],["editarItems","eliminarItems"],["itemsEdita","itemsElimina"],["edita","elimina"],[1,0,8],['enviado','input__1','input__2Items']);

datatablets($("#tablaActividades"),"tablaActividades",[$("#idUsuarioPrincipal").val()],objetos([2,3,4,5,6],["boton","texto","texto","boton","boton"],["<center><button class='verItems estilo__botonDatatablets btn btn-warning pointer__botones' data-toggle='modal' data-target='#actividadesEditaModalAc'><i class='fas fa-eye'></i></button><center>",5,7,"<center><button class='editarActividades estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#actividadesEditaModal'><i class='fas fa-user-edit'></i></button><center>","<center><button class='eliminarActividades estilo__botonDatatablets btn btn-danger pointer__botones'><i class='fas fa-trash'></i></button><center>"],[false],[false]),-1,["funcion__verItems","funcion__editar","funcion__datatabletsEliminar"],["verItems","editarActividades","eliminarActividades"],["verItems","actividadesEdita","actividadesElimina"],["edita","edita","elimina"],[2,1,0,4],['enviado','input__1','select__grupoG','select__indiCadores',"inputActividades","inputActividadesdos"]);

/*=====  End of Admnistración poa  ======*/

/*=============================================
=            Organismos deportivos            =
=============================================*/

var agregarDatatablets=function(parametro1,parametro2,parametro3,parametro4){

$(parametro1).click(function (e){

	datatablets($(parametro2),parametro3,[parametro4],false,false,false,[false],[false],false);

});

}

agregarDatatablets($("#sueldos"),$(".reporteria__sueldosySalarios"),"reporteria__sueldosySalarios",$("#idOrganismoPrincipal").val());
agregarDatatablets($("#honorarios"),$(".reporteria__honorarios"),"reporteria__honorarios",$("#idOrganismoPrincipal").val());
agregarDatatablets($("#actividades"),$(".reporteria__actividades"),"reporteria__actividades",$("#idOrganismoPrincipal").val());
agregarDatatablets($("#administrativo"),$(".reporteria__administrativas"),"reporteria__administrativas",$("#idOrganismoPrincipal").val());
agregarDatatablets($("#mantenimiento"),$(".reporteria__mantenimiento"),"reporteria__mantenimiento",$("#idOrganismoPrincipal").val());
agregarDatatablets($("#suministros"),$(".reporteria__suministros"),"reporteria__suministros",$("#idOrganismoPrincipal").val());

agregarDatatablets($("#poaIn"),$(".poa__inicial__poa"),"poa__inicial__poa",$("#idOrganismoPrincipal").val());

agregarDatatablets($("#poaIndica"),$(".poa__indicadores__poa"),"poa__indicadores__poa",$("#idOrganismoPrincipal").val());

/*=====  End of Organismos deportivos  ======*/


});


var objetos=function(parametro1,parametro2,parametro3,parametro4,parametro5,parametro6){

	var objeto = [];

	/*=============================================
	=            Creación de elementos            =
	=============================================*/
	

	if (parametro1[0]!="" && parametro1[0]!=" ") {

		objeto.push({ 

			"aTargets":[parametro1[0]], 
			"mData": null,
			"mRender": (function (data, type, row) {

				if (parametro2[0]=="enlace") {

					if (row[parametro5[0]].indexOf('.pdf') > -1){
						return "<center><a href='"+parametro4[0]+row[parametro5[0]]+"' target='_blank'>"+row[parametro3[0]]+"</a></center>";
					}else{
						return "<center><a href='"+parametro4[0]+row[parametro5[0]]+".pdf' target='_blank'>"+row[parametro3[0]]+"</a></center>";
					}

				}else if(parametro2[0]=="boton"){

					return parametro3[0];

				}else if(parametro2[0]=="texto__separadores"){


					if (row[parametro3[0]]!="" && row[parametro3[0]]!=null && row[parametro3[0]]!=undefined) {

						let arr = row[parametro3[0]].split(';;;;');

						if (arr.length>0) {

							if (arr[0]!=undefined && arr[0]!="undefined") {

								var primero="<div>"+arr[0]+"</div>";

							}else{
								primero="<div></div>";
							}



							if (arr[1]!=undefined && arr[1]!="undefined") {

								var segundo="<div>"+arr[1]+"</div>";

							}else{
								segundo="<div></div>";
							}



							if (arr[2]!=undefined && arr[2]!="undefined") {

								var tercero="<div>"+arr[2]+"</div>";

							}else{
								tercero="<div></div>";
							}



							if (arr[3]!=undefined && arr[3]!="undefined") {

								var cuarto="<div>"+arr[3]+"</div>";

							}else{
								cuarto="<div></div>";
							}



							if (arr[4]!=undefined && arr[4]!="undefined") {

								var quinto="<div>"+arr[4]+"</div>";

							}else{
								quinto="<div></div>";
							}



							if (arr[5]!=undefined && arr[5]!="undefined") {

								var sexto="<div>"+arr[5]+"</div>";

							}else{
								sexto="<div></div>";
							}



							return primero+"<br>"+segundo+"<br>"+tercero+"<br>"+cuarto+"<br>"+quinto+"<br>"+sexto;

						}else{

							return "No asignado";

						}					

					}else{

						return "No asignado";


					}

				}else if(parametro2[0]=="boton__2"){

					if(row[parametro4[0]]=="Notificado por no presentación de requisitos"){

						return "Notificado por no presentación de requisitos";

					}else if (row[parametro3[0]]!="" && row[parametro3[0]]!=null) {

						return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

					}else{

						return "Aún no presenta los documentos";

					}


				}else{
					return row[parametro3[0]];
				}

			})

		});		

	}

	if (parametro1[1]!="" && parametro1[1]!=" ") {

		objeto.push({ 

			"aTargets":[parametro1[1]], 
			"mData": null,
			"mRender": (function (data, type, row) {

				if (parametro2[1]=="enlace") {

					if (row[parametro5[1]].indexOf('.pdf') > -1){
						return "<center><a href='"+parametro4[1]+row[parametro5[1]]+"' target='_blank'>"+row[parametro3[1]]+"</a></center>";
					}else{
						return "<center><a href='"+parametro4[1]+row[parametro5[1]]+".pdf' target='_blank'>"+row[parametro3[1]]+"</a></center>";
					}

				}else if(parametro2[1]=="boton"){

					return parametro3[1];

				}else if(parametro2[1]=="texto__separadores"){


					if (row[parametro3[1]]!="" && row[parametro3[1]]!=null && row[parametro3[1]]!=undefined) {

						let arr = row[parametro3[1]].split(';;;;');

					if (arr.length>0) {

							if (arr[0]!=undefined && arr[0]!="undefined") {

								var primero="<div>"+arr[0]+"</div>";

							}else{
								primero="<div></div>";
							}



							if (arr[1]!=undefined && arr[1]!="undefined") {

								var segundo="<div>"+arr[1]+"</div>";

							}else{
								segundo="<div></div>";
							}



							if (arr[2]!=undefined && arr[2]!="undefined") {

								var tercero="<div>"+arr[2]+"</div>";

							}else{
								tercero="<div></div>";
							}



							if (arr[3]!=undefined && arr[3]!="undefined") {

								var cuarto="<div>"+arr[3]+"</div>";

							}else{
								cuarto="<div></div>";
							}



							if (arr[4]!=undefined && arr[4]!="undefined") {

								var quinto="<div>"+arr[4]+"</div>";

							}else{
								quinto="<div></div>";
							}



							if (arr[5]!=undefined && arr[5]!="undefined") {

								var sexto="<div>"+arr[5]+"</div>";

							}else{
								sexto="<div></div>";
							}



							return primero+"<br>"+segundo+"<br>"+tercero+"<br>"+cuarto+"<br>"+quinto+"<br>"+sexto;

						}else{

							return "No asignado";

						}						

					}else{

						return "No asignado";


					}

				}else if(parametro2[0]=="boton__2"){

					if(row[parametro4[0]]=="Notificado por no presentación de requisitos"){

						return "Notificado por no presentación de requisitos";

					}else if (row[parametro3[0]]!="" && row[parametro3[0]]!=null) {

						return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

					}else{

						return "Aún no presenta los documentos";

					}


				}else{
					return row[parametro3[1]];
				}

			})

		});
	
	}

	if (parametro1[2]!="" && parametro1[2]!=" ") {

		objeto.push({ 

			"aTargets":[parametro1[2]], 
			"mData": null,
			"mRender": (function (data, type, row) {

				if (parametro2[2]=="enlace") {

					if (row[parametro5[2]].indexOf('.pdf') > -1){
						return "<center><a href='"+parametro4[2]+row[parametro5[2]]+"' target='_blank'>"+row[parametro3[2]]+"</a></center>";
					}else{
						return "<center><a href='"+parametro4[2]+row[parametro5[2]]+".pdf' target='_blank'>"+row[parametro3[2]]+"</a></center>";
					}

				}else if(parametro2[2]=="boton"){

					return parametro3[2];

				}else if(parametro2[2]=="texto__separadores"){


					if (row[parametro3[2]]!="" && row[parametro3[2]]!=null && row[parametro3[2]]!=undefined) {

						let arr = row[parametro3[2]].split(';;;;');
					if (arr.length>0) {

							if (arr[0]!=undefined && arr[0]!="undefined") {

								var primero="<div>"+arr[0]+"</div>";

							}else{
								primero="<div></div>";
							}



							if (arr[1]!=undefined && arr[1]!="undefined") {

								var segundo="<div>"+arr[1]+"</div>";

							}else{
								segundo="<div></div>";
							}



							if (arr[2]!=undefined && arr[2]!="undefined") {

								var tercero="<div>"+arr[2]+"</div>";

							}else{
								tercero="<div></div>";
							}



							if (arr[3]!=undefined && arr[3]!="undefined") {

								var cuarto="<div>"+arr[3]+"</div>";

							}else{
								cuarto="<div></div>";
							}



							if (arr[4]!=undefined && arr[4]!="undefined") {

								var quinto="<div>"+arr[4]+"</div>";

							}else{
								quinto="<div></div>";
							}



							if (arr[5]!=undefined && arr[5]!="undefined") {

								var sexto="<div>"+arr[5]+"</div>";

							}else{
								sexto="<div></div>";
							}



							return primero+"<br>"+segundo+"<br>"+tercero+"<br>"+cuarto+"<br>"+quinto+"<br>"+sexto;

						}else{

							return "No asignado";

						}			
					}else{

						return "No asignado";


					}

				}else if(parametro2[0]=="boton__2"){

					if(row[parametro4[0]]=="Notificado por no presentación de requisitos"){

						return "Notificado por no presentación de requisitos";

					}else if (row[parametro3[0]]!="" && row[parametro3[0]]!=null) {

						return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

					}else{

						return "Aún no presenta los documentos";

					}


				}else{
					return row[parametro3[2]];
				}

			})

		});

	}

	if (parametro1[3]!="" && parametro1[3]!=" ") {

		objeto.push({ 

			"aTargets":[parametro1[3]], 
			"mData": null,
			"mRender": (function (data, type, row) {

				if (parametro2[3]=="enlace") {

					if (row[parametro5[3]].indexOf('.pdf') > -1){
						return "<center><a href='"+parametro4[3]+row[parametro5[3]]+"' target='_blank'>"+row[parametro3[3]]+"</a></center>";
					}else{
						return "<center><a href='"+parametro4[3]+row[parametro5[3]]+".pdf' target='_blank'>"+row[parametro3[3]]+"</a></center>";
					}

				}else if(parametro2[3]=="boton"){

					return parametro3[3];

				}else if(parametro2[3]=="texto__separadores"){


					if (row[parametro3[3]]!="" && row[parametro3[3]]!=null && row[parametro3[3]]!=undefined) {

						let arr = row[parametro3[3]].split(';;;;');

					if (arr.length>0) {

							if (arr[0]!=undefined && arr[0]!="undefined") {

								var primero="<div>"+arr[0]+"</div>";

							}else{
								primero="<div></div>";
							}



							if (arr[1]!=undefined && arr[1]!="undefined") {

								var segundo="<div>"+arr[1]+"</div>";

							}else{
								segundo="<div></div>";
							}



							if (arr[2]!=undefined && arr[2]!="undefined") {

								var tercero="<div>"+arr[2]+"</div>";

							}else{
								tercero="<div></div>";
							}



							if (arr[3]!=undefined && arr[3]!="undefined") {

								var cuarto="<div>"+arr[3]+"</div>";

							}else{
								cuarto="<div></div>";
							}



							if (arr[4]!=undefined && arr[4]!="undefined") {

								var quinto="<div>"+arr[4]+"</div>";

							}else{
								quinto="<div></div>";
							}



							if (arr[5]!=undefined && arr[5]!="undefined") {

								var sexto="<div>"+arr[5]+"</div>";

							}else{
								sexto="<div></div>";
							}



							return primero+"<br>"+segundo+"<br>"+tercero+"<br>"+cuarto+"<br>"+quinto+"<br>"+sexto;

						}else{

							return "No asignado";

						}						

					}else{

						return "No asignado";


					}

				}else if(parametro2[0]=="boton__2"){

					if(row[parametro4[0]]=="Notificado por no presentación de requisitos"){

						return "Notificado por no presentación de requisitos";

					}else if (row[parametro3[0]]!="" && row[parametro3[0]]!=null) {

						return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

					}else{

						return "Aún no presenta los documentos";

					}


				}else{
					return row[parametro3[3]];
				}

			})

		});

	}

	
	if (parametro1[4]!="" && parametro1[4]!=" ") {

		objeto.push({ 

			"aTargets":[parametro1[4]], 
			"mData": null,
			"mRender": (function (data, type, row) {

				if (parametro2[4]=="enlace") {

					if (row[parametro5[4]].indexOf('.pdf') > -1){
						return "<center><a href='"+parametro4[4]+row[parametro5[4]]+"' target='_blank'>"+row[parametro3[4]]+"</a></center>";
					}else{
						return "<center><a href='"+parametro4[4]+row[parametro5[4]]+".pdf' target='_blank'>"+row[parametro3[4]]+"</a></center>";
					}

				}else if(parametro2[4]=="boton"){

					return parametro3[4];

				}else if(parametro2[4]=="texto__separadores"){


					if (row[parametro3[4]]!="" && row[parametro3[4]]!=null && row[parametro3[4]]!=undefined) {

						let arr = row[parametro3[4]].split(';;;;');

					if (arr.length>0) {

							if (arr[0]!=undefined && arr[0]!="undefined") {

								var primero="<div>"+arr[0]+"</div>";

							}else{
								primero="<div></div>";
							}



							if (arr[1]!=undefined && arr[1]!="undefined") {

								var segundo="<div>"+arr[1]+"</div>";

							}else{
								segundo="<div></div>";
							}



							if (arr[2]!=undefined && arr[2]!="undefined") {

								var tercero="<div>"+arr[2]+"</div>";

							}else{
								tercero="<div></div>";
							}



							if (arr[3]!=undefined && arr[3]!="undefined") {

								var cuarto="<div>"+arr[3]+"</div>";

							}else{
								cuarto="<div></div>";
							}



							if (arr[4]!=undefined && arr[4]!="undefined") {

								var quinto="<div>"+arr[4]+"</div>";

							}else{
								quinto="<div></div>";
							}



							if (arr[5]!=undefined && arr[5]!="undefined") {

								var sexto="<div>"+arr[5]+"</div>";

							}else{
								sexto="<div></div>";
							}



							return primero+"<br>"+segundo+"<br>"+tercero+"<br>"+cuarto+"<br>"+quinto+"<br>"+sexto;

						}else{

							return "No asignado";

						}			
					}else{

						return "No asignado";


					}

				}else if(parametro2[0]=="boton__2"){

					if(row[parametro4[0]]=="Notificado por no presentación de requisitos"){

						return "Notificado por no presentación de requisitos";

					}else if (row[parametro3[0]]!="" && row[parametro3[0]]!=null) {

						return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

					}else{

						return "Aún no presenta los documentos";

					}


				}else{
					return row[parametro3[4]];
				}

			})

		});

	}

	if (parametro1[5]!="" && parametro1[5]!=" ") {

		objeto.push({ 

			"aTargets":[parametro1[5]], 
			"mData": null,
			"mRender": (function (data, type, row) {

				if (parametro2[5]=="enlace") {

					if (row[parametro5[5]].indexOf('.pdf') > -1){
						return "<center><a href='"+parametro4[5]+row[parametro5[5]]+"' target='_blank'>"+row[parametro3[5]]+"</a></center>";
					}else{
						return "<center><a href='"+parametro4[5]+row[parametro5[5]]+".pdf' target='_blank'>"+row[parametro3[5]]+"</a></center>";
					}

				}else if(parametro2[5]=="boton"){

					return parametro3[5];

				}else if(parametro2[5]=="texto__separadores"){


					if (row[parametro3[5]]!="" && row[parametro3[5]]!=null && row[parametro3[5]]!=undefined) {

						let arr = row[parametro3[5]].split(';;;;');

					if (arr.length>0) {

							if (arr[0]!=undefined && arr[0]!="undefined") {

								var primero="<div>"+arr[0]+"</div>";

							}else{
								primero="<div></div>";
							}



							if (arr[1]!=undefined && arr[1]!="undefined") {

								var segundo="<div>"+arr[1]+"</div>";

							}else{
								segundo="<div></div>";
							}



							if (arr[2]!=undefined && arr[2]!="undefined") {

								var tercero="<div>"+arr[2]+"</div>";

							}else{
								tercero="<div></div>";
							}



							if (arr[3]!=undefined && arr[3]!="undefined") {

								var cuarto="<div>"+arr[3]+"</div>";

							}else{
								cuarto="<div></div>";
							}



							if (arr[4]!=undefined && arr[4]!="undefined") {

								var quinto="<div>"+arr[4]+"</div>";

							}else{
								quinto="<div></div>";
							}



							if (arr[5]!=undefined && arr[5]!="undefined") {

								var sexto="<div>"+arr[5]+"</div>";

							}else{
								sexto="<div></div>";
							}



							return primero+"<br>"+segundo+"<br>"+tercero+"<br>"+cuarto+"<br>"+quinto+"<br>"+sexto;

						}else{

							return "No asignado";

						}							

					}else{

						return "No asignado";


					}

				}else if(parametro2[0]=="boton__2"){

					if(row[parametro4[0]]=="Notificado por no presentación de requisitos"){

						return "Notificado por no presentación de requisitos";

					}else if (row[parametro3[0]]!="" && row[parametro3[0]]!=null) {

						return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

					}else{

						return "Aún no presenta los documentos";

					}


				}else{
					return row[parametro3[5]];
				}

			})

		});

	}


	/*=====  End of Creación de elementos  ======*/

	return objeto;

}


var datatablets=function(parametro1,parametro2,parametro3,parametro4,parametro5,parametro6,parametro7,parametro8,parametro9,parametro10,parametro11){

   var table =$(parametro1).DataTable({

   		"language":{

	        "sProcessing":     "Procesando...",
	        "sLengthMenu":     "Mostrar _MENU_ registros",
	        "sZeroRecords":    "No se encontraron resultados",
	        "sEmptyTable":     "Ningún dato disponible en esta tabla",
	        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
	        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
	        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
	        "sInfoPostFix":    "",
	        "sSearch":         "Buscar:",
	        "sUrl":            "",
	        "sInfoThousands":  ",",
	        "sLoadingRecords": "No existen datos",
	        "oPaginate":{
	          "sFirst":    "Primero",
	          "sLast":     "Último",
	          "sNext":     "Siguiente",
	          "sPrevious": "Anterior"
	        },
	        "oAria": {
	          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
	          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
	        }
      	},

       dom: 'Bfrtip',
        buttons: [
             'excel'
        ],

	    "bLengthChange": false,
	    "pagingType": "full_numbers",
	    "Paginate": true,
	    "pagingType": "full_numbers",
	     "retrieve": true, 
	     "paging": false, 
	     // "scrollX": true,

      	"ajax":{

	      	"method":"POST",
	      	"url":"modelosBd/datatablets/datatablets.md.php", 
	      	"data": { 
	          "identificador": parametro2,
	          "datos": parametro3
	       	}  

      	}, 

		"aoColumnDefs":parametro4,


 	});

   for (var i =0; i<parametro6.length;i++) {


	   if (parametro6[i]=="funcion__editar") {

	   		if (parametro9[i]=="edita") {
		   		funcion__datatabletsEditar("#"+parametro2+" tbody",table,parametro7[i],parametro8[i],parametro9[i],parametro10,parametro11);
		   	}

	   }

	   if (parametro6[i]=="funcion__verItems") {

	   		funcion__verItemsObtener("#"+parametro2+" tbody",table,parametro7);

	   }

	   if (parametro6[i]=="funcionObtener") {

	   		funcion__datatabletsObtener("#"+parametro2+" tbody",table,parametro7,parametro8,parametro5,parametro9,parametro2);

	   }

	   if (parametro6[i]=="funcion__datatabletsEliminar") {

		   	if (parametro9[i]=="elimina") {
		   		funcion__datatabletsEliminar("#"+parametro2+" tbody",table,parametro7[i],parametro8[i],parametro9[i]);
		   	}

	   }

	   if (parametro6[i]=="funcionObtenerOrganismos") {

		 funcion__datatabletsAsignarInfor("#"+parametro2+" tbody",table,parametro7,parametro8,parametro9);

	   }


	   if (parametro6[i]=="funcionObtenerOrganismosM") {

		 funcion__datatabletsAsignarInforDos("#"+parametro2+" tbody",table,parametro7,parametro8,parametro9);

	   }



	   if (parametro6[i]=="funcionEditarOrgaM") {

		 funcion__datatabletsAsignarEditarDos("#"+parametro2+" tbody",table,parametro7,parametro8,parametro9);

	   }



	   if (parametro6[i]=="funcionEditarOrga") {

		 funcion__datatabletsAsignarEditar("#"+parametro2+" tbody",table,parametro7,parametro8,parametro9);

	   }

	   if (parametro6[i]=="funcionReasingarTraGe") {

		 funcion__datatabletsReasignarTraGene("#"+parametro2+" tbody",table,parametro7,parametro8,parametro9);

	   }


	   if (parametro6[i]=="funcionReasingarTraGe__modificaciones") {

		 funcion__datatabletsReasignarTraGene__modificaciones("#"+parametro2+" tbody",table,parametro7,parametro8,parametro9);

	   }


	   if (parametro6[i]=="funcionReasingarTra") {

		 funcion__datatabletsReasignarTra("#"+parametro2+" tbody",table,parametro7,parametro8,parametro9);

	   }



	   if (parametro6[i]=="funcionReasingarTra__finan") {

		 funcion__datatabletsReasignarTra__finan("#"+parametro2+" tbody",table,parametro7,parametro8,parametro9);

	   }

	   if (parametro6[i]=="funcionReasingarTra__finan__rechazar") {

		 funcion__datatabletsReasignarTra__finan__rechazas("#"+parametro2+" tbody",table,parametro7,parametro8,parametro9);

	   }


	   if (parametro6[i]=="funcionReasingarTraCoordinas") {

		 funcion__datatabletsReasignarTraCoordinas("#"+parametro2+" tbody",table,parametro7,parametro8,parametro9);

	   }


	   if (parametro6[i]=="funcionReasingarTraCoordinasFinan") {

		 funcion__datatabletsReasignarTraFinan("#"+parametro2+" tbody",table,parametro7,parametro8,parametro9);

	   }


	   if (parametro6[i]=="funcionReasingarTraRe") {

		 funcion__datatabletsReasignarTraRe("#"+parametro2+" tbody",table,parametro7,parametro8,parametro9);

	   }

	   if (parametro6[i]=="funcionReasingarTraRe_talento") {

		 funcion__datatabletsReasignarTraRe__talento("#"+parametro2+" tbody",table,parametro7,parametro8,parametro9);

	   }


	   if (parametro6[i]=="funcionReasingarTraReInfran") {

		 funcion__datatabletsReasignarTraRe__infras("#"+parametro2+" tbody",table,parametro7,parametro8,parametro9);

	   }


	   if (parametro6[i]=="funcionReasingarTraCoordinas__subsess") {

		 funcionReasingarTraCoordinas__subsess("#"+parametro2+" tbody",table,parametro7,parametro8,parametro9);

	   }

	   if (parametro6[i]=="funcionReasingarTraCoordinas__financs") {

		 funcionReasingarTraCoordinas__financs("#"+parametro2+" tbody",table,parametro7,parametro8,parametro9);

	   }

	   if (parametro6[i]=="funcionReasingarTraCoordinas__instalaciones") {

		 funcionReasingarTraCoordinas__instalaciones("#"+parametro2+" tbody",table,parametro7,parametro8,parametro9);

	   }


	   if (parametro6[i]=="funcionReasingarTraReAdminis") {

		 funcion__ReasingarTraReAdminis("#"+parametro2+" tbody",table,parametro7,parametro8,parametro9);

	   }
	   
	   if (parametro6[i]=="funcionReasingarTraReInstala") {

		 funcion__ReasingarTraReInstala("#"+parametro2+" tbody",table,parametro7,parametro8,parametro9);

	   }
	   
	   if (parametro6[i]=="funcionCoordinasOb") {

		 funcion__enCordi("#"+parametro2+" tbody",table,parametro7,parametro8,parametro9);

	   }

	   if (parametro6[i]=="funcionCoordinasObservacion") {

		 funcion__enCordiObservi("#"+parametro2+" tbody",table,parametro7,parametro8,parametro9);

	   }


	   if (parametro6[i]=="funcion__eliminar") {

		 funcion__eliminarI("#"+parametro2+" tbody",table,parametro7,parametro8,parametro9);

	   }

	   if (parametro6[i]=="funcion__eliminar__esigef") {

		 funcion__eliminar__esigef("#"+parametro2+" tbody",table,parametro7,parametro8,parametro9);

	   }



	   if (parametro6[i]=="funcionEditar__gestionados") {

		funcion__gestionados__i("#"+parametro2+" tbody",table,parametro7,parametro8,parametro9);

	   }	   

	   if (parametro6[i]=="funcionEditar__gestionados_s") {

		funcionEditar__gestionados_s("#"+parametro2+" tbody",table,parametro7,parametro8,parametro9);

	   }	   


	   if (parametro6[i]=="funcionReasingar__aprobados__dos") {

		funcionReasingar__aprobados__dos("#"+parametro2+" tbody",table,parametro7,parametro8,parametro9);

	   }

	   if (parametro6[i]=="funcion___termina__financiero") {

		funcion___termina__financiero("#"+parametro2+" tbody",table,parametro7,parametro8,parametro9);

	   }

	   if (parametro6[i]=="funcion__reasignar__seguimientos__unidos") {

		funcion__reasignar__seguimientos__unidos("#"+parametro2+" tbody",table,parametro7,parametro8,parametro9);

	   }


	   if (parametro6[i]=="funcion__reasignar__seguimientos__unidos__altos") {

		funcion__reasignar__seguimientos__unidos__altos("#"+parametro2+" tbody",table,parametro7,parametro8,parametro9);

	   }


	   if (parametro6[i]=="funcion__reasignar__seguimientos__unidos__actividad__fisica") {

		funcion__reasignar__seguimientos__unidos__actividad__fisica("#"+parametro2+" tbody",table,parametro7,parametro8,parametro9);

	   }


	   if (parametro6[i]=="funcion__reasignar__seguimientos__unidos__altos__recomendados") {

		funcion__reasignar__seguimientos__unidos__altos__recomendados("#"+parametro2+" tbody",table,parametro7,parametro8,parametro9);

	   }


	   if (parametro6[i]=="funcion__reasignar__seguimientos__unidos__altos__recomendados__formaRe") {

		funcion__reasignar__seguimientos__unidos__altos__recomendados__formaRe("#"+parametro2+" tbody",table,parametro7,parametro8,parametro9);

	   }

   }

   if (parametro2=="tablaItemsAc1" || parametro2=="tablaItemsAc2" || parametro2=="tablaItemsAc3" || parametro2=="tablaItemsAc4" || parametro2=="tablaItemsAc5" || parametro2=="tablaItemsAc6" || parametro2=="tablaItemsAc7" || parametro2=="tablaItemsAc8" || parametro2=="tablaItemsAc9" || parametro2=="tablaItemsAc10" || parametro2=="tablaItemsAc11" || parametro2=="tablaItemsAc12" || parametro2=="tablaItemsAc13" || parametro2=="tablaItemsAc14" || parametro2=="tablaItemsAc15" || parametro2=="tablaItemsAc16") {

   		funcion__datatabletsEliminar2("#"+parametro2+" tbody",table);

   		funcion__datatabletsEditas2N("#"+parametro2+" tbody",table);

   }


	/*=========================================
	=            Actualiza modales            =
	=========================================*/
	
	var actualizaDatablets=function(parametro1){

		$(parametro1).click(function(e){

			table.ajax.reload();

		});

	}

	actualizaDatablets($(".refrezcar__tabla"));	
	
	/*=====  End of Actualiza modales  ======*/

}

/*=============================================
=            Recomendar formativos            =
=============================================*/

var funcion__reasignar__seguimientos__unidos__altos__recomendados__formaRe=function(tbody,table){

  $(tbody).on("click","button.reasignarTramites__seguimientosAltos__recomendados",function(e){

  	e.preventDefault();

  	var data=table.row($(this).parents("tr")).data();


  	var paqueteDeDatos = new FormData();

  	paqueteDeDatos.append('tipo','enviar__infor__data__seguimientos__f__r');

  	paqueteDeDatos.append("idOrganismo",data[4]);

  	paqueteDeDatos.append("periodo",data[2]);

  	paqueteDeDatos.append("tipo__2",data[3]);

  	let idUsuarioC=$("#idUsuarioC").val();

  	paqueteDeDatos.append("idUsuarioC",idUsuarioC);

	$.ajax({

		type:"POST",
		url:"modelosBd/inserta/seleccionaAcciones.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

		$.getScript("layout/scripts/js/validacionBasica.js",function(){

			let elementos=JSON.parse(response);

		    let envio__tecnicos=elementos['envio__tecnicos'];
		    let zonal__eu=elementos['zonal__eu'];
		    let documentos__tecnicos=elementos['documentos__tecnicos'];

		    $("#organismoOculto__modal").val(data[4]);

		    if($("#idRolAd").val()==7){

		    	$(".direccion__seguimientos__ocultos").show();

		    	$("#selects__superiores__regresar").remove();
		    	$("#selects__superiores").show();

		    	$("#selects__superiores__regresar__coors").remove();
		    	$("#selects__superiores__subsess").remove();


		    }else if (zonal__eu==1 || zonal__eu=="1") {

		    	$("#selects__superiores__regresar").show();
		    	$("#selects__superiores").show();

		    	$("#selects__superiores__regresar__coors").remove();
		    	$("#selects__superiores__subsess").remove();

		    	$("#selects__superiores__regresar__coors__acFisicas").remove();

		    }else{

		    	$("#selects__superiores__regresar").remove();
		    	$("#selects__superiores__regresar__coors").show();

		    	$("#selects__superiores").remove();
		    	$("#selects__superiores__subsess").show();

		    	$("#selects__superiores__regresar").remove();

		    }

		    for (w of envio__tecnicos) {

		    	$(".funcionario__recomendaste").text(w.nombreCompleto);
		    	$(".fecha__recomendaste").text(w.fecha);

		    }

		    for (z of documentos__tecnicos) {

		    	if (data[3]=="FORMATIVO") {
		    		$("#informe__recomendados").attr('href',$("#filesFrontend").val()+'seguimiento/informe__formativos/'+z.archivo);
		    	}else{
		    		$("#informe__recomendados").attr('href',$("#filesFrontend").val()+'seguimiento/informe__recreativos/'+z.archivo);
		    	}

		    	

		    	$(".observaciones__recomendaste").text(z.observacion);
		    	$("#nombreDocumento").val(z.archivo);
		    	$(".recomendaciones__recomendaste").text(z.recomendacion);

		    }

		    if ($("#idRolAd").val()==7) {

		    	$(".oculto__subsess__deseados").attr('style','visibility: hidden!important;');

		    }

		    $("#periodo").val(data[2]);

		});	

		},
		error:function(){

		}
				
	});	  	

  });

}

/*=====  End of Recomendar formativos  ======*/


/*=============================
=            Función recomendar altos            =
=============================*/

var funcion__reasignar__seguimientos__unidos__altos__recomendados=function(tbody,table){

  $(tbody).on("click","button.reasignarTramites__seguimientosAltos__recomendados",function(e){

  	e.preventDefault();

  	var data=table.row($(this).parents("tr")).data();


  	var paqueteDeDatos = new FormData();

  	paqueteDeDatos.append('tipo','enviar__infor__data__seguimientos');

  	paqueteDeDatos.append("idOrganismo",data[3]);

  	paqueteDeDatos.append("periodo",data[2]);

  	let idUsuarioC=$("#idUsuarioC").val();

  	paqueteDeDatos.append("idUsuarioC",idUsuarioC);

	$.ajax({

		type:"POST",
		url:"modelosBd/inserta/seleccionaAcciones.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

		$.getScript("layout/scripts/js/validacionBasica.js",function(){

			let elementos=JSON.parse(response);

		    let envio__tecnicos=elementos['envio__tecnicos'];
		    let zonal__eu=elementos['zonal__eu'];
		    let documentos__tecnicos=elementos['documentos__tecnicos'];

		    $("#organismoOculto__modal").val(data[3]);

		    if($("#idRolAd").val()==7){

		    	$(".direccion__seguimientos__ocultos").show();

		    	$("#selects__superiores__regresar").remove();
		    	$("#selects__superiores").show();

		    	$("#selects__superiores__regresar__coors").remove();
		    	$("#selects__superiores__subsess").remove();


		    }else if (zonal__eu==1 || zonal__eu=="1") {

		    	$("#selects__superiores__regresar").show();
		    	$("#selects__superiores").show();

		    	$("#selects__superiores__regresar__coors").remove();
		    	$("#selects__superiores__subsess").remove();

		    }else{

		    	$("#selects__superiores__regresar").remove();
		    	$("#selects__superiores__regresar__coors").show();

		    	$("#selects__superiores").remove();
		    	$("#selects__superiores__subsess").show();

		    }

		    for (w of envio__tecnicos) {

		    	$(".funcionario__recomendaste").text(w.nombreCompleto);
		    	$(".fecha__recomendaste").text(w.fecha);

		    }

		    for (z of documentos__tecnicos) {

		    	$("#informe__recomendados").attr('href','seguimiento/informes__altos/'+z.archivo);

		    	$(".observaciones__recomendaste").text(z.observacion);
		    	$("#nombreDocumento").val(z.archivo);
		    	$(".recomendaciones__recomendaste").text(z.recomendacion);

		    }

		    if ($("#idRolAd").val()==7) {

		    	$(".oculto__subsess__deseados").attr('style','visibility: hidden!important;');

		    }

		    $("#periodo").val(data[2]);

		});	

		},
		error:function(){

		}
				
	});	  	

  });

}


/*=====  End of Función recomendar altos  ======*/


/*==============================================================
=            Funcion seguimientos actividad fisicas            =
==============================================================*/


var funcion__reasignar__seguimientos__unidos__actividad__fisica=function(tbody,table){

  $(tbody).on("click","button.reasignarTramites__seguimientosActividad",function(e){

  	e.preventDefault();

  	var data=table.row($(this).parents("tr")).data();


  	var paqueteDeDatos = new FormData();

  	paqueteDeDatos.append('tipo','enviar__infor__data__seguimientos');

  	paqueteDeDatos.append("idOrganismo",data[16]);

  	paqueteDeDatos.append("periodo",data[5]);

  	console.log(data);

	$.ajax({

		type:"POST",
		url:"modelosBd/inserta/seleccionaAcciones.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

		$.getScript("layout/scripts/js/validacionBasica.js",function(){

			var elementos=JSON.parse(response);

		    var poa__invers=elementos['poa__invers'];

		    var indicadores__altos=elementos['indicadores__altos'];

		    var autogestionesV=elementos['autogestionesV'];


		    $(".presupuesto__autogestion__asignado__pais__altos").text(autogestionesV);
		    $("#presupuesto__autogestion__asignado__pais__altos").val(autogestionesV);

			/*==================================================
			=            Registrar datos necesarios            =
			==================================================*/
			

			$(".titulo__alto__rendimientos").append("<div class='col col-12 text-center'>SUBSECRETARIA DE DESARROLLO DE LA ACTIVIDAD FISICA</div><input type='hidden' id='subsecretarias__escritas' name='subsecretarias__escritas' value='SUBSECRETARIA DE DESARROLLO DE LA ACTIVIDAD FISICA'/>");



			if (data[18]=="FORMATIVO") {

				$(".titulo__alto__rendimientos").append("<div class='col col-12 text-center mt-2'>DIRECCION DE DEPORTE FORMATIVO Y EDUCACION FISICA</div><input type='hidden' id='direccion__escritas' name='direccion__escritas' value='DIRECCION DE DEPORTE FORMATIVO Y EDUCACION FISICA'/>");

				$(".tabla__formativo__1").show();
				$(".tabla__recreativo__1").remove();


				$(".foramtivo__enlaces__medalleros").show();
				$(".recreativo__enlaces__medalleros").remove();

				$("#tipoAct").val("Formativo");

				$("#rotulo__recomendado").val("formativo");

			}else{

				$(".titulo__alto__rendimientos").append("<div class='col col-12 text-center mt-2'>DIRECCION DE RECREACION</div><input type='hidden' id='direccion__escritas' name='direccion__escritas' value='DIRECCION DE RECREACION'/>");

				$(".tabla__formativo__1").remove();
				$(".tabla__recreativo__1").show();

				$(".foramtivo__enlaces__medalleros").remove();
				$(".recreativo__enlaces__medalleros").show();

				$(".ocultos__paid__documentos").remove();

				$("#tipoAct").val("Recreativo");

				$("#rotulo__recomendado").val("recreativo");

			}


			/*====================================
			=            Sacar siglas            =
			====================================*/
			
		  	let palabras = data[1];
		    let array = palabras.split(" ");
		    let total = array.length;
		    let resultado = "";
			 
			for (var i = 0; i < total; i++){

				if (array[i].length>2) {

					resultado += array[i][0];

				}

			}
			
			$(".siglas__dinamicas").text(resultado);	

			$("#siglas__dinamicas__inputs").val(resultado);	
			
			/*=====  End of Sacar siglas  ======*/

			
			if (parseInt(data[8], 10)<10) {

				$(".numerico__dinamicas").text("0"+data[8]);

				$("#numerico__dinamicas__inputs").val("0"+data[8]);

			}else{

				$(".numerico__dinamicas").text(data[8]);

				$("#numerico__dinamicas__inputs").val(data[8]);

			}


			/*=====  End of Registrar datos necesarios  ======*/


			/*=====================================================
			=            Asignar datos del datatablets            =
			=====================================================*/

			$("#organismoOculto__modal").val(data[16]);

			$("#idOrganismo").val(data[16]);

			$(".periodo__evaluados__anuales").text(data[21]);

			$("#periodo__evaluados__anuales").val(data[21]);

			if (data[5]=="primerTrimestre") {

				$(".trimestre__evaluados__al").text("I TRIMESTRE");
				$("#trimestre__evaluados__al").val("I TRIMESTRE");

			}else if (data[5]=="segundoTrimestre") {


				$(".trimestre__evaluados__al").text("II TRIMESTRE");
				$("#trimestre__evaluados__al").val("II TRIMESTRE");

			}else if (data[5]=="tercerTrimestre") {

				$(".trimestre__evaluados__al").text("III TRIMESTRE");
				$("#trimestre__evaluados__al").val("III TRIMESTRE");

			}else if (data[5]=="cuartoTrimestre") {

				$(".trimestre__evaluados__al").text("IV TRIMESTRE");
				$("#trimestre__evaluados__al").val("IV TRIMESTRE");
			}

			$(".periodo__evaluados__anuales").text(data[21]);

			$("#periodo__evaluados__anuales").val(data[21]);

			$("#organismoOculto__modal").val(data[16]);

			$("#idOrganismo").val(data[16]);

			$("#periodo").val(data[5]);

			$(".nombre__organizacion__deportivas").text(data[1]);

			$("#nombre__organizacion__deportivas").val(data[1]);

			$(".ruc__organizacion__deportivas").text(data[0]);

			$("#ruc__organizacion__deportivas").val(data[0]);

			$(".presidente__organizacion__deportivas").text(data[10]);

			$("#presidente__organizacion__deportivas").val(data[10]);

			$(".correo__organizacion__deportivas").text(data[11]);

			$("#correo__organizacion__deportivas").val(data[11]);

			$(".direccion__organizacion__deportivas").text(data[12]);

			$("#direccion__organizacion__deportivas").val(data[12]);

			$(".provincia__organizacion__deportivas").text(data[2]);

			$("#provincia__organizacion__deportivas").val(data[2]);

			$(".canton__organizacion__deportivas").text(data[3]);

			$("#canton__organizacion__deportivas").val(data[3]);

			$(".parroquia__organizacion__deportivas").text(data[4]);

			$("#parroquia__organizacion__deportivas").val(data[4]);

			$(".barrio__organizacion__deportivas").text(data[13]);

			$("#barrio__organizacion__deportivas").val(data[13]);

			$(".presupuesto__asignado__pais__altos").text(poa__invers);

			$("#presupuesto__asignado__pais__altos").val(poa__invers);

			$("#idUSeguimientos").val($("#idUsuarioC").val());


			if ($("#idRolAd").val()=="7" || $("#idRolAd").val()==7) {

				$(".fila__reasignar").show();
				$(".fila__regresar__a").hide();

			}else if($("#idRolAd").val()=="2" || $("#idRolAd").val()==2 || $("#idRolAd").val()=="4" || $("#idRolAd").val()==4){

				$(".fila__reasignar").show();
				$(".fila__regresar__a").show();

				$(".reasignar__solo").removeClass('col');

				$(".reasignar__solo").removeClass('col-2');

				$(".reasignar__solo").addClass('col');

				$(".reasignar__solo").addClass('col-6');

			}else{

				$(".fila__reasignar").hide();
				$(".fila__regresar__a").show();

			}

			if ($("#idRolAd").val()=="3" || $("#idRolAd").val()==3) {

				$(".ocultos__en__altos").show();

			}else{

				$(".ocultos__en__altos").remove();

			}

			/*=====  End of Asignar datos del datatablets  ======*/

			/*=========================================================
			=            Construción tablas de indicadores            =
			=========================================================*/

			let porcentajesCumplimientos=0;

			let div="";

			let sumaProgramado=0;
			let sumaAlcanzado=0;

			let porcentajeFinalAl=0;

			for (w of indicadores__altos) {

				sumaProgramado=parseFloat(sumaProgramado) + parseFloat(w.totalProgramado);
				sumaAlcanzado=parseFloat(sumaAlcanzado) + parseFloat(w.totalEjecutado);

				porcentajesCumplimientos=(parseFloat(w.totalEjecutado) / parseFloat(w.totalProgramado))*100;

				if (parseFloat(porcentajesCumplimientos).toFixed(2)>=85) {

					 div="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

				}else if (parseFloat(porcentajesCumplimientos).toFixed(2)>=70 && parseFloat(porcentajesCumplimientos).toFixed(2)<85) {

					 div="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";

				}else if (parseFloat(porcentajesCumplimientos).toFixed(2)<70) {

					 div="<div style='border-radius: 50%!important; margin-right:1em;  background:red; height:15px!important; width:15px!important;'></div>";

				}



				$(".cuerpo__items__alto__rendimientos").append('<tr><td>'+w.nombreActividades+'</td><td>'+w.nombreIndicador+'</td><td>'+w.totalProgramado+'</td><td>'+w.totalEjecutado+'</td><td><center><div style="display:flex!important;">'+div+" "+porcentajesCumplimientos+'%</div></center></td></tr>');

			}

			porcentajeFinalAl=(parseFloat(sumaAlcanzado)/parseFloat(sumaProgramado))*100;

			$(".footer__altos__indicadores").append('<tr><th colspan="2"><center>Total</center></th><th><center>'+parseFloat(sumaProgramado).toFixed(2)+'</center></th><th><center>'+parseFloat(sumaAlcanzado).toFixed(2)+'</center></th><th><center>'+parseFloat(porcentajeFinalAl).toFixed(2)+'</center></th></tr>');
			
			/*=====  End of Construción tablas de indicadores  ======*/
			

			if($("#idRolAd").val()=="7" || $("#idRolAd").val()==7){

				$(".superior__sin").remove();
				$(".superior__con").show();

			}else{

				$(".superior__sin").show();
				$(".superior__con").remove();

			}

			if($("#idRolAd").val()=="4" || $("#idRolAd").val()==4){

				$(".regresar__superior__prin").remove();
				$(".regresar__superior__con").show();

			}else{

				$(".regresar__superior__prin").show();
				$(".regresar__superior__con").remove();

			}

		});	

		},
		error:function(){

		}
				
	});	  	

  });

}


/*=====  End of Funcion seguimientos actividad fisicas  ======*/


/*====================================================
=            Funcion de seguimiento altos            =
====================================================*/

var funcion__reasignar__seguimientos__unidos__altos=function(tbody,table){

  $(tbody).on("click","button.reasignarTramites__seguimientosAltos",function(e){

  	e.preventDefault();

  	var data=table.row($(this).parents("tr")).data();


  	var paqueteDeDatos = new FormData();

  	paqueteDeDatos.append('tipo','enviar__infor__data__seguimientos');

  	paqueteDeDatos.append("idOrganismo",data[16]);

  	paqueteDeDatos.append("periodo",data[5]);


	$.ajax({

		type:"POST",
		url:"modelosBd/inserta/seleccionaAcciones.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

		$.getScript("layout/scripts/js/validacionBasica.js",function(){

			var elementos=JSON.parse(response);

		    var poa__invers=elementos['poa__invers'];

		    var indicadores__altos=elementos['indicadores__altos'];

			/*==================================================
			=            Registrar datos necesarios            =
			==================================================*/
			
			$(".titulo__alto__rendimientos").append("<div class='col col-12 text-center'>SUBSECRETARÍA DE ALTO RENDIMIENTO</div><input type='hidden' id='subsecretarias__escritas' name='subsecretarias__escritas' value='SUBSECRETARÍA DE ALTO RENDIMIENTO'/>");


			if ($("#fisicamenteE").val()=="12" || $("#fisicamenteE").val()=="24") {

				$(".titulo__alto__rendimientos").append("<div class='col col-12 text-center mt-2'>DIRECCIÓN DE DE ALTO RENDIMIENTO</div><input type='hidden' id='direccion__escritas' name='direccion__escritas' value='DIRECCIÓN DE DE ALTO RENDIMIENTO'/>");

			}else{

				$(".titulo__alto__rendimientos").append("<div class='col col-12 text-center mt-2'>DIRECCION DE DEPORTE PARA PERSONAS CON DISCAPACIDAD</div><input type='hidden' id='direccion__escritas' name='direccion__escritas' value='DIRECCION DE DEPORTE PARA PERSONAS CON DISCAPACIDAD'/>");

			}

			/*====================================
			=            Sacar siglas            =
			====================================*/
			
		  	let palabras = data[1];
		    let array = palabras.split(" ");
		    let total = array.length;
		    let resultado = "";
			 
			for (var i = 0; i < total; i++){

				if (array[i].length>2) {

					resultado += array[i][0];

				}

			}
			
			$(".siglas__dinamicas").text(resultado);	

			$("#siglas__dinamicas__inputs").val(resultado);	
			
			/*=====  End of Sacar siglas  ======*/

			
			if (parseInt(data[8], 10)<10) {

				$(".numerico__dinamicas").text("0"+data[8]);

				$("#numerico__dinamicas__inputs").val("0"+data[8]);

			}else{

				$(".numerico__dinamicas").text(data[8]);

				$("#numerico__dinamicas__inputs").val(data[8]);

			}


			/*=====  End of Registrar datos necesarios  ======*/


			/*=====================================================
			=            Asignar datos del datatablets            =
			=====================================================*/

			$("#organismoOculto__modal").val(data[16]);

			$("#idOrganismo").val(data[16]);

			$(".periodo__evaluados__anuales").text(data[9]);

			$("#periodo__evaluados__anuales").val(data[9]);

			if (data[5]=="primerTrimestre") {

				$(".trimestre__evaluados__al").text("I TRIMESTRE");
				$("#trimestre__evaluados__al").val("I TRIMESTRE");

			}else if (data[5]=="segundoTrimestre") {


				$(".trimestre__evaluados__al").text("II TRIMESTRE");
				$("#trimestre__evaluados__al").val("II TRIMESTRE");

			}else if (data[5]=="tercerTrimestre") {

				$(".trimestre__evaluados__al").text("III TRIMESTRE");
				$("#trimestre__evaluados__al").val("III TRIMESTRE");

			}else if (data[5]=="cuartoTrimestre") {

				$(".trimestre__evaluados__al").text("IV TRIMESTRE");
				$("#trimestre__evaluados__al").val("IV TRIMESTRE");
			}

			$(".periodo__evaluados__anuales").text(data[9]);

			$("#periodo__evaluados__anuales").val(data[9]);

			$("#organismoOculto__modal").val(data[16]);

			$("#idOrganismo").val(data[16]);

			$("#periodo").val(data[5]);

			$(".nombre__organizacion__deportivas").text(data[1]);

			$("#nombre__organizacion__deportivas").val(data[1]);

			$(".ruc__organizacion__deportivas").text(data[0]);

			$("#ruc__organizacion__deportivas").val(data[0]);

			$(".presidente__organizacion__deportivas").text(data[10]);

			$("#presidente__organizacion__deportivas").val(data[10]);

			$(".correo__organizacion__deportivas").text(data[11]);

			$("#correo__organizacion__deportivas").val(data[11]);

			$(".direccion__organizacion__deportivas").text(data[12]);

			$("#direccion__organizacion__deportivas").val(data[12]);

			$(".provincia__organizacion__deportivas").text(data[2]);

			$("#provincia__organizacion__deportivas").val(data[2]);

			$(".canton__organizacion__deportivas").text(data[3]);

			$("#canton__organizacion__deportivas").val(data[3]);

			$(".parroquia__organizacion__deportivas").text(data[4]);

			$("#parroquia__organizacion__deportivas").val(data[4]);

			$(".barrio__organizacion__deportivas").text(data[13]);

			$("#barrio__organizacion__deportivas").val(data[13]);

			$(".presupuesto__asignado__pais__altos").text(poa__invers);

			$("#presupuesto__asignado__pais__altos").val(poa__invers);

			$("#idUSeguimientos").val($("#idUsuarioC").val());

			if ($("#idRolAd").val()=="7" || $("#idRolAd").val()==7) {

				$(".fila__reasignar").show();
				$(".fila__regresar__a").hide();

			}else if($("#idRolAd").val()=="2" || $("#idRolAd").val()==2 || $("#idRolAd").val()=="4" || $("#idRolAd").val()==4){

				$(".fila__reasignar").show();
				$(".fila__regresar__a").show();

				$(".reasignar__solo").removeClass('col');

				$(".reasignar__solo").removeClass('col-2');

				$(".reasignar__solo").addClass('col');

				$(".reasignar__solo").addClass('col-6');

			}else{

				$(".fila__reasignar").hide();
				$(".fila__regresar__a").show();

			}

			if ($("#idRolAd").val()=="3" || $("#idRolAd").val()==3) {

				$(".ocultos__en__altos").show();

			}else{

				$(".ocultos__en__altos").remove();

			}

			/*=====  End of Asignar datos del datatablets  ======*/

			/*=========================================================
			=            Construción tablas de indicadores            =
			=========================================================*/

			let porcentajesCumplimientos=0;

			let div="";

			let sumaProgramado=0;
			let sumaAlcanzado=0;

			let porcentajeFinalAl=0;

			for (w of indicadores__altos) {

				sumaProgramado=parseFloat(sumaProgramado) + parseFloat(w.totalProgramado);
				sumaAlcanzado=parseFloat(sumaAlcanzado) + parseFloat(w.totalEjecutado);

				porcentajesCumplimientos=(parseFloat(w.totalEjecutado) / parseFloat(w.totalProgramado))*100;

				if (parseFloat(porcentajesCumplimientos).toFixed(2)>=85) {

					 div="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

				}else if (parseFloat(porcentajesCumplimientos).toFixed(2)>=70 && parseFloat(porcentajesCumplimientos).toFixed(2)<85) {

					 div="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";

				}else if (parseFloat(porcentajesCumplimientos).toFixed(2)<70) {

					 div="<div style='border-radius: 50%!important; margin-right:1em;  background:red; height:15px!important; width:15px!important;'></div>";

				}



				$(".cuerpo__items__alto__rendimientos").append('<tr><td>'+w.nombreActividades+'</td><td>'+w.nombreIndicador+'</td><td>'+w.totalProgramado+'</td><td>'+w.totalEjecutado+'</td><td><center><div style="display:flex!important;">'+div+" "+porcentajesCumplimientos+'%</div></center></td></tr>');

			}

			porcentajeFinalAl=(parseFloat(sumaAlcanzado)/parseFloat(sumaProgramado))*100;

			$(".footer__altos__indicadores").append('<tr><th colspan="2"><center>Total</center></th><th><center>'+parseFloat(sumaProgramado).toFixed(2)+'</center></th><th><center>'+parseFloat(sumaAlcanzado).toFixed(2)+'</center></th><th><center>'+parseFloat(porcentajeFinalAl).toFixed(2)+'</center></th></tr>');
			
			/*=====  End of Construción tablas de indicadores  ======*/
			

			if($("#idRolAd").val()=="7" || $("#idRolAd").val()==7){

				// $(".superior__sin").remove();
				// $(".superior__con").show();

				
				$(".superior__sin").show();
				$(".superior__con").remove();

			}else{

				$(".superior__sin").show();
				$(".superior__con").remove();

			}

			if($("#idRolAd").val()=="4" || $("#idRolAd").val()==4){

				$(".regresar__superior__prin").remove();
				$(".regresar__superior__con").show();

			}else{

				$(".regresar__superior__prin").show();
				$(".regresar__superior__con").remove();

			}

		});	

		},
		error:function(){

		}
				
	});	  	

  });

}



/*=====  End of Funcion de seguimiento altos  ======*/


/*===============================================
=            Función de seguimientos            =
===============================================*/

var funcion__reasignar__seguimientos__unidos=function(tbody,table){

  $(tbody).on("click","button.reasignarTramites__seguimientos",function(e){

  	e.preventDefault();

  	var data=table.row($(this).parents("tr")).data();


  	var paqueteDeDatos = new FormData();

  	paqueteDeDatos.append('tipo','enviar__infor__data__seguimientos');

  	paqueteDeDatos.append("idOrganismo",data[16]);

  	paqueteDeDatos.append("periodo",data[5]);

  	paqueteDeDatos.append("tipo__dos",data[18]);

	$.ajax({

		type:"POST",
		url:"modelosBd/inserta/seleccionaAcciones.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

			$.getScript("layout/scripts/js/validacionBasica.js",function(){
				
			var elementos=JSON.parse(response);

		    var poa__invers=elementos['poa__invers'];

		    var sumas__programados=elementos['sumas__programados'];

		    var primer__sumas__p=elementos['primer__sumas__p'];
		    var primer__sumas__e=elementos['primer__sumas__e'];
		    var segundo__sumas__p=elementos['segundo__sumas__p'];
		    var segundo__sumas__e=elementos['segundo__sumas__e'];
		    var tercero__sumas__p=elementos['tercero__sumas__p'];
		    var tercero__sumas__e=elementos['tercero__sumas__e'];
		    var cuarto__sumas__p=elementos['cuarto__sumas__p'];
		    var cuarto__sumas__e=elementos['cuarto__sumas__e'];

		    var varaible__culminados=elementos['varaible__culminados'];
		    var documentos__tecnicos__2=elementos['documentos__tecnicos__2'];

		    $("#presupuesto__segun__poas").val(poa__invers);


		    if ($("#idRolAd").val()==2 && $("#fisicamenteE").val()==20) {

		    	$(".fila__reasignar").show();
		    	$(".fila__regresar__a").hide();

		    }else if($("#idRolAd").val()==3 && $("#fisicamenteE").val()==20){

		    	$(".fila__reasignar").hide();
		    	$(".fila__regresar__a").show();

		    }

		    $("#tipos__nomenclaturas").val(data[18]);

			/*====================================
			=            Sacar siglas            =
			====================================*/
			
		  	let palabras = data[1];
		    let array = palabras.split(" ");
		    let total = array.length;
		    let resultado = "";
			 
			for (var i = 0; i < total; i++){

				if (array[i].length>2) {

					resultado += array[i][0];

				}

			}
			
			$(".siglas__dinamicas").text(resultado);	

			$("#siglas__dinamicas__inputs").val(resultado);	
			
			/*=====  End of Sacar siglas  ======*/
			
		/*=========================================
		=            Evaluar los datos            =
		=========================================*/
		
			
		if (parseInt(data[8], 10)<10) {

			$(".numerico__dinamicas").text("0"+data[8]);

			$("#numerico__dinamicas__inputs").val("0"+data[8]);

		}else{

			$(".numerico__dinamicas").text(data[8]);

			$("#numerico__dinamicas__inputs").val(data[8]);

		}

		$(".periodo__evaluados__anuales").text(data[9]);

		$("#periodo__evaluados__anuales").val(data[9]);

		$("#organismoOculto__modal").val(data[16]);

		$("#idOrganismo").val(data[16]);

		$(".nombre__organizacion__deportivas").text(data[1]);

		$("#nombre__organizacion__deportivas").val(data[1]);

		$(".ruc__organizacion__deportivas").text(data[0]);

		$("#ruc__organizacion__deportivas").val(data[0]);

		$(".presidente__organizacion__deportivas").text(data[10]);

		$("#presidente__organizacion__deportivas").val(data[10]);

		$(".correo__organizacion__deportivas").text(data[11]);

		$("#correo__organizacion__deportivas").val(data[11]);

		$(".direccion__organizacion__deportivas").text(data[12]);

		$("#direccion__organizacion__deportivas").val(data[12]);

		$(".provincia__organizacion__deportivas").text(data[2]);

		$("#provincia__organizacion__deportivas").val(data[2]);

		$(".canton__organizacion__deportivas").text(data[3]);

		$("#canton__organizacion__deportivas").val(data[3]);

		$(".parroquia__organizacion__deportivas").text(data[4]);

		$("#parroquia__organizacion__deportivas").val(data[4]);

		$(".barrio__organizacion__deportivas").text(data[13]);

		$("#barrio__organizacion__deportivas").val(data[13]);

		$(".area__de__accion__llamados").text(data[14]);

		$("#area__de__accion__llamados").val(data[14]);

		$(".objetivo__institucional__estrategicos").text(data[15]);

		$("#objetivo__institucional__estrategicos").val(data[15]);

		if (data[5]=="primerTrimestre") {

			$("#periodo__evaluado").val("ENERO - MARZO");

		}else if (data[5]=="segundoTrimestre") {

			$("#periodo__evaluado").val("ABRIL - JUNIO");

		}else if (data[5]=="tercerTrimestre") {

			$("#periodo__evaluado").val("JULIO - SEPTIEMBRE");

		}else if (data[5]=="cuartoTrimestre") {

			$("#periodo__evaluado").val("OCTUBRE - DICIEMBRE");

		}

		if (data[17]=="si") {

			$(".con__sin__e").text("Con e-SIGEF2");

		}else{

			$(".con__sin__e").text("Sin e-SIGEF2");

		}

		$("#periodo").val(data[5]);

		let idUsuariosC=$("#idUsuarioC").val();

		$("#idUSeguimientos").val(idUsuariosC);
		
		/*=====  End of Evaluar los datos  ======*/

		/*======================================
		=            Armando tablas            =
		======================================*/

		let porcentajes=0;
		let porcentajesExigefts=0;

		let planificadoA=0;
		let programadoA=0;
		let ejecuadoA=0;
		let exigeftA=0;

		let programadoAB=0;

		$.getScript("layout/scripts/js/validacionesGenerales.js",function(){

			for (w of sumas__programados) {

				programadoAB=programadoAB+parseFloat(w.programado).toFixed(2);

			}

			let div="";

			let porcentajeA1 = new Array();

			let programado1=0;
			let programado2=0;
			let programado3=0;
			let programado4=0;

			let ejecutado1=0;
			let ejecutado2=0;	
			let ejecutado3=0;
			let ejecutado4=0;

			/*============================================
			=            Calculos programados            =
			============================================*/
		
			programado1=(parseFloat(primer__sumas__p)/parseFloat($("#presupuesto__segun__poas").val())) * 100;
			$("#primer__esperado").val(parseFloat(programado1).toFixed(2)+" %");


			programado2=((parseFloat(primer__sumas__p) + parseFloat(segundo__sumas__p)) / parseFloat($("#presupuesto__segun__poas").val())) * 100;
			$("#segundo__esperado").val(parseFloat(programado2).toFixed(2)+" %");


			programado3=((parseFloat(primer__sumas__p) + parseFloat(segundo__sumas__p) + parseFloat(tercero__sumas__p)) / parseFloat($("#presupuesto__segun__poas").val())) * 100;
			$("#tercero__esperado").val(parseFloat(programado3).toFixed(2)+" %");


			programado4=((parseFloat(primer__sumas__p) + parseFloat(segundo__sumas__p) + parseFloat(tercero__sumas__p) + parseFloat(cuarto__sumas__p)) / parseFloat($("#presupuesto__segun__poas").val())) * 100;
			$("#cuarto__esperado").val(parseFloat(programado4).toFixed(2)+" %");
			
			/*=====  End of Calculos programados  ======*/
			
			/*===========================================
			=            Calculos ejecutados            =
			===========================================*/
			
			ejecutado1=(parseFloat(primer__sumas__e)/parseFloat($("#presupuesto__segun__poas").val())) * 100;
			$("#primer__ejecucion").val(parseFloat(ejecutado1).toFixed(2)+" %");

			/*=====  End of Calculos ejecutados  ======*/
			

			if (data[5]=="segundoTrimestre") {

				ejecutado2=((parseFloat(primer__sumas__e) + parseFloat(segundo__sumas__e)) / parseFloat($("#presupuesto__segun__poas").val())) * 100;
				$("#segundo__ejecucion").val(parseFloat(ejecutado2).toFixed(2)+" %");

				$(".ejecutados__al__segundo").show();

			}else if (data[5]=="tercerTrimestre") {

				ejecutado2=((parseFloat(primer__sumas__e) + parseFloat(segundo__sumas__e)) / parseFloat($("#presupuesto__segun__poas").val())) * 100;
				$("#segundo__ejecucion").val(parseFloat(ejecutado2).toFixed(2)+" %");


				ejecutado3=((parseFloat(primer__sumas__e) + parseFloat(segundo__sumas__e) + parseFloat(tercero__sumas__e)) / parseFloat($("#presupuesto__segun__poas").val())) * 100;
				$("#tercero__ejecucion").val(parseFloat(ejecutado3).toFixed(2)+" %");

				$(".ejecutados__al__segundo").show();
				$(".ejecutados__al__tercero").show();

			}else if (data[5]=="cuartoTrimestre") {

				ejecutado2=((parseFloat(primer__sumas__e) + parseFloat(segundo__sumas__e)) / parseFloat($("#presupuesto__segun__poas").val())) * 100;
				$("#segundo__ejecucion").val(parseFloat(ejecutado2).toFixed(2)+" %");


				ejecutado3=((parseFloat(primer__sumas__e) + parseFloat(segundo__sumas__e) + parseFloat(tercero__sumas__e)) / parseFloat($("#presupuesto__segun__poas").val())) * 100;
				$("#tercero__ejecucion").val(parseFloat(ejecutado3).toFixed(2)+" %");

				ejecutado4=((parseFloat(primer__sumas__e) + parseFloat(segundo__sumas__e) + parseFloat(tercero__sumas__e) + parseFloat(cuarto__sumas__e)) / parseFloat($("#presupuesto__segun__poas").val())) * 100;
				$("#cuarto__ejecucion").val(parseFloat(ejecutado4).toFixed(2)+" %");
					
				$(".ejecutados__al__segundo").show();
				$(".ejecutados__al__tercero").show();
				$(".ejecutados__al__cuarto").show();

			}

			for (z of sumas__programados) {

				planificadoA=parseFloat(planificadoA)+parseFloat(z.planificado);
				programadoA=parseFloat(programadoA)+parseFloat(z.programado);
				ejecuadoA=parseFloat(ejecuadoA)+parseFloat(z.ejecutado);


				porcentajes=(parseFloat(z.ejecutado)/parseFloat(z.programado)) * 100;

				porcentajeA1.push(parseFloat(porcentajes).toFixed(2));

				if (parseFloat(porcentajes).toFixed(2)>=85) {

					 div="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

				}else if (parseFloat(porcentajes).toFixed(2)>=70 && parseFloat(porcentajes).toFixed(2)<85) {

					 div="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";

				}else if (parseFloat(porcentajes).toFixed(2)<70) {

					 div="<div style='border-radius: 50%!important; margin-right:1em;  background:red; height:15px!important; width:15px!important;'></div>";

				}



				if (data[17]=="si") {

					$(".cuerpo__matricez__seguimientos").append('<tr><td><center>'+z.actividades+'</center></td><td><center>'+parseFloat(z.planificado).toFixed(2)+'</center></td><td><center>'+parseFloat(z.programado).toFixed(2)+'</center></td><td><center>'+parseFloat(z.ejecutado).toFixed(2)+'</center></td><td><center><div style="display:flex!important;">'+div+" "+parseFloat(porcentajes).toFixed(2)+'</div></center></td><td><center><input type="text" class="ancho__total__input solo__numero__montos sumadores__exigets__ex" id="input__esigets'+z.idActividad+'" idEjecutados="'+parseFloat(z.ejecutado).toFixed(2)+'" idContador="'+z.idActividad+'" value="0"/></center></td><td><center><div style="display:flex!important;"><span class="circulos__'+z.idActividad+'"></span><input type="text" class="ancho__total__input solo__numero__montos porcs__esigeftes" id="porcentajes__esigefts'+z.idActividad+'" readonly="" style="border:none!important;" value="0"><span>%</span></div></center></td></tr>');

				}else{

					$(".cuerpo__matricez__seguimientos").append('<tr><td><center>'+z.actividades+'</center></td><td><center>'+parseFloat(z.planificado).toFixed(2)+'</center></td><td><center>'+parseFloat(z.programado).toFixed(2)+'</center></td><td><center>'+parseFloat(z.ejecutado).toFixed(2)+'</center></td><td><center><div style="display:flex!important;">'+div+" "+parseFloat(porcentajes).toFixed(2)+'</div></center></td></tr>');

					$(".oculto__sin__esiguefts").hide();


				}
			
				

				funcion__solo__numero__montos($(".solo__numero__montos"));

				

				funcion__cambio__de__numero($("#input__esigets"+z.idActividad));

				$("#input__esigets"+z.idActividad).on('input', function () {


					let esigefA1 = new Array();
					let porcentajeExigefA1 = new Array();

					let sum=0;

					let idContador=$(this).attr('idContador');
					let idEjecutados=$(this).attr('idEjecutados');

					let per=0;
					let per2=0;

					per=(parseFloat($(this).val())/parseFloat(idEjecutados)) * 100;

					$("#porcentajes__esigefts"+idContador).val(parseFloat(per).toFixed(2));


					$(".porcs__esigeftes").each(function(){

					    porcentajeExigefA1.push($(this).val());

					});


					$(".sumadores__exigets__ex").each(function(){

					    sum += parseFloat($(this).val());

					    esigefA1.push($(this).val());

					});

					$("#montosExig").val(parseFloat(sum).toFixed(2));

					per2=(parseFloat(sum)/parseFloat(programadoAB)) * 100;

					$("#procentajeExigefSas").val(parseFloat(per2).toFixed(2));

					$("#arrayEsigefts").val(esigefA1);
					$("#arrayPorcenEsigefts").val(porcentajeExigefA1);

					$(".circulos__"+idContador).html(" ");

					let div="";

					if (parseFloat(per).toFixed(2)>=85) {

						 div="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

					}else if (parseFloat(per).toFixed(2)>=70 && parseFloat(per).toFixed(2)<85) {

						 div="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";

					}else if (parseFloat(per).toFixed(2)<70) {

						 div="<div style='border-radius: 50%!important; margin-right:1em;  background:red; height:15px!important; width:15px!important;'></div>";

					}

					$(".circulos__"+idContador).append(div);


				});

			}

			$("#arrayPorcen").val(porcentajeA1);

			let porcentajesZA=0;

			porcentajesZA=(parseFloat(ejecuadoA)/parseFloat(programadoA)) * 100;

			$("#monto__ejecutado__trimestre").val(parseFloat(programadoA).toFixed(2));

			$("#monto__reportado__tri").val(parseFloat(ejecuadoA).toFixed(2));

			if (data[17]=="si") {

				$(".footer__matricez__seguimientos").append('<tr><th><center>Total</center></th><th><center><input type="text" id="planificadoSas" name="planificadoSas" value="'+parseFloat(planificadoA).toFixed(2)+'" style="border:none!important; color:black!important;" readonly=""/></center></th><th><center><input type="text" id="programadoSas" name="programadoSas" value="'+parseFloat(programadoA).toFixed(2)+'" style="border:none!important; color:black!important;" readonly=""/></center></th><th><center><input type="text" id="ejecutadoSas" name="ejecutadoSas" value="'+parseFloat(ejecuadoA).toFixed(2)+'" style="border:none!important;color:black!important;" readonly=""/></center></th><th><center><input type="text" id="procentajeSas" name="procentajeSas" value="'+parseFloat(porcentajesZA).toFixed(2)+'" style="border:none!important; color:black!important;" readonly=""/></center></th><th class="exigeft__fila__holguras"><center><input type="text" id="montosExig" name="montosExig" style="border:none!important; color:black!important;" value="0"  readonly=""/><center></center></th><th class="exigeft__fila__holguras__porcentajes"><input type="text" id="procentajeExigefSas" name="procentajeExigefSas"  reandoly="" style="border:none!important; color:black!important;" value="0"/><center></th></tr>');

			}else{

				$(".footer__matricez__seguimientos").append('<tr><th><center>Total</center></th><th><center><input type="text" id="planificadoSas" name="planificadoSas" value="'+parseFloat(planificadoA).toFixed(2)+'" style="border:none!important; color:black!important;" readonly=""/></center></th><th><center><input type="text" id="programadoSas" name="programadoSas" value="'+parseFloat(programadoA).toFixed(2)+'" style="border:none!important; color:black!important;" readonly=""/></center></th><th><center><input type="text" id="ejecutadoSas" name="ejecutadoSas" value="'+parseFloat(ejecuadoA).toFixed(2)+'" style="border:none!important;color:black!important;" readonly=""/></center></th><th><center><input type="text" id="procentajeSas" name="procentajeSas" value="'+parseFloat(porcentajesZA).toFixed(2)+'" style="border:none!important; color:black!important;" readonly=""/></center></th></tr>');


			}
			
			/*=====  End of Armando tablas  ======*/
			

			console.log(data);

		});

		});

		},
		error:function(){

		}
				
	});	  	

  });

}


/*=====  End of Función de seguimientos  ======*/


/*==========================================
=            Aprobados tecnicos            =
==========================================*/

var funcionReasingar__aprobados__dos=function(tbody,table,parametro3,parametro4,parametro5){

  $(tbody).on("click","button.reasignarTramites__dos",function(e){

  	e.preventDefault();

  	var data=table.row($(this).parents("tr")).data();

  	$(".titulo__mS").text(data[1]);

  	$("#idOrganismo").val(data[8]);

  	cargarFileSevidor__transferencias($("#gaurdarTransferencias"),$("#quipux__Suscritos"));


  });

}


/*=====  End of Aprobados tecnicos  ======*/


/*====================================================
=             Visualizar poas gestionados            =
====================================================*/

var funcionEditar__gestionados_s=function(tbody,table,parametro3,parametro4,parametro5){

  $(tbody).on("click","button.generarVerG",function(e){

  	e.preventDefault();

  	var data=table.row($(this).parents("tr")).data();
 	var paqueteDeDatos = new FormData();

  	paqueteDeDatos.append('idOrganismo',data[9]);
  	paqueteDeDatos.append('tipo','seleccionasCoordinas');

	$.ajax({

		type:"POST",
		url:"modelosBd/inserta/seleccionaAcciones.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

			$.getScript("layout/scripts/js/validacionBasica.js",function(){

				var elementos=JSON.parse(response);

				var obtenernombre__organismos=elementos['obtenernombre__organismos'];

				var obtenerArchivoCoordinas__infras=elementos['obtenerArchivoCoordinas__infras'];
				var obtenerArchivoCoordinas__administrativos=elementos['obtenerArchivoCoordinas__administrativos'];
				var obtenerArchivoCoordinas__subcess=elementos['obtenerArchivoCoordinas__subcess'];

				var obtenerInformacion=elementos['obtenerInformacion'];
				var indicadorInformacion=elementos['indicadorInformacion'];



				$("#idOrganismoM").val(data[5]);

				for (w of obtenernombre__organismos) {

					$(".titulo__mS").text(w.nombreOrganismo);

				}

				$(".contenedor__bodyCMatriz").append('<div class="col col-6 letras__ver__poa text-center creados__letter" style="font-weight:bold; font-size:15px;">Ver POA</div><div class="col col-6"><button class="ver__Tabla btn btn-primary creados__letter" style="cursor:pointer;"><i class="fas fa-eye icono__boton"></i></button></div>');


				$(".contenedor__bodyCMatriz").append('<button type="button" class="btn btn-success excelProyectos col col-1 elementosCreados__M"><i class="fas fa-file-excel"></i>&nbsp;&nbsp;EXCEL</button><table class="tabla__itemsM elementosCreados__M" style="margin-top:2em;" id="tablaPoaPrincipal"><thead><tr><th align="center">Actividad</th><th align="center">Item</th><th align="center">Enero</th><th align="center">Febrero</th><th align="center">Marzo</th><th align="center">Abril</th><th align="center">Mayo</th><th align="center">Junio</th><th align="center">Julio</th><th align="center">Agosto</th><th align="center">Septiembre</th><th align="center">Octubre</th><th align="center">Noviembre</th><th align="center">Diciembre</th><th align="center">Total</th></tr></thead></table><br><br>');

				$(".elementosCreados__M").hide();			

				for (c of obtenerInformacion) {

					$(".tabla__itemsM").append('<tr><td>'+c.idActividades+"-"+c.nombreActividades+'</td><td>'+c.itemPreesupuestario+"-"+c.nombreItem+'</td><td><center>'+parseFloat(c.enero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.febrero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.marzo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.abril).toFixed(2)+'</center></td><td><center>'+parseFloat(c.mayo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.junio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.julio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.agosto).toFixed(2)+'</center></td><td><center>'+parseFloat(c.septiembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.octubre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.noviembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.diciembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.totalSumaItem).toFixed(2)+'</center></td></tr>');


				}


				execelGenerados($(".excelProyectos"),"tablaPoaPrincipal","poa");

				verOjoContrasenas2($(".ver__Tabla"),$(".icono__boton"),$(".elementosCreados__M"),$(".letras__ver__poa"));						


				for (x of obtenerArchivoCoordinas__infras) {

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center"><a href="documentos/informesTecnicos/'+x.documento+'" target="_blank">Documento coordinación de Instalaciones deportivas</a></div>');

				}



				for (y of obtenerArchivoCoordinas__administrativos) {

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center"><a href="documentos/informesTecnicos/'+y.documento+'" target="_blank">Documento coordinación financiera</a></div>');

				}

				for (z of obtenerArchivoCoordinas__subcess) {

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center"><a href="documentos/informesTecnicos/'+z.documento+'" target="_blank">Documento subsecretaría</a></div>');

				}

			});

		},
		error:function(){

		}

	});


  });

}

/*=====  End of  Visualizar poas gestionados  ======*/

/*====================================================
=            Función terminar financieros            =
====================================================*/

var funcion___termina__financiero=function(tbody,table,parametro3,parametro4,parametro5){

  $(tbody).on("click","button.terminarBoton__financieros ",function(e){

  	var data=table.row($(this).parents("tr")).data();

  	$.getScript("layout/scripts/js/validaGlobal.js",function(){

	  	e.preventDefault();

	  	$(".titulo__mS").text(data[1]);

	  	$("#idOrganismo").val(data[9]);

	  	$(".documento__total__financiero").attr('href',$("#filesFrontend").val()+'quipux__transferencia/'+data[10]);

	  	regresa__tramite__final($("#regresarTramite"));

	  	terminar__tramites__financieros($("#cerrarTramiteTransferencias"));

	  	console.log(data);

    });

  });

}


/*=====  End of Función terminar financieros  ======*/



/*========================================
=            Eliminar función           =
========================================*/

var funcion__eliminar__esigef=function(tbody,table,parametro3,parametro4,parametro5){

  $(tbody).on("click","button.eliminar__boton ",function(e){

  	e.preventDefault();

  	var data=table.row($(this).parents("tr")).data();

		var confirm= alertify.confirm('¿Está seguro de eliminar el registro?','¿Está seguro de eliminar el registro?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

		confirm.set({transition:'slide'});    

		confirm.set('onok', function(){ //callbak al pulsar botón positivo
			  
			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','eliminaresigeft');		

			paqueteDeDatos.append("idEsiget",data[5]);

			$.ajax({

				type:"POST",
				url:"modelosBd/inserta/eliminaAcciones.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

		          	var elementos=JSON.parse(response);

		          	var mensaje=elementos['mensaje'];

					if(mensaje==1){

				    	alertify.set("notifier","position", "top-center");
				    	alertify.notify("Registro eliminado correctamente", "success", 5, function(){});

				   	 	window.setTimeout(function(){ 

				        	location.reload();

				    	} ,5000); 

		          	}

				},
				error:function(){

				}
				
			});	

		});

		confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
			alertify.set("notifier","position", "top-center");
			alertify.notify("Acción cancelada", "error", 1, function(){

				$(this).show();

			}); 
		}); 


  });

}


/*=====  End of Eliminar función  ======*/



/*========================================
=            Eliminar función            =
========================================*/

var funcion__eliminarI=function(tbody,table,parametro3,parametro4,parametro5){

  $(tbody).on("click","button.eliminar__boton ",function(e){

  	e.preventDefault();

  	var data=table.row($(this).parents("tr")).data();

  	$("#organismoId").val(data[9]);

  });

}


/*=====  End of Eliminar función  ======*/


/*================================================
=            Observaciones realizadas            =
================================================*/

var funcion__enCordiObservi=function(tbody,table,parametro3,parametro4,parametro5){

  $(tbody).on("click","button.asignarBoton__coor ",function(e){

  	e.preventDefault();

  	var data=table.row($(this).parents("tr")).data();

  	var paqueteDeDatos = new FormData();

  	paqueteDeDatos.append('idOrganismo',data[5]);
  	paqueteDeDatos.append('tipo','seleccionasCoordinas');

	$.ajax({

		type:"POST",
		url:"modelosBd/inserta/seleccionaAcciones.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

			var elementos=JSON.parse(response);

			var obtenernombre__organismos=elementos['obtenernombre__organismos'];

			var obtenerArchivoCoordinas__infras=elementos['obtenerArchivoCoordinas__infras'];
			var obtenerArchivoCoordinas__administrativos=elementos['obtenerArchivoCoordinas__administrativos'];
			var obtenerArchivoCoordinas__subcess=elementos['obtenerArchivoCoordinas__subcess'];

			$("#idOrganismoM").val(data[5]);

			for (w of obtenernombre__organismos) {

				$(".titulo__mS").text(w.nombreOrganismo);

			}

			if($("#idRolAd").val()=="2" || $("#idRolAd").val()==2){

				// $(".contenedor__bodyCMatriz").append('<div class="row"><div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div></div>');

				// funcionarios__normalesPlanifi($(".alto__fisiR"),$("#idUsuarioPrincipal").val());

			}

			if($("#idRolAd").val()=="2" || $("#idRolAd").val()==2){

				enviarInforPlani__observaciones($("#guardaEnvio_coors"),$("#idOrganismoM").val(),"d",$("#idUsuarioPrincipal").val());

			}else{

				enviarInforPlani__observaciones($("#guardaEnvio_coors"),$("#idOrganismoM").val(),"a",$("#idUsuarioPrincipal").val());

			}

		},
		error:function(){

		}

	});

  });

}

/*=====  End of Observaciones realizadas  ======*/

/*==========================================
=             Actualizar nuevos            =
==========================================*/

var funcion__gestionados__i=function(tbody,table,parametro3,parametro4,parametro5){

  $(tbody).on("click","button.editarGestionados ",function(e){

	e.preventDefault();

	var data=table.row($(this).parents("tr")).data();

  	$.getScript("layout/scripts/js/validacionBasica.js",function(){

	  	$("#organismoId").val(data[9]);

	  	$("#fecha__poasE").val(data[7]);

	  	$("#numeroResolucion__ed").val(data[5]);

	  	$("#notificado__sin").val(data[8]);

	  	/*==================================
	  	=            Checkboxes            =
	  	==================================*/
	  	
		checkboxFunciones($("#aceptarDocumentos__c"),$(".documento__ocultos")); 	
	  	
	  	/*=====  End of Checkboxes  ======*/
	  	
	  	// console.log(data);

  	});

  });

}

/*=====  End of  Actualizar nuevos  ======*/


/*========================================================
=            Actualizar valores coordinadores            =
========================================================*/

var funcion__enCordi=function(tbody,table,parametro3,parametro4,parametro5){

  $(tbody).on("click","button.asignarBoton__coor ",function(e){

  	e.preventDefault();

  	var data=table.row($(this).parents("tr")).data();

  	var paqueteDeDatos = new FormData();

  	paqueteDeDatos.append('idOrganismo',data[5]);
  	paqueteDeDatos.append('tipo','seleccionasCoordinas');

	$.ajax({

		type:"POST",
		url:"modelosBd/inserta/seleccionaAcciones.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

			$.getScript("layout/scripts/js/validacionBasica.js",function(){

			var elementos=JSON.parse(response);

			var obtenernombre__organismos=elementos['obtenernombre__organismos'];

			var obtenerArchivoCoordinas__infras=elementos['obtenerArchivoCoordinas__infras'];
			var obtenerArchivoCoordinas__administrativos=elementos['obtenerArchivoCoordinas__administrativos'];
			var obtenerArchivoCoordinas__subcess=elementos['obtenerArchivoCoordinas__subcess'];

			var obtenerInformacion=elementos['obtenerInformacion'];
			var indicadorInformacion=elementos['indicadorInformacion'];



			$("#idOrganismoM").val(data[5]);

			for (w of obtenernombre__organismos) {

				$(".titulo__mS").text(w.nombreOrganismo);

			}

			if (!$(".creados__letter").length > 0 ) {


				$(".contenedor__bodyCMatriz").append('<div class="col col-6 letras__ver__poa text-center creados__letter" style="font-weight:bold; font-size:15px;">Ver POA</div><div class="col col-6"><button class="ver__Tabla btn btn-primary creados__letter" style="cursor:pointer;"><i class="fas fa-eye icono__boton"></i></button></div>');


				$(".contenedor__bodyCMatriz").append('<button type="button" class="btn btn-success excelProyectos col col-1 elementosCreados__M"><i class="fas fa-file-excel"></i>&nbsp;&nbsp;EXCEL</button><table class="tabla__itemsM elementosCreados__M" style="margin-top:2em;" id="tablaPoaPrincipal"><thead><tr><th align="center">Actividad</th><th align="center">Item</th><th align="center">Enero</th><th align="center">Febrero</th><th align="center">Marzo</th><th align="center">Abril</th><th align="center">Mayo</th><th align="center">Junio</th><th align="center">Julio</th><th align="center">Agosto</th><th align="center">Septiembre</th><th align="center">Octubre</th><th align="center">Noviembre</th><th align="center">Diciembre</th><th align="center">Total</th></tr></thead></table><br><br>');

				$(".elementosCreados__M").hide();			

				for (c of obtenerInformacion) {

					$(".tabla__itemsM").append('<tr><td>'+c.idActividades+"-"+c.nombreActividades+'</td><td>'+c.itemPreesupuestario+"-"+c.nombreItem+'</td><td><center>'+parseFloat(c.enero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.febrero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.marzo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.abril).toFixed(2)+'</center></td><td><center>'+parseFloat(c.mayo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.junio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.julio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.agosto).toFixed(2)+'</center></td><td><center>'+parseFloat(c.septiembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.octubre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.noviembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.diciembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.totalSumaItem).toFixed(2)+'</center></td></tr>');


				}


				execelGenerados($(".excelProyectos"),"tablaPoaPrincipal","poa");

				verOjoContrasenas2($(".ver__Tabla"),$(".icono__boton"),$(".elementosCreados__M"),$(".letras__ver__poa"));						
			}

			let contador1=0;
			let contador2=0;
			let contador3=0;

			if (!$(".dif"+contador1).length > 0 ) {

				for (x of obtenerArchivoCoordinas__infras) {

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center dif'+contador1+'"><a href="documentos/informesTecnicos/'+x.documento+'" target="_blank">Documento coordinación de Instalaciones deportivas</a></div>');
					contador1++;

				}

			}


			if (!$(".dif"+contador2).length > 0 ) {

				for (y of obtenerArchivoCoordinas__administrativos) {

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center dif'+contador2+'"><a href="documentos/informesTecnicos/'+y.documento+'" target="_blank">Documento coordinación financiera</a></div>');
					contador2++;

				}

			}

			if (!$(".dif"+contador3).length > 0 ) {

				for (z of obtenerArchivoCoordinas__subcess) {

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center dif'+contador3+'"><a href="documentos/informesTecnicos/'+z.documento+'" target="_blank">Documento subsecretaría</a></div>');
					contador3++;

				}

			}


			if($("#idRolAd").val()=="4" || $("#idRolAd").val()==4){

				enviarInforPlani($("#guardaEnvio_coors"),$("#idOrganismoM").val(),"c");

			}else{

				enviarInforPlani($("#guardaEnvio_coors"),$("#idOrganismoM").val(),"d");

			}

			if ($("#idRolAd").val()==3 || $("#idRolAd").val()==2) {

				if (!$("#formularioActaFinal").length > 0 ) {


				$(".contenedor__bodyCMatriz").append('<form class="row" class="formularioActaFinal" id="formularioActaFinal"></form>');


				$("#guardaEnvio_coors").hide();


				$("#idOrganismo").val($(".idOrganismoM").val());


				$("#formularioActaFinal").append("<div class='col col-4 text-right' style='font-weight:bold!important; margin-bottom:1em;'>Ingresar número de resolución</div><div class='col col-8 text-left'><input type='text' id='numeroOficioNoti' name='numeroOficioNoti' style='margin-bottom:1em;'/></div>");

				$("#formularioActaFinal").append("<div class='col col-4 text-right' style='font-weight:bold!important; margin-bottom:1em;'>Techo notificado sin incluir descuentos</div><div class='col col-8 text-left'><input type='text' id='montoTechoSin' class='solo__numero__montos' name='montoTechoSin' style='margin-bottom:1em;'/></div>");

				$("#formularioActaFinal").append("<div class='col col-4 text-right' style='font-weight:bold!important; margin-bottom:1em;'>Fecha de Aprobación de la Resolución POA (Fecha del quipux de la resolución)</div><div class='col col-8 text-left'><input type='date' id='fecha__quipux' name='fecha__quipux' style='margin-bottom:1em;'/></div>");


				$("#formularioActaFinal").append("<input type='hidden' id='numeroNotificacion' name='numeroNotificacion' style='margin-bottom:1em;'/>");

				$("#formularioActaFinal").append("<div class='col col-4 text-right' style='font-weight:bold!important; margin-bottom:1em;'>Subir documento</div><div class='col col-8 text-left'><input type='file' id='archivoFinal' name='archivoFinal' style='margin-bottom:1em;'/></div>");

				$("#formularioActaFinal").append("<div class='col col-12 text-center'><button type='button' class='btn btn-warning' id='enviarFinal' style='margin-top:2em;margin-bottom:1em;'>Enviar</button></div><div class='reload__Enviosrealizados text-center'></div>");


				var enviarCorreosIniciales=function(parametro1,parametro2,parametro3,parametro4){

				$(parametro1).click(function (e){

					e.preventDefault();	

					$(parametro1).hide();

					$('.reload__Enviosrealizados').html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');


					if ($("#numeroOficioNoti").val()=="" || $("#archivoFinal").val()=="" || $("#montoTechoSin").val()=="" || $("#fecha__quipux").val()=="") {

						alertify.set("notifier","position", "top-center");
						alertify.notify("Campos obligatorios", "error", 5, function(){});

						$(parametro1).show();

						$('.reload__Enviosrealizados').html(' ');

					}else{	

						var confirm= alertify.confirm('¿Está seguro de '+parametro2+'?','¿Está seguro de '+parametro2+'?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

						confirm.set({transition:'slide'});    

						confirm.set('onok', function(){ //callbak al pulsar botón positivo
							  
							var paqueteDeDatos = new FormData();

							paqueteDeDatos.append('tipo',parametro3);		

							var other_data = $('.'+parametro4).serializeArray();

							var organismoIdPrin=$(".idOrganismoM").val();

							$.each(other_data,function(key,input){
								paqueteDeDatos.append(input.name,input.value);
							});

							let numeroOficioNoti= $("#numeroOficioNoti").val();
							let numeroNotificacion= $("#numeroNotificacion").val();
							let fecha__quipux= $("#fecha__quipux").val();
							let montoTechoSin= $("#montoTechoSin").val();

							paqueteDeDatos.append("numeroOficioNoti",numeroOficioNoti);

							paqueteDeDatos.append("numeroNotificacion",numeroNotificacion);

							paqueteDeDatos.append("organismoIdPrin",organismoIdPrin);

							paqueteDeDatos.append("fecha__quipux",fecha__quipux);

							paqueteDeDatos.append("montoTechoSin",montoTechoSin);

							paqueteDeDatos.append('documentoFinal', $('#archivoFinal')[0].files[0]);

							$.ajax({

								type:"POST",
								url:"modelosBd/inserta/insertaAccionesDos.md.php",
								contentType: false,
								data:paqueteDeDatos,
								processData: false,
								cache: false, 
								success:function(response){

						          	var elementos=JSON.parse(response);

						          	var mensaje=elementos['mensaje'];

									if(mensaje==1){

								    	alertify.set("notifier","position", "top-center");
								    	alertify.notify("Registro realizado satisfactoriamente", "success", 5, function(){});

								   	 	window.setTimeout(function(){ 

								        	location.reload();

								    	} ,5000); 

						          	}

								},
								error:function(){

								}
								
							});	

						});

						confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
							alertify.set("notifier","position", "top-center");
							alertify.notify("Acción cancelada", "error", 1, function(){


								$(parametro1).show();

								$('.reload__Enviosrealizados').html(' ');


							}); 
						}); 

					}

				});

				}

				enviarCorreosIniciales($("#enviarFinal")," de realizar la aprobaciòn del poa","poaFinales","formularioActaFinal");

				}

			}else{

				$("#guardaEnvio_coors").show();

			}

			var comprobador1=elementos['comprobador1'];
			var comprobador2=elementos['comprobador2'];
			var comprobador3=elementos['comprobador3'];



			if (comprobador1==false || comprobador2==false || comprobador3==false) {

				$("#guardaEnvio_coors").hide();
				$("#enviarFinal").hide();

				if(comprobador2==false && !$(".cont--fn").length > 0 ){

					$(".contenedor__bodyCMatriz").append('<div class="col col-12 cont--fn" style="text-align:justify;">Falta la generación del informe de la "COORDINACIÓN DE INFRAESTRUCTURA"</div>');

				}

				if(comprobador1==false && !$(".cont--fn2").length > 0 ){

					$(".contenedor__bodyCMatriz").append('<div class="col col-12 cont--fn2" style="text-align:justify;">Falta la generación del informe de la "COORDINACIÓN  FINANCIERA"</div>');

				}

				if(comprobador3==false && !$(".cont--fn3").length > 0 ){


					$(".contenedor__bodyCMatriz").append('<div class="col col-12 cont--fn3" style="text-align:justify;">Falta la generación del informe de la "SUBSECRETARÍA"</div>');


				}


			}

			if(!$(".nuevos__filas__a").length > 0 ){

				$(".contenedor__bodyCMatriz").append('<div class="col col-12 row nuevos__filas__a" style="position:relative; left:5%;"><div class="col col-4"><button class="btn btn-primary" id="devolverSub">DEVOLVER SUBSECRETARÍA</button></div><div class="col col-4"><button class="btn btn-info" id="devolverInstalciones">DEVOLVER INSTALACIONES</button></div><div class="col col-4"><button class="btn btn-secondary" id="devolverFinanciero">DEVOLVER FINANCIERO</button></div></div>');

				enviarDevuelto__plani($("#devolverSub"),$(".idOrganismoM").val(),"subsecretaria");
				enviarDevuelto__plani($("#devolverInstalciones"),$(".idOrganismoM").val(),"instalaciones");
				enviarDevuelto__plani($("#devolverFinanciero"),$(".idOrganismoM").val(),"financiero");


			}


			var actividad1__en=elementos['actividad1__en'];
			var actividad2__en=elementos['actividad2__en'];
			var actividad3__en=elementos['actividad3__en'];

			if (actividad1__en=="null" || actividad1__en==null) {
				$("#devolverFinanciero").hide();
			}

			if (actividad2__en=="null" || actividad2__en==null) {
				$("#devolverInstalciones").hide();
			}

			if (actividad3__en=="null" || actividad3__en==null) {
				$("#devolverSub").hide();
			}

			});

		},
		error:function(){

		}

	});

  });

}

/*=====  End of Actualizar valores coordinadores  ======*/


var funcion__datatabletsEditas2N=function(tbody,table,parametro3,parametro4,parametro5){

  $(tbody).on("click","a.itemsEscogidosEditar",function(e){

  	e.preventDefault();

  	var data=table.row($(this).parents("tr")).data();


	var paqueteDeDatos = new FormData();

	$(".idFinancierosIP").val(data[15]);

	$(".titulos__financierosI").text(data[1]);

	paqueteDeDatos.append('tipo','seleccionaItemsEditables');	
	paqueteDeDatos.append('idEnviado',data[15]);


	var indexVe = data[0].indexOf('51');
	var indexVeDoces = data[0].indexOf('530606');

	if(indexVe >= 0 || indexVeDoces>=0 || 4>3) {
	 $(".guardar__itemsItems").show();
	}else{
	 $(".guardar__itemsItems").hide();
	}

	console.log(data);

	$.ajax({

		type:"POST",
		url:"modelosBd/inserta/seleccionaAcciones.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

			var elementos=JSON.parse(response);
			var obtenerInformacion=elementos['obtenerInformacion'];

			for (x of obtenerInformacion) {

				$(".enero__items").val(parseFloat(x.enero).toFixed(2));
				$(".febrero__items").val(parseFloat(x.febrero).toFixed(2));
				$(".marzo__items").val(parseFloat(x.marzo).toFixed(2));
				$(".abril__items").val(parseFloat(x.abril).toFixed(2));
				$(".mayo__items").val(parseFloat(x.mayo).toFixed(2));
				$(".junio__items").val(parseFloat(x.junio).toFixed(2));
				$(".julio__items").val(parseFloat(x.julio).toFixed(2));
				$(".agosto__items").val(parseFloat(x.agosto).toFixed(2));
				$(".septiembre__items").val(parseFloat(x.septiembre).toFixed(2));
				$(".octubre__items").val(parseFloat(x.octubre).toFixed(2));
				$(".noviembre__items").val(parseFloat(x.noviembre).toFixed(2));
				$(".diciembre__items").val(parseFloat(x.diciembre).toFixed(2));
				$(".total__items").val(parseFloat(x.totalSumaItem).toFixed(2));


			}


			var sumarIndicadoresGlobal=function(parametro1,parametro2){

				$(parametro1).on('input', function () {

					var sum = 0;

					$(parametro1).each(function(){
					    sum += parseFloat($(this).val());
					});

					$(parametro2).val(sum.toFixed(2));

				});

			}


			sumarIndicadoresGlobal($(".meses__atadosItems"),$(".total__items"));

			/*======================================
			=             Inserta meses            =
			======================================*/

			var enviarMesesRelativos=function(parametro1,parametro2,parametro3,parametro4){

			$(parametro1).click(function (e){

				e.preventDefault();	

				var confirm= alertify.confirm('¿Está seguro de '+parametro2+'?','¿Está seguro de '+parametro2+'?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

				confirm.set({transition:'slide'});    

				confirm.set('onok', function(){ //callbak al pulsar botón positivo
						  
					var paqueteDeDatos = new FormData();

					paqueteDeDatos.append('tipo',parametro3);		

					var other_data = $('.'+parametro4).serializeArray();

					var organismoIdPrin=$("#organismoIdPrin").val();

					$.each(other_data,function(key,input){
							paqueteDeDatos.append(input.name,input.value);
					});

					var asignadoP=$("#montoAsginadoFe").val();
					var disponibleP=$("#montoDisponible").val();

					paqueteDeDatos.append("organismoIdPrin",organismoIdPrin);

					paqueteDeDatos.append("asignadoP",asignadoP);
					paqueteDeDatos.append("disponibleP",disponibleP);
					paqueteDeDatos.append('montoRestar',data[14]);

					$.ajax({

						type:"POST",
						url:"modelosBd/inserta/insertaAccionesDos.md.php",
						contentType: false,
						data:paqueteDeDatos,
						processData: false,
						cache: false, 
						success:function(response){

						    var elementos=JSON.parse(response);


					      	var elementos=JSON.parse(response);

					      	var mensaje=elementos['mensaje'];

					      	var sumatoreComparas=elementos['sumatoreComparas'];

							if(mensaje==2){

								alertify.set("notifier","position", "top-center");
								alertify.notify("Su presupuesto suma"+sumatoreComparas+" superando el monto asignado", "error", 4, function(){});

					      	}


							if(mensaje==1){

								alertify.set("notifier","position", "top-center");
								alertify.notify("Edición realizada correctamente", "success", 4, function(){});

								table.ajax.reload();

					      	}


						},
						error:function(){

						}
							
					});	

				});

				confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
					alertify.set("notifier","position", "top-center");
					alertify.notify("Acción cancelada", "error", 1, function(){}); 
				}); 

			});

			}

			enviarMesesRelativos($(".guardar__itemsItems")," de la información ingresada","editaInforItemsF","formMesesNece");

			/*=====  End of  Inserta meses  ======*/


		},
		error:function(){

		}
				
	});		 


  });

}


var funcion__datatabletsEliminar2=function(tbody,table,parametro3,parametro4,parametro5){

  $(tbody).on("click","a.itemsEscogidosEliminar",function(e){

  	e.preventDefault();

  	var boton=$(this);

  	$(boton).hide();

  	var data=table.row($(this).parents("tr")).data();


	var confirm= alertify.confirm('¿Está seguro de eliminar?','¿Está seguro de eliminar?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

	confirm.set({transition:'slide'});    

	confirm.set('onok', function(){ //callbak al pulsar botón positivo

		var paqueteDeDatos = new FormData();

		paqueteDeDatos.append('tipo','eliminasItemsFin');	
		paqueteDeDatos.append('idEnviado2',data[15]);
			  
		$.ajax({

			type:"POST",
			url:"modelosBd/inserta/eliminaAcciones.md.php",
			contentType: false,
			data:paqueteDeDatos,
			processData: false,
			cache: false, 
			success:function(response){

		      	var elementos=JSON.parse(response);

		      	var mensaje=elementos['mensaje'];

				if(mensaje==1){

					alertify.set("notifier","position", "top-center");
					alertify.notify("Registro eliminado", "success", 4, function(){});

					table.ajax.reload();

		      	}

			},
			error:function(){

			}
				
		});		    

	});

	confirm.set('oncancel', function(){ 

		alertify.set("notifier","position", "top-center");
		alertify.notify("Acción cancelada", "error", 1, function(){

			$(boton).show();

		}); 

	});   


  });

}

/*==========================================================
=            Función instalaciones recomendados            =
==========================================================*/

var funcion__ReasingarTraReInstala=function(tbody,table,parametro3,parametro4,parametro5){

  $(tbody).on("click","button.reasignarTramites",function(e){

  	e.preventDefault();

  	var data=table.row($(this).parents("tr")).data();

  	$(".idOrganismoM").val(data[7]);

  
  	var idOrganismo=$(".idOrganismoM").val();

  	var fisicamenteE=$("#fisicamenteE").val();

	var paqueteDeDatos = new FormData();

	paqueteDeDatos.append('tipo','informacioSubsess');

	paqueteDeDatos.append('idOrganismo',idOrganismo);

	paqueteDeDatos.append('fisicamenteE',fisicamenteE);

	$.ajax({

		type:"POST",
		url:"modelosBd/inserta/seleccionaAcciones.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

			$.getScript("layout/scripts/js/validaGlobal.js",function(){

				var elementos=JSON.parse(response);

				var obtenerInformacion=elementos['obtenerInformacion'];
				var obtenerAcCa=elementos['obtenerAcCa'];

				$(".titulo__mS").text(data[1]);

				$(".contenedor__bodyCMatriz").append(' ');

				$(".elementosCreados__M").remove();

				$(".creados__letter").remove();


				$(".contenedor__bodyCMatriz").append('<div class="col col-6 letras__ver__poa text-center creados__letter" style="font-weight:bold; font-size:15px;">Ver POA</div><div class="col col-6"><button class="ver__Tabla btn btn-primary creados__letter" style="cursor:pointer;"><i class="fas fa-eye icono__boton"></i></button></div>');


				$(".contenedor__bodyCMatriz").append('<button type="button" class="btn btn-success excelProyectos col col-1 elementosCreados__M"><i class="fas fa-file-excel"></i>&nbsp;&nbsp;EXCEL</button><table class="tabla__itemsM elementosCreados__M" style="margin-top:2em;" id="tablaPoaPrincipal"><thead><tr><th align="center">Actividad</th><th align="center">Item</th><th align="center">Enero</th><th align="center">Febrero</th><th align="center">Marzo</th><th align="center">Abril</th><th align="center">Mayo</th><th align="center">Junio</th><th align="center">Julio</th><th align="center">Agosto</th><th align="center">Septiembre</th><th align="center">Octubre</th><th align="center">Noviembre</th><th align="center">Diciembre</th><th align="center">Total</th></tr></thead></table><br><br>');

				$(".elementosCreados__M").hide();

				for (c of obtenerInformacion) {

					$(".tabla__itemsM").append('<tr><td>'+c.idActividades+"-"+c.nombreActividades+'</td><td>'+c.itemPreesupuestario+"-"+c.nombreItem+'</td><td><center>'+parseFloat(c.enero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.febrero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.marzo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.abril).toFixed(2)+'</center></td><td><center>'+parseFloat(c.mayo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.junio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.julio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.agosto).toFixed(2)+'</center></td><td><center>'+parseFloat(c.septiembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.octubre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.noviembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.diciembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.totalSumaItem).toFixed(2)+'</center></td></tr>');


				}

				execelGenerados($(".excelProyectos"),"tablaPoaPrincipal","poa");

				verOjoContrasenas2($(".ver__Tabla"),$(".icono__boton"),$(".elementosCreados__M"),$(".letras__ver__poa"));

				if (obtenerAcCa!="") {


					$(".contenedor__bodyCMatriz").append('<div class="col col-12 text-center" style="font-size:14px; font-weight:bold;">ACTIVIDADES A ANALIZAR</div><br><br>');

					for (d of obtenerAcCa) {

						$(".contenedor__bodyCMatriz").append('<div class="col col-6 letras__ver__poa text-center" style="font-weight:bold; font-size:12px; ; margin-bottom:2em;">'+d.idActividades+"-"+d.nombreActividades+'</div><div class="col col-6"><button class="ver__matrices'+d.idActividades+' btn btn-info" attr="'+d.idActividades+'" style="cursor:pointer;"><i class="fas fa-eye icono__'+d.idActividades+'"></i></button></div><br><div class="col col-12 matrices__'+d.idActividades+' row"></div>');

						verOjoAjaxMatrices($(".ver__matrices"+d.idActividades),$(".icono__"+d.idActividades),$(".matrices__"+d.idActividades),d.idActividades,d.idOrganismo,$("#idRolAd").val(),$("#fisicamenteE").val());

					}


				}

				console.log(data);

				if (fisicamenteE==24 || fisicamenteE==26) {

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

					subsecretariasSelector($(".alto__fisiR"),$("#idUsuarioC").val());

				}else if($("#idRolAd").val()==4){

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

					subsecretariasSelectorRecomen_coorI($(".alto__fisiR"),$("#idUsuarioC").val());

				}else if($("#idRolAd").val()!=3){

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

					funcionarios__normales($(".alto__fisiR"),$("#idUsuarioC").val());

				}

				if ($("#idRolAd").val()!=3) {

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center mt-4" style="font-weight:bold;">Detalle observaciones (solo en caso de ser necesario)</div><div class="col col-8 mt-4"><textarea class="detalle__observaPri ancho__total__textareas" placeholder="Detalle observaciones en caso de ser necesario"></textarea></div>');

				}

				if (data[9]!=" " && data[9]!=undefined && data[9]!=null) {

					$(".contenedor__bodyCMatriz").append('<br><br><div class="col col-12 text-center d d-flex justify-content-center" style="tex-transform:uppercase!important; margin-top:2em!important;"><a href="documentos/informesTecnicos/'+data[9]+'" target="_blank" style="text-transform:uppercase;">Descargue dando click aquí el Informe técnico</a></div><br><br>');

				}


				$(".contenedor__bodyCMatriz").append('<div class="col col-4 d d-flex justify-content-center" style="font-weight:bold; position:relative; top:2em; margin-bottom:2em;">Subir el informe técnico con su firma</div><div class="col col-8 d d-flex justify-content-center" style="position:relative; top:2em; margin-bottom:2em;"><input type="file" id="pdfArchivos" name="pdfArchivos"/></div></div>');

				var variableNotificaciones="instalaciones";


				enviarTramitesGenerados($("#enviarTramiteRecomendado"),[$("#idOrganismoM").val(),$("#fisicamenteE").val(),$("#idUsuarioC").val(),$(".alto__fisiR").val()],$(".alto__fisiR"),$(".detalle__observaPri"),$("#idRolAd").val(),"generarDocumento","recomendadoUni","N/A",variableNotificaciones);

			});

		},
		error:function(){

		}
				
	});		



  });

}



/*=====  End of Función instalaciones recomendados  ======*/


/*===========================================================
=            Función administrativo recomendados            =
===========================================================*/

var funcion__ReasingarTraReAdminis=function(tbody,table,parametro3,parametro4,parametro5){

  $(tbody).on("click","button.reasignarTramites",function(e){

  	e.preventDefault();

  	var data=table.row($(this).parents("tr")).data();

  	$(".idOrganismoM").val(data[7]);

  
  	var idOrganismo=$(".idOrganismoM").val();

  	var fisicamenteE=$("#fisicamenteE").val();

	var paqueteDeDatos = new FormData();

	paqueteDeDatos.append('tipo','informacioSubsess');

	paqueteDeDatos.append('idOrganismo',idOrganismo);

	paqueteDeDatos.append('fisicamenteE',fisicamenteE);

	$.ajax({

		type:"POST",
		url:"modelosBd/inserta/seleccionaAcciones.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

			$.getScript("layout/scripts/js/validaGlobal.js",function(){

				var elementos=JSON.parse(response);

				var obtenerInformacion=elementos['obtenerInformacion'];
				var obtenerAcCa=elementos['obtenerAcCa'];

				$(".titulo__mS").text(data[1]);

				$(".contenedor__bodyCMatriz").append(' ');

				$(".elementosCreados__M").remove();

				$(".creados__letter").remove();


				$(".contenedor__bodyCMatriz").append('<div class="col col-6 letras__ver__poa text-center creados__letter" style="font-weight:bold; font-size:15px;">Ver POA</div><div class="col col-6"><button class="ver__Tabla btn btn-primary creados__letter" style="cursor:pointer;"><i class="fas fa-eye icono__boton"></i></button></div>');


				$(".contenedor__bodyCMatriz").append('<button type="button" class="btn btn-success excelProyectos col col-1 elementosCreados__M"><i class="fas fa-file-excel"></i>&nbsp;&nbsp;EXCEL</button><table class="tabla__itemsM elementosCreados__M" style="margin-top:2em;" id="tablaPoaPrincipal"><thead><tr><th align="center">Actividad</th><th align="center">Item</th><th align="center">Enero</th><th align="center">Febrero</th><th align="center">Marzo</th><th align="center">Abril</th><th align="center">Mayo</th><th align="center">Junio</th><th align="center">Julio</th><th align="center">Agosto</th><th align="center">Septiembre</th><th align="center">Octubre</th><th align="center">Noviembre</th><th align="center">Diciembre</th><th align="center">Total</th></tr></thead></table><br><br>');

				$(".elementosCreados__M").hide();

				for (c of obtenerInformacion) {

					$(".tabla__itemsM").append('<tr><td>'+c.idActividades+"-"+c.nombreActividades+'</td><td>'+c.itemPreesupuestario+"-"+c.nombreItem+'</td><td><center>'+parseFloat(c.enero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.febrero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.marzo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.abril).toFixed(2)+'</center></td><td><center>'+parseFloat(c.mayo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.junio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.julio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.agosto).toFixed(2)+'</center></td><td><center>'+parseFloat(c.septiembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.octubre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.noviembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.diciembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.totalSumaItem).toFixed(2)+'</center></td></tr>');


				}

				execelGenerados($(".excelProyectos"),"tablaPoaPrincipal","poa");

				verOjoContrasenas2($(".ver__Tabla"),$(".icono__boton"),$(".elementosCreados__M"),$(".letras__ver__poa"));

				if (obtenerAcCa!="") {


					$(".contenedor__bodyCMatriz").append('<div class="col col-12 text-center" style="font-size:14px; font-weight:bold;">ACTIVIDADES A ANALIZAR</div><br><br>');

					for (d of obtenerAcCa) {

						$(".contenedor__bodyCMatriz").append('<div class="col col-6 letras__ver__poa text-center" style="font-weight:bold; font-size:12px; ; margin-bottom:2em;">'+d.idActividades+"-"+d.nombreActividades+'</div><div class="col col-6"><button class="ver__matrices'+d.idActividades+' btn btn-info" attr="'+d.idActividades+'" style="cursor:pointer;"><i class="fas fa-eye icono__'+d.idActividades+'"></i></button></div><br><div class="col col-12 matrices__'+d.idActividades+' row"></div>');

						verOjoAjaxMatrices($(".ver__matrices"+d.idActividades),$(".icono__"+d.idActividades),$(".matrices__"+d.idActividades),d.idActividades,d.idOrganismo,$("#idRolAd").val(),$("#fisicamenteE").val());

					}


				}

				console.log(data);

				if (fisicamenteE==24 || fisicamenteE==26) {

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

					subsecretariasSelector($(".alto__fisiR"),$("#idUsuarioC").val());

				}else if($("#idRolAd").val()==4){

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

					subsecretariasSelectorRecomen_coorAdminis($(".alto__fisiR"),$("#idUsuarioC").val());


				}else if($("#idRolAd").val()!=3){

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

					funcionarios__normales($(".alto__fisiR"),$("#idUsuarioC").val());

				}

				if ($("#idRolAd").val()!=3) {

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center mt-4" style="font-weight:bold;">Detalle observaciones (solo en caso de ser necesario)</div><div class="col col-8 mt-4"><textarea class="detalle__observaPri ancho__total__textareas" placeholder="Detalle observaciones en caso de ser necesario"></textarea></div>');

				}

				if (data[9]!=" " && data[9]!=undefined && data[9]!=null) {

					$(".contenedor__bodyCMatriz").append('<br><br><div class="col col-12 text-center d d-flex justify-content-center" style="tex-transform:uppercase!important; margin-top:2em!important;"><a href="documentos/informesTecnicos/'+data[9]+'" target="_blank" style="text-transform:uppercase;">Descargue dando click aquí el Informe técnico</a></div><br><br>');

				}


				$(".contenedor__bodyCMatriz").append('<div class="col col-4 d d-flex justify-content-center" style="font-weight:bold; position:relative; top:2em; margin-bottom:2em;">Subir el informe técnico con su firma</div><div class="col col-8 d d-flex justify-content-center" style="position:relative; top:2em; margin-bottom:2em;"><input type="file" id="pdfArchivos" name="pdfArchivos"/></div></div>');

				var variableNotificaciones="administrativo";


				enviarTramitesGenerados($("#enviarTramiteRecomendado"),[$("#idOrganismoM").val(),$("#fisicamenteE").val(),$("#idUsuarioC").val(),$(".alto__fisiR").val()],$(".alto__fisiR"),$(".detalle__observaPri"),$("#idRolAd").val(),"generarDocumento","recomendadoUni","N/A",variableNotificaciones);

			});

		},
		error:function(){

		}
				
	});		



  });

}


/*=====  End of Función administrativo recomendados  ======*/

/*====================================================================
=            Función reasignar recomendados instalaciones            =
====================================================================*/

var funcionReasingarTraCoordinas__instalaciones=function(tbody,table,parametro3,parametro4,parametro5){

  $(tbody).on("click","button.reasignarTramites",function(e){

  	e.preventDefault();

  	var data=table.row($(this).parents("tr")).data();

  	$(".idOrganismoM").val(data[7]);

  
  	var idOrganismo=$(".idOrganismoM").val();

  	var fisicamenteE=$("#fisicamenteE").val();

	var paqueteDeDatos = new FormData();

	paqueteDeDatos.append('tipo','informacioSubsess');

	paqueteDeDatos.append('idOrganismo',idOrganismo);

	paqueteDeDatos.append('fisicamenteE',fisicamenteE);

	$.ajax({

		type:"POST",
		url:"modelosBd/inserta/seleccionaAcciones.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

			$.getScript("layout/scripts/js/validaGlobal.js",function(){

				var elementos=JSON.parse(response);

				var obtenerInformacion=elementos['obtenerInformacion'];
				var obtenerAcCa=elementos['obtenerAcCa'];

				$(".titulo__mS").text(data[1]);

				$(".contenedor__bodyCMatriz").append(' ');

				$(".elementosCreados__M").remove();

				$(".creados__letter").remove();


				$(".contenedor__bodyCMatriz").append('<div class="col col-6 letras__ver__poa text-center creados__letter" style="font-weight:bold; font-size:15px;">Ver POA</div><div class="col col-6"><button class="ver__Tabla btn btn-primary creados__letter" style="cursor:pointer;"><i class="fas fa-eye icono__boton"></i></button></div>');


				$(".contenedor__bodyCMatriz").append('<button type="button" class="btn btn-success excelProyectos col col-1 elementosCreados__M"><i class="fas fa-file-excel"></i>&nbsp;&nbsp;EXCEL</button><table class="tabla__itemsM elementosCreados__M" style="margin-top:2em;" id="tablaPoaPrincipal"><thead><tr><th align="center">Actividad</th><th align="center">Item</th><th align="center">Enero</th><th align="center">Febrero</th><th align="center">Marzo</th><th align="center">Abril</th><th align="center">Mayo</th><th align="center">Junio</th><th align="center">Julio</th><th align="center">Agosto</th><th align="center">Septiembre</th><th align="center">Octubre</th><th align="center">Noviembre</th><th align="center">Diciembre</th><th align="center">Total</th></tr></thead></table><br><br>');

				$(".elementosCreados__M").hide();

				for (c of obtenerInformacion) {

					$(".tabla__itemsM").append('<tr><td>'+c.idActividades+"-"+c.nombreActividades+'</td><td>'+c.itemPreesupuestario+"-"+c.nombreItem+'</td><td><center>'+parseFloat(c.enero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.febrero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.marzo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.abril).toFixed(2)+'</center></td><td><center>'+parseFloat(c.mayo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.junio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.julio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.agosto).toFixed(2)+'</center></td><td><center>'+parseFloat(c.septiembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.octubre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.noviembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.diciembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.totalSumaItem).toFixed(2)+'</center></td></tr>');


				}

				execelGenerados($(".excelProyectos"),"tablaPoaPrincipal","poa");

				verOjoContrasenas2($(".ver__Tabla"),$(".icono__boton"),$(".elementosCreados__M"),$(".letras__ver__poa"));

				if (obtenerAcCa!="") {


					$(".contenedor__bodyCMatriz").append('<div class="col col-12 text-center" style="font-size:14px; font-weight:bold;">ACTIVIDADES A ANALIZAR</div><br><br>');

					for (d of obtenerAcCa) {

						$(".contenedor__bodyCMatriz").append('<div class="col col-6 letras__ver__poa text-center" style="font-weight:bold; font-size:12px; ; margin-bottom:2em;">'+d.idActividades+"-"+d.nombreActividades+'</div><div class="col col-6"><button class="ver__matrices'+d.idActividades+' btn btn-info" attr="'+d.idActividades+'" style="cursor:pointer;"><i class="fas fa-eye icono__'+d.idActividades+'"></i></button></div><br><div class="col col-12 matrices__'+d.idActividades+' row"></div>');

						verOjoAjaxMatrices($(".ver__matrices"+d.idActividades),$(".icono__"+d.idActividades),$(".matrices__"+d.idActividades),d.idActividades,d.idOrganismo,$("#idRolAd").val(),$("#fisicamenteE").val());

					}


				}

				console.log(data);



				var idRolE=$("#idRolAd").val();

				if($("#idRolAd").val()==3){

					$(".contenedor__bodyCMatriz").append('<br><br><div class="col col-8 text-center d d-flex justify-content-center align-items:center" style="font-weight:bold">Si desea devolver el trámite dar click en el check&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="checksDesicion" name="checksDesicion" style="width:20px; height:20px;"></div><br><br>');


					$(".contenedor__bodyCMatriz").append('<div class="col col-12 row contenedor__reasignaciones"><div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-6"><select class="alto__fisiR ancho__total__input__selects"></select></div><div class="col col-2"><button class="btn btn-primary enviar__rFuncionarios">Reasignar</button></div><br><br><div class="col col-4 text-center mt-4 observaciones__nestD" style="font-weight:bold;">Detalle observaciones (solo en caso de ser necesario)</div><div class="col col-8 mt-4 observaciones__nestD"><textarea class="detalle__observaPri ancho__total__textareas" placeholder="Detalle observaciones en caso de ser necesario"></textarea></div></div>');

				}else if((fisicamenteE==27 || fisicamenteE==28 || fisicamenteE==29 || fisicamenteE==30 || fisicamenteE==31 || fisicamenteE==32 || fisicamenteE==33) && idRolE==3){

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

					subsecretariasSelectorCorFun($(".alto__fisiR"),$("#idUsuarioC").val(),"insta");

				}else if((fisicamenteE==27 || fisicamenteE==28 || fisicamenteE==29 || fisicamenteE==30 || fisicamenteE==31 || fisicamenteE==32 || fisicamenteE==33) && idRolE==4){

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

					subsecretariasSelectorCor($(".alto__fisiR"),$("#idUsuarioC").val(),"insta");

				}else if (fisicamenteE==26) {

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

					subsecretariasSelector($(".alto__fisiR"),$("#idUsuarioC").val());

				}else if(fisicamenteE==24){


					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

					subsecretariasSelectorDos($(".alto__fisiR"),$("#idUsuarioC").val());


				}else if(fisicamenteE==1){

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR" multiple="multiple"  style="width:100%!important; height:400px!important;"></select></div>');

					subsecretariasSelectorIntras($(".alto__fisiR"),$("#idUsuarioC").val());


				}else if(fisicamenteE==2){

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR" multiple="multiple"  style="width:100%!important; height:200px!important;"></select></div>');

					subsecretariasSelectorFinancieros($(".alto__fisiR"),$("#idUsuarioC").val());


				}else if($("#idRolAd").val()!=3){

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

					funcionarios__normales($(".alto__fisiR"),$("#idUsuarioC").val());

				}


				if ($("#idRolAd").val()!=3) {

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center mt-4" style="font-weight:bold;">Detalle observaciones (solo en caso de ser necesario)</div><div class="col col-8 mt-4"><textarea class="detalle__observaPri ancho__total__textareas" placeholder="Detalle observaciones en caso de ser necesario"></textarea></div>');

				}

				if (data[9]!=" " && data[9]!=undefined && data[9]!=null) {

					$(".contenedor__bodyCMatriz").append('<br><br><div class="col col-12 text-center d d-flex justify-content-center" style="tex-transform:uppercase!important; margin-top:2em!important;"><a href="documentos/informesTecnicos/'+data[9]+'" target="_blank" style="text-transform:uppercase;">Descargue dando click aquí el Informe técnico</a></div><br><br>');

				}


				$(".contenedor__bodyCMatriz").append('<div class="col col-4 d d-flex justify-content-center" style="font-weight:bold; position:relative; top:2em; margin-bottom:2em;">Subir el informe técnico con su firma</div><div class="col col-8 d d-flex justify-content-center" style="position:relative; top:2em; margin-bottom:2em;"><input type="file" id="pdfArchivos" name="pdfArchivos"/></div></div>');

				enviarTramitesGenerados($("#enviarTramite"),[$("#idOrganismoM").val(),$("#fisicamenteE").val(),$("#idUsuarioC").val(),$(".alto__fisiR").val()],$(".alto__fisiR"),$(".detalle__observaPri"),$("#idRolAd").val(),"generarDocumento","recomendadoUni","N/A","subsesAsigna__corInstalaciones");

			});

		},
		error:function(){

		}
				
	});		



  });

}


/*=====  End of Función reasignar recomendados instalaciones  ======*/


/*============================================================
=            Función reasignar recomendados finan            =
============================================================*/

var funcionReasingarTraCoordinas__financs=function(tbody,table,parametro3,parametro4,parametro5){

  $(tbody).on("click","button.reasignarTramites",function(e){

  	e.preventDefault();

  	var data=table.row($(this).parents("tr")).data();

  	$(".idOrganismoM").val(data[7]);

  
  	var idOrganismo=$(".idOrganismoM").val();

  	var fisicamenteE=$("#fisicamenteE").val();

	var paqueteDeDatos = new FormData();

	paqueteDeDatos.append('tipo','informacioSubsess');

	paqueteDeDatos.append('idOrganismo',idOrganismo);

	paqueteDeDatos.append('fisicamenteE',fisicamenteE);

	$.ajax({

		type:"POST",
		url:"modelosBd/inserta/seleccionaAcciones.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

			$.getScript("layout/scripts/js/validaGlobal.js",function(){

				var elementos=JSON.parse(response);

				var obtenerInformacion=elementos['obtenerInformacion'];
				var obtenerAcCa=elementos['obtenerAcCa'];

				$(".titulo__mS").text(data[1]);

				$(".contenedor__bodyCMatriz").append(' ');

				$(".elementosCreados__M").remove();

				$(".creados__letter").remove();


				$(".contenedor__bodyCMatriz").append('<div class="col col-6 letras__ver__poa text-center creados__letter" style="font-weight:bold; font-size:15px;">Ver POA</div><div class="col col-6"><button class="ver__Tabla btn btn-primary creados__letter" style="cursor:pointer;"><i class="fas fa-eye icono__boton"></i></button></div>');


				$(".contenedor__bodyCMatriz").append('<button type="button" class="btn btn-success excelProyectos col col-1 elementosCreados__M"><i class="fas fa-file-excel"></i>&nbsp;&nbsp;EXCEL</button><table class="tabla__itemsM elementosCreados__M" style="margin-top:2em;" id="tablaPoaPrincipal"><thead><tr><th align="center">Actividad</th><th align="center">Item</th><th align="center">Enero</th><th align="center">Febrero</th><th align="center">Marzo</th><th align="center">Abril</th><th align="center">Mayo</th><th align="center">Junio</th><th align="center">Julio</th><th align="center">Agosto</th><th align="center">Septiembre</th><th align="center">Octubre</th><th align="center">Noviembre</th><th align="center">Diciembre</th><th align="center">Total</th></tr></thead></table><br><br>');

				$(".elementosCreados__M").hide();

				for (c of obtenerInformacion) {

					$(".tabla__itemsM").append('<tr><td>'+c.idActividades+"-"+c.nombreActividades+'</td><td>'+c.itemPreesupuestario+"-"+c.nombreItem+'</td><td><center>'+parseFloat(c.enero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.febrero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.marzo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.abril).toFixed(2)+'</center></td><td><center>'+parseFloat(c.mayo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.junio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.julio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.agosto).toFixed(2)+'</center></td><td><center>'+parseFloat(c.septiembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.octubre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.noviembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.diciembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.totalSumaItem).toFixed(2)+'</center></td></tr>');


				}

				execelGenerados($(".excelProyectos"),"tablaPoaPrincipal","poa");

				verOjoContrasenas2($(".ver__Tabla"),$(".icono__boton"),$(".elementosCreados__M"),$(".letras__ver__poa"));

				if (obtenerAcCa!="") {


					$(".contenedor__bodyCMatriz").append('<div class="col col-12 text-center" style="font-size:14px; font-weight:bold;">ACTIVIDADES A ANALIZAR</div><br><br>');

					for (d of obtenerAcCa) {

						$(".contenedor__bodyCMatriz").append('<div class="col col-6 letras__ver__poa text-center" style="font-weight:bold; font-size:12px; ; margin-bottom:2em;">'+d.idActividades+"-"+d.nombreActividades+'</div><div class="col col-6"><button class="ver__matrices'+d.idActividades+' btn btn-info" attr="'+d.idActividades+'" style="cursor:pointer;"><i class="fas fa-eye icono__'+d.idActividades+'"></i></button></div><br><div class="col col-12 matrices__'+d.idActividades+' row"></div>');

						verOjoAjaxMatrices($(".ver__matrices"+d.idActividades),$(".icono__"+d.idActividades),$(".matrices__"+d.idActividades),d.idActividades,d.idOrganismo,$("#idRolAd").val(),$("#fisicamenteE").val());

					}


				}

				console.log(data);



				var idRolE=$("#idRolAd").val();

				if((fisicamenteE==27 || fisicamenteE==28 || fisicamenteE==29 || fisicamenteE==30 || fisicamenteE==31 || fisicamenteE==32 || fisicamenteE==33) && idRolE==3){

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

					subsecretariasSelectorCorFun($(".alto__fisiR"),$("#idUsuarioC").val(),"insta");

				}else if((fisicamenteE==27 || fisicamenteE==28 || fisicamenteE==29 || fisicamenteE==30 || fisicamenteE==31 || fisicamenteE==32 || fisicamenteE==33) && idRolE==4){

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

					subsecretariasSelectorCorFunCorFin($(".alto__fisiR"),$("#idUsuarioC").val(),"insta");

				}else if (fisicamenteE==26) {

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

					subsecretariasSelector($(".alto__fisiR"),$("#idUsuarioC").val());

				}else if(fisicamenteE==24){


					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

					subsecretariasSelectorDos($(".alto__fisiR"),$("#idUsuarioC").val());


				}else if(fisicamenteE==1){

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR" multiple="multiple"  style="width:100%!important; height:400px!important;"></select></div>');

					subsecretariasSelectorIntras($(".alto__fisiR"),$("#idUsuarioC").val());


				}else if(fisicamenteE==2){

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR" multiple="multiple"  style="width:100%!important; height:200px!important;"></select></div>');

					subsecretariasSelectorFinancieros($(".alto__fisiR"),$("#idUsuarioC").val());


				}else if($("#idRolAd").val()!=3){

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

					funcionarios__normales($(".alto__fisiR"),$("#idUsuarioC").val());

				}



				if ($("#idRolAd").val()!=3) {

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center mt-4" style="font-weight:bold;">Detalle observaciones (solo en caso de ser necesario)</div><div class="col col-8 mt-4"><textarea class="detalle__observaPri ancho__total__textareas" placeholder="Detalle observaciones en caso de ser necesario"></textarea></div>');

				}

				if (data[9]!=" " && data[9]!=undefined && data[9]!=null) {

					$(".contenedor__bodyCMatriz").append('<br><br><div class="col col-12 text-center d d-flex justify-content-center" style="tex-transform:uppercase!important; margin-top:2em!important;"><a href="documentos/informesTecnicos/'+data[9]+'" target="_blank" style="text-transform:uppercase;">Descargue dando click aquí el Informe técnico</a></div><br><br>');

				}


				$(".contenedor__bodyCMatriz").append('<div class="col col-4 d d-flex justify-content-center" style="font-weight:bold; position:relative; top:2em; margin-bottom:2em;">Subir el informe técnico con su firma</div><div class="col col-8 d d-flex justify-content-center" style="position:relative; top:2em; margin-bottom:2em;"><input type="file" id="pdfArchivos" name="pdfArchivos"/></div></div>');

				enviarTramitesGenerados($("#enviarTramite"),[$("#idOrganismoM").val(),$("#fisicamenteE").val(),$("#idUsuarioC").val(),$(".alto__fisiR").val()],$(".alto__fisiR"),$(".detalle__observaPri"),$("#idRolAd").val(),"generarDocumento","recomendadoUni","N/A","subsesAsigna__corFinans");

			});

		},
		error:function(){

		}
				
	});		



  });

}

/*=====  End of Función reasignar recomendados finan  ======*/


/*===================================================================
=            Función reasignar recomendados subess zonal            =
===================================================================*/

var funcionReasingarTraCoordinas__subsess=function(tbody,table,parametro3,parametro4,parametro5){

  $(tbody).on("click","button.reasignarTramites",function(e){



  	e.preventDefault();

  	var data=table.row($(this).parents("tr")).data();

  	$(".idOrganismoM").val(data[7]);

  
  	var idOrganismo=$(".idOrganismoM").val();

  	var fisicamenteE=$("#fisicamenteE").val();

	var paqueteDeDatos = new FormData();

	paqueteDeDatos.append('tipo','informacioSubsess');

	paqueteDeDatos.append('idOrganismo',idOrganismo);

	paqueteDeDatos.append('fisicamenteE',fisicamenteE);

	$.ajax({

		type:"POST",
		url:"modelosBd/inserta/seleccionaAcciones.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

			$.getScript("layout/scripts/js/validaGlobal.js",function(){

				var elementos=JSON.parse(response);

				var obtenerInformacion=elementos['obtenerInformacion'];
				var obtenerAcCa=elementos['obtenerAcCa'];
				var obtenerInformacionObservaciones=elementos['obtenerInformacionObservaciones'];

				$(".titulo__mS").text(data[1]);

				$(".contenedor__bodyCMatriz").append(' ');

				$(".elementosCreados__M").remove();

				$(".creados__letter").remove();


				$(".contenedor__bodyCMatriz").append('<div class="col col-6 letras__ver__poa text-center creados__letter" style="font-weight:bold; font-size:15px;">Ver POA</div><div class="col col-6"><button class="ver__Tabla btn btn-primary creados__letter" style="cursor:pointer;"><i class="fas fa-eye icono__boton"></i></button></div>');


				$(".contenedor__bodyCMatriz").append('<button type="button" class="btn btn-success excelProyectos col col-1 elementosCreados__M"><i class="fas fa-file-excel"></i>&nbsp;&nbsp;EXCEL</button><table class="tabla__itemsM elementosCreados__M" style="margin-top:2em;" id="tablaPoaPrincipal"><thead><tr><th align="center">Actividad</th><th align="center">Item</th><th align="center">Enero</th><th align="center">Febrero</th><th align="center">Marzo</th><th align="center">Abril</th><th align="center">Mayo</th><th align="center">Junio</th><th align="center">Julio</th><th align="center">Agosto</th><th align="center">Septiembre</th><th align="center">Octubre</th><th align="center">Noviembre</th><th align="center">Diciembre</th><th align="center">Total</th></tr></thead></table><br><br>');


				$(".elementosCreados__M").hide();

				for (c of obtenerInformacion) {

					$(".tabla__itemsM").append('<tr><td>'+c.idActividades+"-"+c.nombreActividades+'</td><td>'+c.itemPreesupuestario+"-"+c.nombreItem+'</td><td><center>'+parseFloat(c.enero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.febrero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.marzo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.abril).toFixed(2)+'</center></td><td><center>'+parseFloat(c.mayo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.junio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.julio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.agosto).toFixed(2)+'</center></td><td><center>'+parseFloat(c.septiembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.octubre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.noviembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.diciembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.totalSumaItem).toFixed(2)+'</center></td></tr>');


				}

				execelGenerados($(".excelProyectos"),"tablaPoaPrincipal","poa");

				verOjoContrasenas2($(".ver__Tabla"),$(".icono__boton"),$(".elementosCreados__M"),$(".letras__ver__poa"));

				if (obtenerAcCa!="") {


					$(".contenedor__bodyCMatriz").append('<div class="col col-12 text-center" style="font-size:14px; font-weight:bold;">ACTIVIDADES A ANALIZAR</div><br><br>');

					for (d of obtenerAcCa) {

						$(".contenedor__bodyCMatriz").append('<div class="col col-6 letras__ver__poa text-center" style="font-weight:bold; font-size:12px; ; margin-bottom:2em;">'+d.idActividades+"-"+d.nombreActividades+'</div><div class="col col-6"><button class="ver__matrices'+d.idActividades+' btn btn-info" attr="'+d.idActividades+'" style="cursor:pointer;"><i class="fas fa-eye icono__'+d.idActividades+'"></i></button></div><br><div class="col col-12 matrices__'+d.idActividades+' row"></div>');

						verOjoAjaxMatrices($(".ver__matrices"+d.idActividades),$(".icono__"+d.idActividades),$(".matrices__"+d.idActividades),d.idActividades,d.idOrganismo,$("#idRolAd").val(),$("#fisicamenteE").val());

					}


				}

				console.log(data);


				var idRolE=$("#idRolAd").val();

				if((fisicamenteE==27 || fisicamenteE==28 || fisicamenteE==29 || fisicamenteE==30 || fisicamenteE==31 || fisicamenteE==32 || fisicamenteE==33) && idRolE==3){

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

					subsecretariasSelectorCorFun($(".alto__fisiR"),$("#idUsuarioC").val(),"insta");

				}else if((fisicamenteE==27 || fisicamenteE==28 || fisicamenteE==29 || fisicamenteE==30 || fisicamenteE==31 || fisicamenteE==32 || fisicamenteE==33) && idRolE==4){

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

					subsecretariasSelectorSucenrFin($(".alto__fisiR"),$("#idUsuarioC").val(),"insta");

				}else if (fisicamenteE==26) {

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

					subsecretariasSelector($(".alto__fisiR"),$("#idUsuarioC").val());

				}else if(fisicamenteE==24){


					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

					subsecretariasSelectorDos($(".alto__fisiR"),$("#idUsuarioC").val());


				}else if(fisicamenteE==1){

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR" multiple="multiple"  style="width:100%!important; height:400px!important;"></select></div>');

					subsecretariasSelectorIntras($(".alto__fisiR"),$("#idUsuarioC").val());


				}else if(fisicamenteE==2){

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR" multiple="multiple"  style="width:100%!important; height:200px!important;"></select></div>');

					subsecretariasSelectorFinancieros($(".alto__fisiR"),$("#idUsuarioC").val());


				}else if($("#idRolAd").val()!=3){

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

					funcionarios__normales($(".alto__fisiR"),$("#idUsuarioC").val());

				} 				


				if ($("#idRolAd").val()!=3) {

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center mt-4" style="font-weight:bold;">Detalle observaciones (solo en caso de ser necesario)</div><div class="col col-8 mt-4"><textarea class="detalle__observaPri ancho__total__textareas" placeholder="Detalle observaciones en caso de ser necesario"></textarea></div>');

				}

				if (data[9]!=" " && data[9]!=undefined && data[9]!=null) {

					$(".contenedor__bodyCMatriz").append('<br><br><div class="col col-12 text-center d d-flex justify-content-center" style="tex-transform:uppercase!important; margin-top:2em!important;"><a href="documentos/informesTecnicos/'+data[9]+'" target="_blank" style="text-transform:uppercase;">Descargue dando click aquí el Informe técnico</a></div><br><br>');

				}

				if (obtenerInformacionObservaciones!="") {

					$(".contenedor__bodyCMatriz").append('<div class="col col-12 text-center" style="font-weight:bold;">SECCIÓN DE OBSERVACIONES</div><br>');


					for (dLC of obtenerInformacionObservaciones) {

						$(".contenedor__bodyCMatriz").append('<div class="row col col-12" style="margin-left:5%;"><div class="col col-4">Observación realizada por '+dLC.nombreCompleto+':</div><div class="col col-8">'+dLC.observaciones+'</div></div>');

					}

					$(".contenedor__bodyCMatriz").append('<div></div><br><br>');


				}

				$(".contenedor__bodyCMatriz").append('<div class="col col-4 d d-flex justify-content-center" style="font-weight:bold; position:relative; top:2em; margin-bottom:2em;">Subir el informe técnico con su firma</div><div class="col col-8 d d-flex justify-content-center" style="position:relative; top:2em; margin-bottom:2em;"><input type="file" id="pdfArchivos" name="pdfArchivos"/></div></div>');


				enviarTramitesGenerados($("#enviarTramite"),[$("#idOrganismoM").val(),$("#fisicamenteE").val(),$("#idUsuarioC").val(),$(".alto__fisiR").val()],$(".alto__fisiR"),$(".detalle__observaPri"),$("#idRolAd").val(),"generarDocumento","recomendadoUni","N/A","subsesAsigna__cor");

			});

		},
		error:function(){

		}
				
	});		



  });

}

/*=====  End of Función reasignar recomendados subess zonal  ======*/

/*================================================
=            Funcion reasignar infras            =
================================================*/

var funcion__datatabletsReasignarTraRe__infras=function(tbody,table,parametro3,parametro4,parametro5){

  $(tbody).on("click","button.reasignarTramites",function(e){

  	e.preventDefault();

  	var data=table.row($(this).parents("tr")).data();

  	$(".idOrganismoM").val(data[7]);

  
  	var idOrganismo=$(".idOrganismoM").val();

  	var fisicamenteE=$("#fisicamenteE").val();

	var paqueteDeDatos = new FormData();

	paqueteDeDatos.append('tipo','informacioSubsess');

	paqueteDeDatos.append('idOrganismo',idOrganismo);

	paqueteDeDatos.append('fisicamenteE',fisicamenteE);

	$.ajax({

		type:"POST",
		url:"modelosBd/inserta/seleccionaAcciones.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

			$.getScript("layout/scripts/js/validaGlobal.js",function(){

				var elementos=JSON.parse(response);

				var obtenerInformacion=elementos['obtenerInformacion'];
				var obtenerAcCa=elementos['obtenerAcCa'];

				$(".titulo__mS").text(data[1]);

				$(".contenedor__bodyCMatriz").append(' ');

				$(".elementosCreados__M").remove();

				$(".creados__letter").remove();

				
				let zonal1 = data[9].indexOf("__27__4.pdf");
				let zonal2 = data[9].indexOf("__28__4.pdf");
				let zonal3 = data[9].indexOf("__29__4.pdf");
				let zonal4 = data[9].indexOf("__30__4.pdf");
				let zonal6 = data[9].indexOf("__31__4.pdf");
				let zonal7 = data[9].indexOf("__32__4.pdf");
				let zonal8 = data[9].indexOf("__33__4.pdf");

				if (zonal1 !== -1){

					$(".contenedor__bodyCMatriz").append('<div class="col col-12" style="font-weight:bold; font-size:15px; text-align:center;">TRÁMITE ENVIADO DESDE LA ZONAL 1</div>');

				}else if(zonal2 !== -1){

					$(".contenedor__bodyCMatriz").append('<div class="col col-12" style="font-weight:bold; font-size:15px; text-align:center;">TRÁMITE ENVIADO DESDE LA ZONAL 2</div>');

				}else if(zonal3 !== -1){

					$(".contenedor__bodyCMatriz").append('<div class="col col-12" style="font-weight:bold; font-size:15px; text-align:center;">TRÁMITE ENVIADO DESDE LA ZONAL 3</div>');
					
				}else if(zonal4 !== -1){

					$(".contenedor__bodyCMatriz").append('<div class="col col-12" style="font-weight:bold; font-size:15px; text-align:center;">TRÁMITE ENVIADO DESDE LA ZONAL 4</div>');
					
				}else if(zonal6 !== -1){

					$(".contenedor__bodyCMatriz").append('<div class="col col-12" style="font-weight:bold; font-size:15px; text-align:center;">TRÁMITE ENVIADO DESDE LA ZONAL 6</div>');
					
				}else if(zonal7 !== -1){

					$(".contenedor__bodyCMatriz").append('<div class="col col-12" style="font-weight:bold; font-size:15px; text-align:center;">TRÁMITE ENVIADO DESDE LA ZONAL 7</div>');
					
				}else if(zonal8 !== -1){

					$(".contenedor__bodyCMatriz").append('<div class="col col-12" style="font-weight:bold; font-size:15px; text-align:center;">TRÁMITE ENVIADO DESDE LA ZONAL 8</div>');
					
				}


				$(".contenedor__bodyCMatriz").append('<div class="col col-6 letras__ver__poa text-center creados__letter" style="font-weight:bold; font-size:15px;">Ver POA</div><div class="col col-6"><button class="ver__Tabla btn btn-primary creados__letter" style="cursor:pointer;"><i class="fas fa-eye icono__boton"></i></button></div>');


				$(".contenedor__bodyCMatriz").append('<button type="button" class="btn btn-success excelProyectos col col-1 elementosCreados__M"><i class="fas fa-file-excel"></i>&nbsp;&nbsp;EXCEL</button><table class="tabla__itemsM elementosCreados__M" style="margin-top:2em;" id="tablaPoaPrincipal"><thead><tr><th align="center">Actividad</th><th align="center">Item</th><th align="center">Enero</th><th align="center">Febrero</th><th align="center">Marzo</th><th align="center">Abril</th><th align="center">Mayo</th><th align="center">Junio</th><th align="center">Julio</th><th align="center">Agosto</th><th align="center">Septiembre</th><th align="center">Octubre</th><th align="center">Noviembre</th><th align="center">Diciembre</th><th align="center">Total</th></tr></thead></table><br><br>');

				$(".elementosCreados__M").hide();

				for (c of obtenerInformacion) {

					$(".tabla__itemsM").append('<tr><td>'+c.idActividades+"-"+c.nombreActividades+'</td><td>'+c.itemPreesupuestario+"-"+c.nombreItem+'</td><td><center>'+parseFloat(c.enero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.febrero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.marzo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.abril).toFixed(2)+'</center></td><td><center>'+parseFloat(c.mayo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.junio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.julio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.agosto).toFixed(2)+'</center></td><td><center>'+parseFloat(c.septiembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.octubre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.noviembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.diciembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.totalSumaItem).toFixed(2)+'</center></td></tr>');


				}

				execelGenerados($(".excelProyectos"),"tablaPoaPrincipal","poa");

				verOjoContrasenas2($(".ver__Tabla"),$(".icono__boton"),$(".elementosCreados__M"),$(".letras__ver__poa"));

				if (obtenerAcCa!="") {


					$(".contenedor__bodyCMatriz").append('<div class="col col-12 text-center" style="font-size:14px; font-weight:bold;">ACTIVIDADES A ANALIZAR</div><br><br>');

					for (d of obtenerAcCa) {

						$(".contenedor__bodyCMatriz").append('<div class="col col-6 letras__ver__poa text-center" style="font-weight:bold; font-size:12px; ; margin-bottom:2em;">'+d.idActividades+"-"+d.nombreActividades+'</div><div class="col col-6"><button class="ver__matrices'+d.idActividades+' btn btn-info" attr="'+d.idActividades+'" style="cursor:pointer;"><i class="fas fa-eye icono__'+d.idActividades+'"></i></button></div><br><div class="col col-12 matrices__'+d.idActividades+' row"></div>');

						verOjoAjaxMatrices($(".ver__matrices"+d.idActividades),$(".icono__"+d.idActividades),$(".matrices__"+d.idActividades),d.idActividades,d.idOrganismo,$("#idRolAd").val(),$("#fisicamenteE").val());

					}


				}

				console.log(data);

				if (fisicamenteE==24 || fisicamenteE==26) {

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

					subsecretariasSelectorRecomen($(".alto__fisiR"),$("#idUsuarioC").val());

				}else if($("#idRolAd").val()==4){

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

					subsecretariasSelectorRecomen_coorIn($(".alto__fisiR"),$("#idUsuarioC").val());

				}else if($("#idRolAd").val()!=3){

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

					funcionarios__normales($(".alto__fisiR"),$("#idUsuarioC").val());

				}

				if ($("#idRolAd").val()!=3) {

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center mt-4" style="font-weight:bold;">Detalle observaciones (solo en caso de ser necesario)</div><div class="col col-8 mt-4"><textarea class="detalle__observaPri ancho__total__textareas" placeholder="Detalle observaciones en caso de ser necesario"></textarea></div>');

				}

				if (data[9]!=" " && data[9]!=undefined && data[9]!=null) {

					$(".contenedor__bodyCMatriz").append('<br><br><div class="col col-12 text-center d d-flex justify-content-center" style="tex-transform:uppercase!important; margin-top:2em!important;"><a href="documentos/informesTecnicos/'+data[9]+'" target="_blank" style="text-transform:uppercase;">Descargue dando click aquí el Informe técnico</a></div><br><br>');

				}


				$(".contenedor__bodyCMatriz").append('<div class="col col-4 d d-flex justify-content-center" style="font-weight:bold; position:relative; top:2em; margin-bottom:2em;">Subir el informe técnico con su firma</div><div class="col col-8 d d-flex justify-content-center" style="position:relative; top:2em; margin-bottom:2em;"><input type="file" id="pdfArchivos" name="pdfArchivos"/></div></div>');



				enviarTramitesGenerados($("#enviarTramiteRecomendado"),[$("#idOrganismoM").val(),$("#fisicamenteE").val(),$("#idUsuarioC").val(),$(".alto__fisiR").val()],$(".alto__fisiR"),$(".detalle__observaPri"),$("#idRolAd").val(),"generarDocumento","recomendadoUni","infrasEspecificos");

			});

		},
		error:function(){

		}
				
	});		



  });

}


/*=====  End of Funcion reasignar infras  ======*/

/*=============================================================
=            Reasignar recomendados talento humano            =
=============================================================*/

var funcion__datatabletsReasignarTraRe__talento=function(tbody,table,parametro3,parametro4,parametro5){

  $(tbody).on("click","button.reasignarTramites",function(e){

  	e.preventDefault();

  	var data=table.row($(this).parents("tr")).data();

  	$(".idOrganismoM").val(data[7]);

  
  	var idOrganismo=$(".idOrganismoM").val();

  	var fisicamenteE=$("#fisicamenteE").val();

	var paqueteDeDatos = new FormData();

	paqueteDeDatos.append('tipo','informacioSubsess');

	paqueteDeDatos.append('idOrganismo',idOrganismo);

	paqueteDeDatos.append('fisicamenteE',fisicamenteE);

	$.ajax({

		type:"POST",
		url:"modelosBd/inserta/seleccionaAcciones.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

			$.getScript("layout/scripts/js/validaGlobal.js",function(){

				var elementos=JSON.parse(response);

				var obtenerInformacion=elementos['obtenerInformacion'];
				var obtenerAcCa=elementos['obtenerAcCa'];

				$(".titulo__mS").text(data[1]);

				$(".contenedor__bodyCMatriz").append(' ');

				$(".elementosCreados__M").remove();

				$(".creados__letter").remove();

				let zonal1 = data[9].indexOf("__27__4.pdf");
				let zonal2 = data[9].indexOf("__28__4.pdf");
				let zonal3 = data[9].indexOf("__29__4.pdf");
				let zonal4 = data[9].indexOf("__30__4.pdf");
				let zonal6 = data[9].indexOf("__31__4.pdf");
				let zonal7 = data[9].indexOf("__32__4.pdf");
				let zonal8 = data[9].indexOf("__33__4.pdf");

				if (!$(".respon__tramites").length > 0 ) {

					if (zonal1 !== -1){

						$(".contenedor__bodyCMatriz").append('<div class="col col-12 respon__tramites" style="font-weight:bold; font-size:15px; text-align:center;">TRÁMITE ENVIADO DESDE LA ZONAL 1</div>');

					}else if(zonal2 !== -1){

						$(".contenedor__bodyCMatriz").append('<div class="col col-12 respon__tramites" style="font-weight:bold; font-size:15px; text-align:center;">TRÁMITE ENVIADO DESDE LA ZONAL 2</div>');

					}else if(zonal3 !== -1){

						$(".contenedor__bodyCMatriz").append('<div class="col col-12 respon__tramites" style="font-weight:bold; font-size:15px; text-align:center;">TRÁMITE ENVIADO DESDE LA ZONAL 3</div>');
						
					}else if(zonal4 !== -1){

						$(".contenedor__bodyCMatriz").append('<div class="col col-12 respon__tramites" style="font-weight:bold; font-size:15px; text-align:center;">TRÁMITE ENVIADO DESDE LA ZONAL 4</div>');
						
					}else if(zonal6 !== -1){

						$(".contenedor__bodyCMatriz").append('<div class="col col-12 respon__tramites" style="font-weight:bold; font-size:15px; text-align:center;">TRÁMITE ENVIADO DESDE LA ZONAL 6</div>');
						
					}else if(zonal7 !== -1){

						$(".contenedor__bodyCMatriz").append('<div class="col col-12 respon__tramites" style="font-weight:bold; font-size:15px; text-align:center;">TRÁMITE ENVIADO DESDE LA ZONAL 7</div>');
						
					}else if(zonal8 !== -1){

						$(".contenedor__bodyCMatriz").append('<div class="col col-12 respon__tramites" style="font-weight:bold; font-size:15px; text-align:center;">TRÁMITE ENVIADO DESDE LA ZONAL 8</div>');
						
					}

				}

				if (!$(".ver__Tabla").length > 0 ) {


					// $(".contenedor__bodyCMatriz").append('<div class="col col-6 letras__ver__poa text-center creados__letter" style="font-weight:bold; font-size:15px;">Ver POA</div><div class="col col-6"><button class="ver__Tabla btn btn-primary creados__letter" style="cursor:pointer;"><i class="fas fa-eye icono__boton"></i></button></div>');


					// $(".contenedor__bodyCMatriz").append('<button type="button" class="btn btn-success excelProyectos col col-1 elementosCreados__M"><i class="fas fa-file-excel"></i>&nbsp;&nbsp;EXCEL</button><table class="tabla__itemsM elementosCreados__M" style="margin-top:2em;" id="tablaPoaPrincipal"><thead><tr><th align="center">Actividad</th><th align="center">Item</th><th align="center">Enero</th><th align="center">Febrero</th><th align="center">Marzo</th><th align="center">Abril</th><th align="center">Mayo</th><th align="center">Junio</th><th align="center">Julio</th><th align="center">Agosto</th><th align="center">Septiembre</th><th align="center">Octubre</th><th align="center">Noviembre</th><th align="center">Diciembre</th><th align="center">Total</th></tr></thead></table><br><br>');

					// $(".elementosCreados__M").hide();

					// for (c of obtenerInformacion) {

					// 	$(".tabla__itemsM").append('<tr><td>'+c.idActividades+"-"+c.nombreActividades+'</td><td>'+c.itemPreesupuestario+"-"+c.nombreItem+'</td><td><center>'+parseFloat(c.enero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.febrero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.marzo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.abril).toFixed(2)+'</center></td><td><center>'+parseFloat(c.mayo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.junio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.julio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.agosto).toFixed(2)+'</center></td><td><center>'+parseFloat(c.septiembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.octubre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.noviembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.diciembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.totalSumaItem).toFixed(2)+'</center></td></tr>');


					// }

					// execelGenerados($(".excelProyectos"),"tablaPoaPrincipal","poa");

					// verOjoContrasenas2($(".ver__Tabla"),$(".icono__boton"),$(".elementosCreados__M"),$(".letras__ver__poa"));

				}



				if (!$(".actividades__rotulandos").length > 0 ) {

					if (obtenerAcCa!="") {


						$(".contenedor__bodyCMatriz").append('<div class="col col-12 text-center actividades__rotulandos" style="font-size:14px; font-weight:bold;">ACTIVIDADES A ANALIZAR</div><br><br>');

						for (d of obtenerAcCa) {

							$(".contenedor__bodyCMatriz").append('<div class="col col-6 letras__ver__poa text-center" style="font-weight:bold; font-size:12px; ; margin-bottom:2em;">'+d.idActividades+"-"+d.nombreActividades+'</div><div class="col col-6"><button class="ver__matrices'+d.idActividades+' btn btn-info" attr="'+d.idActividades+'" style="cursor:pointer;"><i class="fas fa-eye icono__'+d.idActividades+'"></i></button></div><br><div class="col col-12 matrices__'+d.idActividades+' row"></div>');

							verOjoAjaxMatrices($(".ver__matrices"+d.idActividades),$(".icono__"+d.idActividades),$(".matrices__"+d.idActividades),d.idActividades,d.idOrganismo,$("#idRolAd").val(),$("#fisicamenteE").val());

						}


					}

					console.log(data);

				}


				if (!$(".alto__fisiR").length > 0 ) {

					if (fisicamenteE==24 || fisicamenteE==26) {

						$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

						subsecretariasSelectorRecomen($(".alto__fisiR"),$("#idUsuarioC").val());

					}else if($("#idRolAd").val()==4){

						$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

						subsecretariasSelectorRecomen_coorTalento($(".alto__fisiR"),$("#idUsuarioC").val());

					}else if($("#idRolAd").val()!=3){

						$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

						funcionarios__normales($(".alto__fisiR"),$("#idUsuarioC").val());

					}

				}

				if (!$(".observa__necesarios").length > 0 ) {

					if ($("#idRolAd").val()!=3) {

						$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center mt-4 observa__necesarios" style="font-weight:bold;">Detalle observaciones (solo en caso de ser necesario)</div><div class="col col-8 mt-4"><textarea class="detalle__observaPri ancho__total__textareas" placeholder="Detalle observaciones en caso de ser necesario"></textarea></div>');

					}

					if (data[9]!=" " && data[9]!=undefined && data[9]!=null) {

						$(".contenedor__bodyCMatriz").append('<br><br><div class="col col-12 text-center d d-flex justify-content-center" style="tex-transform:uppercase!important; margin-top:2em!important;"><a href="documentos/informesTecnicos/'+data[9]+'" target="_blank" style="text-transform:uppercase;">Descargue dando click aquí el Informe técnico</a></div><br><br>');

					}

				}

				if (!$(".informe__tecnicos__recomiendas").length > 0 ) {


					$(".contenedor__bodyCMatriz").append('<div class="col col-4 d d-flex justify-content-center informe__tecnicos__recomiendas" style="font-weight:bold; position:relative; top:2em; margin-bottom:2em;">Subir el informe técnico con su firma</div><div class="col col-8 d d-flex justify-content-center" style="position:relative; top:2em; margin-bottom:2em;"><input type="file" id="pdfArchivos" name="pdfArchivos"/></div></div>');

					enviarTramitesGenerados($("#enviarTramiteRecomendado"),[$("#idOrganismoM").val(),$("#fisicamenteE").val(),$("#idUsuarioC").val(),$(".alto__fisiR").val()],$(".alto__fisiR"),$(".detalle__observaPri"),$("#idRolAd").val(),"generarDocumento","recomendadoUni","talentosHumanos");

				}


			});

		},
		error:function(){

		}
				
	});		



  });

}

/*=====  End of Reasignar recomendados talento humano  ======*/


/*======================================================
=            Función reasignar Recomendados            =
======================================================*/

var funcion__datatabletsReasignarTraRe=function(tbody,table,parametro3,parametro4,parametro5){

  $(tbody).on("click","button.reasignarTramites",function(e){

  	e.preventDefault();

  	var data=table.row($(this).parents("tr")).data();

  	$(".idOrganismoM").val(data[7]);

  
  	var idOrganismo=$(".idOrganismoM").val();

  	var fisicamenteE=$("#fisicamenteE").val();

	var paqueteDeDatos = new FormData();

	paqueteDeDatos.append('tipo','informacioSubsess');

	paqueteDeDatos.append('idOrganismo',idOrganismo);

	paqueteDeDatos.append('fisicamenteE',fisicamenteE);

	$.ajax({

		type:"POST",
		url:"modelosBd/inserta/seleccionaAcciones.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

			$.getScript("layout/scripts/js/validaGlobal.js",function(){

				var elementos=JSON.parse(response);

				var obtenerInformacion=elementos['obtenerInformacion'];
				var obtenerAcCa=elementos['obtenerAcCa'];

				$(".titulo__mS").text(data[1]);

				$(".contenedor__bodyCMatriz").append(' ');

				$(".elementosCreados__M").remove();

				$(".creados__letter").remove();


				$(".contenedor__bodyCMatriz").append('<div class="col col-6 letras__ver__poa text-center creados__letter" style="font-weight:bold; font-size:15px;">Ver POA</div><div class="col col-6"><button class="ver__Tabla btn btn-primary creados__letter" style="cursor:pointer;"><i class="fas fa-eye icono__boton"></i></button></div>');


				$(".contenedor__bodyCMatriz").append('<button type="button" class="btn btn-success excelProyectos col col-1 elementosCreados__M"><i class="fas fa-file-excel"></i>&nbsp;&nbsp;EXCEL</button><table class="tabla__itemsM elementosCreados__M" style="margin-top:2em;" id="tablaPoaPrincipal"><thead><tr><th align="center">Actividad</th><th align="center">Item</th><th align="center">Enero</th><th align="center">Febrero</th><th align="center">Marzo</th><th align="center">Abril</th><th align="center">Mayo</th><th align="center">Junio</th><th align="center">Julio</th><th align="center">Agosto</th><th align="center">Septiembre</th><th align="center">Octubre</th><th align="center">Noviembre</th><th align="center">Diciembre</th><th align="center">Total</th></tr></thead></table><br><br>');

				$(".elementosCreados__M").hide();

				for (c of obtenerInformacion) {

					$(".tabla__itemsM").append('<tr><td>'+c.idActividades+"-"+c.nombreActividades+'</td><td>'+c.itemPreesupuestario+"-"+c.nombreItem+'</td><td><center>'+parseFloat(c.enero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.febrero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.marzo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.abril).toFixed(2)+'</center></td><td><center>'+parseFloat(c.mayo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.junio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.julio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.agosto).toFixed(2)+'</center></td><td><center>'+parseFloat(c.septiembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.octubre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.noviembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.diciembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.totalSumaItem).toFixed(2)+'</center></td></tr>');


				}

				execelGenerados($(".excelProyectos"),"tablaPoaPrincipal","poa");

				verOjoContrasenas2($(".ver__Tabla"),$(".icono__boton"),$(".elementosCreados__M"),$(".letras__ver__poa"));

				if (obtenerAcCa!="") {


					$(".contenedor__bodyCMatriz").append('<div class="col col-12 text-center" style="font-size:14px; font-weight:bold;">ACTIVIDADES A ANALIZAR</div><br><br>');

					for (d of obtenerAcCa) {

						$(".contenedor__bodyCMatriz").append('<div class="col col-6 letras__ver__poa text-center" style="font-weight:bold; font-size:12px; ; margin-bottom:2em;">'+d.idActividades+"-"+d.nombreActividades+'</div><div class="col col-6"><button class="ver__matrices'+d.idActividades+' btn btn-info" attr="'+d.idActividades+'" style="cursor:pointer;"><i class="fas fa-eye icono__'+d.idActividades+'"></i></button></div><br><div class="col col-12 matrices__'+d.idActividades+' row"></div>');

						verOjoAjaxMatrices($(".ver__matrices"+d.idActividades),$(".icono__"+d.idActividades),$(".matrices__"+d.idActividades),d.idActividades,d.idOrganismo,$("#idRolAd").val(),$("#fisicamenteE").val());

					}


				}

				console.log(data);

				if (fisicamenteE==24 || fisicamenteE==26) {

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

					subsecretariasSelectorRecomen($(".alto__fisiR"),$("#idUsuarioC").val());

				}else if($("#idRolAd").val()==4){

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

					subsecretariasSelectorRecomen_coorI($(".alto__fisiR"),$("#idUsuarioC").val());

				}else if($("#idRolAd").val()!=3){

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

					funcionarios__normales($(".alto__fisiR"),$("#idUsuarioC").val());

				}

				if ($("#idRolAd").val()!=3) {

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center mt-4" style="font-weight:bold;">Detalle observaciones (solo en caso de ser necesario)</div><div class="col col-8 mt-4"><textarea class="detalle__observaPri ancho__total__textareas" placeholder="Detalle observaciones en caso de ser necesario"></textarea></div>');

				}

				if (data[9]!=" " && data[9]!=undefined && data[9]!=null) {

					$(".contenedor__bodyCMatriz").append('<br><br><div class="col col-12 text-center d d-flex justify-content-center" style="tex-transform:uppercase!important; margin-top:2em!important;"><a href="documentos/informesTecnicos/'+data[9]+'" target="_blank" style="text-transform:uppercase;">Descargue dando click aquí el Informe técnico</a></div><br><br>');

				}


				$(".contenedor__bodyCMatriz").append('<div class="col col-4 d d-flex justify-content-center" style="font-weight:bold; position:relative; top:2em; margin-bottom:2em;">Subir el informe técnico con su firma</div><div class="col col-8 d d-flex justify-content-center" style="position:relative; top:2em; margin-bottom:2em;"><input type="file" id="pdfArchivos" name="pdfArchivos"/></div></div>');



				enviarTramitesGenerados($("#enviarTramiteRecomendado"),[$("#idOrganismoM").val(),$("#fisicamenteE").val(),$("#idUsuarioC").val(),$(".alto__fisiR").val()],$(".alto__fisiR"),$(".detalle__observaPri"),$("#idRolAd").val(),"generarDocumento","recomendadoUni");

			});

		},
		error:function(){

		}
				
	});		



  });

}


/*=====  End of Función reasignar Recomendados  ======*/

/*==============================================================
=            Modificaciones recibidas planificacion            =
==============================================================*/

var funcion__datatabletsReasignarTraGene__modificaciones=function(tbody,table,parametro3,parametro4,parametro5){

  $(tbody).on("click","button.reasignarTramites__modificaciones",function(e){

  	e.preventDefault();

  	var data=table.row($(this).parents("tr")).data();

  	$(".idOrganismoM").val(data[7]);

  	$("#enviarTramite").hide();
  	
  	var idOrganismo=$(".idOrganismoM").val();

  	var fisicamenteE=$("#fisicamenteE").val();

  	var idRolAd=$("#idRolAd").val();

	var paqueteDeDatos = new FormData();

	paqueteDeDatos.append('tipo','informacioSubsess');

	paqueteDeDatos.append('idOrganismo',idOrganismo);

	paqueteDeDatos.append('fisicamenteE',fisicamenteE);

	paqueteDeDatos.append('idRolAd',idRolAd);


	$.ajax({

		type:"POST",
		url:"modelosBd/inserta/seleccionaAcciones.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

			$.getScript("layout/scripts/js/validaGlobal.js",function(){

				var elementos=JSON.parse(response);

				var obtenerInformacion=elementos['obtenerInformacion'];
				var obtenerAcCa=elementos['obtenerAcCa'];
				var indicadorInformacion=elementos['indicadorInformacion'];

				$(".titulo__mS").text(data[1]);

				$(".contenedor__bodyCMatriz").append(' ');

				$(".elementosCreados__M").remove();

				$(".creados__letter").remove();


				$(".contenedor__bodyCMatriz").append('<div class="col col-6 letras__ver__poa text-center creados__letter" style="font-weight:bold; font-size:15px;">Ver POA</div><div class="col col-6"><button class="ver__Tabla btn btn-primary creados__letter" style="cursor:pointer;"><i class="fas fa-eye icono__boton"></i></button></div>');



				$(".contenedor__bodyCMatriz").append('<button type="button" class="btn btn-success excelProyectos col col-1 elementosCreados__M"><i class="fas fa-file-excel"></i>&nbsp;&nbsp;EXCEL</button><table class="tabla__itemsM elementosCreados__M" style="margin-top:2em;" id="tablaPoaPrincipal"><thead><tr><th align="center">Actividad</th><th align="center">Item</th><th align="center">Enero</th><th align="center">Febrero</th><th align="center">Marzo</th><th align="center">Abril</th><th align="center">Mayo</th><th align="center">Junio</th><th align="center">Julio</th><th align="center">Agosto</th><th align="center">Septiembre</th><th align="center">Octubre</th><th align="center">Noviembre</th><th align="center">Diciembre</th><th align="center">Total</th></tr></thead></table><br><br>');

				$(".elementosCreados__M").hide();

				for (c of obtenerInformacion) {

					$(".tabla__itemsM").append('<tr><td>'+c.idActividades+"-"+c.nombreActividades+'</td><td>'+c.itemPreesupuestario+"-"+c.nombreItem+'</td><td><center>'+parseFloat(c.enero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.febrero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.marzo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.abril).toFixed(2)+'</center></td><td><center>'+parseFloat(c.mayo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.junio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.julio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.agosto).toFixed(2)+'</center></td><td><center>'+parseFloat(c.septiembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.octubre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.noviembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.diciembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.totalSumaItem).toFixed(2)+'</center></td></tr>');


				}

				execelGenerados($(".excelProyectos"),"tablaPoaPrincipal","poa");

				verOjoContrasenas2($(".ver__Tabla"),$(".icono__boton"),$(".elementosCreados__M"),$(".letras__ver__poa"));

				if (!$("#indicador__creaciones").length > 0 ) {

					$(".contenedor__bodyCMatriz").append('<div class="col col-12 text-center" style="font-size:14px; font-weight:bold;" id="indicador__creaciones">Indicadores</div><br><br>');

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Actividad - indicador</div><div class="col col-2 text-center" style="font-weight:bold;">Primer trimestre</div><div class="col col-1 text-center" style="font-weight:bold;">Segundo Trimestre</div><div class="col col-1 text-center" style="font-weight:bold;">Tercer trimestre</div><div class="col col-2 text-center" style="font-weight:bold;">Cuarto trimestre</div><div class="col col-2 text-center" style="font-weight:bold;">Meta indicador</div>');

					for (z of indicadorInformacion) {

						$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center">'+z.indicador+'</div><div class="col col-2 text-center">'+z.primertrimestre+'</div><div class="col col-1 text-center">'+z.segundotrimestre+'</div><div class="col col-1 text-center">'+z.tercertrimestre+'</div><div class="col col-2 text-center">'+z.cuartotrimestre+'</div><div class="col col-2 text-center">'+z.metaindicador+'</div>');


					}				


				}

				if (obtenerAcCa!="") {

					if (!$("#rotulo__ac").length > 0 ) {

						$(".contenedor__bodyCMatriz").append('<div class="col col-12 text-center" id="rotulo__ac" style="font-size:14px; font-weight:bold;">ACTIVIDADES A ANALIZAR</div><br><br>');

					}

					for (d of obtenerAcCa) {

						if (!$(".ver__matrices"+d.idActividades).length > 0 ) {
						  

							$(".contenedor__bodyCMatriz").append('<div class="col col-6 letras__ver__poa__2 text-center" style="font-weight:bold; font-size:12px; ; margin-bottom:2em;">'+d.idActividades+"-"+d.nombreActividades+'</div><div class="col col-6"><button class="ver__matrices'+d.idActividades+' btn btn-info" attr="'+d.idActividades+'" style="cursor:pointer;"><i class="fas fa-eye icono__'+d.idActividades+'"></i></button></div><br><div class="col col-12 matrices__'+d.idActividades+' row"></div>');

							verOjoAjaxMatrices($(".ver__matrices"+d.idActividades),$(".icono__"+d.idActividades),$(".matrices__"+d.idActividades),d.idActividades,d.idOrganismo,$("#idRolAd").val(),$("#fisicamenteE").val(),true);

						}						

					}


				}

				


			});

		},
		error:function(){

		}
				
	});		



  });

}

/*=====  End of Modificaciones recibidas planificacion  ======*/


/*====================================================
=            General Tramites reasignados            =
====================================================*/

var funcion__datatabletsReasignarTraGene=function(tbody,table,parametro3,parametro4,parametro5){

  $(tbody).on("click","button.reasignarTramites",function(e){

  	e.preventDefault();

  	var data=table.row($(this).parents("tr")).data();

  	$(".idOrganismoM").val(data[7]);

  	$("#enviarTramite").hide();
  	
  	var idOrganismo=$(".idOrganismoM").val();

  	var fisicamenteE=$("#fisicamenteE").val();

  	var idRolAd=$("#idRolAd").val();

	var paqueteDeDatos = new FormData();

	paqueteDeDatos.append('tipo','informacioSubsess');

	paqueteDeDatos.append('idOrganismo',idOrganismo);

	paqueteDeDatos.append('fisicamenteE',fisicamenteE);

	paqueteDeDatos.append('idRolAd',idRolAd);


	$.ajax({

		type:"POST",
		url:"modelosBd/inserta/seleccionaAcciones.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

			$.getScript("layout/scripts/js/validaGlobal.js",function(){

				var elementos=JSON.parse(response);

				var obtenerInformacion=elementos['obtenerInformacion'];
				var obtenerAcCa=elementos['obtenerAcCa'];
				var indicadorInformacion=elementos['indicadorInformacion'];

				$(".titulo__mS").text(data[1]);

				$(".contenedor__bodyCMatriz").append(' ');

				$(".elementosCreados__M").remove();

				$(".creados__letter").remove();


				$(".contenedor__bodyCMatriz").append('<div class="col col-6 letras__ver__poa__na text-center creados__letter" style="font-weight:bold; font-size:15px;">Ver POA</div><div class="col col-6"><button class="ver__Tabla btn btn-primary creados__letter" style="cursor:pointer;"><i class="fas fa-eye icono__boton"></i></button></div>');



				$(".contenedor__bodyCMatriz").append('<button type="button" class="btn btn-success excelProyectos col col-1 elementosCreados__M"><i class="fas fa-file-excel"></i>&nbsp;&nbsp;EXCEL</button><table class="tabla__itemsM elementosCreados__M" style="margin-top:2em;" id="tablaPoaPrincipal"><thead><tr><th align="center">Actividad</th><th align="center">Item</th><th align="center">Enero</th><th align="center">Febrero</th><th align="center">Marzo</th><th align="center">Abril</th><th align="center">Mayo</th><th align="center">Junio</th><th align="center">Julio</th><th align="center">Agosto</th><th align="center">Septiembre</th><th align="center">Octubre</th><th align="center">Noviembre</th><th align="center">Diciembre</th><th align="center">Total</th></tr></thead></table><br><br>');

				$(".elementosCreados__M").hide();

				for (c of obtenerInformacion) {

					$(".tabla__itemsM").append('<tr><td>'+c.idActividades+"-"+c.nombreActividades+'</td><td>'+c.itemPreesupuestario+"-"+c.nombreItem+'</td><td><center>'+parseFloat(c.enero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.febrero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.marzo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.abril).toFixed(2)+'</center></td><td><center>'+parseFloat(c.mayo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.junio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.julio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.agosto).toFixed(2)+'</center></td><td><center>'+parseFloat(c.septiembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.octubre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.noviembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.diciembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.totalSumaItem).toFixed(2)+'</center></td></tr>');


				}

				execelGenerados($(".excelProyectos"),"tablaPoaPrincipal","poa");

				verOjoContrasenas2($(".ver__Tabla"),$(".icono__boton"),$(".elementosCreados__M"),$(".letras__ver__poa"));

				if (!$(".sumado__indicadores").length > 0 ) {

					$(".contenedor__bodyCMatriz").append('<div class="col col-12 text-center sumado__indicadores" style="font-size:14px; font-weight:bold;">Indicadores</div><br><br>');

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Actividad - indicador</div><div class="col col-2 text-center" style="font-weight:bold;">Primer trimestre</div><div class="col col-1 text-center" style="font-weight:bold;">Segundo Trimestre</div><div class="col col-1 text-center" style="font-weight:bold;">Tercer trimestre</div><div class="col col-2 text-center" style="font-weight:bold;">Cuarto trimestre</div><div class="col col-2 text-center" style="font-weight:bold;">Meta indicador</div>');


					for (z of indicadorInformacion) {

						$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center">'+z.indicador+'</div><div class="col col-2 text-center">'+z.primertrimestre+'</div><div class="col col-1 text-center">'+z.segundotrimestre+'</div><div class="col col-1 text-center">'+z.tercertrimestre+'</div><div class="col col-2 text-center">'+z.cuartotrimestre+'</div><div class="col col-2 text-center">'+z.metaindicador+'</div>');


					}				


					if (data[9]!=null && data[9]!="") {

						$(".contenedor__bodyCMatriz").append('<div class="col col-12 text-center" style="font-size:14px; font-weight:bold;">Documentos anexos</div><br><br>');

						var arreglo = data[9].split("_________");

						for (var i = 0 ; i<arreglo.length; i++) {
							

							$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center"><a href="documentos/anexosPoa/'+arreglo[i]+'" target="_blank">'+arreglo[i]+'</a></div>');

						}


					}

				}

				if (obtenerAcCa!="") {

					if (!$("#rotulo__ac").length > 0 ) {


						$(".contenedor__bodyCMatriz").append('<div class="col col-12 text-center" style="font-size:14px; font-weight:bold;" id="rotulo__ac">ACTIVIDADES A ANALIZAR</div><br><br>');

					}

					for (d of obtenerAcCa) {

						if (!$(".ver__matrices"+d.idActividades).length > 0 ) {

							$(".contenedor__bodyCMatriz").append('<div class="col col-6 letras__ver__poa text-center" style="font-weight:bold; font-size:12px; ; margin-bottom:2em;">'+d.idActividades+"-"+d.nombreActividades+'</div><div class="col col-6"><button class="ver__matrices'+d.idActividades+' btn btn-info" attr="'+d.idActividades+'" style="cursor:pointer;"><i class="fas fa-eye icono__'+d.idActividades+'"></i></button></div><br><div class="col col-12 matrices__'+d.idActividades+' row"></div>');

							verOjoAjaxMatrices($(".ver__matrices"+d.idActividades),$(".icono__"+d.idActividades),$(".matrices__"+d.idActividades),d.idActividades,d.idOrganismo,$("#idRolAd").val(),$("#fisicamenteE").val());

						}

					}


				}

				


			});

		},
		error:function(){

		}
				
	});		



  });

}


/*=====  End of General Tramites reasignados  ======*/


/*===========================================================
=            Reasigna coordinaciones financieras            =
===========================================================*/

var funcion__datatabletsReasignarTraFinan=function(tbody,table,parametro3,parametro4,parametro5){

  $(tbody).on("click","button.reasignarTramites",function(e){

  	e.preventDefault();

  	var data=table.row($(this).parents("tr")).data();

  	$(".idOrganismoM").val(data[7]);

  
  	var idOrganismo=$(".idOrganismoM").val();

  	var fisicamenteE=$("#fisicamenteE").val();

	var paqueteDeDatos = new FormData();

	paqueteDeDatos.append('tipo','informacioSubsessFinan');

	paqueteDeDatos.append('idOrganismo',idOrganismo);

	paqueteDeDatos.append('fisicamenteE',fisicamenteE);

	$.ajax({

		type:"POST",
		url:"modelosBd/inserta/seleccionaAcciones.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

			$.getScript("layout/scripts/js/validaGlobal.js",function(){

				var elementos=JSON.parse(response);

				var obtenerInformacion=elementos['obtenerInformacion'];
				var obtenerAcCa=elementos['obtenerAcCa'];

				var obtenerInformacionPre=elementos['obtenerInformacionPre'];

				var obtenerInformacionObservaciones=elementos['obtenerInformacionObservaciones'];

				var indicadorInformacion=elementos['indicadorInformacion'];

				$(".titulo__mS").text(data[1]);

				$(".contenedor__bodyCMatriz").append(' ');

				$(".elementosCreados__M").remove();

				$(".creados__letter").remove();


				$(".contenedor__bodyCMatriz").append('<div class="col col-6 letras__ver__poa text-center creados__letter" style="font-weight:bold; font-size:15px;">Ver POA</div><div class="col col-6"><button class="ver__Tabla btn btn-primary creados__letter" style="cursor:pointer;"><i class="fas fa-eye icono__boton"></i></button></div>');


				$(".contenedor__bodyCMatriz").append('<button type="button" class="btn btn-success excelProyectos col col-1 elementosCreados__M"><i class="fas fa-file-excel"></i>&nbsp;&nbsp;EXCEL</button><table class="tabla__itemsM elementosCreados__M" style="margin-top:2em;" id="tablaPoaPrincipal"><thead><tr><th align="center">Actividad</th><th align="center">Item</th><th align="center">Enero</th><th align="center">Febrero</th><th align="center">Marzo</th><th align="center">Abril</th><th align="center">Mayo</th><th align="center">Junio</th><th align="center">Julio</th><th align="center">Agosto</th><th align="center">Septiembre</th><th align="center">Octubre</th><th align="center">Noviembre</th><th align="center">Diciembre</th><th align="center">Total</th></tr></thead></table><br><br>');

				$(".elementosCreados__M").hide();


				for (c of obtenerInformacion) {

					$(".tabla__itemsM").append('<tr><td>'+c.idActividades+"-"+c.nombreActividades+'</td><td>'+c.itemPreesupuestario+"-"+c.nombreItem+'</td><td><center>'+parseFloat(c.enero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.febrero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.marzo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.abril).toFixed(2)+'</center></td><td><center>'+parseFloat(c.mayo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.junio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.julio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.agosto).toFixed(2)+'</center></td><td><center>'+parseFloat(c.septiembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.octubre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.noviembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.diciembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.totalSumaItem).toFixed(2)+'</center></td></tr>');


				}

				execelGenerados($(".excelProyectos"),"tablaPoaPrincipal","poa");

				verOjoContrasenas2($(".ver__Tabla"),$(".icono__boton"),$(".elementosCreados__M"),$(".letras__ver__poa"));


				if (data[9]!=null && data[9]!="") {

					$(".contenedor__bodyCMatriz").append('<div class="col col-12 text-center" style="font-size:14px; font-weight:bold;">Documentos anexos</div><br><br>');

					var arreglo = data[9].split("_________");

					let contador__Doc=0;

					let banderaDi=false;

					for (var i = 0 ; i<arreglo.length; i++) {


						$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center doc__anexos" id="doc__fila'+contador__Doc+'"><a href="documentos/anexosPoa/'+arreglo[i]+'" target="_blank" id="enlace__'+contador__Doc+'">Documento '+(i+1)+": "+arreglo[i]+'</a></div>');


						if(banderaDi==false){

							$("#doc__fila"+i).attr('style','background-color: rgba(33,42,92,.95)!important;');

							$("#enlace__"+i).attr('style','color:white;');

							banderaDi=true;

						}else{

							$("#doc__fila"+i).attr('style','background-color: var(--bs-white)!important;');

							$("#enlace__"+i).attr('style','color:#212121;');

							banderaDi=false;

						}
						

						contador__Doc++;

					}


				}

				$(".contenedor__bodyCMatriz").append('<div class="col col-12 text-center" style="font-size:14px; font-weight:bold;">Planificación de indicadores</div><br><br>');

				

				for (dLCIn of indicadorInformacion) {

					$(".contenedor__bodyCMatriz").append('<div class="col col-12 text-center mb-0" style="font-weight:bold; text-align:justify; color: rgba(33,42,92,.95);">'+dLCIn.indicador+'</div><hr><div class="col col-2" style="">I Trimestre: '+dLCIn.primertrimestre+'</div><div class="col col-2" style="">II Trimestre: '+dLCIn.segundotrimestre+'</div><div class="col col-2" style="">III Trimestre: '+dLCIn.tercertrimestre+'</div><div class="col col-2" style="">IV Trimestre: '+dLCIn.cuartotrimestre+'</div><div class="col col-4" style="">Meta Anual del indicador: '+dLCIn.metaindicador+'</div><br><br>');

				}

				

				if (obtenerAcCa!="") {


					$(".contenedor__bodyCMatriz").append('<div class="col col-12 text-center" style="font-size:14px; font-weight:bold;">ACTIVIDADES A ANALIZAR</div><br><br>');

					for (d of obtenerAcCa) {

						$(".contenedor__bodyCMatriz").append('<div class="col col-6 letras__ver__poa text-center" style="font-weight:bold; font-size:12px; ; margin-bottom:2em;">'+d.idActividades+"-"+d.nombreActividades+'</div><div class="col col-6"><button class="ver__matrices'+d.idActividades+' btn btn-info" attr="'+d.idActividades+'" style="cursor:pointer;"><i class="fas fa-eye icono__'+d.idActividades+'"></i></button></div><br><div class="col col-12 matrices__'+d.idActividades+' row"></div>');

						verOjoAjaxMatrices($(".ver__matrices"+d.idActividades),$(".icono__"+d.idActividades),$(".matrices__"+d.idActividades),d.idActividades,d.idOrganismo,$("#idRolAd").val(),$("#fisicamenteE").val());

					}


				}

				if (obtenerInformacionObservaciones!="") {

					$(".contenedor__bodyCMatriz").append('<div class="col col-12 text-center" style="font-weight:bold;">SECCIÓN DE OBSERVACIONES</div><br>');


					for (dLC of obtenerInformacionObservaciones) {

						$(".contenedor__bodyCMatriz").append('<div class="row col col-12" style="margin-left:5%;"><div class="col col-4">Observación realizada por '+dLC.nombreCompleto+':</div><div class="col col-8">'+dLC.observaciones+'</div></div>');

					}

					$(".contenedor__bodyCMatriz").append('<div></div><br><br>');


				}

				console.log(data);

				var idRolE=$("#idRolAd").val();

				if($("#idRolAd").val()==3){

					$(".contenedor__bodyCMatriz").append('<br><br><div class="col col-8 text-center d d-flex justify-content-center align-items:center" style="font-weight:bold">Si desea devolver el trámite dar click en el check&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="checksDesicion" name="checksDesicion" style="width:20px; height:20px;"></div><br><br>');


					$(".contenedor__bodyCMatriz").append('<div class="col col-12 row contenedor__reasignaciones"><div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-6"><select class="alto__fisiR ancho__total__input__selects"></select></div><div class="col col-2"><button class="btn btn-primary enviar__rFuncionarios">Reasignar</button></div><br><br><div class="col col-4 text-center mt-4 observaciones__nestD" style="font-weight:bold;">Detalle observaciones (solo en caso de ser necesario)</div><div class="col col-8 mt-4 observaciones__nestD"><textarea class="detalle__observaPri ancho__total__textareas" placeholder="Detalle observaciones en caso de ser necesario"></textarea></div></div>');

				}else if((fisicamenteE==27 || fisicamenteE==28 || fisicamenteE==29 || fisicamenteE==30 || fisicamenteE==31 || fisicamenteE==32 || fisicamenteE==33) && idRolE==3){

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

					subsecretariasSelectorCorFun($(".alto__fisiR"),$("#idUsuarioC").val(),"insta");

				}else if((fisicamenteE==27 || fisicamenteE==28 || fisicamenteE==29 || fisicamenteE==30 || fisicamenteE==31 || fisicamenteE==32 || fisicamenteE==33) && idRolE==4){

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

					subsecretariasSelectorCorFunCorFin($(".alto__fisiR"),$("#idUsuarioC").val(),"insta");

				}else if (fisicamenteE==26) {

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

					subsecretariasSelector($(".alto__fisiR"),$("#idUsuarioC").val());

				}else if(fisicamenteE==24){


					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

					subsecretariasSelectorDos($(".alto__fisiR"),$("#idUsuarioC").val());


				}else if(fisicamenteE==1){

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR" multiple="multiple"  style="width:100%!important; height:400px!important;"></select></div>');

					subsecretariasSelectorIntras($(".alto__fisiR"),$("#idUsuarioC").val());


				}else if(fisicamenteE==2){

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR" multiple="multiple"  style="width:100%!important; height:200px!important;"></select></div>');

					subsecretariasSelectorFinancieros($(".alto__fisiR"),$("#idUsuarioC").val());


				}else if($("#idRolAd").val()!=3){

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

					funcionarios__normales($(".alto__fisiR"),$("#idUsuarioC").val());

				}


				if ($("#idRolAd").val()!=3) {

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center mt-4" style="font-weight:bold;">Detalle observaciones (solo en caso de ser necesario)</div><div class="col col-8 mt-4"><textarea class="detalle__observaPri ancho__total__textareas" placeholder="Detalle observaciones en caso de ser necesario"></textarea></div>');

				}


				if ($("#idRolAd").val()==3 && ($("#fisicamenteE").val()==27 ||  $("#fisicamenteE").val()==28 || $("#fisicamenteE").val()==29 || $("#fisicamenteE").val()==30 || $("#fisicamenteE").val()==31 || $("#fisicamenteE").val()==32 || $("#fisicamenteE").val()==33)) {


					$(".contenedor__bodyCMatriz").append('<br><form class="col col-12 row generarDocumento" id="generarDocumento" action="modelosBd/pdf/pdf.modelo.php"  method="post"><input type="hidden" id="tipoDocumento" name="tipoDocumento" value="zonalFinan"/><input type="hidden" id="tipoPdf" name="tipoPdf" value="informeTecnico"><input type="hidden" id="idUsuarioEn" name="idUsuarioEn" /><input type="hidden" id="idOrganismo" name="idOrganismo" /><input type="hidden" id="fisicamenteEn" name="fisicamenteEn" /><table class="col col-12"><thead><tr><th  align="center">N</th><th  align="center">CONDICIÓN</th><th  align="center">CUMPLE</th><th  align="center">OBSERVACIONES PARA LA ORGANIZACIÓN DEPORTIVA</th></tr></thead><tbody><tr><td align="center">1</td><td align="left">Presenta el  Informe de justificación del gasto operativo y de mantenimiento en escenarios deportivos que debe contener el cuadro comparativo como estudio de mercado respaldado por 3 cotizaciones, el registro fotográfico, así como la documentación de la legalidad del predio.</td><td><select class="gastoOperativo obligatorios__tabla ancho__total__input__selects" name="gastoOperativo"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_gastoOperativo" class="text_gastoOperativo ancho__total__textareas"></textarea></td></tr><tr><td align="center">2</td><td align="left">Mantiene concordancia  la descripción del escenario o infraestructura y demás campos correspondiente a su mantenimiento.</td><td><select class="descripcionCon obligatorios__tabla ancho__total__input__selects" name="descripcionCon"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_descripcionCon" class="text_descripcionCon ancho__total__textareas"></textarea></td></tr><tr><td align="center">3</td><td align="left">La descripción de materiales o servicios para el mantenimiento es completa y adecuada para el tipo de mantenimiento.</td><td><select class="descripMate obligatorios__tabla ancho__total__input__selects" name="descripMate"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_descripMate" class="text_descripMate ancho__total__textareas"></textarea></td></tr><tr><td align="center">4</td><td align="left">Detalla satisfactoriamente la contratación o  adquisición de bienes o servicios.</td><td><select class="adquiBienes obligatorios__tabla ancho__total__input__selects" name="adquiBienes"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_adquiBienes" class="text_adquiBienes ancho__total__textareas"></textarea></td></tr><tr><td align="center">5</td><td align="left">Justifica satisfactoriamente la contratación o adquisición del bien o servicio.</td><td><select class="justificaCrea obligatorios__tabla ancho__total__input__selects" name="justificaCrea"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_justificaCrea" class="text_justificaCrea ancho__total__textareas"></textarea></td></tr><tr><td align="center">6</td><td align="left">Describe satisfactoriamente los bienes y servicios que se adquirirán de acuerdo a su tipo o característica (contratación pública, pago de impuestos y tasas).</td><td><select class="bienesImpuestos obligatorios__tabla ancho__total__input__selects" name="bienesImpuestos"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_bienesImpuestos" class="text_bienesImpuestos ancho__total__textareas"></textarea></td></tr><tr><td align="center">7</td><td align="left">El monto de la contratación o adquisición del bien o servicio es igual o inferior al monto ejecutado el año anterior o el monto establecido en materia de contratación pública.</td><td><select class="montoIn obligatorios__tabla ancho__total__input__selects" name="montoIn"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_montoIn" class="text_montoIn ancho__total__textareas"></textarea></td></tr><tr><td align="center">8</td><td align="left">Presenta el reporte de inventarios de los vehículos, inmuebles, bienes de larga duración, bienes de control administrativo y existencias descargado de su sistema contable (donde conste toda la información financiera, fecha compra, descripción del bien, depreciación, valor en libros, saldos etc.) debidamente suscrito por el responsable financiero (contador/a) y el representante legal.</td><td><select class="reporteInven obligatorios__tabla ancho__total__input__selects" name="reporteInven"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_reporteInven" class="text_reporteInven ancho__total__textareas"></textarea></td></tr><tr><td align="center">9</td><td align="left">Presenta Plan de mantenimiento de vehículos, bienes muebles e inmuebles, maquinaria y equipo debidamente suscrito por el representante legal.</td><td><select class="planVehiculos obligatorios__tabla ancho__total__input__selects" name="planVehiculos"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_planVehiculos" class="text_planVehiculos ancho__total__textareas"></textarea></td></tr><tr><td align="center">10</td><td align="left">Presenta Declaración de Contrataciones y Adquisiciones donde conste el tipo de contratación pública de las actividades descritas en el POA y el trimestre en el que se contratará.</td><td><select class="declaracionCon obligatorios__tabla ancho__total__input__selects" name="declaracionCon"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_declaracionCon" class="text_declaracionCon ancho__total__textareas"></textarea></td></tr><tr><td align="center">11</td><td align="left">Presenta Informe de seguridad y riesgos de las instalaciones donde se describa los puntos de seguridad y vigilancia privada necesarios.</td><td><select class="informeSegu obligatorios__tabla ancho__total__input__selects" name="informeSegu"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_informeSegu" class="text_informeSegu ancho__total__textareas"></textarea></td></tr><tr><td align="center">12</td><td align="left">Presenta el informe debidamente suscrito por el representante legal, en el que se detalle qué tipo de servicio de limpieza requiere contratar y los metros cuadrados de la infraestructura administrativa anexando documentos de respaldo.</td><td><select class="legalDetalle obligatorios__tabla ancho__total__input__selects" name="legalDetalle"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_legalDetalle" class="text_legalDetalle ancho__total__textareas"></textarea></td></tr><tr><td align="center">13</td><td align="left">La planificación del  indicador tiene coherencia con el nombre del indicador y  se encuentra redactado en número entero.</td><td><select class="indicaCoherente obligatorios__tabla ancho__total__input__selects" name="indicaCoherente"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_indicaCoherente" class="text_indicaCoherente ancho__total__textareas"></textarea></td></tr><tr><td align="center">14</td><td align="left">Ejecuta la Planificación anual del personal administrativo y de servicios amparado en el Código de Trabajo.</td><td><select class="personalAdmin obligatorios__tabla ancho__total__input__selects" name="personalAdmin"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_personalAdmin" class="text_personalAdmin ancho__total__textareas"></textarea></td></tr><tr><td align="center">15</td><td align="left">Ejecuta la Planificación anual del personal administrativo, relacionado a Contratos Civiles de servicios profesionales.</td><td><select class="contratosCivi obligatorios__tabla ancho__total__input__selects" name="contratosCivi"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_contratosCivi" class="text_contratosCivi ancho__total__textareas"></textarea></td></tr><tr><td align="center">16</td><td align="left">La Organización Deportiva no ha creado nuevos puestos de trabajo administrativos y de servicios respecto del POA 2021 (Acta de certificación  suscrita por el responsable).</td><td><select class="nuevosServicios obligatorios__tabla ancho__total__input__selects" name="nuevosServicios"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_nuevosServicios" class="text_nuevosServicios ancho__total__textareas"></textarea></td></tr><tr><td align="center">17</td><td align="left">La Organización Deportiva no ha incrementado  Contratos Civiles de servicios profesionales de personal administrativo,  respecto del POA 2021 (Acta de certificación suscrita por el responsable).</td><td><select class="personalCertifi obligatorios__tabla ancho__total__input__selects" name="personalCertifi"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_personalCertifi" class="text_personalCertifi ancho__total__textareas"></textarea></td></tr><tr><td align="center">18</td><td align="left">La Organización Deportiva no incrementa la masa salarial relacionada al personal administrativo y de servicios respecto del POA 2021 (Acta de certificación suscrita por el responsable).</td><td><select class="masaAdmin obligatorios__tabla ancho__total__input__selects" name="masaAdmin"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_masaAdmin" class="text_masaAdmin ancho__total__textareas"></textarea></td></tr><tr><td align="center">19</td><td align="left">La Organización Deportiva no incrementa presupuesto relacionado a honorarios para Contratos Civiles de servicios profesionales de personal administrativo, respecto del POA 2021 (Acta de certificación suscrita por el responsable).</td><td><select class="honorariosIncre obligatorios__tabla ancho__total__input__selects" name="honorariosIncre"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_honorariosIncre" class="text_honorariosIncre ancho__total__textareas"></textarea></td></tr><tr><td align="center">20</td><td align="left">Si planificó servicios básicos verificar que en la matriz de suministro el número de suministro cuente con informe de aprobación del Ministerio del Deporte.</td><td><select class="matrizServicios obligatorios__tabla ancho__total__input__selects" name="matrizServicios"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_matrizServicios" class="text_matrizServicios ancho__total__textareas"></textarea></td></tr><tr><td align="center">21</td><td align="left">En caso que planifique seguros de bienes y vehículos presenta el listado de bienes o vehículos con la respectiva cobertura.</td><td><select class="segurosBienes obligatorios__tabla ancho__total__input__selects" name="segurosBienes"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_segurosBienes" class="text_segurosBienes ancho__total__textareas"></textarea></td></tr></tbody></table><br><div class="col col-12 text-center"><a class="btn btn-warning generar__caliFocal" style="cursor:pointer;"><i class="fas fa-save"></i>&nbsp;&nbsp;GENERAR CALIFICACIÓN</a></div><div class="row col col-12 columna__generadoraVe"><br><br><div class="col col-4" style="margin-top:2em!important;">OBSERVACIONES ADICIONALES:</div><div class="col col-8"><textarea style="margin-top:2em!important;" placeholder="Ingrese observaciones adicionales" name="observaAdicionales" class="ancho__total__textareas"></textarea></div><br><br><div class="col col-4" style="margin-top:2em!important;">CONCLUSIÓN:</div><div class="col col-8"><textarea style="margin-top:2em!important;" placeholder="Ingrese conclusión" name="conlcusion" id="conlcusion" class="ancho__total__textareas"></textarea></div><br><div class="col col-4 d d-flex justify-content-center" style="margin-top:2em!important;">Generar pdf</div><div class="col col-8 d d-flex justify-content-center" style="margin-top:2em!important;"><button type="submit" class="btn btn-warning">Generar&nbsp;&nbsp;<i class="fas fa-share-square"></i></button></div><br><div class="col col-4 d d-flex justify-content-center" style="margin-top:2em!important;">Subir pdf firmado electronicamente</div><div class="col col-8 d d-flex justify-content-center" style="margin-top:2em!important;"><input type="file" id="pdfArchivos" name="pdfArchivos"/></div></div></form>');

						segmentosSelectsCOncendidosPrimero($(".generar__caliFocal"),"select",$(".columna__generadoraVe"),$("#enviarTramite"));

						$(".columna__generadoraVe").hide();

						
				}

				if ($("#idRolAd").val()==3){

					$("#idOrganismo").val($(".idOrganismoM").val());

					$("#fisicamenteEn").val("cordinacionFinan");

					$("#idUsuarioEn").val($("#idUsuarioC").val());

					$("#enviarTramite").hide();
						
				}



				if($("#idRolAd").val()==3){

					funcionarios__normales($(".alto__fisiR"),$("#idUsuarioC").val());

					$(".observaciones__nestD").hide();

					$(".contenedor__reasignaciones").hide();

					segmentosSelectsCOncendidos($(".alto__fisiR"),$(".observaciones__nestD"));

					checkboxFunciones($("#checksDesicion"),$(".contenedor__reasignaciones"),$("#generarDocumento"));

				}

				enviarTramitesGeneradosFinans($("#enviarTramite"),[$("#idOrganismoM").val(),$("#fisicamenteE").val(),$("#idUsuarioC").val(),$(".alto__fisiR").val()],$(".alto__fisiR"),$(".detalle__observaPri"),$("#idRolAd").val(),"generarDocumento","N/A","N/A","tramiteFinan__coordinas");

				enviarTramitesGeneradosFinans($(".enviar__rFuncionarios"),[$("#idOrganismoM").val(),$("#fisicamenteE").val(),$("#idUsuarioC").val(),$(".alto__fisiR").val()],$(".alto__fisiR"),$(".detalle__observaPri"),$("#idRolAd").val(),"generarDocumento",false,"no__tramite");

			});

		},
		error:function(){

		}
				
	});		



  });

}


/*=====  End of Reasigna coordinaciones financieras  ======*/


/*=========================================================
=            Acciones reasignar coordinaciones            =
=========================================================*/

var funcion__datatabletsReasignarTraCoordinas=function(tbody,table,parametro3,parametro4,parametro5){

  $(tbody).on("click","button.reasignarTramites",function(e){

  	e.preventDefault();

  	var data=table.row($(this).parents("tr")).data();

  	$(".idOrganismoM").val(data[7]);

  
  	var idOrganismo=$(".idOrganismoM").val();

  	var fisicamenteE=$("#fisicamenteE").val();

	var paqueteDeDatos = new FormData();

	paqueteDeDatos.append('tipo','informacioSubsessCoordina');

	paqueteDeDatos.append('idOrganismo',idOrganismo);

	paqueteDeDatos.append('fisicamenteE',fisicamenteE);

	$.ajax({

		type:"POST",
		url:"modelosBd/inserta/seleccionaAcciones.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

			$.getScript("layout/scripts/js/validaGlobal.js",function(){

				var elementos=JSON.parse(response);

				var obtenerInformacion=elementos['obtenerInformacion'];
				var obtenerAcCa=elementos['obtenerAcCa'];

				var obtenerInformacionPre=elementos['obtenerInformacionPre'];

				var obtenerInformacionObservaciones=elementos['obtenerInformacionObservaciones'];


				var indicadorInformacion=elementos['indicadorInformacion'];

				$(".titulo__mS").text(data[1]);

				$(".contenedor__bodyCMatriz").append(' ');

				$(".elementosCreados__M").remove();

				$(".creados__letter").remove();


				if (!$(".anexos__descubiertos").length > 0 ) {


					$(".contenedor__bodyCMatriz").append('<div class="col col-6 letras__ver__poa text-center creados__letter" style="font-weight:bold; font-size:15px;">Ver POA</div><div class="col col-6"><button class="ver__Tabla btn btn-primary creados__letter" style="cursor:pointer;"><i class="fas fa-eye icono__boton"></i></button></div>');


					$(".contenedor__bodyCMatriz").append('<button type="button" class="btn btn-success excelProyectos col col-1 elementosCreados__M"><i class="fas fa-file-excel"></i>&nbsp;&nbsp;EXCEL</button><table class="tabla__itemsM elementosCreados__M" style="margin-top:2em;" id="tablaPoaPrincipal"><thead><tr><th align="center">Actividad</th><th align="center">Item</th><th align="center">Enero</th><th align="center">Febrero</th><th align="center">Marzo</th><th align="center">Abril</th><th align="center">Mayo</th><th align="center">Junio</th><th align="center">Julio</th><th align="center">Agosto</th><th align="center">Septiembre</th><th align="center">Octubre</th><th align="center">Noviembre</th><th align="center">Diciembre</th><th align="center">Total</th></tr></thead></table><br><br>');

					$(".elementosCreados__M").hide();


					for (c of obtenerInformacion) {

						$(".tabla__itemsM").append('<tr><td>'+c.idActividades+"-"+c.nombreActividades+'</td><td>'+c.itemPreesupuestario+"-"+c.nombreItem+'</td><td><center>'+parseFloat(c.enero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.febrero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.marzo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.abril).toFixed(2)+'</center></td><td><center>'+parseFloat(c.mayo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.junio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.julio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.agosto).toFixed(2)+'</center></td><td><center>'+parseFloat(c.septiembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.octubre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.noviembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.diciembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.totalSumaItem).toFixed(2)+'</center></td></tr>');


					}

					execelGenerados($(".excelProyectos"),"tablaPoaPrincipal","poa");

					verOjoContrasenas2($(".ver__Tabla"),$(".icono__boton"),$(".elementosCreados__M"),$(".letras__ver__poa"));

					if (data[9]!=null && data[9]!="") {

						$(".contenedor__bodyCMatriz").append('<div class="col col-12 text-center anexos__descubiertos" style="font-size:14px; font-weight:bold;">Documentos anexos</div><br><br>');

						var arreglo = data[9].split("_________");

						let contador__Doc=0;

						let banderaDi=false;

						for (var i = 0 ; i<arreglo.length; i++) {


							$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center doc__anexos" id="doc__fila'+contador__Doc+'"><a href="documentos/anexosPoa/'+arreglo[i]+'" target="_blank" id="enlace__'+contador__Doc+'">Documento '+(i+1)+": "+arreglo[i]+'</a></div>');


							if(banderaDi==false){

								$("#doc__fila"+i).attr('style','background-color: rgba(33,42,92,.95)!important;');

								$("#enlace__"+i).attr('style','color:white;');

								banderaDi=true;

							}else{

								$("#doc__fila"+i).attr('style','background-color: var(--bs-white)!important;');

								$("#enlace__"+i).attr('style','color:#212121;');

								banderaDi=false;

							}
							

							contador__Doc++;

						}


					}

				}


				if (!$(".planificador__indicadores").length > 0 ) {

					$(".contenedor__bodyCMatriz").append('<div class="col col-12 text-center planificador__indicadores" style="font-size:14px; font-weight:bold;">Planificación de indicadores</div><br><br>');

					

					for (dLCIn of indicadorInformacion) {

						$(".contenedor__bodyCMatriz").append('<div class="col col-12 text-center mb-0" style="font-weight:bold; text-align:justify; color: rgba(33,42,92,.95);">'+dLCIn.indicador+'</div><hr><div class="col col-2" style="">I Trimestre: '+dLCIn.primertrimestre+'</div><div class="col col-2" style="">II Trimestre: '+dLCIn.segundotrimestre+'</div><div class="col col-2" style="">III Trimestre: '+dLCIn.tercertrimestre+'</div><div class="col col-2" style="">IV Trimestre: '+dLCIn.cuartotrimestre+'</div><div class="col col-4" style="">Meta Anual del indicador: '+dLCIn.metaindicador+'</div><br><br>');

					}

				}


				if (!$(".analizas__actis").length > 0 ) {
				 
					if (obtenerAcCa!="") {


						$(".contenedor__bodyCMatriz").append('<div class="col col-12 text-center analizas__actis" style="font-size:14px; font-weight:bold;">ACTIVIDADES A ANALIZAR</div><br><br>');

						for (d of obtenerAcCa) {

							$(".contenedor__bodyCMatriz").append('<div class="col col-6 letras__ver__poa text-center" style="font-weight:bold; font-size:12px; ; margin-bottom:2em;">'+d.idActividades+"-"+d.nombreActividades+'</div><div class="col col-6"><button class="ver__matrices'+d.idActividades+' btn btn-info" attr="'+d.idActividades+'" style="cursor:pointer;"><i class="fas fa-eye icono__'+d.idActividades+'"></i></button></div><br><div class="col col-12 matrices__'+d.idActividades+' row"></div>');

							verOjoAjaxMatrices($(".ver__matrices"+d.idActividades),$(".icono__"+d.idActividades),$(".matrices__"+d.idActividades),d.idActividades,d.idOrganismo,$("#idRolAd").val(),$("#fisicamenteE").val());

						}


					}


				}

				if (!$(".observaciones__in").length > 0 ) {


				if (obtenerInformacionObservaciones!="") {

					$(".contenedor__bodyCMatriz").append('<div class="col col-12 text-center observaciones__in" style="font-weight:bold;">SECCIÓN DE OBSERVACIONES</div><br>');


					for (dLC of obtenerInformacionObservaciones) {

						$(".contenedor__bodyCMatriz").append('<div class="row col col-12" style="margin-left:5%;"><div class="col col-4">Observación realizada por '+dLC.nombreCompleto+':</div><div class="col col-8">'+dLC.observaciones+'</div></div>');

					}

					$(".contenedor__bodyCMatriz").append('<div></div><br><br>');


				}

				}


				console.log(data);

				var idRolE=$("#idRolAd").val();


				if (!$("#checksDesicion").length > 0 ) {

				if($("#idRolAd").val()==3){

					$(".contenedor__bodyCMatriz").append('<br><br><div class="col col-8 text-center d d-flex justify-content-center align-items:center" style="font-weight:bold">Si desea devolver el trámite dar click en el check&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="checksDesicion" name="checksDesicion" style="width:20px; height:20px;"></div><br><br>');


					$(".contenedor__bodyCMatriz").append('<div class="col col-12 row contenedor__reasignaciones"><div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-6"><select class="alto__fisiR ancho__total__input__selects"></select></div><div class="col col-2"><button class="btn btn-primary enviar__rFuncionarios">Reasignar</button></div><br><br><div class="col col-4 text-center mt-4 observaciones__nestD" style="font-weight:bold;">Detalle observaciones (solo en caso de ser necesario)</div><div class="col col-8 mt-4 observaciones__nestD"><textarea class="detalle__observaPri ancho__total__textareas" placeholder="Detalle observaciones en caso de ser necesario"></textarea></div></div>');

				}else if((fisicamenteE==27 || fisicamenteE==28 || fisicamenteE==29 || fisicamenteE==30 || fisicamenteE==31 || fisicamenteE==32 || fisicamenteE==33) && idRolE==3){

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

					subsecretariasSelectorCorFun($(".alto__fisiR"),$("#idUsuarioC").val(),"insta");

				}else if((fisicamenteE==27 || fisicamenteE==28 || fisicamenteE==29 || fisicamenteE==30 || fisicamenteE==31 || fisicamenteE==32 || fisicamenteE==33) && idRolE==4){

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

					subsecretariasSelectorSucenrFin($(".alto__fisiR"),$("#idUsuarioC").val(),"insta");

				}else if (fisicamenteE==26) {

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

					subsecretariasSelector($(".alto__fisiR"),$("#idUsuarioC").val());

				}else if(fisicamenteE==24){


					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

					subsecretariasSelectorDos($(".alto__fisiR"),$("#idUsuarioC").val());


				}else if(fisicamenteE==1){

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR" multiple="multiple"  style="width:100%!important; height:400px!important;"></select></div>');

					subsecretariasSelectorIntras($(".alto__fisiR"),$("#idUsuarioC").val());


				}else if(fisicamenteE==2){

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR" multiple="multiple"  style="width:100%!important; height:200px!important;"></select></div>');

					subsecretariasSelectorFinancieros($(".alto__fisiR"),$("#idUsuarioC").val());


				}else if($("#idRolAd").val()!=3){

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

					funcionarios__normales($(".alto__fisiR"),$("#idUsuarioC").val());

				} 



				if ($("#idRolAd").val()!=3) {

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center mt-4" style="font-weight:bold;">Detalle observaciones (solo en caso de ser necesario)</div><div class="col col-8 mt-4"><textarea class="detalle__observaPri ancho__total__textareas" placeholder="Detalle observaciones en caso de ser necesario"></textarea></div>');

				}


				}


				if (!$(".generarDocumento").length > 0 ) {


				if ($("#idRolAd").val()==3 && ($("#fisicamenteE").val()==27 ||  $("#fisicamenteE").val()==28 ||  $("#fisicamenteE").val()==29 ||  $("#fisicamenteE").val()==30 ||  $("#fisicamenteE").val()==31 ||  $("#fisicamenteE").val()==32 ||  $("#fisicamenteE").val()==33)) {



					$(".contenedor__bodyCMatriz").append('<br><form class="col col-12 row generarDocumento" id="generarDocumento" action="modelosBd/pdf/pdf.modelo.php"  method="post"><input type="hidden" id="tipoDocumento" name="tipoDocumento" value="subFisica"/><input type="hidden" id="tipoPdf" name="tipoPdf" value="informeTecnico"><input type="hidden" id="idUsuarioEn" name="idUsuarioEn" /><input type="hidden" id="idOrganismo" name="idOrganismo" /><input type="hidden" id="fisicamenteEn" name="fisicamenteEn" /><table class="col col-12"><thead><tr><th  align="center">N</th><th  align="center">CONDICIÓN</th><th  align="center">CUMPLE</th><th  align="center">OBSERVACIONES PARA LA ORGANIZACIÓN DEPORTIVA</th></tr></thead><tbody><tr><td align="center">1</td><td align="left">La meta anual del indicador coincide  con el No. de eventos planificados  en el PDA</td><td><select class="numerosEventosPlanificadosPda obligatorios__tabla ancho__total__input__selects" name="numerosEventosPlanificadosPda"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_numerosEventosPlanificadosPda" class="text_numerosEventosPlanificadosPda ancho__total__textareas text_verificados"></textarea></td></tr><tr><td align="center">2</td><td align="left">Utiliza la sintaxis clara (verbos en infinitivo) para el registro de los eventos</td><td><select class="sintaxis__clara obligatorios__tabla ancho__total__input__selects" name="sintaxis__clara"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_sintaxis__clara" class="text_sintaxis__clara ancho__total__textareas text_verificados"></textarea></td></tr><tr><td align="center">3</td><td align="left">Presenta el certificado de validación de eventos, registrados en el PDA suscrito por el director técnico metodológico (solo provinciales)</td><td><select class="validacionEventos obligatorios__tabla ancho__total__input__selects" name="validacionEventos"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_validacionEventos" class="text_numerosEventosPlanificadosPda ancho__total__textareas text_verificados"></textarea></td></tr><tr><td align="center">4</td><td align="left">Detalla satisfactoriamente la contratación o  adquisición de bienes o servicios orientados al fomento deportivo de acuerdo a la característica del deporte (implementación deportiva) con la debida justificación técnica</td><td><select class="detalleContratacion obligatorios__tabla ancho__total__input__selects" name="detalleContratacion"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_detalleContratacion" class="text_detalleContratacion ancho__total__textareas text_verificados"></textarea></td></tr><tr><td align="center">5</td><td align="left">No se han incrementado nuevos puestos de trabajo de técnicos en relación de dependencia con respecto al POA OD 2021</td><td><select class="nuevosPuestos obligatorios__tabla ancho__total__input__selects" name="nuevosPuestos"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_nuevosPuestos" class="text_nuevosPuestos ancho__total__textareas text_verificados"></textarea></td></tr><tr><td align="center">6</td><td align="left">Justifica satisfactoriamente la contratación de personal técnico bajo la modalidad de contratos de servicios de honorarios profesionales</td><td><select class="justificaTecnico obligatorios__tabla ancho__total__input__selects" name="justificaTecnico"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_justificaTecnico" class="text_justificaTecnico ancho__total__textareas text_verificados"></textarea></td></tr><tr><td align="center">7</td><td align="left">En caso que planifique bienes de larga duración presenta el informe justificado de acuerdo a la característica del deporte para implementación deportiva, equipos tecnológicos y electrónicos</td><td><select class="bienesLarga obligatorios__tabla ancho__total__input__selects" name="bienesLarga"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_bienesLarga" class="text_bienesLarga ancho__total__textareas text_verificados"></textarea></td></tr><tr><td align="center">8</td><td align="left">Planifica seguros contra accidentes, vida y de salud para los deportistas que participarán en los eventos deportivos.</td><td><select class="seguroAccidentes obligatorios__tabla ancho__total__input__selects" name="seguroAccidentes"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_seguroAccidentes" class="text_seguroAccidentes ancho__total__textareas text_verificados"></textarea></td></tr><tr><td align="center">9</td><td align="left">Detalla las especificaciones de la implementación y equipamiento deportivo que sea adquirido por cada deporte beneficiario y demuestre la no duplicidad en el presente año fiscal</td><td><select class="detalleImplementacion obligatorios__tabla ancho__total__input__selects" name="detalleImplementacion"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_detalleImplementacion" class="text_detalleImplementacion ancho__total__textareas text_verificados"></textarea></td></tr><tr><td align="center">10</td><td align="left">La Planificación Operativa Anual del Organismo Deportivo se encuentra enmarcada en lo establecido en el Acuerdo Ministerial 456 y el Acuerdo Ministerial 457</td><td><select class="acuerdoEnmarcado obligatorios__tabla ancho__total__input__selects" name="acuerdoEnmarcado"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_acuerdoEnmarcado" class="text_acuerdoEnmarcado ancho__total__textareas text_verificados"></textarea></td></tr></tbody></table><br><div class="col col-12 text-center"><a class="btn btn-warning generar__caliFocal" style="cursor:pointer;"><i class="fas fa-save"></i>&nbsp;&nbsp;GENERAR CALIFICACIÓN</a></div><div class="row col col-12 columna__generadoraVe"><br><br><div class="col col-4" style="margin-top:2em!important;">OBSERVACIONES ADICIONALES:</div><div class="col col-8"><textarea style="margin-top:2em!important;" placeholder="Ingrese observaciones adicionales" name="observaAdicionales" class="ancho__total__textareas"></textarea></div><br><br><div class="col col-4" style="margin-top:2em!important;">CONCLUSIÓN:</div><div class="col col-8"><textarea style="margin-top:2em!important;" placeholder="Ingrese conclusión" name="conlcusion" id="conlcusion" class="ancho__total__textareas"></textarea></div><br><div class="col col-4 d d-flex justify-content-center" style="margin-top:2em!important;">Generar pdf</div><div class="col col-8 d d-flex justify-content-center" style="margin-top:2em!important;"><button type="submit" class="btn btn-warning">Generar&nbsp;&nbsp;<i class="fas fa-share-square"></i></button></div><br><div class="col col-4 d d-flex justify-content-center" style="margin-top:2em!important;">Subir pdf firmado electronicamente</div><div class="col col-8 d d-flex justify-content-center" style="margin-top:2em!important;"><input type="file" id="pdfArchivos" name="pdfArchivos"/></div></div></form>');

						segmentosSelectsCOncendidosPrimero($(".generar__caliFocal"),"select",$(".columna__generadoraVe"),$("#enviarTramite"));

						$(".columna__generadoraVe").hide();

						
				}

				}



				if ($("#idRolAd").val()==3){

					$("#idOrganismo").val($(".idOrganismoM").val());

					$("#fisicamenteEn").val("subsecretariaSubse");

					$("#idUsuarioEn").val($("#idUsuarioC").val());

					$("#enviarTramite").hide();
						
				}



				if($("#idRolAd").val()==3){

					funcionarios__normales($(".alto__fisiR"),$("#idUsuarioC").val());

					$(".observaciones__nestD").hide();

					$(".contenedor__reasignaciones").hide();

					segmentosSelectsCOncendidos($(".alto__fisiR"),$(".observaciones__nestD"));

					checkboxFunciones($("#checksDesicion"),$(".contenedor__reasignaciones"),$("#generarDocumento"));

				}

				enviarTramitesGeneradosSubsess($("#enviarTramite"),[$("#idOrganismoM").val(),$("#fisicamenteE").val(),$("#idUsuarioC").val(),$(".alto__fisiR").val()],$(".alto__fisiR"),$(".detalle__observaPri"),$("#idRolAd").val(),"generarDocumento","N/A","N/A","corrdinacionSubsecc");

				enviarTramitesGeneradosSubsess($(".enviar__rFuncionarios"),[$("#idOrganismoM").val(),$("#fisicamenteE").val(),$("#idUsuarioC").val(),$(".alto__fisiR").val()],$(".alto__fisiR"),$(".detalle__observaPri"),$("#idRolAd").val(),"generarDocumento",false,"no__tramite");


			});

		},
		error:function(){

		}
				
	});		



  });

}

/*=====  End of Acciones reasignar coordinaciones  ======*/

/*=====================================================
=            Acciones rechazar financieras            =
=====================================================*/

var funcion__datatabletsReasignarTra__finan__rechazas=function(tbody,table,parametro3,parametro4,parametro5){

  $(tbody).on("click","button.reasignarTramites",function(e){

  	e.preventDefault();

  	var data=table.row($(this).parents("tr")).data();

  	$(".idOrganismoM").val(data[7]);

  	$("#enviarTramite__Financiero__rechazos").hide();


  	console.log(data);

  
  	var idOrganismo=$(".idOrganismoM").val();

  	var fisicamenteE=$("#fisicamenteE").val();

	var paqueteDeDatos = new FormData();

	paqueteDeDatos.append('tipo','informacioSubsess__finan__rechazos');

	paqueteDeDatos.append('idOrganismo',idOrganismo);

	paqueteDeDatos.append('fisicamenteE',fisicamenteE);

	$.ajax({

		type:"POST",
		url:"modelosBd/inserta/seleccionaAcciones.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

			$.getScript("layout/scripts/js/validaGlobal.js",function(){

				var elementos=JSON.parse(response);

				var obtenerInformacion=elementos['obtenerInformacion'];
				var obtenerInformacion__docus=elementos['obtenerInformacion__docus'];
				var obtenerInformacion__docus__observas=elementos['obtenerInformacion__docus__observas'];

				$(".titulo__mS").text(data[1]);

				$(".contenedor__bodyCMatriz").append(' ');

				$(".elementosCreados__M").remove();

				$(".creados__letter").remove();


				$(".contenedor__bodyCMatriz").append('<div class="col col-6 letras__ver__poa text-center creados__letter" style="font-weight:bold; font-size:15px;">Ver POA</div><div class="col col-6"><button class="ver__Tabla btn btn-primary creados__letter" style="cursor:pointer;"><i class="fas fa-eye icono__boton"></i></button></div>');


				$(".contenedor__bodyCMatriz").append('<button type="button" class="btn btn-success excelProyectos col col-1 elementosCreados__M"><i class="fas fa-file-excel"></i>&nbsp;&nbsp;EXCEL</button><table class="tabla__itemsM elementosCreados__M" style="margin-top:2em;" id="tablaPoaPrincipal"><thead><tr><th align="center">Actividad</th><th align="center">Item</th><th align="center">Enero</th><th align="center">Febrero</th><th align="center">Marzo</th><th align="center">Abril</th><th align="center">Mayo</th><th align="center">Junio</th><th align="center">Julio</th><th align="center">Agosto</th><th align="center">Septiembre</th><th align="center">Octubre</th><th align="center">Noviembre</th><th align="center">Diciembre</th><th align="center">Total</th></tr></thead></table><br><br>');

				$(".elementosCreados__M").hide();


				for (c of obtenerInformacion) {

					$(".tabla__itemsM").append('<tr><td>'+c.idActividades+"-"+c.nombreActividades+'</td><td>'+c.itemPreesupuestario+"-"+c.nombreItem+'</td><td><center>'+parseFloat(c.enero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.febrero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.marzo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.abril).toFixed(2)+'</center></td><td><center>'+parseFloat(c.mayo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.junio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.julio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.agosto).toFixed(2)+'</center></td><td><center>'+parseFloat(c.septiembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.octubre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.noviembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.diciembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.totalSumaItem).toFixed(2)+'</center></td></tr>');


				}

				execelGenerados($(".excelProyectos"),"tablaPoaPrincipal","poa");

				verOjoContrasenas2($(".ver__Tabla"),$(".icono__boton"),$(".elementosCreados__M"),$(".letras__ver__poa"));

				$(".contenedor__bodyCMatriz").append('<div class="col col-12 text-center" style="font-weight:bold;">Documentos</div>');

	
				for (d of obtenerInformacion__docus) {

					$(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="documentos/financiero/polizaOriginal/'+d.polizaOriginal+'" target="_blank">1) Póliza original con vigencia de por lo menos 18 meses, garantizando mínimo el 10% del recurso aprobado;</a><select style="border:none!important;" disabled="disabled" class="col col-2" id="polizaOriginal" name="polizaOriginal"><option value="A">Aprobado</option><option value="r">Rechazado</option><option value="p">Rechazado</option></select style="border:none!important;" disabled="disabled"><textarea style="border:none!important;" disabled="disabled" class="col col-4" id="observa__polizaOriginal" name="observa__polizaOriginal" ></textarea style="border:none!important;" disabled="disabled"></div>');

					$(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="documentos/financiero/caucionOrginal/'+d.caucionOrginal+'" target="_blank">2) Caución original con vigencia de por lo menos 18 meses, garantizando mínimo el 10% del recurso aprobado;</a><select style="border:none!important;" disabled="disabled" class="col col-2" id="caucionOrginal" name="caucionOrginal"><option value="A">Aprobado</option><option value="r">Rechazado</option><option value="p">Rechazado</option></select style="border:none!important;" disabled="disabled"><textarea style="border:none!important;" disabled="disabled" class="col col-4" id="observa__caucionOrginal" name="observa__caucionOrginal" ></textarea style="border:none!important;" disabled="disabled"></div>');

					$(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="documentos/financiero/copiaCertificadoBancario/'+d.copiaCertificadoBancario+'" target="_blank">3) Copia del certificado bancario;</a><select style="border:none!important;" disabled="disabled" class="col col-2" id="copiaCertificadoBancario" name="copiaCertificadoBancario"><option value="A">Aprobado</option><option value="r">Rechazado</option><option value="p">Rechazado</option></select style="border:none!important;" disabled="disabled"><textarea style="border:none!important;" disabled="disabled" class="col col-4" id="observa__copiaCertificadoBancario" name="observa__copiaCertificadoBancario" ></textarea style="border:none!important;" disabled="disabled"></div>');

					$(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="documentos/financiero/copiaRegistroD/'+d.copiaRegistroD+'" target="_blank">4) Copia de registro de Directorio actualizado y vigente;</a><select style="border:none!important;" disabled="disabled" class="col col-2" id="copiaRegistroD" name="copiaRegistroD"><option value="A">Aprobado</option><option value="r">Rechazado</option><option value="p">Rechazado</option></select style="border:none!important;" disabled="disabled"><textarea style="border:none!important;" disabled="disabled" class="col col-4" id="observa__copiaRegistroD" name="observa__copiaRegistroD" ></textarea style="border:none!important;" disabled="disabled"></div>');

					if (d.copia_adminFinanciero!="" && d.copia_adminFinanciero!=null) {
						
						$(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="documentos/financiero/copia_adminFinanciero/'+d.copia_adminFinanciero+'" target="_blank">5) Copia del registro de Administrador Financiero actualizado y vigente, solo si aplica;</a><select style="border:none!important;" disabled="disabled" class="col col-2" id="copia_adminFinanciero" name="copia_adminFinanciero"><option value="A">Aprobado</option><option value="r">Rechazado</option><option value="p">Rechazado</option></select style="border:none!important;" disabled="disabled"><textarea style="border:none!important;" disabled="disabled" class="col col-4" id="observa__copia_adminFinanciero" name="observa__copia_adminFinanciero" ></textarea style="border:none!important;" disabled="disabled"></div>');
					}

					if (d.copia_adminGeneral!="" && d.copia_adminGeneral!=null) {
						
						$(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="documentos/financiero/copia_adminGeneral/'+d.copia_adminGeneral+'" target="_blank">6) Copia del registro de Administrador General actualizado y vigente; solo si aplica;</a><select style="border:none!important;" disabled="disabled" class="col col-2" id="copia_adminGeneral" name="copia_adminGeneral"><option value="A">Aprobado</option><option value="r">Rechazado</option><option value="p">Rechazado</option></select style="border:none!important;" disabled="disabled"><textarea style="border:none!important;" disabled="disabled" class="col col-4" id="observa__copia_adminGeneral" name="observa__copia_adminGeneral" ></textarea style="border:none!important;" disabled="disabled"></div>');
					}

					if (d.copia__registroIn!="" && d.copia__registroIn!=null) {
						
						$(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="documentos/financiero/copia__registroIn/'+d.copia__registroIn+'" target="_blank">7) Copia del registro de Intervención actualizado y vigente, solo si aplica;</a><select style="border:none!important;" disabled="disabled" class="col col-2" id="copia__registroIn" name="copia__registroIn"><option value="A">Aprobado</option><option value="r">Rechazado</option><option value="p">Rechazado</option></select style="border:none!important;" disabled="disabled"><textarea style="border:none!important;" disabled="disabled" class="col col-4" id="observa__copia__registroIn" name="observa__copia__registroIn" ></textarea style="border:none!important;" disabled="disabled"></div>');
					}
						
					$(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="documentos/financiero/copia_acuerdoRegistro/'+d.copia_acuerdoRegistro+'" target="_blank">8) Copia del Acuerdo de registro de estatutos vigente;</a><select style="border:none!important;" disabled="disabled" class="col col-2" id="copia_acuerdoRegistro" name="copia_acuerdoRegistro"><option value="A">Aprobado</option><option value="r">Rechazado</option><option value="p">Rechazado</option></select style="border:none!important;" disabled="disabled"><textarea style="border:none!important;" disabled="disabled" class="col col-4" id="observa__copia_acuerdoRegistro" name="observa__copia_acuerdoRegistro" ></textarea style="border:none!important;" disabled="disabled"></div>');

					$(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="documentos/financiero/copia_ruc/'+d.copia_ruc+'" target="_blank">9) Copia del RUC actualizado, vigente y activo;</a><select style="border:none!important;" disabled="disabled" class="col col-2" id="copia_ruc" name="copia_ruc"><option value="A">Aprobado</option><option value="r">Rechazado</option><option value="p">Rechazado</option></select style="border:none!important;" disabled="disabled"><textarea style="border:none!important;" disabled="disabled" class="col col-4" id="observa__copia_ruc" name="observa__copia_ruc" ></textarea style="border:none!important;" disabled="disabled"></div>');

				}

				for (c of obtenerInformacion__docus__observas) {

					$("#polizaOriginal").val(c.polizaOriginal);
					$("#caucionOrginal").val(c.caucionOrginal);
					$("#copiaCertificadoBancario").val(c.copiaCertificadoBancario);
					$("#copiaRegistroD").val(c.copiaRegistroD);
					$("#copia_adminFinanciero").val(c.copia_adminFinanciero);
					$("#copia_adminGeneral").val(c.copia_adminGeneral);
					$("#copia__registroIn").val(c.copia__registroIn);
					$("#copia_acuerdoRegistro").val(c.copia_acuerdoRegistro);
					$("#copia_ruc").val(c.copia_ruc);


					$("#observa__polizaOriginal").val(c.observa__polizaOriginal);
					$("#observa__caucionOrginal").val(c.observa__caucionOrginal);
					$("#observa__copiaCertificadoBancario").val(c.observa__copiaCertificadoBancario);
					$("#observa__copiaRegistroD").val(c.observa__copiaRegistroD);
					$("#observa__copia_adminFinanciero").val(c.observa__copia_adminFinanciero);
					$("#observa__copia_adminGeneral").val(c.observa__copia_adminGeneral);
					$("#observa__copia__registroIn").val(c.observa__copia__registroIn);
					$("#observa__copia_acuerdoRegistro").val(c.observa__copia_acuerdoRegistro);
					$("#observa__copia_ruc").val(c.observa__copia_ruc);




				}
			
			});

		},
		error:function(){

		}
				
	});		



  });

}

/*=====  End of Acciones rechazar financieras  ======*/


/*============================================================
=            Acciones reasignar Trans financieros            =
============================================================*/

var funcion__datatabletsReasignarTra__finan=function(tbody,table,parametro3,parametro4,parametro5){

  $(tbody).on("click","button.reasignarTramites",function(e){

  	e.preventDefault();

  	var data=table.row($(this).parents("tr")).data();

  	$(".idOrganismoM").val(data[7]);


  	console.log(data);

  
  	var idOrganismo=$(".idOrganismoM").val();

  	var fisicamenteE=$("#fisicamenteE").val();

	var paqueteDeDatos = new FormData();

	paqueteDeDatos.append('tipo','informacioSubsess__finan');

	paqueteDeDatos.append('idOrganismo',idOrganismo);

	paqueteDeDatos.append('fisicamenteE',fisicamenteE);

	$.ajax({

		type:"POST",
		url:"modelosBd/inserta/seleccionaAcciones.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

			$.getScript("layout/scripts/js/validaGlobal.js",function(){

				var elementos=JSON.parse(response);

				var obtenerInformacion=elementos['obtenerInformacion'];
				var obtenerInformacion__docus=elementos['obtenerInformacion__docus'];
				var obtenerInformacion__docus__negados=elementos['obtenerInformacion__docus__negados'];

				$(".titulo__mS").text(data[1]);

				$(".contenedor__bodyCMatriz").append(' ');

				$(".elementosCreados__M").remove();

				$(".creados__letter").remove();




				$(".contenedor__bodyCMatriz").append('<div class="col col-6 letras__ver__poa text-center creados__letter" style="font-weight:bold; font-size:15px;">Ver POA</div><div class="col col-6"><button class="ver__Tabla btn btn-primary creados__letter" style="cursor:pointer;"><i class="fas fa-eye icono__boton"></i></button></div>');


				$(".contenedor__bodyCMatriz").append('<button type="button" class="btn btn-success excelProyectos col col-1 elementosCreados__M"><i class="fas fa-file-excel"></i>&nbsp;&nbsp;EXCEL</button><table class="tabla__itemsM elementosCreados__M" style="margin-top:2em;" id="tablaPoaPrincipal"><thead><tr><th align="center">Actividad</th><th align="center">Item</th><th align="center">Enero</th><th align="center">Febrero</th><th align="center">Marzo</th><th align="center">Abril</th><th align="center">Mayo</th><th align="center">Junio</th><th align="center">Julio</th><th align="center">Agosto</th><th align="center">Septiembre</th><th align="center">Octubre</th><th align="center">Noviembre</th><th align="center">Diciembre</th><th align="center">Total</th></tr></thead></table><br><br>');

				$(".elementosCreados__M").hide();


				for (c of obtenerInformacion) {

					$(".tabla__itemsM").append('<tr><td>'+c.idActividades+"-"+c.nombreActividades+'</td><td>'+c.itemPreesupuestario+"-"+c.nombreItem+'</td><td><center>'+parseFloat(c.enero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.febrero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.marzo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.abril).toFixed(2)+'</center></td><td><center>'+parseFloat(c.mayo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.junio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.julio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.agosto).toFixed(2)+'</center></td><td><center>'+parseFloat(c.septiembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.octubre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.noviembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.diciembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.totalSumaItem).toFixed(2)+'</center></td></tr>');


				}

				execelGenerados($(".excelProyectos"),"tablaPoaPrincipal","poa");

				verOjoContrasenas2($(".ver__Tabla"),$(".icono__boton"),$(".elementosCreados__M"),$(".letras__ver__poa"));

				$(".contenedor__bodyCMatriz").append('<div class="col col-12 text-center" style="font-weight:bold;">Documentos a analizar</div>');

				if($("#idRolAd").val()!=3){

					for (d of obtenerInformacion__docus) {

						$(".contenedor__bodyCMatriz").append('<a class="col col-12 text-left bloques__financieros__documentos" href="documentos/financiero/polizaOriginal/'+d.polizaOriginal+'" target="_blank">1) Póliza original con vigencia de por lo menos 18 meses, garantizando mínimo el 10% del recurso aprobado;</a>');

						$(".contenedor__bodyCMatriz").append('<a class="col col-12 text-left bloques__financieros__documentos" href="documentos/financiero/caucionOrginal/'+d.caucionOrginal+'" target="_blank">2) Caución original con vigencia de por lo menos 18 meses, garantizando mínimo el 10% del recurso aprobado;</a>');

						$(".contenedor__bodyCMatriz").append('<a class="col col-12 text-left bloques__financieros__documentos" href="documentos/financiero/copiaCertificadoBancario/'+d.copiaCertificadoBancario+'" target="_blank">3) Copia del certificado bancario;</a>');

						$(".contenedor__bodyCMatriz").append('<a class="col col-12 text-left bloques__financieros__documentos" href="documentos/financiero/copiaRegistroD/'+d.copiaRegistroD+'" target="_blank">4) Copia de registro de Directorio actualizado y vigente;</a>');

						if (d.copia_adminFinanciero!="" && d.copia_adminFinanciero!=null) {
							$(".contenedor__bodyCMatriz").append('<a class="col col-12 text-left bloques__financieros__documentos" href="documentos/financiero/copia_adminFinanciero/'+d.copia_adminFinanciero+'" target="_blank">5) Copia del registro de Administrador Financiero actualizado y vigente, solo si aplica;</a>');
						}

						if (d.copia_adminGeneral!="" && d.copia_adminGeneral!=null) {
							$(".contenedor__bodyCMatriz").append('<a class="col col-12 text-left bloques__financieros__documentos" href="documentos/financiero/copia_adminGeneral/'+d.copia_adminGeneral+'" target="_blank">6) Copia del registro de Administrador General actualizado y vigente; solo si aplica;</a>');
						}

						if (d.copia__registroIn!="" && d.copia__registroIn!=null) {
							$(".contenedor__bodyCMatriz").append('<a class="col col-12 text-left bloques__financieros__documentos" href="documentos/financiero/copia__registroIn/'+d.copia__registroIn+'" target="_blank">7) Copia del registro de Intervención actualizado y vigente, solo si aplica;</a>');
						}
						
						$(".contenedor__bodyCMatriz").append('<a class="col col-12 text-left bloques__financieros__documentos" href="documentos/financiero/copia_acuerdoRegistro/'+d.copia_acuerdoRegistro+'" target="_blank">8) Copia del Acuerdo de registro de estatutos vigente;</a>');

						$(".contenedor__bodyCMatriz").append('<a class="col col-12 text-left bloques__financieros__documentos" href="documentos/financiero/copia_ruc/'+d.copia_ruc+'" target="_blank">9) Copia del RUC actualizado, vigente y activo;</a>');


					}

				}else{

					for (d of obtenerInformacion__docus) {

						$(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="documentos/financiero/polizaOriginal/'+d.polizaOriginal+'" target="_blank">1) Póliza original con vigencia de por lo menos 18 meses, garantizando mínimo el 10% del recurso aprobado;</a><select class="col col-2" id="polizaOriginal" name="polizaOriginal"><option value="A">Aprobar</option><option value="r">Rechazar</option></select><textarea class="col col-4" id="observa__polizaOriginal" name="observa__polizaOriginal" placeholder="Ingrese observaciones en caso de rechazo o de requerirlo"></textarea></div>');

						$(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="documentos/financiero/caucionOrginal/'+d.caucionOrginal+'" target="_blank">2) Caución original con vigencia de por lo menos 18 meses, garantizando mínimo el 10% del recurso aprobado;</a><select class="col col-2" id="caucionOrginal" name="caucionOrginal"><option value="A">Aprobar</option><option value="r">Rechazar</option></select><textarea class="col col-4" id="observa__caucionOrginal" name="observa__caucionOrginal" placeholder="Ingrese observaciones en caso de rechazo o de requerirlo"></textarea></div>');

						$(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="documentos/financiero/copiaCertificadoBancario/'+d.copiaCertificadoBancario+'" target="_blank">3) Copia del certificado bancario;</a><select class="col col-2" id="copiaCertificadoBancario" name="copiaCertificadoBancario"><option value="A">Aprobar</option><option value="r">Rechazar</option></select><textarea class="col col-4" id="observa__copiaCertificadoBancario" name="observa__copiaCertificadoBancario" placeholder="Ingrese observaciones en caso de rechazo o de requerirlo"></textarea></div>');

						$(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="documentos/financiero/copiaRegistroD/'+d.copiaRegistroD+'" target="_blank">4) Copia de registro de Directorio actualizado y vigente;</a><select class="col col-2" id="copiaRegistroD" name="copiaRegistroD"><option value="A">Aprobar</option><option value="r">Rechazar</option></select><textarea class="col col-4" id="observa__copiaRegistroD" name="observa__copiaRegistroD" placeholder="Ingrese observaciones en caso de rechazo o de requerirlo"></textarea></div>');

						if (d.copia_adminFinanciero!="" && d.copia_adminFinanciero!=null) {
							$(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="documentos/financiero/copia_adminFinanciero/'+d.copia_adminFinanciero+'" target="_blank">5) Copia del registro de Administrador Financiero actualizado y vigente, solo si aplica;</a><select class="col col-2" id="copia_adminFinanciero" name="copia_adminFinanciero"><option value="A">Aprobar</option><option value="r">Rechazar</option></select><textarea class="col col-4" id="observa__copia_adminFinanciero" name="observa__copia_adminFinanciero" placeholder="Ingrese observaciones en caso de rechazo o de requerirlo"></textarea></div>');
						}

						if (d.copia_adminGeneral!="" && d.copia_adminGeneral!=null) {
							$(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="documentos/financiero/copia_adminGeneral/'+d.copia_adminGeneral+'" target="_blank">6) Copia del registro de Administrador General actualizado y vigente; solo si aplica;</a><select class="col col-2" id="copia_adminGeneral" name="copia_adminGeneral"><option value="A">Aprobar</option><option value="r">Rechazar</option></select><textarea class="col col-4" id="observa__copia_adminGeneral" name="observa__copia_adminGeneral" placeholder="Ingrese observaciones en caso de rechazo o de requerirlo"></textarea></div>');
						}

						if (d.copia__registroIn!="" && d.copia__registroIn!=null) {
							$(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="documentos/financiero/copia__registroIn/'+d.copia__registroIn+'" target="_blank">7) Copia del registro de Intervención actualizado y vigente, solo si aplica;</a><select class="col col-2" id="copia__registroIn" name="copia__registroIn"><option value="A">Aprobar</option><option value="r">Rechazar</option></select><textarea class="col col-4" id="observa__copia__registroIn" name="observa__copia__registroIn" placeholder="Ingrese observaciones en caso de rechazo o de requerirlo"></textarea></div>');
						}
						
						$(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="documentos/financiero/copia_acuerdoRegistro/'+d.copia_acuerdoRegistro+'" target="_blank">8) Copia del Acuerdo de registro de estatutos vigente;</a><select class="col col-2" id="copia_acuerdoRegistro" name="copia_acuerdoRegistro"><option value="A">Aprobar</option><option value="r">Rechazar</option></select><textarea class="col col-4" id="observa__copia_acuerdoRegistro" name="observa__copia_acuerdoRegistro" placeholder="Ingrese observaciones en caso de rechazo o de requerirlo"></textarea></div>');

						$(".contenedor__bodyCMatriz").append('<div class="col col-12 row bloques__financieros__documentos"><a class="col col-6 text-left bloques__financieros__documentos" href="documentos/financiero/copia_ruc/'+d.copia_ruc+'" target="_blank">9) Copia del RUC actualizado, vigente y activo;</a><select class="col col-2" id="copia_ruc" name="copia_ruc"><option value="A">Aprobar</option><option value="r">Rechazar</option></select><textarea class="col col-4" id="observa__copia_ruc" name="observa__copia_ruc" placeholder="Ingrese observaciones en caso de rechazo o de requerirlo"></textarea></div>');


						if (obtenerInformacion__docus__negados!="no") {

							for (w of obtenerInformacion__docus__negados) {

								if (w.polizaOriginal=="p") {
									$("#polizaOriginal").val("r");
								}else{
									$("#polizaOriginal").val(w.polizaOriginal);
								}
								$("#observa__polizaOriginal").val(w.observa__polizaOriginal);

								if (w.caucionOrginal=="p") {
									$("#caucionOrginal").val("r");
								}else{
									$("#caucionOrginal").val(w.caucionOrginal);
								}
								$("#observa__caucionOrginal").val(w.observa__caucionOrginal);


								if (w.copiaCertificadoBancario=="p") {
									$("#copiaCertificadoBancario").val("r");
								}else{
									$("#copiaCertificadoBancario").val(w.copiaCertificadoBancario);
								}
								$("#observa__copiaCertificadoBancario").val(w.observa__copiaCertificadoBancario);

								if (w.copiaRegistroD=="p") {
									$("#copiaRegistroD").val("r");
								}else{
									$("#copiaRegistroD").val(w.copiaRegistroD);
								}
								$("#observa__copiaRegistroD").val(w.observa__copiaRegistroD);

								if (w.copia_adminFinanciero=="p") {
									$("#copia_adminFinanciero").val("r");
								}else{
									$("#copia_adminFinanciero").val(w.copia_adminFinanciero);
								}
								$("#observa__copia_adminFinanciero").val(w.observa__copia_adminFinanciero);

								if (w.copia_adminGeneral=="p") {
									$("#copia_adminGeneral").val("r");
								}else{
									$("#copia_adminGeneral").val(w.copia_adminGeneral);
								}
								$("#observa__copia_adminGeneral").val(w.observa__copia_adminGeneral);

								if (w.copia__registroIn=="p") {
									$("#copia__registroIn").val("r");
								}else{
									$("#copia__registroIn").val(w.copia__registroIn);
								}
								$("#observa__copia__registroIn").val(w.observa__copia__registroIn);


								if (w.copia_acuerdoRegistro=="p") {
									$("#copia_acuerdoRegistro").val("r");
								}else{
									$("#copia_acuerdoRegistro").val(w.copia_acuerdoRegistro);
								}
								$("#observa__copia_acuerdoRegistro").val(w.observa__copia_acuerdoRegistro);
								

								if (w.copia_ruc=="p") {
									$("#copia_ruc").val("r");
								}else{
									$("#copia_ruc").val(w.copia_ruc);
								}
								$("#observa__copia_ruc").val(w.observa__copia_ruc);


							}

						}


					}


				}


				var idRolE=$("#idRolAd").val();

				if($("#idRolAd").val()==2){

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

					subsecretarias__finanA__c($(".alto__fisiR"),$("#idUsuarioC").val(),"insta");

					var tipo__enviados="inserta__funcionario__finan";

					enviarTramitesGenerados__financieros($("#enviarTramite__Financiero"),[$("#idOrganismoM").val(),$("#fisicamenteE").val(),$("#idUsuarioC").val(),variableF],variableF,tipo__enviados);

				}else if($("#idRolAd").val()==4){


					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

					subsecretarias__finanA__c__c($(".alto__fisiR"),$("#idUsuarioC").val(),"insta");

					var tipo__enviados="inserta__funcionario__finan__coordinas";



				}else if($("#idRolAd").val()==3){

					$(".contenedor__bodyCMatriz").append('<br><br><div class="col col-8 text-center d d-flex justify-content-center align-items:center" style="font-weight:bold">Si desea devolver el trámite dar click en el check&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="checksDesicion" name="checksDesicion" style="width:20px; height:20px;"></div><br><br>');

					$(".contenedor__bodyCMatriz").append('<div class="col col-12 row contenedor__reasignaciones"><div class="col col-4 text-center" style="font-weight:bold;">Regresar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div></div>');

					$(".contenedor__reasignaciones").hide();

					checkboxFunciones($("#checksDesicion"),$(".contenedor__reasignaciones"),$(".bloques__financieros__documentos"));

					subsecretarias__finanA__c__a($(".alto__fisiR"),$("#idUsuarioC").val(),"insta");

					var tipo__enviados="inserta__funcionario__finan__funcionarios";

				}

				$(".alto__fisiR").change(function (e){

					$("#texto__finan").val($(this).val());

				});

				var variableF=$("#texto__finan").val();

				enviarTramitesGenerados__financieros($("#enviarTramite__Financiero"),[$("#idOrganismoM").val(),$("#fisicamenteE").val(),$("#idUsuarioC").val(),variableF],variableF,tipo__enviados);


				
			});

		},
		error:function(){

		}
				
	});		



  });

}

/*=====  End of Acciones reasignar Trans financieros  ======*/


/*================================================
=            Acciones reasignar trans            =
================================================*/

var funcion__datatabletsReasignarTra=function(tbody,table,parametro3,parametro4,parametro5){

  $(tbody).on("click","button.reasignarTramites",function(e){

  	e.preventDefault();

  	var data=table.row($(this).parents("tr")).data();

  	$(".idOrganismoM").val(data[7]);

  
  	var idOrganismo=$(".idOrganismoM").val();

  	var fisicamenteE=$("#fisicamenteE").val();

	var paqueteDeDatos = new FormData();

	paqueteDeDatos.append('tipo','informacioSubsess');

	paqueteDeDatos.append('idOrganismo',idOrganismo);

	paqueteDeDatos.append('fisicamenteE',fisicamenteE);

	$.ajax({

		type:"POST",
		url:"modelosBd/inserta/seleccionaAcciones.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

			$.getScript("layout/scripts/js/validaGlobal.js",function(){

				var elementos=JSON.parse(response);

				var obtenerInformacion=elementos['obtenerInformacion'];
				var obtenerAcCa=elementos['obtenerAcCa'];

				var obtenerInformacionPre=elementos['obtenerInformacionPre'];

				var obtenerInformacionObservaciones=elementos['obtenerInformacionObservaciones'];

				var actividad3=elementos['actividad3'];
				var actividad4=elementos['actividad4'];
				var actividad5=elementos['actividad5'];
				var actividad6=elementos['actividad6'];
				var actividad7=elementos['actividad7'];

				var indicadorInformacion=elementos['indicadorInformacion'];

				$(".titulo__mS").text(data[1]);

				$(".contenedor__bodyCMatriz").append(' ');

				$(".elementosCreados__M").remove();

				$(".creados__letter").remove();

				if (!$(".nuevo__creates__nuevos").length > 0) {

					$(".contenedor__bodyCMatriz").append('<div class="col col-6 letras__ver__poa text-center creados__letter nuevo__creates__nuevos" style="font-weight:bold; font-size:15px;">Ver POA</div><div class="col col-6"><button class="ver__Tabla btn btn-primary creados__letter" style="cursor:pointer;"><i class="fas fa-eye icono__boton"></i></button></div>');


				}
				
				if (!$(".elementosCreados__M").length > 0) {

					$(".contenedor__bodyCMatriz").append('<button type="button" class="btn btn-success excelProyectos col col-1 elementosCreados__M"><i class="fas fa-file-excel"></i>&nbsp;&nbsp;EXCEL</button><table class="tabla__itemsM elementosCreados__M" style="margin-top:2em;" id="tablaPoaPrincipal"><thead><tr><th align="center">Actividad</th><th align="center">Item</th><th align="center">Enero</th><th align="center">Febrero</th><th align="center">Marzo</th><th align="center">Abril</th><th align="center">Mayo</th><th align="center">Junio</th><th align="center">Julio</th><th align="center">Agosto</th><th align="center">Septiembre</th><th align="center">Octubre</th><th align="center">Noviembre</th><th align="center">Diciembre</th><th align="center">Total</th></tr></thead></table><br><br>');

					$(".elementosCreados__M").hide();


					for (c of obtenerInformacion) {

						$(".tabla__itemsM").append('<tr><td>'+c.idActividades+"-"+c.nombreActividades+'</td><td>'+c.itemPreesupuestario+"-"+c.nombreItem+'</td><td><center>'+parseFloat(c.enero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.febrero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.marzo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.abril).toFixed(2)+'</center></td><td><center>'+parseFloat(c.mayo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.junio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.julio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.agosto).toFixed(2)+'</center></td><td><center>'+parseFloat(c.septiembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.octubre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.noviembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.diciembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.totalSumaItem).toFixed(2)+'</center></td></tr>');


					}


					execelGenerados($(".excelProyectos"),"tablaPoaPrincipal","poa");

					verOjoContrasenas2($(".ver__Tabla"),$(".icono__boton"),$(".elementosCreados__M"),$(".letras__ver__poa"));					

				}

				if (!$(".documentos__anexos__nuevos").length > 0) {

					if (data[9]!=null && data[9]!="") {

						$(".contenedor__bodyCMatriz").append('<div class="col col-12 text-center documentos__anexos__nuevos" style="font-size:14px; font-weight:bold;">Documentos anexos</div><br><br>');

						var arreglo = data[9].split("_________");

						let contador__Doc=0;

						let banderaDi=false;

						let unicos = [];

						for(var i = 0; i < arreglo.length; i++) {
						 
						  let elemento = arreglo[i];
						 
						  if (!unicos.includes(arreglo[i])) {
						    unicos.push(elemento);
						  }
						}


						for (var i = 0 ; i<unicos.length; i++) {


							$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center doc__anexos" id="doc__fila'+contador__Doc+'"><a href="documentos/anexosPoa/'+unicos[i]+'" target="_blank" id="enlace__'+contador__Doc+'">Documento '+(i+1)+": "+unicos[i]+'</a></div>');


							if(banderaDi==false){

								$("#doc__fila"+i).attr('style','background-color: rgba(33,42,92,.95)!important;');

								$("#enlace__"+i).attr('style','color:white;');

								banderaDi=true;

							}else{

								$("#doc__fila"+i).attr('style','background-color: var(--bs-white)!important;');

								$("#enlace__"+i).attr('style','color:#212121;');

								banderaDi=false;

							}
							

							contador__Doc++;

						}


					}

				}

				if (!$(".planificacion__letreros").length > 0) {

					$(".contenedor__bodyCMatriz").append('<div class="col col-12 text-center planificacion__letreros" style="font-size:14px; font-weight:bold;">Planificación de indicadores</div><br><br>');


					for (dLCIn of indicadorInformacion) {

						$(".contenedor__bodyCMatriz").append('<div class="col col-12 text-center mb-0" style="font-weight:bold; text-align:justify; color: rgba(33,42,92,.95);">'+dLCIn.indicador+'</div><hr><div class="col col-2" style="">I Trimestre: '+dLCIn.primertrimestre+'</div><div class="col col-2" style="">II Trimestre: '+dLCIn.segundotrimestre+'</div><div class="col col-2" style="">III Trimestre: '+dLCIn.tercertrimestre+'</div><div class="col col-2" style="">IV Trimestre: '+dLCIn.cuartotrimestre+'</div><div class="col col-4" style="">Meta Anual del indicador: '+dLCIn.metaindicador+'</div><br><br>');

					}

				}
				
				if (!$(".a__analizar__activadesd").length > 0) {

					if (obtenerAcCa!="") {


						$(".contenedor__bodyCMatriz").append('<div class="col col-12 text-center a__analizar__activadesd" style="font-size:14px; font-weight:bold;">ACTIVIDADES A ANALIZAR</div><br><br>');

						for (d of obtenerAcCa) {

							$(".contenedor__bodyCMatriz").append('<div class="col col-6 letras__ver__poa text-center" style="font-weight:bold; font-size:12px; ; margin-bottom:2em;">'+d.idActividades+"-"+d.nombreActividades+'</div><div class="col col-6"><button class="ver__matrices'+d.idActividades+' btn btn-info" attr="'+d.idActividades+'" style="cursor:pointer;"><i class="fas fa-eye icono__'+d.idActividades+'"></i></button></div><br><div class="col col-12 matrices__'+d.idActividades+' row"></div>');

							verOjoAjaxMatrices($(".ver__matrices"+d.idActividades),$(".icono__"+d.idActividades),$(".matrices__"+d.idActividades),d.idActividades,d.idOrganismo,$("#idRolAd").val(),$("#fisicamenteE").val());

						}

					}

				}

				if (!$(".observacioneS__a__l").length > 0) {

					if (obtenerInformacionObservaciones!="") {

						$(".contenedor__bodyCMatriz").append('<div class="col col-12 text-center observacioneS__a__l" style="font-weight:bold;">SECCIÓN DE OBSERVACIONES</div><br>');


						for (dLC of obtenerInformacionObservaciones) {

							$(".contenedor__bodyCMatriz").append('<div class="row col col-12" style="margin-left:5%;"><div class="col col-4">Observación realizada por '+dLC.nombreCompleto+':</div><div class="col col-8">'+dLC.observaciones+'</div></div>');

						}

						$(".contenedor__bodyCMatriz").append('<div></div><br><br>');


					}

				}


				console.log(data);

				var idRolE=$("#idRolAd").val();

				if($("#idRolAd").val()==3){

					if (!$(".enviador__enviados").length > 0) {

						$(".contenedor__bodyCMatriz").append('<br><br><div class="col col-8 text-center d d-flex justify-content-center enviador__enviados align-items:center" style="font-weight:bold">Si desea devolver el trámite dar click en el check&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="checksDesicion" name="checksDesicion" style="width:20px; height:20px;"></div><br><br>');


						$(".contenedor__bodyCMatriz").append('<div class="col col-12 row contenedor__reasignaciones"><div class="col col-4 text-center" style="font-weight:bold;">Asignar a</div><div class="col col-6"><select class="alto__fisiR ancho__total__input__selects"></select></div><div class="col col-2"><button class="btn btn-primary enviar__rFuncionarios">Reasignar</button></div><br><br><div class="col col-4 text-center mt-4 observaciones__nestD" style="font-weight:bold;">Detalle observaciones (solo en caso de ser necesario)</div><div class="col col-8 mt-4 observaciones__nestD"><textarea class="detalle__observaPri ancho__total__textareas" placeholder="Detalle observaciones en caso de ser necesario"></textarea></div></div>');

					}

				}else if((fisicamenteE==27 || fisicamenteE==28 || fisicamenteE==29 || fisicamenteE==30 || fisicamenteE==31 || fisicamenteE==32 || fisicamenteE==33) && idRolE==3){

					if (!$(".enviador__enviados").length > 0) {

						$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center enviador__enviados" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

						subsecretariasSelectorCorFun($(".alto__fisiR"),$("#idUsuarioC").val(),"insta");

					}


				}else if((fisicamenteE==27 || fisicamenteE==28 || fisicamenteE==29 || fisicamenteE==30 || fisicamenteE==31 || fisicamenteE==32 || fisicamenteE==33) && idRolE==4){


					if (!$(".enviador__enviados").length > 0) {

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center enviador__enviados" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

					subsecretariasSelectorCor($(".alto__fisiR"),$("#idUsuarioC").val(),"insta");

					}

				}else if (fisicamenteE==26) {

					if (!$(".enviador__enviados").length > 0) {

						$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center enviador__enviados" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

						subsecretariasSelector($(".alto__fisiR"),$("#idUsuarioC").val());

					}

				}else if(fisicamenteE==24){

					if (!$(".enviador__enviados").length > 0) {

						$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center enviador__enviados" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

						subsecretariasSelectorDos($(".alto__fisiR"),$("#idUsuarioC").val());

					}

				}else if(fisicamenteE==1){

					if (!$(".enviador__enviados").length > 0) {

						$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center enviador__enviados" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR" multiple="multiple"  style="width:100%!important; height:400px!important;"></select></div>');

						subsecretariasSelectorIntras($(".alto__fisiR"),$("#idUsuarioC").val());

					}


				}else if(fisicamenteE==2){

					if (!$(".enviador__enviados").length > 0) {

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center enviador__enviados" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR" multiple="multiple"  style="width:100%!important; height:200px!important;"></select></div>');

					subsecretariasSelectorFinancieros($(".alto__fisiR"),$("#idUsuarioC").val());

					}


				}else if($("#idRolAd").val()!=3){

					if (!$(".enviador__enviados").length > 0) {

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center enviador__enviados" style="font-weight:bold;">Asignar a</div><div class="col col-8"><select class="alto__fisiR ancho__total__input__selects"></select></div>');

					funcionarios__normales($(".alto__fisiR"),$("#idUsuarioC").val());

					}

				}

				if ($("#idRolAd").val()!=3) {

					if (!$(".enviador__enviados").length > 0) {

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center mt-4 enviador__enviados" style="font-weight:bold;">Detalle observaciones (solo en caso de ser necesario)</div><div class="col col-8 mt-4"><textarea class="detalle__observaPri ancho__total__textareas" placeholder="Detalle observaciones en caso de ser necesario"></textarea></div>');

					}

				}

				if (!$("#generarDocumento").length > 0) {


				if ($("#idRolAd").val()==3 && ($("#fisicamenteE").val()==13 ||  $("#fisicamenteE").val()==19 ||  $("#fisicamenteE").val()==26)) {


					$(".contenedor__bodyCMatriz").append('<br><form class="col col-12 row generarDocumento" id="generarDocumento" action="modelosBd/pdf/pdf.modelo.php"  method="post"><input type="hidden" id="tipoDocumento" name="tipoDocumento" value="subFisica"/><input type="hidden" id="tipoPdf" name="tipoPdf" value="informeTecnico"><input type="hidden" id="idUsuarioEn" name="idUsuarioEn" /><input type="hidden" id="idOrganismo" name="idOrganismo" /><input type="hidden" id="fisicamenteEn" name="fisicamenteEn" /><table class="col col-12"><thead><tr><th  align="center">N</th><th  align="center">CONDICIÓN</th><th  align="center">CUMPLE</th><th  align="center">OBSERVACIONES PARA LA ORGANIZACIÓN DEPORTIVA</th></tr></thead><tbody><tr><td align="center">1</td><td align="left">La meta anual del indicador coincide  con el No. de eventos planificados  en el PDA</td><td><select class="numerosEventosPlanificadosPda obligatorios__tabla ancho__total__input__selects" name="numerosEventosPlanificadosPda"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_numerosEventosPlanificadosPda" class="text_numerosEventosPlanificadosPda ancho__total__textareas text_verificados"></textarea></td></tr><tr><td align="center">2</td><td align="left">Utiliza la sintaxis clara (verbos en infinitivo) para el registro de los eventos</td><td><select class="sintaxis__clara obligatorios__tabla ancho__total__input__selects" name="sintaxis__clara"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_sintaxis__clara" class="text_sintaxis__clara ancho__total__textareas text_verificados"></textarea></td></tr><tr><td align="center">3</td><td align="left">Presenta el certificado de validación de eventos, registrados en el PDA suscrito por el director técnico metodológico (solo provinciales)</td><td><select class="validacionEventos obligatorios__tabla ancho__total__input__selects" name="validacionEventos"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_validacionEventos" class="text_numerosEventosPlanificadosPda ancho__total__textareas text_verificados"></textarea></td></tr><tr><td align="center">4</td><td align="left">Detalla satisfactoriamente la contratación o  adquisición de bienes o servicios orientados al fomento deportivo de acuerdo a la característica del deporte (implementación deportiva) con la debida justificación técnica</td><td><select class="detalleContratacion obligatorios__tabla ancho__total__input__selects" name="detalleContratacion"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_detalleContratacion" class="text_detalleContratacion ancho__total__textareas text_verificados"></textarea></td></tr><tr><td align="center">5</td><td align="left">No se han incrementado nuevos puestos de trabajo de técnicos en relación de dependencia con respecto al POA OD 2021</td><td><select class="nuevosPuestos obligatorios__tabla ancho__total__input__selects" name="nuevosPuestos"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_nuevosPuestos" class="text_nuevosPuestos ancho__total__textareas text_verificados"></textarea></td></tr><tr><td align="center">6</td><td align="left">Justifica satisfactoriamente la contratación de personal técnico bajo la modalidad de contratos de servicios de honorarios profesionales</td><td><select class="justificaTecnico obligatorios__tabla ancho__total__input__selects" name="justificaTecnico"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_justificaTecnico" class="text_justificaTecnico ancho__total__textareas text_verificados"></textarea></td></tr><tr><td align="center">7</td><td align="left">En caso que planifique bienes de larga duración presenta el informe justificado de acuerdo a la característica del deporte para implementación deportiva, equipos tecnológicos y electrónicos</td><td><select class="bienesLarga obligatorios__tabla ancho__total__input__selects" name="bienesLarga"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_bienesLarga" class="text_bienesLarga ancho__total__textareas text_verificados"></textarea></td></tr><tr><td align="center">8</td><td align="left">Planifica seguros contra accidentes, vida y de salud para los deportistas que participarán en los eventos deportivos.</td><td><select class="seguroAccidentes obligatorios__tabla ancho__total__input__selects" name="seguroAccidentes"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_seguroAccidentes" class="text_seguroAccidentes ancho__total__textareas text_verificados"></textarea></td></tr><tr><td align="center">9</td><td align="left">Detalla las especificaciones de la implementación y equipamiento deportivo que sea adquirido por cada deporte beneficiario y demuestre la no duplicidad en el presente año fiscal</td><td><select class="detalleImplementacion obligatorios__tabla ancho__total__input__selects" name="detalleImplementacion"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_detalleImplementacion" class="text_detalleImplementacion ancho__total__textareas text_verificados"></textarea></td></tr><tr><td align="center">10</td><td align="left">La Planificación Operativa Anual del Organismo Deportivo se encuentra enmarcada en lo establecido en el Acuerdo Ministerial 456 y el Acuerdo Ministerial 457</td><td><select class="acuerdoEnmarcado obligatorios__tabla ancho__total__input__selects" name="acuerdoEnmarcado"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_acuerdoEnmarcado" class="text_acuerdoEnmarcado ancho__total__textareas text_verificados"></textarea></td></tr></tbody></table><br><div class="col col-12 text-center"><a class="btn btn-info generar__caliFocal" style="cursor:pointer;"><i class="fas fa-save"></i>&nbsp;&nbsp;CALIFICAR</a></div><div class="row col col-12 columna__generadoraVe"><br><br><div class="col col-4" style="margin-top:2em!important;">OBSERVACIONES ADICIONALES:</div><div class="col col-8"><textarea style="margin-top:2em!important;" placeholder="Ingrese observaciones adicionales" name="observaAdicionales" class="ancho__total__textareas"></textarea></div><br><br><div class="col col-4" style="margin-top:2em!important;">CONCLUSIÓN:</div><div class="col col-8"><textarea style="margin-top:2em!important;" placeholder="Ingrese conclusión" name="conlcusion" id="conlcusion" class="ancho__total__textareas"></textarea></div><br><div class="col col-4 d d-flex justify-content-center" style="margin-top:2em!important;">Generar pdf</div><div class="col col-8 d d-flex justify-content-center" style="margin-top:2em!important;"><button type="submit" class="btn btn-warning">Generar&nbsp;&nbsp;<i class="fas fa-share-square"></i></button></div><br><div class="col col-4 d d-flex justify-content-center" style="margin-top:2em!important;">Subir pdf firmado electronicamente</div><div class="col col-8 d d-flex justify-content-center" style="margin-top:2em!important;"><input type="file" id="pdfArchivos" name="pdfArchivos"/></div></div></form>');

						segmentosSelectsCOncendidosPrimero($(".generar__caliFocal"),"select",$(".columna__generadoraVe"),$("#enviarTramite"));

						$(".columna__generadoraVe").hide();

						
				}else if($("#idRolAd").val()==3 && ($("#fisicamenteE").val()==12 ||  $("#fisicamenteE").val()==14 ||  $("#fisicamenteE").val()==24)) {


					$(".contenedor__bodyCMatriz").append('<br><form class="col col-12 row generarDocumento" id="generarDocumento" action="modelosBd/pdf/pdf.modelo.php"  method="post"><input type="hidden" id="tipoDocumento" name="tipoDocumento" value="altoRendi"/><input type="hidden" id="tipoPdf" name="tipoPdf" value="informeTecnico"><input type="hidden" id="idUsuarioEn" name="idUsuarioEn" /><input type="hidden" id="idOrganismo" name="idOrganismo" /><input type="hidden" id="fisicamenteEn" name="fisicamenteEn" /><table class="col col-12" border="1" style="border:1px solid black!important;"><tbody class="contenido__altoRen"></tbody></table><br><div class="col col-12 text-center"><a class="btn btn-info generar__caliFocal" style="cursor:pointer;"><i class="fas fa-save"></i>&nbsp;&nbsp;CALIFICAR</a></div><div class="row col col-12 columna__generadoraVe"><br><br><div class="col col-4" style="margin-top:2em!important;">OBSERVACIONES ADICIONALES:</div><div class="col col-8"><textarea style="margin-top:2em!important;" placeholder="Ingrese observaciones adicionales" name="observaAdicionales" class="ancho__total__textareas"></textarea></div><br><br><div class="col col-4" style="margin-top:2em!important;">CONCLUSIÓN:</div><div class="col col-8"><textarea style="margin-top:2em!important;" placeholder="Ingrese conclusión" name="conlcusion" id="conlcusion" class="ancho__total__textareas"></textarea></div><br><div class="col col-4 d d-flex justify-content-center" style="margin-top:2em!important;">Generar pdf</div><div class="col col-8 d d-flex justify-content-center" style="margin-top:2em!important;"><button type="submit" class="btn btn-warning">Generar&nbsp;&nbsp;<i class="fas fa-share-square"></i></button></div><br><div class="col col-4 d d-flex justify-content-center" style="margin-top:2em!important;">Subir pdf firmado electronicamente</div><div class="col col-8 d d-flex justify-content-center" style="margin-top:2em!important;"><input type="file" id="pdfArchivos" name="pdfArchivos"/></div></div></form>');

					segmentosSelectsCOncendidosPrimero($(".generar__caliFocal"),"select",$(".columna__generadoraVe"),$("#enviarTramite"));

					$(".columna__generadoraVe").hide();

					for (cActividad3 of actividad3) {

						if (cActividad3.totalActividad3!="0" || cActividad3.totalActividad3!=null) {

							$("#generarDocumento").append('<input type="hidden" name="salario3" value="'+parseFloat(cActividad3.totalActividad3).toFixed(2)+'">');


							$(".contenido__altoRen").append('<tr><th rowspan="2" colspan="3" style="vertical-align:middle;">003 CAPACITACIÓN DEPORTIVA O RECREATIVA</th><th colspan="1">MONTO POA</th></tr><tr><th colspan="1">'+parseFloat(cActividad3.totalActividad3).toFixed(2)+'</th></tr><tr><th>N°</th><th>ANÁLISIS DE LA CONDICIÓN</th><th>CUMPLE</th><th>OBSERVACIONES PARA LA<br>ORGANIZACIÓN<br> DEPORTIVA<br><span style="color:red!important;">(MANDATORIA)</span></th></tr><tr><td>1</td><td>REGISTRA EN LA PROGRAMACION DEPORTIVA ANUAL ACTIVIDADES CORRESPONDIENTES A LA ACTIVIDAD 003 GASTOS EN TEMAS DE CAPACITACIÓN DEPORTIVA</td><td><select class="ancho__total__textareas text_verificados obligatorios__tabla ancho__total__input__selects" name="ancho__total__textareas text_verificados"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_ancho__total__textareas text_verificados" class="text_ancho__total__textareas text_verificados ancho__total__textareas"></textarea></td></tr><tr><td>2</td><td>REGISTRA EVENTOS DE CAPACITACIÓN (TALLERES, SEMINARIOS, CONGRESOS, ETC) PARA PARA CIENCIAS APLICADAS DE MANERA PROGRESIVA ORIENTADOS A ATLETAS, FUERZA TÉCNICA, CIENCIAS APLICADAS, DIRECTIVOS Y PERSONAL DE JUZGAMIENTO</td><td><select class="talleresSeminarios obligatorios__tabla ancho__total__input__selects" name="talleresSeminarios"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_talleresSeminarios" class="text_talleresSeminarios ancho__total__textareas text_verificados"></textarea></td></tr>');

						}else{

							$("#generarDocumento").append('<input type="hidden" name="salario3">');

						}

					}


					for (cActividad4 of actividad4) {

						if (cActividad4.totalActividad4!="0" || cActividad4.totalActividad4!=null) {

							$("#generarDocumento").append('<input type="hidden" name="salario4" value="'+parseFloat(cActividad4.totalActividad4).toFixed(2)+'">');

							$(".contenido__altoRen").append('<tr><th rowspan="2" colspan="3" style="vertical-align:middle;">004 OPERACIÓN DEPORTIVA</th><th colspan="1">MONTO POA</th></tr><tr><th colspan="1">'+parseFloat(cActividad4.totalActividad4).toFixed(2)+'</th></tr><tr><td>1</td><td>REGISTRA LOS RECURSOS DESTINADOS PARA SUELDOS Y SALARIOS DE ENTRENADORES, EQUIPO TÉCNICO DE APOYO (MONITOR, INSTRUCTOR), EQUPO TÉCNICO DE CIENCIAS APLICADAS, Y ESTÁ ACORDE AL OBJETO DEL ORGANISMO DEPORTIVO</td><td><select class="recursosSueldos obligatorios__tabla ancho__total__input__selects" name="recursosSueldos"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_recursosSueldos" class="text_recursosSueldos ancho__total__textareas text_verificados"></textarea></td></tr><tr><td>2</td><td>NO SE HAN CREADO NUEVOS PUESTOS DE TRABAJO DE TÉCNICOS EN RELACIÓN AL POA OD 2021</td><td><select class="noCreacionP obligatorios__tabla ancho__total__input__selects" name="noCreacionP"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_noCreacionP" class="text_noCreacionP ancho__total__textareas text_verificados"></textarea></td></tr><tr><td>3</td><td>EL ORGANISMO DEPORTIVO NO INCREMENTA EL MONTO TOTAL DE HONORARIOS DEL PERSONAL TÉCNICO RESPECTO DEL POA OD 2021</td><td><select class="noIncrementaH obligatorios__tabla ancho__total__input__selects" name="noIncrementaH"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_noIncrementaH" class="text_noIncrementaH ancho__total__textareas text_verificados"></textarea></td></tr><tr><td>4</td><td>LOS RECURSOS DESTINADOS PARA SUELDOS Y SALARIOS DE ENTRENADORES, EQUIPO TÉCNICO DE APOYO (MONITOR, INSTRUCTOR), EQUPO TÉCNICO DE CIENCIAS APLICADAS, ESTÁN ACORDE A LA PRIORIDAD DEPORTIVA DE LA INSITUCIÓN </td><td><select class="prioridadInstitucion obligatorios__tabla ancho__total__input__selects" name="prioridadInstitucion"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_prioridadInstitucion" class="text_prioridadInstitucion ancho__total__textareas text_verificados"></textarea></td></tr>');

						}else{

							$("#generarDocumento").append('<input type="hidden" name="salario4">');

						}

					}

					for (cActividad5 of actividad5) {

						if (cActividad5.totalActividad5!="0" || cActividad5.totalActividad5!=null) {

							$("#generarDocumento").append('<input type="hidden" name="salario5" value="'+parseFloat(cActividad5.totalActividad5).toFixed(2)+'">');

							$(".contenido__altoRen").append('<tr><th rowspan="2" colspan="3" style="vertical-align:middle;">005 EVENTOS DE PREPARACIÓN Y COMPETENCIA</th><th colspan="1">MONTO POA</th></tr><tr><th colspan="1">'+parseFloat(cActividad5.totalActividad5).toFixed(2)+'</th></tr><tr><td>1</td><td>REGISTRA EN LAS ACTIVIDADES DEPORTIVAS CORRESPONDIENTES A LA ACTIVIDAD  CONCENTRADO, CAMPAMENTO, BASE DE ENTRENAMIENTO, EVALUACIONES Y CAMPEONATO ACORDE A LA PRIORIDAD DE LA DISCIPLIAN DEPORTIVA</td><td><select class="registraConcentrado obligatorios__tabla ancho__total__input__selects" name="registraConcentrado"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_registraConcentrado" class="text_registraConcentrado ancho__total__textareas text_verificados"></textarea></td></tr><tr><td>2</td><td>PRESENTA EL CERTIFICADO DE VALIDACIÓN DE EVENTOS, SUSCRITO POR EL DIRECTOR TÉCNICO METODOLÓGICO (SOLO PROVINCIALES)</td><td><select class="certificadoValidacion obligatorios__tabla ancho__total__input__selects" name="certificadoValidacion"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_certificadoValidacion" class="text_certificadoValidacion ancho__total__textareas text_verificados"></textarea></td></tr><tr><td>3</td><td>LA PLANIFICACIÓN DEL INDICADOR COINCIDE CON LOS EVENTOS DEPORTIVOS PLANIFICADOS </td><td><select class="coincidePla obligatorios__tabla ancho__total__input__selects" name="coincidePla"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_coincidePla" class="text_coincidePla ancho__total__textareas text_verificados"></textarea></td></tr><tr><td>4</td><td>UTILIZA LA SINTAXIS CLARA PARA EL REGISTRO DE LOS EVENTOS</td><td><select class="sintaxisClaraRe obligatorios__tabla ancho__total__input__selects" name="sintaxisClaraRe"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_noIncrementaH" class="text_sintaxisClaraRe ancho__total__textareas text_verificados"></textarea></td></tr><tr><td>5</td><td>REGISTRA CONCENTRADO, CAMPAMENTO, BASE DE ENTRENAMIENTO, EVALUACIONES Y CAMPEONATO PARA LA CATEGORÍA MENORES, PREJUVENIL, JUVENIL Y ABSOLUTO A NIVEL INTERNACIONAL</td><td><select class="registraConcentradoA5Inter obligatorios__tabla ancho__total__input__selects" name="registraConcentradoA5Inter"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_registraConcentradoA5Inter" class="text_registraConcentradoA5Inter ancho__total__textareas text_verificados"></textarea></td></tr><tr><td>6</td><td>REGISTRA CONCENTRADO, CAMPAMENTO, BASE DE ENTRENAMIENTO, EVALUACIONES Y CAMPEONATO PARA LA CATEGORÍA MENORES, PREJUVENIL, JUVENIL Y ABSOLUTO A NIVEL NACIONAL</td><td><select class="registraConcentradoA5Nacio obligatorios__tabla ancho__total__input__selects" name="registraConcentradoA5Nacio"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_registraConcentradoA5Nacio" class="text_registraConcentradoA5Nacio ancho__total__textareas text_verificados"></textarea></td></tr><tr><td>7</td><td>UTILIZA RECURSOS PARA CUBRIR GASTOS AUTORIZADOS DE: PASAJES, ALIMENTACIÓN, HOSPEDAJE,  HIDRATACIÓN, MEDICINAS, ATENCIÓN MÉDICA, HONORARIOS DE ÁRBITROS Y JUECES, UNIFORMES, MOVILIZACIÓN INTERNA Y AL EXTERIOR DE LA DELEGACIÓN</td><td><select class="gastosDelega obligatorios__tabla ancho__total__input__selects" name="gastosDelega"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_gastosDelega" class="text_gastosDelega ancho__total__textareas text_verificados"></textarea></td></tr><tr><td>8</td><td>UTILIZA RECURSOS PARA CUBRIR PAGOS POR CONCEPTO DE SEGUROS Y BONO DEPORTIVO EN CONCENTRADO, CAMPAMENTO, BASE DE ENTRENAMIENTO, EVALUACIONES Y CAMPEONATO A NIVEL INTERNACIONAL</td><td><select class="segurosBonosI obligatorios__tabla ancho__total__input__selects" name="segurosBonosI"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_segurosBonosI" class="text_segurosBonosI ancho__total__textareas text_verificados"></textarea></td></tr><tr><td>9</td><td>LA PLANIFICACIÓN OPERATIVA ANUAL DEL ORGANISMO DEPORTIVO SE ENCUENTRA ENMARCADA EN LO ESTABLECIDO EN EL ACUERDO MINISTERIAL 456 Y EL ACUERDO MINISTERIAL 457.</td><td><select class="acuerdoC7 obligatorios__tabla ancho__total__input__selects" name="acuerdoC7"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_acuerdoC7" class="text_acuerdoC7 ancho__total__textareas text_verificados"></textarea></td></tr>');

						}else{

								$("#generarDocumento").append('<input type="hidden" name="salario5">');

						}

					}


					for (cActividad6 of actividad6) {

						if (cActividad6.totalActividad6!="0" || cActividad6.totalActividad6!=null) {

							$("#generarDocumento").append('<input type="hidden" name="salario6" value="'+parseFloat(cActividad6.totalActividad6).toFixed(2)+'">');

							$(".contenido__altoRen").append('<tr><th rowspan="2" colspan="3" style="vertical-align:middle;">006 ACTIVIDADES RECREATIVAS</th><th colspan="1">MONTO POA</th></tr><tr><th colspan="1">'+parseFloat(cActividad6.totalActividad6).toFixed(2)+'</th></tr><tr><td>1</td><td>REGISTRA EN LA PROGRAMACION DEPORTIVA ANUAL ACTIVIDADES  006 ACTIVIDADES RECREATIVAS</td><td><select class="actividadesSe obligatorios__tabla ancho__total__input__selects" name="actividadesSe"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_actividadesSe" class="text_actividadesSe ancho__total__textareas text_verificados"></textarea></td></tr><tr><td>2</td><td>UTILIZA RECURSOS PARA CUBRIR PAGOS POR CONCEPTO DE: MOVILIZACIÓN, ALIMENTACIÓN, HOSPEDAJE, INSCRIPCIONES, MEDICINAS, ATENCIÓN MÉDICA, HONORARIOS ÁRBITROS Y JUECES, INAUGURACIÓN Y CLAUSURA DEL EVENTO</td><td><select class="moMed obligatorios__tabla ancho__total__input__selects" name="moMed"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_moMed" class="text_moMed ancho__total__textareas text_verificados"></textarea></td></tr>');


						}else{

							$("#generarDocumento").append('<input type="hidden" name="salario6">');

						}

					}

					for (cActividad7 of actividad7) {

						if (cActividad7.totalActividad7!="0" || cActividad7.totalActividad7!=null) {

							$("#generarDocumento").append('<input type="hidden" name="salario7" value="'+parseFloat(cActividad7.totalActividad7).toFixed(2)+'">');

							$(".contenido__altoRen").append('<tr><th rowspan="2" colspan="3" style="vertical-align:middle;">007 IMPLEMENTACIÓN DEPORTIVA</th><th colspan="1">MONTO POA</th></tr><tr><th colspan="1">'+parseFloat(cActividad7.totalActividad7).toFixed(2)+'</th></tr><tr><td>1</td><td>EN EL CASO QUE PLANIFIQUE  IMPLEMENTACIÓN Y EQUIPAMIENTO DEPORTIVO REGISTRA EL DETALLE Y CANTIDADES REQUERIDAS DE CADA  IMPLEMENTO Y EQUIPO DEPORTIVO.</td><td><select class="implementaEqui obligatorios__tabla ancho__total__input__selects" name="implementaEqui"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_implementaEqui" class="text_implementaEqui ancho__total__textareas text_verificados"></textarea></td></tr><tr><td>2</td><td>UTILIZA  RECURSOS PARA LA COMPRA DE  IMPLEMENTACIÓN Y EQUIPAMIENTO DEPORTIVO ACORDE A LA NORMATIVA TÉCNICA DE LAS DISCIPLINAS DEPORTIVAS</td><td><select class="comprasDisci obligatorios__tabla ancho__total__input__selects" name="comprasDisci"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_comprasDisci" class="text_comprasDisci ancho__total__textareas text_verificados"></textarea></td></tr>');

						}else{

							$("#generarDocumento").append('<input type="hidden" name="salario7">');

						}

					}

					$(".contenido__altoRen").append('<tr><th rowspan="1" colspan="4" style="vertical-align:middle;">CONDICIÓNES GENERALES</th></tr><tr><td>1</td><td>LA PLANIFICACIÓN OPERATIVA ANUAL DEL ORGANISMO DEPORTIVO SE ENCUENTRA ENMARCADA EN LO ESTABLECIDO EN EL ACUERDO MINISTERIAL 456 Y EL ACUERDO MINISTERIAL 457.</td><td><select class="enmarcada456 obligatorios__tabla ancho__total__input__selects" name="enmarcada456"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_enmarcada456" class="text_enmarcada456 ancho__total__textareas text_verificados"></textarea></td></tr>');


				}else if($("#idRolAd").val()==3 && $("#fisicamenteE").val()==5){

					$(".contenedor__bodyCMatriz").append('<br><form class="col col-12 row generarDocumento" id="generarDocumento" action="modelosBd/pdf/pdf.modelo.php"  method="post"><input type="hidden" id="tipoDocumento" name="tipoDocumento" value="administrativo"/><input type="hidden" id="tipoPdf" name="tipoPdf" value="informeTecnico"><input type="hidden" id="idUsuarioEn" name="idUsuarioEn" /><input type="hidden" id="idOrganismo" name="idOrganismo" /><input type="hidden" id="fisicamenteEn" name="fisicamenteEn" /><table class="col col-12"><thead><tr><th  align="center">N</th><th  align="center">CONDICIÓN</th><th  align="center">CUMPLE</th><th  align="center">OBSERVACIONES PARA LA ORGANIZACIÓN DEPORTIVA</th></tr></thead><tbody><tr><td align="center">1</td><td align="left">Detalla satisfactoriamente la contratación o adquisición de bienes o servicios</td><td><select class="detallaContratacion obligatorios__tabla ancho__total__input__selects" name="detallaContratacion"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_detallaContratacion" class="text_detallaContratacion ancho__total__textareas text_verificados"></textarea></td></tr><tr><td align="center">2</td><td align="left">Justifica satisfactoriamente la contratación o adquisición del bien o servicio </td><td><select class="adquisicionBien obligatorios__tabla ancho__total__input__selects" name="adquisicionBien"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_adquisicionBien" class="text_adquisicionBien ancho__total__textareas text_verificados"></textarea></td></tr><tr><td align="center">3</td><td align="left">El monto total de la actividad 001 correspondientes a los grupos 53 y 57, no excede el valor total aprobado para esta misma actividad y grupo de gasto en el 2021</td><td><select class="montoAc53 obligatorios__tabla ancho__total__input__selects" name="montoAc53"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_montoAc53" class="text_montoAc53 ancho__total__textareas text_verificados"></textarea></td></tr><tr><td align="center">4</td><td align="left">Describe la actividad que justifica el pago de impuestos, tasas y contribuciones</td><td><select class="tasasContri obligatorios__tabla ancho__total__input__selects" name="tasasContri"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_tasasContri" class="text_tasasContri ancho__total__textareas text_verificados"></textarea></td></tr><tr><td align="center">5</td><td align="left">El pago de cada suministro de servicios básicos descrito, se encuentra en el informe aprobado del Ministerio del Deporte remitido por la Dirección de Planificación e Inversión</td><td><select class="informeRemitido obligatorios__tabla ancho__total__input__selects" name="informeRemitido"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_informeRemitido" class="text_informeRemitido ancho__total__textareas text_verificados"></textarea></td></tr><tr><td align="center">6</td><td align="left">resenta el reporte de inventarios de los vehículos, inmuebles, bienes de larga duración, bienes de control administrativo y existencias descargado de su sistema contable (donde conste toda la información financiera, fecha compra, descripción del bien, depreciación, valor en libros, saldos etc.) debidamente suscrito por el responsable financiero (contador/a) y el representante legal.</td><td><select class="financieraRe obligatorios__tabla ancho__total__input__selects" name="financieraRe"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_financieraRe" class="text_financieraRe ancho__total__textareas text_verificados"></textarea></td></tr><tr><td align="center">7</td><td align="left">Presenta Plan de mantenimiento de vehículos, bienes muebles e inmuebles, maquinaria y equipo debidamente suscrito por el representante legal.</td><td><select class="planMaquinaria obligatorios__tabla ancho__total__input__selects" name="planMaquinaria"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_planMaquinaria" class="text_planMaquinaria ancho__total__textareas text_verificados"></textarea></td></tr><tr><td align="center">8</td><td align="left">Presenta Declaración de Contrataciones y Adquisiciones donde conste el tipo de contratación pública de las actividades descritas en el POA y el trimestre en el que se contratará</td><td><select class="declaracionAdqui obligatorios__tabla ancho__total__input__selects" name="declaracionAdqui"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_declaracionAdqui" class="text_declaracionAdqui ancho__total__textareas text_verificados"></textarea></td></tr><tr><td align="center">9</td><td align="left">Presenta Informe de seguridad y riesgos de las instalaciones donde se describa los puntos de seguridad y vigilancia privada necesarios</td><td><select class="informeSeguridad obligatorios__tabla ancho__total__input__selects" name="informeSeguridad"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_informeSeguridad" class="text_informeSeguridad ancho__total__textareas text_verificados"></textarea></td></tr><tr><td align="center">10</td><td align="left">Presenta el informe debidamente suscrito por el representante legal, en el que se detalle qué tipo de servicio de limpieza requiere contratar y los metros cuadrados de la infraestructura administrativa anexando documentos de respaldo</td><td><select class="servicioLimpieza obligatorios__tabla ancho__total__input__selects" name="servicioLimpieza"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_servicioLimpieza" class="text_servicioLimpieza ancho__total__textareas text_verificados"></textarea></td></tr></tbody></table><br><div class="col col-12 text-center"><a class="btn btn-info generar__caliFocal" style="cursor:pointer;"><i class="fas fa-save"></i>&nbsp;&nbsp;CALIFICAR</a></div><div class="row col col-12 columna__generadoraVe"><br><br><div class="col col-4" style="margin-top:2em!important;">OBSERVACIONES ADICIONALES:</div><div class="col col-8"><textarea style="margin-top:2em!important;" placeholder="Ingrese observaciones adicionales" name="observaAdicionales" class="ancho__total__textareas"></textarea></div><br><br><div class="col col-4" style="margin-top:2em!important;">CONCLUSIÓN:</div><div class="col col-8"><textarea style="margin-top:2em!important;" placeholder="Ingrese conclusión" name="conlcusion" id="conlcusion" class="ancho__total__textareas"></textarea></div><br><div class="col col-4 d d-flex justify-content-center" style="margin-top:2em!important;">Generar pdf</div><div class="col col-8 d d-flex justify-content-center" style="margin-top:2em!important;"><button type="submit" class="btn btn-warning">Generar&nbsp;&nbsp;<i class="fas fa-share-square"></i></button></div><br><div class="col col-4 d d-flex justify-content-center" style="margin-top:2em!important;">Subir pdf firmado electronicamente</div><div class="col col-8 d d-flex justify-content-center" style="margin-top:2em!important;"><input type="file" id="pdfArchivos" name="pdfArchivos"/></div></div></form>');

						segmentosSelectsCOncendidosPrimero($(".generar__caliFocal"),"select",$(".columna__generadoraVe"),$("#enviarTramite"));

						$(".columna__generadoraVe").hide();


				}else if($("#idRolAd").val()==3 && $("#fisicamenteE").val()==7){


					$(".contenedor__bodyCMatriz").append('<br><form class="col col-12 row generarDocumento" id="generarDocumento" action="modelosBd/pdf/pdf.modelo.php"  method="post"><input type="hidden" id="tipoDocumento" name="tipoDocumento" value="talentoHumano"/><input type="hidden" id="tipoPdf" name="tipoPdf" value="informeTecnico"><input type="hidden" id="idUsuarioEn" name="idUsuarioEn" /><input type="hidden" id="idOrganismo" name="idOrganismo" /><input type="hidden" id="fisicamenteEn" name="fisicamenteEn" /><table class="col col-12"><thead><tr><th  align="center">N</th><th  align="center">CONDICIÓN</th><th  align="center">CUMPLE</th><th  align="center">OBSERVACIONES PARA LA ORGANIZACIÓN DEPORTIVA</th></tr></thead><tbody><tr><td align="center">1</td><td align="left">La planificación del  indicador tiene coherencia con el nombre del indicador y  se encuentra redactado en número entero</td><td><select class="coherenciaIndica obligatorios__tabla ancho__total__input__selects" name="coherenciaIndica"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_coherenciaIndica" class="text_coherenciaIndica ancho__total__textareas text_verificados"></textarea></td></tr><tr><td align="center">2</td><td align="left">Ejecuta la Planificación anual del personal administrativo y de servicios amparado en el Código de Trabajo.</td><td><select class="codigoTrabajo obligatorios__tabla ancho__total__input__selects" name="codigoTrabajo"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_codigoTrabajo" class="text_codigoTrabajo ancho__total__textareas text_verificados"></textarea></td></tr><tr><td align="center">3</td><td align="left">Ejecuta la Planificación anual del personal administrativo, relacionado a Contratos Civiles de servicios profesionales.</td><td><select class="ejecutaPlani obligatorios__tabla ancho__total__input__selects" name="ejecutaPlani"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_ejecutaPlani" class="text_ejecutaPlani ancho__total__textareas text_verificados"></textarea></td></tr><tr><td align="center">4</td><td align="left">El organismo deportivo no ha creado nuevos puestos de trabajo administrativos y de serviciosrespecto del POA 2021 (Acta de certificación suscritapor el responsable).</td><td><select class="nuevosPuestos obligatorios__tabla ancho__total__input__selects" name="nuevosPuestos"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_nuevosPuestos" class="text_nuevosPuestos ancho__total__textareas text_verificados"></textarea></td></tr><tr><td align="center">5</td><td align="left">El organismo deportivo no ha incrementado Contratos Civiles de servicios profesionales de personal administrativo, respecto del POA 2021 (Acta de certificación suscrita por el responsable).</td><td><select class="incrementoCiviles obligatorios__tabla ancho__total__input__selects" name="incrementoCiviles"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_incrementoCiviles" class="text_incrementoCiviles ancho__total__textareas text_verificados"></textarea></td></tr><tr><td align="center">6</td><td align="left">El organismo deportivo no incrementa la masa salarial relacionada al personal administrativo y de servicios respecto del POA 2021 (Acta de certificación suscrita por el responsable).</td><td><select class="masaSa obligatorios__tabla ancho__total__input__selects" name="masaSa"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_masaSa" class="text_masaSa ancho__total__textareas text_verificados"></textarea></td></tr><tr><td align="center">7</td><td align="left">El organismo deportivo no incrementa presupuesto relacionado a honorarios para Contratos Civiles de servicios profesionales de personal administrativo, respecto del POA 2021 (Acta de certificación suscrita por el responsable).</td><td><select class="contratosCiviles obligatorios__tabla ancho__total__input__selects" name="contratosCiviles"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_contratosCiviles" class="text_contratosCiviles ancho__total__textareas text_verificados"></textarea></td></tr><tr><td align="center">8</td><td align="left">Si planificó servicios básicos verificar que en la matriz de suministro el número de suministro cuente con informe de aprobación del Ministerio del Deporte</td><td><select class="serviciosVeri obligatorios__tabla ancho__total__input__selects" name="serviciosVeri"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_serviciosVeri" class="text_serviciosVeri ancho__total__textareas text_verificados"></textarea></td></tr><tr><td align="center">9</td><td align="left">En caso que planifique seguros de bienes y vehículos presenta el listado de bienes o vehículos con la respectiva cobertura</td><td><select class="planificoBienes obligatorios__tabla ancho__total__input__selects" name="planificoBienes"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_planificoBienes" class="text_planificoBienes ancho__total__textareas text_verificados"></textarea></td></tr></tbody></table><br><div class="col col-12 text-center"><a class="btn btn-info generar__caliFocal" style="cursor:pointer;"><i class="fas fa-save"></i>&nbsp;&nbsp;CALIFICAR</a></div><div class="row col col-12 columna__generadoraVe"><br><br><div class="col col-4" style="margin-top:2em!important;">OBSERVACIONES ADICIONALES:</div><div class="col col-8"><textarea style="margin-top:2em!important;" placeholder="Ingrese observaciones adicionales" name="observaAdicionales" class="ancho__total__textareas"></textarea></div><br><br><div class="col col-4" style="margin-top:2em!important;">CONCLUSIÓN:</div><div class="col col-8"><textarea style="margin-top:2em!important;" placeholder="Ingrese conclusión" name="conlcusion" id="conlcusion" class="ancho__total__textareas"></textarea></div><br><div class="col col-4 d d-flex justify-content-center" style="margin-top:2em!important;">Generar pdf</div><div class="col col-8 d d-flex justify-content-center" style="margin-top:2em!important;"><button type="submit" class="btn btn-warning">Generar&nbsp;&nbsp;<i class="fas fa-share-square"></i></button></div><br><div class="col col-4 d d-flex justify-content-center" style="margin-top:2em!important;">Subir pdf firmado electronicamente</div><div class="col col-8 d d-flex justify-content-center" style="margin-top:2em!important;"><input type="file" id="pdfArchivos" name="pdfArchivos"/></div></div></form>');

						segmentosSelectsCOncendidosPrimero($(".generar__caliFocal"),"select",$(".columna__generadoraVe"),$("#enviarTramite"));

						$(".columna__generadoraVe").hide();


				}else if($("#idRolAd").val()==3 && ($("#fisicamenteE").val()==6 || $("#fisicamenteE").val()==15 || $("#fisicamenteE").val()==27 || $("#fisicamenteE").val()==28 || $("#fisicamenteE").val()==29 || $("#fisicamenteE").val()==30 || $("#fisicamenteE").val()==31 || $("#fisicamenteE").val()==32 || $("#fisicamenteE").val()==33)){

					$(".contenedor__bodyCMatriz").append('<br><form class="col col-12 row generarDocumento" id="generarDocumento" action="modelosBd/pdf/pdf.modelo.php"  method="post"><input type="hidden" id="tipoDocumento" name="tipoDocumento" value="zonalE"/><input type="hidden" id="tipoPdf" name="tipoPdf" value="informeTecnico"><input type="hidden" id="idUsuarioEn" name="idUsuarioEn" /><input type="hidden" id="idOrganismo" name="idOrganismo" /><input type="hidden" id="fisicamenteEn" name="fisicamenteEn" /><table class="col col-12"><thead><tr><th  align="center">N</th><th  align="center">CONDICIÓN</th><th  align="center">CUMPLE</th><th  align="center">OBSERVACIONES PARA LA ORGANIZACIÓN DEPORTIVA</th></tr></thead><tbody><tr><td align="center">1</td><td align="left">La planificación del indicador tiene coherencia con el nombre del indicador   de la actividad 002 y  se encuentra redactado con número entero</td><td><select class="tieneCoherencia obligatorios__tabla ancho__total__input__selects" name="tieneCoherencia"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_tieneCoherencia" class="text_tieneCoherencia ancho__total__textareas text_verificados"></textarea></td></tr><tr><td align="center">2</td><td align="left">Planifican únicamente gastos de rehabilitación, readecuación y/o mantenimiento en aquellos escenarios deportivos que sean propiedad de la organización deportiva<br>Anexo: Documentación de la legalidad del predio (escritura, certificado de propiedad, etc.).</td><td><select class="gastosRea obligatorios__tabla ancho__total__input__selects" name="gastosRea"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_gastosRea" class="text_gastosRea ancho__total__textareas text_verificados"></textarea></td></tr><tr><td align="center">3</td><td align="left">Dentro de la planificación, destinan recursos para gastos de rehabilitación, readecuación y/o mantenimiento de los escenarios deportivos que son propiedad del Ministerio del Deporte, precautelando su correcto uso y funcionamiento.<br>Anexo: Documentación de la legalidad del predio (escritura, certificado de propiedad etc.)</td><td><select class="dentroRecursos obligatorios__tabla ancho__total__input__selects" name="dentroRecursos"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_dentroRecursos" class="text_dentroRecursos ancho__total__textareas text_verificados"></textarea></td></tr><tr><td align="center">4</td><td align="left">Utiliza los ítems presupuestarios aprobados del anexo 1, para la contratación del bienes y servicios respecto al tipo de intervenciones aprobados para la  rehabilitación, readecuación  y/o mantenimiento</td><td><select class="itemsAnexo1 obligatorios__tabla ancho__total__input__selects" name="itemsAnexo1"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_itemsAnexo1" class="text_itemsAnexo1 ancho__total__textareas text_verificados"></textarea></td></tr><tr><td align="center">5</td><td align="left">Mantiene concordancia el nombre de la intervención para rehabilitación, readecuación y/o mantenimiento con el escenario deportivo a intervenir y, los bienes y servicios involucrados en la intervención</td><td><select class="interRea obligatorios__tabla ancho__total__input__selects" name="interRea"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_interRea" class="text_interRea ancho__total__textareas text_verificados"></textarea></td></tr><tr><td align="center">6.1</td><td align="left">Presenta el Informe justificativo del gasto para la contratación o  adquisición de bienes o servicios en escenarios deportivo respecto a Rehabilitación y readecuación incluye:<br>- Análisis de precios unitarios<br>-Presupuesto<br>-Planos y anexos gráficos (debidamente suscritos por el profesional en la rama<br>-Registro fotográfico de la intervención a subsanar,<br>-Contemplar parámetros de accesibilidad universal; según corresponda al tipo de intervención aprobada en los lineamientos (fachadas exteriores, interiores, cubierta, pisos interiores, pisos exteriores, piscinas, instalaciones hidrosanitarias de las edificaciones deportivas, sistema eléctrico-electrónico).</td><td><select class="justificacionOperativa obligatorios__tabla ancho__total__input__selects" name="justificacionOperativa"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_justificacionOperativa" class="text_justificacionOperativa ancho__total__textareas text_verificados"></textarea></td></tr><tr><td align="center">6.2</td><td align="left">Presenta el Informe justificativo del gasto para la contratación o adquisición de bienes o servicios en escenarios deportivos respecto Mantenimiento incluye:<br>-Cuadro comparativo como estudio de mercado con análisis de precios unitarios respaldado por 3 cotizaciones<br>-Registro fotográfico de la intervención a subsanar <br>-Documentación de la legalidad del predio; según corresponda al tipo de intervención aprobada en los lineamientos (fachadas exteriores, interiores, cubierta, pisos interiores, pisos exteriores, piscinas, instalaciones hidrosanitarias de las edificaciones deportivas, sistema eléctrico-electrónico).</td><td><select class="informeJus obligatorios__tabla ancho__total__input__selects" name="informeJus"><option value="cumple">Cumple</option><option value="No cumple">No cumple</option><option value="No aplica">No aplica</option></select></td><td><textarea name="text_informeJus" class="text_informeJus ancho__total__textareas text_verificados"></textarea></td></tr></tbody></table><br><div class="col col-12 text-center"><a class="btn btn-info generar__caliFocal" style="cursor:pointer;"><i class="fas fa-save"></i>&nbsp;&nbsp;CALIFICAR</a></div><div class="row col col-12 columna__generadoraVe"><br><br><div class="col col-4" style="margin-top:2em!important;">OBSERVACIONES ADICIONALES:</div><div class="col col-8"><textarea style="margin-top:2em!important;" placeholder="Ingrese observaciones adicionales" name="observaAdicionales" class="ancho__total__textareas"></textarea></div><br><br><div class="col col-4" style="margin-top:2em!important;">CONCLUSIÓN:</div><div class="col col-8"><textarea style="margin-top:2em!important;" placeholder="Ingrese conclusión" name="conlcusion" id="conlcusion" class="ancho__total__textareas"></textarea></div><br><div class="col col-4 d d-flex justify-content-center" style="margin-top:2em!important;">Generar pdf</div><div class="col col-8 d d-flex justify-content-center" style="margin-top:2em!important;"><button type="submit" class="btn btn-warning">Generar&nbsp;&nbsp;<i class="fas fa-share-square"></i></button></div><br><div class="col col-4 d d-flex justify-content-center" style="margin-top:2em!important;">Subir pdf firmado electronicamente</div><div class="col col-8 d d-flex justify-content-center" style="margin-top:2em!important;"><input type="file" id="pdfArchivos" name="pdfArchivos"/></div></div></form>');

					segmentosSelectsCOncendidosPrimero($(".generar__caliFocal"),"select",$(".columna__generadoraVe"),$("#enviarTramite"));

					$(".columna__generadoraVe").hide();

				}

				}

				if ($("#idRolAd").val()==3){

					$("#idOrganismo").val($(".idOrganismoM").val());

					$("#fisicamenteEn").val($("#fisicamenteE").val());

					$("#idUsuarioEn").val($("#idUsuarioC").val());

					$("#enviarTramite").hide();
						
				}



				if($("#idRolAd").val()==3){

					funcionarios__normales($(".alto__fisiR"),$("#idUsuarioC").val());

					$(".observaciones__nestD").hide();

					$(".contenedor__reasignaciones").hide();

					segmentosSelectsCOncendidos($(".alto__fisiR"),$(".observaciones__nestD"));

					checkboxFunciones($("#checksDesicion"),$(".contenedor__reasignaciones"),$("#generarDocumento"));

				}

				if ($("#fisicamenteE").val()==27 || $("#fisicamenteE").val()==28 || $("#fisicamenteE").val()==29 || $("#fisicamenteE").val()==30 || $("#fisicamenteE").val()==31 || $("#fisicamenteE").val()==32 || $("#fisicamenteE").val()==33) {

					enviarTramitesGenerados($("#enviarTramite"),[$("#idOrganismoM").val(),$("#fisicamenteE").val(),$("#idUsuarioC").val(),$(".alto__fisiR").val()],$(".alto__fisiR"),$(".detalle__observaPri"),$("#idRolAd").val(),"generarDocumento","N/A","N/A","subsesAsigna__corInstalac");

				}else{

					enviarTramitesGenerados($("#enviarTramite"),[$("#idOrganismoM").val(),$("#fisicamenteE").val(),$("#idUsuarioC").val(),$(".alto__fisiR").val()],$(".alto__fisiR"),$(".detalle__observaPri"),$("#idRolAd").val(),"generarDocumento");

				}




				enviarTramitesGenerados($(".enviar__rFuncionarios"),[$("#idOrganismoM").val(),$("#fisicamenteE").val(),$("#idUsuarioC").val(),$(".alto__fisiR").val()],$(".alto__fisiR"),$(".detalle__observaPri"),$("#idRolAd").val(),"generarDocumento",false,"no__tramite");

			});

		},
		error:function(){

		}
				
	});		



  });

}

/*=====  End of Acciones reasignar trans  ======*/



var funcion__datatabletsAsignarEditarDos=function(tbody,table,parametro3,parametro4,parametro5){

  $(tbody).on("click","button.botonEditarOr",function(e){

  	e.preventDefault();

  	var data=table.row($(this).parents("tr")).data();

  	$(".input__1").val(data[2]);

  	$(".enviado").val(data[4]);

  	$(".modal-title").text(data[1]);

  	$(".select__tipoOrga").val(data[5]);

  	console.log(data)

  	/*================================
  	=            Insertar            =
  	================================*/
  	
	var insertaValidaciones=function(parametro1,parametro2,parametro3,parametro4,parametro5,parametro6,parametro7,parametro8,parametro9,parametro10){

	$(parametro1).click(function (e){


		e.preventDefault();	

		$(".boton__enlacesOcultos").hide();

		var confirm= alertify.confirm('¿Está seguro de '+parametro2+'?','¿Está seguro de '+parametro2+'?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

		confirm.set({transition:'slide'});    

		confirm.set('onok', function(){ //callbak al pulsar botón positivo
				  
			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo',parametro4);		

			var other_data = $('#'+parametro8).serializeArray();

			var array = new Array(); 

			$.each(other_data,function(key,input){
				paqueteDeDatos.append(input.name,input.value);
				array.push(input.value);
			});

			paqueteDeDatos.append('arrayInformacion', JSON.stringify(array));

			$.ajax({

				type:"POST",
				url:"modelosBd/inserta/insertaAcciones.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

			    	var elementos=JSON.parse(response);

			    	var mensaje=elementos['mensaje'];

			    	alertify.set("notifier","position", "top-center");
				    alertify.notify("Registro realizado correctamente", "success", 5, function(){});

					if(mensaje==1){

						table.ajax.reload();

						$(".boton__enlacesOcultos").show();

			    	}

				},
				error:function(){

				}
					
			});	

		});

		confirm.set('oncancel', function(){ //callbak al pulsar botón negativo

			alertify.set("notifier","position", "top-center");
			alertify.notify("Acción cancelada", "error", 1, function(){

				$(".boton__enlacesOcultos").show();
				$('.reload__Enviosrealizados').html(' ');

			}); 

		}); 

	});

	}  	

	insertaValidaciones($("#editarOrganismoC"),"de la información ingresada","confirm","editarCorreoOrga",null,null,null,"orgasModalOrForm");

	  	
  /*=====  End of Insertar  ======*/
  


  });

}


var funcion__datatabletsAsignarEditar=function(tbody,table,parametro3,parametro4,parametro5){

  $(tbody).on("click","button.botonEditarOr",function(e){

  	e.preventDefault();

  	var data=table.row($(this).parents("tr")).data();

  	$(".input__1").val(data[2]);

  	$(".enviado").val(data[5]);

  	$(".modal-title").text(data[1]);

  	$(".select__tipoOrga").val(data[6]);

  	/*================================
  	=            Insertar            =
  	================================*/
  	
	var insertaValidaciones=function(parametro1,parametro2,parametro3,parametro4,parametro5,parametro6,parametro7,parametro8,parametro9,parametro10){

	$(parametro1).click(function (e){


		e.preventDefault();	

		$(".boton__enlacesOcultos").hide();

		var confirm= alertify.confirm('¿Está seguro de '+parametro2+'?','¿Está seguro de '+parametro2+'?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

		confirm.set({transition:'slide'});    

		confirm.set('onok', function(){ //callbak al pulsar botón positivo
				  
			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo',parametro4);		

			var other_data = $('#'+parametro8).serializeArray();

			var array = new Array(); 

			$.each(other_data,function(key,input){
				paqueteDeDatos.append(input.name,input.value);
				array.push(input.value);
			});

			paqueteDeDatos.append('arrayInformacion', JSON.stringify(array));

			$.ajax({

				type:"POST",
				url:"modelosBd/inserta/insertaAcciones.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

			    	var elementos=JSON.parse(response);

			    	var mensaje=elementos['mensaje'];

			    	alertify.set("notifier","position", "top-center");
				    alertify.notify("Registro realizado correctamente", "success", 5, function(){});

					if(mensaje==1){

						table.ajax.reload();

						$(".boton__enlacesOcultos").show();

			    	}

				},
				error:function(){

				}
					
			});	

		});

		confirm.set('oncancel', function(){ //callbak al pulsar botón negativo

			alertify.set("notifier","position", "top-center");
			alertify.notify("Acción cancelada", "error", 1, function(){

				$(".boton__enlacesOcultos").show();
				$('.reload__Enviosrealizados').html(' ');

			}); 

		}); 

	});

	}  	

	insertaValidaciones($("#editarOrganismoC"),"de la información ingresada","confirm","editarCorreoOrga",null,null,null,"orgasModalOrForm");

	  	
  /*=====  End of Insertar  ======*/
  


  });

}


var funcion__datatabletsAsignarInforDos=function(tbody,table,parametro3,parametro4,parametro5){

  $(tbody).on("click","button."+parametro5,function(e){

  	e.preventDefault();

  	var data=table.row($(this).parents("tr")).data();

  	$(".asignado__titulos").text(data[1]);

  	for (var i =0;i<parametro4.length;i++) {
  		
  		$("."+parametro4[0]).val(data[parametro3[i]]);

  	}

  	$(".idOrganismo").val(data[4]);

  	var idUsuarioPrincipal=$("#idUsuarioPrincipal").val();

  	$(".idUsuarioPrincipalDos").val(idUsuarioPrincipal);


  });

}


var funcion__datatabletsAsignarInfor=function(tbody,table,parametro3,parametro4,parametro5){

  $(tbody).on("click","button."+parametro5,function(e){

  	e.preventDefault();

  	var data=table.row($(this).parents("tr")).data();

  	$(".asignado__titulos").text(data[1]);

  	for (var i =0;i<parametro4.length;i++) {
  		
  		$("."+parametro4[0]).val(data[parametro3[i]]);

  	}

  	$(".idOrganismo").val(data[5]);

  	var idUsuarioPrincipal=$("#idUsuarioPrincipal").val();

  	$(".idUsuarioPrincipalDos").val(idUsuarioPrincipal);


  });

}

var funcion__verItemsObtener=function(tbody,table,parametro3){

  $(tbody).on("click","button.verItems",function(e){

  	e.preventDefault();

  	var data=table.row($(this).parents("tr")).data();

  	$("#tablaItemsAc").dataTable().fnDestroy();

  	$(".titulo__modalItems").text("ITEMS DE "+data[1]);


  	$("#exampleModalLabel").text("Items de "+data[1]);

  	datatablets($("#tablaItemsAc"),"tablaItemsAc",[data[2]],objetos([1],["boton"],["<button class='eliminarItemAc estilo__botonDatatablets btn btn-danger pointer__botones'><i class='fas fa-trash'></i></button><center>"],[false],[false]),-1,["funcion__datatabletsEliminar"],["eliminarItemAc"],["itemAcElimina"],["elimina"],[1,0],['enviado','input__1']);

  	$(".elemento__escondidoI").val(data[2]);
  
  });

}

var funcion__datatabletsEditar=function(tbody,table,parametro3,parametro4,parametro5,parametro10,parametro11){

  $(tbody).on("click","button."+parametro3,function(e){

  	e.preventDefault();

  	var data=table.row($(this).parents("tr")).data();

  	console.log(data);

  	for (var i =0;i<parametro11.length;i++) {

  		if(parametro11[i]=="select__indiCadores"){

  			$("."+parametro11[i]).val(data[6]);

  		}else if (parametro11[i]=="select__grupoG") {

  			$("."+parametro11[i]).val(data[4]);

  		}else if(parametro11[i]=="inputActividades"){

  			$("."+parametro11[i]).val(data[0]);

  		}else if(parametro11[i]=="inputActividadesdos"){

  			$("."+parametro11[i]).val(data[0]);

  		}else if(parametro11[i]=="input__2Items"){

  			$("."+parametro11[i]).val(data[8]);

  		}else if(parametro11[i]=="select__2Objetivos"){

  			$("."+parametro11[i]).val(data[3]);

  		}else{

  			$("."+parametro11[i]).val(data[parametro10[i]]);

  		}
  		
  		

  	}


  	/*================================
  	=            Insertar            =
  	================================*/
  	
	var insertaValidaciones=function(parametro1,parametro2,parametro3,parametro4,parametro5,parametro6,parametro7,parametro8,parametro9,parametro10){

	$(parametro1).click(function (e){

		e.preventDefault();	

		$(".boton__enlacesOcultos").hide();

		$('.reload__Enviosrealizados').html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

		var confirm= alertify.confirm('¿Está seguro de '+parametro2+'?','¿Está seguro de '+parametro2+'?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

		confirm.set({transition:'slide'});    

		confirm.set('onok', function(){ //callbak al pulsar botón positivo
				  
			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo',parametro4);		

			var other_data = $('#'+parametro8).serializeArray();

			var array = new Array(); 

			$.each(other_data,function(key,input){
				paqueteDeDatos.append(input.name,input.value);
				array.push(input.value);
			});

			var emailPrincipal=$("#emailPrincipal").val();
			var nombrePrincipalU=$("#nombrePrincipalU").val();
			var idOrganismoPrincipal=$("#idOrganismoPrincipal").val();

			paqueteDeDatos.append("emailPrincipal",emailPrincipal);
			paqueteDeDatos.append("tabla",parametro5);
			paqueteDeDatos.append("valoresArray",JSON.stringify(parametro6));
			paqueteDeDatos.append("idBuscado",parametro7);
			paqueteDeDatos.append("nombrePrincipalU",nombrePrincipalU);
			paqueteDeDatos.append("idOrganismoPrincipal",idOrganismoPrincipal);

			paqueteDeDatos.append('arrayInformacion', JSON.stringify(array));

			$.ajax({

				type:"POST",
				url:"modelosBd/inserta/insertaAcciones.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

			    	var elementos=JSON.parse(response);

			    	var mensaje=elementos['mensaje'];

			    	alertify.set("notifier","position", "top-center");
				    alertify.notify("Registro realizado correctamente", "success", 5, function(){});

					if(mensaje==1){

						table.ajax.reload();

			    	}

				},
				error:function(){

				}
					
			});	

		});

		confirm.set('oncancel', function(){ //callbak al pulsar botón negativo

			alertify.set("notifier","position", "top-center");
			alertify.notify("Acción cancelada", "error", 1, function(){

				$(".boton__enlacesOcultos").show();
				$('.reload__Enviosrealizados').html(' ');

			}); 

		}); 

	});

	}  	

	insertaValidaciones($("#editaItemPrincipal"),"de la información ingresada","confirm","itemsPrincipalActualiza",null,null,null,"itemPrincipalForm");

	insertaValidaciones($("#editarActividades"),"de la información ingresada","confirm","actividadesActualiza",null,null,null,"actividadesForm");

	insertaValidaciones($("#editarGrupoGasto"),"de la información ingresada","confirm","grupoGastoActualiza",null,null,null,"grupoGastoForm");

	insertaValidaciones($("#editarLinea"),"de la información ingresada","confirm","lineaBaseActualiza",null,null,null,"lineaPoliticaForm");

	insertaValidaciones($("#editarPrograma"),"de la información ingresada","confirm","programaActualiza",null,null,null,"programaForm");

	insertaValidaciones($("#editarIndicadores"),"de la información ingresada","confirm","indicadoresActualiza",null,null,null,"indicadoresForm");

	insertaValidaciones($("#editarDeportes"),"de la información ingresada","confirm","deportesActualiza",null,null,null,"deportesForm");

	insertaValidaciones($("#editarAlcance"),"de la información ingresada","confirm","alcanceActualiza",null,null,null,"alcanceForm");

	insertaValidaciones($("#editarTipoFinan"),"de la información ingresada","confirm","tipoFinanActualiza",null,null,null,"financiamientoForm");

	insertaValidaciones($("#editarTipoFinan"),"de la información ingresada","confirm","tipoFinanActualiza",null,null,null,"financiamientoForm");

	insertaValidaciones($("#editarcargo"),"de la información ingresada","confirm","cargosActualiza",null,null,null,"cargoForm");

	insertaValidaciones($("#editarObjetivos"),"de la información ingresada","confirm","objetivosActualiza",null,null,null,"objetivoForm");

	insertaValidaciones($("#editarTipoOrganismo"),"de la información ingresada","confirm","tipoOrganismoActualiza",null,null,null,"tipoOrganismoForm");

	insertaValidaciones($("#editarAreaAccion"),"de la información ingresada","confirm","areaAccionActualiza",null,null,null,"areaAccionForm");

	insertaValidaciones($("#editaAreaEncargada"),"de la información ingresada","confirm","areaEncargadaActualiza",null,null,null,"areaEncargadaForm");

	  	
  /*=====  End of Insertar  ======*/
  
});

}

var funcion__datatabletsEliminar=function(tbody,table,parametro3,parametro4,parametro5){

  $(tbody).on("click","button."+parametro3,function(e){

  	e.preventDefault();

  	var boton=$(this);

  	$(boton).hide();

  	var data=table.row($(this).parents("tr")).data();

  	//alert(data)

  	if (data!="" && data!=" " && data!=null && data!=undefined) {

  		let idEnviado=data[1];

  	}


	let confirm= alertify.confirm('¿Está seguro de eliminar?','¿Está seguro de eliminar?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

	confirm.set({transition:'slide'});    

	confirm.set('onok', function(){ //callbak al pulsar botón positivo

		var paqueteDeDatos = new FormData();

		paqueteDeDatos.append('tipo',parametro4);	
		paqueteDeDatos.append('idEnviado',idEnviado);
		paqueteDeDatos.append('idEnviado2',data[2]);
			  
		$.ajax({

			type:"POST",
			url:"modelosBd/inserta/eliminaAcciones.md.php",
			contentType: false,
			data:paqueteDeDatos,
			processData: false,
			cache: false, 
			success:function(response){

		      	var elementos=JSON.parse(response);

		      	var mensaje=elementos['mensaje'];

				if(mensaje==1){

					alertify.set("notifier","position", "top-center");
					alertify.notify("Registro eliminado", "success", 4, function(){});

					table.ajax.reload();

		      	}

			},
			error:function(){

			}
				
		});		    

	});

	confirm.set('oncancel', function(){ 

		alertify.set("notifier","position", "top-center");
		alertify.notify("Acción cancelada", "error", 1, function(){

			$(boton).show();

		}); 

	});   


  });

}

var funcion__datatabletsObtener=function(tbody,table,parametro3,parametro4,parametro5,parametro6,parametro7){

  $(tbody).on("click","button.aprobacionUsuariosBoton",function(e){

      var data=table.row($(this).parents("tr")).data();

      $("#enviado").val(data[parametro6]);

      if (parametro5>=0) {
      	$("#tituloModalGenerico").text(data[parametro5]);
      }

      for(var i=0;i<parametro3.length;i++){

      	var variableId=parametro3[i];

      	 $("#"+variableId).text(data[parametro4[i]]);

      }

      /*==========================================
      =            Acciones por modal            =
      ==========================================*/

 	  switch (parametro7) {

	  	case "aprobacionUsuarios":

	  		$("#acuerdoMinisterial").html('<a href="documentos/acuerdosMinisteriales/'+data[17]+data[0]+'.pdf" targe="_blank">Acuerdo minsiterial</a>');

	  		if (data[31]!=null && data[31]!=null) {

	  			$(".modal-body").append("<div class='row mt-4 estilo__enlaces__modales primario__21 pointer__botones'><div class='col col-11 titulo__enfasis modales__titulos text-left'>Observaciones realizadas</div><div class='col col-1 item__remplazoModales'><i class='fas fa-angle-left'></i></div></div><div class='row d d-flex justify-content-center mt-2 atado__21'><div class='col col-4 titulo__enfasis atado__21'>Observación</div><div class='col col-8 atado__21 justificado__textos'>"+data[31]+"</div></div></div>");

	  			if (data[32]=="A") {

	  				var estadoCorrecion="En revisión por parte del organismo deportivo";

	  			}else if(data[32]=="C"){

	  				var estadoCorrecion="Revisión realizada por parte del organismo deportivo";

	  			}

	  			$(".modal-body").append("<div class='row d d-flex justify-content-center mt-2 atado__21'><div class='col col-4 titulo__enfasis atado__21'>Estado de  observación</div><div class='col col-8 text-left atado__21'>"+estadoCorrecion+"</div></div></div>");

	  		}else{

	  			$(".modal-body").append('');

	  		}
	  		

	  	break;

	  }     

	var cerrandoMenus=function(parametro1,parametro2){

		$(parametro1).click(function(e){

			if ($(parametro1).find('.item__remplazoModales').hasClass("sub__menuElementos")) {

				$(parametro1).find('.item__remplazoModales').removeClass("sub__menuElementos");

				$(parametro1).find('.item__remplazoModales').html('<i class="fas fa-angle-left"></i>');

				$(parametro2).hide();

			}else{

				$(parametro1).find('.item__remplazoModales').addClass("sub__menuElementos");

				$(parametro1).find('.item__remplazoModales').html('<i class="fal fa-angle-down" style="font-weight:bold; white;"></i>');

				$(parametro2).show();

			}

			

		});

	}

	cerrandoMenus($(".primario__21"),$(".atado__21"));
	cerrandoMenus($(".primario__22"),$(".atado__22"));
	cerrandoMenus($(".primario__22"),$(".atado__22"));
	cerrandoMenus($(".primario__23"),$(".atado__23"));
	cerrandoMenus($(".primario__24"),$(".atado__24"));
	cerrandoMenus($(".primario__25"),$(".atado__25"));
	cerrandoMenus($(".primario__26"),$(".atado__26"));
	cerrandoMenus($(".primario__27"),$(".atado__27"));
	cerrandoMenus($(".primario__28"),$(".atado__28"));
	cerrandoMenus($(".primario__29"),$(".atado__29"));
	cerrandoMenus($(".primario__30"),$(".atado__30"));
	cerrandoMenus($(".primario__31"),$(".atado__31"));


	$(".atado__21").hide();
	$(".atado__22").hide();
	$(".atado__23").hide();
	$(".atado__24").hide();
	$(".atado__25").hide();
	$(".atado__26").hide();
	$(".atado__27").hide();
	$(".atado__28").hide();
	$(".atado__29").hide();
	$(".atado__30").hide();
	$(".atado__31").hide();

      /*=====  End of Acciones por modal  ======*/



      console.log(data);


  });

 }




