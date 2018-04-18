<?php
class Sac extends CI_Controller
{

  public function index(){
      $data['title'] = 'Solicitações SAC';
      $data['sac'] = $this->sac->get();

      loadTemplate('includes/header', 'sac/index', 'includes/footer', $data);
  }

  /**
  * @author: Rodrigo Alves
  * Este método tem como finalidade criar uma ordem de SAC.
  *
  */
  public function save() {
      
  }

  /**
  * @author: Rodrigo Alves
  * Este método tem como finalidade apagar uma ordem de SAC.
  *
  * @param integer $id_sac
  */
  public function delete($id_sac) {
          
  }

}
