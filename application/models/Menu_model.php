<?php
class Menu_model extends CI_Model
{

    public function getMenuByAccessGroup($access_group)
    {
        $final_menu = [];

        if ($access_group) {
            $this->db->select(
                '
                menu.id_menu, 
                sub_menu.id_sub_menu,
                sub_modulo.id_sub_modulo,
                menu.link as link, 
                sub_modulo.icone as icone,
                modulo.nome as modulo,
                sub_modulo.nome as sub_modulo,
                modulo.id_modulo,
                grupo_acesso_modulo.id_grupo_acesso_modulo,
                grupo_acesso_modulo.id_grupo_acesso
                '
                )
                        ->from('grupo_acesso')
                        ->join('grupo_acesso_modulo', 'grupo_acesso_modulo.id_grupo_acesso = grupo_acesso.id_grupo_acesso')
                        ->join('permissao', 'permissao.id_grupo_acesso_modulo = grupo_acesso_modulo.id_grupo_acesso_modulo')
                        ->join('menu', 'permissao.id_menu = menu.id_menu')
                        ->join('sub_menu', 'menu.id_sub_menu = sub_menu.id_sub_menu')
                        ->join('sub_modulo', 'menu.id_sub_modulo = sub_modulo.id_sub_modulo')
                        ->join('modulo', 'sub_modulo.id_modulo = modulo.id_modulo')
                        ->where('menu.status', '1')
                        ->where('grupo_acesso.id_grupo_acesso', $access_group)
                        ->order_by('sub_modulo.nome', 'ASC');
        
            $result = $this->db->get();

            if ($result->num_rows() > 0) {
                foreach ($result->result() as $menu) {
                    if ($menu->id_modulo == 1)
                        $final_menu['crm'][] = $menu; 
                    else 
                        $final_menu['hrm'][] = $menu;
                }

                return $final_menu;   
            }

        }
    }

    public function hasPermission($menu_id, $module_group_acess)
    {
        
    }


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
                    $final_menu[$menu->nome]['link']    = $menu->link;
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
