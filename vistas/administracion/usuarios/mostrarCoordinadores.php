<?php
        $coordinadorCtr = new ControladorCoordinadores();
		$informacion= new ControladorUsuarioInformacion();
		$coordinadores=$coordinadorCtr->ctrRellenarTablaCoordinador();
				 if(!empty($coordinadores)){
					?>
					<div class="tablaResposive" >
					<table class="table table-bordered">
						<thead class="tituloTabla">
							<tr>
								<th>Id</th>
								<th>Usuario</th>
								<th>Correo</th>
								<th>Fecha Creación</th>
								<th>Editar</th>
								<th>Eliminar</th>
								<th>Información</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($coordinadores as $coordinador) { ?>
								<tr>
									<td><?php echo $coordinador["id"] ?></td>
									<td><?php echo $coordinador["usuario"] ?></td>
									<td><?php echo $coordinador["correo"] ?></td>
									<td><?php echo $coordinador["fecha_creacion"] ?></td>
									
									<td>
									<button type="button" class="btn btn-warning text-white" data-toggle="modal" data-target="#ModalActualizarCoordinador" 
									onclick="llenarValoresCoordinadores(<?php echo $coordinador['id'] ?>, '<?php echo $coordinador['usuario'] ?>','<?php echo $coordinador['correo'] ?>')"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></button>
			
									</td>
									<td>
									<form method="post">
										<input type="hidden" value="<?php echo $coordinador["id"] ?>" name="idCoordinador">
										<button type="submit" class="btn btn-danger" onclick="return confirm('Si eliminas el usuario se eliminaran la información personal y sus ponencias, ¿Deseas continuar?');"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></button>
										<?php $coordinadorCtr->ctrELiminarCoordinador()?> 
									</form>
										
										

									</td>
									<td>
											<?php $usuarioInformacion=$informacion->ctrConsultarInformacion($coordinador['id'])?>
											<?php if(!empty($usuarioInformacion)){?>
												<form method="post" action="informacion">
													<input type="hidden" value="<?php echo $coordinador["id"] ?>" name="idUsuarioInfomacion" >
													<button type="submit" class="btn btn-success"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></button>
												</form>
											<?php }else{?>
												<button class="btn btn-success text-white" data-toggle="modal" data-target="#registrarInformacion" onclick="llenarId(<?php echo $coordinador['id'] ?>,'coordinador')"> 
												<i class="fa fa-upload fa-lg" aria-hidden="true"></i>
												</button>
											<?php }?>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<?php
				
				 }else{
					?>
						<div class="border border-warning alert alert-dismissible fade show col-md-5 mx-auto rounded" style="background-color: rgba(255, 193, 0,0.5); border-width:5px !important;" role="alert">
						<i class="fa fa-exclamation-triangle fa-lg"></i>
						<h4 class="alert-heading text-dark text-center" > <kbd>Sin registros!</kbd></h4>
						<p class="text-dark">Pero no te preocupes, registra un coordinador y lo mostraremos :)</p>
						<hr>

						<p class="mb-0 text-dark text-right"><i class="fa fa-hand-o-right fa-lg"></i> Usa el botón verde</p>
				
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						</div>

					<?php
					
				 }
				 

?>
							
<div class="modal fade" id="ModalActualizarCoordinador" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header tituloTabla">
			<img src="vistas/img/icono.png" class="img-fluid" style="max-width: 7%;" >
		<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		</div>
		<div class="modal-body">
		
		<form method="post">
			<input type="hidden" name="idCoor" id="idCoordinador">
			<div class="form-group">
				<label for="usuario" class="col-form-label">Usuario:</label>
				<input type="text" class="form-control form-control-sm" id="usuarioAC" name="usuarioAC" required>
			</div>
			<div class="form-group">
                  <label for="usuario" class="col-form-label">Correo:</label>
                  <input type="email" class="form-control form-control-sm" id="correoAC" name="correoAC" required>
            </div>

			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar <i class="fa fa-window-close-o" aria-hidden="true"></i></button>
				<button type="submit" class="btn btn-success">Actualizar <i class="fa fa-plus-square" aria-hidden="true"></i></button>
			</div>

			<?php
			$coordinadorCtr -> ctrActualizarCoordinador();
			?>
		</form>
		</div>

	</div>
	</div>
</div>

