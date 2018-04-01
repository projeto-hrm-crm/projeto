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
    if(!$this->form_validation->run())
    {
      echo validation_errors();
    }
    else
    {
      $id_pessoa = $this->pessoa->insert();
      $id_pessoa_fisica = $this->pessoa_fisica->insert($id_pessoa);
      if (1==1)
      {
        $this->cliente->insert($id_pessoa_fisica);
      }
      elseif(2!=1)
      {
        $this->funcionario->insert($id_pessoa_fisica);
      }
      else
      {
        $this->candidato->insert($id_pessoa_fisica);
      }
    }
  }

  /**
  * @author: Camila Sales
  * Este método tem como finalidade remover um registro de pessoa fisica com base no id passado.
  *
  * @param integer $id_pessoa_fisica
  */
  public function delete($id_pessoa_fisica)
  {
    $this->cliente->remove($id_pessoa_fisica);
    $this->funcionario->remove($id_pessoa_fisica);
    $this->candidato->remove($id_pessoa_fisica);
    $this->pessoa_fisica->remove();
  }

}
