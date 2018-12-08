<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class Admin extends CI_Controller {

	
	public function index(){

		 $this->load->view('AdminLogin');
	}

	public function Authenticate(){

		header('Access-Control-Allow-Origin:*');
        $this->load->library("form_validation");
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" >','</div>');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if($this->form_validation->run())
        {
            $this->load->model('AdminModel');
            if($data=$this->AdminModel->Authenticate($this->input->post('username'),$this->input->post('password')))
            {
              echo '<div class="alert alert-success" >Please wait while redirecting</div>';
               echo"<script>
                    window.location='".base_url()."Registration'
                </script>"; 

               
            }
            else
            {
                die('<div class="alert alert-danger" >'.'Check username and password'.'</div>');            
            }
        }
        else 
        {
            echo validation_errors();
        }
		
	}



	public function Logout(){

       $this->session->sess_destroy();
         redirect(base_url('Admin/index')); 

	}
}
