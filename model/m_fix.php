<?php 
	require_once("core_model.php");
	class M_fix extends Core_model{
		public function __construct(){
			parent::__construct();
		}
		public $a1=0;
		
		public function get_user_admin($username){
			$this->where("username",$username);
			$result=$this->get("admin_db");
			if (!isset($result->result[0])) {
				$result->result[0] = array();
			}
			return $result->result[0];
		}
		
		public function insert_fix($data){

			$this->insert("fix_db",$data);	
		}
		public function update_member($data,$usn){
			$where = array('username' => $usn);
			$this->update("member_db",$data,$where);	
		}
		public function delete_user($usn){
			$where = array('user_username' => $usn);
			$this->delete("nml2016_user",$where);	
		}
		public function get_all(){

			$this->order_by("date");
			$result=$this->get("fix_db");
			
			return $result;
		}

		
	}

?>