<?php 	
	
extract($_POST);
require_once "../../config/config2.php";
session_start();
$idOrganismoSession = $_SESSION["idOrganismoSession"];
$objeto= new usuarioAcciones();



$indicadorInformacion=$objeto->getObtenerInformacionGeneral("SELECT * from poa_modificacion_organismo_actividades where idOrganismo=$idOrganismoSession");

$jason['indicadorInformacion']=$indicadorInformacion;



    ?>
    <h5 align="center">Origen</h5>
    <div style="height:300px; overflow: scroll;">
    <table class='col col-12 table__bordes__ejecutados mt-4'>

        <thead>



            <tr class=''>

                <th class='vertical__aign'><center>Origen</center></th>          
                <th class='vertical__aign'><center>Item</center></th>   	
                <th class='vertical__aign'><center>Mes </center></th>
                <th class='vertical__aign'><center>Monto</center></th>
                <th class='vertical__aign'><center>Destino</center></th>          
                <th class='vertical__aign'><center>Item</center></th>   	
                <th class='vertical__aign'><center>Mes </center></th>
                <th class='vertical__aign'><center>Monto</center></th>
            </tr>

        </thead>

        <tbody>
            <tr>
                <?php 


                foreach ($indicadorInformacion as $row)
                {
                    $mes1= $row["mesOrigen"];
                    $mes2= $row["mesDestino"];
                    
                    ?>

                    <td>
                        <center>
                            <label><?php echo $mes1; ?></label>
                        </center>
                    </td>
             


                </tr>
            <?php 	} ?>
        </tbody>



    </table>
</div>


  