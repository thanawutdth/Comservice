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
		public function search($txt){
			$result = new stdClass();
			$result->result = array();
			$result->rowCount=0;
			try{
			$stm=$this->db->prepare("SELECT * from fix_db WHERE (name LIKE '%".$txt."%' OR sector LIKE '%".$txt."%' OR type LIKE '%".$txt."%' OR detail LIKE '%".$txt."%' OR phone LIKE '%".$txt."%'OR status LIKE '%".$txt."%')");
			//$stm->bindParam(':txt', "'%".$txt."%'", PDO::PARAM_STR);
			$stm->execute();
			$result->result = $stm->fetchAll(PDO::FETCH_ASSOC);
			$result->rowCount=$stm->rowCount();
			}catch(PDOException $ex){
					echo "PDO ERR ".$ex->getMessage().'<br>';
				}
			return $result;
		}

		
	}

?>