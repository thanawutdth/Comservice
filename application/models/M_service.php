<?php
class M_service extends CI_Model {
 
  public function __construct(){
    parent::__construct();
  		$this->load->model("m_stringlib");  		
	}
	function generate_id_country()
	{
		$isuniq    = FALSE;
		$clam_id = '';
		do
		{
			$temp_id = $this->m_stringlib->uniqueAlphaNum10();
			$query = $this->db->get_where('country', array('id' => $temp_id));
			if ($query->num_rows() == 0)
			{
				$clam_id = $temp_id;
				$isuniq    = TRUE;
			}
		}
		while(!$isuniq);
	
		return $clam_id;
	}
	function generate_id_country_img()
	{
		$isuniq    = FALSE;
		$clam_id = '';
		do
		{
			$temp_id = $this->m_stringlib->uniqueAlphaNum10();
			$query = $this->db->get_where('country_img', array('id' => $temp_id));
			if ($query->num_rows() == 0)
			{
				$clam_id = $temp_id;
				$isuniq    = TRUE;
			}
		}
		while(!$isuniq);
	
		return $clam_id;
	}
	function generate_id_study_abroad()
	{
		$isuniq    = FALSE;
		$clam_id = '';
		do
		{
			$temp_id = $this->m_stringlib->uniqueAlphaNum10();
			$query = $this->db->get_where('school_abroad', array('id' => $temp_id));
			if ($query->num_rows() == 0)
			{
				$clam_id = $temp_id;
				$isuniq    = TRUE;
			}
		}
		while(!$isuniq);
	
		return $clam_id;
	}
	function generate_id_study_abroad_lang()
	{
		$isuniq    = FALSE;
		$clam_id = '';
		do
		{
			$temp_id = $this->m_stringlib->uniqueAlphaNum10();
			$query = $this->db->get_where('school_abroad_lang', array('id' => $temp_id));
			if ($query->num_rows() == 0)
			{
				$clam_id = $temp_id;
				$isuniq    = TRUE;
			}
		}
		while(!$isuniq);
	
		return $clam_id;
	}
	function generate_id_study_abroad_img()
	{
		$isuniq    = FALSE;
		$clam_id = '';
		do
		{
			$temp_id = $this->m_stringlib->uniqueAlphaNum10();
			$query = $this->db->get_where('school_abroad_img', array('id' => $temp_id));
			if ($query->num_rows() == 0)
			{
				$clam_id = $temp_id;
				$isuniq    = TRUE;
			}
		}
		while(!$isuniq);
	
		return $clam_id;
	}
	function generate_id_study_abroad_lang_img()
	{
		$isuniq    = FALSE;
		$clam_id = '';
		do
		{
			$temp_id = $this->m_stringlib->uniqueAlphaNum10();
			$query = $this->db->get_where('school_abroad_lang_img', array('id' => $temp_id));
			if ($query->num_rows() == 0)
			{
				$clam_id = $temp_id;
				$isuniq    = TRUE;
			}
		}
		while(!$isuniq);
	
		return $clam_id;
	}
	function add_country ($data) {
		$this->db->insert('country', $data);
	}
	function add_country_img ($data) {
		$this->db->insert('country_img', $data);
	}

	function update_country($data,$id) {
		$this->db->where('id', $id);
		$this->db->update('country', $data);
	}
	function update_country_img($data,$id) {
		$this->db->where('id', $id);
		$this->db->update('country_img', $data);
	}
	function get_country(){
		$clam  = array();
		$clam2  = array();
		$this->db->order_by("sort_order", "asc"); 
		$query = $this->db->get('country');
		
		if ($query->num_rows() > 0) {
			$clam = $query->result();
			foreach ($clam as $key => $value) {
				$clam2[$value->id]=$value;
			}
		}
		return $clam2;
	}
	function get_country_by_id($id){
		$clam = new stdClass();
		$this->db->where('id', $id);
		$query = $this->db->get('country');
		
		if ($query->num_rows() > 0) {
			$clam = $query->result();
			$clam = $clam[0];
			$clam->img=$this->get_country_img($clam->id);
		}
		return $clam;
	}	
	function get_country_img($id){
		$clam  = array();
		$this->db->order_by("sort_order", "asc"); 
		$this->db->where('country_id', $id);
		$query = $this->db->get('country_img');
		
		if ($query->num_rows() > 0) {
			$clam = $query->result();
		}
		return $clam;
	}
	function get_country_img_by_id($id){
		$clam = new stdClass();
		$this->db->where('id', $id);
		$query = $this->db->get('country_img');
		
		if ($query->num_rows() > 0) {
			$clam = $query->result();
			$clam = $clam[0];
		}
		return $clam;
	}
	function delete_country_img($id) {
		$photo=$this->get_country_img_by_id($id);
		@unlink("./media/country/".$photo->picture);
		 $this->db->where('id', $id);
		$this->db->delete('country_img'); 
	}
	function delete_country($id) {
		$photo=$this->get_country_by_id($id);
		@unlink("./media/country/".$photo->picture);
		foreach ($photo->img as $key => $value) {
			$this->delete_country_img($value->id);
		}
		 $this->db->where('id', $id);
		$this->db->delete('country'); 
	}

	function add_study_abroad ($data) {
		$this->db->insert('school_abroad', $data);
	}
	function add_study_abroad_req ($data) {
		$this->db->insert('school_abroad_req', $data);
	}
	function add_study_abroad_img ($data) {
		$this->db->insert('school_abroad_img', $data);
	}
	function update_study_abroad($data,$id) {
		$this->db->where('id', $id);
		$this->db->update('school_abroad', $data);
	}
	function update_study_abroad_img($data,$id) {
		$this->db->where('id', $id);
		$this->db->update('school_abroad_img', $data);
	}
	function get_all_study_abroad($country="all",$rank="all",$time="all",$offset=0,$limit=0){
		$g_list = array();
		$this->db->order_by("date", "desc"); 
		if ($time!=="all") {
			$this->db->where('date <=', $time);
		}
		if ($country!=="all") {
			$this->db->where('country_id', $country);
		}
		if ($rank!=="all") {
			$this->db->where('rank', $rank);
		}
		if ($limit!=0) {
			$this->db->limit($limit, $offset);
		}
		$query = $this->db->get('school_abroad');

		if ($query->num_rows() > 0) {
			$g_list = $query->result();
			foreach ($g_list as $key => $value) {
				$g_list[$key]->img=$this->get_study_abroad_img($value->id);
				$g_list[$key]->req=$this->get_study_abroad_req($value->id);
			}
		}
		return $g_list;

	}
	function get_study_abroad_by_id($id){
		$clam = new stdClass();
		$this->db->where('id', $id);
		$query = $this->db->get('school_abroad');
		
		if ($query->num_rows() > 0) {
			$clam = $query->result();
			$clam = $clam[0];
			$clam->img=$this->get_study_abroad_img($clam->id);
			$clam->req=$this->get_study_abroad_req($clam->id);
		}
		return $clam;

	}
	function get_study_abroad_img($school_id){
		$g_list = array();
		$this->db->order_by("sort_order", "asc");
		$this->db->where('school_id', $school_id);
		$query = $this->db->get('school_abroad_img');


		if ($query->num_rows() > 0) {
			$g_list = $query->result();
		}
		return $g_list;
	}
	function get_study_abroad_img_by_id($id){
		$clam = new stdClass();
		$this->db->order_by("sort_order", "asc");
		$this->db->where('id', $id);
		$query = $this->db->get('school_abroad_img');


		if ($query->num_rows() > 0) {
			$clam = $query->result();
			$clam = $clam[0];
		}
		return $clam;
	}
	function get_study_abroad_req($school_id){
		$g_list = array();
		$this->db->order_by("sort_order", "asc");
		$this->db->where('school_id', $school_id);
		$query = $this->db->get('school_abroad_req');


		if ($query->num_rows() > 0) {
			$g_list = $query->result();
		}
		return $g_list;
	}
	function delete_study_abroad($id) {
		$study=$this->get_study_abroad_by_id($id);
		foreach ($study->img as $key => $value) {
			$this->delete_study_abroad_img($value->id);
		}
		$this->delete_all_req_by_school_id($id);
		$this->db->where('id', $id);
		$this->db->delete('school_abroad');  
	}
	function delete_all_req_by_school_id($id) {
		 $this->db->where('school_id', $id);
		$this->db->delete('school_abroad_req'); 
	}
	function delete_study_abroad_img($id) {
		$photo=$this->get_study_abroad_img_by_id($id);
		@unlink("./media/study_abroad/".$photo->picture);
		 $this->db->where('id', $id);
		$this->db->delete('school_abroad_img'); 
	}





/////////////////////////////////// lang Section ////////////////////////////////////////////////////
	function add_study_abroad_lang ($data) {
		$this->db->insert('school_abroad_lang', $data);
	}
	function add_study_abroad_lang_req ($data) {
		$this->db->insert('school_abroad_lang_req', $data);
	}
	function add_study_abroad_lang_img ($data) {
		$this->db->insert('school_abroad_lang_img', $data);
	}
	function update_study_abroad_lang($data,$id) {
		$this->db->where('id', $id);
		$this->db->update('school_abroad_lang', $data);
	}
	function update_study_abroad_lang_img($data,$id) {
		$this->db->where('id', $id);
		$this->db->update('school_abroad_lang_img', $data);
	}
	function get_all_study_abroad_lang($country="all",$rank="all",$time="all",$offset=0,$limit=0){
		$g_list = array();
		$this->db->order_by("date", "desc"); 
		if ($time!=="all") {
			$this->db->where('date <=', $time);
		}
		if ($country!=="all") {
			$this->db->where('country_id', $country);
		}
		if ($rank!=="all") {
			$this->db->where('rank', $rank);
		}
		if ($limit!=0) {
			$this->db->limit($limit, $offset);
		}
		$query = $this->db->get('school_abroad_lang');

		if ($query->num_rows() > 0) {
			$g_list = $query->result();
			foreach ($g_list as $key => $value) {
				$g_list[$key]->img=$this->get_study_abroad_lang_img($value->id);
				$g_list[$key]->req=$this->get_study_abroad_lang_req($value->id);
			}
		}
		return $g_list;

	}
	function get_study_abroad_lang_by_id($id){
		$clam = new stdClass();
		$this->db->where('id', $id);
		$query = $this->db->get('school_abroad_lang');
		
		if ($query->num_rows() > 0) {
			$clam = $query->result();
			$clam = $clam[0];
			$clam->img=$this->get_study_abroad_lang_img($clam->id);
			$clam->req=$this->get_study_abroad_lang_req($clam->id);
		}
		return $clam;

	}
	function get_study_abroad_lang_img($school_id){
		$g_list = array();
		$this->db->order_by("sort_order", "asc");
		$this->db->where('school_id', $school_id);
		$query = $this->db->get('school_abroad_lang_img');


		if ($query->num_rows() > 0) {
			$g_list = $query->result();
		}
		return $g_list;
	}
	function get_study_abroad_lang_img_by_id($id){
		$clam = new stdClass();
		$this->db->order_by("sort_order", "asc");
		$this->db->where('id', $id);
		$query = $this->db->get('school_abroad_lang_img');


		if ($query->num_rows() > 0) {
			$clam = $query->result();
			$clam = $clam[0];
		}
		return $clam;
	}
	function get_study_abroad_lang_req($school_id){
		$g_list = array();
		$this->db->order_by("sort_order", "asc");
		$this->db->where('school_id', $school_id);
		$query = $this->db->get('school_abroad_lang_req');


		if ($query->num_rows() > 0) {
			$g_list = $query->result();
		}
		return $g_list;
	}
	function delete_study_abroad_lang($id) {
		$study=$this->get_study_abroad_lang_by_id($id);
		foreach ($study->img as $key => $value) {
			$this->delete_study_abroad_lang_img($value->id);
		}
		$this->delete_all_lang_req_by_school_id($id);
		$this->db->where('id', $id);
		$this->db->delete('school_abroad_lang');  
	}
	function delete_all_lang_req_by_school_id($id) {
		 $this->db->where('school_id', $id);
		$this->db->delete('school_abroad_lang_req'); 
	}
	function delete_study_abroad_lang_img($id) {
		$photo=$this->get_study_abroad_lang_img_by_id($id);
		@unlink("./media/study_abroad_lang/".$photo->picture);
		 $this->db->where('id', $id);
		$this->db->delete('school_abroad_lang_img'); 
	}
	
}