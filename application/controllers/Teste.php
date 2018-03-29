<?php 

class Teste extends CI_Controller 
{
    public function index()
    {
        if (!$this->form_validation->run('teste')) {
            echo "foi";
        }
    }
}