<?php
class perfilObservadorC
{
    public static function perfilO()
    {
        extract($_POST);

        if (isset($_POST["ingresarUsuario"])) {

            if($_POST["ingresarUsuario"] == 1){
                session_start();

                $_SESSION['valorUsuarioOB'] = $usuario;
                $_SESSION['valorContraOB'] = $pass;

                $_SESSION["iniciarSesion"]="ok";
				$_SESSION["idUsuario"]=154;
				$_SESSION["idRol"]=2;
				$_SESSION["fisicamenteEstructura"]=18;
				$_SESSION["tipo"]="funcionario";
				$_SESSION['testing'] = time(); 

				echo '<script>window.location="poaResolucionFinal"</script>';
            }else if($_POST["ingresarUsuario"] == 2){
                
                session_start();

				$_SESSION["iniciarSesion"]="ok";
				$_SESSION["idUsuario"]=500;
				$_SESSION["idRol"]=2;
				$_SESSION["fisicamenteEstructura"]=20;
				$_SESSION["tipo"]="funcionario";
				$_SESSION['testing'] = time(); 
						
				echo '<script>window.location="poasGlobalesRecibidos"</script>';
            }else if($_POST["ingresarUsuario"] == 3){
                session_start();

				$_SESSION["iniciarSesion"]="ok";
				$_SESSION["idUsuario"]=174;
				$_SESSION["idRol"]=7;
				$_SESSION["fisicamenteEstructura"]=24;
				$_SESSION["tipo"]="funcionario";
				$_SESSION['testing'] = time(); 
						
				echo '<script>window.location="reporteriaFinal"</script>';
                
            }else if($_POST["ingresarUsuario"] == 4){
                session_start();

				$_SESSION["iniciarSesion"]="ok";
				$_SESSION["idUsuario"]=1325;
				$_SESSION["idRol"]=3;
				$_SESSION["tipo"]="poa";
				$_SESSION['testing'] = time(); 

				echo '<script>window.location="paidPoaSeleccion"</script>';
            }
            
        }
    }
}