<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function index()
    {
        $this->load->view('home');
    }
    
    public function editar($id=0){

    }
    
    public function borrar($id=0){
        core_persona::borrar($id);
    }
}

/* End of file Main.php */
