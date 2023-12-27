
if ($("#usuarioP").val()=="si") {
	datatablets($("#poasGestionados"),"poasGestionados",false,objetos([6,9,10],["enlace","boton","boton"],['documento',"<center><button class='editarGestionados estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#editarInfor__gestionados'><i class='fas fa-user-edit'></i></button><center>","<center><button class='generarVerG btn btn-warning pointer__botones' data-toggle='modal' data-target='#verPoaGe'><i class='fas icono__boton fa-eye'></i></button><center>"],["documentos/aprobacion/",false,false],["documento",false,false]),1,[false,"funcionEditar__gestionados","funcionEditar__gestionados_s"],false,false,false);
}else{
	datatablets($("#poasGestionados"),"poasGestionados",false,objetos([6,9],["enlace","boton"],['documento',"<center><button class='generarVerG btn btn-warning pointer__botones' data-toggle='modal' data-target='#verPoaGe'><i class='fas icono__boton fa-eye'></i></button><center>"],["documentos/aprobacion/",false],["documento",false]),1,[false,"funcionEditar__gestionados_s"],false,false,false);
}

