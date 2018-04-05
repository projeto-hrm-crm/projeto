<?php
/**
 *
 */
class Pessoa extends CI_Controller
{

  function create()
  {
    if($this->input->post)
    {
      print_r($_POST);
    }
    else
    {
      $this->load->helper('url');
      // $this->load->view('includes/header.php');

      $this->load->view('pessoa/create.php');
      // $this->load->view('includes/footer.php');
    }
  }
}
