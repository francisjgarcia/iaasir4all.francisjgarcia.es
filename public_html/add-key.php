<div class="modal fade" id="ssh-key" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Añadir clave SSH</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container">
					<form action="/server/add-key.php" method="POST" enctype="multipart/form-data" >
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-3 col-form-label">Nombre key</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="nombre_key" name="nombre_key" placeholder="Usuario" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputPassword3" class="col-sm-3 col-form-label">Subir key</label>
							<div class="col-sm-9">
								<input class="form-control" id="upload_key" name="upload_key" type="file" required>
							</div>
						</div>
						<div class="form-group row text-center">
							<div class="offset-sm-12 col-sm-12">
								<br>
								<button type="submit" class="btn btn-primary">Subir</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>