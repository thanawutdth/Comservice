<?php 
	require_once("core_model.php");
	class M_user extends Core_model{
		public function __construct(){
			parent::__construct();
		}
		public $a1=0;
		public function login_user($username,$password){
			$this->where("username",$username);
			$this->where("password",$password);
			$result=$this->get("viewdatabase");
			if (!isset($result->result[0])) {
				$result->result[0] = array();
			}
			return $result->result[0];
		}

		public function get_user_member($username){
			$this->where("username",$username);
			$result=$this->get("member_db");
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
	
		public function get_user_res(){
			$this->where("user_position","RES");
			$result=$this->get("nml2016_user");
			return $result->result;
		}
		public function get_user_boss(){
			$this->where("user_position","BOSS");
			$result=$this->get("nml2016_user");
			return $result->result;
		}
		public function insert_user($data){

			$this->insert("nml2016_user",$data);	
		}
		public function update_member($data,$usn){
			$where = array('username' => $usn);
			$this->update("member_db",$data,$where);	
		}
		public function update_admin($data,$usn){
			$where = array('admin_id' => $usn);
			$this->update("admin_db",$data,$where);	
		}
		public function delete_admin($usn){
			$where = array('admin_id' => $usn);
			$this->delete("admin_db",$where);	
		}
		public function get_all_admin(){

			$this->order_by("admin_id");
			$result=$this->get("admin_db");
			
			return $result;
		}
		public function get_all_user(){

			$this->order_by("member_id");
			$result=$this->get("member_db");
			
			return $result;
		}
		
	}

?>