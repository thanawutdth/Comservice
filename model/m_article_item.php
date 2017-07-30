<?php 
	require_once("core_model.php");
	require_once("m_stringlib.php");
	class M_article_item extends Core_model{
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
				$query = $this->get("nml2016_article_item");
				if ($query->rowCount == 0)
				{
					$id = $temp_id;
					$isuniq    = TRUE;
				}
			}
			while(!$isuniq);
		
			return $id;
		}
		public function get_all_article_item($article_id){			
			$this->where("article_id",$article_id);
			$this->order_by("sort_order","asc");
			$res=$this->get("nml2016_article_item");
			return $res;
		}
		public function get_article_item_by_id($article_item_id){
			$this->where("id",$article_item_id);
			$result=$this->get("nml2016_article_item");
			if (!isset($result->result[0])) {
				$result->result[0] = array();
			}
			return $result->result[0];
		}
		public function insert_article_item($data){

			$this->insert("nml2016_article_item",$data);	
		}
		public function update_article_item($data,$article_item_id){
			$where = array('id' => $article_item_id);
			$this->update("nml2016_article_item",$data,$where);	
		}
		public function delete_article_item($article_item_id){
			$item=$this->get_article_item_by_id($article_item_id);
				unlink("../media/article_item/".$item['filepath']);
			$where = array('id' => $article_item_id);
			$this->delete("nml2016_article_item",$where);	
		}
		public function delete_article_item_by_article_id($article_id){
			$item_list=$this->get_all_article_item($article_id);
			foreach ($item_list->result as $key => $value) {
					unlink("../media/article_item/".$value['filepath']);
				$where = array('id' => $value['id']);
				$this->delete("nml2016_article_item",$where);
			}
				
		}

		
	}

?>