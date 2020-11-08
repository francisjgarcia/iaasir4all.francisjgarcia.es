<?php include('./wrapper.php') ?>
<nav class="navbar navbar-expand-lg navbar-light fixed-top fjg-nav-dashboard">

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
			</ul>

			<div class="pull-right">
				<ul class="nav pull-right fjg-user">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="border-left: none !important">
							<?=$_SESSION["nombre"]?> <b class="caret"></b>
						</a>

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

	</div>

</nav>


<div class="separador"></div>

<?php include('./mensaje-logout.php') ?>