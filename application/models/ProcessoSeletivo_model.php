<?php

class ProcessoSeletivo_model extends CI_Model
{
  public function get()
  {
    try {
      $query = $this->db->select('processo_seletivo.id_processo_seletivo, processo_seletivo.codigo, processo_seletivo.nome, processo_seletivo.id_vaga, processo_seletivo.data_inicio, processo_seletivo.descricao, processo_seletivo.data_fim, cargo.nome as nome_cargo, vaga.quantidade as vagas')
      ->from('processo_seletivo')
      ->join('vaga', 'vaga.id_vaga = processo_seletivo.id_vaga')
      ->join('cargo', 'cargo.id_cargo = vaga.id_cargo')
      ->get();
      if ($query)
      {
        return $query->result();
      }else{
        return 0;
      }
    } catch (\Exception $e) {}
  }

  public function getUltimos()
  {
    try {
      $query = $this->db->select('processo_seletivo.id_processo_seletivo, processo_seletivo.codigo, processo_seletivo.nome, processo_seletivo.id_vaga, processo_seletivo.data_inicio, processo_seletivo.descricao, processo_seletivo.data_fim, cargo.nome as nome_cargo, vaga.quantidade as vagas')
      ->from('processo_seletivo')
      ->join('vaga', 'vaga.id_vaga = processo_seletivo.id_vaga')
      ->join('cargo', 'cargo.id_cargo = vaga.id_cargo')->order_by('id_processo_seletivo','desc')
      ->get();
      if ($query)
      {
        return $query->result();
      }else{
        return 0;
      }
    } catch (\Exception $e) {}
  }

  public function insert($data)
  {
    $this->db->insert('processo_seletivo', $data);
    return $this->db->insert_id();

    // if($id_processo_seletivo)
    // {
    //     $dados['id_usuario'] = $this->session->userdata('user_login');
    //     $dados['tipo'] = 'insert';
    //     $dados['acao'] = 'Inserir';
    //     $dados['data'] = date('Y-m-d');
    //     $dados['tabela'] = 'Processo seletivo';
    //     $dados['item_editado'] = $id_processo_seletivo;
    //     $dados['descricao'] = $dados['id_usuario'] . ' Inseriu o processo seletivo ' . $dados['item_editado'] . ' na data de ' . $dados['data'];
    //
    //     $this->relatorio->setLog($dados);
    //       return $id_processo_seletivo;
    // } FIXME
  }

  public function find($id)
  {
    try {
      $processo_seletivo = $this->db->select('processo_seletivo.id_processo_seletivo,
      processo_seletivo.codigo,
      processo_seletivo.nome,
      processo_seletivo.id_vaga,
      processo_seletivo.data_inicio,
      processo_seletivo.descricao,
      processo_seletivo.data_fim,
      cargo.nome as nome_cargo')
      ->from('processo_seletivo')
      // ->join('etapa', 'etapa.id_processo_seletivo = processo_seletivo.id_processo_seletivo')
      ->join('vaga', 'vaga.id_vaga = processo_seletivo.id_vaga')
      ->join('cargo', 'cargo.id_cargo = vaga.id_cargo')
      ->where('id_processo_seletivo', $id)
      ->get();

      if ($processo_seletivo)
      {
        return $processo_seletivo->result();
      }else{
        echo 'Processo Seletivo não existe';
        return 0;
      }
    } catch (\Exception $e) {}
  }

  public function update($id, $data)
  {
    unset($data['id_etapa']);
    unset($data['descricao_etapa']);
    try {
		$this->db->where('id_processo_seletivo', $id);
		return $this->db->update('processo_seletivo', $data);

        // if($id_processo_seletivo)
        // {
        //     $dados['id_usuario'] = $this->session->userdata('user_login');
        //     $dados['tipo'] = 'update';
        //     $dados['acao'] = 'Atualizar';
        //     $dados['data'] = date('Y-m-d');
        //     $dados['tabela'] = 'Processo seletivo';
        //     $dados['item_editado'] = $id;
        //     $dados['descricao'] = $dados['id_usuario'] . ' Atualizou o processo seletivo ' . $dados['item_editado'] . ' na data de ' . $dados['data'];
        //
        //     $this->relatorio->setLog($dados);
        //     return $id_processo_seletivo;
        // }

		} catch (\Exception $e) {}
  }

  public function info($id)
  {
    try {
      $processo_seletivo = $this->db->select('processo_seletivo.id_processo_seletivo,
       processo_seletivo.data_fim, processo_seletivo.data_inicio, processo_seletivo.id_vaga,
       processo_seletivo.codigo, processo_seletivo.nome, processo_seletivo.descricao')
      ->from('processo_seletivo')
      ->where('id_processo_seletivo', $id)
      ->get();

      if($processo_seletivo)
      {
        return $processo_seletivo->result();
      }else {
        echo 'Processo Seletivo não existe';
        return 0;
      }
    } catch (\Exception $e) {

    }


  }
  public function delete($id)
  {
    try {
        $this->db->where('id_processo_seletivo', $id);
        $this->db->delete('etapa');
        $this->db->where('id_processo_seletivo', $id);
        $id_processo_seletivo = $this->db->delete('processo_seletivo');

        // if($id_processo_seletivo)
        // {
        //     $dados['id_usuario'] = $this->session->userdata('user_login');
        //     $dados['tipo'] = 'delete';
        //     $dados['acao'] = 'Deletar';
        //     $dados['data'] = date('Y-m-d');
        //     $dados['tabela'] = 'Processo seletivo';
        //     $dados['item_editado'] = $id;
        //     $dados['descricao'] = $dados['id_usuario'] . ' Deletou o processo seletivo ' . $dados['item_editado'] . ' na data de ' . $dados['data'];
        //
        //     $this->relatorio->setLog($dados);
        //     return $id_processo_seletivo;
        // } FIXME
    } catch (\Exception $e) {}
  }
}
