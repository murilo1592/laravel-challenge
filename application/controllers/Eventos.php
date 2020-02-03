<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Eventos extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Cadastros_model', 'banco');
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('eventos_view');
		$this->load->view('footer');
	}

	public function cadastrarEvento()
	{
		$dados = [
			'titulo' => $this->input->post('titulo'),
			'data_inicio' => $this->input->post('data_inicio'),
			'data_termino' => $this->input->post('data_inicio'),
			'hora_inicio' => $this->input->post('hora_inicio'),
			'hora_termino' => $this->input->post('hora_termino'),
			'descricao' => $this->input->post('descricao')
		];

		$this->banco->cadastrarEvento($dados);
		echo json_encode(['msg' => 'Evento criado com sucesso !!']);
	}

	public function listaEventos()
	{
		$offset = $this->input->post('page');
		$eventos = $this->banco->listaEventos($offset);
		$html = '';

		foreach ($eventos as $evento) {

			$data = explode("/", $evento->data_inicio);
			$data_inicio = $data[1] . '/' . $data[0] . '/' . $data[2];

			$data = explode("/", $evento->data_termino);
			$data_termino = $data[1] . '/' . $data[0] . '/' . $data[2];


			$html .= "<tr>
			<td>{$evento->titulo}</td>
			<td>{$data_inicio} {$evento->hora_inicio}</td>
			<td>{$data_termino} {$evento->hora_termino}</td>
			<td>
				<div class='dropdown'>
					<button class='btn btn-primary btn-sm dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
						Executar
					</button>
					<div class='dropdown-menu' aria-labelledby='dropdownMenuButton' style='cursor:pointer;'>
						<div class='dropdown-item' onclick='alterarEvento(".$evento->id.", \"{$evento->descricao}\", \"{$evento->titulo}\", ".$data_inicio.", ".$data_termino.", \"{$evento->hora_inicio}\", \"{$evento->hora_termino}\")' data-toggle='modal' data-target='#alterarEvento'>Alterar</div>
						<div class='dropdown-item' onclick='convidarAmigo(".$evento->id.")' data-toggle='modal' data-target='#convidarAmigo'>Convidar Amigos</div>
						<div class='dropdown-item' onclick='maisDetalhes(\"{$evento->descricao}\", \"{$evento->titulo}\")' data-toggle='modal' data-target='#detalhesEventos'>Mais Detalhes</div>
						<div class='dropdown-item' onclick='excluirEvento(".$evento->id.")'>Excluir</div>
					</div>
				</div>
			</td>
		</tr>";
		}

		echo json_encode(['html' => $html, 'paginacao' => $this->ajax_pagination->create_links()]);
	}

	public function alterarEvento()
	{
		$dados = [
			'titulo' => $this->input->post('titulo'),
			'data_inicio' => $this->input->post('data_inicio'),
			'data_termino' => $this->input->post('data_inicio'),
			'hora_inicio' => $this->input->post('hora_inicio'),
			'hora_termino' => $this->input->post('hora_termino'),
			'descricao' => $this->input->post('descricao')
		];

		$id = $this->input->post('id');

		$this->banco->atualizarEvento($dados, $id);
		echo json_encode(['msg' => 'Evento alterado com sucesso !!']);

	}

	public function excluirEventos()
	{
		$id = $this->input->post('id');
		$teste = $this->banco->excluirEvento($id);
		echo json_encode(['msg' => 'Evento excluído com sucesso !!']);
	}

	public function convidarAmigos()
	{

		$id = $this->input->post('id');
		$email = $this->input->post('email');

		// if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		// 	die(json_encode(['error' => true, 'msg' => 'Email no formato inválido!']));
		// }

		$result = $this->banco->buscarEvento($id);

		$data = explode("/", $result->data_inicio);
		$data_inicio = $data[1] . '/' . $data[0] . '/' . $data[2];

		$data = explode("/", $result->data_termino);
		$data_termino = $data[1] . '/' . $data[0] . '/' . $data[2];

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
		$this->email->from('murilo928870@gmail.com', 'Convite');
		$this->email->to($email);
		$this->email->subject('Recuperar Senha');

		$this->email->message("

			<br>
				<h3>
					Olá
				</h3>
			<br>
			Você recebeu u convite para o evento: " . $result->titulo . "

				<p>
					Horário de início : "  . $data_inicio . ' ' . $result->hora_inicio . " </a>
				</p>

				<p>
				Horário de término : "  . $data_termino . ' ' . $result->hora_termino . " </a>
				</p>

			<br>
				<h2>
					Atenciosamente.
				</h2>");

		if ($this->email->send())
			echo json_encode(['msg' => 'Convite enviado com sucesso !!']);
	}
}
