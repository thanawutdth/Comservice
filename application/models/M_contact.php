<?php
class M_contact extends CI_Model {
 
  public function __construct(){
    parent::__construct();
  		$this->load->model("m_stringlib");  		
	}	

	function get_contact(){
		$g_list = array();
		$this->db->order_by("date", "desc"); 
		$query = $this->db->get('contact');
		
		if ($query->num_rows() > 0) {
			$g_list = $query->result();
		}
		return $g_list;
	}

	function get_contact_by_id($id){
		$admin = new stdClass();
		$this->db->where('id', $id);
		$query = $this->db->get('contact');
		
		if ($query->num_rows() > 0) {
			$admin = $query->result();
			$admin = $admin[0];
		}
		return $admin;
	}
	function delete_contact ($id) {
		$this->db->where('id', $id);
		$this->db->delete('contact');
	}
	function add_contact ($data) {
		$this->db->insert('contact', $data);
	}
}