<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CadastrarUsuario extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Cadastros_model', 'cadastrar');
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('cadastro_usuario_view');
		$this->load->view('footer');
	}

	public function cadastro()
	{
		$nome = $this->input->post('nome');
		$email = $this->input->post('email');
		$senha = $this->input->post('senha');

		$retorno = $this->cadastrar->cadastroUsuario($nome, $email, $senha);

		if ($retorno == true) {
			die(json_encode(['msg' => 'Usuário cadastrado com sucesso !!']));
		}

		die(json_encode(['error' => true, 'msg' => 'Email já cadastrado !!']));
	}
}
