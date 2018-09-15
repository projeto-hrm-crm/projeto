<?php
class Menu_model extends CI_Model
{
    /**
     * @author Pedro Henrique Guimarães
     * Método responsável por buscar todas as categorias de um determinado grupo de acesso
     *
     * @param $group_id
     * @return mixed|bool
     */
    public function getMenuByGroupId($group_id)
    {
        $final_menu = [];
        if ($group_id) {
            $this->db->select('*')
                 ->from('menu as m')
                 ->join('grupo_acesso_menu as gam', 'm.id_menu = gam.id_menu')
                 ->where('id_grupo_acesso', $group_id);
            $menus = $this->db->get();

            if ($menus->num_rows() > 0) {
               foreach ($menus->result() as $menu) {
                    $final_menu[$menu->nome]['submenu'] = $this->submenu->getAllSubmenusByMenuId($menu->id_menu);
                    $final_menu[$menu->nome]['icon']    = $menu->icone;
               }
            }
            return $final_menu;
        }

        return false;

    }

    /**
     * @author Pedro Henrique Guimarães
     * Método responsável por retornar os menus baseado no grupo de acesso do usuário logado
     *
     * @param $user_id
     * @return mixed|bool
     */
    public function getUserMenu($user_id)
    {
        if ($user_id)
           return $this->getMenuByGroupId($this->usuario->getUserAccessGroup($user_id));
        return false;
    }
}
