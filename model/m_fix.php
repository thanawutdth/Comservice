<?php 
	require_once("core_model.php");
	class M_fix extends Core_model{
		public function __construct(){
			parent::__construct();
		}
		public $a1=0;
		
		public function get_fix_by_id($fix_id){
			$this->where("fix_id",$fix_id);
			$result=$this->get("fix_db");
			if (!isset($result->result[0])) {
				$result->result[0] = array();
			}
			return $result->result[0];
		}
		
		public function insert_fix($data){

			$this->insert("fix_db",$data);	
		}
		public function update_fix($data,$fix_id){
			$where = array('fix_id' => $fix_id);
			$this->update("fix_db",$data,$where);	
		}
		public function delete_fix($fix_id){
			$where = array('fix_id' => $fix_id);
			$this->delete("fix_db",$where);	
		}
		public function get_all(){

			$this->order_by("date");
			$this->where("status","ยกเลิก","!=");
			$result=$this->get("fix_db");
			
			return $result;
		}

		
	}

?>