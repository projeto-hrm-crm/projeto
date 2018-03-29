<?php 

class Login extends CI_Controller
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
        $data = $this->input->post();

        if ($this->form_validation->run('login')) 
            $this->Usuario_model->login($data);
        else
            $this->load->view('login/index.php');
    }

    /**
     * @author Pedro Henrique Guimarães
     * Destroi a sessão que mantem o usuário logado e desloga o mesmo
     * 
     * @return void
     */
    public function logout()
    {
        $this->session->unset_userdata('login');
    }
}