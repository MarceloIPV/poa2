
 <?php 	

 require_once "../../config/config2.php";

 $objeto= new usuarioAcciones();

 $indicadorInformacion=$objeto->getObtenerInformacionGeneral("select nombreActividades,nombreEvento from poa_actividades as c, poa_programacion_financiera as a,poa_actdeportivas as b 
     where c.idActividades = a.idActividad
     and a.idProgramacionFinanciera=b.idProgramacionFinanciera
     and a.idActividad= '1'
     and idOrganismo = '1085'  
     and a.idProgramacionFinanciera group by nombreEvento");

 $jason['indicadorInformacion']=$indicadorInformacion;
 
?>
