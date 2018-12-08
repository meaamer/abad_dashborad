<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubCategory extends CI_Controller {

	
	public function index(){

		$this->load->view('includes/header');
		$this->load->view('includes/aside');
		$this->load->model('CategoryModel');
		$data['mainCates']=$this->CategoryModel->categoryList();
		$this->load->view('subcategory/Form',$data);
		$this->load->view('includes/footer');
	}

 
	


	


	public function categoryList($id=null){

		$this->load->view('includes/header');
		$this->load->view('includes/aside');
		$this->load->model('SubCategoryModel');
		if ($id!=null) 
		{
			$this->load->model('CategoryModel');
			$data['mainCates']=$this->CategoryModel->categoryList();
			$data ['rows'] = $this->SubCategoryModel->categoryList($id)[0];
			$this->load->view('subcategory/Form',$data);
		}
		else
		{
			$data ['subcategories'] = $this->SubCategoryModel->categoryList();
			$this->load->view('subcategory/List',$data);
	    }
		$this->load->view('includes/footer');
		
	}

	public function deleteCategory ($id){

		$this->load->model('SubCategoryModel');
		if ($this->SubCategoryModel->deleteCategory($id)) {

			die('Deleted');
		}
	}

	public function addCategory(){

		header('Access-Control-Allow-Origin:*');
		//	die(print_r($_REQUEST));
		$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
		$this->form_validation->set_rules('main_category', 'main category', 'required');
		$this->form_validation->set_rules('subcategory_name', 'Category Name', 'required');
		$this->form_validation->set_rules('tag_line', 'tag line', 'required');

		$_FILES["subcategory_image"];
		$config['upload_path'] = 'uploads/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		//$config['max_size']	= '500';
		//$config['max_width']= '870';
		//$config['max_height']= '300';
		$config['encrypt_name']= TRUE;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('subcategory_image'))
			{
				$error = array('error' => $this->upload->display_errors());
				die("<div class='alert alert-danger'>".$error['error']."</div>");
			}

		$image = array('upload_data' => $this->upload->data());
		
		if($this->form_validation->run())
			{
				$data = array(
				"category_id"=>$this->input->post("main_category"),
				"subcategory_name"=>$this->input->post("subcategory_name"),
				"tag_line"=>$this->input->post("tag_line"),
				"subcategory_image"=>$image['upload_data']['file_name']);
				
				$this->load->model('SubCategoryModel');
				if($res=$this->SubCategoryModel->addCategory($data))
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
		$this->form_validation->set_rules('main_category', 'main category', 'required');
		$this->form_validation->set_rules('subcategory_name', 'Category Name', 'required');
		$this->form_validation->set_rules('tag_line', 'tag line', 'required');

		if($_FILES['subcategory_image']['tmp_name']!=""){

			$_FILES["subcategory_image"];
			$config['upload_path'] = 'uploads/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			//$config['max_size']	= '500';
			//$config['max_width']= '870';
			//$config['max_height']= '300';
			$config['encrypt_name']= TRUE;
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('subcategory_image'))
				{
					$error = array('error' => $this->upload->display_errors());
					die($error['error']);
				}

			$image = array('upload_data' => $this->upload->data());
			}
		
		if($this->form_validation->run())
			{

				if($_FILES['subcategory_image']['tmp_name']!=""){
					$data = array(
				"category_id"=>$this->input->post("main_category"),
				"subcategory_name"=>$this->input->post("subcategory_name"),
				"tag_line"=>$this->input->post("tag_line"),
				"subcategory_image"=>$image['upload_data']['file_name']);
				} else {
					$data = array(
				"category_id"=>$this->input->post("main_category"),
				"subcategory_name"=>$this->input->post("subcategory_name"),
				"tag_line"=>$this->input->post("tag_line"));
				}
				
				
				
				$this->load->model('SubCategoryModel');
				if($res=$this->SubCategoryModel->updateCategory($id,$data))
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
