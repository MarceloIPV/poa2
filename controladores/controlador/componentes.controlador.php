<?php

	class componentes{

		public function get__contraloria__variables__3($parametro1){



			$modal="

			<div class='modal' id='$parametro1'>

				<div class='modal-dialog'>

					<form class='modal-content formulario__intervencion__eliminar formulario__tipo__contrataciones'>

						<div class='modal-header row'>

						    <div class='col col-11 text-center'>

						    	<h5 class='modal-title'>TIPO DE CONTRATACIÓN</h5>

						    </div>

						    <div class='col col-1'>

						    	<button type='button' class='btn-close cerrar__modalRegistros' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

						    </div>

						</div>

						<div class='modal-body row'>

							<input type='hidden' id='idItemCatalogo__3' name='idItemCatalogo__3' />

							<div class='col col-12' style='font-weight:bold; text-align:center;'>Bienes y servicios normalizados</div>

							<div class='col col-4'>Catálogo Electrónico</div>

							<div class='col col-2 text-left'>
								<input type='checkbox' id='catalogo__elect__3' name='catalogo__elect__3' class='catalogo__elect checkeds enlazados__checkeds__contratos__3' value='catalogo__elect' />
							</div>

							<div class='col col-6 text-left'>
								<textarea id='catalogo__elect__texto__3' name='catalogo__elect__texto__3' class='catalogo__elect__texto ancho__total__textareas'></textarea>
							</div>


							<div class='col col-4'>Subasta Inversa Electrónica</div>

							<div class='col col-2 text-left'>
								<input type='checkbox' id='catalogo__subasta__3' name='catalogo__subasta__3' class='catalogo__subasta checkeds enlazados__checkeds__contratos__3' value='catalogo__subasta' />
							</div>

							<div class='col col-6 text-left'>
								<textarea id='catalogo__subasta__texto__3' name='catalogo__subasta__texto__3' class='catalogo__subasta__texto ancho__total__textareas'></textarea>
							</div>


							<div class='col col-4'>Ínfima Cuantía</div>

							<div class='col col-2 text-left'>
								<input type='checkbox' id='catalogo__infima__3' name='catalogo__infima__3' class='catalogo__infima checkeds enlazados__checkeds__contratos__3' value='catalogo__infima' />
							</div>

							<div class='col col-6 text-left'>
								<textarea id='catalogo__infima__texto__3' name='catalogo__infima__texto__3' class='catalogo__infima__texto ancho__total__textareas'></textarea>
							</div>

							<div class='col col-12' style='font-weight:bold; text-align:center;'>Bienes y servicios no normalizados</div>


							<div class='col col-4'>Menor Cuantía</div>

							<div class='col col-2 text-left'>
								<input type='checkbox' id='catalogo__menorCuantia__3' name='catalogo__menorCuantia__3' class='catalogo__menorCuantia checkeds enlazados__checkeds__contratos__3' value='catalogo__menorCuantia' />
							</div>

							<div class='col col-6 text-left'>
								<textarea id='catalogo__menorCuantia__texto__3' name='catalogo__menorCuantia__texto__3' class='catalogo__menorCuantia__texto ancho__total__textareas'></textarea>
							</div>


							<div class='col col-4'>Cotización</div>

							<div class='col col-2 text-left'>
								<input type='checkbox' id='catalogo__cotizacion__3' name='catalogo__cotizacion__3' class='catalogo__cotizacion checkeds enlazados__checkeds__contratos__3' value='catalogo__cotizacion' />
							</div>

							<div class='col col-6 text-left'>
								<textarea id='catalogo__cotizacion__texto__3' name='catalogo__cotizacion__texto__3' class='catalogo__cotizacion__texto ancho__total__textareas'></textarea>
							</div>


							<div class='col col-4'>Licitación</div>

							<div class='col col-2 text-left'>
								<input type='checkbox' id='catalogo__licitacion__3' name='catalogo__licitacion__3' class='catalogo__licitacion checkeds enlazados__checkeds__contratos__3' value='catalogo__licitacion' />
							</div>

							<div class='col col-6 text-left'>
								<textarea id='catalogo__licitacion__texto__3' name='catalogo__licitacion__texto__3' class='catalogo__licitacion__texto ancho__total__textareas'></textarea>
							</div>

							<div class='col col-12' style='font-weight:bold; text-align:center;'>Obras</div>


							<div class='col col-4'>Menor Cuantía</div>

							<div class='col col-2 text-left'>
								<input type='checkbox' id='catalogo__menorCuantiaObras__3' name='catalogo__menorCuantiaObras__3' class='catalogo__menorCuantiaObras checkeds enlazados__checkeds__contratos__3' value='catalogo__menorCuantiaObras' />
							</div>

							<div class='col col-6 text-left'>
								<textarea id='catalogo__menorCuantiaObras__texto__3' name='catalogo__menorCuantiaObras__texto__3' class='catalogo__menorCuantiaObras__texto ancho__total__textareas'></textarea>
							</div>


							<div class='col col-4'>Cotización</div>

							<div class='col col-2 text-left'>
								<input type='checkbox' id='catalogo__cotizacionObras__3' name='catalogo__cotizacionObras__3' class='catalogo__cotizacionObras checkeds enlazados__checkeds__contratos__3' value='catalogo__cotizacionObras' />
							</div>

							<div class='col col-6 text-left'>
								<textarea id='catalogo__cotizacionObras__texto__3' name='catalogo__cotizacionObras__texto__3' class='catalogo__cotizacionObras__texto ancho__total__textareas'></textarea>
							</div>

							<div class='col col-4'>Licitación</div>

							<div class='col col-2 text-left'>
								<input type='checkbox' id='catalogo__licitacionObras__3' name='catalogo__licitacionObras__3' class='catalogo__licitacionObras checkeds enlazados__checkeds__contratos__3' value='catalogo__licitacionObras' />
							</div>

							<div class='col col-6 text-left'>
								<textarea id='catalogo__licitacionObras__texto__3' name='catalogo__licitacionObras__texto__3' class='catalogo__licitacionObras__texto ancho__total__textareas'></textarea>
							</div>


							<div class='col col-4'>Precio Fijo</div>

							<div class='col col-2 text-left'>
								<input type='checkbox' id='catalogo__precioObras__3' name='catalogo__precioObras__3' class='catalogo__precioObras checkeds enlazados__checkeds__contratos__3' value='catalogo__precioObras' />
							</div>

							<div class='col col-6 text-left'>
								<textarea id='catalogo__precioObras__texto__3' name='catalogo__precioObras__texto__3' class='catalogo__precioObras__texto ancho__total__textareas'></textarea>
							</div>

							<div class='col col-12' style='font-weight:bold; text-align:center;'>Consultoría</div>


							<div class='col col-4'>Contratación Directa</div>

							<div class='col col-2 text-left'>
								<input type='checkbox' id='catalogo__contratacionDirecta__3' name='catalogo__contratacionDirecta__3' class='catalogo__contratacionDirecta checkeds enlazados__checkeds__contratos__3' value='catalogo__contratacionDirecta' />
							</div>

							<div class='col col-6 text-left'>
								<textarea id='catalogo__contratacionDirecta__texto__3' name='catalogo__contratacionDirecta__texto__3' class='ancho__total__textareas catalogo__contratacionDirecta__texto'></textarea>
							</div>



							<div class='col col-4'>Lista Corta</div>

							<div class='col col-2 text-left'>
								<input type='checkbox' id='catalogo__contratacionListaCorta__3' name='catalogo__contratacionListaCorta__3' class='catalogo__contratacionListaCorta checkeds enlazados__checkeds__contratos__3' value='catalogo__contratacionListaCorta' />
							</div>

							<div class='col col-6 text-left'>
								<textarea id='catalogo__contratacionListaCorta__texto__3' name='catalogo__contratacionListaCorta__texto__3' class='catalogo__contratacionListaCorta__texto ancho__total__textareas'></textarea>
							</div>


							<div class='col col-4'>Concurso Público</div>

							<div class='col col-2 text-left'>
								<input type='checkbox' id='catalogo__contratacionConcursoPu__3' name='catalogo__contratacionConcursoPu__3' class='catalogo__contratacionConcursoPu checkeds enlazados__checkeds__contratos__3' value='catalogo__contratacionConcursoPu' />
							</div>

							<div class='col col-6 text-left'>
								<textarea id='catalogo__contratacionConcursoPu__texto__3' name='catalogo__contratacionConcursoPu__texto__3' class='catalogo__contratacionConcursoPu__texto ancho__total__textareas'></textarea>
							</div>							


							<div class='col col-4'>N/A</div>

							<div class='col col-8 text-left'>
								<input type='checkbox' id='noAplica__3' name='noAplica__3' class='catalogo__contratacionConcursoPu checkeds enlazados__checkeds__contratos__3' value='catalogo__contratacionConcursoPu' />
							</div>

							<div class='col col-6 text-left'>

								<button class='text-center btn btn-primary' id='guardarContrataciones__publicas__3'>Guardar</button>

							</div>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;



		}


		public function get__contraloria__variables__2($parametro1){



			$modal="

			<div class='modal' id='$parametro1'>

				<div class='modal-dialog'>

					<form class='modal-content formulario__intervencion__eliminar formulario__tipo__contrataciones'>

						<div class='modal-header row'>

						    <div class='col col-11 text-center'>

						    	<h5 class='modal-title'>TIPO DE CONTRATACIÓN</h5>

						    </div>

						    <div class='col col-1'>

						    	<button type='button' class='btn-close cerrar__modalRegistros' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

						    </div>

						</div>

						<div class='modal-body row'>

							<input type='hidden' id='idItemCatalogo__2' name='idItemCatalogo__2' />

							<div class='col col-12' style='font-weight:bold; text-align:center;'>Bienes y servicios normalizados</div>

							<div class='col col-4'>Catálogo Electrónico</div>

							<div class='col col-2 text-left'>
								<input type='checkbox' id='catalogo__elect__2' name='catalogo__elect__2' class='catalogo__elect checkeds enlazados__checkeds__contratos__2' value='catalogo__elect' />
							</div>

							<div class='col col-6 text-left'>
								<textarea id='catalogo__elect__texto__2' name='catalogo__elect__texto__2' class='catalogo__elect__texto ancho__total__textareas'></textarea>
							</div>


							<div class='col col-4'>Subasta Inversa Electrónica</div>

							<div class='col col-2 text-left'>
								<input type='checkbox' id='catalogo__subasta__2' name='catalogo__subasta__2' class='catalogo__subasta checkeds enlazados__checkeds__contratos__2' value='catalogo__subasta' />
							</div>

							<div class='col col-6 text-left'>
								<textarea id='catalogo__subasta__texto__2' name='catalogo__subasta__texto__2' class='catalogo__subasta__texto ancho__total__textareas'></textarea>
							</div>


							<div class='col col-4'>Ínfima Cuantía</div>

							<div class='col col-2 text-left'>
								<input type='checkbox' id='catalogo__infima__2' name='catalogo__infima__2' class='catalogo__infima checkeds enlazados__checkeds__contratos__2' value='catalogo__infima' />
							</div>

							<div class='col col-6 text-left'>
								<textarea id='catalogo__infima__texto__2' name='catalogo__infima__texto__2' class='catalogo__infima__texto ancho__total__textareas'></textarea>
							</div>

							<div class='col col-12' style='font-weight:bold; text-align:center;'>Bienes y servicios no normalizados</div>


							<div class='col col-4'>Menor Cuantía</div>

							<div class='col col-2 text-left'>
								<input type='checkbox' id='catalogo__menorCuantia__2' name='catalogo__menorCuantia__2' class='catalogo__menorCuantia checkeds enlazados__checkeds__contratos__2' value='catalogo__menorCuantia' />
							</div>

							<div class='col col-6 text-left'>
								<textarea id='catalogo__menorCuantia__texto__2' name='catalogo__menorCuantia__texto__2' class='catalogo__menorCuantia__texto ancho__total__textareas'></textarea>
							</div>


							<div class='col col-4'>Cotización</div>

							<div class='col col-2 text-left'>
								<input type='checkbox' id='catalogo__cotizacion__2' name='catalogo__cotizacion__2' class='catalogo__cotizacion checkeds enlazados__checkeds__contratos__2' value='catalogo__cotizacion' />
							</div>

							<div class='col col-6 text-left'>
								<textarea id='catalogo__cotizacion__texto__2' name='catalogo__cotizacion__texto__2' class='catalogo__cotizacion__texto ancho__total__textareas'></textarea>
							</div>


							<div class='col col-4'>Licitación</div>

							<div class='col col-2 text-left'>
								<input type='checkbox' id='catalogo__licitacion__2' name='catalogo__licitacion__2' class='catalogo__licitacion checkeds enlazados__checkeds__contratos__2' value='catalogo__licitacion' />
							</div>

							<div class='col col-6 text-left'>
								<textarea id='catalogo__licitacion__texto__2' name='catalogo__licitacion__texto__2' class='catalogo__licitacion__texto ancho__total__textareas'></textarea>
							</div>

							<div class='col col-12' style='font-weight:bold; text-align:center;'>Obras</div>


							<div class='col col-4'>Menor Cuantía</div>

							<div class='col col-2 text-left'>
								<input type='checkbox' id='catalogo__menorCuantiaObras__2' name='catalogo__menorCuantiaObras__2' class='catalogo__menorCuantiaObras checkeds enlazados__checkeds__contratos__2' value='catalogo__menorCuantiaObras' />
							</div>

							<div class='col col-6 text-left'>
								<textarea id='catalogo__menorCuantiaObras__texto__2' name='catalogo__menorCuantiaObras__texto__2' class='catalogo__menorCuantiaObras__texto ancho__total__textareas'></textarea>
							</div>


							<div class='col col-4'>Cotización</div>

							<div class='col col-2 text-left'>
								<input type='checkbox' id='catalogo__cotizacionObras__2' name='catalogo__cotizacionObras__2' class='catalogo__cotizacionObras checkeds enlazados__checkeds__contratos__2' value='catalogo__cotizacionObras' />
							</div>

							<div class='col col-6 text-left'>
								<textarea id='catalogo__cotizacionObras__texto__2' name='catalogo__cotizacionObras__texto__2' class='catalogo__cotizacionObras__texto ancho__total__textareas'></textarea>
							</div>

							<div class='col col-4'>Licitación</div>

							<div class='col col-2 text-left'>
								<input type='checkbox' id='catalogo__licitacionObras__2' name='catalogo__licitacionObras__2' class='catalogo__licitacionObras checkeds enlazados__checkeds__contratos__2' value='catalogo__licitacionObras' />
							</div>

							<div class='col col-6 text-left'>
								<textarea id='catalogo__licitacionObras__texto__2' name='catalogo__licitacionObras__texto__2' class='catalogo__licitacionObras__texto ancho__total__textareas'></textarea>
							</div>


							<div class='col col-4'>Precio Fijo</div>

							<div class='col col-2 text-left'>
								<input type='checkbox' id='catalogo__precioObras__2' name='catalogo__precioObras__2' class='catalogo__precioObras checkeds enlazados__checkeds__contratos__2' value='catalogo__precioObras' />
							</div>

							<div class='col col-6 text-left'>
								<textarea id='catalogo__precioObras__texto__2' name='catalogo__precioObras__texto__2' class='catalogo__precioObras__texto ancho__total__textareas'></textarea>
							</div>

							<div class='col col-12' style='font-weight:bold; text-align:center;'>Consultoría</div>


							<div class='col col-4'>Contratación Directa</div>

							<div class='col col-2 text-left'>
								<input type='checkbox' id='catalogo__contratacionDirecta__2' name='catalogo__contratacionDirecta__2' class='catalogo__contratacionDirecta checkeds enlazados__checkeds__contratos__2' value='catalogo__contratacionDirecta' />
							</div>

							<div class='col col-6 text-left'>
								<textarea id='catalogo__contratacionDirecta__texto__2' name='catalogo__contratacionDirecta__texto__2' class='ancho__total__textareas catalogo__contratacionDirecta__texto'></textarea>
							</div>



							<div class='col col-4'>Lista Corta</div>

							<div class='col col-2 text-left'>
								<input type='checkbox' id='catalogo__contratacionListaCorta__2' name='catalogo__contratacionListaCorta__2' class='catalogo__contratacionListaCorta checkeds enlazados__checkeds__contratos__2' value='catalogo__contratacionListaCorta' />
							</div>

							<div class='col col-6 text-left'>
								<textarea id='catalogo__contratacionListaCorta__texto__2' name='catalogo__contratacionListaCorta__texto__2' class='catalogo__contratacionListaCorta__texto ancho__total__textareas'></textarea>
							</div>


							<div class='col col-4'>Concurso Público</div>

							<div class='col col-2 text-left'>
								<input type='checkbox' id='catalogo__contratacionConcursoPu__2' name='catalogo__contratacionConcursoPu__2' class='catalogo__contratacionConcursoPu checkeds enlazados__checkeds__contratos__2' value='catalogo__contratacionConcursoPu' />
							</div>

							<div class='col col-6 text-left'>
								<textarea id='catalogo__contratacionConcursoPu__texto__2' name='catalogo__contratacionConcursoPu__texto__2' class='catalogo__contratacionConcursoPu__texto ancho__total__textareas'></textarea>
							</div>							

							<div class='col col-4'>N/A</div>

							<div class='col col-8 text-left'>
								<input type='checkbox' id='noAplica__3' name='noAplica__3' class='catalogo__contratacionConcursoPu checkeds enlazados__checkeds__contratos__3' value='catalogo__contratacionConcursoPu' />
							</div>


							<div class='col col-6 text-left'>

								<button class='text-center btn btn-primary' id='guardarContrataciones__publicas__2'>Guardar</button>

							</div>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;



		}

		public function get__contraloria__variables($parametro1){



			$modal="

			<div class='modal' id='$parametro1'>

				<div class='modal-dialog'>

					<form class='modal-content formulario__intervencion__eliminar formulario__tipo__contrataciones'>

						<div class='modal-header row'>

						    <div class='col col-11 text-center'>

						    	<h5 class='modal-title'>TIPO DE CONTRATACIÓN</h5>

						    </div>

						    <div class='col col-1'>

						    	<button type='button' class='btn-close cerrar__modalRegistros' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

						    </div>

						</div>

						<div class='modal-body row'>

							<input type='hidden' id='idItemCatalogo' name='idItemCatalogo' />

							<div class='col col-12' style='font-weight:bold; text-align:center;'>Bienes y servicios normalizados</div>

							<div class='col col-4'>Catálogo Electrónico</div>

							<div class='col col-2 text-left'>
								<input type='checkbox' id='catalogo__elect' name='catalogo__elect' class='catalogo__elect checkeds enlazados__checkeds__contratos' value='catalogo__elect' />
							</div>

							<div class='col col-6 text-left'>
								<textarea id='catalogo__elect__texto' name='catalogo__elect__texto' class='catalogo__elect__texto ancho__total__textareas'></textarea>
							</div>


							<div class='col col-4'>Subasta Inversa Electrónica</div>

							<div class='col col-2 text-left'>
								<input type='checkbox' id='catalogo__subasta' name='catalogo__subasta' class='catalogo__subasta checkeds enlazados__checkeds__contratos' value='catalogo__subasta' />
							</div>

							<div class='col col-6 text-left'>
								<textarea id='catalogo__subasta__texto' name='catalogo__subasta__texto' class='catalogo__subasta__texto ancho__total__textareas'></textarea>
							</div>


							<div class='col col-4'>Ínfima Cuantía</div>

							<div class='col col-2 text-left'>
								<input type='checkbox' id='catalogo__infima' name='catalogo__infima' class='catalogo__infima checkeds enlazados__checkeds__contratos' value='catalogo__infima' />
							</div>

							<div class='col col-6 text-left'>
								<textarea id='catalogo__infima__texto' name='catalogo__infima__texto' class='catalogo__infima__texto ancho__total__textareas'></textarea>
							</div>

							<div class='col col-12' style='font-weight:bold; text-align:center;'>Bienes y servicios no normalizados</div>


							<div class='col col-4'>Menor Cuantía</div>

							<div class='col col-2 text-left'>
								<input type='checkbox' id='catalogo__menorCuantia' name='catalogo__menorCuantia' class='catalogo__menorCuantia checkeds enlazados__checkeds__contratos' value='catalogo__menorCuantia' />
							</div>

							<div class='col col-6 text-left'>
								<textarea id='catalogo__menorCuantia__texto' name='catalogo__menorCuantia__texto' class='catalogo__menorCuantia__texto ancho__total__textareas'></textarea>
							</div>


							<div class='col col-4'>Cotización</div>

							<div class='col col-2 text-left'>
								<input type='checkbox' id='catalogo__cotizacion' name='catalogo__cotizacion' class='catalogo__cotizacion checkeds enlazados__checkeds__contratos' value='catalogo__cotizacion' />
							</div>

							<div class='col col-6 text-left'>
								<textarea id='catalogo__cotizacion__texto' name='catalogo__cotizacion__texto' class='catalogo__cotizacion__texto ancho__total__textareas'></textarea>
							</div>


							<div class='col col-4'>Licitación</div>

							<div class='col col-2 text-left'>
								<input type='checkbox' id='catalogo__licitacion' name='catalogo__licitacion' class='catalogo__licitacion checkeds enlazados__checkeds__contratos' value='catalogo__licitacion' />
							</div>

							<div class='col col-6 text-left'>
								<textarea id='catalogo__licitacion__texto' name='catalogo__licitacion__texto' class='catalogo__licitacion__texto ancho__total__textareas'></textarea>
							</div>

							<div class='col col-12' style='font-weight:bold; text-align:center;'>Obras</div>


							<div class='col col-4'>Menor Cuantía</div>

							<div class='col col-2 text-left'>
								<input type='checkbox' id='catalogo__menorCuantiaObras' name='catalogo__menorCuantiaObras' class='catalogo__menorCuantiaObras checkeds enlazados__checkeds__contratos' value='catalogo__menorCuantiaObras' />
							</div>

							<div class='col col-6 text-left'>
								<textarea id='catalogo__menorCuantiaObras__texto' name='catalogo__menorCuantiaObras__texto' class='catalogo__menorCuantiaObras__texto ancho__total__textareas'></textarea>
							</div>


							<div class='col col-4'>Cotización</div>

							<div class='col col-2 text-left'>
								<input type='checkbox' id='catalogo__cotizacionObras' name='catalogo__cotizacionObras' class='catalogo__cotizacionObras checkeds enlazados__checkeds__contratos' value='catalogo__cotizacionObras' />
							</div>

							<div class='col col-6 text-left'>
								<textarea id='catalogo__cotizacionObras__texto' name='catalogo__cotizacionObras__texto' class='catalogo__cotizacionObras__texto ancho__total__textareas'></textarea>
							</div>

							<div class='col col-4'>Licitación</div>

							<div class='col col-2 text-left'>
								<input type='checkbox' id='catalogo__licitacionObras' name='catalogo__licitacionObras' class='catalogo__licitacionObras checkeds enlazados__checkeds__contratos' value='catalogo__licitacionObras' />
							</div>

							<div class='col col-6 text-left'>
								<textarea id='catalogo__licitacionObras__texto' name='catalogo__licitacionObras__texto' class='catalogo__licitacionObras__texto ancho__total__textareas'></textarea>
							</div>


							<div class='col col-4'>Precio Fijo</div>

							<div class='col col-2 text-left'>
								<input type='checkbox' id='catalogo__precioObras' name='catalogo__precioObras' class='catalogo__precioObras checkeds enlazados__checkeds__contratos' value='catalogo__precioObras' />
							</div>

							<div class='col col-6 text-left'>
								<textarea id='catalogo__precioObras__texto' name='catalogo__precioObras__texto' class='catalogo__precioObras__texto ancho__total__textareas'></textarea>
							</div>

							<div class='col col-12' style='font-weight:bold; text-align:center;'>Consultoría</div>


							<div class='col col-4'>Contratación Directa</div>

							<div class='col col-2 text-left'>
								<input type='checkbox' id='catalogo__contratacionDirecta' name='catalogo__contratacionDirecta' class='catalogo__contratacionDirecta checkeds enlazados__checkeds__contratos' value='catalogo__contratacionDirecta' />
							</div>

							<div class='col col-6 text-left'>
								<textarea id='catalogo__contratacionDirecta__texto' name='catalogo__contratacionDirecta__texto' class='ancho__total__textareas catalogo__contratacionDirecta__texto'></textarea>
							</div>



							<div class='col col-4'>Lista Corta</div>

							<div class='col col-2 text-left'>
								<input type='checkbox' id='catalogo__contratacionListaCorta' name='catalogo__contratacionListaCorta' class='catalogo__contratacionListaCorta checkeds enlazados__checkeds__contratos' value='catalogo__contratacionListaCorta' />
							</div>

							<div class='col col-6 text-left'>
								<textarea id='catalogo__contratacionListaCorta__texto' name='catalogo__contratacionListaCorta__texto' class='catalogo__contratacionListaCorta__texto ancho__total__textareas'></textarea>
							</div>


							<div class='col col-4'>Concurso Público</div>

							<div class='col col-2 text-left'>
								<input type='checkbox' id='catalogo__contratacionConcursoPu' name='catalogo__contratacionConcursoPu' class='catalogo__contratacionConcursoPu checkeds enlazados__checkeds__contratos' value='catalogo__contratacionConcursoPu' />
							</div>

							<div class='col col-6 text-left'>
								<textarea id='catalogo__contratacionConcursoPu__texto' name='catalogo__contratacionConcursoPu__texto' class='catalogo__contratacionConcursoPu__texto ancho__total__textareas'></textarea>
							</div>

							<div class='col col-4'>N/A</div>

							<div class='col col-8 text-left'>
								<input type='checkbox' id='noAplica__3' name='noAplica__3' class='catalogo__contratacionConcursoPu checkeds enlazados__checkeds__contratos__3' value='catalogo__contratacionConcursoPu' />
							</div>

							<div class='col col-6 text-left'>

								<button class='text-center btn btn-primary' id='guardarContrataciones__publicas'>Guardar</button>

							</div>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;



		}


		public function get__desvinculaciones__vacacionesNoGozadas($parametro1){


			$modal="

			<div class='modal' id='$parametro1'>

				<div class='modal-dialog' style='min-width:90%!important;'>

					<form class='modal-content'>

						<div class='modal-header row'>

					    <div class='col col-11 text-center'>

					    <h5 class='modal-title'>Compensación por Vacaciones no Gozadas por Cesación de Funciones</h5>

					    </div>

					    <div class='col col-1'>

					    <button type='button' class='btn-close cerrar__modalRegistros closes__modales' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

					    </div>

						</div>

						<div class='modal-body row'>

							<table style='width:100%!important;'>

								<tr>

									<td>
										<center>Enero</center>
									</td>


									<td>
										<center>
											<input type='text' id='eneroVacacionesNoG' name='eneroVacacionesNoG' class='suma__vacaciones__no__gozadas solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>


								<tr>

									<td>
										<center>Febrero</center>
									</td>


									<td>
										<center>
											<input type='text' id='febreroVacacionesNoG' name='febreroVacacionesNoG' class='suma__vacaciones__no__gozadas solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Marzo</center>
									</td>


									<td>
										<center>
											<input type='text' id='marzoVacacionesNoG' name='marzoVacacionesNoG' class='suma__vacaciones__no__gozadas solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Abril</center>
									</td>


									<td>
										<center>
											<input type='text' id='abrilVacacionesNoG' name='abrilVacacionesNoG' class='suma__vacaciones__no__gozadas solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Mayo</center>
									</td>


									<td>
										<center>
											<input type='text' id='mayoVacacionesNoG' name='mayoVacacionesNoG' class='suma__vacaciones__no__gozadas solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Junio</center>
									</td>


									<td>
										<center>
											<input type='text' id='junioVacacionesNoG' name='junioVacacionesNoG' class='suma__vacaciones__no__gozadas solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Julio</center>
									</td>


									<td>
										<center>
											<input type='text' id='julioVacacionesNoG' name='julioVacacionesNoG' class='suma__vacaciones__no__gozadas solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Agosto</center>
									</td>


									<td>
										<center>
											<input type='text' id='agostoVacacionesNoG' name='agostoVacacionesNoG' class='suma__vacaciones__no__gozadas solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Septiembre</center>
									</td>


									<td>
										<center>
											<input type='text' id='septiembreVacacionesNoG' name='septiembreVacacionesNoG' class='suma__vacaciones__no__gozadas solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Octubre</center>
									</td>


									<td>
										<center>
											<input type='text' id='octubreVacacionesNoG' name='octubreVacacionesNoG' class='suma__vacaciones__no__gozadas solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Noviembre</center>
									</td>


									<td>
										<center>
											<input type='text' id='noviembreVacacionesNoG' name='noviembreVacacionesNoG' class='suma__vacaciones__no__gozadas solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Diciembre</center>
									</td>


									<td>
										<center>
											<input type='text' id='diciembreVacacionesNoG' name='diciembreVacacionesNoG' class='suma__vacaciones__no__gozadas solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Total</center>
									</td>


									<td>
										<center>
											<input type='text' id='totalVacacionesNo' name='totalVacacionesNo' class='ancho__total__input' value='0' readonly='' />
										</center>
									</td>

								</tr>

							</table>

						</div>

				</div>

			</div>

			";

			return $modal;


		}


		public function get__desvinculaciones__renuncia__volun($parametro1){


			$modal="

			<div class='modal modal__ItemsGrup fade' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog' style='min-width:90%!important;'>

					<form class='modal-content'>

						<div class='modal-header row'>

					    <div class='col col-11 text-center'>

					    <h5 class='modal-title'>Por Renuncia Voluntaria</h5>

					    </div>

					    <div class='col col-1'>

					    <button type='button' class='btn-close cerrar__modalRegistros closes__modales' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

					    </div>

						</div>

						<div class='modal-body row'>

							<table style='width:100%!important;'>

								<tr>

									<td>
										<center>Enero</center>
									</td>


									<td>
										<center>
											<input type='text' id='eneroRenunciaV' name='eneroRenunciaV' class='suma__enlaces__renunciaV solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>


								<tr>

									<td>
										<center>Febrero</center>
									</td>


									<td>
										<center>
											<input type='text' id='febreroRenunciaV' name='febreroRenunciaV' class='suma__enlaces__renunciaV solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Marzo</center>
									</td>


									<td>
										<center>
											<input type='text' id='marzoRenunciaV' name='marzoRenunciaV' class='suma__enlaces__renunciaV solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Abril</center>
									</td>


									<td>
										<center>
											<input type='text' id='abrilRenunciaV' name='abrilRenunciaV' class='suma__enlaces__renunciaV solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Mayo</center>
									</td>


									<td>
										<center>
											<input type='text' id='mayoRenunciaV' name='mayoRenunciaV' class='suma__enlaces__renunciaV solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Junio</center>
									</td>


									<td>
										<center>
											<input type='text' id='junioRenunciaV' name='junioRenunciaV' class='suma__enlaces__renunciaV solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Julio</center>
									</td>


									<td>
										<center>
											<input type='text' id='julioRenunciaV' name='julioRenunciaV' class='suma__enlaces__renunciaV solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Agosto</center>
									</td>


									<td>
										<center>
											<input type='text' id='agostoRenunciaV' name='agostoRenunciaV' class='suma__enlaces__renunciaV solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Septiembre</center>
									</td>


									<td>
										<center>
											<input type='text' id='septiembreRenunciaV' name='septiembreRenunciaV' class='suma__enlaces__renunciaV solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Octubre</center>
									</td>


									<td>
										<center>
											<input type='text' id='octubreRenunciaV' name='octubreRenunciaV' class='suma__enlaces__renunciaV solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Noviembre</center>
									</td>


									<td>
										<center>
											<input type='text' id='noviembreRenunciaV' name='noviembreRenunciaV' class='suma__enlaces__renunciaV solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Diciembre</center>
									</td>


									<td>
										<center>
											<input type='text' id='diciembreRenunciaV' name='diciembreRenunciaV' class='suma__enlaces__renunciaV solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Total</center>
									</td>


									<td>
										<center>
											<input type='text' id='totalRenunciaVoluntaria' name='totalRenunciaVoluntaria' class='ancho__total__input' value='0' readonly='' />
										</center>
									</td>

								</tr>

							</table>

						</div>

				</div>

			</div>

			";

			return $modal;


		}


		public function get__desvinculaciones__despidoIntes($parametro1){


			$modal="

			<div class='modal modal__ItemsGrup fade' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog' style='min-width:90%!important;'>

					<form class='modal-content'>

						<div class='modal-header row'>

					    <div class='col col-11 text-center'>

					    <h5 class='modal-title'>Despido Intempestivo</h5>

					    </div>

					    <div class='col col-1'>

					    <button type='button' class='btn-close cerrar__modalRegistros closes__modales' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

					    </div>

						</div>

						<div class='modal-body row'>

							<table style='width:100%!important;'>

								<tr>

									<td>
										<center>Enero</center>
									</td>


									<td>
										<center>
											<input type='text' id='eneroDespidoI' name='eneroDespidoI' class='suma__enlaces__despiIn solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>


								<tr>

									<td>
										<center>Febrero</center>
									</td>


									<td>
										<center>
											<input type='text' id='febreroDespidoI' name='febreroDespidoI' class='suma__enlaces__despiIn solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Marzo</center>
									</td>


									<td>
										<center>
											<input type='text' id='marzoDespidoI' name='marzoDespidoI' class='suma__enlaces__despiIn solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Abril</center>
									</td>


									<td>
										<center>
											<input type='text' id='abrilDespidoI' name='abrilDespidoI' class='suma__enlaces__despiIn solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Mayo</center>
									</td>


									<td>
										<center>
											<input type='text' id='mayoDespidoI' name='mayoDespidoI' class='suma__enlaces__despiIn solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Junio</center>
									</td>


									<td>
										<center>
											<input type='text' id='junioDespidoI' name='junioDespidoI' class='suma__enlaces__despiIn solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Julio</center>
									</td>


									<td>
										<center>
											<input type='text' id='julioDespidoI' name='julioDespidoI' class='suma__enlaces__despiIn solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Agosto</center>
									</td>


									<td>
										<center>
											<input type='text' id='agostoDespidoI' name='agostoDespidoI' class='suma__enlaces__despiIn solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Septiembre</center>
									</td>


									<td>
										<center>
											<input type='text' id='septiembreDespidoI' name='septiembreDespidoI' class='suma__enlaces__despiIn solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Octubre</center>
									</td>


									<td>
										<center>
											<input type='text' id='octubreDespidoI' name='octubreDespidoI' class='suma__enlaces__despiIn solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Noviembre</center>
									</td>


									<td>
										<center>
											<input type='text' id='noviembreDespidoI' name='noviembreDespidoI' class='suma__enlaces__despiIn solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Diciembre</center>
									</td>


									<td>
										<center>
											<input type='text' id='diciembreDespidoI' name='diciembreDespidoI' class='suma__enlaces__despiIn solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Total</center>
									</td>


									<td>
										<center>
											<input type='text' id='totalDespidoIntepes' name='totalDespidoIntepes' class='ancho__total__input' value='0' readonly='' />
										</center>
									</td>

								</tr>

							</table>

						</div>

				</div>

			</div>

			";

			return $modal;


		}

		public function get__desvinculaciones__compensacion__editas($parametro1){


			$modal="

			<div class='modal modal__ItemsGrup fade' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog' style='min-width:90%!important;'>

					<form class='modal-content'>

						<div class='modal-header row'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title titulo__descompensacionEditar'></h5>

					        </div>

					        <div class='col col-1'>

					          <button type='button' class='btn-close cerrar__modalRegistros closes__modales' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

					        </div>

						</div>

						<div class='modal-body row'>

							<input type='hidden' id='desvinculacionE' name='desvinculacionE'/>
							<input type='hidden' id='desvinculacionEOrganismo' name='desvinculacionEOrganismo'/>
							<input type='hidden' id='identificadorDE' name='identificadorDE'/>
							<input type='hidden' id='idSueldosDE' name='idSueldosDE'/>

							<table style='width:100%!important;' class='desaucio__tablasEditar'>

								<tr>

									<td>
										<center>Enero</center>
									</td>


									<td>
										<center>
											<input type='text' id='eneroDesaucioEdita' name='eneroDesaucioEdita' class='suma__enlaces__desaucio solo__numero__montos  enlazados__sumas__de ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>


								<tr>

									<td>
										<center>Febrero</center>
									</td>


									<td>
										<center>
											<input type='text' id='febreroDesaucioEdita' name='febreroDesaucioEdita' class='suma__enlaces__desaucio solo__numero__montos  enlazados__sumas__de ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Marzo</center>
									</td>


									<td>
										<center>
											<input type='text' id='marzoDesaucioEdita' name='marzoDesaucioEdita' class='suma__enlaces__desaucio solo__numero__montos  enlazados__sumas__de ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Abril</center>
									</td>


									<td>
										<center>
											<input type='text' id='abrilDesaucioEdita' name='abrilDesaucioEdita' class='suma__enlaces__desaucio solo__numero__montos  enlazados__sumas__de ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Mayo</center>
									</td>


									<td>
										<center>
											<input type='text' id='mayoDesaucioEdita' name='mayoDesaucioEdita' class='suma__enlaces__desaucio solo__numero__montos  enlazados__sumas__de ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Junio</center>
									</td>


									<td>
										<center>
											<input type='text' id='junioDesaucioEdita' name='junioDesaucioEdita' class='suma__enlaces__desaucio solo__numero__montos  enlazados__sumas__de ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Julio</center>
									</td>


									<td>
										<center>
											<input type='text' id='julioDesaucioEdita' name='julioDesaucioEdita' class='suma__enlaces__desaucio solo__numero__montos  enlazados__sumas__de ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Agosto</center>
									</td>


									<td>
										<center>
											<input type='text' id='agostoDesaucioEdita' name='agostoDesaucioEdita' class='suma__enlaces__desaucio solo__numero__montos  enlazados__sumas__de ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Septiembre</center>
									</td>


									<td>
										<center>
											<input type='text' id='septiembreDesaucioEdita' name='septiembreDesaucioEdita' class='suma__enlaces__desaucio solo__numero__montos  enlazados__sumas__de ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Octubre</center>
									</td>


									<td>
										<center>
											<input type='text' id='octubreDesaucioEdita' name='octubreDesaucioEdita' class='suma__enlaces__desaucio solo__numero__montos  enlazados__sumas__de ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Noviembre</center>
									</td>


									<td>
										<center>
											<input type='text' id='noviembreDesaucioEdita' name='noviembreDesaucioEdita' class='suma__enlaces__desaucio solo__numero__montos  enlazados__sumas__de ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Diciembre</center>
									</td>


									<td>
										<center>
											<input type='text' id='diciembreDesaucioEdita' name='diciembreDesaucioEdita' class='suma__enlaces__desaucio solo__numero__montos  enlazados__sumas__de ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Total</center>
									</td>


									<td>
										<center>
											<input type='text' id='totalDesaucioEdita' name='totalDesaucioEdita' class='ancho__total__input' value='0' readonly='' />
										</center>
									</td>

								</tr>


								<tr>

									<td colspan='2'>
										<center>
											<a class='btn btn-primary' id='editarDesaucios'>Editar</a>
										</center>
									</td>

								</tr>

							</table>

							<table style='width:100%!important;' class='despido__tablasEditar'>

								<tr>

									<td>
										<center>Enero</center>
									</td>


									<td>
										<center>
											<input type='text' id='eneroDespidoIEdita' name='eneroDespidoIEdita' class='suma__enlaces__despiIn solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>


								<tr>

									<td>
										<center>Febrero</center>
									</td>


									<td>
										<center>
											<input type='text' id='febreroDespidoIEdita' name='febreroDespidoIEdita' class='suma__enlaces__despiIn solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Marzo</center>
									</td>


									<td>
										<center>
											<input type='text' id='marzoDespidoIEdita' name='marzoDespidoIEdita' class='suma__enlaces__despiIn solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Abril</center>
									</td>


									<td>
										<center>
											<input type='text' id='abrilDespidoIEdita' name='abrilDespidoIEdita' class='suma__enlaces__despiIn solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Mayo</center>
									</td>


									<td>
										<center>
											<input type='text' id='mayoDespidoIEdita' name='mayoDespidoIEdita' class='suma__enlaces__despiIn solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Junio</center>
									</td>


									<td>
										<center>
											<input type='text' id='junioDespidoIEdita' name='junioDespidoIEdita' class='suma__enlaces__despiIn solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Julio</center>
									</td>


									<td>
										<center>
											<input type='text' id='julioDespidoIEdita' name='julioDespidoIEdita' class='suma__enlaces__despiIn solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Agosto</center>
									</td>


									<td>
										<center>
											<input type='text' id='agostoDespidoIEdita' name='agostoDespidoIEdita' class='suma__enlaces__despiIn solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Septiembre</center>
									</td>


									<td>
										<center>
											<input type='text' id='septiembreDespidoIEdita' name='septiembreDespidoIEdita' class='suma__enlaces__despiIn solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Octubre</center>
									</td>


									<td>
										<center>
											<input type='text' id='octubreDespidoIEdita' name='octubreDespidoIEdita' class='suma__enlaces__despiIn solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Noviembre</center>
									</td>


									<td>
										<center>
											<input type='text' id='noviembreDespidoIEdita' name='noviembreDespidoIEdita' class='suma__enlaces__despiIn solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Diciembre</center>
									</td>


									<td>
										<center>
											<input type='text' id='diciembreDespidoIEdita' name='diciembreDespidoIEdita' class='suma__enlaces__despiIn solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Total</center>
									</td>


									<td>
										<center>
											<input type='text' id='totalDespidoIntepesEdita' name='totalDespidoIntepesEdita' class='ancho__total__input' value='0' readonly='' />
										</center>
									</td>

								</tr>


								<tr>

									<td colspan='2'>
										<center>
											<a class='btn btn-primary' id='editarDespidos'>Editar</a>
										</center>
									</td>

								</tr>


							</table>


							<table style='width:100%!important;' class='renuncia__tablasEditar'>

								<tr>

									<td>
										<center>Enero</center>
									</td>


									<td>
										<center>
											<input type='text' id='eneroRenunciaVEdita' name='eneroRenunciaVEdita' class='suma__enlaces__renunciaV solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>


								<tr>

									<td>
										<center>Febrero</center>
									</td>


									<td>
										<center>
											<input type='text' id='febreroRenunciaVEdita' name='febreroRenunciaVEdita' class='suma__enlaces__renunciaV solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Marzo</center>
									</td>


									<td>
										<center>
											<input type='text' id='marzoRenunciaVEdita' name='marzoRenunciaVEdita' class='suma__enlaces__renunciaV solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Abril</center>
									</td>


									<td>
										<center>
											<input type='text' id='abrilRenunciaVEdita' name='abrilRenunciaVEdita' class='suma__enlaces__renunciaV solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Mayo</center>
									</td>


									<td>
										<center>
											<input type='text' id='mayoRenunciaVEdita' name='mayoRenunciaVEdita' class='suma__enlaces__renunciaV solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Junio</center>
									</td>


									<td>
										<center>
											<input type='text' id='junioRenunciaVEdita' name='junioRenunciaVEdita' class='suma__enlaces__renunciaV solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Julio</center>
									</td>


									<td>
										<center>
											<input type='text' id='julioRenunciaVEdita' name='julioRenunciaVEdita' class='suma__enlaces__renunciaV solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Agosto</center>
									</td>


									<td>
										<center>
											<input type='text' id='agostoRenunciaVEdita' name='agostoRenunciaVEdita' class='suma__enlaces__renunciaV solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Septiembre</center>
									</td>


									<td>
										<center>
											<input type='text' id='septiembreRenunciaVEdita' name='septiembreRenunciaVEdita' class='suma__enlaces__renunciaV solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Octubre</center>
									</td>


									<td>
										<center>
											<input type='text' id='octubreRenunciaVEdita' name='octubreRenunciaVEdita' class='suma__enlaces__renunciaV solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Noviembre</center>
									</td>


									<td>
										<center>
											<input type='text' id='noviembreRenunciaVEdita' name='noviembreRenunciaVEdita' class='suma__enlaces__renunciaV solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Diciembre</center>
									</td>


									<td>
										<center>
											<input type='text' id='diciembreRenunciaVEdita' name='diciembreRenunciaVEdita' class='suma__enlaces__renunciaV solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Total</center>
									</td>


									<td>
										<center>
											<input type='text' id='totalRenunciaVoluntariaEdita' name='totalRenunciaVoluntariaEdita' class='ancho__total__input' value='0' readonly='' />
										</center>
									</td>

								</tr>


								<tr>

									<td colspan='2'>
										<center>
											<a class='btn btn-primary' id='editarRenuncia'>Editar</a>
										</center>
									</td>

								</tr>


							</table>

							<table style='width:100%!important;' class='vacacionesNoGo__tablasEditar'>

								<tr>

									<td>
										<center>Enero</center>
									</td>


									<td>
										<center>
											<input type='text' id='eneroVacacionesNoGEdita' name='eneroVacacionesNoGEdita' class='suma__vacaciones__no__gozadas solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>


								<tr>

									<td>
										<center>Febrero</center>
									</td>


									<td>
										<center>
											<input type='text' id='febreroVacacionesNoGEdita' name='febreroVacacionesNoGEdita' class='suma__vacaciones__no__gozadas solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Marzo</center>
									</td>


									<td>
										<center>
											<input type='text' id='marzoVacacionesNoGEdita' name='marzoVacacionesNoGEdita' class='suma__vacaciones__no__gozadas solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Abril</center>
									</td>


									<td>
										<center>
											<input type='text' id='abrilVacacionesNoGEdita' name='abrilVacacionesNoGEdita' class='suma__vacaciones__no__gozadas solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Mayo</center>
									</td>


									<td>
										<center>
											<input type='text' id='mayoVacacionesNoGEdita' name='mayoVacacionesNoGEdita' class='suma__vacaciones__no__gozadas solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Junio</center>
									</td>


									<td>
										<center>
											<input type='text' id='junioVacacionesNoGEdita' name='junioVacacionesNoGEdita' class='suma__vacaciones__no__gozadas solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Julio</center>
									</td>


									<td>
										<center>
											<input type='text' id='julioVacacionesNoGEdita' name='julioVacacionesNoGEdita' class='suma__vacaciones__no__gozadas solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Agosto</center>
									</td>


									<td>
										<center>
											<input type='text' id='agostoVacacionesNoGEdita' name='agostoVacacionesNoGEdita' class='suma__vacaciones__no__gozadas solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Septiembre</center>
									</td>


									<td>
										<center>
											<input type='text' id='septiembreVacacionesNoGEdita' name='septiembreVacacionesNoGEdita' class='suma__vacaciones__no__gozadas solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Octubre</center>
									</td>


									<td>
										<center>
											<input type='text' id='octubreVacacionesNoGEdita' name='octubreVacacionesNoGEdita' class='suma__vacaciones__no__gozadas solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Noviembre</center>
									</td>


									<td>
										<center>
											<input type='text' id='noviembreVacacionesNoGEdita' name='noviembreVacacionesNoGEdita' class='suma__vacaciones__no__gozadas solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Diciembre</center>
									</td>


									<td>
										<center>
											<input type='text' id='diciembreVacacionesNoGEdita' name='diciembreVacacionesNoGEdita' class='suma__vacaciones__no__gozadas solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Total</center>
									</td>


									<td>
										<center>
											<input type='text' id='totalVacacionesNoEdita' name='totalVacacionesNoEdita' class='ancho__total__input' value='0' readonly='' />
										</center>
									</td>

								</tr>


								<tr>

									<td colspan='2'>
										<center>
											<a class='btn btn-primary' id='editarVaciones'>Editar</a>
										</center>
									</td>

								</tr>

							</table>

						</div>

				</div>

			</div>

			";

			return $modal;


		}

		public function get__modal__minimas__modificaciones($parametro1){


			$modal="

			<div class='modal modal__ItemsGrup fade' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog' style='min-width:90%!important;'>

					<form class='modal-content $parametro2'>

						<div class='modal-header row'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title'>MODIFICACIONES MÍNIMAS</h5>

					        </div>

					        <div class='col col-1'>

					          <button type='button' class='btn-close cerrar__modalRegistros modales__reload' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

					        </div>

						</div>

						<div class='modal-body row'>

							


						</div>

					</form>

				</div>

			</div>

			";

			return $modal;


		}

		public function get__desvinculaciones__compensacion($parametro1){


			$modal="

			<div class='modal modal__ItemsGrup fade' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog' style='min-width:90%!important;'>

					<form class='modal-content'>

						<div class='modal-header row'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title titulo__descompensacion'></h5>

					        </div>

					        <div class='col col-1'>

					          <button type='button' class='btn-close cerrar__modalRegistros closes__modales' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

					        </div>

						</div>

						<div class='modal-body row'>

							<table style='width:100%!important;' class='desaucio__tablas'>

								<tr>

									<td>
										<center>Enero</center>
									</td>


									<td>
										<center>
											<input type='text' id='eneroDesaucio' name='eneroDesaucio' class='suma__enlaces__desaucio solo__numero__montos  enlazados__sumas__de ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>


								<tr>

									<td>
										<center>Febrero</center>
									</td>


									<td>
										<center>
											<input type='text' id='febreroDesaucio' name='febreroDesaucio' class='suma__enlaces__desaucio solo__numero__montos  enlazados__sumas__de ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Marzo</center>
									</td>


									<td>
										<center>
											<input type='text' id='marzoDesaucio' name='marzoDesaucio' class='suma__enlaces__desaucio solo__numero__montos  enlazados__sumas__de ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Abril</center>
									</td>


									<td>
										<center>
											<input type='text' id='abrilDesaucio' name='abrilDesaucio' class='suma__enlaces__desaucio solo__numero__montos  enlazados__sumas__de ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Mayo</center>
									</td>


									<td>
										<center>
											<input type='text' id='mayoDesaucio' name='mayoDesaucio' class='suma__enlaces__desaucio solo__numero__montos  enlazados__sumas__de ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Junio</center>
									</td>


									<td>
										<center>
											<input type='text' id='junioDesaucio' name='junioDesaucio' class='suma__enlaces__desaucio solo__numero__montos  enlazados__sumas__de ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Julio</center>
									</td>


									<td>
										<center>
											<input type='text' id='julioDesaucio' name='julioDesaucio' class='suma__enlaces__desaucio solo__numero__montos  enlazados__sumas__de ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Agosto</center>
									</td>


									<td>
										<center>
											<input type='text' id='agostoDesaucio' name='agostoDesaucio' class='suma__enlaces__desaucio solo__numero__montos  enlazados__sumas__de ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Septiembre</center>
									</td>


									<td>
										<center>
											<input type='text' id='septiembreDesaucio' name='septiembreDesaucio' class='suma__enlaces__desaucio solo__numero__montos  enlazados__sumas__de ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Octubre</center>
									</td>


									<td>
										<center>
											<input type='text' id='octubreDesaucio' name='octubreDesaucio' class='suma__enlaces__desaucio solo__numero__montos  enlazados__sumas__de ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Noviembre</center>
									</td>


									<td>
										<center>
											<input type='text' id='noviembreDesaucio' name='noviembreDesaucio' class='suma__enlaces__desaucio solo__numero__montos  enlazados__sumas__de ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Diciembre</center>
									</td>


									<td>
										<center>
											<input type='text' id='diciembreDesaucio' name='diciembreDesaucio' class='suma__enlaces__desaucio solo__numero__montos  enlazados__sumas__de ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Total</center>
									</td>


									<td>
										<center>
											<input type='text' id='totalDesaucio' name='totalDesaucio' class='ancho__total__input' value='0' readonly='' />
										</center>
									</td>

								</tr>

							</table>

							<table style='width:100%!important;' class='despido__tablas'>

								<tr>

									<td>
										<center>Enero</center>
									</td>


									<td>
										<center>
											<input type='text' id='eneroDespidoI' name='eneroDespidoI' class='suma__enlaces__despiIn solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>


								<tr>

									<td>
										<center>Febrero</center>
									</td>


									<td>
										<center>
											<input type='text' id='febreroDespidoI' name='febreroDespidoI' class='suma__enlaces__despiIn solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Marzo</center>
									</td>


									<td>
										<center>
											<input type='text' id='marzoDespidoI' name='marzoDespidoI' class='suma__enlaces__despiIn solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Abril</center>
									</td>


									<td>
										<center>
											<input type='text' id='abrilDespidoI' name='abrilDespidoI' class='suma__enlaces__despiIn solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Mayo</center>
									</td>


									<td>
										<center>
											<input type='text' id='mayoDespidoI' name='mayoDespidoI' class='suma__enlaces__despiIn solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Junio</center>
									</td>


									<td>
										<center>
											<input type='text' id='junioDespidoI' name='junioDespidoI' class='suma__enlaces__despiIn solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Julio</center>
									</td>


									<td>
										<center>
											<input type='text' id='julioDespidoI' name='julioDespidoI' class='suma__enlaces__despiIn solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Agosto</center>
									</td>


									<td>
										<center>
											<input type='text' id='agostoDespidoI' name='agostoDespidoI' class='suma__enlaces__despiIn solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Septiembre</center>
									</td>


									<td>
										<center>
											<input type='text' id='septiembreDespidoI' name='septiembreDespidoI' class='suma__enlaces__despiIn solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Octubre</center>
									</td>


									<td>
										<center>
											<input type='text' id='octubreDespidoI' name='octubreDespidoI' class='suma__enlaces__despiIn solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Noviembre</center>
									</td>


									<td>
										<center>
											<input type='text' id='noviembreDespidoI' name='noviembreDespidoI' class='suma__enlaces__despiIn solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Diciembre</center>
									</td>


									<td>
										<center>
											<input type='text' id='diciembreDespidoI' name='diciembreDespidoI' class='suma__enlaces__despiIn solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Total</center>
									</td>


									<td>
										<center>
											<input type='text' id='totalDespidoIntepes' name='totalDespidoIntepes' class='ancho__total__input' value='0' readonly='' />
										</center>
									</td>

								</tr>

							</table>

							<table style='width:100%!important;' class='renuncia__tablas'>

								<tr>

									<td>
										<center>Enero</center>
									</td>


									<td>
										<center>
											<input type='text' id='eneroRenunciaV' name='eneroRenunciaV' class='suma__enlaces__renunciaV solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>


								<tr>

									<td>
										<center>Febrero</center>
									</td>


									<td>
										<center>
											<input type='text' id='febreroRenunciaV' name='febreroRenunciaV' class='suma__enlaces__renunciaV solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Marzo</center>
									</td>


									<td>
										<center>
											<input type='text' id='marzoRenunciaV' name='marzoRenunciaV' class='suma__enlaces__renunciaV solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Abril</center>
									</td>


									<td>
										<center>
											<input type='text' id='abrilRenunciaV' name='abrilRenunciaV' class='suma__enlaces__renunciaV solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Mayo</center>
									</td>


									<td>
										<center>
											<input type='text' id='mayoRenunciaV' name='mayoRenunciaV' class='suma__enlaces__renunciaV solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Junio</center>
									</td>


									<td>
										<center>
											<input type='text' id='junioRenunciaV' name='junioRenunciaV' class='suma__enlaces__renunciaV solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Julio</center>
									</td>


									<td>
										<center>
											<input type='text' id='julioRenunciaV' name='julioRenunciaV' class='suma__enlaces__renunciaV solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Agosto</center>
									</td>


									<td>
										<center>
											<input type='text' id='agostoRenunciaV' name='agostoRenunciaV' class='suma__enlaces__renunciaV solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Septiembre</center>
									</td>


									<td>
										<center>
											<input type='text' id='septiembreRenunciaV' name='septiembreRenunciaV' class='suma__enlaces__renunciaV solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Octubre</center>
									</td>


									<td>
										<center>
											<input type='text' id='octubreRenunciaV' name='octubreRenunciaV' class='suma__enlaces__renunciaV solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Noviembre</center>
									</td>


									<td>
										<center>
											<input type='text' id='noviembreRenunciaV' name='noviembreRenunciaV' class='suma__enlaces__renunciaV solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Diciembre</center>
									</td>


									<td>
										<center>
											<input type='text' id='diciembreRenunciaV' name='diciembreRenunciaV' class='suma__enlaces__renunciaV solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Total</center>
									</td>


									<td>
										<center>
											<input type='text' id='totalRenunciaVoluntaria' name='totalRenunciaVoluntaria' class='ancho__total__input' value='0' readonly='' />
										</center>
									</td>

								</tr>

							</table>

							<table style='width:100%!important;' class='vacacionesNoGo__tablas'>

								<tr>

									<td>
										<center>Enero</center>
									</td>


									<td>
										<center>
											<input type='text' id='eneroVacacionesNoG' name='eneroVacacionesNoG' class='suma__vacaciones__no__gozadas solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>


								<tr>

									<td>
										<center>Febrero</center>
									</td>


									<td>
										<center>
											<input type='text' id='febreroVacacionesNoG' name='febreroVacacionesNoG' class='suma__vacaciones__no__gozadas solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Marzo</center>
									</td>


									<td>
										<center>
											<input type='text' id='marzoVacacionesNoG' name='marzoVacacionesNoG' class='suma__vacaciones__no__gozadas solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Abril</center>
									</td>


									<td>
										<center>
											<input type='text' id='abrilVacacionesNoG' name='abrilVacacionesNoG' class='suma__vacaciones__no__gozadas solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Mayo</center>
									</td>


									<td>
										<center>
											<input type='text' id='mayoVacacionesNoG' name='mayoVacacionesNoG' class='suma__vacaciones__no__gozadas solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Junio</center>
									</td>


									<td>
										<center>
											<input type='text' id='junioVacacionesNoG' name='junioVacacionesNoG' class='suma__vacaciones__no__gozadas solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Julio</center>
									</td>


									<td>
										<center>
											<input type='text' id='julioVacacionesNoG' name='julioVacacionesNoG' class='suma__vacaciones__no__gozadas solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Agosto</center>
									</td>


									<td>
										<center>
											<input type='text' id='agostoVacacionesNoG' name='agostoVacacionesNoG' class='suma__vacaciones__no__gozadas solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Septiembre</center>
									</td>


									<td>
										<center>
											<input type='text' id='septiembreVacacionesNoG' name='septiembreVacacionesNoG' class='suma__vacaciones__no__gozadas solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Octubre</center>
									</td>


									<td>
										<center>
											<input type='text' id='octubreVacacionesNoG' name='octubreVacacionesNoG' class='suma__vacaciones__no__gozadas solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Noviembre</center>
									</td>


									<td>
										<center>
											<input type='text' id='noviembreVacacionesNoG' name='noviembreVacacionesNoG' class='suma__vacaciones__no__gozadas solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Diciembre</center>
									</td>


									<td>
										<center>
											<input type='text' id='diciembreVacacionesNoG' name='diciembreVacacionesNoG' class='suma__vacaciones__no__gozadas solo__numero__montos ancho__total__input' value='0'/>
										</center>
									</td>

								</tr>

								<tr>

									<td>
										<center>Total</center>
									</td>


									<td>
										<center>
											<input type='text' id='totalVacacionesNo' name='totalVacacionesNo' class='ancho__total__input' value='0' readonly='' />
										</center>
									</td>

								</tr>

							</table>

						</div>

				</div>

			</div>

			";

			return $modal;


		}


		public function modalReenvioPaid__datatablets__inicial($parametro1,$parametro2,$parametro3,$parametro4){

			$modal="

				<div class='modal fade' id='$parametro1'>

					<div class='modal-dialog' style='max-width:100%!important;'>

						<form id='$parametro2' class='modal-content'>

						  <input type='hidden' class='idOrganismoPaid' id='idOrganismoPaid' name='idOrganismoPaid'/>

					      <div class='modal-header row'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title titulo__asignacion__paid'></h5>

					        </div>

					        <div class='col col-1'>

					        <span class='button pointer__botones botones__ideales modal__paid__escondidos' data-bs-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle'></i></span>

					        </div>

					      </div>


					      <div class='modal-body row' style='width:100%;'>

					      	<div style='width:100%; overflow:scroll;'>

								<table class='$parametro3' class='col col-12 cell-border'>

									<thead>

										<tr>";

										foreach ($parametro4 as $value) {
											
											$modal.="<th><center>$value</center></th>";

										}

											

								$modal.="		</tr>

									</thead>

								</table>

							 </div>

						  </div>

						</form>

					</div>

				</div>

			";

			return $modal;

		}

		public function modalReenvioPaid__datatablets__inicial2($parametro1,$parametro2,$parametro3,$parametro4){

			$modal="

				<div class='modal fade' id='$parametro1'>

					<div class='modal-dialog' style='max-width:100%!important;'>

						<form id='$parametro2' class='modal-content'>

						  <input type='hidden' class='idOrganismoPaid' id='idOrganismoPaid' name='idOrganismoPaid'/>

					      <div class='modal-header row'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title titulo__asignacion__paid'></h5>

					        </div>

					        <div class='col col-1'>

					        <span class='button pointer__botones botones__ideales modal__paid__escondidos' data-bs-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle'></i></span>

					        </div>

					      </div>


					      <div class='modal-body row' style='width:100%;'>

					      	<div style='width:100%; overflow:scroll;'>

								<table id='$parametro3' class='col col-12 cell-border'>

									<thead>

										<tr>";

										foreach ($parametro4 as $value) {
											
											$modal.="<th><center>$value</center></th>";

										}

											

								$modal.="		</tr>

									</thead>

								</table>

							 </div>

						  </div>

						</form>

					</div>

				</div>

			";

			return $modal;

		}


		/*=============================================================
		=            Editar información global definitivas            =
		=============================================================*/
		public function getModal__inforDefinitivas($parametro1,$parametro2,$parametro3,$parametro4){


			$modal="

			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog'>

					<form class='modal-content formulario__intervencion__eliminar $parametro4'>

					<div class='modal-header row'>

					    <div class='col col-11 text-center'>

					    	<h5 class='modal-title'>$parametro2</h5>

					    </div>

					    <div class='col col-1'>

					    	<button type='button' class='btn-close cerrar__modalRegistros' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

					    </div>

					</div>

						<div class='modal-body row'>

							<input type='hidden' id='organismoId' name='organismoId'/>

							<label class='col col-12'>Fecha de aprobación de la resolución del POAS (fecha del quipux de la resolución)</label>

							<div class='col col-12'>

								<input type='date' id='fecha__poasE' name='fecha__poasE' style='width:100%;'/>

							</div>


							<label class='col col-12'>Número de resolución</label>

							<div class='col col-12'>

								<input type='text' id='numeroResolucion__ed' name='numeroResolucion__ed' style='width:100%;'/>

							</div>



							<label class='col col-12'>Techo Notificado ( sin descuentos)</label>

							<div class='col col-12'>

								<input type='text' class='solo__numero__montos' id='notificado__sin' name='notificado__sin' style='width:100%;'/>

							</div>


							<label class='col col-8'>¿Desea editar el documento?</label>

							<div class='col col-4'>

								<input type='checkbox' id='aceptarDocumentos__c' name='aceptarDocumentos__c'/>

							</div>

							<label class='col col-4 documento__ocultos'>Seleccionar documento</label>


							<div class='col col-8 documento__ocultos'>

								<input type='file' id='documentos__nue' name='documentos__nue' style='width:100%;'/>

							</div>


							<div class='col col-12 text-center d d-flex justify-content-center'>

								<button class='btn btn-danger' class='btn-close cerrar__modalRegistros' data-bs-dismiss='modal'>CERRAR</button>

								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

								<button class='btn btn-info' id='$parametro3'>ENVIAR</button>

							</div>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;


		}
		
		
		
		/*=====  End of Editar información global definitivas  ======*/
		

		/*====================================================
		=            Funciones principales clases            =
		====================================================*/

		public function getModalConfiguracion__reporteria__organismos($parametro1,$parametro2,$parametro3,$parametro4){


			$modal="

			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog' style='min-width:100%!important;'>

					<form class='modal-content formularioConfiguracion'>

					<div class='modal-header row'>

					    <div class='col col-11 text-center'>

					    	<h5 class='modal-title $parametro2'></h5>

					    </div>

					    <div class='col col-1'>

					    	<button type='button' class='btn-close cerrar__modalRegistros' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

					    </div>

					</div>

					<div class='modal-body row'>

						<div style='width:100%;'>

						<table class='$parametro3'>

							<thead>

								<tr>

						";


				foreach ($parametro4 as $clave => $valor) {

							$modal.="<th><center>$valor</center></th>";
					
				}

				if ($parametro2!="Suministros" && $parametro2!="POA" && $parametro2!="INDICADORES") {
					
				$modal.="
									<th><center>Enero</center></th>
									<th><center>Febrero</center></th>
									<th><center>Marzo</center></th>
									<th><center>Abril</center></th>
									<th><center>Mayo</center></th>
									<th><center>Junio</center></th>
									<th><center>Julio</center></th>
									<th><center>Agosto</center></th>
									<th><center>Septiembre</center></th>
									<th><center>Octubre</center></th>
									<th><center>Noviembre</center></th>
									<th><center>Diciembre</center></th>
									<th><center>Total</center></th>";


				}


					$modal.="

								</tr>

							</thead>

						</table>

						</div>


					</div>

					</form>

				</div>

			</div>

			";

			return $modal;


		}

		public function getModalEliminar__informacion($parametro1,$parametro2){


			$modal="

			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog'>

					<form class='modal-content formulario__intervencion__eliminar'>

					<div class='modal-header row'>

					    <div class='col col-11 text-center'>

					    	<h5 class='modal-title'>$parametro2</h5>

					    </div>

					    <div class='col col-1'>

					    	<button type='button' class='btn-close cerrar__modalRegistros' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

					    </div>

					</div>

						<div class='modal-body row'>

							<input type='hidden' id='organismoId' name='organismoId'/>

							<div class='col col-12 text-center d d-flex justify-content-center'>

								<button class='btn btn-danger' class='btn-close cerrar__modalRegistros' data-bs-dismiss='modal'>No</button>

								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

								<button class='btn btn-info' id='eliminarInfor'>Si</button>

							</div>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;


		}



		public function getModalAgregar__informacion($parametro1,$parametro2){


			$modal="


			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog'>

					<form class='modal-content formulario__intervencion'>

					<div class='modal-header row'>

					    <div class='col col-11 text-center'>

					    	<h5 class='modal-title'>$parametro2</h5>

					    </div>

					    <div class='col col-1'>

					    	<button type='button' class='btn-close cerrar__modalRegistros' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

					    </div>

					</div>

						<div class='modal-body row'>

							<label class='col col-12'>Ingrese ruc del organismo deportivo (dar click en la lupa para busar acción obligatoria)</label>

							<input type='text' class='col col-10 solo__numero campos__obligatorios' placeholder='Ingrese ruc del organismo deportivo' id='rucOrganismo' name='rucOrganismo'/>

							<div class='col col-2'>

								<span class='btn btn-info' id='buscarRuc__i'><i class='fa fa-search' aria-hidden='true'></i></span>

								<div class='reload__rucI'></div>

							</div>

							<input type='hidden' id='idOrganismo_i' name='idOrganismo_i' class='campos__obligatorios'>

							<input type='text' class='col col-12' id='nombreOrganismo__i' name='nombreOrganismo__i' readonly='' class='campos__obligatorios'/>

							<input type='text' class='col col-12' id='provincia__i' name='provincia__i' readonly='' class='campos__obligatorios'/>

							<input type='text' class='col col-12' id='canton__i' name='canton__i' readonly='' class='campos__obligatorios'/>

							<input type='text' class='col col-12' id='parroquia__i' name='parroquia__i' readonly='' class='campos__obligatorios'/>

							<label class='col col-12'>Ingrese cédula Interventor (dar click en la lupa para busar acción obligatoria)</label>

							<input type='text' class='col col-10 solo__numero campos__obligatorios' id='cedulaInterventor' name='cedulaInterventor' placeholder='Ingrese cédula Interventor'/>

							<div class='col col-2'>

								<span class='btn btn-info' id='buscarCedula__i'><i class='fa fa-search' aria-hidden='true'></i></span>

								<div class='buscarCedula__i'></div>

							</div>

							<input type='text' class='col col-12' id='nombreInterventor__i' name='nombreInterventor__i' readonly='' class='campos__obligatorios'/>

							<label class='col col-12'>Ingrese fecha inicial de la intervención</label>

							<input type='date' class='col col-12 campos__obligatorios' id='fechaInicialI' name='fechaInicialI'/>


							<label class='col col-12'>Ingrese fecha final de la intervención</label>

							<input type='date' class='col col-12 campos__obligatorios' id='fechaFinalI' name='fechaFinalI'/>

							<div class='col col-12 text-center'>

								<button class='btn btn-info' id='guardarInfor__i'><i class='fa fa-floppy-o' aria-hidden='true'></i>&nbsp;&nbsp;Guardar</button>

							</div>

						</div>

					</form>

				</div>

			</div>

			";

			return $modal;


		}

		
		public function getModalMeses($parametro1,$parametro2){


			$modal="

			<div class='modal modal__ItemsGrup fade' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog' style='min-width:90%!important;'>

					<form class='modal-content $parametro2'>

						<div class='modal-header row'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title titulos__financierosI'></h5>

					        </div>

					        <div class='col col-1'>

					          <button type='button' class='btn-close cerrar__modalRegistros' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

					        </div>

						</div>

						<div class='modal-body row d d-flex justify-content-center'>

							<div class='overflow_c' style='width:20%!important;'>

							<input type='hidden' class='idFinancierosIP' name='idFinancierosIP'/>

							<table class='col col-12 mt-4 cell-border table table-striped'>

								<tbody>

									<tr>

										<td align='center'>Enero</td>
										<td><input type='text' class='enero__items meses__atadosItems' name='enero__items' style='width:100%!important;'/></td>

									</tr>

									<tr>

										<td align='center'>Febrero</td>
										<td><input type='text' class='febrero__items meses__atadosItems' name='febrero__items' style='width:100%!important;'/></td>

									</tr>


									<tr>

										<td align='center'>Marzo</td>
										<td><input type='text' class='marzo__items meses__atadosItems' name='marzo__items' style='width:100%!important;'/></td>

									</tr>


									<tr>

										<td align='center'>Abril</td>
										<td><input type='text' class='abril__items meses__atadosItems' name='abril__items' style='width:100%!important;'/></td>

									</tr>


									<tr>

										<td align='center'>Mayo</td>
										<td><input type='text' class='mayo__items meses__atadosItems' name='mayo__items' style='width:100%!important;'/></td>

									</tr>


									<tr>

										<td align='center'>Junio</td>
										<td><input type='text' class='junio__items meses__atadosItems' name='junio__items' style='width:100%!important;'/></td>

									</tr>


									<tr>

										<td align='center'>Julio</td>
										<td><input type='text' class='julio__items meses__atadosItems' name='julio__items' style='width:100%!important;'/></td>

									</tr>

									<tr>

										<td align='center'>Agosto</td>
										<td><input type='text' class='agosto__items meses__atadosItems' name='agosto__items' style='width:100%!important;'/></td>

									</tr>

									<tr>

										<td align='center'>Septiembre</td>
										<td><input type='text' class='septiembre__items meses__atadosItems' name='septiembre__items' style='width:100%!important;'/></td>

									</tr>

									<tr>

										<td align='center'>Octubre</td>
										<td><input type='text' class='octubre__items meses__atadosItems' name='octubre__items' style='width:100%!important;'/></td>

									</tr>

									<tr>

										<td align='center'>Noviembre</td>
										<td><input type='text' class='noviembre__items meses__atadosItems' name='noviembre__items' style='width:100%!important;'/></td>

									</tr>

									<tr>

										<td align='center'>Diciembre</td>
										<td><input type='text' class='diciembre__items meses__atadosItems' name='diciembre__items' style='width:100%!important;'/></td>

									</tr>

									<tr>

										<td align='center'>Total</td>
										<td><input type='text' class='total__items' name='total__items' style='width:100%!important;' readonly='readonly'/></td>

									</tr>

								</tbody>

							</table>

							</div>

						</div>

						<div class='modal-footer d d-flex justify-content-center row'>

							<a type='button' class='btn btn-danger  left__margen pointer__botones col-1' data-dismiss='modal' aria-label='Close' aria-label='Close'>CERRAR</a>

							<a type='button' class='btn btn-primary left__margen pointer__botones guardar__itemsItems col-1'>GUARDAR</a>

						</div>						

					</form>

				</div>

			</div>

			";

			return $modal;


		}

		public function get__eventos__ingresados__totales($parametro1){


			$modal="

			<div class='modal modal__ItemsGrup fade' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog' style='min-width:90%!important;'>

					<form class='modal-content'>

						<div class='modal-header row'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title'>Eventos ingresados</h5>

					        </div>

					        <div class='col col-1'>

					          <button type='button' class='btn-close cerrar__modalRegistros' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

					        </div>

						</div>

						<div class='modal-body row d d-flex justify-content-center'>

							<div class='overflow_c' style='width:100%!important;'>

								<table id='tabla__eventos__ingresados' style='width:100%!important;'>

									<thead>

										<tr>

											<th align='center' style='width:50%!important;'>Evento</th>
											<th align='center' style='width:50%!important;'>Información básica</th>
											<th align='center' style='width:50%!important;'>Items relacionados</th>
	
										</tr>

									</thead>

								</table>

							</div>

						</div>
				
					</form>

				</div>

			</div>

			";

			return $modal;


		}


		public function get__eventos__ingresados__totales__modificaciones($parametro1){


			$modal="

			<div class='modal modal__ItemsGrup fade' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog' style='min-width:90%!important;'>

					<form class='modal-content'>

						<div class='modal-header row'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title'>Eventos ingresados</h5>

					        </div>

					        <div class='col col-1'>

					          <button type='button' class='btn-close cerrar__modalRegistros' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

					        </div>

						</div>

						<div class='modal-body row d d-flex justify-content-center'>

							<div class='overflow_c' style='width:100%!important;'>

								<table id='tabla__eventos__ingresados__modificar' style='width:100%!important;'>

									<thead>

										<tr>

											<th align='center' style='width:50%!important;'>Evento</th>
											<th align='center' style='width:50%!important;'>Información básica</th>
											<th align='center' style='width:50%!important;'>Items relacionados</th>
	
										</tr>

									</thead>

								</table>

							</div>

						</div>
				
					</form>

				</div>

			</div>

			";

			return $modal;


		}


		public function get__eventos__ingresados__totales__modificacion($parametro1){


			$modal="

			<div class='modal modal__ItemsGrup fade' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog' style='min-width:90%!important;'>

					<form class='modal-content'>

						<div class='modal-header row'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title'>Eventos ingresados</h5>

					        </div>

					        <div class='col col-1'>

					          <button type='button' class='btn-close cerrar__modalRegistros' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

					        </div>

						</div>

						<div class='modal-body row d d-flex justify-content-center'>

							<div class='overflow_c' style='width:100%!important;'>

								<table id='tabla__eventos__ingresados' style='width:100%!important;'>

									<thead>

										<tr>

											<th align='center' style='width:50%!important;'>Evento</th>
											<th align='center' style='width:50%!important;'>Información básica</th>
											<th align='center' style='width:50%!important;'>Items relacionados</th>
	
										</tr>

									</thead>

								</table>

							</div>

						</div>
				
					</form>

				</div>

			</div>

			";

			return $modal;


		}



		public function get__editar__eventos__modales__totales__montos__items__relacionados($parametro1){


			$modal="

			<div class='modal modal__ItemsGrup fade' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog' style='min-width:90%!important;'>

					<form class='modal-content'>

						<div class='modal-header row'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title'>ÍTEMS</h5>

					        </div>

					        <div class='col col-1'>

					          <button type='button' class='btn-close cerrar__modalRegistros closes__modales__3' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

					        </div>

						</div>

						<div class='modal-body row'>


							<div class='col col-12'>

								<table style='width:100%!important; border:none!important;'><tr><td style='width:20%!important;'>Seleccionar Ítem:</td><td style='width:80%!important;'><select class='ancho__total__input items__escogidos__2' name='items__escogidos__2' id='items__escogidos__2'><option value='0'>--Seleccione una opción--</option></select></td></tr></table>

								<div class='contenedor__tables__r__2 row' style='width:100%!important;'></div>

							</div>		


							<div class='col col-12 row contenedor__realizados__mes'>

								<div class='col col-12 text-center' style='color: rgb(10, 91, 149); font-weight:bold; font-size:12px!important;'>ÍTEMS</div>


							</div>				

						</div>
				
					</form>

				</div>

			</div>

			";

			return $modal;


		}


		public function get__editar__eventos__modales__totales__montos__items__relacionados__modificaciones($parametro1){


			$modal="

			<div class='modal modal__ItemsGrup fade' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog' style='min-width:90%!important;'>

					<form class='modal-content'>

						<div class='modal-header row'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title'>ÍTEMS</h5>

					        </div>

					        <div class='col col-1'>

					          <a type='button' class='left__margen pointer__botones col-1' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='far fa-times-circle'></i></a>

					        </div>

						</div>

						<div class='modal-body row'>


							<div class='col col-12'>

								<table style='width:100%!important; border:none!important;'><tr><td style='width:20%!important;'>Seleccionar Ítem:</td><td style='width:80%!important;'><select class='ancho__total__input items__escogidos__2' name='items__escogidos__2' id='items__escogidos__2'><option value='0'>--Seleccione una opción--</option></select></td></tr></table>

								<div class='contenedor__tables__r__2 row' style='width:100%!important;'></div>

							</div>		


							<div class='col col-12 row contenedor__realizados__mes'>

								<div class='col col-12 text-center' style='color: rgb(10, 91, 149); font-weight:bold; font-size:12px!important;'>ÍTEMS</div>


							</div>				

						</div>
				
					</form>

				</div>

			</div>

			";

			return $modal;


		}

		public function get__editar__eventos__modales__totales__montos($parametro1){


			$modal="

			<div class='modal modal__ItemsGrup fade' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog' style='min-width:90%!important;'>

					<form class='modal-content'>

						<div class='modal-header row'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title'>Montos</h5>

					        </div>

					        <div class='col col-1'>

					          <button type='button' class='btn-close cerrar__modalRegistros closes__modales__2' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

					        </div>

						</div>

						<div class='modal-body row'>

							<form class='formulario__reconsiliados__n' action='post'>

							<table style='width:100%!important;'>

								<tr><td colspan='4' style='color: rgb(10, 91, 149); font-weight:bold; font-size:12px!important;'><center>ASIGNACIÓN PRESUPUESTARIA</center></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A; background:white!important;'>Enero</td><td><input type='text' class='ancho__total__input solo__numero__montos enlazados__sumas__de__dos__dos cambio__de__numero__f enero__2' name='enero__2' id='enero__2' value='0'/></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Febrero</td><td><input type='text' class='ancho__total__input solo__numero__montos enlazados__sumas__de__dos__dos cambio__de__numero__f febrero__2' name='febrero__2' id='febrero__2' value='0'/></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Marzo</td><td><input type='text' class='ancho__total__input solo__numero__montos enlazados__sumas__de__dos__dos cambio__de__numero__f marzo__2' name='marzo__2' id='marzo__2' value='0'/></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Abril</td><td><input type='text' class='ancho__total__input solo__numero__montos enlazados__sumas__de__dos__dos cambio__de__numero__f abril__2' name='abril__2' id='abril__2' value='0'/></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Mayo</td><td><input type='text' class='ancho__total__input solo__numero__montos enlazados__sumas__de__dos__dos cambio__de__numero__f mayo__2' name='mayo__2' id='mayo__2' value='0'/></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Junio</td><td><input type='text' class='ancho__total__input solo__numero__montos enlazados__sumas__de__dos__dos cambio__de__numero__f junio__2' name='junio__2' id='junio__2' value='0'/></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Julio</td><td><input type='text' class='ancho__total__input solo__numero__montos enlazados__sumas__de__dos__dos cambio__de__numero__f julio__2' name='julio__2' id='julio__2' value='0'/></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Agosto</td><td><input type='text' class='ancho__total__input solo__numero__montos enlazados__sumas__de__dos__dos cambio__de__numero__f agosto__2' name='agosto__2' id='agosto__2' value='0'/></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Septiembre</td><td><input type='text' class='ancho__total__input solo__numero__montos enlazados__sumas__de__dos__dos cambio__de__numero__f septiembre__2' name='septiembre__2' id='septiembre__2' value='0'/></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Octubre</td><td><input type='text' class='ancho__total__input solo__numero__montos enlazados__sumas__de__dos__dos cambio__de__numero__f octubre__2' name='octubre__2' id='octubre__2' value='0'/></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Noviembre</td><td><input type='text' class='ancho__total__input solo__numero__montos enlazados__sumas__de__dos__dos cambio__de__numero__f noviembre__2' name='noviembre__2' id='noviembre__2' value='0'/></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Diciembre</td><td><input type='text' class='ancho__total__input solo__numero__montos enlazados__sumas__de__dos__dos cambio__de__numero__f diciembre__2' name='diciembre__2' id='diciembre__2' value='0'/></td></tr><tr><td colspan='2' style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Total</td><td colspan='2'><input type='text' readonly=''  class='ancho__total__input totalSumatoriasMontos__dos' name='totalSumatoriasMontos__dos' id='totalSumatoriasMontos__dos' value='0'/></td></tr>
									<tr>
										<td colspan='4' align='center'><a class='editar__principal__eventos__necesarios__montos__dos no__visualizacion__primaria' id='editar__principal__eventos__necesarios__montos__dos' name='editar__principal__eventos__necesarios__montos__dos' style='background:#0A5B95; color:white; padding-top:.5em; padding-bottom:.5em; padding-left:1.2em;padding-right:1.2em; border-radius:4px; font-size:14px!important;'><i class='fa fa-floppy-o' aria-hidden='true'></i>&nbsp;&nbsp;EDITAR</a></td>
									</tr>
							</table>

						</div>
				
					</form>

				</div>

			</div>

			";

			return $modal;


		}


		public function get__editar__eventos__modales__totales($parametro1){



			$modal="

			<div class='modal modal__ItemsGrup fade' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog' style='min-width:90%!important;'>

					<form class='modal-content'>

						<div class='modal-header row'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title'>INFORMACIÓN GENERAL DEL EVENTO</h5>

					        </div>

					        <div class='col col-1'>

					          <button type='button' class='btn-close cerrar__modalRegistros closes__modales' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

					        </div>

						</div>

						<div class='modal-body row'>

							<form class='formulario__reconsiliados__n' action='post'>

							<table style='width:100%!important;'>

								<tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Evento</td><td><input type='text' class='ancho__total__input obligatorio__evento__escenciales  proyecto' name='proyectoEC' id='proyecto'/><input type='hidden' class='ancho__total__input obligatorio__evento__escenciales  proyectoHidden' name='proyectoHidden' id='proyectoHidden'/></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Tipo de financiamiento</td><td><select class='ancho__total__input obligatorio__evento__escenciales  tipoFinanciamiento' name='tipoFinanciamientoEC' id='tipoFinanciamiento'><option value=''>--Escoger tipo de financiamiento--</option><option value='corriente'>Corriente</option><option value='autogestion'>Autogestión</option></select></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Deporte</td><td><select class='ancho__total__input obligatorio__evento__escenciales  deporte' name='deporteEC' id='deporte'></select></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Provincia</td><td><select  class='ancho__total__input obligatorio__evento__escenciales  provinciaE' name='provinciaEC' id='provincia'></select></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>País</td><td><select class='ancho__total__input obligatorio__evento__escenciales  ciudadPais' name='paisEC' id='pais'></select></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Alcanse</td><td><select class='ancho__total__input obligatorio__evento__escenciales  alcanceE' name='alcanseEC' id='alcanse'></select></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Fecha Inicio</td><td><input type='date' class='ancho__total__input obligatorio__evento__escenciales  fecha__inicio' name='fecha__inicioEC' id='fecha__inicio'/></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Fecha Fin</td><td><input type='date' class='ancho__total__input obligatorio__evento__escenciales  fecha__fin' name='fecha__finEC' id='fecha__fin'/></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Género</td><td><select class='ancho__total__input obligatorio__evento__escenciales  genero' name='generoEC' id='genero'><option value=''>--Escoger gégnero--</option><option value='masculino'>Masculino</option><option value='femenino'>Femenino</option><option value='ambas'>ambas</option></select></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Categoría</td><td><input type='text' class='ancho__total__input obligatorio__evento__escenciales  categoria' name='categoriaEC' id='categoria'/></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Número de entrenadores</td><td><input type='text' class='ancho__total__input obligatorio__evento__escenciales  entre__sumas solo__numeros numero__entrenadores' name='numero__entrenadoresEC' id='numero__entrenadores' value='0'/></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Número de atletas</td><td><input type='text' class='ancho__total__input obligatorio__evento__escenciales  entre__sumas solo__numeros numero__atletas' name='numero__atletasEC' id='numero__atletas' value='0'/></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Total</td><td><input type='text' class='ancho__total__input obligatorio__evento__escenciales  solo__numeros total' name='totalEC' id='total' value='0' disabled=''/></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Mujeres (Beneficiarios)</td><td><input type='text' class='ancho__total__input obligatorio__evento__escenciales  solo__numeros mujeresBeneficiarios' name='mujeresBeneficiariosEC' id='mujeresBeneficiarios' value='0'/></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Hombres (Beneficiarios)</td><td><input type='text' class='ancho__total__input obligatorio__evento__escenciales  solo__numeros hombresBeneficiarios' name='hombresBeneficiariosEC' id='hombresBeneficiarios' value='0'/></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Cantidad del bien o servicio a adquirir</td><td><input type='text' class='ancho__total__input obligatorio__evento__escenciales  solo__numeros cantidadBienAquirir' name='cantidadBienAquirirEC' id='cantidadBienAquirir' value='0'/></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Detalle lo que el organismo va a adquirir</td><td><input type='text'  class='ancho__total__input obligatorio__evento__escenciales  detalleOrganismoAd' name='detalleOrganismoAdEC__dd' id='detalleOrganismoAd'></textarea></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Justificación de la adquisición del bien o servicio</td><td><textarea  class='ancho__total__input obligatorio__evento__escenciales  justificacionAdquisBien' name='justificacionAdquisBienEC' id='justificacionAdquisBien'></textarea></td></tr>
									<tr>
										<td colspan='4' align='center'><a class='editar__principal__eventos__necesarios no__visualizacion__primaria' id='editar__principal__eventos__necesarios' name='editar__principal__eventos__necesarios' style='background:#0A5B95; color:white; padding-top:.5em; padding-bottom:.5em; padding-left:1.2em;padding-right:1.2em; border-radius:4px; font-size:14px!important;'><i class='fa fa-floppy-o' aria-hidden='true'></i>&nbsp;&nbsp;EDITAR</a></td>
									</tr>
							</table>

						</div>
				
					</form>

				</div>

			</div>

			";

			return $modal;


		}

		public function get__editar__eventos__modales__totales__modificaciones__dos($parametro1){


			$modal="

			<div class='modal modal__ItemsGrup fade' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog' style='min-width:90%!important;'>

					<form class='modal-content'>

						<div class='modal-header row'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title'>INFORMACIÓN GENERAL DEL EVENTO</h5>

					        </div>

					        <div class='col col-1'>

					          <a type='button' class='left__margen pointer__botones col-1' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='far fa-times-circle'></i></a>

					        </div>

						</div>

						<div class='modal-body row'>

							<form class='formulario__reconsiliados__n' action='post'>

							<table style='width:100%!important;'>

								<tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Evento</td><td><input type='text' class='ancho__total__input obligatorio__evento__escenciales  proyecto' name='proyectoEC' id='proyecto'/><input type='hidden' class='ancho__total__input obligatorio__evento__escenciales  proyectoHidden' name='proyectoHidden' id='proyectoHidden'/></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Tipo de financiamiento</td><td><select class='ancho__total__input obligatorio__evento__escenciales  tipoFinanciamiento' name='tipoFinanciamientoEC' id='tipoFinanciamiento'><option value=''>--Escoger tipo de financiamiento--</option><option value='corriente'>Corriente</option><option value='autogestion'>Autogestión</option></select></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Deporte</td><td><select class='ancho__total__input obligatorio__evento__escenciales  deporte' name='deporteEC' id='deporte'></select></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Provincia</td><td><select  class='ancho__total__input obligatorio__evento__escenciales  provinciaE' name='provinciaEC' id='provincia'></select></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>País</td><td><select class='ancho__total__input obligatorio__evento__escenciales  ciudadPais' name='paisEC' id='pais'></select></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Alcanse</td><td><select class='ancho__total__input obligatorio__evento__escenciales  alcanceE' name='alcanseEC' id='alcanse'></select></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Fecha Inicio</td><td><input type='date' class='ancho__total__input obligatorio__evento__escenciales  fecha__inicio' name='fecha__inicioEC' id='fecha__inicio'/></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Fecha Fin</td><td><input type='date' class='ancho__total__input obligatorio__evento__escenciales  fecha__fin' name='fecha__finEC' id='fecha__fin'/></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Género</td><td><select class='ancho__total__input obligatorio__evento__escenciales  genero' name='generoEC' id='genero'><option value=''>--Escoger gégnero--</option><option value='masculino'>Masculino</option><option value='femenino'>Femenino</option><option value='ambas'>ambas</option></select></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Categoría</td><td><input type='text' class='ancho__total__input obligatorio__evento__escenciales  categoria' name='categoriaEC' id='categoria'/></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Número de entrenadores</td><td><input type='text' class='ancho__total__input obligatorio__evento__escenciales  entre__sumas solo__numeros numero__entrenadores' name='numero__entrenadoresEC' id='numero__entrenadores' value='0'/></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Número de atletas</td><td><input type='text' class='ancho__total__input obligatorio__evento__escenciales  entre__sumas solo__numeros numero__atletas' name='numero__atletasEC' id='numero__atletas' value='0'/></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Total</td><td><input type='text' class='ancho__total__input obligatorio__evento__escenciales  solo__numeros total' name='totalEC' id='total' value='0' disabled=''/></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Mujeres (Beneficiarios)</td><td><input type='text' class='ancho__total__input obligatorio__evento__escenciales  solo__numeros mujeresBeneficiarios' name='mujeresBeneficiariosEC' id='mujeresBeneficiarios' value='0'/></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Hombres (Beneficiarios)</td><td><input type='text' class='ancho__total__input obligatorio__evento__escenciales  solo__numeros hombresBeneficiarios' name='hombresBeneficiariosEC' id='hombresBeneficiarios' value='0'/></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Cantidad del bien o servicio a adquirir</td><td><input type='text' class='ancho__total__input obligatorio__evento__escenciales  solo__numeros cantidadBienAquirir' name='cantidadBienAquirirEC' id='cantidadBienAquirir' value='0'/></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Detalle lo que el organismo va a adquirir</td><td><input type='text'  class='ancho__total__input obligatorio__evento__escenciales  detalleOrganismoAd' name='detalleOrganismoAdEC__dd' id='detalleOrganismoAd'></textarea></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Justificación de la adquisición del bien o servicio</td><td><textarea  class='ancho__total__input obligatorio__evento__escenciales  justificacionAdquisBien' name='justificacionAdquisBienEC' id='justificacionAdquisBien'></textarea></td></tr>
									<tr>
										<td colspan='4' align='center'><a class='editar__principal__eventos__necesarios__dos__modificaciones no__visualizacion__primaria' id='editar__principal__eventos__necesarios__dos__modificaciones' name='editar__principal__eventos__necesarios__dos__modificaciones' style='background:#0A5B95; color:white; padding-top:.5em; padding-bottom:.5em; padding-left:1.2em;padding-right:1.2em; border-radius:4px; font-size:14px!important;'><i class='fa fa-floppy-o' aria-hidden='true'></i>&nbsp;&nbsp;EDITAR</a></td>
									</tr>
							</table>

						</div>
				
					</form>

				</div>

			</div>

			";

			return $modal;


		}


		public function get__modal__terminaFinanciero($parametro1,$parametro2){


			$modal="

			<div class='modal modal__ItemsGrup fade' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog' style='min-width:50%!important;'>

					<form class='modal-content $parametro2'>

						<div class='modal-header row'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title titulo__mS'></h5>

					        </div>

					        <div class='col col-1'>

					          <button type='button' class='btn-close cerrar__modalRegistros' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

					        </div>

						</div>

						<div class='modal-body row'>

							<div class='row'>

								<input type='hidden' id='idOrganismo' name='idOrganismo' />

								<div class='col col-2'>

									Documento

								</div>

								<div class='col col-4'>

									<a class='documento__total__financiero' target='_blank'>Documento de notificación</a>

								</div>

								<div class='col col-2'>

									Regresar támite

								</div>

								<div class='col col-2'>

									<button class='btn btn-warning' id='regresarTramite'>Regresar</button>

								</div>

							</div>


						</div>


						<div class='modal-footer d d-flex justify-content-center row'>

							<div class='col col-12 d d-flex justify-content-center flex-wrap grupo__especifico_botones'>

								<a type='button' class='btn btn-danger  left__margen modales__reload pointer__botones' data-dismiss='modal' aria-label='Close' aria-label='Close'>CERRAR</a>

								&nbsp;&nbsp;&nbsp;

								<button class='btn btn-info' id='cerrarTramiteTransferencias'><i class='fa fa-floppy-o' aria-hidden='true'></i>&nbsp;&nbsp;Guardar</button>

							</div>


							<div class='col col-12 reolad__mMa text-center'></div>

						</div>	


					</form>

				</div>

			</div>

			";

			return $modal;


		}

		
		public function getModalMatricezObserva__tres__aprobados($parametro1,$parametro2){


			$modal="

			<div class='modal modal__ItemsGrup fade' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog' style='min-width:80%!important;'>

					<form class='modal-content $parametro2'>

						<div class='modal-header row'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title titulo__mS'></h5>

					        </div>

					        <div class='col col-1'>

					          <button type='button' class='btn-close cerrar__modalRegistros' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

					        </div>

						</div>

						<div class='modal-body row contenedor__bodyCMatrizDefi'>

							<input type='hidden' id='idOrganismo' name='idOrganismo' />

							<div class='col col-4'>

								Cargar quipux suscrito

							</div>

							<div class='col col-8'>

								<label for='quipux__Suscritos' class='file-picker clase__quipux__suscrito'>Cargar pdf obligatorio&nbsp;&nbsp; <i class='fas fa-search pointer__botones col col-1 mt-4 posicion__lupas'></i></label>

								<input type='file' id='quipux__Suscritos' name='quipux__Suscritos' class='obligatorios__archivos' accept='application/pdf'/>


							</div>

							<div class='col col-12' id='visualiza__quipux__gestion'></div>


						</div>


						<div class='modal-footer d d-flex justify-content-center row'>

							<div class='col col-12 d d-flex justify-content-center flex-wrap grupo__especifico_botones'>

								<a type='button' class='btn btn-danger  left__margen modales__reload pointer__botones' data-dismiss='modal' aria-label='Close' aria-label='Close'>CERRAR</a>

								<button class='btn btn-info' id='gaurdarTransferencias'><i class='fa fa-floppy-o' aria-hidden='true'></i>&nbsp;&nbsp;Guardar</button>

							</div>


							<div class='col col-12 reolad__mMa text-center'></div>

						</div>	


					</form>

				</div>

			</div>

			";

			return $modal;


		}


		public function getModalMatricezObserva2($parametro1,$parametro2){

			$modal="

			<div class='modal modal__ItemsGrup fade' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog' style='min-width:80%!important;'>

					<form class='modal-content $parametro2'>

						<div class='modal-header row'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title titulo__mS'></h5>

					        </div>

					        <div class='col col-1'>

					          <button type='button' class='btn-close cerrar__modalRegistros' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

					        </div>

						</div>

						<div class='modal-body row contenedor__bodyCMatrizDefi'>

							


						</div>

					</form>

				</div>

			</div>

			";

			return $modal;


		}

		public function getModalMatricezObserva2__indice($parametro1,$parametro2){


			$modal="

			<div class='modal modal__ItemsGrup fade' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog' style='min-width:80%!important;'>

					<form class='modal-content'>

						<div class='modal-header row'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title titulo__mS'>$parametro2</h5>

					        </div>

						</div>

						<div class='modal-body row contenedor__bodyCMatrizDefi'>

							
							<table>

								<thead>

									<tr>

										<th align='center'>N</th>
										<th align='center'>CONDICIÓN</th>
										<th align='center'>CUMPLE</th>
										<th align='center'>OBSERVACIONES PARA LA ORGANIZACIÓN DEPORTIVA</th>

									</tr>

								</thead>

								<tbody class='body__observacionesContenidas'>

								</tbody>

							</table>


						</div>

						<div class='modal-footer d d-flex justify-content-center row'>

							<div class='col col-12 d d-flex justify-content-center flex-wrap grupo__especifico_botones'>

								<a type='button' class='btn btn-danger  left__margen modales__reload pointer__botones' data-dismiss='modal' aria-label='Close' aria-label='Close'>CERRAR</a>


							</div>

							<div class='col col-12 reolad__mMa text-center'></div>

						</div>	

					</form>

				</div>

			</div>

			";

			return $modal;


		}


		public function getModalMatricezObserva__terminar($parametro1,$parametro2){


			$modal="

			<div class='modal modal__ItemsGrup fade' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog' style='min-width:70%!important;'>

					<form class='modal-content $parametro2' id='form-modal'>

						<div class='modal-header row'>

					        <div class='col text-center'>

					          <h5 class='modal-title titulo__mS mb-0'></h5>

					        </div>

					        <div class='col col-1' id='btn-cerrar__icon'>

					          <button type='button' class='btn-close cerrar__modalRegistros modales__reload' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

					        </div>

						</div>

						<div class='modal-body row contenedor__bodyCMatriz'>

							<input type='hidden' id='idOrganismoM' class='idOrganismoM'/>
							<input type='hidden' id='texto__finan' name='texto__finan' />


						</div>

						<div class='modal-footer d d-flex justify-content-center row'>

							<div class='col col-12 d d-flex justify-content-center flex-wrap grupo__especifico_botones'>


								<a type='button' class='btn btn-danger  left__margen modales__reload pointer__botones' data-dismiss='modal' aria-label='Close' aria-label='Close' id='btn-cerrar'>CERRAR</a>


							</div>

							<div class='col col-12 reolad__mMa text-center'></div>

						</div>						

					</form>

				</div>

			</div>

			";

			return $modal;


		}


		public function getModalMatricezObserva($parametro1,$parametro2,$parametro3,$parametro4){


			$modal="

			<div class='modal modal__ItemsGrup fade' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog' style='min-width:70%!important;'>

					<form class='modal-content $parametro2' id='form-modal'>

						<div class='modal-header row'>

					        <div class='col text-center'>

					          <h5 class='modal-title titulo__mS mb-0'></h5>

					        </div>

					        <div class='col col-1' id='btn-cerrar__icon'>

					          <button type='button' class='btn-close cerrar__modalRegistros modales__reload' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

					        </div>

						</div>

						<div class='modal-body row contenedor__bodyCMatriz'>

							<input type='hidden' id='idOrganismoM' class='idOrganismoM'/>
							<input type='hidden' id='texto__finan' name='texto__finan' />


						</div>

						<div class='modal-footer d d-flex justify-content-center row'>

							<div class='col col-12 d d-flex justify-content-center flex-wrap grupo__especifico_botones'>

								<button type='submit' class='btn__enviar btn left__margen boton__enlacesOcultos' id='$parametro3' name='$parametro3'>$parametro4</button>

								&nbsp;&nbsp;&nbsp;&nbsp;

								<a type='button' class='btn btn-danger  left__margen modales__reload pointer__botones' data-dismiss='modal' aria-label='Close' aria-label='Close' id='btn-cerrar'>CERRAR</a>


							</div>

							<div class='col col-12 reolad__mMa text-center'></div>

						</div>						

					</form>

				</div>

			</div>

			";

			return $modal;


		}


		public function getModalMatricez($parametro1,$parametro2,$parametro3,$parametro4,$parametro5){


			$modal="

			<div class='modal modal__ItemsGrup fade' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog' style='min-width:90%!important;'>

					<form class='modal-content $parametro2'>

						<div class='modal-header row'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title'>$parametro3</h5>

					        </div>

					        <div class='col col-1'>

					          <button type='button' class='btn-close cerrar__modalRegistros modales__reload' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

					        </div>

						</div>

						<div class='modal-body row'>

							<div class='overflow__c__2 row'></div>

							<div class='overflow_c eliminar__en__etapas__b'>

								<table class='col col-12 mt-4 cell-border table table-striped tabla__matricesJ'>

									<thead class='$parametro4'>

										<tr></tr>

									</thead>

									<tbody class='$parametro5'></tbody>

									<tbody class='sueldos__salarios__editados'></tbody>

									<tbody class='mantenimientos__necesarios__1'></tbody>

									<tbody class='mantenimientos__necesarios'></tbody>

									<tbody class='mantenimientos__necesarios__2'></tbody>

								</table>

								<div class='encontrar__tablas'></div>

							</div>


						</div>

						<div class='modal-footer d d-flex justify-content-center row' style='display:flex;'>

							<form class='actividades__administrativas__contenedor' id='formulario__eventos__informacion'  method='post'>

								<table class='unico__tablas_r no__visualizacion__primaria' style='border:none!important;'>
									<tr><td align='center'><center><a style='background:#0A5B95; color:white; padding-top:.5em; padding-bottom:.5em; padding-left:1em;padding-right:1em; border-radius:4px; font-size:12px!important;' data-bs-toggle='modal' data-bs-target='#modal__editarEventos'><i class='fa fa-eye' aria-hidden='true'></i>&nbsp;&nbsp;EVENTOS INGRESADOS</a></center></td></tr>
								</table>
 
								<table class='unico__tablas_r no__visualizacion__primaria'><tr><td colspan='4' style='color: rgb(10, 91, 149); font-weight:bold; font-size:12px!important;'><center>INFORMACIÓN GENERAL DEL EVENTO</center></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Evento</td><td><input type='text' class='ancho__total__input obligatorio__evento__escenciales  proyecto' name='proyecto' id='proyecto'/></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Tipo de financiamiento</td><td><select class='ancho__total__input obligatorio__evento__escenciales  tipoFinanciamiento' name='tipoFinanciamiento' id='tipoFinanciamiento'><option value=''>--Escoger tipo de financiamiento--</option><option value='corriente'>Corriente</option><option value='autogestion'>Autogestión</option></select></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Deporte</td><td><select class='ancho__total__input obligatorio__evento__escenciales  deporte' name='deporte' id='deporte'></select></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Provincia</td><td><select  class='ancho__total__input obligatorio__evento__escenciales  provinciaE' name='provincia' id='provincia'></select></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>País</td><td><select class='ancho__total__input obligatorio__evento__escenciales  ciudadPais' name='pais' id='pais'></select></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Alcance</td><td><select class='ancho__total__input obligatorio__evento__escenciales  alcanceE' name='alcanse' id='alcanse'></select></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Fecha Inicio</td><td><input type='date' class='ancho__total__input obligatorio__evento__escenciales  fecha__inicio' name='fecha__inicio' id='fecha__inicio'/></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Fecha Fin</td><td><input type='date' class='ancho__total__input obligatorio__evento__escenciales  fecha__fin' name='fecha__fin' id='fecha__fin'/></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Género</td><td><select class='ancho__total__input obligatorio__evento__escenciales  genero' name='genero' id='genero'><option value=''>--Escoger gégnero--</option><option value='masculino'>Masculino</option><option value='femenino'>Femenino</option><option value='ambas'>ambas</option></select></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Categoría</td><td><input type='text' class='ancho__total__input obligatorio__evento__escenciales  categoria' name='categoria' id='categoria'/></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Número de entrenadores</td><td><input type='text' class='ancho__total__input obligatorio__evento__escenciales  entre__sumas solo__numeros numero__entrenadores' name='numero__entrenadores' id='numero__entrenadores' value='0'/></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Número de atletas</td><td><input type='text' class='ancho__total__input obligatorio__evento__escenciales  entre__sumas solo__numeros numero__atletas' name='numero__atletas' id='numero__atletas' value='0'/></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Total</td><td><input type='text' class='ancho__total__input obligatorio__evento__escenciales  solo__numeros total' name='total' id='total' value='0' disabled=''/></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Mujeres (Beneficiarios)</td><td><input type='text' class='ancho__total__input obligatorio__evento__escenciales  solo__numeros mujeresBeneficiarios' name='mujeresBeneficiarios' id='mujeresBeneficiarios' value='0'/></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Hombres (Beneficiarios)</td><td><input type='text' class='ancho__total__input obligatorio__evento__escenciales  solo__numeros hombresBeneficiarios' name='hombresBeneficiarios' id='hombresBeneficiarios' value='0'/></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Cantidad del bien o servicio a adquirir</td><td><input type='text' class='ancho__total__input obligatorio__evento__escenciales  solo__numeros cantidadBienAquirir' name='cantidadBienAquirir' id='cantidadBienAquirir' value='0'/></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Detalle lo que el organismo va a adquirir</td><td><textarea  class='ancho__total__input obligatorio__evento__escenciales  detalleOrganismoAd' name='detalleOrganismoAd' id='detalleOrganismoAd'></textarea></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Justificación de la adquisición del bien o servicio</td><td><textarea  class='ancho__total__input obligatorio__evento__escenciales  justificacionAdquisBien' name='justificacionAdquisBien' id='justificacionAdquisBien'></textarea></td></tr></table>

								<div class='row unico__tablas_r__2 no__visualizacion__primaria'>

									<div class='nombre__evento__definidos col col-12 text-center' style='color: rgb(10, 91, 149); font-weight:bold; font-size:15px!important; text-transform:uppercase;'></div>

									<div class='unico__tablas_r__2 col col-12'>

										<table class='unico__tablas_r__2' style='width:100%!important; border:none!important;'><tr><td colspan='2'><a class='regresar__escoger__eventos' id='regresar__escoger__eventos' name='regresar__escoger__eventos' style='background:#0A5B95; color:white; padding-top:1em; padding-bottom:1em; padding-left:2em;padding-right:2em; border-radius:4px; font-size:12px;'><i class='fa fa-arrow-left' aria-hidden='true' style='color:white!important;'></i>&nbsp;&nbsp;&nbsp;&nbsp;REGRESAR</a></td></tr></table>

										<table class='unico__tablas_r__2' style='width:100%!important; border:none!important;'><tr><td style='width:20%!important;'>Seleccionar Ítem:</td><td style='width:80%!important;'><select class='ancho__total__input items__escogidos' name='items__escogidos' id='items__escogidos'><option value='0'>--Seleccione una opción--</option></select></td><td><center><a class='btn btn-primary finalizar__global__act' id='finalizar__global__act'>Finalizar</a></center></td></tr></table>


											<div class='unico__tablas_r__2 contenedor__tables__r__2'></div>

									</div>

								</div>

							</form>


							<div class='col col-6 d d-flex justify-content-center flex-wrap botno__necesario__regresos'>

								<a class='guardar__principal__eventos unico__tablas_r no__visualizacion__primaria' id='guardar__principal__eventos' name='guardar__principal__eventos' style='background:#0A5B95; color:white; padding-top:.3em; padding-bottom:.3em; padding-left:1em;padding-right:1em; border-radius:4px;'><i class='fa fa-floppy-o' aria-hidden='true'></i>&nbsp;&nbsp;GUARDAR</a>

								<a class='editar__principal__eventos no__visualizacion__primaria' id='editar__principal__eventos' name='editar__principal__eventos' style='background:#0A5B95; color:white; padding-top:.3em; padding-bottom:.3em; padding-left:1em;padding-right:1em; border-radius:4px;'><i class='fa fa-floppy-o' aria-hidden='true'></i>&nbsp;&nbsp;EDITAR</a>

							</div>

						</div>						

					</form>

				</div>

			</div>

			";

			return $modal;


		}


		public function getModalMatricez__editar__modificaciones($parametro1,$parametro2,$parametro3,$parametro4,$parametro5){


			$modal="

			<div class='modal modal__ItemsGrup fade' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog' style='min-width:90%!important;'>

					<form class='modal-content $parametro2'>

						<div class='modal-header row'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title'>$parametro3</h5>

					        </div>

					        <div class='col col-1'>

					          <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

					        </div>

						</div>

						<div class='modal-body row'>

							<div class='overflow__c__2 row'></div>

							<div class='overflow_c eliminar__en__etapas__b'>

								<table class='col col-12 mt-4 cell-border table table-striped tabla__matricesJ'>

									<thead class='$parametro4'>

										<tr></tr>

									</thead>

									<tbody class='$parametro5'></tbody>

									<tbody class='sueldos__salarios__editados'></tbody>

									<tbody class='mantenimientos__necesarios__1'></tbody>

									<tbody class='mantenimientos__necesarios'></tbody>

									<tbody class='mantenimientos__necesarios__2'></tbody>

								</table>

								<div class='encontrar__tablas'></div>

							</div>


						</div>

						<div class='modal-footer d d-flex justify-content-center row' style='display:flex;'>

							<form class='actividades__administrativas__contenedor' id='formulario__eventos__informacion'  method='post'>
 
								<table class='unico__tablas_r no__visualizacion__primaria'><tr><td colspan='4' style='color: rgb(10, 91, 149); font-weight:bold; font-size:12px!important;'><center>INFORMACIÓN GENERAL DEL EVENTO</center></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Evento</td><td><input type='text' class='ancho__total__input obligatorio__evento__escenciales  proyecto' name='proyecto' id='proyecto'/></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Tipo de financiamiento</td><td><select class='ancho__total__input obligatorio__evento__escenciales  tipoFinanciamiento' name='tipoFinanciamiento' id='tipoFinanciamiento'><option value=''>--Escoger tipo de financiamiento--</option><option value='corriente'>Corriente</option><option value='autogestion'>Autogestión</option></select></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Deporte</td><td><select class='ancho__total__input obligatorio__evento__escenciales  deporte' name='deporte' id='deporte'></select></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Provincia</td><td><select  class='ancho__total__input obligatorio__evento__escenciales  provinciaE' name='provincia' id='provincia'></select></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>País</td><td><select class='ancho__total__input obligatorio__evento__escenciales  ciudadPais' name='pais' id='pais'></select></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Alcance</td><td><select class='ancho__total__input obligatorio__evento__escenciales  alcanceE' name='alcanse' id='alcanse'></select></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Fecha Inicio</td><td><input type='date' class='ancho__total__input obligatorio__evento__escenciales  fecha__inicio' name='fecha__inicio' id='fecha__inicio'/></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Fecha Fin</td><td><input type='date' class='ancho__total__input obligatorio__evento__escenciales  fecha__fin' name='fecha__fin' id='fecha__fin'/></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Género</td><td><select class='ancho__total__input obligatorio__evento__escenciales  genero' name='genero' id='genero'><option value=''>--Escoger gégnero--</option><option value='masculino'>Masculino</option><option value='femenino'>Femenino</option><option value='ambas'>ambas</option></select></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Categoría</td><td><input type='text' class='ancho__total__input obligatorio__evento__escenciales  categoria' name='categoria' id='categoria'/></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Número de entrenadores</td><td><input type='text' class='ancho__total__input obligatorio__evento__escenciales  entre__sumas solo__numeros numero__entrenadores' name='numero__entrenadores' id='numero__entrenadores' value='0'/></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Número de atletas</td><td><input type='text' class='ancho__total__input obligatorio__evento__escenciales  entre__sumas solo__numeros numero__atletas' name='numero__atletas' id='numero__atletas' value='0'/></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Total</td><td><input type='text' class='ancho__total__input obligatorio__evento__escenciales  solo__numeros total' name='total' id='total' value='0' disabled=''/></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Mujeres (Beneficiarios)</td><td><input type='text' class='ancho__total__input obligatorio__evento__escenciales  solo__numeros mujeresBeneficiarios' name='mujeresBeneficiarios' id='mujeresBeneficiarios' value='0'/></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Hombres (Beneficiarios)</td><td><input type='text' class='ancho__total__input obligatorio__evento__escenciales  solo__numeros hombresBeneficiarios' name='hombresBeneficiarios' id='hombresBeneficiarios' value='0'/></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Cantidad del bien o servicio a adquirir</td><td><input type='text' class='ancho__total__input obligatorio__evento__escenciales  solo__numeros cantidadBienAquirir' name='cantidadBienAquirir' id='cantidadBienAquirir' value='0'/></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Detalle lo que el organismo va a adquirir</td><td><textarea  class='ancho__total__input obligatorio__evento__escenciales  detalleOrganismoAd' name='detalleOrganismoAd' id='detalleOrganismoAd'></textarea></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Justificación de la adquisición del bien o servicio</td><td><textarea  class='ancho__total__input obligatorio__evento__escenciales  justificacionAdquisBien' name='justificacionAdquisBien' id='justificacionAdquisBien'></textarea></td></tr></table>

								<div class='row unico__tablas_r__2 no__visualizacion__primaria'>

									<div class='nombre__evento__definidos col col-12 text-center' style='color: rgb(10, 91, 149); font-weight:bold; font-size:15px!important; text-transform:uppercase;'></div>

									<div class='unico__tablas_r__2 col col-12'>

										<table class='unico__tablas_r__2' style='width:100%!important; border:none!important;'><tr><td colspan='2'><a class='regresar__escoger__eventos' id='regresar__escoger__eventos' name='regresar__escoger__eventos' style='background:#0A5B95; color:white; padding-top:1em; padding-bottom:1em; padding-left:2em;padding-right:2em; border-radius:4px; font-size:12px;'><i class='fa fa-arrow-left' aria-hidden='true' style='color:white!important;'></i>&nbsp;&nbsp;&nbsp;&nbsp;REGRESAR</a></td></tr></table>

										<table class='unico__tablas_r__2' style='width:100%!important; border:none!important;'><tr><td style='width:20%!important;'>Seleccionar Ítem:</td><td style='width:80%!important;'><select class='ancho__total__input items__escogidos' name='items__escogidos' id='items__escogidos'><option value='0'>--Seleccione una opción--</option></select></td><td><center><a class='btn btn-primary finalizar__global__act' id='finalizar__global__act'>Finalizar</a></center></td></tr></table>


											<div class='unico__tablas_r__2 contenedor__tables__r__2'></div>

									</div>

								</div>

							</form>


							<div class='col col-6 d d-flex justify-content-center flex-wrap botno__necesario__regresos'>

								<a class='guardar__principal__eventos unico__tablas_r no__visualizacion__primaria' id='guardar__principal__eventos' name='guardar__principal__eventos' style='background:#0A5B95; color:white; padding-top:.3em; padding-bottom:.3em; padding-left:1em;padding-right:1em; border-radius:4px;'><i class='fa fa-floppy-o' aria-hidden='true'></i>&nbsp;&nbsp;GUARDAR</a>

								<a class='editar__principal__eventos no__visualizacion__primaria' id='editar__principal__eventos' name='editar__principal__eventos' style='background:#0A5B95; color:white; padding-top:.3em; padding-bottom:.3em; padding-left:1em;padding-right:1em; border-radius:4px;'><i class='fa fa-floppy-o' aria-hidden='true'></i>&nbsp;&nbsp;EDITAR</a>

							</div>

						</div>						

					</form>

				</div>

			</div>

			";

			return $modal;


		}

		public function getModalMatricez__modificacion($parametro1,$parametro2,$parametro3,$parametro4,$parametro5){


			$modal="

			<div class='modal modal__ItemsGrup fade' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog' style='min-width:90%!important;'>

					<form class='modal-content $parametro2'>

						<div class='modal-header row'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title'>$parametro3</h5>

					        </div>

					        <div class='col col-1'>

					          <button type='button' class='btn-close cerrar__modalRegistros modales__reload' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

					        </div>

						</div>

						<div class='modal-body row'>

							<div class='overflow__c__2 row'></div>

							<div class='overflow_c eliminar__en__etapas__b'>

								<table class='col col-12 mt-4 cell-border table table-striped tabla__matricesJ'>

									<thead class='$parametro4'>

										<tr></tr>

									</thead>

									<tbody class='$parametro5'></tbody>

									<tbody class='sueldos__salarios__editados'></tbody>

									<tbody class='mantenimientos__necesarios__1'></tbody>

									<tbody class='mantenimientos__necesarios'></tbody>

									<tbody class='mantenimientos__necesarios__2'></tbody>

								</table>

								<div class='encontrar__tablas'></div>

							</div>


						</div>

						<div class='modal-footer d d-flex justify-content-center row' style='display:flex;'>

							<form class='actividades__administrativas__contenedor' id='formulario__eventos__informacion'  method='post'>

								<table class='unico__tablas_r no__visualizacion__primaria' style='border:none!important;'>
									<tr><td align='center'><center><a style='background:#0A5B95; color:white; padding-top:.5em; padding-bottom:.5em; padding-left:1em;padding-right:1em; border-radius:4px; font-size:12px!important;' data-bs-toggle='modal' data-bs-target='#modal__editarEventos'><i class='fa fa-eye' aria-hidden='true'></i>&nbsp;&nbsp;EVENTOS INGRESADOS</a></center></td></tr>
								</table>

							</form>

						</div>						

					</form>

				</div>

			</div>

			";

			return $modal;


		}

		public function getContenidoActividadesPoa($parametro1,$parametro2,$parametro3){
			
			return "
				<table id='$parametro1' class='col col-12 mt-4 cell-border table table-dark table-striped'>

					<thead>

						$parametro2

					</thead>

					<tbody class='$parametro3'></tbody>
					

				</table>
			";


		}


		public function getContenidoActividadesPoa__modificaciones($parametro1,$parametro2,$parametro3){
			
			return "
				<table style='width:100%!important;' id='$parametro1' class='col col-12 mt-4 cell-border table table-dark table-striped'>

					<thead>

						$parametro2

					</thead>

					<tbody class='$parametro3'></tbody>
					

				</table>
			";


		}

		public function getContenidoActividadesPAID($parametro1,$parametro2,$parametro3){
			
			return "
				<table id='$parametro1' class='col col-12 mt-4 cell-border table table-dark table-striped'>

					<thead>

					$parametro2

					</thead>


					<tbody class='body__paid'>

					
					$parametro3

					</tbody>
					

				</table>
			";


		}


		

		public function getComponentes($parametro1,$parametro2){

			switch ($parametro1) {

				case 1:
					
					return "<div clas='row text-center d d-flex justify-content-center'>

						<div class='col col-12 text-center mt-2 titulo__enfasis'>

							$parametro2

						</div>

					</div>";

				break;

			}

		}

		public function getLinksConfiguracion($parametro1,$parametro2){


			$flujoLinks;

			for ($i=0; $i < count($parametro1); $i++) { 

				$flujoLinks.="<div class='row d d-flex flex-column justify-content-center card mt-4'>

					<div class='card-body row'>

							<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#$parametro1[$i]'>$parametro2[$i]</a>

					</div>

				</div>";

			}

					
			return $flujoLinks;

		}


		public function getLinksConfiguracion__parametros($parametro1,$parametro2,$parametro3){


			$flujoLinks;

			for ($i=0; $i < count($parametro1); $i++) { 

				$flujoLinks.="<div class='row d d-flex flex-column justify-content-center card mt-4'>

					<div class='card-body row'>

							<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#$parametro1[$i]' id='$parametro3'>$parametro2[$i]</a>

					</div>

				</div>";

			}

					
			return $flujoLinks;

		}		

		public function getLinksConfiguracion__parametros__ver($parametro1,$parametro2,$parametro3,$parametro4,$parametro5){


			$flujoLinks;

			for ($i=0; $i < count($parametro1); $i++) { 

				$flujoLinks.="<div class='row d d-flex flex-column justify-content-center card mt-4' style='padding-right:1em;'>

					<div class='card-body row'>

							<a class='card-title text-center titulo__enfasis pointer__botones col-11' data-bs-toggle='modal' data-bs-target='#$parametro1[$i]' id='$parametro3'>$parametro2[$i]</a><div class='col col-1'><a class='btn btn-info' data-bs-toggle='modal' data-bs-target='#$parametro4[$i]' id='$parametro5'><i class='fa fa-eye' aria-hidden='true'></i></a></div>

					</div>

				</div>";

			}

					
			return $flujoLinks;

		}		

		public function getLinksConfiguracion__activado($parametro1,$parametro2,$parametro3){


			$flujoLinks;

			for ($i=0; $i < count($parametro1); $i++) { 

				$flujoLinks.="<div class='row d d-flex flex-column justify-content-center card mt-4'>

					<div class='card-body row'>

							<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#$parametro1[$i]' id='$parametro3[$i]'>$parametro2[$i]</a>

					</div>

				</div>";

			}

					
			return $flujoLinks;

		}



		public function getModalEstados($parametro1,$parametro2,$parametro3){


			$modal="

			<div class='modal fade' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog'>

					<form class='modal-content $parametro2'>

						<div class='modal-header row'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title' id='exampleModalLabel'>FORMULARIO DE CONTACTO</h5>

					        </div>

					        <div class='col col-1'>

					          <button type='button' class='btn-close cerrar__modalRegistros' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

					        </div>

						</div>

						<div class='modal-body row'>

							$parametro3

						</div>

					</form>

				</div>

			</div>

			";

			return $modal;


		}

		public function getModalAtributosDos($parametro1,$parametro2,$parametro3,$parametro4,$parametro5,$parametro6,$parametro7,$parametro8,$parametro9){

			$modal="
			<div class='modal fade' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog modal-xl'>

					<form class='modal-content $parametro2'>

						<div class='modal-header row'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title' id='modalTitulo'>$parametro3<br><span class='asignado__titulos'></span></h5>

					        </div>

						</div>

						<div class='modal-body row'>

							<input type='hidden' class='idOrganismo' name='idOrganismo'/>

							<input type='hidden' class='idAtributoEscondido' name='idAtributoEscondido'/>

						";


			foreach ($parametro5 as $clave => $valor) {

				if ($parametro7[$clave]=="input") {

					if ($parametro8[$clave]=="numero") {

						$modal.="

						<div class='col col-12 titulo__enfasis mt-2'>
							$parametro5[$clave]
						</div>


						<div class='col col-12 mt-2'>
							<input type='text' class='$parametro6[$clave] ancho__total__input solo__numero campos__obligatorios' name='$parametro6[$clave]'/>
						</div>

						";

					}else if($parametro8[$clave]=="monto"){


						$modal.="

						<div class='col col-12 titulo__enfasis mt-2'>
							$parametro5[$clave]
						</div>


						<div class='col col-12 mt-2'>
							<input type='text' class='$parametro6[$clave] ancho__total__input solo__numero__montos campos__obligatorios' name='$parametro6[$clave]'/>
						</div>

						";						
						
					}else{

						$modal.="

						<div class='col col-12 titulo__enfasis mt-2'>
							$parametro5[$clave]
						</div>


						<div class='col col-12 mt-2'>
							<input type='text' class='$parametro6[$clave] ancho__total__input campos__obligatorios' name='$parametro6[$clave]'/>
						</div>

						";

					}
		

				}else if($parametro7[$clave]=="boton"){

					$modal.="

						<div class='col col-10 titulo__enfasis mt-2'>
							$parametro5[$clave]
						</div>

						<div class='col col-2 mt-2 text-center'>
							<button class='btn btn-warning $parametro6[$clave]' id='botonAc$parametro6[$clave]'>Agregar</button>'
						</div>

						";						

				}else if($parametro7[$clave]=="select"){

					$modal.="

					<div class='col col-12 titulo__enfasis mt-2'>
						$parametro5[$clave]
					</div>

					<div class='col col-12 mt-2'>
						<select class='$parametro6[$clave] ancho__total__input campos__obligatorios' name='$parametro6[$clave]'></select>
					</div>

					";				

				}else if($parametro7[$clave]=="file"){



					$modal.="

					<div class='col col-12 titulo__enfasis mt-2'>
						$parametro5[$clave]
					</div>

					<div class='col col-12 mt-2'>
						<input type='file' class='$parametro6[$clave] ancho__total__input campos__obligatorios' name='$parametro6[$clave]'/>
					</div>

					";				

				}


			}


			$modal.="
					</div>

						<div class='modal-footer d d-flex justify-content-center row $parametro9'>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		} 

		public function getModalAtributosPdfs($parametro1,$parametro2,$parametro3,$parametro4,$parametro5,$parametro6,$parametro7,$parametro8,$parametro9,$parametro10){

			$modal="
			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog modal-lg'>

					<form class='modal-content $parametro2' action='modelosBd/pdf/pdf.modelo.php' method='post'>

						<div class='modal-header row'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title' id='modalTitulo'>$parametro3<br><span class='asignado__titulos'></span></h5>

					        </div>

					        <div class='col col-1'>

					          <span class='button pointer__botones modales__reload' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle'></i></span>

					        </div>

						</div>

						<div class='modal-body row'>

							<input type='hidden' class='idOrganismo' name='idOrganismo'/>

							<input type='hidden' class='idAtributoEscondido' name='idAtributoEscondido'/>

							<input type='hidden' class='idUsuarioPrincipalDos' name='idUsuarioPrincipalDos'/>

						";


			foreach ($parametro5 as $clave => $valor) {

				if ($parametro7[$clave]=="input") {

					if ($parametro8[$clave]=="disabled") {

						$modal.="

						<div class='col col-4 titulo__enfasis mt-2'>
							$parametro5[$clave]
						</div>


						<div class='col col-8 mt-2'>
							<input type='text' class='$parametro6[$clave] ancho__total__input solo__numero campos__obligatorios text-center' name='$parametro6[$clave]' readonly='readonly' value='0'/>
						</div>

						";

					
					}else if ($parametro8[$clave]=="numero") {

						$modal.="

						<div class='col col-4 titulo__enfasis mt-2'>
							$parametro5[$clave]
						</div>


						<div class='col col-8 mt-2'>
							<input type='text' class='$parametro6[$clave] ancho__total__input solo__numero campos__obligatorios text-center' name='$parametro6[$clave]' value='0'/>
						</div>

						";

					}else if($parametro8[$clave]=="monto"){


						$modal.="

						<div class='col col-4 titulo__enfasis mt-2'>
							$parametro5[$clave]
						</div>


						<div class='col col-8 mt-2'>
							<input type='text' class='$parametro6[$clave] ancho__total__input solo__numero__montos campos__obligatorios text-center' name='$parametro6[$clave]' value='0.00'/>
						</div>

						";						
						
					}else{

						$modal.="

						<div class='col col-4 titulo__enfasis mt-2'>
							$parametro5[$clave]
						</div>


						<div class='col col-8 mt-2'>
							<input type='text' class='$parametro6[$clave] ancho__total__input campos__obligatorios text-center' name='$parametro6[$clave]'/>
						</div>

						";

					}
		

				}else if($parametro7[$clave]=="boton"){

					$modal.="

						<div class='col col-10 titulo__enfasis mt-2'>
							$parametro5[$clave]
						</div>

						<div class='col col-2 mt-2 text-center'>
							<a data-bs-toggle='modal' data-bs-target='#$parametro6[$clave]' class='btn btn-secondary botonAc$parametro6[$clave]'><i class='fas fa-address-card'></i>&nbsp;&nbsp;Agregar</a>'
						</div>

						";						

				}else if($parametro7[$clave]=="select"){

					$modal.="

					<div class='col col-12 titulo__enfasis mt-2'>
						$parametro5[$clave]
					</div>

					<div class='col col-12 mt-2'>
						<select class='$parametro6[$clave] ancho__total__input campos__obligatorios' name='$parametro6[$clave]'></select>
					</div>

					";				

				}else if($parametro7[$clave]=="file"){



					$modal.="

					<div class='col col-12 titulo__enfasis mt-2'>
						$parametro5[$clave]
					</div>

					<div class='col col-12 mt-2'>
						<input type='file' class='$parametro6[$clave] ancho__total__input campos__obligatorios' name='$parametro6[$clave]' accept='application/pdf'/>
					</div>

					";				

				}else if ($parametro8[$clave]=="textos") {
						
					$modal.="

					<div class='col col-12 titulo__enfasis mt-2 uppercase__texto text-center textos__titulazos'>
						
					</div>

					";


				}


			}

			$modal.="
					</div>

						<div class='modal-footer d d-flex justify-content-center row'>

							<div class='col col-12 d d-flex justify-content-center flex-wrap'>

								<button type='submit' class='btn btn-primary left__margen boton__enlacesOcultos' id='$parametro4' name='$parametro4'>$parametro9</button>

								&nbsp;&nbsp;&nbsp;&nbsp;

								<a type='button' class='btn btn-danger  left__margen modales__reload pointer__botones' data-dismiss='modal' aria-label='Close' aria-label='Close'>CERRAR</a>


							</div>

							<div class='col col-1 reload__Enviosrealizados text-center'></div>

						</div>

						<input type='hidden' id='tipoPdf' name='tipoPdf' value='".$parametro10."'/>

					</form>

				</div>

			</div>
			";

			return $modal;

		} 


		public function getModalAtributos__modificaciones($parametro1,$parametro2,$parametro3,$parametro4,$parametro5,$parametro6,$parametro7,$parametro8,$parametro9){

			$modal="
			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog modal-lg'>

					<form class='modal-content $parametro2'>

						<div class='modal-header row'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title' id='modalTitulo'>$parametro3<br><span class='asignado__titulos'></span></h5>

					        </div>

					        <div class='col col-1'>

					          <span class='button pointer__botones modales__reload' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle'></i></span>

					        </div>

						</div>

						<div class='modal-body row'>

							<input type='hidden' class='idOrganismo' name='idOrganismo'/>

							<input type='hidden' class='idAtributoEscondido' name='idAtributoEscondido'/>

							<input type='hidden' class='evidenciaCargadas' value='no'/>

						";


			foreach ($parametro5 as $clave => $valor) {

				if ($parametro7[$clave]=="input") {

					if ($parametro8[$clave]=="disabled") {

						$modal.="

						<div class='col col-4 titulo__enfasis mt-2'>
							$parametro5[$clave]
						</div>


						<div class='col col-8 mt-2'>
							<input type='text' class='$parametro6[$clave] ancho__total__input solo__numero campos__obligatorios text-center' name='$parametro6[$clave]' readonly='readonly' value='0'/>
						</div>

						";

					
					}else if ($parametro8[$clave]=="numero") {

						$modal.="

						<div class='col col-4 titulo__enfasis mt-2'>
							$parametro5[$clave]
						</div>


						<div class='col col-8 mt-2'>
							<input type='text' class='$parametro6[$clave] ancho__total__input solo__numero campos__obligatorios text-center' name='$parametro6[$clave]' value='0'/>
						</div>

						";

					}else if($parametro8[$clave]=="monto"){


						$modal.="

						<div class='col col-4 titulo__enfasis mt-2'>
							$parametro5[$clave]
						</div>


						<div class='col col-8 mt-2'>
							<input type='text' class='$parametro6[$clave] ancho__total__input solo__numero__montos campos__obligatorios text-center' name='$parametro6[$clave]' value='0.00'/>
						</div>

						";						
						
					}else{

						$modal.="

						<div class='col col-4 titulo__enfasis mt-2'>
							$parametro5[$clave]
						</div>


						<div class='col col-8 mt-2'>
							<input type='text' class='$parametro6[$clave] ancho__total__input campos__obligatorios text-center' name='$parametro6[$clave]'/>
						</div>

						";

					}
		

				}else if($parametro7[$clave]=="boton"){

					$modal.="

						<div class='col col-10 titulo__enfasis mt-2'>
							$parametro5[$clave]
						</div>

						<div class='col col-2 mt-2 text-center'>
							<a data-bs-toggle='modal' data-bs-target='#$parametro6[$clave]' class='btn btn-secondary botonAc$parametro6[$clave]'><i class='fas fa-address-card'></i>&nbsp;&nbsp;Agregar</a>'
						</div>

						";						

				}else if($parametro7[$clave]=="select"){

					$modal.="

					<div class='col col-12 titulo__enfasis mt-2'>
						$parametro5[$clave]
					</div>

					<div class='col col-12 mt-2'>
						<select class='$parametro6[$clave] ancho__total__input campos__obligatorios' name='$parametro6[$clave]'></select>
					</div>

					";				

				}else if($parametro7[$clave]=="file"){



					$modal.="

					<div class='col col-4 titulo__enfasis mt-2'>
						$parametro5[$clave]
					</div>

					<div class='col col-8 mt-2'>
						<input type='file' class='$parametro6[$clave] ancho__total__input campos__obligatorios' name='$parametro6[$clave]' accept='application/pdf'/>
					</div>

					";				

				}else if ($parametro8[$clave]=="textos") {
						
					$modal.="

					<div class='col col-12 titulo__enfasis mt-2 uppercase__texto text-center textos__titulazos'>
						
					</div>

					";


				}


			}

			$modal.="
					</div>

						<div class='modal-footer d d-flex justify-content-center row'>

							<div class='col col-12 d d-flex justify-content-center flex-wrap'>

								<a type='button' class='btn btn-primary  left__margen boton__enlacesOcultos' id='$parametro4' name='$parametro4'>$parametro9</a>

								&nbsp;&nbsp;&nbsp;&nbsp;

								<a type='button' class='btn btn-danger  left__margen modales__reload pointer__botones' data-dismiss='modal' aria-label='Close' aria-label='Close'>CERRAR</a>


							</div>

							<div class='col col-1 reload__Enviosrealizados text-center'></div>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		} 


		public function getModalAtributos($parametro1,$parametro2,$parametro3,$parametro4,$parametro5,$parametro6,$parametro7,$parametro8,$parametro9){

			$modal="
			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog modal-lg'>

					<form class='modal-content $parametro2'>

						<div class='modal-header row'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title' id='modalTitulo'>$parametro3<br><span class='asignado__titulos'></span></h5>

					        </div>

					        <div class='col col-1'>

					          <span class='button pointer__botones modales__reload' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle'></i></span>

					        </div>

						</div>

						<div class='modal-body row'>

							<input type='hidden' class='idOrganismo' name='idOrganismo'/>

							<input type='hidden' class='idAtributoEscondido' name='idAtributoEscondido'/>

						";


			foreach ($parametro5 as $clave => $valor) {

				if ($parametro7[$clave]=="input") {

					if ($parametro8[$clave]=="disabled") {

						$modal.="

						<div class='col col-4 titulo__enfasis mt-2'>
							$parametro5[$clave]
						</div>


						<div class='col col-8 mt-2'>
							<input type='text' class='$parametro6[$clave] ancho__total__input solo__numero campos__obligatorios text-center' name='$parametro6[$clave]' readonly='readonly' value='0'/>
						</div>

						";

					
					}else if ($parametro8[$clave]=="numero") {

						$modal.="

						<div class='col col-4 titulo__enfasis mt-2'>
							$parametro5[$clave]
						</div>


						<div class='col col-8 mt-2'>
							<input type='text' class='$parametro6[$clave] ancho__total__input solo__numero campos__obligatorios text-center' name='$parametro6[$clave]' value='0'/>
						</div>

						";

					}else if($parametro8[$clave]=="monto"){


						$modal.="

						<div class='col col-4 titulo__enfasis mt-2'>
							$parametro5[$clave]
						</div>


						<div class='col col-8 mt-2'>
							<input type='text' class='$parametro6[$clave] ancho__total__input solo__numero__montos campos__obligatorios text-center' name='$parametro6[$clave]' value='0.00'/>
						</div>

						";						
						
					}else{

						$modal.="

						<div class='col col-4 titulo__enfasis mt-2'>
							$parametro5[$clave]
						</div>


						<div class='col col-8 mt-2'>
							<input type='text' class='$parametro6[$clave] ancho__total__input campos__obligatorios text-center' name='$parametro6[$clave]'/>
						</div>

						";

					}
		

				}else if($parametro7[$clave]=="boton"){

					$modal.="

						<div class='col col-10 titulo__enfasis mt-2'>
							$parametro5[$clave]
						</div>

						<div class='col col-2 mt-2 text-center'>
							<a data-bs-toggle='modal' data-bs-target='#$parametro6[$clave]' class='btn btn-secondary botonAc$parametro6[$clave]'><i class='fas fa-address-card'></i>&nbsp;&nbsp;Agregar</a>'
						</div>

						";						

				}else if($parametro7[$clave]=="select"){

					$modal.="

					<div class='col col-12 titulo__enfasis mt-2'>
						$parametro5[$clave]
					</div>

					<div class='col col-12 mt-2'>
						<select class='$parametro6[$clave] ancho__total__input campos__obligatorios' name='$parametro6[$clave]'></select>
					</div>

					";				

				}else if($parametro7[$clave]=="file"){



					$modal.="

					<div class='col col-12 titulo__enfasis mt-2'>
						$parametro5[$clave]
					</div>

					<div class='col col-12 mt-2'>
						<input type='file' class='$parametro6[$clave] ancho__total__input campos__obligatorios' name='$parametro6[$clave]' accept='application/pdf'/>
					</div>

					";				

				}else if ($parametro8[$clave]=="textos") {
						
					$modal.="

					<div class='col col-12 titulo__enfasis mt-2 uppercase__texto text-center textos__titulazos'>
						
					</div>

					";


				}


			}

			$modal.="
					</div>

						<div class='modal-footer d d-flex justify-content-center row'>

							<div class='col col-12 d d-flex justify-content-center flex-wrap'>

								<a type='button' class='btn btn-primary  left__margen boton__enlacesOcultos' id='$parametro4' name='$parametro4'>$parametro9</a>

								&nbsp;&nbsp;&nbsp;&nbsp;

								<a type='button' class='btn btn-danger  left__margen modales__reload pointer__botones' data-dismiss='modal' aria-label='Close' aria-label='Close'>CERRAR</a>


							</div>

							<div class='col col-1 reload__Enviosrealizados text-center'></div>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		} 


		public function getModalConfiguracionItemsPoa($parametro1,$parametro2,$parametro3,$parametro4,$parametro5,$parametro6,$parametro7,$parametro8,$parametro9){

			$modal= "
			
			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>";

			if ($parametro8=="contenedorItemsAc") {
				$modal.="<div class='modal-dialog' style='max-width:90%!important;'>";
			}else{
				$modal.="<div class='modal-dialog modal-lg'>";
			}

			
			$modal.="	<form class='modal-content formularioConfiguracion'>

						<div class='modal-header row'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title' id='exampleModalLabel'>$parametro2</h5>

					        </div>

					        <div class='col col-1'>";

				if ($parametro1=="actividadesEditaModalAc") {
					
					$modal.="<span class='button pointer__botones' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle'></i></span>";

				}else{

					$modal.="<span class='button pointer__botones modales__reload' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle'></i></span>";

				}


				$modal.= "
					        </div>

						</div>

						<div class='modal-body row $parametro3'>

							<div class='col col-6 d d-flex justify-content-center'>

								<a class='btn btn-warning pointer__botones' id='$parametro4' name='$parametro4'><i class='fas fa-user-plus'></i>&nbsp;&nbsp;Agregar</a>

								<input type='hidden' class='elemento__escondidoI' name='elemento__escondidoI'>

							</div>

							<div class='col col-6 d d-flex justify-content-center'>

								<a class='btn btn-info pointer__botones refrezcar__tabla' id='$parametro5' name='$parametro5'><i class='fas fa-eye'></i>&nbsp;&nbsp;Ver</a>

							</div>

							<div class='$parametro8 $parametro9'>

							<table id='$parametro6' class='col col-12 cell-border mt-4'>

								<thead>

									<tr>";


								foreach ($parametro7 as $clave => $valor) {
								
									$modal.="<th><center>$valor</center></th>";

								}

								$modal.="</tr>

								</thead>

							</table>

						  </div>

						</div>

						<div class='modal-footer d d-flex justify-content-center row'>

							<div class='col col-12 d d-flex justify-content-center flex-wrap'>

								<a type='button' class='btn btn-danger  left__margen modales__reload pointer__botones' data-dismiss='modal' aria-label='Close' aria-label='Close'>CERRAR</a>

							</div>

						</div>

					</form>

				</div>

			</div>";

			return $modal;


		}


		public function getModalConfiguracion($parametro1,$parametro2,$parametro3,$parametro4,$parametro5,$parametro6,$parametro7,$parametro8){

			$modal= "
			
			<div class='modal fade' id='$parametro1' aria-hidden='true'>";

			if ($parametro8=="contenedorItemsAc") {
				$modal.="<div class='modal-dialog modal-xl'>";
			}else{
				$modal.="<div class='modal-dialog modal-lg'>";
			}

			
			$modal.="	<form class='modal-content formularioConfiguracion'>

						<div class='modal-header row'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title titulo__modalItems' id='exampleModalLabel'>$parametro2</h5>

					        </div>

					        <div class='col col-1'>";

				if ($parametro1=="actividadesEditaModalAc") {
					
					$modal.="<span class='button pointer__botones' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle'></i></span>";

				}else{

					$modal.="<span class='button pointer__botones modales__reload' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle'></i></span>";

				}


				$modal.= "
					        </div>

						</div>

						<div class='modal-body row $parametro3'>

							<div class='col col-6 d d-flex justify-content-center'>

								<a class='btn btn-warning pointer__botones' id='$parametro4' name='$parametro4'><i class='fas fa-user-plus'></i>&nbsp;&nbsp;Agregar</a>

								<input type='hidden' class='elemento__escondidoI' name='elemento__escondidoI'>

							</div>

							<div class='col col-6 d d-flex justify-content-center'>

								<a class='btn btn-info pointer__botones refrezcar__tabla' id='$parametro5' name='$parametro5'><i class='fas fa-eye'></i>&nbsp;&nbsp;Ver</a>

							</div>

							<div class='$parametro8'>

							<table id='$parametro6' class='col col-12 cell-border mt-4'>

								<thead>

									<tr>";


								foreach ($parametro7 as $clave => $valor) {
								
									$modal.="<th><center>$valor</center></th>";

								}

								if ($parametro1!="actividadesEditaModalAc") {
									$modal.="<th>Editar</th>";
								}

								


								$modal.="<th>Eliminar</th>";

								$modal.="</tr>

								</thead>

							</table>

						  </div>

						</div>

					</form>

				</div>

			</div>";

			return $modal;


		}

		public function getModalEditargetModalAuxiliar($parametro1,$parametro2,$parametro3,$parametro4,$parametro5,$parametro6){

			$modal="

				<div class='modal fade' id='$parametro1' aria-hidden='true'>

					<div class='modal-dialog'>

						<form id='$parametro2' class='modal-content'>

						  <input type='hidden' class='enviado' name='enviado'/>

					      <div class='modal-header row'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title'>$parametro3</h5>

					        </div>

					        <div class='col col-1'>

					        <span class='button pointer__botones reload__ModalesA' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle'></i></span>

					        </div>

					      </div>

					      <div class='modal-body row'>

					      ";		



			foreach ($parametro4 as $clavePrincipal => $valorPrincipal) {

				if ($valorPrincipal=="select__1" || $valorPrincipal=="select__2" || $valorPrincipal=="select__3" || $valorPrincipal=="select__grupoG" || $valorPrincipal=="select__tipoOrga" || $valorPrincipal=="select__2Objetivos" || $valorPrincipal=="select__indiCadores") {

					$modal.="
						<div class='col col-4 titulo__enfasis'>$parametro5[$clavePrincipal]</div>
						<select type='text' class='$parametro4[$clavePrincipal]' name='$parametro4[$clavePrincipal]' class='col col-8 text-left'></select>
					";


				}else if($parametro5[$clavePrincipal]=="escondido"){

				$modal.="
						<input type='hidden' class='$parametro4[$clavePrincipal]' name='$parametro4[$clavePrincipal]' class='col col-8 text-left' />
					";



				}else{

					$modal.="
						<div class='col col-4 titulo__enfasis'>$parametro5[$clavePrincipal]</div>
						<input type='text' class='$parametro4[$clavePrincipal]' name='$parametro4[$clavePrincipal]' class='col col-8 text-left' />
					";

				}

			}


			$modal.="
							</div>

							<div class='modal-footer d d-flex justify-content-center row'>

								<div class='col col-12 d d-flex justify-content-center flex-wrap'>

									<a type='button' class='btn btn-primary  left__margen' id='$parametro6' name='$parametro6'>Editar</a>

								</div>

							</div>

						</form>

					</div>

				</div>

			";

			return $modal;

		}




		public function getModalEditargetModal($parametro1,$parametro2,$parametro3,$parametro4,$parametro5,$parametro6){

			$modal="

				<div class='modal fade' id='$parametro1' aria-hidden='true'>

					<div class='modal-dialog'>

						<form id='$parametro2' class='modal-content'>

						  <input type='hidden' class='enviado' name='enviado'/>

					      <div class='modal-header row'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title'>$parametro3</h5>

					        </div>

					        <div class='col col-1'>

					        <span class='button pointer__botones' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle'></i></span>

					        </div>

					      </div>

					      <div class='modal-body row'>

					      ";		



			foreach ($parametro4 as $clavePrincipal => $valorPrincipal) {

				if ($valorPrincipal=="select__1" || $valorPrincipal=="select__2" || $valorPrincipal=="select__3" || $valorPrincipal=="select__grupoG" || $valorPrincipal=="select__2Objetivos" || $valorPrincipal=="select__indiCadores") {

					$modal.="
						<div class='col col-4 titulo__enfasis'>$parametro5[$clavePrincipal]</div>
						<select type='text' class='$parametro4[$clavePrincipal]' name='$parametro4[$clavePrincipal]' class='col col-8 text-left'></select>
					";


				}else if($parametro5[$clavePrincipal]=="escondido"){

				$modal.="
						<input type='hidden' class='$parametro4[$clavePrincipal]' name='$parametro4[$clavePrincipal]' class='col col-8 text-left' />
					";



				}else{

					$modal.="
						<div class='col col-4 titulo__enfasis'>$parametro5[$clavePrincipal]</div>
						<input type='text' class='$parametro4[$clavePrincipal]' name='$parametro4[$clavePrincipal]' class='col col-8 text-left' />
					";

				}

			}


			$modal.="
							</div>

							<div class='modal-footer d d-flex justify-content-center row'>

								<div class='col col-12 d d-flex justify-content-center flex-wrap'>

									<a type='button' class='btn btn-primary  left__margen' id='$parametro6' name='$parametro6'>Editar</a>

								</div>

							</div>

						</form>

					</div>

				</div>

			";

			return $modal;

		}



		public function getModal($idModal,$idFormulario,$textoTituloHeader,$idBotonEnvio,$arrayIdDiv,$arrayLabel,$arrayAcordion,$arrayContadorContenido,$nombreBoton,$arrayEstiloBoton,$arrayFuncionAcordion,$arrayFuncionContenidoAcordion){

			$modal= "
			
			<div class='modal fade' id='$idModal' aria-hidden='true'>

				<div class='modal-dialog'>

					<form id='$idFormulario' class='modal-content'>

					  <input type='hidden' id='enviado' name='enviado'/>

					  <input type='hidden' id='comentarioNecesario' name='comentarioNecesario'/>

				      <div class='modal-header row'>

				        <div class='col col-11 text-center'>

				          <h5 class='modal-title' id='exampleModalLabel'>$textoTituloHeader</h5>

				        </div>

				        <div class='col col-1'>

				          <button class='btn-close cerrar__modalRegistros modalCerrar__modales'></button>

				        </div>

				      </div>					 

				      <div class='modal-body row'>

			";

			$acumuladorModales=0;

			foreach ($arrayAcordion as $clavePrincipal => $valorPrincipal) {

				if ($clavePrincipal==0) {
					$modal.="<div class='row mt-1 estilo__enlaces__modales $arrayFuncionAcordion[$clavePrincipal] pointer__botones'>";
				}else{
					$modal.="<div class='row mt-4 estilo__enlaces__modales $arrayFuncionAcordion[$clavePrincipal] pointer__botones'>";
				}
				
				$modal.="
					<div class='col col-11 titulo__enfasis modales__titulos text-left'>

						$valorPrincipal

					</div>

					<div class='col col-1 item__remplazoModales'>

						<i class='fas fa-angle-left'></i>

					</div>

				</div>";


				$modal.="<div class='row d d-flex justify-content-center mt-2 $arrayFuncionContenidoAcordion[$clavePrincipal]'>";

				for ($i=0; $i < $arrayContadorContenido[$clavePrincipal]; $i++) { 

					$modal.="
						<div class='col col-4 titulo__enfasis $arrayFuncionContenidoAcordion[$clavePrincipal]'>$arrayLabel[$acumuladorModales]</div>
						<div id='$arrayIdDiv[$acumuladorModales]' name='$arrayIdDiv[$acumuladorModales]' class='col col-8 text-left $arrayFuncionContenidoAcordion[$clavePrincipal]'></div>
					";

					$acumuladorModales++;

				}

				$modal.="</div>";

			}

			$modal.="

				</div>

				<div class='modal-footer d d-flex justify-content-center row'>

				        <div class='col col-12 d d-flex justify-content-center flex-wrap'>";

			foreach ($nombreBoton as $claveBoton => $valorBoton) {
			
				$modal.="<button type='button' class='btn $arrayEstiloBoton[$claveBoton] left__margen boton__enlacesOcultos' id='$idBotonEnvio[$claveBoton]' name='$idBotonEnvio[$claveBoton]'>$valorBoton</button>";

			}

			$modal.="</div>

				        <div class='col col-12 reload__Modales d d-flex justify-content-center'></div>

				        <div class='col col-12 reload__Enviosrealizados d d-flex justify-content-center'></div>

				      </div>

					</form>

				</div>

			</div>";

			return $modal;


		}

		/*=====  End of Funciones principales clases  ======*/
		
		public function getObservacionesPoa($parametro1,$parametro2,$parametro3,$parametro4,$parametro5){

			switch ($parametro1) {

				case 1:
					
					return "<div clas='row text-center d d-flex justify-content-center'>

						<div class='col col-12 text-center mt-2 titulo__enfasis mt-4'>

							$parametro2

						</div>

					</div>";

				break;


				case 2:
					
					return "

						<div class='row d d-flex flex-column justify-content-center card mt-4'>

							<div class='card-body row'>

								<h5 class='card-title text-center titulo__enfasis'>$parametro2</h5>

								<div class='col col-12 mt-4 justificado__textos'>

									$parametro3

								</div>

								<div class='row d d-flex align-items-center justify-content-center col col-12'>

									<div class='col col-6 text-center mt-4'>

										<a href='$parametro4' class='btn btn-info pointer__botones'>IR&nbsp;&nbsp;&nbsp;&nbsp;<i class='fas fa-angle-right'></i></a>

									</div>


									<div class='col col-6 text-center mt-4'>

										<button class='btn btn-primary pointer__botones boton__enlacesOcultos' id='$parametro5' name='$parametro5'><i class='fas fa-share-square'></i>&nbsp;&nbsp;&nbsp;&nbsp;Enviar</button>

										<div class='reload__Enviosrealizados'></div>

									</div>

								</div>

							</div>

						</div>

					";

				break;


			}

		}


		/******************************* POA INICIAL SEGUIMIENTO modal principal ********************** */	
		public function getModalConfiguracion__reporteria__organismos_seguimiento_mocdal_principal($parametro1,$parametro2,$parametro3){
			$componentes= new componentes();

			$modal="

			<div class='modal fade modal__ItemsGrup hide' id='$parametro1'  data-backdrop='static' data-keyboard='false' tabindex='-1'>

			<div class='modal-dialog' style='min-width:75%!important;'>

			<form class='modal-content formularioConfiguracion' action='modelosBd/pdf/pdf.modelo.php' method='post'>

				<input type='hidden' name='idOrganismo' id='idOrganismo'/>

				<input type='hidden' id='tipoPdf' name='tipoPdf' value='documento__seguimiento__final' />
				
				<input type='hidden' id='trimestreEvaluadorDos' name='trimestreEvaluadorDos'/>

				<button class='btn btn-info'><i class='fa fa-cloud' aria-hidden='true'></i>&nbsp;&nbsp;GENERAR PDF</button>


				<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>

					<div class='col col-2 text-right'>

						<image src='images/titulo__ministerio__deporte.png'/>

					</div>
					

					<div class='col col-7 text-center textos__titulos titulo__alto__rendimientos row'>



					</div>


					<div class='col col-2 text-left'>

						<image src='images/titulo__principis__ministerios.png'/>

					</div>

					<div class='col col-1'>

					<span class='button pointer__botones' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle' style='font-size:18px!important; color:blue!important;'></i></span>

					</div>


				</div>

				<div class='modal-body row $parametro3'>

					<div class='col col-12 texto__evidenciales titulo__enfasis text-center' style='text-transform:uppercase!important;'></div>

					<div class='autogestion__verificables'>

						<div class='row d d-flex flex-column justify-content-center card mt-4'>

							<div class='card-body row'>

								<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#poa__indi' id='poa__indi_poa'>POA</a>

							</div>

						</div>

					</div>
					<div class='autogestion__verificables'>

						<div class='row d d-flex flex-column justify-content-center card mt-4'>

							<div class='card-body row'>

								<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#autogestion__se__2' id='autogestionPoas__in__2'>Autogestión</a>

							</div>

						</div>

					</div>

					<div class='indicadores__verificables'>

						<div class='row d d-flex flex-column justify-content-center card mt-4'>

							<div class='card-body row'>

								<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#indicadores__se__2' id='indicadores__in__2'>Indicadores</a>

							</div>

						</div>

					</div>

					<div class='administrativos__verificables'>

						<div class='row d d-flex flex-column justify-content-center card mt-4'>

							<div class='card-body row'>

								<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#administrativo__se__2' id='administrativo__in__2'>001 - Operación y funcionamiento de organizaciones deportivas y escenarios deportivos - Ejecución Presupuestaria</a>

							</div>

						</div>

					</div>

					<div class='mantenimiento__verificables'>

						<div class='row d d-flex flex-column justify-content-center card mt-4'>

							<div class='card-body row'>

								<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#mantenimiento__se__2' id='mantenimiento__in__2'>002 - Mantenimiento de escenarios e infraestructura deportiva - Ejecución presupuestaria</a>

							</div>

						</div>

					</div>

					<div class='mantenimientoTEC__verificables'>

						<div class='row d d-flex flex-column justify-content-center card mt-4'>

							<div class='card-body row'>

								<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#mantenimientoTec__se__2' id='mantenimientoTec__in__2'>002 - Mantenimiento de escenarios e infraestructura deportiva - Información técnica</a>

							</div>

						</div>

					</div>

					<div class='capacitacion__verificables'>

						<div class='row d d-flex flex-column justify-content-center card mt-4'>

							<div class='card-body row'>

								<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#capacitacion__se__2' id='capacitacion__in__2'>003 - Capacitación deportiva o de recreación - Ejecución presupuestaria</a>

							</div>

						</div>

					</div>

					<div class='capacitacionTecnicos__verificables'>

						<div class='row d d-flex flex-column justify-content-center card mt-4'>

							<div class='card-body row'>

								<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#capacitacionTec__se__2' id='capacitacionTec__in__2'>003 - Capacitación deportiva o de recreación - Información técnica</a>

							</div>

						</div>

					</div>

					<div class='sueldos__verificables'>

						<div class='row d d-flex flex-column justify-content-center card mt-4'>

							<div class='card-body row'>

								<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#sueldos__se__2' id='sueldos__in__2'>004 - Operación deportiva - Sueldos y salarios</a>

							</div>

						</div>

					</div>

					<div class='honorarios__verificables'>

						<div class='row d d-flex flex-column justify-content-center card mt-4'>

							<div class='card-body row'>

								<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#honorarios__se__2' id='honorarios__in__2'>004 - Operación deportiva - Honorarios</a>

							</div>

						</div>

					</div>

					<div class='competencias__verificables'>

						<div class='row d d-flex flex-column justify-content-center card mt-4'>

							<div class='card-body row'>

								<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#competencia__se__2' id='competencia__in__2'>005 - Eventos de preparación y competencia - Ejecución presupuestaria</a>

							</div>

						</div>

					</div>

					<div class='competenciasForma__verificables'>

						<div class='row d d-flex flex-column justify-content-center card mt-4'>

							<div class='card-body row'>

								<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#competenciaForma__se__2' id='competenciaFormativa__in__2'>005 - Eventos de preparación y competencia - Deporte Formativo - Información técnica</a>

							</div>

						</div>

					</div>

					<div class='competenciasAlto__verificables'>

						<div class='row d d-flex flex-column justify-content-center card mt-4'>

							<div class='card-body row'>

								<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#competenciaAlto__se__2' id='competenciaAlto__in__2'>005 - Eventos de preparación y competencia - Alto Rendimiento - Información técnica</a>

							</div>

						</div>

					</div>

					<div class='recreativo__verificables'>

						<div class='row d d-flex flex-column justify-content-center card mt-4'>

							<div class='card-body row'>

								<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#recreativo__se__2' id='recreativo__in__2'>006 - Actividades recreativas - Ejecución presupuestaria</a>

							</div>

						</div>

					</div>

					<div class='recreativoTecnicos__verificables'>

						<div class='row d d-flex flex-column justify-content-center card mt-4'>

							<div class='card-body row'>

								<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#recreativoTec__se__2' id='recreativoTec__in__2'>006 - Actividades recreativas - Información técnica</a>

							</div>

						</div>

					</div>

					<div class='implementacion__verificables'>

						<div class='row d d-flex flex-column justify-content-center card mt-4'>

							<div class='card-body row'>

								<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#implementacion__se__2' id='implementacion__in__2'>007 - implementación deportiva  - Ejecución presupuestaria e Información Técnica</a>

							</div>

						</div>

					</div>

				</div>

			</form>

			</div>


			</div>

			";

			return $modal;


		}


		/******************************* POA INICIAL SEGUIMIENTO ********************** */	
		public function getModalConfiguracion__reporteria__organismos_seguimiento($parametro1,$parametro2,$parametro3){
			$componentes= new componentes();

			$modal="

			<div class='modal fade modal__ItemsGrup hide' id='$parametro1'  data-backdrop='static' data-keyboard='false' tabindex='-1'>

			<div class='modal-dialog' style='min-width:75%!important;'>

			<form class='modal-content formularioConfiguracion' action='modelosBd/pdf/pdf.modelo.php' method='post'>

				<input type='hidden' name='idOrganismo' id='idOrganismo'/>

				<input type='hidden' id='tipoPdf' name='tipoPdf' value='documento__seguimiento__final' />
				
				<input type='hidden' id='trimestreEvaluadorDos' name='trimestreEvaluadorDos'/>

				<button class='btn btn-info'><i class='fa fa-cloud' aria-hidden='true'></i>&nbsp;&nbsp;GENERAR PDF</button>


				<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>

					<div class='col col-2 text-right'>

						<image src='images/titulo__ministerio__deporte.png'/>

					</div>
					

					<div class='col col-7 text-center textos__titulos titulo__alto__rendimientos row'>



					</div>


					<div class='col col-2 text-left'>

						<image src='images/titulo__principis__ministerios.png'/>

					</div>

					<div class='col col-1'>

					<span class='button pointer__botones' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle' style='font-size:18px!important; color:blue!important;'></i></span>

					</div>


				</div>

				<div class='modal-body row $parametro3'>

					<div class='col col-12 texto__evidenciales titulo__enfasis text-center' style='text-transform:uppercase!important;'></div>

					<div class='autogestion__verificables'>

						<div class='row d d-flex flex-column justify-content-center card mt-4'>

							<div class='card-body row'>

								<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#poa__indi' id='poa__indi_poa'>POA</a>

							</div>

						</div>

					</div>
					<div class='autogestion__verificables'>

						<div class='row d d-flex flex-column justify-content-center card mt-4'>

							<div class='card-body row'>

								<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#autogestion__se__2' id='autogestionPoas__in__2'>Autogestión</a>

							</div>

						</div>

					</div>

					<div class='indicadores__verificables'>

						<div class='row d d-flex flex-column justify-content-center card mt-4'>

							<div class='card-body row'>

								<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#indicadores__se__2' id='indicadores__in__2'>Indicadores</a>

							</div>

						</div>

					</div>

					<div class='administrativos__verificables'>

						<div class='row d d-flex flex-column justify-content-center card mt-4'>

							<div class='card-body row'>

								<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#administrativo__se__2' id='administrativo__in__2'>001 - Operación y funcionamiento de organizaciones deportivas y escenarios deportivos - Ejecución Presupuestaria</a>

							</div>

						</div>

					</div>

					<div class='mantenimiento__verificables'>

						<div class='row d d-flex flex-column justify-content-center card mt-4'>

							<div class='card-body row'>

								<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#mantenimiento__se__2' id='mantenimiento__in__2'>002 - Mantenimiento de escenarios e infraestructura deportiva - Ejecución presupuestaria</a>

							</div>

						</div>

					</div>

					<div class='mantenimientoTEC__verificables'>

						<div class='row d d-flex flex-column justify-content-center card mt-4'>

							<div class='card-body row'>

								<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#mantenimientoTec__se__2' id='mantenimientoTec__in__2'>002 - Mantenimiento de escenarios e infraestructura deportiva - Información técnica</a>

							</div>

						</div>

					</div>

					<div class='capacitacion__verificables'>

						<div class='row d d-flex flex-column justify-content-center card mt-4'>

							<div class='card-body row'>

								<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#capacitacion__se__2' id='capacitacion__in__2'>003 - Capacitación deportiva o de recreación - Ejecución presupuestaria</a>

							</div>

						</div>

					</div>

					<div class='capacitacionTecnicos__verificables'>

						<div class='row d d-flex flex-column justify-content-center card mt-4'>

							<div class='card-body row'>

								<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#capacitacionTec__se__2' id='capacitacionTec__in__2'>003 - Capacitación deportiva o de recreación - Información técnica</a>

							</div>

						</div>

					</div>

					<div class='sueldos__verificables'>

						<div class='row d d-flex flex-column justify-content-center card mt-4'>

							<div class='card-body row'>

								<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#sueldos__se__2' id='sueldos__in__2'>004 - Operación deportiva - Sueldos y salarios</a>

							</div>

						</div>

					</div>

					<div class='honorarios__verificables'>

						<div class='row d d-flex flex-column justify-content-center card mt-4'>

							<div class='card-body row'>

								<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#honorarios__se__2' id='honorarios__in__2'>004 - Operación deportiva - Honorarios</a>

							</div>

						</div>

					</div>

					<div class='competencias__verificables'>

						<div class='row d d-flex flex-column justify-content-center card mt-4'>

							<div class='card-body row'>

								<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#competencia__se__2' id='competencia__in__2'>005 - Eventos de preparación y competencia - Ejecución presupuestaria</a>

							</div>

						</div>

					</div>

					<div class='competenciasForma__verificables'>

						<div class='row d d-flex flex-column justify-content-center card mt-4'>

							<div class='card-body row'>

								<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#competenciaForma__se__2' id='competenciaFormativa__in__2'>005 - Eventos de preparación y competencia - Deporte Formativo - Información técnica</a>

							</div>

						</div>

					</div>

					<div class='competenciasAlto__verificables'>

						<div class='row d d-flex flex-column justify-content-center card mt-4'>

							<div class='card-body row'>

								<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#competenciaAlto__se__2' id='competenciaAlto__in__2'>005 - Eventos de preparación y competencia - Alto Rendimiento - Información técnica</a>

							</div>

						</div>

					</div>

					<div class='recreativo__verificables'>

						<div class='row d d-flex flex-column justify-content-center card mt-4'>

							<div class='card-body row'>

								<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#recreativo__se__2' id='recreativo__in__2'>006 - Actividades recreativas - Ejecución presupuestaria</a>

							</div>

						</div>

					</div>

					<div class='recreativoTecnicos__verificables'>

						<div class='row d d-flex flex-column justify-content-center card mt-4'>

							<div class='card-body row'>

								<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#recreativoTec__se__2' id='recreativoTec__in__2'>006 - Actividades recreativas - Información técnica</a>

							</div>

						</div>

					</div>

					<div class='implementacion__verificables'>

						<div class='row d d-flex flex-column justify-content-center card mt-4'>

							<div class='card-body row'>

								<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#implementacion__se__2' id='implementacion__in__2'>007 - implementación deportiva  - Ejecución presupuestaria e Información Técnica</a>

							</div>

						</div>

					</div>

				</div>

			</form>

			</div>


			</div>

			";

			return $modal;


		}

		public function getModalConfiguracion__reporteria__organismos2023($parametro1,$parametro2,$parametro3,$parametro4){


			$modal="

			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog' style='min-width:100%!important;'>

					<form class='modal-content formularioConfiguracion'>

					<div class='modal-header row'>

					    <div class='col col-11 text-center'>

					    	<h5 class='modal-title $parametro2'>$parametro2</h5>

					    </div>

					    <div class='col col-1'>

					    	<button type='button' class='btn-close cerrar__modalRegistros' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

					    </div>

					</div>

					<div class='modal-body row'>

						<div style='width:100%;'>

						<table id='$parametro3'>

							<thead>

								<tr>

						";


				foreach ($parametro4 as $clave => $valor) {

							$modal.="<th><center>$valor</center></th>";
					
				}

				if ($parametro2!="Suministros" && $parametro2!="POA" && $parametro2!="INDICADORES") {
					
				$modal.="
									<th><center>Enero</center></th>
									<th><center>Febrero</center></th>
									<th><center>Marzo</center></th>
									<th><center>Abril</center></th>
									<th><center>Mayo</center></th>
									<th><center>Junio</center></th>
									<th><center>Julio</center></th>
									<th><center>Agosto</center></th>
									<th><center>Septiembre</center></th>
									<th><center>Octubre</center></th>
									<th><center>Noviembre</center></th>
									<th><center>Diciembre</center></th>
									<th><center>Total</center></th>";


				}


					$modal.="

								</tr>

							</thead>

						</table>

						</div>


					</div>

					</form>

				</div>

			</div>

			";

			return $modal;


		}

	}