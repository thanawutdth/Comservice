<?php
class M_gallery extends CI_Model {
 
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
			$query = $this->db->get_where('gallery', array('id' => $temp_id));
			if ($query->num_rows() == 0)
			{
				$clam_id = $temp_id;
				$isuniq    = TRUE;
			}
		}
		while(!$isuniq);
	
		return $clam_id;
	}
	function generate_id_album()
	{
		$isuniq    = FALSE;
		$clam_id = '';
		do
		{
			$temp_id = $this->m_stringlib->uniqueAlphaNum10();
			$query = $this->db->get_where('album', array('id' => $temp_id));
			if ($query->num_rows() == 0)
			{
				$clam_id = $temp_id;
				$isuniq    = TRUE;
			}
		}
		while(!$isuniq);
	
		return $clam_id;
	}
	function add_gallery ($data) {
		$this->db->insert('gallery', $data);
	}
	function add_album ($data) {
		$this->db->insert('album', $data);
	}
	function update_gallery($data,$id) {
		$this->db->where('id', $id);
		$this->db->update('gallery', $data);
	}
	function update_album($data,$id) {
		$this->db->where('id', $id);
		$this->db->update('album', $data);
	}
	function get_gallery($id,$offset=0,$limit=0){
		$clam  = array();
		$this->db->order_by("sort_order", "asc"); 
		$this->db->where('album_id', $id);
		if ($limit!=0) {
			$this->db->limit($limit, $offset);
		}
		$query = $this->db->get('gallery');
		
		if ($query->num_rows() > 0) {
			$clam = $query->result();
		}
		return $clam;
	}
	function get_all_album($offset=0,$limit=0){
		$clam  = array();
		$this->db->order_by("date", "desc"); 
		if ($limit!=0) {
			$this->db->limit($limit, $offset);
		}
		$query = $this->db->get('album');
		
		if ($query->num_rows() > 0) {
			$clam = $query->result();
			foreach ($clam as $key => $value) {
				$clam[$key]->img=$this->get_gallery($value->id);
			}
		}
		return $clam;
	}
	function get_gallery_by_id($id){
		$clam = new stdClass();
		$this->db->where('id', $id);
		$query = $this->db->get('gallery');
		
		if ($query->num_rows() > 0) {
			$clam = $query->result();
			$clam = $clam[0];
		}
		return $clam;
	}
	function get_album_by_id($id){
		$clam = new stdClass();
		$this->db->where('id', $id);
		$query = $this->db->get('album');
		
		if ($query->num_rows() > 0) {
			$clam = $query->result();
			$clam = $clam[0];
			$clam->img=$this->get_gallery($clam->id);
		}
		return $clam;
	}	
	function delete_gallery($id) {
		$photo=$this->get_gallery_by_id($id);
		unlink("./media/gallery/".$photo->picture);
		 $this->db->where('id', $id);
		$this->db->delete('gallery'); 
	}
	function delete_album($id) {
		$album=$this->get_album_by_id($id);
		if (isset($album->img[0])) {
			foreach ($album->img as $key => $value) {
				$this->delete_gallery($value->id);
			}
		}
		
		 $this->db->where('id', $id);
		$this->db->delete('album'); 
	}
}