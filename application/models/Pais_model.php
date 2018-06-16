<?php
/**
 * Created by PhpStorm.
 * User: pedroguimaraes
 * Date: 6/10/18
 * Time: 4:12 PM
 */

class Pais_model extends CI_Model
{
    /**
     * @author Pedro Henrique Guimarães
     *
     * Método responsável por retornar todos os países
     * @return mixed
     */
    public function get()
    {
        $this->db->select('*')
                 ->from('pais');
        $result = $this->db->get();

        if ($result->num_rows() > 0)
            return $result->result();
        return null;
    }
}