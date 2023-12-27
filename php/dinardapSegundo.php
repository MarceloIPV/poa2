<?php

error_reporting(0);

require_once "../conexion/conexion.php";

extract($_POST);

$datos=trim($_POST['cedula']);

$consulta=array('numeroIdentificacion'=>$datos,'codigoPaquete'=>'73');


try{

  $location_URL = 'http://servicio.interoperadorws.interoperacion.dinardap.gob.ec/IInteroperador/getFichaGeneral';
  $wsdl = 'http://interoperabilidad.dinardap.gob.ec:7979/interoperador?wsdl';
  $user="usr_deporte";
  $parametros['loggin']=$user;
  $clave=htmlentities('7iHOj%k!Z5');
  $parametros['pass']=$clave;
  $options = array('login' => $user,'password' => $clave);

  $client = new SoapClient($wsdl,$options);
  $result = $client->getFichaGeneral($consulta);
  $value=array();
  $value_error=array();

  $value_error=$result->return->mensaje;

  if(count($value_error)>0){


    $value['error']='1';
    echo json_encode($value);
    exit();

  }else{  

     $datos=array();  

     foreach($result->return->instituciones->datosPrincipales->registros as   $registros){  

      $campo=$registros->campo;
      $value[$campo]=$registros->valor;

     }
    
    list($dia,$mes,$año)=explode("/",$value['fechaNacimiento']);
    $value['fechaNacimiento']=trim($año."-".$mes."-".$dia);


    echo json_encode($value);

  }

}
catch(SoapFault $e){

 $mensaje=10;
 $value['mensaje']=$mensaje;

 echo json_encode($value);

}
