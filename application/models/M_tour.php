<?php
class M_tour extends CI_Model {
 
  public function __construct(){
    parent::__construct();
  		$this->load->model("m_stringlib");  		
	}	
	function generate_id_img()
	{
		$isuniq    = FALSE;
		$clam_id = '';
		do
		{
			$temp_id = $this->m_stringlib->uniqueAlphaNum10();
			$query = $this->db->get_where('tour_img', array('id' => $temp_id));
			if ($query->num_rows() == 0)
			{
				$clam_id = $temp_id;
				$isuniq    = TRUE;
			}
		}
		while(!$isuniq);
	
		return $clam_id;
	}
	function generate_id_part()
	{
		$isuniq    = FALSE;
		$clam_id = '';
		do
		{
			$temp_id = $this->m_stringlib->uniqueAlphaNum10();
			$query = $this->db->get_where('tour_partner', array('id' => $temp_id));
			if ($query->num_rows() == 0)
			{
				$clam_id = $temp_id;
				$isuniq    = TRUE;
			}
		}
		while(!$isuniq);
	
		return $clam_id;
	}
	function add_tour_img ($data) {
		$this->db->insert('tour_img', $data);
	}
	function add_tour_part ($data) {
		$this->db->insert('tour_partner', $data);
	}
	function update_tour_img($data, $id) {
		$this->db->where('id', $id);
		$this->db->update('tour_img', $data);
	}
	function update_tour_part($data, $id) {
		$this->db->where('id', $id);
		$this->db->update('tour_partner', $data);
	}
	function update_tour($data) {
		$this->db->update('tour', $data);
	}
	function get_tour(){
		$clam = new stdClass();
		$this->db->where('id', 1); 
		$query = $this->db->get('tour');
		
		if ($query->num_rows() > 0) {
			$clam = $query->result();
			$clam = $clam[0];
			$clam->img=$this->get_tour_img();
			$clam->partner=$this->get_tour_partner();
		}
		return $clam;

	}
	function get_tour_img(){
		$clam  = array();
		$this->db->order_by("sort_order", "asc"); 
		$query = $this->db->get('tour_img');
		
		if ($query->num_rows() > 0) {
			$clam = $query->result();
		}
		return $clam;
	}
	function get_tour_partner(){
		$clam  = array();
		$this->db->order_by("sort_order", "asc"); 
		$query = $this->db->get('tour_partner');
		
		if ($query->num_rows() > 0) {
			$clam = $query->result();
		}
		return $clam;
	}
	function get_tour_img_by_id($id){
		$clam = new stdClass();
		$this->db->where('id', $id);
		$query = $this->db->get('tour_img');
		
		if ($query->num_rows() > 0) {
			$clam = $query->result();
			$clam = $clam[0];
		}
		return $clam;
	}
	function get_tour_part_by_id($id){
		$clam = new stdClass();
		$this->db->where('id', $id);
		$query = $this->db->get('tour_partner');
		
		if ($query->num_rows() > 0) {
			$clam = $query->result();
			$clam = $clam[0];
		}
		return $clam;
	}
	function delete_tour_part($id) {
		$photo=$this->get_tour_part_by_id($id);
		@unlink("./media/tour/".$photo->picture);
		 $this->db->where('id', $id);
		$this->db->delete('tour_partner'); 
	}
	function delete_tour_img($id) {
		$photo=$this->get_tour_img_by_id($id);
		@unlink("./media/tour/".$photo->picture);
		 $this->db->where('id', $id);
		$this->db->delete('tour_img'); 
	}

	
}