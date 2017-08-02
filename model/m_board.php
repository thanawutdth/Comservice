<?php 
	require_once("core_model.php");
	class M_board extends Core_model{
		public function __construct(){
			parent::__construct();
		}
		public $a1=0;
	

		public function get_board_by_id($id){
			$this->where("id_question",$id);
			$result=$this->get("webboard_quiz");
			if (!isset($result->result[0])) {
				$result->result[0] = array();
			}
			return $result->result[0];
		}
	
	
		public function insert_post($data){

			$this->insert("webboard_quiz",$data);	
		}
		public function insert_reply($data){

			$this->insert("webboard_ans",$data);	
		}

		public function update_post($data,$id_question){
			$where = array('id_question' => $id_question);
			$this->update("webboard_quiz",$data,$where);	
		}
		public function delete_member($usn){
			$where = array('member_id' => $usn);
			$this->delete("member_db",$where);	
		}
		public function get_all_web_quiz(){

			$this->order_by("date_q");
			$result=$this->get("webboard_quiz"); //เอามาจากกระดานตอบกระทู้
			
			return $result;
		}
		public function delete_topic(){

			$this->order_by("date_q");
			$result=$this->get("webboard_quiz"); //เอามาจากกระดานตอบกระทู้
			
			return $result;
		}
		public function get_reply_by_board_id($id){

			$this->order_by("date_a","desc");
			$this->where("id_question",$id);
			$result=$this->get("webboard_ans");
			
			return $result;
		}
		
	}

?>