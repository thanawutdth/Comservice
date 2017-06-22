<?php
class M_feedback extends CI_Model {
 
  public function __construct(){
    parent::__construct();
  		$this->load->model("m_stringlib");  		
	}
	function generate_id()
	{
		$isuniq    = FALSE;
		$clam_id = '';
		do
		{
			$temp_id = $this->m_stringlib->uniqueAlphaNum10();
			$query = $this->db->get_where('feedback', array('id' => $temp_id));
			if ($query->num_rows() == 0)
			{
				$clam_id = $temp_id;
				$isuniq    = TRUE;
			}
		}
		while(!$isuniq);
	
		return $clam_id;
	}
	function add_feedback ($data) {
		$this->db->insert('feedback', $data);
	}
	function update_feedback($data,$id) {
		$this->db->where('id', $id);
		$this->db->update('feedback', $data);
	}
	function get_feedback($offset=0,$limit=0){
		$clam  = array();
		$this->db->order_by("sort_order", "asc");
		if ($limit!=0) {
			$this->db->limit($limit, $offset);
		} 
		$query = $this->db->get('feedback');
		
		if ($query->num_rows() > 0) {
			$clam = $query->result();
		}
		return $clam;
	}
	function get_feedback_by_id($id){
		$clam = new stdClass();
		$this->db->where('id', $id);
		$query = $this->db->get('feedback');
		
		if ($query->num_rows() > 0) {
			$clam = $query->result();
			$clam = $clam[0];
		}
		return $clam;
	}	
	function delete_feedback($id) {
		$photo=$this->get_feedback_by_id($id);
		@unlink("./media/feedback/".$photo->picture);
		 $this->db->where('id', $id);
		$this->db->delete('feedback'); 
	}
	
}