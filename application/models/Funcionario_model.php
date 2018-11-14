<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Funcionario_model extends CI_Model {

	/**
	 * @author: Camila Sales
     *
	 * Salva o registro de funcionario associado à uma pessoa fisica
	 *
	 * @param array $data
     * @return int
	*/
	public function insert($data)
	{
        $id_pessoa = $this->pessoa->insert([
            'nome'  => $data['nome'],
            'email' => $data['email']
        ]);

        $this->usuario->insert([
            'login'             => $data['nome'],
            'senha'             => substr(md5(date('r')), 0, 10), /*essa é a forma correta para todo e qualquer usuário. Gerar uma senha qualquer e depois ele muda. */
            'id_grupo_acesso'   => 6,
            'id_pessoa'         => $id_pessoa
        ]);


        $this->endereco->insert([
            'cep'           => $data['cep'],
            'bairro'        => $data['bairro'],
            'logradouro'    => $data['logradouro'],
            'numero'        => $data['numero'],
            'complemento'   => $data['complemento'],
            'id_pessoa'     => $id_pessoa,
            'estado'        => $data['estado'],
            'cidade'        => $data['cidade']]);

        $this->documento->insert([
            'tipo'      => 'cpf',
            'numero'    => $data['cpf'],
            'id_pessoa' => $id_pessoa]);

        $this->telefone->insert([
            'numero'    => $data['tel'],
            'id_pessoa' => $id_pessoa]);

        $id_pessoa_fisica = $this->pessoa_fisica->insert([
            'data_nascimento'   => switchDate($data['data_nacimento']),
            'sexo'              =>$data['sexo'],
            'id_pessoa'         =>$id_pessoa]);

        $this->session->set_flashdata('success', 'Funcionario Cadastrado Com Sucesso!');

        $this->db->insert('funcionario', ['id_pessoa' => $id_pessoa]);
        $id_funcionario = $this->db->insert_id();

        if($id_funcionario)
            $this->relatorio->setLog('insert', 'Inserir', 'Funcionario', $id_funcionario, 'Inseriu o funcionario', $id_funcionario);

        return $id_funcionario;
	}

    /**
     * @author Pedro Henrique Guimarães
     *
     * Méotoodo responsável por atualizar os dados de um determinado usuário, baseado em seu id único.
     * O método utilizará outros models devido a necessidade de modificar outras tabelas que possuem ligação com funcionário.
     *
     * @param $id_funcionario
     * @return boolean
     */
	public function update($id_funcionario, $data)
    {
        //TODO descobrir o problema ao editar a data e ela ficar 00/00/0000

        $funcionario = $this->funcionario->getById($id_funcionario);

        if (!$this->pessoa->update(
            [
            'id_pessoa' => $funcionario[0]->id_pessoa,
            'nome'  => $data['nome'],
            'email' => $data['email']
            ]
        )) {
            $this->session->set_flashdata('success', 'Funcionario Atualizado Com Sucesso!');
            redirect(base_url('cliente/editar'));
            return;
        }

        $this->endereco->update([
            'cep'           => $data['cep'],
            'bairro'        => $data['bairro'],
            'logradouro'    => $data['logradouro'],
            'numero'        => $data['numero'],
            'complemento'   => $data['complemento'],
            'id_pessoa'     => $funcionario[0]->id_pessoa,
            'estado'        => $data['estado'],
            'cidade'        => $data['cidade']]);

        $this->documento->update([
            'tipo'      => 'cpf',
            'numero'    => $data['cpf'] ,
            'id_pessoa' => $funcionario[0]->id_pessoa]);

        $this->telefone->update([
            'numero'    =>$data['tel'],
            'id_pessoa' => $funcionario[0]->id_pessoa]);

        $this->pessoa_fisica->update($funcionario[0]->id_pessoa,[
            'data_nascimento'   => switchDate($data['data_nascimento']),
            'sexo'              => $data['sexo']]);

        $this->session->set_flashdata('success', 'Funcionario Atualizado Com Sucesso!');

        redirect('funcionario');
    }


    /**
     * @author Pedro Henrique Guimarães
     *
     * Método responsável por retornar todos os funcionários.
     *
     * @return mixed
     */

	public function get()
	{
	    $this->db->select('*')
                 ->from('pessoa as p')
                 ->join('pessoa_fisica as pf', 'p.id_pessoa = pf.id_pessoa')
                 ->join('funcionario as f', 'pf.id_pessoa = f.id_pessoa');
	    $result = $this->db->get();

	    if ($result->num_rows() > 0)
	        return $result->result();

		return null;
    }

    /**
     * @author Camila Sales
     *
     * Busca os dados do funciońario pelo id único dele.
     *
     * @param int $id_funcionario
     * @return int
     */
    public function getById($id_funcionario)
    {
        try {
            $funcionario = $this->db->select("
            pessoa.id_pessoa,
            pessoa.nome,
            pessoa.email,
            pessoa_fisica.sexo,
            pessoa_fisica.data_nascimento,
            endereco.cep,
            endereco.bairro,
            endereco.logradouro,
            endereco.numero AS numero_endereco,
            endereco.complemento,
            endereco.estado,
            endereco.cidade,
            documento.numero AS numero_documento,
            telefone.numero AS telefone,
            'usuario.id_usuario',
            cargo_funcionario.id_cargo as id_cargo,
            ")
            ->from("pessoa")
            ->join('pessoa_fisica', 'pessoa.id_pessoa = pessoa_fisica.id_pessoa')
            ->join('funcionario', 'pessoa_fisica.id_pessoa = funcionario.id_pessoa')
            ->join('endereco',  'pessoa.id_pessoa = endereco.id_pessoa')
						->join('usuario', 'pessoa.id_pessoa = usuario.id_pessoa')
            ->join('documento', 'pessoa.id_pessoa = documento.id_pessoa')
            ->join('telefone',  'pessoa.id_pessoa = telefone.id_pessoa')
            ->join('cargo_funcionario', 'funcionario.id_funcionario = cargo_funcionario.id_funcionario')
            ->where('funcionario.id_funcionario', $id_funcionario)->where('cargo_funcionario.deletado is null')->get();

            if ($funcionario) {
                return $funcionario->result();
            }else {
                echo 'Candidato não existe';
                return 1;
            }

        } catch (\Exception $e) {}
    }
	/**
	 * @author: Camila Sales
	 * Remove o registro de funcionario associado à uma pessoa fisica
	 *
	 * @param int $id
     * @return int
	*/
	public function remove($id)
	{
		try {
			$this->db->where('id_funcionario', $id);
			$id_funcionario = $this->db->delete('funcionario');

			if($id_funcionario) {
				$this->relatorio->setLog('delete', 'Deletar', 'Funcionario', $id_funcionario, 'Deletou o funcionario', $id);
			}
			return $id_funcionario;
	    } catch (\Exception $e) {}
			// delete pessoa fisica;
    }

    /**
    * @author: Pedro Henrique
    * Método responsável por contar o total de funcionários
    *
    * @param void
    * @return int
    */

    public function count()
    {
        $this->db->select('count(*) as funcionarios')
                 ->from('pessoa as p')
                 ->join('pessoa_fisica as pf', 'p.id_pessoa = pf.id_pessoa')
                 ->join('funcionario as f', 'pf.id_pessoa = f.id_pessoa');
        $result = $this->db->get();
        return $result->result()[0]->funcionarios;
    }

		public function getDadosFuncionario()
		{
			try {
				$query = $this->db->select("
				pessoa.id_pessoa,
				pessoa.nome,
				pessoa.imagem,
				pessoa.email,
				pessoa_fisica.sexo,
				pessoa_fisica.data_nascimento,
				endereco.cep,
				endereco.bairro,
				endereco.logradouro,
				endereco.numero AS numero_endereco,
				endereco.complemento,
				endereco.cidade,
				endereco.estado,
				documento.numero AS numero_documento,
				telefone.numero AS telefone,
				usuario.id_usuario")
				->from("pessoa")
				->join('pessoa_fisica', 'pessoa.id_pessoa = pessoa_fisica.id_pessoa')
				->join('usuario', 'pessoa.id_pessoa = usuario.id_pessoa')
				->join('funcionario', 'pessoa_fisica.id_pessoa = funcionario.id_pessoa')
				->join('endereco',  'pessoa.id_pessoa = endereco.id_pessoa')
				->join('documento', 'pessoa.id_pessoa = documento.id_pessoa')
				->join('telefone',  'pessoa.id_pessoa = telefone.id_pessoa');
			} catch (\Exception $e) {}

			if ($query){
				return $query->get()->result();
			}else{
				echo 'Não existem dados';
				exit;
			}
		}

		public function getCargos($id_funcionario){

        $cargo_funcionario =  $this->db->select(
           'cargo_funcionario.id_cargo_funcionario,cargo_funcionario.deletado,
            funcionario.id_funcionario,
            pessoa.nome AS pessoa,
            setor.nome AS setor, setor.id_setor,
            cargo.id_cargo, cargo.nome'
        )->from('cargo_funcionario')
        ->join('funcionario', 'cargo_funcionario.id_funcionario = funcionario.id_funcionario')
        ->join('pessoa', 'funcionario.id_pessoa = pessoa.id_pessoa')
        ->join('cargo', 'cargo_funcionario.id_cargo = cargo.id_cargo')
        ->join('setor', 'cargo_funcionario.id_setor = setor.id_setor')
        ->where('cargo_funcionario.id_funcionario = '.$id_funcionario)
        ->get();

        if ($cargo_funcionario) {
            return $cargo_funcionario->result();
        }
        return null;
    }
}
