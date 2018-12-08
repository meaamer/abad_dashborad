<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AreaModel extends CI_Model {

	public function addArea($data){
		$this->db->insert("area",$data);
		return true;	
	}

	public function areaList($id=null){

		$this->db->select('*');
		$this->db->from('area');
		if ($id!=null) {
			$this->db->where('area_id',$id);
		}
		$this->db->order_by("area_id","desc");

		$result = $this->db->get();
		return $result->result_array();

	}

	public function updateArea($id,$data){
		$this->db->where('area_id',$id);
		$this->db->update('area',$data);
		return true;
	}


	public function deleteArea($id){
		
		$this->db->where('area_id',$id);
		$this->db->delete("area");
	    return true;
	}
	
}
