<script src="<?= base_url('assets/js/jquery.js'); ?>"></script>
<script src="<?= base_url('assets/js/pooper.js'); ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/sweetalert2/sweetalert2.js'); ?>"></script>
<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
<script src="<?= base_url('assets/hora-plugin/wickedpicker.min.js'); ?>"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script>
	$(document).ready(function() {
		listaEventos();
		$('.timepicker').timepicker();
		$(".calendario").datepicker({
			dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'],
			dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
			dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
			monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
			monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']
		});
		$('#cadastroEventos').hide();
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
						window.location.replace("<?= base_url('Eventos'); ?>");
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

		$('#btn_convidar_amigos').click(function() {
			if ($('#txt_email_convidar').val() == '') {
				loginInvalid('Digite um email !!');
				return;
			}

			$('#btn_convidar_amigos').text('aguarde...').addClass('disabled');
			$.post('<?= base_url('Eventos/convidarAmigos'); ?>', {
				id: $('#evento_id').text(),
				email: $('#txt_email_convidar').val()

			}, function(retorno) {
				$('#btn_convidar_amigos').text('Enviar').removeClass('disabled');
				loginValid(retorno.msg);

			}, 'json');
		});

		$('#selectEvento').change(function(){
			var filtro = $('#selectEvento').val();
			$.post('<?=base_url('Eventos/filtrarEvento');?>', {
				filtro
			}, 'json');
		});

	});

	function maisDetalhes(descricao, titulo) {
		$('.titulo').html(titulo);
		$('.descricao').text(descricao);
	}

	function alterarEvento(id, descricao, titulo, data_inicio, data_termino, hora_inicio, hora_termino) {
		$('#txtTitulo_update').val(titulo);
		$('#txtHoraInicio_update').val(hora_inicio);
		$('#txtHoraTermino_update').val(hora_termino);
		$('#txtDescricao_update').val(descricao);
		$('.evento_id').text(id);
	}

	function btn_alterar_evento() {

		if ($('#txtTitulo_update').val() == '') {
			loginInvalid('Digite o título !!');
			return;
		}

		if ($('#txtDataInicio_update').val() == '') {
			loginInvalid('Digite a data de início !!');
			return;
		}

		if ($('#txtDataTermino_update').val() == '') {
			loginInvalid('Digite a data de término !!');
			return;
		}

		if ($('#txtDescricao_update').val() == '') {
			loginInvalid('Digite a descrição vazia !!');
			return;
		}

		if ($('#txtHoraInicio_update').val() == '') {
			loginInvalid('Digite a hora de início !!');
			return;
		}

		if ($('#txtHoraTermino_update').val() == '') {
			loginInvalid('Digite a hora de término !!');
			return;
		}
		$.post('<?= base_url('Eventos/alterarEvento'); ?>', {
			id: $('.evento_id').text(),
			titulo: $('#txtTitulo_update').val(),
			data_inicio: $('#txtDataInicio_update').val(),
			data_termino: $('#txtDataTermino_update').val(),
			hora_inicio: $('#txtHoraInicio_update').val(),
			hora_termino: $('#txtHoraTermino_update').val(),
			descricao: $('#txtDescricao_update').val()
		}, function(retorno) {
			loginValid(retorno.msg);
			listaEventos();

		}, 'json');

	}

	function cadastrarEvento() {
		if ($('#txtTitulo').val() == '') {
			loginInvalid('Digite o título !!');
			return;
		}

		if ($('#txtDataInicio').val() == '') {
			loginInvalid('Digite a data de início !!');
			return;
		}

		if ($('#txtDataTermino').val() == '') {
			loginInvalid('Digite a data de término !!');
			return;
		}

		if ($('#txtDescricao').val() == '') {
			loginInvalid('Digite a descrição vazia !!');
			return;
		}

		if ($('#txtHoraInicio').val() == '') {
			loginInvalid('Digite a hora de início !!');
			return;
		}

		if ($('#txtHoraTermino').val() == '') {
			loginInvalid('Digite a hora de término !!');
			return;
		}
		$.post('<?= base_url('Eventos/cadastrarEvento'); ?>', {
			titulo: $('#txtTitulo').val(),
			data_inicio: $('#txtDataInicio').val(),
			data_termino: $('#txtDataTermino').val(),
			hora_inicio: $('#txtHoraInicio').val(),
			hora_termino: $('#txtHoraTermino').val(),
			descricao: $('#txtDescricao').val()
		}, function(retorno) {
			loginValid(retorno.msg);

			setTimeout(() => {
				location.reload();
			}, '1000');
			

		}, 'json');
	}

	function listaEventos(page) {
		$.post('<?= base_url('Eventos/listaEventos'); ?>', {
			page
		}, function(retorno) {

			$('.tabelaEvento').html(retorno.html);
			$('.paginacao').html(retorno.paginacao);

		}, 'json');
	}

	function excluirEvento(id) {
		$.post('<?= base_url('Eventos/excluirEventos'); ?>', {
			id
		}, function(retorno) {

			loginValid(retorno.mag);
			listaEventos();

		}, 'json');
	}

	function convidarAmigo(id) {
		$('#evento_id').html(id);
	}

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

	function mostrarCadastro() {
		$('#listaEventos').hide();
		$('#cadastroEventos').show();
	}

	function mostrarLista() {
		$('#cadastroEventos').hide();
		$('#listaEventos').show();
		listaEventos();

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