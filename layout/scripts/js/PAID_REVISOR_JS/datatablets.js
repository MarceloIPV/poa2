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

                if (parametro2[0]=="enlace" && row[parametro5[0]]!=null && row[parametro5[0]]!=undefined && row[parametro5[0]]!="" && row[parametro5[0]]!=" ") {

                    if (row[parametro5[0]].indexOf('.pdf') > -1 ){
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

						// return "Notificado por no presentación de requisitos";

                        return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";


					}else if (row[parametro3[0]]!="" && row[parametro3[0]]!=null) {

						return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

					}else{

						return "Aún no presenta los documentos";

					}


				}else if(parametro2[0]=="texto__separadores__2"){

					if (row[parametro3[0]]=="si") {

						return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='si'>Si</option><option value='no'>No</option></select>";

					}else{

						return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='no'>No</option><option value='si'>Si</option></select>";

					}

					

				}else if(parametro2[0]=="texto__separadores__cierre__anio__fiscal"){

                    if (row[6]=="si") {

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado' style='background:red;color:white;'><option value='si'>CERRADO</option></select>";

                    }else{

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado' style='background:green;color:white;'><option value='no'>ABIERTO</option></select>";

                    }

                    

                }else if(parametro2[0]=="texto__separadores__cierre__anio__fiscal__2"){

                    if (row[7]=="si") {

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado' style='background:red;color:white;'><option value='si'>CERRADO</option></select>";

                    }else{

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado' style='background:green;color:white;'><option value='no'>ABIERTO</option></select>";

                    }

                    

                }else if(parametro2[0]=="radioSelectes__2"){

					return "<div style='display:flex;'>Si&nbsp;&nbsp;<input type='radio'  class='radio__conjuntos radios_"+row[parametro3[0]]+"' name='radio__select__"+row[parametro3[0]]+"' value='A'/>&nbsp;&nbsp;No&nbsp;&nbsp;<input type='radio'  class='radio__conjuntos radios_"+row[parametro3[0]]+"' name='radio__select__"+row[parametro3[0]]+"' value='N'/></div><div style='display:flex; justify-content-center;'><button class='btn btn-primary guardar__informacion__conjuntos__radios mt-2'><i class='fa fa-floppy-o' aria-hidden='true'></i></button></div>";

				}else if(parametro2[0]=="enlaces__definidos__2"){

					if (row[parametro3[0]]=="CUMPLE") {

						return "<a href='seguimientoRecorrido' target='_blank'>ENVIADO</a>";

					}else{
						return "NO ENVIADO";
					}

					

				}else if(parametro2[0]=="chekeds__2__paids"){

					return "<center><input type='checkbox' class='checkeds__seleccionables' attr='primerTrimestre' idOrganismos='"+row[parametro3[0]]+"'/></center>";

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

				if (parametro2[1]=="enlace" && row[parametro5[1]]!=null && row[parametro5[1]]!=undefined && row[parametro5[1]]!="" && row[parametro5[1]]!=" ") {

					if (row[parametro5[1]].indexOf('.pdf') > -1 ){
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

				}else if(parametro2[1]=="boton__2"){

					if(row[parametro4[0]]=="Notificado por no presentación de requisitos"){

						return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

					}else if (row[parametro3[0]]!="" && row[parametro3[0]]!=null) {

						return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

					}else{

						return "Aún no presenta los documentos";

					}


				}else if(parametro2[1]=="texto__separadores__2"){

					let arr = row[parametro3[1]].split('------');

					let primero="";
					let segundo="";
					let tercero="";

					if (arr[0]=="N/A"){

						 primero="";

					}else{

						 primero="<div><a href='documentos/seguimiento/informesSeguimientos/"+arr[0]+"' target='_blank'>Presupuestario</a></div><hr>";
						
					}

					if (arr[1]=="N/A"){

						 segundo="";

					}else{

						if (row[parametro6]=="FORMATIVO") {

							segundo="<div><a href='documentos/seguimiento/informe__formativos/"+arr[1]+"' target='_blank'>Técnico</a></div><hr>";

						}else if(row[parametro6]=="RECREACION"){

							segundo="<div><a href='documentos/seguimiento/informe__recreativos/"+arr[1]+"' target='_blank'>Técnico</a></div><hr>";

						}else{

							segundo="<div><a href='documentos/seguimiento/informes__altos/"+arr[1]+"' target='_blank'>Técnico</a></div><hr>";

						}
						
					}

					if (arr[2]=="N/A"){

						 tercero="";

					}else{

						 tercero="<div><a href='documentos/seguimiento/informesInfraestructuras/"+arr[2]+"' target='_blank'>Infraestructura y/o mantenimiento</a></div><hr>";
						
					}


					return primero+segundo+tercero;

				}else if(parametro2[1]=="chekeds__2"){

					return "<input type='checkbox' class='checkeds__seleccionables' attr='primerTrimestre' idOrganismos='"+row[parametro3[1]]+"'/>";

				}else if(parametro2[1]=="enlaces__definidos__2"){

					if (row[parametro3[1]]=="CUMPLE") {

						return "<a href='seguimientoRecorrido' target='_blank'>ENVIADO</a>";

					}else{
						return "NO ENVIADO";
					}

					

				}else if(parametro2[1]=="texto__separadores__2"){

					if (row[parametro3[1]]=="si") {

						return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='si'>Si</option><option value='no'>No</option></select>";

					}else{

						return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='no'>No</option><option value='si'>Si</option></select>";

					}

					

				}else if(parametro2[1]=="texto__separadores__cierre__anio__fiscal"){


                    if (row[7]=="si") {

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado' style='background:red;color:white;'><option value='si'>CERRADO</option></select>";

                    }else{

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado' style='background:green;color:white;'><option value='no'>ABIERTO</option></select>";

                    }


                }else if(parametro2[1]=="motivo__adicional"){


                    if (row[8]=="" || row[8]==" " || row[8]==undefined || row[8]==null) {

                        return " ";

                    }else{

                        return row[8];

                    }

                }else if(parametro2[1]=="radioSelectes__2"){

					return "<div style='display:flex;'>Si&nbsp;&nbsp;<input type='radio'  class='radio__conjuntos radios_"+row[parametro3[1]]+"' name='radio__select__"+row[parametro3[1]]+"' value='A'/>&nbsp;&nbsp;No&nbsp;&nbsp;<input type='radio'  class='radio__conjuntos radios_"+row[parametro3[1]]+"' name='radio__select__"+row[parametro3[1]]+"' value='N'/></div><div style='display:flex; justify-content-center;'><button class='btn btn-primary guardar__informacion__conjuntos__radios mt-2'><i class='fa fa-floppy-o' aria-hidden='true'></i></button></div>";

				}else if(parametro2[1]=="chekeds__2__paids"){

					return "<center><input type='checkbox' class='checkeds__seleccionables' attr='primerTrimestre' idOrganismos='"+row[parametro3[1]]+"'/></center>";

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

						return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

					}else if (row[parametro3[0]]!="" && row[parametro3[0]]!=null) {

						return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

					}else{

						return "Aún no presenta los documentos";

					}


				}else if(parametro2[2]=="enlaces__definidos__2"){

					if (row[parametro3[2]]=="CUMPLE") {

						return "<a href='seguimientoRecorrido' target='_blank'>ENVIADO</a>";

					}else{
						return "NO ENVIADO";
					}

					

				}else if(parametro2[2]=="texto__separadores__2"){

					if (row[parametro3[2]]=="si") {

						return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado2'><option value='si'>Si</option><option value='no'>No</option></select>";

					}else{

						return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado2'><option value='no'>No</option><option value='si'>Si</option></select>";

					}

					

				}else if(parametro2[2]=="texto__separadores__cierre__anio__fiscal"){


                    if (row[7]=="si") {

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado' style='background:red;color:white;'><option value='si'>CERRADO</option></select>";

                    }else{

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado' style='background:green;color:white;'><option value='no'>ABIERTO</option></select>";

                    }
                    

                }else if(parametro2[2]=="radioSelectes__2"){

					return "<div style='display:flex;'>Si&nbsp;&nbsp;<input type='radio'  class='radio__conjuntos radios_"+row[parametro3[2]]+"' name='radio__select__"+row[parametro3[2]]+"' value='A'/>&nbsp;&nbsp;No&nbsp;&nbsp;<input type='radio'  class='radio__conjuntos radios_"+row[parametro3[2]]+"' name='radio__select__"+row[parametro3[2]]+"' value='N'/></div><div style='display:flex; justify-content-center;'><button class='btn btn-primary guardar__informacion__conjuntos__radios mt-2'><i class='fa fa-floppy-o' aria-hidden='true'></i></button></div>";

				}else if(parametro2[2]=="texto__separadores__2"){

					if (row[parametro3[2]]=="si") {

						return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado2'><option value='si'>Si</option><option value='no'>No</option></select>";

					}else{

						return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado2'><option value='no'>No</option><option value='si'>Si</option></select>";

					}

					

				}else if(parametro2[2]=="chekeds__2"){

					return "<input type='checkbox' class='checkeds__seleccionables' idOrganismos='"+row[parametro3[2]]+"'/>";

				}else if(parametro2[2]=="motivo__adicional"){


                    if (row[8]=="" || row[8]==" " || row[8]==undefined || row[8]==null) {

                        return " ";

                    }else{

                        return row[8];

                    }

                }else if(parametro2[2]=="motivo__adicional__2"){


                    if (row[9]=="" || row[9]==" " || row[9]==undefined || row[9]==null) {

                        return " ";

                    }else{

                        return row[9];

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

				}else if(parametro2[3]=="boton__2"){

					if(row[parametro4[0]]=="Notificado por no presentación de requisitos"){

						return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

					}else if (row[parametro3[0]]!="" && row[parametro3[0]]!=null) {

						return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

					}else{

						return "Aún no presenta los documentos";

					}


				}else if(parametro2[3]=="texto__separadores__2"){

					let arr = row[parametro3[3]].split('------');

					let primero="";
					let segundo="";
					let tercero="";

					if (arr[0]=="N/A"){

						 primero="";

					}else{

						 primero="<div><a href='documentos/seguimiento/informesSeguimientos/"+arr[0]+"' target='_blank'>Presupuestario</a></div><hr>";
						
					}

					if (arr[1]=="N/A"){

						 segundo="";

					}else{

						if (row[parametro6]=="FORMATIVO") {

							segundo="<div><a href='documentos/seguimiento/informe__formativos/"+arr[1]+"' target='_blank'>Técnico</a></div><hr>";

						}else if(row[parametro6]=="RECREACION"){

							segundo="<div><a href='documentos/seguimiento/informe__recreativos/"+arr[1]+"' target='_blank'>Técnico</a></div><hr>";

						}else{

							segundo="<div><a href='documentos/seguimiento/informes__altos/"+arr[1]+"' target='_blank'>Técnico</a></div><hr>";

						}
						
					}

					if (arr[2]=="N/A"){

						 tercero="";

					}else{

						 tercero="<div><a href='documentos/seguimiento/informesInfraestructuras/"+arr[2]+"' target='_blank'>Infraestructura y/o mantenimiento</a></div><hr>";
						
					}


					return primero+segundo+tercero;

				}else if(parametro2[3]=="enlaces__definidos__2"){

					if (row[parametro3[3]]=="CUMPLE") {

						return "<a href='seguimientoRecorrido' target='_blank'>ENVIADO</a>";

					}else{
						return "NO ENVIADO";
					}

					

				}else if(parametro2[3]=="texto__separadores__2"){

					if (row[parametro3[3]]=="si") {

						return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='si'>Si</option><option value='no'>No</option></select>";

					}else{

						return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='no'>No</option><option value='si'>Si</option></select>";

					}

					

				}else if(parametro2[3]=="texto__separadores__cierre__anio__fiscal"){


                    if (row[10]=="si") {

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado' style='background:red;color:white;'><option value='si'>CERRADO</option></select>";

                    }else{

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado' style='background:green;color:white;'><option value='no'>ABIERTO</option></select>";

                    }
                    

                }else if(parametro2[3]=="radioSelectes__2"){

					return "<div style='display:flex;'>Si&nbsp;&nbsp;<input type='radio'  class='radio__conjuntos radios_"+row[parametro3[3]]+"' name='radio__select__"+row[parametro3[3]]+"' value='A'/>&nbsp;&nbsp;No&nbsp;&nbsp;<input type='radio'  class='radio__conjuntos radios_"+row[parametro3[3]]+"' name='radio__select__"+row[parametro3[3]]+"' value='N'/></div><div style='display:flex; justify-content-center;'><button class='btn btn-primary guardar__informacion__conjuntos__radios mt-2'><i class='fa fa-floppy-o' aria-hidden='true'></i></button></div>";

				}else if(parametro2[3]=="texto__separadores__2"){

					if (row[parametro3[3]]=="si") {

						return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='si'>Si</option><option value='no'>No</option></select>";

					}else{

						return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='no'>No</option><option value='si'>Si</option></select>";

					}

					

				}else if(parametro2[3]=="radioSelectes__2"){

					return "<div style='display:flex;'>Si&nbsp;&nbsp;<input type='radio'  class='radio__conjuntos radios_"+row[parametro3[3]]+"' name='radio__select__"+row[parametro3[3]]+"' value='A'/>&nbsp;&nbsp;No&nbsp;&nbsp;<input type='radio'  class='radio__conjuntos radios_"+row[parametro3[3]]+"' name='radio__select__"+row[parametro3[3]]+"' value='N'/></div><div style='display:flex; justify-content-center;'><button class='btn btn-primary guardar__informacion__conjuntos__radios mt-2'><i class='fa fa-floppy-o' aria-hidden='true'></i></button></div>";

				}else if(parametro2[3]=="texto__separadores__2"){

					if (row[parametro3[3]]=="si") {

						return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='si'>Si</option><option value='no'>No</option></select>";

					}else{

						return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='no'>No</option><option value='si'>Si</option></select>";

					}

					

				}else if(parametro2[3]=="chekeds__2"){

					return "<input type='checkbox' class='checkeds__seleccionables' idOrganismos='"+row[parametro3[3]]+"' attr='segundoTrimestre'/>";

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

						return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

					}else if (row[parametro3[0]]!="" && row[parametro3[0]]!=null) {

						return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

					}else{

						return "Aún no presenta los documentos";

					}


				}else if(parametro2[4]=="texto__separadores__2"){

					if (row[parametro3[4]]=="si") {

						return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado3'><option value='si'>Si</option><option value='no'>No</option></select>";

					}else{

						return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado3'><option value='no'>No</option><option value='si'>Si</option></select>";

					}

					

				}else if(parametro2[4]=="texto__separadores__cierre__anio__fiscal"){

                    if (row[parametro3[4]]=="si") {

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='si' style='background:red;color:white;'>CERRADO</option><option value='no'>No</option></select>";

                    }else{

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='no' style='background:green;color:white;'>No</option><option value='si'>APERTURADO</option></select>";

                    }

                    

                }else if(parametro2[4]=="radioSelectes__2"){

					return "<div style='display:flex;'>Si&nbsp;&nbsp;<input type='radio'  class='radio__conjuntos radios_"+row[parametro3[4]]+"' name='radio__select__"+row[parametro3[4]]+"' value='A'/>&nbsp;&nbsp;No&nbsp;&nbsp;<input type='radio'  class='radio__conjuntos radios_"+row[parametro3[4]]+"' name='radio__select__"+row[parametro3[4]]+"' value='N'/></div><div style='display:flex; justify-content-center;'><button class='btn btn-primary guardar__informacion__conjuntos__radios mt-2'><i class='fa fa-floppy-o' aria-hidden='true'></i></button></div>";

				}else if(parametro2[4]=="texto__separadores__2"){

					if (row[parametro3[4]]=="si") {

						return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado3'><option value='si'>Si</option><option value='no'>No</option></select>";

					}else{

						return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado3'><option value='no'>No</option><option value='si'>Si</option></select>";

					}

					

				}else if(parametro2[4]=="motivo__adicional"){

                    if (row[8]=="" || row[8]==" " || row[8]==undefined || row[8]==null) {

                        return " ";

                    }else{

                        return row[8];

                    }

                    

                }else if(parametro2[4]=="chekeds__2"){

					return "<input type='checkbox' class='checkeds__seleccionables' idOrganismos='"+row[parametro3[4]]+"'/>";

				}else if(parametro2[4]=="chekeds__2__1"){

                    return "<input type='checkbox' class='checkeds__seleccionables__transferencias' idOrganismos='"+row[5]+"'/>";

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

						return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

					}else if (row[parametro3[0]]!="" && row[parametro3[0]]!=null) {

						return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

					}else{

						return "Aún no presenta los documentos";

					}


				}else if(parametro2[5]=="texto__separadores__2"){

					let arr = row[parametro3[5]].split('------');

					let primero="";
					let segundo="";
					let tercero="";

					if (arr[0]=="N/A"){

						 primero="";

					}else{

						 primero="<div><a href='documentos/seguimiento/informesSeguimientos/"+arr[0]+"' target='_blank'>Presupuestario</a></div><hr>";
						
					}

					if (arr[1]=="N/A"){

						 segundo="";

					}else{

						if (row[parametro6]=="FORMATIVO") {

							segundo="<div><a href='documentos/seguimiento/informe__formativos/"+arr[1]+"' target='_blank'>Técnico</a></div><hr>";

						}else if(row[parametro6]=="RECREACION"){

							segundo="<div><a href='documentos/seguimiento/informe__recreativos/"+arr[1]+"' target='_blank'>Técnico</a></div><hr>";

						}else{

							segundo="<div><a href='documentos/seguimiento/informes__altos/"+arr[1]+"' target='_blank'>Técnico</a></div><hr>";

						}
						
					}

					if (arr[2]=="N/A"){

						 tercero="";

					}else{

						 tercero="<div><a href='documentos/seguimiento/informesInfraestructuras/"+arr[2]+"' target='_blank'>Infraestructura y/o mantenimiento</a></div><hr>";
						
					}


					return primero+segundo+tercero;

				}else if(parametro2[5]=="texto__separadores__2"){

					if (row[parametro3[5]]=="si") {

						return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='si'>Si</option><option value='no'>No</option></select>";

					}else{

						return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='no'>No</option><option value='si'>Si</option></select>";

					}

					

				}else if(parametro2[5]=="texto__separadores__cierre__anio__fiscal"){

                    if (row[12]=="si") {

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='si' style='background:red;color:white;'>CERRADO</option><option value='no'>No</option></select>";

                    }else{

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='no' style='background:green;color:white;'>No</option><option value='si'>APERTURADO</option></select>";

                    }

                    

                }else if(parametro2[5]=="motivo__adicional"){

                    if (row[12]=="" || row[12]==" " || row[12]==undefined || row[12]==null) {

                        return " ";

                    }else{

                        return row[12];

                    }

                }else if(parametro2[5]=="chekeds__2"){

					return "<input type='checkbox' class='checkeds__seleccionables' idOrganismos='"+row[parametro3[5]]+"' attr='tercerTrimestre'/>";

				}else{
					return row[parametro3[5]];
				}

			})

		});

	}



	if (parametro1[6]!="" && parametro1[6]!=" ") {

		objeto.push({ 

			"aTargets":[parametro1[6]], 
			"mData": null,
			"mRender": (function (data, type, row) {

				if (parametro2[6]=="enlace") {

					if (row[parametro6[6]].indexOf('.pdf') > -1){
						return "<center><a href='"+parametro4[6]+row[parametro6[6]]+"' target='_blank'>"+row[parametro3[6]]+"</a></center>";
					}else{
						return "<center><a href='"+parametro4[6]+row[parametro6[6]]+".pdf' target='_blank'>"+row[parametro3[6]]+"</a></center>";
					}

				}else if(parametro2[6]=="boton"){

					return parametro3[6];

				}else if(parametro2[6]=="texto__separadores"){


					if (row[parametro3[6]]!="" && row[parametro3[6]]!=null && row[parametro3[6]]!=undefined) {

						let arr = row[parametro3[6]].split(';;;;');

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



							if (arr[6]!=undefined && arr[6]!="undefined") {

								var sexto="<div>"+arr[6]+"</div>";

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

						return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

					}else if (row[parametro3[0]]!="" && row[parametro3[0]]!=null) {

						return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

					}else{

						return "Aún no presenta los documentos";

					}


				}else if(parametro2[6]=="texto__separadores__2"){

					let arr = row[parametro3[6]].split('------');

					let primero="";
					let segundo="";
					let tercero="";

					if (arr[0]=="N/A"){

						 primero="";

					}else{

						 primero="<div><a href='documentos/seguimiento/informesSeguimientos/"+arr[0]+"' target='_blank'>Presupuestario</a></div><hr>";
						
					}

					if (arr[1]=="N/A"){

						 segundo="";

					}else{

						if (row[parametro6]=="FORMATIVO") {

							segundo="<div><a href='documentos/seguimiento/informe__formativos/"+arr[1]+"' target='_blank'>Técnico</a></div><hr>";

						}else if(row[parametro6]=="RECREACION"){

							segundo="<div><a href='documentos/seguimiento/informe__recreativos/"+arr[1]+"' target='_blank'>Técnico</a></div><hr>";

						}else{

							segundo="<div><a href='documentos/seguimiento/informes__altos/"+arr[1]+"' target='_blank'>Técnico</a></div><hr>";

						}
						
					}

					if (arr[2]=="N/A"){

						 tercero="";

					}else{

						 tercero="<div><a href='documentos/seguimiento/informesInfraestructuras/"+arr[2]+"' target='_blank'>Infraestructura y/o mantenimiento</a></div><hr>";
						
					}


					return primero+segundo+tercero;

				}else if(parametro2[6]=="texto__separadores__2"){

					if (row[parametro3[6]]=="si") {

						return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado4'><option value='si'>Si</option><option value='no'>No</option></select>";

					}else{

						return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado4'><option value='no'>No</option><option value='si'>Si</option></select>";

					}

					

				}else if(parametro2[6]=="texto__separadores__cierre__anio__fiscal"){

                    if (row[11]=="si") {

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado' style='background:red;color:white;'><option value='si'>CERRADO</option></select>";

                    }else{

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado' style='background:green;color:white;'><option value='no'>ABIERTO</option></select>";

                    }
                    

                }else if(parametro2[6]=="texto__separadores__4"){

					if (row[parametro3[6]]=="si") {

						return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado4'><option value='si'>Si</option><option value='no'>No</option></select>";

					}else{

						return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado4'><option value='no'>No</option><option value='si'>Si</option></select>";

					}

					

				}else if(parametro2[6]=="chekeds__2"){

					return "<input type='checkbox' class='checkeds__seleccionables' idOrganismos='"+row[parametro3[6]]+"'/>";

				}else{
					return row[parametro3[6]];
				}

			})

		});

	}




	if (parametro1[7]!="" && parametro1[7]!=" ") {

		objeto.push({ 

			"aTargets":[parametro1[7]], 
			"mData": null,
			"mRender": (function (data, type, row) {

				if (parametro2[7]=="enlace") {

					if (row[parametro7[7]].indexOf('.pdf') > -1){
						return "<center><a href='"+parametro4[7]+row[parametro7[7]]+"' target='_blank'>"+row[parametro3[7]]+"</a></center>";
					}else{
						return "<center><a href='"+parametro4[7]+row[parametro7[7]]+".pdf' target='_blank'>"+row[parametro3[7]]+"</a></center>";
					}

				}else if(parametro2[7]=="boton"){

					return parametro3[7];

				}else if(parametro2[7]=="texto__separadores"){


					if (row[parametro3[7]]!="" && row[parametro3[7]]!=null && row[parametro3[7]]!=undefined) {

						let arr = row[parametro3[7]].split(';;;;');

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



							if (arr[7]!=undefined && arr[7]!="undefined") {

								var sexto="<div>"+arr[7]+"</div>";

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

						return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

					}else if (row[parametro3[0]]!="" && row[parametro3[0]]!=null) {

						return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

					}else{

						return "Aún no presenta los documentos";

					}


				}else if(parametro2[7]=="texto__separadores__2"){

					let arr = row[parametro3[7]].split('------');

					let primero="";
					let segundo="";
					let tercero="";

					if (arr[0]=="N/A"){

						 primero="";

					}else{

						 primero="<div><a href='documentos/seguimiento/informesSeguimientos/"+arr[0]+"' target='_blank'>Presupuestario</a></div><hr>";
						
					}

					if (arr[1]=="N/A"){

						 segundo="";

					}else{

						if (row[parametro6]=="FORMATIVO") {

							segundo="<div><a href='documentos/seguimiento/informe__formativos/"+arr[1]+"' target='_blank'>Técnico</a></div><hr>";

						}else if(row[parametro6]=="RECREACION"){

							segundo="<div><a href='documentos/seguimiento/informe__recreativos/"+arr[1]+"' target='_blank'>Técnico</a></div><hr>";

						}else{

							segundo="<div><a href='documentos/seguimiento/informes__altos/"+arr[1]+"' target='_blank'>Técnico</a></div><hr>";

						}
						
					}

					if (arr[2]=="N/A"){

						 tercero="";

					}else{

						 tercero="<div><a href='documentos/seguimiento/informesInfraestructuras/"+arr[2]+"' target='_blank'>Infraestructura y/o mantenimiento</a></div><hr>";
						
					}


					return primero+segundo+tercero;

				}else if(parametro2[7]=="texto__separadores__2"){

					if (row[parametro3[7]]=="si") {

						return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='si'>Si</option><option value='no'>No</option></select>";

					}else{

						return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='no'>No</option><option value='si'>Si</option></select>";

					}

					

				}else if(parametro2[5]=="texto__separadores__cierre__anio__fiscal"){

                    if (row[parametro3[5]]=="si") {

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='si' style='background:red;color:white;'>CERRADO</option><option value='no'>No</option></select>";

                    }else{

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='no' style='background:green;color:white;'>No</option><option value='si'>APERTURADO</option></select>";

                    }

                    

                }else if(parametro2[7]=="chekeds__2"){

					return "<input type='checkbox' class='checkeds__seleccionables' idOrganismos='"+row[parametro3[7]]+"' attr='cuartoTrimestre'/>";

				}else if(parametro2[7]=="chekeds__2__2"){

                    return "<input type='checkbox' class='checkeds__seleccionables__modificaciones' idOrganismos='"+row[5]+"'/>";

                }else{
					return row[parametro3[7]];
				}

			})

		});

	}


	if (parametro1[8]!="" && parametro1[8]!=" ") {

		objeto.push({ 

			"aTargets":[parametro1[8]], 
			"mData": null,
			"mRender": (function (data, type, row) {

				if (parametro2[8]=="enlace") {

					if (row[parametro8[8]].indexOf('.pdf') > -1){
						return "<center><a href='"+parametro4[8]+row[parametro8[8]]+"' target='_blank'>"+row[parametro3[8]]+"</a></center>";
					}else{
						return "<center><a href='"+parametro4[8]+row[parametro8[8]]+".pdf' target='_blank'>"+row[parametro3[8]]+"</a></center>";
					}

				}else if(parametro2[8]=="boton"){

					return parametro3[8];

				}else if(parametro2[8]=="texto__separadores"){


					if (row[parametro3[8]]!="" && row[parametro3[8]]!=null && row[parametro3[8]]!=undefined) {

						let arr = row[parametro3[8]].split(';;;;');

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



							if (arr[8]!=undefined && arr[8]!="undefined") {

								var sexto="<div>"+arr[8]+"</div>";

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

						return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

					}else if (row[parametro3[0]]!="" && row[parametro3[0]]!=null) {

						return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

					}else{

						return "Aún no presenta los documentos";

					}


				}else if(parametro2[8]=="texto__separadores__2"){

					if (row[parametro3[8]]=="si") {

						return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='si'>Si</option><option value='no'>No</option></select>";

					}else{

						return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='no'>No</option><option value='si'>Si</option></select>";

					}

					
				}else if(parametro2[5]=="texto__separadores__cierre__anio__fiscal"){

                    if (row[parametro3[5]]=="si") {

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='si' style='background:red;color:white;'>CERRADO</option><option value='no'>No</option></select>";

                    }else{

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='no' style='background:green;color:white;'>No</option><option value='si'>APERTURADO</option></select>";

                    }

                    

                }else if(parametro2[8]=="motivo__adicional"){

                    if (row[13]=="" || row[13]==" " || row[13]==undefined || row[13]==null) {

                        return " ";

                    }else{

                        return row[13];

                    }

                }else if(parametro2[8]=="chekeds__2"){

					return "<input type='checkbox' class='checkeds__seleccionables' idOrganismos='"+row[parametro3[8]]+"' attr='cuartoTrimestre'/>";

				}else{
					return row[parametro3[8]];
				}

			})

		});

	}



	if (parametro1[9]!="" && parametro1[9]!=" ") {

		objeto.push({ 

			"aTargets":[parametro1[9]], 
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

						return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

					}else if (row[parametro3[0]]!="" && row[parametro3[0]]!=null) {

						return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

					}else{

						return "Aún no presenta los documentos";

					}


				}else if(parametro2[5]=="texto__separadores__cierre__anio__fiscal"){

                    if (row[parametro3[5]]=="si") {

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='si' style='background:red;color:white;'>CERRADO</option><option value='no'>No</option></select>";

                    }else{

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='no' style='background:green;color:white;'>No</option><option value='si'>APERTURADO</option></select>";

                    }

                    

                }else{
					return row[parametro3[5]];
				}

			})

		});

	}



	if (parametro1[10]!="" && parametro1[10]!=" ") {

		objeto.push({ 

			"aTargets":[parametro1[10]], 
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

						return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

					}else if (row[parametro3[0]]!="" && row[parametro3[0]]!=null) {

						return "<center><button class='reasignarTramites estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarTra'><i class='fas fa-user-edit'></i></button><center><br>";

					}else{

						return "Aún no presenta los documentos";

					}


				}else if(parametro2[5]=="texto__separadores__cierre__anio__fiscal"){

                    if (row[parametro3[5]]=="si") {

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='si' style='background:red;color:white;'>CERRADO</option><option value='no'>No</option></select>";

                    }else{

                        return "<select  class='selectores__bloqueos__seguimiento ancho__total__input__selects' attr='estado'><option value='no' style='background:green;color:white;'>No</option><option value='si'>APERTURADO</option></select>";

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


var datatabletsPaidRevisor=function(parametro1,parametro2,parametro3,parametro4,parametro5,parametro6,parametro7,parametro8,parametro9,parametro10,parametro11,parametro12){

    if (parametro12!=false) {
        parametro12=true;
    }

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
			{
			
			extend: 'excel',
			className: 'btn-excel',
			text: '<button  class="buttonD" ><i class="fas fa-file-excel" style="color: #277c41; font-size: 36px;" ></i></button>',

		
			

		},
		
		{
			extend: 'pdf',
			text: '<button  class="buttonD" ><i class="fas fa-file-pdf " style="color: #BF0D0D; font-size: 36px;"></i></button>',
		
			orientation: 'landscape',
			customize:function(doc) {

				doc.defaultStyle.fontSize = 6;

				doc.styles.title = {
					color: 'black',
					fontSize: '6',
					alignment: 'center',
					margin:'0'                                                
				}
				doc.styles.tableHeader = {

				fillColor:'#311b92',
				fontSize: '6',
				color:'white',
				alignment:'center',
								
			}
			

			}

			}
		],

        "bLengthChange": false,
        "pagingType": "full_numbers",
        "Paginate": true,
        "pagingType": "full_numbers",
         "retrieve": true, 
         "paging": parametro12, 
         "pageLength":4,
        // "scrollX": true,

        "ajax":{

            "method":"POST",
            "url":"modelosBd/PAID_REVISOR/datatablets.PD.md.php", 
            "data": { 
              "tipo": parametro2,
              "datos": parametro3
            }  

        }, 

        "aoColumnDefs":parametro4,


    });


   for (var i =0; i<parametro6.length;i++) {

       if (parametro6[i]=="funrion__reasignar__paid") {

        funrion__reasignar__paid("#"+parametro2+" tbody",table);

       }

	   if (parametro6[i]=="funrion__reasignar__paid__recomiendas") {

        funrion__reasignar__paid__recomiendas("#"+parametro2+" tbody",table);

       }

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

var datatabletsPaidRevisorVacio=function(tabla,tipo,nombreDocumento,enlaceDocumento,datos,reasignacion){


    /*==================================================
    =            Obtener número de columnas            =
    ==================================================*/
    let contadorCol=$('#'+tipo+' > thead > tr > th').length;
    let contadorRestar=contadorCol - 1;

    //=====  End of Obtener número de columnas  ======/
    
    /*=================================================================
    =            Construir columnas para editar y eliminar            =
    =================================================================*/
    //$('#'+tipo).find('th').eq(contadorRestar).after('<th COLSPAN=1><center>Editar</center></th>');
    //$('#'+tipo).find('th').eq(contadorRestar).after('<th COLSPAN=1><center>Eliminar</center></th>');
    //=====  End of Construir columnas para editar y eliminar  ======/
    
    /*==============================================
    =            Establecer datatablets            =
    ==============================================*/
    
    var table =$(tabla).DataTable({
    
      "language":{
    
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar MENU registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del START al END de un total de TOTAL",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered":   "(filtrado de un total de MAX registros)",
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
        {
          
          extend: 'excel',
          className: 'btn-excel',
          title:nombreDocumento,
          text: '<button  class="buttonD" ><i class="fas fa-file-excel" style="color: #277c41; font-size: 36px;" ></i></button>',
      },
    
      {
        extend: 'pdf',
        title:nombreDocumento,
        text: '<button  class="buttonD" ><i class="fas fa-file-pdf " style="color: #BF0D0D; font-size: 36px;"></i></button>',
      
        orientation: 'landscape',
        customize:function(doc) {

            doc.defaultStyle.fontSize = 6;

            doc.styles.title = {
                color: 'black',
                fontSize: '6',
                alignment: 'center',
                margin:'0'                                                
            }
            doc.styles.tableHeader = {

              fillColor:'#311b92',
              fontSize: '6',
              color:'white',
              alignment:'center',
                              
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
      "pageLength":10,

      fixedHeader: true,

      "initComplete": function (settings, json) {  
        $(tabla).wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
      },
    
    
      "ajax":{
    
        "method":"POST",
		"url":"modelosBd/PAID_REVISOR/datatablets.PD.md.php", 
      
      "data": { 
        "tipo": tipo,
        "datos": datos
        
      }
    
      },
    
  
        "aoColumnDefs":enlaceDocumento
      
    
        
    });




    

    
}

var funrion__reasignar__paid=function(tbody,table){

  $(tbody).on("click","button.reasignarTramites__paid",function(e){

  	e.preventDefault();
	

  	let data=table.row($(this).parents("tr")).data();

  	$(".titulo__asignacion__paid").html("<div class='text-center'>"+data[1]+"</div><div class='text-center'> Techo presupuestario: "+data[11]+"</div>");

  	$("#idOrganismoPaid").val(data[9]);

  	$("#idOrganismo").val(data[9]);

  	$("#idOrganismo__principalAsgnacion").val(data[9]);
	
	$("#identificador").val(data[10]);

  	let idRolAd=$("#idRolAd").val();

  	$("#idUsuarioEn").val($("#idUsuarioPrincipal").val());

  	if (idRolAd==3) {

  		$(".calificar__eliminantes__paid__analistas").show();

  		/*===========================================
  		=            Calificar defaultas            =
  		===========================================*/
  		

		var change__cambio__real=function(parametro1,parametro2){

			$(parametro1).change(function(){
			
				$(".contenedor__boton__negacion").hide();
				$(".contenedor__boton__recomendacion").hide();

			});


		}

		change__cambio__real($(".conjunto__selects__desarrollo"));

		var calificar__botones=function(parametro1,parametro2){

			$(parametro1).click(function(){

				function validacionRegistro(parametro1){

					var sumadorErrores=0;

					$(parametro1).each(function(index) {

						if($(this).val()==0){
							sumadorErrores++;
						}

					});

					if (sumadorErrores==0) {
						return true;
					}else{
						return false;
					}

				}

				var validacionRegistroMostrarErrores=function(parametro1){

					var sumadorErrores=0;

					$(parametro1).each(function(index) {

						if($(this).val()==0){
							$(this).addClass('error');
						}else{
							$(this).removeClass('error');
						}
						
					});

				}


				var validador=validacionRegistro($(".conjunto__selects__desarrollo"));

				validacionRegistroMostrarErrores($(".conjunto__selects__desarrollo"));



				if (validador==false) {

					alertify.set("notifier","position", "top-center");
					alertify.notify("Obligatorio calificar todos los criterios", "error", 5, function(){});

				}else{

					function comparaciones__selectores(parametro1){

						var sumadoresDependencias=0;

						$(parametro1).each(function(index) {

							if($(this).val()=="No"){
								sumadoresDependencias++;
							}

						});

						if (sumadoresDependencias==0) {
							return true;
						}else{
							return false;
						}

					}

					let realizacionEnvios=comparaciones__selectores($(".conjunto__selects__desarrollo"));

					if (realizacionEnvios==false) {

						$(".recomendacion__ocultando").hide();

						$(".contenedor__boton__negacion").show();


					}else{

						$(".recomendacion__ocultando").show();

						$(".contenedor__boton__negacion").hide();


					}
					

				}


			});


		}

		calificar__botones($("#calificar__secciones__alto")); 
		calificar__botones($("#calificar__secciones__desarrollo")); 	
		calificar__botones($("#calificar__secciones__infra")); 	
			
		
		/*=====  End of Calificar defaultas  ======*/
			

		$(".ocultos__en__funcionarios").hide();

		$(".recomendacion__activo__funcionarios").append("<div class='col col-4' style='font-weight:bold!important;'>Regresar al director</div><div class='col col-8' style='text-align:left;'><input type='checkbox' id='regresarCheckeds' class='checkeds'></div>");


		$(".contenedor__boton__generacion__pdf").show();

		var checkboxFunciones__3VisualizarInformacion=function(parametro1,parametro2){

			$(parametro1).click(function(){
			
				var condicion = $(this).is(":checked");

				if (condicion) {

					$(parametro2).hide();

					$(".oculto__paid__informacion").show();

					$(".oculto__calificaciones__altos").hide();
					$(".oculto__calificaciones__desarrollos").hide();


				}else{

					$(".oculto__calificaciones__altos").hide();
					$(".oculto__calificaciones__desarrollos").hide();

					$(".oculto__paid__informacion").hide();

				}


			});


		}

		checkboxFunciones__3VisualizarInformacion($("#informacion__checkeds"),$(".ocultos__en__funcionarios"));


		var checkboxFunciones__2Calificar=function(parametro1,parametro2){

			$(parametro1).click(function(){
			
				var condicion = $(this).is(":checked");

				if (condicion) {

					$(parametro2).hide();

					if (data[10]==1) {

						$(".oculto__calificaciones__altos").hide();
						$(".oculto__calificaciones__desarrollos").show();
						$(".oculto__calificaciones__infraestructura").hide();

					}else if(data[10]==0){

						$(".oculto__calificaciones__altos").show();
						$(".oculto__calificaciones__desarrollos").hide();
						$(".oculto__calificaciones__infraestructura").hide();

					}else{
						$(".oculto__calificaciones__altos").hide();
						$(".oculto__calificaciones__desarrollos").hide();
						$(".oculto__calificaciones__infraestructura").show();
						
					}

					$(".oculto__paid__informacion").hide();


				}else{

					$(".oculto__paid__informacion").hide();

					$(".oculto__calificaciones__altos").hide();
					$(".oculto__calificaciones__desarrollos").hide();
					$(".oculto__calificaciones__infraestructura").hide();
				}


			});


		}
		
		checkboxFunciones__2Calificar($("#calificar__checkeds"),$(".ocultos__en__funcionarios"));


		var checkboxFuncionesRegresarDirector=function(parametro1,parametro2){

			$(parametro1).click(function(){

				var condicion = $(this).is(":checked");

				if (condicion) {

					$(parametro2).show();

					$("#guardarRecomendacion__paid").hide();	
					$("#observaciones__recomendaciones__recomiendas").hide();
					$(".oculto__archivos__recomendaciones").hide();
					$(".contenedor__boton__generacion__pdf__desarrollo").hide();			
					$(".contenedor__boton__generacion__pdf").hide();
					$(".contenedor__boton__generacion__pdf__alto").hide();		


					$(".oculto__paid__informacion").hide();

					$(".oculto__calificaciones__altos").hide();
					$(".oculto__calificaciones__desarrollos").hide();


				}else{


					$(".oculto__paid__informacion").hide();

					$(".oculto__calificaciones__altos").hide();
					$(".oculto__calificaciones__desarrollos").hide();

					$(parametro2).hide();

					$("#guardarRecomendacion__paid").show();	
					$("#observaciones__recomendaciones__recomiendas").show();	
					$(".oculto__archivos__recomendaciones").show();

				if (data[10]==1) {

					$(".contenedor__boton__generacion__pdf__alto").hide();
					$(".contenedor__boton__generacion__pdf__desarrollo").show();

				}else{

					$(".contenedor__boton__generacion__pdf__alto").show();
					$(".contenedor__boton__generacion__pdf__desarrollo").hide();

				}



				}


			});


		}

		checkboxFuncionesRegresarDirector($("#regresarCheckeds"),$(".ocultos__en__funcionarios"));

			if (data[10]==1) {

				$(".contenedor__boton__generacion__pdf__alto").remove();
				$(".contenedor__boton__generacion__pdf__desarrollo").show();
				$(".contenedor__boton__generacion__pdf__infraestructura").remove();

				$("#tipoPdf").val('paid__informe__desarrollo__tecnico');

				$(".eventos__vinculacion__general").hide();
				$(".interdisciplinario__vinculacion__general").hide();
				$(".individuales__vinculacion__general").hide();
				$(".generales__vinculacion__general").hide();
				$(".encuentro__activo__vinculacion__general").show();
				$(".encuentro__activo__Medallas__general").show();
				$(".encuentro__activo__Hospedaje_Alimentacion__general").show();
				$(".encuentro__activo__Matrices_Auxiliares__general").show();
				$(".encuentro__activo__Matrices_Auxiliares__general").show();
				$(".encuentro__activo__Personal_Tecnico__general").show();
				$(".encuentro__activo__Bono_Deportivo__general").show();
				$(".encuentro__activo__Uniformes__general").show();
				$(".encuentro__activo__Seguros__general").show();
				$(".encuentro__activo__Transporte__general").show();
				$(".encuentro__activo__Pasajes_Aereos__general").show();

				$(".matrizEjecucionObra").hide();
						$(".matrizFiscalizacion").hide();

			}else if(data[10]==0){

				$(".contenedor__boton__generacion__pdf__alto").show();
				$(".contenedor__boton__generacion__pdf__desarrollo").remove();
				$(".contenedor__boton__generacion__pdf__infraestructura").remove();
				
				$("#tipoPdf").val('paid__informe__alto__tecnico');


				$(".eventos__vinculacion__general").show();
				$(".interdisciplinario__vinculacion__general").show();
				$(".individuales__vinculacion__general").show();
				$(".generales__vinculacion__general").show();
				$(".encuentro__activo__Medallas__general").hide();
				$(".encuentro__activo__Hospedaje_Alimentacion__general").hide();
				$(".encuentro__activo__Matrices_Auxiliares__general").hide();
				$(".encuentro__activo__Personal_Tecnico__general").hide();
				$(".encuentro__activo__Bono_Deportivo__general").hide();
				$(".encuentro__activo__Uniformes__general").hide();
				$(".encuentro__activo__Seguros__general").hide();
				$(".encuentro__activo__Transporte__general").hide();
				$(".encuentro__activo__Pasajes_Aereos__general").hide();

				$(".matrizEjecucionObra").hide();
						$(".matrizFiscalizacion").hide();

			}else{

				$(".contenedor__boton__generacion__pdf__alto").remove();
				$(".contenedor__boton__generacion__pdf__desarrollo").remove();
				$(".contenedor__boton__generacion__pdf__infraestructura").show();

				$("#tipoPdf").val('paid__informe__infraestructura__tecnico');


				$(".eventos__vinculacion__general").hide();
				$(".interdisciplinario__vinculacion__general").hide();
				$(".individuales__vinculacion__general").hide();
				$(".generales__vinculacion__general").hide();
				$(".encuentro__activo__Medallas__general").hide();
				$(".encuentro__activo__Hospedaje_Alimentacion__general").hide();
				$(".encuentro__activo__Matrices_Auxiliares__general").hide();
				$(".encuentro__activo__Personal_Tecnico__general").hide();
				$(".encuentro__activo__Bono_Deportivo__general").hide();
				$(".encuentro__activo__Uniformes__general").hide();
				$(".encuentro__activo__Seguros__general").hide();
				$(".encuentro__activo__Transporte__general").hide();
				$(".encuentro__activo__Pasajes_Aereos__general").hide();

				$(".matrizEjecucionObra").show();
				$(".matrizFiscalizacion").show();

			}


  	}else{

  		$(".oculto__archivos__recomendaciones").remove();

  		$(".ocultos__en__funcionarios").show();

  		$("#guardarRecomendacion__paid").remove();

  		$("#observaciones__recomendaciones__recomiendas").remove();

  		$(".contenedor__boton__generacion__pdf").remove();

  		$(".contenedor__boton__generacion__pdf").remove();

		$(".contenedor__boton__negacion").remove();

		$(".contenedor__boton__generacion__pdf__alto").remove();

		$(".contenedor__boton__generacion__pdf__desarrollo").show();

		$(".calificar__eliminantes__paid__analistas").remove();

  		var checkboxFunciones__3=function(parametro1,parametro2){

			$(parametro1).click(function(){
			
			    var condicion = $(this).is(":checked");

			    if (condicion) {

			    	$(".oculto__paid__informacion").show();
			    	$(".paid__vinculacion__general").show();
			    	$(".indicadores__vinculacion__general").show();


					if (data[10]==1) {

						$(".eventos__vinculacion__general").hide();
						$(".interdisciplinario__vinculacion__general").hide();
						$(".individuales__vinculacion__general").hide();
						$(".generales__vinculacion__general").hide();
						$(".encuentro__activo__vinculacion__general").show();
						$(".encuentro__activo__Medallas__general").show();
						$(".encuentro__activo__Hospedaje_Alimentacion__general").show();
						$(".encuentro__activo__Matrices_Auxiliares__general").show();
						$(".encuentro__activo__Personal_Tecnico__general").show();
						$(".encuentro__activo__Bono_Deportivo__general").show();
						$(".encuentro__activo__Uniformes__general").show();
						$(".encuentro__activo__Seguros__general").show();
						$(".encuentro__activo__Transporte__general").show();
						$(".encuentro__activo__Pasajes_Aereos__general").show();

						$(".matrizEjecucionObra").hide();
						$(".matrizFiscalizacion").hide();

					}else if (data[10]==0){


						$(".eventos__vinculacion__general").show();
						$(".interdisciplinario__vinculacion__general").show();
						$(".individuales__vinculacion__general").show();
						$(".generales__vinculacion__general").show();
						$(".encuentro__activo__vinculacion__general").hide();
						$(".encuentro__activo__Medallas__general").hide();
						$(".encuentro__activo__Hospedaje_Alimentacion__general").hide();
						$(".encuentro__activo__Matrices_Auxiliares__general").hide();
						$(".encuentro__activo__Personal_Tecnico__general").hide();
						$(".encuentro__activo__Bono_Deportivo__general").hide();
						$(".encuentro__activo__Uniformes__general").hide();
						$(".encuentro__activo__Seguros__general").hide();
						$(".encuentro__activo__Transporte__general").hide();
						$(".encuentro__activo__Pasajes_Aereos__general").hide();

						$(".matrizEjecucionObra").hide();
						$(".matrizFiscalizacion").hide();
				
					}else{

						$(".eventos__vinculacion__general").hide();
						$(".interdisciplinario__vinculacion__general").hide();
						$(".individuales__vinculacion__general").hide();
						$(".generales__vinculacion__general").hide();
						$(".encuentro__activo__vinculacion__general").hide();
						$(".encuentro__activo__Medallas__general").hide();
						$(".encuentro__activo__Hospedaje_Alimentacion__general").hide();
						$(".encuentro__activo__Matrices_Auxiliares__general").hide();
						$(".encuentro__activo__Personal_Tecnico__general").hide();
						$(".encuentro__activo__Bono_Deportivo__general").hide();
						$(".encuentro__activo__Uniformes__general").hide();
						$(".encuentro__activo__Seguros__general").hide();
						$(".encuentro__activo__Transporte__general").hide();
						$(".encuentro__activo__Pasajes_Aereos__general").hide();

						$(".matrizEjecucionObra").show();
						$(".matrizFiscalizacion").show();
					}

			    }else{

					$(".oculto__paid__informacion").hide();
					$(".paid__vinculacion__general").hide();
					$(".indicadores__vinculacion__general").hide();
					$(".eventos__vinculacion__general").hide();
					$(".interdisciplinario__vinculacion__general").hide();
					$(".individuales__vinculacion__general").hide();
					$(".generales__vinculacion__general").hide();
					$(".encuentro__activo__vinculacion__general").hide();
					$(".encuentro__activo__Medallas__general").hide();
					$(".encuentro__activo__Hospedaje_Alimentacion__general").hide();
					$(".encuentro__activo__Matrices_Auxiliares__general").hide();
					$(".encuentro__activo__Personal_Tecnico__general").hide();
					$(".encuentro__activo__Bono_Deportivo__general").hide();
					$(".encuentro__activo__Uniformes__general").hide();
					$(".encuentro__activo__Seguros__general").hide();
					$(".encuentro__activo__Transporte__general").hide();
					$(".encuentro__activo__Pasajes_Aereos__general").hide();

				
			    }


			});


		}
		checkboxFunciones__3($("#informacion__checkeds"),$(".ocultos__en__funcionarios"));



  	}

	console.log(data);

  });

}



var funrion__reasignar__paid__recomiendas=function(tbody,table){

	$(tbody).on("click","button.reasignarTramites__paid__recomiendas",function(e){
  
	  e.preventDefault();
  
	  let data=table.row($(this).parents("tr")).data();
  
	  $(".titulo__asignacion__paid").text(data[1]);
  
	  $("#idOrganismoPaid").val(data[9]);
  
	  $("#idOrganismo__principalAsgnacion").val(data[9]);
  
	  $("#informeEnlacesDescargar").attr('href',$("#filesFrontend").val()+'paid/informesTecnicos/'+data[10]);

	  $("#identificador").val(data[11]);
	  
		var checkboxFunciones__3=function(parametro1,parametro2){

			$(parametro1).click(function(){
			
				var condicion = $(this).is(":checked");

				if (condicion) {

					$(".oculto__paid__informacion").show();
					$(".paid__vinculacion__general").show();
					$(".indicadores__vinculacion__general").show();


					if (data[11]==1) {

						$(".eventos__vinculacion__general").hide();
						$(".interdisciplinario__vinculacion__general").hide();
						$(".individuales__vinculacion__general").hide();
						$(".generales__vinculacion__general").hide();
						$(".encuentro__activo__vinculacion__general").show();
						$(".encuentro__activo__Medallas__general").show();
						$(".encuentro__activo__Hospedaje_Alimentacion__general").show();
						$(".encuentro__activo__Matrices_Auxiliares__general").show();
						$(".encuentro__activo__Personal_Tecnico__general").show();
						$(".encuentro__activo__Bono_Deportivo__general").show();
						$(".encuentro__activo__Uniformes__general").show();
						$(".encuentro__activo__Seguros__general").show();
						$(".encuentro__activo__Transporte__general").show();
						$(".encuentro__activo__Pasajes_Aereos__general").show();

						$(".matrizEjecucionObra").hide();
						$(".matrizFiscalizacion").hide();

					}else if (data[11]==0){


						$(".eventos__vinculacion__general").show();
						$(".interdisciplinario__vinculacion__general").show();
						$(".individuales__vinculacion__general").show();
						$(".generales__vinculacion__general").show();
						$(".encuentro__activo__vinculacion__general").hide();
						$(".encuentro__activo__Medallas__general").hide();
						$(".encuentro__activo__Hospedaje_Alimentacion__general").hide();
						$(".encuentro__activo__Matrices_Auxiliares__general").hide();
						$(".encuentro__activo__Personal_Tecnico__general").hide();
						$(".encuentro__activo__Bono_Deportivo__general").hide();
						$(".encuentro__activo__Uniformes__general").hide();
						$(".encuentro__activo__Seguros__general").hide();
						$(".encuentro__activo__Transporte__general").hide();
						$(".encuentro__activo__Pasajes_Aereos__general").hide();

						$(".matrizEjecucionObra").hide();
						$(".matrizFiscalizacion").hide();
				
					}else{

						$(".eventos__vinculacion__general").hide();
						$(".interdisciplinario__vinculacion__general").hide();
						$(".individuales__vinculacion__general").hide();
						$(".generales__vinculacion__general").hide();
						$(".encuentro__activo__vinculacion__general").hide();
						$(".encuentro__activo__Medallas__general").hide();
						$(".encuentro__activo__Hospedaje_Alimentacion__general").hide();
						$(".encuentro__activo__Matrices_Auxiliares__general").hide();
						$(".encuentro__activo__Personal_Tecnico__general").hide();
						$(".encuentro__activo__Bono_Deportivo__general").hide();
						$(".encuentro__activo__Uniformes__general").hide();
						$(".encuentro__activo__Seguros__general").hide();
						$(".encuentro__activo__Transporte__general").hide();
						$(".encuentro__activo__Pasajes_Aereos__general").hide();

						$(".matrizEjecucionObra").show();
						$(".matrizFiscalizacion").show();
					}

				}else{

					$(".oculto__paid__informacion").hide();
					$(".paid__vinculacion__general").hide();
					$(".indicadores__vinculacion__general").hide();
					$(".eventos__vinculacion__general").hide();
					$(".interdisciplinario__vinculacion__general").hide();
					$(".individuales__vinculacion__general").hide();
					$(".generales__vinculacion__general").hide();
					$(".encuentro__activo__vinculacion__general").hide();


				}


			});


		}
		checkboxFunciones__3($("#informacion__checkeds"),$(".ocultos__en__funcionarios"));
  
  
	  let idRolAd=$("#idRolAd").val();
	  let fisicamenteE=$("#fisicamenteE").val();
  
	  console.log(data);
  
	  var asignacion__usuarios__re__contrarios__coordinadores=function(parametro1){
  
  
		  indicador=502;
		  let idUsuario=$("#idUsuarioPrincipal").val();
		  let idOrganismoPaid=$("#idOrganismoPaid").val();
  
		  $.ajax({
  
			data: {indicador:indicador,idUsuario:idUsuario,idOrganismoPaid:idOrganismoPaid},
			dataType: 'html',
			type:'POST',
			url:'modelosBd/validaciones/selector.modelo.php'
  
		  }).done(function(lista_tipo__organismos){
  
			$(parametro1).html(lista_tipo__organismos);
  
  
		  }).fail(function(){
  
			
  
		  });
  
	  }
  
	  asignacion__usuarios__re__contrarios__coordinadores($("#selectorUsuarios__asignar__plani__coordinadores"));
  
  
	  if (idRolAd==3 && fisicamenteE==18) {
  
		  $(".planificacion__director__variables").remove();
  
		  $(".ocultos__en__funcionarios__paids").hide();
  
		  $(".recomendacion__activo__funcionarios").append("<div class='col col-4' style='font-weight:bold!important;'>Regresar</div><div class='col col-8 text-left'><input type='checkbox' id='regresarCheckeds__paids' class='checkeds'></div>");
  
		  $("#guardarReasignacion__paid__recomendacion").text("REGRESAR");
  
		  var checkboxFunciones=function(parametro1,parametro2){
  
			  $(parametro1).click(function(){
			  
				  var condicion = $(this).is(":checked");
  
				  if (condicion) {
  
					$(parametro2).show();
  
					$("#guardarRecomendacion__final__paid").hide();   
					$("#observaciones__recomendaciones__recomiendas__final").hide();  
  
					$(".file__final__paid").hide();             
  
				  }else{
  
					$(parametro2).hide();
  
					$("#guardarRecomendacion__final__paid").show();   
					$("#observaciones__recomendaciones__recomiendas__final").show();  
  
					$(".file__final__paid").show();
  
				 }
  
  
			  });
  
  
		  }
		  checkboxFunciones($("#regresarCheckeds__paids"),$(".ocultos__en__funcionarios__paids"));
  
		  $("#selectorUsuarios__asignar__contrarios").remove();
		  $("#selectorUsuarios__asignar__contrarios__subsecretarias").remove();
		  $("#selectorUsuarios__asignar__plani__coordinadores").remove();
		  $("#selectorUsuarios__asignar__plani__directores").remove();
  
		  $(".oculto__archivos__recomendaciones__de__finales").remove();
  
		  $(".recomendaciones__directores").remove();
  
		  $(".ocultando__necesarios__directores").remove();
  
		  $("#observaciones__recomendaciones__recomiendas__final").remove();
  
		  $("#observaciones__recomendaciones__recomiendas__final").remove();
  
		  $(".contenido__asignaciones__directores__apruebas").remove();
  
  
  
	  }else if (idRolAd==2 && fisicamenteE==18) {
  
		  $("#selectorUsuarios__asignar__contrarios").remove();
		  $("#selectorUsuarios__asignar__contrarios__subsecretarias").remove();
		  $("#selectorUsuarios__asignar__plani__coordinadores").remove();
		  $("#selectorUsuarios__asignar__plani__analistas").remove();
  
  
		  $(".contenido__asignaciones__directores").hide();
		  $(".contenido__asignaciones__directores__apruebas").hide();
  
		  $(".oculto__archivos__recomendaciones__de__finales").remove();
  
		  $(".encuentro__activo__vinculacion__general").show();
  
		  $(".recomendacion__analista__director__planificaciones").remove();
  
		  var checkboxFunciones__5=function(parametro1,parametro2){
  
			  $(parametro1).click(function(){
			  
				  var condicion = $(this).is(":checked");
  
				  if (condicion) {
  
					  $(".oculto__paid__informacion").hide();
					  $(".paid__vinculacion__general").hide();
					  $(".indicadores__vinculacion__general").hide();
					  $(".oculto__paid__informacion").hide();
					  $(".paid__vinculacion__general").hide();
					  $(".indicadores__vinculacion__general").hide();
					  $(".eventos__vinculacion__general").hide();
					  $(".interdisciplinario__vinculacion__general").hide();
					  $(".individuales__vinculacion__general").hide();
					  $(".generales__vinculacion__general").hide();
					  $(".encuentro__activo__vinculacion__general").hide();
  
					  $(".contenido__asignaciones__directores").hide();
					  $(".contenido__asignaciones__directores__apruebas").hide();
  
					  $(parametro2).show();
  
  
				  }else{
  
					  $(".oculto__paid__informacion").hide();
					  $(".paid__vinculacion__general").hide();
					  $(".indicadores__vinculacion__general").hide();
					  $(".eventos__vinculacion__general").hide();
					  $(".interdisciplinario__vinculacion__general").hide();
					  $(".individuales__vinculacion__general").hide();
					  $(".generales__vinculacion__general").hide();
					  $(".encuentro__activo__vinculacion__general").hide();
  
					  $(".contenido__asignaciones__directores").hide();
					  $(".contenido__asignaciones__directores__apruebas").hide();
  
					  $(parametro2).hide();
  
  
				  }
  
  
			  });
  
  
		  }
		  checkboxFunciones__5($("#asignar__directorPlanificacion"),$(".contenido__asignaciones__directores"));
		  checkboxFunciones__5($("#aprobar__directorPlanificacion"),$(".contenido__asignaciones__directores__apruebas"));
  
		  $(".recomendaciones__directores").remove();
  
	  }else if (idRolAd==4 && fisicamenteE==3) {
  
		  $(".recomendacion__analista__director__planificaciones").remove();
  
		  $("#selectorUsuarios__asignar__contrarios").remove();
		  $("#selectorUsuarios__asignar__contrarios__subsecretarias").remove();
		  $("#selectorUsuarios__asignar__plani__directores").remove();
		  $("#selectorUsuarios__asignar__plani__analistas").remove();
  
		  $("#guardarRecomendacion__final__paid").remove();   
		  $("#observaciones__recomendaciones__recomiendas__final").remove();  
  
		  $(".oculto__archivos__recomendaciones__de__finales").remove();
  
		  $(".file__final__paid").remove();
  
		  $(".planificacion__director__variables").remove();
  
		  $(".recomendaciones__directores").remove();
  
		  $(".ocultando__necesarios__directores").remove();
  
  
	  }else if (idRolAd==7) {
  
		  $(".recomendacion__analista__director__planificaciones").remove();
  
		  $("#selectorUsuarios__asignar__contrarios").remove();
		  $("#selectorUsuarios__asignar__plani__coordinadores").remove();
		  $("#selectorUsuarios__asignar__plani__directores").remove();
		  $("#selectorUsuarios__asignar__plani__analistas").remove();
  
		  $("#guardarRecomendacion__final__paid").remove();   
		  $("#observaciones__recomendaciones__recomiendas__final").remove();  
  
		  $(".file__final__paid").remove();
  
		  $(".planificacion__director__variables").remove();
  
		  $(".recomendaciones__directores").remove();
  
		  $(".ocultando__necesarios__directores").remove();
  
	  }else{
  
		  $(".recomendacion__analista__director__planificaciones").remove();
  
		  $("#selectorUsuarios__asignar__contrarios__subsecretarias").remove();
		  $("#selectorUsuarios__asignar__plani__coordinadores").remove();
		  $("#selectorUsuarios__asignar__plani__directores").remove();
		  $("#selectorUsuarios__asignar__plani__analistas").remove();
  
		  $("#guardarRecomendacion__final__paid").remove();   
		  $("#observaciones__recomendaciones__recomiendas__final").remove();  
  
		  $(".file__final__paid").remove();
  
		  $(".planificacion__director__variables").remove();
  
		  $(".recomendaciones__directores").remove();
  
		  $(".ocultando__necesarios__directores").remove();
  
	  }
  
	  console.log(data);
  
	});
  
  }


var agregarDatatablets=function(parametro1,parametro2,parametro3){

	$(parametro1).click(function (e){

		datatabletsPaidRevisor($(parametro2),parametro3,[$("#idOrganismo__principalAsgnacion").val()],false,false,false,[false],[false],false);

	});

}


var agregarDatatabletsObjetosPaid=function(parametro1,parametro2,parametro3){

	$(parametro1).click(function (e){


		$.getScript("layout/scripts/js/PAID_INFRAESTRUCTURA/datatables.js",function(){

		
				datatabletsPaidInfraestructuraVacio($(parametro2),parametro3,"s",objetosPaidInfraestructura2023([1,2,3,4],["enlace","boton","boton","boton"],[1,"<center><a data-bs-toggle='modal' data-bs-target='#modalDocumentosAnexosInfraestructura' class='anexosObraInfra estilo__botonDatatablets btn btn-warning pointer__botones'><i class='fas fa-folder'></i></a><center>","<center><a data-bs-toggle='modal' data-bs-target='#modalDocumentosAnexosInfraestructura' class='beneficiariosDirectosObraInfra estilo__botonDatatablets btn btn-warning pointer__botones'><i class='fas fa-users'></i></a><center>","<center><a data-bs-toggle='modal' data-bs-target='#modalDocumentosAnexosInfraestructura' class='beneficiariosObraAdaptadoInfra estilo__botonDatatablets btn btn-warning pointer__botones'><i class='fas fa-user-friends'></i></a><center>"],[$("#filesFrontend").val()+"paid/informes__infraestructura/"],[1]),[$("#idOrganismo__principalAsgnacion").val()],false);
			
			
				funcion__abrirDatatableAnexosDocumentos__paid_infraestructura_revisor("#paidEjecucionObraInfraestructura__revisor tbody",$("#paidEjecucionObraInfraestructura__revisor"),"anexosObraInfra","Anexos Obra")
				funcion__abrirDatatableAnexosDocumentos__paid_infraestructura_revisor("#paidEjecucionObraInfraestructura__revisor tbody",$("#paidEjecucionObraInfraestructura__revisor"),"beneficiariosDirectosObraInfra","Beneficiarios Directos")
				funcion__abrirDatatableAnexosDocumentos__paid_infraestructura_revisor("#paidEjecucionObraInfraestructura__revisor tbody",$("#paidEjecucionObraInfraestructura__revisor"),"beneficiariosObraAdaptadoInfra","Beneficiarios Adaptado")
			
			
		});

	});

}

var agregarDatatabletsObjetosPaid2=function(parametro1,parametro2,parametro3){

	$(parametro1).click(function (e){


		$.getScript("layout/scripts/js/PAID_INFRAESTRUCTURA/datatables.js",function(){

		
			datatabletsPaidInfraestructuraVacio($(parametro2),parametro3,"s",objetosPaidInfraestructura2023([1,2],["enlace","boton"],[1,"<center><a data-bs-toggle='modal' data-bs-target='#modalDocumentosAnexosInfraestructura' class='anexosObraInfraFiscalizacion estilo__botonDatatablets btn btn-warning pointer__botones'><i class='fas fa-folder'></i></a><center>"],[$("#filesFrontend").val()+"paid/informes__infraestructura/"],[1]),[$("#idOrganismo__principalAsgnacion").val()],false);

		
			funcion__abrirDatatableAnexosDocumentos__paid_infraestructura_revisor("#paidFiscalizacionInfraestructura__revisor tbody",$("#paidFiscalizacionInfraestructura__revisor"),"anexosObraInfraFiscalizacion","Anexos Fiscalización")
		
			
		
			
		});

	});

}







