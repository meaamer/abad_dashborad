<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubCategoryModel extends CI_Model {

	
	public function addCategory($data){
		$this->db->insert("sub_category",$data);
		return true;	
	}



	public function categoryList($id=null){

		$this->db->select('*');
		$this->db->from('sub_category');
		$this->db->join('main_category','main_category.category_id = sub_category.category_id','left');
		if ($id!=null) {
			$this->db->where('subcategory_id',$id);
		}
		$this->db->order_by("subcategory_id","desc");

		$result = $this->db->get();
		return $result->result_array();

	}

	public function updateCategory($id,$data){
		$this->db->where('subcategory_id',$id);
		$this->db->update('sub_category',$data);
		return true;
	}


	public function deleteCategory($id){
		
		$this->db->where('subcategory_id',$id);
		$this->db->delete("sub_category");
	    return true;
	}
}
