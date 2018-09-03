<?php 

class LandingPage extends CI_Controller
{
    /**
     * @author Pedro Henrique Guimarães
     * Recebe os dados do formulário, trata e 
     * usa o model para busca do usuário
     * 
     * @return void
     */
    public function index()
    {    
         
        $this->load->view('landing_page/index.html');
       
    }

    
}