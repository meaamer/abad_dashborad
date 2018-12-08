<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Area extends CI_Controller {

	public function index(){

		$this->load->view('includes/header');
		$this->load->view('includes/aside');
		$this->load->view('area/Form');
		$this->load->view('includes/footer');
		
	}

 
	


	


	public function areaList($id=null){

		$this->load->view('includes/header');
		$this->load->view('includes/aside');
		$this->load->model('AreaModel');
		if ($id!=null) 
		{
			
			$data ['rows'] = $this->AreaModel->areaList($id)[0];
			$this->load->view('area/Form',$data);
		}
		else
		{
			$data ['areas'] = $this->AreaModel->areaList();
			$this->load->view('area/List',$data);
	    }
		$this->load->view('includes/footer');
		
	}

	public function deleteArea ($id){

		$this->load->model('AreaModel');
		if ($this->AreaModel->deleteArea($id)) {

			die('Deleted');
		}
	}

	public function addArea(){

		header('Access-Control-Allow-Origin:*');
		//	die(print_r($_REQUEST));
		$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
		$this->form_validation->set_rules('area_name', 'area', 'required');
		
		
		if($this->form_validation->run())
			{
				$data = array("area_name"=>$this->input->post("area_name"));
				
				$this->load->model('AreaModel');
				if($res=$this->AreaModel->addArea($data))
					{
						die ("<div class='alert alert-success'> Area Added Successfully</div>
							<script>$('#new_area')[0].reset();</script>");		
					}else
					{
						die ("<div class='alert alert-success'> Please resubmit form</div>");			
					}
			}
			else 
			{
				echo validation_errors();
			}
	}


	public function updateArea($id){

		header('Access-Control-Allow-Origin:*');
		//	die(print_r($_REQUEST));
		$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
		$this->form_validation->set_rules('area_name', 'Area', 'required');
		
		
		if($this->form_validation->run())
			{
				$data = array("area_name"=>$this->input->post("area_name"));
				
				$this->load->model('AreaModel');
				if($res=$this->AreaModel->updateArea($id,$data))
					{
						die ("<div class='alert alert-success'>Updated Successfully</div><script>window.history.back();</script>");			
					}else
					{
						die ("<div class='alert alert-success'> Please resubmit form</div>");			
					}
			}
			else 
			{
				echo validation_errors();
			}

	}
	
}
