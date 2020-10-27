<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container">
					<form action="/server/login.php" method="POST">
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-3 col-form-label">Usuario</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputPassword3" class="col-sm-3 col-form-label">Contraseña</label>
							<div class="col-sm-9">
								<input type="password" class="form-control" id="clave" name="clave" placeholder="Contraseña">
							</div>
						</div>
						<div class="form-group row text-center">
							<div class="offset-sm-12 col-sm-12">
								<br>
								<button type="submit" class="btn btn-primary">Entrar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>