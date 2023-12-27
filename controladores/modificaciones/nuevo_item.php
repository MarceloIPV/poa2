<div class="modal fade" id="nuevoItem" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Nuevo Item</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="col-md-12">
					<section >
									
						<table class=" table table-responsive  ">

							<thead class="" style="color: red">
							HTML formateado (resaltado)

<tr>
	<th style="color:black; font-size:12px;">CÓDIGO ÍTEM</th>
	<th style="color:black; font-size:12px;">ÍTEM</th>
	<th style="color:black; font-size:12px;">TIPO DE FINANCIAMIENTO</th>
	<th style="color:black; font-size:12px;">NOMBRE DEL EVENTO</th>
	<th style="color:black; font-size:12px;">DEPORTE</th>
	<th style="color:black; font-size:12px;">PROVINCIA</th>
	<th style="color:black; font-size:12px;">SEDE CIUDAD - PAIS </th>
	<th style="color:black; font-size:12px;">ALCANCE</th>
	<th style="color:black; font-size:12px;">FECHA INICIO</th>
	<th style="color:black; font-size:12px;">FECHA FIN</th>
	<th style="color:black; font-size:12px;">GÉNERO</th>
	<th style="color:black; font-size:12px;">CATEGORÍA</th>
	<th style="color:black; font-size:12px;">No.ENTRENADORES OFICIALES</th>
	<th style="color:black; font-size:12px;">No. ATLETAS</th>
	<th style="color:black; font-size:12px;">TOTAL</th>
	<th style="color:black; font-size:12px;">MUJERES (BENEFICIARIOS)</th>
	<th style="color:black; font-size:12px;">HOMBRES (BENEFICIARIOS)</th>
	<th style="color:black; font-size:12px;">Detalle lo que el organismo va a adquirir</th>
	<th style="color:black; font-size:12px;">Justificación de la adquisición del bien o servicio</th>
	<th style="color:black; font-size:12px;">Cantidad del bien o servicio a adquirir</th>
	<th style="color:black; font-size:12px;">Enero</th>
	<th style="color:black; font-size:12px;">Febrero</th>
	<th style="color:black; font-size:12px;">Marzo</th>
	<th style="color:black; font-size:12px;">Abril</th>
	<th style="color:black; font-size:12px;">Mayo</th>
	<th style="color:black; font-size:12px;">Junio</th>
	<th style="color:black; font-size:12px;">Julio</th>
	<th style="color:black; font-size:12px;">Agosto</th>
	<th style="color:black; font-size:12px;">Septiembre</th>
	<th style="color:black; font-size:12px;">Octubre</th>
	<th style="color:black; font-size:12px;">Noviembre</th>
	<th style="color:black; font-size:12px;">Diciembre</th>
	<th style="color:black; font-size:12px;">Total</th>
</tr>
							</thead>
							<tbody class="cuerp oMatriz1">

							<tr >
	<td></td>
	<td></td>
	<td><select  class="input__act" id="tipoFinan'+idPda[i]+'" attrF="'+idPda[i]+'" attr="tipoFinanciamiento" value="'+tipoFinanciamiento[i]+'"><option value="corriente">Corriente</option><option value="autogestion">Autogestión</option></select></td>
	<td><input type="text"  class="input__act" attrF="'+idPda[i]+'" attr="nombreEvento" /></td>
	<td><select><option value="corriente">AJEDREZ</option><option value="autogestion">ATLETISMO</option>
	<option value="autogestion">BOXEO</option>
	<option value="autogestion">FUTBOL</option>
	<option value="autogestion">JUDO</option>
	<option value="autogestion">KARATE</option>
	<option value="autogestion">LEVANTAMIENTO DE PIEZAS</option>
	<option value="autogestion">Atletisno</option><td><select><option value="corriente">Corriente</option><option value="autogestion">Autogestión</option>
</select></td>

<td><select><option value="corriente">Azuay</option>
<option value="autogestion">Bolivar</option>
	<option value="autogestion">Cañar</option>
	<option value="autogestion">Carchi</option>
	<option value="autogestion">Chimborazo</option>
	<option value="autogestion">Cotopaxi</option>
	</select></td>
	<td><select><option value="corriente">INT</option>
<option value="autogestion">PRO</option>
	<option value="autogestion">CAN</option>
	<option value="autogestion">PAR</option>
	<option value="autogestion">BAR/PAR</option>
	<option value="autogestion">BAR</option>
	</select></td>	<td><input type="date"  class="input__act" attrF="'+idPda[i]+'" attr="fechaInicio" /></td>
	<td><input type="date"  class="input__act" attrF="'+idPda[i]+'" attr="fechaFin" /></td>
	<td><input type="text"  class="input__act"  attrF="'+idPda[i]+'" attr="genero" /></td>
	<td><input type="text"  class="input__act" attrF="'+idPda[i]+'" attr="categoria" /></td>
	<td><input type="text"  class="input__act"  attrF="'+idPda[i]+'" attr="numeroEntreandores" /></td>
	<td><input type="text"  class="input__act"  attrF="'+idPda[i]+'" attr="numeroAtletas" /></td>
	<td><input type="text"  class="input__act" attrF="'+idPda[i]+'" attr="total" /></td>
	<td><input type="text"  class="input__act"  attrF="'+idPda[i]+'" attr="mBenefici" /></td>
	<td><input type="text"  class="input__act"  attrF="'+idPda[i]+'" attr="hBenefici" /></td>
	<td><input type="text"  class="input__act"  attrF="'+idPda[i]+'" attr="detalleBien" /></td>
	<td><input type="text"  class="input__act"  attrF="'+idPda[i]+'" attr="justificacionAd" /></td>
	<td><input type="text"  class="input__act" attrF="'+idPda[i]+'" attr="canitdarBie" /></td>
	<td><input type="text"  class="input__act"  attrF="'+idPda[i]+'" attr="enero" /></td>
	<td><input type="text"  class="input__act"  attrF="'+idPda[i]+'" attr="febrero" /></td>
	<td><input type="text"  class="input__act"  attrF="'+idPda[i]+'" attr="marzo" /></td>
	<td><input type="text"  class="input__act" attrF="'+idPda[i]+'" attr="abril" /></td>
	<td><input type="text"  class="input__act"  attrF="'+idPda[i]+'" attr="mayo" /></td>
	<td><input type="text"  class="input__act"  attrF="'+idPda[i]+'" attr="junio" /></td>
	<td><input type="text"  class="input__act"  attrF="'+idPda[i]+'" attr="julio" /></td>
	<td><input type="text"  class="input__act" attr="agosto"></td>
	<td><input type="text"  class="input__act" attrF="'+idPda[i]+'" attr="septiembre" /></td>
	<td><input type="text"  class="input__act"  attrF="'+idPda[i]+'" attr="octubre" /></td>
	<td><input type="text"  class="input__act"  attrF="'+idPda[i]+'" attr="noviembre" /></td>
	<td><input type="text"  class="input__act"  attrF="'+idPda[i]+'" attr="diciembre" /></td>
	<td><input type="text"  class="input__act"  attrF="'+idPda[i]+'" attr="totalElem" /></td>
	<td>
		<center><button class="eliminarPda'+idPda[i]+' btn btn-danger" attrF="'+idPda[i]+'" attr="'+idPda[i]+'"><i class="fas fa-trash"></i></button></center>
	</td>
</tr>
							</tbody>
						</table>
					</section>


				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-primary" onclick="guardar_personal_nuevo()">Guardar</button>
			</div>
		</div>
	</div>
</div>