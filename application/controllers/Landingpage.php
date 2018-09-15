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
         
        
        $this->load->view('landing_page/header.php');
        $this->load->view('landing_page/content.php');
        $this->load->view('landing_page/team.php');
        $this->load->view('landing_page/footer.php');
       
    }

    
}