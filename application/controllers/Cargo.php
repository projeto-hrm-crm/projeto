<?php
class Cargo extends PR_Controller
{
    public function __construct()
    {
        parent::__construct('cargo');
    }

    /**
    * @author Peterson Munuera
    * @author Beto Cadilhe
    * Metodo index que chama a view inicial de cliente
    **/
    public function index()
    {
        $this->setTitle('Cargos');
        $this->addData('cargos', $this->cargo->get());

        $this->loadIndexDefaultScripts();

        $this->loadView('index');
    }

    /**
    * @author: Beto Cadilhe
    * Realiza o cadastro de um cargo, com validação dos dados recebidos da view cargo/cadastro.php
    */
    public function create()
    {
        if($this->input->post())
        {

            if($this->form_validation->run('cargo'))
            {
                $this->cargo->insert($this->getFromPost());
                $this->redirectSuccess('Cargo cadastrado com sucesso!');
            }
            else
            {
                $this->redirectError('cadastrar');
            }
        }
        else
        {
            $this->setTitle('Cadastrar Cargo');

            $this->addScripts(array('lib/jquery/jquery.maskMoney.min.js','maskMoney.js'));
            $this->loadFormDefaultScripts();

            $this->loadView('cadastrar');

        }
    }

    /**
    * @author: Peteson Munuera
    * @author: Beto Cadilhe
    * Realiza edição de registro de um cargo pelo id, dados recebidos pela view cargo/editar.php
    *
    * @param integer: referem-se ao id do cargo a ser alterado
    */
    public function edit($id_cargo)
    {
        if ($this->input->post())
        {

            if($this->form_validation->run('cargo'))
            {
                $this->cargo->update($this->getFromPostEdit($id_cargo));
                $this->redirectSuccess('Cargo atualizado com sucesso!');
            }
            else
            {
                $this->redirectError('editar/'.$id_cargo);
            }

        }
        else
        {
            $this->setTitle('Editar Cargo');

            $this->addData('cargo',   $this->cargo->getById($id_cargo));

            $this->loadFormDefaultScripts();
            $this->addScripts(array('lib/jquery/jquery.maskMoney.min.js','maskMoney.js'));

            $this->loadView('editar');
        }
    }


    /**
    * @author: Peterson Munuera
    * Realiza remoção de registro de um cargo pelo id, dados recebidos pela view cargo/delete.php
    *
    * @param integer: refere-se ao id do cargo a ser alterado
    */
    public function delete($id_cargo)
    {
        $this->cargo->remove($id_cargo);

        $this->redirectSuccess('Cargo removido com sucesso!');
    }

    /**
    * @author: Tiago Villalobos
    * Retorna um array com dados pegos por post
    *
    * @return: mixed
    */
    private function getFromPost()
    {
        return array(
            'nome'                  => $this->input->post('nome'),
            'descricao'             => $this->input->post('descricao'),
            'carga_horaria_semanal' => $this->input->post('carga_horaria'),
            'salario'               => $this->input->post('salario'),
           // 'horario'  => $this->input->post('horario'),
          //  'hora_entrada'  => $this->input->post('hora_entrada'),
          //  'hora_saida'  => $this->input->post('hora_saida'),
        );
    }

    /**
    * @author: Tiago Villalobos
    * Retorna um array com dados pegos por post adicionado a eles o id_cargo
    *
    * @return: mixed
    */
    private function getFromPostEdit($id_cargo)
    {
        $postData = $this->getFromPost();

        $postData['id_cargo'] = $id_cargo;
        return $postData;
    }

     private function getSalarioPorHora($id_cargo)
     {
        
     }
}
