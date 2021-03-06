<?php
class Cadastros_model extends My_model
{
    function __construct()
    {
        parent::__construct();
    }

    //CADASTRAR USUÁRIOS
    public function cadastroUsuario($nome, $email, $senha)
    {

        $dados = [
            'nome' => $nome,
            'email' => $email,
            'senha' => md5($senha)
        ];
        $sql = $this->db->query("SELECT email from usuario where email = ?", [$email])->row();

        if (empty($sql))
            return $this->insert('usuario', $dados);

        return false;
    }

    //Atualizar dados do Usuário
    // public function atualizarDadosUsuario($dados, $id)
    // {
    //     return $this->update('public.usuario', $dados, ['id' => $id]);
    // }

    public function login($email, $senha)
    {

        $result = $this->db->query("SELECT * FROM usuario
                    WHERE email = ? AND senha = ?", [$email, md5($senha)])->row();

        if ($result) {
            $this->session->set_userdata('id', $result->id);
            $this->session->set_userdata('nome', $result->nome);
            $this->session->set_userdata('email', $result->email);
            $this->session->set_userdata('senha', $result->senha);

            return true;
        }

        return false;
    }

    //Buscar dados do usuário pelo email
    public function buscarDadosUsuario($email)
    {
        $sql = $this->db->query("SELECT * FROM usuario
                                    WHERE email = ?", [$email])->row();
        if (empty($sql))
            return false;
        else
            return true;
    }

    public function updateSenha($email, $senha)
    {
        $dados = ['senha' => md5($senha)];
        $this->update('usuario', $dados, ['email' => $email]);
        return true;
    }

    public function cadastrarEvento($dados)
    {
        return $this->insert('eventos', $dados);
    }

    public function atualizarEvento($dados, $id = null)
    {
        $this->update('eventos', $dados, ['id' => $id]);
    }

    public function listaEventos($offset = 0)
    {
        $sql = "SELECT * FROM eventos";
        config_pagination($this, $sql, $offset);
		return $this->db->query($sql . ' LIMIT ' . $this->ajax_pagination->per_page . ' OFFSET ' . $this->ajax_pagination->cur_page)->result();
    }

    public function excluirEvento($id)
    {
        return $this->db->query("DELETE FROM eventos WHERE id = ?", [$id]);
    }

    public function buscarEvento($id)
    {
        return $this->db->query("SELECT * FROM eventos WHERE id = ?", [$id])->row();
    }
}
