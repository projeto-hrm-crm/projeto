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
      $data['title'] = 'Cadastrar Pessoa';
      $data['assets'] = array(
        'css' => array('pessoa/style.css'),
        'js' => array(
          'lib/jquery/jquery.mask.min.js',
          'pessoa/main.js',
          'pessoa/validate-form.js',
        ),
      );

      loadTemplate(
        'includes/header',
        'pessoa/create-form',
        'includes/footer',
        $data
      );
    }
  }
}
