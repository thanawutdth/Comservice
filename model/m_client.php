<?php 
	require_once("core_model.php");
	require_once("m_stringlib.php");
	class M_client extends Core_model{
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
				$this->where("client_id",$temp_id);
				$query = $this->get("nml2016_client");
				if ($query->rowCount == 0)
				{
					$id = $temp_id;
					$isuniq    = TRUE;
				}
			}
			while(!$isuniq);
		
			return $id;
		}
		public function get_all_client(){
			$this->order_by("name","desc");
			$res=$this->get("nml2016_client");
			return $res;
		}
		public function get_client_by_id($client_id){
			$this->where("client_id",$client_id);
			$result=$this->get("nml2016_client");
			if (!isset($result->result[0])) {
				$result->result[0] = array();
			}
			return $result->result[0];
		}
		public function insert_client($data){

			$this->insert("nml2016_client",$data);	
		}
		public function update_client($data,$client_id){
			$where = array('client_id' => $client_id);
			$this->update("nml2016_client",$data,$where);	
		}
		public function delete_client($client_id){
			$where = array('client_id' => $client_id);
			$this->delete("nml2016_client",$where);	
		}

		
	}

?>