<?php

class PessoaJuridica_model extends CI_Model
{

  public function get()
  {
    try {
      $query = $this->db->get('pessoa_juridica');
      if ($query)
      {
        return $query->result();
      }else{
        echo 'Não existem dados';
        return 0;
      }
    } catch (\Exception $e) {}
  }

  public function insert($data)
  {
		$this->db->insert('pessoa_juridica', $data);
		$id_pessoa_juridica = $this->db->insert_id();

        if($id_pessoa_juridica)
        {
            $dados['id_usuario'] = $this->session->userdata('user_login');
            $dados['tipo'] = 'insert';
            $dados['acao'] = 'Inserir';
            $dados['data'] = date('Y-m-d');
            $dados['hora'] = date('H:i:s');
            $dados['tabela'] = 'Pessoa Juridica';
            $dados['item_editado'] = $id_pessoa_juridica;
            $dados['descricao'] = $dados['id_usuario'] . ' Inseriu pessoa juridica ' . $dados['item_editado'];

            $this->relatorio->setLog($dados);
            return $id_pessoa_juridica;
        }
  }

  public function find($id)
  {
    try {
      $pessoa_juridica = $this->db->select('*')->from('pessoa_juridica')->where('id', $id)->get();
      if ($pessoa_juridica)
      {
        return $pessoa_juridica->result();
      }else{
        echo 'Pessoa Juridica não existe';
        return 0;
      }
    } catch (\Exception $e) {}
  }

  public function update($data)
  {
    try {
      $this->db->where('id_pessoa_juridica', $data['id_pessoa_juridica']);

      if($this->db->update('pessoa_juridica', $data))
  		{
  			return $data['id_pessoa_juridica'];
  		}else {
  			return 0;
  		}
    } catch (\Exception $e) {}
  }

  public function delete($id)
  {
    try {
      $this->db->where('id', $id);
      $this->db->delete('pessoa_juridica');
    } catch (\Exception $e) {}
  }


}
