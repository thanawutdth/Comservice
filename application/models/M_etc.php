<?php
class M_etc extends CI_Model {
 
  public function __construct(){
    parent::__construct();
  		$this->load->model("m_stringlib");  		
	}	
	function generate_id_etc_img()
	{
		$isuniq    = FALSE;
		$clam_id = '';
		do
		{
			$temp_id = $this->m_stringlib->uniqueAlphaNum10();
			$query = $this->db->get_where('etc_img', array('id' => $temp_id));
			if ($query->num_rows() == 0)
			{
				$clam_id = $temp_id;
				$isuniq    = TRUE;
			}
		}
		while(!$isuniq);
	
		return $clam_id;
	}
	
	function add_etc_img ($data) {
		$this->db->insert('etc_img', $data);
	}
	
	function update_etc($data) {
		$this->db->update('etc', $data);
	}
	function update_etc_img($data, $id) {
		$this->db->where('id', $id);
		$this->db->update('etc_img', $data);
	}
	
	function get_etc(){
		$clam = new stdClass();
		$query = $this->db->get('etc');
		
		if ($query->num_rows() > 0) {
			$clam = $query->result();
			$clam = $clam[0];
			$clam->img=$this->get_etc_img();
		}
		return $clam;

	}
	
	function get_etc_img(){
		$clam  = array();
		$this->db->order_by("sort_order", "asc"); 
		$query = $this->db->get('etc_img');
		
		if ($query->num_rows() > 0) {
			$clam = $query->result();
		}
		return $clam;
	}
	
	function get_etc_img_by_id($id){
		$clam = new stdClass();
		$this->db->where('id', $id);
		$query = $this->db->get('etc_img');
		
		if ($query->num_rows() > 0) {
			$clam = $query->result();
			$clam = $clam[0];
		}
		return $clam;
	}
	
	function delete_etc_img($id) {
		$photo=$this->get_etc_img_by_id($id);
		@unlink("./media/etc/".$photo->picture);
		 $this->db->where('id', $id);
		$this->db->delete('etc_img'); 
	}
}