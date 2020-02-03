<script src="<?= base_url('assets/js/jquery.js'); ?>"></script>
<script src="<?= base_url('assets/js/pooper.js'); ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/sweetalert2/sweetalert2.js'); ?>"></script>

<script>
	$(document).ready(function() {

		$('#btn-login').click(function() {

			if ($('#txtEmailLogin').val() == '') {
				loginInvalid('Campo email vazio !!');
				return;
			}

			if ($('#txtSenhaLogin').val() == '') {
				loginInvalid('Campo senha vazio !!');
				return;
			}

			$('#btn-login').text('aguarde...').addClass('disabled');
			$.post('<?= base_url('Login/login'); ?>', {
				email: $('#txtEmailLogin').val(),
				senha: $('#txtSenhaLogin').val()
			}, function(retorno) {

				if (retorno.error == true) {
					$('#btn-login').text('Entrar').removeClass('disabled');
					loginInvalid(retorno.msg);
				} else {

					setTimeout(() => {
						window.location.replace("<?= base_url('Login'); ?>");
					}, '5000');


				}

			}, 'json');

		});

		$('#btn-cad-user').click(function() {

			if ($('#txtNomeCad').val() == '') {
				loginInvalid('Campo nome vazio !!');
				return;
			}

			if ($('#txtEmailLCad').val() == '') {
				loginInvalid('Campo email vazio !!');
				return;
			}

			if ($('#txtSenhaCad').val() == '') {
				loginInvalid('Campo senha vazio !!');
				return;
			}

			$('#btn-cad-user').text('aguarde...').addClass('disabled');
			$.post('<?= base_url('CadastrarUsuario/cadastro'); ?>', {
				nome: $('#txtNomeCad').val(),
				email: $('#txtEmailLCad').val(),
				senha: $('#txtSenhaCad').val()
			}, function(retorno) {

				if (retorno.error == true) {

					setTimeout(() => {
						$('#btn-cad-user').text('Cadastrar').removeClass('disabled');
						loginInvalid(retorno.msg);
					}, '900');


				} else {

					setTimeout(() => {
						loginValid(retorno.msg);
					}, '900');

					setTimeout(function() {
						window.location.replace("<?= base_url('Login'); ?>");
					}, '900');



				}

			}, 'json');

		});

		$('#btn_recuperar_senha').click(function() {
			if ($('#txt_email_rec').val() == '') {
				loginInvalid('Campo email vazio !!');
				return;
			}

			$('#btn_recuperar_senha').text('aguarde...').addClass('disabled');

			setTimeout(() => {
				$.post('<?= base_url('Login/enviarEmail'); ?>', {
					email: $('#txt_email_rec').val()
				}, function(retorno) {

					if (retorno.error == false) {
						$('#btn_recuperar_senha').text('Enviar').removeClass('disabled');
						loginValid(retorno.msg);

					} else {
						$('#btn_recuperar_senha').text('Enviar').removeClass('disabled');
						loginInvalid(retorno.msg);
					}

				}, 'json');
			}, '900');
		});

	});

	function loginValid(campo) {
		Swal.fire({
			title: 'Tudo certo!',
			text: campo,
			type: 'success',
			confirmButtonText: 'Fechar'
		});
	}

	function loginInvalid(campo) {
		Swal.fire({
			title: 'Atenção',
			text: campo,
			type: 'error',
			confirmButtonText: 'Fechar'
		});
	}

	function sair() {

		if (confirm('Deseja realmente sair?')) {
			$.post('<?= base_url('Login/sair'); ?>', {},
				function(data) {
					if (data) {
						window.open("<?= base_url('Login'); ?>", "_self");
					}
				});
		};
	}
</script>

</body>

</html>