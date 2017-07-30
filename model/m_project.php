<?php 
	require_once("core_model.php");
	require_once("m_stringlib.php");
	class M_project extends Core_model{
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
				$query = $this->get("nml2016_project");
				if ($query->rowCount == 0)
				{
					$id = $temp_id;
					$isuniq    = TRUE;
				}
			}
			while(!$isuniq);
		
			return $id;
		}
		public function get_all_project(){
			$this->order_by("sort_order","asc");
			$res=$this->get("nml2016_project");
			return $res;
		}
		public function get_project_by_id($project_id){
			$this->where("id",$project_id);
			$result=$this->get("nml2016_project");
			if (!isset($result->result[0])) {
				$result->result[0] = array();
			}
			return $result->result[0];
		}
		public function insert_project($data){

			$this->insert("nml2016_project",$data);	
		}
		public function update_project($data,$project_id){
			$where = array('id' => $project_id);
			$this->update("nml2016_project",$data,$where);	
		}
		public function delete_project($project_id){
			$where = array('id' => $project_id);
			$this->delete("nml2016_project",$where);	
		}

		
	}

?>