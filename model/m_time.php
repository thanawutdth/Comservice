<?php 
	require_once("core_model.php");
	class M_time extends Core_model{
		public function __construct(){
			parent::__construct();
		}
		public function datepicker_to_unix ($data) {
		@$str=explode("/", $data);
		return @mktime(0,0,1,(int)$str[1],(int)$str[0],((int)$str[2]));
		}
		public function unix_to_datepicker ($data) {
			$date_string=date("d/m/Y",$data);
			$date_array=explode("/", $date_string);
			$true_date=$date_array[0]."/".$date_array[1]."/".((int)$date_array[2]);
			if ($data<1000000) {
				$true_date="";
			}
			return $true_date;
		}
		public function unix_to_datepicker_reverse ($data) {
			$date_string=date("d/m/Y",$data);
			$date_array=explode("/", $date_string);
			$true_date=((int)$date_array[2])."/".$date_array[1]."/".$date_array[0];
			if ($data<1000000) {
				$true_date="";
			}
			return $true_date;
		}
		public function unix_to_datetimepicker ($data) {
			$date_string=date("Y/m/d H:i",$data);
			@$str1=explode(" ", $date_string);
			@$str2=explode("/", $str1[0]);
			@$str3=explode(":", $str1[1]);
			@$true_date=((int)$str2[0])."/".$str2[1]."/".$str2[2]." ".$str1[1];
			return $true_date;
		}
		public function datetimepicker_to_unix ($data) {

			@$str1=explode(" ", $data);
			@$str2=explode("/", $str1[0]);
			@$str3=explode(":", $str1[1]);
			return @mktime((int)$str3[0],(int)$str3[1],1,(int)$str2[1],(int)$str2[2],((int)$str2[0]));
		}
		public function get_amount_day($start,$end){
			
		}
		public function get_end_month($time){
			return @mktime(23,59,59,(int)date("n",$time),(int)date("t",$time),((int)date("Y",$time)));
		}
		public function get_start_month($time){
			return @mktime(0,0,1,(int)date("n",$time),1,((int)date("Y",$time)));
		}

		
	}

?>