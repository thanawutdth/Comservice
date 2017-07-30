<?php 
	require_once("core_model.php");
	require_once("m_stringlib.php");
	class M_crew extends Core_model{
		public function __construct(){
			parent::__construct();
			$this->m_stringlib= new M_stringlib;
		}
		function generate_id()
		{
			$isuniq    = FALSE;
			$id = '';
			do
			{
				$temp_id = $this->m_stringlib->uniqueAlphaNum10();
				$this->where("id",$temp_id);
				$query = $this->get("nml2016_crew");
				if ($query->rowCount == 0)
				{
					$id = $temp_id;
					$isuniq    = TRUE;
				}
			}
			while(!$isuniq);
		
			return $id;
		}
		public function get_all_crew(){
			$this->order_by("nickname","asc");
			$res=$this->get("nml2016_crew");
			return $res;
		}
		public function get_crew_by_id($crew_id){
			$this->where("id",$crew_id);
			$result=$this->get("nml2016_crew");
			if (!isset($result->result[0])) {
				$result->result[0] = array();
			}
			return $result->result[0];
		}
		public function insert_crew($data){

			$this->insert("nml2016_crew",$data);	
		}
		public function update_crew($data,$crew_id){
			$where = array('id' => $crew_id);
			$this->update("nml2016_crew",$data,$where);	
		}
		public function delete_crew($crew_id){
			$crew=$this->get_crew_by_id($crew_id);
			@unlink("../media/crew_pic/".$crew['image']);
			$where = array('id' => $crew_id);
			$this->delete("nml2016_crew",$where);	
		}

		
	}

?>