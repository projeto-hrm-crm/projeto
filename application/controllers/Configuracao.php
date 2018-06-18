<?php
/**
 * Created by PhpStorm.
 * User: pedroguimaraes
 * Date: 6/16/18
 * Time: 11:27 PM
 */

class Configuracao extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $user_id = $this->session->userdata('user_login');
        $currentUrl = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
        $this->usuario->hasPermission($user_id, $currentUrl);
    }

    public function index(){}

    /**
     * @author Pedro Henrique Guimarães.
     * Método responsável por conectar os menus com os grupos de acesso.
     *
     * @param void
     * @return void
     */
    public function setPermissions()
    {
        $data = [];
        if ($this->input->post()) {
            $this->configuracao->setPermission($this->input->post());
            $this->session->set_flashdata('permissions_ok', 'As permissões foram configuradas com sucesso');
            redirect(base_url());
        } else {
            $data['title']  = 'Permissões';
            $data['groups'] = $this->grupo->get();
            $data['permissions'] = $this->grupo->getPermissions();

            loadTemplate('includes/header', 'configuracoes/permissoes', 'includes/footer', $data);
        }
    }
}