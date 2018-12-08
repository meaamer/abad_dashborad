<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
include_once('/libraries/..ImgCompressor.php');
class Registration extends CI_Controller {

	 function __construct()
    {
        parent::__construct();
        $this->load->model('CategoryModel');
	 	$this->load->model('AreaModel');
	 	$this->load->model('RegistrationModel');
    }

    public function test(){

		$this->load->view('business/test');
		
	} 

	public function tests(){

		
		header('Access-Control-Allow-Origin:*');
		$setting = array(
			'directory' => './test/', // directory file compressed output
			'file_type' => array( // file format allowed
			'image/jpeg',
			'image/png',
			'image/gif'));
		$ImgCompressor = new ImgCompressor($setting);
		//$this->load->library('imgcompressor',$setting);
		$result['info']=$ImgCompressor->run('./fol/m_02.jpg','jpg',9);
		echo '<pre>'.
		print_r($result['info']).
		'</pre>';
}
		


	
	public function index(){

		$this->load->view('includes/header');
		$this->load->view('includes/aside');
		$data ['mainCates'] = $this->CategoryModel->categoryList();
		$data ['areas'] = $this->AreaModel->areaList();
		$this->load->view('business/Form',$data);
		$this->load->view('includes/footer');

	} 

	

	public function otherImages($last_id){

		$data['last_id'] = $last_id;
		$this->load->view('includes/header');
		$this->load->view('includes/aside');
		$this->load->view('business/Images',$data);
		$this->load->view('includes/footer');
	} 
		


	public function getSubCategory(){
		header('Access-Control-Allow-Origin:*');
		$data  =$this->RegistrationModel->getSubCategory();
		
		if (!empty($data)) {
			foreach ($data as $key) {
				echo "<option value='".$key['subcategory_id']."'>".$key['subcategory_name']."</option>";
			}
		}

	}


	public function addBusiness()
	{
		header('Access-Control-Allow-Origin:*');
		$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
		$this->form_validation->set_rules('business_name', 'Business name', 'required');
		$this->form_validation->set_rules('mobile_one', 'mobile_one', 'required');
		$this->form_validation->set_rules('mobile_two', 'Alternate No', 'required');
		$this->form_validation->set_rules('email_id', 'Email', 'required');
		$this->form_validation->set_rules('main_category', 'Category', 'required');
		$this->form_validation->set_rules('sub_category', 'Sub Category', 'required');
		$this->form_validation->set_rules('area_name', 'Area', 'required');
		$this->form_validation->set_rules('city_name', 'city', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('establish_date', 'Establish date', 'required');
		$this->form_validation->set_rules('working_hour', 'Working hours', 'required');
		$this->form_validation->set_rules('register_date', 'Register date', 'required');
		$this->form_validation->set_rules('expire_date', 'Expire date', 'required');
		$this->form_validation->set_rules('about_business', 'About us', 'required');
		if($this->form_validation->run())
		{
			$this->load->model('RegistrationModel');
			if($res=$this->RegistrationModel->addBusiness())
			{
				header('Location:otherImages/'.$res);
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
          
	public function addOtherImage()
	{
		header('Access-Control-Allow-Origin:*');
		$setting = array(
			'directory' => './test/', // directory file compressed output
			'file_type' => array( // file format allowed
			'image/jpeg',
			'image/png',
			'image/gif'));

		$this->load->library('imgcompressor',$setting);
		

		$count = count($_FILES['userfile']['name']);
        foreach($_FILES as $key=>$value)
        {
			for($s=0; $s<=$count-1; $s++)
        	{
                $_FILES['userfile']['name']=$value['name'][$s];
                $_FILES['userfile']['type']    = $value['type'][$s];
                $_FILES['userfile']['tmp_name'] = $value['tmp_name'][$s];
                $_FILES['userfile']['error']       = $value['error'][$s];
                $_FILES['userfile']['size']    = $value['size'][$s];
                $config['upload_path'] = 'uploads/files';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['encrypt_name']= TRUE;
                $this->load->library('upload', $config);
                $this->upload->do_upload();
                $data = $this->upload->data();

                $filess = 'uploads/files'.$data["file_name"];
                 
                $result['info']=$this->imgcompressor->run($filess,'jpg',9);
                die(print_r($result));
               
                $db_data = array('business_id'=> $this->input->post("inserted_id"),
                'image_path'=> $result['info']['data']['compressed']['name']);
            	$res = $this->db->insert('images',$db_data);
            	unlink($filess);
            }
    	}

    		if($res==true){
    			die ("<div class='alert alert-success'> Category Added Successfully</div>
							<script>window.location='".base_url()."Registration'</script>");
    		}else
    		{die("Please try again");}
	}


	public function updateBusiness($id){

		header('Access-Control-Allow-Origin:*');
		//	die(print_r($_REQUEST));
		$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
		$this->form_validation->set_rules('business_name', 'Business name', 'required');
		$this->form_validation->set_rules('mobile_one', 'mobile_one', 'required');
		$this->form_validation->set_rules('mobile_two', 'Alternate No', 'required');
		$this->form_validation->set_rules('email_id', 'Email', 'required');
		$this->form_validation->set_rules('main_category', 'Category', 'required');
		$this->form_validation->set_rules('sub_category', 'Sub Category', 'required');
		$this->form_validation->set_rules('area_name', 'Area', 'required');
		$this->form_validation->set_rules('city_name', 'city', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('establish_date', 'Establish date', 'required');
		$this->form_validation->set_rules('working_hour', 'Working hours', 'required');
		$this->form_validation->set_rules('register_date', 'Register date', 'required');
		$this->form_validation->set_rules('expire_date', 'Expire date', 'required');
		$this->form_validation->set_rules('about_business', 'About us', 'required');
		if($_FILES['feature_image']['tmp_name']!="")
		{
			$_FILES["feature_image"];
			$config['upload_path'] = 'uploads/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			//$config['max_size']	= '500';
			//$config['max_width']= '870';
			//$config['max_height']= '300';
			$config['encrypt_name']= TRUE;
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('feature_image'))
				{
					$error = array('error' => $this->upload->display_errors());
					die($error['error']);
				}
				$image = array('feature_upload' => $this->upload->data());
			}
			if($this->form_validation->run())
			{
				
				if($_FILES['feature_image']['tmp_name']!="")
				{
					$data = array(
					"business_name"=>$this->input->post("business_name"),
					"mobile_one"=>$this->input->post("mobile_one"),
					"mobile_two"=>$this->input->post("mobile_two"),
					"email_id"=>$this->input->post("email_id"),
					"category_id"=>$this->input->post("main_category"),
					"subcategory_id"=>$this->input->post("sub_category"),
					"area_id"=>$this->input->post("area_name"),
					"city_name"=>$this->input->post("city_name"),
					"address"=>$this->input->post("address"),
					"establish_date"=>$this->input->post("establish_date"),
					"working_hour"=>$this->input->post("working_hour"),
					"register_date"=>$this->input->post("register_date"),
					"expire_date"=>$this->input->post("expire_date"),
					"about_business"=>$this->input->post("about_business"),
					"feature_image"=>$image['feature_upload']['file_name']);
				}
				else{
					$data = array(
					"business_name"=>$this->input->post("business_name"),
					"mobile_one"=>$this->input->post("mobile_one"),
					"mobile_two"=>$this->input->post("mobile_two"),
					"email_id"=>$this->input->post("email_id"),
					"category_id"=>$this->input->post("main_category"),
					"subcategory_id"=>$this->input->post("sub_category"),
					"area_id"=>$this->input->post("area_name"),
					"city_name"=>$this->input->post("city_name"),
					"address"=>$this->input->post("address"),
					"establish_date"=>$this->input->post("establish_date"),
					"working_hour"=>$this->input->post("working_hour"),
					"register_date"=>$this->input->post("register_date"),
					"expire_date"=>$this->input->post("expire_date"),
					"about_business"=>$this->input->post("about_business"));
				}
					
				
					
					
					
					
				if($res=$this->RegistrationModel->updateBusiness($id,$data))
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

	public function deleteBusiness($id){

		if($this->RegistrationModel->deleteBusiness($id)){

			echo "Deleted";
			


		}  

	}

	public function getBusinesById($id){

		$this->load->view('includes/header');
		$this->load->view('includes/aside');
		$data ['mainCates'] = $this->CategoryModel->categoryList();
		$data ['areas'] = $this->AreaModel->areaList();
		$data ['rows'] = $this->RegistrationModel->getBusinesById($id)[0];
		$this->load->view('business/Form',$data);
		$this->load->view('includes/footer');
	}
		
		
		
		public function deactiveBusiness(){

		$this->load->view('includes/header');
		$this->load->view('includes/aside');
		$this->load->view('business/deactiveList');
		$this->load->view('includes/footer');
		

	} 

	public function listBusiness(){

		$this->load->view('includes/header');
		$this->load->view('includes/aside');
		$this->load->view('business/activeList');
		$this->load->view('includes/footer');
		

	} 

	 function fetch_user($status){  
            
           $fetch_data = $this->RegistrationModel->make_datatables($status);  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                  
                $sub_array[] = $row->business_id;  
                $sub_array[] = $row->business_name;
                $sub_array[] = $row->mobile_one;
                $sub_array[] = $row->register_date;
                $sub_array[] = $row->category_name;
                $sub_array[] = $row->area_name;

                $sub_array[]='<a href="'.base_url().'Registration/businessDetails/'.$row->business_id.'"
                  class="btn btn-warning btn-xs"> Details</a>'; 
                
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->RegistrationModel->get_all_data($status),  
                "recordsFiltered"     =>     $this->RegistrationModel->get_filtered_data($status),  
                "data"                    =>     $data  
           );  

           echo json_encode($output);  
      }  

      public function businessDetails($id){
      	$data['details'] = $this->RegistrationModel->businessDetails($id)[0]; 
      	$data['images'] = $this->RegistrationModel->showOtherImages($id);
      	
      	$this->load->view('includes/header');
		$this->load->view('includes/aside');
		$this->load->view('business/Details',$data);
		$this->load->view('includes/footer');

      }


      public function changeStatus($status,$id){
      	$this->RegistrationModel->changeStatus($status,$id);
      }

          
		
}
