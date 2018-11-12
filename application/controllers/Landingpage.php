<?php 

class Landingpage extends CI_Controller
{
    /**
     * @author Carlos Cadilhe
     * Carrega as partes da landing page
     * 
     * @return void
     */
    public function index() {    
         
        
        $this->load->view('new_landing/index.php');
       
    }

    
}