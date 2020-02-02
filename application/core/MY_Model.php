<?php

class MY_Model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function insert($tabela, $dados)
  {
    $this->db->insert($tabela, $dados);
    return $this->db->affected_rows();
  }

  public function update($tabela, $dados, $condicao)
  {
    $this->db->update($tabela, $dados, $condicao);
    return $this->db->affected_rows();
  }

  public function last_id()
  {
    return $this->db->insert_id();
  }

  public function delete($tabela, $condicao)
  {
    $this->db->delete($tabela, $condicao);
    return $this->db->affected_rows();
  }

  public function start_transaction()
  {
    $this->db->trans_start();
  }

  public function commit()
  {
    $this->db->trans_complete();
  }

  public function rollback()
  {
    $this->db->trans_rollback();
  }

  public function sql($sql, $parameters = array())
  {
    return $this->db->query($sql, $parameters);
  }

}