<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	
	public function index(){

		$this->load->view('includes/header');
		$this->load->view('includes/aside');
		$this->load->view('category/Form');
		$this->load->view('includes/footer');
	}


	


	public function categoryList($id=null){

		$this->load->view('includes/header');
		$this->load->view('includes/aside');
		$this->load->model('CategoryModel');
		if ($id!=null) 
		{
			$data ['rows'] = $this->CategoryModel->categoryList($id)[0];
			$this->load->view('category/Form',$data);
		}
		else
		{
			$data ['categories'] = $this->CategoryModel->categoryList();
			$this->load->view('category/List',$data);
	    }
		$this->load->view('includes/footer');
		
	}

	public function deleteCategory ($id){

		$this->load->model('CategoryModel');
		if ($this->CategoryModel->deleteCategory($id)) {

			die('Deleted');
		}
	}

	public function addCategory(){

		header('Access-Control-Allow-Origin:*');
		//	die(print_r($_REQUEST));
		$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
		$this->form_validation->set_rules('category_name', 'Category Name', 'required');
		$this->form_validation->set_rules('category_desc', 'Description', 'required');
		$_FILES["category_image"];
		$config['upload_path'] = 'uploads/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		//$config['max_size']	= '500';
		//$config['max_width']= '870';
		//$config['max_height']= '300';
		$config['encrypt_name']= TRUE;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('category_image'))
			{
				$error = array('error' => $this->upload->display_errors());
				die("<div class='alert alert-danger'>".$error['error']."</div>");
			}

		$image = array('upload_data' => $this->upload->data());
		if($this->form_validation->run())
			{
				$data = array(
				"category_name"=>$this->input->post("category_name"),
				"category_desc"=>$this->input->post("category_desc"),
				"category_image"=>$image['upload_data']['file_name']);
				
				$this->load->model('CategoryModel');
				if($res=$this->CategoryModel->addCategory($data))
					{
						die ("<div class='alert alert-success'> Category Added Successfully</div>
							<script>$('#new_category')[0].reset();</script>");		
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


	public function updateCategory($id){

		header('Access-Control-Allow-Origin:*');
		//	die(print_r($_REQUEST));
		$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
		$this->form_validation->set_rules('category_name', 'Category Name', 'required');
		$this->form_validation->set_rules('category_desc', 'Description', 'required');
			
			

			if($_FILES['category_image']['tmp_name']!=""){

			$_FILES["category_image"];
			$config['upload_path'] = 'uploads/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			//$config['max_size']	= '500';
			//$config['max_width']= '870';
			//$config['max_height']= '300';
			$config['encrypt_name']= TRUE;
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('category_image'))
				{
					$error = array('error' => $this->upload->display_errors());
					die($error['error']);
				}

			$image = array('upload_data' => $this->upload->data());
			}
		
			if($this->form_validation->run())
			{
				
				

					if($_FILES['category_image']['tmp_name']!="")
					{
						$data = array(
						"category_name"=>$this->input->post("category_name"),
						"category_desc"=>$this->input->post("category_desc"),
						"category_image"=>$image['upload_data']['file_name']);
					}
					else{
						$data = array("category_desc"=>$this->input->post("category_desc"),
							"category_name"=>$this->input->post("category_name"));
					
					}
				
					
					
					
					$this->load->model('CategoryModel');
				if($res=$this->CategoryModel->updateCategory($id,$data))
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
