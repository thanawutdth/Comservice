<?php 
	require_once("core_model.php");
	require_once("m_stringlib.php");
	class M_article extends Core_model{
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
				$query = $this->get("nml2016_article");
				if ($query->rowCount == 0)
				{
					$id = $temp_id;
					$isuniq    = TRUE;
				}
			}
			while(!$isuniq);
		
			return $id;
		}
		public function get_all_article($publish="all",$time=false){
			if ($publish!="all") {
				$this->where("is_publish",$publish);
			}
			if ($time) {
				$this->where("publish_time",time(),"<=");
			}
			$this->order_by("publish_time","desc");
			$res=$this->get("nml2016_article");
			return $res;
		}
		public function get_article_by_id($article_id){
			$this->where("id",$article_id);
			$result=$this->get("nml2016_article");
			if (!isset($result->result[0])) {
				$result->result[0] = array();
			}
			return $result->result[0];
		}
		public function insert_article($data){

			$this->insert("nml2016_article",$data);	
		}
		public function update_article($data,$article_id){
			$where = array('id' => $article_id);
			$this->update("nml2016_article",$data,$where);	
		}
		public function delete_article($article_id){
			$article=$this->get_article_by_id($article_id);
			@unlink("../media/article_pic/".$article['head_pic']);
			@unlink("../media/article_pic/".$article['thumb_pic']);
			$where = array('id' => $article_id);
			$this->delete("nml2016_article",$where);	
		}
		public function get_new_article(){
			$this->where("article_name","new_article");
			$result=$this->get("nml2016_article");
			if (!isset($result->result[0])) {
				$result->result[0] = array();
			}
			return $result->result[0];
		}
		public function delete_new_article(){
			$where = array('article_name' => "new_article");
			$this->delete("nml2016_article",$where);	
		}

		
	}

?>