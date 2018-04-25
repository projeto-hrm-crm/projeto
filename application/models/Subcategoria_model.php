<?php 
class Subcategoria_model extends CI_Model
{
    /**
     * @author Pedro Henrique Guimarães
     * Método responsável por buscar subcategorias pelo id_categoria
     * 
     * @param $category_id
     * @return mixed|bool
     */
    public function getAllSubcategoriesByCategoryId($category_id)
    {
        $this->db->select('*')
                 ->from('subcategoria')
                 ->where('id_categoria', $category_id);
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            return $result->result();
        }

        return false; 
    }
}