<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model {

	
	public function Authenticate($username,$password) {

			$this->load->library('session');
			$this->db->select("*");
			$this->db->from("admin");
			$this->db->where("admin_username",$username);
			$this->db->where("admin_password",$password);
			$query=$this->db->get();

			if($query->num_rows())
			{
				$row = $query->result_array()[0];
				$this->session->set_userdata('userid',$row["admin_id"]);
				
				$this->session->set_userdata('username',$row["admin_username"]);
				$this->session->set_userdata('password',$row["admin_password"]);
				return true;
			}
			else
			{
				return false;
			}
	}	
}
