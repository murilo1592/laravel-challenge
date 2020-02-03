<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Cadastros_model', 'banco');
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('login_view');
		$this->load->view('footer');
	}

	public function login()
	{
		$email = $this->input->post('email');
		$senha = $this->input->post('senha');

		$login = $this->banco->login($email, $senha);

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			die(json_encode(['error' => true, 'msg' => 'Email no formato inválido!']));
		}

		if ($login == false) {
			echo json_encode(['error' => true,  'msg' => 'Usuário não encontrado !!']);
		} else {
			echo json_encode(['msg' => 'Usuário logado com sucesso !!']);
		}
	}

	//Recuperação de senha
	public function enviarEmail()
	{

		$email = $this->input->post('email');

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			die(json_encode(['error' => true, 'msg' => 'Email no formato inválido!']));
		}

		$result = $this->banco->buscarDadosUsuario($email);

		if ($result == true) {

			$token = rand(1, 999999);

			$this->banco->updateSenha($email, $token);

			$config = array(
				'protocol' => 'smtp',
				'smtp_host'    => 'ssl://smtp.googlemail.com',
				'smtp_port' => 465,
				'smtp_user'    => 'murilo928870@gmail.com',
				'smtp_pass' => '159223m1r5o9',
				'mailtype' => 'html',
				'set_crlf' => "\r\n",
				'charset' => 'utf-8',
				'wordwrap' => true
			);

			$this->load->library('email');
			$this->email->initialize($config);
			$this->email->set_newline("\r\n");
			$this->email->from('murilo928870@gmail.com', 'Gerar Nova Senha');
			$this->email->to($email);
			$this->email->subject('Recuperar Senha');

			$this->email->message("

			<br>
				<h3>
					Olá, seja bem-vindo
				</h3>
			<br>
			Este é um email exclusivamente para gerar nova senha, não responda a este email.

				<p>
					Esta é sua nova senha : ".$token." </a>
				</p>

				<p>
					Entre em sua conta e altere sua senha. </a>
				</p>

			<br>
				<h2>
					Atenciosamente.
				</h2>");

			if ($this->email->send()) {
				echo json_encode(['error' => false, 'msg' => 'Um novo email foi enviado para estes endereço! Verifique sua caixa.']);
			}
		} else {
			echo json_encode(['msg' => 'Email não encontrado!']);
		}
	}


	public function  sair()
	{
		$this->session->sess_destroy();
		echo true;
	}
}
