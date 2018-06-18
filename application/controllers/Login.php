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
       
        if ($this->form_validation->run('login')) {
           if (!$this->usuario->login($data)) {
                $this->session->set_flashdata('login_error', 'Erro ao logar: Usuário e/ou senha inválidos');
            } else {
                redirect(base_url());
            }          
        }
       
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
        $this->session->unset_userdata('user_login');
        redirect(base_url("login"));
    }
}