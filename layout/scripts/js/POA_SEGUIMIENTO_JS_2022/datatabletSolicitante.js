$(document).ready(function () {

    /* paidRubrosEventos*/
    //datatablets($("#paidRubrosEventos"), "paidRubrosEventos", [$("#idUsuarioC").val(), $("#idRolAd").val(), $("#fisicamenteE").val(), "humano"], objetos([15],["boton"], ["<center><button class='estilo__botonDatatablets btn btn-info pointer__botones' onclick='funcionEliminarEvento()' ><i class='fas fa-pencil-alt'></i></button><center>"], [false], [false]), 1,  ["funcion__datatabletsEliminar"], [false], [false], false);


    
    datatabletsS($("#paidRubrosGeneral"), "paidRubrosGeneral", [$("#idUsuarioC").val(), $("#idRolAd").val(), $("#fisicamenteE").val(), "humano"], objetos__doces([18, 19], ["boton", "boton"], ["<center><button class='estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#eventosEditaModal'><i class='fas fa-user-edit'></i></button><center>", "<center><button class='eliminarIndicadores estilo__botonDatatablets btn btn-danger pointer__botones' attr='18'><i class='fas fa-trash'></i></button><center>"], [false], [false]), 1, ["funcion__editar", "funcion__datatabletsEliminarT"], ["editarIndicadores", "eliminarIndicadores"], ["indicadoresEdita", "rubrosEliminaPaidGeneralAR"], ["edita", "elimina"], [1, 0], ['enviado', 'input__1']);
    datatabletsS($("#paidRubrosIndicadores"), "paidRubrosIndicadores", [$("#idUsuarioC").val(), $("#idRolAd").val(), $("#fisicamenteE").val(), "humano"], objetos__doces([17, 18], ["boton", "boton"], ["<center><button class='estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#eventosEditaModal'><i class='fas fa-user-edit'></i></button><center>", "<center><button class='eliminarIndicadores estilo__botonDatatablets btn btn-danger pointer__botones' attr='18'><i class='fas fa-trash'></i></button><center>"], [false], [false]), 1, ["funcion__editar", "funcion__datatabletsEliminarT"], ["editarIndicadores", "eliminarIndicadores"], ["indicadoresEdita", "rubrosEliminaPaidGeneralAR"], ["edita", "elimina"], [1, 0], ['enviado', 'input__1']);

    datatabletsS($("#paidRubrosGeneralEA"), "paidRubrosGeneralEA", [$("#idUsuarioC").val(), $("#idRolAd").val(), $("#fisicamenteE").val(), "humano"], objetos__doces([18, 19], ["boton", "boton"], ["<center><button class='estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#eventosEditaModal'><i class='fas fa-user-edit'></i></button><center>", "<center><button class='eliminarIndicadores estilo__botonDatatablets btn btn-danger pointer__botones' attr='18'><i class='fas fa-trash'></i></button><center>"], [false], [false]), 1, ["funcion__editar", "funcion__datatabletsEliminarT"], ["editarIndicadores", "eliminarIndicadores"], ["indicadoresEdita", "rubrosEliminaPaidGeneralAR"], ["edita", "elimina"], [1, 0], ['enviado', 'input__1']);
    datatabletsS($("#paidRubrosIndicadoresEA"), "paidRubrosIndicadoresEA", [$("#idUsuarioC").val(), $("#idRolAd").val(), $("#fisicamenteE").val(), "humano"], objetos__doces([17, 18], ["boton", "boton"], ["<center><button class='estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#eventosEditaModal'><i class='fas fa-user-edit'></i></button><center>", "<center><button class='eliminarIndicadores estilo__botonDatatablets btn btn-danger pointer__botones' attr='18'><i class='fas fa-trash'></i></button><center>"], [false], [false]), 1, ["funcion__editar", "funcion__datatabletsEliminarT"], ["editarIndicadores", "eliminarIndicadores"], ["indicadoresEdita", "rubrosEliminaPaidGeneralAR"], ["edita", "elimina"], [1, 0], ['enviado', 'input__1']);
    //datatabletsS($("#paidRubrosGeneralGN"), "paidRubrosGeneralGN", [$("#idUsuarioC").val(), $("#idRolAd").val(), $("#fisicamenteE").val(), "humano"], false, false, false, false, false, false, false);


 datatabletsS($("#paidRubrosGeneralPGVEA"), "paidRubrosGeneralPGVEA", [$("#idUsuarioC").val(), $("#idRolAd").val(), $("#fisicamenteE").val(), "humano"], false, false, false, false, false, false, false);
  datatabletsS($("#paidRubrosIndicadoresPGIEA"), "paidRubrosIndicadoresPGIEA", [$("#idUsuarioC").val(), $("#idRolAd").val(), $("#fisicamenteE").val(), "humano"], false, false, false, false, false, false, false);
  
 datatabletsS($("#paidRubrosGeneralEAver"), "paidRubrosGeneralEAver", [$("#idUsuarioC").val(), $("#idRolAd").val(), $("#fisicamenteE").val(), "humano"], false, false, false, false, false, false, false);
  datatabletsS($("#paidRubrosIndicadoresPGIEA"), "paidRubrosIndicadoresPGIEA", [$("#idUsuarioC").val(), $("#idRolAd").val(), $("#fisicamenteE").val(), "humano"], false, false, false, false, false, false, false);
  

 datatabletsS($("#paidRubrosGeneralPGVAR"), "paidRubrosGeneralPGVEA", [$("#idUsuarioC").val(), $("#idRolAd").val(), $("#fisicamenteE").val(), "humano"], false, false, false, false, false, false, false);
  datatabletsS($("#paidRubrosIndicadoresPGIAR"), "paidRubrosIndicadoresPGIEA", [$("#idUsuarioC").val(), $("#idRolAd").val(), $("#fisicamenteE").val(), "humano"], false, false, false, false, false, false, false);
  

 

    /**/
    /*=========================================
    =            Admnistración poa            =
    =========================================*/


});



var objetos__doces = function (parametro1, parametro2, parametro3, parametro4, parametro5, parametro6) {

    var objeto = [];

    /*=============================================
    =            Creación de elementos            =
    =============================================*/


    if (parametro1[0] != "" && parametro1[0] != " ") {

        objeto.push({

            "aTargets": [parametro1[0]],
            "mData": null,
            "mRender": (function (data, type, row) {

                if (parametro2[0] == "enlace" && row[parametro5[0]]!=null && row[parametro5[0]]!=undefined && row[parametro5[0]]!=" " && row[parametro5[0]]!="") {

                    if (row[parametro5[0]].indexOf('.pdf') > -1) {
                        return "<center><a href='" + parametro4[0] + row[parametro5[0]] + "' target='_blank'>" + row[parametro3[0]] + "</a></center>";
                    } else {
                        return "<center><a href='" + parametro4[0] + row[parametro5[0]] + ".pdf' target='_blank'>" + row[parametro3[0]] + "</a></center>";
                    }

                } else if (parametro2[0] == "boton") {

                    return parametro3[0];

                } else if (parametro2[0] == "texto__separadores") {


                    if (row[parametro3[0]] != "" && row[parametro3[0]] != null && row[parametro3[0]] != undefined) {

                        let arr = row[parametro3[0]].split(';;;;');

                        if (arr.length > 0) {

                            if (arr[0] != undefined && arr[0] != "undefined") {

                                var primero = "<div>" + arr[0] + "</div>";

                            } else {
                                primero = "<div></div>";
                            }



                            if (arr[1] != undefined && arr[1] != "undefined") {

                                var segundo = "<div>" + arr[1] + "</div>";

                            } else {
                                segundo = "<div></div>";
                            }



                            if (arr[2] != undefined && arr[2] != "undefined") {

                                var tercero = "<div>" + arr[2] + "</div>";

                            } else {
                                tercero = "<div></div>";
                            }



                            if (arr[3] != undefined && arr[3] != "undefined") {

                                var cuarto = "<div>" + arr[3] + "</div>";

                            } else {
                                cuarto = "<div></div>";
                            }



                            if (arr[4] != undefined && arr[4] != "undefined") {

                                var quinto = "<div>" + arr[4] + "</div>";

                            } else {
                                quinto = "<div></div>";
                            }



                            if (arr[5] != undefined && arr[5] != "undefined") {

                                var sexto = "<div>" + arr[5] + "</div>";

                            } else {
                                sexto = "<div></div>";
                            }



                            return primero + "<br>" + segundo + "<br>" + tercero + "<br>" + cuarto + "<br>" + quinto + "<br>" + sexto;

                        } else {

                            return "No asignado";

                        }

                    } else {

                        return "No asignado";


                    }

                } else if (parametro2[0] == "boton__2") {

                    if (row[parametro4[0]] == "Notificado por no presentación de requisitos") {

                        return "Notificado por no presentación de requisitos";

                    } else if (row[parametro3[0]] != "" && row[parametro3[0]] != null) {

                        return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

                    } else {

                        return "Aún no presenta los documentos";

                    }


                } else if (parametro2[0] == "texto__separadores__2") {

                    if (row[parametro3[0]] == "si") {

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='si'>Si</option><option value='no'>No</option></select>";

                    } else {

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='no'>No</option><option value='si'>Si</option></select>";

                    }



                } else if (parametro2[0] == "radioSelectes__2") {

                    return "<div style='display:flex;'>Si&nbsp;&nbsp;<input type='radio'  class='radio__conjuntos radios_" + row[parametro3[0]] + "' name='radio__select__" + row[parametro3[0]] + "' value='A'/>&nbsp;&nbsp;No&nbsp;&nbsp;<input type='radio'  class='radio__conjuntos radios_" + row[parametro3[0]] + "' name='radio__select__" + row[parametro3[0]] + "' value='N'/></div><div style='display:flex; justify-content-center;'><button class='btn btn-primary guardar__informacion__conjuntos__radios mt-2'><i class='fa fa-floppy-o' aria-hidden='true'></i></button></div>";

                } else if (parametro2[0] == "enlaces__definidos__2") {

                    if (row[parametro3[0]] == "CUMPLE") {

                        return "<a href='seguimientoRecorrido' target='_blank'>ENVIADO</a>";

                    } else {
                        return "NO ENVIADO";
                    }



                } else if (parametro2[0] == "chekeds__2__paids") {

                    return "<center><input type='checkbox' class='checkeds__seleccionables' attr='primerTrimestre' idOrganismos='" + row[parametro3[0]] + "'/></center>";

                } else {
                    return row[parametro3[0]];
                }

            })

        });

    }

    if (parametro1[1] != "" && parametro1[1] != " ") {

        objeto.push({

            "aTargets": [parametro1[1]],
            "mData": null,
            "mRender": (function (data, type, row) {

                if (parametro2[1] == "enlace" && row[parametro5[0]]!=null && row[parametro5[0]]!=undefined && row[parametro5[0]]!=" " && row[parametro5[0]]!="") {

                    if (row[parametro5[1]].indexOf('.pdf') > -1) {
                        return "<center><a href='" + parametro4[1] + row[parametro5[1]] + "' target='_blank'>" + row[parametro3[1]] + "</a></center>";
                    } else {
                        return "<center><a href='" + parametro4[1] + row[parametro5[1]] + ".pdf' target='_blank'>" + row[parametro3[1]] + "</a></center>";
                    }

                } else if (parametro2[1] == "boton") {

                    return parametro3[1];

                } else if (parametro2[1] == "texto__separadores") {


                    if (row[parametro3[1]] != "" && row[parametro3[1]] != null && row[parametro3[1]] != undefined) {

                        let arr = row[parametro3[1]].split(';;;;');

                        if (arr.length > 0) {

                            if (arr[0] != undefined && arr[0] != "undefined") {

                                var primero = "<div>" + arr[0] + "</div>";

                            } else {
                                primero = "<div></div>";
                            }



                            if (arr[1] != undefined && arr[1] != "undefined") {

                                var segundo = "<div>" + arr[1] + "</div>";

                            } else {
                                segundo = "<div></div>";
                            }



                            if (arr[2] != undefined && arr[2] != "undefined") {

                                var tercero = "<div>" + arr[2] + "</div>";

                            } else {
                                tercero = "<div></div>";
                            }



                            if (arr[3] != undefined && arr[3] != "undefined") {

                                var cuarto = "<div>" + arr[3] + "</div>";

                            } else {
                                cuarto = "<div></div>";
                            }



                            if (arr[4] != undefined && arr[4] != "undefined") {

                                var quinto = "<div>" + arr[4] + "</div>";

                            } else {
                                quinto = "<div></div>";
                            }



                            if (arr[5] != undefined && arr[5] != "undefined") {

                                var sexto = "<div>" + arr[5] + "</div>";

                            } else {
                                sexto = "<div></div>";
                            }



                            return primero + "<br>" + segundo + "<br>" + tercero + "<br>" + cuarto + "<br>" + quinto + "<br>" + sexto;

                        } else {

                            return "No asignado";

                        }

                    } else {

                        return "No asignado";


                    }

                } else if (parametro2[1] == "boton__2") {

                    if (row[parametro4[0]] == "Notificado por no presentación de requisitos") {

                        return "Notificado por no presentación de requisitos";

                    } else if (row[parametro3[0]] != "" && row[parametro3[0]] != null) {

                        return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

                    } else {

                        return "Aún no presenta los documentos";

                    }


                } else if (parametro2[1] == "texto__separadores__2") {

                    let arr = row[parametro3[1]].split('------');

                    let primero = "";
                    let segundo = "";
                    let tercero = "";

                    if (arr[0] == "N/A") {

                        primero = "";

                    } else {

                        primero = "<div><a href='documentos/seguimiento/informesSeguimientos/" + arr[0] + "' target='_blank'>Presupuestario</a></div><hr>";

                    }

                    if (arr[1] == "N/A") {

                        segundo = "";

                    } else {

                        if (row[parametro6] == "FORMATIVO") {

                            segundo = "<div><a href='documentos/seguimiento/informes__altos/" + arr[1] + "' target='_blank'>Técnico</a></div><hr>";

                        } else if (row[parametro6] == "RECREACION") {

                            segundo = "<div><a href='documentos/seguimiento/informe__recreativos/" + arr[1] + "' target='_blank'>Técnico</a></div><hr>";

                        } else {

                            segundo = "<div><a href='documentos/seguimiento/informes__altos/" + arr[1] + "' target='_blank'>Técnico</a></div><hr>";

                        }

                    }

                    if (arr[2] == "N/A") {

                        tercero = "";

                    } else {

                        tercero = "<div><a href='documentos/seguimiento/informesInfraestructuras/" + arr[2] + "' target='_blank'>Infraestructura y/o mantenimiento</a></div><hr>";

                    }


                    return primero + segundo + tercero;

                } else if (parametro2[1] == "chekeds__2") {

                    return "<input type='checkbox' class='checkeds__seleccionables' attr='primerTrimestre' idOrganismos='" + row[parametro3[1]] + "'/>";

                } else if (parametro2[1] == "enlaces__definidos__2") {

                    if (row[parametro3[1]] == "CUMPLE") {

                        return "<a href='seguimientoRecorrido' target='_blank'>ENVIADO</a>";

                    } else {
                        return "NO ENVIADO";
                    }



                } else if (parametro2[1] == "texto__separadores__2") {

                    if (row[parametro3[1]] == "si") {

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='si'>Si</option><option value='no'>No</option></select>";

                    } else {

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='no'>No</option><option value='si'>Si</option></select>";

                    }



                } else if (parametro2[1] == "radioSelectes__2") {

                    return "<div style='display:flex;'>Si&nbsp;&nbsp;<input type='radio'  class='radio__conjuntos radios_" + row[parametro3[1]] + "' name='radio__select__" + row[parametro3[1]] + "' value='A'/>&nbsp;&nbsp;No&nbsp;&nbsp;<input type='radio'  class='radio__conjuntos radios_" + row[parametro3[1]] + "' name='radio__select__" + row[parametro3[1]] + "' value='N'/></div><div style='display:flex; justify-content-center;'><button class='btn btn-primary guardar__informacion__conjuntos__radios mt-2'><i class='fa fa-floppy-o' aria-hidden='true'></i></button></div>";

                } else if (parametro2[1] == "chekeds__2__paids") {

                    return "<center><input type='checkbox' class='checkeds__seleccionables' attr='primerTrimestre' idOrganismos='" + row[parametro3[1]] + "'/></center>";

                } else {
                    return row[parametro3[1]];
                }

            })

        });

    }

    if (parametro1[2] != "" && parametro1[2] != " ") {

        objeto.push({

            "aTargets": [parametro1[2]],
            "mData": null,
            "mRender": (function (data, type, row) {

                if (parametro2[2] == "enlace") {

                    if (row[parametro5[2]].indexOf('.pdf') > -1) {
                        return "<center><a href='" + parametro4[2] + row[parametro5[2]] + "' target='_blank'>" + row[parametro3[2]] + "</a></center>";
                    } else {
                        return "<center><a href='" + parametro4[2] + row[parametro5[2]] + ".pdf' target='_blank'>" + row[parametro3[2]] + "</a></center>";
                    }

                } else if (parametro2[2] == "boton") {

                    return parametro3[2];

                } else if (parametro2[2] == "texto__separadores") {


                    if (row[parametro3[2]] != "" && row[parametro3[2]] != null && row[parametro3[2]] != undefined) {

                        let arr = row[parametro3[2]].split(';;;;');
                        if (arr.length > 0) {

                            if (arr[0] != undefined && arr[0] != "undefined") {

                                var primero = "<div>" + arr[0] + "</div>";

                            } else {
                                primero = "<div></div>";
                            }



                            if (arr[1] != undefined && arr[1] != "undefined") {

                                var segundo = "<div>" + arr[1] + "</div>";

                            } else {
                                segundo = "<div></div>";
                            }



                            if (arr[2] != undefined && arr[2] != "undefined") {

                                var tercero = "<div>" + arr[2] + "</div>";

                            } else {
                                tercero = "<div></div>";
                            }



                            if (arr[3] != undefined && arr[3] != "undefined") {

                                var cuarto = "<div>" + arr[3] + "</div>";

                            } else {
                                cuarto = "<div></div>";
                            }



                            if (arr[4] != undefined && arr[4] != "undefined") {

                                var quinto = "<div>" + arr[4] + "</div>";

                            } else {
                                quinto = "<div></div>";
                            }



                            if (arr[5] != undefined && arr[5] != "undefined") {

                                var sexto = "<div>" + arr[5] + "</div>";

                            } else {
                                sexto = "<div></div>";
                            }



                            return primero + "<br>" + segundo + "<br>" + tercero + "<br>" + cuarto + "<br>" + quinto + "<br>" + sexto;

                        } else {

                            return "No asignado";

                        }
                    } else {

                        return "No asignado";


                    }

                } else if (parametro2[0] == "boton__2") {

                    if (row[parametro4[0]] == "Notificado por no presentación de requisitos") {

                        return "Notificado por no presentación de requisitos";

                    } else if (row[parametro3[0]] != "" && row[parametro3[0]] != null) {

                        return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

                    } else {

                        return "Aún no presenta los documentos";

                    }


                } else if (parametro2[2] == "enlaces__definidos__2") {

                    if (row[parametro3[2]] == "CUMPLE") {

                        return "<a href='seguimientoRecorrido' target='_blank'>ENVIADO</a>";

                    } else {
                        return "NO ENVIADO";
                    }



                } else if (parametro2[2] == "texto__separadores__2") {

                    if (row[parametro3[2]] == "si") {

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado2'><option value='si'>Si</option><option value='no'>No</option></select>";

                    } else {

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado2'><option value='no'>No</option><option value='si'>Si</option></select>";

                    }



                } else if (parametro2[2] == "radioSelectes__2") {

                    return "<div style='display:flex;'>Si&nbsp;&nbsp;<input type='radio'  class='radio__conjuntos radios_" + row[parametro3[2]] + "' name='radio__select__" + row[parametro3[2]] + "' value='A'/>&nbsp;&nbsp;No&nbsp;&nbsp;<input type='radio'  class='radio__conjuntos radios_" + row[parametro3[2]] + "' name='radio__select__" + row[parametro3[2]] + "' value='N'/></div><div style='display:flex; justify-content-center;'><button class='btn btn-primary guardar__informacion__conjuntos__radios mt-2'><i class='fa fa-floppy-o' aria-hidden='true'></i></button></div>";

                } else if (parametro2[2] == "texto__separadores__2") {

                    if (row[parametro3[2]] == "si") {

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado2'><option value='si'>Si</option><option value='no'>No</option></select>";

                    } else {

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado2'><option value='no'>No</option><option value='si'>Si</option></select>";

                    }



                } else if (parametro2[2] == "chekeds__2") {

                    return "<input type='checkbox' class='checkeds__seleccionables' idOrganismos='" + row[parametro3[2]] + "'/>";

                } else {
                    return row[parametro3[2]];
                }

            })

        });

    }

    if (parametro1[3] != "" && parametro1[3] != " ") {

        objeto.push({

            "aTargets": [parametro1[3]],
            "mData": null,
            "mRender": (function (data, type, row) {

                if (parametro2[3] == "enlace") {

                    if (row[parametro5[3]].indexOf('.pdf') > -1) {
                        return "<center><a href='" + parametro4[3] + row[parametro5[3]] + "' target='_blank'>" + row[parametro3[3]] + "</a></center>";
                    } else {
                        return "<center><a href='" + parametro4[3] + row[parametro5[3]] + ".pdf' target='_blank'>" + row[parametro3[3]] + "</a></center>";
                    }

                } else if (parametro2[3] == "boton") {

                    return parametro3[3];

                } else if (parametro2[3] == "texto__separadores") {


                    if (row[parametro3[3]] != "" && row[parametro3[3]] != null && row[parametro3[3]] != undefined) {

                        let arr = row[parametro3[3]].split(';;;;');

                        if (arr.length > 0) {

                            if (arr[0] != undefined && arr[0] != "undefined") {

                                var primero = "<div>" + arr[0] + "</div>";

                            } else {
                                primero = "<div></div>";
                            }



                            if (arr[1] != undefined && arr[1] != "undefined") {

                                var segundo = "<div>" + arr[1] + "</div>";

                            } else {
                                segundo = "<div></div>";
                            }



                            if (arr[2] != undefined && arr[2] != "undefined") {

                                var tercero = "<div>" + arr[2] + "</div>";

                            } else {
                                tercero = "<div></div>";
                            }



                            if (arr[3] != undefined && arr[3] != "undefined") {

                                var cuarto = "<div>" + arr[3] + "</div>";

                            } else {
                                cuarto = "<div></div>";
                            }



                            if (arr[4] != undefined && arr[4] != "undefined") {

                                var quinto = "<div>" + arr[4] + "</div>";

                            } else {
                                quinto = "<div></div>";
                            }



                            if (arr[5] != undefined && arr[5] != "undefined") {

                                var sexto = "<div>" + arr[5] + "</div>";

                            } else {
                                sexto = "<div></div>";
                            }



                            return primero + "<br>" + segundo + "<br>" + tercero + "<br>" + cuarto + "<br>" + quinto + "<br>" + sexto;

                        } else {

                            return "No asignado";

                        }

                    } else {

                        return "No asignado";


                    }

                } else if (parametro2[3] == "boton__2") {

                    if (row[parametro4[0]] == "Notificado por no presentación de requisitos") {

                        return "Notificado por no presentación de requisitos";

                    } else if (row[parametro3[0]] != "" && row[parametro3[0]] != null) {

                        return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

                    } else {

                        return "Aún no presenta los documentos";

                    }


                } else if (parametro2[3] == "texto__separadores__2") {

                    let arr = row[parametro3[3]].split('------');

                    let primero = "";
                    let segundo = "";
                    let tercero = "";

                    if (arr[0] == "N/A") {

                        primero = "";

                    } else {

                        primero = "<div><a href='documentos/seguimiento/informesSeguimientos/" + arr[0] + "' target='_blank'>Presupuestario</a></div><hr>";

                    }

                    if (arr[1] == "N/A") {

                        segundo = "";

                    } else {

                        if (row[parametro6] == "FORMATIVO") {

                            segundo = "<div><a href='documentos/seguimiento/informes__altos/" + arr[1] + "' target='_blank'>Técnico</a></div><hr>";

                        } else if (row[parametro6] == "RECREACION") {

                            segundo = "<div><a href='documentos/seguimiento/informe__recreativos/" + arr[1] + "' target='_blank'>Técnico</a></div><hr>";

                        } else {

                            segundo = "<div><a href='documentos/seguimiento/informes__altos/" + arr[1] + "' target='_blank'>Técnico</a></div><hr>";

                        }

                    }

                    if (arr[2] == "N/A") {

                        tercero = "";

                    } else {

                        tercero = "<div><a href='documentos/seguimiento/informesInfraestructuras/" + arr[2] + "' target='_blank'>Infraestructura y/o mantenimiento</a></div><hr>";

                    }


                    return primero + segundo + tercero;

                } else if (parametro2[3] == "enlaces__definidos__2") {

                    if (row[parametro3[3]] == "CUMPLE") {

                        return "<a href='seguimientoRecorrido' target='_blank'>ENVIADO</a>";

                    } else {
                        return "NO ENVIADO";
                    }



                } else if (parametro2[3] == "texto__separadores__2") {

                    if (row[parametro3[3]] == "si") {

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='si'>Si</option><option value='no'>No</option></select>";

                    } else {

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='no'>No</option><option value='si'>Si</option></select>";

                    }



                } else if (parametro2[3] == "radioSelectes__2") {

                    return "<div style='display:flex;'>Si&nbsp;&nbsp;<input type='radio'  class='radio__conjuntos radios_" + row[parametro3[3]] + "' name='radio__select__" + row[parametro3[3]] + "' value='A'/>&nbsp;&nbsp;No&nbsp;&nbsp;<input type='radio'  class='radio__conjuntos radios_" + row[parametro3[3]] + "' name='radio__select__" + row[parametro3[3]] + "' value='N'/></div><div style='display:flex; justify-content-center;'><button class='btn btn-primary guardar__informacion__conjuntos__radios mt-2'><i class='fa fa-floppy-o' aria-hidden='true'></i></button></div>";

                } else if (parametro2[3] == "texto__separadores__2") {

                    if (row[parametro3[3]] == "si") {

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='si'>Si</option><option value='no'>No</option></select>";

                    } else {

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='no'>No</option><option value='si'>Si</option></select>";

                    }



                } else if (parametro2[3] == "radioSelectes__2") {

                    return "<div style='display:flex;'>Si&nbsp;&nbsp;<input type='radio'  class='radio__conjuntos radios_" + row[parametro3[3]] + "' name='radio__select__" + row[parametro3[3]] + "' value='A'/>&nbsp;&nbsp;No&nbsp;&nbsp;<input type='radio'  class='radio__conjuntos radios_" + row[parametro3[3]] + "' name='radio__select__" + row[parametro3[3]] + "' value='N'/></div><div style='display:flex; justify-content-center;'><button class='btn btn-primary guardar__informacion__conjuntos__radios mt-2'><i class='fa fa-floppy-o' aria-hidden='true'></i></button></div>";

                } else if (parametro2[3] == "texto__separadores__2") {

                    if (row[parametro3[3]] == "si") {

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='si'>Si</option><option value='no'>No</option></select>";

                    } else {

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='no'>No</option><option value='si'>Si</option></select>";

                    }



                } else if (parametro2[3] == "chekeds__2") {

                    return "<input type='checkbox' class='checkeds__seleccionables' idOrganismos='" + row[parametro3[3]] + "' attr='segundoTrimestre'/>";

                } else {
                    return row[parametro3[3]];
                }

            })

        });

    }


    if (parametro1[4] != "" && parametro1[4] != " ") {

        objeto.push({

            "aTargets": [parametro1[4]],
            "mData": null,
            "mRender": (function (data, type, row) {

                if (parametro2[4] == "enlace") {

                    if (row[parametro5[4]].indexOf('.pdf') > -1) {
                        return "<center><a href='" + parametro4[4] + row[parametro5[4]] + "' target='_blank'>" + row[parametro3[4]] + "</a></center>";
                    } else {
                        return "<center><a href='" + parametro4[4] + row[parametro5[4]] + ".pdf' target='_blank'>" + row[parametro3[4]] + "</a></center>";
                    }

                } else if (parametro2[4] == "boton") {

                    return parametro3[4];

                } else if (parametro2[4] == "texto__separadores") {


                    if (row[parametro3[4]] != "" && row[parametro3[4]] != null && row[parametro3[4]] != undefined) {

                        let arr = row[parametro3[4]].split(';;;;');

                        if (arr.length > 0) {

                            if (arr[0] != undefined && arr[0] != "undefined") {

                                var primero = "<div>" + arr[0] + "</div>";

                            } else {
                                primero = "<div></div>";
                            }



                            if (arr[1] != undefined && arr[1] != "undefined") {

                                var segundo = "<div>" + arr[1] + "</div>";

                            } else {
                                segundo = "<div></div>";
                            }



                            if (arr[2] != undefined && arr[2] != "undefined") {

                                var tercero = "<div>" + arr[2] + "</div>";

                            } else {
                                tercero = "<div></div>";
                            }



                            if (arr[3] != undefined && arr[3] != "undefined") {

                                var cuarto = "<div>" + arr[3] + "</div>";

                            } else {
                                cuarto = "<div></div>";
                            }



                            if (arr[4] != undefined && arr[4] != "undefined") {

                                var quinto = "<div>" + arr[4] + "</div>";

                            } else {
                                quinto = "<div></div>";
                            }



                            if (arr[5] != undefined && arr[5] != "undefined") {

                                var sexto = "<div>" + arr[5] + "</div>";

                            } else {
                                sexto = "<div></div>";
                            }



                            return primero + "<br>" + segundo + "<br>" + tercero + "<br>" + cuarto + "<br>" + quinto + "<br>" + sexto;

                        } else {

                            return "No asignado";

                        }
                    } else {

                        return "No asignado";


                    }

                } else if (parametro2[0] == "boton__2") {

                    if (row[parametro4[0]] == "Notificado por no presentación de requisitos") {

                        return "Notificado por no presentación de requisitos";

                    } else if (row[parametro3[0]] != "" && row[parametro3[0]] != null) {

                        return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

                    } else {

                        return "Aún no presenta los documentos";

                    }


                } else if (parametro2[4] == "texto__separadores__2") {

                    if (row[parametro3[4]] == "si") {

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado3'><option value='si'>Si</option><option value='no'>No</option></select>";

                    } else {

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado3'><option value='no'>No</option><option value='si'>Si</option></select>";

                    }



                } else if (parametro2[4] == "radioSelectes__2") {

                    return "<div style='display:flex;'>Si&nbsp;&nbsp;<input type='radio'  class='radio__conjuntos radios_" + row[parametro3[4]] + "' name='radio__select__" + row[parametro3[4]] + "' value='A'/>&nbsp;&nbsp;No&nbsp;&nbsp;<input type='radio'  class='radio__conjuntos radios_" + row[parametro3[4]] + "' name='radio__select__" + row[parametro3[4]] + "' value='N'/></div><div style='display:flex; justify-content-center;'><button class='btn btn-primary guardar__informacion__conjuntos__radios mt-2'><i class='fa fa-floppy-o' aria-hidden='true'></i></button></div>";

                } else if (parametro2[4] == "texto__separadores__2") {

                    if (row[parametro3[4]] == "si") {

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado3'><option value='si'>Si</option><option value='no'>No</option></select>";

                    } else {

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado3'><option value='no'>No</option><option value='si'>Si</option></select>";

                    }



                } else if (parametro2[4] == "chekeds__2") {

                    return "<input type='checkbox' class='checkeds__seleccionables' idOrganismos='" + row[parametro3[4]] + "'/>";

                } else {
                    return row[parametro3[4]];
                }

            })

        });

    }

    if (parametro1[5] != "" && parametro1[5] != " ") {

        objeto.push({

            "aTargets": [parametro1[5]],
            "mData": null,
            "mRender": (function (data, type, row) {

                if (parametro2[5] == "enlace") {

                    if (row[parametro5[5]].indexOf('.pdf') > -1) {
                        return "<center><a href='" + parametro4[5] + row[parametro5[5]] + "' target='_blank'>" + row[parametro3[5]] + "</a></center>";
                    } else {
                        return "<center><a href='" + parametro4[5] + row[parametro5[5]] + ".pdf' target='_blank'>" + row[parametro3[5]] + "</a></center>";
                    }

                } else if (parametro2[5] == "boton") {

                    return parametro3[5];

                } else if (parametro2[5] == "texto__separadores") {


                    if (row[parametro3[5]] != "" && row[parametro3[5]] != null && row[parametro3[5]] != undefined) {

                        let arr = row[parametro3[5]].split(';;;;');

                        if (arr.length > 0) {

                            if (arr[0] != undefined && arr[0] != "undefined") {

                                var primero = "<div>" + arr[0] + "</div>";

                            } else {
                                primero = "<div></div>";
                            }



                            if (arr[1] != undefined && arr[1] != "undefined") {

                                var segundo = "<div>" + arr[1] + "</div>";

                            } else {
                                segundo = "<div></div>";
                            }



                            if (arr[2] != undefined && arr[2] != "undefined") {

                                var tercero = "<div>" + arr[2] + "</div>";

                            } else {
                                tercero = "<div></div>";
                            }



                            if (arr[3] != undefined && arr[3] != "undefined") {

                                var cuarto = "<div>" + arr[3] + "</div>";

                            } else {
                                cuarto = "<div></div>";
                            }



                            if (arr[4] != undefined && arr[4] != "undefined") {

                                var quinto = "<div>" + arr[4] + "</div>";

                            } else {
                                quinto = "<div></div>";
                            }



                            if (arr[5] != undefined && arr[5] != "undefined") {

                                var sexto = "<div>" + arr[5] + "</div>";

                            } else {
                                sexto = "<div></div>";
                            }



                            return primero + "<br>" + segundo + "<br>" + tercero + "<br>" + cuarto + "<br>" + quinto + "<br>" + sexto;

                        } else {

                            return "No asignado";

                        }

                    } else {

                        return "No asignado";


                    }

                } else if (parametro2[0] == "boton__2") {

                    if (row[parametro4[0]] == "Notificado por no presentación de requisitos") {

                        return "Notificado por no presentación de requisitos";

                    } else if (row[parametro3[0]] != "" && row[parametro3[0]] != null) {

                        return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

                    } else {

                        return "Aún no presenta los documentos";

                    }


                } else if (parametro2[5] == "texto__separadores__2") {

                    let arr = row[parametro3[5]].split('------');

                    let primero = "";
                    let segundo = "";
                    let tercero = "";

                    if (arr[0] == "N/A") {

                        primero = "";

                    } else {

                        primero = "<div><a href='documentos/seguimiento/informesSeguimientos/" + arr[0] + "' target='_blank'>Presupuestario</a></div><hr>";

                    }

                    if (arr[1] == "N/A") {

                        segundo = "";

                    } else {

                        if (row[parametro6] == "FORMATIVO") {

                            segundo = "<div><a href='documentos/seguimiento/informes__altos/" + arr[1] + "' target='_blank'>Técnico</a></div><hr>";

                        } else if (row[parametro6] == "RECREACION") {

                            segundo = "<div><a href='documentos/seguimiento/informe__recreativos/" + arr[1] + "' target='_blank'>Técnico</a></div><hr>";

                        } else {

                            segundo = "<div><a href='documentos/seguimiento/informes__altos/" + arr[1] + "' target='_blank'>Técnico</a></div><hr>";

                        }

                    }

                    if (arr[2] == "N/A") {

                        tercero = "";

                    } else {

                        tercero = "<div><a href='documentos/seguimiento/informesInfraestructuras/" + arr[2] + "' target='_blank'>Infraestructura y/o mantenimiento</a></div><hr>";

                    }


                    return primero + segundo + tercero;

                } else if (parametro2[5] == "texto__separadores__2") {

                    if (row[parametro3[5]] == "si") {

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='si'>Si</option><option value='no'>No</option></select>";

                    } else {

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='no'>No</option><option value='si'>Si</option></select>";

                    }



                } else if (parametro2[5] == "chekeds__2") {

                    return "<input type='checkbox' class='checkeds__seleccionables' idOrganismos='" + row[parametro3[5]] + "' attr='tercerTrimestre'/>";

                } else {
                    return row[parametro3[5]];
                }

            })

        });

    }



    if (parametro1[6] != "" && parametro1[6] != " ") {

        objeto.push({

            "aTargets": [parametro1[6]],
            "mData": null,
            "mRender": (function (data, type, row) {

                if (parametro2[6] == "enlace") {

                    if (row[parametro6[6]].indexOf('.pdf') > -1) {
                        return "<center><a href='" + parametro4[6] + row[parametro6[6]] + "' target='_blank'>" + row[parametro3[6]] + "</a></center>";
                    } else {
                        return "<center><a href='" + parametro4[6] + row[parametro6[6]] + ".pdf' target='_blank'>" + row[parametro3[6]] + "</a></center>";
                    }

                } else if (parametro2[6] == "boton") {

                    return parametro3[6];

                } else if (parametro2[6] == "texto__separadores") {


                    if (row[parametro3[6]] != "" && row[parametro3[6]] != null && row[parametro3[6]] != undefined) {

                        let arr = row[parametro3[6]].split(';;;;');

                        if (arr.length > 0) {

                            if (arr[0] != undefined && arr[0] != "undefined") {

                                var primero = "<div>" + arr[0] + "</div>";

                            } else {
                                primero = "<div></div>";
                            }



                            if (arr[1] != undefined && arr[1] != "undefined") {

                                var segundo = "<div>" + arr[1] + "</div>";

                            } else {
                                segundo = "<div></div>";
                            }



                            if (arr[2] != undefined && arr[2] != "undefined") {

                                var tercero = "<div>" + arr[2] + "</div>";

                            } else {
                                tercero = "<div></div>";
                            }



                            if (arr[3] != undefined && arr[3] != "undefined") {

                                var cuarto = "<div>" + arr[3] + "</div>";

                            } else {
                                cuarto = "<div></div>";
                            }



                            if (arr[4] != undefined && arr[4] != "undefined") {

                                var quinto = "<div>" + arr[4] + "</div>";

                            } else {
                                quinto = "<div></div>";
                            }



                            if (arr[6] != undefined && arr[6] != "undefined") {

                                var sexto = "<div>" + arr[6] + "</div>";

                            } else {
                                sexto = "<div></div>";
                            }



                            return primero + "<br>" + segundo + "<br>" + tercero + "<br>" + cuarto + "<br>" + quinto + "<br>" + sexto;

                        } else {

                            return "No asignado";

                        }

                    } else {

                        return "No asignado";


                    }

                } else if (parametro2[0] == "boton__2") {

                    if (row[parametro4[0]] == "Notificado por no presentación de requisitos") {

                        return "Notificado por no presentación de requisitos";

                    } else if (row[parametro3[0]] != "" && row[parametro3[0]] != null) {

                        return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

                    } else {

                        return "Aún no presenta los documentos";

                    }


                } else if (parametro2[6] == "texto__separadores__2") {

                    let arr = row[parametro3[6]].split('------');

                    let primero = "";
                    let segundo = "";
                    let tercero = "";

                    if (arr[0] == "N/A") {

                        primero = "";

                    } else {

                        primero = "<div><a href='documentos/seguimiento/informesSeguimientos/" + arr[0] + "' target='_blank'>Presupuestario</a></div><hr>";

                    }

                    if (arr[1] == "N/A") {

                        segundo = "";

                    } else {

                        if (row[parametro6] == "FORMATIVO") {

                            segundo = "<div><a href='documentos/seguimiento/informes__altos/" + arr[1] + "' target='_blank'>Técnico</a></div><hr>";

                        } else if (row[parametro6] == "RECREACION") {

                            segundo = "<div><a href='documentos/seguimiento/informe__recreativos/" + arr[1] + "' target='_blank'>Técnico</a></div><hr>";

                        } else {

                            segundo = "<div><a href='documentos/seguimiento/informes__altos/" + arr[1] + "' target='_blank'>Técnico</a></div><hr>";

                        }

                    }

                    if (arr[2] == "N/A") {

                        tercero = "";

                    } else {

                        tercero = "<div><a href='documentos/seguimiento/informesInfraestructuras/" + arr[2] + "' target='_blank'>Infraestructura y/o mantenimiento</a></div><hr>";

                    }


                    return primero + segundo + tercero;

                } else if (parametro2[6] == "texto__separadores__2") {

                    if (row[parametro3[6]] == "si") {

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado4'><option value='si'>Si</option><option value='no'>No</option></select>";

                    } else {

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado4'><option value='no'>No</option><option value='si'>Si</option></select>";

                    }



                } else if (parametro2[6] == "texto__separadores__4") {

                    if (row[parametro3[6]] == "si") {

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado4'><option value='si'>Si</option><option value='no'>No</option></select>";

                    } else {

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado4'><option value='no'>No</option><option value='si'>Si</option></select>";

                    }



                } else if (parametro2[6] == "chekeds__2") {

                    return "<input type='checkbox' class='checkeds__seleccionables' idOrganismos='" + row[parametro3[6]] + "'/>";

                } else {
                    return row[parametro3[6]];
                }

            })

        });

    }




    if (parametro1[7] != "" && parametro1[7] != " ") {

        objeto.push({

            "aTargets": [parametro1[7]],
            "mData": null,
            "mRender": (function (data, type, row) {

                if (parametro2[7] == "enlace") {

                    if (row[parametro7[7]].indexOf('.pdf') > -1) {
                        return "<center><a href='" + parametro4[7] + row[parametro7[7]] + "' target='_blank'>" + row[parametro3[7]] + "</a></center>";
                    } else {
                        return "<center><a href='" + parametro4[7] + row[parametro7[7]] + ".pdf' target='_blank'>" + row[parametro3[7]] + "</a></center>";
                    }

                } else if (parametro2[7] == "boton") {

                    return parametro3[7];

                } else if (parametro2[7] == "texto__separadores") {


                    if (row[parametro3[7]] != "" && row[parametro3[7]] != null && row[parametro3[7]] != undefined) {

                        let arr = row[parametro3[7]].split(';;;;');

                        if (arr.length > 0) {

                            if (arr[0] != undefined && arr[0] != "undefined") {

                                var primero = "<div>" + arr[0] + "</div>";

                            } else {
                                primero = "<div></div>";
                            }



                            if (arr[1] != undefined && arr[1] != "undefined") {

                                var segundo = "<div>" + arr[1] + "</div>";

                            } else {
                                segundo = "<div></div>";
                            }



                            if (arr[2] != undefined && arr[2] != "undefined") {

                                var tercero = "<div>" + arr[2] + "</div>";

                            } else {
                                tercero = "<div></div>";
                            }



                            if (arr[3] != undefined && arr[3] != "undefined") {

                                var cuarto = "<div>" + arr[3] + "</div>";

                            } else {
                                cuarto = "<div></div>";
                            }



                            if (arr[4] != undefined && arr[4] != "undefined") {

                                var quinto = "<div>" + arr[4] + "</div>";

                            } else {
                                quinto = "<div></div>";
                            }



                            if (arr[7] != undefined && arr[7] != "undefined") {

                                var sexto = "<div>" + arr[7] + "</div>";

                            } else {
                                sexto = "<div></div>";
                            }



                            return primero + "<br>" + segundo + "<br>" + tercero + "<br>" + cuarto + "<br>" + quinto + "<br>" + sexto;

                        } else {

                            return "No asignado";

                        }

                    } else {

                        return "No asignado";


                    }

                } else if (parametro2[0] == "boton__2") {

                    if (row[parametro4[0]] == "Notificado por no presentación de requisitos") {

                        return "Notificado por no presentación de requisitos";

                    } else if (row[parametro3[0]] != "" && row[parametro3[0]] != null) {

                        return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

                    } else {

                        return "Aún no presenta los documentos";

                    }


                } else if (parametro2[7] == "texto__separadores__2") {

                    let arr = row[parametro3[7]].split('------');

                    let primero = "";
                    let segundo = "";
                    let tercero = "";

                    if (arr[0] == "N/A") {

                        primero = "";

                    } else {

                        primero = "<div><a href='documentos/seguimiento/informesSeguimientos/" + arr[0] + "' target='_blank'>Presupuestario</a></div><hr>";

                    }

                    if (arr[1] == "N/A") {

                        segundo = "";

                    } else {

                        if (row[parametro6] == "FORMATIVO") {

                            segundo = "<div><a href='documentos/seguimiento/informes__altos/" + arr[1] + "' target='_blank'>Técnico</a></div><hr>";

                        } else if (row[parametro6] == "RECREACION") {

                            segundo = "<div><a href='documentos/seguimiento/informe__recreativos/" + arr[1] + "' target='_blank'>Técnico</a></div><hr>";

                        } else {

                            segundo = "<div><a href='documentos/seguimiento/informes__altos/" + arr[1] + "' target='_blank'>Técnico</a></div><hr>";

                        }

                    }

                    if (arr[2] == "N/A") {

                        tercero = "";

                    } else {

                        tercero = "<div><a href='documentos/seguimiento/informesInfraestructuras/" + arr[2] + "' target='_blank'>Infraestructura y/o mantenimiento</a></div><hr>";

                    }


                    return primero + segundo + tercero;

                } else if (parametro2[7] == "texto__separadores__2") {

                    if (row[parametro3[7]] == "si") {

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='si'>Si</option><option value='no'>No</option></select>";

                    } else {

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='no'>No</option><option value='si'>Si</option></select>";

                    }



                } else if (parametro2[7] == "chekeds__2") {

                    return "<input type='checkbox' class='checkeds__seleccionables' idOrganismos='" + row[parametro3[7]] + "' attr='cuartoTrimestre'/>";

                } else {
                    return row[parametro3[7]];
                }

            })

        });

    }


    if (parametro1[8] != "" && parametro1[8] != " ") {

        objeto.push({

            "aTargets": [parametro1[8]],
            "mData": null,
            "mRender": (function (data, type, row) {

                if (parametro2[8] == "enlace") {

                    if (row[parametro8[8]].indexOf('.pdf') > -1) {
                        return "<center><a href='" + parametro4[8] + row[parametro8[8]] + "' target='_blank'>" + row[parametro3[8]] + "</a></center>";
                    } else {
                        return "<center><a href='" + parametro4[8] + row[parametro8[8]] + ".pdf' target='_blank'>" + row[parametro3[8]] + "</a></center>";
                    }

                } else if (parametro2[8] == "boton") {

                    return parametro3[8];

                } else if (parametro2[8] == "texto__separadores") {


                    if (row[parametro3[8]] != "" && row[parametro3[8]] != null && row[parametro3[8]] != undefined) {

                        let arr = row[parametro3[8]].split(';;;;');

                        if (arr.length > 0) {

                            if (arr[0] != undefined && arr[0] != "undefined") {

                                var primero = "<div>" + arr[0] + "</div>";

                            } else {
                                primero = "<div></div>";
                            }



                            if (arr[1] != undefined && arr[1] != "undefined") {

                                var segundo = "<div>" + arr[1] + "</div>";

                            } else {
                                segundo = "<div></div>";
                            }



                            if (arr[2] != undefined && arr[2] != "undefined") {

                                var tercero = "<div>" + arr[2] + "</div>";

                            } else {
                                tercero = "<div></div>";
                            }



                            if (arr[3] != undefined && arr[3] != "undefined") {

                                var cuarto = "<div>" + arr[3] + "</div>";

                            } else {
                                cuarto = "<div></div>";
                            }



                            if (arr[4] != undefined && arr[4] != "undefined") {

                                var quinto = "<div>" + arr[4] + "</div>";

                            } else {
                                quinto = "<div></div>";
                            }



                            if (arr[8] != undefined && arr[8] != "undefined") {

                                var sexto = "<div>" + arr[8] + "</div>";

                            } else {
                                sexto = "<div></div>";
                            }



                            return primero + "<br>" + segundo + "<br>" + tercero + "<br>" + cuarto + "<br>" + quinto + "<br>" + sexto;

                        } else {

                            return "No asignado";

                        }

                    } else {

                        return "No asignado";


                    }

                } else if (parametro2[0] == "boton__2") {

                    if (row[parametro4[0]] == "Notificado por no presentación de requisitos") {

                        return "Notificado por no presentación de requisitos";

                    } else if (row[parametro3[0]] != "" && row[parametro3[0]] != null) {

                        return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

                    } else {

                        return "Aún no presenta los documentos";

                    }


                } else if (parametro2[8] == "texto__separadores__2") {

                    if (row[parametro3[8]] == "si") {

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='si'>Si</option><option value='no'>No</option></select>";

                    } else {

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='no'>No</option><option value='si'>Si</option></select>";

                    }


                } else if (parametro2[8] == "chekeds__2") {

                    return "<input type='checkbox' class='checkeds__seleccionables' idOrganismos='" + row[parametro3[8]] + "' attr='cuartoTrimestre'/>";

                } else {
                    return row[parametro3[8]];
                }

            })

        });

    }



    if (parametro1[9] != "" && parametro1[9] != " ") {

        objeto.push({

            "aTargets": [parametro1[9]],
            "mData": null,
            "mRender": (function (data, type, row) {

                if (parametro2[5] == "enlace") {

                    if (row[parametro5[5]].indexOf('.pdf') > -1) {
                        return "<center><a href='" + parametro4[5] + row[parametro5[5]] + "' target='_blank'>" + row[parametro3[5]] + "</a></center>";
                    } else {
                        return "<center><a href='" + parametro4[5] + row[parametro5[5]] + ".pdf' target='_blank'>" + row[parametro3[5]] + "</a></center>";
                    }

                } else if (parametro2[5] == "boton") {

                    return parametro3[5];

                } else if (parametro2[5] == "texto__separadores") {


                    if (row[parametro3[5]] != "" && row[parametro3[5]] != null && row[parametro3[5]] != undefined) {

                        let arr = row[parametro3[5]].split(';;;;');

                        if (arr.length > 0) {

                            if (arr[0] != undefined && arr[0] != "undefined") {

                                var primero = "<div>" + arr[0] + "</div>";

                            } else {
                                primero = "<div></div>";
                            }



                            if (arr[1] != undefined && arr[1] != "undefined") {

                                var segundo = "<div>" + arr[1] + "</div>";

                            } else {
                                segundo = "<div></div>";
                            }



                            if (arr[2] != undefined && arr[2] != "undefined") {

                                var tercero = "<div>" + arr[2] + "</div>";

                            } else {
                                tercero = "<div></div>";
                            }



                            if (arr[3] != undefined && arr[3] != "undefined") {

                                var cuarto = "<div>" + arr[3] + "</div>";

                            } else {
                                cuarto = "<div></div>";
                            }



                            if (arr[4] != undefined && arr[4] != "undefined") {

                                var quinto = "<div>" + arr[4] + "</div>";

                            } else {
                                quinto = "<div></div>";
                            }



                            if (arr[5] != undefined && arr[5] != "undefined") {

                                var sexto = "<div>" + arr[5] + "</div>";

                            } else {
                                sexto = "<div></div>";
                            }



                            return primero + "<br>" + segundo + "<br>" + tercero + "<br>" + cuarto + "<br>" + quinto + "<br>" + sexto;

                        } else {

                            return "No asignado";

                        }

                    } else {

                        return "No asignado";


                    }

                } else if (parametro2[0] == "boton__2") {

                    if (row[parametro4[0]] == "Notificado por no presentación de requisitos") {

                        return "Notificado por no presentación de requisitos";

                    } else if (row[parametro3[0]] != "" && row[parametro3[0]] != null) {

                        return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

                    } else {

                        return "Aún no presenta los documentos";

                    }


                } else {
                    return row[parametro3[5]];
                }

            })

        });

    }



    if (parametro1[10] != "" && parametro1[10] != " ") {

        objeto.push({

            "aTargets": [parametro1[10]],
            "mData": null,
            "mRender": (function (data, type, row) {

                if (parametro2[5] == "enlace") {

                    if (row[parametro5[5]].indexOf('.pdf') > -1) {
                        return "<center><a href='" + parametro4[5] + row[parametro5[5]] + "' target='_blank'>" + row[parametro3[5]] + "</a></center>";
                    } else {
                        return "<center><a href='" + parametro4[5] + row[parametro5[5]] + ".pdf' target='_blank'>" + row[parametro3[5]] + "</a></center>";
                    }

                } else if (parametro2[5] == "boton") {

                    return parametro3[5];

                } else if (parametro2[5] == "texto__separadores") {


                    if (row[parametro3[5]] != "" && row[parametro3[5]] != null && row[parametro3[5]] != undefined) {

                        let arr = row[parametro3[5]].split(';;;;');

                        if (arr.length > 0) {

                            if (arr[0] != undefined && arr[0] != "undefined") {

                                var primero = "<div>" + arr[0] + "</div>";

                            } else {
                                primero = "<div></div>";
                            }



                            if (arr[1] != undefined && arr[1] != "undefined") {

                                var segundo = "<div>" + arr[1] + "</div>";

                            } else {
                                segundo = "<div></div>";
                            }



                            if (arr[2] != undefined && arr[2] != "undefined") {

                                var tercero = "<div>" + arr[2] + "</div>";

                            } else {
                                tercero = "<div></div>";
                            }



                            if (arr[3] != undefined && arr[3] != "undefined") {

                                var cuarto = "<div>" + arr[3] + "</div>";

                            } else {
                                cuarto = "<div></div>";
                            }



                            if (arr[4] != undefined && arr[4] != "undefined") {

                                var quinto = "<div>" + arr[4] + "</div>";

                            } else {
                                quinto = "<div></div>";
                            }



                            if (arr[5] != undefined && arr[5] != "undefined") {

                                var sexto = "<div>" + arr[5] + "</div>";

                            } else {
                                sexto = "<div></div>";
                            }



                            return primero + "<br>" + segundo + "<br>" + tercero + "<br>" + cuarto + "<br>" + quinto + "<br>" + sexto;

                        } else {

                            return "No asignado";

                        }

                    } else {

                        return "No asignado";


                    }

                } else if (parametro2[0] == "boton__2") {

                    if (row[parametro4[0]] == "Notificado por no presentación de requisitos") {

                        return "Notificado por no presentación de requisitos";

                    } else if (row[parametro3[0]] != "" && row[parametro3[0]] != null) {

                        return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

                    } else {

                        return "Aún no presenta los documentos";

                    }


                } else {
                    return row[parametro3[5]];
                }

            })

        });

    }


    /*=====  End of Creación de elementos  ======*/

    return objeto;

}


var datatabletsS = function (parametro1, parametro2, parametro3, parametro4, parametro5, parametro6, parametro7, parametro8, parametro9, parametro10, parametro11) {

    var table = $(parametro1).DataTable({

        "language": {

            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "No existen datos",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },

        dom: 'Bfrtip',
        buttons: [
            'excel',
            {
                extend: 'pdf',
                text: 'PDF',
                orientation: 'landscape',
                customize: function (doc) {

                    doc.defaultStyle.fontSize = 6;

                    doc.styles.title = {
                        color: 'black',
                        fontSize: '8',
                        alignment: 'left',
                        margin: '0'
                    }

                    doc.styles.tableHeader = {

                        fillColor: '#311b92',
                        fontSize: '8',
                        color: 'white',
                        alignment: 'center',

                    }

                }

            }
        ],

        "bLengthChange": false,
        "pagingType": "full_numbers",
        "Paginate": true,
        "pagingType": "full_numbers",
        "retrieve": true,
        "paging": true,
        "pageLength": 4,
        //"scrollX": true,

        "ajax": {

            "method": "POST",
            "url": "modelosBd/datatablets/datatabletSolicitante.md.php",
            "data": {
                "identificador": parametro2,
                "datos": parametro3
            }

        },

        "aoColumnDefs": parametro4,


    });

    for (var i = 0; i < parametro6.length; i++) {


        if (parametro6[i] == "funcion__editar") {

            if (parametro9[i] == "edita") {
                funcion__datatabletsEditar("#" + parametro2 + " tbody", table, parametro7[i], parametro8[i], parametro9[i], parametro10, parametro11);
            }

        }

        if (parametro6[i] == "funcion__verItems__2") {

            funcion__verItemsObtener__2("#" + parametro2 + " tbody", table, parametro7);

        }


        if (parametro6[i] == "funcion__verItems") {

            funcion__verItemsObtener("#" + parametro2 + " tbody", table, parametro7);

        }

        if (parametro6[i] == "funcionObtener") {

            funcion__datatabletsObtener("#" + parametro2 + " tbody", table, parametro7, parametro8, parametro5, parametro9, parametro2);

        }

        if (parametro6[i] == "funcion__datatabletsEliminar") {

            if (parametro9[i] == "elimina") {
                funcion__datatabletsEliminar("#" + parametro2 + " tbody", table, parametro7[i], parametro8[i], parametro9[i]);
            }

        }

        if (parametro6[i] == "funcionObtenerOrganismos__paid") {

            funcion__datatabletsAsignarInfor__2("#" + parametro2 + " tbody", table, parametro7, parametro8, parametro9);

        }

        if (parametro6[i] == "funcionObtenerOrganismos") {

            funcion__datatabletsAsignarInfor("#" + parametro2 + " tbody", table, parametro7, parametro8, parametro9);

        }


        if (parametro6[i] == "funcionObtenerOrganismosM") {

            funcion__datatabletsAsignarInforDos("#" + parametro2 + " tbody", table, parametro7, parametro8, parametro9);

        }



        if (parametro6[i] == "funcionEditarOrgaM") {

            funcion__datatabletsAsignarEditarDos("#" + parametro2 + " tbody", table, parametro7, parametro8, parametro9);

        }



        if (parametro6[i] == "funcionEditarOrga") {

            funcion__datatabletsAsignarEditar("#" + parametro2 + " tbody", table, parametro7, parametro8, parametro9);

        }

        if (parametro6[i] == "funcionReasingarTraGe") {

            funcion__datatabletsReasignarTraGene("#" + parametro2 + " tbody", table, parametro7, parametro8, parametro9);

        }


        if (parametro6[i] == "funcionReasingarTraGe__modificaciones") {

            funcion__datatabletsReasignarTraGene__modificaciones("#" + parametro2 + " tbody", table, parametro7, parametro8, parametro9);

        }


        if (parametro6[i] == "funcionReasingarTra") {

            funcion__datatabletsReasignarTra("#" + parametro2 + " tbody", table, parametro7, parametro8, parametro9);

        }



        if (parametro6[i] == "funcionReasingarTra__finan") {

            funcion__datatabletsReasignarTra__finan("#" + parametro2 + " tbody", table, parametro7, parametro8, parametro9);

        }

        if (parametro6[i] == "funcionReasingarTra__finan__rechazar") {

            funcion__datatabletsReasignarTra__finan__rechazas("#" + parametro2 + " tbody", table, parametro7, parametro8, parametro9);

        }


        if (parametro6[i] == "funcionReasingarTraCoordinas") {

            funcion__datatabletsReasignarTraCoordinas("#" + parametro2 + " tbody", table, parametro7, parametro8, parametro9);

        }


        if (parametro6[i] == "funcionReasingarTraCoordinasFinan") {

            funcion__datatabletsReasignarTraFinan("#" + parametro2 + " tbody", table, parametro7, parametro8, parametro9);

        }


        if (parametro6[i] == "funcionReasingarTraRe") {

            funcion__datatabletsReasignarTraRe("#" + parametro2 + " tbody", table, parametro7, parametro8, parametro9);

        }

        if (parametro6[i] == "funcionReasingarTraRe_talento") {

            funcion__datatabletsReasignarTraRe__talento("#" + parametro2 + " tbody", table, parametro7, parametro8, parametro9);

        }


        if (parametro6[i] == "funcionReasingarTraReInfran") {

            funcion__datatabletsReasignarTraRe__infras("#" + parametro2 + " tbody", table, parametro7, parametro8, parametro9);

        }


        if (parametro6[i] == "funcionReasingarTraCoordinas__subsess") {

            funcionReasingarTraCoordinas__subsess("#" + parametro2 + " tbody", table, parametro7, parametro8, parametro9);

        }

        if (parametro6[i] == "funcionReasingarTraCoordinas__financs") {

            funcionReasingarTraCoordinas__financs("#" + parametro2 + " tbody", table, parametro7, parametro8, parametro9);

        }

        if (parametro6[i] == "funcionReasingarTraCoordinas__instalaciones") {

            funcionReasingarTraCoordinas__instalaciones("#" + parametro2 + " tbody", table, parametro7, parametro8, parametro9);

        }


        if (parametro6[i] == "funcionReasingarTraReAdminis") {

            funcion__ReasingarTraReAdminis("#" + parametro2 + " tbody", table, parametro7, parametro8, parametro9);

        }

        if (parametro6[i] == "funcionReasingarTraReInstala") {

            funcion__ReasingarTraReInstala("#" + parametro2 + " tbody", table, parametro7, parametro8, parametro9);

        }

        if (parametro6[i] == "funcionCoordinasOb") {

            funcion__enCordi("#" + parametro2 + " tbody", table, parametro7, parametro8, parametro9);

        }

        if (parametro6[i] == "funcionCoordinasObservacion") {

            funcion__enCordiObservi("#" + parametro2 + " tbody", table, parametro7, parametro8, parametro9);

        }


        if (parametro6[i] == "funcion__eliminar") {

            funcion__eliminarI("#" + parametro2 + " tbody", table, parametro7, parametro8, parametro9);

        }

        if (parametro6[i] == "funcion__eliminar__esigef") {

            funcion__eliminar__esigef("#" + parametro2 + " tbody", table, parametro7, parametro8, parametro9);

        }



        if (parametro6[i] == "funcionEditar__gestionados") {

            funcion__gestionados__i("#" + parametro2 + " tbody", table, parametro7, parametro8, parametro9);

        }

        if (parametro6[i] == "funcionEditar__gestionados_s") {

            funcionEditar__gestionados_s("#" + parametro2 + " tbody", table, parametro7, parametro8, parametro9);

        }


        if (parametro6[i] == "funcionReasingar__aprobados__dos") {

            funcionReasingar__aprobados__dos("#" + parametro2 + " tbody", table, parametro7, parametro8, parametro9);

        }

        if (parametro6[i] == "funcion___termina__financiero") {

            funcion___termina__financiero("#" + parametro2 + " tbody", table, parametro7, parametro8, parametro9);

        }

        if (parametro6[i] == "funcion__reasignar__seguimientos__unidos") {

            funcion__reasignar__seguimientos__unidos("#" + parametro2 + " tbody", table, parametro7, parametro8, parametro9);

        }

        if (parametro6[i] == "funcion__reasignar__seguimientos__recorridos") {

            funcion__reasignar__seguimientos__recorridos("#" + parametro2 + " tbody", table, parametro7, parametro8, parametro9);

        }

        if (parametro6[i] == "funcion__reasignar__seguimientos__recorridos__anexos__reportes") {

            funcion__reasignar__seguimientos__recorridos__anexos__reportes("#" + parametro2 + " tbody", table, parametro7, parametro8, parametro9);

        }

        if (parametro6[i] == "funcion__bloqueos__seguimientos") {

            funcion__bloqueos__seguimientos("#" + parametro2 + " tbody", table, parametro7, parametro8, parametro9);

        }

        if (parametro6[i] == "funcion__reasignar__seguimientos__unidos__altos") {

            funcion__reasignar__seguimientos__unidos__altos("#" + parametro2 + " tbody", table, parametro7, parametro8, parametro9);

        }


        if (parametro6[i] == "funcion__reasignar__seguimientos__unidos__actividad__fisica") {

            funcion__reasignar__seguimientos__unidos__actividad__fisica("#" + parametro2 + " tbody", table, parametro7, parametro8, parametro9);

        }


        if (parametro6[i] == "funcion__reasignar__seguimientos__unidos__altos__recomendados") {

            funcion__reasignar__seguimientos__unidos__altos__recomendados("#" + parametro2 + " tbody", table, parametro7, parametro8, parametro9);

        }


        if (parametro6[i] == "funcion__reasignar__seguimientos__unidos__altos__recomendados__formaRe") {

            funcion__reasignar__seguimientos__unidos__altos__recomendados__formaRe("#" + parametro2 + " tbody", table, parametro7, parametro8, parametro9);

        }


        if (parametro6[i] == "funcion__reasignar__seguimientos__unidos__seguimientos__seguimientos__recomendados__formaRe") {

            funcion__reasignar__seguimientos__unidos__seguimientos__seguimientos__recomendados__formaRe("#" + parametro2 + " tbody", table, parametro7, parametro8, parametro9);

        }

        if (parametro6[i] == "funcion__reasignar__seguimientos__unidos__seguimientos__seguimientos__recomendados__formaRe__ins") {

            funcion__reasignar__seguimientos__unidos__seguimientos__seguimientos__recomendados__formaRe__ins("#" + parametro2 + " tbody", table, parametro7, parametro8, parametro9);

        }

        if (parametro6[i] == "funcion__reasignar__seguimientos__unidos__seguimientos__seguimientos__recomendados__formaRe__instalaciones") {

            funcion__reasignar__seguimientos__unidos__seguimientos__seguimientos__recomendados__formaRe__instalaciones("#" + parametro2 + " tbody", table, parametro7, parametro8, parametro9);

        }

        if (parametro6[i] == "funcion__control__de__cambios") {

            funcion__control__de__cambios("#" + parametro2 + " tbody", table, parametro7, parametro8, parametro9);

        }

        if (parametro6[i] == "funrion__reasignar__paid") {

            funrion__reasignar__paid("#" + parametro2 + " tbody", table, parametro7, parametro8, parametro9);

        }

        if (parametro6[i] == "funrion__reasignar__paid__recomiendas") {

            funrion__reasignar__paid__recomiendas("#" + parametro2 + " tbody", table, parametro7, parametro8, parametro9);

        }


        if (parametro6[i] == "funrion__negar__paid__recomiendas") {

            funrion__negar__paid__recomiendas("#" + parametro2 + " tbody", table, parametro7, parametro8, parametro9);

        }

    }

    if (parametro2 == "tablaItemsAc1" || parametro2 == "tablaItemsAc2" || parametro2 == "tablaItemsAc3" || parametro2 == "tablaItemsAc4" || parametro2 == "tablaItemsAc5" || parametro2 == "tablaItemsAc6" || parametro2 == "tablaItemsAc7" || parametro2 == "tablaItemsAc8" || parametro2 == "tablaItemsAc9" || parametro2 == "tablaItemsAc10" || parametro2 == "tablaItemsAc11" || parametro2 == "tablaItemsAc12" || parametro2 == "tablaItemsAc13" || parametro2 == "tablaItemsAc14" || parametro2 == "tablaItemsAc15" || parametro2 == "tablaItemsAc16") {

        funcion__datatabletsEliminar2("#" + parametro2 + " tbody", table);

        funcion__datatabletsEditas2N("#" + parametro2 + " tbody", table);

    }


    /*=========================================
    =            Actualiza modales            =
    =========================================*/

    var actualizaDatablets = function (parametro1) {

        $(parametro1).click(function (e) {

            table.ajax.reload();

        });

    }

    actualizaDatablets($(".refrezcar__tabla"));

    /*=====  End of Actualiza modales  ======*/



    var funcion__datatabletsEliminarT = function (tbody, table, parametro3, parametro4, parametro5) {

        $(tbody).on("click", "button." + parametro3, function (e) {

            e.preventDefault();

            var boton = $(this);

            $(boton).hide();

            var data = table.row($(this).parents("tr")).data();

            var idEnviado = data[1];

            var confirm = alertify.confirm('¿Está seguro de eliminar?', '¿Está seguro de eliminar?', null, null).set('labels', { ok: 'Confirmar', cancel: 'Cancelar' });

            confirm.set({ transition: 'slide' });

            confirm.set('onok', function () { //callbak al pulsar botón positivo

                var paqueteDeDatos = new FormData();

                paqueteDeDatos.append('tipo', parametro4);
                paqueteDeDatos.append('idEnviado', idEnviado);
                paqueteDeDatos.append('idEnviado2', data[0]);
                paqueteDeDatos.append('paid', data[3]);
                paqueteDeDatos.append('paid2', data[5]);
                paqueteDeDatos.append('paid4', data[1]);

                $.ajax({

                    type: "POST",
                    url: "modelosBd/inserta/eliminaAcciones.md.php",
                    contentType: false,
                    data: paqueteDeDatos,
                    processData: false,
                    cache: false,
                    success: function (response) {

                        var elementos = JSON.parse(response);

                        var mensaje = elementos['mensaje'];

                        if (mensaje == 1) {

                            alertify.set("notifier", "position", "top-center");
                            alertify.notify("Registro eliminado", "success", 4, function () { });

                            table.ajax.reload();

                        }

                    },
                    error: function () {

                    }

                });

            });

            confirm.set('oncancel', function () {

                alertify.set("notifier", "position", "top-center");
                alertify.notify("Acción cancelada", "error", 1, function () {

                    $(boton).show();

                });

            });


        });

    }
}