<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Eventos</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
	<!-- <link rel="stylesheet" href="<?= base_url('assets/css/select2-bootstrap.css'); ?>"> -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
		<div class="container">
			<a class="navbar-brand" href="#">Eventos</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">

						<?php if (!empty($this->session->userdata('id'))) {
						?>

							<div class="dropdown">
								<button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="fas fa-user-circle"></i> <?php echo ucfirst(strtolower($this->session->userdata('nome'))); ?>
								</button>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="cursor:pointer;">
									<div class="dropdown-item" data-toggle="modal" data-target="#alterarPerfil">Configurações</div>
									<div class="dropdown-item" onclick="sair()">Sair</div>
								</div>
							</div>

						<?php } else { ?>

							<a class="nav-link" href="<?= base_url('Login'); ?>">Login</a>

						<?php } ?>

					</li>

					<?php if (empty($this->session->userdata('id'))) {
					?>
						<li class="nav-item">
							<a class="nav-link" href="<?= base_url('CadastrarUsuario'); ?>">Cadastre-se</a>
						</li>

					<?php } ?>
				</ul>

			</div>
		</div>
	</nav>

	<div class="modal fade" id="alterarPerfil" tabindex="-1" role="dialog" aria-labelledby="alterarPerfil" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-circle"></i> Alterar meu perfil</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Nome:</label>
						<input type="text" class="form-control" id="recipient-name">
					</div>
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Email:</label>
						<input type="text" class="form-control" id="recipient-name">
					</div>
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Mudar Senha:</label>
						<input type="text" class="form-control" id="recipient-name">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Fechar</button>
					<button type="button" class="btn btn-primary btn-sm">Enviar</button>
				</div>
			</div>
		</div>
	</div>