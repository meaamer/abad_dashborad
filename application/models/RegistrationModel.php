<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

//include_once('ImgCompressor.class.php');

class RegistrationModel extends CI_Model {

	public function getSubCategory(){
		$this->db->select('*');
		$this->db->from('sub_category');
		
		if($this->input->post("get_category")!=""){
			$this->db->where('category_id',$this->input->post("get_category"));	
		}
		$q=$this->db->get();
		return $q->result_array();
	}

	public function addBusiness(){
		$setting = array(
			'directory' => './uploads/', // directory file compressed output
			'file_type' => array( // file format allowed
			'image/jpeg',
			'image/png',
			'image/gif'));
		//$ImgCompressor = new ImgCompressor($setting);


		$_FILES["feature_image"];
		$config['upload_path'] = 'uploads/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['encrypt_name']= TRUE;
		$this->load->library('upload', $config);
		
		
		if ( ! $this->upload->do_upload('feature_image'))
			{
				$error = array('error' => $this->upload->display_errors());
				die("<div class='alert alert-danger'>".$error['error']."</div>");
			}else{
				$data = $this->upload->data();
                	$filess = 'uploads/'.$data["file_name"];
                	//die($filess);
                	$result['info'] = $ImgCompressor->run($filess,'jpg',9);
					
			}

		$image = $result['info']['data']['compressed']['name'];
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
				"feature_image"=>$image);
		unlink($filess);

		$this->db->insert("business",$data);

		$last_id = $this->db->insert_id();
		return $last_id;
		 
	}

	public function updateBusiness($id,$data){
		$this->db->where('business_id',$id);
		$this->db->update('business',$data);
		return true;
	}

	public function deleteBusiness($id){

		$image_path = base_url('uploads/');
		$query_get_image = $this->db->get_where('business', array('business_id' => $id));

	    foreach ($query_get_image->result_array() as $record)
	    {
	       
	        $filename = $image_path . $record['feature_image']; 
	   
	        if (file_exists($filename))
	        {
	            unlink($filename);
	        }
	        $this->db->where('business_id',$id);
		 	$this->db->delete("business");
	        	 
	            
	    }
		return true;

	}


	public function addOtherImage($data){
		$this->db->insert("images",$data);
		return true;	
	}

	public function getBusinesById($id=null){

		$this->db->select('*');
		$this->db->from('business');
		$this->db->join('area','area.area_id=business.area_id','left');
		$this->db->join('main_category','main_category.category_id = business.category_id','left');
		$this->db->join('sub_category','sub_category.subcategory_id = business.subcategory_id','left');
		if ($id!=null) {
			$this->db->where('business_id',$id);
		}
		$result = $this->db->get();
		return $result->result_array();
	}
		





// fetch all recoeds by using datatalbe
	var $table = "business";  
      var $select_column = array("business_id", "business_name", "mobile_one", "register_date","category_name","area_name");  
      var $order_column = array("business_id", "business_name", "mobile_one", "register_date","category_name","area_name");   
      function make_query($status)  
      {  
           $this->db->select($this->select_column);  
           $this->db->from($this->table); 
		   $this->db->join('area','area.area_id=business.area_id','left');
      	   $this->db->join('main_category','main_category.category_id=business.category_id','left'); 


      	   if ($status==0) {
      	   		$this->db->where('business.status',0);
      	   }
      	   if ($status==1) {
      	   		$this->db->where('business.status',1);
      	   }


           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("business_name", $_POST["search"]["value"]);  
           		//$this->db->or_like("business_id", $_POST["search"]["value"]); 
                //$this->db->or_like("mobile_one", $_POST["search"]["value"]); 
               // $this->db->or_like("mobile_two", $_POST["search"]["value"]);  
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('business_id', 'DESC');  
           }  
      }  

      function make_datatables($status){  
           $this->make_query($status);  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
      function get_filtered_data($status){  
           $this->make_query($status);  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table);  
           return $this->db->count_all_results();  
      }

  public function businessDetails($id)
  {

  	$this->db->select('*');
	$this->db->from('business');
	$this->db->join('area','area.area_id=business.area_id','left');
    $this->db->join('main_category','main_category.category_id=business.category_id','left');
    $this->db->join('sub_category','sub_category.subcategory_id=business.subcategory_id','left');
    //$this->db->join('images','images.business_id=business.business_id','right');
	$this->db->where('business.business_id',$id);
	$result = $this->db->get();
	return $result->result_array();
  }

  public function showOtherImages($id){

  	$this->db->select('*');
	$this->db->from('images');
	$this->db->where('business_id',$id);
	$result = $this->db->get();
	return $result->result_array();


  }

  public function changeStatus($status,$id){

  		$data = array('status' => $status );
  		$this->db->where('business_id',$id);
		$this->db->update('business',$data);
		return true;
  }
		
		


	
} 
