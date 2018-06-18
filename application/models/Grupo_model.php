<?php
class Grupo_model extends CI_Model
{
  /**
  * @author: Matheus Ladislau
  * Retorna todos registro de grupo_acesso cadastrados no banco
  * @return array: todos registro de grupo_acesso
  */
  public function get(){
      $query = $this->db->get('grupo_acesso');
      return $query->result();
  }

  /**
  * @author: Matheus Ladislau
  * Retorna registro de grupo_acesso cadastrados no banco com id_grupo_acesso referente
  *
  * @param integer $id_grupo_acesso refere-se ao id do registro de grupo_acesso a ser consultado
  * @return array: registro de grupo_acesso cadastrado com id_grupo_acesso informado
  */
  public function find($id_grupo_acesso)
	{
        try {
                $data=$this->db->select('*')->from('grupo_acesso')->where('grupo_acesso.id_grupo_acesso',$id_grupo_acesso)->get();
          if($data){
            return $data->result();
          }else{
            // echo "não existe";
            return 1;
          }
        }catch (\Exception $e){}
    }

    /**
     * @author: Pedro Henrique Guimarães
     * Busca todos os menus e seus respectivos submenus
     *
     * @param void
     * @return mixed
     */
    public function getPermissions()
    {
        $this->db->select('*')
                 ->from('menu');
        $menus = $this->db->get()->result_array();

        if ($menus > 0) {
            foreach($menus as $key => $menu) {
                $this->db->select('*')
                         ->from('sub_menu')
                         ->where('id_menu', $menu['id_menu']);

                $menus[$key]['sub_menus'] = $this->db->get()->result();
            }
        }

        return $menus;
    }

}
