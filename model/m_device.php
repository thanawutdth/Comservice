<?php 
	require_once("core_model.php");
	class M_device extends Core_model{
		public function __construct(){
			parent::__construct();
		}
		public $a1=0;
	

		public function get_device($type){
			$this->where("type",$type);
			$result=$this->get("device_db");
			if (!isset($result->result[0])) {
				$result->result[0] = array();
			}
			return $result->result[0];
		}
		public function get_user_admin($username){
			$this->where("username",$username);
			$result=$this->get("admin_db");
			if (!isset($result->result[0])) {
				$result->result[0] = array();
			}
			return $result->result[0];
		}
	
	
		public function insert_device($data){

			$this->insert("device_db",$data);	
		}
		public function update_device($data,$usn){
			$where = array('device_id' => $usn);
			$this->update("device_db",$data,$where);	
		}
		public function update_member_username($data,$usn){
			$where = array('member_id' => $usn);
			$this->update("member_db",$data,$where);	
		}
		public function update_admin($data,$usn){
			$where = array('admin_id' => $usn);
			$this->update("admin_db",$data,$where);	
		}
		public function delete_device($usn){
			$where = array('device_id' => $usn);
			$this->delete("device_db",$where);	
		}
		public function delete_member($usn){
			$where = array('member_id' => $usn);
			$this->delete("member_db",$where);	
		}
		public function get_all_device(){

			$this->order_by("device_id");
			$result=$this->get("device_db");
			
			return $result;
		}
		public function get_all_user(){

			$this->order_by("member_id");
			$result=$this->get("member_db");
			
			return $result;
		}
		
	}

?>