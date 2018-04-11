<?php 
class Usuario_model extends CI_Model
{
    /**
     * @author Pedro Henrique Guimarães
     * Método responsável por efetuar o login
     * 
     * @param mixed
     * @return boolean
     */
    public function login($data)
    {
        if (!is_null($data)) {
            $email = $data['email'];
            $senha = $data['senha'];

            $this->db->select('*')
                     ->from('usuario')
                     ->where( 
                         array(
                         'login' => $email,
                         'senha' => $senha
                         )
                     );
            $sql = $this->db->get();

            if ($sql->num_rows() > 0) {
                $this->session->userdata('user_login', $sql->result()[0]->id_usuario);
                return true; 
            }
            return false; 
        }
    }

    /**
     * @author Pedro Henrique Guimarães
     * Verifica se o usuário esta logado 
     * 
     * @return boolean
     */
    public function isLoggedIn()
    {
        if ($this->session->userdata('usuario') != null) 
            return true; 
        return false;
    }

}