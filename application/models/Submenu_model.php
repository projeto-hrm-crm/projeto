<?php
class Submenu_model extends CI_Model
{
    /**
     * @author Pedro Henrique Guimarães
     * Método responsável por buscar subcategorias pelo id_categoria
     *
     * @param $menu_id
     * @return mixed|bool
     */
    public function getAllSubmenusByMenuId($menu_id)
    {
        $this->db->select('*')
                 ->from('sub_menu')
                 ->where('id_menu', $menu_id);
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            return $result->result();
        }

        return false;
    }
}
