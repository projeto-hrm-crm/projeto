<?php
/**
 * Created by PhpStorm.
 * User: pedroguimaraes
 * Date: 6/16/18
 * Time: 11:27 PM
 */

class Configuracao_model extends CI_Model
{

    /**
     * @author Pedro Henrique Guimarães.
     * Método responsável por conectar os menus com os grupos de acesso.
     *
     * @param mixed
     * @return boolean
     */
    public function setPermission($permissions)
    {
        $id_group = $permissions['group'];
        $access = $permissions['access'];
        foreach ($access as $a) {
            $this->db->select('*')
                ->from('grupo_acesso_menu')
                ->where('id_grupo_acesso', $id_group)
                ->where('id_menu', $a);
            $sql = $this->db->get();

            if ($sql->num_rows() == 0) {
                $this->db->insert('grupo_acesso_menu', [
                    'id_grupo_acesso' => $id_group,
                    'id_menu' => $a
                ]);
            }
        }
    }
}