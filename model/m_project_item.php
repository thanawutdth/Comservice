<?php 
	require_once("core_model.php");
	require_once("m_stringlib.php");
	class M_project_item extends Core_model{
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
				$query = $this->get("nml2016_project_item");
				if ($query->rowCount == 0)
				{
					$id = $temp_id;
					$isuniq    = TRUE;
				}
			}
			while(!$isuniq);
		
			return $id;
		}
		public function get_all_project_item($project_id){			
			$this->where("project_id",$project_id);
			$this->order_by("sort_order","asc");
			$res=$this->get("nml2016_project_item");
			return $res;
		}
		public function get_project_item_by_id($project_item_id){
			$this->where("id",$project_item_id);
			$result=$this->get("nml2016_project_item");
			if (!isset($result->result[0])) {
				$result->result[0] = array();
			}
			return $result->result[0];
		}
		public function insert_project_item($data){

			$this->insert("nml2016_project_item",$data);	
		}
		public function update_project_item($data,$project_item_id){
			$where = array('id' => $project_item_id);
			$this->update("nml2016_project_item",$data,$where);	
		}
		public function delete_project_item($project_item_id){
			$item=$this->get_project_item_by_id($project_item_id);
			if ($item['type']=="image") {
				unlink("../media/project_item/".$item['filepath']);
			}			
			$where = array('id' => $project_item_id);
			$this->delete("nml2016_project_item",$where);	
		}
		public function delete_project_item_by_project_id($project_id){
			$item_list=$this->get_all_project_item($project_id);
			foreach ($item_list->result as $key => $value) {
				if ($value['type']=="image") {
					unlink("../media/project_item/".$value['filepath']);
				}			
				$where = array('id' => $value['id']);
				$this->delete("nml2016_project_item",$where);
			}
				
		}

		
	}

?>