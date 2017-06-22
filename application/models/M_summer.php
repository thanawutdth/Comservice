<?php
class M_summer extends CI_Model {
 
  public function __construct(){
    parent::__construct();
  		$this->load->model("m_stringlib");  		
	}	
	function generate_id_rest()
	{
		$isuniq    = FALSE;
		$clam_id = '';
		do
		{
			$temp_id = $this->m_stringlib->uniqueAlphaNum10();
			$query = $this->db->get_where('summer_rest_img', array('id' => $temp_id));
			if ($query->num_rows() == 0)
			{
				$clam_id = $temp_id;
				$isuniq    = TRUE;
			}
		}
		while(!$isuniq);
	
		return $clam_id;
	}
	function generate_id_summer()
	{
		$isuniq    = FALSE;
		$clam_id = '';
		do
		{
			$temp_id = $this->m_stringlib->uniqueAlphaNum10();
			$query = $this->db->get_where('summer_camp', array('id' => $temp_id));
			if ($query->num_rows() == 0)
			{
				$clam_id = $temp_id;
				$isuniq    = TRUE;
			}
		}
		while(!$isuniq);
	
		return $clam_id;
	}
	function generate_id_download()
	{
		$isuniq    = FALSE;
		$clam_id = '';
		do
		{
			$temp_id = $this->m_stringlib->uniqueAlphaNum10();
			$query = $this->db->get_where('summer_download', array('id' => $temp_id));
			if ($query->num_rows() == 0)
			{
				$clam_id = $temp_id;
				$isuniq    = TRUE;
			}
		}
		while(!$isuniq);
	
		return $clam_id;
	}
	function generate_id_school()
	{
		$isuniq    = FALSE;
		$clam_id = '';
		do
		{
			$temp_id = $this->m_stringlib->uniqueAlphaNum10();
			$query = $this->db->get_where('summer_school_img', array('id' => $temp_id));
			if ($query->num_rows() == 0)
			{
				$clam_id = $temp_id;
				$isuniq    = TRUE;
			}
		}
		while(!$isuniq);
	
		return $clam_id;
	}
	function add_summer_camp ($data) {
		$this->db->insert('summer_camp', $data);
	}
	function add_hiligh ($data) {
		$this->db->insert('summer_hiligh', $data);
	}
	function add_in_cost ($data) {
		$this->db->insert('summer_in_cost', $data);
	}
	function add_out_cost ($data) {
		$this->db->insert('summer_out_cost', $data);
	}
	function add_rest_img ($data) {
		$this->db->insert('summer_rest_img', $data);
	}
	function add_school_img ($data) {
		$this->db->insert('summer_school_img', $data);
	}
	function add_download ($data) {
		$this->db->insert('summer_download', $data);
	}
	function update_download($data, $id) {
		$this->db->where('id', $id);
		$this->db->update('summer_download', $data);
	}
	function update_summer_camp($data, $id) {
		$this->db->where('id', $id);
		$this->db->update('summer_camp', $data);
	}
	function update_rest_img($data, $id) {
		$this->db->where('id', $id);
		$this->db->update('summer_rest_img', $data);
	}
	function update_school_img($data, $id) {
		$this->db->where('id', $id);
		$this->db->update('summer_school_img', $data);
	}
	function get_summer_camp_by_id($id){
		$clam = new stdClass();
		$this->db->where('id', $id); 
		$query = $this->db->get('summer_camp');
		
		if ($query->num_rows() > 0) {
			$clam = $query->result();
			$clam = $clam[0];
			$clam->rest_img=$this->get_rest_img($clam->id);
			$clam->school_img=$this->get_school_img($clam->id);
			$clam->hiligh=$this->get_hiligh($clam->id);
			$clam->incost=$this->get_incost($clam->id);
			$clam->outcost=$this->get_outcost($clam->id);
			$clam->download=$this->get_download($clam->id);
		}
		return $clam;

	}
	function get_all_summer_camp($type="all",$time="all",$offset=0,$limit=0){
		$g_list = array();
		$this->db->order_by("date", "desc"); 
		if ($time!=="all") {
			$this->db->where('date <=', $time);
		}
		if ($type!=="all") {
			$this->db->where('type', $type);
		}
		if ($limit!=0) {
			$this->db->limit($limit, $offset);
		}
		$query = $this->db->get('summer_camp');

		if ($query->num_rows() > 0) {
			$g_list = $query->result();
			foreach ($g_list as $key => $value) {
				$g_list[$key]->rest_img=$this->get_rest_img($value->id);
				$g_list[$key]->school_img=$this->get_school_img($value->id);
				$g_list[$key]->hiligh=$this->get_hiligh($value->id);
				$g_list[$key]->incost=$this->get_incost($value->id);
				$g_list[$key]->outcost=$this->get_outcost($value->id);
				$g_list[$key]->download=$this->get_download($value->id);
			}
		}
		return $g_list;

	}
	function get_download($id){
		$clam  = array();
		$this->db->where('summer_id', $id); 
		$this->db->order_by("sort_order", "asc"); 
		$query = $this->db->get('summer_download');
		
		if ($query->num_rows() > 0) {
			$clam = $query->result();
		}
		return $clam;
	}
	function get_rest_img($id){
		$clam  = array();
		$this->db->where('summer_id', $id); 
		$this->db->order_by("sort_order", "asc"); 
		$query = $this->db->get('summer_rest_img');
		
		if ($query->num_rows() > 0) {
			$clam = $query->result();
		}
		return $clam;
	}
	function get_school_img($id){
		$clam  = array();
		$this->db->where('summer_id', $id); 
		$this->db->order_by("sort_order", "asc"); 
		$query = $this->db->get('summer_school_img');
		
		if ($query->num_rows() > 0) {
			$clam = $query->result();
		}
		return $clam;
	}
	function get_hiligh($id){
		$clam  = array();
		$this->db->where('summer_id', $id); 
		$this->db->order_by("sort_order", "asc"); 
		$query = $this->db->get('summer_hiligh');
		
		if ($query->num_rows() > 0) {
			$clam = $query->result();
		}
		return $clam;
	}
	function get_incost($id){
		$clam  = array();
		$this->db->where('summer_id', $id); 
		$this->db->order_by("sort_order", "asc"); 
		$query = $this->db->get('summer_in_cost');
		
		if ($query->num_rows() > 0) {
			$clam = $query->result();
		}
		return $clam;
	}
	function get_outcost($id){
		$clam  = array();
		$this->db->where('summer_id', $id); 
		$this->db->order_by("sort_order", "asc"); 
		$query = $this->db->get('summer_out_cost');
		
		if ($query->num_rows() > 0) {
			$clam = $query->result();
		}
		return $clam;
	}
	function get_rest_img_by_id($id){
		$clam = new stdClass();
		$this->db->where('id', $id);
		$query = $this->db->get('summer_rest_img');
		
		if ($query->num_rows() > 0) {
			$clam = $query->result();
			$clam = $clam[0];
		}
		return $clam;
	}
	function get_school_img_by_id($id){
		$clam = new stdClass();
		$this->db->where('id', $id);
		$query = $this->db->get('summer_school_img');
		
		if ($query->num_rows() > 0) {
			$clam = $query->result();
			$clam = $clam[0];
		}
		return $clam;
	}
	function get_download_by_id($id){
		$clam = new stdClass();
		$this->db->where('id', $id);
		$query = $this->db->get('summer_download');
		
		if ($query->num_rows() > 0) {
			$clam = $query->result();
			$clam = $clam[0];
		}
		return $clam;
	}
	function delete_rest_img($id) {
		$photo=$this->get_rest_img_by_id($id);
		@unlink("./media/summer_camp/".$photo->picture);
		 $this->db->where('id', $id);
		$this->db->delete('summer_rest_img'); 
	}
	function delete_school_img($id) {
		$photo=$this->get_school_img_by_id($id);
		@unlink("./media/summer_camp/".$photo->picture);
		 $this->db->where('id', $id);
		$this->db->delete('summer_school_img'); 
	}
	function delete_download($id) {
		$photo=$this->get_download_by_id($id);
		@unlink("./media/summer_camp_file/".$photo->file);
		 $this->db->where('id', $id);
		$this->db->delete('summer_download'); 
	}
	function delete_summer_camp($id) {
		$summer=$this->get_summer_camp_by_id($id);
		if (isset($summer->rest_img[0])) {
			foreach ($summer->rest_img as $key => $value) {
				$this->delete_rest_img($value->id);
			}
		}
		if (isset($summer->school_img[0])) {
			foreach ($summer->school_img as $key => $value) {
				$this->delete_school_img($value->id);
			}
		}
		if (isset($summer->download[0])) {
			foreach ($summer->download as $key => $value) {
				$this->delete_download($value->id);
			}
		}
		$this->delete_all_hiligh($id);
		$this->delete_all_in_cost($id);
		$this->delete_all_out_cost($id);
		@unlink("./media/summer_camp/".$summer->main_picture);
		@unlink("./media/summer_camp_file/".$summer->file);
		$this->db->where('id', $id);
		$this->db->delete('summer_camp'); 
	}
	function delete_all_hiligh($summer_id) {
		 $this->db->where('summer_id', $summer_id);
		$this->db->delete('summer_hiligh'); 
	}
	function delete_all_in_cost($summer_id) {
		 $this->db->where('summer_id', $summer_id);
		$this->db->delete('summer_in_cost'); 
	}
	function delete_all_out_cost($summer_id) {
		 $this->db->where('summer_id', $summer_id);
		$this->db->delete('summer_out_cost'); 
	}

	
}