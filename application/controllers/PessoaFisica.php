<?php
class PessoaFisica extends CI_Controller
{

  public function index(){

  }

  /**
  * @author: Camila Sales
  * Este método tem como finalidade salvar um registro de pessoa fisica.
  *
  */
  public function save()
  {
    $id_pessoa = $this->pessoa_fisica->insert(5);

    $this->cliente->insert($id_pessoa);

    $this->funcionario->insert($id_pessoa);
    
    $this->candidato->insert($id_pessoa);
  }

  /**
  * @author: Camila Sales
  * Este método tem como finalidade listar todos os registros de pessoa fisica.
  *
  */
  public function listar()
  {
    var_dump($this->pessoa_fisica->get(null));
  }

  /**
  * @author: Camila Sales
  * Este método tem como finalidade listar um registro de pessoa fisica com base no id passado.
  *
  * @param integer $id_pessoa
  */
  public function listarId($id_pessoa)
  {
    var_dump($this->pessoa_fisica->get($id_pessoa));
  }

  /**
  * @author: Camila Sales
  * Este método tem como finalidade remover um registro de pessoa fisica com base no id passado.
  *
  * @param integer $id_pessoa
  */
  public function delete($id_pessoa)
  {
    $this->cliente->remove($id_pessoa);
    $this->funcionario->remove($id_pessoa);
    $this->candidato->remove($id_pessoa);
    $this->pessoa_fisica->remove($id_pessoa);
  }

}
