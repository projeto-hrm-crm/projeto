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

    public function insert($data)
    {
      $this->db
      ->set('grupo_acesso_modulo.id_modulo', $data['id_modulo'])
      ->set('grupo_acesso_modulo.id_grupo_acesso', $data['id_grupo_acesso'])
      ->insert('grupo_acesso_modulo');
      $this->db
      ->set('grupo_acesso_modulo.id_modulo', $data['id_modulo'])
      ->set('grupo_acesso_modulo.id_grupo_acesso', $data['id_grupo_acesso'])
      ->insert('grupo_acesso_modulo',$data);
      $this->db->insert('grupo_acesso', $data);
    }


    public function update($id_grupo_acesso, $data)
    {
      $this->db->update('grupo_acesso', $data, array('id_grupo_acesso' => $id_grupo_acesso));
    }

    public function remove($id_grupo_acesso)
    {
      $setor = $this->db->where('id_grupo_acesso', $id_grupo_acesso)->get('grupo_acesso')->row();
      $this->db->where('id_grupo_acesso', $id_grupo_acesso);
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
      $permissoes = $this->db->select(
        '*'
        )->from('permissao')
        ->join('menu','permissao.id_menu = menu.id_menu')
        ->join('sub_menu','menu.id_sub_menu = sub_menu.id_sub_menu')
        ->join('grupo_acesso_modulo', 'permissao.id_grupo_acesso_modulo = grupo_acesso_modulo.id_grupo_acesso_modulo')
        ->get();

        if ($permissoes) {
          return $permissoes->result();
        }
        return null;

      }

      public function getActions()
      {
        $acoes = $this->db->select(
          '*
          ')
          ->from('sub_menu')
          ->get();

          if ($acoes) {
            return  $acoes->result();
          }
          return null;

        }

        public function getModulesForGroups()
        {
          $modulos_grupos = $this->db->select(
            '*,
            modulo.nome AS modulo_nome,
            ')
            ->from('grupo_acesso')
            ->join('grupo_acesso_modulo', 'grupo_acesso.id_grupo_acesso = grupo_acesso_modulo.id_grupo_acesso')
            ->join('modulo','modulo.id_modulo = grupo_acesso_modulo.id_modulo')
            ->get();

            if ($modulos_grupos) {
              return  $modulos_grupos->result();
            }
            return null;

          }

          public function getActionsSubModules()
          {
            $acoes_sub_modulos = $this->db->select(
              'sub_menu.nome AS acao,
              sub_menu.id_sub_menu,
              grupo_acesso_modulo.id_grupo_acesso,
              sub_modulo.nome AS sub_modulo_nome,
              sub_modulo.id_sub_modulo,
              ')
              ->join('menu','menu.id_sub_menu = sub_menu.id_sub_menu')
              ->join('sub_modulo','menu.id_sub_modulo = sub_modulo.id_sub_modulo')
              ->join('grupo_acesso_modulo','grupo_acesso_modulo.id_modulo = sub_modulo.id_modulo')
              ->join('grupo_acesso','grupo_acesso.id_grupo_acesso = grupo_acesso_modulo.id_grupo_acesso')
              ->from('sub_menu')
              ->get();

              if ($acoes_sub_modulos) {
                return  $acoes_sub_modulos->result();
              }
              return null;

            }

            public function getModules()
            {
              $modulos = $this->db->select(
                '*,
                modulo.nome AS modulo_nome'
                )->from('modulo')

                ->get();
                if ($modulos) {

                  return  $modulos->result();

                }
                return null;

              }

              public function getActionsForGroups()
              {
                $acoes_grupos = $this->db->select(
                  '*,
                  sub_modulo.nome AS sub_modulo_nome,
                  sub_menu.nome AS acao_grupo,'
                  )->from('sub_menu')
                  ->join('menu','menu.id_sub_menu = sub_menu.id_sub_menu')
                  ->join('sub_modulo','menu.id_sub_modulo = sub_modulo.id_sub_modulo')
                  ->join('grupo_acesso_modulo','grupo_acesso_modulo.id_modulo = sub_modulo.id_modulo')
                  ->get();
                  if ($acoes_grupos) {

                    return  $acoes_grupos->result();

                  }
                  return null;

                }


                public function getUsersForGroups(){
                  $usuarios_por_grupo =  $this->db->select(
                    '*,
                    grupo_acesso_modulo.id_modulo,
                    grupo_acesso.nome AS grupo_nome,
                    usuario.id_grupo_acesso AS id_grupo,
                    '
                    )->from('usuario')
                    ->join('grupo_acesso', 'usuario.id_grupo_acesso = grupo_acesso.id_grupo_acesso')
                    ->join('grupo_acesso_modulo', 'grupo_acesso.id_grupo_acesso = grupo_acesso_modulo.id_grupo_acesso', 'left')
                    ->join('pessoa', 'usuario.id_pessoa = pessoa.id_pessoa')
                    ->get();

                    if ($usuarios_por_grupo) {
                      return $usuarios_por_grupo->result();
                    }
                    return null;

                  }

                  /*  public function getPermissions()
                  {
                  //$this->db->select('*')
                  //           ->from('grupo_acesso')
                  //           ->join('grupo_acesso_modulo', 'grupo_acesso.id_grupo_acesso = grupo_acesso_modulo.id_grupo_acesso');
                  $groups = $this->grupo->getUsersForGroups();

                  //  echo "<pre>";
                  //print_r($groups);



                  $this->db->select('sub_modulo.nome as sub_modulo, sub_menu.nome as sub_menu, sub_modulo.id_modulo as modulo')
                  ->from('menu')
                  ->join('sub_modulo', 'menu.id_sub_modulo = sub_modulo.id_sub_modulo')
                  ->join('sub_menu', 'menu.id_sub_menu = sub_menu.id_sub_menu');
                  $results = $this->db->get()->result();


                  foreach ($groups as $key => $group) {
                  foreach ($results as $result) {
                  if ($group->id_modulo == $result->modulo) {
                  $data[$key][$result->sub_modulo][] = $result->sub_menu;
                  $data[$key]['sub_modulo'] = $groups;
                }
              }
            }

            //  print_r($data);exit;

            return $data;
          }*/

        }
