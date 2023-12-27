<link href='layout/styles/css/styleRegistro.css' rel='stylesheet' type='text/css'>

<div class="modal-dialog modal-xl">

  <form id="formularioRegistro" class="modal-content">

    <div class="modal-header row">

      <div class="col col-11 text-center">

        <h5 class="modal-title" id="exampleModalLabel">REGISTRO DE ORGANISMO DEPORTIVO</h5>

      </div>

      <div class="col col-1">

        <button type="button" class="btn-close cerrar__modalRegistros cerrar__reload__inicio reload__ModalesA" data-bs-dismiss="modal" aria-label="Close" style="margin-bottom: 10px;"><i class="fa fa-times"></i></button>

      </div>

    </div>

    <div class="modal-body d d-md-flex " id="mbodyalineacion">

      <!--===============================================
        =            Sumando archivo de envíos            =
        ================================================-->

      <div class="col col-12 row documentos__confidenciales contenedor__documentosConfidenciales">

        <div class="col col-12 text-center">

          <a id="acuerdoConfidencialidadEnlace" target="_blank">REGISTRO DE CREDENCIALES</a>

        </div>

        <div class="col col-4 col-md-4 d d-flex mt-4">

          Ingresar usuario (El usuario es el ruc del organismo deportivo)

        </div>


        <div class="container-input d d-flex align-items-center col col-8 col-md-8">

          <input type="text" id="usuarioOrganismos" name="usuarioOrganismos" class="input__registros campos__obligatorios__dos" />

        </div>



        <div class="col col-4 col-md-4 d d-flex mt-4">

          Generar código de verificación (Ingresar previamente el usuario)

        </div>


        <div class="container-input d d-flex align-items-center col col-8 col-md-8">

          <a id="generarCodigoVerficacion" class="btn btn-primary pointer__botones"><i class="fas fa-share-square"></i></a>

        </div>


        <div class="col col-4 col-md-4 d d-flex mt-4">

          Ingresar código de verificación

        </div>


        <div class="container-input d d-flex align-items-center col col-8 col-md-8">

          <input type="text" id="codigoVerificacion" name="codigoVerificacion" class="input__registros campos__obligatorios__dos" />

        </div>



        <div class="col col-4 col-md-4 d d-flex mt-4">

          Ingresar contraseña

        </div>


        <div class="container-input d d-flex align-items-center col col-8 col-md-8">

          <input type="password" id="passwordOrganismoReset" name="passwordOrganismoReset" class="input__registros campos__obligatorios__dos" />&nbsp;&nbsp;<i class="fas fa-eye" id="ojo_icono" style="padding: .5em; cursor: pointer;"></i>

        </div>

        <div class="visualizar__error__password col col-12 text-center"></div>


      </div>

      <!--====  End of Sumando archivo de envíos  ====-->

      <div class="row bloques__registros d d-flex flex-column justify-content-start" style="width:100!important">

        <div class="col col-12 text-center titulos__ModalSeccion">ORGANISMO DEPORTIVO</div>

        <div class="rucRotulo negrilla__titulosEnlazados campos__obligatoriosRotulos col col-12 mt-2"></div>

        <div class="col col-12 mt-2 d d-flex align-items-center">

          <div class="col col-12 mt-2 d d-block align items-center">

            <input type="text" id="rucOrganismo" name="rucOrganismo" class="input__registros campos__obligatorios solo__numero" placeholder="Ruc organismo deportivo"><span class="barra"></span>
          
          </div>

          &nbsp;&nbsp;&nbsp;&nbsp;
    
          <i class="fas fa-search"></i>

        </div>

        <div class="col col-12 counter__Ruc text-center mt-2"></div>

        <div class="col col-12 counter__rucOrganismoMensajes text-center mt-2 valida__erroresEscritura"></div>


        <div class="nombreOrganismoRotulo negrilla__titulosEnlazados campos__obligatoriosRotulos col col-12 mt-2"></div>

        <div class="col col-12 mt-2 d d-flex align-items-center">

          <i class="fa fa-file-signature"></i>

          &nbsp;&nbsp;
          
          <div class="col col-12 mt-2 d d-block align-items-center">

            <input type="text" id="nombreOrganismo" name="nombreOrganismo" class="input__registros campos__obligatorios" placeholder="Nombre organismo deportivo"><span class="barra"></span>

          </div>
        </div>



        <div class="col col-12 mt-2 negrilla__titulosEnlazados campos__obligatoriosRotulos">Tipo organismo deportivo</div>

        <div class="row">

          <div class="col col-11 mt-2 d d-flex align-items-center">

            <i class="fa fa-clipboard"></i>

            &nbsp;&nbsp;

            <div class="col col-11 mt-2 d d-block align-items-center">

              <select type="text" id="tiposOrganimosDeportivos" name="tiposOrganimosDeportivos" class="input__registros campos__obligatorios"></select><span class="barra2"></span>

            </div>

          </div>


          <div class="ver__enlacesTipos pointer__botones btn btn-warning col col-1 mt-2" id="ojobtn"><i class="fas fa-eye icono__ojoTipo"></i></div>

        </div>


        <div class="row enlazados__tipoOrganismos">

          <div class="col col-6 negrilla__titulosEnlazados text-justify mt-2 justificado__textos">

            Área de acción

          </div>


          <div class="col col-12 mt-2 d d-flex align-items-center">

            <input type="hidden" id="areaDeAccion" name="areaDeAccion">

            <div class="area__accionRotulo text-justify mt-2 justificado__textos uppercase__texto"></div>

          </div>

          <div class="col col-12 mt-2 d d-flex align-items-center">

            <input type="hidden" id="lineaPolitica" name="lineaPolitica">

            <div class="linea__politicaRotulo text-justify mt-2 justificado__textos"></div>

          </div>

          <div class="col col-12 mt-2 d d-flex align-items-center negrilla__titulosEnlazados text-justify mt-2 justificado__textos">

            Área encargada de analizar Actividades de fomento deportivo, de la educación física y de la recreación

          </div>

          <input type="hidden" id="objetivoEstategico" name="objetivoEstategico">

          <div class="col col-12 mt-2 d d-flex align-items-center">

            <input type="hidden" id="areaEncargada" name="areaEncargada">

            <div class="area__encargadaRotulo text-justify mt-2 justificado__textos uppercase__texto"></div>

          </div>

        </div>

        <input type="hidden" id="passwordOrganismo" name="passwordOrganismo" class="input__registros campos__obligatorios col col-12" value="Becquer098" />

        <div class="col col-12 counterPasswordValido__organismo mt-2 valida__erroresEscritura"></div>


        <div class="col col-12 mt-2 negrilla__titulosEnlazados campos__obligatoriosRotulos">Provincia</div>

        <div class="col col-12 mt-2 d d-flex align-items-center">

          <i class="fa fa-map"></i>

          &nbsp;&nbsp;
          
          <div class="col col-12 mt-2 d d-block align-items-center">

           <select type="text" id="provinciaOrganismo" name="provinciaOrganismo" class="input__registros campos__obligatorios"></select><span class="barra2"></span>

          </div>
        </div>

        <div class="col col-12 mt-2 negrilla__titulosEnlazados campos__obligatoriosRotulos">Cantón</div>

        <div class="col col-12 mt-2 d d-flex align-items-center">

          <i class="fa fa-map"></i>

          &nbsp;&nbsp;

          <div class="col col-12 mt-2 d d-block align-items-center">

            <select type="text" id="cantonOrganismo" name="cantonOrganismo" class="input__registros campos__obligatorios"></select><span class="barra2"></span>

          </div>
        </div>

        <div class="col col-12 mt-2 negrilla__titulosEnlazados campos__obligatoriosRotulos">Parroquia</div>

        <div class="col col-12 mt-2 d d-flex align-items-center">

          <i class="fa fa-map"></i>

          &nbsp;&nbsp;
          
          <div class="col col-12 mt-2 d d-block align-items-center">

            <select type="text" id="parroquiaOrganismo" name="parroquiaOrganismo" class="input__registros campos__obligatorios"></select><span class="barra2"></span>

          </div>
        </div>

        <div class="direccionOrgadireccionRotulo negrilla__titulosEnlazados campos__obligatoriosRotulos col col-12 mt-2"></div>

        <div class="col col-12 mt-2 d d-flex align-items-center">

          <i class="fa fa-location-arrow"></i>

          &nbsp;&nbsp;

          <div class="col col-12 mt-2 d d-block align-items-center">

            <input type="text" id="direccionOrganismo" name="direccionOrganismo" class="input__registros campos__obligatorios" placeholder="Dirección organismo deportivo"><span class="barra"></span>

          </div>
        </div>

        <input type="hidden" id="referenciaOrganismo" name="referenciaOrganismo" class="input__registros campos__obligatorios sin__visualizar" placeholder="Referencia dirección organismo deportivo"><span class="barra"></span>


        <input type="text" id="barrioOrganismo" name="barrioOrganismo" class="input__registros campos__obligatorios sin__visualizar" placeholder="Barrio organismo deportivo"><span class="barra"></span>

        <div class="col col-12 text-center titulos__ModalSeccion mt-4">

          <i class="fas fa-file"></i>&nbsp;&nbsp;DOCUMENTACIÓN

        </div>

        <!-- <div class="col col-12 documento__embebido"></div> -->

        <div class="numeroAcuerdoRotulo negrilla__titulosEnlazados campos__obligatoriosRotulos col col-12 mt-2 justificado__textos"></div>

        <div class="col col-12 mt-2 d d-flex align-items-center">

          <i class="fa fa-file-signature"></i>

          &nbsp;&nbsp;

          <div class="col col-12 mt-2 d d-block align-items-center">

            <input type="text" id="numeroAcuerdoOrganismo" name="numeroAcuerdoOrganismo" class="input__registros campos__obligatorios" placeholder="Número de acuerdo ministerial organismo deportivo"><span class="barra"></span>

          </div>
        </div>

        <div class="nombreOrganismoSegunAcuerdoRotulo negrilla__titulosEnlazados campos__obligatoriosRotulos col col-12 mt-2"></div>

        <div class="col col-12 mt-2 d d-flex align-items-center">

          <i class="fas fa-address-card"></i>

          &nbsp;&nbsp;

          <div class="col col-12 mt-2 d d-block align-items-center">

            <input type="text" id="nombreOrganismoSegunAcuerdoOrganismo" name="nombreOrganismoSegunAcuerdoOrganismo" class="input__registros campos__obligatorios" placeholder="Nombre del organismo deportivo según acuerdo ministerial"><span class="barra"></span>

          </div>
        </div>

        <div class="fechaAcuerdoRotulo negrilla__titulosEnlazados campos__obligatoriosRotulos col col-12 mt-2 justificado__textos"></div>

        <div class="col col-12 mt-2 d d-flex align-items-center">

          <i class="fa fa-calendar-alt"></i>
          &nbsp;&nbsp;

          <div class="col col-12 mt-2 d d-block align-items-center">

            <input type="date" id="fechaAcuerdoOrganismo" name="fechaAcuerdoOrganismo" class="input__registros campos__obligatorios" placeholder="Fecha de acuerdo ministerial organismo deportivo" /><span class="barra"></span>

          </div>
        </div>


        <div class="col col-12 mt-2 d d-flex align-items-center row">

          <div class="col col-6 col-md-5 d d-flex">

            <span class="negrilla__titulosEnlazados campos__obligatoriosRotulos spantitulo">Acuerdo ministerial</span>

          </div>

          <div class="container-input d d-flex align-items-center col col-6 col-md-7 row">

            <input type="file" class="inputfile inputfile-5" id="acuerdoMinisterial" name="acuerdoMinisterial" accept="application/pdf" />

            <label for="acuerdoMinisterial" class="col col-6 col-md-4">

              <figure>

                <svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17">

                  <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path>

                </svg>

              </figure>

            </label>

            <span class="iborrainputfile nombre__direccionAcuerdo col col-6 col-md-8 spanestadofile">Ningún acuerdo seleccionado</span>

          </div>

        </div>

        <!--=========================================
          =            Registro directorio            =
          ==========================================-->

        <div class="col col-12 mt-2 d d-flex align-items-center row">

          <div class="col col-6 col-md-5 d d-flex">

            <span class="negrilla__titulosEnlazados campos__obligatoriosRotulos spantitulo">Registro de directorio</span>

          </div>

          <div class="container-input d d-flex align-items-center col col-6 col-md-7 row">

            <input type="file" class="inputfile inputfile-5" id="registroDirectorio" name="registroDirectorio" accept="application/pdf" />

            <label for="registroDirectorio" class="col col-6 col-md-4">

              <figure>

                <svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17">

                  <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path>

                </svg>

              </figure>

            </label>

            <span class="iborrainputfile nombre__direccionRegistroDirectorio col col-6 col-md-8 spanestadofile">Ningún registro de directorio seleccionado</span>

          </div>

        </div>

        <!--====  End of Registro directorio  ====-->

        <!--===========================================
          =            Registro nombramiento            =
          ============================================-->

        <div class="col col-12 mt-2 d d-flex align-items-center row">

          <div class="col col-6 col-md-5 d d-flex">

            <span class="negrilla__titulosEnlazados campos__obligatoriosRotulos spantitulo">Registro de nombramiento del adminsitrador financiero<br>
              <div class="letrapequenia">(Siempre y cuando el presupuesto recibido por la organización deportiva supere el monto establecido en el artículo 20 de la Ley del Deporte)</div>
            </span>

          </div>

          <div class="container-input d d-flex align-items-center col col-6 col-md-7 row">

            <input type="file" class="inputfile inputfile-5" id="registroNombramiento" name="registroNombramiento" accept="application/pdf" />

            <label for="registroNombramiento" class="col col-6 col-md-4">

              <figure>

                <svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17">

                  <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path>

                </svg>

              </figure>

            </label>

            <span class="iborrainputfile nombre__registroNombramiento col col-6 col-md-8 spanestadofile">Ningún registro nombramiento seleccionado</span>

          </div>

        </div>

        <!--====  End of Registro nombramiento  ====-->


        <!--=================================================================
          =            Registro nombramiento administrador general            =
          ==================================================================-->

        <div class="col col-12 mt-2 d d-flex align-items-center row">

          <div class="col col-6 col-md-5 d d-flex">

            <span class="negrilla__titulosEnlazados campos__obligatoriosRotulos registro__vigente__provincial spantitulo">Registro vigente del Nombramiento del Administrador General</span>

          </div>

          <div class="container-input d d-flex align-items-center col col-6 col-md-7 row">

            <input type="file" class="inputfile inputfile-5" id="registroVigenteN" name="registroVigenteN" accept="application/pdf" />

            <label for="registroVigenteN" class="col col-6 col-md-4 registro__vigente__provincial">

              <figure>

                <svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17">

                  <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path>

                </svg>

              </figure>

            </label>

            <span class="iborrainputfile nombre__registroNombramientoGeneral col col-6 col-md-8 registro__vigente__provincial spanestadofile">Ningún registro nombramiento seleccionado</span>

          </div>

        </div>

        <!--====  End of Registro nombramiento administrador general  ====-->

        <!--=================================================================
          =            Registro Resoluciones de intervenciones a organizaciones deportivas            =
          ==================================================================-->

        <div class="col col-12 mt-2 d d-flex align-items-center row">

          <div class="col col-6 col-md-5 d d-flex">

            <span class="negrilla__titulosEnlazados campos__obligatoriosRotulos spantitulo">Resoluciones de intervenciones a organizaciones deportivas (de ser el caso)</span>

          </div>

          <div class="container-input d d-flex align-items-center col col-6 col-md-7 row">

            <input type="file" class="inputfile inputfile-5" id="resolucionInterveciones" name="resolucionInterveciones" accept="application/pdf" />

            <label for="resolucionInterveciones" class="col col-6 col-md-4">

              <figure>

                <svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17">

                  <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path>

                </svg>

              </figure>

            </label>

            <span class="iborrainputfile nombre__IntervencionesOr col col-6 col-md-8 spanestadofile">Ningún registro nombramiento seleccionado</span>

          </div>

        </div>

        <!--====  End of Registro Resoluciones de intervenciones a organizaciones deportivas  ====-->

      </div>



        <div class="row bloques__registros margen__registros d d-flex flex-column justify-content-center" style="width:100!important; margin-left: 2em!important;">


        <input type="hidden" id="cedulaCiudadano" name="cedulaCiudadano" class="input__registros campos__obligatorios solo__numero" placeholder="Cédula presidente del ORGANISMO">


        <input type="text" id="nombreCiudadano" name="nombreCiudadano" class="input__registros campos__obligatorios col col-12 mt-2 sin__bordes__cs" readonly="" placeholder="Nombre presidente del ORGANISMO">


        <input type="text" id="apellidoCiudadano" name="apellidoCiudadano" class="input__registros campos__obligatorios col col-12 mt-2 sin__bordes__cs" readonly="" placeholder="Apellido presidente del ORGANISMO">


        <input type="text" id="sexoCiudadano" name="sexoCiudadano" class="input__registros campos__obligatorios col col-12 mt-2 sin__bordes__cs" readonly="" placeholder="Género presidente del ORGANISMO">


        <input type="text" id="fechaDeNacimientoCiudadano" name="fechaDeNacimientoCiudadano" class="input__registros campos__obligatorios col col-12 mt-2 sin__bordes__cs" readonly="" placeholder="Fecha nacimiento presidente del ORGANISMO">


        <input type="text" id="emailCiudadano" name="emailCiudadano" class="input__registros campos__obligatorios col col-12" placeholder="Correo presidente del ORGANISMO">


        <div class="col col-12 counterCorreo__ciudadano mt-2 valida__erroresEscritura"></div>


        <div class="col col-12 text-center titulos__ModalSeccion d d-flex justify-content-center mt-3">

          PERSONA DE CONTACTO
          <br>
          (Persona del Organismo Deportivo con quien el ministerio del deporte deberá contactarse para gestionar el POA)

        </div>

        <div class="cedulaRepresentanteRotulo negrilla__titulosEnlazados campos__obligatoriosRotulos col col-12 mt-2"></div>

        <div class="col col-12 mt-2 d d-flex align-items-center">
          <div class="col col-12 mt-2 d d-block align-items-center">

           <input type="text" id="cedulaRepresentante" name="cedulaRepresentante" class="input__registros campos__obligatorios solo__numero" placeholder="Cédula representante del ORGANISMO"><span class="barra"></span>

          </div>

          <div class="reload__personaContacto"></div>

          <i class="fas fa-search pointer__botones" id="buscar__CedulaPersonaContacto"></i>

        </div>

        <div class="col col-12 counter__CedulaRepresentante text-center mt-2"></div>

        <div class="col col-12 counter__CedulaRepresentanteMensajes text-center mt-2 valida__erroresEscritura"></div>


        <input type="text" id="nombreRepresentante" name="nombreRepresentante" class="input__registros campos__obligatorios sin__bordes__cs col col-12" placeholder="Nombre representante legal del ORGANISMO">


        <div class="emailOrganismoRotulo negrilla__titulosEnlazados campos__obligatoriosRotulos col col-12 mt-2"></div>

        <div class="col col-12 mt-2 d d-flex align-items-center">

          <i class="fas fa-envelope-square"></i>

          &nbsp;&nbsp;

          <div class="col col-12 mt-2 d d-block align-items-center">

            <input type="text" id="emailOrganismo" name="emailOrganismo" class="input__registros campos__obligatorios" placeholder="Correo"><span class="barra"></span>

          </div>
        </div>

        <div class="col col-12 counterCorreo__organismo mt-2 valida__erroresEscritura"></div>


        <div class="celularRotulo negrilla__titulosEnlazados campos__obligatoriosRotulos col col-12 mt-2"></div>

        <div class="col col-12 mt-2 d d-flex align-items-center">

          <i class="fas fa-phone-volume"></i>

          &nbsp;&nbsp;

          <div class="col col-12 mt-2 d d-block align-items-center">

            <input type="text" id="celularCiudadano" name="celularCiudadano" class="input__registros campos__obligatorios solo__numero" placeholder="Teléfono"><span class="barra"></span>

           </div>
        </div>

        <div class="col col-12 counterCelular__ciudadano mt-2"></div>

        <div class="col col-12 counter__CelularMensajes text-center mt-2 valida__erroresEscritura"></div>



        <input type="text" id="apellidoRepresentante" name="apellidoRepresentante" class="input__registros campos__obligatorios sin__bordes__cs col col-12" placeholder="Apellido representante legal del ORGANISMO">


        <div class="emailRepresentanteRotulo negrilla__titulosEnlazados campos__obligatoriosRotulos col col-12 mt-2 oculto__email__representante"></div>

        <div class="col col-12 mt-2 d d-flex align-items-center oculto__email__representante">

          <i class="fas fa-envelope-square oculto__email__representante"></i>

          &nbsp;&nbsp;&nbsp;&nbsp;

          <input type="text" id="emailRepresentante" name="emailRepresentante" class="input__registros campos__obligatorios oculto__email__representante" placeholder="Correo representante legal del ORGANISMO">

        </div>

        <div class="col col-12 counterCorreo__representante mt-2 valida__erroresEscritura"></div>

        <div class="telefonoOficinasRotulo negrilla__titulosEnlazados campos__obligatoriosRotulos col col-12 mt-2"></div>

        <div class="col col-12 mt-2 d d-flex align-items-center">

          <i class="fas fa-phone-volume oculto__email__representante"></i>

          &nbsp;&nbsp;

          <div class="col col-12 mt-2 d d-flex align-items-center">

            <input type="text" id="telefonoOficinas" name="telefonoOficinas" class="input__registros campos__obligatorios solo__numero oculto__email__representante" placeholder="Teléfono"><span class="barra"></span>

          </div>
        </div>



      </div>

    </div>


    <!--====  Terminos y condiciones  ====-->

    <div class="row d d-flex justify-content-center align-items-center bloques__eliminados">

      <div class="col col-6 col-md-4 mt-2">

        <p>Aceptar los <a href="#" class="color__azul" data-bs-toggle='modal' data-bs-target='#terminosCondicionesModal'>Términos y Condiciones</a></p>

      </div>

      <div class="col col-2 col-md-2">

        <input type="checkbox" name="terminosCondiciones" id="terminosCondiciones">

      </div>

    </div>

    <!--====  End of terminos y condiciones  ====-->

    <div class="modal-footer d d-flex justify-content-center row">

      <div class="col col-12 d d-flex justify-content-center">
        <button type="button" id="guardarRegistroPoa" name="guardarRegistroPoa" class="btnguardar"><i class="fas fa-save"></i>&nbsp;&nbsp;REGISTRAR</button>
      </div>

      <div class="col col-12 d d-flex justify-content-center documentos__confidenciales">
        <button type="button" class="btnguardar documentos__confidenciales" id="guardarAcuerdoConfidencialidad" name="guardarAcuerdoConfidencialidad"><i class="fas fa-save"></i>&nbsp;&nbsp;ENVIAR</button>
      </div>

      <div class="col col-12 reload__registroOrganismos d d-flex justify-content-center"></div>

    </div>

  </form>

</div>