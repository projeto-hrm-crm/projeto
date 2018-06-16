<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Sac extends PR_Controller 
{

    /**
    * @author: Tiago Villalobos
    * Construtor que define o diretório de views
    */
    public function __construct()
    {
        parent::__construct('sac');
    }

    /**
    * @author: Tiago Villalobos
    * Listagem de Sacs
    */
    public function index()
    {
        $typeUser = $this->usuario->getUserAccessGroup($this->session->userdata('user_login'));
        $cliente = $this->cliente->getIdCliente($this->session->userdata('user_id_pessoa')); 

        $this->setTitle('Solicitações SAC');
        $this->addData('tipo', $this->usuario->getUserAccessGroup($this->session->userdata('user_login')));


        if($this->data['tipo'] == '1')
        {
            $this->addData('sac', $this->sac->get());
        }
        else
        {
            $cliente = $this->cliente->getIdCliente($this->session->userdata('user_id_pessoa'));
            $this->addData('sac',  $this->sac->getClient($cliente[0]->id_cliente));
        }

        foreach ($this->data['sac'] as $key => $sac) 
        {
            $cliente = $this->cliente->getById($this->data['sac'][$key]->id_cliente);
            $this->data['sac'][$key]->id_cliente = $cliente[0]->nome;
        }

        $this->loadIndexDefaultScripts();

        $this->loadView('index');
    }

    /**
    * @author: Rodrigo Alves
    * Página de cadastro.
    */
    public function create() 
    {
        $typeUser = $this->usuario->getUserAccessGroup($this->session->userdata('user_login'));
        $cliente  = $this->cliente->getIdCliente($this->session->userdata('user_id_pessoa'));
         
         
        if($typeUser == '1')
        {
            $id_cliente = $this->input->post('id_cliente');
        }
        else 
        {
            $id_cliente = $cliente[0]->id_cliente;
        }

        if($this->input->post())
        {
            if($this->form_validation->run('sac'))
            {
                $this->sac->insert($this->getFromPost());
                
                $this->redirectSuccess('SAC cadastrado com sucesso');
            }
            else
            {
                $this->redirectError('cadastrar');
            }
        }
        else
        {
            $this->setTitle('Cadastrar SAC');

            $this->addData('clientes', $this->cliente->get());
            $this->addData('produtos', $this->produto->get());
            $this->addData('tipo', $typeUser);

            $this->loadFormDefaultScripts();
        
            $this->loadView('cadastrar');
            
        }
    }

    
    /**
    * @author: Tiago Villalobos
    * Formulário para edição de sac
    *
    * @param: $id_sac integer
    */
    public function edit($id_sac) 
    {
        $typeUser = $this->usuario->getUserAccessGroup($this->session->userdata('user_login'));
        $cliente  = $this->cliente->getIdCliente($this->session->userdata('user_id_pessoa'));

        if ($this->input->post()){
            if($this->form_validation->run('sac'))
            {
                $this->sac->update($this->getFromPostEdit($id_sac));
                $this->redirectSuccess('SAC atualizado com sucesso');
            }
            else
            {
                $this->redirectError('editar/'.$id_sac);
            }

        } 
        else
        {
            $this->setTitle('Editar Sac');
            
            $this->addData('sac',      $this->sac->getById($id_sac));
            $this->addData('id',       $id_sac);
            $this->addData('clientes', $this->cliente->get());
            $this->addData('produtos', $this->produto->get());
            $this->addData('tipo',     $typeUser);

            $this->loadFormDefaultScripts();

            $this->loadView('editar');
        }

    }

    /**
    * @author: Rodrigo Alves
    * Este método tem como finalidade apagar uma ordem de SAC.
    *
    * @param integer $id_sac
    */
    public function delete($id_sac) 
    {
        $this->sac->remove($id_sac);
        
        $this->redirectSuccess('SAC removido com sucesso');
    }

    /**
    * @author: Tiago Villalobos
    * Retorna um array com dados pegos por post
    *
    * @param: $id_sac integer
    */
    private function getFromPost()
    {
        return array(
            'id_produto' => $this->input->post('id_produto'),
            'id_cliente' => $this->input->post('id_cliente'),
            'abertura'   => date("Y-m-d H:i:s"),
            'fechamento' => 0,
            'encerrado'  => 0,
            'titulo'     => $this->input->post('titulo'),
            'descricao'  => $this->input->post('descricao'),
        );
    }

    /**
    * @author: Tiago Villalobos
    * Retorna um array com dados pegos por post adicionado a eles o id_sac
    *
    * @param: $id_sac integer
    */
    private function getFromPostEdit($id_sac)
    {
        $postData = $this->getFromPost();

        $postData['id_sac']     = $id_sac;
        $postData['fechamento'] = $this->input->post('encerrado') ? date('Y-m-d H:i:s') : 0;
        $postData['encerrado']  = $this->input->post('encerrado');

        return $postData;
    }
}
