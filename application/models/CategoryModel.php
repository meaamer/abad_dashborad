<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryModel extends CI_Model {

	
	public function addCategory($data){
		$this->db->insert("main_category",$data);
		return true;	
	}

	public function categoryList($id=null){

		$this->db->select('*');
		$this->db->from('main_category');
		if ($id!=null) {
			$this->db->where('category_id',$id);
		}
		$this->db->order_by("category_id","desc");

		$result = $this->db->get();
		return $result->result_array();

	}

	public function updateCategory($id,$data){
		$this->db->where('category_id',$id);
		$this->db->update('main_category',$data);
		return true;
	}


	public function deleteCategory($id){

		$image_path = base_url('uploads/');
		$query_get_image = $this->db->get_where('main_category', array('category_id' => $id));

	    foreach ($query_get_image->result_array() as $record)
	    {
	        // delete file, if exists...
	        $filename = $image_path . $record['category_image']; 
	   
	        if (file_exists($filename))
	        {
	            unlink($filename);
	        }
	        $this->db->where('category_id',$id);
		 	$this->db->delete("main_category");
	        	 
	            
	    }
		return true;

	}




}
