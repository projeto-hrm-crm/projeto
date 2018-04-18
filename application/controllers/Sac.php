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
  * Página de cadastro.
  *
  */
  public function create() {
     
     $data = $this->input->post();

       if($data){
          
           $this->sac->insert($data);
           redirect('sac/index');
        
       }
     
      $data['title'] = 'Cadastrar SAC';
      loadTemplate('includes/header', 'sac/cadastrar', 'includes/footer', $data);
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
