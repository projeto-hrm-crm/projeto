
<?php
class Fornecedor_model extends CI_Model
{
  public function get()
  {
    try {
      $query = $this->db->select('fornecedor.id_fornecedor, pessoa_juridica.id_pessoa_juridica, pessoa_juridica.razao_social, pessoa.id_pessoa, pessoa.nome, pessoa.email, telefone.numero AS telefone, documento.numero AS cnpj, endereco.cep, endereco.id_cidade, endereco.bairro, endereco.logradouro, endereco.numero AS numero, endereco.complemento',		'usuario.id_usuario')
  		->from('fornecedor')
      ->join('pessoa_juridica', 'pessoa_juridica.id_pessoa_juridica = fornecedor.id_pessoa_juridica')
      ->join('pessoa', 'pessoa.id_pessoa = pessoa_juridica.id_pessoa')
      ->join('usuario', 'pessoa.id_pessoa = usuario.id_pessoa')
  		->join('telefone', 'telefone.id_pessoa = pessoa.id_pessoa')
  		->join('documento', 'documento.id_pessoa = pessoa.id_pessoa')
  		->join('endereco', 'endereco.id_pessoa = pessoa.id_pessoa')
  		->get();
      if ($query)
      {
        return $query->result();
      }else{
        return 0;
      }
    } catch (\Exception $e) {}
  }
  public function getRazaoSocial(){
      $this->db->select('id_fornecedor, razao_social')
      ->join('pessoa_juridica' , 'fornecedor.id_pessoa_juridica = pessoa_juridica.id_pessoa_juridica');
      return $this->db->get('fornecedor')->result();
  }
  public function insert($data)
  {
    try {
      $cleaned = data_preparation($data);
      if($cleaned)
      {
        $id = $this->pessoa->insert($cleaned['pessoa']);
        $cleaned['documento']['id_pessoa'] = $id;
        $cleaned['telefone']['id_pessoa'] = $id;
        $cleaned['endereco']['id_pessoa'] = $id;
        $cleaned['pessoa_juridica']['id_pessoa'] = $id;
        $this->documento->insert($cleaned['documento']);
        $this->telefone->insert($cleaned['telefone']);
        $this->endereco->insert($cleaned['endereco']);
        $aux['id_pessoa_juridica'] = $this->pessoa_juridica->insert($cleaned['pessoa_juridica']);
        $this->db->insert('fornecedor', $aux);
        return $this->db->insert_id();
      }
    } catch (\Exception $e) {}
  }
  public function find($id)
  {
    try {
      $fornecedor = $this->db->select('fornecedor.id_fornecedor, pessoa_juridica.id_pessoa_juridica, pessoa_juridica.razao_social, pessoa.id_pessoa, pessoa.nome, pessoa.email, telefone.numero AS telefone, documento.numero AS cnpj, endereco.cep, endereco.id_cidade, endereco.bairro, endereco.logradouro, endereco.numero AS numero, endereco.complemento','usuario.id_usuario')
  		->from('fornecedor')
      ->join('pessoa_juridica', 'pessoa_juridica.id_pessoa_juridica = fornecedor.id_pessoa_juridica')
      ->join('pessoa', 'pessoa.id_pessoa = pessoa_juridica.id_pessoa')
      ->join('usuario', 'pessoa.id_pessoa = usuario.id_pessoa')
  		->join('telefone', 'telefone.id_pessoa = pessoa.id_pessoa')
  		->join('documento', 'documento.id_pessoa = pessoa.id_pessoa')
  		->join('endereco', 'endereco.id_pessoa = pessoa.id_pessoa')
      ->where('id_fornecedor', $id)
  		->get();
      if ($fornecedor)
      {
        return $fornecedor->result();
      }else{
        echo 'Fornecedor não existe';
        return 0;
      }
    } catch (\Exception $e) {}
  }
  public function update($id, $data)
  {
    try {
      $cleaned = data_preparation($data, $id);
      if($cleaned)
      {
        $id = $this->pessoa->update($cleaned['pessoa']);
        $cleaned['documento']['id_pessoa'] = $id;
        $cleaned['telefone']['id_pessoa'] = $id;
        $cleaned['endereco']['id_pessoa'] = $id;
        $cleaned['pessoa_juridica']['id_pessoa'] = $id;
        $this->documento->update($cleaned['documento']);
        $this->telefone->update($cleaned['telefone']);
        $this->endereco->update($cleaned['endereco']);
        $aux['id_pessoa_juridica'] = $this->pessoa_juridica->update($cleaned['pessoa_juridica']);
        $this->db->where('id_fornecedor', $id);
        if($this->db->update('fornecedor', $aux))
    		{
    			return $aux['id_fornecedor'];
    		}else {
    			return 0;
    		}
      }
    } catch (\Exception $e) {}
  }
  public function delete($id)
  {
    try {
      $this->db->where('id_fornecedor', $id);
      $id_fornecedor = $this->db->delete('fornecedor');

      if($id_fornecedor)
      {
        $this->relatorio->setLog('delete', 'Deletar', 'Fornecedor', $id_fornecedor, 'Deletou o fornecedor', $id);
      }
      return $id_fornecedor;
    } catch (\Exception $e) {}
  }
}
