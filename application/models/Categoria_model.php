<?php 
class Categoria_model extends CI_Model
{
    /**
     * @author Pedro Henrique Guimarães
     * Método responsável por buscar todas as categorias de um determinado grupo de acesso 
     * 
     * @param $group_id
     * @return mixed|bool
     */
    public function getCategoriesByGroupId($group_id)
    {
        $menu = [];
        if ($group_id) {
            $this->db->select('*')
                 ->from('categoria')
                 ->where('id_grupo_acesso', $group_id);
            $categorias = $this->db->get();

            if ($categorias->num_rows() > 0) {
               foreach ($categorias->result() as $categoria) {
                    $menu[$categoria->nome]['subcategoria'] = $this->subcategoria->getAllSubcategoriesByCategoryId($categoria->id_categoria);
               }
            }

            return $menu;
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
           return $this->getCategoriesByGroupId($this->usuario->getUserAccessGroup($user_id));
        return false;
    }
}