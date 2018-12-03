<?php
class Usuario_model extends CI_Model
{
    public $id_usuario;
    public $login;
    public $senha;
    public $id_grupo_acesso;//estrangeira
    public $id_pessoa;//estrangeira


    /**
    * @author: Matheus Ladislau
    * Retorna todos registros de usuario cadastrados no banco
    * @return array: todos registro de usuario
    */
    public function get(){
        $query = $this->db->get('usuario');
        return $query->result();
    }

    public function getByName() {
      $query = $this->db->select('id_usuario, nome')
      ->join('pessoa', 'pessoa.id_pessoa = usuario.id_pessoa')
      ->get('usuario');
      return $query->result();
    }

    /**
    * @author: Matheus Ladislau
    * Realiza registro de usuario
    *@param array: Data () a serem registrados
    */
    public function insert($data)
    {
      $this->db
        ->set('usuario.login', $data['login'])
        ->set('usuario.senha', hash('sha256', $data['senha']))
        ->set('usuario.id_grupo_acesso', $data['id_grupo_acesso'])
        ->set('usuario.id_pessoa', $data['id_pessoa'])
        ->set('usuario.empresa_id_empresa', $data['empresa_id_empresa'])
        ->insert('usuario');
    }

   /**
    * @author: Rodrigo Alves
    * Atualiza usuario
    *
    */
   public function update($data)
   {
       $this->db
        ->set('usuario.login', $data['login'])
        ->set('usuario.senha', hash('sha256', $data['senha']))
        ->where('usuario.id_usuario', $data['id_usuario'])
        ->update('usuario');
  }

   /**
    * @author: Rodrigo Alves
    * Alterar senha
    *
    */
   public function changePassword($data)
	{
		$this->db->where('usuario.id_usuario', $data['id_usuario']);
		$this->db->set('usuario.senha', hash('sha256', $data['senha']));
		$this->db->update('usuario');
	}

    /**
    * @author: Matheus Ladislau
    * Retorna se login já existe
    * @return: true or false para login ja estar cadastrado
    */
    public function existsLogin($login){
        $this->db->where('login',$login);
        $query = $this->db->get('usuario');
        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }

    /**
  	* @author: Matheus Ladislau
  	* Remove o registro de usuario pelo id de usuário referente
  	*
  	* @param integer: $id_usuario refere-se ao id do registro de usuario a ser deletado
  	*/
  	public function remove($id_usuario)
  	{
  		$this->db->where('id_usuario', $id_usuario);
  		$this->db->delete('usuario');
  	}


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
            $senha = hash('sha256', $data['senha']);

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
                $this->session->set_userdata('user_login', $sql->result()[0]->id_usuario);
                $this->session->set_userdata('user_id_pessoa', $sql->result()[0]->id_pessoa);
                $this->session->set_userdata('user_id_empresa', $sql->result()[0]->empresa_id_empresa);
                $this->session->set_userdata('user_id_grupo_acesso', $sql->result()[0]->id_grupo_acesso);
                return true;
            }
            return false;
        }
    }

    public function getUserNameById($user_id)
    {
        $this->db->select('*');
        $this->db->from('pessoa');
        $this->db->join('usuario', 'pessoa.id_pessoa = usuario.id_pessoa');
        $this->db->where('usuario.id_usuario', $user_id);
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * @author Pedro Henrique Guimarães
     * Método responsável por buscar o grupo de acesso pelo id_usuario
     *
     * @param $user_id
     * @return int|bool
     */
    public function getUserAccessGroup($user_id)
    {
        $this->db->select('id_grupo_acesso')
                 ->from('usuario')
                 ->where('id_usuario', $user_id);
        $result = $this->db->get();
        if ($result->num_rows() > 0)
            return $result->result()[0]->id_grupo_acesso;
        return false;
    }


    /**
     * @author Pedro Henrique Guimarães
     * Verifica se o usuário tem permissão para acessar determinada página
     * baseado no seu grupo de permissão
     *
     * @param int $id_grupo_acesso
     * @param string $url
     * @return void|false
     */
    public function hasPermission($access_group, $url)
    {
        if ($url == '/dashboard')
            return;
        if (!empty($url)) {
            $url = $this->getParsedUrl($url);
         
            $this->db->select('*')
                    ->from('grupo_acesso')
                    ->join('grupo_acesso_modulo', 'grupo_acesso_modulo.id_grupo_acesso = grupo_acesso.id_grupo_acesso')
                    ->join('permissao', 'permissao.id_grupo_acesso_modulo = grupo_acesso_modulo.id_grupo_acesso_modulo')
                    ->join('menu', 'permissao.id_menu = menu.id_menu')
                    ->where('menu.link', $url)
                    ->where('grupo_acesso.id_grupo_acesso', $access_group);
            $result = $this->db->get();
            
            if ($result->num_rows() == 0) {
                redirect(base_url('dashboard'));
            }

        } else {
            redirect(base_url('dashboard'));
        }
    }

    /**
    * @author Pedro Henrique Guimarães
    * Retorna a url atual do usuário, formatada.
    *
    * @param $url
    * @return void|false
    */
    public function getParsedUrl($url)
    {
      if (!empty($url)) {
          $url = substr($url, 1);
          $explodedUrl = explode('/', $url);
          if(count($explodedUrl) >= 3){
            array_pop($explodedUrl);
            return implode('/', $explodedUrl);
          }
          return $url;
      }
    }

    /**
    * @author Camila Pereira Sales
    * Verifica se o email informado ja existe.
    *
    * @param $id_usuario
    * @param $email
    * @return true|false
    */
    public function uniqueMail($id_usuario,$email)
    {
      if(is_null($id_usuario) || $id_usuario == "null"){
        $this->db->where('login',$email);
      }else {
        $this->db->where('login',$email)->where('id_usuario !=',$id_usuario);
      }
      $query = $this->db->get('usuario');
      if ($query->num_rows() > 0){
          return false;
      }
      else{
        return true;
      }
    }

}
