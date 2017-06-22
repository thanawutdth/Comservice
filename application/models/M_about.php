<?php
class M_about extends CI_Model {
 
  public function __construct(){
    parent::__construct();
  		$this->load->model("m_stringlib");  		
	}
	function generate_id_team()
	{
		$isuniq    = FALSE;
		$clam_id = '';
		do
		{
			$temp_id = $this->m_stringlib->uniqueAlphaNum10();
			$query = $this->db->get_where('our_team', array('id' => $temp_id));
			if ($query->num_rows() == 0)
			{
				$clam_id = $temp_id;
				$isuniq    = TRUE;
			}
		}
		while(!$isuniq);
	
		return $clam_id;
	}
	function add_our_team ($data) {
		$this->db->insert('our_team', $data);
	}
	function update_our_team($data,$id) {
		$this->db->where('id', $id);
		$this->db->update('our_team', $data);
	}
	function get_our_team(){
		$clam  = array();
		$this->db->order_by("sort_order", "asc"); 
		$query = $this->db->get('our_team');
		
		if ($query->num_rows() > 0) {
			$clam = $query->result();
		}
		return $clam;
	}
	function get_our_team_by_id($id){
		$clam = new stdClass();
		$this->db->where('id', $id);
		$query = $this->db->get('our_team');
		
		if ($query->num_rows() > 0) {
			$clam = $query->result();
			$clam = $clam[0];
		}
		return $clam;
	}	
	function delete_our_team($id) {
		$photo=$this->get_our_team_by_id($id);
		unlink("./media/our_team/".$photo->picture);
		 $this->db->where('id', $id);
		$this->db->delete('our_team'); 
	}
	function add_faq ($data) {
		$this->db->insert('faq', $data);
	}
	function get_all_faq(){
		$clam  = array();
		$this->db->order_by("sort_order", "asc"); 
		$query = $this->db->get('faq');
		
		if ($query->num_rows() > 0) {
			$clam = $query->result();
		}
		return $clam;
	}
	function delete_all_faq() {
		 $this->db->where('id !=', "-1");
		$this->db->delete('faq'); 
	}
}