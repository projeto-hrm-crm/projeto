<?php
class Permissao_model extends CI_Model
{

  public function get(){
    $query = $this->db->get('permissao');
    return $query->result();
  }

  public function find($id_permissao)
  {
    try {
      $data=$this->db->select('*')->from('permissao')->where('permissao.id_permissao',$id_permissao)->get();
      if($data){
        return $data->result();
      }else{
        // echo "não existe";
        return 1;
      }
    }catch (\Exception $e){}
    }


  }
