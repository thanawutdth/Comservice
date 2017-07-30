<?php 

	class Core_model{
		public function __construct(){
			include("db.php");
			$this->db=$dbh;
		}
		public $active_record="SELECT ";
		public $active_select="";
		public $active_from=" FROM ";
		public $active_where=" WHERE ";
		public $where_flag=false;
		public $active_where_array = array();
		public $active_limit="";
		public $active_order=" ORDER BY ";
		public $order_flag=false;
		public function select($str){
			$this->active_select.=$str;
		}
		public function where($column,$value,$operation="="){
			$this->active_where.="$column ".$operation." ? AND ";
			$this->active_where_array[]=$value;
			$this->where_flag=true;
		}
		public function limit($limit,$offset=-1){
			$this->active_limit=" LIMIT ".$limit;
			if ($offset!=-1) {
				$this->active_limit.=" OFFSET $offset";
			}
		}
		public function order_by($column,$type="asc"){
			$this->active_order.="".$column." ".$type.",";
			$this->order_flag=true;
		}
		public function get($table){
			$result = new stdClass();
			$result->result = array();
			$result->rowCount=0;
			$tmp_record="";
			if ($this->active_select=="") {
				$this->active_record.="* ";
			}else{
				$this->active_record.=$this->active_select;
			}
			$this->active_record.=$this->active_from.$table;
			if ($this->where_flag) {
				$this->active_record.=substr($this->active_where, 0, -4);
			}
			if ($this->order_flag) {
				$this->active_record.=substr($this->active_order, 0, -1);
			}
			$this->active_record.=$this->active_limit;
			$tmp_record=$this->active_record;
			try{
				
				$stm=$this->db->prepare($this->active_record);
				foreach ($this->active_where_array as $key => $value) {
					$stm->bindValue(($key+1), $value);
					//echo "$key $value    ";
				}
				//echo $this->active_record;
				$stm->execute();
				$result->result = $stm->fetchAll(PDO::FETCH_ASSOC);
				//print_r($result->result);
				$result->rowCount=$stm->rowCount();
				$this->reset_active_record();
			}catch(PDOException $ex){
					echo $ex->getMessage().'<br>';
					echo $tmp_record;
				}
				//echo $tmp_record;
			return $result;
			
		}
		public function reset_active_record(){
			$this->active_record="SELECT ";
			$this->active_select="";
			$this->active_from=" FROM ";
			$this->active_where=" WHERE ";
			$this->where_flag=false;
			$this->active_where_array = array();
			$this->active_limit="";
			$this->active_order=" ORDER BY ";
			$this->order_flag=false;
		}
		public function insert($table,$val_array){
			try{
				$string_column="(";
				$sting_value="(";
				$query = "INSERT INTO $table";

				foreach ($val_array as $key => $value) {
					$string_column.=$key.",";
					$sting_value.=":".$key.",";
				}
				$string_column=substr($string_column, 0, -1).")";
				$sting_value=substr($sting_value, 0, -1).")";
				$query.=" ".$string_column." VALUES ".$sting_value;

				$stm=$this->db->prepare($query);
				foreach ($val_array as $key => $value) {
					$stm->bindValue(':'.$key, $value);
				}
				//echo $query;
				$stm->execute();
				$this->reset_active_record();
			}catch(PDOException $ex){
					echo $ex->getMessage();
				}
		}
		public function update($table,$val_array,$where_array){
			$string_set="";
			$sting_where="";
			$query = "UPDATE $table SET ";
			foreach ($val_array as $key => $value) {
					$string_set.=$key."= :".$key.",";
			}
			foreach ($where_array as $key => $value) {
					$sting_where.=$key."= :".$key." AND ";
			}
			$string_set=substr($string_set, 0, -1);
			$sting_where=substr($sting_where, 0, -4);
			$query.=" ".$string_set." WHERE ".$sting_where;
			try{
				$stm=$this->db->prepare($query);
				foreach ($val_array as $key => $value) {
					$stm->bindValue(':'.$key, $value);
				}
				foreach ($where_array as $key => $value) {
					$stm->bindValue(':'.$key, $value);
				}
				//echo $query;
				$stm->execute();
				$this->reset_active_record();
			}catch(PDOException $ex){
					echo $ex->getMessage();
				}

		}
		public function delete($table,$where_array){
			$sting_where="";
			$query = "DELETE FROM $table WHERE";
			foreach ($where_array as $key => $value) {
					$sting_where.=$key."= :".$key." AND ";
			}
			$sting_where=substr($sting_where, 0, -4);
			$query.=" ".$sting_where;
			try{
				$stm=$this->db->prepare($query);
				foreach ($where_array as $key => $value) {
					$stm->bindValue(':'.$key, $value);
				}
				//echo $query;
				$stm->execute();
				$this->reset_active_record();
			}catch(PDOException $ex){
					echo $ex->getMessage();
				}

		}

		public function datepicker_to_unix ($data) {
			@$str=explode("/", $data);
			return @mktime(0,0,1,(int)$str[1],(int)$str[0],((int)$str[2]));
		}
		public function datepicker_to_unix_dash ($data) {
			@$str=explode("-", $data);
			return @mktime(0,0,1,(int)$str[1],(int)$str[2],((int)$str[0]));
		}
		public function unix_to_datepicker ($data) {
			$true_date="";
			if ($data>1000) {			
				$date_string=date("d/m/Y",$data);
				$date_array=explode("/", $date_string);
				$true_date=$date_array[0]."/".$date_array[1]."/".((int)$date_array[2]);
			}
			return $true_date;
		}
		public function unix_to_datepicker_show ($data) {
			return $date_string=date("Y-m-d",$data);
		}
		public function unix_to_datetimepicker ($data) {
			$true_date="";
			if ($data>1000) {
				$date_string=date("Y/m/d H:i",$data);
				@$str1=explode(" ", $date_string);
				@$str2=explode("/", $str1[0]);
				@$str3=explode(":", $str1[1]);
				@$true_date=((int)$str2[0])."/".$str2[1]."/".$str2[2]." ".$str1[1];
			}
			return $true_date;
		}
		public function datetimepicker_to_unix ($data) {

			@$str1=explode(" ", $data);
			@$str2=explode("/", $str1[0]);
			@$str3=explode(":", $str1[1]);
			return @mktime((int)$str3[0],(int)$str3[1],1,(int)$str2[1],(int)$str2[2],((int)$str2[0]));
		}

		
	}

?>