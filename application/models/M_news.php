<?php
class M_news extends CI_Model {
 
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
			$query = $this->db->get_where('news', array('id' => $temp_id));
			if ($query->num_rows() == 0)
			{
				$clam_id = $temp_id;
				$isuniq    = TRUE;
			}
		}
		while(!$isuniq);
	
		return $clam_id;
	}
	function add_news ($data) {
		$this->db->insert('news', $data);
	}
	function update_news($data, $id) {
		$this->db->where('id', $id);
		$this->db->update('news', $data);
	}
	function get_all_news($time="all",$publish="all",$offset=0,$limit=0){
		$g_list = array();
		$this->db->order_by("date", "desc"); 
		if ($time!=="all") {
			$this->db->where('date <=', $time);
		}
		if ($publish!=="all") {
			$this->db->where('is_publish', $publish);
		}
		if ($limit!=0) {
			$this->db->limit($limit, $offset);
		}
		$query = $this->db->get('news');

		if ($query->num_rows() > 0) {
			$g_list = $query->result();
		}
		return $g_list;

	}
	function get_news_by_id($id){
		$clam = new stdClass();
		$this->db->where('id', $id); 
		$query = $this->db->get('news');
		
		if ($query->num_rows() > 0) {
			$clam = $query->result();
			$clam = $clam[0];
		}
		return $clam;

	}
	function get_news_by_time($next_type,$time=0){
		$clam = new stdClass();
		if ($next_type=="next") {
			$this->db->order_by("date", "asc"); 
		 	$this->db->where('date >', $time);
		 }else if($next_type=="prev"){
		 	$this->db->order_by("date", "desc"); 
		 	$this->db->where('date <', $time);
		 } 
		$query = $this->db->get('news');
		
		if ($query->num_rows() > 0) {
			$clam = $query->result();
			$clam = $clam[0];
		}
		return $clam;

	}

	function delete_news($id) {
		$photo=$this->get_news_by_id($id);
		unlink("./media/news/".$photo->picture);
		 $this->db->where('id', $id);
		$this->db->delete('news'); 
	}

	
}