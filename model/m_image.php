<?php 
	require_once("core_model.php");
	class M_image extends Core_model{
		public function __construct(){
			parent::__construct();
		}
		public $a1=0;
		public function login_user($username,$password){
			$this->where("username",$username);
			$this->where("password",$password);
			$result=$this->get("viewdatabase");
			if (!isset($result->result[0])) {
				$result->result[0] = array();
			}
			return $result->result[0];
		}

		public function get_user_member($username){
			$this->where("username",$username);
			$result=$this->get("member_db");
			if (!isset($result->result[0])) {
				$result->result[0] = array();
			}
			return $result->result[0];
		}
		public function get_user_admin($username){
			$this->where("username",$username);
			$result=$this->get("admin_db");
			if (!isset($result->result[0])) {
				$result->result[0] = array();
			}
			return $result->result[0];
		}
	
		public function get_user_res(){
			$this->where("user_position","RES");
			$result=$this->get("nml2016_user");
			return $result->result;
		}
		public function get_user_boss(){
			$this->where("user_position","BOSS");
			$result=$this->get("nml2016_user");
			return $result->result;
		}
		public function insert_admin_technic($data){

			$this->insert("admin_db",$data);	
		}
		public function insert_member($data){

			$this->insert("member_db",$data);	
		}
		public function update_member($data,$usn){
			$where = array('username' => $usn);
			$this->update("member_db",$data,$where);	
		}
		public function update_technic($data,$usn){
			$where = array('username' => $usn);
			$this->update("admin_db",$data,$where);	
		}
		public function update_member_username($data,$usn){
			$where = array('member_id' => $usn);
			$this->update("member_db",$data,$where);	
		}
		public function update_admin($data,$usn){
			$where = array('username' => $usn);
			$this->update("admin_db",$data,$where);	
		}
	
		public function delete_admin($usn){
			$where = array('admin_id' => $usn);
			$this->delete("admin_db",$where);	
		}
		public function delete_member($usn){
			$where = array('member_id' => $usn);
			$this->delete("member_db",$where);	
		}
		public function get_all_admin(){

			$this->order_by("admin_id");
			$result=$this->get("admin_db");
			
			return $result;
		}
		public function get_all_user(){

			$this->order_by("member_id");
			$result=$this->get("member_db");
			
			return $result;
		}
		public function get_all(){

			$this->order_by("admin_id");
			$this->where("status","ยกเลิก","!=");
			$result=$this->get("admin_db");
			
			return $result;
		}
		public function search($txt){
			$result = new stdClass();
			$result->result = array();
			$result->rowCount=0;
			try{
			$stm=$this->db->prepare("SELECT * from admin_db WHERE (name LIKE '%".$txt."%' OR username LIKE '%".$txt."%' OR position LIKE '%".$txt."%' OR phone LIKE '%".$txt."%'OR status LIKE '%".$txt."%')");
			//$stm->bindParam(':txt', "'%".$txt."%'", PDO::PARAM_STR);
			$stm->execute();
			$result->result = $stm->fetchAll(PDO::FETCH_ASSOC);
			$result->rowCount=$stm->rowCount();
			}catch(PDOException $ex){
					echo "PDO ERR ".$ex->getMessage().'<br>';
				}
			return $result;
		}
			public function add_image($txt){
											
				$query = "SELECT * FROM uploadfile" or die("Error:" . mysqli_error()); 
				//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result . 
				$result = mysqli_query($con, $query); 
				//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล: 
				echo "<table border='1' align='center' width='500'>";
				//หัวข้อตาราง
				echo "<tr align='center' bgcolor='#CCCCCC'><td>filename</td><td> img </td></tr>";
				while($row = mysqli_fetch_array($result)) { 
				  echo "<tr>";
				  echo "<td>" .$row["fileupload"] .  "</td> ";
				  echo "<td>"."<img src='fileupload/".$row[fileupload]."' width='100'>"."</td>";
				  echo "</tr>";
				}
				echo "</table>";
				//5. close connection
				mysqli_close($con);
		
		}
		public function add_uploadfile($txt){
			
						$fileupload = $_REQUEST['fileupload']; //รับค่าไฟล์จากฟอร์ม		
				$date = date("d-m-Y"); //กำหนดวันที่และเวลา
				//เพิ่มไฟล์
				$upload=$_FILES['fileupload'];
				if($upload <> '') {   //not select file
				//โฟลเดอร์ที่จะ upload file เข้าไป 
				$path="fileupload/";  
				
				//เอาชื่อไฟล์ที่มีอักขระแปลกๆออก
					$remove_these = array(' ','`','"','\'','\\','/','_');
					$newname = str_replace($remove_these, '', $_FILES['fileupload']['name']);
				 
					//ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
					$newname = time().'-'.$newname;
				$path_copy=$path.$newname;
				$path_link="fileupload/".$newname;
				
				//คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์
				move_uploaded_file($_FILES['fileupload']['tmp_name'],$path_copy);  	
					}
					// เพิ่มไฟล์เข้าไปในตาราง uploadfile
					
						$sql = "INSERT INTO uploadfile (fileupload) 
						VALUES('$newname')";
						
						$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
					
					mysqli_close($con);
					// javascript แสดงการ upload file
					
					if($result){
					echo "<script type='text/javascript'>";
					echo "alert('Upload File Succesfuly');";
					echo "window.location = 'uploadfile.php'; ";
					echo "</script>";
					}
					else{
					echo "<script type='text/javascript'>";
					echo "alert('Error back to upload again');";
					echo "</script>";
				}
		}
	}
	?>			
				