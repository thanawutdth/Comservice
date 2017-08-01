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
		public function insert_admin_technic($data){

			$this->insert("admin_db",$data);	
		}
		public function insert_member($data){

			$this->insert("member_db",$data);	
		}
		public function update_member($data,$usn){
			$where = array('username' => $usn);
			$this->update("member_db",$data,$where);	
		}
		public function update_technic($data,$usn){
			$where = array('username' => $usn);
			$this->update("admin_db",$data,$where);	
		}
		public function update_member_username($data,$usn){
			$where = array('member_id' => $usn);
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
		public function delete_member($usn){
			$where = array('member_id' => $usn);
			$this->delete("member_db",$where);	
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
		public function get_all(){

			$this->order_by("admin_id");
			$this->where("status","ยกเลิก","!=");
			$result=$this->get("admin_db");
			
			return $result;
		}
		public function search($txt){
			$result = new stdClass();
			$result->result = array();
			$result->rowCount=0;
			try{
			$stm=$this->db->prepare("SELECT * from admin_db WHERE (name LIKE '%".$txt."%' OR username LIKE '%".$txt."%' OR position LIKE '%".$txt."%' OR phone LIKE '%".$txt."%'OR status LIKE '%".$txt."%')");
			//$stm->bindParam(':txt', "'%".$txt."%'", PDO::PARAM_STR);
			$stm->execute();
			$result->result = $stm->fetchAll(PDO::FETCH_ASSOC);
			$result->rowCount=$stm->rowCount();
			}catch(PDOException $ex){
					echo "PDO ERR ".$ex->getMessage().'<br>';
				}
			return $result;
		}
public function search_member($txt){
			$result = new stdClass();
			$result->result = array();
			$result->rowCount=0;
			try{
			$stm=$this->db->prepare("SELECT * from member_db WHERE (name LIKE '%".$txt."%' OR username LIKE '%".$txt."%' OR position LIKE '%".$txt."%' OR phone LIKE '%".$txt."%'OR status LIKE '%".$txt."%')");
			//$stm->bindParam(':txt', "'%".$txt."%'", PDO::PARAM_STR);
			$stm->execute();
			$result->result = $stm->fetchAll(PDO::FETCH_ASSOC);
			$result->rowCount=$stm->rowCount();
			}catch(PDOException $ex){
					echo "PDO ERR ".$ex->getMessage().'<br>';
				}
			return $result;
		}
		public function get_all_member(){

			$this->order_by("member_id");
			$this->where("status","ยกเลิก","!=");
			$result=$this->get("member_db");
			
			return $result;
		}
	}

?>