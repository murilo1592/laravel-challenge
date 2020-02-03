<main class="login-form">
	<div class="cotainer">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">Login</div>
					<div class="card-body">
						<div class="form-group row">
							<label for="txtEmailLogin" class="col-md-4 col-form-label text-md-right">Email</label>
							<div class="col-md-6">
								<input type="text" id="txtEmailLogin" class="form-control" required autofocus>
							</div>
						</div>

						<div class="form-group row">
							<label for="txtSenhaLogin" class="col-md-4 col-form-label text-md-right">Senha</label>
							<div class="col-md-6">
								<input type="password" id="txtSenhaLogin" class="form-control" required>
							</div>
						</div>

						<div class="col-md-6 offset-md-4">
							<button class="btn btn-primary btn-sm" style="width:100%;" id="btn-login">
								Entrar
							</button>
							<a href="#" class="btn btn-link" data-toggle="modal" data-target="#alterarSenha">
								Esqueci minha senha
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>

</main>

<div class="modal fade" id="alterarSenha" tabindex="-1" role="dialog" aria-labelledby="alterarSenha" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Recuperar senha</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
					<div class="form-group">
						<label for="txt_email_rec" class="col-form-label">Email:</label>
						<input type="text" class="form-control" id="txt_email_rec">
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Fechar</button>
				<button type="button" class="btn btn-primary btn-sm" id="btn_recuperar_senha">Enviar</button>
			</div>
		</div>
	</div>
</div>