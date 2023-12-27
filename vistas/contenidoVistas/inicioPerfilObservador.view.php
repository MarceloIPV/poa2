<?php
extract($_POST);

?>


<html lang="en">
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="logoMinisterio" height="60" width="60">
</div>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Seleccion POA PAID -->
    <link rel="stylesheet" href="layout/styles/css/paid-alto-rendimiento/style-par.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>


</head>

<body>
    <center><img src="././images/paidpoa.PNG" width="100px"></center>

    <div class="continer">

        <center><button class="btn btn-danger">
                <a href="salir">
                    <p style="color: white;">Cerrar Sesión</p>
                </a>
            </button>
        </center>

        <section class="row d d-flex justify-content-center">
            <h3 class="title-cards1">
                Perfiles
            </h3>
            <div class="title-cards">
                <h5>SELECCIONE EL TIPO DE PERFIL</h5>
            </div>

            <div class="col-12 row d-flex">
                <form class="col-md-3" method="post">
                    <button type="submit" name="ingresarUsuario" id="ingresarUsuario" class="btn btn-warning" style="background-color: white; border-color:white" value="1">
                        <div class="card1" style="width: 80%; height: 350px; padding-right: 0px !important;">
                            <figure>
                                <center><span class="far fa-file-alt fa-10x iconos_edit1"></span></center>
                            </figure>
                            <div class="contenido-card">
                                <h1></h1>
                                <h2>DIRECTOR DE PLANIFICACIÓN</h2>
                            </div>
                        </div>
                    </button>

                    <?php

                        require_once CONTROLADOR . PERFILOBSERVADOR . 'observador.controlador.php';

                        $seleccion = new perfilObservadorC();
                        $seleccion->perfilO();

                    ?>
                </form>
                <form id="" class="col-md-3" method="post">
                    <button type="submit" name="ingresarUsuario" id="ingresarUsuario" class="btn btn-warning" style="background-color: white; border-color:white" value="2">
                        <div class="card1" style="width: 80%; height: 350px; padding-right: 0px !important;">
                            <figure>
                                <center><span class="far fa-file-alt fa-10x iconos_edit1"></span></center>
                            </figure>
                            <div class="contenido-card">
                                <h1></h1>
                                <h2>Directora de Seguimiento</h2>
                            </div>
                        </div>
                    </button>

                    <?php

                        $seleccion = new perfilObservadorC();
                        $seleccion->perfilO();

                    ?>
                </form>
                <form id="" class="col-md-3" method="post">
                    <button type="submit" name="ingresarUsuario" id="ingresarUsuario" class="btn btn-warning" style="background-color: white; border-color:white" value="3">
                        <div class="card1" style="width: 80%; height: 350px; padding-right: 0px !important;">
                            <figure>
                                <center><span class="far fa-file-alt fa-10x iconos_edit1"></span></center>
                            </figure>
                            <div class="contenido-card">
                                <h1></h1>
                                <h2>SUB-SECRETARIO ALTO RENDIMIENTO</h2>
                            </div>
                        </div>
                    </button>

                    <?php

                        $seleccion = new perfilObservadorC();
                        $seleccion->perfilO();

                    ?>
                </form>
                <form class="col-md-3" method="post">
                    <button type="submit" name="ingresarUsuario" id="ingresarUsuario" class="btn btn-warning" style="background-color: white; border-color:white" value="4">
                        <div class="card1" style="width: 80%; height: 350px; padding-right: 0px !important;">
                            <figure>
                                <center><span class="far fa-file-alt fa-10x iconos_edit1"></span></center>
                            </figure>
                            <div class="contenido-card">
                                <h1></h1>
                                <h2>ORGANIZACIÓN DEPORTIVA (FEDENAES)</h2>
                            </div>
                        </div>
                    </button>

                    <?php

                        $seleccion = new perfilObservadorC();
                        $seleccion->perfilO();

                    ?>

                </form>
            </div>


        </section>

    </div>


</body>

</html>