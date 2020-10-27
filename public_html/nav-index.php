<span id="inicio"></span>
<nav class="navbar navbar-expand-lg navbar-light fixed-top fjg-nav">

	<div class="container fjg-nav-flex">

		<a class="navbar-brand" href="/">
			<img src="/images/logo.png" alt="IaaSIR4ALL">
		</a>

		<button class="navbar-toggler fjg-nav-menu-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<div class="cta">
				<div class="toggle-btn type10"></div>
			</div>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">

			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#inicio">Inicio</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#herramientas">Herramientas</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#servicios">Servicios</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#sobre-mi">Sobre mí</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#contacto">Contacto</a>
				</li>
				<?php if(!isset($_SESSION["iniciada"])){?>
					<li class="nav-item fjg-login-btn">
						<button type="button" class="btn btn-sm btn-primary btn-login" data-toggle="modal" data-target="#login"><span class="glyphicon glyphicon-log-in"></span> Entrar</button>
					</li>
					<li class="nav-item fjg-login-btn">
						<button type="button" class="btn btn-sm btn-secondary btn-registro" data-toggle="modal" data-target="#registro"><span class="glyphicon glyphicon-log-in"></span> Registro</button>
					</li>
				<?php } ?>
			</ul>

			<?php if(isset($_SESSION["iniciada"]) && $_SESSION["iniciada"] = true){?>
				<div class="pull-right">
					<ul class="nav pull-right fjg-user">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<?=$_SESSION["nombre"]?> <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li class="fjg-btn-dash"><a href="/dashboard"><i class="icon-cog"></i> Dashboard</a></li>
									<li>
										<button type="button" class="btn btn-danger btn-block" style="border-radius: 0 !important" data-toggle="modal" data-target="#logout">
											Cerrar sesión
										</button>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			<?php } ?>
		</div>
	</nav>

	<?php include('./mensaje-login.php') ?>
	<?php include('./mensaje-registro.php') ?>
	<?php include('./mensaje-logout.php') ?>