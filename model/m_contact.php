<?php 
	require_once("core_model.php");
	require_once("m_stringlib.php");
	class M_contact extends Core_model{
		public function __construct(){
			parent::__construct();
			$this->m_stringlib= new M_stringlib;
		}
		public function get_all_contact(){
			$this->order_by("time","desc");
			$res=$this->get("nml2016_contact");
			return $res;
		}
		public function get_contact_by_id($id){
			$this->where("id",$id);
			$result=$this->get("nml2016_contact");
			if (!isset($result->result[0])) {
				$result->result[0] = array();
			}
			return $result->result[0];
		}
		public function insert_contact($data){

			$this->insert("nml2016_contact",$data);	
		}
		public function update_contact($data,$id){
			$where = array('id' => $id);
			$this->update("nml2016_contact",$data,$where);	
		}
		public function delete_contact($id){
			$where = array('id' => $id);
			$this->delete("nml2016_contact",$where);	
		}

		
	}

?>